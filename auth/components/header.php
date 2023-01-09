<header class="mb-3">
  <nav class="navbar navbar-expand navbar-light">
    <div class="container-fluid">
      <a href="#" class="burger-btn d-block d-xl-none">
        <i class="bi bi-justify fs-3"></i>
      </a>

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
          <li class="nav-item dropdown me-3">
            <?php if ($_SESSION['user_info']['user_level'] == '1') : ?>
              <a class="nav-link active btn btn-dark text-light" href="cashouts">
                <i class='bi bi-shield-lock-fill bi-sub fs-4 text-light-600'></i> CPanel
              </a>
            <?php endif; ?>
          </li>
        </ul>
        <div class="dropdown">
          <a href="#" data-bs-toggle="dropdown" aria-expanded="false">
            <div class="user-menu d-flex">
              <div class="user-name text-end me-3">
                <h6 class="mb-0 text-gray-600"><?php echo $_SESSION['user_info']['full_name'] ?></h6>
                <p class="mb-0 text-sm text-gray-600">
                  <?php
                  if ($_SESSION['user_info']['user_level'] == 0) {
                    echo 'Earner';
                  } elseif ($_SESSION['user_info']['user_level'] == 1) {
                    echo 'Administrator';
                  }
                  ?>
                </p>
              </div>
              <div class="user-img d-flex align-items-center">
                <div class="avatar avatar-md">
                  <?php if (empty($_SESSION['user_info']['profile_image'])) : ?>
                    <img src="assets/images/faces/noPhoto.png" />
                  <?php endif; ?>
                  <?php if (!empty($_SESSION['user_info']['profile_image'])) : ?>
                    <img src="assets/images/faces/<?php echo $_SESSION['user_info']['profile_image']; ?>" />
                  <?php endif; ?>
                </div>
              </div>
            </div>
          </a>
          <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton" style="min-width: 11rem">
            <li>
              <h6 class="dropdown-header">Hello, <?php echo $_SESSION['user_info']['first_name'] ?>!</h6>
            </li>
            <li>
              <a class="dropdown-item" href="profile"><i class="icon-mid bi bi-person me-2"></i> My Profile</a>
            </li>
            <li>
              <a class="dropdown-item" href="wallet"><i class="icon-mid bi bi-wallet me-2"></i> Wallet</a>
            </li>
            <li>
              <hr class="dropdown-divider" />
            </li>
            <li>
              <div class="d-flex justify-content-center">
                <form action="../../inc/process_signout.php" class="form-inline">
                  <button type="submit" class="btn btn-primary">
                    <i class="icon-mid bi bi-box-arrow-left me-2"></i> Logout
                  </button>
                </form>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </nav>
</header>