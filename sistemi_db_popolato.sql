-- MySQL dump 10.13  Distrib 8.0.29, for macos12 (x86_64)
--
-- Host: localhost    Database: nuovoprogettoo
-- ------------------------------------------------------
-- Server version	5.7.39

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
-- Table structure for table `Acquisti`
--

DROP TABLE IF EXISTS `Acquisti`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Acquisti` (
  `Utenti_idUtenti` int(11) NOT NULL,
  `ProdottiInVendita_idProdotto` int(11) NOT NULL,
  `Quantità` int(11) DEFAULT NULL,
  `Data` date DEFAULT NULL,
  PRIMARY KEY (`Utenti_idUtenti`,`ProdottiInVendita_idProdotto`),
  KEY `fk_Acquistano_ProdottiInVendita1_idx` (`ProdottiInVendita_idProdotto`),
  CONSTRAINT `fk_Acquistano_ProdottiInVendita1` FOREIGN KEY (`ProdottiInVendita_idProdotto`) REFERENCES `ProdottiInVendita` (`idProdotto`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Acquistano_Utenti1` FOREIGN KEY (`Utenti_idUtenti`) REFERENCES `Utenti` (`idUtenti`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Acquisti`
--

LOCK TABLES `Acquisti` WRITE;
/*!40000 ALTER TABLE `Acquisti` DISABLE KEYS */;
/*!40000 ALTER TABLE `Acquisti` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Magazzino`
--

DROP TABLE IF EXISTS `Magazzino`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Magazzino` (
  `idMagazzino` int(11) NOT NULL AUTO_INCREMENT,
  `Capacità` int(11) DEFAULT NULL,
  `Sede` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idMagazzino`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Magazzino`
--

LOCK TABLES `Magazzino` WRITE;
/*!40000 ALTER TABLE `Magazzino` DISABLE KEYS */;
INSERT INTO `Magazzino` VALUES (1,2000,'Milano'),(2,500,'Roma');
/*!40000 ALTER TABLE `Magazzino` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ProdottiInVendita`
--

DROP TABLE IF EXISTS `ProdottiInVendita`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ProdottiInVendita` (
  `idProdotto` int(11) NOT NULL AUTO_INCREMENT,
  `NomeProdotto` varchar(45) DEFAULT NULL,
  `Prezzo` float DEFAULT NULL,
  `CasaProduttrice` int(11) DEFAULT NULL,
  `Reparti_idReparto` int(11) NOT NULL,
  `Magazzino_idMagazzino` int(11) NOT NULL,
  `Quantità` int(11) DEFAULT NULL,
  PRIMARY KEY (`idProdotto`),
  KEY `fk_ProdottiInVendita_Reparti1_idx` (`Reparti_idReparto`),
  KEY `fk_ProdottiInVendita_Magazzino1_idx` (`Magazzino_idMagazzino`),
  CONSTRAINT `fk_ProdottiInVendita_Magazzino1` FOREIGN KEY (`Magazzino_idMagazzino`) REFERENCES `Magazzino` (`idMagazzino`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_ProdottiInVendita_Reparti1` FOREIGN KEY (`Reparti_idReparto`) REFERENCES `Reparti` (`idReparto`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ProdottiInVendita`
--

LOCK TABLES `ProdottiInVendita` WRITE;
/*!40000 ALTER TABLE `ProdottiInVendita` DISABLE KEYS */;
INSERT INTO `ProdottiInVendita` VALUES (1,'Sedia EcoLine',80,0,2,1,20),(2,'Lampada Elegante',50,0,3,2,40),(3,'Set di Vasi',90,1425,1,1,28),(4,'Divano Marrone',390,0,2,1,60),(5,'Sedia Elegante',60,0,2,1,22),(6,'Orario Classico',450,0,1,1,1),(7,'Sedia di Legno',40,0,2,1,10),(8,'Divano Moderno',380,0,2,1,44),(9,'Piantana WoodGlow',318,0,3,2,24),(10,'Orologio da Comodino',15,0,1,1,0),(11,'Lampada da Studio',80,0,3,2,17),(12,'Vaso Bianco',60,1425,1,1,3),(13,'Coppia di Vasi',45,1425,1,1,40),(14,'Divano Verde',480,0,2,1,6),(15,'Orologio da Parete',50,0,1,1,0);
/*!40000 ALTER TABLE `ProdottiInVendita` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Recensioni`
--

DROP TABLE IF EXISTS `Recensioni`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Recensioni` (
  `Utenti_idUtenti` int(11) NOT NULL,
  `ProdottiInVendita_idProdotto` int(11) NOT NULL,
  `Data` date DEFAULT NULL,
  `Valutazione` int(11) DEFAULT NULL,
  `Commento` varchar(1000) DEFAULT NULL,
  PRIMARY KEY (`Utenti_idUtenti`,`ProdottiInVendita_idProdotto`),
  KEY `fk_Recensiscono_ProdottiInVendita1_idx` (`ProdottiInVendita_idProdotto`),
  CONSTRAINT `fk_Recensiscono_ProdottiInVendita1` FOREIGN KEY (`ProdottiInVendita_idProdotto`) REFERENCES `ProdottiInVendita` (`idProdotto`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Recensiscono_Utenti` FOREIGN KEY (`Utenti_idUtenti`) REFERENCES `Utenti` (`idUtenti`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Recensioni`
--

LOCK TABLES `Recensioni` WRITE;
/*!40000 ALTER TABLE `Recensioni` DISABLE KEYS */;
/*!40000 ALTER TABLE `Recensioni` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Reparti`
--

DROP TABLE IF EXISTS `Reparti`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Reparti` (
  `idReparto` int(11) NOT NULL AUTO_INCREMENT,
  `NomeReparto` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idReparto`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Reparti`
--

LOCK TABLES `Reparti` WRITE;
/*!40000 ALTER TABLE `Reparti` DISABLE KEYS */;
INSERT INTO `Reparti` VALUES (1,'Arredamento'),(2,'Soggiorno'),(3,'Illuminazione');
/*!40000 ALTER TABLE `Reparti` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Utenti`
--

DROP TABLE IF EXISTS `Utenti`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Utenti` (
  `idUtenti` int(11) NOT NULL AUTO_INCREMENT,
  `Nome` varchar(45) DEFAULT NULL,
  `Cognome` varchar(45) DEFAULT NULL,
  `Username` varchar(45) DEFAULT NULL,
  `Email` varchar(45) DEFAULT NULL,
  `DataDiNascita` date DEFAULT NULL,
  `Password` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idUtenti`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Utenti`
--

LOCK TABLES `Utenti` WRITE;
/*!40000 ALTER TABLE `Utenti` DISABLE KEYS */;
/*!40000 ALTER TABLE `Utenti` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-07-14 16:20:17
