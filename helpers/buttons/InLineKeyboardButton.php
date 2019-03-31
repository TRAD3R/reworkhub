<?php
/**
 * Created by PhpStorm.
 * User: trad3r
 * Date: 11.03.19
 * Time: 19:07
 */

namespace app\helpers\buttons;


class InLineKeyboardButton
{
    public $text;
    public $url;
    public $callback_data;

    public function __construct($text, $url = "", $callback_data = null)
    {
        $this->text = $text;
        $this->url = $url;
        $this->callback_data = $callback_data ?? $text;
    }
}