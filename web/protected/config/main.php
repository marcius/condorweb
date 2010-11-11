<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');
// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
    'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
    'name'=>'Condominio di via Villoresi 24 interno',
    //'name' => 'Test',
    // preloading 'log' component
    'preload' => array('log'),
    'sourceLanguage' => 'en_us',
    'language' => 'it',
    // autoloading model and component classes
    'import' => array(
        'application.models.*',
        'application.components.*',
        'application.extensions.arraydataproviderex.*',
        //'application.extensions.yiidebugtb.*',
        'application.modules.user.models.*',
        'application.modules.user.components.*',
       // 'application.modules.rights.components.*',

    ),
    // application components
    'components' => array(
        'user' => array(
            // enable cookie-based authentication
            //'class'=>'RightsWebUser', // Allows super users access implicitly.
            'allowAutoLogin' => true,
            'loginUrl' => array('/user/login'),
        ),
    'authManager'=>array(
        'class'=>'CPhpAuthManager', // Provides support authorization item sorting.
        ),

        // uncomment the following to enable URLs in path-format
        /*
          'urlManager'=>array(
          'urlFormat'=>'path',
          'rules'=>array(
          '<controller:\w+>/<id:\d+>'=>'<controller>/view',
          '<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
          '<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
          ),
          ),
         */
        'db' => array(
            'connectionString' => 'mysql:host=localhost;dbname=emmecubo_condo1',
            'username' => 'emmecubo_condo',
            'password' => 'CondO5',
            'charset' => 'utf8',
            'enableParamLogging' => true,
            'emulatePrepare' => true,
            'tablePrefix' => ''
        ),
        'errorHandler' => array(
            // use 'site/error' action to display errors
            'errorAction' => 'site/error',
        ),
        'log' => array(
            'class' => 'CLogRouter',
            'routes' => array(
                array(
                    'class' => 'CFileLogRoute',
                    'levels' => 'error, warning',
                ),
				/*
                array(
                  'class'=>'XWebDebugRouter',
                  'config'=>'alignLeft, opaque, runInDebug, fixedPos',
                  'levels'=>'error, warning, trace, profile, info'
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
    // application-level parameters that can be accessed
    // using Yii::app()->params['paramName']
    'params' => array(
        // this is used in contact page
        'adminEmail' => 'condor@emmecubo.net',
    ),
    'modules' => array(
        'user',
        //'rights'=>array(
        //    'install'=>true, // Enables the installer.
        //),
        'gii' => array(
            'class' => 'system.gii.GiiModule',
            'password' => 'gii',
        ),
    ),
);