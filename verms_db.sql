-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 28, 2022 at 08:04 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

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
-- Table structure for table `animals`
--

CREATE TABLE `animals` (
  `id` int(11) NOT NULL,
  `animal` char(100) NOT NULL,
  `date_added` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `animals`
--

INSERT INTO `animals` (`id`, `animal`, `date_added`) VALUES
(5, 'Goat', '2022-09-05'),
(6, 'Cow', '2022-09-05'),
(7, 'Sheep', '2022-09-05'),
(8, 'Pig', '2022-09-05');

-- --------------------------------------------------------

--
-- Table structure for table `animal_disease_cases`
--

CREATE TABLE `animal_disease_cases` (
  `id` int(11) NOT NULL,
  `disease_case` text NOT NULL,
  `user` int(11) NOT NULL,
  `date_added` date NOT NULL,
  `_timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `location` char(200) NOT NULL,
  `animal` smallint(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `animal_disease_cases`
--

INSERT INTO `animal_disease_cases` (`id`, `disease_case`, `user`, `date_added`, `_timestamp`, `location`, `animal`) VALUES
(1, 'My chicken are over falling of the tree when they are sleeping', 10, '2022-09-05', '2022-09-05 06:32:56', 'Kampala', 6),
(2, 'foot disease', 12, '2022-09-06', '2022-09-06 09:41:41', 'Nakaseke', 5),
(3, 'unfamiliar signs', 13, '2022-09-06', '2022-09-06 09:48:42', 'Nansana', 7),
(4, 'Sick', 12, '2022-09-07', '2022-09-07 05:40:01', 'Nansana', 8),
(5, 'jjjj', 12, '2022-09-07', '2022-09-07 05:40:36', 'jkkkl', 5);

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `user` int(11) NOT NULL,
  `doctor` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `payment` int(11) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `appointment` smallint(6) NOT NULL DEFAULT 1,
  `_time` time DEFAULT NULL,
  `_date` date DEFAULT NULL,
  `date_added` date DEFAULT NULL,
  `status` smallint(6) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`user`, `doctor`, `id`, `payment`, `description`, `location`, `appointment`, `_time`, `_date`, `date_added`, `status`) VALUES
(9, 1, 5, NULL, 'New Chicken Pox', 'Kampala', 1, '23:30:00', '2022-09-15', '2022-09-01', 0),
(9, 4, 6, NULL, 'Small Pox', 'Kampala', 2, '23:31:00', '2022-09-02', '2022-09-01', 0),
(9, 4, 7, NULL, 'Chicken pox', 'kampala', 1, '10:32:00', '2022-09-02', '2022-09-02', 0),
(10, 4, 8, NULL, 'Chicken pox', 'Kampala', 2, '10:52:00', '2022-09-16', '2022-09-02', 0),
(10, 1, 9, NULL, 'Chicken all died a natural death', 'Kampala', 1, '12:06:00', '2022-09-14', '2022-09-05', 1),
(1, 1, 10, NULL, 'critical condition', 'Bulenga', 1, '17:39:00', '2022-09-05', '2022-09-05', 0),
(13, 4, 11, NULL, 'animals dying without any serios symptoms of a disease', 'Lufula', 2, '12:45:00', '2022-09-09', '2022-09-06', 0),
(12, 3, 12, NULL, 'swine my pig is sneezing constantly', 'kibuli', 1, '19:53:00', '2022-09-06', '2022-09-06', 0),
(12, 1, 13, NULL, 'my cow lacks appetite', 'kwese', 2, '19:59:00', '2022-09-06', '2022-09-06', 0),
(12, 1, 14, NULL, ' m ', 'Bulenga', 1, '13:24:00', '2022-09-15', '2022-09-18', 0);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_Id` varchar(50) NOT NULL,
  `cat_name` text NOT NULL,
  `cat_description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_Id`, `cat_name`, `cat_description`) VALUES
('1', 'sss', 'rrrrrrrr'),
('2', 'ddd', 'ddd');

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
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `message` text DEFAULT NULL,
  `sender` int(11) NOT NULL,
  `receiver` int(11) NOT NULL,
  `date_added` date NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT 0,
  `appointment` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `message`, `sender`, `receiver`, `date_added`, `status`, `appointment`) VALUES
(1, 'We shall meet', 1, 10, '2022-09-05', 0, NULL),
(2, 'I have changed my mind.', 1, 10, '2022-09-05', 0, 9),
(3, 'Okay, We can now meet', 1, 10, '2022-09-05', 0, 9),
(4, 'wont come', 1, 10, '2022-09-05', 0, 9),
(5, 'ok will come', 1, 10, '2022-09-05', 0, 9),
(6, 'mmmmmmm', 1, 10, '2022-09-05', 0, 9),
(7, 'we shall meet tomorrow', 1, 10, '2022-09-05', 0, 9),
(8, 'waiting', 1, 10, '2022-09-05', 0, 9),
(9, 'ru', 1, 10, '2022-09-05', 0, 9),
(10, 'lets meet tommor', 1, 10, '2022-09-05', 0, 9),
(11, 'm', 1, 10, '2022-09-11', 0, 9),
(12, 'n', 1, 10, '2022-09-11', 0, 9),
(13, 'm,m,', 1, 10, '2022-09-11', 0, 9),
(14, 'lets meet at 5pm', 1, 10, '2022-09-11', 0, 9),
(15, 'lets meet at 5pm', 1, 10, '2022-09-11', 0, 9),
(16, 'lets meet at 5pm', 1, 10, '2022-09-11', 0, 9),
(17, 'lets meet at 5pm', 1, 10, '2022-09-11', 0, 9),
(18, 'lets meet at 5pm', 1, 10, '2022-09-11', 0, 9),
(19, 'lets meet at 5pm', 1, 10, '2022-09-11', 0, 9),
(20, 'lets meet at 5pm', 1, 10, '2022-09-11', 0, 9),
(21, 'vvvvvvvvvvvvvvvvvvvvvvv', 1, 10, '2022-09-17', 0, 9),
(22, 'bbbbbbbbbbbbbbbbbbbbb', 1, 10, '2022-09-17', 0, 9);

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `amount` int(11) NOT NULL DEFAULT 0,
  `appointment` int(11) NOT NULL,
  `date_added` date NOT NULL,
  `date_paid` date NOT NULL,
  `receipt` char(64) NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT 0,
  `_timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `user`, `amount`, `appointment`, `date_added`, `date_paid`, `receipt`, `status`, `_timestamp`) VALUES
(1, 9, 1000, 6, '2022-09-01', '2022-09-01', 'ad203a31c5b01573bd8768703300907541df4fcaefbefce05ec3cef18c4a7898', 2, '2022-09-03 14:56:47'),
(2, 9, 1000, 6, '2022-09-01', '2022-09-01', 'c9261cd2a19ddc757dc4a5a91b76516313e441f3d7a18e3f2ca8999301253d8d', 2, '2022-09-03 14:56:47'),
(3, 9, 1000, 6, '2022-09-01', '2022-09-01', 'a8ca97f1299818b674855d9014b4a5ca11847646f466a9520b57ac9f22204958', 2, '2022-09-03 14:56:47'),
(4, 9, 1500, 7, '2022-09-02', '2022-09-02', '2eea31212acd1fa4c0d25ea0680c03791146c21ea24cd582e72f954d8ac28701', 2, '2022-09-03 14:56:47'),
(5, 10, 1500, 8, '2022-09-02', '2022-09-02', '33b6aeb91824b0e33ed25d42049cbc5fc88af79821f2e347332d5d37b3abbe04', 1, '2022-09-03 14:56:47'),
(6, 10, 1500, 8, '2022-09-02', '2022-09-02', '39bf3361b9b3fe2abf621caef7d7068b17bb2e21d17c3f644f16c899aa000e97', 2, '2022-09-03 14:56:47'),
(7, 10, 1500, 8, '2022-09-02', '2022-09-02', 'b35d03563b243fdfd49598862a940cf9d5282345e34a72be02e759707644acc0', 2, '2022-09-03 14:56:47'),
(8, 10, 1500, 8, '2022-09-02', '2022-09-02', 'f3938a990e0d8a13b555daf9d3e4f54fe6139c429f64bc6fb52f3add1b21465b', 2, '2022-09-03 14:56:47'),
(9, 10, 1500, 8, '2022-09-02', '2022-09-02', '5493fc61d9fe812fd86d2ab2f45744a452a85775675bc9dc86479be4752a235a', 2, '2022-09-03 14:56:47'),
(10, 10, 800, 9, '2022-09-05', '2022-09-05', '9a5b8b377a9161880277aea7786c2176a0a37fe65d8e879d661d5aa491e5a188', 0, '2022-09-05 09:05:32'),
(11, 10, 1000, 9, '2022-09-05', '2022-09-05', '7d1c8ea83b35283874be6319a4b00a56c5f405fd9442aff8d55300e155be4803', 2, '2022-09-05 09:07:16'),
(12, 10, 1000, 9, '2022-09-05', '2022-09-05', 'ecf85a88b996ad79ee28da3a6d6f7da3fafb899d7b3b5ae98eb8bc1e2f130180', 1, '2022-09-05 09:08:28'),
(13, 12, 1000, 12, '2022-09-06', '2022-09-06', 'b14cad7a384a413af0975421ecd482a2aad49b72930615a83ffe2111379bf8a6', 0, '2022-09-06 20:50:00'),
(14, 12, 1000, 12, '2022-09-06', '2022-09-06', 'a7e398159b7fece406720aeefb3e8fe6236b7bbe3664f8591d6affc5ddce88ca', 0, '2022-09-06 20:51:11'),
(15, 12, 1000, 13, '2022-09-11', '2022-09-11', '23ae8a2ffb7faf2528c4be7c091719c1002a47817d6919e24121516ab10d8780', 0, '2022-09-11 10:18:22');

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE `report` (
  `id` int(11) NOT NULL,
  `date_time` date NOT NULL,
  `report_area` varchar(255) NOT NULL,
  `report_desc` varchar(400) NOT NULL,
  `doctor` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `report`
--

INSERT INTO `report` (`id`, `date_time`, `report_area`, `report_desc`, `doctor`) VALUES
(1, '2022-09-21', 'm,mmmmmmmmm', 'crud', '1'),
(2, '2022-09-21', 'nmmmmmmmmmm', 'nice.jpg, ', '1'),
(3, '2022-09-21', 'nmmmmmmmmmm', 'nice.jpg', '1'),
(4, '2022-09-21', 'vvvvvvvvvv', '', '1'),
(5, '2022-09-27', 'kampala', '', '1'),
(6, '2022-09-27', 'kampala', 'hhhhhhhhhhhhh', '1'),
(7, '2022-09-27', 'mmmmmmmmmmm', ',mmmmmmmmmmmmmm', '2'),
(8, '2022-09-27', 'xsklkx', 'klxsklxs', '3');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_Id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `user_type` varchar(50) NOT NULL,
  `description` text DEFAULT NULL,
  `cat` char(100) DEFAULT NULL,
  `country` char(100) DEFAULT NULL,
  `company` char(100) DEFAULT NULL,
  `address` char(200) DEFAULT NULL,
  `password` char(64) NOT NULL DEFAULT '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4',
  `deleted` smallint(1) NOT NULL DEFAULT 0,
  `photo` char(100) NOT NULL DEFAULT 'profile.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_Id`, `name`, `email`, `phone`, `user_type`, `description`, `cat`, `country`, `company`, `address`, `password`, `deleted`, `photo`) VALUES
(1, 'Baguma Luis', 'bs@gmail.com', '0782951174', 'farmer', NULL, NULL, NULL, NULL, NULL, 'e86f78a8a3caf0b60d8e74e5942aa6d86dc150cd3c03338aef25b7d2d7e3acc7', 0, '3730fcb6312ca5df2edc15759e855649.jpg'),
(2, 'John Dosk', 'sim@gmail.com', '0782951174', 'doctor', NULL, NULL, NULL, NULL, NULL, '525506246601838eddd1796533ae08e760f313748d207ddaa6c2961e2f749d01', 0, 'profile.jpg'),
(3, 'Simon Peter', 'peter@gmail.com', '0782951174', 'doctor', NULL, NULL, NULL, NULL, NULL, 'be680c9cf6f35656ba7df2c01fd1b3d26adf173c7e40dcc0ad0ca116bdb5166b', 0, 'profile.jpg'),
(4, 'Simon Peter', 'farmer@gmail.com', '0782951174', 'farmer', NULL, NULL, NULL, NULL, NULL, 'e86f78a8a3caf0b60d8e74e5942aa6d86dc150cd3c03338aef25b7d2d7e3acc7', 0, 'profile.jpg'),
(5, 'Simon Peter Baguma', 'admin@gmail.com', '0782951174', 'admin', 'Developer', NULL, 'Uganda', 'Verms', 'Masindi', 'e86f78a8a3caf0b60d8e74e5942aa6d86dc150cd3c03338aef25b7d2d7e3acc7', 0, 'profile.jpg'),
(6, 'Baguma', 'ad@gmail.com', '0782951174', 'farmer', NULL, NULL, NULL, NULL, NULL, '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4', 0, 'profile.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `animals`
--
ALTER TABLE `animals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `animal_disease_cases`
--
ALTER TABLE `animal_disease_cases`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `receipt` (`receipt`);

--
-- Indexes for table `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `animals`
--
ALTER TABLE `animals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `animal_disease_cases`
--
ALTER TABLE `animal_disease_cases`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `report`
--
ALTER TABLE `report`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
