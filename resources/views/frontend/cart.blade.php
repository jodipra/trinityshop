{{-- @extends('layouts.frontend') --}}
@extends('app')

@section('title')
    My Cart
@endsection

@section('content')
    <main id="main" class="section-bg" style="margin-top: 4rem; min-height:80vh">
        <!-- ======= About Section ======= -->
        <section id="services" class="services section-bg">
            <div class="container mt-4"
                style="height: inherit; display: flex; flex-wrap: wrap; align-content: center; justify-content: center; align-items: center;">
                <div class="row" style="">
                    @if ($cartitem->count() > 0)
                        @php $total = 0; @endphp
                        @foreach ($cartitem as $item)
                            <div class="col-md-12">
                                <div class="icon-box m-3">
                                    <div class="row">
                                        <div class="col-md-3"><img
                                                src="{{ asset('assets/uploads/unitrumah/' . $item->unitrumah->image) }}"
                                                alt="Image here" style="max-width: 100%"></div>
                                        <div class="col-md-3"
                                            style="display: flex; flex-wrap: wrap; align-content: center; justify-content: center; align-items: center;">
                                            <h4>Rp {{ $item->unitrumah->utj_price }}</h4>
                                        </div>
                                        <div class="col-md-3"
                                            style="display: flex; flex-wrap: wrap; align-content: center; justify-content: center; align-items: center;">
                                            <input type="hidden" class="unit_id" value="{{ $item->unit_id }}">
                                            @if ($item->unitrumah->qty >= $item->unit_qty)
                                                <label for="quantity"> Quantity </label>
                                                <div class="input-group text-center mb-3" style="width:130px;">
                                                    <button class="input-group-text ubahqty decrement-btn">-</button>
                                                    <input type="text" name="quantity"
                                                        class="form-control qty-input text-center"
                                                        value="{{ $item->unit_qty }}">
                                                    <button class="input-group-text ubahqty increament-btn">+</button>
                                                </div>
                                                @php $total += $item->unitrumah->utj_price * $item->unit_qty ; @endphp
                                            @else
                                                <h6>sold</h6>
                                            @endif
                                        </div>
                                        <div class="col-md-3"
                                            style="display: flex; flex-wrap: wrap; align-content: center; justify-content: center; align-items: center;">
                                            <button class="btn btn-danger delete-cart-item"><i class="bi bi-trash"
                                                    style="color: white; font-size:20px"></i>
                                                Remove</button>
                                        </div>
                                        <div class="col-md-3">
                                            <h4>{{ $item->unitrumah->name }}</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                </div>

                <div class="row" style="margin: auto; margin-top:1rem; display:contents">
                    <div class="col-lg-6 pt-4 pt-lg-0" style="display: flex; align-items: center;">
                        <h6>Total Harga : Rp {{ $total }}</h6>
                    </div>
                    <div class="col-lg-6 pt-4 pt-lg-0">
                        <a href="{{ url('bayar') }}"class="btn btn-outline-success"
                            style="float: right; margin-right: 10px;">Bayar Sekarang</a>
                    </div>
                </div>
            </div>
        @else
            <div class="card-body text-center">
                <h2>Your <i class="fa fa-shopping-cart"></i> Cart is Empty</h2>
                <a href="{{ url('listrumah') }}" class="btn btn-outline-primary float-end">Lanjutkan Booking</a>
            </div>
            @endif
            </div>
        </section><!-- End About Section -->

        
    </main><!-- End #main -->
@endsection
