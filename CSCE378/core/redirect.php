<?php
require_once('core.php');

function redirect($url) {
	header('Location: ' . $url);
	die();
}