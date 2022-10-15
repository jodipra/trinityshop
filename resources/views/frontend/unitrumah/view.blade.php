@extends('layouts.frontend')

@section('title', $unitrumah->name)

@section('content')

<div class="py-3 mb-4 shadow-sm bg-warning border-top">
    <div class="container">
        <h6 class="mb-0">
            <a href="{{ url('listrumah') }}">
               List Rumah
            </a> /
            <a href="{{ url('listrumah/'.$unitrumah->listperumahan->slug) }}">
                {{ $unitrumah->listperumahan->name }}
            </a> /
            <a href="{{ url('listrumah/'.$unitrumah->listperumahan->slug.'/'.$unitrumah->slug) }}">
               {{ $unitrumah->name }}
            </a>
        </h6>
    </div>
</div>
               

<div class="container">
    <div class="card shadow unit_data">
        <div class="card-body">
            <div class="row">
                    <div class ="col-md-4 border-right">
                        <img src=" {{ asset('assets/uploads/unitrumah/'.$unitrumah->image) }}" class="w-100" alt="">
                    </div>
                    <div class="col-md-8">
                        <h2 class="mb-0">
                            {{ $unitrumah->name }}
                            <label style="font-size: 16px;" class="float-end badge bg-danger trending_tag">Populer</label>
                        </h2>

                        <hr>
                        <label class="me-3">Original Price : <s>Rp{{ $unitrumah->original_price }}</s></label>
                        <label class="fw-bold"> Selling Price : Rp {{ $unitrumah->selling_price }}</label>
                        <p class="mt-3">
                        {!! $unitrumah->description !!}
                        </p>
                        <hr>
                        @if ($unitrumah->qty > 0)
                            <label class="badge bg-success">In stock </label>
                        @else
                            <label class="badge bg-danger">Out of stock</label>
                        @endif
                        <div class="row mt-2">
                            <div class="col-md-3" >
                                <input type="hidden" value="{{ $unitrumah->id }}" class="unit_id">
                                <label for="Quantity">Quantity</label>
                                <div class="input-group text-center mb-3" style="width:130px" >
                                        <button class="input-group-text decrement-btn">-</button>
                                        <input type="text" name="quantity " value="1" class="form-control qty-input text-center" />
                                        <button class="input-group-text increament-btn">+</button>
                                </div>                                                                             
                            </div>
                            <div class="col-md-9">
                                <br/>
                                @if ($unitrumah->qty > 0)
                                    <label class="badge bg-success">In stock </label>
                                    <button type="button" class="btn btn-success me-3 addtowishlist float-start">Add to Wishlist </button>                                    
                                @endif
                                <button type="button" class="btn btn-primary me-3 addtocartbtn float-start"><i class="fas fa-shopping-cart"></i>Add to Cart </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>    
@endsection
