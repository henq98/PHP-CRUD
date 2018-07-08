-- MySQL Script generated by MySQL Workbench
-- Sat Jul  7 00:56:40 2018
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema contatos
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema contatos
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `contatos` DEFAULT CHARACTER SET utf8 ;
USE `contatos` ;

-- -----------------------------------------------------
-- Table `contatos`.`usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `contatos`.`usuario` (
  `nome` VARCHAR(30) NOT NULL,
  `cpf` VARCHAR(11) NOT NULL,
  PRIMARY KEY (`cpf`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `contatos`.`email`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `contatos`.`email` (
  `pessoal` VARCHAR(45) NULL,
  `profissional` VARCHAR(45) NULL,
  `usuario_cpf` VARCHAR(11) NOT NULL,
  PRIMARY KEY (`usuario_cpf`),
  CONSTRAINT `fk_email_usuario`
    FOREIGN KEY (`usuario_cpf`)
    REFERENCES `contatos`.`usuario` (`cpf`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `contatos`.`telefone`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `contatos`.`telefone` (
  `celular` INT NULL,
  `residencial` INT NULL,
  `profissional` INT NULL,
  `usuario_cpf` VARCHAR(11) NOT NULL,
  PRIMARY KEY (`usuario_cpf`),
  CONSTRAINT `fk_telefone_usuario1`
    FOREIGN KEY (`usuario_cpf`)
    REFERENCES `contatos`.`usuario` (`cpf`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
