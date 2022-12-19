<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <title>{{ config('app.name') }}</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="{{ asset('favicon.ico') }}" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Jost:wght@500;600;700&family=Open+Sans:wght@400;500&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('js/lib/animate/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('js/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">

    <!-- App Stylesheet -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
</head>

<body id="top">
    <div class="container-fluid position-relative bg-white d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner"
            class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        @yield('content')
    </div>

    <!-- JavaScript Libraries -->
    <script src="{{ asset('js/lib/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('js/lib/wow/wow.min.js') }}"></script>
    <script src="{{ asset('js/lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('js/lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('js/lib/owlcarousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('js/lib/counterup/counterup.min.js') }}"></script>

    <!-- App Javascript -->
    <script src="{{ mix('js/app.js') }}"></script>

    @include('inc.script')

    @yield('script')
</body>

</html>
