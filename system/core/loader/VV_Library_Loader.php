<?php 
class VV_Library_Loader{
	public function load($library,$variable=array()){
		if(empty($this->{$library})){
			$class = ucfirst($library).'_Library';
			require_once(PATH_SYSTEM.'/library/'.$class.'.php');
			$this->{$library} = new $class($variable);
		}
	}
}