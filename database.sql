-- MySQL dump 10.13  Distrib 8.0.32, for macos13 (arm64)
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
-- Table structure for table `command`
--

DROP TABLE IF EXISTS `command`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `command` (
  `id` int NOT NULL AUTO_INCREMENT,
  `status` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `commande_FK` FOREIGN KEY (`id`) REFERENCES `customer` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `command`
--

LOCK TABLES `command` WRITE;
/*!40000 ALTER TABLE `command` DISABLE KEYS */;
/*!40000 ALTER TABLE `command` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `commandProduct`
--

DROP TABLE IF EXISTS `commandProduct`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `commandProduct` (
  `id` int NOT NULL AUTO_INCREMENT,
  `quantity` int NOT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `commandProduct_FK` FOREIGN KEY (`id`) REFERENCES `command` (`id`),
  CONSTRAINT `commandProduct_FK_1` FOREIGN KEY (`id`) REFERENCES `food` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `commandProduct`
--

LOCK TABLES `commandProduct` WRITE;
/*!40000 ALTER TABLE `commandProduct` DISABLE KEYS */;
/*!40000 ALTER TABLE `commandProduct` ENABLE KEYS */;
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
  `email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `phone_number` int DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `adress_2` varchar(100) DEFAULT NULL,
  `dateOfBirth` date DEFAULT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customer`
--

LOCK TABLES `customer` WRITE;
/*!40000 ALTER TABLE `customer` DISABLE KEYS */;
INSERT INTO `customer` VALUES (1,'manon','lambert','manon@gmaiul.com',6060606,'bla bla 333360',NULL,'1993-06-18','blabla'),(2,'MANON','LAMBERT','manlamb.ml@gmail.com',635660818,'39A route de morillon','','1993-06-18','$2y$10$CecUghSj.60tKb7.7GxZSet/FqJi0wPelHptYrKPFjeJHuv3stA5S'),(3,'manon','lambert','manon@gamil.com',NULL,'','',NULL,'$2y$10$kogXXJ/UiDr5Fx67l9kbl.MWzN7yDnH9jacQhMmSWuWY/yxVCatFq'),(4,'manon','lambert','manlamb.ml@gmail.com',NULL,'','',NULL,'$2y$10$PrViIkxR/WPf2acKF/pu.u6B/VO6yf/DQyWfyDw.wooVOHJyUVg2y');
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
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `food`
--

LOCK TABLES `food` WRITE;
/*!40000 ALTER TABLE `food` DISABLE KEYS */;
INSERT INTO `food` VALUES (1,'Poulet Kung Bao',1,12.99,'Un plat épicé et savoureux avec du poulet coupé en dés, des cacahuètes, des légumes et une sauce épicée.',20,'CHI001','assets/images/plats_chauds/gongbao_poulet.jpg','platschauds'),(2,'Raviolis chinois à la vapeur',6,8.99,'Des raviolis faits maison garnis de viande de porc hachée, de crevettes et d\'épices, cuits à la vapeur pour une texture délicate.',200,'CHI002','assets/images/entree/Raviolis-chinois.jpg','entrée'),(3,'Canard laqué',1,18.99,'Un plat de canard rôti à la peau croustillante et à la chair tendre, servi avec une sauce sucrée et des crêpes fines.',20,'CHI003','assets/images/plats_chauds/canard_laque.webp','platschauds'),(4,'Nouilles sautées aux légumes',1,9.99,'Un plat végétarien avec des nouilles sautées, des légumes frais comme les carottes, les poivrons et les champignons, assaisonné avec une sauce soja.',40,'CHI004','assets/images/plats_chauds/nouilles_legumes.jpeg','platschauds'),(5,'Soupe aux wontons',1,9.99,'Une soupe savoureuse avec des wontons farcis à la viande de porc, du bouillon de poulet et des légumes, garnie d\'oignons verts.',30,'CHI005','assets/images/plats_chauds/Soupe_wontons.jpg','platschauds'),(6,'Rouleaux de printemps',4,4.49,'Des rouleaux frais et croustillants, remplis de crevettes, de porc et de légumes croquants, servis avec une sauce aigre-douce pour une combinaison de saveurs douces et acidulées.',100,'CHI006','assets/images/entree/Rouleaux_printemps.jpg','entrée'),(7,'Ailes de poulet caramélisées',6,6.99,'Des ailes de poulet frites puis enrobées d\'une sauce sucrée et salée à base de caramel, d\'ail et de gingembre, pour un mélange de textures croustillantes et fondantes, et un goût addictif.',100,'CHI007','assets/images/entree/Ailes_poulet.jpg','entrée'),(8,'Beignets de crevettes',6,7.99,'De délicieuses crevettes décortiquées, marinées dans une sauce épicée, puis enrobées d\'une pâte légère et frites jusqu\'à ce qu\'elles soient croustillantes à l\'extérieur et juteuses à l\'intérieur. Servies avec une sauce aigre-douce.',100,'CHI008','assets/images/entree/Beignets_crevettes.jpg','entrée'),(10,'Salade de papaye verte',1,5.49,'Une salade rafraîchissante à base de papaye verte râpée, de carottes, de cacahuètes concassées, de coriandre et d\'une vinaigrette à base de sauce de poisson et de jus de citron pour une explosion de saveurs aigres-douces.',50,'CHI0010','assets/images/salade/salade_papaye.jpg','salade'),(16,'Cupcake',1,2,'Un cupcake est un petit gâteau avec une base moelleuse et un glaçage sucré, souvent décoré de façon créative.',50,'CHI0012','assets/images/dessert/cupcake.jpg','dessert'),(17,'Perles de coco',6,4,'Les perles de coco sont des petites boules de pâte de riz farcies de noix de coco sucrée et roulées dans de la noix de coco râpée. Elles ont une texture moelleuse et une saveur sucrée et noix de coco.',55,'DES0017','assets/images/dessert/perles_de_coco.jpg','dessert'),(18,'Tiramisu',1,3,'Le tiramisu est fait avec des biscuits imbibés de café, de la crème au mascarpone et saupoudré de cacao en poudre.',47,'DES0018','assets/images/dessert/tiramisu.jpg','dessert'),(19,'Salade d\'algues',1,12.99,'La salade d\'algues est préparée avec des algues comestibles et assaisonnée avec une vinaigrette à base de vinaigre de riz, de sucre et de sauce soja. Elle est riche en nutriments et est souvent servie en accompagnement de plats principaux ou en entrée.',42,'SAL0019','assets/images/salade/salade_algue.jpeg','salade'),(21,'Poulet froid',1,12.99,'Le poulet froid est un plat de morceaux de poulet cuits et refroidis, souvent accompagné d\'une sauce ou d\'une marinade pour ajouter de la saveur et de la tendreté.',40,'PFR0020','assets/images/Plats froids/poulet_froid.jpg','platsfroids'),(22,'Dim sum froid',6,8.99,'Les dim sum froids sont préparés avec une variété d\'ingrédients tels que des crevettes, de la viande hachée, du tofu, des légumes et du riz gluant, et peuvent être cuits à la vapeur, frits ou servis crus. ',35,'PFR0021','assets/images/Plats froids/dim_sum.jpg','platsfroids'),(23,'Tranches de porc froid',1,12.99,'Les tranches de porc froid est un plat dans lequel des tranches de porc cuites sont servies froides, assaisonnées avec des épices et des sauces. ',32,'PFR0022','assets/images/Plats froids/tranches_porc.jpg','platsfroids'),(24,'Boulettes de crevettes vapeur',6,8.99,'Les boulettes de crevettes vapeur sont composées de crevettes décortiquées enveloppées dans une fine pâte translucide et cuites à la vapeur. Elles sont servies chaudes et trempées dans de la sauce soja ou du vinaigre de riz.',20,'ENT0023','assets/images/entree/Boulettes_crevettes.jpeg','entrée'),(25,'Salade de concombres',1,8.99,'a salade de concombres est un plat frais et léger, composé de tranches de concombre frais et assaisonné avec de la vinaigrette ou d\'autres ingrédients pour plus de saveur. ',17,'SAL0024','assets/images/salade/salade_concombre.jpeg','salade'),(26,'Nouilles nature',1,6.99,'Les nouilles nature sont un aliment de base dans la cuisine asiatique, fabriquées à partir de farine de blé, d\'eau et parfois de sel. Elles sont riches en glucides et en fibres alimentaires et peuvent être utilisées dans de nombreux plats.',14,'ACO0025','assets/images/accompagnements/Nouilles_nature.jpg','accompagnement'),(27,'Riz cantonnais',1,13.99,'Le riz cantonnais est un plat de riz sauté chinois avec des légumes, des protéines et des épices.',28,'ACO0026','assets/images/accompagnements/riz_cantonais.jpg','accompagnement'),(28,'Riz',1,10.99,'Le riz nature est simplement des grains de riz non transformés sans leur enveloppe extérieure, leur son et leur germe. Il est blanc ou brun, riche en glucides complexes et en fibres alimentaires et peut être utilisé comme accompagnement ou comme ingrédient de base dans de nombreux plats.',29,'ACO0027','assets/images/accompagnements/riz_nature.jpeg','accompagnement'),(29,'Coca cola',1,2,'Le Coca-Cola est une boisson gazeuse rafraîchissante à base de concentré de cola, de sucre ou de sirop de maïs à haute teneur en fructose, d\'arômes, de colorants et de caféine. Il est souvent servi glacé et est apprécié pour son goût unique et sa texture pétillante.',35,'BOI0028','assets/images/boisson/coca-cola.jpg','boissons'),(30,'Eau pétillante des abatilles',1,1.5,'L\'eau pétillante des Abatilles est une eau minérale naturelle gazeuse provenant de Bordeaux, en France. Elle est naturellement riche en minéraux et est gazéifiée de manière naturelle dans la source, ce qui lui donne une saveur rafraîchissante et une effervescence délicate. ',39,'BOI0029','assets/images/boisson/eau-petillante-des-abatilles.jpg','boissons'),(31,'Eau plate des abatilles',1,2,'L\'eau plate des Abatilles est une eau minérale naturelle provenant de Bordeaux, en France, riche en minéraux tels que le calcium et le magnésium. Elle a une saveur douce et subtile et est appréciée pour sa pureté et sa qualité.',40,'BOI0030','assets/images/boisson/eau-plate-des-abatilles.jpg','boissons');
/*!40000 ALTER TABLE `food` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reductions`
--

DROP TABLE IF EXISTS `reductions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `reductions` (
  `id` int NOT NULL AUTO_INCREMENT,
  `code` varchar(100) NOT NULL,
  `pourcentage` float NOT NULL DEFAULT '10',
  `description` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reductions`
--

LOCK TABLES `reductions` WRITE;
/*!40000 ALTER TABLE `reductions` DISABLE KEYS */;
INSERT INTO `reductions` VALUES (1,'HIBOU_50',5,'Rédution de lancement '),(2,'HIBOU_05',5,'Rédution de lancement ');
/*!40000 ALTER TABLE `reductions` ENABLE KEYS */;
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

-- Dump completed on 2023-04-26 12:49:46
