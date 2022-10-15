@extends('layouts.frontend')

@section('title')
    List Perumahan
@endsection

@section('content')
<div class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>List Semua Perumahan</h2>
                <div class="row">
                    @foreach ($listrumah as $list)
                        <div class="col-md-3 mb-3">
                            <a href="{{ url('listrumah/'.$list->slug) }}">
                                <div class="card">
                                    <img src="{{ asset('assets/uploads/listperumahan/'.$list->image) }}" alt="List Perumahan">
                                    <div class="card-body">
                                        <h5>{{ $list->name }}</h5>
                                        <p>
                                            {{ $list->description }}
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
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