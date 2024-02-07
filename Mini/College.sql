-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 21, 2023 at 07:42 AM
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
-- Table structure for table `College`
--

CREATE TABLE `College` (
  `Collegeid` int(6) NOT NULL,
  `Name` varchar(25) NOT NULL,
  `Email` varchar(320) NOT NULL,
  `Password` varchar(25) NOT NULL,
  `Phone` int(12) NOT NULL,
  `Website` varchar(1000) NOT NULL,
  `Address` varchar(1000) NOT NULL,
  `Place` varchar(50) NOT NULL,
  `Status` tinyint(1) NOT NULL,
  `Rating` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `College`
--
ALTER TABLE `College`
  ADD PRIMARY KEY (`Collegeid`),
  ADD UNIQUE KEY `Email` (`Email`),
  ADD UNIQUE KEY `Website` (`Website`) USING HASH;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `College`
--
ALTER TABLE `College`
  MODIFY `Collegeid` int(6) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
