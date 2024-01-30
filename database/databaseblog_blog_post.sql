-- MySQL dump 10.13  Distrib 8.0.34, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: databaseblog
-- ------------------------------------------------------
-- Server version	8.0.34

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `blog_post`
--

DROP TABLE IF EXISTS `blog_post`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `blog_post` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `title` varchar(255) NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `sort_description` varchar(255) DEFAULT NULL,
  `external_url` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `blog_post`
--

LOCK TABLES `blog_post` WRITE;
/*!40000 ALTER TABLE `blog_post` DISABLE KEYS */;
INSERT INTO `blog_post` VALUES (1,1,'test','img/test.jpg','hier moet een lange text komen over alles','2023-12-18 13:44:59','korte beschrijving',NULL),(3,1,'Five Nights','img/kookboek.jpg','dit is van de wel bekende game/fim en nu is er een cook boek voor','2024-01-06 16:52:51','Five Nights at Freddy\'s- Five Nights at Freddy\'s Cook Book','https://www.bol.com/nl/nl/p/five-nights-at-freddy-s-five-nights-at-freddy-s-cook-book/9300000132918384/?bltgh=hQAeoGEvoo-ONz5fdtpL4Q.2_6.8.ProductTitle'),(4,1,'Simpel & Puur','img/','Puur koken, eten en bovenal: genieten Simpel & Puur staat vol met meer dan 70 even simpele, kleurrijke als lekkere recepten die bewijzen dat een gezond gluten-, lactose- en geraffineerd suikervrij eetpatroon niet saai of moeilijk hoeft te zijn. Van smokey bloemkooltaco’s met mangoavocadosalsa tot fluffy citroenpancakes met zelfgemaakte wildebessencompote, van groene shakshuka met pesto tot zoete aardappelbrownies. Niet alleen voor mensen met een voedselintolerantie of -allergie, maar voor elke levensgenieter die dankzij dit voedingspatroon lekkerder in zijn of haar vel komt te zitten.\r\nToen Sanne van Lierop om gezondheidsredenen gluten- en lactosevrij ging eten, besloot ze zelf de recepten te gaan ontwikkelen waar ze als bourgondische Brabantse zo’n behoefte aan had. Op Instagram (@sannevanlierop) en haar blog deelt ze dagelijks recepten om het zoveel mogelijk mensen zo makkelijk mogelijk te maken om voedzaam, glutenvrij, lactosevrij, geraffineerd suikervrij en vaak ook','2024-01-17 12:27:47','dit is een kook boek','https://www.kookboek.nl/product/simpel-puur/');
/*!40000 ALTER TABLE `blog_post` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-01-22 10:46:25