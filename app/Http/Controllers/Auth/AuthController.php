<?php

namespace Facemash\Http\Controllers\Auth;

use Facemash\User;
use Validator;
use Facemash\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Socialite;
use Auth;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

     protected $redirectPath           = "/" ;
     protected $loginPath              = "/auth/login" ;
     protected $redirectAfterLogout    = "/" ;


    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'getLogout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'username' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'username' => $data['username'],
            'email' => $data['email'],
            //'image_name' => $data['image_name'],
            'password' => bcrypt($data['password']),

        ]);
    }

       public function redirectToProvider()
    {
        return Socialite::driver('facebook')->redirect();
    }


        public function handleProviderCallback()
    {
        $user = Socialite::driver('facebook')->user();

        $data = ['name'=>$user->name,'email'=>$user->email,'password'=>$user->token];
        $userDB = User::where('email',$user->email)->first();

        if(!is_null($userDB)){

            Auth::login($userDB);
        }
        else{

            Auth::login($this->create($userDB));
        }

        return rediret('/');



        // $user->token;
    } 



}
