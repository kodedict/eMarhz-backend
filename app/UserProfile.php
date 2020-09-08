<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    //
    public $timestamps = false;
    protected $fillable= [
        'userID',
        'billingInfo'
    ];
}
