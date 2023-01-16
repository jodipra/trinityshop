{{-- @extends('layouts.frontend') --}}

@extends('app')

@section('title')
    {{ $listperumahan->name }}
@endsection

@section('content')
    <main id="main" style="margin-top: 4rem; min-height:80vh">
        <section id="team" class="team" style="padding: 30px">

            <div class="container">
                <div class="section-title" style="padding-bottom: 10px">
                    <h3>{{ $listperumahan->name }}</h3>
                </div>
                <div class="row">
                    
                    @foreach ($unitrumah as $unit)
                        <div class="col-md-3 mb-3">
                            <a href="{{ url('listrumah/' . $listperumahan->slug . '/' . $unit->slug) }}">
                                <div class="card">
                                    <img src="{{ asset('assets/uploads/unitrumah/' . $unit->image) }}" alt="image rumah">
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

        </section>
    </main>
@endsection
