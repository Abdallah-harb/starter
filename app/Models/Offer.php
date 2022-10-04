<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    //name of table that equal model
    protected $key = 'offers';
    //column of offers table
    protected $fillable = ['name','price','details','photo','created_at','updated_at'];
    //not retrieve of process data CRUD
    protected $hidden = ['created_at','updated_at'];
}
