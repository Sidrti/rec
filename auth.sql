-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 02, 2020 at 07:16 AM
-- Server version: 10.4.16-MariaDB
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `auth`
--

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
(40, '2014_10_12_000000_create_users_table', 1),
(41, '2014_10_12_100000_create_password_resets_table', 1),
(42, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(43, '2019_08_19_000000_create_failed_jobs_table', 1),
(44, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(45, '2020_11_24_160539_create_sessions_table', 1),
(46, '2020_11_25_063127_create_user_details_table', 1),
(47, '2020_11_25_063247_add_pan_number_to_user_details_table', 1),
(48, '2020_11_25_085257_create_role_masters_table', 1),
(49, '2020_11_25_085914_add_role_name_to_role_masters_table', 1),
(50, '2020_11_25_090112_create_roles_table', 1),
(51, '2020_11_25_090222_add_user_roles_to_roles_table', 1),
(52, '2020_11_27_034641_tbl_api_masters', 1),
(53, '2020_11_27_034953_add_api_name_to_tbl_api_master', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `role_masters`
--

CREATE TABLE `role_masters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('4qm1hRUjugRZqKkvuAjJlQXNL87bEmSz04BJZKSg', 3, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:83.0) Gecko/20100101 Firefox/83.0', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiZWxzZHNhNkNQRHI5c1hoYmZEUDdiblA1UE1UT3BOVkNBa2ljcWU1dCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzY6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9BbW91bnRGaWx0ZXIvNCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjM7czoxNzoicGFzc3dvcmRfaGFzaF93ZWIiO3M6NjA6IiQyeSQxMCRTSFNEaS5TTXE2Zi5wbGRzbkhkSG4udTBKaHAyTFpUa0dQOWx1VzJNd1BNMjl2d215cnBDeSI7czoyMToicGFzc3dvcmRfaGFzaF9zYW5jdHVtIjtzOjYwOiIkMnkkMTAkU0hTRGkuU01xNmYucGxkc25IZEhuLnUwSmhwMkxaVGtHUDlsdVcyTXdQTTI5dndteXJwQ3kiO30=', 1606858444),
('mYRGNTdjMffoczYTAOTM5IH8nAGmv15pBPoqmN0l', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:83.0) Gecko/20100101 Firefox/83.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiaEdjeXZ1cVRQRUlDRkJjSUFXT0UxemFBbjh0bUZ5M0UyM0p4aWE4cyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9BcGlJbmZvLzMiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1606857092);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_amount_filters`
--

CREATE TABLE `tbl_amount_filters` (
  `Id` int(11) NOT NULL,
  `api_id` int(11) NOT NULL,
  `operator_id` int(11) NOT NULL,
  `Amount` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_amount_filters`
--

INSERT INTO `tbl_amount_filters` (`Id`, `api_id`, `operator_id`, `Amount`, `created_at`, `updated_at`) VALUES
(1, 4, 1, '16', '2020-12-01 20:13:56', '2020-12-01 19:33:11'),
(2, 3, 2, '22', '2020-12-01 20:14:10', '2020-12-01 20:14:10');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_api_codes`
--

CREATE TABLE `tbl_api_codes` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `api_id` int(11) NOT NULL,
  `api_code` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_api_codes`
--

INSERT INTO `tbl_api_codes` (`id`, `category_id`, `api_id`, `api_code`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 4, 'DA', 1, '2020-11-28 20:18:57', '2020-11-28 20:18:57'),
(2, 2, 5, 'NA', 0, '2020-11-30 19:47:24', '2020-11-30 19:47:24'),
(3, 3, 3, 'SA', 1, '2020-11-30 19:47:37', '2020-12-01 21:17:57');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_api_masters`
--

CREATE TABLE `tbl_api_masters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `api_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_api_masters`
--

INSERT INTO `tbl_api_masters` (`id`, `created_at`, `updated_at`, `api_name`, `url`) VALUES
(3, '2020-11-28 07:51:03', '2020-11-28 07:51:03', 'BSNL', 'api/BSNL'),
(4, '2020-11-28 07:51:40', '2020-11-28 07:51:40', 'BSNL', 'api/BSNL'),
(5, '2020-11-28 07:52:01', '2020-11-28 07:52:01', 'BSNL', 'api/BSNL'),
(7, '2020-11-28 07:53:51', '2020-11-28 07:53:51', 'BSNL', 'api/BSNL'),
(8, '2020-12-01 15:09:52', '2020-12-01 15:09:52', 'Another API', 'http://test.com/web-services/httpapi/recharge-request?acc_no=ACC12501&api_key=1d4f8a72-83e8-4bfc-b869-f2e3da9bc5d8&opr_code={code}&rech_num');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_my_operators`
--

CREATE TABLE `tbl_my_operators` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `operator` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `api_1` int(11) DEFAULT NULL,
  `api_2` int(11) DEFAULT NULL,
  `api_3` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_my_operators`
--

INSERT INTO `tbl_my_operators` (`id`, `category_id`, `operator`, `code`, `status`, `api_1`, `api_2`, `api_3`, `created_at`, `updated_at`) VALUES
(1, 1, 'Airtel', 'AT', 1, NULL, NULL, NULL, '2020-11-30 23:51:26', '2020-12-01 20:25:46'),
(2, 2, 'DOCOMO', 'DO', 1, NULL, NULL, NULL, '2020-12-01 16:58:41', '2020-12-01 20:29:31'),
(3, 2, 'DOCOMO', 'DO', 1, NULL, NULL, NULL, '2020-12-01 16:59:02', '2020-12-01 20:32:20');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_recharge_categories`
--

CREATE TABLE `tbl_recharge_categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_recharge_categories`
--

INSERT INTO `tbl_recharge_categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Prepaid Mobile', '2020-11-26 09:04:21', '2020-11-26 09:04:21'),
(2, 'Postpaid Mobile', '2020-11-26 09:04:21', '2020-11-26 09:04:21'),
(3, 'DTH', '2020-11-26 09:04:40', '2020-11-26 09:04:40'),
(4, 'Electricity', '2020-11-26 09:04:40', '2020-11-26 09:04:40');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
(1, 'Siddhant Singh', 'siddhant.singh326@gmail.com', NULL, '$2y$10$uKHYuM1FJZdHnIERbTeTeeSO015/AQgJRSTAilVVdHGq5NtevhNi6', 'eyJpdiI6ImdIMlpzZi9wTFdpZ2ZhR0tZNXpoVGc9PSIsInZhbHVlIjoiTEpRVUUrY05mT0U3dncvTlJOYVN3ZE9JNitKcjFRWnFrVWJzNncxOEtKdz0iLCJtYWMiOiIzMzIyOGQwZmQwM2VkNDM1OTE0ZDM2MTM2NDNkZTc0MjI3YzljNDc0ZTlmNGRkNjBmZDczNTQxODRkNTE3NTFhIn0=', 'eyJpdiI6IkNZQzA3SzU1T3RGTXZJU3ppbXBNYmc9PSIsInZhbHVlIjoiZGdhdVVhWjQzRkVZMVR2ZHN3SjB5bVZxdUlNUDBsUEwzbmNTQTRuelZLbFAzL1R5cnVqcXRIQkE5a25aSUlyMGo2L04xRnJVZzFzd04vOERXMTVJdmFsMFdSNTU4NDRuWm5DWTNsTlNhai96OGI0Z1dVMkQza0xjckpDbmZqR1RDVHpLVUdicTgyTXhtVmkveE9semVGV1Y0eVdrMjU2NU5HOVlONm92VklvTWdFbzJ3bDdVNVJleDBuZHBkTWhNS0FvU2JYRWNiYXY3N1liYk1FS0tJMDJrdzg1T2ZNaVRsS2k0WHVyY3NseHpuRE03SS8zdEZKUWlUOFFUSWJHRm16YnN6cVRsaGRCTUsxcDhlUkdhaFE9PSIsIm1hYyI6IjFlMzlkZTY4OTExNWRkMzE1ZDI4NDNlYjQ2NmMxN2ExMTZhMzhkNmUyY2M1ZGQ5M2E4NWQ4MGYxNjUyNTEzMGIifQ==', NULL, NULL, NULL, '2020-11-26 22:43:13', '2020-11-30 09:57:21'),
(2, 'SIddhant', 'pallavbansal2@gmail.com', NULL, '$2y$10$spVGo6tRJG.vkd8Gi8RVhuypfhOuLzDcXLpAtUqxInVHmzdU99xkG', NULL, NULL, NULL, NULL, NULL, '2020-12-01 03:48:23', '2020-12-01 03:48:23'),
(3, 'Chirag', 'cdeol48@gmail.com', NULL, '$2y$10$SHSDi.SMq6f.pldsnHdHn.u0Jhp2LZTkGP9luW2MwPM29vwmyrpCy', NULL, NULL, NULL, NULL, NULL, '2020-12-01 08:14:23', '2020-12-01 08:14:23');

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE `user_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `pan_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gst_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pincode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`id`, `created_at`, `updated_at`, `pan_number`, `gst_number`, `address`, `city`, `pincode`, `user_id`) VALUES
(1, '2020-11-26 22:43:13', '2020-11-26 22:43:13', '789678787', '77979798797', 'Noida', 'mOIDA', '768687', 1),
(2, '2020-12-01 03:48:23', '2020-12-01 03:48:23', '4324244', '342445', 'Noida', 'Noida', '3209203', 2),
(3, '2020-12-01 08:14:23', '2020-12-01 08:14:23', '378829878', '97492949202', 'Noida', 'Noida', '244001', 3);

--
-- Indexes for dumped tables
--

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
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

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
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_masters`
--
ALTER TABLE `role_masters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `tbl_amount_filters`
--
ALTER TABLE `tbl_amount_filters`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `tbl_api_codes`
--
ALTER TABLE `tbl_api_codes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_api_masters`
--
ALTER TABLE `tbl_api_masters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_my_operators`
--
ALTER TABLE `tbl_my_operators`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_recharge_categories`
--
ALTER TABLE `tbl_recharge_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_details`
--
ALTER TABLE `user_details`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `role_masters`
--
ALTER TABLE `role_masters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_amount_filters`
--
ALTER TABLE `tbl_amount_filters`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_api_codes`
--
ALTER TABLE `tbl_api_codes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_api_masters`
--
ALTER TABLE `tbl_api_masters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_my_operators`
--
ALTER TABLE `tbl_my_operators`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_recharge_categories`
--
ALTER TABLE `tbl_recharge_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_details`
--
ALTER TABLE `user_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
