-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 06, 2019 at 03:08 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bookshare`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `bookid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `title` text NOT NULL,
  `description` text NOT NULL,
  `course` text NOT NULL,
  `branch` text NOT NULL,
  `sem` text NOT NULL,
  `price` int(11) NOT NULL,
  `image` varchar(200) NOT NULL,
  `address` text NOT NULL,
  `phone` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`bookid`, `userid`, `title`, `description`, `course`, `branch`, `sem`, `price`, `image`, `address`, `phone`) VALUES
(2, 24, 'Engineering Design Book', 'I Want To Sell This Book.', 'Engineering', 'IT', 'I', 380, '5cf14f1d5b75d_thumb900.jpg', 'Andheri', '9869006521'),
(3, 24, 'Fundaments Of Engineering', 'I would like to sell my book.', 'Engineering', 'Computers', 'II', 650, '1019420.jpg', 'Andheri, mumbai', '9869006521'),
(4, 24, 'Cloud Programing', 'Hey i would like to sell my book.', 'Engineering', 'Electronics', 'III', 320, 'images (1).png', 'Andheri, Mumbai.', '9869006521'),
(5, 24, 'System Engineering', 'I want to sell my system engineering book.', 'Engineering', 'Chemical', 'IV', 765, 'images (5).jpeg', 'Andheri, mumbai.', '9869006521'),
(6, 24, 'Engineering Maths-1', 'I want to sell my maths-1 book.', 'Engineering', 'Mechanical', 'V', 650, 'images (6).jpeg', 'Andheri, mumbai', '9869006521'),
(7, 21, 'Engineering Minds', 'I would like to sell book.', 'Engineering', 'Chemical', 'VI', 330, 'images (7).jpeg', 'Worli, mumbai-18', '9705580522'),
(8, 21, 'Chemical And Energy Process Engineering', 'I want to sell my book.', 'Engineering', 'Civil', 'VII', 440, 'images (8).jpeg', 'Worli, mumbai-18', '9029192655'),
(9, 21, 'Construction Engineering', 'Reselling book', 'Engineering', 'Instrumentation', 'VII', 770, 'images (9).jpeg', 'Worli, mumbai-18', '9029192655'),
(10, 21, 'Mechanical Engineering', 'Want to sell my book.', 'Engineering', 'Instrumentation', 'I', 220, 'images (10).jpeg', 'Worli, mumbai-18', '9877356324'),
(11, 21, 'Engineering Physics', 'Want to resell my book.', 'Engineering', 'Extc', 'II', 270, 'images (11).jpeg', 'Worli, mumbai-18', '8863552399'),
(12, 22, 'Ground Water Engineering', 'I would like to sell my book.', 'Engineering', 'IT', 'II', 710, 'images (12).jpeg', 'Mahim', '8828187301'),
(13, 22, 'Gate Tutor', 'Resell my book.', 'Engineering', 'Computers', 'III', 350, 'images (13).jpeg', 'Mahim', '8828187301'),
(14, 22, 'Security Engineering', 'Resell my book.', 'Engineering', 'Electronics', 'IV', 430, 'images (14).jpeg', 'Mahim', '8828187301'),
(15, 22, 'Mechanical Engineering', 'Want to sell my book', 'Engineering', 'Mechanical', 'IV', 450, 'images (15).jpeg', 'Mahim', '8828187301'),
(16, 22, 'Biomedical Engineering Principles', 'I would like to sell this book', 'Engineering', 'Extc', 'V', 553, 'images (16).jpeg', 'Mahim', '8828187301'),
(17, 26, 'Control System Engineering', 'Want to sell this book.', 'Engineering', 'Civil', 'VI', 360, 'images (17).jpeg', 'Sion', '9664307340'),
(18, 24, 'IP BOOK FOR SALE', 'Condition is good', 'Engineering', 'IT', 'IV', 100, 'images (48).jpeg', 'Andheri east', '9029192655');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `gender` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `gender`) VALUES
(1, 'karthik', 'karthik261099@gmail.com', 'pass123', 'male'),
(21, 'satyam', 'satyam@gmail.com', '123', 'male'),
(22, 'Mohit', 'mohit@gmail.com', '123', 'male'),
(24, 'karthik', 'karthik@gmail.com', '123', 'male'),
(26, 'dhiren', 'dhiren@gmail.com', '123', 'male'),
(27, 'suman', 'suman@gmail.com', '123', 'male'),
(28, 'parth', 'parth@gmail.com', '123', 'male'),
(29, 'mohnish', 'mohnish@gmail.com', '123', 'male');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`bookid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `bookid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
