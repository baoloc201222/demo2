<?php if(!defined('PATH_SYSTEM')) die('Bad Requested');
class Base_Controller extends FT_Controller{
	public function __construct(){
		parent::__construct();
	}	
	public function load_header($data=array()){
		$this->_view->load('header',$data);
	}
	public function load_footer($data=array()){
		$this->_view->load('footer',$data);
	}
	public function __destruct(){
		$this->_view->show();
	}
}