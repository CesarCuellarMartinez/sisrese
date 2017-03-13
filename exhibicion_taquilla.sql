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
-- Table structure for table `exhibicion_taquilla`
--

CREATE TABLE `exhibicion_taquilla` (
  `id` int(11) NOT NULL,
  `id_taquilla` int(11) NOT NULL,
  `id_exhibicion` int(11) NOT NULL,
  `prec` double NOT NULL,
  `cant` int(11) NOT NULL,
  `desc` double NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `exhibicion_taquilla`
--

INSERT INTO `exhibicion_taquilla` (`id`, `id_taquilla`, `id_exhibicion`, `prec`, `cant`, `desc`, `updated_at`, `created_at`) VALUES
(5, 3, 1, 1, 1, 10, '2017-03-13 05:51:36', '2017-03-13 05:51:36'),
(6, 3, 2, 5.75, 3, 50, '2017-03-13 05:51:36', '2017-03-13 05:51:36');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `exhibicion_taquilla`
--
ALTER TABLE `exhibicion_taquilla`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_taquilla` (`id_taquilla`),
  ADD KEY `id_exhibicion` (`id_exhibicion`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `exhibicion_taquilla`
--
ALTER TABLE `exhibicion_taquilla`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `exhibicion_taquilla`
--
ALTER TABLE `exhibicion_taquilla`
  ADD CONSTRAINT `exhibicion_taquilla_ibfk_1` FOREIGN KEY (`id_taquilla`) REFERENCES `taquilla` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `exhibicion_taquilla_ibfk_2` FOREIGN KEY (`id_exhibicion`) REFERENCES `exhibiciones` (`id`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
