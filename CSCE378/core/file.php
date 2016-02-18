<?php
define('PHP_CONFIG_FILE', 'config.ini');
define('PHP_STRING_FILE', 'lang/string_en-us.txt');

# Get config setting from file
function file_get_config($s_config_name) {
    if(!$settings = parse_ini_file(PHP_CONFIG_FILE)) {
        throw new exception('Unable to open ' . PHP_CONFIG_FILE . '.');
    }
    return $settings[$s_config_name];
}

# Get language string
function file_get_string($s_string_name) {
    $s_search = '$s_' . $s_string_name;
    $fh_string_file = fopen(PHP_STRING_FILE, 'r');

    if($fh_string_file) {
        #Inefficient linear search, could regex work here? probably
        while(!feof($fh_string_file)) {
            $s_line = fgets($fh_string_file);

            $b_is_var = strpos($s_line, '$');
            if($b_is_var !== false) {
                $s_var_name = substr($s_line, $b_is_var, strlen($s_search)); 

                if($s_search === $s_var_name) {
                    $i_start_index = strpos($s_line, "'");

                    if($i_start_index !== false) {
                        $i_end_index = strpos($s_line, "'", $i_start_index + 1);
                        echo substr($s_line, ($i_start_index + 1), ($i_end_index - $i_start_index - 1));
                    }
                }
            }
        }
    }
    fclose($fh_string_file);
}