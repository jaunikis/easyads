-- phpMyAdmin SQL Dump
-- version 4.1.4
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 28, 2017 at 06:29 AM
-- Server version: 5.6.15-log
-- PHP Version: 5.4.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `adsuietm_ds4u`
--

-- --------------------------------------------------------

--
-- Table structure for table `reported_ads`
--

CREATE TABLE IF NOT EXISTS `reported_ads` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `datetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ad_id` int(6) NOT NULL,
  `reason` varchar(32) NOT NULL,
  `ip` varchar(64) NOT NULL,
  `timestamp` int(64) NOT NULL,
  `user` varchar(64) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `reported_ads`
--

INSERT INTO `reported_ads` (`id`, `datetime`, `ad_id`, `reason`, `ip`, `timestamp`, `user`) VALUES
(1, '0000-00-00 00:00:00', 67, 'Wrong phone number', '', 0, ''),
(2, '2017-07-27 06:22:31', 67, 'Inappropriate content', '', 0, ''),
(3, '2017-07-27 06:26:34', 67, 'Wrong phone number', '', 0, ''),
(4, '2017-07-27 06:27:05', 86, 'Other', '', 0, 'mv'),
(5, '2017-07-27 06:28:51', 86, 'Other', '', 0, 'mv'),
(6, '2017-07-27 06:30:44', 86, 'Inappropriate content', '', 0, 'mv'),
(7, '2017-07-28 05:44:05', 86, 'Inappropriate content', '', 0, 'mv'),
(8, '2017-07-28 05:49:17', 86, 'nnsdnmds smdns', '127.0.0.1', 0, 'mv'),
(9, '2017-07-28 05:53:57', 87, 'rururu', '127.0.0.1', 1501217636, 'mv'),
(10, '2017-07-28 05:55:57', 87, '', '127.0.0.1', 1501217756, 'mv'),
(11, '2017-07-28 05:57:14', 87, '', '127.0.0.1', 1501217833, 'mv'),
(12, '2017-07-28 05:58:31', 87, 'io', '127.0.0.1', 1501217910, 'mv'),
(13, '2017-07-28 06:08:42', 87, '', '127.0.0.1', 1501218521, 'mv'),
(14, '2017-07-28 06:11:16', 87, 'gfff', '127.0.0.1', 1501218675, 'mv'),
(15, '2017-07-28 06:19:44', 87, '', '127.0.0.1', 1501219183, 'mv'),
(16, '2017-07-28 06:21:46', 87, 'Wrong phone number', '127.0.0.1', 1501219305, 'mv'),
(17, '2017-07-28 06:22:13', 87, 'dfgdfg', '127.0.0.1', 1501219332, 'mv'),
(18, '2017-07-28 06:22:41', 87, 'fgfgh', '127.0.0.1', 1501219360, 'mv'),
(19, '2017-07-28 06:24:51', 87, 'Other', '127.0.0.1', 1501219490, 'mv'),
(20, '2017-07-28 06:27:36', 87, 'Inappropriate contentooooop', '127.0.0.1', 1501219655, 'mv'),
(21, '2017-07-28 06:28:19', 87, 'Wrong phone number', '127.0.0.1', 1501219698, 'mv');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
