<?php

namespace App\Http\Controllers\backend\seller;

use App\Http\Controllers\Controller;
use App\Product;
use App\Supply;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class productController extends Controller
{
    //

      public function __construct()
    {
        $this->middleware('auth');
    }

    //Return page product list
    public function index(){
        $user = auth::user()->id;    
        $fetch = Product::query()->where('sellerID',$user)->get()->sortByDesc('id')->values()->all();

         return view('pages.seller.product.index')->with(compact('fetch'));
    }

    // create product 
    public function create(){
        $fetch = Supply::all();

        return view('pages.seller.product.create')->with(compact('fetch'));
    }

    //Return store product form
    public function store(Request $request){

        $request->validate([
            'image' => 'required|mimes:png,jpeg,jpg|max:50000'
        ]);

        $file = $request->file('image');

        $destinationPath = 'upload';

        $productName = str_replace(' ','-',$request['name']);
        $productName = strtolower($productName);
        $filename = $productName.".".$file->getClientOriginalExtension();
        $fileUrl = url('/')."/".$destinationPath."/".$filename;
        $file->move($destinationPath,$filename);

        $post = Product::query()->create([
            'name'        => strtolower($request['name']),
            'quantity'    => $request['quantity'],
            'image'       => $fileUrl,
            'supplierID'  => $request['supplier'],
            'price'       => $request['price'],
            'sellerID'    => auth::user()->id
        ]);

        if($post){return redirect('/product');}
        else{return redirect('/product');}
    }

       // Return edit product

    public function edit($id){
        $query = Product::query()->find($id);
        $fetch = Supply::all();
        if(!$query){return abort(404);}
        else{
            return view('pages.seller.product.edit')->with(compact('query','fetch'));
        }
    }

    //Return update product
    public function update(Request $request,$id){

        

        $query = Product::query()->find($id);
        if(!$query){return $this->sendError('fail','fail');}
        else{
            $query['name']       = strtolower($request['name']);
            $query['quantity']   = $request['quantity'];
            
            if($request['image'] != ""){

                    $request->validate([
            'image' => 'required|mimes:png,jpeg,jpg|max:50000'
        ]);

        $file = $request->file('image');

        $destinationPath = 'upload';

        $filename = $request['name'].".".$file->getClientOriginalExtension();
        $fileUrl = url('/')."/".$destinationPath."/".$filename;
        $file->move($destinationPath,$filename);    

            $query['image']      = $fileUrl;
            }
            
            $query['supplierID'] = $request['supplier'];
            $query['price']      = $request['price'];

            $update = $query->save();

           if($update){return redirect('/product');}
        else{return redirect('/product');}
        }
    }

    //Return delete product
    public function delete($id){

        $query = Product::query()->find($id);
        if(!$query){return $this->sendError('fail','fail');}
        else{
            $delete = $query->delete();
             if($delete){return redirect('/product');}
        else{return redirect('/product');}
        }
    }

    
}
