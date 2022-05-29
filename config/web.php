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
            'admin' => [
                'class' =>  'app\modules\admin\Module',
              ],

              'manager' =>[
                'class'=> 'app\modules\manager\Module',
              ],
            ],




    'components' => [
        'request' => [
          'baseUrl'=> '',
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => '6nCA1Tc5Zfn1iHBaneEL5XLEAyrqvHNI',
        ],

        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],

        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
            'loginUrl'=>'index.php'
        ],

        'authManager' => [
          'class' => 'yii\rbac\DbManager',
          'defaultRoles' => ['admin'], // Здесь нет роли "guest", т.к. эта роль виртуальная и не присутствует в модели UserExt
      ],
//----------------------------------------------------------------------------------
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
            'rules' => [
              //-------------ADMIN MODULE--------------
              '/admin/employee/<page:\d+>'=>'/admin/employee/',
              '/admin/order/<page:\d+>'=>'/admin/order/',
              '/admin/order-info/<page:\d+>'=>'/admin/order-info/',
              '/admin/owner/<page:\d+>'=>'/admin/owner/',
              '/admin/product/<page:\d+>'=>'/admin/product/',
              '/admin/report/<page:\d+>'=>'/admin/report/',
              '/admin/tech-card/<page:\d+>'=>'/admin/tech-card/',

              //-------------MANAGER MODULE--------------

              '/manager/order/<page:\d+>'=>'/manager/order/',
              '/manager/order-info/<page:\d+>'=>'/manager/order-info/',
              '/manager/owner/<page:\d+>'=>'/manager/owner/',
              '/manager/report/<page:\d+>'=>'/manager/report/',


            ],
        ],

        'formatter' => [
        'nullDisplay' => '&nbsp;',
        'dateFormat' => 'yyyy-MM-dd',
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
