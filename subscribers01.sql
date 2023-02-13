-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 12, 2023 at 04:37 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `subscribers01`
--

-- --------------------------------------------------------

--
-- Table structure for table `interests`
--

CREATE TABLE `interests` (
  `id` int NOT NULL,
  `interests_label` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `interests`
--

INSERT INTO `interests` (`id`, `interests_label`) VALUES
(1, 'Peinture'),
(2, 'Sculpture'),
(3, 'Photographie'),
(4, 'Art contemporain'),
(5, 'Films'),
(6, 'Art Numérique'),
(7, 'Installations');

-- --------------------------------------------------------

--
-- Table structure for table `origins`
--

CREATE TABLE `origins` (
  `id` int NOT NULL,
  `originLabel` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `origins`
--

INSERT INTO `origins` (`id`, `originLabel`) VALUES
(7, 'Un ami m\'en a parlé'),
(8, 'Recherche sur internet'),
(9, 'Publicité dans un magazine');

-- --------------------------------------------------------

--
-- Table structure for table `subscribers`
--

CREATE TABLE `subscribers` (
  `id` int NOT NULL,
  `created_on` datetime NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `firstname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `lastname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `origine_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subscribers`
--

INSERT INTO `subscribers` (`id`, `created_on`, `email`, `firstname`, `lastname`, `origine_id`) VALUES
(18, '2023-02-08 14:56:15', 'alfred.dupont@gmail.com', 'Alfred', 'Dupont', NULL),
(19, '2023-02-08 14:56:15', 'b.lav@hotmail.fr', 'Bertrand', 'Lavoisier', NULL),
(20, '2023-02-08 14:56:15', 'SarahLAMINE@gmail.com', 'Sarah', 'Lamine', NULL),
(21, '2023-02-08 14:56:15', 'mo78@laposte.net', 'Mohamed', 'Ben Salam', NULL),
(22, '2023-02-09 09:56:48', 'toto@gmail.com', 'Paco', 'POPO', 9),
(23, '2023-02-09 09:00:11', 'alfred.dupont@gmail.com', 'Alfred', 'Dupont', NULL),
(24, '2023-02-09 09:00:11', 'b.lav@hotmail.fr', 'Bertrand', 'Lavoisier', NULL),
(25, '2023-02-09 09:00:11', 'SarahLAMINE@gmail.com', 'Sarah', 'Lamine', NULL),
(26, '2023-02-09 09:00:11', 'mo78@laposte.net', 'Mohamed', 'Ben Salam', NULL),
(27, '2023-02-09 09:04:34', 'alfred.dupont@gmail.com', 'Alfred', 'Dupont', NULL),
(28, '2023-02-09 09:04:34', 'b.lav@hotmail.fr', 'Bertrand', 'Lavoisier', NULL),
(29, '2023-02-09 09:04:34', 'SarahLAMINE@gmail.com', 'Sarah', 'Lamine', NULL),
(30, '2023-02-09 09:04:34', 'mo78@laposte.net', 'Mohamed', 'Ben Salam', NULL),
(31, '2023-02-09 13:19:26', 'toto@gmail.com', 'Paco', 'POPO', 8),
(32, '2023-02-09 13:42:33', 'Clemjoulin@hotmail.fr', 'Paco', 'POPO', 8),
(33, '2023-02-09 15:04:21', 'toto@gmail.com', 'Paco', 'POPO', 8),
(34, '2023-02-09 15:28:32', 'toto@gmail.com', 'Paco', 'POPO', 9),
(35, '2023-02-09 17:12:46', 'toto@gmail.com', 'Paco', 'POPO', 9),
(36, '2023-02-09 17:13:04', 'toto@gmail.com', 'Paco', 'POPO', 9);

-- --------------------------------------------------------

--
-- Table structure for table `subscribers_interests`
--

CREATE TABLE `subscribers_interests` (
  `subscribers_id` int NOT NULL,
  `interests_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `interests`
--
ALTER TABLE `interests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `origins`
--
ALTER TABLE `origins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscribers`
--
ALTER TABLE `subscribers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fksubscribers` (`origine_id`);

--
-- Indexes for table `subscribers_interests`
--
ALTER TABLE `subscribers_interests`
  ADD KEY `fksubscribers_interests` (`interests_id`),
  ADD KEY `fksubscribers_id` (`subscribers_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `interests`
--
ALTER TABLE `interests`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `origins`
--
ALTER TABLE `origins`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `subscribers`
--
ALTER TABLE `subscribers`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `subscribers`
--
ALTER TABLE `subscribers`
  ADD CONSTRAINT `fksubscribers` FOREIGN KEY (`origine_id`) REFERENCES `origins` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `subscribers_interests`
--
ALTER TABLE `subscribers_interests`
  ADD CONSTRAINT `fksubscribers_id` FOREIGN KEY (`subscribers_id`) REFERENCES `subscribers` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `fksubscribers_interests` FOREIGN KEY (`interests_id`) REFERENCES `interests` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
