<?php

use App\Models\User;
use Illuminate\Database\Seeder;
use App\Repositories\Contracts\IUserRepo;

class UserTableSeeder extends Seeder
{
    private $model;
    private $_userRepo;

    public function __construct(IUserRepo $_userRepo , User $model)
    {
        $this->_userRepo = $_userRepo;
        $this->model = $model;
    }


    /**
     * UserTableSeeder constructor.
     * @param $model
     */


    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->model->truncate();

        $this->model->create(array(
            'id' =>  '1',
            'first_name' =>  'Shehzad',
            'last_name' =>  'Aslam',
            'user_name' =>  'Shezi',
            'email' =>   'super@admin.com',
            'password' =>  '$2y$10$MAk9MHM7w8X273K.0JeNd.U5m9MR/TN5sG.AxH9ZQLi/kFiY5vr3O',
            'address' =>  'lahore',
            'date_of_birth' =>   '1995-09-10',
            'gender' =>  'male',
            'phone_number' =>  '03009878282',
            'state_id'  =>  '2727',
            'image' => 'shehzad.JPG',
            'status'  =>  '1',
        ));

        $this->model->create(array(
            'id' =>  '2',
            'first_name' =>  'Jazeb',
            'last_name' =>  'Mazher',
            'user_name' =>  'jazi',
            'email' =>   'jazebmazher728@gmail.com',
            'password' =>  '$2y$10$XxTNlQoUG8d9OFU.QjF0p.c5Lqqz6Xz/Z2ynpAsmE0YPAo6rRZyQ6',
            'address' =>  'lahore',
            'date_of_birth' =>   '1995-09-10',
            'gender' =>  'male',
            'phone_number' =>  '03004212768',
            'image' => 'jazeb.jpg',
            'state_id'  =>  '2726',
            'status'  =>  '1',
        ));

        $this->model->create(array(
            'id' =>  '3',
            'first_name' =>  'Sana',
            'last_name' =>  'Tabasum',
            'user_name' =>  'princess',
            'email' =>   'shireeniman1994@gmail.com',
            'password' =>  '$2y$10$XxTNlQoUG8d9OFU.QjF0p.c5Lqqz6Xz/Z2ynpAsmE0YPAo6rRZyQ6',
            'address' =>  'Dhahira',
            'date_of_birth' =>   '1995-06-17',
            'image' =>   'sana.jpg',
            'gender' =>  'female',
            'phone_number' =>  '',
            'state_id'  =>  '2720',
            'status'  =>  '1',
        ));
        $this->model->create(array(
            'id' =>  '4',
            'first_name' =>  'Mehran',
            'last_name' =>  'Mehru',
            'user_name' =>  'mehru',
            'email' =>   'mehran_57@live.com',
            'password' =>  '$2y$10$XxTNlQoUG8d9OFU.QjF0p.c5Lqqz6Xz/Z2ynpAsmE0YPAo6rRZyQ6',
            'address' =>  'lahore',
            'date_of_birth' =>   '1995-09-10',
            'image' =>   'mehran.JPG',
            'gender' =>  'male',
            'phone_number' =>  '03044981854',
            'state_id'  =>  '2730',
            'status'  =>  '1',
        ));
        $this->model->create(array(
            'id' =>  '5',
            'first_name' =>  'Guest',
            'last_name' =>  'Guest',
            'user_name' =>  'guest',
            'email' =>   'guest@gmail.com',
            'password' =>  '$2y$10$XxTNlQoUG8d9OFU.QjF0p.c5Lqqz6Xz/Z2ynpAsmE0YPAo6rRZyQ6',
            'address' =>  'Punjab',
            'date_of_birth' =>   '1995-09-10',
            'gender' =>  'male',
            'phone_number' =>  '12345678910',
            'state_id'  =>  '2755',
            'status'  =>  '0',
        ));




        $user = $this->_userRepo->find(1);
        $user->following()->sync( [
            0 => "2",
            1 => "3",
            1 => "4",
        ]);
        $user->roles()->sync([
            0 => '1'
        ]);

        $user2 = $this->_userRepo->find(2);
        $user2->following()->sync( [
            0 => "1",
            1 => "3",
            2 => "4"
        ]);
        $user2->roles()->sync([
            0 => '2'
        ]);

        $user3 = $this->_userRepo->find(3);
        $user3->following()->sync( [
            0 => "1",
            1 => "2",
            2 => "4"
        ]);
        $user3->roles()->sync([
            0 => '3'
        ]);

        $user4 = $this->_userRepo->find(4);
        $user4->following()->sync( [
            0 => "1",
            1 => "2",
            2 => "3"
        ]);
        $user4->roles()->sync([
            0 => '5'
        ]);
    }
}

