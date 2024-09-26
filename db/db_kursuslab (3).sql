-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 26, 2024 at 07:30 PM
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
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL DEFAULT '1',
  `nama_admin` varchar(500) NOT NULL,
  `email` varchar(255) NOT NULL,
  `foto_user` text DEFAULT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `modified` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id_admin`, `username`, `password`, `role`, `nama_admin`, `email`, `foto_user`, `created`, `modified`) VALUES
(1, 'admin', 'admin123', '1', 'Admin Laboran', 'admin@admin.com', NULL, '2024-09-26 10:29:03', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_asprak`
--

CREATE TABLE `tbl_asprak` (
  `id_asprak` int(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama_asprak` varchar(500) DEFAULT NULL,
  `nim` varchar(255) DEFAULT NULL,
  `no_hp` bigint(255) DEFAULT NULL,
  `foto_asprak` text DEFAULT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `modified` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_asprak`
--

INSERT INTO `tbl_asprak` (`id_asprak`, `username`, `password`, `nama_asprak`, `nim`, `no_hp`, `foto_asprak`, `created`, `modified`) VALUES
(1, 'shani.119140261', 'shani123', 'Shani Indira Natio', '119140261', 85788113563, 'hacker.png', '2024-09-26 16:27:10', NULL),
(2, 'ahmad.119140293', 'ahmad123', 'Ahmad Akbar', '119140293', 85788113563, 'user2.png', '2024-09-26 16:27:10', NULL),
(3, 'wili.119140025', 'wili123', 'Wili Jonatan', '119140025', 81389654250, 'user3.png', '2024-09-26 16:27:10', NULL),
(4, 'freya.119140244', 'freya123', 'Freya Jayawardana', '119140244', 85788113563, 'user4.png', '2024-09-26 16:27:10', NULL),
(5, 'dodi.119140023', 'dodi123', 'Dodi Devrian', '119140023', 89628744896, 'WhatsApp_Image_2024-07-03_at_00_54_373.jpeg', '2024-09-26 16:27:10', NULL),
(6, 'nurdana.1191402394', 'nerdana123', 'Nurdana', '1191402394', 89628744896, 'WhatsApp_Image_2024-07-29_at_00_22_25.jpeg', '2024-09-26 16:27:10', NULL);

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

--
-- Dumping data for table `tbl_banksoalpretest`
--

INSERT INTO `tbl_banksoalpretest` (`id_soal`, `id_materi`, `soal`, `jawaban_a`, `jawaban_b`, `jawaban_c`, `jawaban_d`, `jawaban_e`, `keypretest`, `nomor_soal`, `created`, `modified`) VALUES
(1, 1, 'Apakah?? adasd as d as', 'dasdasd', 'sdfsdf', 'dfg', 'hfghfgh', 'sgsdg', 'B', '1', '2024-09-23 23:35:19', '2024-09-24 18:22:31'),
(2, 2, 'Akankah akankah??', 'sdasd', 'shsdfh', 'dfhsf shd fh', 'hrd jt yj rdjd rj', 'tdr sj j dgj dgjf gj', 'D', '1', '2024-09-24 00:00:31', '2024-09-24 11:54:13'),
(3, 1, 'asdasdasas d ad asd as d?', 'sdfsdf sd fsdf sd ds', 'sd fsd fsd f', 'sd fsdg df  hfg hfjj ghj gh jfdhf', 'sdf sd fdhfgh fgj gh ', 'fsd fds sg df hghjhh ', 'A', '2', '2024-09-24 00:00:31', '2024-09-24 11:54:13'),
(4, 2, '2 Pertemuan 2 CSS ?', 'asdasdasd', 'asdhuyagduygdu', 'dugygudgug', 'uguyguyg', 'guygugyug', 'A', '2', '2024-09-24 10:39:49', '2024-09-24 11:54:13'),
(5, 1, 'Soal Nomor 3 Adlaah aba&nbsp; jbd uasbdu?', 'hghjggjh', 'gjhgjhghj', 'g jhg hjghj', 'g hjg jhg', 'h jghjg hjg jhg ', 'C', '3', '2024-09-24 11:44:18', '2024-09-24 11:54:13'),
(6, 1, 'Soal Nomor 4 Adalah tentang adjoiajsod hoiasndoih oaisndh ashud?', 'fytfytf ytfytfyt f', 'ytf ytf tdyhgjhb bj', 'vygc ytcy v', 'vytvjhb jvh', 'v gv ygvb hjbjkbj', 'E', '4', '2024-09-24 11:46:33', '2024-09-24 11:54:13'),
(7, 1, '5', 'tfytftf vyvy vujhkb jh  j', 'bjh bjhb jhbjb ug jn', 'jhbjhbjbjhbjhb b ub ybu buyb', 'u buyb uyb bjbjbyb ubjhbjhb ', 'ub uhjbhbuybubjhbjh ', 'D', '5', '2024-09-24 11:48:05', '2024-09-24 11:54:13'),
(8, 1, 'uyadugu uygasuyd guyags duygasd?', 'tfytftf vyvy vujhkb jh  j', 'bjh bjhb jhbjb ug jn', 'jhbjhbjbjhbjhb b ub ybu buyb', 'u buyb uyb bjbjbyb ubjhbjhb ', 'ub uhjbhbuybubjhbjh ', 'D', '6', '2024-09-24 16:42:00', '2024-09-24 16:49:23');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_diskusi`
--

CREATE TABLE `tbl_diskusi` (
  `id_diskusi` int(255) NOT NULL,
  `id_user` int(255) NOT NULL,
  `id_kursus` int(255) NOT NULL,
  `diskusi_user` text NOT NULL,
  `diskusi_asprak` text NOT NULL,
  `foto_diskusi` text DEFAULT NULL,
  `foto_diskusi_asprak` text DEFAULT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `modified` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_diskusi`
--

INSERT INTO `tbl_diskusi` (`id_diskusi`, `id_user`, `id_kursus`, `diskusi_user`, `diskusi_asprak`, `foto_diskusi`, `foto_diskusi_asprak`, `created`, `modified`) VALUES
(1, 1, 1, 'Permisi kak, maaf izin bertanya terkait materi pertemuan ke 7 apakah sudah di upload modulnya kak, terima kasih kak', 'Oke iuasd iubuhba usb unjasbd jhb javsasdd yv', NULL, '0', '2024-09-25 09:48:43', '2024-09-25 13:17:25');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_dosen`
--

CREATE TABLE `tbl_dosen` (
  `id_dosen` int(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` int(11) NOT NULL DEFAULT 2,
  `nama_dosen` varchar(500) NOT NULL,
  `email` varchar(255) NOT NULL,
  `nip` varchar(100) NOT NULL,
  `foto_dosen` text DEFAULT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `modified` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_dosen`
--

INSERT INTO `tbl_dosen` (`id_dosen`, `username`, `password`, `role`, `nama_dosen`, `email`, `nip`, `foto_dosen`, `created`, `modified`) VALUES
(1, 'andika', 'andika123', 2, 'Andika Setiawan S.Kom., M.Cs.', 'andika.setiawan@if.itera.ac.id', '19911127 2022 03 1 007', 'ANS.jpg', '2024-09-26 09:36:55', NULL),
(2, 'aidil', 'aidil123', 2, 'Aidil Afriansyah, S.Kom., M.Kom.', 'aidil.afriansyah@if.itera.ac.id', '19910416 201903 1 015', 'AAF.jpg', '2024-09-26 09:36:55', NULL),
(3, 'cahyo', 'cahyo123', 2, 'Meida Cahyo Untoro S.Kom., M.Kom', 'cahyo.untoro@if.itera.ac.id', '19890518 201903 1 011', 'MCU.jpg', '2024-09-26 09:41:36', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_do_pretest`
--

CREATE TABLE `tbl_do_pretest` (
  `id_dopretest` int(255) NOT NULL,
  `id_pretest` int(255) NOT NULL,
  `jawab_1` varchar(255) NOT NULL,
  `jawab_2` varchar(255) NOT NULL,
  `jawab_3` varchar(255) NOT NULL,
  `jawab_4` varchar(255) NOT NULL,
  `jawab_5` varchar(255) NOT NULL,
  `poin_1` int(255) NOT NULL,
  `poin_2` int(255) NOT NULL,
  `poin_3` int(255) NOT NULL,
  `poin_4` int(255) NOT NULL,
  `poin_5` int(255) NOT NULL,
  `sum` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_keypretest`
--

CREATE TABLE `tbl_keypretest` (
  `id_keypretest` int(255) NOT NULL,
  `id_materi` int(255) NOT NULL,
  `jawaban_1` varchar(255) NOT NULL,
  `jawaban_2` varchar(255) NOT NULL,
  `jawaban_3` varchar(255) NOT NULL,
  `jawaban_4` varchar(255) NOT NULL,
  `jawaban_5` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_keypretest`
--

INSERT INTO `tbl_keypretest` (`id_keypretest`, `id_materi`, `jawaban_1`, `jawaban_2`, `jawaban_3`, `jawaban_4`, `jawaban_5`) VALUES
(1, 1, 'A', 'C', 'B', 'D', 'E'),
(2, 2, 'A', 'C', 'D', 'E', 'C');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kursus`
--

CREATE TABLE `tbl_kursus` (
  `id_kursus` int(255) NOT NULL,
  `id_dosen` int(255) NOT NULL,
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

INSERT INTO `tbl_kursus` (`id_kursus`, `id_dosen`, `id_asprak`, `nama_kursus`, `slug_kursus`, `ket_kursus`, `cover_kursus`, `created`, `modified`) VALUES
(1, 1, 1, 'Pemrograman Web', 'Pemrograman-Web', 'Lorem ipusm bala bala oye asdg ihasdi biaushd ibasid biubasdbi ubsadibais dbiuasb duyagb iaushfb iashbf usbds f', 'cover_course.jpg', '2024-09-23 22:32:25', '2024-09-27 00:20:02'),
(2, 2, 2, 'Sistem Tertanam', 'Sistem-Tertanam', 'Lorem Ipsum Bala bala okay', 'cover_course.jpg', '2024-09-23 22:32:25', '2024-09-27 00:20:07'),
(3, 3, 3, 'Proyek Teknologi Informasi', 'Proyek-Teknologi-Informasi', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras et lectus id dolor ultricies ultricies eget at nibh. Aliquam in lobortis arcu, non tempor purus. Donec a aliquam purus. Quisque nec felis id tortor bibendum suscipit in faucibus est.', 'cover_course.jpg', '2024-09-23 22:32:25', '2024-09-27 00:20:12'),
(4, 1, 4, 'Jaringan Komputer', 'Jaringan-Komputer', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras et lectus id dolor ultricies ultricies eget at nibh. Aliquam in lobortis arcu, non tempor purus. Donec a aliquam purus. Quisque nec felis id tortor bibendum suscipit in faucibus est.', 'cover_course.jpg', '2024-09-23 22:32:25', '2024-09-27 00:20:17'),
(5, 2, 5, 'Algoritma Pemrograman 1', 'Algoritma-Pemrograman-1', 'Algoritma Pemrograman 1 adalah matakuliah yang mempelajari tentang dasar-dasar pemrograman menggunaan bahasa C++<br>Materi yang di palajari pada&nbsp;<span>Algoritma Pemrograman 1 adalah sebagai berikut:<br></span>', 'cover_course.jpg', '2024-09-23 22:32:25', '2024-09-27 00:20:20'),
(6, 3, 6, 'Algoritma Pemrograman 2', 'Algoritma-Pemrograman-2', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras et lectus id dolor ultricies ultricies eget at nibh. Aliquam in lobortis arcu, non tempor purus. Donec a aliquam purus. Quisque nec felis id tortor bibendum suscipit in faucibus est.', 'cover_course.jpg', '2024-09-23 22:32:25', '2024-09-27 00:20:31'),
(10, 3, 2, 'Pemrograman Berbasis Objek', 'Pemrograman-Berbasis-Objek', 'Lorem Ipsum', '4.png', '2024-09-23 22:32:25', '2024-09-27 00:20:35'),
(11, 1, 4, 'Pengembangan Aplikasi Mobile', 'pengembangan-aplikasi-mobile', 'Lorem ipsum bla bla', 'gERBANG.jpg', '2024-09-23 22:32:25', '2024-09-27 00:20:40'),
(12, 2, 1, 'Basis Data', 'basis-data', 'Lorem Ipsum wa we wo Done', 'Gambar_Lab_2.jpg', '2024-09-23 22:32:25', '2024-09-27 00:20:46');

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
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `modified` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_materi`
--

INSERT INTO `tbl_materi` (`id_materi`, `id_kursus`, `nama_materi`, `ket_materi`, `id_yt`, `doc_materi`, `note`, `status`, `created`, `modified`) VALUES
(1, 1, 'Pertemuan 1 - HTML 5', 'Lorem Ipsum', 'WxKLNqpmZBk', 'gambar.png', NULL, 2, '2024-09-23 22:59:30', '2024-09-23 23:18:26'),
(2, 1, 'Pertemuan 2 - CSS', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc dictum, mi sed euismod scelerisque, nunc enim fermentum purus, sed vulputate dui tortor id magna. Proin sed pulvinar nisi, vel rutrum erat. Duis augue diam, pharet', 'WxKLNqpmZBk', 'gambar.png', NULL, 1, '2024-09-23 22:59:30', NULL),
(3, 1, 'Pertemuan 3 - JacaScript', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc dictum, mi sed euismod scelerisque, nunc enim fermentum purus, sed vulputate dui tortor id magna. Proin sed pulvinar nisi, vel rutrum erat. Duis augue diam, pharet', 'WxKLNqpmZBk', 'gambar.png', NULL, 2, '2024-09-23 22:59:30', NULL),
(4, 4, 'Pertemuan 1 - Instalasi Cisco', 'Lorem ipsum new pro', 'HS_RPLa5gPw', 'gambar.png', 'Sudah Baik', 2, '2024-09-23 22:59:30', '2024-09-26 18:31:05'),
(5, 5, 'Pertemuan 1 - C++', 'Lorem ipsum bala bala bala Data di ubah', 'WxKLNqpmZBk', 'gambar.png', NULL, 2, '2024-09-23 22:59:30', NULL),
(6, 12, 'Pertemuan 1 - Mengenal Cisco', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc dictum, mi sed euismod scelerisque, nunc enim fermentum purus, sed vulputate dui tortor id magna. Proin sed pulvinar nisi, vel rutrum erat. Duis augue diam, pharet', 'WxKLNqpmZBk', 'gambar.png', NULL, 2, '2024-09-23 22:59:30', NULL),
(7, 4, 'Pertemuan 2 - Cisco', 'Lorem ipsum new era', 'HS_RPLa5gPw', 'FORM_7_Daftar_Hadir_Seminar.pdf', '-', 1, '2024-09-23 22:59:30', '2024-09-26 18:35:27'),
(12, 5, 'Pertemuan 2 - Operation C++', 'lorem', 'HS_RPLa5gPw', '60-70a.pdf', NULL, 2, '2024-09-23 22:59:30', NULL),
(13, 5, 'Pertemuan 3 - Array', 'lorem ipsum', '8OxTG8plkz4', 'Elegant_Template_by_WrapPixel.pdf', NULL, 2, '2024-09-23 22:59:30', NULL),
(18, 12, 'Pertemuan 2 - Queue', 'asdasd a sa das da sd', '8OxTG8plkz4', '1476-5465-1-PB.pdf', NULL, 2, '2024-09-23 22:59:30', NULL),
(19, 5, 'Pertemuan 4 - Percabangan dan Perulangan', 'dfasds df sdf sd sd f', '8OxTG8plkz4', '1439-3371-1-PB.pdf', NULL, 1, '2024-09-23 22:59:30', NULL),
(20, 12, 'Pertemuan 3 - Prosedur dan Function', 'uiashdia diahsdhas dahsdi asihdauishd ', 'HS_RPLa5gPw', 'METODE_EXTREME_PROGRAMMING_PADA_PEMBANGUNAN_WEB_AP.pdf', 'Kurang detail', 1, '2024-09-23 22:59:30', NULL),
(21, 5, 'Pertemuan 5 - If, Else If, dan Else', 'asdasd asd asd', 'HS_RPLa5gPw', '203-760-1-PB.pdf', NULL, 1, '2024-09-23 22:59:30', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pretest`
--

CREATE TABLE `tbl_pretest` (
  `id_pretest` int(255) NOT NULL,
  `id_materi` int(255) NOT NULL,
  `soal` text NOT NULL,
  `jawaban_a` text NOT NULL,
  `jawaban_b` text NOT NULL,
  `jawaban_c` text NOT NULL,
  `jawaban_d` text NOT NULL,
  `jawaban_e` text NOT NULL,
  `sum` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_pretest`
--

INSERT INTO `tbl_pretest` (`id_pretest`, `id_materi`, `soal`, `jawaban_a`, `jawaban_b`, `jawaban_c`, `jawaban_d`, `jawaban_e`, `sum`) VALUES
(1, 1, 'Apakah???', 'ada', 'ava', 'afa', 'aea', 'ara', 1),
(2, 2, 'Akankah akankah??', 'fgd', 'hfgh', 'dfgdg', 'sdfsf', 'fghfgh', 1),
(3, 1, 'asd as as as&nbsp;', ' asdas  asd', 'f dgdf hf g ', 'hfg jg kgkf ', 'jdj dyjd y', ' syjs ry', 1),
(4, 1, 'Soal ke 3 dengan bjasok askdhash djk?', 'asdasd sad as dasd', 's fsd fsd fds fsd f', 'dsfsdf sdf sdf', 'sd fsdf dsfsd f sd', 'sdf sdf sdf ds fsdf dfg df g', 1),
(5, 1, 'Soal 4 asdhkj khasdkjha kdhakjsd hads', 'asd', 'sdg g', 'df gdfg', 'fgh fg', 'ryeyerte5', 1),
(6, 1, 'Soal 5 hfiush fishdfi usdhf idhf?', 'asdafsgfdhgf jhs', ' awfsgdhgf dfhgdsfad', 'fdgzfd gzdf gd g', 'dytdtydtjs   sth str sh', 's fdz zdf gzf g', 1);

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
  `role` int(20) NOT NULL,
  `nama_user` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `nim` bigint(255) DEFAULT NULL,
  `nip` varchar(255) DEFAULT NULL,
  `foto_user` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `username`, `password`, `role`, `nama_user`, `email`, `nim`, `nip`, `foto_user`) VALUES
(1, 'dodi.119140023', '2000-12-25', 3, 'Dodi Devrian Andrianto', 'dodi.119140023@student.itera.ac.id', 119140023, NULL, 'speech.png'),
(2, 'admin', 'admin123', 1, 'Admin Laboran', NULL, NULL, NULL, NULL),
(3, 'andika', 'andika123', 2, 'Andika Setiawan S.Kom., M.Cs.', 'andika.setiawan@if.itera.ac.id', NULL, '19911127 2022 03 1 007', 'ANS.jpg'),
(4, 'cahyo', 'cahyo123', 2, 'Meida Cahyo Untoro S.Kom., M.Kom', 'cahyo.untoro@if.itera.ac.id', NULL, '19890518 201903 1 011', 'MCU.jpg'),
(5, 'aidil', 'aidil123', 2, 'Aidil Afriansyah, S.Kom., M.Kom.', 'aidil.afriansyah@if.itera.ac.id', NULL, '19910416 201903 1 015', 'AAF.jpg');

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
-- Indexes for table `tbl_diskusi`
--
ALTER TABLE `tbl_diskusi`
  ADD PRIMARY KEY (`id_diskusi`);

--
-- Indexes for table `tbl_dosen`
--
ALTER TABLE `tbl_dosen`
  ADD PRIMARY KEY (`id_dosen`);

--
-- Indexes for table `tbl_do_pretest`
--
ALTER TABLE `tbl_do_pretest`
  ADD PRIMARY KEY (`id_dopretest`);

--
-- Indexes for table `tbl_keypretest`
--
ALTER TABLE `tbl_keypretest`
  ADD PRIMARY KEY (`id_keypretest`);

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
  MODIFY `id_admin` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_asprak`
--
ALTER TABLE `tbl_asprak`
  MODIFY `id_asprak` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_asset`
--
ALTER TABLE `tbl_asset`
  MODIFY `id_asset` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_banksoalpretest`
--
ALTER TABLE `tbl_banksoalpretest`
  MODIFY `id_soal` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_diskusi`
--
ALTER TABLE `tbl_diskusi`
  MODIFY `id_diskusi` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_dosen`
--
ALTER TABLE `tbl_dosen`
  MODIFY `id_dosen` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_do_pretest`
--
ALTER TABLE `tbl_do_pretest`
  MODIFY `id_dopretest` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_keypretest`
--
ALTER TABLE `tbl_keypretest`
  MODIFY `id_keypretest` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_kursus`
--
ALTER TABLE `tbl_kursus`
  MODIFY `id_kursus` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_materi`
--
ALTER TABLE `tbl_materi`
  MODIFY `id_materi` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tbl_pretest`
--
ALTER TABLE `tbl_pretest`
  MODIFY `id_pretest` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_slider`
--
ALTER TABLE `tbl_slider`
  MODIFY `id_slider` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
