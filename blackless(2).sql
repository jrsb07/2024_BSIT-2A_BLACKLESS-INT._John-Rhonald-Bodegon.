-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 29, 2024 at 04:47 PM
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
-- Database: `blackless(2)`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_replies`
--

CREATE TABLE `admin_replies` (
  `reply_id` int(11) NOT NULL,
  `message_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `reply_text` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_replies`
--

INSERT INTO `admin_replies` (`reply_id`, `message_id`, `user_id`, `admin_id`, `reply_text`, `timestamp`) VALUES
(5, 3, 4, 3, 'Test', '2024-05-24 08:30:10'),
(9, 6, 15, 3, 'jkhaskjdhaskjd', '2024-05-29 08:23:55');

-- --------------------------------------------------------

--
-- Table structure for table `feedbacks`
--

CREATE TABLE `feedbacks` (
  `user_id` int(11) NOT NULL,
  `feedback_id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `rating` int(11) NOT NULL,
  `feedback_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedbacks`
--

INSERT INTO `feedbacks` (`user_id`, `feedback_id`, `comment`, `rating`, `feedback_date`) VALUES
(16, 16, 'ryernyy', 2, '2024-05-29 02:51:17'),
(16, 17, 'yrt4tyutru', 5, '2024-05-29 03:21:49'),
(4, 19, 'sdasadasdasdasdasdasdasdasdasdas', 1, '2024-05-29 07:21:37'),
(15, 21, 'nice accomodation', 5, '2024-05-29 09:22:26');

-- --------------------------------------------------------

--
-- Table structure for table `ingredients`
--

CREATE TABLE `ingredients` (
  `ing_id` int(11) NOT NULL,
  `ing_name` text NOT NULL,
  `ing_pricing` decimal(11,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ingredients`
--

INSERT INTO `ingredients` (`ing_id`, `ing_name`, `ing_pricing`) VALUES
(1, '1 shot espresso', 50.00),
(2, '2 shot espresso', 70.00),
(3, '1 shot sugar syrup', 20.00),
(4, '2 shot sugar syrup', 30.00),
(5, 'Milk', 30.00),
(6, 'Caramel drizzle', 30.00),
(7, '2 pumps caramel syrup', 30.00),
(8, '3 pumps caramel syrup ', 40.00),
(9, 'Chocolate drizzle', 30.00),
(10, '1 tsp cocoa', 20.00),
(11, '2 tsp cocoa', 30.00),
(12, '3 tsp cocoa', 40.00),
(13, '1 shot condensed milk', 30.00),
(14, '1.5 shot condensed milk', 40.00),
(15, '2 pumps toffee syrup', 30.00),
(16, '3 pumps toffee syrup', 40.00);

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `item_id` int(11) NOT NULL,
  `item_name` varchar(55) NOT NULL,
  `image_path` varchar(55) NOT NULL,
  `price` decimal(11,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`item_id`, `item_name`, `image_path`, `price`) VALUES
(1, 'Americano', 'coffee/product1.jpg', 80.00),
(2, 'Cafe latte', 'coffee/product2.jpg', 110.00),
(4, 'Caramel Macchiato', 'coffee/product3.jpg', 140.00),
(5, 'Peppermint Mocha', 'coffee/product4.jpg', 170.00),
(6, 'Spanish Latte', 'coffee/product5.jpg', 130.00),
(7, 'Mocha', 'coffee/product6.jpg', 130.00),
(8, 'Toffee Nut', 'coffee/product7.jpg', 160.00),
(17, 'Cappuccino ', 'coffee/product8.jpg', 110.00),
(18, 'Cocoa Coffee', 'coffee/product9.jpg', 130.00);

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `user_id` int(11) NOT NULL,
  `fullname` varchar(55) NOT NULL,
  `message_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `date_sent` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` enum('open','closed') DEFAULT 'open'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`user_id`, `fullname`, `message_id`, `message`, `date_sent`, `status`) VALUES
(4, 'Joan Salditos', 3, 'Test', '2024-05-24 08:30:10', 'closed'),
(15, 'Grace R. Bicaldo', 6, 'gAFwtfyTWQFSHGVS', '2024-05-29 08:23:55', 'closed'),
(4, 'Joan Salditos', 8, 'test', '2024-05-29 02:57:19', 'open'),
(4, 'Joan Salditos', 9, 'dsadsadasd', '2024-05-29 03:06:23', 'open'),
(4, 'Joan Salditos', 10, 'dsadasdasd', '2024-05-29 03:06:52', 'open'),
(16, 'John Rhonald Bodegon', 11, 'etryghr', '2024-05-29 03:16:26', 'open'),
(16, 'John Rhonald Bodegon', 12, '46h544', '2024-05-29 03:17:10', 'open'),
(16, 'John Rhonald Bodegon', 13, 'uikyu', '2024-05-29 03:17:18', 'open'),
(16, 'John Rhonald Bodegon', 14, 'eyrehyr', '2024-05-29 03:17:30', 'open'),
(16, 'John Rhonald Bodegon', 15, 'ryjrjr', '2024-05-29 03:17:45', 'open'),
(16, 'John Rhonald Bodegon', 16, 'ryjuetry', '2024-05-29 03:17:51', 'open'),
(16, 'John Rhonald Bodegon', 17, 'ryjuetry', '2024-05-29 03:19:20', 'open'),
(16, 'John Rhonald Bodegon', 18, 'ryjuetryg', '2024-05-29 03:19:37', 'open'),
(4, 'Joan Salditos', 19, 'sdaasdasd', '2024-05-29 03:20:48', 'open'),
(4, 'Joan Salditos', 20, 'fhrtrut', '2024-05-29 03:21:15', 'open'),
(4, 'Joan Salditos', 21, 'you can chat the seller', '2024-05-29 08:17:07', 'open'),
(15, 'Grace R. Bicaldo', 22, 'the coffee is good and very nice', '2024-05-29 09:20:04', 'open');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `item_qty` int(11) NOT NULL,
  `add_ons_desc` text NOT NULL,
  `time_ordered` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `order_status` varchar(55) NOT NULL DEFAULT 'Order Placed',
  `price` varchar(55) NOT NULL DEFAULT '--'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `item_id`, `user_id`, `item_qty`, `add_ons_desc`, `time_ordered`, `order_status`, `price`) VALUES
(17, 1, 11, 1, '', '2024-05-19 15:28:44', 'Ready to be pickup', '200,00'),
(18, 1, 12, 2, 'sugar syrup', '2024-05-29 03:56:52', 'done', '100.00'),
(19, 1, 13, 2, 'sugar syrup', '2024-05-29 05:12:26', 'done', '100.00'),
(31, 2, 4, 2, 'Add sugar syrup', '2024-05-19 16:47:48', 'Order Received', '220.00'),
(32, 2, 4, 1, '', '2024-05-21 02:48:54', 'Order Received', '110.00'),
(35, 5, 16, 1, '', '2024-05-29 03:58:31', 'done', '170.00'),
(38, 1, 21, 1, 'milk', '2024-05-29 09:06:16', 'Order Placed', '--'),
(39, 1, 15, 1, 'milk', '2024-05-29 09:16:58', 'Order Placed', '--');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(55) NOT NULL,
  `fullname` varchar(55) NOT NULL,
  `email` varchar(55) NOT NULL,
  `phone_number` varchar(55) NOT NULL,
  `password` varchar(55) NOT NULL,
  `usertype` char(1) NOT NULL DEFAULT 'C'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `fullname`, `email`, `phone_number`, `password`, `usertype`) VALUES
(3, 'Arjay30', 'Arjay Ocfemia', 'Ocfemiaarjay30@gmail.com', '09533303725', 'Arjay123', 'A'),
(4, 'Joan04', 'Joan Salditos', 'salditosjoan10@gmail.com', '09670627686', 'Joan123', 'C'),
(10, 'sample12', 'sample', 'sample@gmail.com', '09523423423', 'Arjay123', 'C'),
(11, 'shesh', 'John Ray Alcantara', 'johnray13@gmail.com', '09637260070', 'qwerty11', 'C'),
(12, 'abilafrank', 'Frank Lorence Abila', 'abilafrank@gmail.com', '09976355822', 'abilafrank04', 'C'),
(13, 'frank', 'frank lorence', 'abila@gmail.com', '09876543221', 'frank', 'C'),
(14, 'Sample1', 'Sample', 'sample1@gmail.com', '095521123121', '123', 'C'),
(15, 'gracebicaldo', 'Grace R. Bicaldo', 'gracebicaldo@gmail.com', '09523423423', 'GRACE123', 'C'),
(16, 'john777', 'John Rhonald Bodegon', 'johnrhoanld777@gmail.com', '09999999999', '1234567', 'C'),
(17, 'example_lang', 'Example', 'example@gmail.com', '09523423423', 'example', 'C'),
(18, 'abilafrank', 'Frank Lorence Abila', 'abilafrank@gmail.com', '09976355822', 'abilafrank04', 'C'),
(19, 'Arjay300', 'Arjay Ocfemia', 'Ocfemiaarjay30@gmail.com', '09533303725', 'Arjay123', 'C'),
(20, 'grace19', 'Grace R. Bicaldo', 'gracebicaldo@gmail.com', '09936114278', 'grace123', 'C'),
(21, 'sample121', 'sample', 'Arjay30@gmail.com', '09523423423', '123', 'C');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_replies`
--
ALTER TABLE `admin_replies`
  ADD PRIMARY KEY (`reply_id`),
  ADD KEY `message_id` (`message_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `admin_id` (`admin_id`);

--
-- Indexes for table `feedbacks`
--
ALTER TABLE `feedbacks`
  ADD PRIMARY KEY (`feedback_id`);

--
-- Indexes for table `ingredients`
--
ALTER TABLE `ingredients`
  ADD PRIMARY KEY (`ing_id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`message_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_replies`
--
ALTER TABLE `admin_replies`
  MODIFY `reply_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `feedbacks`
--
ALTER TABLE `feedbacks`
  MODIFY `feedback_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `ingredients`
--
ALTER TABLE `ingredients`
  MODIFY `ing_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `message_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin_replies`
--
ALTER TABLE `admin_replies`
  ADD CONSTRAINT `admin_replies_ibfk_1` FOREIGN KEY (`message_id`) REFERENCES `messages` (`message_id`),
  ADD CONSTRAINT `admin_replies_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `admin_replies_ibfk_3` FOREIGN KEY (`admin_id`) REFERENCES `users` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
