<?php
/**
 * Created by PhpStorm.
 * User: trad3r
 * Date: 12.03.19
 * Time: 8:05
 */

namespace app\helpers\telegramAnswer;


class Chat
{
    public $firstName; //String
    public $id; 
    public $type; //String
    public $username; //String

    public function __construct($telegramChat)
    {
        $this->firstName = $telegramChat['first_name'];
        $this->id = $telegramChat['id'];
        $this->type = $telegramChat['type'];
        $this->username = $telegramChat['username'];
    }

}