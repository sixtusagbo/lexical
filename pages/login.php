<?php

$filename = basename($_SERVER['PHP_SELF'], '.php');

include_once '../common.php';

//  redirect if logged in
if (isLoggedIn()) {
    header('Location: ../auth/dashboard');
}

?>

<!DOCTYPE html>
<html>

<head>
    <!-- title of our page -->
    <title>LexicalPay | <?php echo getPageTitle($filename); ?></title>

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

    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>

    <link href="assets/css/login.css" rel="stylesheet">
</head>

<body>

    <form method="POST" class="form-signin" id="signin-form">
        <div class="text-center mb-4">
            <img class="mb-2" src="assets/images/logo.png" alt="" class="rounded" width="200">
            <h1 class="h3 mb-3 fw-bold">Welcome Back!</h1>
        </div>
        <div id="error" class="error"></div>

        <div class="form-label-group">
            <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email address" required>
            <label for="inputEmail">Email address</label>
        </div>

        <div class="form-label-group">
            <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
            <label for="inputPassword">Password</label>
        </div>

        <button name="signin" id="signinButton" type="submit" class="btn btn-lg btn-primary text-center w-100">Sign in</button>
        <div class="hint-text mt-4 fw-bold text-center">New member? <a href="signup">Sign Up here</a></div>
    </form>


    <!-- jquery -->
    <script src="assets/vendor/jquery.js"></script>

    <!-- FontAwesome -->
    <script src="assets/vendor/fontawesome.js"></script>

    <!-- Bootstrap -->
    <script src="assets/vendor/bootstrap.bundle.js"></script>

    <!-- <?php echo strtoupper($filename) ?> JS -->
    <script src="assets/js/<?php echo $filename ?>.js?v=<?php echo time(); ?>"></script>

</body>

</html>