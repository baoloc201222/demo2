<?php 
class VV_Model_Loader{
	public function load($model){
		$class = ucfirst($model).'_Model';
		require_once(PATH_APPLICATION.'/model/'.$class.'.php');
		$this->{$model} = new $class();
	}
}