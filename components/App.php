<?php
/**
 * Created by PhpStorm.
 * User: danjudex
 * Date: 30.05.16
 * Time: 22:58
 */

namespace app\components;


class App
{
    public static $currentRoute;

    public static function dbStringToArray($string)
    {
        $firstRefsTrimmed = ltrim($string, "{");
        $secondRefsTrimmed = rtrim($firstRefsTrimmed, "}");
        $refsTrimmed = $secondRefsTrimmed;
        return $refsTrimmed;
    }

    public static function renderPosition($string)
    {
        
    }
}
