{{-- @extends('layouts.frontend') --}}
@extends('app')
@section('title')
    My wishlist
@endsection

@section('content')
    <main id="main" class="section-bg" style="margin-top: 4rem; min-height:80vh">
        <section id="services" class="services section-bg">
            <div class="container mt-4">
                <div class="card shadow wishlistitem">
                    <div class="card-body">
                        @if ($wishlist->count() > 0)
                            <div class="card-body">
                                @foreach ($wishlist as $item)
                                    <div class="row unit_data">
                                        <div class="col-md-2 my-auto">
                                            <img src="{{ asset('assets/uploads/unitrumah/' . $item->unitrumah->image) }}"
                                                height="80px" width="70px" alt="Image here">
                                        </div>
                                        <div class="col-md-2 my-auto">
                                            <h6>{{ $item->unitrumah->name }}</h6>
                                        </div>
                                        <div class="col-md-2 my-auto">
                                            <h6> Rp {{ $item->unitrumah->utj_price }}</h6>
                                        </div>
                                        <div class="col-md-2 my-auto">
                                            <input type="hidden" class="unit_id" value="{{ $item->unit_id }}">
                                            @if ($item->unitrumah->qty >= $item->unit_qty)
                                                <h6>In Stock</h6>
                                                <label for="quantity"> Quantity </label>
                                                <div class="input-group text-center mb-3" style="width:130px;">
                                                    <button class="input-group-text decrement-btn">-</button>
                                                    <input type="text" name="quantity"
                                                        class="form-control qty-input text-center" value="1">
                                                    <button class="input-group-text increament-btn">+</button>
                                                </div>
                                            @else
                                                <h6>sold</h6>
                                            @endif
                                        </div>
                                        <div class="col-md-2 my-auto">
                                            <button class="btn btn-success addtocartbtn"><i class="fa fa-shopping-cart"></i>
                                                Add
                                                to Cart</button>
                                        </div>
                                        <div class="col-md-2 my-auto">
                                            <button class="btn btn-danger remove-wishlist-item"><i class="fa fa-trash"></i>
                                                Remove</button>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <h4>Tidak ada Unit Rumah dalam Wishlist Anda</h4>
                        @endif
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
