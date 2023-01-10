@extends('layouts.core')

@section('content')
    <!-- Page Header Start -->
    <div class="container-fluid page-header mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container">
            <h1 class="display-3 mb-4 animated slideInDown">Payments</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">FAQ</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->

    <!-- FAQ Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <p class="d-inline-block border rounded text-primary fw-semi-bold py-1 px-3">Frequently Asked Questions</p>
                <h1 class="display-5 mb-5">Common questons people ask about {{ config('app.name') }}</h1>
            </div>
            <div class="faq-section wow fadeInUp pb-5" data-wow-delay="0.3s">
                <div class="container">
                    <div class="row">
                        <!-- ***** FAQ Start ***** -->
                        <div class="col-md-6 offset-md-3">
                            <div class="faq" id="accordion">
                                <div class="card">
                                    <div class="card-header" id="faqHeading-1">
                                        <div class="mb-0">
                                            <h5 class="faq-title" data-bs-toggle="collapse" data-bs-target="#faqCollapse-1"
                                                data-aria-expanded="true" data-aria-controls="faqCollapse-1">
                                                <span class="badge">1</span>How can I register?
                                            </h5>
                                        </div>
                                    </div>
                                    <div id="faqCollapse-1" class="collapse" aria-labelledby="faqHeading-1"
                                        data-parent="#accordion">
                                        <div class="card-body">
                                            <p>To register and earn on LexicalPay, you need the sum of &#8358;3000 which
                                                would be
                                                used to purchase a coupon code to activate your account. </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" id="faqHeading-2">
                                        <div class="mb-0">
                                            <h5 class="faq-title" data-bs-toggle="collapse" data-bs-target="#faqCollapse-2"
                                                data-aria-expanded="false" data-aria-controls="faqCollapse-2">
                                                <span class="badge">2</span> How can I register a prospect under me?
                                            </h5>
                                        </div>
                                    </div>
                                    <div id="faqCollapse-2" class="collapse" aria-labelledby="faqHeading-2"
                                        data-parent="#accordion">
                                        <div class="card-body">
                                            <ol>
                                                <li>Purchase the activation code from any of the coupon vendors enlisted
                                                    on the
                                                    website. </li>
                                                <li>Login to your dashboard and click on your referal link.</li>
                                                <li>Fill in the details of your prospect correctly. </li>
                                                <li>Enter the coupon code and agree to terms and conditions.</li>
                                                <li>Click Sign Up.</li>
                                            </ol>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" id="faqHeading-3">
                                        <div class="mb-0">
                                            <h5 class="faq-title" data-bs-toggle="collapse" data-bs-target="#faqCollapse-3"
                                                data-aria-expanded="false" data-aria-controls="faqCollapse-3">
                                                <span class="badge">3</span>How do I earn?
                                            </h5>
                                        </div>
                                    </div>
                                    <div id="faqCollapse-3" class="collapse" aria-labelledby="faqHeading-3"
                                        data-parent="#accordion">
                                        <div class="card-body">
                                            <p>You earn from huge sign-up bonus, by inviting friends, daily login bonus
                                                of
                                                &#8358;300 on LexicalPay till eternity. </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" id="faqHeading-4">
                                        <div class="mb-0">
                                            <h5 class="faq-title" data-bs-toggle="collapse" data-bs-target="#faqCollapse-4"
                                                data-aria-expanded="false" data-aria-controls="faqCollapse-4">
                                                <span class="badge">4</span> How much can I get from referring a
                                                friend?
                                            </h5>
                                        </div>
                                    </div>
                                    <div id="faqCollapse-4" class="collapse" aria-labelledby="faqHeading-4"
                                        data-parent="#accordion">
                                        <div class="card-body">
                                            <p>You automatically get the sum of @money(config('myglobals.referral_worth')) on each person you refer.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" id="faqHeading-5">
                                        <div class="mb-0">
                                            <h5 class="faq-title" data-bs-toggle="collapse" data-bs-target="#faqCollapse-5"
                                                data-aria-expanded="false" data-aria-controls="faqCollapse-5">
                                                <span class="badge">5</span> What are the days of withdrawal?
                                            </h5>
                                        </div>
                                    </div>
                                    <div id="faqCollapse-5" class="collapse" aria-labelledby="faqHeading-5"
                                        data-parent="#accordion">
                                        <div class="card-body">
                                            <ul>
                                                <li>Cash out is every friday<b>(9:00AM -
                                                        02:00PM)</b>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" id="faqHeading-6">
                                        <div class="mb-0">
                                            <h5 class="faq-title" data-bs-toggle="collapse"
                                                data-bs-target="#faqCollapse-6" data-aria-expanded="false"
                                                data-aria-controls="faqCollapse-6">
                                                <span class="badge">6</span> Other issues?
                                            </h5>
                                        </div>
                                    </div>
                                    <div id="faqCollapse-6" class="collapse show" aria-labelledby="faqHeading-6"
                                        data-parent="#accordion">
                                        <div class="card-body">
                                            <p>Kindly <a href="contact">contact</a> us. You're just a message away from
                                                assistance!
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- FAQ End -->
@endsection
