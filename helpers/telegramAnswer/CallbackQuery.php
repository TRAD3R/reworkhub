<?php
/**
 * Created by PhpStorm.
 * User: trad3r
 * Date: 12.03.19
 * Time: 8:49
 */

namespace app\helpers\telegramAnswer;


class CallbackQuery
{
    public $id; //id
    public $chatInstance; //Long
    public $data; //String
    public $from; //From
    public $message; //Integer

    public function __construct($telegramCallbackQuery)
    {
        $this->id = $telegramCallbackQuery['id'];
        $this->chatInstance = $telegramCallbackQuery['chat_instance'];
        $this->data = $telegramCallbackQuery['data'];
        $this->from = new From($telegramCallbackQuery['from']);
        $this->message = new Message($telegramCallbackQuery['message']);
    }
}