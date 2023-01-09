<?php
$filename = basename($_SERVER['PHP_SELF'], '.php');
?>

<?php include_once 'components/header.php'; ?>

<!-- Main wrapper -->
<div class="main-wrapper">
    <!-- Title Section -->
    <section id="title" class="color-section">
        <div class="row">
            <div class="col-lg-6 cta cta-first">
                <h1 style="font-weight: 900;letter-spacing: 3px;">Earn &#8358;5000 Daily!</h1>
                <p class="lead text-light">Get paid by inviting friends, repost from our blog, daily bonus and much
                    more!</p>
                <div class="d-flex justify-content-around">
                    <a class="btn btn-light btn-lg rounded-pill py-3" href="payments">Payments 💰</a>
                    <a class="btn btn-outline-light btn-lg rounded-pill py-3" href="signup">Join Us Now!</a>
                </div>
            </div>
            <div class="col-lg-6 hero">
                <img src="./assets/images/hero-banner.jpeg" class="img-fluid site-banner" alt="lexicalpay-banner">
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section id="features" class="white-section">

        <div class="d-flex flex-column align-self-center align-items-center justify-content-center">
            <h3 class="text-primary feature-caption">#1 Social media earning platform in Nigeria</h3>
        </div>
        <div class="row">
            <div class="feature-box col-lg-4">
                <img src="assets/images/welcome.svg" alt="" class="feature-icon">
                <h3 class="feature-title">1<sup>st</sup> - Join Us</h3>
                <p class="lead">Sign up with us and you'll be rewarded with a &#8358;500 sign-up bonus.</p>
                <a class="btn btn-primary btn-lg rounded-pill py-2" href="signup">Sign Up</a>
            </div>

            <div class="feature-box col-lg-4">
                <img src="assets/images/earn.svg" alt="" class="feature-icon">
                <h3 class="feature-title">2<sup>nd</sup> - Earn</h3>
                <p class="lead">Earn as much as you can by performing tasks, inviting friends and daily login.</p>
            </div>

            <div class="feature-box col-lg-4">
                <img src="assets/images/withdraw-earning.svg" alt="" class="feature-icon">
                <h3 class="feature-title">3<sup>rd</sup> - Cash Out</h3>
                <Get class="lead">Get massive cash outs from your device through any financial platform - PayPal, Venmo,
                    Cash App, Bitcoin, and much more.</p>
            </div>
        </div>

    </section>

    <!-- Testimonials Section -->
    <section id="testimonials">
        <div class="container rounded">
            <div class="d-flex justify-content-center"> <i class="fas fa-heart"></i> </div>
            <p class="tag fw-bold">Our customers love</p>
            <h1 class="text-primary text-center head fw-bold lsp-2">What we do</h1>
            <div class="owl-carousel owl-theme">
                <div class="owl-item">
                    <div class="card d-flex flex-column">
                        <div class="mt-2"> <span class="fas fa-star active-star"></span> <span class="fas fa-star active-star"></span> <span class="fas fa-star active-star"></span>
                            <span class="fas fa-star active-star"></span> <span class="fas fa-star-half-alt active-star"></span>
                        </div>
                        <div class="main font-weight-bold pb-2 pt-1">Great Service</div>
                        <div class="testimonial"> I registered on LexicalPay with fear but today I'm happy I have made
                            alot from it. </div>
                        <div class="d-flex flex-row profile pt-4 mt-auto"> <img src="assets/images/testim5.jpeg" alt="" class="rounded-circle">
                            <div class="d-flex flex-column pl-2">
                                <div class="name">Ruth O'Ryan</div>
                                <p class="text-muted designation">Top-notch Earner</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="owl-item">
                    <div class="card d-flex flex-column">
                        <div class="mt-2"> <span class="fas fa-star active-star"></span> <span class="fas fa-star active-star"></span> <span class="fas fa-star active-star"></span>
                            <span class="fas fa-star active-star"></span> <span class="fas fa-star-half-alt active-star"></span>
                        </div>
                        <div class="main font-weight-bold pb-2 pt-1">Great Service</div>
                        <div class="testimonial"> LexicalPay is a reliable organization to all individuals ranging from
                            teenagers to the general adults. </div>
                        <div class="d-flex flex-row profile pt-4 mt-auto"> <img src="assets/images/testim3.jpeg" alt="" class="rounded-circle">
                            <div class="d-flex flex-column pl-2">
                                <div class="name">Tayo Olaniyi</div>
                                <p class="text-muted designation">Top Earner</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="owl-item">
                    <div class="card d-flex flex-column">
                        <div class="mt-2"> <span class="fas fa-star active-star"></span> <span class="fas fa-star active-star"></span> <span class="fas fa-star active-star"></span>
                            <span class="fas fa-star active-star"></span> <span class="fas fa-star-half-alt active-star"></span>
                        </div>
                        <div class="main font-weight-bold pb-2 pt-1">Great Service</div>
                        <div class="testimonial"> Now I can boast of paying my school fees alone without the help of any
                            one, all thanks to the LexicalPay team. </div>
                        <div class="d-flex flex-row profile pt-4 mt-auto"> <img src="assets/images/testim1.jpeg" alt="" class="rounded-circle">
                            <div class="d-flex flex-column pl-2">
                                <div class="name">Vincent Okoro</div>
                                <p class="text-muted designation">Top Affiliate</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="owl-item">
                    <div class="card d-flex flex-column">
                        <div class="mt-2"> <span class="fas fa-star active-star"></span> <span class="fas fa-star active-star"></span> <span class="fas fa-star active-star"></span>
                            <span class="fas fa-star active-star"></span> <span class="fas fa-star-half-alt active-star"></span>
                        </div>
                        <div class="main font-weight-bold pb-2 pt-1">Great Service</div>
                        <div class="testimonial"> I truly believe that this platform is best because it brings people
                            together, so come and join us and let's build a better future together! </div>
                        <div class="d-flex flex-row profile pt-4 mt-auto"> <img src="assets/images/testim2.jpeg" alt="" class="rounded-circle">
                            <div class="d-flex flex-column pl-2">
                                <div class="name">Christina Vaughan</div>
                                <p class="text-muted designation">Top Earner</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="owl-item">
                    <div class="card d-flex flex-column">
                        <div class="mt-2"> <span class="fas fa-star active-star"></span> <span class="fas fa-star active-star"></span> <span class="fas fa-star active-star"></span>
                            <span class="fas fa-star active-star"></span> <span class="fas fa-star-half-alt active-star"></span>
                        </div>
                        <div class="main font-weight-bold pb-2 pt-1">Great Service</div>
                        <div class="testimonial"> As an outstanding member of this platform, i really thank LexicalPay
                            because it has made me financially strong. </div>
                        <div class="d-flex flex-row profile pt-4 mt-auto"> <img src="assets/images/testim4.jpeg" alt="" class="rounded-circle">
                            <div class="d-flex flex-column pl-2">
                                <div class="name">Enya Larson</div>
                                <p class="text-muted designation">Member</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section id="about" class="white-section py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="d-flex flex-column align-self-center align-items-center justify-content-center py-5">
                        <h3 class=" display-5 text-dark fw-bolder lsp-3">Who We Are</h3>
                        <p class="lead">
                            LexicalPay is a community of millions of people who choose to earn from social media by
                            performing tasks in exchange for payment. Every day, many people get paid through LexicalPay
                            just for sharing our products, inviting friends and much more.
                        </p>
                    </div>
                </div>
                <div class="col-md-6">
                    <img src="./assets/images/about.svg" class="img-fluid">
                </div>
            </div>
        </div>
    </section>
</div>

<?php include_once 'components/footer.php'; ?>