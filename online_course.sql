-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 13, 2025 at 02:56 PM
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
-- Database: `online_course`
--

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(11) NOT NULL,
  `course_name` varchar(100) NOT NULL,
  `instructor_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `course_name`, `instructor_id`) VALUES
(971, 'UI/UX Design', 1),
(1201, 'Pemrograman Web', 1),
(1831, 'Data Science', 2),
(2521, 'Cyber Security', 2),
(5221, 'Artificial Intelligence', 2),
(7162, 'Basis Data', 3),
(8321, 'Mobile App Development', 1),
(9131, 'Cloud computing', 1);

-- --------------------------------------------------------

--
-- Table structure for table `course_instructors`
--

CREATE TABLE `course_instructors` (
  `course_id` int(11) NOT NULL,
  `instructor_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `enrollments`
--

CREATE TABLE `enrollments` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `course_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `instructors`
--

CREATE TABLE `instructors` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `instructors`
--

INSERT INTO `instructors` (`id`, `name`) VALUES
(1, 'Leiden Fauzi'),
(2, 'Fatur'),
(3, 'Athiyah');

-- --------------------------------------------------------

--
-- Table structure for table `kursus`
--

CREATE TABLE `kursus` (
  `id` int(11) NOT NULL,
  `nama_kursus` varchar(255) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `harga` decimal(10,2) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kursus`
--

INSERT INTO `kursus` (`id`, `nama_kursus`, `deskripsi`, `harga`, `created_at`) VALUES
(1, 'Basis Data', 'Kursus tentang manajemen database.', NULL, '2025-03-13 05:55:20'),
(2, 'Data Science', 'Belajar analisis data dengan Python.', NULL, '2025-03-13 05:55:20'),
(3, 'Pemrograman Web', 'Kursus membuat website dengan HTML, CSS, dan JavaScript.', NULL, '2025-03-13 05:55:20'),
(4, 'Cloud Computing', 'Belajar dasar-dasar cloud computing menggunakan AWS, Azure, dan Google Cloud', NULL, '2025-03-13 06:36:27'),
(5, 'UI/UX Design', 'Mempelajari prinsip desain UI/UX untuk aplikasi dan website yang user-friendly', NULL, '2025-03-13 06:38:07'),
(6, 'Mobile App Development', 'Membuat aplikasi mobile menggunakan Flutter dan React Native', NULL, '2025-03-13 06:39:28'),
(7, 'Cyber Security', 'Memahami konsep keamanan siber dan cara melindungi data dari serangan', NULL, '2025-03-13 06:39:55'),
(8, 'Artificial Intelligence', 'Belajar dasar-dasar AI dan implementasinya dalam berbagai bidang', NULL, '2025-03-13 06:40:18');

-- --------------------------------------------------------

--
-- Table structure for table `registrations`
--

CREATE TABLE `registrations` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `course_id` int(11) DEFAULT NULL,
  `course_name` varchar(100) NOT NULL,
  `registration_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `registrations`
--

INSERT INTO `registrations` (`id`, `user_id`, `course_id`, `course_name`, `registration_date`) VALUES
(3, 1, NULL, 'Pemrograman Web', '2025-03-13 05:31:47'),
(4, 2, NULL, 'Data Science', '2025-03-13 05:31:47'),
(5, 11, NULL, 'Basis Data', '2025-03-13 05:31:47'),
(6, 12, NULL, 'Pemrograman Web', '2025-03-13 05:31:47'),
(7, 12, NULL, 'Pemrograman Web', '2025-03-13 06:30:08'),
(8, 12, NULL, 'Data Science', '2025-03-13 06:30:08'),
(9, 12, NULL, 'Data Science', '2025-03-13 06:30:58'),
(10, 12, NULL, 'Basis Data', '2025-03-13 06:30:58'),
(11, 12, NULL, 'Pemrograman Web', '2025-03-13 06:31:13'),
(12, 12, NULL, 'Data Science', '2025-03-13 06:36:40'),
(13, 13, NULL, 'Basis Data', '2025-03-13 06:46:07'),
(14, 13, NULL, 'Mobile App Development', '2025-03-13 06:46:07'),
(15, 13, NULL, 'Artificial Intelligence', '2025-03-13 06:46:07'),
(16, 14, NULL, 'Basis Data', '2025-03-13 07:08:16'),
(17, 14, NULL, 'UI/UX Design', '2025-03-13 07:08:16'),
(18, 14, NULL, 'Mobile App Development', '2025-03-13 07:08:16'),
(19, 11, NULL, 'Pemrograman Web', '2025-03-13 12:59:19'),
(20, 11, NULL, 'Data Science', '2025-03-13 12:59:19'),
(21, 11, NULL, 'Basis Data', '2025-03-13 12:59:19'),
(22, 11, NULL, 'Cloud Computing', '2025-03-13 12:59:19'),
(23, 11, NULL, 'UI/UX Design', '2025-03-13 12:59:19'),
(24, 11, NULL, 'Mobile App Development', '2025-03-13 12:59:19'),
(25, 11, NULL, 'Cyber Security', '2025-03-13 12:59:19'),
(26, 11, NULL, 'Artificial Intelligence', '2025-03-13 12:59:19');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `full_name`, `email`, `password`) VALUES
(1, 'Leiden', 'leidenfauzi9@gmail.com', '$2y$10$p62Km4qaiseyXRovmfhVTO43NG7Px4uG1K4UZCEqDZ2TDq1W2SE3.'),
(2, 'Athiyah', 'Athiyahunsri@gmail.com', '$2y$10$Cgac.wDBPmpmNqNmUerlw.B8h7Y2hcw4vUhyKVFeHySx5GnrZoFO6'),
(3, 'Fatur', 'FaturLayo@gmail.com', '$2y$10$lcr5LQDVAklJUpSsW5xM.uhMzMcrSswqKM.IdZ757xGDgVY67tzna'),
(4, 'Surya', 'surya@gmail.com', '$2y$10$mj4GPHCB0TNMIOuoRtBD6.f3A4UnFopTHRZJnmDu9pspdffE5RrVW'),
(5, 'Fauzi', 'Fauzi@gmail.com', '$2y$10$brPOw6ITHDoMck0a1Ghd0OQvVrGNfnYCHXYCJEh8yY47R1nGygXai'),
(7, 'Leidenn', 'leiden@gmail.com', '$2y$10$UNJKLgFe7VssBPU3ccRCOOFFSUlUZ91ggYFQQ74cQx8OZrUgNkvFa'),
(8, 'L', 'surya1@gmail.com', '$2y$10$bzXcJpxfDL4vq8Aadz8SEOVPQ8BZfDjlsEFGxIT72iW5XFiucgpxu'),
(9, 'Leidne', 'surya2@gmail.com', '$2y$10$qtFWYM32ZHHI9tSfthx5bebDPKmhrVEbId/kwU2seAh9GbyaUOihO'),
(10, 'sada', 'l@gmail.com', '$2y$10$ZdCAxf.fEtKubqMlPNmTMuooTvaL1zQ3ObJaI7i4OMOxmL0ZP7.i.'),
(11, 'leidenfauzi', 'leiden123@gmail.com', '$2y$10$I45SS58TMzqYRvSaN6aZIubQCi8e9c7MbM6nIZmV5pV26PJDm159W'),
(12, 'Leiden', 'surya3@gmail.com', '$2y$10$9RkgNf1acQy43wwmILKzeufIb40np2v8NcNLJt2J9wzTafoRtkS9i'),
(13, 'Zikri Firmansyah', 'zikrifirmansyah2000@gmail.com', '$2y$10$qe90izRpPzeAtGxUiLIWI.V4EEPE1lV.nTbGSy23.FquasOtv139C'),
(14, 'Fatur', 'fatur@gmail.com', '$2y$10$ECdCzk/JsF7qhb8aupcHIewNYR6zRgLDk8b2l090XzleZy43BkPNi'),
(15, 'Surya', 'surya12@gmail.com', '$2y$10$0rx4rlybqCs32wVhFIG7R.Xx8.iL1cs2YL7WGktBLhMak90UqtB96');

-- --------------------------------------------------------

--
-- Table structure for table `userss`
--

CREATE TABLE `userss` (
  `id` int(11) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `role` enum('student','instructor') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `instructor_id` (`instructor_id`);

--
-- Indexes for table `course_instructors`
--
ALTER TABLE `course_instructors`
  ADD PRIMARY KEY (`course_id`,`instructor_id`),
  ADD KEY `instructor_id` (`instructor_id`);

--
-- Indexes for table `enrollments`
--
ALTER TABLE `enrollments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `course_id` (`course_id`);

--
-- Indexes for table `instructors`
--
ALTER TABLE `instructors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kursus`
--
ALTER TABLE `kursus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `registrations`
--
ALTER TABLE `registrations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `course_id` (`course_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `unique_email` (`email`);

--
-- Indexes for table `userss`
--
ALTER TABLE `userss`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9132;

--
-- AUTO_INCREMENT for table `enrollments`
--
ALTER TABLE `enrollments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `instructors`
--
ALTER TABLE `instructors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `kursus`
--
ALTER TABLE `kursus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `registrations`
--
ALTER TABLE `registrations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `userss`
--
ALTER TABLE `userss`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `courses`
--
ALTER TABLE `courses`
  ADD CONSTRAINT `courses_ibfk_1` FOREIGN KEY (`instructor_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `course_instructors`
--
ALTER TABLE `course_instructors`
  ADD CONSTRAINT `course_instructors_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `course_instructors_ibfk_2` FOREIGN KEY (`instructor_id`) REFERENCES `userss` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `enrollments`
--
ALTER TABLE `enrollments`
  ADD CONSTRAINT `enrollments_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `enrollments_ibfk_2` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `registrations`
--
ALTER TABLE `registrations`
  ADD CONSTRAINT `registrations_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `registrations_ibfk_2` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
