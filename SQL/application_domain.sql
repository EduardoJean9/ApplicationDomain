-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 02, 2017 at 01:07 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

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
(101, 'Cash', 'Asset', 'Left', '0.00', 101, '', 'admin', '2017-05-01 20:25:29', 0, 'Current Asset'),
(122, 'Accounts Receivable ', 'Asset', 'Left', '0.00', 122, '', 'admin', '2017-05-01 20:26:00', 0, 'Current Asset'),
(141, 'Supplies', 'Asset', 'Left', '0.00', 141, '', 'admin', '2017-05-01 20:26:49', 0, 'Current Asset'),
(145, 'Prepaid Insurance', 'Asset', 'Left', '0.00', 145, '', 'admin', '2017-05-01 20:25:48', 0, 'Long Term Asset'),
(181, 'Office Equipment', 'Asset', 'Left', '0.00', 181, '', 'admin', '2017-05-01 20:38:09', 0, 'Current Asset'),
(202, 'Account Payables', 'Liabilities', 'Right', '0.00', 202, '', 'admin', '2017-05-01 20:52:29', 0, 'Current Liability'),
(219, 'Wages Payable', 'Liability', 'Right', '0.00', 219, '', 'admin', '2017-05-01 20:54:50', 0, 'Long Term Liability'),
(241, 'Unearned Subscription Revenue', 'Liability', 'Right', '0.00', 241, '', 'admin', '2017-05-01 20:56:23', 0, 'Long Term Liability'),
(311, 'Jessica Jane Capital', 'Owner''s Equity', 'Right', '0.00', 311, '', 'Admin', '2017-05-01 21:11:03', 1, 'Owner''s Equity'),
(356, 'Accumulated Depreciation', 'Asset', 'Left', '0.00', 157, '', 'admin', '2017-05-01 20:52:11', 0, 'Current Asset'),
(403, 'Subscription Revenue', 'Revenue', 'Right', '0.00', 403, '', 'admin', '2017-05-01 21:00:27', 0, 'Revenue'),
(512, 'Advertising Expenses', 'Operating Expenses', 'Right', '0.00', 512, '', 'admin', '2017-05-01 21:05:36', 0, 'Operating Expenses'),
(521, 'Rent Expense', 'Operating Expenses', 'Right', '0.00', 521, '', 'admin', '2017-05-01 20:37:10', 0, 'Operating Expenses'),
(522, 'Office Salaries Expense', 'Operating Expenses', 'Right', '0.00', 522, '', 'admin', '2017-05-01 21:04:52', 0, 'Operating Expenses'),
(523, 'Office Supplies Expense', 'Operating Expenses', 'Right', '0.00', 523, '', 'admin', '2017-05-01 21:04:26', 0, 'Operating Expenses'),
(525, 'Telephone Expense', 'Operating Expenses', 'Right', '0.00', 525, '', 'admin', '2017-05-01 21:05:04', 0, 'Operating Expenses'),
(533, 'Electricity Expense/Utilities Expense', 'Operating Expenses', 'Right', '0.00', 533, '', 'admin', '2017-05-01 21:05:25', 0, 'Operating Expenses'),
(535, 'Insurance Expense', 'Operating Expenses', 'Right', '0.00', 535, '', 'admin', '2017-05-01 21:00:52', 0, 'Operating Expenses'),
(540, 'Depreciation Expense-Building', 'Operating Expenses', 'Right', '0.00', 540, '', 'admin', '2017-05-01 21:01:11', 0, 'Operating Expenses'),
(571, 'Prepaid Rent', 'Asset', 'Right', '0.00', 45, '', 'admin', '2017-05-01 22:12:38', 0, 'Current Asset');

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
(16, 0, '2017-04-05 23:55:11', 'admin', 'Journal Entry 28 added'),
(17, 0, '2017-04-19 20:26:45', 'admin', 'Journal Entry 40 added'),
(18, 0, '2017-04-19 20:30:46', 'admin', 'Journal Entry 42 added'),
(19, 0, '2017-04-19 20:32:36', 'admin', 'Journal Entry 44 added'),
(20, 0, '2017-04-19 20:36:12', 'admin', 'Journal Entry 45 added'),
(21, 0, '2017-04-19 21:09:46', 'admin', 'Journal Entry 46 added'),
(22, 0, '2017-04-20 00:26:29', 'admin', 'Journal Entry 47 added'),
(23, 0, '2017-04-20 00:26:51', 'admin', 'Journal Entry 48 added'),
(24, 0, '2017-04-20 00:27:06', 'admin', 'Journal Entry 49 added'),
(25, 0, '2017-04-20 03:15:00', 'admin', 'Journal Entry 50 added'),
(26, 0, '2017-04-20 03:35:15', 'admin', 'Journal Entry 52 added'),
(27, 0, '2017-04-20 03:36:20', 'admin', 'Journal Entry 53 added'),
(28, 0, '2017-04-20 05:14:00', 'admin', 'Journal Entry 54 added'),
(29, 0, '2017-04-20 13:58:18', 'admin', 'Journal Entry 55 added'),
(30, 0, '2017-04-21 03:16:53', 'admin', 'admin accessed acount: Cash'),
(31, 0, '2017-04-22 19:20:16', 'admin', 'admin accessed acount: Patents'),
(32, 0, '2017-04-23 16:28:10', 'admin', 'Journal Entry 56 added'),
(33, 0, '2017-04-24 20:03:51', 'admin', 'admin accessed acount: Petty Cash'),
(34, 0, '2017-04-24 20:03:53', 'admin', 'admin accessed acount: Petty Cash'),
(35, 0, '2017-04-24 20:03:56', 'admin', 'admin accessed acount: Merchandise Inventory'),
(36, 0, '2017-04-24 20:03:59', 'admin', 'admin accessed acount: Notes Payable'),
(37, 0, '2017-04-24 20:12:23', 'admin', 'admin accessed acount: Petty Cash'),
(38, 0, '2017-04-24 23:57:19', 'admin', 'Journal Entry 57 added'),
(39, 0, '2017-05-01 06:00:21', 'admin', 'Journal Entry 58 added'),
(40, 0, '2017-05-01 06:08:27', 'admin', 'Journal Entry 59 added'),
(41, 0, '2017-05-01 06:21:17', 'admin', 'Journal Entry 60 added'),
(42, 0, '2017-05-01 06:21:44', 'admin', 'Journal Entry 61 added'),
(43, 0, '2017-05-01 06:22:10', 'admin', 'Journal Entry 62 added'),
(44, 0, '2017-05-01 08:31:34', 'admin', 'Journal Entry 63 added'),
(45, 0, '2017-05-01 09:17:46', 'admin', 'admin accessed acount: Cash'),
(46, 0, '2017-05-01 09:18:02', 'admin', 'admin accessed acount: Petty Cash'),
(47, 0, '2017-05-01 09:18:26', 'admin', 'admin accessed acount: Cash'),
(48, 0, '2017-05-01 09:18:56', 'admin', 'admin accessed acount: Petty Cash'),
(49, 0, '2017-05-01 09:22:42', 'admin', 'admin accessed acount: Petty Cash'),
(50, 0, '2017-05-01 09:23:38', 'admin', 'admin accessed acount: Petty Cash'),
(51, 0, '2017-05-01 09:23:50', 'admin', 'admin accessed acount: Notes Receiveable'),
(52, 0, '2017-05-01 09:24:00', 'admin', 'admin accessed acount: Notes Payable'),
(53, 0, '2017-05-01 09:24:03', 'admin', 'admin accessed acount: Delivery Fees'),
(54, 0, '2017-05-01 09:24:06', 'admin', 'admin accessed acount: Retained Earnings'),
(55, 0, '2017-05-01 09:25:00', 'admin', 'admin accessed acount: Retained Earnings'),
(56, 0, '2017-05-01 09:25:03', 'admin', 'admin accessed acount: Cash'),
(57, 0, '2017-05-01 09:26:05', 'admin', 'admin accessed acount: Petty Cash'),
(58, 0, '2017-05-01 09:32:36', 'admin', 'admin accessed acount: Cash'),
(59, 0, '2017-05-01 09:39:34', 'admin', 'admin accessed acount: Petty Cash'),
(60, 0, '2017-05-01 09:43:00', 'admin', 'admin accessed acount: Cash'),
(61, 0, '2017-05-01 10:13:34', 'admin', 'admin accessed acount: Cash'),
(62, 0, '2017-05-01 10:13:37', 'admin', 'admin accessed acount: Accounts Receivable'),
(63, 0, '2017-05-01 10:59:12', 'admin', 'admin accessed acount: Petty Cash'),
(64, 0, '2017-05-01 20:10:16', 'admin', 'Journal Entry 64 added'),
(65, 0, '2017-05-01 20:19:12', 'admin', 'admin accessed acount: Petty Cash'),
(66, 0, '2017-05-01 20:25:29', 'admin', 'Added Account: Cash'),
(67, 0, '2017-05-01 20:25:48', 'admin', 'Added Account: Prepaid Insurance'),
(68, 0, '2017-05-01 20:26:00', 'admin', 'Added Account: Accounts Receivable '),
(69, 0, '2017-05-01 20:26:49', 'admin', 'Added Account: Supplies'),
(70, 0, '2017-05-01 20:37:10', 'admin', 'Added Account: Rent Expense'),
(71, 0, '2017-05-01 20:38:09', 'admin', 'Added Account: Office Equipment'),
(72, 0, '2017-05-01 20:52:12', 'admin', 'Added Account: Accumulated Depreciation'),
(73, 0, '2017-05-01 20:52:29', 'admin', 'Added Account: Account Payables'),
(74, 0, '2017-05-01 20:54:50', 'admin', 'Added Account: Wages Payable'),
(75, 0, '2017-05-01 20:56:23', 'admin', 'Added Account: Unearned Subscription Revenue'),
(76, 0, '2017-05-01 21:00:27', 'admin', 'Added Account: Subscription Revenue'),
(77, 0, '2017-05-01 21:00:52', 'admin', 'Added Account: Insurance Expense'),
(78, 0, '2017-05-01 21:01:11', 'admin', 'Added Account: Depreciation Expense-Building'),
(79, 0, '2017-05-01 21:04:27', 'admin', 'Added Account: Office Supplies Expense'),
(80, 0, '2017-05-01 21:04:52', 'admin', 'Added Account: Office Salaries Expense'),
(81, 0, '2017-05-01 21:05:05', 'admin', 'Added Account: Telephone Expense'),
(82, 0, '2017-05-01 21:05:25', 'admin', 'Added Account: Electricity Expense/Utilities Expense'),
(83, 0, '2017-05-01 21:05:36', 'admin', 'Added Account: Advertising Expenses'),
(84, 0, '2017-05-01 21:12:32', 'admin', 'Journal Entry 65 added'),
(85, 0, '2017-05-01 21:13:20', 'admin', 'Journal Entry 66 added'),
(86, 0, '2017-05-01 21:13:50', 'admin', 'Journal Entry 67 added'),
(87, 0, '2017-05-01 21:14:12', 'admin', 'Journal Entry 68 added'),
(88, 0, '2017-05-01 21:14:41', 'admin', 'Journal Entry 69 added'),
(89, 0, '2017-05-01 21:15:02', 'admin', 'Journal Entry 70 added'),
(90, 0, '2017-05-01 21:15:15', 'admin', 'Journal Entry 71 added'),
(91, 0, '2017-05-01 21:15:37', 'admin', 'Journal Entry 72 added'),
(92, 0, '2017-05-01 21:16:11', 'admin', 'Journal Entry 73 added'),
(93, 0, '2017-05-01 21:16:34', 'admin', 'Journal Entry 74 added'),
(94, 0, '2017-05-01 21:17:19', 'admin', 'Journal Entry 75 added'),
(95, 0, '2017-05-01 21:18:03', 'admin', 'Journal Entry 76 added'),
(96, 0, '2017-05-01 21:18:25', 'admin', 'Journal Entry 77 added'),
(97, 0, '2017-05-01 21:19:10', 'admin', 'Journal Entry 78 added'),
(98, 0, '2017-05-01 21:19:32', 'admin', 'Journal Entry 79 added'),
(99, 0, '2017-05-01 21:19:55', 'admin', 'Journal Entry 80 added'),
(100, 0, '2017-05-01 21:20:18', 'admin', 'Journal Entry 81 added'),
(101, 0, '2017-05-01 21:20:33', 'admin', 'Journal Entry 82 added'),
(102, 0, '2017-05-01 21:21:05', 'admin', 'Journal Entry 83 added'),
(103, 0, '2017-05-01 21:21:27', 'admin', 'Journal Entry 84 added'),
(104, 0, '2017-05-01 21:21:54', 'admin', 'Journal Entry 85 added'),
(105, 0, '2017-05-01 21:22:40', 'admin', 'Journal Entry 86 added'),
(106, 0, '2017-05-01 21:23:08', 'admin', 'Journal Entry 87 added'),
(107, 0, '2017-05-01 21:23:49', 'admin', 'Journal Entry 88 added'),
(108, 0, '2017-05-01 21:24:14', 'admin', 'Journal Entry 89 added'),
(109, 0, '2017-05-01 21:27:13', 'admin', 'Journal Entry 90 added'),
(110, 0, '2017-05-01 21:27:33', 'admin', 'Journal Entry 91 added'),
(111, 0, '2017-05-01 22:12:38', 'admin', 'Added Account: Prepaid Rent'),
(112, 0, '2017-05-01 22:59:04', 'admin', 'admin accessed acount: Accounts Receivable ');

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
(56, 'new'),
(57, 'new'),
(58, 'new'),
(59, 'new'),
(60, 'new'),
(61, 'new'),
(62, 'new'),
(63, 'new'),
(64, 'new'),
(65, 'new'),
(66, 'new'),
(67, 'new'),
(68, 'new'),
(69, 'new'),
(70, 'new'),
(71, 'new'),
(72, 'new'),
(73, 'new'),
(74, 'new'),
(75, 'new'),
(76, 'new'),
(77, 'new'),
(78, 'new'),
(79, 'new'),
(80, 'new'),
(81, 'new'),
(82, 'new'),
(83, 'new'),
(84, 'new'),
(85, 'new'),
(86, 'new'),
(87, 'new'),
(88, 'new'),
(89, 'new'),
(90, 'new'),
(91, 'new');

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
  `Active` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `journal_transaction`
--

INSERT INTO `journal_transaction` (`ID`, `Account Name`, `Debit`, `Credit`, `Journal ID`, `Date`, `Active`) VALUES
(1, 'Cash', '10000.00', '0.00', 65, '2017-05-01', 2),
(2, 'Accounts Receivable ', '1500.00', '0.00', 65, '2017-05-01', 2),
(3, 'Office Supplies Expense', '1250.00', '0.00', 65, '2017-05-01', 2),
(4, 'Office Equipment', '7500.00', '0.00', 65, '2017-05-01', 2),
(5, 'Jessica Jane Capital', '0.00', '20250.00', 65, '2017-05-01', 2),
(8, 'Rent Expense', '4500.00', '0.00', 66, '2017-05-01', 2),
(9, 'Cash', '0.00', '4500.00', 66, '2017-05-01', 2),
(11, 'Prepaid Insurance', '1800.00', '0.00', 67, '2017-05-01', 2),
(12, 'Cash', '0.00', '1800.00', 67, '2017-05-01', 2),
(14, 'Cash', '3000.00', '0.00', 68, '2017-05-01', 2),
(15, 'Unearned Subscription Revenue', '0.00', '3000.00', 68, '2017-05-01', 2),
(17, 'Office Equipment', '1800.00', '0.00', 69, '2017-05-01', 2),
(18, 'Account Payables', '0.00', '1800.00', 69, '2017-05-01', 2),
(20, 'Cash', '800.00', '0.00', 70, '2017-05-01', 2),
(21, 'Accounts Receivable ', '0.00', '800.00', 70, '2017-05-01', 2),
(23, 'Advertising Expenses', '120.00', '0.00', 71, '2017-05-01', 2),
(24, 'Cash', '0.00', '120.00', 71, '2017-05-01', 2),
(26, 'Account Payables', '800.00', '0.00', 72, '2017-05-01', 2),
(27, 'Cash', '0.00', '800.00', 72, '2017-05-01', 2),
(29, 'Accounts Receivable ', '2250.00', '0.00', 73, '2017-05-01', 2),
(30, 'Subscription Revenue', '0.00', '2250.00', 73, '2017-05-01', 2),
(32, 'Office Salaries Expense', '400.00', '0.00', 74, '2017-05-01', 2),
(33, 'Cash', '0.00', '400.00', 74, '2017-05-01', 2),
(35, 'Cash', '3175.00', '0.00', 75, '2017-05-01', 2),
(36, 'Subscription Revenue', '0.00', '3175.00', 75, '2017-05-01', 2),
(38, 'Supplies', '750.00', '0.00', 76, '2017-05-01', 2),
(39, 'Cash', '0.00', '750.00', 76, '2017-05-01', 2),
(41, 'Accounts Receivable ', '1100.00', '0.00', 77, '2017-05-01', 2),
(42, 'Subscription Revenue', '0.00', '1100.00', 77, '2017-05-01', 2),
(44, 'Cash', '1850.00', '0.00', 78, '2017-05-01', 2),
(45, 'Subscription Revenue', '0.00', '1850.00', 78, '2017-05-01', 2),
(47, 'Cash', '1600.00', '0.00', 79, '2017-05-01', 2),
(48, 'Accounts Receivable ', '0.00', '1600.00', 79, '2017-05-01', 2),
(50, 'Office Salaries Expense', '400.00', '0.00', 80, '2017-05-01', 2),
(51, 'Cash', '0.00', '400.00', 80, '2017-05-01', 2),
(53, 'Telephone Expense', '130.00', '0.00', 81, '2017-05-01', 2),
(54, 'Cash', '0.00', '130.00', 81, '2017-05-01', 2),
(56, 'Electricity Expense/Utilities Expense', '200.00', '0.00', 82, '2017-05-01', 2),
(57, 'Cash', '0.00', '200.00', 82, '2017-05-01', 2),
(59, 'Cash', '2050.00', '0.00', 83, '2017-05-01', 2),
(60, 'Subscription Revenue', '0.00', '2050.00', 83, '2017-05-01', 2),
(62, 'Accounts Receivable ', '1000.00', '0.00', 84, '2017-05-01', 2),
(63, 'Subscription Revenue', '0.00', '1000.00', 84, '2017-05-01', 2),
(65, 'Office Salaries Expense', '4500.00', '0.00', 85, '2017-05-01', 2),
(66, 'Cash', '0.00', '4500.00', 85, '2017-05-01', 2),
(68, 'Insurance Expense', '150.00', '0.00', 86, '2017-05-01', 2),
(69, 'Prepaid Insurance', '0.00', '150.00', 86, '2017-05-01', 2),
(71, 'Office Supplies Expense', '980.00', '0.00', 87, '2017-05-01', 2),
(72, 'Supplies', '0.00', '980.00', 87, '2017-05-01', 2),
(74, 'Depreciation Expense-Building', '500.00', '0.00', 88, '2017-05-01', 2),
(75, 'Accumulated Depreciation', '0.00', '500.00', 88, '2017-05-01', 2),
(77, 'Office Salaries Expense', '20.00', '0.00', 89, '2017-05-01', 2),
(78, 'Wages Payable', '0.00', '20.00', 89, '2017-05-01', 2),
(80, 'Rent Expense', '1500.00', '0.00', 90, '2017-05-01', 2),
(81, 'Prepaid Insurance', '0.00', '1500.00', 90, '2017-05-01', 2),
(83, 'Unearned Subscription Revenue', '2000.00', '0.00', 91, '2017-05-01', 2),
(84, 'Subscription Revenue', '0.00', '2000.00', 91, '2017-05-01', 2);

-- --------------------------------------------------------

--
-- Table structure for table `ledger`
--

CREATE TABLE `ledger` (
  `ID` int(11) NOT NULL,
  `Journal ID` int(4) NOT NULL,
  `Account Name` varchar(150) NOT NULL,
  `Debit` decimal(10,2) NOT NULL,
  `Credit` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ledger`
--

INSERT INTO `ledger` (`ID`, `Journal ID`, `Account Name`, `Debit`, `Credit`) VALUES
(1, 65, 'Cash', '10000.00', '0.00'),
(2, 65, 'Accounts Receivable ', '1500.00', '0.00'),
(3, 65, 'Supplies', '1250.00', '0.00'),
(4, 65, 'Office Equipment', '7500.00', '0.00'),
(5, 65, 'Jessica Jane Capital', '0.00', '20250.00'),
(9, 66, 'Cash', '0.00', '4500.00'),
(11, 67, 'Prepaid Insurance', '1800.00', '0.00'),
(12, 67, 'Cash', '0.00', '1800.00'),
(14, 68, 'Cash', '3000.00', '0.00'),
(15, 68, 'Unearned Subscription Revenue', '0.00', '3000.00'),
(17, 69, 'Office Equipment', '1800.00', '0.00'),
(18, 69, 'Account Payables', '0.00', '1800.00'),
(20, 70, 'Cash', '800.00', '0.00'),
(21, 70, 'Accounts Receivable ', '0.00', '800.00'),
(23, 71, 'Advertising Expenses', '120.00', '0.00'),
(24, 71, 'Cash', '0.00', '120.00'),
(26, 72, 'Account Payables', '800.00', '0.00'),
(27, 72, 'Cash', '0.00', '800.00'),
(29, 73, 'Accounts Receivable ', '2250.00', '0.00'),
(30, 73, 'Subscription Revenue', '0.00', '2250.00'),
(32, 74, 'Office Salaries Expense', '400.00', '0.00'),
(33, 74, 'Cash', '0.00', '400.00'),
(35, 75, 'Cash', '3175.00', '0.00'),
(36, 75, 'Subscription Revenue', '0.00', '3175.00'),
(38, 76, 'Supplies', '750.00', '0.00'),
(39, 76, 'Cash', '0.00', '750.00'),
(41, 77, 'Accounts Receivable ', '1100.00', '0.00'),
(42, 77, 'Subscription Revenue', '0.00', '1100.00'),
(44, 78, 'Cash', '1850.00', '0.00'),
(45, 78, 'Subscription Revenue', '0.00', '1850.00'),
(47, 81, 'Telephone Expense', '130.00', '0.00'),
(48, 81, 'Cash', '0.00', '130.00'),
(50, 85, 'Office Salaries Expense', '4500.00', '0.00'),
(51, 85, 'Cash', '0.00', '4500.00'),
(53, 79, 'Cash', '1600.00', '0.00'),
(54, 79, 'Accounts Receivable ', '0.00', '1600.00'),
(56, 80, 'Office Salaries Expense', '400.00', '0.00'),
(57, 80, 'Cash', '0.00', '400.00'),
(59, 82, 'Electricity Expense/Utilities Expense', '200.00', '0.00'),
(60, 82, 'Cash', '0.00', '200.00'),
(62, 83, 'Cash', '2050.00', '0.00'),
(63, 83, 'Subscription Revenue', '0.00', '2050.00'),
(65, 86, 'Insurance Expense', '150.00', '0.00'),
(66, 86, 'Prepaid Insurance', '0.00', '150.00'),
(68, 90, 'Rent Expense', '1500.00', '0.00'),
(71, 91, 'Unearned Subscription Revenue', '2000.00', '0.00'),
(72, 91, 'Subscription Revenue', '0.00', '2000.00'),
(74, 87, 'Office Supplies Expense', '980.00', '0.00'),
(75, 87, 'Supplies', '0.00', '980.00'),
(77, 89, 'Office Salaries Expense', '20.00', '0.00'),
(78, 89, 'Wages Payable', '0.00', '20.00'),
(80, 88, 'Depreciation Expense-Building', '500.00', '0.00'),
(81, 88, 'Accumulated Depreciation', '0.00', '500.00'),
(83, 84, 'Accounts Receivable ', '1000.00', '0.00'),
(84, 84, 'Subscription Revenue', '0.00', '1000.00'),
(86, 68, 'Prepaid Rent', '4500.00', '0.00'),
(87, 70, 'Prepaid Rent', '0.00', '1500.00');

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
(121, 'Notes Recieveable', 'Asset', 'Left', '0.00', 121, 'Admin', '2017-05-01 20:22:49', 1, 'Current Asset', 3),
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
(201, 'Notes Payable ', 'Liability', 'Right', '0.00', 201, 'Admin', '2017-05-01 20:23:41', 1, 'Current Liability', 26),
(202, 'Account Payables', 'Liability', 'Right', '0.00', 202, 'Admin', '2017-05-01 22:16:55', 1, 'Current Liability', 27),
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
(223, 'Workers'' Compensation Insurance Payable', 'Liability', 'Right', '0.00', 223, 'Admin', '2017-03-09 07:31:36', 1, 'Long Term Liability', 43),
(231, 'Sales Tax Payable', 'Liability', 'Right', '0.00', 231, 'Admin', '2017-03-09 07:39:08', 1, 'Current Liability', 44),
(241, 'Unearned Subscription Revenue', 'Liability', 'Right', '0.00', 241, 'Admin', '2017-03-09 07:39:08', 1, 'Long Term Liability', 45),
(242, 'Current Portion of Mortgage Payable ', 'Liability', 'Right', '0.00', 242, 'Admin', '2017-03-09 08:54:20', 1, 'Current Liability', 46),
(251, 'Mortgage Payable', 'Liability', 'Right', '0.00', 251, 'Admin', '2017-03-09 08:54:20', 1, 'Long Term Liability', 47),
(252, 'Bonds Payable', 'Liability', 'Right', '0.00', 252, 'Admin', '2017-03-09 08:56:33', 1, 'Long Term Liability', 48),
(253, 'Premium on Bonds Payable', 'Liability', 'Right', '0.00', 253, 'Admin', '2017-03-09 08:56:33', 1, 'Long Term Liability', 49),
(311, 'Jessica Jane, Capital', 'Owner''s Equity', 'Right', '0.00', 311, 'Admin', '2017-05-01 21:08:58', 1, 'Owner''s Equity', 50),
(312, 'Jessica Jane, Drawing', 'Owner''s Capital', 'Right', '0.00', 312, 'Admin', '2017-03-09 08:59:01', 0, 'Owner''s Equity', 51),
(313, 'Income Summary', 'Owner''s Equity', 'Right', '0.00', 313, 'Admin', '2017-03-09 09:00:56', 1, 'Owner''s Equity', 52),
(321, 'Common Stock', 'Owner''s Equity', 'Right', '0.00', 321, 'Admin', '2017-03-09 09:00:56', 1, 'Owner''s Equity', 53),
(322, 'Paid in Capital in Excess of Par/Stated Value-Common Stock', 'Owner''s Equity', 'Right', '0.00', 322, 'Admin', '2017-03-09 09:03:39', 1, 'Owner''s Equity', 54),
(323, 'Preferred Stock', 'Owner''s Equity', 'Right', '0.00', 323, 'Admin', '2017-03-09 09:03:39', 1, 'Owner''s Equity', 55),
(324, 'Paid in Capital in Excess of Par/Stated-Vlaue-Preferred Stock', 'Owner''s Equity', 'Right', '0.00', 324, 'Admin', '2017-03-09 09:06:17', 1, 'Owner''s Equity', 56),
(325, 'Retained Earnings', 'Owner''s Equity', 'Right', '0.00', 325, 'Admin', '2017-03-09 09:06:17', 1, 'Owner''s Equity', 57),
(326, 'Retained Earnings Appropriated for...', 'Owner''s Equity', 'Right', '0.00', 326, 'Admin', '2017-03-09 09:07:59', 1, 'Owner''s Equity', 58),
(327, 'Common Stock Subscribed', 'Owner''s Equity', 'Right', '0.00', 327, 'Admin', '2017-03-09 09:07:59', 1, 'Owner''s Equity', 59),
(328, 'Preferred Stock Subscribed', 'Owner''s Equity', 'Right', '0.00', 328, 'Admin', '2017-03-09 09:10:08', 1, 'Owner''s Equity', 60),
(329, 'Paid in Capital from Sale of Treasury Stock', 'Owner''s Equity', 'Right', '0.00', 329, 'Admin', '2017-03-09 09:10:08', 1, 'Owner''s Equity', 61),
(356, 'Accumulated Depreciation', 'Asset', 'Left', '0.00', 157, 'Admin', '2017-05-01 20:51:32', 1, 'Current Asset', 13),
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
(531, 'Worker''s Compensation Expense', 'Operating Expenses', 'Right', '0.00', 531, 'Admin', '2017-03-09 09:37:12', 1, 'Operating Expenses', 93),
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
(555, 'Income Tax Expense', 'Operating Expenses', 'Right', '0.00', 555, 'Admin', '2017-03-09 09:50:58', 1, 'Operating Expenses', 109),
(571, 'Prepaid Rent', 'Asset', 'Right', '0.00', 45, 'Admin', '2017-05-01 22:10:47', 1, 'Current Asset', 123);

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
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `ID` (`ID`);

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
  MODIFY `Event Log ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;
--
-- AUTO_INCREMENT for table `journal`
--
ALTER TABLE `journal`
  MODIFY `Journal ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `journalcounter`
--
ALTER TABLE `journalcounter`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;
--
-- AUTO_INCREMENT for table `journaltemp`
--
ALTER TABLE `journaltemp`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `journal_transaction`
--
ALTER TABLE `journal_transaction`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;
--
-- AUTO_INCREMENT for table `ledger`
--
ALTER TABLE `ledger`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;
--
-- AUTO_INCREMENT for table `login_info`
--
ALTER TABLE `login_info`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `possible_accounts`
--
ALTER TABLE `possible_accounts`
  MODIFY `Account Code` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=572;
--
-- AUTO_INCREMENT for table `upload`
--
ALTER TABLE `upload`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- Metadata
--
USE `phpmyadmin`;

--
-- Metadata for chart_of_accounts
--

--
-- Metadata for event_log
--

--
-- Metadata for journal
--

--
-- Metadata for journalcounter
--

--
-- Metadata for journaltemp
--

--
-- Metadata for journal_transaction
--

--
-- Metadata for ledger
--

--
-- Metadata for login_info
--

--
-- Metadata for possible_accounts
--

--
-- Dumping data for table `pma__table_uiprefs`
--

INSERT INTO `pma__table_uiprefs` (`username`, `db_name`, `table_name`, `prefs`, `last_update`) VALUES
('root', 'application_domain', 'possible_accounts', '{"sorted_col":"`Group` ASC"}', '2017-05-01 22:16:55');

--
-- Metadata for upload
--

--
-- Metadata for application_domain
--

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
