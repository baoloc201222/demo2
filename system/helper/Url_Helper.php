<?php if(!defined('PATH_SYSTEM')) die('Bad requested');

function url_returnPage($link,$error=''){
	if(isset($error)&&!empty($error)){
	    echo '<script> alert("'.$error.'"); </script>';
	}
	echo '<script> window.location.href="'.$link.'"; </script>';
	exit();
}