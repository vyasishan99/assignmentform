-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 08, 2024 at 12:43 PM
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
-- Database: `addtocart_mvc`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_addproducts`
--

CREATE TABLE `tbl_addproducts` (
  `pid` int(11) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `productname` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `descriptions` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_addproducts`
--

INSERT INTO `tbl_addproducts` (`pid`, `photo`, `productname`, `price`, `qty`, `descriptions`) VALUES
(1, 'uploads/products/i5.jpg', 'polo mens shirts', 3000, 1, 'Buy Mens Shirts with offer'),
(2, 'uploads/products/i2.jpg', 'polo fit mens shirts', 2000, 1, 'Buy Shirts for Men with discount offer'),
(3, 'uploads/products/i4.jpg', 'polo small fit mens shirts', 2500, 1, 'Buy Shirts for Men'),
(4, 'uploads/products/i6.jpg', 'kids frok ', 1200, 1, 'Buy kids frok with discount offer'),
(5, 'uploads/products/i7.jpg', 'mens shirt', 1000, 1, 'Buy Shirts for Men'),
(6, 'uploads/products/i8.jpg', 'womens suit', 3000, 1, 'womens dress with discount offer');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cart`
--

CREATE TABLE `tbl_cart` (
  `cartid` int(11) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `productname` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_cart`
--

INSERT INTO `tbl_cart` (`cartid`, `photo`, `productname`, `price`, `qty`) VALUES
(2, 'uploads/products/i2.jpg', 'polo fit mens shirts', 2000, 1),
(3, 'uploads/products/i5.jpg', 'polo mens shirts', 3000, 1),
(4, 'uploads/products/i8.jpg', 'womens suit', 3000, 1),
(5, 'uploads/products/i6.jpg', 'kids frok ', 1200, 1),
(6, 'uploads/products/i7.jpg', 'mens shirt', 1000, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_addproducts`
--
ALTER TABLE `tbl_addproducts`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD PRIMARY KEY (`cartid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_addproducts`
--
ALTER TABLE `tbl_addproducts`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  MODIFY `cartid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
