-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 02, 2014 at 07:09 PM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `health`
--
CREATE DATABASE IF NOT EXISTS `health` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `health`;

-- --------------------------------------------------------

--
-- Table structure for table `ambulance`
--

CREATE TABLE IF NOT EXISTS `ambulance` (
  `ambulance_id` int(11) NOT NULL AUTO_INCREMENT,
  `authority` varchar(50) NOT NULL,
  `ambulance_name` varchar(50) NOT NULL,
  `ambulance_contact` varchar(50) NOT NULL,
  `ambulance_address` varchar(50) NOT NULL,
  PRIMARY KEY (`ambulance_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `ambulance`
--

INSERT INTO `ambulance` (`ambulance_id`, `authority`, `ambulance_name`, `ambulance_contact`, `ambulance_address`) VALUES
(1, 'anjuman mofidul islam', 'anjuman-1', '+880249885256', '10,kakrail more, dhaka-1215'),
(2, 'sir salimullah medical college', 'sssmc-1', '+88072113422', 'mitford,old dhaka.');

-- --------------------------------------------------------

--
-- Table structure for table `diagnostic`
--

CREATE TABLE IF NOT EXISTS `diagnostic` (
  `diagnostic_id` int(11) NOT NULL AUTO_INCREMENT,
  `location` varchar(50) NOT NULL,
  `diagnostic_name` varchar(50) NOT NULL,
  `diagnostic_address` varchar(50) NOT NULL,
  PRIMARY KEY (`diagnostic_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `diagnostic`
--

INSERT INTO `diagnostic` (`diagnostic_id`, `location`, `diagnostic_name`, `diagnostic_address`) VALUES
(1, 'malibagh', 'padma diagnostic center', '245/2,malibagh,new circular road,dhaka-1217'),
(2, 'dhanmondi', 'popular diagnostic center', 'house 11/A, road 2, dhanmondi R/A, dhaka 1205.');

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE IF NOT EXISTS `doctor` (
  `doctor_id` int(11) NOT NULL AUTO_INCREMENT,
  `expertness` varchar(50) NOT NULL,
  `doctor_name` varchar(50) NOT NULL,
  `chamber` varchar(50) NOT NULL,
  `qualification` varchar(50) NOT NULL,
  `hospital` varchar(50) NOT NULL,
  `visit` varchar(50) NOT NULL,
  PRIMARY KEY (`doctor_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`doctor_id`, `expertness`, `doctor_name`, `chamber`, `qualification`, `hospital`, `visit`) VALUES
(1, 'neurosurgery', 'dr. mamun', 'united hospital', 'MBBS,FCPS', 'dhaka medical college', '500 tk'),
(2, 'medicine', 'dr. kaniz maula', 'padma diagnostic center', 'MBBS,FCPS', 'holy family medical college', '500'),
(3, 'neurosurgery', 'adulur rahman', 'united hospital', 'mbbs', 'ssmc', '8000');

-- --------------------------------------------------------

--
-- Table structure for table `hospital`
--

CREATE TABLE IF NOT EXISTS `hospital` (
  `id` int(11) NOT NULL DEFAULT '0',
  `location` varchar(15) DEFAULT NULL,
  `name` varchar(15) DEFAULT NULL,
  `address` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hospital`
--

INSERT INTO `hospital` (`id`, `location`, `name`, `address`) VALUES
(1, 'mitford', 'Sir salimullah ', 'mitford,old dha'),
(2, 'motijheel', 'islami bank hos', '24/b, outer cir'),
(3, 'shadarghat', 'national', 'english road');

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE IF NOT EXISTS `location` (
  `location_id` int(11) NOT NULL AUTO_INCREMENT,
  `location_name` varchar(50) NOT NULL,
  PRIMARY KEY (`location_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`location_id`, `location_name`) VALUES
(1, 'mitford'),
(2, 'motijheel');

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE IF NOT EXISTS `reservation` (
  `reservation_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `doctor_id` int(11) NOT NULL,
  PRIMARY KEY (`reservation_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`reservation_id`, `user_id`, `doctor_id`) VALUES
(1, 0, 1),
(2, 0, 2),
(3, 0, 1),
(4, 0, 2),
(5, 0, 3);

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE IF NOT EXISTS `service` (
  `service_id` int(11) NOT NULL AUTO_INCREMENT,
  `facility` varchar(50) NOT NULL,
  `area` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `contact` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  PRIMARY KEY (`service_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`service_id`, `facility`, `area`, `name`, `contact`, `address`) VALUES
(2, 'Ambulance', 'Rampura', 'Al Hera Ambulance ', '+8801914219285', '10, West Rampura, Dhaka'),
(3, 'Ambulance', 'Banasree', 'Farazy Ambulance', '+8801914219285', 'blk-E, main road, rampura.'),
(4, 'Diagnostic', 'Mouchak', 'Padma Diagnostic Center', '+8801914219285', '10, Mouchak, Dhaka'),
(5, 'Diagnostic', 'Kakrail', 'Madinova Diagnostic Center', '+8801914219285', '57 kakrail more, Dhaka'),
(6, 'Health', 'Sadarghat', 'Salimullah Medical College', '+8801914219285', 'Puran Town, Sadarghat, Dhaka'),
(7, 'Health', 'Barisal', 'Ser-E-Bangla Medical College', '+8801914219285', 'Hospital Road, Barisal');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `access_level` int(11) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`name`, `email`, `username`, `password`, `user_id`, `access_level`) VALUES
('alamin', 'jhy@klsicdh', 'alamin', '123456', 1, 1),
('azad', 'iukk@lkso.com', 'azad', '123', 2, 1),
('asd', 'zasd@asdf', 'asd', 'asd', 3, 1),
('admin', 'admin@admin.com', 'admin', '1234', 4, 2);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
