-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 18, 2023 at 07:56 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id20477880_restaurent`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `image` blob NOT NULL,
  `imagename` varchar(100) NOT NULL,
  `shopname` varchar(100) NOT NULL,
  `shopowner` varchar(100) NOT NULL,
  `shopaddress` varchar(100) NOT NULL,
  `foodname` varchar(40) NOT NULL,
  `foodprice` int(50) NOT NULL,
  `foodtype` varchar(10) NOT NULL,
  `quantity` int(40) NOT NULL,
  `userid` int(11) NOT NULL,
  `shoptype` tinyint(11) NOT NULL,
  `foodstatus` tinyint(11) NOT NULL DEFAULT 0 COMMENT '0=>available\r\n1=>not available'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `image`, `imagename`, `shopname`, `shopowner`, `shopaddress`, `foodname`, `foodprice`, `foodtype`, `quantity`, `userid`, `shoptype`, `foodstatus`) VALUES
(15, 0x75706c6f61642f706f6e67616c2e6a706567, 'pongal.jpeg', 'VAIGAI SAIVA HOTEL', 'Manoj', 'Velachery,chennai-8', 'pongal', 100, 'VEG', 1, 44, 0, 0),
(23, 0x75706c6f61642f76616461692e6a706567, 'vadai.jpeg', 'MADURAI HOTEL ', 'MADURAVEERAN', 'Tambaram,chennai-23', 'VADAI', 50, 'VEG', 2, 41, 1, 1),
(24, 0x75706c6f61642f646f776e6c6f61642e6a706567, 'download.jpeg', 'MADURAI HOTEL ', 'MADURAVEERAN', 'Tambaram,chennai-23', 'IDLY', 100, 'VEG', 2, 41, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `adminsignup`
--

CREATE TABLE `adminsignup` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL,
  `usertype` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `image` blob NOT NULL,
  `foodname` varchar(30) NOT NULL,
  `foodprice` int(100) NOT NULL,
  `foodtype` varchar(10) NOT NULL,
  `quantity` int(100) NOT NULL,
  `userid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `image`, `foodname`, `foodprice`, `foodtype`, `quantity`, `userid`) VALUES
(21, 0x75706c6f61642f646f73612e6a706567, 'DOSA', 20000, 'VEG', 2, 40),
(22, 0x75706c6f61642f646f73612e6a706567, 'DOSA', 20000, 'VEG', 2, 40),
(23, 0x75706c6f61642f636869636b656e2e6a706567, 'burger', 200, 'VEG', 1, 40),
(32, 0x75706c6f61642f646f73612e6a706567, 'DOSA', 20000, 'VEG', 2, 6),
(34, 0x75706c6f61642f636869636b656e2e6a706567, 'burger', 200, 'VEG', 1, 6);

-- --------------------------------------------------------

--
-- Table structure for table `rapzorpayment`
--

CREATE TABLE `rapzorpayment` (
  `pay_id` int(11) NOT NULL,
  `paymentid` varchar(100) NOT NULL,
  `amount` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phnumber` varchar(40) NOT NULL,
  `image` blob NOT NULL,
  `foodname` varchar(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `orderid` varchar(100) NOT NULL,
  `useraddress` text NOT NULL,
  `paymentstatus` tinyint(11) NOT NULL DEFAULT 1,
  `dateofpay` datetime(6) NOT NULL DEFAULT current_timestamp(6),
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rapzorpayment`
--

INSERT INTO `rapzorpayment` (`pay_id`, `paymentid`, `amount`, `name`, `email`, `phnumber`, `image`, `foodname`, `userid`, `orderid`, `useraddress`, `paymentstatus`, `dateofpay`, `quantity`) VALUES
(1, 'pay_Laq1BKInhhkVrB', 200, 'Manikandanyy', 'manipriyan010@gmail.com', '09047913256', 0x75706c6f61642f636869636b656e2e6a706567, 'burger', 6, 'order_Laq0R1Un83NAwh', '', 1, '2023-04-07 15:38:13.148902', 0),
(2, 'pay_Laq5Trs3GBoWzk', 200, 'Munees Wari', 'manipriyan010@gmail.com', '09047913256', 0x75706c6f61642f636869636b656e2e6a706567, 'burger', 6, 'order_Laq4l0jInx5tWp', '', 1, '2023-04-07 15:38:13.148902', 0),
(3, 'pay_LarDO2sfnIMwk3', 20000, 'Munees Wari', 'manipriyan010@gmail.com', '09047913256', 0x75706c6f61642f646f73612e6a706567, 'DOSA', 6, 'order_LarD44503wEfjB', '', 1, '2023-04-07 15:38:13.148902', 0),
(4, 'pay_LarJe3ZS4dJa1F', 20000, 'Munees Wari', 'manipriyan010@gmail.com', '09047913256', 0x75706c6f61642f646f73612e6a706567, 'DOSA', 6, 'order_LarJSd1Z2cP7eQ', '', 1, '2023-04-07 15:38:13.148902', 0),
(5, 'pay_LaraG4BIzC6C8F', 20000, 'Munees Wari', 'manipriyan010@gmail.com', '09047913256', 0x75706c6f61642f646f73612e6a706567, 'DOSA', 6, 'order_LarZ8I1vCTsoum', '995, Bharathi Nagar,Mimisal', 1, '2023-04-07 15:39:41.202504', 0),
(6, 'pay_Larc1O4aUToCfm', 20000, 'Munees Wari', 'manipriyan010@gmail.com', '09047913256', 0x75706c6f61642f646f73612e6a706567, 'DOSA', 6, 'order_LarbFSD5idpKU8', '995, Bharathi Nagar,Mimisal', 1, '2023-04-07 15:41:19.731212', 0),
(7, 'pay_LasecBnABRreFu', 20000, 'Munees Wari', 'manipriyan010@gmail.com', '09047913256', 0x75706c6f61642f646f73612e6a706567, 'DOSA', 6, 'order_LaseKP6lxJqGzv', '995, Bharathi Nagar,Mimisal', 1, '2023-04-07 16:42:27.298095', 2),
(8, 'pay_LbNEWT4YLk6v9U', 20000, 'Manikandan', 'manipriyan010@gmail.com', '09047913256', 0x75706c6f61642f646f73612e6a706567, 'DOSA', 6, 'order_LbMuA0uq0WwDTK', 'amm', 1, '2023-04-08 22:37:16.323638', 2),
(9, 'pay_LcNAm2t8sKpe41', 20000, 'Munees Wari', 'manipriyan010@gmail.com', '09047913256', 0x75706c6f61642f646f73612e6a706567, 'DOSA', 6, 'order_LcNAP4kW0WSVVc', '995, Bharathi Nagar,Mimisal', 1, '2023-04-11 11:12:44.342190', 2),
(10, 'pay_LcNu6bZbWaMoYC', 20000, 'Manikandan', 'manipriyan010@gmail.com', '09047913256', 0x75706c6f61642f646f73612e6a706567, 'DOSA', 6, 'order_LcNthSJk7uKrNR', 'hughyu', 1, '2023-04-11 11:55:38.519835', 2),
(11, 'pay_LcShDgddcEybC0', 20000, 'Manikandan', 'manipriyan010@gmail.com', '09047913256', 0x75706c6f61642f646f73612e6a706567, 'DOSA', 6, 'order_LcSgwAAllPcmFx', '995, Bharathi Nagar,Mimisal', 1, '2023-04-11 16:36:55.719573', 2),
(12, 'pay_LcSu4bnqILksmr', 200, 'Manikandan', 'manipriyan010@gmail.com', '09047913256', 0x75706c6f61642f636869636b656e2e6a706567, 'burger', 6, 'order_LcSts7PoXE6wRg', '995, Bharathi Nagar,Mimisal', 1, '2023-04-11 16:49:03.249940', 1),
(13, 'pay_LcTBliKgp6hQiY', 200, 'Manikandan', 'manipriyan010@gmail.com', '09047913256', 0x75706c6f61642f636869636b656e2e6a706567, 'burger', 6, 'order_LcTBUpY4FVrz55', '995, Bharathi Nagar,Mimisal', 1, '2023-04-11 17:05:53.753057', 1),
(14, 'pay_LcTFNv3CnlJSDi', 20000, 'Manikandan', 'manipriyan010@gmail.com', '09047913256', 0x75706c6f61642f646f73612e6a706567, '', 6, 'order_LcTEDcIDj8OKI7', '995, Bharathi Nagar,Mimisal', 1, '2023-04-11 17:09:17.818559', 2),
(15, 'pay_LcTGyMl8TeP1Bw', 200, 'Manikandan', 'manipriyan010@gmail.com', '09047913256', 0x75706c6f61642f636869636b656e2e6a706567, '', 6, 'order_LcTGiutnHH7W20', '995, Bharathi Nagar,Mimisal', 1, '2023-04-11 17:10:47.747866', 1),
(16, 'pay_LcTGyMl8TeP1Bw', 200, 'Manikandan', 'manipriyan010@gmail.com', '09047913256', 0x75706c6f61642f636869636b656e2e6a706567, '', 6, 'order_LcTGiutnHH7W20', '995, Bharathi Nagar,Mimisal', 1, '2023-04-11 17:26:27.847965', 1),
(17, 'pay_LcTGyMl8TeP1Bw', 200, 'Manikandan', 'manipriyan010@gmail.com', '09047913256', 0x75706c6f61642f636869636b656e2e6a706567, '', 6, 'order_LcTGiutnHH7W20', '995, Bharathi Nagar,Mimisal', 1, '2023-04-11 17:26:49.487249', 1),
(18, 'pay_LcTbIE4HBBySYH', 200, 'Manikandan', 'manipriyan010@gmail.com', '09047913256', 0x75706c6f61642f636869636b656e2e6a706567, '', 6, 'order_LcTb5m8nFWjkWs', '995, Bharathi Nagar,Mimisal', 1, '2023-04-11 17:30:52.227850', 1),
(19, 'pay_LcTd9h6BI4xaME', 200, 'Manikandan', 'manipriyan010@gmail.com', '09047913256', 0x75706c6f61642f636869636b656e2e6a706567, '', 6, 'order_LcTcWR78i9JUv8', '995, Bharathi Nagar,Mimisal', 1, '2023-04-11 17:32:08.524528', 1),
(20, 'pay_LcTd9h6BI4xaME', 20000, 'Manikandan', 'manipriyan010@gmail.com', '09047913256', 0x75706c6f61642f646f73612e6a706567, '', 6, 'order_LcTcWR78i9JUv8', '995, Bharathi Nagar,Mimisal', 1, '2023-04-11 17:32:49.533792', 2),
(21, 'pay_LcTgSSoCrMkITE', 20000, 'Manikandan', 'manipriyan010@gmail.com', '09047913256', 0x75706c6f61642f646f73612e6a706567, '', 6, 'order_LcTgA1qlhyA0Gb', '995, Bharathi Nagar,Mimisal', 1, '2023-04-11 17:34:56.660936', 2),
(22, 'pay_LcTmkmyXuI1BwD', 20000, 'Manikandan', 'manipriyan010@gmail.com', '09047913256', 0x75706c6f61642f646f73612e6a706567, '', 6, 'order_LcTmO3aNe3KIT3', '995, Bharathi Nagar,Mimisal', 1, '2023-04-11 17:40:50.522248', 2),
(23, 'pay_LcTmkmyXuI1BwD', 200, 'Manikandan', 'manipriyan010@gmail.com', '09047913256', 0x75706c6f61642f636869636b656e2e6a706567, '', 6, 'order_LcTmO3aNe3KIT3', '995, Bharathi Nagar,Mimisal', 1, '2023-04-11 17:42:32.215618', 1),
(24, 'pay_LcTmkmyXuI1BwD', 200, 'Manikandan', 'manipriyan010@gmail.com', '09047913256', 0x75706c6f61642f636869636b656e2e6a706567, '', 6, 'order_LcTmO3aNe3KIT3', '995, Bharathi Nagar,Mimisal', 1, '2023-04-11 17:42:52.849153', 1),
(25, 'pay_LcTmkmyXuI1BwD', 200, 'Manikandan', 'manipriyan010@gmail.com', '09047913256', 0x75706c6f61642f636869636b656e2e6a706567, '', 6, 'order_LcTmO3aNe3KIT3', '995, Bharathi Nagar,Mimisal', 1, '2023-04-11 17:43:20.936576', 1),
(31, 'pay_LcjICeG1L1zvkb', 20000, '', 'manipriyan010@gmail.com', '09047913256', 0x75706c6f61642f646f73612e6a706567, 'DOSA', 6, '8c2edb9a660d675c29de89ccf9a89e829aa5ffc3951ae1cfb8393f1359963c20', '995, Bharathi Nagar,Mimisal', 1, '2023-04-12 08:53:15.396939', 2),
(32, 'pay_LcjICeG1L1zvkb', 200, '', 'manipriyan010@gmail.com', '09047913256', 0x75706c6f61642f636869636b656e2e6a706567, 'burger', 6, '8c2edb9a660d675c29de89ccf9a89e829aa5ffc3951ae1cfb8393f1359963c20', '995, Bharathi Nagar,Mimisal', 1, '2023-04-12 08:53:15.621766', 1),
(33, 'pay_LcjtP0DAv7qiRw', 200, 'Manikandan', 'manipriyan010@gmail.com', '09047913256', 0x75706c6f61642f636869636b656e2e6a706567, 'burger', 6, 'b228430501ace5aaf182a822dc569b07c45bcbcf322acdf7ffc3e2dcc68ddfe3', '995, Bharathi Nagar,Mimisal', 1, '2023-04-12 09:28:22.360106', 1),
(34, 'pay_LcjxeQ0BqEPckv', 20000, 'Manikandan', 'manipriyan010@gmail.com', '09047913256', 0x75706c6f61642f646f73612e6a706567, 'DOSA', 6, 'a28a4ac8b79ca4dd494db7f3ee0c78834a92bfda94b574cd1d51aec62cad6ff2', '995, Bharathi Nagar,Mimisal', 1, '2023-04-12 09:30:50.746545', 2),
(35, 'pay_LcjxeQ0BqEPckv', 200, 'Manikandan', 'manipriyan010@gmail.com', '09047913256', 0x75706c6f61642f636869636b656e2e6a706567, 'burger', 6, 'a28a4ac8b79ca4dd494db7f3ee0c78834a92bfda94b574cd1d51aec62cad6ff2', '995, Bharathi Nagar,Mimisal', 1, '2023-04-12 09:30:50.827744', 1),
(36, 'pay_LcjzeoYbiv1wcm', 20000, 'Manikandan', 'manipriyan010@gmail.com', '09047913256', 0x75706c6f61642f646f73612e6a706567, 'DOSA', 6, '673b28992a82048e935c7e496b8fc07611051bd8356a940905acbde3203ab1af', '995, Bharathi Nagar,Mimisal', 1, '2023-04-12 09:32:13.780806', 2),
(37, 'pay_LcjzeoYbiv1wcm', 200, 'Manikandan', 'manipriyan010@gmail.com', '09047913256', 0x75706c6f61642f636869636b656e2e6a706567, 'burger', 6, '673b28992a82048e935c7e496b8fc07611051bd8356a940905acbde3203ab1af', '995, Bharathi Nagar,Mimisal', 1, '2023-04-12 09:32:13.825631', 1),
(38, 'pay_Lcm1TzmcC37SR7', 20000, 'Manikandan', 'manipriyan010@gmail.com', '09047913256', 0x75706c6f61642f646f73612e6a706567, 'DOSA', 6, '34464cd2b87ed40c5fa6f5ae664fea630c5b4b6a0ecdf5cb787f9de2fb5aaa26', '995, Bharathi Nagar,Mimisal', 1, '2023-04-12 11:31:17.025737', 2),
(39, 'pay_Lcm1TzmcC37SR7', 200, 'Manikandan', 'manipriyan010@gmail.com', '09047913256', 0x75706c6f61642f636869636b656e2e6a706567, 'burger', 6, '34464cd2b87ed40c5fa6f5ae664fea630c5b4b6a0ecdf5cb787f9de2fb5aaa26', '995, Bharathi Nagar,Mimisal', 1, '2023-04-12 11:31:17.080914', 1),
(40, 'pay_LdEQRmYWH8UwFe', 70, 'Munees Wari', 'manipriyan010@gmail.com', '09047913256', 0x75706c6f61642f636869636b656e2e6a706567, 'Chicken65', 6, 'order_LdEQCgxDque30Z', '995, Bharathi Nagar,Mimisal', 1, '2023-04-13 15:18:19.610043', 1);

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `ratingdata` int(10) NOT NULL,
  `username` varchar(100) NOT NULL,
  `userreview` text NOT NULL,
  `foodid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `ratingdata`, `username`, `userreview`, `foodid`) VALUES
(1, 1, 'Mani_687', 'sdfghjkl', 0),
(2, 5, 'Mani_687', 'jkl;', 0),
(3, 4, 'Manikandan', 'dfghj', 0),
(4, 4, 'Manikandan', 'dfghj', 0),
(5, 4, 'siva678', 'fghj', 0),
(6, 1, 'Manikandan', 'hiii', 0),
(7, 1, 'Mani', 'e', 0),
(8, 1, 'Manikandan', 'worst', 0),
(9, 1, 'Manikandan', 'worst', 0),
(10, 1, 'Mani', 'worst', 0),
(11, 1, 'Mani', 'worst', 0),
(12, 1, 'Mani89', 'worst', 0),
(13, 1, 'Manikandan', 'worst', 0);

-- --------------------------------------------------------

--
-- Table structure for table `shopdetails`
--

CREATE TABLE `shopdetails` (
  `shopid` int(11) NOT NULL,
  `shopname` varchar(100) NOT NULL,
  `shoptype` tinyint(11) NOT NULL COMMENT '0=>veg type hotel\r\n1=> Non veg type hotel',
  `shopaddress` varchar(200) NOT NULL,
  `userid` int(11) NOT NULL,
  `ownername` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `shopdetails`
--

INSERT INTO `shopdetails` (`shopid`, `shopname`, `shoptype`, `shopaddress`, `userid`, `ownername`) VALUES
(1, 'VVS hotel', 0, 'chennai -09', 46, ''),
(3, 'MADURAI HOTEL ', 1, 'Tambaram,chennai-23', 41, 'MADURAVEERAN'),
(4, 'MADURAI HOTEL ', 1, 'Tambaram,chennai-23', 41, 'MADURAVEERAN'),
(5, 'MADURAI HOTEL ', 0, 'Tambaram,chennai-25', 41, 'MADURAVEERAN'),
(6, 'VAIGAI SAIVA HOTEL', 0, 'Velachery,chennai-8', 44, 'Manoj');

-- --------------------------------------------------------

--
-- Table structure for table `signup`
--

CREATE TABLE `signup` (
  `userid` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `usertype` tinyint(11) NOT NULL COMMENT '0=>Customer\r\n1=>owner\r\n2=>superadmin',
  `status` tinyint(11) NOT NULL DEFAULT 1 COMMENT '0=>inactive\r\n1=>Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `signup`
--

INSERT INTO `signup` (`userid`, `username`, `password`, `usertype`, `status`) VALUES
(3, 'Mani', '89', 1, 0),
(6, 'Manikandan', '90', 0, 1),
(9, 'siva678', '78', 0, 1),
(10, 'Mani89', '90', 0, 1),
(11, 'Mani789', '67', 0, 1),
(12, 'Mani_687', '78', 0, 1),
(13, 'Mani878', '78', 0, 1),
(14, 'Manikandan010', '45', 0, 1),
(15, 'suthan', '10', 0, 1),
(16, 'Mani67', '67', 0, 1),
(17, 'surya', '12', 0, 1),
(18, 'Manikandan050', '23', 0, 1),
(19, 'Manikandan050', '23', 0, 1),
(20, 'Manikandan050', '23', 0, 1),
(25, 'Manikandan050', '23', 0, 1),
(27, 'Manikandan0100', '23', 0, 1),
(29, 'Manoj090', '29', 0, 1),
(30, 'Manoj090', '29', 0, 1),
(31, 'Manikandan050', '23', 0, 1),
(32, 'Manikandan050', '23', 0, 1),
(33, 'Mani890', '90', 0, 1),
(34, 'ttu', '67', 0, 1),
(35, 'ttv', '45', 0, 1),
(36, 'manikandan900', '900', 0, 1),
(37, 'Munees', '89', 0, 1),
(38, 'siva', '90', 0, 1),
(39, 'siva67', '67', 0, 1),
(40, 'Manikandan040', '89', 0, 1),
(41, 'owner', '123', 1, 1),
(42, 'admin', '123', 2, 1),
(44, 'MANOJ', '202cb962ac59075b964b07152d234b70', 1, 1),
(45, 'Murali', '202cb962ac59075b964b07152d234b70', 0, 1),
(46, 'lakshmanan', '202cb962ac59075b964b07152d234b70', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `visited`
--

CREATE TABLE `visited` (
  `id` int(11) NOT NULL,
  `image` blob NOT NULL,
  `foodname` varchar(100) NOT NULL,
  `foodprice` int(100) NOT NULL,
  `foodtype` varchar(10) NOT NULL,
  `quantity` int(100) NOT NULL,
  `userid` int(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `visited`
--

INSERT INTO `visited` (`id`, `image`, `foodname`, `foodprice`, `foodtype`, `quantity`, `userid`) VALUES
(2, 0x75706c6f61642f636869636b656e2e6a706567, 'burger', 200, 'VEG', 1, 32),
(3, 0x75706c6f61642f636869636b656e2e6a706567, 'burger', 200, 'VEG', 1, 32),
(4, 0x75706c6f61642f636869636b656e2e6a706567, 'burger', 200, 'VEG', 1, 32),
(6, 0x75706c6f61642f636869636b656e2e6a706567, 'burger', 200, 'VEG', 1, 32),
(7, 0x75706c6f61642f636869636b656e2e6a706567, 'burger', 200, 'VEG', 1, 32),
(8, 0x75706c6f61642f636869636b656e2e6a706567, 'burger', 200, 'VEG', 1, 32),
(9, 0x75706c6f61642f636869636b656e2e6a706567, 'burger', 200, 'VEG', 1, 32),
(10, 0x75706c6f61642f636869636b656e2e6a706567, 'burger', 200, 'VEG', 1, 32),
(11, 0x75706c6f61642f636869636b656e2e6a706567, 'burger', 200, 'VEG', 1, 32),
(12, 0x75706c6f61642f636869636b656e2e6a706567, 'burger', 200, 'VEG', 1, 32),
(13, 0x75706c6f61642f636869636b656e2e6a706567, 'burger', 200, 'VEG', 1, 32),
(14, 0x75706c6f61642f636869636b656e2e6a706567, 'burger', 200, 'VEG', 1, 32),
(15, 0x75706c6f61642f636869636b656e2e6a706567, 'burger', 200, 'VEG', 1, 32),
(16, 0x75706c6f61642f646f73612e6a706567, 'DOSA', 20000, 'VEG', 2, 33),
(17, 0x75706c6f61642f636869636b656e2e6a706567, 'burger', 200, 'VEG', 1, 33),
(18, 0x75706c6f61642f636869636b656e2e6a706567, 'burger', 200, 'VEG', 1, 33),
(19, 0x75706c6f61642f636869636b656e2e6a706567, 'burger', 200, 'VEG', 1, 33),
(20, 0x75706c6f61642f646f73612e6a706567, 'DOSA', 20000, 'VEG', 2, 33),
(21, 0x75706c6f61642f636869636b656e2e6a706567, 'burger', 200, 'VEG', 1, 33),
(22, 0x75706c6f61642f636869636b656e2e6a706567, 'burger', 200, 'VEG', 1, 33),
(23, 0x75706c6f61642f636869636b656e2e6a706567, 'burger', 200, 'VEG', 1, 33),
(24, 0x75706c6f61642f636869636b656e2e6a706567, 'burger', 200, 'VEG', 1, 33),
(25, 0x75706c6f61642f636869636b656e2e6a706567, 'burger', 200, 'VEG', 1, 33),
(28, 0x75706c6f61642f636869636b656e2e6a706567, 'burger', 200, 'VEG', 1, 33),
(29, 0x75706c6f61642f636869636b656e2e6a706567, 'burger', 200, 'VEG', 1, 33),
(30, 0x75706c6f61642f636869636b656e2e6a706567, 'burger', 200, 'VEG', 1, 33),
(31, 0x75706c6f61642f636869636b656e2e6a706567, 'burger', 200, 'VEG', 1, 33),
(34, 0x75706c6f61642f636869636b656e2e6a706567, 'burger', 200, 'VEG', 1, 7),
(36, 0x75706c6f61642f636869636b656e2e6a706567, 'burger', 200, 'VEG', 1, 38),
(64, 0x75706c6f61642f636869636b656e2e6a706567, 'burger', 200, 'VEG', 1, 39),
(65, 0x75706c6f61642f636869636b656e2e6a706567, 'burger', 200, 'VEG', 1, 39),
(66, 0x75706c6f61642f636869636b656e2e6a706567, 'burger', 200, 'VEG', 1, 39),
(67, 0x75706c6f61642f636869636b656e2e6a706567, 'burger', 200, 'VEG', 1, 39),
(68, 0x75706c6f61642f646f73612e6a706567, 'DOSA', 20000, 'VEG', 2, 39),
(69, 0x75706c6f61642f646f73612e6a706567, 'DOSA', 20000, 'VEG', 2, 39),
(70, 0x75706c6f61642f636869636b656e2e6a706567, 'burger', 200, 'VEG', 1, 39),
(71, 0x75706c6f61642f636869636b656e2e6a706567, 'burger', 200, 'VEG', 1, 39),
(72, 0x75706c6f61642f636869636b656e2e6a706567, 'burger', 200, 'VEG', 1, 39),
(73, 0x75706c6f61642f636869636b656e2e6a706567, 'burger', 200, 'VEG', 1, 39),
(74, 0x75706c6f61642f636869636b656e2e6a706567, 'burger', 200, 'VEG', 1, 39),
(75, 0x75706c6f61642f636869636b656e2e6a706567, 'burger', 200, 'VEG', 1, 39),
(77, 0x75706c6f61642f636869636b656e2e6a706567, 'burger', 200, 'VEG', 1, 40),
(78, 0x75706c6f61642f636869636b656e2e6a706567, 'burger', 200, 'VEG', 1, 40),
(79, 0x75706c6f61642f646f73612e6a706567, 'DOSA', 20000, 'VEG', 2, 40),
(80, 0x75706c6f61642f646f73612e6a706567, 'DOSA', 20000, 'VEG', 2, 40),
(81, 0x75706c6f61642f646f73612e6a706567, 'DOSA', 20000, 'VEG', 2, 40),
(83, 0x75706c6f61642f646f73612e6a706567, 'DOSA', 20000, 'VEG', 2, 7),
(84, 0x75706c6f61642f646f73612e6a706567, 'DOSA', 20000, 'VEG', 2, 7),
(103, 0x75706c6f61642f636869636b656e2e6a706567, 'burger', 200, 'VEG', 1, 6),
(104, 0x75706c6f61642f646f73612e6a706567, 'DOSA', 20000, 'VEG', 2, 6),
(105, 0x75706c6f61642f636869636b656e2e6a706567, 'burger', 200, 'VEG', 1, 6),
(106, 0x75706c6f61642f636869636b656e2e6a706567, 'burger', 200, 'VEG', 1, 6),
(107, 0x75706c6f61642f636869636b656e2e6a706567, 'burger', 200, 'VEG', 1, 6),
(108, 0x75706c6f61642f636869636b656e2e6a706567, 'burger', 200, 'VEG', 1, 6),
(109, 0x75706c6f61642f636869636b656e2e6a706567, 'burger', 200, 'VEG', 1, 6),
(110, 0x75706c6f61642f636869636b656e2e6a706567, 'burger', 200, 'VEG', 1, 6),
(111, 0x75706c6f61642f646f73612e6a706567, 'DOSA', 20000, 'VEG', 2, 6),
(112, 0x75706c6f61642f636869636b656e2e6a706567, 'burger', 200, 'VEG', 1, 6),
(113, 0x75706c6f61642f636869636b656e2e6a706567, 'burger', 200, 'VEG', 1, 6),
(114, 0x75706c6f61642f646f73612e6a706567, 'DOSA', 20000, 'VEG', 2, 6);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `adminsignup`
--
ALTER TABLE `adminsignup`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rapzorpayment`
--
ALTER TABLE `rapzorpayment`
  ADD PRIMARY KEY (`pay_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shopdetails`
--
ALTER TABLE `shopdetails`
  ADD PRIMARY KEY (`shopid`);

--
-- Indexes for table `signup`
--
ALTER TABLE `signup`
  ADD PRIMARY KEY (`userid`);

--
-- Indexes for table `visited`
--
ALTER TABLE `visited`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `adminsignup`
--
ALTER TABLE `adminsignup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `rapzorpayment`
--
ALTER TABLE `rapzorpayment`
  MODIFY `pay_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `shopdetails`
--
ALTER TABLE `shopdetails`
  MODIFY `shopid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `signup`
--
ALTER TABLE `signup`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `visited`
--
ALTER TABLE `visited`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
