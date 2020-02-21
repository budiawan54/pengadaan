-- phpMyAdmin SQL Dump
-- version 4.4.15.10
-- https://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 21 Jan 2019 pada 07.08
-- Versi Server: 5.5.60-MariaDB
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blp_bangli`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `jabatan_sistem`
--

CREATE TABLE IF NOT EXISTS `jabatan_sistem` (
  `Id_Jabatan_Sistem` int(11) NOT NULL,
  `Slug_Jabatan` varchar(20) NOT NULL,
  `Nama_Jabatan` varchar(40) NOT NULL,
  `urutan` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jabatan_sistem`
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
-- Struktur dari tabel `kelengkapan`
--

CREATE TABLE IF NOT EXISTS `kelengkapan` (
  `Id_Kelengkapan` int(11) NOT NULL,
  `Deskripsi` varchar(255) NOT NULL,
  `Is_Required` tinyint(4) NOT NULL,
  `Tipe` varchar(30) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kelengkapan`
--

INSERT INTO `kelengkapan` (`Id_Kelengkapan`, `Deskripsi`, `Is_Required`, `Tipe`) VALUES
(1, 'Surat Permintaan Lelang dari OPD (Nama, PPK, NIP, Kode Rekening,DPA)', 1, 'pdf'),
(2, 'HPS (Harga Perkiraan Sendiri)', 1, 'xls, xlsx,rar,zip'),
(3, 'Cetak RUP dari website SIRUP', 1, 'pdf, jpg, png'),
(4, 'Kak (Keterangan Acuan Kerja)', 1, 'doc, docx, pdf'),
(5, 'BQ (Daftar Kuantitas)', 1, 'xls, xlsx,rar,zip'),
(6, 'Spesifikasi Teknis', 1, 'doc, docx,rar, zip'),
(7, 'Gambar', 0, 'pdf'),
(8, 'Rancangan Kontrak', 1, 'doc, docx'),
(9, 'Syarat-syarat umum Kontrak', 1, 'doc, docx'),
(10, 'Syarat-syarat khusus Kontrak', 1, 'doc, docx'),
(11, 'Data pendukung lain', 0, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `log_activity`
--

CREATE TABLE IF NOT EXISTS `log_activity` (
  `id_log` int(11) NOT NULL,
  `Id_User` int(11) NOT NULL,
  `Ip_Address` varchar(20) DEFAULT NULL,
  `Kegiatan` varchar(150) NOT NULL,
  `Created_At` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=423 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `log_activity`
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
(241, 213, '127.0.0.1', 'Melihat detail pengajuan dengan pin <a href="http://localhost/eproc/home/pengajuan_pin/5bed17b39a">5bed17b39a</a>', '2018-11-19 00:25:33'),
(242, 214, '127.0.0.1', 'Login ke sistem', '2018-12-02 04:47:19'),
(243, 214, '127.0.0.1', 'Membuka halaman daftar pengajuan', '2018-12-02 04:47:23'),
(244, 214, '127.0.0.1', 'Membuka halaman detail pengajuan dengan pin <a href="http://localhost/eproc/home/pengajuan_pin/5bf0e74f62">5bf0e74f62</a>', '2018-12-02 04:47:27'),
(245, 214, '127.0.0.1', 'Masuk ke halaman tambah pengajuan', '2018-12-02 04:47:40'),
(246, 214, '127.0.0.1', 'Membuka halaman daftar pengajuan', '2018-12-02 04:47:42'),
(247, 214, '127.0.0.1', 'Membuka halaman detail pengajuan dengan pin <a href="http://localhost/eproc/home/pengajuan_pin/5becba4517">5becba4517</a>', '2018-12-02 04:47:44'),
(248, 214, '127.0.0.1', 'Mendownload lembar verifikasi pengajuan dengan pin 5becba4517', '2018-12-02 04:47:48'),
(249, 214, '127.0.0.1', 'Mendownload lembar verifikasi pengajuan dengan pin 5becba4517', '2018-12-02 04:47:51'),
(250, 214, '127.0.0.1', 'Mendownload lembar verifikasi pengajuan dengan pin 5becba4517', '2018-12-02 04:47:51'),
(251, 214, '127.0.0.1', 'Mendownload lembar verifikasi pengajuan dengan pin 5becba4517', '2018-12-02 04:47:52'),
(252, 214, '::1', 'Login ke sistem', '2018-12-13 06:23:37'),
(253, 214, '::1', 'Membuka halaman detail pengajuan dengan pin <a href="http://localhost/eproc/home/pengajuan_pin/5becba4517">5becba4517</a>', '2018-12-13 06:23:45'),
(254, 214, '::1', 'Mendownload lembar verifikasi pengajuan dengan pin 5becba4517', '2018-12-13 06:23:49'),
(255, 214, '::1', 'Mendownload lembar verifikasi pengajuan dengan pin 5becba4517', '2018-12-13 06:23:55'),
(256, 214, '::1', 'Mendownload lembar verifikasi pengajuan dengan pin 5becba4517', '2018-12-13 06:23:56'),
(257, 214, '::1', 'Mendownload lembar verifikasi pengajuan dengan pin 5becba4517', '2018-12-13 06:23:57'),
(258, 214, '36.66.192.30', 'Login ke sistem', '2018-12-19 01:33:00'),
(259, 214, '36.66.192.30', 'Logout dari sistem', '2018-12-19 01:33:07'),
(260, 212, '36.66.192.30', 'Login ke sistem', '2018-12-19 01:35:27'),
(261, 213, '112.215.219.183', 'Login ke sistem', '2018-12-19 03:57:22'),
(262, 213, '112.215.219.183', 'Melihat detail pengajuan dengan pin <a href="http://36.66.192.28/home/pengajuan_pin/5bed17b39a">5bed17b39a</a>', '2018-12-19 03:57:32'),
(263, 213, '112.215.219.183', 'Mengunduh surat tugas untuk POKJA 5bed17b39a', '2018-12-19 03:57:46'),
(264, 213, '112.215.219.183', 'Melihat halaman daftar pengajuan', '2018-12-19 03:58:56'),
(265, 213, '112.215.219.183', 'Melihat halaman daftar pengajuan', '2018-12-19 03:59:06'),
(266, 213, '112.215.219.183', 'Melihat detail pengajuan dengan pin <a href="http://36.66.192.28/home/pengajuan_pin/5bed17b39a">5bed17b39a</a>', '2018-12-19 03:59:09'),
(267, 214, '36.66.192.30', 'Login ke sistem', '2018-12-20 02:13:45'),
(268, 214, '36.66.192.30', 'Logout dari sistem', '2018-12-20 02:13:50'),
(269, 212, '36.66.192.30', 'Login ke sistem', '2018-12-20 02:15:17'),
(270, 212, '36.66.192.30', 'Logout dari sistem', '2018-12-20 02:20:53'),
(271, 214, '36.66.192.30', 'Login ke sistem', '2018-12-20 02:21:04'),
(272, 214, '36.66.192.30', 'Masuk ke halaman tambah pengajuan', '2018-12-20 02:21:14'),
(273, 214, '36.66.192.30', 'Logout dari sistem', '2018-12-20 02:23:29'),
(274, 213, '36.66.192.30', 'Login ke sistem', '2018-12-20 02:24:46'),
(275, 213, '36.66.192.30', 'Melihat detail pengajuan dengan pin <a href="http://36.66.192.28/home/pengajuan_pin/5bed17b39a">5bed17b39a</a>', '2018-12-20 02:24:52'),
(276, 213, '36.66.192.30', 'Logout dari sistem', '2018-12-20 02:25:20'),
(277, 221, '36.66.192.30', 'Login ke sistem', '2018-12-20 02:25:44'),
(278, 221, '36.66.192.30', 'Melihat detail pengajuan dengan pin <a href="http://36.66.192.28/home/pengajuan_pin/5bf0e74f62">5bf0e74f62</a>', '2018-12-20 02:25:48'),
(279, 221, '36.66.192.30', 'Logout dari sistem', '2018-12-20 02:28:18'),
(280, 214, '36.66.192.30', 'Login ke sistem', '2018-12-31 00:27:13'),
(281, 214, '36.66.192.30', 'Masuk ke halaman tambah pengajuan', '2018-12-31 00:31:59'),
(282, 214, '36.66.192.30', 'Masuk ke halaman tambah pengajuan', '2018-12-31 01:55:10'),
(283, 214, '36.66.192.30', 'Mengajukan pengadaan baru dengan pin <a href="http://36.66.192.28/home/pengajuan_pin/5c2978241a">5c2978241a</a>', '2018-12-31 02:00:04'),
(284, 214, '36.66.192.30', 'Mengajukan pengadaan baru dengan pin <a href="http://36.66.192.28/home/pengajuan_pin/5c297b36bc">5c297b36bc</a>', '2018-12-31 02:13:10'),
(285, 214, '36.66.192.30', 'Membuka halaman detail pengajuan dengan pin <a href="http://36.66.192.28/home/pengajuan_pin/5c297b36bc">5c297b36bc</a>', '2018-12-31 02:13:18'),
(286, 214, '36.66.192.30', 'Logout dari sistem', '2018-12-31 02:15:12'),
(287, 215, '36.66.192.30', 'Login ke sistem', '2018-12-31 02:15:46'),
(288, 215, '36.66.192.30', 'Melihat detail pengajuan dengan pin <a href="http://36.66.192.28/home/pengajuan_pin/5c297b36bc">5c297b36bc</a>', '2018-12-31 02:15:50'),
(289, 215, '36.66.192.30', 'Memverifikasi kelengkapan pengajuan pin 5c297b36bc', '2018-12-31 02:15:58'),
(290, 215, '36.66.192.30', 'Melihat halaman daftar pengajuan', '2018-12-31 02:16:01'),
(291, 215, '36.66.192.30', 'Melihat detail pengajuan dengan pin <a href="http://36.66.192.28/home/pengajuan_pin/5c2978241a">5c2978241a</a>', '2018-12-31 02:16:06'),
(292, 215, '36.66.192.30', 'Memverifikasi kelengkapan pengajuan pin 5c2978241a', '2018-12-31 02:16:34'),
(293, 215, '36.66.192.30', 'Melihat halaman daftar pengajuan', '2018-12-31 02:16:38'),
(294, 215, '36.66.192.30', 'Melihat detail pengajuan dengan pin <a href="http://36.66.192.28/home/pengajuan_pin/5c297b36bc">5c297b36bc</a>', '2018-12-31 02:16:44'),
(295, 215, '36.66.192.30', 'Logout dari sistem', '2018-12-31 02:17:24'),
(296, 216, '36.66.192.30', 'Login ke sistem', '2018-12-31 02:17:51'),
(297, 216, '36.66.192.30', 'Melihat detail pengajuan dengan pin <a href="http://36.66.192.28/home/pengajuan_pin/5c297b36bc">5c297b36bc</a>', '2018-12-31 02:17:57'),
(298, 216, '36.66.192.30', 'Memverifikasi kelengkapan pengajuan dengan pin <a href="http://36.66.192.28/home/pengajuan_pin/5c297b36bc">5c297b36bc</a>', '2018-12-31 02:18:16'),
(299, 216, '36.66.192.30', 'Melihat halaman daftar pengajuan', '2018-12-31 02:18:18'),
(300, 216, '36.66.192.30', 'Melihat detail pengajuan dengan pin <a href="http://36.66.192.28/home/pengajuan_pin/5c2978241a">5c2978241a</a>', '2018-12-31 02:18:22'),
(301, 216, '36.66.192.30', 'Memverifikasi kelengkapan pengajuan dengan pin <a href="http://36.66.192.28/home/pengajuan_pin/5c2978241a">5c2978241a</a>', '2018-12-31 02:18:36'),
(302, 216, '36.66.192.30', 'Melihat halaman daftar pengajuan', '2018-12-31 02:18:41'),
(303, 216, '36.66.192.30', 'Melihat detail pengajuan dengan pin <a href="http://36.66.192.28/home/pengajuan_pin/5bf0e74f62">5bf0e74f62</a>', '2018-12-31 02:18:59'),
(304, 216, '36.66.192.30', 'Memverifikasi kelengkapan pengajuan dengan pin <a href="http://36.66.192.28/home/pengajuan_pin/5bf0e74f62">5bf0e74f62</a>', '2018-12-31 02:19:25'),
(305, 216, '36.66.192.30', 'Melihat halaman daftar pengajuan', '2018-12-31 02:19:27'),
(306, 216, '36.66.192.30', 'Logout dari sistem', '2018-12-31 02:19:40'),
(307, 218, '36.66.192.30', 'Login ke sistem', '2018-12-31 02:20:43'),
(308, 218, '36.66.192.30', 'Melihat detail pengajuan dengan pin <a href="http://36.66.192.28/home/pengajuan_pin/5c297b36bc">5c297b36bc</a>', '2018-12-31 02:21:12'),
(309, 218, '36.66.192.30', 'Mengusulkan pengajuan dengan pin <a href="http://36.66.192.28/home/pengajuan_pin/"></a> ke Kabag Pelayanan Pengadaan', '2018-12-31 02:21:21'),
(310, 218, '36.66.192.30', 'Melihat halaman daftar pengajuan', '2018-12-31 02:21:29'),
(311, 218, '36.66.192.30', 'Melihat detail pengajuan dengan pin <a href="http://36.66.192.28/home/pengajuan_pin/5c2978241a">5c2978241a</a>', '2018-12-31 02:22:11'),
(312, 218, '36.66.192.30', 'Melihat halaman daftar pengajuan', '2018-12-31 02:22:26'),
(313, 218, '36.66.192.30', 'Melihat detail pengajuan dengan pin <a href="http://36.66.192.28/home/pengajuan_pin/5c297b36bc">5c297b36bc</a>', '2018-12-31 02:22:46'),
(314, 218, '36.66.192.30', 'Logout dari sistem', '2018-12-31 02:27:42'),
(315, 221, '36.66.192.30', 'Login ke sistem', '2018-12-31 02:28:28'),
(316, 221, '36.66.192.30', 'Melihat detail pengajuan dengan pin <a href="http://36.66.192.28/home/pengajuan_pin/5c297b36bc">5c297b36bc</a>', '2018-12-31 02:28:31'),
(317, 221, '36.66.192.30', 'Logout dari sistem', '2018-12-31 02:28:56'),
(318, 214, '36.66.192.30', 'Login ke sistem', '2018-12-31 02:29:48'),
(319, 214, '36.66.192.30', 'Masuk ke halaman tambah pengajuan', '2018-12-31 02:29:52'),
(320, 214, '36.66.192.30', 'Logout dari sistem', '2018-12-31 02:30:40'),
(321, 221, '36.66.192.30', 'Login ke sistem', '2018-12-31 02:31:02'),
(322, 221, '36.66.192.30', 'Melihat detail pengajuan dengan pin <a href="http://36.66.192.28/home/pengajuan_pin/5c297b36bc">5c297b36bc</a>', '2018-12-31 02:31:05'),
(323, 221, '36.66.192.30', 'Menyetujui pengajuan dan mengirim ke pokja dengan pin <a href="http://36.66.192.28/home/pengajuan_pin/5c297b36bc">5c297b36bc</a>', '2018-12-31 02:31:20'),
(324, 221, '36.66.192.30', 'Melihat halaman daftar pengajuan', '2018-12-31 02:31:24'),
(325, 221, '36.66.192.30', 'Logout dari sistem', '2018-12-31 02:31:32'),
(326, 212, '36.66.192.30', 'Login ke sistem', '2018-12-31 02:32:51'),
(327, 212, '36.66.192.30', 'Logout dari sistem', '2018-12-31 02:33:25'),
(328, 213, '36.66.192.30', 'Login ke sistem', '2018-12-31 02:33:32'),
(329, 213, '36.66.192.30', 'Melihat detail pengajuan dengan pin <a href="http://36.66.192.28/home/pengajuan_pin/5c297b36bc">5c297b36bc</a>', '2018-12-31 02:33:41'),
(330, 213, '36.66.192.30', 'Mengirim hasil kaji pengajuan dengan pin <a href="http://36.66.192.28/home/pengajuan_pin/5c297b36bc">5c297b36bc</a>', '2018-12-31 02:34:04'),
(331, 213, '36.66.192.30', 'Melihat halaman daftar pengajuan', '2018-12-31 02:34:04'),
(332, 213, '36.66.192.30', 'Melihat detail pengajuan dengan pin <a href="http://36.66.192.28/home/pengajuan_pin/5c297b36bc">5c297b36bc</a>', '2018-12-31 02:34:11'),
(333, 213, '36.66.192.30', 'Logout dari sistem', '2018-12-31 02:52:44'),
(334, 214, '36.66.192.30', 'Login ke sistem', '2018-12-31 02:52:54'),
(335, 214, '36.66.192.30', 'Membuka halaman detail pengajuan dengan pin <a href="http://36.66.192.28/home/pengajuan_pin/5c297b36bc">5c297b36bc</a>', '2018-12-31 02:52:57'),
(336, 214, '36.66.192.30', 'Mengirim perubahan pengajuan pengadaan ke Pokja dengan pin <a href="http://36.66.192.28/home/pengajuan_pin/5c297b36bc">5c297b36bc</a>', '2018-12-31 02:53:39'),
(337, 214, '36.66.192.30', 'Membuka halaman daftar pengajuan', '2018-12-31 02:53:39'),
(338, 214, '36.66.192.30', 'Logout dari sistem', '2018-12-31 02:53:44'),
(339, 213, '36.66.192.30', 'Login ke sistem', '2018-12-31 02:53:55'),
(340, 213, '36.66.192.30', 'Melihat detail pengajuan dengan pin <a href="http://36.66.192.28/home/pengajuan_pin/5c297b36bc">5c297b36bc</a>', '2018-12-31 02:53:58'),
(341, 213, '36.66.192.30', 'Login ke sistem', '2019-01-02 00:09:56'),
(342, 213, '36.66.192.30', 'Melihat detail pengajuan dengan pin <a href="http://36.66.192.28/home/pengajuan_pin/5c297b36bc">5c297b36bc</a>', '2019-01-02 00:10:38'),
(343, 213, '36.66.192.30', 'Melihat detail pengajuan dengan pin <a href="http://36.66.192.28/home/pengajuan_pin/5c297b36bc">5c297b36bc</a>', '2019-01-02 00:13:07'),
(344, 214, '36.66.192.30', 'Login ke sistem', '2019-01-03 06:48:01'),
(345, 214, '36.66.192.30', 'Logout dari sistem', '2019-01-03 06:48:45'),
(346, 212, '36.66.192.30', 'Login ke sistem', '2019-01-03 06:51:32'),
(347, 214, '36.66.192.30', 'Login ke sistem', '2019-01-09 05:37:17'),
(348, 214, '36.66.192.30', 'Membuka halaman detail pengajuan dengan pin <a href="http://36.66.192.28/home/pengajuan_pin/5becba4517">5becba4517</a>', '2019-01-09 05:37:49'),
(349, 214, '36.66.192.30', 'Mencetak hasil dari pokja dengan pengajuan pin <a href="http://36.66.192.28/home/pengajuan_pin/5becba4517">5becba4517</a>', '2019-01-09 05:40:26'),
(350, 214, '36.66.192.30', 'Mencetak hasil dari pokja dengan pengajuan pin <a href="http://36.66.192.28/home/pengajuan_pin/5becba4517">5becba4517</a>', '2019-01-09 05:40:30'),
(351, 214, '36.66.192.30', 'Mencetak hasil dari pokja dengan pengajuan pin <a href="http://36.66.192.28/home/pengajuan_pin/5becba4517">5becba4517</a>', '2019-01-09 05:40:31'),
(352, 214, '36.66.192.30', 'Mendownload lembar verifikasi pengajuan dengan pin 5becba4517', '2019-01-09 05:40:55'),
(353, 214, '36.66.192.30', 'Mendownload lembar verifikasi pengajuan dengan pin 5becba4517', '2019-01-09 05:40:58'),
(354, 214, '36.66.192.30', 'Mendownload lembar verifikasi pengajuan dengan pin 5becba4517', '2019-01-09 05:40:58'),
(355, 214, '36.66.192.30', 'Mengunduh surat tugas untuk POKJA 5becba4517', '2019-01-09 05:41:36'),
(356, 214, '36.66.192.30', 'Mengunduh surat tugas untuk POKJA 5becba4517', '2019-01-09 05:41:38'),
(357, 214, '36.66.192.30', 'Masuk ke halaman tambah pengajuan', '2019-01-09 05:42:27'),
(358, 214, '36.66.192.30', 'Masuk ke halaman tambah pengajuan', '2019-01-09 05:47:32'),
(359, 214, '36.66.192.30', 'Logout dari sistem', '2019-01-09 05:55:38'),
(360, 212, '36.66.192.30', 'Login ke sistem', '2019-01-09 05:55:59'),
(361, 214, '110.139.190.254', 'Login ke sistem', '2019-01-16 10:06:58'),
(362, 214, '110.139.190.254', 'Masuk ke halaman tambah pengajuan', '2019-01-16 10:07:10'),
(363, 214, '110.139.190.254', 'Mengajukan pengadaan baru dengan pin <a href="http://36.66.192.28/home/pengajuan_pin/5c3f0444ad">5c3f0444ad</a>', '2019-01-16 10:15:32'),
(364, 214, '110.139.190.254', 'Membuka halaman detail pengajuan dengan pin <a href="http://36.66.192.28/home/pengajuan_pin/5c3f0444ad">5c3f0444ad</a>', '2019-01-16 10:15:36'),
(365, 214, '110.139.190.254', 'Logout dari sistem', '2019-01-16 10:16:20'),
(366, 215, '110.139.190.254', 'Login ke sistem', '2019-01-16 10:16:43'),
(367, 215, '110.139.190.254', 'Melihat detail pengajuan dengan pin <a href="http://36.66.192.28/home/pengajuan_pin/5c3f0444ad">5c3f0444ad</a>', '2019-01-16 10:17:05'),
(368, 215, '110.139.190.254', 'Memverifikasi kelengkapan pengajuan pin 5c3f0444ad', '2019-01-16 10:18:17'),
(369, 215, '110.139.190.254', 'Melihat halaman daftar pengajuan', '2019-01-16 10:18:19'),
(370, 215, '110.139.190.254', 'Melihat detail pengajuan dengan pin <a href="http://36.66.192.28/home/pengajuan_pin/5c3f0444ad">5c3f0444ad</a>', '2019-01-16 10:18:36'),
(371, 215, '110.139.190.254', 'Logout dari sistem', '2019-01-16 10:19:14'),
(372, 216, '110.139.190.254', 'Login ke sistem', '2019-01-16 10:19:37'),
(373, 216, '110.139.190.254', 'Melihat detail pengajuan dengan pin <a href="http://36.66.192.28/home/pengajuan_pin/5c3f0444ad">5c3f0444ad</a>', '2019-01-16 10:19:47'),
(374, 216, '110.139.190.254', 'Mencetak catatan pengajuan dengan pin <a href="http://36.66.192.28/home/pengajuan_pin/5c3f0444ad">5c3f0444ad</a>', '2019-01-16 10:21:35'),
(375, 216, '110.139.190.254', 'Melihat detail pengajuan dengan pin <a href="http://36.66.192.28/home/pengajuan_pin/5c3f0444ad">5c3f0444ad</a>', '2019-01-16 10:22:53'),
(376, 216, '110.139.190.254', 'Memverifikasi kelengkapan pengajuan dengan pin <a href="http://36.66.192.28/home/pengajuan_pin/5c3f0444ad">5c3f0444ad</a>', '2019-01-16 10:24:09'),
(377, 216, '110.139.190.254', 'Melihat halaman daftar pengajuan', '2019-01-16 10:24:11'),
(378, 216, '110.139.190.254', 'Melihat detail pengajuan dengan pin <a href="http://36.66.192.28/home/pengajuan_pin/5c3f0444ad">5c3f0444ad</a>', '2019-01-16 10:24:22'),
(379, 216, '110.139.190.254', 'Mendownload lembar verifikasi pengajuan dengan pin 5c3f0444ad', '2019-01-16 10:24:29'),
(380, 216, '110.139.190.254', 'Logout dari sistem', '2019-01-16 10:25:43'),
(381, 218, '110.139.190.254', 'Login ke sistem', '2019-01-16 10:26:05'),
(382, 218, '110.139.190.254', 'Melihat detail pengajuan dengan pin <a href="http://36.66.192.28/home/pengajuan_pin/5c3f0444ad">5c3f0444ad</a>', '2019-01-16 10:26:22'),
(383, 218, '110.139.190.254', 'Mengusulkan pengajuan dengan pin <a href="http://36.66.192.28/home/pengajuan_pin/"></a> ke Kabag Pelayanan Pengadaan', '2019-01-16 10:27:04'),
(384, 218, '110.139.190.254', 'Melihat halaman daftar pengajuan', '2019-01-16 10:27:05'),
(385, 218, '110.139.190.254', 'Melihat detail pengajuan dengan pin <a href="http://36.66.192.28/home/pengajuan_pin/5c2978241a">5c2978241a</a>', '2019-01-16 10:27:10'),
(386, 218, '110.139.190.254', 'Melihat detail pengajuan dengan pin <a href="http://36.66.192.28/home/pengajuan_pin/5c3f0444ad">5c3f0444ad</a>', '2019-01-16 10:27:23'),
(387, 218, '110.139.190.254', 'Mendownload lembar verifikasi pengajuan dengan pin 5c3f0444ad', '2019-01-16 10:27:38'),
(388, 218, '110.139.190.254', 'Logout dari sistem', '2019-01-16 10:28:23'),
(389, 217, '110.139.190.254', 'Login ke sistem', '2019-01-16 10:28:44'),
(390, 217, '110.139.190.254', 'Logout dari sistem', '2019-01-16 10:29:00'),
(391, 221, '110.139.190.254', 'Login ke sistem', '2019-01-16 10:29:30'),
(392, 221, '110.139.190.254', 'Melihat detail pengajuan dengan pin <a href="http://36.66.192.28/home/pengajuan_pin/5c3f0444ad">5c3f0444ad</a>', '2019-01-16 10:29:41'),
(393, 221, '110.139.190.254', 'Menyetujui pengajuan dan mengirim ke pokja dengan pin <a href="http://36.66.192.28/home/pengajuan_pin/5c3f0444ad">5c3f0444ad</a>', '2019-01-16 10:30:10'),
(394, 221, '110.139.190.254', 'Melihat halaman daftar pengajuan', '2019-01-16 10:30:12'),
(395, 221, '110.139.190.254', 'Melihat detail pengajuan dengan pin <a href="http://36.66.192.28/home/pengajuan_pin/5c3f0444ad">5c3f0444ad</a>', '2019-01-16 10:30:19'),
(396, 221, '110.139.190.254', 'Mengunduh surat tugas untuk POKJA 5c3f0444ad', '2019-01-16 10:30:25'),
(397, 221, '110.139.190.254', 'Logout dari sistem', '2019-01-16 10:30:49'),
(398, 213, '110.139.190.254', 'Login ke sistem', '2019-01-16 10:31:31'),
(399, 213, '110.139.190.254', 'Melihat detail pengajuan dengan pin <a href="http://36.66.192.28/home/pengajuan_pin/5c3f0444ad">5c3f0444ad</a>', '2019-01-16 10:31:38'),
(400, 213, '110.139.190.254', 'Melakukan proses lelang terhadap pengajuan pin <a href="http://36.66.192.28/home/pengajuan_pin/5c3f0444ad">5c3f0444ad</a>', '2019-01-16 10:32:36'),
(401, 213, '110.139.190.254', 'Melihat detail pengajuan dengan pin <a href="http://36.66.192.28/home/pengajuan_pin/5c3f0444ad">5c3f0444ad</a>', '2019-01-16 10:32:37'),
(402, 213, '110.139.190.254', 'Melihat detail pengajuan dengan pin <a href="http://36.66.192.28/home/pengajuan_pin/5c3f0444ad">5c3f0444ad</a>', '2019-01-16 12:04:29'),
(403, 213, '110.139.190.254', 'Melakukan proses lelang terhadap pengajuan pin <a href="http://36.66.192.28/home/pengajuan_pin/5c3f0444ad">5c3f0444ad</a>', '2019-01-16 12:05:10'),
(404, 213, '110.139.190.254', 'Melihat detail pengajuan dengan pin <a href="http://36.66.192.28/home/pengajuan_pin/5c3f0444ad">5c3f0444ad</a>', '2019-01-16 12:05:11'),
(405, 214, '110.139.190.254', 'Login ke sistem', '2019-01-16 12:08:49'),
(406, 214, '110.139.190.254', 'Membuka halaman detail pengajuan dengan pin <a href="http://36.66.192.28/home/pengajuan_pin/5c3f0444ad">5c3f0444ad</a>', '2019-01-16 12:09:03'),
(407, 214, '110.139.190.254', 'Membuka halaman detail pengajuan dengan pin <a href="http://36.66.192.28/home/pengajuan_pin/5c3f0444ad">5c3f0444ad</a>', '2019-01-16 12:09:30'),
(408, 214, '110.139.190.254', 'Mencetak catatan pengajuan dengan pin <a href="http://36.66.192.28/home/pengajuan_pin/5c3f0444ad">5c3f0444ad</a>', '2019-01-16 12:09:43'),
(409, 214, '110.139.190.254', 'Membuka halaman daftar pengajuan', '2019-01-16 12:10:04'),
(410, 214, '110.139.190.254', 'Membuka halaman detail pengajuan dengan pin <a href="http://36.66.192.28/home/pengajuan_pin/5c3f0444ad">5c3f0444ad</a>', '2019-01-16 12:10:33'),
(411, 214, '110.139.190.254', 'Mendownload lembar verifikasi pengajuan dengan pin 5c3f0444ad', '2019-01-16 12:10:58'),
(412, 214, '110.139.190.254', 'Masuk ke halaman tambah pengajuan', '2019-01-16 12:11:58'),
(413, 214, '110.139.190.254', 'Membuka halaman daftar pengajuan', '2019-01-16 12:12:06'),
(414, 214, '110.139.190.254', 'Membuka halaman detail pengajuan dengan pin <a href="http://36.66.192.28/home/pengajuan_pin/5c3f0444ad">5c3f0444ad</a>', '2019-01-16 12:12:28'),
(415, 214, '110.139.190.254', 'Membuka halaman daftar pengajuan', '2019-01-16 12:13:21'),
(416, 214, '110.139.190.254', 'Membuka halaman detail pengajuan dengan pin <a href="http://36.66.192.28/home/pengajuan_pin/5c3f0444ad">5c3f0444ad</a>', '2019-01-16 12:13:33'),
(417, 214, '110.139.190.254', 'Mendownload lembar verifikasi pengajuan dengan pin 5c3f0444ad', '2019-01-16 12:13:39'),
(418, 214, '110.139.190.254', 'Membuka halaman daftar pengajuan', '2019-01-16 12:14:24'),
(419, 214, '110.139.190.254', 'Membuka halaman detail pengajuan dengan pin <a href="http://36.66.192.28/home/pengajuan_pin/5c2978241a">5c2978241a</a>', '2019-01-16 12:14:49'),
(420, 214, '110.139.190.254', 'Masuk ke halaman profil', '2019-01-16 12:15:13'),
(421, 212, '115.178.237.112', 'Login ke sistem', '2019-01-20 13:24:22'),
(422, 212, '36.66.192.30', 'Login ke sistem', '2019-01-21 06:04:34');

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_skpd`
--

CREATE TABLE IF NOT EXISTS `master_skpd` (
  `Master_Skpd_Id` int(11) NOT NULL,
  `Nama_Skpd` varchar(255) NOT NULL,
  `Alamat` text,
  `Email_Skpd` varchar(100) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `master_skpd`
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
-- Struktur dari tabel `pengadaan_hasil_lelang`
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
-- Dumping data untuk tabel `pengadaan_hasil_lelang`
--

INSERT INTO `pengadaan_hasil_lelang` (`Id_Lelang`, `Id_Pengajuan_Pengadaan`, `kd_lelang`, `Tanggal_Pengumuman`, `Nilai_Penawaran_Hasil`, `NPWP`, `Metode_Pemilihan_Penyedia`, `Lelang_Ulang`, `Lelang_Ulang_Ke`, `Nama_Pemenang`, `Alamat_Pemenang`, `Tgl_Sppbj`, `Sisa_Anggaran`, `Prosentase_HPS`, `Jml_Pendaftar`, `Jml_Penawar`) VALUES
(1, 1, 523553, '2018-11-15', '547968000', '01.506.567.5-907.000', 'pengadaan langsung', 0, 0, 'CV. ARTA YOGA KARYA', 'jalan baru', '2018-11-01', NULL, NULL, 29, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengadaan_hasil_lelang_file`
--

CREATE TABLE IF NOT EXISTS `pengadaan_hasil_lelang_file` (
  `Id` int(11) NOT NULL,
  `index` int(11) NOT NULL,
  `filename` varchar(255) DEFAULT NULL,
  `Id_Pengajuan_Pengadaan` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pengadaan_hasil_lelang_file`
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
-- Struktur dari tabel `pengajuan_notif`
--

CREATE TABLE IF NOT EXISTS `pengajuan_notif` (
  `Id_Notif` int(11) NOT NULL,
  `Id_User` int(11) NOT NULL,
  `Id_Pengajuan` int(11) NOT NULL,
  `Progress` varchar(50) DEFAULT NULL,
  `IsRead` tinyint(4) NOT NULL DEFAULT '0',
  `Created_At` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pengajuan_notif`
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
(17, 216, 3, 'terima_fo', 1, '2018-11-18 04:17:01'),
(18, 215, 4, 'fo', 1, '2018-12-31 02:00:04'),
(19, 215, 5, 'fo', 1, '2018-12-31 02:13:10'),
(20, 216, 5, 'terima_fo', 1, '2018-12-31 02:15:58'),
(21, 216, 4, 'terima_fo', 1, '2018-12-31 02:16:35'),
(22, 218, 5, 'terima_ksb_ren', 1, '2018-12-31 02:18:16'),
(23, 218, 4, 'terima_ksb_ren', 1, '2018-12-31 02:18:36'),
(24, 218, 3, 'terima_ksb_ren', 0, '2018-12-31 02:19:25'),
(25, 221, 5, 'usul_ke_kabag_peng', 1, '2018-12-31 02:21:21'),
(26, 213, 5, 'setuju_seleksi', 1, '2018-12-31 02:31:20'),
(27, 219, 5, 'setuju_seleksi', 0, '2018-12-31 02:31:20'),
(28, 214, 5, 'setuju_seleksi', 1, '2018-12-31 02:34:01'),
(29, 213, 5, 'pengkajian', 1, '2018-12-31 02:53:39'),
(30, 215, 6, 'fo', 1, '2019-01-16 10:15:32'),
(31, 216, 6, 'terima_fo', 1, '2019-01-16 10:18:17'),
(32, 218, 6, 'terima_ksb_ren', 1, '2019-01-16 10:24:09'),
(33, 221, 6, 'usul_ke_kabag_peng', 1, '2019-01-16 10:27:04'),
(34, 213, 6, 'setuju_seleksi', 1, '2019-01-16 10:30:10'),
(35, 219, 6, 'setuju_seleksi', 0, '2019-01-16 10:30:11'),
(36, 214, 6, 'lelang', 1, '2019-01-16 10:32:35'),
(37, 214, 6, 'lelang', 1, '2019-01-16 12:05:09');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengajuan_pengadaan`
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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pengajuan_pengadaan`
--

INSERT INTO `pengajuan_pengadaan` (`Id_Pengajuan_Pengadaan`, `PIN`, `Nama_Kegiatan`, `Paket_Pengadaan`, `Sumber_Dana`, `Pagu_Anggaran`, `HPS`, `Kode_Rekening_Max`, `Kode_RUP`, `Jenis_Kontrak`, `Jenis_Barang`, `Nama_PPTK`, `NIP`, `No_Hp`, `File_Verifikasi`, `Slug_Posisi`, `Progress`, `Id_User`, `Id_Pokja`, `Id_Kabag`, `Id_Ksb_Ren`, `Surat_Tugas_Pokja`, `Surat_Pengembalian`, `No_Surat_Pengembalian`, `Tgl_Pengembalian`, `Hasil_Kaji_Pokja`, `Hasil_Lelang`, `File_Hasil_Kaji`, `File_Hasil_Lelang`, `Jumlah_Sanggahan_Monev`, `File_Pendukung_Monev`, `File_Surat_TRC`, `File_Hasil_TRC`, `Created_At`, `Updated_At`, `Deleted_At`, `Kode_Verifikasi`) VALUES
(1, '5becba4517', 'Penyediaan alat tulis kantor', 'Belanja Bahan Pakai Habis Alat Tulis Kantor', 'APBD', '165603077', '100000000', '1.01.1.01.01.01.10.5.2.2.01.01', '10090668', 'pengadaan langsung', 'Barang', 'ida bagus edo', '510809099999999', '081926555555', NULL, 'ppk', 'lelang_diterima', 214, 213, 221, 216, 'ppk', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, NULL, NULL, '2018-11-15 00:13:57', '2018-11-15 01:17:05', NULL, 'e5527ba2a65c7e5e960d2cc4'),
(2, '5bed17b39a', 'Penyediaan alat tulis kantor', 'Belanja Bahan Pakai Habis Alat Tulis Kantor', 'APBD', '165603077', '200000000', '1.01.1.01.01.01.10.5.2.2.01.01', '10090668', 'pemilihan langsung', 'Barang', 'ida bagus edo', '510809099999999', '081926555555', NULL, 'pokja', 'setuju_seleksi', 214, 213, 221, 216, 'ppk', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-11-15 06:52:35', '2018-11-18 02:41:23', NULL, '3c9f531d38f4b040f2c9ce4f'),
(3, '5bf0e74f62', 'Pengadaan Mebeleur', 'Belanja Modal Peralatan dan Mesin - Pengadaan Alat Rumah Tangga', 'APBD', '54700000', '50500000', '2.10.2.10.01.01.02.10.5.2.3.28.01', '16763705', 'lelang cepat', 'Barang', 'tes nama pptk 2', '510809099999999', '081926555555', NULL, 'ksb_pel', 'terima_ksb_ren', 214, NULL, 221, 216, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-11-18 04:15:11', '2018-12-31 02:19:25', NULL, '18c8309d24d8d51841b72d91'),
(4, '5c2978241a', 'Penyusunan rancangan APBD dan rancangan perubahan APBD', 'Perangko, Material dan Benda Pos Lainnya', 'APBD', '1245000', '1245000', '1.01.1.01.01.16.30.5.2.2.01.04', '6325294', 'Lumsum', 'pemilihan langsung', 'nama pptk 1', '510809099999999', '081916524378', NULL, 'ksb_pel', 'terima_ksb_ren', 214, NULL, 221, 216, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-31 02:00:04', '2018-12-31 02:18:36', NULL, '25538ddeee256aee165c1237'),
(5, '5c297b36bc', 'Penyusunan rancangan APBD dan rancangan perubahan APBD', 'Perangko, Material dan Benda Pos Lainnya', 'APBD', '1245000', '1245000', '1.01.1.01.01.16.30.5.2.2.01.04', '6325294', 'Lumsum', 'pemilihan langsung', 'nama pptk 1', '510809099999999', '081916524378', NULL, 'pokja', 'pengkajian', 214, 213, 221, 216, 'nomor 1', NULL, NULL, NULL, '[{"isi":"tes"}]', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-31 02:13:10', '2018-12-31 02:53:39', NULL, 'ebc5d30708b07a5d6d6426a6'),
(6, '5c3f0444ad', 'Pengadaan Infrastruktur Jaringan Komunikasi dan Informasi', 'Belanja kawat/faksimili/internet/tv kabel/tv satelit', 'APBD', '1199000000', '1199000000', '2.10.2.10.01.20.04.5.2.2.03.06', '19067434', 'Lumsum', 'Jasa Lainnya', 'Agus Budi Arthana', '197905252009011014', '085792385997', NULL, 'pokja', 'lelang', 214, 213, 221, 216, '021232324340', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-01-16 10:15:32', '2019-01-16 00:05:09', NULL, '515e93e2fe13570984cc8ceb');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengajuan_pengadaan_catatan`
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
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pengajuan_pengadaan_catatan`
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
(15, 'Mohon ditindaklanjuti\r\n		', 1, '2018-11-18 04:17:05', NULL, 'fo', 'ksb_ren', 3),
(16, 'Mohon ditindaklanjuti\r\n                                ', 1, '2018-12-31 02:00:04', NULL, 'ppk', 'fo', 4),
(17, 'Mohon ditindaklanjuti\r\n                                ', 1, '2018-12-31 02:13:10', NULL, 'ppk', 'fo', 5),
(18, 'Mohon ditindaklanjuti\r\n		', 1, '2018-12-31 02:16:01', NULL, 'fo', 'ksb_ren', 5),
(19, 'Mohon ditindaklanjuti\r\n		', 1, '2018-12-31 02:16:38', NULL, 'fo', 'ksb_ren', 4),
(20, 'Mohon ditindaklanjuti\r\n		', 1, '2018-12-31 02:18:18', NULL, 'ksb_ren', 'ksb_pel', 5),
(21, 'Mohon ditindaklanjuti\r\n		', 1, '2018-12-31 02:18:41', NULL, 'ksb_ren', 'ksb_pel', 4),
(22, 'Mohon ditindaklanjuti\r\n		', 1, '2018-12-31 02:19:27', NULL, 'ksb_ren', 'ksb_pel', 3),
(23, 'Mohon ditindaklanjuti\r\n			', 1, '2018-12-31 02:21:21', NULL, 'ksb_pel', 'kabag', 5),
(24, 'Mohon ditindaklanjuti\r\n					', 1, '2018-12-31 02:31:24', NULL, 'kabag', 'pokja', 5),
(25, 'Mohon ditindaklanjuti\r\n						', 1, '2018-12-31 02:34:04', NULL, 'pokja', 'ppk', 5),
(26, 'Mohon ditindaklanjuti\r\n			', 1, '2018-12-31 02:53:39', NULL, 'ppk', 'pokja', 5),
(27, '<p>Yth.Kepala Layanan Bagian Pengadaan </p><p>Terlampir kami sampikan permohonan <br></p><p>Mohon ditindaklanjuti\r\n                                </p>', 1, '2019-01-16 10:15:32', NULL, 'ppk', 'fo', 6),
(28, '<p>Chek List Lengkap<br></p><p>Mohon ditindaklanjuti\r\n		</p>', 1, '2019-01-16 10:18:19', NULL, 'fo', 'ksb_ren', 6),
(29, 'Mohon ditindaklanjuti\r\n		', 1, '2019-01-16 10:24:11', NULL, 'ksb_ren', 'ksb_pel', 6),
(30, 'Mohon ditindaklanjuti\r\n			', 1, '2019-01-16 10:27:04', NULL, 'ksb_pel', 'kabag', 6),
(31, 'Mohon ditindaklanjuti\r\n					', 1, '2019-01-16 10:30:12', NULL, 'kabag', 'pokja', 6);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengajuan_pengadaan_chat`
--

CREATE TABLE IF NOT EXISTS `pengajuan_pengadaan_chat` (
  `id` int(11) NOT NULL,
  `Id_Pengajuan_Pengadaan` int(11) NOT NULL,
  `isi` varchar(100) NOT NULL,
  `Id_User` int(11) NOT NULL,
  `is_parent_pertanyaan` tinyint(4) NOT NULL DEFAULT '0',
  `posted_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pengajuan_pengadaan_chat`
--

INSERT INTO `pengajuan_pengadaan_chat` (`id`, `Id_Pengajuan_Pengadaan`, `isi`, `Id_User`, `is_parent_pertanyaan`, `posted_at`) VALUES
(1, 5, 'tes 123 sani lestari', 213, 0, '2018-12-31 02:34:20'),
(2, 5, 'yes', 214, 0, '2018-12-31 02:53:04');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengajuan_pengadaan_kelengkapan`
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
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pengajuan_pengadaan_kelengkapan`
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
(31, '773_bb772069bbbf6e1531b507dce204d5d3720c8dd2.txt', 11, 3, 0, 0, '', NULL, '2018-11-18 04:15:12', '2018-11-18 04:16:59'),
(32, '853268667_f7547d09817d297aef9404971f9d48080db6869c.pdf', 1, 5, 0, 0, '', NULL, '2018-12-31 02:13:10', '2018-12-31 02:15:58'),
(33, '1915664161_23e6dedb00a2f5fb8ac467fe384908d8c7bb8c73.rar', 2, 5, 0, 0, '', NULL, '2018-12-31 02:13:10', '2018-12-31 02:15:58'),
(34, '560110403_f7547d09817d297aef9404971f9d48080db6869c.pdf', 3, 5, 0, 0, '', NULL, '2018-12-31 02:13:10', '2018-12-31 02:15:58'),
(35, '105068939_124e0a6f8787c0ee648df9a5bd501832e9d0d69e.docx', 4, 5, 0, 0, '', NULL, '2018-12-31 02:13:10', '2018-12-31 02:15:58'),
(36, '1427971795_23e6dedb00a2f5fb8ac467fe384908d8c7bb8c73.rar', 5, 5, 0, 0, '', NULL, '2018-12-31 02:13:10', '2018-12-31 02:15:58'),
(37, '238707805_124e0a6f8787c0ee648df9a5bd501832e9d0d69e.docx', 6, 5, 0, 0, '', NULL, '2018-12-31 02:13:10', '2018-12-31 02:15:58'),
(38, '1081591682_124e0a6f8787c0ee648df9a5bd501832e9d0d69e.docx', 8, 5, 0, 0, '', NULL, '2018-12-31 02:13:10', '2018-12-31 02:15:58'),
(39, '1506752961_124e0a6f8787c0ee648df9a5bd501832e9d0d69e.docx', 9, 5, 0, 0, '', NULL, '2018-12-31 02:13:10', '2018-12-31 02:15:58'),
(40, '1056355208_124e0a6f8787c0ee648df9a5bd501832e9d0d69e.docx', 10, 5, 0, 0, '', NULL, '2018-12-31 02:13:10', '2018-12-31 02:15:58'),
(41, '32825013_2f0b4c018ab1b64b373527ccdbde1d8107e35cf1.pdf', 1, 6, 1, 0, '', NULL, '2019-01-16 10:15:32', '2019-01-15 22:18:17'),
(42, '1064606850_1c7ebf3b430029ce5769705df26319ecf4070be1.xlsx', 2, 6, 1, 0, '', NULL, '2019-01-16 10:15:32', '2019-01-15 22:18:17'),
(43, '588264029_2f0b4c018ab1b64b373527ccdbde1d8107e35cf1.pdf', 3, 6, 1, 0, '', NULL, '2019-01-16 10:15:32', '2019-01-15 22:18:17'),
(44, '2140469612_2f0b4c018ab1b64b373527ccdbde1d8107e35cf1.pdf', 4, 6, 1, 0, '', NULL, '2019-01-16 10:15:32', '2019-01-15 22:18:17'),
(45, '1199140973_1c7ebf3b430029ce5769705df26319ecf4070be1.xlsx', 5, 6, 1, 0, '', NULL, '2019-01-16 10:15:32', '2019-01-15 22:18:17'),
(46, '377117904_0e142f41c4c9e7f4b2fbc04187fe7068e24421a9.docx', 6, 6, 1, 0, '', NULL, '2019-01-16 10:15:32', '2019-01-15 22:18:17'),
(47, '1757621349_2f0b4c018ab1b64b373527ccdbde1d8107e35cf1.pdf', 7, 6, 1, 0, '', NULL, '2019-01-16 10:15:32', '2019-01-15 22:18:17'),
(48, '1281507266_55b0a9d3d4683389bdb3e7acaefd8007460f4262.docx', 8, 6, 1, 0, '', NULL, '2019-01-16 10:15:32', '2019-01-15 22:18:17'),
(49, '475244317_cbff08efd863ea53a39e536d8663f09011ffc3d3.docx', 9, 6, 1, 0, '', NULL, '2019-01-16 10:15:32', '2019-01-15 22:18:17'),
(50, '1520612595_cbff08efd863ea53a39e536d8663f09011ffc3d3.docx', 10, 6, 1, 0, '', NULL, '2019-01-16 10:15:32', '2019-01-15 22:18:17');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengajuan_pengadaan_kelengkapan_catatan`
--

CREATE TABLE IF NOT EXISTS `pengajuan_pengadaan_kelengkapan_catatan` (
  `Id_Catatan` int(11) NOT NULL,
  `Id_User` int(11) NOT NULL,
  `Isi_Catatan` text NOT NULL,
  `Id_Pengajuan_Pengadaan_Kelengkapan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengajuan_pengadaan_kelengkapan_history`
--

CREATE TABLE IF NOT EXISTS `pengajuan_pengadaan_kelengkapan_history` (
  `Id` int(11) NOT NULL,
  `Id_Pengajuan_Pengadaan_Kelengkapan` int(11) NOT NULL,
  `Nama_File` varchar(300) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `realisasi`
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
-- Dumping data untuk tabel `realisasi`
--

INSERT INTO `realisasi` (`id_realisasi`, `Id_Pengajuan_Pengadaan`, `tgl_proses_pengadaan`, `no_bast`, `tgl_bast`, `no_kontrak`, `tgl_kontrak`, `keterangan`) VALUES
(1, '1', '2018-11-15', '1/BAST/2018', '2018-11-01', '1/KONTRAK', '2018-11-22', 'lelang sudah selesai');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
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
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`Id_User`, `Nama_Lengkap`, `Username`, `Password`, `NIP_User`, `No_Ktp`, `No_Hp_User`, `Jabatan_User`, `Slug_Jabatan`, `Email`, `No_WA`, `No_Telegram`, `Master_Skpd_Id`, `IsActive`, `Id_Pokja`, `Last_Login`, `Last_Logout`, `Surat_tugas`, `Created_At`, `Updated_At`, `Deleted_At`) VALUES
(212, 'Bagian Layanan Pengadaan', 'bagian layanan pengadaan', '', NULL, NULL, NULL, NULL, 'admin', NULL, NULL, NULL, NULL, 1, NULL, '2019-01-20 18:04:34', '2018-12-31 02:33:25', NULL, '2018-11-13 06:12:29', NULL, NULL),
(213, 'pokja', 'pokja', 'c310d4706b8e836b940a8ddc7690a6420e113c31', '', '', '', NULL, 'pokja', 'sanilestari88@yahoo.com', '', '', 27, 1, 0, '2019-01-15 22:31:31', '2018-12-31 02:52:44', '18139_7ae443f6cd3eead9d57bc2dbcd2f56d3dfb7b8c7.txt', '2018-11-13 06:19:59', NULL, NULL),
(214, 'ppk', 'ppk', 'd2951c4504e6ac8a3416c488b41fda3968165cb0', '', '', '', NULL, 'ppk', 'aatrayudha@gmail.com', '', '081915656641', 27, 1, 0, '2019-01-16 00:08:49', '2019-01-15 22:16:20', '5496_7ae443f6cd3eead9d57bc2dbcd2f56d3dfb7b8c7.txt', '2018-11-13 06:30:05', NULL, NULL),
(215, 'front office', 'fo', '7bf0abc4896d985aa352b25c7bd241105dbc2b08', '', '', '', NULL, 'fo', 'sanilestari88@yahoo.com', '', '081915656641', 0, 1, 0, '2019-01-15 22:16:43', '2019-01-15 22:19:14', '10863_7ae443f6cd3eead9d57bc2dbcd2f56d3dfb7b8c7.txt', '2018-11-13 06:31:11', NULL, NULL),
(216, 'kasubag perencanaan pengadaan', 'kasubag_perencanaan', 'a1d8f75a3b2a001bd20b228fc6e84f5ca1f4d5b2', '', '', '', NULL, 'ksb_ren', 'sanilestari88@yahoo.com', '', '081915656641', 0, 1, 0, '2019-01-15 22:19:37', '2019-01-15 22:25:43', '4988_7ae443f6cd3eead9d57bc2dbcd2f56d3dfb7b8c7.txt', '2018-11-13 06:32:44', NULL, NULL),
(217, 'kepala bagian pelayanan pengadaan', 'kabag_pengadaan', '621cbd015252cd54c11908face45da7b260b9557', '', '', '', NULL, 'kabag_peng', 'sanilestari88@yahoo.com', '', '081915656641', 0, 1, 0, '2019-01-15 22:28:44', '2019-01-15 22:29:00', '17413_7ae443f6cd3eead9d57bc2dbcd2f56d3dfb7b8c7.txt', '2018-11-13 06:36:09', NULL, NULL),
(218, 'kepala sub bagian pelelangan', 'kasubag_pelelangan', '97e51abbb3e0c9cccd0f984fa83c86c4ac2b1358', '', '', '', NULL, 'ksb_pel', 'sanilestari88@yahoo.com', '', '081915656641', 0, 1, 0, '2019-01-15 22:26:05', '2019-01-15 22:28:23', '11354_7ae443f6cd3eead9d57bc2dbcd2f56d3dfb7b8c7.txt', '2018-11-13 06:37:26', NULL, NULL),
(219, 'anggota pokja', 'anggota_pokja', '5b581f07beea18730124147d5c6122eb5f3d749f', '', '', '', NULL, 'anggota_pokja', 'sanilestari88@yahoo.com', '', '081915656641', 0, 1, 213, '2018-11-15 00:26:46', '2018-11-15 00:27:29', '32395_7ae443f6cd3eead9d57bc2dbcd2f56d3dfb7b8c7.txt', '2018-11-13 06:38:41', NULL, NULL),
(220, 'kepala sub bagian monev', 'monev', 'f4c0915ea461f85988cd39bfc9afa28cca6c6cb4', '', '', '', NULL, 'monev', 'sanilestari88@yahoo.com', '', '081915656641', 0, 1, 0, '2018-11-15 01:16:12', '2018-11-15 01:16:48', '27496_7ae443f6cd3eead9d57bc2dbcd2f56d3dfb7b8c7.txt', '2018-11-13 06:39:37', NULL, NULL),
(221, 'kepala bagian', 'kabag', '2c7c09ccebb293e246f696202e8ad7a134d71f78', '', '', '', NULL, 'kabag', 'sanilestari88@yahoo.com', '', '081915656641', 0, 1, 0, '2019-01-15 22:29:30', '2019-01-15 22:30:49', '7041_7ae443f6cd3eead9d57bc2dbcd2f56d3dfb7b8c7.txt', '2018-11-13 06:40:15', NULL, NULL),
(222, 'ppk2', 'ppk2', 'daedaa0e25869b6cf36525d51c2d321335e69f71', '', '', '', NULL, 'ppk', 'sanilestari88@yahoo.com', '', '081916524378', 27, 1, 0, NULL, NULL, '13202_f9ca3b2864522588ce7447c113b994f65e59939c.txt', '2018-11-14 00:42:20', NULL, NULL),
(223, 'pokja2', 'pokja2', 'baa9f9f6ad184f4c0cd1819f5a64090f78615c77', '', '', '', NULL, 'pokja', '', '', '', 0, 1, 0, '2018-11-18 03:15:16', '2018-11-18 03:23:19', '2097_2cadbbd73b892dcd3cc65b78e1322df4f1bc212e.txt', '2018-11-18 02:34:06', NULL, NULL);

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
  ADD PRIMARY KEY (`Pengajuan_Pengadaan_Catatan_Id`),
  ADD KEY `Id_Pengajuan_Pengadaan` (`Id_Pengajuan_Pengadaan`);

--
-- Indexes for table `pengajuan_pengadaan_chat`
--
ALTER TABLE `pengajuan_pengadaan_chat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengajuan_pengadaan_kelengkapan`
--
ALTER TABLE `pengajuan_pengadaan_kelengkapan`
  ADD PRIMARY KEY (`Id_Pengajuan_Pengadaan_Kelengkapan`),
  ADD KEY `Id_Pengajuan_Pengadaan` (`Id_Pengajuan_Pengadaan`);

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
  ADD PRIMARY KEY (`Id_User`),
  ADD UNIQUE KEY `Username` (`Username`);

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
  MODIFY `id_log` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=423;
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
  MODIFY `Id_Notif` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT for table `pengajuan_pengadaan`
--
ALTER TABLE `pengajuan_pengadaan`
  MODIFY `Id_Pengajuan_Pengadaan` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `pengajuan_pengadaan_catatan`
--
ALTER TABLE `pengajuan_pengadaan_catatan`
  MODIFY `Pengajuan_Pengadaan_Catatan_Id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `pengajuan_pengadaan_chat`
--
ALTER TABLE `pengajuan_pengadaan_chat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `pengajuan_pengadaan_kelengkapan`
--
ALTER TABLE `pengajuan_pengadaan_kelengkapan`
  MODIFY `Id_Pengajuan_Pengadaan_Kelengkapan` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=51;
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
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `pengajuan_pengadaan_catatan`
--
ALTER TABLE `pengajuan_pengadaan_catatan`
  ADD CONSTRAINT `pengajuan_pengadaan_catatan_ibfk_1` FOREIGN KEY (`Id_Pengajuan_Pengadaan`) REFERENCES `pengajuan_pengadaan` (`Id_Pengajuan_Pengadaan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pengajuan_pengadaan_kelengkapan`
--
ALTER TABLE `pengajuan_pengadaan_kelengkapan`
  ADD CONSTRAINT `pengajuan_pengadaan_kelengkapan_ibfk_1` FOREIGN KEY (`Id_Pengajuan_Pengadaan`) REFERENCES `pengajuan_pengadaan` (`Id_Pengajuan_Pengadaan`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
