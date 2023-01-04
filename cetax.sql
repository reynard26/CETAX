-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 31, 2022 at 05:06 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cetax`
--

-- --------------------------------------------------------

--
-- Table structure for table `payment_method`
--

CREATE TABLE `payment_method` (
  `id_paymentMethod` int(11) NOT NULL,
  `payment_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment_method`
--

INSERT INTO `payment_method` (`id_paymentMethod`, `payment_name`) VALUES
(1, 'Gopay'),
(2, 'Shopeepay'),
(3, 'Ovo'),
(4, 'Debit/Credit Card');

-- --------------------------------------------------------

--
-- Table structure for table `portfolio_category`
--

CREATE TABLE `portfolio_category` (
  `id_portfolioCategory` int(11) NOT NULL,
  `category_portfolio` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `portfolio_category`
--

INSERT INTO `portfolio_category` (`id_portfolioCategory`, `category_portfolio`) VALUES
(1, 'Magazine'),
(2, 'Clothing'),
(3, 'Automobile');

-- --------------------------------------------------------

--
-- Table structure for table `product_category`
--

CREATE TABLE `product_category` (
  `id_productCategory` int(11) NOT NULL,
  `category_product` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_category`
--

INSERT INTO `product_category` (`id_productCategory`, `category_product`) VALUES
(1, 'T-Shirt'),
(2, 'Mug'),
(3, 'Tote Bag'),
(4, 'Mini Sticker');

-- --------------------------------------------------------

--
-- Table structure for table `table_customer`
--

CREATE TABLE `table_customer` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(70) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `no_telp` varchar(20) NOT NULL,
  `address` varchar(100) NOT NULL,
  `role` varchar(30) NOT NULL,
  `postalcode` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `table_customer`
--

INSERT INTO `table_customer` (`id`, `username`, `email`, `password`, `first_name`, `last_name`, `no_telp`, `address`, `role`, `postalcode`) VALUES
(1, 'admin', 'admin@gmail.com', '$2a$12$m1eoBQL3QDWEczrNUixDIeDTTMTY/28..QU//GtLiajCVkATye3Sq', 'admin1', 'admin', '123456789', 'Anywhere', 'admin', ''),
(7, 'rey', 'reynardthanhandoko@gmail.com', '$2y$10$TfqlvoC/wP7FW8Kt14F/0.57dd0jMDCPbDWehx77Pcv24BixbAcl.', 'Reynardthan', 'Handoko', '081283786164', 'Jl Imam Bonjol Gang Vihara 3 no.12', 'user', '15113');

-- --------------------------------------------------------

--
-- Table structure for table `table_order`
--

CREATE TABLE `table_order` (
  `id_order` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `id_customer` int(11) NOT NULL,
  `size` varchar(20) NOT NULL,
  `quantity` int(5) NOT NULL,
  `material` varchar(40) NOT NULL,
  `shipping` varchar(40) NOT NULL,
  `total_price` int(20) NOT NULL,
  `id_paymentMethod` int(11) NOT NULL,
  `Date` date NOT NULL,
  `order_photo` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `table_portfolio`
--

CREATE TABLE `table_portfolio` (
  `id_portfolio` int(11) NOT NULL,
  `id_portfolioCategory` int(11) NOT NULL,
  `portfolio_name` varchar(40) NOT NULL,
  `portfolio_photo` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `table_portfolio`
--

INSERT INTO `table_portfolio` (`id_portfolio`, `id_portfolioCategory`, `portfolio_name`, `portfolio_photo`) VALUES
(1, 1, 'Vogue Batch 1', 'uploads/vogue1.jpeg'),
(2, 1, 'Vogue Batch 2', 'images/vogue2.jpg'),
(3, 1, 'Vogue Batch 3', 'images/vogue3.jpg'),
(4, 2, 'Shirt H&M Batch 1', 'images/baju1.png'),
(5, 2, 'Shirt H&M Batch 2', 'images/baju2.png'),
(6, 2, 'Shirt H&M Batch 3', 'images/baju3.png'),
(7, 3, 'Automobile Batch 1', 'images/compm1.png'),
(8, 3, 'Automobile Batch 2', 'images/compm2.png'),
(9, 3, 'Automobile Batch 3', 'images/compm3.png');

-- --------------------------------------------------------

--
-- Table structure for table `table_product`
--

CREATE TABLE `table_product` (
  `id_product` int(11) NOT NULL,
  `id_productCategory` int(11) NOT NULL,
  `product_name` varchar(40) NOT NULL,
  `product_photo` varchar(500) NOT NULL,
  `price` int(20) NOT NULL,
  `stock_qty` int(8) NOT NULL,
  `Description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `table_product`
--

INSERT INTO `table_product` (`id_product`, `id_productCategory`, `product_name`, `product_photo`, `price`, `stock_qty`, `Description`) VALUES
(4, 1, 'Sunny Side Up T-Shirt', 'uploads/shirt1.png', 100000, 15, 'T-Shirt bergambarkan telur mata sapi yang dapat dilakukan customize sesuai dengan permintaan pelanggan'),
(5, 1, 'Santa Monica', 'uploads/comp3.png', 120000, 3, 'Tshirt dengan bahan yang dapat dipilih dan desain yang dapat dikustomisasi sesuai preferensi anda'),
(6, 1, 'Bathing Ape', 'uploads/shirt22.png', 2000000, 2, 'T-Shirt dengan logo iconic bathing ape, dengan bahan yang dapat dipilih sesuai permintaan. Serta dapat di customize sesuai permintaan'),
(7, 1, 'Minnie Mouse T-Shirt', 'uploads/baju3.png', 140000, 7, 'Tshirt dengan bahan yang dapat dipilih dan desain yang dapat dikustomisasi sesuai preferensi anda'),
(8, 4, 'Mini Sticker', 'uploads/sticker1.png', 20000, 20, 'Mini Sticker dengan berbagai motif makanan jepang yang lucu dan mungil.'),
(9, 4, 'Deco Sticker', 'uploads/sticker2.png', 30000, 10, 'Deco Sticker dengan berbagai jenis kucing yang lucu-lucu'),
(10, 2, 'Moodboard Mug', 'uploads/mug2.png', 60000, 9, 'Mug dengan printing moodboard pinterest yang aesthetic dan trendy'),
(11, 2, 'Mug Custom', 'uploads/mug3.png', 50000, 12, 'Mug dengan gambar yang dapat dicustom sesuai dengan preferensi dan keinginan pelanggan'),
(12, 3, 'Aesthetic Tote Bag', 'uploads/images24.png', 120000, 23, 'Tote Bag dengan motif aesthetic yang sangat kekinian, warna yang kalem, dan muat banyak barang'),
(13, 3, 'Quotes Tote Bag', 'uploads/images27.png', 100000, 12, 'Tote Bag dengan motif quotes yang dapat di custom kata-katanya sesuai preferensi dan keinginan pelanggan');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `payment_method`
--
ALTER TABLE `payment_method`
  ADD PRIMARY KEY (`id_paymentMethod`);

--
-- Indexes for table `portfolio_category`
--
ALTER TABLE `portfolio_category`
  ADD PRIMARY KEY (`id_portfolioCategory`);

--
-- Indexes for table `product_category`
--
ALTER TABLE `product_category`
  ADD PRIMARY KEY (`id_productCategory`);

--
-- Indexes for table `table_customer`
--
ALTER TABLE `table_customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `table_order`
--
ALTER TABLE `table_order`
  ADD PRIMARY KEY (`id_order`),
  ADD KEY `id_product` (`id_product`),
  ADD KEY `id_customer` (`id_customer`),
  ADD KEY `id_paymentMethod` (`id_paymentMethod`);

--
-- Indexes for table `table_portfolio`
--
ALTER TABLE `table_portfolio`
  ADD PRIMARY KEY (`id_portfolio`),
  ADD KEY `id_portfolioCategory` (`id_portfolioCategory`);

--
-- Indexes for table `table_product`
--
ALTER TABLE `table_product`
  ADD PRIMARY KEY (`id_product`),
  ADD KEY `id_productCategory` (`id_productCategory`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `payment_method`
--
ALTER TABLE `payment_method`
  MODIFY `id_paymentMethod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `portfolio_category`
--
ALTER TABLE `portfolio_category`
  MODIFY `id_portfolioCategory` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `product_category`
--
ALTER TABLE `product_category`
  MODIFY `id_productCategory` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `table_customer`
--
ALTER TABLE `table_customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `table_order`
--
ALTER TABLE `table_order`
  MODIFY `id_order` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `table_portfolio`
--
ALTER TABLE `table_portfolio`
  MODIFY `id_portfolio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `table_product`
--
ALTER TABLE `table_product`
  MODIFY `id_product` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `table_order`
--
ALTER TABLE `table_order`
  ADD CONSTRAINT `table_order_ibfk_1` FOREIGN KEY (`id_product`) REFERENCES `table_product` (`id_product`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `table_order_ibfk_2` FOREIGN KEY (`id_customer`) REFERENCES `table_customer` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `table_order_ibfk_3` FOREIGN KEY (`id_paymentMethod`) REFERENCES `payment_method` (`id_paymentMethod`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `table_portfolio`
--
ALTER TABLE `table_portfolio`
  ADD CONSTRAINT `table_portfolio_ibfk_1` FOREIGN KEY (`id_portfolioCategory`) REFERENCES `portfolio_category` (`id_portfolioCategory`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `table_product`
--
ALTER TABLE `table_product`
  ADD CONSTRAINT `table_product_ibfk_1` FOREIGN KEY (`id_productCategory`) REFERENCES `product_category` (`id_productCategory`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
