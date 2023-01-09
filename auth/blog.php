<?php
include_once '../common.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>LexicalPay - Blog</title>

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
    <div id="main" class="layout-horizontal py-3">

      <?php if (isLoggedIn()) : ?>
        <header>
          <nav class="navbar navbar-expand navbar-light">
            <div class="container-fluid">

              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                  <li class="nav-item dropdown me-3">
                    <?php if ($_SESSION['user_info']['user_level'] == '1') : ?>
                      <a class="nav-link active btn btn-success text-light" href="create-post">
                        <i class='bi bi-shield-lock-fill bi-sub fs-4 text-light-600'></i> Create Post
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
      <?php endif; ?>

      <div class="content-wrapper container">

        <div class="page-heading">
          <h3>Our Blog</h3>
        </div>
        <div class="page-content">
          <div class="row">
            <?php $posts = getAllPosts(); ?>
            <?php if (!empty($posts)) : ?>
              <?php foreach ($posts as $post) : ?>
                <div class="col-md-6 col-sm-12">
                  <div class="card">
                    <div class="card-content">
                      <img class="card-img-top img-fluid" src="assets/images/covers/<?php echo $post['cover_image']; ?>" alt="Card image cap" style="height: 20rem">
                      <div class="card-body">
                        <h4 class="card-title"><?= $post['title']; ?></h4>
                        <p class="card-text">
                          <?= substr($post['body'], 0, 30) . '...'; ?>
                        </p>
                        <p class="card-text muted">
                          By <?= $post['author']; ?>
                        </p>
                        <div class="d-flex justify-content-end">
                          <a href="blog-single?id=<?= $post['id'] ?>" class="btn btn-primary block">Read more</a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              <?php endforeach; ?>
            <?php else : ?>
              <div class="alert alert-primary">No posts found.</div>
            <?php endif; ?>
          </div>
        </div>
      </div>
      <script src="assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
      <script src="assets/js/bootstrap.min.js"></script>
      <script src="assets/js/pages/dashboard.js"></script>

      <script src="assets/js/mazer.js"></script>
</body>

</html>