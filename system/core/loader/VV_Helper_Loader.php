<?php 
class VV_Helper_Loader{
	public function load($helper){
		if(!empty($helper)){
			foreach($helper as $h){
				require_once(PATH_SYSTEM.'/helper/'.ucfirst($h).'_Helper'.'.php');
			}
		}
	}
}