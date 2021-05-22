-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 22, 2021 at 08:06 AM
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

DELIMITER ;

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
(4, 'Athoillah Sholahuddin', 'Jakarta', '2001-05-02', 'Jl. Cinambo', '123456789654', '082135467887', 'Jakarta');

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
(1, 'Universitas Pendidikan Indonesia', 52, 'Jl. Setiabudi', '081245687997', 'Jakarta'),
(2, 'Institut Teknologi Bandung', 180, 'Jl. Ganesa', '081235467887', 'Makassar');

--
-- Indexes for dumped tables
--

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `berita`
--
ALTER TABLE `berita`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `daftar_individu`
--
ALTER TABLE `daftar_individu`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `daftar_institusi`
--
ALTER TABLE `daftar_institusi`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
