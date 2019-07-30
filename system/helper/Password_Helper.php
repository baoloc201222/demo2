<?php 

function pass_hash_password($password, $hashprefix = '{PASS}')
    {
        if ($hashprefix == '{PASS}') {
            $salt = substr(str_shuffle(str_repeat('ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789', 4)), 0, 4);
            return '{PASS}' . base64_encode(sha1($password . $salt, true) . $salt);
        } elseif ($hashprefix == '{SHA}') {
            return '{SHA}' . base64_encode(sha1($password, true));
        } elseif ($hashprefix == '{MD5}') {
            return '{MD5}' . base64_encode(md5($password, true));
        }
    }

    function pass_validate_password($password, $hash)
    {
        if (substr($hash, 0, 6) == '{PASS}') {
            $salt = substr(base64_decode(substr($hash, 6)), 20);
            $validate_hash = '{PASS}' . base64_encode(sha1($password . $salt, true) . $salt);
        } elseif (substr($hash, 0, 5) == '{SHA}') {
            $validate_hash = '{SHA}' . base64_encode(sha1($password, true));
        } elseif (substr($hash, 0, 5) == '{MD5}') {
            $validate_hash = '{MD5}' . base64_encode(md5($password, true));
        }
        if ($hash == $validate_hash) {
            return true;
        }
        return false;
    }

    function pass_validate_password_md5($password, $hash)
    {
        if(md5($password)===$hash){
            return true;
        }
        return false;
    }