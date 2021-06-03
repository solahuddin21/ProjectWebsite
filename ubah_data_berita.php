<?php
include 'cek_cookie.php';

if (empty($_SESSION['username']) and empty($_SESSION['status'])) {
    header('location:forbidden.php');
    exit;
}

$id = $_GET['id'];
$berita = query("SELECT * FROM berita WHERE id = $id")[0];

if (isset($_POST['submit'])) {
    if (isset($_POST['radio_gambar']) and $_POST['radio_gambar'] == 'url') {
        $_POST['gambar'] = $_POST['gambar2'];
    } else {
        if (!file_exists($_POST['gambar'])) {
            $_POST['gambar'] = "img/" . $_POST['gambar'];
        }
    }
    if (ubah_data_berita($_POST) > 0) {
        $_SESSION['ubahdata'] = 'sukses';
        header('location:data_berita.php');
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

    <!-- Jquery -->
    <link href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css" rel="stylesheet">
    <link href="https://trentrichardson.com/examples/timepicker/jquery-ui-timepicker-addon.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js" integrity="sha256-T0Vest3yCU7pafRw9r+settMBX6JkKN06dqBnpQ8d30=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-ui-timepicker-addon/1.6.3/jquery-ui-timepicker-addon.min.js"></script>
    <script type="text/javascript">
        $(function() {
            $("#datepicker").datetimepicker({
                dateFormat: "dd-mm-yy",
                timeFormat: "HH:mm:ss",
                changeMonth: true,
                changeYear: true
            });
        });
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

    <!-- Form Pendaftaran Individu -->
    <section class="individu m-5">
        <div class="container">
            <h2 class="text-center pt-5 fw-bold">Ubah Data Berita</h2>
            <form action="" method="POST">
                <div class="mb-3 pt-4">
                    <label for="exampleInputEmail1" class="form-label" hidden>ID</label>
                    <input type="hidden" name="id" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?= $berita['id'] ?>" required>
                </div>
                <div class="mb-3 pt-4">
                    <label for="datepicker" class="form-label">Tanggal</label>
                    <input type="text" name="tanggal" class="form-control" id="datepicker" aria-describedby="emailHelp" value="<?= $berita['tanggal'] ?>" required>
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Judul</label>
                    <input type="text" name="judul" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?= $berita['judul'] ?>" required>
                </div>
                <div class="mb-3">
                    <div class="ui-widget">
                        <label for="datepicker" class="form-label">Isi Berita</label>
                        <textarea class="form-control" name="teks" id="exampleFormControlTextarea1" rows="15"><?= $berita['teks'] ?></textarea>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Gambar</label><br>
                    <div class="text-center">
                        <img src="<?= $berita['gambar'] ?>" class="img-fluid mb-3" alt="..." style="width: 300px;" />
                    </div>
                    <div class="row featurette">
                        <div class="col-lg-6 text-center">
                            <input class="form-check-input" type="radio" name="radio_gambar" value="local_image" required <?php if (strpos($berita['gambar'], "http") === false) : echo "checked";
                                                                                                                            endif; ?> /><br>
                            <i class="far fa-images fa-2x"></i><br>Local Image
                            <div class="input-group">
                                <input type="file" class="form-control" id="inputGroupFile02" name="gambar">
                            </div>
                        </div>
                        <div class="col-lg-6 text-center">
                            <input class="form-check-input" type="radio" name="radio_gambar" value="url" required <?php if (strpos($berita['gambar'], "http") !== false) : echo "checked";
                                                                                                                    endif; ?> /><br>
                            <i class="fas fa-link fa-2x"></i><br>URL
                            <div class="input-group">
                                <input type="text" name="gambar2" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php if (strpos($berita['gambar'], "http") !== false) : echo $berita['gambar'];
                                                                                                                                                    endif; ?>">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Penulis</label>
                    <input type="text" name="penulis" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?= $berita['penulis'] ?>" required>
                </div>
                <button type="submit" name="submit" class="btn btn-warning mb-5">Submit</button>
            </form>
        </div>
    </section>
    </div>
    <!-- Akhir Form Pendaftaran Individu -->

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