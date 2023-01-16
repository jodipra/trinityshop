@extends('app')

@section('title')
    List Perumahan
@endsection

@section('content')
    <main id="main" style="margin-top: 35px">
        <!-- ======= Team Section ======= -->
        <section id="team" class="team">
            <div class="container">

                <div class="section-title" style="padding-bottom: 10px">
                    <h3>List Semua Perumahan</h3>
                </div>

                <div class="row">
                    @foreach ($listrumah as $list)
                        <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
                            <div class="member px-4" style="padding-bottom: 0px">
                                <img src="{{ asset('assets/uploads/listperumahan/' . $list->image) }}" alt="List Perumahan" style="margin: 0">

                                <a style="text-decoration: none" href="{{ url('listrumah/' . $list->slug) }}">
                                    <h4>{{ $list->name }}</h4>
                                    <p>{{ $list->description }}</p>
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
@section('scripts')
    {{-- <script>
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
</script> --}}
@endsection