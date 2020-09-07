<?php

namespace App\Http\Controllers\backend\admin;

use App\Http\Controllers\Controller;
use App\Supply;
use Illuminate\Http\Request;

class supplyController extends Controller
{
    //

    //Return page supplier list
    public function index(){

        $fetch = Supply::query()->get()->sortByDesc('id')->all();

        

        return view('pages.admin.supplier.index')->with(compact('fetch'));

    }

    //Return store supplier form
    public function store(Request $request){

        $post = Supply::query()->create([
            'name' => $request['name']
        ]);

        if($post){return redirect('/supplier');}
        else{return $this->sendError('fail','fail');}
    }

    // Return edit supplier

    public function edit($id){
        $query = Supply::query()->find($id);
        if(!$query){return abort(404);}
        else{
            return view('pages.admin.supplier.edit')->with(compact('query'));
        }
    }

    //Return update supplier
    public function update(Request $request,$id){

        $query = Supply::query()->find($id);
        if(!$query){return abort(404);}
        else{
            $query['name'] = $request['name'];
            $update = $query->save();

            if($update){return redirect('/supplier');}
           else{return redirect('/supplier');}

        }
    }

    //Return delete supplier
    public function delete($id){

        $query = Supply::query()->find($id);
        if(!$query){return abort(404);}
        else{
           $delete = $query->delete();
           if($delete){return redirect()->back();}
           else{return redirect()->back();;}
        }

    }


}
