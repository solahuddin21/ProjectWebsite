<?php
include 'cek_cookie.php';

$array_berita = query("SELECT * FROM berita ORDER BY tanggal DESC LIMIT 3");

$cabang = query("SELECT * FROM lokasi_cabang");

$data_daftar_individu = query("SELECT * FROM daftar_individu ORDER BY id DESC LIMIT 1")[0];
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

  <link href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js" integrity="sha256-T0Vest3yCU7pafRw9r+settMBX6JkKN06dqBnpQ8d30=" crossorigin="anonymous"></script>

  <!-- We JS -->
  <script type="text/javascript">
    // JS Untuk Maps
    function initMap() {
      // Map Options
      var options = {
        zoom: 6,
        center: {
          lat: -6.112566,
          lng: 106.92834
        },
      };

      // New map
      var map = new google.maps.Map(document.getElementById('map'), options);

      <?php if (!empty($cabang)) : ?>
        <?php $nomor = 1 ?>
        <?php foreach ($cabang as $cbg) : ?>
          var contentMarker<?= $nomor ?> =
            '<div class="fs-3">' +
            '<h2>Detail Lokasi</h2>' +
            '<div class="fs-5">' +
            '<table><tr><td>Latitude</td><td>:</td><td><?= $cbg['latitude'] ?></td></tr>' +
            '<tr><td>Longitude</td><td>:</td><td><?= $cbg['longitude'] ?></td></tr>' +
            '<tr><td>Alamat</td><td>:</td><td><?= $cbg['alamat'] ?></td></tr></table></div>' +
            '<style>table td, table td * {vertical-align: top;}</style>';

          addMarker({
            coords: {
              lat: <?= $cbg['latitude'] ?>,
              lng: <?= $cbg['longitude'] ?>
            },
            content: contentMarker<?= $nomor ?>
          });
          <?php $nomor++ ?>
        <?php endforeach; ?>
      <?php endif; ?>

      // Fungsi Add Marker
      function addMarker(props) {
        var marker = new google.maps.Marker({
          position: props.coords,
          map: map,
          icon: props.iconImage,
        });

        // Menampikan Info Window
        if (props.content) {
          var infoWindow = new google.maps.InfoWindow({
            content: props.content,
          });

          // On Click Listener pada marker
          marker.addListener('click', function() {
            infoWindow.open(map, marker);
          });
        }
      }
    }
  </script>

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
    <script type="text/javascript">
      $(document).ready(function() {
        $('#staticBackdrop<?= $data_daftar_individu['id'] ?>').modal('show');
      });
    </script>
    <button type="button" class="btn btn-primary" style="display: none;" data-bs-toggle="modal" data-bs-target="#staticBackdrop<?= $data_daftar_individu['id'] ?>">Hidden Button Invoice</button>
    <div class="modal fade" id="staticBackdrop<?= $data_daftar_individu['id'] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel">Data Telah Ditambahkan </h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="container alert alert-success alert-dismissible fade show mt-2" role="alert">
              <strong>Berhasil!</strong><br>
              Silahkan lihat invoice untuk melanjutkan pembayaran.
            </div>
          </div>
          <div class="modal-footer">
            <a href="invoice.php?id=<?= $data_daftar_individu['id']; ?>" target="_blank"><button class="btn btn-dark" type="button">Lihat Invoice</button></a>
          </div>
        </div>
      </div>
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
        <a href="https://wa.me/+6282215716543" target="_blank"><button type="#" class="btn btn-warning text-center mt-5">Kontak Kami</button></a><br>
        <?php if (!isset($_SESSION['username']) and !isset($_SESSION['status'])) : ?>
          <a href="login_admin.php"><button type="#" class="btn btn-outline-light text-center mt-5">Login Admin</button></a><br>
        <?php endif; ?>
        <?php if (isset($_SESSION['username']) and isset($_SESSION['status'])) : ?>
          <h3 class="mt-5 text-center">Selamat datang, <?= ucwords($_SESSION['username']) ?></h3>
          <a href="data_pendaftar_individu.php"><button type="#" class="btn btn-warning text-center mt-4">Data Pendaftar Individu</button></a>
          <a href="data_pendaftar_institusi.php"><button type="#" class="btn btn-warning text-center mt-4">Data Pendaftar Institusi</button></a><br>
          <a href="log_daftar_individu.php"><button type="#" class="btn btn-warning text-center mt-5">Log Daftar Individu</button></a>
          <a href="log_daftar_institusi.php"><button type="#" class="btn btn-warning text-center mt-5">Log Daftar Institusi</button></a><br>
          <a href="data_peringkat_cabang_individu.php"><button type="#" class="btn btn-warning text-center mt-5">Data Peringkat Cabang Individu</button></a>
          <a href="data_peringkat_cabang_institusi.php"><button type="#" class="btn btn-warning text-center mt-5">Data Peringkat Cabang Institusi</button></a><br>
          <a href="data_berita.php"><button type="#" class="btn btn-warning text-center mt-5">Data Berita</button></a><br>
          <a href="logout_admin.php"><button type="#" class="btn btn-warning text-center mt-5">Logout</button></a>
        <?php endif; ?>
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
          <div class="alert alert-primary alert-dismissible fade show d-none my-alert" role="alert">
            <strong>Terima Kasih!</strong> Pesan terkirim. Akan kami kontak kembali.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
          <form action="#" method = "post" name= "PSM-kontak">
            <div class="email">
              <div class="text">Email <span class="text-danger">*</span></div>
              <input class="text-white" type="email" name = "email" required>
            </div>
            <div class="msg">
              <div class="text">Message <span class="text-danger">*</span></div>
              <textarea class="text-white" rows="2" cols="25" name = "pesan" required></textarea>
            </div>
              <button class="btn btn-danger text-center btn-kirim" type="submit">Send</button>
              <button class="btn btn-danger text-center btn-loading d-none" type="button" disabled>
              <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
              Loading...
              </button>
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

  <script>
  const scriptURL = 'https://script.google.com/macros/s/AKfycbz1fgAPY6aoWrtpG7BbduiQvU0hbbN-0HpVkdmCVp2e49sh49dynMS08pI2lSh8TudM/exec';
  const form = document.forms['PSM-kontak'];
  const btnKirim = document.querySelector('.btn-kirim');
  const btnLoading = document.querySelector('.btn-loading'); 
  const myAlert  = document.querySelector('.my-alert');


  form.addEventListener('submit', e => {
    e.preventDefault();
    // Ketika tombol submit diklik 
    btnLoading.classList.toggle('d-none');
    btnKirim.classList.toggle('d-none');
    fetch(scriptURL, { method: 'POST', body: new FormData(form)})
      .then(response => {
        // menampilkan tombol loading, hidden tombol kirim
        btnLoading.classList.toggle('d-none');
        btnKirim.classList.toggle('d-none');
        // Tampilkan Alert
        myAlert.classList.toggle('d-none');
        //reset formnya
        form.reset();
        console.log('Success!', response);
      })
      .catch(error => console.error('Error!', error.message))
  })
</script>
</body>

</html>