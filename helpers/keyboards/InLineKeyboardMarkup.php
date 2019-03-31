<?php
/**
 * Created by PhpStorm.
 * User: trad3r
 * Date: 11.03.19
 * Time: 19:06
 */

namespace app\helpers\keyboards;


class InLineKeyboardMarkup
{
    public $inline_keyboard = [];

    public function addButtons(array $inlineKeyboardButtons)
    {
        $this->inline_keyboard[] = $inlineKeyboardButtons;
    }
}