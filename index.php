<?php
include 'functions.php';
session_start();

$array_berita = query("SELECT * FROM berita LIMIT 3");
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

  <script src="https://code.jquery.com/jquery-3.4.1.js"></script>

  <script>
      // Animasi fadeout dan auto close untuk alert
      window.setTimeout(function () {
        $('.alert')
          .fadeTo(500, 0)
          .slideUp(500, function () {
            $(this).remove();
          });
      }, 2500);
    </script>

  <!-- We JS -->
  <script type="text/javascript" src="script.js"></script>

  <!-- Maps Style  -->
  <style>
    #map {
      height: 400px;
      width: 100%;
    }
  </style>

  <title>Prisai Sakti Mataram</title>
</head>

<body>
  <!-- Navbar  -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm sticky-top ">
    <div class="container">
      <a class="navbar-brand" href="#">
        <img src="img/Logo_PSM.png" alt="" width="30" height="39" />
        Prisai Sakti Mataram
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse " id="navbarNav">
        <ul class="navbar-nav nav-pills ms-auto shadow-sm">
          <li class="nav-item">
            <a class="nav-link active " aria-current="page" href="#">Beranda</a>
          </li>
          <li class="nav-item">
            <a class="nav-link " aria-current="page" href="profil.php">Profil</a>
          </li>
          <li class="nav-item">
            <a class="nav-link " aria-current="page" href="informasi.php">Informasi</a>
          </li>
          <li class="nav-item">
            <a class="nav-link " aria-current="page" href="cabang_locator.php">Cabang</a>
          </li>
          <li class="nav-item ps-2">
            <a href="#gabung"><button class="btn btn-outline-warning" type="submit">Gabung</button></a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- Akhir Navbar  -->

  <?php if (isset($_SESSION['tambahdata']) and $_SESSION['tambahdata'] == "sukses") : ?>
    <div class="container alert alert-success alert-dismissible fade show mt-2" role="alert">
      <strong>Berhasil!</strong> Data telah ditambahkan.
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php unset($_SESSION['tambahdata']) ?>
  <?php endif; ?>

  <!-- Carousel -->
  <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2" class></button>
      <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3" class></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="https://source.unsplash.com/HN_4K2diUWs" class="d-block" width="100%" height="100%" arial-hidden="true" focusable="false" alt="..." />
        <rect width="100%" height="100%" fill="#777"></rect>
        <div class="container">
          <div class="carousel-caption">
            <h2 class="text-white">First slide label</h2>
            <p class="text-white text-center">Some representative placeholder content for the first slide.</p>
          </div>
        </div>
      </div>
      <div class="carousel-item">
        <img src="https://source.unsplash.com/6lTre65C00E" class="d-block" width="100%" height="100%" arial-hidden="true" focusable="false" alt="..." />
        <rect width="100%" height="100%" fill="#777"></rect>
        <div class="container">
          <div class="carousel-caption">
            <h2 class="text-white">Second slide label</h2>
            <p class="text-white text-center">Some representative placeholder content for the first slide.</p>
          </div>
        </div>
      </div>
      <div class="carousel-item">
        <img src="https://source.unsplash.com/igLzPKOvZNw" class="d-block" width="100%" height="100%" arial-hidden="true" focusable="false" alt="..." />
        <rect width="100%" height="100%" fill="#777"></rect>
        <div class="container">
          <div class="carousel-caption">
            <h2 class="text-white">Third slide label</h2>
            <p class="text-white text-center">Some representative placeholder content for the first slide.</p>
          </div>
        </div>
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
  <!-- Akhir Carousel -->

  <!-- Tentang Kami  -->
  <div class="container contents">
    <div class="row featurette">
      <div class="col-md-7">
        <h2 class="featurette-heading">Tentang Kami</h2>
        <hr class="featurette-divider" />
        <p class="lead">
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Aut vitae alias repudiandae dignissimos, fugit dolor
          quisquam neque officiis provident commodi porro quibusdam vel quaerat quas quod ipsam molestiae illum optio
          praesentium. Inventore esse expedita in itaque aperiam repellat reprehenderit, deleniti odio nihil dolorem
          corrupti assumenda ipsum perferendis eveniet cupiditate officiis voluptas libero similique. Possimus
          recusandae ea
          adipisci dicta? <br />
          <a href="profil.php"><button type="#" class="btn btn-outline-secondary w-25 h-25 mt-3">Selengkapnya</button></a>
        </p>
      </div>
      <div class="col-md-5">
        <img class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="500" height="500" src="img/Logo_PSM.png" role="img" aria-label="Placeholder: 500x500" focusable="false" />
        <title>Prisai Sakti Mataram</title>
        <rect width="100%" height="100%" fill="#eee"></rect>
        </svg>
      </div>
    </div>
  </div>
  <!-- Akhir Tentang Kami -->

  <!-- Berita  -->
  <div class="container contents">
    <hr class="featurette-divider" />
    <h1 class="col-md-5">Berita PSM</h1>
    <div class="card-group">
      <?php if (!empty($array_berita)) : ?>
        <?php foreach ($array_berita as $berita) : ?>
          <div class="card mx-2">
            <img src="<?= $berita['gambar'] ?>" class="card-img-top" alt="..." />
            <div class="card-body">
              <h5 class="card-title"><?= $berita['judul'] ?></h5>
              <?php
              $teks = strip_tags($berita['teks']);
              if (strlen($teks) > 150) {
                $stringCut = substr($teks, 0, 150);
                $endPoint = strrpos($stringCut, ' ');
                $teks = $endPoint ? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);
                $teks .= '...';
              }
              ?>
              <p class="card-text"><?= $teks ?></p>
              <p class="card-text"><small class="text-muted"><?= time_elapsed_string($berita['tanggal']) ?></small></p>
              <a href="berita.php?id=<?= $berita['id']; ?>" class="btn btn-outline-warning">Lanjutkan baca</a>
            </div>
          </div>
        <?php endforeach; ?>
        </tbody>
        </table>
      <?php else : ?>
        <div class="container my-5 py-3">
          <h4 class="text-center my-5">Data Tidak Ditemukan!</h4>
        </div>
      <?php endif; ?>
    </div>
    <!-- Akhir Berita -->

    <!-- Cabang Lokator -->
    <section class="cabang-locator">
      <div class="container contents">
        <hr class="featurette-divider mt-5" />
        <h1>Cabang Locator</h1>
        <div id="map"></div>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD0l_6IDf0692HjV9Wq5k_AkkwKbUOqEYM&callback=initMap&libraries=&v=weekly" async></script>
    </section>
  </div>
  <!-- Akhir Cabang Lokator -->

  <!-- Gabung -->
  <section id="gabung" class="gabung mb-5">
    <div class="container contents text-center">
      <hr class="featurette-divider my-5" />
      <div class="cards">
        <h2 class="header">
          Ayo Gabung!</h2>
        <div class="services">
          <div class="konten konten-1">
            <span style="font-size: 3em;">
              <i class="fas fa-user"></i>
            </span>
            <h2>
              Individu</h2>
            <p>
              Lorem ipsum dolor sit amet, consectetur adipisicing elit. Expedita ullam aliquid non eligendi, nemo est
              neque
              reiciendis error?</p>
            <a href="gabung_individu.php">Gabung</a>
          </div>
          <div class="konten konten-2">
            <span style="font-size: 3em;">
              <i class="fas fa-university"></i>
            </span>
            <h2>
              Institusi</h2>
            <p>
              Lorem ipsum dolor sit amet, consectetur adipisicing elit. Expedita ullam aliquid non eligendi, nemo est
              neque
              reiciendis error?</p>
            <a href="gabung_institusi.php">Gabung</a>
          </div>
        </div>
        <a href="https://wa.me/+6282215716543" target="_blank"><button type="#" class="btn btn-outline-warning text-center mt-5">Kontak Kami</button></a><br>
        <a href="data_pendaftar_individu.php"><button type="#" class="btn btn-outline-warning text-center mt-5">Data Pendaftar Individu</button></a>
        <a href="data_pendaftar_institusi.php"><button type="#" class="btn btn-outline-warning text-center mt-5">Data Pendaftar Institusi</button></a>
      </div>
  </section>
  <!-- Akhir Gabung -->


  <!-- Footer -->
  <footer>
    <div class="main-content">
      <div class="left box">
        <h2>Tentang Kami</h2>
        <div class="content">
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus quaerat nulla at doloribus minus
            possimus
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