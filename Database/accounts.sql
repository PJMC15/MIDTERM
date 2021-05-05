-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 05, 2021 at 01:49 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `accounts`
--

-- --------------------------------------------------------

--
-- Table structure for table `code`
--

CREATE TABLE `code` (
  `id_code` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `code` varchar(6) NOT NULL,
  `created_at` datetime NOT NULL,
  `expiration` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `code`
--

INSERT INTO `code` (`id_code`, `user_id`, `code`, `created_at`, `expiration`) VALUES
(29, 0, 'cqbvfz', '2021-04-28 12:58:47', '2021-04-28 13:03:47'),
(30, 0, 'zp3wfc', '2021-04-28 13:00:51', '2021-04-28 13:05:51'),
(31, 0, '7t0634', '2021-04-28 16:16:11', '2021-04-28 16:21:11'),
(32, 0, 'qm3t5u', '2021-04-28 16:20:20', '2021-04-28 16:25:20'),
(33, 0, 'xwe7c3', '2021-05-05 19:44:56', '2021-05-05 19:49:56'),
(34, 0, 'yicg80', '2021-05-05 19:47:09', '2021-05-05 19:52:09');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `event_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `event` varchar(50) NOT NULL,
  `date_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`event_id`, `username`, `event`, `date_time`) VALUES
(51, 'ADMIN', 'Login', '2021-04-28 16:15:46'),
(52, 'ADMIN', 'Logout', '2021-04-28 16:16:21'),
(53, 'ADMIN', 'Change Password', '2021-04-28 16:18:03'),
(54, 'ADMIN', 'Login', '2021-04-28 16:18:43'),
(55, 'ADMIN', 'Logout', '2021-04-28 16:18:56'),
(56, 'ADMIN2', 'Login', '2021-04-28 16:19:16'),
(57, 'ADMIN2', 'Logout', '2021-04-28 16:19:30'),
(58, 'ADMIN2', 'Change Password', '2021-04-28 16:19:55'),
(59, 'ADMIN2', 'Login', '2021-04-28 16:20:17'),
(60, 'ADMIN2', 'Logout', '2021-04-28 16:20:25'),
(63, 'ADMIN3', 'Register', '2021-05-05 19:43:25'),
(64, 'ADMIN3', 'Login', '2021-05-05 19:44:36'),
(65, 'ADMIN3', 'Logout', '2021-05-05 19:45:11'),
(66, 'ADMIN3', 'Change Password', '2021-05-05 19:46:38'),
(67, 'ADMIN3', 'Login', '2021-05-05 19:47:07');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `question` varchar(100) NOT NULL,
  `answer` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `created_at`, `question`, `answer`) VALUES
(1, 'ADMIN', '3f7caa3d471688b704b73e9a77b1107f', '2021-03-21 14:07:36', 'Who is your first Pet?', 'Jaco'),
(2, 'ADMIN2', '93d9398ce7e599f9088c4d90fbc3560e', '2021-04-28 02:45:30', 'What is your childhood nickname?', 'PJ'),
(6, 'ADMIN3', 'fff55cda63adb7f193d7f0c2ee35a053', '2021-05-05 19:43:25', 'Who is your Father?', 'Me');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `code`
--
ALTER TABLE `code`
  ADD PRIMARY KEY (`id_code`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`event_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `code`
--
ALTER TABLE `code`
  MODIFY `id_code` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
