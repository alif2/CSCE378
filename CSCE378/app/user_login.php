<?php
require_once('core.php');

$s_email = $_POST['email'];
$s_password = $_POST['password'];

$s_salt = database_get_salt($s_email);
$s_pepper = file_read_pepper();
$s_hash = secure_create_hash($s_password, $s_salt, $s_pepper);

$s_user_hash = database_get_hash($s_email);

if(secure_slow_equals($s_hash, $s_user_hash)) {
    session_login_user($s_email);
    redirect('/');
} else {
    echo 'Login failed. Try again';
}