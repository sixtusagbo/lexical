<?php
$filename = basename($_SERVER['PHP_SELF'], '.php');
?>

<?php include_once 'components/header.php'; ?>

<!-- Main wrapper -->
<div class="main-wrapper">
    <!-- Title Section -->
    <section id="hero-title">
        <div class="d-flex flex-column align-self-center align-items-center justify-content-center px-5 py-3">
            <h3 class="display-4 fw-bolder title-text">Frequently Asked Questions</h3>
            <p class="lead">
                Common questons people ask about LexicalPay
            </p>
        </div>
    </section>

    <!-- Faq Section -->
    <section class="faq-section pb-5">
        <div class="container">
            <div class="row">
                <!-- ***** FAQ Start ***** -->
                <div class="col-md-6 offset-md-3">
                    <div class="faq" id="accordion">
                        <div class="card">
                            <div class="card-header" id="faqHeading-1">
                                <div class="mb-0">
                                    <h5 class="faq-title" data-toggle="collapse" data-target="#faqCollapse-1" data-aria-expanded="true" data-aria-controls="faqCollapse-1">
                                        <span class="badge">1</span>How can I register?
                                    </h5>
                                </div>
                            </div>
                            <div id="faqCollapse-1" class="collapse" aria-labelledby="faqHeading-1" data-parent="#accordion">
                                <div class="card-body">
                                    <p>To register and earn on LexicalPay, you need the sum of &#8358;3000 which would be used to purchase a coupon code to activate your account. </p>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="faqHeading-2">
                                <div class="mb-0">
                                    <h5 class="faq-title" data-toggle="collapse" data-target="#faqCollapse-2" data-aria-expanded="false" data-aria-controls="faqCollapse-2">
                                        <span class="badge">2</span> How can I register a prospect under me?
                                    </h5>
                                </div>
                            </div>
                            <div id="faqCollapse-2" class="collapse" aria-labelledby="faqHeading-2" data-parent="#accordion">
                                <div class="card-body">
                                    <ol>
                                        <li>Purchase the activation code from any of the coupon vendors enlisted on the website. </li>
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
                                    <h5 class="faq-title" data-toggle="collapse" data-target="#faqCollapse-3" data-aria-expanded="false" data-aria-controls="faqCollapse-3">
                                        <span class="badge">3</span>How do I earn?
                                    </h5>
                                </div>
                            </div>
                            <div id="faqCollapse-3" class="collapse" aria-labelledby="faqHeading-3" data-parent="#accordion">
                                <div class="card-body">
                                    <p>You earn from huge sign-up bonus, by inviting friends, daily login bonus of &#8358;300 on LexicalPay till eternity. </p>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="faqHeading-4">
                                <div class="mb-0">
                                    <h5 class="faq-title" data-toggle="collapse" data-target="#faqCollapse-4" data-aria-expanded="false" data-aria-controls="faqCollapse-4">
                                        <span class="badge">4</span> How much can I get from referring a friend?
                                    </h5>
                                </div>
                            </div>
                            <div id="faqCollapse-4" class="collapse" aria-labelledby="faqHeading-4" data-parent="#accordion">
                                <div class="card-body">
                                    <p>You automatically get the sum of &#8358;1200 on each person you refer.</p>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="faqHeading-5">
                                <div class="mb-0">
                                    <h5 class="faq-title" data-toggle="collapse" data-target="#faqCollapse-5" data-aria-expanded="false" data-aria-controls="faqCollapse-5">
                                        <span class="badge">5</span> What are the days of withdrawal?
                                    </h5>
                                </div>
                            </div>
                            <div id="faqCollapse-5" class="collapse" aria-labelledby="faqHeading-5" data-parent="#accordion">
                                <div class="card-body">
                                    <ul>
                                        <li>Referral cash out is on 10th and 20th of every month <b>(9:00AM - 11:00AM)</b></li>
                                        <li>Non-referral cash out is on the 25th of every month <b>(9:00AM - 10:00AM)</b></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="faqHeading-6">
                                <div class="mb-0">
                                    <h5 class="faq-title" data-toggle="collapse" data-target="#faqCollapse-6" data-aria-expanded="false" data-aria-controls="faqCollapse-6">
                                        <span class="badge">6</span> Other issues?
                                    </h5>
                                </div>
                            </div>
                            <div id="faqCollapse-6" class="collapse show" aria-labelledby="faqHeading-6" data-parent="#accordion">
                                <div class="card-body">
                                    <p>Kindly <a href="contact">contact</a> us. You're just a message away from assistance!</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<?php include_once 'components/footer.php'; ?>