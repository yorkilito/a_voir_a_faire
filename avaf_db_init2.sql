-- MariaDB dump 10.19  Distrib 10.11.6-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: avaf
-- ------------------------------------------------------
-- Server version	10.11.6-MariaDB-0+deb12u1

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
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comment`
--

LOCK TABLES `comment` WRITE;
/*!40000 ALTER TABLE `comment` DISABLE KEYS */;
INSERT INTO `comment` VALUES
(1,32,'',1,'Samuel Aidoo'),
(2,33,'c\'était cool !',4,'Samuel Aidoo'),
(3,36,'Je n\'aime pas vraiment cet endroit, trop de monde',2,'Melissa Hadid'),
(4,39,'C\'est mon endroit préféré où être quand je veux ma tranquillité d\'esprit',5,'Melissa Hadid'),
(5,36,'Super ambiance, je recommande',5,'Aubin LePrince'),
(6,37,'Allez l\'OM!',5,'Aubin LePrince'),
(7,41,'Very good',3,'Sissi'),
(8,42,'tres bien!',4,'Samuel Aidoo'),
(9,36,'Je reccomande',5,'Samuel Aidoo'),
(10,36,'J\'aime bien ausii!',3,'Samuel Aidoo'),
(11,44,'Good',5,'Samuel Aidoo'),
(12,48,'I really love the Eiffel Tower. I live in England and I came to visit with my wife last year. Absolutely superb!',5,'Mark Goldbridge');
/*!40000 ALTER TABLE `comment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comptes`
--

DROP TABLE IF EXISTS `comptes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comptes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comptes`
--

LOCK TABLES `comptes` WRITE;
/*!40000 ALTER TABLE `comptes` DISABLE KEYS */;
INSERT INTO `comptes` VALUES
(1,'sam','yorkilito.coder@gmail.com','root','admin'),
(2,'admin','admin','root','admin');
/*!40000 ALTER TABLE `comptes` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `place`
--

LOCK TABLES `place` WRITE;
/*!40000 ALTER TABLE `place` DISABLE KEYS */;
INSERT INTO `place` VALUES
(48,'Tour Eiffel','Ile-de-France','Paris',75007,'Champ de Mars, 5 Av. Anatole','La Tour Eiffel est une prouesse d’ingéniosité autant qu’un monument célèbre. Cette structure de 8 000 pièces métalliques a été conçue par Gustave Eiffel comme exposition temporaire pour l\'Exposition universelle de 1889. Initialement détestée par la critique, la tour de 330 mètres de haut est aujourd\'hui un élément apprécié et irremplaçable du paysage parisien.',25,'2022-05-05','eiffel_tower.jpg'),
(49,'Château de Versailles','Ile-de-France','Versailles',78000,'Place d\'Armes','Le Château de Versailles, classé au patrimoine mondial de l\'UNESCO, vous plonge dans la glorieuse histoire royale de France. Remontez le temps jusqu\'à l\'époque de l\'Ancien Régime, lorsque Louis XIV (le « Roi Soleil »), Louis XV et Louis XVI régnaient sur la France. Durant cette période, le château de Versailles constitue la référence des cours princières en Europe.',20,'2023-06-05','france-versailles.jpg'),
(50,'Musée du Louvre','Ile-de-France','Paris',75001,'Louvre Museum','Musée le plus prestigieux de Paris, le Louvre figure parmi les premières collections européennes de beaux-arts. Bon nombre des œuvres les plus célèbres de la civilisation occidentale se trouvent ici, notamment la Joconde de Léonard de Vinci, les Noces de Cana de Véronèse et la sculpture Vénus de Milo du 1er siècle avant JC.',22,'2022-12-05','france-top-attractions-musee-du-louvre.jpg'),
(51,'Mont Saint-Michel','Normandie','La Manche',50170,'Mont Saint-Michel','S\'élevant spectaculairement d\'un îlot rocheux au large de la côte normande, le Mont Saint-Michel, classé au patrimoine mondial de l\'UNESCO, est l\'un des monuments les plus frappants de France. Cette « Pyramide des mers » est un spectacle mystique, perchée à 80 mètres au-dessus de la baie et entourée d\'imposants murs défensifs et bastions.',21,'2022-05-05','france-mont-saint-michel-2.jpg'),
(52,'Plage de Biarritz','Nouvelle-Aquitaine','Biarritz',64200,'Biarritz','Cette station balnéaire à la mode a un air élégant et aristocratique ; c\'était une destination favorite de l\'impératrice Eugénie, épouse de Napoléon III. L\'impératrice Eugénie aimait le cadre magnifique du golfe de Gascogne, au Pays basque français',0,'2020-06-30','france-basque-country.jpg'),
(53,'Carcassonne','Occitanie','Carcassonne',11000,'Carcassonne','Avec ses tours à tourelles et ses remparts crénelés, Carcassonne semble tout droit sortie d\'un conte de fée. Cette ville fortifiée bien conservée (et rénovée) offre une immersion totale dans l\'univers du Moyen Âge.',0,'2023-02-15','france-top-attractions-carcassonne.jpg');
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
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES
(10,'Samuel Aidoo','admin','$2y$10$uar3MYuzH.KCWctvUqB7le//2kpZ/iC.mCjmwSEhJV8tHU5Q2NHee','admin'),
(44,'Amad Diallo','amad_utd','$2y$10$mgLcI5eTNSsODdzhKJ/5teCGtyt/reB7nMRWf8cc6Na0oAkLC.kXW','user');
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
INSERT INTO `user_place` VALUES
(34,11),
(43,10),
(44,10),
(48,44),
(49,44),
(50,44),
(51,44),
(52,10),
(53,10);
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

-- Dump completed on 2024-03-27 17:47:22
