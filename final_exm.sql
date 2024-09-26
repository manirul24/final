/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : final_exm

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2024-09-26 13:29:39
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `cars`
-- ----------------------------
DROP TABLE IF EXISTS `cars`;
CREATE TABLE `cars` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `brand` varchar(255) NOT NULL,
  `model` varchar(255) NOT NULL,
  `year_of_manufacture` int(11) NOT NULL,
  `car_type` varchar(255) NOT NULL,
  `daily_rent_price` decimal(8,2) NOT NULL,
  `availability` enum('Unavailable','Available') NOT NULL DEFAULT 'Available',
  `car_image` varchar(255) DEFAULT '',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of cars
-- ----------------------------
INSERT INTO `cars` VALUES ('5', 'Tesla Model S', 'Tesla', 'Model S', '2022', 'Sedan', '120.00', 'Available', 'car_images/UbYPt6atPoSrTn0PVaruqUFKSiOA5xikOEZ188va.png', '2024-09-23 10:20:55', '2024-09-24 12:18:02');
INSERT INTO `cars` VALUES ('6', 'Ford Mustang', 'Ford', 'Mustang GT', '2021', 'Coupe', '150.00', 'Available', 'car_images/UbYPt6atPoSrTn0PVaruqUFKSiOA5xikOEZ188va.png', '2024-09-23 10:20:55', '2024-09-24 12:18:03');
INSERT INTO `cars` VALUES ('7', 'BMW X5', 'BMW', 'X5', '2020', 'SUV', '200.00', 'Unavailable', 'car_images/UbYPt6atPoSrTn0PVaruqUFKSiOA5xikOEZ188va.png', '2024-09-23 10:20:55', '2024-09-24 12:18:04');
INSERT INTO `cars` VALUES ('8', 'Audi A4', 'Audi', 'A4', '2019', 'Sedan', '100.00', 'Available', 'car_images/UbYPt6atPoSrTn0PVaruqUFKSiOA5xikOEZ188va.png', '2024-09-23 10:20:55', '2024-09-24 12:18:04');
INSERT INTO `cars` VALUES ('9', 'Mercedes-Benz GLE', 'Mercedes-Benz', 'GLE 350', '2022', 'SUV', '180.00', 'Available', 'car_images/UbYPt6atPoSrTn0PVaruqUFKSiOA5xikOEZ188va.png', '2024-09-23 10:20:55', '2024-09-24 12:18:05');
INSERT INTO `cars` VALUES ('10', 'Tesla Model S', 'Tesla', 'Model S', '2022', 'Sedan', '120.00', 'Available', 'car_images/UbYPt6atPoSrTn0PVaruqUFKSiOA5xikOEZ188va.png', '2024-09-23 10:29:18', '2024-09-24 12:18:05');
INSERT INTO `cars` VALUES ('11', 'Ford Mustang', 'Ford', 'Mustang GT', '2021', 'Coupe', '150.00', 'Available', 'car_images/UbYPt6atPoSrTn0PVaruqUFKSiOA5xikOEZ188va.png', '2024-09-23 10:29:18', '2024-09-24 12:18:06');
INSERT INTO `cars` VALUES ('12', 'BMW X5', 'BMW', 'X5', '2020', 'SUV', '200.00', 'Unavailable', 'car_images/UbYPt6atPoSrTn0PVaruqUFKSiOA5xikOEZ188va.png', '2024-09-23 10:29:18', '2024-09-24 12:18:06');
INSERT INTO `cars` VALUES ('13', 'Audi A4', 'Audi', 'A4', '2019', 'Sedan', '100.00', 'Available', 'car_images/UbYPt6atPoSrTn0PVaruqUFKSiOA5xikOEZ188va.png', '2024-09-23 10:29:18', '2024-09-24 12:18:07');
INSERT INTO `cars` VALUES ('14', 'Mercedes-Benz GLE', 'Mercedes-Benz', 'GLE 350', '2022', 'SUV', '180.00', 'Available', 'car_images/UbYPt6atPoSrTn0PVaruqUFKSiOA5xikOEZ188va.png', '2024-09-23 10:29:18', '2024-09-24 12:18:07');
INSERT INTO `cars` VALUES ('15', 'Tesla Model S', 'Tesla', 'Model S', '2022', 'Sedan', '120.00', 'Available', 'car_images/UbYPt6atPoSrTn0PVaruqUFKSiOA5xikOEZ188va.png', '2024-09-23 10:29:31', '2024-09-24 12:18:12');
INSERT INTO `cars` VALUES ('16', 'Ford Mustang', 'Ford', 'Mustang GT', '2021', 'Coupe', '150.00', 'Available', 'car_images/cP4G7tczeGeExASELWdYq2twwR2CxMJjaaD7DkB7.png', '2024-09-23 10:29:31', '2024-09-24 12:19:04');
INSERT INTO `cars` VALUES ('17', 'BMW X5', 'BMW', 'X5', '2020', 'SUV', '200.00', 'Unavailable', 'car_images/UbYPt6atPoSrTn0PVaruqUFKSiOA5xikOEZ188va.png', '2024-09-23 10:29:31', '2024-09-24 12:18:11');
INSERT INTO `cars` VALUES ('18', 'Audi A4', 'Audi', 'A4', '2019', 'Sedan', '100.00', 'Available', 'car_images/UbYPt6atPoSrTn0PVaruqUFKSiOA5xikOEZ188va.png', '2024-09-23 10:29:31', '2024-09-24 12:18:10');
INSERT INTO `cars` VALUES ('19', 'Mercedes-Benz GLE', 'Mercedes-Benz', 'GLE 350', '2022', 'SUV', '180.00', 'Available', 'car_images/cP4G7tczeGeExASELWdYq2twwR2CxMJjaaD7DkB7.png', '2024-09-23 10:29:31', '2024-09-24 12:19:03');
INSERT INTO `cars` VALUES ('20', 'Tesla Model S', 'Tesla', 'Model S', '2022', 'Sedan', '120.00', 'Available', 'car_images/UbYPt6atPoSrTn0PVaruqUFKSiOA5xikOEZ188va.png', '2024-09-23 10:29:33', '2024-09-24 12:18:01');
INSERT INTO `cars` VALUES ('21', 'Ford Mustang', 'Ford', 'Mustang GT', '2021', 'Coupe', '150.00', 'Available', 'car_images/UbYPt6atPoSrTn0PVaruqUFKSiOA5xikOEZ188va.png', '2024-09-23 10:29:33', '2024-09-24 12:18:00');
INSERT INTO `cars` VALUES ('22', 'BMW X5', 'BMW', 'X5', '2020', 'SUV', '200.00', 'Unavailable', 'car_images/UbYPt6atPoSrTn0PVaruqUFKSiOA5xikOEZ188va.png', '2024-09-23 10:29:33', '2024-09-24 12:18:00');
INSERT INTO `cars` VALUES ('23', 'Audi A4', 'Audi', 'A4', '2019', 'Sedan', '100.00', 'Available', 'car_images/cP4G7tczeGeExASELWdYq2twwR2CxMJjaaD7DkB7.png', '2024-09-23 10:29:33', '2024-09-24 12:19:01');
INSERT INTO `cars` VALUES ('24', 'Mercedes-Benz GLE', 'Mercedes-Benz', 'GLE 350', '2022', 'SUV', '180.00', 'Available', 'car_images/UbYPt6atPoSrTn0PVaruqUFKSiOA5xikOEZ188va.png', '2024-09-23 10:29:33', '2024-09-24 12:17:58');
INSERT INTO `cars` VALUES ('25', 'test', 'test', '001', '434', 'Test', '500.00', 'Unavailable', 'car_images/cP4G7tczeGeExASELWdYq2twwR2CxMJjaaD7DkB7.png', '2024-09-24 06:09:05', '2024-09-24 06:09:05');

-- ----------------------------
-- Table structure for `migrations`
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES ('1', '2014_10_12_000000_create_users_table', '1');
INSERT INTO `migrations` VALUES ('2', '2019_12_14_000001_create_personal_access_tokens_table', '1');
INSERT INTO `migrations` VALUES ('3', '2024_09_18_040446_create_cars_table', '1');

-- ----------------------------
-- Table structure for `personal_access_tokens`
-- ----------------------------
DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of personal_access_tokens
-- ----------------------------

-- ----------------------------
-- Table structure for `rentals`
-- ----------------------------
DROP TABLE IF EXISTS `rentals`;
CREATE TABLE `rentals` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `car_id` bigint(20) unsigned NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `total_cost` decimal(8,2) NOT NULL,
  `status` enum('canceled','completed','Pending','Booked','ongoing') NOT NULL DEFAULT 'Pending',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `rentals_user_id_foreign` (`user_id`),
  KEY `rentals_car_id_foreign` (`car_id`),
  CONSTRAINT `rentals_car_id_foreign` FOREIGN KEY (`car_id`) REFERENCES `cars` (`id`) ON DELETE CASCADE,
  CONSTRAINT `rentals_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of rentals
-- ----------------------------
INSERT INTO `rentals` VALUES ('6', '23', '5', '2024-09-25', '2024-09-26', '120.00', 'completed', '2024-09-24 08:01:05', '2024-09-26 04:47:01');
INSERT INTO `rentals` VALUES ('7', '23', '5', '2024-09-27', '2024-09-28', '120.00', 'canceled', '2024-09-24 08:23:46', '2024-09-26 04:11:06');
INSERT INTO `rentals` VALUES ('8', '23', '9', '2024-09-26', '2024-09-27', '180.00', 'Booked', '2024-09-25 06:56:40', '2024-09-25 06:56:40');
INSERT INTO `rentals` VALUES ('9', '23', '13', '2024-09-26', '2024-09-28', '100.00', 'Booked', '2024-09-25 09:39:18', '2024-09-25 09:39:18');
INSERT INTO `rentals` VALUES ('10', '23', '10', '2024-09-27', '2024-09-28', '120.00', 'canceled', '2024-09-26 03:27:55', '2024-09-26 05:49:30');
INSERT INTO `rentals` VALUES ('11', '23', '10', '2024-10-01', '2024-10-02', '120.00', 'completed', '2024-09-26 05:00:39', '2024-09-26 05:44:14');
INSERT INTO `rentals` VALUES ('12', '23', '11', '2024-09-27', '2024-09-28', '150.00', 'Booked', '2024-09-26 05:51:29', '2024-09-26 05:51:29');

-- ----------------------------
-- Table structure for `users`
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(20) DEFAULT '',
  `address` varchar(200) DEFAULT NULL,
  `role` enum('admin','customer') NOT NULL DEFAULT 'customer',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('7', 'John Doe', 'admin@example.com', '$2y$12$IQ9Y6A0kif.jhoSQGRGN5.iv6yJrH7GR3ZPNvUuJDjXAXZuIGLv12', '123-456-7890', '123 Main St, New York, NY', 'admin', '2024-09-23 10:27:37', '2024-09-26 13:28:38');
INSERT INTO `users` VALUES ('8', 'Jane Smith', 'jane.smith@example.com', '$2y$12$IQ9Y6A0kif.jhoSQGRGN5.iv6yJrH7GR3ZPNvUuJDjXAXZuIGLv12', '987-654-3210', '456 Elm St, Los Angeles, CA', 'customer', '2024-09-23 10:27:37', '2024-09-25 11:46:21');
INSERT INTO `users` VALUES ('9', 'Michael Johnson', 'michael.johnson@example.com', '$2y$12$tuDUzEkUu2LmeiBlXugcZuzbHdfTC/iBrS8b0oT6UU3Q2tzIsbcuS', '555-123-4567', '789 Oak St, Chicago, IL', 'customer', '2024-09-23 10:27:37', '2024-09-23 10:27:37');
INSERT INTO `users` VALUES ('10', 'Emily Davis', 'emily.davis@example.com', '$2y$12$9P5qSyHv/9WuPKjvkJizAuv30Jm6W8vn0kARuhfUS1Pa1LiMXmsJy', '222-333-4444', '101 Pine St, Houston, TX', 'customer', '2024-09-23 10:27:37', '2024-09-23 12:03:35');
INSERT INTO `users` VALUES ('11', 'David Martinez', 'david.martinez@example.com', '$2y$12$zixyI/WMDngODwA2xxv0EOzNkaVxd6RDxrdXpob3q6MEDAKO/5QTG', '777-888-9999', '202 Maple St, Miami, FL', 'customer', '2024-09-23 10:27:37', '2024-09-23 10:27:37');
INSERT INTO `users` VALUES ('23', 'manirul', 'pccollege1918@gmail.com', '$2y$12$JWLfhoPABIZfRYnykshZGeTErosnMzk8qWL8jpXwfO/c9SuHIWkH2', '019111', 'gazipur', 'customer', '2024-09-24 05:40:54', '2024-09-26 05:24:15');
INSERT INTO `users` VALUES ('24', 'islam', 'test@gmail.com', '$2y$12$oTrhHy8c.YPiYzZIS9Nu6u4h7Kwx6MvpzH/9uE5d9UGKsajuqtSxm', '01917598847', 'gazipur wt', 'customer', '2024-09-26 05:03:18', '2024-09-26 05:24:06');
INSERT INTO `users` VALUES ('25', 'islam', 'test1@gmail.com', '$2y$12$sGonhYNbYMxnp1pezFGqx.wZpcFDWr5DByxhTGmmLCiBxCfJyo8im', '01917598847', 'gazipur', 'customer', '2024-09-26 05:07:37', '2024-09-26 05:07:37');
INSERT INTO `users` VALUES ('26', 'islam', 'test1s@gmail.com', '$2y$12$2wSeh4wlhc/YX.lKEVxO7eKcZiYk6pvJDI0Wpipg/74dPvI8HJRCq', '01917598847', 'gazipur', 'customer', '2024-09-26 05:08:43', '2024-09-26 05:08:43');
INSERT INTO `users` VALUES ('27', 'islam', 'test1sf@gmail.com', '$2y$12$6oRuevUz9p0kC8bNONuSYuxTTli.Phq8rciuAqRQMmdWFTUc9ziKW', '01917598847', 'gazipur', 'customer', '2024-09-26 05:10:44', '2024-09-26 05:10:44');
INSERT INTO `users` VALUES ('30', 'Testing', 'john.doeee@example.com', '$2y$12$w.us.pgMpCcB4b2VORhY9evHjCcpQKt5dviE6F7/8mYqMhJXeDC3i', '523525', 'wetwet', 'customer', '2024-09-26 05:12:35', '2024-09-26 05:12:35');
