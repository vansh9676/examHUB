-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 02, 2026 at 04:13 PM
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
-- Database: `examhub_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `category_slug` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `category_slug`) VALUES
(1, 'SSC', 'ssc'),
(2, 'Banking', 'banking'),
(3, 'Railway', 'railway'),
(4, 'Engineering', 'engineering'),
(5, 'Medical', 'medical'),
(6, 'Teaching', 'teaching'),
(7, 'Class 10th', 'class-10th'),
(8, 'Class 12th', 'class-12th');

-- --------------------------------------------------------

--
-- Table structure for table `exam_results`
--

CREATE TABLE `exam_results` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `mock_id` int(11) DEFAULT NULL,
  `total_score` int(11) DEFAULT NULL,
  `correct_answers` int(11) DEFAULT NULL,
  `wrong_answers` int(11) DEFAULT NULL,
  `accuracy` decimal(5,2) DEFAULT NULL,
  `submitted_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `correct_q` int(11) DEFAULT 0,
  `wrong_q` int(11) DEFAULT 0,
  `responses` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `exam_results`
--

INSERT INTO `exam_results` (`id`, `user_id`, `mock_id`, `total_score`, `correct_answers`, `wrong_answers`, `accuracy`, `submitted_at`, `correct_q`, `wrong_q`, `responses`) VALUES
(9, 2, 2, 0, NULL, NULL, NULL, '2026-02-02 05:31:12', 0, 0, '[]'),
(12, 2, 2, 10, 5, 0, 100.00, '2026-02-02 08:25:40', 0, 0, '{\"1\":\"b\",\"2\":\"b\",\"3\":\"a\",\"4\":\"c\",\"5\":\"d\"}'),
(13, 2, 2, 8, 4, 1, 80.00, '2026-02-02 08:26:00', 0, 0, '{\"1\":\"c\",\"2\":\"b\",\"3\":\"a\",\"4\":\"c\",\"5\":\"d\"}'),
(14, 2, 1, 10, 6, 5, 54.55, '2026-02-02 09:34:50', 0, 0, '{\"1\":\"b\",\"2\":\"b\",\"3\":\"b\",\"4\":\"c\",\"5\":\"d\",\"6\":\"d\",\"7\":\"b\",\"8\":\"c\",\"9\":\"d\",\"10\":\"d\",\"11\":\"b\"}'),
(15, 2, 4, 2, 1, 0, 100.00, '2026-02-02 11:45:20', 0, 0, '{\"9\":\"c\"}');

-- --------------------------------------------------------

--
-- Table structure for table `mocks`
--

CREATE TABLE `mocks` (
  `id` int(11) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `mock_title` varchar(255) NOT NULL,
  `total_questions` int(11) DEFAULT 100,
  `max_marks` int(11) DEFAULT 100,
  `time_minutes` int(11) DEFAULT 60,
  `attempts_count` int(11) DEFAULT 0,
  `is_new` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mocks`
--

INSERT INTO `mocks` (`id`, `category_id`, `mock_title`, `total_questions`, `max_marks`, `time_minutes`, `attempts_count`, `is_new`) VALUES
(1, 1, 'SSC MTS 2025 Full Mock-1', 100, 200, 90, 782, 1),
(2, 1, 'SSC CGL Tier-1 Practice Set', 100, 200, 60, 450, 1),
(3, 1, 'SSC CHSL Memory Based Paper', 100, 100, 60, 312, 1),
(4, 2, 'SBI PO Prelims 2026 Mock-1', 100, 100, 60, 520, 1),
(5, 2, 'IBPS Clerk Quantitative Quiz', 35, 35, 20, 890, 1),
(6, 3, 'RRB ALP CBT-1 Full Test', 75, 75, 60, 640, 1),
(7, 3, 'Railway Group D Science Special', 25, 25, 20, 1200, 1),
(8, 1, 'SSC CGL 2026 Tier-1 Full Mock', 100, 200, 60, 1250, 1),
(9, 1, 'SSC MTS 2025 Numerical Ability', 25, 75, 45, 3400, 1),
(10, 1, 'SSC CHSL 10+2 Practice Set', 100, 200, 60, 890, 1),
(11, 1, 'SSC GD Constable Special', 80, 160, 60, 2100, 1),
(12, 2, 'SBI PO Prelims Full Mock', 100, 100, 60, 950, 1),
(13, 2, 'IBPS Clerk Reasoning Quiz', 35, 35, 20, 1500, 1),
(14, 2, 'RBI Assistant Mock Test', 100, 100, 60, 420, 1),
(15, 3, 'RRB ALP CBT-1 2026', 75, 75, 60, 5600, 1),
(16, 3, 'RRB NTPC Graduate Level Mock', 100, 100, 90, 2300, 1),
(17, 3, 'Railway Group D Science Special', 25, 25, 20, 4100, 1),
(18, 4, 'JEE Mains Physics (Mechanics)', 30, 120, 60, 1100, 1),
(19, 5, 'NEET 2026 Biology Full Mock', 90, 360, 60, 2800, 1),
(20, 1, 'SSC CGL Tier-1 Full Mock', 100, 100, 60, 0, 1),
(21, 1, 'SSC CHSL 10+2 Practice Set', 100, 100, 60, 0, 1),
(22, 1, 'SSC MTS Multi-Tasking', 100, 100, 60, 0, 1),
(23, 1, 'SSC GD Constable', 100, 100, 60, 0, 1),
(24, 1, 'SSC CPO SI Delhi Police', 100, 100, 60, 0, 1),
(25, 1, 'SSC JE Civil/Mech/Elec', 100, 100, 60, 0, 1),
(26, 1, 'SSC Stenographer Grade C&D', 100, 100, 60, 0, 1),
(27, 1, 'SSC JHT (Hindi Translator)', 100, 100, 60, 0, 1),
(28, 1, 'SSC Selection Post Phase XII', 100, 100, 60, 0, 1),
(29, 1, 'Delhi Police Constable', 100, 100, 60, 0, 1),
(30, 2, 'UP Police Constable 2026', 100, 100, 60, 0, 1),
(31, 2, 'Bihar Police SI Mains', 100, 100, 60, 0, 1),
(32, 2, 'Indian Army GD Agneepath', 100, 100, 60, 0, 1),
(33, 2, 'NDA/NA Entrance Exam', 100, 100, 60, 0, 1),
(34, 2, 'CDS (Combined Defence Services)', 100, 100, 60, 0, 1),
(35, 2, 'CISF/BSF/CRPF Constable GD', 100, 100, 60, 0, 1),
(36, 2, 'Air Force Group X & Y', 100, 100, 60, 0, 1),
(37, 3, 'SBI PO Prelims', 100, 100, 60, 0, 1),
(38, 3, 'SBI Clerk Junior Associate', 100, 100, 60, 0, 1),
(39, 3, 'IBPS PO/MT XII', 100, 100, 60, 0, 1),
(40, 3, 'IBPS Clerk 2026', 100, 100, 60, 0, 1),
(41, 3, 'RRB Office Assistant', 100, 100, 60, 0, 1),
(42, 3, 'RRB Officer Scale-I', 100, 100, 60, 0, 1),
(43, 4, 'RRB NTPC Graduate Level', 100, 100, 60, 0, 1),
(44, 4, 'RRB Group D (Level 1)', 100, 100, 60, 0, 1),
(45, 4, 'RRB ALP CBT-1', 100, 100, 60, 0, 1),
(46, 4, 'RRB JE (Junior Engineer)', 100, 100, 60, 0, 1),
(47, 4, 'RRB Technician Grade III', 100, 100, 60, 0, 1),
(48, 5, 'CTET Paper 1 & 2', 100, 100, 60, 0, 1),
(49, 5, 'UPTET Primary Level', 100, 100, 60, 0, 1),
(50, 5, 'KVS TGT/PGT/PRT', 100, 100, 60, 0, 1),
(51, 5, 'DSSSB PRT Assistant Teacher', 100, 100, 60, 0, 1),
(52, 5, 'REET Rajasthan Level 1/2', 100, 100, 60, 0, 1),
(53, 6, 'UPPSC PCS Prelims', 100, 100, 60, 0, 1),
(54, 6, 'BPSC (Bihar Public Service)', 100, 100, 60, 0, 1),
(55, 6, 'MPPSC State Service', 100, 100, 60, 0, 1),
(56, 7, 'UPSC Civil Services (IAS)', 100, 100, 60, 0, 1),
(57, 7, 'EPFO SSA/AO Exam', 100, 100, 60, 0, 1),
(58, 7, 'DRDO CEPTAM 10', 100, 100, 60, 0, 1),
(59, 8, 'LIC AAO (Generalist)', 100, 100, 60, 0, 1),
(60, 8, 'LIC ADO Prelims', 100, 100, 60, 0, 1),
(61, 8, 'NIACL AO Scale-I', 100, 100, 60, 0, 1),
(62, 8, 'UIIC AO Specialist', 100, 100, 60, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(11) NOT NULL,
  `subcategory` varchar(50) DEFAULT NULL,
  `mock_id` int(11) NOT NULL,
  `question_text` text NOT NULL,
  `option_a` varchar(255) NOT NULL,
  `option_b` varchar(255) NOT NULL,
  `option_c` varchar(255) NOT NULL,
  `option_d` varchar(255) NOT NULL,
  `correct_option` char(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `subcategory`, `mock_id`, `question_text`, `option_a`, `option_b`, `option_c`, `option_d`, `correct_option`, `created_at`) VALUES
(1, NULL, 1, 'What is the capital of India?', 'Mumbai', 'New Delhi', 'Kolkata', 'Chennai', 'b', '2026-02-02 03:53:37'),
(2, NULL, 1, 'Which planet is known as the Red Planet?', 'Earth', 'Mars', 'Jupiter', 'Saturn', 'b', '2026-02-02 04:01:21'),
(3, NULL, 1, 'Who wrote the Indian National Anthem?', 'R.N. Tagore', 'B.C. Chatterjee', 'S.C. Bose', 'M.K. Gandhi', 'a', '2026-02-02 04:01:21'),
(4, NULL, 1, 'What is the square root of 144?', '10', '11', '12', '13', 'c', '2026-02-02 04:01:21'),
(5, NULL, 1, 'Which is the largest ocean on Earth?', 'Atlantic', 'Indian', 'Arctic', 'Pacific', 'd', '2026-02-02 04:01:21'),
(6, NULL, 1, 'Which planet is known as the Red Planet?', 'Venus', 'Mars', 'Jupiter', 'Saturn', 'b', '2026-02-02 09:25:00'),
(7, NULL, 1, 'Who was the first Prime Minister of India?', 'Mahatma Gandhi', 'Jawaharlal Nehru', 'Subhas Chandra Bose', 'Sardar Patel', 'b', '2026-02-02 09:25:00'),
(8, NULL, 1, 'The Great Wall of China is approximately how long?', '21,196 km', '15,000 km', '10,000 km', '30,000 km', 'a', '2026-02-02 09:25:00'),
(9, NULL, 12, 'What is 15% of 200?', '20', '25', '30', '35', 'c', '2026-02-02 09:25:00'),
(10, NULL, 1, 'If a trader sells an item for $120 with a 20% profit, what was the cost price?', '$100', '$90', '$110', '$95', 'a', '2026-02-02 09:25:00'),
(11, NULL, 1, 'Find the average of 10, 20, 30, 40, 50.', '25', '30', '35', '40', 'b', '2026-02-02 09:25:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `full_name`, `email`, `password`, `created_at`) VALUES
(2, 'vansh', 'test@gmail.com', '$2y$10$9Y.YWJ7H9MKYYgiJTPAmDOyV4CN7Zx.LJQd6ytO1a1uOU2Hf5ZmRW', '2026-02-01 06:33:32');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exam_results`
--
ALTER TABLE `exam_results`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `mock_id` (`mock_id`);

--
-- Indexes for table `mocks`
--
ALTER TABLE `mocks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `exam_results`
--
ALTER TABLE `exam_results`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `mocks`
--
ALTER TABLE `mocks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `exam_results`
--
ALTER TABLE `exam_results`
  ADD CONSTRAINT `exam_results_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `exam_results_ibfk_2` FOREIGN KEY (`mock_id`) REFERENCES `mocks` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `mocks`
--
ALTER TABLE `mocks`
  ADD CONSTRAINT `mocks_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
