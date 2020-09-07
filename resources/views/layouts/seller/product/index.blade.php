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
                <ul>
                    {{ __('You are logged in!') }}
                    @if(Auth::user()->hasRole('Administrator'))
                    <li><a href="/supplier" style="color: rgb(1,10,20);">Supplier</a></li>
                    @endif
                    <li><a href="/product" style="color: rgb(1,10,20);">Product</a></li>
                </ul>
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
