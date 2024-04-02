-- MariaDB dump 10.19  Distrib 10.6.16-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: mysql.info.unicaen.fr    Database: 21815938_2
-- ------------------------------------------------------
-- Server version	10.11.4-MariaDB-1~deb12u1-log

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `comment`
--

DROP TABLE IF EXISTS `comment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `placeId` int(11) DEFAULT NULL,
  `comment` varchar(1600) DEFAULT NULL,
  `note` int(11) DEFAULT NULL,
  `author` varchar(1600) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comment`
--

LOCK TABLES `comment` WRITE;
/*!40000 ALTER TABLE `comment` DISABLE KEYS */;
INSERT INTO `comment` VALUES (1,32,'',1,'Samuel Aidoo'),(2,33,'c\'était cool !',4,'Samuel Aidoo'),(3,36,'Je n\'aime pas vraiment cet endroit, trop de monde',2,'Melissa Hadid'),(4,39,'C\'est mon endroit préféré où être quand je veux ma tranquillité d\'esprit',5,'Melissa Hadid'),(5,36,'Super ambiance, je recommande',5,'Aubin LePrince'),(6,37,'Allez l\'OM!',5,'Aubin LePrince'),(7,41,'Very good',3,'Sissi'),(8,42,'tres bien!',4,'Samuel Aidoo'),(9,36,'Je reccomande',5,'Samuel Aidoo');
/*!40000 ALTER TABLE `comment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `place`
--

DROP TABLE IF EXISTS `place`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `place` (
  `place_id` int(11) NOT NULL AUTO_INCREMENT,
  `nomEndroit` varchar(255) NOT NULL,
  `region` varchar(255) NOT NULL,
  `ville` varchar(255) NOT NULL,
  `codePostal` int(255) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `description` varchar(1600) NOT NULL,
  `tarif` int(11) NOT NULL,
  `dateVisite` date DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  PRIMARY KEY (`place_id`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `place`
--

LOCK TABLES `place` WRITE;
/*!40000 ALTER TABLE `place` DISABLE KEYS */;
INSERT INTO `place` VALUES (34,'Abbaye aux Hommes','Normandie','Caen',14000,'Esp. Jean-Marie Louvel','L\'abbaye aux Hommes, ou abbaye Saint-Étienne de Caen, est une des deux grandes abbayes, avec l\'abbaye aux Dames, fondées par Guillaume le Bâtard le futur conquérant, vers 10601, à Caen, en France. Elle s\'élève à l\'ouest du centre-ville ancien et donna le nom de Bourg-l\'abbé au quartier qui l\'entoure. L\'église Saint-Étienne, l\'ancienne abbatiale est devenue église paroissiale après la Révolution. Les bâtiments conventuels transformés en lycée au XIXe siècle abritent depuis les années 1960 l\'hôtel de ville.',0,'2020-05-10','caen-13062014-9595-Michel-Dehaye-Avuedoiseau.com_-1024x692.jpg'),(36,'Disneyland Paris','Auvergne-Rhône-Alpes','Coupvray',77700,'Bd de Parc','Disneyland Paris, anciennement Euro Disney Resort puis Disneyland Resort Paris, est un complexe touristique et urbain de 22,30 km2 (2 230 ha) situé en sa majeure partie sur la commune de Chessy (Seine-et-Marne), à trente-deux kilomètres à l\'est de Paris. Le complexe touristique, ouvert en 1992, comprend deux parcs à thèmes : le parc Disneyland et le parc Walt Disney Studios, ainsi que sept hôtels et un golf, tandis que le complexe urbain intensifie le tissu du secteur IV de Marne-la-Vallée au travers de Val d\'Europe Agglomération',150,'2022-10-10','disneyland-paris-guide-tips-01.jpeg');
/*!40000 ALTER TABLE `place` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `userName` varchar(255) NOT NULL,
  `login` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (10,'Samuel Aidoo','admin','$2y$10$uar3MYuzH.KCWctvUqB7le//2kpZ/iC.mCjmwSEhJV8tHU5Q2NHee','admin'),(11,'Melissa Hadid','hadid','$2y$10$p983a4hPO0ZMDIw7dkoNA.FMs5OswZByb5mR./3apeOU24H.UjKLW','user'),(12,'Aubin LePrince','aubin','$2y$10$nlUb2bQI6NDgLTUMxf2Tn.TStObsDzv1A5wMZfZDNmE6AvzseHY6i','user'),(13,'Théo Auvray','theo','$2y$10$x5hNaQ9y3mcZsev5UTZP3emy2Elm3yuPzn/crnWaPOXnMW4Y7FNgC','user'),(14,'Sissi','sissi','$2y$10$eLv/zkup9bZnuIGPcj6bMeG.cWtefq890rehRA4RhSgQ2uk7xsrEW','user'),(15,'Ganny','GtA','$2y$10$aO2h7wOn3c71VNIC0s4ogeuLNBQKjE8O4Jfiflv8cacQyGmAxNj8S','user'),(16,'Franck','Ahipo','$2y$10$QySP3Pfp738J16kYkEIxV.mjbshtGjnbLuQMJH0NwEH.cUjmJa/pG','user');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_place`
--

DROP TABLE IF EXISTS `user_place`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_place` (
  `place_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`place_id`,`user_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `user_place_ibfk_1` FOREIGN KEY (`place_id`) REFERENCES `place` (`place_id`),
  CONSTRAINT `user_place_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_place`
--

LOCK TABLES `user_place` WRITE;
/*!40000 ALTER TABLE `user_place` DISABLE KEYS */;
INSERT INTO `user_place` VALUES (34,11),(36,11);
/*!40000 ALTER TABLE `user_place` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-03-22 13:32:25
