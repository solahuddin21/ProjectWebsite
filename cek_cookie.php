<?php
  include 'functions.php';

  session_start();

  if (isset($_COOKIE['id']) and isset($_COOKIE['username']) and isset($_COOKIE['password'])) {
    $id = $_COOKIE['id'];
    $username = $_COOKIE['username'];
    $password = $_COOKIE['password'];

    $query = mysqli_query($koneksi, "SELECT username, password FROM admin WHERE id = $id");

    $row = mysqli_fetch_assoc($query);

    if($username === hash('sha256', $row['username']) and $password === hash('sha256', $row['password'])) {
      $_SESSION['username'] = $row['username'];
      $_SESSION['status'] = "login";
    }
  }
?>