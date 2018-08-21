-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 21, 2018 at 05:21 PM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `cseb`
--

-- --------------------------------------------------------

--
-- Table structure for table `poll`
--

CREATE TABLE IF NOT EXISTS `poll` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(300) NOT NULL,
  `desc` varchar(1000) DEFAULT NULL,
  `active` int(1) NOT NULL,
  `section` varchar(2) NOT NULL,
  `updatedby` varchar(11) NOT NULL,
  `date` varchar(100) NOT NULL DEFAULT 'NOW()',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `poll`
--

INSERT INTO `poll` (`id`, `title`, `desc`, `active`, `section`, `updatedby`, `date`) VALUES
(14, 'Test for A', 'asdasdasdasdasd', 1, 'A', '9', '2018-08-20 22:14:07'),
(15, 'Test for B', 'asdasda', 1, 'B', '11', '2018-08-20 22:26:52');

-- --------------------------------------------------------

--
-- Table structure for table `polldata`
--

CREATE TABLE IF NOT EXISTS `polldata` (
  `pollid` int(10) NOT NULL DEFAULT '0',
  `useridin` int(10) NOT NULL DEFAULT '0',
  `date` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`pollid`,`useridin`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `polldata`
--

INSERT INTO `polldata` (`pollid`, `useridin`, `date`) VALUES
(15, 11, '2018-08-20 22:34:16'),
(15, 12, '2018-08-20 22:33:29');

-- --------------------------------------------------------

--
-- Table structure for table `usertable`
--

CREATE TABLE IF NOT EXISTS `usertable` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `pass` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `section` varchar(1) DEFAULT NULL,
  `regdno` varchar(11) NOT NULL,
  `type` int(1) NOT NULL DEFAULT '2',
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`,`regdno`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `usertable`
--

INSERT INTO `usertable` (`id`, `fname`, `lname`, `pass`, `email`, `section`, `regdno`, `type`) VALUES
(8, 'Adarsh', 'Mohanty', 'pclub987', 'pclub_admin@asd.d', 'A', '1111', 2),
(9, 'AdminA', 'asda', '2222', '2@2.2', 'A', '2222', 1),
(10, 'student2', 'asdasd', '3333', '3@3.3', 'A', '3333', 2),
(11, 'AdminB', 'asdasd', '9999', '9@9.9', 'B', '9999', 1),
(12, 'studB', 'bbbb', '8888', '8@8.8', 'B', '8888', 2);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
