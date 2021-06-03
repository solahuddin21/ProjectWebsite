<?php
include 'cek_cookie.php';

if (empty($_SESSION['username']) and empty($_SESSION['status'])) {
  header('location:forbidden.php');
  exit;
}

$id = $_GET['id'];
$pendaftar_institusi = query("SELECT * FROM daftar_institusi WHERE id = $id")[0];

if (isset($_POST['submit'])) {
  if (ubah_data_pendaftar_institusi($_POST) > 0) {
    $_SESSION['ubahdata'] = 'sukses';
    header('location:data_pendaftar_institusi.php');
  } else {
    echo "
      <div class='container alert alert-danger alert-dismissible fade show mt-5' role='alert'>
      <strong>Gagal!</strong> Masukkan data dengan benar.
      <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
      </div>
    ";
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous" />

  <!-- Google Font -->
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Nunito&display=swap" rel="stylesheet">

  <!-- Page Icon -->
  <link rel="icon" href="img/Logo_PSM.png">

  <!-- Font Awesome -->
  <script src="https://kit.fontawesome.com/2b372b5a26.js" crossorigin="anonymous"></script>

  <!-- We CSS -->
  <link rel="stylesheet" href="style.css" />

  <title>Prisai Sakti Mataram</title>
</head>

<body>
  <!-- Navbar  -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm sticky-top">
    <div class="container">
      <a class="navbar-brand" href="index.php">
        <img src="img/Logo_PSM.png" alt="" width="30" height="39" />
        Prisai Sakti Mataram
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="index.php">Beranda</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="profil.php">Profil</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="informasi.php">Informasi</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="cabang_locator.php">Cabang</a>
          </li>
          <li class="nav-item ps-2">
            <a href="index.php#gabung"><button class="btn btn-outline-warning" type="submit">Gabung</button></a>
          </li>
          <?php if (isset($_SESSION['username']) and isset($_SESSION['status'])) : ?>
            <li class="nav-item">
              <a href="dashboard_admin.php"><button class="btn btn-outline-danger ms-2" type="submit">Admin</button></a>
            </li>
          <?php endif; ?>
        </ul>
      </div>
    </div>
  </nav>
  <!-- Akhir Navbar  -->

  <!-- Form Pendaftaran Institusi -->
  <section class="individu m-5">
    <div class="container">
      <h2 class="text-center pt-5 fw-bold">Form Pendaftaran Institusi</h2>
      <form action="" method="POST">
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label" hidden>ID</label>
          <input type="hidden" name="id" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?= $pendaftar_institusi['id'] ?>" required>
        </div>
        <div class="mb-3 pt-4">
          <label for="exampleInputEmail1" class="form-label">Nama Institusi</label>
          <input type="text" name="nama" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?= $pendaftar_institusi['nama'] ?>" required>
        </div>
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Jumlah Orang Yang Akan Mendaftar</label>
          <input type="text" name="jumlah" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?= $pendaftar_institusi['jumlah'] ?>" required>
        </div>
        <div class="mb-3">
          <label for="exampleFormControlTextarea1" class="form-label">Alamat Institusi</label>
          <textarea name="alamat" class="form-control" id="exampleFormControlTextarea1" rows="3"><?= $pendaftar_institusi['alamat'] ?></textarea>
        </div>
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">No. Telepon / Handphone</label>
          <input type="text" name="no_telp" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?= $pendaftar_institusi['no_telp'] ?>" required>
        </div>
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Pilihan Cabang</label>
          <select name="cabang" class="form-select" aria-label="Default select example">
            <option hidden>Silahkan Pilih Cabang</option>
            <option value="Jakarta" <?php if ($pendaftar_institusi['cabang'] == 'Jakarta') echo 'selected="Jakarta"' ?>>Jakarta</option>
            <option value="Makassar" <?php if ($pendaftar_institusi['cabang'] == 'Makassar') echo 'selected="Makassar"' ?>>Makassar</option>
            <option value="Medan" <?php if ($pendaftar_institusi['cabang'] == 'Medan') echo 'selected="Medan"' ?>>Medan</option>
          </select>
        </div>
        <button type="submit" name="submit" class="btn btn-warning mb-5">Submit</button>
      </form>
    </div>
  </section>
  </div>
  <!-- Akhir Form Pendaftaran Institusi -->

  <!-- Footer -->
  <footer>
    <div class="main-content">
      <div class="left box">
        <h2>Tentang Kami</h2>
        <div class="content">
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus quaerat nulla at doloribus
            minus possimus
            ullam suscipit omnis laudantium cupiditate!</p>
          <div class="social">
            <a href="#"><span style="color: red;" class="fab fa-facebook-f"></span></a>
            <a href="#"><span style="color: red;" class="fab fa-twitter"></span></a>
            <a href="#"><span style="color: red;" class="fab fa-instagram"></span></a>
            <a href="#"><span style="color: red;" class="fab fa-whatsapp"></span></a>
          </div>
        </div>
      </div>
      <div class="center box">
        <h2>Address</h2>
        <div class="content">
          <div class="place">
            <span style="color: red;" class="fas fa-map-marker-alt"></span>
            <span class="text">Jakarta, Indonesia</span>
          </div>
          <div class="phone">
            <span style="color: red;" class="fas fa-phone-alt"></span>
            <span class="text">0822292929</span>
          </div>
          <div class="place">
            <span style="color: red;" class="fas fa-envelope"></span>
            <span class="text">abs@mail.com</span>
          </div>
        </div>
      </div>
      <div class="right box">
        <h2>Contact us </h2>
        <div class="content">
          <form action="#">
            <div class="email">
              <div class="text">Email <span class="text-danger">*</span></div>
              <input class="text-white" type="email" required>
            </div>
            <div class="msg">
              <div class="text">Message <span class="text-danger">*</span></div>
              <textarea class="text-white" rows="2" cols="25" required></textarea>
            </div>
            <div class="btn">
              <button class="btn btn-danger text-center" type="submit">Send</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <div class="bottom">
      <center>
        <span class="credit">Created By <a href="#">Kelompok 8</a> | Prisai Sakti Mataram</span>
        <span class="far fa-copyright"></span><span>2021 All Right Reserved</span>
      </center>
    </div>
  </footer>
  <!-- Akhir dari Footer -->

  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
</body>

</html>