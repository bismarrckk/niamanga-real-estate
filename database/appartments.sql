-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 07, 2021 at 11:08 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `appartments`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customer_id` int(11) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone_number` varchar(100) NOT NULL,
  `product_id` int(11) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `photos`
--

CREATE TABLE `photos` (
  `photo_id` int(11) NOT NULL,
  `property_id` int(11) NOT NULL,
  `link` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `photos`
--

INSERT INTO `photos` (`photo_id`, `property_id`, `link`) VALUES
(1, 4, 'photos/spin.jpg'),
(2, 5, 'photos/ppic.jpg'),
(4, 4, 'photos/mYLAkaSE_400x400.jpg'),
(5, 8, 'photos/dsc7437.jpg'),
(6, 9, 'photos/room2.jpg'),
(7, 14, 'photos/b4.png'),
(8, 14, 'photos/room1.jpg'),
(9, 14, 'photos/room3.jpg'),
(10, 15, 'photos/room1.jpg'),
(11, 15, 'photos/room3.jpg'),
(12, 15, 'photos/room4.jpg'),
(13, 16, 'photos/room2.jpg'),
(14, 16, 'photos/room5.jpg'),
(15, 16, 'photos/room6.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `property`
--

CREATE TABLE `property` (
  `property_id` int(11) NOT NULL,
  `location` varchar(100) NOT NULL,
  `dimensions` varchar(200) NOT NULL,
  `listing` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `price` varchar(20) NOT NULL,
  `reg_date` int(20) NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'Available'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `property`
--

INSERT INTO `property` (`property_id`, `location`, `dimensions`, `listing`, `description`, `price`, `reg_date`, `status`) VALUES
(15, 'Dennis Pritt, Nairobi', '2-bedroom master en-suite (90 sq.m)', 'Long Term Rentals', 'Living room opening to the spacious balcony, fitted kitchen opening to laundry area, quality flooring, high quality finished cabinet, drawer & wardrobes.\r\nAdditional Features: DSTV & internet connection, luxurious decoration, kids playground, high speed lifts, borehole, standby generator, adequate parking, and a gym', '10,000,000', 1617785192, 'Available'),
(16, 'Dennis Pritt, Nairobi', '2-bedroom master en-suite (90 sq.m)', 'Long Term Rentals', 'Living room opening to the spacious balcony, fitted kitchen opening to laundry area, quality flooring, high quality finished cabinet, drawer & wardrobes. Additional Features: DSTV & internet connection, luxurious decoration, kids playground, high speed lifts, borehole, standby generator, adequate parking, and a gym', '11,500,000', 1617785568, 'Available');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `phone_number` varchar(10) NOT NULL,
  `password` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `user_role` varchar(20) NOT NULL,
  `user_log` int(20) NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `fullname`, `phone_number`, `password`, `email`, `user_role`, `user_log`, `status`) VALUES
(1, 'bismarck kibet', '0718598249', 'e99a18c428cb38d5f260853678922e03', 'bismarckmetet@gmail.com', 'Admin', 1617784766, 'active'),
(3, 'Kevin Githae', '0727098843', 'e99a18c428cb38d5f260853678922e03', 'kevog@gmail.com', 'Admin', 0, 'active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `photos`
--
ALTER TABLE `photos`
  ADD PRIMARY KEY (`photo_id`);

--
-- Indexes for table `property`
--
ALTER TABLE `property`
  ADD PRIMARY KEY (`property_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `photos`
--
ALTER TABLE `photos`
  MODIFY `photo_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `property`
--
ALTER TABLE `property`
  MODIFY `property_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
