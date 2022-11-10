<?php

namespace App\Http\Controllers\Relations;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use App\Models\Hospital;
use App\Models\Phone;
use App\User;
use Illuminate\Http\Request;

class relationController extends Controller
{
    public function hasOnerelation(){

        $user = User::with(['phone'=> function($q){
            $q->select('code','phone','user_id');
        }])->find(11);

        // return $user->name;
        //return $user->phone->phone;

        return response()->json($user);
    }


    //reverse function that get phone and phone get user of it
    public function hasOneReverserelation(){

        $phone = Phone::with(['user'=> function($q){
            $q->select('id','name');
        }])->find(1);

        return $phone;
        // make column show from hidden on model
       //$phone ->makeVisible(['user_id']);

    }

    //get all user that has phones
    public function userHasPhone(){
        return  $users = User::whereHas('phone',function ($q){
            $q->where('code',02);
        })->get();
    }

    //get all users that not have phones
    public function userNotHasPhone(){
        return $users = User::whereDoesntHave('phone')->get();
    }

    ###################################################
    ###################################################
    ############### one - to - many ###################
    ###################################################
    ###################################################
    //get first hospital with all data
    public function getHospitalDoctor(){

         $hospitals =  Hospital::with('doctors')->find(1);
        $allDoctors = $hospitals->doctors;

        foreach ($allDoctors as $doctor){
            echo $doctor->name;
        }

    }

    //doctors get hospital
    public function doctorsgethospital(){

        return Doctor::select('name')->with(['hospital'=>function($q){
            $q->select('id','name');
        }])->find(2);
    }
    //get all hospitals
    public function hospitals(){
        $hospitals =Hospital::get();
        return view('Doctors.hospital',compact('hospitals'));

    }

    //get doctors of hospital
    public function doctors($hospital_id){

       $hospital =  Hospital::find($hospital_id);
       $doctors = $hospital->doctors;

       return view('Doctors.doctors',compact('doctors','hospital'));
    }

    //delete hospital and doctors inside this hospitals

    public function hospitaldelete($hospital_delete){

        $hospital = Hospital::find($hospital_delete);
        //check if not exists
        if(!$hospital)
            return abort('404');
            //first delete doctors on the hospitals
        $hospital->doctors()->delete();
        //seconds delete hospital
        $hospital->delete();
        return "hospital delete";
    }
}
