<?php

include_once '../common.php';

?>

<!DOCTYPE html>
<html>

<head>
  <!-- title of our page -->
  <title>LexicalPay | <?php echo getPageTitle($filename); ?></title>
  <meta name="title" content="Lexical Pay -  #1 Earning platform in Nigeria">
    <meta name="description" content="With Lexical Pay you can Earn as much as you can by performing tasks, inviting friends and much more!">
    
    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://lexicalpay.com/">
    <meta property="og:title" content="Lexical Pay -  #1 Earning platform in Nigeria">
    <meta property="og:description" content="With Lexical Pay you can Earn as much as you can by performing tasks, inviting friends and much more!">
    <meta property="og:image" content="https://www.lexicalpay.com/pages/assets/images/hero-banner.jpeg">
    
    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="https://lexicalpay.com/">
    <meta property="twitter:title" content="Lexical Pay -  #1 Earning platform in Nigeria">
    <meta property="twitter:description" content="With Lexical Pay you can Earn as much as you can by performing tasks, inviting friends and much more!">
    <meta property="twitter:image" content="https://www.lexicalpay.com/pages/assets/images/hero-banner.jpeg">

  <!-- responsive -->
  <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />

  <!-- include favicon -->
  <link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />

  <!-- include fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Roboto" rel="stylesheet" />

  <!-- Bootstrap css -->
  <link rel="stylesheet" href="assets/vendor/bootstrap.css" />
  <!-- FontAwesome css -->
  <link rel="stylesheet" href="assets/vendor/fontawesome.css" />

  <!-- Owl Carousel css -->
  <link rel="stylesheet" href="assets/vendor/owl.carousel.min.css" />
  <link rel="stylesheet" href="assets/vendor/owl.theme.default.css" />

  <!-- css styles for home page -->
  <link href="assets/css/global.css" rel="stylesheet" />
  <link href="assets/css/<?php echo $filename ?>.css?v=<?php echo time(); ?>" rel="stylesheet" />

</head>

<body>
  <!-- Navbar -->

  <div class="pc-only">
    <nav class="navbar navbar-expand-lg navbar-primary">
      <div class="container">
        <a class="navbar-brand" href="">
          <img src="assets/images/logo.png" alt="" height="60" width="150px">
        </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarTogglerDemo02">

          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a href="home#title" class="nav-link">Home</a>
            </li>
            <li class="nav-item">
              <a href="testimonial" class="nav-link">Testimonials</a>
            </li>
            <li class="nav-item">
              <a href="payments" class="nav-link">Payments</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Info
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item text-light text-bold" href="home#features">Features</a>
                <a class="dropdown-item text-light text-bold" href="../auth/blog">Blog</a>
                <a class="dropdown-item text-light text-bold" href="contact">Contact</a>
                <a class="dropdown-item text-light text-bold" href="faq">FAQ</a>
                <a class="dropdown-item text-light text-bold" href="home#about">About Us</a>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="signup"><i class="far fa-user-plus"></i> Sign Up</a>
            </li>
          </ul>
        </div>

      </div>
    </nav>
  </div>

  <div class="mobile-only">
    <nav class="navbar navbar-expand-lg navbar-light">
      <div class="container-fluid">
        <a class="navbar-brand" href="">
          <img src="assets/images/logo.png" alt="" height="60" width="150px">
        </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarTogglerDemo02">

          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a href="home" class="nav-link text-primary">Home</a>
            </li>
            <li class="nav-item">
              <a href="testimonial" class="nav-link text-primary">Testimonials <span class="text-danger">❤<span></a>
            </li>
            <li class="nav-item">
              <a href="payments" class="nav-link text-primary">Payments 💰</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle text-primary" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Info
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item text-light text-bold" href="#features">Features</a>
                <a class="dropdown-item text-light text-bold" href="../auth/blog">Blog</a>
                <a class="dropdown-item text-light text-bold" href="contact">Contact</a>
                <a class="dropdown-item text-light text-bold" href="faq">FAQ</a>
                <a class="dropdown-item text-light text-bold" href="home#about">About Us</a>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link text-primary" href="login">Log In</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-primary" href="signup">Sign Up</a>
            </li>
          </ul>
        </div>

      </div>
    </nav>
  </div>

  <!-- Categories Navbar still to come -->