<?php 
if(!defined('PATH_SYSTEM')) die('Bad requested');
class VV_Modal_Loader{
	private $__content = array();
	public function load($modal,$data = array()){
		extract($data);
		ob_start();
		require_once(PATH_APPLICATION.'/view/modal/'.$modal.'.php');
		$content = ob_get_contents();
		ob_end_clean();
		$this->__content[] = $content;

		foreach($this->__content as $html){
			echo $html;
		}
	}
	public function show(){
		foreach($this->__content as $html){
			echo $html;
		}
	}
}