<?php
  session_start();

  $_SESSION = [];

  session_unset();

  session_destroy();

  setcookie('id', '', time()-3600);
  setcookie('username', '', time()-3600);
  setcookie('password', '', time()-3600);

  session_start();

  $_SESSION['logout'] = "berhasil";

  header("location:login_admin.php");
  exit;
?>