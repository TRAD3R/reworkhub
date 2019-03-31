<?php
/**
 * Created by PhpStorm.
 * User: trad3r
 * Date: 12.03.19
 * Time: 7:49
 */

namespace app\helpers\telegramAnswer;


class Root
{
    public $ok; //Boolean
    public $result; //Result

    public function __construct($telegramAnswer)
    {
        $this->ok = $telegramAnswer['ok'];
//        foreach ($telegramAnswer['result'] as $item){
//            $this->result[] = new Result($item);
//        }

        $this->result = $telegramAnswer['result'];
    }
}