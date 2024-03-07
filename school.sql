-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 14, 2022 at 06:42 AM
-- Server version: 5.7.33
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `school`
--

-- --------------------------------------------------------

--
-- Table structure for table `account_employee_salaries`
--

CREATE TABLE `account_employee_salaries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` int(11) NOT NULL COMMENT 'employee_id = user_id',
  `date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `account_employee_salaries`
--

INSERT INTO `account_employee_salaries` (`id`, `employee_id`, `date`, `amount`, `created_at`, `updated_at`) VALUES
(1, 22, '2022-01', 16000, '2022-01-07 07:38:54', '2022-01-07 07:38:54'),
(2, 23, '2022-01', 21500, '2022-01-07 07:38:54', '2022-01-07 07:38:54'),
(3, 24, '2022-01', 19333.333333333, '2022-01-07 07:38:54', '2022-01-07 07:38:54');

-- --------------------------------------------------------

--
-- Table structure for table `account_other_costs`
--

CREATE TABLE `account_other_costs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` date DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `account_other_costs`
--

INSERT INTO `account_other_costs` (`id`, `date`, `amount`, `description`, `image`, `created_at`, `updated_at`) VALUES
(1, '2022-01-07', 1500, 'Purchased Blank Papers', '202201071427paper_111691001.jpg', '2022-01-07 09:27:51', '2022-01-07 09:27:51'),
(2, '2022-01-01', 700, 'Printed Date Sheets', '202201071506date-sheet-design-template-70a1c1952f8d6d81db50a3aca561661f_screen.jpg', '2022-01-07 09:40:47', '2022-01-07 10:06:50'),
(3, '2022-01-11', 700, 'Papers', '20220111153321294.png', '2022-01-11 10:33:26', '2022-01-11 10:33:26');

-- --------------------------------------------------------

--
-- Table structure for table `account_student_fees`
--

CREATE TABLE `account_student_fees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `year_id` int(11) DEFAULT NULL,
  `class_id` int(11) DEFAULT NULL,
  `student_id` int(11) DEFAULT NULL,
  `fee_category_id` int(11) DEFAULT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `account_student_fees`
--

INSERT INTO `account_student_fees` (`id`, `year_id`, `class_id`, `student_id`, `fee_category_id`, `date`, `amount`, `created_at`, `updated_at`) VALUES
(2, 7, 7, 4, 3, '2022-01', 450, '2022-01-06 10:08:01', '2022-01-06 10:08:01'),
(5, 7, 16, 16, 2, '2022-01', 2250, '2022-01-06 10:16:41', '2022-01-06 10:16:41'),
(6, 7, 16, 21, 2, '2022-01', 2375, '2022-01-06 10:16:41', '2022-01-06 10:16:41'),
(7, 8, 16, 26, 1, '2022-01', 1785, '2022-01-07 12:51:27', '2022-01-07 12:51:27'),
(8, 7, 7, 4, 2, '2021-12', 900, '2022-01-10 05:18:21', '2022-01-10 05:18:21'),
(10, 8, 16, 27, 2, '2022-01', 2375, '2022-01-11 10:32:28', '2022-01-11 10:32:28');

-- --------------------------------------------------------

--
-- Table structure for table `assign_students`
--

CREATE TABLE `assign_students` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` int(11) NOT NULL COMMENT 'user_id=student_id',
  `roll` int(11) DEFAULT NULL,
  `class_id` int(11) NOT NULL,
  `year_id` int(11) NOT NULL,
  `group_id` int(11) DEFAULT NULL,
  `shift_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `assign_students`
--

INSERT INTO `assign_students` (`id`, `student_id`, `roll`, `class_id`, `year_id`, `group_id`, `shift_id`, `created_at`, `updated_at`) VALUES
(1, 4, 1, 7, 7, 1, 1, '2021-12-20 05:43:51', '2021-12-21 07:20:37'),
(2, 5, 1, 8, 7, 1, 1, '2021-12-20 05:53:37', '2022-01-08 11:31:33'),
(3, 6, 2, 7, 7, 1, 1, '2021-12-20 05:58:56', '2021-12-21 07:20:37'),
(4, 7, NULL, 9, 5, 1, 2, '2021-12-20 06:00:51', '2021-12-20 06:00:51'),
(5, 8, NULL, 14, 5, 1, 1, '2021-12-20 06:04:16', '2021-12-20 06:04:16'),
(6, 9, NULL, 10, 6, 2, 3, '2021-12-20 06:05:59', '2021-12-20 06:05:59'),
(7, 10, 3, 7, 7, 1, 1, '2021-12-20 06:07:53', '2021-12-21 07:20:37'),
(8, 11, 1, 9, 3, 1, 2, '2021-12-20 06:10:33', '2021-12-21 09:11:43'),
(9, 12, 4, 7, 7, 1, 1, '2021-12-20 06:13:06', '2021-12-21 07:20:37'),
(10, 13, NULL, 16, 3, 1, 1, '2021-12-20 06:15:43', '2021-12-20 06:15:43'),
(11, 14, NULL, 11, 6, 2, 2, '2021-12-20 06:17:13', '2021-12-20 06:17:13'),
(12, 15, 1, 7, 1, 1, 1, '2021-12-20 06:56:41', '2021-12-22 11:58:34'),
(13, 16, 1, 16, 7, 1, 1, '2021-12-20 06:59:58', '2021-12-23 08:52:37'),
(14, 15, NULL, 8, 2, 1, 1, '2021-12-20 11:24:50', '2021-12-20 11:24:50'),
(15, 17, NULL, 16, 6, 1, 1, '2021-12-20 11:31:37', '2021-12-20 11:32:26'),
(16, 17, NULL, 15, 7, 1, 1, '2021-12-20 11:32:00', '2021-12-20 11:32:00'),
(17, 17, 2, 16, 7, 1, 1, '2021-12-20 11:33:42', '2021-12-23 08:52:37'),
(18, 15, 2, 9, 3, 1, 1, '2021-12-21 09:10:40', '2021-12-21 09:11:43'),
(19, 18, 1, 15, 6, 2, 1, '2021-12-22 11:16:08', '2021-12-23 08:50:53'),
(20, 18, 3, 16, 7, 2, 1, '2021-12-22 11:16:36', '2021-12-23 08:52:37'),
(21, 20, 4, 16, 7, 1, 2, '2021-12-23 08:47:36', '2021-12-23 08:52:37'),
(22, 21, 2, 15, 6, 1, 1, '2021-12-23 08:49:29', '2021-12-23 11:41:47'),
(23, 21, 5, 16, 7, 2, 1, '2021-12-23 08:50:08', '2021-12-23 08:52:37'),
(24, 15, NULL, 10, 4, 1, 1, '2022-01-04 09:17:08', '2022-01-04 09:17:08'),
(25, 26, 1, 16, 8, 1, 1, '2022-01-07 12:48:22', '2022-01-07 12:49:12'),
(26, 27, 1, 15, 7, 1, 1, '2022-01-11 10:18:51', '2022-01-11 10:20:00'),
(27, 27, NULL, 16, 8, 1, 1, '2022-01-11 10:20:39', '2022-01-11 10:20:39');

-- --------------------------------------------------------

--
-- Table structure for table `assign_subjects`
--

CREATE TABLE `assign_subjects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `class_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `full_mark` double NOT NULL,
  `pass_mark` double NOT NULL,
  `subjective_mark` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `assign_subjects`
--

INSERT INTO `assign_subjects` (`id`, `class_id`, `subject_id`, `full_mark`, `pass_mark`, `subjective_mark`, `created_at`, `updated_at`) VALUES
(37, 7, 1, 100, 40, 70, '2021-12-18 08:02:05', '2021-12-18 08:02:05'),
(38, 7, 2, 100, 50, 70, '2021-12-18 08:02:05', '2021-12-18 08:02:05'),
(39, 7, 3, 75, 30, 50, '2021-12-18 08:02:05', '2021-12-18 08:02:05'),
(40, 7, 4, 75, 25, 50, '2021-12-18 08:02:05', '2021-12-18 08:02:05'),
(41, 7, 10, 75, 25, 50, '2021-12-18 08:02:05', '2021-12-18 08:02:05'),
(42, 7, 11, 75, 25, 50, '2021-12-18 08:02:05', '2021-12-18 08:02:05'),
(43, 8, 1, 100, 33, 70, '2021-12-18 08:02:34', '2021-12-18 08:02:34'),
(44, 8, 2, 100, 33, 70, '2021-12-18 08:02:34', '2021-12-18 08:02:34'),
(45, 8, 3, 100, 33, 70, '2021-12-18 08:02:34', '2021-12-18 08:02:34'),
(46, 8, 4, 75, 25, 50, '2021-12-18 08:02:34', '2021-12-18 08:02:34'),
(47, 8, 10, 75, 25, 50, '2021-12-18 08:02:34', '2021-12-18 08:02:34'),
(48, 8, 11, 75, 25, 50, '2021-12-18 08:02:35', '2021-12-18 08:02:35'),
(49, 9, 1, 100, 40, 70, '2021-12-18 08:03:41', '2021-12-18 08:03:41'),
(50, 9, 2, 100, 40, 70, '2021-12-18 08:03:41', '2021-12-18 08:03:41'),
(51, 9, 3, 100, 40, 70, '2021-12-18 08:03:41', '2021-12-18 08:03:41'),
(52, 9, 4, 100, 40, 50, '2021-12-18 08:03:41', '2021-12-18 08:03:41'),
(53, 9, 10, 75, 25, 50, '2021-12-18 08:03:41', '2021-12-18 08:03:41'),
(54, 9, 11, 75, 25, 50, '2021-12-18 08:03:41', '2021-12-18 08:03:41'),
(55, 10, 1, 100, 40, 70, '2021-12-23 08:45:26', '2021-12-23 08:45:26'),
(56, 10, 2, 100, 40, 70, '2021-12-23 08:45:26', '2021-12-23 08:45:26'),
(57, 10, 3, 100, 40, 70, '2021-12-23 08:45:26', '2021-12-23 08:45:26'),
(58, 11, 1, 100, 40, 70, '2022-01-11 10:15:36', '2022-01-11 10:15:36'),
(59, 11, 2, 100, 40, 70, '2022-01-11 10:15:37', '2022-01-11 10:15:37'),
(60, 11, 3, 100, 40, 70, '2022-01-11 10:15:37', '2022-01-11 10:15:37'),
(61, 11, 4, 100, 40, 70, '2022-01-11 10:15:37', '2022-01-11 10:15:37');

-- --------------------------------------------------------

--
-- Table structure for table `designations`
--

CREATE TABLE `designations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `designations`
--

INSERT INTO `designations` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Head Teacher', '2021-12-16 08:07:46', '2021-12-16 08:07:46'),
(2, 'Assistant Teacher', '2021-12-16 08:08:45', '2021-12-16 08:08:45'),
(4, 'Teacher', '2021-12-16 08:17:25', '2021-12-16 08:17:25');

-- --------------------------------------------------------

--
-- Table structure for table `discount_students`
--

CREATE TABLE `discount_students` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `assign_student_id` int(11) NOT NULL,
  `fee_category_id` int(11) DEFAULT NULL,
  `discount` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `discount_students`
--

INSERT INTO `discount_students` (`id`, `assign_student_id`, `fee_category_id`, `discount`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 10, '2021-12-20 05:43:51', '2021-12-20 05:43:51'),
(2, 2, 1, 12, '2021-12-20 05:53:37', '2021-12-20 05:53:37'),
(3, 3, 1, 7, '2021-12-20 05:58:56', '2021-12-20 11:03:41'),
(4, 4, 1, NULL, '2021-12-20 06:00:51', '2021-12-20 06:00:51'),
(5, 5, 1, NULL, '2021-12-20 06:04:16', '2021-12-20 06:04:16'),
(6, 6, 1, NULL, '2021-12-20 06:05:59', '2021-12-20 06:05:59'),
(7, 7, 1, 5, '2021-12-20 06:07:53', '2021-12-20 06:07:53'),
(8, 8, 1, NULL, '2021-12-20 06:10:33', '2021-12-20 06:10:33'),
(9, 9, 1, NULL, '2021-12-20 06:13:06', '2021-12-20 06:13:06'),
(10, 10, 1, 5, '2021-12-20 06:15:43', '2021-12-20 06:15:43'),
(11, 11, 1, NULL, '2021-12-20 06:17:13', '2021-12-20 06:17:13'),
(12, 12, 1, NULL, '2021-12-20 06:56:41', '2021-12-20 06:56:41'),
(13, 13, 1, 10, '2021-12-20 06:59:58', '2021-12-20 06:59:58'),
(14, 14, 1, 5, '2021-12-20 11:24:50', '2021-12-20 11:24:50'),
(15, 15, 1, 10, '2021-12-20 11:31:37', '2021-12-20 11:31:37'),
(16, 16, 1, 10, '2021-12-20 11:32:00', '2021-12-20 11:32:00'),
(17, 17, 1, 10, '2021-12-20 11:33:42', '2021-12-20 11:33:42'),
(18, 18, 1, NULL, '2021-12-21 09:10:40', '2021-12-21 09:10:40'),
(19, 19, 1, 10, '2021-12-22 11:16:08', '2021-12-22 11:16:08'),
(20, 20, 1, 10, '2021-12-22 11:16:36', '2021-12-22 11:16:36'),
(21, 21, 1, 10, '2021-12-23 08:47:36', '2021-12-23 08:47:36'),
(22, 22, 1, 5, '2021-12-23 08:49:29', '2021-12-23 08:49:29'),
(23, 23, 1, 5, '2021-12-23 08:50:08', '2021-12-23 08:50:08'),
(24, 24, 1, NULL, '2022-01-04 09:17:08', '2022-01-04 09:17:08'),
(25, 25, 1, 15, '2022-01-07 12:48:22', '2022-01-07 12:48:22'),
(26, 26, 1, 5, '2022-01-11 10:18:51', '2022-01-11 10:18:51'),
(27, 27, 1, 5, '2022-01-11 10:20:39', '2022-01-11 10:20:39');

-- --------------------------------------------------------

--
-- Table structure for table `employee_attendances`
--

CREATE TABLE `employee_attendances` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` int(11) NOT NULL COMMENT 'employee_id = user_id',
  `date` date NOT NULL,
  `attend_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employee_attendances`
--

INSERT INTO `employee_attendances` (`id`, `employee_id`, `date`, `attend_status`, `created_at`, `updated_at`) VALUES
(1, 22, '2021-12-27', 'Leave', '2021-12-28 09:15:59', '2021-12-28 09:15:59'),
(2, 23, '2021-12-27', 'Present', '2021-12-28 09:15:59', '2021-12-28 09:15:59'),
(3, 24, '2021-12-27', 'Present', '2021-12-28 09:15:59', '2021-12-28 09:15:59'),
(4, 25, '2021-12-27', 'Absent', '2021-12-28 09:15:59', '2021-12-28 09:15:59'),
(13, 22, '2021-12-26', 'Present', '2021-12-28 09:39:30', '2021-12-28 09:39:30'),
(14, 23, '2021-12-26', 'Present', '2021-12-28 09:39:30', '2021-12-28 09:39:30'),
(15, 24, '2021-12-26', 'Present', '2021-12-28 09:39:30', '2021-12-28 09:39:30'),
(16, 25, '2021-12-26', 'Present', '2021-12-28 09:39:30', '2021-12-28 09:39:30'),
(17, 22, '2021-12-28', 'Leave', '2021-12-28 09:44:24', '2021-12-28 09:44:24'),
(18, 23, '2021-12-28', 'Present', '2021-12-28 09:44:24', '2021-12-28 09:44:24'),
(19, 24, '2021-12-28', 'Absent', '2021-12-28 09:44:24', '2021-12-28 09:44:24'),
(20, 25, '2021-12-28', 'Absent', '2021-12-28 09:44:24', '2021-12-28 09:44:24'),
(29, 22, '2021-12-24', 'Leave', '2021-12-28 10:43:41', '2021-12-28 10:43:41'),
(30, 23, '2021-12-24', 'Present', '2021-12-28 10:43:41', '2021-12-28 10:43:41'),
(31, 24, '2021-12-24', 'Present', '2021-12-28 10:43:41', '2021-12-28 10:43:41'),
(32, 25, '2021-12-24', 'Absent', '2021-12-28 10:43:41', '2021-12-28 10:43:41'),
(33, 22, '2022-01-04', 'Leave', '2022-01-04 09:22:26', '2022-01-04 09:22:26'),
(34, 23, '2022-01-04', 'Present', '2022-01-04 09:22:26', '2022-01-04 09:22:26'),
(35, 24, '2022-01-04', 'Absent', '2022-01-04 09:22:26', '2022-01-04 09:22:26'),
(36, 25, '2022-01-04', 'Present', '2022-01-04 09:22:26', '2022-01-04 09:22:26'),
(37, 22, '2022-01-11', 'Present', '2022-01-11 10:27:34', '2022-01-11 10:27:34'),
(38, 23, '2022-01-11', 'Absent', '2022-01-11 10:27:35', '2022-01-11 10:27:35'),
(39, 24, '2022-01-11', 'Present', '2022-01-11 10:27:35', '2022-01-11 10:27:35'),
(40, 25, '2022-01-11', 'Leave', '2022-01-11 10:27:35', '2022-01-11 10:27:35'),
(41, 28, '2022-01-11', 'Present', '2022-01-11 10:27:35', '2022-01-11 10:27:35');

-- --------------------------------------------------------

--
-- Table structure for table `employee_leaves`
--

CREATE TABLE `employee_leaves` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` int(11) NOT NULL COMMENT 'employee_id=user_id',
  `leave_purpose_id` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employee_leaves`
--

INSERT INTO `employee_leaves` (`id`, `employee_id`, `leave_purpose_id`, `start_date`, `end_date`, `created_at`, `updated_at`) VALUES
(1, 22, 3, '2021-12-28', '2021-12-31', '2021-12-28 06:31:18', '2021-12-28 06:52:32'),
(3, 24, 2, '2021-12-28', '2021-12-29', '2021-12-28 07:01:32', '2021-12-28 07:01:46'),
(4, 25, 3, '2022-01-11', '2022-01-11', '2022-01-11 10:26:43', '2022-01-11 10:26:43');

-- --------------------------------------------------------

--
-- Table structure for table `employee_sallary_logs`
--

CREATE TABLE `employee_sallary_logs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` int(11) NOT NULL COMMENT 'employee_id = User_id',
  `previous_salary` int(11) DEFAULT NULL,
  `present_salary` int(11) DEFAULT NULL,
  `increment_salary` int(11) DEFAULT NULL,
  `effected_salary` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employee_sallary_logs`
--

INSERT INTO `employee_sallary_logs` (`id`, `employee_id`, `previous_salary`, `present_salary`, `increment_salary`, `effected_salary`, `created_at`, `updated_at`) VALUES
(1, 22, 15000, 15000, 0, '2021-12-11', '2021-12-26 07:43:08', '2021-12-26 07:43:08'),
(2, 23, 20500, 20500, 0, '2020-11-25', '2021-12-26 07:47:53', '2021-12-26 07:47:53'),
(3, 23, 20500, 21000, 500, '2021-12-27', '2021-12-27 06:53:31', '2021-12-27 06:53:31'),
(4, 22, 15000, 15500, 500, '2021-12-27', '2021-12-27 06:54:33', '2021-12-27 06:54:33'),
(5, 22, 15500, 16000, 500, '2021-12-27', '2021-12-27 06:55:39', '2021-12-27 06:55:39'),
(6, 23, 21000, 21500, 500, '2021-12-27', '2021-12-27 07:52:52', '2021-12-27 07:52:52'),
(7, 24, 15000, 15000, 0, '2021-12-01', '2021-12-28 06:59:33', '2021-12-28 06:59:33'),
(8, 24, 15000, 20000, 5000, '2021-12-28', '2021-12-28 07:00:49', '2021-12-28 07:00:49'),
(9, 25, 20500, 20500, 0, '2021-12-25', '2021-12-28 09:15:07', '2021-12-28 09:15:07'),
(10, 25, 20500, 21000, 500, '2022-01-04', '2022-01-04 09:20:37', '2022-01-04 09:20:37'),
(11, 28, 15000, 15000, 0, '2022-01-11', '2022-01-11 10:24:36', '2022-01-11 10:24:36'),
(12, 28, 15000, 20000, 5000, '2022-01-11', '2022-01-11 10:25:23', '2022-01-11 10:25:23');

-- --------------------------------------------------------

--
-- Table structure for table `exam_types`
--

CREATE TABLE `exam_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `exam_types`
--

INSERT INTO `exam_types` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, '1st Terminal Exam', '2021-12-15 06:51:19', '2021-12-22 12:07:59'),
(3, 'Mid Term Exam', '2021-12-15 07:01:46', '2021-12-22 12:09:10'),
(4, 'Final Exam', '2021-12-22 12:08:39', '2021-12-22 12:08:39');

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
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fee_categories`
--

CREATE TABLE `fee_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fee_categories`
--

INSERT INTO `fee_categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Registration Fee', '2021-12-14 14:41:21', '2021-12-15 07:00:08'),
(2, 'Monthly Fee', '2021-12-14 06:50:35', '2021-12-14 06:50:35'),
(3, 'Exam Fee', '2021-12-14 06:50:44', '2021-12-14 06:50:44'),
(5, 'Short Courses', '2021-12-15 03:24:09', '2021-12-15 03:24:09');

-- --------------------------------------------------------

--
-- Table structure for table `fee_category_amounts`
--

CREATE TABLE `fee_category_amounts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fee_category_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `amount` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fee_category_amounts`
--

INSERT INTO `fee_category_amounts` (`id`, `fee_category_id`, `class_id`, `amount`, `created_at`, `updated_at`) VALUES
(20, 2, 7, 1000, '2021-12-15 03:17:12', '2021-12-15 03:17:12'),
(21, 2, 8, 1200, '2021-12-15 03:17:12', '2021-12-15 03:17:12'),
(22, 2, 9, 1500, '2021-12-15 03:17:12', '2021-12-15 03:17:12'),
(23, 3, 7, 500, '2021-12-15 03:17:45', '2021-12-15 03:17:45'),
(24, 3, 8, 700, '2021-12-15 03:17:45', '2021-12-15 03:17:45'),
(25, 3, 9, 1000, '2021-12-15 03:17:45', '2021-12-15 03:17:45'),
(33, 2, 10, 1500, '2021-12-22 07:21:41', '2021-12-22 07:21:41'),
(34, 2, 11, 1700, '2021-12-22 07:21:41', '2021-12-22 07:21:41'),
(35, 2, 12, 1700, '2021-12-22 07:21:41', '2021-12-22 07:21:41'),
(36, 2, 13, 1900, '2021-12-22 07:21:41', '2021-12-22 07:21:41'),
(37, 2, 14, 1900, '2021-12-22 07:21:41', '2021-12-22 07:21:41'),
(38, 2, 15, 2500, '2021-12-22 07:21:41', '2021-12-22 07:21:41'),
(39, 2, 16, 2500, '2021-12-22 07:21:41', '2021-12-22 07:21:41'),
(40, 3, 10, 1000, '2021-12-22 07:22:51', '2021-12-22 07:22:51'),
(41, 3, 11, 1200, '2021-12-22 07:22:51', '2021-12-22 07:22:51'),
(42, 3, 12, 1200, '2021-12-22 07:22:51', '2021-12-22 07:22:51'),
(43, 3, 13, 1200, '2021-12-22 07:22:51', '2021-12-22 07:22:51'),
(44, 3, 14, 1300, '2021-12-22 07:22:51', '2021-12-22 07:22:51'),
(45, 3, 15, 1500, '2021-12-22 07:22:51', '2021-12-22 07:22:51'),
(46, 3, 16, 1500, '2021-12-22 07:22:51', '2021-12-22 07:22:51'),
(47, 1, 7, 300, '2021-12-23 08:51:57', '2021-12-23 08:51:57'),
(48, 1, 8, 500, '2021-12-23 08:51:57', '2021-12-23 08:51:57'),
(49, 1, 9, 700, '2021-12-23 08:51:57', '2021-12-23 08:51:57'),
(50, 1, 10, 900, '2021-12-23 08:51:57', '2021-12-23 08:51:57'),
(51, 1, 11, 1100, '2021-12-23 08:51:57', '2021-12-23 08:51:57'),
(52, 1, 12, 1300, '2021-12-23 08:51:57', '2021-12-23 08:51:57'),
(53, 1, 13, 1500, '2021-12-23 08:51:57', '2021-12-23 08:51:57'),
(54, 1, 14, 1500, '2021-12-23 08:51:58', '2021-12-23 08:51:58'),
(55, 1, 15, 2000, '2021-12-23 08:51:58', '2021-12-23 08:51:58'),
(56, 1, 16, 2100, '2021-12-23 08:51:58', '2021-12-23 08:51:58');

-- --------------------------------------------------------

--
-- Table structure for table `leave_purposes`
--

CREATE TABLE `leave_purposes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `leave_purposes`
--

INSERT INTO `leave_purposes` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Family Issue', NULL, NULL),
(2, 'Personal Problem', NULL, NULL),
(3, 'Health Problem', '2021-12-28 06:31:18', '2021-12-28 06:31:18');

-- --------------------------------------------------------

--
-- Table structure for table `marks_grades`
--

CREATE TABLE `marks_grades` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `grade_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `grade_point` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_marks` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `end_marks` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_point` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `end_point` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remarks` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `marks_grades`
--

INSERT INTO `marks_grades` (`id`, `grade_name`, `grade_point`, `start_marks`, `end_marks`, `start_point`, `end_point`, `remarks`, `created_at`, `updated_at`) VALUES
(1, 'A+', '4', '95', '100', '4', '4', 'Excellent', '2022-01-03 07:14:51', '2022-01-08 07:15:08'),
(2, 'A', '3.8', '90', '94', '3.8', '3.99', 'Superior', '2022-01-03 07:19:13', '2022-01-03 07:45:00'),
(3, 'A-', '3.67', '81', '89', '3.67', '3.79', 'Very Good', '2022-01-03 07:36:24', '2022-01-03 07:46:02'),
(4, 'B+', '3.33', '70', '80', '3.33', '3.66', 'Very Good', '2022-01-03 07:38:45', '2022-01-03 07:45:45'),
(5, 'B', '3', '60', '69', '3', '3.32', 'Good', '2022-01-03 07:40:03', '2022-01-08 07:14:27'),
(6, 'B-', '2.67', '51', '59', '2.67', '2.99', 'Average', '2022-01-03 07:42:23', '2022-01-03 07:47:44'),
(7, 'C+', '2.33', '45', '50', '2.33', '2.66', 'Below Average', '2022-01-03 07:43:25', '2022-01-03 07:48:41'),
(8, 'C', '2', '40', '44', '2', '2.32', 'Adequate', '2022-01-03 07:49:40', '2022-01-08 07:14:09'),
(9, 'C-', '1.67', '35', '39', '1.67', '1.99', 'Pass', '2022-01-03 07:52:00', '2022-01-03 07:52:00'),
(10, 'D', '1', '33', '35', '1', '1.66', 'Pass', '2022-01-03 07:54:23', '2022-01-08 07:13:50'),
(11, 'F', '0', '00', '32', '0', '0.99', 'Fail', '2022-01-03 07:55:14', '2022-01-08 07:13:33');

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
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2021_12_10_134207_create_sessions_table', 1),
(9, '2021_12_13_111236_create_student_classes_table', 3),
(10, '2021_12_13_160937_create_student_years_table', 4),
(11, '2021_12_13_170618_create_student_groups_table', 5),
(12, '2021_12_13_173946_create_student_shifts_table', 6),
(13, '2021_12_14_113149_create_fee_categories_table', 7),
(14, '2021_12_14_121101_create_fee_category_amounts_table', 8),
(15, '2021_12_15_113045_create_exam_types_table', 9),
(16, '2021_12_15_121030_create_school_subjects_table', 10),
(17, '2021_12_15_123828_create_assign_subjects_table', 11),
(18, '2021_12_16_125305_create_designations_table', 12),
(19, '2014_10_12_000000_create_users_table', 13),
(20, '2021_12_18_085335_create_assign_students_table', 14),
(21, '2021_12_18_103232_create_discount_students_table', 14),
(22, '2021_12_23_113944_create_emplyee_sallary_logs_table', 15),
(23, '2021_12_23_120435_create_employee_sallary_logs_table', 16),
(24, '2021_12_28_101728_create_leave_purposes_table', 17),
(25, '2021_12_28_101907_create_employee_leaves_table', 17),
(26, '2021_12_28_120844_create_employee_attendances_table', 18),
(27, '2021_12_30_122313_create_student_marks_table', 19),
(28, '2022_01_03_113226_create_marks_grades_table', 20),
(29, '2022_01_06_085748_create_account_student_fees_table', 21),
(30, '2022_01_06_153537_create_account_employee_salaries_table', 22),
(31, '2022_01_07_130459_create_account_other_costs_table', 23);

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
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `school_subjects`
--

CREATE TABLE `school_subjects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `school_subjects`
--

INSERT INTO `school_subjects` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Science', '2021-12-15 07:29:37', '2021-12-15 07:29:37'),
(2, 'Maths', '2021-12-15 07:30:03', '2021-12-15 07:30:03'),
(3, 'English', '2021-12-15 07:30:13', '2021-12-15 07:31:05'),
(4, 'Urdu', '2021-12-15 07:30:19', '2021-12-15 07:30:19'),
(10, 'Pakistan Studies', '2021-12-18 08:00:56', '2021-12-18 08:00:56'),
(11, 'Islamiyat', '2021-12-18 08:01:12', '2021-12-18 08:01:12');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('BQrTMef9J3iTShFzHhfbiY1IfyQgQDZrdOICjxeI', 3, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/97.0.4692.71 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiZ2lYcVNvamlUcmhkTUxXYWJpcnE1OGQzY3dpRU9HaXMxbmdjbkQ3WiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9kYXNoYm9hcmQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aTozO3M6MTc6InBhc3N3b3JkX2hhc2hfd2ViIjtzOjYwOiIkMnkkMTAkd3BzdGlSOS9odlBabzlQSTZNMTNidTZUVk9zNjAvQ3k3Vzc3S1d5Y2xWTk01bU5ZRWdRYjYiO3M6MjE6InBhc3N3b3JkX2hhc2hfc2FuY3R1bSI7czo2MDoiJDJ5JDEwJHdwc3RpUjkvaHZQWm85UEk2TTEzYnU2VFZPczYwL0N5N1c3N0tXeWNsVk5NNW1OWUVnUWI2Ijt9', 1642142262),
('U44xLFiQjKna6laPX3QFwOPvoPwH6Z0QhOWku0BC', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/97.0.4692.71 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoidVlGNzRXUEVhcU5TcW9iZGZHVGRnOGVuVnNTdkpJcGxuWVdiZHRhcSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTtzOjE3OiJwYXNzd29yZF9oYXNoX3dlYiI7czo2MDoiJDJ5JDEwJERGaHA3SGR0ZzV4TjI1MGZNQUFkOHVBV1locjNacDFmUXNVMmVNWkE5eE9QeG1LWHhHNzBlIjtzOjIxOiJwYXNzd29yZF9oYXNoX3NhbmN0dW0iO3M6NjA6IiQyeSQxMCRERmhwN0hkdGc1eE4yNTBmTUFBZDh1QVdZaHIzWnAxZlFzVTJlTVpBOXhPUHhtS1h4RzcwZSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzI6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC91c2Vycy92aWV3Ijt9fQ==', 1642142257);

-- --------------------------------------------------------

--
-- Table structure for table `student_classes`
--

CREATE TABLE `student_classes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_classes`
--

INSERT INTO `student_classes` (`id`, `name`, `created_at`, `updated_at`) VALUES
(7, 'Class 1', '2021-12-13 10:49:31', '2021-12-13 10:50:16'),
(8, 'Class 2', '2021-12-13 10:49:58', '2021-12-13 10:50:23'),
(9, 'Class 3', '2021-12-14 11:11:10', '2021-12-14 11:11:26'),
(10, 'Class 4', '2021-12-20 06:01:11', '2021-12-20 06:01:11'),
(11, 'Class 5', '2021-12-20 06:01:19', '2021-12-20 06:01:19'),
(12, 'Class 6', '2021-12-20 06:01:28', '2021-12-20 06:01:28'),
(13, 'Class 7', '2021-12-20 06:01:36', '2021-12-20 06:01:36'),
(14, 'Class 8', '2021-12-20 06:01:43', '2021-12-20 06:01:43'),
(15, 'Class 9', '2021-12-20 06:01:51', '2021-12-20 06:01:57'),
(16, 'Class 10', '2021-12-20 06:02:08', '2021-12-20 06:02:08');

-- --------------------------------------------------------

--
-- Table structure for table `student_groups`
--

CREATE TABLE `student_groups` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_groups`
--

INSERT INTO `student_groups` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Science', '2021-12-13 12:20:22', '2021-12-13 12:20:22'),
(2, 'Arts', '2021-12-13 12:20:32', '2021-12-13 12:20:32');

-- --------------------------------------------------------

--
-- Table structure for table `student_marks`
--

CREATE TABLE `student_marks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` int(11) DEFAULT NULL COMMENT 'student_id = user_id',
  `id_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `year_id` int(11) DEFAULT NULL,
  `class_id` int(11) DEFAULT NULL,
  `assign_subject_id` int(11) DEFAULT NULL,
  `exam_type_id` int(255) DEFAULT NULL,
  `marks` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_marks`
--

INSERT INTO `student_marks` (`id`, `student_id`, `id_no`, `year_id`, `class_id`, `assign_subject_id`, `exam_type_id`, `marks`, `created_at`, `updated_at`) VALUES
(5, 5, '20210005', 7, 8, 43, 1, 67, '2022-01-03 03:14:10', '2022-01-03 03:14:10'),
(6, 4, '20210001', 7, 7, 37, 1, 55, '2022-01-03 05:39:24', '2022-01-03 05:39:24'),
(7, 6, '20210006', 7, 7, 37, 1, 90, '2022-01-03 05:39:24', '2022-01-03 05:39:24'),
(8, 10, '20210010', 7, 7, 37, 1, 80, '2022-01-03 05:39:24', '2022-01-03 05:39:24'),
(9, 12, '20210012', 7, 7, 37, 1, 75, '2022-01-03 05:39:24', '2022-01-03 05:39:24'),
(10, 5, '20210005', 7, 8, 44, 1, 99, '2022-01-08 11:11:41', '2022-01-08 11:11:41'),
(11, 5, '20210005', 7, 8, 45, 1, 86, '2022-01-08 11:12:04', '2022-01-08 11:12:04'),
(12, 5, '20210005', 7, 8, 46, 1, 78, '2022-01-08 11:12:28', '2022-01-08 11:12:28');

-- --------------------------------------------------------

--
-- Table structure for table `student_shifts`
--

CREATE TABLE `student_shifts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_shifts`
--

INSERT INTO `student_shifts` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Morning', '2021-12-13 12:52:06', '2021-12-19 10:59:07'),
(2, 'Afternoon', '2021-12-13 12:52:16', '2021-12-19 11:00:17'),
(3, 'Night', '2021-12-19 10:58:22', '2021-12-19 11:00:27');

-- --------------------------------------------------------

--
-- Table structure for table `student_years`
--

CREATE TABLE `student_years` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_years`
--

INSERT INTO `student_years` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, '2015', '2021-12-13 11:32:02', '2021-12-19 10:43:03'),
(2, '2016', '2021-12-13 11:33:01', '2021-12-19 10:42:49'),
(3, '2017', '2021-12-18 07:56:28', '2021-12-19 10:42:38'),
(4, '2018', '2021-12-18 07:56:35', '2021-12-19 10:42:29'),
(5, '2019', '2021-12-18 07:56:42', '2021-12-19 10:42:13'),
(6, '2020', '2021-12-18 07:56:48', '2021-12-19 10:41:53'),
(7, '2021', '2021-12-18 07:56:55', '2021-12-18 07:56:55'),
(8, '2022', '2022-01-07 12:42:56', '2022-01-07 12:42:56');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `usertype` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Student,Employee,Admin',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `religion` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'admin=head of software, Operator, Computer operator, User=employee',
  `join_date` date DEFAULT NULL,
  `designation_id` int(11) DEFAULT NULL,
  `salary` double DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '0=inactive,1=active',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `usertype`, `name`, `email`, `email_verified_at`, `password`, `mobile`, `address`, `gender`, `image`, `fname`, `mname`, `religion`, `id_no`, `dob`, `code`, `role`, `join_date`, `designation_id`, `salary`, `status`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'Afaq Ahmad', 'afaqa0051@gmail.com', NULL, '$2y$10$DFhp7Hdtg5xN250fMAAd8uAWYhr3Zp1fQsU2eMZA9xOPxmKXxG70e', '03069696035', 'Street#08 Bazar#02 Rasheed Colony', 'Male', '202201111512503889_1_81445.png', NULL, NULL, NULL, NULL, NULL, NULL, 'Admin', NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, '2022-01-11 10:12:15'),
(3, 'Admin', 'Ahmad', 'ahmad@gmail.com', NULL, '$2y$10$wpstiR9/hvPZo9PI6M13bu6TVOs60/Cy7W77KWyclVNM5mNYEgQb6', '03107376675', 'People\'s Colony', 'Male', '202112181254head-659652__340.png', NULL, NULL, NULL, NULL, NULL, '1807', 'Admin', NULL, NULL, NULL, 1, NULL, NULL, NULL, '2021-12-18 06:30:31', '2022-01-14 01:37:37'),
(4, 'Student', 'John Kane', NULL, NULL, '$2y$10$h2Gw7aIZhLpudfycDBpqjOF/No.CHm38w.PHn0iYatsIi2c1b8Ze6', '03331122345', 'USA', 'Male', '2021122010437837_Profile-2.rev.1572210489.jpg', 'Michael Berlin', 'Adriel Michael', 'Christian', '20210001', '2017-06-28', '923', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2021-12-20 05:43:51', '2021-12-20 05:43:51'),
(5, 'Student', 'Arham Ayan', NULL, NULL, '$2y$10$zJB6Cu7mYHx0eTqhRjD6jOzY5ad1dtcYDhwE4OSOIYIDp7vJa.OSq', '03331122344', 'Pakistan', 'Male', '202112201053Ambrose-Chui-Cropped-200x200.jpg', 'Ayan Ahmad', 'Inaya Ayan', 'Islam', '20210005', '2018-05-08', '8181', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2021-12-20 05:53:37', '2021-12-20 05:53:37'),
(6, 'Student', 'Adviika Aadav', NULL, NULL, '$2y$10$5k81ope3WHSxxWtBzA6lxOWd7ZepU8SolVtE2YTmyBOPezWenuyPK', '03321111112', 'India', 'Female', '202112201058juliana-schneider.jpg', 'Aadaavan', 'Aarna', 'Hindu', '20210006', '2016-10-19', '2664', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2021-12-20 05:58:56', '2021-12-20 11:03:41'),
(7, 'Student', 'Aabheer', NULL, NULL, '$2y$10$Ts4Q/pWxvjQYSPWDq2k9/eg7V7w4lZikKac0wtyThfhY5/0sOV3jK', '2222222222', 'India', 'Male', '202112201100aamir-khalique.jpg', 'Aadarsh', 'Brinda', 'Hindu', '20190007', '2014-06-22', '7330', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2021-12-20 06:00:51', '2021-12-20 06:00:51'),
(8, 'Student', 'Zoya Ahmad', NULL, NULL, '$2y$10$vaZcfEDFKsy7r4e2UHuR8.KCcHT0tgcW5Omy1hh5clDcs8HvRSQa6', '33333333', 'Pakistan', 'Female', '202112201104IMG_9991-1200x800.jpg', 'Anas Ahmad', 'Ayesha', 'Islam', '20190008', '2007-02-04', '1755', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2021-12-20 06:04:16', '2021-12-20 06:04:16'),
(9, 'Student', 'Rehan Ali', NULL, NULL, '$2y$10$XysRO.4lnT.9J84kJcF4.egJ70rjVbhxFwgBztdAY0oD08Dhdq9qG', '12121212', 'Pakistan', 'Male', '202112201105IMG_5509-375x500.jpg', 'Huzaifa Ahmad', 'Zara Ahmad', 'Islam', '20200009', '2013-11-30', '8116', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2021-12-20 06:05:59', '2021-12-20 06:05:59'),
(10, 'Student', 'Aira Zain', NULL, NULL, '$2y$10$8lCAQRdMVBadApRclMFrzeMEWH9r0vc.hhNVj/ryi8.7EvLwqSFRy', '12132132', 'Pakistan', 'Male', '202112201107florence-mazy-international-student-profile.jpg', 'Zain Abid', 'Anabia', 'Islam', '20210010', '2018-05-25', '435', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2021-12-20 06:07:53', '2021-12-20 06:07:53'),
(11, 'Student', 'Oorvi', NULL, NULL, '$2y$10$5gm1.lX4kY.scQTwxolNv.pjgYyBOwp0mcAl9293UFmjTcjfLigVK', '90909090', 'India', 'Female', '202112201110student-profile.jpg', 'Aakar', 'Prisha', 'Hindu', '20170011', '2011-09-03', '9143', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2021-12-20 06:10:33', '2021-12-20 06:10:33'),
(12, 'Student', 'Shayna Mark', NULL, NULL, '$2y$10$kqn03RXPoPChpLi2jdsPn.w4CwJ9byl2yPRvFiLuEAT9EUT/3qMrW', '78787878', 'Pakistan', 'Female', '202112201113Zoe-Colman-original-1.jpg', 'Mark Holding', 'Sharly', 'Christian', '20210012', '2018-10-16', '7739', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2021-12-20 06:13:06', '2021-12-20 06:13:06'),
(13, 'Student', 'Ralph Keith', NULL, NULL, '$2y$10$tUWLhWNj3ma9F/jV4I9vpOn6b8EqrGLs3PK3eRRHkkJpNHBv1M6Ue', '56565656', 'India', 'Male', '202112201115patrick2.jpg', 'Brian Keith', 'Sydelle', 'Christian', '20170013', '2000-07-25', '6382', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2021-12-20 06:15:43', '2021-12-20 06:15:43'),
(14, 'Student', 'Johnn Kane', NULL, NULL, '$2y$10$r3V0JMOdAHcCCrciJ4EOsOKHKRs55LBpvQds3j0YidCtgG7XBukGW', '6767676767', 'USA', 'Male', '202112201117karena_354x354_mills.jpg', 'Michael Berlin', 'Adriel Michael', 'Christian', '20200014', '2012-12-12', '3704', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2021-12-20 06:17:13', '2021-12-20 06:17:13'),
(15, 'Student', 'Rohim', NULL, NULL, '$2y$10$4eKJsyww6m7wtERxJ/2N/u9bePgRxXfbYPnLUn4a7GdFDwHR8Rymq', '454545454', 'India', 'Male', '202112201156Stan1.jpg', 'Abdul', 'Nazma', 'Islam', '20150015', '2011-01-24', '8188', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2021-12-20 06:56:41', '2021-12-20 06:56:41'),
(16, 'Student', 'Rahim', NULL, NULL, '$2y$10$eYMD9OBXbQcAlT2I9g4B2OzdXJMuSj4yfegpBWgw12qfeuss22KoS', '87655433', 'India', 'Male', '202112201159photo_1078846.jpg', 'Abdul Islam', 'Nazma Islam', 'Islam', '20210016', '2007-02-21', '8899', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2021-12-20 06:59:58', '2021-12-20 06:59:58'),
(17, 'Student', 'Test', NULL, NULL, '$2y$10$/A.DXjRdynaR/ZbkxMmcU.BrYmHxSQgX9g/mqP2sV44O61O3lC/we', '03331122344', 'Pakistan', 'Male', '202112201631Koos-Tamminga.jpg', 'Michael Berlin', 'Adriel Michael', 'Christian', '20200017', '2015-02-11', '2071', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2021-12-20 11:31:37', '2021-12-20 11:31:37'),
(18, 'Student', 'Aabheer', NULL, NULL, '$2y$10$d3SAaxhAxpRonbnpyYQDiOWyM9D8dVPJ4FwwDNjiDk.aBgyDsdPP2', '0306969603', 'Pakistan', 'Male', '202112221617patrick2.jpg', 'Ayan Ahmad', 'Inaya Ayan', 'Islam', '20200018', '2008-05-08', '1707', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2021-12-22 11:16:08', '2021-12-22 11:17:14'),
(20, 'Student', 'John Kanee', NULL, NULL, '$2y$10$phHXsISnrChU3ZT0eg6hBOBdkdq5vbtsrCuhXa.g4ls2iyyrXPGLu', '03331122345', 'Pakistan', 'Male', '2021122317347837_Profile-2.rev.1572210489.jpg', 'Michael Berlin', 'Adriel Michael', 'Islam', '20210019', '1999-01-23', '4581', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2021-12-23 08:47:36', '2021-12-23 12:34:04'),
(21, 'Student', 'John Kane', NULL, NULL, '$2y$10$OQNugt2B31Wg6j84RIErROMj6RnIiCz4uTf1Vb1vgaMVYmDYMaSJe', '03069696035', 'Pakistan', 'Female', '202112231641IMG_9991-1200x800.jpg', 'Aadarsh', 'Aarna', 'Islam', '20200021', '1888-01-23', '5018', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2021-12-23 08:49:29', '2021-12-23 11:41:47'),
(22, 'employee', 'Uzma', NULL, NULL, '$2y$10$22EZbZsZ5Bk8rR9Hevj8AOOVcLLSmIW4DADD.lYUu5bUXYJOSatpa', '876755454', 'Pakistan', 'Female', '202112261243florence-mazy-international-student-profile.jpg', 'Hussain', NULL, 'Islam', '2021120001', '1999-09-12', '1980', NULL, '2021-12-11', 4, 16000, 1, NULL, NULL, NULL, '2021-12-26 07:43:08', '2021-12-27 06:55:39'),
(23, 'employee', 'Hassan', NULL, NULL, '$2y$10$nd2apIC2o9s6ZCISNjSrqOjsyRWiFcLgi26hNCf7DrCCsnmEmV6Tm', '23456789', 'Pakistan', 'Male', '202112261247aamir-khalique.jpg', 'Ariyan', NULL, 'Islam', '2020110023', '1998-12-23', '5710', NULL, '2020-11-25', 4, 21500, 1, NULL, NULL, NULL, '2021-12-26 07:47:53', '2021-12-27 07:52:52'),
(24, 'employee', 'Amaima', NULL, NULL, '$2y$10$LT/9SGy7KzFK9CFZ6r9VBeXH4s6M0dzKaGSBu41ru67Mwadc8Iwj.', '89898987', 'Pakistan', 'Female', '202112281159juliana-schneider.jpg', 'Ali', NULL, 'Islam', '2021120024', '1998-10-13', '9779', NULL, '2021-12-01', 4, 20000, 1, NULL, NULL, NULL, '2021-12-28 06:59:33', '2021-12-28 07:00:49'),
(25, 'employee', 'Waleed', NULL, NULL, '$2y$10$WBqF89CJBW/W0DaIvXxuhet6ptVeGGv3OcIyH.UXSt0mqPnCjoblu', '8765876', 'Pakistan', 'Male', '202112281415Ambrose-Chui-Cropped-200x200.jpg', 'Ahmad', NULL, 'Islam', '2021120025', '1997-02-23', '7900', NULL, '2021-12-25', 4, 21000, 1, NULL, NULL, NULL, '2021-12-28 09:15:07', '2022-01-04 09:20:37'),
(26, 'Student', 'Noreen Fatima', NULL, NULL, '$2y$10$Wam8a0YZ0yZzfCgSK8mn4esv55ZL93zBuz/bTMR14tYLzKZfXqt/O', '78765445', 'Pakistan', 'Female', '202201071748Zoe-Colman-original-1.jpg', 'Muhammad Hassan', 'Zubaida', 'Islam', '20220022', '2004-07-07', '1348', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2022-01-07 12:48:22', '2022-01-07 12:48:22'),
(27, 'Student', 'Waleed', NULL, NULL, '$2y$10$nLwMRwRor2wQkpcGLFasiecnI4B08Rk57SQFqlbhJWf.jqWTXsY7q', '776554448', 'Pakistan', 'Male', '20220111151821294.png', 'test', 'Zubaida', 'Islam', '20220027', '2013-01-29', '710', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2022-01-11 10:18:51', '2022-01-11 10:18:51'),
(28, 'employee', 'Amaima', NULL, NULL, '$2y$10$RmvOdhl41vkwmvoH5sDRfup.sLL8ydLlgC1vls/7jmQWNfj9Zt3J2', '234567895', 'Pakistan', 'Female', '202201111524head-659652__340.png', 'Ariyan', 'Zubaida', 'Islam', '2022010026', '1990-10-23', '8975', NULL, '2022-01-11', 4, 20000, 1, NULL, NULL, NULL, '2022-01-11 10:24:36', '2022-01-11 10:25:23');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account_employee_salaries`
--
ALTER TABLE `account_employee_salaries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `account_other_costs`
--
ALTER TABLE `account_other_costs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `account_student_fees`
--
ALTER TABLE `account_student_fees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assign_students`
--
ALTER TABLE `assign_students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assign_subjects`
--
ALTER TABLE `assign_subjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `designations`
--
ALTER TABLE `designations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `designations_name_unique` (`name`);

--
-- Indexes for table `discount_students`
--
ALTER TABLE `discount_students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee_attendances`
--
ALTER TABLE `employee_attendances`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee_leaves`
--
ALTER TABLE `employee_leaves`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee_sallary_logs`
--
ALTER TABLE `employee_sallary_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exam_types`
--
ALTER TABLE `exam_types`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `exam_types_name_unique` (`name`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `fee_categories`
--
ALTER TABLE `fee_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `fee_categories_name_unique` (`name`);

--
-- Indexes for table `fee_category_amounts`
--
ALTER TABLE `fee_category_amounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leave_purposes`
--
ALTER TABLE `leave_purposes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `leave_purposes_name_unique` (`name`);

--
-- Indexes for table `marks_grades`
--
ALTER TABLE `marks_grades`
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
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `school_subjects`
--
ALTER TABLE `school_subjects`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `school_subjects_name_unique` (`name`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `student_classes`
--
ALTER TABLE `student_classes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `student_classes_name_unique` (`name`);

--
-- Indexes for table `student_groups`
--
ALTER TABLE `student_groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `student_groups_name_unique` (`name`);

--
-- Indexes for table `student_marks`
--
ALTER TABLE `student_marks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_shifts`
--
ALTER TABLE `student_shifts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `student_shifts_name_unique` (`name`);

--
-- Indexes for table `student_years`
--
ALTER TABLE `student_years`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `student_years_name_unique` (`name`);

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
-- AUTO_INCREMENT for table `account_employee_salaries`
--
ALTER TABLE `account_employee_salaries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `account_other_costs`
--
ALTER TABLE `account_other_costs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `account_student_fees`
--
ALTER TABLE `account_student_fees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `assign_students`
--
ALTER TABLE `assign_students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `assign_subjects`
--
ALTER TABLE `assign_subjects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `designations`
--
ALTER TABLE `designations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `discount_students`
--
ALTER TABLE `discount_students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `employee_attendances`
--
ALTER TABLE `employee_attendances`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `employee_leaves`
--
ALTER TABLE `employee_leaves`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `employee_sallary_logs`
--
ALTER TABLE `employee_sallary_logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `exam_types`
--
ALTER TABLE `exam_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fee_categories`
--
ALTER TABLE `fee_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `fee_category_amounts`
--
ALTER TABLE `fee_category_amounts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `leave_purposes`
--
ALTER TABLE `leave_purposes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `marks_grades`
--
ALTER TABLE `marks_grades`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `school_subjects`
--
ALTER TABLE `school_subjects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `student_classes`
--
ALTER TABLE `student_classes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `student_groups`
--
ALTER TABLE `student_groups`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `student_marks`
--
ALTER TABLE `student_marks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `student_shifts`
--
ALTER TABLE `student_shifts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `student_years`
--
ALTER TABLE `student_years`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
