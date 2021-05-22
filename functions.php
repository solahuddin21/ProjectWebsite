<?php
  $namaServer = "localhost";
  $user = "root";
  $password = "";
  $database = "psm";

  $koneksi = mysqli_connect($namaServer, $user, $password, $database) or die ("Koneksi Gagal");

  function query($query) {
    global $koneksi;
    $result = mysqli_query($koneksi, $query);
    $rows = [];
    while($row = mysqli_fetch_assoc($result)) {
      $rows[] = $row;
    }
    return $rows;
  }

  function tambah_individu($post) {
    global $koneksi;
    $nama = htmlspecialchars($post['nama']);
    $domisili = htmlspecialchars($post['domisili']);
    $tgl_lahir = htmlspecialchars($post['tanggal_lahir']);
    $alamat = htmlspecialchars($post['alamat']);
    $no_ktp = htmlspecialchars($post['no_ktp']);
    $no_telp = htmlspecialchars($post['no_telp']);
    $cabang = htmlspecialchars($post['cabang']);
    $tanggal_lahir  = date("Y-m-d",strtotime($tgl_lahir));

    $query0 = "SELECT 1 FROM mysql.proc p WHERE db = 'psm' AND name = 'tambah_daftar_individu'";

    mysqli_query($koneksi, $query0) or die('nol salah');
    
    if(mysqli_num_rows(mysqli_query($koneksi, $query0)) == 0) {
      $query000 = "CREATE PROCEDURE tambah_daftar_individu(
        IN nama_anggota varchar(50),
        IN domisili_anggota varchar(100),
        IN tanggal_lahir_anggota date,
        IN alamat_anggota varchar(100),
        IN no_ktp_anggota varchar(25),
        IN no_telp_anggota varchar(50),
        IN cabang_anggota varchar(50)
      )
      BEGIN
        INSERT INTO daftar_individu (nama, domisili, tanggal_lahir, alamat, no_ktp, no_telp, cabang)
        VALUES (nama_anggota, domisili_anggota, tanggal_lahir_anggota, alamat_anggota, no_ktp_anggota, no_telp_anggota, cabang_anggota);
      END";

      mysqli_query($koneksi, $query000) or die('Procedure Gagal Dibuat');
    }

    $query = "CALL tambah_daftar_individu('$nama', '$domisili', '$tanggal_lahir', '$alamat', '$no_ktp', '$no_telp', '$cabang')";

    mysqli_query($koneksi, $query) or die('Tambah Data Dengan Procedure Gagal');

    return mysqli_affected_rows($koneksi);
  }

  function tambah_institusi($post) {
    global $koneksi;
    $nama = htmlspecialchars($post['nama']);
    $jumlah = htmlspecialchars($post['jumlah']);
    $alamat = htmlspecialchars($post['alamat']);
    $no_telp = htmlspecialchars($post['no_telp']);
    $cabang = htmlspecialchars($post['cabang']);

    $query = "INSERT INTO daftar_institusi (nama, jumlah, alamat, no_telp, cabang) VALUES ('$nama', $jumlah, '$alamat', '$no_telp', '$cabang')";

    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
  }

  function hapus_individu($get) {
    global $koneksi;
    mysqli_query($koneksi, "DELETE FROM daftar_individu WHERE id = $get");
    
    return mysqli_affected_rows($koneksi);
  }

  function hapus_institusi($get) {
    global $koneksi;
    mysqli_query($koneksi, "DELETE FROM daftar_institusi WHERE id = $get");
    
    return mysqli_affected_rows($koneksi);
  }

  function cari_data_individu($keyword) {
    $query = "SELECT * FROM daftar_individu WHERE nama LIKE '%$keyword%' OR cabang LIKE '%$keyword%'";
    return query($query);
  }

  function cari_data_institusi($keyword) {
    $query = "SELECT * FROM daftar_institusi WHERE nama LIKE '%$keyword%' OR cabang LIKE '%$keyword%'";
    return query($query);
  }

  function time_elapsed_string($datetime, $full = false) {
    ini_set('date.timezone', 'Asia/Jakarta');
    $now = new DateTime;
    $ago = new DateTime($datetime);
    $diff = $now->diff($ago);

    $diff->w = floor($diff->d / 7);
    $diff->d -= $diff->w * 7;

    $string = array(
      'y' => 'Tahun',
      'm' => 'Bulan',
      'w' => 'Minggu',
      'd' => 'Hari',
      'h' => 'Jam',
      'i' => 'Menit',
      's' => 'Detik',
    );
    foreach ($string as $k => &$v) {
      if ($diff->$k) {
        $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? '' : '');
      } else {
        unset($string[$k]);
      }
    }

    if (!$full) $string = array_slice($string, 0, 1);
    return $string ? implode(', ', $string) . ' yang lalu' : 'Baru saja';
  }
?>