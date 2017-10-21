<?php
/**
 * Created by PhpStorm.
 * User: soft
 * Date: 9/27/2017
 * Time: 3:36 PM
 */

namespace App\Http\Controllers\Api;
use Illuminate\Routing\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use App\Models\User;
use App\Utils\JsonResult;

class ForgotPasswordController extends Controller
{
    use ValidatesRequests;


    use SendsPasswordResetEmails;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function getResetToken(Request $request)
    {
        $this->validate($request, ['email' => 'required|email']);
        if ($request->wantsJson()) {
            $user = User::where('email', $request->input('email'))->first();
            if (!$user) {
                return JsonResult::JSONErrorResult('Email not found');
            }
            $token = $this->broker()->createToken($user);
            return JsonResult::JSONSuccessResult('Token get successfully', $token);
        }


}

}