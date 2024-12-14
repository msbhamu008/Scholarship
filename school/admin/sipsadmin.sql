-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 20, 2017 at 03:38 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sipsadmin`
--

-- --------------------------------------------------------

--
-- Table structure for table `newupdate`
--

CREATE TABLE IF NOT EXISTS `newupdate` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `newupdate`
--

INSERT INTO `newupdate` (`id`, `title`, `description`, `start_date`, `end_date`) VALUES
(1, 'new updates check', 'This article describes the standard terminology that defines the software updates for the Windows Update and Microsoft Update services', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'timetable updates', 'School timetables usually cycle every week or every fortnight. The phrase "school timetables" largely refers to high schools, because primary schools typically have simple structures.', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'Insert Update Test', 'check if inserted or not', '2017-09-20 15:06:02', '2017-09-24 00:00:00'),
(4, 'Test 2', 'test 2 description', '2017-09-20 15:25:08', '2017-09-24 00:00:00'),
(5, 'Test 3', 'test 3 description', '2017-09-20 15:25:47', '2017-09-24 00:00:00'),
(6, 'Test 4', 'test 4 description', '2017-09-20 15:25:53', '2017-09-24 00:00:00'),
(7, 'Test 5', 'test 6 description', '2017-09-20 15:26:01', '2017-09-24 00:00:00');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
