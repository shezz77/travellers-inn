<?php
/**
 * Created by PhpStorm.
 * User: soft
 * Date: 9/27/2017
 * Time: 5:25 PM
 */

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Support\Facades\Password;
use Illuminate\Foundation\Validation\ValidatesRequests;
use App\Utils\JsonResult;

class ResetPasswordController extends Controller
{
    use ResetsPasswords;
    use ValidatesRequests;

    public function __construct()
    {
        $this->middleware('guest');
    }

    public function reset(Request $request)
    {
        $this->validate($request, $this->rules(), $this->validationErrorMessages());
        $response = $this->broker()->reset(
            $this->credentials($request), function ($user, $password) {
            $this->resetPassword($user, $password);
        }
        );
        if ($request->wantsJson()) {
            if ($response == Password::PASSWORD_RESET) {
                return JsonResult::JSONSuccessResult('Password Reset Sucessfully');
            } else {
                return JsonResult::JSONErrorResult('Token Invalid');
            }
        }
        if ($response == Password::PASSWORD_RESET) {
            return $this->sendResetResponse($response);
        } else {
            return $this->sendResetFailedResponse($request, $response);
        }
    }
}