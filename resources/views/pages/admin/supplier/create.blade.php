@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Create New Product') }}</div>

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
            <form method="post" action='add-supplier'>
            @csrf
    <div class="form-row">
        <div class="col-md-4">
            <div class="form-group"><input type="text" name="name" class="form-control" placeholder="Enter Supplier Name" /></div>
            <div class="form-group"><button class="btn btn-primary" type="submit">Submit</button></div>
        </div>
    </div>
</form>
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
