<?php 

// source - https://gist.github.com/zyphlar/7217f566fc83a9633959
// used to generate REAL random numbers for the "forgot your password" page

// usage: $newpassword = generatePassword(12); // for a 12-char password, upper/lower/numbers.
// functions that use rand() or mt_rand() are not secure according to the PHP manual.
function getRandomBytes($nbBytes = 32)
{
    $bytes = openssl_random_pseudo_bytes($nbBytes, $strong);
    if (false !== $bytes && true === $strong) {
        return $bytes;
    }
    else {
        throw new \Exception("Unable to generate secure token from OpenSSL.");
    }
}
function generatePassword($length){
    return substr(preg_replace("/[^a-zA-Z0-9]/", "0", base64_encode(getRandomBytes($length+1))),0,$length);
}

