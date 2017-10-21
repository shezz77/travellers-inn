<?php

use App\Models\Slider;
use Illuminate\Database\Seeder;
use App\Repositories\Contracts\ISliderRepo;

class SliderTableSeeder extends Seeder
{
    private $model;
    private $_sliderRepo;
//
//
    /**
     * SliderTableSeeder constructor.
     * @param ISliderRepo $_sliderRepo
     * @param Slider $model
     * @internal param $Slider $
     */
    public function __construct(ISliderRepo $_sliderRepo, Slider $model)
    {
        $this->_sliderRepo = $_sliderRepo;
        $this->model = $model;
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->model->truncate();


        $slider = array(

            [
                'name' => 'Home Slider',
                'description' => 'home slider',
                'category_id' => 0
            ],

            [
                'name' => 'Asia Slider',
                'description' => 'asia slider',
                'category_id' => 8
            ],

            [
                'name' => 'Pakistan Slider',
                'description' => 'pakistan slider',
                'category_id' => 44
            ],

            [
                'name' => 'India Slider',
                'description' => 'india slider',
                'category_id' => 25
            ],

            [
                'name' => 'Europe Slider',
                'description' => 'europe slider',
                'category_id' => 12
            ],

            [
                'name' => 'Oceania Slider',
                'description' => 'oceania slider',
                'category_id' => 11
            ],

            [
                'name' => 'Default Slider',
                'description' => 'default slider',
                'category_id' => 0
            ],

        );

        $this->model->insert($slider);

        $slider = $this->_sliderRepo->find(1);
        $slider->posts()->sync( [
            0 => "1",
            1 => "5",
            2 => "9",
            3 => "6",
            4 => "7"

        ]);

        $slider = $this->_sliderRepo->find(2);
        $slider->posts()->sync( [
            0 => "1",
            1 => "4",
            2 => "5",
        ]);

        $slider = $this->_sliderRepo->find(3);
        $slider->posts()->sync( [
            0 => "1",
            1 => "5",
        ]);

        $slider = $this->_sliderRepo->find(4);
        $slider->posts()->sync( [
            0 => "4",
            1 => "9",

        ]);

        $slider = $this->_sliderRepo->find(5);
        $slider->posts()->sync( [
            0 => "6",
            1 => "3",
        ]);

        $slider = $this->_sliderRepo->find(6);
        $slider->posts()->sync( [
            0 => "7",
        ]);
    }
}
