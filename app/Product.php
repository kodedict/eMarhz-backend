<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $fillable = [
        'name',
        'quantity',
        'image',
        'supplierID',
        'price',
        'sellerID'
    ];

    public function supply()
    {
        return $this->belongsTo(Supply::class,'supplierID');
    }
}
