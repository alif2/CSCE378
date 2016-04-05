<?php
require_once('core.php');
echo database_get_user_last_event_time(session_get_user_email());