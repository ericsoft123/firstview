-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 14, 2018 at 04:16 AM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `firstview`
--

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `id` int(10) UNSIGNED NOT NULL,
  `company_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'none',
  `company_email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'none',
  `company_website` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'none',
  `company_logo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'none',
  `company_desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_model` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'none',
  `rand_value` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'none',
  `creator_username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'none',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_11_03_124808_create_companies_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'noname',
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'noname',
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'noname',
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address-country` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'noname',
  `cell` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'noname',
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'noname',
  `bank_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'none',
  `account_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `branch_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `btc_address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'none',
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'noname',
  `password_decode` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'noname',
  `creator_status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'none',
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'none',
  `platform` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'none',
  `company_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'none',
  `compaign_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'none',
  `rand_startdate` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'none',
  `rand_enddate` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'none',
  `btc_startdate` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'none',
  `btc_enddate` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'none',
  `rand_payme` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `btc_payme` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `rand_invest` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `btc_invest` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `registration_charge` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'none',
  `btc_charge` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'none',
  `internal_wallet` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'none',
  `bitcoin_address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'none',
  `userapi_avabtc` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `first_name`, `last_name`, `username`, `address-country`, `cell`, `email`, `bank_name`, `account_number`, `branch_code`, `btc_address`, `password`, `password_decode`, `creator_status`, `status`, `platform`, `company_name`, `compaign_name`, `rand_startdate`, `rand_enddate`, `btc_startdate`, `btc_enddate`, `rand_payme`, `btc_payme`, `rand_invest`, `btc_invest`, `registration_charge`, `btc_charge`, `internal_wallet`, `bitcoin_address`, `userapi_avabtc`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'super', 'noname', 'noname', 'super', 'noname', 'noname', 'super@gmail.com', 'none', '0', '0', 'none', '$2y$10$7rO9fZxwyHRPCPW8n7XRlensp2M.V01GTrDoxtepAAFTjgYmqmDpK', '$2y$10$HjPENVCqalzEYddBcVmZZOJEoZkqIpIa23kjGLOOI1bqK3kbqkXg.', 'none', 'none', 'none', 'none', 'none', 'none', 'none', 'none', 'none', '0', '0', '0', '0', 'none', 'none', 'none', 'none', '0', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
