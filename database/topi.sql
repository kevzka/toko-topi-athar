-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 27, 2025 at 03:28 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `topi`
--

-- --------------------------------------------------------

--
-- Table structure for table `t_admin`
--

CREATE TABLE `t_admin` (
  `id_admin` int(11) NOT NULL,
  `admin_name` varchar(30) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `phone` varchar(25) NOT NULL,
  `admin_email` varchar(50) NOT NULL,
  `admin_address` text NOT NULL,
  `level` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `t_admin`
--

INSERT INTO `t_admin` (`id_admin`, `admin_name`, `username`, `password`, `phone`, `admin_email`, `admin_address`, `level`) VALUES
(1, 'admin', 'admin', '123', '123', '@gmail', 'afjjad', 'admin'),
(2, 'Kevin', 'kevin', 'a', '98989898', 'kevin@gmail', 'Afasfa', 'pelanggan'),
(3, 'tes', 'tes', 'tes', '01234', 'tes@email', 'indonesia', 'pelanggan'),
(6, 'kevin2', 'kevin2', 'kevin2', '01234', 'kevin2@email', 'indonesia', 'pelanggan'),
(7, 'kevin', 'kevin', 'kevin', '01234', 'kevin@email', 'indonesia', 'pelanggan'),
(8, 'athar', 'athar', 'athar123', '01234', 'athar@email', 'indonesia', 'pelanggan'),
(9, '', '', '', '01234', '@email', 'indonesia', 'pelanggan');

-- --------------------------------------------------------

--
-- Table structure for table `t_cart`
--

CREATE TABLE `t_cart` (
  `id_cart` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `jml` int(11) NOT NULL,
  `id_admin` int(11) NOT NULL,
  `size` varchar(10) NOT NULL DEFAULT 'kids'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `t_cart`
--

INSERT INTO `t_cart` (`id_cart`, `id_product`, `jml`, `id_admin`, `size`) VALUES
(42, 14, 1, 9, 'adult');

-- --------------------------------------------------------

--
-- Table structure for table `t_category`
--

CREATE TABLE `t_category` (
  `id_category` int(11) NOT NULL,
  `category_name` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `t_category`
--

INSERT INTO `t_category` (`id_category`, `category_name`) VALUES
(1, 'topi'),
(2, 'topi bertelinga');

-- --------------------------------------------------------

--
-- Table structure for table `t_checkout`
--

CREATE TABLE `t_checkout` (
  `id_checkout` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `jml` int(11) NOT NULL,
  `id_admin` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `proof` varchar(50) NOT NULL,
  `validation` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `t_checkout`
--

INSERT INTO `t_checkout` (`id_checkout`, `id_product`, `jml`, `id_admin`, `total`, `proof`, `validation`, `status`, `date`) VALUES
(13, 20, 1, 2, 382000, 'tf1747986205.png', 'Menunggu', 'Batal', '2025-05-23'),
(14, 14, 1, 2, 729000, 'tf1747986255.png', 'Menunggu', 'Batal', '2025-05-23'),
(15, 14, 1, 2, 729000, 'tf1747986301.png', 'Menunggu', 'Batal', '2025-05-23'),
(16, 21, 1, 1, 283000, 'tf1748001451.png', 'Valid', 'Selesai', '2025-05-23'),
(17, 13, 4, 2, 1836000, 'tf1748081462.png', 'Valid', 'Selesai', '2025-05-24'),
(18, 14, 1, 2, 729000, 'tf1748082412.png', 'Menunggu', 'Batal', '2025-05-24'),
(19, 21, 4, 2, 1132000, 'tf1748089140.png', 'Menunggu', 'Batal', '2025-05-24'),
(20, 23, 6, 2, 3138000, 'tf1748215070.png', 'Tidak Valid', 'Batal', '2025-05-26'),
(21, 14, 2, 9, 1458000, 'tf1748228162.png', 'Menunggu', 'Batal', '2025-05-26'),
(22, 23, 4, 9, 2092000, 'tf1748228319.png', 'Menunggu', 'Batal', '2025-05-26'),
(23, 14, 1, 9, 729000, 'tf1748274641.png', 'Valid', 'Selesai', '2025-05-26'),
(24, 15, 1, 9, 1150000, 'tf1748274641.png', 'Valid', 'Selesai', '2025-05-26'),
(25, 24, 2, 9, 708000, 'tf1748275313.png', 'Menunggu', 'Batal', '2025-05-26'),
(26, 15, 3, 9, 3450000, 'tf1748275988.png', 'Menunggu', 'Batal', '2025-05-26'),
(27, 13, 3, 9, 1377000, 'tf1748303882.png', 'Menunggu', 'Batal', '2025-05-27'),
(28, 15, 4, 9, 4600000, 'tf1748305822.png', 'Menunggu', 'Batal', '2025-05-27'),
(29, 14, 2, 7, 1458000, 'tf1748308618.PNG', 'Valid', 'Selesai', '2025-05-27'),
(30, 15, 2, 7, 2300000, 'tf1748308944.png', 'Valid', 'Selesai', '2025-05-27');

-- --------------------------------------------------------

--
-- Table structure for table `t_checkout_temp`
--

CREATE TABLE `t_checkout_temp` (
  `id_cart` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `jml` int(11) NOT NULL,
  `id_admin` int(11) NOT NULL,
  `size` varchar(10) NOT NULL DEFAULT 'kids'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `t_checkout_temp`
--

INSERT INTO `t_checkout_temp` (`id_cart`, `id_product`, `jml`, `id_admin`, `size`) VALUES
(45, 15, 2, 7, 'kids');

-- --------------------------------------------------------

--
-- Table structure for table `t_product`
--

CREATE TABLE `t_product` (
  `id_product` int(11) NOT NULL,
  `id_category` tinyint(4) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_description` text NOT NULL,
  `product_image` varchar(100) NOT NULL,
  `product_status` tinyint(4) NOT NULL,
  `data_created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `product_price` int(11) NOT NULL,
  `product_stock` int(11) NOT NULL,
  `color` varchar(25) NOT NULL DEFAULT 'black'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `t_product`
--

INSERT INTO `t_product` (`id_product`, `id_category`, `product_name`, `product_description`, `product_image`, `product_status`, `data_created`, `product_price`, `product_stock`, `color`) VALUES
(1, 1, 'the skull', 'tofi the skull', 'the-skull.png', 1, '2025-05-21 03:50:49', 550000, 100, 'black'),
(13, 1, 'pocketz', '                        tofi pocketz                        ', 'pocketz.png', 1, '2025-05-26 16:10:48', 459000, 232, 'green'),
(14, 1, 'starly', 'tofi starly', 'starly.png', 1, '2025-05-21 13:03:56', 729000, 100, 'black'),
(15, 1, 'sheels', '                        tofi sheels                        ', 'sheels.png', 1, '2025-05-26 16:10:59', 1150000, 232, 'grey'),
(16, 1, 'FANG-BEN', 'tofi FANG-BEN', 'FANG-BEN.png', 1, '2025-05-21 13:03:56', 769000, 100, 'black'),
(17, 2, 'aers', 'topi aers', 'produk1747981623.png', 1, '2025-05-23 06:27:03', 336000, 100, 'black'),
(18, 1, 'fami', 'topi fami', 'produk1747981779.png', 1, '2025-05-23 06:29:39', 782000, 200, 'black'),
(19, 2, 'flows', 'topi flows', 'produk1747981807.png', 1, '2025-05-23 06:30:07', 484000, 100, 'black'),
(20, 2, 'froggy', '                        topi froggy                        ', 'produk1747981885.png', 1, '2025-05-26 16:10:34', 382000, 123, 'red'),
(21, 2, 'hoopzi', 'topi hoopzi', 'produk1747981915.png', 1, '2025-05-23 06:31:55', 283000, 100, 'black'),
(22, 2, 'skitt', 'topi skitt', 'produk1747981943.png', 1, '2025-05-23 06:32:23', 483000, 100, 'black'),
(23, 2, 'sonic', '                        topi sonic                        ', 'produk1747981984.png', 1, '2025-05-26 16:10:23', 523000, 232, 'blue'),
(24, 2, 'u-r', '                        topi ur                        ', 'produk1747982013.png', 1, '2025-05-26 16:09:43', 354000, 2323232, 'red'),
(25, 1, 'valentine', '                        topi valentine                        ', 'produk1747982046.png', 1, '2025-05-26 16:10:15', 192000, 121212, 'pink'),
(26, 2, 'benniez', 'tofi benniez', 'produk1748306932.PNG', 1, '2025-05-27 00:48:52', 535000, 343, 'white');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `t_admin`
--
ALTER TABLE `t_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `t_cart`
--
ALTER TABLE `t_cart`
  ADD PRIMARY KEY (`id_cart`);

--
-- Indexes for table `t_category`
--
ALTER TABLE `t_category`
  ADD PRIMARY KEY (`id_category`);

--
-- Indexes for table `t_checkout`
--
ALTER TABLE `t_checkout`
  ADD PRIMARY KEY (`id_checkout`);

--
-- Indexes for table `t_checkout_temp`
--
ALTER TABLE `t_checkout_temp`
  ADD PRIMARY KEY (`id_cart`);

--
-- Indexes for table `t_product`
--
ALTER TABLE `t_product`
  ADD PRIMARY KEY (`id_product`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `t_admin`
--
ALTER TABLE `t_admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `t_cart`
--
ALTER TABLE `t_cart`
  MODIFY `id_cart` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `t_category`
--
ALTER TABLE `t_category`
  MODIFY `id_category` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `t_checkout`
--
ALTER TABLE `t_checkout`
  MODIFY `id_checkout` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `t_checkout_temp`
--
ALTER TABLE `t_checkout_temp`
  MODIFY `id_cart` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `t_product`
--
ALTER TABLE `t_product`
  MODIFY `id_product` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
