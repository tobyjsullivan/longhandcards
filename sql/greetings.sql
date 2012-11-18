-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 17, 2012 at 06:05 PM
-- Server version: 5.5.28
-- PHP Version: 5.3.10-1ubuntu3.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `greetings`
--

-- --------------------------------------------------------

--
-- Table structure for table `cards`
--

CREATE TABLE IF NOT EXISTS `cards` (
  `id` int(3) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `display_name` varchar(60) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `cards`
--

INSERT INTO `cards` (`id`, `display_name`) VALUES
(001, 'Warm Thoughts of You'),
(002, 'From Across the Miles');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(6) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `processed` datetime NOT NULL,
  `stripe_payment` varchar(18) NOT NULL,
  `sender_name` varchar(255) NOT NULL,
  `sender_email` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `writer` int(2) unsigned zerofill NOT NULL,
  `recipient_name` varchar(255) NOT NULL,
  `recipient_address` varchar(255) NOT NULL,
  `recipient_address2` varchar(255) NOT NULL,
  `recipient_city` varchar(255) NOT NULL,
  `recipient_province` varchar(255) NOT NULL,
  `recipient_country` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `writer` (`writer`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `writers`
--

CREATE TABLE IF NOT EXISTS `writers` (
  `id` int(2) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `display_name` varchar(30) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `writers`
--

INSERT INTO `writers` (`id`, `name`, `display_name`) VALUES
(01, 'toby', 'Toby'),
(02, 'hailey', 'Hailey');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
