<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * Main application asset bundle.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
//        'css/site.css',
        'css/main.min.css',
    ];
    public $js = [
//        'js/common.js',
        'js/scripts.min.js',
        'https://cdn.ckeditor.com/ckeditor5/11.2.0/classic/ckeditor.js',
//        "https://www.google.com/recaptcha/api.js?render=6Lew0ZoUAAAAADwqYCBxKYSnnEWmUgxh0nZwTE3w"
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
