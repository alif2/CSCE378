<?php
session_start();
require_once('core.php');

function session_is_user_logged_in() {
    return isset($_SESSION) && isset($_SESSION['s_email']);
}

function session_login_user($s_email) {
    $_SESSION['s_email'] = $s_email;
}

function session_logout_user() {
    $_SESSION = array();
    session_destroy();
}

function session_get_user_email() {
    if(isset($_SESSION['s_email'])) {
        return $_SESSION['s_email'];
    }
}