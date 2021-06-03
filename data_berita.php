<?php
// Include file php untuk cek cookie dan seluruh function
include 'cek_cookie.php';

// Kondisi jika session login tidak ditemukan (admin belum login)
if (empty($_SESSION['username']) and empty($_SESSION['status'])) {
  // Arahkan ke forbidden.php untuk menampilkan pesan error 403
  header('location:forbidden.php');
  exit;
}

// Lakukan query berita dengan urutan berdasarkan tanggal
$array_berita = query("SELECT * FROM berita ORDER BY tanggal DESC");

// Kondisi jika tombol cari ditekan
if (isset($_POST['cari'])) {
  // Kirim keyword ke fungsi cari_berita pada function.php dan perbarui hasil query baru ke variabel array_berita
  $array_berita = cari_berita($_POST['keyword']);
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
          <!-- Cek kondisi jika admin sudah login tampilkan menu ke dashboard admin -->
          <?php if (isset($_SESSION['username']) and isset($_SESSION['status'])) : ?>
            <li class="nav-item">
              <a href="dashboard_admin.php"><button class="btn btn-outline-danger ms-2" type="submit">Admin</button></a>
            </li>
          <?php endif; ?>
          <!-- Akhir kondisi -->
        </ul>
      </div>
    </div>
  </nav>
  <!-- Akhir Navbar  -->

  <h1 class="text-center my-3">Data Berita</h1>
  <section class="container">
    <a href="tambah_data_berita.php"><button class="btn btn-dark my-1" type="button"><i class="fas fa-plus"></i> Tambah Data</button></a>
    <form action="" method="POST">
      <div class="row justify-content-start">
        <div class="col-5 my-2">
          <input class="form-control" type="search" placeholder="Masukkan Judul, Kata Kunci, atau Penulis..." aria-label="Cari" name="keyword" autocomplete="off">
        </div>
        <div class="col-3 my-2">
          <button class="btn btn-dark" type="submit" name="cari"><i class="fas fa-search"></i> Cari</button>
        </div>
      </div>
    </form>
    <!-- Kondisi jika session tambahdata ditemukan dan bernilai sukses -->
    <?php if (isset($_SESSION['tambahdata']) and $_SESSION['tambahdata'] == "sukses") : ?>
      <div class="container alert alert-success alert-dismissible fade show mt-2" role="alert">
        <strong>Berhasil!</strong> Data telah ditambahkan.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
      <?php unset($_SESSION['tambahdata']) ?>
    <!-- Akhir kondisi session tambahdata ditemukan dan bernilai sukses -->
    <!-- Kondisi jika session ubahdata ditemukan dan bernilai sukses -->
    <?php elseif (isset($_SESSION['ubahdata']) and $_SESSION['ubahdata'] == "sukses") : ?>
      <div class="container alert alert-success alert-dismissible fade show mt-2" role="alert">
        <strong>Berhasil!</strong> Data telah diubah.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
      <?php unset($_SESSION['ubahdata']) ?>
    <!-- Akhir kondisi session ubahdata ditemukan dan bernilai sukses -->
    <!-- Kondisi jika session hapusdata ditemukan dan bernilai sukses -->
    <?php elseif (isset($_SESSION['hapusdata']) and $_SESSION['hapusdata'] == "sukses") : ?>
      <div class="container alert alert-success alert-dismissible fade show mt-2" role="alert">
        <strong>Berhasil!</strong> Data telah dihapus.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
      <?php unset($_SESSION['hapusdata']) ?>
    <!-- Akhir kondisi jika session hapusdata ditemukan dan bernilai sukses -->
    <!-- Kondisi jika session hapusdata ditemukan dan bernilai gagal -->
    <?php elseif (isset($_SESSION['hapusdata']) and $_SESSION['hapusdata'] == "gagal") : ?>
      <div class="container alert alert-danger alert-dismissible fade show mt-2" role="alert">
        <strong>Gagal!</strong> Data gagal dihapus.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
      <?php unset($_SESSION['hapusdata']) ?>
    <!-- Akhir kondisi jika session hapusdata ditemukan dan bernilai gagal -->
    <?php endif; ?>
    <!-- Kondisi jika array_berita tidak kosong -->
    <?php if (!empty($array_berita)) : ?>
      <table class="table table-hover mb-5">
        <thead>
          <tr>
            <th scope="col">No</th>
            <th scope="col">Tanggal</th>
            <th scope="col">Judul</th>
            <th scope="col">Isi Berita</th>
            <th scope="col">Gambar</th>
            <th scope="col">Penulis</th>
            <th scope="col" style="width: 198px;">Aksi</th>
          </tr>
        </thead>
        <tbody>
          <!-- Definisikan variabel nomor sebagai urutan -->
          <?php $nomor = 1 ?>
          <!-- Lakukakan loop foreach untuk setiap array_berita dan assign ke variabel berita -->
          <?php foreach ($array_berita as $berita) : ?>
            <tr>
              <td><?= $nomor ?></td>
              <td><?= $berita['tanggal'] ?></td>
              <td><?= $berita['judul'] ?></td>
              <?php
              // Potong sebagian teks dari isi berita
              $teks = strip_tags($berita['teks']);
              // Kondisi jika panjang teks lebih dari 80 karakter
              if (strlen($teks) > 80) {
                // Lakukan pemotongan dengan substring dan lakukan limit di 80 karakter
                $stringCut = substr($teks, 0, 80);
                $endPoint = strrpos($stringCut, ' ');
                $teks = $endPoint ? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);
                $teks .= '...';
              }
              ?>
              <td><?= $teks ?></td>
              <td><img src="<?= $berita['gambar'] ?>" class="img-fluid" alt="..." style="width: 70px;" /></td>
              <td><?= $berita['penulis'] ?></td>
              <td>
                <a href="ubah_data_berita.php?id=<?= $berita['id']; ?>"><button class="btn btn-dark" type="button"><i class="far fa-edit"></i> Ubah</button></a>
                <button class="btn btn-dark" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal<?= $berita['id']; ?>"><i class="far fa-trash-alt"></i> Hapus</button>
                <div class="modal fade" id="exampleModal<?= $berita['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title text-dark" id="exampleModalLabel">Konfirmasi Hapus</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        <label class="text-dark">Yakin Ingin Menghapus Data No. <?= $nomor ?>?</label>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-outline-dark" data-bs-dismiss="modal">Batal</button>
                        <a href="hapus_data_berita.php?id=<?= $berita['id']; ?>"><button class="btn btn-dark" type="button">Hapus</button></a>
                      </div>
                    </div>
                  </div>
                </div>
              </td>
            </tr>
            <!-- Jalankan statement increment untuk variabel nomor -->
            <?php $nomor++ ?>
          <?php endforeach; ?>
        </tbody>
      </table>
    <!-- Kondisi jika array_berita kosong -->
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