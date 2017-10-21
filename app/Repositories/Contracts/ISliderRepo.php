<?php
/**
 * Created by PhpStorm.
 * User: soft
 * Date: 5/26/2017
 * Time: 6:04 PM
 */

namespace App\Repositories\Contracts;


interface ISliderRepo extends IBaseRepo
{
    public function fetchSliders(array $params=[]);
    public function fetchSliderById(array $params=[]);

}