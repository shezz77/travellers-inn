<?php

use App\Models\HashTag;
use Illuminate\Database\Seeder;

class HashTagTableSeeder extends Seeder
{
    private $model;

    /**
     * HashTagTableSeeder constructor.
     * @param $model
     */
    public function __construct(HashTag $model)
    {
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

        $this->model->create(array(
            'name' =>  'adventure',
            'description' =>  'Tag for Adventure related posts',
        ));
        $this->model->create(array(
            'name' =>  'Pakistan',
            'description' =>  'Tag for Pakistan related posts',
        ));
        $this->model->create(array(
            'name' =>  'mountain',
            'description' =>  'Tag for mountain related posts',
        ));
        $this->model->create(array(
            'name' =>  'food',
            'description' =>  'Tag for food related posts',
        ));
        $this->model->create(array(
            'name' =>  'italy',
            'description' =>  'Tag for italy related posts',
        ));
        $this->model->create(array(
            'name' =>  'horse riding',
            'description' =>  'Tag for horse riding related posts',
        ));
        $this->model->create(array(
            'name' =>  'sydney',
            'description' =>  'Tag for sydney related posts',
        ));
        $this->model->create(array(
            'name' =>  'Sydney Opera House',
            'description' =>  'Tag for Sydney Opera House related posts',
        ));
        $this->model->create(array(
            'name' =>  'snowboarding',
            'description' =>  'Tag for snowboarding related posts',
        ));
        $this->model->create(array(
            'name' =>  'roadtrips',
            'description' =>  'Tag for roadtrips related posts',
        ));
        $this->model->create(array(
            'name' =>  'travel',
            'description' =>  'Tag for travel related posts',
        ));
        $this->model->create(array(
            'name' =>  'istanbul',
            'description' =>  'Tag for istanbul related posts',
        ));
        $this->model->create(array(
            'name' =>  'beach',
            'description' =>  'Tag for beach related posts',
        ));
        $this->model->create(array(
            'name' =>  'Parrot Island',
            'description' =>  'Tag for Parrot Island related posts',
        ));
        $this->model->create(array(
            'name' =>  'travel tip',
            'description' =>  'Tag for travel tip related posts',
        ));
    }
}

