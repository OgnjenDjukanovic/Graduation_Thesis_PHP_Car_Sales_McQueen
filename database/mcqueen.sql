-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 21, 2024 at 02:27 PM
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
-- Database: `mcqueen`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adm_id` int(222) NOT NULL,
  `username` varchar(222) NOT NULL,
  `password` varchar(222) NOT NULL,
  `email` varchar(222) NOT NULL,
  `code` varchar(222) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adm_id`, `username`, `password`, `email`, `code`, `date`) VALUES
(10, 'OgnjenDj', '21232f297a57a5a743894a0e4a801fc3', 'ognjen@gmail.com', 'QSTE52', '2024-09-02 18:04:44'),
(11, 'Moderator', '0408f3c997f309c03b08bf3a4bc7b730', 'moderator@gmail.com', 'QMTZ2J', '2024-10-03 13:44:05');

-- --------------------------------------------------------

--
-- Table structure for table `admin_codes`
--

CREATE TABLE `admin_codes` (
  `id` int(222) NOT NULL,
  `codes` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admin_codes`
--

INSERT INTO `admin_codes` (`id`, `codes`) VALUES
(1, 'QX5ZMN'),
(2, 'QFE6ZM'),
(3, 'QMZR92'),
(4, 'QPGIOV'),
(5, 'QSTE52'),
(6, 'QMTZ2J');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `d_id` int(222) NOT NULL,
  `rs_id` int(222) NOT NULL,
  `title` varchar(222) NOT NULL,
  `slogan` varchar(222) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `img` varchar(222) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`d_id`, `rs_id`, `title`, `slogan`, `price`, `img`) VALUES
(27, 59, 'BMW Serija 3 320i', 'Limuzina / 190 KS / 2000cm3 / Benzin / 2008', 11000.00, '66febb4e3ef26.jpg'),
(28, 59, 'BMW Serija 5 520d', 'Limuzina / 210 KS / 2000cm3 / Dizel / 2017', 16700.00, '66febba1bd669.jpg'),
(29, 61, 'Mercedes-Benz C Klasa C220d', 'Limuzina / 150 KS / 1500cm3 / Dizel / 2016', 11850.00, '66febc276d459.jpg'),
(30, 61, 'Mercedes-Benz A Klasa A180', 'Hecbek / 122 KS / 1598cm3 / Benzin / 2012', 10000.00, '66febd55ed942.jpg'),
(31, 60, 'Audi A3', 'Hecbek / 120 KS / 1798cm3 / Benzin / 2012', 14100.00, '66febd3977f78.jpg'),
(32, 60, 'Audi A5', 'Kupe / 240 KS / 2000cm3 / Dizel / 2010', 14650.00, '66febd0359900.jpg'),
(33, 62, 'Volkswagen Golf 7 GTI', 'Hecbek / 180 KS / 1984cm3 / Benzin / 2018', 24779.00, '6707d344a94c6.jpg'),
(34, 62, 'Volkswagen Passat B8', 'Limuzina / 150 KS / 1968cm3 / Dizel / 2016', 15790.00, '6707d39d895be.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `car_bonds`
--

CREATE TABLE `car_bonds` (
  `rs_id` int(222) NOT NULL,
  `c_id` int(222) NOT NULL,
  `title` varchar(222) NOT NULL,
  `email` varchar(222) NOT NULL,
  `phone` varchar(222) NOT NULL,
  `url` varchar(222) NOT NULL,
  `o_hr` varchar(222) NOT NULL,
  `c_hr` varchar(222) NOT NULL,
  `o_days` varchar(222) NOT NULL,
  `address` text NOT NULL,
  `image` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `car_bonds`
--

INSERT INTO `car_bonds` (`rs_id`, `c_id`, `title`, `email`, `phone`, `url`, `o_hr`, `c_hr`, `o_days`, `address`, `image`, `date`) VALUES
(59, 13, 'BMW International', 'bmwinternational@gmail.com', '+3816012345', 'www.bmwinternational.com', '08:00', '22:00', '24x7', 'Otokara Keršovanija 9', '66fea2f770f7f.png', '2024-10-03 13:58:15'),
(60, 14, 'Audi Motors', 'audimotors@gmail.com', '+3816212345', 'www.audimotors.com', '10:00', '22:00', 'pon-pet', 'Južni Bulevar 13', '66fea3a0d05a5.jpg', '2024-10-03 14:01:04'),
(61, 12, 'Mercedes-Benz Style', 'mercedesbenzstyle@gmail.com', '+3816312345', 'www.mercedesbenzstyle.com', '10:00', '22:00', 'pon-sub', 'Vitanovacka 5   ', '66feba5b71ff3.png', '2024-10-03 15:38:03'),
(62, 15, 'Volkswagen Delta', 'volkswagendelta@gmail.com', '+3816412345', 'www.volkswagendelta.com', '08:00', '22:00', '24x7', 'Makenzijeva 25', '6707d201e67c1.jpg', '2024-10-10 13:09:21');

-- --------------------------------------------------------

--
-- Table structure for table `remark`
--

CREATE TABLE `remark` (
  `id` int(11) NOT NULL,
  `frm_id` int(11) NOT NULL,
  `status` varchar(255) NOT NULL,
  `remark` mediumtext NOT NULL,
  `remarkDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `remark`
--

INSERT INTO `remark` (`id`, `frm_id`, `status`, `remark`, `remarkDate`) VALUES
(71, 39, 'closed', 'Poštovani, Vaš automobil je uspešno dostavljen na adresu.', '2024-10-13 20:12:57'),
(72, 40, 'rejected', 'Poštovani, traženi model nemamo trenutno na stanju!', '2024-10-13 20:17:26'),
(73, 41, 'closed', 'Uspešno isporuceno!', '2024-10-19 13:18:43'),
(74, 42, 'rejected', 'asdasd', '2024-10-19 13:24:13'),
(76, 43, 'closed', 'Isporuceno', '2024-10-21 12:02:01'),
(77, 44, 'rejected', 'Nemamo automobil na stanju', '2024-10-21 12:08:33');

-- --------------------------------------------------------

--
-- Table structure for table `res_category`
--

CREATE TABLE `res_category` (
  `c_id` int(222) NOT NULL,
  `c_name` varchar(222) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `res_category`
--

INSERT INTO `res_category` (`c_id`, `c_name`, `date`) VALUES
(12, 'Mercedes-Benz', '2024-10-03 13:55:28'),
(13, 'BMW', '2024-10-03 13:55:36'),
(14, 'Audi', '2024-10-03 13:55:40'),
(15, 'Volkswagen', '2024-10-10 13:05:46');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `u_id` int(222) NOT NULL,
  `username` varchar(222) NOT NULL,
  `f_name` varchar(222) NOT NULL,
  `l_name` varchar(222) NOT NULL,
  `email` varchar(222) NOT NULL,
  `phone` varchar(222) NOT NULL,
  `password` varchar(222) NOT NULL,
  `address` text NOT NULL,
  `status` int(222) NOT NULL DEFAULT 1,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`u_id`, `username`, `f_name`, `l_name`, `email`, `phone`, `password`, `address`, `status`, `date`) VALUES
(36, 'PeraPeric', 'Pera', 'Peric', 'peraperic@gmail.com', '+3816012345', 'a64c8a30b790db028d8d9e22564197ff', 'Miroljubova 23', 1, '2024-10-01 16:41:56'),
(37, 'AnaAnic', 'Ana', 'Anic', 'ana.anic@gmail.com', '+3816112345', 'd1659f8a4945d81e506e5fee09867042', 'Tosin Bunar 5', 1, '2024-10-19 13:13:18');

-- --------------------------------------------------------

--
-- Table structure for table `users_orders`
--

CREATE TABLE `users_orders` (
  `o_id` int(222) NOT NULL,
  `u_id` int(222) NOT NULL,
  `title` varchar(222) NOT NULL,
  `quantity` int(222) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `status` varchar(222) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users_orders`
--

INSERT INTO `users_orders` (`o_id`, `u_id`, `title`, `quantity`, `price`, `status`, `date`) VALUES
(39, 36, 'Volkswagen Golf 7 GTI', 1, 24779.00, 'closed', '2024-10-13 20:12:57'),
(40, 36, 'Audi A3', 1, 14100.00, 'rejected', '2024-10-13 20:17:26'),
(42, 37, 'Volkswagen Golf 7 GTI', 1, 24779.00, 'rejected', '2024-10-19 13:24:13'),
(43, 37, 'Mercedes-Benz C Klasa C220d', 1, 11850.00, 'closed', '2024-10-21 12:02:01'),
(44, 37, 'Audi A5', 1, 14650.00, 'rejected', '2024-10-21 12:08:33');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adm_id`);

--
-- Indexes for table `admin_codes`
--
ALTER TABLE `admin_codes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`d_id`);

--
-- Indexes for table `car_bonds`
--
ALTER TABLE `car_bonds`
  ADD PRIMARY KEY (`rs_id`);

--
-- Indexes for table `remark`
--
ALTER TABLE `remark`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `res_category`
--
ALTER TABLE `res_category`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`u_id`);

--
-- Indexes for table `users_orders`
--
ALTER TABLE `users_orders`
  ADD PRIMARY KEY (`o_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `adm_id` int(222) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `admin_codes`
--
ALTER TABLE `admin_codes`
  MODIFY `id` int(222) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `d_id` int(222) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `car_bonds`
--
ALTER TABLE `car_bonds`
  MODIFY `rs_id` int(222) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `remark`
--
ALTER TABLE `remark`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `res_category`
--
ALTER TABLE `res_category`
  MODIFY `c_id` int(222) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `u_id` int(222) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `users_orders`
--
ALTER TABLE `users_orders`
  MODIFY `o_id` int(222) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
