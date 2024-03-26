-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 04, 2023 at 09:26 AM
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
-- Database: `finals`
--

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `customer_email` varchar(255) NOT NULL,
  `street_address` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `payment_method` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `product_name`, `price`, `customer_name`, `customer_email`, `street_address`, `city`, `payment_method`) VALUES
(1, 'iPhone 14 Pro', '7969.00', 'Liam De Angel', 'docliam@gmail.com', 'Quezon St.', 'Caloocan City', 'GCash'),
(2, 'iPad Mini', '6969.00', 'Brian Yabut', 'f@gmail.com', 'Dalas', 'San Diego', 'COD'),
(3, 'iPad', '6969.00', 'Testing', 'test@gmail.com', 'Testreet', 'Test City', 'Maya'),
(4, 'iPad', '6969.00', 'Testing', 'test@gmail.com', 'Testreet', 'Test City', 'Maya'),
(5, 'Macbook', '8969.00', 'Testing', 'test@gmail.com', 'Testreet', 'Test City', 'COD'),
(6, 'Macbook', '9969.00', 'Boss Liam', 'bossliam@gmail.com', 'Padre Noval', 'Manila City', 'creditCard'),
(7, 'iPad', '7969.00', ' Roman De Angel', 'rom@gmail.com', 'December Avenue', 'Quezon City', 'GCash'),
(8, 'Macbook', '8969.00', 'f', 'f@gmail.com', 'f', 'f', 'creditCard'),
(9, 'Macbook', '8969.00', 'f', 'f@gmail.com', 'f', 'f', 'creditCard'),
(10, 'Macbook', '8969.00', 'f', 'f@gmail.com', 'f', 'f', 'creditCard'),
(11, 'Macbook', '8969.00', 'f', 'f@gmail.com', 'f', 'f', 'creditCard'),
(12, 'Macbook', '9969.00', 'Brian Yabut', 'brianyabut@gmail.com', 'Quezon St.', 'Caloocan City', 'COD'),
(13, 'iPad', '9969.00', 'Brian Yabut', 'brianyabut@gmail.com', 'Quezon St.', 'Caloocan City', 'GCash'),
(14, 'iPhone', '9969.00', 'f', 'f@gmail.com', 'f', 'f', 'creditCard'),
(15, 'iPhone', '9969.00', 'f', 'f@gmail.com', 'f', 'f', 'creditCard'),
(16, 'iPhone', '9969.00', 'f', 'f@gmail.com', 'f', 'f', 'creditCard'),
(17, 'Macbook', '8969.00', 'Brian Yabut', 'brianyabut@gmail.com', 'Quezon St.', 'Caloocan City', 'GCash'),
(18, 'Macbook', '8969.00', 'Brian Yabut', 'brianyabut@gmail.com', 'Quezon St.', 'Caloocan City', 'GCash'),
(19, 'Macbook', '8969.00', 'Brian Yabut', 'brianyabut@gmail.com', 'Quezon St.', 'Caloocan City', 'GCash');

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `is_admin` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`id`, `name`, `email`, `password`, `is_admin`) VALUES
(1, 'Brian Yabut', 'brianyabut02@gmail.com', 'brianpogi123', 0),
(2, 'Theo Sosa', 'theo@gmail.com', 'theopogi', 0),
(3, 'Hans Villas', 'hans@gmail.com', 'hanspogi', 0),
(4, 'Lexia', 'lex@gmail.com', 'lexpogi', 0),
(5, 'Sir JB', 'johnnab@bantulaw.com', 'sirjb', 0),
(11, 'admin', 'admin@gmail.com', 'cisco123', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `sign_up_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `password`, `email`, `sign_up_date`) VALUES
(1, 'Jake Smith', 'password123', 'JakeSmith@outlook.com', '2023-02-07 23:03:12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
