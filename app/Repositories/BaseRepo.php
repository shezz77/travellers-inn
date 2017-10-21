<?php
/**
 * Created by PhpStorm.
 * User: mrashid
 * Date: 4/26/2017
 * Time: 2:24 PM
 */

namespace App\Repositories;


use App\Repositories\Contracts\IBaseRepo;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

abstract class BaseRepo  implements IBaseRepo
{
    protected $model;
    protected $db;


    /**
     * BaseRepo constructor.
     * @param Model $model
     */
    public function __construct($model)
//    public function __construct(Category $model)
    {
        $this->model = $model;
//        $this->db = DB::table($model->getTable());
        $this->db = new DB();
    }

    /**
     * @param array $columns
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function all($columns = array('*')){
        return $this->model->all($columns);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function find($id){
        $modelName = get_class($this->model);
        $model = $modelName::find($id);
        return $model;
    }

    /**
     * @param $attribute
     * @param $column
     */
    public function findBy($attribute, $column)
    {
        $modelName = get_class($this->model);
        $model = $modelName::where($column, $attribute)->get();
        return $model;
    }


    /**
     * @param array $attributes
     * @return mixed
     */
    public function create(array $attributes){
        return $this->model->create($attributes);
    }

    /**
     * @param array $attributes
     * @param array $options
     * @return bool
     */
    public function update(array $attributes = [], array $options = []){
        return $this->model->update($options);
    }


    /**
     * @param array $ids
     * @return int
     */
    public function destroy(array $ids){
        return $this->model->destroy($ids);
    }

    /**
     * @param array $options
     * @return bool
     */
    public function save(array $options=[]){
        return $this->model->save($options);
    }

    /**
     * @return mixed
     */
    public function getNewModel(){
        $modelName = get_class($this->model);
        $model = new $modelName();
        return $model;
    }
}