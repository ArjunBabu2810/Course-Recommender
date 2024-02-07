-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 21, 2023 at 07:54 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `course`
--

-- --------------------------------------------------------

--
-- Table structure for table `CollegeCourse`
--

CREATE TABLE `CollegeCourse` (
  `CCid` int(6) NOT NULL,
  `Collegeid` int(6) NOT NULL,
  `Courseid` int(6) NOT NULL,
  `Seats` int(4) NOT NULL,
  `Rating` decimal(10,0) DEFAULT NULL,
  `Status` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `CollegeCourse`
--
ALTER TABLE `CollegeCourse`
  ADD PRIMARY KEY (`CCid`),
  ADD KEY `Collegeid` (`Collegeid`),
  ADD KEY `Courseid` (`Courseid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `CollegeCourse`
--
ALTER TABLE `CollegeCourse`
  MODIFY `CCid` int(6) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `CollegeCourse`
--
ALTER TABLE `CollegeCourse`
  ADD CONSTRAINT `CollegeCourse_ibfk_1` FOREIGN KEY (`Collegeid`) REFERENCES `College` (`Collegeid`),
  ADD CONSTRAINT `CollegeCourse_ibfk_2` FOREIGN KEY (`Courseid`) REFERENCES `Course` (`Courseid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
