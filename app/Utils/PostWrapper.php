<?php
/**
 * Created by PhpStorm.
 * User: Shehz
 * Date: 16-Jun-17
 * Time: 2:09 AM
 */

namespace App\Utils;


use App\Models\Post;

class PostWrapper
{
    public static function count(){
        return Post::count();
    }

    public static function posts()
    {
        return Post::all();
    }
}