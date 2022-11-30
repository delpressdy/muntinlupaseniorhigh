-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 30, 2022 at 06:07 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `resultgrading`
--

-- --------------------------------------------------------

--
-- Table structure for table `announcement`
--

CREATE TABLE `announcement` (
  `id` int(100) NOT NULL,
  `img` varchar(255) NOT NULL,
  `title` varchar(100) NOT NULL,
  `details` longtext NOT NULL,
  `dateWhen` date NOT NULL,
  `dateAdded` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `announcement`
--

INSERT INTO `announcement` (`id`, `img`, `title`, `details`, `dateWhen`, `dateAdded`) VALUES
(12, 'exam.png', 'Examination', 'In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available.', '2022-12-01', 'Nov-29-2022'),
(15, 'HS-Intrams-2019-02.jpg', 'Intramurals', 'Teamwork make the dream work!', '2022-12-21', 'Nov-29-2022');

-- --------------------------------------------------------

--
-- Table structure for table `enrolled`
--

CREATE TABLE `enrolled` (
  `id` int(20) NOT NULL,
  `name` varchar(100) NOT NULL,
  `studid` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `gradeLevel` varchar(100) NOT NULL,
  `sy` varchar(100) NOT NULL,
  `enrollDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `enrolled`
--

INSERT INTO `enrolled` (`id`, `name`, `studid`, `status`, `gradeLevel`, `sy`, `enrollDate`) VALUES
(1, 'Delpressdy Maglinte', '441622818', 'New Student', '1', '2022/2023', '2022-11-19'),
(2, 'Roniel Bansas', '191818722', 'New Student', '1', '2022/2023', '2022-11-20');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id` int(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `form` varchar(100) NOT NULL,
  `message` varchar(100) NOT NULL,
  `purpose` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `mess` varchar(255) NOT NULL,
  `dateRequest` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id`, `name`, `form`, `message`, `purpose`, `status`, `mess`, `dateRequest`) VALUES
(2, 'Roniel Bansas', 'Form-137A', 'I need this!', 'Employment', 'Rejected', 'No Records Found!', '2022-11-28'),
(3, 'Delpressdy Maglinte', 'Form-138', 'I need this!', 'Employment', 'Approved', 'Processed', '2022-11-28'),
(6, 'Delpressdy Maglinte', 'Scholarship Records', 'Sample', 'Documentation', 'Approved', '', '2022-11-30'),
(7, 'Delpressdy Maglinte', 'Enrollment Records', 'For documentation..', 'Documentation', 'Processing', '', '2022-12-01');

-- --------------------------------------------------------

--
-- Table structure for table `studentres`
--

CREATE TABLE `studentres` (
  `id` int(100) NOT NULL,
  `idnumber` varchar(100) NOT NULL,
  `gradelvl` varchar(100) NOT NULL,
  `semester` varchar(100) NOT NULL,
  `quarter` int(10) NOT NULL,
  `sy` varchar(100) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `unit` int(100) NOT NULL,
  `score` int(100) NOT NULL,
  `dateAdded` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `studentres`
--

INSERT INTO `studentres` (`id`, `idnumber`, `gradelvl`, `semester`, `quarter`, `sy`, `subject`, `unit`, `score`, `dateAdded`) VALUES
(11, '441622818', 'Grade 11', '2', 1, '1', 'Art Appreciation', 3, 85, '2022-11-30'),
(12, '441622818', 'Grade 11', '2', 1, '1', 'Computer Programming 2', 2, 86, '2022-11-30'),
(13, '441622818', 'Grade 11', '2', 1, '1', 'Discrete Mathematics', 3, 89, '2022-11-30'),
(14, '441622818', 'Grade 11', '2', 1, '1', 'Mathematics in the Modern World', 3, 83, '2022-11-30'),
(15, '441622818', 'Grade 11', '2', 1, '1', 'National Service Training Program', 3, 86, '2022-11-30'),
(16, '441622818', 'Grade 11', '2', 1, '1', 'Purposive Communication', 3, 88, '2022-11-30'),
(17, '441622818', 'Grade 11', '2', 1, '1', 'Rhythmic Activities', 3, 84, '2022-11-30'),
(18, '441622818', 'Grade 11', '2', 2, '1', 'Art Appreciation', 3, 85, '2022-11-30'),
(19, '441622818', 'Grade 11', '2', 2, '1', 'Computer Programming 2', 2, 75, '2022-11-30'),
(20, '441622818', 'Grade 11', '2', 2, '1', 'Discrete Mathematics', 3, 77, '2022-11-30'),
(21, '441622818', 'Grade 11', '2', 2, '1', 'Mathematics in the Modern World', 3, 73, '2022-11-30'),
(22, '441622818', 'Grade 11', '2', 2, '1', 'National Service Training Program', 3, 73, '2022-11-30'),
(23, '441622818', 'Grade 11', '2', 2, '1', 'Purposive Communication', 3, 74, '2022-11-30'),
(24, '441622818', 'Grade 11', '2', 2, '1', 'Rhythmic Activities', 3, 81, '2022-11-30'),
(25, '441622818', 'Grade 11', '2', 3, '1', 'Art Appreciation', 3, 91, '2022-11-30'),
(26, '441622818', 'Grade 11', '2', 3, '1', 'Computer Programming 2', 2, 93, '2022-11-30'),
(27, '441622818', 'Grade 11', '2', 3, '1', 'Discrete Mathematics', 3, 95, '2022-11-30'),
(28, '441622818', 'Grade 11', '2', 3, '1', 'Mathematics in the Modern World', 3, 95, '2022-11-30'),
(29, '441622818', 'Grade 11', '2', 3, '1', 'National Service Training Program', 3, 91, '2022-11-30'),
(30, '441622818', 'Grade 11', '2', 3, '1', 'Purposive Communication', 3, 90, '2022-11-30'),
(31, '441622818', 'Grade 11', '2', 3, '1', 'Rhythmic Activities', 3, 86, '2022-11-30'),
(32, '441622818', 'Grade 11', '1', 1, '1', 'Computer Programming 1', 2, 75, '2022-11-30'),
(33, '441622818', 'Grade 11', '1', 1, '1', 'Gender and Society', 3, 74, '2022-11-30'),
(34, '441622818', 'Grade 11', '1', 1, '1', 'Introduction to Computing', 2, 74, '2022-11-30'),
(35, '441622818', 'Grade 11', '1', 1, '1', 'National Service Training Program 1', 3, 76, '2022-11-30'),
(36, '441622818', 'Grade 11', '1', 1, '1', 'Physical Fitness', 2, 75, '2022-11-30'),
(37, '441622818', 'Grade 11', '1', 1, '1', 'Readings in Philippine History', 3, 81, '2022-11-30'),
(38, '441622818', 'Grade 11', '1', 1, '1', 'Science Technology and Society', 3, 81, '2022-11-30'),
(39, '441622818', 'Grade 11', '1', 1, '1', 'Understanding the Self', 3, 80, '2022-11-30'),
(40, '441622818', 'Grade 11', '1', 2, '1', 'Computer Programming 1', 2, 85, '2022-11-30'),
(41, '441622818', 'Grade 11', '1', 2, '1', 'Gender and Society', 3, 85, '2022-11-30'),
(42, '441622818', 'Grade 11', '1', 2, '1', 'Introduction to Computing', 2, 88, '2022-11-30'),
(43, '441622818', 'Grade 11', '1', 2, '1', 'National Service Training Program 1', 3, 84, '2022-11-30'),
(44, '441622818', 'Grade 11', '1', 2, '1', 'Physical Fitness', 2, 86, '2022-11-30'),
(45, '441622818', 'Grade 11', '1', 2, '1', 'Readings in Philippine History', 3, 84, '2022-11-30'),
(46, '441622818', 'Grade 11', '1', 2, '1', 'Science Technology and Society', 3, 83, '2022-11-30'),
(47, '441622818', 'Grade 11', '1', 2, '1', 'Understanding the Self', 3, 89, '2022-11-30'),
(48, '441622818', 'Grade 11', '1', 3, '1', 'Computer Programming 1', 2, 90, '2022-11-30'),
(49, '441622818', 'Grade 11', '1', 3, '1', 'Gender and Society', 3, 85, '2022-11-30'),
(50, '441622818', 'Grade 11', '1', 3, '1', 'Introduction to Computing', 2, 98, '2022-11-30'),
(51, '441622818', 'Grade 11', '1', 3, '1', 'National Service Training Program 1', 3, 94, '2022-11-30'),
(52, '441622818', 'Grade 11', '1', 3, '1', 'Physical Fitness', 2, 93, '2022-11-30'),
(53, '441622818', 'Grade 11', '1', 3, '1', 'Readings in Philippine History', 3, 95, '2022-11-30'),
(54, '441622818', 'Grade 11', '1', 3, '1', 'Science Technology and Society', 3, 90, '2022-11-30'),
(55, '441622818', 'Grade 11', '1', 3, '1', 'Understanding the Self', 3, 91, '2022-11-30');

-- --------------------------------------------------------

--
-- Table structure for table `studentsub`
--

CREATE TABLE `studentsub` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `unit` int(100) NOT NULL,
  `teacher` varchar(100) NOT NULL,
  `grade` varchar(100) NOT NULL,
  `semester` varchar(100) NOT NULL,
  `dateAdded` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `studentsub`
--

INSERT INTO `studentsub` (`id`, `name`, `subject`, `unit`, `teacher`, `grade`, `semester`, `dateAdded`) VALUES
(26, 'Delpressdy Maglinte', 'Art Appreciation', 3, 'Chadwick Booseman', 'Grade 11', '2', '2022-11-30'),
(27, 'Delpressdy Maglinte', 'Computer Programming 2', 2, 'Jason Statham', 'Grade 11', '2', '2022-11-30'),
(28, 'Delpressdy Maglinte', 'Discrete Mathematics', 3, 'Jason Statham', 'Grade 11', '2', '2022-11-30'),
(29, 'Delpressdy Maglinte', 'Mathematics in the Modern World', 3, 'Chadwick Booseman', 'Grade 11', '2', '2022-11-30'),
(30, 'Delpressdy Maglinte', 'National Service Training Program', 3, 'Peter  Parker', 'Grade 11', '2', '2022-11-30'),
(31, 'Delpressdy Maglinte', 'Purposive Communication', 3, 'Steve Rogers', 'Grade 11', '2', '2022-11-30'),
(32, 'Delpressdy Maglinte', 'Rhythmic Activities', 3, 'Peter  Parker', 'Grade 11', '2', '2022-11-30'),
(34, 'Delpressdy Maglinte', 'Ethics', 3, 'Peter  Parker', 'Grade 11', '2', '2022-11-30'),
(35, 'Delpressdy Maglinte', 'Computer Programming 1', 2, 'Chadwick Booseman', 'Grade 11', '1', '2022-11-30'),
(36, 'Delpressdy Maglinte', 'Gender and Society', 3, 'Steve Rogers', 'Grade 11', '1', '2022-11-30'),
(37, 'Delpressdy Maglinte', 'Introduction to Computing', 2, 'Jason Statham', 'Grade 11', '1', '2022-11-30'),
(38, 'Delpressdy Maglinte', 'National Service Training Program 1', 3, 'Jason Statham', 'Grade 11', '1', '2022-11-30'),
(39, 'Delpressdy Maglinte', 'Physical Fitness', 2, 'Peter  Parker', 'Grade 11', '1', '2022-11-30'),
(40, 'Delpressdy Maglinte', 'Readings in Philippine History', 3, 'Chadwick Booseman', 'Grade 11', '1', '2022-11-30'),
(41, 'Delpressdy Maglinte', 'Science Technology and Society', 3, 'Peter  Parker', 'Grade 11', '1', '2022-11-30'),
(42, 'Delpressdy Maglinte', 'Understanding the Self', 3, 'Steve Rogers', 'Grade 11', '1', '2022-11-30'),
(43, 'Roniel Bansas', 'Computer Programming 1', 2, 'Chadwick Booseman', 'Grade 11', '1', '2022-11-30'),
(44, 'Roniel Bansas', 'Gender and Society', 3, 'Steve Rogers', 'Grade 11', '1', '2022-11-30'),
(45, 'Roniel Bansas', 'Introduction to Computing', 2, 'Jason Statham', 'Grade 11', '1', '2022-11-30'),
(46, 'Roniel Bansas', 'National Service Training Program 1', 3, 'Jason Statham', 'Grade 11', '1', '2022-11-30'),
(47, 'Roniel Bansas', 'Physical Fitness', 2, 'Peter  Parker', 'Grade 11', '1', '2022-11-30'),
(48, 'Roniel Bansas', 'Readings in Philippine History', 3, 'Chadwick Booseman', 'Grade 11', '1', '2022-11-30'),
(49, 'Roniel Bansas', 'Science Technology and Society', 3, 'Peter  Parker', 'Grade 11', '1', '2022-11-30'),
(50, 'Roniel Bansas', 'Understanding the Self', 3, 'Steve Rogers', 'Grade 11', '1', '2022-11-30');

-- --------------------------------------------------------

--
-- Table structure for table `tbladmin`
--

CREATE TABLE `tbladmin` (
  `Id` int(20) NOT NULL,
  `firstName` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `otherName` varchar(255) NOT NULL,
  `emailAddress` varchar(255) NOT NULL,
  `phoneNo` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `staffId` varchar(255) NOT NULL,
  `adminTypeId` int(20) NOT NULL,
  `isAssigned` int(10) NOT NULL,
  `isPasswordChanged` int(10) NOT NULL,
  `dateCreated` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbladmin`
--

INSERT INTO `tbladmin` (`Id`, `firstName`, `lastName`, `otherName`, `emailAddress`, `phoneNo`, `password`, `staffId`, `adminTypeId`, `isAssigned`, `isPasswordChanged`, `dateCreated`) VALUES
(1, 'CJ', 'Trinidad', 'Admin', 'admin@mail.com', '7777777777', '123', 'Admin', 1, 1, 0, ''),
(7, 'Chadwick', 'Booseman', 'Wakanda', 'sample@gmail.com', '1235634123', '123', 'Chad', 2, 1, 0, '2022-11-16'),
(8, 'Jason', 'Statham', 'Transporter', 'js@mail.com', '0988465113', '123', 'Jason', 2, 1, 0, '2022-11-16'),
(9, 'Steve', 'Rogers', 'Cpt. America', 'cptamerica@mail.com', '09465656548', '123', 'cptamerica', 2, 1, 0, '2022-11-30'),
(10, 'Peter ', 'Parker', 'Spiderman', 'pparker@mail.com', '0658989465', '123', 'spiderman', 2, 1, 0, '2022-11-30');

-- --------------------------------------------------------

--
-- Table structure for table `tbladmintype`
--

CREATE TABLE `tbladmintype` (
  `Id` int(20) NOT NULL,
  `adminTypeName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbladmintype`
--

INSERT INTO `tbladmintype` (`Id`, `adminTypeName`) VALUES
(1, 'Super Administrator'),
(2, 'Administrator');

-- --------------------------------------------------------

--
-- Table structure for table `tblassignedadmin`
--

CREATE TABLE `tblassignedadmin` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `dateAssigned` varchar(200) NOT NULL,
  `staffId` varchar(100) NOT NULL,
  `facultyId` int(11) NOT NULL,
  `departmentId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblassignedadmin`
--

INSERT INTO `tblassignedadmin` (`id`, `name`, `dateAssigned`, `staffId`, `facultyId`, `departmentId`) VALUES
(5, 'Chadwick', '2022-11-16', 'Chad', 1, 1),
(6, 'Jason', '2022-11-16', 'Jason', 2, 2),
(7, 'Steve', '2022-11-30', 'cptamerica', 1, 1),
(8, 'Peter ', '2022-11-30', 'spiderman', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblcgparesult`
--

CREATE TABLE `tblcgparesult` (
  `Id` int(11) NOT NULL,
  `matricNo` varchar(50) NOT NULL,
  `cgpa` varchar(50) NOT NULL,
  `classOfDiploma` varchar(50) NOT NULL,
  `dateAdded` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblcgparesult`
--

INSERT INTO `tblcgparesult` (`Id`, `matricNo`, `cgpa`, `classOfDiploma`, `dateAdded`) VALUES
(1, 'SGS100', '1.38', 'Fail', '2022-06-13'),
(2, '10101', '3.38', 'Upper Credit', '2022-06-15'),
(3, '14750', '3.35', 'Upper Credit', '2022-06-15'),
(4, 'SGS123', '3.49', 'Upper Credit', '2022-06-16');

-- --------------------------------------------------------

--
-- Table structure for table `tblcourse`
--

CREATE TABLE `tblcourse` (
  `Id` int(11) NOT NULL,
  `courseTitle` varchar(255) NOT NULL,
  `courseCode` varchar(255) NOT NULL,
  `courseUnit` int(10) NOT NULL,
  `teacher` varchar(100) NOT NULL,
  `facultyId` varchar(255) NOT NULL,
  `departmentId` varchar(255) NOT NULL,
  `levelId` varchar(100) NOT NULL,
  `semesterId` varchar(20) NOT NULL,
  `dateAdded` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblcourse`
--

INSERT INTO `tblcourse` (`Id`, `courseTitle`, `courseCode`, `courseUnit`, `teacher`, `facultyId`, `departmentId`, `levelId`, `semesterId`, `dateAdded`) VALUES
(28, 'National Service Training Program', 'NSTP102', 3, 'Peter  Parker', '', '', 'Grade 11', '2', '2022-11-30'),
(27, 'Rhythmic Activities', 'RA102', 3, 'Peter  Parker', '', '', 'Grade 11', '2', '2022-11-30'),
(26, 'Discrete Mathematics', 'DM102', 3, 'Jason Statham', '', '', 'Grade 11', '2', '2022-11-30'),
(25, 'Computer Programming 2', 'CP102', 2, 'Jason Statham', '', '', 'Grade 11', '2', '2022-11-30'),
(24, 'Art Appreciation', 'AA102', 3, 'Chadwick Booseman', '', '', 'Grade 11', '2', '2022-11-30'),
(23, 'Mathematics in the Modern World', 'Math102', 3, 'Chadwick Booseman', '', '', 'Grade 11', '2', '2022-11-30'),
(22, 'Purposive Communication', 'PC102', 3, 'Steve Rogers', '', '', 'Grade 11', '2', '2022-11-30'),
(29, 'National Service Training Program 1', 'NSTP101', 3, 'Jason Statham', '', '', 'Grade 11', '1', '2022-11-30'),
(30, 'Physical Fitness', 'PF101', 2, 'Peter  Parker', '', '', 'Grade 11', '1', '2022-11-30'),
(31, 'Computer Programming 1', 'CP101', 2, 'Chadwick Booseman', '', '', 'Grade 11', '1', '2022-11-30'),
(32, 'Introduction to Computing', 'IC101', 2, 'Jason Statham', '', '', 'Grade 11', '1', '2022-11-30'),
(33, 'Gender and Society', 'GC101', 3, 'Steve Rogers', '', '', 'Grade 11', '1', '2022-11-30'),
(34, 'Science Technology and Society', 'STS101', 3, 'Peter  Parker', '', '', 'Grade 11', '1', '2022-11-30'),
(35, 'Readings in Philippine History', 'RPH101', 3, 'Chadwick Booseman', '', '', 'Grade 11', '1', '2022-11-30'),
(36, 'Understanding the Self', 'US101', 3, 'Steve Rogers', '', '', 'Grade 11', '1', '2022-11-30'),
(38, 'Ethics', 'Eth101', 3, 'Peter  Parker', '', '', 'Grade 11', '2', '2022-11-30');

-- --------------------------------------------------------

--
-- Table structure for table `tbldepartment`
--

CREATE TABLE `tbldepartment` (
  `Id` int(20) NOT NULL,
  `departmentName` varchar(255) NOT NULL,
  `facultyId` int(20) NOT NULL,
  `dateCreated` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbldepartment`
--

INSERT INTO `tbldepartment` (`Id`, `departmentName`, `facultyId`, `dateCreated`) VALUES
(1, 'Earth', 1, '2022-06-13'),
(2, 'Saturn', 2, '2022-06-15');

-- --------------------------------------------------------

--
-- Table structure for table `tblfaculty`
--

CREATE TABLE `tblfaculty` (
  `Id` int(20) NOT NULL,
  `facultyName` varchar(255) NOT NULL,
  `dateCreated` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblfaculty`
--

INSERT INTO `tblfaculty` (`Id`, `facultyName`, `dateCreated`) VALUES
(1, 'Room 1', '2022-06-13'),
(2, 'Room 2', '2022-06-15');

-- --------------------------------------------------------

--
-- Table structure for table `tblfinalresult`
--

CREATE TABLE `tblfinalresult` (
  `Id` int(10) NOT NULL,
  `matricNo` varchar(50) NOT NULL,
  `levelId` varchar(10) NOT NULL,
  `semesterId` varchar(10) NOT NULL,
  `sessionId` varchar(10) NOT NULL,
  `quarter` int(10) NOT NULL,
  `dateAdded` varchar(25) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblfinalresult`
--

INSERT INTO `tblfinalresult` (`Id`, `matricNo`, `levelId`, `semesterId`, `sessionId`, `quarter`, `dateAdded`) VALUES
(31, '441622818', 'Grade 11', '1', '1', 3, '2022-11-30'),
(30, '441622818', 'Grade 11', '1', '1', 2, '2022-11-30'),
(29, '441622818', 'Grade 11', '1', '1', 1, '2022-11-30'),
(26, '441622818', 'Grade 11', '2', '1', 1, '2022-11-30'),
(27, '441622818', 'Grade 11', '2', '1', 2, '2022-11-30'),
(28, '441622818', 'Grade 11', '2', '1', 3, '2022-11-30');

-- --------------------------------------------------------

--
-- Table structure for table `tbllevel`
--

CREATE TABLE `tbllevel` (
  `Id` int(20) NOT NULL,
  `levelName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbllevel`
--

INSERT INTO `tbllevel` (`Id`, `levelName`) VALUES
(1, 'Grade 11'),
(2, 'Grade 12');

-- --------------------------------------------------------

--
-- Table structure for table `tblresult`
--

CREATE TABLE `tblresult` (
  `Id` int(10) NOT NULL,
  `matricNo` varchar(50) NOT NULL,
  `levelId` varchar(10) NOT NULL,
  `semesterId` varchar(10) NOT NULL,
  `sessionId` varchar(10) NOT NULL,
  `courseCode` varchar(50) NOT NULL,
  `courseUnit` varchar(50) NOT NULL,
  `score` varchar(50) NOT NULL,
  `scoreGradePoint` varchar(50) NOT NULL,
  `scoreLetterGrade` varchar(10) NOT NULL,
  `totalScoreGradePoint` varchar(50) NOT NULL,
  `dateAdded` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblsemester`
--

CREATE TABLE `tblsemester` (
  `Id` int(20) NOT NULL,
  `semesterName` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblsemester`
--

INSERT INTO `tblsemester` (`Id`, `semesterName`) VALUES
(1, 'First Semester'),
(2, 'Second Semester');

-- --------------------------------------------------------

--
-- Table structure for table `tblsession`
--

CREATE TABLE `tblsession` (
  `Id` int(20) NOT NULL,
  `sessionName` varchar(30) NOT NULL,
  `isActive` int(5) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblsession`
--

INSERT INTO `tblsession` (`Id`, `sessionName`, `isActive`) VALUES
(1, '2022/2023', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblstaff`
--

CREATE TABLE `tblstaff` (
  `Id` int(20) NOT NULL,
  `firstName` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `otherName` varchar(255) NOT NULL,
  `emailAddress` varchar(255) NOT NULL,
  `phoneNo` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `staffId` varchar(255) NOT NULL,
  `isAssigned` int(10) NOT NULL,
  `isPasswordChanged` int(10) NOT NULL,
  `dateCreated` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tblstudent`
--

CREATE TABLE `tblstudent` (
  `Id` int(20) NOT NULL,
  `teacher` varchar(255) NOT NULL,
  `firstName` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `otherName` varchar(255) NOT NULL,
  `matricNo` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `levelId` varchar(100) NOT NULL,
  `facultyId` varchar(100) NOT NULL,
  `departmentId` varchar(100) NOT NULL,
  `sessionId` int(10) NOT NULL,
  `dateCreated` varchar(255) NOT NULL,
  `sex` varchar(100) NOT NULL,
  `bday` date NOT NULL,
  `age` int(50) NOT NULL,
  `nationality` varchar(100) NOT NULL,
  `religion` varchar(100) NOT NULL,
  `mobile` bigint(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `bplace` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblstudent`
--

INSERT INTO `tblstudent` (`Id`, `teacher`, `firstName`, `lastName`, `otherName`, `matricNo`, `password`, `levelId`, `facultyId`, `departmentId`, `sessionId`, `dateCreated`, `sex`, `bday`, `age`, `nationality`, `religion`, `mobile`, `address`, `email`, `bplace`, `status`) VALUES
(38, 'Jason', 'Delpressdy', 'Maglinte', 'Pressdy', '441622818', 'student', 'Grade 11', '1', '1', 1, '2022-11-16', 'Male', '1996-08-07', 28, 'Filipino', 'Iglesia ni Cristo', 9704463789, '98 Green Road, farmgate', 'press@admin.com', 'Cebu', 'Continuing'),
(39, 'Chadwick', 'Roniel', 'Bansas', 'Bansas', '191818722', 'student', 'Grade 11', '1', '1', 1, '2022-11-16', 'Male', '1999-12-07', 22, 'Filipino', 'Jehovah Witnesses', 9055649841, 'Public Market, Dumingag, Zamboanga Del Sur', 'bansas@mail.com', 'Zamboanga', 'Continuing');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `announcement`
--
ALTER TABLE `announcement`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `enrolled`
--
ALTER TABLE `enrolled`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `studentres`
--
ALTER TABLE `studentres`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `studentsub`
--
ALTER TABLE `studentsub`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbladmin`
--
ALTER TABLE `tbladmin`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `tbladmintype`
--
ALTER TABLE `tbladmintype`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `tblassignedadmin`
--
ALTER TABLE `tblassignedadmin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblcgparesult`
--
ALTER TABLE `tblcgparesult`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `tblcourse`
--
ALTER TABLE `tblcourse`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `tbldepartment`
--
ALTER TABLE `tbldepartment`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `tblfaculty`
--
ALTER TABLE `tblfaculty`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `tblfinalresult`
--
ALTER TABLE `tblfinalresult`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `tbllevel`
--
ALTER TABLE `tbllevel`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `tblresult`
--
ALTER TABLE `tblresult`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `tblsemester`
--
ALTER TABLE `tblsemester`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `tblsession`
--
ALTER TABLE `tblsession`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `tblstaff`
--
ALTER TABLE `tblstaff`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `tblstudent`
--
ALTER TABLE `tblstudent`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `announcement`
--
ALTER TABLE `announcement`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `enrolled`
--
ALTER TABLE `enrolled`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `studentres`
--
ALTER TABLE `studentres`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `studentsub`
--
ALTER TABLE `studentsub`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `tbladmin`
--
ALTER TABLE `tbladmin`
  MODIFY `Id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbladmintype`
--
ALTER TABLE `tbladmintype`
  MODIFY `Id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tblassignedadmin`
--
ALTER TABLE `tblassignedadmin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tblcgparesult`
--
ALTER TABLE `tblcgparesult`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tblcourse`
--
ALTER TABLE `tblcourse`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `tbldepartment`
--
ALTER TABLE `tbldepartment`
  MODIFY `Id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tblfaculty`
--
ALTER TABLE `tblfaculty`
  MODIFY `Id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tblfinalresult`
--
ALTER TABLE `tblfinalresult`
  MODIFY `Id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `tbllevel`
--
ALTER TABLE `tbllevel`
  MODIFY `Id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tblresult`
--
ALTER TABLE `tblresult`
  MODIFY `Id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tblsemester`
--
ALTER TABLE `tblsemester`
  MODIFY `Id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tblsession`
--
ALTER TABLE `tblsession`
  MODIFY `Id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tblstaff`
--
ALTER TABLE `tblstaff`
  MODIFY `Id` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblstudent`
--
ALTER TABLE `tblstudent`
  MODIFY `Id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
