-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 13, 2020 at 06:44 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ng_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `tblservice`
--

CREATE TABLE `tblservice` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `service` varchar(500) NOT NULL,
  `email` varchar(255) NOT NULL,
  `status` int(11) NOT NULL COMMENT '0 requested, 1 email sent, 2 email fail',
  `email_body` text DEFAULT NULL,
  `email_subject` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblservice`
--

INSERT INTO `tblservice` (`id`, `name`, `contact`, `service`, `email`, `status`, `email_body`, `email_subject`, `created_at`, `updated_at`) VALUES
(9, 'Jamal', '12213445', 'jsadkfjksd', 'ether_sb@yahoo.com', 1, 'dfsadfasdf', 'sdfafas', '2020-07-13 11:00:41', '2020-07-13 12:17:32'),
(10, 'Jamal', '12213445', 'asdfasdfsdf', 'ether_sb@yahoo.com', 1, 'fasdfasdfads', 'sdfsad', '2020-07-13 11:03:56', '2020-07-13 12:15:09'),
(11, 'yasin', 'dbhsb', 'dshi gsuysdg', 'yasinctg6@gmail.com', 1, 'car broken', 'car repair', '2020-07-13 13:07:38', '2020-07-13 14:25:47'),
(13, 'yasin', '017281783', 'dbdbchb', 'yasinctg6@gmail.com', 1, 'fdsdbbs', 'dffnds', '2020-07-13 16:22:07', '2020-07-13 16:22:31'),
(14, 'yasin', '017281783', 'dbdbchb', 'yasinctg6@gmail.com', 0, NULL, NULL, '2020-07-13 16:22:07', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`) VALUES
(1, 'Admin', 'admin@gmail.com', '159');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblservice`
--
ALTER TABLE `tblservice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tblservice`
--
ALTER TABLE `tblservice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
