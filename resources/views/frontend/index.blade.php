@extends('layouts.frontend')

@section('title')
    Welcome to Trinity House
@endsection

@section('content')
    @include('layouts.inc.slider')

    <div class="py-5">
        <div class="container">
            <div class="row">
                <h2 class="font-family">Produk Unggulan</h2>
                <div class="owl-carousel featured-carousel owl-theme">
                    @foreach ($featured_unitrumah as $unit)
                        <div class="item">
                            <a href="{{  url('listrumah/'.$unit->listperumahan->slug .'/'.$unit->slug) }}">
                                <div class="card">
                                    <img src="{{ asset('assets/uploads/unitrumah/'.$unit->image) }}" alt="image rumah" height="350">
                                    <div class="card-body">
                                        <h5>{{ $unit->name }}</h5>
                                        <span class="float-start">{{ $unit->selling_price }}</span>
                                        <span class="float-end"><s>{{ $unit->original_price }}</s></span>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>             
            </div>
        </div>
    </div>

@endsection

@section('scripts')
<script>
    $('.featured-carousel').owlCarousel({
        loop:true,
        margin:10,
        nav:true,
        dots:false,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:3
            },
            1000:{
                items:4
            }
        }
    })
</script>
@endsection