-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 30, 2022 at 09:03 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `verms_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_Id` varchar(50) NOT NULL,
  `admin_Name` text DEFAULT NULL,
  `user_name` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_Id`, `admin_Name`, `user_name`, `password`) VALUES
('1', 'Simon', 'admin@gmail.com', 'admin@100');

-- --------------------------------------------------------

--
-- Table structure for table `alert`
--

CREATE TABLE `alert` (
  `alert_Id` varchar(50) NOT NULL,
  `alert_timeDate` date NOT NULL,
  `alert_type` varchar(50) NOT NULL,
  `appointment_Id` varchar(50) NOT NULL COMMENT '{fk}',
  `farmer_Id` varchar(50) NOT NULL COMMENT '{fk}',
  `doctor_Id` varchar(50) NOT NULL COMMENT '{fk}'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `animal`
--

CREATE TABLE `animal` (
  `animal_Id` varchar(50) NOT NULL,
  `animal_Name` text DEFAULT NULL,
  `farmer_Id` varchar(50) NOT NULL COMMENT '{fk}'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `appointment_Id` int(11) NOT NULL,
  `your_name` varchar(255) NOT NULL,
  `your_location` varchar(255) NOT NULL,
  `appointment_Type` varchar(50) NOT NULL,
  `appointment_Date` date NOT NULL,
  `appointment_Time` time(6) NOT NULL,
  `appointment_Description` text NOT NULL,
  `farmer_Id` varchar(50) NOT NULL COMMENT '{fk}',
  `doctor_Id` varchar(50) NOT NULL COMMENT '{fk}',
  `payment_Id` varchar(50) NOT NULL COMMENT '{fk}'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`appointment_Id`, `your_name`, `your_location`, `appointment_Type`, `appointment_Date`, `appointment_Time`, `appointment_Description`, `farmer_Id`, `doctor_Id`, `payment_Id`) VALUES
(1, 'simon', 'masindi', 'Emergency', '2022-09-03', '10:51:00.000000', 'here', '', '', ''),
(2, 'Henry', 'Kampala', 'Not Emergency', '2022-09-03', '10:03:00.000000', 'hoooooooooooooooooo', '', '', ''),
(3, 'simon', 'sacdscx', 'Emergency', '2022-08-04', '13:55:00.000000', 'l;;;;;;;;;;;;;;;;;;;;;;;', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `appointment_type`
--

CREATE TABLE `appointment_type` (
  `appType_Id` varchar(50) NOT NULL,
  `emergency` varchar(50) NOT NULL,
  `appointment_Id` varchar(50) NOT NULL COMMENT '{fk}',
  `notEmergency` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_Id` varchar(50) NOT NULL,
  `cat_Name` text NOT NULL,
  `cat_description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `district`
--

CREATE TABLE `district` (
  `district_Id` varchar(50) NOT NULL,
  `district_Name` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `doctor_Id` varchar(50) NOT NULL,
  `user_Id` varchar(50) NOT NULL COMMENT '{fk}',
  `doctor_registrationNumber` varchar(50) NOT NULL,
  `level_qualification` text NOT NULL,
  `cat_Id` varchar(50) NOT NULL COMMENT '{fk}',
  `doctor_status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `farmer`
--

CREATE TABLE `farmer` (
  `farmer_Id` varchar(50) NOT NULL,
  `user_Id` varchar(50) NOT NULL COMMENT '{fk}'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payment_Id` varchar(50) NOT NULL,
  `payment_Date` date NOT NULL,
  `payment_Time` time(6) NOT NULL,
  `amount` varchar(50) NOT NULL,
  `farmer_Id` varchar(50) NOT NULL COMMENT '{fk}',
  `doctor_Id` varchar(20) NOT NULL COMMENT '{fk}'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE `report` (
  `report_Id` int(11) NOT NULL,
  `your_name` varchar(255) NOT NULL,
  `report_Area` varchar(255) NOT NULL,
  `animal` varchar(255) NOT NULL,
  `disease_Description` varchar(255) NOT NULL,
  `farmer_Id` int(11) NOT NULL COMMENT '{fk}'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `report`
--

INSERT INTO `report` (`report_Id`, `your_name`, `report_Area`, `animal`, `disease_Description`, `farmer_Id`) VALUES
(1, '0000-00-00', '00:00:00.000000', 'Cow', 'here', 0),
(2, 'simon', 'Peter', 'Cow', 'jk,m', 0),
(4, 'Peter', 'Kikoni', 'Sheep', 'Sick', 0),
(5, 'jjjjjj', 'kkkkkkkkkk', 'Cow', 'kllllll', 0);

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `service_Id` varchar(50) NOT NULL,
  `service_Name` text NOT NULL,
  `service_description` text NOT NULL,
  `doctor_Id` varchar(50) NOT NULL COMMENT '{fk}'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_Id` int(50) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(13) NOT NULL,
  `password` varchar(20) NOT NULL,
  `user_type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_Id`, `name`, `email`, `phone`, `password`, `user_type`) VALUES
(1, 'Adima Gilbert', 'doctor@gmail.com', '0750395527', '12345', 'doctor'),
(2, 'Simon', 'admin@gmail.com', '0782951174', 'admin@100', 'admin'),
(3, 'Bella', 'farmer@gmail.com', '+256750395527', '123456', 'farmer'),
(4, 'Simon Amapiri', 'amapirisimon@gmail.com', '0750395527', '12', 'doctor'),
(5, 'Birungi Mourisha', 'mbirungi@gmail.com', '0777345946', '1234', 'farmer'),
(6, 'Joseph', 'joseph@gmail.com', '0777766666', '1234', 'farmer'),
(7, 'Shaban Deno', 'shaban@gmail.com', '0775395127', '1234', 'farmer'),
(8, 'Adima Gilbert', 'gilbert@gmail.com', '0777533333', '1234', 'farmer');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`appointment_Id`);

--
-- Indexes for table `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`report_Id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `appointment_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `report`
--
ALTER TABLE `report`
  MODIFY `report_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_Id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
