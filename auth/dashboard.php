<?php
include_once '../common.php';

//  redirect if logged out
if (!isLoggedIn()) {
  header('Location: ../pages/login');
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
            <li class="sidebar-item active">
              <a href="dashboard" class="sidebar-link">
                <i class="bi bi-grid-fill"></i>
                <span>Dashboard</span>
              </a>
            </li>

            <li class="sidebar-item">
              <a href="profile" class="sidebar-link">
                <i class="bi bi-person-fill"></i>
                <span>My Profile</span>
              </a>
            </li>

            <li class="sidebar-item">
              <a href="referrals" class="sidebar-link">
                <i class="bi bi-people-fill"></i>
                <span>Referrals</span>
              </a>
            </li>

            <li class="sidebar-item">
              <a href="wallet" class="sidebar-link">
                <i class="iconly-boldWallet"></i>
                <span>Wallet</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a href="blog" class="sidebar-link">
                <i class="iconly-boldBookmark"></i>
                <span>Our Blog</span>
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
        <h3>Dashboard</h3>
      </div>
      <div class="page-content">
        <section class="row">
          <div class="col-12">
            <?php
            $created_at = date('Y-m-d', strtotime($_SESSION['user_info']['created_at']));
            $last_login = date('Y-m-d', strtotime($_SESSION['user_info']['last_login']));

            if ($created_at == $last_login) {
            ?>
              <div class="row">
                <div class="col-12">
                  <div class="alert alert-success alert-dismissible show fade">
                    You have successfully completed the task of joining🎯 <b>LexicalPay</b> as such, you have earned &#8358;2000.00 welcome bonus and &#8358;300.00 daily login🎯 bonus.
                    Welcome on board, <?= $_SESSION['user_info']['full_name'] ?>.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
                </div>
              </div>
            <?php } ?>

            <div class="row">
              <div class="col-6 col-lg-3 col-md-6">
                <div class="card">
                  <div class="card-body px-3 py-4-5">
                    <div class="row">
                      <div class="col-md-4">
                        <div class="stats-icon green">
                          <i class="iconly-boldUser1"></i>
                        </div>
                      </div>
                      <div class="col-md-8">
                        <h6 class="text-muted font-semibold">Referred</h6>
                        <h6 class="font-extrabold mb-0"><?php echo $_SESSION['user_info']['referrals'] ?></h6>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-6 col-lg-3 col-md-6">
                <div class="card">
                  <div class="card-body px-3 py-4-5">
                    <div class="row">
                      <div class="col-md-4">
                        <div class="stats-icon purple">
                          <i class="iconly-boldBookmark"></i>
                        </div>
                      </div>
                      <div class="col-md-8">
                        <h6 class="text-muted font-semibold">Task Earnings</h6>
                        <h6 class="font-extrabold mb-0">&#8358;<?php echo number_format((float)$_SESSION['user_info']['task_earnings'], 2, '.', '') ?></h6>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-6 col-lg-3 col-md-6">
                <div class="card">
                  <div class="card-body px-3 py-4-5">
                    <div class="row">
                      <div class="col-md-4">
                        <div class="stats-icon blue">
                          <i class="iconly-boldAdd-User"></i>
                        </div>
                      </div>
                      <div class="col-md-8">
                        <h6 class="text-muted font-semibold">Referral Earnings</h6>
                        <h6 class="font-extrabold mb-0">&#8358;<?php echo number_format((float)$_SESSION['user_info']['referral_earnings'], 2, '.', '') ?></h6>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-6 col-lg-3 col-md-6">
                <div class="card">
                  <div class="card-body px-3 py-4-5">
                    <div class="row">
                      <div class="col-md-4">
                        <div class="stats-icon red">
                          <i class="iconly-boldWallet"></i>
                        </div>
                      </div>
                      <div class="col-md-8">
                        <h6 class="text-muted font-semibold">Total Cashout</h6>
                        <h6 class="font-extrabold mb-0">&#8358;<?php echo number_format((float)$_SESSION['user_info']['total_earnings'], 2, '.', '') ?></h6>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Leaderboard</h4>
                  </div>
                  <div class="card-body">
                    <div id="chart-profile-visit"></div>
                    <div id="chart-custom"></div>
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

  <script src="assets/vendors/apexcharts/apexcharts.js"></script>
  <script src="assets/js/pages/dashboard.js"></script>

  <script src="assets/js/mazer.js"></script>
</body>

</html>