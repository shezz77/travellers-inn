<?php
/**
 * Created by PhpStorm.
 * User: soft
 * Date: 5/26/2017
 * Time: 6:04 PM
 */

namespace App\Repositories\Contracts;


interface IHashTagRepo extends IBaseRepo
{
    public function fetchHashTags(array $params=[]);

    public function createNewTags(array $params=[]);

    public function fetchPostsByHashTagId(array $params=[]);
}