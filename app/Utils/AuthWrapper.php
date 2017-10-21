<?php
/**
 * Created by PhpStorm.
 * User: soft
 * Date: 5/26/2017
 * Time: 5:28 PM
 */

namespace App\Utils;


use Auth;

class AuthWrapper
{
    public static function check(){
        return Auth::check();
    }

    public static function loggedInUser(){
        return Auth::user();
    }

}