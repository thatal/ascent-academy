-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 20, 2019 at 05:46 AM
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
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` bigint(20) NOT NULL,
  `uuid` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stream_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject_no` int(11) DEFAULT NULL,
  `is_compulsory` int(11) NOT NULL,
  `is_major` int(11) NOT NULL COMMENT '1:yes, 0:no',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`stream_id`, `name`, `subject_no`, `is_compulsory`, `is_major`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'English', 1, 1, 0, NULL, '2019-04-28 13:00:00', '2019-04-28 13:00:00'),
(1, 'Alternative English', 2, 1, 0, NULL, '2019-04-28 13:00:00', '2019-04-28 13:00:00'),
(1, 'Assamese', 2, 1, 0, NULL, '2019-04-28 13:00:00', '2019-04-28 13:00:00'),
(1, 'Boro', 2, 1, 0, NULL, '2019-04-28 13:00:00', '2019-04-28 13:00:00'),
(1, 'Bengali', 2, 1, 0, NULL, '2019-04-28 13:00:00', '2019-04-28 13:00:00'),
(1, 'Hindi', 2, 1, 0, NULL, '2019-04-28 13:00:00', '2019-04-28 13:00:00'),
(1, 'Nepali', 2, 1, 0, NULL, '2019-04-28 13:00:00', '2019-04-28 13:00:00'),
(1, 'Physics + Chemistry + Mathematics + Biology', 3, 0, 0, NULL, '2019-04-28 13:00:00', '2019-04-28 13:00:00'),
(1, 'Physics+ Chemistry + Mathematics + Statistics ', 3, 0, 0, NULL, '2019-04-28 13:00:00', '2019-04-28 13:00:00'),
(1, 'Physics + Chemistry + Mathematics +Geography', 3, 0, 0, NULL, '2019-04-28 13:00:00', '2019-04-28 13:00:00'),
(1, 'Physics + Economics + Statistics + Mathematics', 3, 0, 0, NULL, '2019-04-28 13:00:00', '2019-04-28 13:00:00'),
(1, 'Physics + Chemistry + Mathematics + Computer Science & Application', 3, 0, 0, NULL, '2019-04-28 13:00:00', '2019-04-28 13:00:00'),
(1, ' Economics + Statistics + Mathematics + Computer Science & Application', 3, 0, 0, NULL, '2019-04-28 13:00:00', '2019-04-28 13:00:00'),
(1, 'Physics + Mathematics + Geography + Computer Science & Application', 3, 0, 0, NULL, '2019-04-28 13:00:00', '2019-04-28 13:00:00'),
(2, 'English', 1, 1, 0, NULL, '2019-04-28 13:00:00', '2019-04-28 13:00:00'),
(2, 'Alternative English', 2, 1, 0, NULL, '2019-04-28 13:00:00', '2019-04-28 13:00:00'),
(2, 'Assamese', 2, 1, 0, NULL, '2019-04-28 13:00:00', '2019-04-28 13:00:00'),
(2, 'Boro', 2, 1, 0, NULL, '2019-04-28 13:00:00', '2019-04-28 13:00:00'),
(2, 'Bengali', 2, 1, 0, NULL, '2019-04-28 13:00:00', '2019-04-28 13:00:00'),
(2, 'Hindi', 2, 1, 0, NULL, '2019-04-28 13:00:00', '2019-04-28 13:00:00'),
(2, 'Nepali', 2, 1, 0, NULL, '2019-04-28 13:00:00', '2019-04-28 13:00:00'),
(2, 'Economics', 3, 0, 0, NULL, '2019-04-28 13:00:00', '2019-04-28 13:00:00'),
(2, 'Education', 3, 0, 0, NULL, '2019-04-28 13:00:00', '2019-04-28 13:00:00'),
(2, 'History', 3, 0, 0, NULL, '2019-04-28 13:00:00', '2019-04-28 13:00:00'),
(2, 'Sociology', 3, 0, 0, NULL, '2019-04-28 13:00:00', '2019-04-28 13:00:00'),
(2, 'Home Science ', 3, 0, 0, NULL, '2019-04-28 13:00:00', '2019-04-28 13:00:00'),
(2, 'Political Science', 3, 0, 0, NULL, '2019-04-28 13:00:00', '2019-04-28 13:00:00'),
(2, 'Mathematics* (* Eco+Stats+Maths combination)', 3, 0, 0, NULL, '2019-04-28 13:00:00', '2019-04-28 13:00:00'),
(2, 'Geography', 3, 0, 0, NULL, '2019-04-28 13:00:00', '2019-04-28 13:00:00'),
(2, 'Statistics', 3, 0, 0, NULL, '2019-04-28 13:00:00', '2019-04-28 13:00:00'),
(2, 'Logic & Philosophy', 3, 0, 0, NULL, '2019-04-28 13:00:00', '2019-04-28 13:00:00'),
(2, 'Psychology ', 3, 0, 0, NULL, '2019-04-28 13:00:00', '2019-04-28 13:00:00'),
(2, 'Computer Science & Application ', 3, 0, 0, NULL, '2019-04-28 13:00:00', '2019-04-28 13:00:00'),
(2, 'Sanskrit', 3, 0, 0, NULL, '2019-04-28 13:00:00', '2019-04-28 13:00:00'),
(2, 'Assamese Second Language', 3, 0, 0, NULL, '2019-04-28 13:00:00', '2019-04-28 13:00:00'),
(2, 'Bengali Second Language', 3, 0, 0, NULL, '2019-04-28 13:00:00', '2019-04-28 13:00:00'),
(2, 'Hindi Second Language', 3, 0, 0, NULL, '2019-04-28 13:00:00', '2019-04-28 13:00:00'),
(2, 'E.S.L (E.S.L is allowed but not taught in the college) ', 3, 0, 0, NULL, '2019-04-28 13:00:00', '2019-04-28 13:00:00'),
(2, 'Computer Science', 3, 0, 0, NULL, '2019-04-28 13:00:00', '2019-04-28 13:00:00'),
(2, 'Economics', 4, 0, 0, NULL, '2019-04-28 13:00:00', '2019-04-28 13:00:00'),
(2, 'Education', 4, 0, 0, NULL, '2019-04-28 13:00:00', '2019-04-28 13:00:00'),
(2, 'History', 4, 0, 0, NULL, '2019-04-28 13:00:00', '2019-04-28 13:00:00'),
(2, 'Home Science ', 4, 0, 0, NULL, '2019-04-28 13:00:00', '2019-04-28 13:00:00'),
(2, 'Political Science', 4, 0, 0, NULL, '2019-04-28 13:00:00', '2019-04-28 13:00:00'),
(2, 'Mathematics* (* Eco+Stats+Maths combination)', 4, 0, 0, NULL, '2019-04-28 13:00:00', '2019-04-28 13:00:00'),
(2, 'Geography', 4, 0, 0, NULL, '2019-04-28 13:00:00', '2019-04-28 13:00:00'),
(2, 'Statistics', 4, 0, 0, NULL, '2019-04-28 13:00:00', '2019-04-28 13:00:00'),
(2, 'Logic & Philosophy', 4, 0, 0, NULL, '2019-04-28 13:00:00', '2019-04-28 13:00:00'),
(2, 'Psychology ', 4, 0, 0, NULL, '2019-04-28 13:00:00', '2019-04-28 13:00:00'),
(2, 'Computer Science & Application ', 4, 0, 0, NULL, '2019-04-28 13:00:00', '2019-04-28 13:00:00'),
(2, 'Sanskrit', 4, 0, 0, NULL, '2019-04-28 13:00:00', '2019-04-28 13:00:00'),
(2, 'Assamese Second Language', 4, 0, 0, NULL, '2019-04-28 13:00:00', '2019-04-28 13:00:00'),
(2, 'Bengali Second Language', 4, 0, 0, NULL, '2019-04-28 13:00:00', '2019-04-28 13:00:00'),
(2, 'Hindi Second Language', 4, 0, 0, NULL, '2019-04-28 13:00:00', '2019-04-28 13:00:00'),
(2, 'E.S.L (E.S.L is allowed but not taught in the college) ', 4, 0, 0, NULL, '2019-04-28 13:00:00', '2019-04-28 13:00:00'),
(2, 'Computer Science', 4, 0, 0, NULL, '2019-04-28 13:00:00', '2019-04-28 13:00:00'),
(2, 'Home Science ', 5, 0, 0, NULL, '2019-04-28 13:00:00', '2019-04-28 13:00:00'),
(2, 'Political Science', 5, 0, 0, NULL, '2019-04-28 13:00:00', '2019-04-28 13:00:00'),
(2, 'Mathematics* (* Eco+Stats+Maths combination)', 5, 0, 0, NULL, '2019-04-28 13:00:00', '2019-04-28 13:00:00'),
(2, 'Geography', 5, 0, 0, NULL, '2019-04-28 13:00:00', '2019-04-28 13:00:00'),
(2, 'Statistics', 5, 0, 0, NULL, '2019-04-28 13:00:00', '2019-04-28 13:00:00'),
(2, 'Logic & Philosophy', 5, 0, 0, NULL, '2019-04-28 13:00:00', '2019-04-28 13:00:00'),
(2, 'Psychology ', 5, 0, 0, NULL, '2019-04-28 13:00:00', '2019-04-28 13:00:00'),
(2, 'Computer Science & Application ', 5, 0, 0, NULL, '2019-04-28 13:00:00', '2019-04-28 13:00:00'),
(2, 'Sanskrit', 5, 0, 0, NULL, '2019-04-28 13:00:00', '2019-04-28 13:00:00'),
(2, 'Assamese Second Language', 5, 0, 0, NULL, '2019-04-28 13:00:00', '2019-04-28 13:00:00'),
(2, 'Bengali Second Language', 5, 0, 0, NULL, '2019-04-28 13:00:00', '2019-04-28 13:00:00'),
(2, 'Hindi Second Language', 5, 0, 0, NULL, '2019-04-28 13:00:00', '2019-04-28 13:00:00'),
(2, 'E.S.L (E.S.L is allowed but not taught in the college) ', 5, 0, 0, NULL, '2019-04-28 13:00:00', '2019-04-28 13:00:00'),
(2, 'Computer Science', 5, 0, 0, NULL, '2019-04-28 13:00:00', '2019-04-28 13:00:00'),
(2, 'Home Science ', 5, 0, 0, NULL, '2019-04-28 13:00:00', '2019-04-28 13:00:00'),
(2, 'Political Science', 6, 0, 0, NULL, '2019-04-28 13:00:00', '2019-04-28 13:00:00'),
(2, 'Mathematics* (* Eco+Stats+Maths combination)', 6, 0, 0, NULL, '2019-04-28 13:00:00', '2019-04-28 13:00:00'),
(2, 'Geography', 6, 0, 0, NULL, '2019-04-28 13:00:00', '2019-04-28 13:00:00'),
(2, 'Statistics', 6, 0, 0, NULL, '2019-04-28 13:00:00', '2019-04-28 13:00:00'),
(2, 'Logic & Philosophy', 6, 0, 0, NULL, '2019-04-28 13:00:00', '2019-04-28 13:00:00'),
(2, 'Psychology ', 6, 0, 0, NULL, '2019-04-28 13:00:00', '2019-04-28 13:00:00'),
(2, 'Computer Science & Application ', 6, 0, 0, NULL, '2019-04-28 13:00:00', '2019-04-28 13:00:00'),
(2, 'Sanskrit', 6, 0, 0, NULL, '2019-04-28 13:00:00', '2019-04-28 13:00:00'),
(2, 'Assamese Second Language', 6, 0, 0, NULL, '2019-04-28 13:00:00', '2019-04-28 13:00:00'),
(2, 'Bengali Second Language', 6, 0, 0, NULL, '2019-04-28 13:00:00', '2019-04-28 13:00:00'),
(2, 'Hindi Second Language', 6, 0, 0, NULL, '2019-04-28 13:00:00', '2019-04-28 13:00:00'),
(2, 'E.S.L (E.S.L is allowed but not taught in the college) ', 6, 0, 0, NULL, '2019-04-28 13:00:00', '2019-04-28 13:00:00'),
(2, 'Computer Science', 6, 0, 0, NULL, '2019-04-28 13:00:00', '2019-04-28 13:00:00'),
(3, 'English', 1, 1, 0, NULL, '2019-04-28 13:00:00', '2019-04-28 13:00:00'),
(3, 'Alternative English', 2, 1, 0, NULL, '2019-04-28 13:00:00', '2019-04-28 13:00:00'),
(3, 'Assamese', 2, 1, 0, NULL, '2019-04-28 13:00:00', '2019-04-28 13:00:00'),
(3, 'Boro', 2, 1, 0, NULL, '2019-04-28 13:00:00', '2019-04-28 13:00:00'),
(3, 'Bengali', 2, 1, 0, NULL, '2019-04-28 13:00:00', '2019-04-28 13:00:00'),
(3, 'Hindi', 2, 1, 0, NULL, '2019-04-28 13:00:00', '2019-04-28 13:00:00'),
(3, 'Nepali', 2, 1, 0, NULL, '2019-04-28 13:00:00', '2019-04-28 13:00:00'),
(3, 'Accountancy', 3, 1, 0, NULL, '2019-04-28 13:00:00', '2019-04-28 13:00:00'),
(3, 'Business Studies ', 4, 1, 0, NULL, '2019-04-28 13:00:00', '2019-04-28 13:00:00'),
(3, 'Economics', 5, 0, 0, NULL, '2019-04-28 13:00:00', '2019-04-28 13:00:00'),
(3, 'Banking', 5, 0, 0, NULL, '2019-04-28 13:00:00', '2019-04-28 13:00:00'),
(3, 'Commercial Mathematics and Statistics (C.M.S.T.)', 5, 0, 0, NULL, '2019-04-28 13:00:00', '2019-04-28 13:00:00'),
(3, 'Mathematics', 5, 0, 0, NULL, '2019-04-28 13:00:00', '2019-04-28 13:00:00'),
(3, 'Computer Science & Application', 5, 0, 0, NULL, '2019-04-28 13:00:00', '2019-04-28 13:00:00'),
(3, 'Economics', 6, 0, 0, NULL, '2019-04-28 13:00:00', '2019-04-28 13:00:00'),
(3, 'Banking', 6, 0, 0, NULL, '2019-04-28 13:00:00', '2019-04-28 13:00:00'),
(3, 'Commercial Mathematics and Statistics (C.M.S.T.)', 6, 0, 0, NULL, '2019-04-28 13:00:00', '2019-04-28 13:00:00'),
(3, 'Mathematics', 6, 0, 0, NULL, '2019-04-28 13:00:00', '2019-04-28 13:00:00'),
(3, 'Computer Science & Application', 6, 0, 0, NULL, '2019-04-28 13:00:00', '2019-04-28 13:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=213;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
