-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 26, 2018 at 05:02 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sample`
--

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `regid` int(5) NOT NULL,
  `fullName` varchar(100) NOT NULL,
  `middleName` varchar(100) NOT NULL,
  `lastName` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `mobileNo` varchar(10) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`regid`, `fullName`, `middleName`, `lastName`, `email`, `mobileNo`, `password`) VALUES
(1, 'Admin', '', 'Admin', 'user@gmail.com', '9865786589', 'e10adc3949ba59abbe56e057f20f883e'),
(2, 'Lakshmi', '', 'Kamadi', 'lakshmi@gmail.com', '8659856895', '86f6f3bffe8a6892f5def78841b793a3'),
(3, 'Lavanya', '', 'Naina', 'lavanya@gmail.com', '8758456895', 'e9a98fc8806df2cba6dd7e05cd848625'),
(4, 'Swathi', '', 'Sadarla', 'swathi@gmail.com', '7889856895', '236033312337842ad7c51aa4eeaa113d'),
(5, 'Bindu', '', 'Malladi', 'bindu@gmail.com', '9889856895', 'd5e56c0169f5b01bb5d374f88aae3b52');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `sid` int(5) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `class` varchar(50) NOT NULL,
  `year` year(4) NOT NULL,
  `city` varchar(20) NOT NULL,
  `country` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`sid`, `name`, `email`, `class`, `year`, `city`, `country`) VALUES
(1, 'Lakshmi', 'lakshmi@gmail.com', 'BTech', 2016, 'Hyderabad', 'India'),
(2, 'Lakshmi', 'lakshmi@gmail.com', 'BTech', 2016, 'Hyderabad', 'India'),
(3, 'Harini', 'harini@gmail.com', 'BTech', 2018, 'Kerala', 'India'),
(4, 'Swathi', 'swathi@gmail.com', 'MCA', 2017, 'Delhi', 'India'),
(5, 'Neha', 'neha@gmail.com', 'MBA', 2015, 'Bangalore', 'India'),
(6, 'Nisha', 'nisha@gmail.com', 'MBBS', 2016, 'Hyderabad', 'India');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`regid`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`sid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `regid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `sid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
