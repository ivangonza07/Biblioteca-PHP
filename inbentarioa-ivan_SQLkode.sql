-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema inbentarioadb-ivan
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema inbentarioadb-ivan
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `inbentarioadb-ivan` DEFAULT CHARACTER SET utf8 ;
USE `inbentarioadb-ivan` ;

-- -----------------------------------------------------
-- Table `inbentarioadb-ivan`.`erabiltzaileak`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `inbentarioadb-ivan`.`erabiltzaileak` (
  `Id` INT(11) NOT NULL AUTO_INCREMENT,
  `Izena` VARCHAR(30) NOT NULL,
  `Abizena` VARCHAR(30) NOT NULL,
  `Pasahitza` VARCHAR(30) NOT NULL,
  `Nan` VARCHAR(9) NOT NULL,
  `Telefonoa` VARCHAR(12) NULL DEFAULT NULL,
  `Helbidea` VARCHAR(30) NULL DEFAULT NULL,
  `Mota` VARCHAR(30) NOT NULL,
  PRIMARY KEY (`Id`))
ENGINE = InnoDB
AUTO_INCREMENT = 8
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `inbentarioadb-ivan`.`eskaera`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `inbentarioadb-ivan`.`eskaera` (
  `Id` INT(11) NOT NULL AUTO_INCREMENT,
  `Izena` VARCHAR(30) NOT NULL,
  `Kantitatea` INT(11) NOT NULL,
  `Mota` VARCHAR(30) NOT NULL,
  `prod_Id` INT(11) NOT NULL,
  `erabiltzaileak_Id` INT(11) NOT NULL,
  PRIMARY KEY (`Id`),
    FOREIGN KEY (`erabiltzaileak_Id`)
    REFERENCES `inbentarioadb-ivan`.`erabiltzaileak` (`Id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 227
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `inbentarioadb-ivan`.`produktuak`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `inbentarioadb-ivan`.`produktuak` (
  `Id` INT(11) NOT NULL AUTO_INCREMENT,
  `Izena` VARCHAR(30) NOT NULL,
  `kantitatea` INT(11) NOT NULL,
  `Mota` VARCHAR(30) NOT NULL,
  `Irudia` VARCHAR(30) NOT NULL,
  `Azalpena` VARCHAR(50) NOT NULL,
  PRIMARY KEY (`Id`))
ENGINE = InnoDB
AUTO_INCREMENT = 12
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `inbentarioadb-ivan`.`eskaera_has_produktuak`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `inbentarioadb-ivan`.`eskaera_has_produktuak` (
  `eskaera_Id` INT(11) NOT NULL,
  `produktuak_Id` INT(11) NOT NULL,
  PRIMARY KEY (`eskaera_Id`, `produktuak_Id`),
    FOREIGN KEY (`eskaera_Id`)
    REFERENCES `inbentarioadb-ivan`.`eskaera` (`Id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
    FOREIGN KEY (`produktuak_Id`)
    REFERENCES `inbentarioadb-ivan`.`produktuak` (`Id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `inbentarioadb-ivan`.`eskaera_historiala`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `inbentarioadb-ivan`.`eskaera_historiala` (
  `Id` INT(11) NOT NULL AUTO_INCREMENT,
  `Izena` VARCHAR(30) NOT NULL,
  `Mota` VARCHAR(30) NOT NULL,
  `kantitatea` INT(11) NOT NULL,
  `Data_hasiera` DATE NOT NULL,
  `Data_bukaera` DATE NOT NULL,
  `eskaera_Id` INT(11) NOT NULL,
  `produktuak_Id` INT(11) NOT NULL,
  `erabiltzaileak_Id` VARCHAR(30) NOT NULL,
  PRIMARY KEY (`Id`))
ENGINE = InnoDB
AUTO_INCREMENT = 153
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `inbentarioadb-ivan`.`orgatxoa`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `inbentarioadb-ivan`.`orgatxoa` (
  `Id` INT(11) NOT NULL AUTO_INCREMENT,
  `Izena` VARCHAR(30) NOT NULL,
  `orgatxo_Kantitatea` INT(11) NULL DEFAULT NULL,
  `Mota` VARCHAR(30) NOT NULL,
  `prod_Id` VARCHAR(45) NOT NULL,
  `erabiltzaileak_Id` INT(11) NOT NULL,
  PRIMARY KEY (`Id`),
    FOREIGN KEY (`erabiltzaileak_Id`)
    REFERENCES `inbentarioadb-ivan`.`erabiltzaileak` (`Id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 338
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `inbentarioadb-ivan`.`produktuak_has_orgatxoa`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `inbentarioadb-ivan`.`produktuak_has_orgatxoa` (
  `produktuak_Id` INT(11) NOT NULL,
  `orgatxoa_Id` INT(11) NOT NULL,
  PRIMARY KEY (`produktuak_Id`, `orgatxoa_Id`),
    FOREIGN KEY (`produktuak_Id`)
    REFERENCES `inbentarioadb-ivan`.`produktuak` (`Id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
    FOREIGN KEY (`orgatxoa_Id`)
    REFERENCES `inbentarioadb-ivan`.`orgatxoa` (`Id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

INSERT INTO `inbentarioadb-ivan`.`erabiltzaileak` (`Id`, `Izena`, `Abizena`, `Pasahitza`, `Nan`, `Telefonoa`, `Helbidea`, `Mota`) VALUES ('1', 'ivan', 'Gonzalez', '1234', '44331389Q', '943125468', 'Ordizia!', 'bezeroa');
INSERT INTO `inbentarioadb-ivan`.`erabiltzaileak` (`Id`, `Izena`, `Abizena`, `Pasahitza`, `Nan`, `Telefonoa`, `Helbidea`, `Mota`) VALUES ('2', 'admin', 'adminadmin', '1234', '44558762E', '943654789', 'ordizia', 'admin');
INSERT INTO `inbentarioadb-ivan`.`erabiltzaileak` (`Id`, `Izena`, `Abizena`, `Pasahitza`, `Nan`, `Telefonoa`, `Helbidea`, `Mota`) VALUES ('3', 'bez', 'bez', '1234', '45632145R', '943254657', 'ordizia', 'bezeroa');

INSERT INTO `inbentarioadb-ivan`.`produktuak` (`Id`, `Izena`, `kantitatea`, `Mota`, `Irudia`, `Azalpena`) VALUES ('1', 'Ana Frank', '5', 'berrerabilgarria', 'ana.png', 'Ana Franken bizitza kontatzen duen liburua');
INSERT INTO `inbentarioadb-ivan`.`produktuak` (`Id`, `Izena`, `kantitatea`, `Mota`, `Irudia`, `Azalpena`) VALUES ('2', 'Bat-Pat', '5', 'aldi-bat', 'bat.jpg', 'Bat pat-en abenturak');
INSERT INTO `inbentarioadb-ivan`.`produktuak` (`Id`, `Izena`, `kantitatea`, `Mota`, `Irudia`, `Azalpena`) VALUES ('3', 'El diario de un skin', '5', 'aldi-bat', 'diario.png', 'Skin baten bizitza kontatzen du');
INSERT INTO `inbentarioadb-ivan`.`produktuak` (`Id`, `Izena`, `kantitatea`, `Mota`, `Irudia`, `Azalpena`) VALUES ('4', 'Diez negritos', '5', 'berrerabilgarria', 'diez.png', '10 pertsonen hilketa nolakoa dan kontatzen du');
INSERT INTO `inbentarioadb-ivan`.`produktuak` (`Id`, `Izena`, `kantitatea`, `Mota`, `Irudia`, `Azalpena`) VALUES ('5', 'Geronimo Stilton', '5', 'berrerabilgarria', 'gero.png', 'Geronimo Stiltonen abenturak');


INSERT INTO `inbentarioadb-ivan`.`eskaera` (`Id`, `Izena`, `Kantitatea`, `Mota`, `prod_Id`, `erabiltzaileak_Id`) VALUES ('226', 'Ana Frank', '1', 'berrerabilgarria', '1', '3');

INSERT INTO `inbentarioadb-ivan`.`eskaera_historiala` (`Id`, `Izena`, `Mota`, `kantitatea`, `Data_hasiera`, `Data_bukaera`, `eskaera_Id`, `produktuak_Id`, `erabiltzaileak_Id`) VALUES ('152', 'Ana Frank', 'berrerabilgarria', '1', '2020-05-29', '2020-08-22', '337', '1', '3');

SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
