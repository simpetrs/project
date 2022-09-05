-- MySQL dump 10.13  Distrib 8.0.25, for macos11.3 (x86_64)
--
-- Host: localhost    Database: verms_db
-- ------------------------------------------------------
-- Server version	8.0.25

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
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `admin` (
  `admin_Id` varchar(50) NOT NULL,
  `admin_Name` text,
  `user_name` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin`
--

LOCK TABLES `admin` WRITE;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` VALUES ('1','Simon','admin@gmail.com','admin@100');
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `alert`
--

DROP TABLE IF EXISTS `alert`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `alert` (
  `alert_Id` varchar(50) NOT NULL,
  `alert_timeDate` date NOT NULL,
  `alert_type` varchar(50) NOT NULL,
  `appointment_Id` varchar(50) NOT NULL COMMENT '{fk}',
  `farmer_Id` varchar(50) NOT NULL COMMENT '{fk}',
  `doctor_Id` varchar(50) NOT NULL COMMENT '{fk}'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `alert`
--

LOCK TABLES `alert` WRITE;
/*!40000 ALTER TABLE `alert` DISABLE KEYS */;
/*!40000 ALTER TABLE `alert` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `animal_disease_cases`
--

DROP TABLE IF EXISTS `animal_disease_cases`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `animal_disease_cases` (
  `id` int NOT NULL AUTO_INCREMENT,
  `disease_case` text NOT NULL,
  `user` int NOT NULL,
  `date_added` date NOT NULL,
  `_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `location` char(200) NOT NULL,
  `animal` smallint DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 ;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `animal_disease_cases`
--

LOCK TABLES `animal_disease_cases` WRITE;
/*!40000 ALTER TABLE `animal_disease_cases` DISABLE KEYS */;
INSERT INTO `animal_disease_cases` VALUES (1,'My chicken are over falling of the tree when they are sleeping',10,'2022-09-05','2022-09-05 06:32:56','Kampala',6);
/*!40000 ALTER TABLE `animal_disease_cases` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `animals`
--

DROP TABLE IF EXISTS `animals`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `animals` (
  `id` int NOT NULL AUTO_INCREMENT,
  `animal` char(100) NOT NULL,
  `date_added` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 ;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `animals`
--

LOCK TABLES `animals` WRITE;
/*!40000 ALTER TABLE `animals` DISABLE KEYS */;
INSERT INTO `animals` VALUES (5,'Goats','2022-09-05'),(6,'Chicken','2022-09-05'),(7,'Sheep','2022-09-05'),(8,'Pigs','2022-09-05');
/*!40000 ALTER TABLE `animals` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `appointment`
--

DROP TABLE IF EXISTS `appointment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `appointment` (
  `user` int NOT NULL,
  `doctor` int NOT NULL,
  `id` int NOT NULL AUTO_INCREMENT,
  `payment` int DEFAULT NULL,
  `description` text,
  `location` varchar(255) DEFAULT NULL,
  `appointment` smallint NOT NULL DEFAULT '1',
  `_time` time DEFAULT NULL,
  `_date` date DEFAULT NULL,
  `date_added` date DEFAULT NULL,
  `status` smallint NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 ;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `appointment`
--

LOCK TABLES `appointment` WRITE;
/*!40000 ALTER TABLE `appointment` DISABLE KEYS */;
INSERT INTO `appointment` VALUES (9,1,5,NULL,'New Chicken Pox','Kampala',1,'23:30:00','2022-09-15','2022-09-01',0),(9,4,6,NULL,'Small Pox','Kampala',2,'23:31:00','2022-09-02','2022-09-01',0),(9,4,7,NULL,'Chicken pox','kampala',1,'10:32:00','2022-09-02','2022-09-02',0),(10,4,8,NULL,'Chicken pox','Kampala',2,'10:52:00','2022-09-16','2022-09-02',0),(10,1,9,NULL,'Chicken all died a natural death','Kampala',1,'12:06:00','2022-09-14','2022-09-05',1);
/*!40000 ALTER TABLE `appointment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `category` (
  `cat_Id` varchar(50) NOT NULL,
  `cat_Name` text NOT NULL,
  `cat_description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `category`
--

LOCK TABLES `category` WRITE;
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
/*!40000 ALTER TABLE `category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `district`
--

DROP TABLE IF EXISTS `district`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `district` (
  `district_Id` varchar(50) NOT NULL,
  `district_Name` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `district`
--

LOCK TABLES `district` WRITE;
/*!40000 ALTER TABLE `district` DISABLE KEYS */;
/*!40000 ALTER TABLE `district` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `doctor`
--

DROP TABLE IF EXISTS `doctor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `doctor` (
  `doctor_Id` varchar(50) NOT NULL,
  `user_Id` varchar(50) NOT NULL COMMENT '{fk}',
  `doctor_registrationNumber` varchar(50) NOT NULL,
  `level_qualification` text NOT NULL,
  `cat_Id` varchar(50) NOT NULL COMMENT '{fk}',
  `doctor_status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `doctor`
--

LOCK TABLES `doctor` WRITE;
/*!40000 ALTER TABLE `doctor` DISABLE KEYS */;
/*!40000 ALTER TABLE `doctor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `farmer`
--

DROP TABLE IF EXISTS `farmer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `farmer` (
  `farmer_Id` varchar(50) NOT NULL,
  `user_Id` varchar(50) NOT NULL COMMENT '{fk}'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `farmer`
--

LOCK TABLES `farmer` WRITE;
/*!40000 ALTER TABLE `farmer` DISABLE KEYS */;
/*!40000 ALTER TABLE `farmer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `messages`
--

DROP TABLE IF EXISTS `messages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `messages` (
  `id` int NOT NULL AUTO_INCREMENT,
  `message` text,
  `sender` int NOT NULL,
  `receiver` int NOT NULL,
  `date_added` date NOT NULL,
  `status` smallint NOT NULL DEFAULT '0',
  `appointment` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 ;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `messages`
--

LOCK TABLES `messages` WRITE;
/*!40000 ALTER TABLE `messages` DISABLE KEYS */;
INSERT INTO `messages` VALUES (1,'We shall meet',1,10,'2022-09-05',0,NULL),(2,'I have changed my mind.',1,10,'2022-09-05',0,9),(3,'Okay, We can now meet',1,10,'2022-09-05',0,9);
/*!40000 ALTER TABLE `messages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `payment`
--

DROP TABLE IF EXISTS `payment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `payment` (
  `payment_Id` varchar(50) NOT NULL,
  `payment_Date` date NOT NULL,
  `payment_Time` time(6) NOT NULL,
  `amount` varchar(50) NOT NULL,
  `farmer_Id` varchar(50) NOT NULL COMMENT '{fk}',
  `doctor_Id` varchar(20) NOT NULL COMMENT '{fk}'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `payment`
--

LOCK TABLES `payment` WRITE;
/*!40000 ALTER TABLE `payment` DISABLE KEYS */;
/*!40000 ALTER TABLE `payment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `payments`
--

DROP TABLE IF EXISTS `payments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `payments` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user` int NOT NULL,
  `amount` int NOT NULL DEFAULT '0',
  `appointment` int NOT NULL,
  `date_added` date NOT NULL,
  `date_paid` date NOT NULL,
  `receipt` char(64) NOT NULL,
  `status` smallint NOT NULL DEFAULT '0',
  `_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `receipt` (`receipt`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 ;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `payments`
--

LOCK TABLES `payments` WRITE;
/*!40000 ALTER TABLE `payments` DISABLE KEYS */;
INSERT INTO `payments` VALUES (1,9,1000,6,'2022-09-01','2022-09-01','ad203a31c5b01573bd8768703300907541df4fcaefbefce05ec3cef18c4a7898',2,'2022-09-03 14:56:47'),(2,9,1000,6,'2022-09-01','2022-09-01','c9261cd2a19ddc757dc4a5a91b76516313e441f3d7a18e3f2ca8999301253d8d',2,'2022-09-03 14:56:47'),(3,9,1000,6,'2022-09-01','2022-09-01','a8ca97f1299818b674855d9014b4a5ca11847646f466a9520b57ac9f22204958',2,'2022-09-03 14:56:47'),(4,9,1500,7,'2022-09-02','2022-09-02','2eea31212acd1fa4c0d25ea0680c03791146c21ea24cd582e72f954d8ac28701',2,'2022-09-03 14:56:47'),(5,10,1500,8,'2022-09-02','2022-09-02','33b6aeb91824b0e33ed25d42049cbc5fc88af79821f2e347332d5d37b3abbe04',1,'2022-09-03 14:56:47'),(6,10,1500,8,'2022-09-02','2022-09-02','39bf3361b9b3fe2abf621caef7d7068b17bb2e21d17c3f644f16c899aa000e97',2,'2022-09-03 14:56:47'),(7,10,1500,8,'2022-09-02','2022-09-02','b35d03563b243fdfd49598862a940cf9d5282345e34a72be02e759707644acc0',2,'2022-09-03 14:56:47'),(8,10,1500,8,'2022-09-02','2022-09-02','f3938a990e0d8a13b555daf9d3e4f54fe6139c429f64bc6fb52f3add1b21465b',2,'2022-09-03 14:56:47'),(9,10,1500,8,'2022-09-02','2022-09-02','5493fc61d9fe812fd86d2ab2f45744a452a85775675bc9dc86479be4752a235a',2,'2022-09-03 14:56:47'),(10,10,800,9,'2022-09-05','2022-09-05','9a5b8b377a9161880277aea7786c2176a0a37fe65d8e879d661d5aa491e5a188',0,'2022-09-05 09:05:32'),(11,10,1000,9,'2022-09-05','2022-09-05','7d1c8ea83b35283874be6319a4b00a56c5f405fd9442aff8d55300e155be4803',2,'2022-09-05 09:07:16'),(12,10,1000,9,'2022-09-05','2022-09-05','ecf85a88b996ad79ee28da3a6d6f7da3fafb899d7b3b5ae98eb8bc1e2f130180',1,'2022-09-05 09:08:28');
/*!40000 ALTER TABLE `payments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user` (
  `user_Id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(13) NOT NULL,
  `user_type` varchar(50) NOT NULL,
  `description` text,
  `job` char(100) DEFAULT NULL,
  `country` char(100) DEFAULT NULL,
  `company` char(100) DEFAULT NULL,
  `address` char(200) DEFAULT NULL,
  `password` char(64) NOT NULL DEFAULT '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4',
  PRIMARY KEY (`user_Id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 ;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'Adima Gilbert','doctor@gmail.com','0750395527','doctor','Doctor by professional','Doctor','Uganda','Verms','Kampala','8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92'),(2,'Simon','admin@gmail.com','0782951174','admin',NULL,NULL,NULL,NULL,NULL,'03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4'),(3,'Bella','farmer@gmail.com','+256750395527','farmer',NULL,NULL,NULL,NULL,NULL,'03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4'),(4,'Simon Amapiri','amapirisimon@gmail.com','0750395527','doctor',NULL,NULL,NULL,NULL,NULL,'03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4'),(5,'Birungi Mourisha','mbirungi@gmail.com','0777345946','farmer',NULL,NULL,NULL,NULL,NULL,'03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4'),(6,'Joseph','joseph@gmail.com','0777766666','farmer',NULL,NULL,NULL,NULL,NULL,'03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4'),(7,'Shaban Deno','shaban@gmail.com','0775395127','farmer',NULL,NULL,NULL,NULL,NULL,'03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4'),(8,'Adima Gilbert','gilbert@gmail.com','0777533333','farmer',NULL,NULL,NULL,NULL,NULL,'03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4'),(9,'ashiraff','ashan@boostedtechs.com','+256759800742','farmer',NULL,NULL,NULL,NULL,NULL,'03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4'),(10,'Ashiraff Tumusiime','ashiraff@tumusii.me','+256759800742','farmer','AM an IT specialist with Verms','IT specialist','Uganda','Verms','Buziga - kampala U','03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4'),(11,'Ashiraff Tumusiime','denish@you.me','+256759800742','farmer',NULL,NULL,NULL,NULL,NULL,'03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-09-05 13:38:36
