<?php
/**
 * Created by PhpStorm.
 * User: trad3r
 * Date: 12.03.19
 * Time: 8:03
 */

namespace app\helpers\telegramAnswer;


class Message
{
    public $chat; //Chat
    public $date; //Integer
    public $from; //From
    public $messageId; //Integer
    public $text; //String

    public function __construct($telegramMessage)
    {
        $this->chat = new Chat($telegramMessage['chat']);
        $this->date = $telegramMessage['date'];
        $this->from = new From($telegramMessage['from']);
        $this->messageId = $telegramMessage['message_id'];
        $this->text = $telegramMessage['text'];
    }
}