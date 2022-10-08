<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    //name of table that equal model
    protected $key = 'video';
    //column of offers table
    protected $fillable = ['name','viewer','created_at','updated_at'];
    //not retrieve of process data CRUD
    protected $hidden = ['created_at','updated_at'];
}
