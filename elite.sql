-- MySQL dump 10.13  Distrib 8.0.34, for Linux (x86_64)
--
-- Host: localhost    Database: service_web
-- ------------------------------------------------------
-- Server version	8.0.34-0ubuntu0.22.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Current Database: `service_web`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `service_web` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;

USE `service_web`;

--
-- Table structure for table `admins`
--

DROP TABLE IF EXISTS `admins`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `admins` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` tinyint NOT NULL DEFAULT '1',
  `status` tinyint NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `admins_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admins`
--

LOCK TABLES `admins` WRITE;
/*!40000 ALTER TABLE `admins` DISABLE KEYS */;
INSERT INTO `admins` VALUES (1,'Admin','admin@yopmail.com','$2y$10$Q4Hl4Omih07Bb7QBZAf9XeGSB1.R2ZwG5S.eFpvbV2PtHes2tvZsq',2,1,'2023-10-26 15:10:54','2023-10-26 15:10:54'),(2,'designer','designer@yopmail.com','$2y$10$Yxf7P98iU.lKYg0J5TdIdeNYwAW2lgrygomI12aH.P0grcrUh/kDu',1,1,'2023-10-26 15:11:09','2023-10-26 15:11:09'),(3,'Production Manager','production@yopmail.com','$2y$10$.u36lgbUbtHyGdLL5mI0R.O3fiZmfv5THzvrpNAOQ5RpBY3iJCGUe',3,1,'2023-10-26 15:11:09','2023-10-26 15:11:09');
/*!40000 ALTER TABLE `admins` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `assign_orders`
--

DROP TABLE IF EXISTS `assign_orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `assign_orders` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `order_id` bigint unsigned NOT NULL,
  `assigned_by` bigint unsigned NOT NULL,
  `user_id` bigint unsigned NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `assign_orders_order_id_foreign` (`order_id`),
  KEY `assign_orders_assigned_by_foreign` (`assigned_by`),
  KEY `assign_orders_user_id_foreign` (`user_id`),
  CONSTRAINT `assign_orders_assigned_by_foreign` FOREIGN KEY (`assigned_by`) REFERENCES `admins` (`id`) ON DELETE CASCADE,
  CONSTRAINT `assign_orders_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  CONSTRAINT `assign_orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `admins` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `assign_orders`
--

LOCK TABLES `assign_orders` WRITE;
/*!40000 ALTER TABLE `assign_orders` DISABLE KEYS */;
INSERT INTO `assign_orders` VALUES (1,1,1,3,'This is my test design data','2023-10-26 15:15:27','2023-10-26 15:15:27'),(2,2,1,3,'this is test detail','2023-10-26 16:26:51','2023-10-26 16:26:51'),(3,4,1,2,'This  instruction is for designer to submit the detail of the page.','2023-10-27 12:49:18','2023-10-27 12:49:18');
/*!40000 ALTER TABLE `assign_orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint unsigned NOT NULL,
  `reserved_at` int unsigned DEFAULT NULL,
  `available_at` int unsigned NOT NULL,
  `created_at` int unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jobs`
--

LOCK TABLES `jobs` WRITE;
/*!40000 ALTER TABLE `jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (21,'2014_10_12_000000_create_users_table',1),(22,'2014_10_12_100000_create_password_reset_tokens_table',1),(23,'2019_05_03_000001_create_customer_columns',1),(24,'2019_05_03_000002_create_subscriptions_table',1),(25,'2019_05_03_000003_create_subscription_items_table',1),(26,'2019_08_19_000000_create_failed_jobs_table',1),(27,'2019_12_14_000001_create_personal_access_tokens_table',1),(28,'2023_10_10_141437_create_products_table',1),(29,'2023_10_10_165604_create_user_metas_table',1),(30,'2023_10_10_165618_create_orders_table',1),(31,'2023_10_10_172935_create_order_details_table',1),(32,'2023_10_10_174337_create_order_metas_table',1),(33,'2023_10_13_205607_create_admins_table',1),(34,'2023_10_15_144004_create_assign_orders_table',1),(35,'2023_10_15_144331_create_submit_orders_table',1),(36,'2023_10_15_145901_create_submit_order_attachements_table',1),(37,'2023_10_17_162445_create_transactions_table',1),(38,'2023_10_20_175939_create_quotes_table',1),(39,'2023_10_20_184614_create_product_images_table',1),(40,'2023_10_26_190640_create_shipping_details_table',1),(44,'2023_10_29_132444_create_notifications_table',2),(45,'2023_10_29_183026_create_jobs_table',3);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `notifications`
--

DROP TABLE IF EXISTS `notifications`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `notifications` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `type` tinyint NOT NULL,
  `content` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` bigint unsigned NOT NULL,
  `is_read` tinyint(1) NOT NULL DEFAULT '0',
  `send_by_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `send_by_id` bigint unsigned DEFAULT NULL,
  `send_to_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `send_to_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`),
  KEY `notifications_send_by_type_send_by_id_index` (`send_by_type`,`send_by_id`),
  KEY `notifications_send_to_type_send_to_id_index` (`send_to_type`,`send_to_id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `notifications`
--

LOCK TABLES `notifications` WRITE;
/*!40000 ALTER TABLE `notifications` DISABLE KEYS */;
INSERT INTO `notifications` VALUES (2,1,'New Order Created','App\\Models\\Order',11,0,'App\\Models\\Admin',1,'App\\Http\\Controllers\\User',1,'2023-10-29 12:42:06','2023-10-29 12:42:06'),(3,1,'New Order Created','App\\Models\\Order',12,0,'App\\Models\\Admin',1,'App\\Http\\Controllers\\User',1,'2023-10-29 13:31:44','2023-10-29 13:31:44'),(4,1,'New Order Created','App\\Models\\Order',13,0,'App\\Models\\Admin',1,'App\\Http\\Controllers\\User',1,'2023-10-29 13:35:57','2023-10-29 13:35:57'),(5,1,'New Order Created','App\\Models\\Order',14,0,'App\\Models\\Admin',1,'App\\Http\\Controllers\\User',1,'2023-10-29 14:28:48','2023-10-29 14:28:48'),(6,1,'Remedios Stricklandhas sent the payment against order #76163','App\\Models\\Order',3,0,'App\\Models\\Admin',1,'App\\Http\\Controllers\\User',1,'2023-10-30 11:52:29','2023-10-30 11:52:29'),(7,1,'Remedios Stricklandhas sent the payment against order #76163','App\\Models\\Order',3,0,'App\\Models\\Admin',1,'App\\Http\\Controllers\\User',1,'2023-10-30 11:52:29','2023-10-30 11:52:29'),(8,1,'Remedios Stricklandhas sent the payment against order #2381614','App\\Models\\Order',14,0,'App\\Models\\Admin',1,'App\\Http\\Controllers\\User',1,'2023-10-30 11:59:12','2023-10-30 11:59:12'),(9,1,'Remedios Stricklandhas sent the payment against order #2381614','App\\Models\\Order',14,0,'App\\Models\\Admin',1,'App\\Http\\Controllers\\User',1,'2023-10-30 11:59:12','2023-10-30 11:59:12'),(10,1,'Remedios Stricklandhas sent the payment against order #2381614','App\\Models\\Order',14,0,'App\\Models\\Admin',1,'App\\Http\\Controllers\\User',1,'2023-10-30 12:10:34','2023-10-30 12:10:34'),(11,1,'Remedios Stricklandhas sent the payment against order #7355012','App\\Models\\Order',12,0,'App\\Models\\Admin',1,'App\\Http\\Controllers\\User',1,'2023-10-30 12:22:07','2023-10-30 12:22:07'),(12,1,'Remedios Stricklandhas sent the payment against order #211284','App\\Models\\Order',4,0,'App\\Models\\Admin',1,'App\\Http\\Controllers\\User',1,'2023-10-30 12:25:24','2023-10-30 12:25:24'),(13,1,'Remedios Stricklandhas sent the payment against order #76163','App\\Models\\Order',3,0,'App\\Models\\Admin',1,'App\\Http\\Controllers\\User',1,'2023-10-30 12:33:41','2023-10-30 12:33:41'),(14,1,'Remedios Stricklandhas sent the payment against order #2381614','App\\Models\\Order',14,0,'App\\Models\\Admin',1,'App\\Http\\Controllers\\User',1,'2023-10-30 12:40:16','2023-10-30 12:40:16'),(15,1,'Remedios Stricklandhas sent the payment against order #7355012','App\\Models\\Order',12,0,'App\\Models\\Admin',1,'App\\Http\\Controllers\\User',1,'2023-10-30 12:52:54','2023-10-30 12:52:54'),(16,1,'Remedios Stricklandhas sent the payment against order #211284','App\\Models\\Order',4,0,'App\\Models\\Admin',1,'App\\Http\\Controllers\\User',1,'2023-10-30 12:56:19','2023-10-30 12:56:19'),(17,1,'Remedios Stricklandhas sent the payment against order #76163','App\\Models\\Order',3,0,'App\\Models\\Admin',1,'App\\Http\\Controllers\\User',1,'2023-10-30 13:07:46','2023-10-30 13:07:46'),(18,1,'Remedios Stricklandhas sent the payment against order #7355012','App\\Models\\Order',12,0,'App\\Models\\Admin',1,'App\\Http\\Controllers\\User',1,'2023-10-30 13:25:44','2023-10-30 13:25:44'),(19,1,'Remedios Stricklandhas sent the payment against order #211284','App\\Models\\Order',4,0,'App\\Models\\Admin',1,'App\\Http\\Controllers\\User',1,'2023-10-30 13:30:14','2023-10-30 13:30:14'),(20,1,'Remedios Stricklandhas sent the payment against order #76163','App\\Models\\Order',3,0,'App\\Models\\Admin',1,'App\\Http\\Controllers\\User',1,'2023-10-30 13:51:02','2023-10-30 13:51:02'),(21,1,'Remedios Stricklandhas sent the payment against order #2381614','App\\Models\\Order',14,0,'App\\Models\\Admin',1,'App\\Http\\Controllers\\User',1,'2023-10-30 13:55:50','2023-10-30 13:55:50'),(22,1,'Remedios Stricklandhas sent the payment against order #7355012','App\\Models\\Order',12,0,'App\\Models\\Admin',1,'App\\Http\\Controllers\\User',1,'2023-10-30 13:57:20','2023-10-30 13:57:20'),(23,1,'Remedios Stricklandhas sent the payment against order #211284','App\\Models\\Order',4,0,'App\\Models\\Admin',1,'App\\Http\\Controllers\\User',1,'2023-10-30 14:20:34','2023-10-30 14:20:34'),(24,1,'Remedios Stricklandhas sent the payment against order #76163','App\\Models\\Order',3,0,'App\\Models\\Admin',1,'App\\Http\\Controllers\\User',1,'2023-10-30 14:25:10','2023-10-30 14:25:10'),(25,1,'Remedios Stricklandhas sent the payment against order #2381614','App\\Models\\Order',14,0,'App\\Models\\Admin',1,'App\\Http\\Controllers\\User',1,'2023-10-30 14:28:03','2023-10-30 14:28:03'),(26,1,'Remedios Stricklandhas sent the payment against order #2381614','App\\Models\\Order',14,0,'App\\Models\\Admin',1,'App\\Http\\Controllers\\User',1,'2023-10-30 14:39:38','2023-10-30 14:39:38'),(27,1,'Remedios Stricklandhas sent the payment against order #7355012','App\\Models\\Order',12,0,'App\\Models\\Admin',1,'App\\Http\\Controllers\\User',1,'2023-10-30 14:47:52','2023-10-30 14:47:52'),(28,1,'Remedios Stricklandhas sent the payment against order #211284','App\\Models\\Order',4,0,'App\\Models\\Admin',1,'App\\Http\\Controllers\\User',1,'2023-10-30 14:51:23','2023-10-30 14:51:23'),(29,1,'Remedios Stricklandhas sent the payment against order #76163','App\\Models\\Order',3,0,'App\\Models\\Admin',1,'App\\Http\\Controllers\\User',1,'2023-10-30 16:24:14','2023-10-30 16:24:14');
/*!40000 ALTER TABLE `notifications` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `order_details`
--

DROP TABLE IF EXISTS `order_details`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `order_details` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order_details`
--

LOCK TABLES `order_details` WRITE;
/*!40000 ALTER TABLE `order_details` DISABLE KEYS */;
/*!40000 ALTER TABLE `order_details` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `order_metas`
--

DROP TABLE IF EXISTS `order_metas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `order_metas` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `order_id` bigint unsigned NOT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `order_metas_order_id_foreign` (`order_id`),
  CONSTRAINT `order_metas_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order_metas`
--

LOCK TABLES `order_metas` WRITE;
/*!40000 ALTER TABLE `order_metas` DISABLE KEYS */;
/*!40000 ALTER TABLE `order_metas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `orders` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `order_number` int NOT NULL,
  `user_id` bigint unsigned NOT NULL,
  `product_id` bigint unsigned NOT NULL,
  `price` double(8,2) DEFAULT NULL,
  `is_reviewed` tinyint(1) NOT NULL DEFAULT '0',
  `no_of_review` int NOT NULL DEFAULT '0',
  `is_paid` tinyint(1) NOT NULL DEFAULT '0',
  `description` text COLLATE utf8mb4_unicode_ci,
  `submission_note` text COLLATE utf8mb4_unicode_ci,
  `final_review_note` text COLLATE utf8mb4_unicode_ci,
  `tracker_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_delivered` tinyint(1) NOT NULL DEFAULT '0',
  `status` tinyint NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `orders_order_number_unique` (`order_number`),
  KEY `orders_user_id_foreign` (`user_id`),
  KEY `orders_product_id_foreign` (`product_id`),
  CONSTRAINT `orders_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT INTO `orders` VALUES (1,672211,1,1,50.00,0,0,1,'This is just about detail data','this is instruction and images',NULL,NULL,0,4,'2023-10-26 15:14:50','2023-10-26 15:17:17'),(2,78352,1,2,1000.00,0,0,1,'this is test','this is detail instruction',NULL,'4545454',0,4,'2023-10-26 16:26:11','2023-10-26 16:49:22'),(3,76163,1,3,12.00,0,0,1,NULL,'This is first test',NULL,NULL,0,5,'2023-10-27 12:40:14','2023-10-30 16:24:14'),(4,211284,1,4,50.00,0,0,1,'this is my first detail instruction which is important','This is submission order detail where you can see the detail of my order and inforamtion',NULL,NULL,0,5,'2023-10-27 12:45:31','2023-10-30 14:51:23'),(11,4095811,1,11,NULL,0,0,0,'Officiis deserunt au','This is detail instruction',NULL,NULL,0,3,'2023-10-29 12:42:06','2023-10-30 11:51:39'),(12,7355012,1,12,12.00,0,0,1,'Quae do maiores dolo','this is test detiail',NULL,NULL,0,5,'2023-10-29 13:31:44','2023-10-30 14:47:52'),(13,1180813,1,13,NULL,0,0,0,'Ea esse id velit p',NULL,NULL,NULL,0,1,'2023-10-29 13:35:57','2023-10-29 13:35:57'),(14,2381614,1,14,430.00,0,0,1,'Accusamus eiusmod mi','this is detail',NULL,NULL,0,5,'2023-10-29 14:28:48','2023-10-30 14:39:38');
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_reset_tokens`
--

LOCK TABLES `password_reset_tokens` WRITE;
/*!40000 ALTER TABLE `password_reset_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_reset_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personal_access_tokens`
--

LOCK TABLES `personal_access_tokens` WRITE;
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_images`
--

DROP TABLE IF EXISTS `product_images`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `product_images` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `product_id` bigint unsigned NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `product_images_product_id_foreign` (`product_id`),
  CONSTRAINT `product_images_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_images`
--

LOCK TABLES `product_images` WRITE;
/*!40000 ALTER TABLE `product_images` DISABLE KEYS */;
INSERT INTO `product_images` VALUES (1,1,'products/45VKOxqb8o0cGXPTHFO1LABiF18DRlnEnFiD98WT.png','2023-10-26 15:14:07','2023-10-26 15:14:07'),(2,2,'products/YxzvkJfqCtuzMBYFpiSlByf9EOfl3putuXovrhxk.png','2023-10-26 16:25:26','2023-10-26 16:25:26'),(3,3,'products/images/FFmItGbBWoL5RhwBSIg2CGfr9OWkwiqFYnXpAsFH.png','2023-10-27 12:40:14','2023-10-27 12:40:14'),(4,4,'products/images/6mygub8HiB6BlK6pPgybq6f5vfNbpN4h9jUmBm1a.png','2023-10-27 12:45:31','2023-10-27 12:45:31'),(11,11,'products/images/UI2QqwgyYLZVriTmPxJOOZRu2EQrmO0G1L4F3Fbw.png','2023-10-29 12:42:06','2023-10-29 12:42:06'),(12,12,'products/images/Js4N6V9NK6W2fdyyp4qdMYiM0MPsmx6U7pxEeW4m.png','2023-10-29 13:31:44','2023-10-29 13:31:44'),(13,13,'products/images/sPu1Gnab9i9B7wo8FNXJt6WaEC41I0aOPnldksy1.png','2023-10-29 13:35:57','2023-10-29 13:35:57'),(14,14,'products/images/6PVPQvwe9CKwsk9nj4VwX9tQHDmVQXcTcJs4CkOD.png','2023-10-29 14:28:48','2023-10-29 14:28:48');
/*!40000 ALTER TABLE `product_images` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `products` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '1 => digitizing, 2 => vector , custom-clothing => 3, custom-patch => 4',
  `product_type` tinyint NOT NULL DEFAULT '1' COMMENT '1 => physical, 2 => digital',
  `product_quantity` int DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `attributes` json DEFAULT NULL,
  `status` tinyint NOT NULL DEFAULT '1',
  `price` double(8,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (1,'Leather Patches<','emborided-patches',1,12,NULL,'{\"width\": \"12.34\", \"height\": \"34.54\", \"backing\": \"Sew-on / None\"}',1,NULL,'2023-10-26 15:14:07','2023-10-26 15:14:07'),(2,'shorts','custom-patches',1,2,NULL,'{\"2_xl\": \"1\", \"3_xl\": \"1\", \"color\": \"red\", \"small\": \"0\", \"larage\": \"1\", \"medium\": \"0\", \"x_large\": \"1\", \"embellishment\": \"Embroidered\", \"custom_woven_tag\": \"no\"}',1,NULL,'2023-10-26 16:25:26','2023-10-26 16:25:26'),(3,'test','vector',2,1,'this is test instruction','{\"unit\": \"mm\", \"width\": \"54.21\", \"height\": \"12.45\", \"time_frame\": \"Urgent Turnaround 1-12 Hours.\", \"no_of_color\": \"2\", \"color_scheme\": \"Black and White\", \"other_format\": null, \"design_format\": \".eps\", \"name_of_color\": \"red, green\", \"where_will_use\": \"Direct To Garment\"}',1,NULL,'2023-10-27 12:40:14','2023-10-27 12:40:14'),(4,'This is my detail description','vector',2,1,NULL,'{\"unit\": \"cm\", \"width\": \"123\", \"height\": \"23\", \"time_frame\": \"Urgent Turnaround 1-12 Hours.\", \"no_of_color\": \"1\", \"color_scheme\": \"Spot Colors with NO Halftones\", \"other_format\": null, \"design_format\": \".cdr\", \"name_of_color\": \"green\", \"where_will_use\": \"Direct To Garment\"}',1,NULL,'2023-10-27 12:45:31','2023-10-27 12:45:31'),(11,'Devin Soto','vector',2,1,NULL,'{\"unit\": \"inches\", \"width\": \"80\", \"height\": \"93\", \"time_frame\": \"Urgent Turnaround 1-12 Hours.\", \"no_of_color\": \"196\", \"color_scheme\": \"Spot Colors with NO Halftones\", \"other_format\": null, \"design_format\": \".pdf\", \"name_of_color\": \"Quinlan Beach\", \"where_will_use\": \"Vinyl Cutting\"}',1,NULL,'2023-10-29 12:42:06','2023-10-29 12:42:06'),(12,'Alana Allen','vector',2,1,NULL,'{\"unit\": \"cm\", \"width\": \"61\", \"height\": \"26\", \"time_frame\": \"Urgent Turnaround 1-12 Hours.\", \"no_of_color\": \"778\", \"color_scheme\": \"Spot Colors with Halftones\", \"other_format\": null, \"design_format\": \".cdr\", \"name_of_color\": \"Ali Cohen\", \"where_will_use\": \"Sublimation\"}',1,NULL,'2023-10-29 13:31:44','2023-10-29 13:31:44'),(13,'Selma Vasquez','vector',2,1,NULL,'{\"unit\": \"mm\", \"width\": \"82\", \"height\": \"60\", \"time_frame\": \"Normal Turnaround 3 - 24 Hours.\", \"no_of_color\": \"799\", \"color_scheme\": \"Black and White with halftones\", \"other_format\": null, \"design_format\": \".eps\", \"name_of_color\": \"Mark Richard\", \"where_will_use\": \"Direct To Garment\"}',1,NULL,'2023-10-29 13:35:57','2023-10-29 13:35:57'),(14,'Larissa Preston','vector',2,1,NULL,'{\"unit\": \"inches\", \"width\": \"97\", \"height\": \"53\", \"time_frame\": \"Urgent Turnaround 1-12 Hours.\", \"no_of_color\": \"525\", \"color_scheme\": \"Black and White with halftones\", \"other_format\": null, \"design_format\": \".cdr\", \"name_of_color\": \"Chanda Roman\", \"where_will_use\": \"Sublimation\"}',1,NULL,'2023-10-29 14:28:48','2023-10-29 14:28:48');
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `quotes`
--

DROP TABLE IF EXISTS `quotes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `quotes` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `product_id` bigint unsigned NOT NULL,
  `status` tinyint NOT NULL DEFAULT '1',
  `price` double(8,2) DEFAULT NULL,
  `instruction_notes` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hear_about_us` tinyint NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `quotes_user_id_foreign` (`user_id`),
  KEY `quotes_product_id_foreign` (`product_id`),
  CONSTRAINT `quotes_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  CONSTRAINT `quotes_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `quotes`
--

LOCK TABLES `quotes` WRITE;
/*!40000 ALTER TABLE `quotes` DISABLE KEYS */;
INSERT INTO `quotes` VALUES (1,1,1,3,50.00,'This is just about detail data',1,'2023-10-26 15:14:07','2023-10-26 15:14:50'),(2,1,2,3,1000.00,'this is test',1,'2023-10-26 16:25:26','2023-10-26 16:26:11');
/*!40000 ALTER TABLE `quotes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `shipping_details`
--

DROP TABLE IF EXISTS `shipping_details`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `shipping_details` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `order_id` bigint unsigned NOT NULL,
  `user_id` bigint unsigned NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zip_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `shipping_details_order_id_foreign` (`order_id`),
  KEY `shipping_details_user_id_foreign` (`user_id`),
  CONSTRAINT `shipping_details_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  CONSTRAINT `shipping_details_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shipping_details`
--

LOCK TABLES `shipping_details` WRITE;
/*!40000 ALTER TABLE `shipping_details` DISABLE KEYS */;
INSERT INTO `shipping_details` VALUES (1,1,1,'House # 87, Street # 6, PCSIR Society',NULL,NULL,NULL,'3555487327','2023-10-26 15:17:17','2023-10-26 15:17:17'),(2,2,1,'House # 87, Street # 6, PCSIR Society',NULL,NULL,NULL,'0000000000','2023-10-26 16:28:22','2023-10-26 16:28:22');
/*!40000 ALTER TABLE `shipping_details` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `submit_order_attachements`
--

DROP TABLE IF EXISTS `submit_order_attachements`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `submit_order_attachements` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `order_id` bigint unsigned NOT NULL,
  `attachment` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `submit_order_attachements_order_id_foreign` (`order_id`),
  CONSTRAINT `submit_order_attachements_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `submit_order_attachements`
--

LOCK TABLES `submit_order_attachements` WRITE;
/*!40000 ALTER TABLE `submit_order_attachements` DISABLE KEYS */;
INSERT INTO `submit_order_attachements` VALUES (1,1,'source-files/6KkdMxHH4o8S5Yxx8WpcYHj17rUOv2fq25vo8WDE.png','2023-10-26 15:16:03','2023-10-26 15:16:03'),(2,2,'source-files/gzzTpamkzRWAEijzLOPkISogdHBzVT7z4OukQyDw.png','2023-10-26 16:27:15','2023-10-26 16:27:15'),(3,4,'source-files/YkPLDWQ6VcJwDxexW6wm4JVCyJ8HD9lz2SZmdtP6.zip','2023-10-27 13:50:49','2023-10-27 13:50:49'),(4,4,'source-files/saMbYtLhMzVvHPWMw0vWj09BU4CYy23AO9jzn1jS.jpg','2023-10-27 13:50:49','2023-10-27 13:50:49'),(5,4,'source-files/2o6UIXtQAyYFsSZU1HQAgo9keNHpa8XQhcaO1ol8.avif','2023-10-27 13:50:49','2023-10-27 13:50:49'),(6,3,'source-files/WugKKsSHWvRVQFFAovA6LcWkxxNtPlg7xdJIPNhf.zip','2023-10-27 15:24:22','2023-10-27 15:24:22'),(7,11,'source-files/iq4dTOtypULTbU07416NrriBDM6CdqXt3BPgK37E.png','2023-10-30 11:51:39','2023-10-30 11:51:39'),(8,11,'source-files/0x2Ii9pguazfM0LPW2qLLUHMC6QLirqVCNc2XOsk.zip','2023-10-30 11:51:39','2023-10-30 11:51:39'),(9,12,'source-files/neOCQf5HPjqWIvA9iihlMeitgOoZD9lcyhVJYBTx.zip','2023-10-30 11:56:15','2023-10-30 11:56:15'),(10,12,'source-files/KygR0urjnJQ6ClEoWugBKZmh14Q7oad3QkKRqjc9.png','2023-10-30 11:56:15','2023-10-30 11:56:15'),(11,14,'source-files/ArIrUSKvvf0SwDPqJuWuDfrvGWA23rAuanDbzaLN.zip','2023-10-30 11:58:16','2023-10-30 11:58:16'),(12,14,'source-files/IPzngC0sRR3fajc6ME34X2YwdcafdnDTeSBCE5H3.png','2023-10-30 11:58:16','2023-10-30 11:58:16'),(13,14,'source-files/F1f0Z8U5k3zTGnoAGlP8dfRHmWFA9W3iqFT5lGs7.png','2023-10-30 11:58:16','2023-10-30 11:58:16');
/*!40000 ALTER TABLE `submit_order_attachements` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `submit_orders`
--

DROP TABLE IF EXISTS `submit_orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `submit_orders` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `order_id` bigint unsigned NOT NULL,
  `user_id` bigint unsigned NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `price` decimal(8,2) DEFAULT NULL,
  `is_paid` tinyint(1) NOT NULL DEFAULT '0',
  `is_reviewed` tinyint(1) NOT NULL DEFAULT '0',
  `no_of_review` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `submit_orders_order_id_foreign` (`order_id`),
  KEY `submit_orders_user_id_foreign` (`user_id`),
  CONSTRAINT `submit_orders_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  CONSTRAINT `submit_orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `admins` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `submit_orders`
--

LOCK TABLES `submit_orders` WRITE;
/*!40000 ALTER TABLE `submit_orders` DISABLE KEYS */;
/*!40000 ALTER TABLE `submit_orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `subscription_items`
--

DROP TABLE IF EXISTS `subscription_items`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `subscription_items` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `subscription_id` bigint unsigned NOT NULL,
  `stripe_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stripe_product` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stripe_price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `subscription_items_subscription_id_stripe_price_unique` (`subscription_id`,`stripe_price`),
  UNIQUE KEY `subscription_items_stripe_id_unique` (`stripe_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subscription_items`
--

LOCK TABLES `subscription_items` WRITE;
/*!40000 ALTER TABLE `subscription_items` DISABLE KEYS */;
/*!40000 ALTER TABLE `subscription_items` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `subscriptions`
--

DROP TABLE IF EXISTS `subscriptions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `subscriptions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stripe_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stripe_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stripe_price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity` int DEFAULT NULL,
  `trial_ends_at` timestamp NULL DEFAULT NULL,
  `ends_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `subscriptions_stripe_id_unique` (`stripe_id`),
  KEY `subscriptions_user_id_stripe_status_index` (`user_id`,`stripe_status`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subscriptions`
--

LOCK TABLES `subscriptions` WRITE;
/*!40000 ALTER TABLE `subscriptions` DISABLE KEYS */;
/*!40000 ALTER TABLE `subscriptions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `transactions`
--

DROP TABLE IF EXISTS `transactions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `transactions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `transaction_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stripe_response` text COLLATE utf8mb4_unicode_ci,
  `amount` decimal(8,2) NOT NULL,
  `invoice_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_id` bigint unsigned NOT NULL,
  `user_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `transactions_order_id_foreign` (`order_id`),
  KEY `transactions_user_id_foreign` (`user_id`),
  CONSTRAINT `transactions_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  CONSTRAINT `transactions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `transactions`
--

LOCK TABLES `transactions` WRITE;
/*!40000 ALTER TABLE `transactions` DISABLE KEYS */;
INSERT INTO `transactions` VALUES (1,'pi_3O5ZzUHlJ57SdeJa1kEq2cbc','{\"id\":\"pi_3O5ZzUHlJ57SdeJa1kEq2cbc\",\"object\":\"payment_intent\",\"amount\":5000,\"amount_capturable\":0,\"amount_details\":{\"tip\":[]},\"amount_received\":5000,\"application\":null,\"application_fee_amount\":null,\"automatic_payment_methods\":null,\"canceled_at\":null,\"cancellation_reason\":null,\"capture_method\":\"automatic\",\"client_secret\":\"pi_3O5ZzUHlJ57SdeJa1kEq2cbc_secret_Ac39VP21fz8Kq9IBCh39LUnQA\",\"confirmation_method\":\"automatic\",\"created\":1698351436,\"currency\":\"usd\",\"customer\":\"cus_OtMfjrzQ21ViRQ\",\"description\":null,\"invoice\":null,\"last_payment_error\":null,\"latest_charge\":\"ch_3O5ZzUHlJ57SdeJa1P5eZOOE\",\"livemode\":false,\"metadata\":[],\"next_action\":null,\"on_behalf_of\":null,\"payment_method\":\"pm_1O5ZzPHlJ57SdeJai5E62jqj\",\"payment_method_configuration_details\":null,\"payment_method_options\":{\"card\":{\"installments\":null,\"mandate_options\":null,\"network\":null,\"request_three_d_secure\":\"automatic\"}},\"payment_method_types\":[\"card\"],\"processing\":null,\"receipt_email\":null,\"review\":null,\"setup_future_usage\":null,\"shipping\":null,\"source\":null,\"statement_descriptor\":null,\"statement_descriptor_suffix\":null,\"status\":\"succeeded\",\"transfer_data\":null,\"transfer_group\":null}',50.00,NULL,1,1,'2023-10-26 15:17:17','2023-10-26 15:17:17'),(2,'pi_3O5b6HHlJ57SdeJa0DrdTC9e','{\"id\":\"pi_3O5b6HHlJ57SdeJa0DrdTC9e\",\"object\":\"payment_intent\",\"amount\":100000,\"amount_capturable\":0,\"amount_details\":{\"tip\":[]},\"amount_received\":100000,\"application\":null,\"application_fee_amount\":null,\"automatic_payment_methods\":null,\"canceled_at\":null,\"cancellation_reason\":null,\"capture_method\":\"automatic\",\"client_secret\":\"pi_3O5b6HHlJ57SdeJa0DrdTC9e_secret_eiY298zi5VRz8YprYFOC0RqZE\",\"confirmation_method\":\"automatic\",\"created\":1698355701,\"currency\":\"usd\",\"customer\":\"cus_OtMfjrzQ21ViRQ\",\"description\":null,\"invoice\":null,\"last_payment_error\":null,\"latest_charge\":\"ch_3O5b6HHlJ57SdeJa0AnFTuc4\",\"livemode\":false,\"metadata\":[],\"next_action\":null,\"on_behalf_of\":null,\"payment_method\":\"pm_1O5b6DHlJ57SdeJa4VpRgJdM\",\"payment_method_configuration_details\":null,\"payment_method_options\":{\"card\":{\"installments\":null,\"mandate_options\":null,\"network\":null,\"request_three_d_secure\":\"automatic\"}},\"payment_method_types\":[\"card\"],\"processing\":null,\"receipt_email\":null,\"review\":null,\"setup_future_usage\":null,\"shipping\":null,\"source\":null,\"statement_descriptor\":null,\"statement_descriptor_suffix\":null,\"status\":\"succeeded\",\"transfer_data\":null,\"transfer_group\":null}',1000.00,NULL,2,1,'2023-10-26 16:28:22','2023-10-26 16:28:22'),(3,'pi_3O5vs1HlJ57SdeJa1DgHmiqw','{\"id\":\"pi_3O5vs1HlJ57SdeJa1DgHmiqw\",\"object\":\"payment_intent\",\"amount\":5000,\"amount_capturable\":0,\"amount_details\":{\"tip\":[]},\"amount_received\":5000,\"application\":null,\"application_fee_amount\":null,\"automatic_payment_methods\":null,\"canceled_at\":null,\"cancellation_reason\":null,\"capture_method\":\"automatic\",\"client_secret\":\"pi_3O5vs1HlJ57SdeJa1DgHmiqw_secret_WjYiXxZZ1vOzpheKadHQTXntW\",\"confirmation_method\":\"automatic\",\"created\":1698435541,\"currency\":\"usd\",\"customer\":\"cus_OtMfjrzQ21ViRQ\",\"description\":null,\"invoice\":null,\"last_payment_error\":null,\"latest_charge\":\"ch_3O5vs1HlJ57SdeJa1AnAai4D\",\"livemode\":false,\"metadata\":[],\"next_action\":null,\"on_behalf_of\":null,\"payment_method\":\"pm_1O5vrxHlJ57SdeJamNyP2Lwd\",\"payment_method_configuration_details\":null,\"payment_method_options\":{\"card\":{\"installments\":null,\"mandate_options\":null,\"network\":null,\"request_three_d_secure\":\"automatic\"}},\"payment_method_types\":[\"card\"],\"processing\":null,\"receipt_email\":null,\"review\":null,\"setup_future_usage\":null,\"shipping\":null,\"source\":null,\"statement_descriptor\":null,\"statement_descriptor_suffix\":null,\"status\":\"succeeded\",\"transfer_data\":null,\"transfer_group\":null}',50.00,NULL,4,1,'2023-10-27 14:39:03','2023-10-27 14:39:03'),(4,'pi_3O6yhUHlJ57SdeJa1u8S5ZAA','{\"id\":\"pi_3O6yhUHlJ57SdeJa1u8S5ZAA\",\"object\":\"payment_intent\",\"amount\":1200,\"amount_capturable\":0,\"amount_details\":{\"tip\":[]},\"amount_received\":1200,\"application\":null,\"application_fee_amount\":null,\"automatic_payment_methods\":null,\"canceled_at\":null,\"cancellation_reason\":null,\"capture_method\":\"automatic\",\"client_secret\":\"pi_3O6yhUHlJ57SdeJa1u8S5ZAA_secret_jLWQMspamzjxplNN2fytWEo7Q\",\"confirmation_method\":\"automatic\",\"created\":1698684748,\"currency\":\"usd\",\"customer\":\"cus_OtMfjrzQ21ViRQ\",\"description\":null,\"invoice\":null,\"last_payment_error\":null,\"latest_charge\":\"ch_3O6yhUHlJ57SdeJa1VKgdsai\",\"livemode\":false,\"metadata\":[],\"next_action\":null,\"on_behalf_of\":null,\"payment_method\":\"pm_1O6yhPHlJ57SdeJa51RuCLjz\",\"payment_method_configuration_details\":null,\"payment_method_options\":{\"card\":{\"installments\":null,\"mandate_options\":null,\"network\":null,\"request_three_d_secure\":\"automatic\"}},\"payment_method_types\":[\"card\"],\"processing\":null,\"receipt_email\":null,\"review\":null,\"setup_future_usage\":null,\"shipping\":null,\"source\":null,\"statement_descriptor\":null,\"statement_descriptor_suffix\":null,\"status\":\"succeeded\",\"transfer_data\":null,\"transfer_group\":null}',12.00,NULL,3,1,'2023-10-30 11:52:29','2023-10-30 11:52:29'),(5,'pi_3O6ynzHlJ57SdeJa1oKzn98Z','{\"id\":\"pi_3O6ynzHlJ57SdeJa1oKzn98Z\",\"object\":\"payment_intent\",\"amount\":5000,\"amount_capturable\":0,\"amount_details\":{\"tip\":[]},\"amount_received\":5000,\"application\":null,\"application_fee_amount\":null,\"automatic_payment_methods\":null,\"canceled_at\":null,\"cancellation_reason\":null,\"capture_method\":\"automatic\",\"client_secret\":\"pi_3O6ynzHlJ57SdeJa1oKzn98Z_secret_TPp0muzmeznIK6U9gou3CoVyP\",\"confirmation_method\":\"automatic\",\"created\":1698685151,\"currency\":\"usd\",\"customer\":\"cus_OtMfjrzQ21ViRQ\",\"description\":null,\"invoice\":null,\"last_payment_error\":null,\"latest_charge\":\"ch_3O6ynzHlJ57SdeJa13QcoZki\",\"livemode\":false,\"metadata\":[],\"next_action\":null,\"on_behalf_of\":null,\"payment_method\":\"pm_1O6ynvHlJ57SdeJarGYawf7d\",\"payment_method_configuration_details\":null,\"payment_method_options\":{\"card\":{\"installments\":null,\"mandate_options\":null,\"network\":null,\"request_three_d_secure\":\"automatic\"}},\"payment_method_types\":[\"card\"],\"processing\":null,\"receipt_email\":null,\"review\":null,\"setup_future_usage\":null,\"shipping\":null,\"source\":null,\"statement_descriptor\":null,\"statement_descriptor_suffix\":null,\"status\":\"succeeded\",\"transfer_data\":null,\"transfer_group\":null}',50.00,NULL,14,1,'2023-10-30 11:59:12','2023-10-30 11:59:12'),(6,'pi_3O6yyzHlJ57SdeJa0ZkWFIOE','{\"id\":\"pi_3O6yyzHlJ57SdeJa0ZkWFIOE\",\"object\":\"payment_intent\",\"amount\":43000,\"amount_capturable\":0,\"amount_details\":{\"tip\":[]},\"amount_received\":43000,\"application\":null,\"application_fee_amount\":null,\"automatic_payment_methods\":null,\"canceled_at\":null,\"cancellation_reason\":null,\"capture_method\":\"automatic\",\"client_secret\":\"pi_3O6yyzHlJ57SdeJa0ZkWFIOE_secret_RldBbyBVPAOHPhD2sjKAQdtf7\",\"confirmation_method\":\"automatic\",\"created\":1698685833,\"currency\":\"usd\",\"customer\":\"cus_OtMfjrzQ21ViRQ\",\"description\":null,\"invoice\":null,\"last_payment_error\":null,\"latest_charge\":\"ch_3O6yyzHlJ57SdeJa0ktNnqzg\",\"livemode\":false,\"metadata\":[],\"next_action\":null,\"on_behalf_of\":null,\"payment_method\":\"pm_1O6yyuHlJ57SdeJaawNqBNn0\",\"payment_method_configuration_details\":null,\"payment_method_options\":{\"card\":{\"installments\":null,\"mandate_options\":null,\"network\":null,\"request_three_d_secure\":\"automatic\"}},\"payment_method_types\":[\"card\"],\"processing\":null,\"receipt_email\":null,\"review\":null,\"setup_future_usage\":null,\"shipping\":null,\"source\":null,\"statement_descriptor\":null,\"statement_descriptor_suffix\":null,\"status\":\"succeeded\",\"transfer_data\":null,\"transfer_group\":null}',430.00,NULL,14,1,'2023-10-30 12:10:34','2023-10-30 12:10:34'),(7,'pi_3O6zAAHlJ57SdeJa0RJXHyy7','{\"id\":\"pi_3O6zAAHlJ57SdeJa0RJXHyy7\",\"object\":\"payment_intent\",\"amount\":1200,\"amount_capturable\":0,\"amount_details\":{\"tip\":[]},\"amount_received\":1200,\"application\":null,\"application_fee_amount\":null,\"automatic_payment_methods\":null,\"canceled_at\":null,\"cancellation_reason\":null,\"capture_method\":\"automatic\",\"client_secret\":\"pi_3O6zAAHlJ57SdeJa0RJXHyy7_secret_mLu9iQ63XGfrvxPf9EtgPuxB4\",\"confirmation_method\":\"automatic\",\"created\":1698686526,\"currency\":\"usd\",\"customer\":\"cus_OtMfjrzQ21ViRQ\",\"description\":null,\"invoice\":null,\"last_payment_error\":null,\"latest_charge\":\"ch_3O6zAAHlJ57SdeJa01WmNref\",\"livemode\":false,\"metadata\":[],\"next_action\":null,\"on_behalf_of\":null,\"payment_method\":\"pm_1O6zA6HlJ57SdeJabSN5GN4B\",\"payment_method_configuration_details\":null,\"payment_method_options\":{\"card\":{\"installments\":null,\"mandate_options\":null,\"network\":null,\"request_three_d_secure\":\"automatic\"}},\"payment_method_types\":[\"card\"],\"processing\":null,\"receipt_email\":null,\"review\":null,\"setup_future_usage\":null,\"shipping\":null,\"source\":null,\"statement_descriptor\":null,\"statement_descriptor_suffix\":null,\"status\":\"succeeded\",\"transfer_data\":null,\"transfer_group\":null}',12.00,NULL,12,1,'2023-10-30 12:22:07','2023-10-30 12:22:07'),(8,'pi_3O6zDLHlJ57SdeJa0fOEbbDc','{\"id\":\"pi_3O6zDLHlJ57SdeJa0fOEbbDc\",\"object\":\"payment_intent\",\"amount\":5000,\"amount_capturable\":0,\"amount_details\":{\"tip\":[]},\"amount_received\":5000,\"application\":null,\"application_fee_amount\":null,\"automatic_payment_methods\":null,\"canceled_at\":null,\"cancellation_reason\":null,\"capture_method\":\"automatic\",\"client_secret\":\"pi_3O6zDLHlJ57SdeJa0fOEbbDc_secret_jwtq8bvuvhDDsSykbI79D7dym\",\"confirmation_method\":\"automatic\",\"created\":1698686723,\"currency\":\"usd\",\"customer\":\"cus_OtMfjrzQ21ViRQ\",\"description\":null,\"invoice\":null,\"last_payment_error\":null,\"latest_charge\":\"ch_3O6zDLHlJ57SdeJa0qwyNtPi\",\"livemode\":false,\"metadata\":[],\"next_action\":null,\"on_behalf_of\":null,\"payment_method\":\"pm_1O6zDGHlJ57SdeJaRehUijRZ\",\"payment_method_configuration_details\":null,\"payment_method_options\":{\"card\":{\"installments\":null,\"mandate_options\":null,\"network\":null,\"request_three_d_secure\":\"automatic\"}},\"payment_method_types\":[\"card\"],\"processing\":null,\"receipt_email\":null,\"review\":null,\"setup_future_usage\":null,\"shipping\":null,\"source\":null,\"statement_descriptor\":null,\"statement_descriptor_suffix\":null,\"status\":\"succeeded\",\"transfer_data\":null,\"transfer_group\":null}',50.00,NULL,4,1,'2023-10-30 12:25:24','2023-10-30 12:25:24'),(9,'pi_3O6zLMHlJ57SdeJa0TphHt9a','{\"id\":\"pi_3O6zLMHlJ57SdeJa0TphHt9a\",\"object\":\"payment_intent\",\"amount\":1200,\"amount_capturable\":0,\"amount_details\":{\"tip\":[]},\"amount_received\":1200,\"application\":null,\"application_fee_amount\":null,\"automatic_payment_methods\":null,\"canceled_at\":null,\"cancellation_reason\":null,\"capture_method\":\"automatic\",\"client_secret\":\"pi_3O6zLMHlJ57SdeJa0TphHt9a_secret_no281r1oqjNkJZSus4r6r2jzB\",\"confirmation_method\":\"automatic\",\"created\":1698687220,\"currency\":\"usd\",\"customer\":\"cus_OtMfjrzQ21ViRQ\",\"description\":null,\"invoice\":null,\"last_payment_error\":null,\"latest_charge\":\"ch_3O6zLMHlJ57SdeJa09DII672\",\"livemode\":false,\"metadata\":[],\"next_action\":null,\"on_behalf_of\":null,\"payment_method\":\"pm_1O6zLIHlJ57SdeJa28vGtHxR\",\"payment_method_configuration_details\":null,\"payment_method_options\":{\"card\":{\"installments\":null,\"mandate_options\":null,\"network\":null,\"request_three_d_secure\":\"automatic\"}},\"payment_method_types\":[\"card\"],\"processing\":null,\"receipt_email\":null,\"review\":null,\"setup_future_usage\":null,\"shipping\":null,\"source\":null,\"statement_descriptor\":null,\"statement_descriptor_suffix\":null,\"status\":\"succeeded\",\"transfer_data\":null,\"transfer_group\":null}',12.00,NULL,3,1,'2023-10-30 12:33:41','2023-10-30 12:33:41'),(10,'pi_3O6zRjHlJ57SdeJa0btAsfqR','{\"id\":\"pi_3O6zRjHlJ57SdeJa0btAsfqR\",\"object\":\"payment_intent\",\"amount\":43000,\"amount_capturable\":0,\"amount_details\":{\"tip\":[]},\"amount_received\":43000,\"application\":null,\"application_fee_amount\":null,\"automatic_payment_methods\":null,\"canceled_at\":null,\"cancellation_reason\":null,\"capture_method\":\"automatic\",\"client_secret\":\"pi_3O6zRjHlJ57SdeJa0btAsfqR_secret_kIz61ue9C6Tv3hYupFhJEBGAu\",\"confirmation_method\":\"automatic\",\"created\":1698687615,\"currency\":\"usd\",\"customer\":\"cus_OtMfjrzQ21ViRQ\",\"description\":null,\"invoice\":null,\"last_payment_error\":null,\"latest_charge\":\"ch_3O6zRjHlJ57SdeJa004YqvS6\",\"livemode\":false,\"metadata\":[],\"next_action\":null,\"on_behalf_of\":null,\"payment_method\":\"pm_1O6zReHlJ57SdeJaVcszynTT\",\"payment_method_configuration_details\":null,\"payment_method_options\":{\"card\":{\"installments\":null,\"mandate_options\":null,\"network\":null,\"request_three_d_secure\":\"automatic\"}},\"payment_method_types\":[\"card\"],\"processing\":null,\"receipt_email\":null,\"review\":null,\"setup_future_usage\":null,\"shipping\":null,\"source\":null,\"statement_descriptor\":null,\"statement_descriptor_suffix\":null,\"status\":\"succeeded\",\"transfer_data\":null,\"transfer_group\":null}',430.00,NULL,14,1,'2023-10-30 12:40:16','2023-10-30 12:40:16'),(11,'pi_3O6zdxHlJ57SdeJa0LcbOT1G','{\"id\":\"pi_3O6zdxHlJ57SdeJa0LcbOT1G\",\"object\":\"payment_intent\",\"amount\":1200,\"amount_capturable\":0,\"amount_details\":{\"tip\":[]},\"amount_received\":1200,\"application\":null,\"application_fee_amount\":null,\"automatic_payment_methods\":null,\"canceled_at\":null,\"cancellation_reason\":null,\"capture_method\":\"automatic\",\"client_secret\":\"pi_3O6zdxHlJ57SdeJa0LcbOT1G_secret_NC9VHaYLELKwxEG5WP5ZcJp3E\",\"confirmation_method\":\"automatic\",\"created\":1698688373,\"currency\":\"usd\",\"customer\":\"cus_OtMfjrzQ21ViRQ\",\"description\":null,\"invoice\":null,\"last_payment_error\":null,\"latest_charge\":\"ch_3O6zdxHlJ57SdeJa05YTzHKs\",\"livemode\":false,\"metadata\":[],\"next_action\":null,\"on_behalf_of\":null,\"payment_method\":\"pm_1O6zduHlJ57SdeJaHLhhJsmG\",\"payment_method_configuration_details\":null,\"payment_method_options\":{\"card\":{\"installments\":null,\"mandate_options\":null,\"network\":null,\"request_three_d_secure\":\"automatic\"}},\"payment_method_types\":[\"card\"],\"processing\":null,\"receipt_email\":null,\"review\":null,\"setup_future_usage\":null,\"shipping\":null,\"source\":null,\"statement_descriptor\":null,\"statement_descriptor_suffix\":null,\"status\":\"succeeded\",\"transfer_data\":null,\"transfer_group\":null}',12.00,NULL,12,1,'2023-10-30 12:52:54','2023-10-30 12:52:54'),(12,'pi_3O6zhFHlJ57SdeJa16xWkza2','{\"id\":\"pi_3O6zhFHlJ57SdeJa16xWkza2\",\"object\":\"payment_intent\",\"amount\":5000,\"amount_capturable\":0,\"amount_details\":{\"tip\":[]},\"amount_received\":5000,\"application\":null,\"application_fee_amount\":null,\"automatic_payment_methods\":null,\"canceled_at\":null,\"cancellation_reason\":null,\"capture_method\":\"automatic\",\"client_secret\":\"pi_3O6zhFHlJ57SdeJa16xWkza2_secret_WZG5cqwynmt9pMFAbY08d90Rp\",\"confirmation_method\":\"automatic\",\"created\":1698688577,\"currency\":\"usd\",\"customer\":\"cus_OtMfjrzQ21ViRQ\",\"description\":null,\"invoice\":null,\"last_payment_error\":null,\"latest_charge\":\"ch_3O6zhFHlJ57SdeJa1gEClI1W\",\"livemode\":false,\"metadata\":[],\"next_action\":null,\"on_behalf_of\":null,\"payment_method\":\"pm_1O6zhBHlJ57SdeJaqq7kK9WO\",\"payment_method_configuration_details\":null,\"payment_method_options\":{\"card\":{\"installments\":null,\"mandate_options\":null,\"network\":null,\"request_three_d_secure\":\"automatic\"}},\"payment_method_types\":[\"card\"],\"processing\":null,\"receipt_email\":null,\"review\":null,\"setup_future_usage\":null,\"shipping\":null,\"source\":null,\"statement_descriptor\":null,\"statement_descriptor_suffix\":null,\"status\":\"succeeded\",\"transfer_data\":null,\"transfer_group\":null}',50.00,NULL,4,1,'2023-10-30 12:56:19','2023-10-30 12:56:19'),(13,'pi_3O6zsLHlJ57SdeJa0Q5m9Lzx','{\"id\":\"pi_3O6zsLHlJ57SdeJa0Q5m9Lzx\",\"object\":\"payment_intent\",\"amount\":1200,\"amount_capturable\":0,\"amount_details\":{\"tip\":[]},\"amount_received\":1200,\"application\":null,\"application_fee_amount\":null,\"automatic_payment_methods\":null,\"canceled_at\":null,\"cancellation_reason\":null,\"capture_method\":\"automatic\",\"client_secret\":\"pi_3O6zsLHlJ57SdeJa0Q5m9Lzx_secret_KMqQIof41l8wdakdI9DxRHA7d\",\"confirmation_method\":\"automatic\",\"created\":1698689265,\"currency\":\"usd\",\"customer\":\"cus_OtMfjrzQ21ViRQ\",\"description\":null,\"invoice\":null,\"last_payment_error\":null,\"latest_charge\":\"ch_3O6zsLHlJ57SdeJa0EaCVDo3\",\"livemode\":false,\"metadata\":[],\"next_action\":null,\"on_behalf_of\":null,\"payment_method\":\"pm_1O6zsCHlJ57SdeJaVVAchstV\",\"payment_method_configuration_details\":null,\"payment_method_options\":{\"card\":{\"installments\":null,\"mandate_options\":null,\"network\":null,\"request_three_d_secure\":\"automatic\"}},\"payment_method_types\":[\"card\"],\"processing\":null,\"receipt_email\":null,\"review\":null,\"setup_future_usage\":null,\"shipping\":null,\"source\":null,\"statement_descriptor\":null,\"statement_descriptor_suffix\":null,\"status\":\"succeeded\",\"transfer_data\":null,\"transfer_group\":null}',12.00,NULL,3,1,'2023-10-30 13:07:46','2023-10-30 13:07:46'),(14,'pi_3O709jHlJ57SdeJa1Clcc63p','{\"id\":\"pi_3O709jHlJ57SdeJa1Clcc63p\",\"object\":\"payment_intent\",\"amount\":1200,\"amount_capturable\":0,\"amount_details\":{\"tip\":[]},\"amount_received\":1200,\"application\":null,\"application_fee_amount\":null,\"automatic_payment_methods\":null,\"canceled_at\":null,\"cancellation_reason\":null,\"capture_method\":\"automatic\",\"client_secret\":\"pi_3O709jHlJ57SdeJa1Clcc63p_secret_4ZlwWNQLyZkUa4X1fKuATZFbO\",\"confirmation_method\":\"automatic\",\"created\":1698690343,\"currency\":\"usd\",\"customer\":\"cus_OtMfjrzQ21ViRQ\",\"description\":null,\"invoice\":null,\"last_payment_error\":null,\"latest_charge\":\"ch_3O709jHlJ57SdeJa1POEKOFR\",\"livemode\":false,\"metadata\":[],\"next_action\":null,\"on_behalf_of\":null,\"payment_method\":\"pm_1O709eHlJ57SdeJaZWis1YFE\",\"payment_method_configuration_details\":null,\"payment_method_options\":{\"card\":{\"installments\":null,\"mandate_options\":null,\"network\":null,\"request_three_d_secure\":\"automatic\"}},\"payment_method_types\":[\"card\"],\"processing\":null,\"receipt_email\":null,\"review\":null,\"setup_future_usage\":null,\"shipping\":null,\"source\":null,\"statement_descriptor\":null,\"statement_descriptor_suffix\":null,\"status\":\"succeeded\",\"transfer_data\":null,\"transfer_group\":null}',12.00,NULL,12,1,'2023-10-30 13:25:44','2023-10-30 13:25:44'),(15,'pi_3O70E5HlJ57SdeJa1VJggBXT','{\"id\":\"pi_3O70E5HlJ57SdeJa1VJggBXT\",\"object\":\"payment_intent\",\"amount\":5000,\"amount_capturable\":0,\"amount_details\":{\"tip\":[]},\"amount_received\":5000,\"application\":null,\"application_fee_amount\":null,\"automatic_payment_methods\":null,\"canceled_at\":null,\"cancellation_reason\":null,\"capture_method\":\"automatic\",\"client_secret\":\"pi_3O70E5HlJ57SdeJa1VJggBXT_secret_8bVocJ5qicYrddNCgNFQvsAaX\",\"confirmation_method\":\"automatic\",\"created\":1698690613,\"currency\":\"usd\",\"customer\":\"cus_OtMfjrzQ21ViRQ\",\"description\":null,\"invoice\":null,\"last_payment_error\":null,\"latest_charge\":\"ch_3O70E5HlJ57SdeJa1tr9VqAs\",\"livemode\":false,\"metadata\":[],\"next_action\":null,\"on_behalf_of\":null,\"payment_method\":\"pm_1O70E1HlJ57SdeJaY3khWQuV\",\"payment_method_configuration_details\":null,\"payment_method_options\":{\"card\":{\"installments\":null,\"mandate_options\":null,\"network\":null,\"request_three_d_secure\":\"automatic\"}},\"payment_method_types\":[\"card\"],\"processing\":null,\"receipt_email\":null,\"review\":null,\"setup_future_usage\":null,\"shipping\":null,\"source\":null,\"statement_descriptor\":null,\"statement_descriptor_suffix\":null,\"status\":\"succeeded\",\"transfer_data\":null,\"transfer_group\":null}',50.00,NULL,4,1,'2023-10-30 13:30:14','2023-10-30 13:30:14'),(16,'pi_3O70YDHlJ57SdeJa1G2olsFi','{\"id\":\"pi_3O70YDHlJ57SdeJa1G2olsFi\",\"object\":\"payment_intent\",\"amount\":1200,\"amount_capturable\":0,\"amount_details\":{\"tip\":[]},\"amount_received\":1200,\"application\":null,\"application_fee_amount\":null,\"automatic_payment_methods\":null,\"canceled_at\":null,\"cancellation_reason\":null,\"capture_method\":\"automatic\",\"client_secret\":\"pi_3O70YDHlJ57SdeJa1G2olsFi_secret_Or3KFkojfmpN82JjZMQ5wH4jD\",\"confirmation_method\":\"automatic\",\"created\":1698691861,\"currency\":\"usd\",\"customer\":\"cus_OtMfjrzQ21ViRQ\",\"description\":null,\"invoice\":null,\"last_payment_error\":null,\"latest_charge\":\"ch_3O70YDHlJ57SdeJa1JWFKQOe\",\"livemode\":false,\"metadata\":[],\"next_action\":null,\"on_behalf_of\":null,\"payment_method\":\"pm_1O70Y9HlJ57SdeJaZjp4RWc7\",\"payment_method_configuration_details\":null,\"payment_method_options\":{\"card\":{\"installments\":null,\"mandate_options\":null,\"network\":null,\"request_three_d_secure\":\"automatic\"}},\"payment_method_types\":[\"card\"],\"processing\":null,\"receipt_email\":null,\"review\":null,\"setup_future_usage\":null,\"shipping\":null,\"source\":null,\"statement_descriptor\":null,\"statement_descriptor_suffix\":null,\"status\":\"succeeded\",\"transfer_data\":null,\"transfer_group\":null}',12.00,NULL,3,1,'2023-10-30 13:51:02','2023-10-30 13:51:02'),(17,'pi_3O70crHlJ57SdeJa0HVhEij4','{\"id\":\"pi_3O70crHlJ57SdeJa0HVhEij4\",\"object\":\"payment_intent\",\"amount\":43000,\"amount_capturable\":0,\"amount_details\":{\"tip\":[]},\"amount_received\":43000,\"application\":null,\"application_fee_amount\":null,\"automatic_payment_methods\":null,\"canceled_at\":null,\"cancellation_reason\":null,\"capture_method\":\"automatic\",\"client_secret\":\"pi_3O70crHlJ57SdeJa0HVhEij4_secret_47fHUSu1H7IrHzgs7plrhLdfQ\",\"confirmation_method\":\"automatic\",\"created\":1698692149,\"currency\":\"usd\",\"customer\":\"cus_OtMfjrzQ21ViRQ\",\"description\":null,\"invoice\":null,\"last_payment_error\":null,\"latest_charge\":\"ch_3O70crHlJ57SdeJa0TiIwloU\",\"livemode\":false,\"metadata\":[],\"next_action\":null,\"on_behalf_of\":null,\"payment_method\":\"pm_1O70ciHlJ57SdeJawycnCxP9\",\"payment_method_configuration_details\":null,\"payment_method_options\":{\"card\":{\"installments\":null,\"mandate_options\":null,\"network\":null,\"request_three_d_secure\":\"automatic\"}},\"payment_method_types\":[\"card\"],\"processing\":null,\"receipt_email\":null,\"review\":null,\"setup_future_usage\":null,\"shipping\":null,\"source\":null,\"statement_descriptor\":null,\"statement_descriptor_suffix\":null,\"status\":\"succeeded\",\"transfer_data\":null,\"transfer_group\":null}',430.00,NULL,14,1,'2023-10-30 13:55:50','2023-10-30 13:55:50'),(18,'pi_3O70eJHlJ57SdeJa0wr5TsXs','{\"id\":\"pi_3O70eJHlJ57SdeJa0wr5TsXs\",\"object\":\"payment_intent\",\"amount\":1200,\"amount_capturable\":0,\"amount_details\":{\"tip\":[]},\"amount_received\":1200,\"application\":null,\"application_fee_amount\":null,\"automatic_payment_methods\":null,\"canceled_at\":null,\"cancellation_reason\":null,\"capture_method\":\"automatic\",\"client_secret\":\"pi_3O70eJHlJ57SdeJa0wr5TsXs_secret_J1S9VgeI9h5z82Gb9gXuj4gvu\",\"confirmation_method\":\"automatic\",\"created\":1698692239,\"currency\":\"usd\",\"customer\":\"cus_OtMfjrzQ21ViRQ\",\"description\":null,\"invoice\":null,\"last_payment_error\":null,\"latest_charge\":\"ch_3O70eJHlJ57SdeJa0YxpZacq\",\"livemode\":false,\"metadata\":[],\"next_action\":null,\"on_behalf_of\":null,\"payment_method\":\"pm_1O70eFHlJ57SdeJa1IAikRhi\",\"payment_method_configuration_details\":null,\"payment_method_options\":{\"card\":{\"installments\":null,\"mandate_options\":null,\"network\":null,\"request_three_d_secure\":\"automatic\"}},\"payment_method_types\":[\"card\"],\"processing\":null,\"receipt_email\":null,\"review\":null,\"setup_future_usage\":null,\"shipping\":null,\"source\":null,\"statement_descriptor\":null,\"statement_descriptor_suffix\":null,\"status\":\"succeeded\",\"transfer_data\":null,\"transfer_group\":null}',12.00,NULL,12,1,'2023-10-30 13:57:20','2023-10-30 13:57:20'),(19,'pi_3O710nHlJ57SdeJa0t6ZB7mw','{\"id\":\"pi_3O710nHlJ57SdeJa0t6ZB7mw\",\"object\":\"payment_intent\",\"amount\":5000,\"amount_capturable\":0,\"amount_details\":{\"tip\":[]},\"amount_received\":5000,\"application\":null,\"application_fee_amount\":null,\"automatic_payment_methods\":null,\"canceled_at\":null,\"cancellation_reason\":null,\"capture_method\":\"automatic\",\"client_secret\":\"pi_3O710nHlJ57SdeJa0t6ZB7mw_secret_S7TQFxzifmedhv0X4pR4SPIXy\",\"confirmation_method\":\"automatic\",\"created\":1698693633,\"currency\":\"usd\",\"customer\":\"cus_OtMfjrzQ21ViRQ\",\"description\":null,\"invoice\":null,\"last_payment_error\":null,\"latest_charge\":\"ch_3O710nHlJ57SdeJa0UTtRToM\",\"livemode\":false,\"metadata\":[],\"next_action\":null,\"on_behalf_of\":null,\"payment_method\":\"pm_1O710jHlJ57SdeJa1AphtSNa\",\"payment_method_configuration_details\":null,\"payment_method_options\":{\"card\":{\"installments\":null,\"mandate_options\":null,\"network\":null,\"request_three_d_secure\":\"automatic\"}},\"payment_method_types\":[\"card\"],\"processing\":null,\"receipt_email\":null,\"review\":null,\"setup_future_usage\":null,\"shipping\":null,\"source\":null,\"statement_descriptor\":null,\"statement_descriptor_suffix\":null,\"status\":\"succeeded\",\"transfer_data\":null,\"transfer_group\":null}',50.00,NULL,4,1,'2023-10-30 14:20:34','2023-10-30 14:20:34'),(20,'pi_3O715FHlJ57SdeJa1i9q9o8v','{\"id\":\"pi_3O715FHlJ57SdeJa1i9q9o8v\",\"object\":\"payment_intent\",\"amount\":1200,\"amount_capturable\":0,\"amount_details\":{\"tip\":[]},\"amount_received\":1200,\"application\":null,\"application_fee_amount\":null,\"automatic_payment_methods\":null,\"canceled_at\":null,\"cancellation_reason\":null,\"capture_method\":\"automatic\",\"client_secret\":\"pi_3O715FHlJ57SdeJa1i9q9o8v_secret_3LQYxI8JNLOrUg1lZdqZLkhx9\",\"confirmation_method\":\"automatic\",\"created\":1698693909,\"currency\":\"usd\",\"customer\":\"cus_OtMfjrzQ21ViRQ\",\"description\":null,\"invoice\":null,\"last_payment_error\":null,\"latest_charge\":\"ch_3O715FHlJ57SdeJa1XsZmswC\",\"livemode\":false,\"metadata\":[],\"next_action\":null,\"on_behalf_of\":null,\"payment_method\":\"pm_1O715BHlJ57SdeJa4hqzca5c\",\"payment_method_configuration_details\":null,\"payment_method_options\":{\"card\":{\"installments\":null,\"mandate_options\":null,\"network\":null,\"request_three_d_secure\":\"automatic\"}},\"payment_method_types\":[\"card\"],\"processing\":null,\"receipt_email\":null,\"review\":null,\"setup_future_usage\":null,\"shipping\":null,\"source\":null,\"statement_descriptor\":null,\"statement_descriptor_suffix\":null,\"status\":\"succeeded\",\"transfer_data\":null,\"transfer_group\":null}',12.00,NULL,3,1,'2023-10-30 14:25:10','2023-10-30 14:25:10'),(21,'pi_3O7182HlJ57SdeJa0jVoxoGb','{\"id\":\"pi_3O7182HlJ57SdeJa0jVoxoGb\",\"object\":\"payment_intent\",\"amount\":43000,\"amount_capturable\":0,\"amount_details\":{\"tip\":[]},\"amount_received\":43000,\"application\":null,\"application_fee_amount\":null,\"automatic_payment_methods\":null,\"canceled_at\":null,\"cancellation_reason\":null,\"capture_method\":\"automatic\",\"client_secret\":\"pi_3O7182HlJ57SdeJa0jVoxoGb_secret_o1icYgkATw0OsKMm2Rs4eATdO\",\"confirmation_method\":\"automatic\",\"created\":1698694082,\"currency\":\"usd\",\"customer\":\"cus_OtMfjrzQ21ViRQ\",\"description\":null,\"invoice\":null,\"last_payment_error\":null,\"latest_charge\":\"ch_3O7182HlJ57SdeJa0dq23pPH\",\"livemode\":false,\"metadata\":[],\"next_action\":null,\"on_behalf_of\":null,\"payment_method\":\"pm_1O717yHlJ57SdeJaisi1pN3y\",\"payment_method_configuration_details\":null,\"payment_method_options\":{\"card\":{\"installments\":null,\"mandate_options\":null,\"network\":null,\"request_three_d_secure\":\"automatic\"}},\"payment_method_types\":[\"card\"],\"processing\":null,\"receipt_email\":null,\"review\":null,\"setup_future_usage\":null,\"shipping\":null,\"source\":null,\"statement_descriptor\":null,\"statement_descriptor_suffix\":null,\"status\":\"succeeded\",\"transfer_data\":null,\"transfer_group\":null}',430.00,NULL,14,1,'2023-10-30 14:28:03','2023-10-30 14:28:03'),(22,'pi_3O71JFHlJ57SdeJa1mc8J5Pf','{\"id\":\"pi_3O71JFHlJ57SdeJa1mc8J5Pf\",\"object\":\"payment_intent\",\"amount\":43000,\"amount_capturable\":0,\"amount_details\":{\"tip\":[]},\"amount_received\":43000,\"application\":null,\"application_fee_amount\":null,\"automatic_payment_methods\":null,\"canceled_at\":null,\"cancellation_reason\":null,\"capture_method\":\"automatic\",\"client_secret\":\"pi_3O71JFHlJ57SdeJa1mc8J5Pf_secret_tgUS9pbTH7Rh8RohRA8aB4eyt\",\"confirmation_method\":\"automatic\",\"created\":1698694777,\"currency\":\"usd\",\"customer\":\"cus_OtMfjrzQ21ViRQ\",\"description\":null,\"invoice\":null,\"last_payment_error\":null,\"latest_charge\":\"ch_3O71JFHlJ57SdeJa15nIqogx\",\"livemode\":false,\"metadata\":[],\"next_action\":null,\"on_behalf_of\":null,\"payment_method\":\"pm_1O71JAHlJ57SdeJac1KuJ3ev\",\"payment_method_configuration_details\":null,\"payment_method_options\":{\"card\":{\"installments\":null,\"mandate_options\":null,\"network\":null,\"request_three_d_secure\":\"automatic\"}},\"payment_method_types\":[\"card\"],\"processing\":null,\"receipt_email\":null,\"review\":null,\"setup_future_usage\":null,\"shipping\":null,\"source\":null,\"statement_descriptor\":null,\"statement_descriptor_suffix\":null,\"status\":\"succeeded\",\"transfer_data\":null,\"transfer_group\":null}',430.00,NULL,14,1,'2023-10-30 14:39:38','2023-10-30 14:39:38'),(23,'pi_3O71RDHlJ57SdeJa1k69seR1','{\"id\":\"pi_3O71RDHlJ57SdeJa1k69seR1\",\"object\":\"payment_intent\",\"amount\":1200,\"amount_capturable\":0,\"amount_details\":{\"tip\":[]},\"amount_received\":1200,\"application\":null,\"application_fee_amount\":null,\"automatic_payment_methods\":null,\"canceled_at\":null,\"cancellation_reason\":null,\"capture_method\":\"automatic\",\"client_secret\":\"pi_3O71RDHlJ57SdeJa1k69seR1_secret_StI350Ri1OWbqJcFObOIkjUQX\",\"confirmation_method\":\"automatic\",\"created\":1698695271,\"currency\":\"usd\",\"customer\":\"cus_OtMfjrzQ21ViRQ\",\"description\":null,\"invoice\":null,\"last_payment_error\":null,\"latest_charge\":\"ch_3O71RDHlJ57SdeJa1BrIDdD6\",\"livemode\":false,\"metadata\":[],\"next_action\":null,\"on_behalf_of\":null,\"payment_method\":\"pm_1O71R4HlJ57SdeJaXifUWtyk\",\"payment_method_configuration_details\":null,\"payment_method_options\":{\"card\":{\"installments\":null,\"mandate_options\":null,\"network\":null,\"request_three_d_secure\":\"automatic\"}},\"payment_method_types\":[\"card\"],\"processing\":null,\"receipt_email\":null,\"review\":null,\"setup_future_usage\":null,\"shipping\":null,\"source\":null,\"statement_descriptor\":null,\"statement_descriptor_suffix\":null,\"status\":\"succeeded\",\"transfer_data\":null,\"transfer_group\":null}',12.00,NULL,12,1,'2023-10-30 14:47:52','2023-10-30 14:47:52'),(24,'pi_3O71UcHlJ57SdeJa0cFMzdTE','{\"id\":\"pi_3O71UcHlJ57SdeJa0cFMzdTE\",\"object\":\"payment_intent\",\"amount\":5000,\"amount_capturable\":0,\"amount_details\":{\"tip\":[]},\"amount_received\":5000,\"application\":null,\"application_fee_amount\":null,\"automatic_payment_methods\":null,\"canceled_at\":null,\"cancellation_reason\":null,\"capture_method\":\"automatic\",\"client_secret\":\"pi_3O71UcHlJ57SdeJa0cFMzdTE_secret_BP9F6d7iK7CoLbNPOSqIm69Cs\",\"confirmation_method\":\"automatic\",\"created\":1698695482,\"currency\":\"usd\",\"customer\":\"cus_OtMfjrzQ21ViRQ\",\"description\":null,\"invoice\":null,\"last_payment_error\":null,\"latest_charge\":\"ch_3O71UcHlJ57SdeJa0gkBY0xb\",\"livemode\":false,\"metadata\":[],\"next_action\":null,\"on_behalf_of\":null,\"payment_method\":\"pm_1O71UYHlJ57SdeJaDwFvxYDd\",\"payment_method_configuration_details\":null,\"payment_method_options\":{\"card\":{\"installments\":null,\"mandate_options\":null,\"network\":null,\"request_three_d_secure\":\"automatic\"}},\"payment_method_types\":[\"card\"],\"processing\":null,\"receipt_email\":null,\"review\":null,\"setup_future_usage\":null,\"shipping\":null,\"source\":null,\"statement_descriptor\":null,\"statement_descriptor_suffix\":null,\"status\":\"succeeded\",\"transfer_data\":null,\"transfer_group\":null}',50.00,NULL,4,1,'2023-10-30 14:51:23','2023-10-30 14:51:23'),(25,'pi_3O72wSHlJ57SdeJa1ZcB40PO','{\"id\":\"pi_3O72wSHlJ57SdeJa1ZcB40PO\",\"object\":\"payment_intent\",\"amount\":1200,\"amount_capturable\":0,\"amount_details\":{\"tip\":[]},\"amount_received\":1200,\"application\":null,\"application_fee_amount\":null,\"automatic_payment_methods\":null,\"canceled_at\":null,\"cancellation_reason\":null,\"capture_method\":\"automatic\",\"client_secret\":\"pi_3O72wSHlJ57SdeJa1ZcB40PO_secret_7OCpOGjqx5vukZN3IzJPpnzYX\",\"confirmation_method\":\"automatic\",\"created\":1698701052,\"currency\":\"usd\",\"customer\":\"cus_OtMfjrzQ21ViRQ\",\"description\":null,\"invoice\":null,\"last_payment_error\":null,\"latest_charge\":\"ch_3O72wSHlJ57SdeJa1ac5kSfR\",\"livemode\":false,\"metadata\":[],\"next_action\":null,\"on_behalf_of\":null,\"payment_method\":\"pm_1O72wOHlJ57SdeJayMYiBB7r\",\"payment_method_configuration_details\":null,\"payment_method_options\":{\"card\":{\"installments\":null,\"mandate_options\":null,\"network\":null,\"request_three_d_secure\":\"automatic\"}},\"payment_method_types\":[\"card\"],\"processing\":null,\"receipt_email\":null,\"review\":null,\"setup_future_usage\":null,\"shipping\":null,\"source\":null,\"statement_descriptor\":null,\"statement_descriptor_suffix\":null,\"status\":\"succeeded\",\"transfer_data\":null,\"transfer_group\":null}',12.00,NULL,3,1,'2023-10-30 16:24:14','2023-10-30 16:24:14');
/*!40000 ALTER TABLE `transactions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_metas`
--

DROP TABLE IF EXISTS `user_metas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user_metas` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_metas`
--

LOCK TABLES `user_metas` WRITE;
/*!40000 ALTER TABLE `user_metas` DISABLE KEYS */;
/*!40000 ALTER TABLE `user_metas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `stripe_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pm_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pm_last_four` varchar(4) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `trial_ends_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `users_stripe_id_index` (`stripe_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Remedios Strickland','xexuki@mailinator.com',NULL,'$2y$10$wmFJ4u93LvL/D8PzQHurHur4zsZFINScbM4Pmt5NF78ZhPcP853Gi',NULL,'2023-10-26 15:13:24','2023-10-26 15:17:16','cus_OtMfjrzQ21ViRQ','visa','4242',NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-10-31 10:29:50
