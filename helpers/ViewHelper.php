<?php


namespace app\helpers;


class ViewHelper
{
    public static function cutLists($str)
    {
        $arr = explode("</li>", $str);

        if(count($arr) > 3){
            $res = "<ul>";

            $res .= $arr[0] . "</li>";
            $res .= $arr[1] . "</li>";

            $res .= "</ul>";
        }else{
            $res = $str;
        }

        return $res;
    }
}