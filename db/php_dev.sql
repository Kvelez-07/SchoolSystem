-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 13, 2024 at 06:20 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `php_dev`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `email`) VALUES
(1, 'Kvelez07', '$2y$10$cmUXyvpsr8ifvHlcVH3FwulHLs0qpZCBhgRNgeLfJuLQhOf1Kn3Vq', 'kvelezsalazar07@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `justified` enum('Y','N') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `grades`
--

CREATE TABLE `grades` (
  `id` int(11) NOT NULL,
  `trimester` enum('1','2','3') NOT NULL,
  `grades` decimal(10,0) NOT NULL,
  `student_subject_student_id` int(11) NOT NULL,
  `student_subject_subject_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `grades`
--

INSERT INTO `grades` (`id`, `trimester`, `grades`, `student_subject_student_id`, `student_subject_subject_id`) VALUES
(1, '1', 100, 1, 1),
(2, '2', 100, 1, 1),
(3, '3', 100, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id_role` int(11) NOT NULL,
  `description` enum('Admin','Teacher','Student','Parent') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `day` enum('L','K','M','J','V') NOT NULL,
  `begins` enum('7am','9am','10am','2pm','3pm','4pm','5pm','6pm') NOT NULL,
  `ends` enum('10am','12pm','3pm','4pm','5pm','7pm','8pm','9pm') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`id`, `subject_id`, `day`, `begins`, `ends`) VALUES
(1, 1, 'L', '7am', '10am'),
(2, 2, 'L', '10am', '12pm'),
(3, 3, 'L', '2pm', '3pm'),
(4, 4, 'L', '3pm', '4pm'),
(5, 5, 'V', '7am', '10am'),
(6, 6, 'K', '7am', '10am'),
(7, 7, 'K', '10am', '12pm'),
(8, 8, 'K', '2pm', '3pm'),
(9, 9, 'K', '3pm', '4pm'),
(10, 10, 'V', '7am', '10am'),
(11, 11, 'M', '7am', '10am'),
(12, 12, 'M', '10am', '12pm'),
(13, 13, 'M', '2pm', '3pm'),
(14, 14, 'M', '3pm', '4pm'),
(15, 15, 'V', '7am', '10am'),
(16, 16, 'J', '7am', '10am'),
(17, 17, 'J', '10am', '12pm'),
(18, 18, 'J', '2pm', '3pm'),
(19, 19, 'J', '3pm', '4pm'),
(20, 20, 'V', '7am', '10am');

-- --------------------------------------------------------

--
-- Table structure for table `school_levels`
--

CREATE TABLE `school_levels` (
  `id` int(11) NOT NULL,
  `school_levels` enum('7','8','9','10','11') NOT NULL,
  `course` enum('spanish','social_studies','science','math') NOT NULL,
  `room` enum('1','2','3','4','5') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `school_levels`
--

INSERT INTO `school_levels` (`id`, `school_levels`, `course`, `room`) VALUES
(1, '7', 'spanish', '1'),
(2, '8', 'spanish', '1'),
(3, '9', 'spanish', '1'),
(4, '10', 'spanish', '1'),
(5, '11', 'spanish', '1'),
(6, '7', 'social_studies', '2'),
(7, '8', 'social_studies', '2'),
(8, '9', 'social_studies', '2'),
(9, '10', 'social_studies', '2'),
(10, '11', 'social_studies', '2'),
(11, '7', 'science', '3'),
(12, '8', 'science', '3'),
(13, '9', 'science', '3'),
(14, '10', 'science', '3'),
(15, '11', 'science', '3'),
(16, '7', 'math', '4'),
(17, '8', 'math', '4'),
(18, '9', 'math', '4'),
(19, '10', 'math', '4'),
(20, '11', 'math', '4');

-- --------------------------------------------------------

--
-- Table structure for table `specialties`
--

CREATE TABLE `specialties` (
  `id` int(11) NOT NULL,
  `description` enum('spanish','math','social_studies','science') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `specialties`
--

INSERT INTO `specialties` (`id`, `description`) VALUES
(1, 'spanish'),
(2, 'math'),
(3, 'social_studies'),
(4, 'science');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name1` varchar(255) NOT NULL,
  `last_name2` varchar(255) NOT NULL,
  `school_levels_id` int(11) NOT NULL,
  `birth` datetime NOT NULL DEFAULT current_timestamp(),
  `blood` enum('A+','A-','B+','B-','O+','O-','AB+','AB-') NOT NULL,
  `nationality` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `id_card` varchar(255) NOT NULL,
  `contact1_name` varchar(255) NOT NULL,
  `contact1_phone` varchar(255) NOT NULL,
  `contact2_name` varchar(255) NOT NULL,
  `contact2_phone` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `username`, `password`, `email`, `first_name`, `last_name1`, `last_name2`, `school_levels_id`, `birth`, `blood`, `nationality`, `address`, `phone`, `id_card`, `contact1_name`, `contact1_phone`, `contact2_name`, `contact2_phone`) VALUES
(1, 'Kvelez07', '$2y$10$DbZQ8qLuK0foTUdprhPBn.VY5m3r92BSevF7oE8lpEriOdlTgawj2', 'kvelezsalazar07@gmail.com', 'Kevin', 'Velez', 'Salazar', 1, '2024-03-09 00:00:00', 'A+', 'Costa Rica', 'Heredia', '87020253', '118940941', 'Dad', '0', 'Mom', '0');

-- --------------------------------------------------------

--
-- Table structure for table `student_subject`
--

CREATE TABLE `student_subject` (
  `subject_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `grade_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` int(11) NOT NULL,
  `school_levels_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `subject_name` enum('spanish','math','social_studies','science') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `school_levels_id`, `teacher_id`, `subject_name`) VALUES
(1, 1, 1, 'spanish');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name1` varchar(255) NOT NULL,
  `last_name2` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `specialty` enum('spanish','social_studies','science','math') NOT NULL,
  `birth` datetime NOT NULL DEFAULT current_timestamp(),
  `blood` enum('A+','A-','B+','B-','O+','O-','AB+','AB-') NOT NULL,
  `nationality` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `id_card` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`id`, `username`, `password`, `first_name`, `last_name1`, `last_name2`, `email`, `specialty`, `birth`, `blood`, `nationality`, `address`, `phone`, `id_card`) VALUES
(1, 'Kvelez07', '$2y$10$o0/YeidOHBVBuUmN9W6tYeFvDRorjEQL5Ryb/hsJpZ93f3WOeMV5i', 'Kevin', 'Velez', 'Salazar', 'kvelezsalazar@gmail.com', 'spanish', '2024-03-09 13:38:53', 'A+', 'Costa Rica', 'Heredia', '87020253', '0'),
(2, 'Kvelez07', '$2y$10$o0/YeidOHBVBuUmN9W6tYeFvDRorjEQL5Ryb/hsJpZ93f3WOeMV5i', 'Kevin', 'Velez', 'Salazar', 'kvelezsalazar@gmail.com', 'social_studies', '2024-03-09 13:38:53', 'A+', 'Costa Rica', 'Heredia', '87020253', '0'),
(3, 'Kvelez07', '$2y$10$o0/YeidOHBVBuUmN9W6tYeFvDRorjEQL5Ryb/hsJpZ93f3WOeMV5i', 'Kevin', 'Velez', 'Salazar', 'kvelezsalazar@gmail.com', 'science', '2024-03-09 13:38:53', 'A+', 'Costa Rica', 'Heredia', '87020253', '0'),
(4, 'Kvelez07', '$2y$10$o0/YeidOHBVBuUmN9W6tYeFvDRorjEQL5Ryb/hsJpZ93f3WOeMV5i', 'Kevin', 'Velez', 'Salazar', 'kvelezsalazar@gmail.com', 'math', '2024-03-09 13:38:53', 'A+', 'Costa Rica', 'Heredia', '87020253', '0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `subject_id` (`subject_id`);

--
-- Indexes for table `grades`
--
ALTER TABLE `grades`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_subject_student_id` (`student_subject_student_id`),
  ADD KEY `student_subject_subject_id` (`student_subject_subject_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id_role`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subject_id` (`subject_id`);

--
-- Indexes for table `school_levels`
--
ALTER TABLE `school_levels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `specialties`
--
ALTER TABLE `specialties`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`),
  ADD KEY `school_levels` (`school_levels_id`);

--
-- Indexes for table `student_subject`
--
ALTER TABLE `student_subject`
  ADD KEY `student_id` (`student_id`),
  ADD KEY `subject_id` (`subject_id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `school_levels` (`school_levels_id`),
  ADD KEY `teacher_id` (`teacher_id`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `grades`
--
ALTER TABLE `grades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `schedule`
--
ALTER TABLE `schedule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `school_levels`
--
ALTER TABLE `school_levels`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `specialties`
--
ALTER TABLE `specialties`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
