<?php
define('ROOT_DIRECTORY', dirname(__FILE__) . DIRECTORY_SEPARATOR);
define('DIRECTORY', dirname(__FILE__) . DIRECTORY_SEPARATOR . 'core' . DIRECTORY_SEPARATOR);

# Page shown in case of maintenance 
if(file_exists('offline.php')) {
    include('offline.php');
    exit;
}

# Require all files in /core
foreach(glob(DIRECTORY . '*.php') as $file) {
    require_once $file;
}

ob_start();