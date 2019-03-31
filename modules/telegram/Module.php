<?php

namespace app\modules\telegram;

/**
 * telegram module definition class
 */
class Module extends \yii\base\Module
{
    public $token;
    /**
     * {@inheritdoc}
     */
    public $controllerNamespace = 'app\modules\telegram\controllers';

    /**
     * {@inheritdoc}
     */
    public function init()
    {
        parent::init();

        // custom initialization code goes here
    }
}
