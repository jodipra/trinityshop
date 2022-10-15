@extends('layouts.frontend')

@section('title')
    {{ $listperumahan->name }}
@endsection

@section('content')
    <div class="py-5">
        <div class="container">
            <div class="row">
                <h2>{{ $listperumahan->name }}</h2>
                @foreach ($unitrumah as $unit)
                    <div class="col-md-3 mb-3">
                        <a href="{{  url('listrumah/'.$listperumahan->slug.'/'.$unit->slug) }}">
                            <div class="card">
                                <img src="{{ asset('assets/uploads/unitrumah/'.$unit->image) }}" alt="image rumah">
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

@endsection