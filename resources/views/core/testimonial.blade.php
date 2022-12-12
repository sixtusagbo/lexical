@extends('layouts.core')

@section('content')
    <!-- Page Header Start -->
    <div class="container-fluid page-header mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container">
            <h1 class="display-3 mb-4 animated slideInDown">Testimonies</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Testimonial</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Testimonial Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <p class="d-inline-block border rounded text-primary fw-semi-bold py-1 px-3">Testimonial</p>
                <h1 class="display-5 mb-5">From those enjoying {{ config('app.name') }}!</h1>
            </div>
            <div class="owl-carousel testimonial-carousel wow fadeInUp" data-wow-delay="0.3s">
                <div class="testimonial-item">
                    <video src="{{ asset('videos/Northern_Nigerian-woman.mp4') }}" height="500" width="240"
                        controls></video>
                </div>
                <div class="testimonial-item">
                    <video src="{{ asset('videos/Lenah_Hue.mp4') }}" height="500" width="240" controls></video>
                </div>
                <div class="testimonial-item">
                    <video src="{{ asset('videos/testimonial-cashout.mp4') }}" height="600" width="240"
                        controls></video>
                </div>
                <div class="testimonial-item">
                    <video src="{{ asset('videos/Lenah_Hue.mp4') }}" height="500" width="240" controls></video>
                </div>
            </div>
        </div>
    </div>
    <!-- Testimonial End -->
@endsection
