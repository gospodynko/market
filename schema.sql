-- MySQL dump 10.14  Distrib 5.5.56-MariaDB, for Linux (x86_64)
--
-- Host: localhost    Database: marketplacetest
-- ------------------------------------------------------
-- Server version	5.5.56-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

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
-- Table structure for table `admin_user_subtypes`
--

DROP TABLE IF EXISTS `admin_user_subtypes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin_user_subtypes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(80) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `agroyard_actions_log`
--

DROP TABLE IF EXISTS `agroyard_actions_log`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `agroyard_actions_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `action` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `agroyard_advert_favorites`
--

DROP TABLE IF EXISTS `agroyard_advert_favorites`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `agroyard_advert_favorites` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `advert_id` int(11) NOT NULL,
  `added_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=67 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `agroyard_advert_goods`
--

DROP TABLE IF EXISTS `agroyard_advert_goods`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `agroyard_advert_goods` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `goods_order` int(11) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `name_en` varchar(255) NOT NULL,
  `name_uk` varchar(255) NOT NULL,
  `icon` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `agroyard_advert_photos`
--

DROP TABLE IF EXISTS `agroyard_advert_photos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `agroyard_advert_photos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `company_id` int(11) DEFAULT NULL,
  `advert_id` int(11) NOT NULL,
  `photo_name` varchar(256) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=382 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `agroyard_advert_photos_tmp`
--

DROP TABLE IF EXISTS `agroyard_advert_photos_tmp`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `agroyard_advert_photos_tmp` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `photo_name` varchar(256) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `token` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `agroyard_advert_statuses`
--

DROP TABLE IF EXISTS `agroyard_advert_statuses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `agroyard_advert_statuses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(256) NOT NULL,
  `name_en` varchar(255) NOT NULL,
  `name_uk` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `agroyard_advert_types`
--

DROP TABLE IF EXISTS `agroyard_advert_types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `agroyard_advert_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(256) NOT NULL,
  `name_en` varchar(255) NOT NULL,
  `name_uk` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `agroyard_adverts`
--

DROP TABLE IF EXISTS `agroyard_adverts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `agroyard_adverts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `adverts_type` int(11) NOT NULL,
  `advert_title` varchar(256) NOT NULL,
  `advert_goods_type_id` int(11) NOT NULL,
  `advert_subtype_id` int(11) DEFAULT NULL,
  `advert_status_id` int(11) NOT NULL DEFAULT '1',
  `success_deal` int(11) NOT NULL DEFAULT '0',
  `user_id` int(11) NOT NULL,
  `user_name` varchar(256) NOT NULL,
  `advert_budget` int(11) NOT NULL DEFAULT '0',
  `currency_id` int(11) NOT NULL DEFAULT '0',
  `region_id` int(11) DEFAULT NULL,
  `district_id` int(11) DEFAULT NULL,
  `locality_id` int(11) DEFAULT NULL,
  `payment_type_id` varchar(255) DEFAULT NULL,
  `objem` int(11) DEFAULT NULL,
  `advert_descr` text,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `edited_date` timestamp NOT NULL DEFAULT '1970-01-01 05:00:00',
  `approve_date` datetime DEFAULT NULL,
  `adv_fields` varchar(256) DEFAULT NULL,
  `visits` int(11) NOT NULL DEFAULT '0',
  `company_id` int(16) NOT NULL DEFAULT '0',
  `compName` varchar(256) DEFAULT NULL,
  `create_by` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=239 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `agroyard_adverts_payment_types`
--

DROP TABLE IF EXISTS `agroyard_adverts_payment_types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `agroyard_adverts_payment_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(80) NOT NULL,
  `name_en` varchar(255) NOT NULL,
  `name_uk` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `agroyard_app_versions`
--

DROP TABLE IF EXISTS `agroyard_app_versions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `agroyard_app_versions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` enum('ios','android') NOT NULL DEFAULT 'android',
  `version` varchar(12) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `agroyard_auction_bid_steps`
--

DROP TABLE IF EXISTS `agroyard_auction_bid_steps`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `agroyard_auction_bid_steps` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `value` int(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `agroyard_auction_bids`
--

DROP TABLE IF EXISTS `agroyard_auction_bids`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `agroyard_auction_bids` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `auction_id` int(11) NOT NULL,
  `bid_user_id` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `date` varchar(80) NOT NULL,
  `company_id` int(11) DEFAULT NULL,
  `generation_id` int(11) NOT NULL,
  `blitz_price` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=131 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `agroyard_auction_contracts`
--

DROP TABLE IF EXISTS `agroyard_auction_contracts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `agroyard_auction_contracts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` int(11) NOT NULL,
  `doc_number` int(11) NOT NULL,
  `vchasno_id` varchar(255) NOT NULL,
  `seller_company_id` int(11) NOT NULL,
  `buyer_company_id` int(11) NOT NULL,
  `seller_user_id` int(11) NOT NULL,
  `buyer_user_id` int(11) NOT NULL,
  `status` int(11) DEFAULT '7000',
  `seller_signed_date` datetime DEFAULT NULL,
  `buyer_signed_date` datetime DEFAULT NULL,
  `auction_id` int(11) NOT NULL,
  `doc_name` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `edited_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `agroyard_auction_contracts_status`
--

DROP TABLE IF EXISTS `agroyard_auction_contracts_status`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `agroyard_auction_contracts_status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `agroyard_auction_contracts_types`
--

DROP TABLE IF EXISTS `agroyard_auction_contracts_types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `agroyard_auction_contracts_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `agroyard_auction_favorites`
--

DROP TABLE IF EXISTS `agroyard_auction_favorites`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `agroyard_auction_favorites` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `company_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `auction_id` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=62 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `agroyard_auction_seo`
--

DROP TABLE IF EXISTS `agroyard_auction_seo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `agroyard_auction_seo` (
  `id` int(11) NOT NULL,
  `slug` varchar(45) NOT NULL,
  `name` varchar(45) NOT NULL,
  `RU` varchar(2048) NOT NULL DEFAULT '0',
  `UA` varchar(255) NOT NULL DEFAULT '0',
  `EN` varchar(255) NOT NULL DEFAULT '0',
  `edited_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `agroyard_auction_shipping_types`
--

DROP TABLE IF EXISTS `agroyard_auction_shipping_types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `agroyard_auction_shipping_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `slug` varchar(255) NOT NULL,
  `name` varchar(80) NOT NULL,
  `name_en` varchar(255) NOT NULL,
  `name_uk` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `agroyard_auction_statuses`
--

DROP TABLE IF EXISTS `agroyard_auction_statuses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `agroyard_auction_statuses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(80) NOT NULL,
  `name_en` varchar(255) NOT NULL,
  `name_uk` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `agroyard_auction_types`
--

DROP TABLE IF EXISTS `agroyard_auction_types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `agroyard_auction_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(80) NOT NULL,
  `name_en` varchar(255) NOT NULL,
  `name_uk` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `agroyard_auctions`
--

DROP TABLE IF EXISTS `agroyard_auctions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `agroyard_auctions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `auction_type_id` int(11) NOT NULL,
  `date_start` varchar(80) DEFAULT NULL,
  `date_end` varchar(80) DEFAULT NULL,
  `product_type_id` int(11) NOT NULL,
  `product_subtype_id` int(11) NOT NULL,
  `humidity` varchar(3) DEFAULT NULL,
  `grade` varchar(3) DEFAULT NULL,
  `impurity` varchar(3) DEFAULT NULL,
  `size` float NOT NULL,
  `price` int(11) NOT NULL DEFAULT '0',
  `price_blitz` varchar(80) DEFAULT NULL,
  `currency_price_id` int(11) DEFAULT NULL,
  `currency_price_blitz_id` int(11) DEFAULT NULL,
  `pdv` varchar(1) DEFAULT NULL,
  `state_id` int(11) DEFAULT NULL,
  `district` int(11) DEFAULT NULL,
  `city` int(11) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `shipping_id` int(11) DEFAULT NULL,
  `comment` varchar(255) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `winner_id` int(11) DEFAULT NULL,
  `adv_fields_value` varchar(256) DEFAULT NULL,
  `bid_step` varchar(80) DEFAULT NULL,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `company_id` int(11) DEFAULT NULL,
  `winner_company_id` int(11) DEFAULT NULL,
  `winner_bid` varchar(80) DEFAULT NULL,
  `deleted_at` timestamp NOT NULL DEFAULT '1970-01-01 05:00:00',
  `idAccept` int(11) NOT NULL DEFAULT '0',
  `create_by` int(11) NOT NULL,
  `ecp_contract` tinyint(4) DEFAULT '0',
  `date_bid_accepted` datetime DEFAULT NULL,
  `winner_user_id` int(11) DEFAULT NULL,
  `desired_price` int(11) DEFAULT NULL,
  `forbidden_companies_id` varchar(1024) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=103 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `agroyard_auctions_top_filter`
--

DROP TABLE IF EXISTS `agroyard_auctions_top_filter`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `agroyard_auctions_top_filter` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `slug` varchar(128) NOT NULL,
  `name` varchar(128) NOT NULL,
  `name_en` varchar(255) NOT NULL,
  `name_uk` varchar(255) NOT NULL,
  `value` int(11) DEFAULT NULL,
  `has_subtype` int(11) NOT NULL,
  `owner_type_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `agroyard_companies`
--

DROP TABLE IF EXISTS `agroyard_companies`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `agroyard_companies` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `companyRole` varchar(11) NOT NULL,
  `companyType` int(64) DEFAULT NULL,
  `compOPForm` int(64) DEFAULT NULL,
  `OPFormOther` varchar(64) DEFAULT NULL,
  `compIsFermHoz` tinyint(1) DEFAULT NULL,
  `compFactAddress_1` mediumtext,
  `compFactAddress_2` mediumtext,
  `compFactAddress_3` mediumtext,
  `compFactAddress_4` mediumtext,
  `compYurAddress_1` mediumtext,
  `compYurAddress_2` mediumtext,
  `compYurAddress_3` mediumtext,
  `compYurAddress_4` mediumtext,
  `compPhone` varchar(64) DEFAULT NULL,
  `compSecondPhone` varchar(64) DEFAULT NULL,
  `compMail` varchar(128) DEFAULT NULL,
  `compPage` varchar(128) DEFAULT NULL,
  `compFIODir` mediumtext,
  `compERDPOU` mediumtext,
  `compIsPDV` varchar(3) DEFAULT NULL,
  `compDescription` mediumtext,
  `compName` varchar(128) DEFAULT NULL,
  `compINN` varchar(64) DEFAULT NULL,
  `compFIO` mediumtext,
  `compLogo` varchar(255) DEFAULT NULL,
  `compRegistrationCert` varchar(255) DEFAULT NULL,
  `status_id` int(16) NOT NULL DEFAULT '1',
  `manager_id` int(11) NOT NULL DEFAULT '0',
  `isLocked` int(16) NOT NULL DEFAULT '0',
  `Locked_by` int(16) DEFAULT NULL,
  `Locked_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(16) DEFAULT '0',
  `position` varchar(255) NOT NULL,
  `last_activity` timestamp NULL DEFAULT '1970-01-01 05:00:00',
  `main_face` varchar(255) DEFAULT NULL,
  `fio_main_face` varchar(255) DEFAULT NULL,
  `code_nds` varchar(20) DEFAULT NULL,
  `company_basis_id` int(11) DEFAULT NULL,
  `adress_index` varchar(10) DEFAULT NULL,
  `main_face_coincides` int(11) DEFAULT NULL,
  `compNameTranslit` varchar(255) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `activity_type_id` varchar(255) DEFAULT '',
  `crop_type_id` varchar(512) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1060 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `agroyard_companies_statuses`
--

DROP TABLE IF EXISTS `agroyard_companies_statuses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `agroyard_companies_statuses` (
  `id` int(128) NOT NULL AUTO_INCREMENT,
  `status` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `status_en` varchar(255) NOT NULL,
  `status_uk` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `agroyard_companies_temporary`
--

DROP TABLE IF EXISTS `agroyard_companies_temporary`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `agroyard_companies_temporary` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `company_id` int(11) NOT NULL,
  `companyRole` int(11) NOT NULL,
  `companyType` int(64) DEFAULT NULL,
  `compOPForm` int(64) DEFAULT NULL,
  `OPFormOther` varchar(64) DEFAULT NULL,
  `compIsFermHoz` tinyint(1) DEFAULT NULL,
  `compFactAddress_1` mediumtext,
  `compFactAddress_2` mediumtext,
  `compFactAddress_3` mediumtext,
  `compFactAddress_4` mediumtext,
  `compYurAddress_1` mediumtext,
  `compYurAddress_2` mediumtext,
  `compYurAddress_3` mediumtext,
  `compYurAddress_4` mediumtext,
  `compPhone` varchar(64) DEFAULT NULL,
  `compSecondPhone` varchar(64) DEFAULT NULL,
  `compMail` varchar(128) DEFAULT NULL,
  `compPage` varchar(128) DEFAULT NULL,
  `compFIODir` mediumtext,
  `compERDPOU` mediumtext,
  `compIsPDV` varchar(3) DEFAULT NULL,
  `compDescription` mediumtext,
  `compName` varchar(128) DEFAULT NULL,
  `compINN` varchar(64) DEFAULT NULL,
  `compFIO` mediumtext,
  `compLogo` varchar(255) DEFAULT NULL,
  `compRegistrationCert` varchar(255) DEFAULT NULL,
  `status_id` int(16) NOT NULL DEFAULT '1',
  `manager_id` int(11) NOT NULL DEFAULT '0',
  `isLocked` int(16) NOT NULL DEFAULT '0',
  `Locked_by` int(16) DEFAULT NULL,
  `Locked_at` timestamp NULL DEFAULT NULL,
  `edited_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(16) DEFAULT '0',
  `position` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `agroyard_company_activity_types`
--

DROP TABLE IF EXISTS `agroyard_company_activity_types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `agroyard_company_activity_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `company_type_id` int(11) NOT NULL,
  `order_by` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `agroyard_company_basis`
--

DROP TABLE IF EXISTS `agroyard_company_basis`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `agroyard_company_basis` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(256) NOT NULL,
  `flp` int(11) NOT NULL DEFAULT '0',
  `ur` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `name_en` varchar(255) DEFAULT NULL,
  `name_uk` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `agroyard_company_form_types`
--

DROP TABLE IF EXISTS `agroyard_company_form_types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `agroyard_company_form_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(256) NOT NULL,
  `name_en` varchar(255) NOT NULL,
  `name_uk` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `agroyard_company_roles`
--

DROP TABLE IF EXISTS `agroyard_company_roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `agroyard_company_roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(256) NOT NULL,
  `name_en` varchar(255) NOT NULL,
  `name_uk` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `agroyard_company_temp_redaction`
--

DROP TABLE IF EXISTS `agroyard_company_temp_redaction`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `agroyard_company_temp_redaction` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `companyRole` varchar(10) NOT NULL,
  `companyType` int(64) DEFAULT NULL,
  `compOPForm` int(64) DEFAULT NULL,
  `OPFormOther` varchar(64) DEFAULT NULL,
  `compIsFermHoz` tinyint(1) DEFAULT NULL,
  `compFactAddress_1` mediumtext,
  `compFactAddress_2` mediumtext,
  `compFactAddress_3` mediumtext,
  `compFactAddress_4` mediumtext,
  `compYurAddress_1` mediumtext,
  `compYurAddress_2` mediumtext,
  `compYurAddress_3` mediumtext,
  `compYurAddress_4` mediumtext,
  `compPhone` varchar(64) DEFAULT NULL,
  `compSecondPhone` varchar(64) DEFAULT NULL,
  `compMail` varchar(128) DEFAULT NULL,
  `compPage` varchar(128) DEFAULT NULL,
  `compFIODir` mediumtext,
  `compERDPOU` mediumtext,
  `compIsPDV` varchar(3) DEFAULT NULL,
  `compDescription` mediumtext,
  `compName` varchar(128) DEFAULT NULL,
  `compINN` varchar(64) DEFAULT NULL,
  `compFIO` varchar(128) DEFAULT NULL,
  `compLogo` varchar(255) DEFAULT NULL,
  `compRegistrationCert` varchar(255) DEFAULT NULL,
  `status_id` int(16) NOT NULL DEFAULT '1',
  `manager_id` int(11) NOT NULL DEFAULT '0',
  `isLocked` int(16) NOT NULL DEFAULT '0',
  `Locked_by` int(16) DEFAULT NULL,
  `Locked_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(16) DEFAULT '0',
  `position` varchar(255) NOT NULL,
  `company_basis_id` int(11) NOT NULL,
  `adress_index` varchar(10) NOT NULL,
  `code_nds` varchar(20) NOT NULL,
  `fio_main_face` varchar(255) DEFAULT NULL,
  `main_face` varchar(255) DEFAULT NULL,
  `main_face_coincides` int(11) DEFAULT NULL,
  `compNameTranslit` varchar(255) DEFAULT NULL,
  `added_at` varchar(255) DEFAULT '',
  `activity_type_id` varchar(255) DEFAULT NULL,
  `crop_type_id` varchar(512) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1044 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `agroyard_company_types`
--

DROP TABLE IF EXISTS `agroyard_company_types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `agroyard_company_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `name_en` varchar(255) NOT NULL,
  `name_uk` varchar(150) NOT NULL,
  `name_short` varchar(80) NOT NULL,
  `name_short_en` varchar(80) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `agroyard_company_user_roles`
--

DROP TABLE IF EXISTS `agroyard_company_user_roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `agroyard_company_user_roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(80) NOT NULL,
  `name_en` varchar(255) NOT NULL,
  `name_uk` varchar(255) NOT NULL,
  `slug` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `agroyard_company_users`
--

DROP TABLE IF EXISTS `agroyard_company_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `agroyard_company_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `company_id` int(11) NOT NULL,
  `user_id` varchar(11) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `user_role_id` int(11) NOT NULL,
  `user_position` varchar(100) CHARACTER SET utf8 NOT NULL COMMENT 'Должность пользователя в компании',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1224 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `agroyard_confirmation_sms`
--

DROP TABLE IF EXISTS `agroyard_confirmation_sms`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `agroyard_confirmation_sms` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `phone` varchar(10) NOT NULL,
  `code` varchar(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `sms_id` varchar(16) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=217 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `agroyard_currency`
--

DROP TABLE IF EXISTS `agroyard_currency`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `agroyard_currency` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(80) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `agroyard_delivery_types`
--

DROP TABLE IF EXISTS `agroyard_delivery_types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `agroyard_delivery_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(80) NOT NULL,
  `name_en` varchar(255) NOT NULL,
  `name_uk` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `agroyard_device_tokens`
--

DROP TABLE IF EXISTS `agroyard_device_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `agroyard_device_tokens` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `token` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=139 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `agroyard_distr_goods`
--

DROP TABLE IF EXISTS `agroyard_distr_goods`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `agroyard_distr_goods` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(80) NOT NULL,
  `name_en` varchar(255) NOT NULL,
  `name_uk` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `agroyard_distr_goods_adv_fields`
--

DROP TABLE IF EXISTS `agroyard_distr_goods_adv_fields`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `agroyard_distr_goods_adv_fields` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(80) NOT NULL,
  `name_en` varchar(255) NOT NULL,
  `name_uk` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `agroyard_distr_goods_types`
--

DROP TABLE IF EXISTS `agroyard_distr_goods_types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `agroyard_distr_goods_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `good_id` int(11) NOT NULL,
  `name` varchar(80) NOT NULL,
  `has_subtype` int(80) NOT NULL DEFAULT '0',
  `type_id` int(11) NOT NULL DEFAULT '0',
  `has_adv_fields` int(11) NOT NULL DEFAULT '0',
  `adv_fields` varchar(80) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=426 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `agroyard_distribs`
--

DROP TABLE IF EXISTS `agroyard_distribs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `agroyard_distribs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `company_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `edited_at` timestamp NULL DEFAULT '1970-01-01 05:00:00',
  `added_by` int(11) NOT NULL,
  `type` int(11) NOT NULL DEFAULT '0',
  `cat_type` int(11) NOT NULL,
  `cat_subtype` int(11) NOT NULL,
  `desc_activities` text,
  `top` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=115 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `agroyard_distribs_docs`
--

DROP TABLE IF EXISTS `agroyard_distribs_docs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `agroyard_distribs_docs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `doc_name` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '1970-01-01 05:00:00' ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `agroyard_distribs_imgs`
--

DROP TABLE IF EXISTS `agroyard_distribs_imgs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `agroyard_distribs_imgs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '1970-01-01 05:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `img_name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `agroyard_distribs_pay_list`
--

DROP TABLE IF EXISTS `agroyard_distribs_pay_list`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `agroyard_distribs_pay_list` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `company_id` int(11) NOT NULL,
  `date_start` date NOT NULL,
  `date_end` date NOT NULL,
  `active` int(11) NOT NULL DEFAULT '0',
  `added_by` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `agroyard_distribs_top`
--

DROP TABLE IF EXISTS `agroyard_distribs_top`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `agroyard_distribs_top` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `company_id` int(11) NOT NULL,
  `date_start` date NOT NULL,
  `date_end` date NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `card_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `agroyard_distribs_type`
--

DROP TABLE IF EXISTS `agroyard_distribs_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `agroyard_distribs_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `name_en` varchar(255) DEFAULT NULL,
  `name_uk` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `agroyard_event_log`
--

DROP TABLE IF EXISTS `agroyard_event_log`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `agroyard_event_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` int(11) NOT NULL,
  `auction_id` int(11) DEFAULT '0',
  `company_id` int(11) DEFAULT '0',
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL DEFAULT '0',
  `story_id` int(11) DEFAULT NULL,
  `manager_id` int(11) DEFAULT NULL,
  `is_product` int(1) DEFAULT '0',
  `table_name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1395 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `agroyard_event_logs_types`
--

DROP TABLE IF EXISTS `agroyard_event_logs_types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `agroyard_event_logs_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(256) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `agroyard_good_types_1`
--

DROP TABLE IF EXISTS `agroyard_good_types_1`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `agroyard_good_types_1` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `slug` varchar(45) NOT NULL,
  `name` varchar(45) NOT NULL,
  `name_en` varchar(255) NOT NULL,
  `name_uk` varchar(255) NOT NULL,
  `has_subtype` int(11) NOT NULL DEFAULT '0',
  `owner_type_id` int(11) NOT NULL DEFAULT '0',
  `adv_fields` varchar(45) NOT NULL DEFAULT '0',
  `edited_at` timestamp NOT NULL DEFAULT '1970-01-01 05:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '1970-01-01 05:00:00',
  `popular` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=188 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `agroyard_good_types_1_popular`
--

DROP TABLE IF EXISTS `agroyard_good_types_1_popular`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `agroyard_good_types_1_popular` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `slug` varchar(45) NOT NULL,
  `name` varchar(45) NOT NULL,
  `name_en` varchar(255) NOT NULL,
  `name_uk` varchar(255) NOT NULL,
  `has_subtype` int(11) NOT NULL DEFAULT '0',
  `owner_type_id` int(11) NOT NULL DEFAULT '0',
  `adv_fields` varchar(45) NOT NULL DEFAULT '0',
  `edited_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '1970-01-01 05:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `agroyard_good_types_2`
--

DROP TABLE IF EXISTS `agroyard_good_types_2`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `agroyard_good_types_2` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `slug` varchar(45) NOT NULL,
  `name` varchar(45) NOT NULL,
  `name_en` varchar(255) NOT NULL,
  `name_uk` varchar(255) NOT NULL,
  `title` varchar(256) NOT NULL,
  `has_subtype` int(11) NOT NULL DEFAULT '0',
  `owner_type_id` int(11) NOT NULL DEFAULT '0',
  `adv_fields` varchar(45) NOT NULL DEFAULT '0',
  `edited_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '1970-01-01 05:00:00',
  `title_en` varchar(255) NOT NULL,
  `title_uk` varchar(255) NOT NULL,
  `icon` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `agroyard_good_types_3`
--

DROP TABLE IF EXISTS `agroyard_good_types_3`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `agroyard_good_types_3` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `slug` varchar(45) NOT NULL,
  `name` varchar(45) NOT NULL,
  `name_en` varchar(255) NOT NULL,
  `name_uk` varchar(255) NOT NULL,
  `title` varchar(256) NOT NULL,
  `has_subtype` int(11) NOT NULL DEFAULT '0',
  `owner_type_id` int(11) NOT NULL DEFAULT '0',
  `adv_fields` varchar(45) NOT NULL DEFAULT '0',
  `title_en` varchar(255) NOT NULL,
  `title_uk` varchar(255) NOT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '1970-01-01 05:00:00',
  `edited_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `agroyard_good_types_4`
--

DROP TABLE IF EXISTS `agroyard_good_types_4`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `agroyard_good_types_4` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `slug` varchar(45) NOT NULL,
  `name` varchar(45) NOT NULL,
  `name_en` varchar(255) NOT NULL,
  `name_uk` varchar(255) NOT NULL,
  `title` varchar(256) NOT NULL,
  `has_subtype` int(11) NOT NULL DEFAULT '0',
  `owner_type_id` int(11) NOT NULL DEFAULT '0',
  `adv_fields` varchar(45) NOT NULL DEFAULT '0',
  `edited_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '1970-01-01 05:00:00',
  `title_en` varchar(255) NOT NULL,
  `title_uk` varchar(255) NOT NULL,
  `icon` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `agroyard_good_types_5`
--

DROP TABLE IF EXISTS `agroyard_good_types_5`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `agroyard_good_types_5` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `slug` varchar(45) NOT NULL,
  `name` varchar(45) NOT NULL,
  `name_en` varchar(255) NOT NULL,
  `name_uk` varchar(255) NOT NULL,
  `title` varchar(256) NOT NULL,
  `has_subtype` int(11) NOT NULL DEFAULT '0',
  `owner_type_id` int(11) NOT NULL DEFAULT '0',
  `adv_fields` varchar(45) NOT NULL DEFAULT '0',
  `edited_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '1970-01-01 05:00:00',
  `title_en` varchar(255) NOT NULL,
  `title_uk` varchar(255) NOT NULL,
  `icon` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `agroyard_good_types_6`
--

DROP TABLE IF EXISTS `agroyard_good_types_6`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `agroyard_good_types_6` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `slug` varchar(45) NOT NULL,
  `name` varchar(45) NOT NULL,
  `name_en` varchar(255) NOT NULL,
  `name_uk` varchar(255) NOT NULL,
  `title` varchar(256) NOT NULL,
  `has_subtype` int(11) NOT NULL DEFAULT '0',
  `owner_type_id` int(11) NOT NULL DEFAULT '0',
  `adv_fields` varchar(45) NOT NULL DEFAULT '0',
  `edited_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '1970-01-01 05:00:00',
  `title_en` varchar(255) NOT NULL,
  `title_uk` varchar(255) NOT NULL,
  `icon` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=122 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `agroyard_good_types_7`
--

DROP TABLE IF EXISTS `agroyard_good_types_7`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `agroyard_good_types_7` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `slug` varchar(45) NOT NULL,
  `name` varchar(45) NOT NULL,
  `name_en` varchar(255) NOT NULL,
  `name_uk` varchar(255) NOT NULL,
  `title` varchar(256) NOT NULL,
  `has_subtype` int(11) NOT NULL DEFAULT '0',
  `owner_type_id` int(11) NOT NULL DEFAULT '0',
  `adv_fields` varchar(45) NOT NULL DEFAULT '0',
  `edited_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '1970-01-01 05:00:00',
  `title_en` varchar(255) NOT NULL,
  `title_uk` varchar(255) NOT NULL,
  `icon` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `agroyard_good_types_8`
--

DROP TABLE IF EXISTS `agroyard_good_types_8`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `agroyard_good_types_8` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `slug` varchar(45) NOT NULL,
  `name` varchar(45) NOT NULL,
  `name_en` varchar(255) NOT NULL,
  `name_uk` varchar(255) NOT NULL,
  `title` varchar(256) NOT NULL,
  `has_subtype` int(11) NOT NULL DEFAULT '0',
  `owner_type_id` int(11) NOT NULL DEFAULT '0',
  `adv_fields` varchar(45) NOT NULL DEFAULT '0',
  `edited_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '1970-01-01 05:00:00',
  `title_en` varchar(255) NOT NULL,
  `title_uk` varchar(255) NOT NULL,
  `icon` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `agroyard_good_types_9`
--

DROP TABLE IF EXISTS `agroyard_good_types_9`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `agroyard_good_types_9` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `slug` varchar(45) NOT NULL,
  `name` varchar(45) NOT NULL,
  `name_en` varchar(255) NOT NULL,
  `name_uk` varchar(255) NOT NULL,
  `title` varchar(256) NOT NULL,
  `has_subtype` int(11) NOT NULL DEFAULT '0',
  `owner_type_id` int(11) NOT NULL DEFAULT '0',
  `adv_fields` varchar(45) NOT NULL DEFAULT '0',
  `edited_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '1970-01-01 05:00:00',
  `title_en` varchar(255) NOT NULL,
  `title_uk` varchar(255) NOT NULL,
  `icon` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=184 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `agroyard_goods_adv_fields`
--

DROP TABLE IF EXISTS `agroyard_goods_adv_fields`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `agroyard_goods_adv_fields` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `slug` varchar(80) NOT NULL,
  `name` varchar(45) NOT NULL,
  `name_en` varchar(255) NOT NULL,
  `name_uk` varchar(255) NOT NULL,
  `adv_field_values` varchar(45) NOT NULL DEFAULT '0',
  `special_field_table` varchar(45) NOT NULL DEFAULT '0',
  `is_required` tinyint(4) NOT NULL DEFAULT '0',
  `required_fields` tinyint(4) DEFAULT NULL COMMENT '0 - need input; 1 - need select; 3 - need input and select;',
  `multiple_value` tinyint(4) NOT NULL DEFAULT '0',
  `edited_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=60 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `agroyard_goods_adv_fields_values`
--

DROP TABLE IF EXISTS `agroyard_goods_adv_fields_values`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `agroyard_goods_adv_fields_values` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(80) NOT NULL,
  `name_en` varchar(255) NOT NULL,
  `name_uk` varchar(255) NOT NULL,
  `slug` varchar(45) NOT NULL,
  `edited_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `agroyard_locality`
--

DROP TABLE IF EXISTS `agroyard_locality`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `agroyard_locality` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `region_id` int(10) unsigned DEFAULT NULL,
  `area_id` int(10) unsigned DEFAULT NULL,
  `type` enum('Область','Район','Місто','Селище') COLLATE utf8_unicode_ci DEFAULT NULL,
  `slug` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `Index` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=296460 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `agroyard_log_user_success_login`
--

DROP TABLE IF EXISTS `agroyard_log_user_success_login`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `agroyard_log_user_success_login` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_login` varchar(15) NOT NULL,
  `date` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `user_id` int(11) NOT NULL,
  `ip` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1381 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `agroyard_login_attempts`
--

DROP TABLE IF EXISTS `agroyard_login_attempts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `agroyard_login_attempts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `attempts` int(11) NOT NULL DEFAULT '1',
  `ip` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `agroyard_partners`
--

DROP TABLE IF EXISTS `agroyard_partners`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `agroyard_partners` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `name_uk` varchar(255) CHARACTER SET utf8 NOT NULL,
  `name_en` varchar(255) CHARACTER SET utf8 NOT NULL,
  `logo` varchar(255) CHARACTER SET utf8 NOT NULL,
  `about_company` text CHARACTER SET utf8 NOT NULL,
  `about_company_uk` text CHARACTER SET utf8 NOT NULL,
  `company_translit` varchar(255) CHARACTER SET utf8 NOT NULL,
  `email` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `phone` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `website` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `direction` varchar(255) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `agroyard_payment`
--

DROP TABLE IF EXISTS `agroyard_payment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `agroyard_payment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `text` text NOT NULL,
  `created_at` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=74 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `agroyard_payment_types`
--

DROP TABLE IF EXISTS `agroyard_payment_types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `agroyard_payment_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(80) NOT NULL,
  `name_en` varchar(255) NOT NULL,
  `name_uk` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `agroyard_states`
--

DROP TABLE IF EXISTS `agroyard_states`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `agroyard_states` (
  `id` int(11) NOT NULL,
  `name` varchar(80) NOT NULL,
  `type` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `agroyard_stories`
--

DROP TABLE IF EXISTS `agroyard_stories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `agroyard_stories` (
  `id` int(64) NOT NULL AUTO_INCREMENT,
  `Date_performed` datetime NOT NULL,
  `Story_title` varchar(128) DEFAULT NULL,
  `Story_description` varchar(4000) DEFAULT NULL,
  `next_date` datetime DEFAULT NULL,
  `next_title` varchar(128) DEFAULT NULL,
  `next_description` varchar(4000) DEFAULT NULL,
  `added_by` int(64) DEFAULT NULL,
  `company` int(64) DEFAULT NULL,
  `newStoryFile` varchar(256) DEFAULT NULL,
  `nextStoryFile` varchar(256) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=145 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `agroyard_tender_bids`
--

DROP TABLE IF EXISTS `agroyard_tender_bids`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `agroyard_tender_bids` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tender_id` int(11) NOT NULL,
  `bid_user_id` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `date` varchar(80) NOT NULL,
  `proposal_comment` varchar(255) NOT NULL,
  `company_id` int(11) DEFAULT NULL,
  `generation_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `agroyard_tender_favorites`
--

DROP TABLE IF EXISTS `agroyard_tender_favorites`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `agroyard_tender_favorites` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `company_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `tender_id` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `agroyard_tender_payment_types`
--

DROP TABLE IF EXISTS `agroyard_tender_payment_types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `agroyard_tender_payment_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(80) NOT NULL,
  `name_en` varchar(255) NOT NULL,
  `name_uk` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `agroyard_tender_status`
--

DROP TABLE IF EXISTS `agroyard_tender_status`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `agroyard_tender_status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(80) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `agroyard_tender_statuses`
--

DROP TABLE IF EXISTS `agroyard_tender_statuses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `agroyard_tender_statuses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(80) NOT NULL,
  `name_en` varchar(255) NOT NULL,
  `name_uk` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `agroyard_tender_subtypes`
--

DROP TABLE IF EXISTS `agroyard_tender_subtypes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `agroyard_tender_subtypes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(80) NOT NULL,
  `name_en` varchar(255) NOT NULL,
  `name_uk` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `agroyard_tender_types`
--

DROP TABLE IF EXISTS `agroyard_tender_types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `agroyard_tender_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(80) NOT NULL,
  `name_en` varchar(255) NOT NULL,
  `name_uk` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `agroyard_tenders`
--

DROP TABLE IF EXISTS `agroyard_tenders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `agroyard_tenders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tender_type_id` int(11) NOT NULL,
  `tender_goods_type_id` int(11) NOT NULL,
  `tender_subtype_id` int(11) NOT NULL,
  `tender_status_id` int(11) NOT NULL DEFAULT '1',
  `user_id` int(11) NOT NULL,
  `startprice` int(80) DEFAULT NULL,
  `currency_id` int(11) NOT NULL,
  `state_id` int(11) NOT NULL,
  `payment_type_id` varchar(255) NOT NULL,
  `pdv` varchar(80) DEFAULT '',
  `comment` varchar(255) DEFAULT NULL,
  `date_start` varchar(80) NOT NULL,
  `date_end` varchar(80) DEFAULT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `edited_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `adv_fields` varchar(256) DEFAULT NULL,
  `area_id` int(11) DEFAULT NULL,
  `city_id` int(11) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `winner_id` int(16) DEFAULT NULL,
  `company_id` int(16) NOT NULL DEFAULT '0',
  `winner_company_id` int(11) DEFAULT NULL,
  `winner_bid` varchar(80) DEFAULT NULL,
  `tender_lk_status` varchar(16) NOT NULL DEFAULT '1',
  `idAccept` int(11) NOT NULL,
  `create_by` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `agroyard_terms_and_conditions`
--

DROP TABLE IF EXISTS `agroyard_terms_and_conditions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `agroyard_terms_and_conditions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `version` int(11) NOT NULL,
  `text` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `agroyard_tmp_user_data`
--

DROP TABLE IF EXISTS `agroyard_tmp_user_data`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `agroyard_tmp_user_data` (
  `user_id` int(11) NOT NULL,
  `inn` varchar(12) DEFAULT NULL,
  `email` varchar(80) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `phoneOther` varchar(255) DEFAULT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(80) DEFAULT NULL,
  `second_name` varchar(80) DEFAULT NULL,
  `type_id` varchar(32) NOT NULL,
  `status_id` int(16) NOT NULL DEFAULT '1',
  `profile_photo` varchar(80) DEFAULT NULL,
  `manager_id` int(11) DEFAULT NULL,
  `comment` varchar(255) DEFAULT NULL,
  `changePassword` tinyint(1) NOT NULL DEFAULT '0',
  `modify_date` timestamp NULL DEFAULT NULL,
  `reg_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `last_activity` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` int(16) NOT NULL,
  `region_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `agroyard_tokens`
--

DROP TABLE IF EXISTS `agroyard_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `agroyard_tokens` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `token` varchar(128) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=700 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `agroyard_trade_types`
--

DROP TABLE IF EXISTS `agroyard_trade_types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `agroyard_trade_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `slug` varchar(45) NOT NULL,
  `name` varchar(45) NOT NULL,
  `name_en` varchar(255) NOT NULL,
  `name_uk` varchar(255) NOT NULL,
  `edited_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `agroyard_trader_goods`
--

DROP TABLE IF EXISTS `agroyard_trader_goods`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `agroyard_trader_goods` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(80) NOT NULL,
  `name_en` varchar(255) NOT NULL,
  `name_uk` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `agroyard_trader_payment_types`
--

DROP TABLE IF EXISTS `agroyard_trader_payment_types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `agroyard_trader_payment_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `slug` varchar(255) NOT NULL,
  `name` varchar(128) NOT NULL,
  `name_en` varchar(255) NOT NULL,
  `name_uk` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `agroyard_traders`
--

DROP TABLE IF EXISTS `agroyard_traders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `agroyard_traders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `company_id` int(11) NOT NULL,
  `company_logo` varchar(128) DEFAULT NULL,
  `company_about` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `edited_at` timestamp NOT NULL DEFAULT '1970-01-01 05:00:00',
  `owner_id` int(11) NOT NULL,
  `added_by` int(11) NOT NULL,
  `active` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=63 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `agroyard_traders_contacts_main`
--

DROP TABLE IF EXISTS `agroyard_traders_contacts_main`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `agroyard_traders_contacts_main` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `company_id` int(11) NOT NULL,
  `egrpou` varchar(8) DEFAULT NULL,
  `region_id` int(11) DEFAULT NULL,
  `district_id` int(11) DEFAULT NULL,
  `locality_id` int(11) DEFAULT NULL,
  `ur_adr` varchar(1024) DEFAULT NULL,
  `region_id_fact` int(11) DEFAULT NULL,
  `district_id_fact` int(11) DEFAULT NULL,
  `locality_id_fact` int(11) DEFAULT NULL,
  `fact_adr` varchar(1024) DEFAULT NULL,
  `email` varchar(128) DEFAULT NULL,
  `site` varchar(128) DEFAULT NULL,
  `phone_1` varchar(20) DEFAULT NULL,
  `phone_2` varchar(20) DEFAULT NULL,
  `phone_3` varchar(20) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `edited_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `owner_id` int(11) NOT NULL,
  `added_by` int(11) NOT NULL,
  `main_office_regions` varchar(255) DEFAULT NULL,
  `is_buyer` int(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=108 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `agroyard_traders_contacts_other`
--

DROP TABLE IF EXISTS `agroyard_traders_contacts_other`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `agroyard_traders_contacts_other` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `company_id` int(11) NOT NULL,
  `title` varchar(256) DEFAULT NULL,
  `agent` varchar(256) DEFAULT NULL,
  `region_id` varchar(255) DEFAULT NULL,
  `district_id` int(11) DEFAULT NULL,
  `locality_id` int(11) DEFAULT NULL,
  `adr` text,
  `email` varchar(128) DEFAULT NULL,
  `site` varchar(128) NOT NULL,
  `phone_1` varchar(20) DEFAULT NULL,
  `phone_2` varchar(20) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `edited_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `owner_id` int(11) NOT NULL,
  `added_by` int(11) NOT NULL,
  `is_main` int(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=130 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `agroyard_traders_payment_types`
--

DROP TABLE IF EXISTS `agroyard_traders_payment_types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `agroyard_traders_payment_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(80) NOT NULL,
  `name_en` varchar(255) NOT NULL,
  `name_uk` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `agroyard_traders_prices`
--

DROP TABLE IF EXISTS `agroyard_traders_prices`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `agroyard_traders_prices` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `company_id` int(11) NOT NULL,
  `product_type_id` int(11) NOT NULL,
  `product_subtype_id` int(11) NOT NULL,
  `state_id` int(11) NOT NULL,
  `shipping_id` int(11) NOT NULL,
  `payment_type_id` int(11) NOT NULL,
  `price_with_nds` int(11) DEFAULT NULL,
  `price_without_nds` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `edited_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `owner_id` int(11) NOT NULL,
  `added_by` int(11) NOT NULL,
  `branch_id` int(11) NOT NULL DEFAULT '0',
  `group_id` varchar(255) DEFAULT NULL,
  `top` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=155 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `agroyard_traders_prices_history`
--

DROP TABLE IF EXISTS `agroyard_traders_prices_history`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `agroyard_traders_prices_history` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `company_id` int(11) NOT NULL,
  `product_type_id` int(11) NOT NULL,
  `product_subtype_id` int(11) NOT NULL,
  `state_id` int(11) NOT NULL,
  `shipping_id` int(11) NOT NULL,
  `payment_type_id` int(11) NOT NULL,
  `price_with_nds` int(11) DEFAULT NULL,
  `price_without_nds` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `edited_at` timestamp NOT NULL DEFAULT '1970-01-01 05:00:00',
  `owner_id` int(11) NOT NULL,
  `added_by` int(11) NOT NULL,
  `branch_id` int(11) NOT NULL DEFAULT '0',
  `group_id` varchar(255) DEFAULT NULL,
  `top` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `agroyard_traders_shipping_types`
--

DROP TABLE IF EXISTS `agroyard_traders_shipping_types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `agroyard_traders_shipping_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `slug` varchar(255) NOT NULL,
  `name` varchar(80) NOT NULL,
  `name_en` varchar(255) NOT NULL,
  `name_uk` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `agroyard_traders_top`
--

DROP TABLE IF EXISTS `agroyard_traders_top`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `agroyard_traders_top` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `main_price_id` int(11) DEFAULT NULL,
  `company_id` int(11) DEFAULT NULL,
  `product_type_id` int(11) DEFAULT NULL,
  `product_subtype_id` int(11) DEFAULT NULL,
  `state_id` int(11) DEFAULT NULL,
  `shipping_id` int(11) DEFAULT NULL,
  `payment_type_id` varchar(255) DEFAULT NULL,
  `price_with_nds` int(11) DEFAULT NULL,
  `price_without_nds` int(11) DEFAULT NULL,
  `pdv` varchar(80) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `edited_at` timestamp NOT NULL DEFAULT '1970-01-01 05:00:00',
  `added_by` int(11) DEFAULT NULL,
  `date_start` date DEFAULT NULL,
  `date_end` date DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `branch_id` int(11) DEFAULT NULL,
  `group_id` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `agroyard_traders_top_filter`
--

DROP TABLE IF EXISTS `agroyard_traders_top_filter`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `agroyard_traders_top_filter` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `slug` varchar(128) NOT NULL,
  `name` varchar(128) NOT NULL,
  `name_en` varchar(255) NOT NULL,
  `name_uk` varchar(255) NOT NULL,
  `value` int(11) DEFAULT NULL,
  `has_subtype` int(11) NOT NULL,
  `owner_type_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `agroyard_user_balance`
--

DROP TABLE IF EXISTS `agroyard_user_balance`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `agroyard_user_balance` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `balance` float NOT NULL DEFAULT '0',
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=90 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `agroyard_user_balance_transactions`
--

DROP TABLE IF EXISTS `agroyard_user_balance_transactions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `agroyard_user_balance_transactions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `payment_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `balance_id` int(11) NOT NULL,
  `status` int(11) DEFAULT NULL,
  `amount` float NOT NULL,
  `created_at` timestamp NULL DEFAULT '1970-01-01 05:00:00',
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `comment` varchar(1024) DEFAULT '',
  `currency_merchant_type` varchar(1024) NOT NULL,
  `payment_form_data` text,
  `amount_commission_wo` float NOT NULL,
  `expired` int(14) NOT NULL,
  `is_archived` tinyint(1) NOT NULL,
  `all_invoice_data` text NOT NULL,
  `payment_currency` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `agroyard_user_balance_transactions_status`
--

DROP TABLE IF EXISTS `agroyard_user_balance_transactions_status`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `agroyard_user_balance_transactions_status` (
  `id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `name_en` varchar(255) CHARACTER SET utf8 NOT NULL,
  `name_uk` varchar(255) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `agroyard_user_statuses`
--

DROP TABLE IF EXISTS `agroyard_user_statuses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `agroyard_user_statuses` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `name` varchar(16) NOT NULL,
  `name_en` varchar(255) NOT NULL,
  `name_uk` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `agroyard_user_types`
--

DROP TABLE IF EXISTS `agroyard_user_types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `agroyard_user_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(80) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `agroyard_users`
--

DROP TABLE IF EXISTS `agroyard_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `agroyard_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `inn` varchar(12) NOT NULL,
  `email` varchar(80) NOT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `phoneOther` varchar(255) DEFAULT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(80) NOT NULL,
  `second_name` varchar(80) NOT NULL,
  `type_id` varchar(32) DEFAULT NULL,
  `status_id` int(16) NOT NULL DEFAULT '1',
  `profile_photo` varchar(80) DEFAULT NULL,
  `manager_id` int(11) DEFAULT NULL,
  `comment` varchar(255) DEFAULT NULL,
  `changePassword` tinyint(1) NOT NULL DEFAULT '0',
  `need_confirm_rules` tinyint(4) NOT NULL DEFAULT '0',
  `modify_date` timestamp NULL DEFAULT NULL,
  `reg_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `last_activity` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` int(16) NOT NULL,
  `region_id` int(11) NOT NULL DEFAULT '0',
  `user_key` varchar(42) NOT NULL,
  `user_key_lifetime` binary(10) NOT NULL DEFAULT '0\0\0\0\0\0\0\0\0\0',
  `first_change_pass` varchar(25) DEFAULT NULL,
  `last_ip` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `role` enum('admin','seller','noselect','customer') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'noselect',
  `updated_at` timestamp NULL DEFAULT NULL,
  `preferences` varchar(1024) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT '{"product_viewed":"","product_purchased":"","product_shared":"","product_categories":"","my_searches":""}',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=203 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `agroyard_users_contacts`
--

DROP TABLE IF EXISTS `agroyard_users_contacts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `agroyard_users_contacts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(80) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `fio` varchar(100) NOT NULL,
  `company` int(64) DEFAULT NULL,
  `comment` varchar(255) DEFAULT NULL,
  `reg_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `position` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `banners`
--

DROP TABLE IF EXISTS `banners`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `banners` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `is_special` tinyint(1) NOT NULL,
  `url` tinytext NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `categories`
--

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
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `category_producer`
--

DROP TABLE IF EXISTS `category_producer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `category_producer` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `producer_id` int(10) unsigned NOT NULL,
  `category_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
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
-- Table structure for table `currencies`
--

DROP TABLE IF EXISTS `currencies`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `currencies` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(80) CHARACTER SET utf8mb4 NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `currency_id` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `delivery_type_user_product`
--

DROP TABLE IF EXISTS `delivery_type_user_product`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `delivery_type_user_product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `delivery_type_id` int(11) NOT NULL,
  `user_product_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=183 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

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
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
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
-- Table structure for table `pay_type_user_product`
--

DROP TABLE IF EXISTS `pay_type_user_product`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pay_type_user_product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pay_type_id` int(11) NOT NULL,
  `user_product_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=157 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

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
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

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
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
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
  `default_values` varchar(1024) COLLATE utf8mb4_unicode_ci NOT NULL,
  `validation_rules` varchar(1024) COLLATE utf8mb4_unicode_ci NOT NULL,
  `help_message` varchar(1024) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type_products` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `max_num_values` smallint(6) NOT NULL DEFAULT '1',
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

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
) ENGINE=InnoDB AUTO_INCREMENT=63 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `product_reviews`
--

DROP TABLE IF EXISTS `product_reviews`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `product_reviews` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `text` varchar(255) NOT NULL,
  `product_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

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
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `price_min` double(10,2) DEFAULT NULL,
  `price_max` double(10,2) DEFAULT NULL,
  `bar_code` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `manufacturer` varchar(255) CHARACTER SET utf8mb4 DEFAULT NULL,
  `tags` mediumtext COLLATE utf8mb4_unicode_ci,
  `features` text CHARACTER SET utf8,
  `rate_val` double(10,2) DEFAULT '0.00',
  `rate_count` int(11) DEFAULT '0',
  `sale_counts` int(10) unsigned NOT NULL DEFAULT '0',
  `view_counts` int(10) unsigned NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `producer_id` int(10) NOT NULL,
  `moderation` tinyint(1) DEFAULT '0',
  `slug` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=66 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
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
-- Table structure for table `realto_active_companies`
--

DROP TABLE IF EXISTS `realto_active_companies`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `realto_active_companies` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `active_time` varchar(256) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `rialto_tender_status`
--

DROP TABLE IF EXISTS `rialto_tender_status`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rialto_tender_status` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `rialto_type_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `rialto_tenders`
--

DROP TABLE IF EXISTS `rialto_tenders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rialto_tenders` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `rialto_system_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rialto_tender_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_ru` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_uk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount_price` int(18) NOT NULL,
  `amount_price_currency` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rialto_tender_status_id` int(10) unsigned NOT NULL,
  `tender_json` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `rialto_tenders_rialto_tender_status_id_foreign` (`rialto_tender_status_id`),
  CONSTRAINT `rialto_tenders_rialto_tender_status_id_foreign` FOREIGN KEY (`rialto_tender_status_id`) REFERENCES `rialto_tender_status` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2185 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `special_field_finansirovanie`
--

DROP TABLE IF EXISTS `special_field_finansirovanie`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `special_field_finansirovanie` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `value` varchar(255) NOT NULL,
  `value_en` varchar(255) NOT NULL,
  `value_uk` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `special_field_fuel_country`
--

DROP TABLE IF EXISTS `special_field_fuel_country`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `special_field_fuel_country` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `value` varchar(255) NOT NULL,
  `value_en` varchar(255) NOT NULL,
  `value_uk` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `special_field_fuel_type`
--

DROP TABLE IF EXISTS `special_field_fuel_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `special_field_fuel_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `value` varchar(255) CHARACTER SET utf8 NOT NULL,
  `value_en` varchar(255) CHARACTER SET utf8 NOT NULL,
  `value_uk` varchar(255) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `special_field_hranenie_zerna`
--

DROP TABLE IF EXISTS `special_field_hranenie_zerna`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `special_field_hranenie_zerna` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `value` varchar(255) CHARACTER SET utf8 NOT NULL,
  `value_en` varchar(255) CHARACTER SET utf8 NOT NULL,
  `value_uk` varchar(255) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `special_field_obrabotka_zemli`
--

DROP TABLE IF EXISTS `special_field_obrabotka_zemli`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `special_field_obrabotka_zemli` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `value` varchar(255) NOT NULL,
  `value_en` varchar(255) NOT NULL,
  `value_uk` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `special_field_parts_boroni`
--

DROP TABLE IF EXISTS `special_field_parts_boroni`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `special_field_parts_boroni` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `value` varchar(255) NOT NULL,
  `value_en` varchar(255) NOT NULL,
  `value_uk` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `special_field_parts_glubokorihlitel`
--

DROP TABLE IF EXISTS `special_field_parts_glubokorihlitel`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `special_field_parts_glubokorihlitel` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `value` varchar(255) NOT NULL,
  `value_en` varchar(255) NOT NULL,
  `value_uk` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `special_field_parts_kombayni`
--

DROP TABLE IF EXISTS `special_field_parts_kombayni`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `special_field_parts_kombayni` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `value` varchar(255) NOT NULL,
  `value_en` varchar(255) NOT NULL,
  `value_uk` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `special_field_parts_kultivatori`
--

DROP TABLE IF EXISTS `special_field_parts_kultivatori`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `special_field_parts_kultivatori` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `value` varchar(255) NOT NULL,
  `value_en` varchar(255) NOT NULL,
  `value_uk` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `special_field_parts_opriskivateli`
--

DROP TABLE IF EXISTS `special_field_parts_opriskivateli`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `special_field_parts_opriskivateli` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `value` varchar(255) NOT NULL,
  `value_en` varchar(255) NOT NULL,
  `value_uk` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `special_field_parts_samohodnie_opriskivateli`
--

DROP TABLE IF EXISTS `special_field_parts_samohodnie_opriskivateli`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `special_field_parts_samohodnie_opriskivateli` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `value` varchar(255) NOT NULL,
  `value_en` varchar(255) NOT NULL,
  `value_uk` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `special_field_parts_smehanicheskaya`
--

DROP TABLE IF EXISTS `special_field_parts_smehanicheskaya`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `special_field_parts_smehanicheskaya` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `value` varchar(255) NOT NULL,
  `value_en` varchar(255) NOT NULL,
  `value_uk` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `special_field_parts_spnevmaticheskaya`
--

DROP TABLE IF EXISTS `special_field_parts_spnevmaticheskaya`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `special_field_parts_spnevmaticheskaya` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `value` varchar(255) NOT NULL,
  `value_en` varchar(255) NOT NULL,
  `value_uk` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `special_field_parts_trktora`
--

DROP TABLE IF EXISTS `special_field_parts_trktora`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `special_field_parts_trktora` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `value` varchar(255) NOT NULL,
  `value_en` varchar(255) NOT NULL,
  `value_uk` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `special_field_parts_zmehanicheskaya`
--

DROP TABLE IF EXISTS `special_field_parts_zmehanicheskaya`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `special_field_parts_zmehanicheskaya` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `value` varchar(255) NOT NULL,
  `value_en` varchar(255) NOT NULL,
  `value_uk` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `special_field_parts_zpnevmaticheskaya`
--

DROP TABLE IF EXISTS `special_field_parts_zpnevmaticheskaya`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `special_field_parts_zpnevmaticheskaya` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `value` varchar(255) NOT NULL,
  `value_en` varchar(255) NOT NULL,
  `value_uk` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `special_field_strahovanie`
--

DROP TABLE IF EXISTS `special_field_strahovanie`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `special_field_strahovanie` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `value` varchar(255) NOT NULL,
  `value_en` varchar(255) NOT NULL,
  `value_uk` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `special_field_stroitelstvo`
--

DROP TABLE IF EXISTS `special_field_stroitelstvo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `special_field_stroitelstvo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `value` varchar(255) NOT NULL,
  `value_en` varchar(255) NOT NULL,
  `value_uk` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `special_field_tires_brand`
--

DROP TABLE IF EXISTS `special_field_tires_brand`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `special_field_tires_brand` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `value` varchar(255) NOT NULL,
  `value_en` varchar(255) NOT NULL,
  `value_uk` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `special_field_tires_diametr`
--

DROP TABLE IF EXISTS `special_field_tires_diametr`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `special_field_tires_diametr` (
  `id` int(11) NOT NULL,
  `value` varchar(45) NOT NULL,
  `value_en` varchar(255) NOT NULL,
  `value_uk` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `special_field_tires_height`
--

DROP TABLE IF EXISTS `special_field_tires_height`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `special_field_tires_height` (
  `id` int(11) NOT NULL,
  `value` varchar(45) NOT NULL,
  `value_en` varchar(255) NOT NULL,
  `value_uk` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `special_field_tires_width`
--

DROP TABLE IF EXISTS `special_field_tires_width`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `special_field_tires_width` (
  `id` int(11) NOT NULL,
  `value` varchar(45) NOT NULL,
  `value_en` varchar(255) NOT NULL,
  `value_uk` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `special_field_transportnye_perevozki`
--

DROP TABLE IF EXISTS `special_field_transportnye_perevozki`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `special_field_transportnye_perevozki` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `value` varchar(255) NOT NULL,
  `value_en` varchar(255) NOT NULL,
  `value_uk` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `user_notifications`
--

DROP TABLE IF EXISTS `user_notifications`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_notifications` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type` enum('balance') COLLATE utf8mb4_unicode_ci NOT NULL,
  `agroyard_users_id` int(10) unsigned NOT NULL,
  `source_id` int(11) NOT NULL,
  `is_new` tinyint(1) NOT NULL DEFAULT '1',
  `action` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `user_product_buyers`
--

DROP TABLE IF EXISTS `user_product_buyers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_product_buyers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `last_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `phone` varchar(255) CHARACTER SET utf8 NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `phone` (`phone`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `user_product_buyers_emails`
--

DROP TABLE IF EXISTS `user_product_buyers_emails`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_product_buyers_emails` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `buyer_id` int(11) NOT NULL,
  `email` varchar(255) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `user_product_offers`
--

DROP TABLE IF EXISTS `user_product_offers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_product_offers` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_product_id` int(11) NOT NULL,
  `buyer_id` int(11) NOT NULL,
  `day_start` datetime NOT NULL,
  `day_end` datetime NOT NULL,
  `price` double(11,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `comment` varchar(255) DEFAULT NULL,
  `pay_type_id` int(11) NOT NULL,
  `delivery_type_id` int(11) NOT NULL,
  `buyer_email_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

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
  `price` double(11,2) NOT NULL DEFAULT '0.00',
  `currency_id` int(10) NOT NULL,
  `delivery_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pay_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` int(10) NOT NULL,
  `user_shop_id` int(11) NOT NULL,
  `updated_by` int(10) NOT NULL,
  `sale_counts` int(10) DEFAULT NULL,
  `view_counts` int(10) DEFAULT NULL,
  `status` int(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `producer_id` int(10) NOT NULL,
  `quantity_price` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=65 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `user_shops`
--

DROP TABLE IF EXISTS `user_shops`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_shops` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `rating` double(11,2) DEFAULT NULL,
  `company_id` int(11) NOT NULL,
  `logo` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
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
  `preferences` varchar(1024) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `wp_commentmeta`
--

DROP TABLE IF EXISTS `wp_commentmeta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wp_commentmeta` (
  `meta_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `comment_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `meta_key` varchar(255) DEFAULT NULL,
  `meta_value` longtext,
  PRIMARY KEY (`meta_id`),
  KEY `comment_id` (`comment_id`),
  KEY `meta_key` (`meta_key`(191))
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `wp_comments`
--

DROP TABLE IF EXISTS `wp_comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wp_comments` (
  `comment_ID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `comment_post_ID` bigint(20) unsigned NOT NULL DEFAULT '0',
  `comment_author` tinytext NOT NULL,
  `comment_author_email` varchar(100) NOT NULL DEFAULT '',
  `comment_author_url` varchar(200) NOT NULL DEFAULT '',
  `comment_author_IP` varchar(100) NOT NULL DEFAULT '',
  `comment_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `comment_date_gmt` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `comment_content` text NOT NULL,
  `comment_karma` int(11) NOT NULL DEFAULT '0',
  `comment_approved` varchar(20) NOT NULL DEFAULT '1',
  `comment_agent` varchar(255) NOT NULL DEFAULT '',
  `comment_type` varchar(20) NOT NULL DEFAULT '',
  `comment_parent` bigint(20) unsigned NOT NULL DEFAULT '0',
  `user_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`comment_ID`),
  KEY `comment_post_ID` (`comment_post_ID`),
  KEY `comment_approved_date_gmt` (`comment_approved`,`comment_date_gmt`),
  KEY `comment_date_gmt` (`comment_date_gmt`),
  KEY `comment_parent` (`comment_parent`),
  KEY `comment_author_email` (`comment_author_email`(10))
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `wp_links`
--

DROP TABLE IF EXISTS `wp_links`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wp_links` (
  `link_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `link_url` varchar(255) NOT NULL DEFAULT '',
  `link_name` varchar(255) NOT NULL DEFAULT '',
  `link_image` varchar(255) NOT NULL DEFAULT '',
  `link_target` varchar(25) NOT NULL DEFAULT '',
  `link_description` varchar(255) NOT NULL DEFAULT '',
  `link_visible` varchar(20) NOT NULL DEFAULT 'Y',
  `link_owner` bigint(20) unsigned NOT NULL DEFAULT '1',
  `link_rating` int(11) NOT NULL DEFAULT '0',
  `link_updated` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `link_rel` varchar(255) NOT NULL DEFAULT '',
  `link_notes` mediumtext NOT NULL,
  `link_rss` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`link_id`),
  KEY `link_visible` (`link_visible`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `wp_oauth_access_tokens`
--

DROP TABLE IF EXISTS `wp_oauth_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wp_oauth_access_tokens` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `access_token` varchar(4000) NOT NULL,
  `client_id` varchar(80) NOT NULL,
  `user_id` varchar(80) DEFAULT NULL,
  `expires` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `scope` varchar(4000) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=947 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `wp_oauth_authorization_codes`
--

DROP TABLE IF EXISTS `wp_oauth_authorization_codes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wp_oauth_authorization_codes` (
  `authorization_code` varchar(40) NOT NULL,
  `client_id` varchar(255) DEFAULT NULL,
  `user_id` varchar(80) DEFAULT NULL,
  `redirect_uri` varchar(2000) DEFAULT NULL,
  `expires` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `scope` varchar(4000) DEFAULT NULL,
  `id_token` varchar(3000) DEFAULT NULL,
  PRIMARY KEY (`authorization_code`),
  UNIQUE KEY `authorization_code` (`authorization_code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `wp_oauth_jwt`
--

DROP TABLE IF EXISTS `wp_oauth_jwt`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wp_oauth_jwt` (
  `client_id` varchar(255) NOT NULL DEFAULT '',
  `subject` varchar(80) DEFAULT NULL,
  `public_key` varchar(2000) NOT NULL,
  PRIMARY KEY (`client_id`),
  UNIQUE KEY `client_id` (`client_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `wp_oauth_public_keys`
--

DROP TABLE IF EXISTS `wp_oauth_public_keys`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wp_oauth_public_keys` (
  `client_id` varchar(255) NOT NULL DEFAULT '',
  `public_key` varchar(2000) DEFAULT NULL,
  `private_key` varchar(2000) DEFAULT NULL,
  `encryption_algorithm` varchar(100) DEFAULT 'RS256',
  PRIMARY KEY (`client_id`),
  UNIQUE KEY `client_id` (`client_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `wp_oauth_refresh_tokens`
--

DROP TABLE IF EXISTS `wp_oauth_refresh_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wp_oauth_refresh_tokens` (
  `refresh_token` varchar(255) NOT NULL DEFAULT '',
  `client_id` varchar(255) DEFAULT NULL,
  `user_id` varchar(80) DEFAULT NULL,
  `expires` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `scope` varchar(4000) DEFAULT NULL,
  PRIMARY KEY (`refresh_token`),
  UNIQUE KEY `refresh_token` (`refresh_token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `wp_oauth_scopes`
--

DROP TABLE IF EXISTS `wp_oauth_scopes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wp_oauth_scopes` (
  `scope` varchar(80) NOT NULL,
  `is_default` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`scope`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `wp_options`
--

DROP TABLE IF EXISTS `wp_options`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wp_options` (
  `option_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `option_name` varchar(191) NOT NULL DEFAULT '',
  `option_value` longtext NOT NULL,
  `autoload` varchar(20) NOT NULL DEFAULT 'yes',
  PRIMARY KEY (`option_id`),
  UNIQUE KEY `option_name` (`option_name`)
) ENGINE=InnoDB AUTO_INCREMENT=97208 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `wp_postmeta`
--

DROP TABLE IF EXISTS `wp_postmeta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wp_postmeta` (
  `meta_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `post_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `meta_key` varchar(255) DEFAULT NULL,
  `meta_value` longtext,
  PRIMARY KEY (`meta_id`),
  KEY `post_id` (`post_id`),
  KEY `meta_key` (`meta_key`(191))
) ENGINE=InnoDB AUTO_INCREMENT=474 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `wp_posts`
--

DROP TABLE IF EXISTS `wp_posts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wp_posts` (
  `ID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `post_author` bigint(20) unsigned NOT NULL DEFAULT '0',
  `post_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_date_gmt` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_content` longtext NOT NULL,
  `post_title` text NOT NULL,
  `post_excerpt` text NOT NULL,
  `post_status` varchar(20) NOT NULL DEFAULT 'publish',
  `comment_status` varchar(20) NOT NULL DEFAULT 'open',
  `ping_status` varchar(20) NOT NULL DEFAULT 'open',
  `post_password` varchar(255) NOT NULL DEFAULT '',
  `post_name` varchar(200) NOT NULL DEFAULT '',
  `to_ping` text NOT NULL,
  `pinged` text NOT NULL,
  `post_modified` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_modified_gmt` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_content_filtered` longtext NOT NULL,
  `post_parent` bigint(20) unsigned NOT NULL DEFAULT '0',
  `guid` varchar(255) NOT NULL DEFAULT '',
  `menu_order` int(11) NOT NULL DEFAULT '0',
  `post_type` varchar(20) NOT NULL DEFAULT 'post',
  `post_mime_type` varchar(100) NOT NULL DEFAULT '',
  `comment_count` bigint(20) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ID`),
  KEY `post_name` (`post_name`(191)),
  KEY `type_status_date` (`post_type`,`post_status`,`post_date`,`ID`),
  KEY `post_parent` (`post_parent`),
  KEY `post_author` (`post_author`)
) ENGINE=InnoDB AUTO_INCREMENT=576 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `wp_term_relationships`
--

DROP TABLE IF EXISTS `wp_term_relationships`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wp_term_relationships` (
  `object_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `term_taxonomy_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `term_order` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`object_id`,`term_taxonomy_id`),
  KEY `term_taxonomy_id` (`term_taxonomy_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `wp_term_taxonomy`
--

DROP TABLE IF EXISTS `wp_term_taxonomy`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wp_term_taxonomy` (
  `term_taxonomy_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `term_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `taxonomy` varchar(32) NOT NULL DEFAULT '',
  `description` longtext NOT NULL,
  `parent` bigint(20) unsigned NOT NULL DEFAULT '0',
  `count` bigint(20) NOT NULL DEFAULT '0',
  PRIMARY KEY (`term_taxonomy_id`),
  UNIQUE KEY `term_id_taxonomy` (`term_id`,`taxonomy`),
  KEY `taxonomy` (`taxonomy`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `wp_termmeta`
--

DROP TABLE IF EXISTS `wp_termmeta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wp_termmeta` (
  `meta_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `term_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `meta_key` varchar(255) DEFAULT NULL,
  `meta_value` longtext,
  PRIMARY KEY (`meta_id`),
  KEY `term_id` (`term_id`),
  KEY `meta_key` (`meta_key`(191))
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `wp_terms`
--

DROP TABLE IF EXISTS `wp_terms`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wp_terms` (
  `term_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL DEFAULT '',
  `slug` varchar(200) NOT NULL DEFAULT '',
  `term_group` bigint(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`term_id`),
  KEY `slug` (`slug`(191)),
  KEY `name` (`name`(191))
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `wp_usermeta`
--

DROP TABLE IF EXISTS `wp_usermeta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wp_usermeta` (
  `umeta_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `meta_key` varchar(255) DEFAULT NULL,
  `meta_value` longtext,
  PRIMARY KEY (`umeta_id`),
  KEY `user_id` (`user_id`),
  KEY `meta_key` (`meta_key`(191))
) ENGINE=InnoDB AUTO_INCREMENT=3050 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `wp_users`
--

DROP TABLE IF EXISTS `wp_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wp_users` (
  `ID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_login` varchar(60) NOT NULL DEFAULT '',
  `user_pass` varchar(255) NOT NULL DEFAULT '',
  `user_nicename` varchar(50) NOT NULL DEFAULT '',
  `user_email` varchar(100) NOT NULL DEFAULT '',
  `user_url` varchar(100) NOT NULL DEFAULT '',
  `user_registered` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `user_activation_key` varchar(255) NOT NULL DEFAULT '',
  `user_status` int(11) NOT NULL DEFAULT '0',
  `display_name` varchar(250) NOT NULL DEFAULT '',
  PRIMARY KEY (`ID`),
  KEY `user_login_key` (`user_login`),
  KEY `user_nicename` (`user_nicename`),
  KEY `user_email` (`user_email`)
) ENGINE=InnoDB AUTO_INCREMENT=487 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-10-04 14:10:06
