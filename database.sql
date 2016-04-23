-- phpMyAdmin SQL Dump
-- version 4.0.10.15
-- http://www.phpmyadmin.net
--
-- Host: studentdb-maria.gl.umbc.edu
-- Generation Time: Apr 23, 2016 at 02:30 PM
-- Server version: 10.0.24-MariaDB-wsrep
-- PHP Version: 5.4.44

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `mlanden`
--

-- --------------------------------------------------------

--
-- Table structure for table `Courses`
--

CREATE TABLE IF NOT EXISTS `Courses` (
  `course_ID` varchar(10) NOT NULL,
  `course_name` text,
  `course_credits` text,
  PRIMARY KEY (`course_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Courses`
--

INSERT INTO `Courses` (`course_ID`, `course_name`, `course_credits`) VALUES
('BIOL141', 'Foundations of Biology: Cells, Energy and Organisms', '4'),
('BIOL142', 'Foundations of Biology: Ecology and Evolution', '4'),
('CHEM101', 'Principles of Chemistry I', '4'),
('CHEM102', 'Principles of Chemistry II', '4'),
('CHEM102L', 'Introductory Chemistry Lab I', '2'),
('CMSC201', 'Computer Science I for Majors', '4'),
('CMSC202', 'Computer Science IU for Majors', '4'),
('CMSC203', 'Discrete Structures', '3'),
('CMSC291', 'Special Topics in Computer Science', '1 - 4'''),
('CMSC299', 'Independent Study in Computer Science', '1 - 4'''),
('CMSC304', 'Social and Ethical Issues in Information Technology', '3'),
('CMSC313', 'Computer Organization and Assembly Language Programming', '3'),
('CMSC331', 'Principles of Programming Language', '3'),
('CMSC341', 'Data Structures', '3'),
('CMSC411', 'Computer Architecture', '3'),
('CMSC421', 'Principles of Operating Systems', '3'),
('CMSC426', 'Principles of Computer Security', '3'),
('CMSC427', 'Wearable Computing', '3'),
('CMSC431', 'Compiler Design Principles', '3'),
('CMSC432', 'Object-Oriented Programming Languages and Systems', '3'),
('CMSC433', 'Scripting Languages', '3'),
('CMSC435', 'Computer Graphics', '3'),
('CMSC436', 'Data Visualization', '3'),
('CMSC437', 'Graphical User Interface Programming', '3'),
('CMSC441', 'Design and Analysis of Algorithms.', '3'),
('CMSC443', 'Cryptology', '3'),
('CMSC447', 'Software Engineering I', '3'),
('CMSC448', 'Software Engineering II', '3'),
('CMSC451', 'Automata Theory and Formal Languages', '3'),
('CMSC452', 'Logic for Computer Science', '3'),
('CMSC453', 'Applied Combinatorics and Graph Theory', '3'),
('CMSC455', 'Numerical Computations', '3'),
('CMSC456', 'Symbolic Computation', '3'),
('CMSC457', 'Quantum Computation', '3'),
('CMSC461', 'Database Management Systems', '3'),
('CMSC465', 'Introduction to Electronic Commerce', '3'),
('CMSC466', 'Electronic Commerce Technology', '3'),
('CMSC471', 'Introduction to Artificial Intelligence', '3'),
('CMSC473', 'Introduction to Natural Language Processing', '3'),
('CMSC475', 'Introduction to Neural Networks', '3'),
('CMSC476', 'Information Retrieval', '3'),
('CMSC477', 'Agent Architectures and Multi-Agent Systems', '3'),
('CMSC478', 'Introduction to Machine Learning', '3'),
('CMSC479', 'Introduction to Robotics', '3'),
('CMSC481', 'Computer Networks', '3'),
('CMSC483', 'Parallel and Distributed Processing', '3'),
('CMSC484', 'Java Server Technologies', '3'),
('CMSC486', 'Mobile Telephony Communications', '3'),
('CMSC487', 'Introduction To Network Security', '3'),
('CMSC493', 'Capstone Games Group Project', '3'),
('CMSC499', 'Independent Study in Computer Science', '1 - 4'''),
('GES110', 'Physical Geography', '3'),
('GES286', 'Ecploring the Environment: A Geo-Spatial Perspective', '4'),
('MATH151', 'Calculus and Analytic Geometry I', '4'),
('MATH152', 'Calculus and Analytic Geometry II', '4'),
('MATH221', 'Introduction to Linear Algebra', '3'),
('MATH251', 'Multivariable Calculus', '4'),
('PHYS121', 'Introductory Physics I', '4'),
('PHYS122', 'Introductory Physics II', '4'),
('PHYS122L', 'Introductory Physics Laboratory', '2'),
('SCI100', 'Water; An Interdisciplinary Study (MS)', '3'),
('SCI101L', 'Quantitative Reasoning: Measurement and Skills Lab', '2'),
('STAT355', 'Introduction to Probability and Statistics for Scientists and Engineers', '4');

-- --------------------------------------------------------

--
-- Table structure for table `course_taken`
--

CREATE TABLE IF NOT EXISTS `course_taken` (
  `student_id` varchar(10) NOT NULL,
  `couurse_id` varchar(10) NOT NULL,
  `complete` varchar(5) NOT NULL,
  PRIMARY KEY (`student_id`,`couurse_id`),
  KEY `couurse_id` (`couurse_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Students`
--

CREATE TABLE IF NOT EXISTS `Students` (
  `student_ID` varchar(10) NOT NULL,
  `student_name` text NOT NULL,
  `student_email` text NOT NULL,
  `student_phone` text NOT NULL,
  PRIMARY KEY (`student_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `course_taken`
--
ALTER TABLE `course_taken`
  ADD CONSTRAINT `course_taken_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `Students` (`student_ID`),
  ADD CONSTRAINT `course_taken_ibfk_2` FOREIGN KEY (`couurse_id`) REFERENCES `Courses` (`course_ID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
