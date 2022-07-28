-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 21, 2021 at 04:20 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(15) NOT NULL,
  `mobile` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`id`, `name`, `email`, `password`, `mobile`) VALUES
(1, 'Admin', 'admin@gmail.com', 'admin', '03124567890'),
(2, 'M Sajjad Aziz', 'sajjad18801@gmail.com', 'sajjad', '03122134567');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `brand_id` int(11) NOT NULL,
  `brand_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`brand_id`, `brand_name`) VALUES
(1, 'Nike'),
(2, 'Adidas'),
(3, 'Zenith'),
(4, 'Cartier'),
(5, 'Piaget'),
(6, 'Puma'),
(7, 'Tudor'),
(8, 'Aerosoft');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`) VALUES
(1, 'Wrist Watches'),
(2, 'Shoes');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `dated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `message`, `dated`) VALUES
(1, 'M Sajjad Aziz', 'azizmsajjad@gmail.com', 'abc', '2021-12-20 08:29:09');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `address` text NOT NULL,
  `city` varchar(50) NOT NULL,
  `pincode` int(11) NOT NULL,
  `total_amount` float NOT NULL,
  `payment_type` varchar(50) NOT NULL,
  `payment_status` varchar(50) NOT NULL,
  `order_status` int(11) NOT NULL,
  `added_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `address`, `city`, `pincode`, `total_amount`, `payment_type`, `payment_status`, `order_status`, `added_on`) VALUES
(3, 2, 'Address', 'Karachi', 10001, 7899, 'cod', 'pending', 1, '2021-12-20 08:27:58'),
(4, 2, 'Address', 'Karachi', 10001, 5000, 'cod', 'pending', 1, '2021-12-20 08:35:53'),
(8, 2, 'Address', 'Karachi', 10001, 5000, 'cod', 'pending', 1, '2021-12-20 08:41:38'),
(14, 2, 'Address', 'Karachi', 10001, 5000, 'cod', 'pending', 1, '2021-12-20 08:48:20'),
(16, 2, 'Address', 'Karachi', 10001, 5000, 'cod', 'pending', 1, '2021-12-20 08:55:35'),
(17, 2, 'Address', 'Karachi', 10001, 5000, 'cod', 'pending', 1, '2021-12-20 08:56:47'),
(18, 2, 'Address', 'Karachi', 10001, 5000, 'cod', 'pending', 1, '2021-12-20 08:58:12'),
(19, 2, 'Address', 'Karachi', 10001, 17898, 'cod', 'pending', 1, '2021-12-20 09:09:43'),
(20, 2, 'Address', 'Karachi', 10001, 12000, 'cod', 'pending', 1, '2021-12-20 09:12:10'),
(21, 2, 'Address', 'Karachi', 10001, 12000, 'cod', 'pending', 1, '2021-12-20 09:12:58'),
(22, 2, 'Address', 'Karachi', 10001, 12000, 'cod', 'pending', 1, '2021-12-20 09:14:21'),
(23, 2, 'Address', 'Karachi', 10001, 12000, 'cod', 'pending', 1, '2021-12-20 09:24:26'),
(24, 2, 'Address', 'Karachi', 10001, 5000, 'cod', 'pending', 1, '2021-12-20 09:25:25'),
(25, 2, 'Address', 'Karachi', 10001, 5000, 'cod', 'pending', 1, '2021-12-20 09:26:37'),
(26, 2, 'Address', 'Karachi', 10001, 5000, 'cod', 'pending', 1, '2021-12-20 09:27:00'),
(27, 2, 'Address', 'Karachi', 10001, 12000, 'cod', 'pending', 1, '2021-12-20 09:28:44'),
(28, 2, 'Address', 'Karachi', 10001, 7899, 'cod', 'pending', 1, '2021-12-20 09:32:05'),
(29, 2, 'Address', 'Karachi', 10001, 7899, 'cod', 'pending', 1, '2021-12-20 09:33:25');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `product_id`, `quantity`, `price`) VALUES
(5, 3, 4, 1, 7899),
(6, 4, 1, 1, 5000),
(10, 8, 1, 1, 5000),
(16, 14, 1, 1, 5000),
(18, 16, 1, 1, 5000),
(19, 17, 1, 1, 5000),
(20, 18, 1, 1, 5000),
(21, 19, 1, 1, 5000),
(22, 19, 3, 1, 4999),
(23, 19, 4, 1, 7899),
(24, 20, 1, 1, 5000),
(25, 20, 2, 1, 6999.99),
(26, 21, 1, 1, 5000),
(27, 21, 2, 1, 6999.99),
(28, 22, 1, 1, 5000),
(29, 22, 2, 1, 6999.99),
(30, 23, 1, 1, 5000),
(31, 23, 2, 1, 6999.99),
(32, 24, 1, 1, 5000),
(33, 25, 1, 1, 5000),
(34, 26, 1, 1, 5000),
(35, 27, 1, 1, 5000),
(36, 27, 2, 1, 6999.99),
(37, 28, 4, 1, 7899),
(38, 29, 4, 1, 7899);

-- --------------------------------------------------------

--
-- Table structure for table `order_status`
--

CREATE TABLE `order_status` (
  `id` int(11) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_status`
--

INSERT INTO `order_status` (`id`, `status`) VALUES
(1, 'Pending'),
(2, 'Processing'),
(3, 'Shipped'),
(4, 'Canceled'),
(5, 'Compelete');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `price` float NOT NULL,
  `quantity` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `short_desc` text NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `brand_id`, `category_id`, `product_name`, `price`, `quantity`, `image`, `status`, `short_desc`, `description`) VALUES
(1, 2, 2, 'Brown and White Shoes', 5000, 29, '106138782_shoes-5.jpg', 0, 'A lace-less soccer shoe for women that fits like a glove to have you conquer the fields like a pro. Available in the color black.', 'Whenever you start looking for the best footwear in the sports shoe category, the one thing that comes into your mind is the three-stripe logo, yeah that’s right “AD”. The brand is the pioneer in the finish sports footwear category with worldwide distribution and provides the elongated range of sportswear, traveling shoes, sneakers, and gymnastic shoes, for men and women both. The brand has a mind-blowing and exclusive range of tennis shoes for players at court and also has a lot to offer to fulfill the needs of soccer freaks.'),
(2, 5, 1, 'White Stainless Steel Watch', 6999.99, 15, '110778877_watch-1.jpg', 0, 'Order online Casio Edifice EFV-570D-1AVUDF model men’s wrist watch in black chronograph dial & silver steel strap.', 'Brand: Casio Edifice\r\nDial Color: Black\r\nCase Shape: Round\r\nCase Material: Stainless Steel\r\nGender: Men’s\r\nMovement: Quartz Japan\r\nStrap / Bracelet Material: Stainless Steel\r\nWatches Category: Men’s Fashion Watches'),
(3, 3, 1, 'Black Wrist Watch', 4999, 20, '110131992_watch-20.jpg', 0, 'Order online Casio Edifice EFV-570D-1AVUDF model men’s wrist watch in black chronograph dial & silver steel strap.', 'Brand: Casio Edifice\r\nDial Color: Black\r\nCase Shape: Round\r\nCase Material: Stainless Steel\r\nGender: Men’s\r\nMovement: Quartz Japan\r\nStrap / Bracelet Material: Stainless Steel\r\nWatches Category: Men’s Fashion Watches'),
(4, 1, 2, 'Adidas White Shoes', 7899, 45, '101242743_shoes-21.jpg', 0, 'A lace-less soccer shoe for women that fits like a glove to have you conquer the fields like a pro. Available in the color black.', 'Whenever you start looking for the best footwear in the sports shoe category, the one thing that comes into your mind is the three-stripe logo, yeah that’s right “AD”. The brand is the pioneer in the finish sports footwear category with worldwide distribution and provides the elongated range of sportswear, traveling shoes, sneakers, and gymnastic shoes, for men and women both. The brand has a mind-blowing and exclusive range of tennis shoes for players at court and also has a lot to offer to fulfill the needs of soccer freaks.'),
(5, 6, 2, 'Blue Joggers', 6000, 20, '104393674_shoes-27.jpg', 0, 'A lace-less soccer shoe for women that fits like a glove to have you conquer the fields like a pro. Available in the color black.', 'Whenever you start looking for the best footwear in the sports shoe category, the one thing that comes into your mind is the three-stripe logo, yeah that’s right “AD”. The brand is the pioneer in the finish sports footwear category with worldwide distribution and provides the elongated range of sportswear, traveling shoes, sneakers, and gymnastic shoes, for men and women both. The brand has a mind-blowing and exclusive range of tennis shoes for players at court and also has a lot to offer to fulfill the needs of soccer freaks.'),
(6, 8, 2, 'Brown Formal Shoes', 7500, 33, '107305889_shoes-22.jpg', 0, 'A lace-less soccer shoe for women that fits like a glove to have you conquer the fields like a pro. Available in the color black.', 'Whenever you start looking for the best footwear in the sports shoe category, the one thing that comes into your mind is the three-stripe logo, yeah that’s right “AD”. The brand is the pioneer in the finish sports footwear category with worldwide distribution and provides the elongated range of sportswear, traveling shoes, sneakers, and gymnastic shoes, for men and women both. The brand has a mind-blowing and exclusive range of tennis shoes for players at court and also has a lot to offer to fulfill the needs of soccer freaks.'),
(7, 4, 1, 'Stainless Steel Wrist Watch', 3999.99, 19, '105164582_watch-12.jpg', 0, 'Order online Casio Edifice EFV-570D-1AVUDF model men’s wrist watch in black chronograph dial & silver steel strap.', 'Brand: Casio Edifice\r\nDial Color: Black\r\nCase Shape: Round\r\nCase Material: Stainless Steel\r\nGender: Men’s\r\nMovement: Quartz Japan\r\nStrap / Bracelet Material: Stainless Steel\r\nWatches Category: Men’s Fashion Watches'),
(8, 7, 1, 'Tudor Wrist Watch', 8999, 39, '105154411_watch-13.jpg', 0, 'Order online Casio Edifice EFV-570D-1AVUDF model men’s wrist watch in black chronograph dial & silver steel strap.', 'Brand: Casio Edifice\r\nDial Color: Black\r\nCase Shape: Round\r\nCase Material: Stainless Steel\r\nGender: Men’s\r\nMovement: Quartz Japan\r\nStrap / Bracelet Material: Stainless Steel\r\nWatches Category: Men’s Fashion Watches'),
(9, 1, 2, 'Black Shoes', 6500, 50, '104439251_shoes-15.jpg', 0, 'A lace-less soccer shoe for women that fits like a glove to have you conquer the fields like a pro. Available in the color black.', 'Whenever you start looking for the best footwear in the sports shoe category, the one thing that comes into your mind is the three-stripe logo, yeah that’s right “AD”. The brand is the pioneer in the finish sports footwear category with worldwide distribution and provides the elongated range of sportswear, traveling shoes, sneakers, and gymnastic shoes, for men and women both. The brand has a mind-blowing and exclusive range of tennis shoes for players at court and also has a lot to offer to fulfill the needs of soccer freaks.'),
(10, 7, 1, 'Wrist Watch Gift', 8999, 75, '109393115_watch-17.jpg', 0, 'Order online Casio Edifice EFV-570D-1AVUDF model men’s wrist watch in black chronograph dial & silver steel strap.', 'Brand: Casio Edifice\r\nDial Color: Black\r\nCase Shape: Round\r\nCase Material: Stainless Steel\r\nGender: Men’s\r\nMovement: Quartz Japan'),
(11, 2, 2, 'Daily Routine Shoes', 4999, 32, '105042917_shoes-20.jpg', 0, 'A lace-less soccer shoe for women that fits like a glove to have you conquer the fields like a pro. Available in the color black.', 'Whenever you start looking for the best footwear in the sports shoe category, the one thing that comes into your mind is the three-stripe logo, yeah that’s right “AD”. The brand is the pioneer in the finish sports footwear category with worldwide distribution and provides the elongated range of sportswear, traveling shoes, sneakers, and gymnastic shoes, for men and women both. The brand has a mind-blowing and exclusive range of tennis shoes for players at court and also has a lot to offer to fulfill the needs of soccer freaks.'),
(12, 3, 1, 'Golden Wrist Watch', 7998, 46, '110190285_watch-21.jpg', 0, 'Order online Casio Edifice EFV-570D-1AVUDF model men’s wrist watch in black chronograph dial & silver steel strap.', 'Brand: Casio Edifice\r\nDial Color: Black\r\nCase Shape: Round\r\nCase Material: Stainless Steel\r\nGender: Men’s\r\nMovement: Quartz Japan');

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `review` text NOT NULL,
  `added_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `order_status` (`order_status`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `order_status`
--
ALTER TABLE `order_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `brand_id` (`brand_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `order_status`
--
ALTER TABLE `order_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `account` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`order_status`) REFERENCES `order_status` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_details_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`brand_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `products_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `categories` (`category_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `review_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `review_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `account` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
