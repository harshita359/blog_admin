-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 11, 2024 at 08:58 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog_admin`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `category_title` text NOT NULL,
  `category_url` varchar(255) NOT NULL,
  `category_content` longtext NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `user_id`, `category_title`, `category_url`, `category_content`, `created_at`, `updated_at`) VALUES
(1, 1, 'category_1', 'category_1.com', 'category_1', '2024-05-28 08:43:41', '2024-05-28 08:43:41'),
(2, 2, 'category_2', 'category_2.com', 'category_2', '2024-05-28 08:43:59', '2024-05-28 08:43:59'),
(3, 2, 'category_3', 'category_3.com', 'category_3', '2024-05-28 08:44:22', '2024-05-28 08:44:22'),
(4, 3, 'category_4', 'category_4.com', 'category_4', '2024-05-28 08:44:40', '2024-05-28 08:44:40'),
(5, 3, 'category_5', 'category_5.com', 'category_5', '2024-05-28 08:45:07', '2024-05-28 08:45:07'),
(6, 3, 'category_6', 'category_6.com', 'category_6', '2024-05-28 08:45:20', '2024-05-28 08:45:20');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_title` text NOT NULL,
  `post_url` varchar(255) NOT NULL,
  `post_cat` varchar(255) NOT NULL,
  `post_tag` varchar(255) NOT NULL,
  `post_status` varchar(255) NOT NULL,
  `post_img` text NOT NULL,
  `post_homepage` varchar(255) NOT NULL,
  `post_summary` longtext NOT NULL,
  `post_content` longtext NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`post_id`, `user_id`, `post_title`, `post_url`, `post_cat`, `post_tag`, `post_status`, `post_img`, `post_homepage`, `post_summary`, `post_content`, `created_at`, `updated_at`) VALUES
(1, 1, 'post_1', 'post_1.com', 'category_1', 'tag_1', 'active', 'Frame 6 (1).png', 'no', 'post_1', 'post_1<br /><br />', '2024-05-28 08:58:19', '2024-05-28 08:58:19'),
(2, 2, 'post_2', 'post_2.com', 'category_2', 'tag_2', 'active', 'Black and white simple initial logo.png', 'yes', 'post_2', 'post_2', '2024-05-28 08:58:48', '2024-05-28 08:58:48'),
(3, 2, 'post_3', 'post_3.com', 'category_3', 'tag_3', 'inactive', 'Add a subheading.png', 'no', 'post_3', 'post_3', '2024-05-28 08:59:12', '2024-05-28 08:59:12'),
(4, 3, 'post_4', 'post_4.com', 'category_4', 'tag_4', 'active', 'Code By Harshita.jpg', 'yes', 'post_4', 'post_4', '2024-05-28 08:59:47', '2024-05-28 08:59:47'),
(5, 3, 'post_5', 'post_5.com', 'category_5', 'tag_3', 'active', 'Frame 6 (1).png', 'no', 'post_5', 'post_5', '2024-05-28 09:00:17', '2024-05-28 09:00:17'),
(6, 3, 'post_6', 'post_6.com', 'category_6', 'tag_2', 'inactive', 'Code By Harshita.jpg', 'yes', 'post_6', 'post_6', '2024-05-28 09:00:56', '2024-05-28 09:00:56');

-- --------------------------------------------------------

--
-- Table structure for table `post_category`
--

CREATE TABLE `post_category` (
  `category_s_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `category_id` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `post_category`
--

INSERT INTO `post_category` (`category_s_id`, `post_id`, `category_id`, `created_at`, `updated_at`) VALUES
(1, 1, '0', '2024-05-28 08:58:19', '2024-05-28 08:58:19'),
(2, 2, '0', '2024-05-28 08:58:48', '2024-05-28 08:58:48'),
(3, 3, '0', '2024-05-28 08:59:12', '2024-05-28 08:59:12'),
(4, 4, '0', '2024-05-28 08:59:47', '2024-05-28 08:59:47'),
(5, 5, '0', '2024-05-28 09:00:17', '2024-05-28 09:00:17'),
(6, 6, '0', '2024-05-28 09:00:56', '2024-05-28 09:00:56');

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `tag_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `tag_title` text NOT NULL,
  `tag_url` varchar(255) NOT NULL,
  `tag_content` longtext NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`tag_id`, `user_id`, `tag_title`, `tag_url`, `tag_content`, `created_at`, `updated_at`) VALUES
(1, 1, 'tag_1', 'tag_1.com', 'tag_1', '2024-05-28 08:46:42', '2024-05-28 08:46:42'),
(2, 2, 'tag_2', 'tag_2.com', 'tag_2', '2024-05-28 08:46:56', '2024-05-28 08:46:56'),
(3, 3, 'tag_3', 'tag_3.com', 'tag_3', '2024-05-28 08:47:27', '2024-05-28 08:47:27'),
(4, 3, 'tag_4', 'tag_4.com', 'tag_4', '2024-05-28 08:47:47', '2024-05-28 08:47:47');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `first_name` text NOT NULL,
  `middle_name` text NOT NULL,
  `last_name` text NOT NULL,
  `mobile` int(10) NOT NULL,
  `password` varchar(200) NOT NULL,
  `email` varchar(255) NOT NULL,
  `profile` text NOT NULL,
  `user_role` varchar(255) NOT NULL,
  `intro` longtext NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `lastlogin` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `first_name`, `middle_name`, `last_name`, `mobile`, `password`, `email`, `profile`, `user_role`, `intro`, `created_at`, `updated_at`, `lastlogin`) VALUES
(1, 'demo', '1', 'post', 1234567890, '123456', 'demo1@gmail.com', 'web designer', 'admin', 'I am web designer', '2024-05-28 09:03:30', '2024-05-28 09:03:30', '2024-05-28 09:03:30'),
(2, 'demo', '2', 'post', 2147483647, '456789', 'demo2@gmail.com', 'web developer ', 'user', 'I am web developer&nbsp;', '2024-05-28 09:04:39', '2024-05-28 09:04:39', '2024-05-28 09:04:39'),
(3, 'demo', '3', 'post', 1234567890, '0123456', 'demo3@gmail.com', 'graphic design', 'user', 'I am graphic design', '2024-05-28 09:05:56', '2024-05-28 09:05:56', '2024-05-28 09:05:56');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `post_category`
--
ALTER TABLE `post_category`
  ADD PRIMARY KEY (`category_s_id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`tag_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `post_category`
--
ALTER TABLE `post_category`
  MODIFY `category_s_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `tag_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
