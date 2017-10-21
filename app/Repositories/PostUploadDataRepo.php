<?php
/**
 * Created by PhpStorm.
 * User: soft
 * Date: 5/26/2017
 * Time: 6:07 PM
 */

namespace App\Repositories;


use App\Models\Post;
use App\Models\PostUploadedData;
use App\Repositories\Contracts\IPostRepo;
use App\Repositories\Contracts\IPostUploadDataRepo;
use App\Utils\Globals\AppGlobal;

class PostUploadDataRepo extends BaseRepo implements IPostUploadDataRepo
{
    /**
     * UserRepo constructor.
     * @param PostUploadedData $model
     */
    public function __construct(PostUploadedData $model)
    {
        parent::__construct($model);
    }

    /**
     * @param array $params
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function fetchPostUploadData(array $params = [])
    {
        $postUploadData = $this->model->where('post_id', $params)->get();
        return $postUploadData;
    }
}