-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 21, 2019 at 08:26 AM
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
(8, 'dd', 2001, '2019-05-22', '2019-05-24', '09:00:00', '12:00:00', '1234');

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
(57, 1008, 2002, NULL, '2019-05-23', '16:00:00', '17:00:00', 'kkjj');

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
(2000, 'Squash Courts', 6, 4.8, 10, 'Good choice!', '09:00:00', '17:30:00'),
(2001, 'Tennis', 10, 8, 6, 'Tennis (Tarmac) - £10.00 per court per hour', '09:00:00', '17:00:00'),
(2002, 'Aerobics Room', 20, 16, 15, 'A mirrored studio is available for group classes such as dance, yoga and Pilates. This space can also be used for presentations and functions.', '09:00:00', '18:00:00'),
(2003, 'Athletics Track', 2, 1.6, 20, 'Track - £2.00 per person', '09:00:00', '17:00:00'),
(2004, 'Track sole use', 30, 24, 1, 'Track (sole use) - £30.00 per hour', '09:00:00', '17:00:00');

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
(1008, 'zheng', '$2y$10$Bfs3RZFE.nLzltCA0Cgfue.hNQhCFp54GGCBOJATTD/ASe9ESGP7O', '1403823902@qq.com', 'CHENGLONG', 'ZHENG', 0, 0),
(1009, 'Iris', '$2y$10$UH9B4qhNf72Opj/fjh1xqubcvNWzTdfSB0Wa9v6MPZ4KvSNFpCeXK', 'iris_wangfei@hotmail.com', 'Fei', 'Wang', 0, 0);

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
  MODIFY `eventID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `bookingID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `facility`
--
ALTER TABLE `facility`
  MODIFY `facilityID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2005;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1010;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `event_ibfk_1` FOREIGN KEY (`eventID`) REFERENCES `event` (`eventID`),
  ADD CONSTRAINT `facility_ibfk_1` FOREIGN KEY (`facilityID`) REFERENCES `facility` (`facilityID`),
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `user` (`userID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
