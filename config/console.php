<?php

// склеиваем файлы параметров
use yii\helpers\ArrayHelper;

$params = ArrayHelper::merge(require __DIR__ . '/params.php', require __DIR__ . '/params-local.php');

$config = [
    'id' => 'app-console',
    'controllerNamespace' => 'app\commands',
];

if (YII_ENV_DEV) {
    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
    ];
}

return $config;