-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 22, 2023 at 06:29 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `attendance`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendance_details`
--

CREATE TABLE `attendance_details` (
  `attendance_id` int(11) NOT NULL,
  `student_id` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `attendance_details`
--

INSERT INTO `attendance_details` (`attendance_id`, `student_id`, `date`, `status`) VALUES
(144, 'nill', '2023-04-14', 'absent'),
(145, 'a:3:{i:0;s:4:\"1001\";i:1;s:4:\"1002\";i:2;s:4:\"1003\";}', '2023-04-15', 'absent'),
(146, 'nill', '2023-04-16', 'absent'),
(147, 'a:3:{i:0;s:4:\"1001\";i:1;s:4:\"1002\";i:2;s:4:\"1003\";}', '2023-04-17', 'absent'),
(148, 'a:3:{i:0;s:4:\"1001\";i:1;s:4:\"1002\";i:2;s:4:\"1003\";}', '2023-04-18', 'absent'),
(149, 'a:2:{i:0;s:4:\"1002\";i:1;s:4:\"1003\";}', '2023-04-19', 'absent'),
(150, 'a:1:{i:0;s:4:\"1001\";}', '2023-04-20', 'absent'),
(151, 'a:2:{i:0;s:4:\"1002\";i:1;s:4:\"1003\";}', '2023-04-21', 'absent'),
(152, 'a:3:{i:0;s:4:\"1001\";i:1;s:4:\"1002\";i:2;s:4:\"1003\";}', '2023-04-22', 'absent'),
(153, 'a:2:{i:0;s:4:\"1002\";i:1;s:4:\"1003\";}', '2023-04-23', 'absent'),
(154, 'a:1:{i:0;s:4:\"1003\";}', '2023-04-24', 'absent'),
(155, 'a:3:{i:0;s:4:\"1001\";i:1;s:4:\"1002\";i:2;s:4:\"1003\";}', '2023-04-25', 'absent'),
(156, 'a:1:{i:0;s:4:\"1001\";}', '2023-04-26', 'absent'),
(157, 'a:2:{i:0;s:4:\"1001\";i:1;s:4:\"1003\";}', '2023-04-27', 'absent');

-- --------------------------------------------------------

--
-- Table structure for table `login_details`
--

CREATE TABLE `login_details` (
  `userid` int(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login_details`
--

INSERT INTO `login_details` (`userid`, `username`, `password`, `name`, `type`) VALUES
(1001, 'gokul278', '12345678', 'GOKUL M', 'student'),
(1002, 'raja1234', '12345678', 'RAJA SARAVANAN', 'student'),
(1003, 'sam12345', '12345678', 'SAM', 'student'),
(5001, 'user1234', '12345678', 'SIR', 'faculty');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendance_details`
--
ALTER TABLE `attendance_details`
  ADD PRIMARY KEY (`attendance_id`);

--
-- Indexes for table `login_details`
--
ALTER TABLE `login_details`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attendance_details`
--
ALTER TABLE `attendance_details`
  MODIFY `attendance_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=158;

--
-- AUTO_INCREMENT for table `login_details`
--
ALTER TABLE `login_details`
  MODIFY `userid` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5002;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
