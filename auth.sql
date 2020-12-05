-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 04, 2020 at 01:29 PM
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
-- Table structure for table `fail_switch_details`
--

CREATE TABLE `fail_switch_details` (
  `id` int(11) NOT NULL,
  `fail_switch_master_id` int(5) NOT NULL,
  `api_id` int(5) NOT NULL,
  `minutes` varchar(200) NOT NULL,
  `priority` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fail_switch_details`
--

INSERT INTO `fail_switch_details` (`id`, `fail_switch_master_id`, `api_id`, `minutes`, `priority`, `created_at`, `updated_at`) VALUES
(14, 13, 2, '1', '2', '2020-12-03 14:43:21', '2020-12-03 14:43:21'),
(26, 13, 4, '1', '1', '2020-12-04 02:47:44', '2020-12-04 02:47:44'),
(27, 17, 1, '1', '1', '2020-12-04 02:49:06', '2020-12-04 02:49:06'),
(28, 17, 2, '1', '2', '2020-12-04 02:49:07', '2020-12-04 02:49:07');

-- --------------------------------------------------------

--
-- Table structure for table `fail_switch_masters`
--

CREATE TABLE `fail_switch_masters` (
  `id` int(11) NOT NULL,
  `OperatorId` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fail_switch_masters`
--

INSERT INTO `fail_switch_masters` (`id`, `OperatorId`, `created_at`, `updated_at`) VALUES
(13, 1, '2020-12-03 14:43:21', '2020-12-03 14:43:21'),
(17, 3, '2020-12-04 02:49:06', '2020-12-04 02:49:06');

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
-- Table structure for table `package_lists`
--

CREATE TABLE `package_lists` (
  `id` int(11) NOT NULL,
  `package_id` int(6) NOT NULL,
  `operator_id` int(6) NOT NULL,
  `max` int(3) NOT NULL,
  `ded` int(3) NOT NULL,
  `ref` int(3) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `package_masters`
--

CREATE TABLE `package_masters` (
  `id` int(11) NOT NULL,
  `package_title` varchar(200) NOT NULL,
  `package_created_by` int(7) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `package_masters`
--

INSERT INTO `package_masters` (`id`, `package_title`, `package_created_by`, `created_at`, `updated_at`) VALUES
(1, 'Title', 2, '2020-12-04 01:54:26', '2020-12-04 01:54:26'),
(2, 'Akash Package', 2, '2020-12-04 02:04:10', '2020-12-04 02:04:10');

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

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `created_at`, `updated_at`, `role_id`, `user_id`) VALUES
(1, NULL, NULL, '1', '1'),
(2, NULL, NULL, '1', '2');

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

--
-- Dumping data for table `role_masters`
--

INSERT INTO `role_masters` (`id`, `created_at`, `updated_at`, `role_name`, `description`) VALUES
(1, NULL, NULL, 'Admin', NULL),
(2, NULL, NULL, 'Super', NULL);

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
('E47gdMfzuB3VG2eJXCcGAIfABXPpvlFJa4rJg1be', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:83.0) Gecko/20100101 Firefox/83.0', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiTTJFR2drOHdMMnZuYUMxTWN5aXk0bThyeDc2eUZWNXRQWTBqRlpPaiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzQ6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9PcGVyYXRvckxpc3QiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToyO3M6MTc6InBhc3N3b3JkX2hhc2hfd2ViIjtzOjYwOiIkMnkkMTAkc3BWR282dFJKRy52a2Q4R2k4UlZodXlwZmhPdUx6RGNYTHBBdFVxeEluVkhtemRVOTl4a0ciO3M6MjE6InBhc3N3b3JkX2hhc2hfc2FuY3R1bSI7czo2MDoiJDJ5JDEwJHNwVkdvNnRSSkcudmtkOEdpOFJWaHV5cGZoT3VMekRjWExwQXRVcXhJblZIbXpkVTk5eGtHIjt9', 1607083221),
('z1bpFJ15IiwvlP2ZX9qVdwCyVuZyyIVP5mLgGRmW', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.88 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiaWlGMm9iSUlFdDE0VElaZnhqejZLUkd4eHlwUjBUVVFpVWZNTUlhVCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTQ6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9PcGVyYXRvclN0YXR1cy9VcGRhdGUvU3RhdHVzLzEvMiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjI7czoxNzoicGFzc3dvcmRfaGFzaF93ZWIiO3M6NjA6IiQyeSQxMCRzcFZHbzZ0UkpHLnZrZDhHaThSVmh1eXBmaE91THpEY1hMcEF0VXF4SW5WSG16ZFU5OXhrRyI7czoyMToicGFzc3dvcmRfaGFzaF9zYW5jdHVtIjtzOjYwOiIkMnkkMTAkc3BWR282dFJKRy52a2Q4R2k4UlZodXlwZmhPdUx6RGNYTHBBdFVxeEluVkhtemRVOTl4a0ciO30=', 1607083181);

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
(2, 3, 2, '28', '2020-12-01 20:14:10', '2020-12-02 17:22:45');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_api_codes`
--

CREATE TABLE `tbl_api_codes` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `api_id` int(11) NOT NULL,
  `operator_id` int(5) NOT NULL,
  `operator_code` varchar(255) DEFAULT NULL,
  `api_status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_api_codes`
--

INSERT INTO `tbl_api_codes` (`id`, `category_id`, `api_id`, `operator_id`, `operator_code`, `api_status`, `created_at`, `updated_at`) VALUES
(1, 1, 4, 1, '1', 2, '2020-11-28 20:18:57', '2020-12-04 11:03:47'),
(2, 2, 7, 2, 'NA', 2, '2020-11-30 19:47:24', '2020-12-04 10:48:15'),
(3, 3, 8, 3, 'DA', 1, '2020-11-30 19:47:37', '2020-12-04 10:53:33');

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
(4, '2020-11-28 07:51:40', '2020-12-03 05:29:06', 'API', 'www.boxinallsoftech.com'),
(7, '2020-11-28 07:53:51', '2020-12-03 05:31:34', 'API NAM', 'APiname.commm'),
(8, '2020-12-01 15:09:52', '2020-12-01 15:09:52', 'Another API', 'http://test.com/web-services/httpapi/recharge-request?acc_no=ACC12501&api_key=1d4f8a72-83e8-4bfc-b869-f2e3da9bc5d8&opr_code={code}&rech_num'),
(9, '2020-12-02 03:59:55', '2020-12-03 05:27:50', 'API NAM', 'www.backlsh.in');

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
(1, 1, 'Airtel', 'AT', 0, 4, 8, 9, '2020-11-30 23:51:26', '2020-12-04 11:59:33'),
(2, 2, 'DOCOMO', 'DO', 0, NULL, NULL, NULL, '2020-12-04 01:57:47', '2020-12-04 11:59:41'),
(3, 2, 'AIRCEL', 'AI', 0, NULL, NULL, NULL, '2020-12-04 01:57:56', '2020-12-04 12:00:20');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_news`
--

CREATE TABLE `tbl_news` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `from_date` datetime NOT NULL,
  `to_date` datetime NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_news`
--

INSERT INTO `tbl_news` (`id`, `title`, `from_date`, `to_date`, `created_at`, `updated_at`) VALUES
(1, 'HI', '2020-12-11 00:00:00', '2020-12-18 00:00:00', '2020-12-02 15:18:17', '2020-12-02 15:18:17'),
(2, 'details', '2020-12-16 00:00:00', '2020-12-17 00:00:00', '2020-12-02 15:21:21', '2020-12-02 15:21:21'),
(3, 'details', '2020-12-16 00:00:00', '2020-12-17 00:00:00', '2020-12-02 15:22:02', '2020-12-02 15:22:02'),
(5, 'this is akash', '2020-12-01 00:00:00', '2020-12-15 00:00:00', '2020-12-02 17:46:39', '2020-12-02 17:46:39');

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
-- Table structure for table `tbl_sms_apis`
--

CREATE TABLE `tbl_sms_apis` (
  `id` int(11) NOT NULL,
  `title` varchar(1000) NOT NULL,
  `sms_url` varchar(10000) NOT NULL,
  `created_at` timestamp(5) NOT NULL DEFAULT current_timestamp(5),
  `updated_at` timestamp(5) NULL DEFAULT current_timestamp(5)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_sms_apis`
--

INSERT INTO `tbl_sms_apis` (`id`, `title`, `sms_url`, `created_at`, `updated_at`) VALUES
(2, 'No', 'One', '2020-12-03 08:41:31.00000', '2020-12-03 08:41:31.00000'),
(3, 'no', 'One', '2020-12-03 08:43:04.00000', '2020-12-03 08:43:04.00000'),
(4, 'Ji', 'tuu', '2020-12-03 10:02:30.00000', '2020-12-03 10:02:30.00000'),
(5, 'Check', 'https://www.google.com', '2020-12-04 02:54:08.00000', '2020-12-04 02:54:08.00000');

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
  `parent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `remember_token`, `parent_id`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
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
-- Indexes for table `fail_switch_details`
--
ALTER TABLE `fail_switch_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fail_switch_masters`
--
ALTER TABLE `fail_switch_masters`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `OperatorId` (`OperatorId`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `package_lists`
--
ALTER TABLE `package_lists`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `package_masters`
--
ALTER TABLE `package_masters`
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
-- Indexes for table `tbl_news`
--
ALTER TABLE `tbl_news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_recharge_categories`
--
ALTER TABLE `tbl_recharge_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_sms_apis`
--
ALTER TABLE `tbl_sms_apis`
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
-- AUTO_INCREMENT for table `fail_switch_details`
--
ALTER TABLE `fail_switch_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `fail_switch_masters`
--
ALTER TABLE `fail_switch_masters`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `package_lists`
--
ALTER TABLE `package_lists`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `package_masters`
--
ALTER TABLE `package_masters`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `role_masters`
--
ALTER TABLE `role_masters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_my_operators`
--
ALTER TABLE `tbl_my_operators`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_news`
--
ALTER TABLE `tbl_news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_recharge_categories`
--
ALTER TABLE `tbl_recharge_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_sms_apis`
--
ALTER TABLE `tbl_sms_apis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
