<?php
include 'cek_cookie.php';

if (isset($_POST['submit'])) {
    if (tambah_institusi($_POST) > 0) {
        mysqli_query($koneksi, "COMMIT");
        $_SESSION['tambahdata'] = 'suksess';
        header('location:index.php');
    } else {
        mysqli_query($koneksi, "ROLLBACK");
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
                <div class="mb-3 pt-4">
                    <label for="exampleInputEmail1" class="form-label">Nama Institusi</label>
                    <input type="text" name="nama" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Jumlah Orang Yang Akan Mendaftar</label>
                    <input type="number" name="jumlah" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Alamat Institusi</label>
                    <textarea name="alamat" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">No. Telepon / Handphone</label>
                    <input type="text" name="no_telp" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Pilihan Cabang</label>
                    <select name="cabang" class="form-select" aria-label="Default select example">
                        <option selected hidden>Silahkan Pilih Cabang</option>
                        <option value="Jakarta">Jakarta</option>
                        <option value="Makassar">Makassar</option>
                        <option value="Medan">Medan</option>
                    </select>
                </div>

                <button type="button" class="btn btn-warning mb-5" data-bs-toggle="modal" data-bs-target="#exampleModal">Submit</button>
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Data </h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Apakah yakin data sudah benar?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
                                <button type="submit" name="submit" class="btn btn-warning">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
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
                    <p>Disini adalah deskripsi mengenai Prisai Sakti Mataram secara singkat. Bisa berupa profil, atau deskripsi.</p>
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