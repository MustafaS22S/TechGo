CREATE DATABASE  IF NOT EXISTS `techgo` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;
USE `techgo`;
-- MySQL dump 10.13  Distrib 8.0.42, for Win64 (x86_64)
--
-- Host: localhost    Database: techgo
-- ------------------------------------------------------
-- Server version	5.5.5-10.4.32-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `addresses`
--

DROP TABLE IF EXISTS `addresses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `addresses` (
  `address_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `address_line1` varchar(255) NOT NULL,
  `address_line2` varchar(255) DEFAULT NULL,
  `city` varchar(100) NOT NULL,
  `state_province` varchar(100) DEFAULT NULL,
  `postal_code` varchar(20) NOT NULL,
  `country` varchar(50) NOT NULL DEFAULT 'Egypt',
  `address_type` enum('shipping','billing') NOT NULL,
  `is_default` tinyint(1) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`address_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `addresses_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `addresses`
--

LOCK TABLES `addresses` WRITE;
/*!40000 ALTER TABLE `addresses` DISABLE KEYS */;
/*!40000 ALTER TABLE `addresses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cartitems`
--

DROP TABLE IF EXISTS `cartitems`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cartitems` (
  `cart_item_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 1 CHECK (`quantity` > 0),
  `added_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`cart_item_id`),
  UNIQUE KEY `user_product_cart` (`user_id`,`product_id`),
  KEY `product_id` (`product_id`),
  CONSTRAINT `cartitems_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `cartitems_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cartitems`
--

LOCK TABLES `cartitems` WRITE;
/*!40000 ALTER TABLE `cartitems` DISABLE KEYS */;
/*!40000 ALTER TABLE `cartitems` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_category_id` int(11) DEFAULT NULL,
  `name` varchar(100) NOT NULL,
  `description` text DEFAULT NULL,
  `image_url` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`category_id`),
  UNIQUE KEY `name` (`name`),
  KEY `parent_category_id` (`parent_category_id`),
  CONSTRAINT `categories_ibfk_1` FOREIGN KEY (`parent_category_id`) REFERENCES `categories` (`category_id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `newslettersubscriptions`
--

DROP TABLE IF EXISTS `newslettersubscriptions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `newslettersubscriptions` (
  `subscription_id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `subscribed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `is_active` tinyint(1) DEFAULT 1,
  PRIMARY KEY (`subscription_id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `newslettersubscriptions`
--

LOCK TABLES `newslettersubscriptions` WRITE;
/*!40000 ALTER TABLE `newslettersubscriptions` DISABLE KEYS */;
/*!40000 ALTER TABLE `newslettersubscriptions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orderitems`
--

DROP TABLE IF EXISTS `orderitems`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `orderitems` (
  `order_item_id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL CHECK (`quantity` > 0),
  `price_at_purchase` decimal(10,2) NOT NULL,
  `product_name_at_purchase` varchar(255) NOT NULL,
  PRIMARY KEY (`order_item_id`),
  KEY `order_id` (`order_id`),
  KEY `product_id` (`product_id`),
  CONSTRAINT `orderitems_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `orderitems_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orderitems`
--

LOCK TABLES `orderitems` WRITE;
/*!40000 ALTER TABLE `orderitems` DISABLE KEYS */;
/*!40000 ALTER TABLE `orderitems` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `total_amount` decimal(12,2) NOT NULL,
  `status` enum('pending','processing','shipped','delivered','cancelled','refunded') NOT NULL DEFAULT 'pending',
  `shipping_address_id` int(11) DEFAULT NULL,
  `billing_address_id` int(11) DEFAULT NULL,
  `payment_method` varchar(50) DEFAULT NULL,
  `payment_status` enum('pending','paid','failed') NOT NULL DEFAULT 'pending',
  `tracking_number` varchar(100) DEFAULT NULL,
  `notes` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`order_id`),
  KEY `user_id` (`user_id`),
  KEY `shipping_address_id` (`shipping_address_id`),
  KEY `billing_address_id` (`billing_address_id`),
  CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON UPDATE CASCADE,
  CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`shipping_address_id`) REFERENCES `addresses` (`address_id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `orders_ibfk_3` FOREIGN KEY (`billing_address_id`) REFERENCES `addresses` (`address_id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `productratings`
--

DROP TABLE IF EXISTS `productratings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `productratings` (
  `rating_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `rating` int(11) NOT NULL CHECK (`rating` >= 1 and `rating` <= 5),
  `review_text` text DEFAULT NULL,
  `rating_date` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`rating_id`),
  UNIQUE KEY `user_product_rating` (`user_id`,`product_id`),
  KEY `product_id` (`product_id`),
  CONSTRAINT `productratings_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `productratings_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `productratings`
--

LOCK TABLES `productratings` WRITE;
/*!40000 ALTER TABLE `productratings` DISABLE KEYS */;
/*!40000 ALTER TABLE `productratings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `products` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `category` varchar(40) NOT NULL,
  `description` text DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `discounted_price` decimal(10,2) DEFAULT NULL,
  `stock_quantity` int(11) DEFAULT 0,
  `image_url_main` varchar(255) DEFAULT NULL,
  `image_url_thumbnail` varchar(255) DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT 1,
  `is_featured` tinyint(1) DEFAULT 0,
  `average_rating` decimal(3,2) DEFAULT 0.00,
  `rating_count` int(11) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (26,'Electrec Microphone Amplifier','Featured Sensors','This module features a built-in electret microphone and a preamplifier circuit, allowing it to detect and amplify sound signals from the environment. It’s commonly used in sound-activated systems, voice detection, and basic audio input projects for microcontrollers',180.00,NULL,0,'./images/Electret Microphone Amplifier.jpeg','./images/5c5cfa02-7b4d-4cc5-9066-a72bea05fc05.jpeg',1,0,0.00,0,'2025-05-14 17:21:20','2025-05-14 17:21:20'),(27,'Force sensitive Resistor Sensor','Featured Sensors','The FSR sensor changes its resistance depending on the pressure or\r\n              force applied to its surface. It is ideal for applications like\r\n              touch-sensitive interfaces, pressure mapping, or detecting physical\r\n              interaction in robotics and wearable devices',710.00,NULL,0,'./images/Force sensitive Resistor Sensor.webp','./images/8f4d69ff-180a-49e2-a33c-a29d187d1ec6.jpeg',1,0,0.00,0,'2025-05-14 17:23:42','2025-05-14 17:23:42'),(28,'Gas Sensor','Featured Sensors','A gas sensor detects the presence and concentration of gases in an environment. It works by measuring\r\n              changes in physical properties when gases interact with the sensor. Common types include sensors for\r\n              carbon monoxide, methane, oxygen, and nitrogen dioxide. These sensors are essential for safety in various\r\n              industries, homes, and environmental monitoring.',300.00,NULL,0,'./images/Gas Sensor.webp','./images/WhatsApp Image 2024-12-13 at 8.23.41 PM (1).jpeg',1,0,0.00,0,'2025-05-14 18:12:07','2025-05-14 18:12:07'),(29,'KY-015 DHT 11 Temperature Sensor','Featured Sensors','The KY-015 module uses the DHT11 sensor to measure both temperature\r\n              and humidity in the surrounding environment. It provides digital\r\n              output and is widely used in weather monitoring systems, smart\r\n              homes, and agricultural automation',150.00,NULL,0,'./images/KY-015 DHT 11 Temperature Sensor.webp','./images/WhatsApp Image 2024-12-13 at 11.01.40 PM (1).jpeg',1,0,0.00,0,'2025-05-14 18:14:17','2025-05-14 18:14:17'),(30,'Ultrasonic Distance Sensor','Featured Sensors','This sensor uses ultrasonic waves to measure the distance to an\r\n              object with high accuracy. It emits sound waves and measures the\r\n              time they take to bounce back, making it ideal for obstacle\r\n              detection, automation systems, and robotics navigation',600.00,NULL,0,'./images/Ultrasonic Distance Sensor.jpg','./images/Ultrasonic Distance Sensor with Python and the micro.jpg',1,0,0.00,0,'2025-05-14 18:15:26','2025-05-14 18:15:26'),(31,'Arduino Pro Mini','Microcontrollers','A compact and lightweight version of the Arduino, the Pro Mini is\r\n              ideal for space-constrained projects. It uses the ATmega328P and\r\n              offers 14 digital I/O pins and 6 analog inputs, requiring an\r\n              external USB-to-serial adapter for programming',420.00,NULL,0,'./images/Arduino UNO Rev3 - Clone.jpg','./images/WhatsApp Image 2024-12-12 at 2.20.26 PM.jpeg',1,0,0.00,0,'2025-05-14 18:22:22','2025-05-14 18:22:22'),(32,'Arduino uno reno so mini pro','Microcontrollers','A compact and lightweight version of the Arduino, the uno reno 3 is\r\n              ideal for space-constrained projects. It uses the ATmega328P and\r\n              offers 14 digital I/O pins and 6 analog inputs, requiring an\r\n              external USB-to-serial adapter for programming',300.00,NULL,0,'./images/Arduino Pro Mini.jpg','./images/arduino-pro-mini-2-1-300x300.jpg',1,0,0.00,0,'2025-05-14 18:32:15','2025-05-14 18:32:15'),(33,'Joystick Shield for Arduino','Microcontrollers','This shield integrates a two-axis analog joystick and several buttons, allowing easy development of game\r\n              controllers and user interfaces. It plugs directly onto an Arduino board and is perfect for robotics\r\n              control, menu navigation, and interactive projects',190.00,NULL,0,'./images/Joystick Shield for Arduino.jpg','./images/7968590b-6518-4da8-8399-1cfdad38cf6d.jpeg',1,0,0.00,0,'2025-05-14 18:33:31','2025-05-14 18:33:31'),(34,'Mini Breadboard 400 PIN','Microcontrollers','This 400-point mini breadboard is a reusable prototyping platform ideal for building and testing\r\n              electronic circuits without soldering. It features strong adhesive backing and fits perfectly with jumper\r\n              wires and standard components, making it great for both beginners and professionals',300.00,NULL,0,'./images/Mini Breadboard 400 PIN With 4 Power Rails For Jumper Cable.jpg','./images/Mini Breadboard 400 PIN.jpg',1,0,0.00,0,'2025-05-14 18:34:35','2025-05-14 18:34:35'),(35,'Raspberry Pi Pico RP2020','Microcontrollers','The Raspberry Pi Pico is a low-cost, high-performance microcontroller board based on the dual-core ARM\r\n              Cortex-M0+ RP2040 chip. It offers flexible I/O options and is ideal for embedded systems, sensor\r\n              applications, and learning microcontroller programming',860.00,NULL,0,'./images/Raspberry Pi Pico RP2020.webp','./images/590e7cfb-3be5-4c2d-9a2f-df2f51166be8.jpeg',1,0,0.00,0,'2025-05-14 18:35:41','2025-05-14 18:35:41'),(36,'2.4GHz Transceiver nRF 24L01 Wireless','Electronic tools','A high-precision, high-performance stepper motor widely used in motion control applications such as 3D\r\n              printers and robotics. Its durable design ensures long operational life and efficiency.',80.00,NULL,0,'./images/2.4GHz Transceiver nRF 24L01 Wireless.webp','./images/537a0ae4-f831-45ce-b0ba-ef5eac7e0263.jpeg',1,0,0.00,0,'2025-05-14 19:18:41','2025-05-14 19:18:41'),(37,'Emergency Stop Switch','Electronic tools','A high-precision, high-performance stepper motor widely used in motion\r\n              control applications such as 3D printers and robotics. Its durable design\r\n              ensures long operational life and efficiency.',100.00,NULL,0,'./images/Emergency Stop Switch.webp','./images/5 PCS Push button switch E.jpg',1,0,0.00,0,'2025-05-14 19:23:23','2025-05-14 19:23:23'),(38,'GSM-GPRS Arduino SIM900','Electronic tools','A high-precision, high-performance stepper motor widely used in motion\r\n              control applications such as 3D printers and robotics. Its durable design\r\n              ensures long operational life and efficiency.',900.00,NULL,0,'./images/GSM-GPRS Arduino SIM900.webp','./images/36ae0eac-be3f-4888-a2be-aa418468ea0a.jpeg',1,0,0.00,0,'2025-05-14 19:25:33','2025-05-14 19:25:33'),(39,'OnOff Rocker Switch','Electronic tools','A high-precision, high-performance stepper motor widely used in motion\r\n              control applications such as 3D printers and robotics. Its durable design\r\n              ensures long operational life and efficiency.',50.00,NULL,0,'./images/OnOff Rocker Switch.webp','./images/5b58a0fb-7c66-429c-ac79-8821fa68393e.jpeg',1,0,0.00,0,'2025-05-14 19:26:38','2025-05-14 19:26:38'),(40,'RF Kit 433 Mhz Wireless','Electronic tools','A high-precision, high-performance stepper motor widely used in motion\r\n              control applications such as 3D printers and robotics. Its durable design\r\n              ensures long operational life and efficiency.',100.00,NULL,0,'./images/RF Kit 433 Mhz Wireless.webp','./images/0b2ce9d3-b4e4-476e-8dd6-1912136e1a63.jpeg',1,0,0.00,0,'2025-05-14 19:27:25','2025-05-14 19:27:25'),(41,'Arduino Li-ion Battery Charging','Power supplies','Designed for microcontroller projects, this module ensures safe and efficient lithium-ion battery charging, making it ideal for Arduino-based applications.',250.00,NULL,0,'./images/Arduino Li-ion Battery Charging.jpg','./images/Arduino Li-ion Battery Charging.jpeg',1,0,0.00,0,'2025-05-14 19:34:29','2025-05-14 19:34:29'),(42,'DC to DC Converter 48V→12V 30A Waterproof','Power supplies','A robust step-down power converter with waterproof casing, delivering stable 12V output at up to 30A from a 48V source. Suitable for automotive, solar, and industrial use.',2300.00,NULL,0,'./images/2020-12-17-17-44-22-300x300.jpg','./images/DC to DC Converter (Step Down from 48V to 12V 30A) Waterproof 360W.jpg',1,0,0.00,0,'2025-05-14 19:35:26','2025-05-14 19:35:26'),(43,'TP5100 Lithium Battery Charger','Power supplies','A high-efficiency dual-channel charger capable of charging 3.7V lithium batteries at up to 2A per channel. Ideal for 18650 cells, with built-in protection features.',300.00,NULL,0,'./images/TP5100 Lithium Battery Charger.jpg','./images/TP5100 Lithium Battery Charger.jpg',1,0,0.00,0,'2025-05-14 19:38:06','2025-05-14 19:38:06'),(44,'Triple Channel 18650 Charger 3.7v 3A','Power supplies','Simultaneously charge three 18650 lithium-ion batteries with stable current regulation, perfect for DIY electronics and power banks',200.00,NULL,0,'./images/Triple Channel 18650 Lithium Battery Charger Module 3.7v 3A.png','./images/Triple Channel 18650 Lithium Battery Charger Module 3.7v 3A.jpg',1,0,0.00,0,'2025-05-14 19:39:27','2025-05-14 19:39:27'),(45,'Ultracell Lead Acid Battery 12V 26A','Power supplies','A sealed, maintenance-free 12V lead-acid battery with high capacity and long service life. Suitable for backup power, solar systems, and general energy storage.',3000.00,NULL,0,'./images/UC.png','./images/Ultracell_UL26-12_VRLA_AGM_Loodaccu_12V_26_Ah_T3_terminal_ANB00551_m1_big.jpg',1,0,0.00,0,'2025-05-14 21:31:35','2025-05-14 21:31:35');
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `role` enum('subscriber','admin') DEFAULT 'subscriber',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `is_active` tinyint(1) DEFAULT 1,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=60 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (47,'muhammad hamdy','muha@gmail.com','4a7d1ed414474e4033ac29ccb8653d9b','12345678910','admin','2025-05-04 19:29:32','2025-05-04 19:29:32',1),(48,'alhussein','alhussein@gmail.com','4a7d1ed414474e4033ac29ccb8653d9b','12345678910','admin','2025-05-04 19:29:32','2025-05-04 19:29:32',1),(49,'mostafa','mostafa@gmail.com','4a7d1ed414474e4033ac29ccb8653d9b','12345678910','admin','2025-05-04 19:29:32','2025-05-04 19:29:32',1),(50,'tasneim','tasneim@gmail.com','4a7d1ed414474e4033ac29ccb8653d9b','12345678910','admin','2025-05-04 19:29:32','2025-05-04 19:29:32',1),(51,'nourein','nourein@gmail.com','4a7d1ed414474e4033ac29ccb8653d9b','12345678910','admin','2025-05-04 19:29:32','2025-05-04 19:29:32',1),(52,'mennah','mennah@gmail.com','4a7d1ed414474e4033ac29ccb8653d9b','12345678910','admin','2025-05-04 19:29:32','2025-05-04 19:29:32',1),(53,'aya','aya@gmail.com','4a7d1ed414474e4033ac29ccb8653d9b','12345678910','admin','2025-05-04 19:29:32','2025-05-04 19:29:32',1),(54,'rahma','rahma@gmail.com','4a7d1ed414474e4033ac29ccb8653d9b','12345678910','admin','2025-05-04 19:29:32','2025-05-04 19:29:32',1),(55,'nour','nour@gmail.com','4a7d1ed414474e4033ac29ccb8653d9b','12345678910','admin','2025-05-04 19:29:32','2025-05-04 19:29:32',1),(56,'aml','aml@gmail.com','4a7d1ed414474e4033ac29ccb8653d9b','12345678910','admin','2025-05-04 19:29:32','2025-05-04 19:29:32',1),(57,'ibraheim','ibraheim@gmail.com','4a7d1ed414474e4033ac29ccb8653d9b','12345678910','admin','2025-05-04 19:29:32','2025-05-04 19:29:32',1),(58,'muham','m@g.com','b59c67bf196a4758191e42f76670ceba','123','subscriber','2025-05-04 19:38:55','2025-05-04 19:38:55',1),(59,'mm','mm@gmail.com','b59c67bf196a4758191e42f76670ceba','123','subscriber','2025-05-04 22:56:07','2025-05-04 22:56:07',1);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wishlists`
--

DROP TABLE IF EXISTS `wishlists`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `wishlists` (
  `wishlist_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `added_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`wishlist_id`),
  UNIQUE KEY `user_product_wishlist` (`user_id`,`product_id`),
  KEY `product_id` (`product_id`),
  CONSTRAINT `wishlists_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `wishlists_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wishlists`
--

LOCK TABLES `wishlists` WRITE;
/*!40000 ALTER TABLE `wishlists` DISABLE KEYS */;
/*!40000 ALTER TABLE `wishlists` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-05-15  1:26:06
