-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 21, 2018 at 06:04 PM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `negative_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `negatives`
--

CREATE TABLE `negatives` (
  `ID` int(11) NOT NULL,
  `LastName` varchar(255) NOT NULL,
  `FirstName` varchar(255) DEFAULT NULL,
  `DateTaken` date NOT NULL,
  `Fee` float(9,2) NOT NULL,
  `NegativeNum` int(11) NOT NULL,
  `JobType` varchar(255) DEFAULT NULL,
  `Description` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `negatives`
--

INSERT INTO `negatives` (`ID`, `LastName`, `FirstName`, `DateTaken`, `Fee`, `NegativeNum`, `JobType`, `Description`) VALUES
(1, 'Adams', 'B', '1950-07-01', 2.00, 4026, 'Passport', ''),
(2, 'Anderson', 'J', '1950-02-14', 7500.00, 0, 'Wedding', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `negatives`
--
ALTER TABLE `negatives`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `negatives`
--
ALTER TABLE `negatives`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
