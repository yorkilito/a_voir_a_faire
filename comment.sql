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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;


LOCK TABLES `comment` WRITE;
/*!40000 ALTER TABLE `comment` DISABLE KEYS */;
INSERT INTO `comment` VALUES (1,11,'I dont like this place',3,'Samuel Aidoo'),(2,11,'I like this place',5,'Melissa'),(3,2,'I dont like this place also',3,'Samuel Aidoo');
/*!40000 ALTER TABLE `comment` ENABLE KEYS */;
UNLOCK TABLES;