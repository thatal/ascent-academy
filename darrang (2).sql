-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 20, 2019 at 04:32 AM
-- Server version: 5.7.24
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `darrang`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `uuid` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `uuid`, `name`, `username`, `password`, `remember_token`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Admin', 'admin', '$2y$10$irg.1Hx.yoNRAn7IQWF1iuILMmQaRfp2jDCZTbnONhDnDwYF/55fS', NULL, NULL, '2019-04-30 06:28:02', '2019-04-30 06:28:02');

-- --------------------------------------------------------

--
-- Table structure for table `admin_password_resets`
--

CREATE TABLE `admin_password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `applications`
--

CREATE TABLE `applications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `student_id` int(11) NOT NULL,
  `fullname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `course_id` int(11) NOT NULL,
  `semester_id` int(11) NOT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dob` date NOT NULL,
  `fathers_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mothers_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `annual_income` int(11) NOT NULL,
  `religion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `caste_id` int(11) NOT NULL,
  `co_curricular` int(11) NOT NULL,
  `differently_abled` int(11) NOT NULL,
  `present_vill_or_town` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `present_city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `present_state` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `present_district` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `present_pin` bigint(20) NOT NULL,
  `present_nationality` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `permanent_vill_or_town` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `permanent_city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `permanent_state` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `permanent_district` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `permanent_pin` bigint(20) NOT NULL,
  `permanent_nationality` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_board_or_university` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_exam_roll` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_exam_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub_1_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub_1_total` int(11) NOT NULL,
  `sub_1_score` float NOT NULL,
  `sub_2_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub_2_total` int(11) NOT NULL,
  `sub_2_score` float NOT NULL,
  `sub_3_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub_3_total` int(11) NOT NULL,
  `sub_3_score` float NOT NULL,
  `sub_4_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub_4_total` int(11) NOT NULL,
  `sub_4_score` float NOT NULL,
  `sub_5_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub_5_total` int(11) NOT NULL,
  `sub_5_score` float NOT NULL,
  `sub_6_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub_6_total` int(11) NOT NULL,
  `sub_6_score` float NOT NULL,
  `all_total_marks` int(11) NOT NULL,
  `percentage` int(11) NOT NULL,
  `year` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `blood_group` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `marksheet` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pass_certificate` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `caste_certificate` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `passport` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sign` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_confirmed` int(11) NOT NULL DEFAULT '0' COMMENT '0: not confirmed; 1:confirmed',
  `payment_status` int(11) NOT NULL DEFAULT '0' COMMENT '0:not paid/failed; 1:success',
  `checked_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `checked_by_id` int(11) DEFAULT NULL,
  `rejection_reason` text COLLATE utf8mb4_unicode_ci,
  `status` int(11) NOT NULL DEFAULT '0' COMMENT '0:default; 1: approved; 2: rejected',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `applications`
--

INSERT INTO `applications` (`id`, `uuid`, `student_id`, `fullname`, `course_id`, `semester_id`, `gender`, `dob`, `fathers_name`, `mothers_name`, `annual_income`, `religion`, `caste_id`, `co_curricular`, `differently_abled`, `present_vill_or_town`, `present_city`, `present_state`, `present_district`, `present_pin`, `present_nationality`, `permanent_vill_or_town`, `permanent_city`, `permanent_state`, `permanent_district`, `permanent_pin`, `permanent_nationality`, `last_board_or_university`, `last_exam_roll`, `last_exam_no`, `sub_1_name`, `sub_1_total`, `sub_1_score`, `sub_2_name`, `sub_2_total`, `sub_2_score`, `sub_3_name`, `sub_3_total`, `sub_3_score`, `sub_4_name`, `sub_4_total`, `sub_4_score`, `sub_5_name`, `sub_5_total`, `sub_5_score`, `sub_6_name`, `sub_6_total`, `sub_6_score`, `all_total_marks`, `percentage`, `year`, `blood_group`, `marksheet`, `pass_certificate`, `caste_certificate`, `passport`, `sign`, `is_confirmed`, `payment_status`, `checked_by`, `checked_by_id`, `rejection_reason`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, '2d78abb3-0289-4088-90d0-31656dfe4b8c', 1, 'Rupam Bordoloi', 1, 1, 'Male', '2018-10-17', 'Nripen Bordoloi', 'Gita Bordoloi', 5000, 'Hindu', 1, 0, 0, '', '', '', '', 784175, '', '', '', '', '', 0, '', 'CBSE', '3636', '656', 'dfhd', 100, 50, 'dfhdh', 100, 50, 'dfhdh', 100, 50, 'dfhdfh', 100, 50, 'dfhdfh', 100, 50, 'dfhd', 100, 50, 300, 50, '2019', 'A+', 'public/uploads/1/10052019-marksheet.png', 'public/uploads/1/10052019-pass_certificate.png', '', 'public/uploads/1/10052019-passport.png', 'public/uploads/1/10052019-sign.jpg', 1, 1, NULL, NULL, NULL, 1, NULL, '2019-05-10 00:47:55', '2019-05-10 04:42:16'),
(2, '656ba412-89ed-4b46-a305-dd3b2d44c2bc', 1, 'Ruapm', 1, 1, 'Male', '2019-05-10', 'fhdfh', 'dfhjd', 7468, 'Hindu', 2, 0, 1, '', '', '', '', 784175, '', '', '', '', '', 0, '', '58585', '567857', '679679', 'dfhd', 100, 50, 'dfhdh', 100, 50, 'dfhdh', 100, 50, 'dfhdfh', 100, 50, 'dfhdfh', 100, 50, 'dfhd', 100, 50, 300, 50, '2019', '7857', 'public/uploads/1/10052019-marksheet.jpg', 'public/uploads/1/10052019-pass_certificate.png', 'public/uploads/1/10052019-caste_certificate.png', 'public/uploads/1/10052019-passport.png', 'public/uploads/1/10052019-sign.jpg', 1, 1, 'Admin', 1, 'dont know', 2, NULL, '2019-05-10 02:31:59', '2019-05-10 07:14:52'),
(3, '947514e3-1c77-45a2-86c4-17ece82cfee9', 1, 'Shsdh', 1, 1, 'Male', '2019-05-11', 'dfdfhd', 'dfhd', 56858, 'Hindu', 1, 1, 1, '', '', '', '', 784175, '', '', '', '', '', 0, '', 'dfhdh', 'dfhdh', 'dfhd', 'dfhd', 100, 50, 'dfhdh', 100, 50, 'dfhdh', 100, 50, 'dfhdfh', 100, 50, 'dfhdfh', 100, 50, 'dfhd', 100, 50, 300, 50, '2019', 'O+', 'public/uploads/1/11052019-marksheet.png', 'public/uploads/1/11052019-pass_certificate.png', NULL, 'public/uploads/1/11052019-passport.png', 'public/uploads/1/11052019-sign.jpg', 0, 0, NULL, NULL, NULL, 0, NULL, '2019-05-10 23:57:40', '2019-05-10 23:57:40');

-- --------------------------------------------------------

--
-- Table structure for table `applied_streams`
--

CREATE TABLE `applied_streams` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `student_id` int(11) NOT NULL,
  `application_id` int(11) NOT NULL,
  `stream_id` int(11) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `applied_streams`
--

INSERT INTO `applied_streams` (`id`, `uuid`, `student_id`, `application_id`, `stream_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, '1b51a3d8-d516-4959-afb2-f021ad0fd5f1', 1, 1, 2, NULL, '2019-05-10 00:47:55', '2019-05-10 00:47:55'),
(2, '8a54b2ee-b918-4f64-8980-8666db8f06e8', 1, 2, 3, NULL, '2019-05-10 02:31:59', '2019-05-10 02:31:59'),
(3, '8a54b2ee-b918-4f64-8980-8666db8f06e8', 1, 2, 3, NULL, '2019-05-10 02:31:59', '2019-05-10 02:31:59'),
(4, '35efd0fe-3759-4ec3-8473-11071d91c6da', 1, 3, 1, NULL, '2019-05-10 23:57:40', '2019-05-10 23:57:40'),
(5, '35efd0fe-3759-4ec3-8473-11071d91c6da', 1, 3, 1, NULL, '2019-05-10 23:57:40', '2019-05-10 23:57:40');

-- --------------------------------------------------------

--
-- Table structure for table `applied_subjects`
--

CREATE TABLE `applied_subjects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `student_id` int(11) NOT NULL,
  `application_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `is_compulsory` int(11) NOT NULL COMMENT '1:yes, 0:no',
  `is_major` int(11) NOT NULL COMMENT '1:yes, 0:no',
  `preference` int(11) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `applied_subjects`
--

INSERT INTO `applied_subjects` (`id`, `uuid`, `student_id`, `application_id`, `subject_id`, `is_compulsory`, `is_major`, `preference`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, '60c3b5e6-899b-491d-bd8b-4cb78edd3c55', 1, 1, 17, 1, 0, 0, NULL, '2019-05-10 00:47:55', '2019-05-10 00:47:55'),
(2, '8515d88d-1a72-4489-beb6-9df70e8f7bc9', 1, 1, 22, 0, 0, 0, NULL, '2019-05-10 00:47:55', '2019-05-10 00:47:55'),
(3, 'a4438fbe-7200-4225-902a-71c664443edf', 1, 1, 26, 0, 0, 0, NULL, '2019-05-10 00:47:55', '2019-05-10 00:47:55'),
(4, '1b796151-24dc-4259-a3e9-31c6f5896cfb', 1, 2, 50, 1, 0, 0, NULL, '2019-05-10 02:31:59', '2019-05-10 02:31:59'),
(5, '7371e0e8-48db-4a9d-9077-f4c94f60a7e3', 1, 2, 59, 1, 0, 0, NULL, '2019-05-10 02:31:59', '2019-05-10 02:31:59'),
(6, '989fcbaf-f35d-4a60-b3c8-be54924c8d12', 1, 2, 62, 0, 0, 0, NULL, '2019-05-10 02:31:59', '2019-05-10 02:31:59'),
(7, 'cdd2fc56-de57-41db-b212-3cb09a1769b0', 1, 3, 1, 1, 0, 0, NULL, '2019-05-10 23:57:40', '2019-05-10 23:57:40'),
(8, 'f62b46c9-431e-4c9c-b587-fffd36dbdd27', 1, 3, 10, 0, 0, 0, NULL, '2019-05-10 23:57:40', '2019-05-10 23:57:40');

-- --------------------------------------------------------

--
-- Table structure for table `approved_lists`
--

CREATE TABLE `approved_lists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `uid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `student_id` int(11) NOT NULL,
  `application_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `semester_id` int(11) NOT NULL,
  `stream_id` int(11) NOT NULL,
  `approved_by` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `approved_by_id` int(11) NOT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'under which category student got selected',
  `year` year(4) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `castes`
--

CREATE TABLE `castes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `castes`
--

INSERT INTO `castes` (`id`, `uuid`, `name`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, NULL, 'General', NULL, '2019-04-28 18:30:00', '2019-04-28 18:30:00'),
(2, NULL, 'OBC', NULL, '2019-04-28 18:30:00', '2019-04-28 18:30:00'),
(3, NULL, 'ST(P)', NULL, '2019-04-28 18:30:00', '2019-04-28 18:30:00'),
(4, NULL, 'ST(H)', NULL, '2019-04-28 18:30:00', '2019-04-28 18:30:00'),
(5, NULL, 'SC', NULL, '2019-04-28 18:30:00', '2019-04-28 18:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `uuid`, `name`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, NULL, 'HIGHER SECONDARY', NULL, '2019-04-28 18:30:00', '2019-04-28 18:30:00'),
(2, NULL, 'DEGREE', NULL, '2019-05-06 18:30:00', '2019-05-06 18:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `fees`
--

CREATE TABLE `fees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `course_id` int(11) NOT NULL,
  `semester_id` int(11) NOT NULL,
  `stream_id` int(11) NOT NULL,
  `fee_head_id` int(11) NOT NULL,
  `year` year(4) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fee_heads`
--

CREATE TABLE `fee_heads` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `applicable_on` int(11) NOT NULL COMMENT '1:at the time of admission; 2:on every semester/year',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fee_heads`
--

INSERT INTO `fee_heads` (`id`, `uuid`, `name`, `applicable_on`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, '8bb5e8c5-0ab0-4540-b9e6-31cf0f484112', 'Admission Fee', 1, NULL, '2019-05-11 03:03:26', '2019-05-11 04:41:23'),
(2, 'bee65fcd-840b-44ef-b286-e0815de60e44', 'Tuition Fee', 2, NULL, '2019-05-11 04:40:34', '2019-05-11 04:41:36');

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
(25, '2014_10_12_100000_create_password_resets_table', 1),
(26, '2019_04_29_041955_create_admins_table', 1),
(27, '2019_04_29_041956_create_admin_password_resets_table', 1),
(28, '2019_04_29_042300_create_staff_table', 1),
(29, '2019_04_29_042301_create_staff_password_resets_table', 1),
(30, '2019_04_29_052540_create_students_table', 1),
(31, '2019_04_29_065245_create_courses_table', 2),
(41, '2019_04_29_065259_create_semesters_table', 3),
(42, '2019_04_29_065324_create_streams_table', 3),
(43, '2019_04_29_065336_create_sections_table', 3),
(44, '2019_04_29_065458_create_subjects_table', 3),
(45, '2019_04_29_065510_create_applications_table', 3),
(46, '2019_04_29_065540_create_applied_streams_table', 3),
(47, '2019_04_29_065550_create_applied_subjects_table', 3),
(48, '2019_04_29_073110_create_reservations_table', 3),
(49, '2019_04_29_073917_create_castes_table', 3),
(50, '2019_05_04_063132_create_approved_lists_table', 4),
(52, '2019_05_04_095523_create_rejected_lists_table', 5),
(55, '2019_05_11_080458_create_fee_heads_table', 6),
(56, '2019_05_11_101939_create_fees_table', 7);

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
-- Table structure for table `rejected_lists`
--

CREATE TABLE `rejected_lists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `student_id` int(11) NOT NULL,
  `application_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `semester_id` int(11) NOT NULL,
  `stream_id` int(11) NOT NULL,
  `reason` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rejected_by` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rejected_by_id` int(11) NOT NULL,
  `year` year(4) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

CREATE TABLE `reservations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `stream_id` int(11) NOT NULL,
  `caste_id` int(11) DEFAULT NULL,
  `seat` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reservations`
--

INSERT INTO `reservations` (`id`, `stream_id`, `caste_id`, `seat`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 75, '2019-04-28 18:30:00', '2019-04-28 18:30:00'),
(2, 1, 2, 10, '2019-04-28 18:30:00', '2019-04-28 18:30:00'),
(3, 1, 3, 10, '2019-04-28 18:30:00', '2019-04-28 18:30:00'),
(4, 1, 4, 10, '2019-04-28 18:30:00', '2019-04-28 18:30:00'),
(5, 1, 5, 10, '2019-04-28 18:30:00', '2019-04-28 18:30:00'),
(6, 1, 6, 10, '2019-04-28 18:30:00', '2019-04-28 18:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `sections`
--

CREATE TABLE `sections` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stream_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sections`
--

INSERT INTO `sections` (`id`, `uuid`, `stream_id`, `name`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, NULL, 1, 'Section A', NULL, '2019-04-28 18:30:00', '2019-04-28 18:30:00'),
(2, NULL, 1, 'Section B', NULL, '2019-04-28 18:30:00', '2019-04-28 18:30:00'),
(3, NULL, 2, 'Section A', NULL, '2019-04-28 18:30:00', '2019-04-28 18:30:00'),
(4, NULL, 2, 'Section B', NULL, '2019-04-28 18:30:00', '2019-04-28 18:30:00'),
(5, NULL, 3, 'Section A', NULL, '2019-04-28 18:30:00', '2019-04-28 18:30:00'),
(6, NULL, 3, 'Section B', NULL, '2019-04-28 18:30:00', '2019-04-28 18:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `semesters`
--

CREATE TABLE `semesters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `course_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `semesters`
--

INSERT INTO `semesters` (`id`, `uuid`, `course_id`, `name`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, NULL, 1, '1st Year', NULL, '2019-04-28 18:30:00', '2019-04-28 18:30:00'),
(2, NULL, 1, '2nd Year', NULL, '2019-04-28 18:30:00', '2019-04-28 18:30:00'),
(3, NULL, 2, '1st Sem', NULL, '2019-05-06 18:30:00', '2019-05-06 18:30:00'),
(4, NULL, 2, '2nd Sem', NULL, '2019-05-06 18:30:00', '2019-05-06 18:30:00'),
(5, NULL, 2, '3rd Sem', NULL, '2019-05-06 18:30:00', '2019-05-06 18:30:00'),
(6, NULL, 2, '4th Sem', NULL, '2019-05-06 18:30:00', '2019-05-06 18:30:00'),
(7, NULL, 2, '5th Sem', NULL, '2019-05-06 18:30:00', '2019-05-06 18:30:00'),
(8, NULL, 2, '6th Sem', NULL, '2019-05-06 18:30:00', '2019-05-06 18:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `staffs`
--

CREATE TABLE `staffs` (
  `id` int(10) UNSIGNED NOT NULL,
  `uuid` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `staffs_password_resets`
--

CREATE TABLE `staffs_password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `streams`
--

CREATE TABLE `streams` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `course_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_seat` int(11) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `streams`
--

INSERT INTO `streams` (`id`, `uuid`, `course_id`, `name`, `total_seat`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, NULL, 1, 'Science', 250, NULL, '2019-04-28 18:30:00', '2019-04-28 18:30:00'),
(2, NULL, 1, 'Arts', 300, NULL, '2019-04-28 18:30:00', '2019-04-28 18:30:00'),
(3, NULL, 1, 'Commerce', 250, NULL, '2019-04-28 18:30:00', '2019-04-28 18:30:00'),
(4, NULL, 2, 'THREE YEAR DEGREE COURSE SCIENCE (MAJOR)', 285, NULL, '2019-05-06 18:30:00', '2019-05-06 18:30:00'),
(5, NULL, 2, 'THREE YEAR DEGREE COURSE SCIENCE', 100, NULL, '2019-05-06 18:30:00', '2019-05-06 18:30:00'),
(6, NULL, 2, 'THREE YEAR DEGREE COURSE ARTS (MAJOR)', 555, NULL, '2019-05-06 18:30:00', '2019-05-06 18:30:00'),
(7, NULL, 2, 'THREE YEAR DEGREE COURSE ARTS', 200, NULL, '2019-05-06 18:30:00', '2019-05-06 18:30:00'),
(8, NULL, 2, 'THREE YEAR DEGREE COURSE COMMERCE(MAJOR)', 200, NULL, '2019-05-06 18:30:00', '2019-05-06 18:30:00'),
(9, NULL, 2, 'THREE YEAR DEGREE COURSE COMMERCE', 75, NULL, '2019-05-06 18:30:00', '2019-05-06 18:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `uid` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `uuid`, `uid`, `name`, `mobile_no`, `email`, `password`, `remember_token`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, '5a8e832b-58e8-4c12-98fd-75a543976e6f', NULL, 'student', '8486796934', 'rupam@webcomipl.net.in', '$2y$10$.vhDowHFrXNWFMOWuCImzO.pYlpbTbxraVWfbwkhnqrOqa3kA28ou', NULL, NULL, '2019-04-28 23:57:06', '2019-04-28 23:57:06'),
(2, '8ed4eb07-4c76-4eaa-9a57-cdd571a5af7b', NULL, 'test', '7002747346', 'rupam@webcomipl.net.in', '$2y$10$VxDEtp/q6qMH4Gw8bd7KjuGNlLIulrV74mUMuslIt8K/mGNfMrt3S', NULL, NULL, '2019-05-03 06:21:38', '2019-05-03 06:21:38'),
(3, '9c81b358-c30a-470e-b949-6156da2348e7', NULL, 'Test 2', '9864013569', 'rupam@secretary.com', '$2y$10$4QXj.PdiqdkzLtYxcvPSmOTMZUaQC1gLYM0MesGgUVSEEh9Ajrw0.', NULL, NULL, '2019-05-05 20:38:11', '2019-05-05 20:38:11'),
(4, 'd4c53437-cb49-4a15-bae3-77e679ff2975', NULL, 'Deepjyoti Kalita', '9706926818', 'deepjyotindrd@gmail.com', '$2y$10$zCmA0G9n8FPX0ViussREH.esfcHjNAiC0AmuOEfy4RgQnhP/PrLNi', NULL, NULL, '2019-05-06 00:15:31', '2019-05-06 00:15:31'),
(5, '32ba9ae2-3b16-4cc3-8ed6-0f6ebfa3adc9', NULL, 'MAnoj', '7577035433', 'manoj@gmail.com', '$2y$10$e/zySpr.WaRpNOp.51lBhOAJms1i7KGDIz.UzRZj3pcshlYhWmq0m', NULL, NULL, '2019-05-06 02:43:55', '2019-05-06 02:43:55'),
(6, '4bb43924-1951-489c-bc6d-9842132e7126', NULL, 'webcom', '9864011839', 'rupam@convenor.com', '$2y$10$Q6Qmp06QGdAgj/qNL.8/yOjokhDzbWHvJom3H9yHBVan9h6gZ6sQe', NULL, NULL, '2019-05-09 07:09:29', '2019-05-09 07:09:29');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stream_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `is_compulsory` int(11) NOT NULL,
  `is_major` int(11) NOT NULL COMMENT '1:yes, 0:no',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `uuid`, `stream_id`, `name`, `parent_id`, `is_compulsory`, `is_major`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, NULL, 1, 'English', NULL, 1, 0, NULL, '2019-04-28 18:30:00', '2019-04-28 18:30:00'),
(2, NULL, 1, 'Alternative English/MIL', NULL, 1, 0, NULL, '2019-04-28 18:30:00', '2019-04-28 18:30:00'),
(3, NULL, 1, 'Alternative English', 2, 0, 0, NULL, '2019-04-28 18:30:00', '2019-04-28 18:30:00'),
(4, NULL, 1, 'MIL', 2, 0, 0, NULL, '2019-04-28 18:30:00', '2019-04-28 18:30:00'),
(5, NULL, 1, 'Assamese', 4, 0, 0, NULL, '2019-04-28 18:30:00', '2019-04-28 18:30:00'),
(6, NULL, 1, 'Boro', 4, 0, 0, NULL, '2019-04-28 18:30:00', '2019-04-28 18:30:00'),
(7, NULL, 1, 'Bengali', 4, 0, 0, NULL, '2019-04-28 18:30:00', '2019-04-28 18:30:00'),
(8, NULL, 1, 'Hindi', 4, 0, 0, NULL, '2019-04-28 18:30:00', '2019-04-28 18:30:00'),
(9, NULL, 1, 'Nepali', 4, 0, 0, NULL, '2019-04-28 18:30:00', '2019-04-28 18:30:00'),
(10, NULL, 1, 'Physics + Chemistry + Mathematics + Biology', 4, 0, 0, NULL, '2019-04-28 18:30:00', '2019-04-28 18:30:00'),
(11, NULL, 1, 'Physics+ Chemistry + Mathematics + Statistics ', 4, 0, 0, NULL, '2019-04-28 18:30:00', '2019-04-28 18:30:00'),
(12, NULL, 1, 'Physics + Chemistry + Mathematics +Geography', 4, 0, 0, NULL, '2019-04-28 18:30:00', '2019-04-28 18:30:00'),
(13, NULL, 1, 'Physics + Economics + Statistics + Mathematics', 4, 0, 0, NULL, '2019-04-28 18:30:00', '2019-04-28 18:30:00'),
(14, NULL, 1, 'Physics + Chemistry + Mathematics + Computer Science & Application', 4, 0, 0, NULL, '2019-04-28 18:30:00', '2019-04-28 18:30:00'),
(15, NULL, 1, ' Economics + Statistics + Mathematics + Computer Science & Application', 4, 0, 0, NULL, '2019-04-28 18:30:00', '2019-04-28 18:30:00'),
(16, NULL, 1, 'Physics + Mathematics + Geography + Computer Science & Application', 4, 0, 0, NULL, '2019-04-28 18:30:00', '2019-04-28 18:30:00'),
(17, NULL, 2, 'English', NULL, 1, 0, NULL, '2019-04-28 18:30:00', '2019-04-28 18:30:00'),
(18, NULL, 2, 'Alternative English/MIL', NULL, 1, 0, NULL, '2019-04-28 18:30:00', '2019-04-28 18:30:00'),
(19, NULL, 2, 'Alternative English', 18, 0, 0, NULL, '2019-04-28 18:30:00', '2019-04-28 18:30:00'),
(20, NULL, 2, 'MIL', 18, 0, 0, NULL, '2019-04-28 18:30:00', '2019-04-28 18:30:00'),
(21, NULL, 2, 'Assamese', 20, 0, 0, NULL, '2019-04-28 18:30:00', '2019-04-28 18:30:00'),
(22, NULL, 2, 'Boro', 20, 0, 0, NULL, '2019-04-28 18:30:00', '2019-04-28 18:30:00'),
(23, NULL, 2, 'Bengali', 20, 0, 0, NULL, '2019-04-28 18:30:00', '2019-04-28 18:30:00'),
(24, NULL, 2, 'Hindi', 20, 0, 0, NULL, '2019-04-28 18:30:00', '2019-04-28 18:30:00'),
(25, NULL, 2, 'Nepali', 20, 0, 0, NULL, '2019-04-28 18:30:00', '2019-04-28 18:30:00'),
(26, NULL, 2, 'Economics', NULL, 0, 0, NULL, '2019-04-28 18:30:00', '2019-04-28 18:30:00'),
(27, NULL, 2, 'Education', NULL, 0, 0, NULL, '2019-04-28 18:30:00', '2019-04-28 18:30:00'),
(28, NULL, 2, 'History / Sociology / Home Science ', NULL, 0, 0, NULL, '2019-04-28 18:30:00', '2019-04-28 18:30:00'),
(29, NULL, 2, 'History', 28, 0, 0, NULL, '2019-04-28 18:30:00', '2019-04-28 18:30:00'),
(30, NULL, 2, 'Sociology', 28, 0, 0, NULL, '2019-04-28 18:30:00', '2019-04-28 18:30:00'),
(31, NULL, 2, 'Home Science ', 28, 0, 0, NULL, '2019-04-28 18:30:00', '2019-04-28 18:30:00'),
(32, NULL, 2, 'Political Science', NULL, 0, 0, NULL, '2019-04-28 18:30:00', '2019-04-28 18:30:00'),
(33, NULL, 2, 'Mathematics* (* Eco+Stats+Maths combination)', NULL, 0, 0, NULL, '2019-04-28 18:30:00', '2019-04-28 18:30:00'),
(34, NULL, 2, 'Geography / Statistics', NULL, 0, 0, NULL, '2019-04-28 18:30:00', '2019-04-28 18:30:00'),
(35, NULL, 2, 'Geography', 34, 0, 0, NULL, '2019-04-28 18:30:00', '2019-04-28 18:30:00'),
(36, NULL, 2, 'Statistics', 34, 0, 0, NULL, '2019-04-28 18:30:00', '2019-04-28 18:30:00'),
(37, NULL, 2, 'Logic & Philosophy / Psychology', NULL, 0, 0, NULL, '2019-04-28 18:30:00', '2019-04-28 18:30:00'),
(38, NULL, 2, 'Logic & Philosophy', 37, 0, 0, NULL, '2019-04-28 18:30:00', '2019-04-28 18:30:00'),
(39, NULL, 2, 'Psychology ', 37, 0, 0, NULL, '2019-04-28 18:30:00', '2019-04-28 18:30:00'),
(40, NULL, 2, 'Home Science / Computer Science & Application ', NULL, 0, 0, NULL, '2019-04-28 18:30:00', '2019-04-28 18:30:00'),
(41, NULL, 2, 'Home Science', 40, 0, 0, NULL, '2019-04-28 18:30:00', '2019-04-28 18:30:00'),
(42, NULL, 2, 'Computer Science & Application ', 40, 0, 0, NULL, '2019-04-28 18:30:00', '2019-04-28 18:30:00'),
(43, NULL, 2, 'Sanskrit or Assamese Second Language / Bengali Second Language / Hindi Second Language / E.S.L (E.S.L is allowed but not taught in the college)', NULL, 0, 0, NULL, '2019-04-28 18:30:00', '2019-04-28 18:30:00'),
(44, NULL, 2, 'Sanskrit', 43, 0, 0, NULL, '2019-04-28 18:30:00', '2019-04-28 18:30:00'),
(45, NULL, 2, 'Assamese Second Language', 43, 0, 0, NULL, '2019-04-28 18:30:00', '2019-04-28 18:30:00'),
(46, NULL, 2, 'Bengali Second Language', 43, 0, 0, NULL, '2019-04-28 18:30:00', '2019-04-28 18:30:00'),
(47, NULL, 2, 'Hindi Second Language', 43, 0, 0, NULL, '2019-04-28 18:30:00', '2019-04-28 18:30:00'),
(48, NULL, 2, 'E.S.L (E.S.L is allowed but not taught in the college) ', 43, 0, 0, NULL, '2019-04-28 18:30:00', '2019-04-28 18:30:00'),
(49, NULL, 2, 'Computer Science', NULL, 0, 0, NULL, '2019-04-28 18:30:00', '2019-04-28 18:30:00'),
(50, NULL, 3, 'English', NULL, 1, 0, NULL, '2019-04-28 18:30:00', '2019-04-28 18:30:00'),
(51, NULL, 3, 'Alternative English/MIL', NULL, 1, 0, NULL, '2019-04-28 18:30:00', '2019-04-28 18:30:00'),
(52, NULL, 3, 'Alternative English', 18, 0, 0, NULL, '2019-04-28 18:30:00', '2019-04-28 18:30:00'),
(53, NULL, 3, 'MIL', 18, 0, 0, NULL, '2019-04-28 18:30:00', '2019-04-28 18:30:00'),
(54, NULL, 3, 'Assamese', 20, 0, 0, NULL, '2019-04-28 18:30:00', '2019-04-28 18:30:00'),
(55, NULL, 3, 'Boro', 20, 0, 0, NULL, '2019-04-28 18:30:00', '2019-04-28 18:30:00'),
(56, NULL, 3, 'Bengali', 20, 0, 0, NULL, '2019-04-28 18:30:00', '2019-04-28 18:30:00'),
(57, NULL, 3, 'Hindi', 20, 0, 0, NULL, '2019-04-28 18:30:00', '2019-04-28 18:30:00'),
(58, NULL, 3, 'Nepali', 20, 0, 0, NULL, '2019-04-28 18:30:00', '2019-04-28 18:30:00'),
(59, NULL, 3, 'Accountancy', 20, 1, 0, NULL, '2019-04-28 18:30:00', '2019-04-28 18:30:00'),
(60, NULL, 3, 'Business Studies ', 20, 1, 0, NULL, '2019-04-28 18:30:00', '2019-04-28 18:30:00'),
(61, NULL, 3, 'Economics', NULL, 0, 0, NULL, '2019-04-28 18:30:00', '2019-04-28 18:30:00'),
(62, NULL, 3, 'Banking', NULL, 0, 0, NULL, '2019-04-28 18:30:00', '2019-04-28 18:30:00'),
(63, NULL, 3, 'Commercial Mathematics and Statistics (C.M.S.T.) or Mathematics or Computer Science & Application', NULL, 0, 0, NULL, '2019-04-28 18:30:00', '2019-04-28 18:30:00'),
(64, NULL, 3, 'Commercial Mathematics and Statistics (C.M.S.T.)', 63, 0, 0, NULL, '2019-04-28 18:30:00', '2019-04-28 18:30:00'),
(65, NULL, 3, 'Mathematics', 63, 0, 0, NULL, '2019-04-28 18:30:00', '2019-04-28 18:30:00'),
(66, NULL, 3, 'Computer Science & Application', 63, 0, 0, NULL, '2019-04-28 18:30:00', '2019-04-28 18:30:00'),
(67, NULL, 4, 'Physics', NULL, 0, 1, NULL, '2019-05-06 18:30:00', '2019-05-06 18:30:00'),
(68, NULL, 4, 'Chemistry', NULL, 0, 1, NULL, NULL, NULL),
(69, NULL, 4, 'Mathematics', NULL, 0, 1, NULL, '2019-05-06 18:30:00', '2019-05-06 18:30:00'),
(70, NULL, 4, 'Zoology', NULL, 0, 1, NULL, '2019-05-06 18:30:00', '2019-05-06 18:30:00'),
(71, NULL, 4, 'Botany', NULL, 0, 1, NULL, '2019-05-06 18:30:00', '2019-05-06 18:30:00'),
(72, NULL, 4, 'Statistics', NULL, 0, 1, NULL, '2019-05-06 18:30:00', '2019-05-06 18:30:00'),
(73, NULL, 4, 'Economics', NULL, 0, 1, NULL, '2019-05-06 18:30:00', '2019-05-06 18:30:00'),
(74, NULL, 4, 'Geography', NULL, 0, 1, NULL, '2019-05-06 18:30:00', '2019-05-06 18:30:00'),
(75, NULL, 4, 'Home Science', NULL, 0, 1, NULL, '2019-05-06 18:30:00', '2019-05-06 18:30:00'),
(76, NULL, 4, 'Biotechnology', NULL, 0, 1, NULL, '2019-05-06 18:30:00', '2019-05-06 18:30:00'),
(77, NULL, 4, 'Mathematics', NULL, 0, 0, NULL, '2019-05-06 18:30:00', '2019-05-06 18:30:00'),
(78, NULL, 4, 'Chemistry', NULL, 0, 1, NULL, '2019-05-06 18:30:00', '2019-05-06 18:30:00'),
(79, NULL, 4, 'Physics', NULL, 0, 0, NULL, '2019-05-06 18:30:00', '2019-05-06 18:30:00'),
(80, NULL, 4, 'Geography', NULL, 0, 0, NULL, '2019-05-06 18:30:00', '2019-05-06 18:30:00'),
(81, NULL, 4, 'Economics', NULL, 0, 0, NULL, '2019-05-06 18:30:00', '2019-05-06 18:30:00'),
(82, NULL, 4, 'Botany', NULL, 0, 0, NULL, '2019-05-06 18:30:00', '2019-05-06 18:30:00'),
(83, NULL, 4, 'Home Science', NULL, 0, 0, NULL, '2019-05-06 18:30:00', '2019-05-06 18:30:00'),
(84, NULL, 4, 'Zoology', NULL, 0, 0, NULL, '2019-05-06 18:30:00', '2019-05-06 18:30:00'),
(85, NULL, 4, 'Communicative English', NULL, 0, 0, NULL, '2019-05-06 18:30:00', '2019-05-06 18:30:00'),
(86, NULL, 4, 'Microbiology', NULL, 0, 0, NULL, '2019-05-06 18:30:00', '2019-05-06 18:30:00'),
(87, NULL, 4, 'Biochemistry – 1', NULL, 0, 0, NULL, '2019-05-06 18:30:00', '2019-05-06 18:30:00'),
(88, NULL, 4, 'Cell Biology', NULL, 0, 0, NULL, '2019-05-06 18:30:00', '2019-05-06 18:30:00'),
(89, NULL, 4, 'Practical (Professional Course)', NULL, 0, 0, NULL, '2019-05-06 18:30:00', '2019-05-06 18:30:00'),
(90, NULL, 4, 'General English', NULL, 1, 0, NULL, '2019-05-06 18:30:00', '2019-05-06 18:30:00'),
(91, NULL, 4, 'Functional English', NULL, 1, 0, NULL, '2019-05-06 18:30:00', '2019-05-06 18:30:00'),
(92, NULL, 5, 'General English', NULL, 1, 0, NULL, '2019-05-06 18:30:00', '2019-05-06 18:30:00'),
(93, NULL, 5, 'Functional English', NULL, 1, 0, NULL, '2019-05-06 18:30:00', '2019-05-06 18:30:00'),
(94, NULL, 5, 'Physics', NULL, 0, 0, NULL, '2019-05-06 18:30:00', '2019-05-06 18:30:00'),
(95, NULL, 5, 'Computer Science', NULL, 0, 0, NULL, '2019-05-06 18:30:00', '2019-05-06 18:30:00'),
(96, NULL, 5, 'Chemistry', NULL, 0, 0, NULL, '2019-05-06 18:30:00', '2019-05-06 18:30:00'),
(97, NULL, 5, 'Mathematics', NULL, 0, 0, NULL, '2019-05-06 18:30:00', '2019-05-06 18:30:00'),
(98, NULL, 5, 'Economics', NULL, 0, 0, NULL, '2019-05-06 18:30:00', '2019-05-06 18:30:00'),
(99, NULL, 5, 'Statistics', NULL, 0, 0, NULL, '2019-05-06 18:30:00', '2019-05-06 18:30:00'),
(100, NULL, 5, 'Zoology', NULL, 0, 0, NULL, '2019-05-06 18:30:00', '2019-05-06 18:30:00'),
(101, NULL, 5, 'Home Science', NULL, 0, 0, NULL, '2019-05-06 18:30:00', '2019-05-06 18:30:00'),
(102, NULL, 5, 'Botany', NULL, 0, 0, NULL, '2019-05-06 18:30:00', '2019-05-06 18:30:00'),
(103, NULL, 5, 'Geography', NULL, 0, 0, NULL, '2019-05-06 18:30:00', '2019-05-06 18:30:00'),
(104, NULL, 6, 'English', NULL, 1, 0, NULL, '2019-04-28 18:30:00', '2019-04-28 18:30:00'),
(105, NULL, 6, 'Alternative English/MIL', NULL, 1, 0, NULL, '2019-04-28 18:30:00', '2019-04-28 18:30:00'),
(106, NULL, 6, 'Alternative English', 105, 0, 0, NULL, '2019-04-28 18:30:00', '2019-04-28 18:30:00'),
(107, NULL, 6, 'MIL', 105, 0, 0, NULL, '2019-04-28 18:30:00', '2019-04-28 18:30:00'),
(108, NULL, 6, 'Assamese', 107, 0, 0, NULL, '2019-04-28 18:30:00', '2019-04-28 18:30:00'),
(109, NULL, 6, 'Boro', 107, 0, 0, NULL, '2019-04-28 18:30:00', '2019-04-28 18:30:00'),
(110, NULL, 6, 'Bengali', 107, 0, 0, NULL, '2019-04-28 18:30:00', '2019-04-28 18:30:00'),
(111, NULL, 6, 'Hindi', 107, 0, 0, NULL, '2019-04-28 18:30:00', '2019-04-28 18:30:00'),
(112, NULL, 6, 'Nepali', 107, 0, 0, NULL, '2019-04-28 18:30:00', '2019-04-28 18:30:00'),
(113, NULL, 6, 'English', NULL, 0, 1, NULL, '2019-05-06 18:30:00', '2019-05-06 18:30:00'),
(114, NULL, 6, 'Assamese', NULL, 0, 1, NULL, '2019-05-06 18:30:00', '2019-05-06 18:30:00'),
(115, NULL, 6, 'Hindi', NULL, 0, 1, NULL, '2019-05-06 18:30:00', '2019-05-06 18:30:00'),
(116, NULL, 6, 'Bengali', NULL, 0, 1, NULL, '2019-05-06 18:30:00', '2019-05-06 18:30:00'),
(117, NULL, 6, 'Political Science', NULL, 0, 1, NULL, '2019-05-06 18:30:00', '2019-05-06 18:30:00'),
(118, NULL, 6, 'Economics', NULL, 0, 1, NULL, '2019-05-06 18:30:00', '2019-05-06 18:30:00'),
(119, NULL, 6, 'Philosophy', NULL, 0, 1, NULL, '2019-05-06 18:30:00', '2019-05-06 18:30:00'),
(120, NULL, 6, 'Geography', NULL, 0, 1, NULL, '2019-05-06 18:30:00', '2019-05-06 18:30:00'),
(121, NULL, 6, 'Sanskrit', NULL, 0, 1, NULL, '2019-05-06 18:30:00', '2019-05-06 18:30:00'),
(122, NULL, 6, 'Education', NULL, 0, 1, NULL, '2019-05-06 18:30:00', '2019-05-06 18:30:00'),
(123, NULL, 6, 'Mathematics', NULL, 0, 1, NULL, '2019-05-06 18:30:00', '2019-05-06 18:30:00'),
(124, NULL, 6, 'History', NULL, 0, 1, NULL, '2019-05-06 18:30:00', '2019-05-06 18:30:00'),
(125, NULL, 6, 'Statistics', NULL, 0, 1, NULL, '2019-05-06 18:30:00', '2019-05-06 18:30:00'),
(126, NULL, 6, 'Home Science', NULL, 0, 1, NULL, '2019-05-06 18:30:00', '2019-05-06 18:30:00'),
(127, NULL, 6, 'Psychology', NULL, 0, 1, NULL, '2019-05-06 18:30:00', '2019-05-06 18:30:00'),
(128, NULL, 6, 'History', NULL, 0, 0, NULL, '2019-05-06 18:30:00', '2019-05-06 18:30:00'),
(129, NULL, 6, 'Philosophy', NULL, 0, 0, NULL, '2019-05-06 18:30:00', '2019-05-06 18:30:00'),
(130, NULL, 6, 'Psychology', NULL, 0, 0, NULL, '2019-05-06 18:30:00', '2019-05-06 18:30:00'),
(131, NULL, 6, 'Political Science', NULL, 0, 0, NULL, '2019-05-06 18:30:00', '2019-05-06 18:30:00'),
(132, NULL, 6, 'Economics', NULL, 0, 0, NULL, '2019-05-06 18:30:00', '2019-05-06 18:30:00'),
(133, NULL, 6, 'Geography', NULL, 0, 0, NULL, '2019-05-06 18:30:00', '2019-05-06 18:30:00'),
(134, NULL, 6, 'Education', NULL, 0, 0, NULL, '2019-05-06 18:30:00', '2019-05-06 18:30:00'),
(135, NULL, 6, 'Sociology', NULL, 0, 0, NULL, '2019-05-06 18:30:00', '2019-05-06 18:30:00'),
(136, NULL, 6, 'NSL*', NULL, 0, 0, NULL, '2019-05-06 18:30:00', '2019-05-06 18:30:00'),
(137, NULL, 6, 'Mathematics', NULL, 0, 0, NULL, '2019-05-06 18:30:00', '2019-05-06 18:30:00'),
(138, NULL, 6, 'Sanskrit', NULL, 0, 0, NULL, '2019-05-06 18:30:00', '2019-05-06 18:30:00'),
(139, NULL, 6, 'Home Science', NULL, 0, 0, NULL, '2019-05-06 18:30:00', '2019-05-06 18:30:00'),
(140, NULL, 6, 'Statistics', NULL, 0, 0, NULL, '2019-05-06 18:30:00', '2019-05-06 18:30:00'),
(141, NULL, 7, 'English', NULL, 1, 0, NULL, '2019-04-28 18:30:00', '2019-04-28 18:30:00'),
(142, NULL, 7, 'Alternative English/MIL', NULL, 1, 0, NULL, '2019-04-28 18:30:00', '2019-04-28 18:30:00'),
(143, NULL, 7, 'Alternative English', 142, 0, 0, NULL, '2019-04-28 18:30:00', '2019-04-28 18:30:00'),
(144, NULL, 7, 'MIL', 142, 0, 0, NULL, '2019-04-28 18:30:00', '2019-04-28 18:30:00'),
(145, NULL, 7, 'Assamese', 144, 0, 0, NULL, '2019-04-28 18:30:00', '2019-04-28 18:30:00'),
(146, NULL, 7, 'Boro', 144, 0, 0, NULL, '2019-04-28 18:30:00', '2019-04-28 18:30:00'),
(147, NULL, 7, 'Bengali', 144, 0, 0, NULL, '2019-04-28 18:30:00', '2019-04-28 18:30:00'),
(148, NULL, 7, 'Hindi', 144, 0, 0, NULL, '2019-04-28 18:30:00', '2019-04-28 18:30:00'),
(149, NULL, 7, 'Nepali', 144, 0, 0, NULL, '2019-04-28 18:30:00', '2019-04-28 18:30:00'),
(150, NULL, 7, 'Economics', NULL, 0, 0, NULL, '2019-05-06 18:30:00', '2019-05-06 18:30:00'),
(151, NULL, 7, 'Philosophy', NULL, 0, 0, NULL, '2019-05-06 18:30:00', '2019-05-06 18:30:00'),
(152, NULL, 7, 'Political Science', NULL, 0, 0, NULL, '2019-05-06 18:30:00', '2019-05-06 18:30:00'),
(153, NULL, 7, 'Geography', NULL, 0, 0, NULL, '2019-05-06 18:30:00', '2019-05-06 18:30:00'),
(154, NULL, 7, 'Home Science', NULL, 0, 0, NULL, '2019-05-06 18:30:00', '2019-05-06 18:30:00'),
(155, NULL, 7, 'Psychology', NULL, 0, 0, NULL, '2019-05-06 18:30:00', '2019-05-06 18:30:00'),
(156, NULL, 7, 'Education', NULL, 0, 0, NULL, '2019-05-06 18:30:00', '2019-05-06 18:30:00'),
(157, NULL, 7, 'History', NULL, 0, 0, NULL, '2019-05-06 18:30:00', '2019-05-06 18:30:00'),
(158, NULL, 7, 'Nepali Second Language (NSL)', NULL, 0, 0, NULL, '2019-05-06 18:30:00', '2019-05-06 18:30:00'),
(159, NULL, 7, 'Sociology', NULL, 0, 0, NULL, '2019-05-06 18:30:00', '2019-05-06 18:30:00'),
(160, NULL, 7, 'Tourism and travel management', NULL, 0, 0, NULL, '2019-05-06 18:30:00', '2019-05-06 18:30:00'),
(161, NULL, 8, 'Business Mathematics', NULL, 1, 0, NULL, '2019-05-06 18:30:00', '2019-05-06 18:30:00'),
(162, NULL, 8, 'Financial Accounting-I', NULL, 1, 0, NULL, '2019-05-06 18:30:00', '2019-05-06 18:30:00'),
(163, NULL, 8, 'Business Organization & Entrepreneurship Development', NULL, 1, 0, NULL, '2019-05-06 18:30:00', '2019-05-06 18:30:00'),
(164, NULL, 8, 'Indian Financial System', NULL, 1, 0, NULL, '2019-05-06 18:30:00', '2019-05-06 18:30:00'),
(165, NULL, 8, 'Accountancy(with special paper Cost Accounting)', NULL, 0, 1, NULL, '2019-05-06 18:30:00', '2019-05-06 18:30:00'),
(166, NULL, 8, 'Management(with special paper Human Resource Management)', NULL, 0, 1, NULL, '2019-05-06 18:30:00', '2019-05-06 18:30:00'),
(167, NULL, 8, 'Finance(with special paper Rural & Micro Finance)', NULL, 0, 1, NULL, '2019-05-06 18:30:00', '2019-05-06 18:30:00'),
(168, NULL, 9, 'Fundamentals of insurance', NULL, 1, 0, NULL, '2019-05-06 18:30:00', '2019-05-06 18:30:00'),
(169, NULL, 9, 'Business Mathematics', NULL, 1, 0, NULL, '2019-05-06 18:30:00', '2019-05-06 18:30:00'),
(170, NULL, 9, 'Financial Accounting-I', NULL, 1, 0, NULL, '2019-05-06 18:30:00', '2019-05-06 18:30:00'),
(171, NULL, 9, 'Business Organization', NULL, 1, 0, NULL, '2019-05-06 18:30:00', '2019-05-06 18:30:00'),
(172, NULL, 9, 'Entrepreneurship Development', NULL, 1, 0, NULL, '2019-05-06 18:30:00', '2019-05-06 18:30:00'),
(173, NULL, 9, 'Indian Financial System', NULL, 1, 0, NULL, '2019-05-06 18:30:00', '2019-05-06 18:30:00'),
(174, NULL, 4, 'Chemistry', NULL, 0, 0, NULL, '2019-05-06 18:30:00', '2019-05-06 18:30:00'),
(175, NULL, 4, 'Statistics', NULL, 0, 0, NULL, '2019-05-06 18:30:00', '2019-05-06 18:30:00'),
(176, NULL, 4, 'Computer Science', NULL, 0, 0, NULL, '2019-05-06 18:30:00', '2019-05-06 18:30:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_username_unique` (`username`);

--
-- Indexes for table `admin_password_resets`
--
ALTER TABLE `admin_password_resets`
  ADD KEY `admin_password_resets_email_index` (`email`),
  ADD KEY `admin_password_resets_token_index` (`token`);

--
-- Indexes for table `applications`
--
ALTER TABLE `applications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `applied_streams`
--
ALTER TABLE `applied_streams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `applied_subjects`
--
ALTER TABLE `applied_subjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `approved_lists`
--
ALTER TABLE `approved_lists`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `castes`
--
ALTER TABLE `castes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fees`
--
ALTER TABLE `fees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fee_heads`
--
ALTER TABLE `fee_heads`
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
-- Indexes for table `rejected_lists`
--
ALTER TABLE `rejected_lists`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sections`
--
ALTER TABLE `sections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `semesters`
--
ALTER TABLE `semesters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staffs`
--
ALTER TABLE `staffs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `staffs_username_unique` (`username`);

--
-- Indexes for table `staffs_password_resets`
--
ALTER TABLE `staffs_password_resets`
  ADD KEY `staffs_password_resets_email_index` (`email`),
  ADD KEY `staffs_password_resets_token_index` (`token`);

--
-- Indexes for table `streams`
--
ALTER TABLE `streams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `students_mobile_no_unique` (`mobile_no`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `applications`
--
ALTER TABLE `applications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `applied_streams`
--
ALTER TABLE `applied_streams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `applied_subjects`
--
ALTER TABLE `applied_subjects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `approved_lists`
--
ALTER TABLE `approved_lists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `castes`
--
ALTER TABLE `castes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `fees`
--
ALTER TABLE `fees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fee_heads`
--
ALTER TABLE `fee_heads`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `rejected_lists`
--
ALTER TABLE `rejected_lists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `sections`
--
ALTER TABLE `sections`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `semesters`
--
ALTER TABLE `semesters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `staffs`
--
ALTER TABLE `staffs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `streams`
--
ALTER TABLE `streams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=177;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
