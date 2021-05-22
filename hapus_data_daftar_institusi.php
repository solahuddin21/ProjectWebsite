<?php
  include 'functions.php';
  session_start();

  $id = $_GET['id'];

  if (hapus_institusi($id) > 0) {
    $_SESSION['hapusdata'] = 'sukses';
    header('location:data_pendaftar_institusi.php');
  } else {
    $_SESSION['hapusdata'] = 'gagal';
    header('location:data_pendaftar_institusi.php');
  }
?>