-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 25, 2024 at 12:45 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `puskesos`
--

-- --------------------------------------------------------

--
-- Table structure for table `berkas_pengajuans`
--

CREATE TABLE `berkas_pengajuans` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pengajuan_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `berkas` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `syarat_pengajuan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `berkas_pengajuans`
--

INSERT INTO `berkas_pengajuans` (`id`, `pengajuan_id`, `berkas`, `syarat_pengajuan`, `created_at`, `updated_at`) VALUES
('17111670862289', 'BPJSKIS240323001', '62820754ca2bc.jpg', 'ktp', '2024-03-22 21:11:26', '2024-03-22 21:11:26'),
('17111670862346', 'BPJSKIS240323001', 'download.jpeg', 'kk', '2024-03-22 21:11:26', '2024-03-22 21:11:26'),
('17112960688603', 'KIP240324001', '628.jpg', 'kartu_siswa', '2024-03-24 16:01:08', '2024-03-24 16:01:08'),
('17112960688666', 'KIP240324001', 'rug-1637739285363-0.jpeg.jpg', 'akta_kelahiran', '2024-03-24 16:01:08', '2024-03-24 16:01:08'),
('17112960688710', 'KIP240324001', 'Varchres-1.jpg', 'kk', '2024-03-24 16:01:08', '2024-03-24 16:01:08'),
('17112960688764', 'KIP240324001', '1.jpg', 'ijazah', '2024-03-24 16:01:08', '2024-03-24 16:01:08'),
('17113695735882', 'BOP240325001', 'Panggung-Keong.jpg', 'ktp', '2024-03-25 12:26:13', '2024-03-25 12:26:13'),
('17113695735934', 'BOP240325001', '1.jpg', 'kk', '2024-03-25 12:26:13', '2024-03-25 12:26:13'),
('17113695735973', 'BOP240325001', '68da954f-2a96-43a1-9176-8abae454cb51.jpg', 'surat_permohonan', '2024-03-25 12:26:13', '2024-03-25 12:26:13'),
('17113695736026', 'BOP240325001', '628.jpg', 'sktm', '2024-03-25 12:26:13', '2024-03-25 12:26:13'),
('17113695736147', 'BOP240325001', '628.jpg', 'foto_rumah', '2024-03-25 12:26:13', '2024-03-25 12:26:13'),
('17113695736195', 'BOP240325001', 'rug-1637739285363-0.jpeg.jpg', 'foto_pasien', '2024-03-25 12:26:13', '2024-03-25 12:26:13'),
('17113695736258', 'BOP240325001', '628.jpg', 'surat_keterangan_rawat_inap', '2024-03-25 12:26:13', '2024-03-25 12:26:13');

-- --------------------------------------------------------

--
-- Table structure for table `desa_kelurahans`
--

CREATE TABLE `desa_kelurahans` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kec_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_dk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `desa_kelurahans`
--

INSERT INTO `desa_kelurahans` (`id`, `kec_id`, `nama_dk`, `created_at`, `updated_at`) VALUES
('17066252749964', '25599378766161', 'Limpung', '2024-03-22 21:06:14', '2024-03-22 21:06:14'),
('17111667744832', '25599378766161', 'Amongrogo', '2024-03-22 21:06:14', '2024-03-22 21:06:14'),
('17111667744872', '25599378766161', 'Babadan', '2024-03-22 21:06:14', '2024-03-22 21:06:14'),
('17111667744893', '25599378766161', 'Dlisen', '2024-03-22 21:06:14', '2024-03-22 21:06:14'),
('17111667744913', '25599378766161', 'Donorejo', '2024-03-22 21:06:14', '2024-03-22 21:06:14'),
('17111667744934', '25599378766161', 'Kalisalak', '2024-03-22 21:06:14', '2024-03-22 21:06:14'),
('17111667744956', '25599378766161', 'Kepuh', '2024-03-22 21:06:14', '2024-03-22 21:06:14'),
('17111667745017', '25599378766211', 'Bandung', '2024-03-22 21:06:14', '2024-03-22 21:06:14'),
('17111667745039', '25599378766211', 'Gemuh', '2024-03-22 21:06:14', '2024-03-22 21:06:14'),
('17111667745060', '25599378766211', 'Gombong', '2024-03-22 21:06:14', '2024-03-22 21:06:14'),
('17111667745080', '25599378766211', 'Gumawang', '2024-03-22 21:06:14', '2024-03-22 21:06:14'),
('17111667745100', '25599378766211', 'Keniten', '2024-03-22 21:06:14', '2024-03-22 21:06:14'),
('17111667745141', '25599378766248', 'Bandar', '2024-03-22 21:06:14', '2024-03-22 21:06:14'),
('17111667745162', '25599378766248', 'Batiombo', '2024-03-22 21:06:14', '2024-03-22 21:06:14'),
('17111667745184', '25599378766248', 'Binangun', '2024-03-22 21:06:14', '2024-03-22 21:06:14');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_layanans`
--

CREATE TABLE `jenis_layanans` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_layanan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `syarat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'show',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jenis_layanans`
--

INSERT INTO `jenis_layanans` (`id`, `nama_layanan`, `slug`, `syarat`, `status`, `created_at`, `updated_at`) VALUES
('42779169361688', 'BPJS/KIS', 'BPJSKIS', '{\"ktp\":\"FC KTP\\/Identitas\",\"kk\":\"FC KK\",\"sktm\":\"Surat SKTM\",\"surat_sptjm_materai\":\"Surat SPTJM Kades\\/Lurah Materai 10.000\",\"foto_rumah\":\"Foto rumah (atap, lantai, dinding)\",\"surat_keterangan_sakit\":\"Surat keterangan sakit dari faskes\"}', 'show', '2024-03-22 21:06:14', '2024-03-22 21:06:14'),
('42779169361766', 'Bantuan Operasional Perawatan', 'BOP', '{\"ktp\":\"FC KK\",\"kk\":\"FC KTP\",\"surat_permohonan\":\"Surat permohonan bantuan operasional perawatan dari desa\\/kelurahan ditujukan kepada bupati batang Cq. Kepala dinas sosial kab. Batang\",\"sktm\":\"SKTM dari desa\\/kelurahan\",\"foto_rumah\":\"Foto rumah\",\"foto_pasien\":\"Foto orang sakit\",\"surat_keterangan_rawat_inap\":\"Surat keterangan rawat inap dari rumah sakit (kelas III)\"}', 'show', '2024-03-22 21:06:14', '2024-03-22 21:06:14'),
('42779169361812', 'KIP', 'KIP', '{\"kartu_siswa\":\"FC Kartu siswa\",\"akta_kelahiran\":\"FC Akta kelahiran\",\"kk\":\"FC KK\",\"ijazah\":\"Ijazah terakhir\"}', 'show', '2024-03-22 21:06:14', '2024-03-22 21:06:14'),
('42779169361865', 'Yatim Piatu', 'YP', '{\"ktp\":\"FC KTP \\/ KIA\",\"kk\":\"FC KK\",\"foto_rumah\":\"Foto Rumah\"}', 'show', '2024-03-22 21:06:14', '2024-03-22 21:06:14');

-- --------------------------------------------------------

--
-- Table structure for table `kecamatans`
--

CREATE TABLE `kecamatans` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_kecamatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kecamatans`
--

INSERT INTO `kecamatans` (`id`, `nama_kecamatan`, `created_at`, `updated_at`) VALUES
('0463ed3a-612f-470f-b7ee-b204d6e78692', 'tes', '2024-03-25 12:14:49', '2024-03-25 12:14:49'),
('25599378766161', 'Limpung', '2024-03-22 21:06:14', '2024-03-22 21:06:14'),
('25599378766211', 'Pecalungan', '2024-03-22 21:06:14', '2024-03-22 21:06:14'),
('25599378766248', 'Bandar', '2024-03-22 21:06:14', '2024-03-22 21:06:14'),
('25667501617808', 'Banyuputih', '2024-03-22 21:06:14', '2024-03-22 21:06:14'),
('25667501617839', 'Batang', '2024-03-22 21:06:14', '2024-03-22 21:06:14'),
('25667501617866', 'Bawang', '2024-03-22 21:06:14', '2024-03-22 21:06:14'),
('25667501617900', 'Blado', '2024-03-22 21:06:14', '2024-03-22 21:06:14'),
('25667501617933', 'Gringsing', '2024-03-22 21:06:14', '2024-03-22 21:06:14'),
('25667501617966', 'Kandeman', '2024-03-22 21:06:14', '2024-03-22 21:06:14'),
('25667501617994', 'Reban', '2024-03-22 21:06:14', '2024-03-22 21:06:14'),
('25667501618022', 'Subah', '2024-03-22 21:06:14', '2024-03-22 21:06:14'),
('25667501618054', 'Tersono', '2024-03-22 21:06:14', '2024-03-22 21:06:14'),
('25667501618085', 'Tulis', '2024-03-22 21:06:14', '2024-03-22 21:06:14'),
('25667501618116', 'Warungasem', '2024-03-22 21:06:14', '2024-03-22 21:06:14'),
('25667501618149', 'Wonotunggal', '2024-03-22 21:06:14', '2024-03-22 21:06:14');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2024_03_19_140148_create_kecamatans_table', 1),
(3, '2024_03_19_140253_create_desa_kelurahans_table', 1),
(4, '2024_03_19_141639_create_jenis_layanans_table', 1),
(5, '2024_03_19_142458_create_penduduks_table', 1),
(6, '2024_03_20_145328_create_pengajuans_table', 1),
(7, '2024_03_21_141332_create_berkas_pengajuans_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `penduduks`
--

CREATE TABLE `penduduks` (
  `nik` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kec_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dk_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_kk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tempat_lahir` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_telepon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kelamin` enum('L','P') COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `penduduks`
--

INSERT INTO `penduduks` (`nik`, `user_id`, `kec_id`, `dk_id`, `no_kk`, `tempat_lahir`, `tanggal_lahir`, `nama`, `no_telepon`, `jenis_kelamin`, `alamat`, `created_at`, `updated_at`) VALUES
('335276412354', '17112959840202', '25599378766248', '17111667745162', '3367121423765', 'Batang kota', '2007-08-05', 'Doni', '08723452343', 'L', 'bandar batiombo', '2024-03-24 16:01:08', '2024-03-24 16:01:08'),
('336521736123', '17111667743532', '25599378766211', '17111667745060', '336521736123', 'pekalongan', '2009-12-09', 'hasan', '0823742345234', 'L', 'batang', '2024-03-25 12:26:13', '2024-03-25 12:26:13'),
('337548392345', '17111667743532', '25599378766161', '17111667744832', '33758327634', 'batang', '2000-05-07', 'ana saliwa', '08732645234', 'P', 'batang', '2024-03-22 21:11:26', '2024-03-22 21:11:26');

-- --------------------------------------------------------

--
-- Table structure for table `pengajuans`
--

CREATE TABLE `pengajuans` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `penduduk_nik` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jl_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_pelapor` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hubungan_pelapor` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Pengajuan',
  `keperluan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci,
  `tanggal` date NOT NULL,
  `berkas_dinas` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pengajuans`
--

INSERT INTO `pengajuans` (`id`, `user_id`, `penduduk_nik`, `jl_id`, `nama_pelapor`, `hubungan_pelapor`, `status`, `keperluan`, `keterangan`, `tanggal`, `berkas_dinas`, `created_at`, `updated_at`) VALUES
('BOP240325001', '17111667743532', '336521736123', '42779169361766', 'Ali', 'keluarga', 'Selesai', 'Bantuan BOP', NULL, '2024-03-25', 'Varchres-1.jpg', '2024-03-25 12:26:13', '2024-03-25 12:27:30'),
('BPJSKIS240323001', '17111667743532', '337548392345', '42779169361688', 'sari', 'keluarga', 'Pengajuan', 'tess', NULL, '2024-03-23', 'Panggung-Keong.jpg', '2024-03-22 21:11:26', '2024-03-25 12:30:18'),
('KIP240324001', '17112959840202', '335276412354', '42779169361812', 'lisa', 'keluarga', 'Proses', 'kip', NULL, '2024-03-24', '68da954f-2a96-43a1-9176-8abae454cb51.jpg', '2024-03-24 16:01:08', '2024-03-25 12:30:07');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `created_at`, `updated_at`) VALUES
('17111667742179', 'Admin Dinas', 'admin@mail.com', '$2y$10$tlNZU.2XBm75X6J6lH09EO6RE01ps9zSTXt4TE1xR9Z/L.oGXvBde', '1', '2024-03-22 21:06:14', '2024-03-23 20:54:25'),
('17111667743532', 'Test User', 'test@mail.com', '$2y$10$u.xKCo0y0G15hAWGxFRtvOnYMvdDsOkog352pA9FfVGD5b4OoKtfC', '2', '2024-03-22 21:06:14', '2024-03-22 21:06:14'),
('17112959840202', 'lisa', 'lisa@mail.com', '$2y$10$olXn8leceBI.UDAekBiwIeI9.b4mGRM/KzYjTviK546h30M3UAeuu', '2', '2024-03-24 15:59:44', '2024-03-24 15:59:44');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `berkas_pengajuans`
--
ALTER TABLE `berkas_pengajuans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `berkas_pengajuans_pengajuan_id_index` (`pengajuan_id`);

--
-- Indexes for table `desa_kelurahans`
--
ALTER TABLE `desa_kelurahans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `desa_kelurahans_kec_id_index` (`kec_id`);

--
-- Indexes for table `jenis_layanans`
--
ALTER TABLE `jenis_layanans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kecamatans`
--
ALTER TABLE `kecamatans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `penduduks`
--
ALTER TABLE `penduduks`
  ADD PRIMARY KEY (`nik`),
  ADD UNIQUE KEY `penduduks_no_kk_unique` (`no_kk`),
  ADD KEY `penduduks_user_id_index` (`user_id`),
  ADD KEY `penduduks_kec_id_index` (`kec_id`),
  ADD KEY `penduduks_dk_id_index` (`dk_id`);

--
-- Indexes for table `pengajuans`
--
ALTER TABLE `pengajuans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pengajuans_user_id_index` (`user_id`),
  ADD KEY `pengajuans_penduduk_nik_index` (`penduduk_nik`),
  ADD KEY `pengajuans_jl_id_index` (`jl_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `berkas_pengajuans`
--
ALTER TABLE `berkas_pengajuans`
  ADD CONSTRAINT `berkas_pengajuans_pengajuan_id_foreign` FOREIGN KEY (`pengajuan_id`) REFERENCES `pengajuans` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `desa_kelurahans`
--
ALTER TABLE `desa_kelurahans`
  ADD CONSTRAINT `desa_kelurahans_kec_id_foreign` FOREIGN KEY (`kec_id`) REFERENCES `kecamatans` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `penduduks`
--
ALTER TABLE `penduduks`
  ADD CONSTRAINT `penduduks_dk_id_foreign` FOREIGN KEY (`dk_id`) REFERENCES `desa_kelurahans` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `penduduks_kec_id_foreign` FOREIGN KEY (`kec_id`) REFERENCES `kecamatans` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `penduduks_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `pengajuans`
--
ALTER TABLE `pengajuans`
  ADD CONSTRAINT `pengajuans_jl_id_foreign` FOREIGN KEY (`jl_id`) REFERENCES `jenis_layanans` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `pengajuans_penduduk_nik_foreign` FOREIGN KEY (`penduduk_nik`) REFERENCES `penduduks` (`nik`) ON DELETE CASCADE,
  ADD CONSTRAINT `pengajuans_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
