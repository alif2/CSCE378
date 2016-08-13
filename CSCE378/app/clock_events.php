<?php
require_once('core.php');

$s_user_clock_status = database_get_user_clock_status(session_get_user_email());

$s_event_type = '';
if($s_user_clock_status == 'ClockIn') {
    $s_event_type = 'ClockOut';
    
} else if($s_user_clock_status == null || $s_user_clock_status == 'ClockOut') {
    $s_event_type = 'ClockIn';
    
} else {
    echo null;
}

$result = database_user_create_time_tracking_event($s_event_type, session_get_user_email(), $_POST['time']);

if($result > 0) echo $s_event_type;