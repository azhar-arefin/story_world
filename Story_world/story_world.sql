-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 31, 2023 at 10:36 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `story_world`
--

-- --------------------------------------------------------

--
-- Table structure for table `stories`
--

CREATE TABLE `stories` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `thumbnail` varchar(255) NOT NULL,
  `contents` text NOT NULL,
  `author` varchar(255) NOT NULL,
  `publish_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `stories`
--

INSERT INTO `stories` (`id`, `title`, `thumbnail`, `contents`, `author`, `publish_at`) VALUES
(1, 'arefin', 'uploades/thumbnail/658c301a009b5.jpeg', 'uploades/story/658c301a0155e.txt', '', '2023-12-27 20:09:30'),
(4, 'tyyujj', 'uploades/thumbnail/658c38e3b7d44.jpeg', 'uploades/story/658c38e3b7feb.txt', '', '2023-12-27 20:46:59'),
(5, 'rykmfd', 'uploades/thumbnail/658c38f5d9b13.jpeg', 'uploades/story/658c38f5d9d70.txt', '', '2023-12-27 20:47:17'),
(6, 'a description of events that actually happened or that are invented: There was a .', 'uploades/thumbnail/658c39d5bdf2b.jpeg', 'uploades/story/658c39d5be1a6.txt', '', '2023-12-27 20:51:01'),
(7, 'TTY ', 'uploades/thumbnail/6591057850246.jpeg', 'uploades/story/6591057850990.txt', '', '2023-12-31 12:08:56'),
(8, 'tuy ', 'uploades/thumbnail/6591058fc91a3.jpeg', 'uploades/story/6591058fc9a0d.txt', '', '2023-12-31 12:09:19'),
(9, 'ettesg ', 'uploades/thumbnail/6591106908669.jpeg', 'uploades/story/659134a6aa172.txt', '2', '2023-12-31 12:55:37'),
(10, 'Arefin', 'uploades/thumbnail/659127d435d77.jpeg', 'uploades/story/659134d5cf701.txt', '2', '2023-12-31 14:35:32'),
(11, 'yti', 'uploades/thumbnail/659135d0aa4bb.jpeg', 'uploades/story/659135d0aa791.txt', '3', '2023-12-31 15:35:12');

-- --------------------------------------------------------

--
-- Table structure for table `users_form`
--

CREATE TABLE `users_form` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `number` int(100) NOT NULL,
  `addres` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users_form`
--

INSERT INTO `users_form` (`id`, `name`, `number`, `addres`, `email`, `gender`, `password`, `image`) VALUES
(1, 'Azharul Islam', 1640764896, 'badda', 'arefin@gmail.com', 'Male', '147147', 'images/658c149fa2ec2.jpg'),
(2, 'Monitor', 547548, 'badda', 'fhasnat97@gmail.com', 'Female', '123123', 'images/658c1dea22887.jpg'),
(3, 'Azharul Islam', 325664745, 'badda', 'arefinmojumder825@gmail.com', 'Male', '1234', 'images/658c4f922247d.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `stories`
--
ALTER TABLE `stories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_form`
--
ALTER TABLE `users_form`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `stories`
--
ALTER TABLE `stories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users_form`
--
ALTER TABLE `users_form`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
