-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 30, 2024 at 03:56 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `student_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `name`, `email`, `phone`, `address`) VALUES
(1, 'John Doe', 'john@example.com', '1234567890', '123 Elm Street'),
(2, 'Jane Smith', 'jane@example.com', '987654321', '456 Oak Avenue'),
(3, 'Michael Brown', 'michael@example.com', '5555555555', '789 Maple Boulevard'),
(4, 'John Doe', 'john@example.com', '1234567890', '123 Elm Street'),
(5, 'Jane Smith', 'jane@example.com', '987654321', '456 Oak Avenue'),
(6, 'Michael Brown', 'michael@example.com', '5555555555', '789 Maple Boulevard'),
(7, 'veenu', 'v@gmail.com', '142528795', 'guguguguygu'),
(8, 'Raja', 'raja@gmail.com', '784587564', 'rwfdfdr'),
(9, 'ragu', 'ragu@gmail.com', '754898965', 'jaffna'),
(10, 'mani', 'mani@gmail.com', '758489632', 'Batti'),
(11, 'ruku', 'ruku@gmail.com', '7584895652', 'colombo'),
(13, 'Racoi', 'Ravi@gmailcom', '7584255', 'batticalo'),
(14, 'Riya', 'riya@gmail.com', '754878965', 'jaffna');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
