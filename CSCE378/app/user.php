<?php
require_once('core.php');

# Get sum of all ClockIn/ClockOut pairs in hours
# s_work_hours is array
function add_work_hours($s_work_hours){
    $i_sum = 0;

    for($i = 0; $i < count($s_work_hours) - 1; $i += 2) {
      $i_sum += strtotime($s_work_hours[$i + 1][0]) - strtotime($s_work_hours[$i][0]);
    }

    return $i_sum /= 3600.0;
}

# Get the total work hours for user for a given day
# $s_date_utc in format YYYY-MM-DD
function user_get_hours_by_day($s_email, $s_date_utc){
    return add_work_hours(database_user_get_time_tracking_events_by_day($s_email, $s_date_utc));
}