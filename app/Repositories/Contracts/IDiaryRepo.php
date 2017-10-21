<?php
/**
 * Created by PhpStorm.
 * User: soft
 * Date: 5/26/2017
 * Time: 6:04 PM
 */

namespace App\Repositories\Contracts;


interface IDiaryRepo extends IBaseRepo
{
    public function fetchDiaries(array $params=[]);

    public function fetchDiaryNameById($id);
}