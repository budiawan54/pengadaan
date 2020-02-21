-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 07, 2017 at 10:52 AM
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
-- Table structure for table `buku_tamu`
--

CREATE TABLE `buku_tamu` (
  `id_buku_tamu` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `nip_noktp` varchar(100) NOT NULL,
  `instansi` varchar(255) NOT NULL,
  `no_telp` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `unit_tujuan` varchar(10) NOT NULL,
  `keperluan` text NOT NULL,
  `no_urut` int(11) NOT NULL,
  `kode` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL DEFAULT 'mengantri',
  `catatan` text,
  `foto` text,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `jabatan_sistem`
--

CREATE TABLE `jabatan_sistem` (
  `Id_Jabatan_Sistem` int(11) NOT NULL,
  `Slug_Jabatan` varchar(20) NOT NULL,
  `Nama_Jabatan` varchar(40) NOT NULL,
  `urutan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jabatan_sistem`
--

INSERT INTO `jabatan_sistem` (`Id_Jabatan_Sistem`, `Slug_Jabatan`, `Nama_Jabatan`, `urutan`) VALUES
(1, 'fo', 'Front Office', 3),
(2, 'ksb_ren', 'Kasubag Perencanaan Pelelangan', 4),
(3, 'kabag_peng', 'Kabag Pelayanan Pengadaan', 5),
(4, 'ksb_pel', 'Kepala Sub Bagian Pelelangan', 6),
(5, 'pokja', 'Ketua Pokja', 7),
(6, 'ppk', 'PPK SKPD', 2),
(7, 'admin', 'Administrator', 1),
(8, 'monev', 'Kasubag monev', 9),
(9, 'kabag', 'Kepala Bagian', 10),
(10, 'anggota_pokja', 'Anggota Pokja', 8);

-- --------------------------------------------------------

--
-- Table structure for table `kepuasan`
--

CREATE TABLE `kepuasan` (
  `id_kepuasan` int(11) NOT NULL,
  `status` enum('up','down') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `Id_User` int(11) NOT NULL,
  `Nama_Lengkap` varchar(255) NOT NULL,
  `Username` varchar(100) NOT NULL,
  `Password` varchar(300) NOT NULL,
  `NIP_User` varchar(25) DEFAULT NULL,
  `No_Ktp` varchar(30) DEFAULT NULL,
  `No_Hp_User` varchar(18) DEFAULT NULL,
  `Jabatan_User` varchar(100) DEFAULT NULL,
  `Slug_Jabatan` varchar(20) NOT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `No_WA` varchar(100) DEFAULT NULL,
  `No_Telegram` varchar(100) DEFAULT NULL,
  `Master_Skpd_Id` int(11) DEFAULT NULL,
  `IsActive` tinyint(4) NOT NULL DEFAULT '1',
  `Last_Login` timestamp NULL DEFAULT NULL,
  `Last_Logout` timestamp NULL DEFAULT NULL,
  `Surat_tugas` varchar(255) DEFAULT NULL,
  `Created_At` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Updated_At` timestamp NULL DEFAULT NULL,
  `Deleted_At` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`Id_User`, `Nama_Lengkap`, `Username`, `Password`, `NIP_User`, `No_Ktp`, `No_Hp_User`, `Jabatan_User`, `Slug_Jabatan`, `Email`, `No_WA`, `No_Telegram`, `Master_Skpd_Id`, `IsActive`, `Last_Login`, `Last_Logout`, `Surat_tugas`, `Created_At`, `Updated_At`, `Deleted_At`) VALUES
(13, 'Ir Made Budhi Setiawan', 'kabag_peng', 'e811236d0ae3ccf0f5ff7bb566d9d0f608d4f984', '19600406 198803 1 ', '', '', NULL, 'kabag_peng', '', '', '', NULL, 1, '2017-03-20 02:16:19', '2017-03-20 02:21:40', NULL, '2017-02-08 15:23:26', NULL, NULL),
(14, 'I MADE JANA, SH', 'ppk', '5eb99db5f140d9a26c6cf6927c08d25b00f4cbf7', '1315051043', '', '087762171181', NULL, 'ppk', 'adisparta11@gmail.com', NULL, NULL, 1, 1, '2017-05-09 04:32:59', '2017-04-11 04:26:10', NULL, '2017-02-08 15:24:55', NULL, NULL),
(15, 'I WAYAN MERTAYASA, SE. MM', 'fo', '19082866d46a5a57bfeffe585d8362c149676c90', '1313123123', '', '0892380918023', NULL, 'fo', 'adisparta11@gmail.com', NULL, NULL, NULL, 1, '2017-07-05 04:56:04', '2017-07-04 17:00:17', NULL, '2017-02-08 15:25:05', NULL, NULL),
(16, 'I Ketut Arka Punarbawa', 'ksb_ren', '84d6b8a275f5b600b4d1554aa11ad39f86a13129', NULL, '', NULL, NULL, 'ksb_ren', NULL, NULL, NULL, NULL, 1, '2017-05-07 03:00:31', '2017-03-20 02:11:17', NULL, '2017-02-08 15:25:25', NULL, NULL),
(17, 'Desak Putu Juniati, S.Kom', 'ksb_pel', 'c9d068dee55df890339b7b23ee2baf48fe98b993', NULL, '', NULL, NULL, 'ksb_pel', NULL, NULL, NULL, NULL, 1, '2017-03-20 02:11:32', '2017-03-20 02:16:11', NULL, '2017-02-08 15:25:37', NULL, NULL),
(18, 'I Made Widyasmara', 'pokja', '5d3e6424edff880ff26a001b79cb5022998f8cfb', NULL, '', NULL, NULL, 'pokja', NULL, NULL, NULL, NULL, 1, '2017-04-10 18:14:44', '2017-04-10 18:18:53', NULL, '2017-02-08 15:25:54', NULL, NULL),
(19, 'Coba Admin', 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', '', '', '', NULL, 'admin', '', '', '', NULL, 1, '2017-07-04 17:00:22', '2017-05-09 01:15:54', NULL, '2017-03-07 13:50:15', NULL, NULL),
(20, 'I Wayan ', 'fo_123', 'b3e8ff7ac1c7e75661e16152a5dce1ff36a3e140', '28370923', '', '234234', NULL, 'fo', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2017-03-07 15:59:34', NULL, NULL),
(21, 'I Wayan Adi Sparta', 'nasi', 'b3e8ff7ac1c7e75661e16152a5dce1ff36a3e140', '12312312312', '', '0877127918233', NULL, 'ppk', 'adisparta.dev@gmail.com', '80918390123', '456476365', 1, 1, NULL, NULL, '732353502_035a5b49214ff26ee537acd406be9ff56612bbee.png', '2017-03-17 15:23:53', NULL, NULL),
(22, 'Monevv', 'monev', '346d80c57cd221187c40ae4b3b20ae88fc4bd1dd', '12123123', '', '324124', NULL, 'monev', 'asdf@gmail.com', '234124', '', 0, 1, '2017-04-10 18:19:01', '2017-03-20 03:47:42', '1480940239_82f0c2d7885d084182b3aa9e3f07e36858507e84.png', '2017-03-17 17:22:07', NULL, NULL),
(23, 'I Wayan Kabag', 'kabag', 'b54fd43e8359974ab70cb8c8c927f6c5003ebfe6', '2341234', '1234', '1234', NULL, 'kabag', '', '', '', 0, 1, '2017-05-23 01:08:43', '2017-05-23 01:12:04', '2022683427_82f0c2d7885d084182b3aa9e3f07e36858507e84.png', '2017-03-18 03:54:23', NULL, NULL),
(24, 'I Wayan Anggota Pokja 1', 'anggota_pokja1', '74711f60b25696b180f5cb2b465e4815b2d7c51d', '829234', 'aSDF', 'ASDF', NULL, 'anggota_pokja', 'adisparta.dev@gmail.com', '', '', 0, 1, '2017-04-10 18:07:10', '2017-04-10 18:08:13', '879455590_66aa982c60532a8e8dc87a42020f50b013b23d82.pdf', '2017-03-20 14:23:10', NULL, NULL),
(25, 'adi sparta', 'adi', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '12380913', '', '', NULL, 'fo', '', '', '', NULL, 0, NULL, NULL, NULL, '2017-05-09 13:10:29', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buku_tamu`
--
ALTER TABLE `buku_tamu`
  ADD PRIMARY KEY (`id_buku_tamu`);

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
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`Id_User`),
  ADD UNIQUE KEY `Username` (`Username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buku_tamu`
--
ALTER TABLE `buku_tamu`
  MODIFY `id_buku_tamu` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `jabatan_sistem`
--
ALTER TABLE `jabatan_sistem`
  MODIFY `Id_Jabatan_Sistem` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `kepuasan`
--
ALTER TABLE `kepuasan`
  MODIFY `id_kepuasan` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `Id_User` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
