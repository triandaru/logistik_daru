-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 20, 2024 at 07:58 PM
-- Server version: 8.0.30
-- PHP Version: 8.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_logistik_daru`
--

-- --------------------------------------------------------

--
-- Table structure for table `barangs`
--

CREATE TABLE `barangs` (
  `kode_barang` bigint UNSIGNED NOT NULL,
  `nama_barang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stok` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `barangs`
--

INSERT INTO `barangs` (`kode_barang`, `nama_barang`, `stok`, `created_at`, `updated_at`) VALUES
(1, 'Siomay Kuncup Besar', 78, '2024-12-20 10:43:20', '2024-12-20 10:43:20'),
(2, 'Pilus Cikur Sari Rasa', 99, '2024-12-20 10:43:20', '2024-12-20 10:43:20'),
(3, 'Basreng Original', 49, '2024-12-20 10:43:20', '2024-12-20 10:43:20'),
(4, 'Batagor Kotak', 88, '2024-12-20 10:43:20', '2024-12-20 10:43:20'),
(5, 'barang', 123, '2024-12-20 11:18:11', '2024-12-20 11:18:11');

-- --------------------------------------------------------

--
-- Table structure for table `barang_keluars`
--

CREATE TABLE `barang_keluars` (
  `no_barang_keluar` bigint UNSIGNED NOT NULL,
  `kode_barang` bigint UNSIGNED NOT NULL,
  `qty` int NOT NULL,
  `destination` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_keluar` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `barang_keluars`
--

INSERT INTO `barang_keluars` (`no_barang_keluar`, `kode_barang`, `qty`, `destination`, `tgl_keluar`, `created_at`, `updated_at`) VALUES
(1, 4, 46, 'Malang', '2024-08-22', '2024-12-20 10:43:21', '2024-12-20 10:43:21'),
(2, 4, 18, 'Makassar', '2024-01-31', '2024-12-20 10:43:21', '2024-12-20 10:43:21'),
(3, 2, 41, 'Makassar', '2024-08-21', '2024-12-20 10:43:21', '2024-12-20 10:43:21'),
(4, 3, 5, 'Jakarta', '2024-06-09', '2024-12-20 10:43:21', '2024-12-20 10:43:21'),
(5, 2, 45, 'Bandung', '2024-08-11', '2024-12-20 10:43:21', '2024-12-20 10:43:21'),
(6, 4, 29, 'Semarang', '2024-01-22', '2024-12-20 10:43:21', '2024-12-20 10:43:21'),
(7, 4, 15, 'Medan', '2024-05-12', '2024-12-20 10:43:21', '2024-12-20 10:43:21'),
(8, 3, 28, 'Semarang', '2024-11-25', '2024-12-20 10:43:21', '2024-12-20 10:43:21'),
(9, 1, 42, 'Depok', '2024-10-17', '2024-12-20 10:43:21', '2024-12-20 10:43:21'),
(10, 2, 21, 'Malang', '2024-10-19', '2024-12-20 10:43:21', '2024-12-20 10:43:21'),
(11, 1, 41, 'Depok', '2024-05-25', '2024-12-20 10:43:21', '2024-12-20 10:43:21'),
(12, 3, 8, 'Yogyakarta', '2024-03-30', '2024-12-20 10:43:21', '2024-12-20 10:43:21'),
(13, 2, 29, 'Pekanbaru', '2024-05-20', '2024-12-20 10:43:21', '2024-12-20 10:43:21'),
(14, 2, 35, 'Banjarmasin', '2023-12-27', '2024-12-20 10:43:21', '2024-12-20 10:43:21'),
(15, 2, 37, 'Depok', '2024-08-27', '2024-12-20 10:43:21', '2024-12-20 10:43:21'),
(16, 2, 2, 'Yogyakarta', '2024-12-07', '2024-12-20 10:43:21', '2024-12-20 10:43:21'),
(17, 3, 42, 'Palembang', '2024-10-21', '2024-12-20 10:43:21', '2024-12-20 10:43:21'),
(18, 4, 18, 'Depok', '2024-11-08', '2024-12-20 10:43:21', '2024-12-20 10:43:21'),
(19, 1, 10, 'Bekasi', '2024-08-06', '2024-12-20 10:43:21', '2024-12-20 10:43:21'),
(20, 4, 5, 'Banjarmasin', '2024-03-05', '2024-12-20 10:43:21', '2024-12-20 10:43:21');

-- --------------------------------------------------------

--
-- Table structure for table `barang_masuks`
--

CREATE TABLE `barang_masuks` (
  `no_barang_masuk` bigint UNSIGNED NOT NULL,
  `kode_barang` bigint UNSIGNED NOT NULL,
  `qty` int NOT NULL,
  `origin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_masuk` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `barang_masuks`
--

INSERT INTO `barang_masuks` (`no_barang_masuk`, `kode_barang`, `qty`, `origin`, `tgl_masuk`, `created_at`, `updated_at`) VALUES
(1, 4, 31, 'Jakarta', '2024-03-19', '2024-12-20 10:43:21', '2024-12-20 10:43:21'),
(2, 4, 25, 'Jakarta', '2024-02-13', '2024-12-20 10:43:21', '2024-12-20 10:43:21'),
(3, 4, 21, 'Tangerang', '2024-02-06', '2024-12-20 10:43:21', '2024-12-20 10:43:21'),
(4, 4, 20, 'Depok', '2024-09-04', '2024-12-20 10:43:21', '2024-12-20 10:43:21'),
(5, 3, 47, 'Makassar', '2024-05-06', '2024-12-20 10:43:21', '2024-12-20 10:43:21'),
(6, 4, 8, 'Pekanbaru', '2024-08-05', '2024-12-20 10:43:21', '2024-12-20 10:43:21'),
(7, 3, 38, 'Medan', '2024-08-13', '2024-12-20 10:43:21', '2024-12-20 10:43:21'),
(8, 3, 41, 'Medan', '2024-09-13', '2024-12-20 10:43:21', '2024-12-20 10:43:21'),
(9, 1, 45, 'Palembang', '2024-07-13', '2024-12-20 10:43:21', '2024-12-20 10:43:21'),
(10, 3, 43, 'Banjarmasin', '2024-09-26', '2024-12-20 10:43:21', '2024-12-20 10:43:21'),
(11, 4, 48, 'Palembang', '2024-10-20', '2024-12-20 10:43:21', '2024-12-20 10:43:21'),
(12, 2, 43, 'Palembang', '2024-11-21', '2024-12-20 10:43:21', '2024-12-20 10:43:21'),
(13, 4, 4, 'Surabaya', '2024-09-22', '2024-12-20 10:43:21', '2024-12-20 10:43:21'),
(14, 3, 19, 'Banjarmasin', '2024-10-21', '2024-12-20 10:43:21', '2024-12-20 10:43:21'),
(15, 1, 40, 'Malang', '2024-07-28', '2024-12-20 10:43:21', '2024-12-20 10:43:21'),
(16, 2, 17, 'Semarang', '2024-05-03', '2024-12-20 10:43:21', '2024-12-20 10:43:21'),
(17, 1, 48, 'Yogyakarta', '2024-04-24', '2024-12-20 10:43:21', '2024-12-20 10:43:21'),
(18, 3, 6, 'Medan', '2024-12-09', '2024-12-20 10:43:21', '2024-12-20 10:43:21'),
(19, 2, 29, 'Makassar', '2024-07-22', '2024-12-20 10:43:21', '2024-12-20 10:43:21'),
(20, 2, 41, 'Batam', '2024-07-25', '2024-12-20 10:43:21', '2024-12-20 10:43:21');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(2, '2019_08_19_000000_create_failed_jobs_table', 1),
(3, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(4, '2024_10_11_000000_create_roles_table', 1),
(5, '2024_10_12_000000_create_users_table', 1),
(6, '2024_12_19_071032_create_barangs_table', 1),
(7, '2024_12_19_071116_create_barang_masuks_table', 1),
(8, '2024_12_19_071124_create_barang_keluars_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id_role` bigint UNSIGNED NOT NULL,
  `nama_role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id_role`, `nama_role`, `created_at`, `updated_at`) VALUES
(1, 'Admin', '2024-12-20 10:43:21', '2024-12-20 10:43:21'),
(2, 'User', '2024-12-20 10:43:21', '2024-12-20 10:43:21');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` bigint UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `nama`, `email`, `password`, `role`, `created_at`, `updated_at`) VALUES
(1, 'Triandaru Anugrah', 'admin@example.com', '$2y$12$wIK1DMRqS/QTeV7/b771lu9qnNOxqFCLT6wVtnLfp8l1rFduRtgbC', 1, '2024-12-20 10:43:21', '2024-12-20 10:43:21'),
(2, 'User Unknown', 'user@example.com', '$2y$12$3yRg0dpHXolATbZwLs5vt.27zs/dJg3m6J2MRj366we.WGZ.j/HcW', 2, '2024-12-20 10:43:22', '2024-12-20 10:43:22');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barangs`
--
ALTER TABLE `barangs`
  ADD PRIMARY KEY (`kode_barang`);

--
-- Indexes for table `barang_keluars`
--
ALTER TABLE `barang_keluars`
  ADD PRIMARY KEY (`no_barang_keluar`),
  ADD KEY `barang_keluars_kode_barang_foreign` (`kode_barang`);

--
-- Indexes for table `barang_masuks`
--
ALTER TABLE `barang_masuks`
  ADD PRIMARY KEY (`no_barang_masuk`),
  ADD KEY `barang_masuks_kode_barang_foreign` (`kode_barang`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id_role`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_role_foreign` (`role`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barangs`
--
ALTER TABLE `barangs`
  MODIFY `kode_barang` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `barang_keluars`
--
ALTER TABLE `barang_keluars`
  MODIFY `no_barang_keluar` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `barang_masuks`
--
ALTER TABLE `barang_masuks`
  MODIFY `no_barang_masuk` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id_role` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `barang_keluars`
--
ALTER TABLE `barang_keluars`
  ADD CONSTRAINT `barang_keluars_kode_barang_foreign` FOREIGN KEY (`kode_barang`) REFERENCES `barangs` (`kode_barang`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `barang_masuks`
--
ALTER TABLE `barang_masuks`
  ADD CONSTRAINT `barang_masuks_kode_barang_foreign` FOREIGN KEY (`kode_barang`) REFERENCES `barangs` (`kode_barang`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_foreign` FOREIGN KEY (`role`) REFERENCES `roles` (`id_role`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
