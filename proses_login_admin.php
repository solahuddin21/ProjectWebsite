<?php
  include 'functions.php';

  session_start();
  
  if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = mysqli_query($koneksi, "SELECT * FROM admin WHERE BINARY username = '$username' AND password = '$password'");

    $jum_data = mysqli_num_rows($query);

    if ($jum_data > 0) {
      $row = mysqli_fetch_assoc($query);

      $_SESSION['username'] = $row['username'];
      $_SESSION['status'] = "login";

      if (isset($_POST['remember'])) {
        setcookie('id', $row['id'], time()+3600);
        setcookie('username', hash('sha256', $row['username']), time()+3600);
        setcookie('password', hash('sha256', $row['password']), time()+3600);
      }

      header("location:dashboard_admin.php");
      exit;
    } else {
      $_SESSION['login'] = "gagal";
      header("location:login_admin.php");
      exit;
    }
  }
?>