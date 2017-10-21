<?php
/**
 * Created by PhpStorm.
 * User: soft
 * Date: 5/26/2017
 * Time: 6:04 PM
 */

namespace App\Repositories\Contracts;


interface IResourceRepo extends IBaseRepo
{
    public function fetchResources(array $params=[]);

    public function fetchUsers(array $params=[], array $columns=[]);
}