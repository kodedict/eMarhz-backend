@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><a href="/home">Dashboard</a> > {{ __('List of product') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    
                    <div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                   <a href='/add-product'>Add new product</a>
            <div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Supplier</th>
                <th>Price</th>
            </tr>
        </thead>
        <tbody>
            @foreach($fetch as $product)
            <tr>
                <td>{{$product['name']}}</td>
                <td>{{ $product->supply->name }}</td>
                <td>{{ $product['price'] }}</td>
                <td><a href="{{route('editProduct',$product['id'])}}"><button class="btn">edit</button></a></td>
                <td><a href="{{route('deleteProduct',$product['id'])}}"><button class="btn btn-danger">delete</button></a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
            </div>
        </div>
    </div>
</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
