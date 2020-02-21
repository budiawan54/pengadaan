-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 14, 2017 at 09:09 AM
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
  `jenis` enum('Penyedia','Instansi') NOT NULL,
  `instansi` varchar(255) NOT NULL,
  `no_telp` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `unit_tujuan` varchar(10) NOT NULL,
  `keperluan` text NOT NULL,
  `no_urut` varchar(11) NOT NULL,
  `kode` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL DEFAULT 'mengantri',
  `catatan` text,
  `foto` text,
  `Master_Skpd_Id` int(11) DEFAULT NULL,
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
  `urutan` int(11) NOT NULL,
  `status` tinyint(4) DEFAULT '1',
  `kode` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jabatan_sistem`
--

INSERT INTO `jabatan_sistem` (`Id_Jabatan_Sistem`, `Slug_Jabatan`, `Nama_Jabatan`, `urutan`, `status`, `kode`) VALUES
(1, 'fo', 'Frontoffice', 3, 1, 'A'),
(2, 'kabag', 'Kepala Bagian Layanan Pengadaan', 4, 1, 'B'),
(3, 'ksb_ren', 'Kabubag perencanaan pengadaan\n', 5, 1, 'C'),
(4, 'ksb_pel', 'Kasubag Pelelangan\n', 6, 1, 'D'),
(5, 'monev', 'Kasubag Monev Pengadaan\n', 7, 1, 'E'),
(6, 'pokja', 'Ketua Pokja\n', 2, 1, 'F'),
(7, 'admin', 'Administrator', 1, 0, ''),
(8, 'anggota_pokja', 'Anggota Pokja', 9, 1, 'G'),
(9, 'pbj', 'Jabatan fungsional PBJ\n', 10, 1, 'H'),
(10, 'bukutamu', 'Buku tamu', 10, 0, '');

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

-- --------------------------------------------------------

--
-- Table structure for table `master_skpd`
--

CREATE TABLE `master_skpd` (
  `Master_Skpd_Id` int(11) NOT NULL,
  `Nama_Skpd` varchar(255) NOT NULL,
  `Alamat` text,
  `Email_Skpd` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `master_skpd`
--

INSERT INTO `master_skpd` (`Master_Skpd_Id`, `Nama_Skpd`, `Alamat`, `Email_Skpd`) VALUES
(1, 'KECAMATAN GEROKGAK ', '', ''),
(2, 'KECAMATAN SAWAN ', '', ''),
(3, 'DINAS ARSIP DAN PERPUSTAKAAN DAERAH ', '', ''),
(4, 'DINAS KETAHANAN PANGAN ', '', ''),
(5, 'KECAMATAN BANJAR ', '', ''),
(6, 'DINAS STATISTIK ', '', ''),
(7, 'KECAMATAN TEJAKULA ', '', ''),
(8, 'DINAS TENAGA KERJA ', '', ''),
(9, 'BADAN KESATUAN BANGSA DAN POLITIK ', '', ''),
(10, 'SEKRETARIAT DPRD ', '', ''),
(11, 'KECAMATAN KUBUTAMBAHAN ', '', ''),
(12, 'SATUAN POLISI PAMONG PRAJA ', '', ''),
(13, 'KECAMATAN SERIRIT ', '', ''),
(14, 'KECAMATAN SUKASADA ', '', ''),
(15, 'DINAS PEMADAM KEBAKARAN ', '', ''),
(16, 'INSPEKTORAT DAERAH ', '', ''),
(17, 'DINAS KOPERASI, USAHA KECIL DAN MENENGAH ', '', ''),
(18, 'DINAS SOSIAL ', '', ''),
(19, 'DINAS PENGENDALIAN PENDUDUK, KELUARGA BERENCANA, PEMBERDAYAAN PEREMPUAN DAN PERLINDUNGAN ANAK ', '', ''),
(20, 'DINAS KEPENDUDUKAN DAN PENCATATAN SIPIL ', '', ''),
(21, 'DINAS PENANAMAN MODAL DAN PELAYANAN PERIZINAN TERPADU SATU PINTU ', '', ''),
(22, 'DINAS PEMBERDAYAAN MASYARAKAT DAN DESA ', '', ''),
(23, 'KECAMATAN BUSUNGBIU ', '', ''),
(24, 'BADAN KEPEGAWAIAN DAN PENGEMBANGAN SUMBER DAYA MANUSIA KABUPATEN ', '', ''),
(25, 'DINAS PERHUBUNGAN ', '', ''),
(26, 'BADAN PENANGGULANGAN BENCANA DAERAH ', '', ''),
(27, 'DINAS KOMUNIKASI, INFORMATIKA DAN PERSANDIAN ', '', ''),
(28, 'BADAN PERENCANAAN PEMBANGUNAN DAERAH, PENELITIAN DAN PENGEMBANGAN ', '', ''),
(29, 'DINAS PERIKANAN ', '', ''),
(30, 'DINAS PARIWISATA ', '', ''),
(31, 'DINAS LINGKUNGAN HIDUP ', '', ''),
(32, 'KECAMATAN BULELENG ', '', ''),
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
(19, 'Administrator', 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', '', '', '', NULL, 'admin', '', '', '', NULL, 1, '2017-07-12 18:24:08', '2017-07-12 18:27:47', NULL, '2017-03-07 13:50:15', NULL, NULL),
(26, 'Buku Tamu', 'bukutamu', 'b9c9292c16e89e1aa34f40656b46850ee519e586', '', '', '', NULL, 'bukutamu', '', '', '', NULL, 1, '2017-07-12 18:27:54', '2017-07-12 18:36:25', NULL, '2017-07-13 06:01:03', NULL, NULL);

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
-- Indexes for table `master_skpd`
--
ALTER TABLE `master_skpd`
  ADD PRIMARY KEY (`Master_Skpd_Id`);

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
-- AUTO_INCREMENT for table `master_skpd`
--
ALTER TABLE `master_skpd`
  MODIFY `Master_Skpd_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `Id_User` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
