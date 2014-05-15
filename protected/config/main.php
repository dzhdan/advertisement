<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
Yii::setPathOfAlias('bootstrap', dirname(__FILE__) . '/../extensions/bootstrap');
return array(
    'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
    'name' => 'My Web Application',

    'preload' => ['log'],

    'import' => [
        'application.models.*',
        'application.components.*',
        'application.helpers.*',
        'application.extensions.*',
        'ext.YiiMailer.YiiMailer',
    ],
    'theme' => 'bootstrap',
    'modules' => [
        'gii' => [
            'class' => 'system.gii.GiiModule',
            'password' => '123',
            // If removed, Gii defaults to localhost only. Edit carefully to taste.
            'ipFilters' => ['127.0.0.1', '::1'],
        ],
        'email' => [
            'class' => 'email.EmailModule',
            'adminUsers' => ['admin'],
        ],
    ],

    'components' => array(
        'user' =>[
            'allowAutoLogin' => true,
<<<<<<< HEAD
        ],
        'bootstrap' => [
            'class' => 'bootstrap.components.Bootstrap',
        ],
=======
        ),
       /* 'bootstrap' => array(
            'class' => 'bootstrap.components.Bootstrap',
        ),*/
        // uncomment the following to enable URLs in path-format
>>>>>>> c4a206daf65dd0c3f26ec0fac4e99ee5d539c971

        'urlManager' => array(
            'class' => 'application.components.UrlManager',
            'urlFormat' => 'path',
            'rules' => array(
                '<controller:[\w\-]+>/<id:\d+>' => '<controller>/view',
                '<controller:[\w\-]+>/<action:[\w\-]+>/<id:\d+>' => '<controller>/<action>',
                '<controller:[\w\-]+>/<action:[\w\-]+>' => '<controller>/<action>',
            ),
        ),
        'authManager' => array(
            // Будем использовать свой менеджер авторизации
            'class' => 'PhpAuthManager',
            // Роль по умолчанию. Все, кто не админы, модераторы и юзеры — гости.
            'defaultRoles' => ['guest'],
        ),
        'user' => array(
            'class' => 'WebUser',
            'loginUrl' => ['/user/login'],
        ),
        'db' => [
            'connectionString' => 'mysql:host=localhost;dbname=advert',
            'emulatePrepare' => true,
            'username' => 'root',
            'password' => '',
            'charset' => 'utf8',
        ],
        'session'=>[

            'class'=>'CDbHttpSession',

            'connectionID'=>'db',
            'timeout' => 600,
            'sessionTableName'=>'yiisession',

        ],

        'errorHandler' => [
            // use 'site/error' action to display errors
            'errorAction' => 'site/error',
        ],
        'log' => array(
            'class' => 'CLogRouter',
            'routes' => [
                [
                    'class' => 'CFileLogRoute',
                    'levels' => 'error, warning',
                ],
                // uncomment the following to show log messages on web pages
                /*
                array(
                    'class'=>'CWebLogRoute',
                ),
                */
            ],
        ),
    ),
    // application-level parameters that can be accessed
    // using Yii::app()->params['paramName']
    'params' => array(
        'mailer'=>[
            'from'=>'admin@codeigniter.com',
        ],
        'adminEmail' => 'webmaster@example.com',
    ),
);