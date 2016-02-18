<?php

function secure_create_salt() {
    $i_salt_bytes = file_get_config('password_salt_bytes');
    
    do {
        $salt = openssl_random_pseudo_bytes($i_salt_bytes, $b_is_crypto_strong);
    } while(!$b_is_crypto_strong);
    return $salt;
}

function secure_create_hash($password, $salt, $pepper) {
    return hash(file_get_config('password_hash_method'), $salt . $pepper. $password);
}