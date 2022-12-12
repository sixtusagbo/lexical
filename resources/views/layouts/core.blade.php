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
    <!-- Spinner Start -->
    <div id="spinner"
        class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" role="status" style="width: 3rem; height: 3rem;"></div>
    </div>
    <!-- Spinner End -->


    <!-- Navbar Start -->
    <div class="container-fluid fixed-top px-0 wow fadeIn" data-wow-delay="0.1s">
        <div class="top-bar row gx-0 align-items-center d-none d-lg-flex">
            <div class="col-lg-6 px-5 text-start">
                <small><i class="fa fa-map-marker-alt text-primary me-2"></i>Lagos, Nigeria</small>
                <small class="ms-4"><i class="fa fa-clock text-primary me-2"></i>24hrs</small>
            </div>
            <div class="col-lg-6 px-5 text-end">
                <small><i class="fa fa-envelope text-primary me-2"></i>info@lexicalpay.com</small>
                <small class="ms-4"><i
                        class="fa fa-phone-alt text-primary me-2"></i>{{ config('myglobals.socials.whatsapp') }}</small>
            </div>
        </div>

        <nav class="navbar navbar-expand-lg navbar-light py-lg-0 px-lg-5 wow fadeIn" data-wow-delay="0.1s">
            <a href="{{ url('/') }}" class="navbar-brand ms-4 ms-lg-0">
                <h1 class="display-5 text-primary m-0">{{ config('app.name') }}</h1>
            </a>
            <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse"
                data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto p-4 p-lg-0">
                    <a href="{{ url('/') }}"
                        class="nav-item nav-link @if (Request::is('/')) active @endif">Home</a>
                    <a href="{{ route('testimonial') }}"
                        class="nav-item nav-link
                        @if (Request::is('testimonial')) active @endif">Testimonial</a>
                    <a href="{{ route('payment') }}"
                        class="nav-item nav-link
                        @if (Request::is('payment')) active @endif">Payments</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Info</a>
                        <div class="dropdown-menu border-light m-0">
                            <a href="{{ url('/#feature') }}" class="dropdown-item">Feature</a>
                            <a href="blog.html" class="dropdown-item">Blog</a>
                            <a href="{{ route('contact') }}" class="dropdown-item">Contact</a>
                            <a href="{{ route('faq') }}" class="dropdown-item">FAQ</a>
                            <a href="{{ url('/#about') }}" class="dropdown-item">About Us</a>
                        </div>
                    </div>
                    <a href="{{ route('register') }}" class="nav-item nav-link">Sign Up</a>
                </div>
                <div class="d-none d-lg-flex ms-2">
                    <a class="btn btn-light btn-sm-square rounded-circle ms-3"
                        href="{{ config('myglobals.socials.facebook') }}">
                        <small class="fab fa-facebook-f text-primary"></small>
                    </a>
                    <a class="btn btn-light btn-sm-square rounded-circle ms-3"
                        href="{{ config('myglobals.socials.twitter') }}">
                        <small class="fab fa-twitter text-primary"></small>
                    </a>
                    <a class="btn btn-light btn-sm-square rounded-circle ms-3"
                        href="{{ config('myglobals.socials.instagram') }}">
                        <small class="fab fa-instagram text-primary"></small>
                    </a>
                </div>
            </div>
        </nav>
    </div>
    <!-- Navbar End -->

    @yield('content')

    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-light footer mt-5 py-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-white mb-4">Our Office</h4>
                    <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>Lagos, Nigeria</p>
                    <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>{{ config('myglobals.socials.whatsapp') }}
                    </p>
                    <p class="mb-2"><i class="fa fa-envelope me-3"></i>info@lexicalpay.com</p>
                    <div class="d-flex pt-2">
                        <a class="btn btn-square btn-outline-light rounded-circle me-2"
                            href="{{ config('myglobals.socials.twitter') }}"><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-square btn-outline-light rounded-circle me-2"
                            href="{{ config('myglobals.socials.facebook') }}"><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-square btn-outline-light rounded-circle me-2"
                            href="{{ config('myglobals.socials.whatsapp') }}"><i class="fab fa-whatsapp"></i></a>
                        <a class="btn btn-square btn-outline-light rounded-circle me-2"
                            href="{{ config('myglobals.socials.instagram') }}"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-white mb-4">Upcoming</h4>
                    <a class="btn btn-link" href="">Financial Planning</a>
                    <a class="btn btn-link" href="">Cash Investment</a>
                    <a class="btn btn-link" href="">Financial Consultancy</a>
                    <a class="btn btn-link" href="">Business Loans</a>
                    <a class="btn btn-link" href="">Business Analysis</a>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-white mb-4">Quick Links</h4>
                    <a class="btn btn-link" href="{{ url('/#about') }}">About Us</a>
                    <a class="btn btn-link" href="{{ route('contact') }}">Contact Us</a>
                    <a class="btn btn-link" href="{{ route('testimonial') }}">Testimonials</a>
                    <a class="btn btn-link" href="{{ route('payment') }}">Payments</a>
                    <a class="btn btn-link" href="{{ route('faq') }}">Frequently Asked Questions</a>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-white mb-4">Get Started</h4>
                    <p>Tap the button below to join us.</p>
                    <div class="position-relative w-100">
                        <button type="button"
                            class="btn btn-primary py-2 top-0 end-0 mt-2 me-2 py-2 px-4 text-center">SignUp</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->


    <!-- Copyright Start -->
    <div class="container-fluid copyright py-4">
        <div class="container">
            <div class="row">
                <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                    &copy; 2021 <a class="border-bottom" href="{{ url('/') }}">{{ config('app.name') }}</a>,
                    All
                    Right Reserved.
                </div>
                <div class="col-md-6 text-center text-md-end">
                    Developed By <a class="border-bottom" href="mailto:mail.mirolic@gmail.com">Mirolic</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Copyright End -->


    <!-- Back to Top -->
    <a href="#top" class="btn btn-lg btn-primary btn-lg-square rounded-circle back-to-top"><i
            class="bi bi-arrow-up"></i></a>

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
