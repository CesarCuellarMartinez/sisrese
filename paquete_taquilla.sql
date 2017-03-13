-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 13, 2017 at 01:17 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sisrese`
--

-- --------------------------------------------------------

--
-- Table structure for table `paquete_taquilla`
--

CREATE TABLE `paquete_taquilla` (
  `id` int(11) NOT NULL,
  `id_taquilla` int(11) NOT NULL,
  `id_paquete` int(11) NOT NULL,
  `prec` double NOT NULL,
  `desc` double NOT NULL,
  `cant` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `paquete_taquilla`
--

INSERT INTO `paquete_taquilla` (`id`, `id_taquilla`, `id_paquete`, `prec`, `desc`, `cant`, `created_at`, `updated_at`) VALUES
(1, 3, 1, 30, 0, 10, '2017-03-13 05:51:36', '2017-03-13 05:51:36');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `paquete_taquilla`
--
ALTER TABLE `paquete_taquilla`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_taquilla` (`id_taquilla`),
  ADD KEY `prec` (`prec`),
  ADD KEY `id_paquete` (`id_paquete`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `paquete_taquilla`
--
ALTER TABLE `paquete_taquilla`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `paquete_taquilla`
--
ALTER TABLE `paquete_taquilla`
  ADD CONSTRAINT `paquete_taquilla_ibfk_1` FOREIGN KEY (`id_taquilla`) REFERENCES `taquilla` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `paquete_taquilla_ibfk_2` FOREIGN KEY (`id_paquete`) REFERENCES `paquete` (`id`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
