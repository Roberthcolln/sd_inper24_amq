-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 14, 2023 at 12:20 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sdinpres24_ambon`
--

-- --------------------------------------------------------

--
-- Table structure for table `berita`
--

CREATE TABLE `berita` (
  `id_berita` int(10) UNSIGNED NOT NULL,
  `judul_berita` varchar(255) NOT NULL,
  `isi_berita` text NOT NULL,
  `gambar_berita` varchar(255) NOT NULL,
  `tanggal_berita` date NOT NULL,
  `slug_berita` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `berita`
--

INSERT INTO `berita` (`id_berita`, `judul_berita`, `isi_berita`, `gambar_berita`, `tanggal_berita`, `slug_berita`, `created_at`, `updated_at`) VALUES
(3, 'Peresmian Gedung IT SD Inpres 24 Ambon', '<p>Peresmian Gedung IT SD Inpres 24 Ambon bersama dengan PLN Peduli Maluku Maluku Utara</p>', 'Berita20231212015227.png', '2023-12-16', 'peresmian-gedung-it-sd-inpres-24-ambon', '2023-12-11 16:52:27', '2023-12-11 17:04:41');

-- --------------------------------------------------------

--
-- Table structure for table `daftar_kegiatans`
--

CREATE TABLE `daftar_kegiatans` (
  `id_daftar_kegiatan` int(10) UNSIGNED NOT NULL,
  `id_kegiatan` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `tanggal_kegiatan` date DEFAULT NULL,
  `biaya_kegiatan` float DEFAULT NULL,
  `id_status_daftar_kegiatan` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `diskon`
--

CREATE TABLE `diskon` (
  `id_diskon` int(10) UNSIGNED NOT NULL,
  `nama_diskon` varchar(255) NOT NULL,
  `gambar_diskon` varchar(255) NOT NULL,
  `keterangan_diskon` text NOT NULL,
  `slug_diskon` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `diskon`
--

INSERT INTO `diskon` (`id_diskon`, `nama_diskon`, `gambar_diskon`, `keterangan_diskon`, `slug_diskon`, `created_at`, `updated_at`) VALUES
(5, 'Diskon 50%', 'diskon20231014040626.png', '<p>Diskon hanya berlaku untuk anak guru SD, SMP, dan SMA atau yang sederajat.</p>', 'diskon-50', '2023-10-13 19:06:26', '2023-10-14 03:53:40'),
(6, 'Diskon 5%', 'diskon20231014040842.png', '<p>Siswa pernah terdaftar sebagai siswa Ganesha Operation tahun ajaran sebelumnya.</p>', 'diskon-5', '2023-10-13 19:08:42', '2023-10-14 03:54:35');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `faqs`
--

CREATE TABLE `faqs` (
  `id` int(10) UNSIGNED NOT NULL,
  `pertanyaan` text NOT NULL,
  `jawaban` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `faqs`
--

INSERT INTO `faqs` (`id`, `pertanyaan`, `jawaban`, `created_at`, `updated_at`) VALUES
(1, 'Apa ??', 'Kenapa !!', '2023-10-14 04:04:19', '2023-10-14 04:04:19');

-- --------------------------------------------------------

--
-- Table structure for table `galeri`
--

CREATE TABLE `galeri` (
  `id_galeri` int(10) UNSIGNED NOT NULL,
  `nama_galeri` varchar(255) DEFAULT NULL,
  `jenis_galeri` varchar(255) DEFAULT NULL,
  `keterangan_galeri` text DEFAULT NULL,
  `gambar_galeri` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `galeri`
--

INSERT INTO `galeri` (`id_galeri`, `nama_galeri`, `jenis_galeri`, `keterangan_galeri`, `gambar_galeri`, `created_at`, `updated_at`) VALUES
(1, 'Foto Gedung IT', 'Galeri', '<p>Gedung IT SD Inpres 24 Ambon</p>', 'Galeri20230624052630.jpg', '2023-06-24 08:26:30', '2023-12-11 18:26:08'),
(3, 'Ruang kelas', 'Galeri', '<p>Ruang Kelas 6 SD Inpres 24 Ambon</p>', 'Galeri20231212032750.jpg', '2023-12-11 18:27:50', '2023-12-11 18:27:50');

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE `guru` (
  `id_guru` int(10) UNSIGNED NOT NULL,
  `nama_guru` varchar(255) NOT NULL,
  `jabatan_guru` varchar(255) NOT NULL,
  `foto_guru` varchar(255) NOT NULL,
  `facebook_guru` varchar(255) NOT NULL,
  `instagram_guru` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`id_guru`, `nama_guru`, `jabatan_guru`, `foto_guru`, `facebook_guru`, `instagram_guru`, `created_at`, `updated_at`) VALUES
(1, 'Nama Kepala Sekolah', 'Kepala Sekolah', 'guru20231211115428.png', 'Nama Kepala Sekolah', 'Nama Kepala Sekolah', '2023-12-11 14:54:28', '2023-12-11 14:54:28'),
(2, 'Nama Wakil Kepala Sekolah', 'Wakil Kepala Sekolah', 'guru20231211115451.png', 'Nama Wakil Kepala Sekolah', 'Nama Wakil Kepala Sekolah', '2023-12-11 14:54:51', '2023-12-11 14:54:51'),
(3, 'Nama Guru Kelas', 'Guru Kelas', 'guru20231211115709.png', 'Nama Guru Kelas', 'Nama Guru Kelas', '2023-12-11 14:57:09', '2023-12-11 14:57:09'),
(4, 'Nama Guru Bidang Studi', 'Guru Bidang Studi', 'guru20231211115746.png', 'Nama Guru Bidang Studi', 'Nama Guru Bidang Studi', '2023-12-11 14:57:46', '2023-12-11 14:57:46'),
(5, 'Nama Tata Usaha', 'Tata Usaha', 'guru20231211115928.png', 'Nama Tata Usaha', 'Nama Tata Usaha', '2023-12-11 14:59:28', '2023-12-11 15:04:29'),
(6, 'Nama Petugas Perpustakaan', 'Petugas Perpustakaan', 'guru20231212120025.png', 'Nama Petugas Perpustakaan', 'Nama Petugas Perpustakaan', '2023-12-11 15:00:25', '2023-12-11 15:00:25'),
(7, 'Welmien Ch Pattikawa/ L', 'Guru Kelas', 'guru20231213011614.png', 'rina', 'rina', '2023-12-12 16:16:14', '2023-12-12 16:16:14');

-- --------------------------------------------------------

--
-- Table structure for table `iventaris`
--

CREATE TABLE `iventaris` (
  `id_iventaris` int(10) UNSIGNED NOT NULL,
  `nama_iventaris` varchar(255) NOT NULL,
  `gambar_iventaris` varchar(255) NOT NULL,
  `jumlah_iventaris` varchar(255) NOT NULL,
  `kondisi_iventaris` varchar(255) NOT NULL,
  `slug_iventaris` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `iventaris`
--

INSERT INTO `iventaris` (`id_iventaris`, `nama_iventaris`, `gambar_iventaris`, `jumlah_iventaris`, `kondisi_iventaris`, `slug_iventaris`, `created_at`, `updated_at`) VALUES
(5, 'Laptopx', 'iventaris20231102062628.jpg', '12', 'Sangat Baik', 'laptopx', '2023-11-02 09:26:28', '2023-12-12 12:32:54');

-- --------------------------------------------------------

--
-- Table structure for table `kategori_kegiatan`
--

CREATE TABLE `kategori_kegiatan` (
  `id_kategori_kegiatan` int(10) UNSIGNED NOT NULL,
  `nama_kategori_kegiatan` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kategori_kegiatan`
--

INSERT INTO `kategori_kegiatan` (`id_kategori_kegiatan`, `nama_kategori_kegiatan`, `created_at`, `updated_at`) VALUES
(1, 'Internal', '2023-11-24 09:21:59', '2023-12-11 08:27:26');

-- --------------------------------------------------------

--
-- Table structure for table `kegiatan`
--

CREATE TABLE `kegiatan` (
  `id_kegiatan` int(10) UNSIGNED NOT NULL,
  `id_kategori_kegiatan` int(11) NOT NULL,
  `id_sub_kategori_kegiatan` int(11) NOT NULL,
  `nama_kegiatan` varchar(255) NOT NULL,
  `deskripsi_kegiatan` text NOT NULL,
  `tempat_kegiatan` varchar(255) NOT NULL,
  `gambar_kegiatan` varchar(255) NOT NULL,
  `tanggal_kegiatan` date NOT NULL,
  `jam_kegiatan` time NOT NULL,
  `biaya_kegiatan` float DEFAULT NULL,
  `id_status_kegiatan` int(11) NOT NULL,
  `id_publish_kegiatan` int(11) NOT NULL,
  `slug_kegiatan` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kegiatan`
--

INSERT INTO `kegiatan` (`id_kegiatan`, `id_kategori_kegiatan`, `id_sub_kategori_kegiatan`, `nama_kegiatan`, `deskripsi_kegiatan`, `tempat_kegiatan`, `gambar_kegiatan`, `tanggal_kegiatan`, `jam_kegiatan`, `biaya_kegiatan`, `id_status_kegiatan`, `id_publish_kegiatan`, `slug_kegiatan`, `created_at`, `updated_at`) VALUES
(2, 1, 1, 'Senam Pagix', '<p>Ikutilah bersama dalam kegiatan Senam Pagi SD Inpres 24 Ambon .. Ditunggu yahhh!!</p>', 'Halaman SD Inpres 24 Ambon', 'Kegiatan20231212031317.jpg', '2023-12-15', '07:00:00', NULL, 2, 1, 'senam-pagix', '2023-12-11 18:13:17', '2023-12-12 11:34:34');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` int(10) UNSIGNED NOT NULL,
  `id_guru` int(11) NOT NULL,
  `nama_kelas` varchar(255) NOT NULL,
  `deskripsi_kelas` text NOT NULL,
  `jumlah_siswa` varchar(255) NOT NULL,
  `gambar_kelas` varchar(255) NOT NULL,
  `slug_kelas` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `id_guru`, `nama_kelas`, `deskripsi_kelas`, `jumlah_siswa`, `gambar_kelas`, `slug_kelas`, `created_at`, `updated_at`) VALUES
(1, 3, 'Kelas 1', '<p>Kelas 1</p>', '10', 'kelas20231214011727.jpg', 'kelas-1', '2023-12-13 16:17:27', '2023-12-13 16:17:27'),
(2, 4, 'Kelas 2', '<p>Kelas 2</p>', '10', 'kelas20231214011748.jpg', 'kelas-2', '2023-12-13 16:17:48', '2023-12-13 16:17:48'),
(3, 3, 'Kelas 3', '<p>Kelas 3</p>', '10', 'kelas20231214011809.jpg', 'kelas-3', '2023-12-13 16:18:09', '2023-12-13 16:18:09'),
(4, 3, 'Kelas 4', '<p>Kelas 4</p>', '10', 'kelas20231214011830.jpg', 'kelas-4', '2023-12-13 16:18:30', '2023-12-13 16:18:30'),
(5, 3, 'Kelas 5', '<p>Kelas 5</p>', '10', 'kelas20231214011850.jpg', 'kelas-5', '2023-12-13 16:18:50', '2023-12-13 16:18:50'),
(6, 3, 'Kelas 6', '<p>Kelas 6</p>', '10', 'kelas20231214011908.jpg', 'kelas-6', '2023-12-13 16:19:08', '2023-12-13 16:19:08');

-- --------------------------------------------------------

--
-- Table structure for table `konsentrasi`
--

CREATE TABLE `konsentrasi` (
  `id_konsentrasi` int(10) UNSIGNED NOT NULL,
  `judul_konsentrasi` varchar(255) NOT NULL,
  `deskripsi_konsentrasi` text NOT NULL,
  `gambar_konsentrasi` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `layanan`
--

CREATE TABLE `layanan` (
  `id_layanan` int(10) UNSIGNED NOT NULL,
  `nama_layanan` varchar(255) NOT NULL,
  `gambar_layanan` varchar(255) NOT NULL,
  `keterangan_layanan` text NOT NULL,
  `slug_layanan` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `layanan`
--

INSERT INTO `layanan` (`id_layanan`, `nama_layanan`, `gambar_layanan`, `keterangan_layanan`, `slug_layanan`, `created_at`, `updated_at`) VALUES
(10, 'Layanan Dukungan Sistem', 'layanan20231014035000.png', '<p>Layanan yang memiliki tujuan untuk memantapkan, memelihara, serta meningkatkan program BK.&nbsp;</p>', 'layanan-dukungan-sistem', '2023-10-13 18:50:00', '2023-12-11 08:04:06'),
(11, 'Layanan Perencanaan Individual', 'layanan20231014035020.png', '<p>membantu siswa dalam kegiatan belajar nya sehingga siswa mampu memahami setiap perkembangan pribadinya, memantau, merencanakan.</p>', 'layanan-perencanaan-individual', '2023-10-13 18:50:20', '2023-12-11 08:03:43'),
(12, 'Layanan Responsif', 'layanan20231014035041.png', '<p>suatu bentuk layanan yang sangat penting dan harus segera diberikan kepada pihak yang memerlukan.</p>', 'layanan-responsif', '2023-10-13 18:50:41', '2023-12-11 07:57:11'),
(13, 'Layanan Dasar', 'layanan20231014035106.png', '<p>sebuah bentuk bantuan yang diberikan oleh konselor kepada pihak konseli berupa proses pemberian bantuan berupa kegiatan-kegiatan terstruktur yang dilaksanakan secara sistematis.</p>', 'layanan-dasar', '2023-10-13 18:51:06', '2023-12-11 08:03:08');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2023_05_08_060922_create_sessions_table', 1),
(7, '2023_05_09_015610_create_galeris_table', 1),
(8, '2023_05_09_115746_create_settings_table', 1),
(9, '2023_05_09_151258_create_teams_table', 1),
(10, '2023_05_10_114136_create_beritas_table', 1),
(11, '2023_05_10_154455_create_partners_table', 1),
(12, '2023_05_13_222729_create_projects_table', 1),
(13, '2023_05_13_232938_create_rekenings_table', 1),
(14, '2023_05_14_224257_create_unit_bisnis_table', 1),
(15, '2023_05_15_001227_create_konsentrasis_table', 1),
(16, '2023_05_15_144125_create_visis_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `partner`
--

CREATE TABLE `partner` (
  `id_partner` int(10) UNSIGNED NOT NULL,
  `kategori_partner` varchar(255) NOT NULL,
  `nama_partner` varchar(255) NOT NULL,
  `gambar_partner` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `program`
--

CREATE TABLE `program` (
  `id_program` int(10) UNSIGNED NOT NULL,
  `nama_program` varchar(255) NOT NULL,
  `gambar_program` varchar(255) NOT NULL,
  `keterangan_program` text NOT NULL,
  `slug_program` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `program`
--

INSERT INTO `program` (`id_program`, `nama_program`, `gambar_program`, `keterangan_program`, `slug_program`, `created_at`, `updated_at`) VALUES
(1, 'Program SD', 'program20230704073040.png', '<p>Program ini dibuat khusus untuk SobatGO yang masih duduk di sekolah dasar agar bisa jadi juara di sekolah dan masuk ke SMP favorit.</p>', 'program-sd', '2023-07-03 22:30:40', '2023-10-14 02:55:46');

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `id_project` int(10) UNSIGNED NOT NULL,
  `nama_project` varchar(255) NOT NULL,
  `gambar_project` varchar(255) NOT NULL,
  `keterangan_project` text NOT NULL,
  `info_project` varchar(255) NOT NULL,
  `slug_project` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `publish_kegiatan`
--

CREATE TABLE `publish_kegiatan` (
  `id_publish_kegiatan` int(10) UNSIGNED NOT NULL,
  `nama_publish_kegiatan` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `publish_kegiatan`
--

INSERT INTO `publish_kegiatan` (`id_publish_kegiatan`, `nama_publish_kegiatan`, `created_at`, `updated_at`) VALUES
(1, 'Published', NULL, NULL),
(2, 'Draft', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `rekening`
--

CREATE TABLE `rekening` (
  `id_rekening` int(10) UNSIGNED NOT NULL,
  `nama_rekening` varchar(255) NOT NULL,
  `bank_rekening` varchar(255) NOT NULL,
  `no_rekening` varchar(255) NOT NULL,
  `logo_rekening` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('GPrYHv6Wbf3DG7HtCNwErIqOWH5XyappMRryMVZx', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36 Edg/120.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiVHFzTVVGWDc4TWdZN0dPSkVYaHhXbkJKTGhKc0JGNWx4TVE2UVVabSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fX0=', 1702499235);

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE `setting` (
  `id_setting` int(10) UNSIGNED NOT NULL,
  `instansi_setting` varchar(255) NOT NULL,
  `pimpinan_setting` varchar(255) NOT NULL,
  `logo_setting` varchar(255) NOT NULL,
  `favicon_setting` varchar(255) NOT NULL,
  `tentang_setting` text NOT NULL,
  `visi_setting` text DEFAULT NULL,
  `misi_setting` text DEFAULT NULL,
  `keyword_setting` varchar(255) NOT NULL,
  `alamat_setting` varchar(255) NOT NULL,
  `instagram_setting` varchar(255) NOT NULL,
  `youtube_setting` varchar(255) NOT NULL,
  `email_setting` varchar(255) NOT NULL,
  `no_hp_setting` varchar(255) NOT NULL,
  `maps_setting` text NOT NULL,
  `banner_setting` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`id_setting`, `instansi_setting`, `pimpinan_setting`, `logo_setting`, `favicon_setting`, `tentang_setting`, `visi_setting`, `misi_setting`, `keyword_setting`, `alamat_setting`, `instagram_setting`, `youtube_setting`, `email_setting`, `no_hp_setting`, `maps_setting`, `banner_setting`, `created_at`, `updated_at`) VALUES
(2, 'SD Inpres 24 Ambon', 'Marjam Dasfordate, S.Th', 'Screenshot (80).png', 'Screenshot (80).png', '<p style=\"text-align:justify\">Tentang Sekolah Dasar Inpres 24 Ambon</p>', '<p><u><strong><span style=\"font-size:20px\">Visi</span></strong></u></p>\r\n\r\n<p>Masukan Visi Sekolah</p>', '<p><u><strong><span style=\"font-size:20px\">Misi</span></strong></u></p>\r\n\r\n<p>Masukan Misi Sekolah</p>', 'SD Inpres 24 Ambon', 'Jl. Skip, Kel Karang Panjang, Kec. Sirimau, Kota Ambon, Maluku', 'Lorem Ipsum', 'https://youtu.be/EGtpYDRXXLM', 'sdinpres24amq@gmail.com', '+62812345678', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3981.514218718209!2d128.18626077327195!3d-3.6972834962766776!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2d6ce914e1708e79%3A0xc9e928f3495d2286!2sSD%20Inpres%2024%20Ambon!5e0!3m2!1sen!2sid!4v1702302802440!5m2!1sen!2sid', 'OIP (1).jpeg', NULL, '2023-12-13 20:22:56');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `id_siswa` int(10) UNSIGNED NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `nisn_siswa` int(11) NOT NULL,
  `nama_siswa` varchar(255) NOT NULL,
  `alamat_siswa` varchar(255) NOT NULL,
  `tempat_lahir_siswa` varchar(255) NOT NULL,
  `tanggal_lahir_siswa` date NOT NULL,
  `jenis_kelamin_siswa` varchar(255) NOT NULL,
  `no_hp_siswa` varchar(255) NOT NULL,
  `nama_ayah_siswa` varchar(255) NOT NULL,
  `nama_ibu_siswa` varchar(255) NOT NULL,
  `pekerjaan_ayah_siswa` varchar(255) NOT NULL,
  `pekerjaan_ibu_siswa` varchar(255) NOT NULL,
  `alamat_ayah_siswa` varchar(255) NOT NULL,
  `alamat_ibu_siswa` varchar(255) NOT NULL,
  `foto_siswa` varchar(255) NOT NULL,
  `slug_siswa` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id_siswa`, `id_kelas`, `nisn_siswa`, `nama_siswa`, `alamat_siswa`, `tempat_lahir_siswa`, `tanggal_lahir_siswa`, `jenis_kelamin_siswa`, `no_hp_siswa`, `nama_ayah_siswa`, `nama_ibu_siswa`, `pekerjaan_ayah_siswa`, `pekerjaan_ibu_siswa`, `alamat_ayah_siswa`, `alamat_ibu_siswa`, `foto_siswa`, `slug_siswa`, `created_at`, `updated_at`) VALUES
(1, 6, 127936416, 'Colln Johanis Pitche Pattikawa', 'Jalan skip tengah', 'Ambon', '2012-01-28', 'Laki- Laki', '082124944770', 'Paulus Pattikawa', 'Welmien Pattikawa/ L', 'Lainnya', 'Guru', 'Jalan skip tengah', 'Jalan skip tengah', 'Siswa20231212100341.png', 'colln-johanis-pitche-pattikawa', '2023-12-12 13:03:41', '2023-12-13 18:53:59');

-- --------------------------------------------------------

--
-- Table structure for table `status_kegiatan`
--

CREATE TABLE `status_kegiatan` (
  `id_status_kegiatan` int(10) UNSIGNED NOT NULL,
  `nama_status_kegiatan` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `status_kegiatan`
--

INSERT INTO `status_kegiatan` (`id_status_kegiatan`, `nama_status_kegiatan`, `created_at`, `updated_at`) VALUES
(1, 'Open', NULL, NULL),
(2, 'Close', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sub_kategori_kegiatan`
--

CREATE TABLE `sub_kategori_kegiatan` (
  `id_sub_kategori_kegiatan` int(10) UNSIGNED NOT NULL,
  `id_kategori_kegiatan` int(11) NOT NULL,
  `nama_sub_kategori_kegiatan` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_kategori_kegiatan`
--

INSERT INTO `sub_kategori_kegiatan` (`id_sub_kategori_kegiatan`, `id_kategori_kegiatan`, `nama_sub_kategori_kegiatan`, `created_at`, `updated_at`) VALUES
(1, 1, 'Desember Events', '2023-11-24 09:22:16', '2023-12-11 08:27:49');

-- --------------------------------------------------------

--
-- Table structure for table `team`
--

CREATE TABLE `team` (
  `id_team` int(10) UNSIGNED NOT NULL,
  `nama_team` varchar(255) NOT NULL,
  `jabatan_team` varchar(255) NOT NULL,
  `foto_team` varchar(255) NOT NULL,
  `facebook_team` varchar(255) NOT NULL,
  `instagram_team` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `unit_bisnis`
--

CREATE TABLE `unit_bisnis` (
  `id_unit_bisnis` int(10) UNSIGNED NOT NULL,
  `nama_unit_bisnis` varchar(255) NOT NULL,
  `deskripsi_unit_bisnis` varchar(255) NOT NULL,
  `logo_unit_bisnis` varchar(255) NOT NULL,
  `url_unit_bisnis` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `two_factor_secret` text DEFAULT NULL,
  `two_factor_recovery_codes` text DEFAULT NULL,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@gmail.com', NULL, '$2y$10$GE5gyuOs5yMOBD89dxPZqeR/gpfkkG6xYku8qx3OzdjdtrD.eL5Im', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `visi`
--

CREATE TABLE `visi` (
  `id_visi` int(10) UNSIGNED NOT NULL,
  `judul_visi` varchar(255) NOT NULL,
  `deskripsi_visi` text NOT NULL,
  `gambar_visi` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id_berita`);

--
-- Indexes for table `daftar_kegiatans`
--
ALTER TABLE `daftar_kegiatans`
  ADD PRIMARY KEY (`id_daftar_kegiatan`);

--
-- Indexes for table `diskon`
--
ALTER TABLE `diskon`
  ADD PRIMARY KEY (`id_diskon`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `galeri`
--
ALTER TABLE `galeri`
  ADD PRIMARY KEY (`id_galeri`);

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`id_guru`);

--
-- Indexes for table `iventaris`
--
ALTER TABLE `iventaris`
  ADD PRIMARY KEY (`id_iventaris`);

--
-- Indexes for table `kategori_kegiatan`
--
ALTER TABLE `kategori_kegiatan`
  ADD PRIMARY KEY (`id_kategori_kegiatan`);

--
-- Indexes for table `kegiatan`
--
ALTER TABLE `kegiatan`
  ADD PRIMARY KEY (`id_kegiatan`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indexes for table `konsentrasi`
--
ALTER TABLE `konsentrasi`
  ADD PRIMARY KEY (`id_konsentrasi`);

--
-- Indexes for table `layanan`
--
ALTER TABLE `layanan`
  ADD PRIMARY KEY (`id_layanan`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `partner`
--
ALTER TABLE `partner`
  ADD PRIMARY KEY (`id_partner`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `program`
--
ALTER TABLE `program`
  ADD PRIMARY KEY (`id_program`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`id_project`);

--
-- Indexes for table `publish_kegiatan`
--
ALTER TABLE `publish_kegiatan`
  ADD PRIMARY KEY (`id_publish_kegiatan`);

--
-- Indexes for table `rekening`
--
ALTER TABLE `rekening`
  ADD PRIMARY KEY (`id_rekening`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`id_setting`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id_siswa`);

--
-- Indexes for table `status_kegiatan`
--
ALTER TABLE `status_kegiatan`
  ADD PRIMARY KEY (`id_status_kegiatan`);

--
-- Indexes for table `sub_kategori_kegiatan`
--
ALTER TABLE `sub_kategori_kegiatan`
  ADD PRIMARY KEY (`id_sub_kategori_kegiatan`);

--
-- Indexes for table `team`
--
ALTER TABLE `team`
  ADD PRIMARY KEY (`id_team`);

--
-- Indexes for table `unit_bisnis`
--
ALTER TABLE `unit_bisnis`
  ADD PRIMARY KEY (`id_unit_bisnis`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `visi`
--
ALTER TABLE `visi`
  ADD PRIMARY KEY (`id_visi`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `berita`
--
ALTER TABLE `berita`
  MODIFY `id_berita` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `daftar_kegiatans`
--
ALTER TABLE `daftar_kegiatans`
  MODIFY `id_daftar_kegiatan` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `diskon`
--
ALTER TABLE `diskon`
  MODIFY `id_diskon` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `galeri`
--
ALTER TABLE `galeri`
  MODIFY `id_galeri` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `guru`
--
ALTER TABLE `guru`
  MODIFY `id_guru` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `iventaris`
--
ALTER TABLE `iventaris`
  MODIFY `id_iventaris` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `kategori_kegiatan`
--
ALTER TABLE `kategori_kegiatan`
  MODIFY `id_kategori_kegiatan` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `kegiatan`
--
ALTER TABLE `kegiatan`
  MODIFY `id_kegiatan` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `konsentrasi`
--
ALTER TABLE `konsentrasi`
  MODIFY `id_konsentrasi` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `layanan`
--
ALTER TABLE `layanan`
  MODIFY `id_layanan` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `partner`
--
ALTER TABLE `partner`
  MODIFY `id_partner` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `program`
--
ALTER TABLE `program`
  MODIFY `id_program` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `id_project` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `publish_kegiatan`
--
ALTER TABLE `publish_kegiatan`
  MODIFY `id_publish_kegiatan` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `rekening`
--
ALTER TABLE `rekening`
  MODIFY `id_rekening` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `setting`
--
ALTER TABLE `setting`
  MODIFY `id_setting` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id_siswa` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `status_kegiatan`
--
ALTER TABLE `status_kegiatan`
  MODIFY `id_status_kegiatan` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sub_kategori_kegiatan`
--
ALTER TABLE `sub_kategori_kegiatan`
  MODIFY `id_sub_kategori_kegiatan` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `team`
--
ALTER TABLE `team`
  MODIFY `id_team` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `unit_bisnis`
--
ALTER TABLE `unit_bisnis`
  MODIFY `id_unit_bisnis` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `visi`
--
ALTER TABLE `visi`
  MODIFY `id_visi` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
