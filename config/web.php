<?php

$params = require(__DIR__ . '/params.php');
$db = file_exists(__DIR__ . '/db-local.php') ? require(__DIR__ . '/db-local.php') : require(__DIR__ . '/db.php');

$config = [
    'id' => 'zsm',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log', 'init'],
    'language' => 'ru-RU',
    'components' => [
        'init' => 'app\components\Init',
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'ouJBIcnKhMXMzvlssLGpcRYU',
            'baseUrl' => '',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'assetManager' => [
            'linkAssets' => true,
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'transport' => [
                'class' => 'Swift_SmtpTransport',
                'host' => 'smtp.yandex.ru',  // e.g. smtp.mandrillapp.com or smtp.gmail.com
                'username' => $params['adminEmail'],
                'password' => $params['adminEmailPassword'],
                'port' => '587', // Port 25 is a very common port too
                'encryption' => 'tls', // It is often used, check your provider or mail server specs
            ],
        ],
        'formatter' => [
            'class' => 'yii\i18n\Formatter',
            'dateFormat' => 'php:d.m.Y',
            'datetimeFormat' => 'php:d.m.Y H:i:s',
            'timeFormat' => 'php:H:i:s',
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
                '' => 'site/index',
                '<_a(login|logout|send-email)>' => 'site/<_a>',
                '<_c:(elfinder)>/<_a>' => '<_c>/<_a>',
                '<_c:(search|news|elfinder)>' => '<_c>/index',
                '<_c:(news)>/<id:\d+>-<alias>' => '<_c>/view',
                '<_c:(request)>' => '<_c>/index',
                '<_c:(route)>/<_a:(get-sub-levels)>' => '<_c>/<_a>',
                '<_m:(admin)>/<_c>/<_a>' => '<_m>/<_c>/<_a>',
                '<_m:(admin)>/<_c>' => '<_m>/<_c>/index',
                '<_m:(admin)>' => '<_m>/default/index',
                '<path:[\w_\/-]+>' => 'route/index',
//                '<_a:(login|logout)>' => 'site/<_a>',
//                '<_c:(cart|elfinder)>/<_a>' => '<_c>/<_a>',
//                '<_c:(cart|news|elfinder)>' => '<_c>/index',
//                '<_c:(news)>/<id:\d+>-<alias>' => '<_c>/view',
//                '<path:[\w_\/-]+>/<_a>' => 'route/<_a>',
            ],
        ],
    ],
    'controllerMap' => [
        'elfinder' => [
            'class' => 'mihaildev\elfinder\PathController',
            'access' => ['@'],
            'root' => [
                'path' => 'uploads',
                'name' => 'Files'
            ],
            'watermark' => [
                'source' => __DIR__ . '/logo.png', // Path to Water mark image
                'marginRight' => 5,          // Margin right pixel
                'marginBottom' => 5,          // Margin bottom pixel
                'quality' => 95,         // JPEG image save quality
                'transparency' => 70,         // Water mark image transparency ( other than PNG )
                'targetType' => IMG_GIF | IMG_JPG | IMG_PNG | IMG_WBMP, // Target image formats ( bit-field )
                'targetMinPixel' => 200         // Target image minimum pixel size
            ]
        ],

    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        'allowedIPs' => ['127.0.0.1', '192.168.*'],
    ];

    /*$config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
    ];*/
}

return $config;
