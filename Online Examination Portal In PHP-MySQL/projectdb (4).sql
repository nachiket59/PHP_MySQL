-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 25, 2019 at 03:56 AM
-- Server version: 5.7.23
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projectdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `assigntest`
--

DROP TABLE IF EXISTS `assigntest`;
CREATE TABLE IF NOT EXISTS `assigntest` (
  `group_id` int(11) DEFAULT NULL,
  `test_id` int(11) DEFAULT NULL,
  KEY `group_id` (`group_id`),
  KEY `test_id` (`test_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `attempt`
--

DROP TABLE IF EXISTS `attempt`;
CREATE TABLE IF NOT EXISTS `attempt` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time DEFAULT NULL,
  `test_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `remaining_time` time DEFAULT NULL,
  `total_questions_loaded` int(11) DEFAULT NULL,
  `total_attempted` int(11) DEFAULT NULL,
  `total_correct` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `test_id` (`test_id`),
  KEY `student_id` (`student_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

DROP TABLE IF EXISTS `faculty`;
CREATE TABLE IF NOT EXISTS `faculty` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `loginId` varchar(50) NOT NULL,
  `password` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `loginId` (`loginId`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`id`, `name`, `loginId`, `password`, `email`) VALUES
(1, 'abc xyz', 'faculty01', 'faculty1', NULL),
(2, 'Nachiket', 'nachiket59', '1234', 'nachiket@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

DROP TABLE IF EXISTS `groups`;
CREATE TABLE IF NOT EXISTS `groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `groupName` varchar(50) NOT NULL,
  `created_by` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `created_by` (`created_by`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `groupName`, `created_by`) VALUES
(4, 'Java', 'faculty01'),
(5, 'my group', 'nachiket59');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

DROP TABLE IF EXISTS `questions`;
CREATE TABLE IF NOT EXISTS `questions` (
  `qid` int(10) NOT NULL AUTO_INCREMENT,
  `question` text NOT NULL,
  `option1` text,
  `option2` text,
  `option3` text,
  `option4` text,
  `answer` int(11) NOT NULL,
  `q_bank_id` int(10) DEFAULT NULL,
  PRIMARY KEY (`qid`),
  KEY `question_bank_id` (`q_bank_id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`qid`, `question`, `option1`, `option2`, `option3`, `option4`, `answer`, `q_bank_id`) VALUES
(26, 'What is the range of byte data type in Java?', '-128 to 127', '-32768 to 32767', '-2147483648 to 2147483647', 'None of the mentioned', 2, 8),
(27, 'What is the range of short data type in Java?', ' -128 to 127', ' -32768 to 32767', ' -2147483648 to 2147483647', ' None of the mentioned', 1, 8);

-- --------------------------------------------------------

--
-- Table structure for table `question_bank`
--

DROP TABLE IF EXISTS `question_bank`;
CREATE TABLE IF NOT EXISTS `question_bank` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `created_by` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `qb_created_by` (`created_by`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `question_bank`
--

INSERT INTO `question_bank` (`id`, `name`, `created_by`) VALUES
(8, 'java qb', 'faculty01');

-- --------------------------------------------------------

--
-- Table structure for table `question_in_test`
--

DROP TABLE IF EXISTS `question_in_test`;
CREATE TABLE IF NOT EXISTS `question_in_test` (
  `test_id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  KEY `question_id` (`question_id`),
  KEY `test_id` (`test_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

DROP TABLE IF EXISTS `student`;
CREATE TABLE IF NOT EXISTS `student` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `studentName` varchar(50) NOT NULL,
  `enrollment` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `added_by` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `enrollment` (`enrollment`),
  KEY `added_by` (`added_by`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `studentName`, `enrollment`, `password`, `email`, `added_by`) VALUES
(33, 'rutuparna Ku', 'ss16if052', '12345', 'ratu@gmail.com', 'faculty01'),
(34, 'nilesh kharat', 'ss16if059', 'ss16if059', 'nilesh@gmail.com', 'faculty01'),
(35, 'Abhishek Rai', 'ss16if037', 'ss16if037', 'abhishek@gmail.com', 'faculty01'),
(36, 'Amreen Khan', 'ss16if024', 'ss16if059', 'amreen@gmail.com', 'faculty01'),
(37, 'Rohini Yadav', 'ss16if021', 'ss16if021', 'rohini@gmail.com', 'faculty01'),
(38, 'Nikhil Chaube', 'ss16if023', 'ss16if023', 'nikhil@gmail.com', 'faculty01'),
(39, 'Nachiket Pethe ', 'ss16if027', 'ss16if027', 'nachiket@gmail.com', 'faculty01'),
(40, 'Affan Ansari', 'ss16if033', 'ss16if033', 'affan@gmail.com', 'faculty01'),
(41, 'Sahil Jadhav', 'ss16if039', 'ss16if039', 'sahil@gmail.com', 'faculty01'),
(43, 'Kamlesh Patil', 'ss16if045', 'ss16if045', 'kamlesh@gmail.com', 'faculty01'),
(44, 'Akshay Pande', 'ss16if040', 'ss16if040', 'akshay@gmail.com', 'faculty01');

-- --------------------------------------------------------

--
-- Table structure for table `studentans`
--

DROP TABLE IF EXISTS `studentans`;
CREATE TABLE IF NOT EXISTS `studentans` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `attempt_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `sanswer` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `attempt_id` (`attempt_id`),
  KEY `student_id` (`student_id`),
  KEY `question_id` (`question_id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `studentgroup`
--

DROP TABLE IF EXISTS `studentgroup`;
CREATE TABLE IF NOT EXISTS `studentgroup` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `studentId` int(11) DEFAULT NULL,
  `groupId` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `studentId` (`studentId`),
  KEY `groupId` (`groupId`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `studentgroup`
--

INSERT INTO `studentgroup` (`id`, `studentId`, `groupId`) VALUES
(3, 35, 4),
(4, 36, 4),
(6, 33, 5),
(7, 34, 5);

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

DROP TABLE IF EXISTS `test`;
CREATE TABLE IF NOT EXISTS `test` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `allowPractice` bit(1) DEFAULT NULL,
  `active` bit(1) DEFAULT NULL,
  `timePerTest` time DEFAULT NULL,
  `createdBy` varchar(50) DEFAULT NULL,
  `allowResult` bit(1) DEFAULT b'1',
  `allowedAttempts` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `createdBy` (`createdBy`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `assigntest`
--
ALTER TABLE `assigntest`
  ADD CONSTRAINT `assigned_group` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `assigned_test` FOREIGN KEY (`test_id`) REFERENCES `test` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `attempt`
--
ALTER TABLE `attempt`
  ADD CONSTRAINT `attempt_student_id` FOREIGN KEY (`student_id`) REFERENCES `student` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `attempt_test_id` FOREIGN KEY (`test_id`) REFERENCES `test` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `groups`
--
ALTER TABLE `groups`
  ADD CONSTRAINT `group_created_by` FOREIGN KEY (`created_by`) REFERENCES `faculty` (`loginId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `question_bank_id` FOREIGN KEY (`q_bank_id`) REFERENCES `question_bank` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `question_bank`
--
ALTER TABLE `question_bank`
  ADD CONSTRAINT `qb_created_by` FOREIGN KEY (`created_by`) REFERENCES `faculty` (`loginId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `question_in_test`
--
ALTER TABLE `question_in_test`
  ADD CONSTRAINT `question_id` FOREIGN KEY (`question_id`) REFERENCES `questions` (`qid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `test_id` FOREIGN KEY (`test_id`) REFERENCES `test` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `student_added_by` FOREIGN KEY (`added_by`) REFERENCES `faculty` (`loginId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `studentans`
--
ALTER TABLE `studentans`
  ADD CONSTRAINT `answer_attempt_id` FOREIGN KEY (`attempt_id`) REFERENCES `attempt` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `answer_question_id` FOREIGN KEY (`question_id`) REFERENCES `questions` (`qid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `answer_student_id` FOREIGN KEY (`student_id`) REFERENCES `student` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `studentgroup`
--
ALTER TABLE `studentgroup`
  ADD CONSTRAINT `group_id` FOREIGN KEY (`groupId`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `student_in_group` FOREIGN KEY (`studentId`) REFERENCES `student` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `test`
--
ALTER TABLE `test`
  ADD CONSTRAINT `test_created_by` FOREIGN KEY (`createdBy`) REFERENCES `faculty` (`loginId`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
