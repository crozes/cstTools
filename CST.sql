-- MySQL dump 10.16  Distrib 10.1.38-MariaDB, for debian-linux-gnueabihf (armv7l)
--
-- Host: localhost    Database: CST
-- ------------------------------------------------------
-- Server version	10.1.38-MariaDB-0+deb9u1

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
-- Table structure for table `Horaire`
--

DROP TABLE IF EXISTS `Horaire`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Horaire` (
  `idHoraire` bigint(20) NOT NULL AUTO_INCREMENT,
  `dateHoraire` date NOT NULL,
  `timeHoraire` time NOT NULL,
  `comHoraire` text,
  `idLieuInter` bigint(20) NOT NULL,
  `idTypeInter` bigint(20) NOT NULL,
  `idPersonne` bigint(20) NOT NULL,
  `declaHoraire` date NOT NULL,
  PRIMARY KEY (`idHoraire`),
  KEY `fk_horaire_personne` (`idPersonne`),
  KEY `fk_horaire_typeinter` (`idTypeInter`),
  KEY `fk_horaire_lieuinter` (`idLieuInter`),
  CONSTRAINT `fk_horaire_lieuinter` FOREIGN KEY (`idLieuInter`) REFERENCES `LieuInter` (`idLieuInter`),
  CONSTRAINT `fk_horaire_personne` FOREIGN KEY (`idPersonne`) REFERENCES `Personne` (`idPersonne`),
  CONSTRAINT `fk_horaire_typeinter` FOREIGN KEY (`idTypeInter`) REFERENCES `TypeInter` (`idTypeInter`)
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Horaire`
--

LOCK TABLES `Horaire` WRITE;
/*!40000 ALTER TABLE `Horaire` DISABLE KEYS */;
INSERT INTO `Horaire` VALUES (27,'2019-07-30','10:00:00','Application \"CST Tools\"',5,23,1,'2019-07-30'),(28,'2019-07-30','10:00:00','Application \"CST Tools\"',5,23,1,'2019-07-30'),(29,'2019-07-30','10:00:00','Application \"CST Tools\"',5,23,1,'2019-07-30'),(37,'2019-08-01','04:00:00','Application \"CST Tools\"',5,23,1,'2019-08-01'),(38,'2019-08-02','02:00:00','Application \"CST Tools\"',5,23,1,'2019-08-02'),(39,'2019-08-12','02:00:00','Mis en place plannings de formations',5,24,1,'2019-08-12'),(40,'2019-08-12','02:00:00','Application \"CST Tools\"',5,23,1,'2019-08-12'),(41,'2019-08-15','04:00:00','Mis en place formations Drive',5,24,1,'2019-08-15'),(42,'2019-08-16','04:00:00','Mis en place des formations sur le site internet',5,24,1,'2019-08-16'),(43,'2019-08-18','04:00:00','Application \"CST Tools\"',5,23,1,'2019-08-18'),(44,'2019-08-19','04:00:00','Application \"CST Tools\"',5,23,1,'2019-08-19'),(49,'2019-08-23','04:00:00','Application \"CST Tools\"',5,23,1,'2019-08-23'),(50,'2019-08-24','04:00:00','Application \"CST Tools\"',5,23,1,'2019-08-26'),(51,'2019-08-27','02:00:00','Application \"CST Tools\"',5,23,1,'2019-08-27'),(52,'2019-08-28','02:00:00','Application \"CST Tools\"',5,23,1,'2019-08-28'),(53,'2019-09-05','02:00:00','Application \"CST Tools\"',5,23,1,'2019-09-05'),(54,'2019-09-08','02:00:00','',5,23,1,'2019-09-08');
/*!40000 ALTER TABLE `Horaire` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `LieuInter`
--

DROP TABLE IF EXISTS `LieuInter`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `LieuInter` (
  `idLieuInter` bigint(20) NOT NULL AUTO_INCREMENT,
  `nomLieuInter` varchar(255) NOT NULL,
  PRIMARY KEY (`idLieuInter`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `LieuInter`
--

LOCK TABLES `LieuInter` WRITE;
/*!40000 ALTER TABLE `LieuInter` DISABLE KEYS */;
INSERT INTO `LieuInter` VALUES (1,'Pech David'),(2,'Léo Lagrange'),(3,'La Ramée'),(4,'Salle de formation - Ramonville'),(5,'Autres');
/*!40000 ALTER TABLE `LieuInter` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Personne`
--

DROP TABLE IF EXISTS `Personne`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Personne` (
  `idPersonne` bigint(20) NOT NULL AUTO_INCREMENT,
  `nomPersonne` varchar(255) NOT NULL,
  `prenomPersonne` varchar(255) NOT NULL,
  `mailPersonne` varchar(255) NOT NULL,
  `mdpPersonne` varchar(255) NOT NULL,
  `idRole` bigint(20) NOT NULL,
  `dateDeclaPersonne` date NOT NULL,
  PRIMARY KEY (`idPersonne`),
  KEY `fk_personne_role` (`idRole`),
  CONSTRAINT `fk_personne_role` FOREIGN KEY (`idRole`) REFERENCES `Role` (`idRole`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Personne`
--

LOCK TABLES `Personne` WRITE;
/*!40000 ALTER TABLE `Personne` DISABLE KEYS */;
INSERT INTO `Personne` VALUES (1,'CROZES','Cyril','cyril.crozes@gmail.com','D8467FBE34891AEE837EC982F9D55C09C25E00CD7ED95A0330B9C1A9B21EDC03',2,'2019-08-01'),(4,'GARNIER','Ileana','ileanagarnier@hotmail.fr','3797F543038F71446F531CE5A83CE6B33A5F80FCDE580EA3DF91F3700097ABAC',1,'2019-08-01'),(6,'IMBERT','Marie-Cécile','mariececile.imbert@gmail.com','5483D5DF9B245E662C0E4368B8062E8A0FD24C17CE4DED1A0E452E4EE879DD81',2,'2019-08-01'),(7,'COULY ','Sébastien','cstsecretariat@live.fr','C0BB8CA64902FD29CC7F35E4208D0A8A10B6BF49BFFF8CE6CC1F63CECD1BC6AB',2,'2019-09-01'),(8,'CHAUVET','Coraline','coraline.chauvet13@orange.fr','6E85B5D7177E59103D0D09D931EED3C9F2B1AB19B1C6F783D4615C1AEBD39DE5',1,'2019-09-01'),(9,'ROQUES','Cindy','cindy-roques@hotmail.fr','E5069BE9E3E08110E3C26ADF36DECA72FF666DB86512FA46139FD1532F299260',1,'2019-09-01'),(10,'TEST','Test','test@gmail.com','15E2B0D3C33891EBB0F1EF609EC419420C20E320CE94C65FBC8C3312448EB225',1,'2019-09-01');
/*!40000 ALTER TABLE `Personne` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Role`
--

DROP TABLE IF EXISTS `Role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Role` (
  `idRole` bigint(20) NOT NULL AUTO_INCREMENT,
  `nomRole` varchar(255) NOT NULL,
  `valueRole` int(11) NOT NULL,
  PRIMARY KEY (`idRole`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Role`
--

LOCK TABLES `Role` WRITE;
/*!40000 ALTER TABLE `Role` DISABLE KEYS */;
INSERT INTO `Role` VALUES (1,'Utilisateur',1),(2,'Administrateur',2);
/*!40000 ALTER TABLE `Role` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `TypeInter`
--

DROP TABLE IF EXISTS `TypeInter`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `TypeInter` (
  `idTypeInter` bigint(20) NOT NULL AUTO_INCREMENT,
  `nomTypeInter` varchar(255) NOT NULL,
  PRIMARY KEY (`idTypeInter`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `TypeInter`
--

LOCK TABLES `TypeInter` WRITE;
/*!40000 ALTER TABLE `TypeInter` DISABLE KEYS */;
INSERT INTO `TypeInter` VALUES (1,'Sportif - Entrainement'),(2,'Sportif - Compétition'),(3,'Sportif - PPG'),(4,'BNSSA - Entrainement'),(5,'BNSSA - Règlementation'),(6,'Secourisme - PSC1'),(7,'Secourisme - FC PSC1'),(8,'Secourisme - PSE 1'),(9,'Secourisme - FC PSE 1'),(10,'Secourisme - PSE 2'),(11,'Secourisme - FC PSE 2'),(12,'Secourisme - PSS1'),(13,'Secourisme - SST'),(14,'Secourisme - FO PSC'),(15,'Secourisme - FO PSE'),(16,'Secourisme - FO '),(17,'Club - Administratif'),(19,'Club - Démarchage'),(20,'DPS - Chef de Poste'),(21,'DPS - Maintenance'),(22,'Club - Communication'),(23,'Informatique - Développement'),(24,'Informatique - Site');
/*!40000 ALTER TABLE `TypeInter` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-09-13 10:50:50
