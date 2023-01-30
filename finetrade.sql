-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 30, 2023 at 04:07 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `finetrade`
--

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `seller_name` varchar(200) NOT NULL,
  `product_name` varchar(200) NOT NULL,
  `product_amount` varchar(200) NOT NULL,
  `product_description` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `id` varchar(200) NOT NULL,
  `create_date` datetime NOT NULL DEFAULT current_timestamp(),
  `link` varchar(200) NOT NULL,
  `stock` varchar(200) NOT NULL,
  `number` varchar(200) NOT NULL,
  `sell_buy_date` varchar(200) NOT NULL,
  `statues` varchar(200) NOT NULL DEFAULT 'active',
  `sales` int(200) NOT NULL DEFAULT 0,
  `total_money_generated` int(200) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`seller_name`, `product_name`, `product_amount`, `product_description`, `email`, `id`, `create_date`, `link`, `stock`, `number`, `sell_buy_date`, `statues`, `sales`, `total_money_generated`) VALUES
('alex', 'Test product', '15', 'The description of the product', 'ashelembe96@gmail.com2', '22436', '2023-01-29 14:35:56', 'buy.php?product_id=22436', '', '', '', 'active', 0, 0),
('alex', 'Test Product 2', '28', 'Testing product 2', 'ashelembe96@gmail.com2', '58188', '2023-01-29 17:04:01', 'buy.php?product_id=58188', '', '', '', 'active', 0, 0),
('Alec', 'Test product', '15', 'Tester', 'ashelembe96@gmail.com3', '77016', '2023-01-30 16:37:25', 'buy.php?product_id=77016', '', '', '', 'active', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `sender_email` varchar(200) NOT NULL,
  `receiver_email` varchar(200) NOT NULL,
  `amount` float NOT NULL,
  `sender_email_old_amount` float NOT NULL,
  `receiver_email_old_amount` float NOT NULL,
  `sender_email_new_amount` float NOT NULL,
  `receiver_email_new_amount` float NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `sender_description` varchar(200) NOT NULL,
  `id` varchar(200) NOT NULL,
  `ip_address` varchar(200) NOT NULL,
  `main_account` float NOT NULL,
  `statues` varchar(200) NOT NULL,
  `type` varchar(200) NOT NULL DEFAULT 'purchase'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`sender_email`, `receiver_email`, `amount`, `sender_email_old_amount`, `receiver_email_old_amount`, `sender_email_new_amount`, `receiver_email_new_amount`, `date`, `sender_description`, `id`, `ip_address`, `main_account`, `statues`, `type`) VALUES
('ashelembe96@gmail.com2', 'ashelembe96@gmail.com3', 15, 67, 29, 51, 44, '2023-01-30 11:40:29', 'Test', '29836', '172.20.10.1', 5, 'success', 'SendMoney'),
('ashelembe96@gmail.com2', 'ashelembe96@gmail.com3', 15, 78, 9, 62, 24, '2023-01-30 14:21:20', 'test send', '30400', '::1', 14, 'success', 'SendMoney'),
('ashelembe96@gmail.com2', 'ashelembe96@gmail.com3', 15, 35, 59, 19, 74, '2023-01-30 11:40:33', 'Test', '31115', '172.20.10.1', 7, 'success', 'SendMoney'),
('ashelembe96@gmail.com3', 'ashelembe96@gmail.com2', 15, 9, 78, 0, 0, '2023-01-30 12:01:50', 'Purchase product from Name:Alec for product:Test product with id:22436', '43293', '::1', 13, 'fail', 'purchase'),
('ashelembe96@gmail.com3', 'ashelembe96@gmail.com2', 15, 9, 78, 0, 0, '2023-01-30 11:42:48', 'Teset', '43444', '172.20.10.1', 13, 'fail', 'SendMoney'),
('ashelembe96@gmail.com3', 'ashelembe96@gmail.com2', 15, 57, 33, 41, 48, '2023-01-30 11:42:44', 'Teset', '44119', '172.20.10.1', 11, 'success', 'SendMoney'),
('ashelembe96@gmail.com2', 'ashelembe96@gmail.com2', 15, 62, 62, 0, 0, '2023-01-30 14:36:33', 'Purchase product from Name:alex for product:Test product with id:22436', '46927', '::1', 14, 'fail', 'purchase'),
('ashelembe96@gmail.com2', 'ashelembe96@gmail.com3', 15, 51, 44, 35, 59, '2023-01-30 11:40:32', 'Test', '48297', '172.20.10.1', 6, 'success', 'SendMoney'),
('ashelembe96@gmail.com2', 'ashelembe96@gmail.com3', 15, 62, 24, 46, 39, '2023-01-30 16:38:05', 'Purchase product from Name:alex for product:Test product with id:77016', '51422', '::1', 15, 'success', 'purchase'),
('ashelembe96@gmail.com2', 'ashelembe96@gmail.com3', 15, 46, 39, 30, 54, '2023-01-30 16:38:29', 'Purchase product from Name:alex for product:Test product with id:77016', '57624', '::1', 16, 'success', 'purchase'),
('ashelembe96@gmail.com2', 'ashelembe96@gmail.com3', 15, 19, 74, 3, 89, '2023-01-30 11:40:35', 'Test', '58589', '172.20.10.1', 8, 'success', 'SendMoney'),
('ashelembe96@gmail.com2', 'ashelembe96@gmail.com2', 15, 78, 78, 0, 0, '2023-01-30 14:21:15', 'test send', '62140', '::1', 13, 'fail', 'SendMoney'),
('ashelembe96@gmail.com2', 'ashelembe96@gmail.com3', 15, 30, 54, 14, 69, '2023-01-30 16:41:19', 'Purchase product:Test product with id:77016', '70178', '::1', 17, 'success', 'purchase'),
('ashelembe96@gmail.com3', 'ashelembe96@gmail.com2', 15, 25, 63, 9, 78, '2023-01-30 11:42:46', 'Teset', '78683', '172.20.10.1', 13, 'success', 'SendMoney'),
('ashelembe96@gmail.com3', 'ashelembe96@gmail.com2', 15, 89, 3, 73, 18, '2023-01-30 11:42:41', 'Teset', '82942', '172.20.10.1', 9, 'success', 'SendMoney'),
('ashelembe96@gmail.com3', 'ashelembe96@gmail.com2', 15, 73, 18, 57, 33, '2023-01-30 11:42:43', 'Teset', '84611', '172.20.10.1', 10, 'success', 'SendMoney'),
('ashelembe96@gmail.com2', 'ashelembe96@gmail.com3', 15, 3, 89, 0, 0, '2023-01-30 11:40:38', 'Test', '91591', '172.20.10.1', 8, 'fail', 'SendMoney'),
('ashelembe96@gmail.com2', 'ashelembe96@gmail.com2', 15, 62, 62, 0, 0, '2023-01-30 14:27:22', 'Purchase product from Name:alex for product:Test product with id:22436', '94609', '::1', 14, 'fail', 'purchase'),
('ashelembe96@gmail.com3', 'ashelembe96@gmail.com2', 15, 41, 48, 25, 63, '2023-01-30 11:42:45', 'Teset', '96668', '172.20.10.1', 12, 'success', 'SendMoney');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `name` varchar(200) NOT NULL,
  `lastname` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `gender` varchar(200) NOT NULL,
  `verified` varchar(200) NOT NULL,
  `verify_code` varchar(200) NOT NULL,
  `last_login` varchar(200) NOT NULL,
  `number` varchar(200) NOT NULL,
  `account_message` varchar(200) NOT NULL DEFAULT 'None',
  `account_statues` varchar(200) NOT NULL,
  `account_date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `ip_address` varchar(200) NOT NULL,
  `id` varchar(200) NOT NULL,
  `total` float NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`name`, `lastname`, `email`, `password`, `gender`, `verified`, `verify_code`, `last_login`, `number`, `account_message`, `account_statues`, `account_date_created`, `ip_address`, `id`, `total`) VALUES
('Admin', 'account', 'ashelembe96@gmail.com', '$2y$10$cQmAr0Vb.ssrrNYMycGOF.xqWVHvSD2RNAY1VJtbIyQY/e2jfobrG', '', 'no', '3882', 'Date 2023-01-30 @ 10:33:30 am', '', 'None', 'active', '2023-01-28 20:44:22', '172.20.10.1', '10996', 17),
('alex', 'she', 'ashelembe96@gmail.com2', '$2y$10$I7Rki2khGRT3lQ.tSsVT2.vqQM3byRUqc4sif0CsLjkzJaTNu9cCq', '', 'no', '9863', 'Date 2023-01-30 @ 03:36:48 pm', '', 'None', 'active', '2023-01-28 20:46:03', '::1', '33076', 14),
('Alec', 'She', 'ashelembe96@gmail.com3', '$2y$10$QwGrIIRSMSLTmdyfHGclM.mud4ZCFjyY03i8bTAQbaSG.9gq2AKeK', '', 'no', '4817', 'Date 2023-01-30 @ 03:35:50 pm', '', 'None', 'active', '2023-01-28 21:01:27', '172.20.10.1', '89914', 69);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
