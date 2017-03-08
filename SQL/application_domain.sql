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
  `Group` varchar(30) NOT NULL,
  `Event Log` int(11) NOT NULL,
  `Error Code` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chart_of_accounts`
--

INSERT INTO `chart_of_accounts` (`Account Code`, `Account Name`, `Account Type`, `Normal Side`, `Initial Balance`, `Order`, `Comment`, `Added By`, `Added On`, `Active`, `Group`, `Event Log`, `Error Code`) VALUES
(101, 'Cash', 'Asset', 'Left', '100.00', 1, 'Added', 'admin', '2017-03-06 23:29:39', 0, 'Current Asset', 1, 1),
(105, 'Petty Cash', 'Asset', 'Left', '0.00', 2, 'Added', 'admin', '2017-03-06 23:31:39', 0, 'Current Asset', 1, 1),
(121, 'Notes Receiveable', 'Asset', 'Left', '0.00', 121, 'Added', 'admin', '2017-03-06 23:35:09', 0, 'Current Asset', 1, 1),
(122, 'Accounts Receivable', 'Asset', 'Left', '120.34', 122, 'Added', 'admin', '2017-03-06 23:36:34', 0, 'Current Asset', 1, 1),
(131, 'Merchandise Inventory', 'Asset', 'Left', '0.00', 131, 'Added', 'admin', '2017-03-06 23:38:10', 0, 'Current Asset', 1, 1),
(132, 'Raw Materials', 'Asset', 'Left', '200.34', 13, 'Added', 'admin', '2017-03-07 00:03:13', 0, 'Current Asset', 1, 0),
(161, 'Land', 'Asset', 'Left', '20000.00', 161, 'added', 'admin', '2017-03-06 23:40:23', 0, 'Long Term Asset', 1, 1),
(190, 'Patents', 'Asset', 'Left', '0.00', 190, 'Added', 'admin', '2017-03-06 23:43:23', 0, 'Long Term Asset', 1, 1),
(201, 'Notes Payable', 'Liability', 'Right', '330.34', 201, 'Added', 'admin', '2017-03-06 23:47:28', 0, 'Current Liability', 1, 1),
(202, 'Accounts Payable', 'Liability', 'Right', '550.00', 202, 'Added', 'admin', '2017-03-06 23:48:45', 0, 'Current Liability', 1, 1),
(204, 'Income Tax Payable', 'Liability', 'Right', '0.00', 204, 'Added', 'admin', '2017-03-06 23:49:45', 0, 'Current Liability', 1, 1),
(219, 'Wages Payable', 'Liability', 'Right', '0.00', 219, 'Added', 'admin', '2017-03-06 23:53:57', 0, 'Current Liability', 1, 1),
(313, 'Common Stock', 'Owners Equity', 'Right', '0.00', 10, 'Done', 'Skip Bassey', '2017-02-21 03:19:40', 0, 'Owners Equity', 1, 1),
(325, 'Retained Earnings', 'Owners Equity', 'Right', '0.00', 11, 'Done', 'Skip Bassey', '2017-02-21 03:19:40', 0, 'Owners Equity', 1, 1),
(401, 'Delivery Fees', 'Revenue', 'Right', '0.00', 13, 'Done', 'Skip Bassey', '2017-02-21 03:22:37', 0, 'Revenue', 1, 1),
(412, 'Rent Revenue', 'Revenue', 'Right', '123.00', 14, 'Done', 'Skip Bassey', '2017-02-21 03:22:37', 0, 'Revenue', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `event_log`
--

DROP TABLE IF EXISTS `event_log`;
CREATE TABLE `event_log` (
  `Event Log ID` int(11) NOT NULL,
  `Date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Username` varchar(50) NOT NULL,
  `Description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `event_log`
--

INSERT INTO `event_log` (`Event Log ID`, `Date`, `Username`, `Description`) VALUES
(1, '2017-03-06 23:29:39', 'admin', 'Added Account: Cash'),
(2, '2017-03-06 23:31:39', 'admin', 'Added Account: Petty Cash'),
(3, '2017-03-06 23:35:09', 'admin', 'Added Account: Notes Receiveable'),
(4, '2017-03-06 23:36:34', 'admin', 'Added Account: Accounts Receivable'),
(5, '2017-03-06 23:38:10', 'admin', 'Added Account: Merchandise Inventory'),
(6, '2017-03-06 23:40:23', 'admin', 'Added Account: Land'),
(7, '2017-03-06 23:43:23', 'admin', 'Added Account: Patents'),
(8, '2017-03-06 23:47:28', 'admin', 'Added Account: Notes Payable'),
(9, '2017-03-06 23:48:45', 'admin', 'Added Account: Accounts Payable'),
(10, '2017-03-06 23:49:45', 'admin', 'Added Account: Income Tax Payable'),
(11, '2017-03-06 23:53:57', 'admin', 'Added Account: Wages Payable'),
(12, '2017-03-07 00:03:13', 'admin', 'Added Account: Raw Materials');

-- --------------------------------------------------------

--
-- Table structure for table `journal`
--

DROP TABLE IF EXISTS `journal`;
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
-- Table structure for table `journaltemp`
--

DROP TABLE IF EXISTS `journaltemp`;
CREATE TABLE `journaltemp` (
  `ID` int(11) NOT NULL,
  `Account` varchar(50) DEFAULT NULL,
  `Debit` decimal(10,2) DEFAULT NULL,
  `Credit` decimal(10,2) DEFAULT NULL,
  `Date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `journaltemp`
--

INSERT INTO `journaltemp` (`ID`, `Account`, `Debit`, `Credit`, `Date`) VALUES
(1, 'Cash', '25.34', '0.00', '2017-03-07'),
(2, 'Cash', '25.34', '0.00', '2017-03-07'),
(3, 'Cash', '25.34', '0.00', '2017-03-07'),
(4, 'Cash', '25.34', '0.00', '2017-03-07');

-- --------------------------------------------------------

--
-- Table structure for table `journal_transaction`
--

DROP TABLE IF EXISTS `journal_transaction`;
CREATE TABLE `journal_transaction` (
  `Account Name` varchar(50) NOT NULL,
  `Debit` decimal(10,2) DEFAULT NULL,
  `Credit` decimal(10,0) DEFAULT NULL,
  `Journal ID` int(11) NOT NULL,
  `Date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `journal_transaction`
--

INSERT INTO `journal_transaction` (`Account Name`, `Debit`, `Credit`, `Journal ID`, `Date`) VALUES
('Petty Cash', '0.00', '21', 1, '2017-03-06'),
('Wages Payable', '21.00', NULL, 1, '2017-03-06');

-- --------------------------------------------------------

--
-- Table structure for table `login_info`
--

DROP TABLE IF EXISTS `login_info`;
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
-- Indexes for table `journaltemp`
--
ALTER TABLE `journaltemp`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `journal_transaction`
--
ALTER TABLE `journal_transaction`
  ADD PRIMARY KEY (`Account Name`);

--
-- Indexes for table `login_info`
--
ALTER TABLE `login_info`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `event_log`
--
ALTER TABLE `event_log`
  MODIFY `Event Log ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `journal`
--
ALTER TABLE `journal`
  MODIFY `Journal ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `journaltemp`
--
ALTER TABLE `journaltemp`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `login_info`
--
ALTER TABLE `login_info`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
