<?php
  include 'functions.php';
  session_start();

  $id = $_GET['id'];

  if (hapus($id) > 0) {
    $_SESSION['hapusdata'] = 'sukses';
    header('location:data_pendaftar_individu.php');
  } else {
    $_SESSION['hapusdata'] = 'gagal';
    header('location:data_pendaftar_individu.php');
  }
?>