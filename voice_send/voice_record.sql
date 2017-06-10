-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 15, 2017 at 05:46 AM
-- Server version: 5.7.14
-- PHP Version: 7.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `voice`
--

-- --------------------------------------------------------

--
-- Table structure for table `voice_record`
--

CREATE TABLE `voice_record` (
  `id` int(11) NOT NULL,
  `voice_file_addr` varchar(100) NOT NULL,
  `user_id` int(11) NOT NULL,
  `dr_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `voice_record`
--

INSERT INTO `voice_record` (`id`, `voice_file_addr`, `user_id`, `dr_id`) VALUES
(2, '1videoplayback.m4a', 1, 1),
(3, 'voice\\1videoplayback.m4a', 1, 1),
(4, '1videoplayback.m4a', 1, 1),
(5, '1New Arrivals in LRC  30-01-2017.rtf', 1, 1),
(6, '1videoplayback.m4a', 1, 1),
(7, '1videoplayback.m4a', 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `voice_record`
--
ALTER TABLE `voice_record`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `voice_record`
--
ALTER TABLE `voice_record`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
