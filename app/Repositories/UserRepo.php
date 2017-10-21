<?php
/**
 * Created by PhpStorm.
 * User: soft
 * Date: 5/26/2017
 * Time: 6:07 PM
 */

namespace App\Repositories;


use App\Models\User;
use App\Repositories\Contracts\IUserRepo;
use App\Utils\AuthWrapper;
use App\Utils\Globals\AppGlobal;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;

class UserRepo extends BaseRepo implements IUserRepo
{
    /**
     * UserRepo constructor.
     * @param User $model
     */
    public function __construct(User $model)
    {
        parent::__construct($model);
    }

    public function fetchUsers(array $params=[])
    {

        $limit = isset($params['limit']) ? $params['limit'] : AppGlobal::DEFAULT_LIMIT;
        $qry = $this->model->select('users.*');
        if(isset($params['searchKey'])){
            $qry->where('first_name','LIKE', '%'. $params['searchKey'].'%')
                ->orWhere('last_name','LIKE', '%'. $params['searchKey'].'%')
                ->orWhere('user_name','LIKE', '%'. $params['searchKey'].'%');
        }
        if(isset($params['orderBy']) && is_array($params['orderBy'])){
            $colName = $params['orderBy'][0];
            $orderType = $params['orderBy'][1];

            $qry->orderBy($colName,$orderType);
        }
        return $qry->paginate($limit);

    }

    public function update(array $attributes = [], array $options = [])
    {
        $user = $this->find($options['id']);
        $user->fill($attributes);
        $user->save();
    }

    public function fetchDiariesByUserId(array $params=[])
    {
        $user = $this->find($params['id']);

        $resultDiary = [];

        $diaries = $user->diaries;

        foreach ($diaries as $diary)
        {
            if ($diary)
            {
                $resultDiary[] = $diary;
            }
        }
        return $resultDiary;
    }

}