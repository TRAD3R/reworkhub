<?php


namespace app\helpers;


class ViewHelper
{
    /**
     * Обрезает количество элементов списка до заданного
     * @param string $str - строка, включающая список
     * @param int $count - количество элементов, которые стоит показать
     * @return string
     */
    public static function cutLists($str, $count = 2)
    {
        $delimiter = stripos($str, "ul>") > 0 ? "</li>" : "\n";

        $arr = explode($delimiter, $str);

        if(count($arr) > $count){
            $res = "<ul>";

            for ($i = 0; $i < $count; $i++) {
                $res .= $arr[$i] . "</li>";
            }

            $res .= "</ul>";
        }else{
            $res = $str;
        }

        return $res;
    }
}