-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 15, 2020 at 12:03 PM
-- Server version: 8.0.22-0ubuntu0.20.04.3
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `multirec`
--

-- --------------------------------------------------------

--
-- Table structure for table `balances`
--

CREATE TABLE `balances` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `balance` float NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `balances`
--

INSERT INTO `balances` (`id`, `user_id`, `balance`) VALUES
(1, 14, 94.68),
(2, 1, 115.7);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fail_switch_details`
--

CREATE TABLE `fail_switch_details` (
  `id` int NOT NULL,
  `fail_switch_master_id` int NOT NULL,
  `api_id` int NOT NULL,
  `minutes` varchar(200) NOT NULL,
  `priority` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fail_switch_masters`
--

CREATE TABLE `fail_switch_masters` (
  `id` int NOT NULL,
  `OperatorId` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ledgers`
--

CREATE TABLE `ledgers` (
  `id` int NOT NULL,
  `amount` float NOT NULL,
  `percentage` float NOT NULL,
  `final_amount` float NOT NULL,
  `remarks` varchar(200) NOT NULL,
  `mode` varchar(100) NOT NULL,
  `from_account_id` int NOT NULL,
  `to_account_id` int NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
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
  `id` int NOT NULL,
  `package_id` int NOT NULL,
  `operator_id` int NOT NULL,
  `max` int NOT NULL,
  `ded` int NOT NULL,
  `ref` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `package_masters`
--

CREATE TABLE `package_masters` (
  `id` int NOT NULL,
  `package_title` varchar(200) NOT NULL,
  `package_created_by` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `package_masters`
--

INSERT INTO `package_masters` (`id`, `package_title`, `package_created_by`, `created_at`, `updated_at`) VALUES
(4, 'Pack Referral', 14, '2020-12-15 11:25:46', '2020-12-15 11:25:46');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `receive_credits`
--

CREATE TABLE `receive_credits` (
  `id` int NOT NULL,
  `from_account_id` int NOT NULL,
  `to_account_id` int NOT NULL,
  `amount` float NOT NULL,
  `remarks` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `role_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `created_at`, `updated_at`, `role_id`, `user_id`) VALUES
(14, NULL, NULL, '1', '14');

-- --------------------------------------------------------

--
-- Table structure for table `role_masters`
--

CREATE TABLE `role_masters` (
  `id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_masters`
--

INSERT INTO `role_masters` (`id`, `created_at`, `updated_at`, `role_name`, `description`) VALUES
(1, NULL, NULL, 'Admin', NULL),
(2, NULL, NULL, 'Super', NULL),
(3, NULL, NULL, 'Retailer', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `payload` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('0vtvrjqEVHqc1dAMorUNJlZXgRonFn36XMo4sNGu', NULL, '156.96.150.119', 'libwww-perl/6.49', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiVTFzSk5BYUxtTXJjN0tDeWZhTEpJTHQ2N05IVnZha3dZcVNxN2I0TCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjI6Imh0dHA6Ly8xNDMuMTEwLjE4MC4xNjAiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1608032069),
('AtTirh0XtnnYzD8MMtjYOawfm7QyTvjKvTN7fYq6', NULL, '49.36.241.93', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.88 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiMEdxUnd3QlhEUlhsSGhJVTFoVVZmSnJ4Q29FUlpGMUZod2lOb0s0VCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDU6Imh0dHA6Ly9tdWx0aXJlYy5ha2FzaHRvZGFya2EuY29tL09wZXJhdG9yTGlzdCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1608032191),
('GqFIqs4aMwZdgaJJKczHTiX1Rx1OCugs92qeAzX4', 14, '49.36.241.93', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.88 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoibHhRZ2hoTzlBNHlTTFpHbVZ5R3JTdWRYclRvek00OVhhME9TUHVzSyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDI6Imh0dHA6Ly9tdWx0aXJlYy5ha2FzaHRvZGFya2EuY29tL2Rhc2hib2FyZCI7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE0O3M6MTc6InBhc3N3b3JkX2hhc2hfd2ViIjtzOjYwOiIkMnkkMTAkMHRWUUYvQm9ncjhjN0xrV1BWN3llLmNUN1ZOVVQ1a2xSa3hkcVhaRGJvZ3B5c0lJbzFucVMiO3M6MjE6InBhc3N3b3JkX2hhc2hfc2FuY3R1bSI7czo2MDoiJDJ5JDEwJDB0VlFGL0JvZ3I4YzdMa1dQVjd5ZS5jVDdWTlVUNWtsUmt4ZHFYWkRib2dweXNJSW8xbnFTIjt9', 1608032175),
('jKOe9aoL8FhGUObQ2ZEdxhQQcomDT1LpfkW7vjSm', 15, '223.181.54.160', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.88 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiWVhmdjQyNnYxOU1xamxxTG16N09EVUhSUzIxVlo3QnJSRGdIQTlxSSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDc6Imh0dHA6Ly9tdWx0aXJlYy5ha2FzaHRvZGFya2EuY29tL0FjY291bnRDYXBwaW5nIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTU7czoxNzoicGFzc3dvcmRfaGFzaF93ZWIiO3M6NjA6IiQyeSQxMCQvekpXaDBxell5S05MaHNEM1RxUVZ1QTF4YkVudWZPSEpJTHBFTGNIdy82Ry54cnRONEUyZSI7czoyMToicGFzc3dvcmRfaGFzaF9zYW5jdHVtIjtzOjYwOiIkMnkkMTAkL3pKV2gwcXpZeUtOTGhzRDNUcVFWdUExeGJFbnVmT0hKSUxwRUxjSHcvNkcueHJ0TjRFMmUiO30=', 1608033162),
('mrb7GIKYMEjLag1vOmGgupglOT7RQ4BNQuNOAGHS', NULL, '45.95.169.202', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:76.0) Gecko/20100101 Firefox/76.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoia0pKem1iaTdEVGx1VkhUbnNjRWNTUTdBam1VeHN0cHRjZno5UlFYayI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjI6Imh0dHA6Ly8xNDMuMTEwLjE4MC4xNjAiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1608027374);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_add_bank_accounts`
--

CREATE TABLE `tbl_add_bank_accounts` (
  `id` int NOT NULL,
  `bank_name` varchar(100) NOT NULL,
  `account_no` bigint NOT NULL,
  `ifsc_code` varchar(15) NOT NULL,
  `branch_name` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_amount_filters`
--

CREATE TABLE `tbl_amount_filters` (
  `Id` int NOT NULL,
  `api_id` int NOT NULL,
  `operator_id` int NOT NULL,
  `Amount` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_api_codes`
--

CREATE TABLE `tbl_api_codes` (
  `id` int NOT NULL,
  `category_id` int NOT NULL,
  `api_id` int NOT NULL,
  `operator_code` varchar(100) DEFAULT NULL,
  `operator_id` int NOT NULL,
  `api_status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_api_masters`
--

CREATE TABLE `tbl_api_masters` (
  `id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `api_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_api_masters`
--

INSERT INTO `tbl_api_masters` (`id`, `created_at`, `updated_at`, `api_name`, `url`) VALUES
(10, '2020-12-15 11:17:07', '2020-12-15 11:17:07', 'Test API', 'http://www.google.com');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cappings`
--

CREATE TABLE `tbl_cappings` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `capped` int NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_capping_details`
--

CREATE TABLE `tbl_capping_details` (
  `id` int NOT NULL,
  `capping_id` int NOT NULL,
  `operator_id` int NOT NULL,
  `current_capping` float NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_my_operators`
--

CREATE TABLE `tbl_my_operators` (
  `id` int NOT NULL,
  `category_id` int NOT NULL,
  `operator` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `status` tinyint NOT NULL DEFAULT '1',
  `api_1` int DEFAULT NULL,
  `api_2` int DEFAULT NULL,
  `api_3` int DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_my_operators`
--

INSERT INTO `tbl_my_operators` (`id`, `category_id`, `operator`, `code`, `status`, `api_1`, `api_2`, `api_3`, `created_at`, `updated_at`) VALUES
(4, 1, 'Airtel', 'AT', 1, NULL, NULL, NULL, '2020-12-15 11:21:24', '2020-12-15 11:21:24'),
(5, 1, 'Idea', 'ID', 1, NULL, NULL, NULL, '2020-12-15 11:21:24', '2020-12-15 11:21:24');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_news`
--

CREATE TABLE `tbl_news` (
  `id` int NOT NULL,
  `title` text NOT NULL,
  `from_date` datetime NOT NULL,
  `to_date` datetime NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_recharge_categories`
--

CREATE TABLE `tbl_recharge_categories` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_recharge_categories`
--

INSERT INTO `tbl_recharge_categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Prepaid', '2020-12-15 11:20:32', '2020-12-15 11:20:32'),
(2, 'Postpaid', '2020-12-15 11:20:32', '2020-12-15 11:20:32'),
(3, 'DTH', '2020-12-15 11:20:45', '2020-12-15 11:20:45'),
(4, 'Electricity', '2020-12-15 11:20:45', '2020-12-15 11:20:45');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sms_apis`
--

CREATE TABLE `tbl_sms_apis` (
  `id` int NOT NULL,
  `title` varchar(1000) NOT NULL,
  `sms_url` varchar(10000) NOT NULL,
  `created_at` timestamp(5) NOT NULL DEFAULT CURRENT_TIMESTAMP(5),
  `updated_at` timestamp(5) NULL DEFAULT CURRENT_TIMESTAMP(5)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_sms_apis`
--

INSERT INTO `tbl_sms_apis` (`id`, `title`, `sms_url`, `created_at`, `updated_at`) VALUES
(6, 'SMS Test', 'http://www.ojasinfotech.in/sms', '2020-12-15 11:27:21.00000', '2020-12-15 11:27:21.00000');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `two_factor_recovery_codes` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_id` bigint UNSIGNED DEFAULT NULL,
  `profile_photo_path` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `remember_token`, `parent_id`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
(13, 'Siddhant', 'siddhant.singh326@gmail.com', NULL, '$2y$10$mUSBlx1VX/lFjKSI9svlyO03rIDaKTqgOYpJAInLtkuxqhZOhrxrG', NULL, NULL, NULL, NULL, NULL, '2020-12-15 09:18:44', '2020-12-15 09:18:44'),
(14, 'Akash', 'akash@gmail.com', NULL, '$2y$10$0tVQF/Bogr8c7LkWPV7ye.cT7VNUT5klRkxdqXZDbogpysIIo1nqS', NULL, NULL, NULL, NULL, NULL, '2020-12-15 11:15:31', '2020-12-15 11:15:31'),
(15, 'Siddharth Rastogi', 'sidd15597@gmail.com', NULL, '$2y$10$/zJWh0qzYyKNLhsD3TqQVuA1xbEnufOHJILpELcHw/6G.xrtN4E2e', NULL, NULL, NULL, NULL, NULL, '2020-12-15 11:52:27', '2020-12-15 11:52:27');

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE `user_details` (
  `id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `pan_number` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gst_number` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile_number` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pincode` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int NOT NULL,
  `isEnabled` tinyint(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`id`, `created_at`, `updated_at`, `pan_number`, `gst_number`, `mobile_number`, `address`, `city`, `pincode`, `user_id`, `isEnabled`) VALUES
(9, '2020-12-15 09:18:44', '2020-12-15 09:18:44', '897876867', '676668686', NULL, 'Noida', 'Noida', '201009', 13, 1),
(10, '2020-12-15 11:15:31', '2020-12-15 11:15:31', NULL, NULL, NULL, NULL, NULL, NULL, 14, 1),
(11, '2020-12-15 11:52:27', '2020-12-15 11:52:27', NULL, NULL, NULL, 'Hno 93 Ballabh street, Mandi chowk near Dr. Pushpendra', 'Moradabad', '244001', 15, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `balances`
--
ALTER TABLE `balances`
  ADD PRIMARY KEY (`id`);

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
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ledgers`
--
ALTER TABLE `ledgers`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `receive_credits`
--
ALTER TABLE `receive_credits`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `tbl_add_bank_accounts`
--
ALTER TABLE `tbl_add_bank_accounts`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `tbl_cappings`
--
ALTER TABLE `tbl_cappings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_capping_details`
--
ALTER TABLE `tbl_capping_details`
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
-- AUTO_INCREMENT for table `balances`
--
ALTER TABLE `balances`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fail_switch_details`
--
ALTER TABLE `fail_switch_details`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fail_switch_masters`
--
ALTER TABLE `fail_switch_masters`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ledgers`
--
ALTER TABLE `ledgers`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `package_lists`
--
ALTER TABLE `package_lists`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `package_masters`
--
ALTER TABLE `package_masters`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `receive_credits`
--
ALTER TABLE `receive_credits`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `role_masters`
--
ALTER TABLE `role_masters`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_add_bank_accounts`
--
ALTER TABLE `tbl_add_bank_accounts`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_amount_filters`
--
ALTER TABLE `tbl_amount_filters`
  MODIFY `Id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_api_codes`
--
ALTER TABLE `tbl_api_codes`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_api_masters`
--
ALTER TABLE `tbl_api_masters`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_cappings`
--
ALTER TABLE `tbl_cappings`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tbl_capping_details`
--
ALTER TABLE `tbl_capping_details`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `tbl_my_operators`
--
ALTER TABLE `tbl_my_operators`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_news`
--
ALTER TABLE `tbl_news`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_recharge_categories`
--
ALTER TABLE `tbl_recharge_categories`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_sms_apis`
--
ALTER TABLE `tbl_sms_apis`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `user_details`
--
ALTER TABLE `user_details`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
