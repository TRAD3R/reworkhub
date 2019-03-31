<?php
/**
 * Created by PhpStorm.
 * User: trad3r
 * Date: 16.03.19
 * Time: 8:16
 */

namespace app\commands;


use app\helpers\buttons\InLineKeyboardButton;
use app\helpers\keyboards\InLineKeyboardMarkup;
use app\helpers\buttons\KeyboardButton;
use app\helpers\keyboards\ReplyKeyboardMarkup;
use app\modules\main\models\Job;
use app\modules\telegram\models\Telegram;
use Yii;
use yii\console\Controller;

use app\helpers\telegramAnswer\CallbackQuery;
use app\helpers\telegramAnswer\Result;
use app\helpers\telegramAnswer\Root;
use yii\helpers\HtmlPurifier;
use yii\helpers\Json;

class TelegramController extends Controller
{
    /**
     * Published deffered job in channel
     */
    public function actionPublish()
    {
        $bot = Yii::$app->teleBot;
        $jobs = Job::findDeffered();
        if($jobs){
            /** @var  $job Job*/
            foreach ($jobs as $job){
                $view = Telegram::getChannelView($job);
                $options = [
                    "parse_mode" => "HTML"
                ];

                $bot->sendMessage($bot->channelId, $view, $options);
                $job->status = 1;
                $job->save();
                echo date("h:i", time());

            }
        }
    }

    public function actionStart(){
        $bot = Yii::$app->teleBot;
        $lastUpdateId = 0;

        while(true){
            $teleResult = new Root($bot->getUpdates($lastUpdateId));

            if($teleResult->ok && is_array($teleResult->result)){
                foreach ($teleResult->result as $item){
                    $item = new Result($item);
                    $lastUpdateId = $item->updateId + 1;

                    if(isset($item->message)){
                        $result = $this->answerIsMessage($item->message->text);
                        if($result->msg) {
                            Yii::$app->teleBot->sendMessage($item->message->chat->id, $result->msg, $result->options);
                        }
                    }if(isset($item->callbackQuery)){
                        $result = $this->answerIsQuery($item->callbackQuery);
                        if($result->msg) {
                            Yii::$app->teleBot->editMessage($item->callbackQuery->message->chat->id, $result->msg, $result->options);
                        }// if
                    } // if
                } // foreach
            } // if
            sleep(3);
        } // while
    } // actionStart

    private function answerIsMessage($query)
    {
        $result = (object) [
            "msg" => "",
            "options" => []
        ];
        switch($query){
            case "/start":
                $result->msg = "<strong>Hello</strong>";
                $result->options['parse_mode'] = "HTML";
                break;
            case "/end":
                $result->msg = "Buy";
                break;
            case "/menu":
                echo "menu";
                $result->options['reply_markup'] = $this->createReplyKeyboard();
                $result->msg = "Выберите действие";
                break;
            case "/adv_menu":
                $result->options['reply_markup'] = $this->createInlineKeyboard();
                $result->msg = "ADV MENU";
                break;
            case "/help":

                break;
            case "/setWebhook":
                Yii::$app->teleBot->setWebHook();
                break;
            case "/deleteWebhook":
                Yii::$app->teleBot->deleteWebHook();
                break;
            case "/getWebhookInfo":
                Yii::$app->teleBot->getWebhookInfo();
                break;
            default:
                $result->msg = "Вы прислали мне сообщение '{$query}', на которое я не знаю ответ.";
        }

        return $result;
    }

    private function createInlineKeyboard()
    {
        $inLineKeyboardMarkup = new InLineKeyboardMarkup();
        $inLineKeyboardMarkup->addButtons([
            new InLineKeyboardButton("but1", 'ya.ru'),
            new InLineKeyboardButton("but2", "", "callback1"),
        ]);

        return $inLineKeyboardMarkup;
    }

    private function createReplyKeyboard()
    {
        $replyKeyboardMarkup = new ReplyKeyboardMarkup();
        $replyKeyboardMarkup->addButtons([
            new KeyboardButton("prev"),
            new KeyboardButton("next"),
        ]);

        return $replyKeyboardMarkup;
    }

    private function answerIsQuery(CallbackQuery $query){
        $result = (object) [
            "msg" => "",
            "options" => []
        ];

        $result->msg = $query->data;

        $result->options['message_id'] = $query->message->messageId;
        $result->options['reply_markup'] = $result->options['reply_markup'] = $this->createKeyboard();
        return $result;
    }
}