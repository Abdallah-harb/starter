<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Phone extends Model
{
    protected $key = 'phones';

    //column of offers tables
    protected $fillable = ['code','phone','user_id'];
    protected $hidden = ['user_id'];
    public $timestamps = false;

    ################ relations #########
        //link phones table with user tables
    public function user(){

        return $this->belongsTo('App\User','user_id');

    }
}
