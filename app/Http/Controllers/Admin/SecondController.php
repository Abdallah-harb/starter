<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SecondController extends Controller
{

    public function __construct(){

        $this->middleware('auth')->except('showString2');
    }
    public function showString0(){

        return 'string0';
    }
    public function showString1(){

        return 'string1';
    }
    public function showString2(){

        return 'string2';
    }
    public function showString3(){

        return 'string3';
    }
}
