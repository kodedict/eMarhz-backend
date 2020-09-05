<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
    protected $fillable =[
        'orderDetail',
        'customerID',
        'sellerID',
        'paymentRef',
        'price'
    ];
}
