<?php
/**
 * Created by PhpStorm.
 * User: Shehz
 * Date: 09-Jul-17
 * Time: 11:41 AM
 */

namespace App\Helpers;


use Illuminate\Http\Request;

class RequestHelper
{
    public static function classActiveOnlyPath($path)
    {
        return Request::is($path) ? ' active' : '';
    }

}