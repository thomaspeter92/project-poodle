-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 27, 2021 at 01:38 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `projectPoodle`
--

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `eventDate` datetime NOT NULL,
  `location` varchar(255) NOT NULL,
  `itinerary` longtext CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `description` text DEFAULT NULL,
  `hostId` int(11) NOT NULL,
  `expiryDate` datetime NOT NULL,
  `rating` int(11) NOT NULL,
  `guestLimit` int(11) NOT NULL,
  `imageName` varchar(255) DEFAULT NULL,
  `dateCreated` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `eventAttend`
--

CREATE TABLE `eventAttend` (
  `id` int(11) NOT NULL,
  `eventId` int(11) DEFAULT NULL,
  `guestId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `eventComment`
--

CREATE TABLE `eventComment` (
  `id` int(11) NOT NULL,
  `userId` int(11) DEFAULT NULL,
  `eventId` int(11) DEFAULT NULL,
  `dateCreation` datetime NOT NULL DEFAULT current_timestamp(),
  `comment` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `eventRating`
--

CREATE TABLE `eventRating` (
  `id` int(11) NOT NULL,
  `eventId` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `rating` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `date_subscription` datetime NOT NULL DEFAULT current_timestamp(),
  `kakao` tinyint(1) DEFAULT 0,
  `google` tinyint(1) DEFAULT 0,
  `profileImage` varchar(255) DEFAULT NULL,
  `points` int(11) DEFAULT NULL,
  `rating` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `notificationID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `message` varchar(255) NOT NULL,
  `viewed` varchar(3) DEFAULT NULL,
  `notificationDate` datetime NOT NULL DEFAULT current_timestamp(),
  `href` varchar(255) DEFAULT NULL,
  `eventDate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `petProfile`
--

CREATE TABLE `petProfile` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `breed` varchar(255) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `weight` float DEFAULT NULL,
  `color` varchar(255) DEFAULT NULL,
  `friendliness` varchar(255) DEFAULT NULL,
  `activityLevel` varchar(255) DEFAULT NULL,
  `ownerId` int(11) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `description` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `eventAttend`
--
ALTER TABLE `eventAttend`
  ADD PRIMARY KEY (`id`),
  ADD KEY `CONSTRAINT` (`eventId`);

--
-- Indexes for table `eventComment`
--
ALTER TABLE `eventComment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_EventComment` (`eventId`);

--
-- Indexes for table `eventRating`
--
ALTER TABLE `eventRating`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `eventId` (`eventId`,`userId`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`notificationID`);

--
-- Indexes for table `petProfile`
--
ALTER TABLE `petProfile`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT for table `eventAttend`
--
ALTER TABLE `eventAttend`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=135;

--
-- AUTO_INCREMENT for table `eventComment`
--
ALTER TABLE `eventComment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

--
-- AUTO_INCREMENT for table `eventRating`
--
ALTER TABLE `eventRating`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=139;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=131;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `notificationID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=269;

--
-- AUTO_INCREMENT for table `petProfile`
--
ALTER TABLE `petProfile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `eventAttend`
--
ALTER TABLE `eventAttend`
  ADD CONSTRAINT `CONSTRAINT` FOREIGN KEY (`eventId`) REFERENCES `event` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `eventComment`
--
ALTER TABLE `eventComment`
  ADD CONSTRAINT `FK_EventComment` FOREIGN KEY (`eventId`) REFERENCES `event` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
