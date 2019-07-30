<?php if(!defined('PATH_SYSTEM'))  die('Bad requested');
function VV_load(){
	$config = include_once(PATH_APPLICATION.'/config/init.php');
	$controller = isset($_GET['c'])&&!empty($_GET['c']) ? $_GET['c'] : $config['default_controller'];
	$action = isset($_GET['a'])&&!empty($_GET['a']) ? $_GET['a'] : $config['default_action'];
	$controller = ucfirst(strtolower($controller)).'_Controller';
	$action = strtolower($action).'Action';
	if(!file_exists(PATH_APPLICATION.'/controller/'.$controller.'.php')){
		die('Controller not found');
	}
	include_once(PATH_SYSTEM.'/core/VV_Controller.php');
	/*if(file_exists(PATH_APPLICATION.'/core/Base_Controller.php')){
		include_once(PATH_APPLICATION.'/core/Base_Controller.php');
	}*/
	include_once(PATH_APPLICATION.'/controller/'.$controller.'.php');
	if(!class_exists($controller)){
		die('Class controller not found');
	}
	//include_once(PATH_SYSTEM.'/core/VV_Model.php');
	$controllerObject = new $controller();
	if(!method_exists($controllerObject,$action)){
		die('Method action not found');
	}
	$controllerObject->{$action}();
}