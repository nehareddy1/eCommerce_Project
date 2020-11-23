-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 13, 2020 at 08:40 PM
-- Server version: 8.0.19
-- PHP Version: 7.2.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `realestate`
--

-- --------------------------------------------------------

--
-- Table structure for table `buy_type`
--

CREATE TABLE `admin_login` (
  `admin_id` int NOT NULL,
  `admin_password` varchar(255) NOT NULL
) ;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`admin_id`, `admin_password`) VALUES
(1, 'admin123');


CREATE TABLE `buy_type` (
  `buy_id` int NOT NULL,
  `type_is` int NOT NULL
);

-- --------------------------------------------------------

--
-- Table structure for table `buy_zip_code`
--

CREATE TABLE `buy_zip_code` (
  `buy_id` int NOT NULL,
  `zip_id` int NOT NULL
);

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `city_id` int NOT NULL,
  `city_name` varchar(45) NOT NULL
);

-- --------------------------------------------------------

--
-- Table structure for table `property`
--

CREATE TABLE `property` (
  `property_id` int NOT NULL,
  `propery_name` varchar(255) NOT NULL,
  `type_id` int NOT NULL,
  `propery_price` double NOT NULL,
  `property_address1` varchar(255) NOT NULL,
  `property_address2` varchar(255) DEFAULT NULL,
  `zip_id` int NOT NULL,
  `property_availability` tinyint NOT NULL,
  `property_square_feet` varchar(45) DEFAULT NULL,
  `property_bed` varchar(10) DEFAULT NULL,
  `property_bath` varchar(10) DEFAULT NULL,
  `property_parking` varchar(45) DEFAULT NULL,
  `pet_allowed` tinyint DEFAULT NULL,
  `min_lease_period` varchar(10) DEFAULT NULL,
  `max_lease_period` varchar(10) DEFAULT NULL,
  `property_note` varchar(255)  DEFAULT NULL
);

-- --------------------------------------------------------

--
-- Table structure for table `property_buy`
--

CREATE TABLE `property_buy` (
  `buy_id` int NOT NULL,
  `buy_description` varchar(255) NOT NULL,
  `buy_note` varchar(45) DEFAULT NULL
) ;

-- --------------------------------------------------------

--
-- Table structure for table `property_media`
--

CREATE TABLE `property_media` (
  `media_id` int NOT NULL,
  `media_src` blob NOT NULL,
  `property_id` int NOT NULL
) ;

-- --------------------------------------------------------

--
-- Table structure for table `property_type`
--

CREATE TABLE `property_type` (
  `type_id` int NOT NULL,
  `type_name` varchar(45) NOT NULL
) ;

-- --------------------------------------------------------

--
-- Table structure for table `repair_job`
--

CREATE TABLE `repair_job` (
  `job_id` int NOT NULL,
  `job_title` varchar(45) NOT NULL,
  `job_description` varchar(255) NOT NULL,
  `job_note` varchar(255) DEFAULT NULL,
  `property_id` int DEFAULT NULL
) ;

-- --------------------------------------------------------

--
-- Table structure for table `state`
--

CREATE TABLE `state` (
  `state_id` int NOT NULL,
  `state_name` varchar(45) NOT NULL
) ;

-- --------------------------------------------------------

--
-- Table structure for table `user_information`
--

CREATE TABLE `user_information` (
  `user_id` int NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `verification` tinyint(1) NOT NULL,
  `name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address1` varchar(255) NOT NULL,
  `address2` varchar(255) DEFAULT NULL,
  `zip_id` int NOT NULL
) ;

-- --------------------------------------------------------

--
-- Table structure for table `zip_code`
--

CREATE TABLE `zip_code` (
  `zip_id` int NOT NULL,
  `zip_code` varchar(10) NOT NULL,
  `city_id` int NOT NULL,
  `state_id` int NOT NULL
) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_login`
--
ALTER TABLE `admin_login`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `buy_type`
--
ALTER TABLE `buy_type`
  ADD KEY `buy_id_idx` (`buy_id`),
  ADD KEY `type_id_idx` (`type_is`);

--
-- Indexes for table `buy_zip_code`
--
ALTER TABLE `buy_zip_code`
  ADD KEY `buy_id` (`buy_id`),
  ADD KEY `zip_id` (`zip_id`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`city_id`);

--
-- Indexes for table `property`
--
ALTER TABLE `property`
  ADD PRIMARY KEY (`property_id`),
  ADD KEY `type_id_idx` (`type_id`),
  ADD KEY `zip_id_idx` (`zip_id`);

--
-- Indexes for table `property_buy`
--
ALTER TABLE `property_buy`
  ADD PRIMARY KEY (`buy_id`);

--
-- Indexes for table `property_media`
--
ALTER TABLE `property_media`
  ADD PRIMARY KEY (`media_id`),
  ADD KEY `propery_id_idx` (`property_id`);

--
-- Indexes for table `property_type`
--
ALTER TABLE `property_type`
  ADD PRIMARY KEY (`type_id`);

--
-- Indexes for table `repair_job`
--
ALTER TABLE `repair_job`
  ADD PRIMARY KEY (`job_id`),
  ADD KEY `property_id_idx` (`property_id`);

--
-- Indexes for table `state`
--
ALTER TABLE `state`
  ADD PRIMARY KEY (`state_id`);

--
-- Indexes for table `user_information`
--
ALTER TABLE `user_information`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `zip_id` (`zip_id`);

--
-- Indexes for table `zip_code`
--
ALTER TABLE `zip_code`
  ADD PRIMARY KEY (`zip_id`),
  ADD KEY `city_id_idx` (`city_id`),
  ADD KEY `state_id_idx` (`state_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_login`
--
ALTER TABLE `admin_login`
  MODIFY `admin_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_information`
--
ALTER TABLE `user_information`
  MODIFY `user_id` int NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `buy_type`
--
ALTER TABLE `buy_type`
  ADD CONSTRAINT `buy_type_ibfk_1` FOREIGN KEY (`buy_id`) REFERENCES `property_buy` (`buy_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `buy_type_ibfk_2` FOREIGN KEY (`type_is`) REFERENCES `property_type` (`type_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `buy_zip_code`
--
ALTER TABLE `buy_zip_code`
  ADD CONSTRAINT `buy_zip_code_ibfk_1` FOREIGN KEY (`buy_id`) REFERENCES `property_buy` (`buy_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `buy_zip_code_ibfk_2` FOREIGN KEY (`zip_id`) REFERENCES `zip_code` (`zip_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `property`
--
ALTER TABLE `property`
  ADD CONSTRAINT `type_id` FOREIGN KEY (`type_id`) REFERENCES `property_type` (`type_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `zip_id` FOREIGN KEY (`zip_id`) REFERENCES `zip_code` (`zip_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `property_media`
--
ALTER TABLE `property_media`
  ADD CONSTRAINT `propery_id` FOREIGN KEY (`property_id`) REFERENCES `property` (`property_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `repair_job`
--
ALTER TABLE `repair_job`
  ADD CONSTRAINT `property_id` FOREIGN KEY (`property_id`) REFERENCES `property` (`property_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_information`
--
ALTER TABLE `user_information`
  ADD CONSTRAINT `user_information_ibfk_1` FOREIGN KEY (`zip_id`) REFERENCES `zip_code` (`zip_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `zip_code`
--
ALTER TABLE `zip_code`
  ADD CONSTRAINT `city_id` FOREIGN KEY (`city_id`) REFERENCES `city` (`city_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `state_id` FOREIGN KEY (`state_id`) REFERENCES `state` (`state_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
