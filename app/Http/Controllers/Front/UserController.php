<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\VerifiesEmails;

class UserController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Email Verification Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling email verification for any
    | user that recently registered with the application. Emails may also
    | be re-sent if the user didn't receive the original email message.
    |
    */

    public function showUserName(){

        return "Abdallah-Harp";
    }

    public function getIndex(){
        return view('welcome');
    }

    public function showdata(){

        $data       = [];
        $data['id']   = 4;
        $data['name'] = 'abdallah-harp';

        $obj = new \ stdClass();
        $obj->name = 'Abdallah';
        $obj->id   = 15;
        $arrays = ['abdallah' , 'hassan' , 'hagar'];
        return view('learn',compact('obj','arrays'));
    }

}
