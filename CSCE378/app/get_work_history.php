<?php
require_once('core.php');
require_once('app/user.php');

$first_day = $_POST['firstDay'];
$last_day = $_POST['lastDay'];
print json_encode(user_get_hours_by_date_range(session_get_user_email(), $first_day, $last_day));