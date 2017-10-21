<?php
/**
 * Created by PhpStorm.
 * User: Shehz
 * Date: 16-Jun-17
 * Time: 1:58 AM
 */

namespace App\Utils;


use App\Models\User;

class UserWrapper
{
    public static function count(){
        return User::count();
    }

}