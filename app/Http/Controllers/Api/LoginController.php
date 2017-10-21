<?php
/**
 * Created by PhpStorm.
 * User: soft
 * Date: 9/26/2017
 * Time: 9:04 PM
 */

namespace App\Http\Controllers\Api;


use App\Http\Requests\LoginRequest;
use App\Repositories\Contracts\IUserRepo;
use App\Models\User;
use App\Utils\JsonResult;
use Illuminate\Http\Request;
use Auth;

class LoginController
{
    private $_userRepository;

    /**
     * LoginController constructor.
     * @param $_userRepository
     */
    public function __construct(IUserRepo $_userRepository)
    {
        $this->_userRepository = $_userRepository;
    }

    public function getlogin(LoginRequest $request)
    {
        $userdata = array('email' => $request->email,
            'password' => $request->password,);

        if (Auth::attempt($userdata)) {
            $userdata = Auth::User('image');
            $userdata->images = asset('images/users/' . $userdata->id . '/' . $userdata->image);
            return JsonResult::JSONSuccessResult('Sucess', $userdata);
        }
        else
            {
                return JsonResult::JSONErrorResult('Some thing went wrong');

        }

    }

}