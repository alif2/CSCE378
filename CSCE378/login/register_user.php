<?php
require('core.php');
$s_email = $_POST['email'];
$s_password = $_POST['password'];

$s_salt = secure_create_salt();
$s_pepper = file_read_pepper();
$s_hash[0] = secure_create_hash($s_password, $s_salt, $s_pepper);
echo "\n".$s_hash[0];
$check = database_add_user($s_email, $s_salt, $s_hash[0]);
if($check >0){
	echo "\n".'User input successfully';
}
echo "\n" . 'Yufan has done everything with this file';



$s_user_salt = database_get_salt($s_email);
echo "\n".$s_user_salt[0];
$s_user_hash = database_get_hash($s_email);
echo "\n".$s_user_hash[0];
/*
if ($s_user_salt[0] == $s_salt){

	echo 'I got a equal salt';
} 
if ($s_user_salt != $s_salt){

	echo "\n".'salt are not equal';
}
*/
$s_user_pepper = file_read_pepper();
$s_fake_hash[0] = secure_create_hash($s_password, $s_user_salt[0], $s_user_pepper);
echo "\n".$s_fake_hash[0]."////////////"."\n".$s_user_hash[0];
if ($s_user_hash[0] == $s_fake_hash[0]){
	   $Password_correct = true;
	   echo "\n".'you have logged in successfully';
	}

//echo "\n".$s_myfake_salt[0];
