-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 09, 2021 at 05:21 PM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `raw`
--

-- --------------------------------------------------------

--
-- Table structure for table `bill_item`
--

DROP TABLE IF EXISTS `bill_item`;
CREATE TABLE IF NOT EXISTS `bill_item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) DEFAULT NULL,
  `bill_id` int(255) DEFAULT NULL,
  `item_id` int(11) DEFAULT NULL,
  `fruit` varchar(255) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bill_item`
--

INSERT INTO `bill_item` (`id`, `uid`, `bill_id`, `item_id`, `fruit`, `price`, `quantity`, `total`) VALUES
(1, 3, 1614027847, 1, 'mango', 100, 2, 200),
(2, 3, 1614027847, 2, 'apple', 120, 2, 240),
(3, 3, 1614027847, 3, 'banana', 110, 1, 110),
(4, 3, 1614027847, 7, 'pineapple', 130, 2, 260),
(5, 3, 1614260929, 1, 'mango', 100, 1, 100),
(6, 3, 1614260929, 2, 'apple', 120, 1, 120),
(7, 3, 1614260929, 6, 'orange', 110, 1, 110),
(8, 3, 1614260929, 8, 'avocado', 150, 1, 150),
(9, 3, 1614536057, 1, 'mango', 100, 5, 500),
(10, 3, 1614536057, 2, 'apple', 120, 3, 360),
(11, 3, 1614536057, 5, 'plum', 150, 2, 300),
(12, 4, 1614594251, 1, 'mango', 100, 2, 200),
(13, 4, 1614594251, 2, 'apple', 120, 2, 240),
(14, 4, 1614594251, 7, 'pineapple', 130, 1, 130),
(15, 3, 1614767779, 1, 'mango', 100, 3, 300),
(16, 3, 1614767779, 3, 'banana', 110, 3, 330),
(17, 3, 1614767779, 5, 'plum', 150, 2, 300),
(18, 4, 1614792096, 9, 'mi note 4', 999, 3, 2997),
(19, 4, 1614792096, 10, 'sony vaio', 500, 1, 500),
(20, 4, 1614792096, 11, 'sony led', 600, 2, 1200);

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

DROP TABLE IF EXISTS `item`;
CREATE TABLE IF NOT EXISTS `item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `created_date` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`id`, `name`, `price`, `created_date`) VALUES
(1, 'mango', 100, NULL),
(2, 'apple', 120, NULL),
(3, 'banana', 110, NULL),
(4, 'cherry', 140, NULL),
(5, 'plum', 150, NULL),
(6, 'orange', 110, NULL),
(7, 'pineapple', 130, NULL),
(8, 'avocado', 150, NULL),
(9, 'mi note 4', 999, NULL),
(10, 'sony vaio', 500, NULL),
(11, 'sony led', 600, NULL),
(16, 'voltas ac', 25999, NULL),
(17, 'mi note 5 pro', 15000, NULL),
(18, 'guava', 111, NULL),
(19, 'papaya', 125, NULL),
(20, 'cheeku', 123, NULL),
(21, 'apple watch', 5000, NULL),
(22, 'litchi', 100, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

DROP TABLE IF EXISTS `sales`;
CREATE TABLE IF NOT EXISTS `sales` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `build_date` date NOT NULL,
  `customer_name` varchar(100) CHARACTER SET utf8mb4 NOT NULL,
  `contact` int(255) NOT NULL,
  `total` double NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sales_product`
--

DROP TABLE IF EXISTS `sales_product`;
CREATE TABLE IF NOT EXISTS `sales_product` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `Bill_id` int(255) NOT NULL,
  `build_date` date NOT NULL,
  `product_id` int(50) NOT NULL,
  `quantity` int(20) NOT NULL,
  `mobile` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=99 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sales_product`
--

INSERT INTO `sales_product` (`id`, `Bill_id`, `build_date`, `product_id`, `quantity`, `mobile`) VALUES
(61, 1616328670, '2020-11-26', 11, 4, 3),
(62, 1616328670, '2020-11-26', 2, 5, 3),
(63, 1616328670, '2020-11-26', 10, 2, 3),
(64, 1616328670, '2020-11-26', 17, 3, 3),
(65, 1616351370, '2021-03-30', 8, 7, 10),
(66, 1616351370, '2021-03-30', 4, 10, 10),
(67, 1616351370, '2021-03-30', 1, 1, 10),
(68, 1616351392, '2021-03-01', 7, 11, 10),
(69, 1616351392, '2021-03-01', 16, 1, 10),
(70, 1616351427, '2021-03-06', 7, 1, 19),
(71, 1616351427, '2021-03-06', 11, 25, 19),
(72, 1616351427, '2021-03-06', 18, 1, 19),
(73, 1616438275, '2021-03-12', 17, 1, 4),
(74, 1616438275, '2021-03-12', 16, 4, 4),
(75, 1616586699, '2021-03-11', 11, 1, 4),
(76, 1616586699, '2021-03-11', 16, 12, 4),
(77, 1617126358, '2021-04-02', 18, 1, 10),
(78, 1617126358, '2021-04-02', 20, 1, 10),
(79, 1617126358, '2021-04-02', 16, 1, 10),
(80, 1617270961, '2021-04-29', 18, 1, 3),
(81, 1617270961, '2021-04-29', 19, 1, 3),
(82, 1617973422, '2021-04-04', 17, 1, 18),
(83, 1617973422, '2021-04-04', 10, 12, 18),
(84, 1617973422, '2021-04-04', 8, 1, 18),
(85, 1617973477, '2021-04-30', 19, 1, 23),
(86, 1617973477, '2021-04-30', 3, 1, 23),
(87, 1617973477, '2021-04-30', 1, 10, 23),
(88, 1617973477, '2021-04-30', 4, 1, 23),
(89, 1617974898, '2021-05-08', 17, 2, 10),
(90, 1617974898, '2021-05-08', 21, 1, 10),
(91, 1617974898, '2021-05-08', 2, 1, 10),
(92, 1617987303, '2021-04-03', 22, 1, 6),
(93, 1617987303, '2021-04-03', 20, 1, 6),
(94, 1617987303, '2021-04-03', 7, 1, 6),
(95, 1617987524, '2021-04-07', 21, 1, 3),
(96, 1617988274, '2021-04-09', 21, 1, 6),
(97, 1617988517, '2020-12-09', 11, 1, 3),
(98, 1617988687, '2021-04-03', 21, 1, 26);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `mobile` varchar(11) DEFAULT NULL,
  `userType` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `mobile`, `userType`) VALUES
(1, 'Amit', 'amit@gmail.com', 'e1fefda3055528db2cf379cee2c7a1e0', '0099887766', 'Seller'),
(2, 'vishal', 'vishal@yahoo.com', 'ae1285ab8aaaca3c8fb0f140c815a983', '9998887776', 'Seller'),
(3, 'yash', 'yash@rediffmail.com', '860597464b31f718bc28e3994d28d0f0', '9926484901', 'Buyer'),
(4, 'ram', 'ram@gmail.com', '7d644cb3c6d3e1b13215c78293d70c78', '9955443322', 'Buyer'),
(5, 'ema', 'ema.watson@gmail.com', '66e160dfa75cf83450c34d7c18b3230e', '9898989898', 'Seller'),
(6, 'mitanshi', 'mits@gmail.com', '477925073a8ed4b8405b6745ea7e0785', '9998887777', 'Buyer'),
(7, 'kangana ranaut', 'kan@gmail.com', '47185a73776a0a699ea33eea7074b35b', '9999888889', 'Seller'),
(8, 'ray', 'ray@gmail.com', 'e30661c28aff4e88b271ebd140768fbe', '9998887772', 'Seller'),
(9, 'ramesh', 'ramesh@gmail.com', 'fdf3ab3292c26a4a3a480c0b41bc7a3f', '9900990099', 'Seller'),
(10, 'Anita', 'anita@yahoo.com', '098fb561add82a8bd20ef0869dd5c7cf', '7098988907', 'Buyer'),
(18, 'raja', 'raja@gmail.com', '536de27dff044f9d886a219f34ee06b0', '9999888700', 'Buyer'),
(19, 'abc', 'abc@gmail.com', '10b8e822d03fb4fd946188e852a4c3e2', '9998880000', 'Buyer'),
(24, 'Amit', 'Amit@yahoo.com', 'e1fefda3055528db2cf379cee2c7a1e0', '0099887766', 'Seller'),
(20, 'osho', 'osho.yvj@gmail.com', 'eb041f484575ee1966ffcce7f075425e', '9768976789', 'Seller'),
(21, 'Amrit', 'amrit@gmail.com', 'bbc9ad19aae250ce70e3bbea1cd1c76a', '9575589898', 'Buyer'),
(23, 'vijay', 'vijay@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', '9420012001', 'Buyer'),
(26, 'tapu', 'tapu@gmail.com', '7e356cebebbf157bc5bf7df458dec698', '0890780670', 'Buyer');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
