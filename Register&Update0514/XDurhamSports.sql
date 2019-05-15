-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- 主机： localhost
-- 生成日期： 2019-05-12 02:33:22
-- 服务器版本： 10.1.38-MariaDB
-- PHP 版本： 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 数据库： `XDurhamSports`
--

-- --------------------------------------------------------

--
-- 表的结构 `booking`
--

CREATE TABLE `booking` (
  `bookingID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `facilityID` int(11) NOT NULL,
  `eventID` int(11) NOT NULL,
  `start` time NOT NULL,
  `end` time NOT NULL,
  `bookingTitle` text NOT NULL,
  `notes` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `event`
--

CREATE TABLE `event` (
  `eventID` int(11) NOT NULL,
  `eventName` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `facility`
--

CREATE TABLE `facility` (
  `facilityID` int(11) NOT NULL,
  `facilityName` text NOT NULL,
  `price` double NOT NULL,
  `priceStu` double NOT NULL,
  `capacity` int(11) NOT NULL,
  `info` text NOT NULL,
  `timeStart` time NOT NULL,
  `timeClosed` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `facility`
--

INSERT INTO `facility` (`facilityID`, `facilityName`, `price`, `priceStu`, `capacity`, `info`, `timeStart`, `timeClosed`) VALUES
(1, 'Squash Courts', 6, 0, 0, 'Squash Courts: &pound6 per court, per hour.', '00:00:00', '00:00:00'),
(2, 'Aerobics room', 40, 20, 0, 'Water-based Astro - (hockey)', '00:00:00', '00:00:00'),
(3, 'Tennis', 10, 6, 0, 'There are multiple activites that take place in the sports hall.', '00:00:00', '00:00:00'),
(4, 'Athletics track', 45, 35, 0, 'If a coach is required the hourly rate for a coach is &pound15 per hour', '00:00:00', '00:00:00');

-- --------------------------------------------------------

--
-- 表的结构 `user`
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
-- 转存表中的数据 `user`
--

INSERT INTO `user` (`userID`, `username`, `password`, `email`, `firstname`, `lastname`, `role`) VALUES
(1, 'iris', '123', 'iris_wangfei@hotmail.com', 'iris', 'wang', 0),
(201906, 'iii', '$2y$10$TX8DL8sSbV.w/HXCX7j2y.y.GczigJzjzB1yNsOi7xtrnyObvvZ4G', '649965979@qq.com', 'qwe', 'asd', 0),
(201907, 'qqq', '$2y$10$YUs38vMghuOFH38POaOzp.2sT9tnhCqkNi3d1Erf5PAOaNcmSp0sO', 'fei.wang2@durham.ac.uk', 'fei', 'qwe', 0),
(201908, '222', '$2y$10$3M..zWX74zeYHYQHd6x.d.AlOoewzIvb8woKG4IOPjza4X4oX4OGW', 'wanyu.hong@durham.ac.uk', 'zxc', 'zxc', 0),
(201909, 'ccc', '$2y$10$hF30BiMRml.uxNkz09V9SOIpu8YsucWTpEIDIpzANIiPLNJnKV/1S', '649965979@qq.com', 'fei', 'wang', 0),
(201910, 'hehe', '$2y$10$TuedgD52R.DfwfNTuiAIm.wlezhRbKWkAphhmL5NbRYJowJi7/LZO', '649965979@qq.com', 'hehe', 'li', 0);

--
-- 转储表的索引
--

--
-- 表的索引 `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`bookingID`),
  ADD KEY `user_ibfk_1` (`userID`),
  ADD KEY `facility_ibfk_1` (`facilityID`),
  ADD KEY `event_ibfk_1` (`eventID`);

--
-- 表的索引 `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`eventID`);

--
-- 表的索引 `facility`
--
ALTER TABLE `facility`
  ADD PRIMARY KEY (`facilityID`);

--
-- 表的索引 `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userID`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `booking`
--
ALTER TABLE `booking`
  MODIFY `bookingID` int(11) NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `event`
--
ALTER TABLE `event`
  MODIFY `eventID` int(11) NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `facility`
--
ALTER TABLE `facility`
  MODIFY `facilityID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- 使用表AUTO_INCREMENT `user`
--
ALTER TABLE `user`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=201911;

--
-- 限制导出的表
--

--
-- 限制表 `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `event_ibfk_1` FOREIGN KEY (`eventID`) REFERENCES `event` (`eventID`),
  ADD CONSTRAINT `facility_ibfk_1` FOREIGN KEY (`facilityID`) REFERENCES `facility` (`facilityID`),
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `user` (`userID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
