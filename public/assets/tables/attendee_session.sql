-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 05, 2022 at 05:30 PM
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
-- Table structure for table `attendee_session`
--

CREATE TABLE `attendee_session` (
  `session` int NOT NULL,
  `attendee` int NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attendee_session`
--

INSERT INTO `attendee_session` (`session`, `attendee`) VALUES
(10, 4),
(10, 36),
(10, 40),
(11, 37),
(12, 38),
(12, 40),
(12, 41),
(13, 4),
(13, 39),
(14, 4),
(14, 36),
(14, 39),
(14, 41),
(15, 36),
(15, 37),
(16, 4),
(16, 37),
(16, 38),
(16, 40);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendee_session`
--
ALTER TABLE `attendee_session`
  ADD PRIMARY KEY (`session`,`attendee`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
