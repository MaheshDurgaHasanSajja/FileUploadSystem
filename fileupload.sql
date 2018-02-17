-- MySQL dump 10.13  Distrib 5.7.21, for Linux (x86_64)
--
-- Host: localhost    Database: pdfdb
-- ------------------------------------------------------
-- Server version	5.7.21-0ubuntu0.16.04.1

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
-- Table structure for table `groups`
--

DROP TABLE IF EXISTS `groups`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Primary key of users table',
  `group_name` varchar(255) DEFAULT NULL COMMENT 'Name of a group',
  `row_status` int(11) DEFAULT '1' COMMENT 'Row status of an user whether active or not 1- Active, 0 - In active',
  `created_time` datetime DEFAULT NULL COMMENT 'Created time of an user',
  `modified_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'MOdified time of user record',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `groups`
--

LOCK TABLES `groups` WRITE;
/*!40000 ALTER TABLE `groups` DISABLE KEYS */;
INSERT INTO `groups` VALUES (1,'E.C.E',1,'2018-02-15 23:04:50','2018-02-15 18:55:51'),(2,'E.E.E',1,'2018-02-15 23:04:54','2018-02-15 18:55:51'),(3,'MECH',1,'2018-02-15 23:04:58','2018-02-15 17:34:58'),(4,'CIVIL',1,'2018-02-15 23:05:02','2018-02-15 17:35:02'),(5,'CSC',1,'2018-02-15 23:05:06','2018-02-15 17:35:06'),(6,'Master of computer applications',1,'2018-02-15 23:05:14','2018-02-15 18:57:42'),(7,'M.B.B.S',0,'2018-02-16 00:27:53','2018-02-15 18:57:56'),(8,'M.B.B.S',1,'2018-02-16 00:28:03','2018-02-15 18:58:03');
/*!40000 ALTER TABLE `groups` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `semisters`
--

DROP TABLE IF EXISTS `semisters`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `semisters` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Primary key of users table',
  `semister_name` varchar(255) DEFAULT NULL COMMENT 'Name of a semister',
  `row_status` int(11) DEFAULT '1' COMMENT 'Row status of an user whether active or not 1- Active, 0 - In active',
  `created_time` datetime DEFAULT NULL COMMENT 'Created time of an user',
  `modified_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'MOdified time of user record',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `semisters`
--

LOCK TABLES `semisters` WRITE;
/*!40000 ALTER TABLE `semisters` DISABLE KEYS */;
INSERT INTO `semisters` VALUES (1,'1-semister',0,'2018-02-15 23:04:01','2018-02-15 18:46:34'),(2,'Semister-II',1,'2018-02-15 23:04:08','2018-02-15 18:27:48'),(3,'Semister-III',1,'2018-02-15 23:04:12','2018-02-15 18:27:48'),(4,'Semister-IV',1,'2018-02-15 23:04:15','2018-02-15 17:34:15'),(5,'Semister-V',1,'2018-02-15 23:04:19','2018-02-15 17:34:19'),(6,'Semister-VI',1,'2018-02-15 23:04:22','2018-02-15 17:34:22'),(7,'Semister - I',1,'2018-02-16 00:16:02','2018-02-15 18:46:02');
/*!40000 ALTER TABLE `semisters` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `subjects`
--

DROP TABLE IF EXISTS `subjects`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `subjects` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Primary key of users table',
  `subject_name` varchar(255) DEFAULT NULL COMMENT 'Name of a subject',
  `row_status` int(11) DEFAULT '1' COMMENT 'Row status of an user whether active or not 1- Active, 0 - In active',
  `created_time` datetime DEFAULT NULL COMMENT 'Created time of an user',
  `modified_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'MOdified time of user record',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subjects`
--

LOCK TABLES `subjects` WRITE;
/*!40000 ALTER TABLE `subjects` DISABLE KEYS */;
INSERT INTO `subjects` VALUES (1,'English',1,'2018-02-15 23:05:47','2018-02-15 19:07:57'),(2,'Mathematics',1,'2018-02-15 23:05:54','2018-02-15 19:07:57'),(3,'Elctronics',1,'2018-02-15 23:06:00','2018-02-15 17:36:00'),(4,'Computers',1,'2018-02-15 23:06:05','2018-02-15 19:07:33'),(5,'Physics',1,'2018-02-15 23:06:14','2018-02-15 17:36:14'),(6,'Java',1,'2018-02-15 23:06:22','2018-02-15 17:36:22'),(7,'Sample',1,'2018-02-16 00:37:50','2018-02-15 19:07:50');
/*!40000 ALTER TABLE `subjects` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_uploads`
--

DROP TABLE IF EXISTS `user_uploads`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_uploads` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Primary key of users table',
  `year` int(11) NOT NULL COMMENT 'Year of a semister',
  `group_id` int(11) NOT NULL COMMENT 'Primary key of groups table',
  `semister_id` int(11) NOT NULL COMMENT 'Primary key of semisters table',
  `subject_id` int(11) NOT NULL COMMENT 'Primary key of subjects table',
  `file_name` varchar(255) NOT NULL COMMENT 'Name of a file uploaded by admin',
  `row_status` int(11) DEFAULT '1' COMMENT 'Row status of an user whether active or not 1- Active, 0 - In active',
  `created_time` datetime DEFAULT NULL COMMENT 'Created time of an user',
  `modified_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'MOdified time of user record',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_uploads`
--

LOCK TABLES `user_uploads` WRITE;
/*!40000 ALTER TABLE `user_uploads` DISABLE KEYS */;
INSERT INTO `user_uploads` VALUES (1,2018,2,3,2,'1518725728.pdf',1,'2018-02-16 01:45:28','2018-02-15 20:40:42'),(2,2018,2,3,2,'1518727195.pdf',0,'2018-02-16 02:09:55','2018-02-15 20:45:25'),(3,2018,1,4,2,'1518734404.pdf',1,'2018-02-16 04:10:04','2018-02-15 22:40:04'),(4,2017,1,3,2,'1518751080.pdf',1,'2018-02-16 08:48:00','2018-02-16 03:18:00');
/*!40000 ALTER TABLE `user_uploads` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Primary key of users table',
  `name` varchar(255) DEFAULT NULL COMMENT 'Name of an user',
  `email` varchar(255) NOT NULL COMMENT 'Email of user',
  `password` varchar(255) NOT NULL COMMENT 'Password of an user',
  `phone_number` varchar(255) NOT NULL COMMENT 'Phone number of an user',
  `gender` enum('F','M') NOT NULL COMMENT 'Gender of an user',
  `address` text NOT NULL COMMENT 'Address of an user',
  `user_type` enum('A','S') DEFAULT NULL COMMENT 'Type of an user A- Admin user, S- student',
  `group_id` int(11) DEFAULT NULL COMMENT 'Primary key of groups table',
  `semister_id` varchar(255) DEFAULT NULL COMMENT 'Primary key of semister table',
  `subject_id` varchar(255) DEFAULT NULL COMMENT 'Primary key of subjects table',
  `year` varchar(255) DEFAULT NULL COMMENT 'Year of subject',
  `row_status` int(11) DEFAULT '1' COMMENT 'Row status of an user whether active or not 1- Active, 0 - In active',
  `created_time` datetime DEFAULT NULL COMMENT 'Created time of an user',
  `modified_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'MOdified time of user record',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Mahesh Sajja','maheshhasan07@gmail.com','$2y$10$QHmv3lp2ME4aEmy0Dd8BROcVbNacI7sGVeGH3sGW2bU7Wr679oDBO','9052467551','M','Hyderabad','A',NULL,NULL,NULL,NULL,1,'2018-02-16 03:35:13','2018-02-15 22:05:13'),(2,'Mahesh Sajja','maheshhasan07@gmail.com','$2y$10$iFuqzfdMRgH37c6YFAOEZuet7i/M9y5U4f8hzWJ/CTy9CIAS6.Y66','905246755','M','Hyderabad','S',2,'[\"2\",\"3\"]','[\"2\"]','[\"2018\",\"2017\",\"2016\",\"2015\"]',1,'2018-02-16 03:35:49','2018-02-15 22:25:56');
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

-- Dump completed on 2018-02-16 11:15:57
