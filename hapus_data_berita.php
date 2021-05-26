<?php
  include 'functions.php';
  session_start();

  $id = $_GET['id'];

  if (hapus_data_berita($id) > 0) {
    $_SESSION['hapusdata'] = 'sukses';
    header('location:data_berita.php');
  } else {
    $_SESSION['hapusdata'] = 'gagal';
    header('location:data_berita.php');
  }
?>