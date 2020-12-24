-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 24, 2020 at 09:01 AM
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
-- Database: `multirec`
--

-- --------------------------------------------------------

--
-- Table structure for table `balances`
--

CREATE TABLE `balances` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `balance` float NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `balances`
--

INSERT INTO `balances` (`id`, `user_id`, `balance`, `created_at`, `updated_at`) VALUES
(1, 14, 94.68, '2020-12-20 13:45:30', '2020-12-20 13:45:30'),
(2, 1, 115.7, '2020-12-20 13:45:30', '2020-12-20 13:45:30');

-- --------------------------------------------------------

--
-- Table structure for table `default_packages`
--

CREATE TABLE `default_packages` (
  `id` int(10) NOT NULL,
  `role_id` int(10) NOT NULL,
  `package_master_id` int(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `default_packages`
--

INSERT INTO `default_packages` (`id`, `role_id`, `package_master_id`, `created_at`, `updated_at`) VALUES
(5, 2, 4, '2020-12-22 11:05:18', '2020-12-22 11:05:18');

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
  `fail_switch_detail_id` int(11) NOT NULL,
  `fail_switch_master_id` int(11) NOT NULL,
  `api_id` int(11) NOT NULL,
  `minutes` varchar(200) NOT NULL,
  `priority` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `fail_switch_details`
--

INSERT INTO `fail_switch_details` (`fail_switch_detail_id`, `fail_switch_master_id`, `api_id`, `minutes`, `priority`, `created_at`, `updated_at`) VALUES
(14, 12, 11, '1', '2', '2020-12-18 07:37:33', '2020-12-18 07:37:33'),
(15, 0, 11, '2', '4', '2020-12-18 16:50:46', '2020-12-18 16:50:46'),
(16, 13, 10, '1', '1', '2020-12-19 08:22:06', '2020-12-19 08:22:06');

-- --------------------------------------------------------

--
-- Table structure for table `fail_switch_masters`
--

CREATE TABLE `fail_switch_masters` (
  `id` int(11) NOT NULL,
  `OperatorId` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `fail_switch_masters`
--

INSERT INTO `fail_switch_masters` (`id`, `OperatorId`, `created_at`, `updated_at`) VALUES
(12, 4, '2020-12-18 07:37:33', '2020-12-18 07:37:33'),
(13, 5, '2020-12-19 08:22:06', '2020-12-19 08:22:06');

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
  `from_account_id` int(11) NOT NULL,
  `to_account_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  `package_id` int(11) NOT NULL,
  `operator_id` int(11) NOT NULL,
  `max` int(11) NOT NULL,
  `ded` int(11) NOT NULL,
  `ref` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `package_lists`
--

INSERT INTO `package_lists` (`id`, `package_id`, `operator_id`, `max`, `ded`, `ref`, `created_at`, `updated_at`) VALUES
(8, 4, 6, 25, 4, 0, '2020-12-22 15:22:54', '2020-12-22 15:22:54'),
(9, 5, 5, 25, 1, 4, '2020-12-22 15:23:28', '2020-12-22 15:23:28'),
(10, 5, 5, 25, 1, 5, '2020-12-22 15:23:43', '2020-12-22 15:23:43');

-- --------------------------------------------------------

--
-- Table structure for table `package_masters`
--

CREATE TABLE `package_masters` (
  `id` int(11) NOT NULL,
  `package_title` varchar(200) NOT NULL,
  `package_created_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `package_masters`
--

INSERT INTO `package_masters` (`id`, `package_title`, `package_created_by`, `created_at`, `updated_at`) VALUES
(4, 'Pack Referral', 14, '2020-12-15 11:25:46', '2020-12-15 11:25:46'),
(5, 'R', 14, '2020-12-15 16:04:30', '2020-12-15 16:04:30');

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
  `id` int(11) NOT NULL,
  `from_account_id` int(11) NOT NULL,
  `to_account_id` int(11) NOT NULL,
  `amount` float NOT NULL,
  `remarks` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `receive_credits`
--

INSERT INTO `receive_credits` (`id`, `from_account_id`, `to_account_id`, `amount`, `remarks`, `created_at`, `updated_at`) VALUES
(6, 14, 16, 500, 'received', '2020-12-18 20:28:59', '2020-12-18 20:28:59');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp(),
  `role_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `created_at`, `updated_at`, `role_id`, `user_id`) VALUES
(14, NULL, NULL, '1', '14'),
(15, NULL, NULL, '1', '15'),
(16, '2020-12-16 06:53:14', '2020-12-16 06:53:14', '2', '13'),
(17, '2020-12-18 13:47:15', '2020-12-18 13:47:15', '3', '16'),
(18, '2020-12-19 08:23:28', '2020-12-19 08:23:28', '2', '18'),
(19, '2020-12-19 08:23:28', '2020-12-19 08:23:28', '1', '19');

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
('3gIIKjlbew3C4mXGgK4qT6jyiSEvFFjAwTZMJlNB', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.198 Safari/537.36 OPR/72.0.3815.400', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoid3ZocjRkemh6R3FGd3ZSZXhKck9QYVoxZnRDTktaS2wwaHJlcXR1ZiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzM6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9BY2NvdW50TGlzdCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1608665273),
('A70SyOPcXqH4gRqwhgh8U0DvXuGCeJrJfSPIz5jc', 19, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.88 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiVUhBUlNnM3NUbDVKbG5KbHRjZ1lwU2FzbWpDTnJGYTRWQUFkUTdWUyI7czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTk7czoxNzoicGFzc3dvcmRfaGFzaF93ZWIiO3M6NjA6IiQyeSQxMCQ1MXROcU0uNHRzRjlWZG9tOXpVWnRlcDdXRkZINnFrTi4veWExQXFGdU5ONmp4dnB6SXFwdSI7czoyMToicGFzc3dvcmRfaGFzaF9zYW5jdHVtIjtzOjYwOiIkMnkkMTAkNTF0TnFNLjR0c0Y5VmRvbTl6VVp0ZXA3V0ZGSDZxa04uL3lhMUFxRnVOTjZqeHZweklxcHUiO3M6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjM4OiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvUGFja2FnZURldGFpbHMvNCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1608670478);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_add_bank_accounts`
--

CREATE TABLE `tbl_add_bank_accounts` (
  `id` int(11) NOT NULL,
  `bank_name` varchar(100) NOT NULL,
  `account_no` bigint(20) NOT NULL,
  `ifsc_code` varchar(15) NOT NULL,
  `branch_name` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_add_bank_accounts`
--

INSERT INTO `tbl_add_bank_accounts` (`id`, `bank_name`, `account_no`, `ifsc_code`, `branch_name`, `created_at`, `updated_at`) VALUES
(3, 'BOB', 234567890, '234567', 'BIa', '2020-12-16 07:19:09', '2020-12-16 07:19:09'),
(4, 'SBI', 468465426541, 'SBIIN002581', 'bartan bazar', '2020-12-16 12:06:20', '2020-12-16 12:06:20'),
(5, 'Test', 213, 'fsdf', 'dsfsd', '2020-12-16 14:22:15', '2020-12-16 14:22:15'),
(6, 'Test', 22434, 'retert', 'etret', '2020-12-16 16:14:22', '2020-12-16 16:14:22'),
(7, 'BOB', 5456465657, '454', 'BIA', '2020-12-16 16:15:15', '2020-12-16 16:15:15');

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
(10, '2020-12-15 11:17:07', '2020-12-15 11:17:07', 'Test API', 'http://www.google.com'),
(11, '2020-12-15 18:13:34', '2020-12-15 18:13:34', 'Test Api 2', 'http://');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cappings`
--

CREATE TABLE `tbl_cappings` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `capped` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_cappings`
--

INSERT INTO `tbl_cappings` (`id`, `user_id`, `capped`, `created_at`, `updated_at`) VALUES
(19, 14, 1, '2020-12-15 12:07:24', '2020-12-15 12:07:24'),
(20, 14, 0, '2020-12-15 15:48:51', '2020-12-15 15:48:51'),
(21, 14, 1, '2020-12-15 15:48:55', '2020-12-15 15:48:55'),
(22, 14, 0, '2020-12-15 16:03:41', '2020-12-15 16:03:41'),
(23, 14, 1, '2020-12-15 16:03:43', '2020-12-15 16:03:43'),
(24, 14, 0, '2020-12-15 16:03:55', '2020-12-15 16:03:55'),
(25, 14, 1, '2020-12-15 18:15:18', '2020-12-15 18:15:18'),
(26, 14, 0, '2020-12-15 21:06:33', '2020-12-15 21:06:33'),
(27, 14, 1, '2020-12-15 21:06:35', '2020-12-15 21:06:35'),
(28, 14, 0, '2020-12-16 14:21:30', '2020-12-16 14:21:30'),
(29, 14, 1, '2020-12-16 14:21:34', '2020-12-16 14:21:34'),
(30, 14, 0, '2020-12-17 08:08:58', '2020-12-17 08:08:58'),
(31, 14, 1, '2020-12-18 13:45:09', '2020-12-18 13:45:09'),
(32, 14, 0, '2020-12-18 13:45:23', '2020-12-18 13:45:23'),
(33, 14, 1, '2020-12-18 15:27:09', '2020-12-18 15:27:09');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_capping_details`
--

CREATE TABLE `tbl_capping_details` (
  `id` int(11) NOT NULL,
  `capping_id` int(11) NOT NULL,
  `operator_id` int(11) NOT NULL,
  `current_capping` float NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_capping_details`
--

INSERT INTO `tbl_capping_details` (`id`, `capping_id`, `operator_id`, `current_capping`, `created_at`, `updated_at`) VALUES
(29, 21, 4, 500, '2020-12-15 15:49:07', '2020-12-15 15:49:07'),
(30, 21, 5, 0, '2020-12-15 15:49:07', '2020-12-15 15:49:07'),
(31, 23, 4, 0, '2020-12-15 16:03:50', '2020-12-15 16:03:50'),
(32, 23, 5, 0, '2020-12-15 16:03:50', '2020-12-15 16:03:50'),
(33, 25, 4, 100, '2020-12-15 18:15:26', '2020-12-15 18:15:26');

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
(4, 1, 'Airtel', 'AT', 0, NULL, NULL, NULL, '2020-12-15 11:21:24', '2020-12-19 16:17:48'),
(5, 2, 'Idea', 'ID', 0, NULL, NULL, NULL, '2020-12-15 11:21:24', '2020-12-18 20:27:27'),
(6, 1, 'Vodafone', 'VD', 0, NULL, NULL, NULL, '2020-12-15 11:21:24', '2020-12-19 16:17:48');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_news`
--

CREATE TABLE `tbl_news` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `from_date` date NOT NULL,
  `to_date` date NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_news`
--

INSERT INTO `tbl_news` (`id`, `title`, `from_date`, `to_date`, `created_at`, `updated_at`) VALUES
(9, 'hello', '2020-12-18', '2020-12-31', '2020-12-18 13:57:04', '2020-12-18 13:57:04');

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
(1, 'Prepaid', '2020-12-15 11:20:32', '2020-12-15 11:20:32'),
(2, 'Postpaid', '2020-12-15 11:20:32', '2020-12-15 11:20:32'),
(3, 'DTH', '2020-12-15 11:20:45', '2020-12-15 11:20:45'),
(4, 'Electricity', '2020-12-15 11:20:45', '2020-12-15 11:20:45');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
(14, 'Akash', 'akash@gmail.com', NULL, '$2y$10$lLYPO9QY9al9dOu8ADBSmed4.iX/OHiv1/ijWcmqht10cb./K0RL6', NULL, NULL, NULL, 19, NULL, '2020-12-15 11:15:31', '2020-12-19 20:05:06'),
(16, 'test', 'jhbjhbhj', NULL, '$2y$10$bpPzDmZLxDNLUI0AhM09YORP3N6dWWWwMyPO3Fq17bRgiGqDavn/G', NULL, NULL, NULL, 14, NULL, '2020-12-18 13:47:15', '2020-12-18 13:47:15'),
(18, 'siddhant kumar', 'siddhant.singh326@gmail.com', NULL, '$2y$10$anb6T29Lvw8FWQL2FfPoq.9RuVxf.avPi8S2wcUKVuqhcM.Y42tki', NULL, NULL, NULL, 19, NULL, '2020-12-18 16:00:38', '2020-12-18 16:00:38'),
(19, 'Siddharth Rastogi', 'sidd15597@gmail.com', NULL, '$2y$10$51tNqM.4tsF9Vdom9zUZtep7WFFH6qkN./ya1AqFuNN6jxvpzIqpu', NULL, NULL, '0FqY3NWYtIOWIih5JzDt7NKaXIJd6jiS4PO25ouzTA5qwYMkVmPuF2xxaij5', NULL, NULL, '2020-12-20 08:20:29', '2020-12-20 08:20:29');

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
(9, '2020-12-15 09:18:44', '2020-12-15 09:18:44', '8978', '67', NULL, 'Noida', 'Noida', '201009', 13, 1),
(10, '2020-12-15 11:15:31', '2020-12-15 11:15:31', NULL, NULL, NULL, NULL, NULL, NULL, 14, 1),
(11, '2020-12-15 11:52:27', '2020-12-15 11:52:27', NULL, NULL, NULL, 'Hno ', 'Moradabad', '244001', 15, 1),
(12, '2020-12-18 13:47:15', '2020-12-19 16:16:57', NULL, '2', '1234567890', '5445654', '65464', '123456', 16, 0),
(13, '2020-12-18 16:00:38', '2020-12-18 16:00:38', '788989686', '67868767867', NULL, '128/325 h block , kidwai nagar , kanpur', 'Moradabad', 'siddhant.singh326@gmail.com', 18, 1),
(14, '2020-12-20 08:20:29', '2020-12-20 08:20:29', NULL, NULL, NULL, 'Hno 93 Ballabh street, Mandi chowk', 'Moradabad', '244001', 19, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `balances`
--
ALTER TABLE `balances`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `default_packages`
--
ALTER TABLE `default_packages`
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
  ADD PRIMARY KEY (`fail_switch_detail_id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `default_packages`
--
ALTER TABLE `default_packages`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fail_switch_details`
--
ALTER TABLE `fail_switch_details`
  MODIFY `fail_switch_detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `fail_switch_masters`
--
ALTER TABLE `fail_switch_masters`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `ledgers`
--
ALTER TABLE `ledgers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `package_lists`
--
ALTER TABLE `package_lists`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `package_masters`
--
ALTER TABLE `package_masters`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `receive_credits`
--
ALTER TABLE `receive_credits`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `role_masters`
--
ALTER TABLE `role_masters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_add_bank_accounts`
--
ALTER TABLE `tbl_add_bank_accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_amount_filters`
--
ALTER TABLE `tbl_amount_filters`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_api_codes`
--
ALTER TABLE `tbl_api_codes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tbl_api_masters`
--
ALTER TABLE `tbl_api_masters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_cappings`
--
ALTER TABLE `tbl_cappings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `tbl_capping_details`
--
ALTER TABLE `tbl_capping_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `tbl_my_operators`
--
ALTER TABLE `tbl_my_operators`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_news`
--
ALTER TABLE `tbl_news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_recharge_categories`
--
ALTER TABLE `tbl_recharge_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_sms_apis`
--
ALTER TABLE `tbl_sms_apis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `user_details`
--
ALTER TABLE `user_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
