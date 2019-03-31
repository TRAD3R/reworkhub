<?php
/**
 * Created by PhpStorm.
 * User: trad3r
 * Date: 12.03.19
 * Time: 8:02
 */

namespace app\helpers\telegramAnswer;


class Result
{
    public $message; //Message
    public $updateId; //Integer
    public $callbackQuery;

    public function __construct($telegramResult)
    {
        $this->updateId = $telegramResult['update_id'];
        if(!empty($telegramResult['message'])){
            $this->message = new Message($telegramResult['message']);
        }

        if(!empty($telegramResult['callback_query'])){

            $this->callbackQuery = new CallbackQuery($telegramResult['callback_query']);
        }
    }
}