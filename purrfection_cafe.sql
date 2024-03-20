-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 20, 2024 at 04:20 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `purrfection_cafe`
--

-- --------------------------------------------------------

--
-- Table structure for table `beverages`
--

CREATE TABLE `beverages` (
  `item_id` int(255) NOT NULL,
  `item_name` varchar(1000) NOT NULL,
  `price` varchar(1000) NOT NULL,
  `description` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `beverages`
--

INSERT INTO `beverages` (`item_id`, `item_name`, `price`, `description`) VALUES
(1, 'Meowtcha Tea', '200', 'Indulge in a creamy concoction blending the earthy allure of matcha with a hint of sweetness, whisking you away on a feline-inspired journey with every velvety sip\r\n'),
(2, 'Pawspresso', '175', 'Treat yourself to a cup of Pawspresso, a paw-sitively delightful brew crafted with precision and passion. This aromatic espresso blend boasts bold flavors and a smooth finish, sure to whisk you away on a journey of caffeinated delight. Served with a dash of frothy milk, each sip is a moment of pure indulgence.\r\n'),
(3, 'Catnip Infusion Tea', '150', 'Unwind with a cup of Catnip Infusion Tea, a soothing blend designed to whisk you away to a state of ultimate relaxation. Infused with the essence of catnip, this herbal tea offers a gentle, calming sensation, perfect for those moments when you need to unwind and recharge. Sip slowly and let the stresses of the day melt away as you embrace the tranquility of this feline-inspired infusion.\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `contact_info`
--

CREATE TABLE `contact_info` (
  `user_id` int(255) NOT NULL,
  `name` varchar(1000) NOT NULL,
  `email` varchar(1000) NOT NULL,
  `concern` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact_info`
--

INSERT INTO `contact_info` (`user_id`, `name`, `email`, `concern`) VALUES
(1, 'tabby', 'tabby@gmail.com', 'waaaah');

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE `profile` (
  `user_id` int(255) NOT NULL,
  `first_name` varchar(1000) NOT NULL,
  `last_name` varchar(1000) NOT NULL,
  `email` varchar(1000) NOT NULL,
  `password` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`user_id`, `first_name`, `last_name`, `email`, `password`) VALUES
(1, 'Tabby', 'Tabby', 'tabby@gmail.com', '$2y$10$LZhGynYvTeCi3WwUb.Wlv.epUjYkkIycGsbQwsFuKquXNpd.NDJpe');

-- --------------------------------------------------------

--
-- Table structure for table `snacks`
--

CREATE TABLE `snacks` (
  `item_id` int(255) NOT NULL,
  `item_name` varchar(1000) NOT NULL,
  `price` varchar(1000) NOT NULL,
  `description` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `snacks`
--

INSERT INTO `snacks` (`item_id`, `item_name`, `price`, `description`) VALUES
(1, 'Purrfection Pastries', '100', 'Indulge in the whimsical charm of Purrfection Pastries, artisanal treats meticulously crafted to satisfy your sweet cravings. Each pastry is a delightful fusion of flaky layers, rich fillings, and a hint of whimsy, promising a moment of sheer delight with every bite.'),
(2, 'Feline Frittatas', '200', 'Embark on a culinary adventure with Feline Frittatas, savory delights inspired by the flavors of the Mediterranean. These miniature frittatas boast a harmonious blend of herbs, cheeses, and wholesome ingredients, offering a tantalizing taste experience that\'s perfect for any occasion.\r\n'),
(3, 'Kitty Krunch Mix', '150', 'Savor the satisfying crunch of Kitty Krunch Mix, a delightful assortment of snacks designed to please every palate. From zesty to savory, this mix features an array of flavors and textures that will tantalize your taste buds and leave you craving more.\r\n'),
(4, 'Tuna Tartare Treats', '250', 'Elevate your snacking experience with Tuna Tartare Treats, gourmet bites that redefine indulgence. Made from the finest cuts of sushi-grade tuna, each treat is expertly seasoned and paired with complementary ingredients, delivering a burst of fresh flavors and exquisite taste in every bite.\r\n');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `beverages`
--
ALTER TABLE `beverages`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `contact_info`
--
ALTER TABLE `contact_info`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `snacks`
--
ALTER TABLE `snacks`
  ADD PRIMARY KEY (`item_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `beverages`
--
ALTER TABLE `beverages`
  MODIFY `item_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `contact_info`
--
ALTER TABLE `contact_info`
  MODIFY `user_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `profile`
--
ALTER TABLE `profile`
  MODIFY `user_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `snacks`
--
ALTER TABLE `snacks`
  MODIFY `item_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
