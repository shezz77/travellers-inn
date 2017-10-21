<?php

namespace App\Http\Controllers\Auth;

use App\Mail\verifyEmail;
use App\Models\Country;
use App\Models\Role;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
    use ValidatesRequests;
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
//        dd($data);
        return Validator::make($data, [
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'user_name' => 'required|max:255|unique:users',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
            'address' => 'required|max:255',
            'date_of_birth' => 'required',
            'gender' => 'required',
//            'phone_number' => 'required',
            'state_id' => 'required|Integer|min:1'
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array $data
     * @return User
     * @internal param $filename
     */
    protected function create(array $data)
    {
//        dd($data);
        $user = User::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'user_name' => $data['user_name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'address' => $data['address'],
            'date_of_birth' => $data['date_of_birth'],
            'gender' => $data['gender'],
            'phone_number' => $data['phone_number'],
            'verify_token' => Str::random(40),
            'state_id' => $data['state_id'],
        ]);

        $user->roles()->attach(Role::where('name', 'user')->first());
        $thisUser = User::find($user->id);
        $this->sendMail($thisUser);
        Session::flash('success', 'Registered Successfully but very email to login to your account');
        return $user;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showRegistrationForm()
    {
        $countries = Country::all();
        return view('travellers-inn.auth.register', compact('countries'));
    }

    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));


//        $this->guard()->login($user);
        return redirect()->route('first.verify.email');

//        return $this->registered($request, $user)
//            ?: redirect($this->redirectPath());
    }

    /**
     * @param $user
     */
    public function sendMail($user)
    {
        File::makeDirectory(public_path().'/images/users/'.$user->id , 0755, true);
        Mail::to($user['email'])->send(new verifyEmail($user));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function firstVerifyEmail()
    {
        return view('travellers-inn.auth.email.verify-email');
    }

    /**
     *
     */
    public function sendEmailDone($email, $verify_token)
    {
        $user = User::where(['email' => $email, 'verify_token' => $verify_token])->first();

        if($user)
        {
            User::where(['email' => $email, 'verify_token' => $verify_token])->update(['status' => '1', 'verify_token' => null]);
            Session::flash('success', 'Your Account activated, Login to proceed to Travellers-inn');
            return redirect()->route('login');
        }
        else
        {
            Session::flash('error', 'User not found');
            return redirect()->route('register');
        }
    }
}
