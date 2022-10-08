<?php

namespace App\Http\Controllers;

use App\Http\Requests\OfferRequest;
use App\Models\Offer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class CrudController extends Controller
{
    public  function getOffers(){
        //get all data from offers table
        // return Offer::get(); return all column on offers table
        return Offer::select('name','price')->get();

    }
    /*
        public function store(){

            Offer::create([
                'name'  => 'offer1',
                'price'  => 5000,
                'details'  => 'details3 offer'
            ]);
        }

    */
    //function to create data

    public function create(){

        return view('offers.created');
    }

    //function to store data on offers table

    public function store(Request $request){

/*
            //validate data before insert
        $rules =[

            'name'      =>  'required|max:100|unique:offers,name',
            'price'     =>  'required',
            'details'   =>  'required',

        ];
        $messages = [

            'name.required'  => __('messages.name required'),
            'name.unique'    => __('messages.name unique'),
            'price.required' => __('messages.price required'),
        ];

            $validate = Validator::make($request->all(),$rules,$messages);

            if($validate ->fails())

                // $validate->errors()->first();

                return redirect()->back()->withErrors($validate)->withInput($request->all());
*/
            //save photo to folder
            $file_extension = $request->photo->getClientOriginalExtension();

            //add time to imageName
            $file_name = time().".".$file_extension;

            //add image on folder
            $path = "images/offers";
            $request->photo->move($path,$file_name);

            //insert data
            Offer::create([
                'photo' => $file_name,
                'name'   => $request->name,
                'price'  => $request->price,
                'details'=>$request->details
            ]);

            //success message

            return redirect()->back()->with(['success' => 'تم ادخال البيانات بنجاح']);

    }

    //function to edit offers

    public function edit($offer_id){

        //search id on database column
        $checkId = Offer::find($offer_id);
        // check if the id is exists
        if(!$checkId)
            return redirect()->back();

        //if exist show offer that has id

        $offer = Offer::select('id','name','price','details')->find($offer_id); //find = that has id of []

        return view('offers.edit',compact('offer'));
    }

    //function to update offers after edit

    public function update(OfferRequest $request,$offer_id){
        //check for id  is exist to update
        $checkdata = Offer::find($offer_id);
        if(!$checkdata)
            return redirect()->back();
        //update data
        $checkdata->update([
            'name'   => $request->name,
            'price'  => $request->price,
            'details'=> $request->details
        ]);
        return redirect('offers/all-offers')->with(['success' => 'تم تحديث البيانات بنجاح']);
    }

    //delete function
    public function delete($offer_id){

        //check for id  is exist to update
        $offer = Offer::find($offer_id);

        if(!$offer)
            return redirect()->back()->with(['error' => __('messages.offer-error-delete')]);
        //offer delete
        $offer->delete();
        return redirect('offers/all-offers')->with(['delete-success' => __('messages.delete-success')]);
    }

    //function to show all offers
    public function show(){

        $offers = Offer::get();//retrieve all columns

        return view('offers.show',compact('offers'));
    }





}
