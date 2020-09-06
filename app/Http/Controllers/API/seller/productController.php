<?php

namespace App\Http\Controllers\API\seller;

use App\Http\Controllers\API\apiController as apiController;
use App\Product;
use App\Supply;
use Illuminate\Http\Request;

class productController extends apiController
{
    //

    //Return page product list
    public function index(){

        $fetch = Product::query()->get()->sortByDesc('id')->values()->all();

        if($fetch){return $this->sendResponse($fetch,'success');}
        else{return $this->sendError('fail','fail');}
    }

    //Return store product form
    public function store(Request $request){

        $post = Product::query()->create([
            'name'        => strtolower($request['name']),
            'quantity'    => $request['quantity'],
            'image'       => $request['image'],
            'supplierID'  => $request['supplier'],
            'price'       => $request['price']
        ]);

        if($post){return $this->sendResponse('','success');}
        else{return $this->sendError('fail','fail');}
    }

    //Return update product
    public function update(Request $request,$id){

        $query = Product::query()->find($id);
        if(!$query){return $this->sendError('fail','fail');}
        else{
            $query['name']       = strtolower($request['name']);
            $query['quantity']   = $request['quantity'];
            $query['image']      = $request['image'];
            $query['supplierID'] = $request['supplier'];
            $query['price']      = $request['name'];

            $update = $query->save();

            if($update){return $this->sendResponse('','success');}
            else{return $this->sendError('fail','fail');}
        }
    }

    //Return delete product
    public function delete($id){

        $query = Product::query()->find($id);
        if(!$query){return $this->sendError('fail','fail');}
        else{
            $delete = $query->delete();
            if($delete){return $this->sendResponse('','success');}
            else{return $this->sendError('fail','fail');}
        }
    }

    //Extra form API to display supplier
    public function formExtra(){
        $fetch = Supply::all();

        if($fetch){return $this->sendResponse($fetch,'success');}
        else{return $this->sendError('fail','fail');}
    }
}
