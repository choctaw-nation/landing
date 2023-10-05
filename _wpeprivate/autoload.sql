-- MySQL dump 10.13  Distrib 8.0.16, for macos10.14 (x86_64)
--
-- Host: localhost    Database: local
-- ------------------------------------------------------
-- Server version	8.0.16

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
 SET NAMES utf8mb4 ;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `wp_actionscheduler_actions`
--

DROP TABLE IF EXISTS `wp_actionscheduler_actions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `wp_actionscheduler_actions` (
  `action_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `hook` varchar(191) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `status` varchar(20) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `scheduled_date_gmt` datetime DEFAULT '0000-00-00 00:00:00',
  `scheduled_date_local` datetime DEFAULT '0000-00-00 00:00:00',
  `args` varchar(191) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `schedule` longtext COLLATE utf8mb4_unicode_520_ci,
  `group_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `attempts` int(11) NOT NULL DEFAULT '0',
  `last_attempt_gmt` datetime DEFAULT '0000-00-00 00:00:00',
  `last_attempt_local` datetime DEFAULT '0000-00-00 00:00:00',
  `claim_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `extended_args` varchar(8000) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  PRIMARY KEY (`action_id`),
  KEY `hook` (`hook`),
  KEY `status` (`status`),
  KEY `scheduled_date_gmt` (`scheduled_date_gmt`),
  KEY `args` (`args`),
  KEY `group_id` (`group_id`),
  KEY `last_attempt_gmt` (`last_attempt_gmt`),
  KEY `claim_id_status_scheduled_date_gmt` (`claim_id`,`status`,`scheduled_date_gmt`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wp_actionscheduler_actions`
--

LOCK TABLES `wp_actionscheduler_actions` WRITE;
/*!40000 ALTER TABLE `wp_actionscheduler_actions` DISABLE KEYS */;
INSERT INTO `wp_actionscheduler_actions` VALUES (12,'action_scheduler/migration_hook','pending','2023-07-26 20:29:01','2023-07-26 20:29:01','[]','O:30:\"ActionScheduler_SimpleSchedule\":2:{s:22:\"\0*\0scheduled_timestamp\";i:1690403341;s:41:\"\0ActionScheduler_SimpleSchedule\0timestamp\";i:1690403341;}',1,0,'0000-00-00 00:00:00','0000-00-00 00:00:00',0,NULL);
/*!40000 ALTER TABLE `wp_actionscheduler_actions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wp_actionscheduler_claims`
--

DROP TABLE IF EXISTS `wp_actionscheduler_claims`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `wp_actionscheduler_claims` (
  `claim_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `date_created_gmt` datetime DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`claim_id`),
  KEY `date_created_gmt` (`date_created_gmt`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wp_actionscheduler_claims`
--

LOCK TABLES `wp_actionscheduler_claims` WRITE;
/*!40000 ALTER TABLE `wp_actionscheduler_claims` DISABLE KEYS */;
/*!40000 ALTER TABLE `wp_actionscheduler_claims` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wp_actionscheduler_groups`
--

DROP TABLE IF EXISTS `wp_actionscheduler_groups`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `wp_actionscheduler_groups` (
  `group_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `slug` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  PRIMARY KEY (`group_id`),
  KEY `slug` (`slug`(191))
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wp_actionscheduler_groups`
--

LOCK TABLES `wp_actionscheduler_groups` WRITE;
/*!40000 ALTER TABLE `wp_actionscheduler_groups` DISABLE KEYS */;
INSERT INTO `wp_actionscheduler_groups` VALUES (1,'action-scheduler-migration');
/*!40000 ALTER TABLE `wp_actionscheduler_groups` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wp_actionscheduler_logs`
--

DROP TABLE IF EXISTS `wp_actionscheduler_logs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `wp_actionscheduler_logs` (
  `log_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `action_id` bigint(20) unsigned NOT NULL,
  `message` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `log_date_gmt` datetime DEFAULT '0000-00-00 00:00:00',
  `log_date_local` datetime DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`log_id`),
  KEY `action_id` (`action_id`),
  KEY `log_date_gmt` (`log_date_gmt`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wp_actionscheduler_logs`
--

LOCK TABLES `wp_actionscheduler_logs` WRITE;
/*!40000 ALTER TABLE `wp_actionscheduler_logs` DISABLE KEYS */;
INSERT INTO `wp_actionscheduler_logs` VALUES (1,12,'action created','2023-07-26 20:28:01','2023-07-26 20:28:01');
/*!40000 ALTER TABLE `wp_actionscheduler_logs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wp_commentmeta`
--

DROP TABLE IF EXISTS `wp_commentmeta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `wp_commentmeta` (
  `meta_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `comment_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `meta_key` varchar(255) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `meta_value` longtext COLLATE utf8mb4_unicode_520_ci,
  PRIMARY KEY (`meta_id`),
  KEY `comment_id` (`comment_id`),
  KEY `meta_key` (`meta_key`(191))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wp_commentmeta`
--

LOCK TABLES `wp_commentmeta` WRITE;
/*!40000 ALTER TABLE `wp_commentmeta` DISABLE KEYS */;
/*!40000 ALTER TABLE `wp_commentmeta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wp_comments`
--

DROP TABLE IF EXISTS `wp_comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `wp_comments` (
  `comment_ID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `comment_post_ID` bigint(20) unsigned NOT NULL DEFAULT '0',
  `comment_author` tinytext COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `comment_author_email` varchar(100) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `comment_author_url` varchar(200) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `comment_author_IP` varchar(100) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `comment_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `comment_date_gmt` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `comment_content` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `comment_karma` int(11) NOT NULL DEFAULT '0',
  `comment_approved` varchar(20) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '1',
  `comment_agent` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `comment_type` varchar(20) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT 'comment',
  `comment_parent` bigint(20) unsigned NOT NULL DEFAULT '0',
  `user_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`comment_ID`),
  KEY `comment_post_ID` (`comment_post_ID`),
  KEY `comment_approved_date_gmt` (`comment_approved`,`comment_date_gmt`),
  KEY `comment_date_gmt` (`comment_date_gmt`),
  KEY `comment_parent` (`comment_parent`),
  KEY `comment_author_email` (`comment_author_email`(10))
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wp_comments`
--

LOCK TABLES `wp_comments` WRITE;
/*!40000 ALTER TABLE `wp_comments` DISABLE KEYS */;
INSERT INTO `wp_comments` VALUES (1,1,'A WordPress Commenter','wapuu@wordpress.example','https://wordpress.org/','','2023-07-26 19:56:41','2023-07-26 19:56:41','Hi, this is a comment.\nTo get started with moderating, editing, and deleting comments, please visit the Comments screen in the dashboard.\nCommenter avatars come from <a href=\"https://en.gravatar.com/\">Gravatar</a>.',0,'1','','comment',0,0);
/*!40000 ALTER TABLE `wp_comments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wp_gf_draft_submissions`
--

DROP TABLE IF EXISTS `wp_gf_draft_submissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `wp_gf_draft_submissions` (
  `uuid` char(32) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `form_id` mediumint(10) unsigned NOT NULL,
  `date_created` datetime NOT NULL,
  `ip` varchar(45) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `source_url` longtext COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `submission` longtext COLLATE utf8mb4_unicode_520_ci NOT NULL,
  PRIMARY KEY (`uuid`),
  KEY `form_id` (`form_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wp_gf_draft_submissions`
--

LOCK TABLES `wp_gf_draft_submissions` WRITE;
/*!40000 ALTER TABLE `wp_gf_draft_submissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `wp_gf_draft_submissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wp_gf_entry`
--

DROP TABLE IF EXISTS `wp_gf_entry`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `wp_gf_entry` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `form_id` mediumint(10) unsigned NOT NULL,
  `post_id` bigint(10) unsigned DEFAULT NULL,
  `date_created` datetime NOT NULL,
  `date_updated` datetime DEFAULT NULL,
  `is_starred` tinyint(10) NOT NULL DEFAULT '0',
  `is_read` tinyint(10) NOT NULL DEFAULT '0',
  `ip` varchar(45) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `source_url` varchar(200) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `user_agent` varchar(250) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `currency` varchar(5) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `payment_status` varchar(15) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `payment_date` datetime DEFAULT NULL,
  `payment_amount` decimal(19,2) DEFAULT NULL,
  `payment_method` varchar(30) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `transaction_id` varchar(50) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `is_fulfilled` tinyint(10) DEFAULT NULL,
  `created_by` bigint(10) unsigned DEFAULT NULL,
  `transaction_type` tinyint(10) DEFAULT NULL,
  `status` varchar(20) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT 'active',
  PRIMARY KEY (`id`),
  KEY `form_id` (`form_id`),
  KEY `form_id_status` (`form_id`,`status`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wp_gf_entry`
--

LOCK TABLES `wp_gf_entry` WRITE;
/*!40000 ALTER TABLE `wp_gf_entry` DISABLE KEYS */;
/*!40000 ALTER TABLE `wp_gf_entry` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wp_gf_entry_meta`
--

DROP TABLE IF EXISTS `wp_gf_entry_meta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `wp_gf_entry_meta` (
  `id` bigint(10) unsigned NOT NULL AUTO_INCREMENT,
  `form_id` mediumint(10) unsigned NOT NULL DEFAULT '0',
  `entry_id` bigint(10) unsigned NOT NULL,
  `meta_key` varchar(255) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `meta_value` longtext COLLATE utf8mb4_unicode_520_ci,
  `item_index` varchar(60) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `meta_key` (`meta_key`(191)),
  KEY `entry_id` (`entry_id`),
  KEY `meta_value` (`meta_value`(191))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wp_gf_entry_meta`
--

LOCK TABLES `wp_gf_entry_meta` WRITE;
/*!40000 ALTER TABLE `wp_gf_entry_meta` DISABLE KEYS */;
/*!40000 ALTER TABLE `wp_gf_entry_meta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wp_gf_entry_notes`
--

DROP TABLE IF EXISTS `wp_gf_entry_notes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `wp_gf_entry_notes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `entry_id` int(10) unsigned NOT NULL,
  `user_name` varchar(250) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `user_id` bigint(10) DEFAULT NULL,
  `date_created` datetime NOT NULL,
  `value` longtext COLLATE utf8mb4_unicode_520_ci,
  `note_type` varchar(50) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `sub_type` varchar(50) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `entry_id` (`entry_id`),
  KEY `entry_user_key` (`entry_id`,`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wp_gf_entry_notes`
--

LOCK TABLES `wp_gf_entry_notes` WRITE;
/*!40000 ALTER TABLE `wp_gf_entry_notes` DISABLE KEYS */;
/*!40000 ALTER TABLE `wp_gf_entry_notes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wp_gf_form`
--

DROP TABLE IF EXISTS `wp_gf_form`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `wp_gf_form` (
  `id` mediumint(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(150) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `date_created` datetime NOT NULL,
  `date_updated` datetime DEFAULT NULL,
  `is_active` tinyint(10) NOT NULL DEFAULT '1',
  `is_trash` tinyint(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wp_gf_form`
--

LOCK TABLES `wp_gf_form` WRITE;
/*!40000 ALTER TABLE `wp_gf_form` DISABLE KEYS */;
/*!40000 ALTER TABLE `wp_gf_form` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wp_gf_form_meta`
--

DROP TABLE IF EXISTS `wp_gf_form_meta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `wp_gf_form_meta` (
  `form_id` mediumint(10) unsigned NOT NULL,
  `display_meta` longtext COLLATE utf8mb4_unicode_520_ci,
  `entries_grid_meta` longtext COLLATE utf8mb4_unicode_520_ci,
  `confirmations` longtext COLLATE utf8mb4_unicode_520_ci,
  `notifications` longtext COLLATE utf8mb4_unicode_520_ci,
  PRIMARY KEY (`form_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wp_gf_form_meta`
--

LOCK TABLES `wp_gf_form_meta` WRITE;
/*!40000 ALTER TABLE `wp_gf_form_meta` DISABLE KEYS */;
/*!40000 ALTER TABLE `wp_gf_form_meta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wp_gf_form_revisions`
--

DROP TABLE IF EXISTS `wp_gf_form_revisions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `wp_gf_form_revisions` (
  `id` bigint(10) unsigned NOT NULL AUTO_INCREMENT,
  `form_id` mediumint(10) unsigned NOT NULL,
  `display_meta` longtext COLLATE utf8mb4_unicode_520_ci,
  `date_created` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `date_created` (`date_created`),
  KEY `form_id` (`form_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wp_gf_form_revisions`
--

LOCK TABLES `wp_gf_form_revisions` WRITE;
/*!40000 ALTER TABLE `wp_gf_form_revisions` DISABLE KEYS */;
/*!40000 ALTER TABLE `wp_gf_form_revisions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wp_gf_form_view`
--

DROP TABLE IF EXISTS `wp_gf_form_view`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `wp_gf_form_view` (
  `id` bigint(10) unsigned NOT NULL AUTO_INCREMENT,
  `form_id` mediumint(10) unsigned NOT NULL,
  `date_created` datetime NOT NULL,
  `ip` char(15) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `count` mediumint(10) unsigned NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `date_created` (`date_created`),
  KEY `form_id` (`form_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wp_gf_form_view`
--

LOCK TABLES `wp_gf_form_view` WRITE;
/*!40000 ALTER TABLE `wp_gf_form_view` DISABLE KEYS */;
/*!40000 ALTER TABLE `wp_gf_form_view` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wp_gf_rest_api_keys`
--

DROP TABLE IF EXISTS `wp_gf_rest_api_keys`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `wp_gf_rest_api_keys` (
  `key_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `description` varchar(200) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `permissions` varchar(10) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `consumer_key` char(64) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `consumer_secret` char(43) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `nonces` longtext COLLATE utf8mb4_unicode_520_ci,
  `truncated_key` char(7) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `last_access` datetime DEFAULT NULL,
  PRIMARY KEY (`key_id`),
  KEY `consumer_key` (`consumer_key`),
  KEY `consumer_secret` (`consumer_secret`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wp_gf_rest_api_keys`
--

LOCK TABLES `wp_gf_rest_api_keys` WRITE;
/*!40000 ALTER TABLE `wp_gf_rest_api_keys` DISABLE KEYS */;
/*!40000 ALTER TABLE `wp_gf_rest_api_keys` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wp_links`
--

DROP TABLE IF EXISTS `wp_links`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `wp_links` (
  `link_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `link_url` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `link_name` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `link_image` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `link_target` varchar(25) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `link_description` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `link_visible` varchar(20) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT 'Y',
  `link_owner` bigint(20) unsigned NOT NULL DEFAULT '1',
  `link_rating` int(11) NOT NULL DEFAULT '0',
  `link_updated` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `link_rel` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `link_notes` mediumtext COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `link_rss` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`link_id`),
  KEY `link_visible` (`link_visible`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wp_links`
--

LOCK TABLES `wp_links` WRITE;
/*!40000 ALTER TABLE `wp_links` DISABLE KEYS */;
/*!40000 ALTER TABLE `wp_links` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wp_options`
--

DROP TABLE IF EXISTS `wp_options`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `wp_options` (
  `option_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `option_name` varchar(191) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `option_value` longtext COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `autoload` varchar(20) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT 'yes',
  PRIMARY KEY (`option_id`),
  UNIQUE KEY `option_name` (`option_name`),
  KEY `autoload` (`autoload`)
) ENGINE=InnoDB AUTO_INCREMENT=1144 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wp_options`
--

LOCK TABLES `wp_options` WRITE;
/*!40000 ALTER TABLE `wp_options` DISABLE KEYS */;
INSERT INTO `wp_options` VALUES (1,'siteurl','http://choctaw-landing-prod.local','yes');
INSERT INTO `wp_options` VALUES (2,'home','http://choctaw-landing-prod.local','yes');
INSERT INTO `wp_options` VALUES (3,'blogname','Choctaw Landing','yes');
INSERT INTO `wp_options` VALUES (4,'blogdescription','','yes');
INSERT INTO `wp_options` VALUES (5,'users_can_register','0','yes');
INSERT INTO `wp_options` VALUES (6,'admin_email','bperkins@choctawnation.com','yes');
INSERT INTO `wp_options` VALUES (7,'start_of_week','1','yes');
INSERT INTO `wp_options` VALUES (8,'use_balanceTags','0','yes');
INSERT INTO `wp_options` VALUES (9,'use_smilies','1','yes');
INSERT INTO `wp_options` VALUES (10,'require_name_email','1','yes');
INSERT INTO `wp_options` VALUES (11,'comments_notify','1','yes');
INSERT INTO `wp_options` VALUES (12,'posts_per_rss','10','yes');
INSERT INTO `wp_options` VALUES (13,'rss_use_excerpt','0','yes');
INSERT INTO `wp_options` VALUES (14,'mailserver_url','mail.example.com','yes');
INSERT INTO `wp_options` VALUES (15,'mailserver_login','login@example.com','yes');
INSERT INTO `wp_options` VALUES (16,'mailserver_pass','password','yes');
INSERT INTO `wp_options` VALUES (17,'mailserver_port','110','yes');
INSERT INTO `wp_options` VALUES (18,'default_category','1','yes');
INSERT INTO `wp_options` VALUES (19,'default_comment_status','open','yes');
INSERT INTO `wp_options` VALUES (20,'default_ping_status','open','yes');
INSERT INTO `wp_options` VALUES (21,'default_pingback_flag','1','yes');
INSERT INTO `wp_options` VALUES (22,'posts_per_page','10','yes');
INSERT INTO `wp_options` VALUES (23,'date_format','F j, Y','yes');
INSERT INTO `wp_options` VALUES (24,'time_format','g:i a','yes');
INSERT INTO `wp_options` VALUES (25,'links_updated_date_format','F j, Y g:i a','yes');
INSERT INTO `wp_options` VALUES (26,'comment_moderation','0','yes');
INSERT INTO `wp_options` VALUES (27,'moderation_notify','1','yes');
INSERT INTO `wp_options` VALUES (28,'permalink_structure','/%postname%/','yes');
INSERT INTO `wp_options` VALUES (29,'rewrite_rules','a:94:{s:11:\"^wp-json/?$\";s:22:\"index.php?rest_route=/\";s:14:\"^wp-json/(.*)?\";s:33:\"index.php?rest_route=/$matches[1]\";s:21:\"^index.php/wp-json/?$\";s:22:\"index.php?rest_route=/\";s:24:\"^index.php/wp-json/(.*)?\";s:33:\"index.php?rest_route=/$matches[1]\";s:17:\"^wp-sitemap\\.xml$\";s:23:\"index.php?sitemap=index\";s:17:\"^wp-sitemap\\.xsl$\";s:36:\"index.php?sitemap-stylesheet=sitemap\";s:23:\"^wp-sitemap-index\\.xsl$\";s:34:\"index.php?sitemap-stylesheet=index\";s:48:\"^wp-sitemap-([a-z]+?)-([a-z\\d_-]+?)-(\\d+?)\\.xml$\";s:75:\"index.php?sitemap=$matches[1]&sitemap-subtype=$matches[2]&paged=$matches[3]\";s:34:\"^wp-sitemap-([a-z]+?)-(\\d+?)\\.xml$\";s:47:\"index.php?sitemap=$matches[1]&paged=$matches[2]\";s:47:\"category/(.+?)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:52:\"index.php?category_name=$matches[1]&feed=$matches[2]\";s:42:\"category/(.+?)/(feed|rdf|rss|rss2|atom)/?$\";s:52:\"index.php?category_name=$matches[1]&feed=$matches[2]\";s:23:\"category/(.+?)/embed/?$\";s:46:\"index.php?category_name=$matches[1]&embed=true\";s:35:\"category/(.+?)/page/?([0-9]{1,})/?$\";s:53:\"index.php?category_name=$matches[1]&paged=$matches[2]\";s:17:\"category/(.+?)/?$\";s:35:\"index.php?category_name=$matches[1]\";s:44:\"tag/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:42:\"index.php?tag=$matches[1]&feed=$matches[2]\";s:39:\"tag/([^/]+)/(feed|rdf|rss|rss2|atom)/?$\";s:42:\"index.php?tag=$matches[1]&feed=$matches[2]\";s:20:\"tag/([^/]+)/embed/?$\";s:36:\"index.php?tag=$matches[1]&embed=true\";s:32:\"tag/([^/]+)/page/?([0-9]{1,})/?$\";s:43:\"index.php?tag=$matches[1]&paged=$matches[2]\";s:14:\"tag/([^/]+)/?$\";s:25:\"index.php?tag=$matches[1]\";s:45:\"type/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:50:\"index.php?post_format=$matches[1]&feed=$matches[2]\";s:40:\"type/([^/]+)/(feed|rdf|rss|rss2|atom)/?$\";s:50:\"index.php?post_format=$matches[1]&feed=$matches[2]\";s:21:\"type/([^/]+)/embed/?$\";s:44:\"index.php?post_format=$matches[1]&embed=true\";s:33:\"type/([^/]+)/page/?([0-9]{1,})/?$\";s:51:\"index.php?post_format=$matches[1]&paged=$matches[2]\";s:15:\"type/([^/]+)/?$\";s:33:\"index.php?post_format=$matches[1]\";s:12:\"robots\\.txt$\";s:18:\"index.php?robots=1\";s:13:\"favicon\\.ico$\";s:19:\"index.php?favicon=1\";s:48:\".*wp-(atom|rdf|rss|rss2|feed|commentsrss2)\\.php$\";s:18:\"index.php?feed=old\";s:20:\".*wp-app\\.php(/.*)?$\";s:19:\"index.php?error=403\";s:18:\".*wp-register.php$\";s:23:\"index.php?register=true\";s:32:\"feed/(feed|rdf|rss|rss2|atom)/?$\";s:27:\"index.php?&feed=$matches[1]\";s:27:\"(feed|rdf|rss|rss2|atom)/?$\";s:27:\"index.php?&feed=$matches[1]\";s:8:\"embed/?$\";s:21:\"index.php?&embed=true\";s:20:\"page/?([0-9]{1,})/?$\";s:28:\"index.php?&paged=$matches[1]\";s:27:\"comment-page-([0-9]{1,})/?$\";s:38:\"index.php?&page_id=8&cpage=$matches[1]\";s:41:\"comments/feed/(feed|rdf|rss|rss2|atom)/?$\";s:42:\"index.php?&feed=$matches[1]&withcomments=1\";s:36:\"comments/(feed|rdf|rss|rss2|atom)/?$\";s:42:\"index.php?&feed=$matches[1]&withcomments=1\";s:17:\"comments/embed/?$\";s:21:\"index.php?&embed=true\";s:44:\"search/(.+)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:40:\"index.php?s=$matches[1]&feed=$matches[2]\";s:39:\"search/(.+)/(feed|rdf|rss|rss2|atom)/?$\";s:40:\"index.php?s=$matches[1]&feed=$matches[2]\";s:20:\"search/(.+)/embed/?$\";s:34:\"index.php?s=$matches[1]&embed=true\";s:32:\"search/(.+)/page/?([0-9]{1,})/?$\";s:41:\"index.php?s=$matches[1]&paged=$matches[2]\";s:14:\"search/(.+)/?$\";s:23:\"index.php?s=$matches[1]\";s:47:\"author/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:50:\"index.php?author_name=$matches[1]&feed=$matches[2]\";s:42:\"author/([^/]+)/(feed|rdf|rss|rss2|atom)/?$\";s:50:\"index.php?author_name=$matches[1]&feed=$matches[2]\";s:23:\"author/([^/]+)/embed/?$\";s:44:\"index.php?author_name=$matches[1]&embed=true\";s:35:\"author/([^/]+)/page/?([0-9]{1,})/?$\";s:51:\"index.php?author_name=$matches[1]&paged=$matches[2]\";s:17:\"author/([^/]+)/?$\";s:33:\"index.php?author_name=$matches[1]\";s:69:\"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/feed/(feed|rdf|rss|rss2|atom)/?$\";s:80:\"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&feed=$matches[4]\";s:64:\"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/(feed|rdf|rss|rss2|atom)/?$\";s:80:\"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&feed=$matches[4]\";s:45:\"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/embed/?$\";s:74:\"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&embed=true\";s:57:\"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/page/?([0-9]{1,})/?$\";s:81:\"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&paged=$matches[4]\";s:39:\"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/?$\";s:63:\"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]\";s:56:\"([0-9]{4})/([0-9]{1,2})/feed/(feed|rdf|rss|rss2|atom)/?$\";s:64:\"index.php?year=$matches[1]&monthnum=$matches[2]&feed=$matches[3]\";s:51:\"([0-9]{4})/([0-9]{1,2})/(feed|rdf|rss|rss2|atom)/?$\";s:64:\"index.php?year=$matches[1]&monthnum=$matches[2]&feed=$matches[3]\";s:32:\"([0-9]{4})/([0-9]{1,2})/embed/?$\";s:58:\"index.php?year=$matches[1]&monthnum=$matches[2]&embed=true\";s:44:\"([0-9]{4})/([0-9]{1,2})/page/?([0-9]{1,})/?$\";s:65:\"index.php?year=$matches[1]&monthnum=$matches[2]&paged=$matches[3]\";s:26:\"([0-9]{4})/([0-9]{1,2})/?$\";s:47:\"index.php?year=$matches[1]&monthnum=$matches[2]\";s:43:\"([0-9]{4})/feed/(feed|rdf|rss|rss2|atom)/?$\";s:43:\"index.php?year=$matches[1]&feed=$matches[2]\";s:38:\"([0-9]{4})/(feed|rdf|rss|rss2|atom)/?$\";s:43:\"index.php?year=$matches[1]&feed=$matches[2]\";s:19:\"([0-9]{4})/embed/?$\";s:37:\"index.php?year=$matches[1]&embed=true\";s:31:\"([0-9]{4})/page/?([0-9]{1,})/?$\";s:44:\"index.php?year=$matches[1]&paged=$matches[2]\";s:13:\"([0-9]{4})/?$\";s:26:\"index.php?year=$matches[1]\";s:27:\".?.+?/attachment/([^/]+)/?$\";s:32:\"index.php?attachment=$matches[1]\";s:37:\".?.+?/attachment/([^/]+)/trackback/?$\";s:37:\"index.php?attachment=$matches[1]&tb=1\";s:57:\".?.+?/attachment/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:52:\".?.+?/attachment/([^/]+)/(feed|rdf|rss|rss2|atom)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:52:\".?.+?/attachment/([^/]+)/comment-page-([0-9]{1,})/?$\";s:50:\"index.php?attachment=$matches[1]&cpage=$matches[2]\";s:33:\".?.+?/attachment/([^/]+)/embed/?$\";s:43:\"index.php?attachment=$matches[1]&embed=true\";s:16:\"(.?.+?)/embed/?$\";s:41:\"index.php?pagename=$matches[1]&embed=true\";s:20:\"(.?.+?)/trackback/?$\";s:35:\"index.php?pagename=$matches[1]&tb=1\";s:40:\"(.?.+?)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:47:\"index.php?pagename=$matches[1]&feed=$matches[2]\";s:35:\"(.?.+?)/(feed|rdf|rss|rss2|atom)/?$\";s:47:\"index.php?pagename=$matches[1]&feed=$matches[2]\";s:28:\"(.?.+?)/page/?([0-9]{1,})/?$\";s:48:\"index.php?pagename=$matches[1]&paged=$matches[2]\";s:35:\"(.?.+?)/comment-page-([0-9]{1,})/?$\";s:48:\"index.php?pagename=$matches[1]&cpage=$matches[2]\";s:24:\"(.?.+?)(?:/([0-9]+))?/?$\";s:47:\"index.php?pagename=$matches[1]&page=$matches[2]\";s:27:\"[^/]+/attachment/([^/]+)/?$\";s:32:\"index.php?attachment=$matches[1]\";s:37:\"[^/]+/attachment/([^/]+)/trackback/?$\";s:37:\"index.php?attachment=$matches[1]&tb=1\";s:57:\"[^/]+/attachment/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:52:\"[^/]+/attachment/([^/]+)/(feed|rdf|rss|rss2|atom)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:52:\"[^/]+/attachment/([^/]+)/comment-page-([0-9]{1,})/?$\";s:50:\"index.php?attachment=$matches[1]&cpage=$matches[2]\";s:33:\"[^/]+/attachment/([^/]+)/embed/?$\";s:43:\"index.php?attachment=$matches[1]&embed=true\";s:16:\"([^/]+)/embed/?$\";s:37:\"index.php?name=$matches[1]&embed=true\";s:20:\"([^/]+)/trackback/?$\";s:31:\"index.php?name=$matches[1]&tb=1\";s:40:\"([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:43:\"index.php?name=$matches[1]&feed=$matches[2]\";s:35:\"([^/]+)/(feed|rdf|rss|rss2|atom)/?$\";s:43:\"index.php?name=$matches[1]&feed=$matches[2]\";s:28:\"([^/]+)/page/?([0-9]{1,})/?$\";s:44:\"index.php?name=$matches[1]&paged=$matches[2]\";s:35:\"([^/]+)/comment-page-([0-9]{1,})/?$\";s:44:\"index.php?name=$matches[1]&cpage=$matches[2]\";s:24:\"([^/]+)(?:/([0-9]+))?/?$\";s:43:\"index.php?name=$matches[1]&page=$matches[2]\";s:16:\"[^/]+/([^/]+)/?$\";s:32:\"index.php?attachment=$matches[1]\";s:26:\"[^/]+/([^/]+)/trackback/?$\";s:37:\"index.php?attachment=$matches[1]&tb=1\";s:46:\"[^/]+/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:41:\"[^/]+/([^/]+)/(feed|rdf|rss|rss2|atom)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:41:\"[^/]+/([^/]+)/comment-page-([0-9]{1,})/?$\";s:50:\"index.php?attachment=$matches[1]&cpage=$matches[2]\";s:22:\"[^/]+/([^/]+)/embed/?$\";s:43:\"index.php?attachment=$matches[1]&embed=true\";}','yes');
INSERT INTO `wp_options` VALUES (30,'hack_file','0','yes');
INSERT INTO `wp_options` VALUES (31,'blog_charset','UTF-8','yes');
INSERT INTO `wp_options` VALUES (32,'moderation_keys','','no');
INSERT INTO `wp_options` VALUES (33,'active_plugins','a:3:{i:0;s:29:\"gravityforms/gravityforms.php\";i:1;s:34:\"advanced-custom-fields-pro/acf.php\";i:2;s:33:\"classic-editor/classic-editor.php\";}','yes');
INSERT INTO `wp_options` VALUES (34,'category_base','','yes');
INSERT INTO `wp_options` VALUES (35,'ping_sites','http://rpc.pingomatic.com/','yes');
INSERT INTO `wp_options` VALUES (36,'comment_max_links','2','yes');
INSERT INTO `wp_options` VALUES (37,'gmt_offset','0','yes');
INSERT INTO `wp_options` VALUES (38,'default_email_category','1','yes');
INSERT INTO `wp_options` VALUES (39,'recently_edited','a:3:{i:0;s:102:\"/Users/1006138/Local Sites/choctaw-landing-prod/app/public/wp-content/themes/choctaw-landing/style.css\";i:2;s:106:\"/Users/1006138/Local Sites/choctaw-landing-prod/app/public/wp-content/themes/choctaw-landing/functions.php\";i:3;s:0:\"\";}','no');
INSERT INTO `wp_options` VALUES (40,'template','choctaw-landing','yes');
INSERT INTO `wp_options` VALUES (41,'stylesheet','choctaw-landing','yes');
INSERT INTO `wp_options` VALUES (42,'comment_registration','0','yes');
INSERT INTO `wp_options` VALUES (43,'html_type','text/html','yes');
INSERT INTO `wp_options` VALUES (44,'use_trackback','0','yes');
INSERT INTO `wp_options` VALUES (45,'default_role','subscriber','yes');
INSERT INTO `wp_options` VALUES (46,'db_version','55853','yes');
INSERT INTO `wp_options` VALUES (47,'uploads_use_yearmonth_folders','1','yes');
INSERT INTO `wp_options` VALUES (48,'upload_path','','yes');
INSERT INTO `wp_options` VALUES (49,'blog_public','1','yes');
INSERT INTO `wp_options` VALUES (50,'default_link_category','2','yes');
INSERT INTO `wp_options` VALUES (51,'show_on_front','page','yes');
INSERT INTO `wp_options` VALUES (52,'tag_base','','yes');
INSERT INTO `wp_options` VALUES (53,'show_avatars','1','yes');
INSERT INTO `wp_options` VALUES (54,'avatar_rating','G','yes');
INSERT INTO `wp_options` VALUES (55,'upload_url_path','','yes');
INSERT INTO `wp_options` VALUES (56,'thumbnail_size_w','150','yes');
INSERT INTO `wp_options` VALUES (57,'thumbnail_size_h','150','yes');
INSERT INTO `wp_options` VALUES (58,'thumbnail_crop','1','yes');
INSERT INTO `wp_options` VALUES (59,'medium_size_w','300','yes');
INSERT INTO `wp_options` VALUES (60,'medium_size_h','300','yes');
INSERT INTO `wp_options` VALUES (61,'avatar_default','mystery','yes');
INSERT INTO `wp_options` VALUES (62,'large_size_w','1024','yes');
INSERT INTO `wp_options` VALUES (63,'large_size_h','1024','yes');
INSERT INTO `wp_options` VALUES (64,'image_default_link_type','none','yes');
INSERT INTO `wp_options` VALUES (65,'image_default_size','','yes');
INSERT INTO `wp_options` VALUES (66,'image_default_align','','yes');
INSERT INTO `wp_options` VALUES (67,'close_comments_for_old_posts','0','yes');
INSERT INTO `wp_options` VALUES (68,'close_comments_days_old','14','yes');
INSERT INTO `wp_options` VALUES (69,'thread_comments','1','yes');
INSERT INTO `wp_options` VALUES (70,'thread_comments_depth','5','yes');
INSERT INTO `wp_options` VALUES (71,'page_comments','0','yes');
INSERT INTO `wp_options` VALUES (72,'comments_per_page','50','yes');
INSERT INTO `wp_options` VALUES (73,'default_comments_page','newest','yes');
INSERT INTO `wp_options` VALUES (74,'comment_order','asc','yes');
INSERT INTO `wp_options` VALUES (75,'sticky_posts','a:0:{}','yes');
INSERT INTO `wp_options` VALUES (76,'widget_categories','a:2:{i:1;a:0:{}s:12:\"_multiwidget\";i:1;}','yes');
INSERT INTO `wp_options` VALUES (77,'widget_text','a:2:{i:1;a:0:{}s:12:\"_multiwidget\";i:1;}','yes');
INSERT INTO `wp_options` VALUES (78,'widget_rss','a:2:{i:1;a:0:{}s:12:\"_multiwidget\";i:1;}','yes');
INSERT INTO `wp_options` VALUES (79,'uninstall_plugins','a:0:{}','no');
INSERT INTO `wp_options` VALUES (80,'timezone_string','','yes');
INSERT INTO `wp_options` VALUES (81,'page_for_posts','0','yes');
INSERT INTO `wp_options` VALUES (82,'page_on_front','8','yes');
INSERT INTO `wp_options` VALUES (83,'default_post_format','0','yes');
INSERT INTO `wp_options` VALUES (84,'link_manager_enabled','0','yes');
INSERT INTO `wp_options` VALUES (85,'finished_splitting_shared_terms','1','yes');
INSERT INTO `wp_options` VALUES (86,'site_icon','0','yes');
INSERT INTO `wp_options` VALUES (87,'medium_large_size_w','768','yes');
INSERT INTO `wp_options` VALUES (88,'medium_large_size_h','0','yes');
INSERT INTO `wp_options` VALUES (89,'wp_page_for_privacy_policy','3','yes');
INSERT INTO `wp_options` VALUES (90,'show_comments_cookies_opt_in','1','yes');
INSERT INTO `wp_options` VALUES (91,'admin_email_lifespan','1705953401','yes');
INSERT INTO `wp_options` VALUES (92,'disallowed_keys','','no');
INSERT INTO `wp_options` VALUES (93,'comment_previously_approved','1','yes');
INSERT INTO `wp_options` VALUES (94,'auto_plugin_theme_update_emails','a:0:{}','no');
INSERT INTO `wp_options` VALUES (95,'auto_update_core_dev','enabled','yes');
INSERT INTO `wp_options` VALUES (96,'auto_update_core_minor','enabled','yes');
INSERT INTO `wp_options` VALUES (97,'auto_update_core_major','enabled','yes');
INSERT INTO `wp_options` VALUES (98,'wp_force_deactivated_plugins','a:0:{}','yes');
INSERT INTO `wp_options` VALUES (99,'initial_db_version','53496','yes');
INSERT INTO `wp_options` VALUES (100,'wp_user_roles','a:5:{s:13:\"administrator\";a:2:{s:4:\"name\";s:13:\"Administrator\";s:12:\"capabilities\";a:61:{s:13:\"switch_themes\";b:1;s:11:\"edit_themes\";b:1;s:16:\"activate_plugins\";b:1;s:12:\"edit_plugins\";b:1;s:10:\"edit_users\";b:1;s:10:\"edit_files\";b:1;s:14:\"manage_options\";b:1;s:17:\"moderate_comments\";b:1;s:17:\"manage_categories\";b:1;s:12:\"manage_links\";b:1;s:12:\"upload_files\";b:1;s:6:\"import\";b:1;s:15:\"unfiltered_html\";b:1;s:10:\"edit_posts\";b:1;s:17:\"edit_others_posts\";b:1;s:20:\"edit_published_posts\";b:1;s:13:\"publish_posts\";b:1;s:10:\"edit_pages\";b:1;s:4:\"read\";b:1;s:8:\"level_10\";b:1;s:7:\"level_9\";b:1;s:7:\"level_8\";b:1;s:7:\"level_7\";b:1;s:7:\"level_6\";b:1;s:7:\"level_5\";b:1;s:7:\"level_4\";b:1;s:7:\"level_3\";b:1;s:7:\"level_2\";b:1;s:7:\"level_1\";b:1;s:7:\"level_0\";b:1;s:17:\"edit_others_pages\";b:1;s:20:\"edit_published_pages\";b:1;s:13:\"publish_pages\";b:1;s:12:\"delete_pages\";b:1;s:19:\"delete_others_pages\";b:1;s:22:\"delete_published_pages\";b:1;s:12:\"delete_posts\";b:1;s:19:\"delete_others_posts\";b:1;s:22:\"delete_published_posts\";b:1;s:20:\"delete_private_posts\";b:1;s:18:\"edit_private_posts\";b:1;s:18:\"read_private_posts\";b:1;s:20:\"delete_private_pages\";b:1;s:18:\"edit_private_pages\";b:1;s:18:\"read_private_pages\";b:1;s:12:\"delete_users\";b:1;s:12:\"create_users\";b:1;s:17:\"unfiltered_upload\";b:1;s:14:\"edit_dashboard\";b:1;s:14:\"update_plugins\";b:1;s:14:\"delete_plugins\";b:1;s:15:\"install_plugins\";b:1;s:13:\"update_themes\";b:1;s:14:\"install_themes\";b:1;s:11:\"update_core\";b:1;s:10:\"list_users\";b:1;s:12:\"remove_users\";b:1;s:13:\"promote_users\";b:1;s:18:\"edit_theme_options\";b:1;s:13:\"delete_themes\";b:1;s:6:\"export\";b:1;}}s:6:\"editor\";a:2:{s:4:\"name\";s:6:\"Editor\";s:12:\"capabilities\";a:34:{s:17:\"moderate_comments\";b:1;s:17:\"manage_categories\";b:1;s:12:\"manage_links\";b:1;s:12:\"upload_files\";b:1;s:15:\"unfiltered_html\";b:1;s:10:\"edit_posts\";b:1;s:17:\"edit_others_posts\";b:1;s:20:\"edit_published_posts\";b:1;s:13:\"publish_posts\";b:1;s:10:\"edit_pages\";b:1;s:4:\"read\";b:1;s:7:\"level_7\";b:1;s:7:\"level_6\";b:1;s:7:\"level_5\";b:1;s:7:\"level_4\";b:1;s:7:\"level_3\";b:1;s:7:\"level_2\";b:1;s:7:\"level_1\";b:1;s:7:\"level_0\";b:1;s:17:\"edit_others_pages\";b:1;s:20:\"edit_published_pages\";b:1;s:13:\"publish_pages\";b:1;s:12:\"delete_pages\";b:1;s:19:\"delete_others_pages\";b:1;s:22:\"delete_published_pages\";b:1;s:12:\"delete_posts\";b:1;s:19:\"delete_others_posts\";b:1;s:22:\"delete_published_posts\";b:1;s:20:\"delete_private_posts\";b:1;s:18:\"edit_private_posts\";b:1;s:18:\"read_private_posts\";b:1;s:20:\"delete_private_pages\";b:1;s:18:\"edit_private_pages\";b:1;s:18:\"read_private_pages\";b:1;}}s:6:\"author\";a:2:{s:4:\"name\";s:6:\"Author\";s:12:\"capabilities\";a:10:{s:12:\"upload_files\";b:1;s:10:\"edit_posts\";b:1;s:20:\"edit_published_posts\";b:1;s:13:\"publish_posts\";b:1;s:4:\"read\";b:1;s:7:\"level_2\";b:1;s:7:\"level_1\";b:1;s:7:\"level_0\";b:1;s:12:\"delete_posts\";b:1;s:22:\"delete_published_posts\";b:1;}}s:11:\"contributor\";a:2:{s:4:\"name\";s:11:\"Contributor\";s:12:\"capabilities\";a:5:{s:10:\"edit_posts\";b:1;s:4:\"read\";b:1;s:7:\"level_1\";b:1;s:7:\"level_0\";b:1;s:12:\"delete_posts\";b:1;}}s:10:\"subscriber\";a:2:{s:4:\"name\";s:10:\"Subscriber\";s:12:\"capabilities\";a:2:{s:4:\"read\";b:1;s:7:\"level_0\";b:1;}}}','yes');
INSERT INTO `wp_options` VALUES (101,'fresh_site','0','yes');
INSERT INTO `wp_options` VALUES (102,'user_count','1','no');
INSERT INTO `wp_options` VALUES (103,'widget_block','a:6:{i:2;a:1:{s:7:\"content\";s:19:\"<!-- wp:search /-->\";}i:3;a:1:{s:7:\"content\";s:154:\"<!-- wp:group --><div class=\"wp-block-group\"><!-- wp:heading --><h2>Recent Posts</h2><!-- /wp:heading --><!-- wp:latest-posts /--></div><!-- /wp:group -->\";}i:4;a:1:{s:7:\"content\";s:227:\"<!-- wp:group --><div class=\"wp-block-group\"><!-- wp:heading --><h2>Recent Comments</h2><!-- /wp:heading --><!-- wp:latest-comments {\"displayAvatar\":false,\"displayDate\":false,\"displayExcerpt\":false} /--></div><!-- /wp:group -->\";}i:5;a:1:{s:7:\"content\";s:146:\"<!-- wp:group --><div class=\"wp-block-group\"><!-- wp:heading --><h2>Archives</h2><!-- /wp:heading --><!-- wp:archives /--></div><!-- /wp:group -->\";}i:6;a:1:{s:7:\"content\";s:150:\"<!-- wp:group --><div class=\"wp-block-group\"><!-- wp:heading --><h2>Categories</h2><!-- /wp:heading --><!-- wp:categories /--></div><!-- /wp:group -->\";}s:12:\"_multiwidget\";i:1;}','yes');
INSERT INTO `wp_options` VALUES (104,'sidebars_widgets','a:13:{s:19:\"wp_inactive_widgets\";a:0:{}s:7:\"top-nav\";a:0:{}s:9:\"top-nav-2\";a:0:{}s:14:\"top-nav-search\";a:0:{}s:9:\"sidebar-1\";a:5:{i:0;s:7:\"block-2\";i:1;s:7:\"block-3\";i:2;s:7:\"block-4\";i:3;s:7:\"block-5\";i:4;s:7:\"block-6\";}s:10:\"top-footer\";a:0:{}s:8:\"footer-1\";a:1:{i:0;s:13:\"custom_html-2\";}s:8:\"footer-2\";a:1:{i:0;s:10:\"nav_menu-2\";}s:8:\"footer-3\";a:2:{i:0;s:13:\"custom_html-3\";i:1;s:13:\"custom_html-4\";}s:8:\"footer-4\";a:0:{}s:11:\"footer-info\";a:0:{}s:8:\"404-page\";a:0:{}s:13:\"array_version\";i:3;}','yes');
INSERT INTO `wp_options` VALUES (105,'cron','a:8:{i:1696435002;a:1:{s:34:\"wp_privacy_delete_old_export_files\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:6:\"hourly\";s:4:\"args\";a:0:{}s:8:\"interval\";i:3600;}}}i:1696449402;a:5:{s:32:\"recovery_mode_clean_expired_keys\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:5:\"daily\";s:4:\"args\";a:0:{}s:8:\"interval\";i:86400;}}s:18:\"wp_https_detection\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:10:\"twicedaily\";s:4:\"args\";a:0:{}s:8:\"interval\";i:43200;}}s:16:\"wp_version_check\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:10:\"twicedaily\";s:4:\"args\";a:0:{}s:8:\"interval\";i:43200;}}s:17:\"wp_update_plugins\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:10:\"twicedaily\";s:4:\"args\";a:0:{}s:8:\"interval\";i:43200;}}s:16:\"wp_update_themes\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:10:\"twicedaily\";s:4:\"args\";a:0:{}s:8:\"interval\";i:43200;}}}i:1696450755;a:3:{s:19:\"wp_scheduled_delete\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:5:\"daily\";s:4:\"args\";a:0:{}s:8:\"interval\";i:86400;}}s:25:\"delete_expired_transients\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:5:\"daily\";s:4:\"args\";a:0:{}s:8:\"interval\";i:86400;}}s:21:\"wp_update_user_counts\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:10:\"twicedaily\";s:4:\"args\";a:0:{}s:8:\"interval\";i:43200;}}}i:1696450756;a:1:{s:30:\"wp_scheduled_auto_draft_delete\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:5:\"daily\";s:4:\"args\";a:0:{}s:8:\"interval\";i:86400;}}}i:1696451269;a:1:{s:17:\"gravityforms_cron\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:5:\"daily\";s:4:\"args\";a:0:{}s:8:\"interval\";i:86400;}}}i:1696535802;a:1:{s:30:\"wp_site_health_scheduled_check\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:6:\"weekly\";s:4:\"args\";a:0:{}s:8:\"interval\";i:604800;}}}i:1696969976;a:1:{s:30:\"wp_delete_temp_updater_backups\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:6:\"weekly\";s:4:\"args\";a:0:{}s:8:\"interval\";i:604800;}}}s:7:\"version\";i:2;}','yes');
INSERT INTO `wp_options` VALUES (106,'widget_pages','a:1:{s:12:\"_multiwidget\";i:1;}','yes');
INSERT INTO `wp_options` VALUES (107,'widget_calendar','a:1:{s:12:\"_multiwidget\";i:1;}','yes');
INSERT INTO `wp_options` VALUES (108,'widget_archives','a:1:{s:12:\"_multiwidget\";i:1;}','yes');
INSERT INTO `wp_options` VALUES (109,'widget_media_audio','a:1:{s:12:\"_multiwidget\";i:1;}','yes');
INSERT INTO `wp_options` VALUES (110,'widget_media_image','a:1:{s:12:\"_multiwidget\";i:1;}','yes');
INSERT INTO `wp_options` VALUES (111,'widget_media_gallery','a:1:{s:12:\"_multiwidget\";i:1;}','yes');
INSERT INTO `wp_options` VALUES (112,'widget_media_video','a:1:{s:12:\"_multiwidget\";i:1;}','yes');
INSERT INTO `wp_options` VALUES (113,'widget_meta','a:1:{s:12:\"_multiwidget\";i:1;}','yes');
INSERT INTO `wp_options` VALUES (114,'widget_search','a:1:{s:12:\"_multiwidget\";i:1;}','yes');
INSERT INTO `wp_options` VALUES (115,'nonce_key','-P?j/TSA[VN%Ym3/;|Ny7WKc9eu];gt(&5^2Df=xWY-bAuVKAQ-3]yB:o{P({Xgz','no');
INSERT INTO `wp_options` VALUES (116,'nonce_salt','MUgO2_hL>*2u|&,X~%DT`~/Nf#W(w5W/]yoOe5^9:ngYqzQuO`dPDXA2~t[?4%uN','no');
INSERT INTO `wp_options` VALUES (117,'widget_recent-posts','a:1:{s:12:\"_multiwidget\";i:1;}','yes');
INSERT INTO `wp_options` VALUES (118,'widget_recent-comments','a:1:{s:12:\"_multiwidget\";i:1;}','yes');
INSERT INTO `wp_options` VALUES (119,'widget_tag_cloud','a:1:{s:12:\"_multiwidget\";i:1;}','yes');
INSERT INTO `wp_options` VALUES (120,'widget_nav_menu','a:2:{i:2;a:2:{s:5:\"title\";s:11:\"Information\";s:8:\"nav_menu\";i:4;}s:12:\"_multiwidget\";i:1;}','yes');
INSERT INTO `wp_options` VALUES (121,'widget_custom_html','a:4:{i:2;a:2:{s:5:\"title\";s:8:\"About Us\";s:7:\"content\";s:559:\"<p>\r\n	The Choctaw Nation is the third-largest Indian Nation in the United States with more than 212,000 tribal members and 12,000-plus associates. This ancient people has an oral tradition dating back over 13,000 years. The first tribe over the Trail of Tears, its historic reservation boundaries are in the southeast corner of Oklahoma, covering 10,923 square miles. The Choctaw Nation’s vision, “Living out the Chahta Spirit of faith, family and culture,” is evident as it continues to focus on providing opportunities for growth and prosperity.\r\n</p>\";}i:3;a:2:{s:5:\"title\";s:7:\"Contact\";s:7:\"content\";s:202:\"<p><a href=\"tel:888-555-5555\">888-555-5555</a></p>\r\n\r\n<p><a href=\"https://goo.gl/maps/amDaKZRtZCLrRkSk9\" target=\"_blank\">8090 N US Hwy 259<br/>\r\nHochatown, OK 74728</a></p>\r\n\r\n<a href=\"#\">Contact Us</a>\";}i:4;a:2:{s:5:\"title\";s:0:\"\";s:7:\"content\";s:265:\"<div class=\"social-icons\">\r\n<a href=\"#\" target=\"_blank\"><i class=\"fa-brands fa-facebook fa-2x\"></i></a>\r\n\r\n	<a href=\"#\" target=\"_blank\"><i class=\"fa-brands fa-instagram fa-2x\"></i></a>\r\n\r\n	<a href=\"#\" target=\"_blank\"><i class=\"fab fa-twitter fa-2x\"></i></a>\r\n</div>\";}s:12:\"_multiwidget\";i:1;}','yes');
INSERT INTO `wp_options` VALUES (123,'recovery_keys','a:0:{}','yes');
INSERT INTO `wp_options` VALUES (124,'theme_mods_twentytwentythree','a:2:{s:18:\"custom_css_post_id\";i:-1;s:16:\"sidebars_widgets\";a:2:{s:4:\"time\";i:1690402832;s:4:\"data\";a:3:{s:19:\"wp_inactive_widgets\";a:0:{}s:9:\"sidebar-1\";a:3:{i:0;s:7:\"block-2\";i:1;s:7:\"block-3\";i:2;s:7:\"block-4\";}s:9:\"sidebar-2\";a:2:{i:0;s:7:\"block-5\";i:1;s:7:\"block-6\";}}}}','yes');
INSERT INTO `wp_options` VALUES (125,'https_detection_errors','a:1:{s:23:\"ssl_verification_failed\";a:1:{i:0;s:24:\"SSL verification failed.\";}}','yes');
INSERT INTO `wp_options` VALUES (152,'recently_activated','a:1:{s:33:\"wp-mail-smtp-pro/wp_mail_smtp.php\";i:1690403340;}','yes');
INSERT INTO `wp_options` VALUES (156,'finished_updating_comment_type','1','yes');
INSERT INTO `wp_options` VALUES (159,'current_theme','bootScore','yes');
INSERT INTO `wp_options` VALUES (160,'theme_mods_choctaw-landing','a:4:{i:0;b:0;s:18:\"nav_menu_locations\";a:2:{s:9:\"main-menu\";i:2;s:11:\"footer-menu\";i:3;}s:33:\"bootscore_scss_modified_timestamp\";i:10151753947;s:18:\"custom_css_post_id\";i:-1;}','yes');
INSERT INTO `wp_options` VALUES (161,'theme_switched','','yes');
INSERT INTO `wp_options` VALUES (175,'acf_version','6.2.0','yes');
INSERT INTO `wp_options` VALUES (182,'gf_db_version','2.7.14','no');
INSERT INTO `wp_options` VALUES (183,'rg_form_version','2.7.14','no');
INSERT INTO `wp_options` VALUES (184,'gform_enable_background_updates','1','yes');
INSERT INTO `wp_options` VALUES (185,'_site_transient_t15s-registry-gforms','O:8:\"stdClass\":2:{s:8:\"projects\";a:0:{}s:13:\"_last_checked\";i:1696417703;}','no');
INSERT INTO `wp_options` VALUES (186,'gform_pending_installation','','yes');
INSERT INTO `wp_options` VALUES (187,'gravityformsaddon_gravityformswebapi_version','1.0','yes');
INSERT INTO `wp_options` VALUES (188,'widget_gform_widget','a:1:{s:12:\"_multiwidget\";i:1;}','yes');
INSERT INTO `wp_options` VALUES (197,'action_scheduler_hybrid_store_demarkation','11','yes');
INSERT INTO `wp_options` VALUES (198,'schema-ActionScheduler_StoreSchema','6.0.1690403281','yes');
INSERT INTO `wp_options` VALUES (199,'schema-ActionScheduler_LoggerSchema','3.0.1690403281','yes');
INSERT INTO `wp_options` VALUES (200,'wp_mail_smtp_initial_version','3.7.0','no');
INSERT INTO `wp_options` VALUES (201,'wp_mail_smtp_version','3.7.0','no');
INSERT INTO `wp_options` VALUES (202,'wp_mail_smtp','a:3:{s:4:\"mail\";a:6:{s:10:\"from_email\";s:26:\"bperkins@choctawnation.com\";s:9:\"from_name\";s:15:\"Choctaw Landing\";s:6:\"mailer\";s:4:\"mail\";s:11:\"return_path\";b:0;s:16:\"from_email_force\";b:1;s:15:\"from_name_force\";b:0;}s:4:\"smtp\";a:2:{s:7:\"autotls\";b:1;s:4:\"auth\";b:1;}s:7:\"general\";a:1:{s:29:\"summary_report_email_disabled\";b:0;}}','no');
INSERT INTO `wp_options` VALUES (203,'wp_mail_smtp_activated_time','1690403281','no');
INSERT INTO `wp_options` VALUES (204,'wp_mail_smtp_activated','a:1:{s:3:\"pro\";i:1690403281;}','yes');
INSERT INTO `wp_options` VALUES (207,'action_scheduler_lock_async-request-runner','1690403341','yes');
INSERT INTO `wp_options` VALUES (211,'wp_mail_smtp_migration_version','5','yes');
INSERT INTO `wp_options` VALUES (212,'wp_mail_smtp_debug_events_db_version','1','yes');
INSERT INTO `wp_options` VALUES (213,'wp_mail_smtp_pro_migration_version','1','yes');
INSERT INTO `wp_options` VALUES (214,'wp_mail_smtp_activation_prevent_redirect','1','yes');
INSERT INTO `wp_options` VALUES (215,'wp_mail_smtp_review_notice','a:2:{s:4:\"time\";i:1690403283;s:9:\"dismissed\";b:0;}','yes');
INSERT INTO `wp_options` VALUES (218,'acf_pro_license','YToyOntzOjM6ImtleSI7czo3MjoiT0dWbU5qUTROakExWm1Nek0yWm1aVEUwTnpOall6bGhZV1psTURaaVpEUTRPVEk1TjJZNE9UUTFObVkxTldZMFpEZ3paak5qIjtzOjM6InVybCI7czozMzoiaHR0cDovL2Nob2N0YXctbGFuZGluZy1wcm9kLmxvY2FsIjt9','yes');
INSERT INTO `wp_options` VALUES (227,'rg_gforms_key','5d6cd12c3c29d8a58210a53aee8657cb','yes');
INSERT INTO `wp_options` VALUES (228,'gform_version_info','a:11:{s:12:\"is_valid_key\";b:1;s:6:\"reason\";s:0:\"\";s:7:\"version\";s:6:\"2.7.14\";s:3:\"url\";s:168:\"https://s3.amazonaws.com/gravityforms/releases/gravityforms_2.7.14.zip?AWSAccessKeyId=AKIA5U3GBHC5WDRZA6NK&Expires=1696537709&Signature=M3hl8VViDNs0wmJi6%2BZFHHDUzp4%3D\";s:15:\"expiration_time\";i:1699804873;s:9:\"offerings\";a:67:{s:12:\"gravityforms\";a:5:{s:12:\"is_available\";b:1;s:7:\"version\";s:6:\"2.7.14\";s:14:\"version_latest\";s:8:\"2.7.14.2\";s:3:\"url\";s:168:\"https://s3.amazonaws.com/gravityforms/releases/gravityforms_2.7.14.zip?AWSAccessKeyId=AKIA5U3GBHC5WDRZA6NK&Expires=1696537709&Signature=M3hl8VViDNs0wmJi6%2BZFHHDUzp4%3D\";s:10:\"url_latest\";s:172:\"https://s3.amazonaws.com/gravityforms/releases/gravityforms_2.7.14.2.zip?AWSAccessKeyId=AKIA5U3GBHC5WDRZA6NK&Expires=1696537709&Signature=YHuNo%2FjFRssrDiOO%2BGeElrxzHuo%3D\";}s:21:\"gravityforms2checkout\";a:5:{s:12:\"is_available\";b:1;s:7:\"version\";s:3:\"2.1\";s:14:\"version_latest\";s:3:\"2.1\";s:3:\"url\";s:182:\"https://s3.amazonaws.com/gravityforms/addons/2checkout/gravityforms2checkout_2.1.zip?AWSAccessKeyId=AKIA5U3GBHC5WDRZA6NK&Expires=1696537709&Signature=nIPA2fkAux2fXlgsoa9%2B6vVSIhg%3D\";s:10:\"url_latest\";s:182:\"https://s3.amazonaws.com/gravityforms/addons/2checkout/gravityforms2checkout_2.1.zip?AWSAccessKeyId=AKIA5U3GBHC5WDRZA6NK&Expires=1696537709&Signature=nIPA2fkAux2fXlgsoa9%2B6vVSIhg%3D\";}s:26:\"gravityformsactivecampaign\";a:5:{s:12:\"is_available\";b:1;s:7:\"version\";s:3:\"2.0\";s:14:\"version_latest\";s:5:\"2.0.1\";s:3:\"url\";s:190:\"https://s3.amazonaws.com/gravityforms/addons/activecampaign/gravityformsactivecampaign_2.0.zip?AWSAccessKeyId=AKIA5U3GBHC5WDRZA6NK&Expires=1696537709&Signature=PqYZhZIG7GvFE5PVzHdxCnhQ0Ho%3D\";s:10:\"url_latest\";s:196:\"https://s3.amazonaws.com/gravityforms/addons/activecampaign/gravityformsactivecampaign_2.0.1.zip?AWSAccessKeyId=AKIA5U3GBHC5WDRZA6NK&Expires=1696537709&Signature=kK%2BAA6yrYDVanOopjgqP%2BTzB1pc%3D\";}s:32:\"gravityformsadvancedpostcreation\";a:5:{s:12:\"is_available\";b:1;s:7:\"version\";s:5:\"1.4.0\";s:14:\"version_latest\";s:5:\"1.4.0\";s:3:\"url\";s:204:\"https://s3.amazonaws.com/gravityforms/addons/advancedpostcreation/gravityformsadvancedpostcreation_1.4.0.zip?AWSAccessKeyId=AKIA5U3GBHC5WDRZA6NK&Expires=1696537709&Signature=NWPXf4rchyOcDZ3veybzvLpk2Fc%3D\";s:10:\"url_latest\";s:204:\"https://s3.amazonaws.com/gravityforms/addons/advancedpostcreation/gravityformsadvancedpostcreation_1.4.0.zip?AWSAccessKeyId=AKIA5U3GBHC5WDRZA6NK&Expires=1696537709&Signature=NWPXf4rchyOcDZ3veybzvLpk2Fc%3D\";}s:20:\"gravityformsagilecrm\";a:5:{s:12:\"is_available\";b:1;s:7:\"version\";s:3:\"1.4\";s:14:\"version_latest\";s:5:\"1.4.1\";s:3:\"url\";s:178:\"https://s3.amazonaws.com/gravityforms/addons/agilecrm/gravityformsagilecrm_1.4.zip?AWSAccessKeyId=AKIA5U3GBHC5WDRZA6NK&Expires=1696537709&Signature=pQ8INXkrbks15uVGSa3zR2uq4jg%3D\";s:10:\"url_latest\";s:184:\"https://s3.amazonaws.com/gravityforms/addons/agilecrm/gravityformsagilecrm_1.4.1.zip?AWSAccessKeyId=AKIA5U3GBHC5WDRZA6NK&Expires=1696537709&Signature=VzxRwFQenVGzB3bAtaKe%2B%2BToN4g%3D\";}s:19:\"gravityformsakismet\";a:5:{s:12:\"is_available\";b:1;s:7:\"version\";s:3:\"1.0\";s:14:\"version_latest\";s:3:\"1.0\";s:3:\"url\";s:178:\"https://s3.amazonaws.com/gravityforms/addons/akismet/gravityformsakismet_1.0.zip?AWSAccessKeyId=AKIA5U3GBHC5WDRZA6NK&Expires=1696537709&Signature=%2FoaS3ZeQzyRQuIce6ztyCuWMauI%3D\";s:10:\"url_latest\";s:178:\"https://s3.amazonaws.com/gravityforms/addons/akismet/gravityformsakismet_1.0.zip?AWSAccessKeyId=AKIA5U3GBHC5WDRZA6NK&Expires=1696537709&Signature=%2FoaS3ZeQzyRQuIce6ztyCuWMauI%3D\";}s:24:\"gravityformsauthorizenet\";a:5:{s:12:\"is_available\";b:1;s:7:\"version\";s:4:\"2.11\";s:14:\"version_latest\";s:4:\"2.11\";s:3:\"url\";s:187:\"https://s3.amazonaws.com/gravityforms/addons/authorizenet/gravityformsauthorizenet_2.11.zip?AWSAccessKeyId=AKIA5U3GBHC5WDRZA6NK&Expires=1696537709&Signature=6V7j8P0ZFLc3XdDr5TcvKxkNWdg%3D\";s:10:\"url_latest\";s:187:\"https://s3.amazonaws.com/gravityforms/addons/authorizenet/gravityformsauthorizenet_2.11.zip?AWSAccessKeyId=AKIA5U3GBHC5WDRZA6NK&Expires=1696537709&Signature=6V7j8P0ZFLc3XdDr5TcvKxkNWdg%3D\";}s:18:\"gravityformsaweber\";a:5:{s:12:\"is_available\";b:1;s:7:\"version\";s:5:\"4.0.0\";s:14:\"version_latest\";s:5:\"4.0.0\";s:3:\"url\";s:180:\"https://s3.amazonaws.com/gravityforms/addons/aweber/gravityformsaweber_4.0.0.zip?AWSAccessKeyId=AKIA5U3GBHC5WDRZA6NK&Expires=1696537709&Signature=qO3PC%2B9VYbzaMoa0e9v61Z%2FHOOc%3D\";s:10:\"url_latest\";s:180:\"https://s3.amazonaws.com/gravityforms/addons/aweber/gravityformsaweber_4.0.0.zip?AWSAccessKeyId=AKIA5U3GBHC5WDRZA6NK&Expires=1696537709&Signature=qO3PC%2B9VYbzaMoa0e9v61Z%2FHOOc%3D\";}s:21:\"gravityformsbatchbook\";a:5:{s:12:\"is_available\";b:1;s:7:\"version\";s:3:\"1.3\";s:14:\"version_latest\";s:3:\"1.3\";s:3:\"url\";s:180:\"https://s3.amazonaws.com/gravityforms/addons/batchbook/gravityformsbatchbook_1.3.zip?AWSAccessKeyId=AKIA5U3GBHC5WDRZA6NK&Expires=1696537709&Signature=sxltKi191soDLveJT55jRvq7gk4%3D\";s:10:\"url_latest\";s:180:\"https://s3.amazonaws.com/gravityforms/addons/batchbook/gravityformsbatchbook_1.3.zip?AWSAccessKeyId=AKIA5U3GBHC5WDRZA6NK&Expires=1696537709&Signature=sxltKi191soDLveJT55jRvq7gk4%3D\";}s:18:\"gravityformsbreeze\";a:5:{s:12:\"is_available\";b:1;s:7:\"version\";s:3:\"1.5\";s:14:\"version_latest\";s:5:\"1.5.1\";s:3:\"url\";s:180:\"https://s3.amazonaws.com/gravityforms/addons/breeze/gravityformsbreeze_1.5.zip?AWSAccessKeyId=AKIA5U3GBHC5WDRZA6NK&Expires=1696537709&Signature=9onvjp5%2FLkLjP%2Fj43aH%2B9PzmT9k%3D\";s:10:\"url_latest\";s:182:\"https://s3.amazonaws.com/gravityforms/addons/breeze/gravityformsbreeze_1.5.1.zip?AWSAccessKeyId=AKIA5U3GBHC5WDRZA6NK&Expires=1696537709&Signature=z%2FVkL1K%2FlbqH3rOI%2BaTzKnc6DuI%3D\";}s:27:\"gravityformscampaignmonitor\";a:5:{s:12:\"is_available\";b:1;s:7:\"version\";s:3:\"3.9\";s:14:\"version_latest\";s:5:\"3.9.1\";s:3:\"url\";s:192:\"https://s3.amazonaws.com/gravityforms/addons/campaignmonitor/gravityformscampaignmonitor_3.9.zip?AWSAccessKeyId=AKIA5U3GBHC5WDRZA6NK&Expires=1696537709&Signature=vlWkfIKnRnKmut8GLqsrTJd1nJ8%3D\";s:10:\"url_latest\";s:194:\"https://s3.amazonaws.com/gravityforms/addons/campaignmonitor/gravityformscampaignmonitor_3.9.1.zip?AWSAccessKeyId=AKIA5U3GBHC5WDRZA6NK&Expires=1696537709&Signature=LY8qnwKCirAXSlTVPIK85iLrcFs%3D\";}s:20:\"gravityformscampfire\";a:5:{s:12:\"is_available\";b:1;s:7:\"version\";s:3:\"1.1\";s:14:\"version_latest\";s:5:\"1.2.2\";s:3:\"url\";s:180:\"https://s3.amazonaws.com/gravityforms/addons/campfire/gravityformscampfire_1.1.zip?AWSAccessKeyId=AKIA5U3GBHC5WDRZA6NK&Expires=1696537709&Signature=nrTU58mwW%2FEqz6xB0t5jv3bG1vI%3D\";s:10:\"url_latest\";s:180:\"https://s3.amazonaws.com/gravityforms/addons/campfire/gravityformscampfire_1.2.2.zip?AWSAccessKeyId=AKIA5U3GBHC5WDRZA6NK&Expires=1696537709&Signature=MDGR3Bgqw2U2TXhnjSEKNuPaGrQ%3D\";}s:22:\"gravityformscapsulecrm\";a:5:{s:12:\"is_available\";b:1;s:7:\"version\";s:3:\"1.6\";s:14:\"version_latest\";s:5:\"1.6.1\";s:3:\"url\";s:184:\"https://s3.amazonaws.com/gravityforms/addons/capsulecrm/gravityformscapsulecrm_1.6.zip?AWSAccessKeyId=AKIA5U3GBHC5WDRZA6NK&Expires=1696537709&Signature=XqNfU3%2FEiFxmEKmnolpvgPE57Po%3D\";s:10:\"url_latest\";s:186:\"https://s3.amazonaws.com/gravityforms/addons/capsulecrm/gravityformscapsulecrm_1.6.1.zip?AWSAccessKeyId=AKIA5U3GBHC5WDRZA6NK&Expires=1696537709&Signature=JRi3%2BwrTULwiSNUHX0UByuwBxJE%3D\";}s:26:\"gravityformschainedselects\";a:5:{s:12:\"is_available\";b:1;s:7:\"version\";s:3:\"1.6\";s:14:\"version_latest\";s:3:\"1.6\";s:3:\"url\";s:192:\"https://s3.amazonaws.com/gravityforms/addons/chainedselects/gravityformschainedselects_1.6.zip?AWSAccessKeyId=AKIA5U3GBHC5WDRZA6NK&Expires=1696537709&Signature=aQg4jnKBS%2Byd6KOdv4bEwD8LBPI%3D\";s:10:\"url_latest\";s:192:\"https://s3.amazonaws.com/gravityforms/addons/chainedselects/gravityformschainedselects_1.6.zip?AWSAccessKeyId=AKIA5U3GBHC5WDRZA6NK&Expires=1696537709&Signature=aQg4jnKBS%2Byd6KOdv4bEwD8LBPI%3D\";}s:23:\"gravityformscleverreach\";a:5:{s:12:\"is_available\";b:1;s:7:\"version\";s:3:\"1.8\";s:14:\"version_latest\";s:3:\"1.8\";s:3:\"url\";s:184:\"https://s3.amazonaws.com/gravityforms/addons/cleverreach/gravityformscleverreach_1.8.zip?AWSAccessKeyId=AKIA5U3GBHC5WDRZA6NK&Expires=1696537709&Signature=CFG0H9pvi40qwXNTwwtwpsNdAzw%3D\";s:10:\"url_latest\";s:184:\"https://s3.amazonaws.com/gravityforms/addons/cleverreach/gravityformscleverreach_1.8.zip?AWSAccessKeyId=AKIA5U3GBHC5WDRZA6NK&Expires=1696537709&Signature=CFG0H9pvi40qwXNTwwtwpsNdAzw%3D\";}s:15:\"gravityformscli\";a:5:{s:12:\"is_available\";b:1;s:7:\"version\";s:0:\"\";s:14:\"version_latest\";s:3:\"1.4\";s:3:\"url\";s:0:\"\";s:10:\"url_latest\";s:170:\"https://s3.amazonaws.com/gravityforms/addons/cli/gravityformscli_1.4.zip?AWSAccessKeyId=AKIA5U3GBHC5WDRZA6NK&Expires=1696537709&Signature=KTK1h%2BdL7pIcCIN4tlOeE8jmVbw%3D\";}s:27:\"gravityformsconstantcontact\";a:5:{s:12:\"is_available\";b:1;s:7:\"version\";s:3:\"1.7\";s:14:\"version_latest\";s:3:\"1.7\";s:3:\"url\";s:194:\"https://s3.amazonaws.com/gravityforms/addons/constantcontact/gravityformsconstantcontact_1.7.zip?AWSAccessKeyId=AKIA5U3GBHC5WDRZA6NK&Expires=1696537709&Signature=tTMR7LYn%2B7MGpLTw6eeOUzzFcYk%3D\";s:10:\"url_latest\";s:194:\"https://s3.amazonaws.com/gravityforms/addons/constantcontact/gravityformsconstantcontact_1.7.zip?AWSAccessKeyId=AKIA5U3GBHC5WDRZA6NK&Expires=1696537709&Signature=tTMR7LYn%2B7MGpLTw6eeOUzzFcYk%3D\";}s:31:\"gravityformsconversationalforms\";a:5:{s:12:\"is_available\";b:1;s:7:\"version\";s:5:\"1.0.0\";s:14:\"version_latest\";s:5:\"1.0.1\";s:3:\"url\";s:204:\"https://s3.amazonaws.com/gravityforms/addons/conversationalforms/gravityformsconversationalforms_1.0.0.zip?AWSAccessKeyId=AKIA5U3GBHC5WDRZA6NK&Expires=1696537709&Signature=%2B9dF8rdi6OzwlzulzbjHLO4IyU8%3D\";s:10:\"url_latest\";s:206:\"https://s3.amazonaws.com/gravityforms/addons/conversationalforms/gravityformsconversationalforms_1.0.1.zip?AWSAccessKeyId=AKIA5U3GBHC5WDRZA6NK&Expires=1696537709&Signature=ThxrCE%2BRyEzy9%2FsrZNjVdADG92U%3D\";}s:22:\"gravityformsconvertkit\";a:5:{s:12:\"is_available\";b:1;s:7:\"version\";s:0:\"\";s:14:\"version_latest\";s:10:\"1.0-beta-1\";s:3:\"url\";s:188:\"https://s3.amazonaws.com/gravityforms/addons/coupons/gravityformsconvertkit_1.0-beta-1.zip?AWSAccessKeyId=AKIA5U3GBHC5WDRZA6NK&Expires=1696537709&Signature=hUY9gSAt%2BFLFavSQl1zEk1fU5T0%3D\";s:10:\"url_latest\";s:191:\"https://s3.amazonaws.com/gravityforms/addons/convertkit/gravityformsconvertkit_1.0-beta-1.zip?AWSAccessKeyId=AKIA5U3GBHC5WDRZA6NK&Expires=1696537709&Signature=ebWxL5Mggeqglq9VHMHLfvE%2FxTg%3D\";}s:19:\"gravityformscoupons\";a:5:{s:12:\"is_available\";b:1;s:7:\"version\";s:3:\"3.1\";s:14:\"version_latest\";s:3:\"3.1\";s:3:\"url\";s:178:\"https://s3.amazonaws.com/gravityforms/addons/coupons/gravityformscoupons_3.1.zip?AWSAccessKeyId=AKIA5U3GBHC5WDRZA6NK&Expires=1696537709&Signature=%2B4sdmZ1lBO6thulfGZS0a6D1Ubo%3D\";s:10:\"url_latest\";s:178:\"https://s3.amazonaws.com/gravityforms/addons/coupons/gravityformscoupons_3.1.zip?AWSAccessKeyId=AKIA5U3GBHC5WDRZA6NK&Expires=1696537709&Signature=%2B4sdmZ1lBO6thulfGZS0a6D1Ubo%3D\";}s:17:\"gravityformsdebug\";a:5:{s:12:\"is_available\";b:1;s:7:\"version\";s:0:\"\";s:14:\"version_latest\";s:10:\"1.0.beta12\";s:3:\"url\";s:0:\"\";s:10:\"url_latest\";s:181:\"https://s3.amazonaws.com/gravityforms/addons/debug/gravityformsdebug_1.0.beta12.zip?AWSAccessKeyId=AKIA5U3GBHC5WDRZA6NK&Expires=1696537709&Signature=jF1wtG7BOEHvfFuPlck0BRFMk%2BE%3D\";}s:19:\"gravityformsdropbox\";a:5:{s:12:\"is_available\";b:1;s:7:\"version\";s:3:\"3.1\";s:14:\"version_latest\";s:3:\"3.1\";s:3:\"url\";s:178:\"https://s3.amazonaws.com/gravityforms/addons/dropbox/gravityformsdropbox_3.1.zip?AWSAccessKeyId=AKIA5U3GBHC5WDRZA6NK&Expires=1696537709&Signature=bhToZMAMCo7SdkYI6xtMrM%2Fj89g%3D\";s:10:\"url_latest\";s:178:\"https://s3.amazonaws.com/gravityforms/addons/dropbox/gravityformsdropbox_3.1.zip?AWSAccessKeyId=AKIA5U3GBHC5WDRZA6NK&Expires=1696537709&Signature=bhToZMAMCo7SdkYI6xtMrM%2Fj89g%3D\";}s:24:\"gravityformsemailoctopus\";a:5:{s:12:\"is_available\";b:1;s:7:\"version\";s:3:\"1.2\";s:14:\"version_latest\";s:5:\"1.2.2\";s:3:\"url\";s:188:\"https://s3.amazonaws.com/gravityforms/addons/emailoctopus/gravityformsemailoctopus_1.2.zip?AWSAccessKeyId=AKIA5U3GBHC5WDRZA6NK&Expires=1696537709&Signature=%2FmSIX8518YU3D3GsCSPY1sN4trc%3D\";s:10:\"url_latest\";s:188:\"https://s3.amazonaws.com/gravityforms/addons/emailoctopus/gravityformsemailoctopus_1.2.2.zip?AWSAccessKeyId=AKIA5U3GBHC5WDRZA6NK&Expires=1696537709&Signature=hYlxYXfJQwMclSgxLuW0psLYXQ4%3D\";}s:16:\"gravityformsemma\";a:5:{s:12:\"is_available\";b:1;s:7:\"version\";s:3:\"1.5\";s:14:\"version_latest\";s:5:\"1.5.2\";s:3:\"url\";s:170:\"https://s3.amazonaws.com/gravityforms/addons/emma/gravityformsemma_1.5.zip?AWSAccessKeyId=AKIA5U3GBHC5WDRZA6NK&Expires=1696537709&Signature=cdCnIUYMxqSHMzubaxeKJ6SwMzU%3D\";s:10:\"url_latest\";s:174:\"https://s3.amazonaws.com/gravityforms/addons/emma/gravityformsemma_1.5.2.zip?AWSAccessKeyId=AKIA5U3GBHC5WDRZA6NK&Expires=1696537709&Signature=S3hDKZo8%2BvsXDeJXfBCosrbU5ns%3D\";}s:22:\"gravityformsfreshbooks\";a:5:{s:12:\"is_available\";b:1;s:7:\"version\";s:3:\"2.8\";s:14:\"version_latest\";s:3:\"2.8\";s:3:\"url\";s:184:\"https://s3.amazonaws.com/gravityforms/addons/freshbooks/gravityformsfreshbooks_2.8.zip?AWSAccessKeyId=AKIA5U3GBHC5WDRZA6NK&Expires=1696537709&Signature=rg9BaYnMsx%2FBLGVh6HBzbJbNTyk%3D\";s:10:\"url_latest\";s:184:\"https://s3.amazonaws.com/gravityforms/addons/freshbooks/gravityformsfreshbooks_2.8.zip?AWSAccessKeyId=AKIA5U3GBHC5WDRZA6NK&Expires=1696537709&Signature=rg9BaYnMsx%2FBLGVh6HBzbJbNTyk%3D\";}s:23:\"gravityformsgeolocation\";a:5:{s:12:\"is_available\";b:1;s:7:\"version\";s:5:\"1.1.0\";s:14:\"version_latest\";s:5:\"1.1.0\";s:3:\"url\";s:190:\"https://s3.amazonaws.com/gravityforms/addons/geolocation/gravityformsgeolocation_1.1.0.zip?AWSAccessKeyId=AKIA5U3GBHC5WDRZA6NK&Expires=1696537709&Signature=RTt8s%2BCmTvh%2BFlUWQrp8KlVwvUQ%3D\";s:10:\"url_latest\";s:190:\"https://s3.amazonaws.com/gravityforms/addons/geolocation/gravityformsgeolocation_1.1.0.zip?AWSAccessKeyId=AKIA5U3GBHC5WDRZA6NK&Expires=1696537709&Signature=RTt8s%2BCmTvh%2BFlUWQrp8KlVwvUQ%3D\";}s:23:\"gravityformsgetresponse\";a:5:{s:12:\"is_available\";b:1;s:7:\"version\";s:3:\"1.7\";s:14:\"version_latest\";s:5:\"1.7.1\";s:3:\"url\";s:184:\"https://s3.amazonaws.com/gravityforms/addons/getresponse/gravityformsgetresponse_1.7.zip?AWSAccessKeyId=AKIA5U3GBHC5WDRZA6NK&Expires=1696537709&Signature=7Vmdp3DJ8e3Qig6N8hXJ4XBGaAc%3D\";s:10:\"url_latest\";s:186:\"https://s3.amazonaws.com/gravityforms/addons/getresponse/gravityformsgetresponse_1.7.1.zip?AWSAccessKeyId=AKIA5U3GBHC5WDRZA6NK&Expires=1696537709&Signature=7McsgAU6DVvqrra3AegMtm7mHyU%3D\";}s:27:\"gravityformsgoogleanalytics\";a:5:{s:12:\"is_available\";b:1;s:7:\"version\";s:5:\"2.1.0\";s:14:\"version_latest\";s:5:\"2.1.1\";s:3:\"url\";s:198:\"https://s3.amazonaws.com/gravityforms/addons/googleanalytics/gravityformsgoogleanalytics_2.1.0.zip?AWSAccessKeyId=AKIA5U3GBHC5WDRZA6NK&Expires=1696537709&Signature=7EduXaVpwx0Oasr%2F0B%2FXlcwW0Rk%3D\";s:10:\"url_latest\";s:194:\"https://s3.amazonaws.com/gravityforms/addons/googleanalytics/gravityformsgoogleanalytics_2.1.1.zip?AWSAccessKeyId=AKIA5U3GBHC5WDRZA6NK&Expires=1696537709&Signature=JNKRy8Tq95SBj4QqSwuJh3rQgVg%3D\";}s:21:\"gravityformsgutenberg\";a:5:{s:12:\"is_available\";b:1;s:7:\"version\";s:10:\"1.0-rc-1.4\";s:14:\"version_latest\";s:10:\"1.0-rc-1.5\";s:3:\"url\";s:189:\"https://s3.amazonaws.com/gravityforms/addons/gutenberg/gravityformsgutenberg_1.0-rc-1.4.zip?AWSAccessKeyId=AKIA5U3GBHC5WDRZA6NK&Expires=1696537709&Signature=sXPa1Hoa4O6QCZfnaOwCGWV4U%2BA%3D\";s:10:\"url_latest\";s:187:\"https://s3.amazonaws.com/gravityforms/addons/gutenberg/gravityformsgutenberg_1.0-rc-1.5.zip?AWSAccessKeyId=AKIA5U3GBHC5WDRZA6NK&Expires=1696537709&Signature=rAAdXT4daONtaAqBS8rI59qnrqE%3D\";}s:21:\"gravityformshelpscout\";a:5:{s:12:\"is_available\";b:1;s:7:\"version\";s:3:\"2.1\";s:14:\"version_latest\";s:5:\"2.1.1\";s:3:\"url\";s:180:\"https://s3.amazonaws.com/gravityforms/addons/helpscout/gravityformshelpscout_2.1.zip?AWSAccessKeyId=AKIA5U3GBHC5WDRZA6NK&Expires=1696537709&Signature=YDpXxifrU36bJgsahq1618Cr0GU%3D\";s:10:\"url_latest\";s:182:\"https://s3.amazonaws.com/gravityforms/addons/helpscout/gravityformshelpscout_2.1.1.zip?AWSAccessKeyId=AKIA5U3GBHC5WDRZA6NK&Expires=1696537709&Signature=6AWaTAY5fK8ZX7HJuY3aEFxabpU%3D\";}s:20:\"gravityformshighrise\";a:5:{s:12:\"is_available\";b:1;s:7:\"version\";s:3:\"1.3\";s:14:\"version_latest\";s:3:\"1.3\";s:3:\"url\";s:182:\"https://s3.amazonaws.com/gravityforms/addons/highrise/gravityformshighrise_1.3.zip?AWSAccessKeyId=AKIA5U3GBHC5WDRZA6NK&Expires=1696537709&Signature=%2F%2BUgS2b4tRF49Mz6Nh8L08frt7M%3D\";s:10:\"url_latest\";s:182:\"https://s3.amazonaws.com/gravityforms/addons/highrise/gravityformshighrise_1.3.zip?AWSAccessKeyId=AKIA5U3GBHC5WDRZA6NK&Expires=1696537709&Signature=%2F%2BUgS2b4tRF49Mz6Nh8L08frt7M%3D\";}s:19:\"gravityformshipchat\";a:3:{s:12:\"is_available\";b:0;s:7:\"version\";s:3:\"1.2\";s:14:\"version_latest\";s:3:\"1.2\";}s:19:\"gravityformshubspot\";a:5:{s:12:\"is_available\";b:1;s:7:\"version\";s:3:\"1.9\";s:14:\"version_latest\";s:3:\"1.9\";s:3:\"url\";s:176:\"https://s3.amazonaws.com/gravityforms/addons/hubspot/gravityformshubspot_1.9.zip?AWSAccessKeyId=AKIA5U3GBHC5WDRZA6NK&Expires=1696537709&Signature=k7uTKUp4oTkEzUOmzFlV8wU3LsU%3D\";s:10:\"url_latest\";s:176:\"https://s3.amazonaws.com/gravityforms/addons/hubspot/gravityformshubspot_1.9.zip?AWSAccessKeyId=AKIA5U3GBHC5WDRZA6NK&Expires=1696537709&Signature=k7uTKUp4oTkEzUOmzFlV8wU3LsU%3D\";}s:20:\"gravityformsicontact\";a:5:{s:12:\"is_available\";b:1;s:7:\"version\";s:3:\"1.5\";s:14:\"version_latest\";s:5:\"1.5.1\";s:3:\"url\";s:178:\"https://s3.amazonaws.com/gravityforms/addons/icontact/gravityformsicontact_1.5.zip?AWSAccessKeyId=AKIA5U3GBHC5WDRZA6NK&Expires=1696537709&Signature=81CSyRfD97WUn4ijGpSUvqbwsxc%3D\";s:10:\"url_latest\";s:180:\"https://s3.amazonaws.com/gravityforms/addons/icontact/gravityformsicontact_1.5.1.zip?AWSAccessKeyId=AKIA5U3GBHC5WDRZA6NK&Expires=1696537709&Signature=WbQEwx6uVAEAG7OdvymPJGe11V0%3D\";}s:19:\"gravityformslogging\";a:5:{s:12:\"is_available\";b:1;s:7:\"version\";s:3:\"1.3\";s:14:\"version_latest\";s:5:\"1.3.1\";s:3:\"url\";s:178:\"https://s3.amazonaws.com/gravityforms/addons/logging/gravityformslogging_1.3.zip?AWSAccessKeyId=AKIA5U3GBHC5WDRZA6NK&Expires=1696537709&Signature=ci9cWXi1m6g1wIzpWm4CS%2FtZgQ8%3D\";s:10:\"url_latest\";s:178:\"https://s3.amazonaws.com/gravityforms/addons/logging/gravityformslogging_1.3.1.zip?AWSAccessKeyId=AKIA5U3GBHC5WDRZA6NK&Expires=1696537709&Signature=sudDTy2MqJsGuBMoyqG6StDwNqM%3D\";}s:19:\"gravityformsmadmimi\";a:5:{s:12:\"is_available\";b:1;s:7:\"version\";s:3:\"1.4\";s:14:\"version_latest\";s:5:\"1.4.1\";s:3:\"url\";s:176:\"https://s3.amazonaws.com/gravityforms/addons/madmimi/gravityformsmadmimi_1.4.zip?AWSAccessKeyId=AKIA5U3GBHC5WDRZA6NK&Expires=1696537709&Signature=riKeXzctrfDCph2UPqC9AghOO3M%3D\";s:10:\"url_latest\";s:180:\"https://s3.amazonaws.com/gravityforms/addons/madmimi/gravityformsmadmimi_1.4.1.zip?AWSAccessKeyId=AKIA5U3GBHC5WDRZA6NK&Expires=1696537709&Signature=cYR%2BP7u8imvIcHFbyGRqzGULdfQ%3D\";}s:21:\"gravityformsmailchimp\";a:5:{s:12:\"is_available\";b:1;s:7:\"version\";s:3:\"5.2\";s:14:\"version_latest\";s:5:\"5.2.1\";s:3:\"url\";s:182:\"https://s3.amazonaws.com/gravityforms/addons/mailchimp/gravityformsmailchimp_5.2.0.zip?AWSAccessKeyId=AKIA5U3GBHC5WDRZA6NK&Expires=1696537709&Signature=awg6egFdCyc3YGMPEEmZDkkflp4%3D\";s:10:\"url_latest\";s:184:\"https://s3.amazonaws.com/gravityforms/addons/mailchimp/gravityformsmailchimp_5.2.1.zip?AWSAccessKeyId=AKIA5U3GBHC5WDRZA6NK&Expires=1696537709&Signature=dTYKoVzaOst9SIr97mGDpOUw%2F3I%3D\";}s:19:\"gravityformsmailgun\";a:5:{s:12:\"is_available\";b:1;s:7:\"version\";s:3:\"1.3\";s:14:\"version_latest\";s:5:\"1.3.1\";s:3:\"url\";s:180:\"https://s3.amazonaws.com/gravityforms/addons/mailgun/gravityformsmailgun_1.3.zip?AWSAccessKeyId=AKIA5U3GBHC5WDRZA6NK&Expires=1696537709&Signature=V0R7%2F6bU6nrYl%2FW1idbbeR5i5VY%3D\";s:10:\"url_latest\";s:180:\"https://s3.amazonaws.com/gravityforms/addons/mailgun/gravityformsmailgun_1.3.1.zip?AWSAccessKeyId=AKIA5U3GBHC5WDRZA6NK&Expires=1696537709&Signature=gY2Cg%2BOibz1Ni2WDfZdnNRIl4SI%3D\";}s:22:\"gravityformsmoderation\";a:5:{s:12:\"is_available\";b:1;s:7:\"version\";s:3:\"1.0\";s:14:\"version_latest\";s:3:\"1.0\";s:3:\"url\";s:184:\"https://s3.amazonaws.com/gravityforms/addons/moderation/gravityformsmoderation_1.0.zip?AWSAccessKeyId=AKIA5U3GBHC5WDRZA6NK&Expires=1696537709&Signature=c2KziED69NWRXZE7QjCrLaui%2BGI%3D\";s:10:\"url_latest\";s:184:\"https://s3.amazonaws.com/gravityforms/addons/moderation/gravityformsmoderation_1.0.zip?AWSAccessKeyId=AKIA5U3GBHC5WDRZA6NK&Expires=1696537709&Signature=c2KziED69NWRXZE7QjCrLaui%2BGI%3D\";}s:18:\"gravityformsmollie\";a:5:{s:12:\"is_available\";b:1;s:7:\"version\";s:3:\"1.3\";s:14:\"version_latest\";s:5:\"1.3.1\";s:3:\"url\";s:178:\"https://s3.amazonaws.com/gravityforms/addons/mollie/gravityformsmollie_1.3.zip?AWSAccessKeyId=AKIA5U3GBHC5WDRZA6NK&Expires=1696537709&Signature=9%2FGNcW1Cj1q5l0%2FaKESdaLpzGGA%3D\";s:10:\"url_latest\";s:178:\"https://s3.amazonaws.com/gravityforms/addons/mollie/gravityformsmollie_1.3.1.zip?AWSAccessKeyId=AKIA5U3GBHC5WDRZA6NK&Expires=1696537709&Signature=J3P1DmxxaDJZACTXQlXNS9mE%2Fg4%3D\";}s:26:\"gravityformspartialentries\";a:5:{s:12:\"is_available\";b:1;s:7:\"version\";s:3:\"1.7\";s:14:\"version_latest\";s:3:\"1.7\";s:3:\"url\";s:190:\"https://s3.amazonaws.com/gravityforms/addons/partialentries/gravityformspartialentries_1.7.zip?AWSAccessKeyId=AKIA5U3GBHC5WDRZA6NK&Expires=1696537709&Signature=QpOLMJEBT01cV2vBaTRGSAKxud0%3D\";s:10:\"url_latest\";s:190:\"https://s3.amazonaws.com/gravityforms/addons/partialentries/gravityformspartialentries_1.7.zip?AWSAccessKeyId=AKIA5U3GBHC5WDRZA6NK&Expires=1696537709&Signature=QpOLMJEBT01cV2vBaTRGSAKxud0%3D\";}s:18:\"gravityformspaypal\";a:5:{s:12:\"is_available\";b:1;s:7:\"version\";s:3:\"3.5\";s:14:\"version_latest\";s:3:\"3.5\";s:3:\"url\";s:174:\"https://s3.amazonaws.com/gravityforms/addons/paypal/gravityformspaypal_3.5.zip?AWSAccessKeyId=AKIA5U3GBHC5WDRZA6NK&Expires=1696537709&Signature=bUT5IIVSfYcmxLhpwiTzV7daB2s%3D\";s:10:\"url_latest\";s:174:\"https://s3.amazonaws.com/gravityforms/addons/paypal/gravityformspaypal_3.5.zip?AWSAccessKeyId=AKIA5U3GBHC5WDRZA6NK&Expires=1696537709&Signature=bUT5IIVSfYcmxLhpwiTzV7daB2s%3D\";}s:33:\"gravityformspaypalexpresscheckout\";a:3:{s:12:\"is_available\";b:0;s:7:\"version\";s:0:\"\";s:14:\"version_latest\";N;}s:29:\"gravityformspaypalpaymentspro\";a:5:{s:12:\"is_available\";b:1;s:7:\"version\";s:3:\"2.7\";s:14:\"version_latest\";s:3:\"2.7\";s:3:\"url\";s:200:\"https://s3.amazonaws.com/gravityforms/addons/paypalpaymentspro/gravityformspaypalpaymentspro_2.7.zip?AWSAccessKeyId=AKIA5U3GBHC5WDRZA6NK&Expires=1696537709&Signature=5i9OiIwjc%2FpZ%2F6NZf0HjYV3409o%3D\";s:10:\"url_latest\";s:200:\"https://s3.amazonaws.com/gravityforms/addons/paypalpaymentspro/gravityformspaypalpaymentspro_2.7.zip?AWSAccessKeyId=AKIA5U3GBHC5WDRZA6NK&Expires=1696537709&Signature=5i9OiIwjc%2FpZ%2F6NZf0HjYV3409o%3D\";}s:21:\"gravityformspaypalpro\";a:5:{s:12:\"is_available\";b:1;s:7:\"version\";s:5:\"1.8.1\";s:14:\"version_latest\";s:5:\"1.8.4\";s:3:\"url\";s:186:\"https://s3.amazonaws.com/gravityforms/addons/paypalpro/gravityformspaypalpro_1.8.1.zip?AWSAccessKeyId=AKIA5U3GBHC5WDRZA6NK&Expires=1696537709&Signature=OsSoW%2F5FuaUGQ%2FAfEew6lSGhCrE%3D\";s:10:\"url_latest\";s:182:\"https://s3.amazonaws.com/gravityforms/addons/paypalpro/gravityformspaypalpro_1.8.4.zip?AWSAccessKeyId=AKIA5U3GBHC5WDRZA6NK&Expires=1696537709&Signature=2ypTNFJ9J2vB07LDB3rJuiIBzjU%3D\";}s:20:\"gravityformspicatcha\";a:3:{s:12:\"is_available\";b:0;s:7:\"version\";s:3:\"2.0\";s:14:\"version_latest\";s:3:\"2.0\";}s:16:\"gravityformspipe\";a:5:{s:12:\"is_available\";b:1;s:7:\"version\";s:3:\"1.2\";s:14:\"version_latest\";s:5:\"1.3.1\";s:3:\"url\";s:170:\"https://s3.amazonaws.com/gravityforms/addons/pipe/gravityformspipe_1.2.zip?AWSAccessKeyId=AKIA5U3GBHC5WDRZA6NK&Expires=1696537709&Signature=ljGtOXGfB6P8V7ByVaJ9iQRtUDw%3D\";s:10:\"url_latest\";s:172:\"https://s3.amazonaws.com/gravityforms/addons/pipe/gravityformspipe_1.3.1.zip?AWSAccessKeyId=AKIA5U3GBHC5WDRZA6NK&Expires=1696537709&Signature=VaLQsu8KsYvjqY4CKeY8m96FLS0%3D\";}s:17:\"gravityformspolls\";a:5:{s:12:\"is_available\";b:1;s:7:\"version\";s:3:\"4.1\";s:14:\"version_latest\";s:3:\"4.1\";s:3:\"url\";s:176:\"https://s3.amazonaws.com/gravityforms/addons/polls/gravityformspolls_4.1.zip?AWSAccessKeyId=AKIA5U3GBHC5WDRZA6NK&Expires=1696537709&Signature=myyCZ5nZj7ASKdd%2FAFiSLvPp%2FE4%3D\";s:10:\"url_latest\";s:176:\"https://s3.amazonaws.com/gravityforms/addons/polls/gravityformspolls_4.1.zip?AWSAccessKeyId=AKIA5U3GBHC5WDRZA6NK&Expires=1696537709&Signature=myyCZ5nZj7ASKdd%2FAFiSLvPp%2FE4%3D\";}s:20:\"gravityformspostmark\";a:5:{s:12:\"is_available\";b:1;s:7:\"version\";s:3:\"1.3\";s:14:\"version_latest\";s:3:\"1.3\";s:3:\"url\";s:178:\"https://s3.amazonaws.com/gravityforms/addons/postmark/gravityformspostmark_1.3.zip?AWSAccessKeyId=AKIA5U3GBHC5WDRZA6NK&Expires=1696537709&Signature=DXnGwHza6iaj5V1IQOAiV5kiMHc%3D\";s:10:\"url_latest\";s:178:\"https://s3.amazonaws.com/gravityforms/addons/postmark/gravityformspostmark_1.3.zip?AWSAccessKeyId=AKIA5U3GBHC5WDRZA6NK&Expires=1696537709&Signature=DXnGwHza6iaj5V1IQOAiV5kiMHc%3D\";}s:16:\"gravityformsppcp\";a:5:{s:12:\"is_available\";b:1;s:7:\"version\";s:5:\"2.7.0\";s:14:\"version_latest\";s:5:\"2.7.2\";s:3:\"url\";s:172:\"https://s3.amazonaws.com/gravityforms/addons/ppcp/gravityformsppcp_2.7.0.zip?AWSAccessKeyId=AKIA5U3GBHC5WDRZA6NK&Expires=1696537709&Signature=p6eYizO0fcBBnRwj5emFbTN1Gek%3D\";s:10:\"url_latest\";s:174:\"https://s3.amazonaws.com/gravityforms/addons/ppcp/gravityformsppcp_2.7.2.zip?AWSAccessKeyId=AKIA5U3GBHC5WDRZA6NK&Expires=1696537709&Signature=RqhJ2b%2Benbh5f5PP4xlG6RcOLyI%3D\";}s:16:\"gravityformsquiz\";a:5:{s:12:\"is_available\";b:1;s:7:\"version\";s:3:\"4.1\";s:14:\"version_latest\";s:3:\"4.1\";s:3:\"url\";s:170:\"https://s3.amazonaws.com/gravityforms/addons/quiz/gravityformsquiz_4.1.zip?AWSAccessKeyId=AKIA5U3GBHC5WDRZA6NK&Expires=1696537709&Signature=Z6ftJk3s4WGsDZ4h9JwG0qhddNc%3D\";s:10:\"url_latest\";s:170:\"https://s3.amazonaws.com/gravityforms/addons/quiz/gravityformsquiz_4.1.zip?AWSAccessKeyId=AKIA5U3GBHC5WDRZA6NK&Expires=1696537709&Signature=Z6ftJk3s4WGsDZ4h9JwG0qhddNc%3D\";}s:21:\"gravityformsrecaptcha\";a:5:{s:12:\"is_available\";b:1;s:7:\"version\";s:5:\"1.2.0\";s:14:\"version_latest\";s:5:\"1.2.2\";s:3:\"url\";s:188:\"https://s3.amazonaws.com/gravityforms/addons/recaptcha/gravityformsrecaptcha_1.2.0.zip?AWSAccessKeyId=AKIA5U3GBHC5WDRZA6NK&Expires=1696537709&Signature=ffMKpd3%2F%2BiV%2F7h1in4yfOQ6hfvU%3D\";s:10:\"url_latest\";s:184:\"https://s3.amazonaws.com/gravityforms/addons/recaptcha/gravityformsrecaptcha_1.2.2.zip?AWSAccessKeyId=AKIA5U3GBHC5WDRZA6NK&Expires=1696537709&Signature=YpWJuV%2FR332zSNEkIkLZzO7ltuI%3D\";}s:19:\"gravityformsrestapi\";a:5:{s:12:\"is_available\";b:1;s:7:\"version\";s:10:\"2.0-beta-2\";s:14:\"version_latest\";s:10:\"2.0-beta-2\";s:3:\"url\";s:183:\"https://s3.amazonaws.com/gravityforms/addons/restapi/gravityformsrestapi_2.0-beta-2.zip?AWSAccessKeyId=AKIA5U3GBHC5WDRZA6NK&Expires=1696537709&Signature=7woim1X0vLc5EgNBUVixp7doYfY%3D\";s:10:\"url_latest\";s:183:\"https://s3.amazonaws.com/gravityforms/addons/restapi/gravityformsrestapi_2.0-beta-2.zip?AWSAccessKeyId=AKIA5U3GBHC5WDRZA6NK&Expires=1696537709&Signature=7woim1X0vLc5EgNBUVixp7doYfY%3D\";}s:20:\"gravityformssendgrid\";a:5:{s:12:\"is_available\";b:1;s:7:\"version\";s:3:\"1.5\";s:14:\"version_latest\";s:3:\"1.5\";s:3:\"url\";s:186:\"https://s3.amazonaws.com/gravityforms/addons/sendgrid/gravityformssendgrid_1.5.zip?AWSAccessKeyId=AKIA5U3GBHC5WDRZA6NK&Expires=1696537709&Signature=cEUSz%2F%2FDVUIfd%2B59C%2FPE5CAxIXQ%3D\";s:10:\"url_latest\";s:186:\"https://s3.amazonaws.com/gravityforms/addons/sendgrid/gravityformssendgrid_1.5.zip?AWSAccessKeyId=AKIA5U3GBHC5WDRZA6NK&Expires=1696537709&Signature=cEUSz%2F%2FDVUIfd%2B59C%2FPE5CAxIXQ%3D\";}s:21:\"gravityformssignature\";a:5:{s:12:\"is_available\";b:1;s:7:\"version\";s:3:\"4.5\";s:14:\"version_latest\";s:3:\"4.5\";s:3:\"url\";s:184:\"https://s3.amazonaws.com/gravityforms/addons/signature/gravityformssignature_4.5.zip?AWSAccessKeyId=AKIA5U3GBHC5WDRZA6NK&Expires=1696537709&Signature=%2BRxT5hzH0irdT7zxtKBWc%2Bt4G5c%3D\";s:10:\"url_latest\";s:184:\"https://s3.amazonaws.com/gravityforms/addons/signature/gravityformssignature_4.5.zip?AWSAccessKeyId=AKIA5U3GBHC5WDRZA6NK&Expires=1696537709&Signature=%2BRxT5hzH0irdT7zxtKBWc%2Bt4G5c%3D\";}s:17:\"gravityformsslack\";a:5:{s:12:\"is_available\";b:1;s:7:\"version\";s:3:\"2.0\";s:14:\"version_latest\";s:5:\"2.0.1\";s:3:\"url\";s:174:\"https://s3.amazonaws.com/gravityforms/addons/slack/gravityformsslack_2.0.zip?AWSAccessKeyId=AKIA5U3GBHC5WDRZA6NK&Expires=1696537709&Signature=3DBv3eZrPcwwETYpOBaQluJB%2Fck%3D\";s:10:\"url_latest\";s:176:\"https://s3.amazonaws.com/gravityforms/addons/slack/gravityformsslack_2.0.1.zip?AWSAccessKeyId=AKIA5U3GBHC5WDRZA6NK&Expires=1696537709&Signature=2aCXMatP%2Fw7c7R3A4Doh23yht9g%3D\";}s:18:\"gravityformssquare\";a:5:{s:12:\"is_available\";b:1;s:7:\"version\";s:5:\"2.0.0\";s:14:\"version_latest\";s:5:\"2.0.0\";s:3:\"url\";s:176:\"https://s3.amazonaws.com/gravityforms/addons/square/gravityformssquare_2.0.0.zip?AWSAccessKeyId=AKIA5U3GBHC5WDRZA6NK&Expires=1696537709&Signature=ZsfcdSvpuPjm8Q34RS8ISJt2Zy4%3D\";s:10:\"url_latest\";s:176:\"https://s3.amazonaws.com/gravityforms/addons/square/gravityformssquare_2.0.0.zip?AWSAccessKeyId=AKIA5U3GBHC5WDRZA6NK&Expires=1696537709&Signature=ZsfcdSvpuPjm8Q34RS8ISJt2Zy4%3D\";}s:18:\"gravityformsstripe\";a:5:{s:12:\"is_available\";b:1;s:7:\"version\";s:5:\"5.2.0\";s:14:\"version_latest\";s:5:\"5.2.0\";s:3:\"url\";s:176:\"https://s3.amazonaws.com/gravityforms/addons/stripe/gravityformsstripe_5.2.0.zip?AWSAccessKeyId=AKIA5U3GBHC5WDRZA6NK&Expires=1696537709&Signature=3dDELmHHeJvauSVgM2f5D8wHB80%3D\";s:10:\"url_latest\";s:176:\"https://s3.amazonaws.com/gravityforms/addons/stripe/gravityformsstripe_5.2.0.zip?AWSAccessKeyId=AKIA5U3GBHC5WDRZA6NK&Expires=1696537709&Signature=3dDELmHHeJvauSVgM2f5D8wHB80%3D\";}s:18:\"gravityformssurvey\";a:5:{s:12:\"is_available\";b:1;s:7:\"version\";s:3:\"3.8\";s:14:\"version_latest\";s:3:\"3.8\";s:3:\"url\";s:174:\"https://s3.amazonaws.com/gravityforms/addons/survey/gravityformssurvey_3.8.zip?AWSAccessKeyId=AKIA5U3GBHC5WDRZA6NK&Expires=1696537709&Signature=doi2W32xqjXx6zo9CGwgXd1FlZw%3D\";s:10:\"url_latest\";s:174:\"https://s3.amazonaws.com/gravityforms/addons/survey/gravityformssurvey_3.8.zip?AWSAccessKeyId=AKIA5U3GBHC5WDRZA6NK&Expires=1696537709&Signature=doi2W32xqjXx6zo9CGwgXd1FlZw%3D\";}s:18:\"gravityformstrello\";a:5:{s:12:\"is_available\";b:1;s:7:\"version\";s:3:\"2.0\";s:14:\"version_latest\";s:5:\"2.0.1\";s:3:\"url\";s:178:\"https://s3.amazonaws.com/gravityforms/addons/trello/gravityformstrello_2.0.zip?AWSAccessKeyId=AKIA5U3GBHC5WDRZA6NK&Expires=1696537709&Signature=x%2BxhlHkg1StnWuhMm%2Fcy6fdUsJQ%3D\";s:10:\"url_latest\";s:176:\"https://s3.amazonaws.com/gravityforms/addons/trello/gravityformstrello_2.0.1.zip?AWSAccessKeyId=AKIA5U3GBHC5WDRZA6NK&Expires=1696537709&Signature=OiQWKsG9hzzMsppI7DFMRMPSVQU%3D\";}s:21:\"gravityformsturnstile\";a:5:{s:12:\"is_available\";b:1;s:7:\"version\";s:5:\"1.0.0\";s:14:\"version_latest\";s:5:\"1.0.0\";s:3:\"url\";s:184:\"https://s3.amazonaws.com/gravityforms/addons/turnstile/gravityformsturnstile_1.0.0.zip?AWSAccessKeyId=AKIA5U3GBHC5WDRZA6NK&Expires=1696537709&Signature=i%2B6MpkyrHRa2n5qaxqvMVUrh2VQ%3D\";s:10:\"url_latest\";s:184:\"https://s3.amazonaws.com/gravityforms/addons/turnstile/gravityformsturnstile_1.0.0.zip?AWSAccessKeyId=AKIA5U3GBHC5WDRZA6NK&Expires=1696537709&Signature=i%2B6MpkyrHRa2n5qaxqvMVUrh2VQ%3D\";}s:18:\"gravityformstwilio\";a:5:{s:12:\"is_available\";b:1;s:7:\"version\";s:3:\"2.9\";s:14:\"version_latest\";s:5:\"2.9.1\";s:3:\"url\";s:176:\"https://s3.amazonaws.com/gravityforms/addons/twilio/gravityformstwilio_2.9.zip?AWSAccessKeyId=AKIA5U3GBHC5WDRZA6NK&Expires=1696537709&Signature=TYhUDBd43aM2X881n%2F7nYzNCAd0%3D\";s:10:\"url_latest\";s:176:\"https://s3.amazonaws.com/gravityforms/addons/twilio/gravityformstwilio_2.9.1.zip?AWSAccessKeyId=AKIA5U3GBHC5WDRZA6NK&Expires=1696537709&Signature=kHuKo5yLmYB5wFB3pDFWm5ABYn8%3D\";}s:28:\"gravityformsuserregistration\";a:5:{s:12:\"is_available\";b:1;s:7:\"version\";s:5:\"5.2.0\";s:14:\"version_latest\";s:5:\"5.2.0\";s:3:\"url\";s:198:\"https://s3.amazonaws.com/gravityforms/addons/userregistration/gravityformsuserregistration_5.2.0.zip?AWSAccessKeyId=AKIA5U3GBHC5WDRZA6NK&Expires=1696537709&Signature=6xS3uVE1VM9vbBt9%2BB8QEmeAXWc%3D\";s:10:\"url_latest\";s:198:\"https://s3.amazonaws.com/gravityforms/addons/userregistration/gravityformsuserregistration_5.2.0.zip?AWSAccessKeyId=AKIA5U3GBHC5WDRZA6NK&Expires=1696537709&Signature=6xS3uVE1VM9vbBt9%2BB8QEmeAXWc%3D\";}s:20:\"gravityformswebhooks\";a:5:{s:12:\"is_available\";b:1;s:7:\"version\";s:3:\"1.5\";s:14:\"version_latest\";s:3:\"1.5\";s:3:\"url\";s:178:\"https://s3.amazonaws.com/gravityforms/addons/webhooks/gravityformswebhooks_1.5.zip?AWSAccessKeyId=AKIA5U3GBHC5WDRZA6NK&Expires=1696537709&Signature=0mPj9ivJxrELhonIKyy6cHZvMmo%3D\";s:10:\"url_latest\";s:178:\"https://s3.amazonaws.com/gravityforms/addons/webhooks/gravityformswebhooks_1.5.zip?AWSAccessKeyId=AKIA5U3GBHC5WDRZA6NK&Expires=1696537709&Signature=0mPj9ivJxrELhonIKyy6cHZvMmo%3D\";}s:18:\"gravityformszapier\";a:5:{s:12:\"is_available\";b:1;s:7:\"version\";s:3:\"4.2\";s:14:\"version_latest\";s:5:\"4.2.1\";s:3:\"url\";s:176:\"https://s3.amazonaws.com/gravityforms/addons/zapier/gravityformszapier_4.2.zip?AWSAccessKeyId=AKIA5U3GBHC5WDRZA6NK&Expires=1696537709&Signature=wh6iu2S5HubJKJbqYRJV%2Fuovtto%3D\";s:10:\"url_latest\";s:178:\"https://s3.amazonaws.com/gravityforms/addons/zapier/gravityformszapier_4.2.1.zip?AWSAccessKeyId=AKIA5U3GBHC5WDRZA6NK&Expires=1696537709&Signature=gDKoLSfUA9%2FYNG9tVR9bwTeseWs%3D\";}s:19:\"gravityformszohocrm\";a:5:{s:12:\"is_available\";b:1;s:7:\"version\";s:3:\"2.0\";s:14:\"version_latest\";s:5:\"2.0.1\";s:3:\"url\";s:178:\"https://s3.amazonaws.com/gravityforms/addons/zohocrm/gravityformszohocrm_2.0.zip?AWSAccessKeyId=AKIA5U3GBHC5WDRZA6NK&Expires=1696537709&Signature=wY2p7F%2FuvoHKkCZD79RRaqJBD9E%3D\";s:10:\"url_latest\";s:178:\"https://s3.amazonaws.com/gravityforms/addons/zohocrm/gravityformszohocrm_2.0.1.zip?AWSAccessKeyId=AKIA5U3GBHC5WDRZA6NK&Expires=1696537709&Signature=cRRpWqokeYFaohcQ3y5l7sU3ZJQ%3D\";}s:11:\"gravitysmtp\";a:5:{s:12:\"is_available\";b:1;s:7:\"version\";s:11:\"1.0-alpha-4\";s:14:\"version_latest\";s:11:\"1.0-alpha-4\";s:3:\"url\";s:184:\"https://s3.amazonaws.com/gravityforms/addons/gravitysmtp/gravitysmtp_1.0-alpha-4.zip?AWSAccessKeyId=AKIA5U3GBHC5WDRZA6NK&Expires=1696537709&Signature=VU67TvnB%2FekJgEdtIG%2BKL86y6LM%3D\";s:10:\"url_latest\";s:184:\"https://s3.amazonaws.com/gravityforms/addons/gravitysmtp/gravitysmtp_1.0-alpha-4.zip?AWSAccessKeyId=AKIA5U3GBHC5WDRZA6NK&Expires=1696537709&Signature=VU67TvnB%2FekJgEdtIG%2BKL86y6LM%3D\";}}s:9:\"is_active\";s:1:\"1\";s:12:\"product_code\";s:7:\"GFELITE\";s:14:\"version_latest\";s:8:\"2.7.14.2\";s:10:\"url_latest\";s:172:\"https://s3.amazonaws.com/gravityforms/releases/gravityforms_2.7.14.2.zip?AWSAccessKeyId=AKIA5U3GBHC5WDRZA6NK&Expires=1696537709&Signature=YHuNo%2FjFRssrDiOO%2BGeElrxzHuo%3D\";s:9:\"timestamp\";i:1696364909;}','no');
INSERT INTO `wp_options` VALUES (233,'rg_gforms_enable_akismet','1','yes');
INSERT INTO `wp_options` VALUES (234,'rg_gforms_currency','USD','yes');
INSERT INTO `wp_options` VALUES (235,'gform_enable_toolbar_menu','1','yes');
INSERT INTO `wp_options` VALUES (236,'rg_gforms_enable_html5','1','yes');
INSERT INTO `wp_options` VALUES (244,'nav_menu_options','a:2:{i:0;b:0;s:8:\"auto_add\";a:0:{}}','yes');
INSERT INTO `wp_options` VALUES (264,'_transient_health-check-site-status-result','{\"good\":18,\"recommended\":2,\"critical\":0}','yes');
INSERT INTO `wp_options` VALUES (359,'db_upgraded','','yes');
INSERT INTO `wp_options` VALUES (363,'auto_core_update_notified','a:4:{s:4:\"type\";s:7:\"success\";s:5:\"email\";s:26:\"bperkins@choctawnation.com\";s:7:\"version\";s:5:\"6.3.1\";s:9:\"timestamp\";i:1693339074;}','no');
INSERT INTO `wp_options` VALUES (370,'can_compress_scripts','0','yes');
INSERT INTO `wp_options` VALUES (383,'_site_transient_update_themes','O:8:\"stdClass\":5:{s:12:\"last_checked\";i:1696417705;s:7:\"checked\";a:2:{s:15:\"choctaw-landing\";s:5:\"5.3.1\";s:17:\"twentytwentythree\";s:3:\"1.2\";}s:8:\"response\";a:0:{}s:9:\"no_update\";a:1:{s:17:\"twentytwentythree\";a:6:{s:5:\"theme\";s:17:\"twentytwentythree\";s:11:\"new_version\";s:3:\"1.2\";s:3:\"url\";s:47:\"https://wordpress.org/themes/twentytwentythree/\";s:7:\"package\";s:63:\"https://downloads.wordpress.org/theme/twentytwentythree.1.2.zip\";s:8:\"requires\";s:3:\"6.1\";s:12:\"requires_php\";s:3:\"5.6\";}}s:12:\"translations\";a:0:{}}','no');
INSERT INTO `wp_options` VALUES (386,'gf_previous_db_version','2.7.13','yes');
INSERT INTO `wp_options` VALUES (387,'gf_upgrade_lock','','yes');
INSERT INTO `wp_options` VALUES (388,'gform_sticky_admin_messages','a:0:{}','yes');
INSERT INTO `wp_options` VALUES (389,'auto_update_plugins','a:1:{i:0;s:29:\"gravityforms/gravityforms.php\";}','no');
INSERT INTO `wp_options` VALUES (391,'_transient_gf_updated','2.7','yes');
INSERT INTO `wp_options` VALUES (392,'gf_rest_api_db_version','2.7.14','yes');
INSERT INTO `wp_options` VALUES (471,'gf_telemetry_data','a:2:{s:8:\"snapshot\";O:64:\"Gravity_Forms\\Gravity_Forms\\Telemetry\\GF_Telemetry_Snapshot_Data\":2:{s:4:\"data\";a:33:{s:2:\"of\";s:12:\"gravityforms\";s:3:\"key\";s:32:\"5d6cd12c3c29d8a58210a53aee8657cb\";s:1:\"v\";s:6:\"2.7.14\";s:2:\"wp\";s:5:\"6.3.1\";s:3:\"php\";s:5:\"8.1.9\";s:5:\"mysql\";s:6:\"8.0.16\";s:7:\"version\";s:1:\"2\";s:7:\"plugins\";s:368:\"[{\"name\":\"Advanced Custom Fields PRO\",\"slug\":\"advanced-custom-fields-pro\",\"version\":\"6.2.0\",\"is_active\":true},{\"name\":\"Classic Editor\",\"slug\":\"classic-editor\",\"version\":\"1.6.3\",\"is_active\":true},{\"name\":\"Gravity Forms\",\"slug\":\"gravityforms\",\"version\":\"2.7.14\",\"is_active\":true},{\"name\":\"WP Mail SMTP Pro\",\"slug\":\"wp-mail-smtp-pro\",\"version\":\"3.7.0\",\"is_active\":false}]\";s:2:\"tn\";s:9:\"bootScore\";s:2:\"tu\";s:21:\"https://bootscore.me/\";s:2:\"tv\";s:5:\"5.3.1\";s:2:\"ta\";s:9:\"bootScore\";s:3:\"tau\";s:20:\"https://bootscore.me\";s:2:\"im\";b:0;s:2:\"fc\";i:0;s:2:\"ec\";s:1:\"0\";s:3:\"emc\";i:0;s:3:\"api\";i:0;s:5:\"emeta\";i:0;s:2:\"ed\";i:0;s:2:\"en\";i:0;s:4:\"lang\";s:5:\"en_US\";s:10:\"autoUpdate\";i:1;s:8:\"currency\";s:3:\"USD\";s:14:\"dataCollection\";i:0;s:5:\"email\";b:0;s:9:\"formTypes\";s:0:\"\";s:14:\"formTypesOther\";b:0;s:11:\"hideLicense\";i:0;s:12:\"organization\";b:0;s:17:\"organizationOther\";b:0;s:8:\"services\";s:0:\"\";s:13:\"servicesOther\";b:0;}s:3:\"key\";s:8:\"snapshot\";}s:6:\"events\";a:0:{}}','yes');
INSERT INTO `wp_options` VALUES (590,'_site_transient_update_core','O:8:\"stdClass\":4:{s:7:\"updates\";a:1:{i:0;O:8:\"stdClass\":10:{s:8:\"response\";s:6:\"latest\";s:8:\"download\";s:59:\"https://downloads.wordpress.org/release/wordpress-6.3.1.zip\";s:6:\"locale\";s:5:\"en_US\";s:8:\"packages\";O:8:\"stdClass\":5:{s:4:\"full\";s:59:\"https://downloads.wordpress.org/release/wordpress-6.3.1.zip\";s:10:\"no_content\";s:70:\"https://downloads.wordpress.org/release/wordpress-6.3.1-no-content.zip\";s:11:\"new_bundled\";s:71:\"https://downloads.wordpress.org/release/wordpress-6.3.1-new-bundled.zip\";s:7:\"partial\";s:0:\"\";s:8:\"rollback\";s:0:\"\";}s:7:\"current\";s:5:\"6.3.1\";s:7:\"version\";s:5:\"6.3.1\";s:11:\"php_version\";s:5:\"7.0.0\";s:13:\"mysql_version\";s:3:\"5.0\";s:11:\"new_bundled\";s:3:\"6.1\";s:15:\"partial_version\";s:0:\"\";}}s:12:\"last_checked\";i:1696433302;s:15:\"version_checked\";s:5:\"6.3.1\";s:12:\"translations\";a:0:{}}','no');
INSERT INTO `wp_options` VALUES (723,'_transient_GFCache_564b75aaa4d848fd8482647493655f8d','a:2:{s:17:\"gravityforms_cron\";a:3:{i:0;i:1696364909;i:1;i:1696278552;i:2;i:1696249695;}s:30:\"wp_gf_telemetry_processor_cron\";a:1:{i:0;i:1695504465;}}','yes');
INSERT INTO `wp_options` VALUES (785,'options_stay_content','<img class=\"mega-menu-image\" src=\"/wp-content/uploads/2023/08/one-king-bed.jpg\" />\r\n<button class=\"btn-mega-menu\">Book Now</button>','no');
INSERT INTO `wp_options` VALUES (786,'_options_stay_content','field_650c927c42c11','no');
INSERT INTO `wp_options` VALUES (789,'recovery_mode_email_last_sent','1695324201','yes');
INSERT INTO `wp_options` VALUES (790,'options_eat_and_drink_content','<img class=\"mega-menu-image\" src=\"/wp-content/uploads/2023/09/food-oka-sita.jpg\" />','no');
INSERT INTO `wp_options` VALUES (791,'_options_eat_and_drink_content','field_650c982d15823','no');
INSERT INTO `wp_options` VALUES (799,'options_entertainment_content','<img class=\"mega-menu-image\" src=\"/wp-content/uploads/2023/09/entertainment-header.jpg\" />','no');
INSERT INTO `wp_options` VALUES (800,'_options_entertainment_content','field_650c9936315fa','no');
INSERT INTO `wp_options` VALUES (801,'options_things_to_do_content','<img class=\"mega-menu-image\" src=\"/wp-content/uploads/2023/09/things-to-do-water-adventures.jpg\" />','no');
INSERT INTO `wp_options` VALUES (802,'_options_things_to_do_content','field_650c995177c1f','no');
INSERT INTO `wp_options` VALUES (803,'options_mercantile_content','','no');
INSERT INTO `wp_options` VALUES (804,'_options_mercantile_content','field_650c995077c1e','no');
INSERT INTO `wp_options` VALUES (1009,'_site_transient_timeout_php_check_9522db31646a2e4672d744b6f556967b','1696535858','no');
INSERT INTO `wp_options` VALUES (1010,'_site_transient_php_check_9522db31646a2e4672d744b6f556967b','a:5:{s:19:\"recommended_version\";s:3:\"7.4\";s:15:\"minimum_version\";s:3:\"7.0\";s:12:\"is_supported\";b:1;s:9:\"is_secure\";b:1;s:13:\"is_acceptable\";b:1;}','no');
INSERT INTO `wp_options` VALUES (1091,'_transient_timeout_acf_plugin_updates','1696449420','no');
INSERT INTO `wp_options` VALUES (1092,'_transient_acf_plugin_updates','a:5:{s:7:\"plugins\";a:1:{s:34:\"advanced-custom-fields-pro/acf.php\";a:12:{s:4:\"slug\";s:26:\"advanced-custom-fields-pro\";s:6:\"plugin\";s:34:\"advanced-custom-fields-pro/acf.php\";s:11:\"new_version\";s:7:\"6.2.1.1\";s:3:\"url\";s:36:\"https://www.advancedcustomfields.com\";s:6:\"tested\";s:3:\"6.3\";s:7:\"package\";s:331:\"https://connect.advancedcustomfields.com/v2/plugins/download?token=eyJwIjoicHJvIiwiayI6Ik9HVm1OalE0TmpBMVptTXpNMlptWlRFME56TmpZemxoWVdabE1EWmlaRFE0T1RJNU4yWTRPVFExTm1ZMU5XWTBaRGd6WmpOaiIsIndwX3VybCI6Imh0dHA6XC9cL2Nob2N0YXctbGFuZGluZy1wcm9kLmxvY2FsIiwid3BfdmVyc2lvbiI6IjYuMy4xIiwicGhwX3ZlcnNpb24iOiI4LjEuOSIsImJsb2NrX2NvdW50IjowfQ==\";s:5:\"icons\";a:1:{s:7:\"default\";s:63:\"https://ps.w.org/advanced-custom-fields/assets/icon-256x256.png\";}s:7:\"banners\";a:2:{s:3:\"low\";s:77:\"https://ps.w.org/advanced-custom-fields/assets/banner-772x250.jpg?rev=1729102\";s:4:\"high\";s:78:\"https://ps.w.org/advanced-custom-fields/assets/banner-1544x500.jpg?rev=1729099\";}s:8:\"requires\";s:3:\"5.8\";s:12:\"requires_php\";s:3:\"7.0\";s:12:\"release_date\";s:8:\"20230908\";s:13:\"license_valid\";b:1;}}s:9:\"no_update\";a:0:{}s:10:\"expiration\";i:172800;s:6:\"status\";i:1;s:7:\"checked\";a:1:{s:34:\"advanced-custom-fields-pro/acf.php\";s:5:\"6.2.0\";}}','no');
INSERT INTO `wp_options` VALUES (1117,'_transient_timeout_GFCache_f5695aa9386443e55d829a03a4d7ba6c','1696449497','no');
INSERT INTO `wp_options` VALUES (1118,'_transient_GFCache_f5695aa9386443e55d829a03a4d7ba6c','a:67:{s:12:\"gravityforms\";a:5:{s:12:\"is_available\";b:1;s:7:\"version\";s:6:\"2.7.14\";s:14:\"version_latest\";s:8:\"2.7.14.2\";s:3:\"url\";s:168:\"https://s3.amazonaws.com/gravityforms/releases/gravityforms_2.7.14.zip?AWSAccessKeyId=AKIA5U3GBHC5WDRZA6NK&Expires=1696535897&Signature=fk0jx6LfWgihNR%2Fhrdy1jGsXbcU%3D\";s:10:\"url_latest\";s:168:\"https://s3.amazonaws.com/gravityforms/releases/gravityforms_2.7.14.2.zip?AWSAccessKeyId=AKIA5U3GBHC5WDRZA6NK&Expires=1696535897&Signature=nEdZ9EwaMNxyYsGGqlwrfWx6foQ%3D\";}s:21:\"gravityforms2checkout\";a:5:{s:12:\"is_available\";b:1;s:7:\"version\";s:3:\"2.1\";s:14:\"version_latest\";s:3:\"2.1\";s:3:\"url\";s:180:\"https://s3.amazonaws.com/gravityforms/addons/2checkout/gravityforms2checkout_2.1.zip?AWSAccessKeyId=AKIA5U3GBHC5WDRZA6NK&Expires=1696535897&Signature=DuRUuhh4opc0ILvF5zLFVF40qdE%3D\";s:10:\"url_latest\";s:180:\"https://s3.amazonaws.com/gravityforms/addons/2checkout/gravityforms2checkout_2.1.zip?AWSAccessKeyId=AKIA5U3GBHC5WDRZA6NK&Expires=1696535897&Signature=DuRUuhh4opc0ILvF5zLFVF40qdE%3D\";}s:26:\"gravityformsactivecampaign\";a:5:{s:12:\"is_available\";b:1;s:7:\"version\";s:3:\"2.0\";s:14:\"version_latest\";s:5:\"2.0.1\";s:3:\"url\";s:194:\"https://s3.amazonaws.com/gravityforms/addons/activecampaign/gravityformsactivecampaign_2.0.zip?AWSAccessKeyId=AKIA5U3GBHC5WDRZA6NK&Expires=1696535897&Signature=C%2Ba8Gn%2Fv6e9W3BLHQDS6Ln4c0Wk%3D\";s:10:\"url_latest\";s:194:\"https://s3.amazonaws.com/gravityforms/addons/activecampaign/gravityformsactivecampaign_2.0.1.zip?AWSAccessKeyId=AKIA5U3GBHC5WDRZA6NK&Expires=1696535897&Signature=QtBDWisEMUYxtPo2%2Fx9Wqow3rEQ%3D\";}s:32:\"gravityformsadvancedpostcreation\";a:5:{s:12:\"is_available\";b:1;s:7:\"version\";s:5:\"1.4.0\";s:14:\"version_latest\";s:5:\"1.4.0\";s:3:\"url\";s:206:\"https://s3.amazonaws.com/gravityforms/addons/advancedpostcreation/gravityformsadvancedpostcreation_1.4.0.zip?AWSAccessKeyId=AKIA5U3GBHC5WDRZA6NK&Expires=1696535897&Signature=Vlkmi0uyCgsEkevYx8gp%2BZieJXg%3D\";s:10:\"url_latest\";s:206:\"https://s3.amazonaws.com/gravityforms/addons/advancedpostcreation/gravityformsadvancedpostcreation_1.4.0.zip?AWSAccessKeyId=AKIA5U3GBHC5WDRZA6NK&Expires=1696535897&Signature=Vlkmi0uyCgsEkevYx8gp%2BZieJXg%3D\";}s:20:\"gravityformsagilecrm\";a:5:{s:12:\"is_available\";b:1;s:7:\"version\";s:3:\"1.4\";s:14:\"version_latest\";s:5:\"1.4.1\";s:3:\"url\";s:178:\"https://s3.amazonaws.com/gravityforms/addons/agilecrm/gravityformsagilecrm_1.4.zip?AWSAccessKeyId=AKIA5U3GBHC5WDRZA6NK&Expires=1696535897&Signature=AQeIuif0jkoqJ6IgYJ3D2KIhbrI%3D\";s:10:\"url_latest\";s:182:\"https://s3.amazonaws.com/gravityforms/addons/agilecrm/gravityformsagilecrm_1.4.1.zip?AWSAccessKeyId=AKIA5U3GBHC5WDRZA6NK&Expires=1696535897&Signature=dc52sZQlYU%2FCaaH66kvH0nvCVAU%3D\";}s:19:\"gravityformsakismet\";a:5:{s:12:\"is_available\";b:1;s:7:\"version\";s:3:\"1.0\";s:14:\"version_latest\";s:3:\"1.0\";s:3:\"url\";s:176:\"https://s3.amazonaws.com/gravityforms/addons/akismet/gravityformsakismet_1.0.zip?AWSAccessKeyId=AKIA5U3GBHC5WDRZA6NK&Expires=1696535897&Signature=1jAeEoLb9wsExLkXwRW8qwkLCmQ%3D\";s:10:\"url_latest\";s:176:\"https://s3.amazonaws.com/gravityforms/addons/akismet/gravityformsakismet_1.0.zip?AWSAccessKeyId=AKIA5U3GBHC5WDRZA6NK&Expires=1696535897&Signature=1jAeEoLb9wsExLkXwRW8qwkLCmQ%3D\";}s:24:\"gravityformsauthorizenet\";a:5:{s:12:\"is_available\";b:1;s:7:\"version\";s:4:\"2.11\";s:14:\"version_latest\";s:4:\"2.11\";s:3:\"url\";s:187:\"https://s3.amazonaws.com/gravityforms/addons/authorizenet/gravityformsauthorizenet_2.11.zip?AWSAccessKeyId=AKIA5U3GBHC5WDRZA6NK&Expires=1696535897&Signature=XXJXH4FXcsePJtKmfnKHnIlyhik%3D\";s:10:\"url_latest\";s:187:\"https://s3.amazonaws.com/gravityforms/addons/authorizenet/gravityformsauthorizenet_2.11.zip?AWSAccessKeyId=AKIA5U3GBHC5WDRZA6NK&Expires=1696535897&Signature=XXJXH4FXcsePJtKmfnKHnIlyhik%3D\";}s:18:\"gravityformsaweber\";a:5:{s:12:\"is_available\";b:1;s:7:\"version\";s:5:\"4.0.0\";s:14:\"version_latest\";s:5:\"4.0.0\";s:3:\"url\";s:178:\"https://s3.amazonaws.com/gravityforms/addons/aweber/gravityformsaweber_4.0.0.zip?AWSAccessKeyId=AKIA5U3GBHC5WDRZA6NK&Expires=1696535897&Signature=bUbuZsJRS6%2FFp2NYGYMRvQqwXP0%3D\";s:10:\"url_latest\";s:178:\"https://s3.amazonaws.com/gravityforms/addons/aweber/gravityformsaweber_4.0.0.zip?AWSAccessKeyId=AKIA5U3GBHC5WDRZA6NK&Expires=1696535897&Signature=bUbuZsJRS6%2FFp2NYGYMRvQqwXP0%3D\";}s:21:\"gravityformsbatchbook\";a:5:{s:12:\"is_available\";b:1;s:7:\"version\";s:3:\"1.3\";s:14:\"version_latest\";s:3:\"1.3\";s:3:\"url\";s:180:\"https://s3.amazonaws.com/gravityforms/addons/batchbook/gravityformsbatchbook_1.3.zip?AWSAccessKeyId=AKIA5U3GBHC5WDRZA6NK&Expires=1696535897&Signature=Ip1PLmTG2OrMcHRpXfCEWLN7pgg%3D\";s:10:\"url_latest\";s:180:\"https://s3.amazonaws.com/gravityforms/addons/batchbook/gravityformsbatchbook_1.3.zip?AWSAccessKeyId=AKIA5U3GBHC5WDRZA6NK&Expires=1696535897&Signature=Ip1PLmTG2OrMcHRpXfCEWLN7pgg%3D\";}s:18:\"gravityformsbreeze\";a:5:{s:12:\"is_available\";b:1;s:7:\"version\";s:3:\"1.5\";s:14:\"version_latest\";s:5:\"1.5.1\";s:3:\"url\";s:180:\"https://s3.amazonaws.com/gravityforms/addons/breeze/gravityformsbreeze_1.5.zip?AWSAccessKeyId=AKIA5U3GBHC5WDRZA6NK&Expires=1696535897&Signature=FMAR3u9%2Fa9wg%2BFvylhAkk%2F0361Y%3D\";s:10:\"url_latest\";s:176:\"https://s3.amazonaws.com/gravityforms/addons/breeze/gravityformsbreeze_1.5.1.zip?AWSAccessKeyId=AKIA5U3GBHC5WDRZA6NK&Expires=1696535897&Signature=OdAFHaSxqUqCcB1WDA1SShJJYgM%3D\";}s:27:\"gravityformscampaignmonitor\";a:5:{s:12:\"is_available\";b:1;s:7:\"version\";s:3:\"3.9\";s:14:\"version_latest\";s:5:\"3.9.1\";s:3:\"url\";s:192:\"https://s3.amazonaws.com/gravityforms/addons/campaignmonitor/gravityformscampaignmonitor_3.9.zip?AWSAccessKeyId=AKIA5U3GBHC5WDRZA6NK&Expires=1696535897&Signature=kO8GTgV9fb48wbvIFqE0q9rvGAM%3D\";s:10:\"url_latest\";s:196:\"https://s3.amazonaws.com/gravityforms/addons/campaignmonitor/gravityformscampaignmonitor_3.9.1.zip?AWSAccessKeyId=AKIA5U3GBHC5WDRZA6NK&Expires=1696535897&Signature=%2BWTrU2WcBA87yFjMJzZRQlkCLHA%3D\";}s:20:\"gravityformscampfire\";a:5:{s:12:\"is_available\";b:1;s:7:\"version\";s:3:\"1.1\";s:14:\"version_latest\";s:5:\"1.2.2\";s:3:\"url\";s:184:\"https://s3.amazonaws.com/gravityforms/addons/campfire/gravityformscampfire_1.1.zip?AWSAccessKeyId=AKIA5U3GBHC5WDRZA6NK&Expires=1696535897&Signature=Nj%2FkHSi%2B2L%2BmZbgwQI0URA4s1Nk%3D\";s:10:\"url_latest\";s:184:\"https://s3.amazonaws.com/gravityforms/addons/campfire/gravityformscampfire_1.2.2.zip?AWSAccessKeyId=AKIA5U3GBHC5WDRZA6NK&Expires=1696535897&Signature=f23Ar8EIQ5TH4biQ1%2BC2v%2BKqXE8%3D\";}s:22:\"gravityformscapsulecrm\";a:5:{s:12:\"is_available\";b:1;s:7:\"version\";s:3:\"1.6\";s:14:\"version_latest\";s:5:\"1.6.1\";s:3:\"url\";s:182:\"https://s3.amazonaws.com/gravityforms/addons/capsulecrm/gravityformscapsulecrm_1.6.zip?AWSAccessKeyId=AKIA5U3GBHC5WDRZA6NK&Expires=1696535897&Signature=IJciGTog7qfd8l27pWaHXb2Shyc%3D\";s:10:\"url_latest\";s:184:\"https://s3.amazonaws.com/gravityforms/addons/capsulecrm/gravityformscapsulecrm_1.6.1.zip?AWSAccessKeyId=AKIA5U3GBHC5WDRZA6NK&Expires=1696535897&Signature=1KxnpOkEiEaIBBnscdSvJGOhBSc%3D\";}s:26:\"gravityformschainedselects\";a:5:{s:12:\"is_available\";b:1;s:7:\"version\";s:3:\"1.6\";s:14:\"version_latest\";s:3:\"1.6\";s:3:\"url\";s:190:\"https://s3.amazonaws.com/gravityforms/addons/chainedselects/gravityformschainedselects_1.6.zip?AWSAccessKeyId=AKIA5U3GBHC5WDRZA6NK&Expires=1696535897&Signature=rVsCdZrRrKxkchowqXW3ifbTraI%3D\";s:10:\"url_latest\";s:190:\"https://s3.amazonaws.com/gravityforms/addons/chainedselects/gravityformschainedselects_1.6.zip?AWSAccessKeyId=AKIA5U3GBHC5WDRZA6NK&Expires=1696535897&Signature=rVsCdZrRrKxkchowqXW3ifbTraI%3D\";}s:23:\"gravityformscleverreach\";a:5:{s:12:\"is_available\";b:1;s:7:\"version\";s:3:\"1.8\";s:14:\"version_latest\";s:3:\"1.8\";s:3:\"url\";s:184:\"https://s3.amazonaws.com/gravityforms/addons/cleverreach/gravityformscleverreach_1.8.zip?AWSAccessKeyId=AKIA5U3GBHC5WDRZA6NK&Expires=1696535897&Signature=NFbu9Ymca4DKDkhv3p76rt3kZNg%3D\";s:10:\"url_latest\";s:184:\"https://s3.amazonaws.com/gravityforms/addons/cleverreach/gravityformscleverreach_1.8.zip?AWSAccessKeyId=AKIA5U3GBHC5WDRZA6NK&Expires=1696535897&Signature=NFbu9Ymca4DKDkhv3p76rt3kZNg%3D\";}s:15:\"gravityformscli\";a:5:{s:12:\"is_available\";b:1;s:7:\"version\";s:0:\"\";s:14:\"version_latest\";s:3:\"1.4\";s:3:\"url\";s:0:\"\";s:10:\"url_latest\";s:168:\"https://s3.amazonaws.com/gravityforms/addons/cli/gravityformscli_1.4.zip?AWSAccessKeyId=AKIA5U3GBHC5WDRZA6NK&Expires=1696535897&Signature=EPZcVE0PPC4oaEFJD7w3vOTkeWA%3D\";}s:27:\"gravityformsconstantcontact\";a:5:{s:12:\"is_available\";b:1;s:7:\"version\";s:3:\"1.7\";s:14:\"version_latest\";s:3:\"1.7\";s:3:\"url\";s:194:\"https://s3.amazonaws.com/gravityforms/addons/constantcontact/gravityformsconstantcontact_1.7.zip?AWSAccessKeyId=AKIA5U3GBHC5WDRZA6NK&Expires=1696535897&Signature=nlxPb3PMGPIB9sRZLI9dutm6%2Bpc%3D\";s:10:\"url_latest\";s:194:\"https://s3.amazonaws.com/gravityforms/addons/constantcontact/gravityformsconstantcontact_1.7.zip?AWSAccessKeyId=AKIA5U3GBHC5WDRZA6NK&Expires=1696535897&Signature=nlxPb3PMGPIB9sRZLI9dutm6%2Bpc%3D\";}s:31:\"gravityformsconversationalforms\";a:5:{s:12:\"is_available\";b:1;s:7:\"version\";s:5:\"1.0.0\";s:14:\"version_latest\";s:5:\"1.0.1\";s:3:\"url\";s:204:\"https://s3.amazonaws.com/gravityforms/addons/conversationalforms/gravityformsconversationalforms_1.0.0.zip?AWSAccessKeyId=AKIA5U3GBHC5WDRZA6NK&Expires=1696535897&Signature=Qme%2F48tey9wUtUvR3qpaPdGGrxo%3D\";s:10:\"url_latest\";s:202:\"https://s3.amazonaws.com/gravityforms/addons/conversationalforms/gravityformsconversationalforms_1.0.1.zip?AWSAccessKeyId=AKIA5U3GBHC5WDRZA6NK&Expires=1696535897&Signature=Xn4uWoshNO2cZYxlk3KkL9oXwXo%3D\";}s:22:\"gravityformsconvertkit\";a:5:{s:12:\"is_available\";b:1;s:7:\"version\";s:0:\"\";s:14:\"version_latest\";s:10:\"1.0-beta-1\";s:3:\"url\";s:190:\"https://s3.amazonaws.com/gravityforms/addons/coupons/gravityformsconvertkit_1.0-beta-1.zip?AWSAccessKeyId=AKIA5U3GBHC5WDRZA6NK&Expires=1696535897&Signature=DK32eJ6GeyMjjLtC%2BKH%2Fcw15vVo%3D\";s:10:\"url_latest\";s:193:\"https://s3.amazonaws.com/gravityforms/addons/convertkit/gravityformsconvertkit_1.0-beta-1.zip?AWSAccessKeyId=AKIA5U3GBHC5WDRZA6NK&Expires=1696535897&Signature=NJ5j6MWZYno%2B1tkooa%2BgbWbmjnE%3D\";}s:19:\"gravityformscoupons\";a:5:{s:12:\"is_available\";b:1;s:7:\"version\";s:3:\"3.1\";s:14:\"version_latest\";s:3:\"3.1\";s:3:\"url\";s:178:\"https://s3.amazonaws.com/gravityforms/addons/coupons/gravityformscoupons_3.1.zip?AWSAccessKeyId=AKIA5U3GBHC5WDRZA6NK&Expires=1696535897&Signature=ehKXUCGYoaUT4%2B8ZDNKPmVg6jBU%3D\";s:10:\"url_latest\";s:178:\"https://s3.amazonaws.com/gravityforms/addons/coupons/gravityformscoupons_3.1.zip?AWSAccessKeyId=AKIA5U3GBHC5WDRZA6NK&Expires=1696535897&Signature=ehKXUCGYoaUT4%2B8ZDNKPmVg6jBU%3D\";}s:17:\"gravityformsdebug\";a:5:{s:12:\"is_available\";b:1;s:7:\"version\";s:0:\"\";s:14:\"version_latest\";s:10:\"1.0.beta12\";s:3:\"url\";s:0:\"\";s:10:\"url_latest\";s:183:\"https://s3.amazonaws.com/gravityforms/addons/debug/gravityformsdebug_1.0.beta12.zip?AWSAccessKeyId=AKIA5U3GBHC5WDRZA6NK&Expires=1696535897&Signature=bdHn35PY8eUTi4nw%2Fw%2BOjBGALEo%3D\";}s:19:\"gravityformsdropbox\";a:5:{s:12:\"is_available\";b:1;s:7:\"version\";s:3:\"3.1\";s:14:\"version_latest\";s:3:\"3.1\";s:3:\"url\";s:178:\"https://s3.amazonaws.com/gravityforms/addons/dropbox/gravityformsdropbox_3.1.zip?AWSAccessKeyId=AKIA5U3GBHC5WDRZA6NK&Expires=1696535897&Signature=zEj3Z92pvafXB7oLJ%2BBZrTkGdgQ%3D\";s:10:\"url_latest\";s:178:\"https://s3.amazonaws.com/gravityforms/addons/dropbox/gravityformsdropbox_3.1.zip?AWSAccessKeyId=AKIA5U3GBHC5WDRZA6NK&Expires=1696535897&Signature=zEj3Z92pvafXB7oLJ%2BBZrTkGdgQ%3D\";}s:24:\"gravityformsemailoctopus\";a:5:{s:12:\"is_available\";b:1;s:7:\"version\";s:3:\"1.2\";s:14:\"version_latest\";s:5:\"1.2.2\";s:3:\"url\";s:190:\"https://s3.amazonaws.com/gravityforms/addons/emailoctopus/gravityformsemailoctopus_1.2.zip?AWSAccessKeyId=AKIA5U3GBHC5WDRZA6NK&Expires=1696535897&Signature=A%2BQD49o%2BfOUjrL0VL5Dgq5NLv6Q%3D\";s:10:\"url_latest\";s:188:\"https://s3.amazonaws.com/gravityforms/addons/emailoctopus/gravityformsemailoctopus_1.2.2.zip?AWSAccessKeyId=AKIA5U3GBHC5WDRZA6NK&Expires=1696535897&Signature=BsBlSY37joCKuy2fuv8IvRUFHqc%3D\";}s:16:\"gravityformsemma\";a:5:{s:12:\"is_available\";b:1;s:7:\"version\";s:3:\"1.5\";s:14:\"version_latest\";s:5:\"1.5.2\";s:3:\"url\";s:172:\"https://s3.amazonaws.com/gravityforms/addons/emma/gravityformsemma_1.5.zip?AWSAccessKeyId=AKIA5U3GBHC5WDRZA6NK&Expires=1696535897&Signature=md4WuAY8TIQxFLYnZgN%2B4HxpmI8%3D\";s:10:\"url_latest\";s:172:\"https://s3.amazonaws.com/gravityforms/addons/emma/gravityformsemma_1.5.2.zip?AWSAccessKeyId=AKIA5U3GBHC5WDRZA6NK&Expires=1696535897&Signature=lCVxqGMbV4UB3otkXSUZYzNSjhU%3D\";}s:22:\"gravityformsfreshbooks\";a:5:{s:12:\"is_available\";b:1;s:7:\"version\";s:3:\"2.8\";s:14:\"version_latest\";s:3:\"2.8\";s:3:\"url\";s:182:\"https://s3.amazonaws.com/gravityforms/addons/freshbooks/gravityformsfreshbooks_2.8.zip?AWSAccessKeyId=AKIA5U3GBHC5WDRZA6NK&Expires=1696535897&Signature=5oJjr0v8PE4U6cunYR3cpBeExcc%3D\";s:10:\"url_latest\";s:182:\"https://s3.amazonaws.com/gravityforms/addons/freshbooks/gravityformsfreshbooks_2.8.zip?AWSAccessKeyId=AKIA5U3GBHC5WDRZA6NK&Expires=1696535897&Signature=5oJjr0v8PE4U6cunYR3cpBeExcc%3D\";}s:23:\"gravityformsgeolocation\";a:5:{s:12:\"is_available\";b:1;s:7:\"version\";s:5:\"1.1.0\";s:14:\"version_latest\";s:5:\"1.1.0\";s:3:\"url\";s:186:\"https://s3.amazonaws.com/gravityforms/addons/geolocation/gravityformsgeolocation_1.1.0.zip?AWSAccessKeyId=AKIA5U3GBHC5WDRZA6NK&Expires=1696535897&Signature=gP48F18Mmr68QGENDYpPnWVufsg%3D\";s:10:\"url_latest\";s:186:\"https://s3.amazonaws.com/gravityforms/addons/geolocation/gravityformsgeolocation_1.1.0.zip?AWSAccessKeyId=AKIA5U3GBHC5WDRZA6NK&Expires=1696535897&Signature=gP48F18Mmr68QGENDYpPnWVufsg%3D\";}s:23:\"gravityformsgetresponse\";a:5:{s:12:\"is_available\";b:1;s:7:\"version\";s:3:\"1.7\";s:14:\"version_latest\";s:5:\"1.7.1\";s:3:\"url\";s:184:\"https://s3.amazonaws.com/gravityforms/addons/getresponse/gravityformsgetresponse_1.7.zip?AWSAccessKeyId=AKIA5U3GBHC5WDRZA6NK&Expires=1696535897&Signature=dEcs0C2jTiGL8YoGKLZH5EcOMB4%3D\";s:10:\"url_latest\";s:190:\"https://s3.amazonaws.com/gravityforms/addons/getresponse/gravityformsgetresponse_1.7.1.zip?AWSAccessKeyId=AKIA5U3GBHC5WDRZA6NK&Expires=1696535897&Signature=iv%2FhJhTQAPkd%2B7xBp3Yn0K9dyCA%3D\";}s:27:\"gravityformsgoogleanalytics\";a:5:{s:12:\"is_available\";b:1;s:7:\"version\";s:5:\"2.1.0\";s:14:\"version_latest\";s:5:\"2.1.1\";s:3:\"url\";s:196:\"https://s3.amazonaws.com/gravityforms/addons/googleanalytics/gravityformsgoogleanalytics_2.1.0.zip?AWSAccessKeyId=AKIA5U3GBHC5WDRZA6NK&Expires=1696535897&Signature=K5MpiZ94kdwuS%2FOn0RZInVCV1uQ%3D\";s:10:\"url_latest\";s:198:\"https://s3.amazonaws.com/gravityforms/addons/googleanalytics/gravityformsgoogleanalytics_2.1.1.zip?AWSAccessKeyId=AKIA5U3GBHC5WDRZA6NK&Expires=1696535897&Signature=N%2F0Wfme%2B75qosTaEkPqmSU4zq10%3D\";}s:21:\"gravityformsgutenberg\";a:5:{s:12:\"is_available\";b:1;s:7:\"version\";s:10:\"1.0-rc-1.4\";s:14:\"version_latest\";s:10:\"1.0-rc-1.5\";s:3:\"url\";s:189:\"https://s3.amazonaws.com/gravityforms/addons/gutenberg/gravityformsgutenberg_1.0-rc-1.4.zip?AWSAccessKeyId=AKIA5U3GBHC5WDRZA6NK&Expires=1696535897&Signature=CnZFyPvi6CRfyfwLdnpFr%2B0Sajo%3D\";s:10:\"url_latest\";s:193:\"https://s3.amazonaws.com/gravityforms/addons/gutenberg/gravityformsgutenberg_1.0-rc-1.5.zip?AWSAccessKeyId=AKIA5U3GBHC5WDRZA6NK&Expires=1696535897&Signature=EIlBgavsU%2FzSBrmuE9Ix%2F6R%2BIWw%3D\";}s:21:\"gravityformshelpscout\";a:5:{s:12:\"is_available\";b:1;s:7:\"version\";s:3:\"2.1\";s:14:\"version_latest\";s:5:\"2.1.1\";s:3:\"url\";s:182:\"https://s3.amazonaws.com/gravityforms/addons/helpscout/gravityformshelpscout_2.1.zip?AWSAccessKeyId=AKIA5U3GBHC5WDRZA6NK&Expires=1696535897&Signature=za8K7Lh%2F8XubtMaGVxXIwkxWmGw%3D\";s:10:\"url_latest\";s:182:\"https://s3.amazonaws.com/gravityforms/addons/helpscout/gravityformshelpscout_2.1.1.zip?AWSAccessKeyId=AKIA5U3GBHC5WDRZA6NK&Expires=1696535897&Signature=FxzJU1ngFZdocg96TpKAAdh8wxg%3D\";}s:20:\"gravityformshighrise\";a:5:{s:12:\"is_available\";b:1;s:7:\"version\";s:3:\"1.3\";s:14:\"version_latest\";s:3:\"1.3\";s:3:\"url\";s:180:\"https://s3.amazonaws.com/gravityforms/addons/highrise/gravityformshighrise_1.3.zip?AWSAccessKeyId=AKIA5U3GBHC5WDRZA6NK&Expires=1696535897&Signature=aKyClFFi5PgRCNROv%2BEkO0UE320%3D\";s:10:\"url_latest\";s:180:\"https://s3.amazonaws.com/gravityforms/addons/highrise/gravityformshighrise_1.3.zip?AWSAccessKeyId=AKIA5U3GBHC5WDRZA6NK&Expires=1696535897&Signature=aKyClFFi5PgRCNROv%2BEkO0UE320%3D\";}s:19:\"gravityformshipchat\";a:3:{s:12:\"is_available\";b:0;s:7:\"version\";s:3:\"1.2\";s:14:\"version_latest\";s:3:\"1.2\";}s:19:\"gravityformshubspot\";a:5:{s:12:\"is_available\";b:1;s:7:\"version\";s:3:\"1.9\";s:14:\"version_latest\";s:3:\"1.9\";s:3:\"url\";s:180:\"https://s3.amazonaws.com/gravityforms/addons/hubspot/gravityformshubspot_1.9.zip?AWSAccessKeyId=AKIA5U3GBHC5WDRZA6NK&Expires=1696535897&Signature=%2BX4HaB8xn4mJ2QpDvp5%2FJBnT2s4%3D\";s:10:\"url_latest\";s:180:\"https://s3.amazonaws.com/gravityforms/addons/hubspot/gravityformshubspot_1.9.zip?AWSAccessKeyId=AKIA5U3GBHC5WDRZA6NK&Expires=1696535897&Signature=%2BX4HaB8xn4mJ2QpDvp5%2FJBnT2s4%3D\";}s:20:\"gravityformsicontact\";a:5:{s:12:\"is_available\";b:1;s:7:\"version\";s:3:\"1.5\";s:14:\"version_latest\";s:5:\"1.5.1\";s:3:\"url\";s:182:\"https://s3.amazonaws.com/gravityforms/addons/icontact/gravityformsicontact_1.5.zip?AWSAccessKeyId=AKIA5U3GBHC5WDRZA6NK&Expires=1696535897&Signature=sw9dfDk3pm5%2BTEvno1CvN%2Fc9mhQ%3D\";s:10:\"url_latest\";s:180:\"https://s3.amazonaws.com/gravityforms/addons/icontact/gravityformsicontact_1.5.1.zip?AWSAccessKeyId=AKIA5U3GBHC5WDRZA6NK&Expires=1696535897&Signature=VeUhrRl0jUrYmwWMbJfNimVIiFc%3D\";}s:19:\"gravityformslogging\";a:5:{s:12:\"is_available\";b:1;s:7:\"version\";s:3:\"1.3\";s:14:\"version_latest\";s:5:\"1.3.1\";s:3:\"url\";s:180:\"https://s3.amazonaws.com/gravityforms/addons/logging/gravityformslogging_1.3.zip?AWSAccessKeyId=AKIA5U3GBHC5WDRZA6NK&Expires=1696535897&Signature=%2F4QCBucNq%2F9QHmYAnYht5ojDJeQ%3D\";s:10:\"url_latest\";s:178:\"https://s3.amazonaws.com/gravityforms/addons/logging/gravityformslogging_1.3.1.zip?AWSAccessKeyId=AKIA5U3GBHC5WDRZA6NK&Expires=1696535897&Signature=BzbKhrOFjLawRa7uI1OKgwN7A6k%3D\";}s:19:\"gravityformsmadmimi\";a:5:{s:12:\"is_available\";b:1;s:7:\"version\";s:3:\"1.4\";s:14:\"version_latest\";s:5:\"1.4.1\";s:3:\"url\";s:178:\"https://s3.amazonaws.com/gravityforms/addons/madmimi/gravityformsmadmimi_1.4.zip?AWSAccessKeyId=AKIA5U3GBHC5WDRZA6NK&Expires=1696535897&Signature=8%2F123C5UvMbL9cy8dFC2IF4uyBY%3D\";s:10:\"url_latest\";s:178:\"https://s3.amazonaws.com/gravityforms/addons/madmimi/gravityformsmadmimi_1.4.1.zip?AWSAccessKeyId=AKIA5U3GBHC5WDRZA6NK&Expires=1696535897&Signature=JhpTjb2uDk03vCxrANfoS1TZhe8%3D\";}s:21:\"gravityformsmailchimp\";a:5:{s:12:\"is_available\";b:1;s:7:\"version\";s:3:\"5.2\";s:14:\"version_latest\";s:5:\"5.2.1\";s:3:\"url\";s:182:\"https://s3.amazonaws.com/gravityforms/addons/mailchimp/gravityformsmailchimp_5.2.0.zip?AWSAccessKeyId=AKIA5U3GBHC5WDRZA6NK&Expires=1696535897&Signature=Vg0LPubB7I33hwlOJEUn8LZhVes%3D\";s:10:\"url_latest\";s:184:\"https://s3.amazonaws.com/gravityforms/addons/mailchimp/gravityformsmailchimp_5.2.1.zip?AWSAccessKeyId=AKIA5U3GBHC5WDRZA6NK&Expires=1696535897&Signature=boCxyybQ1%2BuMADnMLrYItv50NEA%3D\";}s:19:\"gravityformsmailgun\";a:5:{s:12:\"is_available\";b:1;s:7:\"version\";s:3:\"1.3\";s:14:\"version_latest\";s:5:\"1.3.1\";s:3:\"url\";s:178:\"https://s3.amazonaws.com/gravityforms/addons/mailgun/gravityformsmailgun_1.3.zip?AWSAccessKeyId=AKIA5U3GBHC5WDRZA6NK&Expires=1696535897&Signature=0qwo7ULhRaWxQAxEzaXb1HOe%2B7k%3D\";s:10:\"url_latest\";s:180:\"https://s3.amazonaws.com/gravityforms/addons/mailgun/gravityformsmailgun_1.3.1.zip?AWSAccessKeyId=AKIA5U3GBHC5WDRZA6NK&Expires=1696535897&Signature=QC0d87wpMV04M9qCbcN7X1M%2FOOg%3D\";}s:22:\"gravityformsmoderation\";a:5:{s:12:\"is_available\";b:1;s:7:\"version\";s:3:\"1.0\";s:14:\"version_latest\";s:3:\"1.0\";s:3:\"url\";s:182:\"https://s3.amazonaws.com/gravityforms/addons/moderation/gravityformsmoderation_1.0.zip?AWSAccessKeyId=AKIA5U3GBHC5WDRZA6NK&Expires=1696535897&Signature=rPAAvEHqWMkPvNedbEqxjvonjtE%3D\";s:10:\"url_latest\";s:182:\"https://s3.amazonaws.com/gravityforms/addons/moderation/gravityformsmoderation_1.0.zip?AWSAccessKeyId=AKIA5U3GBHC5WDRZA6NK&Expires=1696535897&Signature=rPAAvEHqWMkPvNedbEqxjvonjtE%3D\";}s:18:\"gravityformsmollie\";a:5:{s:12:\"is_available\";b:1;s:7:\"version\";s:3:\"1.3\";s:14:\"version_latest\";s:5:\"1.3.1\";s:3:\"url\";s:176:\"https://s3.amazonaws.com/gravityforms/addons/mollie/gravityformsmollie_1.3.zip?AWSAccessKeyId=AKIA5U3GBHC5WDRZA6NK&Expires=1696535897&Signature=4e%2FZOOSC8qNsEDJQ0wHPybiZNBU%3D\";s:10:\"url_latest\";s:176:\"https://s3.amazonaws.com/gravityforms/addons/mollie/gravityformsmollie_1.3.1.zip?AWSAccessKeyId=AKIA5U3GBHC5WDRZA6NK&Expires=1696535897&Signature=RA1RqTpemlddQbn7LB3uLU6AqZQ%3D\";}s:26:\"gravityformspartialentries\";a:5:{s:12:\"is_available\";b:1;s:7:\"version\";s:3:\"1.7\";s:14:\"version_latest\";s:3:\"1.7\";s:3:\"url\";s:194:\"https://s3.amazonaws.com/gravityforms/addons/partialentries/gravityformspartialentries_1.7.zip?AWSAccessKeyId=AKIA5U3GBHC5WDRZA6NK&Expires=1696535897&Signature=b6Z36ICqu%2BYIB6C%2B3NOOTrl76Io%3D\";s:10:\"url_latest\";s:194:\"https://s3.amazonaws.com/gravityforms/addons/partialentries/gravityformspartialentries_1.7.zip?AWSAccessKeyId=AKIA5U3GBHC5WDRZA6NK&Expires=1696535897&Signature=b6Z36ICqu%2BYIB6C%2B3NOOTrl76Io%3D\";}s:18:\"gravityformspaypal\";a:5:{s:12:\"is_available\";b:1;s:7:\"version\";s:3:\"3.5\";s:14:\"version_latest\";s:3:\"3.5\";s:3:\"url\";s:174:\"https://s3.amazonaws.com/gravityforms/addons/paypal/gravityformspaypal_3.5.zip?AWSAccessKeyId=AKIA5U3GBHC5WDRZA6NK&Expires=1696535897&Signature=n0xL4P1PIW6MFONjEBhzX8axUqo%3D\";s:10:\"url_latest\";s:174:\"https://s3.amazonaws.com/gravityforms/addons/paypal/gravityformspaypal_3.5.zip?AWSAccessKeyId=AKIA5U3GBHC5WDRZA6NK&Expires=1696535897&Signature=n0xL4P1PIW6MFONjEBhzX8axUqo%3D\";}s:33:\"gravityformspaypalexpresscheckout\";a:3:{s:12:\"is_available\";b:0;s:7:\"version\";s:0:\"\";s:14:\"version_latest\";N;}s:29:\"gravityformspaypalpaymentspro\";a:5:{s:12:\"is_available\";b:1;s:7:\"version\";s:3:\"2.7\";s:14:\"version_latest\";s:3:\"2.7\";s:3:\"url\";s:196:\"https://s3.amazonaws.com/gravityforms/addons/paypalpaymentspro/gravityformspaypalpaymentspro_2.7.zip?AWSAccessKeyId=AKIA5U3GBHC5WDRZA6NK&Expires=1696535897&Signature=2Rg2kClEHBnDxvKvH4qaVAYcSws%3D\";s:10:\"url_latest\";s:196:\"https://s3.amazonaws.com/gravityforms/addons/paypalpaymentspro/gravityformspaypalpaymentspro_2.7.zip?AWSAccessKeyId=AKIA5U3GBHC5WDRZA6NK&Expires=1696535897&Signature=2Rg2kClEHBnDxvKvH4qaVAYcSws%3D\";}s:21:\"gravityformspaypalpro\";a:5:{s:12:\"is_available\";b:1;s:7:\"version\";s:5:\"1.8.1\";s:14:\"version_latest\";s:5:\"1.8.4\";s:3:\"url\";s:184:\"https://s3.amazonaws.com/gravityforms/addons/paypalpro/gravityformspaypalpro_1.8.1.zip?AWSAccessKeyId=AKIA5U3GBHC5WDRZA6NK&Expires=1696535897&Signature=TYMKwljzjGsvGIT%2B7KyzdCb1Ag4%3D\";s:10:\"url_latest\";s:184:\"https://s3.amazonaws.com/gravityforms/addons/paypalpro/gravityformspaypalpro_1.8.4.zip?AWSAccessKeyId=AKIA5U3GBHC5WDRZA6NK&Expires=1696535897&Signature=MBJPCcF%2FAlp8RANZAFvxoVNv52w%3D\";}s:20:\"gravityformspicatcha\";a:3:{s:12:\"is_available\";b:0;s:7:\"version\";s:3:\"2.0\";s:14:\"version_latest\";s:3:\"2.0\";}s:16:\"gravityformspipe\";a:5:{s:12:\"is_available\";b:1;s:7:\"version\";s:3:\"1.2\";s:14:\"version_latest\";s:5:\"1.3.1\";s:3:\"url\";s:172:\"https://s3.amazonaws.com/gravityforms/addons/pipe/gravityformspipe_1.2.zip?AWSAccessKeyId=AKIA5U3GBHC5WDRZA6NK&Expires=1696535897&Signature=eGfA%2Fmv9CrbtTGOQDuZAFhd3OsQ%3D\";s:10:\"url_latest\";s:172:\"https://s3.amazonaws.com/gravityforms/addons/pipe/gravityformspipe_1.3.1.zip?AWSAccessKeyId=AKIA5U3GBHC5WDRZA6NK&Expires=1696535897&Signature=sD7KKRaNkpUJtlFljxn5YOYPjSU%3D\";}s:17:\"gravityformspolls\";a:5:{s:12:\"is_available\";b:1;s:7:\"version\";s:3:\"4.1\";s:14:\"version_latest\";s:3:\"4.1\";s:3:\"url\";s:174:\"https://s3.amazonaws.com/gravityforms/addons/polls/gravityformspolls_4.1.zip?AWSAccessKeyId=AKIA5U3GBHC5WDRZA6NK&Expires=1696535897&Signature=5%2B1oMpNKj1hR5orwdhVTDLmTx0Q%3D\";s:10:\"url_latest\";s:174:\"https://s3.amazonaws.com/gravityforms/addons/polls/gravityformspolls_4.1.zip?AWSAccessKeyId=AKIA5U3GBHC5WDRZA6NK&Expires=1696535897&Signature=5%2B1oMpNKj1hR5orwdhVTDLmTx0Q%3D\";}s:20:\"gravityformspostmark\";a:5:{s:12:\"is_available\";b:1;s:7:\"version\";s:3:\"1.3\";s:14:\"version_latest\";s:3:\"1.3\";s:3:\"url\";s:178:\"https://s3.amazonaws.com/gravityforms/addons/postmark/gravityformspostmark_1.3.zip?AWSAccessKeyId=AKIA5U3GBHC5WDRZA6NK&Expires=1696535897&Signature=aF1XhqeO3RGFrMCrjbptopgHNCI%3D\";s:10:\"url_latest\";s:178:\"https://s3.amazonaws.com/gravityforms/addons/postmark/gravityformspostmark_1.3.zip?AWSAccessKeyId=AKIA5U3GBHC5WDRZA6NK&Expires=1696535897&Signature=aF1XhqeO3RGFrMCrjbptopgHNCI%3D\";}s:16:\"gravityformsppcp\";a:5:{s:12:\"is_available\";b:1;s:7:\"version\";s:5:\"2.7.0\";s:14:\"version_latest\";s:5:\"2.7.2\";s:3:\"url\";s:174:\"https://s3.amazonaws.com/gravityforms/addons/ppcp/gravityformsppcp_2.7.0.zip?AWSAccessKeyId=AKIA5U3GBHC5WDRZA6NK&Expires=1696535897&Signature=Lr4B9qZeYk%2F8mmvDlHm2ii9T87k%3D\";s:10:\"url_latest\";s:172:\"https://s3.amazonaws.com/gravityforms/addons/ppcp/gravityformsppcp_2.7.2.zip?AWSAccessKeyId=AKIA5U3GBHC5WDRZA6NK&Expires=1696535897&Signature=ruFvInOO0rl8DPq02qJjn5w9e3U%3D\";}s:16:\"gravityformsquiz\";a:5:{s:12:\"is_available\";b:1;s:7:\"version\";s:3:\"4.1\";s:14:\"version_latest\";s:3:\"4.1\";s:3:\"url\";s:170:\"https://s3.amazonaws.com/gravityforms/addons/quiz/gravityformsquiz_4.1.zip?AWSAccessKeyId=AKIA5U3GBHC5WDRZA6NK&Expires=1696535897&Signature=IImdkEcxY4iKjxbzwW5eFMuZi1E%3D\";s:10:\"url_latest\";s:170:\"https://s3.amazonaws.com/gravityforms/addons/quiz/gravityformsquiz_4.1.zip?AWSAccessKeyId=AKIA5U3GBHC5WDRZA6NK&Expires=1696535897&Signature=IImdkEcxY4iKjxbzwW5eFMuZi1E%3D\";}s:21:\"gravityformsrecaptcha\";a:5:{s:12:\"is_available\";b:1;s:7:\"version\";s:5:\"1.2.0\";s:14:\"version_latest\";s:5:\"1.2.2\";s:3:\"url\";s:190:\"https://s3.amazonaws.com/gravityforms/addons/recaptcha/gravityformsrecaptcha_1.2.0.zip?AWSAccessKeyId=AKIA5U3GBHC5WDRZA6NK&Expires=1696535897&Signature=S3DM90fchYh%2FJuE%2FyM4w9t%2Bh%2B40%3D\";s:10:\"url_latest\";s:186:\"https://s3.amazonaws.com/gravityforms/addons/recaptcha/gravityformsrecaptcha_1.2.2.zip?AWSAccessKeyId=AKIA5U3GBHC5WDRZA6NK&Expires=1696535897&Signature=peHmmd%2BMgpz6qzS6cEweLj%2FtFtM%3D\";}s:19:\"gravityformsrestapi\";a:5:{s:12:\"is_available\";b:1;s:7:\"version\";s:10:\"2.0-beta-2\";s:14:\"version_latest\";s:10:\"2.0-beta-2\";s:3:\"url\";s:183:\"https://s3.amazonaws.com/gravityforms/addons/restapi/gravityformsrestapi_2.0-beta-2.zip?AWSAccessKeyId=AKIA5U3GBHC5WDRZA6NK&Expires=1696535897&Signature=Idti4fCFNJO0nCYsBzVuOhl5yKU%3D\";s:10:\"url_latest\";s:183:\"https://s3.amazonaws.com/gravityforms/addons/restapi/gravityformsrestapi_2.0-beta-2.zip?AWSAccessKeyId=AKIA5U3GBHC5WDRZA6NK&Expires=1696535897&Signature=Idti4fCFNJO0nCYsBzVuOhl5yKU%3D\";}s:20:\"gravityformssendgrid\";a:5:{s:12:\"is_available\";b:1;s:7:\"version\";s:3:\"1.5\";s:14:\"version_latest\";s:3:\"1.5\";s:3:\"url\";s:182:\"https://s3.amazonaws.com/gravityforms/addons/sendgrid/gravityformssendgrid_1.5.zip?AWSAccessKeyId=AKIA5U3GBHC5WDRZA6NK&Expires=1696535897&Signature=1pE%2FmRmJeNN88Iz3oW2Ct%2BT3JEU%3D\";s:10:\"url_latest\";s:182:\"https://s3.amazonaws.com/gravityforms/addons/sendgrid/gravityformssendgrid_1.5.zip?AWSAccessKeyId=AKIA5U3GBHC5WDRZA6NK&Expires=1696535897&Signature=1pE%2FmRmJeNN88Iz3oW2Ct%2BT3JEU%3D\";}s:21:\"gravityformssignature\";a:5:{s:12:\"is_available\";b:1;s:7:\"version\";s:3:\"4.5\";s:14:\"version_latest\";s:3:\"4.5\";s:3:\"url\";s:182:\"https://s3.amazonaws.com/gravityforms/addons/signature/gravityformssignature_4.5.zip?AWSAccessKeyId=AKIA5U3GBHC5WDRZA6NK&Expires=1696535897&Signature=U8dmxuiPKT37O%2BvM6nOBpDWQL24%3D\";s:10:\"url_latest\";s:182:\"https://s3.amazonaws.com/gravityforms/addons/signature/gravityformssignature_4.5.zip?AWSAccessKeyId=AKIA5U3GBHC5WDRZA6NK&Expires=1696535897&Signature=U8dmxuiPKT37O%2BvM6nOBpDWQL24%3D\";}s:17:\"gravityformsslack\";a:5:{s:12:\"is_available\";b:1;s:7:\"version\";s:3:\"2.0\";s:14:\"version_latest\";s:5:\"2.0.1\";s:3:\"url\";s:174:\"https://s3.amazonaws.com/gravityforms/addons/slack/gravityformsslack_2.0.zip?AWSAccessKeyId=AKIA5U3GBHC5WDRZA6NK&Expires=1696535897&Signature=0jRcJ0d7hcjQ8ZMxyd072PeaH%2B0%3D\";s:10:\"url_latest\";s:178:\"https://s3.amazonaws.com/gravityforms/addons/slack/gravityformsslack_2.0.1.zip?AWSAccessKeyId=AKIA5U3GBHC5WDRZA6NK&Expires=1696535897&Signature=nMellhtIZ5KuUhQJPYUQ%2Bz%2BZj5U%3D\";}s:18:\"gravityformssquare\";a:5:{s:12:\"is_available\";b:1;s:7:\"version\";s:5:\"2.0.0\";s:14:\"version_latest\";s:5:\"2.0.0\";s:3:\"url\";s:176:\"https://s3.amazonaws.com/gravityforms/addons/square/gravityformssquare_2.0.0.zip?AWSAccessKeyId=AKIA5U3GBHC5WDRZA6NK&Expires=1696535897&Signature=fokyorbBoc7DpF0SXSsvvGwLx8g%3D\";s:10:\"url_latest\";s:176:\"https://s3.amazonaws.com/gravityforms/addons/square/gravityformssquare_2.0.0.zip?AWSAccessKeyId=AKIA5U3GBHC5WDRZA6NK&Expires=1696535897&Signature=fokyorbBoc7DpF0SXSsvvGwLx8g%3D\";}s:18:\"gravityformsstripe\";a:5:{s:12:\"is_available\";b:1;s:7:\"version\";s:5:\"5.2.0\";s:14:\"version_latest\";s:5:\"5.2.0\";s:3:\"url\";s:178:\"https://s3.amazonaws.com/gravityforms/addons/stripe/gravityformsstripe_5.2.0.zip?AWSAccessKeyId=AKIA5U3GBHC5WDRZA6NK&Expires=1696535897&Signature=oA4PC3mVMegslhd2eCW4nUW%2F8dY%3D\";s:10:\"url_latest\";s:178:\"https://s3.amazonaws.com/gravityforms/addons/stripe/gravityformsstripe_5.2.0.zip?AWSAccessKeyId=AKIA5U3GBHC5WDRZA6NK&Expires=1696535897&Signature=oA4PC3mVMegslhd2eCW4nUW%2F8dY%3D\";}s:18:\"gravityformssurvey\";a:5:{s:12:\"is_available\";b:1;s:7:\"version\";s:3:\"3.8\";s:14:\"version_latest\";s:3:\"3.8\";s:3:\"url\";s:176:\"https://s3.amazonaws.com/gravityforms/addons/survey/gravityformssurvey_3.8.zip?AWSAccessKeyId=AKIA5U3GBHC5WDRZA6NK&Expires=1696535897&Signature=%2FVoMDYHwfC9brlTbMAqTdkASO8g%3D\";s:10:\"url_latest\";s:176:\"https://s3.amazonaws.com/gravityforms/addons/survey/gravityformssurvey_3.8.zip?AWSAccessKeyId=AKIA5U3GBHC5WDRZA6NK&Expires=1696535897&Signature=%2FVoMDYHwfC9brlTbMAqTdkASO8g%3D\";}s:18:\"gravityformstrello\";a:5:{s:12:\"is_available\";b:1;s:7:\"version\";s:3:\"2.0\";s:14:\"version_latest\";s:5:\"2.0.1\";s:3:\"url\";s:174:\"https://s3.amazonaws.com/gravityforms/addons/trello/gravityformstrello_2.0.zip?AWSAccessKeyId=AKIA5U3GBHC5WDRZA6NK&Expires=1696535897&Signature=8S4VN5fehIcIRofxFc8F55V1Kv8%3D\";s:10:\"url_latest\";s:176:\"https://s3.amazonaws.com/gravityforms/addons/trello/gravityformstrello_2.0.1.zip?AWSAccessKeyId=AKIA5U3GBHC5WDRZA6NK&Expires=1696535897&Signature=APXqoaZ284i2l8JomwUMiYHzw68%3D\";}s:21:\"gravityformsturnstile\";a:5:{s:12:\"is_available\";b:1;s:7:\"version\";s:5:\"1.0.0\";s:14:\"version_latest\";s:5:\"1.0.0\";s:3:\"url\";s:184:\"https://s3.amazonaws.com/gravityforms/addons/turnstile/gravityformsturnstile_1.0.0.zip?AWSAccessKeyId=AKIA5U3GBHC5WDRZA6NK&Expires=1696535897&Signature=iIw7st%2B5lf125CKWM5yODWwMkns%3D\";s:10:\"url_latest\";s:184:\"https://s3.amazonaws.com/gravityforms/addons/turnstile/gravityformsturnstile_1.0.0.zip?AWSAccessKeyId=AKIA5U3GBHC5WDRZA6NK&Expires=1696535897&Signature=iIw7st%2B5lf125CKWM5yODWwMkns%3D\";}s:18:\"gravityformstwilio\";a:5:{s:12:\"is_available\";b:1;s:7:\"version\";s:3:\"2.9\";s:14:\"version_latest\";s:5:\"2.9.1\";s:3:\"url\";s:174:\"https://s3.amazonaws.com/gravityforms/addons/twilio/gravityformstwilio_2.9.zip?AWSAccessKeyId=AKIA5U3GBHC5WDRZA6NK&Expires=1696535897&Signature=MGGQUaJYqAW7mqsUlRwkFMuV0rU%3D\";s:10:\"url_latest\";s:180:\"https://s3.amazonaws.com/gravityforms/addons/twilio/gravityformstwilio_2.9.1.zip?AWSAccessKeyId=AKIA5U3GBHC5WDRZA6NK&Expires=1696535897&Signature=9v%2BWGEkdn7YGqCo5W%2BtLsExI9Qw%3D\";}s:28:\"gravityformsuserregistration\";a:5:{s:12:\"is_available\";b:1;s:7:\"version\";s:5:\"5.2.0\";s:14:\"version_latest\";s:5:\"5.2.0\";s:3:\"url\";s:196:\"https://s3.amazonaws.com/gravityforms/addons/userregistration/gravityformsuserregistration_5.2.0.zip?AWSAccessKeyId=AKIA5U3GBHC5WDRZA6NK&Expires=1696535897&Signature=HGPDqm9YsaRrjfaNHottT8sb13I%3D\";s:10:\"url_latest\";s:196:\"https://s3.amazonaws.com/gravityforms/addons/userregistration/gravityformsuserregistration_5.2.0.zip?AWSAccessKeyId=AKIA5U3GBHC5WDRZA6NK&Expires=1696535897&Signature=HGPDqm9YsaRrjfaNHottT8sb13I%3D\";}s:20:\"gravityformswebhooks\";a:5:{s:12:\"is_available\";b:1;s:7:\"version\";s:3:\"1.5\";s:14:\"version_latest\";s:3:\"1.5\";s:3:\"url\";s:178:\"https://s3.amazonaws.com/gravityforms/addons/webhooks/gravityformswebhooks_1.5.zip?AWSAccessKeyId=AKIA5U3GBHC5WDRZA6NK&Expires=1696535897&Signature=8gZahMs5RDIUf18i3r6nywJaQG4%3D\";s:10:\"url_latest\";s:178:\"https://s3.amazonaws.com/gravityforms/addons/webhooks/gravityformswebhooks_1.5.zip?AWSAccessKeyId=AKIA5U3GBHC5WDRZA6NK&Expires=1696535897&Signature=8gZahMs5RDIUf18i3r6nywJaQG4%3D\";}s:18:\"gravityformszapier\";a:5:{s:12:\"is_available\";b:1;s:7:\"version\";s:3:\"4.2\";s:14:\"version_latest\";s:5:\"4.2.1\";s:3:\"url\";s:174:\"https://s3.amazonaws.com/gravityforms/addons/zapier/gravityformszapier_4.2.zip?AWSAccessKeyId=AKIA5U3GBHC5WDRZA6NK&Expires=1696535897&Signature=TAY94xcES9XMPOmdiRz0FCoP8D0%3D\";s:10:\"url_latest\";s:176:\"https://s3.amazonaws.com/gravityforms/addons/zapier/gravityformszapier_4.2.1.zip?AWSAccessKeyId=AKIA5U3GBHC5WDRZA6NK&Expires=1696535897&Signature=8iOVBzoBShLBsaWo75Cy9EtZ7sA%3D\";}s:19:\"gravityformszohocrm\";a:5:{s:12:\"is_available\";b:1;s:7:\"version\";s:3:\"2.0\";s:14:\"version_latest\";s:5:\"2.0.1\";s:3:\"url\";s:178:\"https://s3.amazonaws.com/gravityforms/addons/zohocrm/gravityformszohocrm_2.0.zip?AWSAccessKeyId=AKIA5U3GBHC5WDRZA6NK&Expires=1696535897&Signature=SW6Ce%2Ba3IXd1mxfdsYHDhSrJmxE%3D\";s:10:\"url_latest\";s:182:\"https://s3.amazonaws.com/gravityforms/addons/zohocrm/gravityformszohocrm_2.0.1.zip?AWSAccessKeyId=AKIA5U3GBHC5WDRZA6NK&Expires=1696535897&Signature=i332%2Fp%2FeGH45vIs0ceJEL4CGb2k%3D\";}s:11:\"gravitysmtp\";a:5:{s:12:\"is_available\";b:1;s:7:\"version\";s:11:\"1.0-alpha-4\";s:14:\"version_latest\";s:11:\"1.0-alpha-4\";s:3:\"url\";s:184:\"https://s3.amazonaws.com/gravityforms/addons/gravitysmtp/gravitysmtp_1.0-alpha-4.zip?AWSAccessKeyId=AKIA5U3GBHC5WDRZA6NK&Expires=1696535897&Signature=YY%2FUL4b0xU6hqtTXeO%2BpDhNZHxg%3D\";s:10:\"url_latest\";s:184:\"https://s3.amazonaws.com/gravityforms/addons/gravitysmtp/gravitysmtp_1.0-alpha-4.zip?AWSAccessKeyId=AKIA5U3GBHC5WDRZA6NK&Expires=1696535897&Signature=YY%2FUL4b0xU6hqtTXeO%2BpDhNZHxg%3D\";}}','no');
INSERT INTO `wp_options` VALUES (1119,'_transient_timeout_rg_gforms_license','1696449497','no');
INSERT INTO `wp_options` VALUES (1120,'_transient_rg_gforms_license','a:19:{s:15:\"license_key_md5\";s:32:\"5d6cd12c3c29d8a58210a53aee8657cb\";s:12:\"date_created\";s:19:\"2020-10-13 16:01:32\";s:12:\"date_expires\";s:19:\"2023-11-12 16:01:13\";s:12:\"renewal_date\";s:19:\"2023-10-13 16:01:13\";s:9:\"is_active\";s:1:\"1\";s:24:\"is_subscription_canceled\";s:1:\"0\";s:12:\"product_code\";s:7:\"GFELITE\";s:12:\"product_name\";s:19:\"Gravity Forms Elite\";s:18:\"is_near_expiration\";b:0;s:14:\"days_to_expire\";i:39;s:10:\"is_expired\";b:0;s:8:\"is_valid\";b:1;s:22:\"is_past_renewal_period\";b:0;s:9:\"is_legacy\";b:0;s:12:\"is_perpetual\";b:0;s:9:\"max_sites\";s:9:\"unlimited\";s:12:\"active_sites\";i:11;s:15:\"remaining_seats\";s:9:\"unlimited\";s:20:\"is_multisite_allowed\";b:1;}','no');
INSERT INTO `wp_options` VALUES (1121,'_transient_timeout_GFCache_9103f4b59809b73ae75f98096b5d2476','1696449497','no');
INSERT INTO `wp_options` VALUES (1122,'_transient_GFCache_9103f4b59809b73ae75f98096b5d2476','s:904:\"O:59:\"Gravity_Forms\\Gravity_Forms\\License\\GF_License_API_Response\":5:{s:4:\"data\";a:1:{i:0;a:19:{s:15:\"license_key_md5\";s:32:\"5d6cd12c3c29d8a58210a53aee8657cb\";s:12:\"date_created\";s:19:\"2020-10-13 16:01:32\";s:12:\"date_expires\";s:19:\"2023-11-12 16:01:13\";s:12:\"renewal_date\";s:19:\"2023-10-13 16:01:13\";s:9:\"is_active\";s:1:\"1\";s:24:\"is_subscription_canceled\";s:1:\"0\";s:12:\"product_code\";s:7:\"GFELITE\";s:12:\"product_name\";s:19:\"Gravity Forms Elite\";s:18:\"is_near_expiration\";b:0;s:14:\"days_to_expire\";i:39;s:10:\"is_expired\";b:0;s:8:\"is_valid\";b:1;s:22:\"is_past_renewal_period\";b:0;s:9:\"is_legacy\";b:0;s:12:\"is_perpetual\";b:0;s:9:\"max_sites\";s:9:\"unlimited\";s:12:\"active_sites\";i:11;s:15:\"remaining_seats\";s:9:\"unlimited\";s:20:\"is_multisite_allowed\";b:1;}}s:6:\"errors\";a:0:{}s:6:\"status\";s:9:\"valid_key\";s:4:\"meta\";a:0:{}s:5:\"strat\";O:63:\"Gravity_Forms\\Gravity_Forms\\Transients\\GF_WP_Transient_Strategy\":0:{}}\";','no');
INSERT INTO `wp_options` VALUES (1137,'_site_transient_timeout_theme_roots','1696419504','no');
INSERT INTO `wp_options` VALUES (1138,'_site_transient_theme_roots','a:2:{s:15:\"choctaw-landing\";s:7:\"/themes\";s:17:\"twentytwentythree\";s:7:\"/themes\";}','no');
INSERT INTO `wp_options` VALUES (1139,'_site_transient_update_plugins','O:8:\"stdClass\":5:{s:12:\"last_checked\";i:1696417705;s:8:\"response\";a:1:{s:34:\"advanced-custom-fields-pro/acf.php\";O:8:\"stdClass\":12:{s:4:\"slug\";s:26:\"advanced-custom-fields-pro\";s:6:\"plugin\";s:34:\"advanced-custom-fields-pro/acf.php\";s:11:\"new_version\";s:7:\"6.2.1.1\";s:3:\"url\";s:36:\"https://www.advancedcustomfields.com\";s:6:\"tested\";s:3:\"6.3\";s:7:\"package\";s:331:\"https://connect.advancedcustomfields.com/v2/plugins/download?token=eyJwIjoicHJvIiwiayI6Ik9HVm1OalE0TmpBMVptTXpNMlptWlRFME56TmpZemxoWVdabE1EWmlaRFE0T1RJNU4yWTRPVFExTm1ZMU5XWTBaRGd6WmpOaiIsIndwX3VybCI6Imh0dHA6XC9cL2Nob2N0YXctbGFuZGluZy1wcm9kLmxvY2FsIiwid3BfdmVyc2lvbiI6IjYuMy4xIiwicGhwX3ZlcnNpb24iOiI4LjEuOSIsImJsb2NrX2NvdW50IjowfQ==\";s:5:\"icons\";a:1:{s:7:\"default\";s:63:\"https://ps.w.org/advanced-custom-fields/assets/icon-256x256.png\";}s:7:\"banners\";a:2:{s:3:\"low\";s:77:\"https://ps.w.org/advanced-custom-fields/assets/banner-772x250.jpg?rev=1729102\";s:4:\"high\";s:78:\"https://ps.w.org/advanced-custom-fields/assets/banner-1544x500.jpg?rev=1729099\";}s:8:\"requires\";s:3:\"5.8\";s:12:\"requires_php\";s:3:\"7.0\";s:12:\"release_date\";s:8:\"20230908\";s:13:\"license_valid\";b:1;}}s:12:\"translations\";a:0:{}s:9:\"no_update\";a:1:{s:33:\"classic-editor/classic-editor.php\";O:8:\"stdClass\":10:{s:2:\"id\";s:28:\"w.org/plugins/classic-editor\";s:4:\"slug\";s:14:\"classic-editor\";s:6:\"plugin\";s:33:\"classic-editor/classic-editor.php\";s:11:\"new_version\";s:5:\"1.6.3\";s:3:\"url\";s:45:\"https://wordpress.org/plugins/classic-editor/\";s:7:\"package\";s:63:\"https://downloads.wordpress.org/plugin/classic-editor.1.6.3.zip\";s:5:\"icons\";a:2:{s:2:\"2x\";s:67:\"https://ps.w.org/classic-editor/assets/icon-256x256.png?rev=1998671\";s:2:\"1x\";s:67:\"https://ps.w.org/classic-editor/assets/icon-128x128.png?rev=1998671\";}s:7:\"banners\";a:2:{s:2:\"2x\";s:70:\"https://ps.w.org/classic-editor/assets/banner-1544x500.png?rev=1998671\";s:2:\"1x\";s:69:\"https://ps.w.org/classic-editor/assets/banner-772x250.png?rev=1998676\";}s:11:\"banners_rtl\";a:0:{}s:8:\"requires\";s:3:\"4.9\";}}s:7:\"checked\";a:4:{s:34:\"advanced-custom-fields-pro/acf.php\";s:5:\"6.2.0\";s:33:\"classic-editor/classic-editor.php\";s:5:\"1.6.3\";s:29:\"gravityforms/gravityforms.php\";s:6:\"2.7.14\";s:33:\"wp-mail-smtp-pro/wp_mail_smtp.php\";s:5:\"3.7.0\";}}','no');
/*!40000 ALTER TABLE `wp_options` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wp_postmeta`
--

DROP TABLE IF EXISTS `wp_postmeta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `wp_postmeta` (
  `meta_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `post_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `meta_key` varchar(255) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `meta_value` longtext COLLATE utf8mb4_unicode_520_ci,
  PRIMARY KEY (`meta_id`),
  KEY `post_id` (`post_id`),
  KEY `meta_key` (`meta_key`(191))
) ENGINE=InnoDB AUTO_INCREMENT=889 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wp_postmeta`
--

LOCK TABLES `wp_postmeta` WRITE;
/*!40000 ALTER TABLE `wp_postmeta` DISABLE KEYS */;
INSERT INTO `wp_postmeta` VALUES (2,3,'_wp_page_template','default');
INSERT INTO `wp_postmeta` VALUES (10,8,'_edit_lock','1690403349:1');
INSERT INTO `wp_postmeta` VALUES (13,8,'_wp_page_template','page-templates/page-homepage.php');
INSERT INTO `wp_postmeta` VALUES (22,15,'_wp_attached_file','2023/07/Homepage-Header.jpg');
INSERT INTO `wp_postmeta` VALUES (23,15,'_wp_attachment_metadata','a:6:{s:5:\"width\";i:1920;s:6:\"height\";i:1080;s:4:\"file\";s:27:\"2023/07/Homepage-Header.jpg\";s:8:\"filesize\";i:246080;s:5:\"sizes\";a:5:{s:6:\"medium\";a:5:{s:4:\"file\";s:27:\"Homepage-Header-300x169.jpg\";s:5:\"width\";i:300;s:6:\"height\";i:169;s:9:\"mime-type\";s:10:\"image/jpeg\";s:8:\"filesize\";i:16059;}s:5:\"large\";a:5:{s:4:\"file\";s:28:\"Homepage-Header-1024x576.jpg\";s:5:\"width\";i:1024;s:6:\"height\";i:576;s:9:\"mime-type\";s:10:\"image/jpeg\";s:8:\"filesize\";i:131630;}s:9:\"thumbnail\";a:5:{s:4:\"file\";s:27:\"Homepage-Header-150x150.jpg\";s:5:\"width\";i:150;s:6:\"height\";i:150;s:9:\"mime-type\";s:10:\"image/jpeg\";s:8:\"filesize\";i:8267;}s:12:\"medium_large\";a:5:{s:4:\"file\";s:27:\"Homepage-Header-768x432.jpg\";s:5:\"width\";i:768;s:6:\"height\";i:432;s:9:\"mime-type\";s:10:\"image/jpeg\";s:8:\"filesize\";i:82236;}s:9:\"1536x1536\";a:5:{s:4:\"file\";s:28:\"Homepage-Header-1536x864.jpg\";s:5:\"width\";i:1536;s:6:\"height\";i:864;s:9:\"mime-type\";s:10:\"image/jpeg\";s:8:\"filesize\";i:247677;}}s:10:\"image_meta\";a:12:{s:8:\"aperture\";s:1:\"0\";s:6:\"credit\";s:0:\"\";s:6:\"camera\";s:0:\"\";s:7:\"caption\";s:0:\"\";s:17:\"created_timestamp\";s:1:\"0\";s:9:\"copyright\";s:0:\"\";s:12:\"focal_length\";s:1:\"0\";s:3:\"iso\";s:1:\"0\";s:13:\"shutter_speed\";s:1:\"0\";s:5:\"title\";s:0:\"\";s:11:\"orientation\";s:1:\"0\";s:8:\"keywords\";a:0:{}}}');
INSERT INTO `wp_postmeta` VALUES (24,16,'_wp_attached_file','2023/07/nav-bg.jpg');
INSERT INTO `wp_postmeta` VALUES (25,16,'_wp_attachment_metadata','a:6:{s:5:\"width\";i:1920;s:6:\"height\";i:200;s:4:\"file\";s:18:\"2023/07/nav-bg.jpg\";s:8:\"filesize\";i:82667;s:5:\"sizes\";a:5:{s:6:\"medium\";a:5:{s:4:\"file\";s:17:\"nav-bg-300x31.jpg\";s:5:\"width\";i:300;s:6:\"height\";i:31;s:9:\"mime-type\";s:10:\"image/jpeg\";s:8:\"filesize\";i:1300;}s:5:\"large\";a:5:{s:4:\"file\";s:19:\"nav-bg-1024x107.jpg\";s:5:\"width\";i:1024;s:6:\"height\";i:107;s:9:\"mime-type\";s:10:\"image/jpeg\";s:8:\"filesize\";i:10313;}s:9:\"thumbnail\";a:5:{s:4:\"file\";s:18:\"nav-bg-150x150.jpg\";s:5:\"width\";i:150;s:6:\"height\";i:150;s:9:\"mime-type\";s:10:\"image/jpeg\";s:8:\"filesize\";i:2575;}s:12:\"medium_large\";a:5:{s:4:\"file\";s:17:\"nav-bg-768x80.jpg\";s:5:\"width\";i:768;s:6:\"height\";i:80;s:9:\"mime-type\";s:10:\"image/jpeg\";s:8:\"filesize\";i:6202;}s:9:\"1536x1536\";a:5:{s:4:\"file\";s:19:\"nav-bg-1536x160.jpg\";s:5:\"width\";i:1536;s:6:\"height\";i:160;s:9:\"mime-type\";s:10:\"image/jpeg\";s:8:\"filesize\";i:20917;}}s:10:\"image_meta\";a:12:{s:8:\"aperture\";s:1:\"0\";s:6:\"credit\";s:0:\"\";s:6:\"camera\";s:0:\"\";s:7:\"caption\";s:0:\"\";s:17:\"created_timestamp\";s:1:\"0\";s:9:\"copyright\";s:0:\"\";s:12:\"focal_length\";s:1:\"0\";s:3:\"iso\";s:1:\"0\";s:13:\"shutter_speed\";s:1:\"0\";s:5:\"title\";s:0:\"\";s:11:\"orientation\";s:1:\"0\";s:8:\"keywords\";a:0:{}}}');
INSERT INTO `wp_postmeta` VALUES (73,23,'_menu_item_type','custom');
INSERT INTO `wp_postmeta` VALUES (74,23,'_menu_item_menu_item_parent','0');
INSERT INTO `wp_postmeta` VALUES (75,23,'_menu_item_object_id','23');
INSERT INTO `wp_postmeta` VALUES (76,23,'_menu_item_object','custom');
INSERT INTO `wp_postmeta` VALUES (77,23,'_menu_item_target','_blank');
INSERT INTO `wp_postmeta` VALUES (78,23,'_menu_item_classes','a:1:{i:0;s:7:\"nav-btn\";}');
INSERT INTO `wp_postmeta` VALUES (79,23,'_menu_item_xfn','');
INSERT INTO `wp_postmeta` VALUES (80,23,'_menu_item_url','#');
INSERT INTO `wp_postmeta` VALUES (87,23,'_wp_old_date','2023-07-26');
INSERT INTO `wp_postmeta` VALUES (88,25,'_menu_item_type','custom');
INSERT INTO `wp_postmeta` VALUES (89,25,'_menu_item_menu_item_parent','0');
INSERT INTO `wp_postmeta` VALUES (90,25,'_menu_item_object_id','25');
INSERT INTO `wp_postmeta` VALUES (91,25,'_menu_item_object','custom');
INSERT INTO `wp_postmeta` VALUES (92,25,'_menu_item_target','');
INSERT INTO `wp_postmeta` VALUES (93,25,'_menu_item_classes','a:1:{i:0;s:0:\"\";}');
INSERT INTO `wp_postmeta` VALUES (94,25,'_menu_item_xfn','');
INSERT INTO `wp_postmeta` VALUES (95,25,'_menu_item_url','#');
INSERT INTO `wp_postmeta` VALUES (97,26,'_menu_item_type','custom');
INSERT INTO `wp_postmeta` VALUES (98,26,'_menu_item_menu_item_parent','0');
INSERT INTO `wp_postmeta` VALUES (99,26,'_menu_item_object_id','26');
INSERT INTO `wp_postmeta` VALUES (100,26,'_menu_item_object','custom');
INSERT INTO `wp_postmeta` VALUES (101,26,'_menu_item_target','');
INSERT INTO `wp_postmeta` VALUES (102,26,'_menu_item_classes','a:1:{i:0;s:0:\"\";}');
INSERT INTO `wp_postmeta` VALUES (103,26,'_menu_item_xfn','');
INSERT INTO `wp_postmeta` VALUES (104,26,'_menu_item_url','#');
INSERT INTO `wp_postmeta` VALUES (106,27,'_menu_item_type','custom');
INSERT INTO `wp_postmeta` VALUES (107,27,'_menu_item_menu_item_parent','0');
INSERT INTO `wp_postmeta` VALUES (108,27,'_menu_item_object_id','27');
INSERT INTO `wp_postmeta` VALUES (109,27,'_menu_item_object','custom');
INSERT INTO `wp_postmeta` VALUES (110,27,'_menu_item_target','');
INSERT INTO `wp_postmeta` VALUES (111,27,'_menu_item_classes','a:1:{i:0;s:0:\"\";}');
INSERT INTO `wp_postmeta` VALUES (112,27,'_menu_item_xfn','');
INSERT INTO `wp_postmeta` VALUES (113,27,'_menu_item_url','#');
INSERT INTO `wp_postmeta` VALUES (115,28,'_menu_item_type','custom');
INSERT INTO `wp_postmeta` VALUES (116,28,'_menu_item_menu_item_parent','0');
INSERT INTO `wp_postmeta` VALUES (117,28,'_menu_item_object_id','28');
INSERT INTO `wp_postmeta` VALUES (118,28,'_menu_item_object','custom');
INSERT INTO `wp_postmeta` VALUES (119,28,'_menu_item_target','');
INSERT INTO `wp_postmeta` VALUES (120,28,'_menu_item_classes','a:1:{i:0;s:0:\"\";}');
INSERT INTO `wp_postmeta` VALUES (121,28,'_menu_item_xfn','');
INSERT INTO `wp_postmeta` VALUES (122,28,'_menu_item_url','#');
INSERT INTO `wp_postmeta` VALUES (124,29,'_menu_item_type','custom');
INSERT INTO `wp_postmeta` VALUES (125,29,'_menu_item_menu_item_parent','0');
INSERT INTO `wp_postmeta` VALUES (126,29,'_menu_item_object_id','29');
INSERT INTO `wp_postmeta` VALUES (127,29,'_menu_item_object','custom');
INSERT INTO `wp_postmeta` VALUES (128,29,'_menu_item_target','');
INSERT INTO `wp_postmeta` VALUES (129,29,'_menu_item_classes','a:1:{i:0;s:0:\"\";}');
INSERT INTO `wp_postmeta` VALUES (130,29,'_menu_item_xfn','');
INSERT INTO `wp_postmeta` VALUES (131,29,'_menu_item_url','#');
INSERT INTO `wp_postmeta` VALUES (133,30,'_menu_item_type','custom');
INSERT INTO `wp_postmeta` VALUES (134,30,'_menu_item_menu_item_parent','0');
INSERT INTO `wp_postmeta` VALUES (135,30,'_menu_item_object_id','30');
INSERT INTO `wp_postmeta` VALUES (136,30,'_menu_item_object','custom');
INSERT INTO `wp_postmeta` VALUES (137,30,'_menu_item_target','');
INSERT INTO `wp_postmeta` VALUES (138,30,'_menu_item_classes','a:1:{i:0;s:0:\"\";}');
INSERT INTO `wp_postmeta` VALUES (139,30,'_menu_item_xfn','');
INSERT INTO `wp_postmeta` VALUES (140,30,'_menu_item_url','#');
INSERT INTO `wp_postmeta` VALUES (142,31,'_menu_item_type','custom');
INSERT INTO `wp_postmeta` VALUES (143,31,'_menu_item_menu_item_parent','0');
INSERT INTO `wp_postmeta` VALUES (144,31,'_menu_item_object_id','31');
INSERT INTO `wp_postmeta` VALUES (145,31,'_menu_item_object','custom');
INSERT INTO `wp_postmeta` VALUES (146,31,'_menu_item_target','_blank');
INSERT INTO `wp_postmeta` VALUES (147,31,'_menu_item_classes','a:1:{i:0;s:0:\"\";}');
INSERT INTO `wp_postmeta` VALUES (148,31,'_menu_item_xfn','');
INSERT INTO `wp_postmeta` VALUES (149,31,'_menu_item_url','https://www.choctawnation.com/');
INSERT INTO `wp_postmeta` VALUES (151,32,'_menu_item_type','custom');
INSERT INTO `wp_postmeta` VALUES (152,32,'_menu_item_menu_item_parent','0');
INSERT INTO `wp_postmeta` VALUES (153,32,'_menu_item_object_id','32');
INSERT INTO `wp_postmeta` VALUES (154,32,'_menu_item_object','custom');
INSERT INTO `wp_postmeta` VALUES (155,32,'_menu_item_target','');
INSERT INTO `wp_postmeta` VALUES (156,32,'_menu_item_classes','a:1:{i:0;s:0:\"\";}');
INSERT INTO `wp_postmeta` VALUES (157,32,'_menu_item_xfn','');
INSERT INTO `wp_postmeta` VALUES (158,32,'_menu_item_url','#');
INSERT INTO `wp_postmeta` VALUES (160,33,'_menu_item_type','custom');
INSERT INTO `wp_postmeta` VALUES (161,33,'_menu_item_menu_item_parent','0');
INSERT INTO `wp_postmeta` VALUES (162,33,'_menu_item_object_id','33');
INSERT INTO `wp_postmeta` VALUES (163,33,'_menu_item_object','custom');
INSERT INTO `wp_postmeta` VALUES (164,33,'_menu_item_target','');
INSERT INTO `wp_postmeta` VALUES (165,33,'_menu_item_classes','a:1:{i:0;s:0:\"\";}');
INSERT INTO `wp_postmeta` VALUES (166,33,'_menu_item_xfn','');
INSERT INTO `wp_postmeta` VALUES (167,33,'_menu_item_url','#');
INSERT INTO `wp_postmeta` VALUES (169,34,'_menu_item_type','custom');
INSERT INTO `wp_postmeta` VALUES (170,34,'_menu_item_menu_item_parent','0');
INSERT INTO `wp_postmeta` VALUES (171,34,'_menu_item_object_id','34');
INSERT INTO `wp_postmeta` VALUES (172,34,'_menu_item_object','custom');
INSERT INTO `wp_postmeta` VALUES (173,34,'_menu_item_target','');
INSERT INTO `wp_postmeta` VALUES (174,34,'_menu_item_classes','a:1:{i:0;s:0:\"\";}');
INSERT INTO `wp_postmeta` VALUES (175,34,'_menu_item_xfn','');
INSERT INTO `wp_postmeta` VALUES (176,34,'_menu_item_url','#');
INSERT INTO `wp_postmeta` VALUES (178,35,'_menu_item_type','custom');
INSERT INTO `wp_postmeta` VALUES (179,35,'_menu_item_menu_item_parent','0');
INSERT INTO `wp_postmeta` VALUES (180,35,'_menu_item_object_id','35');
INSERT INTO `wp_postmeta` VALUES (181,35,'_menu_item_object','custom');
INSERT INTO `wp_postmeta` VALUES (182,35,'_menu_item_target','');
INSERT INTO `wp_postmeta` VALUES (183,35,'_menu_item_classes','a:1:{i:0;s:0:\"\";}');
INSERT INTO `wp_postmeta` VALUES (184,35,'_menu_item_xfn','');
INSERT INTO `wp_postmeta` VALUES (185,35,'_menu_item_url','#');
INSERT INTO `wp_postmeta` VALUES (187,36,'_menu_item_type','custom');
INSERT INTO `wp_postmeta` VALUES (188,36,'_menu_item_menu_item_parent','0');
INSERT INTO `wp_postmeta` VALUES (189,36,'_menu_item_object_id','36');
INSERT INTO `wp_postmeta` VALUES (190,36,'_menu_item_object','custom');
INSERT INTO `wp_postmeta` VALUES (191,36,'_menu_item_target','');
INSERT INTO `wp_postmeta` VALUES (192,36,'_menu_item_classes','a:1:{i:0;s:0:\"\";}');
INSERT INTO `wp_postmeta` VALUES (193,36,'_menu_item_xfn','');
INSERT INTO `wp_postmeta` VALUES (194,36,'_menu_item_url','#');
INSERT INTO `wp_postmeta` VALUES (196,37,'_menu_item_type','custom');
INSERT INTO `wp_postmeta` VALUES (197,37,'_menu_item_menu_item_parent','0');
INSERT INTO `wp_postmeta` VALUES (198,37,'_menu_item_object_id','37');
INSERT INTO `wp_postmeta` VALUES (199,37,'_menu_item_object','custom');
INSERT INTO `wp_postmeta` VALUES (200,37,'_menu_item_target','');
INSERT INTO `wp_postmeta` VALUES (201,37,'_menu_item_classes','a:1:{i:0;s:0:\"\";}');
INSERT INTO `wp_postmeta` VALUES (202,37,'_menu_item_xfn','');
INSERT INTO `wp_postmeta` VALUES (203,37,'_menu_item_url','#');
INSERT INTO `wp_postmeta` VALUES (205,38,'_menu_item_type','custom');
INSERT INTO `wp_postmeta` VALUES (206,38,'_menu_item_menu_item_parent','0');
INSERT INTO `wp_postmeta` VALUES (207,38,'_menu_item_object_id','38');
INSERT INTO `wp_postmeta` VALUES (208,38,'_menu_item_object','custom');
INSERT INTO `wp_postmeta` VALUES (209,38,'_menu_item_target','');
INSERT INTO `wp_postmeta` VALUES (210,38,'_menu_item_classes','a:1:{i:0;s:0:\"\";}');
INSERT INTO `wp_postmeta` VALUES (211,38,'_menu_item_xfn','');
INSERT INTO `wp_postmeta` VALUES (212,38,'_menu_item_url','#');
INSERT INTO `wp_postmeta` VALUES (214,39,'_edit_last','1');
INSERT INTO `wp_postmeta` VALUES (215,39,'_wp_page_template','page-templates/page-stay.php');
INSERT INTO `wp_postmeta` VALUES (216,39,'_edit_lock','1695330225:1');
INSERT INTO `wp_postmeta` VALUES (217,41,'_wp_attached_file','2023/08/footer-bg.jpg');
INSERT INTO `wp_postmeta` VALUES (218,41,'_wp_attachment_metadata','a:6:{s:5:\"width\";i:1920;s:6:\"height\";i:540;s:4:\"file\";s:21:\"2023/08/footer-bg.jpg\";s:8:\"filesize\";i:713105;s:5:\"sizes\";a:5:{s:6:\"medium\";a:5:{s:4:\"file\";s:20:\"footer-bg-300x84.jpg\";s:5:\"width\";i:300;s:6:\"height\";i:84;s:9:\"mime-type\";s:10:\"image/jpeg\";s:8:\"filesize\";i:5251;}s:5:\"large\";a:5:{s:4:\"file\";s:22:\"footer-bg-1024x288.jpg\";s:5:\"width\";i:1024;s:6:\"height\";i:288;s:9:\"mime-type\";s:10:\"image/jpeg\";s:8:\"filesize\";i:59659;}s:9:\"thumbnail\";a:5:{s:4:\"file\";s:21:\"footer-bg-150x150.jpg\";s:5:\"width\";i:150;s:6:\"height\";i:150;s:9:\"mime-type\";s:10:\"image/jpeg\";s:8:\"filesize\";i:5491;}s:12:\"medium_large\";a:5:{s:4:\"file\";s:21:\"footer-bg-768x216.jpg\";s:5:\"width\";i:768;s:6:\"height\";i:216;s:9:\"mime-type\";s:10:\"image/jpeg\";s:8:\"filesize\";i:35306;}s:9:\"1536x1536\";a:5:{s:4:\"file\";s:22:\"footer-bg-1536x432.jpg\";s:5:\"width\";i:1536;s:6:\"height\";i:432;s:9:\"mime-type\";s:10:\"image/jpeg\";s:8:\"filesize\";i:116388;}}s:10:\"image_meta\";a:12:{s:8:\"aperture\";s:1:\"0\";s:6:\"credit\";s:0:\"\";s:6:\"camera\";s:0:\"\";s:7:\"caption\";s:0:\"\";s:17:\"created_timestamp\";s:1:\"0\";s:9:\"copyright\";s:0:\"\";s:12:\"focal_length\";s:1:\"0\";s:3:\"iso\";s:1:\"0\";s:13:\"shutter_speed\";s:1:\"0\";s:5:\"title\";s:0:\"\";s:11:\"orientation\";s:1:\"0\";s:8:\"keywords\";a:0:{}}}');
INSERT INTO `wp_postmeta` VALUES (219,42,'_wp_attached_file','2023/08/basket-bg.jpg');
INSERT INTO `wp_postmeta` VALUES (220,42,'_wp_attachment_metadata','a:6:{s:5:\"width\";i:1547;s:6:\"height\";i:243;s:4:\"file\";s:21:\"2023/08/basket-bg.jpg\";s:8:\"filesize\";i:260268;s:5:\"sizes\";a:5:{s:6:\"medium\";a:5:{s:4:\"file\";s:20:\"basket-bg-300x47.jpg\";s:5:\"width\";i:300;s:6:\"height\";i:47;s:9:\"mime-type\";s:10:\"image/jpeg\";s:8:\"filesize\";i:3648;}s:5:\"large\";a:5:{s:4:\"file\";s:22:\"basket-bg-1024x161.jpg\";s:5:\"width\";i:1024;s:6:\"height\";i:161;s:9:\"mime-type\";s:10:\"image/jpeg\";s:8:\"filesize\";i:29497;}s:9:\"thumbnail\";a:5:{s:4:\"file\";s:21:\"basket-bg-150x150.jpg\";s:5:\"width\";i:150;s:6:\"height\";i:150;s:9:\"mime-type\";s:10:\"image/jpeg\";s:8:\"filesize\";i:4731;}s:12:\"medium_large\";a:5:{s:4:\"file\";s:21:\"basket-bg-768x121.jpg\";s:5:\"width\";i:768;s:6:\"height\";i:121;s:9:\"mime-type\";s:10:\"image/jpeg\";s:8:\"filesize\";i:16969;}s:9:\"1536x1536\";a:5:{s:4:\"file\";s:22:\"basket-bg-1536x241.jpg\";s:5:\"width\";i:1536;s:6:\"height\";i:241;s:9:\"mime-type\";s:10:\"image/jpeg\";s:8:\"filesize\";i:59944;}}s:10:\"image_meta\";a:12:{s:8:\"aperture\";s:1:\"0\";s:6:\"credit\";s:0:\"\";s:6:\"camera\";s:0:\"\";s:7:\"caption\";s:0:\"\";s:17:\"created_timestamp\";s:1:\"0\";s:9:\"copyright\";s:0:\"\";s:12:\"focal_length\";s:1:\"0\";s:3:\"iso\";s:1:\"0\";s:13:\"shutter_speed\";s:1:\"0\";s:5:\"title\";s:0:\"\";s:11:\"orientation\";s:1:\"0\";s:8:\"keywords\";a:0:{}}}');
INSERT INTO `wp_postmeta` VALUES (221,43,'_edit_last','1');
INSERT INTO `wp_postmeta` VALUES (222,43,'_wp_page_template','page-templates/page-eat-drink.php');
INSERT INTO `wp_postmeta` VALUES (223,43,'_edit_lock','1695326082:1');
INSERT INTO `wp_postmeta` VALUES (224,45,'_edit_last','1');
INSERT INTO `wp_postmeta` VALUES (225,45,'_edit_lock','1691182892:1');
INSERT INTO `wp_postmeta` VALUES (226,45,'_wp_page_template','page-templates/page-entertainment.php');
INSERT INTO `wp_postmeta` VALUES (233,49,'_edit_last','1');
INSERT INTO `wp_postmeta` VALUES (234,49,'_edit_lock','1691182910:1');
INSERT INTO `wp_postmeta` VALUES (235,49,'_wp_page_template','page-templates/page-things-to-do.php');
INSERT INTO `wp_postmeta` VALUES (236,51,'_edit_last','1');
INSERT INTO `wp_postmeta` VALUES (237,51,'_edit_lock','1691184661:1');
INSERT INTO `wp_postmeta` VALUES (238,51,'_wp_page_template','page-templates/page-mercantile.php');
INSERT INTO `wp_postmeta` VALUES (239,54,'_wp_attached_file','2023/08/brown-basket-bg.jpg');
INSERT INTO `wp_postmeta` VALUES (240,54,'_wp_attachment_metadata','a:6:{s:5:\"width\";i:1320;s:6:\"height\";i:1080;s:4:\"file\";s:27:\"2023/08/brown-basket-bg.jpg\";s:8:\"filesize\";i:338325;s:5:\"sizes\";a:4:{s:6:\"medium\";a:5:{s:4:\"file\";s:27:\"brown-basket-bg-300x245.jpg\";s:5:\"width\";i:300;s:6:\"height\";i:245;s:9:\"mime-type\";s:10:\"image/jpeg\";s:8:\"filesize\";i:11965;}s:5:\"large\";a:5:{s:4:\"file\";s:28:\"brown-basket-bg-1024x838.jpg\";s:5:\"width\";i:1024;s:6:\"height\";i:838;s:9:\"mime-type\";s:10:\"image/jpeg\";s:8:\"filesize\";i:150258;}s:9:\"thumbnail\";a:5:{s:4:\"file\";s:27:\"brown-basket-bg-150x150.jpg\";s:5:\"width\";i:150;s:6:\"height\";i:150;s:9:\"mime-type\";s:10:\"image/jpeg\";s:8:\"filesize\";i:3953;}s:12:\"medium_large\";a:5:{s:4:\"file\";s:27:\"brown-basket-bg-768x628.jpg\";s:5:\"width\";i:768;s:6:\"height\";i:628;s:9:\"mime-type\";s:10:\"image/jpeg\";s:8:\"filesize\";i:83513;}}s:10:\"image_meta\";a:12:{s:8:\"aperture\";s:1:\"0\";s:6:\"credit\";s:0:\"\";s:6:\"camera\";s:0:\"\";s:7:\"caption\";s:0:\"\";s:17:\"created_timestamp\";s:1:\"0\";s:9:\"copyright\";s:0:\"\";s:12:\"focal_length\";s:1:\"0\";s:3:\"iso\";s:1:\"0\";s:13:\"shutter_speed\";s:1:\"0\";s:5:\"title\";s:0:\"\";s:11:\"orientation\";s:1:\"0\";s:8:\"keywords\";a:0:{}}}');
INSERT INTO `wp_postmeta` VALUES (241,55,'_wp_attached_file','2023/08/luxury-has-landed-homepage.jpg');
INSERT INTO `wp_postmeta` VALUES (242,55,'_wp_attachment_metadata','a:6:{s:5:\"width\";i:640;s:6:\"height\";i:640;s:4:\"file\";s:38:\"2023/08/luxury-has-landed-homepage.jpg\";s:8:\"filesize\";i:23539;s:5:\"sizes\";a:2:{s:6:\"medium\";a:5:{s:4:\"file\";s:38:\"luxury-has-landed-homepage-300x300.jpg\";s:5:\"width\";i:300;s:6:\"height\";i:300;s:9:\"mime-type\";s:10:\"image/jpeg\";s:8:\"filesize\";i:12512;}s:9:\"thumbnail\";a:5:{s:4:\"file\";s:38:\"luxury-has-landed-homepage-150x150.jpg\";s:5:\"width\";i:150;s:6:\"height\";i:150;s:9:\"mime-type\";s:10:\"image/jpeg\";s:8:\"filesize\";i:5161;}}s:10:\"image_meta\";a:12:{s:8:\"aperture\";s:1:\"0\";s:6:\"credit\";s:0:\"\";s:6:\"camera\";s:0:\"\";s:7:\"caption\";s:0:\"\";s:17:\"created_timestamp\";s:1:\"0\";s:9:\"copyright\";s:0:\"\";s:12:\"focal_length\";s:1:\"0\";s:3:\"iso\";s:1:\"0\";s:13:\"shutter_speed\";s:1:\"0\";s:5:\"title\";s:0:\"\";s:11:\"orientation\";s:1:\"0\";s:8:\"keywords\";a:0:{}}}');
INSERT INTO `wp_postmeta` VALUES (243,56,'_wp_attached_file','2023/08/arrow.svg');
INSERT INTO `wp_postmeta` VALUES (244,56,'_wp_attachment_metadata','a:1:{s:8:\"filesize\";i:1252;}');
INSERT INTO `wp_postmeta` VALUES (245,57,'_wp_attached_file','2023/08/arrow-1.svg');
INSERT INTO `wp_postmeta` VALUES (246,57,'_wp_attachment_metadata','a:1:{s:8:\"filesize\";i:1210;}');
INSERT INTO `wp_postmeta` VALUES (247,58,'_wp_attached_file','2023/08/adventure-home-bg.jpg');
INSERT INTO `wp_postmeta` VALUES (248,58,'_wp_attachment_metadata','a:6:{s:5:\"width\";i:1920;s:6:\"height\";i:660;s:4:\"file\";s:29:\"2023/08/adventure-home-bg.jpg\";s:8:\"filesize\";i:156161;s:5:\"sizes\";a:5:{s:6:\"medium\";a:5:{s:4:\"file\";s:29:\"adventure-home-bg-300x103.jpg\";s:5:\"width\";i:300;s:6:\"height\";i:103;s:9:\"mime-type\";s:10:\"image/jpeg\";s:8:\"filesize\";i:9177;}s:5:\"large\";a:5:{s:4:\"file\";s:30:\"adventure-home-bg-1024x352.jpg\";s:5:\"width\";i:1024;s:6:\"height\";i:352;s:9:\"mime-type\";s:10:\"image/jpeg\";s:8:\"filesize\";i:63617;}s:9:\"thumbnail\";a:5:{s:4:\"file\";s:29:\"adventure-home-bg-150x150.jpg\";s:5:\"width\";i:150;s:6:\"height\";i:150;s:9:\"mime-type\";s:10:\"image/jpeg\";s:8:\"filesize\";i:6313;}s:12:\"medium_large\";a:5:{s:4:\"file\";s:29:\"adventure-home-bg-768x264.jpg\";s:5:\"width\";i:768;s:6:\"height\";i:264;s:9:\"mime-type\";s:10:\"image/jpeg\";s:8:\"filesize\";i:41092;}s:9:\"1536x1536\";a:5:{s:4:\"file\";s:30:\"adventure-home-bg-1536x528.jpg\";s:5:\"width\";i:1536;s:6:\"height\";i:528;s:9:\"mime-type\";s:10:\"image/jpeg\";s:8:\"filesize\";i:116967;}}s:10:\"image_meta\";a:12:{s:8:\"aperture\";s:1:\"0\";s:6:\"credit\";s:0:\"\";s:6:\"camera\";s:0:\"\";s:7:\"caption\";s:0:\"\";s:17:\"created_timestamp\";s:1:\"0\";s:9:\"copyright\";s:0:\"\";s:12:\"focal_length\";s:1:\"0\";s:3:\"iso\";s:1:\"0\";s:13:\"shutter_speed\";s:1:\"0\";s:5:\"title\";s:0:\"\";s:11:\"orientation\";s:1:\"0\";s:8:\"keywords\";a:0:{}}}');
INSERT INTO `wp_postmeta` VALUES (249,59,'_wp_attached_file','2023/08/arrow-white.svg');
INSERT INTO `wp_postmeta` VALUES (250,59,'_wp_attachment_metadata','a:1:{s:8:\"filesize\";i:845;}');
INSERT INTO `wp_postmeta` VALUES (251,60,'_wp_attached_file','2023/08/youre-a-winner-homepage.jpg');
INSERT INTO `wp_postmeta` VALUES (252,60,'_wp_attachment_metadata','a:6:{s:5:\"width\";i:640;s:6:\"height\";i:640;s:4:\"file\";s:35:\"2023/08/youre-a-winner-homepage.jpg\";s:8:\"filesize\";i:35066;s:5:\"sizes\";a:2:{s:6:\"medium\";a:5:{s:4:\"file\";s:35:\"youre-a-winner-homepage-300x300.jpg\";s:5:\"width\";i:300;s:6:\"height\";i:300;s:9:\"mime-type\";s:10:\"image/jpeg\";s:8:\"filesize\";i:18842;}s:9:\"thumbnail\";a:5:{s:4:\"file\";s:35:\"youre-a-winner-homepage-150x150.jpg\";s:5:\"width\";i:150;s:6:\"height\";i:150;s:9:\"mime-type\";s:10:\"image/jpeg\";s:8:\"filesize\";i:7565;}}s:10:\"image_meta\";a:12:{s:8:\"aperture\";s:1:\"0\";s:6:\"credit\";s:0:\"\";s:6:\"camera\";s:0:\"\";s:7:\"caption\";s:0:\"\";s:17:\"created_timestamp\";s:1:\"0\";s:9:\"copyright\";s:0:\"\";s:12:\"focal_length\";s:1:\"0\";s:3:\"iso\";s:1:\"0\";s:13:\"shutter_speed\";s:1:\"0\";s:5:\"title\";s:0:\"\";s:11:\"orientation\";s:1:\"0\";s:8:\"keywords\";a:0:{}}}');
INSERT INTO `wp_postmeta` VALUES (253,61,'_wp_attached_file','2023/08/meet-and-gather-homepage.jpg');
INSERT INTO `wp_postmeta` VALUES (254,61,'_wp_attachment_metadata','a:6:{s:5:\"width\";i:640;s:6:\"height\";i:640;s:4:\"file\";s:36:\"2023/08/meet-and-gather-homepage.jpg\";s:8:\"filesize\";i:31257;s:5:\"sizes\";a:2:{s:6:\"medium\";a:5:{s:4:\"file\";s:36:\"meet-and-gather-homepage-300x300.jpg\";s:5:\"width\";i:300;s:6:\"height\";i:300;s:9:\"mime-type\";s:10:\"image/jpeg\";s:8:\"filesize\";i:12610;}s:9:\"thumbnail\";a:5:{s:4:\"file\";s:36:\"meet-and-gather-homepage-150x150.jpg\";s:5:\"width\";i:150;s:6:\"height\";i:150;s:9:\"mime-type\";s:10:\"image/jpeg\";s:8:\"filesize\";i:4390;}}s:10:\"image_meta\";a:12:{s:8:\"aperture\";s:1:\"0\";s:6:\"credit\";s:0:\"\";s:6:\"camera\";s:0:\"\";s:7:\"caption\";s:0:\"\";s:17:\"created_timestamp\";s:1:\"0\";s:9:\"copyright\";s:0:\"\";s:12:\"focal_length\";s:1:\"0\";s:3:\"iso\";s:1:\"0\";s:13:\"shutter_speed\";s:1:\"0\";s:5:\"title\";s:0:\"\";s:11:\"orientation\";s:1:\"0\";s:8:\"keywords\";a:0:{}}}');
INSERT INTO `wp_postmeta` VALUES (255,62,'_wp_attached_file','2023/08/light-gray-map-background.jpg');
INSERT INTO `wp_postmeta` VALUES (256,62,'_wp_attachment_metadata','a:6:{s:5:\"width\";i:1920;s:6:\"height\";i:680;s:4:\"file\";s:37:\"2023/08/light-gray-map-background.jpg\";s:8:\"filesize\";i:78736;s:5:\"sizes\";a:5:{s:6:\"medium\";a:5:{s:4:\"file\";s:37:\"light-gray-map-background-300x106.jpg\";s:5:\"width\";i:300;s:6:\"height\";i:106;s:9:\"mime-type\";s:10:\"image/jpeg\";s:8:\"filesize\";i:2576;}s:5:\"large\";a:5:{s:4:\"file\";s:38:\"light-gray-map-background-1024x363.jpg\";s:5:\"width\";i:1024;s:6:\"height\";i:363;s:9:\"mime-type\";s:10:\"image/jpeg\";s:8:\"filesize\";i:29900;}s:9:\"thumbnail\";a:5:{s:4:\"file\";s:37:\"light-gray-map-background-150x150.jpg\";s:5:\"width\";i:150;s:6:\"height\";i:150;s:9:\"mime-type\";s:10:\"image/jpeg\";s:8:\"filesize\";i:2348;}s:12:\"medium_large\";a:5:{s:4:\"file\";s:37:\"light-gray-map-background-768x272.jpg\";s:5:\"width\";i:768;s:6:\"height\";i:272;s:9:\"mime-type\";s:10:\"image/jpeg\";s:8:\"filesize\";i:17613;}s:9:\"1536x1536\";a:5:{s:4:\"file\";s:38:\"light-gray-map-background-1536x544.jpg\";s:5:\"width\";i:1536;s:6:\"height\";i:544;s:9:\"mime-type\";s:10:\"image/jpeg\";s:8:\"filesize\";i:55478;}}s:10:\"image_meta\";a:12:{s:8:\"aperture\";s:1:\"0\";s:6:\"credit\";s:0:\"\";s:6:\"camera\";s:0:\"\";s:7:\"caption\";s:0:\"\";s:17:\"created_timestamp\";s:1:\"0\";s:9:\"copyright\";s:0:\"\";s:12:\"focal_length\";s:1:\"0\";s:3:\"iso\";s:1:\"0\";s:13:\"shutter_speed\";s:1:\"0\";s:5:\"title\";s:0:\"\";s:11:\"orientation\";s:1:\"0\";s:8:\"keywords\";a:0:{}}}');
INSERT INTO `wp_postmeta` VALUES (257,63,'_wp_attached_file','2023/08/double-arrow.svg');
INSERT INTO `wp_postmeta` VALUES (258,63,'_wp_attachment_metadata','a:1:{s:8:\"filesize\";i:1183;}');
INSERT INTO `wp_postmeta` VALUES (265,23,'_wp_old_date','2023-08-04');
INSERT INTO `wp_postmeta` VALUES (266,66,'_menu_item_type','post_type');
INSERT INTO `wp_postmeta` VALUES (267,66,'_menu_item_menu_item_parent','0');
INSERT INTO `wp_postmeta` VALUES (268,66,'_menu_item_object_id','39');
INSERT INTO `wp_postmeta` VALUES (269,66,'_menu_item_object','page');
INSERT INTO `wp_postmeta` VALUES (270,66,'_menu_item_target','');
INSERT INTO `wp_postmeta` VALUES (271,66,'_menu_item_classes','a:1:{i:0;s:0:\"\";}');
INSERT INTO `wp_postmeta` VALUES (272,66,'_menu_item_xfn','');
INSERT INTO `wp_postmeta` VALUES (273,66,'_menu_item_url','');
INSERT INTO `wp_postmeta` VALUES (276,67,'_wp_attached_file','2023/08/family-suite.jpg');
INSERT INTO `wp_postmeta` VALUES (277,67,'_wp_attachment_metadata','a:6:{s:5:\"width\";i:669;s:6:\"height\";i:434;s:4:\"file\";s:24:\"2023/08/family-suite.jpg\";s:8:\"filesize\";i:48855;s:5:\"sizes\";a:2:{s:6:\"medium\";a:5:{s:4:\"file\";s:24:\"family-suite-300x195.jpg\";s:5:\"width\";i:300;s:6:\"height\";i:195;s:9:\"mime-type\";s:10:\"image/jpeg\";s:8:\"filesize\";i:17074;}s:9:\"thumbnail\";a:5:{s:4:\"file\";s:24:\"family-suite-150x150.jpg\";s:5:\"width\";i:150;s:6:\"height\";i:150;s:9:\"mime-type\";s:10:\"image/jpeg\";s:8:\"filesize\";i:7618;}}s:10:\"image_meta\";a:12:{s:8:\"aperture\";s:1:\"0\";s:6:\"credit\";s:0:\"\";s:6:\"camera\";s:0:\"\";s:7:\"caption\";s:0:\"\";s:17:\"created_timestamp\";s:1:\"0\";s:9:\"copyright\";s:0:\"\";s:12:\"focal_length\";s:1:\"0\";s:3:\"iso\";s:1:\"0\";s:13:\"shutter_speed\";s:1:\"0\";s:5:\"title\";s:0:\"\";s:11:\"orientation\";s:1:\"0\";s:8:\"keywords\";a:0:{}}}');
INSERT INTO `wp_postmeta` VALUES (278,68,'_wp_attached_file','2023/08/luxury-suite.jpg');
INSERT INTO `wp_postmeta` VALUES (279,68,'_wp_attachment_metadata','a:6:{s:5:\"width\";i:669;s:6:\"height\";i:434;s:4:\"file\";s:24:\"2023/08/luxury-suite.jpg\";s:8:\"filesize\";i:69251;s:5:\"sizes\";a:2:{s:6:\"medium\";a:5:{s:4:\"file\";s:24:\"luxury-suite-300x195.jpg\";s:5:\"width\";i:300;s:6:\"height\";i:195;s:9:\"mime-type\";s:10:\"image/jpeg\";s:8:\"filesize\";i:16449;}s:9:\"thumbnail\";a:5:{s:4:\"file\";s:24:\"luxury-suite-150x150.jpg\";s:5:\"width\";i:150;s:6:\"height\";i:150;s:9:\"mime-type\";s:10:\"image/jpeg\";s:8:\"filesize\";i:7513;}}s:10:\"image_meta\";a:12:{s:8:\"aperture\";s:1:\"0\";s:6:\"credit\";s:0:\"\";s:6:\"camera\";s:0:\"\";s:7:\"caption\";s:0:\"\";s:17:\"created_timestamp\";s:1:\"0\";s:9:\"copyright\";s:0:\"\";s:12:\"focal_length\";s:1:\"0\";s:3:\"iso\";s:1:\"0\";s:13:\"shutter_speed\";s:1:\"0\";s:5:\"title\";s:0:\"\";s:11:\"orientation\";s:1:\"0\";s:8:\"keywords\";a:0:{}}}');
INSERT INTO `wp_postmeta` VALUES (280,69,'_wp_attached_file','2023/08/one-king-bed.jpg');
INSERT INTO `wp_postmeta` VALUES (281,69,'_wp_attachment_metadata','a:6:{s:5:\"width\";i:669;s:6:\"height\";i:434;s:4:\"file\";s:24:\"2023/08/one-king-bed.jpg\";s:8:\"filesize\";i:39667;s:5:\"sizes\";a:2:{s:6:\"medium\";a:5:{s:4:\"file\";s:24:\"one-king-bed-300x195.jpg\";s:5:\"width\";i:300;s:6:\"height\";i:195;s:9:\"mime-type\";s:10:\"image/jpeg\";s:8:\"filesize\";i:10398;}s:9:\"thumbnail\";a:5:{s:4:\"file\";s:24:\"one-king-bed-150x150.jpg\";s:5:\"width\";i:150;s:6:\"height\";i:150;s:9:\"mime-type\";s:10:\"image/jpeg\";s:8:\"filesize\";i:4697;}}s:10:\"image_meta\";a:12:{s:8:\"aperture\";s:1:\"0\";s:6:\"credit\";s:0:\"\";s:6:\"camera\";s:0:\"\";s:7:\"caption\";s:0:\"\";s:17:\"created_timestamp\";s:1:\"0\";s:9:\"copyright\";s:0:\"\";s:12:\"focal_length\";s:1:\"0\";s:3:\"iso\";s:1:\"0\";s:13:\"shutter_speed\";s:1:\"0\";s:5:\"title\";s:0:\"\";s:11:\"orientation\";s:1:\"0\";s:8:\"keywords\";a:0:{}}}');
INSERT INTO `wp_postmeta` VALUES (282,70,'_wp_attached_file','2023/08/two-queen-beds.jpg');
INSERT INTO `wp_postmeta` VALUES (283,70,'_wp_attachment_metadata','a:6:{s:5:\"width\";i:669;s:6:\"height\";i:434;s:4:\"file\";s:26:\"2023/08/two-queen-beds.jpg\";s:8:\"filesize\";i:53249;s:5:\"sizes\";a:2:{s:6:\"medium\";a:5:{s:4:\"file\";s:26:\"two-queen-beds-300x195.jpg\";s:5:\"width\";i:300;s:6:\"height\";i:195;s:9:\"mime-type\";s:10:\"image/jpeg\";s:8:\"filesize\";i:10180;}s:9:\"thumbnail\";a:5:{s:4:\"file\";s:26:\"two-queen-beds-150x150.jpg\";s:5:\"width\";i:150;s:6:\"height\";i:150;s:9:\"mime-type\";s:10:\"image/jpeg\";s:8:\"filesize\";i:4650;}}s:10:\"image_meta\";a:12:{s:8:\"aperture\";s:1:\"0\";s:6:\"credit\";s:0:\"\";s:6:\"camera\";s:0:\"\";s:7:\"caption\";s:0:\"\";s:17:\"created_timestamp\";s:1:\"0\";s:9:\"copyright\";s:0:\"\";s:12:\"focal_length\";s:1:\"0\";s:3:\"iso\";s:1:\"0\";s:13:\"shutter_speed\";s:1:\"0\";s:5:\"title\";s:0:\"\";s:11:\"orientation\";s:1:\"0\";s:8:\"keywords\";a:0:{}}}');
INSERT INTO `wp_postmeta` VALUES (286,73,'_wp_attached_file','2023/09/amenities-bg.jpg');
INSERT INTO `wp_postmeta` VALUES (287,73,'_wp_attachment_metadata','a:6:{s:5:\"width\";i:1920;s:6:\"height\";i:660;s:4:\"file\";s:24:\"2023/09/amenities-bg.jpg\";s:8:\"filesize\";i:131271;s:5:\"sizes\";a:5:{s:6:\"medium\";a:5:{s:4:\"file\";s:24:\"amenities-bg-300x103.jpg\";s:5:\"width\";i:300;s:6:\"height\";i:103;s:9:\"mime-type\";s:10:\"image/jpeg\";s:8:\"filesize\";i:7817;}s:5:\"large\";a:5:{s:4:\"file\";s:25:\"amenities-bg-1024x352.jpg\";s:5:\"width\";i:1024;s:6:\"height\";i:352;s:9:\"mime-type\";s:10:\"image/jpeg\";s:8:\"filesize\";i:43917;}s:9:\"thumbnail\";a:5:{s:4:\"file\";s:24:\"amenities-bg-150x150.jpg\";s:5:\"width\";i:150;s:6:\"height\";i:150;s:9:\"mime-type\";s:10:\"image/jpeg\";s:8:\"filesize\";i:5626;}s:12:\"medium_large\";a:5:{s:4:\"file\";s:24:\"amenities-bg-768x264.jpg\";s:5:\"width\";i:768;s:6:\"height\";i:264;s:9:\"mime-type\";s:10:\"image/jpeg\";s:8:\"filesize\";i:28716;}s:9:\"1536x1536\";a:5:{s:4:\"file\";s:25:\"amenities-bg-1536x528.jpg\";s:5:\"width\";i:1536;s:6:\"height\";i:528;s:9:\"mime-type\";s:10:\"image/jpeg\";s:8:\"filesize\";i:80677;}}s:10:\"image_meta\";a:12:{s:8:\"aperture\";s:1:\"0\";s:6:\"credit\";s:0:\"\";s:6:\"camera\";s:0:\"\";s:7:\"caption\";s:0:\"\";s:17:\"created_timestamp\";s:1:\"0\";s:9:\"copyright\";s:0:\"\";s:12:\"focal_length\";s:1:\"0\";s:3:\"iso\";s:1:\"0\";s:13:\"shutter_speed\";s:1:\"0\";s:5:\"title\";s:0:\"\";s:11:\"orientation\";s:1:\"0\";s:8:\"keywords\";a:0:{}}}');
INSERT INTO `wp_postmeta` VALUES (288,74,'_wp_attached_file','2023/09/amenities-meetings.jpg');
INSERT INTO `wp_postmeta` VALUES (289,74,'_wp_attachment_metadata','a:6:{s:5:\"width\";i:640;s:6:\"height\";i:640;s:4:\"file\";s:30:\"2023/09/amenities-meetings.jpg\";s:8:\"filesize\";i:49798;s:5:\"sizes\";a:2:{s:6:\"medium\";a:5:{s:4:\"file\";s:30:\"amenities-meetings-300x300.jpg\";s:5:\"width\";i:300;s:6:\"height\";i:300;s:9:\"mime-type\";s:10:\"image/jpeg\";s:8:\"filesize\";i:23227;}s:9:\"thumbnail\";a:5:{s:4:\"file\";s:30:\"amenities-meetings-150x150.jpg\";s:5:\"width\";i:150;s:6:\"height\";i:150;s:9:\"mime-type\";s:10:\"image/jpeg\";s:8:\"filesize\";i:7963;}}s:10:\"image_meta\";a:12:{s:8:\"aperture\";s:1:\"0\";s:6:\"credit\";s:0:\"\";s:6:\"camera\";s:0:\"\";s:7:\"caption\";s:0:\"\";s:17:\"created_timestamp\";s:1:\"0\";s:9:\"copyright\";s:0:\"\";s:12:\"focal_length\";s:1:\"0\";s:3:\"iso\";s:1:\"0\";s:13:\"shutter_speed\";s:1:\"0\";s:5:\"title\";s:0:\"\";s:11:\"orientation\";s:1:\"0\";s:8:\"keywords\";a:0:{}}}');
INSERT INTO `wp_postmeta` VALUES (290,75,'_wp_attached_file','2023/09/amenities-physical.jpg');
INSERT INTO `wp_postmeta` VALUES (291,75,'_wp_attachment_metadata','a:6:{s:5:\"width\";i:640;s:6:\"height\";i:640;s:4:\"file\";s:30:\"2023/09/amenities-physical.jpg\";s:8:\"filesize\";i:43539;s:5:\"sizes\";a:2:{s:6:\"medium\";a:5:{s:4:\"file\";s:30:\"amenities-physical-300x300.jpg\";s:5:\"width\";i:300;s:6:\"height\";i:300;s:9:\"mime-type\";s:10:\"image/jpeg\";s:8:\"filesize\";i:20547;}s:9:\"thumbnail\";a:5:{s:4:\"file\";s:30:\"amenities-physical-150x150.jpg\";s:5:\"width\";i:150;s:6:\"height\";i:150;s:9:\"mime-type\";s:10:\"image/jpeg\";s:8:\"filesize\";i:8055;}}s:10:\"image_meta\";a:12:{s:8:\"aperture\";s:1:\"0\";s:6:\"credit\";s:0:\"\";s:6:\"camera\";s:0:\"\";s:7:\"caption\";s:0:\"\";s:17:\"created_timestamp\";s:1:\"0\";s:9:\"copyright\";s:0:\"\";s:12:\"focal_length\";s:1:\"0\";s:3:\"iso\";s:1:\"0\";s:13:\"shutter_speed\";s:1:\"0\";s:5:\"title\";s:0:\"\";s:11:\"orientation\";s:1:\"0\";s:8:\"keywords\";a:0:{}}}');
INSERT INTO `wp_postmeta` VALUES (292,76,'_wp_attached_file','2023/09/amenities-relax.jpg');
INSERT INTO `wp_postmeta` VALUES (293,76,'_wp_attachment_metadata','a:6:{s:5:\"width\";i:640;s:6:\"height\";i:640;s:4:\"file\";s:27:\"2023/09/amenities-relax.jpg\";s:8:\"filesize\";i:34626;s:5:\"sizes\";a:2:{s:6:\"medium\";a:5:{s:4:\"file\";s:27:\"amenities-relax-300x300.jpg\";s:5:\"width\";i:300;s:6:\"height\";i:300;s:9:\"mime-type\";s:10:\"image/jpeg\";s:8:\"filesize\";i:14728;}s:9:\"thumbnail\";a:5:{s:4:\"file\";s:27:\"amenities-relax-150x150.jpg\";s:5:\"width\";i:150;s:6:\"height\";i:150;s:9:\"mime-type\";s:10:\"image/jpeg\";s:8:\"filesize\";i:5399;}}s:10:\"image_meta\";a:12:{s:8:\"aperture\";s:1:\"0\";s:6:\"credit\";s:0:\"\";s:6:\"camera\";s:0:\"\";s:7:\"caption\";s:0:\"\";s:17:\"created_timestamp\";s:1:\"0\";s:9:\"copyright\";s:0:\"\";s:12:\"focal_length\";s:1:\"0\";s:3:\"iso\";s:1:\"0\";s:13:\"shutter_speed\";s:1:\"0\";s:5:\"title\";s:0:\"\";s:11:\"orientation\";s:1:\"0\";s:8:\"keywords\";a:0:{}}}');
INSERT INTO `wp_postmeta` VALUES (294,77,'_wp_attached_file','2023/09/amenities-unique-experiences.jpg');
INSERT INTO `wp_postmeta` VALUES (295,77,'_wp_attachment_metadata','a:6:{s:5:\"width\";i:640;s:6:\"height\";i:640;s:4:\"file\";s:40:\"2023/09/amenities-unique-experiences.jpg\";s:8:\"filesize\";i:60668;s:5:\"sizes\";a:2:{s:6:\"medium\";a:5:{s:4:\"file\";s:40:\"amenities-unique-experiences-300x300.jpg\";s:5:\"width\";i:300;s:6:\"height\";i:300;s:9:\"mime-type\";s:10:\"image/jpeg\";s:8:\"filesize\";i:24577;}s:9:\"thumbnail\";a:5:{s:4:\"file\";s:40:\"amenities-unique-experiences-150x150.jpg\";s:5:\"width\";i:150;s:6:\"height\";i:150;s:9:\"mime-type\";s:10:\"image/jpeg\";s:8:\"filesize\";i:7100;}}s:10:\"image_meta\";a:12:{s:8:\"aperture\";s:1:\"0\";s:6:\"credit\";s:0:\"\";s:6:\"camera\";s:0:\"\";s:7:\"caption\";s:0:\"\";s:17:\"created_timestamp\";s:1:\"0\";s:9:\"copyright\";s:0:\"\";s:12:\"focal_length\";s:1:\"0\";s:3:\"iso\";s:1:\"0\";s:13:\"shutter_speed\";s:1:\"0\";s:5:\"title\";s:0:\"\";s:11:\"orientation\";s:1:\"0\";s:8:\"keywords\";a:0:{}}}');
INSERT INTO `wp_postmeta` VALUES (296,78,'_wp_attached_file','2023/09/amenities-thumbnail.jpg');
INSERT INTO `wp_postmeta` VALUES (297,78,'_wp_attachment_metadata','a:6:{s:5:\"width\";i:320;s:6:\"height\";i:240;s:4:\"file\";s:31:\"2023/09/amenities-thumbnail.jpg\";s:8:\"filesize\";i:1067;s:5:\"sizes\";a:2:{s:6:\"medium\";a:5:{s:4:\"file\";s:31:\"amenities-thumbnail-300x225.jpg\";s:5:\"width\";i:300;s:6:\"height\";i:225;s:9:\"mime-type\";s:10:\"image/jpeg\";s:8:\"filesize\";i:2136;}s:9:\"thumbnail\";a:5:{s:4:\"file\";s:31:\"amenities-thumbnail-150x150.jpg\";s:5:\"width\";i:150;s:6:\"height\";i:150;s:9:\"mime-type\";s:10:\"image/jpeg\";s:8:\"filesize\";i:1278;}}s:10:\"image_meta\";a:12:{s:8:\"aperture\";s:1:\"0\";s:6:\"credit\";s:0:\"\";s:6:\"camera\";s:0:\"\";s:7:\"caption\";s:0:\"\";s:17:\"created_timestamp\";s:1:\"0\";s:9:\"copyright\";s:0:\"\";s:12:\"focal_length\";s:1:\"0\";s:3:\"iso\";s:1:\"0\";s:13:\"shutter_speed\";s:1:\"0\";s:5:\"title\";s:0:\"\";s:11:\"orientation\";s:1:\"0\";s:8:\"keywords\";a:0:{}}}');
INSERT INTO `wp_postmeta` VALUES (298,79,'_menu_item_type','post_type');
INSERT INTO `wp_postmeta` VALUES (299,79,'_menu_item_menu_item_parent','0');
INSERT INTO `wp_postmeta` VALUES (300,79,'_menu_item_object_id','43');
INSERT INTO `wp_postmeta` VALUES (301,79,'_menu_item_object','page');
INSERT INTO `wp_postmeta` VALUES (302,79,'_menu_item_target','');
INSERT INTO `wp_postmeta` VALUES (303,79,'_menu_item_classes','a:1:{i:0;s:0:\"\";}');
INSERT INTO `wp_postmeta` VALUES (304,79,'_menu_item_xfn','');
INSERT INTO `wp_postmeta` VALUES (305,79,'_menu_item_url','');
INSERT INTO `wp_postmeta` VALUES (307,80,'_menu_item_type','post_type');
INSERT INTO `wp_postmeta` VALUES (308,80,'_menu_item_menu_item_parent','0');
INSERT INTO `wp_postmeta` VALUES (309,80,'_menu_item_object_id','45');
INSERT INTO `wp_postmeta` VALUES (310,80,'_menu_item_object','page');
INSERT INTO `wp_postmeta` VALUES (311,80,'_menu_item_target','');
INSERT INTO `wp_postmeta` VALUES (312,80,'_menu_item_classes','a:1:{i:0;s:0:\"\";}');
INSERT INTO `wp_postmeta` VALUES (313,80,'_menu_item_xfn','');
INSERT INTO `wp_postmeta` VALUES (314,80,'_menu_item_url','');
INSERT INTO `wp_postmeta` VALUES (316,81,'_menu_item_type','post_type');
INSERT INTO `wp_postmeta` VALUES (317,81,'_menu_item_menu_item_parent','0');
INSERT INTO `wp_postmeta` VALUES (318,81,'_menu_item_object_id','49');
INSERT INTO `wp_postmeta` VALUES (319,81,'_menu_item_object','page');
INSERT INTO `wp_postmeta` VALUES (320,81,'_menu_item_target','');
INSERT INTO `wp_postmeta` VALUES (321,81,'_menu_item_classes','a:1:{i:0;s:0:\"\";}');
INSERT INTO `wp_postmeta` VALUES (322,81,'_menu_item_xfn','');
INSERT INTO `wp_postmeta` VALUES (323,81,'_menu_item_url','');
INSERT INTO `wp_postmeta` VALUES (325,82,'_menu_item_type','post_type');
INSERT INTO `wp_postmeta` VALUES (326,82,'_menu_item_menu_item_parent','0');
INSERT INTO `wp_postmeta` VALUES (327,82,'_menu_item_object_id','51');
INSERT INTO `wp_postmeta` VALUES (328,82,'_menu_item_object','page');
INSERT INTO `wp_postmeta` VALUES (329,82,'_menu_item_target','');
INSERT INTO `wp_postmeta` VALUES (330,82,'_menu_item_classes','a:1:{i:0;s:0:\"\";}');
INSERT INTO `wp_postmeta` VALUES (331,82,'_menu_item_xfn','');
INSERT INTO `wp_postmeta` VALUES (332,82,'_menu_item_url','');
INSERT INTO `wp_postmeta` VALUES (334,66,'_wp_old_date','2023-08-25');
INSERT INTO `wp_postmeta` VALUES (335,23,'_wp_old_date','2023-08-25');
INSERT INTO `wp_postmeta` VALUES (336,83,'_wp_attached_file','2023/09/food-container.jpg');
INSERT INTO `wp_postmeta` VALUES (337,83,'_wp_attachment_metadata','a:6:{s:5:\"width\";i:460;s:6:\"height\";i:280;s:4:\"file\";s:26:\"2023/09/food-container.jpg\";s:8:\"filesize\";i:69840;s:5:\"sizes\";a:2:{s:6:\"medium\";a:5:{s:4:\"file\";s:26:\"food-container-300x183.jpg\";s:5:\"width\";i:300;s:6:\"height\";i:183;s:9:\"mime-type\";s:10:\"image/jpeg\";s:8:\"filesize\";i:16919;}s:9:\"thumbnail\";a:5:{s:4:\"file\";s:26:\"food-container-150x150.jpg\";s:5:\"width\";i:150;s:6:\"height\";i:150;s:9:\"mime-type\";s:10:\"image/jpeg\";s:8:\"filesize\";i:7878;}}s:10:\"image_meta\";a:12:{s:8:\"aperture\";s:1:\"0\";s:6:\"credit\";s:0:\"\";s:6:\"camera\";s:0:\"\";s:7:\"caption\";s:0:\"\";s:17:\"created_timestamp\";s:1:\"0\";s:9:\"copyright\";s:0:\"\";s:12:\"focal_length\";s:1:\"0\";s:3:\"iso\";s:1:\"0\";s:13:\"shutter_speed\";s:1:\"0\";s:5:\"title\";s:0:\"\";s:11:\"orientation\";s:1:\"0\";s:8:\"keywords\";a:0:{}}}');
INSERT INTO `wp_postmeta` VALUES (338,84,'_wp_attached_file','2023/09/food-mercantile.jpg');
INSERT INTO `wp_postmeta` VALUES (339,84,'_wp_attachment_metadata','a:6:{s:5:\"width\";i:640;s:6:\"height\";i:640;s:4:\"file\";s:27:\"2023/09/food-mercantile.jpg\";s:8:\"filesize\";i:42057;s:5:\"sizes\";a:2:{s:6:\"medium\";a:5:{s:4:\"file\";s:27:\"food-mercantile-300x300.jpg\";s:5:\"width\";i:300;s:6:\"height\";i:300;s:9:\"mime-type\";s:10:\"image/jpeg\";s:8:\"filesize\";i:18953;}s:9:\"thumbnail\";a:5:{s:4:\"file\";s:27:\"food-mercantile-150x150.jpg\";s:5:\"width\";i:150;s:6:\"height\";i:150;s:9:\"mime-type\";s:10:\"image/jpeg\";s:8:\"filesize\";i:6535;}}s:10:\"image_meta\";a:12:{s:8:\"aperture\";s:1:\"0\";s:6:\"credit\";s:0:\"\";s:6:\"camera\";s:0:\"\";s:7:\"caption\";s:0:\"\";s:17:\"created_timestamp\";s:1:\"0\";s:9:\"copyright\";s:0:\"\";s:12:\"focal_length\";s:1:\"0\";s:3:\"iso\";s:1:\"0\";s:13:\"shutter_speed\";s:1:\"0\";s:5:\"title\";s:0:\"\";s:11:\"orientation\";s:1:\"0\";s:8:\"keywords\";a:0:{}}}');
INSERT INTO `wp_postmeta` VALUES (340,85,'_wp_attached_file','2023/09/food-oka-sita.jpg');
INSERT INTO `wp_postmeta` VALUES (341,85,'_wp_attachment_metadata','a:6:{s:5:\"width\";i:640;s:6:\"height\";i:640;s:4:\"file\";s:25:\"2023/09/food-oka-sita.jpg\";s:8:\"filesize\";i:20208;s:5:\"sizes\";a:2:{s:6:\"medium\";a:5:{s:4:\"file\";s:25:\"food-oka-sita-300x300.jpg\";s:5:\"width\";i:300;s:6:\"height\";i:300;s:9:\"mime-type\";s:10:\"image/jpeg\";s:8:\"filesize\";i:10966;}s:9:\"thumbnail\";a:5:{s:4:\"file\";s:25:\"food-oka-sita-150x150.jpg\";s:5:\"width\";i:150;s:6:\"height\";i:150;s:9:\"mime-type\";s:10:\"image/jpeg\";s:8:\"filesize\";i:4477;}}s:10:\"image_meta\";a:12:{s:8:\"aperture\";s:1:\"0\";s:6:\"credit\";s:0:\"\";s:6:\"camera\";s:0:\"\";s:7:\"caption\";s:0:\"\";s:17:\"created_timestamp\";s:1:\"0\";s:9:\"copyright\";s:0:\"\";s:12:\"focal_length\";s:1:\"0\";s:3:\"iso\";s:1:\"0\";s:13:\"shutter_speed\";s:1:\"0\";s:5:\"title\";s:0:\"\";s:11:\"orientation\";s:1:\"0\";s:8:\"keywords\";a:0:{}}}');
INSERT INTO `wp_postmeta` VALUES (342,86,'_wp_attached_file','2023/09/food-tuklo.jpg');
INSERT INTO `wp_postmeta` VALUES (343,86,'_wp_attachment_metadata','a:6:{s:5:\"width\";i:640;s:6:\"height\";i:640;s:4:\"file\";s:22:\"2023/09/food-tuklo.jpg\";s:8:\"filesize\";i:48470;s:5:\"sizes\";a:2:{s:6:\"medium\";a:5:{s:4:\"file\";s:22:\"food-tuklo-300x300.jpg\";s:5:\"width\";i:300;s:6:\"height\";i:300;s:9:\"mime-type\";s:10:\"image/jpeg\";s:8:\"filesize\";i:22782;}s:9:\"thumbnail\";a:5:{s:4:\"file\";s:22:\"food-tuklo-150x150.jpg\";s:5:\"width\";i:150;s:6:\"height\";i:150;s:9:\"mime-type\";s:10:\"image/jpeg\";s:8:\"filesize\";i:7915;}}s:10:\"image_meta\";a:12:{s:8:\"aperture\";s:1:\"0\";s:6:\"credit\";s:0:\"\";s:6:\"camera\";s:0:\"\";s:7:\"caption\";s:0:\"\";s:17:\"created_timestamp\";s:1:\"0\";s:9:\"copyright\";s:0:\"\";s:12:\"focal_length\";s:1:\"0\";s:3:\"iso\";s:1:\"0\";s:13:\"shutter_speed\";s:1:\"0\";s:5:\"title\";s:0:\"\";s:11:\"orientation\";s:1:\"0\";s:8:\"keywords\";a:0:{}}}');
INSERT INTO `wp_postmeta` VALUES (344,87,'_wp_attached_file','2023/09/event-placeholder-bg.jpg');
INSERT INTO `wp_postmeta` VALUES (345,87,'_wp_attachment_metadata','a:6:{s:5:\"width\";i:308;s:6:\"height\";i:474;s:4:\"file\";s:32:\"2023/09/event-placeholder-bg.jpg\";s:8:\"filesize\";i:1770;s:5:\"sizes\";a:2:{s:6:\"medium\";a:5:{s:4:\"file\";s:32:\"event-placeholder-bg-195x300.jpg\";s:5:\"width\";i:195;s:6:\"height\";i:300;s:9:\"mime-type\";s:10:\"image/jpeg\";s:8:\"filesize\";i:2133;}s:9:\"thumbnail\";a:5:{s:4:\"file\";s:32:\"event-placeholder-bg-150x150.jpg\";s:5:\"width\";i:150;s:6:\"height\";i:150;s:9:\"mime-type\";s:10:\"image/jpeg\";s:8:\"filesize\";i:1419;}}s:10:\"image_meta\";a:12:{s:8:\"aperture\";s:1:\"0\";s:6:\"credit\";s:0:\"\";s:6:\"camera\";s:0:\"\";s:7:\"caption\";s:0:\"\";s:17:\"created_timestamp\";s:1:\"0\";s:9:\"copyright\";s:0:\"\";s:12:\"focal_length\";s:1:\"0\";s:3:\"iso\";s:1:\"0\";s:13:\"shutter_speed\";s:1:\"0\";s:5:\"title\";s:0:\"\";s:11:\"orientation\";s:1:\"0\";s:8:\"keywords\";a:0:{}}}');
INSERT INTO `wp_postmeta` VALUES (346,88,'_wp_attached_file','2023/09/banner-bg.jpg');
INSERT INTO `wp_postmeta` VALUES (347,88,'_wp_attachment_metadata','a:6:{s:5:\"width\";i:1920;s:6:\"height\";i:614;s:4:\"file\";s:21:\"2023/09/banner-bg.jpg\";s:8:\"filesize\";i:8887;s:5:\"sizes\";a:5:{s:6:\"medium\";a:5:{s:4:\"file\";s:20:\"banner-bg-300x96.jpg\";s:5:\"width\";i:300;s:6:\"height\";i:96;s:9:\"mime-type\";s:10:\"image/jpeg\";s:8:\"filesize\";i:1463;}s:5:\"large\";a:5:{s:4:\"file\";s:22:\"banner-bg-1024x327.jpg\";s:5:\"width\";i:1024;s:6:\"height\";i:327;s:9:\"mime-type\";s:10:\"image/jpeg\";s:8:\"filesize\";i:7265;}s:9:\"thumbnail\";a:5:{s:4:\"file\";s:21:\"banner-bg-150x150.jpg\";s:5:\"width\";i:150;s:6:\"height\";i:150;s:9:\"mime-type\";s:10:\"image/jpeg\";s:8:\"filesize\";i:1634;}s:12:\"medium_large\";a:5:{s:4:\"file\";s:21:\"banner-bg-768x246.jpg\";s:5:\"width\";i:768;s:6:\"height\";i:246;s:9:\"mime-type\";s:10:\"image/jpeg\";s:8:\"filesize\";i:4610;}s:9:\"1536x1536\";a:5:{s:4:\"file\";s:22:\"banner-bg-1536x491.jpg\";s:5:\"width\";i:1536;s:6:\"height\";i:491;s:9:\"mime-type\";s:10:\"image/jpeg\";s:8:\"filesize\";i:14315;}}s:10:\"image_meta\";a:12:{s:8:\"aperture\";s:1:\"0\";s:6:\"credit\";s:0:\"\";s:6:\"camera\";s:0:\"\";s:7:\"caption\";s:0:\"\";s:17:\"created_timestamp\";s:1:\"0\";s:9:\"copyright\";s:0:\"\";s:12:\"focal_length\";s:1:\"0\";s:3:\"iso\";s:1:\"0\";s:13:\"shutter_speed\";s:1:\"0\";s:5:\"title\";s:0:\"\";s:11:\"orientation\";s:1:\"0\";s:8:\"keywords\";a:0:{}}}');
INSERT INTO `wp_postmeta` VALUES (348,89,'_wp_attached_file','2023/09/square-placeholder.jpg');
INSERT INTO `wp_postmeta` VALUES (349,89,'_wp_attachment_metadata','a:6:{s:5:\"width\";i:640;s:6:\"height\";i:640;s:4:\"file\";s:30:\"2023/09/square-placeholder.jpg\";s:8:\"filesize\";i:3433;s:5:\"sizes\";a:2:{s:6:\"medium\";a:5:{s:4:\"file\";s:30:\"square-placeholder-300x300.jpg\";s:5:\"width\";i:300;s:6:\"height\";i:300;s:9:\"mime-type\";s:10:\"image/jpeg\";s:8:\"filesize\";i:2584;}s:9:\"thumbnail\";a:5:{s:4:\"file\";s:30:\"square-placeholder-150x150.jpg\";s:5:\"width\";i:150;s:6:\"height\";i:150;s:9:\"mime-type\";s:10:\"image/jpeg\";s:8:\"filesize\";i:1279;}}s:10:\"image_meta\";a:12:{s:8:\"aperture\";s:1:\"0\";s:6:\"credit\";s:0:\"\";s:6:\"camera\";s:0:\"\";s:7:\"caption\";s:0:\"\";s:17:\"created_timestamp\";s:1:\"0\";s:9:\"copyright\";s:0:\"\";s:12:\"focal_length\";s:1:\"0\";s:3:\"iso\";s:1:\"0\";s:13:\"shutter_speed\";s:1:\"0\";s:5:\"title\";s:0:\"\";s:11:\"orientation\";s:1:\"0\";s:8:\"keywords\";a:0:{}}}');
INSERT INTO `wp_postmeta` VALUES (350,91,'_wp_attached_file','2023/09/things-to-do-fishing.jpg');
INSERT INTO `wp_postmeta` VALUES (351,91,'_wp_attachment_metadata','a:6:{s:5:\"width\";i:981;s:6:\"height\";i:592;s:4:\"file\";s:32:\"2023/09/things-to-do-fishing.jpg\";s:8:\"filesize\";i:80397;s:5:\"sizes\";a:3:{s:6:\"medium\";a:5:{s:4:\"file\";s:32:\"things-to-do-fishing-300x181.jpg\";s:5:\"width\";i:300;s:6:\"height\";i:181;s:9:\"mime-type\";s:10:\"image/jpeg\";s:8:\"filesize\";i:12910;}s:9:\"thumbnail\";a:5:{s:4:\"file\";s:32:\"things-to-do-fishing-150x150.jpg\";s:5:\"width\";i:150;s:6:\"height\";i:150;s:9:\"mime-type\";s:10:\"image/jpeg\";s:8:\"filesize\";i:6394;}s:12:\"medium_large\";a:5:{s:4:\"file\";s:32:\"things-to-do-fishing-768x463.jpg\";s:5:\"width\";i:768;s:6:\"height\";i:463;s:9:\"mime-type\";s:10:\"image/jpeg\";s:8:\"filesize\";i:52393;}}s:10:\"image_meta\";a:12:{s:8:\"aperture\";s:1:\"0\";s:6:\"credit\";s:0:\"\";s:6:\"camera\";s:0:\"\";s:7:\"caption\";s:0:\"\";s:17:\"created_timestamp\";s:1:\"0\";s:9:\"copyright\";s:0:\"\";s:12:\"focal_length\";s:1:\"0\";s:3:\"iso\";s:1:\"0\";s:13:\"shutter_speed\";s:1:\"0\";s:5:\"title\";s:0:\"\";s:11:\"orientation\";s:1:\"0\";s:8:\"keywords\";a:0:{}}}');
INSERT INTO `wp_postmeta` VALUES (352,92,'_wp_attached_file','2023/09/things-to-do-area-attractions-bg.jpg');
INSERT INTO `wp_postmeta` VALUES (353,92,'_wp_attachment_metadata','a:6:{s:5:\"width\";i:1920;s:6:\"height\";i:780;s:4:\"file\";s:44:\"2023/09/things-to-do-area-attractions-bg.jpg\";s:8:\"filesize\";i:248873;s:5:\"sizes\";a:5:{s:6:\"medium\";a:5:{s:4:\"file\";s:44:\"things-to-do-area-attractions-bg-300x122.jpg\";s:5:\"width\";i:300;s:6:\"height\";i:122;s:9:\"mime-type\";s:10:\"image/jpeg\";s:8:\"filesize\";i:9953;}s:5:\"large\";a:5:{s:4:\"file\";s:45:\"things-to-do-area-attractions-bg-1024x416.jpg\";s:5:\"width\";i:1024;s:6:\"height\";i:416;s:9:\"mime-type\";s:10:\"image/jpeg\";s:8:\"filesize\";i:77635;}s:9:\"thumbnail\";a:5:{s:4:\"file\";s:44:\"things-to-do-area-attractions-bg-150x150.jpg\";s:5:\"width\";i:150;s:6:\"height\";i:150;s:9:\"mime-type\";s:10:\"image/jpeg\";s:8:\"filesize\";i:6149;}s:12:\"medium_large\";a:5:{s:4:\"file\";s:44:\"things-to-do-area-attractions-bg-768x312.jpg\";s:5:\"width\";i:768;s:6:\"height\";i:312;s:9:\"mime-type\";s:10:\"image/jpeg\";s:8:\"filesize\";i:47863;}s:9:\"1536x1536\";a:5:{s:4:\"file\";s:45:\"things-to-do-area-attractions-bg-1536x624.jpg\";s:5:\"width\";i:1536;s:6:\"height\";i:624;s:9:\"mime-type\";s:10:\"image/jpeg\";s:8:\"filesize\";i:150792;}}s:10:\"image_meta\";a:12:{s:8:\"aperture\";s:1:\"0\";s:6:\"credit\";s:0:\"\";s:6:\"camera\";s:0:\"\";s:7:\"caption\";s:0:\"\";s:17:\"created_timestamp\";s:1:\"0\";s:9:\"copyright\";s:0:\"\";s:12:\"focal_length\";s:1:\"0\";s:3:\"iso\";s:1:\"0\";s:13:\"shutter_speed\";s:1:\"0\";s:5:\"title\";s:0:\"\";s:11:\"orientation\";s:1:\"0\";s:8:\"keywords\";a:0:{}}}');
INSERT INTO `wp_postmeta` VALUES (354,93,'_wp_attached_file','2023/09/things-to-do-excursions.jpg');
INSERT INTO `wp_postmeta` VALUES (355,93,'_wp_attachment_metadata','a:6:{s:5:\"width\";i:640;s:6:\"height\";i:640;s:4:\"file\";s:35:\"2023/09/things-to-do-excursions.jpg\";s:8:\"filesize\";i:55569;s:5:\"sizes\";a:2:{s:6:\"medium\";a:5:{s:4:\"file\";s:35:\"things-to-do-excursions-300x300.jpg\";s:5:\"width\";i:300;s:6:\"height\";i:300;s:9:\"mime-type\";s:10:\"image/jpeg\";s:8:\"filesize\";i:23308;}s:9:\"thumbnail\";a:5:{s:4:\"file\";s:35:\"things-to-do-excursions-150x150.jpg\";s:5:\"width\";i:150;s:6:\"height\";i:150;s:9:\"mime-type\";s:10:\"image/jpeg\";s:8:\"filesize\";i:6952;}}s:10:\"image_meta\";a:12:{s:8:\"aperture\";s:1:\"0\";s:6:\"credit\";s:0:\"\";s:6:\"camera\";s:0:\"\";s:7:\"caption\";s:0:\"\";s:17:\"created_timestamp\";s:1:\"0\";s:9:\"copyright\";s:0:\"\";s:12:\"focal_length\";s:1:\"0\";s:3:\"iso\";s:1:\"0\";s:13:\"shutter_speed\";s:1:\"0\";s:5:\"title\";s:0:\"\";s:11:\"orientation\";s:1:\"0\";s:8:\"keywords\";a:0:{}}}');
INSERT INTO `wp_postmeta` VALUES (356,94,'_wp_attached_file','2023/09/things-to-do-nature-adventures.jpg');
INSERT INTO `wp_postmeta` VALUES (357,94,'_wp_attachment_metadata','a:6:{s:5:\"width\";i:640;s:6:\"height\";i:640;s:4:\"file\";s:42:\"2023/09/things-to-do-nature-adventures.jpg\";s:8:\"filesize\";i:87047;s:5:\"sizes\";a:2:{s:6:\"medium\";a:5:{s:4:\"file\";s:42:\"things-to-do-nature-adventures-300x300.jpg\";s:5:\"width\";i:300;s:6:\"height\";i:300;s:9:\"mime-type\";s:10:\"image/jpeg\";s:8:\"filesize\";i:23006;}s:9:\"thumbnail\";a:5:{s:4:\"file\";s:42:\"things-to-do-nature-adventures-150x150.jpg\";s:5:\"width\";i:150;s:6:\"height\";i:150;s:9:\"mime-type\";s:10:\"image/jpeg\";s:8:\"filesize\";i:6640;}}s:10:\"image_meta\";a:12:{s:8:\"aperture\";s:1:\"0\";s:6:\"credit\";s:0:\"\";s:6:\"camera\";s:0:\"\";s:7:\"caption\";s:0:\"\";s:17:\"created_timestamp\";s:1:\"0\";s:9:\"copyright\";s:0:\"\";s:12:\"focal_length\";s:1:\"0\";s:3:\"iso\";s:1:\"0\";s:13:\"shutter_speed\";s:1:\"0\";s:5:\"title\";s:0:\"\";s:11:\"orientation\";s:1:\"0\";s:8:\"keywords\";a:0:{}}}');
INSERT INTO `wp_postmeta` VALUES (358,95,'_wp_attached_file','2023/09/things-to-do-water-adventures.jpg');
INSERT INTO `wp_postmeta` VALUES (359,95,'_wp_attachment_metadata','a:6:{s:5:\"width\";i:640;s:6:\"height\";i:640;s:4:\"file\";s:41:\"2023/09/things-to-do-water-adventures.jpg\";s:8:\"filesize\";i:34985;s:5:\"sizes\";a:2:{s:6:\"medium\";a:5:{s:4:\"file\";s:41:\"things-to-do-water-adventures-300x300.jpg\";s:5:\"width\";i:300;s:6:\"height\";i:300;s:9:\"mime-type\";s:10:\"image/jpeg\";s:8:\"filesize\";i:17562;}s:9:\"thumbnail\";a:5:{s:4:\"file\";s:41:\"things-to-do-water-adventures-150x150.jpg\";s:5:\"width\";i:150;s:6:\"height\";i:150;s:9:\"mime-type\";s:10:\"image/jpeg\";s:8:\"filesize\";i:6282;}}s:10:\"image_meta\";a:12:{s:8:\"aperture\";s:1:\"0\";s:6:\"credit\";s:0:\"\";s:6:\"camera\";s:0:\"\";s:7:\"caption\";s:0:\"\";s:17:\"created_timestamp\";s:1:\"0\";s:9:\"copyright\";s:0:\"\";s:12:\"focal_length\";s:1:\"0\";s:3:\"iso\";s:1:\"0\";s:13:\"shutter_speed\";s:1:\"0\";s:5:\"title\";s:0:\"\";s:11:\"orientation\";s:1:\"0\";s:8:\"keywords\";a:0:{}}}');
INSERT INTO `wp_postmeta` VALUES (360,96,'_wp_attached_file','2023/09/mercantile-call-to-action-placeholder.jpg');
INSERT INTO `wp_postmeta` VALUES (361,96,'_wp_attachment_metadata','a:6:{s:5:\"width\";i:402;s:6:\"height\";i:253;s:4:\"file\";s:49:\"2023/09/mercantile-call-to-action-placeholder.jpg\";s:8:\"filesize\";i:1298;s:5:\"sizes\";a:2:{s:6:\"medium\";a:5:{s:4:\"file\";s:49:\"mercantile-call-to-action-placeholder-300x189.jpg\";s:5:\"width\";i:300;s:6:\"height\";i:189;s:9:\"mime-type\";s:10:\"image/jpeg\";s:8:\"filesize\";i:1920;}s:9:\"thumbnail\";a:5:{s:4:\"file\";s:49:\"mercantile-call-to-action-placeholder-150x150.jpg\";s:5:\"width\";i:150;s:6:\"height\";i:150;s:9:\"mime-type\";s:10:\"image/jpeg\";s:8:\"filesize\";i:1307;}}s:10:\"image_meta\";a:12:{s:8:\"aperture\";s:1:\"0\";s:6:\"credit\";s:0:\"\";s:6:\"camera\";s:0:\"\";s:7:\"caption\";s:0:\"\";s:17:\"created_timestamp\";s:1:\"0\";s:9:\"copyright\";s:0:\"\";s:12:\"focal_length\";s:1:\"0\";s:3:\"iso\";s:1:\"0\";s:13:\"shutter_speed\";s:1:\"0\";s:5:\"title\";s:0:\"\";s:11:\"orientation\";s:1:\"0\";s:8:\"keywords\";a:0:{}}}');
INSERT INTO `wp_postmeta` VALUES (362,97,'_wp_attached_file','2023/09/eat-and-drink-header.jpg');
INSERT INTO `wp_postmeta` VALUES (363,97,'_wp_attachment_metadata','a:6:{s:5:\"width\";i:1920;s:6:\"height\";i:1080;s:4:\"file\";s:32:\"2023/09/eat-and-drink-header.jpg\";s:8:\"filesize\";i:84670;s:5:\"sizes\";a:5:{s:6:\"medium\";a:5:{s:4:\"file\";s:32:\"eat-and-drink-header-300x169.jpg\";s:5:\"width\";i:300;s:6:\"height\";i:169;s:9:\"mime-type\";s:10:\"image/jpeg\";s:8:\"filesize\";i:9871;}s:5:\"large\";a:5:{s:4:\"file\";s:33:\"eat-and-drink-header-1024x576.jpg\";s:5:\"width\";i:1024;s:6:\"height\";i:576;s:9:\"mime-type\";s:10:\"image/jpeg\";s:8:\"filesize\";i:52715;}s:9:\"thumbnail\";a:5:{s:4:\"file\";s:32:\"eat-and-drink-header-150x150.jpg\";s:5:\"width\";i:150;s:6:\"height\";i:150;s:9:\"mime-type\";s:10:\"image/jpeg\";s:8:\"filesize\";i:5676;}s:12:\"medium_large\";a:5:{s:4:\"file\";s:32:\"eat-and-drink-header-768x432.jpg\";s:5:\"width\";i:768;s:6:\"height\";i:432;s:9:\"mime-type\";s:10:\"image/jpeg\";s:8:\"filesize\";i:34588;}s:9:\"1536x1536\";a:5:{s:4:\"file\";s:33:\"eat-and-drink-header-1536x864.jpg\";s:5:\"width\";i:1536;s:6:\"height\";i:864;s:9:\"mime-type\";s:10:\"image/jpeg\";s:8:\"filesize\";i:91692;}}s:10:\"image_meta\";a:12:{s:8:\"aperture\";s:1:\"0\";s:6:\"credit\";s:0:\"\";s:6:\"camera\";s:0:\"\";s:7:\"caption\";s:0:\"\";s:17:\"created_timestamp\";s:1:\"0\";s:9:\"copyright\";s:0:\"\";s:12:\"focal_length\";s:1:\"0\";s:3:\"iso\";s:1:\"0\";s:13:\"shutter_speed\";s:1:\"0\";s:5:\"title\";s:0:\"\";s:11:\"orientation\";s:1:\"0\";s:8:\"keywords\";a:0:{}}}');
INSERT INTO `wp_postmeta` VALUES (364,98,'_wp_attached_file','2023/09/entertainment-header.jpg');
INSERT INTO `wp_postmeta` VALUES (365,98,'_wp_attachment_metadata','a:6:{s:5:\"width\";i:1920;s:6:\"height\";i:1080;s:4:\"file\";s:32:\"2023/09/entertainment-header.jpg\";s:8:\"filesize\";i:85127;s:5:\"sizes\";a:5:{s:6:\"medium\";a:5:{s:4:\"file\";s:32:\"entertainment-header-300x169.jpg\";s:5:\"width\";i:300;s:6:\"height\";i:169;s:9:\"mime-type\";s:10:\"image/jpeg\";s:8:\"filesize\";i:9994;}s:5:\"large\";a:5:{s:4:\"file\";s:33:\"entertainment-header-1024x576.jpg\";s:5:\"width\";i:1024;s:6:\"height\";i:576;s:9:\"mime-type\";s:10:\"image/jpeg\";s:8:\"filesize\";i:52276;}s:9:\"thumbnail\";a:5:{s:4:\"file\";s:32:\"entertainment-header-150x150.jpg\";s:5:\"width\";i:150;s:6:\"height\";i:150;s:9:\"mime-type\";s:10:\"image/jpeg\";s:8:\"filesize\";i:4647;}s:12:\"medium_large\";a:5:{s:4:\"file\";s:32:\"entertainment-header-768x432.jpg\";s:5:\"width\";i:768;s:6:\"height\";i:432;s:9:\"mime-type\";s:10:\"image/jpeg\";s:8:\"filesize\";i:35257;}s:9:\"1536x1536\";a:5:{s:4:\"file\";s:33:\"entertainment-header-1536x864.jpg\";s:5:\"width\";i:1536;s:6:\"height\";i:864;s:9:\"mime-type\";s:10:\"image/jpeg\";s:8:\"filesize\";i:90558;}}s:10:\"image_meta\";a:12:{s:8:\"aperture\";s:1:\"0\";s:6:\"credit\";s:0:\"\";s:6:\"camera\";s:0:\"\";s:7:\"caption\";s:0:\"\";s:17:\"created_timestamp\";s:1:\"0\";s:9:\"copyright\";s:0:\"\";s:12:\"focal_length\";s:1:\"0\";s:3:\"iso\";s:1:\"0\";s:13:\"shutter_speed\";s:1:\"0\";s:5:\"title\";s:0:\"\";s:11:\"orientation\";s:1:\"0\";s:8:\"keywords\";a:0:{}}}');
INSERT INTO `wp_postmeta` VALUES (366,99,'_wp_attached_file','2023/09/mercantile-header.jpg');
INSERT INTO `wp_postmeta` VALUES (367,99,'_wp_attachment_metadata','a:6:{s:5:\"width\";i:1920;s:6:\"height\";i:1080;s:4:\"file\";s:29:\"2023/09/mercantile-header.jpg\";s:8:\"filesize\";i:165867;s:5:\"sizes\";a:5:{s:6:\"medium\";a:5:{s:4:\"file\";s:29:\"mercantile-header-300x169.jpg\";s:5:\"width\";i:300;s:6:\"height\";i:169;s:9:\"mime-type\";s:10:\"image/jpeg\";s:8:\"filesize\";i:17843;}s:5:\"large\";a:5:{s:4:\"file\";s:30:\"mercantile-header-1024x576.jpg\";s:5:\"width\";i:1024;s:6:\"height\";i:576;s:9:\"mime-type\";s:10:\"image/jpeg\";s:8:\"filesize\";i:104214;}s:9:\"thumbnail\";a:5:{s:4:\"file\";s:29:\"mercantile-header-150x150.jpg\";s:5:\"width\";i:150;s:6:\"height\";i:150;s:9:\"mime-type\";s:10:\"image/jpeg\";s:8:\"filesize\";i:9041;}s:12:\"medium_large\";a:5:{s:4:\"file\";s:29:\"mercantile-header-768x432.jpg\";s:5:\"width\";i:768;s:6:\"height\";i:432;s:9:\"mime-type\";s:10:\"image/jpeg\";s:8:\"filesize\";i:68869;}s:9:\"1536x1536\";a:5:{s:4:\"file\";s:30:\"mercantile-header-1536x864.jpg\";s:5:\"width\";i:1536;s:6:\"height\";i:864;s:9:\"mime-type\";s:10:\"image/jpeg\";s:8:\"filesize\";i:182693;}}s:10:\"image_meta\";a:12:{s:8:\"aperture\";s:1:\"0\";s:6:\"credit\";s:0:\"\";s:6:\"camera\";s:0:\"\";s:7:\"caption\";s:0:\"\";s:17:\"created_timestamp\";s:1:\"0\";s:9:\"copyright\";s:0:\"\";s:12:\"focal_length\";s:1:\"0\";s:3:\"iso\";s:1:\"0\";s:13:\"shutter_speed\";s:1:\"0\";s:5:\"title\";s:0:\"\";s:11:\"orientation\";s:1:\"0\";s:8:\"keywords\";a:0:{}}}');
INSERT INTO `wp_postmeta` VALUES (368,100,'_wp_attached_file','2023/09/things-to-do-header.jpg');
INSERT INTO `wp_postmeta` VALUES (369,100,'_wp_attachment_metadata','a:6:{s:5:\"width\";i:1920;s:6:\"height\";i:1080;s:4:\"file\";s:31:\"2023/09/things-to-do-header.jpg\";s:8:\"filesize\";i:161185;s:5:\"sizes\";a:5:{s:6:\"medium\";a:5:{s:4:\"file\";s:31:\"things-to-do-header-300x169.jpg\";s:5:\"width\";i:300;s:6:\"height\";i:169;s:9:\"mime-type\";s:10:\"image/jpeg\";s:8:\"filesize\";i:13933;}s:5:\"large\";a:5:{s:4:\"file\";s:32:\"things-to-do-header-1024x576.jpg\";s:5:\"width\";i:1024;s:6:\"height\";i:576;s:9:\"mime-type\";s:10:\"image/jpeg\";s:8:\"filesize\";i:91763;}s:9:\"thumbnail\";a:5:{s:4:\"file\";s:31:\"things-to-do-header-150x150.jpg\";s:5:\"width\";i:150;s:6:\"height\";i:150;s:9:\"mime-type\";s:10:\"image/jpeg\";s:8:\"filesize\";i:7565;}s:12:\"medium_large\";a:5:{s:4:\"file\";s:31:\"things-to-do-header-768x432.jpg\";s:5:\"width\";i:768;s:6:\"height\";i:432;s:9:\"mime-type\";s:10:\"image/jpeg\";s:8:\"filesize\";i:59836;}s:9:\"1536x1536\";a:5:{s:4:\"file\";s:32:\"things-to-do-header-1536x864.jpg\";s:5:\"width\";i:1536;s:6:\"height\";i:864;s:9:\"mime-type\";s:10:\"image/jpeg\";s:8:\"filesize\";i:161141;}}s:10:\"image_meta\";a:12:{s:8:\"aperture\";s:1:\"0\";s:6:\"credit\";s:0:\"\";s:6:\"camera\";s:0:\"\";s:7:\"caption\";s:0:\"\";s:17:\"created_timestamp\";s:1:\"0\";s:9:\"copyright\";s:0:\"\";s:12:\"focal_length\";s:1:\"0\";s:3:\"iso\";s:1:\"0\";s:13:\"shutter_speed\";s:1:\"0\";s:5:\"title\";s:0:\"\";s:11:\"orientation\";s:1:\"0\";s:8:\"keywords\";a:0:{}}}');
INSERT INTO `wp_postmeta` VALUES (370,101,'_wp_attached_file','2023/09/stay-header.jpg');
INSERT INTO `wp_postmeta` VALUES (371,101,'_wp_attachment_metadata','a:6:{s:5:\"width\";i:1920;s:6:\"height\";i:1080;s:4:\"file\";s:23:\"2023/09/stay-header.jpg\";s:8:\"filesize\";i:209616;s:5:\"sizes\";a:5:{s:6:\"medium\";a:5:{s:4:\"file\";s:23:\"stay-header-300x169.jpg\";s:5:\"width\";i:300;s:6:\"height\";i:169;s:9:\"mime-type\";s:10:\"image/jpeg\";s:8:\"filesize\";i:14597;}s:5:\"large\";a:5:{s:4:\"file\";s:24:\"stay-header-1024x576.jpg\";s:5:\"width\";i:1024;s:6:\"height\";i:576;s:9:\"mime-type\";s:10:\"image/jpeg\";s:8:\"filesize\";i:108951;}s:9:\"thumbnail\";a:5:{s:4:\"file\";s:23:\"stay-header-150x150.jpg\";s:5:\"width\";i:150;s:6:\"height\";i:150;s:9:\"mime-type\";s:10:\"image/jpeg\";s:8:\"filesize\";i:7694;}s:12:\"medium_large\";a:5:{s:4:\"file\";s:23:\"stay-header-768x432.jpg\";s:5:\"width\";i:768;s:6:\"height\";i:432;s:9:\"mime-type\";s:10:\"image/jpeg\";s:8:\"filesize\";i:69332;}s:9:\"1536x1536\";a:5:{s:4:\"file\";s:24:\"stay-header-1536x864.jpg\";s:5:\"width\";i:1536;s:6:\"height\";i:864;s:9:\"mime-type\";s:10:\"image/jpeg\";s:8:\"filesize\";i:203342;}}s:10:\"image_meta\";a:12:{s:8:\"aperture\";s:1:\"0\";s:6:\"credit\";s:0:\"\";s:6:\"camera\";s:0:\"\";s:7:\"caption\";s:0:\"\";s:17:\"created_timestamp\";s:1:\"0\";s:9:\"copyright\";s:0:\"\";s:12:\"focal_length\";s:1:\"0\";s:3:\"iso\";s:1:\"0\";s:13:\"shutter_speed\";s:1:\"0\";s:5:\"title\";s:0:\"\";s:11:\"orientation\";s:1:\"0\";s:8:\"keywords\";a:0:{}}}');
INSERT INTO `wp_postmeta` VALUES (372,102,'_menu_item_type','custom');
INSERT INTO `wp_postmeta` VALUES (373,102,'_menu_item_menu_item_parent','66');
INSERT INTO `wp_postmeta` VALUES (374,102,'_menu_item_object_id','102');
INSERT INTO `wp_postmeta` VALUES (375,102,'_menu_item_object','custom');
INSERT INTO `wp_postmeta` VALUES (376,102,'_menu_item_target','');
INSERT INTO `wp_postmeta` VALUES (377,102,'_menu_item_classes','a:1:{i:0;s:0:\"\";}');
INSERT INTO `wp_postmeta` VALUES (378,102,'_menu_item_xfn','');
INSERT INTO `wp_postmeta` VALUES (379,102,'_menu_item_url','#');
INSERT INTO `wp_postmeta` VALUES (381,103,'_menu_item_type','custom');
INSERT INTO `wp_postmeta` VALUES (382,103,'_menu_item_menu_item_parent','66');
INSERT INTO `wp_postmeta` VALUES (383,103,'_menu_item_object_id','103');
INSERT INTO `wp_postmeta` VALUES (384,103,'_menu_item_object','custom');
INSERT INTO `wp_postmeta` VALUES (385,103,'_menu_item_target','');
INSERT INTO `wp_postmeta` VALUES (386,103,'_menu_item_classes','a:1:{i:0;s:0:\"\";}');
INSERT INTO `wp_postmeta` VALUES (387,103,'_menu_item_xfn','');
INSERT INTO `wp_postmeta` VALUES (388,103,'_menu_item_url','#');
INSERT INTO `wp_postmeta` VALUES (390,104,'_menu_item_type','custom');
INSERT INTO `wp_postmeta` VALUES (391,104,'_menu_item_menu_item_parent','66');
INSERT INTO `wp_postmeta` VALUES (392,104,'_menu_item_object_id','104');
INSERT INTO `wp_postmeta` VALUES (393,104,'_menu_item_object','custom');
INSERT INTO `wp_postmeta` VALUES (394,104,'_menu_item_target','');
INSERT INTO `wp_postmeta` VALUES (395,104,'_menu_item_classes','a:1:{i:0;s:0:\"\";}');
INSERT INTO `wp_postmeta` VALUES (396,104,'_menu_item_xfn','');
INSERT INTO `wp_postmeta` VALUES (397,104,'_menu_item_url','#');
INSERT INTO `wp_postmeta` VALUES (399,105,'_menu_item_type','custom');
INSERT INTO `wp_postmeta` VALUES (400,105,'_menu_item_menu_item_parent','102');
INSERT INTO `wp_postmeta` VALUES (401,105,'_menu_item_object_id','105');
INSERT INTO `wp_postmeta` VALUES (402,105,'_menu_item_object','custom');
INSERT INTO `wp_postmeta` VALUES (403,105,'_menu_item_target','');
INSERT INTO `wp_postmeta` VALUES (404,105,'_menu_item_classes','a:1:{i:0;s:0:\"\";}');
INSERT INTO `wp_postmeta` VALUES (405,105,'_menu_item_xfn','');
INSERT INTO `wp_postmeta` VALUES (406,105,'_menu_item_url','#');
INSERT INTO `wp_postmeta` VALUES (408,106,'_menu_item_type','custom');
INSERT INTO `wp_postmeta` VALUES (409,106,'_menu_item_menu_item_parent','102');
INSERT INTO `wp_postmeta` VALUES (410,106,'_menu_item_object_id','106');
INSERT INTO `wp_postmeta` VALUES (411,106,'_menu_item_object','custom');
INSERT INTO `wp_postmeta` VALUES (412,106,'_menu_item_target','');
INSERT INTO `wp_postmeta` VALUES (413,106,'_menu_item_classes','a:1:{i:0;s:0:\"\";}');
INSERT INTO `wp_postmeta` VALUES (414,106,'_menu_item_xfn','');
INSERT INTO `wp_postmeta` VALUES (415,106,'_menu_item_url','#');
INSERT INTO `wp_postmeta` VALUES (417,107,'_menu_item_type','custom');
INSERT INTO `wp_postmeta` VALUES (418,107,'_menu_item_menu_item_parent','102');
INSERT INTO `wp_postmeta` VALUES (419,107,'_menu_item_object_id','107');
INSERT INTO `wp_postmeta` VALUES (420,107,'_menu_item_object','custom');
INSERT INTO `wp_postmeta` VALUES (421,107,'_menu_item_target','');
INSERT INTO `wp_postmeta` VALUES (422,107,'_menu_item_classes','a:1:{i:0;s:0:\"\";}');
INSERT INTO `wp_postmeta` VALUES (423,107,'_menu_item_xfn','');
INSERT INTO `wp_postmeta` VALUES (424,107,'_menu_item_url','#');
INSERT INTO `wp_postmeta` VALUES (426,108,'_menu_item_type','custom');
INSERT INTO `wp_postmeta` VALUES (427,108,'_menu_item_menu_item_parent','102');
INSERT INTO `wp_postmeta` VALUES (428,108,'_menu_item_object_id','108');
INSERT INTO `wp_postmeta` VALUES (429,108,'_menu_item_object','custom');
INSERT INTO `wp_postmeta` VALUES (430,108,'_menu_item_target','');
INSERT INTO `wp_postmeta` VALUES (431,108,'_menu_item_classes','a:1:{i:0;s:0:\"\";}');
INSERT INTO `wp_postmeta` VALUES (432,108,'_menu_item_xfn','');
INSERT INTO `wp_postmeta` VALUES (433,108,'_menu_item_url','#');
INSERT INTO `wp_postmeta` VALUES (435,66,'_wp_old_date','2023-09-15');
INSERT INTO `wp_postmeta` VALUES (436,79,'_wp_old_date','2023-09-15');
INSERT INTO `wp_postmeta` VALUES (437,80,'_wp_old_date','2023-09-15');
INSERT INTO `wp_postmeta` VALUES (438,81,'_wp_old_date','2023-09-15');
INSERT INTO `wp_postmeta` VALUES (439,82,'_wp_old_date','2023-09-15');
INSERT INTO `wp_postmeta` VALUES (440,23,'_wp_old_date','2023-09-15');
INSERT INTO `wp_postmeta` VALUES (441,109,'_menu_item_type','custom');
INSERT INTO `wp_postmeta` VALUES (442,109,'_menu_item_menu_item_parent','103');
INSERT INTO `wp_postmeta` VALUES (443,109,'_menu_item_object_id','109');
INSERT INTO `wp_postmeta` VALUES (444,109,'_menu_item_object','custom');
INSERT INTO `wp_postmeta` VALUES (445,109,'_menu_item_target','');
INSERT INTO `wp_postmeta` VALUES (446,109,'_menu_item_classes','a:1:{i:0;s:0:\"\";}');
INSERT INTO `wp_postmeta` VALUES (447,109,'_menu_item_xfn','');
INSERT INTO `wp_postmeta` VALUES (448,109,'_menu_item_url','#');
INSERT INTO `wp_postmeta` VALUES (450,110,'_menu_item_type','custom');
INSERT INTO `wp_postmeta` VALUES (451,110,'_menu_item_menu_item_parent','103');
INSERT INTO `wp_postmeta` VALUES (452,110,'_menu_item_object_id','110');
INSERT INTO `wp_postmeta` VALUES (453,110,'_menu_item_object','custom');
INSERT INTO `wp_postmeta` VALUES (454,110,'_menu_item_target','');
INSERT INTO `wp_postmeta` VALUES (455,110,'_menu_item_classes','a:1:{i:0;s:0:\"\";}');
INSERT INTO `wp_postmeta` VALUES (456,110,'_menu_item_xfn','');
INSERT INTO `wp_postmeta` VALUES (457,110,'_menu_item_url','#');
INSERT INTO `wp_postmeta` VALUES (459,111,'_menu_item_type','custom');
INSERT INTO `wp_postmeta` VALUES (460,111,'_menu_item_menu_item_parent','103');
INSERT INTO `wp_postmeta` VALUES (461,111,'_menu_item_object_id','111');
INSERT INTO `wp_postmeta` VALUES (462,111,'_menu_item_object','custom');
INSERT INTO `wp_postmeta` VALUES (463,111,'_menu_item_target','');
INSERT INTO `wp_postmeta` VALUES (464,111,'_menu_item_classes','a:1:{i:0;s:0:\"\";}');
INSERT INTO `wp_postmeta` VALUES (465,111,'_menu_item_xfn','');
INSERT INTO `wp_postmeta` VALUES (466,111,'_menu_item_url','#');
INSERT INTO `wp_postmeta` VALUES (468,112,'_menu_item_type','custom');
INSERT INTO `wp_postmeta` VALUES (469,112,'_menu_item_menu_item_parent','103');
INSERT INTO `wp_postmeta` VALUES (470,112,'_menu_item_object_id','112');
INSERT INTO `wp_postmeta` VALUES (471,112,'_menu_item_object','custom');
INSERT INTO `wp_postmeta` VALUES (472,112,'_menu_item_target','');
INSERT INTO `wp_postmeta` VALUES (473,112,'_menu_item_classes','a:1:{i:0;s:0:\"\";}');
INSERT INTO `wp_postmeta` VALUES (474,112,'_menu_item_xfn','');
INSERT INTO `wp_postmeta` VALUES (475,112,'_menu_item_url','#');
INSERT INTO `wp_postmeta` VALUES (477,113,'_menu_item_type','custom');
INSERT INTO `wp_postmeta` VALUES (478,113,'_menu_item_menu_item_parent','104');
INSERT INTO `wp_postmeta` VALUES (479,113,'_menu_item_object_id','113');
INSERT INTO `wp_postmeta` VALUES (480,113,'_menu_item_object','custom');
INSERT INTO `wp_postmeta` VALUES (481,113,'_menu_item_target','');
INSERT INTO `wp_postmeta` VALUES (482,113,'_menu_item_classes','a:1:{i:0;s:0:\"\";}');
INSERT INTO `wp_postmeta` VALUES (483,113,'_menu_item_xfn','');
INSERT INTO `wp_postmeta` VALUES (484,113,'_menu_item_url','#');
INSERT INTO `wp_postmeta` VALUES (486,114,'_menu_item_type','custom');
INSERT INTO `wp_postmeta` VALUES (487,114,'_menu_item_menu_item_parent','104');
INSERT INTO `wp_postmeta` VALUES (488,114,'_menu_item_object_id','114');
INSERT INTO `wp_postmeta` VALUES (489,114,'_menu_item_object','custom');
INSERT INTO `wp_postmeta` VALUES (490,114,'_menu_item_target','');
INSERT INTO `wp_postmeta` VALUES (491,114,'_menu_item_classes','a:1:{i:0;s:0:\"\";}');
INSERT INTO `wp_postmeta` VALUES (492,114,'_menu_item_xfn','');
INSERT INTO `wp_postmeta` VALUES (493,114,'_menu_item_url','#');
INSERT INTO `wp_postmeta` VALUES (495,115,'_menu_item_type','custom');
INSERT INTO `wp_postmeta` VALUES (496,115,'_menu_item_menu_item_parent','104');
INSERT INTO `wp_postmeta` VALUES (497,115,'_menu_item_object_id','115');
INSERT INTO `wp_postmeta` VALUES (498,115,'_menu_item_object','custom');
INSERT INTO `wp_postmeta` VALUES (499,115,'_menu_item_target','');
INSERT INTO `wp_postmeta` VALUES (500,115,'_menu_item_classes','a:1:{i:0;s:0:\"\";}');
INSERT INTO `wp_postmeta` VALUES (501,115,'_menu_item_xfn','');
INSERT INTO `wp_postmeta` VALUES (502,115,'_menu_item_url','#');
INSERT INTO `wp_postmeta` VALUES (504,116,'_menu_item_type','custom');
INSERT INTO `wp_postmeta` VALUES (505,116,'_menu_item_menu_item_parent','104');
INSERT INTO `wp_postmeta` VALUES (506,116,'_menu_item_object_id','116');
INSERT INTO `wp_postmeta` VALUES (507,116,'_menu_item_object','custom');
INSERT INTO `wp_postmeta` VALUES (508,116,'_menu_item_target','');
INSERT INTO `wp_postmeta` VALUES (509,116,'_menu_item_classes','a:1:{i:0;s:0:\"\";}');
INSERT INTO `wp_postmeta` VALUES (510,116,'_menu_item_xfn','');
INSERT INTO `wp_postmeta` VALUES (511,116,'_menu_item_url','#');
INSERT INTO `wp_postmeta` VALUES (513,117,'_edit_last','1');
INSERT INTO `wp_postmeta` VALUES (514,117,'_edit_lock','1695324527:1');
INSERT INTO `wp_postmeta` VALUES (524,66,'_wp_old_date','2023-09-20');
INSERT INTO `wp_postmeta` VALUES (525,102,'_wp_old_date','2023-09-20');
INSERT INTO `wp_postmeta` VALUES (526,105,'_wp_old_date','2023-09-20');
INSERT INTO `wp_postmeta` VALUES (527,106,'_wp_old_date','2023-09-20');
INSERT INTO `wp_postmeta` VALUES (528,107,'_wp_old_date','2023-09-20');
INSERT INTO `wp_postmeta` VALUES (529,108,'_wp_old_date','2023-09-20');
INSERT INTO `wp_postmeta` VALUES (530,103,'_wp_old_date','2023-09-20');
INSERT INTO `wp_postmeta` VALUES (531,109,'_wp_old_date','2023-09-20');
INSERT INTO `wp_postmeta` VALUES (532,110,'_wp_old_date','2023-09-20');
INSERT INTO `wp_postmeta` VALUES (533,111,'_wp_old_date','2023-09-20');
INSERT INTO `wp_postmeta` VALUES (534,112,'_wp_old_date','2023-09-20');
INSERT INTO `wp_postmeta` VALUES (535,104,'_wp_old_date','2023-09-20');
INSERT INTO `wp_postmeta` VALUES (536,113,'_wp_old_date','2023-09-20');
INSERT INTO `wp_postmeta` VALUES (537,114,'_wp_old_date','2023-09-20');
INSERT INTO `wp_postmeta` VALUES (538,115,'_wp_old_date','2023-09-20');
INSERT INTO `wp_postmeta` VALUES (539,116,'_wp_old_date','2023-09-20');
INSERT INTO `wp_postmeta` VALUES (540,79,'_wp_old_date','2023-09-20');
INSERT INTO `wp_postmeta` VALUES (541,80,'_wp_old_date','2023-09-20');
INSERT INTO `wp_postmeta` VALUES (542,81,'_wp_old_date','2023-09-20');
INSERT INTO `wp_postmeta` VALUES (543,82,'_wp_old_date','2023-09-20');
INSERT INTO `wp_postmeta` VALUES (544,23,'_wp_old_date','2023-09-20');
INSERT INTO `wp_postmeta` VALUES (572,128,'_menu_item_type','custom');
INSERT INTO `wp_postmeta` VALUES (573,128,'_menu_item_menu_item_parent','79');
INSERT INTO `wp_postmeta` VALUES (574,128,'_menu_item_object_id','128');
INSERT INTO `wp_postmeta` VALUES (575,128,'_menu_item_object','custom');
INSERT INTO `wp_postmeta` VALUES (576,128,'_menu_item_target','');
INSERT INTO `wp_postmeta` VALUES (577,128,'_menu_item_classes','a:1:{i:0;s:0:\"\";}');
INSERT INTO `wp_postmeta` VALUES (578,128,'_menu_item_xfn','');
INSERT INTO `wp_postmeta` VALUES (579,128,'_menu_item_url','#');
INSERT INTO `wp_postmeta` VALUES (581,129,'_menu_item_type','custom');
INSERT INTO `wp_postmeta` VALUES (582,129,'_menu_item_menu_item_parent','79');
INSERT INTO `wp_postmeta` VALUES (583,129,'_menu_item_object_id','129');
INSERT INTO `wp_postmeta` VALUES (584,129,'_menu_item_object','custom');
INSERT INTO `wp_postmeta` VALUES (585,129,'_menu_item_target','');
INSERT INTO `wp_postmeta` VALUES (586,129,'_menu_item_classes','a:1:{i:0;s:0:\"\";}');
INSERT INTO `wp_postmeta` VALUES (587,129,'_menu_item_xfn','');
INSERT INTO `wp_postmeta` VALUES (588,129,'_menu_item_url','#');
INSERT INTO `wp_postmeta` VALUES (590,130,'_menu_item_type','custom');
INSERT INTO `wp_postmeta` VALUES (591,130,'_menu_item_menu_item_parent','128');
INSERT INTO `wp_postmeta` VALUES (592,130,'_menu_item_object_id','130');
INSERT INTO `wp_postmeta` VALUES (593,130,'_menu_item_object','custom');
INSERT INTO `wp_postmeta` VALUES (594,130,'_menu_item_target','');
INSERT INTO `wp_postmeta` VALUES (595,130,'_menu_item_classes','a:1:{i:0;s:0:\"\";}');
INSERT INTO `wp_postmeta` VALUES (596,130,'_menu_item_xfn','');
INSERT INTO `wp_postmeta` VALUES (597,130,'_menu_item_url','#');
INSERT INTO `wp_postmeta` VALUES (599,131,'_menu_item_type','custom');
INSERT INTO `wp_postmeta` VALUES (600,131,'_menu_item_menu_item_parent','128');
INSERT INTO `wp_postmeta` VALUES (601,131,'_menu_item_object_id','131');
INSERT INTO `wp_postmeta` VALUES (602,131,'_menu_item_object','custom');
INSERT INTO `wp_postmeta` VALUES (603,131,'_menu_item_target','');
INSERT INTO `wp_postmeta` VALUES (604,131,'_menu_item_classes','a:1:{i:0;s:0:\"\";}');
INSERT INTO `wp_postmeta` VALUES (605,131,'_menu_item_xfn','');
INSERT INTO `wp_postmeta` VALUES (606,131,'_menu_item_url','#');
INSERT INTO `wp_postmeta` VALUES (608,132,'_menu_item_type','custom');
INSERT INTO `wp_postmeta` VALUES (609,132,'_menu_item_menu_item_parent','128');
INSERT INTO `wp_postmeta` VALUES (610,132,'_menu_item_object_id','132');
INSERT INTO `wp_postmeta` VALUES (611,132,'_menu_item_object','custom');
INSERT INTO `wp_postmeta` VALUES (612,132,'_menu_item_target','');
INSERT INTO `wp_postmeta` VALUES (613,132,'_menu_item_classes','a:1:{i:0;s:0:\"\";}');
INSERT INTO `wp_postmeta` VALUES (614,132,'_menu_item_xfn','');
INSERT INTO `wp_postmeta` VALUES (615,132,'_menu_item_url','#');
INSERT INTO `wp_postmeta` VALUES (617,133,'_menu_item_type','custom');
INSERT INTO `wp_postmeta` VALUES (618,133,'_menu_item_menu_item_parent','129');
INSERT INTO `wp_postmeta` VALUES (619,133,'_menu_item_object_id','133');
INSERT INTO `wp_postmeta` VALUES (620,133,'_menu_item_object','custom');
INSERT INTO `wp_postmeta` VALUES (621,133,'_menu_item_target','');
INSERT INTO `wp_postmeta` VALUES (622,133,'_menu_item_classes','a:1:{i:0;s:0:\"\";}');
INSERT INTO `wp_postmeta` VALUES (623,133,'_menu_item_xfn','');
INSERT INTO `wp_postmeta` VALUES (624,133,'_menu_item_url','#');
INSERT INTO `wp_postmeta` VALUES (626,134,'_menu_item_type','custom');
INSERT INTO `wp_postmeta` VALUES (627,134,'_menu_item_menu_item_parent','129');
INSERT INTO `wp_postmeta` VALUES (628,134,'_menu_item_object_id','134');
INSERT INTO `wp_postmeta` VALUES (629,134,'_menu_item_object','custom');
INSERT INTO `wp_postmeta` VALUES (630,134,'_menu_item_target','');
INSERT INTO `wp_postmeta` VALUES (631,134,'_menu_item_classes','a:1:{i:0;s:0:\"\";}');
INSERT INTO `wp_postmeta` VALUES (632,134,'_menu_item_xfn','');
INSERT INTO `wp_postmeta` VALUES (633,134,'_menu_item_url','#');
INSERT INTO `wp_postmeta` VALUES (635,135,'_menu_item_type','custom');
INSERT INTO `wp_postmeta` VALUES (636,135,'_menu_item_menu_item_parent','81');
INSERT INTO `wp_postmeta` VALUES (637,135,'_menu_item_object_id','135');
INSERT INTO `wp_postmeta` VALUES (638,135,'_menu_item_object','custom');
INSERT INTO `wp_postmeta` VALUES (639,135,'_menu_item_target','');
INSERT INTO `wp_postmeta` VALUES (640,135,'_menu_item_classes','a:1:{i:0;s:0:\"\";}');
INSERT INTO `wp_postmeta` VALUES (641,135,'_menu_item_xfn','');
INSERT INTO `wp_postmeta` VALUES (642,135,'_menu_item_url','#');
INSERT INTO `wp_postmeta` VALUES (644,136,'_menu_item_type','custom');
INSERT INTO `wp_postmeta` VALUES (645,136,'_menu_item_menu_item_parent','135');
INSERT INTO `wp_postmeta` VALUES (646,136,'_menu_item_object_id','136');
INSERT INTO `wp_postmeta` VALUES (647,136,'_menu_item_object','custom');
INSERT INTO `wp_postmeta` VALUES (648,136,'_menu_item_target','');
INSERT INTO `wp_postmeta` VALUES (649,136,'_menu_item_classes','a:1:{i:0;s:0:\"\";}');
INSERT INTO `wp_postmeta` VALUES (650,136,'_menu_item_xfn','');
INSERT INTO `wp_postmeta` VALUES (651,136,'_menu_item_url','#');
INSERT INTO `wp_postmeta` VALUES (653,137,'_menu_item_type','custom');
INSERT INTO `wp_postmeta` VALUES (654,137,'_menu_item_menu_item_parent','135');
INSERT INTO `wp_postmeta` VALUES (655,137,'_menu_item_object_id','137');
INSERT INTO `wp_postmeta` VALUES (656,137,'_menu_item_object','custom');
INSERT INTO `wp_postmeta` VALUES (657,137,'_menu_item_target','');
INSERT INTO `wp_postmeta` VALUES (658,137,'_menu_item_classes','a:1:{i:0;s:0:\"\";}');
INSERT INTO `wp_postmeta` VALUES (659,137,'_menu_item_xfn','');
INSERT INTO `wp_postmeta` VALUES (660,137,'_menu_item_url','#');
INSERT INTO `wp_postmeta` VALUES (662,138,'_menu_item_type','custom');
INSERT INTO `wp_postmeta` VALUES (663,138,'_menu_item_menu_item_parent','135');
INSERT INTO `wp_postmeta` VALUES (664,138,'_menu_item_object_id','138');
INSERT INTO `wp_postmeta` VALUES (665,138,'_menu_item_object','custom');
INSERT INTO `wp_postmeta` VALUES (666,138,'_menu_item_target','');
INSERT INTO `wp_postmeta` VALUES (667,138,'_menu_item_classes','a:1:{i:0;s:0:\"\";}');
INSERT INTO `wp_postmeta` VALUES (668,138,'_menu_item_xfn','');
INSERT INTO `wp_postmeta` VALUES (669,138,'_menu_item_url','#');
INSERT INTO `wp_postmeta` VALUES (671,139,'_menu_item_type','custom');
INSERT INTO `wp_postmeta` VALUES (672,139,'_menu_item_menu_item_parent','135');
INSERT INTO `wp_postmeta` VALUES (673,139,'_menu_item_object_id','139');
INSERT INTO `wp_postmeta` VALUES (674,139,'_menu_item_object','custom');
INSERT INTO `wp_postmeta` VALUES (675,139,'_menu_item_target','');
INSERT INTO `wp_postmeta` VALUES (676,139,'_menu_item_classes','a:1:{i:0;s:0:\"\";}');
INSERT INTO `wp_postmeta` VALUES (677,139,'_menu_item_xfn','');
INSERT INTO `wp_postmeta` VALUES (678,139,'_menu_item_url','#');
INSERT INTO `wp_postmeta` VALUES (680,140,'_menu_item_type','custom');
INSERT INTO `wp_postmeta` VALUES (681,140,'_menu_item_menu_item_parent','135');
INSERT INTO `wp_postmeta` VALUES (682,140,'_menu_item_object_id','140');
INSERT INTO `wp_postmeta` VALUES (683,140,'_menu_item_object','custom');
INSERT INTO `wp_postmeta` VALUES (684,140,'_menu_item_target','');
INSERT INTO `wp_postmeta` VALUES (685,140,'_menu_item_classes','a:1:{i:0;s:0:\"\";}');
INSERT INTO `wp_postmeta` VALUES (686,140,'_menu_item_xfn','');
INSERT INTO `wp_postmeta` VALUES (687,140,'_menu_item_url','#');
INSERT INTO `wp_postmeta` VALUES (689,141,'_menu_item_type','custom');
INSERT INTO `wp_postmeta` VALUES (690,141,'_menu_item_menu_item_parent','81');
INSERT INTO `wp_postmeta` VALUES (691,141,'_menu_item_object_id','141');
INSERT INTO `wp_postmeta` VALUES (692,141,'_menu_item_object','custom');
INSERT INTO `wp_postmeta` VALUES (693,141,'_menu_item_target','');
INSERT INTO `wp_postmeta` VALUES (694,141,'_menu_item_classes','a:1:{i:0;s:0:\"\";}');
INSERT INTO `wp_postmeta` VALUES (695,141,'_menu_item_xfn','');
INSERT INTO `wp_postmeta` VALUES (696,141,'_menu_item_url','#');
INSERT INTO `wp_postmeta` VALUES (698,142,'_menu_item_type','custom');
INSERT INTO `wp_postmeta` VALUES (699,142,'_menu_item_menu_item_parent','141');
INSERT INTO `wp_postmeta` VALUES (700,142,'_menu_item_object_id','142');
INSERT INTO `wp_postmeta` VALUES (701,142,'_menu_item_object','custom');
INSERT INTO `wp_postmeta` VALUES (702,142,'_menu_item_target','');
INSERT INTO `wp_postmeta` VALUES (703,142,'_menu_item_classes','a:1:{i:0;s:0:\"\";}');
INSERT INTO `wp_postmeta` VALUES (704,142,'_menu_item_xfn','');
INSERT INTO `wp_postmeta` VALUES (705,142,'_menu_item_url','#');
INSERT INTO `wp_postmeta` VALUES (707,143,'_menu_item_type','custom');
INSERT INTO `wp_postmeta` VALUES (708,143,'_menu_item_menu_item_parent','141');
INSERT INTO `wp_postmeta` VALUES (709,143,'_menu_item_object_id','143');
INSERT INTO `wp_postmeta` VALUES (710,143,'_menu_item_object','custom');
INSERT INTO `wp_postmeta` VALUES (711,143,'_menu_item_target','');
INSERT INTO `wp_postmeta` VALUES (712,143,'_menu_item_classes','a:1:{i:0;s:0:\"\";}');
INSERT INTO `wp_postmeta` VALUES (713,143,'_menu_item_xfn','');
INSERT INTO `wp_postmeta` VALUES (714,143,'_menu_item_url','#');
INSERT INTO `wp_postmeta` VALUES (716,144,'_menu_item_type','custom');
INSERT INTO `wp_postmeta` VALUES (717,144,'_menu_item_menu_item_parent','141');
INSERT INTO `wp_postmeta` VALUES (718,144,'_menu_item_object_id','144');
INSERT INTO `wp_postmeta` VALUES (719,144,'_menu_item_object','custom');
INSERT INTO `wp_postmeta` VALUES (720,144,'_menu_item_target','');
INSERT INTO `wp_postmeta` VALUES (721,144,'_menu_item_classes','a:1:{i:0;s:0:\"\";}');
INSERT INTO `wp_postmeta` VALUES (722,144,'_menu_item_xfn','');
INSERT INTO `wp_postmeta` VALUES (723,144,'_menu_item_url','#');
INSERT INTO `wp_postmeta` VALUES (725,145,'_menu_item_type','custom');
INSERT INTO `wp_postmeta` VALUES (726,145,'_menu_item_menu_item_parent','141');
INSERT INTO `wp_postmeta` VALUES (727,145,'_menu_item_object_id','145');
INSERT INTO `wp_postmeta` VALUES (728,145,'_menu_item_object','custom');
INSERT INTO `wp_postmeta` VALUES (729,145,'_menu_item_target','');
INSERT INTO `wp_postmeta` VALUES (730,145,'_menu_item_classes','a:1:{i:0;s:0:\"\";}');
INSERT INTO `wp_postmeta` VALUES (731,145,'_menu_item_xfn','');
INSERT INTO `wp_postmeta` VALUES (732,145,'_menu_item_url','#');
INSERT INTO `wp_postmeta` VALUES (734,146,'_menu_item_type','custom');
INSERT INTO `wp_postmeta` VALUES (735,146,'_menu_item_menu_item_parent','80');
INSERT INTO `wp_postmeta` VALUES (736,146,'_menu_item_object_id','146');
INSERT INTO `wp_postmeta` VALUES (737,146,'_menu_item_object','custom');
INSERT INTO `wp_postmeta` VALUES (738,146,'_menu_item_target','');
INSERT INTO `wp_postmeta` VALUES (739,146,'_menu_item_classes','a:1:{i:0;s:0:\"\";}');
INSERT INTO `wp_postmeta` VALUES (740,146,'_menu_item_xfn','');
INSERT INTO `wp_postmeta` VALUES (741,146,'_menu_item_url','#');
INSERT INTO `wp_postmeta` VALUES (743,147,'_menu_item_type','custom');
INSERT INTO `wp_postmeta` VALUES (744,147,'_menu_item_menu_item_parent','146');
INSERT INTO `wp_postmeta` VALUES (745,147,'_menu_item_object_id','147');
INSERT INTO `wp_postmeta` VALUES (746,147,'_menu_item_object','custom');
INSERT INTO `wp_postmeta` VALUES (747,147,'_menu_item_target','');
INSERT INTO `wp_postmeta` VALUES (748,147,'_menu_item_classes','a:1:{i:0;s:0:\"\";}');
INSERT INTO `wp_postmeta` VALUES (749,147,'_menu_item_xfn','');
INSERT INTO `wp_postmeta` VALUES (750,147,'_menu_item_url','#');
INSERT INTO `wp_postmeta` VALUES (752,148,'_menu_item_type','custom');
INSERT INTO `wp_postmeta` VALUES (753,148,'_menu_item_menu_item_parent','146');
INSERT INTO `wp_postmeta` VALUES (754,148,'_menu_item_object_id','148');
INSERT INTO `wp_postmeta` VALUES (755,148,'_menu_item_object','custom');
INSERT INTO `wp_postmeta` VALUES (756,148,'_menu_item_target','');
INSERT INTO `wp_postmeta` VALUES (757,148,'_menu_item_classes','a:1:{i:0;s:0:\"\";}');
INSERT INTO `wp_postmeta` VALUES (758,148,'_menu_item_xfn','');
INSERT INTO `wp_postmeta` VALUES (759,148,'_menu_item_url','#');
INSERT INTO `wp_postmeta` VALUES (761,149,'_menu_item_type','custom');
INSERT INTO `wp_postmeta` VALUES (762,149,'_menu_item_menu_item_parent','146');
INSERT INTO `wp_postmeta` VALUES (763,149,'_menu_item_object_id','149');
INSERT INTO `wp_postmeta` VALUES (764,149,'_menu_item_object','custom');
INSERT INTO `wp_postmeta` VALUES (765,149,'_menu_item_target','');
INSERT INTO `wp_postmeta` VALUES (766,149,'_menu_item_classes','a:1:{i:0;s:0:\"\";}');
INSERT INTO `wp_postmeta` VALUES (767,149,'_menu_item_xfn','');
INSERT INTO `wp_postmeta` VALUES (768,149,'_menu_item_url','#');
INSERT INTO `wp_postmeta` VALUES (770,150,'_menu_item_type','custom');
INSERT INTO `wp_postmeta` VALUES (771,150,'_menu_item_menu_item_parent','146');
INSERT INTO `wp_postmeta` VALUES (772,150,'_menu_item_object_id','150');
INSERT INTO `wp_postmeta` VALUES (773,150,'_menu_item_object','custom');
INSERT INTO `wp_postmeta` VALUES (774,150,'_menu_item_target','');
INSERT INTO `wp_postmeta` VALUES (775,150,'_menu_item_classes','a:1:{i:0;s:0:\"\";}');
INSERT INTO `wp_postmeta` VALUES (776,150,'_menu_item_xfn','');
INSERT INTO `wp_postmeta` VALUES (777,150,'_menu_item_url','#');
INSERT INTO `wp_postmeta` VALUES (779,151,'_menu_item_type','custom');
INSERT INTO `wp_postmeta` VALUES (780,151,'_menu_item_menu_item_parent','80');
INSERT INTO `wp_postmeta` VALUES (781,151,'_menu_item_object_id','151');
INSERT INTO `wp_postmeta` VALUES (782,151,'_menu_item_object','custom');
INSERT INTO `wp_postmeta` VALUES (783,151,'_menu_item_target','');
INSERT INTO `wp_postmeta` VALUES (784,151,'_menu_item_classes','a:1:{i:0;s:0:\"\";}');
INSERT INTO `wp_postmeta` VALUES (785,151,'_menu_item_xfn','');
INSERT INTO `wp_postmeta` VALUES (786,151,'_menu_item_url','#');
INSERT INTO `wp_postmeta` VALUES (788,152,'_menu_item_type','custom');
INSERT INTO `wp_postmeta` VALUES (789,152,'_menu_item_menu_item_parent','151');
INSERT INTO `wp_postmeta` VALUES (790,152,'_menu_item_object_id','152');
INSERT INTO `wp_postmeta` VALUES (791,152,'_menu_item_object','custom');
INSERT INTO `wp_postmeta` VALUES (792,152,'_menu_item_target','');
INSERT INTO `wp_postmeta` VALUES (793,152,'_menu_item_classes','a:1:{i:0;s:0:\"\";}');
INSERT INTO `wp_postmeta` VALUES (794,152,'_menu_item_xfn','');
INSERT INTO `wp_postmeta` VALUES (795,152,'_menu_item_url','#');
INSERT INTO `wp_postmeta` VALUES (797,153,'_menu_item_type','custom');
INSERT INTO `wp_postmeta` VALUES (798,153,'_menu_item_menu_item_parent','151');
INSERT INTO `wp_postmeta` VALUES (799,153,'_menu_item_object_id','153');
INSERT INTO `wp_postmeta` VALUES (800,153,'_menu_item_object','custom');
INSERT INTO `wp_postmeta` VALUES (801,153,'_menu_item_target','');
INSERT INTO `wp_postmeta` VALUES (802,153,'_menu_item_classes','a:1:{i:0;s:0:\"\";}');
INSERT INTO `wp_postmeta` VALUES (803,153,'_menu_item_xfn','');
INSERT INTO `wp_postmeta` VALUES (804,153,'_menu_item_url','#');
INSERT INTO `wp_postmeta` VALUES (806,66,'_wp_old_date','2023-09-21');
INSERT INTO `wp_postmeta` VALUES (807,102,'_wp_old_date','2023-09-21');
INSERT INTO `wp_postmeta` VALUES (808,105,'_wp_old_date','2023-09-21');
INSERT INTO `wp_postmeta` VALUES (809,106,'_wp_old_date','2023-09-21');
INSERT INTO `wp_postmeta` VALUES (810,107,'_wp_old_date','2023-09-21');
INSERT INTO `wp_postmeta` VALUES (811,108,'_wp_old_date','2023-09-21');
INSERT INTO `wp_postmeta` VALUES (812,103,'_wp_old_date','2023-09-21');
INSERT INTO `wp_postmeta` VALUES (813,109,'_wp_old_date','2023-09-21');
INSERT INTO `wp_postmeta` VALUES (814,110,'_wp_old_date','2023-09-21');
INSERT INTO `wp_postmeta` VALUES (815,111,'_wp_old_date','2023-09-21');
INSERT INTO `wp_postmeta` VALUES (816,112,'_wp_old_date','2023-09-21');
INSERT INTO `wp_postmeta` VALUES (817,104,'_wp_old_date','2023-09-21');
INSERT INTO `wp_postmeta` VALUES (818,113,'_wp_old_date','2023-09-21');
INSERT INTO `wp_postmeta` VALUES (819,114,'_wp_old_date','2023-09-21');
INSERT INTO `wp_postmeta` VALUES (820,116,'_wp_old_date','2023-09-21');
INSERT INTO `wp_postmeta` VALUES (821,115,'_wp_old_date','2023-09-21');
INSERT INTO `wp_postmeta` VALUES (822,79,'_wp_old_date','2023-09-21');
INSERT INTO `wp_postmeta` VALUES (823,128,'_wp_old_date','2023-09-21');
INSERT INTO `wp_postmeta` VALUES (824,130,'_wp_old_date','2023-09-21');
INSERT INTO `wp_postmeta` VALUES (825,131,'_wp_old_date','2023-09-21');
INSERT INTO `wp_postmeta` VALUES (826,132,'_wp_old_date','2023-09-21');
INSERT INTO `wp_postmeta` VALUES (827,129,'_wp_old_date','2023-09-21');
INSERT INTO `wp_postmeta` VALUES (828,133,'_wp_old_date','2023-09-21');
INSERT INTO `wp_postmeta` VALUES (829,134,'_wp_old_date','2023-09-21');
INSERT INTO `wp_postmeta` VALUES (830,80,'_wp_old_date','2023-09-21');
INSERT INTO `wp_postmeta` VALUES (831,146,'_wp_old_date','2023-09-21');
INSERT INTO `wp_postmeta` VALUES (832,147,'_wp_old_date','2023-09-21');
INSERT INTO `wp_postmeta` VALUES (833,148,'_wp_old_date','2023-09-21');
INSERT INTO `wp_postmeta` VALUES (834,149,'_wp_old_date','2023-09-21');
INSERT INTO `wp_postmeta` VALUES (835,150,'_wp_old_date','2023-09-21');
INSERT INTO `wp_postmeta` VALUES (836,151,'_wp_old_date','2023-09-21');
INSERT INTO `wp_postmeta` VALUES (837,152,'_wp_old_date','2023-09-21');
INSERT INTO `wp_postmeta` VALUES (838,153,'_wp_old_date','2023-09-21');
INSERT INTO `wp_postmeta` VALUES (839,81,'_wp_old_date','2023-09-21');
INSERT INTO `wp_postmeta` VALUES (840,135,'_wp_old_date','2023-09-21');
INSERT INTO `wp_postmeta` VALUES (841,136,'_wp_old_date','2023-09-21');
INSERT INTO `wp_postmeta` VALUES (842,137,'_wp_old_date','2023-09-21');
INSERT INTO `wp_postmeta` VALUES (843,138,'_wp_old_date','2023-09-21');
INSERT INTO `wp_postmeta` VALUES (844,139,'_wp_old_date','2023-09-21');
INSERT INTO `wp_postmeta` VALUES (845,140,'_wp_old_date','2023-09-21');
INSERT INTO `wp_postmeta` VALUES (846,141,'_wp_old_date','2023-09-21');
INSERT INTO `wp_postmeta` VALUES (847,142,'_wp_old_date','2023-09-21');
INSERT INTO `wp_postmeta` VALUES (848,143,'_wp_old_date','2023-09-21');
INSERT INTO `wp_postmeta` VALUES (849,144,'_wp_old_date','2023-09-21');
INSERT INTO `wp_postmeta` VALUES (850,145,'_wp_old_date','2023-09-21');
INSERT INTO `wp_postmeta` VALUES (851,82,'_wp_old_date','2023-09-21');
INSERT INTO `wp_postmeta` VALUES (852,23,'_wp_old_date','2023-09-21');
/*!40000 ALTER TABLE `wp_postmeta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wp_posts`
--

DROP TABLE IF EXISTS `wp_posts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `wp_posts` (
  `ID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `post_author` bigint(20) unsigned NOT NULL DEFAULT '0',
  `post_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_date_gmt` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_content` longtext COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `post_title` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `post_excerpt` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `post_status` varchar(20) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT 'publish',
  `comment_status` varchar(20) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT 'open',
  `ping_status` varchar(20) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT 'open',
  `post_password` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `post_name` varchar(200) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `to_ping` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `pinged` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `post_modified` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_modified_gmt` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_content_filtered` longtext COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `post_parent` bigint(20) unsigned NOT NULL DEFAULT '0',
  `guid` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `menu_order` int(11) NOT NULL DEFAULT '0',
  `post_type` varchar(20) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT 'post',
  `post_mime_type` varchar(100) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `comment_count` bigint(20) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ID`),
  KEY `post_name` (`post_name`(191)),
  KEY `type_status_date` (`post_type`,`post_status`,`post_date`,`ID`),
  KEY `post_parent` (`post_parent`),
  KEY `post_author` (`post_author`)
) ENGINE=InnoDB AUTO_INCREMENT=158 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wp_posts`
--

LOCK TABLES `wp_posts` WRITE;
/*!40000 ALTER TABLE `wp_posts` DISABLE KEYS */;
INSERT INTO `wp_posts` VALUES (1,1,'2023-07-26 19:56:41','2023-07-26 19:56:41','<!-- wp:paragraph -->\n<p>Welcome to WordPress. This is your first post. Edit or delete it, then start writing!</p>\n<!-- /wp:paragraph -->','Hello world!','','publish','open','open','','hello-world','','','2023-07-26 19:56:41','2023-07-26 19:56:41','',0,'http://choctaw-landing-prod.local/?p=1',0,'post','',1);
INSERT INTO `wp_posts` VALUES (3,1,'2023-07-26 19:56:41','2023-07-26 19:56:41','<!-- wp:heading --><h2>Who we are</h2><!-- /wp:heading --><!-- wp:paragraph --><p><strong class=\"privacy-policy-tutorial\">Suggested text: </strong>Our website address is: http://choctaw-landing-prod.local.</p><!-- /wp:paragraph --><!-- wp:heading --><h2>Comments</h2><!-- /wp:heading --><!-- wp:paragraph --><p><strong class=\"privacy-policy-tutorial\">Suggested text: </strong>When visitors leave comments on the site we collect the data shown in the comments form, and also the visitor&#8217;s IP address and browser user agent string to help spam detection.</p><!-- /wp:paragraph --><!-- wp:paragraph --><p>An anonymized string created from your email address (also called a hash) may be provided to the Gravatar service to see if you are using it. The Gravatar service privacy policy is available here: https://automattic.com/privacy/. After approval of your comment, your profile picture is visible to the public in the context of your comment.</p><!-- /wp:paragraph --><!-- wp:heading --><h2>Media</h2><!-- /wp:heading --><!-- wp:paragraph --><p><strong class=\"privacy-policy-tutorial\">Suggested text: </strong>If you upload images to the website, you should avoid uploading images with embedded location data (EXIF GPS) included. Visitors to the website can download and extract any location data from images on the website.</p><!-- /wp:paragraph --><!-- wp:heading --><h2>Cookies</h2><!-- /wp:heading --><!-- wp:paragraph --><p><strong class=\"privacy-policy-tutorial\">Suggested text: </strong>If you leave a comment on our site you may opt-in to saving your name, email address and website in cookies. These are for your convenience so that you do not have to fill in your details again when you leave another comment. These cookies will last for one year.</p><!-- /wp:paragraph --><!-- wp:paragraph --><p>If you visit our login page, we will set a temporary cookie to determine if your browser accepts cookies. This cookie contains no personal data and is discarded when you close your browser.</p><!-- /wp:paragraph --><!-- wp:paragraph --><p>When you log in, we will also set up several cookies to save your login information and your screen display choices. Login cookies last for two days, and screen options cookies last for a year. If you select &quot;Remember Me&quot;, your login will persist for two weeks. If you log out of your account, the login cookies will be removed.</p><!-- /wp:paragraph --><!-- wp:paragraph --><p>If you edit or publish an article, an additional cookie will be saved in your browser. This cookie includes no personal data and simply indicates the post ID of the article you just edited. It expires after 1 day.</p><!-- /wp:paragraph --><!-- wp:heading --><h2>Embedded content from other websites</h2><!-- /wp:heading --><!-- wp:paragraph --><p><strong class=\"privacy-policy-tutorial\">Suggested text: </strong>Articles on this site may include embedded content (e.g. videos, images, articles, etc.). Embedded content from other websites behaves in the exact same way as if the visitor has visited the other website.</p><!-- /wp:paragraph --><!-- wp:paragraph --><p>These websites may collect data about you, use cookies, embed additional third-party tracking, and monitor your interaction with that embedded content, including tracking your interaction with the embedded content if you have an account and are logged in to that website.</p><!-- /wp:paragraph --><!-- wp:heading --><h2>Who we share your data with</h2><!-- /wp:heading --><!-- wp:paragraph --><p><strong class=\"privacy-policy-tutorial\">Suggested text: </strong>If you request a password reset, your IP address will be included in the reset email.</p><!-- /wp:paragraph --><!-- wp:heading --><h2>How long we retain your data</h2><!-- /wp:heading --><!-- wp:paragraph --><p><strong class=\"privacy-policy-tutorial\">Suggested text: </strong>If you leave a comment, the comment and its metadata are retained indefinitely. This is so we can recognize and approve any follow-up comments automatically instead of holding them in a moderation queue.</p><!-- /wp:paragraph --><!-- wp:paragraph --><p>For users that register on our website (if any), we also store the personal information they provide in their user profile. All users can see, edit, or delete their personal information at any time (except they cannot change their username). Website administrators can also see and edit that information.</p><!-- /wp:paragraph --><!-- wp:heading --><h2>What rights you have over your data</h2><!-- /wp:heading --><!-- wp:paragraph --><p><strong class=\"privacy-policy-tutorial\">Suggested text: </strong>If you have an account on this site, or have left comments, you can request to receive an exported file of the personal data we hold about you, including any data you have provided to us. You can also request that we erase any personal data we hold about you. This does not include any data we are obliged to keep for administrative, legal, or security purposes.</p><!-- /wp:paragraph --><!-- wp:heading --><h2>Where your data is sent</h2><!-- /wp:heading --><!-- wp:paragraph --><p><strong class=\"privacy-policy-tutorial\">Suggested text: </strong>Visitor comments may be checked through an automated spam detection service.</p><!-- /wp:paragraph -->','Privacy Policy','','draft','closed','open','','privacy-policy','','','2023-07-26 19:56:41','2023-07-26 19:56:41','',0,'http://choctaw-landing-prod.local/?page_id=3',0,'page','',0);
INSERT INTO `wp_posts` VALUES (8,1,'2023-07-26 20:26:04','2023-07-26 20:26:04','','Homepage','','publish','closed','closed','','homepage','','','2023-07-26 20:26:36','2023-07-26 20:26:36','',0,'http://choctaw-landing-prod.local/?page_id=8',0,'page','',0);
INSERT INTO `wp_posts` VALUES (9,1,'2023-07-26 20:26:04','2023-07-26 20:26:04','','Homepage','','inherit','closed','closed','','8-revision-v1','','','2023-07-26 20:26:04','2023-07-26 20:26:04','',8,'http://choctaw-landing-prod.local/?p=9',0,'revision','',0);
INSERT INTO `wp_posts` VALUES (15,1,'2023-07-26 21:00:00','2023-07-26 21:00:00','','Homepage-Header','','inherit','open','closed','','homepage-header','','','2023-07-26 21:00:00','2023-07-26 21:00:00','',0,'http://choctaw-landing-prod.local/wp-content/uploads/2023/07/Homepage-Header.jpg',0,'attachment','image/jpeg',0);
INSERT INTO `wp_posts` VALUES (16,1,'2023-07-26 21:00:43','2023-07-26 21:00:43','','nav-bg','','inherit','open','closed','','nav-bg','','','2023-07-26 21:00:43','2023-07-26 21:00:43','',0,'http://choctaw-landing-prod.local/wp-content/uploads/2023/07/nav-bg.jpg',0,'attachment','image/jpeg',0);
INSERT INTO `wp_posts` VALUES (23,1,'2023-09-22 16:18:41','2023-07-26 21:10:51','','Book Now','','publish','closed','closed','','book-now','','','2023-09-22 16:18:41','2023-09-22 16:18:41','',0,'http://choctaw-landing-prod.local/?p=23',47,'nav_menu_item','',0);
INSERT INTO `wp_posts` VALUES (25,1,'2023-08-04 15:33:12','2023-08-04 15:33:12','','Privacy Policy','','publish','closed','closed','','privacy-policy','','','2023-08-04 15:33:12','2023-08-04 15:33:12','',0,'http://choctaw-landing-prod.local/?p=25',1,'nav_menu_item','',0);
INSERT INTO `wp_posts` VALUES (26,1,'2023-08-04 15:33:12','2023-08-04 15:33:12','','Terms of Use','','publish','closed','closed','','terms-of-use','','','2023-08-04 15:33:12','2023-08-04 15:33:12','',0,'http://choctaw-landing-prod.local/?p=26',2,'nav_menu_item','',0);
INSERT INTO `wp_posts` VALUES (27,1,'2023-08-04 15:33:12','2023-08-04 15:33:12','','Copyright and Trademarks','','publish','closed','closed','','copyright-and-trademarks','','','2023-08-04 15:33:12','2023-08-04 15:33:12','',0,'http://choctaw-landing-prod.local/?p=27',3,'nav_menu_item','',0);
INSERT INTO `wp_posts` VALUES (28,1,'2023-08-04 15:46:25','2023-08-04 15:46:25','','Careers','','publish','closed','closed','','careers','','','2023-08-04 15:46:25','2023-08-04 15:46:25','',0,'http://choctaw-landing-prod.local/?p=28',1,'nav_menu_item','',0);
INSERT INTO `wp_posts` VALUES (29,1,'2023-08-04 15:46:25','2023-08-04 15:46:25','','House Rules','','publish','closed','closed','','house-rules','','','2023-08-04 15:46:25','2023-08-04 15:46:25','',0,'http://choctaw-landing-prod.local/?p=29',2,'nav_menu_item','',0);
INSERT INTO `wp_posts` VALUES (30,1,'2023-08-04 15:46:25','2023-08-04 15:46:25','','Responsible Gambling','','publish','closed','closed','','responsible-gambling','','','2023-08-04 15:46:25','2023-08-04 15:46:25','',0,'http://choctaw-landing-prod.local/?p=30',3,'nav_menu_item','',0);
INSERT INTO `wp_posts` VALUES (31,1,'2023-08-04 15:46:25','2023-08-04 15:46:25','','Choctaw Nation of Oklahoma','','publish','closed','closed','','choctaw-nation-of-oklahoma','','','2023-08-04 15:46:25','2023-08-04 15:46:25','',0,'http://choctaw-landing-prod.local/?p=31',4,'nav_menu_item','',0);
INSERT INTO `wp_posts` VALUES (32,1,'2023-08-04 15:47:07','2023-08-04 15:47:07','','Stay','','publish','closed','closed','','stay-2','','','2023-08-04 15:47:07','2023-08-04 15:47:07','',0,'http://choctaw-landing-prod.local/?p=32',1,'nav_menu_item','',0);
INSERT INTO `wp_posts` VALUES (33,1,'2023-08-04 15:47:07','2023-08-04 15:47:07','','Eat & Drink','','publish','closed','closed','','eat-drink-2','','','2023-08-04 15:47:07','2023-08-04 15:47:07','',0,'http://choctaw-landing-prod.local/?p=33',2,'nav_menu_item','',0);
INSERT INTO `wp_posts` VALUES (34,1,'2023-08-04 15:47:07','2023-08-04 15:47:07','','Entertainment','','publish','closed','closed','','entertainment-2','','','2023-08-04 15:47:07','2023-08-04 15:47:07','',0,'http://choctaw-landing-prod.local/?p=34',3,'nav_menu_item','',0);
INSERT INTO `wp_posts` VALUES (35,1,'2023-08-04 15:47:07','2023-08-04 15:47:07','','Things To Do','','publish','closed','closed','','things-to-do-2','','','2023-08-04 15:47:07','2023-08-04 15:47:07','',0,'http://choctaw-landing-prod.local/?p=35',4,'nav_menu_item','',0);
INSERT INTO `wp_posts` VALUES (36,1,'2023-08-04 15:47:07','2023-08-04 15:47:07','','The Mercantile','','publish','closed','closed','','the-mercantile-2','','','2023-08-04 15:47:07','2023-08-04 15:47:07','',0,'http://choctaw-landing-prod.local/?p=36',5,'nav_menu_item','',0);
INSERT INTO `wp_posts` VALUES (37,1,'2023-08-04 15:47:07','2023-08-04 15:47:07','','Meetings','','publish','closed','closed','','meetings','','','2023-08-04 15:47:07','2023-08-04 15:47:07','',0,'http://choctaw-landing-prod.local/?p=37',6,'nav_menu_item','',0);
INSERT INTO `wp_posts` VALUES (38,1,'2023-08-04 15:47:07','2023-08-04 15:47:07','','News','','publish','closed','closed','','news','','','2023-08-04 15:47:07','2023-08-04 15:47:07','',0,'http://choctaw-landing-prod.local/?p=38',7,'nav_menu_item','',0);
INSERT INTO `wp_posts` VALUES (39,1,'2023-08-04 15:55:21','2023-08-04 15:55:21','','Stay','','publish','closed','closed','','stay','','','2023-08-04 15:55:58','2023-08-04 15:55:58','',0,'http://choctaw-landing-prod.local/?page_id=39',0,'page','',0);
INSERT INTO `wp_posts` VALUES (40,1,'2023-08-04 15:55:21','2023-08-04 15:55:21','','Stay','','inherit','closed','closed','','39-revision-v1','','','2023-08-04 15:55:21','2023-08-04 15:55:21','',39,'http://choctaw-landing-prod.local/?p=40',0,'revision','',0);
INSERT INTO `wp_posts` VALUES (41,1,'2023-08-04 17:52:24','2023-08-04 17:52:24','','footer-bg','','inherit','open','closed','','footer-bg','','','2023-08-04 17:52:24','2023-08-04 17:52:24','',0,'http://choctaw-landing-prod.local/wp-content/uploads/2023/08/footer-bg.jpg',0,'attachment','image/jpeg',0);
INSERT INTO `wp_posts` VALUES (42,1,'2023-08-04 17:52:29','2023-08-04 17:52:29','','basket-bg','','inherit','open','closed','','basket-bg','','','2023-08-04 17:52:29','2023-08-04 17:52:29','',0,'http://choctaw-landing-prod.local/wp-content/uploads/2023/08/basket-bg.jpg',0,'attachment','image/jpeg',0);
INSERT INTO `wp_posts` VALUES (43,1,'2023-08-04 17:59:51','2023-08-04 17:59:51','','Eat & Drink','','publish','closed','closed','','eat-drink','','','2023-08-04 18:00:33','2023-08-04 18:00:33','',0,'http://choctaw-landing-prod.local/?page_id=43',0,'page','',0);
INSERT INTO `wp_posts` VALUES (44,1,'2023-08-04 17:59:51','2023-08-04 17:59:51','','Eat & Drink','','inherit','closed','closed','','43-revision-v1','','','2023-08-04 17:59:51','2023-08-04 17:59:51','',43,'http://choctaw-landing-prod.local/?p=44',0,'revision','',0);
INSERT INTO `wp_posts` VALUES (45,1,'2023-08-04 19:20:13','2023-08-04 19:20:13','','Entertainment','','publish','closed','closed','','entertainment','','','2023-08-04 19:20:13','2023-08-04 19:20:13','',0,'http://choctaw-landing-prod.local/?page_id=45',0,'page','',0);
INSERT INTO `wp_posts` VALUES (46,1,'2023-08-04 19:20:13','2023-08-04 19:20:13','','Entertainment','','inherit','closed','closed','','45-revision-v1','','','2023-08-04 19:20:13','2023-08-04 19:20:13','',45,'http://choctaw-landing-prod.local/?p=46',0,'revision','',0);
INSERT INTO `wp_posts` VALUES (49,1,'2023-08-04 21:04:10','2023-08-04 21:04:10','','Things To Do','','publish','closed','closed','','things-to-do','','','2023-08-04 21:04:10','2023-08-04 21:04:10','',0,'http://choctaw-landing-prod.local/?page_id=49',0,'page','',0);
INSERT INTO `wp_posts` VALUES (50,1,'2023-08-04 21:04:10','2023-08-04 21:04:10','','Things To Do','','inherit','closed','closed','','49-revision-v1','','','2023-08-04 21:04:10','2023-08-04 21:04:10','',49,'http://choctaw-landing-prod.local/?p=50',0,'revision','',0);
INSERT INTO `wp_posts` VALUES (51,1,'2023-08-04 21:33:22','2023-08-04 21:33:22','','The Mercantile','','publish','closed','closed','','the-mercantile','','','2023-08-04 21:33:22','2023-08-04 21:33:22','',0,'http://choctaw-landing-prod.local/?page_id=51',0,'page','',0);
INSERT INTO `wp_posts` VALUES (52,1,'2023-08-04 21:33:22','2023-08-04 21:33:22','','The Mercantile','','inherit','closed','closed','','51-revision-v1','','','2023-08-04 21:33:22','2023-08-04 21:33:22','',51,'http://choctaw-landing-prod.local/?p=52',0,'revision','',0);
INSERT INTO `wp_posts` VALUES (54,1,'2023-08-22 20:42:09','2023-08-22 20:42:09','','brown-basket-bg','','inherit','open','closed','','brown-basket-bg','','','2023-08-22 20:42:09','2023-08-22 20:42:09','',0,'http://choctaw-landing-prod.local/wp-content/uploads/2023/08/brown-basket-bg.jpg',0,'attachment','image/jpeg',0);
INSERT INTO `wp_posts` VALUES (55,1,'2023-08-23 15:24:04','2023-08-23 15:24:04','','luxury-has-landed-homepage','','inherit','open','closed','','luxury-has-landed-homepage','','','2023-08-23 15:24:04','2023-08-23 15:24:04','',0,'http://choctaw-landing-prod.local/wp-content/uploads/2023/08/luxury-has-landed-homepage.jpg',0,'attachment','image/jpeg',0);
INSERT INTO `wp_posts` VALUES (56,1,'2023-08-23 17:44:53','2023-08-23 17:44:53','','arrow','','inherit','open','closed','','arrow','','','2023-08-23 17:44:53','2023-08-23 17:44:53','',0,'http://choctaw-landing-prod.local/wp-content/uploads/2023/08/arrow.svg',0,'attachment','image/svg+xml',0);
INSERT INTO `wp_posts` VALUES (57,1,'2023-08-23 18:11:30','2023-08-23 18:11:30','','arrow','','inherit','open','closed','','arrow-2','','','2023-08-23 18:11:30','2023-08-23 18:11:30','',0,'http://choctaw-landing-prod.local/wp-content/uploads/2023/08/arrow-1.svg',0,'attachment','image/svg+xml',0);
INSERT INTO `wp_posts` VALUES (58,1,'2023-08-23 19:36:12','2023-08-23 19:36:12','','adventure-home-bg','','inherit','open','closed','','adventure-home-bg','','','2023-08-23 19:36:12','2023-08-23 19:36:12','',0,'http://choctaw-landing-prod.local/wp-content/uploads/2023/08/adventure-home-bg.jpg',0,'attachment','image/jpeg',0);
INSERT INTO `wp_posts` VALUES (59,1,'2023-08-23 19:41:47','2023-08-23 19:41:47','','arrow-white','','inherit','open','closed','','arrow-white','','','2023-08-23 19:41:47','2023-08-23 19:41:47','',0,'http://choctaw-landing-prod.local/wp-content/uploads/2023/08/arrow-white.svg',0,'attachment','image/svg+xml',0);
INSERT INTO `wp_posts` VALUES (60,1,'2023-08-23 21:07:21','2023-08-23 21:07:21','','youre-a-winner-homepage','','inherit','open','closed','','youre-a-winner-homepage','','','2023-08-23 21:07:21','2023-08-23 21:07:21','',0,'http://choctaw-landing-prod.local/wp-content/uploads/2023/08/youre-a-winner-homepage.jpg',0,'attachment','image/jpeg',0);
INSERT INTO `wp_posts` VALUES (61,1,'2023-08-23 21:09:45','2023-08-23 21:09:45','','meet-and-gather-homepage','','inherit','open','closed','','meet-and-gather-homepage','','','2023-08-23 21:09:45','2023-08-23 21:09:45','',0,'http://choctaw-landing-prod.local/wp-content/uploads/2023/08/meet-and-gather-homepage.jpg',0,'attachment','image/jpeg',0);
INSERT INTO `wp_posts` VALUES (62,1,'2023-08-23 21:10:51','2023-08-23 21:10:51','','light-gray-map-background','','inherit','open','closed','','light-gray-map-background','','','2023-08-23 21:10:51','2023-08-23 21:10:51','',0,'http://choctaw-landing-prod.local/wp-content/uploads/2023/08/light-gray-map-background.jpg',0,'attachment','image/jpeg',0);
INSERT INTO `wp_posts` VALUES (63,1,'2023-08-23 21:23:47','2023-08-23 21:23:47','','double-arrow','','inherit','open','closed','','double-arrow','','','2023-08-23 21:23:47','2023-08-23 21:23:47','',0,'http://choctaw-landing-prod.local/wp-content/uploads/2023/08/double-arrow.svg',0,'attachment','image/svg+xml',0);
INSERT INTO `wp_posts` VALUES (66,1,'2023-09-22 16:18:41','2023-08-25 21:12:12',' ','','','publish','closed','closed','','66','','','2023-09-22 16:18:41','2023-09-22 16:18:41','',0,'http://choctaw-landing-prod.local/66/',1,'nav_menu_item','',0);
INSERT INTO `wp_posts` VALUES (67,1,'2023-08-25 21:23:15','2023-08-25 21:23:15','','family-suite','','inherit','open','closed','','family-suite','','','2023-08-25 21:23:15','2023-08-25 21:23:15','',0,'http://choctaw-landing-prod.local/wp-content/uploads/2023/08/family-suite.jpg',0,'attachment','image/jpeg',0);
INSERT INTO `wp_posts` VALUES (68,1,'2023-08-25 21:23:15','2023-08-25 21:23:15','','luxury-suite','','inherit','open','closed','','luxury-suite','','','2023-08-25 21:23:15','2023-08-25 21:23:15','',0,'http://choctaw-landing-prod.local/wp-content/uploads/2023/08/luxury-suite.jpg',0,'attachment','image/jpeg',0);
INSERT INTO `wp_posts` VALUES (69,1,'2023-08-25 21:23:15','2023-08-25 21:23:15','','one-king-bed','','inherit','open','closed','','one-king-bed','','','2023-08-25 21:23:15','2023-08-25 21:23:15','',0,'http://choctaw-landing-prod.local/wp-content/uploads/2023/08/one-king-bed.jpg',0,'attachment','image/jpeg',0);
INSERT INTO `wp_posts` VALUES (70,1,'2023-08-25 21:23:16','2023-08-25 21:23:16','','two-queen-beds','','inherit','open','closed','','two-queen-beds','','','2023-08-25 21:23:16','2023-08-25 21:23:16','',0,'http://choctaw-landing-prod.local/wp-content/uploads/2023/08/two-queen-beds.jpg',0,'attachment','image/jpeg',0);
INSERT INTO `wp_posts` VALUES (73,1,'2023-09-08 18:26:42','2023-09-08 18:26:42','','amenities-bg','','inherit','open','closed','','amenities-bg','','','2023-09-08 18:26:42','2023-09-08 18:26:42','',0,'http://choctaw-landing-prod.local/wp-content/uploads/2023/09/amenities-bg.jpg',0,'attachment','image/jpeg',0);
INSERT INTO `wp_posts` VALUES (74,1,'2023-09-08 18:42:07','2023-09-08 18:42:07','','amenities-meetings','','inherit','open','closed','','amenities-meetings','','','2023-09-08 18:42:07','2023-09-08 18:42:07','',0,'http://choctaw-landing-prod.local/wp-content/uploads/2023/09/amenities-meetings.jpg',0,'attachment','image/jpeg',0);
INSERT INTO `wp_posts` VALUES (75,1,'2023-09-08 18:42:07','2023-09-08 18:42:07','','amenities-physical','','inherit','open','closed','','amenities-physical','','','2023-09-08 18:42:07','2023-09-08 18:42:07','',0,'http://choctaw-landing-prod.local/wp-content/uploads/2023/09/amenities-physical.jpg',0,'attachment','image/jpeg',0);
INSERT INTO `wp_posts` VALUES (76,1,'2023-09-08 18:42:07','2023-09-08 18:42:07','','amenities-relax','','inherit','open','closed','','amenities-relax','','','2023-09-08 18:42:07','2023-09-08 18:42:07','',0,'http://choctaw-landing-prod.local/wp-content/uploads/2023/09/amenities-relax.jpg',0,'attachment','image/jpeg',0);
INSERT INTO `wp_posts` VALUES (77,1,'2023-09-08 18:42:07','2023-09-08 18:42:07','','amenities-unique-experiences','','inherit','open','closed','','amenities-unique-experiences','','','2023-09-08 18:42:07','2023-09-08 18:42:07','',0,'http://choctaw-landing-prod.local/wp-content/uploads/2023/09/amenities-unique-experiences.jpg',0,'attachment','image/jpeg',0);
INSERT INTO `wp_posts` VALUES (78,1,'2023-09-08 19:38:55','2023-09-08 19:38:55','','amenities-thumbnail','','inherit','open','closed','','amenities-thumbnail','','','2023-09-08 19:38:55','2023-09-08 19:38:55','',0,'http://choctaw-landing-prod.local/wp-content/uploads/2023/09/amenities-thumbnail.jpg',0,'attachment','image/jpeg',0);
INSERT INTO `wp_posts` VALUES (79,1,'2023-09-22 16:18:41','2023-09-15 15:28:35',' ','','','publish','closed','closed','','79','','','2023-09-22 16:18:41','2023-09-22 16:18:41','',0,'http://choctaw-landing-prod.local/?p=79',17,'nav_menu_item','',0);
INSERT INTO `wp_posts` VALUES (80,1,'2023-09-22 16:18:41','2023-09-15 15:28:35',' ','','','publish','closed','closed','','80','','','2023-09-22 16:18:41','2023-09-22 16:18:41','',0,'http://choctaw-landing-prod.local/?p=80',25,'nav_menu_item','',0);
INSERT INTO `wp_posts` VALUES (81,1,'2023-09-22 16:18:41','2023-09-15 15:28:35',' ','','','publish','closed','closed','','81','','','2023-09-22 16:18:41','2023-09-22 16:18:41','',0,'http://choctaw-landing-prod.local/?p=81',34,'nav_menu_item','',0);
INSERT INTO `wp_posts` VALUES (82,1,'2023-09-22 16:18:41','2023-09-15 15:28:35',' ','','','publish','closed','closed','','82','','','2023-09-22 16:18:41','2023-09-22 16:18:41','',0,'http://choctaw-landing-prod.local/?p=82',46,'nav_menu_item','',0);
INSERT INTO `wp_posts` VALUES (83,1,'2023-09-15 18:40:04','2023-09-15 18:40:04','','food-container','','inherit','open','closed','','food-container','','','2023-09-15 18:40:04','2023-09-15 18:40:04','',0,'http://choctaw-landing-prod.local/wp-content/uploads/2023/09/food-container.jpg',0,'attachment','image/jpeg',0);
INSERT INTO `wp_posts` VALUES (84,1,'2023-09-15 18:40:04','2023-09-15 18:40:04','','food-mercantile','','inherit','open','closed','','food-mercantile','','','2023-09-15 18:40:04','2023-09-15 18:40:04','',0,'http://choctaw-landing-prod.local/wp-content/uploads/2023/09/food-mercantile.jpg',0,'attachment','image/jpeg',0);
INSERT INTO `wp_posts` VALUES (85,1,'2023-09-15 18:40:04','2023-09-15 18:40:04','','food-oka-sita','','inherit','open','closed','','food-oka-sita','','','2023-09-15 18:40:04','2023-09-15 18:40:04','',0,'http://choctaw-landing-prod.local/wp-content/uploads/2023/09/food-oka-sita.jpg',0,'attachment','image/jpeg',0);
INSERT INTO `wp_posts` VALUES (86,1,'2023-09-15 18:40:04','2023-09-15 18:40:04','','food-tuklo','','inherit','open','closed','','food-tuklo','','','2023-09-15 18:40:04','2023-09-15 18:40:04','',0,'http://choctaw-landing-prod.local/wp-content/uploads/2023/09/food-tuklo.jpg',0,'attachment','image/jpeg',0);
INSERT INTO `wp_posts` VALUES (87,1,'2023-09-15 21:08:10','2023-09-15 21:08:10','','event-placeholder-bg','','inherit','open','closed','','event-placeholder-bg','','','2023-09-15 21:08:10','2023-09-15 21:08:10','',0,'http://choctaw-landing-prod.local/wp-content/uploads/2023/09/event-placeholder-bg.jpg',0,'attachment','image/jpeg',0);
INSERT INTO `wp_posts` VALUES (88,1,'2023-09-15 21:36:08','2023-09-15 21:36:08','','banner-bg','','inherit','open','closed','','banner-bg','','','2023-09-15 21:36:08','2023-09-15 21:36:08','',0,'http://choctaw-landing-prod.local/wp-content/uploads/2023/09/banner-bg.jpg',0,'attachment','image/jpeg',0);
INSERT INTO `wp_posts` VALUES (89,1,'2023-09-15 21:41:11','2023-09-15 21:41:11','','square-placeholder','','inherit','open','closed','','square-placeholder','','','2023-09-15 21:41:11','2023-09-15 21:41:11','',0,'http://choctaw-landing-prod.local/wp-content/uploads/2023/09/square-placeholder.jpg',0,'attachment','image/jpeg',0);
INSERT INTO `wp_posts` VALUES (91,1,'2023-09-19 20:19:55','2023-09-19 20:19:55','','things-to-do-fishing','','inherit','open','closed','','things-to-do-fishing','','','2023-09-19 20:19:55','2023-09-19 20:19:55','',0,'http://choctaw-landing-prod.local/wp-content/uploads/2023/09/things-to-do-fishing.jpg',0,'attachment','image/jpeg',0);
INSERT INTO `wp_posts` VALUES (92,1,'2023-09-20 15:40:12','2023-09-20 15:40:12','','things-to-do-area-attractions-bg','','inherit','open','closed','','things-to-do-area-attractions-bg','','','2023-09-20 15:40:12','2023-09-20 15:40:12','',0,'http://choctaw-landing-prod.local/wp-content/uploads/2023/09/things-to-do-area-attractions-bg.jpg',0,'attachment','image/jpeg',0);
INSERT INTO `wp_posts` VALUES (93,1,'2023-09-20 15:40:12','2023-09-20 15:40:12','','things-to-do-excursions','','inherit','open','closed','','things-to-do-excursions','','','2023-09-20 15:40:12','2023-09-20 15:40:12','',0,'http://choctaw-landing-prod.local/wp-content/uploads/2023/09/things-to-do-excursions.jpg',0,'attachment','image/jpeg',0);
INSERT INTO `wp_posts` VALUES (94,1,'2023-09-20 15:40:12','2023-09-20 15:40:12','','things-to-do-nature-adventures','','inherit','open','closed','','things-to-do-nature-adventures','','','2023-09-20 15:40:12','2023-09-20 15:40:12','',0,'http://choctaw-landing-prod.local/wp-content/uploads/2023/09/things-to-do-nature-adventures.jpg',0,'attachment','image/jpeg',0);
INSERT INTO `wp_posts` VALUES (95,1,'2023-09-20 15:40:12','2023-09-20 15:40:12','','things-to-do-water-adventures','','inherit','open','closed','','things-to-do-water-adventures','','','2023-09-20 15:40:12','2023-09-20 15:40:12','',0,'http://choctaw-landing-prod.local/wp-content/uploads/2023/09/things-to-do-water-adventures.jpg',0,'attachment','image/jpeg',0);
INSERT INTO `wp_posts` VALUES (96,1,'2023-09-20 15:53:59','2023-09-20 15:53:59','','mercantile-call-to-action-placeholder','','inherit','open','closed','','mercantile-call-to-action-placeholder','','','2023-09-20 15:53:59','2023-09-20 15:53:59','',0,'http://choctaw-landing-prod.local/wp-content/uploads/2023/09/mercantile-call-to-action-placeholder.jpg',0,'attachment','image/jpeg',0);
INSERT INTO `wp_posts` VALUES (97,1,'2023-09-20 19:19:52','2023-09-20 19:19:52','','eat-and-drink-header','','inherit','open','closed','','eat-and-drink-header','','','2023-09-20 19:19:52','2023-09-20 19:19:52','',0,'http://choctaw-landing-prod.local/wp-content/uploads/2023/09/eat-and-drink-header.jpg',0,'attachment','image/jpeg',0);
INSERT INTO `wp_posts` VALUES (98,1,'2023-09-20 19:19:52','2023-09-20 19:19:52','','entertainment-header','','inherit','open','closed','','entertainment-header','','','2023-09-20 19:19:52','2023-09-20 19:19:52','',0,'http://choctaw-landing-prod.local/wp-content/uploads/2023/09/entertainment-header.jpg',0,'attachment','image/jpeg',0);
INSERT INTO `wp_posts` VALUES (99,1,'2023-09-20 19:19:52','2023-09-20 19:19:52','','mercantile-header','','inherit','open','closed','','mercantile-header','','','2023-09-20 19:19:52','2023-09-20 19:19:52','',0,'http://choctaw-landing-prod.local/wp-content/uploads/2023/09/mercantile-header.jpg',0,'attachment','image/jpeg',0);
INSERT INTO `wp_posts` VALUES (100,1,'2023-09-20 19:19:52','2023-09-20 19:19:52','','things-to-do-header','','inherit','open','closed','','things-to-do-header','','','2023-09-20 19:19:52','2023-09-20 19:19:52','',0,'http://choctaw-landing-prod.local/wp-content/uploads/2023/09/things-to-do-header.jpg',0,'attachment','image/jpeg',0);
INSERT INTO `wp_posts` VALUES (101,1,'2023-09-20 19:23:12','2023-09-20 19:23:12','','stay-header','','inherit','open','closed','','stay-header','','','2023-09-20 19:23:12','2023-09-20 19:23:12','',0,'http://choctaw-landing-prod.local/wp-content/uploads/2023/09/stay-header.jpg',0,'attachment','image/jpeg',0);
INSERT INTO `wp_posts` VALUES (102,1,'2023-09-22 16:18:41','2023-09-20 20:18:01','','Rooms','','publish','closed','closed','','rooms','','','2023-09-22 16:18:41','2023-09-22 16:18:41','',0,'http://choctaw-landing-prod.local/?p=102',2,'nav_menu_item','',0);
INSERT INTO `wp_posts` VALUES (103,1,'2023-09-22 16:18:41','2023-09-20 20:18:01','','Amenities','','publish','closed','closed','','amenities','','','2023-09-22 16:18:41','2023-09-22 16:18:41','',0,'http://choctaw-landing-prod.local/?p=103',7,'nav_menu_item','',0);
INSERT INTO `wp_posts` VALUES (104,1,'2023-09-22 16:18:41','2023-09-20 20:18:01','','Directions','','publish','closed','closed','','directions','','','2023-09-22 16:18:41','2023-09-22 16:18:41','',0,'http://choctaw-landing-prod.local/?p=104',12,'nav_menu_item','',0);
INSERT INTO `wp_posts` VALUES (105,1,'2023-09-22 16:18:41','2023-09-20 20:18:01','','King Suites','','publish','closed','closed','','king-suites','','','2023-09-22 16:18:41','2023-09-22 16:18:41','',0,'http://choctaw-landing-prod.local/?p=105',3,'nav_menu_item','',0);
INSERT INTO `wp_posts` VALUES (106,1,'2023-09-22 16:18:41','2023-09-20 20:18:01','','Queen Suites','','publish','closed','closed','','queen-suites','','','2023-09-22 16:18:41','2023-09-22 16:18:41','',0,'http://choctaw-landing-prod.local/?p=106',4,'nav_menu_item','',0);
INSERT INTO `wp_posts` VALUES (107,1,'2023-09-22 16:18:41','2023-09-20 20:18:01','','Family Suites','','publish','closed','closed','','family-suites','','','2023-09-22 16:18:41','2023-09-22 16:18:41','',0,'http://choctaw-landing-prod.local/?p=107',5,'nav_menu_item','',0);
INSERT INTO `wp_posts` VALUES (108,1,'2023-09-22 16:18:41','2023-09-20 20:18:01','','Luxury Suites','','publish','closed','closed','','luxury-suites','','','2023-09-22 16:18:41','2023-09-22 16:18:41','',0,'http://choctaw-landing-prod.local/?p=108',6,'nav_menu_item','',0);
INSERT INTO `wp_posts` VALUES (109,1,'2023-09-22 16:18:41','2023-09-20 21:08:08','','Oka Sita','','publish','closed','closed','','oka-sita','','','2023-09-22 16:18:41','2023-09-22 16:18:41','',0,'http://choctaw-landing-prod.local/?p=109',8,'nav_menu_item','',0);
INSERT INTO `wp_posts` VALUES (110,1,'2023-09-22 16:18:41','2023-09-20 21:08:08','','Pool Bar','','publish','closed','closed','','pool-bar','','','2023-09-22 16:18:41','2023-09-22 16:18:41','',0,'http://choctaw-landing-prod.local/?p=110',9,'nav_menu_item','',0);
INSERT INTO `wp_posts` VALUES (111,1,'2023-09-22 16:18:41','2023-09-20 21:08:08','','Spa','','publish','closed','closed','','spa','','','2023-09-22 16:18:41','2023-09-22 16:18:41','',0,'http://choctaw-landing-prod.local/?p=111',10,'nav_menu_item','',0);
INSERT INTO `wp_posts` VALUES (112,1,'2023-09-22 16:18:41','2023-09-20 21:08:08','','Fitness Center','','publish','closed','closed','','fitness-center','','','2023-09-22 16:18:41','2023-09-22 16:18:41','',0,'http://choctaw-landing-prod.local/?p=112',11,'nav_menu_item','',0);
INSERT INTO `wp_posts` VALUES (113,1,'2023-09-22 16:18:41','2023-09-20 21:08:08','','From DFW','','publish','closed','closed','','from-dfw','','','2023-09-22 16:18:41','2023-09-22 16:18:41','',0,'http://choctaw-landing-prod.local/?p=113',13,'nav_menu_item','',0);
INSERT INTO `wp_posts` VALUES (114,1,'2023-09-22 16:18:41','2023-09-20 21:08:08','','From OKC','','publish','closed','closed','','from-okc','','','2023-09-22 16:18:41','2023-09-22 16:18:41','',0,'http://choctaw-landing-prod.local/?p=114',14,'nav_menu_item','',0);
INSERT INTO `wp_posts` VALUES (115,1,'2023-09-22 16:18:41','2023-09-20 21:08:08','','From Hot Springs','','publish','closed','closed','','from-hot-springs','','','2023-09-22 16:18:41','2023-09-22 16:18:41','',0,'http://choctaw-landing-prod.local/?p=115',15,'nav_menu_item','',0);
INSERT INTO `wp_posts` VALUES (116,1,'2023-09-22 16:18:41','2023-09-20 21:08:08','','From Shreveport','','publish','closed','closed','','from-shreveport','','','2023-09-22 16:18:41','2023-09-22 16:18:41','',0,'http://choctaw-landing-prod.local/?p=116',16,'nav_menu_item','',0);
INSERT INTO `wp_posts` VALUES (117,1,'2023-09-21 19:00:06','2023-09-21 19:00:06','a:8:{s:8:\"location\";a:1:{i:0;a:1:{i:0;a:3:{s:5:\"param\";s:12:\"options_page\";s:8:\"operator\";s:2:\"==\";s:5:\"value\";s:17:\"mega-menu-content\";}}}s:8:\"position\";s:6:\"normal\";s:5:\"style\";s:7:\"default\";s:15:\"label_placement\";s:3:\"top\";s:21:\"instruction_placement\";s:5:\"label\";s:14:\"hide_on_screen\";s:0:\"\";s:11:\"description\";s:0:\"\";s:12:\"show_in_rest\";i:0;}','Mega Menu Content','mega-menu-content','publish','closed','closed','','group_650c927c8f4a1','','','2023-09-21 19:28:47','2023-09-21 19:28:47','',0,'http://choctaw-landing-prod.local/?post_type=acf-field-group&#038;p=117',0,'acf-field-group','',0);
INSERT INTO `wp_posts` VALUES (118,1,'2023-09-21 18:59:46','2023-09-21 18:59:46','a:15:{s:10:\"page_title\";s:17:\"Mega Menu Content\";s:9:\"menu_slug\";s:17:\"mega-menu-content\";s:11:\"parent_slug\";s:4:\"none\";s:22:\"advanced_configuration\";b:0;s:8:\"icon_url\";s:0:\"\";s:10:\"menu_title\";s:0:\"\";s:8:\"position\";N;s:8:\"redirect\";b:0;s:11:\"description\";s:0:\"\";s:13:\"update_button\";s:6:\"Update\";s:15:\"updated_message\";s:15:\"Options Updated\";s:10:\"capability\";s:10:\"edit_posts\";s:12:\"data_storage\";s:7:\"options\";s:7:\"post_id\";s:0:\"\";s:8:\"autoload\";b:0;}','Mega Menu Content','mega-menu-content','publish','closed','closed','','ui_options_page_650c92a25cdd6','','','2023-09-21 18:59:46','2023-09-21 18:59:46','',0,'http://choctaw-landing-prod.local/?post_type=acf-ui-options-page&p=118',0,'acf-ui-options-page','',0);
INSERT INTO `wp_posts` VALUES (119,1,'2023-09-21 19:00:06','2023-09-21 19:00:06','a:11:{s:10:\"aria-label\";s:0:\"\";s:4:\"type\";s:7:\"wysiwyg\";s:12:\"instructions\";s:0:\"\";s:8:\"required\";i:0;s:17:\"conditional_logic\";i:0;s:7:\"wrapper\";a:3:{s:5:\"width\";s:0:\"\";s:5:\"class\";s:0:\"\";s:2:\"id\";s:0:\"\";}s:13:\"default_value\";s:0:\"\";s:4:\"tabs\";s:3:\"all\";s:7:\"toolbar\";s:4:\"full\";s:12:\"media_upload\";i:1;s:5:\"delay\";i:0;}','Stay Content','stay_content','publish','closed','closed','','field_650c927c42c11','','','2023-09-21 19:00:06','2023-09-21 19:00:06','',117,'http://choctaw-landing-prod.local/?post_type=acf-field&p=119',0,'acf-field','',0);
INSERT INTO `wp_posts` VALUES (121,1,'2023-09-21 19:24:12','2023-09-21 19:24:12','a:11:{s:10:\"aria-label\";s:0:\"\";s:4:\"type\";s:7:\"wysiwyg\";s:12:\"instructions\";s:0:\"\";s:8:\"required\";i:0;s:17:\"conditional_logic\";i:0;s:7:\"wrapper\";a:3:{s:5:\"width\";s:0:\"\";s:5:\"class\";s:0:\"\";s:2:\"id\";s:0:\"\";}s:13:\"default_value\";s:0:\"\";s:4:\"tabs\";s:3:\"all\";s:7:\"toolbar\";s:4:\"full\";s:12:\"media_upload\";i:1;s:5:\"delay\";i:0;}','Eat & Drink Content','eat_and_drink_content','publish','closed','closed','','field_650c982d15823','','','2023-09-21 19:24:28','2023-09-21 19:24:28','',117,'http://choctaw-landing-prod.local/?post_type=acf-field&#038;p=121',1,'acf-field','',0);
INSERT INTO `wp_posts` VALUES (125,1,'2023-09-21 19:28:04','2023-09-21 19:28:04','a:11:{s:10:\"aria-label\";s:0:\"\";s:4:\"type\";s:7:\"wysiwyg\";s:12:\"instructions\";s:0:\"\";s:8:\"required\";i:0;s:17:\"conditional_logic\";i:0;s:7:\"wrapper\";a:3:{s:5:\"width\";s:0:\"\";s:5:\"class\";s:0:\"\";s:2:\"id\";s:0:\"\";}s:13:\"default_value\";s:0:\"\";s:4:\"tabs\";s:3:\"all\";s:7:\"toolbar\";s:4:\"full\";s:12:\"media_upload\";i:1;s:5:\"delay\";i:0;}','Entertainment Content','entertainment_content','publish','closed','closed','','field_650c9936315fa','','','2023-09-21 19:28:04','2023-09-21 19:28:04','',117,'http://choctaw-landing-prod.local/?post_type=acf-field&p=125',2,'acf-field','',0);
INSERT INTO `wp_posts` VALUES (126,1,'2023-09-21 19:28:47','2023-09-21 19:28:47','a:11:{s:10:\"aria-label\";s:0:\"\";s:4:\"type\";s:7:\"wysiwyg\";s:12:\"instructions\";s:0:\"\";s:8:\"required\";i:0;s:17:\"conditional_logic\";i:0;s:7:\"wrapper\";a:3:{s:5:\"width\";s:0:\"\";s:5:\"class\";s:0:\"\";s:2:\"id\";s:0:\"\";}s:13:\"default_value\";s:0:\"\";s:4:\"tabs\";s:3:\"all\";s:7:\"toolbar\";s:4:\"full\";s:12:\"media_upload\";i:1;s:5:\"delay\";i:0;}','Things To Do Content','things_to_do_content','publish','closed','closed','','field_650c995177c1f','','','2023-09-21 19:28:47','2023-09-21 19:28:47','',117,'http://choctaw-landing-prod.local/?post_type=acf-field&p=126',3,'acf-field','',0);
INSERT INTO `wp_posts` VALUES (127,1,'2023-09-21 19:28:47','2023-09-21 19:28:47','a:11:{s:10:\"aria-label\";s:0:\"\";s:4:\"type\";s:7:\"wysiwyg\";s:12:\"instructions\";s:0:\"\";s:8:\"required\";i:0;s:17:\"conditional_logic\";i:0;s:7:\"wrapper\";a:3:{s:5:\"width\";s:0:\"\";s:5:\"class\";s:0:\"\";s:2:\"id\";s:0:\"\";}s:13:\"default_value\";s:0:\"\";s:4:\"tabs\";s:3:\"all\";s:7:\"toolbar\";s:4:\"full\";s:12:\"media_upload\";i:1;s:5:\"delay\";i:0;}','Mercantile Content','mercantile_content','publish','closed','closed','','field_650c995077c1e','','','2023-09-21 19:28:47','2023-09-21 19:28:47','',117,'http://choctaw-landing-prod.local/?post_type=acf-field&p=127',4,'acf-field','',0);
INSERT INTO `wp_posts` VALUES (128,1,'2023-09-22 16:18:41','2023-09-21 19:47:20','','Eat','','publish','closed','closed','','eat','','','2023-09-22 16:18:41','2023-09-22 16:18:41','',0,'http://choctaw-landing-prod.local/?p=128',18,'nav_menu_item','',0);
INSERT INTO `wp_posts` VALUES (129,1,'2023-09-22 16:18:41','2023-09-21 19:47:20','','Drink','','publish','closed','closed','','drink','','','2023-09-22 16:18:41','2023-09-22 16:18:41','',0,'http://choctaw-landing-prod.local/?p=129',22,'nav_menu_item','',0);
INSERT INTO `wp_posts` VALUES (130,1,'2023-09-22 16:18:41','2023-09-21 19:47:20','','Tuklo','','publish','closed','closed','','tuklo','','','2023-09-22 16:18:41','2023-09-22 16:18:41','',0,'http://choctaw-landing-prod.local/?p=130',19,'nav_menu_item','',0);
INSERT INTO `wp_posts` VALUES (131,1,'2023-09-22 16:18:41','2023-09-21 19:47:20','','Containers','','publish','closed','closed','','containers','','','2023-09-22 16:18:41','2023-09-22 16:18:41','',0,'http://choctaw-landing-prod.local/?p=131',20,'nav_menu_item','',0);
INSERT INTO `wp_posts` VALUES (132,1,'2023-09-22 16:18:41','2023-09-21 19:47:20','','Mercantile Deli','','publish','closed','closed','','mercantile-deli','','','2023-09-22 16:18:41','2023-09-22 16:18:41','',0,'http://choctaw-landing-prod.local/?p=132',21,'nav_menu_item','',0);
INSERT INTO `wp_posts` VALUES (133,1,'2023-09-22 16:18:41','2023-09-21 19:47:20','','Casino Bar','','publish','closed','closed','','casino-bar','','','2023-09-22 16:18:41','2023-09-22 16:18:41','',0,'http://choctaw-landing-prod.local/?p=133',23,'nav_menu_item','',0);
INSERT INTO `wp_posts` VALUES (134,1,'2023-09-22 16:18:41','2023-09-21 19:47:20','','Pool Bar','','publish','closed','closed','','pool-bar-2','','','2023-09-22 16:18:41','2023-09-22 16:18:41','',0,'http://choctaw-landing-prod.local/?p=134',24,'nav_menu_item','',0);
INSERT INTO `wp_posts` VALUES (135,1,'2023-09-22 16:18:41','2023-09-21 20:40:38','','Adventure','','publish','closed','closed','','adventure','','','2023-09-22 16:18:41','2023-09-22 16:18:41','',0,'http://choctaw-landing-prod.local/?p=135',35,'nav_menu_item','',0);
INSERT INTO `wp_posts` VALUES (136,1,'2023-09-22 16:18:41','2023-09-21 20:40:38','','Water','','publish','closed','closed','','water','','','2023-09-22 16:18:41','2023-09-22 16:18:41','',0,'http://choctaw-landing-prod.local/?p=136',36,'nav_menu_item','',0);
INSERT INTO `wp_posts` VALUES (137,1,'2023-09-22 16:18:41','2023-09-21 20:40:38','','Outdoors','','publish','closed','closed','','outdoors','','','2023-09-22 16:18:41','2023-09-22 16:18:41','',0,'http://choctaw-landing-prod.local/?p=137',37,'nav_menu_item','',0);
INSERT INTO `wp_posts` VALUES (138,1,'2023-09-22 16:18:41','2023-09-21 20:40:38','','Kid\'s Camp','','publish','closed','closed','','kids-camp','','','2023-09-22 16:18:41','2023-09-22 16:18:41','',0,'http://choctaw-landing-prod.local/?p=138',38,'nav_menu_item','',0);
INSERT INTO `wp_posts` VALUES (139,1,'2023-09-22 16:18:41','2023-09-21 20:40:38','','Cultural Activities','','publish','closed','closed','','cultural-activities','','','2023-09-22 16:18:41','2023-09-22 16:18:41','',0,'http://choctaw-landing-prod.local/?p=139',39,'nav_menu_item','',0);
INSERT INTO `wp_posts` VALUES (140,1,'2023-09-22 16:18:41','2023-09-21 20:40:38','','Menu Item','','publish','closed','closed','','menu-item-4','','','2023-09-22 16:18:41','2023-09-22 16:18:41','',0,'http://choctaw-landing-prod.local/?p=140',40,'nav_menu_item','',0);
INSERT INTO `wp_posts` VALUES (141,1,'2023-09-22 16:18:41','2023-09-21 20:40:38','','Area Attractions','','publish','closed','closed','','area-attractions','','','2023-09-22 16:18:41','2023-09-22 16:18:41','',0,'http://choctaw-landing-prod.local/?p=141',41,'nav_menu_item','',0);
INSERT INTO `wp_posts` VALUES (142,1,'2023-09-22 16:18:41','2023-09-21 20:40:38','','Menu Item','','publish','closed','closed','','menu-item-5','','','2023-09-22 16:18:41','2023-09-22 16:18:41','',0,'http://choctaw-landing-prod.local/?p=142',42,'nav_menu_item','',0);
INSERT INTO `wp_posts` VALUES (143,1,'2023-09-22 16:18:41','2023-09-21 20:40:38','','Menu Item','','publish','closed','closed','','menu-item-6','','','2023-09-22 16:18:41','2023-09-22 16:18:41','',0,'http://choctaw-landing-prod.local/?p=143',43,'nav_menu_item','',0);
INSERT INTO `wp_posts` VALUES (144,1,'2023-09-22 16:18:41','2023-09-21 20:40:38','','Menu Item','','publish','closed','closed','','menu-item-7','','','2023-09-22 16:18:41','2023-09-22 16:18:41','',0,'http://choctaw-landing-prod.local/?p=144',44,'nav_menu_item','',0);
INSERT INTO `wp_posts` VALUES (145,1,'2023-09-22 16:18:41','2023-09-21 20:40:38','','Menu Item','','publish','closed','closed','','menu-item-8','','','2023-09-22 16:18:41','2023-09-22 16:18:41','',0,'http://choctaw-landing-prod.local/?p=145',45,'nav_menu_item','',0);
INSERT INTO `wp_posts` VALUES (146,1,'2023-09-22 16:18:41','2023-09-21 20:40:38','','Cypress Lawn','','publish','closed','closed','','cypress-lawn','','','2023-09-22 16:18:41','2023-09-22 16:18:41','',0,'http://choctaw-landing-prod.local/?p=146',26,'nav_menu_item','',0);
INSERT INTO `wp_posts` VALUES (147,1,'2023-09-22 16:18:41','2023-09-21 20:40:38','','Concerts','','publish','closed','closed','','concerts','','','2023-09-22 16:18:41','2023-09-22 16:18:41','',0,'http://choctaw-landing-prod.local/?p=147',27,'nav_menu_item','',0);
INSERT INTO `wp_posts` VALUES (148,1,'2023-09-22 16:18:41','2023-09-21 20:40:38','','Menu Item','','publish','closed','closed','','menu-item','','','2023-09-22 16:18:41','2023-09-22 16:18:41','',0,'http://choctaw-landing-prod.local/?p=148',28,'nav_menu_item','',0);
INSERT INTO `wp_posts` VALUES (149,1,'2023-09-22 16:18:41','2023-09-21 20:40:38','','Item','','publish','closed','closed','','item','','','2023-09-22 16:18:41','2023-09-22 16:18:41','',0,'http://choctaw-landing-prod.local/?p=149',29,'nav_menu_item','',0);
INSERT INTO `wp_posts` VALUES (150,1,'2023-09-22 16:18:41','2023-09-21 20:40:38','','Rules/Disclaimers','','publish','closed','closed','','rules-disclaimers','','','2023-09-22 16:18:41','2023-09-22 16:18:41','',0,'http://choctaw-landing-prod.local/?p=150',30,'nav_menu_item','',0);
INSERT INTO `wp_posts` VALUES (151,1,'2023-09-22 16:18:41','2023-09-21 20:40:38','','Calendar','','publish','closed','closed','','calendar','','','2023-09-22 16:18:41','2023-09-22 16:18:41','',0,'http://choctaw-landing-prod.local/?p=151',31,'nav_menu_item','',0);
INSERT INTO `wp_posts` VALUES (152,1,'2023-09-22 16:18:41','2023-09-21 20:40:38','','Menu Item','','publish','closed','closed','','menu-item-2','','','2023-09-22 16:18:41','2023-09-22 16:18:41','',0,'http://choctaw-landing-prod.local/?p=152',32,'nav_menu_item','',0);
INSERT INTO `wp_posts` VALUES (153,1,'2023-09-22 16:18:41','2023-09-21 20:40:38','','Menu Item','','publish','closed','closed','','menu-item-3','','','2023-09-22 16:18:41','2023-09-22 16:18:41','',0,'http://choctaw-landing-prod.local/?p=153',33,'nav_menu_item','',0);
/*!40000 ALTER TABLE `wp_posts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wp_term_relationships`
--

DROP TABLE IF EXISTS `wp_term_relationships`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `wp_term_relationships` (
  `object_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `term_taxonomy_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `term_order` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`object_id`,`term_taxonomy_id`),
  KEY `term_taxonomy_id` (`term_taxonomy_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wp_term_relationships`
--

LOCK TABLES `wp_term_relationships` WRITE;
/*!40000 ALTER TABLE `wp_term_relationships` DISABLE KEYS */;
INSERT INTO `wp_term_relationships` VALUES (1,1,0);
INSERT INTO `wp_term_relationships` VALUES (23,2,0);
INSERT INTO `wp_term_relationships` VALUES (25,3,0);
INSERT INTO `wp_term_relationships` VALUES (26,3,0);
INSERT INTO `wp_term_relationships` VALUES (27,3,0);
INSERT INTO `wp_term_relationships` VALUES (28,4,0);
INSERT INTO `wp_term_relationships` VALUES (29,4,0);
INSERT INTO `wp_term_relationships` VALUES (30,4,0);
INSERT INTO `wp_term_relationships` VALUES (31,4,0);
INSERT INTO `wp_term_relationships` VALUES (32,5,0);
INSERT INTO `wp_term_relationships` VALUES (33,5,0);
INSERT INTO `wp_term_relationships` VALUES (34,5,0);
INSERT INTO `wp_term_relationships` VALUES (35,5,0);
INSERT INTO `wp_term_relationships` VALUES (36,5,0);
INSERT INTO `wp_term_relationships` VALUES (37,5,0);
INSERT INTO `wp_term_relationships` VALUES (38,5,0);
INSERT INTO `wp_term_relationships` VALUES (66,2,0);
INSERT INTO `wp_term_relationships` VALUES (79,2,0);
INSERT INTO `wp_term_relationships` VALUES (80,2,0);
INSERT INTO `wp_term_relationships` VALUES (81,2,0);
INSERT INTO `wp_term_relationships` VALUES (82,2,0);
INSERT INTO `wp_term_relationships` VALUES (102,2,0);
INSERT INTO `wp_term_relationships` VALUES (103,2,0);
INSERT INTO `wp_term_relationships` VALUES (104,2,0);
INSERT INTO `wp_term_relationships` VALUES (105,2,0);
INSERT INTO `wp_term_relationships` VALUES (106,2,0);
INSERT INTO `wp_term_relationships` VALUES (107,2,0);
INSERT INTO `wp_term_relationships` VALUES (108,2,0);
INSERT INTO `wp_term_relationships` VALUES (109,2,0);
INSERT INTO `wp_term_relationships` VALUES (110,2,0);
INSERT INTO `wp_term_relationships` VALUES (111,2,0);
INSERT INTO `wp_term_relationships` VALUES (112,2,0);
INSERT INTO `wp_term_relationships` VALUES (113,2,0);
INSERT INTO `wp_term_relationships` VALUES (114,2,0);
INSERT INTO `wp_term_relationships` VALUES (115,2,0);
INSERT INTO `wp_term_relationships` VALUES (116,2,0);
INSERT INTO `wp_term_relationships` VALUES (128,2,0);
INSERT INTO `wp_term_relationships` VALUES (129,2,0);
INSERT INTO `wp_term_relationships` VALUES (130,2,0);
INSERT INTO `wp_term_relationships` VALUES (131,2,0);
INSERT INTO `wp_term_relationships` VALUES (132,2,0);
INSERT INTO `wp_term_relationships` VALUES (133,2,0);
INSERT INTO `wp_term_relationships` VALUES (134,2,0);
INSERT INTO `wp_term_relationships` VALUES (135,2,0);
INSERT INTO `wp_term_relationships` VALUES (136,2,0);
INSERT INTO `wp_term_relationships` VALUES (137,2,0);
INSERT INTO `wp_term_relationships` VALUES (138,2,0);
INSERT INTO `wp_term_relationships` VALUES (139,2,0);
INSERT INTO `wp_term_relationships` VALUES (140,2,0);
INSERT INTO `wp_term_relationships` VALUES (141,2,0);
INSERT INTO `wp_term_relationships` VALUES (142,2,0);
INSERT INTO `wp_term_relationships` VALUES (143,2,0);
INSERT INTO `wp_term_relationships` VALUES (144,2,0);
INSERT INTO `wp_term_relationships` VALUES (145,2,0);
INSERT INTO `wp_term_relationships` VALUES (146,2,0);
INSERT INTO `wp_term_relationships` VALUES (147,2,0);
INSERT INTO `wp_term_relationships` VALUES (148,2,0);
INSERT INTO `wp_term_relationships` VALUES (149,2,0);
INSERT INTO `wp_term_relationships` VALUES (150,2,0);
INSERT INTO `wp_term_relationships` VALUES (151,2,0);
INSERT INTO `wp_term_relationships` VALUES (152,2,0);
INSERT INTO `wp_term_relationships` VALUES (153,2,0);
/*!40000 ALTER TABLE `wp_term_relationships` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wp_term_taxonomy`
--

DROP TABLE IF EXISTS `wp_term_taxonomy`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `wp_term_taxonomy` (
  `term_taxonomy_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `term_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `taxonomy` varchar(32) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `description` longtext COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `parent` bigint(20) unsigned NOT NULL DEFAULT '0',
  `count` bigint(20) NOT NULL DEFAULT '0',
  PRIMARY KEY (`term_taxonomy_id`),
  UNIQUE KEY `term_id_taxonomy` (`term_id`,`taxonomy`),
  KEY `taxonomy` (`taxonomy`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wp_term_taxonomy`
--

LOCK TABLES `wp_term_taxonomy` WRITE;
/*!40000 ALTER TABLE `wp_term_taxonomy` DISABLE KEYS */;
INSERT INTO `wp_term_taxonomy` VALUES (1,1,'category','',0,1);
INSERT INTO `wp_term_taxonomy` VALUES (2,2,'nav_menu','',0,47);
INSERT INTO `wp_term_taxonomy` VALUES (3,3,'nav_menu','',0,3);
INSERT INTO `wp_term_taxonomy` VALUES (4,4,'nav_menu','',0,4);
INSERT INTO `wp_term_taxonomy` VALUES (5,5,'nav_menu','',0,7);
/*!40000 ALTER TABLE `wp_term_taxonomy` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wp_termmeta`
--

DROP TABLE IF EXISTS `wp_termmeta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `wp_termmeta` (
  `meta_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `term_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `meta_key` varchar(255) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `meta_value` longtext COLLATE utf8mb4_unicode_520_ci,
  PRIMARY KEY (`meta_id`),
  KEY `term_id` (`term_id`),
  KEY `meta_key` (`meta_key`(191))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wp_termmeta`
--

LOCK TABLES `wp_termmeta` WRITE;
/*!40000 ALTER TABLE `wp_termmeta` DISABLE KEYS */;
/*!40000 ALTER TABLE `wp_termmeta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wp_terms`
--

DROP TABLE IF EXISTS `wp_terms`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `wp_terms` (
  `term_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(200) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `slug` varchar(200) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `term_group` bigint(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`term_id`),
  KEY `slug` (`slug`(191)),
  KEY `name` (`name`(191))
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wp_terms`
--

LOCK TABLES `wp_terms` WRITE;
/*!40000 ALTER TABLE `wp_terms` DISABLE KEYS */;
INSERT INTO `wp_terms` VALUES (1,'Uncategorized','uncategorized',0);
INSERT INTO `wp_terms` VALUES (2,'Main Menu','main-menu',0);
INSERT INTO `wp_terms` VALUES (3,'Footer Menu','footer-menu',0);
INSERT INTO `wp_terms` VALUES (4,'Information Footer','information-footer',0);
INSERT INTO `wp_terms` VALUES (5,'Sitemap Footer','sitemap-footer',0);
/*!40000 ALTER TABLE `wp_terms` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wp_usermeta`
--

DROP TABLE IF EXISTS `wp_usermeta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `wp_usermeta` (
  `umeta_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `meta_key` varchar(255) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `meta_value` longtext COLLATE utf8mb4_unicode_520_ci,
  PRIMARY KEY (`umeta_id`),
  KEY `user_id` (`user_id`),
  KEY `meta_key` (`meta_key`(191))
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wp_usermeta`
--

LOCK TABLES `wp_usermeta` WRITE;
/*!40000 ALTER TABLE `wp_usermeta` DISABLE KEYS */;
INSERT INTO `wp_usermeta` VALUES (1,1,'nickname','choctawlanding');
INSERT INTO `wp_usermeta` VALUES (2,1,'first_name','');
INSERT INTO `wp_usermeta` VALUES (3,1,'last_name','');
INSERT INTO `wp_usermeta` VALUES (4,1,'description','');
INSERT INTO `wp_usermeta` VALUES (5,1,'rich_editing','true');
INSERT INTO `wp_usermeta` VALUES (6,1,'syntax_highlighting','true');
INSERT INTO `wp_usermeta` VALUES (7,1,'comment_shortcuts','false');
INSERT INTO `wp_usermeta` VALUES (8,1,'admin_color','fresh');
INSERT INTO `wp_usermeta` VALUES (9,1,'use_ssl','0');
INSERT INTO `wp_usermeta` VALUES (10,1,'show_admin_bar_front','true');
INSERT INTO `wp_usermeta` VALUES (11,1,'locale','');
INSERT INTO `wp_usermeta` VALUES (12,1,'wp_capabilities','a:1:{s:13:\"administrator\";b:1;}');
INSERT INTO `wp_usermeta` VALUES (13,1,'wp_user_level','10');
INSERT INTO `wp_usermeta` VALUES (14,1,'dismissed_wp_pointers','theme_editor_notice');
INSERT INTO `wp_usermeta` VALUES (15,1,'show_welcome_panel','0');
INSERT INTO `wp_usermeta` VALUES (16,1,'session_tokens','a:1:{s:64:\"97463f877f383deb68d818b41e4e6043ed0bf8b468947ddd76e289875b9ee055\";a:4:{s:10:\"expiration\";i:1695501036;s:2:\"ip\";s:9:\"127.0.0.1\";s:2:\"ua\";s:117:\"Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/117.0.0.0 Safari/537.36\";s:5:\"login\";i:1695328236;}}');
INSERT INTO `wp_usermeta` VALUES (17,1,'wp_dashboard_quick_press_last_post_id','90');
INSERT INTO `wp_usermeta` VALUES (18,1,'community-events-location','a:1:{s:2:\"ip\";s:9:\"127.0.0.0\";}');
INSERT INTO `wp_usermeta` VALUES (19,1,'wp_persisted_preferences','a:2:{s:14:\"core/edit-post\";a:2:{s:26:\"isComplementaryAreaVisible\";b:1;s:12:\"welcomeGuide\";b:0;}s:9:\"_modified\";s:24:\"2023-07-26T20:26:00.635Z\";}');
INSERT INTO `wp_usermeta` VALUES (20,1,'managenav-menuscolumnshidden','a:3:{i:0;s:15:\"title-attribute\";i:1;s:3:\"xfn\";i:2;s:11:\"description\";}');
INSERT INTO `wp_usermeta` VALUES (21,1,'metaboxhidden_nav-menus','a:1:{i:0;s:12:\"add-post_tag\";}');
INSERT INTO `wp_usermeta` VALUES (22,1,'nav_menu_recently_edited','2');
INSERT INTO `wp_usermeta` VALUES (23,1,'wp_user-settings','editor=html&libraryContent=browse');
INSERT INTO `wp_usermeta` VALUES (24,1,'wp_user-settings-time','1695328921');
/*!40000 ALTER TABLE `wp_usermeta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wp_users`
--

DROP TABLE IF EXISTS `wp_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `wp_users` (
  `ID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_login` varchar(60) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `user_pass` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `user_nicename` varchar(50) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `user_email` varchar(100) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `user_url` varchar(100) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `user_registered` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `user_activation_key` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `user_status` int(11) NOT NULL DEFAULT '0',
  `display_name` varchar(250) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`ID`),
  KEY `user_login_key` (`user_login`),
  KEY `user_nicename` (`user_nicename`),
  KEY `user_email` (`user_email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wp_users`
--

LOCK TABLES `wp_users` WRITE;
/*!40000 ALTER TABLE `wp_users` DISABLE KEYS */;
INSERT INTO `wp_users` VALUES (1,'choctawlanding','$P$BKJwbVAl.L0tbimiejza6vmyxJ32Vy.','choctawlanding','bperkins@choctawnation.com','http://choctaw-landing-prod.local','2023-07-26 19:56:41','',0,'choctawlanding');
/*!40000 ALTER TABLE `wp_users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wp_wpmailsmtp_debug_events`
--

DROP TABLE IF EXISTS `wp_wpmailsmtp_debug_events`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `wp_wpmailsmtp_debug_events` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `content` text COLLATE utf8mb4_unicode_520_ci,
  `initiator` text COLLATE utf8mb4_unicode_520_ci,
  `event_type` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wp_wpmailsmtp_debug_events`
--

LOCK TABLES `wp_wpmailsmtp_debug_events` WRITE;
/*!40000 ALTER TABLE `wp_wpmailsmtp_debug_events` DISABLE KEYS */;
/*!40000 ALTER TABLE `wp_wpmailsmtp_debug_events` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wp_wpmailsmtp_tasks_meta`
--

DROP TABLE IF EXISTS `wp_wpmailsmtp_tasks_meta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `wp_wpmailsmtp_tasks_meta` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `action` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `data` longtext COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wp_wpmailsmtp_tasks_meta`
--

LOCK TABLES `wp_wpmailsmtp_tasks_meta` WRITE;
/*!40000 ALTER TABLE `wp_wpmailsmtp_tasks_meta` DISABLE KEYS */;
/*!40000 ALTER TABLE `wp_wpmailsmtp_tasks_meta` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-10-04 10:28:34
