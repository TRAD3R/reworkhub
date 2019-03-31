<?php
/**
 * Created by PhpStorm.
 * User: trad3r
 * Date: 11.03.19
 * Time: 19:07
 */

namespace app\helpers\buttons;


class KeyboardButton
{
    public $text;
    public $request_contact;
    public $request_location;

    public function __construct($text, $request_contact = false, $request_location = false)
    {
        $this->text = $text;
        $this->request_contact = $request_contact;
        $this->request_location = $request_location;
    }
}