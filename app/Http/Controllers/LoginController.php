<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
use Exception;
use App\Models\User;
use App\Models\Team;

class LoginController extends Controller
{

    //--------------Google Login--------------//

    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        $user = Socialite::driver('google')->user();
//            dd($user);


        $this->_registerOrLoginUser($user);
        return redirect()->route('user.dashboard');
    }

    //----------------Facebook Login-----------------------//
    public function redirectToFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function handleFacebookCallback()
    {


        $user = Socialite::driver('facebook')->user();

        $this->_registerOrLoginUser($user);
        return redirect()->route('user.dashboard');
    }

    //-------------------Github Login----------------------//
    public function redirectToGithub()
    {
        return Socialite::driver('github')->redirect();
    }

    public function handleGithubCallback()
    {


        $user = Socialite::driver('github')->user();

        $this->_registerOrLoginUser($user);
        return redirect()->route('user.dashboard');
    }

    protected function _registerOrLoginUser($data){
        $user = User::where('email', '=', $data->email)->first();
        If(!$user){
            $user = new User();
            $user->name = $data->name;
            $user->email= $data->email;
            $user->provider_id = $data->id;
            $user->avatar = $data->avatar;
            $user->save();
        }
        Auth::login($user);
    }

}
