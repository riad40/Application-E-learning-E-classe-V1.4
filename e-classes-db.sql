-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 21, 2022 at 04:55 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e-classes-db`
--

-- --------------------------------------------------------

--
-- Table structure for table `comptes`
--

CREATE TABLE `comptes` (
  `id` int(11) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `login_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comptes`
--

INSERT INTO `comptes` (`id`, `full_name`, `email`, `password`, `login_time`) VALUES
(1, 'riad', 'riad@gmail.com', 'azer', '2022-02-13 11:07:16'),
(7, 'ash', 'ash@gmail.com', 'tyu', '2022-02-13 11:07:16'),
(8, 'imrane', 'imrane@gmail.com', '123', '2022-02-13 16:01:21');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `id` int(11) NOT NULL,
  `namee` varchar(255) NOT NULL,
  `duration` varchar(255) NOT NULL,
  `assigned_by` varchar(255) NOT NULL,
  `assigned_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`id`, `namee`, `duration`, `assigned_by`, `assigned_at`) VALUES
(23, 'html', '2h', 'Elzero', '2022-02-08'),
(25, 'css', '2h', 'kevin powel', '2021-04-15'),
(26, 'javascript', '3h', ' Brad Traversy', '2020-02-03');

-- --------------------------------------------------------

--
-- Table structure for table `payments_details`
--

CREATE TABLE `payments_details` (
  `id` int(11) NOT NULL,
  `namee` varchar(255) NOT NULL,
  `payment_schedule` varchar(255) NOT NULL,
  `bill_number` int(11) NOT NULL,
  `amount_paid` int(11) NOT NULL,
  `balance_amount` int(11) NOT NULL,
  `datee` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payments_details`
--

INSERT INTO `payments_details` (`id`, `namee`, `payment_schedule`, `bill_number`, `amount_paid`, `balance_amount`, `datee`) VALUES
(1, 'mohmad', 'first', 2000, 1333, 1141, '2022-02-16'),
(2, 'karim', 'seconde', 400, 1333, 2000, '2022-02-24'),
(7, 'aziz', 'third', 33, 2375, 5124, '2017-11-23');

-- --------------------------------------------------------

--
-- Table structure for table `studentsinfo`
--

CREATE TABLE `studentsinfo` (
  `id` int(11) NOT NULL,
  `imagee` varchar(255) NOT NULL,
  `namee` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone_number` int(50) NOT NULL,
  `enroll_number` int(20) NOT NULL,
  `date_of_admession` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `studentsinfo`
--

INSERT INTO `studentsinfo` (`id`, `imagee`, `namee`, `email`, `phone_number`, `enroll_number`, `date_of_admession`) VALUES
(19, '', 'riad', 'riad@gmail.com', 2147483647, 2147483647, '2002-03-10'),
(27, '', 'Camilla ', 'camilla@gmail.com', 2147483647, 5732144, '2002-08-27');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comptes`
--
ALTER TABLE `comptes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payments_details`
--
ALTER TABLE `payments_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `studentsinfo`
--
ALTER TABLE `studentsinfo`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comptes`
--
ALTER TABLE `comptes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `payments_details`
--
ALTER TABLE `payments_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `studentsinfo`
--
ALTER TABLE `studentsinfo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
