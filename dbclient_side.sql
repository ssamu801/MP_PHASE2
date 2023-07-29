-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 29, 2023 at 12:27 PM
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
-- Database: `dbclient_side`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_accounts`
--

CREATE TABLE `admin_accounts` (
  `id` int(11) NOT NULL,
  `username` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_accounts`
--

INSERT INTO `admin_accounts` (`id`, `username`, `password`) VALUES
(1, 'admin', 'password');

-- --------------------------------------------------------

--
-- Table structure for table `combo_content`
--

CREATE TABLE `combo_content` (
  `contentid` int(11) NOT NULL,
  `comboID` int(11) DEFAULT NULL,
  `foodName` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `combo_content`
--

INSERT INTO `combo_content` (`contentid`, `comboID`, `foodName`) VALUES
(1, 1, 'Chicken'),
(2, 1, 'Mashed Potato'),
(3, 1, 'Iced Tea'),
(4, 2, 'Steak'),
(5, 2, 'Steamed Vegetables'),
(6, 2, 'Root Beer');

-- --------------------------------------------------------

--
-- Table structure for table `dish`
--

CREATE TABLE `dish` (
  `dishID` int(11) NOT NULL,
  `dishName` varchar(45) DEFAULT NULL,
  `dishCategory` varchar(45) DEFAULT NULL,
  `dishPrice` float DEFAULT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dish`
--

INSERT INTO `dish` (`dishID`, `dishName`, `dishCategory`, `dishPrice`, `img`) VALUES
(1, 'Steak', 'Mains', 900, 'img/64c4e5dd6f1c2_Steak.jpeg'),
(2, 'Salmon', 'Mains', 850, 'img/64c4e610b19ae_salmon.jpeg'),
(3, 'Chicken', 'Mains', 300, 'img/64c4e621ccdae_chicken.jpeg'),
(4, 'Baked Potato', 'Sides', 80, 'img/64c4e64c9fdb0_Baked Potato.jpeg'),
(5, 'Mashed Potato', 'Sides', 75, 'img/64c4e67757fe2_Mashed Potato.jpeg'),
(6, 'Steamed Vegetables', 'Sides', 50, 'img/64c4e6853e459_Steamed Vegetables.jpeg'),
(7, 'Iced Tea', 'Drinks', 55, 'img/64c4e69c7e72c_Iced Tea.jpeg'),
(8, 'Root Beer', 'Drinks', 60, 'img/64c4e6ad2e7e7_Root Beer.webp'),
(9, 'Water', 'Drinks', 20, 'img/64c4e6b628a1e_Water.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `dish_category`
--

CREATE TABLE `dish_category` (
  `categoryID` int(11) NOT NULL,
  `categoryName` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dish_category`
--

INSERT INTO `dish_category` (`categoryID`, `categoryName`) VALUES
(101, 'Mains'),
(102, 'Sides'),
(103, 'Drinks');

-- --------------------------------------------------------

--
-- Table structure for table `food_combo`
--

CREATE TABLE `food_combo` (
  `comboID` int(11) NOT NULL,
  `comboName` varchar(100) DEFAULT NULL,
  `discount` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `food_combo`
--

INSERT INTO `food_combo` (`comboID`, `comboName`, `discount`) VALUES
(1, 'Chicken Mash Tea Combo', 0.1),
(2, 'Steak Veg Beer Combo', 0.15);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `orderID` int(11) NOT NULL,
  `totalPrice` float DEFAULT NULL,
  `discountedPrice` int(11) DEFAULT NULL,
  `orderBy` varchar(45) DEFAULT NULL,
  `orderedAt` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_item`
--

CREATE TABLE `order_item` (
  `itemID` int(11) NOT NULL,
  `orderID` int(11) DEFAULT NULL,
  `dishName` varchar(45) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_accounts`
--
ALTER TABLE `admin_accounts`
  ADD PRIMARY KEY (`id`,`username`);

--
-- Indexes for table `combo_content`
--
ALTER TABLE `combo_content`
  ADD PRIMARY KEY (`contentid`),
  ADD KEY `comboID` (`comboID`);

--
-- Indexes for table `dish`
--
ALTER TABLE `dish`
  ADD PRIMARY KEY (`dishID`);

--
-- Indexes for table `dish_category`
--
ALTER TABLE `dish_category`
  ADD PRIMARY KEY (`categoryID`);

--
-- Indexes for table `food_combo`
--
ALTER TABLE `food_combo`
  ADD PRIMARY KEY (`comboID`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orderID`);

--
-- Indexes for table `order_item`
--
ALTER TABLE `order_item`
  ADD PRIMARY KEY (`itemID`),
  ADD KEY `orderID` (`orderID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `orderID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10025;

--
-- AUTO_INCREMENT for table `order_item`
--
ALTER TABLE `order_item`
  MODIFY `itemID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=900037;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `combo_content`
--
ALTER TABLE `combo_content`
  ADD CONSTRAINT `combo_content_ibfk_1` FOREIGN KEY (`comboID`) REFERENCES `food_combo` (`comboID`);

--
-- Constraints for table `order_item`
--
ALTER TABLE `order_item`
  ADD CONSTRAINT `order_item_ibfk_1` FOREIGN KEY (`orderID`) REFERENCES `orders` (`orderID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
