<?php
/**
 * Created by PhpStorm.
 * User: Shehz
 * Date: 26-Nov-17
 * Time: 7:44 PM
 */

namespace App\Services\Contracts;


interface IBaseService
{
    public function all($columns = array('*'));
    public function find($id);
    public function findBy($attribute, $column);
    public function create(array $attributes);
    public function update(array $attributes, array $options);
    public function destroy(array $ids);
    public function save(array $options=[]);
}