-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 26, 2023 at 04:00 PM
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
-- Database: `projekweb`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cartId` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cartId`, `userId`, `productId`, `quantity`, `price`) VALUES
(5, 1, 1, 2, 998);

-- --------------------------------------------------------

--
-- Table structure for table `credentials`
--

CREATE TABLE `credentials` (
  `userid` int(11) NOT NULL,
  `username` varchar(60) NOT NULL,
  `password` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `credentials`
--

INSERT INTO `credentials` (`userid`, `username`, `password`) VALUES
(10, 'tini44', '1234'),
(11, 'huda00', '1010'),
(12, 'fatini99', '9999'),
(13, 'Atikah Omar', '123456'),
(14, 'farahjas', '0000'),
(15, 'anas', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `product_stock`
--

CREATE TABLE `product_stock` (
  `productID` int(11) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `price` float NOT NULL,
  `quantity` int(11) NOT NULL,
  `image_path` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_stock`
--

INSERT INTO `product_stock` (`productID`, `productName`, `price`, `quantity`, `image_path`) VALUES
(1, 'Palm Oil', 499, 10, 'Palm Oil stock image_ Image of abstract, nature, seed - 20053691.jpg'),
(2, 'Nangka', 24.99, 10, '13 Vegetarian Jackfruit Recipes To Try.jpg'),
(3, 'Pisang', 14.99, 10, 'How to Plant, Grow, and Harvest Banana Plants.jpg'),
(4, 'Kelapa', 29.99, 10, 'kelapa.jpg'),
(5, 'Manggis', 12.99, 10, 'Mangosteen Fruit Box.jpg'),
(6, 'Durian', 39.99, 10, 'mufid-majnun-ML7MlOHKbGQ-unsplash.jpg'),
(7, 'Durian Belanda', 21.99, 10, 'belanda.png'),
(8, 'Rambutan', 17.99, 10, 'The Legend of Rambutan (Nephelium Lappaceum).jpg'),
(9, 'Baja Tumbuhan', 199.99, 10, 'WISErg Liquid Organic Fertilizer.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tblorder`
--

CREATE TABLE `tblorder` (
  `id` int(11) NOT NULL,
  `orderID` char(5) NOT NULL,
  `userID` int(11) NOT NULL,
  `productID` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `totalamount` float NOT NULL,
  `PostingDate` timestamp NULL DEFAULT current_timestamp(),
  `status` varchar(255) NOT NULL,
  `paymentId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblorder`
--

INSERT INTO `tblorder` (`id`, `orderID`, `userID`, `productID`, `quantity`, `totalamount`, `PostingDate`, `status`, `paymentId`) VALUES
(8, '73826', 15, 2, 1, 25, '2023-06-26 06:11:16', 'APPROVED', 11),
(9, '73826', 15, 1, 2, 998, '2023-06-26 06:11:16', 'APPROVED', 11),
(10, '44966', 15, 2, 4, 100, '2023-06-26 07:34:55', 'APPROVED', 12),
(11, '44966', 15, 1, 1, 499, '2023-06-26 07:34:55', 'APPROVED', 12),
(12, '76878', 15, 1, 1, 499, '2023-06-26 08:01:34', 'APPROVED', 13),
(13, '76878', 15, 2, 1, 25, '2023-06-26 08:01:34', 'APPROVED', 13),
(14, '36057', 15, 2, 1, 25, '2023-06-26 08:02:38', 'APPROVED', 14),
(15, '95571', 15, 2, 3, 75, '2023-06-26 13:59:11', 'PENDING', 0),
(16, '95571', 15, 1, 2, 998, '2023-06-26 13:59:11', 'PENDING', 0),
(17, '95571', 15, 5, 1, 13, '2023-06-26 13:59:11', 'PENDING', 0),
(18, '95571', 15, 4, 1, 30, '2023-06-26 13:59:11', 'PENDING', 0),
(19, '95571', 15, 3, 1, 15, '2023-06-26 13:59:11', 'PENDING', 0),
(20, '95571', 15, 6, 1, 40, '2023-06-26 13:59:11', 'PENDING', 0),
(21, '95571', 15, 7, 1, 22, '2023-06-26 13:59:11', 'PENDING', 0),
(22, '95571', 15, 8, 1, 18, '2023-06-26 13:59:11', 'PENDING', 0),
(23, '95571', 15, 9, 1, 200, '2023-06-26 13:59:11', 'PENDING', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tblpayment`
--

CREATE TABLE `tblpayment` (
  `paymentId` int(11) NOT NULL,
  `orderID` char(5) NOT NULL,
  `fullName` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `state` varchar(100) DEFAULT NULL,
  `zip` varchar(20) DEFAULT NULL,
  `name_OC` varchar(255) DEFAULT NULL,
  `cc_num` varchar(16) DEFAULT NULL,
  `exp_month` int(11) DEFAULT NULL,
  `exp_year` int(11) DEFAULT NULL,
  `cvv` varchar(4) DEFAULT NULL,
  `totalprice` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblpayment`
--

INSERT INTO `tblpayment` (`paymentId`, `orderID`, `fullName`, `email`, `address`, `city`, `state`, `zip`, `name_OC`, `cc_num`, `exp_month`, `exp_year`, `cvv`, `totalprice`) VALUES
(11, '73826', 'Anastazry ', 'anastazry@gmail.com', 'Perwira', 'Kuala Lumpur', 'Putrajaya', '54000', 'Anastazry', '123123123123', 11, 11, '123', 1022.99),
(12, '44966', 'anas', 'anastazry@gmail.com', 'Perwira', 'Kuala Lumpur', 'Putrajaya', '54000', 'Anastazry', '123412341234', 11, 1122, '333', 598.96),
(13, '76878', 'Anastazry ', 'anastazry@gmail.com', 'Perwira', 'Kuala Lumpur', 'Putrajaya', '54000', 'Anastazry', '123123123123', 12, 121, '123', 523.99),
(14, '36057', 'Anastazry ', 'anastazrypeace@gmail.com', 'Perwira', 'Kuala Lumpur', 'Putrajaya', '54000', 'asdas', 'asd', 0, 123, '12', 24.99),
(15, '', 'Anastazry ', 'anastazry@gmail.com', 'Perwira', 'Kuala Lumpur', 'Putrajaya', '54000', 'Anastazry', '123412341234', 12, 22, '123', 1410.9);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cartId`);

--
-- Indexes for table `credentials`
--
ALTER TABLE `credentials`
  ADD PRIMARY KEY (`userid`);

--
-- Indexes for table `product_stock`
--
ALTER TABLE `product_stock`
  ADD PRIMARY KEY (`productID`);

--
-- Indexes for table `tblorder`
--
ALTER TABLE `tblorder`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblpayment`
--
ALTER TABLE `tblpayment`
  ADD PRIMARY KEY (`paymentId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cartId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `credentials`
--
ALTER TABLE `credentials`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `product_stock`
--
ALTER TABLE `product_stock`
  MODIFY `productID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tblorder`
--
ALTER TABLE `tblorder`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tblpayment`
--
ALTER TABLE `tblpayment`
  MODIFY `paymentId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
