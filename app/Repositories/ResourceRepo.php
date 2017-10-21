<?php
/**
 * Created by PhpStorm.
 * User: soft
 * Date: 5/26/2017
 * Time: 7:44 PM
 */

namespace App\Repositories;

use App\Models\Resource;
use App\Repositories\Contracts\IResourceRepo;
use App\Utils\Globals\AppGlobal;

class ResourceRepo extends BaseRepo implements IResourceRepo
{
    /**
     * ResourceRepo constructor.
     * @param Resource $model
     */
    public function __construct(Resource $model)
    {
        parent::__construct($model);
    }

    public function fetchResources(array $params = [])
    {
        $limit = isset($params['limit']) ? $params['limit'] : AppGlobal::DEFAULT_LIMIT;
        $qry = $this->model->select('resources.*');
        if(isset($params['searchKey'])){
            $qry->where('name','LIKE', '%'. $params['searchKey'].'%')
                ->orWhere('display_name','LIKE', '%'. $params['searchKey'].'%')
                ->orWhere('route','LIKE', '%'. $params['searchKey'].'%');
        }
        if(isset($params['orderBy']) && is_array($params['orderBy'])){
            $colName = $params['orderBy'][0];
            $orderType = $params['orderBy'][1];

            $qry->orderBy($colName,$orderType);
        }
        return $qry->paginate($limit);
    }

    public function fetchUsers(array $params=[], array $columns=[])
    {
        $users = null;
        $resource = $this->find($params['id']);
        $users = $resource->users();

        return $users;
    }
}