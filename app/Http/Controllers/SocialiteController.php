<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class SocialiteController extends Controller
{
    //to log in with facebook
    public function redirect($service){

       return Socialite::driver($service)->redirect();
    }

    //after log in callback to my site
    public function callback($service){

        return $user = Socialite::with($service)->user();
    }

}
