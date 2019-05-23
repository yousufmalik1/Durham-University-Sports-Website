-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: May 23, 2019 at 08:22 AM
-- Server version: 5.7.25
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dus_team1`
--

-- --------------------------------------------------------

--
-- Table structure for table `block_booking`
--

CREATE TABLE `block_booking` (
  `eventID` int(11) NOT NULL,
  `eventName` text NOT NULL,
  `facilityID` int(11) NOT NULL,
  `dateFrom` date NOT NULL,
  `dateTo` date NOT NULL,
  `timeFrom` time NOT NULL,
  `timeTo` time NOT NULL,
  `dow` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `block_booking`
--

INSERT INTO `block_booking` (`eventID`, `eventName`, `facilityID`, `dateFrom`, `dateTo`, `timeFrom`, `timeTo`, `dow`) VALUES
(1, 'Exercise class', 0, '0000-00-00', '0000-00-00', '14:00:00', '17:00:00', ''),
(2, 'Exams', 0, '0000-00-00', '0000-00-00', '09:00:00', '12:00:00', ''),
(3, 'fdsfs', 2002, '2019-05-22', '2019-05-25', '09:00:00', '10:00:00', '1'),
(4, 'fdsfs', 2002, '2019-05-22', '2019-05-25', '09:00:00', '10:00:00', '1'),
(5, 'hjbjk', 2002, '2019-05-22', '2019-05-24', '09:00:00', '10:00:00', '12'),
(6, 'sdsdsd', 2000, '2019-05-21', '2019-05-21', '07:00:00', '07:00:00', '1'),
(7, '12345', 2002, '2019-05-22', '2019-05-24', '14:00:00', '16:00:00', '123'),
(8, 'dd', 2001, '2019-05-22', '2019-05-24', '09:00:00', '12:00:00', '1234'),
(9, '', 2000, '2019-05-22', '2019-05-31', '15:00:00', '16:00:00', '14'),
(10, 'test22', 2001, '2019-05-22', '2019-05-22', '13:00:00', '15:00:00', '45'),
(11, 'test', 2001, '2019-05-22', '2019-06-01', '13:00:00', '15:00:00', '45'),
(12, 'testFriday', 2003, '2019-06-01', '2019-06-14', '14:00:00', '15:00:00', '12'),
(13, 'testMonday', 2002, '2019-06-05', '2019-06-19', '14:00:00', '15:00:00', '12');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `bookingID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `facilityID` int(11) NOT NULL,
  `eventID` int(11) DEFAULT NULL,
  `bookingDate` date NOT NULL,
  `startTime` time NOT NULL,
  `endTime` time NOT NULL,
  `bookingTitle` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`bookingID`, `userID`, `facilityID`, `eventID`, `bookingDate`, `startTime`, `endTime`, `bookingTitle`) VALUES
(28, 1008, 2000, 3000, '2019-05-19', '09:00:00', '10:00:00', 'Durham University123'),
(30, 1009, 2002, 3001, '2019-05-20', '09:00:00', '13:00:00', 'Durham University'),
(31, 1008, 2002, 3001, '2019-05-20', '09:00:00', '11:00:00', 'Durham University1111111'),
(48, 1008, 2000, NULL, '2019-05-09', '09:00:00', '10:00:00', ''),
(49, 1008, 2000, NULL, '2020-05-21', '14:00:00', '15:00:00', ''),
(50, 1008, 2004, NULL, '2019-05-21', '09:00:00', '10:00:00', ''),
(51, 1008, 2000, NULL, '2019-05-22', '09:00:00', '10:00:00', '123123'),
(52, 1008, 2002, NULL, '2019-05-22', '16:00:00', '17:00:00', '345345'),
(53, 1008, 2003, NULL, '2019-05-22', '15:00:00', '16:00:00', 'fgchjv'),
(54, 1008, 2002, NULL, '2019-05-23', '15:00:00', '16:00:00', ' bvvnm bnvb'),
(55, 1008, 2003, NULL, '2019-05-22', '13:00:00', '14:00:00', 'ghtfgjhv'),
(56, 1008, 2002, NULL, '2019-05-23', '14:00:00', '15:00:00', 'zefdghf'),
(57, 1008, 2002, NULL, '2019-05-23', '16:00:00', '17:00:00', 'kkjj'),
(58, 1013, 2003, NULL, '2019-05-23', '09:00:00', '10:00:00', 'wen'),
(59, 1013, 2000, NULL, '2019-05-21', '09:00:00', '10:00:00', 'Squash court'),
(60, 1013, 2003, NULL, '2019-05-23', '09:00:00', '10:00:00', 'wen'),
(61, 1013, 2000, NULL, '2019-05-21', '12:00:00', '13:00:00', '714'),
(62, 1008, 2004, NULL, '2019-05-22', '09:00:00', '10:00:00', '522'),
(63, 1016, 2002, NULL, '2019-05-22', '09:00:00', '10:00:00', '522test');

-- --------------------------------------------------------

--
-- Table structure for table `facility`
--

CREATE TABLE `facility` (
  `facilityID` int(11) NOT NULL,
  `facilityName` text NOT NULL,
  `price` double NOT NULL,
  `priceStu` double NOT NULL,
  `capacity` int(11) NOT NULL,
  `info` text NOT NULL,
  `timeOpen` time NOT NULL,
  `timeClose` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `facility`
--

INSERT INTO `facility` (`facilityID`, `facilityName`, `price`, `priceStu`, `capacity`, `info`, `timeOpen`, `timeClose`) VALUES
(2000, 'Squash Courts', 6, 4.8, 10, 'The price is 6 pound. The student price is 4.8 pound. The open time is from 9:00 to 17:30.', '09:00:00', '17:30:00'),
(2001, 'Tennis', 10, 8, 6, 'The price is 10 pound. The student price is 8 pound. The open time is from 9:00 to 17:00.', '09:00:00', '17:00:00'),
(2002, 'Aerobics Room', 20, 16, 15, 'The price is 20 pound. The student price is 16 pound. The open time is from 9:00 to 18:00.', '09:00:00', '18:00:00'),
(2003, 'Athletics Track', 2, 1.6, 20, 'The price is 2 pound. The student price is 1.6 pound. The open time is from 9:00 to 17:00.', '09:00:00', '17:00:00'),
(2004, 'Track sole use', 30, 24, 1, 'The price is 30 pound. The student price is 24 pound. The open time is from 9:00 to 17:00.', '09:00:00', '17:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userID` int(11) NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `email` text NOT NULL,
  `firstname` text NOT NULL,
  `lastname` text NOT NULL,
  `role` tinyint(1) NOT NULL,
  `resetpasswordtime` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userID`, `username`, `password`, `email`, `firstname`, `lastname`, `role`, `resetpasswordtime`) VALUES
(1007, '123', '$2y$10$5Ua8ltBElOpbpzHxrl1DHeMlUdMIsXcsfclysbxz0.ai1aUNweG1i', '1234562@qq.com', '123', '123', 0, 0),
(1008, 'zheng', '$2y$10$Bfs3RZFE.nLzltCA0Cgfue.hNQhCFp54GGCBOJATTD/ASe9ESGP7O', '1403823902@qq.com', 'CHENGLONG', 'ZHENG', 1, 0),
(1009, 'Iris', '$2y$10$UH9B4qhNf72Opj/fjh1xqubcvNWzTdfSB0Wa9v6MPZ4KvSNFpCeXK', 'iris_wangfei@hotmail.com', 'Fei', 'Wang', 0, 0),
(1010, '999', '$2y$10$I2J6NFyWpW43VXCtBwiNB.VSvybl0P/RBd1mZeRAyfVoNMX/eBl6u', '999@hotmail.com', '999', '999', 0, 0),
(1011, '888', '$2y$10$ipqkoW1b1khixSw3yvpTKOEoYyPQ1wcWz6Tv3gq8iQ4z2xHl9l4Yq', '888@hotmail.com', '999', '999', 0, 0),
(1012, 'fff', '$2y$10$Uhayz9MILIj3CKPmvLK99uSsk26ktNf411sTt8/q3/rAbUJ1UsnMO', 'fff@hotmailo.com', 'fff', 'fff', 0, 0),
(1013, 'wen', '$2y$10$Sjyuiud.vEFkDpSMLcY4GOCD1urCknd1.WX2hNCqTethAOoZaxVHe', 'zhangluwen0817@163.com', 'zzz', 'zzz', 0, 1558460278),
(1014, 'fei', '$2y$10$dYRzLTISydu9SnwH1m/JbOli8i.FwkkEBDqC8jWNhdOD0XqHFcoga', 'fei.wang2@dur.ac.uk', 'fei', 'fei', 0, 0),
(1015, '99999', '$2y$10$ThCBxVtiwSmeaP5IfBW0qeBkZm2B/yxETwQQCmZIcKBoHVffQB2Ta', '99999@hotmail.com', '999', '999', 0, 0),
(1016, 'ccc', '$2y$10$zOekQfIVS3WIxDPi7NV/9eQOcnBvF6wQsLM95c5x0Medcc2yAADK6', 'ccc@qq.com', 'ccc', 'ccc', 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `block_booking`
--
ALTER TABLE `block_booking`
  ADD PRIMARY KEY (`eventID`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`bookingID`),
  ADD KEY `user_ibfk_1` (`userID`),
  ADD KEY `facility_ibfk_1` (`facilityID`),
  ADD KEY `event_ibfk_1` (`eventID`);

--
-- Indexes for table `facility`
--
ALTER TABLE `facility`
  ADD PRIMARY KEY (`facilityID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `block_booking`
--
ALTER TABLE `block_booking`
  MODIFY `eventID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `bookingID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `facility`
--
ALTER TABLE `facility`
  MODIFY `facilityID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2007;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1017;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
