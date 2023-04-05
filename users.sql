-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 05, 2023 at 09:54 AM
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
-- Database: `users`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL,
  `date_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `date_time`) VALUES
(7, 'admin', 'admin@admin.com', '21232f297a57a5a743894a0e4a801fc3', '2023-03-26 21:28:28'),
(8, 'ayush', 'admin@admin.com', '66049c07d9e8546699fe0872fd32d8f6', '2023-03-26 23:58:31'),
(9, 'utsav', 'utsav@gmail.com', '293f4c20a14b49ce509a4e53f600fb8d', '2023-03-27 00:33:44'),
(10, 'saral', 'saral@gmail.com', 'eec3cb603dee5637c9f42c24d34660de', '2023-03-27 09:37:06'),
(12, 'yashil', 'yashil@gmail.com', 'a193c2cf85c2e56900b45f3e82ced832', '2023-03-27 10:30:20'),
(13, 'Brijen', 'brijen@xyz.com', '7c680b86ee2474372f18f00c83228377', '2023-04-01 14:33:52'),
(14, 'utsav', 'utsav@gmail.com', '293f4c20a14b49ce509a4e53f600fb8d', '2023-04-01 22:20:44'),
(16, 'jainam', 'jainam@gmail.com', '6b175ebafc1a3fc8da8456430e09ac33', '2023-04-02 10:56:13'),
(17, 'Ronil', 'ronil@ronil.com', 'd587f39fa514a8b9b227a6bdba0aa86c', '2023-04-02 11:02:52');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
