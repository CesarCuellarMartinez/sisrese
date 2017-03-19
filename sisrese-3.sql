-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 14, 2017 at 03:59 AM
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
-- Table structure for table `datos`
--

CREATE TABLE `datos` (
  `id` int(11) NOT NULL,
  `bus_pers` int(11) NOT NULL,
  `guia_pers` int(11) NOT NULL,
  `iva` double NOT NULL,
  `nomb_siti` varchar(400) COLLATE utf8_unicode_ci NOT NULL,
  `prec_adul` double NOT NULL,
  `prec_nino` double NOT NULL,
  `prec_prof` double NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `edecanes`
--

CREATE TABLE `edecanes` (
  `id` int(11) NOT NULL,
  `id_reserva` int(11) NOT NULL,
  `fech` date NOT NULL,
  `come` varchar(400) COLLATE utf8_unicode_ci NOT NULL,
  `id_usua` int(11) NOT NULL,
  `cant_adul` int(11) NOT NULL,
  `cant_prof` int(11) NOT NULL,
  `cant_nino` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `edecanes`
--

INSERT INTO `edecanes` (`id`, `id_reserva`, `fech`, `come`, `id_usua`, `cant_adul`, `cant_prof`, `cant_nino`, `updated_at`, `created_at`) VALUES
(1, 13, '2017-01-25', 'sdasd', 1, 1, 1, 1, '2017-01-26 04:02:02', '2017-01-26 04:02:02');

-- --------------------------------------------------------

--
-- Table structure for table `espacios`
--

CREATE TABLE `espacios` (
  `id` int(11) NOT NULL,
  `nomb` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `desc` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `capa` int(11) NOT NULL,
  `condicion` tinyint(1) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `espacios`
--

INSERT INTO `espacios` (`id`, `nomb`, `desc`, `capa`, `condicion`, `updated_at`, `created_at`) VALUES
(1, 'Comedor 1', 'Cerca de recepcion y entrada', 70, 1, '2016-11-23 07:06:20', '2016-11-23 07:03:41'),
(2, 'Comedor Secundario', 'Cerca de la salida', 25, 1, '2016-11-23 07:06:26', '2016-11-23 07:04:48'),
(3, 'Patio 2', 'Juegos 2', 50, 1, '2016-11-23 22:24:16', '2016-11-23 22:24:04');

-- --------------------------------------------------------

--
-- Table structure for table `espacio_edecan`
--

CREATE TABLE `espacio_edecan` (
  `id_espacio` int(11) NOT NULL,
  `id_edecan` int(11) NOT NULL,
  `cant` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `espacio_edecan`
--

INSERT INTO `espacio_edecan` (`id_espacio`, `id_edecan`, `cant`, `updated_at`, `created_at`, `id`) VALUES
(1, 1, 89, '2017-01-26 04:02:02', '2017-01-26 04:02:02', 1);

-- --------------------------------------------------------

--
-- Table structure for table `espacio_reserva`
--

CREATE TABLE `espacio_reserva` (
  `id` int(11) NOT NULL,
  `id_espacio` int(11) NOT NULL,
  `id_reserva` int(11) NOT NULL,
  `cant` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `espacio_reserva`
--

INSERT INTO `espacio_reserva` (`id`, `id_espacio`, `id_reserva`, `cant`, `updated_at`, `created_at`) VALUES
(4, 1, 13, 20, '2017-01-07 10:16:11', '2017-01-07 10:16:11'),
(6, 1, 22, 10, '2017-01-19 06:49:43', '2017-01-19 06:49:43'),
(7, 2, 23, 9, '2017-01-27 09:34:08', '2017-01-27 09:34:08');

-- --------------------------------------------------------

--
-- Table structure for table `exhibiciones`
--

CREATE TABLE `exhibiciones` (
  `id` int(11) NOT NULL,
  `capa` int(11) NOT NULL,
  `desc` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `condicion` tinyint(1) NOT NULL,
  `nomb` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `prec` double NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `exhibiciones`
--

INSERT INTO `exhibiciones` (`id`, `capa`, `desc`, `condicion`, `nomb`, `prec`, `updated_at`, `created_at`) VALUES
(1, 6, 'loncho bolo', 1, 'Looncho en el ba', 1, '2016-11-25 06:32:46', '2016-11-25 06:30:19'),
(2, 2, 'b', 1, 'pelos', 5.75, '2017-01-20 08:49:24', '2016-11-25 06:33:19');

-- --------------------------------------------------------

--
-- Table structure for table `exhibicion_edecan`
--

CREATE TABLE `exhibicion_edecan` (
  `id` int(11) NOT NULL,
  `id_edecan` int(11) NOT NULL,
  `id_exhibicion` int(11) NOT NULL,
  `cant` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `exhibicion_edecan`
--

INSERT INTO `exhibicion_edecan` (`id`, `id_edecan`, `id_exhibicion`, `cant`, `updated_at`, `created_at`) VALUES
(1, 1, 2, 1, '2017-01-26 04:02:02', '2017-01-26 04:02:02');

-- --------------------------------------------------------

--
-- Table structure for table `exhibicion_reserva`
--

CREATE TABLE `exhibicion_reserva` (
  `id` int(11) NOT NULL,
  `id_reserva` int(11) NOT NULL,
  `id_exhibicion` int(11) NOT NULL,
  `prec` double NOT NULL,
  `cant` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `desc` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `exhibicion_reserva`
--

INSERT INTO `exhibicion_reserva` (`id`, `id_reserva`, `id_exhibicion`, `prec`, `cant`, `updated_at`, `created_at`, `desc`) VALUES
(4, 13, 1, 1, 20, '2017-01-07 10:16:11', '2017-01-07 10:16:11', 5),
(5, 13, 2, 5.75, 4, '2017-01-07 10:16:11', '2017-01-07 10:16:11', 0),
(6, 24, 2, 5.75, 9, '2017-01-27 09:35:51', '2017-01-27 09:35:51', 0),
(7, 26, 1, 1, 9, '2017-03-13 01:22:35', '2017-03-13 01:22:35', 0);

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

-- --------------------------------------------------------

--
-- Table structure for table `horarios`
--

CREATE TABLE `horarios` (
  `id` int(11) NOT NULL,
  `desc` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `condicion` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `horarios`
--

INSERT INTO `horarios` (`id`, `desc`, `condicion`, `updated_at`, `created_at`) VALUES
(1, 'Matutino', 1, '2016-12-10 22:04:55', '2016-12-10 22:04:45'),
(2, 'Tarde', 1, '2016-12-10 22:06:07', '2016-12-10 22:06:07');

-- --------------------------------------------------------

--
-- Table structure for table `horas`
--

CREATE TABLE `horas` (
  `id` int(11) NOT NULL,
  `hora_inic` time NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `condicion` tinyint(1) NOT NULL,
  `hora_fina` time NOT NULL,
  `id_horario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `horas`
--

INSERT INTO `horas` (`id`, `hora_inic`, `updated_at`, `created_at`, `condicion`, `hora_fina`, `id_horario`) VALUES
(1, '07:00:00', '2016-12-10 22:10:35', '2016-12-10 22:10:35', 1, '08:00:00', 1),
(2, '08:00:00', '2017-01-05 11:04:17', '2017-01-05 11:04:17', 1, '09:00:00', 1),
(3, '13:00:00', '2017-01-05 11:07:23', '2017-01-05 11:07:23', 1, '14:00:00', 2);

-- --------------------------------------------------------

--
-- Table structure for table `hora_reserva`
--

CREATE TABLE `hora_reserva` (
  `id` int(11) NOT NULL,
  `id_reserva` int(11) NOT NULL,
  `id_hora` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `hora_reserva`
--

INSERT INTO `hora_reserva` (`id`, `id_reserva`, `id_hora`, `updated_at`, `created_at`) VALUES
(17, 13, 1, '2017-01-07 10:16:11', '2017-01-07 10:16:11'),
(18, 13, 2, '2017-01-07 10:16:11', '2017-01-07 10:16:11'),
(19, 14, 1, '2017-01-07 11:37:47', '2017-01-07 11:37:47'),
(20, 15, 1, '2017-01-07 11:38:08', '2017-01-07 11:38:08'),
(21, 16, 1, '2017-01-07 11:50:03', '2017-01-07 11:50:03'),
(22, 17, 1, '2017-01-07 11:51:32', '2017-01-07 11:51:32'),
(23, 18, 1, '2017-01-07 11:53:19', '2017-01-07 11:53:19'),
(24, 19, 1, '2017-01-07 12:02:35', '2017-01-07 12:02:35'),
(25, 20, 1, '2017-01-07 12:07:31', '2017-01-07 12:07:31'),
(26, 20, 2, '2017-01-07 12:07:31', '2017-01-07 12:07:31'),
(27, 22, 1, '2017-01-19 06:49:43', '2017-01-19 06:49:43'),
(28, 23, 1, '2017-01-27 09:34:08', '2017-01-27 09:34:08'),
(29, 24, 1, '2017-01-27 09:35:51', '2017-01-27 09:35:51'),
(30, 25, 2, '2017-01-27 09:36:52', '2017-01-27 09:36:52'),
(31, 26, 1, '2017-03-13 01:22:35', '2017-03-13 01:22:35'),
(32, 26, 2, '2017-03-13 01:22:35', '2017-03-13 01:22:35');

-- --------------------------------------------------------

--
-- Table structure for table `institutos`
--

CREATE TABLE `institutos` (
  `id` int(11) NOT NULL,
  `nomb_inst` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nomb_cont` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tele_inst` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tele_cont` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `corr_inst` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `corr_cont` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `condicion` tinyint(1) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `codi` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `institutos`
--

INSERT INTO `institutos` (`id`, `nomb_inst`, `nomb_cont`, `tele_inst`, `tele_cont`, `corr_inst`, `corr_cont`, `condicion`, `updated_at`, `created_at`, `codi`) VALUES
(1, 'ITR', 'Cesar Cuellar', '22222222', '77777777', 'itr@hotmail.com', 'CC20090203@gmail.com', 1, '2016-11-22 19:13:30', '0000-00-00 00:00:00', ''),
(2, 'sahjashj', 'hashjash', '77777777', '22222222', 'aassa', 'sadasdsa', 1, '2016-11-23 01:14:27', '2016-11-23 01:14:27', ''),
(3, 'Correccion', 'Fredy Martinez', '55555555', '88888888', 'cor@gmail.com', 'pp@hotmail.com', 1, '2016-11-23 04:03:51', '2016-11-23 01:15:42', '');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2016_11_22_015833_create_insitutos_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `paquete`
--

CREATE TABLE `paquete` (
  `id` int(11) NOT NULL,
  `nomb` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `desc` varchar(400) COLLATE utf8_unicode_ci NOT NULL,
  `prec` double NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `numb` int(11) NOT NULL,
  `condicion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `paquete`
--

INSERT INTO `paquete` (`id`, `nomb`, `desc`, `prec`, `updated_at`, `created_at`, `numb`, `condicion`) VALUES
(1, 'Paquete Navideño', 'Solo en navidad casi todos comen pizza', 20, '2016-12-17 03:29:50', '2016-12-17 03:29:31', 15, 1);

-- --------------------------------------------------------

--
-- Table structure for table `paquete_reserva`
--

CREATE TABLE `paquete_reserva` (
  `id` int(11) NOT NULL,
  `id_reserva` int(11) NOT NULL,
  `id_paquete` int(11) NOT NULL,
  `prec` double NOT NULL,
  `desc` double NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` datetime NOT NULL,
  `cant` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `paquete_reserva`
--

INSERT INTO `paquete_reserva` (`id`, `id_reserva`, `id_paquete`, `prec`, `desc`, `updated_at`, `created_at`, `cant`) VALUES
(2, 13, 1, 20, 90, '2017-01-07 10:16:11', '2017-01-07 04:16:11', 2);

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

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reservas`
--

CREATE TABLE `reservas` (
  `id` int(11) NOT NULL,
  `alim` tinyint(1) DEFAULT NULL,
  `apro` tinyint(1) DEFAULT NULL,
  `bus` tinyint(1) DEFAULT NULL,
  `cant_adul` int(11) DEFAULT NULL,
  `cant_prof` int(11) DEFAULT NULL,
  `cant_nino` int(11) DEFAULT NULL,
  `id_instituto` int(11) NOT NULL,
  `come` varchar(800) COLLATE utf8_unicode_ci DEFAULT NULL,
  `desc` double DEFAULT NULL,
  `esta` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fech` date DEFAULT NULL,
  `fech_rese` date DEFAULT NULL,
  `info_cont` varchar(400) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nomb_cont` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `prec_nino` double DEFAULT NULL,
  `tota` double DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `id_coor` int(11) DEFAULT NULL,
  `id_usua` int(11) DEFAULT NULL,
  `prec_prof` double DEFAULT NULL,
  `prec_adul` double DEFAULT NULL,
  `edec` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'NO',
  `taqu` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'NO'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `reservas`
--

INSERT INTO `reservas` (`id`, `alim`, `apro`, `bus`, `cant_adul`, `cant_prof`, `cant_nino`, `id_instituto`, `come`, `desc`, `esta`, `fech`, `fech_rese`, `info_cont`, `nomb_cont`, `prec_nino`, `tota`, `updated_at`, `created_at`, `id_coor`, `id_usua`, `prec_prof`, `prec_adul`, `edec`, `taqu`) VALUES
(13, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 'CONFIRMADO', '2017-01-06', '2017-03-01', NULL, NULL, NULL, NULL, '2017-03-13 02:06:27', '2017-01-07 10:16:11', NULL, 1, NULL, NULL, 'SI', 'NO'),
(14, 1, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 'CONFIRMADO', '2017-02-07', '2017-03-16', NULL, NULL, NULL, NULL, '2017-03-13 01:34:11', '2017-01-07 11:37:47', NULL, 1, NULL, NULL, 'NO', ''),
(15, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 'CONFIRMADO', '2017-03-07', NULL, NULL, NULL, NULL, NULL, '2017-03-13 02:06:37', '2017-01-07 11:38:08', NULL, 1, NULL, NULL, 'NO', 'NO'),
(16, NULL, NULL, 1, 5, 2, 50, 3, NULL, NULL, 'CONFIRMADO', '2017-04-07', NULL, NULL, NULL, NULL, NULL, '2017-03-13 08:04:44', '2017-01-07 11:50:03', NULL, 1, NULL, NULL, 'NO', ''),
(17, 1, NULL, 1, 3, 2, 25, 1, NULL, 10, 'RESERVADO', '2017-05-07', NULL, NULL, NULL, NULL, NULL, '2017-03-13 02:06:46', '2017-01-07 11:51:31', NULL, 1, NULL, NULL, 'NO', 'NO'),
(18, 1, NULL, 1, 2, 2, 10, 3, NULL, 5, 'RESERVADO', '2017-06-07', NULL, NULL, NULL, 2.5, NULL, '2017-01-27 03:38:21', '2017-01-07 11:53:19', NULL, 1, NULL, NULL, 'NO', ''),
(19, 1, NULL, 1, 2, 3, 25, 1, 'Reserva completa?', 10, 'RESERVADO', '2016-01-07', NULL, 'sadsakjdksajdkksaj', 'F.Hyl', 2, NULL, '2017-03-13 02:07:00', '2017-01-07 12:02:35', NULL, 1, 1.5, 0, 'NO', 'NO'),
(20, 1, NULL, 1, 10, 3, 100, 3, 'sis dkasjdkjkslajd', 10, 'RESERVADO', '2017-01-07', '2017-12-31', 'LOdsajdnasknjk', 'asdas', 1, NULL, '2017-01-07 12:07:31', '2017-01-07 12:07:31', NULL, 1, 0, 0, 'NO', ''),
(22, 1, NULL, NULL, 10, 1, 1, 1, 'es feo', 0, 'RESERVADO', '2017-01-18', '2017-01-19', 'Hola', 'Mauel', 1, NULL, '2017-03-13 02:07:13', '2017-01-19 06:49:43', NULL, 1, 1, 1, 'NO', 'NO'),
(23, NULL, NULL, NULL, 10, 10, 10, 2, 'anad', 0, 'RESERVADO', '2017-01-26', '2017-11-11', 'nada', 'nada', 10, NULL, '2017-01-27 09:34:08', '2017-01-27 09:34:08', NULL, 1, 10, 10, 'NO', ''),
(24, NULL, NULL, NULL, 10, 10, 10, 2, 'asfn', 0, 'RESERVADO', '2017-01-26', '2017-01-01', 'aos', 'jao', 10, NULL, '2017-01-27 09:35:51', '2017-01-27 09:35:51', NULL, 1, 10, 10, 'NO', ''),
(25, NULL, NULL, 1, 10, 10, 10, 3, 'sadkf', 0, 'RESERVADO', '2017-01-26', '2017-01-01', 'as', 'jao', 10, NULL, '2017-01-27 09:36:52', '2017-01-27 09:36:52', NULL, 1, 10, 10, 'NO', ''),
(26, 1, NULL, NULL, 10, 10, 10, 1, 'sas', 0, 'RESERVADO', '2017-03-12', '2017-03-15', 'es feo', 'hola', 1, NULL, '2017-03-13 01:22:35', '2017-03-13 01:22:35', NULL, 1, 1, 1, 'NO', '');

-- --------------------------------------------------------

--
-- Table structure for table `talleres`
--

CREATE TABLE `talleres` (
  `id` int(11) NOT NULL,
  `nomb` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `desc` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `capa` int(11) NOT NULL,
  `prec` double NOT NULL,
  `condicion` tinyint(1) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `talleres`
--

INSERT INTO `talleres` (`id`, `nomb`, `desc`, `capa`, `prec`, `condicion`, `updated_at`, `created_at`) VALUES
(1, 'Pintura', 'Pinta Carita', 25, 5, 1, '2016-11-24 07:26:56', '2016-11-24 07:23:36'),
(2, 'Burbujas', 'Se hacen burbujas', 21, 1.25, 1, '2017-01-24 08:30:07', '2017-01-06 11:41:37');

-- --------------------------------------------------------

--
-- Table structure for table `taller_edecan`
--

CREATE TABLE `taller_edecan` (
  `id` int(11) NOT NULL,
  `id_taller` int(11) NOT NULL,
  `id_edecan` int(11) NOT NULL,
  `cant` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `taller_edecan`
--

INSERT INTO `taller_edecan` (`id`, `id_taller`, `id_edecan`, `cant`, `updated_at`, `created_at`) VALUES
(1, 2, 1, 5, '2017-01-26 04:02:02', '2017-01-26 04:02:02');

-- --------------------------------------------------------

--
-- Table structure for table `taller_reserva`
--

CREATE TABLE `taller_reserva` (
  `id` int(11) NOT NULL,
  `id_reserva` int(11) NOT NULL,
  `id_taller` int(11) NOT NULL,
  `prec` double NOT NULL,
  `cant` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `desc` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `taller_reserva`
--

INSERT INTO `taller_reserva` (`id`, `id_reserva`, `id_taller`, `prec`, `cant`, `updated_at`, `created_at`, `desc`) VALUES
(4, 13, 1, 5, 5, '2017-01-07 10:16:11', '2017-01-07 10:16:11', 0),
(5, 25, 2, 1.25, 8, '2017-01-27 09:36:52', '2017-01-27 09:36:52', 0);

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

-- --------------------------------------------------------

--
-- Table structure for table `tipo_usuario`
--

CREATE TABLE `tipo_usuario` (
  `id` int(11) NOT NULL,
  `nom_tipo` varchar(50) NOT NULL,
  `desc` varchar(100) NOT NULL,
  `condicion` tinyint(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tipo_usuario`
--

INSERT INTO `tipo_usuario` (`id`, `nom_tipo`, `desc`, `condicion`, `created_at`, `updated_at`) VALUES
(1, 'administrador', 'administra', 1, '2017-03-12 00:29:59', '0000-00-00 00:00:00'),
(2, 'promotor', 'promotea', 1, '2017-03-12 00:29:59', '0000-00-00 00:00:00'),
(3, 'taquilla', 'taquillea', 1, '2017-03-12 00:30:39', '0000-00-00 00:00:00'),
(4, 'edecan', 'cuenta personas', 1, '2017-03-12 00:30:39', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `valido` int(11) DEFAULT NULL,
  `tipo` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`, `valido`, `tipo`) VALUES
(1, 'Cesar Cuellar', 'cesar20090203cuellar@gmail.com', '$2y$10$HdYm.00kwoH77Mf8LkZodOZA/DZH2KM5DOJv0hsR0x23hYZ.I5Kpi', 'Jn9exMJKaJES9Uk5xB5674w7Kk973fXbztd8LJaRaJrA3l47S1HaS8vBsiJB', '2016-11-22 02:30:48', '2017-03-13 10:53:24', 1, 1),
(2, 'Luis Aparicio', 'kkk@pipi.com', '$2y$10$SaoP.7MfL6SHgLwe8e.20.YWK2k.1AnvE..Loi6VJ2wJcNNFQyD6i', '9EFgRa8u0Lczouqvk7wqppk57UjkOMFWdo69QsAZHzGCZ6JbIPHfiZR9loYi', '2016-11-25 05:38:14', '2017-03-13 08:48:48', 0, 2),
(3, 'Manuel Villegas', 'manu@gmail.com', '$2y$10$.tlMtokk9fJTRYXG2nRXNutIdvBlsegglP9.6TJosotfmzBDnPlLO', 'xWoXeNoJigLgZTnnlu4mBcb5NMDm0ZvHGB3nV2VJur9jNIdwXnasOk2zlN5L', '2017-02-20 07:41:25', '2017-03-13 12:51:59', 0, 3),
(4, 'Josue Garcia', 'josue@gmail.com', '123', 'la misma de siempre 123', NULL, '2017-03-13 10:44:32', 0, 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `datos`
--
ALTER TABLE `datos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `edecanes`
--
ALTER TABLE `edecanes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_reserva` (`id_reserva`),
  ADD KEY `id_usuario` (`id_usua`);

--
-- Indexes for table `espacios`
--
ALTER TABLE `espacios`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `espacio_edecan`
--
ALTER TABLE `espacio_edecan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_espacio` (`id_espacio`),
  ADD KEY `id_edecan` (`id_edecan`);

--
-- Indexes for table `espacio_reserva`
--
ALTER TABLE `espacio_reserva`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_reserva` (`id_espacio`),
  ADD KEY `id_espacio` (`id_reserva`);

--
-- Indexes for table `exhibiciones`
--
ALTER TABLE `exhibiciones`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exhibicion_edecan`
--
ALTER TABLE `exhibicion_edecan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_edecan` (`id_edecan`),
  ADD KEY `id_exhibicion` (`id_exhibicion`);

--
-- Indexes for table `exhibicion_reserva`
--
ALTER TABLE `exhibicion_reserva`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_reserva` (`id_reserva`),
  ADD KEY `id_exhibicion` (`id_exhibicion`);

--
-- Indexes for table `exhibicion_taquilla`
--
ALTER TABLE `exhibicion_taquilla`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_taquilla` (`id_taquilla`),
  ADD KEY `id_exhibicion` (`id_exhibicion`);

--
-- Indexes for table `horarios`
--
ALTER TABLE `horarios`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `horas`
--
ALTER TABLE `horas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_horario` (`id_horario`);

--
-- Indexes for table `hora_reserva`
--
ALTER TABLE `hora_reserva`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_reserva` (`id_reserva`),
  ADD KEY `id_hora` (`id_hora`);

--
-- Indexes for table `institutos`
--
ALTER TABLE `institutos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `paquete`
--
ALTER TABLE `paquete`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `paquete_reserva`
--
ALTER TABLE `paquete_reserva`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_reserva` (`id_reserva`),
  ADD KEY `id_paquete` (`id_paquete`);

--
-- Indexes for table `paquete_taquilla`
--
ALTER TABLE `paquete_taquilla`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_taquilla` (`id_taquilla`),
  ADD KEY `prec` (`prec`),
  ADD KEY `id_paquete` (`id_paquete`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `reservas`
--
ALTER TABLE `reservas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_instituto` (`id_instituto`),
  ADD KEY `id_coor` (`id_coor`),
  ADD KEY `id_usua` (`id_usua`);

--
-- Indexes for table `talleres`
--
ALTER TABLE `talleres`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `taller_edecan`
--
ALTER TABLE `taller_edecan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_taller` (`id_taller`),
  ADD KEY `id_edecan` (`id_edecan`);

--
-- Indexes for table `taller_reserva`
--
ALTER TABLE `taller_reserva`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_reserva` (`id_reserva`),
  ADD KEY `id_taller` (`id_taller`);

--
-- Indexes for table `taquilla`
--
ALTER TABLE `taquilla`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_reserva` (`id_reserva`),
  ADD KEY `id_usua` (`id_usua`);

--
-- Indexes for table `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `tipo` (`tipo`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `datos`
--
ALTER TABLE `datos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `edecanes`
--
ALTER TABLE `edecanes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `espacios`
--
ALTER TABLE `espacios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `espacio_edecan`
--
ALTER TABLE `espacio_edecan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `espacio_reserva`
--
ALTER TABLE `espacio_reserva`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `exhibiciones`
--
ALTER TABLE `exhibiciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `exhibicion_edecan`
--
ALTER TABLE `exhibicion_edecan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `exhibicion_reserva`
--
ALTER TABLE `exhibicion_reserva`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `exhibicion_taquilla`
--
ALTER TABLE `exhibicion_taquilla`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `horarios`
--
ALTER TABLE `horarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `horas`
--
ALTER TABLE `horas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `hora_reserva`
--
ALTER TABLE `hora_reserva`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `institutos`
--
ALTER TABLE `institutos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `paquete`
--
ALTER TABLE `paquete`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `paquete_reserva`
--
ALTER TABLE `paquete_reserva`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `paquete_taquilla`
--
ALTER TABLE `paquete_taquilla`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `reservas`
--
ALTER TABLE `reservas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `talleres`
--
ALTER TABLE `talleres`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `taller_edecan`
--
ALTER TABLE `taller_edecan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `taller_reserva`
--
ALTER TABLE `taller_reserva`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `taquilla`
--
ALTER TABLE `taquilla`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `edecanes`
--
ALTER TABLE `edecanes`
  ADD CONSTRAINT `edecanes_ibfk_1` FOREIGN KEY (`id_reserva`) REFERENCES `reservas` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `edecanes_ibfk_2` FOREIGN KEY (`id_usua`) REFERENCES `users` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `espacio_edecan`
--
ALTER TABLE `espacio_edecan`
  ADD CONSTRAINT `espacio_edecan_ibfk_1` FOREIGN KEY (`id_espacio`) REFERENCES `espacios` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `espacio_edecan_ibfk_2` FOREIGN KEY (`id_edecan`) REFERENCES `edecanes` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `espacio_reserva`
--
ALTER TABLE `espacio_reserva`
  ADD CONSTRAINT `espacio_reserva_ibfk_1` FOREIGN KEY (`id_espacio`) REFERENCES `espacios` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `espacio_reserva_ibfk_2` FOREIGN KEY (`id_reserva`) REFERENCES `reservas` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `exhibicion_edecan`
--
ALTER TABLE `exhibicion_edecan`
  ADD CONSTRAINT `exhibicion_edecan_ibfk_1` FOREIGN KEY (`id_exhibicion`) REFERENCES `exhibiciones` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `exhibicion_edecan_ibfk_2` FOREIGN KEY (`id_edecan`) REFERENCES `edecanes` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `exhibicion_reserva`
--
ALTER TABLE `exhibicion_reserva`
  ADD CONSTRAINT `exhibicion_reserva_ibfk_1` FOREIGN KEY (`id_reserva`) REFERENCES `reservas` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `exhibicion_reserva_ibfk_2` FOREIGN KEY (`id_exhibicion`) REFERENCES `exhibiciones` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `exhibicion_taquilla`
--
ALTER TABLE `exhibicion_taquilla`
  ADD CONSTRAINT `exhibicion_taquilla_ibfk_1` FOREIGN KEY (`id_taquilla`) REFERENCES `taquilla` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `exhibicion_taquilla_ibfk_2` FOREIGN KEY (`id_exhibicion`) REFERENCES `exhibiciones` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `horas`
--
ALTER TABLE `horas`
  ADD CONSTRAINT `horas_ibfk_1` FOREIGN KEY (`id_horario`) REFERENCES `horarios` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `hora_reserva`
--
ALTER TABLE `hora_reserva`
  ADD CONSTRAINT `hora_reserva_ibfk_1` FOREIGN KEY (`id_reserva`) REFERENCES `reservas` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `hora_reserva_ibfk_2` FOREIGN KEY (`id_hora`) REFERENCES `horas` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `paquete_reserva`
--
ALTER TABLE `paquete_reserva`
  ADD CONSTRAINT `paquete_reserva_ibfk_1` FOREIGN KEY (`id_paquete`) REFERENCES `paquete` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `paquete_reserva_ibfk_2` FOREIGN KEY (`id_reserva`) REFERENCES `reservas` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `paquete_taquilla`
--
ALTER TABLE `paquete_taquilla`
  ADD CONSTRAINT `paquete_taquilla_ibfk_1` FOREIGN KEY (`id_taquilla`) REFERENCES `taquilla` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `paquete_taquilla_ibfk_2` FOREIGN KEY (`id_paquete`) REFERENCES `paquete` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `reservas`
--
ALTER TABLE `reservas`
  ADD CONSTRAINT `reservas_ibfk_1` FOREIGN KEY (`id_instituto`) REFERENCES `institutos` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `reservas_ibfk_2` FOREIGN KEY (`id_coor`) REFERENCES `users` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `reservas_ibfk_3` FOREIGN KEY (`id_usua`) REFERENCES `users` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `taller_edecan`
--
ALTER TABLE `taller_edecan`
  ADD CONSTRAINT `taller_edecan_ibfk_1` FOREIGN KEY (`id_taller`) REFERENCES `talleres` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `taller_edecan_ibfk_2` FOREIGN KEY (`id_edecan`) REFERENCES `edecanes` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `taller_reserva`
--
ALTER TABLE `taller_reserva`
  ADD CONSTRAINT `taller_reserva_ibfk_1` FOREIGN KEY (`id_taller`) REFERENCES `talleres` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `taller_reserva_ibfk_2` FOREIGN KEY (`id_reserva`) REFERENCES `reservas` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`tipo`) REFERENCES `tipo_usuario` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
