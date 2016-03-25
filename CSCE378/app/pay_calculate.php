<?php
require('core.php');
  
function get_time_diff($s_UTC){
    $array_size = count($s_UTC);
    $s_work_hours = 0;
    $date = new DateTime('0000-01-01 00:00:00');
    
    for($i=0; $i < floor($array_size/2); $i++){      //loop for getting working hours for each clockin and clockout in one day
        $mydate0 = new DateTime($s_UTC[$i*2][0]);         
        $mydate1 = new DateTime($s_UTC[$i*2+1][0]);
        $mydate_diff = $mydate0->diff(new DateTime($s_UTC[$i*2+1][0]));
        $date->add($mydate_diff);
    }
    return $date;
}

function get_hours($s_date_time){       //get the hours from the single day and cal the hours without rand
    $date = new DateTime('0000-01-01 00:00:00');
    $s_date_diff = $s_date_time->diff($date);
    $s_hours = $s_date_diff->h;
    $s_mins = $s_date_diff->i;
    $s_hours = $s_hours + ($s_mins / 60.0 );
    return $s_hours;
   }

function user_hours_get($i_user_id, $s_time_UTC){
    $s_db_time = database_get_user_specific_time($i_user_id,$s_time_UTC);  //get the UTC_time from the database
    $s_mydate = get_time_diff($s_db_time); //using func to get single day hours and mins
    $s_working_hours = get_hours($s_mydate);  //calculate to only hours
    return $s_working_hours;
}