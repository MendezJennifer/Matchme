-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 27, 2021 at 08:43 PM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `matchme`
--

-- --------------------------------------------------------

--
-- Table structure for table `closet`
--

DROP TABLE IF EXISTS `closet`;
CREATE TABLE IF NOT EXISTS `closet` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Item` varchar(50) NOT NULL,
  `Season` varchar(10) DEFAULT NULL,
  `Type` varchar(50) DEFAULT NULL,
  `Color` varchar(50) DEFAULT NULL,
  `Occasion` varchar(50) DEFAULT NULL,
  `Times_Worn` int(11) DEFAULT NULL,
  `Comments` varchar(100) DEFAULT NULL,
  `Email` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `closet`
--

INSERT INTO `closet` (`ID`, `Item`, `Season`, `Type`, `Color`, `Occasion`, `Times_Worn`, `Comments`, `Email`) VALUES
(1, 'Skirt', 'Summer', 'Bottom', 'Pink', 'Casual', 1, '', NULL),
(2, 'Dress', 'Summer', 'One_Piece', 'Black', 'Business', 2, NULL, 'jennifer.mendez@mygeorgian.ca');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `Email` varchar(30) NOT NULL,
  `First_Name` varchar(50) NOT NULL,
  `Last_Name` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `Password2` varchar(50) NOT NULL,
  PRIMARY KEY (`Email`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`Email`, `First_Name`, `Last_Name`, `Password`, `Password2`) VALUES
('jennifer.mendez@mygeorgian.ca', 'Jennifer', 'Chan', '111', '111'),
('luma.jen2019@gmail.com', 'Luis', 'Acosta', '111', '111');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
