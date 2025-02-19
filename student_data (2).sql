-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 19, 2025 at 10:30 AM
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
(1, 19, '141', '1414', '141', '141', '1414', 'zsds', 'ඔව්'),
(2, 1, 'Best Athlete of Galle Central College', '2020', '2021', '2022', '2023', 'Athletics Club, Galle Central College', '1'),
(3, 2, 'Best Student of Matara Girls School', '2020', '2021', '2022', '2023', 'Science Club, Matara Girls School', '1'),
(4, 3, 'Best Sportsman of Hambanthota National School', '2020', '2021', '2022', '2023', 'Cricket Club, Hambanthota National School', '1'),
(5, 4, 'Top Performer in Galle Girls School', '2020', '2021', '2022', '2023', 'Debate Club, Galle Girls School', '1'),
(6, 5, 'Best Mathematician at Matara College', '2020', '2021', '2022', '2023', 'Math Club, Matara College', '1'),
(7, 6, 'Best Footballer at Hambanthota Royal College', '2020', '2021', '2022', '2023', 'Football Club, Hambanthota Royal College', '1'),
(8, 7, 'Best Performer in Galle Girls College', '2020', '2021', '2022', '2023', 'Science Club, Galle Girls College', '1'),
(9, 8, 'Outstanding Student of Matara Junior School', '2020', '2021', '2022', '2023', 'Swimming Club, Matara Junior School', '1'),
(10, 9, 'Best Artist at Hambanthota Girls School', '2020', '2021', '2022', '2023', 'Art Club, Hambanthota Girls School', '1'),
(11, 10, 'Best Musician at Galle National College', '2020', '2021', '2022', '2023', 'Music Club, Galle National College', '1'),
(12, 20, '', '', '', '', '', '', ''),
(13, 21, '22', '22', '22', '22', '22', 'club', 'නැත'),
(14, 22, '', '', '', '', '', '', '');

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
(1, 'John Doe', 'Galle', '123 Main Street, Galle', 'ඔව්', '123456789V', '0712345678'),
(2, 'Jane Smith', 'Matara', '456 Beach Road, Matara', 'නැත', '234567890V', '0723456789'),
(3, 'Michael Johnson', 'Hambanthota', '789 Hilltop Avenue, Hambanthota', 'ඔව්', '345678901V', '0734567890'),
(4, 'Emily Davis', 'Galle', '321 Coastal Lane, Galle', 'නැත', '456789012V', '0745678901'),
(5, 'David Wilson', 'Matara', '654 Green Park, Matara', 'ඔව්', '567890123V', '0756789012'),
(6, 'Sophia Taylor', 'Hambanthota', '987 Ocean Drive, Hambanthota', 'නැත', '678901234V', '0767890123'),
(7, 'James Brown', 'Galle', '135 Sunset Boulevard, Galle', 'ඔව්', '789012345V', '0778901234'),
(10, 'em', '', '', '', '', ''),
(11, 'John Doe', 'galle', '123 Main Street, Galle', 'ඔව්', '123456789V', '0712345678'),
(12, '', '', '', '', '', ''),
(13, 'David Wilson', '', '654 Green Park, Matara', 'ඔව්', '567890123V', '0756789012'),
(14, '', '', '', '', '', '');

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
(1, 19, 'Cricket, Tennis-aaa', '2025'),
(2, 19, 'badminton, tennis', '2024'),
(3, 21, 'Basketball, Tennis', '2025');

-- --------------------------------------------------------

--
-- Table structure for table `sports`
--

CREATE TABLE `sports` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sports`
--

INSERT INTO `sports` (`id`, `name`) VALUES
(1, 'Football'),
(2, 'Cricket'),
(3, 'Basketball'),
(4, 'Tennis'),
(5, 'Badminton'),
(6, 'Rugby'),
(7, 'Volleyball'),
(8, 'Hockey'),
(9, 'Table Tennis'),
(10, 'Baseball');

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
  `divisional` varchar(100) DEFAULT NULL,
  `coach_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`student_id`, `student_photo`, `name`, `full_name`, `gender`, `district`, `birthday`, `nic`, `phone`, `school`, `email`, `address`, `grama_wasama`, `divisional`, `coach_name`) VALUES
(1, 'student1.jpg', 'Nimal Perera', 'Nimal Chamara Perera', 'Male', 'Galle', '2003-05-14', '950123456V', '0771234567', 'Galle Central College', 'nimal.perera@example.com', '123, Galle Road, Galle', 'Kurunduwatta', 'Galle Division', 'Dinesh Kumarasinghe'),
(2, 'student2.jpg', 'Kavindi Silva', 'Kavindi Shanika Silva', 'Female', 'Matara', '2004-02-28', '920234567V', '0712345678', 'Matara Girls School', 'kavindi.silva@example.com', '45, Matara Town, Matara', 'Mihindukulasuriyagama', 'Matara Division', 'Saman Jayasinghe'),
(3, 'student3.jpg', 'Ruwan Kumarasinghe', 'Ruwan Pradeep Kumarasinghe', 'Male', 'Hambanthota', '2003-08-09', '960345678V', '0723456789', 'Hambanthota National School', 'ruwan.kumarasinghe@example.com', '78, Hambanthota Road, Hambanthota', 'Wewurukannala', 'Hambanthota Division', 'Chinthaka Herath'),
(4, 'student4.jpg', 'Nadeesha Fernando', 'Nadeesha Kumari Fernando', 'Female', 'Galle', '2005-12-15', '980456789V', '0784567890', 'Galle Girls School', 'nadeesha.fernando@example.com', '120, Boossa, Galle', 'Boossa', 'Galle Division', 'Pradeep Senanayake'),
(5, 'student5.jpg', 'Saman Bandara', 'Saman Lakshan Bandara', 'Male', 'Matara', '2002-10-22', '910567890V', '0755678901', 'Matara College', 'saman.bandara@example.com', '87, Matara City, Matara', 'Katugoda', 'Matara Division', 'Ravindra Perera'),
(6, 'student6.jpg', 'Tharindu Jayawardena', 'Tharindu Madushan Jayawardena', 'Male', 'Hambanthota', '2004-04-30', '970678901V', '0736789012', 'Hambanthota Royal College', 'tharindu.jayawardena@example.com', '55, Hakmana Road, Hambanthota', 'Hakmana', 'Hambanthota Division', 'Rohan Fernando'),
(7, 'student7.jpg', 'Chamari Jayasinghe', 'Chamari Kumari Jayasinghe', 'Female', 'Galle', '2003-01-18', '940789012V', '0747890123', 'Galle Girls College', 'chamari.jayasinghe@example.com', '22, Beach Road, Galle', 'Mihintale', 'Galle Division', 'Sanath Perera'),
(8, 'student8.jpg', 'Dinusha Gunawardena', 'Dinusha Lakshan Gunawardena', 'Male', 'Matara', '2005-07-25', '930890123V', '0768901234', 'Matara Junior School', 'dinusha.gunawardena@example.com', '31, Matara North, Matara', 'Agalawatta', 'Matara Division', 'Kusal Perera'),
(9, 'student9.jpg', 'Prabhashini Perera', 'Prabhashini Nadeesha Perera', 'Female', 'Hambanthota', '2004-11-12', '960123456V', '0772345678', 'Hambanthota Girls School', 'prabhashini.perera@example.com', '66, Galle Road, Hambanthota', 'Kiriwella', 'Hambanthota Division', 'Kasun Nandana'),
(10, 'student10.jpg', 'Buddhi Sanjeewa', 'Buddhi Madushan Sanjeewa', 'Male', 'Galle', '2002-06-05', '950234567V', '0783456789', 'Galle National College', 'buddhi.sanjeewa@example.com', '123, Duwawatta, Galle', 'Udugama', 'Galle Division', 'Sujeewa Perera'),
(19, '59899c60e8ba31348e9537e363aa152e.jpg', 'sashika', 'sashiika vishmith', 'male', 'galle', '0000-00-00', '200308401145', '0718234011', 'school', 'sas@gmail.com', 'addresss', 'grama', 'divi', NULL),
(20, '5784eefb71b24fd2755922fb0003f4cb.jpg', 'namal', '', '', '', '0000-00-00', '0000', '', '', '', '', '', '', NULL),
(21, 'Annotation 2024-02-27 220012.png', 'namal', 'nama perera ', 'male', 'mathara', '0000-00-00', '2000', '071823401145', 'school', 's@gmail.com', 'dd', 'dd', 'dd', NULL),
(22, '', '', '', '', '', '0000-00-00', '', '07182340145/.23', '', '', '', '', '', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','user') NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`) VALUES
(1, 'admin', '1234', 'admin');

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
-- Indexes for table `sports`
--
ALTER TABLE `sports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `achievements`
--
ALTER TABLE `achievements`
  MODIFY `achievement_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `coaches`
--
ALTER TABLE `coaches`
  MODIFY `coach_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sports`
--
ALTER TABLE `sports`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
