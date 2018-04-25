-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 30, 2018 at 06:19 AM
-- Server version: 5.6.38
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `ATM`
--

-- --------------------------------------------------------

--
-- Table structure for table `Courses`
--

CREATE TABLE `Courses` (
  `courseCode` int(10) UNSIGNED NOT NULL,
  `name` varchar(32) NOT NULL,
  `department` int(10) UNSIGNED NOT NULL,
  `instructor` int(10) UNSIGNED NOT NULL,
  `location` varchar(32) NOT NULL DEFAULT 'TBD',
  `semester` varchar(8) NOT NULL,
  `year` char(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Courses`
--

INSERT INTO `Courses` (`courseCode`, `name`, `department`, `instructor`, `location`, `semester`, `year`) VALUES
(89, 'Intro to Physical Chemistry', 1, 214, 'TBD', 'spring', '2017'),
(155, 'Algorithms', 3, 130, 'NAC7/105', 'fall', '2016'),
(156, 'Linear Algebra', 4, 234, 'NAC4/221', 'fall', '2016'),
(157, 'Database Systems', 3, 294, 'NAC4/225', 'spring', '2018'),
(159, 'Theoretical Computer Science', 3, 295, 'TBD', 'fall', '2018'),
(160, 'Discrete Math', 3, 295, 'TBD', 'fall', '2018'),
(161, 'Methods of Differential Equation', 4, 234, 'NAC6/108', 'fall', '2016');

-- --------------------------------------------------------

--
-- Table structure for table `Departments`
--

CREATE TABLE `Departments` (
  `departmentID` int(10) UNSIGNED NOT NULL,
  `name` varchar(32) NOT NULL,
  `email` varchar(32) NOT NULL,
  `phoneNumber` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Departments`
--

INSERT INTO `Departments` (`departmentID`, `name`, `email`, `phoneNumber`) VALUES
(1, 'Chemistry', 'chemistry@ccny.cuny.edu', '9646819113'),
(2, 'Theatre', 'theatre@ccny.cuny.edu', '4794260252'),
(3, 'Computer Science', 'cs@ccny.cuny.edu', '4675163809'),
(4, 'Mathematics', 'math@ccny.cuny.edu', '8321233423'),
(5, 'History', 'history@ccny.cuny.edu', '9281340293'),
(6, 'Anthropology', 'anthropology@ccny.cuny.edu', '6330090355'),
(9, 'Art', 'art@ccny.cuny.edu', '5572642087'),
(11, 'English', 'english@ccny.cuny.edu', '5940618670'),
(13, 'Music', 'music@ccny.cuny.edu', '9855799006'),
(15, 'Physics', 'physics@ccny.cuny.edu', '5289862833');

-- --------------------------------------------------------

--
-- Table structure for table `Enrollment`
--

CREATE TABLE `Enrollment` (
  `studentID` int(10) UNSIGNED NOT NULL,
  `courseCode` int(10) UNSIGNED NOT NULL,
  `grade` varchar(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Enrollment`
--

INSERT INTO `Enrollment` (`studentID`, `courseCode`, `grade`) VALUES
(1, 155, 'A'),
(1, 157, 'B+'),
(469, 155, 'B+'),
(469, 157, NULL),
(480, 89, 'A'),
(480, 157, NULL),
(483, 156, 'A+'),
(485, 89, 'C'),
(488, 157, NULL),
(492, 155, 'A+');

-- --------------------------------------------------------

--
-- Table structure for table `Instructors`
--

CREATE TABLE `Instructors` (
  `instructorID` int(10) UNSIGNED NOT NULL,
  `firstName` varchar(32) NOT NULL,
  `lastName` varchar(32) NOT NULL,
  `department` int(10) UNSIGNED NOT NULL,
  `email` varchar(32) NOT NULL,
  `phoneNumber` char(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Instructors`
--

INSERT INTO `Instructors` (`instructorID`, `firstName`, `lastName`, `department`, `email`, `phoneNumber`) VALUES
(128, 'roger', 'evans', 5, 'revans@ccny.cuny.edu', NULL),
(129, 'ana', 'lopez', 2, 'alopez@ccny.cuny.edu', '5542673464'),
(130, 'omar', 'cross', 3, 'ocross@ccny.cuny.edu', '5911052324'),
(214, 'anita', 'barber', 1, 'abarber@ccny.cuny.edu', NULL),
(234, 'alton', 'roberson', 4, 'aroberson@ccny.cuny.edu', NULL),
(264, 'myra', 'ortega', 1, 'mortega@ccny.cuny.edu', '6482037975'),
(265, 'randal', 'hanson', 3, 'rhanson@ccny.cuny.edu', '2931299165'),
(266, 'myra', 'hanson', 5, 'mhanson@ccny.cuny.edu', '3143121866'),
(267, 'julius', 'day', 5, 'jday@ccny.cuny.edu', '9845644739'),
(268, 'toby', 'ortega', 3, 'tortega@ccny.cuny.edu', '1536726761'),
(269, 'toby', 'wilson', 1, 'twilson@ccny.cuny.edu', '5585090175'),
(270, 'myra', 'nelson', 2, 'mnelson@ccny.cuny.edu', '3837612686'),
(271, 'myra', 'wilson', 3, 'mwilson@ccny.cuny.edu', '7683010466'),
(272, 'scott', 'nelson', 3, 'snelson@ccny.cuny.edu', '6298790542'),
(273, 'toby', 'nelson', 2, 'tnelson@ccny.cuny.edu', '1081969126'),
(294, 'john', 'connor', 3, 'jconnor@ccny.cuny.edu', NULL),
(295, 'leonid', 'gurvits', 3, 'lgurvits@ccny.cuny.edu', '3476935301'),
(296, 'akira', 'kawaguchi', 3, 'akawaguchi@ccny.cuny.edu', ''),
(297, 'berry', 'damon', 9, 'bdamon@ccny.cuny.edu', '6668978494');

-- --------------------------------------------------------

--
-- Table structure for table `Students`
--

CREATE TABLE `Students` (
  `studentID` int(10) UNSIGNED NOT NULL,
  `firstName` varchar(32) NOT NULL,
  `lastName` varchar(32) NOT NULL,
  `GPA` decimal(3,2) UNSIGNED NOT NULL DEFAULT '0.00',
  `email` varchar(32) NOT NULL,
  `phoneNumber` char(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Students`
--

INSERT INTO `Students` (`studentID`, `firstName`, `lastName`, `GPA`, `email`, `phoneNumber`) VALUES
(1, 'matthew', 'jacome', '3.33', 'matthew@email.com', NULL),
(469, 'tobias', 'he', '3.01', 'tobias@email.com', '3784421262'),
(480, 'andrew', 'gabriel', '3.20', 'agabriel@email.com', '4728346163'),
(481, 'barry', 'cross', '2.09', 'bcross@email.com', '8385812513'),
(482, 'christian', 'cross', '2.68', 'ccross@email.com', '7600278165'),
(483, 'april', 'holt', '3.69', 'aholt@email.com', '4835414782'),
(484, 'max', 'cross', '3.37', 'mcross@email.com', '9348182869'),
(485, 'barry', 'cole', '2.91', 'bcole@email.com', '2440531113'),
(486, 'ana', 'lloyd', '3.21', 'alloyd@email.com', '2935183100'),
(487, 'ana', 'harper', '3.62', 'aharper@email.com', '1894679819'),
(488, 'ana', 'cross', '3.56', 'across@email.com', '4869304433'),
(489, 'barry', 'hawkins', '3.99', 'bhawkins@email.com', '4532809070'),
(490, 'michael', 'cole', '2.12', 'mcole@email.com', '1145917096'),
(491, 'percy', 'moss', '0.00', 'pmoss@email.com', NULL),
(492, 'edwin', 'flores', '4.00', 'eflores@email.com', NULL),
(493, 'noel', 'sosa', '0.00', 'nsosa@ccny.cuny.edu', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Courses`
--
ALTER TABLE `Courses`
  ADD PRIMARY KEY (`courseCode`),
  ADD KEY `department` (`department`),
  ADD KEY `instructor` (`instructor`);

--
-- Indexes for table `Departments`
--
ALTER TABLE `Departments`
  ADD PRIMARY KEY (`departmentID`),
  ADD UNIQUE KEY `name` (`name`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `phoneNumber` (`phoneNumber`);

--
-- Indexes for table `Enrollment`
--
ALTER TABLE `Enrollment`
  ADD PRIMARY KEY (`studentID`,`courseCode`),
  ADD KEY `courseCode` (`courseCode`);

--
-- Indexes for table `Instructors`
--
ALTER TABLE `Instructors`
  ADD PRIMARY KEY (`instructorID`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `department` (`department`);

--
-- Indexes for table `Students`
--
ALTER TABLE `Students`
  ADD PRIMARY KEY (`studentID`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Courses`
--
ALTER TABLE `Courses`
  MODIFY `courseCode` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=162;

--
-- AUTO_INCREMENT for table `Departments`
--
ALTER TABLE `Departments`
  MODIFY `departmentID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `Instructors`
--
ALTER TABLE `Instructors`
  MODIFY `instructorID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=298;

--
-- AUTO_INCREMENT for table `Students`
--
ALTER TABLE `Students`
  MODIFY `studentID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=494;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Courses`
--
ALTER TABLE `Courses`
  ADD CONSTRAINT `Courses_ibfk_1` FOREIGN KEY (`department`) REFERENCES `Departments` (`departmentID`),
  ADD CONSTRAINT `Courses_ibfk_2` FOREIGN KEY (`instructor`) REFERENCES `Instructors` (`instructorID`);

--
-- Constraints for table `Enrollment`
--
ALTER TABLE `Enrollment`
  ADD CONSTRAINT `Enrollment_ibfk_1` FOREIGN KEY (`studentID`) REFERENCES `Students` (`studentID`),
  ADD CONSTRAINT `Enrollment_ibfk_2` FOREIGN KEY (`courseCode`) REFERENCES `Courses` (`courseCode`);

--
-- Constraints for table `Instructors`
--
ALTER TABLE `Instructors`
  ADD CONSTRAINT `Instructors_ibfk_1` FOREIGN KEY (`department`) REFERENCES `Departments` (`departmentID`);
