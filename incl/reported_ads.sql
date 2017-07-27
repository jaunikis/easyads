-- phpMyAdmin SQL Dump
-- version 4.1.4
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 27, 2017 at 06:31 AM
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
  `reason2` varchar(128) NOT NULL,
  `user_id` int(6) NOT NULL,
  `ip` varchar(64) NOT NULL,
  `ip_for` varchar(64) NOT NULL,
  `timestamp` int(64) NOT NULL,
  `user` varchar(64) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `reported_ads`
--

INSERT INTO `reported_ads` (`id`, `datetime`, `ad_id`, `reason`, `reason2`, `user_id`, `ip`, `ip_for`, `timestamp`, `user`) VALUES
(1, '0000-00-00 00:00:00', 67, 'Wrong phone number', '', 0, '', '', 0, ''),
(2, '2017-07-27 06:22:31', 67, 'Inappropriate content', '', 0, '', '', 0, ''),
(3, '2017-07-27 06:26:34', 67, 'Wrong phone number', '', 0, '', '', 0, ''),
(4, '2017-07-27 06:27:05', 86, 'Other', '', 0, '', '', 0, 'mv'),
(5, '2017-07-27 06:28:51', 86, 'Other', 'namas', 0, '', '', 0, 'mv'),
(6, '2017-07-27 06:30:44', 86, 'Inappropriate content', '', 0, '', '', 0, 'mv');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
