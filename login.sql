-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 25, 2025 at 12:50 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `form`
--

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `mobile` bigint(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `gender` enum('male','female','other') NOT NULL,
  `dob` date NOT NULL,
  `age` int(10) NOT NULL,
  `pwd` varchar(20) NOT NULL,
  `cpwd` varchar(20) NOT NULL,
  `date_time` datetime NOT NULL DEFAULT current_timestamp(),
  `role` enum('user','admin') NOT NULL DEFAULT 'user',
  `status` enum('pending','approved','rejected') DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `name`, `mobile`, `email`, `gender`, `dob`, `age`, `pwd`, `cpwd`, `date_time`, `role`, `status`) VALUES
(10, 'Harsh ', 9607026023, 'prasadharsh99@gmail.com', 'male', '2002-12-03', 22, 'harsh', '123', '2025-09-22 11:58:41', 'admin', 'approved'),
(11, 'shrushti', 7385329595, 'shrushtiwaghchoure@gmail.com', 'female', '2003-06-25', 22, 'shrushti', '123456', '2025-09-22 15:38:02', 'user', 'pending'),
(13, 'vikrant ', 9607026023, 'vikrnat@gmail.com', 'male', '2025-09-04', 0, 'vikrant', 'vikrant', '2025-09-23 11:08:00', 'user', 'pending'),
(14, 'mayur', 9607026023, 'mayur@gmail.com', 'male', '2025-09-05', 0, 'mayur', 'mayur', '2025-09-23 11:08:30', 'user', 'pending'),
(15, 'kalpak', 7987465880, 'kalpak@gmail.com', 'male', '2025-08-31', 0, 'kalpak', 'kalpak', '2025-09-23 11:09:34', 'user', 'pending');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
