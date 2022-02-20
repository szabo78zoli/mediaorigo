-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: database:3306
-- Generation Time: Feb 20, 2022 at 11:02 PM
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
  `deleted` int(1) UNSIGNED NOT NULL,
  `category` varchar(25) NOT NULL,
  `passenger` int(1) UNSIGNED DEFAULT NULL,
  `weight` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mediaorigo_cars`
--

INSERT INTO `mediaorigo_cars` (`id`, `type`, `license_plate`, `registrarion_year`, `deleted`, `category`, `passenger`, `weight`) VALUES
(1, 'Lada', 'ABC-124', 1989, 0, '1', 5, 0),
(2, 'Isuzu D-max', 'ASD-444', 2020, 0, '2', 0, 1000),
(3, 'Volvo FH-16', 'SDA-234', 2021, 0, '3', 0, 25000);

-- --------------------------------------------------------

--
-- Table structure for table `mediaorigo_cars_drivers_assembly`
--

CREATE TABLE `mediaorigo_cars_drivers_assembly` (
  `id` int(10) UNSIGNED NOT NULL,
  `car_id` int(10) UNSIGNED NOT NULL,
  `driver_id` int(10) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `deleted` int(1) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mediaorigo_cars_drivers_assembly`
--

INSERT INTO `mediaorigo_cars_drivers_assembly` (`id`, `car_id`, `driver_id`, `date`, `deleted`) VALUES
(1, 1, 1, '2022-03-06', 0),
(2, 3, 3, '2022-03-07', 0),
(3, 3, 3, '2022-03-09', 0),
(4, 2, 2, '2022-03-10', 0);

-- --------------------------------------------------------

--
-- Table structure for table `mediaorigo_deliveries`
--

CREATE TABLE `mediaorigo_deliveries` (
  `id` int(10) UNSIGNED NOT NULL,
  `car_id` int(10) UNSIGNED NOT NULL,
  `customer_name` varchar(50) NOT NULL,
  `passenger` int(1) UNSIGNED DEFAULT NULL,
  `weight` int(10) UNSIGNED DEFAULT NULL,
  `place_of_recruitment` varchar(50) NOT NULL,
  `delivery_date` date NOT NULL,
  `deleted` int(1) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mediaorigo_deliveries`
--

INSERT INTO `mediaorigo_deliveries` (`id`, `car_id`, `customer_name`, `passenger`, `weight`, `place_of_recruitment`, `delivery_date`, `deleted`) VALUES
(1, 3, 'Nagy Aladár', 0, 120, '1010 Budapest Kiss u. 9.', '2022-03-09', 0),
(2, 1, 'Kiss elemér', 2, 0, '1012 Budapest Hegyalja út 87', '2022-03-06', 0);

-- --------------------------------------------------------

--
-- Table structure for table `mediaorigo_drivers`
--

CREATE TABLE `mediaorigo_drivers` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `birth_year` int(4) NOT NULL,
  `deleted` int(1) UNSIGNED NOT NULL,
  `driving_license` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mediaorigo_drivers`
--

INSERT INTO `mediaorigo_drivers` (`id`, `name`, `birth_year`, `deleted`, `driving_license`) VALUES
(1, 'Tóth Imre', 1980, 0, '1'),
(2, 'Tóth Ferenc', 1981, 0, '2'),
(3, 'Kiss Antal', 1975, 0, '3');

-- --------------------------------------------------------

--
-- Table structure for table `mediaorigo_driving_license`
--

CREATE TABLE `mediaorigo_driving_license` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `category` int(1) UNSIGNED NOT NULL,
  `deleted` int(1) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mediaorigo_driving_license`
--

INSERT INTO `mediaorigo_driving_license` (`id`, `name`, `category`, `deleted`) VALUES
(1, 'B - személyautó', 1, 0),
(2, 'C - kisteherautó', 2, 0),
(3, 'D - nagyteherautó', 3, 0);

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
(10);

-- --------------------------------------------------------

--
-- Table structure for table `mediaorigo_type_of_cars`
--

CREATE TABLE `mediaorigo_type_of_cars` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `deleted` int(1) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mediaorigo_type_of_cars`
--

INSERT INTO `mediaorigo_type_of_cars` (`id`, `name`, `deleted`) VALUES
(1, 'személyautó', 0),
(2, 'kisteherautó', 0),
(3, 'nagyteherautó', 0);

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
-- Indexes for table `mediaorigo_cars_drivers_assembly`
--
ALTER TABLE `mediaorigo_cars_drivers_assembly`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mediaorigo_deliveries`
--
ALTER TABLE `mediaorigo_deliveries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mediaorigo_drivers`
--
ALTER TABLE `mediaorigo_drivers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mediaorigo_driving_license`
--
ALTER TABLE `mediaorigo_driving_license`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mediaorigo_type_of_cars`
--
ALTER TABLE `mediaorigo_type_of_cars`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mediaorigo_cars`
--
ALTER TABLE `mediaorigo_cars`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `mediaorigo_cars_drivers_assembly`
--
ALTER TABLE `mediaorigo_cars_drivers_assembly`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `mediaorigo_deliveries`
--
ALTER TABLE `mediaorigo_deliveries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `mediaorigo_drivers`
--
ALTER TABLE `mediaorigo_drivers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `mediaorigo_driving_license`
--
ALTER TABLE `mediaorigo_driving_license`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `mediaorigo_type_of_cars`
--
ALTER TABLE `mediaorigo_type_of_cars`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
