-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 09, 2019 at 04:54 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `airline_master`
--

-- --------------------------------------------------------

--
-- Table structure for table `Flights`
--

CREATE TABLE `Flights` (
  `fltno` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  `source` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `destination` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `etd` time NOT NULL,
  `eta` time NOT NULL,
  `duration` time NOT NULL,
  `fc_seats` int(3) NOT NULL,
  `b_seats` int(3) NOT NULL,
  `e_seats` int(3) NOT NULL,
  `fare` float(7,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `Flights`
--

INSERT INTO `Flights` (`fltno`, `source`, `destination`, `etd`, `eta`, `duration`, `fc_seats`, `b_seats`, `e_seats`, `fare`) VALUES
('100', 'vizag', 'delhi', '10:30:00', '13:00:00', '02:30:00', 12, 0, 120, 799.99),
('161', 'mumbai', 'new york', '09:00:00', '01:00:00', '16:00:00', 0, 20, 210, 2000.50),
('299', 'mumbai', 'delhi', '09:00:00', '12:00:00', '03:00:00', 0, 0, 140, 500.00);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `points` int(50) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `points`) VALUES
(1, 'test', NULL, 'testpass', 0),
(2, 'tanvi', NULL, '7ad77b06fe9f1a33d6dabdd518fab8ed', 0),
(3, 'tanishk', NULL, 'cd77144d5454e421111aea3764856f25', 0),
(4, 'abcde', NULL, 'ab56b4d92b40713acc5af89985d4b786', 65);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Flights`
--
ALTER TABLE `Flights`
  ADD PRIMARY KEY (`fltno`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
