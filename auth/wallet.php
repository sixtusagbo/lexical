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
  <link rel="stylesheet" href="../pages/assets/vendor/fontawesome.css" />
  <link rel="shortcut icon" href="../../favicon.ico" type="image/x-icon" />
  <style>
    .error {
      display: block;
      font-size: 18px;
      color: #fff;
      text-align: center;
      width: 100%;
      font-weight: 500;
      border-radius: 6px;
      background-color: #ff0000ac;
      margin-bottom: 3px;
      padding: 2px;
      font-weight: 600;
    }
  </style>
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
            <li class="sidebar-item">
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

            <li class="sidebar-item active">
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
        <h3>Wallet</h3>
      </div>
      <div class="page-content">
        <section class="row">
          <div class="col-12">
            <div class="row">
              <div class="col-6 col-md-6">
                <div class="card">
                  <div class="card-body px-3 py-4-5">
                    <div class="row">
                      <div class="col-md-4">
                        <div class="stats-icon purple">
                          <i class="iconly-boldWallet"></i>
                        </div>
                      </div>
                      <div class="col-md-8">
                        <h6 class="text-muted font-semibold">Balance</h6>
                        <h6 class="font-extrabold mb-0">&#8358;<?php echo number_format((float)$_SESSION['user_info']['total_earnings'], 2, '.', '') ?></h6>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-6 col-md-6" id="initCashOut">
                <a href="#" class="btn btn-success" style="
                      width: 100% !important;
                      height: 80% !important;
                      font-size: 30px;
                      font-weight: 900;
                    ">
                  <i class="fas fa-money-bill-wave"></i><br />
                  Cash Out
                </a>
              </div>
            </div>

            <?php $isCashOutDay = isWithdrawalDay('../config/icanseeunow/cashout_day.txt'); ?>
            <?php $isReferralCashOutDay = isWithdrawalDay('../config/icanseeunow/referral_cashout_day.txt'); ?>

            <?php if ($isCashOutDay) { ?>
              <?php if ($isReferralCashOutDay) {
                if ($_SESSION['user_info']['referrals'] >= 1) { ?>
                  <!-- referral cashout time -->
                  <div class="row" id="cashOutSection">
                    <div class="col-12">
                      <div class="card">
                        <div class="card-content">
                          <div class="card-body px-5">
                            <div id="error" class="error"></div>
                            <div class="alert alert-primary alert-dismissible show fade">
                              <h4 class="alert-heading">Important!</h4>
                              <p>Account name must match your full name - <b>John Ducky</b></p>
                              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                            <form method="post" class="form" id="cashOutForm">
                              <input type="hidden" name="withdrawalType" value="referrals">
                              <div class="row">
                                <div class="col-md-6 col-12">
                                  <div class="form-group">
                                    <label for="dateInputElement">Date</label>
                                    <input type="date" id="dateInputElement" class="form-control" name="date" readonly>
                                  </div>
                                </div>
                                <div class="col-md-6 col-12">
                                  <label for="amount">Amount</label>
                                  <div class="input-group">
                                    <div class="input-group-prepend">
                                      <div class="input-group-text">&#8358;</div>
                                    </div>
                                    <input type="number" id="amount" class="form-control" placeholder="Amount" name="amount" min="1000" value="1000" />
                                  </div>
                                </div>
                                <div class="col-md-6 col-12">
                                  <div class="form-group">
                                    <label for="bankName">Bank</label>
                                    <select class="form-control" id="bankName" name="bankName">
                                      <option selected disabled>Choose Bank</option>
                                      <option value="Kuda Bank">Kuda Bank</option>
                                      <option value="Access Bank">Access Bank</option>
                                      <option value="Citibank">Citibank</option>
                                      <option value="Eco Bank">Ecobank</option>
                                      <option value="FCMB">First City Monument Bank (FCMB)</option>
                                      <option value="Fidelity Bank">Fidelity Bank</option>
                                      <option value="First Bank">First Bank</option>
                                      <option value="GTB">Guaranty Trust Bank (GTB)</option>
                                      <option value="Heritage">Heritage Bank</option>
                                      <option value="Jaiz Bank">Jaiz Bank</option>
                                      <option value="Keystone Bank">Keystone Bank</option>
                                      <option value="Parallex Bank">Parallex Bank</option>
                                      <option value="Providus">Providus Bank</option>
                                      <option value="Stanbic IBTC">Stanbic IBTC Bank</option>
                                      <option value="Skye Bank">Skye Bank</option>
                                      <option value="Standard Chartered Bank">Standard Chartered Bank</option>
                                      <option value="Sterling">Sterling Bank</option>
                                      <option value="Suntrust">Suntrust Bank</option>
                                      <option value="Titan Trust"> Titan Trust Bank</option>
                                      <option value="Union Bank">Union Bank</option>
                                      <option value="UBA">United Bank for Africa (UBA)</option>
                                      <option value="Unity Bank">Unity Bank</option>
                                      <option value="Wema Bank">Wema Bank</option>
                                      <option value="Zenith Bank">Zenith Bank</option>
                                    </select>
                                  </div>
                                </div>
                                <div class="col-md-6 col-12">
                                  <div class="form-group">
                                    <label for="accountNumber">Account Number</label>
                                    <input type="text" id="accountNumber" class="form-control" name="accountNumber" maxlength="10" placeholder="10-Digit Account Number" />
                                  </div>
                                </div>
                                <div class="col-12 d-flex justify-content-center">
                                  <button type="submit" class="btn btn-primary me-3 mb-1" id="cashOutButton">
                                    Withdraw
                                  </button>
                                  <button type="reset" class="btn btn-light-secondary me-1 mb-1">
                                    Reset
                                  </button>
                                </div>
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                <?php } else { ?>
                  <!-- Not eligible to cash out -->
                  <div class="row" id="cashOutSection">
                    <div class="col-12">
                      <div class="card">
                        <div class="card-body">
                          <div class="alert alert-danger">
                            <h4 class="alert-heading">NO REFFERALS TO WITHDRAW</h4>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                <?php }
              } else { ?>
                <!-- Normal cash out time -->
                <div class="row" id="cashOutSection">
                  <div class="col-12">
                    <div class="card">
                      <div class="card-content">
                        <div class="card-body px-5">
                          <div id="error" class="error"></div>
                          <div class="alert alert-primary alert-dismissible show fade">
                            <h4 class="alert-heading">Important!</h4>
                            <p>Account name must match your full name - <b>John Ducky</b></p>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                          </div>
                          <form method="post" class="form" id="cashOutForm">
                            <input type="hidden" name="withdrawalType" value="earnings">
                            <div class="row">
                              <div class="col-md-6 col-12">
                                <div class="form-group">
                                  <label for="dateInputElement">Date</label>
                                  <input type="date" id="dateInputElement" class="form-control" name="date" readonly>
                                </div>
                              </div>
                              <div class="col-md-6 col-12">
                                <label for="amount">Amount</label>
                                <div class="input-group">
                                  <div class="input-group-prepend">
                                    <div class="input-group-text">&#8358;</div>
                                  </div>
                                  <input type="number" id="amount" class="form-control" placeholder="Amount" name="amount" min="1000" value="1000" />
                                </div>
                              </div>
                              <div class="col-md-6 col-12">
                                <div class="form-group">
                                  <label for="bankName">Bank</label>
                                  <select class="form-control" id="bankName" name="bankName">
                                    <option selected disabled>Choose Bank</option>
                                    <option value="Kuda Bank">Kuda Bank</option>
                                    <option value="Access Bank">Access Bank</option>
                                    <option value="Citibank">Citibank</option>
                                    <option value="Eco Bank">Ecobank</option>
                                    <option value="FCMB">First City Monument Bank (FCMB)</option>
                                    <option value="Fidelity Bank">Fidelity Bank</option>
                                    <option value="First Bank">First Bank</option>
                                    <option value="GTB">Guaranty Trust Bank (GTB)</option>
                                    <option value="Heritage">Heritage Bank</option>
                                    <option value="Jaiz Bank">Jaiz Bank</option>
                                    <option value="Keystone Bank">Keystone Bank</option>
                                    <option value="Parallex Bank">Parallex Bank</option>
                                    <option value="Providus">Providus Bank</option>
                                    <option value="Stanbic IBTC">Stanbic IBTC Bank</option>
                                    <option value="Skye Bank">Skye Bank</option>
                                    <option value="Standard Chartered Bank">Standard Chartered Bank</option>
                                    <option value="Sterling">Sterling Bank</option>
                                    <option value="Suntrust">Suntrust Bank</option>
                                    <option value="Titan Trust"> Titan Trust Bank</option>
                                    <option value="Union Bank">Union Bank</option>
                                    <option value="UBA">United Bank for Africa (UBA)</option>
                                    <option value="Unity Bank">Unity Bank</option>
                                    <option value="Wema Bank">Wema Bank</option>
                                    <option value="Zenith Bank">Zenith Bank</option>
                                  </select>
                                </div>
                              </div>
                              <div class="col-md-6 col-12">
                                <div class="form-group">
                                  <label for="accountNumber">Account Number</label>
                                  <input type="text" id="accountNumber" class="form-control" name="accountNumber" maxlength="10" placeholder="10-Digit Account Number" />
                                </div>
                              </div>
                              <div class="col-12 d-flex justify-content-center">
                                <button type="submit" class="btn btn-primary me-3 mb-1" id="cashOutButton">
                                  Withdraw
                                </button>
                                <button type="reset" class="btn btn-light-secondary me-1 mb-1">
                                  Reset
                                </button>
                              </div>
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              <?php } ?>
            <?php } else { ?>
              <!-- Not cash out time -->
              <div class="row" id="cashOutSection">
                <div class="col-12">
                  <div class="card">
                    <div class="card-body">
                      <div class="alert alert-danger">
                        <h4 class="alert-heading">WITHDRAWAL NOT AVAILABLE</h4>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            <?php } ?>

            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-content">
                    <div class="card-body">
                      <h4 class="card-title">Cash Outs</h4>
                      <div class="table-responsive">
                        <?php $cashouts = getUserWithdrawals($_SESSION['user_info']['id']); ?>
                        <table class="table table-lg table-striped">
                          <thead>
                            <tr>
                              <th>Date</th>
                              <th>Amount</th>
                              <th>Bank Name</th>
                              <th>Account Number</th>
                              <th>Status</th>
                              <th>Remark</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php foreach ($cashouts as $cashout) : ?>
                              <tr>
                                <td><?= date('D jS M', strtotime($cashout['date'])); ?></td>
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
                            <?php endforeach; ?>
                          </tbody>
                        </table>
                      </div>
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
  <script src="../pages/assets/vendor/fontawesome.js"></script>

  <script src="assets/vendors/apexcharts/apexcharts.js"></script>
  <script src="../pages/assets/vendor/jquery.js"></script>
  <script src="assets/js/pages/wallet.js"></script>

  <script src="assets/js/mazer.js"></script>
</body>

</html>