<?php


namespace app\modules\telegram\models;


use app\helpers\buttons\InLineKeyboardButton;
use TelegramBot\Api\Types\ReplyKeyboardRemove;
use yii\helpers\Url;
use \TelegramBot\Api\Types\Inline\InlineKeyboardMarkup;
use TelegramBot\Api\BotApi;
use TelegramBot\Api\Types\ReplyKeyboardHide;
use TelegramBot\Api\Types\ReplyKeyboardMarkup;
use TelegramBot\Api\Types\Update;
use Yii;

class TelegramCV
{
    private $bot;

    public function __construct(BotApi $bot)
    {
        $this->bot = $bot;
    }

    /**
     * @param Update $update
     * @throws \TelegramBot\Api\Exception
     * @throws \TelegramBot\Api\InvalidArgumentException
     */
    public function getMessage(Update $update)
    {

        $message = $update->getMessage()->getText();
        $chat_id = $update->getMessage()->getChat()->getId();
        switch (strtolower($message)){
            case "/start":
                $this->startMenu($chat_id);
                break;
            case strtolower(Yii::t('bot-cv', 'ADD_SUMMARY')):
                var_dump(Url::to('summary/add', true));
                $this->bot->sendMessage($chat_id, YII::t('bot-cv', 'GOTO_SUMMARY_ADD', ['url' => Url::to('summary/add', true)]), 'HTML', null, null, new ReplyKeyboardRemove());
                break;
            case strtolower(Yii::t('bot-cv', 'SEARCH_SUMMARIES')):

                break;
        }
    }

    /**
     * @param Update $update
     * @throws \TelegramBot\Api\Exception
     * @throws \TelegramBot\Api\InvalidArgumentException
     */
    public function getCallback(Update $update)
    {

        $message = $update->getCallbackQuery();
        var_dump($message);
//        switch ($message){
//            case "/start":
//                $this->startMenu($update->getMessage()->getChat()->getId());
//                break;
//        }
    }

    /**
     * @param $chat_id
     * @throws \TelegramBot\Api\Exception
     * @throws \TelegramBot\Api\InvalidArgumentException
     */
    private function startMenu($chat_id)
    {
        $keyboard = [
            [Yii::t('bot-cv', 'ADD_SUMMARY'), Yii::t('bot-cv', 'SEARCH_SUMMARIES')],
            []
        ];

        $replyMarkup = new ReplyKeyboardMarkup($keyboard, true, true);
//        $btnSearchSummary = new InLineKeyboardButton(Yii::t('bot-cv', 'SEARCH_SUMMARIES'), '', 'callback');
//        $keyboard = [
//            [$btnAddSummary, $btnSearchSummary]
//        ];
//
//        $inlineMarkup = new InlineKeyboardMarkup($keyboard);


        $response = $this->bot->sendMessage($chat_id, Yii::t('bot-cv', 'CHOOSE_ACTION'), null, null, null, $replyMarkup);
    }

}