<?php
/**
 * Created by PhpStorm.
 * User: soft
 * Date: 9/27/2017
 * Time: 6:14 PM
 */

namespace App\Http\Controllers\Api;


use App\Http\Requests\UpdateProfileRequest;
use App\Repositories\Contracts\IUserRepo;
use App\Utils\AuthWrapper;
use Illuminate\Routing\Controller;
use Intervention\Image\Facades\Image;
use App\Utils\JsonResult;
class UserController extends Controller
{

    private $_userRepo;

    /**
     * UserController constructor.
     */
    public function __construct(IUserRepo $_userRepo)
    {
        $this->_userRepo = $_userRepo;
    }

    public function updatePersonal(UpdateProfileRequest $request , $id)
    {
        $inputRequest = $request->all();

//        $id = AuthWrapper::loggedInUser()->id;
        $user = $this->_userRepo->find($id);

        $this->_userRepo->update($inputRequest, ['id' => $id]);


        if($request->hasFile('image')){
            $image = $request->file('image');

            $filename = $image->getClientOriginalName();
            image::make($image)->save( public_path('/images/users/'. $user->id .'/' . $filename ) );

            $user->image = $filename;

        }
        $user->save();
       return JsonResult::JSONSuccessResult('Profile Updated Successfully', $user);
    }

    public  function  getSetting($id){
        $user = $this->_userRepo->find($id);
        return JsonResult::JSONSuccessResult('Profile Updated Successfully', $user);
    }
}