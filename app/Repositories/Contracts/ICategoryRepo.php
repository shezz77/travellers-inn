<?php
/**
 * Created by PhpStorm.
 * User: soft
 * Date: 5/26/2017
 * Time: 6:04 PM
 */

namespace App\Repositories\Contracts;


interface ICategoryRepo extends IBaseRepo
{
    public function fetchCategories(array $params=[]);

    public function fetchContentTypes(array $params=[]);

    public function fetchDestinations(array $params=[]);

    public function fetchCategoryWithAllChildByTitle(array $params=[]);

    public function fetchCategoryWithImmediateChildByTitle(array $params=[]);

    public function fetchPostsByCategoryTitle(array  $params=[]);

    public function fetchPostsByCategoryId(array $params=[]);

    public function fetchCategoryNameById($id);

}