-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 24, 2021 at 01:10 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `psm`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `tambah_daftar_individu` (IN `nama_anggota` VARCHAR(50), IN `domisili_anggota` VARCHAR(100), IN `tanggal_lahir_anggota` DATE, IN `alamat_anggota` VARCHAR(100), IN `no_ktp_anggota` VARCHAR(25), IN `no_telp_anggota` VARCHAR(50), IN `cabang_anggota` VARCHAR(50))  BEGIN
        INSERT INTO daftar_individu (nama, domisili, tanggal_lahir, alamat, no_ktp, no_telp, cabang) VALUES (nama_anggota, domisili_anggota, tanggal_lahir_anggota, alamat_anggota, no_ktp_anggota, no_telp_anggota, cabang_anggota);
      END$$

--
-- Functions
--
CREATE DEFINER=`root`@`localhost` FUNCTION `jenis_cabang` (`jeniss_cabang` VARCHAR(50)) RETURNS VARCHAR(100) CHARSET utf8mb4 begin
declare jenis varchar(100);
if (jeniss_cabang = "Jakarta") then
set jenis = "Pusat";
else
set jenis = "Cabang";
end if;
return (jenis);
end$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `no_telp` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `no_telp`) VALUES
(1, 'admin', 'admin', '081325467221');

-- --------------------------------------------------------

--
-- Table structure for table `berita`
--

CREATE TABLE `berita` (
  `id` int(9) NOT NULL,
  `tanggal` datetime NOT NULL,
  `judul` varchar(100) NOT NULL,
  `teks` text NOT NULL,
  `gambar` varchar(200) NOT NULL,
  `penulis` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `berita`
--

INSERT INTO `berita` (`id`, `tanggal`, `judul`, `teks`, `gambar`, `penulis`) VALUES
(1, '2021-05-22 10:11:10', 'Berita Satu', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolorem maxime magnam quidem perspiciatis error praesentium sapiente fugiat commodi officia nulla tenetur aut eos dignissimos aliquid ipsum assumenda, at distinctio perferendis, earum reiciendis magni minima unde inventore! Aliquam enim aspernatur magnam quasi amet, necessitatibus maxime laboriosam voluptate, ipsa illum odio aperiam, dolores nisi laborum sunt possimus! Commodi atque consectetur modi, doloribus repellendus distinctio suscipit quae deleniti ullam nam voluptatem quam! Commodi quos eius a, ea voluptatem aliquid! Inventore repellat quod voluptatum earum voluptate quaerat, nulla ab reprehenderit animi consectetur sapiente quisquam, excepturi porro est! Rerum laboriosam harum porro nihil numquam, consectetur alias quo, quas nostrum velit incidunt recusandae cupiditate assumenda accusantium!', 'https://source.unsplash.com/mqKKCsZgzXQ', 'Dadang'),
(2, '2021-05-22 17:08:11', 'Berita Dua', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Odio ex culpa, sunt ea consectetur repudiandae veniam obcaecati assumenda, ullam, sit vel cum facilis libero similique facere aliquid tenetur deserunt? Cumque fugit, iste nemo asperiores repudiandae, provident laboriosam dolores facilis ratione, excepturi minus temporibus. Quo dolor ullam eaque fuga.', 'https://source.unsplash.com/SRFUTeEZ9bM', 'Sukaesih'),
(3, '2021-05-26 07:25:29', 'Berita Tiga', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Odio ex culpa, sunt ea consectetur repudiandae veniam obcaecati assumenda, ullam, sit vel cum facilis libero similique facere aliquid tenetur deserunt? Cumque fugit, iste nemo asperiores repudiandae, provident laboriosam dolores facilis ratione, excepturi minus temporibus. Quo dolor ullam eaque fuga.', 'https://source.unsplash.com/DgMotiPocGU', 'Sutarjo');

-- --------------------------------------------------------

--
-- Table structure for table `daftar_individu`
--

CREATE TABLE `daftar_individu` (
  `id` int(9) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `domisili` varchar(100) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `no_ktp` varchar(25) NOT NULL,
  `no_telp` varchar(50) NOT NULL,
  `cabang` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `daftar_individu`
--

INSERT INTO `daftar_individu` (`id`, `nama`, `domisili`, `tanggal_lahir`, `alamat`, `no_ktp`, `no_telp`, `cabang`) VALUES
(1, 'Derry Dwi Aditya', 'Bandung', '2001-08-05', 'Jl. Cikawao', '123456789123', '081232457778', 'Medan'),
(2, 'Bagus Julyawan', 'Bandung', '2000-05-24', 'Jl. Ciburial', '987654321987', '082135467887', 'Makassar'),
(4, 'Athoillah Sholahuddin', 'Jakarta', '2001-05-02', 'Jl. Cinambo', '123456789654', '082135467887', 'Jakarta'),
(22, 'Dadang Konelo', 'Bandung', '2021-05-18', 'Jl. Cibeunying', '123456789852', '0821356467887', 'Jakarta');

-- --------------------------------------------------------

--
-- Table structure for table `daftar_institusi`
--

CREATE TABLE `daftar_institusi` (
  `id` int(9) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jumlah` int(9) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `no_telp` varchar(50) NOT NULL,
  `cabang` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `daftar_institusi`
--

INSERT INTO `daftar_institusi` (`id`, `nama`, `jumlah`, `alamat`, `no_telp`, `cabang`) VALUES
(1, 'Universitas Pendidikan Indonesia', 10, 'Jl. Setiabudi', '081245687997', 'Jakarta'),
(2, 'Institut Teknologi Bandung', 180, 'Jl. Ganesa', '081235467887', 'Makassar'),
(6, 'Universitas Pertanian Bogor', 10, 'Jl. Raya Dramaga', '081325467887', 'Jakarta'),
(7, 'Universitas Padjajaran', 77, 'Jl. Raya Jatinangor', '081213497221', 'Medan');

-- --------------------------------------------------------

--
-- Table structure for table `lokasi_cabang`
--

CREATE TABLE `lokasi_cabang` (
  `id` int(9) NOT NULL,
  `latitude` varchar(100) NOT NULL,
  `longitude` varchar(100) NOT NULL,
  `alamat` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lokasi_cabang`
--

INSERT INTO `lokasi_cabang` (`id`, `latitude`, `longitude`, `alamat`) VALUES
(1, '-6.112566', '106.928340', 'Gg. Elang VI No.17, RT.7, Semper Tim., Kec. Cilincing, Kota Jkt Utara, Daerah Khusus Ibukota Jakarta 14130'),
(2, '-6.497641', '106.828224', 'Jl. Raya Tegar Beriman Pemda Cibinong No. 27 A-B, RT. 01 RW. 04, Kampung Pondok Manggis, Bojong Baru, Bojong Gede, Pakansari, Cibinong, Bogor, Jawa Barat 16914'),
(3, '-6.178306', '106.631889', 'Jl. Cendana, RT 02 RW 06, Pemukiman Salembaran, RT.002/RW.006, Sukasari, Kec. Tangerang, Kota Tangerang, Banten 15214'),
(4, '-3.972201', '122.5149', 'Jl. H. Abdul Silondae, Korumba, Kec. Mandonga, Kota Kendari, Sulawesi Tenggara 93111'),
(5, '-6.966667', '110.416664', 'Jl. Darat Tempel, Dadapsari, Kec. Semarang Utara, Kota Semarang, Jawa Tengah 50173'),
(6, '-2.423779', '115.250832', 'Jl. Patmaraga, Kebun Sari, Amuntai Tengah, Kabupaten Hulu Sungai Utara, Kalimantan Selatan 71414'),
(7, '1.045626', '104.030457', 'Jl. Letjend Suprapto, Kabil, Kec. Sei Beduk, Kota Batam, Kepulauan Riau 29433'),
(8, '-3.316694', '114.590111', 'Jl. S. Parman, Antasan Besar, Kec. Banjarmasin Tengah, Kota Banjarmasin, Kalimantan Selatan 70123'),
(9, '-6.12', '106.150276', 'Gg. Term. Husein Makun, Serang, Kec. Serang, Kota Serang, Banten 42116');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `daftar_individu`
--
ALTER TABLE `daftar_individu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `daftar_institusi`
--
ALTER TABLE `daftar_institusi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lokasi_cabang`
--
ALTER TABLE `lokasi_cabang`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `berita`
--
ALTER TABLE `berita`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `daftar_individu`
--
ALTER TABLE `daftar_individu`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `daftar_institusi`
--
ALTER TABLE `daftar_institusi`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `lokasi_cabang`
--
ALTER TABLE `lokasi_cabang`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
