<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class OfferController extends Controller
{
    ##########################################################
    ############## Create CRUD Using Ajax#####################
    ##########################################################

    //create
    public function create(){

        //return to view
        return view('ajaxOffer.created');
    }

    //function to insert
    public function store(Request $request ){

      //save photo to folder
        $file_extension = $request->file('photo')->getClientOriginalExtension();;

        //add time to imageName
        $file_name = time().".".$file_extension;

        //add image on folder
        $path = "images/offers";
        $request->photo->move($path,$file_name);
        //insert data
       $offer = Offer::create([
            'photo' => $file_name,
            'name'   => $request->name,
            'price'  => $request->price,
            'details'=>$request->details
        ]);

        //success message
        if($offer )
            return response()->json([
                'status' => true,
                'msg'    =>"تم الخفظ بنجاح",

            ]);
        else
            return response()->json([
                'status' => false,
                'msg'    =>"فشل الحفظ حاول مجددا",

            ]);


    }
}
