-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 20, 2021 at 09:03 AM
-- Server version: 5.7.29-log
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `exammanagementsystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) DEFAULT NULL,
  `username` varchar(20) DEFAULT NULL,
  `password` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(2, 'UserLogin', 'User@123'),
(1, 'ShubhadaLabde', 'Shubhada#123');

-- --------------------------------------------------------

--
-- Table structure for table `external_faculty`
--

CREATE TABLE `external_faculty` (
  `EID` bigint(20) NOT NULL,
  `EName` varchar(30) NOT NULL,
  `Experience` tinyint(4) DEFAULT NULL,
  `college` varchar(30) NOT NULL,
  `phone` mediumtext NOT NULL,
  `email` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `external_faculty`
--

INSERT INTO `external_faculty` (`EID`, `EName`, `Experience`, `college`, `phone`, `email`) VALUES
(53, 'Hardik', 5, 'KJSIEIT', '7045137353', 'd.pithadiya@saomaiya.edu'),
(56, 'Akshay Sharma', 5, 'Viva', '7585858585', 'akshay@gmail.com'),
(58, 'Vivek', 5, 'Viva', '7045137353', 'vivek@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `FID` bigint(20) NOT NULL,
  `FName` varchar(15) NOT NULL,
  `FLName` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`FID`, `FName`, `FLName`) VALUES
(2020, 'Divyesh', 'Pithadiya'),
(2121, 'Hardik', 'Patel');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `image_text` text,
  `image` varchar(100) DEFAULT NULL,
  `uploadDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `image_text`, `image`, `uploadDate`) VALUES
(4, 'PFA', 'StaticRouting1.JPG', '2021-01-02'),
(8, 'Experiment 2', 'Experiment6_Output.JPG', '2021-01-16'),
(9, 'StaticRouting', 'Staticrouting2.JPG', '2021-01-16');

-- --------------------------------------------------------

--
-- Table structure for table `labs`
--

CREATE TABLE `labs` (
  `labID` int(11) NOT NULL,
  `labname` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `labs`
--

INSERT INTO `labs` (`labID`, `labname`) VALUES
(301, 'DBMS Lab'),
(302, 'Operating System'),
(303, 'TCS'),
(304, 'Microprocessor');

-- --------------------------------------------------------

--
-- Table structure for table `lab_exam`
--

CREATE TABLE `lab_exam` (
  `ExID` bigint(20) NOT NULL,
  `ExType` varchar(15) NOT NULL,
  `LabNo` varchar(20) DEFAULT NULL,
  `Sub` varchar(30) NOT NULL,
  `Sem` int(11) NOT NULL,
  `FID` bigint(20) NOT NULL,
  `EID` bigint(20) NOT NULL,
  `date3` date DEFAULT NULL,
  `date4` date DEFAULT NULL,
  `date1` date DEFAULT NULL,
  `date2` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lab_exam`
--

INSERT INTO `lab_exam` (`ExID`, `ExType`, `LabNo`, `Sub`, `Sem`, `FID`, `EID`, `date3`, `date4`, `date1`, `date2`) VALUES
(1, 'Oral Exam', '302', 'KJCS5', 3, 2020, 58, '2021-01-04', '2021-01-06', '2021-01-02', '2021-01-03');

-- --------------------------------------------------------

--
-- Table structure for table `semester`
--

CREATE TABLE `semester` (
  `SemID` int(11) NOT NULL,
  `SemName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `semester`
--

INSERT INTO `semester` (`SemID`, `SemName`) VALUES
(3, 'Computer Engineering-Semester 3'),
(4, 'Computer Engineering-Semester 4'),
(5, 'Computer Engineering-Semester 5'),
(6, 'Computer Engineering-Semester 6'),
(7, 'Computer Engineering-Semester 7'),
(8, 'Computer Engineering-Semester 8');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `SuID` varchar(30) NOT NULL,
  `Sub` varchar(30) NOT NULL,
  `Sem` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`SuID`, `Sub`, `Sem`) VALUES
('KJCS10', 'Software Engineering', 4),
('KJCS11', 'Data Science', 4),
('KJCS12', 'EVS', 3),
('KJCS2', 'Communication', 3),
('KJCS4', 'PBL', 3),
('KJCS5', 'Maths', 3),
('KJCS7', 'TCS', 3),
('KJCS8', 'Machine Learning', 4),
('KJCS9', 'Artificial Intelligence ', 4),
('KJCSA/KJCSB/KJCSC', 'AA/OS/DB', 5);

-- --------------------------------------------------------

--
-- Table structure for table `ut_tt`
--

CREATE TABLE `ut_tt` (
  `UID` bigint(20) NOT NULL,
  `UTDate` date NOT NULL,
  `Sub` varchar(30) NOT NULL,
  `UTime` time NOT NULL,
  `Sem` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ut_tt`
--

INSERT INTO `ut_tt` (`UID`, `UTDate`, `Sub`, `UTime`, `Sem`) VALUES
(1, '2021-01-12', 'KJCS7', '01:41:00', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `external_faculty`
--
ALTER TABLE `external_faculty`
  ADD PRIMARY KEY (`EID`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`FID`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `labs`
--
ALTER TABLE `labs`
  ADD PRIMARY KEY (`labID`);

--
-- Indexes for table `lab_exam`
--
ALTER TABLE `lab_exam`
  ADD PRIMARY KEY (`ExID`),
  ADD KEY `sub_Lab` (`Sub`),
  ADD KEY `fac_Lab` (`FID`),
  ADD KEY `sem_Lab` (`Sem`),
  ADD KEY `External_Lab` (`EID`);

--
-- Indexes for table `semester`
--
ALTER TABLE `semester`
  ADD PRIMARY KEY (`SemID`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`SuID`),
  ADD KEY `sem_sub` (`Sem`);

--
-- Indexes for table `ut_tt`
--
ALTER TABLE `ut_tt`
  ADD PRIMARY KEY (`UID`),
  ADD KEY `Sub_UTTT` (`Sub`),
  ADD KEY `Sem_UTTT` (`Sem`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `external_faculty`
--
ALTER TABLE `external_faculty`
  MODIFY `EID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `lab_exam`
--
ALTER TABLE `lab_exam`
  MODIFY `ExID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ut_tt`
--
ALTER TABLE `ut_tt`
  MODIFY `UID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `lab_exam`
--
ALTER TABLE `lab_exam`
  ADD CONSTRAINT `External_Lab` FOREIGN KEY (`EID`) REFERENCES `external_faculty` (`EID`) ON DELETE CASCADE,
  ADD CONSTRAINT `fac_Lab` FOREIGN KEY (`FID`) REFERENCES `faculty` (`FID`) ON DELETE CASCADE,
  ADD CONSTRAINT `sem_Lab` FOREIGN KEY (`Sem`) REFERENCES `semester` (`SemID`) ON DELETE CASCADE,
  ADD CONSTRAINT `sub_Lab` FOREIGN KEY (`Sub`) REFERENCES `subjects` (`SuID`) ON DELETE CASCADE;

--
-- Constraints for table `subjects`
--
ALTER TABLE `subjects`
  ADD CONSTRAINT `sem_sub` FOREIGN KEY (`Sem`) REFERENCES `semester` (`SemID`);

--
-- Constraints for table `ut_tt`
--
ALTER TABLE `ut_tt`
  ADD CONSTRAINT `Sem_UTTT` FOREIGN KEY (`Sem`) REFERENCES `semester` (`SemID`) ON DELETE CASCADE,
  ADD CONSTRAINT `Sub_UTTT` FOREIGN KEY (`Sub`) REFERENCES `subjects` (`SuID`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
