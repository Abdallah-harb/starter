<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hospital extends Model
{
    protected $key = 'hospitals';

    //column of offers tables
    protected $fillable = ['name','address','created_at','updated_at'];
    protected $hidden = ['created_at','updated_at'];
    public $timestamps = true;

    #######################################################
    ############### relation one - to - many ##############
    ############## hospital has many doctors ##############
    #######################################################
    public function doctors(){

        return $this->hasMany('App\Models\Doctor','hospital_id','id');
    }

}
