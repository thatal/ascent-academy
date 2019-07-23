-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 20, 2019 at 04:44 AM
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
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
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

INSERT INTO `subjects` (`stream_id`, `name`, `is_compulsory`, `is_major`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'English', 1, 0, NULL, '2019-04-28 18:30:00', '2019-04-28 18:30:00'),
(1, 'Alternative English', 0, 0, NULL, '2019-04-28 18:30:00', '2019-04-28 18:30:00'),
(1, 'Assamese', 0, 0, NULL, '2019-04-28 18:30:00', '2019-04-28 18:30:00'),
(1, 'Boro', 0, 0, NULL, '2019-04-28 18:30:00', '2019-04-28 18:30:00'),
(1, 'Bengali', 0, 0, NULL, '2019-04-28 18:30:00', '2019-04-28 18:30:00'),
(1, 'Hindi', 0, 0, NULL, '2019-04-28 18:30:00', '2019-04-28 18:30:00'),
(1, 'Nepali', 0, 0, NULL, '2019-04-28 18:30:00', '2019-04-28 18:30:00'),
(1, 'Physics + Chemistry + Mathematics + Biology', 0, 0, NULL, '2019-04-28 18:30:00', '2019-04-28 18:30:00'),
(1, 'Physics+ Chemistry + Mathematics + Statistics ', 0, 0, NULL, '2019-04-28 18:30:00', '2019-04-28 18:30:00'),
(1, 'Physics + Chemistry + Mathematics +Geography', 0, 0, NULL, '2019-04-28 18:30:00', '2019-04-28 18:30:00'),
(1, 'Physics + Economics + Statistics + Mathematics', 0, 0, NULL, '2019-04-28 18:30:00', '2019-04-28 18:30:00'),
(1, 'Physics + Chemistry + Mathematics + Computer Science & Application', 0, 0, NULL, '2019-04-28 18:30:00', '2019-04-28 18:30:00'),
(1, ' Economics + Statistics + Mathematics + Computer Science & Application', 0, 0, NULL, '2019-04-28 18:30:00', '2019-04-28 18:30:00'),
(1, 'Physics + Mathematics + Geography + Computer Science & Application', 0, 0, NULL, '2019-04-28 18:30:00', '2019-04-28 18:30:00'),
(2, 'English', 1, 0, NULL, '2019-04-28 18:30:00', '2019-04-28 18:30:00'),
(2, 'Alternative English', 0, 0, NULL, '2019-04-28 18:30:00', '2019-04-28 18:30:00'),
(2, 'Assamese', 0, 0, NULL, '2019-04-28 18:30:00', '2019-04-28 18:30:00'),
(2, 'Boro', 0, 0, NULL, '2019-04-28 18:30:00', '2019-04-28 18:30:00'),
(2, 'Bengali', 0, 0, NULL, '2019-04-28 18:30:00', '2019-04-28 18:30:00'),
(2, 'Hindi', 0, 0, NULL, '2019-04-28 18:30:00', '2019-04-28 18:30:00'),
(2, 'Nepali', 0, 0, NULL, '2019-04-28 18:30:00', '2019-04-28 18:30:00'),
(2, 'Economics', 0, 0, NULL, '2019-04-28 18:30:00', '2019-04-28 18:30:00'),
(2, 'Education', 0, 0, NULL, '2019-04-28 18:30:00', '2019-04-28 18:30:00'),
(2, 'History', 0, 0, NULL, '2019-04-28 18:30:00', '2019-04-28 18:30:00'),
(2, 'Sociology', 0, 0, NULL, '2019-04-28 18:30:00', '2019-04-28 18:30:00'),
(2, 'Home Science ', 0, 0, NULL, '2019-04-28 18:30:00', '2019-04-28 18:30:00'),
(2, 'Political Science', 0, 0, NULL, '2019-04-28 18:30:00', '2019-04-28 18:30:00'),
(2, 'Mathematics* (* Eco+Stats+Maths combination)', 0, 0, NULL, '2019-04-28 18:30:00', '2019-04-28 18:30:00'),
(2, 'Geography', 0, 0, NULL, '2019-04-28 18:30:00', '2019-04-28 18:30:00'),
(2, 'Statistics', 0, 0, NULL, '2019-04-28 18:30:00', '2019-04-28 18:30:00'),
(2, 'Logic & Philosophy', 0, 0, NULL, '2019-04-28 18:30:00', '2019-04-28 18:30:00'),
(2, 'Psychology ', 0, 0, NULL, '2019-04-28 18:30:00', '2019-04-28 18:30:00'),
(2, 'Home Science', 0, 0, NULL, '2019-04-28 18:30:00', '2019-04-28 18:30:00'),
(2, 'Computer Science & Application ', 0, 0, NULL, '2019-04-28 18:30:00', '2019-04-28 18:30:00'),
(2, 'Sanskrit', 0, 0, NULL, '2019-04-28 18:30:00', '2019-04-28 18:30:00'),
(2, 'Assamese Second Language', 0, 0, NULL, '2019-04-28 18:30:00', '2019-04-28 18:30:00'),
(2, 'Bengali Second Language', 0, 0, NULL, '2019-04-28 18:30:00', '2019-04-28 18:30:00'),
(2, 'Hindi Second Language', 0, 0, NULL, '2019-04-28 18:30:00', '2019-04-28 18:30:00'),
(2, 'E.S.L (E.S.L is allowed but not taught in the college) ', 0, 0, NULL, '2019-04-28 18:30:00', '2019-04-28 18:30:00'),
(2, 'Computer Science', 0, 0, NULL, '2019-04-28 18:30:00', '2019-04-28 18:30:00'),
(3, 'English', 1, 0, NULL, '2019-04-28 18:30:00', '2019-04-28 18:30:00'),
(3, 'Alternative English', 0, 0, NULL, '2019-04-28 18:30:00', '2019-04-28 18:30:00'),
(3, 'Assamese', 0, 0, NULL, '2019-04-28 18:30:00', '2019-04-28 18:30:00'),
(3, 'Boro', 0, 0, NULL, '2019-04-28 18:30:00', '2019-04-28 18:30:00'),
(3, 'Bengali', 0, 0, NULL, '2019-04-28 18:30:00', '2019-04-28 18:30:00'),
(3, 'Hindi', 0, 0, NULL, '2019-04-28 18:30:00', '2019-04-28 18:30:00'),
(3, 'Nepali', 0, 0, NULL, '2019-04-28 18:30:00', '2019-04-28 18:30:00'),
(3, 'Accountancy', 1, 0, NULL, '2019-04-28 18:30:00', '2019-04-28 18:30:00'),
(3, 'Business Studies ', 1, 0, NULL, '2019-04-28 18:30:00', '2019-04-28 18:30:00'),
(3, 'Economics', 0, 0, NULL, '2019-04-28 18:30:00', '2019-04-28 18:30:00'),
(3, 'Banking', 0, 0, NULL, '2019-04-28 18:30:00', '2019-04-28 18:30:00'),
(3, 'Commercial Mathematics and Statistics (C.M.S.T.) or Mathematics or Computer Science & Application', 0, 0, NULL, '2019-04-28 18:30:00', '2019-04-28 18:30:00'),
(3, 'Commercial Mathematics and Statistics (C.M.S.T.)', 0, 0, NULL, '2019-04-28 18:30:00', '2019-04-28 18:30:00'),
(3, 'Mathematics', 0, 0, NULL, '2019-04-28 18:30:00', '2019-04-28 18:30:00'),
(3, 'Computer Science & Application', 0, 0, NULL, '2019-04-28 18:30:00', '2019-04-28 18:30:00'),
(4, 'Physics', 0, 1, NULL, '2019-05-06 18:30:00', '2019-05-06 18:30:00'),
(4, 'Chemistry', 0, 1, NULL, NULL, NULL),
(4, 'Mathematics', 0, 1, NULL, '2019-05-06 18:30:00', '2019-05-06 18:30:00'),
(4, 'Zoology', 0, 1, NULL, '2019-05-06 18:30:00', '2019-05-06 18:30:00'),
(4, 'Botany', 0, 1, NULL, '2019-05-06 18:30:00', '2019-05-06 18:30:00'),
(4, 'Statistics', 0, 1, NULL, '2019-05-06 18:30:00', '2019-05-06 18:30:00'),
(4, 'Economics', 0, 1, NULL, '2019-05-06 18:30:00', '2019-05-06 18:30:00'),
(4, 'Geography', 0, 1, NULL, '2019-05-06 18:30:00', '2019-05-06 18:30:00'),
(4, 'Home Science', 0, 1, NULL, '2019-05-06 18:30:00', '2019-05-06 18:30:00'),
(4, 'Biotechnology', 0, 1, NULL, '2019-05-06 18:30:00', '2019-05-06 18:30:00'),
(4, 'Mathematics', 0, 0, NULL, '2019-05-06 18:30:00', '2019-05-06 18:30:00'),
(4, 'Chemistry', 0, 1, NULL, '2019-05-06 18:30:00', '2019-05-06 18:30:00'),
(4, 'Physics', 0, 0, NULL, '2019-05-06 18:30:00', '2019-05-06 18:30:00'),
(4, 'Geography', 0, 0, NULL, '2019-05-06 18:30:00', '2019-05-06 18:30:00'),
(4, 'Economics', 0, 0, NULL, '2019-05-06 18:30:00', '2019-05-06 18:30:00'),
(4, 'Botany', 0, 0, NULL, '2019-05-06 18:30:00', '2019-05-06 18:30:00'),
(4, 'Home Science', 0, 0, NULL, '2019-05-06 18:30:00', '2019-05-06 18:30:00'),
(4, 'Zoology', 0, 0, NULL, '2019-05-06 18:30:00', '2019-05-06 18:30:00'),
(4, 'Communicative English', 0, 0, NULL, '2019-05-06 18:30:00', '2019-05-06 18:30:00'),
(4, 'Microbiology', 0, 0, NULL, '2019-05-06 18:30:00', '2019-05-06 18:30:00'),
(4, 'Biochemistry – 1', 0, 0, NULL, '2019-05-06 18:30:00', '2019-05-06 18:30:00'),
(4, 'Cell Biology', 0, 0, NULL, '2019-05-06 18:30:00', '2019-05-06 18:30:00'),
(4, 'Practical (Professional Course)', 0, 0, NULL, '2019-05-06 18:30:00', '2019-05-06 18:30:00'),
(4, 'General English', 1, 0, NULL, '2019-05-06 18:30:00', '2019-05-06 18:30:00'),
(4, 'Functional English', 1, 0, NULL, '2019-05-06 18:30:00', '2019-05-06 18:30:00'),
(5, 'General English', 1, 0, NULL, '2019-05-06 18:30:00', '2019-05-06 18:30:00'),
(5, 'Functional English', 1, 0, NULL, '2019-05-06 18:30:00', '2019-05-06 18:30:00'),
(5, 'Physics', 0, 0, NULL, '2019-05-06 18:30:00', '2019-05-06 18:30:00'),
(5, 'Computer Science', 0, 0, NULL, '2019-05-06 18:30:00', '2019-05-06 18:30:00'),
(5, 'Chemistry', 0, 0, NULL, '2019-05-06 18:30:00', '2019-05-06 18:30:00'),
(5, 'Mathematics', 0, 0, NULL, '2019-05-06 18:30:00', '2019-05-06 18:30:00'),
(5, 'Economics', 0, 0, NULL, '2019-05-06 18:30:00', '2019-05-06 18:30:00'),
(5, 'Statistics', 0, 0, NULL, '2019-05-06 18:30:00', '2019-05-06 18:30:00'),
(5, 'Zoology', 0, 0, NULL, '2019-05-06 18:30:00', '2019-05-06 18:30:00'),
(5, 'Home Science', 0, 0, NULL, '2019-05-06 18:30:00', '2019-05-06 18:30:00'),
(5, 'Botany', 0, 0, NULL, '2019-05-06 18:30:00', '2019-05-06 18:30:00'),
(5, 'Geography', 0, 0, NULL, '2019-05-06 18:30:00', '2019-05-06 18:30:00'),
(6, 'English', 1, 0, NULL, '2019-04-28 18:30:00', '2019-04-28 18:30:00'),
(6, 'Alternative English', 0, 0, NULL, '2019-04-28 18:30:00', '2019-04-28 18:30:00'),
(6, 'Assamese', 0, 0, NULL, '2019-04-28 18:30:00', '2019-04-28 18:30:00'),
(6, 'Boro', 0, 0, NULL, '2019-04-28 18:30:00', '2019-04-28 18:30:00'),
(6, 'Bengali', 0, 0, NULL, '2019-04-28 18:30:00', '2019-04-28 18:30:00'),
(6, 'Hindi', 0, 0, NULL, '2019-04-28 18:30:00', '2019-04-28 18:30:00'),
(6, 'Nepali', 0, 0, NULL, '2019-04-28 18:30:00', '2019-04-28 18:30:00'),
(6, 'English', 0, 1, NULL, '2019-05-06 18:30:00', '2019-05-06 18:30:00'),
(6, 'Assamese', 0, 1, NULL, '2019-05-06 18:30:00', '2019-05-06 18:30:00'),
(6, 'Hindi', 0, 1, NULL, '2019-05-06 18:30:00', '2019-05-06 18:30:00'),
(6, 'Bengali', 0, 1, NULL, '2019-05-06 18:30:00', '2019-05-06 18:30:00'),
(6, 'Political Science', 0, 1, NULL, '2019-05-06 18:30:00', '2019-05-06 18:30:00'),
(6, 'Economics', 0, 1, NULL, '2019-05-06 18:30:00', '2019-05-06 18:30:00'),
(6, 'Philosophy', 0, 1, NULL, '2019-05-06 18:30:00', '2019-05-06 18:30:00'),
(6, 'Geography', 0, 1, NULL, '2019-05-06 18:30:00', '2019-05-06 18:30:00'),
(6, 'Sanskrit', 0, 1, NULL, '2019-05-06 18:30:00', '2019-05-06 18:30:00'),
(6, 'Education', 0, 1, NULL, '2019-05-06 18:30:00', '2019-05-06 18:30:00'),
(6, 'Mathematics', 0, 1, NULL, '2019-05-06 18:30:00', '2019-05-06 18:30:00'),
(6, 'History', 0, 1, NULL, '2019-05-06 18:30:00', '2019-05-06 18:30:00'),
(6, 'Statistics', 0, 1, NULL, '2019-05-06 18:30:00', '2019-05-06 18:30:00'),
(6, 'Home Science', 0, 1, NULL, '2019-05-06 18:30:00', '2019-05-06 18:30:00'),
(6, 'Psychology', 0, 1, NULL, '2019-05-06 18:30:00', '2019-05-06 18:30:00'),
(6, 'History', 0, 0, NULL, '2019-05-06 18:30:00', '2019-05-06 18:30:00'),
(6, 'Philosophy', 0, 0, NULL, '2019-05-06 18:30:00', '2019-05-06 18:30:00'),
(6, 'Psychology', 0, 0, NULL, '2019-05-06 18:30:00', '2019-05-06 18:30:00'),
(6, 'Political Science', 0, 0, NULL, '2019-05-06 18:30:00', '2019-05-06 18:30:00'),
(6, 'Economics', 0, 0, NULL, '2019-05-06 18:30:00', '2019-05-06 18:30:00'),
(6, 'Geography', 0, 0, NULL, '2019-05-06 18:30:00', '2019-05-06 18:30:00'),
(6, 'Education', 0, 0, NULL, '2019-05-06 18:30:00', '2019-05-06 18:30:00'),
(6, 'Sociology', 0, 0, NULL, '2019-05-06 18:30:00', '2019-05-06 18:30:00'),
(6, 'NSL*', 0, 0, NULL, '2019-05-06 18:30:00', '2019-05-06 18:30:00'),
(6, 'Mathematics', 0, 0, NULL, '2019-05-06 18:30:00', '2019-05-06 18:30:00'),
(6, 'Sanskrit', 0, 0, NULL, '2019-05-06 18:30:00', '2019-05-06 18:30:00'),
(6, 'Home Science', 0, 0, NULL, '2019-05-06 18:30:00', '2019-05-06 18:30:00'),
(6, 'Statistics', 0, 0, NULL, '2019-05-06 18:30:00', '2019-05-06 18:30:00'),
(7, 'English', 1, 0, NULL, '2019-04-28 18:30:00', '2019-04-28 18:30:00'),
(7, 'Alternative English', 0, 0, NULL, '2019-04-28 18:30:00', '2019-04-28 18:30:00'),
(7, 'Assamese', 0, 0, NULL, '2019-04-28 18:30:00', '2019-04-28 18:30:00'),
(7, 'Boro', 0, 0, NULL, '2019-04-28 18:30:00', '2019-04-28 18:30:00'),
(7, 'Bengali', 0, 0, NULL, '2019-04-28 18:30:00', '2019-04-28 18:30:00'),
(7, 'Hindi', 0, 0, NULL, '2019-04-28 18:30:00', '2019-04-28 18:30:00'),
(7, 'Nepali', 0, 0, NULL, '2019-04-28 18:30:00', '2019-04-28 18:30:00'),
(7, 'Economics', 0, 0, NULL, '2019-05-06 18:30:00', '2019-05-06 18:30:00'),
(7, 'Philosophy', 0, 0, NULL, '2019-05-06 18:30:00', '2019-05-06 18:30:00'),
(7, 'Political Science', 0, 0, NULL, '2019-05-06 18:30:00', '2019-05-06 18:30:00'),
(7, 'Geography', 0, 0, NULL, '2019-05-06 18:30:00', '2019-05-06 18:30:00'),
(7, 'Home Science', 0, 0, NULL, '2019-05-06 18:30:00', '2019-05-06 18:30:00'),
(7, 'Psychology', 0, 0, NULL, '2019-05-06 18:30:00', '2019-05-06 18:30:00'),
(7, 'Education', 0, 0, NULL, '2019-05-06 18:30:00', '2019-05-06 18:30:00'),
(7, 'History', 0, 0, NULL, '2019-05-06 18:30:00', '2019-05-06 18:30:00'),
(7, 'Nepali Second Language (NSL)', 0, 0, NULL, '2019-05-06 18:30:00', '2019-05-06 18:30:00'),
(7, 'Sociology', 0, 0, NULL, '2019-05-06 18:30:00', '2019-05-06 18:30:00'),
(7, 'Tourism and travel management', 0, 0, NULL, '2019-05-06 18:30:00', '2019-05-06 18:30:00'),
(8, 'Business Mathematics', 1, 0, NULL, '2019-05-06 18:30:00', '2019-05-06 18:30:00'),
(8, 'Financial Accounting-I', 1, 0, NULL, '2019-05-06 18:30:00', '2019-05-06 18:30:00'),
(8, 'Business Organization & Entrepreneurship Development', 1, 0, NULL, '2019-05-06 18:30:00', '2019-05-06 18:30:00'),
(8, 'Indian Financial System', 1, 0, NULL, '2019-05-06 18:30:00', '2019-05-06 18:30:00'),
(8, 'Accountancy(with special paper Cost Accounting)', 0, 1, NULL, '2019-05-06 18:30:00', '2019-05-06 18:30:00'),
(8, 'Management(with special paper Human Resource Management)', 0, 1, NULL, '2019-05-06 18:30:00', '2019-05-06 18:30:00'),
(8, 'Finance(with special paper Rural & Micro Finance)', 0, 1, NULL, '2019-05-06 18:30:00', '2019-05-06 18:30:00'),
(9, 'Fundamentals of insurance', 1, 0, NULL, '2019-05-06 18:30:00', '2019-05-06 18:30:00'),
(9, 'Business Mathematics', 1, 0, NULL, '2019-05-06 18:30:00', '2019-05-06 18:30:00'),
(9, 'Financial Accounting-I', 1, 0, NULL, '2019-05-06 18:30:00', '2019-05-06 18:30:00'),
(9, 'Business Organization', 1, 0, NULL, '2019-05-06 18:30:00', '2019-05-06 18:30:00'),
(9, 'Entrepreneurship Development', 1, 0, NULL, '2019-05-06 18:30:00', '2019-05-06 18:30:00'),
(9, 'Indian Financial System', 1, 0, NULL, '2019-05-06 18:30:00', '2019-05-06 18:30:00'),
(4, 'Chemistry', 0, 0, NULL, '2019-05-06 18:30:00', '2019-05-06 18:30:00'),
(4, 'Statistics', 0, 0, NULL, '2019-05-06 18:30:00', '2019-05-06 18:30:00'),
(4, 'Computer Science', 0, 0, NULL, '2019-05-06 18:30:00', '2019-05-06 18:30:00');

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
-- ALTER TABLE `subjects`
--   MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=177;
-- COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
