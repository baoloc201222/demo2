<?php if(!defined('PATH_SYSTEM')) die('Bad requested');
function str_checkString($str){
	$str = preg_replace('/[\r\n\t]/','', $str);
	$str =htmlspecialchars(addslashes($str));
	return $str;
}

function str_strRandom($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

function str_trimText($input, $length, $ellipses = true, $strip_html = true) {
    if ($strip_html) {
        $input = strip_tags($input);
    }
    if (strlen($input) <= $length) {
        return $input;
    }
    $last_space = strrpos(substr($input, 0, $length), ' ');
    $trimmed_text = substr($input, 0, $last_space);
    if ($ellipses) {
        $trimmed_text .= '...';
    }
    return $trimmed_text;
}