@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

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
                <p><a href="{{url()->previous()}}">Back</a></p>
                              <form action="{{ route('updateProduct',$query['id']) }}" enctype="multipart/form-data" method="POST">
                    @csrf
    <div class="form-row">
        <div class="col-md-6">
            <div class="form-group"><input value="{{ $query['name'] }}" type="text" name="name" placeholder="Enter Product Name" class="form-control" required /></div>
            <div class="form-group"><input value="{{ $query['quantity'] }}" type="text" name="quantity" placeholder="Enter Product Quantity" class="form-control" required /></div>
            <div class="form-group">
                <select class="form-control" name="supplier" required>
                    <option value="">Select Supplier</option>
                    @foreach ($fetch as $supplier)
                      <option value="{{ $supplier['id'] }}"  {{$query['supplierID'] == $supplier['id']? 'selected':''}} >{{ $supplier['name'] }}</option>  
                    @endforeach
                </select>
            </div>
            <div class="form-group"><input type="file" name="image"  /></div>
            <div class="form-group"><input value="{{ $query['price'] }}" type="text" name="price" placeholder="Enter Product Price" required class="form-control" /></div>
            <div class="form-group"><button class="btn btn-primary" type="submit">Submit</button></div>
        </div>
    </div>
</form>
<div class="col-5">
    <img class="img-fluid" src="{{ $query['image'] }}">
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
