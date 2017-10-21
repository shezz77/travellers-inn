<?php
/**
 * Created by PhpStorm.
 * User: soft
 * Date: 7/28/2017
 * Time: 5:45 PM
 */

namespace App\Utils;


use App\Models\Country;


class CountryWrapper
{
    public static function count(){
        return Country::count();
    }
}