-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 09, 2019 at 09:38 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `2nd_module`
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
  `oprice` varchar(20) NOT NULL,
  `nprice` varchar(20) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `addpro`
--

INSERT INTO `addpro` (`id`, `cate`, `img`, `pname`, `oprice`, `nprice`, `date`) VALUES
(23, 'm_shoes', 'brown lace.jpg', 'Fita', '', '150', '2019-04-01 18:27:25'),
(24, 'm_shoes', 'shoes8.jpg', 'Nike', '', '599', '2019-04-01 22:11:06'),
(25, 'm_shoes', 'shoes1.jpg', 'shoes1', '', '199', '2019-04-04 01:52:09'),
(26, 'm_shoes', 'shoes2.jpg', 'shoes2', '', '299', '2019-04-04 01:52:21'),
(27, 'm_shoes', 'shoes5.jpg', 'shoes3', '', '399', '2019-04-04 01:52:34'),
(28, 'm_shoes', 'shoes7.jpg', 'shoes4', '', '499', '2019-04-04 01:52:43'),
(30, 'm_shoes', 'shoes10.jpg', 'shoes6', '', '699', '2019-04-04 01:53:09'),
(31, 'm_shoes', 'shoes11.jpg', 'shoes7', '', '499', '2019-04-04 01:53:48'),
(33, 'm_shoes', 'shoes12.jpg', 'shoes8', '', '699', '2019-04-04 01:55:17'),
(34, 'm_shoes', 'shoes14.jpg', 'shoes8', '', '799', '2019-04-04 01:59:29'),
(35, 'm_shoes', 'shoes16.jpg', 'shoes9', '', '899', '2019-04-04 02:02:36'),
(37, 'm_shoes', 'shoes18.jpg', 'shoes10', '', '1099', '2019-04-04 02:03:17'),
(38, 'm_shoes', 'shoes19.jpg', 'shoes11', '', '1199', '2019-04-04 02:03:34'),
(39, 'm_shoes', 'shoes23.jpg', 'shoes11', '', '1299', '2019-04-04 02:04:52'),
(40, 'm_shoes', 'shoes24.jpg', 'shoes12', '', '1399', '2019-04-04 02:05:33'),
(41, 'm_shoes', 'shoes25.jpg', 'shoes13', '', '1499', '2019-04-04 02:05:52'),
(43, 'm_shoes', 'shoes46.jpg', 'shoes15', '', '1699', '2019-04-04 02:06:38'),
(44, 'm_shoes', 'shoes50.jpg', 'shoes16', '', '1050', '2019-04-04 02:07:08'),
(45, 'm_shoes', 'shoes58.jpg', 'shoes17', '', '550', '2019-04-04 02:07:22'),
(47, 'm_shoes', 'shoes19.jpg', 'shoes19', '', '350', '2019-04-04 02:08:02');

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
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`id`, `fname`, `lname`, `img`, `email`, `tele`, `gender`, `day`, `month`, `year`, `pass`, `cpass`, `date`) VALUES
(5, 'Mamoon', 'MamoonSiddiqui61@gmail.com', 'IMG_6293.jpg', 'MamoonSiddiqui61@gmail.com', '45646456', 'Male', '30', 'Oct', '1999', '123', '123', '2019-02-28 12:07:44'),
(6, 'Mamoon', 'MamoonSiddiqui61@gmail.com', 'IMG_6293.jpg', 'MamoonSiddiqui61@gmail.com', '03330797770', 'Male', '30', 'Oct', '1999', '1323', '1323', '2019-03-09 12:07:34');

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
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shopper`
--

INSERT INTO `shopper` (`id`, `fname`, `lname`, `img`, `email`, `tele`, `gender`, `day`, `month`, `year`, `pass`, `cpass`, `date`) VALUES
(5, 'Mamoon', 'MamoonSiddiqui61@gmail.com', 'IMG_6293.jpg', 'MamoonSiddiqui61@gmail.com', '45646456', 'Male', '30', 'Oct', '1999', '123', '123', '2019-02-28 12:07:44'),
(6, 'Mamoon', 'MamoonSiddiqui61@gmail.com', 'IMG_6293.jpg', 'MamoonSiddiqui61@gmail.com', '03330797770', 'Male', '30', 'Oct', '1999', '1323', '1323', '2019-03-09 12:07:34');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `shopper`
--
ALTER TABLE `shopper`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
