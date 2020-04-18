<?php
/**
 * Created by PhpStorm.
 * User: trad3r
 * Date: 08.03.19
 * Time: 13:08
 */

use yii\helpers\ArrayHelper;
use yii\log\FileTarget;

$params = ArrayHelper::merge(
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'name' => "Re.Work hub",
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'language' => 'ru-RU',
    'components' => [
        'db' => [
            'class' => 'yii\db\Connection',
            'charset' => 'utf8',
        ],
        'urlManager' => [
            'class' => 'yii\web\UrlManager',
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                '' => 'main/default/index',
                'index' => 'main/default/index',
                'contact' => 'main/contact/index',
                'vacancy/<id>' => 'main/default/vacancy',
                'search' => 'main/default/search',
                'telegram/<a:[\w\-]+>' => 'telegram/default/<a>',
                'freekassa-pay/<id:\d+>' => 'main/default/freekassa-pay',
                'cashback/<id:\d+>' => 'main/default/cashback',
                '<_a:(about|error|add|preview|save|jobs|tariffs|thank-you)>' => 'main/default/<_a>',
                'summary/<_a>' => 'main/summary/<_a>',
                '<_a:(login|logout|signup|email-confirm|request-password-reset|password-reset)>' => 'user/default/<_a>',
                'payment/<a:(ok|fail|result)>' => 'main/payment/<a>',

                '<_m:[\w\-]+>' => '<_m>/default/index',
                '<_m:[\w\-]+>/<id:\d+>/<_a:[\w-]+>' => '<_m>/default/<_a>',
                '<_m:[\w\-]+>/<_c:[\w\-]+>' => '<_m>/<_c>/index',
                '<_m:[\w\-]+>/<_c:[\w\-]+>/<id:\d+>' => '<_m>/<_c>/view',
                '<_m:[\w\-]+>/<_c:[\w\-]+>/<id:\d+>/<_a:[\w\-]+>' => '<_m>/<_c>/<_a>',
                '<_m:[\w\-]+>/<_c:[\w\-]+>/<_a:[\w-]+>' => '<_m>/<_c>/<_a>',
            ],
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
        ],
        'cache' => [
            'class' => 'yii\caching\DummyCache',
        ],
        'log'         => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets'    => [
                [
                    'class' => FileTarget::class,
                    'levels' => ['info'],
                    'categories' => ['payment'],
                    'logVars' => [],
                    'logFile' => dirname(__DIR__) .'/modules/main/logs/payment/' . date("Y-m-d", time()) . '.log'
                ],
                [
                    'class' => FileTarget::class,
                    'levels' => ['error'],
                    'categories' => ['payment'],
                    'logVars' => [],
                    'logFile' => dirname(__DIR__) .'/modules/main/logs/payment/error' . date("Y-m-d", time()) . '.log'
                ],
                [
                    'class' => FileTarget::class,
                    'levels' => ['info'],
                    'categories' => ['dev'],
                    'logVars' => [],
                    'logFile' => dirname(__DIR__) .'/modules/main/logs/development.log'
                ]
            ],
        ],
        'i18n' => [
            'translations' => [
                'app' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'forceTranslation' => true,
                ],
                'bot-cv' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'forceTranslation' => true,
                ],
            ],
        ],
        'formatter' => [
            'class' => 'yii\i18n\Formatter',
            'dateFormat' => 'd MMMM yyyy',
        ],
    ],
    'params' => $params,
];
