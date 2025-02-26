-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 28, 2024 at 10:21 AM
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
-- Database: `the_gallery_cafe_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact_messages`
--

CREATE TABLE `contact_messages` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `contact_messages`
--

INSERT INTO `contact_messages` (`id`, `name`, `email`, `phone`, `subject`, `message`, `created_at`) VALUES
(1, 'Customer_1', 'customer_1@gmail.com', '0786787667', 'I need to cantact the admin panel', 'I need to change my email in this website. Hopefully I am expecting a reply.', '2024-06-29 05:23:26'),
(2, 'Customer_1', 'customer_1@gmail.com', '0786787667', 'Need help from Staff', 'My contact informations need an update', '2024-06-29 07:03:54'),
(3, 'Customer_1', 'customer_1@gmail.com', '0786787667', 'contact staff', 'I need to contact staff.', '2024-07-15 07:26:16');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `item_type` varchar(255) NOT NULL,
  `cuisine_type` enum('Sri Lankan','Chinese','Italian') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `name`, `image`, `price`, `quantity`, `item_type`, `cuisine_type`, `created_at`) VALUES
(1, 'Fish Ambul Thiyal with Rice', '../images/foods/1.jpg', 10.00, 20, 'Food', 'Sri Lankan', '2024-06-29 06:03:11'),
(2, 'Hoppers (Appa)', '../images/foods/2.jpg', 4.00, 20, 'Food', 'Sri Lankan', '2024-06-29 06:04:13'),
(3, 'Kottu Roti', '../images/foods/3.jpg', 8.00, 4, 'Food', 'Sri Lankan', '2024-06-29 06:04:43'),
(4, 'Ceylon Tea', '../images/foods/4.jpg', 1.20, 44, 'Drink', 'Sri Lankan', '2024-06-29 06:05:13'),
(5, 'Margherita Pizza', '../images/foods/19.jpg', 14.00, 5, 'Food', 'Italian', '2024-06-29 06:06:26'),
(6, 'Lasagna', '../images/foods/6.jpg', 14.00, 5, 'Food', 'Italian', '2024-06-29 06:06:47'),
(7, 'Tiramisu', '../images/foods/7.jpg', 8.00, 7, 'Food', 'Italian', '2024-06-29 06:07:21'),
(8, 'Spaghetti Carbonara', '../images/foods/8.jpg', 15.00, 4, 'Food', 'Italian', '2024-06-29 06:07:43'),
(9, 'Jasmine Tea', '../images/foods/12.jpg', 2.50, 20, 'Drink', 'Chinese', '2024-06-29 06:08:11'),
(10, 'Kung Pao Chicken', '../images/foods/9.jpg', 13.00, 7, 'Food', 'Chinese', '2024-06-29 06:08:38'),
(11, 'Dim Sum', '../images/foods/10.jpg', 10.00, 8, 'Food', 'Chinese', '2024-06-29 06:08:58'),
(12, 'Sweet and Sour Pork', '../images/foods/11.jpg', 11.00, 8, 'Food', 'Chinese', '2024-06-29 06:09:34'),
(18, 'Spicy Beef Kottu', '../images/foods/16.jpg', 14.99, 8, 'Special', 'Sri Lankan', '2024-07-04 17:04:38'),
(19, 'Thai Fried Rice', '../images/foods/17.jpg', 19.99, 6, 'Special', 'Chinese', '2024-07-04 17:05:10'),
(20, 'Seafood Pizza', '../images/foods/18.jpg', 16.99, 7, 'Special', 'Italian', '2024-07-04 17:06:01');

-- --------------------------------------------------------

--
-- Table structure for table `parking`
--

CREATE TABLE `parking` (
  `id` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `parking`
--

INSERT INTO `parking` (`id`, `status`, `description`) VALUES
(1, 1, 'Parking slot 1'),
(2, 0, 'Parking slot 2'),
(3, 1, 'Parking slot 3'),
(4, 1, 'Parking slot 4'),
(5, 0, 'Parking slot 5'),
(6, 1, 'Parking slot 6'),
(7, 0, 'Parking slot 7'),
(8, 1, 'Parking slot 8'),
(9, 1, 'Parking slot 9'),
(10, 0, 'Parking slot 10'),
(11, 1, 'Parking slot 11'),
(12, 0, 'Parking slot 12'),
(13, 1, 'Parking slot 13'),
(14, 0, 'Parking slot 14'),
(15, 1, 'Parking slot 15'),
(16, 1, 'Parking slot 16'),
(17, 0, 'Parking slot 17'),
(18, 1, 'Parking slot 18'),
(19, 1, 'Parking slot 19'),
(20, 0, 'Parking slot 20'),
(21, 1, 'Parking slot 21'),
(22, 1, 'Parking slot 22'),
(23, 1, 'Parking slot 23'),
(24, 1, 'Parking slot 24'),
(25, 1, 'Parking slot 25'),
(26, 0, 'Parking slot 26'),
(27, 1, 'Parking slot 27'),
(28, 1, 'Parking slot 28'),
(29, 0, 'Parking slot 29'),
(30, 1, 'Parking slot 30');

-- --------------------------------------------------------

--
-- Table structure for table `pre_orders`
--

CREATE TABLE `pre_orders` (
  `id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `status` varchar(20) DEFAULT 'pending',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `pre_orders`
--

INSERT INTO `pre_orders` (`id`, `item_id`, `name`, `email`, `phone`, `item_name`, `quantity`, `status`, `created_at`) VALUES
(6, 4, 'Customer_1', 'customer_1@gmail.com', '8583458934', 'Ceylon Tea', 2, 'confirmed', '2024-07-15 08:37:01'),
(7, 12, 'Customer_1', 'customer_1@gmail.com', '0786787667', 'Sweet and Sour Pork', 2, 'confirmed', '2024-07-15 08:37:16'),
(8, 3, 'Customer_1', 'customer_1@gmail.com', '6786787667', 'Kottu Roti', 1, 'canceled', '2024-07-27 19:48:26'),
(10, 4, 'Customer_1', 'customer_1@gmail.com', '0786787667', 'Ceylon Tea', 4, 'confirmed', '2024-07-28 08:01:18'),
(11, 10, 'Customer_1', 'customer_1@gmail.com', '0786787667', 'Kung Pao Chicken', 1, 'pending', '2024-07-28 08:02:04');

-- --------------------------------------------------------

--
-- Table structure for table `promotions`
--

CREATE TABLE `promotions` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `details` text NOT NULL,
  `date_time` varchar(255) NOT NULL,
  `ticket_price` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `promotions`
--

INSERT INTO `promotions` (`id`, `title`, `description`, `details`, `date_time`, `ticket_price`) VALUES
(1, 'Happy Hour Specials', 'Enjoy our Happy Hour specials every weekday from 4 PM to 7 PM with discounts on drinks and appetizers. Unwind after work with friends and colleagues in a relaxed atmosphere.', '50% off on selected cocktails and beers.\r\nDiscounted appetizers such as sliders, nachos, and wings.\r\nSpecial \"Buy One Get One Free\" offer on house wines.', 'Monday to Friday, 4 PM - 7 PM', 10.00),
(2, 'Weekend Brunch Specials', 'Gather your family and indulge in a hearty brunch buffet featuring an array of dishes from various cuisines. Children under 10 dine for free with every paying adult, making it a perfect weekend outing for the whole family.', 'Exclusive brunch menu featuring breakfast and lunch favorites.\r\nComplimentary drink (mimosa, fresh juice, or coffee).\r\nKid-friendly options available.\r\nFamily discount: 10% off for families of four or more.', 'Saturdays and Sundays, 10 AM - 3 PM', 10.00),
(3, 'Gourmet Dinner Experience', 'Join us for an exclusive Chef’s Table event where guests can enjoy a multi-course gourmet dinner curated and prepared by the head chef. This intimate dining experience allows guests to interact with the chef, learn about the ingredients, and understand the culinary techniques used in creating each dish.', 'Exclusive multi-course dinner featuring seasonal and locally sourced ingredients.\r\nExpert guidance from the head chef.\r\nWine pairing with each course.\r\nLive cooking demonstration.\r\nLimited seating to ensure a personalized experience.', 'Saturday, August 20th, 7 PM - 10 PM', 100.00);

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

CREATE TABLE `reservations` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `guests` int(11) NOT NULL,
  `message` text DEFAULT NULL,
  `status` enum('pending','confirmed','canceled') DEFAULT 'pending',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `reservations`
--

INSERT INTO `reservations` (`id`, `user_id`, `name`, `email`, `phone`, `date`, `time`, `guests`, `message`, `status`, `created_at`) VALUES
(3, NULL, 'Customer_1', 'customer_1@gmail.com', '0786787667', '2024-12-07', '14:15:00', 4, 'Need 4 person table', 'confirmed', '2024-07-15 07:21:46'),
(5, NULL, 'Customer_1', 'customer_1@gmail.com', '0786787667', '2024-02-04', '15:22:00', 8, 'Need a table for 8 person', 'canceled', '2024-07-28 07:40:58'),
(6, NULL, 'Customer_1', 'customer_1@gmail.com', '8583458934', '2024-02-12', '14:34:00', 4, 'Need a table for 4 persons', 'confirmed', '2024-07-28 08:07:34'),
(7, NULL, 'Customer_1', 'customer_1@gmail.com', '6786787667', '2024-02-12', '14:22:00', 2, 'Need a table for 2 persons', 'pending', '2024-07-28 08:07:54');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `review_text` text NOT NULL,
  `rating` int(11) NOT NULL CHECK (`rating` between 1 and 5),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `customer_name`, `review_text`, `rating`, `created_at`) VALUES
(26, 'Customer_3', 'Well prepared website and very easy to communicate with staff of hotel. Thank You!', 5, '2024-07-13 08:56:22'),
(27, 'Customer_1', 'Nice Service', 4, '2024-07-15 07:31:03');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `role_name` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role_name`, `created_at`) VALUES
(1, 'admin', '2024-06-28 05:22:33'),
(2, 'customer', '2024-06-28 05:22:33'),
(3, 'operational_staff', '2024-06-28 05:22:33');

-- --------------------------------------------------------

--
-- Table structure for table `tables`
--

CREATE TABLE `tables` (
  `id` int(11) NOT NULL,
  `category` varchar(255) NOT NULL,
  `capacity` int(11) NOT NULL,
  `available` tinyint(1) NOT NULL DEFAULT 1,
  `reserved` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tables`
--

INSERT INTO `tables` (`id`, `category`, `capacity`, `available`, `reserved`) VALUES
(1, '2 person', 2, 1, 0),
(2, '2 person', 2, 1, 0),
(3, '2 person', 2, 0, 1),
(4, '2 person', 2, 1, 0),
(5, '2 person', 2, 1, 0),
(6, '2 person', 2, 0, 1),
(7, '2 person', 2, 1, 0),
(8, '2 person', 2, 1, 0),
(9, '2 person', 2, 0, 1),
(10, '2 person', 2, 1, 0),
(11, '2 person', 2, 0, 1),
(12, '2 person', 2, 1, 0),
(13, '2 person', 2, 1, 0),
(14, '2 person', 2, 1, 0),
(15, '2 person', 2, 0, 1),
(16, '2 person', 2, 1, 0),
(17, '2 person', 2, 1, 0),
(18, '2 person', 2, 1, 0),
(19, '2 person', 2, 1, 0),
(20, '2 person', 2, 0, 1),
(21, '4 person', 4, 1, 0),
(22, '4 person', 4, 1, 0),
(23, '4 person', 4, 0, 1),
(24, '4 person', 4, 1, 0),
(25, '4 person', 4, 1, 0),
(26, '4 person', 4, 0, 1),
(27, '4 person', 4, 1, 0),
(28, '4 person', 4, 1, 0),
(29, '4 person', 4, 1, 0),
(30, '4 person', 4, 1, 0),
(31, '4 person', 4, 1, 0),
(32, '4 person', 4, 0, 1),
(33, '4 person', 4, 1, 0),
(34, '4 person', 4, 1, 0),
(35, '4 person', 4, 0, 1),
(36, '6 person', 6, 1, 0),
(37, '6 person', 6, 0, 1),
(38, '6 person', 6, 1, 0),
(39, '6 person', 6, 1, 0),
(40, '6 person', 6, 0, 1),
(41, '6 person', 6, 1, 0),
(42, '6 person', 6, 1, 0),
(43, '6 person', 6, 1, 0),
(44, '6 person', 6, 1, 0),
(45, '6 person', 6, 0, 1),
(46, '8 person', 8, 1, 0),
(47, '8 person', 8, 1, 0),
(48, '8 person', 8, 1, 0),
(49, '8 person', 8, 0, 1),
(50, '8 person', 8, 1, 0),
(70, '2 person', 2, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `role_id`, `created_at`) VALUES
(1, 'admin_1', 'admin_1@gmail.com', '$2y$10$XTgx/CFDoMxROEUNcRGnC.1GL3l.pnrYvlZaUBi4M4Skm2Qj5M7sq', 1, '2024-06-28 05:21:41'),
(2, 'staff_1', 'staff_1@gmail.com', '$2y$10$Y8fO2xMno/6wcrTB8fMCFeoUoQ.DLR2EvX5IbmkZptUs/.mreSQte', 3, '2024-06-28 05:21:41'),
(3, 'customer_1', 'customer_1@gmail.com', '$2y$10$frgJZRPo2LLvw.lt1JRHNeaHx6.NyhM3cJfVCSOV7pS7lXpMwIooC', 2, '2024-06-28 05:21:41'),
(4, 'customer_2', 'customer_2@gmail.com', '$2y$10$y/RZlKBLz8anyS/0fSUIUuLbtCN1NuNGm4zm0PRRfZC9rKBWS/K7u', 2, '2024-06-29 05:13:41'),
(5, 'staff_2', 'staff_2@gmail.com', '$2y$10$yDWzwZKRmSkt996uqmKDuOWsmTHSk3X8qjaJJhi.fLk.cloSl.MKi', 3, '2024-06-29 05:14:47'),
(6, 'admin_2', 'admin_2@gmail.com', '$2y$10$/Ag34gzCpJk6IdBNUwIgt.iIcW4xY8gNyhOGQX/LXk1ORhx5j24d.', 1, '2024-06-29 05:15:13'),
(7, 'customer_3', 'customer_3@gmail.com', '$2y$10$BHnPNfkHZej.eRD5Xs26Z.IQYtLz7yJTSCPwkkp4.N6oDHoeu0opa', 2, '2024-06-29 05:17:23'),
(8, 'staff_3', 'staff_3@gmail.com', '$2y$10$ZaeeRmfQ4hmhSKZA.erScuKqiKYvv6USnB6nnlAGeb2V1sdUmYa2e', 3, '2024-06-29 05:17:57'),
(9, 'customer_4', 'customer_4@gmail.com', '$2y$10$XvVWXpR.muL.ZWNQNPoNnuylKyxyqK/IPnVeBUDHuQOHrDHP1CCZK', 2, '2024-07-15 06:40:52'),
(10, 'staff_4', 'staff_4@gmail.com', '$2y$10$u/AAHltvV5TsXP1/CmoSuOIi6u9rgqpUzwayWUkXM/dZFuBYWf2Ii', 3, '2024-07-15 07:55:50');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contact_messages`
--
ALTER TABLE `contact_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `parking`
--
ALTER TABLE `parking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pre_orders`
--
ALTER TABLE `pre_orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `promotions`
--
ALTER TABLE `promotions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tables`
--
ALTER TABLE `tables`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_id` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contact_messages`
--
ALTER TABLE `contact_messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `parking`
--
ALTER TABLE `parking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `pre_orders`
--
ALTER TABLE `pre_orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `promotions`
--
ALTER TABLE `promotions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tables`
--
ALTER TABLE `tables`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `reservations`
--
ALTER TABLE `reservations`
  ADD CONSTRAINT `reservations_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
