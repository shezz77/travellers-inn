<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\TravellersInn\UserController;
use App\Models\SocialLogin;
use App\Models\User;
use App\Models\Visitor;
use App\Utils\Globals\AppGlobal;
use function Faker\Provider\pt_BR\check_digit;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class LoginController extends Controller
{
    use ValidatesRequests;
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';


    /**
     * Create a new controller instance.
     *
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }

    public function showLoginForm()
    {
        return view('travellers-inn.auth.login');
    }

    public function login(Request $request)
    {
        $this->validateLogin($request);

        // If the class is using the ThrottlesLogins trait, we can automatically throttle
        // the login attempts for this application. We'll key this by the username and
        // the IP address of the client making these requests into this application.
        if ($this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }

        if ($this->attemptLogin($request)) {
            $visitor = new Visitor;
            $visitor->user_id = Auth::user()->id;
            $visitor->ip_address = $request->ip();
            $visitor->save();
            return $this->sendLoginResponse($request);
        }

        // If the login attempt was unsuccessful we will increment the number of attempts
        // to login and redirect the user back to the login form. Of course, when this
        // user surpasses their maximum number of attempts they will get locked out.
        $this->incrementLoginAttempts($request);

        return $this->sendFailedLoginResponse($request);
    }

    /**
     * Get the needed authorization credentials from the request.
     *
     * @param Request|\Illuminate\Http\Request $request
     * @return array
     */
    protected function credentials(Request $request)
    {
//        return $request->only($this->username(), 'password');
        return ['email' => $request->{$this->username()}, 'password' => $request->password, 'status' => '1'];
    }

    /**
     * Redirect the user to the GitHub authentication page.
     *
     * @param $provider
     * @return Response
     */
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return Response
     */
    public function handleProviderCallback($provider)
    {
        try
        {
            $socialUser = Socialite::driver($provider)->user();
        }
        catch (\Exception $e)
        {
            return redirect('/');
        }

        $findUser = SocialLogin::where('social_id', $socialUser->getId())->first();

        if ($findUser)
        {
            $user = $findUser->user;
            Auth::login($user);
            return redirect()->route('traveller-inn-home');
        }
        else
        {
            $users_detaails = explode(" ", $socialUser->name);
            $user = User::firstOrCreate([
                'user_name' => $socialUser->name,
                'first_name' => $users_detaails[0],
                'last_name' => 'social',
                'email' => $socialUser->email,
                'password' => bcrypt(123456),
                'address' => 'social',
                'date_of_birth' => '1995-09-10',
                'gender' => 'social',
                'phone_number' => 'social',
                'status' => 1,
                'state_id' => 2732,
            ]);

            $user->socialLogins()->create([
               'social_id' => $socialUser->getId(),
                'provider' => $provider
            ]);

//            $user->user_name = $socialUser->name;
//            $user->first_name = "social";
//            $user->last_name = "social";
//            $user->email = $socialUser->email;
//            $user->password = bcrypt(123456);
//            $user->address = "social";
//            $user->date_of_birth = "1995-09-10";
//            $user->gender = $socialUser->user['gender'];
//            $user->phone_number = "social";
//            $user->status = 1;
//            $user->state_id = 2732;
//
//            $user->save();

            Auth::login($user);
            return redirect()->route('traveller-inn-home');
        }
    }

    protected function authenticated(Request $request, $user)
    {
        $roles = $user->roles;
        $hasAdminRole = null;
        foreach ($roles as $role){
            if ($role->id == AppGlobal::SUPER_ADMIN){
                return redirect()->route('admin.index');
            }else{
                $roleToUpper = strtoupper($role->name);
                $hasAdminRole = array_search($roleToUpper, AppGlobal::ADMIN_ROLES);
                if ( $hasAdminRole ) {
                    return redirect()->route('admin.index');
                }
            }
        }

        return redirect()->route('traveller-inn-home');
    }

}
