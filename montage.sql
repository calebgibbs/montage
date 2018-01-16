-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 16, 2018 at 07:44 PM
-- Server version: 5.7.17
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `montage`
--

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `product_id` int(10) NOT NULL,
  `image` varchar(50) NOT NULL,
  `image_position` enum('1','2','3','4','5') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `product_id`, `image`, `image_position`) VALUES
(1, 1, '5a5bd5c100326.png', '1'),
(2, 1, '5a5bd5c142ce8.png', '2'),
(3, 1, '5a5bd5c184cc2.png', '3'),
(4, 1, '5a5bd5c1ca9bb.png', '4'),
(5, 1, '5a5bd5c219e27.png', '5');

-- --------------------------------------------------------

--
-- Table structure for table `nav`
--

CREATE TABLE `nav` (
  `id` int(11) NOT NULL,
  `category` enum('workstations','storage','tech_accesories','tables','screens','agile','chairs','joinery_custom') NOT NULL,
  `name` varchar(50) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) NOT NULL,
  `title` varchar(50) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `category` enum('workstation','storage','tech_accesories','table','screen','agile_furniture','chair','joinery_custom','other') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `description`, `category`) VALUES
(1, 'Cool Chair', 'This is the product that we are having for the new thing in the. ', 'chair');

-- --------------------------------------------------------

--
-- Table structure for table `product_features`
--

CREATE TABLE `product_features` (
  `id` int(10) NOT NULL,
  `product_id` int(10) NOT NULL,
  `feature` varchar(100) NOT NULL,
  `position` enum('1','2','3','4','5','6','7','8','9','10') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product_features`
--

INSERT INTO `product_features` (`id`, `product_id`, `feature`, `position`) VALUES
(1, 1, '1', '1'),
(2, 1, '2', '2'),
(3, 1, '3', '3'),
(4, 1, '4', '4'),
(5, 1, '5', '5'),
(6, 1, '6', '6'),
(7, 1, '7', '7'),
(8, 1, '8', '8'),
(9, 1, '9', '9'),
(10, 1, '10', '10');

-- --------------------------------------------------------

--
-- Table structure for table `product_options`
--

CREATE TABLE `product_options` (
  `id` int(10) NOT NULL,
  `product_id` int(10) NOT NULL,
  `product_option` varchar(100) NOT NULL,
  `position` enum('1','2','3','4','5','6','7','8','9','10') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product_options`
--

INSERT INTO `product_options` (`id`, `product_id`, `product_option`, `position`) VALUES
(1, 1, 'one', '1'),
(2, 1, 'two', '2'),
(3, 1, 'three', '3'),
(4, 1, 'four', '4'),
(5, 1, 'five', '5'),
(6, 1, 'six', '6'),
(7, 1, 'seven', '7'),
(8, 1, 'eight', '8'),
(9, 1, 'nine9', '9'),
(10, 1, 'ten', '10');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(75) NOT NULL,
  `email` varchar(255) NOT NULL,
  `company` varchar(80) NOT NULL,
  `password` varchar(60) NOT NULL,
  `account_type` enum('user','admin') NOT NULL DEFAULT 'user',
  `account_status` enum('not_active','active') NOT NULL DEFAULT 'not_active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `email`, `company`, `password`, `account_type`, `account_status`) VALUES
(1, 'Caleb Gibbs', 'calebgibbs@me.com', 'CG Development', '$2y$10$Y3nMFkAzMY7GSTNdDm6vMOcH4ZVC0PmI2DHulJO6ZmOcKGVXs18XS', 'admin', 'active'),
(4, 'Test', 'test@123.com', '', '$2y$10$K7bJx.RSwwBWseqsbPJAdePfoev5dOVAdiSCwZcvtmoH0kJ63A3Iy', 'user', 'active'),
(5, 'Bella', 'bella@me.com', 'Montage Interiors', '$2y$10$ENzvRpdMsYwZr3BKZeicleHhDzVOFmddfjdInOPywvgi1mA0hbsxm', 'admin', 'active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `nav`
--
ALTER TABLE `nav`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_features`
--
ALTER TABLE `product_features`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `product_options`
--
ALTER TABLE `product_options`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `nav`
--
ALTER TABLE `nav`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `product_features`
--
ALTER TABLE `product_features`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `product_options`
--
ALTER TABLE `product_options`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `images_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `nav`
--
ALTER TABLE `nav`
  ADD CONSTRAINT `nav_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product_features`
--
ALTER TABLE `product_features`
  ADD CONSTRAINT `product_features_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product_options`
--
ALTER TABLE `product_options`
  ADD CONSTRAINT `product_options_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
