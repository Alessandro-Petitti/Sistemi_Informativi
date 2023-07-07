-- MySQL Script generated by MySQL Workbench
-- Thu Jul  6 17:51:02 2023
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema nuovoProgetto
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema nuovoProgetto
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `nuovoProgetto` DEFAULT CHARACTER SET utf8 ;
USE `nuovoProgetto` ;

-- -----------------------------------------------------
-- Table `nuovoProgetto`.`Utenti`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `nuovoProgetto`.`Utenti` (
  `idUtenti` INT NOT NULL AUTO_INCREMENT,
  `Nome` VARCHAR(45) NULL,
  `Cognome` VARCHAR(45) NULL,
  `Username` VARCHAR(45) NULL,
  `Email` VARCHAR(45) NULL,
  `DataDiNascita` DATE NULL,
  `Password` VARCHAR(45) NULL,
  PRIMARY KEY (`idUtenti`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `nuovoProgetto`.`Magazzino`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `nuovoProgetto`.`Magazzino` (
  `idMagazzino` INT NOT NULL AUTO_INCREMENT,
  `Quantità` VARCHAR(45) NULL,
  `IdProdotto` VARCHAR(45) NULL,
  PRIMARY KEY (`idMagazzino`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `nuovoProgetto`.`Reparti`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `nuovoProgetto`.`Reparti` (
  `idReparto` INT NOT NULL AUTO_INCREMENT,
  `NomeReparto` VARCHAR(45) NULL,
  PRIMARY KEY (`idReparto`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `nuovoProgetto`.`ProdottiInVendita`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `nuovoProgetto`.`ProdottiInVendita` (
  `idProdotto` INT NOT NULL AUTO_INCREMENT,
  `NomeProdotto` VARCHAR(45) NULL,
  `Prezzo` FLOAT NULL,
  `Id_magazzino` INT NULL,
  `RepartoVendita` VARCHAR(45) NULL,
  `CasaProduttrice` INT NULL,
  `Reparti_idReparto` INT NOT NULL,
  `Magazzino_idMagazzino` INT NOT NULL,
  PRIMARY KEY (`idProdotto`, `Reparti_idReparto`, `Magazzino_idMagazzino`),
  INDEX `fk_ProdottiInVendita_Reparti1_idx` (`Reparti_idReparto` ASC),
  INDEX `fk_ProdottiInVendita_Magazzino1_idx` (`Magazzino_idMagazzino` ASC),
  CONSTRAINT `fk_ProdottiInVendita_Reparti1`
    FOREIGN KEY (`Reparti_idReparto`)
    REFERENCES `nuovoProgetto`.`Reparti` (`idReparto`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_ProdottiInVendita_Magazzino1`
    FOREIGN KEY (`Magazzino_idMagazzino`)
    REFERENCES `nuovoProgetto`.`Magazzino` (`idMagazzino`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `nuovoProgetto`.`Recensioni`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `nuovoProgetto`.`Recensioni` (
  `Utenti_idUtenti` INT NOT NULL,
  `ProdottiInVendita_idProdotto` INT NOT NULL,
  `Data` DATE NULL,
  `Valutazione` INT NULL,
  `Commento` VARCHAR(1000) NULL,
  PRIMARY KEY (`Utenti_idUtenti`, `ProdottiInVendita_idProdotto`),
  INDEX `fk_Recensiscono_ProdottiInVendita1_idx` (`ProdottiInVendita_idProdotto` ASC),
  CONSTRAINT `fk_Recensiscono_Utenti`
    FOREIGN KEY (`Utenti_idUtenti`)
    REFERENCES `nuovoProgetto`.`Utenti` (`idUtenti`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Recensiscono_ProdottiInVendita1`
    FOREIGN KEY (`ProdottiInVendita_idProdotto`)
    REFERENCES `nuovoProgetto`.`ProdottiInVendita` (`idProdotto`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `nuovoProgetto`.`Acquisti`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `nuovoProgetto`.`Acquisti` (
  `Utenti_idUtenti` INT NOT NULL,
  `ProdottiInVendita_idProdotto` INT NOT NULL,
  `Quantità` INT NULL,
  `Data` DATE NULL,
  PRIMARY KEY (`Utenti_idUtenti`, `ProdottiInVendita_idProdotto`),
  INDEX `fk_Acquistano_ProdottiInVendita1_idx` (`ProdottiInVendita_idProdotto` ASC),
  CONSTRAINT `fk_Acquistano_Utenti1`
    FOREIGN KEY (`Utenti_idUtenti`)
    REFERENCES `nuovoProgetto`.`Utenti` (`idUtenti`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Acquistano_ProdottiInVendita1`
    FOREIGN KEY (`ProdottiInVendita_idProdotto`)
    REFERENCES `nuovoProgetto`.`ProdottiInVendita` (`idProdotto`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
