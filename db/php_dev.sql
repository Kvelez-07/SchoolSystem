-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 07, 2024 at 05:35 AM
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
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id_rol` int(11) NOT NULL,
  `description` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id_rol`, `description`) VALUES
(1, 'Admin'),
(2, 'Teacher'),
(3, 'Student'),
(4, 'Parent'),
(5, 'Guest');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp(),
  `password` varchar(255) NOT NULL,
  `user_type` enum('Admin','Guest','Teacher','Student','Parent') NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `id_card` int(11) NOT NULL,
  `nationality` varchar(255) NOT NULL,
  `birth_date` datetime NOT NULL,
  `blood_type` enum('B+','B-','A+','A-','AB+','AB-','O+','O-') NOT NULL,
  `address` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `dad_name` varchar(255) NOT NULL,
  `dad_phone` varchar(255) NOT NULL,
  `mom_name` varchar(255) NOT NULL,
  `mom_phone` varchar(255) NOT NULL,
  `id_rol` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `created`, `password`, `user_type`, `first_name`, `last_name`, `id_card`, `nationality`, `birth_date`, `blood_type`, `address`, `email`, `phone`, `dad_name`, `dad_phone`, `mom_name`, `mom_phone`, `id_rol`) VALUES
(22, 'Kvelez07', '2024-03-06 18:16:04', '$2y$10$tOFNCjOQrLv9oY.3DEMDX.2AvpoCneulUrDFZCkoLApRZLhyIe5WK', 'Student', 'Kevin', 'Velez', 118940941, 'Costa Rica', '2024-03-06 19:14:25', 'O+', 'Heredia', 'kvelez@gmail.com', '87020253', 'Dad', '#', 'Mom', '#', 3),
(23, 'Kvelez07', '2024-03-06 18:16:04', '$2y$10$tOFNCjOQrLv9oY.3DEMDX.2AvpoCneulUrDFZCkoLApRZLhyIe5WK', 'Teacher', 'Kevin', 'Velez', 118940941, 'Costa Rica', '2024-03-06 19:14:25', 'O+', 'Heredia', 'kvelez@gmail.com', '87020253', 'Dad', '#', 'Mom', '#', 2),
(24, 'Kvelez07', '2024-03-06 18:16:04', '$2y$10$tOFNCjOQrLv9oY.3DEMDX.2AvpoCneulUrDFZCkoLApRZLhyIe5WK', 'Admin', 'Kevin', 'Velez', 118940941, 'Costa Rica', '2024-03-06 19:14:25', 'O+', 'Heredia', 'kvelez@gmail.com', '87020253', 'Dad', '#', 'Mom', '#', 1),
(25, 'Kvelez07', '2024-03-06 18:16:04', '$2y$10$tOFNCjOQrLv9oY.3DEMDX.2AvpoCneulUrDFZCkoLApRZLhyIe5WK', 'Parent', 'Kevin', 'Velez', 118940941, 'Costa Rica', '2024-03-06 19:14:25', 'O+', 'Heredia', 'kvelez@gmail.com', '87020253', 'Dad', '#', 'Mom', '#', 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id_rol`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_rol` (`id_rol`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id_rol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`id_rol`) REFERENCES `roles` (`id_rol`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
