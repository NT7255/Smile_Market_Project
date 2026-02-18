-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 18, 2026 at 01:58 PM
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
-- Database: `db_smilemarket`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_address`
--

CREATE TABLE `tb_address` (
  `address_id` int(11) NOT NULL,
  `member_id` varchar(20) DEFAULT NULL,
  `member_name` varchar(100) DEFAULT NULL,
  `member_tel` varchar(10) DEFAULT NULL,
  `member_address` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_category`
--

CREATE TABLE `tb_category` (
  `cat_id` varchar(20) NOT NULL,
  `cat_name` varchar(50) DEFAULT NULL,
  `cat_images` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_member`
--

CREATE TABLE `tb_member` (
  `member_id` varchar(20) NOT NULL,
  `member_email` varchar(50) NOT NULL,
  `member_password` varchar(20) DEFAULT NULL,
  `member_tel` varchar(10) DEFAULT NULL,
  `member_name` varchar(50) NOT NULL,
  `member_lastname` varchar(50) NOT NULL,
  `member_address` varchar(200) DEFAULT NULL,
  `member_sex` int(2) DEFAULT NULL,
  `member_birthday` date DEFAULT NULL,
  `member_image` varchar(50) DEFAULT NULL,
  `member_permis` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tb_member`
--

INSERT INTO `tb_member` (`member_id`, `member_email`, `member_password`, `member_tel`, `member_name`, `member_lastname`, `member_address`, `member_sex`, `member_birthday`, `member_image`, `member_permis`) VALUES
('MB00001', 'nattapon.nt7255@gmail.com', '$2y$10$sL1Ywgd.sZf0n', NULL, '', '', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_order`
--

CREATE TABLE `tb_order` (
  `order_id` varchar(20) NOT NULL,
  `member_id` varchar(20) DEFAULT NULL,
  `member_name` varchar(100) DEFAULT NULL,
  `member_tel` varchar(10) DEFAULT NULL,
  `member_address` varchar(500) DEFAULT NULL,
  `ts_id` varchar(20) DEFAULT NULL,
  `order_date` date DEFAULT NULL,
  `order_paymen` varchar(20) DEFAULT NULL,
  `order_numberts` varchar(50) DEFAULT NULL,
  `order_slip_image` varchar(100) DEFAULT NULL,
  `order_status` varchar(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_orderdetail`
--

CREATE TABLE `tb_orderdetail` (
  `order_id` varchar(20) NOT NULL,
  `member_id` varchar(20) NOT NULL,
  `pro_id` varchar(20) NOT NULL,
  `quantity` int(11) DEFAULT NULL,
  `price` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_product`
--

CREATE TABLE `tb_product` (
  `pro_id` varchar(20) NOT NULL,
  `pro_name` varchar(50) DEFAULT NULL,
  `pro_price` double DEFAULT NULL,
  `pro_info` varchar(500) DEFAULT NULL,
  `pro_image` varchar(50) DEFAULT NULL,
  `cat_show` int(11) DEFAULT NULL,
  `pro_unit` varchar(10) DEFAULT NULL,
  `pro_subinfo` varchar(100) DEFAULT NULL,
  `pro_exdate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_shopcart`
--

CREATE TABLE `tb_shopcart` (
  `cart_id` int(11) NOT NULL,
  `member_id` varchar(20) DEFAULT NULL,
  `pro_id` varchar(20) DEFAULT NULL,
  `pro_size` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_stock`
--

CREATE TABLE `tb_stock` (
  `pro_id` varchar(20) NOT NULL,
  `pro_size` varchar(5) DEFAULT NULL,
  `pro_stock` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_tag`
--

CREATE TABLE `tb_tag` (
  `pro_id` varchar(20) NOT NULL,
  `cat_id` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_transport`
--

CREATE TABLE `tb_transport` (
  `ts_id` varchar(20) NOT NULL,
  `ts_name` varchar(50) DEFAULT NULL,
  `ts_price` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_users`
--

CREATE TABLE `tb_users` (
  `user_id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_address`
--
ALTER TABLE `tb_address`
  ADD PRIMARY KEY (`address_id`),
  ADD KEY `member_id` (`member_id`);

--
-- Indexes for table `tb_category`
--
ALTER TABLE `tb_category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `tb_member`
--
ALTER TABLE `tb_member`
  ADD PRIMARY KEY (`member_id`);

--
-- Indexes for table `tb_order`
--
ALTER TABLE `tb_order`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `member_id` (`member_id`),
  ADD KEY `ts_id` (`ts_id`);

--
-- Indexes for table `tb_orderdetail`
--
ALTER TABLE `tb_orderdetail`
  ADD PRIMARY KEY (`order_id`,`member_id`,`pro_id`),
  ADD KEY `member_id` (`member_id`),
  ADD KEY `pro_id` (`pro_id`);

--
-- Indexes for table `tb_product`
--
ALTER TABLE `tb_product`
  ADD PRIMARY KEY (`pro_id`);

--
-- Indexes for table `tb_shopcart`
--
ALTER TABLE `tb_shopcart`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `member_id` (`member_id`),
  ADD KEY `pro_id` (`pro_id`);

--
-- Indexes for table `tb_stock`
--
ALTER TABLE `tb_stock`
  ADD PRIMARY KEY (`pro_id`);

--
-- Indexes for table `tb_tag`
--
ALTER TABLE `tb_tag`
  ADD PRIMARY KEY (`pro_id`,`cat_id`),
  ADD KEY `cat_id` (`cat_id`);

--
-- Indexes for table `tb_transport`
--
ALTER TABLE `tb_transport`
  ADD PRIMARY KEY (`ts_id`);

--
-- Indexes for table `tb_users`
--
ALTER TABLE `tb_users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_users`
--
ALTER TABLE `tb_users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_address`
--
ALTER TABLE `tb_address`
  ADD CONSTRAINT `tb_address_ibfk_1` FOREIGN KEY (`member_id`) REFERENCES `tb_member` (`member_id`);

--
-- Constraints for table `tb_order`
--
ALTER TABLE `tb_order`
  ADD CONSTRAINT `tb_order_ibfk_1` FOREIGN KEY (`member_id`) REFERENCES `tb_member` (`member_id`),
  ADD CONSTRAINT `tb_order_ibfk_2` FOREIGN KEY (`ts_id`) REFERENCES `tb_transport` (`ts_id`);

--
-- Constraints for table `tb_orderdetail`
--
ALTER TABLE `tb_orderdetail`
  ADD CONSTRAINT `tb_orderdetail_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `tb_order` (`order_id`),
  ADD CONSTRAINT `tb_orderdetail_ibfk_2` FOREIGN KEY (`member_id`) REFERENCES `tb_member` (`member_id`),
  ADD CONSTRAINT `tb_orderdetail_ibfk_3` FOREIGN KEY (`pro_id`) REFERENCES `tb_product` (`pro_id`);

--
-- Constraints for table `tb_shopcart`
--
ALTER TABLE `tb_shopcart`
  ADD CONSTRAINT `tb_shopcart_ibfk_1` FOREIGN KEY (`member_id`) REFERENCES `tb_member` (`member_id`),
  ADD CONSTRAINT `tb_shopcart_ibfk_2` FOREIGN KEY (`pro_id`) REFERENCES `tb_product` (`pro_id`);

--
-- Constraints for table `tb_stock`
--
ALTER TABLE `tb_stock`
  ADD CONSTRAINT `tb_stock_ibfk_1` FOREIGN KEY (`pro_id`) REFERENCES `tb_product` (`pro_id`);

--
-- Constraints for table `tb_tag`
--
ALTER TABLE `tb_tag`
  ADD CONSTRAINT `tb_tag_ibfk_1` FOREIGN KEY (`pro_id`) REFERENCES `tb_product` (`pro_id`),
  ADD CONSTRAINT `tb_tag_ibfk_2` FOREIGN KEY (`cat_id`) REFERENCES `tb_category` (`cat_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
