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
-- Table structure for table `animal`
--

DROP TABLE IF EXISTS `animal`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `animal` (
  `animal_Id` varchar(50) NOT NULL,
  `animal_Name` text,
  `farmer_Id` varchar(50) NOT NULL COMMENT '{fk}'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `animal`
--

LOCK TABLES `animal` WRITE;
/*!40000 ALTER TABLE `animal` DISABLE KEYS */;
/*!40000 ALTER TABLE `animal` ENABLE KEYS */;
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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 ;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `appointment`
--

LOCK TABLES `appointment` WRITE;
/*!40000 ALTER TABLE `appointment` DISABLE KEYS */;
INSERT INTO `appointment` VALUES (9,1,5,NULL,'New Chicken Pox','Kampala',1,'23:30:00','2022-09-15','2022-09-01'),(9,4,6,NULL,'Small Pox','Kampala',2,'23:31:00','2022-09-02','2022-09-01'),(9,4,7,NULL,'Chicken pox','kampala',1,'10:32:00','2022-09-02','2022-09-02'),(10,4,8,NULL,'Chicken pox','Kampala',2,'10:52:00','2022-09-16','2022-09-02');
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
  PRIMARY KEY (`id`),
  UNIQUE KEY `receipt` (`receipt`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 ;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `payments`
--

LOCK TABLES `payments` WRITE;
/*!40000 ALTER TABLE `payments` DISABLE KEYS */;
INSERT INTO `payments` VALUES (1,9,1000,6,'2022-09-01','2022-09-01','ad203a31c5b01573bd8768703300907541df4fcaefbefce05ec3cef18c4a7898',0),(2,9,1000,6,'2022-09-01','2022-09-01','c9261cd2a19ddc757dc4a5a91b76516313e441f3d7a18e3f2ca8999301253d8d',0),(3,9,1000,6,'2022-09-01','2022-09-01','a8ca97f1299818b674855d9014b4a5ca11847646f466a9520b57ac9f22204958',0),(4,9,1500,7,'2022-09-02','2022-09-02','2eea31212acd1fa4c0d25ea0680c03791146c21ea24cd582e72f954d8ac28701',0),(5,10,1500,8,'2022-09-02','2022-09-02','33b6aeb91824b0e33ed25d42049cbc5fc88af79821f2e347332d5d37b3abbe04',0),(6,10,1500,8,'2022-09-02','2022-09-02','39bf3361b9b3fe2abf621caef7d7068b17bb2e21d17c3f644f16c899aa000e97',0),(7,10,1500,8,'2022-09-02','2022-09-02','b35d03563b243fdfd49598862a940cf9d5282345e34a72be02e759707644acc0',0),(8,10,1500,8,'2022-09-02','2022-09-02','f3938a990e0d8a13b555daf9d3e4f54fe6139c429f64bc6fb52f3add1b21465b',0),(9,10,1500,8,'2022-09-02','2022-09-02','5493fc61d9fe812fd86d2ab2f45744a452a85775675bc9dc86479be4752a235a',0);
/*!40000 ALTER TABLE `payments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `report`
--

DROP TABLE IF EXISTS `report`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `report` (
  `report_Id` int NOT NULL AUTO_INCREMENT,
  `your_name` varchar(255) NOT NULL,
  `report_Area` varchar(255) NOT NULL,
  `animal` varchar(255) NOT NULL,
  `disease_Description` varchar(255) NOT NULL,
  `farmer_Id` int NOT NULL COMMENT '{fk}',
  PRIMARY KEY (`report_Id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 ;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `report`
--

LOCK TABLES `report` WRITE;
/*!40000 ALTER TABLE `report` DISABLE KEYS */;
INSERT INTO `report` VALUES (1,'0000-00-00','00:00:00.000000','Cow','here',0),(2,'simon','Peter','Cow','jk,m',0),(4,'Peter','Kikoni','Sheep','Sick',0),(5,'jjjjjj','kkkkkkkkkk','Cow','kllllll',0);
/*!40000 ALTER TABLE `report` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `service`
--

DROP TABLE IF EXISTS `service`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `service` (
  `service_Id` varchar(50) NOT NULL,
  `service_Name` text NOT NULL,
  `service_description` text NOT NULL,
  `doctor_Id` varchar(50) NOT NULL COMMENT '{fk}'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `service`
--

LOCK TABLES `service` WRITE;
/*!40000 ALTER TABLE `service` DISABLE KEYS */;
/*!40000 ALTER TABLE `service` ENABLE KEYS */;
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
  `password` varchar(20) NOT NULL,
  `user_type` varchar(50) NOT NULL,
  PRIMARY KEY (`user_Id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 ;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'Adima Gilbert','doctor@gmail.com','0750395527','12345','doctor'),(2,'Simon','admin@gmail.com','0782951174','admin@100','admin'),(3,'Bella','farmer@gmail.com','+256750395527','123456','farmer'),(4,'Simon Amapiri','amapirisimon@gmail.com','0750395527','12','doctor'),(5,'Birungi Mourisha','mbirungi@gmail.com','0777345946','1234','farmer'),(6,'Joseph','joseph@gmail.com','0777766666','1234','farmer'),(7,'Shaban Deno','shaban@gmail.com','0775395127','1234','farmer'),(8,'Adima Gilbert','gilbert@gmail.com','0777533333','1234','farmer'),(9,'ashiraff','ashan@boostedtechs.com','+256759800742','rA3OfbyxmD^O','farmer'),(10,'Ashiraff','ashiraff@tumusii.me','+256784565201','1234','farmer');
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

-- Dump completed on 2022-09-02 11:46:30
