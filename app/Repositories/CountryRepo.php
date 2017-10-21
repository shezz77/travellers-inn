<?php
/**
 * Created by PhpStorm.
 * User: soft
 * Date: 5/26/2017
 * Time: 6:07 PM
 */

namespace App\Repositories;


use App\Models\Country;
use App\Models\User;
use App\Repositories\Contracts\ICountryRepo;

class CountryRepo extends BaseRepo implements ICountryRepo
{
    /**
     * UserRepo constructor.
     * @param Country|User $model
     */
    public function __construct(Country $model)
    {
        parent::__construct($model);
    }


    public function fetchUsers(array $params = [])
    {
        // TODO: Implement fetchUsers() method.
    }
}