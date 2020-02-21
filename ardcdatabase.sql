-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 21, 2020 at 08:32 AM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ardcdatabase`
--

-- --------------------------------------------------------

--
-- Table structure for table `employeechildren`
--

CREATE TABLE IF NOT EXISTS `employeechildren` (
  `empChild_no` int(11) NOT NULL,
  `emp_no` varchar(25) NOT NULL,
  `empChild_name` varchar(255) NOT NULL,
  `empChild_bday` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `employeeinfo`
--

CREATE TABLE IF NOT EXISTS `employeeinfo` (
  `emp_no` varchar(25) NOT NULL,
  `emp_fname` varchar(50) NOT NULL,
  `emp_mname` varchar(50) NOT NULL,
  `emp_lname` varchar(50) NOT NULL,
  `emp_suffix` varchar(10) NOT NULL,
  `emp_bday` date NOT NULL,
  `emp_sex` varchar(10) NOT NULL,
  `emp_civilStatus` varchar(50) NOT NULL,
  `emp_nationality` varchar(50) NOT NULL,
  `emp_religion` varchar(50) NOT NULL,
  `emp_placeOfBirth` varchar(100) NOT NULL,
  `emp_mobileNo` int(11) NOT NULL,
  `emp_telNo` int(11) NOT NULL,
  `emp_emailAdd` varchar(100) NOT NULL,
  `emp_educBg` varchar(100) NOT NULL,
  `emp_fathersName` varchar(255) NOT NULL,
  `emp_mothersName` varchar(255) NOT NULL,
  `emp_spouseName` varchar(255) NOT NULL,
  `emp_spouseBdate` date NOT NULL,
  `emp_height` varchar(50) NOT NULL,
  `emp_weight` varchar(50) NOT NULL,
  `emp_bloodType` varchar(10) NOT NULL,
  `emp_sssNo` varchar(50) NOT NULL,
  `emp_philNo` varchar(50) NOT NULL,
  `emp_hdmfNo` varchar(50) NOT NULL,
  `emp_tinNo` varchar(50) NOT NULL,
  `emp_atmNo` varchar(50) NOT NULL,
  `emp_deployed` varchar(50) NOT NULL,
  `emp_basic` float NOT NULL,
  `emp_rate` float NOT NULL,
  `emp_allowance` float NOT NULL,
  `emp_gross` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employeeinfo`
--

INSERT INTO `employeeinfo` (`emp_no`, `emp_fname`, `emp_mname`, `emp_lname`, `emp_suffix`, `emp_bday`, `emp_sex`, `emp_civilStatus`, `emp_nationality`, `emp_religion`, `emp_placeOfBirth`, `emp_mobileNo`, `emp_telNo`, `emp_emailAdd`, `emp_educBg`, `emp_fathersName`, `emp_mothersName`, `emp_spouseName`, `emp_spouseBdate`, `emp_height`, `emp_weight`, `emp_bloodType`, `emp_sssNo`, `emp_philNo`, `emp_hdmfNo`, `emp_tinNo`, `emp_atmNo`, `emp_deployed`, `emp_basic`, `emp_rate`, `emp_allowance`, `emp_gross`) VALUES
('bb', 'h', 'vhj', 'buj', '', '2020-02-13', '', '', '0', '0', '0', 0, 0, '', '', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, 0, 0, 0),
('emp123', 'juant', 'santos', 'dela cruz', '', '2020-02-03', '', '', '0', '0', '0', 0, 0, '', '', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, 0, 0, 0),
('emp2020123', 'Triscia', 'b', 'sss', '', '1990-02-04', '', '', '0', '0', '0', 0, 0, '', '', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, 0, 0, 0),
('emp2020124', 'maria', 'cruz', 'nicolas', '', '1990-08-11', '', '', '0', '0', '0', 0, 0, '', '', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `memo`
--

CREATE TABLE IF NOT EXISTS `memo` (
  `memo_no` int(11) NOT NULL,
  `emp_no` varchar(25) NOT NULL,
  `memo_date` date NOT NULL,
  `memo_details` text NOT NULL,
  `memo_from` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `servicerecord`
--

CREATE TABLE IF NOT EXISTS `servicerecord` (
  `serrec_no` int(11) NOT NULL,
  `emp_no` varchar(25) NOT NULL,
  `serrec_date` date NOT NULL,
  `serrec_position` varchar(255) NOT NULL,
  `serrec_info` text NOT NULL,
  `serrec_yrsOfService` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employeechildren`
--
ALTER TABLE `employeechildren`
  ADD PRIMARY KEY (`empChild_no`,`emp_no`), ADD KEY `fk_3` (`emp_no`);

--
-- Indexes for table `employeeinfo`
--
ALTER TABLE `employeeinfo`
  ADD PRIMARY KEY (`emp_no`);

--
-- Indexes for table `memo`
--
ALTER TABLE `memo`
  ADD PRIMARY KEY (`memo_no`,`emp_no`), ADD KEY `fk2_memo` (`emp_no`);

--
-- Indexes for table `servicerecord`
--
ALTER TABLE `servicerecord`
  ADD PRIMARY KEY (`serrec_no`,`emp_no`), ADD KEY `fk_serrec` (`emp_no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employeechildren`
--
ALTER TABLE `employeechildren`
  MODIFY `empChild_no` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `memo`
--
ALTER TABLE `memo`
  MODIFY `memo_no` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `servicerecord`
--
ALTER TABLE `servicerecord`
  MODIFY `serrec_no` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `employeechildren`
--
ALTER TABLE `employeechildren`
ADD CONSTRAINT `fk_3` FOREIGN KEY (`emp_no`) REFERENCES `employeeinfo` (`emp_no`) ON DELETE CASCADE;

--
-- Constraints for table `memo`
--
ALTER TABLE `memo`
ADD CONSTRAINT `fk2_memo` FOREIGN KEY (`emp_no`) REFERENCES `employeeinfo` (`emp_no`) ON DELETE CASCADE;

--
-- Constraints for table `servicerecord`
--
ALTER TABLE `servicerecord`
ADD CONSTRAINT `fk_serrec` FOREIGN KEY (`emp_no`) REFERENCES `employeeinfo` (`emp_no`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
