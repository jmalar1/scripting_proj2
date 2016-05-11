-- phpMyAdmin SQL Dump
-- version 4.0.10.15
-- http://www.phpmyadmin.net
--
-- Host: studentdb-maria.gl.umbc.edu
-- Generation Time: May 11, 2016 at 09:57 PM
-- Server version: 10.0.24-MariaDB-wsrep
-- PHP Version: 5.4.44

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `jmalar1`
--

-- --------------------------------------------------------

--
-- Table structure for table `Courses`
--

CREATE TABLE IF NOT EXISTS `Courses` (
  `course_id` varchar(10) NOT NULL,
  `course_name` text,
  `course_credits` text,
  PRIMARY KEY (`course_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Courses`
--

INSERT INTO `Courses` (`course_id`, `course_name`, `course_credits`) VALUES
('BIOL100', 'Concepts of Biology', '4'),
('BIOL141', 'Foundations of Biology: Cells, Energy and Organisms', '4'),
('BIOL142', 'Foundations of Biology: Ecology and Evolution', '4'),
('BIOL301', 'Ecology and Evolution', '3'),
('CHEM101', 'Principles of Chemistry I', '4'),
('CHEM102', 'Principles of Chemistry II', '4'),
('CHEM102L', 'Introductory Chemistry Lab I', '2'),
('CMSC201', 'Computer Science I for Majors', '4'),
('CMSC202', 'Computer Science IU for Majors', '4'),
('CMSC203', 'Discrete Structures', '3'),
('CMSC232', 'Advanced Java Techniques', '2'),
('CMSC291', 'Special Topics in Computer Science', '1 - 4'''),
('CMSC299', 'Independent Study in Computer Science', '1 - 4'''),
('CMSC304', 'Social and Ethical Issues in Information Technology', '3'),
('CMSC313', 'Computer Organization and Assembly Language Programming', '3'),
('CMSC331', 'Principles of Programming Language', '3'),
('CMSC341', 'Data Structures', '3'),
('CMSC352', 'Women, Gender, and Information Technology', '3'),
('CMSC391', 'Special Topics in Computer Science', '1 - 4'''),
('CMSC404', 'The History of Computers and Computing', '3'),
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
('CMSC442', 'Information and Coding Theory', '3'),
('CMSC443', 'Cryptology', '3'),
('CMSC444', 'Information Assurance', '3'),
('CMSC446', 'Introduction to Design Patterns', '3'),
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
('CMSC491', 'Special Topics in Computer Science', '3'),
('CMSC493', 'Capstone Games Group Project', '3'),
('CMSC495', 'Honors Thesis', '3'),
('CMSC498', 'Independent Study in Computer Science for Interns & Coop Students', '3'),
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
  `course_id` varchar(10) NOT NULL,
  `completed` varchar(5) NOT NULL,
  PRIMARY KEY (`student_id`,`course_id`),
  KEY `course_id` (`course_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course_taken`
--

INSERT INTO `course_taken` (`student_id`, `course_id`, `completed`) VALUES
('AB29191', 'CMSC201', 'P'),
('AB29191', 'CMSC202', 'R'),
('AB29191', 'MATH151', 'P'),
('AB29191', 'STAT355', 'P'),
('hu32849', 'CMSC201', 'P'),
('hu32849', 'MATH151', 'P'),
('hu32849', 'STAT355', 'P'),
('JK02010', 'CHEM101', 'P'),
('JK02010', 'CHEM102', 'P'),
('JK02010', 'CMSC201', 'P'),
('JK02010', 'CMSC202', 'P'),
('JK02010', 'CMSC203', 'P'),
('JS01921', 'BIOL100', 'P'),
('JS01921', 'BIOL141', 'P'),
('JS01921', 'BIOL142', 'P'),
('JS01921', 'BIOL301', 'P'),
('JS01921', 'CHEM101', 'P'),
('JS01921', 'CHEM102', 'P'),
('JS01921', 'CMSC201', 'P'),
('JS01921', 'CMSC202', 'P'),
('JS01921', 'CMSC203', 'P'),
('JS01921', 'CMSC232', 'P'),
('JS01921', 'CMSC291', 'P'),
('JS01921', 'CMSC299', 'P'),
('JS01921', 'CMSC304', 'P'),
('JS01921', 'CMSC313', 'P'),
('JS01921', 'CMSC331', 'P'),
('JS01921', 'CMSC341', 'P'),
('JS01921', 'CMSC352', 'P'),
('JS01921', 'CMSC391', 'P'),
('JS01921', 'CMSC404', 'P'),
('JS01921', 'CMSC411', 'P'),
('JS01921', 'CMSC421', 'P'),
('JS01921', 'CMSC426', 'P'),
('JS01921', 'CMSC427', 'P'),
('JS01921', 'CMSC431', 'P'),
('JS01921', 'CMSC432', 'P'),
('JS01921', 'CMSC433', 'P'),
('JS01921', 'CMSC435', 'P'),
('JS01921', 'CMSC436', 'P'),
('JS01921', 'CMSC437', 'P'),
('JS01921', 'CMSC441', 'P'),
('JS01921', 'CMSC442', 'P'),
('JS01921', 'CMSC443', 'P'),
('JS01921', 'CMSC444', 'P'),
('JS01921', 'CMSC446', 'P'),
('JS01921', 'CMSC447', 'P'),
('JS01921', 'CMSC448', 'P'),
('JS01921', 'CMSC451', 'P'),
('JS01921', 'CMSC452', 'P'),
('JS01921', 'CMSC453', 'P'),
('JS01921', 'CMSC455', 'P'),
('JS01921', 'CMSC456', 'P'),
('JS01921', 'CMSC457', 'P'),
('JS01921', 'CMSC461', 'P'),
('JS01921', 'CMSC465', 'P'),
('JS01921', 'CMSC466', 'P'),
('JS01921', 'CMSC471', 'P'),
('JS01921', 'CMSC473', 'P'),
('JS01921', 'CMSC475', 'P'),
('JS01921', 'CMSC476', 'P'),
('JS01921', 'CMSC477', 'P'),
('JS01921', 'CMSC478', 'P'),
('JS01921', 'CMSC479', 'P'),
('JS01921', 'CMSC481', 'P'),
('JS01921', 'CMSC483', 'P'),
('JS01921', 'CMSC484', 'P'),
('JS01921', 'CMSC486', 'P'),
('JS01921', 'CMSC487', 'P'),
('JS01921', 'CMSC491', 'P'),
('JS01921', 'CMSC493', 'P'),
('JS01921', 'CMSC495', 'P'),
('JS01921', 'CMSC498', 'P'),
('JS01921', 'CMSC499', 'P'),
('JS01921', 'MATH151', 'P'),
('JS01921', 'MATH152', 'P'),
('JS01921', 'MATH221', 'P'),
('JS01921', 'PHYS121', 'P'),
('JS01921', 'PHYS122', 'P'),
('JS01921', 'STAT355', 'P');

-- --------------------------------------------------------

--
-- Table structure for table `Students`
--

CREATE TABLE IF NOT EXISTS `Students` (
  `student_id` varchar(10) NOT NULL,
  `student_name` text NOT NULL,
  `student_email` text NOT NULL,
  `student_phone` text NOT NULL,
  PRIMARY KEY (`student_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Students`
--

INSERT INTO `Students` (`student_id`, `student_name`, `student_email`, `student_phone`) VALUES
('AB29191', 'Jacob Mueller', 'jacb2@umbc.edu', '921-192-1921'),
('hu32849', 'Joe ONeill', 'joeoneill@gmail.com', '892-232-1232'),
('JK02010', 'Adam Bryant', 'abryant22@umbc.edu', '920-191-2912'),
('JS01921', 'WORK', 'w@umbc.edu', '291-192-1921');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `course_taken`
--
ALTER TABLE `course_taken`
  ADD CONSTRAINT `course_taken_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `Students` (`student_id`),
  ADD CONSTRAINT `course_taken_ibfk_2` FOREIGN KEY (`course_id`) REFERENCES `Courses` (`course_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
