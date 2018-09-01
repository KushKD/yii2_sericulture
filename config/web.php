<?php

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';



$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],

    'modules' => [
        'frontend' => [
            'class' => 'app\modules\masters\Frontend',
           // 'layout' => '@app/views/layouts/frontend',
           //'layout' => '@webroot/themes/frontend/views/layouts/main',
        ],
    ],

    // 'modules' => [
    //     'master' => [
    //         'class' => 'app\modules\master\frontuser',
    //         // 'layout' => '@app/views/layouts/investorLayoutIspinia',
    //         // 'controllerMap' => [
    //         //     'assignment' => 'app\modules\master\controllers\DefaultController'
    //         // ],
    //     ],
    // ],

    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'bN5qNFMzX_fSMN-7neJiBIIUDB_z_DKO',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\Users',
            'enableAutoLogin' => true,
            'enableSession' => true,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'db' => $db,
        
         'urlManager' => [
             'enablePrettyUrl' => true,
             'showScriptName' => false,
             'rules' => array(
                'mycategory/<controller:\w+>/<action:\w+>' => '<controller>/<action>',
                '<controller:\w+>/<id:\d+>' => '<controller>/view',
                '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
                '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
                //Rules with Server Names
                //'http://admin.domain.com/login' => 'admin/user/login',
                //'http://www.domain.com/login' => 'site/login',
                //'http://<country:\w+>.domain.com/profile' => 'user/view',
                '<controller:\w+>/<id:\d+>-<slug:[A-Za-z0-9 -_.]+>' => '<controller>/view',
                ),
            /* 'rules' => [
             ],*/
         ],

        'view' => [

            'theme' => [
                'basePath' => '@webroot/themes/default',
                'baseUrl'  => '@web/themes/default',
                'pathMap'  =>  [
                        '@app/views' => '@webroot/themes/default/views',
                ],
            ],

            'class' => 'app\components\View'
        ],

       
        
    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];
}

return $config;
