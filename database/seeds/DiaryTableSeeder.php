<?php

use App\Models\Diary;
use Illuminate\Database\Seeder;
use App\Repositories\Contracts\IDiaryRepo;
use Carbon\Carbon;


class DiaryTableSeeder extends Seeder
{
    private $model;
    private $_diaryRepo;

    /**
     * DiaryTableSeeder constructor.
     * @param IDiaryRepo $_diaryRepo
     * @param Diary $model
     * @internal param $_postRepo
     */
    public function __construct(IDiaryRepo $_diaryRepo, Diary $model)
    {
        $this->_diaryRepo = $_diaryRepo;
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
        DB::table('diary_post')->truncate();

        $diaries = array(
            [
                'id' => '1',
                'name' => 'Utrecht & RELIGION',
                'description' => 'The only Dutch Pope was from Utrecht. Without religion, Utrecht may have remained a small
                   village. From the Dom Tower to the pacifiers of children, to the soccer fans; everything is 
                   related to religion.',

                'user_id' => '1',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],

            [
                'id' => '2',
                'name' => 'Wast Water, Lake District National Park',
                'description' => 'Wast Water is England\'s deepest lake, with a depth of 260 feet. 
                Stretching three miles along the Wasdale Valley, 
                Wast Water is also my favourite lake in the Lake District National Park. ',

                'user_id' => '3',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],

            [
                'id' => '3',
                'name' => 'Kayaking at Lux Le Morne',
                'description' => 'Kayaking out into the lagoon is definitely the best way to take in the view of Le Morne Brabant in Mauritius.',

                'user_id' => '2',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],

            [
                'id' => '4',
                'name' => 'Dunnottar Castle',
                'description' => 'The dramatic location and stunning scenery make the castle a must visit!',

                'user_id' => '4',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],


        );

        $this->model->insert($diaries);

        $diary = $this->_diaryRepo->find(1);
        $diary->posts()->sync( [
            0 => "1",
        ]);

        $diary = $this->_diaryRepo->find(2);
        $diary->posts()->sync( [
            0 => "5",
        ]);

        $diary = $this->_diaryRepo->find(3);
        $diary->posts()->sync( [
            0 => "4",
        ]);

        $diary = $this->_diaryRepo->find(4);
        $diary->posts()->sync( [
            0 => "6",
        ]);
    }
}
