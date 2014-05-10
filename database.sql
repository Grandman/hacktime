SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

CREATE SCHEMA IF NOT EXISTS `todoshka` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `todoshka` ;

-- -----------------------------------------------------
-- Table `todoshka`.`projects`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `todoshka`.`projects` ;

CREATE TABLE IF NOT EXISTS `todoshka`.`projects` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL,
  `color` VARCHAR(6) NOT NULL,
  `completed` TINYINT(1) NOT NULL DEFAULT False,
  `parent_id` INT NULL,
  `owner_id` INT NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `todoshka`.`tasks`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `todoshka`.`tasks` ;

CREATE TABLE IF NOT EXISTS `todoshka`.`tasks` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL,
  `description` VARCHAR(255) NOT NULL,
  `date` DATETIME NULL,
  `priority` INT NOT NULL,
  `completed` TINYINT(1) NOT NULL DEFAULT false,
  `parent_id` INT NULL,
  `projects_id` INT NULL,
  `owner_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_tasks_projects1_idx` (`projects_id` ASC),
  CONSTRAINT `fk_tasks_projects1`
    FOREIGN KEY (`projects_id`)
    REFERENCES `todoshka`.`projects` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `todoshka`.`notes`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `todoshka`.`notes` ;

CREATE TABLE IF NOT EXISTS `todoshka`.`notes` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL,
  `description` VARCHAR(255) NOT NULL,
  `color` VARCHAR(6) NOT NULL,
  `projects_id` INT NULL,
  `tasks_id` INT NULL,
  `owner_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_notes_projects_idx` (`projects_id` ASC),
  INDEX `fk_notes_tasks1_idx` (`tasks_id` ASC),
  CONSTRAINT `fk_notes_projects`
    FOREIGN KEY (`projects_id`)
    REFERENCES `todoshka`.`projects` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_notes_tasks1`
    FOREIGN KEY (`tasks_id`)
    REFERENCES `todoshka`.`tasks` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `todoshka`.`users`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `todoshka`.`users` ;

CREATE TABLE IF NOT EXISTS `todoshka`.`users` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `login` VARCHAR(15) NOT NULL,
  `email` VARCHAR(50) NOT NULL,
  `password` VARCHAR(33) NOT NULL,
  `hash` VARCHAR(33) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `todoshka`.`users_has_projects`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `todoshka`.`users_has_projects` ;

CREATE TABLE IF NOT EXISTS `todoshka`.`users_has_projects` (
  `users_id` INT NOT NULL,
  `projects_id` INT NOT NULL,
  PRIMARY KEY (`users_id`, `projects_id`),
  INDEX `fk_users_has_projects_projects1_idx` (`projects_id` ASC),
  INDEX `fk_users_has_projects_users1_idx` (`users_id` ASC),
  CONSTRAINT `fk_users_has_projects_users1`
    FOREIGN KEY (`users_id`)
    REFERENCES `todoshka`.`users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_users_has_projects_projects1`
    FOREIGN KEY (`projects_id`)
    REFERENCES `todoshka`.`projects` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `todoshka`.`users_has_notes`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `todoshka`.`users_has_notes` ;

CREATE TABLE IF NOT EXISTS `todoshka`.`users_has_notes` (
  `users_id` INT NOT NULL,
  `notes_id` INT NOT NULL,
  PRIMARY KEY (`users_id`, `notes_id`),
  INDEX `fk_users_has_notes_notes1_idx` (`notes_id` ASC),
  INDEX `fk_users_has_notes_users1_idx` (`users_id` ASC),
  CONSTRAINT `fk_users_has_notes_users1`
    FOREIGN KEY (`users_id`)
    REFERENCES `todoshka`.`users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_users_has_notes_notes1`
    FOREIGN KEY (`notes_id`)
    REFERENCES `todoshka`.`notes` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `todoshka`.`users_has_tasks`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `todoshka`.`users_has_tasks` ;

CREATE TABLE IF NOT EXISTS `todoshka`.`users_has_tasks` (
  `users_id` INT NOT NULL,
  `tasks_id` INT NOT NULL,
  PRIMARY KEY (`users_id`, `tasks_id`),
  INDEX `fk_users_has_tasks_tasks1_idx` (`tasks_id` ASC),
  INDEX `fk_users_has_tasks_users1_idx` (`users_id` ASC),
  CONSTRAINT `fk_users_has_tasks_users1`
    FOREIGN KEY (`users_id`)
    REFERENCES `todoshka`.`users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_users_has_tasks_tasks1`
    FOREIGN KEY (`tasks_id`)
    REFERENCES `todoshka`.`tasks` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
