<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CountryTableSeeder::class);
        $this->call(StateTableSeeder::class);
        $this->call(ResourceTableSeeder::class);
        $this->call(CategoryTableSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(RoleTableSeeder::class);
        $this->call(PostTableSeeder::class);
        $this->call(PostUploadDataTableSeeder::class);
        $this->call(HashTagTableSeeder::class);
        $this->call(SliderTableSeeder::class);
        $this->call(DiaryTableSeeder::class);
        $this->call(CommentTableSeeder::class);
    }
}
