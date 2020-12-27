-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 24, 2020 at 02:02 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `proj`
--

-- --------------------------------------------------------

--
-- Table structure for table `addpro`
--

CREATE TABLE `addpro` (
  `id` int(11) NOT NULL,
  `cate` varchar(20) NOT NULL,
  `img` varchar(150) NOT NULL,
  `pname` varchar(30) NOT NULL,
  `color` varchar(255) NOT NULL,
  `oprice` varchar(20) NOT NULL,
  `nprice` varchar(20) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `addpro`
--

INSERT INTO `addpro` (`id`, `cate`, `img`, `pname`, `color`, `oprice`, `nprice`, `date`) VALUES
(23, 'casual', 'brown lace.jpg', 'Fita', '', '135', '150', '2019-04-01 18:27:25'),
(24, 'casual', 'shoes8.jpg', 'Nike', '', '499', '599', '2019-04-01 22:11:06'),
(25, 'casual', 'shoes1.jpg', 'shoes1', '', '120', '199', '2019-04-04 01:52:09'),
(26, 'casual', 'shoes2.jpg', 'shoes2', '', '199', '299', '2019-04-04 01:52:21'),
(27, 'casual', 'shoes5.jpg', 'shoes3', '', '255', '399', '2019-04-04 01:52:34'),
(28, 'casual', 'shoes7.jpg', 'shoes4', '', '300', '499', '2019-04-04 01:52:43'),
(30, 'casual', 'shoes10.jpg', 'shoes6', '', '649', '699', '2019-04-04 01:53:09'),
(31, 'casual', 'shoes11.jpg', 'shoes7', '', '449', '499', '2019-04-04 01:53:48'),
(33, 'casual', 'shoes12.jpg', 'shoes8', '', '649', '699', '2019-04-04 01:55:17'),
(34, 'casual', 'shoes14.jpg', 'shoes8', '', '699', '799', '2019-04-04 01:59:29'),
(35, 'casual', 'shoes16.jpg', 'shoes9', '', '799', '899', '2019-04-04 02:02:36'),
(37, 'casual', 'shoes18.jpg', 'shoes10', '', '999', '1099', '2019-04-04 02:03:17'),
(38, 'casual', 'shoes19.jpg', 'shoes11', '', '1050', '1199', '2019-04-04 02:03:34'),
(39, 'casual', 'shoes23.jpg', 'shoes11', '', '1250', '1299', '2019-04-04 02:04:52'),
(40, 'casual', 'shoes24.jpg', 'shoes12', '', '1350', '1399', '2019-04-04 02:05:33'),
(41, 'casual', 'shoes25.jpg', 'shoes13', '', '1450', '1499', '2019-04-04 02:05:52'),
(43, 'casual', 'shoes46.jpg', 'shoes15', '', '1650', '1699', '2019-04-04 02:06:38'),
(44, 'casual', 'shoes50.jpg', 'shoes16', '', '950', '1050', '2019-04-04 02:07:08'),
(45, 'casual', 'shoes58.jpg', 'shoes17', '', '500', '550', '2019-04-04 02:07:22'),
(47, 'casual', 'shoes19.jpg', 'shoes19', '', '259', '350', '2019-04-04 02:08:02'),
(48, 'casual', 'download.jpg', 'Table', '', '12000', '15000', '2020-12-09 12:10:54'),
(49, 'casual', 'LaceUps.jpg', 'Lace Ups', '', '16000', '14000', '2020-12-09 12:25:51'),
(50, 'casual', 'canvas.jpg', 'Canvas', '', '18000', '14000', '2020-12-09 12:27:45'),
(51, 'casual', 'welling.jpg', 'Welling', '', '12000', '9000', '2020-12-09 12:28:02'),
(52, 'casual', 'welling.jpg', 'Welling', '', '12000', '9000', '2020-12-09 12:28:19'),
(53, 'casual', 'flipflo[p.jpg', 'Flip Flop', '', '5000', '3000', '2020-12-09 12:28:35'),
(54, 'casual', 'mules.jpg', 'Mules', '', '6500', '4500', '2020-12-09 12:28:57'),
(55, 'casual', 'loafers.jpg', 'Loafers', '', '9000', '7000', '2020-12-09 12:29:27'),
(56, 'athletic', 'shoes14.jpg', 'Black Kheri', 'black', '16000', '24000', '2020-12-10 12:15:49');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `pId` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `sessionId` varchar(255) NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `ordered` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `pId`, `qty`, `sessionId`, `created`, `ordered`) VALUES
(11, 25, 6, '837ec5754f503cfaaee0929fd48974e7', '2020-12-24 12:31:55', 0),
(12, 25, 3, '8f14e45fceea167a5a36dedd4bea2543', '2020-12-24 12:37:06', 0),
(13, 24, 1, 'c9f0f895fb98ab9159f51fd0297e236d', '2020-12-24 12:39:29', 0);

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id` int(11) NOT NULL,
  `sessionId` varchar(255) NOT NULL,
  `email` varchar(500) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `nameOnCard` varchar(255) NOT NULL,
  `cardNumber` varchar(255) NOT NULL,
  `expMonth` int(11) NOT NULL,
  `expYear` int(11) NOT NULL,
  `cvv` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `order_product`
--

CREATE TABLE `order_product` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `p_name` varchar(255) NOT NULL,
  `p_qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `id` int(11) NOT NULL,
  `usrId` int(11) NOT NULL,
  `prodId` int(11) NOT NULL,
  `rating` int(1) NOT NULL,
  `revDesc` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rating`
--

INSERT INTO `rating` (`id`, `usrId`, `prodId`, `rating`, `revDesc`) VALUES
(2, 7, 24, 5, 'This is a really nice product ..!a'),
(3, 6, 24, 3, 'Gud One ..!'),
(4, 5, 23, 5, 'nice color.'),
(5, 5, 24, 4, 'something intrested');

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `id` int(11) NOT NULL,
  `fname` varchar(30) NOT NULL,
  `lname` varchar(30) NOT NULL,
  `img` varchar(150) NOT NULL,
  `email` varchar(50) NOT NULL,
  `tele` varchar(20) NOT NULL,
  `gender` varchar(15) NOT NULL,
  `day` varchar(20) NOT NULL,
  `month` varchar(30) NOT NULL,
  `year` varchar(20) NOT NULL,
  `pass` varchar(30) NOT NULL,
  `cpass` varchar(30) NOT NULL,
  `date` datetime NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`id`, `fname`, `lname`, `img`, `email`, `tele`, `gender`, `day`, `month`, `year`, `pass`, `cpass`, `date`, `status`) VALUES
(5, 'Mamoon', 'MamoonSiddiqui61@gmail.com', 'IMG_6293.jpg', 'MamoonSiddiqui61@gmail.com', '45646456', 'Male', '30', 'Oct', '1999', '123', '123', '2019-02-28 12:07:44', 1),
(6, 'Mamoon', 'MamoonSiddiqui61@gmail.com', 'IMG_6293.jpg', 'MamoonSiddiqui61@gmail.com', '03330797770', 'Male', '30', 'Oct', '1999', '1323', '1323', '2019-03-09 12:07:34', 0),
(7, 'zeeshan', 'ahmed', '', 'zeexhanahmed.1997@gmail.com', '03052205217', 'Male', '30', 'Sep', '1998', '12345', '12345', '2020-12-09 12:09:21', 1);

-- --------------------------------------------------------

--
-- Table structure for table `shopper`
--

CREATE TABLE `shopper` (
  `id` int(11) NOT NULL,
  `fname` varchar(30) NOT NULL,
  `lname` varchar(30) NOT NULL,
  `img` varchar(150) NOT NULL,
  `email` varchar(50) NOT NULL,
  `tele` varchar(20) NOT NULL,
  `gender` varchar(15) NOT NULL,
  `day` varchar(20) NOT NULL,
  `month` varchar(30) NOT NULL,
  `year` varchar(20) NOT NULL,
  `pass` varchar(30) NOT NULL,
  `cpass` varchar(30) NOT NULL,
  `date` datetime NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shopper`
--

INSERT INTO `shopper` (`id`, `fname`, `lname`, `img`, `email`, `tele`, `gender`, `day`, `month`, `year`, `pass`, `cpass`, `date`, `status`) VALUES
(5, 'Mamoon', 'MamoonSiddiqui61@gmail.com', 'IMG_6293.jpg', 'MamoonSiddiqui61@gmail.com', '45646456', 'Male', '30', 'Oct', '1999', '123', '123', '2019-02-28 12:07:44', 1),
(6, 'Mamoon', 'MamoonSiddiqui61@gmail.com', 'IMG_6293.jpg', 'MamoonSiddiqui61@gmail.com', '03330797770', 'Male', '30', 'Oct', '1999', '1323', '1323', '2019-03-09 12:07:34', 1),
(7, 'zeeshans', 'ahmed', '', 'zeexhanahmed.1997@gmail.com', '03052205217', 'Male', '30', 'Sep', '1998', '12345', '12345', '2020-12-09 12:01:00', 1),
(8, 'zee', '', '', 'zee@gmail.com', '03052205202', 'Male', '1', 'Jan', '2008', '12345', '12345', '2020-12-24 17:38:23', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addpro`
--
ALTER TABLE `addpro`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_product`
--
ALTER TABLE `order_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `shopper`
--
ALTER TABLE `shopper`
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addpro`
--
ALTER TABLE `addpro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_product`
--
ALTER TABLE `order_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rating`
--
ALTER TABLE `rating`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `shopper`
--
ALTER TABLE `shopper`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
