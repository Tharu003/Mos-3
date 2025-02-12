-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 12, 2025 at 11:02 AM
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
-- Database: `student_data`
--

-- --------------------------------------------------------

--
-- Table structure for table `achievements`
--

CREATE TABLE `achievements` (
  `achievement_id` int(11) NOT NULL,
  `student_id` int(11) DEFAULT NULL,
  `school_achievement` text DEFAULT NULL,
  `district_achievement` text DEFAULT NULL,
  `provincial_achievement` text DEFAULT NULL,
  `national_achievement` text DEFAULT NULL,
  `international_achievement` text DEFAULT NULL,
  `club_info` text DEFAULT NULL,
  `is_active` varchar(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `achievements`
--

INSERT INTO `achievements` (`achievement_id`, `student_id`, `school_achievement`, `district_achievement`, `provincial_achievement`, `national_achievement`, `international_achievement`, `club_info`, `is_active`) VALUES
(15, 15, '', '', '', '', '', '', ''),
(16, 16, '', '', '', '', '', '', ''),
(17, 17, '', '', '', '', '', '', ''),
(18, 18, '', '', '', '', '', '', ''),
(19, 19, '', '', '', '', '', '', ''),
(20, 20, '', '', '', '', '', '', ''),
(21, 21, '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `coaches`
--

CREATE TABLE `coaches` (
  `coach_id` int(11) NOT NULL,
  `coach_name` varchar(100) DEFAULT NULL,
  `coach_district` varchar(100) DEFAULT NULL,
  `coach_address` varchar(255) DEFAULT NULL,
  `registered` varchar(3) DEFAULT NULL,
  `coach_nic` varchar(20) DEFAULT NULL,
  `coach_phone` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `coaches`
--

INSERT INTO `coaches` (`coach_id`, `coach_name`, `coach_district`, `coach_address`, `registered`, `coach_nic`, `coach_phone`) VALUES
(1, '', '', '', '', '', ''),
(2, '', '', '', '', '', ''),
(3, '', '', '', '', '', ''),
(4, '', '', '', '', '', ''),
(5, '', '', '', '', '', ''),
(6, '', '', '', '', '', ''),
(7, '', '', '', '', '', ''),
(8, '', '', '', '', '', ''),
(9, '', '', '', '', '', ''),
(10, '', '', '', '', '', ''),
(11, '', '', '', '', '', ''),
(12, '', '', '', '', '', ''),
(13, '', '', '', '', '', ''),
(14, 'saman gamge ', 'mathara', 'asaddvcfrf', 'ඔව්', '203323565', '20065565'),
(15, '', '', '', '', '', ''),
(16, '', '', '', '', '', ''),
(17, '', '', '', '', '', ''),
(18, '', '', '', '', '', ''),
(19, '', '', '', '', '', ''),
(20, '', '', '', '', '', ''),
(21, '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `event_names` varchar(255) DEFAULT NULL,
  `year` year(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `student_id`, `event_names`, `year`) VALUES
(1, 19, '', '0000'),
(2, 20, 'Football', '2025'),
(3, 20, 'Cricket', '2025'),
(4, 21, 'Football,Cricket', '2025');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `student_id` int(11) NOT NULL,
  `student_photo` varchar(255) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `full_name` varchar(150) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `district` varchar(100) DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `nic` varchar(20) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `school` varchar(150) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `grama_wasama` varchar(100) DEFAULT NULL,
  `divisional` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`student_id`, `student_photo`, `name`, `full_name`, `gender`, `district`, `birthday`, `nic`, `phone`, `school`, `email`, `address`, `grama_wasama`, `divisional`) VALUES
(1, 'Annotation 2024-02-27 220012.png', 'g', 'g', 'male', 'galle', '2025-02-12', '.', '', '', '', 'g', '', ''),
(2, 'Annotation 2024-02-27 220012.png', 'g', 'g', 'male', 'galle', '2025-02-12', '252652', '33036', '', 's@ga.com', 'g', '', ''),
(3, 'Annotation 2024-02-27 220012.png', 'g', 'g', 'male', 'galle', '2025-02-12', '252652', '33036', '', 's@ga.com', 'g', '', ''),
(4, 'Annotation 2024-02-27 220012.png', 'g', 'g', 'male', 'galle', '2025-02-12', '252652', '33036', '', 's@ga.com', 'g', 'g', 'g'),
(5, 'Annotation 2024-02-27 220012.png', 'g', 'g', 'male', 'galle', '2025-02-12', '252652', '33036', '', 's@ga.com', 'g', 'g', 'g'),
(6, 'Annotation 2024-02-27 220012.png', 'g', 'g', 'male', 'galle', '2025-02-12', '252652', '33036', '', 's@ga.com', 'g', '', ''),
(7, 'Annotation 2024-02-27 220012.png', 'g', 'g', 'male', 'galle', '2025-02-12', '252652', '33036', '', 's@ga.com', 'g', 'g', 'g'),
(8, 'Annotation 2024-02-27 220012.png', 'g', 'g', 'male', 'galle', '2025-02-12', '252652', '33036', '', 's@ga.com', 'g', 'g', 'g'),
(9, 'Annotation 2024-02-27 220012.png', 'g', 'g', 'male', 'galle', '2025-02-12', '252652', '33036', '', 's@ga.com', 'g', 'g', 'g'),
(10, '', '', '', '', '', '0000-00-00', '', '', '', '', '', '', ''),
(11, '', '', '', '', '', '0000-00-00', '', '', '', '', '', '', ''),
(12, '', '', '', '', '', '0000-00-00', '', '', '', '', '', '', ''),
(13, '', '', '', '', '', '0000-00-00', '', '', '', '', '', '', ''),
(14, 'Annotation 2024-02-27 145939.png', 'sashika vishmith ', 'nayakkara sashika vishmith ', 'male', 'galle', '2008-06-10', '20220223263', '012553666969', '', 'sas@gmail.com', 'Address', 'gramna', 'divisional'),
(15, '', '', '', '', '', '0000-00-00', '', '', '', '', '', '', ''),
(16, '', '', '', '', '', '0000-00-00', '', '', '', '', '', '', ''),
(17, '', '', '', '', '', '0000-00-00', '', '', '', '', '', '', ''),
(18, '', '', '', '', '', '0000-00-00', '', '', 'assadsds', '', '', '', ''),
(19, '', '', '', '', '', '0000-00-00', '', '', '', '', '', '', ''),
(20, '', '', '', '', '', '0000-00-00', '', '', '', '', '', '', ''),
(21, '', '', '', '', '', '0000-00-00', '', '', '', '', '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `achievements`
--
ALTER TABLE `achievements`
  ADD PRIMARY KEY (`achievement_id`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `coaches`
--
ALTER TABLE `coaches`
  ADD PRIMARY KEY (`coach_id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`student_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `achievements`
--
ALTER TABLE `achievements`
  MODIFY `achievement_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `coaches`
--
ALTER TABLE `coaches`
  MODIFY `coach_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `achievements`
--
ALTER TABLE `achievements`
  ADD CONSTRAINT `achievements_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `students` (`student_id`);

--
-- Constraints for table `events`
--
ALTER TABLE `events`
  ADD CONSTRAINT `events_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `students` (`student_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
