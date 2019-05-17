-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 17, 2019 at 09:23 AM
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
-- Database: `xdurhamsports`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `bookingID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `facilityID` int(11) NOT NULL,
  `eventID` int(11) NOT NULL,
  `bookingDate` date NOT NULL,
  `startTime` time NOT NULL,
  `endTime` time NOT NULL,
  `people` int(11) NOT NULL,
  `bookingTitle` text NOT NULL,
  `notes` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `eventID` int(11) NOT NULL,
  `eventName` text NOT NULL,
  `eventTimeFrom` time NOT NULL,
  `eventTimeTo` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`eventID`, `eventName`, `eventTimeFrom`, `eventTimeTo`) VALUES
(3000, 'Exercise class', '14:00:00', '16:00:00'),
(3001, 'Exams', '09:00:00', '12:00:00');

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
  `role` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userID`, `username`, `password`, `email`, `firstname`, `lastname`, `role`) VALUES
(1000, 'Corwin', 'corwin', 'chenglong.zheng@durham.ac.uk', 'Chenglong', 'Zheng', 1),
(1001, 'Iris', 'iris', 'fei.wang2@durham.ac.uk', 'Fei', 'Wang', 1),
(1002, 'Xuantong', 'xuantong', 'xuantong.guo@durham.ac.uk', 'Xuantong', 'Guo', 1),
(1003, 'Luwen', 'luwen', 'luwen.zhang@durham.ac.uk', 'Luwen', 'Zhang', 1),
(1004, 'Philip', 'philip', 'philip.wright@durham.ac.uk', 'Philip', 'Wright', 1),
(1005, 'Yousuf', 'yousuf', 'yousuf.malik@durham.ac.uk', 'Yousuf', 'Malik', 1),
(1006, 'Mia', 'mia', '1403823902@qq.com', 'Mia', 'MC', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`bookingID`),
  ADD KEY `user_ibfk_1` (`userID`),
  ADD KEY `facility_ibfk_1` (`facilityID`),
  ADD KEY `event_ibfk_1` (`eventID`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`eventID`);

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
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `bookingID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `eventID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3002;

--
-- AUTO_INCREMENT for table `facility`
--
ALTER TABLE `facility`
  MODIFY `facilityID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2005;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1007;

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
