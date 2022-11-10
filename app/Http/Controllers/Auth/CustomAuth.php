<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use function MongoDB\Driver\Monitoring\removeSubscriber;

class CustomAuth extends Controller
{
    #########Middleware#############
    public function adults(){

        return view('CustomAuth.index');
    }

    ########## Guards #############
    public function site(){
        return view('site');
    }

    public function admin(){

        return view('admin');
    }

    ################# admin login ##########
    public function adminLogin(){

        return view('auth.adminLogin');
    }
    //login
    public function checkAdminlogin(Request $request){

        //validate
        $this->validate($request,[
            'email'    => 'required|email',
            'password' => 'required|min:5',
        ]);

        //check for guards and check om db
        if(Auth::guard('admin')->attempt([
            'email'     => $request->email,
            'password'   => $request->password,
        ])){

            return redirect()->intended('/admin');
        }

        return back()->withInput($request->only('email'));

    }
}
