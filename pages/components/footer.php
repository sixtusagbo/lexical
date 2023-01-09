  <footer id="dk-footer" class="dk-footer" style="background-color: #10096D !important;">
      <div class="container">
          <div class="row">
              <div class="col-md-12 col-lg-4">
                  <div class="dk-footer-box-info">
                      <a href="#" class="footer-logo">
                          <img src="assets/images/logo.png" alt="footer_logo" class="img-fluid">
                      </a>
                      <div class="footer-social-link text-center">
                          <h3 class="text-dark fw-bold lsp-3">Follow us</h3>
                          <ul>
                              <li>
                                  <a href="https://www.facebook.com/lexicalpay/">
                                      <i class="fab fa-facebook fa-3x"></i>
                                  </a>
                              </li>
                              <li>
                                  <a href="https://chat.whatsapp.com/CfZAxWmIu3V1S3eS5FryZR" style="color: green;">
                                      <i class="fab fa-whatsapp-square fa-3x"></i>
                                  </a>
                              </li>
                              <li>
                                  <a href="https://twitter.com/lexicalpay" style="color: skyblue;">
                                      <i class="fab fa-twitter-square fa-3x"></i>
                                  </a>
                              </li>
                              <li>
                                  <a href="https://www.instagram.com/invites/contact/?i=g37ngqfj92nq&utm_content=n4o5qij" style="color: #BD0D78;">
                                      <i class="fab fa-instagram-square fa-3x"></i>
                                  </a>
                              </li>
                          </ul>
                      </div>
                      <!-- End Social link -->
                  </div>
                  <!-- End Footer info -->
              </div>
              <!-- End Col -->
              <div class="col-md-12 col-lg-8">
                  <div class="row">
                      <div class="col-md-12 col-lg-6">
                          <div class="footer-widget footer-left-widget">
                              <div class="section-heading">
                                  <h3 class="fw-bold">Useful Links</h3>
                                  <span class="animate-border border-black"></span>
                              </div>
                              <ul>
                                  <li>
                                      <a href="home#about">About us</a>
                                  </li>
                                  <li>
                                      <a href="home#features">Features</a>
                                  </li>
                                  <li>
                                      <a href="home#testimonials">Commendations</a>
                                  </li>
                                  <li>
                                      <a href="home#title">Join Us</a>
                                  </li>
                              </ul>
                              <ul>
                                  <li>
                                      <a href="contact">Contact us</a>
                                  </li>
                                  <li>
                                      <a href="../auth/blog">Blog</a>
                                  </li>
                                  <li>
                                      <a href="testimonial">Testimonials</a>
                                  </li>
                                  <li>
                                      <a href="faq">Faq</a>
                                  </li>
                              </ul>
                          </div>
                          <!-- End Footer Widget -->
                      </div>
                      <!-- End col -->
                      <div class="col-md-12 col-lg-6">
                          <div class="d-flex justify-content-center">
                              <p class="text-center pt-2 fw-bold">&#169; 2021 <span class="fw-bolder lead">LexicalPay</span>
                              <p>
                          </div>
                      </div>
                  </div>
                  <!-- End Row -->
              </div>
              <!-- End Col -->
          </div>
          <!-- End Widget Row -->
      </div>

      <!-- Back to top -->
      <div id="back-to-top" class="back-to-top">
          <a href="#" class="btn btn-dark" title="Back to Top" style="display: block;">
              <i class="fa fa-angle-up text-dark"></i>
          </a>
      </div>
      <!-- End Back to top -->
  </footer>

  <!-- jquery -->
  <script src="assets/vendor/jquery.js"></script>

  <!-- FontAwesome -->
  <script src="assets/vendor/fontawesome.js"></script>

  <!-- Bootstrap -->
  <script src="assets/vendor/bootstrap.bundle.js"></script>

  <!-- Owl Carousel -->
  <script src="assets/vendor/owl.carousel.js"></script>

  <script src="assets/js/<?php echo $filename ?>.js?v=<?php echo time(); ?>"></script>

  <?php

    if ($filename == 'contact') {
        echo '<script src="assets/vendor/swal.min.js"></script>';
    }

    ?>

  <script src="assets/js/<?php echo $filename ?>.js?v=<?php echo time(); ?>"></script>
  </body>

  </html>