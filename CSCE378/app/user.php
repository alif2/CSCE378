<?php
require_once('core.php');

# Get sum of all ClockIn/ClockOut pairs in hours
# s_work_hours is array
function add_work_hours($s_work_hours,$s_email) {
    $i_sum = 0;
    $i = 0;

    $s_date = date('Y-m-d', strtotime($s_work_hours[0]. '-2 hours'));
    $s_event_type = database_user_check_event_type($s_email,$s_work_hours[0]);
    if($s_event_type == 'ClockOut'){
        $i_sum += strtotime($s_work_hours[0]) - strtotime($s_date. '+2 hours');
        $i++;
    }

    for($i = $i; $i < count($s_work_hours) - 1; $i += 2) {
        $i_sum += strtotime($s_work_hours[$i + 1]) - strtotime($s_work_hours[$i]);
    } 

    $s_event_type = database_user_check_event_type($s_email,$s_work_hours[count($s_work_hours) - 1]);
    if($s_event_type == 'ClockIn'){
        $i_sum += strtotime($s_date.'+1 day'.'+2 hour') - strtotime($s_work_hours[count($s_work_hours)-1]);
    }
    return $i_sum /= 3600.0;
}

function user_get_sum_hours_by_date_range($s_email, $s_start_date, $s_end_date) {
    $s_work_hours = user_get_hours_by_date_range($s_email, $s_start_date, $s_end_date);
    $sum = 0.0;
    
    foreach($s_work_hours as $hours) {
        $sum += $hours;
    }
    return $sum;
};

# Get the total work hours for user for given date range
# $s_date_utc in format YYYY-MM-DD
function user_get_hours_by_date_range($s_email, $s_start_date, $s_end_date){
	$s_user_hours_dates = array();


    $s_user_work_hours_array = array();
    $s_user_temp_array = array();
    $s_user_UTC_week = database_user_get_time_tracking_events_by_date_range($s_email,$s_start_date, $s_end_date);


    if($s_user_UTC_week == NULL) {
        $emety = array();
        return $emety;
    }
    if(database_user_check_event_type($s_email,$s_user_UTC_week[count($s_user_UTC_week)-1][0]) == 'ClockIn') {
        array_pop($s_user_UTC_week);
    }

    $s_date = date('Y-m-d', strtotime($s_user_UTC_week[0][0]. '-2 hours'));
    
    for($i = 0; $i < count($s_user_UTC_week); $i++){

        if(strpos($s_user_UTC_week[$i][0],$s_date ) === false){
            $s_user_temp_array[$s_date] = add_work_hours($s_user_hours_dates,$s_email);
            $s_user_work_hours_array = $s_user_work_hours_array + $s_user_temp_array;
            $s_date = date('Y-m-d', strtotime($s_date. '+1 day'));
 
            while(strpos($s_user_UTC_week[$i][0],$s_date) === false){
            #check if the next day in the database`
            $s_date = date('Y-m-d', strtotime($s_date. '+1 day'));
            }

            unset($s_user_hours_dates);
            $s_user_hours_dates = array();

            $event_type = database_user_check_event_type($s_email,$s_user_UTC_week[$i][0]);
         
            $i--;

        } else {     #there is work hours in this days put the hours in the date_hours array
	        array_push($s_user_hours_dates,$s_user_UTC_week[$i][0]);
        }
    }
 
    $s_user_temp_array[$s_date] = add_work_hours($s_user_hours_dates, $s_email);
    $s_user_work_hours_array = $s_user_work_hours_array + $s_user_temp_array;
    return $s_user_work_hours_array;
} 

     

