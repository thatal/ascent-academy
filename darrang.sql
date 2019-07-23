-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 08, 2019 at 12:07 PM
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
  `reserve_quota` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nationality` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `district` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `present_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parmanent_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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
  `total_marks` int(11) NOT NULL,
  `percentage` int(11) NOT NULL,
  `year` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `blood_group` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `marksheet` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pass_certificate` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `caste_certificate` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `passport` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sign` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_confirmed` int(11) NOT NULL DEFAULT '0' COMMENT '0: not confirmed; 1:confirmed',
  `payment_status` int(11) NOT NULL DEFAULT '0' COMMENT '0:not paid/failed; 1:success',
  `status` int(11) NOT NULL DEFAULT '0' COMMENT '0:default; 1: approved; 2: rejected',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `applications`
--

INSERT INTO `applications` (`id`, `uuid`, `student_id`, `fullname`, `course_id`, `semester_id`, `gender`, `dob`, `fathers_name`, `mothers_name`, `annual_income`, `religion`, `caste_id`, `reserve_quota`, `nationality`, `state`, `district`, `city`, `pin`, `present_address`, `parmanent_address`, `last_board_or_university`, `last_exam_roll`, `last_exam_no`, `sub_1_name`, `sub_1_total`, `sub_1_score`, `sub_2_name`, `sub_2_total`, `sub_2_score`, `sub_3_name`, `sub_3_total`, `sub_3_score`, `sub_4_name`, `sub_4_total`, `sub_4_score`, `sub_5_name`, `sub_5_total`, `sub_5_score`, `sub_6_name`, `sub_6_total`, `sub_6_score`, `total_marks`, `percentage`, `year`, `blood_group`, `marksheet`, `pass_certificate`, `caste_certificate`, `passport`, `sign`, `is_confirmed`, `payment_status`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1000, '76357bc8-aaa5-417c-beb2-bd451955d5a3', 1, 'Rupam Bordoloi', 1, 1, 'Male', '2019-04-30', 'gjfgf', 'fgjf', 757, 'Hindu', 6, NULL, 'fgjf', 'dfh', 'fgjfj', 'fhdh', 'dfhdh', 'fhdfh', 'fgjfgj', 'fjfj', 'fgjfj', 'fgjf', 'sub one', 0, 0, 'sub two', 0, 0, 'sub three', 0, 0, 'sub four', 0, 0, 'sub five', 0, 0, 'sub six', 0, 0, 30, 6, '2019', 'fgjfj', '', NULL, NULL, 'public/uploads/1/04052019-passport.jpg', 'public/uploads/1/04052019-sign.jpg', 1, 1, 1, NULL, '2019-04-30 05:50:56', '2019-05-05 21:07:32'),
(1002, 'c118329e-ede6-402e-afb2-91d3cfb8583e', 1, 'dfb dfbdb dfb', 1, 1, 'Male', '2019-05-15', 'gfhjf', 'gfhjdfh', 4555, 'Hindu', 2, 'dhdh', 'dfhdh', 'dfh', 'dfhdh', 'fhdh', 'dfhdh', 'fhdfh', 'dfhdh', 'sgsg', 'sgsg', 'sdgsg', 'sdgs', 100, 50, 'sdgsgs', 100, 50, 'dgsgs', 100, 50, 'dgsg', 100, 50, 'gsdgs', 100, 50, 'gsdg', 100, 50, 300, 50, '2019', 'rgdf', '04052019-marksheet.png', '04052019-pass_certificate.jpg', '04052019-caste_certificate.jpg', 'public/uploads/1/04052019-passport.jpg', 'public/uploads/1/04052019-sign.jpg', 0, 0, 0, NULL, '2019-05-04 06:39:12', '2019-05-04 06:39:12'),
(1003, 'e3ec5449-f944-428f-b232-fac396d8ed7f', 1, 'dfb dfbdb dfb', 1, 1, 'Male', '2019-05-08', 'sfdf', 'dfhd', 656858, 'Hindu', 3, 'dfhd', 'dfhd', 'dfh', 'dfhdh', 'fhdh', 'dfhdh', 'fhdfh', 'fhdfh', 'fgjf', 'fgjf', 'fgjfj', 'fgjf', 100, 50, 'fgjf', 100, 50, 'fgjf', 100, 50, 'fgjf', 100, 50, 'fgjf', 100, 50, 'fgjf', 100, 50, 300, 50, '2019', 'gjfgj', '04052019-marksheet.jpg', '04052019-pass_certificate.jpg', '04052019-caste_certificate.jpg', 'public/uploads/1/04052019-passport.jpg', 'public/uploads/1/04052019-sign.jpg', 0, 0, 0, NULL, '2019-05-04 06:43:41', '2019-05-04 06:43:41'),
(1004, 'dcb457a1-31bd-445b-a377-8688b3804a52', 1, 'dfb dfbdb dfb', 1, 1, 'Male', '2019-05-28', 'dghdfg', 'dfghdf', 45747, 'Hindu', 4, 'dfghdf', 'df', 'dfh', 'dfgfgh', 'fhdh', 'dfhdh', 'fhdfh', 'dfhdfh', 'dfhd', 'dfhd', 'dfhd', 'dfhd', 100, 50, 'dfhdh', 100, 50, 'dfhddfdf', 100, 50, 'dfhd', 100, 50, 'dfhd', 100, 50, 'dfhdfh', 100, 50, 300, 50, '2019', 'dff', 'public/uploads/1/04052019-marksheet.jpg', 'public/uploads/1/04052019-pass_certificate.jpg', 'public/uploads/1/04052019-caste_certificate.jpg', 'public/uploads/1/04052019-passport.jpg', 'public/uploads/1/04052019-sign.jpg', 0, 0, 0, NULL, '2019-05-04 06:46:20', '2019-05-04 06:46:20'),
(1005, 'b2b3164d-5fdf-441d-a366-0d21531bf73f', 3, 'shaukat', 1, 1, 'Male', '2018-09-04', 'fhdfh', 'dfhjd', 3525345, 'Hindu', 2, 'dfhdh', 'dfhd', 'dfh', 'dfhdh', 'fhdh', 'dfhdh', 'fhdfh', 'fhdfh', 'seba', '123', '34', 'sgsdgsd', 100, 50, 'sdfgd', 100, 50, 'sdgsdg', 100, 50, 'sdgsg', 100, 50, 'sgsdg', 100, 50, 'sdgs', 100, 50, 300, 50, '2019', 'hdgh', 'public/uploads/3/06052019-marksheet.jpg', 'public/uploads/3/06052019-pass_certificate.jpg', 'public/uploads/3/06052019-caste_certificate.jpg', 'public/uploads/3/06052019-passport.jpg', 'public/uploads/3/06052019-sign.jpg', 1, 1, 2, NULL, '2019-05-05 20:41:21', '2019-05-05 21:10:30'),
(1006, '9e977fe0-1e15-4046-b2e4-6be099bf1623', 4, 'Deepjyoti Kalita', 1, 1, 'Male', '1986-01-15', 'Mr. Khargeswar Kalita', 'Narmada Kalita', 600000, 'Hindu', 1, NULL, 'Indian', 'Assam', 'Kamrup (M)', 'Guwahati', '781021', 'Chandmari', 'Guwahati - 21', 'Ignou university', '9401154260', 'BA-85453', 'Maths', 100, 95, 'English', 100, 87, 'Social Studies', 100, 98, 'Science', 100, 85, 'Hindi', 100, 97, 'Assamese', 100, 99, 561, 94, '2019', 'O+', 'public/uploads/4/06052019-marksheet.PDF', 'public/uploads/4/06052019-pass_certificate.jpg', '', 'public/uploads/4/06052019-passport.jpg', 'public/uploads/4/06052019-sign.jpg', 1, 1, 1, NULL, '2019-05-06 00:27:27', '2019-05-06 00:31:54'),
(1007, 'ebb97bd3-ea57-4fed-9459-b4821a9a59c5', 4, 'Deepjyoti Kalita', 1, 1, 'Male', '2000-01-01', 'Test Test', 'Test Test', 200000, 'Muslim', 2, NULL, 'Indian', 'Assam', 'Sonitpur', 'Tezpur', '784001', 'Tezpur', 'Tezpur', 'AHSEC', 'B-158', '458796', 'English', 10, 6, 'Maths', 10, 8, 'Social Studies', 10, 7, 'Science', 10, 8, 'Alt. Eng', 10, 5, 'Geography', 10, 5, 374, 62, '2019', 'O-', 'public/uploads/4/06052019-marksheet.jpg', 'public/uploads/4/06052019-pass_certificate.PDF', 'public/uploads/4/06052019-caste_certificate.jpg', 'public/uploads/4/06052019-passport.jpg', 'public/uploads/4/06052019-sign.jpg', 0, 0, 0, NULL, '2019-05-06 00:48:56', '2019-05-06 00:48:56'),
(1008, '6f2da38e-53d9-442b-99d3-773982b96459', 4, 'Jeuti Deka', 1, 1, 'female', '2000-01-01', 'Test Test', 'Test Test', 458721, 'Hindu', 5, 'NA', 'Indian', 'Assam', 'Jorhat', 'Teok', '785564', 'Teok', 'Teok', 'AHSEC', 'A-45872', '5245', 'English', 10, 7.9, 'Maths', 10, 8.6, 'Social Science', 10, 5.6, 'Social Studies', 10, 8.7, 'Economics', 10, 7.9, 'History', 10, 6.8, 432, 72, '2019', 'AB+', 'public/uploads/4/06052019-marksheet.jpg', 'public/uploads/4/06052019-pass_certificate.jpg', 'public/uploads/4/06052019-caste_certificate.jpg', 'public/uploads/4/06052019-passport.jpg', 'public/uploads/4/06052019-sign.jpg', 1, 1, 2, NULL, '2019-05-06 01:07:46', '2019-05-06 01:09:17');

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
(4, '3be9dcb1-e435-4e00-a042-1369b8f1f3a0', 1, 1000, 1, '2019-05-02 23:44:27', '2019-04-30 05:50:56', '2019-05-02 23:44:27'),
(5, 'bed621b0-d283-4545-bc75-5ee9414b17bd', 1, 1000, 1, '2019-05-02 23:44:27', '2019-05-02 23:37:19', '2019-05-02 23:44:27'),
(6, 'cd815216-94e6-401b-a012-d8db7a1a5ae0', 1, 1000, 1, NULL, '2019-05-02 23:44:27', '2019-05-02 23:44:27'),
(7, '799f7cc5-1b1f-46e8-9e94-73b988329946', 1, 1002, 1, NULL, '2019-05-04 06:39:12', '2019-05-04 06:39:12'),
(8, '01950a39-376a-452f-82cf-747a60d0bf30', 1, 1003, 1, NULL, '2019-05-04 06:43:41', '2019-05-04 06:43:41'),
(9, 'b877e14f-b082-434d-a857-6b90cd88bb83', 1, 1004, 2, NULL, '2019-05-04 06:46:20', '2019-05-04 06:46:20'),
(10, '171887ba-f42b-4036-84ab-d1fbd456b6f2', 3, 1005, 1, NULL, '2019-05-05 20:41:21', '2019-05-05 20:41:21'),
(11, 'ce592ddb-6594-4e9b-b9da-e8842e851bf2', 4, 1006, 2, NULL, '2019-05-06 00:27:27', '2019-05-06 00:27:27'),
(12, '907827f3-1ef7-4130-b477-5b27c6d51676', 4, 1007, 2, NULL, '2019-05-06 00:48:56', '2019-05-06 00:48:56'),
(14, '064e11ea-3bf1-4c87-8da6-406a983155f9', 4, 1008, 3, NULL, '2019-05-06 01:07:46', '2019-05-06 01:07:46');

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
(11, '2f5abbe9-a082-47f2-ba22-e2baba6304cd', 1, 1000, 10, 0, 0, 0, '2019-05-02 23:44:27', '2019-04-30 05:50:56', '2019-05-02 23:44:27'),
(12, '147eaf53-6637-4cd1-821b-1e9709e9c2e8', 1, 1000, 11, 0, 0, 0, '2019-05-02 23:44:27', '2019-04-30 05:50:56', '2019-05-02 23:44:27'),
(13, 'bbbe7b07-2cf3-49d2-a9f1-ba8ec55e854d', 1, 1000, 17, 0, 0, 0, '2019-05-02 23:44:27', '2019-04-30 05:50:56', '2019-05-02 23:44:27'),
(14, '8da68d55-e83e-4be5-b0ce-f983e01b095e', 1, 1000, 26, 0, 0, 0, '2019-05-02 23:44:27', '2019-04-30 05:50:56', '2019-05-02 23:44:27'),
(15, '8c920005-6048-4068-ba20-1878e01abb70', 1, 1000, 27, 0, 0, 0, '2019-05-02 23:44:27', '2019-04-30 05:50:56', '2019-05-02 23:44:27'),
(16, '63f5385a-5f79-4b6a-b9b1-6a9340446d40', 1, 1000, 1, 0, 0, 0, '2019-05-02 23:44:27', '2019-05-02 23:37:19', '2019-05-02 23:44:27'),
(17, 'cd918ca1-69d3-4fb0-a31e-a66827e8c83b', 1, 1000, 3, 0, 0, 0, '2019-05-02 23:44:27', '2019-05-02 23:37:19', '2019-05-02 23:44:27'),
(18, '2d5cc35c-bcfa-4a30-831a-fa4b55c8507a', 1, 1000, 1, 0, 0, 0, NULL, '2019-05-02 23:44:27', '2019-05-02 23:44:27'),
(19, '4c2e135a-f55a-4b39-bd04-9861c6078508', 1, 1000, 5, 0, 0, 0, NULL, '2019-05-02 23:44:27', '2019-05-02 23:44:27'),
(20, 'c690adc6-3dbe-4b7f-a46d-580ca8b19367', 1, 1000, 14, 0, 0, 0, NULL, '2019-05-02 23:44:27', '2019-05-02 23:44:27'),
(21, '0e8261a0-c709-4d3f-a8a7-6cfbe69c72b4', 1, 1000, 15, 0, 0, 0, NULL, '2019-05-02 23:44:27', '2019-05-02 23:44:27'),
(22, '6414341e-c07d-4e16-911d-fb9c58663fd1', 1, 1000, 16, 0, 0, 0, NULL, '2019-05-02 23:44:27', '2019-05-02 23:44:27'),
(23, 'afefbd54-71b2-47d9-8d5f-349be457130a', 1, 1002, 1, 0, 0, 0, NULL, '2019-05-04 06:39:12', '2019-05-04 06:39:12'),
(24, 'b4863526-cfec-499d-897f-bf5bffdfc5a3', 1, 1002, 6, 0, 0, 0, NULL, '2019-05-04 06:39:12', '2019-05-04 06:39:12'),
(25, 'c5d52a17-5538-4527-bc60-377a8f98dedf', 1, 1002, 10, 0, 0, 0, NULL, '2019-05-04 06:39:12', '2019-05-04 06:39:12'),
(26, 'a8ea2a86-c477-464e-acdf-ef225c3cb7a5', 1, 1002, 16, 0, 0, 0, NULL, '2019-05-04 06:39:12', '2019-05-04 06:39:12'),
(27, '912b283a-bb2c-4feb-9e73-b5fd71239a81', 1, 1003, 1, 0, 0, 0, NULL, '2019-05-04 06:43:41', '2019-05-04 06:43:41'),
(28, '2cc02e53-3077-4200-97a4-f7b42dfd2090', 1, 1003, 3, 0, 0, 0, NULL, '2019-05-04 06:43:41', '2019-05-04 06:43:41'),
(29, 'a73930c1-86eb-4837-ab27-255fb3822504', 1, 1003, 12, 0, 0, 0, NULL, '2019-05-04 06:43:41', '2019-05-04 06:43:41'),
(30, 'cddd74f6-2129-4cbf-925e-88750322ccb4', 1, 1003, 13, 0, 0, 0, NULL, '2019-05-04 06:43:41', '2019-05-04 06:43:41'),
(31, '95b2475b-c7d4-485e-95ae-8f9ec4d1e89d', 1, 1004, 17, 0, 0, 0, NULL, '2019-05-04 06:46:20', '2019-05-04 06:46:20'),
(32, '5b81a71e-0633-4a2c-98b4-1e8d41add6d3', 1, 1004, 27, 0, 0, 0, NULL, '2019-05-04 06:46:20', '2019-05-04 06:46:20'),
(33, 'fe19aa43-1e07-4599-b124-cdc8b05a5d9f', 1, 1004, 31, 0, 0, 0, NULL, '2019-05-04 06:46:20', '2019-05-04 06:46:20'),
(34, '34790290-5138-447e-b61c-4e508e31833a', 3, 1005, 1, 0, 0, 0, NULL, '2019-05-05 20:41:21', '2019-05-05 20:41:21'),
(35, '0a7eb785-1c68-4ba0-a2fa-1fc511a951ef', 3, 1005, 5, 0, 0, 0, NULL, '2019-05-05 20:41:21', '2019-05-05 20:41:21'),
(36, '8f460e9c-a19d-4424-b9ee-389edc106322', 3, 1005, 11, 0, 0, 0, NULL, '2019-05-05 20:41:21', '2019-05-05 20:41:21'),
(37, '94fa2def-67a8-4892-878e-5bbdc63b6269', 3, 1005, 12, 0, 0, 0, NULL, '2019-05-05 20:41:21', '2019-05-05 20:41:21'),
(38, '2bb22820-4560-43dc-bcad-8a4480dc7b50', 4, 1006, 17, 0, 0, 0, NULL, '2019-05-06 00:27:27', '2019-05-06 00:27:27'),
(39, '8a1c222e-6120-44fb-9f42-ee05c95e9a3b', 4, 1006, 32, 0, 0, 0, NULL, '2019-05-06 00:27:27', '2019-05-06 00:27:27'),
(40, '60e7df2c-be03-457d-ab3f-a8b700bd4eff', 4, 1006, 44, 0, 0, 0, NULL, '2019-05-06 00:27:27', '2019-05-06 00:27:27'),
(41, '5728ab08-bc22-45c9-a884-2c4260891bf9', 4, 1007, 17, 0, 0, 0, NULL, '2019-05-06 00:48:56', '2019-05-06 00:48:56'),
(42, '94e7164f-9ffb-417f-ba45-d1bc08d17535', 4, 1007, 19, 0, 0, 0, NULL, '2019-05-06 00:48:56', '2019-05-06 00:48:56'),
(43, '3991a96a-28e0-42fe-9e0c-b09d167732ad', 4, 1008, 17, 0, 0, 0, NULL, '2019-05-06 01:07:46', '2019-05-06 01:07:46'),
(44, 'a2dedd61-3b76-49e6-8175-d433f6c46be6', 4, 1008, 50, 0, 0, 0, NULL, '2019-05-06 01:07:46', '2019-05-06 01:07:46'),
(45, 'a3bb4281-95b0-4a60-bbdc-feb8a3f28b22', 4, 1008, 52, 0, 0, 0, NULL, '2019-05-06 01:07:46', '2019-05-06 01:07:46'),
(46, '1fc82089-9ec1-445d-83e7-7dee6b53da8e', 4, 1008, 59, 0, 0, 0, NULL, '2019-05-06 01:07:46', '2019-05-06 01:07:46'),
(47, 'fd45e06d-0e45-484c-8b8e-5e3abb67a45e', 4, 1008, 60, 0, 0, 0, NULL, '2019-05-06 01:07:46', '2019-05-06 01:07:46'),
(48, '8d3e6b48-228a-481c-b8c3-7d85f88aa446', 4, 1008, 61, 0, 0, 0, NULL, '2019-05-06 01:07:46', '2019-05-06 01:07:46'),
(49, '0e5c319a-ee57-4105-8f72-0978bec6ba13', 4, 1008, 62, 0, 0, 0, NULL, '2019-05-06 01:07:46', '2019-05-06 01:07:46');

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

--
-- Dumping data for table `approved_lists`
--

INSERT INTO `approved_lists` (`id`, `uuid`, `uid`, `student_id`, `application_id`, `course_id`, `semester_id`, `stream_id`, `approved_by`, `approved_by_id`, `category`, `year`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'dc7c2654-cdc4-41c2-bf08-00716a87ca47', '19SH0001', 1, 1000, 1, 1, 1, 'Admin', 1, 'Unreserved', 2019, NULL, '2019-05-05 21:07:33', '2019-05-05 21:07:33'),
(2, 'b367f3f9-74b5-48fb-901f-42b462ee07a7', '19AH0001', 4, 1006, 1, 1, 2, 'Admin', 1, 'Unreserved', 2019, NULL, '2019-05-06 00:31:54', '2019-05-06 00:31:54');

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
(5, NULL, 'SC', NULL, '2019-04-28 18:30:00', '2019-04-28 18:30:00'),
(6, NULL, 'PH', NULL, '2019-04-28 18:30:00', '2019-04-28 18:30:00');

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
(52, '2019_05_04_095523_create_rejected_lists_table', 5);

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

--
-- Dumping data for table `rejected_lists`
--

INSERT INTO `rejected_lists` (`id`, `uuid`, `student_id`, `application_id`, `course_id`, `semester_id`, `stream_id`, `reason`, `rejected_by`, `rejected_by_id`, `year`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, '1369f621-313e-4602-8591-db5267b4db78', 3, 1005, 1, 1, 1, 'False Mark Sheet', 'Admin', 1, 2019, NULL, '2019-05-05 21:10:30', '2019-05-05 21:10:30'),
(2, 'adfec482-aaf6-4fb3-96bf-dcf1772287a8', 4, 1008, 1, 1, 3, 'False documents', 'Admin', 1, 2019, NULL, '2019-05-06 01:09:17', '2019-05-06 01:09:17');

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
(5, '32ba9ae2-3b16-4cc3-8ed6-0f6ebfa3adc9', NULL, 'MAnoj', '7577035433', 'manoj@gmail.com', '$2y$10$e/zySpr.WaRpNOp.51lBhOAJms1i7KGDIz.UzRZj3pcshlYhWmq0m', NULL, NULL, '2019-05-06 02:43:55', '2019-05-06 02:43:55');

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
(90, NULL, 4, 'General English', NULL, 0, 1, NULL, '2019-05-06 18:30:00', '2019-05-06 18:30:00'),
(91, NULL, 4, 'Functional English', NULL, 0, 1, NULL, '2019-05-06 18:30:00', '2019-05-06 18:30:00'),
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
(173, NULL, 9, 'Indian Financial System', NULL, 1, 0, NULL, '2019-05-06 18:30:00', '2019-05-06 18:30:00');

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1009;

--
-- AUTO_INCREMENT for table `applied_streams`
--
ALTER TABLE `applied_streams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `applied_subjects`
--
ALTER TABLE `applied_subjects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `approved_lists`
--
ALTER TABLE `approved_lists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `castes`
--
ALTER TABLE `castes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `rejected_lists`
--
ALTER TABLE `rejected_lists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=174;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
