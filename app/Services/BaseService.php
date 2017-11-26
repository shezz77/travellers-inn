<?php
/**
 * Created by PhpStorm.
 * User: Shehz
 * Date: 26-Nov-17
 * Time: 7:42 PM
 */

namespace App\Services;


use App\Services\Contracts\IBaseService;

abstract class BaseService implements IBaseService
{
    protected $repository;

    /**
     * BaseService constructor.
     * @param $repository
     */
    public function __construct($repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param array $columns
     * @return mixed
     */
    public function all($columns = array('*'))
    {
        return $this->repository->all();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function find($id)
    {
        return $this->repository->find($id);
    }

    /**
     * @param $attribute
     * @param $column
     * @return mixed
     */
    public function findBy($attribute, $column)
    {
        return $this->repository->findBy($attribute, $column);
    }

    /**
     * @param array $attributes
     * @return mixed
     */
    public function create(array $attributes)
    {
        return $this->repository->create($attributes);
    }

    /**
     * @param array $attributes
     * @param array $options
     * @return mixed
     */
    public function update(array $attributes, array $options)
    {
        return $this->repository->update($attributes, $options);
    }

    /**
     * @param array $ids
     * @return mixed
     */
    public function destroy(array $ids)
    {
        return $this->repository->destroy($ids);
    }

    /**
     * @param array $options
     * @return mixed
     */
    public function save(array $options=[])
    {
        return $this->repository->save($options);
    }

}