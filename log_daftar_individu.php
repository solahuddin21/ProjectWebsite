<?php
include 'cek_cookie.php';

if (empty($_SESSION['username']) and empty($_SESSION['status'])) {
  header('location:forbidden.php');
  exit;
}

$pendaftar_individu = query("SELECT id, waktu, status, id_pendaftar FROM log_daftar_individu");

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

  <h1 class="text-center my-3">Log Data Pendaftar Individu</h1>
  <section class="container">
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
          <?php $nomor = 1 ?>
          <?php foreach ($pendaftar_individu as $individu) : ?>
            <tr>
              <td><?= $nomor ?></td>
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
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script> <!-- Footer -->
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