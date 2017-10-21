<?php

use App\Models\PostUploadedData;
use Illuminate\Database\Seeder;

class PostUploadDataTableSeeder extends Seeder
{
    private $model;

    /**
     * PostUploadDataTableSeeder constructor.
     * @param $model
     */
    public function __construct(PostUploadedData $model)
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

        $postUploadedData = array(

            [
                'post_upload' => '1499170829.jpg',
                'link' => '',
                'url' => '',
                'post_id' => 1
            ],

            [
                'post_upload' => 'https://i.ytimg.com/vi/SlBvOAeksIc/hqdefault.jpg',
                'link' => '<iframe width="480" height="270" src="https://www.youtube.com/embed/SlBvOAeksIc?feature=oembed" frameborder="0" allowfullscreen></iframe>',
                'url' => 'https://www.youtube.com/watch?v=SlBvOAeksIc',
                'post_id' => 2
            ],

            [
                'post_upload' => '1499172699.jpg',
                'link' => '',
                'url' => '',
                'post_id' => 3
            ],

            [
                'post_upload' => '1499173595.png',
                'link' => '',
                'url' => '',
                'post_id' => 4
            ],

            [
                'post_upload' => '1499174015.jpg',
                'link' => '',
                'url' => '',
                'post_id' => 5
            ],

            [
                'post_upload' => '1499174016.jpg',
                'link' => '',
                'url' => '',
                'post_id' => 6
            ],

            [
            'post_upload' => '00.jpg',
            'link' => '',
                'url' => '',
            'post_id' => 7
            ],

            [
            'post_upload' => '2.jpg',
            'link' => '',
                'url' => '',
            'post_id' => 8
            ],

            [
                'post_upload' => '238054-thewallpaper.jpg',
                'link' => '',
                'url' => '',
                'post_id' => 9
            ],

            [
            'post_upload' => 'https://i.ytimg.com/vi/AiHyVQh2dUY/hqdefault.jpg',
            'link' => '<iframe width="480" height="270" src="https://www.youtube.com/embed/AiHyVQh2dUY?feature=oembed" frameborder="0" allowfullscreen></iframe>',
                'url' => 'https://www.youtube.com/watch?v=AiHyVQh2dUY',
                'post_id' => 10
            ]
        );

        DB::table('post_uploaded_datas')->insert($postUploadedData);
    }
}
