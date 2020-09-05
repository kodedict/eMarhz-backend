<?php

namespace App\Http\Controllers\API\general;

use App\Http\Controllers\API\apiController as apiController;
use App\Product;

class productController extends apiController
{
    //

    public function getProduct(){

        $fetch = Product::query()->get()->sortByDesc('id')->all();

        if($fetch){return $this->sendResponse($fetch,'success');}
        else{return $this->sendError('fail','fail');}

    }
}
