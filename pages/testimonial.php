<?php 
    $filename = basename($_SERVER['PHP_SELF'], '.php');
?>

<?php include_once 'components/header.php'; ?>

    <!-- Main wrapper -->
    <div class="main-wrapper">
        <!-- Title Section -->
        <section id="hero-title">
            <div class="d-flex flex-column align-self-center align-items-center justify-content-center px-5 py-3">
                <h3 class=" display-4 fw-bolder title-text">Testimonials</h3>
                <p class="lead">
                    Testimonies from those enjoying LexicalPay
                </p>
            </div>
        </section>

        <!-- About Section -->
        <section id="about" class="white-section py-5 px-5 my-5 mx-5">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <video src="assets/videos/Northern_Nigerian-woman.mp4" height="500" width="240" controls></video>
                    </div>
                    <div class="col">
                        <video src="assets/videos/Lenah_Hue.mp4" height="500" width="240" controls></video>
                    </div>
                    <div class="col">
                        <video src="assets/videos/testimonial-cashout.mp4" height="600" width="240" controls></video>
                    </div>
                </div>
            </div>
        </section>
    </div>

<?php include_once 'components/footer.php'; ?>