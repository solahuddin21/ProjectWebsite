<?php
// Include file php untuk cek cookie dan seluruh function
include 'cek_cookie.php';

// Kondisi jika session login tidak ditemukan (admin belum login)
if (empty($_SESSION['username']) and empty($_SESSION['status'])) {
    // Arahkan ke forbidden.php untuk menampilkan pesan error 403
    header('location:forbidden.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link rel="icon" href="img/Logo_PSM.png">
    <title>Dashboard Admin PSM</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <link href="styles.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
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

    <!-- Navbar Kiri -->
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark bg-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">Halaman</div>
                        <a class="nav-link active" href="dashboard_admin.php">
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

        <!-- Navbar Kanan -->
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Dashboard</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">Selamat Datang di Halaman Admin!</li>
                    </ol>
                    <div class="row">
                        <div class="col-md-6 float-md-end mb-5 ">
                            <div class="card bg-primary text-white my-5 mx-1 shadow">
                                <div class="card-body">
                                    <h5>Data Individu</h5>
                                </div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" href="menu_data_individu.php">Lihat Detail</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 float-md-end mb-5">
                            <div class="card bg-warning text-white my-5 mx-1 shadow ">
                                <div class="card-body">
                                    <h5> Data Institusi </h5>
                                </div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" href="menu_data_institusi.php">Lihat Detail</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 float-md-end mb-5">
                            <div class="card bg-success text-white my-5 mx-1 shadow">
                                <div class="card-body">
                                    <h5>Data Berita</h5>
                                </div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" href="data_berita.php">Lihat Detail</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 float-md-end mb-5">
                            <div class="card bg-danger text-white my-5 mx-1 shadow">
                                <div class="card-body">
                                    <h5>Data Admin</h5>
                                </div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" href="menu_data_admin.php">Lihat Detail</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
            <!-- Akhir Navbar Kanan -->

            <!-- Footer Kanan  -->
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <span class="credit">Created By <a href="#">Kelompok 8</a> | Prisai Sakti Mataram <span class="far fa-copyright"></span><span>2021 All Right Reserved</span> </span>
                        <div>
                            <a href="#">Privacy Policy</a>
                            &middot;
                            <a href="#">Terms &amp; Conditions</a>
                        </div>
                    </div>
                </div>
            </footer>
            <!-- Akhir Footer Kanan -->
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/chart-area-demo.js"></script>
    <script src="assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
    <script src="js/datatables-simple-demo.js"></script>
</body>

</html>