-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 17, 2024 at 12:49 AM
-- Server version: 8.0.36
-- PHP Version: 8.1.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wafgroup_mex`
--

-- --------------------------------------------------------

--
-- Table structure for table `bank_deposits`
--

CREATE TABLE `bank_deposits` (
  `id` bigint UNSIGNED NOT NULL,
  `deposit_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deposit_date` date NOT NULL,
  `depositor_id` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `depositor_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `depositor_mobile_no` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bank_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `depositor_description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `depositor_nid_no` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deposit_amount` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bank_deposits`
--

INSERT INTO `bank_deposits` (`id`, `deposit_type`, `deposit_date`, `depositor_id`, `depositor_name`, `depositor_mobile_no`, `bank_name`, `depositor_description`, `depositor_nid_no`, `deposit_amount`, `created_at`, `updated_at`) VALUES
(1, 'Bank', '2024-03-04', 'wg-123', 'Ali', '32141234', 'ab bank', NULL, NULL, 20000, '2024-03-06 03:28:07', '2024-03-06 03:28:07'),
(2, 'Bank', '2024-03-05', '234232', 'sdsfsa', '23424231', 'sdfgsg', 'sdfgf', '3452345', 5555, '2024-03-06 03:28:33', '2024-03-06 03:28:33');

-- --------------------------------------------------------

--
-- Table structure for table `bkash_deposits`
--

CREATE TABLE `bkash_deposits` (
  `id` bigint UNSIGNED NOT NULL,
  `deposit_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deposit_date` date NOT NULL,
  `depositor_id` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `depositor_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deposit_mobile_no` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `txid_no` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `depositor_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `depositor_nid_no` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deposit_amount` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bkash_deposits`
--

INSERT INTO `bkash_deposits` (`id`, `deposit_type`, `deposit_date`, `depositor_id`, `depositor_name`, `deposit_mobile_no`, `txid_no`, `depositor_address`, `depositor_nid_no`, `deposit_amount`, `created_at`, `updated_at`) VALUES
(1, 'bkash', '2024-03-06', '2231', 'sdsfsa', '234234', 'werw42323', 'r4r', '234234243', 332, '2024-03-06 04:05:00', '2024-03-06 04:05:00'),
(2, 'nagad', '2024-03-03', 'kk-1103', 'Humayun', '013143819191', 'kk-112233', NULL, NULL, 5000, '2024-03-06 04:07:02', '2024-03-06 04:07:02');

-- --------------------------------------------------------

--
-- Table structure for table `cash_deposits`
--

CREATE TABLE `cash_deposits` (
  `id` bigint UNSIGNED NOT NULL,
  `deposit_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deposit_date` date NOT NULL,
  `depositor_id` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `depositor_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `depositor_mobile_no` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `depositor_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `depositor_nid_no` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deposit_amount` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cash_deposits`
--

INSERT INTO `cash_deposits` (`id`, `deposit_type`, `deposit_date`, `depositor_id`, `depositor_name`, `depositor_mobile_no`, `depositor_address`, `depositor_nid_no`, `deposit_amount`, `created_at`, `updated_at`) VALUES
(1, 'Cash', '2024-03-05', 'wg-123', 'Ali', '1231214', 'wefwe', '32412', 3000, '2024-03-06 01:50:13', '2024-03-06 01:50:13'),
(2, 'Cash', '2024-03-07', '2231', 'Ali', '234242', 'rrwea', '3432', 5000, '2024-03-06 01:51:37', '2024-03-06 01:51:37'),
(3, 'Cash', '2024-03-10', 'ali-123', 'Ali', '123132', NULL, NULL, 10000, '2024-03-11 20:16:14', '2024-03-11 20:16:14');

-- --------------------------------------------------------

--
-- Table structure for table `expense_cats`
--

CREATE TABLE `expense_cats` (
  `expense_category_id` int UNSIGNED NOT NULL,
  `expense_category_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `expense_cats`
--

INSERT INTO `expense_cats` (`expense_category_id`, `expense_category_name`, `created_at`, `updated_at`) VALUES
(1, 'Rent', NULL, NULL),
(2, 'Transport', NULL, NULL),
(6, 'Guest', NULL, NULL),
(8, 'Bill', NULL, NULL),
(9, 'Office', NULL, NULL),
(10, 'House', NULL, NULL),
(11, 'Tour', NULL, NULL),
(12, 'Marketing', NULL, NULL);

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
-- Table structure for table `marketingexpenses`
--

CREATE TABLE `marketingexpenses` (
  `id` bigint UNSIGNED NOT NULL,
  `marketing_expense_date` date NOT NULL,
  `expense_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `marketing_expense_description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `marketing_expense_amount` double NOT NULL,
  `staff_id` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `marketingexpenses`
--

INSERT INTO `marketingexpenses` (`id`, `marketing_expense_date`, `expense_name`, `marketing_expense_description`, `marketing_expense_amount`, `staff_id`, `created_at`, `updated_at`) VALUES
(1, '2024-03-05', 'saada', 'sdsdsdf', 213, 123, NULL, NULL),
(4, '2024-03-06', 'kka', 'wfqwef', 3223, 111, NULL, NULL),
(5, '2024-03-06', 'kka', 'wfqwef', 3223, 111, NULL, NULL),
(6, '2024-03-06', 'sasas', 'dfasf', 4324, 123, NULL, NULL),
(7, '2024-02-29', 'fefser', 'gfdsgs', 243, 1212, NULL, NULL),
(8, '2024-03-04', 'aasdads', NULL, 32321, 123, NULL, NULL);

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
(9, '2024_02_27_115111_create_officeexpense_table', 4),
(12, '2014_10_12_000000_create_users_table', 5),
(13, '2014_10_12_100000_create_password_reset_tokens_table', 5),
(14, '2019_08_19_000000_create_failed_jobs_table', 5),
(15, '2019_12_14_000001_create_personal_access_tokens_table', 5),
(16, '2024_02_18_161440_create_staff_table', 5),
(17, '2024_02_27_102328_create_expense_cats_table', 5),
(18, '2024_02_27_115111_create_officeexpenses_table', 5),
(19, '2024_03_05_152349_create_marketingexpenses_table', 6),
(22, '2024_03_05_190031_create_staff_loans_table', 7),
(23, '2024_03_05_203154_create_others_loans_table', 8),
(24, '2024_03_06_070832_create_cash_deposits_table', 9),
(25, '2024_03_06_080004_create_bank_deposits_table', 10),
(27, '2024_03_06_094217_create_bkash_deposits_table', 11);

-- --------------------------------------------------------

--
-- Table structure for table `officeexpenses`
--

CREATE TABLE `officeexpenses` (
  `id` bigint UNSIGNED NOT NULL,
  `expense_date` date NOT NULL,
  `expense_category` int DEFAULT NULL,
  `expense_category_id` int NOT NULL,
  `expense_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `office_expense_description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `office_expense_amount` double NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `officeexpenses`
--

INSERT INTO `officeexpenses` (`id`, `expense_date`, `expense_category`, `expense_category_id`, `expense_name`, `office_expense_description`, `office_expense_amount`, `created_at`, `updated_at`) VALUES
(1, '2024-03-05', NULL, 1, 'adsdas', 'fsdfsdf', 100, NULL, NULL),
(6, '2024-03-01', NULL, 6, 'Lunch', 'Guest lunch', 1000, NULL, NULL),
(7, '2024-03-10', NULL, 8, 'Electric bill', 'office of electric bill', 5900, NULL, NULL),
(8, '2024-03-01', NULL, 1, 'eqwer', 'sfdd', 3123, NULL, NULL),
(9, '2024-03-06', NULL, 1, 'office rent', 'fsdfsfas', 200000, NULL, NULL),
(10, '2024-03-04', NULL, 2, 'ffadf', NULL, 324234, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `others_loans`
--

CREATE TABLE `others_loans` (
  `id` bigint UNSIGNED NOT NULL,
  `loan_date` date NOT NULL,
  `loan_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `loan_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `loan_reference` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `loan_description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `loan_amount` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `others_loans`
--

INSERT INTO `others_loans` (`id`, `loan_date`, `loan_name`, `loan_address`, `loan_reference`, `loan_description`, `loan_amount`, `created_at`, `updated_at`) VALUES
(1, '2024-03-06', 'dwed', 'asdasd', 'adada', 'dsad', 2344243, NULL, NULL),
(2, '2024-03-05', 'Lopa', NULL, 'Kalam', NULL, 100, NULL, NULL);

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
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `id` bigint UNSIGNED NOT NULL,
  `staff_id` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `staff_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `staff_mobile_no` char(16) COLLATE utf8mb4_unicode_ci NOT NULL,
  `staff_address` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `staff_nid_no` char(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `staff_email_address` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `staff_salary_amount` double NOT NULL DEFAULT '0',
  `staff_picture` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id`, `staff_id`, `staff_name`, `staff_mobile_no`, `staff_address`, `staff_nid_no`, `staff_email_address`, `staff_salary_amount`, `staff_picture`, `created_at`, `updated_at`) VALUES
(1, '123', 'kabir', '01314381919', 'Begumgonj', '1231231', 'shamil1103@gmail.com', 1000, NULL, '2024-03-03 13:09:51', '2024-03-03 13:09:51'),
(2, '111', 'shamil', '01899090909', 'dhaka', '12233', 'admin@admin.com', 200000, NULL, '2024-03-04 05:45:14', '2024-03-04 05:45:14'),
(3, 'Akash-100', 'Akash', '098809', 'wdw', '234123', 'fsdf@dfgf', 30000, NULL, '2024-03-05 12:38:11', '2024-03-05 12:38:11'),
(4, '1212', 'Amir-1212', '12331331', 'dfsfsfds', '3423434', 'admin@gmail.com', 20000, NULL, '2024-03-05 14:16:31', '2024-03-05 14:16:31'),
(5, 'ali-123', 'Ali', '121313231', NULL, NULL, NULL, 2000, NULL, '2024-03-06 00:40:05', '2024-03-06 00:40:05'),
(6, '1134', 'fgsf', '34254524', NULL, NULL, NULL, 345, NULL, '2024-03-06 22:48:59', '2024-03-06 22:48:59'),
(7, 'D-09', 'Rumi', '9087968', 'regwegre', '4352352', 'admin@admin', 5000000, NULL, '2024-03-06 22:52:05', '2024-03-06 22:52:05');

-- --------------------------------------------------------

--
-- Table structure for table `staff_loans`
--

CREATE TABLE `staff_loans` (
  `id` bigint UNSIGNED NOT NULL,
  `staff_loan_date` date NOT NULL,
  `staff_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `staff_loan_description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `staff_leader_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `staff_loan_amount` double NOT NULL,
  `staff_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `staff_loans`
--

INSERT INTO `staff_loans` (`id`, `staff_loan_date`, `staff_address`, `staff_loan_description`, `staff_leader_name`, `staff_loan_amount`, `staff_id`, `created_at`, `updated_at`) VALUES
(1, '2024-03-01', 'ddfsf', 'weqwe', 'sdf', 21412, 'Akash-100', NULL, NULL),
(2, '2024-03-07', 'dsadasd', 'sdasdadfs', 'khan', 2222, '111', NULL, NULL),
(3, '2024-03-05', NULL, NULL, 'ssdf', 23423, '1212', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Humayun kabir', 'shamil1103@gmail.com', NULL, '$2y$12$cfoYaUF.nBdy47phFp4n8Oao0xnPN5lP6QBsDSybM2KYqQUk6pIdu', NULL, '2024-03-03 11:38:21', '2024-03-03 11:38:21'),
(4, 'Kabir', 'kabir1103@gmail.com', NULL, '$2y$12$6O8XjCG4y63JTQr67wnHe.Sp8JiaUUNP6lfY83BaO01Cgr0bVS2JC', NULL, '2024-03-11 20:27:42', '2024-03-11 20:27:42'),
(5, 'Wafgroup', 'wafgroup@gmail.com', NULL, '$2y$12$RX7evhO3UqBWN4J20sS47ee91lRTNT7rEsagK/k.d7gfUm9oib.qa', NULL, '2024-03-12 00:33:46', '2024-03-12 00:33:46');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bank_deposits`
--
ALTER TABLE `bank_deposits`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `bank_deposits_depositor_id_unique` (`depositor_id`),
  ADD UNIQUE KEY `bank_deposits_depositor_mobile_no_unique` (`depositor_mobile_no`);

--
-- Indexes for table `bkash_deposits`
--
ALTER TABLE `bkash_deposits`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `bkash_deposits_depositor_id_unique` (`depositor_id`),
  ADD UNIQUE KEY `bkash_deposits_deposit_mobile_no_unique` (`deposit_mobile_no`),
  ADD UNIQUE KEY `bkash_deposits_txid_no_unique` (`txid_no`);

--
-- Indexes for table `cash_deposits`
--
ALTER TABLE `cash_deposits`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cash_deposits_depositor_id_unique` (`depositor_id`),
  ADD UNIQUE KEY `cash_deposits_depositor_mobile_no_unique` (`depositor_mobile_no`);

--
-- Indexes for table `expense_cats`
--
ALTER TABLE `expense_cats`
  ADD PRIMARY KEY (`expense_category_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `marketingexpenses`
--
ALTER TABLE `marketingexpenses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `officeexpenses`
--
ALTER TABLE `officeexpenses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `others_loans`
--
ALTER TABLE `others_loans`
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
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `staff_staff_id_unique` (`staff_id`),
  ADD UNIQUE KEY `staff_staff_mobile_no_unique` (`staff_mobile_no`),
  ADD UNIQUE KEY `staff_staff_nid_no_unique` (`staff_nid_no`);

--
-- Indexes for table `staff_loans`
--
ALTER TABLE `staff_loans`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `bank_deposits`
--
ALTER TABLE `bank_deposits`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `bkash_deposits`
--
ALTER TABLE `bkash_deposits`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cash_deposits`
--
ALTER TABLE `cash_deposits`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `expense_cats`
--
ALTER TABLE `expense_cats`
  MODIFY `expense_category_id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `marketingexpenses`
--
ALTER TABLE `marketingexpenses`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `officeexpenses`
--
ALTER TABLE `officeexpenses`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `others_loans`
--
ALTER TABLE `others_loans`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `staff_loans`
--
ALTER TABLE `staff_loans`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
