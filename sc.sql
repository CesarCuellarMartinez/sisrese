CREATE DATABASE IF NOT EXISTS `sisrese` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `sisrese`;

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
(2, 'Comedor Secundario', 'Cerca de la salida', 25, 1, '2016-11-23 07:06:26', '2016-11-23 07:04:48');

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
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `institutos`
--

INSERT INTO `institutos` (`id`, `nomb_inst`, `nomb_cont`, `tele_inst`, `tele_cont`, `corr_inst`, `corr_cont`, `condicion`, `updated_at`, `created_at`) VALUES
(1, 'ITR', 'Cesar Cuellar', '22222222', '77777777', 'itr@hotmail.com', 'CC20090203@gmail.com', 1, '2016-11-22 19:13:30', '0000-00-00 00:00:00'),
(2, 'sahjashj', 'hashjash', '77777777', '22222222', 'aassa', 'sadasdsa', 1, '2016-11-23 01:14:27', '2016-11-23 01:14:27'),
(3, 'Correccion', 'Fredy Martinez', '55555555', '88888888', 'cor@gmail.com', 'pp@hotmail.com', 1, '2016-11-23 04:03:51', '2016-11-23 01:15:42');

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
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Cesar Cuellar', 'cesar20090203cuellar@gmail.com', '$2y$10$HdYm.00kwoH77Mf8LkZodOZA/DZH2KM5DOJv0hsR0x23hYZ.I5Kpi', 'wWUrcyASBwypUhxaBZFmatO3xqiDbRUptJTcVJitbKJyAcYyRnjys2WfMTJz', '2016-11-22 02:30:48', '2016-11-23 07:37:03');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `espacios`
--
ALTER TABLE `espacios`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `espacios`
--
ALTER TABLE `espacios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
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
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;--
-- Database: `test`
--
CREATE DATABASE IF NOT EXISTS `test` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `test`;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
