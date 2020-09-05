<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderInvoice extends Model
{
    //
    protected $fillable = [
        'orderID',
        'paymentRef'
    ];
}
