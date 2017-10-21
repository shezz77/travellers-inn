<?php
/**
 * Created by PhpStorm.
 * User: soft
 * Date: 9/27/2017
 * Time: 1:34 PM
 */

namespace App\Http\Controllers\Api;
use App\Utils\JsonResult;
use Illuminate\Http\Request;
use App\Models\User;
use Hash;
class RegisterController
{
    public function register(Request $request)
    {
        $user =new User();
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->user_name = $request->user_name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->address = $request->address;
        $user->date_of_birth = $request->date_of_birth;
        $user->gender = $request->gender;
        $user->phone_number = $request->phone_number;
        $user->image = $request->image;
        $user->verify_token = $request->verify_token;
        $user->status = $request->status;
        $user->state_id = $request->state_id;
        $user->remember_token = $request->remember_token;
        $user->save();

        return JsonResult::JSONSuccessResult('Register Sucessfully', $user);

    }
}