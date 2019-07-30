<?php if(!defined('PATH_SYSTEM')) die('Bad requested');

class Home_Model extends VV_Model{
	function __construct(){
		parent::connect();
	}
	function __destruct(){
		parent::dis_connect();
	}
}