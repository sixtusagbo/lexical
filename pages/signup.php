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
    <!-- Local css -->
    <link rel="stylesheet" href="assets/css/signup.css" />
</head>

<body>
    <div class="signup-form">
        <form method="post" id="registration-form">
            <h2>Sign Up</h2>
            <p>Don't have coupon code <a href="vendors">purchase here</a></p>
            <div id="error" class="error"></div>
            <hr>
            <div class="form-group">
                <div class="row">
                    <div class="col"><input type="text" class="form-control" name="first_name" placeholder="First Name" required="required"></div>
                    <div class="col"><input type="text" class="form-control" name="last_name" placeholder="Last Name" required="required"></div>
                </div>
            </div>
            <div class="form-group">
                <input type="email" class="form-control" name="email" placeholder="Email" required="required">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="password" placeholder="Password" required="required">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="confirm_password" placeholder="Confirm Password" required="required">
            </div>
            <div class="form-group">
                <input type="number" id="phone_number" class="form-control" placeholder="Phone number" name="phone_number" />
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="coupon_code" placeholder="Coupon Code" required="required" style="-webkit-text-security: square;">
            </div>
            <?php if (isset($_GET['r']) && $_GET['r'] != '') : ?>
                <input type="hidden" name="ref" value="<?php $r = $_GET['r'];
                                                        echo $r; ?>">
            <?php endif; ?>
            <div class="form-group">
                <label class="form-check-label"><input type="checkbox" required="required"> I accept the <a href="#">Terms of Use</a> &amp; <a href="#">Privacy Policy</a></label>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-lg" id="signupButton">Sign Up</button>
            </div>
        </form>
        <div class="hint-text">Already have an account? <a href="login">Login here</a></div>
    </div>

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