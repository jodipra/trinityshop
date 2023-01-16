@extends('app')

@section('title')
    Welcome to Trinity House
@endsection

@section('navbar')
    @include('layouts.inc.navbar')
@endsection

@section('content')
    @if (Session::has('status'))
        {{-- <div class="mt-5 alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Holy guacamole!</strong> You should check in on some of those fields below.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div> --}}
        {{-- <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card-header">{{ __('Dashboard') }}</div>
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                    </div>
                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div> --}}
    @endif
    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex flex-column justify-content-center align-items-center">
        <div class="hero featured-carousel owl-carousel">
            <div class="item">
                <div class="work" style="height:460px">
                    <div class="img d-flex align-items-center justify-content-center"
                        style="background-image: url(home/images/slider-4.jpeg); height: 440px">

                    </div>
                </div>
            </div>
            <div class="item">
                <div class="work" style="height:460px">
                    <div class="img d-flex align-items-center justify-content-center"
                        style="background-image: url(home/images/slider-5.jpeg); height: 440px">

                    </div>
                </div>
            </div>
            <div class="item">
                <div class="work" style="height:460px">
                    <div class="img d-flex align-items-center justify-content-center"
                        style="background-image: url(home/images/slider-6.jpeg); height: 440px">
                    </div>
                </div>
            </div>
        </div>
        {{-- <div class="container text-center text-md-left" data-aos="fade-up">
            <h1>Welcome to <span>Lumia</span></h1>
            <h2>We are team of talented designers making websites with Bootstrap</h2>
            <a href="#about" class="btn-get-started scrollto">Get Started</a>
        </div> --}}
    </section><!-- End Hero -->

    <main id="main">
        <!-- ======= Produk Unggulan ======= -->
        <section id="team" class="team">
            <div class="container">

                <div class="section-title">
                    <h2>Produk Unggulan</h2>
                    {{-- <p>Sit sint consectetur velit quos quisquam cupiditate nemo qui</p> --}}
                </div>

                <div class="row">
                    @foreach ($featured_unitrumah as $unit)
                        <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
                            <div class="member">
                                <img src="{{ asset('assets/uploads/unitrumah/' . $unit->image) }}" alt="">
                                <h4 href="{{ url('listrumah/' . $unit->listperumahan->slug . '/' . $unit->slug) }}">
                                    {{ $unit->name }}</h4>
                                <span>{{ $unit->selling_price }}</span>
                                <span><s>{{ $unit->original_price }}</s></span>
                                <a href="{{ url('listrumah/' . $unit->listperumahan->slug . '/' . $unit->slug) }}">
                                    read more
                                </a>
                                {{-- <div class="social">
                                    <a href=""><i class="bi bi-twitter"></i></a>
                                    <a href=""><i class="bi bi-facebook"></i></a>
                                    <a href=""><i class="bi bi-instagram"></i></a>
                                    <a href=""><i class="bi bi-linkedin"></i></a>
                                </div> --}}

                            </div>
                        </div>
                    @endforeach

                </div>

            </div>
        </section><!-- End Team Section -->

    </main><!-- End #main -->
@endsection
