-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 02, 2017 at 12:43 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `application_domain`
--
CREATE DATABASE IF NOT EXISTS `application_domain` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `application_domain`;

-- --------------------------------------------------------

--
-- Table structure for table `chart_of_accounts`
--

DROP TABLE IF EXISTS `chart_of_accounts`;
CREATE TABLE IF NOT EXISTS `chart_of_accounts` (
  `Account Code` int(11) NOT NULL,
  `Account Name` varchar(200) NOT NULL,
  `Account Type` varchar(30) NOT NULL,
  `Normal Side` varchar(5) NOT NULL,
  `Initial Balance` double NOT NULL,
  `Order` int(11) NOT NULL,
  `Comment` text NOT NULL,
  `Added By` varchar(50) NOT NULL,
  `Added On` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Active` varchar(3) NOT NULL,
  `Group` varchar(30) NOT NULL,
  `Event Log` int(11) NOT NULL,
  `Error Code` int(11) NOT NULL,
  PRIMARY KEY (`Account Code`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chart_of_accounts`
--

INSERT INTO `chart_of_accounts` (`Account Code`, `Account Name`, `Account Type`, `Normal Side`, `Initial Balance`, `Order`, `Comment`, `Added By`, `Added On`, `Active`, `Group`, `Event Log`, `Error Code`) VALUES
(101, 'Cash', 'Asset', 'Left', 100.08, 1, 'This is a test.', 'Miguel Betancourt Jr', '2017-02-15 02:29:34', 'Yes', 'Current Asset', 1, 1),
(105, 'Petty Cash', 'Asset', 'Left', 0, 2, 'Done', 'Skip Bassey', '2017-02-21 08:06:42', 'Yes', 'Current Asset', 1, 1),
(121, 'Notes Receivable', 'Asset', 'Left', 123.23, 3, 'Done', 'Skip Basey', '2017-02-21 08:06:42', 'Yes', '3', 1, 1),
(122, 'Accounts Receivable', 'Asset', 'Left', 900, 4, 'Done', 'Skip Bassey', '2017-02-21 08:10:09', 'no', 'current asset', 1, 1),
(131, 'Merchandise Inventory', 'Asset', 'Left', 34, 5, 'Added', 'Skip Bassey', '2017-02-21 08:10:09', 'no', 'current asset', 1, 1),
(161, 'Land', 'Asset', 'Left', 0, 6, 'Done', 'Skip Bassey', '2017-02-21 08:13:34', 'yes', 'long term asset', 1, 1),
(201, 'Notes Payable', 'Liability', 'Right', 330.04, 7, 'Added', 'Skip Bassey', '2017-02-21 08:13:34', 'yes', 'current liability', 1, 1),
(202, 'Accounts Payable', 'Liability', 'Right', 450.02, 8, 'Done', 'Skip Bassey', '2017-02-21 08:16:20', 'yes', 'current liability', 1, 1),
(219, 'Wages Payable', 'Liability', 'Right', 0, 9, 'Added', 'Skip Bassey', '2017-02-21 08:16:20', 'yes', '9', 1, 1),
(313, 'Common Stock', 'Owners Equity', 'Right', 0, 10, 'Done', 'Skip Bassey', '2017-02-21 08:19:40', 'no', 'Owners Equity', 1, 1),
(325, 'Retained Earnings', 'Owners Equity', 'Right', 0, 11, 'Done', 'Skip Bassey', '2017-02-21 08:19:40', 'yes', 'Owners Equity', 1, 1),
(401, 'Delivery Fees', 'Revenue', 'Right', 0, 13, 'Done', 'Skip Bassey', '2017-02-21 08:22:37', 'yes', 'Revenue', 1, 1),
(412, 'Rent Revenue', 'Revenue', 'Right', 123, 14, 'Done', 'Skip Bassey', '2017-02-21 08:22:37', 'yes', 'Revenue', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `event_log`
--

DROP TABLE IF EXISTS `event_log`;
CREATE TABLE IF NOT EXISTS `event_log` (
  `Event Log ID` int(11) NOT NULL AUTO_INCREMENT,
  `Date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Username` varchar(50) NOT NULL,
  `Description` text NOT NULL,
  PRIMARY KEY (`Event Log ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `journal`
--

DROP TABLE IF EXISTS `journal`;
CREATE TABLE IF NOT EXISTS `journal` (
  `Journal ID` int(11) NOT NULL AUTO_INCREMENT,
  `Date` date NOT NULL,
  `Account Name` varchar(30) NOT NULL,
  `Account Reference` int(11) NOT NULL,
  `Type` enum('Credit','Debt') NOT NULL,
  `Amount` double NOT NULL,
  PRIMARY KEY (`Journal ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `login_info`
--

DROP TABLE IF EXISTS `login_info`;
CREATE TABLE IF NOT EXISTS `login_info` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Username` varchar(20) NOT NULL,
  `Password` varchar(20) NOT NULL,
  `Admin` enum('yes','no') NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login_info`
--

INSERT INTO `login_info` (`ID`, `Username`, `Password`, `Admin`) VALUES
(1, 'admin', 'admin', 'yes'),
(2, 'mbetanc2', 'asdf', 'yes');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
