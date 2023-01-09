<?php
include_once '../common.php';

if (isset($_POST['delete-post']) && isLoggedIn() && $_SESSION['user_info']['user_level'] == '1') {
  $pdo = getDatabaseConnection();

  $id = $_POST['delete_id'];

  $sql = 'DELETE FROM posts WHERE id = :id';
  $stmt = $pdo->prepare($sql);
  $stmt->execute(['id' => $id]);
  $post = getSinglePost($id);
  unlink('../auth/assets/images/covers/' . $post['cover_image']);

  Header('Location: blog.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<?php $post = getSinglePost($_GET['id']); ?>

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>LexicalPay - Blog</title>

  <meta property="og:image" content="https://www.lexicalpay.com/auth/assets/images/covers/<?php echo $post['cover_image']; ?>">

  <meta property="twitter:image" content="https://www.lexicalpay.com/auth/assets/images/covers/<?php echo $post['cover_image']; ?>">

  <link rel="preconnect" href="https://fonts.gstatic.com" />
  <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="assets/css/bootstrap.css" />

  <link rel="stylesheet" href="assets/vendors/iconly/bold.css" />

  <link rel="stylesheet" href="assets/vendors/perfect-scrollbar/perfect-scrollbar.css" />
  <link rel="stylesheet" href="assets/vendors/bootstrap-icons/bootstrap-icons.css" />
  <link rel="stylesheet" href="assets/css/app.css" />
  <link rel="shortcut icon" href="../../favicon.ico" type="image/x-icon" />

  <style>
    .modal {
      position: fixed;
      width: 100vw;
      height: 100vh;
      opacity: 0;
      visibility: hidden;
      transition: all 0.3s ease;
      top: 0;
      left: 0;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .modal.open {
      visibility: visible;
      opacity: 1;
      transition-delay: 0s;
    }

    .modal-bg {
      position: absolute;
      background: rgba(235, 243, 255, 0.473);
      width: 100%;
      height: 100%;
    }

    .modal-container {
      border-radius: 10px;
      background: #fff;
      position: relative;
      padding: 30px;
    }

    .modal-close {
      position: absolute;
      right: 15px;
      top: 15px;
      outline: none;
      appearance: none;
      color: red;
      background: none;
      border: 0px;
      font-weight: bold;
      cursor: pointer;
    }
  </style>
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
          <a href="blog" class="btn btn-primary">Back</a>
        </div>
        <div class="page-content">
          <div class="row">
            <?php if (!empty($post)) : ?>
              <div class="col-md-12 col-sm-6">
                <div class="card">
                  <div class="card-content">
                    <img class="card-img-top img-fluid" src="assets/images/covers/<?php echo $post['cover_image']; ?>" alt="Card image cap" style="height: 20rem">
                    <div class="card-body text-center">
                      <h2><?= $post['title']; ?></h2>
                      <p class="card-text muted">
                        <b>Created on</b> <?= date('D jS \of M', strtotime($post['created_at'])); ?> <b>By</b> <?= $post['author']; ?>
                      </p>
                      <p class="card-text">
                        <?= $post['body']; ?>
                      </p>
                    </div>
                    <?php if (isLoggedIn()) : ?>
                      <div class="col-sm-12 d-flex justify-content-center pb-3">
                        <form action="" method="POST" class="d-none" id="sharePostForm">
                          <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_info']['id']; ?>">
                          <input type="hidden" name="user_mail" value="<?php echo $_SESSION['user_info']['email']; ?>">
                        </form>
                        <a class="btn btn-primary" data-modal="modal-one"><i class="bi bi-share"></i> Share this post</a>

                        <div class="modal" id="modal-one">
                          <div class="modal-bg modal-exit"></div>
                          <div class="modal-container">
                            <div class="share-btn" data-url="https://www.lexicalpay.com/auth/blog-single?id=<?= $post['id'] ?>" data-title="<?= $post['title']; ?>" data-desc="<?= substr($post['body'], 0, 15) . '...'; ?>">
                              <a class="btn btn-primary rounded-pill" data-id="fb"><i class="bi bi-facebook"></i> Facebook</a>
                              <a class="btn btn-primary rounded-pill" data-id="tw"><i class="bi bi-twitter"></i> Twitter</a>
                              <a class="btn btn-primary rounded-pill" data-id="tg"><i class="bi bi-telegram"></i> Telegram</a>
                              <a class="btn btn-success rounded-pill" data-id="wa"><i class="bi bi-whatsapp"></i> WhatsApp</a>
                            </div>
                            <button class="modal-close modal-exit">X</button>
                          </div>
                        </div>
                      </div>
                    <?php endif; ?>
                  </div>
                </div>
              </div>
              <?php if (isLoggedIn() && $_SESSION['user_info']['user_level'] == '1') : ?>
                <div class="col-sm-12 d-flex justify-content-center">
                  <form action="" class="me-2" method="POST">
                    <input type="hidden" name="delete_id" value="<?= $post['id'] ?>">
                    <input type="submit" name="delete-post" value="Delete" class="btn btn-danger">
                  </form>
                  <a href="edit-post?id=<?= $post['id'] ?>" class="btn btn-primary">Edit</a>
                </div>
              <?php endif; ?>
            <?php else : ?>
              <div class="alert alert-primary">No post found.</div>
            <?php endif; ?>
          </div>
        </div>
      </div>
      <script src="assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
      <script src="assets/js/bootstrap.min.js"></script>

      <script src="assets/js/pages/dashboard.js"></script>

      <script src="assets/js/mazer.js"></script>
      <script src="//cdn.jsdelivr.net/npm/share-buttons/dist/share-buttons.js"></script>
      <script>
        document.addEventListener("DOMContentLoaded", function(event) {
          const modals = document.querySelectorAll("[data-modal]");

          modals.forEach(function(trigger) {
            trigger.addEventListener("click", function(event) {
              event.preventDefault();

              let formData = new FormData(document.getElementById('sharePostForm'));

              fetch('../inc/process_shares.php', {
                method: 'POST',
                body: formData,
                headers: {
                  'X-Requested-With': 'XMLHttpRequest'
                },
              }).then((data) => {
                console.log(data.status);
              });

              const modal = document.getElementById(trigger.dataset.modal);
              modal.classList.add("open");
              const exits = modal.querySelectorAll(".modal-exit");
              exits.forEach(function(exit) {
                exit.addEventListener("click", function(event) {
                  event.preventDefault();
                  modal.classList.remove("open");
                });
              });
            });
          });
        });
      </script>
</body>

</html>