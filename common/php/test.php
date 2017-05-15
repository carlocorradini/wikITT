<?php
$options = [
    'cost' => 11,
    'salt' => mcrypt_create_iv(122, MCRYPT_DEV_URANDOM)
];
$psw = password_hash("carlo.corradini", PASSWORD_BCRYPT, $options);
echo $psw."\n";

if(password_verify("carlo.corradini", $psw)) {
    echo "weeee";
} else {
    echo "ojirvferfe";
}