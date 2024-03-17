-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 17, 2024 at 02:32 AM
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

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`id`, `student_id`, `subject_id`, `date`, `justified`) VALUES
(1, 1, 1, '2024-03-16', 'Y'),
(2, 2, 2, '2024-03-16', 'Y'),
(3, 3, 3, '2024-03-16', 'Y'),
(4, 4, 4, '2024-03-16', 'Y'),
(5, 5, 5, '2024-03-16', 'Y'),
(6, 6, 6, '2024-03-16', 'Y'),
(7, 7, 7, '2024-03-16', 'Y'),
(8, 8, 8, '2024-03-16', 'Y'),
(9, 9, 9, '2024-03-16', 'Y'),
(10, 10, 10, '2024-03-16', 'Y'),
(11, 11, 11, '2024-03-16', 'Y'),
(12, 12, 12, '2024-03-16', 'Y'),
(13, 13, 13, '2024-03-16', 'Y'),
(14, 14, 14, '2024-03-16', 'Y'),
(15, 15, 15, '2024-03-16', 'Y'),
(16, 16, 16, '2024-03-16', 'Y'),
(17, 17, 17, '2024-03-16', 'Y'),
(18, 18, 18, '2024-03-16', 'Y'),
(19, 19, 19, '2024-03-16', 'Y'),
(20, 20, 20, '2024-03-16', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `grades`
--

CREATE TABLE `grades` (
  `id` int(11) NOT NULL,
  `trimester` enum('1','2','3') NOT NULL,
  `grades` decimal(10,0) NOT NULL,
  `student_has_subject_student_id` int(11) DEFAULT NULL,
  `student_has_subject_subject_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `grades`
--

INSERT INTO `grades` (`id`, `trimester`, `grades`, `student_has_subject_student_id`, `student_has_subject_subject_id`) VALUES
(1, '1', 100, 1, 1),
(2, '2', 100, 1, 1),
(3, '3', 100, 1, 1),
(4, '1', 100, 2, 2),
(5, '2', 100, 2, 2),
(6, '3', 100, 2, 2),
(7, '1', 100, 3, 3),
(8, '2', 100, 3, 3),
(9, '3', 100, 3, 3),
(10, '1', 100, 4, 4),
(11, '2', 100, 4, 4),
(12, '3', 100, 4, 4),
(13, '1', 100, 5, 5),
(14, '2', 100, 5, 5),
(15, '3', 100, 5, 5),
(16, '1', 100, 6, 6),
(17, '2', 100, 6, 6),
(18, '3', 100, 6, 6),
(19, '1', 100, 7, 7),
(20, '2', 100, 7, 7),
(21, '3', 100, 7, 7),
(22, '1', 100, 8, 8),
(23, '2', 100, 8, 8),
(24, '3', 100, 8, 8),
(25, '1', 100, 9, 9),
(26, '2', 100, 9, 9),
(27, '3', 100, 9, 9),
(28, '1', 100, 10, 10),
(29, '2', 100, 10, 10),
(30, '3', 100, 10, 10),
(31, '1', 100, 11, 11),
(32, '2', 100, 11, 11),
(33, '3', 100, 11, 11),
(34, '1', 100, 12, 12),
(35, '2', 100, 12, 12),
(36, '3', 100, 12, 12),
(37, '1', 100, 13, 13),
(38, '2', 100, 13, 13),
(39, '3', 100, 13, 13),
(40, '1', 100, 14, 14),
(41, '2', 100, 14, 14),
(42, '3', 100, 14, 14),
(43, '1', 100, 15, 15),
(44, '2', 100, 15, 15),
(45, '3', 100, 15, 15),
(46, '1', 100, 16, 16),
(47, '2', 100, 16, 16),
(48, '3', 100, 16, 16),
(49, '1', 100, 17, 17),
(50, '2', 100, 17, 17),
(51, '3', 100, 17, 17),
(52, '1', 100, 18, 18),
(53, '2', 100, 18, 18),
(54, '3', 100, 18, 18),
(55, '1', 100, 19, 19),
(56, '2', 100, 19, 19),
(57, '3', 100, 19, 19),
(58, '1', 100, 20, 20),
(59, '2', 100, 20, 20),
(60, '3', 100, 20, 20);

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
(1, 'Kvelez07', '$2y$10$DbZQ8qLuK0foTUdprhPBn.VY5m3r92BSevF7oE8lpEriOdlTgawj2', 'kvelez@gmail.com', 'Kevin', 'Velez', 'Salazar', 1, '2024-03-09 00:00:00', 'A+', 'Costa Rica', 'Heredia', '87020253', '118940941', 'Dad', '0', 'Mom', '0'),
(2, 'Aliha07', '$2y$10$DbZQ8qLuK0foTUdprhPBn.VY5m3r92BSevF7oE8lpEriOdlTgawj2', 'aliha@gmail.com', 'Aliha', 'Brooks', 'Brooks', 2, '2024-03-09 00:00:00', 'A+', 'Costa Rica', 'Heredia', '87020253', '118940941', 'Dad', '0', 'Mom', '0'),
(3, 'Franny07', '$2y$10$DbZQ8qLuK0foTUdprhPBn.VY5m3r92BSevF7oE8lpEriOdlTgawj2', 'franny@gmail.com', 'Franny', 'Ocampo', 'Ocampo', 3, '2024-03-09 00:00:00', 'A+', 'Costa Rica', 'Heredia', '87020253', '118940941', 'Dad', '0', 'Mom', '0'),
(4, 'Andres07', '$2y$10$DbZQ8qLuK0foTUdprhPBn.VY5m3r92BSevF7oE8lpEriOdlTgawj2', 'andres@gmail.com', 'Andres', 'Guerra', 'Guerra', 4, '2024-03-09 00:00:00', 'A+', 'Costa Rica', 'Heredia', '87020253', '118940941', 'Dad', '0', 'Mom', '0'),
(5, 'Royner07', '$2y$10$DbZQ8qLuK0foTUdprhPBn.VY5m3r92BSevF7oE8lpEriOdlTgawj2', 'royner@gmail.com', 'Royner', 'Luna', 'Luna', 5, '2024-03-09 00:00:00', 'A+', 'Costa Rica', 'Heredia', '87020253', '118940941', 'Dad', '0', 'Mom', '0'),
(6, 'Kvelez07', '$2y$10$DbZQ8qLuK0foTUdprhPBn.VY5m3r92BSevF7oE8lpEriOdlTgawj2', 'kvelez@gmail.com', 'Kevin', 'Velez', 'Salazar', 6, '2024-03-09 00:00:00', 'A+', 'Costa Rica', 'Heredia', '87020253', '118940941', 'Dad', '0', 'Mom', '0'),
(7, 'Aliha07', '$2y$10$DbZQ8qLuK0foTUdprhPBn.VY5m3r92BSevF7oE8lpEriOdlTgawj2', 'aliha@gmail.com', 'Aliha', 'Brooks', 'Brooks', 7, '2024-03-09 00:00:00', 'A+', 'Costa Rica', 'Heredia', '87020253', '118940941', 'Dad', '0', 'Mom', '0'),
(8, 'Franny07', '$2y$10$DbZQ8qLuK0foTUdprhPBn.VY5m3r92BSevF7oE8lpEriOdlTgawj2', 'franny@gmail.com', 'Franny', 'Ocampo', 'Ocampo', 8, '2024-03-09 00:00:00', 'A+', 'Costa Rica', 'Heredia', '87020253', '118940941', 'Dad', '0', 'Mom', '0'),
(9, 'Andres07', '$2y$10$DbZQ8qLuK0foTUdprhPBn.VY5m3r92BSevF7oE8lpEriOdlTgawj2', 'andres@gmail.com', 'Andres', 'Guerra', 'Guerra', 9, '2024-03-09 00:00:00', 'A+', 'Costa Rica', 'Heredia', '87020253', '118940941', 'Dad', '0', 'Mom', '0'),
(10, 'Royner07', '$2y$10$DbZQ8qLuK0foTUdprhPBn.VY5m3r92BSevF7oE8lpEriOdlTgawj2', 'royner@gmail.com', 'Royner', 'Luna', 'Luna', 10, '2024-03-09 00:00:00', 'A+', 'Costa Rica', 'Heredia', '87020253', '118940941', 'Dad', '0', 'Mom', '0'),
(11, 'Kvelez07', '$2y$10$DbZQ8qLuK0foTUdprhPBn.VY5m3r92BSevF7oE8lpEriOdlTgawj2', 'kvelez@gmail.com', 'Kevin', 'Velez', 'Salazar', 11, '2024-03-09 00:00:00', 'A+', 'Costa Rica', 'Heredia', '87020253', '118940941', 'Dad', '0', 'Mom', '0'),
(12, 'Aliha07', '$2y$10$DbZQ8qLuK0foTUdprhPBn.VY5m3r92BSevF7oE8lpEriOdlTgawj2', 'aliha@gmail.com', 'Aliha', 'Brooks', 'Brooks', 12, '2024-03-09 00:00:00', 'A+', 'Costa Rica', 'Heredia', '87020253', '118940941', 'Dad', '0', 'Mom', '0'),
(13, 'Franny07', '$2y$10$DbZQ8qLuK0foTUdprhPBn.VY5m3r92BSevF7oE8lpEriOdlTgawj2', 'franny@gmail.com', 'Franny', 'Ocampo', 'Ocampo', 13, '2024-03-09 00:00:00', 'A+', 'Costa Rica', 'Heredia', '87020253', '118940941', 'Dad', '0', 'Mom', '0'),
(14, 'Andres07', '$2y$10$DbZQ8qLuK0foTUdprhPBn.VY5m3r92BSevF7oE8lpEriOdlTgawj2', 'andres@gmail.com', 'Andres', 'Guerra', 'Guerra', 14, '2024-03-09 00:00:00', 'A+', 'Costa Rica', 'Heredia', '87020253', '118940941', 'Dad', '0', 'Mom', '0'),
(15, 'Royner07', '$2y$10$DbZQ8qLuK0foTUdprhPBn.VY5m3r92BSevF7oE8lpEriOdlTgawj2', 'royner@gmail.com', 'Royner', 'Luna', 'Luna', 15, '2024-03-09 00:00:00', 'A+', 'Costa Rica', 'Heredia', '87020253', '118940941', 'Dad', '0', 'Mom', '0'),
(16, 'Kvelez07', '$2y$10$DbZQ8qLuK0foTUdprhPBn.VY5m3r92BSevF7oE8lpEriOdlTgawj2', 'kvelez@gmail.com', 'Kevin', 'Velez', 'Salazar', 16, '2024-03-09 00:00:00', 'A+', 'Costa Rica', 'Heredia', '87020253', '118940941', 'Dad', '0', 'Mom', '0'),
(17, 'Aliha07', '$2y$10$DbZQ8qLuK0foTUdprhPBn.VY5m3r92BSevF7oE8lpEriOdlTgawj2', 'aliha@gmail.com', 'Aliha', 'Brooks', 'Brooks', 17, '2024-03-09 00:00:00', 'A+', 'Costa Rica', 'Heredia', '87020253', '118940941', 'Dad', '0', 'Mom', '0'),
(18, 'Franny07', '$2y$10$DbZQ8qLuK0foTUdprhPBn.VY5m3r92BSevF7oE8lpEriOdlTgawj2', 'franny@gmail.com', 'Franny', 'Ocampo', 'Ocampo', 18, '2024-03-09 00:00:00', 'A+', 'Costa Rica', 'Heredia', '87020253', '118940941', 'Dad', '0', 'Mom', '0'),
(19, 'Andres07', '$2y$10$DbZQ8qLuK0foTUdprhPBn.VY5m3r92BSevF7oE8lpEriOdlTgawj2', 'andres@gmail.com', 'Andres', 'Guerra', 'Guerra', 19, '2024-03-09 00:00:00', 'A+', 'Costa Rica', 'Heredia', '87020253', '118940941', 'Dad', '0', 'Mom', '0'),
(20, 'Royner07', '$2y$10$DbZQ8qLuK0foTUdprhPBn.VY5m3r92BSevF7oE8lpEriOdlTgawj2', 'royner@gmail.com', 'Royner', 'Luna', 'Luna', 20, '2024-03-09 00:00:00', 'A+', 'Costa Rica', 'Heredia', '87020253', '118940941', 'Dad', '0', 'Mom', '0');

-- --------------------------------------------------------

--
-- Table structure for table `student_has_subject`
--

CREATE TABLE `student_has_subject` (
  `id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `grades_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student_has_subject`
--

INSERT INTO `student_has_subject` (`id`, `subject_id`, `student_id`, `grades_id`) VALUES
(1, 1, 1, 1),
(2, 1, 1, 2),
(3, 1, 1, 3),
(4, 2, 2, 4),
(5, 2, 2, 5),
(6, 2, 2, 6),
(7, 3, 3, 7),
(8, 3, 3, 8),
(9, 3, 3, 9),
(10, 4, 4, 10),
(11, 4, 4, 11),
(12, 4, 4, 12),
(13, 5, 5, 13),
(14, 5, 5, 14),
(15, 5, 5, 15),
(16, 6, 6, 16),
(17, 6, 6, 17),
(18, 6, 6, 18),
(19, 7, 7, 19),
(20, 7, 7, 20),
(21, 7, 7, 21),
(22, 8, 8, 22),
(23, 8, 8, 23),
(24, 8, 8, 24),
(25, 9, 9, 25),
(26, 9, 9, 26),
(27, 9, 9, 27),
(28, 10, 10, 28),
(29, 10, 10, 29),
(30, 10, 10, 30),
(31, 11, 11, 31),
(32, 11, 11, 32),
(33, 11, 11, 33),
(34, 12, 12, 34),
(35, 12, 12, 35),
(36, 12, 12, 36),
(37, 13, 13, 37),
(38, 13, 13, 38),
(39, 13, 13, 39),
(40, 14, 14, 40),
(41, 14, 14, 41),
(42, 14, 14, 42),
(43, 15, 15, 43),
(44, 15, 15, 44),
(45, 15, 15, 45),
(46, 16, 16, 46),
(47, 16, 16, 47),
(48, 16, 16, 48),
(49, 17, 17, 49),
(50, 17, 17, 50),
(51, 17, 17, 51),
(52, 18, 18, 52),
(53, 18, 18, 53),
(54, 18, 18, 54),
(55, 19, 19, 55),
(56, 19, 19, 56),
(57, 19, 19, 57),
(58, 20, 20, 58),
(59, 20, 20, 59),
(60, 20, 20, 60);

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
(1, 1, 1, 'spanish'),
(2, 2, 2, 'spanish'),
(3, 3, 3, 'spanish'),
(4, 4, 4, 'spanish'),
(5, 5, 5, 'spanish'),
(6, 6, 6, 'social_studies'),
(7, 7, 7, 'social_studies'),
(8, 8, 8, 'social_studies'),
(9, 9, 9, 'social_studies'),
(10, 10, 10, 'social_studies'),
(11, 11, 11, 'science'),
(12, 12, 12, 'science'),
(13, 13, 13, 'science'),
(14, 14, 14, 'science'),
(15, 15, 15, 'science'),
(16, 16, 16, 'math'),
(17, 17, 17, 'math'),
(18, 18, 18, 'math'),
(19, 19, 19, 'math'),
(20, 20, 20, 'math');

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
(2, 'Aliha07', '$2y$10$o0/YeidOHBVBuUmN9W6tYeFvDRorjEQL5Ryb/hsJpZ93f3WOeMV5i', 'Aliha', 'Brooks', 'Brooks', 'alihabrooks@gmail.com', 'spanish', '2024-03-09 13:38:53', 'A+', 'Costa Rica', 'Heredia', '87020253', '0'),
(3, 'Franny07', '$2y$10$o0/YeidOHBVBuUmN9W6tYeFvDRorjEQL5Ryb/hsJpZ93f3WOeMV5i', 'Franny', 'Ocampo', 'Ocampo', 'frannyocampo@gmail.com', 'spanish', '2024-03-09 13:38:53', 'A+', 'Costa Rica', 'Heredia', '87020253', '0'),
(4, 'Andres07', '$2y$10$o0/YeidOHBVBuUmN9W6tYeFvDRorjEQL5Ryb/hsJpZ93f3WOeMV5i', 'Andres', 'Guerra', 'Guerra', 'andresguerra@gmail.com', 'spanish', '2024-03-09 13:38:53', 'A+', 'Costa Rica', 'Heredia', '87020253', '0'),
(5, 'Royner07', '$2y$10$o0/YeidOHBVBuUmN9W6tYeFvDRorjEQL5Ryb/hsJpZ93f3WOeMV5i', 'Royner', 'Luna', 'Luna', 'roynerluna@gmail.com', 'spanish', '2024-03-09 13:38:53', 'A+', 'Costa Rica', 'Heredia', '87020253', '0'),
(6, 'Kvelez07', '$2y$10$o0/YeidOHBVBuUmN9W6tYeFvDRorjEQL5Ryb/hsJpZ93f3WOeMV5i', 'Kevin', 'Velez', 'Salazar', 'kvelezsalazar@gmail.com', 'social_studies', '2024-03-09 13:38:53', 'A+', 'Costa Rica', 'Heredia', '87020253', '0'),
(7, 'Aliha07', '$2y$10$o0/YeidOHBVBuUmN9W6tYeFvDRorjEQL5Ryb/hsJpZ93f3WOeMV5i', 'Aliha', 'Brooks', 'Brooks', 'alihabrooks@gmail.com', 'social_studies', '2024-03-09 13:38:53', 'A+', 'Costa Rica', 'Heredia', '87020253', '0'),
(8, 'Franny07', '$2y$10$o0/YeidOHBVBuUmN9W6tYeFvDRorjEQL5Ryb/hsJpZ93f3WOeMV5i', 'Franny', 'Ocampo', 'Ocampo', 'frannyocampo@gmail.com', 'social_studies', '2024-03-09 13:38:53', 'A+', 'Costa Rica', 'Heredia', '87020253', '0'),
(9, 'Andres07', '$2y$10$o0/YeidOHBVBuUmN9W6tYeFvDRorjEQL5Ryb/hsJpZ93f3WOeMV5i', 'Andres', 'Guerra', 'Guerra', 'andresguerra@gmail.com', 'social_studies', '2024-03-09 13:38:53', 'A+', 'Costa Rica', 'Heredia', '87020253', '0'),
(10, 'Royner07', '$2y$10$o0/YeidOHBVBuUmN9W6tYeFvDRorjEQL5Ryb/hsJpZ93f3WOeMV5i', 'Royner', 'Luna', 'Luna', 'roynerluna@gmail.com', 'social_studies', '2024-03-09 13:38:53', 'A+', 'Costa Rica', 'Heredia', '87020253', '0'),
(11, 'Kvelez07', '$2y$10$o0/YeidOHBVBuUmN9W6tYeFvDRorjEQL5Ryb/hsJpZ93f3WOeMV5i', 'Kevin', 'Velez', 'Salazar', 'kvelezsalazar@gmail.com', 'science', '2024-03-09 13:38:53', 'A+', 'Costa Rica', 'Heredia', '87020253', '0'),
(12, 'Aliha07', '$2y$10$o0/YeidOHBVBuUmN9W6tYeFvDRorjEQL5Ryb/hsJpZ93f3WOeMV5i', 'Aliha', 'Brooks', 'Brooks', 'alihabrooks@gmail.com', 'science', '2024-03-09 13:38:53', 'A+', 'Costa Rica', 'Heredia', '87020253', '0'),
(13, 'Franny07', '$2y$10$o0/YeidOHBVBuUmN9W6tYeFvDRorjEQL5Ryb/hsJpZ93f3WOeMV5i', 'Franny', 'Ocampo', 'Ocampo', 'frannyocampo@gmail.com', 'science', '2024-03-09 13:38:53', 'A+', 'Costa Rica', 'Heredia', '87020253', '0'),
(14, 'Andres07', '$2y$10$o0/YeidOHBVBuUmN9W6tYeFvDRorjEQL5Ryb/hsJpZ93f3WOeMV5i', 'Andres', 'Guerra', 'Guerra', 'andresguerra@gmail.com', 'science', '2024-03-09 13:38:53', 'A+', 'Costa Rica', 'Heredia', '87020253', '0'),
(15, 'Royner07', '$2y$10$o0/YeidOHBVBuUmN9W6tYeFvDRorjEQL5Ryb/hsJpZ93f3WOeMV5i', 'Royner', 'Luna', 'Luna', 'roynerluna@gmail.com', 'science', '2024-03-09 13:38:53', 'A+', 'Costa Rica', 'Heredia', '87020253', '0'),
(16, 'Kvelez07', '$2y$10$o0/YeidOHBVBuUmN9W6tYeFvDRorjEQL5Ryb/hsJpZ93f3WOeMV5i', 'Kevin', 'Velez', 'Salazar', 'kvelezsalazar@gmail.com', 'math', '2024-03-09 13:38:53', 'A+', 'Costa Rica', 'Heredia', '87020253', '0'),
(17, 'Aliha07', '$2y$10$o0/YeidOHBVBuUmN9W6tYeFvDRorjEQL5Ryb/hsJpZ93f3WOeMV5i', 'Aliha', 'Brooks', 'Brooks', 'alihabrooks@gmail.com', 'math', '2024-03-09 13:38:53', 'A+', 'Costa Rica', 'Heredia', '87020253', '0'),
(18, 'Franny07', '$2y$10$o0/YeidOHBVBuUmN9W6tYeFvDRorjEQL5Ryb/hsJpZ93f3WOeMV5i', 'Franny', 'Ocampo', 'Ocampo', 'frannyocampo@gmail.com', 'math', '2024-03-09 13:38:53', 'A+', 'Costa Rica', 'Heredia', '87020253', '0'),
(19, 'Andres07', '$2y$10$o0/YeidOHBVBuUmN9W6tYeFvDRorjEQL5Ryb/hsJpZ93f3WOeMV5i', 'Andres', 'Guerra', 'Guerra', 'andresguerra@gmail.com', 'math', '2024-03-09 13:38:53', 'A+', 'Costa Rica', 'Heredia', '87020253', '0'),
(20, 'Royner07', '$2y$10$o0/YeidOHBVBuUmN9W6tYeFvDRorjEQL5Ryb/hsJpZ93f3WOeMV5i', 'Royner', 'Luna', 'Luna', 'roynerluna@gmail.com', 'math', '2024-03-09 13:38:53', 'A+', 'Costa Rica', 'Heredia', '87020253', '0');

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
  ADD KEY `student_subject_student_id` (`student_has_subject_student_id`),
  ADD KEY `student_subject_subject_id` (`student_has_subject_subject_id`);

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
-- Indexes for table `student_has_subject`
--
ALTER TABLE `student_has_subject`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subject_id` (`subject_id`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `grade_id` (`grades_id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `grades`
--
ALTER TABLE `grades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `student_has_subject`
--
ALTER TABLE `student_has_subject`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `grades`
--
ALTER TABLE `grades`
  ADD CONSTRAINT `grades_ibfk_1` FOREIGN KEY (`id`) REFERENCES `student_has_subject` (`grades_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `school_levels`
--
ALTER TABLE `school_levels`
  ADD CONSTRAINT `school_levels_ibfk_1` FOREIGN KEY (`id`) REFERENCES `subjects` (`school_levels_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `student_ibfk_1` FOREIGN KEY (`school_levels_id`) REFERENCES `school_levels` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `student_ibfk_2` FOREIGN KEY (`id`) REFERENCES `student_has_subject` (`student_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `student_has_subject`
--
ALTER TABLE `student_has_subject`
  ADD CONSTRAINT `student_has_subject_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `grades` (`student_has_subject_student_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `student_has_subject_ibfk_2` FOREIGN KEY (`subject_id`) REFERENCES `grades` (`student_has_subject_subject_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `subjects`
--
ALTER TABLE `subjects`
  ADD CONSTRAINT `subjects_ibfk_1` FOREIGN KEY (`id`) REFERENCES `student_has_subject` (`subject_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `teacher`
--
ALTER TABLE `teacher`
  ADD CONSTRAINT `teacher_ibfk_1` FOREIGN KEY (`id`) REFERENCES `subjects` (`teacher_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
