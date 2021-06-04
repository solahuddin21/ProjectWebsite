-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 04, 2021 at 03:09 AM
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
CREATE DEFINER=`root`@`localhost` PROCEDURE `tambah_daftar_individu` (IN `nama_anggota` VARCHAR(50), IN `domisili_anggota` VARCHAR(100), IN `tanggal_lahir_anggota` DATE, IN `alamat_anggota` VARCHAR(100), IN `no_ktp_anggota` VARCHAR(25), IN `no_telp_anggota` VARCHAR(50), IN `cabang_anggota` VARCHAR(50), IN `invoice_anggota` VARCHAR(100))  BEGIN
          INSERT INTO daftar_individu (nama, domisili, tanggal_lahir, alamat, no_ktp, no_telp, cabang, invoice)
          VALUES (nama_anggota, domisili_anggota, tanggal_lahir_anggota, alamat_anggota, no_ktp_anggota, no_telp_anggota, cabang_anggota, invoice_anggota);
        END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `tambah_daftar_institusi` (IN `nama_anggota` VARCHAR(50), IN `jumlah_anggota` INT(9), IN `alamat_anggota` VARCHAR(100), IN `no_telp_anggota` VARCHAR(50), IN `cabang_anggota` VARCHAR(50))  BEGIN
          INSERT INTO daftar_institusi (nama, jumlah, alamat, no_telp, cabang)
          VALUES (nama_anggota, jumlah_anggota, alamat_anggota, no_telp_anggota, cabang_anggota);
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
(1, '2021-05-22 06:26:37', 'Lorem Ipsum', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolorem maxime magnam quidem perspiciatis error praesentium sapiente fugiat commodi officia nulla tenetur aut eos dignissimos aliquid ipsum assumenda, at distinctio perferendis, earum reiciendis magni minima unde inventore! Aliquam enim aspernatur magnam quasi amet, necessitatibus maxime laboriosam voluptate, ipsa illum odio aperiam, dolores nisi laborum sunt possimus! Commodi atque consectetur modi, doloribus repellendus distinctio suscipit quae deleniti ullam nam voluptatem quam! Commodi quos eius a, ea voluptatem aliquid! Inventore repellat quod voluptatum earum voluptate quaerat, nulla ab reprehenderit animi consectetur sapiente quisquam, excepturi porro est! Rerum laboriosam harum porro nihil numquam, consectetur alias quo, quas nostrum velit incidunt recusandae cupiditate assumenda accusantium!', 'https://source.unsplash.com/mqKKCsZgzXQ', 'Dadang'),
(2, '2021-05-22 23:43:30', 'Lorem Ipsum', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Odio ex culpa, sunt ea consectetur repudiandae veniam obcaecati assumenda, ullam, sit vel cum facilis libero similique facere aliquid tenetur deserunt? Cumque fugit, iste nemo asperiores repudiandae, provident laboriosam dolores facilis ratione, excepturi minus temporibus. Quo dolor ullam eaque fuga.', 'https://source.unsplash.com/SRFUTeEZ9bM', 'Sukaesih'),
(3, '2021-05-26 09:24:30', 'Lorem Ipsum', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Odio ex culpa, sunt ea consectetur repudiandae veniam obcaecati assumenda, ullam, sit vel cum facilis libero similique facere aliquid tenetur deserunt? Cumque fugit, iste nemo asperiores repudiandae, provident laboriosam dolores facilis ratione, excepturi minus temporibus. Quo dolor ullam eaque fuga.', 'https://source.unsplash.com/DgMotiPocGU', 'Sutarjo'),
(4, '2021-05-25 14:10:43', 'Lorem Ipsum', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolorem maxime magnam quidem perspiciatis error praesentium sapiente fugiat commodi officia nulla tenetur aut eos dignissimos aliquid ipsum assumenda, at distinctio perferendis, earum reiciendis magni minima unde inventore! Aliquam enim aspernatur magnam quasi amet, necessitatibus maxime laboriosam voluptate, ipsa illum odio aperiam, dolores nisi laborum sunt possimus! Commodi atque consectetur modi, doloribus repellendus distinctio suscipit quae deleniti ullam nam voluptatem quam! Commodi quos eius a, ea voluptatem aliquid! Inventore repellat quod voluptatum earum voluptate quaerat, nulla ab reprehenderit animi consectetur sapiente quisquam, excepturi porro est! Rerum laboriosam harum porro nihil numquam, consectetur alias quo, quas nostrum velit incidunt recusandae cupiditate assumenda accusantium!', 'https://source.unsplash.com/Md449nTVCXk', 'Ujang'),
(5, '2021-05-24 11:00:56', 'Lorem Ipsum', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolorem maxime magnam quidem perspiciatis error praesentium sapiente fugiat commodi officia nulla tenetur aut eos dignissimos aliquid ipsum assumenda, at distinctio perferendis, earum reiciendis magni minima unde inventore! Aliquam enim aspernatur magnam quasi amet, necessitatibus maxime laboriosam voluptate, ipsa illum odio aperiam, dolores nisi laborum sunt possimus! Commodi atque consectetur modi, doloribus repellendus distinctio suscipit quae deleniti ullam nam voluptatem quam! Commodi quos eius a, ea voluptatem aliquid! Inventore repellat quod voluptatum earum voluptate quaerat, nulla ab reprehenderit animi consectetur sapiente quisquam, excepturi porro est! Rerum laboriosam harum porro nihil numquam, consectetur alias quo, quas nostrum velit incidunt recusandae cupiditate assumenda accusantium!', 'https://source.unsplash.com/kH3Me4NkjjI', 'Sutanto'),
(6, '2021-05-21 21:51:49', 'Lorem Ipsum', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolorem maxime magnam quidem perspiciatis error praesentium sapiente fugiat commodi officia nulla tenetur aut eos dignissimos aliquid ipsum assumenda, at distinctio perferendis, earum reiciendis magni minima unde inventore! Aliquam enim aspernatur magnam quasi amet, necessitatibus maxime laboriosam voluptate, ipsa illum odio aperiam, dolores nisi laborum sunt possimus! Commodi atque consectetur modi, doloribus repellendus distinctio suscipit quae deleniti ullam nam voluptatem quam! Commodi quos eius a, ea voluptatem aliquid! Inventore repellat quod voluptatum earum voluptate quaerat, nulla ab reprehenderit animi consectetur sapiente quisquam, excepturi porro est! Rerum laboriosam harum porro nihil numquam, consectetur alias quo, quas nostrum velit incidunt recusandae cupiditate assumenda accusantium!', 'https://source.unsplash.com/sab37qbGmHc', 'Julyansyah'),
(7, '2021-05-26 03:14:23', 'Lorem Ipsum', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolorem maxime magnam quidem perspiciatis error praesentium sapiente fugiat commodi officia nulla tenetur aut eos dignissimos aliquid ipsum assumenda, at distinctio perferendis, earum reiciendis magni minima unde inventore! Aliquam enim aspernatur magnam quasi amet, necessitatibus maxime laboriosam voluptate, ipsa illum odio aperiam, dolores nisi laborum sunt possimus! Commodi atque consectetur modi, doloribus repellendus distinctio suscipit quae deleniti ullam nam voluptatem quam! Commodi quos eius a, ea voluptatem aliquid! Inventore repellat quod voluptatum earum voluptate quaerat, nulla ab reprehenderit animi consectetur sapiente quisquam, excepturi porro est! Rerum laboriosam harum porro nihil numquam, consectetur alias quo, quas nostrum velit incidunt recusandae cupiditate assumenda accusantium!', 'https://source.unsplash.com/w29-TNxFaGg', 'Encep'),
(8, '2021-05-26 11:28:28', 'Lorem Ipsum', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolorem maxime magnam quidem perspiciatis error praesentium sapiente fugiat commodi officia nulla tenetur aut eos dignissimos aliquid ipsum assumenda, at distinctio perferendis, earum reiciendis magni minima unde inventore! Aliquam enim aspernatur magnam quasi amet, necessitatibus maxime laboriosam voluptate, ipsa illum odio aperiam, dolores nisi laborum sunt possimus! Commodi atque consectetur modi, doloribus repellendus distinctio suscipit quae deleniti ullam nam voluptatem quam! Commodi quos eius a, ea voluptatem aliquid! Inventore repellat quod voluptatum earum voluptate quaerat, nulla ab reprehenderit animi consectetur sapiente quisquam, excepturi porro est! Rerum laboriosam harum porro nihil numquam, consectetur alias quo, quas nostrum velit incidunt recusandae cupiditate assumenda accusantium!', 'https://source.unsplash.com/Th0kRmcOyiY', 'Jaelani'),
(9, '2021-05-22 04:48:09', 'Lorem Ipsum', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolorem maxime magnam quidem perspiciatis error praesentium sapiente fugiat commodi officia nulla tenetur aut eos dignissimos aliquid ipsum assumenda, at distinctio perferendis, earum reiciendis magni minima unde inventore! Aliquam enim aspernatur magnam quasi amet, necessitatibus maxime laboriosam voluptate, ipsa illum odio aperiam, dolores nisi laborum sunt possimus! Commodi atque consectetur modi, doloribus repellendus distinctio suscipit quae deleniti ullam nam voluptatem quam! Commodi quos eius a, ea voluptatem aliquid! Inventore repellat quod voluptatum earum voluptate quaerat, nulla ab reprehenderit animi consectetur sapiente quisquam, excepturi porro est! Rerum laboriosam harum porro nihil numquam, consectetur alias quo, quas nostrum velit incidunt recusandae cupiditate assumenda accusantium!', 'https://source.unsplash.com/DE2VQvh2_H8', 'Joni');

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
  `cabang` varchar(50) NOT NULL,
  `invoice` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `daftar_individu`
--

INSERT INTO `daftar_individu` (`id`, `nama`, `domisili`, `tanggal_lahir`, `alamat`, `no_ktp`, `no_telp`, `cabang`, `invoice`) VALUES
(1, 'Derry Dwi Aditya', 'Bandung', '2001-06-08', 'Jl. Cikawao', '327896541236', '081236547887', 'Jakarta', 'INV/04/06/2021/00001'),
(2, 'Athoillah Sholahudin', 'Jakarta', '2000-06-09', 'Jl. Cigondewah', '327856985214', '081236547887', 'Jakarta', 'INV/04/06/2021/00002'),
(3, 'Bagus Julyawan', 'Bandung', '2001-06-30', 'Jl. Cisaranten', '327856548745', '081236547887', 'Makassar', 'INV/04/06/2021/00003'),
(4, 'Encep Surencep', 'Bogor', '2001-06-02', 'Jl. Cimahi', '327896541258', '081546987557', 'Medan', 'INV/04/06/2021/00004'),
(5, 'Dadang', 'Sulawesi', '2000-05-10', 'Jl. Cibereum', '327852654124', '081236549223', 'Makassar', 'INV/04/06/2021/00005'),
(6, 'Jajang', 'Jakarta', '2001-06-07', 'Jl. Emong', '327852459587', '081236547887', 'Jakarta', 'INV/04/06/2021/00006');

--
-- Triggers `daftar_individu`
--
DELIMITER $$
CREATE TRIGGER `log_delete_daftar_individu` AFTER DELETE ON `daftar_individu` FOR EACH ROW begin
insert into log_daftar_individu (waktu, status, id_pendaftar, nama_lama, domisili_lama, tanggal_lahir_lama, alamat_lama, no_ktp_lama, no_telp_lama, cabang_lama) values (CURRENT_TIMESTAMP(), 'Delete Data Pendaftar', old.id, old.nama, old.domisili, old.tanggal_lahir, old.alamat, old.no_ktp, old.no_telp, old.cabang);
end
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `log_insert_daftar_individu` AFTER INSERT ON `daftar_individu` FOR EACH ROW begin
insert into log_daftar_individu (waktu, status, id_pendaftar, nama, domisili, tanggal_lahir, alamat, no_ktp, no_telp, cabang) values (CURRENT_TIMESTAMP(), 'Insert Data Pendaftar', new.id, new.nama, new.domisili, new.tanggal_lahir, new.alamat, new.no_ktp, new.no_telp, new.cabang);
end
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `log_update_daftar_individu` BEFORE UPDATE ON `daftar_individu` FOR EACH ROW begin
insert into log_daftar_individu (waktu, status, id_pendaftar, nama, domisili, tanggal_lahir, alamat, no_ktp, no_telp, cabang, nama_lama, domisili_lama, tanggal_lahir_lama, alamat_lama, no_ktp_lama, no_telp_lama, cabang_lama) values (CURRENT_TIMESTAMP(), 'Update Data Pendaftar', new.id, new.nama, new.domisili, new.tanggal_lahir, new.alamat, new.no_ktp, new.no_telp, new.cabang, old.nama, old.domisili, old.tanggal_lahir, old.alamat, old.no_ktp, old.no_telp, old.cabang);
end
$$
DELIMITER ;

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
(1, 'Universitas Pendidikan Indonesia', 200, 'Jl. Setiabudi', '081256457887', 'Jakarta'),
(2, 'Institut Teknologi Bandung', 82, 'Jl. Ganesa', '081254689889', 'Makassar'),
(3, 'Universitas Padjajaran', 188, 'Jl. Raya Jatinangor', '081564981220', 'Medan');

--
-- Triggers `daftar_institusi`
--
DELIMITER $$
CREATE TRIGGER `log_delete_daftar_institusi` AFTER DELETE ON `daftar_institusi` FOR EACH ROW begin
insert into log_daftar_institusi (waktu, status, id_pendaftar, nama_lama, jumlah_lama, alamat_lama, no_telp_lama, cabang_lama) values (CURRENT_TIMESTAMP(), 'Delete Data Pendaftar', old.id, old.nama, old.jumlah, old.alamat, old.no_telp, old.cabang);
end
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `log_insert_daftar_institusi` AFTER INSERT ON `daftar_institusi` FOR EACH ROW begin
insert into log_daftar_institusi (waktu, status, id_pendaftar, nama, jumlah, alamat, no_telp, cabang) values (CURRENT_TIMESTAMP(), 'Insert Data Pendaftar', new.id, new.nama, new.jumlah, new.alamat, new.no_telp, new.cabang);
end
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `log_update_daftar_institusi` BEFORE UPDATE ON `daftar_institusi` FOR EACH ROW begin
insert into log_daftar_institusi (waktu, status, id_pendaftar, nama, jumlah, alamat, no_telp, cabang, nama_lama, jumlah_lama, alamat_lama, no_telp_lama, cabang_lama) values (CURRENT_TIMESTAMP(), 'Update Data Pendaftar', new.id, new.nama, new.jumlah, new.alamat, new.no_telp, new.cabang, old.nama, old.jumlah, old.alamat, old.no_telp, old.cabang);
end
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `log_daftar_individu`
--

CREATE TABLE `log_daftar_individu` (
  `id` int(9) NOT NULL,
  `waktu` datetime NOT NULL,
  `status` varchar(200) NOT NULL,
  `id_pendaftar` int(9) NOT NULL,
  `nama` varchar(50) NOT NULL DEFAULT '-',
  `domisili` varchar(100) NOT NULL DEFAULT '-',
  `tanggal_lahir` date NOT NULL,
  `alamat` varchar(100) NOT NULL DEFAULT '-',
  `no_ktp` varchar(25) NOT NULL DEFAULT '-',
  `no_telp` varchar(50) NOT NULL DEFAULT '-',
  `cabang` varchar(50) NOT NULL DEFAULT '-',
  `nama_lama` varchar(50) NOT NULL DEFAULT '-',
  `domisili_lama` varchar(100) NOT NULL DEFAULT '-',
  `tanggal_lahir_lama` date NOT NULL,
  `alamat_lama` varchar(100) NOT NULL DEFAULT '-',
  `no_ktp_lama` varchar(25) NOT NULL DEFAULT '-',
  `no_telp_lama` varchar(50) NOT NULL DEFAULT '-',
  `cabang_lama` varchar(50) NOT NULL DEFAULT '-'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `log_daftar_individu`
--

INSERT INTO `log_daftar_individu` (`id`, `waktu`, `status`, `id_pendaftar`, `nama`, `domisili`, `tanggal_lahir`, `alamat`, `no_ktp`, `no_telp`, `cabang`, `nama_lama`, `domisili_lama`, `tanggal_lahir_lama`, `alamat_lama`, `no_ktp_lama`, `no_telp_lama`, `cabang_lama`) VALUES
(1, '2021-06-04 07:57:16', 'Insert Data Pendaftar', 1, 'Derry Dwi Aditya', 'Bandung', '2001-06-08', 'Jl. Cikawao', '327896541236', '081236547887', 'Jakarta', '-', '-', '0000-00-00', '-', '-', '-', '-'),
(2, '2021-06-04 07:58:19', 'Insert Data Pendaftar', 2, 'Athoillah Sholahudin', 'Jakarta', '2000-06-09', 'Jl. Cigondewah', '327856985214', '081236547887', 'Jakarta', '-', '-', '0000-00-00', '-', '-', '-', '-'),
(3, '2021-06-04 07:58:57', 'Insert Data Pendaftar', 3, 'Bagus Julyawan', 'Bandung', '2001-06-30', 'Jl. Cisaranten', '327856548745', '081236547887', 'Makassar', '-', '-', '0000-00-00', '-', '-', '-', '-'),
(4, '2021-06-04 07:59:54', 'Insert Data Pendaftar', 4, 'Encep', 'Cilacap', '2001-06-02', 'Jl. Cikoneng', '327896541258', '081236549221', 'Makassar', '-', '-', '0000-00-00', '-', '-', '-', '-'),
(5, '2021-06-04 08:01:07', 'Insert Data Pendaftar', 5, 'Dadang', 'Sulawesi', '2000-05-10', 'Jl. Cibereum', '327852654124', '081236549223', 'Makassar', '-', '-', '0000-00-00', '-', '-', '-', '-'),
(6, '2021-06-04 08:02:33', 'Update Data Pendaftar', 4, 'Encep Surencep', 'Bogor', '2001-06-02', 'Jl. Cimahi', '327896541258', '081546987557', 'Medan', 'Encep', 'Cilacap', '2001-06-02', 'Jl. Cikoneng', '327896541258', '081236549221', 'Makassar'),
(7, '2021-06-04 08:04:09', 'Insert Data Pendaftar', 6, 'Jajang', 'Jakarta', '2001-06-07', 'Jl. Emong', '327852459587', '081236547887', 'Jakarta', '-', '-', '0000-00-00', '-', '-', '-', '-'),
(8, '2021-06-04 08:05:19', 'Insert Data Pendaftar', 7, 'Maman', 'Kalimantan', '2002-06-07', 'Jl. Cilaki', '327852136549', '081236548778', 'Medan', '-', '-', '0000-00-00', '-', '-', '-', '-'),
(9, '2021-06-04 08:05:31', 'Delete Data Pendaftar', 7, '-', '-', '0000-00-00', '-', '-', '-', '-', 'Maman', 'Kalimantan', '2002-06-07', 'Jl. Cilaki', '327852136549', '081236548778', 'Medan');

-- --------------------------------------------------------

--
-- Table structure for table `log_daftar_institusi`
--

CREATE TABLE `log_daftar_institusi` (
  `id` int(9) NOT NULL,
  `waktu` datetime NOT NULL DEFAULT current_timestamp(),
  `status` varchar(200) NOT NULL,
  `id_pendaftar` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jumlah` int(9) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `no_telp` varchar(50) NOT NULL,
  `cabang` varchar(50) NOT NULL,
  `nama_lama` varchar(100) NOT NULL,
  `jumlah_lama` int(9) NOT NULL,
  `alamat_lama` varchar(100) NOT NULL,
  `no_telp_lama` varchar(50) NOT NULL,
  `cabang_lama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `log_daftar_institusi`
--

INSERT INTO `log_daftar_institusi` (`id`, `waktu`, `status`, `id_pendaftar`, `nama`, `jumlah`, `alamat`, `no_telp`, `cabang`, `nama_lama`, `jumlah_lama`, `alamat_lama`, `no_telp_lama`, `cabang_lama`) VALUES
(1, '2021-06-04 08:06:21', 'Insert Data Pendaftar', 1, 'Universitas Pendidikan Indonesia', 200, 'Jl. Setiabudi', '081256457887', 'Jakarta', '', 0, '', '', ''),
(2, '2021-06-04 08:06:55', 'Insert Data Pendaftar', 2, 'Institut Teknologi Bandung', 82, 'Jl. Ganesa', '081254689889', 'Makassar', '', 0, '', '', ''),
(3, '2021-06-04 08:07:21', 'Insert Data Pendaftar', 3, 'Universitas Padjajaran', 68, 'Jl. Raya Jatinangor', '081564981220', 'Medan', '', 0, '', '', ''),
(4, '2021-06-04 08:08:17', 'Update Data Pendaftar', 3, 'Universitas Padjajaran', 188, 'Jl. Raya Jatinangor', '081564981220', 'Medan', 'Universitas Padjajaran', 68, 'Jl. Raya Jatinangor', '081564981220', 'Medan'),
(5, '2021-06-04 08:08:48', 'Insert Data Pendaftar', 4, 'Universitas Pertanian Bogor', 10, 'Jl. Raya Dramaga', '081256487996', 'Makassar', '', 0, '', '', ''),
(6, '2021-06-04 08:08:57', 'Delete Data Pendaftar', 4, '', 0, '', '', '', 'Universitas Pertanian Bogor', 10, 'Jl. Raya Dramaga', '081256487996', 'Makassar');

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
-- Indexes for table `log_daftar_individu`
--
ALTER TABLE `log_daftar_individu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `log_daftar_institusi`
--
ALTER TABLE `log_daftar_institusi`
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
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `daftar_individu`
--
ALTER TABLE `daftar_individu`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `daftar_institusi`
--
ALTER TABLE `daftar_institusi`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `log_daftar_individu`
--
ALTER TABLE `log_daftar_individu`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `log_daftar_institusi`
--
ALTER TABLE `log_daftar_institusi`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `lokasi_cabang`
--
ALTER TABLE `lokasi_cabang`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
