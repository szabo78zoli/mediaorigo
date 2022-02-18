-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: database:3306
-- Generation Time: Feb 18, 2022 at 10:01 PM
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
  `passenger` int(1) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mediaorigo_cars`
--

INSERT INTO `mediaorigo_cars` (`id`, `type`, `license_plate`, `registrarion_year`, `deleted`, `category`, `passenger`) VALUES
(1, 'Lada', 'ABC-123', 1988, 0, '1', 0),
(2, 'Isuzu D-Max', 'BVD-456', 2019, 0, '2', 0),
(3, 'Volvo FH 16', 'CVF-678', 2018, 0, '3', 0);

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
(4, 2, 2, '2022-03-06', 0),
(5, 2, 2, '2022-03-06', 0),
(6, 2, 2, '2022-03-06', 0),
(7, 2, 2, '2022-03-07', 0),
(8, 2, 2, '2022-03-07', 0),
(9, 2, 2, '2022-03-08', 0),
(10, 2, 2, '2022-03-08', 0),
(11, 2, 2, '2022-03-08', 0),
(12, 2, 2, '2022-03-08', 0),
(13, 2, 1, '2022-03-08', 0),
(14, 2, 1, '2022-03-09', 0),
(15, 2, 1, '2022-03-09', 0),
(16, 1, 2, '2022-03-10', 0);

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
(1, 'Tóth Imre', 1998, 0, '3'),
(2, 'Tóth Ferenc', 1975, 0, '1');

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
(9);

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `mediaorigo_drivers`
--
ALTER TABLE `mediaorigo_drivers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
