@extends('layouts.admin')

@section('title')
    Orders
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-primary" style="background: royalblue!important; display:flex">
                        <h4 Class="col-md-10 text-white">New Orders</h4>
                        <a href="{{ 'order-history' }}" class="btn btn-white float-right" style="float:right!important">Order History</a>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Order Date</th>
                                    <th>Nomor Order</th>
                                    <th>Total Price</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <body>
                                @foreach ($bayar as $item)
        
                                    <tr>
                                        <td>{{ date('d-m-y'), strtotime($item->created_at) }}</td>
                                        <td>{{ $item->tracking_no }}</td>
                                        <td>{{ $item->total_price }}</td>
                                        <td>{{ $item->status == '0' ?'pending' : 'completed' }}</td>
                                        <td>
                                            <a href="{{ url('admin/view-order/'.$item->id) }}" class="btn btn-primary" style="background: royalblue!important;">view</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </body>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
@endsection