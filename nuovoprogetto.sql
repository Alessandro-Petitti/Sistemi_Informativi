-- MySQL Script generated by MySQL Workbench
-- Wed Jul 19 13:52:07 2023
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema nuovoprogetto
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema nuovoprogetto
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `nuovoprogetto` DEFAULT CHARACTER SET utf8 ;
USE `nuovoprogetto` ;

-- -----------------------------------------------------
-- Table `nuovoprogetto`.`Utenti`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `nuovoprogetto`.`Utenti` (
  `idUtenti` INT NOT NULL AUTO_INCREMENT,
  `Nome` VARCHAR(45) NULL,
  `Cognome` VARCHAR(45) NULL,
  `Username` VARCHAR(45) NULL,
  `Email` VARCHAR(45) NULL,
  `DataDiNascita` DATE NULL,
  `Password` VARCHAR(45) NULL,
  PRIMARY KEY (`idUtenti`))
ENGINE = InnoDB;

LOCK TABLES `Utenti` WRITE;
/*!40000 ALTER TABLE `Utenti` DISABLE KEYS */;
INSERT INTO `Utenti` VALUES (1,'Alessandro','Ferranti','Kale','aleferranti2002@gmail.com','2002-06-30','k'),(2,'Daniela','Ciao','daniela','dani@ciao.it','1966-04-01','ciao'),(3,'Pippo','Baudo','pippobaudo','jacobiano@bini.alessandro','2021-10-17','ciao'),(4,'Alberto','Fossa','Caimano','caimano@lazio.com','2002-06-20','for'),(5,'Adamo','Alo','del','a@l.com','1994-06-06','a'),(6,'ciao','ciao','Bello','bello@l.it','1988-04-04','ale'),(7,'Zero','Calcare','Calc','c@d.it','2002-04-05','a'),(8,'Sara','Coppola','qwerty','qwerty@a.com','2002-10-23','Sonoproprioqwerty');
/*!40000 ALTER TABLE `Utenti` ENABLE KEYS */;
UNLOCK TABLES;


-- -----------------------------------------------------
-- Table `nuovoprogetto`.`Magazzino`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `nuovoprogetto`.`Magazzino` (
  `idMagazzino` INT NOT NULL AUTO_INCREMENT,
  `Capacità` INT NULL,
  `Sede` VARCHAR(45) NULL,
  PRIMARY KEY (`idMagazzino`))
ENGINE = InnoDB;

LOCK TABLES `Magazzino` WRITE;
/*!40000 ALTER TABLE `Magazzino` DISABLE KEYS */;
INSERT INTO `Magazzino` VALUES (1,2000,'Milano'),(2,500,'Roma');
/*!40000 ALTER TABLE `Magazzino` ENABLE KEYS */;
UNLOCK TABLES;


-- -----------------------------------------------------
-- Table `nuovoprogetto`.`Reparti`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `nuovoprogetto`.`Reparti` (
  `idReparto` INT NOT NULL AUTO_INCREMENT,
  `NomeReparto` VARCHAR(45) NULL,
  PRIMARY KEY (`idReparto`))
ENGINE = InnoDB;

LOCK TABLES `Reparti` WRITE;
/*!40000 ALTER TABLE `Reparti` DISABLE KEYS */;
INSERT INTO `Reparti` VALUES (1,'Arredamento'),(2,'Soggiorno'),(3,'Illuminazione');
/*!40000 ALTER TABLE `Reparti` ENABLE KEYS */;
UNLOCK TABLES;


-- -----------------------------------------------------
-- Table `nuovoprogetto`.`ProdottiInVendita`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `nuovoprogetto`.`ProdottiInVendita` (
  `idProdotto` INT NOT NULL AUTO_INCREMENT,
  `NomeProdotto` VARCHAR(45) NULL,
  `Prezzo` FLOAT NULL,
  `CasaProduttrice` INT NULL,
  `Reparti_idReparto` INT NOT NULL,
  `Magazzino_idMagazzino` INT NOT NULL,
  `Quantità` INT NULL,
  PRIMARY KEY (`idProdotto`),
  INDEX `fk_ProdottiInVendita_Reparti1_idx` (`Reparti_idReparto` ASC),
  INDEX `fk_ProdottiInVendita_Magazzino1_idx` (`Magazzino_idMagazzino` ASC),
  CONSTRAINT `fk_ProdottiInVendita_Reparti1`
    FOREIGN KEY (`Reparti_idReparto`)
    REFERENCES `nuovoprogetto`.`Reparti` (`idReparto`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_ProdottiInVendita_Magazzino1`
    FOREIGN KEY (`Magazzino_idMagazzino`)
    REFERENCES `nuovoprogetto`.`Magazzino` (`idMagazzino`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

LOCK TABLES `ProdottiInVendita` WRITE;
/*!40000 ALTER TABLE `ProdottiInVendita` DISABLE KEYS */;
INSERT INTO `ProdottiInVendita` VALUES (1,'Sedia EcoLine',80,0,2,1,0),(2,'Lampada Elegante',50,0,3,2,40),(3,'Set di Vasi',90,1425,1,1,28),(4,'Divano Marrone',390,0,2,1,60),(5,'Sedia Elegante',60,0,2,1,22),(6,'Orario Classico',450,0,1,1,1),(7,'Sedia di Legno',40,0,2,1,10),(8,'Divano Moderno',380,0,2,1,44),(9,'Piantana WoodGlow',318,0,3,2,24),(10,'Orologio da Comodino',15,0,1,1,0),(11,'Lampada da Studio',80,0,3,2,17),(12,'Vaso Bianco',60,1425,1,1,3),(13,'Coppia di Vasi',45,1425,1,1,40),(14,'Divano Verde',480,0,2,1,6),(15,'Orologio da Parete',50,0,1,1,0);
/*!40000 ALTER TABLE `ProdottiInVendita` ENABLE KEYS */;
UNLOCK TABLES;


-- -----------------------------------------------------
-- Table `nuovoprogetto`.`Recensioni`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `nuovoprogetto`.`Recensioni` (
  `Utenti_idUtenti` INT NOT NULL,
  `ProdottiInVendita_idProdotto` INT NOT NULL,
  `Data` DATE NULL,
  `Valutazione` INT NULL,
  `Commento` VARCHAR(1000) NULL,
  PRIMARY KEY (`Utenti_idUtenti`, `ProdottiInVendita_idProdotto`),
  INDEX `fk_Recensiscono_ProdottiInVendita1_idx` (`ProdottiInVendita_idProdotto` ASC),
  CONSTRAINT `fk_Recensiscono_Utenti`
    FOREIGN KEY (`Utenti_idUtenti`)
    REFERENCES `nuovoprogetto`.`Utenti` (`idUtenti`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Recensiscono_ProdottiInVendita1`
    FOREIGN KEY (`ProdottiInVendita_idProdotto`)
    REFERENCES `nuovoprogetto`.`ProdottiInVendita` (`idProdotto`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

LOCK TABLES `Recensioni` WRITE;
/*!40000 ALTER TABLE `Recensioni` DISABLE KEYS */;
INSERT INTO `Recensioni` VALUES (1,1,'2023-07-18',5,'stupenda'),(1,2,'2023-07-18',3,'Straordinaria'),(1,3,'2023-07-18',3,'molto bello'),(1,4,'2021-08-17',5,'Mai vista una cosa del genere, eccezionale'),(1,5,'2021-09-17',1,'Non mi piace il colore'),(1,6,'2023-07-18',4,'bello senza tempo'),(1,7,'2023-07-18',3,'ciao bella sedia'),(1,9,'2023-07-18',3,'ottima lampada'),(1,12,'2023-07-18',5,'stupendo'),(1,15,'2023-07-18',1,'bello'),(2,4,'2023-07-18',1,'ciao'),(2,5,'2021-10-17',3,'Superbo'),(3,4,'2021-08-17',5,'Mai vista una cosa del genere, eccezionale'),(3,5,'2021-08-17',5,'Mai vista una cosa del genere, eccezionale'),(3,6,'2021-08-17',5,'Mai vista una cosa del genere, eccezionale'),(3,14,'2021-08-17',3,'Bellissimo, ma non perfetto'),(4,1,'2023-07-18',4,'Una sedia bellissima, spero che torni presto disponibile!'),(4,2,'2023-07-18',5,'Che bella lampada'),(4,4,'2023-07-18',4,'ciao a tutti'),(4,5,'2023-07-18',4,'Sedia molto bella, bello il colore!'),(6,5,'2023-07-18',3,'Che bella sedia'),(7,12,'2023-07-18',3,'Bellissimo vaso'),(8,2,'2023-07-18',4,'Lampada perfetta per il mio salotto, elegante e raffinata. Il prezzo è forse troppo elevato, ma ho apprezzato la spedizione gratuita.');
/*!40000 ALTER TABLE `Recensioni` ENABLE KEYS */;
UNLOCK TABLES;


-- -----------------------------------------------------
-- Table `nuovoprogetto`.`Acquisti`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `nuovoprogetto`.`Acquisti` (
  `Utenti_idUtenti` INT NOT NULL,
  `ProdottiInVendita_idProdotto` INT NOT NULL,
  `Quantità` INT NULL,
  `Data` DATETIME(3) NOT NULL,
  PRIMARY KEY (`Utenti_idUtenti`, `ProdottiInVendita_idProdotto`, `Data`),
  INDEX `fk_Acquistano_ProdottiInVendita1_idx` (`ProdottiInVendita_idProdotto` ASC),
  CONSTRAINT `fk_Acquistano_Utenti1`
    FOREIGN KEY (`Utenti_idUtenti`)
    REFERENCES `nuovoprogetto`.`Utenti` (`idUtenti`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Acquistano_ProdottiInVendita1`
    FOREIGN KEY (`ProdottiInVendita_idProdotto`)
    REFERENCES `nuovoprogetto`.`ProdottiInVendita` (`idProdotto`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
