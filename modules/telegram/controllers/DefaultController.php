<?php

namespace app\modules\telegram\controllers;

use app\helpers\telegramAnswer\Result;
use app\modules\telegram\models\Telegram;
use Yii;
use yii\base\Module;
use yii\helpers\Json;
use yii\web\Controller;

/**
 * Default controller for the `telegram` module
 */
class DefaultController extends Controller
{
    public $enableCsrfValidation = false;
    private $telegram;
    
    public function __construct(string $id, Module $module, array $config = [])
    {
        parent::__construct($id, $module, $config);
        $this->telegram = new Telegram();
    }

    /**
     * Renders the index view for the module
     */
    public function actionGet()
    {
        $request = file_get_contents("php://input");
        Yii::info($request, 'telegram');

        $this->telegram->getMessage(new Result(Json::decode($request)));
    }
}
