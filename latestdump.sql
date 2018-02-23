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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `groups`
--

LOCK TABLES `groups` WRITE;
/*!40000 ALTER TABLE `groups` DISABLE KEYS */;
INSERT INTO `groups` VALUES (1,'E.C.E',0,'2018-02-15 23:04:50','2018-02-16 17:57:10'),(2,'E.E.E',0,'2018-02-15 23:04:54','2018-02-16 17:57:16'),(3,'MECH',1,'2018-02-15 23:04:58','2018-02-15 17:34:58'),(4,'CIVIL',0,'2018-02-15 23:05:02','2018-02-16 17:59:17'),(5,'CSC',0,'2018-02-15 23:05:06','2018-02-16 17:59:22'),(6,'Master of computer applications',1,'2018-02-15 23:05:14','2018-02-15 18:57:42'),(7,'M.B.B.S',0,'2018-02-16 00:27:53','2018-02-15 18:57:56'),(8,'M.B.B.S',1,'2018-02-16 00:28:03','2018-02-16 17:34:58'),(9,'sdfsadfsdaafsda',0,'2018-02-16 23:04:39','2018-02-16 17:34:47'),(10,'dsfdasdfsadfdsa2:\"\';,.134!@#$%^&*()',0,'2018-02-16 23:27:31','2018-02-16 17:58:49');
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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `semisters`
--

LOCK TABLES `semisters` WRITE;
/*!40000 ALTER TABLE `semisters` DISABLE KEYS */;
INSERT INTO `semisters` VALUES (1,'1-semister',0,'2018-02-15 23:04:01','2018-02-15 18:46:34'),(2,'Semister-II',1,'2018-02-15 23:04:08','2018-02-15 18:27:48'),(3,'Semister-III',0,'2018-02-15 23:04:12','2018-02-16 20:44:45'),(4,'Semister-IV',0,'2018-02-15 23:04:15','2018-02-16 20:44:41'),(5,'Semister-V',0,'2018-02-15 23:04:19','2018-02-16 17:57:03'),(6,'Semister-VI',0,'2018-02-15 23:04:22','2018-02-16 17:56:37'),(7,'Semister-I',0,'2018-02-16 00:16:02','2018-02-16 17:56:27'),(8,'sdafsdcsacsd',0,'2018-02-16 23:02:52','2018-02-16 17:33:00');
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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subjects`
--

LOCK TABLES `subjects` WRITE;
/*!40000 ALTER TABLE `subjects` DISABLE KEYS */;
INSERT INTO `subjects` VALUES (1,'English',1,'2018-02-15 23:05:47','2018-02-15 19:07:57'),(2,'Mathematics',1,'2018-02-15 23:05:54','2018-02-15 19:07:57'),(3,'Elctronics',1,'2018-02-15 23:06:00','2018-02-15 17:36:00'),(4,'Computers',1,'2018-02-15 23:06:05','2018-02-15 19:07:33'),(5,'Physics',1,'2018-02-15 23:06:14','2018-02-15 17:36:14'),(6,'Java',1,'2018-02-15 23:06:22','2018-02-15 17:36:22'),(7,'Sample!@#$%^&*(),.;\';',0,'2018-02-16 00:37:50','2018-02-16 17:59:34'),(8,'sdfsafsdasdfsad',0,'2018-02-16 23:05:44','2018-02-16 17:35:51');
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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_uploads`
--

LOCK TABLES `user_uploads` WRITE;
/*!40000 ALTER TABLE `user_uploads` DISABLE KEYS */;
INSERT INTO `user_uploads` VALUES (1,2018,2,3,2,'1518725728.pdf',1,'2018-02-16 01:45:28','2018-02-15 20:40:42'),(2,2018,2,3,2,'1518727195.pdf',0,'2018-02-16 02:09:55','2018-02-15 20:45:25'),(3,2018,1,4,2,'1518734404.pdf',1,'2018-02-16 04:10:04','2018-02-15 22:40:04'),(4,2017,1,3,2,'1518751080.pdf',0,'2018-02-16 08:48:00','2018-02-16 17:32:46'),(5,2017,2,2,1,'1518802346.pdf',1,'2018-02-16 23:02:26','2018-02-16 17:32:26'),(6,2014,6,4,3,'1518803418.pdf',1,'2018-02-16 23:20:18','2018-02-16 17:50:18'),(7,2016,8,2,3,'1518814775.pdf',1,'2018-02-17 02:29:35','2018-02-16 20:59:35');
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
  `user_type` enum('A','L','S') NOT NULL COMMENT 'Type of an user whether admin, lecturer or student',
  `group_id` int(11) DEFAULT NULL COMMENT 'Primary key of groups table',
  `semister_id` varchar(255) DEFAULT NULL COMMENT 'Primary key of semister table',
  `subject_id` varchar(255) DEFAULT NULL COMMENT 'Primary key of subjects table',
  `year` varchar(255) DEFAULT NULL COMMENT 'Year of subject',
  `row_status` int(11) DEFAULT '1' COMMENT 'Row status of an user whether active or not 1- Active, 0 - In active',
  `created_time` datetime DEFAULT NULL COMMENT 'Created time of an user',
  `modified_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'MOdified time of user record',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Mahesh Sajja','maheshhasan07@gmail.com','$2y$10$QHmv3lp2ME4aEmy0Dd8BROcVbNacI7sGVeGH3sGW2bU7Wr679oDBO','9052467551','M','Hyderabad','A',NULL,NULL,NULL,NULL,1,'2018-02-16 03:35:13','2018-02-15 22:05:13'),(2,'Mahesh Sajja','maheshhasan07@gmail.com','$2y$10$iFuqzfdMRgH37c6YFAOEZuet7i/M9y5U4f8hzWJ/CTy9CIAS6.Y66','905246755','M','Hyderabad','S',2,'[\"2\",\"3\"]','[\"2\"]','[\"2018\",\"2017\",\"2016\",\"2015\"]',1,'2018-02-16 03:35:49','2018-02-15 22:25:56'),(3,'Mahesh Sajja','maheshhasan07+Mahesh@gmail.com','$2y$10$C0xeebYBl9d/Z0ZqcJdbL.ttZZ8yK4twfwQgzPu5MkaVTc4/KyIve','+919052467551','M','Hyderabad','S',2,'[\"2\",\"3\"]','null','[\"2018\",\"2016\",\"2015\"]',1,'2018-02-16 21:52:37','2018-02-16 16:22:37'),(4,'Mahesh Sajja','maheshhasan07@gmail.com','$2y$10$w5o3BN20.M/9oM/qpGB1Uet6epIbnthoG8Cjvc5APlK1BlOjf.Lnm','+919052467551','M','Hyderabad','L',NULL,NULL,NULL,NULL,1,'2018-02-16 22:16:26','2018-02-16 16:48:45'),(5,'Sahu Minu','sahu@gmail.com','$2y$10$F9u9COa4DRB49MfBy/Aymu1wgRgGzUCdWCsaBjooAoJYROZYfCDx6','56465','M','Hyde','L',NULL,NULL,NULL,NULL,1,'2018-02-16 23:32:49','2018-02-16 18:02:49'),(6,'sample','sample@gmial.com','$2y$10$pbLMxMZAKS6Xo90ghDlRM./wn1EAsPJklvK243zBFwbBeGm500asq','456465465','M','sfgd','S',3,'[\"2\"]','null','[\"2018\",\"2017\"]',1,'2018-02-17 02:33:04','2018-02-16 21:03:04'),(7,'Mahesh Sajja','mahesh+lect@gmail.com','$2y$10$k0hmrSpTLqgRusHh58rqAOqeqS0cjj6MfE2phbJ3HZxAocZ4CWHqy','+91905246755','M','Hyd','L',NULL,NULL,NULL,NULL,1,'2018-02-17 12:11:22','2018-02-17 06:41:22');
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

-- Dump completed on 2018-02-23 12:08:06
