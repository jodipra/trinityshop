@extends('layouts.frontend')

@section('title')
    Pembayaran
@endsection

@section('content')

    <div class="py-3 mb-4 shadow-sm bg-warning border-top">
        <div class="container">
            <h6 class="mb-0">
                <a href="{{ url('/') }}">
                    Home
                </a> /
                <a href="{{ url('bayar') }}">
                    Pembayaran
                </a>
            </h6>
        </div>
    </div>


    <div class="container mt-3">
        <form action="{{ url('bayar-sekarang') }}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="row">
                <div class="col-md-7">
                    <div class="card">
                        <div class="card-body">
                            <h6>basic details</h6>
                            <hr>
                            <div class="row checkout-form">
                                <div class="col-md-6">
                                    <label for="">First Name</label>
                                    <input type="text" required class="form-control name"
                                        value="{{ Auth::user()->name }}" name="name" placeholder="First Name">
                                    <span id="name_error" class="text-danger"></span>
                                </div>
                                <div class="col-md-6">
                                    <label for="firstname">Last Name</label>
                                    <input type="text" required class="form-control lname"
                                        value="{{ Auth::user()->lname }}" name="lname" placeholder="Last Name">
                                    <span id="lname_error" class="text-danger"></span>
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="">Email</label>
                                    <input type="text" required class="form-control email"
                                        value="{{ Auth::user()->email }}" name="email" placeholder="Enter Email">
                                    <span id="email_error" class="text-danger"></span>
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="">Phone Number</label>
                                    <input type="text" required class="form-control phone"
                                        value="{{ Auth::user()->phone }}" name="phone" placeholder="Enter Phone Number">
                                    <span id="phone_error" class="text-danger"></span>
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="">Alamat</label>
                                    <input type="text" required class="form-control alamat"
                                        value="{{ Auth::user()->alamat }}" name="alamat" placeholder="Enter Address">
                                    <span id="alamat_error" class="text-danger"></span>
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="">Kota</label>
                                    <input type="text" required class="form-control kota"
                                        value="{{ Auth::user()->kota }}" name="kota" placeholder="Kota">
                                    <span id="kota_error" class="text-danger"></span>
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="">Provinsi</label>
                                    <input type="text" required class="form-control provinsi"
                                        value="{{ Auth::user()->provinsi }}" name="provinsi" placeholder="Provinsi">
                                    <span id="provinsi_error" class="text-danger"></span>
                                </div>
                                {{-- <div class="col-md-6 mt-3">
                                <label for="">Negara</label>
                                <input type="text" required class="form-control negara" value="{{ Auth::user()->negara }}" name="negara" placeholder="Negara">
                                <span id="negara_error" class="text-danger"></span>
                            </div> --}}
                                <div class="col-md-6 mt-3">
                                    <label for="">Kode pos</label>
                                    <input type="text" required class="form-control kodepos"
                                        value="{{ Auth::user()->kodepos }}" name="kodepos" placeholder="Kode pos">
                                    <span id="kodepos_error" class="text-danger"></span>
                                </div>
                            </div>
                            <input type="file" name="buktipembayaran" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="card">
                        <div class="card-body">
                            <h6>order details</h6>
                            <hr>
                            @if ($cartitem->count() > 0)
                                <table class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Qty</th>
                                            <th>Price</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $total = 0; @endphp
                                        @foreach ($cartitem as $item)
                                            <tr>
                                                @php $total += ($item->unitrumah->utj_price * $item->unit_qty) @endphp
                                                <td>{{ $item->unitrumah->name }}</td>
                                                <td>{{ $item->unit_qty }}</td>
                                                <td>{{ $item->unitrumah->utj_price }}</td>
                                        @endforeach
                                        </tr>
                                    </tbody>
                                </table>
                                <h6 class="px-2">Total <span class="float-end"> Rp {{ number_format($total) }}</span>
                                </h6>
                                <hr>
                                <input type="hidden" name="payment_mode" value="langsung">
                                <button type="submit" class="btn btn-primary w-100">Bayar Sekarang</button>
                                <button type="button" class="btn btn-success w-100 razorpay_btn">Bayar dengan
                                    Razorpay</button>
                                <div id="paypal-button-container"></div>
                            @else
                                <h4 class="text-center">No Products In Cart</h4>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </form>
    @endsection

    @section('scripts')
        <script
            src="https://www.paypal.com/sdk/js?client-id=AVbDNzTlYXxfDsL20zFCd6L3DtQjuUp4ym3kE8HktS_JXWrRc3suVL4JMEG9x_HTpJTMIpeQoOUp03gg">
        </script>
        <script src="https://checkout.razorpay.com/v1/checkout.js"></script>

        <script>
            paypal.Buttons({
                createOrder: function(data, actions) {
                    return actions.order.create({
                        purchase_units: [{
                            amount: {
                                value: '{{ number_format($total) }}'
                            }
                        }]
                    });
                },
                onApprove: function(data, actions) {
                    return actions.order.capture().then(function(details) {
                        // alert('transaction completed by ' + details.payer.name.given_name);
                        var name = $('.name').val();
                        var lname = $('.lname').val();
                        var email = $('.email').val();
                        var phone = $('.phone').val();
                        var alamat = $('.alamat').val();
                        var kota = $('.kota').val();
                        var provinsi = $('.provinsi').val();
                        // var negara = $('.negara').val();
                        var kodepos = $('.kodepos').val();
                        $.ajax({
                            method: "POST",
                            url: "/bayar-sekarang",
                            data: {
                                'name': name,
                                'lname': lname,
                                'email': email,
                                'phone': phone,
                                'alamat': alamat,
                                'kota': kota,
                                'provinsi': provinsi,
                                // 'negara': negara,
                                'kodepos': kodepos,
                                'payment_mode': "paid by Paypal",
                                'payment_id': details.id,
                            },
                            success: function(response) {
                                swal(response.status)
                                    .then((value) => {
                                        window.location.href = "/my-order";
                                    });
                            }
                        });
                    });
                }
            }).render('#paypal-button-container');
        </script>
    @endsection
