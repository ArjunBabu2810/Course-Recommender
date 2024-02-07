-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 25, 2023 at 10:54 AM
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
-- Table structure for table `Student`
--

CREATE TABLE `Student` (
  `Studentid` int(6) NOT NULL,
  `Name` varchar(25) NOT NULL,
  `Email` varchar(320) NOT NULL,
  `Password` varchar(25) NOT NULL,
  `Courseid` int(6) DEFAULT NULL,
  `Collegeid` int(6) DEFAULT NULL,
  `Intrestid` int(6) DEFAULT NULL,
  `Year` date DEFAULT NULL,
  `Jobid` int(6) DEFAULT NULL,
  `Phone` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Student`
--

INSERT INTO `Student` (`Studentid`, `Name`, `Email`, `Password`, `Courseid`, `Collegeid`, `Intrestid`, `Year`, `Jobid`, `Phone`) VALUES
(935553, 'Arjun', 'A@gmail.cpm', '12345', 1, 200004, 100001, '2023-09-13', 12349, 65416553),
(935554, 'saf', 'sdg', 'sdga', 1, 200001, 100003, '2023-09-06', 12345, 453453),
(935555, 'Arjun', 'A@gmail.cpmfd', '12345', 1, 200004, 100001, '2023-09-13', 12349, 65416553),
(935556, 'Arjunfg', 'wsdg', '12345', 1, 200004, 100001, '2023-09-13', 12349, 65416553),
(935559, 'Arjunfg', 'as@gmail.com', '12345', NULL, NULL, NULL, '2023-09-13', NULL, 65416553);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Student`
--
ALTER TABLE `Student`
  ADD PRIMARY KEY (`Studentid`),
  ADD UNIQUE KEY `Email` (`Email`),
  ADD KEY `Collegeid` (`Collegeid`),
  ADD KEY `Courseid` (`Courseid`),
  ADD KEY `Intrestid` (`Intrestid`),
  ADD KEY `Jobid` (`Jobid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Student`
--
ALTER TABLE `Student`
  MODIFY `Studentid` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=935560;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Student`
--
ALTER TABLE `Student`
  ADD CONSTRAINT `Student_ibfk_1` FOREIGN KEY (`Collegeid`) REFERENCES `College` (`Collegeid`),
  ADD CONSTRAINT `Student_ibfk_2` FOREIGN KEY (`Courseid`) REFERENCES `Course` (`Courseid`),
  ADD CONSTRAINT `Student_ibfk_3` FOREIGN KEY (`Intrestid`) REFERENCES `Intrest` (`Intrestid`),
  ADD CONSTRAINT `Student_ibfk_4` FOREIGN KEY (`Jobid`) REFERENCES `Job` (`Jobid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
