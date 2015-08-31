-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 01, 2014 at 10:06 AM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `loop`
--

-- --------------------------------------------------------

--
-- Table structure for table `le`
--

CREATE TABLE IF NOT EXISTS `le` (
`ID` int(255) NOT NULL,
  `name` varchar(100) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL,
  `downloads` int(20) NOT NULL DEFAULT '0',
  `dateUploaded` date NOT NULL,
  `filepath` varchar(600) NOT NULL,
  `rating` int(1) NOT NULL DEFAULT '1',
  `comments` varchar(100) NOT NULL,
  `uploadedBy` varchar(100) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '0',
  `rev` varchar(100) NOT NULL,
  `type` varchar(20) NOT NULL DEFAULT 'LE'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `le`
--

INSERT INTO `le` (`ID`, `name`, `subject`, `description`, `downloads`, `dateUploaded`, `filepath`, `rating`, `comments`, `uploadedBy`, `status`, `rev`, `type`) VALUES
(8, 'TestLEUpload1', 'recon', 'test', 0, '2014-09-24', 'LE/94306_recon_TestLEUpload1.zip', 5, 'Promotion', 'dev1', 1, 'admin', 'LE'),
(20, 'inc5Le', 'testing', 'woooo', 0, '2014-10-01', 'LE/94226_testing_inc5Le.zip', 1, '', 'dev1', 0, '', 'LE');

-- --------------------------------------------------------

--
-- Table structure for table `lo`
--

CREATE TABLE IF NOT EXISTS `lo` (
`ID` int(255) NOT NULL,
  `name` varchar(100) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL,
  `downloads` int(20) NOT NULL DEFAULT '0',
  `dateUploaded` date NOT NULL,
  `filepath` varchar(600) NOT NULL,
  `rating` int(1) NOT NULL DEFAULT '1',
  `comments` varchar(100) NOT NULL,
  `uploadedBy` varchar(100) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '0',
  `rev` varchar(100) NOT NULL,
  `type` varchar(20) NOT NULL DEFAULT 'LO'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=144 ;

--
-- Dumping data for table `lo`
--

INSERT INTO `lo` (`ID`, `name`, `subject`, `description`, `downloads`, `dateUploaded`, `filepath`, `rating`, `comments`, `uploadedBy`, `status`, `rev`, `type`) VALUES
(138, 'TestLOUpload', 'version3', 'yahoooo', 0, '2014-09-24', 'LO/38963_version3_TestLOUpload.zip', 5, 'Promotion', 'dev1', 1, 'admin', 'LO'),
(143, 'inc5', 'fortesting', 'google', 0, '2014-10-01', 'LO/48500_fortesting_inc5.zip', 1, '', 'dev1', 0, '', 'LO');

-- --------------------------------------------------------

--
-- Table structure for table `oldle`
--

CREATE TABLE IF NOT EXISTS `oldle` (
`ID` int(255) NOT NULL,
  `name` varchar(100) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL,
  `downloads` int(11) NOT NULL,
  `dateUploaded` date NOT NULL,
  `filepath` varchar(600) NOT NULL,
  `rating` int(1) NOT NULL DEFAULT '1',
  `comments` varchar(100) NOT NULL,
  `uploadedBy` varchar(100) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '0',
  `rev` varchar(100) NOT NULL,
  `type` varchar(20) NOT NULL DEFAULT 'LE'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `oldle`
--

INSERT INTO `oldle` (`ID`, `name`, `subject`, `description`, `downloads`, `dateUploaded`, `filepath`, `rating`, `comments`, `uploadedBy`, `status`, `rev`, `type`) VALUES
(5, 'TestLEUpload1', '789465', '987asd', 0, '2014-09-24', 'LE/68750_789465_TestLEUpload1.zip', 2, 'major reconstruction', 'dev1', 1, 'rev1', 'LE'),
(13, 'inc5Le', 'testing', 'woooo', 0, '2014-09-24', 'LE/35700_testing_inc5Le.zip', 2, 'change', 'dev1', 1, 'rev1', 'LE');

-- --------------------------------------------------------

--
-- Table structure for table `oldlo`
--

CREATE TABLE IF NOT EXISTS `oldlo` (
`ID` int(255) NOT NULL,
  `name` varchar(100) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL,
  `downloads` int(11) NOT NULL,
  `dateUploaded` date NOT NULL,
  `filepath` varchar(600) NOT NULL,
  `rating` int(1) NOT NULL DEFAULT '1',
  `comments` varchar(100) NOT NULL,
  `uploadedBy` varchar(100) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '0',
  `rev` varchar(100) NOT NULL,
  `type` varchar(20) NOT NULL DEFAULT 'LO'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=39 ;

--
-- Dumping data for table `oldlo`
--

INSERT INTO `oldlo` (`ID`, `name`, `subject`, `description`, `downloads`, `dateUploaded`, `filepath`, `rating`, `comments`, `uploadedBy`, `status`, `rev`, `type`) VALUES
(32, 'TestLOUpload', '121122', '1011', 0, '2014-09-24', 'LO/68307_121122_TestLOUpload.zip', 3, 'need review', 'dev1', 1, 'rev1', 'LO'),
(33, 'TestLOUpload', 'Version2', 'here', 0, '2014-09-24', 'LO/53818_Version2_TestLOUpload.zip', 3, 'again!', 'dev1', 1, 'rev1', 'LO'),
(38, 'inc5', 'fortesting', 'justtesting', 0, '2014-09-24', 'LO/61027_fortesting_inc5.zip', 2, 'need revision', 'dev1', 1, 'rev1', 'LO');

-- --------------------------------------------------------

--
-- Table structure for table `siteuser`
--

CREATE TABLE IF NOT EXISTS `siteuser` (
`userID` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `userType` varchar(30) NOT NULL,
  `blocked` int(1) NOT NULL DEFAULT '0',
  `lastlogin` date NOT NULL,
  `lastactivity` date NOT NULL,
  `accept` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `siteuser`
--

INSERT INTO `siteuser` (`userID`, `username`, `password`, `email`, `userType`, `blocked`, `lastlogin`, `lastactivity`, `accept`) VALUES
(1, 'admin', 'admin', 'admin@admin.com', '', 0, '0000-00-00', '2014-09-24', 1),
(2, 'dev1', 'developer', 'sano', 'developer', 0, '2014-10-01', '2014-10-01', 1),
(5, 'rev1', 'reviewer', 'rev1@loop.com', 'reviewer', 0, '2014-10-01', '2014-10-01', 1),
(6, 'dev2', 'gwapoko', 'dev2@loop.com', 'developer', 0, '2014-09-11', '2014-09-24', 1),
(7, 'rev2', 'gwapoko', 'rev2@gmail.com', 'reviewer', 0, '2014-09-01', '2014-09-24', 1),
(8, 'developer', 'doms123', 'developer123@yahoo.com', 'developer', 0, '2014-03-20', '2014-09-24', 1),
(9, 'dominic', 'dominic123', 'dj_senseinapoem@yahoo.com', 'developer', 1, '2011-09-02', '2014-09-24', 0),
(11, 'domsrev', 'domsrev123', 'dj_senseinapoem@yahoo.com', 'reviewer', 0, '2013-10-11', '2014-09-24', 0),
(12, 'developerJed', 'gwapoko', 'gwapolgeka@gmail.com', 'developer', 0, '2014-03-20', '2014-09-24', 1),
(13, 'reviewerJed', 'gwapoko', 'morillojed@gmail.com', 'reviewer', 0, '2013-10-02', '2014-09-24', 0),
(14, 'server', 'server1', 'test@gmail.com', 'developer', 0, '0000-00-00', '2014-09-24', 0),
(17, 'aven123', 'aven123', 'aven@gmail.com', 'reviewer', 0, '2014-03-20', '2014-09-24', 1),
(18, 'servertest', 'servertest', 'servertest@gmail.com', 'developer', 0, '0000-00-00', '2014-09-24', 0),
(19, 'anothertest', 'anothertest', 'anothertest@gmail.com', 'developer', 0, '0000-00-00', '2014-09-24', 1),
(20, 'revtest', 'revtest', 'revtest@gmail.com', 'reviewer', 0, '0000-00-00', '2014-09-24', 0),
(21, 'alfred', 'alfred', 'alfred@gmail.com', 'developer', 0, '0000-00-00', '2014-09-24', 0),
(22, 'reviewerven', 'reven', 'reviewerven@gmail.com', 'reviewer', 0, '0000-00-00', '2014-09-24', 1),
(23, 'huhubells', 'huhubells', 'huhubells@gmail.com', 'developer', 0, '0000-00-00', '2014-09-24', 1),
(24, 'faculty', 'faculty123', 'hotter@gmail.com', 'developer', 0, '2014-03-20', '2014-09-24', 1),
(25, 'faculty2', 'faculty2', 'faculty2@gmail.com', 'developer', 0, '0000-00-00', '2014-09-24', 0),
(26, 'krizitbatignawng', '123456', 'krizitbatignawng@yahoo.com', 'reviewer', 0, '2014-10-01', '0000-00-00', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `le`
--
ALTER TABLE `le`
 ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `lo`
--
ALTER TABLE `lo`
 ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `oldle`
--
ALTER TABLE `oldle`
 ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `oldlo`
--
ALTER TABLE `oldlo`
 ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `siteuser`
--
ALTER TABLE `siteuser`
 ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `le`
--
ALTER TABLE `le`
MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `lo`
--
ALTER TABLE `lo`
MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=144;
--
-- AUTO_INCREMENT for table `oldle`
--
ALTER TABLE `oldle`
MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `oldlo`
--
ALTER TABLE `oldlo`
MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT for table `siteuser`
--
ALTER TABLE `siteuser`
MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=27;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
