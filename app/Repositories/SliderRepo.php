<?php
/**
 * Created by PhpStorm.
 * User: soft
 * Date: 5/26/2017
 * Time: 6:07 PM
 */

namespace App\Repositories;


use App\Models\Slider;
use App\Repositories\Contracts\ISliderRepo;

class SliderRepo extends BaseRepo implements ISliderRepo
{
    /**
     * UserRepo constructor.
     * @param Slider $model
     */
    public function __construct(Slider $model)
    {
        parent::__construct($model);
    }

    public function fetchSliders(array $params = [])
    {
        $slider = $this->model->where('category_id', $params)->get();
        return $slider;
    }

    public function fetchSliderById(array $params = [])
    {
        $slider = $this->model->where('id', $params)->get();
        return $slider;
    }

    public function update(array $attributes = [], array $options = [])
    {
        $slider = $this->find($options['id']);
        $slider->fill($attributes);
        return $slider->save();
    }
}