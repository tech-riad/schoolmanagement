-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 29, 2023 at 05:41 PM
-- Server version: 8.0.32
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `edtecobd_eims`
--

-- --------------------------------------------------------

--
-- Table structure for table `institution_packages`
--

CREATE TABLE `institution_packages` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(191) NOT NULL,
  `module_package_id` bigint UNSIGNED DEFAULT NULL,
  `student` int NOT NULL,
  `price` double(10,2) NOT NULL,
  `installation` double(10,2) NOT NULL,
  `duration` int NOT NULL,
  `trial_period` int NOT NULL,
  `status` enum('active','deactive') NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `institution_packages`
--

INSERT INTO `institution_packages` (`id`, `title`, `module_package_id`, `student`, `price`, `installation`, `duration`, `trial_period`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Package 1 (Teamx)', NULL, 500, 500.00, 100.00, 30, 15, 'active', '2022-12-30 21:56:44', '2022-12-30 21:56:44'),
(2, 'Package 2 (Teamx)', NULL, 1000, 1500.00, 5000.00, 30, 15, 'active', '2022-12-31 09:58:08', '2022-12-31 09:58:08'),
(3, 'Package (ST 0-200/Hamza)', NULL, 200, 500.00, 2000.00, 30, 7, 'active', '2023-01-01 23:18:27', '2023-01-01 23:18:27'),
(4, 'Package (ST 0-250/Hamza)', NULL, 250, 550.00, 2000.00, 30, 7, 'active', '2023-01-02 05:21:39', '2023-01-02 05:21:39'),
(5, 'Package (ST 0-300/Hamza)', NULL, 300, 600.00, 2000.00, 30, 7, 'active', '2023-01-02 05:23:23', '2023-01-02 05:23:23'),
(6, 'Package (ST 0-350/Hamza)', NULL, 350, 650.00, 2000.00, 30, 7, 'active', '2023-01-02 05:24:52', '2023-01-02 05:24:52'),
(7, 'Package (ST 0-400/Hamza)', NULL, 400, 700.00, 2000.00, 30, 7, 'active', '2023-01-02 11:30:55', '2023-01-02 11:30:55'),
(8, 'Package (ST 0-450 /Hamza)', NULL, 450, 725.00, 2000.00, 30, 7, 'active', '2023-01-02 11:34:02', '2023-01-02 11:34:02'),
(9, 'Package (ST 0-500 /Hamza)', NULL, 500, 750.00, 2000.00, 30, 7, 'active', '2023-01-02 11:35:02', '2023-01-02 11:35:02'),
(10, 'Package (ST 0-550 /Hamza)', NULL, 550, 775.00, 2000.00, 30, 7, 'active', '2023-01-02 11:36:30', '2023-01-02 11:36:30'),
(11, 'Package (ST 0-600 /Hamza)', NULL, 600, 800.00, 2000.00, 30, 7, 'active', '2023-01-02 11:38:05', '2023-01-02 11:38:05'),
(12, 'Package (ST 0-650 /Hamza)', NULL, 650, 825.00, 2000.00, 30, 7, 'active', '2023-01-02 11:38:54', '2023-01-02 11:38:54'),
(13, 'Package (ST 0-700 /Hamza)', NULL, 700, 850.00, 2000.00, 30, 7, 'active', '2023-01-02 11:40:03', '2023-01-02 11:40:03'),
(14, 'Package (ST 0-750 /Hamza)', NULL, 750, 900.00, 2000.00, 30, 7, 'active', '2023-01-02 11:40:52', '2023-01-02 11:40:52'),
(15, 'Package (ST 0-800 /Hamza)', NULL, 800, 1000.00, 2000.00, 30, 7, 'active', '2023-01-02 11:41:50', '2023-01-02 11:41:50'),
(16, 'Package (ST 0-900 /Hamza)', NULL, 900, 1100.00, 2000.00, 30, 7, 'active', '2023-01-02 11:42:34', '2023-01-02 11:42:34'),
(17, 'Package (ST 0-1000 /Hamza)', NULL, 1000, 1200.00, 2000.00, 30, 7, 'active', '2023-01-02 11:43:45', '2023-01-02 11:43:45'),
(18, 'Package (ST 0-1100 /Hamza)', NULL, 1100, 1400.00, 2000.00, 30, 7, 'active', '2023-01-02 11:44:46', '2023-01-02 11:44:46'),
(19, 'Package (ST 0-1200 /Hamza)', NULL, 1200, 1500.00, 2000.00, 30, 7, 'active', '2023-01-02 11:45:27', '2023-01-02 11:45:27'),
(20, 'Package (ST 0-1300 /Hamza)', NULL, 1200, 1650.00, 2000.00, 30, 7, 'active', '2023-01-02 11:46:05', '2023-01-02 11:46:05'),
(21, 'Package (ST 0-1400 /Hamza)', NULL, 1400, 1750.00, 2000.00, 30, 7, 'active', '2023-01-02 11:46:40', '2023-01-02 11:46:40'),
(22, 'Package (ST 0-1500 /Hamza)', NULL, 1500, 1850.00, 2000.00, 30, 7, 'active', '2023-01-02 11:47:32', '2023-01-02 11:47:32'),
(23, 'Package (ST 0-1600 /Hamza)', NULL, 1600, 2000.00, 2000.00, 30, 7, 'active', '2023-01-02 11:48:16', '2023-01-02 11:48:16'),
(24, 'Package (ST 0-1700 /Hamza)', NULL, 1700, 2100.00, 2000.00, 30, 7, 'active', '2023-01-02 11:49:01', '2023-01-02 11:49:01'),
(25, 'Package (ST 0-1700 /Hamza)', NULL, 1700, 2100.00, 2000.00, 30, 7, 'active', '2023-01-02 11:55:32', '2023-01-02 11:55:32'),
(26, 'Package (ST 0-1800 /Hamza)', NULL, 1800, 2200.00, 2000.00, 30, 7, 'active', '2023-01-02 11:56:11', '2023-01-02 11:56:11'),
(27, 'Package (ST 0-1900 /Hamza)', NULL, 1900, 2300.00, 2000.00, 30, 7, 'active', '2023-01-02 11:57:04', '2023-01-02 11:57:04'),
(28, 'Package (ST 0-2000 /Hamza)', NULL, 2000, 2400.00, 2000.00, 30, 7, 'active', '2023-01-02 11:58:02', '2023-01-02 11:58:02'),
(29, 'Package  (ST 0-200/M/AKLUS)', NULL, 200, 500.00, 3000.00, 30, 7, 'active', '2023-01-04 09:42:59', '2023-01-04 09:42:59'),
(30, 'Package  (ST 0-400/M/AKLUS)', NULL, 400, 800.00, 3000.00, 30, 7, 'active', '2023-01-04 09:43:29', '2023-01-04 09:43:29'),
(31, 'Package  (ST 0-800/M/AKLUS)', NULL, 800, 1200.00, 3000.00, 30, 7, 'active', '2023-01-04 09:43:56', '2023-01-04 09:43:56'),
(32, 'Package  (ST 0-1200/M/AKLUS)', NULL, 1200, 1500.00, 3000.00, 30, 7, 'active', '2023-01-04 09:44:57', '2023-01-04 09:44:57'),
(33, 'Package  (WEBSITE/Y/AKLUS)', NULL, 1000, 5000.00, 500.00, 360, 7, 'active', '2023-01-04 09:45:57', '2023-01-04 09:45:57'),
(34, 'Package (ST 0-200/Koyel)', NULL, 200, 500.00, 4000.00, 30, 7, 'active', '2023-01-09 03:11:46', '2023-01-09 03:11:46'),
(35, 'Package (ST 0-300/Koyel)', NULL, 300, 600.00, 4000.00, 30, 7, 'active', '2023-01-09 03:13:16', '2023-01-09 03:13:16'),
(36, 'Package (ST 0-400/Koyel)', NULL, 400, 800.00, 4000.00, 30, 7, 'active', '2023-01-09 03:14:33', '2023-01-09 03:14:33'),
(37, 'Package (ST 0-500/Koyel)', NULL, 500, 900.00, 4000.00, 30, 7, 'active', '2023-01-09 03:15:55', '2023-01-09 03:15:55'),
(38, 'Package (ST 0-600/Hamza)', NULL, 600, 1000.00, 4000.00, 30, 7, 'active', '2023-01-09 03:17:19', '2023-01-09 03:17:19'),
(39, 'Package (ST 0-700/Koyel)', NULL, 700, 1200.00, 4000.00, 30, 7, 'active', '2023-01-09 03:18:53', '2023-01-09 03:18:53'),
(40, 'Package (ST 0-800/Koyel)', NULL, 800, 1400.00, 4000.00, 30, 7, 'active', '2023-01-08 21:19:59', '2023-01-08 21:19:59'),
(41, 'Package (ST 0-1000/Koyel)', NULL, 1000, 1500.00, 4000.00, 30, 7, 'active', '2023-01-09 03:24:29', '2023-01-09 03:24:29'),
(42, 'Package (ST 0-1200/Koyel', NULL, 1200, 1800.00, 4000.00, 30, 7, 'active', '2023-01-09 03:25:50', '2023-01-09 03:25:50'),
(43, 'Package (ST 0-500/Koyel)', NULL, 500, 900.00, 0.00, 30, 7, 'active', '2023-01-08 21:27:52', '2023-01-08 21:27:52'),
(44, 'Special Package Running -(0-500/Koyel)', NULL, 500, 500.00, 100.00, 30, 7, 'active', '2023-01-08 15:32:05', '2023-01-08 15:32:05'),
(45, 'Special Garagonj (Package 0-700/Koyel', NULL, 700, 1200.00, 100.00, 30, 7, 'active', '2023-01-08 15:35:56', '2023-01-08 15:35:56'),
(46, 'Package (ST 0-200/Mehedi vai', NULL, 200, 500.00, 3000.00, 30, 7, 'active', '2023-01-09 03:41:10', '2023-01-09 03:41:10'),
(47, 'Package (ST 0-300/Mehedi vai )', NULL, 300, 600.00, 3000.00, 30, 7, 'active', '2023-01-09 03:58:32', '2023-01-09 03:58:32'),
(48, 'Package (ST 0-400/Mehedi Vai)', NULL, 400, 700.00, 3000.00, 30, 7, 'active', '2023-01-09 04:01:03', '2023-01-09 04:01:03'),
(49, 'Package (ST 0-500/Mehedi Vai)', NULL, 500, 750.00, 3000.00, 30, 7, 'active', '2023-01-09 04:01:53', '2023-01-09 04:01:53'),
(50, 'Package (ST 0-600/Mehedi Vai)', NULL, 600, 800.00, 3000.00, 30, 7, 'active', '2023-01-09 04:03:14', '2023-01-09 04:03:14'),
(51, 'Package (ST 0-700/Mehedi Vai)', NULL, 700, 850.00, 3000.00, 30, 7, 'active', '2023-01-09 04:04:00', '2023-01-09 04:04:00'),
(52, 'Package (ST 0-800/Mehedi Vai)', NULL, 800, 1000.00, 3000.00, 30, 7, 'active', '2023-01-09 04:19:33', '2023-01-09 04:19:33'),
(53, 'Package (ST 0-900/Mehedi Vai)', NULL, 900, 1100.00, 3000.00, 30, 7, 'active', '2023-01-09 04:21:59', '2023-01-09 04:21:59'),
(54, 'Package (ST 0-1000/Mehedi Vai)', NULL, 1000, 1200.00, 3000.00, 30, 7, 'active', '2023-01-09 04:22:48', '2023-01-09 04:22:48'),
(55, 'Package (ST 0-1100/Mehedi Vai)', NULL, 1100, 1400.00, 3000.00, 30, 7, 'active', '2023-01-08 22:23:59', '2023-01-08 22:23:59'),
(56, 'Package (ST 0-1200/Mehedi Vai)', NULL, 1200, 1500.00, 3000.00, 30, 7, 'active', '2023-01-08 22:24:45', '2023-01-08 22:24:45'),
(57, 'Yearly Package (ST 0-200/Hamza)', NULL, 200, 7000.00, 100.00, 360, 15, 'active', '2023-01-19 18:15:56', '2023-01-19 18:15:56'),
(58, 'Yearly Package (ST 0-300/Hamza)', NULL, 300, 7500.00, 100.00, 360, 15, 'active', '2023-01-19 18:19:24', '2023-01-19 18:19:24'),
(59, 'Yearly Package (ST 0-400/Hamza)', NULL, 400, 8400.00, 100.00, 360, 15, 'active', '2023-01-19 18:20:33', '2023-01-19 18:20:33'),
(60, 'Yearly Package (ST 0-500/Hamza)', NULL, 500, 9000.00, 100.00, 360, 15, 'active', '2023-01-19 18:21:26', '2023-01-19 18:21:26'),
(61, 'Yearly Package (ST 0-600/Hamza)', NULL, 600, 9600.00, 100.00, 360, 15, 'active', '2023-01-19 18:22:30', '2023-01-19 18:22:30'),
(62, 'Yearly Package (ST 0-700/Hamza)', NULL, 700, 10200.00, 100.00, 360, 15, 'active', '2023-01-19 18:23:30', '2023-01-19 18:23:30'),
(63, 'Yearly Package (ST 0-800/Hamza)', NULL, 800, 12000.00, 100.00, 360, 15, 'active', '2023-01-19 18:24:18', '2023-01-19 18:24:18'),
(64, 'Yearly Package (ST 0-900/Hamza)', NULL, 900, 12700.00, 100.00, 360, 15, 'active', '2023-01-19 18:26:08', '2023-01-19 18:26:08'),
(65, 'Yearly Package (ST 0-1000/Hamza)', NULL, 1000, 13900.00, 100.00, 360, 15, 'active', '2023-01-19 18:28:02', '2023-01-19 18:28:02'),
(66, 'Yearly Package (ST 0-1100/Hamza)', NULL, 1100, 16300.00, 100.00, 360, 15, 'active', '2023-01-19 18:29:49', '2023-01-19 18:29:49'),
(67, 'Transfer Package (ST 0-200/Hamza)', NULL, 200, 500.00, 100.00, 30, 15, 'active', '2023-01-19 14:26:11', '2023-01-19 14:26:11'),
(68, 'Transfer Package (ST 0-300/Hamza)', NULL, 300, 600.00, 100.00, 30, 15, 'active', '2023-01-19 20:27:12', '2023-01-19 20:27:12'),
(69, 'Transfer Package (ST 0-400/Hamza)', NULL, 400, 700.00, 100.00, 30, 15, 'active', '2023-01-19 20:28:53', '2023-01-19 20:28:53'),
(70, 'Transfer Package (ST 0-500/Hamza)', NULL, 500, 750.00, 100.00, 30, 15, 'active', '2023-01-19 20:29:58', '2023-01-19 20:29:58'),
(71, 'Transfer Package (ST 0-600/Hamza)', NULL, 600, 800.00, 100.00, 30, 15, 'active', '2023-01-19 20:31:07', '2023-01-19 20:31:07'),
(72, 'Transfer Package (ST 0-700/Hamza)', NULL, 700, 850.00, 100.00, 30, 15, 'active', '2023-01-19 20:31:54', '2023-01-19 20:31:54');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `institution_packages`
--
ALTER TABLE `institution_packages`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `institution_packages`
--
ALTER TABLE `institution_packages`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
