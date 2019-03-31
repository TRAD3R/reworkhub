<?php
/**
 * Created by PhpStorm.
 * User: trad3r
 * Date: 11.03.19
 * Time: 15:05
 */

namespace app\helpers\buttons;


class Buttons
{
    private $buttons;

    public function __construct(array $buttons)
    {
        foreach ($buttons as $button){
            $this->buttons[] = $button;
        }
    }

    /**
     * @return mixed
     */
    public function getButtons()
    {
        return $this->buttons;
    }


}