<?php

namespace App\Http\Controllers\API\admin;

use App\Http\Controllers\API\apiController as apiController;
use App\Supply;
use Illuminate\Http\Request;

class supplyController extends apiController
{
    //

    //Return page supplier list
    public function index(){

        $fetch = Supply::query()->get()->sortByDesc('id')->all();

        if($fetch){return $this->sendResponse($fetch,'success');}
        else{return $this->sendError('fail','fail');}

    }

    //Return store supplier form
    public function store(Request $request){

        $post = Supply::query()->create([
            'name' => $request['name']
        ]);

        if($post){return $this->sendResponse('','success');}
        else{return $this->sendError('fail','fail');}
    }

    //Return update supplier
    public function update(Request $request,$id){

        $query = Supply::query()->find($id);
        if(!$query){return $this->sendError('fail','fail');}
        else{
            $query['name'] = $request['name'];
            $update = $query->save();

            if($update){return $this->sendResponse('','success');}
            else{return $this->sendError('fail','fail');}

        }
    }

    //Return delete supplier
    public function delete($id){

        $query = Supply::query()->find($id);
        if(!$query){return $this->sendError('fail','fail');}
        else{
           $delete = $query->delete();
           if($delete){return $this->sendResponse('','success');}
           else{return $this->sendError('fail','fail');}
        }

    }


}
