-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 15, 2020 at 03:14 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fluxcrm`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `fullname` text NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `fullname`, `email`, `password`) VALUES
(1, 'ayomide onibokun', 'ayo6706@gmail.com', '2e99bf4e42962410038bc6fa4ce40d97'),
(17, 'david onibokun', 'vadtontech@gmail.com', '2e99bf4e42962410038bc6fa4ce40d97');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `address` text NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `firstname`, `lastname`, `email`, `phone`, `address`, `password`) VALUES
(2, 'ayomide', 'onibokun', 'ayo6706@gmail.com', '2147483647', 'ikorodu lagos', '2e99bf4e42962410038bc6fa4ce40d97'),
(3, 'ayomide', 'onibokun', 'joshman', '08176345747', 'ikorodu lagos', '2e99bf4e42962410038bc6fa4ce40d97'),
(4, 'ayomide', 'onibokun', 'ayo6706@gmail.co', '08176345747', 'ikorodu lagos', '2e99bf4e42962410038bc6fa4ce40d97');

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `id` int(11) NOT NULL,
  `userid` varchar(11) NOT NULL,
  `email` text NOT NULL,
  `username` text NOT NULL,
  `eventtitle` text NOT NULL,
  `eventdesc` text NOT NULL,
  `reminder` date NOT NULL,
  `adminalert` text NOT NULL,
  `date` date NOT NULL,
  `Referral` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`id`, `userid`, `email`, `username`, `eventtitle`, `eventdesc`, `reminder`, `adminalert`, `date`, `Referral`) VALUES
(1, '1', 'betheme@gmail.com', 'ayomide onibokun', 'dofufhd', 'eegddggf', '2020-08-17', '', '2011-08-19', '33333334'),
(12, '2', 'ayo6706@gmail.com', 'bello', 'birthday', 'your birthdad', '2020-08-07', '', '2020-10-21', ''),
(24, '', 'ayo6706@gmail.com', 'aydhdahkdaj suahashuah', 'adhdhdhh', 'shadkhk', '2020-08-05', '2020-08-17', '2020-08-20', ''),
(26, '', 'ayomide@repotecc.com', 'repo  tecc', 'our birthday', 'crazy birthday ', '2020-08-09', '2020-08-19', '2020-08-22', ''),
(27, '', 'ayo6706@gmail.com', 'ayomide  onibokun', 'vvvvvbn', 'frf', '2020-08-18', '2020-08-16', '2020-08-19', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
