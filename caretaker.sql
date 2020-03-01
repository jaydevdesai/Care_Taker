-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 29, 2020 at 11:55 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `caretaker`
--

-- --------------------------------------------------------

--
-- Table structure for table `area_master`
--

CREATE TABLE `area_master` (
  `Area_id` int(8) NOT NULL,
  `Area_name` varchar(16) NOT NULL,
  `City_id` int(4) NOT NULL,
  `Deleted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `area_master`
--

INSERT INTO `area_master` (`Area_id`, `Area_name`, `City_id`, `Deleted`) VALUES
(1, 'Windsor East', 1, 0),
(2, 'Windsor West', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `caretaker_master`
--

CREATE TABLE `caretaker_master` (
  `Emp_id` int(8) NOT NULL,
  `First_name` varchar(16) NOT NULL,
  `Last_name` varchar(16) DEFAULT NULL,
  `Email_ID` varchar(32) NOT NULL,
  `Profile_image` text NOT NULL,
  `User_type` varchar(5) NOT NULL DEFAULT 'CT',
  `Service_id` int(2) NOT NULL,
  `City_id` int(4) NOT NULL,
  `Area_id` int(8) NOT NULL,
  `Contact_no` bigint(10) NOT NULL,
  `Points` int(4) NOT NULL DEFAULT '50',
  `Available` tinyint(1) NOT NULL DEFAULT '1',
  `Password` varchar(32) NOT NULL DEFAULT 'caretaker',
  `Deleted` tinyint(1) NOT NULL DEFAULT '0',
  `Time_Stamp` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `caretaker_master`
--

INSERT INTO `caretaker_master` (`Emp_id`, `First_name`, `Last_name`, `Email_ID`, `Profile_image`, `User_type`, `Service_id`, `City_id`, `Area_id`, `Contact_no`, `Points`, `Available`, `Password`, `Deleted`, `Time_Stamp`) VALUES
(2, '', '', 'caretaker@gmail.com', '1.png', 'CT', 1, 1, 1, 1231231239, 68, 0, 'caretaker', 0, '2020-02-29');

-- --------------------------------------------------------

--
-- Table structure for table `city_master`
--

CREATE TABLE `city_master` (
  `City_id` int(4) NOT NULL,
  `City_name` varchar(16) NOT NULL,
  `Deleted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `city_master`
--

INSERT INTO `city_master` (`City_id`, `City_name`, `Deleted`) VALUES
(1, 'Windsor', 0);

-- --------------------------------------------------------

--
-- Table structure for table `feedback_master`
--

CREATE TABLE `feedback_master` (
  `Feedback_id` int(8) NOT NULL,
  `Email_ID` varchar(32) NOT NULL,
  `User_type` varchar(8) NOT NULL,
  `Subject` varchar(64) NOT NULL,
  `Message` text NOT NULL,
  `Time_Stamp` datetime NOT NULL,
  `Reply` text,
  `Replied` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `receipt_master`
--

CREATE TABLE `receipt_master` (
  `Receipt_id` int(16) NOT NULL,
  `User_id` int(8) NOT NULL,
  `Emp_id` int(8) NOT NULL,
  `Service_id` int(4) NOT NULL,
  `Address` text NOT NULL,
  `Area_id` int(8) NOT NULL,
  `City_id` int(4) NOT NULL,
  `Problem_desc` text NOT NULL,
  `Booking_date` datetime NOT NULL,
  `Solution` text NOT NULL,
  `Bill_amt` int(4) NOT NULL,
  `Rating` int(1) NOT NULL,
  `Status` int(1) NOT NULL DEFAULT '0',
  `SServed_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `receipt_master`
--

INSERT INTO `receipt_master` (`Receipt_id`, `User_id`, `Emp_id`, `Service_id`, `Address`, `Area_id`, `City_id`, `Problem_desc`, `Booking_date`, `Solution`, `Bill_amt`, `Rating`, `Status`, `SServed_date`) VALUES
(22, 2, 2, 1, 'abcd', 1, 1, 'Something', '2020-02-29 15:05:34', '', 50, 0, 0, '0000-00-00 00:00:00'),
(23, 2, 0, 1, 'abcd', 1, 1, 'Something', '2020-02-29 15:09:21', '', 50, 0, 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `service_master`
--

CREATE TABLE `service_master` (
  `Service_id` int(50) NOT NULL,
  `Service_type` varchar(50) NOT NULL,
  `Service_fees` int(50) DEFAULT NULL,
  `Deleted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `service_master`
--

INSERT INTO `service_master` (`Service_id`, `Service_type`, `Service_fees`, `Deleted`) VALUES
(1, 'Full-Time', 50, 0),
(2, 'Part-Time', 60, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_master`
--

CREATE TABLE `user_master` (
  `User_id` int(8) NOT NULL,
  `First_name` varchar(16) NOT NULL,
  `Last_name` varchar(16) DEFAULT NULL,
  `Email_ID` varchar(32) NOT NULL,
  `Address` text,
  `Area_id` int(8) NOT NULL,
  `City_id` int(4) NOT NULL,
  `Contact_no` bigint(10) DEFAULT NULL,
  `User_type` varchar(5) NOT NULL DEFAULT 'User',
  `Password` varchar(32) NOT NULL,
  `Deleted` tinyint(1) NOT NULL DEFAULT '0',
  `Time_Stamp` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_master`
--

INSERT INTO `user_master` (`User_id`, `First_name`, `Last_name`, `Email_ID`, `Address`, `Area_id`, `City_id`, `Contact_no`, `User_type`, `Password`, `Deleted`, `Time_Stamp`) VALUES
(2, 'Jaydev', 'Desai', 'jaydevdesai@gmail.com', '203, Sahaj Residency, B/H Juna Vadaj Bus Stop, Ashram Road', 1, 1, 5197028909, 'User', 'caretaker', 0, '2020-02-12'),
(6, 'Glass', 'Pani', 'glasspani@gmail.com', NULL, 0, 0, 1234567890, 'User', '12345678', 0, '2020-02-22'),
(8, 'News', 'Paper', 'newspaper@gmail.com', NULL, 0, 0, 1234567890, 'User', '12345678', 0, '2020-02-22');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `area_master`
--
ALTER TABLE `area_master`
  ADD PRIMARY KEY (`Area_id`);

--
-- Indexes for table `caretaker_master`
--
ALTER TABLE `caretaker_master`
  ADD PRIMARY KEY (`Emp_id`),
  ADD UNIQUE KEY `Email_ID` (`Email_ID`);

--
-- Indexes for table `city_master`
--
ALTER TABLE `city_master`
  ADD PRIMARY KEY (`City_id`);

--
-- Indexes for table `feedback_master`
--
ALTER TABLE `feedback_master`
  ADD PRIMARY KEY (`Feedback_id`);

--
-- Indexes for table `receipt_master`
--
ALTER TABLE `receipt_master`
  ADD PRIMARY KEY (`Receipt_id`);

--
-- Indexes for table `service_master`
--
ALTER TABLE `service_master`
  ADD PRIMARY KEY (`Service_id`),
  ADD UNIQUE KEY `Service_name` (`Service_type`);

--
-- Indexes for table `user_master`
--
ALTER TABLE `user_master`
  ADD PRIMARY KEY (`User_id`),
  ADD UNIQUE KEY `Email_ID` (`Email_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `area_master`
--
ALTER TABLE `area_master`
  MODIFY `Area_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `caretaker_master`
--
ALTER TABLE `caretaker_master`
  MODIFY `Emp_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `city_master`
--
ALTER TABLE `city_master`
  MODIFY `City_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `feedback_master`
--
ALTER TABLE `feedback_master`
  MODIFY `Feedback_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `receipt_master`
--
ALTER TABLE `receipt_master`
  MODIFY `Receipt_id` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `service_master`
--
ALTER TABLE `service_master`
  MODIFY `Service_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_master`
--
ALTER TABLE `user_master`
  MODIFY `User_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
