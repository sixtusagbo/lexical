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

if (isset($_POST['save-cashout'])) {
  $msg = updateWithdrawalStatus($_POST['userId'], $_POST['newStatus'], $_POST['remark'], $_POST['type'], $_POST['amount'], $_REQUEST['id']);

  Header('Location: edit_cashout?id=' . $_REQUEST['id']);
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
        <h3>Edit Cash Out</h3>
      </div>
      <div class="page-content">
        <section class="row">
          <div class="col-12">
            <?php if (!empty($msg)) : ?>
              <div class="alert alert-success alert-dismissible show fade">
                <i class="bi bi-check-circle bi-sub"></i> <?= $msg; ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
            <?php endif; ?>
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-content">
                    <div class="table-responsive">
                      <?php $cashout = getWithdrawal($_REQUEST['id']); ?>
                      <table class="table table-lg table-striped mb-0">
                        <thead>
                          <tr>
                            <th>Account Name</th>
                            <th>Amount</th>
                            <th>Bank Name</th>
                            <th>Account Number</th>
                            <th>Status</th>
                            <th>Remark</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td><?= $cashout['acc_name']; ?></td>
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
                            <td><?= $cashout['remark']; ?></td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                    <div class="card-body">
                      <?php if ($cashout['status'] == '0') : ?>
                        <form action="" method="post" class="form form-horizontal">
                          <div class="form-body">
                            <div class="row">
                              <div class="col-md-4">
                                <label>Status</label>
                              </div>
                              <div class="col-md-8 form-group">
                                <select class="form-select" name="newStatus">
                                  <option selected disabled>Select New Status</option>
                                  <option value="1">Failed</option>
                                  <option value="2">Successful</option>
                                </select>
                              </div>
                              <div class="col-md-4">
                                <label>Remark</label>
                              </div>
                              <div class="col-md-8 form-group">
                                <input type="text" id="remark" class="form-control" name="remark" placeholder="Reason for status selected">
                              </div>
                              <input type="hidden" name="type" value="<?= $cashout['type'] ?>">
                              <input type="hidden" name="amount" value="<?= $cashout['amount'] ?>">
                              <input type="hidden" name="userId" value="<?= $cashout['user_id'] ?>">
                              <div class="col-sm-12 d-flex justify-content-center">
                                <button type="submit" name="save-cashout" class="btn btn-primary me-1 mb-1">Update</button>
                                <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                              </div>
                            </div>
                          </div>
                        </form>
                      <?php else : ?>
                        <div class="alert alert-light-success color-success text-center"><i class="bi bi-check-circle"></i>
                          <span class="lead">Edited already</span>
                        </div>
                      <?php endif; ?>
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