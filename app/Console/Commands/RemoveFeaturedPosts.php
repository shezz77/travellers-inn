<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Carbon\Carbon;
Use DB;
use App\Models\Post;

class RemoveFeaturedPosts extends Command
{
    private $model;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'RemoveFeaturedPosts:deleteposts';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Remove Featured Posts';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(Post $model)
    {
        $this->model = $model;
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $posts = $this->model->where('ending_time', '<', Carbon::now())->get();

        foreach ($posts as $post){
            $post->is_featured = 0;
            $post->update();
        }
    }
}
