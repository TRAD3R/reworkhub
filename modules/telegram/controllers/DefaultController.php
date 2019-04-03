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

        $this->telegram->getMessage(new Result(Json::decode($request)));
    }

    public function actionParseChannel(){

        $channelName = '';
        $page = 0;
        $email = [];
        $error = '';

        if(Yii::$app->request->isPost && Yii::$app->request->post('teleChannelName')){
            $channelName = Yii::$app->request->post('teleChannelName');
            $page = Yii::$app->request->post('page') ?? 1 ;

            $result =(object)Json::decode(file_get_contents("https://tg.i-c-a.su/json/" . strtolower($channelName) . "/{$page}?limit=100"));
            if(isset($result->errors)){
                $error = $result->errors;
            }else {
                if(isset($result->messages)) {
                    $messages = $result->messages;

                    if ($messages) {
                        foreach ($messages as $item) {
                            if(isset($item['message'])) {
                                preg_match_all("~([a-z0-9\.\-_]+@[a-zA-Z_]+?\.[a-zA-Z]{2,6})~", $item['message'], $match);
                                if ($match[0])
                                    $email[] = $match[0][0];
                            }else{
                                $page = -1;
                            }
                        }
                    } else {
                        $page = -1;
                    } // if-else
                } // if
            } // if-else
        } // if


        return $this->render('parser', [
            "channel" => $channelName,
            "nextPage" => $page + 1,
            "emails" => $email,
            "error" => $error
        ]);
    } // actionParseChannel
}
