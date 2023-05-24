-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 05, 2022 at 05:31 PM
-- Server version: 8.0.27
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ao3886`
--

-- --------------------------------------------------------

--
-- Table structure for table `session`
--

CREATE TABLE `session` (
  `idsession` int NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `numberallowed` int NOT NULL,
  `event` int NOT NULL,
  `startdate` datetime NOT NULL,
  `enddate` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `session`
--

INSERT INTO `session` (`idsession`, `name`, `numberallowed`, `event`, `startdate`, `enddate`) VALUES
(8, 'Pre Game', 20, 12, '2022-10-14 14:00:00', '2022-10-14 19:00:00'),
(12, 'Travis Scott', 150, 8, '2022-10-26 21:00:00', '2022-10-26 23:00:00'),
(7, 'Jole', 100, 3, '2022-10-30 20:00:00', '2022-10-30 22:00:00'),
(10, 'Belgium Beers', 100, 9, '2022-11-26 20:00:00', '2022-11-27 20:00:00'),
(11, 'Croatian Beers', 50, 9, '2022-11-27 20:00:00', '2022-11-28 16:00:00'),
(13, 'Jole', 100, 8, '2022-10-27 21:00:00', '2022-10-27 23:00:00'),
(14, 'Dinamo - Milan', 2000, 12, '2022-10-14 20:00:00', '2022-10-14 23:00:00'),
(15, 'Dinamo - Salzburg Pre Game', 3000, 17, '2022-10-21 14:00:00', '2022-10-21 19:00:00'),
(16, 'Dinamo -Salzburg', 3000, 17, '2022-10-21 21:00:00', '2022-10-21 23:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `session`
--
ALTER TABLE `session`
  ADD PRIMARY KEY (`idsession`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `session`
--
ALTER TABLE `session`
  MODIFY `idsession` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
