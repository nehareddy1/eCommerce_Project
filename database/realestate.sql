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
-- Table structure for table `admin_login`
--

CREATE TABLE `admin_login` (
  `Email` VARCHAR(100),
  `admin_password` varchar(255) NOT NULL,
  PRIMARY KEY (admin_id)
) ;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`Email`, `admin_password`) VALUES
('memcommity@gmail.com', 'memcomm2020');

-- Table structure for table `property_type`
--

CREATE TABLE `property_type` (
  `type_id` int NOT NULL AUTO_INCREMENT,
  `type_name` varchar(45) NOT NULL,
  PRIMARY KEY (type_id)
) ;


-- --------------------------------------------------------
--
-- Table structure for table `property_buy`
--

CREATE TABLE `property_buy` (
  `property_id` int NOT NULL AUTO_INCREMENT,
  `property_name` varchar(255) NOT NULL,
  `type_id` int NOT NULL,
  `property_price` double NOT NULL,
  `property_address1` varchar(255) NOT NULL,
  `property_address2` varchar(255) DEFAULT NULL,
  `zip_id` int NOT NULL,
  `user_id` int NOT NULL,
  `property_square_feet` varchar(45) DEFAULT NULL,
  `property_bed` varchar(10) DEFAULT NULL,
  `property_bath` varchar(10) DEFAULT NULL,
  `buy_description` varchar(255) NOT NULL,
  PRIMARY KEY (property_id, buy_id),
  FOREIGN KEY (type_id) REFERENCES property_type(type_id) ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (zip_id) REFERENCES zip_code(zip_id) ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (user_id) REFERENCES user_login(user_id) ON DELETE CASCADE ON UPDATE CASCADE
) ;

--
-- Table structure for table `buy_type`
--

CREATE TABLE `buy_type` (
  `buy_id` int NOT NULL,
  `type_is` int NOT NULL,
  FOREIGN KEY (`buy_id`) REFERENCES `property_buy` (`buy_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (`type_is`) REFERENCES `property_type` (`type_id`) ON DELETE CASCADE ON UPDATE CASCADE
);

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `city_id` int NOT NULL AUTO_INCREMENT,
  `city_name` varchar(45) NOT NULL,
  PRIMARY KEY (city_id)
);

-- --------------------------------------------------------

--
-- Table structure for table `state`
--

CREATE TABLE `state` (
  `state_id` int NOT NULL AUTO_INCREMENT,
  `state_name` varchar(45) NOT NULL,
  PRIMARY KEY (state_id)
) ;
--
-- Table structure for table `zip_code`
--

CREATE TABLE `zip_code` (
  `zip_id` int NOT NULL AUTO_INCREMENT,
  `zip_code` varchar(10) NOT NULL,
  `city_id` int NOT NULL,
  `state_id` int NOT NULL,
  PRIMARY KEY (zip_id),
  FOREIGN KEY (city_id) REFERENCES city(city_id) ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (state_id) REFERENCES state(state_id) ON DELETE CASCADE ON UPDATE CASCADE
) ;

--
-- Table structure for table `buy_zip_code`
--

CREATE TABLE `buy_zip_code` (
  `buy_id` int NOT NULL,
  `zip_id` int NOT NULL,
  FOREIGN KEY (`buy_id`) REFERENCES `property_buy` (`buy_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (`zip_id`) REFERENCES `zip_code` (`zip_id`) ON DELETE CASCADE ON UPDATE CASCADE
);
-- --------------------------------------------------------
--


--
-- Table structure for table `property`
--

CREATE TABLE `property` (
  `property_id` int NOT NULL AUTO_INCREMENT,
  `property_name` varchar(255) NOT NULL,
  `type_id` int NOT NULL,
  `property_price` double NOT NULL,
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
  `property_note` varchar(255)  DEFAULT NULL,
  PRIMARY KEY (property_id),
  FOREIGN KEY (type_id) REFERENCES property_type(type_id) ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (zip_id) REFERENCES zip_code(zip_id) ON DELETE CASCADE ON UPDATE CASCADE
);



--
-- Table structure for table `property_media`
--

CREATE TABLE `property_media` (
  `media_id` int NOT NULL AUTO_INCREMENT,
  `media_src` blob NOT NULL,
  `property_id` int NOT NULL,
  PRIMARY KEY (media_id),
  FOREIGN KEY (property_id) REFERENCES property(property_id) ON DELETE CASCADE ON UPDATE CASCADE
) ;

-- --------------------------------------------------------



-- --------------------------------------------------------

--
-- Table structure for table `repair_job`
--

CREATE TABLE `repair_job` (
  `job_id` int NOT NULL AUTO_INCREMENT,
  `job_title` varchar(45) NOT NULL,
  `job_description` varchar(255) NOT NULL,
  `job_note` varchar(255) DEFAULT NULL,
  `property_id` int DEFAULT NULL,
	PRIMARY KEY (job_id),
    FOREIGN KEY (property_id) REFERENCES property(property_id) ON DELETE CASCADE ON UPDATE CASCADE
) ;

--
-- Table structure for table `user_information`
--

CREATE TABLE `user_information` (
  `user_id` int NOT NULL AUTO_INCREMENT,
  `user_name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `verification` tinyint(1) NOT NULL,
  `name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address1` varchar(255) NOT NULL,
  `address2` varchar(255) DEFAULT NULL,
  `zip_id` int NOT NULL,
  PRIMARY KEY (user_id),
  FOREIGN KEY (zip_id) REFERENCES zip_code(zip_id) ON DELETE CASCADE ON UPDATE CASCADE
) ;

-- --------------------------------------------------------

--
-- Table structure for table `user_login`
--

CREATE TABLE `user_login` (
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `phone` varchar(255),
  `address` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
  `user_id` int NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (user_id)
) ;

-- --------------------------------------------------------

--
-- Table structure for table `contact_job_user`
--

CREATE TABLE `contact_job_user` (
  `Name` varchar(100),
  `Address` varchar(100),
  `phone` varchar(50),
  FOREIGN KEY (job_id) REFERENCES repair_job(job_id)
) ;

--
-- Table structure for table `property_media_buy`
--

CREATE TABLE `property_media_buy` (
  `media_id` int NOT NULL AUTO_INCREMENT,
  `media_src` blob NOT NULL,
  `property_id` int NOT NULL,
  PRIMARY KEY (media_id),
  FOREIGN KEY (property_id) REFERENCES property(property_id) ON DELETE CASCADE ON UPDATE CASCADE
) ;

--
-- Table for the paypal account 'payments'
--
CREATE TABLE `payments`(
    `id` int(6) NOT NULL AUTO_INCREMENT,
    `txnid` varchar(20) NOT NULL,
    `payment_amount` decimal(7,2) NOT NULL,
    `payment_status` varchar(25) NOT NULL,
    `property_id` varchar(25) NOT NULL,
    `createdtime` datetime NOT NULL,
	`user_id` int NOT NULL,
    PRIMARY KEY (`id`),
	FOREIGN KEY (user_id) REFERENCES user_login(user_id) ON DELETE CASCADE ON UPDATE CASCADE,
	FOREIGN KEY (property_id) REFERENCES property_buy(property_id) ON DELETE CASCADE ON UPDATE CASCADE
    ) 