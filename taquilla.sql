-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 13, 2017 at 01:16 AM
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
-- Table structure for table `taquilla`
--

CREATE TABLE `taquilla` (
  `id` int(11) NOT NULL,
  `id_reserva` int(11) NOT NULL,
  `fech` date NOT NULL,
  `come` varchar(400) COLLATE utf8_unicode_ci NOT NULL,
  `id_usua` int(11) NOT NULL,
  `cant_adul` int(11) NOT NULL,
  `cant_prof` int(11) NOT NULL,
  `cant_nino` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `prec_adul` double NOT NULL,
  `prec_nino` double NOT NULL,
  `prec_prof` double NOT NULL,
  `tota` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `taquilla`
--

INSERT INTO `taquilla` (`id`, `id_reserva`, `fech`, `come`, `id_usua`, `cant_adul`, `cant_prof`, `cant_nino`, `updated_at`, `created_at`, `prec_adul`, `prec_nino`, `prec_prof`, `tota`) VALUES
(3, 21, '2017-03-12', 'No lo se', 1, 10, 10, 10, '2017-03-13 05:51:36', '2017-03-13 05:51:36', 1, 1, 1, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `taquilla`
--
ALTER TABLE `taquilla`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_reserva` (`id_reserva`),
  ADD KEY `id_usua` (`id_usua`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `taquilla`
--
ALTER TABLE `taquilla`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `taquilla`
--
ALTER TABLE `taquilla`
  ADD CONSTRAINT `taquilla_ibfk_1` FOREIGN KEY (`id_reserva`) REFERENCES `reservas` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `taquilla_ibfk_2` FOREIGN KEY (`id_usua`) REFERENCES `users` (`id`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
