<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <title>{{ config('app.name') }}</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

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

    <!-- App Stylesheet -->
    <link rel="stylesheet" href="{{ mix('css/auth.css') }}">
</head>

<body id="top">
    <div class="container-fluid position-relative bg-white d-flex p-0">
        <script src="//code.tidio.co/bqwkfaba7sy6a2zlvrdxiwbzmz0bsjmw.js" async></script>

        <!-- Spinner Start -->
        <div id="spinner"
            class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->

        <!-- Sidebar Start -->
        <div class="sidebar pe-4 pb-3">
            <nav class="navbar bg-light navbar-light">
                <a href="{{ route('home') }}" class="navbar-brand mx-4 mb-3">
                    <img src="{{ asset('images/logo.png') }}" alt="" height="55" width="150">
                </a>
                <div class="d-flex align-items-center ms-4 mb-4">
                    <div class="position-relative">
                        <img class="rounded-circle"
                            src="{{ asset('storage/images/profile/' . Auth::user()->profile_image) }}" alt=""
                            style="width: 40px; height: 40px;">
                        <div
                            class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1">
                        </div>
                    </div>
                    <div class="ms-3">
                        <h6 class="mb-0">{{ Auth::user()->full_name }}</h6>
                        <span>
                            @if (Auth::user()->type == 0)
                                Member
                            @else
                                Admin
                            @endif
                        </span>
                    </div>
                </div>
                <div class="navbar-nav bg-light w-100">
                    <a href="{{ route('home') }}"
                        class="nav-item nav-link @if (Request::is('home')) active @endif"><i
                            class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
                    <a href="profile" class="nav-item nav-link @if (Request::is('profile')) active @endif"><i
                            class="fa fa-user me-2"></i>Profile</a>
                    <a href="{{ route('referrals') }}"
                        class="nav-item nav-link @if (Request::is('referrals')) active @endif"><i
                            class="fa fa-users me-2"></i>Referrals</a>
                    <a href="wallet" class="nav-item nav-link @if (Request::is('wallet')) active @endif"><i
                            class="fa fa-wallet me-2"></i>Wallet</a>
                    <a href="blog" class="nav-item nav-link"><i class="fa fa-blog me-2"></i>Blog</a>
                </div>
            </nav>
        </div>
        <!-- Sidebar End -->


        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            <nav class="navbar navbar-expand bg-light navbar-light sticky-top px-4 py-0">
                <a href="#" class="sidebar-toggler flex-shrink-0">
                    <i class="fa fa-bars"></i>
                </a>
                <div class="navbar-nav align-items-center ms-auto">
                    @if (Auth::user()->type == 1)
                        <a class="btn btn-dark text-light" href="{{ route('users') }}">
                            <i class='bi bi-shield-lock-fill bi-sub fs-4 text-light-600'></i> CPanel
                        </a>
                    @endif
                    <div class="nav-item bg-light dropdown">
                        <a href="#" class="nav-link bg-light dropdown-toggle" data-bs-toggle="dropdown">
                            <img class="rounded-circle me-lg-2"
                                src="{{ asset('storage/images/profile/' . Auth::user()->profile_image) }}"
                                alt="" style="width: 40px; height: 40px;">
                            <span class="d-none d-lg-inline-flex">{{ Auth::user()->full_name }}</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                            <a href="profile" class="dropdown-item">My Profile</a>
                            <a href="wallet" class="dropdown-item">Wallet</a>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Log Out') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </div>
                </div>
            </nav>
            <!-- Navbar End -->

            @include('inc.messages')

            @yield('content')

            <!-- Footer Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-light rounded-top p-4">
                    <div class="row">
                        <div class="col-12 col-sm-6 text-center text-sm-start">
                            &copy; 2021 <a href="{{ url('/') }}">{{ config('app.name') }}</a>, All Right
                            Reserved.
                        </div>
                    </div>
                </div>
            </div>
            <!-- Footer End -->
        </div>
        <!-- Content End -->

        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    <script src="{{ asset('js/lib/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('js/lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('js/lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('js/lib/apexcharts/apexcharts.min.js') }}"></script>

    <!-- App Javascript -->
    <script src="{{ mix('js/auth.js') }}"></script>

    @yield('script')
</body>

</html>
