<?php

namespace App\Http\Controllers\TravellersInn;
use App\Http\Requests\UpdateProfileRequest;
use App\Repositories\Contracts\IUserRepo;
use App\Utils\AuthWrapper;
use Illuminate\Foundation\Validation\ValidatesRequests;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\RedirectsUsers;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    use ValidatesRequests;
    use Notifiable;
    /**
     * @var IUserRepo
     */
    private $_userRepo;

    /**
     * UserController constructor.
     * @param IUserRepo $_userRepo
     * @internal param IUserRepo $_user
     */
    public function __construct(IUserRepo $_userRepo)
    {
        $this->_userRepo = $_userRepo;
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function getUserProfile($id)
    {
        $user = $this->_userRepo->find($id);
        return view('travellers-inn.user.profile', compact('user'));
    }

    /**
     * @return mixed
     * @internal param Request $request
     */
    public function followindex()
    {
        return view('users.index', [
            'users' => User::where('id', '!=', Auth::id())->get()
        ]);
    }
    public function follow($id)
    {
        $user1 = null;
        $user2 = null;
        $ok = null;
        $progress = null;

        $followerId = AuthWrapper::loggedInUser()->id;
        // Find user with ID 1
        $user1 = $this->_userRepo->find($followerId);

        // Find user with ID 2
        $user2 = $this->_userRepo->find($id);

        if ($user1 && $user2) {
            $ok = $user1->following()->save($user2);
//            $ok = $user1->unFollow($user2);
        }
        if ($ok != null)
        {
            $progress = 'ok';
        }
        return json_encode(array("progress" => $progress));
    }

    public function unFollow($id)
    {
        $user1 = null;
        $user2 = null;
        $ok = null;
        $progress = null;

        $followerId = AuthWrapper::loggedInUser()->id;
        // Find user with ID 1
        $user1 = $this->_userRepo->find($followerId);

        // Find user with ID 2
        $user2 = $this->_userRepo->find($id);

        if ($user1 && $user2) {
//            $ok = $user1->unFollow($user2);
            $ok = $user1->following()->detach($user2);
        }

        if ($ok != null)
        {
            $progress = 'ok';
        }

        return json_encode(array("progress" => $progress));
    }


    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updatePassword(Request $request)
    {
//        $this->validate($request, array(
//            'oldPassword' => 'required',
//            'newPassword' => 'required|max:20',
//            'confirmPassword' => 'required|same:newPassword'
//        ));


        $user = AuthWrapper::loggedInUser();
        $oldPassword = $request->oldPassword;
        $newPassword = $request->newPassword;

        if (!Hash::check($oldPassword, $user->password))
        {
            Session::flash('error', 'The Password you enter does not match with the database password');
        }else{
            $user->password = Hash::make($newPassword);
            $user->save();
            echo "Password Changed :)";
            Session::flash('Success', 'Password Updated');
        }
        return redirect()->back();
    }

    /**
     * @param UpdateProfileRequest|Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updatePersonal(UpdateProfileRequest $request)
    {
        $inputRequest = $request->all();

        $id = AuthWrapper::loggedInUser()->id;
        $user = $this->_userRepo->find($id);

        $this->_userRepo->update($inputRequest, ['id' => $id]);

//        dd($request->file('image'));
        if($request->hasFile('image')){
            $image = $request->file('image');

            $filename = $image->getClientOriginalName();
            image::make($image)->save( public_path('/images/users/'. $user->id .'/' . $filename ) );

            $user->image = $filename;

        }

//        dd($inputRequest)   ;
        $user->save();

        Session::flash('Success', 'Profile Updated');
        return redirect()->back();
    }
}
