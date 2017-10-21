<?php

use App\Models\Role;
use App\Repositories\Contracts\IUserRepo;
use App\Repositories\Contracts\IRoleRepo;
use App\Repositories\Contracts\IResourceRepo;
use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    private $_userRepo;
    private $_roleRepo;
    private $_resourceRepo;
    private $model;

    /**
     * Run the database seeds.
     *
     * @param IUserRepo $_userRepo
     * @param IRoleRepo $_roleRepo
     * @param IResourceRepo $_resourceRepo
     * @param Role $mode
     */
    public function __construct(IUserRepo $_userRepo ,IRoleRepo $_roleRepo ,IResourceRepo $_resourceRepo, Role $mode)
    {
        $this->_userRepo = $_userRepo;
        $this->_roleRepo = $_roleRepo;
        $this->_resourceRepo = $_resourceRepo;
        $this->model = $mode;
    }
    public function run()
    {
        $this->model->truncate();

        $this->model->create(array(
            'name' =>  'super_admin',
            'display_name' =>  'Super Admin',
            'description' =>  'Overall system administrator',
        ));
        $this->model->create(array(
            'name' =>  'admin',
            'display_name' =>  'Admin',
            'description' =>  'Overall system administrator',
        ));
        $this->model->create(array(
            'name' =>  'editor',
            'display_name' =>  'Editor',
            'description' =>  'Edit overall system post',
        ));
        $this->model->create(array(
            'name' =>  'manager',
            'display_name' =>  'Manager',
            'description' =>  'Manage overall system',
        ));
        $this->model->create(array(
            'name' =>  'registered',
            'display_name' =>  'Registered User',
            'description' =>  'Register User have authentication to visit the system',
        ));
        $this->model->create(array(
            'name' =>  'guest',
            'display_name' =>  'Guest',
            'description' =>  'Guest have authentication to visit the system',
        ));
        $role=$this->_roleRepo->find(1);
        $role->resources()->sync( [
            0 => "1",
            1 => "2",
            2 => "3",
            3 => "4",
            4 => "5",
            5 => "6",
            6 => "7",
            7 => "8",
            8 => "9",
            9 => "10",
            10 => "11",
            11 => "12",
            12 => "13",
            13 => "14",
            14 => "15",
            15 => "16",
            16 => "17",
            17 => "18",
            18 => "19",
            19 => "20",
            20 => "21",
            21 => "22",
            22 => "23",
            23 => "24",
            24 => "25",
            25 => "26",
            26 => "27",
            27 => "28",
            28 => "29",
            29 => "30",
            30 => "31",
            31 => "32",
            32 => "33",
            33 => "34",
            34 => "35",
            35 => "36",
            36 => "37",
            37 => "38",
            38 => "39",
            39 => "40",
            40 => "41",
            41 => "42",
            42 => "43",
            43 => "44",
            44 => "45",
            45 => "46",
        ]);
        $role=$this->_roleRepo->find(2);
        $role->resources()->sync( [
            0 => "1",
            12 => "13",
            13 => "14",
            14 => "15",
            15 => "16",
            16 => "17",
            17 => "18",
            18 => "19",
            19 => "20",
            20 => "21",
            21 => "22",
            22 => "23",
            23 => "24",
            24 => "25",
            25 => "26",
            26 => "27",
            27 => "28",
            28 => "29",
            29 => "30",
            30 => "31",
            31 => "32",
            32 => "33",
            33 => "34",
            34 => "35",
            35 => "36",
            36 => "37",
            37 => "38",
            38 => "39",
            39 => "40",
            40 => "41",
            41 => "42",
            42 => "43",
            43 => "44",
            44 => "45",
            45 => "46",

        ]);
        $role=$this->_roleRepo->find(3);
        $role->resources()->sync( [
            0 => "1",
            18 => "19",
            19 => "20",
            20 => "21"

        ]);
        $role=$this->_roleRepo->find(4);
        $role->resources()->sync( [
            0 => "1",
            18 => "19",
            19 => "20",
            20 => "21",
            21 => "22",
            22 => "23",
            23 => "24",
            24 => "25",
            25 => "26",
            26 => "27",
            27 => "28",
            28 => "29",
            29 => "30",
            30 => "31",
            31 => "32",
            32 => "33",
            33 => "34",
            34 => "35",
            35 => "36",
            36 => "37",
            37 => "38",
            38 => "39",
        ]);
        $role=$this->_roleRepo->find(5);
        $role->resources()->sync( [

        ]);
        $role=$this->_roleRepo->find(6);
        $role->resources()->sync( [

        ]);

    }

}

