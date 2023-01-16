<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>
        @yield('title')
    </title>
     
    <link href="{{ asset('admin/css/material-dashboard.css') }}" rel="stylesheet">

    <!--     Fonts and icons     -->
    {{-- <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" /> --}}
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
    <!-- CSS Files -->
    {{-- <link href="../admin/css/material-dashboard.css?v=2.1.0" rel="stylesheet" /> --}}
    <!-- CSS Just for demo purpose, don't include it in your project -->
    {{-- <link href="../admin/demo/demo.css" rel="stylesheet" /> --}}
    <link href="{{ asset('frontend/css/custom.css') }}" rel="stylesheet" />
    <link href="{{ asset('frontend/css/bootstrap5.css') }}" rel="stylesheet" />
    {{-- owl carousel --}}
    <link href="{{ asset('frontend/css/owl.carousel.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('frontend/css/owl.theme.default.min.css') }}" rel="stylesheet" />
    {{-- <link rel="preconnect" href="https://fonts.googleapis.com"> --}}
    {{-- font google --}}
    {{-- <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> --}}
    {{-- <link href="https://fonts.googleapis.com/css2?family=Roboto:ital@1&display=swap" rel="stylesheet"> --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    
    {{-- font cdn --}}
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha384-X8QTME3FCg1DLb58++lPvsjbQoCT9bp3MsUU3grbIny/3ZwUJkRNO8NPW6zqzuW9" crossorigin="anonymous"> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        
    <style>
        a{
            text-decoration: none !important;
            color: #000 !important;
        }
    </style>


</head>
<body class="">
    @include('layouts.inc.frontnavbar')
    <div class="content">
        @yield('content')
    </div>


    {{-- <script src="{{ asset('admin/js/jquery.min.js') }}" defer></script>
    <script src="{{ asset('admin/js/popper.min.js') }}" defer></script>
    <script src="{{ asset('admin/js/bootstrap-material-design.min.js') }}" defer></script>
    <script src="{{ asset('admin/js/perfect-scrollbar.jquery.min.js') }}" defer></script> --}}
    {{-- <script src="https://unpkg.com/default-passive-events"></script> --}}
    
    <script src="{{ asset('frontend/js/jquery-3.6.1.min.js') }}"></script>
    <script src="{{ asset('frontend/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('frontend/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('frontend/js/custom.js') }}"></script>
    <script src="{{ asset('frontend/js/bayar.js') }}"></script>

    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <script>
        
          var availableTags = [];
          $.ajax({
            method: "GET",
            url: "/unit-list",
            success: function (response) {
                // console.log(response);
                startAutoComplete(response);
            }
          });

          function startAutoComplete(availableTags)
          {
            $( "#search_unit" ).autocomplete({
                source: availableTags
            });
          }
          
        </script>

    <!--   Core JS Files   -->
    {{-- <script src="https://unpkg.com/default-passive-events"></script> --}}
    {{-- <script src="../frontend/js/bootstrap.bundle.min.js"></script> --}}
    <!-- Place this tag in your head or just before your close body tag. -->
    {{-- <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!--  Google Maps Plugin    -->
    <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
    <!-- Chartist JS -->
    <script src="../admin/js/plugins/chartist.min.js"></script>
    <!--  Notifications Plugin    -->
    <script src="../admin/js/plugins/bootstrap-notify.js"></script>
    <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="../admin/js/material-dashboard.js?v=2.1.0"></script> --}}
    <!-- Material Dashboard DEMO methods, don't include it in your project! -->
    {{-- <script src="../admin/demo/demo.js"></script> --}}
    
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    
    @if (session('status'))
        <script>
            swal("{{ session('status') }}");
        </script>
        
    @endif

    @yield('scripts')
</body>
</html>