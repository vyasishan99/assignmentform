-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 06, 2024 at 02:48 PM
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
-- Database: `addtocart`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cart`
--

CREATE TABLE `tbl_cart` (
  `cart_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `cart_name` varchar(255) NOT NULL,
  `price` decimal(11,0) NOT NULL,
  `qty` int(11) NOT NULL,
  `total` decimal(11,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_cart`
--

INSERT INTO `tbl_cart` (`cart_id`, `product_id`, `cart_name`, `price`, `qty`, `total`) VALUES
(1, 0, 'Poco', 1000, 2, 2000),
(5, 1, 'Poco', 1000, 3, 3000),
(6, 0, 'Poco latest phone', 18000, 4, 72000),
(9, 10, 'iphone', 30000, 2, 60000),
(10, 2, 'Poco latest phone', 18000, 2, 36000),
(12, 1, 'Poco', 1000, 3, 3000),
(13, 4, 'Redmi note 4', 20000, 5, 100000);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`id`, `image`, `name`, `price`) VALUES
(1, 'upload/poco.jpeg', 'Poco', 1000),
(2, 'upload/poco.jpeg', 'Poco latest phone', 18000),
(3, 'upload/oppo.jpg', 'Opp0', 14000),
(4, 'upload/redmi.jpg', 'Redmi note 4', 20000),
(5, 'upload/nokia.jpg', 'Nokia', 10000),
(6, 'upload/vivo.jpg', 'Vivo', 25000),
(7, 'upload/infinix.jpg', 'Infinix', 13000),
(8, 'upload/motorola.jpg', 'Motorola', 15000),
(9, 'upload/nokia.jpg', 'Nokia Latest Phone', 12000),
(10, 'upload/iphone.jpg', 'iphone', 30000),
(11, 'assets/oneplus.jpg', 'Oneplus', 16000),
(12, 'assets/infinix.jpg', 'Infinix New ', 23000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `id` (`product_id`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
