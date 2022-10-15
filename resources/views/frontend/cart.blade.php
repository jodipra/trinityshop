@extends('layouts.frontend')

@section('title')
    My Cart
@endsection

@section('content')
<div class="py-3 mb-4 shadow-sm bg-warning border-top">
    <div class="container">
        <h6 class="mb-0">
            <a href="{{ url('/') }}">
               Home
            </a> /
            <a href="{{ url('cart') }}">
                Cart
            </a>
        </h6>
    </div>
</div>

<div class="container my-5">
    <div class="card shadow cartitem">
     @if($cartitem->count() > 0)
        <div class="card-body">
            @php $total = 0; @endphp
            @foreach ($cartitem as $item)
                <div class="row unit_data">
                    <div class="col-md-2 my-auto" >
                        <img src="{{ asset('assets/uploads/unitrumah/'.$item->unitrumah->image) }}" height="80px" width="70px" alt="Image here">
                    </div>
                    <div class="col-md-3 my-auto">
                        <h6>{{ $item->unitrumah->name }}</h6>
                    </div>
                    <div class="col-md-2 my-auto">
                        <h6> Rp {{ $item->unitrumah->utj_price }}</h6>
                    </div>
                    <div class="col-md-3 my-auto">
                        <input type="hidden" class="unit_id" value="{{ $item->unit_id }}"> I
                        @if($item->unitrumah->qty >= $item->unit_qty )
                            <label for="quantity"> Quantity </label>
                            <div class ="input-group text-center mb-3" style="width:130px;">
                                <button class="input-group-text ubahqty decrement-btn">-</button>
                                <input type="text" name="quantity" class="form-control qty-input text-center" value="{{ $item->unit_qty }}">
                                <button class="input-group-text ubahqty increament-btn">+</button >
                            </div>
                            @php $total += $item->unitrumah->utj_price * $item->unit_qty ; @endphp
                            @else
                                <h6>sold</h6>   
                        @endif
                    </div>
                    <div class="col-md-2 my-auto">
                        <button class="btn btn-danger delete-cart-item"><i class="fa fa-trash"></i> Remove</button>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="card-footer">
            <h6>Total Harga : Rp {{ $total }}</h6>

            <a href="{{ url('bayar') }}"class="btn btn-outline-success float-end">Bayar Sekarang</a>
        </div>
    @else
        <div class="card-body text-center">
            <h2>Your <i class="fa fa-shopping-cart"></i> Cart is Empty</h2>
            <a href="{{ url('listrumah') }}" class="btn btn-outline-primary float-end">Lanjutkan Booking</a>
        </div>
    
    @endif
    </div>
</div>
@endsection