<?php

namespace App\Http\Controllers\API\customer;

use App\Http\Controllers\API\apiController as apiController;
use App\Order;
use Illuminate\Http\Request;

class orderController extends apiController
{
    //

    public function order($id){

        $fetch = Order::query()->where('customerID',$id)->get()->sortByDesc('id')->all();

        if($fetch){return $this->sendResponse($fetch,'success');}
        else{return $this->sendError('fail','fail');}
    }

    public function placeOrder(Request $request){

        $post = Order::query()->create([
            'orderDetail'  => $request['order'],
            'customerID'   => $request['customer'],
            'sellerID'     => $request['seller'],
            'paymentRef'   => $request['payment']
        ]);

        if($post){return $this->sendResponse('','success');}
        else{return $this->sendError('fail','fail');}
    }
}
