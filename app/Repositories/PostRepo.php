<?php
/**
 * Created by PhpStorm.
 * User: soft
 * Date: 5/26/2017
 * Time: 6:07 PM
 */

namespace App\Repositories;


use App\Models\Post;
use App\Repositories\Contracts\IPostRepo;
use App\Utils\Globals\AppGlobal;

class PostRepo extends BaseRepo implements IPostRepo
{
    /**
     * UserRepo constructor.
     * @param Post $model
     */
    public function __construct(Post $model)
    {
        parent::__construct($model);
    }


    public function update(array $attributes = [], array $options = [])
    {
        $post = $this->find($options['id']);
        $post->fill($attributes);
        $post->save();
    }

    public function fetchPosts(array $params = [])
    {
        $limit = isset($params['limit']) ? $params['limit'] : AppGlobal::DEFAULT_LIMIT;
        $qry = $this->model->select('posts.*');
        if(isset($params['searchKey'])){
            $qry->where('post_title','LIKE', '%'. $params['searchKey'].'%')
                ->orWhere('post_description','LIKE', '%'. $params['searchKey'].'%');
        }
        if(isset($params['orderBy']) && is_array($params['orderBy'])){
            $colName = $params['orderBy'][0];
            $orderType = $params['orderBy'][1];

            $qry->orderBy($colName,$orderType);
        }
        return $qry->paginate($limit);
    }

    public function fetchMostViewedFirst(array $params = [])
    {
        $posts = $this->model->orderBy('views', 'desc')->get();
        return $posts;
    }

    public function fetchFeaturedPosts(array $params = [])
    {
        $posts = $this->model->where('is_featured', '1')->get();
        return $posts;
    }

    public function fetchPost(array $params = [])
    {
        $post = $this->model->where('id', $params)->first();
        return $post;
    }
}