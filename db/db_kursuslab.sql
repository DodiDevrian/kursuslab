-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 24, 2025 at 02:10 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_kursuslab`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id_admin` int(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` int(11) NOT NULL DEFAULT 2,
  `nama_dosen` varchar(500) NOT NULL,
  `email` varchar(255) NOT NULL,
  `nip` varchar(100) DEFAULT NULL,
  `foto_dosen` text DEFAULT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `modified` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id_admin`, `username`, `password`, `role`, `nama_dosen`, `email`, `nip`, `foto_dosen`, `created`, `modified`) VALUES
(1, 'andika', 'andika123', 2, 'Andika Setiawan S.Kom., M.Cs.', 'andika.setiawan@if.itera.ac.id', '19911127 2022 03 1 007', 'ANS.jpg', '2024-09-26 09:36:55', NULL),
(2, 'aidil', 'aidil123', 2, 'Aidil Afriansyah, S.Kom., M.Kom.', 'aidil.afriansyah@if.itera.ac.id', '19910416 201903 1 015', 'AAF.jpg', '2024-09-26 09:36:55', NULL),
(3, 'cahyo', 'cahyo123', 2, 'Meida Cahyo Untoro S.Kom., M.Kom', 'cahyo.untoro@if.itera.ac.id', '19890518 201903 1 011', 'MCU.jpg', '2024-09-26 09:41:36', NULL),
(4, 'radhinka', 'radhinka123', 2, 'Radhinka Bagaskara, S.Si.Kom., M.Si., M.Sc.', 'radhinka.bagaskara@if.itera.ac.id', '19941127 202012 1 018', 'RDB.jpg', '2024-09-30 10:26:18', NULL),
(5, 'admin', 'admin123', 1, 'Admin Laboran', 'admin@admin.com', NULL, NULL, '2024-12-05 07:58:39', NULL),
(6, 'hartanto', 'hartanto123', 2, 'Hartanto Tantriawan, S.Kom., M.Kom.', 'hartanto.tantriawan@if.itera.ac.id', '19920522 201903 1 012', 'HTA.jpg', '2024-12-05 22:56:02', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_asprak`
--

CREATE TABLE `tbl_asprak` (
  `id_asprak` int(255) NOT NULL,
  `id_user` int(255) NOT NULL,
  `nama_asprak` varchar(500) NOT NULL,
  `no_hp` bigint(255) DEFAULT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `modified` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_asprak`
--

INSERT INTO `tbl_asprak` (`id_asprak`, `id_user`, `nama_asprak`, `no_hp`, `created`, `modified`) VALUES
(7, 7, 'Ahmad Akbar', 85788113563, '2024-09-26 16:27:10', '2025-02-04 21:39:47'),
(8, 8, 'Nurdana Jaya', 85788113563, '2024-09-26 16:27:10', '2025-02-04 21:39:54'),
(9, 9, 'Wili Jonatan', 81389654250, '2024-09-26 16:27:10', '2025-02-04 21:39:59'),
(10, 10, 'Michael Mathew', 89628744896, '2024-12-04 06:07:30', NULL),
(11, 11, 'Dila Ayu Prastita', 89628744896, '2024-12-04 06:15:37', NULL),
(12, 12, 'Dimas Azi Rajab Aizar', 89628744896, '2024-12-04 06:15:37', NULL),
(13, 13, 'Dwi Ananda Rizky', 89628744896, '2024-12-04 06:22:35', NULL),
(14, 14, 'Edo Sani', 89628744896, '2024-12-04 06:22:35', NULL),
(16, 16, 'Punky Wijayanto Muda', 89628744878, '2025-02-04 23:08:12', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_asset`
--

CREATE TABLE `tbl_asset` (
  `id_asset` int(255) NOT NULL,
  `foto_asset` text NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `modified` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_asset`
--

INSERT INTO `tbl_asset` (`id_asset`, `foto_asset`, `created`, `modified`) VALUES
(2, '3.jpg', '2024-09-23 22:29:36', NULL),
(3, 'e8c7334eca29eb90f9a8cfadb7763ae5.jpg', '2024-09-23 22:29:36', NULL),
(4, 'Gambar_Lab_2.jpg', '2024-09-23 22:29:36', NULL),
(5, 'ifiterablack.png', '2024-09-23 22:29:36', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_banksoalpretest`
--

CREATE TABLE `tbl_banksoalpretest` (
  `id_soal` int(255) NOT NULL,
  `id_materi` int(255) NOT NULL,
  `soal` text NOT NULL,
  `jawaban_a` text NOT NULL,
  `jawaban_b` text NOT NULL,
  `jawaban_c` text NOT NULL,
  `jawaban_d` text NOT NULL,
  `jawaban_e` text NOT NULL,
  `keypretest` varchar(255) NOT NULL,
  `nomor_soal` varchar(255) DEFAULT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `modified` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_clogin`
--

CREATE TABLE `tbl_clogin` (
  `id_clogin` int(255) NOT NULL,
  `foto_login` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_clogin`
--

INSERT INTO `tbl_clogin` (`id_clogin`, `foto_login`) VALUES
(1, '3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_diskusi`
--

CREATE TABLE `tbl_diskusi` (
  `id_diskusi` int(255) NOT NULL,
  `id_user` int(255) NOT NULL,
  `id_kursus` int(255) NOT NULL,
  `id_asprak` int(255) DEFAULT NULL,
  `diskusi_user` text NOT NULL,
  `diskusi_asprak` text NOT NULL,
  `foto_diskusi` text DEFAULT NULL,
  `foto_diskusi_asprak` text DEFAULT NULL,
  `created_diskusi` datetime NOT NULL DEFAULT current_timestamp(),
  `modified_diskusi` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_diskusi`
--

INSERT INTO `tbl_diskusi` (`id_diskusi`, `id_user`, `id_kursus`, `id_asprak`, `diskusi_user`, `diskusi_asprak`, `foto_diskusi`, `foto_diskusi_asprak`, `created_diskusi`, `modified_diskusi`) VALUES
(1, 1, 1, 1, 'Permisi kak, maaf izin bertanya terkait materi pertemuan ke 7 apakah sudah di upload modulnya kak, terima kasih kak', 'Oke iuasd iubuhba usb unjasbd jhb javsasdd yv', NULL, NULL, '2024-09-25 09:48:43', '2024-09-28 07:30:16'),
(2, 1, 5, 16, 'Bagiamana kalau Modul Tetap di sediakan?', 'lorem ipsum bhw jbjhbad', NULL, NULL, '2024-09-27 08:31:34', '2025-02-08 15:28:16'),
(4, 1, 12, 1, 'Bagaimana jika apakah?', '', NULL, NULL, '2024-09-30 09:33:24', NULL),
(5, 1, 12, 1, 'Bagaimana Jika apakah kalau?', '', 'U9Vdxcb-avenged-sevenfold-wallpaper-hd.jpg', NULL, '2024-09-30 09:36:11', NULL),
(6, 1, 6, 6, 'Bagaimana Jika wahhb ahb jhbasjdb?', 'dsaiudhaui sdiuahd ihasdui hasuidh asuidh uisa dhuisadh ', 'WhatsApp_Image_2024-07-21_at_16_12_04.jpeg', '20200730090409.jpg', '2024-09-30 09:42:55', '2025-02-11 06:10:34'),
(7, 1, 1, 7, 'Test 1 2 3 4 Haloo word', 'Iya seperti itu sudah benar', NULL, NULL, '2024-12-04 01:11:20', '2025-02-04 21:41:08'),
(9, 15, 1, 1, 'Maaf kak, ini gimana ya kak yaa', '', NULL, NULL, '2024-12-05 23:53:14', NULL),
(10, 15, 4, 10, 'Untuk materi minggu depan apakah sudah dishare kak?', '', NULL, NULL, '2025-02-04 21:59:29', NULL),
(11, 15, 1, 7, 'Maaf kak, untuk pertemuan selanjutnya apakah ada tugas?', '', NULL, NULL, '2025-02-04 22:04:59', '2025-02-04 22:06:05'),
(12, 15, 1, 7, 'adfsdfasdf', '', NULL, NULL, '2025-02-05 23:07:44', '2025-02-05 23:23:05'),
(19, 1, 1, 7, 'Permisi kak, maaf izin bertanya terkait materi pertemuan ke 7 apakah sudah di upload modulnya kak, terima kasih kak lorem ipsupm saiui iasdhiuh iasuhdih iasudhiuasdh iuashduias hduiashd iuh', '', NULL, NULL, '2025-02-10 15:44:30', NULL),
(20, 1, 1, 7, 'Permisi kak, maaf izin bertanya terkait materi pertemuan ke 7 apakah sudah di upload modulnya kak, terima kasih kak', '', NULL, NULL, '2025-02-10 17:06:10', NULL),
(21, 1, 1, 7, 'Permisi kak, maaf izin bertanya terkait materi pertemuan ke 7 apakah sudah di upload modulnya kak, terima kasih kak', '', NULL, NULL, '2025-02-10 17:06:14', NULL),
(22, 1, 1, 7, 'Permisi kak, maaf izin bertanya terkait materi pertemuan ke 7 apakah sudah di upload modulnya kak, terima kasih kak', '', NULL, NULL, '2025-02-10 17:06:18', NULL),
(23, 1, 1, 7, 'Permisi kak, maaf izin bertanya terkait materi pertemuan ke 7 apakah sudah di upload modulnya kak, terima kasih kak', '', NULL, NULL, '2025-02-10 17:06:49', NULL),
(24, 1, 1, 7, 'Permisi kak, maaf izin bertanya terkait materi pertemuan ke 7 apakah sudah di upload modulnya kak, terima kasih kak', 'Boleeh', NULL, 'wallpaperflare_com_wallpaper_(4).jpg', '2025-02-10 17:06:57', '2025-02-13 18:35:13');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_do_pretest`
--

CREATE TABLE `tbl_do_pretest` (
  `id_dopretest` int(255) NOT NULL,
  `id_user` int(255) NOT NULL,
  `id_kursus` int(255) NOT NULL,
  `id_materi` int(255) NOT NULL,
  `jawab_1` varchar(255) NOT NULL,
  `jawab_2` varchar(255) NOT NULL,
  `jawab_3` varchar(255) NOT NULL,
  `jawab_4` varchar(255) NOT NULL,
  `jawab_5` varchar(255) NOT NULL,
  `jawab_6` varchar(255) NOT NULL,
  `jawab_7` varchar(255) NOT NULL,
  `jawab_8` varchar(255) NOT NULL,
  `jawab_9` varchar(255) NOT NULL,
  `jawab_10` varchar(255) NOT NULL,
  `poin_1` int(255) DEFAULT NULL,
  `poin_2` int(255) DEFAULT NULL,
  `poin_3` int(255) DEFAULT NULL,
  `poin_4` int(255) DEFAULT NULL,
  `poin_5` int(255) DEFAULT NULL,
  `poin_6` int(255) DEFAULT NULL,
  `poin_7` int(255) DEFAULT NULL,
  `poin_8` int(255) DEFAULT NULL,
  `poin_9` int(255) DEFAULT NULL,
  `poin_10` int(255) DEFAULT NULL,
  `sum` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_do_pretest`
--

INSERT INTO `tbl_do_pretest` (`id_dopretest`, `id_user`, `id_kursus`, `id_materi`, `jawab_1`, `jawab_2`, `jawab_3`, `jawab_4`, `jawab_5`, `jawab_6`, `jawab_7`, `jawab_8`, `jawab_9`, `jawab_10`, `poin_1`, `poin_2`, `poin_3`, `poin_4`, `poin_5`, `poin_6`, `poin_7`, `poin_8`, `poin_9`, `poin_10`, `sum`) VALUES
(12, 1, 1, 2, 'C', 'C', 'B', 'B', 'C', 'B', 'B', 'B', 'B', 'B', 10, 10, 10, 0, 0, 10, 10, 10, 0, 10, 70);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kunci_pretest`
--

CREATE TABLE `tbl_kunci_pretest` (
  `id_kuncipretest` int(255) NOT NULL,
  `id_materi` int(255) NOT NULL,
  `kunci_1` varchar(255) NOT NULL,
  `kunci_2` varchar(500) NOT NULL,
  `kunci_3` varchar(255) NOT NULL,
  `kunci_4` varchar(100) NOT NULL,
  `kunci_5` varchar(255) NOT NULL,
  `kunci_6` varchar(255) NOT NULL,
  `kunci_7` varchar(255) NOT NULL,
  `kunci_8` varchar(255) NOT NULL,
  `kunci_9` varchar(255) NOT NULL,
  `kunci_10` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_kunci_pretest`
--

INSERT INTO `tbl_kunci_pretest` (`id_kuncipretest`, `id_materi`, `kunci_1`, `kunci_2`, `kunci_3`, `kunci_4`, `kunci_5`, `kunci_6`, `kunci_7`, `kunci_8`, `kunci_9`, `kunci_10`) VALUES
(1, 1, 'A', 'B', 'C', 'D', 'E', 'A', 'C', 'D', 'E', 'D'),
(7, 6, 'A', 'B', 'C', 'C', 'E', 'C', 'B', 'C', 'D', 'E'),
(8, 2, 'C', 'C', 'B', 'C', 'B', 'B', 'B', 'B', 'D', 'B');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kursus`
--

CREATE TABLE `tbl_kursus` (
  `id_kursus` int(255) NOT NULL,
  `id_admin` int(255) NOT NULL,
  `id_asprak` int(255) NOT NULL,
  `nama_kursus` varchar(100) DEFAULT NULL,
  `slug_kursus` text DEFAULT NULL,
  `ket_kursus` varchar(255) DEFAULT NULL,
  `cover_kursus` text DEFAULT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `modified` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_kursus`
--

INSERT INTO `tbl_kursus` (`id_kursus`, `id_admin`, `id_asprak`, `nama_kursus`, `slug_kursus`, `ket_kursus`, `cover_kursus`, `created`, `modified`) VALUES
(1, 1, 7, 'Pemrograman Web', 'Pemrograman-Web', 'Lorem ipusm bala bala oye asdg ihasdi biaushd ibasid biubasdbi ubsadibais dbiuasb duyagb iaushfb iashbf usbds f', 'pemweb.jpg', '2024-09-23 22:32:25', '2025-02-24 10:56:05'),
(2, 2, 11, 'Sistem Tertanam', 'Sistem-Tertanam', 'Lorem Ipsum Bala bala okay', 'sister.jpg', '2024-09-23 22:32:25', '2025-02-24 10:58:29'),
(4, 1, 10, 'Jaringan Komputer', 'Jaringan-Komputer', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras et lectus id dolor ultricies ultricies eget at nibh. Aliquam in lobortis arcu, non tempor purus. Donec a aliquam purus. Quisque nec felis id tortor bibendum suscipit in faucibus est.', 'jarkom.jpg', '2024-09-23 22:32:25', '2025-02-24 10:59:09'),
(5, 2, 11, 'Algoritma Pemrograman 1', 'Algoritma-Pemrograman-1', 'Algoritma Pemrograman 1 adalah matakuliah yang mempelajari tentang dasar-dasar pemrograman menggunaan bahasa C++<br>Materi yang di palajari pada&nbsp;<span>Algoritma Pemrograman 1 adalah sebagai berikut:<br></span>', 'alpro1.jpg', '2024-09-23 22:32:25', '2025-02-24 11:00:21'),
(6, 3, 12, 'Algoritma Pemrograman 2', 'Algoritma-Pemrograman-2', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras et lectus id dolor ultricies ultricies eget at nibh. Aliquam in lobortis arcu, non tempor purus. Donec a aliquam purus. Quisque nec felis id tortor bibendum suscipit in faucibus est.', 'alpro2.jpg', '2024-09-23 22:32:25', '2025-02-24 11:02:49'),
(10, 3, 13, 'Pemrograman Berbasis Objek', 'Pemrograman-Berbasis-Objek', 'Lorem Ipsum', 'pbo.jpg', '2024-09-23 22:32:25', '2025-02-24 11:04:03'),
(11, 1, 14, 'Pengembangan Aplikasi Mobile', 'pengembangan-aplikasi-mobile', 'Lorem ipsum bla bla', 'pam.jpg', '2024-09-23 22:32:25', '2025-02-24 11:04:44'),
(12, 2, 10, 'Basis Data', 'basis-data', 'Lorem Ipsum wa we wo Done', 'basdat.jpg', '2024-09-23 22:32:25', '2025-02-24 11:05:16'),
(22, 3, 16, 'Proyek Teknologi Informasi', 'proyek-teknologi-informasi', 'sfsdf d fdg fh&nbsp;&nbsp;', 'pti.jpg', '2025-02-12 10:31:51', '2025-02-24 11:06:12');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_materi`
--

CREATE TABLE `tbl_materi` (
  `id_materi` int(255) NOT NULL,
  `id_kursus` int(255) NOT NULL,
  `nama_materi` varchar(255) NOT NULL,
  `ket_materi` text NOT NULL,
  `id_yt` varchar(255) NOT NULL,
  `doc_materi` varchar(255) DEFAULT NULL,
  `note` text DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `status_pretest` varchar(255) DEFAULT NULL,
  `cek_last` varchar(255) DEFAULT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `modified` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_materi`
--

INSERT INTO `tbl_materi` (`id_materi`, `id_kursus`, `nama_materi`, `ket_materi`, `id_yt`, `doc_materi`, `note`, `status`, `status_pretest`, `cek_last`, `created`, `modified`) VALUES
(1, 1, 'Pertemuan 1 - HTML 5', 'Lorem Ipsum', 'riSLlQTLHCs', 'XP_part_2.pdf', NULL, 2, 'No', 'No', '2024-09-23 22:59:30', '2025-02-24 11:17:33'),
(2, 1, 'Pertemuan 2 - CSS', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc dictum, mi sed euismod scelerisque, nunc enim fermentum purus, sed vulputate dui tortor id magna. Proin sed pulvinar nisi, vel rutrum erat. Duis augue diam, pharet', 'WxKLNqpmZBk', 'gambar.png', '-', 2, 'Yes', 'No', '2024-09-23 22:59:30', '2025-02-21 21:00:23'),
(3, 1, 'Pertemuan 3 - JacaScript', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc dictum, mi sed euismod scelerisque, nunc enim fermentum purus, sed vulputate dui tortor id magna. Proin sed pulvinar nisi, vel rutrum erat. Duis augue diam, pharet', 'WxKLNqpmZBk', 'Dodi_Devrian_Andrianto__119140023_PemotonganUKT.pdf', NULL, 2, 'Yes', 'No', '2024-09-23 22:59:30', '2025-02-21 23:36:49'),
(4, 4, 'Pertemuan 1 - Instalasi Cisco', 'Lorem ipsum new pro', 'HS_RPLa5gPw', 'gambar.png', 'Sudah Baik', 2, 'No', 'No', '2024-09-23 22:59:30', '2025-02-21 21:00:29'),
(5, 5, 'Pertemuan 1 - C++', 'Lorem ipsum bala bala bala Data di ubah', 'WxKLNqpmZBk', 'gambar.png', NULL, 2, 'No', 'No', '2024-09-23 22:59:30', '2025-02-21 21:00:31'),
(6, 12, 'Pertemuan 1 - Mengenal Cisco', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc dictum, mi sed euismod scelerisque, nunc enim fermentum purus, sed vulputate dui tortor id magna. Proin sed pulvinar nisi, vel rutrum erat. Duis augue diam, pharet', 'WxKLNqpmZBk', 'gambar.png', NULL, 2, 'No', 'No', '2024-09-23 22:59:30', '2025-02-21 21:00:33'),
(7, 4, 'Pertemuan 2 - Cisco', 'Lorem ipsum new era', 'HS_RPLa5gPw', 'FORM_7_Daftar_Hadir_Seminar.pdf', '-', 1, 'Yes', 'No', '2024-09-23 22:59:30', '2025-02-21 21:00:35'),
(12, 5, 'Pertemuan 2 - Operation C++', 'lorem', 'HS_RPLa5gPw', '60-70a.pdf', NULL, 2, 'Yes', 'No', '2024-09-23 22:59:30', '2025-02-21 21:00:37'),
(13, 5, 'Pertemuan 3 - Array', 'lorem ipsum', '8OxTG8plkz4', 'Elegant_Template_by_WrapPixel.pdf', NULL, 2, 'Yes', 'No', '2024-09-23 22:59:30', '2025-02-21 21:00:38'),
(18, 12, 'Pertemuan 2 - Queue', 'asdasd a sa das da sd', '8OxTG8plkz4', '1476-5465-1-PB.pdf', NULL, 2, 'Yes', 'No', '2024-09-23 22:59:30', '2025-02-21 21:00:40'),
(19, 5, 'Pertemuan 4 - Percabangan dan Perulangan', 'dfasds df sdf sd sd f', '8OxTG8plkz4', '1439-3371-1-PB.pdf', NULL, 1, 'Yes', 'No', '2024-09-23 22:59:30', '2025-02-21 21:00:42'),
(20, 12, 'Pertemuan 3 - Prosedur dan Function', 'uiashdia diahsdhas dahsdi asihdauishd ', 'HS_RPLa5gPw', 'METODE_EXTREME_PROGRAMMING_PADA_PEMBANGUNAN_WEB_AP.pdf', 'Kurang detail', 1, 'Yes', 'No', '2024-09-23 22:59:30', '2025-02-21 21:00:44'),
(21, 5, 'Pertemuan 5 - If, Else If, dan Else', 'asdasd asd asd', 'HS_RPLa5gPw', '203-760-1-PB.pdf', NULL, 1, 'Yes', 'No', '2024-09-23 22:59:30', '2025-02-21 21:00:46'),
(22, 22, 'Pertemuan 1 - Pengenalan Proyek', 'Lorem', 'HS_RPLa5gPw', 'CV-MUHAMMAD_ASYROFUL_NUR_MAULANA_YUSUF.pdf', '-', 1, NULL, NULL, '2025-02-21 23:37:46', NULL),
(23, 1, 'Pertemuan 4 - Framework', 'Lorem', 'QdvWhjM8Srg', 'asdasd.pdf', 'Belum sesuai dengan modul', 1, 'Yes', 'No', '2025-02-21 23:45:11', '2025-02-24 11:20:05');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_posttest`
--

CREATE TABLE `tbl_posttest` (
  `id_posttest` int(255) NOT NULL,
  `id_kursus` int(255) NOT NULL,
  `nomor_soal` int(11) NOT NULL,
  `soal` text NOT NULL,
  `jawaban_a` text NOT NULL,
  `jawaban_b` text NOT NULL,
  `jawaban_c` text NOT NULL,
  `jawaban_d` text NOT NULL,
  `jawaban_e` text NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `modified` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pretest`
--

CREATE TABLE `tbl_pretest` (
  `id_pretest` int(255) NOT NULL,
  `id_materi` int(255) NOT NULL,
  `nomor_soal` varchar(255) DEFAULT NULL,
  `soal` text NOT NULL,
  `jawaban_a` text NOT NULL,
  `jawaban_b` text NOT NULL,
  `jawaban_c` text NOT NULL,
  `jawaban_d` text NOT NULL,
  `jawaban_e` text NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `modified` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_pretest`
--

INSERT INTO `tbl_pretest` (`id_pretest`, `id_materi`, `nomor_soal`, `soal`, `jawaban_a`, `jawaban_b`, `jawaban_c`, `jawaban_d`, `jawaban_e`, `created`, `modified`) VALUES
(1, 1, NULL, 'Apakah???', 'ada', 'ava', 'afa', 'aea', 'ara', '2025-02-14 16:35:50', NULL),
(2, 2, NULL, 'Akankah akankah??', 'fgd', 'hfgh', 'dfgdg', 'sdfsf', 'fghfgh', '2025-02-14 16:35:50', NULL),
(3, 1, NULL, 'asd as as as&nbsp;', ' asdas  asd', 'f dgdf hf g ', 'hfg jg kgkf ', 'jdj dyjd y', ' syjs ry', '2025-02-14 16:35:50', NULL),
(4, 1, NULL, 'Soal ke 3 dengan bjasok askdhash djk?', 'asdasd sad as dasd', 's fsd fsd fds fsd f', 'dsfsdf sdf sdf', 'sd fsdf dsfsd f sd', 'sdf sdf sdf ds fsdf dfg df g', '2025-02-14 16:35:50', NULL),
(5, 1, NULL, 'Soal 4 asdhkj khasdkjha kdhakjsd hads', 'asd', 'sdg g', 'df gdfg', 'fgh fg', 'ryeyerte5', '2025-02-14 16:35:50', NULL),
(6, 1, NULL, 'Soal 5 hfiush fishdfi usdhf idhf?', 'asdafsgfdhgf jhs', ' awfsgdhgf dfhgdsfad', 'fdgzfd gzdf gd g', 'dytdtydtjs   sth str sh', 's fdz zdf gzf g', '2025-02-14 16:35:50', NULL),
(7, 1, NULL, 'Soal Nomor 6', 'Soal Nomor 6', 'Soal Nomor 6', 'Soal Nomor 6', 'Soal Nomor 6', 'Soal Nomor 6', '2025-02-14 16:35:50', NULL),
(8, 1, NULL, 'Soal Nomor 7', 'Soal Nomor 7', 'Soal Nomor 7', 'Soal Nomor 7', 'Soal Nomor 7', 'Soal Nomor 7', '2025-02-14 16:35:50', NULL),
(9, 1, NULL, 'Soal Nomor 8', 'Soal Nomor 8', 'Soal Nomor 8', 'Soal Nomor 8', 'Soal Nomor 8', 'Soal Nomor 8', '2025-02-14 16:35:50', NULL),
(10, 1, NULL, 'Soal Nomor 9', 'Soal Nomor 9', 'Soal Nomor 9', 'Soal Nomor 9', 'Soal Nomor 9', 'Soal Nomor 9', '2025-02-14 16:35:50', NULL),
(11, 1, NULL, 'Soal Nomor 10', 'Soal Nomor 10', 'Soal Nomor 10', 'Soal Nomor 10', 'Soal Nomor 10', 'Soal Nomor 10', '2025-02-14 16:35:50', NULL),
(12, 2, NULL, 'Pertemuan 2 - CSS', 'Pertemuan 2 - CSS Soal Nomor 2', 'Pertemuan 2 - CSS Soal Nomor 2', 'Pertemuan 2 - CSS Soal Nomor 2', 'Pertemuan 2 - CSS Soal Nomor 2', 'Pertemuan 2 - CSS Soal Nomor 2', '2025-02-14 16:40:16', NULL),
(13, 2, NULL, 'Pertemuan 2 - CSS Soal Nomor 3', 'Pertemuan 2 - CSS Soal Nomor 3', 'Pertemuan 2 - CSS Soal Nomor 3', 'Pertemuan 2 - CSS Soal Nomor 3', 'Pertemuan 2 - CSS Soal Nomor 3', 'Pertemuan 2 - CSS Soal Nomor 3', '2025-02-14 16:41:32', NULL),
(14, 2, NULL, 'Pertemuan 2 - CSS&nbsp;Soal Nomor 4', 'Pertemuan 2 - CSS Soal Nomor 4', 'Pertemuan 2 - CSS Soal Nomor 4', 'Pertemuan 2 - CSS Soal Nomor 4', 'Pertemuan 2 - CSS Soal Nomor 4', 'Pertemuan 2 - CSS Soal Nomor 4', '2025-02-14 16:49:24', NULL),
(15, 2, NULL, 'Pertemuan 2 - CSS&nbsp;Soal Nomor 5', 'Pertemuan 2 - CSS Soal Nomor 5', 'Pertemuan 2 - CSS Soal Nomor 5', 'Pertemuan 2 - CSS Soal Nomor 5', 'Pertemuan 2 - CSS Soal Nomor 5', 'Pertemuan 2 - CSS Soal Nomor 5', '2025-02-14 16:49:42', NULL),
(16, 2, NULL, 'Pertemuan 2 - CSS&nbsp;Soal Nomor 6', 'Pertemuan 2 - CSS Soal Nomor 6', 'Pertemuan 2 - CSS Soal Nomor 6', 'Pertemuan 2 - CSS Soal Nomor 6', 'Pertemuan 2 - CSS Soal Nomor 6', 'Pertemuan 2 - CSS Soal Nomor 6', '2025-02-14 16:50:01', NULL),
(17, 2, NULL, 'Pertemuan 2 - CSS&nbsp;Soal Nomor 7', 'Pertemuan 2 - CSS Soal Nomor 7', 'Pertemuan 2 - CSS Soal Nomor 7', 'Pertemuan 2 - CSS Soal Nomor 7', 'Pertemuan 2 - CSS Soal Nomor 7', 'Pertemuan 2 - CSS Soal Nomor 7', '2025-02-14 16:59:25', NULL),
(18, 6, '1', 'Soal Nomor 1&nbsp;Pertemuan 1 - Mengenal Cisco', 'Soal Nomor 1 Pertemuan 1 - Mengenal Cisco', 'Soal Nomor 1 Pertemuan 1 - Mengenal Cisco', 'Soal Nomor 1 Pertemuan 1 - Mengenal Cisco', 'Soal Nomor 1 Pertemuan 1 - Mengenal Cisco', 'Soal Nomor 1 Pertemuan 1 - Mengenal Cisco', '2025-02-19 23:15:11', '2025-02-20 11:48:32'),
(19, 6, '2', 'Soal Nomor 1&nbsp;Pertemuan 1 - Mengenal Cisco', 'Soal Nomor 1 Pertemuan 1 - Mengenal Cisco', 'Soal Nomor 1 Pertemuan 1 - Mengenal Cisco', 'Soal Nomor 1 Pertemuan 1 - Mengenal Cisco', 'Soal Nomor 1 Pertemuan 1 - Mengenal Cisco', 'Soal Nomor 1 Pertemuan 1 - Mengenal Cisco', '2025-02-19 23:15:11', '2025-02-20 11:48:32'),
(20, 6, '3', 'Soal Nomor 1&nbsp;Pertemuan 1 - Mengenal Cisco', 'Soal Nomor 1 Pertemuan 1 - Mengenal Cisco', 'Soal Nomor 1 Pertemuan 1 - Mengenal Cisco', 'Soal Nomor 1 Pertemuan 1 - Mengenal Cisco', 'Soal Nomor 1 Pertemuan 1 - Mengenal Cisco', 'Soal Nomor 1 Pertemuan 1 - Mengenal Cisco', '2025-02-19 23:15:11', '2025-02-20 11:48:32'),
(21, 6, '4', 'Soal Nomor 1&nbsp;Pertemuan 1 - Mengenal Cisco', 'Soal Nomor 1 Pertemuan 1 - Mengenal Cisco', 'Soal Nomor 1 Pertemuan 1 - Mengenal Cisco', 'Soal Nomor 1 Pertemuan 1 - Mengenal Cisco', 'Soal Nomor 1 Pertemuan 1 - Mengenal Cisco', 'Soal Nomor 1 Pertemuan 1 - Mengenal Cisco', '2025-02-19 23:15:11', '2025-02-20 11:48:39'),
(22, 6, '5', 'Soal Nomor 1&nbsp;Pertemuan 1 - Mengenal Cisco', 'Soal Nomor 1 Pertemuan 1 - Mengenal Cisco', 'Soal Nomor 1 Pertemuan 1 - Mengenal Cisco', 'Soal Nomor 1 Pertemuan 1 - Mengenal Cisco', 'Soal Nomor 1 Pertemuan 1 - Mengenal Cisco', 'Soal Nomor 1 Pertemuan 1 - Mengenal Cisco', '2025-02-19 23:15:11', '2025-02-20 11:48:41'),
(23, 6, '6', 'Soal Nomor 1&nbsp;Pertemuan 1 - Mengenal Cisco', 'Soal Nomor 1 Pertemuan 1 - Mengenal Cisco', 'Soal Nomor 1 Pertemuan 1 - Mengenal Cisco', 'Soal Nomor 1 Pertemuan 1 - Mengenal Cisco', 'Soal Nomor 1 Pertemuan 1 - Mengenal Cisco', 'Soal Nomor 1 Pertemuan 1 - Mengenal Cisco', '2025-02-19 23:15:11', '2025-02-20 11:48:44'),
(24, 6, '7', 'Soal Nomor 1&nbsp;Pertemuan 1 - Mengenal Cisco', 'Soal Nomor 1 Pertemuan 1 - Mengenal Cisco', 'Soal Nomor 1 Pertemuan 1 - Mengenal Cisco', 'Soal Nomor 1 Pertemuan 1 - Mengenal Cisco', 'Soal Nomor 1 Pertemuan 1 - Mengenal Cisco', 'Soal Nomor 1 Pertemuan 1 - Mengenal Cisco', '2025-02-19 23:15:11', '2025-02-20 11:48:47'),
(25, 6, '8', 'Soal Nomor 1&nbsp;Pertemuan 1 - Mengenal Cisco', 'Soal Nomor 1 Pertemuan 1 - Mengenal Cisco', 'Soal Nomor 1 Pertemuan 1 - Mengenal Cisco', 'Soal Nomor 1 Pertemuan 1 - Mengenal Cisco', 'Soal Nomor 1 Pertemuan 1 - Mengenal Cisco', 'Soal Nomor 1 Pertemuan 1 - Mengenal Cisco', '2025-02-19 23:15:11', '2025-02-20 11:48:50'),
(26, 6, '9', 'Soal Nomor 1&nbsp;Pertemuan 1 - Mengenal Cisco', 'Soal Nomor 1 Pertemuan 1 - Mengenal Cisco', 'Soal Nomor 1 Pertemuan 1 - Mengenal Cisco', 'Soal Nomor 1 Pertemuan 1 - Mengenal Cisco', 'Soal Nomor 1 Pertemuan 1 - Mengenal Cisco', 'Soal Nomor 1 Pertemuan 1 - Mengenal Cisco', '2025-02-19 23:15:11', '2025-02-20 11:48:54'),
(27, 6, '10', 'Soal Nomor 1&nbsp;Pertemuan 1 - Mengenal Cisco', 'Soal Nomor 1 Pertemuan 1 - Mengenal Cisco', 'Soal Nomor 1 Pertemuan 1 - Mengenal Cisco', 'Soal Nomor 1 Pertemuan 1 - Mengenal Cisco', 'Soal Nomor 1 Pertemuan 1 - Mengenal Cisco', 'Soal Nomor 1 Pertemuan 1 - Mengenal Cisco', '2025-02-19 23:15:11', '2025-02-20 11:48:58'),
(28, 5, NULL, 'Pertemuan 1 - C++&nbsp;Soal Nomor 1', 'Pertemuan 1 - C++ Soal Nomor 1', 'Pertemuan 1 - C++ Soal Nomor 1', 'Pertemuan 1 - C++ Soal Nomor 1', 'Pertemuan 1 - C++ Soal Nomor 1', 'Pertemuan 1 - C++ Soal Nomor 1', '2025-02-20 09:34:13', NULL),
(29, 2, '8', 'Pertemuan 2 - CSS&nbsp;Soal Nomor 8', 'Pertemuan 2 - CSS Soal Nomor 8', 'Pertemuan 2 - CSS Soal Nomor 8', 'Pertemuan 2 - CSS Soal Nomor 8', 'Pertemuan 2 - CSS Soal Nomor 8', 'Pertemuan 2 - CSS Soal Nomor 8', '2025-02-21 11:35:18', NULL),
(30, 2, '9', 'Pertemuan 2 - CSS&nbsp;Soal Nomor 9', 'Pertemuan 2 - CSS Soal Nomor 9', 'Pertemuan 2 - CSS Soal Nomor 9', 'Pertemuan 2 - CSS Soal Nomor 9', 'Pertemuan 2 - CSS Soal Nomor 9', 'Pertemuan 2 - CSS Soal Nomor 9', '2025-02-21 11:35:43', NULL),
(31, 2, '10', 'Pertemuan 2 - CSS&nbsp;Soal Nomor 10', 'Pertemuan 2 - CSS Soal Nomor 10', 'Pertemuan 2 - CSS Soal Nomor 10', 'Pertemuan 2 - CSS Soal Nomor 10', 'Pertemuan 2 - CSS Soal Nomor 10', 'Pertemuan 2 - CSS Soal Nomor 10', '2025-02-21 11:35:56', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_slider`
--

CREATE TABLE `tbl_slider` (
  `id_slider` int(255) NOT NULL,
  `nama_slider` varchar(255) NOT NULL,
  `foto_slider` text NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `modified` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_slider`
--

INSERT INTO `tbl_slider` (`id_slider`, `nama_slider`, `foto_slider`, `created`, `modified`) VALUES
(1, 'View Gedung LabKom', 'gambar1.jpg', '2024-09-23 22:05:01', NULL),
(2, 'View Embung G', 'gambar3.jpg', '2024-09-23 22:05:01', NULL),
(3, 'View Gerbang ITERA', 'e8c7334eca29eb90f9a8cfadb7763ae51.jpg', '2024-09-23 22:05:01', '2024-09-23 22:09:46'),
(4, 'Kebun Raya ITERA', '1-3.jpg', '2024-09-23 22:05:01', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` int(20) NOT NULL DEFAULT 3,
  `nama_user` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `nim` bigint(255) DEFAULT NULL,
  `foto_user` text DEFAULT NULL,
  `slug_user` text NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `modified` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `username`, `password`, `role`, `nama_user`, `email`, `nim`, `foto_user`, `slug_user`, `created`, `modified`) VALUES
(1, 'dodi.119140023', '2000-12-25', 3, 'Dodi Devrian Andrianto', 'dodi.119140023@student.itera.ac.id', 119140023, 'customer-service.png', 'dodi-devrian-andrianto', '2024-12-03 22:19:02', '2025-01-28 21:12:10'),
(7, 'ahmad.119140293', 'ahmad123', 4, 'Ahmad Akbar', 'ahmad.119140293@student.itera.ac.id', 119140293, 'user2.png', 'ahmad-akbar', '2024-12-03 22:34:23', '2025-01-31 23:10:06'),
(8, 'nurdana.1191402394', 'nurdana123', 4, 'Nurdana Jaya', 'nurdana.1191402394@student.itera.ac.id', 119140394, 'WhatsApp_Image_2024-07-29_at_00_22_25.jpeg', '', '2024-12-03 23:06:30', '2024-12-20 10:11:23'),
(9, 'wili.119140025', 'wili123', 4, 'Wili Jonatan', 'wili.119140025@student.itera.ac.id', 119140025, 'avatar-design.png', '', '2024-12-03 23:10:11', '2024-12-04 06:13:19'),
(10, 'michael.123140101', 'michael123', 4, 'Michael Mathew', 'michael.123140101@student.itera.ac.id', 123140101, 'WhatsApp_Image_2024-07-03_at_00_54_371.jpeg', '', '2024-12-04 06:05:18', NULL),
(11, 'dila.121140075', 'dila123', 4, 'Dila Ayu Prastita', 'dila.121140075@student.itera.ac.id', 121140075, 'images.jpeg', '', '2024-12-04 06:11:56', '2025-02-24 07:46:06'),
(12, 'dimas.121140135', 'dimas123', 4, 'Dimas Azi Rajab Aizar', 'dimas.121140135@student.itera.ac.id', 121140135, '5d4b8207341479b8729b9480b98c791a.jpg', '', '2024-12-04 06:11:56', '2025-02-24 07:42:11'),
(13, 'dwi.120140027', 'dwi123', 4, 'Dwi Ananda Rizky', 'dwi.120140027@student.ac.id', 120140027, 'g_h_a_hasil_editan_15_pas_foto_buku_nikah_sederet_aktor_ganteng_korea_bikin_makin_halu_-_manifesting_dulu_siapa_tahu_jadi_beneran_p_pas_foto_buku_nikah_aktor_korea-20220317-015-non_fotografer_kly.jpg', '', '2024-12-04 06:19:59', '2025-02-24 07:42:50'),
(14, 'edo.120140179', 'edo123', 4, 'Edo Sani', 'edo.120140179@student.itera.ac.id', 120140179, 'S6b6ca25df9c94414ad3c596b38b3094dw.jpg', '', '2024-12-04 06:19:59', '2025-02-24 07:38:36'),
(15, 'khairunnisa.123450071', 'khairunnisa123', 3, 'Khairunnisa Maharani', 'khairunnisa.123450071@student.itera.ac.id', 123450071, 'images1.jpeg', 'khairunnisa-maharani', '2024-12-05 23:03:11', '2025-02-24 07:46:44'),
(16, 'punky.119140048', 'punky123', 4, 'Punky Wijayanto Muda', 'punky.119140048@student.itera.ac.id', 119140048, 'foto_(2).jpg', '', '2025-02-04 23:07:54', '2025-02-24 07:45:17');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `tbl_asprak`
--
ALTER TABLE `tbl_asprak`
  ADD PRIMARY KEY (`id_asprak`);

--
-- Indexes for table `tbl_asset`
--
ALTER TABLE `tbl_asset`
  ADD PRIMARY KEY (`id_asset`);

--
-- Indexes for table `tbl_banksoalpretest`
--
ALTER TABLE `tbl_banksoalpretest`
  ADD PRIMARY KEY (`id_soal`);

--
-- Indexes for table `tbl_clogin`
--
ALTER TABLE `tbl_clogin`
  ADD PRIMARY KEY (`id_clogin`);

--
-- Indexes for table `tbl_diskusi`
--
ALTER TABLE `tbl_diskusi`
  ADD PRIMARY KEY (`id_diskusi`);

--
-- Indexes for table `tbl_do_pretest`
--
ALTER TABLE `tbl_do_pretest`
  ADD PRIMARY KEY (`id_dopretest`);

--
-- Indexes for table `tbl_kunci_pretest`
--
ALTER TABLE `tbl_kunci_pretest`
  ADD PRIMARY KEY (`id_kuncipretest`);

--
-- Indexes for table `tbl_kursus`
--
ALTER TABLE `tbl_kursus`
  ADD PRIMARY KEY (`id_kursus`);

--
-- Indexes for table `tbl_materi`
--
ALTER TABLE `tbl_materi`
  ADD PRIMARY KEY (`id_materi`);

--
-- Indexes for table `tbl_posttest`
--
ALTER TABLE `tbl_posttest`
  ADD PRIMARY KEY (`id_posttest`);

--
-- Indexes for table `tbl_pretest`
--
ALTER TABLE `tbl_pretest`
  ADD PRIMARY KEY (`id_pretest`);

--
-- Indexes for table `tbl_slider`
--
ALTER TABLE `tbl_slider`
  ADD PRIMARY KEY (`id_slider`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id_admin` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_asset`
--
ALTER TABLE `tbl_asset`
  MODIFY `id_asset` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_banksoalpretest`
--
ALTER TABLE `tbl_banksoalpretest`
  MODIFY `id_soal` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_clogin`
--
ALTER TABLE `tbl_clogin`
  MODIFY `id_clogin` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_diskusi`
--
ALTER TABLE `tbl_diskusi`
  MODIFY `id_diskusi` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `tbl_do_pretest`
--
ALTER TABLE `tbl_do_pretest`
  MODIFY `id_dopretest` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_kunci_pretest`
--
ALTER TABLE `tbl_kunci_pretest`
  MODIFY `id_kuncipretest` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_kursus`
--
ALTER TABLE `tbl_kursus`
  MODIFY `id_kursus` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tbl_materi`
--
ALTER TABLE `tbl_materi`
  MODIFY `id_materi` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tbl_posttest`
--
ALTER TABLE `tbl_posttest`
  MODIFY `id_posttest` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_pretest`
--
ALTER TABLE `tbl_pretest`
  MODIFY `id_pretest` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `tbl_slider`
--
ALTER TABLE `tbl_slider`
  MODIFY `id_slider` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
