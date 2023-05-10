-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 10, 2023 at 07:41 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `online_voting_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `USERNAME` varchar(50) NOT NULL,
  `PASSWORD` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`USERNAME`, `PASSWORD`) VALUES
('Admin1', 'Aa123456'),
('Admin2', '5678');

-- --------------------------------------------------------

--
-- Table structure for table `candidate`
--

CREATE TABLE `candidate` (
  `CID` varchar(100) NOT NULL,
  `CNAME` varchar(100) NOT NULL,
  `ADDRESS` varchar(100) NOT NULL,
  `AGE` int(100) NOT NULL,
  `GENDER` varchar(100) NOT NULL,
  `PARTYNAME` varchar(100) NOT NULL,
  `VID` varchar(100) NOT NULL,
  `PASSWORD` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `candidate`
--

INSERT INTO `candidate` (`CID`, `CNAME`, `ADDRESS`, `AGE`, `GENDER`, `PARTYNAME`, `VID`, `PASSWORD`) VALUES
('C01', 'Mahesh', 'Kundapura', 25, 'Male', 'CONGRESS', 'V01', 'Aa123456'),
('C02', 'Jeevan', 'kundhapura', 82, 'MALE', 'BJP', 'V05', '1111'),
('C03', 'Deepak', 'mangaluru', 20, 'Female', 'AAP', 'V06', '9999\r\n'),
('C04', 'Sooraj', 'Sirsi', 20, 'Male', 'BJP', 'V04', '1234567'),
('C05', 'Vishvith', 'kerala', 20, 'Male', 'JDS', 'V03', '123456'),
('C06', 'Ram sai rao', 'Bengaluru', 20, 'Male', 'CPIM', 'V01', '12345');

--
-- Triggers `candidate`
--
DELIMITER $$
CREATE TRIGGER `Candidateage` BEFORE INSERT ON `candidate` FOR EACH ROW IF NEW.AGE < '25' THEN SIGNAL SQLSTATE '45000'
SET MESSAGE_TEXT = 'Age should be greater than 25';  
END IF
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `constituency`
--

CREATE TABLE `constituency` (
  `CO_ID` varchar(100) NOT NULL,
  `CO_NAME` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `constituency`
--

INSERT INTO `constituency` (`CO_ID`, `CO_NAME`) VALUES
('C001', 'BELGAVI'),
('C002', 'Kundapura'),
('C003', 'Mangaluru'),
('C004', 'BENGALURU'),
('C006', 'Mysore');

-- --------------------------------------------------------

--
-- Table structure for table `contests`
--

CREATE TABLE `contests` (
  `CID` varchar(100) NOT NULL,
  `EID` varchar(100) NOT NULL,
  `EDATE` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contests`
--

INSERT INTO `contests` (`CID`, `EID`, `EDATE`) VALUES
('C01', 'E01', '2023-01-02'),
('C01', 'E03', '0000-00-00'),
('C01', 'E04', '0000-00-00'),
('C03', 'E01', '0000-00-00'),
('C03', 'E04', '0000-00-00'),
('C04', 'E04', '0000-00-00'),
('C05', 'E04', '2025-01-14'),
('C06', 'E03', '2023-01-18');

-- --------------------------------------------------------

--
-- Table structure for table `election`
--

CREATE TABLE `election` (
  `EID` varchar(100) NOT NULL,
  `ENAME` varchar(100) NOT NULL,
  `CITY` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `election`
--

INSERT INTO `election` (`EID`, `ENAME`, `CITY`) VALUES
('E01', 'VIDHANASHABA', 'UDUPI'),
('E02', 'LOKASABHA', 'UDUPI'),
('E03', 'RAJYASABHA', 'kundapura'),
('E04', 'VIDHANASABHA', 'BENGALURU'),
('E06', 'Panchayath', 'SHIVMOGGA'),
('E07', 'LOKSABHA', 'MANIPAL');

-- --------------------------------------------------------

--
-- Table structure for table `heldfor`
--

CREATE TABLE `heldfor` (
  `CO_ID` varchar(100) NOT NULL,
  `EID` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `heldfor`
--

INSERT INTO `heldfor` (`CO_ID`, `EID`) VALUES
('C001', 'E01'),
('C001', 'E04'),
('C002', 'E01'),
('C003', 'E04'),
('C004', 'E02'),
('C004', 'E03'),
('C004', 'E04');

-- --------------------------------------------------------

--
-- Table structure for table `voter`
--

CREATE TABLE `voter` (
  `VID` varchar(100) NOT NULL,
  `VNAME` varchar(100) NOT NULL,
  `ADDRESS` varchar(100) NOT NULL,
  `AGE` int(100) NOT NULL,
  `GENDER` varchar(100) NOT NULL,
  `PASSWORD` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `voter`
--

INSERT INTO `voter` (`VID`, `VNAME`, `ADDRESS`, `AGE`, `GENDER`, `PASSWORD`) VALUES
('V01', 'Mahesh', 'Bengaluru', 30, 'Male', 'Aa123456'),
('V02', 'Yogish', 'kundhapura', 20, 'Male', '2222'),
('V03', 'Vishvith Shetty', 'Kerala kasaragod', 20, 'Male', '4444'),
('V04', 'Sooraj', 'Sirsi', 20, 'Male', '3333'),
('V05', 'Jeevan', 'Puttur', 21, 'Male', '1234'),
('V06', 'Deepak', 'Surathkal', 30, 'Female', '0000'),
('V07', 'Ram sai rao', 'Bengaluru', 25, 'Male', '5555'),
('V10', 'Harish', 'Udupi', 19, 'on', '1234'),
('V11', 'Avish', 'Bengaluru', 20, 'on', '1234'),
('V29', 'Harish', 'mangalru', 22, 'on', 'Aa123456');

--
-- Triggers `voter`
--
DELIMITER $$
CREATE TRIGGER `Voterage` BEFORE INSERT ON `voter` FOR EACH ROW IF NEW.AGE < '18' THEN SIGNAL SQLSTATE '45000'
SET MESSAGE_TEXT = 'Age should be greater than 18';  
END IF
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`USERNAME`);

--
-- Indexes for table `candidate`
--
ALTER TABLE `candidate`
  ADD PRIMARY KEY (`CID`),
  ADD KEY `VID` (`VID`);

--
-- Indexes for table `constituency`
--
ALTER TABLE `constituency`
  ADD PRIMARY KEY (`CO_ID`);

--
-- Indexes for table `contests`
--
ALTER TABLE `contests`
  ADD PRIMARY KEY (`CID`,`EID`),
  ADD KEY `EID` (`EID`);

--
-- Indexes for table `election`
--
ALTER TABLE `election`
  ADD PRIMARY KEY (`EID`);

--
-- Indexes for table `heldfor`
--
ALTER TABLE `heldfor`
  ADD PRIMARY KEY (`CO_ID`,`EID`),
  ADD KEY `EID` (`EID`);

--
-- Indexes for table `voter`
--
ALTER TABLE `voter`
  ADD PRIMARY KEY (`VID`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `candidate`
--
ALTER TABLE `candidate`
  ADD CONSTRAINT `candidate_ibfk_1` FOREIGN KEY (`VID`) REFERENCES `voter` (`VID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `contests`
--
ALTER TABLE `contests`
  ADD CONSTRAINT `contests_ibfk_1` FOREIGN KEY (`CID`) REFERENCES `candidate` (`CID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `contests_ibfk_2` FOREIGN KEY (`EID`) REFERENCES `election` (`EID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `heldfor`
--
ALTER TABLE `heldfor`
  ADD CONSTRAINT `heldfor_ibfk_1` FOREIGN KEY (`CO_ID`) REFERENCES `constituency` (`CO_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `heldfor_ibfk_2` FOREIGN KEY (`EID`) REFERENCES `election` (`EID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
