<?php
include 'cek_cookie.php';
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
  <link rel="preconnect" href="https://fonts.gstatic.com" />
  <link href="https://fonts.googleapis.com/css2?family=Nunito&display=swap" rel="stylesheet" />

  <!-- Page Icon -->
  <link rel="icon" href="img/Logo_PSM.png" />

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
        <ul class="navbar-nav ms-auto nav-pills">
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="index.php">Beranda</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Profil</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="informasi.php">Informasi</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="cabang_locator.php">Cabang</a>
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

  <!-- Profil -->
  <div class="container contents">
    <h2 class="featurette-heading text-center m-5 fw-bold">Profil</h2>
    <hr class="featurette-divider mb-5" />
    <h3>Prisai Sakti Mataram</h3>
    <p class="lead">
      Disini adalah deskripsi mengenai Prisai Sakti Mataram, bisa berupa sejarah terbentuknya PSM, prestasi PSM, dan lain sebagainya.
      Deskripsi ditulis tidak terlalu panjang, namun sarat akan informasi mengenai Prisai Sakti Mataram.
      Informasi ditulis semenarik mungkin agar pembaca tidak bosan dan semakin tertarik dengan Prisai Sakti Mataram.
    </p>
    <h3 class="mt-5">Visi Misi</h3>
    <p class="lead">
      Disini adalah visi misi dari Prisai Sakti Mataram. Visi akan ditampilkan secara paragraf, dan misi akan ditampilkan secara poin per poin.
      Visi itu merupakan serangkaian kata yang menunjukkan impian, cita-cita atau nilai inti sebuah keinginan sekelompok orang atau secara pribadi dengan pandangan yang jauh ke masa depan demi mencapai sebuah tujuan yang diinginkan.
      Sedangkan Misi adalah suatu pernyataan tentang apa yang harus dikerjakan dalam usaha mewujudkan suatu visi yang telah dibuat. 
    </p>
    <h3 class="mt-5">Struktur Organisasi</h3>
    <img src="img/struktur_organisasi.png" class="card-img mb-4" alt="..." />
    <h3 class="mt-5">Pendidikan PSM</h3>
    <p class="lead mb-5 pb-3">
      Disini berisi tentang Pendidikan apa saja yang dilakukan di Perguruan Pencak Silat Prisai Sakti Mataram.
      pendidikan ini bisa berupa pengembangan karakter, sarana membangun jati diri, dan sebagainya.
    </p>
  </div>
  <!-- Akhir Profil -->

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
          <div class="alert alert-primary alert-dismissible fade show d-none my-alert" role="alert">
            <strong>Terima Kasih!</strong> Pesan terkirim. Akan kami kontak kembali.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
          <form action="#" method="post" name="PSM-kontak">
            <div class="email">
              <div class="text">Email <span class="text-danger">*</span></div>
              <input class="text-white" type="email" name="email" required>
            </div>
            <div class="msg">
              <div class="text">Message <span class="text-danger">*</span></div>
              <textarea class="text-white" rows="2" cols="25" name="pesan" required></textarea>
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
    const myAlert = document.querySelector('.my-alert');


    form.addEventListener('submit', e => {
      e.preventDefault();
      // Ketika tombol submit diklik 
      btnLoading.classList.toggle('d-none');
      btnKirim.classList.toggle('d-none');
      fetch(scriptURL, {
          method: 'POST',
          body: new FormData(form)
        })
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