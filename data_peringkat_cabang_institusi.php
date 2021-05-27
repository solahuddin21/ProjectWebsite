<?php
include 'cek_cookie.php';

$pendaftar_individu = query("SELECT cabang, SUM(jumlah) as jml_pendaftar, DENSE_RANK() OVER(ORDER BY jml_pendaftar DESC) AS peringkat FROM daftar_institusi GROUP BY cabang ORDER BY peringkat ASC");

if (isset($_POST['cari'])) {
    $pendaftar_individu = cari_data_individu($_POST['keyword']);
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
                </ul>
            </div>
        </div>
    </nav>
    <!-- Akhir Navbar  -->

    <h1 class="text-center my-3">Data Peringkat Cabang Individu</h1>
    <section class="container">
        <?php if (!empty($pendaftar_individu)) : ?>
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
                    <?php $nomor = 1 ?>
                    <?php foreach ($pendaftar_individu as $indvidu) : ?>
                        <tr>
                            <td><?= $nomor ?></td>
                            <td><?= $indvidu['cabang'] ?></td>
                            <td><?= $indvidu['jml_pendaftar'] ?></td>
                            <td><?= $indvidu['peringkat'] ?></td>
                        </tr>
                        <?php $nomor++ ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else : ?>
            <div class="container mt-5 pt-5">
                <h4 class="text-center mt-5 pt-5">Data Tidak Ditemukan!</h4>
            </div>
        <?php endif; ?>
    </section>

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