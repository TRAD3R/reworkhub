<?php
/**
 * Created by PhpStorm.
 * User: trad3r
 * Date: 10.03.19
 * Time: 9:08
 */

namespace app\helpers;


class Helpers
{
    /**
     * https://github.com/hazardland/debug.php/blob/master/debug.php
     * Print array
     * @param $data
     * @param int $indent
     */
    public static function dump($object)
    {
        echo TVarDumper::dump($object);
    }

    /**
     * Print array and die
     * @param $data
     * @param int $indent
     */
    public static function xdump($data)
    {
        self::dump($data);
        die();
    }
}