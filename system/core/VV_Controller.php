<?php 
if(!defined('PATH_SYSTEM')) die('Bad requested');
class VV_Controller{
	protected $_view = null;
	protected $_model = null;
	protected $_library = null;
	protected $_helper = null;
	protected $_config = null;

	public function __construct($is_controller=true){
		require_once(PATH_SYSTEM.'/core/loader/VV_Config_Loader.php');
		$this->_config = new VV_Config_Loader();
		require_once(PATH_SYSTEM.'/core/loader/VV_Library_Loader.php');
		$this->_library = new VV_Library_Loader();
		require_once(PATH_SYSTEM.'/core/loader/VV_Helper_Loader.php');
		$this->_helper = new VV_Helper_Loader();
		require_once(PATH_SYSTEM.'/core/loader/VV_View_Loader.php');
		$this->_view = new VV_View_Loader();
		require_once(PATH_SYSTEM.'/core/loader/VV_Modal_Loader.php');
		$this->_modal = new VV_Modal_Loader();
		require_once(PATH_SYSTEM.'/core/loader/VV_Model_Loader.php');
		$this->_model = new VV_Model_Loader();
	}
}