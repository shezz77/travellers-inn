<?php
/**
 * Created by PhpStorm.
 * User: soft
 * Date: 5/26/2017
 * Time: 6:04 PM
 */

namespace App\Repositories\Contracts;


interface IPostRepo extends IBaseRepo
{
    public function fetchPosts(array $params=[]);

    public function fetchMostViewedFirst(array $params=[]);

    public function fetchFeaturedPosts(array $params=[]);

    public function fetchPost(array $params=[]);
}