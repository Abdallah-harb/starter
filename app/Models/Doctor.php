<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    protected $key = 'doctors';

    //column of offers tables
    protected $fillable = ['name','spechalist','hospital_id','created_at','updated_at'];
    protected $hidden = ['hospital_id','created_at','updated_at'];
    public $timestamps = true;

    #######################################################
    ############### relation one - to - many ##############
    ############## doctors belongs to one hospital ########
    #######################################################

    public function hospital(){

        return $this->belongsTo('App\Models\Hospital','hospital_id','id');

    }
}
