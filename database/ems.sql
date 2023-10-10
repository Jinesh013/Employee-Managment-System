-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 09, 2023 at 09:17 AM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ems`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int NOT NULL AUTO_INCREMENT,
  `AdminName` varchar(30) NOT NULL,
  `AdminUsername` varchar(30) NOT NULL,
  `Password` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `AdminName`, `AdminUsername`, `Password`) VALUES
(1, ' Parekh Jinesh', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `branchmaster`
--

DROP TABLE IF EXISTS `branchmaster`;
CREATE TABLE IF NOT EXISTS `branchmaster` (
  `id` int NOT NULL AUTO_INCREMENT,
  `CompanyCode` varchar(30) NOT NULL,
  `BranchName` varchar(30) NOT NULL,
  `BranchCode` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `branchmaster`
--

INSERT INTO `branchmaster` (`id`, `CompanyCode`, `BranchName`, `BranchCode`) VALUES
(1, '101', 'innova Systems Ahmedabad', '201'),
(2, '102', 'Sparks Foundation Ahmedabad', '202'),
(3, '102', 'Sparks Foundation vadodara', '203'),
(4, '103', 'HN Techno bombay', '204'),
(5, '103', 'HN Techno Delhi', '205'),
(6, '103', 'HN Techno Ahmedabad ', '206'),
(7, '104', 'Praxinfo surat', '207'),
(8, '104', 'Praxinfo Gandhinagar ', '208'),
(9, '105', 'NVIDIA USA', '209'),
(10, '105', 'NVIDIA UK', '210');

-- --------------------------------------------------------

--
-- Table structure for table `companymaster`
--

DROP TABLE IF EXISTS `companymaster`;
CREATE TABLE IF NOT EXISTS `companymaster` (
  `com_id` int NOT NULL AUTO_INCREMENT,
  `CompanyCode` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `ComapnyName` varchar(30) NOT NULL,
  PRIMARY KEY (`com_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `companymaster`
--

INSERT INTO `companymaster` (`com_id`, `CompanyCode`, `ComapnyName`) VALUES
(1, '101', 'Innova System'),
(2, '102', 'Sparks Foundation'),
(3, '103', 'HN Techno'),
(4, '104', 'Praxinfo'),
(5, '105', 'NVIDIA');

-- --------------------------------------------------------

--
-- Table structure for table `departmentmaster`
--

DROP TABLE IF EXISTS `departmentmaster`;
CREATE TABLE IF NOT EXISTS `departmentmaster` (
  `id` int NOT NULL AUTO_INCREMENT,
  `BranchCode` varchar(30) NOT NULL,
  `DeptCode` varchar(30) NOT NULL,
  `DeptName` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `departmentmaster`
--

INSERT INTO `departmentmaster` (`id`, `BranchCode`, `DeptCode`, `DeptName`) VALUES
(1, '201', '301', 'IT Department'),
(2, '201', '302', 'Marketing Department'),
(3, '201', '303', 'HR Department'),
(4, '202', '304', 'Marketing Department'),
(5, '203', '305', 'Operations Department'),
(6, '203', '306', 'Finance Department'),
(7, '204', '307', 'IT Department'),
(8, '204', '308', 'Operations Department'),
(9, '205', '309', 'Operations Department'),
(10, '205', '310', 'Finance Department'),
(11, '205', '311', 'HR Department'),
(12, '206', '312', 'IT Department'),
(13, '206', '313', 'Sales Department'),
(14, '207', '314', 'IT Department'),
(15, '207', '315', 'Marketing Department'),
(16, '207', '316', 'Finance Department'),
(17, '208', '317', 'IT Department'),
(18, '208', '318', 'Operations Department'),
(19, '208', '319', 'Finance Department'),
(20, '209', '320', 'Finance Department'),
(21, '209', '321', 'Marketing Department'),
(22, '210', '322', 'IT Department'),
(23, '210', '323', 'Marketing Department'),
(24, '210', '324', 'Finance Department'),
(25, '210', '325', 'HR Department');

-- --------------------------------------------------------

--
-- Table structure for table `designation`
--

DROP TABLE IF EXISTS `designation`;
CREATE TABLE IF NOT EXISTS `designation` (
  `id` int NOT NULL AUTO_INCREMENT,
  `DeptCode` varchar(30) NOT NULL,
  `DesignationCode` varchar(30) NOT NULL,
  `DesignationName` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=67 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `designation`
--

INSERT INTO `designation` (`id`, `DeptCode`, `DesignationCode`, `DesignationName`) VALUES
(1, '301', '401', 'Software Developer'),
(2, '301', '402', 'Junior Software Developer'),
(3, '301', '403', 'Intern Software Developer'),
(4, '302', '404', 'Junior Employee'),
(5, '302', '405', 'intern employee'),
(6, '303', '406', 'A1'),
(7, '303', '407', 'B1'),
(8, '304', '408', 'A2'),
(9, '304', '409', 'B2'),
(10, '304', '410', 'C2'),
(11, '305', '411', 'A3'),
(12, '305', '412', 'B3'),
(13, '306', '413', 'A4'),
(14, '306', '414', 'B4'),
(15, '306', '415', 'C4'),
(16, '306', '416', 'D4'),
(17, '307', '417', 'A5'),
(18, '307', '418', 'B5'),
(19, '308', '419', 'A6'),
(20, '308', '420', 'B6'),
(21, '308', '421', 'C6'),
(22, '309', '422', 'A7'),
(23, '309', '423', 'B7'),
(24, '310', '424', 'A8'),
(25, '310', '425', 'B8'),
(26, '311', '426', 'A9'),
(27, '311', '427', 'B9'),
(28, '311', '428', 'C9'),
(29, '312', '429', 'A10'),
(30, '312', '430', 'B10'),
(31, '313', '431', 'A11'),
(32, '313', '432', 'B11'),
(33, '314', '433', 'A12'),
(34, '314', '434', 'B12'),
(35, '314', '435', 'C12'),
(36, '314', '436', 'D12'),
(37, '315', '437', 'A13'),
(38, '315', '438', 'B13'),
(39, '316', '439', 'A14'),
(40, '316', '440', 'B14'),
(41, '317', '441', 'A15'),
(42, '317', '442', 'B15'),
(43, '317', '443', 'C15'),
(44, '318', '444', 'A16'),
(45, '318', '445', 'B16'),
(46, '319', '446', 'A17'),
(47, '319', '447', 'B17'),
(48, '319', '448', 'C17'),
(49, '320', '449', 'A18'),
(50, '320', '450', 'B18'),
(51, '320', '451', 'C18'),
(52, '320', '452', 'D18'),
(53, '321', '453', 'A19'),
(54, '321', '454', 'B19'),
(55, '322', '455', 'A20'),
(56, '322', '456', 'B20'),
(57, '322', '457', 'C20'),
(58, '322', '458', 'D20'),
(59, '323', '459', 'A21'),
(60, '323', '460', 'B21'),
(61, '324', '461', 'A22'),
(62, '324', '462', 'B22'),
(63, '324', '463', 'C22'),
(64, '324', '464', 'D22'),
(65, '325', '465', 'A23'),
(66, '325', '466', 'B23');

-- --------------------------------------------------------

--
-- Table structure for table `employeemaster`
--

DROP TABLE IF EXISTS `employeemaster`;
CREATE TABLE IF NOT EXISTS `employeemaster` (
  `id` int NOT NULL AUTO_INCREMENT,
  `active` varchar(30) NOT NULL DEFAULT 'Active',
  `EmpFname` varchar(30) NOT NULL,
  `EmpLname` varchar(30) NOT NULL,
  `EmpComid` varchar(30) NOT NULL,
  `EmpDesignationId` varchar(30) NOT NULL,
  `EmpDeptId` varchar(30) NOT NULL,
  `EmpBranchId` varchar(30) NOT NULL,
  `CourseGRA` varchar(30) NOT NULL,
  `CollegeGRA` varchar(30) NOT NULL,
  `YearPassingGRA` varchar(30) NOT NULL,
  `PercentageGRA` varchar(30) NOT NULL,
  `EmpEmail` varchar(30) NOT NULL,
  `EmpComMail` varchar(30) NOT NULL,
  `EmpMobileno` varchar(30) NOT NULL,
  `EmpGender` varchar(30) NOT NULL,
  `EmpCountry` varchar(30) NOT NULL,
  `EmpState` varchar(30) NOT NULL,
  `EmpCity` varchar(30) NOT NULL,
  `EmpDOB` date NOT NULL,
  `EmpJoingdate` date NOT NULL,
  `EmpAddress` text NOT NULL,
  `EmpPermanentAddress` text NOT NULL,
  `EmpAdharno` varchar(30) NOT NULL,
  `EmpPanno` varchar(30) NOT NULL,
  `EmpUsername` varchar(30) NOT NULL,
  `EmpPassword` varchar(30) NOT NULL,
  `create_datetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `employeemaster`
--

INSERT INTO `employeemaster` (`id`, `active`, `EmpFname`, `EmpLname`, `EmpComid`, `EmpDesignationId`, `EmpDeptId`, `EmpBranchId`, `CourseGRA`, `CollegeGRA`, `YearPassingGRA`, `PercentageGRA`, `EmpEmail`, `EmpComMail`, `EmpMobileno`, `EmpGender`, `EmpCountry`, `EmpState`, `EmpCity`, `EmpDOB`, `EmpJoingdate`, `EmpAddress`, `EmpPermanentAddress`, `EmpAdharno`, `EmpPanno`, `EmpUsername`, `EmpPassword`, `create_datetime`) VALUES
(1, 'Active', 'Jinesh', 'Parekh', '101', '401', '301', '201', 'b.tech', 'charusat', '2025', '8.9', 'jineshparekh013@gmail.com', 'jineshparekh013@gmail.com', '9726161071', 'Male', 'India', 'gujarat', 'anand', '2003-10-04', '2023-06-01', 'anand', 'anand', '12314567990', '784uyt1241sf', '21cs037', '037', '2023-05-22 05:35:10'),
(2, 'Active', 'Dhruv', 'Patel', '101', '405', '302', '201', 'B.B.A', 'charusat', '2024', '9.7', 'dhruv@gmail.com', 'dhruv@gmail.com', '9426561839', 'Male', 'india', 'Gujarat', 'Anand', '2003-01-20', '2023-05-02', 'anand', 'anand', '12314567991', '12455ghj', '21cs041', '041', '2023-05-22 05:53:43'),
(3, 'Active', 'Shreya', 'Patel', '102', '408', '304', '202', 'b.com', 'M.B.Patel', '2023', '8.8', 'shreya@gmail.com', 'shreya@gmail.com', '9265379574', 'Female', 'INDIA', 'Gujarat', 'Anand', '2002-07-18', '2023-04-01', 'anand', 'anand', '12314567990', '874210FGH65', '21cs102', '102', '2023-05-22 05:55:55'),
(4, 'Active', 'devarsh', 'Patel', '102', '411', '305', '203', 'b.tech', 'charusat', '2021', '9.1', 'devarsh@gmail.com', 'devarsh@gmail.com', '8799355819', 'Male', 'India', 'Gujarat', 'Anand', '2003-12-03', '2023-05-02', 'Ahmedabad', 'Ahmedabad', '12314567990', '784uyt', '21cs101', '101', '2023-05-22 05:58:26'),
(5, 'Active', 'Deep', 'Garasiya', '103', '417', '307', '204', 'B.B.A', 'Knowledge', '2024', '8.9', 'deep@gmail.com', 'deep@gmail.com', '9328131847', 'Male', 'India', 'Gujarat', 'Anand', '2003-07-24', '2023-05-01', 'Anand', 'Anand', '45781659547', '874210FGH65', '21cs103', '103', '2023-05-22 06:08:09'),
(6, 'Active', 'Vraj', 'Patel', '103', '430', '312', '206', 'b.tech', 'M.B.Patel', '2025', '7.45', 'vraj@gmail.com', 'vraj@gmail.com', '9054152090', 'Male', 'India', 'Gujarat', 'Anand', '2003-04-06', '2023-03-01', 'Anand', 'Anand', '12314567990', 'xdb6541346', '21cs100', '100', '2023-05-22 06:11:48'),
(7, 'Active', 'Hemil', 'Patel', '104', '435', '314', '207', 'b.tech', 'Charusat', '2023', '8.8', 'hemil@gmail.com', 'hemil@gmail.com', '7434971650', 'Male', 'India', 'Gujarat', 'Anand', '2023-01-01', '2023-05-01', 'Vadodara', 'Vadodara', '1232448852', '784uyxv54445', '21cs044', '044', '2023-05-22 06:15:28'),
(8, 'Active', 'Jeel', 'patel', '104', '441', '317', '208', 'b.tech', 'Charusat', '2024', '7.8', 'jeel@gmail.com', 'jeel@gmail.com', '9328840924', 'Male', 'India', 'Gujarat', 'Anand', '2003-03-27', '2023-05-17', 'Anand', 'Anand', '12314567990', 'xdb6541346', '21cs045', '045', '2023-05-22 06:23:52'),
(9, 'Active', 'Sakshi', 'bhatt', '105', '465', '325', '210', 'b.tech', 'GCET', '2025', '7.4', 'sakshi@gmail.com', 'sakshi@gmail.com', '9537725919', 'Female', 'India', 'Gujarat', 'Vadodara', '2003-12-27', '2023-05-02', 'Vadodara', 'Vadodara', '45781659547', 'xdb6541346', '21cs104', '104', '2023-05-22 06:28:21'),
(10, 'Active', 'Gaurang      ', 'Sisodia', '105', '454', '321', '209', 'b.tech', 'A.D.I.T', '2025', '7.4', 'gaurang@gmail.com', 'gaurang@gmail.com', '9106487737', 'Male', 'India', 'Gujarat', 'Anand', '2003-01-22', '2023-05-01', 'Anand', 'Anand', '12314567991', 'xdb6541346', '21cs105', '105', '2023-05-23 10:31:58'),
(11, 'Active', 'Samarth', 'Pandya', '103', '429', '312', '206', 'b.tech', 'CSPIT', '2025', '9.8', 'samarth@gmail.com', 'samarth@gmail.com', '9925221332', 'Male', 'India', 'Gujarat', 'Vadodara', '2023-05-02', '2023-05-01', 'Vadodara, Gujarat', 'Vadodara, Gujarat', '12314567991', '12455ghj', '21cs036', '036', '2023-06-08 04:32:30'),
(12, 'Active', 'Aryan', 'Patel', '102', '408', '304', '202', 'b.tech', 'CSPIT', '2025', '8.82', 'aryan@gmail.com', 'aryan@gmail.com', '1234567890', 'Male', 'India', 'Gujarat', 'Nadiad', '2023-05-02', '2023-06-01', 'Nadiad, Gujarat', 'Nadiad, Gujarat', '12314567990', 'xdb6541346', '21cs038', '038', '2023-06-08 06:16:31');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

DROP TABLE IF EXISTS `events`;
CREATE TABLE IF NOT EXISTS `events` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci,
  `location` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `date` date NOT NULL,
  `time_from` time NOT NULL,
  `time_to` time NOT NULL,
  `google_calendar_event_id` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=98 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `title`, `description`, `location`, `date`, `time_from`, `time_to`, `google_calendar_event_id`, `created`) VALUES
(75, 'Loss of Pay', '21cs105 has leave on 2023-05-31 To 2023-06-30 For hello', 'Innova System', '2023-05-31', '09:30:00', '10:30:00', 'mhbgm1p01oetbu2b7sp6t543as', '2023-05-31 17:51:13'),
(76, 'Casual Leave', '21cs037 has leave on 2023-06-01 To 2023-06-02 For for vacation', 'Innova System', '2023-06-01', '09:30:00', '10:30:00', 'bjd43jn8l7nngoannkisrkms5k', '2023-05-31 17:53:53'),
(77, 'Maternity Leave', '21cs101 has leave on 2023-06-01 To 2023-06-03 For hi', 'Innova System', '2023-06-01', '09:30:00', '10:30:00', 'vp6635jb99v2haog3cbi45sg04', '2023-05-31 18:18:53'),
(78, 'Maternity Leave', '21cs041 Dhruv   has leave on 2023-06-05 To 2023-06-06 For hi', 'Innova System', '2023-06-05', '09:30:00', '10:30:00', '17l3trbldpmje8oa523ajijn9c', '2023-06-06 14:20:03'),
(79, 'Casual Leave', '21cs037 Jinesh   has leave on 2023-06-05 To 2023-06-07 For hi', 'Innova System', '2023-06-05', '09:30:00', '10:30:00', 'g525qcd8qhcm5gt230cuq0flek', '2023-06-06 14:20:15'),
(80, 'Casual Leave', '21cs037 Jinesh   has leave on 2023-05-30 To 2023-05-31 For for vacation', 'Innova System', '2023-05-30', '09:30:00', '10:30:00', '1fqkvcs197bcefmc7agup24trs', '2023-06-06 14:59:38'),
(81, 'Casual Leave', '21cs045 Jeel has leave on 2023-06-01 To 2023-06-02 For for vacation', 'Innova System', '2023-06-01', '09:30:00', '10:30:00', NULL, '2023-06-07 12:41:56'),
(82, 'Privilege Leave', '21cs045 Jeel has leave on 2023-06-12 To 2023-06-14 For for personal reasons', 'Innova System', '2023-06-12', '09:30:00', '10:30:00', NULL, '2023-06-07 15:17:03'),
(83, 'Paternity Leave', '21cs044 Hemil  has leave on 2023-06-08 To 2023-06-15 For hello', 'Innova System', '2023-06-08', '09:30:00', '10:30:00', 'hgom4q04n5g9ce0gh1f2c4e7a8', '2023-06-07 15:17:37'),
(84, 'Privilege Leave', '21cs103 Deep    has leave on 2023-06-04 To 2023-06-18 For test', 'Innova System', '2023-06-04', '09:30:00', '10:30:00', '7uonjoppdug8ie81m81a7n9suk', '2023-06-08 11:33:26'),
(85, 'Marriage Leave', '21cs102 Shreya    has leave on 2023-06-01 To 2023-06-08 For For My Marrige', 'Innova System', '2023-06-01', '09:30:00', '10:30:00', NULL, '2023-06-08 11:33:51'),
(86, 'Employee test', 'Description test', 'Ahmedabad', '2023-06-09', '16:13:00', '17:13:00', 'uptu2i7ganaomumjfe4a6i9gbg', '2023-06-08 15:13:31'),
(87, 'Privilege Leave', '21cs036 Samarth has leave on 2023-06-08 To 2023-06-09 For rtn', 'Innova System', '2023-06-08', '09:30:00', '10:30:00', 'qk0dhr9c02cs75c1p68rm5bgns', '2023-06-08 15:14:28'),
(88, 'title test', 'description test', 'Ahmedabad ', '2023-06-09', '17:27:00', '18:27:00', '7c4b8f5gudsfu2t6592p9ikga0', '2023-06-08 15:27:12'),
(89, 'test', 'description', 'Ahmedabad ', '2023-06-09', '16:43:00', '17:43:00', '7iq912rp1q6uqbt9rvevoou4vs', '2023-06-08 15:43:39'),
(90, 'Privilege Leave', '21cs036 Samarth has leave on 2023-06-08 To 2023-06-09 For For My Marrige', 'Innova System', '2023-06-08', '09:30:00', '10:30:00', 'o326sn6p1ekg0nkofgpp0huo98', '2023-06-08 15:44:33'),
(91, 'Sick Leave', '21cs036 Samarth has leave on 2023-06-09 To 2023-06-10 For I have a fever', 'Innova System', '2023-06-09', '09:30:00', '10:30:00', 'vtb95336dvatm545bgn88bbnog', '2023-06-08 15:44:51'),
(92, 'Privilege Leave', '21cs045 Jeel has leave on 2023-06-12 To 2023-06-14 For for personal reasons', 'Innova System', '2023-06-12', '09:30:00', '10:30:00', '53nvoj44io8gu103vc768nek74', '2023-06-08 15:45:01'),
(93, 'Sick Leave', '21cs102 Shreya    has leave on 2023-06-09 To 2023-06-10 For For My Marrige', 'Innova System', '2023-06-09', '09:30:00', '10:30:00', 'cko5tt3na9giurk3uo28vfk9t0', '2023-06-08 15:55:11'),
(94, 'Maternity Leave', '21cs041 Dhruv has leave on 2023-06-05 To 2023-06-06 For hi', 'Innova System', '2023-06-05', '09:30:00', '10:30:00', 'v4ti69bnb1ccf6fscir89bhq9o', '2023-06-08 16:56:25'),
(95, 'Maternity Leave', '21cs101 devarsh    has leave on 2023-06-01 To 2023-06-03 For hi', 'Innova System', '2023-06-01', '09:30:00', '10:30:00', NULL, '2023-06-08 17:01:23'),
(96, 'Privilege Leave', '21cs103 Deep has leave on 2023-06-04 To 2023-06-18 For test', 'Innova System', '2023-06-04', '09:30:00', '10:30:00', '6tvbu81acbmbdt64p9rvgjd2ss', '2023-06-09 13:58:03'),
(97, 'Maternity Leave', '21cs103 Deep has leave on 2023-06-02 To 2023-06-04 For for  fun', 'Innova System', '2023-06-02', '09:30:00', '10:30:00', 'kc0d52ns44qlrulpfisoq2pcek', '2023-06-09 14:41:53');

-- --------------------------------------------------------

--
-- Table structure for table `leavetable`
--

DROP TABLE IF EXISTS `leavetable`;
CREATE TABLE IF NOT EXISTS `leavetable` (
  `id` int NOT NULL AUTO_INCREMENT,
  `LeaveStatus` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT 'Pending',
  `LeaveRejectResons` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `EmpUsername` varchar(30) NOT NULL,
  `LeaveType` varchar(30) NOT NULL,
  `LeaveResons` text NOT NULL,
  `LeaveFrom` date NOT NULL,
  `LeaveTo` date NOT NULL,
  `LeaveDays` varchar(30) NOT NULL,
  `TimeFrom` time NOT NULL DEFAULT '09:30:00',
  `TimeTo` time NOT NULL DEFAULT '10:30:00',
  `create_datetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=244 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `leavetable`
--

INSERT INTO `leavetable` (`id`, `LeaveStatus`, `LeaveRejectResons`, `EmpUsername`, `LeaveType`, `LeaveResons`, `LeaveFrom`, `LeaveTo`, `LeaveDays`, `TimeFrom`, `TimeTo`, `create_datetime`) VALUES
(1, 'Reject', 'today is meeting so no leave', '21cs037', 'Casual Leave', 'for vacation', '2023-05-30', '2023-05-31', '1', '09:30:00', '10:30:00', '2023-05-23 07:06:15'),
(2, 'Pending', NULL, '21cs045', 'Casual Leave', 'for vacation', '2023-06-01', '2023-06-02', '1', '09:30:00', '10:30:00', '2023-05-24 05:45:40'),
(3, 'Pending', NULL, '21cs037', 'Privilege Leave', '1', '2023-06-02', '2023-06-03', '1', '09:30:00', '10:30:00', '2023-05-24 05:52:34'),
(4, 'Pending', NULL, '21cs037', 'Casual Leave', '2', '2023-06-03', '2023-06-04', '1', '09:30:00', '10:30:00', '2023-05-24 05:52:45'),
(5, 'Reject', 'no Leave today ', '21cs037', 'Sick Leave', '3', '2023-06-04', '2023-06-05', '1', '09:30:00', '10:30:00', '2023-05-24 05:52:55'),
(6, 'Accept', NULL, '21cs041', 'Maternity Leave', 'hi', '2023-06-05', '2023-06-06', '1', '09:30:00', '10:30:00', '2023-05-30 07:06:50'),
(7, 'Accept', NULL, '21cs041', 'Maternity Leave', 'hi', '2023-06-06', '2023-06-07', '1', '09:30:00', '10:30:00', '2023-05-30 07:08:34'),
(8, 'Pending', NULL, '21cs102', 'Marriage Leave', 'For My Marrige', '2023-06-01', '2023-06-08', '7', '09:30:00', '10:30:00', '2023-05-30 10:08:16'),
(9, 'Reject', 'Today is meeting so no leave today', '21cs101', 'Sick Leave', 'because of viral flue', '2023-05-31', '2023-06-02', '3', '09:30:00', '10:30:00', '2023-05-30 10:12:44'),
(10, 'Accept', NULL, '21cs103', 'Maternity Leave', 'for  fun', '2023-06-02', '2023-06-04', '2', '09:30:00', '10:30:00', '2023-05-30 10:14:16'),
(11, 'Accept', NULL, '21cs103', 'Privilege Leave', 'test', '2023-06-04', '2023-06-18', '14', '09:30:00', '10:30:00', '2023-05-30 10:14:46'),
(12, 'Accept', NULL, '21cs044', 'Paternity Leave', 'hello', '2023-06-08', '2023-06-15', '7', '09:30:00', '10:30:00', '2023-05-30 10:15:34'),
(13, 'Reject', 'test', '21cs104', 'Marriage Leave', 'my marrige', '2023-06-09', '2023-06-23', '14', '09:30:00', '10:30:00', '2023-05-30 10:16:19'),
(14, 'Accept', NULL, '21cs105', 'Loss of Pay', 'hello', '2023-05-31', '2023-06-30', '30', '09:30:00', '10:30:00', '2023-05-30 10:17:03'),
(15, 'Accept', NULL, '21cs101', 'Maternity Leave', 'hi', '2023-06-01', '2023-06-03', '2', '09:30:00', '10:30:00', '2023-05-31 12:48:36'),
(16, 'Accept', NULL, '21cs037', 'Casual Leave', 'hi', '2023-06-05', '2023-06-07', '2', '09:30:00', '10:30:00', '2023-06-02 04:45:50'),
(17, 'Reject', 'Today is meeting so anyone hav', '21cs104', 'Sick Leave', 'because of viral flue', '2023-06-08', '2023-06-09', '1', '09:30:00', '10:30:00', '2023-06-02 04:50:58'),
(18, 'Reject', 'hello', '21cs045', 'Sick Leave', 'viral flue', '2023-06-07', '2023-06-09', '2', '09:30:00', '10:30:00', '2023-06-06 10:57:47'),
(19, 'Reject', 'today is meeting', '21cs041', 'Marriage Leave', 'cousins marrige', '2023-06-15', '2023-06-22', '7', '09:30:00', '10:30:00', '2023-06-07 06:40:53'),
(20, 'Accept', NULL, '21cs045', 'Privilege Leave', 'for personal reasons', '2023-06-12', '2023-06-14', '2', '09:30:00', '10:30:00', '2023-06-07 08:47:51'),
(21, 'Accept', NULL, '21cs036', 'Sick Leave', 'I have a fever', '2023-06-09', '2023-06-10', '1', '09:30:00', '10:30:00', '2023-06-08 08:53:05'),
(22, 'Accept', NULL, '21cs036', 'Privilege Leave', 'For My Marrige', '2023-06-08', '2023-06-09', '1', '09:30:00', '10:30:00', '2023-06-08 08:57:28'),
(23, 'Accept', NULL, '21cs036', 'Privilege Leave', 'rtn', '2023-06-08', '2023-06-09', '1', '09:30:00', '10:30:00', '2023-06-08 09:07:55'),
(24, 'Accept', NULL, '21cs102', 'Sick Leave', 'For My Marrige', '2023-06-09', '2023-06-10', '1', '09:30:00', '10:30:00', '2023-06-08 10:24:59'),
(26, 'Reject', 'test', '21cs102', 'Privilege Leave', 'test', '2023-06-10', '2023-06-17', '7', '09:30:00', '10:30:00', '2023-06-08 10:39:43'),
(27, 'Reject', 'Today is meeting so everyone have to come on the meeting', '21cs102', 'Marriage Leave', 'for my Cousins marriage', '2023-06-12', '2023-06-16', '4', '09:30:00', '10:30:00', '2023-06-08 10:41:02');

-- --------------------------------------------------------

--
-- Table structure for table `leavetype`
--

DROP TABLE IF EXISTS `leavetype`;
CREATE TABLE IF NOT EXISTS `leavetype` (
  `id` int NOT NULL AUTO_INCREMENT,
  `LeaveName` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `leavetype`
--

INSERT INTO `leavetype` (`id`, `LeaveName`) VALUES
(1, 'Privilege Leave'),
(2, 'Casual Leave'),
(3, 'Sick Leave'),
(4, 'Maternity Leave'),
(5, 'Compensatory Off'),
(6, 'Marriage Leave'),
(7, 'Paternity Leave');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
