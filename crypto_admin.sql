-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 10, 2022 at 11:16 AM
-- Server version: 8.0.27
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crypto`
--
CREATE DATABASE IF NOT EXISTS `crypto` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `crypto`;

-- --------------------------------------------------------

--
-- Table structure for table `coin`
--

CREATE TABLE `coin` (
  `id` int NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL,
  `amount` int NOT NULL,
  `price` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `coin`
--

INSERT INTO `coin` (`id`, `name`, `amount`, `price`) VALUES
(1, 'amirCoin', 899, 50000);

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `order_id` int NOT NULL,
  `value` int NOT NULL,
  `price` float NOT NULL,
  `coin_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL,
  `status` int NOT NULL,
  `user_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`order_id`, `value`, `price`, `coin_name`, `status`, `user_id`) VALUES
(68, 100, 50000, 'amirCoin', 2, 22),
(69, 5000, 50000, 'amirCoin', 2, 22),
(70, 50, 50000, 'amirCoin', 2, 22),
(71, 50, 50000, 'amirCoin', 2, 22),
(72, 69, 50000, 'amirCoin', 3, 22),
(73, 695, 50000, 'amirCoin', 2, 22),
(74, 75, 50000, 'amirCoin', 3, 22),
(75, 3000, 50000, 'amirCoin', 3, 22),
(76, 1, 50000, 'amirCoin', 2, 22),
(77, 100, 50000, 'amirCoin', 2, 21);

-- --------------------------------------------------------

--
-- Table structure for table `trade`
--

CREATE TABLE `trade` (
  `trade_id` int NOT NULL,
  `order_id` int NOT NULL,
  `value` int NOT NULL,
  `price` int NOT NULL,
  `user_id` int NOT NULL,
  `coin_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `trade`
--

INSERT INTO `trade` (`trade_id`, `order_id`, `value`, `price`, `user_id`, `coin_name`) VALUES
(1, 41, 1534, 45, 22, 'amirCoin'),
(2, 41, 1534, 45, 22, 'Coin'),
(3, 41, 1534, 45, 22, 'dudge'),
(4, 41, 1534, 45, 21, 'bestCoin'),
(5, 69, 5000, 50000, 22, 'amirCoin'),
(6, 69, 5000, 50000, 22, 'amirCoin'),
(7, 70, 50, 50000, 22, 'amirCoin'),
(8, 71, 50, 50000, 22, 'amirCoin'),
(9, 77, 100, 50000, 21, 'amirCoin'),
(10, 75, 3000, 50000, 22, 'amirCoin');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `isAdmin` tinyint(1) NOT NULL,
  `username` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL,
  `birth` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL,
  `family` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `isAdmin`, `username`, `password`, `birth`, `name`, `family`) VALUES
(18, 0, 'root', 'mysql', '2021-12-24', '', ''),
(19, 0, 'amirt', 'behesut8i', '2021-12-11', '', ''),
(20, 0, 'root', 'amir', '2315545', '', ''),
(21, 1, 'admin', 'admin', '15/25/51', 'admin', 'admin'),
(22, 0, 'root', 'mysql', '2021-12-16', 'amir', 'beheshti'),
(23, 0, 'root', 'mysql', '2021-12-29', 'dd', 'dfs'),
(24, 0, 'root', 'mysql', '2021-12-29', 'dd', 'dfs');

-- --------------------------------------------------------

--
-- Table structure for table `wallet`
--

CREATE TABLE `wallet` (
  `id` int NOT NULL,
  `coin_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL,
  `value` int NOT NULL,
  `user_id` int NOT NULL,
  `username` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `wallet`
--

INSERT INTO `wallet` (`id`, `coin_name`, `value`, `user_id`, `username`) VALUES
(1, 'amirCoin', 1000, 22, 'amir');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `coin`
--
ALTER TABLE `coin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `trade`
--
ALTER TABLE `trade`
  ADD PRIMARY KEY (`trade_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wallet`
--
ALTER TABLE `wallet`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `coin`
--
ALTER TABLE `coin`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `order_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `trade`
--
ALTER TABLE `trade`
  MODIFY `trade_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `wallet`
--
ALTER TABLE `wallet`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
