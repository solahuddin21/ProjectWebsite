<?php
  // Include seluruh function pada functions.php
  include 'functions.php';

  // Jalankan session
  session_start();

  // Kondisi jika terdapat cookie id, username, dan password
  if (isset($_COOKIE['id']) and isset($_COOKIE['username']) and isset($_COOKIE['password'])) {
    // Definisikan setiap cookie ke dalam variabel
    $id = $_COOKIE['id'];
    $username = $_COOKIE['username'];
    $password = $_COOKIE['password'];

    // Lakukan query ke database berdasarkan cookie id yang ada
    $query = mysqli_query($koneksi, "SELECT username, password FROM admin WHERE id = $id");

    // Fetch hasil dengan array asosiatif
    $row = mysqli_fetch_assoc($query);

    // Kondisi jika hasil hash username dan password dari DB sama dengan yang tersimpan pada browser
    if($username === hash('sha256', $row['username']) and $password === hash('sha256', $row['password'])) {
      // Set session baru sebagai penanda login
      $_SESSION['username'] = $row['username'];
      $_SESSION['status'] = "login";
    }
  }
?>