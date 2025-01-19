-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 19, 2025 at 12:43 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `appordering`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `a_id` int(1) NOT NULL,
  `a_user` varchar(255) NOT NULL,
  `a_pass` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`a_id`, `a_user`, `a_pass`) VALUES
(1, 'admin1', '123');

-- --------------------------------------------------------

--
-- Table structure for table `food`
--

CREATE TABLE `food` (
  `f_id` int(11) NOT NULL,
  `f_name` text NOT NULL,
  `f_price` decimal(10,2) NOT NULL,
  `f_detail` varchar(200) NOT NULL,
  `f_status` varchar(3) NOT NULL,
  `ft_id` int(11) NOT NULL,
  `pic` longblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `food`
--

INSERT INTO `food` (`f_id`, `f_name`, `f_price`, `f_detail`, `f_status`, `ft_id`, `pic`) VALUES
(1, 'Strawberry Frappe', '60.00', 'สตรอเบอร์รี่ปั่น รสหวาน สตรอเบอร์รี่นำเข้า', '3', 1, 0x737472617762657272792d6672617070652e706e67),
(3, 'Vanilla Ice cream', '15.00', '1 สคูป', '1', 3, 0x7669632e77656270),
(4, 'Coconut Frappe', '55.00', 'dark coco', '1', 1, 0x636f636f6e75742e77656270),
(5, 'GreenTea Cake', '70.00', 'ชาเขียวมัจฉะแท้', '1', 4, 0x6774632e6a7067),
(6, 'Orange Cake', '55.00', 'เค้กส้ม', '1', 4, 0x6f7267632e77656270),
(7, 'Coca-Cola', '12.00', 'Coke', '1', 5, 0x636f6361636f6c612e6a7067),
(8, 'สตรอเบอร์รี่ปั่น', '55.00', 'สตรอเบอร์รี่ปั่น รสหวาน สตรอเบอร์รี่นำเข้า', '1', 1, 0x737472772e6a7067),
(9, 'chocolate', '2.00', '90% ', '1', 8, 0x43686f636b2e6a7067),
(10, 'waffle', '15.00', '1 ชิ้น', '1', 4, 0x776166666c652e6a7067);

-- --------------------------------------------------------

--
-- Table structure for table `food_type`
--

CREATE TABLE `food_type` (
  `ft_id` int(11) NOT NULL,
  `ft_name` text NOT NULL,
  `ft_status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `food_type`
--

INSERT INTO `food_type` (`ft_id`, `ft_name`, `ft_status`) VALUES
(1, 'Frappe', 'Y'),
(2, 'asd', 'N'),
(3, 'Ice-Cream', 'Y'),
(4, 'Cake', 'Y'),
(5, 'Coca cola', 'Y'),
(6, 'a', 'N'),
(7, 'asd', 'N'),
(8, 'Snack', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `o_id` int(11) NOT NULL,
  `o_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `t_id` int(4) NOT NULL,
  `pic_payment` blob,
  `o_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`o_id`, `o_date`, `t_id`, `pic_payment`, `o_status`) VALUES
(1, '2024-02-02 05:17:53', 10, 0x494d475f393239372e6a706567, 1),
(3, '2024-02-02 05:34:52', 3, 0x696d6167652e6a7067, 1),
(4, '2024-02-02 06:17:15', 5, 0x6d656d652e6a7067, 1),
(5, '2024-02-15 08:09:37', 1, 0x53637265656e73686f7420323032332d30382d3134203233313831332e706e67, 2);

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `item_id` int(11) NOT NULL,
  `o_id` int(11) DEFAULT NULL,
  `f_id` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`item_id`, `o_id`, `f_id`, `quantity`) VALUES
(1, 1, 3, 1),
(2, 1, 6, 1),
(3, 1, 10, 1),
(5, 3, 7, 9),
(6, 3, 5, 5),
(8, 4, 8, 1),
(9, 5, 3, 1),
(10, 4, 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `receipt`
--

CREATE TABLE `receipt` (
  `re_id` int(11) NOT NULL,
  `re_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `o_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `receipt`
--

INSERT INTO `receipt` (`re_id`, `re_date`, `o_id`) VALUES
(1, '2024-02-02 05:18:23', 1),
(2, '2024-02-02 05:36:42', 3),
(3, '2024-02-15 08:16:16', 5),
(4, '2025-01-19 11:41:33', 4);

-- --------------------------------------------------------

--
-- Table structure for table `tables`
--

CREATE TABLE `tables` (
  `t_id` int(11) NOT NULL,
  `t_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `tables`
--

INSERT INTO `tables` (`t_id`, `t_name`) VALUES
(1, '1'),
(2, '2'),
(3, '3'),
(4, '4'),
(5, '5'),
(6, '6'),
(7, '7'),
(8, '8'),
(9, '9'),
(10, '10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`a_id`);

--
-- Indexes for table `food`
--
ALTER TABLE `food`
  ADD PRIMARY KEY (`f_id`),
  ADD KEY `ft_id` (`ft_id`);

--
-- Indexes for table `food_type`
--
ALTER TABLE `food_type`
  ADD PRIMARY KEY (`ft_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`o_id`),
  ADD KEY `t_id` (`t_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`item_id`),
  ADD KEY `o_id` (`o_id`),
  ADD KEY `f_id` (`f_id`);

--
-- Indexes for table `receipt`
--
ALTER TABLE `receipt`
  ADD PRIMARY KEY (`re_id`),
  ADD KEY `o_id` (`o_id`);

--
-- Indexes for table `tables`
--
ALTER TABLE `tables`
  ADD PRIMARY KEY (`t_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `a_id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `food`
--
ALTER TABLE `food`
  MODIFY `f_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `food_type`
--
ALTER TABLE `food_type`
  MODIFY `ft_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `o_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `receipt`
--
ALTER TABLE `receipt`
  MODIFY `re_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tables`
--
ALTER TABLE `tables`
  MODIFY `t_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `food`
--
ALTER TABLE `food`
  ADD CONSTRAINT `ft_id` FOREIGN KEY (`ft_id`) REFERENCES `food_type` (`ft_id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `t_id` FOREIGN KEY (`t_id`) REFERENCES `tables` (`t_id`);

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `f_id` FOREIGN KEY (`f_id`) REFERENCES `food` (`f_id`),
  ADD CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`o_id`) REFERENCES `orders` (`o_id`);

--
-- Constraints for table `receipt`
--
ALTER TABLE `receipt`
  ADD CONSTRAINT `o_id` FOREIGN KEY (`o_id`) REFERENCES `orders` (`o_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
