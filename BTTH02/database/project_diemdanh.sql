-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 18, 2023 at 07:48 PM
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
-- Database: `project_diemdanh`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `id` int(11) NOT NULL,
  `id_khoahoc` int(11) NOT NULL,
  `id_student` int(11) NOT NULL,
  `time` datetime NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(11) NOT NULL,
  `ma_khoahoc` varchar(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `ma_khoahoc`, `name`, `description`) VALUES
(1, 'CSE485', 'Công nghệ Web', 'perfect'),
(2, 'CSE391', 'Nền tảng phát triển web', 'perfect'),
(3, 'CSE111', 'Nhập môn lập trình', 'perfect');

-- --------------------------------------------------------

--
-- Table structure for table `dang_ki_hoc`
--

CREATE TABLE `dang_ki_hoc` (
  `id` int(11) NOT NULL,
  `id_student` int(11) NOT NULL,
  `id_khoahoc` int(11) NOT NULL,
  `hoc_ki` int(11) NOT NULL,
  `giao_doan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dang_ki_hoc`
--

INSERT INTO `dang_ki_hoc` (`id`, `id_student`, `id_khoahoc`, `hoc_ki`, `giao_doan`) VALUES
(1, 1, 1, 2, 1),
(2, 2, 1, 2, 1),
(3, 2, 1, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `lop_hocphan`
--

CREATE TABLE `lop_hocphan` (
  `id` int(11) NOT NULL,
  `id_khoahoc` int(11) NOT NULL,
  `id_student` int(11) NOT NULL,
  `id_teacher` int(11) NOT NULL,
  `time` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lop_hocphan`
--

INSERT INTO `lop_hocphan` (`id`, `id_khoahoc`, `id_student`, `id_teacher`, `time`) VALUES
(1, 1, 1, 2, '2023-05-19'),
(2, 1, 2, 2, '2023-05-19'),
(3, 1, 3, 2, '2023-05-19'),
(4, 3, 1, 1, '2023-05-17');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `class` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `name`, `class`, `email`) VALUES
(1, 'Vũ Thành Công', '62TH-NB', 'congvtc02@gmail.com'),
(2, 'Đặng Văn Dương', '62TH-NB', 'duong@gmail.com'),
(3, 'Nguyễn Ngọc Ánh', '62TH-NB', 'anh@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `name`, `email`, `phone`) VALUES
(1, 'Trương Xuân Nam', 'namtx@gmail.com', 987789987),
(2, 'Kiều Tuấn Dũng', 'dungkt@gmail.com', 987654321);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `role` varchar(10) NOT NULL DEFAULT 'student'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `role`) VALUES
(1, 'vtcong', '123456', 'admin'),
(2, 'dvduong', '123456', 'teacher'),
(3, 'nnanh', '123456', 'student');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_khoahoc` (`id_khoahoc`),
  ADD KEY `id_student` (`id_student`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dang_ki_hoc`
--
ALTER TABLE `dang_ki_hoc`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_khoahoc` (`id_khoahoc`),
  ADD KEY `id_student` (`id_student`);

--
-- Indexes for table `lop_hocphan`
--
ALTER TABLE `lop_hocphan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_khoahoc` (`id_khoahoc`),
  ADD KEY `id_student` (`id_student`),
  ADD KEY `id_teacher` (`id_teacher`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `dang_ki_hoc`
--
ALTER TABLE `dang_ki_hoc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `lop_hocphan`
--
ALTER TABLE `lop_hocphan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attendance`
--
ALTER TABLE `attendance`
  ADD CONSTRAINT `attendance_ibfk_1` FOREIGN KEY (`id_khoahoc`) REFERENCES `courses` (`id`),
  ADD CONSTRAINT `attendance_ibfk_2` FOREIGN KEY (`id_student`) REFERENCES `students` (`id`);

--
-- Constraints for table `dang_ki_hoc`
--
ALTER TABLE `dang_ki_hoc`
  ADD CONSTRAINT `dang_ki_hoc_ibfk_1` FOREIGN KEY (`id_khoahoc`) REFERENCES `courses` (`id`),
  ADD CONSTRAINT `dang_ki_hoc_ibfk_2` FOREIGN KEY (`id_student`) REFERENCES `students` (`id`);

--
-- Constraints for table `lop_hocphan`
--
ALTER TABLE `lop_hocphan`
  ADD CONSTRAINT `lop_hocphan_ibfk_1` FOREIGN KEY (`id_khoahoc`) REFERENCES `courses` (`id`),
  ADD CONSTRAINT `lop_hocphan_ibfk_2` FOREIGN KEY (`id_student`) REFERENCES `students` (`id`),
  ADD CONSTRAINT `lop_hocphan_ibfk_3` FOREIGN KEY (`id_teacher`) REFERENCES `teachers` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
