<?php if(!defined('PATH_SYSTEM')) die('Bad requested');
function ss_sessionStartNow(){
	session_start();
}
function ss_setSession($key,$data = array()){
	if(!empty($data)){
		foreach($data as $k=>$v){
			$_SESSION[$key][$k] = $v;
		}
	}
}
function ss_getSession($key,$name){
	if(array_key_exists($name,$_SESSION[$key])){
		return $_SESSION[$key][$name];
	}else{
		return '';
	}
}

function ss_unSession($key,$name=''){
	if(empty($name)){
		unset($_SESSION[$key]);
	}else{
		unset($_SESSION[$key][$name]);
	}
}