<?php
/**
 * Created by PhpStorm.
 * User: mrashid
 * Date: 4/26/2017
 * Time: 2:40 PM
 */

namespace App\Repositories\Contracts;


use Illuminate\Database\Eloquent\Model;

interface IBaseRepo
{
    public function all($columns = array('*'));
    public function find($id);
    public function findBy($attribute, $column);
    public function create(array $attributes);
    public function update(array $attributes, array $options);
    public function destroy(array $ids);
    public function save(array $options=[]);
    public function getNewModel();
}