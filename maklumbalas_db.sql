-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 07, 2018 at 02:42 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.0.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `maklumbalas_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `contactID` int(11) NOT NULL,
  `name` varchar(80) NOT NULL,
  `email` varchar(80) NOT NULL,
  `subject` text NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customerID` varchar(12) NOT NULL,
  `custName` varchar(50) NOT NULL,
  `custGender` text NOT NULL,
  `custDOB` varchar(10) NOT NULL,
  `custAddress` varchar(100) NOT NULL,
  `custNO` varchar(12) NOT NULL,
  `custEmail` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customerID`, `custName`, `custGender`, `custDOB`, `custAddress`, `custNO`, `custEmail`) VALUES
('123456789012', 'alif', 'Lelaki', '12-02-1888', 'KT', '1234567890', 'alif@gmail.com'),
('961211115274', 'NORSHAKIRAH BINTI ABDULLAH', 'Perempuan', '11-12-1996', '2625 KAMPUNG SEBERANG TUAN CHIK HAJI', '0199034935', 'norshakirahabdullah96@gmail.com'),
('971211115274', 'miraa', 'Perempuan', '11-12-1997', 'KT', '0105332526', 'mira@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `feedback_id` int(12) NOT NULL,
  `customerID` varchar(12) NOT NULL,
  `quest1` enum('Mendapatkan bahan penerbitan','Muat turun dokumen','Mendapatkan maklumat untuk kajian','Mendapatkan maklumat perhubungan') NOT NULL,
  `quest2` enum('YA','TIDAK') NOT NULL,
  `quest3` enum('YA','TIDAK','TIDAK BERKENAAN') NOT NULL,
  `quest4` enum('1 Sangat Tidak Memuaskan','2 Tidak Memuaskan','3 Sederhana','4 Memuaskan','5 Sangat Memuaskan') NOT NULL,
  `quest5` enum('1 Sangat Tidak Memuaskan','2 Tidak Memuaskan','3 Sederhana','4 Memuaskan','5 Sangat Memuaskan') NOT NULL,
  `quest6` enum('1 Sangat Tidak Memuaskan','2 Tidak Memuaskan','3 Sederhana','4 Memuaskan','5 Sangat Memuaskan') NOT NULL,
  `quest7` text NOT NULL,
  `quest8` text NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`feedback_id`, `customerID`, `quest1`, `quest2`, `quest3`, `quest4`, `quest5`, `quest6`, `quest7`, `quest8`, `date`) VALUES
(10, '961211115274', 'Mendapatkan maklumat perhubungan', 'YA', 'YA', '5 Sangat Memuaskan', '4 Memuaskan', '5 Sangat Memuaskan', 'Tiada sebarang cadangan buat masa ini.', 'norshakirahabdullah96@gmail.com', '2018-10-24 11:47:07'),
(12, '971211115274', 'Mendapatkan bahan penerbitan', 'TIDAK', 'TIDAK BERKENAAN', '4 Memuaskan', '4 Memuaskan', '1 Sangat Tidak Memuaskan', 'tiada sebarang cadangan buat masa ini.', 'mira@gmail.com', '2018-11-01 15:09:33'),
(13, '123456789012', 'Mendapatkan bahan penerbitan', 'YA', 'TIDAK', '3 Sederhana', '4 Memuaskan', '3 Sederhana', 'tiada', 'alif@gmail.com', '2018-11-01 15:15:28');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` enum('Administrator','Customer','','') NOT NULL,
  `ID` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `password`, `level`, `ID`) VALUES
('alif', '123456', 'Customer', '123456789012'),
('mira', '123456', 'Customer', '971211115274'),
('norshakirah', '123456', 'Customer', '961211115274'),
('shahir', '123456', 'Administrator', '961223045285');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`contactID`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customerID`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`feedback_id`),
  ADD UNIQUE KEY `customerID` (`customerID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `contactID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `feedback_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `feedback_ibfk_1` FOREIGN KEY (`customerID`) REFERENCES `customer` (`customerID`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
