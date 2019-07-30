<?php 
if(!defined('PATH_SYSTEM')) die('Bad requied');
class Home_Controller extends VV_Controller{
	function __construct(){
		parent::__construct();
		$this->_helper->load(['session','string','url','password']);
		$this->_config->load('config');
		$this->_model->load('home');
		ss_sessionStartNow();
	}

	public function indexAction(){
		$data['base_url'] = $this->_config->item('base_url'); echo $data['base_url'];
		$this->_view->load('home',$data);
	}
}