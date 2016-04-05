<?php
function secure_create_salt() {
    $i_salt_bytes = file_get_config('password_salt_bytes');
    
    do {
        $salt = openssl_random_pseudo_bytes($i_salt_bytes, $b_is_crypto_strong);
    } while(!$b_is_crypto_strong);
    return $salt;
}

function secure_create_hash($s_password, $s_salt, $s_pepper) {
    return hash(file_get_config('password_hash_method'), $s_salt . $s_pepper. $s_password);
}

#Compare two strings $s_string_one and $s_string_two in length-constant time.
function secure_slow_equals($s_string_one, $s_string_two) {
    $diff = strlen($s_string_one) ^ strlen($s_string_two);
    for($i = 0; $i < strlen($s_string_one) && $i < strlen($s_string_two); $i++) {
        $diff |= ord($s_string_one[$i]) ^ ord($s_string_two[$i]);
    }
    return $diff === 0;
}