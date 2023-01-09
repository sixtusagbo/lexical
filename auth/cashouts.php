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

$msg = "";
$css_class = "";
$cashoutDayPath = "../config/icanseeunow/cashout_day.txt";
$referralCashoutDayPath = "../config/icanseeunow/referral_cashout_day.txt";

if (isset($_POST['save-cashout-day'])) {

  if (isset($_POST['closeCashouts']) && $_POST['closeCashouts'] == 'on') {
    setCashOutDay($cashoutDayPath, 0);
    setCashOutDay($referralCashoutDayPath, 0);

    $msg = 'Cashouts closed successfully!';
    $css_class = 'alert-success';
  } else {
    if (!isset($_POST['withdrawalDay']) || !isset($_POST['referralDay'])) {
      $msg = 'Please choose an option before saving changes.';
      $css_class = 'alert-danger';
    } else {

      if ($_POST['withdrawalDay'] == '1' && $_POST['referralDay'] == '1') {

        setCashOutDay($cashoutDayPath, 1);
        setCashOutDay($referralCashoutDayPath, 1);

        $msg = 'Changes saved successfully.';
        $css_class = 'alert-success';
      } elseif ($_POST['withdrawalDay'] == '1' && $_POST['referralDay'] == '0') {

        setCashOutDay($cashoutDayPath, 1);
        setCashOutDay($referralCashoutDayPath, 0);

        $msg = 'Changes saved successfully.';
        $css_class = 'alert-success';
      } elseif ($_POST['withdrawalDay'] == '0' && $_POST['referralDay'] == '1') {

        setCashOutDay($cashoutDayPath, 1);
        setCashOutDay($referralCashoutDayPath, 1);

        $msg = 'Changes saved successfully.';
        $css_class = 'alert-success';
      } elseif ($_POST['withdrawalDay'] == '0' && $_POST['referralDay'] == '0') {
        $msg = 'Alright, I just left them.';
        $css_class = 'alert-warning';
      }
    }
  }
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

            <li class="sidebar-item active">
              <a href="cashouts" class="sidebar-link">
                <i class="iconly-boldLock"></i>
                <span>Cash Out</span>
              </a>
            </li>
            <li class="sidebar-item">
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
        <h3>Cash Outs</h3>
      </div>
      <div class="page-content">
        <section class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-content">
                <div class="card-body">
                  <?php if (!empty($msg)) : ?>
                    <div class="alert <?= $css_class; ?> alert-dismissible show fade">
                      <?= $msg; ?>
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                  <?php endif; ?>
                  <form action="" method="post" class="form form-horizontal">
                    <div class="form-body">
                      <div class="row">
                        <div class="col-md-4">
                          <label>Cashout day?</label>
                        </div>
                        <div class="col-md-8 form-group">
                          <select class="form-select" name="withdrawalDay">
                            <option selected disabled>Choose</option>
                            <option value="1">Make today cashout day</option>
                            <option value="0">No, just leave it</option>
                          </select>
                        </div>
                        <div class="col-md-4">
                          <label>Referral Cashout Day?</label>
                        </div>
                        <div class="col-md-8 form-group">
                          <select class="form-select" name="referralDay">
                            <option selected disabled>Choose</option>
                            <option value="1">Make today referral cashout day</option>
                            <option value="0">No, just leave it</option>
                          </select>
                        </div>
                        <div class="col-md-4">
                          <label for="checkbox1">Close cashouts?</label>
                        </div>
                        <div class="col-md-8 form-group">
                          <div class="checkbox">
                            <input type="checkbox" id="checkbox1" class="form-check-input" name="closeCashouts"> <b>Yes(Do not select this unless you want to close cashouts.)</b>
                          </div>
                        </div>
                        <div class="col-sm-12 d-flex justify-content-center">
                          <button type="submit" name="save-cashout-day" class="btn btn-success me-1 mb-1">Save Changes</button>
                        </div>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-content">
                    <h4 class="card-title">Pending Cash Outs</h4>
                    <div class="table-responsive">
                      <?php $cashouts = getAllPendingWithdrawals($_SESSION['user_info']['id']); ?>
                      <table class="table table-lg table-striped mb-0">
                        <thead>
                          <tr>
                            <th>Date</th>
                            <th>Type</th>
                            <th>Amount</th>
                            <th>Bank Name</th>
                            <th>Account Number</th>
                            <th>Status</th>
                            <th>Option</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php foreach ($cashouts as $cashout) : ?>
                            <tr>
                              <td><?= date('D jS M', strtotime($cashout['date'])); ?></td>
                              <td><?= $cashout['type']; ?></td>
                              <td><?= '&#8358;' . $cashout['amount']; ?></td>
                              <td><?= $cashout['bank']; ?></td>
                              <td><?= $cashout['account']; ?></td>
                              <?php switch ($cashout['status']):
                                case 0: ?>
                                  <td><span class="badge bg-warning">Pending</span></td>
                                  <?php break; ?>
                                <?php
                                case 1: ?>
                                  <td><span class="badge bg-danger">Failed</span></td>
                                  <?php break; ?>
                                <?php
                                case 2: ?>
                                  <td><span class="badge bg-success">Successful</span></td>
                                  <?php break; ?>
                              <?php endswitch; ?>
                              <td><a href="edit_cashout?id=<?= $cashout['id']; ?>" class="btn btn-primary">Edit</a></td>
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