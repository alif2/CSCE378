<?php
require_once('core.php');

# Create a PDO for database using settings from config file
function get_database() {
    $s_db_dsn =              file_get_config('database_type')
              . ':host='   . file_get_config('database_host')
              . ';dbname=' . file_get_config('database_name');       
    $s_db_user = file_get_config('database_user');
    $s_db_pw = file_get_config('database_password');

    try {
        return new PDO($s_db_dsn, $s_db_user, $s_db_pw, array(PDO::ATTR_PERSISTENT => true));
    } catch(PDOException $e) {
        echo 'Unable to connect to database<br>';
    }
}

function database_add_user($s_email, $s_salt, $s_hash) {
    $dbh = get_database();

    $s_stmt = $dbh->prepare('INSERT INTO Users(Email, PasswordSalt, PasswordHash) VALUES (:s_email, :s_password_salt, :s_password_hash)');
    $s_stmt->bindParam(':s_email', $s_email);
    $s_stmt->bindParam(':s_password_salt', $s_salt);
    $s_stmt->bindParam(':s_password_hash', $s_hash);

    return $s_stmt->execute();
}

function database_get_salt($s_email){
     $dbh = get_database();

     $s_stmt = $dbh->prepare('SELECT PasswordSalt FROM Users WHERE Email = :s_email');
     $s_stmt->bindParam(':s_email', $s_email);
     $s_stmt->execute();
     return $s_stmt->fetch();
}

function database_get_hash($s_email) {
    $dbh = get_database();

    $s_stmt = $dbh->prepare('SELECT PasswordHash FROM Users WHERE Email = :s_email');
    $s_stmt->bindParam(':s_email', $s_email);
    $s_stmt->execute();
    return $s_stmt->fetch();
}

function database_get_user_clock_status($i_user_id) {
    $dbh = get_database();

    $s_stmt = $dbh->prepare('SELECT TimeTrackingEventType FROM TimeTrackingEvents WHERE UserID = :i_user_id ORDER BY TimeTrackingEventID DESC LIMIT 1');
    $s_stmt->bindParam(':i_user_id', $i_user_id);

    $s_stmt->execute();
    return $s_stmt->fetch()[0];
}

function database_get_user_last_event_time($i_user_id) {
    $dbh = get_database();

    $s_stmt = $dbh->prepare('SELECT TimeUTC FROM TimeTrackingEvents WHERE UserID = :i_user_id ORDER BY TimeTrackingEventID DESC LIMIT 1');
    $s_stmt->bindParam(':i_user_id', $i_user_id);

    $s_stmt->execute();
    return $s_stmt->fetch()[0];
}

function database_get_user_specific_time($i_user_id,$s_user_time) {
    $dbh = get_database();
    $s_user_time = $s_user_time . '%';

    $s_stmt = $dbh->prepare('SELECT TimeUTC FROM TimeTrackingEvents WHERE UserID = :i_user_id and TimeUTC like :s_user_time');
    $s_stmt->bindParam(':i_user_id', $i_user_id);
    $s_stmt->bindParam(':s_user_time',$s_user_time);

    $s_stmt->execute();
    return $s_stmt->fetchall();
}

# Clock in or out
function database_user_create_time_tracking_event($s_event_type, $i_user_id, $dt_clock_time_utc) {
    $dbh = get_database();

    $s_stmt = $dbh->prepare('INSERT INTO TimeTrackingEvents(TimeTrackingEventType, UserID, TimeUTC) VALUES (:s_time_tracking_event_type, :i_user_id, :dt_time_utc)');
    $s_stmt->bindParam(':s_time_tracking_event_type', $s_event_type);
    $s_stmt->bindParam(':i_user_id', $i_user_id);
    $s_stmt->bindParam(':dt_time_utc', $dt_clock_time_utc);

    return $s_stmt->execute();
}

function get_time_diff_UTC($s_UTC){
    $array_size = count($s_UTC);
    $s_work_hours = 0;

    for($i = 0; $i < floor($array_size / 2); $i++){
        $s_work_hours = $s_work_hours + substr($s_UTC[$i * 2 + 1][0], -12, 2) - substr($s_UTC[$i * 2][0], -12, 2);
    }

    return $s_work_hours;
}

function time_diff_datainterval($date0, $date1){
    $date_diff = new DateInterval();

    $date_diff->y = $date1->y - $date->y;
    $date_diff->m = $date1->m - $date->m;
    $date_diff->d = $date1->d - $date->d;
    $date_diff->h = $date1->h - $date->h;
    $date_diff->i = $date1->i - $date->i;

    return $date_diff;
}