<?php
require('core.php');
$s_email = $_POST['email'];
$s_password = $_POST['password'];
$s_salt = secure_create_salt();
$s_pepper = file_read_pepper();
$s_hash = secure_create_hash($s_password, $s_salt, $s_pepper);
$i_rows_added = database_add_user($s_email, $s_salt, $s_hash);

if($i_rows_added >0){
    echo 'User input successfully';
} else {
    echo 'User could not be added';
}