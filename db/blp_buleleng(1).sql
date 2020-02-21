-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 19, 2018 at 07:26 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `blp_buleleng`
--

-- --------------------------------------------------------

--
-- Table structure for table `jabatan_sistem`
--

CREATE TABLE IF NOT EXISTS `jabatan_sistem` (
`Id_Jabatan_Sistem` int(11) NOT NULL,
  `Slug_Jabatan` varchar(20) NOT NULL,
  `Nama_Jabatan` varchar(40) NOT NULL,
  `urutan` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jabatan_sistem`
--

INSERT INTO `jabatan_sistem` (`Id_Jabatan_Sistem`, `Slug_Jabatan`, `Nama_Jabatan`, `urutan`) VALUES
(1, 'fo', 'Front Office', 3),
(2, 'ksb_ren', 'Kasubag Perencanaan Pengadaan', 4),
(3, 'kabag_peng', 'Kabag Pelayanan Pengadaan', 5),
(4, 'ksb_pel', 'Kepala Sub Bagian Pelelangan', 6),
(5, 'pokja', 'Ketua Pokja', 7),
(6, 'ppk', 'PPK OPD', 2),
(7, 'admin', 'Administrator', 1),
(8, 'monev', 'Kasubag monev', 9),
(9, 'kabag', 'Kepala Bagian', 10),
(10, 'anggota_pokja', 'Anggota Pokja', 8);

-- --------------------------------------------------------

--
-- Table structure for table `kelengkapan`
--

CREATE TABLE IF NOT EXISTS `kelengkapan` (
`Id_Kelengkapan` int(11) NOT NULL,
  `Deskripsi` varchar(255) NOT NULL,
  `Is_Required` tinyint(4) NOT NULL,
  `Tipe` varchar(30) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kelengkapan`
--

INSERT INTO `kelengkapan` (`Id_Kelengkapan`, `Deskripsi`, `Is_Required`, `Tipe`) VALUES
(1, 'Surat Permintaan Lelang dari OPD (Nama, PPK, NIP, Kode Rekening)', 1, 'pdf'),
(2, 'HPS (Harga Perkiraan Sendiri)', 1, 'xls, xlsx'),
(3, 'Cetak RUP dari website SIRUP', 1, 'pdf, jpg, png'),
(4, 'Kak (Keterangan Acuan Kerja)', 1, 'doc, docx, pdf'),
(5, 'BQ (Daftar Kuantitas)', 1, 'xls, xlsx'),
(6, 'Spesifikasi Teknis', 1, 'doc, docx'),
(7, 'Gambar', 0, 'pdf'),
(8, 'Rancangan Kontrak', 1, 'doc, docx'),
(9, 'Syarat-syarat umum Kontrak', 1, 'doc, docx'),
(10, 'Syarat-syarat khusus Kontrak', 1, 'doc, docx'),
(11, 'Data pendukung lain', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `log_activity`
--

CREATE TABLE IF NOT EXISTS `log_activity` (
`id_log` int(11) NOT NULL,
  `Id_User` int(11) NOT NULL,
  `Ip_Address` varchar(20) DEFAULT NULL,
  `Kegiatan` varchar(150) NOT NULL,
  `Created_At` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=242 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `log_activity`
--

INSERT INTO `log_activity` (`id_log`, `Id_User`, `Ip_Address`, `Kegiatan`, `Created_At`) VALUES
(1, 214, '::1', 'Login ke sistem', '2018-11-14 00:27:31'),
(2, 214, '::1', 'Logout dari sistem', '2018-11-14 00:40:37'),
(3, 212, '::1', 'Login ke sistem', '2018-11-14 00:40:57'),
(4, 212, '::1', 'Login ke sistem', '2018-11-14 12:06:05'),
(5, 212, '::1', 'Logout dari sistem', '2018-11-14 12:06:34'),
(6, 214, '::1', 'Login ke sistem', '2018-11-14 12:06:36'),
(7, 214, '::1', 'Masuk ke halaman profil', '2018-11-14 12:06:40'),
(8, 214, '::1', 'Mengedit profil user', '2018-11-14 12:07:33'),
(9, 214, '::1', 'Masuk ke halaman profil', '2018-11-14 12:07:33'),
(10, 214, '::1', 'Logout dari sistem', '2018-11-14 12:16:15'),
(11, 214, '::1', 'Login ke sistem', '2018-11-15 00:08:19'),
(12, 214, '::1', 'Masuk ke halaman tambah pengajuan', '2018-11-15 00:08:25'),
(13, 214, '::1', 'Mengajukan pengadaan baru dengan pin <a href="http://localhost/eproc/home/pengajuan_pin/5becba4517">5becba4517</a>', '2018-11-15 00:13:57'),
(14, 214, '::1', 'Membuka halaman detail pengajuan dengan pin <a href="http://localhost/eproc/home/pengajuan_pin/5becba4517">5becba4517</a>', '2018-11-15 00:14:31'),
(15, 214, '::1', 'Membuka halaman daftar pengajuan', '2018-11-15 00:15:01'),
(16, 214, '::1', 'Membuka halaman daftar pengajuan', '2018-11-15 00:15:12'),
(17, 214, '::1', 'Masuk ke halaman tambah pengajuan', '2018-11-15 00:15:16'),
(18, 214, '::1', 'Membuka halaman daftar pengajuan', '2018-11-15 00:15:18'),
(19, 214, '::1', 'Logout dari sistem', '2018-11-15 00:15:25'),
(20, 215, '::1', 'Login ke sistem', '2018-11-15 00:15:46'),
(21, 215, '::1', 'Melihat detail pengajuan dengan pin <a href="http://localhost/eproc/home/pengajuan_pin/5becba4517">5becba4517</a>', '2018-11-15 00:16:01'),
(22, 215, '::1', 'Memverifikasi kelengkapan pengajuan pin 5becba4517', '2018-11-15 00:16:15'),
(23, 215, '::1', 'Melihat halaman daftar pengajuan', '2018-11-15 00:16:38'),
(24, 215, '::1', 'Melihat detail pengajuan dengan pin <a href="http://localhost/eproc/home/pengajuan_pin/5becba4517">5becba4517</a>', '2018-11-15 00:16:49'),
(25, 215, '::1', 'Melihat detail pengajuan dengan pin <a href="http://localhost/eproc/home/pengajuan_pin/5becba4517">5becba4517</a>', '2018-11-15 00:16:57'),
(26, 215, '::1', 'Melihat detail pengajuan dengan pin <a href="http://localhost/eproc/home/pengajuan_pin/5becba4517">5becba4517</a>', '2018-11-15 00:17:04'),
(27, 215, '::1', 'Melihat halaman daftar pengajuan', '2018-11-15 00:17:08'),
(28, 215, '::1', 'Melihat halaman daftar pengajuan', '2018-11-15 00:17:20'),
(29, 215, '::1', 'Melihat halaman daftar pengajuan', '2018-11-15 00:17:28'),
(30, 215, '::1', 'Melihat halaman daftar pengajuan', '2018-11-15 00:19:49'),
(31, 215, '::1', 'Logout dari sistem', '2018-11-15 00:21:31'),
(32, 216, '::1', 'Login ke sistem', '2018-11-15 00:22:15'),
(33, 216, '::1', 'Melihat detail pengajuan dengan pin <a href="http://localhost/eproc/home/pengajuan_pin/5becba4517">5becba4517</a>', '2018-11-15 00:22:22'),
(34, 216, '::1', 'Mencetak catatan pengajuan dengan pin <a href="http://localhost/eproc/home/pengajuan_pin/5becba4517">5becba4517</a>', '2018-11-15 00:22:28'),
(35, 216, '::1', 'Mencetak catatan pengajuan dengan pin <a href="http://localhost/eproc/home/pengajuan_pin/5becba4517">5becba4517</a>', '2018-11-15 00:22:34'),
(36, 216, '::1', 'Mencetak catatan pengajuan dengan pin <a href="http://localhost/eproc/home/pengajuan_pin/5becba4517">5becba4517</a>', '2018-11-15 00:22:34'),
(37, 216, '::1', 'Mencetak catatan pengajuan dengan pin <a href="http://localhost/eproc/home/pengajuan_pin/5becba4517">5becba4517</a>', '2018-11-15 00:22:35'),
(38, 216, '::1', 'Memverifikasi kelengkapan pengajuan dengan pin <a href="http://localhost/eproc/home/pengajuan_pin/5becba4517">5becba4517</a>', '2018-11-15 00:23:04'),
(39, 216, '::1', 'Melihat halaman daftar pengajuan', '2018-11-15 00:23:16'),
(40, 216, '::1', 'Melihat detail pengajuan dengan pin <a href="http://localhost/eproc/home/pengajuan_pin/5becba4517">5becba4517</a>', '2018-11-15 00:23:23'),
(41, 216, '::1', 'Logout dari sistem', '2018-11-15 00:23:30'),
(42, 218, '::1', 'Login ke sistem', '2018-11-15 00:23:42'),
(43, 218, '::1', 'Melihat detail pengajuan dengan pin <a href="http://localhost/eproc/home/pengajuan_pin/5becba4517">5becba4517</a>', '2018-11-15 00:23:47'),
(44, 212, '::1', 'Login ke sistem', '2018-11-15 00:24:32'),
(45, 212, '::1', 'Logout dari sistem', '2018-11-15 00:26:36'),
(46, 219, '::1', 'Login ke sistem', '2018-11-15 00:26:46'),
(47, 219, '::1', 'Masuk ke halaman profil', '2018-11-15 00:26:52'),
(48, 219, '::1', 'Masuk ke halaman profil', '2018-11-15 00:27:04'),
(49, 218, '::1', 'Mengusulkan pengajuan dengan pin <a href="http://localhost/eproc/home/pengajuan_pin/"></a> ke Kabag Pelayanan Pengadaan', '2018-11-15 00:27:19'),
(50, 219, '::1', 'Logout dari sistem', '2018-11-15 00:27:29'),
(51, 218, '::1', 'Melihat halaman daftar pengajuan', '2018-11-15 00:27:31'),
(52, 212, '::1', 'Login ke sistem', '2018-11-15 00:27:38'),
(53, 218, '::1', 'Logout dari sistem', '2018-11-15 00:27:52'),
(54, 217, '::1', 'Login ke sistem', '2018-11-15 00:27:57'),
(55, 217, '::1', 'Melihat detail pengajuan dengan pin 5becba4517', '2018-11-15 00:28:02'),
(56, 217, '::1', 'Melihat halaman daftar pengajuan', '2018-11-15 00:28:12'),
(57, 212, '::1', 'Masuk ke halaman profil', '2018-11-15 00:29:22'),
(58, 217, '::1', 'Logout dari sistem', '2018-11-15 00:34:09'),
(59, 221, '::1', 'Login ke sistem', '2018-11-15 00:35:01'),
(60, 221, '::1', 'Melihat detail pengajuan dengan pin <a href="http://localhost/eproc/home/pengajuan_pin/5becba4517">5becba4517</a>', '2018-11-15 00:35:11'),
(61, 221, '::1', 'Menyetujui pengajuan dan mengirim ke pokja dengan pin <a href="http://localhost/eproc/home/pengajuan_pin/5becba4517">5becba4517</a>', '2018-11-15 00:35:23'),
(62, 221, '::1', 'Melihat halaman daftar pengajuan', '2018-11-15 00:35:48'),
(63, 221, '::1', 'Logout dari sistem', '2018-11-15 00:35:56'),
(64, 213, '::1', 'Login ke sistem', '2018-11-15 00:36:04'),
(65, 213, '::1', 'Melihat detail pengajuan dengan pin <a href="http://localhost/eproc/home/pengajuan_pin/5becba4517">5becba4517</a>', '2018-11-15 00:36:07'),
(66, 213, '::1', 'Melihat detail pengajuan dengan pin <a href="http://localhost/eproc/home/pengajuan_pin/5becba4517">5becba4517</a>', '2018-11-15 00:41:15'),
(67, 213, '::1', 'Melihat detail pengajuan dengan pin <a href="http://localhost/eproc/home/pengajuan_pin/5becba4517">5becba4517</a>', '2018-11-15 00:54:44'),
(68, 213, '::1', 'Melihat detail pengajuan dengan pin <a href="http://localhost/eproc/home/pengajuan_pin/5becba4517">5becba4517</a>', '2018-11-15 01:06:32'),
(69, 213, '::1', 'Melihat detail pengajuan dengan pin <a href="http://localhost/eproc/home/pengajuan_pin/5becba4517">5becba4517</a>', '2018-11-15 01:14:23'),
(70, 213, '::1', 'Mengirim hasil lelang pengajuan dengan pin <a href="http://localhost/eproc/home/pengajuan_pin/5becba4517">5becba4517</a>', '2018-11-15 01:15:35'),
(71, 213, '::1', 'Melihat halaman daftar pengajuan', '2018-11-15 01:15:47'),
(72, 213, '::1', 'Melihat detail pengajuan dengan pin <a href="http://localhost/eproc/home/pengajuan_pin/5becba4517">5becba4517</a>', '2018-11-15 01:15:50'),
(73, 213, '::1', 'Logout dari sistem', '2018-11-15 01:16:04'),
(74, 220, '::1', 'Login ke sistem', '2018-11-15 01:16:12'),
(75, 220, '::1', 'Melihat detail pengajuan dengan pin 5becba4517', '2018-11-15 01:16:16'),
(76, 220, '::1', 'Mengirim pengajuan ke Kabag dengan pin 5becba4517', '2018-11-15 01:16:33'),
(77, 220, '::1', 'Melihat halaman daftar pengajuan', '2018-11-15 01:16:33'),
(78, 220, '::1', 'Melihat detail pengajuan dengan pin 5becba4517', '2018-11-15 01:16:42'),
(79, 220, '::1', 'Logout dari sistem', '2018-11-15 01:16:48'),
(80, 221, '::1', 'Login ke sistem', '2018-11-15 01:16:55'),
(81, 221, '::1', 'Melihat detail pengajuan dengan pin <a href="http://localhost/eproc/home/pengajuan_pin/5becba4517">5becba4517</a>', '2018-11-15 01:16:58'),
(82, 221, '::1', 'Mengirim pengajuan pengadaan ke PPK <a href="http://localhost/eproc/home/pengajuan_pin/5becba4517">5becba4517</a>', '2018-11-15 01:17:05'),
(83, 221, '::1', 'Melihat halaman daftar pengajuan', '2018-11-15 01:17:17'),
(84, 221, '::1', 'Logout dari sistem', '2018-11-15 01:17:28'),
(85, 214, '::1', 'Login ke sistem', '2018-11-15 01:17:30'),
(86, 214, '::1', 'Membuka halaman detail pengajuan dengan pin <a href="http://localhost/eproc/home/pengajuan_pin/5becba4517">5becba4517</a>', '2018-11-15 01:17:33'),
(87, 214, '::1', 'Membuka halaman daftar pengajuan', '2018-11-15 01:18:21'),
(88, 214, '::1', 'Membuka halaman detail pengajuan dengan pin <a href="http://localhost/eproc/home/pengajuan_pin/5becba4517">5becba4517</a>', '2018-11-15 01:18:46'),
(89, 214, '::1', 'Membuka halaman daftar pengajuan', '2018-11-15 01:18:49'),
(90, 214, '::1', 'Membuka halaman detail pengajuan dengan pin <a href="http://localhost/eproc/home/pengajuan_pin/5becba4517">5becba4517</a>', '2018-11-15 01:18:52'),
(91, 214, '::1', 'Logout dari sistem', '2018-11-15 01:51:10'),
(92, 214, '::1', 'Login ke sistem', '2018-11-15 03:22:54'),
(93, 214, '::1', 'Logout dari sistem', '2018-11-15 03:22:57'),
(94, 214, '::1', 'Login ke sistem', '2018-11-15 06:42:09'),
(95, 214, '::1', 'Membuka halaman detail pengajuan dengan pin <a href="http://localhost/eproc/home/pengajuan_pin/5becba4517">5becba4517</a>', '2018-11-15 06:42:15'),
(96, 214, '::1', 'Masuk ke halaman tambah pengajuan', '2018-11-15 06:47:42'),
(97, 214, '::1', 'Mengajukan pengadaan baru dengan pin <a href="http://localhost/eproc/home/pengajuan_pin/5bed17b39a">5bed17b39a</a>', '2018-11-15 06:52:35'),
(98, 214, '::1', 'Membuka halaman detail pengajuan dengan pin <a href="http://localhost/eproc/home/pengajuan_pin/5bed17b39a">5bed17b39a</a>', '2018-11-15 06:52:43'),
(99, 214, '::1', 'Logout dari sistem', '2018-11-15 06:52:48'),
(100, 215, '::1', 'Login ke sistem', '2018-11-15 06:52:57'),
(101, 215, '::1', 'Melihat detail pengajuan dengan pin <a href="http://localhost/eproc/home/pengajuan_pin/5bed17b39a">5bed17b39a</a>', '2018-11-15 06:53:07'),
(102, 215, '::1', 'Masuk ke halaman log activity', '2018-11-15 06:53:09'),
(103, 215, '::1', 'Melihat halaman daftar pengajuan', '2018-11-15 06:53:21'),
(104, 215, '::1', 'Melihat detail pengajuan dengan pin <a href="http://localhost/eproc/home/pengajuan_pin/5bed17b39a">5bed17b39a</a>', '2018-11-15 06:53:22'),
(105, 215, '::1', 'Memverifikasi kelengkapan pengajuan pin 5bed17b39a', '2018-11-15 06:53:34'),
(106, 215, '::1', 'Melihat halaman daftar pengajuan', '2018-11-15 06:53:39'),
(107, 215, '::1', 'Melihat detail pengajuan dengan pin <a href="http://localhost/eproc/home/pengajuan_pin/5bed17b39a">5bed17b39a</a>', '2018-11-15 06:54:03'),
(108, 215, '::1', 'Melihat halaman daftar pengajuan', '2018-11-15 06:54:07'),
(109, 215, '::1', 'Logout dari sistem', '2018-11-15 06:54:14'),
(110, 214, '::1', 'Login ke sistem', '2018-11-15 06:54:22'),
(111, 214, '::1', 'Logout dari sistem', '2018-11-15 06:55:07'),
(112, 216, '::1', 'Login ke sistem', '2018-11-15 06:57:41'),
(113, 216, '::1', 'Melihat detail pengajuan dengan pin <a href="http://localhost/eproc/home/pengajuan_pin/5bed17b39a">5bed17b39a</a>', '2018-11-15 06:57:44'),
(114, 216, '::1', 'Memverifikasi kelengkapan pengajuan dengan pin <a href="http://localhost/eproc/home/pengajuan_pin/5bed17b39a">5bed17b39a</a>', '2018-11-15 06:58:56'),
(115, 216, '::1', 'Melihat halaman daftar pengajuan', '2018-11-15 06:59:03'),
(116, 216, '::1', 'Logout dari sistem', '2018-11-15 06:59:16'),
(117, 218, '::1', 'Login ke sistem', '2018-11-15 06:59:48'),
(118, 218, '::1', 'Melihat detail pengajuan dengan pin <a href="http://localhost/eproc/home/pengajuan_pin/5bed17b39a">5bed17b39a</a>', '2018-11-15 06:59:52'),
(119, 218, '::1', 'Mengusulkan pengajuan dengan pin <a href="http://localhost/eproc/home/pengajuan_pin/"></a> ke Kabag Pelayanan Pengadaan', '2018-11-15 07:01:07'),
(120, 218, '::1', 'Melihat halaman daftar pengajuan', '2018-11-15 07:01:13'),
(121, 214, '::1', 'Login ke sistem', '2018-11-18 02:02:54'),
(122, 214, '::1', 'Masuk ke halaman tambah pengajuan', '2018-11-18 02:05:40'),
(123, 214, '::1', 'Membuka halaman daftar pengajuan', '2018-11-18 02:18:41'),
(124, 214, '::1', 'Membuka halaman daftar pengajuan', '2018-11-18 02:25:48'),
(125, 214, '::1', 'Logout dari sistem', '2018-11-18 02:26:17'),
(126, 212, '::1', 'Login ke sistem', '2018-11-18 02:27:00'),
(127, 212, '::1', 'Logout dari sistem', '2018-11-18 02:28:32'),
(128, 213, '::1', 'Login ke sistem', '2018-11-18 02:28:42'),
(129, 213, '::1', 'Melihat detail pengajuan dengan pin <a href="http://localhost/eproc/home/pengajuan_pin/5bed17b39a">5bed17b39a</a>', '2018-11-18 02:28:49'),
(130, 213, '::1', 'Melihat halaman daftar pengajuan', '2018-11-18 02:28:54'),
(131, 213, '::1', 'Logout dari sistem', '2018-11-18 02:31:08'),
(132, 221, '::1', 'Login ke sistem', '2018-11-18 02:31:35'),
(133, 221, '::1', 'Melihat detail pengajuan dengan pin <a href="http://localhost/eproc/home/pengajuan_pin/5bed17b39a">5bed17b39a</a>', '2018-11-18 02:31:39'),
(134, 221, '::1', 'Melihat detail pengajuan dengan pin <a href="http://localhost/eproc/home/pengajuan_pin/5bed17b39a">5bed17b39a</a>', '2018-11-18 02:31:57'),
(135, 221, '::1', 'Logout dari sistem', '2018-11-18 02:32:06'),
(136, 212, '::1', 'Login ke sistem', '2018-11-18 02:32:27'),
(137, 212, '::1', 'Logout dari sistem', '2018-11-18 02:34:10'),
(138, 221, '::1', 'Login ke sistem', '2018-11-18 02:34:21'),
(139, 221, '::1', 'Melihat detail pengajuan dengan pin <a href="http://localhost/eproc/home/pengajuan_pin/5bed17b39a">5bed17b39a</a>', '2018-11-18 02:34:24'),
(140, 221, '::1', 'Logout dari sistem', '2018-11-18 02:35:24'),
(141, 213, '::1', 'Login ke sistem', '2018-11-18 02:37:09'),
(142, 213, '::1', 'Melihat detail pengajuan dengan pin <a href="http://localhost/eproc/home/pengajuan_pin/5bed17b39a">5bed17b39a</a>', '2018-11-18 02:37:13'),
(143, 213, '::1', 'Logout dari sistem', '2018-11-18 02:40:19'),
(144, 221, '::1', 'Login ke sistem', '2018-11-18 02:40:33'),
(145, 221, '::1', 'Melihat detail pengajuan dengan pin <a href="http://localhost/eproc/home/pengajuan_pin/5bed17b39a">5bed17b39a</a>', '2018-11-18 02:40:36'),
(146, 221, '::1', 'Melihat detail pengajuan dengan pin <a href="http://localhost/eproc/home/pengajuan_pin/5bed17b39a">5bed17b39a</a>', '2018-11-18 02:40:44'),
(147, 221, '::1', 'Melihat detail pengajuan dengan pin <a href="http://localhost/eproc/home/pengajuan_pin/5bed17b39a">5bed17b39a</a>', '2018-11-18 02:40:57'),
(148, 221, '::1', 'Melihat detail pengajuan dengan pin <a href="http://localhost/eproc/home/pengajuan_pin/5bed17b39a">5bed17b39a</a>', '2018-11-18 02:41:14'),
(149, 221, '::1', 'Menyetujui pengajuan dan mengirim ke pokja dengan pin <a href="http://localhost/eproc/home/pengajuan_pin/5bed17b39a">5bed17b39a</a>', '2018-11-18 02:41:23'),
(150, 221, '::1', 'Melihat halaman daftar pengajuan', '2018-11-18 02:41:33'),
(151, 221, '::1', 'Logout dari sistem', '2018-11-18 02:41:49'),
(152, 213, '::1', 'Login ke sistem', '2018-11-18 02:41:59'),
(153, 213, '::1', 'Melihat detail pengajuan dengan pin <a href="http://localhost/eproc/home/pengajuan_pin/5bed17b39a">5bed17b39a</a>', '2018-11-18 02:42:04'),
(154, 213, '::1', 'Melihat detail pengajuan dengan pin <a href="http://localhost/eproc/home/pengajuan_pin/5bed17b39a">5bed17b39a</a>', '2018-11-18 02:43:13'),
(155, 213, '::1', 'Melihat detail pengajuan dengan pin <a href="http://localhost/eproc/home/pengajuan_pin/5bed17b39a">5bed17b39a</a>', '2018-11-18 02:47:15'),
(156, 213, '::1', 'Melihat detail pengajuan dengan pin <a href="http://localhost/eproc/home/pengajuan_pin/5bed17b39a">5bed17b39a</a>', '2018-11-18 03:01:59'),
(157, 213, '::1', 'Melihat detail pengajuan dengan pin <a href="http://localhost/eproc/home/pengajuan_pin/5bed17b39a">5bed17b39a</a>', '2018-11-18 03:04:47'),
(158, 213, '::1', 'Melihat detail pengajuan dengan pin <a href="http://localhost/eproc/home/pengajuan_pin/5bed17b39a">5bed17b39a</a>', '2018-11-18 03:04:51'),
(159, 213, '::1', 'Melihat detail pengajuan dengan pin <a href="http://localhost/eproc/home/pengajuan_pin/5bed17b39a">5bed17b39a</a>', '2018-11-18 03:11:02'),
(160, 213, '::1', 'Logout dari sistem', '2018-11-18 03:15:06'),
(161, 223, '::1', 'Login ke sistem', '2018-11-18 03:15:16'),
(162, 223, '::1', 'Melihat detail pengajuan dengan pin <a href="http://localhost/eproc/home/pengajuan_pin/5bed17b39a">5bed17b39a</a>', '2018-11-18 03:15:28'),
(163, 223, '::1', 'Melihat detail pengajuan dengan pin <a href="http://localhost/eproc/home/pengajuan_pin/5bed17b39a">5bed17b39a</a>', '2018-11-18 03:23:12'),
(164, 223, '::1', 'Logout dari sistem', '2018-11-18 03:23:19'),
(165, 213, '::1', 'Login ke sistem', '2018-11-18 03:23:29'),
(166, 213, '::1', 'Melihat detail pengajuan dengan pin <a href="http://localhost/eproc/home/pengajuan_pin/5bed17b39a">5bed17b39a</a>', '2018-11-18 03:23:33'),
(167, 213, '::1', 'Melihat detail pengajuan dengan pin <a href="http://localhost/eproc/home/pengajuan_pin/5bed17b39a">5bed17b39a</a>', '2018-11-18 03:23:55'),
(168, 213, '::1', 'Melihat detail pengajuan dengan pin <a href="http://localhost/eproc/home/pengajuan_pin/5bed17b39a">5bed17b39a</a>', '2018-11-18 03:23:58'),
(169, 213, '::1', 'Melihat detail pengajuan dengan pin <a href="http://localhost/eproc/home/pengajuan_pin/5bed17b39a">5bed17b39a</a>', '2018-11-18 03:25:26'),
(170, 213, '::1', 'Melihat detail pengajuan dengan pin <a href="http://localhost/eproc/home/pengajuan_pin/5bed17b39a">5bed17b39a</a>', '2018-11-18 03:25:30'),
(171, 213, '::1', 'Melihat halaman daftar pengajuan', '2018-11-18 03:27:58'),
(172, 213, '::1', 'Melihat detail pengajuan dengan pin <a href="http://localhost/eproc/home/pengajuan_pin/5becba4517">5becba4517</a>', '2018-11-18 03:28:01'),
(173, 213, '::1', 'Mencetak catatan pengajuan dengan pin <a href="http://localhost/eproc/home/pengajuan_pin/5becba4517">5becba4517</a>', '2018-11-18 03:28:06'),
(174, 213, '::1', 'Mencetak catatan pengajuan dengan pin <a href="http://localhost/eproc/home/pengajuan_pin/5becba4517">5becba4517</a>', '2018-11-18 03:28:11'),
(175, 213, '::1', 'Mencetak catatan pengajuan dengan pin <a href="http://localhost/eproc/home/pengajuan_pin/5becba4517">5becba4517</a>', '2018-11-18 03:28:11'),
(176, 213, '::1', 'Mencetak catatan pengajuan dengan pin <a href="http://localhost/eproc/home/pengajuan_pin/5becba4517">5becba4517</a>', '2018-11-18 03:28:11'),
(177, 213, '::1', 'Melihat halaman daftar pengajuan', '2018-11-18 03:28:41'),
(178, 213, '::1', 'Melihat detail pengajuan dengan pin <a href="http://localhost/eproc/home/pengajuan_pin/5bed17b39a">5bed17b39a</a>', '2018-11-18 03:28:43'),
(179, 213, '::1', 'Melihat halaman daftar pengajuan', '2018-11-18 03:28:59'),
(180, 213, '::1', 'Melihat detail pengajuan dengan pin <a href="http://localhost/eproc/home/pengajuan_pin/5bed17b39a">5bed17b39a</a>', '2018-11-18 03:29:01'),
(181, 213, '::1', 'Melihat detail pengajuan dengan pin <a href="http://localhost/eproc/home/pengajuan_pin/5bed17b39a">5bed17b39a</a>', '2018-11-18 03:32:08'),
(182, 213, '::1', 'Melihat detail pengajuan dengan pin <a href="http://localhost/eproc/home/pengajuan_pin/5bed17b39a">5bed17b39a</a>', '2018-11-18 03:33:22'),
(183, 213, '::1', 'Logout dari sistem', '2018-11-18 03:33:34'),
(184, 214, '::1', 'Login ke sistem', '2018-11-18 03:33:36'),
(185, 214, '::1', 'Masuk ke halaman tambah pengajuan', '2018-11-18 03:34:31'),
(186, 214, '::1', 'Masuk ke halaman tambah pengajuan', '2018-11-18 03:34:45'),
(187, 214, '::1', 'Membuka halaman daftar pengajuan', '2018-11-18 03:34:53'),
(188, 214, '::1', 'Membuka halaman daftar pengajuan', '2018-11-18 03:36:25'),
(189, 214, '::1', 'Membuka halaman detail pengajuan dengan pin <a href="http://localhost/eproc/home/pengajuan_pin/5becba4517">5becba4517</a>', '2018-11-18 03:36:28'),
(190, 214, '::1', 'Logout dari sistem', '2018-11-18 03:36:37'),
(191, 213, '::1', 'Login ke sistem', '2018-11-18 03:36:45'),
(192, 213, '::1', 'Melihat detail pengajuan dengan pin <a href="http://localhost/eproc/home/pengajuan_pin/5bed17b39a">5bed17b39a</a>', '2018-11-18 03:36:49'),
(193, 213, '::1', 'Melihat detail pengajuan dengan pin <a href="http://localhost/eproc/home/pengajuan_pin/5bed17b39a">5bed17b39a</a>', '2018-11-18 03:37:50'),
(194, 213, '::1', 'Logout dari sistem', '2018-11-18 03:59:18'),
(195, 214, '::1', 'Login ke sistem', '2018-11-18 03:59:34'),
(196, 214, '::1', 'Masuk ke halaman tambah pengajuan', '2018-11-18 03:59:44'),
(197, 214, '::1', 'Masuk ke halaman tambah pengajuan', '2018-11-18 04:03:31'),
(198, 214, '::1', 'Logout dari sistem', '2018-11-18 04:09:41'),
(199, 213, '::1', 'Login ke sistem', '2018-11-18 04:10:04'),
(200, 213, '::1', 'Melihat detail pengajuan dengan pin <a href="http://localhost/eproc/home/pengajuan_pin/5bed17b39a">5bed17b39a</a>', '2018-11-18 04:10:40'),
(201, 213, '::1', 'Logout dari sistem', '2018-11-18 04:11:40'),
(202, 214, '::1', 'Login ke sistem', '2018-11-18 04:12:09'),
(203, 214, '::1', 'Masuk ke halaman tambah pengajuan', '2018-11-18 04:12:33'),
(204, 214, '::1', 'Mengajukan pengadaan baru dengan pin <a href="http://localhost/eproc/home/pengajuan_pin/5bf0e74f62">5bf0e74f62</a>', '2018-11-18 04:15:11'),
(205, 214, '::1', 'Membuka halaman detail pengajuan dengan pin <a href="http://localhost/eproc/home/pengajuan_pin/5bf0e74f62">5bf0e74f62</a>', '2018-11-18 04:15:20'),
(206, 214, '::1', 'Mencetak catatan pengajuan dengan pin <a href="http://localhost/eproc/home/pengajuan_pin/5bf0e74f62">5bf0e74f62</a>', '2018-11-18 04:15:25'),
(207, 214, '::1', 'Mencetak catatan pengajuan dengan pin <a href="http://localhost/eproc/home/pengajuan_pin/5bf0e74f62">5bf0e74f62</a>', '2018-11-18 04:15:25'),
(208, 214, '::1', 'Mencetak catatan pengajuan dengan pin <a href="http://localhost/eproc/home/pengajuan_pin/5bf0e74f62">5bf0e74f62</a>', '2018-11-18 04:15:26'),
(209, 214, '::1', 'Mencetak catatan pengajuan dengan pin <a href="http://localhost/eproc/home/pengajuan_pin/5bf0e74f62">5bf0e74f62</a>', '2018-11-18 04:15:26'),
(210, 214, '::1', 'Masuk ke halaman profil', '2018-11-18 04:15:31'),
(211, 214, '::1', 'Membuka halaman daftar pengajuan', '2018-11-18 04:15:56'),
(212, 214, '::1', 'Membuka halaman detail pengajuan dengan pin <a href="http://localhost/eproc/home/pengajuan_pin/5becba4517">5becba4517</a>', '2018-11-18 04:16:07'),
(213, 214, '::1', 'Membuka halaman daftar pengajuan', '2018-11-18 04:16:12'),
(214, 214, '::1', 'Logout dari sistem', '2018-11-18 04:16:17'),
(215, 215, '::1', 'Login ke sistem', '2018-11-18 04:16:25'),
(216, 215, '::1', 'Melihat detail pengajuan dengan pin <a href="http://localhost/eproc/home/pengajuan_pin/5bf0e74f62">5bf0e74f62</a>', '2018-11-18 04:16:28'),
(217, 215, '::1', 'Masuk ke halaman profil', '2018-11-18 04:16:31'),
(218, 215, '::1', 'Masuk ke halaman log activity', '2018-11-18 04:16:33'),
(219, 215, '::1', 'Melihat halaman daftar pengajuan', '2018-11-18 04:16:46'),
(220, 215, '::1', 'Melihat detail pengajuan dengan pin <a href="http://localhost/eproc/home/pengajuan_pin/5bf0e74f62">5bf0e74f62</a>', '2018-11-18 04:16:48'),
(221, 215, '::1', 'Memverifikasi kelengkapan pengajuan pin 5bf0e74f62', '2018-11-18 04:16:59'),
(222, 215, '::1', 'Melihat halaman daftar pengajuan', '2018-11-18 04:17:05'),
(223, 214, '127.0.0.1', 'Login ke sistem', '2018-11-18 23:56:03'),
(224, 214, '127.0.0.1', 'Masuk ke halaman tambah pengajuan', '2018-11-18 23:56:51'),
(225, 214, '127.0.0.1', 'Logout dari sistem', '2018-11-18 23:57:01'),
(226, 213, '127.0.0.1', 'Login ke sistem', '2018-11-18 23:57:10'),
(227, 213, '127.0.0.1', 'Melihat detail pengajuan dengan pin <a href="http://localhost/eproc/home/pengajuan_pin/5bed17b39a">5bed17b39a</a>', '2018-11-18 23:57:14'),
(228, 213, '127.0.0.1', 'Melihat detail pengajuan dengan pin <a href="http://localhost/eproc/home/pengajuan_pin/5bed17b39a">5bed17b39a</a>', '2018-11-19 00:11:56'),
(229, 213, '127.0.0.1', 'Melihat halaman daftar pengajuan', '2018-11-19 00:13:52'),
(230, 213, '127.0.0.1', 'Melihat detail pengajuan dengan pin <a href="http://localhost/eproc/home/pengajuan_pin/5bed17b39a">5bed17b39a</a>', '2018-11-19 00:13:59'),
(231, 213, '127.0.0.1', 'Melihat detail pengajuan dengan pin <a href="http://localhost/eproc/home/pengajuan_pin/5bed17b39a">5bed17b39a</a>', '2018-11-19 00:14:28'),
(232, 213, '127.0.0.1', 'Melihat detail pengajuan dengan pin <a href="http://localhost/eproc/home/pengajuan_pin/5bed17b39a">5bed17b39a</a>', '2018-11-19 00:15:46'),
(233, 213, '127.0.0.1', 'Melihat detail pengajuan dengan pin <a href="http://localhost/eproc/home/pengajuan_pin/5bed17b39a">5bed17b39a</a>', '2018-11-19 00:15:54'),
(234, 213, '127.0.0.1', 'Logout dari sistem', '2018-11-19 00:21:32'),
(235, 214, '127.0.0.1', 'Login ke sistem', '2018-11-19 00:21:35'),
(236, 214, '127.0.0.1', 'Masuk ke halaman tambah pengajuan', '2018-11-19 00:21:37'),
(237, 214, '127.0.0.1', 'Masuk ke halaman profil', '2018-11-19 00:21:44'),
(238, 214, '127.0.0.1', 'Membuka halaman daftar pengajuan', '2018-11-19 00:25:17'),
(239, 214, '127.0.0.1', 'Logout dari sistem', '2018-11-19 00:25:22'),
(240, 213, '127.0.0.1', 'Login ke sistem', '2018-11-19 00:25:30'),
(241, 213, '127.0.0.1', 'Melihat detail pengajuan dengan pin <a href="http://localhost/eproc/home/pengajuan_pin/5bed17b39a">5bed17b39a</a>', '2018-11-19 00:25:33');

-- --------------------------------------------------------

--
-- Table structure for table `master_skpd`
--

CREATE TABLE IF NOT EXISTS `master_skpd` (
`Master_Skpd_Id` int(11) NOT NULL,
  `Nama_Skpd` varchar(255) NOT NULL,
  `Alamat` text,
  `Email_Skpd` varchar(100) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `master_skpd`
--

INSERT INTO `master_skpd` (`Master_Skpd_Id`, `Nama_Skpd`, `Alamat`, `Email_Skpd`) VALUES
(3, 'DINAS ARSIP DAN PERPUSTAKAAN DAERAH ', '', ''),
(4, 'DINAS KETAHANAN PANGAN ', '', ''),
(6, 'DINAS STATISTIK ', '', ''),
(8, 'DINAS TENAGA KERJA ', '', ''),
(9, 'BADAN KESATUAN BANGSA DAN POLITIK ', '', ''),
(10, 'SEKRETARIAT DPRD ', '', ''),
(12, 'SATUAN POLISI PAMONG PRAJA ', '', ''),
(15, 'DINAS PEMADAM KEBAKARAN ', '', ''),
(16, 'INSPEKTORAT DAERAH ', '', ''),
(17, 'DINAS KOPERASI, USAHA KECIL DAN MENENGAH ', '', ''),
(18, 'DINAS SOSIAL ', '', ''),
(19, 'DINAS PENGENDALIAN PENDUDUK, KELUARGA BERENCANA, PEMBERDAYAAN PEREMPUAN DAN PERLINDUNGAN ANAK ', '', ''),
(20, 'DINAS KEPENDUDUKAN DAN PENCATATAN SIPIL ', '', ''),
(21, 'DINAS PENANAMAN MODAL DAN PELAYANAN PERIZINAN TERPADU SATU PINTU ', '', ''),
(22, 'DINAS PEMBERDAYAAN MASYARAKAT DAN DESA ', '', ''),
(24, 'BADAN KEPEGAWAIAN DAN PENGEMBANGAN SUMBER DAYA MANUSIA KABUPATEN ', '', ''),
(25, 'DINAS PERHUBUNGAN ', '', ''),
(26, 'BADAN PENANGGULANGAN BENCANA DAERAH ', '', ''),
(27, 'DINAS KOMUNIKASI, INFORMATIKA DAN PERSANDIAN ', '', ''),
(28, 'BADAN PERENCANAAN PEMBANGUNAN DAERAH, PENELITIAN DAN PENGEMBANGAN ', '', ''),
(29, 'DINAS PERIKANAN ', '', ''),
(30, 'DINAS PARIWISATA ', '', ''),
(31, 'DINAS LINGKUNGAN HIDUP ', '', ''),
(33, 'DINAS PERDAGANGAN DAN PERINDUSTRIAN ', '', ''),
(34, 'DINAS KEBUDAYAAN ', '', ''),
(35, 'BADAN KEUANGAN DAERAH ', '', ''),
(36, 'DINAS PERTANIAN ', '', ''),
(37, 'SEKRETARIAT DAERAH ', '', ''),
(38, 'DINAS PERUMAHAN, PERMUKIMAN DAN PERTANAHAN ', '', ''),
(39, 'DINAS KESEHATAN ', '', ''),
(40, 'RUMAH SAKIT UMUM DAERAH ', '', ''),
(41, 'DINAS PENDIDIKAN, PEMUDA DAN OLAH RAGA ', '', ''),
(42, 'DINAS PEKERJAAN UMUM DAN PENATAAN RUANG ', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `pengadaan_hasil_lelang`
--

CREATE TABLE IF NOT EXISTS `pengadaan_hasil_lelang` (
`Id_Lelang` int(11) NOT NULL,
  `Id_Pengajuan_Pengadaan` int(11) NOT NULL,
  `kd_lelang` int(11) NOT NULL,
  `Tanggal_Pengumuman` date NOT NULL,
  `Nilai_Penawaran_Hasil` varchar(255) NOT NULL,
  `NPWP` varchar(255) NOT NULL,
  `Metode_Pemilihan_Penyedia` varchar(255) NOT NULL,
  `Lelang_Ulang` tinyint(4) NOT NULL DEFAULT '0',
  `Lelang_Ulang_Ke` int(11) DEFAULT NULL,
  `Nama_Pemenang` varchar(255) DEFAULT NULL,
  `Alamat_Pemenang` varchar(255) DEFAULT NULL,
  `Tgl_Sppbj` date DEFAULT NULL,
  `Sisa_Anggaran` int(11) DEFAULT NULL,
  `Prosentase_HPS` varchar(20) DEFAULT NULL,
  `Jml_Pendaftar` int(11) DEFAULT NULL,
  `Jml_Penawar` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengadaan_hasil_lelang`
--

INSERT INTO `pengadaan_hasil_lelang` (`Id_Lelang`, `Id_Pengajuan_Pengadaan`, `kd_lelang`, `Tanggal_Pengumuman`, `Nilai_Penawaran_Hasil`, `NPWP`, `Metode_Pemilihan_Penyedia`, `Lelang_Ulang`, `Lelang_Ulang_Ke`, `Nama_Pemenang`, `Alamat_Pemenang`, `Tgl_Sppbj`, `Sisa_Anggaran`, `Prosentase_HPS`, `Jml_Pendaftar`, `Jml_Penawar`) VALUES
(1, 1, 523553, '2018-11-15', '547968000', '01.506.567.5-907.000', 'pengadaan langsung', 0, 0, 'CV. ARTA YOGA KARYA', 'jalan baru', '2018-11-01', NULL, NULL, 29, 0);

-- --------------------------------------------------------

--
-- Table structure for table `pengadaan_hasil_lelang_file`
--

CREATE TABLE IF NOT EXISTS `pengadaan_hasil_lelang_file` (
`Id` int(11) NOT NULL,
  `index` int(11) NOT NULL,
  `filename` varchar(255) DEFAULT NULL,
  `Id_Pengajuan_Pengadaan` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengadaan_hasil_lelang_file`
--

INSERT INTO `pengadaan_hasil_lelang_file` (`Id`, `index`, `filename`, `Id_Pengajuan_Pengadaan`) VALUES
(1, 0, '21701_f7547d09817d297aef9404971f9d48080db6869c.pdf', 1),
(2, 1, '19994_f7547d09817d297aef9404971f9d48080db6869c.pdf', 1),
(3, 2, '23883_f7547d09817d297aef9404971f9d48080db6869c.pdf', 1),
(4, 3, '17192_f7547d09817d297aef9404971f9d48080db6869c.pdf', 1),
(5, 4, '30785_f7547d09817d297aef9404971f9d48080db6869c.pdf', 1),
(6, 5, '12774_f7547d09817d297aef9404971f9d48080db6869c.pdf', 1),
(7, 6, '807_f7547d09817d297aef9404971f9d48080db6869c.pdf', 1),
(8, 7, '27092_f7547d09817d297aef9404971f9d48080db6869c.pdf', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pengajuan_notif`
--

CREATE TABLE IF NOT EXISTS `pengajuan_notif` (
`Id_Notif` int(11) NOT NULL,
  `Id_User` int(11) NOT NULL,
  `Id_Pengajuan` int(11) NOT NULL,
  `Progress` varchar(50) DEFAULT NULL,
  `IsRead` tinyint(4) NOT NULL DEFAULT '0',
  `Created_At` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengajuan_notif`
--

INSERT INTO `pengajuan_notif` (`Id_Notif`, `Id_User`, `Id_Pengajuan`, `Progress`, `IsRead`, `Created_At`) VALUES
(1, 215, 1, 'fo', 1, '2018-11-15 00:14:09'),
(2, 216, 1, 'terima_fo', 1, '2018-11-15 00:16:26'),
(3, 218, 1, 'terima_ksb_ren', 1, '2018-11-15 00:23:04'),
(4, 221, 1, 'usul_ke_kabag_peng', 1, '2018-11-15 00:27:20'),
(5, 213, 1, 'setuju_seleksi', 1, '2018-11-15 00:35:23'),
(6, 219, 1, 'setuju_seleksi', 0, '2018-11-15 00:35:35'),
(7, 220, 1, 'pokja_kirim_lelang', 1, '2018-11-15 01:15:35'),
(8, 221, 1, 'pokja_kirim_lelang', 1, '2018-11-15 01:16:21'),
(9, 214, 1, 'lelang_diterima', 1, '2018-11-15 01:17:05'),
(10, 215, 2, 'fo', 1, '2018-11-15 06:52:40'),
(11, 216, 2, 'terima_fo', 1, '2018-11-15 06:53:35'),
(12, 218, 2, 'terima_ksb_ren', 1, '2018-11-15 06:58:57'),
(13, 221, 2, 'usul_ke_kabag_peng', 1, '2018-11-15 07:01:08'),
(14, 213, 2, 'setuju_seleksi', 1, '2018-11-18 02:41:23'),
(15, 219, 2, 'setuju_seleksi', 0, '2018-11-18 02:41:27'),
(16, 215, 3, 'fo', 1, '2018-11-18 04:15:15'),
(17, 216, 3, 'terima_fo', 0, '2018-11-18 04:17:01');

-- --------------------------------------------------------

--
-- Table structure for table `pengajuan_pengadaan`
--

CREATE TABLE IF NOT EXISTS `pengajuan_pengadaan` (
`Id_Pengajuan_Pengadaan` int(11) NOT NULL,
  `PIN` varchar(20) DEFAULT NULL,
  `Nama_Kegiatan` varchar(255) NOT NULL,
  `Paket_Pengadaan` varchar(255) NOT NULL,
  `Sumber_Dana` varchar(100) NOT NULL,
  `Pagu_Anggaran` varchar(100) NOT NULL,
  `HPS` varchar(100) NOT NULL,
  `Kode_Rekening_Max` varchar(255) NOT NULL,
  `Kode_RUP` varchar(255) NOT NULL,
  `Jenis_Kontrak` varchar(255) NOT NULL,
  `Jenis_Barang` varchar(100) NOT NULL,
  `Nama_PPTK` varchar(255) NOT NULL,
  `NIP` varchar(18) NOT NULL,
  `No_Hp` varchar(100) NOT NULL,
  `File_Verifikasi` varchar(255) DEFAULT NULL,
  `Slug_Posisi` varchar(10) NOT NULL,
  `Progress` varchar(50) NOT NULL,
  `Id_User` int(11) NOT NULL,
  `Id_Pokja` int(11) DEFAULT NULL,
  `Id_Kabag` int(11) NOT NULL,
  `Id_Ksb_Ren` int(11) NOT NULL,
  `Surat_Tugas_Pokja` varchar(255) DEFAULT NULL,
  `Surat_Pengembalian` varchar(255) DEFAULT NULL,
  `No_Surat_Pengembalian` varchar(255) DEFAULT NULL,
  `Tgl_Pengembalian` date DEFAULT NULL,
  `Hasil_Kaji_Pokja` text,
  `Hasil_Lelang` text,
  `File_Hasil_Kaji` varchar(255) DEFAULT NULL,
  `File_Hasil_Lelang` varchar(255) DEFAULT NULL,
  `Jumlah_Sanggahan_Monev` varchar(255) DEFAULT NULL,
  `File_Pendukung_Monev` varchar(255) DEFAULT NULL,
  `File_Surat_TRC` varchar(100) DEFAULT NULL,
  `File_Hasil_TRC` varchar(100) DEFAULT NULL,
  `Created_At` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Updated_At` timestamp NULL DEFAULT NULL,
  `Deleted_At` timestamp NULL DEFAULT NULL,
  `Kode_Verifikasi` varchar(100) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengajuan_pengadaan`
--

INSERT INTO `pengajuan_pengadaan` (`Id_Pengajuan_Pengadaan`, `PIN`, `Nama_Kegiatan`, `Paket_Pengadaan`, `Sumber_Dana`, `Pagu_Anggaran`, `HPS`, `Kode_Rekening_Max`, `Kode_RUP`, `Jenis_Kontrak`, `Jenis_Barang`, `Nama_PPTK`, `NIP`, `No_Hp`, `File_Verifikasi`, `Slug_Posisi`, `Progress`, `Id_User`, `Id_Pokja`, `Id_Kabag`, `Id_Ksb_Ren`, `Surat_Tugas_Pokja`, `Surat_Pengembalian`, `No_Surat_Pengembalian`, `Tgl_Pengembalian`, `Hasil_Kaji_Pokja`, `Hasil_Lelang`, `File_Hasil_Kaji`, `File_Hasil_Lelang`, `Jumlah_Sanggahan_Monev`, `File_Pendukung_Monev`, `File_Surat_TRC`, `File_Hasil_TRC`, `Created_At`, `Updated_At`, `Deleted_At`, `Kode_Verifikasi`) VALUES
(1, '5becba4517', 'Penyediaan alat tulis kantor', 'Belanja Bahan Pakai Habis Alat Tulis Kantor', 'APBD', '165603077', '100000000', '1.01.1.01.01.01.10.5.2.2.01.01', '10090668', 'pengadaan langsung', 'Barang', 'ida bagus edo', '510809099999999', '081926555555', NULL, 'ppk', 'lelang_diterima', 214, 213, 221, 216, 'ppk', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, NULL, NULL, '2018-11-15 00:13:57', '2018-11-15 01:17:05', NULL, 'e5527ba2a65c7e5e960d2cc4'),
(2, '5bed17b39a', 'Penyediaan alat tulis kantor', 'Belanja Bahan Pakai Habis Alat Tulis Kantor', 'APBD', '165603077', '200000000', '1.01.1.01.01.01.10.5.2.2.01.01', '10090668', 'pemilihan langsung', 'Barang', 'ida bagus edo', '510809099999999', '081926555555', NULL, 'pokja', 'setuju_seleksi', 214, 213, 221, 216, 'ppk', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-11-15 06:52:35', '2018-11-18 02:41:23', NULL, '3c9f531d38f4b040f2c9ce4f'),
(3, '5bf0e74f62', 'Pengadaan Mebeleur', 'Belanja Modal Peralatan dan Mesin - Pengadaan Alat Rumah Tangga', 'APBD', '54700000', '50500000', '2.10.2.10.01.01.02.10.5.2.3.28.01', '16763705', 'lelang cepat', 'Barang', 'tes nama pptk 2', '510809099999999', '081926555555', NULL, 'ksb_ren', 'terima_fo', 214, NULL, 221, 216, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-11-18 04:15:11', '2018-11-18 04:17:01', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pengajuan_pengadaan_catatan`
--

CREATE TABLE IF NOT EXISTS `pengajuan_pengadaan_catatan` (
`Pengajuan_Pengadaan_Catatan_Id` int(11) NOT NULL,
  `Isi` text NOT NULL,
  `Tipe` tinyint(4) NOT NULL DEFAULT '1',
  `Created_At` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Updated_At` timestamp NULL DEFAULT NULL,
  `Slug_Jabatan` varchar(10) NOT NULL,
  `Slug_Jabatan_Target` varchar(10) DEFAULT NULL,
  `Id_Pengajuan_Pengadaan` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengajuan_pengadaan_catatan`
--

INSERT INTO `pengajuan_pengadaan_catatan` (`Pengajuan_Pengadaan_Catatan_Id`, `Isi`, `Tipe`, `Created_At`, `Updated_At`, `Slug_Jabatan`, `Slug_Jabatan_Target`, `Id_Pengajuan_Pengadaan`) VALUES
(1, 'Mohon ditindaklanjuti\r\n                                ', 1, '2018-11-15 00:13:57', NULL, 'ppk', 'fo', 1),
(2, 'Mohon ditindaklanjuti\r\n		', 1, '2018-11-15 00:16:38', NULL, 'fo', 'ksb_ren', 1),
(3, 'Mohon ditindaklanjuti\r\n		', 1, '2018-11-15 00:23:15', NULL, 'ksb_ren', 'ksb_pel', 1),
(4, 'Mohon ditindaklanjuti\r\n			', 1, '2018-11-15 00:27:19', NULL, 'ksb_pel', 'kabag', 1),
(5, 'Mohon ditindaklanjuti\r\n					', 1, '2018-11-15 00:35:47', NULL, 'kabag', 'pokja', 1),
(6, 'Mohon ditindaklanjuti\r\n								', 1, '2018-11-15 01:15:35', NULL, 'pokja', 'monev', 1),
(7, 'Mohon ditindaklanjuti\r\n		', 1, '2018-11-15 01:16:33', NULL, 'monev', 'kabag', 1),
(8, 'Mohon ditindaklanjuti\r\n		', 1, '2018-11-15 01:17:05', NULL, 'kabag', 'ppk', 1),
(9, 'Mohon ditindaklanjuti\r\n                                ', 1, '2018-11-15 06:52:36', NULL, 'ppk', 'fo', 2),
(10, 'Mohon ditindaklanjuti\r\n		', 1, '2018-11-15 06:53:39', NULL, 'fo', 'ksb_ren', 2),
(11, 'Mohon ditindaklanjuti\r\n		', 1, '2018-11-15 06:59:03', NULL, 'ksb_ren', 'ksb_pel', 2),
(12, 'Mohon ditindaklanjuti\r\n			', 1, '2018-11-15 07:01:08', NULL, 'ksb_pel', 'kabag', 2),
(13, 'Mohon ditindaklanjuti\r\n					', 1, '2018-11-18 02:41:33', NULL, 'kabag', 'pokja', 2),
(14, 'Mohon ditindaklanjuti\r\n                                ', 1, '2018-11-18 04:15:12', NULL, 'ppk', 'fo', 3),
(15, 'Mohon ditindaklanjuti\r\n		', 1, '2018-11-18 04:17:05', NULL, 'fo', 'ksb_ren', 3);

-- --------------------------------------------------------

--
-- Table structure for table `pengajuan_pengadaan_chat`
--

CREATE TABLE IF NOT EXISTS `pengajuan_pengadaan_chat` (
`id` int(11) NOT NULL,
  `Id_Pengajuan_Pengadaan` int(11) NOT NULL,
  `isi` varchar(100) NOT NULL,
  `Id_User` int(11) NOT NULL,
  `is_parent_pertanyaan` tinyint(4) NOT NULL DEFAULT '0',
  `posted_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pengajuan_pengadaan_kelengkapan`
--

CREATE TABLE IF NOT EXISTS `pengajuan_pengadaan_kelengkapan` (
`Id_Pengajuan_Pengadaan_Kelengkapan` int(11) NOT NULL,
  `Nama_File` varchar(300) NOT NULL,
  `Id_Kelengkapan` int(11) NOT NULL,
  `Id_Pengajuan_Pengadaan` int(11) NOT NULL,
  `Ch_Fo` tinyint(4) NOT NULL DEFAULT '0',
  `Ch_Ksb_Ren` tinyint(4) DEFAULT '0',
  `Ket_Fo` varchar(255) DEFAULT NULL,
  `Ket_Ksb_Ren` varchar(255) DEFAULT NULL,
  `Created_At` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Updated_At` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengajuan_pengadaan_kelengkapan`
--

INSERT INTO `pengajuan_pengadaan_kelengkapan` (`Id_Pengajuan_Pengadaan_Kelengkapan`, `Nama_File`, `Id_Kelengkapan`, `Id_Pengajuan_Pengadaan`, `Ch_Fo`, `Ch_Ksb_Ren`, `Ket_Fo`, `Ket_Ksb_Ren`, `Created_At`, `Updated_At`) VALUES
(1, '25903_f7547d09817d297aef9404971f9d48080db6869c.pdf', 1, 1, 0, 0, '', NULL, '2018-11-15 00:13:57', '2018-11-15 00:16:14'),
(2, '5948_da73df7b2671565d888e44301fa42c31260772fd.xlsx', 2, 1, 0, 0, '', NULL, '2018-11-15 00:13:57', '2018-11-15 00:16:14'),
(3, '23749_f7547d09817d297aef9404971f9d48080db6869c.pdf', 3, 1, 0, 0, '', NULL, '2018-11-15 00:13:57', '2018-11-15 00:16:14'),
(4, '13850_124e0a6f8787c0ee648df9a5bd501832e9d0d69e.docx', 4, 1, 0, 0, '', NULL, '2018-11-15 00:13:57', '2018-11-15 00:16:14'),
(5, '9547_da73df7b2671565d888e44301fa42c31260772fd.xlsx', 5, 1, 0, 0, '', NULL, '2018-11-15 00:13:57', '2018-11-15 00:16:14'),
(6, '27432_124e0a6f8787c0ee648df9a5bd501832e9d0d69e.docx', 6, 1, 0, 0, '', NULL, '2018-11-15 00:13:57', '2018-11-15 00:16:15'),
(7, '6630_124e0a6f8787c0ee648df9a5bd501832e9d0d69e.docx', 8, 1, 0, 0, '', NULL, '2018-11-15 00:13:57', '2018-11-15 00:16:15'),
(8, '19239_124e0a6f8787c0ee648df9a5bd501832e9d0d69e.docx', 9, 1, 0, 0, '', NULL, '2018-11-15 00:13:57', '2018-11-15 00:16:15'),
(9, '4564_124e0a6f8787c0ee648df9a5bd501832e9d0d69e.docx', 10, 1, 0, 0, '', NULL, '2018-11-15 00:13:57', '2018-11-15 00:16:15'),
(10, '22397_f7547d09817d297aef9404971f9d48080db6869c.pdf', 1, 2, 0, 0, '', NULL, '2018-11-15 06:52:35', '2018-11-14 18:53:33'),
(11, '1650_da73df7b2671565d888e44301fa42c31260772fd.xlsx', 2, 2, 0, 0, '', NULL, '2018-11-15 06:52:35', '2018-11-14 18:53:33'),
(12, '10947_f7547d09817d297aef9404971f9d48080db6869c.pdf', 3, 2, 0, 0, '', NULL, '2018-11-15 06:52:36', '2018-11-14 18:53:33'),
(13, '20288_124e0a6f8787c0ee648df9a5bd501832e9d0d69e.docx', 4, 2, 0, 0, '', NULL, '2018-11-15 06:52:36', '2018-11-14 18:53:33'),
(14, '28281_da73df7b2671565d888e44301fa42c31260772fd.xlsx', 5, 2, 0, 0, '', NULL, '2018-11-15 06:52:36', '2018-11-14 18:53:33'),
(15, '6078_124e0a6f8787c0ee648df9a5bd501832e9d0d69e.docx', 6, 2, 0, 0, '', NULL, '2018-11-15 06:52:36', '2018-11-14 18:53:33'),
(16, '12319_f7547d09817d297aef9404971f9d48080db6869c.pdf', 7, 2, 0, 0, '', NULL, '2018-11-15 06:52:36', '2018-11-14 18:53:33'),
(17, '8044_124e0a6f8787c0ee648df9a5bd501832e9d0d69e.docx', 8, 2, 0, 0, '', NULL, '2018-11-15 06:52:36', '2018-11-14 18:53:33'),
(18, '31029_124e0a6f8787c0ee648df9a5bd501832e9d0d69e.docx', 9, 2, 0, 0, '', NULL, '2018-11-15 06:52:36', '2018-11-14 18:53:33'),
(19, '29130_124e0a6f8787c0ee648df9a5bd501832e9d0d69e.docx', 10, 2, 0, 0, '', NULL, '2018-11-15 06:52:36', '2018-11-14 18:53:33'),
(20, '12091_bb772069bbbf6e1531b507dce204d5d3720c8dd2.txt', 11, 2, 0, 0, '', NULL, '2018-11-15 06:52:36', '2018-11-14 18:53:33'),
(21, '19063_f7547d09817d297aef9404971f9d48080db6869c.pdf', 1, 3, 0, 0, '', NULL, '2018-11-18 04:15:11', '2018-11-18 04:16:58'),
(22, '9956_da73df7b2671565d888e44301fa42c31260772fd.xlsx', 2, 3, 0, 0, '', NULL, '2018-11-18 04:15:11', '2018-11-18 04:16:58'),
(23, '14157_f7547d09817d297aef9404971f9d48080db6869c.pdf', 3, 3, 0, 0, '', NULL, '2018-11-18 04:15:11', '2018-11-18 04:16:58'),
(24, '12802_124e0a6f8787c0ee648df9a5bd501832e9d0d69e.docx', 4, 3, 0, 0, '', NULL, '2018-11-18 04:15:11', '2018-11-18 04:16:59'),
(25, '5907_da73df7b2671565d888e44301fa42c31260772fd.xlsx', 5, 3, 0, 0, '', NULL, '2018-11-18 04:15:11', '2018-11-18 04:16:59'),
(26, '19792_124e0a6f8787c0ee648df9a5bd501832e9d0d69e.docx', 6, 3, 0, 0, '', NULL, '2018-11-18 04:15:11', '2018-11-18 04:16:59'),
(27, '31561_f7547d09817d297aef9404971f9d48080db6869c.pdf', 7, 3, 0, 0, '', NULL, '2018-11-18 04:15:11', '2018-11-18 04:16:59'),
(28, '27726_124e0a6f8787c0ee648df9a5bd501832e9d0d69e.docx', 8, 3, 0, 0, '', NULL, '2018-11-18 04:15:11', '2018-11-18 04:16:59'),
(29, '4463_124e0a6f8787c0ee648df9a5bd501832e9d0d69e.docx', 9, 3, 0, 0, '', NULL, '2018-11-18 04:15:11', '2018-11-18 04:16:59'),
(30, '28284_124e0a6f8787c0ee648df9a5bd501832e9d0d69e.docx', 10, 3, 0, 0, '', NULL, '2018-11-18 04:15:12', '2018-11-18 04:16:59'),
(31, '773_bb772069bbbf6e1531b507dce204d5d3720c8dd2.txt', 11, 3, 0, 0, '', NULL, '2018-11-18 04:15:12', '2018-11-18 04:16:59');

-- --------------------------------------------------------

--
-- Table structure for table `pengajuan_pengadaan_kelengkapan_catatan`
--

CREATE TABLE IF NOT EXISTS `pengajuan_pengadaan_kelengkapan_catatan` (
`Id_Catatan` int(11) NOT NULL,
  `Id_User` int(11) NOT NULL,
  `Isi_Catatan` text NOT NULL,
  `Id_Pengajuan_Pengadaan_Kelengkapan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pengajuan_pengadaan_kelengkapan_history`
--

CREATE TABLE IF NOT EXISTS `pengajuan_pengadaan_kelengkapan_history` (
`Id` int(11) NOT NULL,
  `Id_Pengajuan_Pengadaan_Kelengkapan` int(11) NOT NULL,
  `Nama_File` varchar(300) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `realisasi`
--

CREATE TABLE IF NOT EXISTS `realisasi` (
`id_realisasi` int(11) NOT NULL,
  `Id_Pengajuan_Pengadaan` varchar(20) NOT NULL,
  `tgl_proses_pengadaan` date NOT NULL,
  `no_bast` varchar(25) NOT NULL,
  `tgl_bast` date NOT NULL,
  `no_kontrak` varchar(255) NOT NULL,
  `tgl_kontrak` date NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `realisasi`
--

INSERT INTO `realisasi` (`id_realisasi`, `Id_Pengajuan_Pengadaan`, `tgl_proses_pengadaan`, `no_bast`, `tgl_bast`, `no_kontrak`, `tgl_kontrak`, `keterangan`) VALUES
(1, '1', '2018-11-15', '1/BAST/2018', '2018-11-01', '1/KONTRAK', '2018-11-22', 'lelang sudah selesai');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
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
  `Id_Pokja` int(11) DEFAULT NULL,
  `Last_Login` timestamp NULL DEFAULT NULL,
  `Last_Logout` timestamp NULL DEFAULT NULL,
  `Surat_tugas` varchar(255) DEFAULT NULL,
  `Created_At` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Updated_At` timestamp NULL DEFAULT NULL,
  `Deleted_At` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=224 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`Id_User`, `Nama_Lengkap`, `Username`, `Password`, `NIP_User`, `No_Ktp`, `No_Hp_User`, `Jabatan_User`, `Slug_Jabatan`, `Email`, `No_WA`, `No_Telegram`, `Master_Skpd_Id`, `IsActive`, `Id_Pokja`, `Last_Login`, `Last_Logout`, `Surat_tugas`, `Created_At`, `Updated_At`, `Deleted_At`) VALUES
(212, 'Bagian Layanan Pengadaan', 'bagian layanan pengadaan', '', NULL, NULL, NULL, NULL, 'admin', NULL, NULL, NULL, NULL, 1, NULL, '2018-11-18 02:32:27', '2018-11-18 02:34:09', NULL, '2018-11-13 06:12:29', NULL, NULL),
(213, 'pokja', 'pokja', '5d3e6424edff880ff26a001b79cb5022998f8cfb', '', '', '', NULL, 'pokja', 'sanilestari88@yahoo.com', '', '', 27, 1, 0, '2018-11-19 00:25:30', '2018-11-19 00:21:32', '18139_7ae443f6cd3eead9d57bc2dbcd2f56d3dfb7b8c7.txt', '2018-11-13 06:19:59', NULL, NULL),
(214, 'ppk', 'ppk', '5eb99db5f140d9a26c6cf6927c08d25b00f4cbf7', '', '', '', NULL, 'ppk', 'aatrayudha@gmail.com', '', '081915656641', 27, 1, 0, '2018-11-19 00:21:35', '2018-11-19 00:25:22', '5496_7ae443f6cd3eead9d57bc2dbcd2f56d3dfb7b8c7.txt', '2018-11-13 06:30:05', NULL, NULL),
(215, 'front office', 'fo', '19082866d46a5a57bfeffe585d8362c149676c90', '', '', '', NULL, 'fo', 'sanilestari88@yahoo.com', '', '081915656641', 0, 1, 0, '2018-11-18 04:16:25', '2018-11-14 18:54:14', '10863_7ae443f6cd3eead9d57bc2dbcd2f56d3dfb7b8c7.txt', '2018-11-13 06:31:11', NULL, NULL),
(216, 'kasubag perencanaan pengadaan', 'kasubag_perencanaan', 'a69e0b8f528c94344d947543d296b94e80f0756d', '', '', '', NULL, 'ksb_ren', 'sanilestari88@yahoo.com', '', '081915656641', 0, 1, 0, '2018-11-14 18:57:41', '2018-11-14 18:59:16', '4988_7ae443f6cd3eead9d57bc2dbcd2f56d3dfb7b8c7.txt', '2018-11-13 06:32:44', NULL, NULL),
(217, 'kepala bagian pelayanan pengadaan', 'kabag_pengadaan', '97f1b89a865abd265df7d0c6c171f108dce69cbe', '', '', '', NULL, 'kabag_peng', 'sanilestari88@yahoo.com', '', '081915656641', 0, 1, 0, '2018-11-15 00:27:57', '2018-11-15 00:34:09', '17413_7ae443f6cd3eead9d57bc2dbcd2f56d3dfb7b8c7.txt', '2018-11-13 06:36:09', NULL, NULL),
(218, 'kepala sub bagian pelelangan', 'kasubag_pelelangan', '31138f0b009a7ed12f587ac1c162177a8c517b75', '', '', '', NULL, 'ksb_pel', 'sanilestari88@yahoo.com', '', '081915656641', 0, 1, 0, '2018-11-14 18:59:48', '2018-11-15 00:27:51', '11354_7ae443f6cd3eead9d57bc2dbcd2f56d3dfb7b8c7.txt', '2018-11-13 06:37:26', NULL, NULL),
(219, 'anggota pokja', 'anggota_pokja', 'b1a9a4f9da3141e56b925b537234151856cd1a69', '', '', '', NULL, 'anggota_pokja', 'sanilestari88@yahoo.com', '', '081915656641', 0, 1, 213, '2018-11-15 00:26:46', '2018-11-15 00:27:29', '32395_7ae443f6cd3eead9d57bc2dbcd2f56d3dfb7b8c7.txt', '2018-11-13 06:38:41', NULL, NULL),
(220, 'kepala sub bagian monev', 'monev', '346d80c57cd221187c40ae4b3b20ae88fc4bd1dd', '', '', '', NULL, 'monev', 'sanilestari88@yahoo.com', '', '081915656641', 0, 1, 0, '2018-11-15 01:16:12', '2018-11-15 01:16:48', '27496_7ae443f6cd3eead9d57bc2dbcd2f56d3dfb7b8c7.txt', '2018-11-13 06:39:37', NULL, NULL),
(221, 'kepala bagian', 'kabag', 'b54fd43e8359974ab70cb8c8c927f6c5003ebfe6', '', '', '', NULL, 'kabag', 'sanilestari88@yahoo.com', '', '081915656641', 0, 1, 0, '2018-11-18 02:40:33', '2018-11-18 02:41:49', '7041_7ae443f6cd3eead9d57bc2dbcd2f56d3dfb7b8c7.txt', '2018-11-13 06:40:15', NULL, NULL),
(222, 'ppk2', 'ppk2', 'daedaa0e25869b6cf36525d51c2d321335e69f71', '', '', '', NULL, 'ppk', 'sanilestari88@yahoo.com', '', '081916524378', 27, 1, 0, NULL, NULL, '13202_f9ca3b2864522588ce7447c113b994f65e59939c.txt', '2018-11-14 00:42:20', NULL, NULL),
(223, 'pokja2', 'pokja2', 'b03a622a7fc299e751c8ab96a6fc5baf5dc21b68', '', '', '', NULL, 'pokja', '', '', '', 0, 1, 0, '2018-11-18 03:15:16', '2018-11-18 03:23:19', '2097_2cadbbd73b892dcd3cc65b78e1322df4f1bc212e.txt', '2018-11-18 02:34:06', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jabatan_sistem`
--
ALTER TABLE `jabatan_sistem`
 ADD PRIMARY KEY (`Id_Jabatan_Sistem`);

--
-- Indexes for table `kelengkapan`
--
ALTER TABLE `kelengkapan`
 ADD PRIMARY KEY (`Id_Kelengkapan`);

--
-- Indexes for table `log_activity`
--
ALTER TABLE `log_activity`
 ADD PRIMARY KEY (`id_log`);

--
-- Indexes for table `master_skpd`
--
ALTER TABLE `master_skpd`
 ADD PRIMARY KEY (`Master_Skpd_Id`);

--
-- Indexes for table `pengadaan_hasil_lelang`
--
ALTER TABLE `pengadaan_hasil_lelang`
 ADD PRIMARY KEY (`Id_Lelang`);

--
-- Indexes for table `pengadaan_hasil_lelang_file`
--
ALTER TABLE `pengadaan_hasil_lelang_file`
 ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `pengajuan_notif`
--
ALTER TABLE `pengajuan_notif`
 ADD PRIMARY KEY (`Id_Notif`);

--
-- Indexes for table `pengajuan_pengadaan`
--
ALTER TABLE `pengajuan_pengadaan`
 ADD PRIMARY KEY (`Id_Pengajuan_Pengadaan`);

--
-- Indexes for table `pengajuan_pengadaan_catatan`
--
ALTER TABLE `pengajuan_pengadaan_catatan`
 ADD PRIMARY KEY (`Pengajuan_Pengadaan_Catatan_Id`), ADD KEY `Id_Pengajuan_Pengadaan` (`Id_Pengajuan_Pengadaan`);

--
-- Indexes for table `pengajuan_pengadaan_chat`
--
ALTER TABLE `pengajuan_pengadaan_chat`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengajuan_pengadaan_kelengkapan`
--
ALTER TABLE `pengajuan_pengadaan_kelengkapan`
 ADD PRIMARY KEY (`Id_Pengajuan_Pengadaan_Kelengkapan`), ADD KEY `Id_Pengajuan_Pengadaan` (`Id_Pengajuan_Pengadaan`);

--
-- Indexes for table `pengajuan_pengadaan_kelengkapan_catatan`
--
ALTER TABLE `pengajuan_pengadaan_kelengkapan_catatan`
 ADD PRIMARY KEY (`Id_Catatan`);

--
-- Indexes for table `pengajuan_pengadaan_kelengkapan_history`
--
ALTER TABLE `pengajuan_pengadaan_kelengkapan_history`
 ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `realisasi`
--
ALTER TABLE `realisasi`
 ADD PRIMARY KEY (`id_realisasi`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`Id_User`), ADD UNIQUE KEY `Username` (`Username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jabatan_sistem`
--
ALTER TABLE `jabatan_sistem`
MODIFY `Id_Jabatan_Sistem` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `kelengkapan`
--
ALTER TABLE `kelengkapan`
MODIFY `Id_Kelengkapan` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `log_activity`
--
ALTER TABLE `log_activity`
MODIFY `id_log` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=242;
--
-- AUTO_INCREMENT for table `master_skpd`
--
ALTER TABLE `master_skpd`
MODIFY `Master_Skpd_Id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT for table `pengadaan_hasil_lelang`
--
ALTER TABLE `pengadaan_hasil_lelang`
MODIFY `Id_Lelang` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `pengadaan_hasil_lelang_file`
--
ALTER TABLE `pengadaan_hasil_lelang_file`
MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `pengajuan_notif`
--
ALTER TABLE `pengajuan_notif`
MODIFY `Id_Notif` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `pengajuan_pengadaan`
--
ALTER TABLE `pengajuan_pengadaan`
MODIFY `Id_Pengajuan_Pengadaan` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `pengajuan_pengadaan_catatan`
--
ALTER TABLE `pengajuan_pengadaan_catatan`
MODIFY `Pengajuan_Pengadaan_Catatan_Id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `pengajuan_pengadaan_chat`
--
ALTER TABLE `pengajuan_pengadaan_chat`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pengajuan_pengadaan_kelengkapan`
--
ALTER TABLE `pengajuan_pengadaan_kelengkapan`
MODIFY `Id_Pengajuan_Pengadaan_Kelengkapan` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `pengajuan_pengadaan_kelengkapan_catatan`
--
ALTER TABLE `pengajuan_pengadaan_kelengkapan_catatan`
MODIFY `Id_Catatan` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pengajuan_pengadaan_kelengkapan_history`
--
ALTER TABLE `pengajuan_pengadaan_kelengkapan_history`
MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `realisasi`
--
ALTER TABLE `realisasi`
MODIFY `id_realisasi` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
MODIFY `Id_User` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=224;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `pengajuan_pengadaan_catatan`
--
ALTER TABLE `pengajuan_pengadaan_catatan`
ADD CONSTRAINT `pengajuan_pengadaan_catatan_ibfk_1` FOREIGN KEY (`Id_Pengajuan_Pengadaan`) REFERENCES `pengajuan_pengadaan` (`Id_Pengajuan_Pengadaan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pengajuan_pengadaan_kelengkapan`
--
ALTER TABLE `pengajuan_pengadaan_kelengkapan`
ADD CONSTRAINT `pengajuan_pengadaan_kelengkapan_ibfk_1` FOREIGN KEY (`Id_Pengajuan_Pengadaan`) REFERENCES `pengajuan_pengadaan` (`Id_Pengajuan_Pengadaan`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
