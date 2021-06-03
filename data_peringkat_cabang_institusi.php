<?php
// Include file php untuk cek cookie dan seluruh function
include 'cek_cookie.php';

// Kondisi jika session login tidak ditemukan (admin belum login)
if (empty($_SESSION['username']) and empty($_SESSION['status'])) {
    // Arahkan ke forbidden.php untuk menampilkan pesan error 403
    header('location:forbidden.php');
    exit;
}

// Lakukan query data cabang, hitung total pendaftar, serta panggil fungsi dense_rank untuk mendapatkan peringkat berdasarkan pendaftar terbanyak pada DB
$array_cabang = query("SELECT cabang, SUM(jumlah) as jml_pendaftar, DENSE_RANK() OVER(ORDER BY jml_pendaftar DESC) AS peringkat FROM daftar_institusi GROUP BY cabang ORDER BY peringkat ASC");
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

    <script>
        // Animasi fadeout dan auto close untuk alert
        window.setTimeout(function() {
            $('.alert')
                .fadeTo(500, 0)
                .slideUp(500, function() {
                    $(this).remove();
                });
        }, 2500);
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

                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseIndividu" aria-expanded="false" aria-controls="collapseIndividu">
                            <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                            Data Individu
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseIndividu" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="data_pendaftar_individu.php">List Daftar Individu</a>
                                <a class="nav-link" href="log_daftar_individu.php">Log Daftar Individu</a>
                                <a class="nav-link" href="data_peringkat_cabang_individu.php">Peringkat Cabang Individu</a>
                            </nav>
                        </div>

                        <a class="nav-link collapsed active" href="#" data-bs-toggle="collapse" data-bs-target="#collapseInstitusi" aria-expanded="false" aria-controls="collapseInstitusi">
                            <div class="sb-nav-link-icon"><i class="fas fa-university"></i></div>
                            Data Institusi
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseInstitusi" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="data_pendaftar_institusi.php">List Daftar Institusi</a>
                                <a class="nav-link" href="log_daftar_institusi.php">Log Daftar Institusi</a>
                                <a class="nav-link active" href="#">Peringkat Cabang Institusi</a>
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
    <section class="container">
    <h1 class="text-center my-3">Data Peringkat Cabang Individu</h1>
        <!-- Kondisi jika array_cabang tidak kosong -->
        <?php if (!empty($array_cabang)) : ?>
            <table class="table table-hover mb-5">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Lokasi Cabang</th>
                        <th scope="col">Jumlah Pendaftar</th>
                        <th scope="col">Peringkat</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Definisikan variabel nomor sebagai urutan -->
                    <?php $nomor = 1 ?>
                    <!-- Lakukakan loop foreach untuk setiap array_cabang dan assign ke variabel cabang -->
                    <?php foreach ($array_cabang as $cabang) : ?>
                        <tr>
                            <td><?= $nomor ?></td>
                            <td><?= $cabang['cabang'] ?></td>
                            <td><?= $cabang['jml_pendaftar'] ?></td>
                            <td><?= $cabang['peringkat'] ?></td>
                        </tr>
                        <!-- Jalankan statement increment untuk variabel nomor -->
                        <?php $nomor++ ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <!-- Kondisi jika pendaftar_institusi kosong -->
        <?php else : ?>
            <div class="container mt-5 pt-5">
                <h4 class="text-center mt-5 pt-5">Data Tidak Ditemukan!</h4>
            </div>
        <?php endif; ?>
    </section>
    </div>
    </main>
    </div>
    
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
</body>

</html>