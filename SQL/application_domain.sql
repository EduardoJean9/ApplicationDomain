-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 21, 2017 at 11:34 PM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `application_domain`
--

-- --------------------------------------------------------

--
-- Table structure for table `chart_of_accounts`
--

CREATE TABLE `chart_of_accounts` (
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
  `Error Code` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chart_of_accounts`
--

INSERT INTO `chart_of_accounts` (`Account Code`, `Account Name`, `Account Type`, `Normal Side`, `Initial Balance`, `Order`, `Comment`, `Added By`, `Added On`, `Active`, `Group`, `Event Log`, `Error Code`) VALUES
(101, 'Cash', 'Asset', 'Left', 100.08, 1, 'This is a test.', 'Miguel Betancourt Jr', '2017-02-14 21:29:34', 'Yes', 'Current Asset', 1, 1),
(105, 'Petty Cash', 'Asset', 'Left', 0, 2, 'Done', 'Skip Bassey', '2017-02-21 03:06:42', 'Yes', 'Current Asset', 1, 1),
(121, 'Notes Receivable', 'Asset', 'Left', 123.23, 3, 'Done', 'Skip Basey', '2017-02-21 03:06:42', 'Yes', '3', 1, 1),
(122, 'Accounts Receivable', 'Asset', 'Left', 900, 4, 'Done', 'Skip Bassey', '2017-02-21 03:10:09', 'no', 'current asset', 1, 1),
(131, 'Merchandise Inventory', 'Asset', 'Left', 34, 5, 'Added', 'Skip Bassey', '2017-02-21 03:10:09', 'no', 'current asset', 1, 1),
(161, 'Land', 'Asset', 'Left', 0, 6, 'Done', 'Skip Bassey', '2017-02-21 03:13:34', 'yes', 'long term asset', 1, 1),
(201, 'Notes Payable', 'Liability', 'Right', 330.04, 7, 'Added', 'Skip Bassey', '2017-02-21 03:13:34', 'yes', 'current liability', 1, 1),
(202, 'Accounts Payable', 'Liability', 'Right', 450.02, 8, 'Done', 'Skip Bassey', '2017-02-21 03:16:20', 'yes', 'current liability', 1, 1),
(219, 'Wages Payable', 'Liability', 'Right', 0, 9, 'Added', 'Skip Bassey', '2017-02-21 03:16:20', 'yes', '9', 1, 1),
(313, 'Common Stock', 'Owners Equity', 'Right', 0, 10, 'Done', 'Skip Bassey', '2017-02-21 03:19:40', 'no', 'Owners Equity', 1, 1),
(325, 'Retained Earnings', 'Owners Equity', 'Right', 0, 11, 'Done', 'Skip Bassey', '2017-02-21 03:19:40', 'yes', 'Owners Equity', 1, 1),
(401, 'Delivery Fees', 'Revenue', 'Right', 0, 13, 'Done', 'Skip Bassey', '2017-02-21 03:22:37', 'yes', 'Revenue', 1, 1),
(412, 'Rent Revenue', 'Revenue', 'Right', 123, 14, 'Done', 'Skip Bassey', '2017-02-21 03:22:37', 'yes', 'Revenue', 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chart_of_accounts`
--
ALTER TABLE `chart_of_accounts`
  ADD PRIMARY KEY (`Account Code`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
