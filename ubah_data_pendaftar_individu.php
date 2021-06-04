<?php
include 'cek_cookie.php';

if (empty($_SESSION['username']) and empty($_SESSION['status'])) {
  header('location:forbidden.php');
  exit;
}

$id = $_GET['id'];
$pendaftar_individu = query("SELECT * FROM daftar_individu WHERE id = $id")[0];
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
  <link rel="stylesheet" href="styles.css" />

  <!-- Jquery -->
  <link href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js" integrity="sha256-T0Vest3yCU7pafRw9r+settMBX6JkKN06dqBnpQ8d30=" crossorigin="anonymous"></script>
  <script type="text/javascript">
    $(function() {
      $("#datepicker").datepicker({
        dateFormat: "dd-mm-yy",
        yearRange: '1980:2021',
        changeMonth: true,
        changeYear: true
      });
    });
  </script>

  <title>Prisai Sakti Mataram</title>
</head>

<body class="sb-nav-fixed">
  <nav class="sb-topnav navbar navbar-expand navbar-dark bg-danger">
    <!-- Navbar Brand-->
    <!-- <a class="navbar-brand ps-3" href="index.html">Perisai Sakti Mataram</a> -->
    <a class="navbar-brand ps-2" href="#">
      <img src="img/Logo_PSM.png" alt="" width="20" height="29" />
      Prisai Sakti Mataram
    </a>
    <!-- Sidebar Toggle-->
    <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
    <!-- Navbar Search-->
    <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
      <div class="input-group" hidden>
        <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
        <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
      </div>
    </form>
    <!-- Navbar-->
    <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
          <li><a class="dropdown-item" href="logout_admin.php">Logout</a></li>
        </ul>
      </li>
    </ul>
  </nav>

  <!-- Navbar  Kanan-->
  <div id="layoutSidenav">
    <div id="layoutSidenav_nav">
      <nav class="sb-sidenav accordion sb-sidenav-dark bg-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
          <div class="nav">
            <div class="sb-sidenav-menu-heading">Halaman</div>
            <a class="nav-link" href="dashboard_admin.php">
              <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
              Dashboard
            </a>
            <a class="nav-link" href="index.php">
              <div class="sb-nav-link-icon"><i class="fas fa-home"></i></div>
              Website
            </a>
            <div class="sb-sidenav-menu-heading">Menu</div>

            <a class="nav-link collapsed active" href="#" data-bs-toggle="collapse" data-bs-target="#collapseIndividu" aria-expanded="false" aria-controls="collapseIndividu">
              <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
              Data Individu
              <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>
            <div class="collapse" id="collapseIndividu" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
              <nav class="sb-sidenav-menu-nested nav">
                <a class="nav-link" href="#">List Daftar Individu</a>
                <a class="nav-link" href="log_daftar_individu.php">Log Daftar Individu</a>
                <a class="nav-link" href="data_peringkat_cabang_individu.php">Peringkat Cabang Individu</a>
              </nav>
            </div>

            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseInstitusi" aria-expanded="false" aria-controls="collapseInstitusi">
              <div class="sb-nav-link-icon"><i class="fas fa-university"></i></div>
              Data Institusi
              <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>
            <div class="collapse" id="collapseInstitusi" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
              <nav class="sb-sidenav-menu-nested nav">
                <a class="nav-link" href="data_pendaftar_institusi.php">List Daftar Institusi</a>
                <a class="nav-link" href="log_daftar_institusi.php">Log Daftar Institusi</a>
                <a class="nav-link" href="data_peringkat_cabang_institusi.php">Peringkat Cabang Institusi</a>
              </nav>
            </div>

            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseBerita" aria-expanded="false" aria-controls="collapseBerita">
              <div class="sb-nav-link-icon"><i class="fas fa-newspaper"></i></div>
              Data Berita
              <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>
            <div class="collapse" id="collapseBerita" aria-labelledby="headingThree" data-bs-parent="#sidenavAccordion">
              <nav class="sb-sidenav-menu-nested nav">
                <a class="nav-link" href="data_berita.php">Kelola Daftar Berita</a>
              </nav>
            </div>


            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
              <div class="sb-nav-link-icon"><i class="fas fa-user-circle"></i></div>
              Data Admin
              <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>
            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
              <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                <a class="nav-link" href="menu_data_admin.php">Detail</a>
            </div>
            <a class="nav-link" href="logout_admin.php">
              <div class="sb-nav-link-icon"><i class="fas fa-sign-out-alt"></i></div>
              Logout
            </a>
          </div>
        </div>
        <div class="sb-sidenav-footer">
          <div class="small">Masuk sebagai:</div>
          <?= ucwords($_SESSION['username']) ?>
        </div>
      </nav>
    </div>
    <!-- Navbar Kiri -->
    <!-- Akhir Navbar  -->

    <div id="layoutSidenav_content">
      <main>
        <div class="container-fluid px-4">
          <section class="individu m-5">
            <div class="container">
              <?php
              if (isset($_POST['submit'])) {
                if (ubah_data_pendaftar_individu($_POST) > 0) {
                  $_SESSION['ubahdata'] = 'sukses';
                  header('location:data_pendaftar_individu.php');
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
              <h2 class="text-center pt-5 fw-bold">Ubah Data Pendaftar Individu</h2>
              <form action="" method="POST">
                <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label" hidden>ID</label>
                  <input type="hidden" name="id" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?= $pendaftar_individu['id'] ?>" required>
                </div>
                <div class="mb-3 pt-4">
                  <label for="exampleInputEmail1" class="form-label">Nama Lengkap</label>
                  <input type="text" name="nama" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?= $pendaftar_individu['nama'] ?>" required>
                </div>
                <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label">Domisili</label>
                  <input type="text" name="domisili" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?= $pendaftar_individu['domisili'] ?>" required>
                </div>
                <div class="mb-3">
                  <div class="ui-widget">
                    <label for="datepicker" class="form-label">Tanggal Lahir: </label>
                    <input type="text" id="datepicker" name="tanggal_lahir" class="form-control" aria-describedby="emailHelp" value="<?= $pendaftar_individu['tanggal_lahir'] ?>" required />
                  </div>
                </div>
                <div class="mb-3">
                  <label for="exampleFormControlTextarea1" class="form-label">Alamat</label>
                  <textarea class="form-control" name="alamat" id="exampleFormControlTextarea1" rows="3"><?= $pendaftar_individu['alamat'] ?></textarea>
                </div>
                <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label">No. KTP / NISN</label>
                  <input type="text" name="no_ktp" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?= $pendaftar_individu['no_ktp'] ?>" required>
                </div>
                <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label">No. Telepon / Handphone</label>
                  <input type="text" name="no_telp" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?= $pendaftar_individu['no_telp'] ?>" required>
                </div>
                <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label">Pilihan Cabang</label>
                  <select class="form-select" name="cabang" aria-label="Default select example">
                    <option hidden>Silahkan Pilih Cabang</option>
                    <option value="Jakarta" <?php if ($pendaftar_individu['cabang'] == 'Jakarta') echo 'selected="Jakarta"' ?>>Jakarta</option>
                    <option value="Makassar" <?php if ($pendaftar_individu['cabang'] == 'Makassar') echo 'selected="Makassar"' ?>>Makassar</option>
                    <option value="Medan" <?php if ($pendaftar_individu['cabang'] == 'Medan') echo 'selected="Medan"' ?>>Medan</option>
                  </select>
                </div>
                <button type="submit" name="submit" class="btn btn-warning mb-5">Submit</button>
              </form>
            </div>
          </section>
        </div>
      </main>
    </div>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
</body>

</html>