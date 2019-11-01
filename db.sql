-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 01, 2019 at 08:59 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `icutap`
--
CREATE DATABASE IF NOT EXISTS `icutap` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `icutap`;

-- --------------------------------------------------------

--
-- Table structure for table `details`
--

DROP TABLE IF EXISTS `details`;
CREATE TABLE IF NOT EXISTS `details` (
  `id` int(11) NOT NULL,
  `hos_name` text NOT NULL,
  `address` text NOT NULL,
  `longitude` double NOT NULL,
  `latitude` double NOT NULL,
  `beds` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `details`
--

INSERT INTO `details` (`id`, `hos_name`, `address`, `longitude`, `latitude`, `beds`) VALUES
(1, 'مستشفى دار الفؤاد', 'محور 26 يوليو، المنطقة السياحية،، اول 6 أكتوبر، الجيزة 12568', 30.967297, 29.997584, 70),
(2, 'مركز تبارك للأطفال', '161 Ain shams st.، عين شمس الشرقية، عين شمس، محافظة القاهرة‬', 31.320492, 30.127969, 9),
(3, 'مستشفى القاهرة الجديدة', 'ثالث القاهرة الجديدة، محافظة القاهرة‬', 31.436743, 29.983926, 12);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL,
  `user` text NOT NULL,
  `password` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user`, `password`) VALUES
(1, 'darelfoaad', '03982c043b54d09e3764ef11ec68b9b06bd7f26b'),
(2, 'tabarak', '6d0b600f1d074e1eaed5a2d1aba19240a9315f7e'),
(3, 'newcairo', 'bdcb178981e2779c99ca07632c18ba016b9f023d');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
