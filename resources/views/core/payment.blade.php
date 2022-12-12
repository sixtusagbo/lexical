@extends('layouts.core')

@section('content')
    <!-- Page Header Start -->
    <div class="container-fluid page-header mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container">
            <h1 class="display-3 mb-4 animated slideInDown">Payments</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Payments</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Payment Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <p class="d-inline-block border rounded text-primary fw-semi-bold py-1 px-3">Payments</p>
                <h1 class="display-5 mb-5">Get paid in due time</h1>
            </div>
            <div class="wow fadeInUp" data-wow-delay="0.3s">
                <!-- Gallery -->
                <div class="row">
                    <div class="col-lg-4 col-md-12 mb-4 mb-lg-0">
                        <img src="{{ asset('images/payment-1.jpeg') }}" class="w-100 shadow-1-strong rounded mb-4"
                            alt="" />

                        <img src="{{ asset('images/payment-2.jpeg') }}" class="w-100 shadow-1-strong rounded mb-4"
                            alt="" />
                    </div>
                    <div class="col-lg-4 mb-4 mb-lg-0">
                        <img src="{{ asset('images/payment-3.jpeg') }}" class="w-100 shadow-1-strong rounded mb-4"
                            alt="" />

                        <img src="{{ asset('images/payment-4.jpeg') }}" class="w-100 shadow-1-strong rounded mb-4"
                            alt="" />
                    </div>

                    <div class="col-lg-4 mb-4 mb-lg-0">
                        <img src="{{ asset('images/payment-5.jpeg') }}" class="w-100 shadow-1-strong rounded mb-4"
                            alt="" />

                        <img src="{{ asset('images/payment-6.jpeg') }}" class="w-100 shadow-1-strong rounded mb-4"
                            alt="" />
                    </div>
                </div>
                <!-- Gallery -->
            </div>
        </div>
    </div>
    <!-- Payment End -->
@endsection
