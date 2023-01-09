<?php
include_once '../common.php';

//  redirect if logged out
if (!isLoggedIn()) {
  header('Location: ../pages/login');
}
// redirect if user is not admin
if ($_SESSION['user_info']['user_level'] != '1') {
  header('Location: ../auth/dashboard');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>LexicalPay - Dashboard</title>

  <link rel="preconnect" href="https://fonts.gstatic.com" />
  <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="assets/css/bootstrap.css" />

  <link rel="stylesheet" href="assets/vendors/iconly/bold.css" />

  <link rel="stylesheet" href="assets/vendors/perfect-scrollbar/perfect-scrollbar.css" />
  <link rel="stylesheet" href="assets/vendors/bootstrap-icons/bootstrap-icons.css" />
  <link rel="stylesheet" href="assets/css/app.css" />
  <link rel="shortcut icon" href="../../favicon.ico" type="image/x-icon" />
</head>

<body>
  <div id="app">
    <div id="sidebar" class="active">
      <div class="sidebar-wrapper active">
        <div class="sidebar-header">
          <div class="d-flex justify-content-between">
            <div class="logo">
              <a href="dashboard"><img src="assets/images/logo/logo.png" alt="Logo" srcset="" width="130" height="200" /></a>
            </div>
            <div class="toggler">
              <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
            </div>
          </div>
        </div>
        <div class="sidebar-menu">
          <ul class="menu">
            <li class="sidebar-title">Admin Panel</li>

            <li class="sidebar-item">
              <a href="cashouts" class="sidebar-link">
                <i class="iconly-boldLock"></i>
                <span>Cash Out</span>
              </a>
            </li>
            <li class="sidebar-item active">
              <a href="coupons" class="sidebar-link">
                <i class="iconly-boldLock"></i>
                <span>Coupon Codes</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a href="blog" class="sidebar-link">
                <i class="iconly-boldLock"></i>
                <span>Access Blog</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a href="users" class="sidebar-link">
                <i class="iconly-boldLock"></i>
                <span>All Users</span>
              </a>
            </li>
          </ul>
        </div>
        <button class="sidebar-toggler btn x">
          <i data-feather="x"></i>
        </button>
      </div>
    </div>
    <div id="main">
      <?php include_once 'components/header.php'; ?>

      <div class="page-heading">
        <h3>Coupon Codes</h3>
      </div>
      <div class="page-content">
        <section class="row">
          <div class="col-12">
            <div class="row">
              <div class="col-12">
                <form action="../../inc/process_new_coupon.php" class="form-inline">
                  <button type="submit" class="btn btn-outline-success btn-lg btn-block mb-3">New Coupon</button>
                </form>
                <div class="card">
                  <div class="card-header">
                    <h4 class="card-title">Unused Coupons</h4>
                  </div>
                  <div class="card-content">
                    <div class="table-responsive">
                      <?php $coupons = getUnusedCoupons(); ?>
                      <table class="table table-striped mb-0 table-lg">
                        <tbody>
                          <?php foreach ($coupons as $coupon) : ?>
                            <tr>
                              <td><?= $coupon['coupon']; ?></td>
                            </tr>
                          <?php endforeach; ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
    </div>
  </div>
  <script src="assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>

  <script src="assets/js/pages/referrals.js"></script>

  <script src="assets/js/mazer.js"></script>
</body>

</html>