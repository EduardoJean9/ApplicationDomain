-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 06, 2017 at 02:08 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

CREATE DATABASE IF NOT EXISTS `application_domain` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `application_domain`;

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
  `Initial Balance` decimal(10,2) NOT NULL,
  `Order` int(11) NOT NULL,
  `Comment` text NOT NULL,
  `Added By` varchar(50) NOT NULL,
  `Added On` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Active` int(11) NOT NULL,
  `Group` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chart_of_accounts`
--

INSERT INTO `chart_of_accounts` (`Account Code`, `Account Name`, `Account Type`, `Normal Side`, `Initial Balance`, `Order`, `Comment`, `Added By`, `Added On`, `Active`, `Group`) VALUES
(0, '', '', '', '0.00', 0, '', 'admin', '2017-03-09 03:25:16', 0, ''),
(101, 'Cash', 'Asset', 'Left', '100.00', 1, 'Added', 'admin', '2017-03-07 04:29:39', 0, 'Current Asset'),
(105, 'Petty Cash', 'Asset', 'Left', '0.00', 2, 'Added', 'admin', '2017-03-07 04:31:39', 0, 'Current Asset'),
(121, 'Notes Receiveable', 'Asset', 'Left', '0.00', 121, 'Added', 'admin', '2017-03-07 04:35:09', 0, 'Current Asset'),
(122, 'Accounts Receivable', 'Asset', 'Left', '120.34', 122, 'Added', 'admin', '2017-03-07 04:36:34', 0, 'Current Asset'),
(131, 'Merchandise Inventory', 'Asset', 'Left', '0.00', 131, 'Added', 'admin', '2017-03-07 04:38:10', 0, 'Current Asset'),
(132, 'Raw Materials', 'Asset', 'Left', '200.34', 13, 'Added', 'admin', '2017-03-07 05:03:13', 0, 'Current Asset'),
(161, 'Land', 'Asset', 'Left', '20000.00', 161, 'added', 'admin', '2017-03-07 04:40:23', 0, 'Long Term Asset'),
(190, 'Patents', 'Asset', 'Left', '0.00', 190, 'Added', 'admin', '2017-03-07 04:43:23', 0, 'Long Term Asset'),
(201, 'Notes Payable', 'Liability', 'Right', '330.34', 201, 'Added', 'admin', '2017-03-07 04:47:28', 0, 'Current Liability'),
(202, 'Accounts Payable', 'Liability', 'Right', '550.00', 202, 'Added', 'admin', '2017-03-07 04:48:45', 0, 'Current Liability'),
(204, 'Income Tax Payable', 'Liability', 'Right', '0.00', 204, 'Added', 'admin', '2017-03-07 04:49:45', 0, 'Current Liability'),
(219, 'Wages Payable', 'Liability', 'Right', '0.00', 219, 'Added', 'admin', '2017-03-07 04:53:57', 0, 'Current Liability'),
(313, 'Common Stock', 'Owners Equity', 'Right', '0.00', 10, 'Done', 'Skip Bassey', '2017-02-21 08:19:40', 0, 'Owners Equity'),
(325, 'Retained Earnings', 'Owners Equity', 'Right', '0.00', 11, 'Done', 'Skip Bassey', '2017-02-21 08:19:40', 0, 'Owners Equity'),
(401, 'Delivery Fees', 'Revenue', 'Right', '0.00', 13, 'Done', 'Skip Bassey', '2017-02-21 08:22:37', 0, 'Revenue'),
(412, 'Rent Revenue', 'Revenue', 'Right', '123.00', 14, 'Done', 'Skip Bassey', '2017-02-21 08:22:37', 0, 'Revenue');

-- --------------------------------------------------------

--
-- Table structure for table `event_log`
--

CREATE TABLE `event_log` (
  `Event Log ID` int(11) NOT NULL,
  `Account Code` int(11) NOT NULL,
  `Date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Username` varchar(50) NOT NULL,
  `Description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `event_log`
--

INSERT INTO `event_log` (`Event Log ID`, `Account Code`, `Date`, `Username`, `Description`) VALUES
(1, 0, '2017-03-07 04:29:39', 'admin', 'Added Account: Cash'),
(2, 0, '2017-03-07 04:31:39', 'admin', 'Added Account: Petty Cash'),
(3, 0, '2017-03-07 04:35:09', 'admin', 'Added Account: Notes Receiveable'),
(4, 0, '2017-03-07 04:36:34', 'admin', 'Added Account: Accounts Receivable'),
(5, 0, '2017-03-07 04:38:10', 'admin', 'Added Account: Merchandise Inventory'),
(6, 0, '2017-03-07 04:40:23', 'admin', 'Added Account: Land'),
(7, 0, '2017-03-07 04:43:23', 'admin', 'Added Account: Patents'),
(8, 0, '2017-03-07 04:47:28', 'admin', 'Added Account: Notes Payable'),
(9, 0, '2017-03-07 04:48:45', 'admin', 'Added Account: Accounts Payable'),
(10, 0, '2017-03-07 04:49:45', 'admin', 'Added Account: Income Tax Payable'),
(11, 0, '2017-03-07 04:53:57', 'admin', 'Added Account: Wages Payable'),
(12, 0, '2017-03-07 05:03:13', 'admin', 'Added Account: Raw Materials'),
(13, 0, '2017-03-09 03:25:16', 'admin', 'Added Account: '),
(14, 0, '2017-03-14 02:50:34', 'admin', 'Eddited Account: Cash'),
(15, 0, '2017-04-05 23:52:07', 'admin', 'Journal Entry27Added'),
(16, 0, '2017-04-05 23:55:11', 'admin', 'Journal Entry 28 added');

-- --------------------------------------------------------

--
-- Table structure for table `journal`
--

CREATE TABLE `journal` (
  `Journal ID` int(11) NOT NULL,
  `Date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Account Name` varchar(30) NOT NULL,
  `Account Reference` varchar(11) NOT NULL,
  `Type` enum('Credit','Debt') NOT NULL,
  `Amount` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `journalcounter`
--

CREATE TABLE `journalcounter` (
  `ID` int(11) NOT NULL,
  `Name` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `journalcounter`
--

INSERT INTO `journalcounter` (`ID`, `Name`) VALUES
(1, 'new'),
(2, 'new'),
(3, 'new'),
(4, 'new'),
(5, 'new'),
(6, 'new'),
(7, 'new'),
(8, 'new'),
(9, 'new'),
(10, 'new'),
(11, 'new'),
(12, 'new'),
(13, 'new'),
(14, 'new'),
(15, 'new'),
(16, 'new'),
(17, 'new'),
(18, 'new'),
(19, 'new'),
(20, 'new'),
(21, 'new'),
(22, 'new'),
(23, 'new'),
(24, 'new'),
(25, 'new'),
(26, 'new'),
(27, 'new'),
(28, 'new');

-- --------------------------------------------------------

--
-- Table structure for table `journaltemp`
--

CREATE TABLE `journaltemp` (
  `ID` int(11) NOT NULL,
  `Journal ID` varchar(50) DEFAULT NULL,
  `Account` varchar(50) DEFAULT NULL,
  `Debit` decimal(10,2) DEFAULT NULL,
  `Credit` decimal(10,2) DEFAULT NULL,
  `Date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `journal_transaction`
--

CREATE TABLE `journal_transaction` (
  `ID` int(11) NOT NULL,
  `Account Name` varchar(50) NOT NULL,
  `Debit` decimal(10,2) DEFAULT NULL,
  `Credit` decimal(10,2) DEFAULT NULL,
  `Journal ID` int(11) NOT NULL,
  `Date` date DEFAULT NULL,
  `Active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `journal_transaction`
--

INSERT INTO `journal_transaction` (`ID`, `Account Name`, `Debit`, `Credit`, `Journal ID`, `Date`, `Active`) VALUES
(22, 'Cash', '5.00', '0.00', 24, '2017-04-06', 0),
(23, 'Notes Receiveable', '0.00', '5.00', 24, '2017-04-06', 0),
(25, 'Land', '10.00', '0.00', 25, '2017-04-06', 0),
(26, 'Notes Payable', '0.00', '10.00', 25, '2017-04-06', 0),
(28, 'Notes Payable', '41.00', '0.00', 26, '2017-04-06', 1),
(29, 'Income Tax Payable', '0.00', '21.00', 26, '2017-04-06', 1),
(30, 'Cash', '0.00', '20.00', 26, '2017-04-06', 1),
(31, 'Notes Payable', '4.00', '0.00', 27, '2017-04-06', 1),
(32, 'Merchandise Inventory', '0.00', '4.00', 27, '2017-04-06', 1),
(34, 'Notes Receiveable', '4.00', '0.00', 28, '2017-04-06', 1),
(35, 'Notes Payable', '0.00', '4.00', 28, '2017-04-06', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ledger`
--

CREATE TABLE `ledger` (
  `ID` int(11) NOT NULL,
  `Account Code` int(11) NOT NULL,
  `Account Name` varchar(150) NOT NULL,
  `Account Type` varchar(30) NOT NULL,
  `Debit` decimal(10,2) NOT NULL,
  `Credit` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `login_info`
--

CREATE TABLE `login_info` (
  `ID` int(11) NOT NULL,
  `Username` varchar(20) NOT NULL,
  `Password` varchar(20) NOT NULL,
  `Admin` enum('yes','no') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login_info`
--

INSERT INTO `login_info` (`ID`, `Username`, `Password`, `Admin`) VALUES
(1, 'admin', 'admin', 'yes'),
(2, 'mbetanc2', 'asdf', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `possible_accounts`
--

CREATE TABLE `possible_accounts` (
  `Account Code` int(11) NOT NULL,
  `Account Name` varchar(200) NOT NULL,
  `Account Type` varchar(30) NOT NULL,
  `Normal Side` varchar(5) NOT NULL,
  `Initial Balance` decimal(10,2) NOT NULL,
  `Order` int(11) NOT NULL,
  `Added By` varchar(50) NOT NULL,
  `Added On` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Active` int(11) NOT NULL,
  `Group` varchar(30) NOT NULL,
  `Event Log ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `possible_accounts`
--

INSERT INTO `possible_accounts` (`Account Code`, `Account Name`, `Account Type`, `Normal Side`, `Initial Balance`, `Order`, `Added By`, `Added On`, `Active`, `Group`, `Event Log ID`) VALUES
(101, 'Cash', 'Asset', 'Left', '0.00', 101, 'Admin', '2017-03-09 06:10:37', 1, 'Current Asset', 1),
(105, 'Petty Cash', 'Asset', 'Left', '0.00', 105, 'Admin', '2017-03-09 06:13:53', 1, 'Current Asset', 2),
(121, 'Notes Recieveable', 'Asset', 'Left', '0.00', 121, 'Admin', '2017-03-09 06:13:53', 1, '121', 3),
(122, 'Accounts Receivable ', 'Asset', 'Left', '0.00', 122, 'Admin', '2017-03-09 06:17:06', 1, 'Current Asset', 4),
(123, 'Interest Receivable ', 'Asset', 'Left', '0.00', 123, 'Admin', '2017-03-09 06:18:54', 1, 'Current Asset', 5),
(125, 'Common Stock Subscriptions Receivable ', 'Asset', 'Left', '0.00', 125, 'Admin', '2017-03-09 06:25:27', 1, 'Long Term Asset', 6),
(126, 'Preferred Stock Subscription Receivable ', 'Asset', 'Left', '0.00', 126, 'Admin', '2017-03-09 06:25:27', 1, 'Long Term Asset', 7),
(131, 'Merchandise Inventory', 'Asset', 'Left', '0.00', 131, 'Admin', '2017-03-09 06:28:18', 1, 'Current Asset', 8),
(132, 'Raw Materials', 'Asset', 'Left', '0.00', 132, 'Admin', '2017-03-09 06:28:18', 1, 'Current Asset', 9),
(133, 'Work in Progress', 'Asset', 'Left', '0.00', 133, 'Admin', '2017-03-09 06:30:15', 1, 'Current Asset', 10),
(134, 'Finished Goods', 'Asset', 'Left', '0.00', 134, 'Admin', '2017-03-09 06:30:15', 1, 'Current Asset', 11),
(141, 'Supplies', 'Asset', 'Left', '0.00', 141, 'Admin', '2017-03-09 06:32:27', 1, 'Current Asset', 12),
(142, 'Office Supplies', 'Asset', 'Left', '0.00', 142, 'Admin', '2017-03-09 06:32:27', 1, 'Current Asset', 13),
(144, 'Food Supplies', 'Asset', 'Left', '0.00', 144, 'Admin', '2017-03-09 06:36:03', 1, 'Current Asset', 14),
(145, 'Prepaid Insurance', 'Asset', 'Left', '0.00', 145, 'Admin', '2017-03-09 06:36:03', 1, 'Long Term Asset', 15),
(153, 'Bond Sinking Fund', 'Asset', 'Left', '0.00', 153, 'Admin', '2017-03-09 06:38:08', 1, 'Long Term Asset', 16),
(161, 'Land', 'Asset', 'Left', '0.00', 161, 'Admin', '2017-03-09 06:38:08', 1, 'Long Term Asset', 17),
(162, 'Natural Resources', 'Asset', 'Left', '0.00', 162, 'Admin', '2017-03-09 06:39:37', 1, 'Long Term Asset', 18),
(171, 'Buildings', 'Asset', 'Left', '0.00', 171, 'Admin', '2017-03-09 06:39:37', 1, 'Long Term Asset', 19),
(181, 'Office Equipment', 'Asset', 'Left', '0.00', 181, 'Admin', '2017-03-09 06:41:30', 1, 'Current Asset', 20),
(182, 'Office Furniture', 'Asset', 'Left', '0.00', 182, 'Admin', '2017-03-09 06:41:30', 1, 'Current Asset', 21),
(183, 'Athletic Equipment', 'Asset', 'Left', '0.00', 183, 'Admin', '2017-03-09 06:44:18', 1, 'Current Asset', 22),
(184, 'Tennis Facilities', 'Asset', 'Left', '0.00', 184, 'Admin', '2017-03-09 06:44:18', 1, 'Long Term Asset', 23),
(185, 'Delivery Equipment', 'Asset', 'Left', '0.00', 185, 'Admin', '2017-03-09 06:46:02', 1, 'Current Asset', 24),
(186, 'Exercise Equipment', 'Asset', 'Left', '0.00', 186, 'Admin', '2017-03-09 06:46:02', 1, 'Current Asset', 25),
(187, 'Computer Equipment', 'Asset', 'Left', '0.00', 187, 'Admin', '2017-03-09 06:48:02', 1, 'Current Asset', 26),
(191, 'Patents', 'Asset', 'Left', '0.00', 191, 'Admin', '2017-03-09 06:48:02', 1, 'Long Term Asset', 27),
(192, 'Copyrights', 'Asset', 'Left', '0.00', 192, 'Admin', '2017-03-09 06:49:37', 1, 'Long Term Asset', 28),
(193, 'Organization Costs', 'Asset', 'Left', '0.00', 193, 'Admin', '2017-03-09 06:49:37', 1, 'Long Term Asset', 29),
(201, 'Notes Payable ', 'Liability', 'Right', '0.00', 201, 'Admin', '2017-03-09 06:53:01', 1, '201', 26),
(202, 'Account Payables', 'Liabilities', 'Right', '0.00', 202, 'Admin', '2017-03-09 06:53:01', 1, 'Current Liability', 27),
(203, 'United Way Contributions Payable', 'Liability', 'Right', '0.00', 203, 'Admin', '2017-03-09 06:56:55', 1, 'Long Term Liability', 28),
(204, 'Income Tax Payable', 'Liability', 'Right', '0.00', 204, 'Admin', '2017-03-09 06:56:55', 1, 'Current Liability', 29),
(205, 'Common Dividend Payable', 'Liability', 'Right', '0.00', 205, 'Admin', '2017-03-09 07:02:18', 1, 'Long Term Liability', 30),
(206, 'Preferred Dividends Payable ', 'Liability', 'Right', '0.00', 206, 'Admin', '2017-03-09 07:02:18', 1, 'Long Term Liability', 31),
(207, 'Interest Payable', 'Liability', 'Right', '0.00', 207, 'Admin', '2017-03-09 07:04:58', 1, 'Long Term Liability', 32),
(211, 'Employee Income Tax Payable', 'Liability', 'Right', '0.00', 211, 'Admin', '2017-03-09 07:04:58', 1, 'Long Term Liability', 33),
(212, 'Social Security Tax Payable', 'Liability', 'Right', '0.00', 212, 'Admin', '2017-03-09 07:08:34', 1, 'Long Term Liability', 34),
(213, 'Medicare Tax Payable', 'Liability', 'Right', '0.00', 213, 'Admin', '2017-03-09 07:08:34', 1, 'Long Term Liability', 35),
(215, 'City Earnings Tax Payable', 'Liability', 'Right', '0.00', 215, 'Admin', '2017-03-09 07:11:49', 1, 'Long Term Asset', 36),
(216, 'Health Insurance Premius Payable', 'Liability', 'Right', '0.00', 216, 'Admin', '2017-03-09 07:11:49', 1, 'Long Term Liability', 37),
(217, 'Credit Union Payable', 'Liability', 'Right', '0.00', 217, 'Admin', '2017-03-09 07:15:19', 1, 'Long Term Asset', 38),
(218, 'Savings Bonds Deductions Payables', 'Liability', 'Right', '0.00', 218, 'Admin', '2017-03-09 07:15:19', 1, 'Long Term Liability', 39),
(219, 'Wages Payable', 'Liability', 'Right', '0.00', 219, 'Admin', '2017-03-09 07:18:24', 1, 'Long Term Liability', 40),
(221, 'FUTA Tax Payable', 'Liability', 'Right', '0.00', 221, 'Admin', '2017-03-09 07:18:24', 1, 'Current Liability', 41),
(222, 'SUTA Tax Payable', 'Liability', 'Right', '0.00', 222, 'Admin', '2017-03-09 07:31:36', 1, 'Long Term Asset', 42),
(223, 'Workers\' Compensation Insurance Payable', 'Liability', 'Right', '0.00', 223, 'Admin', '2017-03-09 07:31:36', 1, 'Long Term Liability', 43),
(231, 'Sales Tax Payable', 'Liability', 'Right', '0.00', 231, 'Admin', '2017-03-09 07:39:08', 1, 'Current Liability', 44),
(241, 'Unearned Subscription Revenue', 'Liability', 'Right', '0.00', 241, 'Admin', '2017-03-09 07:39:08', 1, 'Long Term Liability', 45),
(242, 'Current Portion of Mortgage Payable ', 'Liability', 'Right', '0.00', 242, 'Admin', '2017-03-09 08:54:20', 1, 'Current Liability', 46),
(251, 'Mortgage Payable', 'Liability', 'Right', '0.00', 251, 'Admin', '2017-03-09 08:54:20', 1, 'Long Term Liability', 47),
(252, 'Bonds Payable', 'Liability', 'Right', '0.00', 252, 'Admin', '2017-03-09 08:56:33', 1, 'Long Term Liability', 48),
(253, 'Premium on Bonds Payable', 'Liability', 'Right', '0.00', 253, 'Admin', '2017-03-09 08:56:33', 1, 'Long Term Liability', 49),
(311, 'Jessica Jane, Capital', 'Owner\'s Equity', 'Right', '15000.00', 311, 'Admin', '2017-03-09 08:58:22', 1, 'Owner\'s Equity', 50),
(312, 'Jessica Jane, Drawing', 'Owner\'s Capital', 'Right', '0.00', 312, 'Admin', '2017-03-09 08:59:01', 0, 'Owner\'s Equity', 51),
(313, 'Income Summary', 'Owner\'s Equity', 'Right', '0.00', 313, 'Admin', '2017-03-09 09:00:56', 1, 'Owner\'s Equity', 52),
(321, 'Common Stock', 'Owner\'s Equity', 'Right', '0.00', 321, 'Admin', '2017-03-09 09:00:56', 1, 'Owner\'s Equity', 53),
(322, 'Paid in Capital in Excess of Par/Stated Value-Common Stock', 'Owner\'s Equity', 'Right', '0.00', 322, 'Admin', '2017-03-09 09:03:39', 1, 'Owner\'s Equity', 54),
(323, 'Preferred Stock', 'Owner\'s Equity', 'Right', '0.00', 323, 'Admin', '2017-03-09 09:03:39', 1, 'Owner\'s Equity', 55),
(324, 'Paid in Capital in Excess of Par/Stated-Vlaue-Preferred Stock', 'Owner\'s Equity', 'Right', '0.00', 324, 'Admin', '2017-03-09 09:06:17', 1, 'Owner\'s Equity', 56),
(325, 'Retained Earnings', 'Owner\'s Equity', 'Right', '0.00', 325, 'Admin', '2017-03-09 09:06:17', 1, 'Owner\'s Equity', 57),
(326, 'Retained Earnings Appropriated for...', 'Owner\'s Equity', 'Right', '0.00', 326, 'Admin', '2017-03-09 09:07:59', 1, 'Owner\'s Equity', 58),
(327, 'Common Stock Subscribed', 'Owner\'s Equity', 'Right', '0.00', 327, 'Admin', '2017-03-09 09:07:59', 1, 'Owner\'s Equity', 59),
(328, 'Preferred Stock Subscribed', 'Owner\'s Equity', 'Right', '0.00', 328, 'Admin', '2017-03-09 09:10:08', 1, 'Owner\'s Equity', 60),
(329, 'Paid in Capital from Sale of Treasury Stock', 'Owner\'s Equity', 'Right', '0.00', 329, 'Admin', '2017-03-09 09:10:08', 1, 'Owner\'s Equity', 61),
(401, 'Fee', 'Revenue', 'Right', '0.00', 401, 'Admin', '2017-03-09 09:14:13', 1, 'Revenue', 62),
(402, 'Boarding and Grooming Revenue', 'Revenue', 'Right', '0.00', 402, 'Admin', '2017-03-09 09:14:13', 1, 'Revenue', 63),
(403, 'Subscription Revenue', 'Revenue', 'Right', '0.00', 403, 'Admin', '2017-03-09 09:15:32', 1, 'Revenue', 64),
(411, 'Interest Revenue', 'Revenue', 'Right', '0.00', 411, 'Admin', '2017-03-09 09:15:32', 1, 'Revenue', 65),
(412, 'Rent Revenue', 'Revenue', 'Right', '0.00', 412, 'Admin', '2017-03-09 09:16:49', 1, 'Revenue', 66),
(413, 'Subscriptions Revenue', 'Revenue', 'Right', '0.00', 413, 'Admin', '2017-03-09 09:16:49', 1, 'Revenue', 67),
(414, 'Sinking Funds Revenue', 'Revenue', 'Right', '0.00', 414, 'Admin', '2017-03-09 09:18:32', 1, 'Revenue', 68),
(415, 'Uncollectible Accounts Recovered', 'Revenue', 'Right', '0.00', 415, 'Admin', '2017-03-09 09:18:32', 1, 'Revenue', 69),
(416, 'Gain on Sale/Exchange of Equipment', 'Revenue', 'Right', '0.00', 416, 'Admin', '2017-03-09 09:20:25', 1, 'Revenue', 70),
(417, 'Gain on Bonds Redeemed ', 'Revenue', 'Right', '0.00', 417, 'Admin', '2017-03-09 09:20:25', 1, 'Revenue', 71),
(501, 'Purchases', 'Operating Expenses', 'Right', '0.00', 501, 'Admin', '2017-03-09 09:22:08', 1, 'Operating Expenses', 72),
(502, 'Freight-in', 'Operating Expenses', 'Right', '0.00', 502, 'Admin', '2017-03-09 09:22:08', 1, 'Operating Expenses', 73),
(504, 'Overhead', 'Operating Expenses', 'Right', '0.00', 504, 'Admin', '2017-03-09 09:23:09', 1, 'Operating Expenses', 74),
(505, 'Costs of Goods Sold', 'Operating Expenses', 'Right', '0.00', 505, 'Admin', '2017-03-09 09:23:09', 1, 'Operating Expenses', 75),
(511, 'Wages Expense', 'Operating Expenses', 'Right', '0.00', 511, 'Admin', '2017-03-09 09:24:46', 1, 'Operating Expenses', 76),
(512, 'Advertising Expenses', 'Operating Expenses', 'Right', '0.00', 512, 'Admin', '2017-03-09 09:24:46', 1, 'Operating Expenses', 77),
(513, 'Bank Credit Card Expense', 'Operating Expenses', 'Right', '0.00', 513, 'Admin', '2017-03-09 09:25:57', 1, 'Operating Expenses', 78),
(514, 'Store Supplies Expense', 'Operating Expenses', 'Right', '0.00', 514, 'Admin', '2017-03-09 09:25:57', 1, 'Operating Expenses', 79),
(515, 'Travel and Entertainment Expense', 'Operating Expenses', 'Right', '0.00', 515, 'Admin', '2017-03-09 09:27:15', 1, 'Operating Expenses', 80),
(516, 'Cash Short and Over', 'Operating Expenses', 'Right', '0.00', 516, 'Admin', '2017-03-09 09:27:15', 1, 'Operating Expenses', 81),
(519, 'Depreciation Expense', 'Operating Expenses', 'Right', '0.00', 519, 'Admin', '2017-03-09 09:28:22', 1, 'Operating Expenses', 82),
(521, 'Rent Expense', 'Operating Expenses', 'Right', '0.00', 521, 'Admin', '2017-03-09 09:28:22', 1, 'Operating Expenses', 83),
(522, 'Office Salaries Expense', 'Operating Expenses', 'Right', '0.00', 522, 'Admin', '2017-03-09 09:29:47', 1, 'Operating Expenses', 84),
(523, 'Office Supplies Expense', 'Operating Expenses', 'Right', '0.00', 523, 'Admin', '2017-03-09 09:29:47', 1, 'Operating Expenses', 85),
(524, 'Other Supplies: Food Supplies Expense', 'Operating Expenses', 'Right', '0.00', 524, 'Admin', '2017-03-09 09:32:03', 1, 'Operating Expenses', 86),
(525, 'Telephone Expense', 'Operating Expenses', 'Right', '0.00', 525, 'Admin', '2017-03-09 09:32:03', 1, 'Operating Expenses', 87),
(526, 'Transportation/Automobile Expense ', 'Operating Expenses', 'Right', '0.00', 526, 'Admin', '2017-03-09 09:33:59', 1, 'Operating Expenses', 88),
(527, 'Collection Expense', 'Operating Expenses', 'Right', '0.00', 527, 'Admin', '2017-03-09 09:33:59', 1, 'Operating Expenses', 89),
(528, 'Inventory Short and Over', 'Operating Expenses', 'Right', '0.00', 528, 'Admin', '2017-03-09 09:35:29', 1, 'Operating Expenses', 90),
(529, 'Loss on Write Down of Inventory', 'Operating Expenses', 'Right', '0.00', 529, 'Admin', '2017-03-09 09:35:29', 1, 'Operating Expenses', 91),
(530, 'Payroll Tax Expense', 'Operating Expenses', 'Right', '0.00', 530, 'Admin', '2017-03-09 09:37:12', 1, 'Operating Expenses', 92),
(531, 'Worker\'s Compensation Expense', 'Operating Expenses', 'Right', '0.00', 531, 'Admin', '2017-03-09 09:37:12', 1, 'Operating Expenses', 93),
(532, 'Bad Debt Expense', 'Operating Expenses', 'Right', '0.00', 532, 'Admin', '2017-03-09 09:38:44', 1, 'Operating Expenses', 94),
(533, 'Electricity Expense/Utilities Expense', 'Operating Expenses', 'Right', '0.00', 533, 'Admin', '2017-03-09 09:38:44', 1, 'Operating Expenses', 95),
(534, 'Charitable Contributions Expense', 'Operating Expenses', 'Right', '0.00', 534, 'Admin', '2017-03-09 09:40:01', 1, 'Operating Expenses', 96),
(535, 'Insurance Expense', 'Operating Expenses', 'Right', '0.00', 535, 'Admin', '2017-03-09 09:40:01', 1, 'Operating Expenses', 97),
(538, 'Oil and Gas Expense', 'Operating Expenses', 'Right', '0.00', 538, 'Admin', '2017-03-09 09:41:40', 1, 'Operating Expenses', 98),
(540, 'Depreciation Expense-Building', 'Operating Expenses', 'Right', '0.00', 540, 'Admin', '2017-03-09 09:41:40', 1, 'Operating Expenses', 99),
(542, 'Depreciation Expense-Other Equipment', 'Operating Expenses', 'Right', '0.00', 540, 'Admin', '2017-03-09 09:43:35', 1, 'Operating Expenses', 100),
(543, 'Depletion Expense', 'Operating Expenses', 'Right', '0.00', 543, 'Admin', '2017-03-09 09:43:35', 1, 'Operating Expenses', 101),
(544, 'Patent Amortization', 'Operating Expenses', 'Right', '0.00', 544, 'Admin', '2017-03-09 09:45:45', 1, 'Operating Expenses', 102),
(545, 'Amortization of Organization Costs', 'Operating Expenses', 'Right', '0.00', 545, 'Admin', '2017-03-09 09:45:45', 1, 'Operating Expenses', 103),
(549, 'Miscellaneous Expense', 'Operating Expenses', 'Right', '0.00', 549, 'Admin', '2017-03-09 09:47:11', 1, 'Operating Expenses', 104),
(551, 'Interest Expense', 'Operating Expenses', 'Right', '0.00', 551, 'Admin', '2017-03-09 09:47:11', 1, 'Operating Expenses', 105),
(552, 'Loss of Discarded Equipment', 'Operating Expenses', 'Right', '0.00', 552, 'Admin', '2017-03-09 09:49:48', 1, 'Operating Expenses', 106),
(553, 'Loss of Sale/Exchange Equipment', 'Operating Expenses', 'Right', '0.00', 553, 'Admin', '2017-03-09 09:49:48', 1, 'Operating Expenses', 107),
(554, 'Loss of Bonds Redeemed', 'Operating Expenses', 'Right', '0.00', 554, 'Admin', '2017-03-09 09:50:58', 1, 'Operating Expenses', 108),
(555, 'Income Tax Expense', 'Operating Expenses', 'Right', '0.00', 555, 'Admin', '2017-03-09 09:50:58', 1, 'Operating Expenses', 109);

-- --------------------------------------------------------

--
-- Table structure for table `upload`
--

CREATE TABLE `upload` (
  `ID` int(11) NOT NULL,
  `Name` varchar(30) NOT NULL,
  `Type` varchar(30) NOT NULL,
  `Size` int(11) NOT NULL,
  `Content` mediumblob NOT NULL,
  `Journal_Transaction_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chart_of_accounts`
--
ALTER TABLE `chart_of_accounts`
  ADD PRIMARY KEY (`Account Code`);

--
-- Indexes for table `event_log`
--
ALTER TABLE `event_log`
  ADD PRIMARY KEY (`Event Log ID`);

--
-- Indexes for table `journal`
--
ALTER TABLE `journal`
  ADD PRIMARY KEY (`Journal ID`);

--
-- Indexes for table `journalcounter`
--
ALTER TABLE `journalcounter`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `journaltemp`
--
ALTER TABLE `journaltemp`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `journal_transaction`
--
ALTER TABLE `journal_transaction`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `ledger`
--
ALTER TABLE `ledger`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `login_info`
--
ALTER TABLE `login_info`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `possible_accounts`
--
ALTER TABLE `possible_accounts`
  ADD PRIMARY KEY (`Account Code`);

--
-- Indexes for table `upload`
--
ALTER TABLE `upload`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `event_log`
--
ALTER TABLE `event_log`
  MODIFY `Event Log ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `journal`
--
ALTER TABLE `journal`
  MODIFY `Journal ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `journalcounter`
--
ALTER TABLE `journalcounter`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `journaltemp`
--
ALTER TABLE `journaltemp`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `journal_transaction`
--
ALTER TABLE `journal_transaction`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `login_info`
--
ALTER TABLE `login_info`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `possible_accounts`
--
ALTER TABLE `possible_accounts`
  MODIFY `Account Code` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=556;
--
-- AUTO_INCREMENT for table `upload`
--
ALTER TABLE `upload`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
