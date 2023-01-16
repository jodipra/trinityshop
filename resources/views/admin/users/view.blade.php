@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">User Details
                        <a href="{{ url('users') }}" class="btn btn-primary float-right" style="background: royalblue!important;">Back</a>
                    </h4>
                </div>
                <div class="card-body">
                   <div class="row">
                        <div class="col-md-4 mt-3">
                            <label for="">Rule</label>
                            <div class="p-2 border">{{ $users->role_as == '0'? 'User' : 'Admin' }}</div>
                        </div>
                        <div class="col-md-4 mt-3">
                            <label for="">First Name</label>
                            <div class="p-2 border">{{ $users->name }}</div>
                        </div>
                        <div class="col-md-4 mt-3">
                            <label for="">Last Name</label>
                            <div class="p-2 border">{{ $users->lname }}</div>
                        </div>
                        <div class="col-md-4 mt-3">
                            <label for="">Email</label>
                            <div class="p-2 border">{{ $users->email }}</div>
                        </div>
                        <div class="col-md-4 mt-3">
                            <label for="">Phone</label>
                            <div class="p-2 border">{{ $users->phone }}</div>
                        </div>
                        <div class="col-md-4 mt-3">
                            <label for="">Address</label>
                            <div class="p-2 border">{{ $users->alamat }}</div>
                        </div>
                        <div class="col-md-4 mt-3">
                            <label for="">City</label>
                            <div class="p-2 border">{{ $users->kota }}</div>
                        </div>
                        <div class="col-md-4 mt-3">
                            <label for="">State</label>
                            <div class="p-2 border">{{ $users->provinsi }}</div>
                        </div>
                        <div class="col-md-4 mt-3">
                            <label for="">Country</label>
                            <div class="p-2 border">{{ $users->negara }}</div>
                        </div>
                        <div class="col-md-4 mt-3">
                            <label for="">Zip Code</label>
                            <div class="p-2 border">{{ $users->kodepos }}</div>
                        </div>
                   </div>
                </div>
            </div>
        </div>
    </div>
</div>
 
@endsection