-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 05, 2024 at 11:13 PM
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
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp(),
  `password` varchar(255) NOT NULL,
  `user_type` enum('Admin','Guest','Teacher','Student') NOT NULL,
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
  `mom_phone` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `created`, `password`, `user_type`, `first_name`, `last_name`, `id_card`, `nationality`, `birth_date`, `blood_type`, `address`, `email`, `phone`, `dad_name`, `dad_phone`, `mom_name`, `mom_phone`) VALUES
(1, 'Kvelez', '2024-03-05 22:01:29', '$2y$10$c1eQnjVWkarK8Y0CenfxYOZrbzQrJZubtvzpUzW4deZTFiTezITsS', 'Admin', 'Kevin', 'Velez Salazar', 123, 'Costa Rica', '2024-03-05 00:00:00', 'A+', 'Heredia', 'kevin.velez0941@uhispano.ac.cr', '+50687020253', 'Dad', '#', 'Mom', '#');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
