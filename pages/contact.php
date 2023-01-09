<?php $filename = basename($_SERVER['PHP_SELF'], '.php'); ?>

<?php include_once 'components/header.php'; ?>

    <!-- Main wrapper -->
    <div class="main-wrapper">
        <!-- Title Section -->
        <section id="hero-title">
            <div class="d-flex flex-column align-self-center align-items-center justify-content-center px-5 py-3">
                <h3 class=" display-4 fw-bolder title-text">Contact Us</h3>
                <p class="lead">
                    Reach us at anytime you need help with any aspect of our network - 24/7
                </p>
            </div>
        </section>

        <!-- Contact Section -->
        <section id="contact" class="py-5 px-5 w-100 mb-5">
			<div class="contact-section">
                <div class="container">
                    <form action="../inc/process_contact.php" method="post" id="contact-form">
                        <div id="cover-spin"></div>
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" name="name" id="name" placeholder="Your name">
                        </div>
                        <div class="form-group mt-3">
                            <label for="email">Email address</label>
                            <input type="email" class="form-control" name="email" id="email" placeholder="name@email.com">
                        </div>
                        <div class="form-group mt-3">
                            <label for="message">Message</label>
                            <textarea class="form-control" name="message" id="message" rows="6"></textarea>
                        </div>
                        <div class="form-group mt-3 text-center">
                            <button type="submit" id="contactFormSubmitButton" class="btn btn-primary btn-lg">Send</button>
                        </div>
                    </form>
                </div>
            </div>
		</section>
    </div>

<?php include_once 'components/footer.php'; ?>