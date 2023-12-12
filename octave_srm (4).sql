-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 11, 2023 at 07:07 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `octave_srm`
--

-- --------------------------------------------------------

--
-- Table structure for table `assets`
--

CREATE TABLE `assets` (
  `asset_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `a_department` enum('IT','HR','Logistic','Engineering','RnD','FA','Sales','BD','PPIC') COLLATE utf8mb4_unicode_ci NOT NULL,
  `asset_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `asset_desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `SR_confidentiality` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `SR_integrity` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `SR_availability` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `most_important_SR` enum('Confidentiality','Integrity','Availability') COLLATE utf8mb4_unicode_ci NOT NULL,
  `rationale_for_select` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `map_human`
--

CREATE TABLE `map_human` (
  `mh_id` bigint(20) UNSIGNED NOT NULL,
  `asset_id` bigint(20) UNSIGNED NOT NULL,
  `h_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `mh_owner` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `h_location` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `map_physical`
--

CREATE TABLE `map_physical` (
  `mp_id` bigint(20) UNSIGNED NOT NULL,
  `asset_id` bigint(20) UNSIGNED NOT NULL,
  `p_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `mp_owner` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `p_location` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `map_technical`
--

CREATE TABLE `map_technical` (
  `mt_id` bigint(20) UNSIGNED NOT NULL,
  `asset_id` bigint(20) UNSIGNED NOT NULL,
  `t_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `mt_owner` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `t_location` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '1_create_users', 1),
(2, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(3, '2_create_assets', 1),
(4, '3_create_risk_identification_table', 1),
(5, 'create_failed_jobs_table', 1),
(6, 'create_map_human_table', 1),
(7, 'create_map_physical_table', 1),
(8, 'create_map_technical_table', 1),
(9, 'create_password_password_reset_tokens_table', 1),
(10, 'create_priority', 1),
(11, 'create_severity_table', 1);

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
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `priority`
--

CREATE TABLE `priority` (
  `asset_id` bigint(20) UNSIGNED NOT NULL,
  `trust` enum('1','2','3','4','5') COLLATE utf8mb4_unicode_ci NOT NULL,
  `finance` enum('1','2','3','4','5') COLLATE utf8mb4_unicode_ci NOT NULL,
  `productivity` enum('1','2','3','4','5') COLLATE utf8mb4_unicode_ci NOT NULL,
  `safety` enum('1','2','3','4','5') COLLATE utf8mb4_unicode_ci NOT NULL,
  `fines` enum('1','2','3','4','5') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `risk_identification`
--

CREATE TABLE `risk_identification` (
  `AoC_id` bigint(20) UNSIGNED NOT NULL,
  `asset_id` bigint(20) UNSIGNED NOT NULL,
  `area_of_concern` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `actor` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `objective` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `motive` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `result` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `security_needs` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `probability` enum('high','medium','low') COLLATE utf8mb4_unicode_ci NOT NULL,
  `consequences` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `control` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `severity`
--

CREATE TABLE `severity` (
  `AoC_id` bigint(20) UNSIGNED NOT NULL,
  `financial_value` enum('high','medium','low') COLLATE utf8mb4_unicode_ci NOT NULL,
  `productivity_value` enum('high','medium','low') COLLATE utf8mb4_unicode_ci NOT NULL,
  `rep_value` enum('high','medium','low') COLLATE utf8mb4_unicode_ci NOT NULL,
  `safety_value` enum('high','medium','low') COLLATE utf8mb4_unicode_ci NOT NULL,
  `fines_value` enum('high','medium','low') COLLATE utf8mb4_unicode_ci NOT NULL,
  `financial_score` enum('1','2','3','4','5','6','7','8','9','10') COLLATE utf8mb4_unicode_ci NOT NULL,
  `productivity_score` enum('1','2','3','4','5','6','7','8','9','10') COLLATE utf8mb4_unicode_ci NOT NULL,
  `rep_score` enum('1','2','3','4','5','6','7','8','9','10') COLLATE utf8mb4_unicode_ci NOT NULL,
  `safety_score` enum('1','2','3','4','5','6','7','8','9','10') COLLATE utf8mb4_unicode_ci NOT NULL,
  `fines_score` enum('1','2','3','4','5','6','7','8','9','10') COLLATE utf8mb4_unicode_ci NOT NULL,
  `rr_score` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `department` enum('IT','HR','Logistic','Engineering','RnD','FA','Sales','BD','PPIC') COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `email`, `email_verified_at`, `password`, `department`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Administrator', 'admin@mail.com', NULL, '$2y$12$eKz/F5M7S8/xZoVO6s1E5ekVCM4GGPBxy7JWA6AJV8LHqQ8ZoLNzK', 'IT', NULL, '2023-12-10 23:07:10', '2023-12-10 23:07:10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assets`
--
ALTER TABLE `assets`
  ADD PRIMARY KEY (`asset_id`),
  ADD KEY `assets_user_id_foreign` (`user_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `map_human`
--
ALTER TABLE `map_human`
  ADD PRIMARY KEY (`mh_id`),
  ADD KEY `map_human_asset_id_foreign` (`asset_id`);

--
-- Indexes for table `map_physical`
--
ALTER TABLE `map_physical`
  ADD PRIMARY KEY (`mp_id`),
  ADD KEY `map_physical_asset_id_foreign` (`asset_id`);

--
-- Indexes for table `map_technical`
--
ALTER TABLE `map_technical`
  ADD PRIMARY KEY (`mt_id`),
  ADD KEY `map_technical_asset_id_foreign` (`asset_id`);

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
-- Indexes for table `priority`
--
ALTER TABLE `priority`
  ADD PRIMARY KEY (`asset_id`);

--
-- Indexes for table `risk_identification`
--
ALTER TABLE `risk_identification`
  ADD PRIMARY KEY (`AoC_id`),
  ADD KEY `risk_identification_asset_id_foreign` (`asset_id`);

--
-- Indexes for table `severity`
--
ALTER TABLE `severity`
  ADD PRIMARY KEY (`AoC_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assets`
--
ALTER TABLE `assets`
  MODIFY `asset_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `map_human`
--
ALTER TABLE `map_human`
  MODIFY `mh_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `map_physical`
--
ALTER TABLE `map_physical`
  MODIFY `mp_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `map_technical`
--
ALTER TABLE `map_technical`
  MODIFY `mt_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `risk_identification`
--
ALTER TABLE `risk_identification`
  MODIFY `AoC_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `assets`
--
ALTER TABLE `assets`
  ADD CONSTRAINT `assets_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `map_human`
--
ALTER TABLE `map_human`
  ADD CONSTRAINT `map_human_asset_id_foreign` FOREIGN KEY (`asset_id`) REFERENCES `assets` (`asset_id`);

--
-- Constraints for table `map_physical`
--
ALTER TABLE `map_physical`
  ADD CONSTRAINT `map_physical_asset_id_foreign` FOREIGN KEY (`asset_id`) REFERENCES `assets` (`asset_id`);

--
-- Constraints for table `map_technical`
--
ALTER TABLE `map_technical`
  ADD CONSTRAINT `map_technical_asset_id_foreign` FOREIGN KEY (`asset_id`) REFERENCES `assets` (`asset_id`);

--
-- Constraints for table `priority`
--
ALTER TABLE `priority`
  ADD CONSTRAINT `FK_PK_asset_id-Priority` FOREIGN KEY (`asset_id`) REFERENCES `assets` (`asset_id`);

--
-- Constraints for table `risk_identification`
--
ALTER TABLE `risk_identification`
  ADD CONSTRAINT `risk_identification_asset_id_foreign` FOREIGN KEY (`asset_id`) REFERENCES `assets` (`asset_id`);

--
-- Constraints for table `severity`
--
ALTER TABLE `severity`
  ADD CONSTRAINT `severity_aoc_id_foreign` FOREIGN KEY (`AoC_id`) REFERENCES `risk_identification` (`AoC_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
