-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 20, 2024 at 05:58 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `caplibcataloging_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `borrowbook`
--

CREATE TABLE `borrowbook` (
  `id` int(11) NOT NULL,
  `userId` int(11) DEFAULT NULL,
  `bookId` int(11) DEFAULT NULL,
  `date_reserve_time` datetime DEFAULT NULL,
  `date_borrowed` datetime DEFAULT NULL,
  `due_date` datetime DEFAULT NULL,
  `date_returned` datetime DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  `fines` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE `request` (
  `id` int(11) NOT NULL,
  `book_name` varchar(191) NOT NULL,
  `author` varchar(191) NOT NULL,
  `copyright_date` varchar(191) NOT NULL,
  `unit_cost` varchar(191) NOT NULL,
  `total_cost` varchar(191) NOT NULL,
  `quantity` varchar(191) NOT NULL,
  `date_requested` datetime(3) NOT NULL,
  `userId` int(11) NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `stage`
--

CREATE TABLE `stage` (
  `id` int(11) NOT NULL,
  `stage` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remarks` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime(3) NOT NULL DEFAULT current_timestamp(3),
  `requestId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_collection`
--

CREATE TABLE `tbl_collection` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `author` varchar(100) NOT NULL,
  `signage` int(10) NOT NULL,
  `isbn` varchar(20) NOT NULL,
  `barcode` varchar(20) NOT NULL,
  `call_number` varchar(100) NOT NULL,
  `publisher` varchar(100) NOT NULL,
  `publication_date` varchar(100) NOT NULL,
  `edition` varchar(100) NOT NULL,
  `price` varchar(20) NOT NULL,
  `accession_num` varchar(11) NOT NULL,
  `quantity` varchar(10) NOT NULL,
  `location` int(10) NOT NULL,
  `availability` tinyint(20) NOT NULL COMMENT '1=available, 0=not available',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_college`
--

CREATE TABLE `tbl_college` (
  `id` int(11) NOT NULL,
  `college` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_college`
--

INSERT INTO `tbl_college` (`id`, `college`, `created_at`) VALUES
(1, 'Science', '2024-02-07 04:02:11'),
(2, 'Veterinary medicine ', '2024-02-07 04:02:26'),
(3, 'Engineering ', '2024-02-07 04:02:31'),
(4, 'Nursing ', '2024-02-07 04:02:36'),
(5, 'Agriculture', '2024-02-07 04:02:41'),
(6, 'Education ', '2024-02-07 04:02:54'),
(7, 'Business administration ', '2024-02-07 04:02:59'),
(9, 'Staff', '2024-04-05 02:13:22');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_location`
--

CREATE TABLE `tbl_location` (
  `id` int(11) NOT NULL,
  `location` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_location`
--

INSERT INTO `tbl_location` (`id`, `location`, `created_at`) VALUES
(1, '1st floor, General Circulation Section, Shelf No. 2, Line 1', '2024-02-07 03:53:53'),
(3, '1st floor,  Filipiniana Section, Shelf No. 3, line 5', '2024-02-07 03:54:10'),
(4, '2nd floor, Engineering Book, Shelf No. 2, Line 5', '2024-02-07 03:54:39'),
(5, '2nd floor, General Reference Section, Shelf No. 4, Line 1', '2024-02-07 03:54:58'),
(6, '2nd floor, Thesis & Dissertation Section, Shelf No. 1,  line 3', '2024-02-07 03:55:19'),
(8, 'dddddd', '2024-05-15 13:49:34');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_signage`
--

CREATE TABLE `tbl_signage` (
  `id` int(11) NOT NULL,
  `signage` varchar(150) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_signage`
--

INSERT INTO `tbl_signage` (`id`, `signage`, `created_at`) VALUES
(2, 'Filipiniana Section', '2024-04-21 23:30:46'),
(3, 'Graduate School Library', '2024-04-21 23:33:26'),
(4, 'Thesis & Dissertation Section ', '2024-04-21 23:34:07'),
(8, 'General Reference Section', '2024-04-21 23:34:35'),
(9, 'Periodical Section', '2024-04-21 23:35:01'),
(10, 'Audio Visual ', '2024-04-21 23:35:58'),
(11, 'Engineering Section', '2024-04-21 23:36:18'),
(12, 'High School References Books', '2024-04-21 23:36:46'),
(13, 'Foreign Authors ', '2024-04-21 23:37:07');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `middle_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `college` varchar(100) NOT NULL,
  `gender` tinytext NOT NULL COMMENT '1=male, 2=famale',
  `user_type` int(10) NOT NULL,
  `role` tinyint(50) NOT NULL COMMENT '1=admin,2=user,\r\n3=encoder1,4=encoder2,5=encoder3',
  `status` tinyint(50) NOT NULL COMMENT '1=active, 0=inactive',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `course` varchar(100) NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `first_name`, `middle_name`, `last_name`, `email`, `password`, `college`, `gender`, `user_type`, `role`, `status`, `created_at`, `course`, `image`) VALUES
(123472, 'Ad', 'Mi', 'N', 'admin@gmail.com', 'admin', '9', '1', 3, 1, 1, '2024-05-20 03:32:46', '', ''),
(123473, 'Rowell', 'Ballesta', 'Adora', 'adorarowell08@gmail.com', 'rowell', '1', '1', 1, 2, 1, '2024-05-20 03:46:06', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_type`
--

CREATE TABLE `tbl_user_type` (
  `id` int(11) NOT NULL,
  `user_type` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_user_type`
--

INSERT INTO `tbl_user_type` (`id`, `user_type`, `created_at`) VALUES
(1, 'Student', '2024-02-07 03:58:39'),
(2, 'Visitor', '2024-02-07 03:58:55'),
(3, 'Librarian', '2024-02-07 03:59:00'),
(4, 'Faculty ', '2024-02-07 03:59:18'),
(5, 'Encoder1', '2024-03-03 08:14:43'),
(6, 'Encoder2', '2024-03-03 08:14:53'),
(7, 'Encoder 3', '2024-04-17 05:25:07');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `borrowbook`
--
ALTER TABLE `borrowbook`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stage`
--
ALTER TABLE `stage`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_collection`
--
ALTER TABLE `tbl_collection`
  ADD PRIMARY KEY (`id`),
  ADD KEY `signageid` (`signage`);

--
-- Indexes for table `tbl_college`
--
ALTER TABLE `tbl_college`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_location`
--
ALTER TABLE `tbl_location`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_signage`
--
ALTER TABLE `tbl_signage`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_type` (`user_type`);

--
-- Indexes for table `tbl_user_type`
--
ALTER TABLE `tbl_user_type`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `borrowbook`
--
ALTER TABLE `borrowbook`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `request`
--
ALTER TABLE `request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `stage`
--
ALTER TABLE `stage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_collection`
--
ALTER TABLE `tbl_collection`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4558;

--
-- AUTO_INCREMENT for table `tbl_college`
--
ALTER TABLE `tbl_college`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_location`
--
ALTER TABLE `tbl_location`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_signage`
--
ALTER TABLE `tbl_signage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123474;

--
-- AUTO_INCREMENT for table `tbl_user_type`
--
ALTER TABLE `tbl_user_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD CONSTRAINT `tbl_user_ibfk_1` FOREIGN KEY (`user_type`) REFERENCES `tbl_user_type` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
