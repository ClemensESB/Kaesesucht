-- MySQL Script generated by MySQL Workbench
-- Sat Jan  9 13:05:12 2021
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema kaeseshop
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema kaeseshop
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `kaeseshop` DEFAULT CHARACTER SET utf8 ;
USE `kaeseshop` ;

-- -----------------------------------------------------
-- Table `kaeseshop`.`sort`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `kaeseshop`.`sort` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `createdAt` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatetAt` TIMESTAMP NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `sortName` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`));


-- -----------------------------------------------------
-- Table `kaeseshop`.`price`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `kaeseshop`.`price` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `createdAt` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatetAt` TIMESTAMP NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `pricePerUnit` DECIMAL(7,2) NOT NULL,
  PRIMARY KEY (`id`));


-- -----------------------------------------------------
-- Table `kaeseshop`.`cheese`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `kaeseshop`.`cheese` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `createdAt` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatetAt` TIMESTAMP NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `cheeseName` VARCHAR(45) NOT NULL,
  `sort_id` INT NOT NULL,
  `price_id` INT NOT NULL,
  `qtyInStock` INT NOT NULL,
  `descrip` TINYTEXT NOT NULL,
  `recipe` TEXT NULL,
  `taste` VARCHAR(1) NOT NULL CHECK (taste = 'M' OR taste ='W'),
  `lactose` TINYINT(1) NOT NULL,
  `milkType` VARCHAR(1) NULL CHECK (milkType = 'B' OR milkType = 'K' OR milkType ='S' OR milkType = 'Z'),
  `rawMilk` TINYINT(1) NOT NULL,
  `pictureName` VARCHAR(50) NULL,
  PRIMARY KEY (`id`, `sort_id`, `price_id`),
  CONSTRAINT `fk_cheese_sort`
    FOREIGN KEY (`sort_id`)
    REFERENCES `kaeseshop`.`sort` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_cheese_price1`
    FOREIGN KEY (`price_id`)
    REFERENCES `kaeseshop`.`price` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);


-- -----------------------------------------------------
-- Table `kaeseshop`.`address`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `kaeseshop`.`address` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `createdAt` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatetAt` TIMESTAMP NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `zipCode` VARCHAR(5) NOT NULL CHECK (zipCode REGEXP '[0-9][0-9][0-9][0-9][0-9]'),
  `city` VARCHAR(50) NOT NULL,
  `street` VARCHAR(100) NOT NULL, 
  `strNo` VARCHAR(4) NOT NULL,
  `strAdd` VARCHAR(1) NULL,
  PRIMARY KEY (`id`));


-- -----------------------------------------------------
-- Table `kaeseshop`.`account`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `kaeseshop`.`account` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `createdAt` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatetAt` TIMESTAMP NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `email` VARCHAR(25) NULL CHECK (email REGEXP '^[A-Z0-9._%-]+@[A-Z0-9.-]+\.[A-Z]{2,4}$'),
  `firstName` VARCHAR(45) NOT NULL,
  `lastName` VARCHAR(45) NOT NULL,
  `address_id` INT NOT NULL,
  `payMethod` VARCHAR(1) NULL CHECK (payMethod = 'P' OR payMethod ='B' OR payMethod = 'S'),
  `isAdmin` TINYINT(1) NULL,
  `passwordHash` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id`, `address_id`),
  CONSTRAINT `fk_account_address1`
    FOREIGN KEY (`address_id`)
    REFERENCES `kaeseshop`.`address` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);


-- -----------------------------------------------------
-- Table `kaeseshop`.`orders`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `kaeseshop`.`orders` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `createdAt` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatetAt` TIMESTAMP NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `account_id` INT NOT NULL,
  PRIMARY KEY (`id`, `account_id`),
  CONSTRAINT `fk_orders_account1`
    FOREIGN KEY (`account_id`)
    REFERENCES `kaeseshop`.`account` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);


-- -----------------------------------------------------
-- Table `kaeseshop`.`orderedItems`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `kaeseshop`.`orderedItems` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `createdAt` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatetAt` TIMESTAMP NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `cheese_id` INT NOT NULL,
  `quantity` INT NOT NULL,
  `actualPrice` DECIMAL(7,2) NOT NULL,
  `orders_id` INT NOT NULL,
  PRIMARY KEY (`id`, `cheese_id`, `orders_id`),
  CONSTRAINT `fk_orderedItems_cheese1`
    FOREIGN KEY (`cheese_id`)
    REFERENCES `kaeseshop`.`cheese` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_orderedItems_orders1`
    FOREIGN KEY (`orders_id`)
    REFERENCES `kaeseshop`.`orders` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);


-- -----------------------------------------------------
-- Table `kaeseshop`.`base`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `kaeseshop`.`base` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `createdAt` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatetAt` TIMESTAMP NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`));


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
