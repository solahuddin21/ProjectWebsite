<?php
  include 'cek_cookie.php';

  if (isset($_SESSION['username']) and isset($_SESSION['status'])) {
    header('location: index.php');
    exit;
  }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous" />
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@100;300;400;700&display=swap" rel="stylesheet">
    <title>Login</title>
    <style>
      * {
        padding: 0;
        margin: 0;
        box-sizing: border-box;
      }
      .container {
        position: absolute;
        top: 50%;
        left: 50%;
        -moz-transform: translateX(-50%) translateY(-50%);
        -webkit-transform: translateX(-50%) translateY(-50%);
        transform: translateX(-50%) translateY(-50%);
      }
      body {
        font-family: 'Work Sans', sans-serif;
        background: rgb(252, 252, 252);
      }
      .row {
        background: white;
        border-radius: 30px;
        box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
      }
      img {
        border-top-left-radius: 30px;
        border-bottom-left-radius: 30px;
      }
      .button-1:hover {
        background: white;
        border: 1px solid;
        color: black;
      }
    </style>
    <!-- JQuery -->
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <script>
      window.setTimeout(function () {
        $('.alert')
          .fadeTo(500, 0)
          .slideUp(500, function () {
            $(this).remove();
          });
      }, 3500);
    </script>
  </head>
  <body>
    <section class="container mx-auto">
      <div class="row g-0">
        <div class="col-lg-5">
          <img src="img/Logo_PSM.png" alt="" class="img-fluid mx-auto d-block" style="width: 65%;" />
        </div>
        <div class="col-lg-7 px-5 pt-3">
          <h1 class="mb-1 fw-bold">Login Admin</h1>
          <h4 class="mb-4">Masuk sebagai admin</h4>
          <form action="proses_login_admin.php" method="POST">
            <div class="form-floating col-lg-11">
              <input type="text" class="form-control my-4" name="username" id="username_input" placeholder="username" required />
              <label for="username_input">Username</label>
            </div>
            <div class="form-floating col-lg-11">
              <input type="password" class="form-control my-4" name="password" id="password_input" placeholder="password" required />
              <label for="password_input">Password</label>
            </div>
            <div class="col-lg-11 mb-3">
              <input class="form-check-input" type="checkbox" value="remember-me" id="remember" name="remember">
              <label class="form-check-label" for="remember">Ingat Saya</label>
            </div>
            <div class="form-floating col-lg-11 d-grid">
              <button type="submit" class="button-1 btn btn-dark btn-lg my-1" name="login">Login</button>
            </div>
              <?php if (isset($_SESSION['login']) and $_SESSION['login'] == "gagal") : ?>
                <div class="alert alert-danger alert-dismissible fade show mt-2 col-lg-11" role="alert" id="alert_password_salah">
                  <strong>Login Gagal.</strong> Username atau Password Salah
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php unset($_SESSION['login']) ?>
              <?php elseif (isset($_SESSION['logout']) and $_SESSION['logout'] == "berhasil") : ?>
                <div class="alert alert-success alert-dismissible fade show mt-2 col-lg-11" role="alert">
                  <strong>Logout Berhasil.</strong> Sampai Jumpa
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php unset($_SESSION['logout']) ?>
              <?php endif; ?>
          </form>
        </div>
      </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
  </body>
</html>