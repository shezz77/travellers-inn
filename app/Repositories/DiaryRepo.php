<?php
/**
 * Created by PhpStorm.
 * User: soft
 * Date: 5/26/2017
 * Time: 6:07 PM
 */

namespace App\Repositories;


use App\Models\Diary;
use App\Repositories\Contracts\IDiaryRepo;


class DiaryRepo extends BaseRepo implements IDiaryRepo
{
    /**
     * UserRepo constructor.
     * @param Diary $model
     */
    public function __construct(Diary $model)
    {
        parent::__construct($model);
    }


    public function fetchDiaries(array $params = [])
    {
        // TODO: Implement fetchDiaries() method.
    }

    public function update(array $attributes = [], array $options = [])
    {
        $diary = $this->find($options['id']);
        $diary->fill($attributes);
        return $diary->save();
    }

    public function fetchDiaryNameById($id)
    {
        $diary = Diary::Where('id', 'LIKE', '%' . $id . '%')->first();

        $diaryName = $diary->name;

        return $diaryName;
    }
}