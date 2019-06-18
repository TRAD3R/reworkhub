<?php


namespace app\modules\telegram\models;


use app\modules\main\models\Filter;
use app\modules\main\models\UserTelegram;
use TelegramBot\Api\Types\ReplyKeyboardHide;
use TelegramBot\Api\Types\ReplyKeyboardRemove;
use yii\helpers\Url;
use TelegramBot\Api\BotApi;
use TelegramBot\Api\Types\ReplyKeyboardMarkup;
use TelegramBot\Api\Types\Update;
use Yii;

class TelegramCV
{
    private $bot;
    private $chatId;

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
        $userTelegramId = $this->getUserTelegramId($update->getMessage()->getFrom()->getId());
        $message = $update->getMessage()->getText();
        $this->chatId = $update->getMessage()->getChat()->getId();
        if(mb_substr($message, 0, 1) === '#'){
            $this->gotFilter(mb_substr($message, 1));

        }else {
            switch (strtolower($message)) {
                case "/start":
                    $this->startMenu();
                    break;
                case strtolower(Yii::t('bot-cv', 'ADD_SUMMARY')):
                    $this->bot->sendMessage($this->chatId, YII::t('bot-cv', 'GOTO_SUMMARY_ADD'
                        , ['url' => Url::to('summary/add', true)])
                        , 'HTML'
                        , true
                        , null
                        , new ReplyKeyboardRemove());
                    break;
                case strtolower(Yii::t('bot-cv', 'SEARCH_SUMMARIES')):
                    $this->createFilter(1);
                    break;
            }
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
    private function startMenu()
    {
        $keyboard = [
            [Yii::t('bot-cv', 'ADD_SUMMARY'), Yii::t('bot-cv', 'SEARCH_SUMMARIES')]
        ];

        $replyMarkup = new ReplyKeyboardMarkup($keyboard, true, true);
//        $btnSearchSummary = new InLineKeyboardButton(Yii::t('bot-cv', 'SEARCH_SUMMARIES'), '', 'callback');
//        $keyboard = [
//            [$btnAddSummary, $btnSearchSummary]
//        ];
//
//        $inlineMarkup = new InlineKeyboardMarkup($keyboard);


        $this->bot->sendMessage($this->chatId, Yii::t('bot-cv', 'CHOOSE_ACTION')
            , null
            , null
            , null
            , $replyMarkup);
    }

    /**
     * @param $level
     * @throws \TelegramBot\Api\Exception
     * @throws \TelegramBot\Api\InvalidArgumentException
     */
    private function createFilter($level)
    {
        $filters = Filter::findAllByLevel($level);

        $keyboard = [];
        $iterator = 0;
        $lineCount = 0;
        foreach ($filters as $id => $filter){
            $keyboard[$iterator][] = "#" . $filter;
            if(++$lineCount % 2 == 0){
                $iterator++;
                $lineCount = 0;
            }
        }

        $replyMarkup = new ReplyKeyboardMarkup($keyboard, true, true);

        $this->bot->sendMessage($this->chatId, Yii::t('bot-cv', 'SELECT_SPHERE')
            , null
            , null
            , null
            , $replyMarkup);
    }

    private function gotFilter($filter)
    {
        $message = Yii::t('bot-cv', 'FOUND_COUNT_SUMMARIES', ['sphere' => $filter, 'count' => 0]);
        $this->bot->sendMessage($this->chatId
            , $message, null
            , null
            , null
            , new ReplyKeyboardRemove());
    }

    /**
     * @param $telegram_id
     * @return UserTelegram|null
     */
    private function getUserTelegramId($telegram_id)
    {
        if($telegramUser = UserTelegram::findOne(['telegram_id' => $telegram_id])){
            return $telegramUser;
        }else{
            $telegramUser = new UserTelegram();
            $telegramUser->telegram_id = "$telegram_id";
        }

        return $telegramUser;
    }

}