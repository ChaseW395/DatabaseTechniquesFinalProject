-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 05, 2022 at 04:36 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hackingstore`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `TypeNumber` int(11) NOT NULL,
  `AccountType` char(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`TypeNumber`, `AccountType`) VALUES
(1, 'User'),
(2, 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `OrderID` int(11) NOT NULL,
  `UserID` int(11) DEFAULT NULL,
  `ProductNumber` int(11) DEFAULT NULL,
  `ItemAmount` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`OrderID`, `UserID`, `ProductNumber`, `ItemAmount`) VALUES
(3, 6, 2, 3),
(4, 6, 3, 1),
(5, 9, 1, 2),
(6, 9, 5, 1),
(10, 9, 4, 3);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `ProductNumber` int(11) NOT NULL,
  `ProductName` char(40) NOT NULL,
  `ProductDescription` text DEFAULT NULL,
  `CategoryNumber` int(11) DEFAULT NULL,
  `Cost` decimal(5,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`ProductNumber`, `ProductName`, `ProductDescription`, `CategoryNumber`, `Cost`) VALUES
(1, 'Lockpick Set', 'Penetration testing is not always about digital security.  This lockpick set will help get you anywhere inside of any company (ethically of course).', 2, '25.00'),
(2, 'Kali Linux with Guide Book', 'This item comes with a link to download Kali Linux, one of the best operating systems for hacking!  It also includes a guide book that walks you through setting up a kali virtual machine and learn the basics of Linux.', 3, '5.00'),
(3, 'USB Rubber Ducky', 'This product imitates a USB drive when really it is identified as a keyboard by the computer.  It can be programmed to inject keystrokes.', 4, '50.00'),
(4, 'Evil Twin Router', 'This is a nasty piece of technology which allows an attacker to imitate a real WiFi router.  This will allow for full control of the packets from connected devices.', 5, '70.00'),
(5, 'Bluetooth Antenna', 'This antenna will allow attackers to use certain programs for bluetooth hacking.', 6, '15.00');

-- --------------------------------------------------------

--
-- Table structure for table `tool_categories`
--

CREATE TABLE `tool_categories` (
  `CategoryNumber` int(11) NOT NULL,
  `CategoryName` char(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tool_categories`
--

INSERT INTO `tool_categories` (`CategoryNumber`, `CategoryName`) VALUES
(1, 'No Preference'),
(2, 'Physical Tools'),
(3, 'Software'),
(4, 'Hotplug Attacks'),
(5, 'Man-in-the-Middle'),
(6, 'Wireless Attacks');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `UserID` int(11) NOT NULL,
  `AccountType` int(11) DEFAULT NULL,
  `Name` char(30) NOT NULL,
  `email` char(30) NOT NULL,
  `password` char(150) NOT NULL,
  `ToolPreferenceNO` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`UserID`, `AccountType`, `Name`, `email`, `password`, `ToolPreferenceNO`) VALUES
(6, 2, 'Chase Williams', 'admin@admin.com', '5e884898da28047151d0e56f8dc6292773603d0d6aabbdd62a11ef721d1542d8', 4),
(9, 1, 'Jill Pines', 'user@example.com', '5e884898da28047151d0e56f8dc6292773603d0d6aabbdd62a11ef721d1542d8', 6),
(20, 1, 'Jane Doe', 'user2@example.com', '5e884898da28047151d0e56f8dc6292773603d0d6aabbdd62a11ef721d1542d8', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`TypeNumber`),
  ADD UNIQUE KEY `TypeNumber` (`TypeNumber`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`OrderID`),
  ADD UNIQUE KEY `OrderID` (`OrderID`),
  ADD KEY `orders_ibfk_2` (`ProductNumber`),
  ADD KEY `orders_ibfk_1` (`UserID`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`ProductNumber`),
  ADD UNIQUE KEY `ProductNumber` (`ProductNumber`),
  ADD UNIQUE KEY `ProductNumber_2` (`ProductNumber`),
  ADD KEY `CategoryNumberFK` (`CategoryNumber`);

--
-- Indexes for table `tool_categories`
--
ALTER TABLE `tool_categories`
  ADD UNIQUE KEY `CategoryNumber` (`CategoryNumber`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UserID`),
  ADD UNIQUE KEY `UserID` (`UserID`),
  ADD UNIQUE KEY `UserID_2` (`UserID`),
  ADD KEY `CategoryPreferenceFK` (`ToolPreferenceNO`),
  ADD KEY `TypeNumberFK` (`AccountType`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `TypeNumber` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `OrderID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `ProductNumber` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tool_categories`
--
ALTER TABLE `tool_categories`
  MODIFY `CategoryNumber` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `users` (`UserID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`ProductNumber`) REFERENCES `products` (`ProductNumber`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `CategoryNumberFK` FOREIGN KEY (`CategoryNumber`) REFERENCES `tool_categories` (`CategoryNumber`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `CategoryPreferenceFK` FOREIGN KEY (`ToolPreferenceNO`) REFERENCES `tool_categories` (`CategoryNumber`),
  ADD CONSTRAINT `TypeNumberFK` FOREIGN KEY (`AccountType`) REFERENCES `accounts` (`TypeNumber`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
