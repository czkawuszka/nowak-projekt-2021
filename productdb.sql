-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 06, 2021 at 09:42 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `productdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `producttb`
--

CREATE TABLE `producttb` (
  `id` int(11) NOT NULL,
  `product_name` varchar(64) NOT NULL,
  `product_category` varchar(32) NOT NULL,
  `product_price` float DEFAULT NULL,
  `product_image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `producttb`
--

INSERT INTO `producttb` (`id`, `product_name`, `product_category`, `product_price`, `product_image`) VALUES
(1, 'Tangerine', 'Linear', 6.7, './upload/c3_tang.png'),
(2, 'Milky Yellow', 'Linear', 2.3, './upload/gat_miy.png'),
(3, 'Banana Split', 'Linear', 6.7, './upload/c3_bana.png'),
(4, 'Zealios v2', 'Tactile', 11, './upload/zeal_v2.png'),
(5, 'H1', 'Linear', 6.5, './upload/quad_h1.png'),
(6, 'Polaris Gray', 'Linear', 5.6, './upload/star_pg.png'),
(7, 'Tealios v2', 'Linear', 11, './upload/teal_v2.png'),
(9, 'Luminous Switch', 'Linear', 5.8, './upload/star_lu.png'),
(10, 'Peacock Blue', 'Linear', 6.9, './upload/ever_pc.png'),
(11, 'BeesWax', 'Linear', 6.9, './upload/ever_bw.png'),
(12, 'Bingsu', 'Linear', 7, './upload/bing_li.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `producttb`
--
ALTER TABLE `producttb`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `producttb`
--
ALTER TABLE `producttb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
