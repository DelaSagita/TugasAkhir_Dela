-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 24, 2023 at 02:54 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_cuti`
--

-- --------------------------------------------------------

--
-- Table structure for table `bidang`
--

CREATE TABLE `bidang` (
  `bidang_id` int(11) NOT NULL,
  `flag_erase` int(11) DEFAULT 1,
  `bidang_nama` varchar(255) DEFAULT NULL,
  `bidang_pimpinan_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bidang`
--

INSERT INTO `bidang` (`bidang_id`, `flag_erase`, `bidang_nama`, `bidang_pimpinan_id`, `created_at`, `updated_at`) VALUES
(10, 1, 'Hakim', 3, '2023-06-26 17:04:49', '2023-07-28 07:41:06'),
(12, 1, 'Kepaniteraan', 11, '2023-06-26 17:17:06', '2023-08-02 23:26:27'),
(16, 1, 'Kesekretariatan', 12, '2023-06-26 17:47:09', '2023-07-14 08:32:42'),
(17, 0, 'Kepaniteraan', 11, '2023-06-26 17:48:01', '2023-07-09 14:12:40'),
(18, 0, 'Jurusita dan Jurusita Pengganti', 11, '2023-06-26 17:49:55', '2023-07-09 14:12:52'),
(19, 0, 'Kasubbag', 12, '2023-06-26 17:50:27', '2023-07-09 14:13:03'),
(20, 1, 'Subbag Umum dan Keuangan', 13, '2023-06-26 17:51:37', '2023-07-09 14:19:09'),
(22, 1, 'Subbag PTIP', 29, '2023-06-26 17:54:05', '2023-08-16 08:11:56'),
(23, 1, 'Subbag Keportala', 6, '2023-06-26 17:54:29', '2023-08-16 08:12:17'),
(24, 1, 'Kepaniteraan Muda Pidana', 15, '2023-06-26 17:55:11', '2023-07-14 09:25:47'),
(25, 1, 'Kepaniteraan Muda Perdata', 26, '2023-06-26 17:55:34', '2023-07-14 08:33:59'),
(26, 1, 'Kepaniteraan Muda Hukum', 25, '2023-06-26 17:56:00', '2023-07-14 08:34:21'),
(27, 0, 'Kepaniteraan', 26, '2023-07-09 15:52:58', '2023-07-09 15:53:11'),
(30, 0, NULL, 14, '2023-07-25 22:57:41', '2023-07-25 23:00:15'),
(31, 0, 'KEUANGAN', 9, '2023-08-02 21:05:23', '2023-08-02 21:07:34');

-- --------------------------------------------------------

--
-- Table structure for table `cuti`
--

CREATE TABLE `cuti` (
  `cuti_id` int(11) NOT NULL,
  `no_surat` varchar(255) DEFAULT NULL,
  `cuti_status` int(11) NOT NULL,
  `cuti_pegawai_id` int(11) DEFAULT NULL,
  `tgl_mulai_cuti` date NOT NULL,
  `tgl_selesai_cuti` date NOT NULL,
  `kode_cuti` varchar(255) DEFAULT NULL,
  `alasan_cuti` text DEFAULT NULL,
  `alamat_selama_cuti` text DEFAULT NULL,
  `jenis_cuti_id` int(11) DEFAULT NULL,
  `kasubag_id` int(11) NOT NULL,
  `kabid_id` int(11) NOT NULL,
  `file_pendukung` varchar(255) DEFAULT NULL,
  `pimpinan_id` int(11) NOT NULL,
  `flag_erase` int(11) NOT NULL DEFAULT 1,
  `alasan_tolak` longtext DEFAULT NULL,
  `kode_token` varchar(155) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cuti`
--

INSERT INTO `cuti` (`cuti_id`, `no_surat`, `cuti_status`, `cuti_pegawai_id`, `tgl_mulai_cuti`, `tgl_selesai_cuti`, `kode_cuti`, `alasan_cuti`, `alamat_selama_cuti`, `jenis_cuti_id`, `kasubag_id`, `kabid_id`, `file_pendukung`, `pimpinan_id`, `flag_erase`, `alasan_tolak`, `kode_token`, `created_at`, `updated_at`) VALUES
(40, 'W17-U4/01/05.2/8/2023', 2, 28, '2023-08-14', '2023-08-16', '557206', 'Urusan Keluarga', 'Sukadana', 1, 6, 11, NULL, 3, 1, 'bhlj;', '3IcfEvCxtyKKrYPrqJamDNAf2', '2023-08-09 02:37:10', '2023-08-10 07:37:22'),
(41, NULL, 0, 28, '2023-08-17', '2023-08-21', '778855', 'Keluarga sakit', 'Ketapang', 1, 6, 11, NULL, 3, 1, NULL, '3IMfwC6fjsuKPNV9A1US980ut', '2023-08-09 02:39:42', '2023-08-09 02:39:42'),
(42, NULL, 2, 28, '2023-08-22', '2023-08-23', '327677', 'Sakit', 'Ketapang', 6, 6, 11, 'WkkMitRbgV-filependukung.png', 3, 1, NULL, 't3ttTUHGT9D4DUknyTfZ5Hc4h', '2023-08-10 02:40:52', '2023-08-10 07:07:11'),
(43, NULL, 0, 28, '2023-08-24', '2023-08-25', '464442', 'Sakit', 'Ketapang', 6, 6, 11, 'tEmYr2d78O-filependukung.png', 3, 1, 'belum bisa', 'NJPGPEZWumIYptvhsH0hTdYZ8', '2023-08-10 02:42:39', '2023-08-10 05:39:55'),
(44, 'w1789220', 2, 28, '2023-08-10', '2023-08-10', '543217', 'Sakit', 'Ketapang', 1, 6, 11, NULL, 3, 1, 'belum bisa', 'lJmPzfGa6s55tFM91W2xXVcae', '2023-08-10 03:37:16', '2023-08-10 06:05:31'),
(45, NULL, 0, 6, '2023-08-14', '2023-08-16', '745565', 'Urusan Keluarga', 'Ketapang', 1, 6, 12, NULL, 3, 1, NULL, 'D8FAvCZsWDyGrOUuoQCcblqPu', '2023-08-10 05:06:13', '2023-08-10 05:39:58'),
(46, NULL, 0, 11, '2023-08-10', '2023-08-10', '559227', 'Urusan keluarga', 'Ketapang', 1, 6, 3, NULL, 3, 1, NULL, 'F71EHd0jdvCfKMK8tKS1QBxTO', '2023-08-10 09:03:57', '2023-08-10 09:03:57'),
(48, NULL, 0, 22, '2023-08-21', '2023-08-23', '892105', 'Urusan Keluarga', 'Denpasar', 1, 6, 3, NULL, 3, 1, NULL, 'SdCOE7WZOXTrcj8yHRvntCVkS', '2023-08-16 08:07:03', '2023-08-16 08:07:03');

-- --------------------------------------------------------

--
-- Table structure for table `cuti_detail`
--

CREATE TABLE `cuti_detail` (
  `cuti_detail_id` int(11) NOT NULL,
  `id_cuti` int(11) DEFAULT NULL,
  `pegawai_id_cuti` int(11) NOT NULL,
  `pengaturan_cuti_id` int(11) DEFAULT NULL,
  `hari_cuti` varchar(255) NOT NULL,
  `tgl_cuti_full` date NOT NULL,
  `tgl_cuti` int(11) DEFAULT NULL,
  `bulan_cuti` int(11) DEFAULT NULL,
  `tahun_cuti` int(11) DEFAULT NULL,
  `status_cuti` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cuti_detail`
--

INSERT INTO `cuti_detail` (`cuti_detail_id`, `id_cuti`, `pegawai_id_cuti`, `pengaturan_cuti_id`, `hari_cuti`, `tgl_cuti_full`, `tgl_cuti`, `bulan_cuti`, `tahun_cuti`, `status_cuti`, `created_at`, `updated_at`) VALUES
(154, 41, 28, 1, 'Kamis', '2023-08-17', 17, 8, 2023, 0, '2023-08-10 02:39:42', '2023-08-22 08:25:54'),
(155, 41, 28, 1, 'Jumat', '2023-08-18', 18, 8, 2023, 1, '2023-08-10 02:39:42', '2023-08-10 02:39:42'),
(156, 41, 28, 1, 'Sabtu', '2023-08-19', 19, 8, 2023, 0, '2023-08-10 02:39:42', '2023-08-22 08:25:54'),
(157, 41, 28, 1, 'Minggu', '2023-08-20', 20, 8, 2023, 0, '2023-08-10 02:39:42', '2023-08-22 08:25:54'),
(158, 41, 28, 1, 'Senin', '2023-08-21', 21, 8, 2023, 1, '2023-08-10 02:39:42', '2023-08-10 02:39:42'),
(159, 42, 28, 6, 'Selasa', '2023-08-22', 22, 8, 2023, 1, '2023-08-10 02:40:52', '2023-08-10 02:40:52'),
(160, 42, 28, 6, 'Rabu', '2023-08-23', 23, 8, 2023, 1, '2023-08-10 02:40:52', '2023-08-10 02:40:52'),
(164, 45, 6, 1, 'Senin', '2023-08-14', 14, 8, 2023, 1, '2023-08-10 05:06:13', '2023-08-10 05:06:13'),
(165, 45, 6, 1, 'Selasa', '2023-08-15', 15, 8, 2023, 1, '2023-08-10 05:06:13', '2023-08-10 05:06:13'),
(166, 45, 6, 1, 'Rabu', '2023-08-16', 16, 8, 2023, 1, '2023-08-10 05:06:13', '2023-08-10 05:06:13'),
(167, 46, 11, 1, 'Kamis', '2023-08-10', 10, 8, 2023, 1, '2023-08-10 09:03:57', '2023-08-10 09:03:57'),
(175, 48, 22, 1, 'Senin', '2023-08-21', 21, 8, 2023, 1, '2023-08-16 08:07:03', '2023-08-16 08:07:03'),
(176, 48, 22, 1, 'Selasa', '2023-08-22', 22, 8, 2023, 1, '2023-08-16 08:07:03', '2023-08-16 08:07:03'),
(177, 48, 22, 1, 'Rabu', '2023-08-23', 23, 8, 2023, 1, '2023-08-16 08:07:03', '2023-08-16 08:07:03');

-- --------------------------------------------------------

--
-- Table structure for table `kalender_libur`
--

CREATE TABLE `kalender_libur` (
  `kalender_id` int(11) NOT NULL,
  `flag_erase` int(11) NOT NULL DEFAULT 1,
  `tgl` date NOT NULL,
  `nama_even` varchar(255) DEFAULT NULL,
  `tgl_libur` int(11) DEFAULT NULL,
  `bulan_libur` varchar(255) NOT NULL,
  `tahun_libur` varchar(255) NOT NULL,
  `hari_libur` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kalender_libur`
--

INSERT INTO `kalender_libur` (`kalender_id`, `flag_erase`, `tgl`, `nama_even`, `tgl_libur`, `bulan_libur`, `tahun_libur`, `hari_libur`, `created_at`, `updated_at`) VALUES
(3, 1, '2023-04-22', 'hari raya idul fitri', 22, '04', '2023', 'Sabtu', '2023-04-14 18:10:31', '2023-04-14 18:10:31'),
(4, 1, '2023-04-24', 'hari raya idul fitri', 24, '04', '2023', 'Senin', '2023-04-14 18:10:42', '2023-04-14 18:10:42'),
(5, 1, '2023-05-01', 'hari buruh nasional', 1, '05', '2023', 'Senin', '2023-04-14 18:11:06', '2023-04-14 18:11:06'),
(6, 1, '2023-05-18', 'kenaikan isa al masih', 18, '05', '2023', 'Kamis', '2023-04-14 18:11:46', '2023-04-14 18:11:46'),
(7, 1, '2023-06-01', 'hari lahir pancasila', 1, '06', '2023', 'Kamis', '2023-04-14 18:12:26', '2023-07-12 06:33:09'),
(8, 1, '2023-04-13', 'hari raya idul fitri', 13, '04', '2023', 'Kamis', '2023-04-14 18:16:54', '2023-04-14 18:16:54'),
(9, 1, '2023-04-25', 'makan bersama', 25, '04', '2023', 'Selasa', '2023-04-14 18:35:39', '2023-04-14 18:35:39'),
(10, 1, '2023-04-19', 'cuti bersama hari raya idul fitri', 19, '04', '2023', 'Rabu', '2023-04-14 18:43:12', '2023-04-14 18:43:12'),
(11, 1, '2023-04-20', 'cuti bersama hari raya idul fitri', 20, '04', '2023', 'Rabu', '2023-04-14 18:43:12', '2023-04-14 18:43:12'),
(12, 1, '2023-05-08', 'cuti bersama hari raya idul fitri', 21, '04', '2023', 'Rabu', '2023-04-14 18:43:12', '2023-04-14 18:43:12'),
(13, 1, '2023-08-17', 'hut ri ke 80', 17, '08', '2023', 'Thursday', '2023-07-12 06:26:57', '2023-07-12 06:33:13'),
(14, 0, '2023-08-04', 'Kenaikan isa', 4, '08', '2023', 'Friday', '2023-08-02 21:09:53', '2023-08-02 21:11:25');

-- --------------------------------------------------------

--
-- Table structure for table `keluar_kantor`
--

CREATE TABLE `keluar_kantor` (
  `keluar_kantor_id` int(11) NOT NULL,
  `pegawai_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `id_pimpinan_bidang` int(11) NOT NULL,
  `tgl_izin` date NOT NULL,
  `jam_mulai` varchar(255) DEFAULT NULL,
  `jam_selesai` varchar(255) DEFAULT NULL,
  `alasan` longtext NOT NULL,
  `alasan_tolak` longtext DEFAULT NULL,
  `flag_erase` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `kode_token` varchar(255) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `keluar_kantor`
--

INSERT INTO `keluar_kantor` (`keluar_kantor_id`, `pegawai_id`, `status`, `id_pimpinan_bidang`, `tgl_izin`, `jam_mulai`, `jam_selesai`, `alasan`, `alasan_tolak`, `flag_erase`, `created_at`, `kode_token`, `updated_at`) VALUES
(24, 28, 0, 11, '2023-08-10', '10:10', '11:30', 'Menjemput anak sekolah', NULL, 1, '2023-08-10 13:03:15', 'yvgYdBWzfZXGZMFQl6mHcmIB8', '2023-08-10 13:03:15'),
(25, 22, 0, 3, '2023-08-11', '10:33', '11:45', 'Urusan keluarga', NULL, 1, '2023-08-11 04:33:33', 'tWvY5XvW575IP5Ln4tjfSc46G', '2023-08-11 04:33:33'),
(26, 36, 0, 6, '2023-08-11', '09:45', '10:30', 'Urusan Keluarga', NULL, 1, '2023-08-11 05:03:20', 'uTKWfpYaSYZ0vPkEbRLO05qaK', '2023-08-11 05:03:20');

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `pegawai_id` int(11) NOT NULL,
  `pegawai_nip` varchar(255) DEFAULT NULL,
  `pegawai_nama` varchar(255) DEFAULT NULL,
  `pegawai_jabatan` varchar(255) DEFAULT NULL,
  `pegawai_golongan` varchar(255) DEFAULT NULL,
  `pegawai_unit_kerja` varchar(255) NOT NULL,
  `pegawai_pangkat` varchar(255) NOT NULL,
  `pegawai_tingkat_pendidikan` varchar(255) DEFAULT NULL,
  `pegawai_jurusan` varchar(255) DEFAULT NULL,
  `pegawai_agama` varchar(255) DEFAULT NULL,
  `pegawai_jenis_kelamin` varchar(255) DEFAULT NULL,
  `pegawai_tmt` date DEFAULT NULL,
  `pegawai_sk` varchar(255) DEFAULT NULL,
  `pegawai_email` varchar(255) DEFAULT NULL,
  `notlp` varchar(255) NOT NULL,
  `tempat_lahir` varchar(255) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `pegawai_level` int(11) DEFAULT NULL COMMENT '0 = admin aplikasi\r\n1 = pimpinan PN\r\n2 = kabid\r\n3 = kasubag\r\n4 = pegawai',
  `pegawai_bidang_id` int(11) DEFAULT NULL,
  `akses_operator` int(11) NOT NULL DEFAULT 0,
  `pegawai_pimpinan` int(11) DEFAULT 0 COMMENT '0 = pegawai ,1 = kadis, 2 = kabid, 3 kasubag',
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `pegawai_status` varchar(255) NOT NULL,
  `status_plt` int(11) NOT NULL DEFAULT 0,
  `status_plh` int(11) NOT NULL DEFAULT 0,
  `flag_erase` int(11) NOT NULL DEFAULT 1,
  `foto` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`pegawai_id`, `pegawai_nip`, `pegawai_nama`, `pegawai_jabatan`, `pegawai_golongan`, `pegawai_unit_kerja`, `pegawai_pangkat`, `pegawai_tingkat_pendidikan`, `pegawai_jurusan`, `pegawai_agama`, `pegawai_jenis_kelamin`, `pegawai_tmt`, `pegawai_sk`, `pegawai_email`, `notlp`, `tempat_lahir`, `tgl_lahir`, `pegawai_level`, `pegawai_bidang_id`, `akses_operator`, `pegawai_pimpinan`, `username`, `password`, `created_at`, `updated_at`, `pegawai_status`, `status_plt`, `status_plh`, `flag_erase`, `foto`) VALUES
(1, '20010802 202301 1 001', 'della admin', 'kepala pimpinan bidang humas', '3b', 'PN KETAPANG', 'pranata Tk. I', 'D-III', 'serjana hukum', 'ISLAM', 'Laki-laki', '2023-04-14', '/Applications/XAMPP/xamppfiles/temp/php2GyvOo', 'admin@gmail.com', '081234567222', 'kemboja', '2023-04-14', 0, 10, 0, 0, NULL, '$2y$10$4Z7NKXjHI5fefq4/.1cXne.jog9s7U6KVZel5iyoUEXCm9tAAHBPa', '2023-04-13 11:11:51', '2023-08-10 01:32:30', 'PEGAWAI AKTIF', 0, 0, 0, 'kBwMNoMFcF-profil.jpg'),
(3, '19770319 200112 1 001', 'EGA SHAKTIANA SH., MH.', 'Ketua Hakim', 'V/a', 'PN KETAPANG', 'Pranata Tk. I', 'S2', 'Hukum Ekonomi', 'ISLAM', 'Laki-laki', '2023-04-14', NULL, 'Ega@gmail.com', '082256481720', 'Ketapang', '2023-04-14', 1, 10, 1, 1, '', '$2y$10$9LUxGnxHoRatb2rWU3Vu/OSqbYgJ5XpLMDUXyxzuCt4y3V8VZHNfa', '2023-04-13 11:40:59', '2023-08-10 08:58:23', 'PEGAWAI AKTIF', 0, 0, 1, '7zCj4mT8Gx-profil.jpg'),
(6, '19770319 200112 1 001', 'RAHMAD DODONG JUNAIDI MS, S.H.', 'staf pelaksana', 'III/b', 'PN KETAPANG', 'pranata Tk. I', 'S1', 'ilmu hukum', 'ISLAM', 'Laki-laki', '2023-04-14', '/Applications/XAMPP/xamppfiles/temp/phpsW1c7D', 'rahmaddodong@gmail.com', '082256481720', 'ketapang', '2023-04-14', 3, 23, 0, 1, NULL, '$2y$10$r3M2M.fjrT9Yv7p63xLISuapho5vX4v5F5KsIyO44e7p2L08ysHKK', '2023-04-13 11:49:27', '2023-08-10 08:56:49', 'PEGAWAI AKTIF', 0, 0, 1, 'y8hd89guVe-profil.jpg'),
(9, '19980707 20150101 1 002', 'Mark Subianto, S.H.', 'Panitera Pengganti', 'III/b', 'PN KETAPANG', 'Penata Muda Tingkat I', 'S1', 'Hukum Ekonomi', 'ISLAM', 'Laki-laki', '2009-04-01', NULL, 'Mark@gmail.com', '089524526934', 'Ketapang', '2023-04-14', 4, 23, 0, 2, NULL, '$2y$10$9OhGOdrXBbEYQoZDrnMo8ON8Q/7/MMkzdHJZFNVWM2sVXJNfyz9cO', '2023-04-13 11:40:59', '2023-08-16 08:26:35', 'PEGAWAI AKTIF', 0, 0, 0, 'app/images/profil-pegawai/-1683735059-Sv77q.jpg'),
(10, '123456789', 'kasubag pn', 'kasubag', 'v/a', 'PN KETAPANG', 'pranata Tk. I', 'S2', 'hukum ekonomi', 'ISLAM', 'Laki-laki', '2023-04-14', '/Applications/XAMPP/xamppfiles/temp/phpL58q7O', 'kasubag@gmail.com', '089524526934', 'ketapang', '2023-04-14', 4, 26, 0, 0, NULL, '$2y$10$9OhGOdrXBbEYQoZDrnMo8ON8Q/7/MMkzdHJZFNVWM2sVXJNfyz9cO', '2023-04-13 11:40:59', '2023-07-14 15:49:45', 'PEGAWAI AKTIF', 0, 0, 1, 'app/images/profil-pegawai/-1685613925-1WWFV.jpg'),
(11, '19730322 199303 1 003', 'ANUNG HANDONO, S.H.', 'Kepala Pimpinan Kepaniteraan', 'III/B', 'PN KETAPANG', 'Penata Tk. I', 'S1', 'Hukum Ekonomi', 'ISLAM', 'Laki-laki', '2006-11-23', NULL, 'Anung@gmail.com', '082256481720', 'Kuala Kapuas', '1973-03-22', 2, 12, 0, 2, NULL, '$2y$10$UoTuFrtmIsZ8mWoA9EDSc.RtL2ys1fbZNXzIaDKu6A/J73Dn0wf/u', '2023-04-23 16:08:51', '2023-08-10 08:57:56', 'PEGAWAI AKTIF', 0, 0, 1, 'oQqlGlO8Hv-profil.jpg'),
(12, '19680909 199003 1 002', 'BUDIONO', 'Plt. Ketua Hakim', 'III/B', 'PN KETAPANG', 'Penata Tk. I', 'SMA/SMK', 'IPS', 'ISLAM', 'Laki-laki', '2022-07-05', '/Applications/XAMPP/xamppfiles/temp/phpwcjCbS', 'budiono@gmail.com', '081240515616', 'pemangkat', '1978-09-19', 2, 16, 0, 2, NULL, '$2y$10$1fK8dzd0zOLegOKWOu6ZXOMXLPJjqpJAPM.HDqOw9BCWw18NXgZtG', '2023-04-23 16:13:56', '2023-07-28 11:34:45', 'PEGAWAI AKTIF', 1, 0, 1, NULL),
(13, '1234567', 'SARJONO', 'Kepala Bagian Umum Dan Keuangan', 'III/C', 'PN KETAPANG', 'Penata', 'S1', 'STM BANGUNAN', 'ISLAM', 'Laki-laki', '2023-04-23', NULL, 'Sarjono@gmail.com', '081240515616', 'Pontianak', '1974-07-22', 2, 10, 0, 2, NULL, '$2y$10$9OhGOdrXBbEYQoZDrnMo8ON8Q/7/MMkzdHJZFNVWM2sVXJNfyz9cO', '2023-04-23 16:20:26', '2023-08-02 21:00:35', 'PEGAWAI AKTIF', 0, 0, 1, 'app/images/profil-pegawai/-1685614049-2LaPQ.jpg'),
(14, '20010208 202001 1 001', 'operator', 'Plh. Panitera Pengganti', '3.b', 'PN Ketapang', 'pangkat', 'S2', 'ips', 'ISLAM', 'Perempuan', '2023-05-05', '/Applications/XAMPP/xamppfiles/temp/php4VGDZb', 'operator@gmail.com', '081240515616', 'sukadana', '2023-05-05', 2, 30, 0, 2, NULL, '$2y$10$n1Wrun3nQ.i7a74POVjKu.Qvrghdzrc06aCWIjwCgteuQecP0xvNi', '2023-05-05 15:20:17', '2023-08-02 18:59:29', 'PEGAWAI AKTIF', 1, 1, 1, NULL),
(15, '20010802 20190802 1 002', 'Lalu Muhardi Hatif', 'Plt. Operator', 'V/a', 'PN KETAPANG', 'Penata Tk. I', 'D-IV', 'Serjana Hukum', 'KRISTEN', 'Laki-laki', '2021-01-01', NULL, 'Muhardi@gmail.com', '081240515616', 'Sukadana', '2023-06-27', 2, 10, 0, 2, '20010802201908021002', '$2y$10$OHigh2sTS/yjt2UcmbwbzeBrgqzZMD5GniX3mE7qntcSNyAArpHhS', '2023-06-26 17:24:43', '2023-07-27 10:12:57', 'PEGAWAI AKTIF', 1, 1, 1, NULL),
(18, '19890326 201712 2 001', 'IKA RATNA UTAMI, S.H., M.H.', 'Plh. Plt. Ketua Hakim', 'III/b', 'Pengadilan Negeri Ketapang', 'Penata Muda Tingkat I', 'S2', 'Hukum', 'ISLAM', 'Perempuan', '2017-12-01', '/Applications/XAMPP/xamppfiles/temp/phpvB7FR3', 'ik4r4tn4@gmail.com', '082136880821', 'Yogyakarta', '1989-03-26', 2, 10, 0, 2, '198903262017122001', '$2y$10$uCBBz5gRuREMM43I2R2o1eLq3dUlI02/kaMCbP6x7AhH364O2cFhG', '2023-06-26 18:32:29', '2023-07-28 14:22:01', 'PEGAWAI AKTIF', 0, 1, 1, NULL),
(19, '19910118 201712 1 001', 'AKHMAD BANGUN SUJIWO, S.H., M.H.', 'Hakim', 'III/b', 'Pengadilan Negeri Ketapang', 'Penata Muda Tingkat I', 'S2', 'Ilmu Hukum', 'ISLAM', 'Laki-laki', '2017-12-01', '/Applications/XAMPP/xamppfiles/temp/phpx6TlO9', 'akhmadbangunsujiwo@gmail.com', '081289371801', 'Batang', '1991-01-18', 4, 10, 0, 0, '199101182017121001', '$2y$10$tCnryXHxB2D33PJrZpsyd.i.Hq158FUz0m.zzrtrv2z3LmakPDE0.', '2023-06-26 18:39:05', '2023-07-27 16:40:40', 'PEGAWAI AKTIF', 0, 0, 1, NULL),
(20, '19920328 201712 1 001', 'ANDRE BUDIMAN PANJAITAN, S.H.', 'Hakim', 'III/b', 'Pengadilan Negeri Ketapang', 'Penata Muda Tingkat I', 'S1', 'Ilmu Hukum', 'KRISTEN', 'Laki-laki', '2017-12-01', '/Applications/XAMPP/xamppfiles/temp/phpWLqsmD', 'andrebudiman.p@gmail.com', '081228888780', 'Pati', '1992-03-28', 4, 10, 0, 0, '199203282017121001', '$2y$10$c.YtmA8R/RtI/efoKQ9ysO.ikLX8YpTevUyStwz6XCkEeaXs/bWfC', '2023-06-26 18:46:22', '2023-07-07 15:12:21', 'PEGAWAI AKTIF', 0, 0, 1, NULL),
(21, '19880311 201712 1 002', 'ALDILLA ANANTA, S.H., M.H.', 'Hakim', 'III/b', 'Pengadilan Negeri Ketapang', 'Penata Muda Tingkat I', 'S2', 'Ilmu Hukum', 'ISLAM', 'Laki-laki', '2017-12-01', '/Applications/XAMPP/xamppfiles/temp/phpZoZ7W0', 'aldillaananta@gmail.com', '085236949596', 'Lumajang', '1988-03-11', 4, 10, 0, 0, '198803112017121002', '$2y$10$nx0qm.XlJd.NpBYBnP2VRufHegQIo0OnK1wLPSUFZ.NpPIcVFpbPu', '2023-06-26 18:50:06', '2023-07-07 15:12:24', 'PEGAWAI AKTIF', 0, 0, 1, NULL),
(22, '19910630 201712 1 004', 'BAGUS RADITYA WIRADANA, S.H.', 'Plh. Plh. Plt. Panitera Muda Perdata', 'III/b', 'PN KETAPANG', 'Penata Muda Tingkat I', 'S1', 'Ilmu Hukum', 'HINDU', 'Laki-laki', '2017-12-01', NULL, 'Bagus.wiradana7@gmail.com', '082256481720', 'Denpasar', '1991-06-30', 2, 10, 0, 2, '199106302017121004', '$2y$10$vAHuPFfSLsu8r.VtEj0dhOE2r3laE7RysaSrh5HKyqStU3NxAQqsi', '2023-06-26 18:54:50', '2023-08-02 23:15:28', 'PEGAWAI AKTIF', 1, 1, 1, NULL),
(23, '19940612 201712 1 005', 'JOSUA NATANAEL, S.H.', 'Hakim', 'III/b', 'Pengadilan Negeri Ketapang', 'Penata Muda Tingkat I', 'S1', 'Ilmu Hukum', 'KRISTEN', 'Laki-laki', '2017-12-01', '/Applications/XAMPP/xamppfiles/temp/phppJhCyl', 'josuanatanaeltobing94@gmail.com', '082256481720', 'Jakarta Pusat', '1994-06-12', 4, 10, 0, 0, '199406122017121005', '$2y$10$DsrB82nYh9BKdW95PVUVIurPPl6J6/rUNlNPvulrDzJBuRVI.EMV6', '2023-06-26 18:59:32', '2023-08-16 08:27:23', 'PEGAWAI AKTIF', 0, 0, 1, NULL),
(24, '19950321 201712 1 003', 'DHIMAS NUGROHO PRIYOSUKAMTO, S.H.', 'Plh. Plt. Panitera Muda Perdata', 'III/b', 'Pengadilan Negeri Ketapang', 'Penata Muda Tingkat I', 'S1', 'Hukum', 'ISLAM', 'Laki-laki', '2017-12-01', '/Applications/XAMPP/xamppfiles/temp/phpvZz3qv', 'dhims.nugroho@gmail.com', '087887710140', 'Tegal', '1995-03-21', 2, 24, 0, 2, '199503212017121003', '$2y$10$YkEzuXv1vrcieOer9wwJ6ecRyKSdnmiw2yrDuke9tq3v9NdG6EUdK', '2023-06-26 19:03:57', '2023-07-28 14:25:13', 'PEGAWAI AKTIF', 1, 1, 1, NULL),
(25, '19831106 201101 2 010', 'LENI HERMANANINGSIH, S.H.', 'Plt. Panitera Muda Perdata', 'III/d', 'Pengadilan Negeri Ketapang', 'Penata Tingkat I', 'S1', 'Ilmu Hukum', 'ISLAM', 'Perempuan', '2011-01-01', '/Applications/XAMPP/xamppfiles/temp/phpFjqioo', 'leni_hermananingsih@yahoo.co.id', '081257515352', 'Tasikmalaya', '1983-11-06', 2, 26, 0, 2, '198311062011012010', '$2y$10$5QbPNAizAuo7gEDWohJ9BOulze2byhlxmZLd/Fpv4dD8vxKtTv0iq', '2023-06-26 19:15:31', '2023-07-12 13:47:38', 'PEGAWAI AKTIF', 1, 0, 1, NULL),
(26, '19670714 199203 1 006', 'SEDIYAN', 'Plt. Kepala Pimpinan Kepaniteraan', 'III/b', 'Pengadilan Negeri Ketapang', 'Penata Muda Tingkat I', 'SMA/SMK', 'Tata Buku', 'ISLAM', 'Laki-laki', '1992-03-01', '/Applications/XAMPP/xamppfiles/temp/phpmC9Lh4', 'sedianktp@gmail.com', '089524526225', 'Ketapang', '1967-07-14', 2, 25, 0, 2, '196707141992031006', '$2y$10$QfU5PTO8Szza4FuxxCEMK.sbBGPGRI1Kvo1H/e8purBC8/LKxup3.', '2023-07-09 15:49:07', '2023-08-03 06:31:35', 'PEGAWAI AKTIF', 1, 1, 0, NULL),
(27, '19670714 99203 1 006', 'SEDIYAN', 'Panitera Muda Perdata', 'III/b', 'PN KETAPANG', 'Penata Muda Tingkat I', 'SMA/SMK', 'Tata Buku', 'ISLAM', 'Laki-laki', '1992-03-01', NULL, 'Sedianktp@gmail.com', '089524526225', 'Ketapang', '1967-07-14', 4, 25, 0, 0, '19670714992031006', '$2y$10$d90K0LrtrVe0Dnrt5cIa2.AK8d56Qvzc1XkHbroJWPAsLDJgDp682', '2023-07-09 18:53:14', '2023-08-02 23:28:20', 'PEGAWAI AKTIF', 0, 0, 1, NULL),
(28, '19660206 199403 1 002', 'MUHAMMAD HARIYANDI', 'Panitera Pengganti', 'III/c', 'PN KETAPANG', 'Penata', 'SMA/SMK', '-', 'ISLAM', 'Laki-laki', '1994-03-01', NULL, 'Hariyandi1966@gmail.com', '082256481720', 'Pontianak', '1966-02-06', 4, 12, 0, 0, '196602061994031002', '$2y$10$ZUApBD.KMmnUu9voPhpjK.4DoocREKXrIZWUpN5lhTbaUP9ilCCle', '2023-07-09 19:03:25', '2023-08-10 08:57:20', 'PEGAWAI AKTIF', 0, 0, 1, 'wZO0fZVuHy-profil.jpg'),
(29, '19851215 201403 1 002', 'IIP MURDHIANSYAH, S.H.', 'Panitera Pengganti', 'III/c', 'Pengadilan Negeri Ketapang', 'Penata', 'S1', 'Ilmu Hukum', 'ISLAM', 'Laki-laki', '2014-03-01', '/Applications/XAMPP/xamppfiles/temp/phpNQAH1A', 'murdhiansyah85@gmail.com', '082155522245', 'Pontianak', '1985-12-15', 2, 22, 0, 2, '198512152014031002', '$2y$10$1p0cAn6sM9kLESuc23Z3/e2czwz7UMdgKK4PSjT2iRfR9gg9qFJSG', '2023-07-09 19:08:27', '2023-08-11 04:39:30', 'PEGAWAI AKTIF', 0, 0, 1, NULL),
(32, '112243554 134454 432 113425', 'DILLA ANANTA, S.H., M.H.', 'Panitera Muda Hukum', 'III/b', 'PN KETAPANG', 'Penata Muda Tingkat I', 'S1', 'Hukum', 'ISLAM', 'Laki-laki', '2008-01-14', '/Applications/XAMPP/xamppfiles/temp/phpGsXs9R', 'bagus.wiradana7@gmail.com', '082256481720', 'Lumajang', '1993-01-14', 4, 10, 0, 0, '112243554134454432113425', '$2y$10$.R0BZifzjY0MRAQWcNAFP.ybBX7gBK.XR3YX26ZU4j4aMkSf3jO8y', '2023-07-14 09:24:23', '2023-07-14 09:24:31', 'PEGAWAI AKTIF', 0, 0, 0, NULL),
(34, '19771201 1010010 10010 01001', 'Budi', 'Panitera Pengganti', 'Penata Muda Tingkat I', 'PN KETAPANG', 'III/b', 'S1', 'Ilmu Hukum', 'ISLAM', 'Laki-laki', '2023-08-03', 'C:\\xampp\\tmp\\php4BD4.tmp', 'budi@gmail.com', '08225645627', 'Sukadana', '1997-01-03', 4, 12, 0, 0, '1977120110100101001001001', '$2y$10$SAWAQ6CFvVKcKhJvrWlP9eI8WAL/srSb5LA36JsVaiGJqir8P/1eq', '2023-08-02 21:00:01', '2023-08-02 21:02:59', 'PEGAWAI AKTIF', 0, 0, 0, NULL),
(36, '20001010 20221010 2 001', 'Naruka', 'Staf Subbagian Keportala', 'II/d', 'PN KETAPANG', 'Penghujung', 'SMA/SMK', 'IPA', 'ISLAM', 'Perempuan', '2022-11-10', 'C:\\xampp\\tmp\\phpAA6.tmp', 'naruka@gmail.com', '082256481720', 'Sukadana', '2000-10-10', 4, 23, 0, 0, '20001010202210102001', '$2y$10$OqqPlElomDYegxap2YL88Od5fBGhdGl/MiN6FWYMyCMMqAmonmvMC', '2023-08-11 05:01:29', '2023-08-11 05:01:29', 'PEGAWAI AKTIF', 0, 0, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pengaturan_cuti`
--

CREATE TABLE `pengaturan_cuti` (
  `pengaturan_cuti_id` int(11) NOT NULL,
  `flag_erase` int(2) NOT NULL DEFAULT 1,
  `nama_cuti` varchar(255) NOT NULL,
  `jumlah_hari` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pengaturan_cuti`
--

INSERT INTO `pengaturan_cuti` (`pengaturan_cuti_id`, `flag_erase`, `nama_cuti`, `jumlah_hari`, `created_at`, `updated_at`) VALUES
(1, 1, 'cuti tahunan', 12, '2023-04-17 15:51:43', '2023-04-13 20:10:01'),
(2, 1, 'cuti besar', 5, '2023-04-17 15:51:43', '2023-04-13 20:10:01'),
(3, 1, 'cuti melahirkan', 15, '2023-04-17 15:51:43', '2023-04-13 20:11:08'),
(4, 1, 'cuti diluar tanggungan negara', 10, '2023-04-17 15:51:43', '2023-04-13 20:11:08'),
(5, 1, 'cuti karena alasan pentig', 10, '2023-04-17 15:51:43', '2023-04-13 20:11:33'),
(6, 1, 'cuti sakit', 15, '2023-06-11 15:41:26', '2023-04-13 20:11:33');

-- --------------------------------------------------------

--
-- Table structure for table `pengaturan_ttd`
--

CREATE TABLE `pengaturan_ttd` (
  `id` int(11) NOT NULL,
  `pt_nama` varchar(255) NOT NULL,
  `pt_nip` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pengaturan_ttd`
--

INSERT INTO `pengaturan_ttd` (`id`, `pt_nama`, `pt_nip`, `created_at`, `updated_at`) VALUES
(1, 'Andika Pratama', '19900803 200108 1 022', '2023-07-22 05:32:35', '2023-07-21 22:32:35');

-- --------------------------------------------------------

--
-- Table structure for table `plh`
--

CREATE TABLE `plh` (
  `plh_id` int(11) NOT NULL,
  `pegawai_pengganti_plh` int(11) NOT NULL COMMENT 'pegawai yang menggantikan PLT',
  `pegawai_plh` int(11) NOT NULL COMMENT 'pegawai yang plt',
  `plh_mulai` date NOT NULL,
  `plh_selesai` date NOT NULL,
  `plh_jabatan` varchar(255) NOT NULL,
  `plh_jabatan_asal` varchar(255) NOT NULL,
  `status_plh` int(11) DEFAULT 1,
  `flag_erase` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `plh`
--

INSERT INTO `plh` (`plh_id`, `pegawai_pengganti_plh`, `pegawai_plh`, `plh_mulai`, `plh_selesai`, `plh_jabatan`, `plh_jabatan_asal`, `status_plh`, `flag_erase`, `created_at`, `updated_at`) VALUES
(11, 26, 6, '2023-07-20', '2023-07-27', 'plh. staf pelaksana', 'Panitera Muda Perdata', 0, 1, '2023-07-14 15:38:04', '2023-07-14 08:38:04'),
(12, 26, 6, '2023-07-20', '2023-07-27', 'plh. staf pelaksana', 'Panitera Muda Perdata', 1, 1, '2023-07-14 15:37:56', '2023-07-14 08:36:18'),
(14, 18, 12, '2023-07-19', '2023-07-26', 'plh. Plt. Ketua Hakim', 'Hakim', 0, 0, '2023-07-28 14:40:18', '2023-07-28 07:40:18'),
(15, 24, 25, '2023-07-26', '2023-07-27', 'plh. Plt. Panitera Muda Perdata', 'Plt. kepala pimpinan kepaniteraan', 0, 0, '2023-07-28 14:40:23', '2023-07-28 07:40:23'),
(16, 22, 24, '2023-07-28', '2023-07-28', 'plh. Plh. Plt. Panitera Muda Perdata', 'Plt. Ketua Hakim', 0, 0, '2023-07-28 14:34:06', '2023-07-28 07:34:06'),
(17, 14, 9, '2023-08-03', '2023-08-04', 'plh. Panitera Pengganti', 'Plt. Plt. operator', 0, 0, '2023-08-02 19:00:32', '2023-08-02 12:00:32');

-- --------------------------------------------------------

--
-- Table structure for table `plt`
--

CREATE TABLE `plt` (
  `plt_id` int(11) NOT NULL,
  `pegawai_pengganti_plt` int(11) NOT NULL COMMENT 'pegawai yang menggantikan PLT',
  `pegawai_plt` int(11) NOT NULL COMMENT 'pegawai yang plt',
  `plt_mulai` date NOT NULL,
  `plt_selesai` date NOT NULL,
  `plt_jabatan` varchar(255) NOT NULL,
  `plt_jabatan_asal` varchar(255) NOT NULL,
  `status_plt` int(11) DEFAULT 1,
  `flag_erase` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `plt`
--

INSERT INTO `plt` (`plt_id`, `pegawai_pengganti_plt`, `pegawai_plt`, `plt_mulai`, `plt_selesai`, `plt_jabatan`, `plt_jabatan_asal`, `status_plt`, `flag_erase`, `created_at`, `updated_at`) VALUES
(11, 22, 11, '2022-07-27', '2023-07-27', 'Plt. kepala pimpinan kepaniteraan', 'Hakim', 0, 0, '2023-07-27 16:24:04', '2023-07-27 09:24:04'),
(12, 15, 14, '2023-07-27', '2023-07-29', 'Plt. operator', 'Plh. Ketua Hakim', 0, 0, '2023-07-27 16:24:41', '2023-07-27 09:24:41'),
(13, 15, 14, '2023-07-27', '2023-07-29', 'Plt. operator', 'Plt. operator', 0, 0, '2023-07-27 16:24:45', '2023-07-27 09:24:45'),
(14, 24, 11, '2023-07-27', '2023-07-27', 'Plt. kepala pimpinan kepaniteraan', 'Hakim', 0, 0, '2023-07-28 11:39:56', '2023-07-28 04:39:56'),
(15, 14, 15, '2023-07-27', '2023-07-27', 'Plt. Plt. operator', 'operator', 0, 0, '2023-07-27 16:30:52', '2023-07-27 09:30:52'),
(16, 12, 3, '2022-09-01', '2023-08-01', 'Plt. Ketua Hakim', 'kepala pimpinan bidang SEKRETARIAT', 0, 0, '2023-07-28 11:37:33', '2023-07-28 04:37:33'),
(17, 22, 3, '2022-08-01', '2023-08-01', 'Plt. Ketua Hakim', 'Plt. kepala pimpinan kepaniteraan', 1, 1, '2023-07-28 04:38:37', '2023-07-28 04:38:37'),
(18, 26, 11, '2022-12-01', '2023-12-01', 'Plt. Kepala Pimpinan Kepaniteraan', 'Plh. staf pelaksana', 0, 0, '2023-08-11 04:38:53', '2023-08-11 04:38:53');

-- --------------------------------------------------------

--
-- Table structure for table `tidak_masuk`
--

CREATE TABLE `tidak_masuk` (
  `td_masuk_id` int(11) NOT NULL,
  `id_pimpinan_bidang` int(11) NOT NULL,
  `id_pimpinan_pn` int(11) NOT NULL,
  `id_pegawai_izin` int(11) NOT NULL,
  `tgl_mulai_izin` date NOT NULL,
  `tgl_selesai_izin` date NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `alasan_izin` text NOT NULL,
  `alasan_tolak` longtext DEFAULT NULL,
  `flag_erase` int(11) NOT NULL DEFAULT 1,
  `kode_token` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tidak_masuk`
--

INSERT INTO `tidak_masuk` (`td_masuk_id`, `id_pimpinan_bidang`, `id_pimpinan_pn`, `id_pegawai_izin`, `tgl_mulai_izin`, `tgl_selesai_izin`, `status`, `alasan_izin`, `alasan_tolak`, `flag_erase`, `kode_token`, `created_at`, `updated_at`) VALUES
(25, 3, 3, 11, '2023-08-10', '2023-08-11', 2, 'Keluarga sakit', NULL, 1, 'ulWN8MPPhAwnpIHhVJUCuwx7u', '2023-08-18 12:14:55', '2023-08-18 12:14:55'),
(26, 3, 3, 11, '2023-08-13', '2023-08-14', 0, 'keluarga sakit', NULL, 1, 'uF5i3eb59CFMpqvUTlsF8OCEm', '2023-08-10 12:56:12', '2023-08-10 12:56:12'),
(27, 3, 3, 28, '2023-08-10', '2023-08-14', 2, 'Urusan Keluarga', NULL, 1, 'f6YXYZj5DzT2wHBZuJh848Z6h', '2023-08-22 15:26:33', '2023-08-22 15:26:33'),
(28, 3, 3, 28, '2023-08-10', '2023-08-11', 0, 'sakit', NULL, 0, 'IPgjPnZ9gnA9Rp3kAoUFcat1n', '2023-08-10 13:10:32', '2023-08-10 13:10:32');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bidang`
--
ALTER TABLE `bidang`
  ADD PRIMARY KEY (`bidang_id`);

--
-- Indexes for table `cuti`
--
ALTER TABLE `cuti`
  ADD PRIMARY KEY (`cuti_id`);

--
-- Indexes for table `cuti_detail`
--
ALTER TABLE `cuti_detail`
  ADD PRIMARY KEY (`cuti_detail_id`);

--
-- Indexes for table `kalender_libur`
--
ALTER TABLE `kalender_libur`
  ADD PRIMARY KEY (`kalender_id`);

--
-- Indexes for table `keluar_kantor`
--
ALTER TABLE `keluar_kantor`
  ADD PRIMARY KEY (`keluar_kantor_id`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`pegawai_id`);

--
-- Indexes for table `pengaturan_cuti`
--
ALTER TABLE `pengaturan_cuti`
  ADD PRIMARY KEY (`pengaturan_cuti_id`);

--
-- Indexes for table `pengaturan_ttd`
--
ALTER TABLE `pengaturan_ttd`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `plh`
--
ALTER TABLE `plh`
  ADD PRIMARY KEY (`plh_id`);

--
-- Indexes for table `plt`
--
ALTER TABLE `plt`
  ADD PRIMARY KEY (`plt_id`);

--
-- Indexes for table `tidak_masuk`
--
ALTER TABLE `tidak_masuk`
  ADD PRIMARY KEY (`td_masuk_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bidang`
--
ALTER TABLE `bidang`
  MODIFY `bidang_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `cuti`
--
ALTER TABLE `cuti`
  MODIFY `cuti_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `cuti_detail`
--
ALTER TABLE `cuti_detail`
  MODIFY `cuti_detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=183;

--
-- AUTO_INCREMENT for table `kalender_libur`
--
ALTER TABLE `kalender_libur`
  MODIFY `kalender_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `keluar_kantor`
--
ALTER TABLE `keluar_kantor`
  MODIFY `keluar_kantor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `pegawai_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `pengaturan_cuti`
--
ALTER TABLE `pengaturan_cuti`
  MODIFY `pengaturan_cuti_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `pengaturan_ttd`
--
ALTER TABLE `pengaturan_ttd`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `plh`
--
ALTER TABLE `plh`
  MODIFY `plh_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `plt`
--
ALTER TABLE `plt`
  MODIFY `plt_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tidak_masuk`
--
ALTER TABLE `tidak_masuk`
  MODIFY `td_masuk_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
