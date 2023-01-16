@extends('layouts.admin')

@section('title')
    My Order
@endsection

@section('content')
    <div class="container py-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-primary" style="background: royalblue!important; display:flex">
                        <h4 Class="col-md-11 text-white">Order View</h4>
                        <a href="{{ url('orders') }}" class="btn btn-white float-end">Back</a>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 order-detail">
                                <h4>Details</h4>
                                <hr>
                                <label for="">First Name</label>
                                <div class="border">{{ $bayar->name }}</div>
                                <label for="">Last Name</label>
                                <div class="border">{{ $bayar->lname }}</div>
                                <label for="">Contact No.</label>
                                <div class="border">{{ $bayar->phone }}</div>
                                <label for="">Address</label>
                                <div class="border">
                                    {{ $bayar->alamat }}, <br>
                                    {{ $bayar->kota }}, <br>
                                    {{ $bayar->provinsi }},
                                    {{ $bayar->negara }},
                                </div>
                                <label for="">Kode Pos</label>
                                <div class="border p-2">{{ $bayar->kodepos }}</div>
                                <label for="">Bukti Pembayaran</label>
                                <div>
                                    <img src="{{asset('assets/uploads/buktipembayaran/' .  $bayar->image) }}"  width="50%" alt="bukti pembayaran" />
                                </div>

                            </div>
                            <div class="col-md-6">
                                <h4>Order Details</h4>
                                <hr>
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Quantity</th>
                                            <th>Price</th>
                                            <th>Image</th>
                                        </tr>
                                    </thead>

                                    <body>
                                        @foreach ($bayar->order as $item)
                                            <tr>
                                                <td>{{ $item->unitrumah->name }}</td>
                                                <td>{{ $item->qty }}</td>
                                                <td>{{ number_format($item->price) }}</td>
                                                <td>
                                                    <img src="{{ asset('assets/uploads/unitrumah/' . $item->unitrumah->image) }}"
                                                        width="50px" alt="Unit Image">
                                                </td>

                                            </tr>
                                        @endforeach
                                    </body>
                                </table>
                                <h4 class="px-2">Total : Rp <span class="float-end">{{ $bayar->total_price }} </span>
                                </h4>
                                <div class="mt-5 px-2">
                                    <label for="">Order Status</label>
                                    <form action="{{ url('update-order/' . $bayar->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <select class="form-select" name="order_status">
                                            <option {{ $bayar->status == '0' ? 'selected' : '' }} value="0">Pending
                                            </option>
                                            <option {{ $bayar->status == '1' ? 'selected' : '' }} value="1">Completed
                                            </option>
                                        </select>
                                        <button type="submit" class="btn btn-primary float-end mt-3" style="background: royalblue!important;">Update</button>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
