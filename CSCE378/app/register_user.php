<?php
require_once('core.php');

$s_email = $_POST['email'];
$s_password = $_POST['password'];
$s_salt = secure_create_salt();
$s_pepper = file_read_pepper();
$s_hash = secure_create_hash($s_password, $s_salt, $s_pepper);

$check = database_add_user($s_email, $s_salt, $s_hash);
if($check > 0){
    echo 'User registered successfully';
}