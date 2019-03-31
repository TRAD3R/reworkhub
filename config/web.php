<?php

use yii\helpers\ArrayHelper;

// склеиваем файлы параметров
$params = ArrayHelper::merge(require __DIR__ . '/params.php', require __DIR__ . '/params-local.php');

$config = [
    'id' => 'app',
    'language'=>'ru-RU',
    'defaultRoute' => 'main/default/index',
    'modules' => [
        'main' => [
            'class' => 'app\modules\main\Module',
        ],
        'user' => [
            'class' => 'app\modules\user\Module',
        ],
        'telegram' => [
            'class' => 'app\modules\telegram\Module',

        ],
    ],
    'components' => [
        'user' => [
            'identityClass' => 'app\modules\user\models\User',
            'enableAutoLogin' => true,
            'loginUrl' => ['user/default/login'],
        ],
        'errorHandler' => [
            'errorAction' => 'main/default/error',
        ],
        'request' => [
            'cookieValidationKey' => '',
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
        ],
        'assetManager' => [
            'bundles' => [
                'yii\web\JqueryAsset' => [
                    'sourcePath' => null,   // отключение дефолтного jQuery
                    'js' => [
                        '//ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js', // добавление вашей версии
                    ]
                ],
            ],
        ],
    ],
];

if (YII_ENV_DEV) {
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
    ];
}

return $config;
