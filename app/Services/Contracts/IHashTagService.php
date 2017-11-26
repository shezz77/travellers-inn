<?php
/**
 * Created by PhpStorm.
 * User: Shehz
 * Date: 26-Nov-17
 * Time: 7:58 PM
 */

namespace App\Services\Contracts;


interface IHashTagService extends IBaseService
{
    public function fetchHashTags(array $params=[]);

    public function createNewTags(array $params=[]);

    public function fetchPostsByHashTagId(array $params=[]);
}