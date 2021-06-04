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

    mysqli_query($koneksi, $query0);
    
    if(mysqli_num_rows(mysqli_query($koneksi, $query0)) == 0) {
      $query000 = "CREATE PROCEDURE tambah_daftar_individu(
        IN nama_anggota varchar(50),
        IN domisili_anggota varchar(100),
        IN tanggal_lahir_anggota date,
        IN alamat_anggota varchar(100),
        IN no_ktp_anggota varchar(25),
        IN no_telp_anggota varchar(50),
        IN cabang_anggota varchar(50),
        IN invoice_anggota varchar(100)
      )
      BEGIN
        INSERT INTO daftar_individu (nama, domisili, tanggal_lahir, alamat, no_ktp, no_telp, cabang, invoice)
        VALUES (nama_anggota, domisili_anggota, tanggal_lahir_anggota, alamat_anggota, no_ktp_anggota, no_telp_anggota, cabang_anggota, invoice_anggota);
      END";

      mysqli_query($koneksi, $query000) or die('Procedure Gagal Dibuat');
    }

    $query_last_id = query("SELECT MAX(id) as id FROM daftar_individu")[0];
    $last_id = str_pad((int)$query_last_id['id']+1, 5, '0', STR_PAD_LEFT);
    $invoice = "INV/".date('d/m/Y')."/".$last_id;

    mysqli_query($koneksi,"SET autocommit = OFF");
    mysqli_query($koneksi,"START TRANSACTION");
    $query = "CALL tambah_daftar_individu('$nama', '$domisili', '$tanggal_lahir', '$alamat', '$no_ktp', '$no_telp', '$cabang', '$invoice')";

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

    $query0 = "SELECT 1 FROM mysql.proc p WHERE db = 'psm' AND name = 'tambah_daftar_institusi'";

    mysqli_query($koneksi, $query0);
    
    if(mysqli_num_rows(mysqli_query($koneksi, $query0)) == 0) {
      $query000 = "CREATE PROCEDURE tambah_daftar_institusi(
        IN nama_anggota varchar(50),
        IN jumlah_anggota varchar(100),
        IN alamat_anggota varchar(100),
        IN no_telp_anggota varchar(50),
        IN cabang_anggota varchar(50)
      )
      BEGIN
        INSERT INTO daftar_institusi (nama, jumlah, alamat, no_telp, cabang)
        VALUES (nama_anggota, jumlah_anggota, alamat_anggota, no_telp_anggota, cabang_anggota);
      END";

      mysqli_query($koneksi, $query000) or die('Procedure Gagal Dibuat');
    }

    mysqli_query($koneksi,"SET autocommit = OFF");
    mysqli_query($koneksi,"START TRANSACTION");
    $query = "CALL tambah_daftar_institusi('$nama', $jumlah, '$alamat', '$no_telp', '$cabang')";

    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
  }

  function tambah_data_berita($post) {
    global $koneksi;
    $tgl = htmlspecialchars($post['tanggal']);
    $judul = htmlspecialchars($post['judul']);
    $teks = htmlspecialchars($post['teks']);
    $gambar = htmlspecialchars($post['gambar']);
    $penulis = htmlspecialchars($post['penulis']);
    $tanggal  = date("Y-m-d H-i-s",strtotime($tgl));

    $query = "INSERT INTO berita (tanggal, judul, teks, gambar, penulis) VALUES ('$tanggal', '$judul', '$teks', '$gambar', '$penulis')";

    mysqli_query($koneksi, $query);
    
    return mysqli_affected_rows($koneksi);
  }

  function ubah_data_berita($post) {
    global $koneksi;
    $id = $post['id'];
    $tgl = htmlspecialchars($post['tanggal']);
    $judul = htmlspecialchars($post['judul']);
    $teks = htmlspecialchars($post['teks']);
    $gambar = htmlspecialchars($post['gambar']);
    $penulis = htmlspecialchars($post['penulis']);
    $tanggal  = date("Y-m-d H-i-s",strtotime($tgl));

    $query = "UPDATE berita SET tanggal = '$tanggal', judul = '$judul', teks = '$teks', gambar = '$gambar', penulis = '$penulis' WHERE id = $id";

    mysqli_query($koneksi, $query);
    
    return mysqli_affected_rows($koneksi);
  }

  function ubah_data_pendaftar_individu($post) {
    global $koneksi;
    $id = $post['id'];
    $nama = htmlspecialchars($post['nama']);
    $domisili = htmlspecialchars($post['domisili']);
    $tgl_lahir = htmlspecialchars($post['tanggal_lahir']);
    $alamat = htmlspecialchars($post['alamat']);
    $no_ktp = htmlspecialchars($post['no_ktp']);
    $no_telp = htmlspecialchars($post['no_telp']);
    $cabang = htmlspecialchars($post['cabang']);
    $tanggal_lahir  = date("Y-m-d",strtotime($tgl_lahir));
    
    $query = "UPDATE daftar_individu SET nama = '$nama', domisili = '$domisili', tanggal_lahir = '$tanggal_lahir', alamat = '$alamat', no_ktp = '$no_ktp', no_telp = '$no_telp', cabang = '$cabang' WHERE id = $id";

    mysqli_query($koneksi, $query);
    
    return mysqli_affected_rows($koneksi);
  }

  function ubah_data_pendaftar_institusi($post) {
    global $koneksi;
    $id = $post['id'];
    $nama = htmlspecialchars($post['nama']);
    $jumlah = htmlspecialchars($post['jumlah']);
    $alamat = htmlspecialchars($post['alamat']);
    $no_telp = htmlspecialchars($post['no_telp']);
    $cabang = htmlspecialchars($post['cabang']);
    
    $query = "UPDATE daftar_institusi SET nama = '$nama', jumlah = $jumlah, alamat = '$alamat', no_telp = '$no_telp', cabang = '$cabang' WHERE id = $id";

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

  function hapus_data_berita($get) {
    global $koneksi;
    mysqli_query($koneksi, "DELETE FROM berita WHERE id = $get");
    
    return mysqli_affected_rows($koneksi);
  }

  function cari_data_individu($keyword) {
    $query = "SELECT *, jenis_cabang(cabang) as 'jenis_cabang' FROM daftar_individu WHERE nama LIKE '%$keyword%' OR cabang LIKE '%$keyword%'";
    return query($query);
  }

  function cari_data_institusi($keyword) {
    $query = "SELECT *, jenis_cabang(cabang) as 'jenis_cabang' FROM daftar_institusi WHERE nama LIKE '%$keyword%' OR cabang LIKE '%$keyword%'";
    return query($query);
  }

  function cari_log_individu($keyword) {
    $query = "SELECT * FROM log_daftar_individu WHERE waktu = '$keyword' OR id_pendaftar = '$keyword' OR status LIKE '%$keyword%'";
    return query($query);
  }
  
  function cari_log_institusi($keyword) {
    $query = "SELECT * FROM log_daftar_institusi WHERE waktu = '$keyword' OR id_pendaftar = '$keyword' OR status LIKE '%$keyword%'";
    return query($query);
  }

  function cari_data_cabang($keyword) {
    $query = "SELECT * FROM lokasi_cabang WHERE alamat LIKE '%$keyword%' OR latitude = '$keyword' OR longitude = '$keyword'";
    return query($query);
  }

  function cari_berita($keyword) {
    $query = "SELECT * FROM berita WHERE judul LIKE '%$keyword%' OR teks LIKE '%$keyword%' OR penulis LIKE '%$keyword%' ORDER BY tanggal DESC";
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
