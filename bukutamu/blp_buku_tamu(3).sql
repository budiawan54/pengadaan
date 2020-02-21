-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 13, 2017 at 11:29 AM
-- Server version: 5.7.18-0ubuntu0.16.04.1
-- PHP Version: 7.0.18-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blp_buku_tamu`
--

-- --------------------------------------------------------

--
-- Table structure for table `jabatan_sistem`
--

CREATE TABLE `jabatan_sistem` (
  `Id_Jabatan_Sistem` int(11) NOT NULL,
  `Slug_Jabatan` varchar(20) NOT NULL,
  `Nama_Jabatan` varchar(40) NOT NULL,
  `urutan` int(11) NOT NULL,
  `status` tinyint(4) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jabatan_sistem`
--

INSERT INTO `jabatan_sistem` (`Id_Jabatan_Sistem`, `Slug_Jabatan`, `Nama_Jabatan`, `urutan`, `status`) VALUES
(1, 'fo', 'Front Office', 3, 1),
(2, 'ksb_ren', 'Kasubag Perencanaan Pengadaan', 4, 1),
(3, 'kabag_peng', 'Kabag Pelayanan Pengadaan', 5, 1),
(4, 'ksb_pel', 'Kepala Sub Bagian Pelelangan', 6, 1),
(5, 'pokja', 'Ketua Pokja', 7, 1),
(6, 'ppk', 'PPK SKPD', 2, 1),
(7, 'admin', 'Administrator', 1, 0),
(8, 'monev', 'Kasubag monev', 9, 1),
(9, 'kabag', 'Kepala Bagian', 10, 1),
(10, 'anggota_pokja', 'Anggota Pokja', 8, 1);

-- --------------------------------------------------------

--
-- Table structure for table `kepuasan`
--

CREATE TABLE `kepuasan` (
  `id_kepuasan` int(11) NOT NULL,
  `rating` int(11) DEFAULT NULL,
  `isi_respon` varchar(500) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kepuasan`
--

INSERT INTO `kepuasan` (`id_kepuasan`, `rating`, `isi_respon`, `created_at`) VALUES
(2, 4, 'asdfasdf', '2017-07-12 21:34:11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jabatan_sistem`
--
ALTER TABLE `jabatan_sistem`
  ADD PRIMARY KEY (`Id_Jabatan_Sistem`);

--
-- Indexes for table `kepuasan`
--
ALTER TABLE `kepuasan`
  ADD PRIMARY KEY (`id_kepuasan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jabatan_sistem`
--
ALTER TABLE `jabatan_sistem`
  MODIFY `Id_Jabatan_Sistem` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `kepuasan`
--
ALTER TABLE `kepuasan`
  MODIFY `id_kepuasan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
