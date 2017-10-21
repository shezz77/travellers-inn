<?php
/**
 * Created by PhpStorm.
 * User: Shehz
 * Date: 16-Jun-17
 * Time: 2:34 AM
 */

namespace App\Repositories;


use App\Models\HashTag;
use App\Repositories\Contracts\IHashTagRepo;
use App\Utils\AuthWrapper;
use App\Utils\Globals\AppGlobal;

class HashTagRepo extends BaseRepo implements IHashTagRepo
{
    /**
     * HashTagRepo constructor.
     * @param HashTag $model
     */
    public function __construct(HashTag $model)
    {
        parent::__construct($model);
    }

    public function fetchHashTags(array $params = [])
    {

    }

    /**
     * @param array $columns
     * @return mixed
     */
    public function all($columns = array('*'))
    {
        $limit = isset($columns['limit']) ? $columns['limit'] : AppGlobal::DEFAULT_LIMIT;
        $query = $this->model->select('hash_tags.*');
        if (isset($columns['searchKey']))
        {
            $query->where('name', 'LIKE', '%'. $columns['searchKey']. '%')
                ->orWhere('name', 'LIKE', '%'. $columns['searchKey']. '%');
        }

        if (isset($columns['orderBy']) && is_array($columns['orderBy']))
        {
            $colName = $columns['orderBy'][0];
            $orderType = $columns['orderBy'][1];

            $query->orderBy($colName, $orderType);
        }

        return $query->paginate($limit);
    }

    /**
     * @param array $attributes
     * @param array $options
     * @return bool
     */
    public function update(array $attributes = [], array $options = [])
    {
        $hashTag = $this->find($options['id']);
        $hashTag->fill($attributes);
        $hashTag->save();
    }

    /**
     * @param array $ids
     * @return int
     */
    public function destroy(array $ids)
    {
        $hashTag = $this->find($ids['id']);
        $hashTag->posts()->detach();
        $hashTag->delete();
    }

    public function createNewTags(array $params = [])
    {
        $hashTag = null;
        $result = [];
        $user = AuthWrapper::loggedInUser();

        foreach ($params as $p)
        {
            $hashTag = $this->findBy($p, 'name')->first();
            if (!$hashTag == null)
            {
                $result [] = $hashTag->id;
            }
            else
            {
                $newHashTag = ['name'=> $p, 'description' => 'Created By User'];
                $newTagCreated = $this->create($newHashTag);
                $user->hashTags()->save($newTagCreated);
                $result [] = $newTagCreated->id;
            }
        }
        return($result);
    }

    public function fetchPostsByHashTagId(array $params=[])
    {
        $hashtag = $this->find($params['id']);

        $resultPosts = [];

            $posts = $hashtag->posts;

            foreach ($posts as $post)
            {
                if ($post)
                {
                    $resultPosts[] = $post;
                }
            }
        return $resultPosts;
    }
}