<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    //name of table that equal model
    protected $primaryKey ='id';
    protected $key = 'admins';
    //column of offers tables
    protected $fillable = ['name','email','password'];
}
