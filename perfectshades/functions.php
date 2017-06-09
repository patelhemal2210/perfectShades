<?php

function encryptData($data) {
    $salt = "fa4f93a492f1a65f586ee60e9baa1ec2";
    return md5($salt.md5($data));
}

?>