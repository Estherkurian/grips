-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 21, 2024 at 12:22 PM
-- Server version: 5.7.40
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `grips`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

DROP TABLE IF EXISTS `customer`;
CREATE TABLE IF NOT EXISTS `customer` (
  `Name` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Account_number` int(50) NOT NULL,
  `Current_Balance` float NOT NULL,
  PRIMARY KEY (`Account_number`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`Name`, `Email`, `Account_number`, `Current_Balance`) VALUES
('Esther', 'estherkuttickal@gmail.com', 123123000, 13407),
('Mr. A', 'abc@gmail.com', 123123001, 12001),
('Mr. B', 'abc@gmail.com', 123123002, 24840.4),
('Mr. C', 'abc@gmail.com', 123123003, 56035),
('Mr. D', 'abc@gmail.com', 123123004, 18400.6),
('Mr. E', 'abc@gmail.com', 123123005, 45084),
('Mr. F', 'abc@gmail.com', 123123006, 16400.5),
('Mrs. G', 'abc@gmail.com', 123123007, 65900.5),
('Mr. H', 'abc@gmail.com', 123123008, 15000),
('Mrs. I', 'abc@gmail.com', 123123009, 35001);

-- --------------------------------------------------------

--
-- Table structure for table `transfers`
--

DROP TABLE IF EXISTS `transfers`;
CREATE TABLE IF NOT EXISTS `transfers` (
  `sno` int(4) NOT NULL AUTO_INCREMENT,
  `account_number` int(11) NOT NULL,
  `amount` float NOT NULL,
  UNIQUE KEY `sno` (`sno`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transfers`
--

INSERT INTO `transfers` (`sno`, `account_number`, `amount`) VALUES
(1, 123123000, 200),
(2, 123123007, 4500),
(3, 123123007, 4500),
(4, 123123007, 300),
(5, 123123007, 300),
(6, 123123007, 300),
(7, 123123002, 670),
(8, 123123002, 670),
(9, 123123009, 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
