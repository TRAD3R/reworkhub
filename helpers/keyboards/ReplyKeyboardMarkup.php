<?php
/**
 * Created by PhpStorm.
 * User: trad3r
 * Date: 11.03.19
 * Time: 19:06
 */

namespace app\helpers\keyboards;


class ReplyKeyboardMarkup
{
    public $keyboard = [];
    public $one_time_keyboard = true;
    public $resize_keyboard = true;

    public function addButtons(array $replyKeyboardButtons)
    {
        $this->keyboard[] = $replyKeyboardButtons;
    }
}