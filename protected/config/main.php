<?php
date_default_timezone_set("Europe/London");
// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..', 
	'name'=>'Paunin.com',
    'sourceLanguage'=>'en',
    'language' => 'ru',
    
    

	// preloading 'log' component
	'preload'=>array('log'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
        'application.models.forms.*',
		'application.components.*',
        'application.extensions.yiidebugtb.*', 

	),

	// application components
	'components'=>array(
    
		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
		),
        'user'=>array(
            // this is actually the default value
            'loginUrl'=>'site/login',
        ),
        'authManager'=>array(
            //'class' => 'CPhpAuthManager',
            'class'=>'CDbAuthManager',
            'itemTable'          => 'Auth_Item',
            'itemChildTable'    => 'Auth_ItemChild',
	        'assignmentTable' => 'Auth_Assignment',

            'defaultRoles' => array('guest'),
        ),
		// uncomment the following to enable URLs in path-format
		
		'urlManager'=>array(
             'class'=>'application.extensions.urlManager.LangUrlManager',
            //'languages'=>array('ru','en'),
            'langParam'=>'lang',

			'urlFormat'=>'path',
            'showScriptName'=>false,
			'rules'=>array(
            
             //gii
                'gii'=>'gii',
                'gii/<controller:\w+>' => 'gii/<controller>',
                'gii/<controller:\w+>/<action:\w+>' => 'gii/<controller>/<action>',
                 
                 
                  //'/content/contacts'=>'site/contacts',
                 '<lang:\w{2}>/lab'=>'site/lab',
                 
                '<lang:\w{2}>/content/blog/<page:\d+>'=>'site/blog',
                '<lang:\w{2}>/content/blog'=>'site/blog',
                
                '<lang:\w{2}>/content/blog/tags/<tag:.+>/<page:\d+>'=>'site/blogtags',
                '<lang:\w{2}>/content/blog/tags/<tag:.+>'=>'site/blogtags',
                '<lang:\w{2}>/content/blog/tags'=>'site/blogtags',
                
                '<lang:\w{2}>/content/blog/<post:.+>'=>'site/blogpost', 
                
                '<lang:\w{2}>/content/<content:\w+>'=>'site/content',    
                '<lang:\w{2}>/content'=>'site/content',
                '<lang:\w{2}>/site'=>'site/content',
                '<lang:\w{2}>'=>'site/content',
                ''=>'site/content',
                
                'login'=>'site/login',
                
                
               
				'<lang:\w{2}>/<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<lang:\w{2}>/<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
                
                '<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
                
			),
		),
	
		'db'=>array(
			'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
		),
		// uncomment the following to use a MySQL database
		
		'db'=>array(
			'connectionString' => 'mysql:host=localhost;dbname=paunin_com',
			'emulatePrepare' => true,
			'username' => 'paunin_com',
			'password' => 'paunin_com2014',
			'charset' => 'utf8',
		),
		
		'errorHandler'=>array(
			// use 'site/error' action to display errors
            'errorAction'=>'site/error',
        ),
        'request'=>array(
            'enableCookieValidation'=>true,
            //'enableCsrfValidation'=>true,

            //'baseUrl'=>'dev.celler.ru',
        ),
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning, trace',
				),
                /*array( // configuration for the toolbar
                  'class'=>'XWebDebugRouter',
                  'config'=>'alignLeft, opaque, runInDebug, fixedPos, yamlStyle',
                  'levels'=>'error, warning, trace, profile, info',
                  'allowedIPs'=>array('127.0.0.1','95.170.177.213'),

                ),
*/
				// uncomment the following to show log messages on web pages
				/*
				array(
					'class'=>'CWebLogRoute',
				),
				*/
			),
		),
	),
    'modules'=>array(
        'gii'=>array(
            'class'=>'system.gii.GiiModule',
            'password'=>'pauninc',
            'ipFilters'=>array("*"),
            'newFileMode'=>0666,
            'newDirMode'=>0777,
        ),
    ),
	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'info@paunin.com',
        'allowLang'=>array('English'=>'en','Russian'=>'ru'),
	),
);
