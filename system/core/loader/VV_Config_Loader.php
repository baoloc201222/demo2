<?php 
class VV_Config_Loader{
	protected $_config =array();
	public function load($config){
		if(file_exists(PATH_APPLICATION.'/config/'.$config.'.php')){
			$config = include_once(PATH_APPLICATION.'/config/'.$config.'.php');
			if(!empty($config)){
				foreach($config as $key=>$item){
					$this->_config[$key] = $item;
				}
			}
			return true;
		}else{
			return false;
		}
	}
	public function item($key,$default_val='222'){
		return isset($this->_config[$key]) ? $this->_config[$key] : $default_val;
	}
	public function set_item($key,$val){
		$this->_config[$key] = $val;
	}
}