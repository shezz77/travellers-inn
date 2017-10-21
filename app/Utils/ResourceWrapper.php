<?php
/**
 * Created by PhpStorm.
 * User: soft
 * Date: 7/4/2017
 * Time: 5:08 PM
 */

namespace App\Utils;

class ResourceWrapper
{
    public static function userCount($resource)
    {
        $users = $resource->users();

        return count($users);
    }

}