-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 16, 2025 at 12:10 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `grading_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `account_id` int(1) NOT NULL,
  `account_type` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`account_id`, `account_type`) VALUES
(1, 'Admin'),
(2, 'Teacher'),
(3, 'Student');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(10) NOT NULL,
  `account_id` int(1) NOT NULL,
  `admin_email` varchar(100) NOT NULL,
  `admin_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `account_id`, `admin_email`, `admin_password`) VALUES
(1, 1, 'admin@hotmail.com', '$2y$10$VCtHULsmO77aulaNEED1YujwLCs72MFiDG2hIGjM1c05Qo.uftheO');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `course_id` int(10) NOT NULL,
  `teacher_id` int(10) NOT NULL,
  `course_name` varchar(50) NOT NULL,
  `course_description` varchar(255) NOT NULL,
  `course_image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`course_id`, `teacher_id`, `course_name`, `course_description`, `course_image`) VALUES
(15, 8, 'GCSE English', 'You will learn language and literature in this course ', 'uploads/1747045383_english.jpg'),
(16, 9, 'GCSE IT', 'Learn programming, networking and basic admin troubleshooting', 'uploads/1747045959_itimage.jpg'),
(17, 9, 'Physical Education Level 4', 'Test ', 'uploads/1747046289_peimage.jpg'),
(18, 10, 'Maths Functional Skills Level 2', 'Algebra, long multiplication and fractions ', 'uploads/1747046398_maths.avif'),
(19, 10, 'Engineering', 'Programs focus on various engineering disciplines', 'uploads/1747215966_images.jpg'),
(20, 7, 'Science', 'Specialisation in Physics, Chemistry, Biology, Mathematics, Biotechnology, and more', 'uploads/1747216066_colourful-science-work-concept_23-2148539571.avif'),
(21, 9, 'Business and Management', 'Courses in Business and Management Studies can be found at universities and online platforms', 'uploads/1747216119_Business-Management-1.jpg'),
(22, 8, 'Health and Wellness', 'Courses on topics like yoga, meditation, or fitness training can be found both online and in local gyms or studios', 'uploads/1747217113_5_1200x1200.webp'),
(23, 10, 'Creative Arts', 'Online courses in areas like graphic design, photography, or writing can be found on platforms like Udemy. ', 'uploads/1747217233_istockphoto-1217500298-612x612.jpg'),
(24, 9, 'Computer Science', 'Courses in web development, programming languages, and software engineering can be found online or through local educational institutions. ', 'uploads/1747217292_programming-background-with-person-working-with-codes-computer_23-2150010125.avif'),
(25, 8, 'Music', 'Piano, guitar, singing, violin, and more. ', 'uploads/1747217476_pngtree-art-music-background-image_2928765.jpg'),
(26, 10, 'History', 'Learn all about ancient history ', 'uploads/1747345175_istockphoto-1092170968-612x612.jpg'),
(27, 10, 'Food Technology - Level 2', 'Learn how to cook and everything else ', 'uploads/1747345891_istockphoto-1092170968-612x612.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `enrollment`
--

CREATE TABLE `enrollment` (
  `enrollment_id` int(11) NOT NULL,
  `course_id` int(11) DEFAULT NULL,
  `student_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `enrollment`
--

INSERT INTO `enrollment` (`enrollment_id`, `course_id`, `student_id`) VALUES
(7, 15, 8),
(8, 15, 10),
(9, 15, 11),
(10, 15, 9),
(11, 16, 14),
(12, 16, 13),
(13, 16, 11),
(14, 16, 12),
(15, 18, 8),
(16, 18, 14),
(17, 18, 12),
(18, 18, 10),
(20, 17, 14),
(21, 17, 11),
(22, 17, 13),
(24, 19, 8),
(25, 19, 9),
(26, 19, 10),
(27, 19, 13),
(28, 19, 14),
(29, 19, 11),
(30, 21, 10),
(31, 21, 12),
(32, 21, 18),
(33, 21, 19),
(34, 21, 8),
(35, 21, 13),
(36, 21, 16),
(37, 20, 19),
(38, 20, 16),
(39, 20, 13),
(40, 20, 10),
(41, 20, 20),
(42, 20, 9),
(44, 25, 8),
(45, 25, 13),
(46, 25, 17),
(47, 25, 20),
(48, 25, 16),
(49, 25, 11),
(50, 25, 10),
(51, 25, 19),
(52, 25, 9),
(53, 22, 18),
(54, 22, 13),
(55, 22, 10),
(56, 22, 9),
(57, 22, 8),
(58, 22, 20),
(59, 22, 15),
(60, 22, 12),
(61, 18, 16),
(62, 18, 20),
(63, 18, 19),
(64, 19, 15),
(65, 23, 15),
(66, 23, 8),
(67, 23, 9),
(68, 23, 10),
(69, 23, 12),
(70, 23, 13),
(71, 17, 9),
(72, 26, 8),
(73, 26, 9),
(74, 26, 10),
(76, 27, 9),
(77, 27, 10),
(78, 27, 8);

-- --------------------------------------------------------

--
-- Table structure for table `grade`
--

CREATE TABLE `grade` (
  `grade_id` int(10) NOT NULL,
  `teacher_id` int(10) NOT NULL,
  `student_id` int(10) NOT NULL,
  `course_id` int(10) NOT NULL,
  `grade` decimal(4,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `grade`
--

INSERT INTO `grade` (`grade_id`, `teacher_id`, `student_id`, `course_id`, `grade`) VALUES
(1, 8, 8, 15, 73),
(2, 8, 10, 15, 56),
(3, 8, 11, 15, 65),
(4, 8, 9, 15, 54),
(5, 7, 9, 17, 66),
(6, 8, 8, 25, 56),
(7, 8, 9, 25, 76),
(8, 8, 10, 25, 54),
(9, 8, 11, 25, 34),
(10, 8, 13, 25, 45),
(11, 8, 16, 25, 76),
(12, 8, 17, 25, 87),
(13, 8, 19, 25, 54),
(14, 8, 20, 25, 76),
(15, 7, 14, 17, 43),
(16, 7, 11, 17, 56),
(17, 7, 13, 17, 76),
(18, 7, 9, 20, 75),
(19, 7, 10, 20, 87),
(20, 7, 13, 20, 65),
(21, 7, 16, 20, 56),
(22, 7, 19, 20, 67),
(23, 7, 20, 20, 32),
(24, 10, 8, 18, 20),
(25, 10, 10, 18, 76),
(26, 10, 12, 18, 45),
(27, 10, 14, 18, 87),
(28, 10, 16, 18, 56),
(29, 10, 19, 18, 87),
(30, 10, 20, 18, 67),
(31, 10, 8, 19, 56),
(32, 10, 9, 19, 87),
(33, 10, 10, 19, 67),
(34, 10, 11, 19, 78),
(35, 10, 13, 19, 43),
(36, 10, 14, 19, 45),
(37, 10, 15, 19, 76),
(38, 10, 8, 23, 45),
(39, 10, 9, 23, 76),
(40, 10, 10, 23, 87),
(41, 10, 12, 23, 67),
(42, 10, 13, 23, 87),
(43, 10, 15, 23, 67),
(44, 10, 8, 26, 0),
(45, 10, 9, 26, 0),
(46, 10, 10, 26, 0),
(47, 10, 9, 27, 70),
(48, 10, 10, 27, 80),
(49, 10, 8, 27, 90);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `student_id` int(10) NOT NULL,
  `account_id` int(1) NOT NULL,
  `student_fname` varchar(50) NOT NULL,
  `student_lname` varchar(50) NOT NULL,
  `student_email` varchar(100) NOT NULL,
  `student_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`student_id`, `account_id`, `student_fname`, `student_lname`, `student_email`, `student_password`) VALUES
(8, 3, 'Lola', 'Davis', 'loladavis@hotmail.com', '$2y$10$OStq64lrh7r98.nPY4CqQ.7tYnlUwsJPm0yCFG3znGkqdWTMNMRGy'),
(9, 3, 'James', 'Campbell', 'jamescampbell@hotmail.com', '$2y$10$6ilQ4Y.Q.8mIaz8vlXGIpOwL19woPOLY/ymiI6haoSfwmzoRPNTyO'),
(10, 3, 'Natalie', 'Hector', 'nataliehector@hotmail.com', '$2y$10$yJUIh9B.fL0bxyn2Fxo5MOkgsyyIpFp6gdeRn/CDZPNeW75SOHQni'),
(11, 3, 'Dave', 'Rave', 'daverave@hotmail.com', '$2y$10$RmUmdHIYsnLWvA/GH2mmfuH/LyvRDgP91OYjlz4.f19967q2mwele'),
(12, 3, 'Jasmine', 'Martin', 'jasminemartin@hotmail.com', '$2y$10$P2FAWmJDr0RBwUR5eqnW5OiNbVFQRUstDWkiZXMGeek7lDIwgwpJu'),
(13, 3, 'Fiona', 'Paige', 'fionapaige@hotmail.com', '$2y$10$2wG1.h0qM/h8ZUQRZOec7e9Vwlu5Zf.674yzQPpDlV9y4gC70NspS'),
(14, 3, 'Dylan', 'Payne', 'dylanpayne@hotmail.com', '$2y$10$fHk6O5.R6xyw4wNEKSoXZeVWCUV03ucDi/agdhjDae2vPS/QqYVRu'),
(15, 3, 'Joey', 'Mraz', 'joeymraz@hotmail.com', '$2y$10$hAtxUoCy0olr6KP46Pl0JOJFBVvbXoMhO./VXMDtOV1XMlkTuF3jq'),
(16, 3, 'Stevie', 'Mann', 'steviemann@hotmail.com', '$2y$10$K2o2DgjP/N4K1DNPIvYGoex7x3dgOoN3yQIOSW7g0E3Wkoknd5dN2'),
(17, 3, 'Scot', 'Champlin', 'scotchamplin@hotmail.com', '$2y$10$4Nuo6VZHbfe0aXJwH8YUOO5JTRvTh5k8.UJmIJJh/yjz.MWxFcy22'),
(18, 3, 'Edyth', 'Sipes', 'edythsipes@hotmail.com', '$2y$10$cl1V0M3kL0MvXZNygqTlluCQz8w27mGoI0dLUQouYvurrcZOROGvO'),
(19, 3, 'Kareem', 'Ferry', 'kareemferry@hotmail.com', '$2y$10$oDFai9C68V4cXOZTr.Lr9uYQQcBCy7pgABdpemFarZmYvJu.EFnN.'),
(20, 3, 'Leatha ', 'Strosin', 'leathastrosin@hotmail.com', '$2y$10$XUQABaDMT4RIlxJuQuPeQ.8m5mRIfzdkSg0Rjpm5LR8xo7KFkF18.'),
(21, 3, 'Test', 'Test', 'test@hotmail.com', '$2y$10$Q6BO.w9c2k2cF0XRGRVHsONBn4h7MUNEjUeXx67E3lQAD1Fx/gCAi'),
(22, 3, 'Jane', 'Doe', 'janedoe@hotmail.com', '$2y$10$0HhJnWLa6TdBYYuwyDTLouE.1xC/1OlH8/a.URXowm7VV3vECi5Se');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `teacher_id` int(10) NOT NULL,
  `account_id` int(1) NOT NULL,
  `teacher_fname` varchar(50) NOT NULL,
  `teacher_lname` varchar(50) NOT NULL,
  `teacher_email` varchar(100) NOT NULL,
  `teacher_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`teacher_id`, `account_id`, `teacher_fname`, `teacher_lname`, `teacher_email`, `teacher_password`) VALUES
(7, 2, 'Lebron', 'James', 'LebronJames@hotmail.com', '$2y$10$NNx5n2wCbgx4L64HSXgM/evH7b/89FYLisIPGn3D3Gb3acVPK8Xxe'),
(8, 2, 'Bukayo', 'Saka', 'bukayosaka@hotmail.com', '$2y$10$GXURFRTgP93BdBqxppdF4eB17kdDK4ytd/TkWWCIQdI6GXXy0sXk.'),
(9, 2, 'Freddy', 'Johnson', 'freddyjohnson@hotmail.com', '$2y$10$kQ5aDweDewgzFKBQMI/q0.tTspHREJiLPxyxEa0iFFZ2xlKW6DZ0m'),
(10, 2, 'Joe', 'Grant', 'joegrant@hotmail.com', '$2y$10$IxYFTEz1me8Gru0qAyKy8OSV70aXkWp917jMTQV1AtcUhi9ccdkR2'),
(11, 2, 'Keith', 'Grimes', 'keithgrimes@hotmail.com', '$2y$10$SegdHgFFdJFne4OFRi5Wd.Q0VaCb8Um0YuErC7M2JXAHXBwmoO3aC'),
(12, 2, 'testteacher', 'testteachre', 'testteacher@hotmail.com', '$2y$10$MBJiIHlO22MOzoTpBX/LEuTTl0EzioR1AGPmroyRaxTUvFnl6UZS.'),
(13, 2, 'Ian', 'Blake', 'ianblake@hotmail.com', '$2y$10$tF1Gv0Nn/wIMO4GqHEq8nuBJZIp5bFYOcbgUiNbKO8OzQCZpB5cE.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`account_id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`),
  ADD KEY `account_id` (`account_id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`course_id`),
  ADD KEY `teacher_id` (`teacher_id`);

--
-- Indexes for table `enrollment`
--
ALTER TABLE `enrollment`
  ADD PRIMARY KEY (`enrollment_id`),
  ADD KEY `course_id` (`course_id`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `grade`
--
ALTER TABLE `grade`
  ADD PRIMARY KEY (`grade_id`),
  ADD KEY `teacher_id` (`teacher_id`,`student_id`,`course_id`),
  ADD KEY `course_id` (`course_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`student_id`),
  ADD KEY `account_id` (`account_id`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`teacher_id`),
  ADD KEY `account_id` (`account_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `account_id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `course_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `enrollment`
--
ALTER TABLE `enrollment`
  MODIFY `enrollment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `grade`
--
ALTER TABLE `grade`
  MODIFY `grade_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `student_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `teacher_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `admin_ibfk_1` FOREIGN KEY (`account_id`) REFERENCES `account` (`account_id`);

--
-- Constraints for table `course`
--
ALTER TABLE `course`
  ADD CONSTRAINT `course_ibfk_2` FOREIGN KEY (`teacher_id`) REFERENCES `teacher` (`teacher_id`);

--
-- Constraints for table `enrollment`
--
ALTER TABLE `enrollment`
  ADD CONSTRAINT `enrollment_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `course` (`course_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `enrollment_ibfk_2` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`) ON DELETE CASCADE;

--
-- Constraints for table `grade`
--
ALTER TABLE `grade`
  ADD CONSTRAINT `grade_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `course` (`course_id`);

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `student_ibfk_1` FOREIGN KEY (`account_id`) REFERENCES `account` (`account_id`);

--
-- Constraints for table `teacher`
--
ALTER TABLE `teacher`
  ADD CONSTRAINT `teacher_ibfk_1` FOREIGN KEY (`account_id`) REFERENCES `account` (`account_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
