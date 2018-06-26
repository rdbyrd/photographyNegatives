-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 26, 2018 at 03:33 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
  `id` int(13) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `firstname` varchar(255) DEFAULT NULL,
  `datetaken` date NOT NULL,
  `fee` float(9,2) NOT NULL,
  `negativenum` int(11) NOT NULL,
  `jobtype` varchar(255) DEFAULT NULL,
  `description` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `negatives`
--

INSERT INTO `negatives` (`id`, `lastname`, `firstname`, `datetaken`, `fee`, `negativenum`, `jobtype`, `description`) VALUES
(1, 'Adams', 'B', '1950-07-01', 2.00, 4026, 'Passport', ''),
(2, 'Anderson', 'J', '1950-02-14', 7500.00, 4000, 'Wedding', ''),
(3, 'Anderson', 'Mike', '1950-01-30', 9500.00, 3999, 'Business', ''),
(4, 'Baker', 'James', '1950-09-10', 30.00, 4511, 'Family Portrait', ''),
(5, 'Bindle', 'Samuel', '1950-12-02', 2.00, 4602, 'Passport', ''),
(6, 'Brady', 'Ann', '1950-04-06', 10.00, 4127, 'Senior Pictures', ''),
(7, 'Braxton', 'P', '1950-08-21', 100.00, 4463, 'Wedding', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `negatives`
--
ALTER TABLE `negatives`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `negatives`
--
ALTER TABLE `negatives`
  MODIFY `id` int(13) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
