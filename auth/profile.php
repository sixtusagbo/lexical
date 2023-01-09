<?php
include_once '../common.php';

//  redirect if logged out
if (!isLoggedIn()) {
  header('Location: ../pages/login');
}

include '../inc/process_profile.php'
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>LexicalPay - Dashboard</title>

  <link rel="shortcut icon" href="../../favicon.ico" type="image/x-icon" />

  <link rel="preconnect" href="https://fonts.gstatic.com" />
  <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="assets/css/bootstrap.css" />
  <link rel="stylesheet" href="assets/vendors/iconly/bold.css" />
  <link rel="stylesheet" href="assets/vendors/perfect-scrollbar/perfect-scrollbar.css" />
  <link rel="stylesheet" href="assets/vendors/bootstrap-icons/bootstrap-icons.css" />
  <link rel="stylesheet" href="assets/css/app.css" />
  <style>
    /* Media Queries */
    @media screen and (min-width: 800px) {

      /* desktop */
      #profileImageRow {
        margin-left: 25%;
        margin-right: 25%;
      }

    }

    @media screen and (max-width: 1000px) {
      /* mobile */

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

            <li class="sidebar-item active">
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
        <h3>My Profile</h3>
      </div>
      <div class="page-content">
        <section class="row">
          <div class="col-12">
            <div class="row">
              <div class="col-12">
                <div class="card mb-3">
                  <div class="card-header">
                    <h4 class="card-title text-center">Add profile image</h4>
                  </div>
                  <div class="card-body">
                    <div class="row justify-content-center" id="profileImageRow">
                      <?php if (!empty($msg)) : ?>
                        <div class="alert <?php echo $css_class; ?>" role="alert">
                          <?php echo $msg; ?>
                        </div>
                      <?php endif; ?>
                      <form action="" method="post" enctype="multipart/form-data">
                        <div class="form-group text-left">
                          <label for="profileImage">Profile Image</label>
                          <input type="file" name="profileImage" id="profileImage" class="form-control">
                        </div>
                        <div class="form-group">
                          <button type="submit" name="save-profile-image" class="btn btn-primary btn-block">Save Changes</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
                <div class="card mb-3">
                  <div class="card-header">
                    <h4 class="card-title text-center">Update personal details</h4>
                  </div>
                  <div class="card-body">
                    <div class="row justify-content-center" id="profileImageRow">
                      <?php if (!empty($msg2)) : ?>
                        <div class="alert <?php echo $css_class2; ?>" role="alert">
                          <?php echo $msg2; ?>
                        </div>
                      <?php endif; ?>
                      <form action="" method="POST" class="form">
                        <div class="row">
                          <div class="col-md-6 col-12">
                            <div class="form-group">
                              <label for="last-name-column">Last Name</label>
                              <input name="last_name" type="text" id="last-name-column" class="form-control" placeholder="Last Name" value="<?= $_SESSION['user_info']['last_name'] ?>">
                            </div>
                          </div>
                          <div class="col-md-6 col-12">
                            <div class="form-group">
                              <label for="first-name-column">Other Names</label>
                              <input name="first_name" type="text" id="first-name-column" class="form-control" placeholder="Other Names" value="<?= $_SESSION['user_info']['first_name'] ?>">
                            </div>
                          </div>
                          <div class="col-md-6 col-12">
                            <div class="form-group">
                              <label for="email-id-column">Email</label>
                              <input name="email" type="email" id="email-id-column" class="form-control" placeholder="Email" value="<?= $_SESSION['user_info']['email'] ?>">
                            </div>
                          </div>
                          <div class="col-md-6 col-12">
                            <div class="form-group">
                              <label for="phone-column">Phone number</label>
                              <input name="phone_number" type="number" id="phone-column" class="form-control" placeholder="Phone number" value="<?= $_SESSION['user_info']['phone_number'] ?>">
                            </div>
                          </div>
                          <div class="col-md-6 col-12">
                            <div class="form-group">
                              <label for="state">State</label>
                              <select class="form-select" id="state" name="state">
                                <option selected disabled>Choose State</option>
                                <option>ABUJA(FCT)</option>
                                <option>ABIA</option>
                                <option>ADAMAWA</option>
                                <option>AKWA IBOM</option>
                                <option>ANAMBRA</option>
                                <option>BAUCHI</option>
                                <option>BAYELSA</option>
                                <option>BENUE</option>
                                <option>BORNO</option>
                                <option>CROSS RIVER</option>
                                <option>DELTA</option>
                                <option>EBONYI</option>
                                <option>EDO</option>
                                <option>EKITI</option>
                                <option>ENUGU</option>
                                <option>GOMBE</option>
                                <option>IMO</option>
                                <option>JIGAWA</option>
                                <option>KADUNA</option>
                                <option>KANO</option>
                                <option>KATSINA</option>
                                <option>KEBBI</option>
                                <option>KOGI</option>
                                <option>KWARA</option>
                                <option>LAGOS</option>
                                <option>NASSARAWA</option>
                                <option>NIGER</option>
                                <option>OGUN</option>
                                <option>ONDO</option>
                                <option>OSUN</option>
                                <option>OYO</option>
                                <option>PLATEAU</option>
                                <option>RIVERS</option>
                                <option>SOKOTO</option>
                                <option>TARABA</option>
                                <option>YOBE</option>
                                <option>ZAMFARA</option>
                              </select>
                            </div>
                          </div>
                          <div class="col-md-6 col-12">
                            <div class="form-group">
                              <label for="country">Country</label>
                              <input type="text" id="country" class="form-control" name="country" placeholder="Country" value="Nigeria" readonly>
                            </div>
                          </div>


                          <div class="col-12 d-flex justify-content-center">
                            <button type="submit" name="save-personal-details" class="btn btn-primary btn-block">Save Changes</button>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
                <div class="card">
                  <div class="card-header">
                    <h4 class="card-title text-center">Update Password</h4>
                  </div>
                  <div class="card-body">
                    <div class="row justify-content-center" id="profileImageRow">
                      <?php if (!empty($msg3)) : ?>
                        <div class="alert <?php echo $css_class3; ?>" role="alert">
                          <?php echo $msg3; ?>
                        </div>
                      <?php endif; ?>
                      <form action="" method="post">
                        <div class="form-group position-relative has-icon-left mb-4">
                          <input name="password" type="password" class="form-control form-control-xl" placeholder="Password">
                          <div class="form-control-icon">
                            <i class="bi bi-shield-lock"></i>
                          </div>
                        </div>
                        <div class="form-group position-relative has-icon-left mb-4">
                          <input name="confirm_password" type="password" class="form-control form-control-xl" placeholder="Confirm Password">
                          <div class="form-control-icon">
                            <i class="bi bi-shield-lock"></i>
                          </div>
                        </div>
                        <div class="form-group">
                          <button type="submit" name="update-password" class="btn btn-primary btn-block">Save Changes</button>
                        </div>
                      </form>
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
  <script src="assets/js/mazer.js"></script>
</body>

</html>