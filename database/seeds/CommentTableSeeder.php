<?php

use App\Models\Post;
use App\Models\Comment;
use App\Repositories\Contracts\IPostRepo;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class CommentTableSeeder extends Seeder
{
    private $model;


    public function __construct(Comment $model)
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
//        DB::table('comments')->truncate();

        $comment = array(

            [
                'id' => '1',
                'comment' => 'Awesome Post',
                'post_id' => 1,
                'user_id' => 2,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],

            [
                'id' => '2',
                'comment' => 'Awesome Post',
                'post_id' => 2,
                'user_id' => 4,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],

            [
                'id' => '3',
                'comment' => 'Awesome Post',
                'post_id' => 3,
                'user_id' => 3,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],

            [
                'id' => '4',
                'comment' => 'Awesome Post',
                'post_id' => 4,
                'user_id' => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],

            [
                'id' => '5',
                'comment' => 'Awesome Post',
                'post_id' => 5,
                'user_id' => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],

            [
                'id' => '6',
                'comment' => 'Awesome Post',
                'post_id' => 6,
                'user_id' => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],

            [
                'id' => '7',
                'comment' => 'Awesome Post',
                'post_id' => 7,
                'user_id' => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'id' => '8',
                'comment' => 'Awesome Post',
                'post_id' => 8,
                'user_id' => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'id' => '9',
                'comment' => 'Awesome Post',
                'post_id' => 9,
                'user_id' => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'id' => '10',
                'comment' => 'Awesome post',
                'post_id' => 10,
                'user_id' => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],

        );

        $this->model->insert($comment);


    }
}