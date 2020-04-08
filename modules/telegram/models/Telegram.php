<?php
/**
 * Created by PhpStorm.
 * User: trad3r
 * Date: 16.03.19
 * Time: 8:15
 */

namespace app\modules\telegram\models;


use app\helpers\buttons\InLineKeyboardButton;
use app\helpers\buttons\KeyboardButton;
use app\helpers\keyboards\InLineKeyboardMarkup;
use app\helpers\keyboards\ReplyKeyboardMarkup;
use app\helpers\telegramAnswer\CallbackQuery;
use app\helpers\telegramAnswer\Message;
use app\helpers\telegramAnswer\Result;
use app\modules\main\models\Job;
use app\modules\main\models\JobForm;
use Yii;
use yii\helpers\Json;
use yii\helpers\Url;

class Telegram
{
    private $bot;
    private $admins = ['aleksandr8585', 'aleksandrrework', 'trad3r8', 'websalat']; // admin's array
    private $adminChats = [349719901, 583732141, 699972493, 506873756]; // admin's chats array

    public function __construct()
    {
        $this->bot = Yii::$app->teleBot;
    }

    public function getMessage(Result $teleResult){
        if($teleResult->message) {
            if (in_array(strtolower($teleResult->message->chat->username), $this->admins)) {
                if (isset($teleResult->message)) {
                    $result = $this->answerIsMessage($teleResult->message);
                    if ($result->msg) {
                        $this->bot->sendMessage($teleResult->message->chat->id, $result->msg, $result->options);
                    }
                }
            } else {
                $msg = "It is a private bot. Please remove this chat.";
                $this->bot->sendMessage($teleResult->message->chat->id, $msg);
            }
        }elseif ($teleResult->callbackQuery) {
            if (in_array(strtolower($teleResult->callbackQuery->message->chat->username), $this->admins)) {
                if (isset($teleResult->callbackQuery)) {
                    $result = $this->answerIsQuery($teleResult->callbackQuery);
                    if ($result->msg) {
                        $this->bot->editMessage($teleResult->callbackQuery->message->chat->id, $result->msg, $result->options);

                        // Check for other unhandled jobs
                        $teleResult->message = $teleResult->callbackQuery->message;
                        $teleResult->message->text = "/getNew";
                        $teleResult->callbackQuery = null;
                        $this->getMessage($teleResult);
                    }// if
                } // if
            }else {
                $msg = "It is a private bot. Please remove this chat.";
                $this->bot->sendMessage($teleResult->callbackQuery->message->chat->id, $msg);
            }
        }
    } // actionStart

    private function answerIsMessage(Message $message)
    {
        $result = (object) [
            "msg" => "",
            "options" => []
        ];

        $query = $message->text;

        if(preg_match("#\d{4}-\d{2}-\d{2} \d{2}:\d{2}#", $query, $date)){
            $query = $this->setPublishedDate($date, $message);
        }
        switch($query){
            case "/start":
                $result->msg = "Hello";
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
            case "/getNew":
                $result = $this->getNextNewJob();
                break;
            case "/help":
                $result->msg = "/getNew - получить список новых заявок";
                break;
            default:
                $result->msg = "Ошибка сообщения '{$query}'";
        }

        return $result;
    }

    private function answerIsQuery(CallbackQuery $query)
    {
        $result = (object) [
            "msg" => "",
            "options" => []
        ];
        $response = explode("||", $query->data);

        $job = Job::findOne($response[1]);

        if($job){
            switch ($response[0]){
                case 'reject':
                    $job->status = 0;
                    $job->temp_url = "";
                    if($job->save()) {
                        $result->msg = "Вакансия $job->title отклонена";
                    }
                    break;
                case 'defer':
                    $this->setPublished($job->id, $query);
                    exit;
                case 'accept':
                    $view = self::getChannelView($job);

                    $this->bot->sendMessage($this->bot->channelId, $view, ["parse_mode" => "HTML"]);

                    $job->status = 1;
                    $job->temp_url = "";
                    $job->published = time();
                    if($job->save()) {
                        $result->msg = "Вакансия $job->title принята";
                    }
                    break;
            }
        }

        $result->options['message_id'] = $query->message->messageId;
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

    /**
     * Informate admin about new job
     * @param $company
     */
    public function newJob($company)
    {
        foreach ($this->adminChats as $chat){
            $msg = sprintf(Yii::t('app', 'MSG_NEW_JOB'), $company);
            Yii::$app->teleBot->sendMessage($chat, $msg);
        }
    }


    private function getNextNewJob()
    {
        $result = (object) [
            "msg" => "",
            "options" => []
        ];

        $newJob = Job::findNew();
        if($newJob){
            $result->options['reply_markup'] = $this->getNewJobKeyboard($newJob);
            $result->msg = $newJob->title;
        }else{
            $result->msg = "Новых заявок нет.";
        }

        return $result;
    }

    /**
     * Send to bot next new job
     */
    private function getNewJobKeyboard(Job $job)
    {
        $url = Url::base(true) . "/vacancy/0?temp=" . $job->temp_url;
        $inLineKeyboardMarkup = new InLineKeyboardMarkup();
        $inLineKeyboardMarkup->addButtons([
            new InLineKeyboardButton($job->title, $url),
        ]);
        $inLineKeyboardMarkup->addButtons($this->manageJobButtons($job->id));

        return Json::encode($inLineKeyboardMarkup);
    }

    private function manageJobButtons($jobId)
    {
       return  [
            new InLineKeyboardButton(Yii::t('app', 'BTN_REJECT'), "", "reject||$jobId"),
            new InLineKeyboardButton(Yii::t('app', 'BTN_DEFER'), "", "defer||$jobId"),
            new InLineKeyboardButton(Yii::t('app', 'BTN_ACCEPT'), "", "accept||$jobId")
        ];
    }

    public function setPublished($jobId, CallbackQuery $cbq)
    {
        $this->bot->sendMessage($cbq->message->chat->id, "Введите дату публикации в формате  гггг-мм-дд чч:мм");
    }

    public function setPublishedDate($date, $query)
    {
        $job = Job::find()->where(['status' => 2])->orderBy('id')->one();
        $job->published = strtotime($date[0] . ":00");
        $job->status = 3;
        $job->temp_url = "";
        if($job->save()){
            $msg = "Время публикации установлено на " . Yii::$app->formatter->asDatetime($job->published);
        }else{
            $msg = "Ошибка данных. Повторите попытку";
        }

        $this->bot->sendMessage($query->chat->id, $msg);

        return "/getNew";
    }

    /**
     * Create view for publish in channel
     * @param $job
     */
    public static function getChannelView(Job $job)
    {
        $view = file_get_contents(__DIR__ . "/../views/channel.txt");
        $url = "https://reworkhub.com/vacancy/{$job->url}";
        $jobTitle = '<a href="' . $url . '">' . $job->title . '</a>';
        $view = str_replace("[JOB_TITLE]", $jobTitle, $view);
        $companyTitle =  !empty($job->company_title) ? "<b>" . Yii::t('app', "PH_COMPANY") . ":</b>" . PHP_EOL . self::replaceHTML($job->company_title) : "";
        $view = str_replace("[COMPANY_TITLE]", $companyTitle, $view);
        $about = self::replaceHTML($job->company_about);
        $view = str_replace("[COMPANY_ABOUT]", $about, $view);
        $description = self::replaceHTML($job->description);
        $view = str_replace("[JOB_DESCRIPTION]", $description, $view);
        $duties =  !empty($job->duties) ? PHP_EOL . "<b>" . Yii::t('app', "DUTIES") . "</b>" . PHP_EOL . self::replaceHTML($job->duties) : "";
        $view = str_replace("[JOB_DUTIES]", $duties, $view);
        $requirements = !empty($job->requirements) ? "<b>" . Yii::t('app', "REQUIREMENTS") . "</b>" . PHP_EOL . self::replaceHTML($job->requirements) : "";
        $view = str_replace("[JOB_REQUIREMENTS]", $requirements, $view);
        $conditions = !empty($job->conditions) ? PHP_EOL . "<b>" . Yii::t('app', "CONDITIONS") . "</b>" . PHP_EOL . self::replaceHTML($job->conditions) : "";
        $view = str_replace("[JOB_CONDITIONS]", $conditions, $view);
        $salary = self::getSalary($job->min_salary, $job->max_salary, $job->currency);
        $view = str_replace("[SALARY]", $salary, $view);
        $view = str_replace("[CONTACT_NAME]", $job->contact_person_name, $view);
        $view = str_replace("[CONTACT_PHONE]", $job->contact_person_other, $view);
//        $view = str_replace("[CONTACT_EMAIL]", $job->contact_person_email, $view);

        $view = str_replace("&nbsp;", "", $view);
        Yii::info($url, 'telegram');
        return $view;
    }

    private static function replaceHTML($str)
    {
        $result = preg_replace("~\n{2,}~sm", "\n", $str);
//        $result = preg_replace("~<li>\n<p>~sm", "<li><p>", $result);
        $result = preg_replace("~(<p>|</p>|<ul>|</ul>|<ol>|</ol>|<li>|</li>|\t)~", "", $result);
        $result = preg_replace("~(<br />|<br>|</br>)~", "\n", $result);
        $result = html_entity_decode($result);
//        $result = preg_replace("~(&ldquo;|&rdquo;)~", '"', $result);

        $arr = explode("\n", $result);
        $cutArr = [];
        foreach ($arr as $key => $item) {
            if (strlen(strip_tags($item)) < 3){
                unset($arr[$key]);
            }else{
                $cutArr[] = preg_match("~^(-|\d)~", $item) == 1 ? $item : "- {$item}";
                if (count($cutArr) > 3)
                    break;
            }
        }

        $result = implode("\n", $cutArr);
        return $result;
    }

    private static function getSalary($min, $max, $cur)
    {
        if(empty($min) && empty($max)){
            $salary = "";
        }else{
            $salary = "<strong>Оклад</strong>\n";
            if(!empty($min) && !empty($max))
                $salary .= $min . " - " . $max;
            elseif (!empty($min))
                $salary .= Yii::t('app', 'PH_SALARY_FROM') . " " . $min;
            else
                $salary .= Yii::t('app', 'PH_SALARY_TO') . " " . $max;
            $salary .= " " . strtoupper($cur);
        }

        return $salary;
    }
}