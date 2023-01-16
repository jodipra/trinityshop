@extends('app')

@section('title')
    <title>Welcome to Trinity House</title>
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        
                            <div class="alert alert-success" role="alert">
                                haha

                                {{ session('status') }}
                            </div>
                        

                        {{ __('You are logged in!') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
