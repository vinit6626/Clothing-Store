-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 17, 2023 at 03:49 AM
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
-- Database: `solosquad_clothingstore`
--

-- --------------------------------------------------------

--
-- Table structure for table `Brands`
--

CREATE TABLE `Brands` (
  `BrandID` int(11) NOT NULL,
  `BrandName` varchar(50) DEFAULT NULL,
  `BrandDescription` varchar(255) DEFAULT NULL,
  `BrandCategory` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Brands`
--

INSERT INTO `Brands` (`BrandID`, `BrandName`, `BrandDescription`, `BrandCategory`) VALUES
(15, 'Nike', 'Sportswear brand', 'Sportswear'),
(16, 'Adidas', 'Sportswear brand', 'Sportswear'),
(17, 'Levi\'s', 'Denim brand', 'Jeans'),
(18, 'Gucci', 'Luxury fashion brand', 'Fashion'),
(19, 'Zara', 'Fashion retailer', 'Fashion'),
(20, 'Prada', 'Tshirt Brand', 'Tshirt'),
(24, 'Here and now', 'Fashion brand', 'Tshirt ');

-- --------------------------------------------------------

--
-- Table structure for table `ClothingItems`
--

CREATE TABLE `ClothingItems` (
  `ItemID` int(11) NOT NULL,
  `ItemName` varchar(50) DEFAULT NULL,
  `ItemDescription` varchar(255) DEFAULT NULL,
  `Price` decimal(10,2) DEFAULT NULL,
  `BrandID` int(11) DEFAULT NULL,
  `StoreID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ClothingItems`
--

INSERT INTO `ClothingItems` (`ItemID`, `ItemName`, `ItemDescription`, `Price`, `BrandID`, `StoreID`) VALUES
(24, 'Air Max 90', 'Classic running shoes', '123.99', 15, 11),
(34, 'Oversize Tshirt', 'Comfortable running shoes', '179.99', 16, 12),
(35, '501 Original Fit Jeans', 'Classic straight leg jeans', '59.99', 17, 11),
(36, 'Princetown Leather Slippers', 'Signature Gucci slipper', '99.99', 18, 12),
(37, 'Slim Fit Blazer', 'Slim Fit Blazer', '129.00', 19, 13),
(38, 'Leather Ankle Boots', 'Chunky sole leather boots', '99.99', 18, 14),
(39, 'Cotton Poplin Shirt', 'Crisp cotton shirt', '29.99', 19, 15),
(40, 'Super Skinny Jeans', 'Stretch denim skinny jeans', '49.99', 17, 13),
(41, 'Hoodie with Embroidery', 'Soft cotton hoodie', '39.99', 15, 14),
(42, 'Leather Biker Jacket', 'Asymmetric zip biker jacket', '69.99', 16, 15),
(43, 'Winter Jacket', 'Available in all size and color', '129.99', 15, 14),
(44, 'Polo Tshirt', 'Plain tshirt for Men', '29.99', 15, 13),
(45, 'Jeans for Men', 'Denim Jeans ', '59.99', 18, 14),
(46, 'Red Tshirt', 'Red Tshirt Available in every size', '39.99', 20, 14),
(47, 'Polo Tshirt', 'This tshirt is available in every size with all colors', '29.99', 24, 17),
(48, 'Sweat Shirt', 'Red product', '49.99', 24, 17);

-- --------------------------------------------------------

--
-- Table structure for table `OrderDetails`
--

CREATE TABLE `OrderDetails` (
  `OrderDetailID` int(11) NOT NULL,
  `UserName` varchar(50) DEFAULT NULL,
  `Address` varchar(200) DEFAULT NULL,
  `ItemID` int(11) DEFAULT NULL,
  `Total` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `OrderDetails`
--

INSERT INTO `OrderDetails` (`OrderDetailID`, `UserName`, `Address`, `ItemID`, `Total`) VALUES
(1, 'Vinit Dabhi', '72 Massey Ave', 34, 180),
(2, 'Chirag Dhorajiya', '91 Harding St', 37, 129),
(3, 'Vinit Dabhi', '72 Massey Ave', 37, 129),
(4, 'Vinit Dabhi', '72 Massey Ave', 38, 100),
(5, 'Vinit Dabhi', '72 Massey Ave', 36, 100),
(6, 'Chirag Dhorajiya', '91 Harding St', 40, 50),
(7, 'Chirag Dhorajiya', '91 Harding St', 36, 100),
(8, 'Pintu Chauhan', 'Waterloo', 42, 70),
(9, 'Pratik Bhingradiya', 'Kitchener', 39, 30),
(10, 'Tirth Navadiya', 'Toronto', 36, 100),
(11, 'Vinit Dabhi', '72 Massey Ave', 47, 30);

-- --------------------------------------------------------

--
-- Table structure for table `Stores`
--

CREATE TABLE `Stores` (
  `StoreID` int(11) NOT NULL,
  `StoreName` varchar(50) DEFAULT NULL,
  `StoreAddress` varchar(255) DEFAULT NULL,
  `StoreCity` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Stores`
--

INSERT INTO `Stores` (`StoreID`, `StoreName`, `StoreAddress`, `StoreCity`) VALUES
(11, 'Macy\'s', '151 W 34th St', 'New York'),
(12, 'Nordstrom', '10250 Santa Monica Blvd', 'Los Angeles'),
(13, 'Bloomingdale\'s', '1000 3rd Ave', 'New York'),
(14, 'H&M', '558 Broadway', 'New York'),
(15, 'Zara', '750 Lexington Ave', 'New York'),
(17, 'Conestoga Mall', 'Fairview Mall', 'Kitchener');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Brands`
--
ALTER TABLE `Brands`
  ADD PRIMARY KEY (`BrandID`);

--
-- Indexes for table `ClothingItems`
--
ALTER TABLE `ClothingItems`
  ADD PRIMARY KEY (`ItemID`),
  ADD KEY `BrandID` (`BrandID`),
  ADD KEY `StoreID` (`StoreID`);

--
-- Indexes for table `OrderDetails`
--
ALTER TABLE `OrderDetails`
  ADD PRIMARY KEY (`OrderDetailID`),
  ADD KEY `ItemID` (`ItemID`);

--
-- Indexes for table `Stores`
--
ALTER TABLE `Stores`
  ADD PRIMARY KEY (`StoreID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Brands`
--
ALTER TABLE `Brands`
  MODIFY `BrandID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `ClothingItems`
--
ALTER TABLE `ClothingItems`
  MODIFY `ItemID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `OrderDetails`
--
ALTER TABLE `OrderDetails`
  MODIFY `OrderDetailID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `Stores`
--
ALTER TABLE `Stores`
  MODIFY `StoreID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ClothingItems`
--
ALTER TABLE `ClothingItems`
  ADD CONSTRAINT `clothingitems_ibfk_1` FOREIGN KEY (`BrandID`) REFERENCES `Brands` (`BrandID`),
  ADD CONSTRAINT `clothingitems_ibfk_2` FOREIGN KEY (`StoreID`) REFERENCES `Stores` (`StoreID`);

--
-- Constraints for table `OrderDetails`
--
ALTER TABLE `OrderDetails`
  ADD CONSTRAINT `orderdetails_ibfk_1` FOREIGN KEY (`ItemID`) REFERENCES `ClothingItems` (`ItemID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
