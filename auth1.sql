-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 10, 2020 at 07:36 AM
-- Server version: 10.4.11-MariaDB
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
-- Database: `laravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `balances`
--

CREATE TABLE `balances` (
  `id` int(11) NOT NULL,
  `user_id` int(5) NOT NULL,
  `balance` float NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `balances`
--

INSERT INTO `balances` (`id`, `user_id`, `balance`, `created_at`, `updated_at`) VALUES
(1, 4, 94.68, '2020-12-10 05:52:12', '2020-12-10 00:22:12'),
(2, 1, 115.7, '2020-12-10 05:52:12', '2020-12-10 00:22:12');

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
(1, 1, NULL, NULL),
(2, 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ledgers`
--

CREATE TABLE `ledgers` (
  `id` int(11) NOT NULL,
  `amount` float NOT NULL,
  `percentage` float NOT NULL,
  `final_amount` float NOT NULL,
  `remarks` varchar(200) NOT NULL,
  `mode` varchar(100) NOT NULL,
  `from_account_id` int(5) NOT NULL,
  `to_account_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ledgers`
--

INSERT INTO `ledgers` (`id`, `amount`, `percentage`, `final_amount`, `remarks`, `mode`, `from_account_id`, `to_account_id`, `created_at`, `updated_at`) VALUES
(1, 100, 5, 105, 'Hello Siddharth Rastogi', 'payment', 4, 1, '2020-12-08 06:36:40', '2020-12-08 06:36:40'),
(8, 45, 6, 48, 'Hello everyone', 'credit', 4, 1, '2020-12-08 01:10:50', '2020-12-08 01:10:50'),
(19, 45, 4, 46.8, 'hello sid', 'credit', 4, 1, '2020-12-08 02:20:29', '2020-12-08 02:20:29'),
(20, 45, 8, 46.67, 'hello sid', 'credit', 4, 11, '2020-12-09 08:58:18', '2020-12-09 08:58:18'),
(21, 5, 2, 5.1, 'hello sid', 'payment', 4, 1, '2020-12-10 00:22:12', '2020-12-10 00:22:12');

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
(1, 'Siddharth', 4, '2020-12-04 01:46:11', '2020-12-04 01:46:11'),
(2, 'Siddhant', 4, '2020-12-04 01:54:50', '2020-12-04 01:54:50'),
(3, 'hello', 4, '2020-12-04 05:12:36', '2020-12-04 05:12:36');

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
-- Table structure for table `receive_credits`
--

CREATE TABLE `receive_credits` (
  `id` int(10) NOT NULL,
  `from_account_id` int(10) NOT NULL,
  `to_account_id` int(10) NOT NULL,
  `amount` float NOT NULL,
  `remarks` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `receive_credits`
--

INSERT INTO `receive_credits` (`id`, `from_account_id`, `to_account_id`, `amount`, `remarks`, `created_at`, `updated_at`) VALUES
(1, 4, 1, 45, 'feeee', '2020-12-10 06:16:56', '2020-12-10 06:16:56'),
(4, 4, 1, 5.2, 'heeloo everyone', '2020-12-10 01:04:09', '2020-12-10 01:04:09'),
(5, 4, 11, 6.07, 'hfgfhgh', '2020-12-10 01:06:11', '2020-12-10 01:06:11');

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
(5, '2020-12-05 01:27:47', '2020-12-05 01:27:47', '1', '2'),
(7, NULL, NULL, '2', '1'),
(8, NULL, '2020-12-05 04:21:39', '2', '3'),
(9, NULL, NULL, '1', '4'),
(12, '2020-12-05 05:34:17', '2020-12-05 05:34:17', '3', '11'),
(13, '2020-12-05 05:36:53', '2020-12-05 05:36:53', '2', '12');

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
(2, NULL, NULL, 'Super', NULL),
(3, NULL, NULL, 'Retailer', NULL);

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
('QIt8jmoGPOGooe0w4RIZhgOoMuPWaxaGGKoVqP4I', 4, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.88 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiQXdDUjZjNXRVNjAzV2sxdW5xMlA4MThzS2V2Z1kxdk5vVDhZOUxSbiI7czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6NDtzOjE3OiJwYXNzd29yZF9oYXNoX3dlYiI7czo2MDoiJDJ5JDEwJFF5Wmk2anFwRkEuUWJPWTFXbkdwd3Vxbmxud0I3c2lrckk1c080WjdKaS9YTm1DeEZ0SmcyIjtzOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czozMzoiaHR0cDovLzEyNy4wLjAuMTo4MDAwL0FjY291bnRMaXN0Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czoyMToicGFzc3dvcmRfaGFzaF9zYW5jdHVtIjtzOjYwOiIkMnkkMTAkUXlaaTZqcXBGQS5RYk9ZMVduR3B3dXFubG53QjdzaWtySTVzTzRaN0ppL1hObUN4RnRKZzIiO30=', 1607582189);

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
(1, 4, 1, '90', '2020-12-01 20:13:56', '2020-12-04 10:38:03');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_api_codes`
--

CREATE TABLE `tbl_api_codes` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `api_id` int(11) NOT NULL,
  `operator_code` varchar(100) DEFAULT NULL,
  `operator_id` int(11) NOT NULL,
  `api_status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_api_codes`
--

INSERT INTO `tbl_api_codes` (`id`, `category_id`, `api_id`, `operator_code`, `operator_id`, `api_status`, `created_at`, `updated_at`) VALUES
(1, 1, 4, 'GA', 1, 2, '2020-11-28 20:18:57', '2020-12-05 10:24:13'),
(2, 2, 5, 'AI', 2, 0, '2020-11-30 19:47:24', '2020-11-30 19:47:24'),
(3, 3, 3, 'DA', 3, 1, '2020-11-30 19:47:37', '2020-12-01 21:17:57');

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
(1, 1, 'Airtel', 'AT', 0, 7, NULL, NULL, '2020-11-30 23:51:26', '2020-12-04 05:20:42'),
(2, 2, 'DOCOMO', 'DO', 0, NULL, NULL, NULL, '2020-12-05 13:40:50', '2020-12-05 12:26:33'),
(3, 2, 'AIRCEL', 'AI', 1, NULL, NULL, NULL, '2020-12-05 13:59:48', '2020-12-05 13:59:48');

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
(4, 'details', '2020-12-16 00:00:00', '2020-12-17 00:00:00', '2020-12-02 15:29:24', '2020-12-02 15:29:24'),
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
(1, 'Siddhant Singh', 'siddhant.singh326@gmail.com', NULL, '$2y$10$uKHYuM1FJZdHnIERbTeTeeSO015/AQgJRSTAilVVdHGq5NtevhNi6', 'eyJpdiI6ImdIMlpzZi9wTFdpZ2ZhR0tZNXpoVGc9PSIsInZhbHVlIjoiTEpRVUUrY05mT0U3dncvTlJOYVN3ZE9JNitKcjFRWnFrVWJzNncxOEtKdz0iLCJtYWMiOiIzMzIyOGQwZmQwM2VkNDM1OTE0ZDM2MTM2NDNkZTc0MjI3YzljNDc0ZTlmNGRkNjBmZDczNTQxODRkNTE3NTFhIn0=', 'eyJpdiI6IkNZQzA3SzU1T3RGTXZJU3ppbXBNYmc9PSIsInZhbHVlIjoiZGdhdVVhWjQzRkVZMVR2ZHN3SjB5bVZxdUlNUDBsUEwzbmNTQTRuelZLbFAzL1R5cnVqcXRIQkE5a25aSUlyMGo2L04xRnJVZzFzd04vOERXMTVJdmFsMFdSNTU4NDRuWm5DWTNsTlNhai96OGI0Z1dVMkQza0xjckpDbmZqR1RDVHpLVUdicTgyTXhtVmkveE9semVGV1Y0eVdrMjU2NU5HOVlONm92VklvTWdFbzJ3bDdVNVJleDBuZHBkTWhNS0FvU2JYRWNiYXY3N1liYk1FS0tJMDJrdzg1T2ZNaVRsS2k0WHVyY3NseHpuRE03SS8zdEZKUWlUOFFUSWJHRm16YnN6cVRsaGRCTUsxcDhlUkdhaFE9PSIsIm1hYyI6IjFlMzlkZTY4OTExNWRkMzE1ZDI4NDNlYjQ2NmMxN2ExMTZhMzhkNmUyY2M1ZGQ5M2E4NWQ4MGYxNjUyNTEzMGIifQ==', NULL, 4, NULL, '2020-11-26 22:43:13', '2020-11-30 09:57:21'),
(2, 'SIddhant Testtt', 'pallavbansal2@gmail.com', NULL, '$2y$10$spVGo6tRJG.vkd8Gi8RVhuypfhOuLzDcXLpAtUqxInVHmzdU99xkG', NULL, NULL, NULL, NULL, NULL, '2020-12-01 03:48:23', '2020-12-05 02:27:38'),
(3, 'Chirag', 'cdeol48@gmail.com', NULL, '$2y$10$SHSDi.SMq6f.pldsnHdHn.u0Jhp2LZTkGP9luW2MwPM29vwmyrpCy', NULL, NULL, NULL, 4, NULL, '2020-12-01 08:14:23', '2020-12-01 08:14:23'),
(4, 'Siddharth Rastogi', 'sidd15597@gmail.com', NULL, '$2y$10$QyZi6jqpFA.QbOY1WnGpwuqnlnwB7sikrI5sO4Z7Ji/XNmCxFtJg2', NULL, NULL, 'LwBUTP4eEBCLTSJIRmU6XzMkFFW04fgHtOimuNL3dRkE5mrTVl45AOHrv66e', 4, NULL, '2020-12-03 23:36:19', '2020-12-04 16:59:56'),
(11, 'Sumith', 'bia@gmail.com', NULL, '$2y$10$.zakfyq.ONQHqFqCr96mV.31ch7/Rlsm9DiqUTKj3jzQKls9uOPIS', NULL, NULL, NULL, 4, NULL, '2020-12-05 05:34:17', '2020-12-05 05:34:17'),
(12, 'Gully', 'boxinall@gmail.com', NULL, '$2y$10$VVuVzr8H4lPQLrw3s5oEGeSj4nJZMwSiyATo95inHEkleXa.Ew9Ra', NULL, NULL, NULL, 2, NULL, '2020-12-05 05:36:53', '2020-12-05 05:36:53');

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
  `mobile_number` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pincode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `isEnabled` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`id`, `created_at`, `updated_at`, `pan_number`, `gst_number`, `mobile_number`, `address`, `city`, `pincode`, `user_id`, `isEnabled`) VALUES
(1, '2020-11-26 22:43:13', '2020-12-05 02:30:19', '789678787', '77979798797', '8384863081', 'Noida', 'mOIDA', '768687', 1, 1),
(2, '2020-12-01 03:48:23', '2020-12-05 02:30:06', NULL, '342445', '1234656799', NULL, NULL, '3209203', 2, 1),
(3, '2020-12-01 08:14:23', '2020-12-05 01:31:34', '378829878', '97492949202', '8945612377', 'Noida', 'Noida', '244001', 3, 0),
(4, '2020-12-03 23:36:19', '2020-12-05 02:30:25', '324234', '45436', '8938052751', 'Hno 93 Ballabh street, Mandi chowk near Dr. Pushpendra, Moradabad', 'Moradabad', '244001', 4, 1),
(7, '2020-12-05 05:34:17', '2020-12-05 05:34:17', '7987987', '897878', '788979', 'Moradabad', 'Kanpur', '37489', 11, 1),
(8, '2020-12-05 05:36:53', '2020-12-07 04:13:21', '897987987', '879797', '8797789789', 'Moradabad', 'Moradabad', '6878789', 12, 1);

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
-- AUTO_INCREMENT for table `balances`
--
ALTER TABLE `balances`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fail_switch_details`
--
ALTER TABLE `fail_switch_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fail_switch_masters`
--
ALTER TABLE `fail_switch_masters`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ledgers`
--
ALTER TABLE `ledgers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `receive_credits`
--
ALTER TABLE `receive_credits`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `role_masters`
--
ALTER TABLE `role_masters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user_details`
--
ALTER TABLE `user_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
