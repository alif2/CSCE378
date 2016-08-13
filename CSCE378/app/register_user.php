<?php
require_once('core.php');

$s_email = $_POST['register-email'];
$s_password = $_POST['register-password'];
$s_salt = secure_create_salt();
$s_pepper = file_read_pepper();
$s_hash = secure_create_hash($s_password, $s_salt, $s_pepper);

$check = database_add_user($s_email, $s_salt, $s_hash);
if($check > 0){
    echo 'User registered successfully';
}