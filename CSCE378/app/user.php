<?php
require_once('core.php');

# Get sum of all ClockIn/ClockOut pairs in hours
# s_work_hours is array
function add_work_hours($s_work_hours){
    $i_sum = 0;

    for($i = 0; $i < count($s_work_hours) - 1; $i += 2) {
      $i_sum += strtotime($s_work_hours[$i + 1]) - strtotime($s_work_hours[$i]);
    }
    return $i_sum /= 3600.0;
}

# Get the total work hours for user for given date range
# $s_date_utc in format YYYY-MM-DD
function user_get_hours_by_date_range($s_email, $s_start_date, $s_end_date){
	$s_user_hours_dates = array();
	$s_user_work_hours_array = array();
    $s_user_utc_week = database_user_get_time_tracking_events_by_date_range($s_email, $s_start_date, $s_end_date);
  
    $s_date = date('Y-m-d', strtotime($s_user_utc_week[0][0]. '-2 hours'));

    for($i = 0; $i < count($s_user_utc_week); $i++) {
        if(strpos($s_user_utc_week[$i][0], $s_date ) === false) {
            array_push($s_user_work_hours_array, add_work_hours($s_user_hours_dates));

            $s_date = date('Y-m-d', strtotime($s_date. '+1 day'));

            while(strpos($s_user_utc_week[$i][0], $s_date) === false) {
                #check if the next in the 
                $s_date = date('Y-m-d', strtotime($s_date. '+1 day'));
                array_push($s_user_work_hours_array, 0); 
            }
            
            $i--;
            unset($s_user_hours_dates);
            $s_user_hours_dates = array();
        }
    
        else {
            array_push($s_user_hours_dates, $s_user_utc_week[$i][0]);
        }
    }

    array_push($s_user_work_hours_array, add_work_hours($s_user_hours_dates));
    return $s_user_work_hours_array;
}