-- MySQL dump 10.13  Distrib 8.0.32, for macos13 (x86_64)
--
-- Host: localhost    Database: chez_hibou
-- ------------------------------------------------------
-- Server version	8.0.32

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
-- Table structure for table `cart`
--

DROP TABLE IF EXISTS `cart`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cart` (
  `Id` int NOT NULL AUTO_INCREMENT,
  `quantity` int NOT NULL,
  PRIMARY KEY (`Id`),
  CONSTRAINT `cart_FK` FOREIGN KEY (`Id`) REFERENCES `customer` (`id`),
  CONSTRAINT `cart_FK_1` FOREIGN KEY (`Id`) REFERENCES `food` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cart`
--

LOCK TABLES `cart` WRITE;
/*!40000 ALTER TABLE `cart` DISABLE KEYS */;
/*!40000 ALTER TABLE `cart` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `customer`
--

DROP TABLE IF EXISTS `customer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `customer` (
  `id` int NOT NULL AUTO_INCREMENT,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `mail` varchar(100) NOT NULL,
  `phone_number` int NOT NULL,
  `address` varchar(100) DEFAULT NULL,
  `adress_2` varchar(100) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customer`
--

LOCK TABLES `customer` WRITE;
/*!40000 ALTER TABLE `customer` DISABLE KEYS */;
INSERT INTO `customer` VALUES (1,'manon','lambert','manon@gmaiul.com',6060606,'bla bla 333360',NULL,'1993-06-18','blabla');
/*!40000 ALTER TABLE `customer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `facturation`
--

DROP TABLE IF EXISTS `facturation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `facturation` (
  `id` int NOT NULL AUTO_INCREMENT,
  `total_price` float NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `facturation_FK` FOREIGN KEY (`id`) REFERENCES `cart` (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `facturation`
--

LOCK TABLES `facturation` WRITE;
/*!40000 ALTER TABLE `facturation` DISABLE KEYS */;
/*!40000 ALTER TABLE `facturation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `food`
--

DROP TABLE IF EXISTS `food`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `food` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `quantity` int DEFAULT NULL,
  `price` float NOT NULL,
  `description` varchar(500) DEFAULT NULL,
  `stock` int DEFAULT NULL,
  `reference` varchar(250) NOT NULL,
  `picture` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `type` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `food`
--

LOCK TABLES `food` WRITE;
/*!40000 ALTER TABLE `food` DISABLE KEYS */;
INSERT INTO `food` VALUES (1,'Poulet Kung Bao',1,12.99,'Un plat épicé et savoureux avec du poulet coupé en dés, des cacahuètes, des légumes et une sauce épicée.',20,'CHI001','assets/images/plats_chauds/gongbao_poulet.jpg','platschauds'),(2,'Raviolis chinois à la vapeur',6,8.99,'Des raviolis faits maison garnis de viande de porc hachée, de crevettes et d\'épices, cuits à la vapeur pour une texture délicate.',200,'CHI002','assets/images/entree/Raviolis-chinois.jpg','entrée'),(3,'Canard laqué',1,18.99,'Un plat de canard rôti à la peau croustillante et à la chair tendre, servi avec une sauce sucrée et des crêpes fines.',20,'CHI003','assets/images/plats_chauds/canard_laque.webp','platschauds'),(4,'Nouilles sautées aux légumes',1,9.99,'Un plat végétarien avec des nouilles sautées, des légumes frais comme les carottes, les poivrons et les champignons, assaisonné avec une sauce soja.',40,'CHI004','assets/images/plats_chauds/nouilles_legumes.jpeg','platschauds'),(5,'Soupe aux wontons',1,9.99,'Une soupe savoureuse avec des wontons farcis à la viande de porc, du bouillon de poulet et des légumes, garnie d\'oignons verts.',30,'CHI005','assets/images/plats_chauds/Soupe_wontons.jpg','platschauds'),(6,'Rouleaux de printemps',2,4.49,'Des rouleaux frais et croustillants, remplis de crevettes, de porc et de légumes croquants, servis avec une sauce aigre-douce pour une combinaison de saveurs douces et acidulées.',100,'CHI006','assets/images/entree/Rouleaux_printemps.jpg','entrée'),(7,'Ailes de poulet caramélisées',6,6.99,'Des ailes de poulet frites puis enrobées d\'une sauce sucrée et salée à base de caramel, d\'ail et de gingembre, pour un mélange de textures croustillantes et fondantes, et un goût addictif.',100,'CHI007','assets/images/entree/Ailes_poulet.jpg','entrée'),(8,'Beignets de crevettes',6,7.99,'De délicieuses crevettes décortiquées, marinées dans une sauce épicée, puis enrobées d\'une pâte légère et frites jusqu\'à ce qu\'elles soient croustillantes à l\'extérieur et juteuses à l\'intérieur. Servies avec une sauce aigre-douce.',100,'CHI008','assets/images/entree/Beignets_crevettes.jpg','entrée'),(9,'Boulettes de crevettes vapeur',6,6.49,'Des boulettes de crevettes juteuses et parfumées, cuites à la vapeur pour une texture légère et fondante, servies avec une sauce à base de soja et de sésame pour une combinaison de saveurs délicates.',100,'CHI009','assets/images/entree/Boulettes_crevettes.jpg','entrée'),(10,'Salade de papaye verte',1,5.49,'Une salade rafraîchissante à base de papaye verte râpée, de carottes, de cacahuètes concassées, de coriandre et d\'une vinaigrette à base de sauce de poisson et de jus de citron pour une explosion de saveurs aigres-douces.',50,'CHI0010','assets/images/salade/salade_papaye.jpg','salade'),(11,'salade truc',1,6,'salade',50,'CHI0011','','salade');
/*!40000 ALTER TABLE `food` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'chez_hibou'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-04-19 15:50:09
