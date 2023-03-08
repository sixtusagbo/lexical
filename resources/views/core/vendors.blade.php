@extends('layouts.core')

@section('content')
    <!-- Page Header Start -->
    <div class="container-fluid page-header mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container">
            <h1 class="display-3 mb-4 animated slideInDown">Coupon Vendors</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Vendors</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->

    <!-- Vendors Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <p class="d-inline-block border rounded text-primary fw-semi-bold py-1 px-3">Frequently Asked Questions</p>
                <h1 class="display-5 mb-5">Common questons people ask about {{ config('app.name') }}</h1>
            </div>
            <div class="vendor-section wow fadeInUp pb-5" data-wow-delay="0.3s">
                <div class="container">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">Vendor</th>
                                    <th scope="col">Whatsapp Contact</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Daniel Ayibakule</td>
                                    <td>
                                        <a href="https://wa.me/2347088583548">https://wa.me/2347088583548</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Qwin Tv</td>
                                    <td>
                                        <a href="http://wa.me/2349063118052">http://wa.me/2349063118052</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Lastb Media</td>
                                    <td>
                                        <a href="https://wa.me/2349033345553">https://wa.me/2349033345553</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Levs Empire</td>
                                    <td>
                                        <a href="https://wa.me/2349137194952">https://wa.me/2349137194952</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Remy Jex</td>
                                    <td>
                                        <a href="http://wa.me/2347044798092">wa.me/2347044798092</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Vibes Media</td>
                                    <td>
                                        <a href="https://wa.me/2349015623918">https://wa.me/2349015623918</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Alpha Tv Show</td>
                                    <td>
                                        <a href="https://wa.me/2349013779533">wa.me/2349013779533</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Kings Media</td>
                                    <td>
                                        <a href="https://wa.me/2347060403352">https://wa.me/2347060403352</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Mohammed Abdullah</td>
                                    <td>
                                        <a
                                            href="https://wa.me/message/2348143686778">https://wa.me/message/2348143686778</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Bigi’s Tv</td>
                                    <td>
                                        <a href="https://wa.me/2348108476968">https://wa.me/2348108476968</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Show Tv</td>
                                    <td>
                                        <a href="https://wa.me/2347047526884">http://wa.me/2347047526884</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Moses Telecoms</td>
                                    <td>
                                        <a href="https://wa.me/2349049436446">https://wa.me/2349049436446</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>T2 shuga</td>
                                    <td>
                                        <a href="https://wa.me/2349074684256">https://wa.me/2349074684256</a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Vendors End -->
@endsection
