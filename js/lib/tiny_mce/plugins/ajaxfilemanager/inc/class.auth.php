<?php 
/**
 * the purpose I added this class is to make the file system much flexible 
 * for customization.
 * Actually,  this is a kind of interface and you should modify it to fit your system
 * @author Logan Cai (cailongqun [at] yahoo [dot] com [dot] cn)
 * @link www.phpletter.com
 * @since 4/August/2007
 */
	class Auth
	{
		var $__loginIndexInSession = 'ajax_user';
		function __construct()
		{
			
		}
		
		function Auth()
		{
			$this->__construct();
		}
		/**
		 * check if the user has logged
		 *
		 * @return boolean
		 */
		function isLoggedIn()
		{
			return (!empty($_SESSION[$this->__loginIndexInSession])?true:false);
		}
		/**
		 * validate the username & password
		 * @return boolean
		 *
		 */
		function login()
		{
            $yii='/home/yii/yii.php';
            $config=dirname(__FILE__).'../../../../../../../protected/config/main.php';
                        
            require_once($yii);
            if(!Yii::app())
                Yii::createWebApplication($config);
            $_SESSION[$this->__loginIndexInSession] = Yii::app()->user->checkAccess('filemanager');
      	
            return $_SESSION[$this->__loginIndexInSession];

		}
	}
?>