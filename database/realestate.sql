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

--
-- Database: `realestate`
--

CREATE TABLE IF NOT EXISTS `admin_login` (
  `admin_id` int NOT NULL AUTO_INCREMENT, 
  `Email` VARCHAR(100),
  `admin_password` varchar(255) NOT NULL,
  PRIMARY KEY (admin_id)
) ;

CREATE TABLE IF NOT EXISTS `user_login` (
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `phone` varchar(255),
  `address` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_id` int NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (user_id)
) ;

CREATE TABLE IF NOT EXISTS `account_info`(
    `account_number` varchar(255) NOT NULL,
    `email` varchar(50) NOT NULL,
	`phone` varchar(25) NOT NULL,
    `name`  varchar(50) NOT NULL,
	`user_id` int NOT NULL,
	FOREIGN KEY (user_id) REFERENCES user_login(user_id) ON DELETE CASCADE ON UPDATE CASCADE
    );

CREATE TABLE IF NOT EXISTS `property_type` (
  `type_id` int NOT NULL AUTO_INCREMENT,
  `type_name` varchar(45) NOT NULL,
  PRIMARY KEY (type_id)
) ;

CREATE TABLE IF NOT EXISTS `city` (
  `city_id` int NOT NULL ,
  `city_name` varchar(45) NOT NULL,
  PRIMARY KEY (city_id)
);

CREATE TABLE IF NOT EXISTS `state` (
  `state_id` int NOT NULL ,
  `state_name` varchar(45) NOT NULL,
  PRIMARY KEY (state_id)
) ;

CREATE TABLE IF NOT EXISTS `zip_code` (
  `zip_id` int NOT NULL AUTO_INCREMENT,
  `zip_code` varchar(10) NOT NULL,
  `city_id` int NOT NULL,
  `state_id` int NOT NULL,
  PRIMARY KEY (zip_id),
  FOREIGN KEY (city_id) REFERENCES city(city_id) ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (state_id) REFERENCES state(state_id) ON DELETE CASCADE ON UPDATE CASCADE
) ;

CREATE TABLE IF NOT EXISTS `property` (
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

CREATE TABLE IF NOT EXISTS `property_media` (
  `media_id` int NOT NULL AUTO_INCREMENT,
  `media_src` blob NOT NULL,
  `property_id` int NOT NULL,
  PRIMARY KEY (media_id),
  FOREIGN KEY (property_id) REFERENCES property(property_id) ON DELETE CASCADE ON UPDATE CASCADE
) ;

CREATE TABLE IF NOT EXISTS `property_buy` (
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
  PRIMARY KEY (property_id),
  FOREIGN KEY (type_id) REFERENCES property_type(type_id) ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (zip_id) REFERENCES zip_code(zip_id) ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (user_id) REFERENCES user_login(user_id) ON DELETE CASCADE ON UPDATE CASCADE
) ;

CREATE TABLE IF NOT EXISTS `property_media_buy` (
  `media_id` int NOT NULL AUTO_INCREMENT,
  `media_src` blob NOT NULL,
  `property_id` int NOT NULL,
  PRIMARY KEY (media_id),
  FOREIGN KEY (property_id) REFERENCES property_buy(property_id) ON DELETE CASCADE ON UPDATE CASCADE
) ;

CREATE TABLE IF NOT EXISTS `repair_job` (
  `job_id` int NOT NULL AUTO_INCREMENT,
  `job_title` varchar(45) NOT NULL,
  `job_description` varchar(255) NOT NULL,
  `job_note` varchar(255) DEFAULT NULL,
  `property_id` int DEFAULT NULL,
   PRIMARY KEY (job_id),
   FOREIGN KEY (property_id) REFERENCES property(property_id) ON DELETE CASCADE ON UPDATE CASCADE
) ;

CREATE TABLE IF NOT EXISTS `contact_job_user`(
  `Name` varchar(100),
  `Address` varchar(100),
  `phone` varchar(50),
  `job_id` int NOT NULL,
  FOREIGN KEY (job_id) REFERENCES repair_job(job_id) ON DELETE CASCADE ON UPDATE CASCADE
) ;

CREATE TABLE IF NOT EXISTS `payment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `property_id` varchar(255) NOT NULL,
  `payment_status` varchar(255) NOT NULL,
  `payment_amount` double(10,2) NOT NULL,
  `payment_currency` varchar(255) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `txn_id` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
);

INSERT INTO `admin_login` (`Email`, `admin_password`) VALUES('admin@gmail.com', 'admin123');

INSERT INTO `state`(`state_id`, `state_name`) VALUES (21, 'MI');
INSERT INTO `state`(`state_id`, `state_name`) VALUES (29, 'NJ');
INSERT INTO `state`(`state_id`, `state_name`) VALUES (4, 'CA');
INSERT INTO `state`(`state_id`, `state_name`) VALUES (34, 'OH');
INSERT INTO `state`(`state_id`, `state_name`) VALUES (37, 'PA');

INSERT INTO `city`(`city_id`,`city_name`) VALUES (211,'Ypsilanti');
INSERT INTO `city`(`city_id`,`city_name`) VALUES (212,'Canton');
INSERT INTO `city`(`city_id`,`city_name`) VALUES (213,'Ann Arbor');

INSERT INTO `city`(`city_id`,`city_name`) VALUES (41,'San Francisco');
INSERT INTO `city`(`city_id`,`city_name`) VALUES (42,'San Diego');
INSERT INTO `city`(`city_id`,`city_name`) VALUES (43,'Sacramento');

INSERT INTO `city`(`city_id`,`city_name`) VALUES (291,'Jersey City');
INSERT INTO `city`(`city_id`,`city_name`) VALUES (292,'Newark');

INSERT INTO `city`(`city_id`,`city_name`) VALUES (341,'Cleveland');
INSERT INTO `city`(`city_id`,`city_name`) VALUES (342,'Cincinnati');

INSERT INTO `city`(`city_id`,`city_name`) VALUES (371,'Philadelphia');
INSERT INTO `city`(`city_id`,`city_name`) VALUES (372,'Scranton');

INSERT INTO `zip_code`(`zip_code`, `city_id`, `state_id`) VALUES (48187,212,21);
INSERT INTO `zip_code`(`zip_code`, `city_id`, `state_id`) VALUES (48188,212,21);

INSERT INTO `zip_code`(`zip_code`, `city_id`, `state_id`) VALUES (48197,211,21);
INSERT INTO `zip_code`(`zip_code`, `city_id`, `state_id`) VALUES (48198,211,21);

INSERT INTO `zip_code`(`zip_code`, `city_id`, `state_id`) VALUES (48103,213,21);
INSERT INTO `zip_code`(`zip_code`, `city_id`, `state_id`) VALUES (48104,213,21);

INSERT INTO `zip_code`(`zip_code`, `city_id`, `state_id`) VALUES (94016,41,4);
INSERT INTO `zip_code`(`zip_code`, `city_id`, `state_id`) VALUES (22434,42,4);
INSERT INTO `zip_code`(`zip_code`, `city_id`, `state_id`) VALUES (94203,43,4);

INSERT INTO `zip_code`(`zip_code`, `city_id`, `state_id`) VALUES (07030,291,29);
INSERT INTO `zip_code`(`zip_code`, `city_id`, `state_id`) VALUES (07101,292,29);

INSERT INTO `zip_code`(`zip_code`, `city_id`, `state_id`) VALUES (44101,341,34);
INSERT INTO `zip_code`(`zip_code`, `city_id`, `state_id`) VALUES (41073,342,34);

INSERT INTO `zip_code`(`zip_code`, `city_id`, `state_id`) VALUES (19019,371,37);
INSERT INTO `zip_code`(`zip_code`, `city_id`, `state_id`) VALUES (18503,372,37);

INSERT INTO `property_type`(`type_name`) VALUES ('House');
INSERT INTO `property_type`(`type_name`) VALUES ('Appartment');
INSERT INTO `property_type`(`type_name`) VALUES ('Condo');
INSERT INTO `property_type`(`type_name`) VALUES ('Cabin');