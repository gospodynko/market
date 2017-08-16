
--
-- Table structure for table `action_types`
--

DROP TABLE IF EXISTS `action_types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `action_types` (
  `id` int(10) unsigned NOT NULL,
  `source_type` enum('tag','order','order_detail','paypal') COLLATE utf8mb4_unicode_ci NOT NULL,
  `action` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `action_types`
--

LOCK TABLES `action_types` WRITE;
/*!40000 ALTER TABLE `action_types` DISABLE KEYS */;
INSERT INTO `action_types` VALUES (1,'order','open'),(2,'order','pending'),(3,'order','comment'),(4,'order_detail','create'),(5,'order_detail','update'),(6,'order','reload points'),(7,'order','check out'),(8,'order','closed'),(9,'order','cancelled'),(10,'order','received'),(11,'order','sent'),(13,'paypal','buy points'),(14,'order','rate'),(15,'order','processing');
/*!40000 ALTER TABLE `action_types` ENABLE KEYS */;
UNLOCK TABLES;



LOCK TABLES `agroyard_users` WRITE;
ALTER TABLE agroyard_users ADD `role` enum('admin','seller','customer') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'customer';
ALTER TABLE agroyard_users ADD `updated_at` timestamp NULL DEFAULT NULL;
ALTER TABLE agroyard_users ADD `preferences` varchar(1024) COLLATE utf8mb4_unicode_ci NULL DEFAULT '{"product_viewed":"","product_purchased":"","product_shared":"","product_categories":"","my_searches":""}';
/*!40000 ALTER TABLE `agroyard_users` DISABLE KEYS */;

/*!40000 ALTER TABLE `agroyard_users` ENABLE KEYS */;
UNLOCK TABLES;


DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `category_id` int(10) unsigned DEFAULT NULL,
  `name` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `type` enum('group','store') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'store',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (1,NULL,'ПММ','',NULL,NULL,1,'store','2017-08-08 07:52:16','2017-08-08 12:10:11'),(2,1,'Дизельне паливо',NULL,'glyphicon glyphicon-facetime-video',NULL,1,'store','2017-08-08 07:52:16','2017-08-08 07:52:16'),(3,1,'Масла',NULL,'glyphicon glyphicon-bullhorn',NULL,1,'store','2017-08-08 07:52:16','2017-08-08 07:52:16'),(4,NULL,'Засоби захисту рослин',NULL,'glyphicon glyphicon-bullhorn',NULL,1,'store','2017-08-08 07:52:16','2017-08-08 07:52:16'),(5,4,'Акарициди',NULL,'glyphicon glyphicon-facetime-video',NULL,1,'store','2017-08-08 07:52:16','2017-08-08 07:52:16'),(6,4,'Гербіциди',NULL,'glyphicon glyphicon-bullhorn',NULL,1,'store','2017-08-08 07:52:16','2017-08-08 07:52:16'),(7,4,'Десиканти',NULL,'glyphicon glyphicon-briefcase',NULL,1,'store','2017-08-08 07:52:16','2017-08-08 07:52:16'),(8,4,'Інсектициди',NULL,'glyphicon glyphicon-briefcase',NULL,1,'store','2017-08-08 07:52:16','2017-08-08 07:52:16'),(9,4,'Протруйники',NULL,'glyphicon glyphicon-briefcase',NULL,1,'store','2017-08-08 07:52:16','2017-08-08 07:52:16'),(10,4,'Фуміганти',NULL,'glyphicon glyphicon-briefcase',NULL,1,'store','2017-08-08 07:52:16','2017-08-08 07:52:16'),(11,4,'Фунгіциди',NULL,'glyphicon glyphicon-briefcase',NULL,1,'store','2017-08-08 07:52:16','2017-08-08 07:52:16'),(12,NULL,'Посівний матеріал',NULL,'glyphicon glyphicon-facetime-video',NULL,1,'store','2017-08-08 07:52:16','2017-08-08 07:52:16'),(13,12,'Насіння зернових',NULL,'glyphicon glyphicon-facetime-video',NULL,1,'store','2017-08-08 07:52:16','2017-08-08 07:52:16'),(14,12,'Насіння олійних',NULL,'glyphicon glyphicon-briefcase',NULL,1,'store','2017-08-08 07:52:16','2017-08-08 07:52:16'),(15,12,'Насіння бобових',NULL,'glyphicon glyphicon-bullhorn',NULL,1,'store','2017-08-08 07:52:16','2017-08-08 07:52:16'),(16,12,'Інші насіння',NULL,'glyphicon glyphicon-facetime-video',NULL,1,'store','2017-08-08 07:52:16','2017-08-08 07:52:16'),(17,NULL,'Добрива',NULL,'glyphicon glyphicon-briefcase',NULL,1,'store','2017-08-08 07:52:16','2017-08-08 07:52:16'),(18,17,'Мінеральні',NULL,'glyphicon glyphicon-briefcase',NULL,1,'store','2017-08-08 07:52:16','2017-08-08 07:52:16'),(19,17,'Органічні',NULL,'glyphicon glyphicon-briefcase',NULL,1,'store','2017-08-08 07:52:16','2017-08-08 07:52:16'),(20,17,'Органомінеральні',NULL,'glyphicon glyphicon-facetime-video',NULL,1,'store','2017-08-08 07:52:16','2017-08-08 07:52:16'),(21,17,'Регулятори росту',NULL,'glyphicon glyphicon-facetime-video',NULL,1,'store','2017-08-08 07:52:16','2017-08-08 07:52:16'),(22,NULL,'Запчастини та шини',NULL,'glyphicon glyphicon-facetime-video',NULL,1,'store','2017-08-08 07:52:16','2017-08-08 07:52:16'),(23,22,'Запчастини',NULL,'glyphicon glyphicon-briefcase',NULL,1,'store','2017-08-08 07:52:16','2017-08-08 07:52:16'),(24,22,'Шини',NULL,'glyphicon glyphicon-briefcase',NULL,1,'store','2017-08-08 07:52:16','2017-08-08 07:52:16'),(25,NULL,'Агротехніка',NULL,'glyphicon glyphicon-facetime-video',NULL,1,'store','2017-08-08 07:52:16','2017-08-08 07:52:16'),(26,25,'Самохідна',NULL,'glyphicon glyphicon-facetime-video',NULL,1,'store','2017-08-08 07:52:16','2017-08-08 07:52:16'),(27,25,'Причіпна',NULL,'glyphicon glyphicon-bullhorn',NULL,1,'store','2017-08-08 07:52:16','2017-08-08 07:52:16'),(28,NULL,'Урожай',NULL,'glyphicon glyphicon-bullhorn',NULL,1,'store','2017-08-08 07:52:16','2017-08-08 07:52:16'),(29,28,'Зернові',NULL,'glyphicon glyphicon-briefcase',NULL,1,'store','2017-08-08 07:52:16','2017-08-08 07:52:16'),(30,28,'Олійні',NULL,'glyphicon glyphicon-briefcase',NULL,1,'store','2017-08-08 07:52:16','2017-08-08 07:52:16'),(31,28,'Бобові',NULL,'glyphicon glyphicon-briefcase',NULL,1,'store','2017-08-08 07:52:16','2017-08-08 07:52:16'),(32,28,'Продукти переробки',NULL,'glyphicon glyphicon-bullhorn',NULL,1,'store','2017-08-08 07:52:16','2017-08-08 07:52:16'),(33,28,'Нішеві культури',NULL,'glyphicon glyphicon-facetime-video',NULL,1,'store','2017-08-08 07:52:16','2017-08-08 07:52:16'),(34,28,'Органіка',NULL,'glyphicon glyphicon-bullhorn',NULL,1,'store','2017-08-08 07:52:16','2017-08-08 07:52:16');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comments` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `action_type_id` int(10) unsigned NOT NULL,
  `source_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `comment` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `comments_action_type_id_foreign` (`action_type_id`),
  CONSTRAINT `comments_action_type_id_foreign` FOREIGN KEY (`action_type_id`) REFERENCES `action_types` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;


--
-- Table structure for table `companies`
--

DROP TABLE IF EXISTS `companies`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `companies` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slogan` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `theme` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `contact_email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sales_email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `support_email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cell_phone` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zip_code` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `twitter` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook_app_id` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `google_plus` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `google_maps_key_api` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keywords` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `about_us` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `refund_policy` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `privacy_policy` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `terms_of_service` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `companies_email_unique` (`email`),
  UNIQUE KEY `companies_contact_email_unique` (`contact_email`),
  UNIQUE KEY `companies_sales_email_unique` (`sales_email`),
  UNIQUE KEY `companies_support_email_unique` (`support_email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `companies`
--

LOCK TABLES `companies` WRITE;
/*!40000 ALTER TABLE `companies` DISABLE KEYS */;
/*!40000 ALTER TABLE `companies` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `crm_user_statuses`
--

-- Table structure for table `currencies`
--

DROP TABLE IF EXISTS `currencies`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `currencies` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(80) CHARACTER SET utf8mb4 NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `currencies`
--

LOCK TABLES `currencies` WRITE;
/*!40000 ALTER TABLE `currencies` DISABLE KEYS */;
INSERT INTO `currencies` VALUES (1,'Гривня',NULL,NULL),(2,'Долар',NULL,NULL),(3,'Євро',NULL,NULL);
/*!40000 ALTER TABLE `currencies` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `currency_rates`
--

DROP TABLE IF EXISTS `currency_rates`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `currency_rates` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `char3` varchar(3) NOT NULL,
  `code` int(3) NOT NULL,
  `rate` double(10,4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `currency_id` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `currency_rates`
--

LOCK TABLES `currency_rates` WRITE;
/*!40000 ALTER TABLE `currency_rates` DISABLE KEYS */;
INSERT INTO `currency_rates` VALUES (1,'USD',840,2559.8280,'2017-08-16 10:23:47','2017-08-16 10:23:47',2),(2,'EUR',978,3006.2620,'2017-08-16 10:23:47','2017-08-16 10:23:47',3);
/*!40000 ALTER TABLE `currency_rates` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `delivery_types`
--

DROP TABLE IF EXISTS `delivery_types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `delivery_types` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `delivery_types`
--

LOCK TABLES `delivery_types` WRITE;
/*!40000 ALTER TABLE `delivery_types` DISABLE KEYS */;
INSERT INTO `delivery_types` VALUES (1,'type 1',NULL,NULL),(2,'type 2',NULL,NULL);
/*!40000 ALTER TABLE `delivery_types` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `email_change_petitions`
--

DROP TABLE IF EXISTS `email_change_petitions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `email_change_petitions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `old_email` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `new_email` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `confirmed` char(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `expires_at` timestamp NULL DEFAULT NULL,
  `confirmed_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `email_change_petitions_user_id_token_index` (`user_id`,`token`),
  CONSTRAINT `email_change_petitions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `email_change_petitions`
--

LOCK TABLES `email_change_petitions` WRITE;
/*!40000 ALTER TABLE `email_change_petitions` DISABLE KEYS */;
/*!40000 ALTER TABLE `email_change_petitions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `logs`
--

DROP TABLE IF EXISTS `logs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `logs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `action_type_id` int(10) unsigned NOT NULL,
  `source_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `details` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `logs_action_type_id_foreign` (`action_type_id`),
  KEY `logs_user_id_foreign` (`user_id`),
  CONSTRAINT `logs_action_type_id_foreign` FOREIGN KEY (`action_type_id`) REFERENCES `action_types` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;


--
-- Table structure for table `notices`
--

DROP TABLE IF EXISTS `notices`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `notices` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `sender_id` int(10) unsigned NOT NULL,
  `action_type_id` int(10) unsigned NOT NULL,
  `source_id` int(10) unsigned NOT NULL,
  `status` enum('new','unread','read') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `notices_user_id_foreign` (`user_id`),
  KEY `notices_sender_id_foreign` (`sender_id`),
  KEY `notices_action_type_id_foreign` (`action_type_id`),
  CONSTRAINT `notices_action_type_id_foreign` FOREIGN KEY (`action_type_id`) REFERENCES `action_types` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `order_details`
--

DROP TABLE IF EXISTS `order_details`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `order_details` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `order_id` int(10) unsigned NOT NULL,
  `product_id` int(10) unsigned NOT NULL,
  `price` double(10,2) NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT '1',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `delivery_date` datetime DEFAULT NULL,
  `rate` int(11) DEFAULT NULL,
  `rate_comment` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `order_details_product_id_foreign` (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;


--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `orders` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `seller_id` int(10) unsigned DEFAULT NULL,
  `status` enum('cancelled','closed','open','paid','pending','received','sent') COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` enum('cart','wishlist','order','later','freeproduct') COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `end_date` datetime DEFAULT NULL,
  `rate` int(11) DEFAULT NULL,
  `rate_comment` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rate_mail_sent` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `address_id` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `orders_user_id_foreign` (`user_id`),
  KEY `orders_seller_id_foreign` (`seller_id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pay_types`
--

DROP TABLE IF EXISTS `pay_types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pay_types` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pay_types`
--

LOCK TABLES `pay_types` WRITE;
/*!40000 ALTER TABLE `pay_types` DISABLE KEYS */;
INSERT INTO `pay_types` VALUES (1,'pay 1',NULL,NULL),(2,'pay 2',NULL,NULL);
/*!40000 ALTER TABLE `pay_types` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `producers`
--

DROP TABLE IF EXISTS `producers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `producers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `category_id` varchar(512) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` int(10) unsigned NOT NULL,
  `updated_by` int(10) unsigned DEFAULT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;


--
-- Table structure for table `product_details`
--

DROP TABLE IF EXISTS `product_details`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `product_details` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `input_type` enum('text','select','radio','checkbox','image','document') COLLATE utf8mb4_unicode_ci NOT NULL,
  `default_values` json NOT NULL,
  `validation_rules` json NOT NULL,
  `help_message` json NOT NULL,
  `type_products` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `max_num_values` smallint(6) NOT NULL DEFAULT '1',
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_details`
--

LOCK TABLES `product_details` WRITE;
/*!40000 ALTER TABLE `product_details` DISABLE KEYS */;
INSERT INTO `product_details` VALUES (1,'images','image','{}','{\"images_1\": \"required_without_all:feature_images_2,feature_images_3,feature_images_4,feature_images_5,|\", \"images_2\": \"required_without_all:feature_images_1,feature_images_3,feature_images_4,feature_images_5,|\", \"images_3\": \"required_without_all:feature_images_1,feature_images_2,feature_images_4,feature_images_5,|\", \"images_4\": \"required_without_all:feature_images_1,feature_images_2,feature_images_3,feature_images_5,|\", \"images_5\": \"required_without_all:feature_images_1,feature_images_2,feature_images_3,feature_images_4,|\"}','{}','all',5,'active','2017-08-11 03:44:54','2017-08-11 03:44:54');
/*!40000 ALTER TABLE `product_details` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_offers`
--

DROP TABLE IF EXISTS `product_offers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `product_offers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` int(10) unsigned NOT NULL,
  `day_start` datetime NOT NULL,
  `day_end` datetime NOT NULL,
  `percentage` double(10,2) NOT NULL,
  `price` double NOT NULL DEFAULT '0',
  `quantity` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_offers`
--

LOCK TABLES `product_offers` WRITE;
/*!40000 ALTER TABLE `product_offers` DISABLE KEYS */;
/*!40000 ALTER TABLE `product_offers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_pictures`
--

DROP TABLE IF EXISTS `product_pictures`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `product_pictures` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` int(10) unsigned NOT NULL,
  `path` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `default` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_pictures`
--

LOCK TABLES `product_pictures` WRITE;
/*!40000 ALTER TABLE `product_pictures` DISABLE KEYS */;
/*!40000 ALTER TABLE `product_pictures` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `products` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `category_id` int(10) unsigned NOT NULL,
  `created_by` int(10) unsigned NOT NULL,
  `updated_by` int(10) unsigned DEFAULT NULL,
  `stock` int(10) NOT NULL DEFAULT '0',
  `products_group` int(10) DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `type` enum('item') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'item',
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price_min` double(10,2) DEFAULT NULL,
  `price_max` double(10,2) DEFAULT NULL,
  `bar_code` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `manufacturer` varchar(255) CHARACTER SET utf8mb4 DEFAULT NULL,
  `tags` mediumtext COLLATE utf8mb4_unicode_ci,
  `features` json DEFAULT NULL,
  `rate_val` double(10,2) DEFAULT '0.00',
  `rate_count` int(11) DEFAULT '0',
  `sale_counts` int(10) unsigned NOT NULL DEFAULT '0',
  `view_counts` int(10) unsigned NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `producer_id` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `products_features`
--

DROP TABLE IF EXISTS `products_features`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `products_features` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `input_type` enum('text','select') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'text',
  `product_type` enum('item') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'item',
  `validation_rules` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `help_message` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `filterable` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `products_features_name_unique` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products_features`
--

LOCK TABLES `products_features` WRITE;
/*!40000 ALTER TABLE `products_features` DISABLE KEYS */;
/*!40000 ALTER TABLE `products_features` ENABLE KEYS */;
UNLOCK TABLES;


--
-- Table structure for table `user_points`
--

DROP TABLE IF EXISTS `user_points`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_points` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `action_type_id` int(10) unsigned NOT NULL,
  `source_id` int(10) unsigned NOT NULL,
  `points` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_points_action_type_id_foreign` (`action_type_id`),
  KEY `user_points_user_id_index` (`user_id`),
  CONSTRAINT `user_points_action_type_id_foreign` FOREIGN KEY (`action_type_id`) REFERENCES `action_types` (`id`),
  CONSTRAINT `user_points_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_points`
--

LOCK TABLES `user_points` WRITE;
/*!40000 ALTER TABLE `user_points` DISABLE KEYS */;
/*!40000 ALTER TABLE `user_points` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_products`
--

DROP TABLE IF EXISTS `user_products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_products` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` int(10) NOT NULL,
  `category_id` int(10) NOT NULL,
  `price` int(10) NOT NULL DEFAULT '0',
  `currency_id` int(10) NOT NULL,
  `delivery_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pay_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` int(10) NOT NULL,
  `updated_by` int(10) NOT NULL,
  `sale_counts` int(10) DEFAULT NULL,
  `view_counts` int(10) DEFAULT NULL,
  `status` int(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `producer_id` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `phone` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `first_name` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nickname` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('admin','seller','customer') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'customer',
  `phone_number` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` enum('female','male') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'male',
  `birthday` date DEFAULT NULL,
  `pic_url` text COLLATE utf8mb4_unicode_ci,
  `facebook` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `language` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'en',
  `time_zone` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price_min` double(10,2) DEFAULT NULL,
  `price_max` double(10,2) DEFAULT NULL,
  `rate_val` int(11) DEFAULT NULL,
  `rate_count` int(11) DEFAULT NULL,
  `preferences` json DEFAULT NULL,
  `verified` tinyint(1) NOT NULL DEFAULT '0',
  `confirmation_token` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `disabled_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_nickname_unique` (`nickname`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
