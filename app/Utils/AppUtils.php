<?php
/**
 * Created by PhpStorm.
 * User: soft
 * Date: 4/25/2017
 * Time: 6:31 PM
 */

namespace App\Utils;


class AppUtils
{
    public static function route($route, $param = null)
    {
        $url = null;
        if ($param =! null)
        {
            $url = route($route, $param);
            return $url;
        }

        $url = route($route);
        return $url;
    }
}