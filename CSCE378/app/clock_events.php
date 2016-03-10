<?php
require_once('core.php');

$i_user_id = 1;
$s_user_clock_status = database_get_user_clock_status($i_user_id);

$s_event_type = '';
if($s_user_clock_status == 'ClockIn') {
    $s_event_type = 'ClockOut';
    
} else if($s_user_clock_status == null || $s_user_clock_status == 'ClockOut') {
    $s_event_type = 'ClockIn';
    
} else {
    echo null;
}

$result = database_user_create_time_tracking_event($s_event_type, $i_user_id, $_POST['time']);

if($result > 0) echo $s_event_type;