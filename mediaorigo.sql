-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: database:3306
-- Generation Time: Feb 17, 2022 at 02:45 PM
-- Server version: 5.7.34
-- PHP Version: 7.4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mediaorigo`
--

-- --------------------------------------------------------

--
-- Table structure for table `mediaorigo_cars`
--

CREATE TABLE `mediaorigo_cars` (
  `id` int(10) UNSIGNED NOT NULL,
  `type` varchar(50) NOT NULL,
  `license_plate` varchar(7) NOT NULL,
  `registrarion_year` int(4) NOT NULL,
  `deleted` int(1) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mediaorigo_cars`
--

INSERT INTO `mediaorigo_cars` (`id`, `type`, `license_plate`, `registrarion_year`, `deleted`) VALUES
(1, 'Lada samara', 'ABC-125', 1985, 0),
(2, 'BMW', 'ASD-444', 2021, 0);

-- --------------------------------------------------------

--
-- Table structure for table `mediaorigo_drivers`
--

CREATE TABLE `mediaorigo_drivers` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `birth_year` int(4) NOT NULL,
  `deleted` int(1) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mediaorigo_drivers`
--

INSERT INTO `mediaorigo_drivers` (`id`, `name`, `birth_year`, `deleted`) VALUES
(1, 'Kiss Pista', 1980, 0),
(2, 'Nagy Antal', 1970, 0);

-- --------------------------------------------------------

--
-- Table structure for table `mediaorigo_migrations`
--

CREATE TABLE `mediaorigo_migrations` (
  `version` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mediaorigo_migrations`
--

INSERT INTO `mediaorigo_migrations` (`version`) VALUES
(3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mediaorigo_cars`
--
ALTER TABLE `mediaorigo_cars`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `license_plate` (`license_plate`);

--
-- Indexes for table `mediaorigo_drivers`
--
ALTER TABLE `mediaorigo_drivers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mediaorigo_cars`
--
ALTER TABLE `mediaorigo_cars`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `mediaorigo_drivers`
--
ALTER TABLE `mediaorigo_drivers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
