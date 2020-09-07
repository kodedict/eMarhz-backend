@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('List of suppliers') }}</div>

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
            <a href='/add-supplier'>Add new supplier</a>
            <div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
            </tr>
        </thead>
        <tbody>
            @foreach($fetch as $supplier)
            <tr>
                <td>{{$supplier['name']}}</td>
                <td><a href="{{route('editForm',$supplier['id'])}}"><button class="btn">edit</button></a></td>
                <td><a href="{{route('deleteSupply',$supplier['id'])}}"><button class="btn btn-danger">delete</button></a></td>
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
