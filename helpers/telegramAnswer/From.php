<?php
/**
 * Created by PhpStorm.
 * User: trad3r
 * Date: 12.03.19
 * Time: 8:04
 */

namespace app\helpers\telegramAnswer;


class From
{
    public $firstName; //String
    public $id; //Integer
    public $isBot; //Boolean
    public $languageCode; //String
    public $username; //String

    public function __construct($telegramFrom)
    {
        $this->firstName = $telegramFrom['first_name'];
        $this->id = $telegramFrom['id'];
        $this->isBot = $telegramFrom['is_bot'];
        $this->languageCode = $telegramFrom['language_code'] ?? null;
        $this->username = $telegramFrom['username'];
    }
}