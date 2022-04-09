-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 09, 2022 at 10:09 PM
-- Server version: 10.3.29-MariaDB
-- PHP Version: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(10) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `content`, `price`, `image`, `user_id`, `status`, `created_at`) VALUES
(39, 'iPhone 13', '100% quality best , i am going to sell this becouse i need some money for need', '$123', 'uploaded_image/61716f84fee39f0018fa9d8d.png', 58, 2, '2021-11-05'),
(40, 'Mini car', 'made in china , it is the best', '$50', 'uploaded_image/image.jpg', 58, 2, '2021-11-05'),
(41, 'Redmi note 8 123', 'made in USA', '$200', 'uploaded_image/672z311_shutterstock_297874640.jpg', 58, 2, '2021-11-07'),
(42, 'R.a.m.z.i.d.d.i.n.(blog)', '100% quality best', '$', 'uploaded_image/Festivals-in-Britain — копия.jpg', 62, 2, '2021-11-15'),
(43, 'Eymona', '100% quality best 123fdssafasfsss', '123', 'uploaded_image/2(298).jpg', 57, 1, '2021-11-15');

-- --------------------------------------------------------

--
-- Table structure for table `signup`
--

CREATE TABLE `signup` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `surname` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `signup`
--

INSERT INTO `signup` (`id`, `name`, `surname`, `email`, `password`, `phone`, `created_at`) VALUES
(56, 'Ramziddin', 'Rustamov', 'rustamovramziddin7@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '99897713909', '2021-11-04 '),
(57, 'Jonibek', 'Sobirov', 'Sobirov@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '99897713909', '2021-11-04 '),
(58, 'mirsaid', 'Husanov', 'husanov@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '99897713909', '2021-11-04 '),
(59, 'R.a.m.z.i.d.d.i.n.(blog)', 'Rustamovv', 'qurbonov@gmail.com', 'fcea920f7412b5da7be0cf42b8c93759', '99897713909', '2021-11-05 '),
(61, 'Ram', 'Husanov', 'rustamovramziddin77@gmail.com', '6512bd43d9caa6e02c990b0a82652dca', '99897713909', '2021-11-07 '),
(62, 'Toyir', 'Musurmonov', 'musurmonov@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '998989876', '2021-11-15 ');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `signup`
--
ALTER TABLE `signup`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `signup`
--
ALTER TABLE `signup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
