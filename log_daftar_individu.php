<?php
include 'cek_cookie.php';

if (empty($_SESSION['username']) and empty($_SESSION['status'])) {
  header('location:forbidden.php');
  exit;
}

$limit = 5;
$query = "SELECT * FROM log_daftar_individu";
$result = mysqli_query($koneksi, $query);
$jumlah_result = mysqli_num_rows($result);
$jumlah_page = ceil($jumlah_result / $limit);

if (!isset($_GET['page'])) {
  $page = 1;
} else {
  $page = $_GET['page'];
}

$pagination = true;
$page_awal = ($page - 1) * $limit;

$pendaftar_individu = query("SELECT ROW_NUMBER() OVER (ORDER BY id ASC) as nomor, waktu, status, id_pendaftar FROM log_daftar_individu  LIMIT $page_awal, $limit");

if (isset($_POST['cari'])) {
  $pendaftar_individu = cari_log_individu($_POST['keyword']);
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

            <a class="nav-link collapsed active" href="#" data-bs-toggle="collapse" data-bs-target="#collapseIndividu" aria-expanded="false" aria-controls="collapseIndividu">
              <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
              Data Individu
              <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>
            <div class="collapse" id="collapseIndividu" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
              <nav class="sb-sidenav-menu-nested nav">
                <a class="nav-link" href="data_pendaftar_individu.php">List Daftar Individu</a>
                <a class="nav-link active" href="#">Log Daftar Individu</a>
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
          <section class="container">
            <h1 class="text-center my-3">Log Data Pendaftar Individu</h1>
            <form action="" method="POST">
              <div class="row justify-content-start">
                <div class="col-5 my-2">
                  <input class="form-control" type="search" placeholder="Masukkan Status, Waktu, atau ID Pendaftar..." aria-label="Cari" name="keyword" autocomplete="off">
                </div>
                <div class="col-3 my-2">
                  <button class="btn btn-dark" type="submit" name="cari"><i class="fas fa-search"></i> Cari</button>
                </div>
              </div>
            </form>
            <?php if (isset($_SESSION['hapusdata']) and $_SESSION['hapusdata'] == "sukses") : ?>
              <div class="container alert alert-success alert-dismissible fade show mt-2" role="alert">
                <strong>Berhasil!</strong> Data telah dihapus.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
              <?php unset($_SESSION['hapusdata']) ?>
            <?php elseif (isset($_SESSION['hapusdata']) and $_SESSION['hapusdata'] == "gagal") : ?>
              <div class="container alert alert-danger alert-dismissible fade show mt-2" role="alert">
                <strong>Gagal!</strong> Data gagal dihapus.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
              <?php unset($_SESSION['hapusdata']) ?>
            <?php endif; ?>
            <?php if (!empty($pendaftar_individu)) : ?>
              <table class="table table-hover mb-5">
                <thead>
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Waktu</th>
                    <th scope="col">Status</th>
                    <th scope="col">ID Pendaftar</th>
                    <th scope="col" style="width: 198px;">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($pendaftar_individu as $individu) : ?>
                    <tr>
                      <td><?= $individu['nomor'] ?></td>
                      <td><?= $individu['waktu'] ?></td>
                      <td><?= $individu['status'] ?></td>
                      <td><?= $individu['id_pendaftar'] ?></td>
                      <td>
                        <button class="btn btn-dark" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal<?= $individu['id']; ?>"><i class="fas fa-info-circle fa-lg"></i> Lihat Detail</button>
                        <div class="modal fade" id="exampleModal<?= $individu['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title text-dark" id="exampleModalLabel">Detail Log No. <?= $nomor ?></h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <div class="modal-body">
                                <table class="table table-hover mb-5">
                                  <thead class="text-center">
                                    <th scope="col"></th>
                                    <?php if ($individu['status'] == 'Insert Data Pendaftar') : ?>
                                      <th scope="col">Data Baru</th>
                                    <?php elseif ($individu['status'] == 'Delete Data Pendaftar') : ?>
                                      <th scope="col">Data Lama</th>
                                    <?php else : ?>
                                      <th scope="col">Data Baru</th>
                                      <th scope="col">Data Lama</th>
                                    <?php endif; ?>
                                  </thead>
                                  <tbody>
                                    <?php $id_individu = $individu['id'] ?>
                                    <?php $detail_pendaftar_individu = query("SELECT *, jenis_cabang(cabang) as 'jenis_cabang', jenis_cabang(cabang_lama) as 'jenis_cabang_lama' FROM log_daftar_individu WHERE id = $id_individu"); ?>
                                    <?php foreach ($detail_pendaftar_individu as $detail_individu) : ?>
                                      <?php if ($individu['status'] == 'Insert Data Pendaftar') : ?>
                                        <tr>
                                          <th style="width: 150px;">Nama</th>
                                          <td><?= $detail_individu['nama'] ?></td>
                                        </tr>
                                        <tr>
                                          <th>Domisili</th>
                                          <td><?= $detail_individu['domisili'] ?></td>
                                        </tr>
                                        <tr>
                                          <th>Tanggal Lahir</th>
                                          <?php if ($detail_individu['tanggal_lahir'] == "0000-00-00") : ?>
                                            <td>-</td>
                                          <?php else : ?>
                                            <td><?= $detail_individu['tanggal_lahir'] ?></td>
                                          <?php endif; ?>
                                        </tr>
                                        <tr>
                                          <th>Alamat</th>
                                          <td><?= $detail_individu['alamat'] ?></td>
                                        </tr>
                                        <tr>
                                          <th>No. KTP</th>
                                          <td><?= $detail_individu['no_ktp'] ?></td>
                                        </tr>
                                        <tr>
                                          <th>No. Telp</th>
                                          <td><?= $detail_individu['no_telp'] ?></td>
                                        </tr>
                                        <tr>
                                          <th>Cabang</th>
                                          <td><?= $detail_individu['cabang'] ?></td>
                                        </tr>
                                        <tr>
                                          <th>Jenis Cabang</th>
                                          <td><?= $detail_individu['jenis_cabang'] ?></td>
                                        </tr>
                                      <?php elseif ($individu['status'] == 'Delete Data Pendaftar') : ?>
                                        <tr>
                                          <th style="width: 150px;">Nama</th>
                                          <td><?= $detail_individu['nama_lama'] ?></td>
                                        </tr>
                                        <tr>
                                          <th>Domisili</th>
                                          <td><?= $detail_individu['domisili_lama'] ?></td>
                                        </tr>
                                        <tr>
                                          <th>Tanggal Lahir</th>
                                          <?php if ($detail_individu['tanggal_lahir_lama'] == "0000-00-00") : ?>
                                            <td>-</td>
                                          <?php else : ?>
                                            <td><?= $detail_individu['tanggal_lahir_lama'] ?></td>
                                          <?php endif; ?>
                                        </tr>
                                        <tr>
                                          <th>Alamat</th>
                                          <td><?= $detail_individu['alamat_lama'] ?></td>
                                        </tr>
                                        <tr>
                                          <th>No. KTP</th>
                                          <td><?= $detail_individu['no_ktp_lama'] ?></td>
                                        </tr>
                                        <tr>
                                          <th>No. Telp</th>
                                          <td><?= $detail_individu['no_telp_lama'] ?></td>
                                        </tr>
                                        <tr>
                                          <th>Cabang</th>
                                          <td><?= $detail_individu['cabang_lama'] ?></td>
                                        </tr>
                                        <tr>
                                          <th>Jenis Cabang</th>
                                          <td><?= $detail_individu['jenis_cabang_lama'] ?></td>
                                        </tr>
                                      <?php else : ?>
                                        <tr>
                                          <th style="width: 150px;">Nama</th>
                                          <td><?= $detail_individu['nama'] ?></td>
                                          <td><?= $detail_individu['nama_lama'] ?></td>
                                        </tr>
                                        <tr>
                                          <th>Domisili</th>
                                          <td><?= $detail_individu['domisili'] ?></td>
                                          <td><?= $detail_individu['domisili_lama'] ?></td>
                                        </tr>
                                        <tr>
                                          <th>Tanggal Lahir</th>
                                          <?php if ($detail_individu['tanggal_lahir'] == "0000-00-00") : ?>
                                            <td>-</td>
                                          <?php else : ?>
                                            <td><?= $detail_individu['tanggal_lahir'] ?></td>
                                          <?php endif; ?>
                                          <?php if ($detail_individu['tanggal_lahir_lama'] == "0000-00-00") : ?>
                                            <td>-</td>
                                          <?php else : ?>
                                            <td><?= $detail_individu['tanggal_lahir_lama'] ?></td>
                                          <?php endif; ?>
                                        </tr>
                                        <tr>
                                          <th>Alamat</th>
                                          <td><?= $detail_individu['alamat'] ?></td>
                                          <td><?= $detail_individu['alamat_lama'] ?></td>
                                        </tr>
                                        <tr>
                                          <th>No. KTP</th>
                                          <td><?= $detail_individu['no_ktp'] ?></td>
                                          <td><?= $detail_individu['no_ktp_lama'] ?></td>
                                        </tr>
                                        <tr>
                                          <th>No. Telp</th>
                                          <td><?= $detail_individu['no_telp'] ?></td>
                                          <td><?= $detail_individu['no_telp_lama'] ?></td>
                                        </tr>
                                        <tr>
                                          <th>Cabang</th>
                                          <td><?= $detail_individu['cabang'] ?></td>
                                          <td><?= $detail_individu['cabang_lama'] ?></td>
                                        </tr>
                                        <tr>
                                          <th>Jenis Cabang</th>
                                          <td><?= $detail_individu['jenis_cabang'] ?></td>
                                          <td><?= $detail_individu['jenis_cabang_lama'] ?></td>
                                        </tr>
                                      <?php endif; ?>
                                    <?php endforeach; ?>
                                  </tbody>
                                </table>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Tutup</button>
                              </div>
                            </div>
                          </div>
                        </div>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
            <?php else : ?>
              <div class="container mt-5 pt-5">
                <h4 class="text-center mt-5 pt-5">Data Tidak Ditemukan!</h4>
              </div>
            <?php endif; ?>
          </section>

          <!-- Pagination -->
          <section class="page my-5">
            <nav aria-label="Page navigation example">
              <ul class="pagination justify-content-center">
                <?php if (empty($_GET['page']) and $pagination == true) : ?>
                  <li class="page-item active"><a class="page-link" href="log_daftar_individu.php?page=1">1</a></li>
                  <?php for ($page = 2; $page <= $jumlah_page; $page++) : ?>
                    <li class="page-item"><a class="page-link text-warning" href="log_daftar_individu.php?page=<?= $page ?>"><?= $page ?></a></li>
                  <?php endfor; ?>
                <?php elseif (!empty($_GET['page']) and $pagination == true) : ?>
                  <?php for ($page = 1; $page <= $jumlah_page; $page++) : ?>
                    <?php if ($page == $_GET['page']) : ?>
                      <li class="page-item active"><a class="page-link" href="log_daftar_individu.php?page=<?= $page ?>"><?= $page ?></a></li>
                    <?php else : ?>
                      <li class="page-item"><a class="page-link text-warning" href="log_daftar_individu.php?page=<?= $page ?>"><?= $page ?></a></li>
                    <?php endif; ?>
                  <?php endfor; ?>
                <?php endif; ?>
              </ul>
            </nav>
          </section>
          <!-- Akhir Pagination -->

        </div>
      </main>
    </div>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
</body>

</html>