-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema db_events
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema db_events
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `db_events` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
-- -----------------------------------------------------
-- Schema db_events
-- -----------------------------------------------------
USE `db_events` ;

-- -----------------------------------------------------
-- Table `db_events`.`users`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_events`.`users` (
  `id` INT NOT NULL auto_increment,
  `name` VARCHAR(45) NOT NULL,
  `email` VARCHAR(45) NOT NULL,
  `password` VARCHAR(255) NOT NULL,
  `is_organizer` TINYINT(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;

    INSERT INTO `users` VALUES (1, 'Mark', 'MarkDexa@hotmail.com', '$2y$10$/FPq.CjbqsI5ShQTMP33SevKq4CuIPm1fI8gIhZY/Knm5TiVm1vnm',1);
    INSERT INTO `users` VALUES(2, 'Jef', 'JefTesla@outlook.be', 'test',1);
    INSERT INTO `users` VALUES(3, 'Marie', 'MarieFrida@live.be', '$2y$10$EbUrgw9iguKDLGZRiWYIK.bZbubV1AVmFMIsM.bOW/ioscH7Desle',0);
    INSERT INTO `users` VALUES(4, 'Josie', 'JosieW@hotmail.com', 'test2',1);
-- -----------------------------------------------------
-- Table `db_events`.`events`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_events`.`events` (
  `id` INT NOT NULL,
  `name` VARCHAR(45) NOT NULL,
  `description` VARCHAR(255) NOT NULL,
  `address` VARCHAR(45) NOT NULL,
  `capacity` INT NOT NULL,
  `user_id` INT NOT NULL,
  `status` TINYINT(1) NOT NULL,
  `start` DATETIME NOT NULL,
  `end` DATETIME NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_events_users1_idx` (`user_id` ASC) VISIBLE,
  CONSTRAINT `fk_events_users1`
    FOREIGN KEY (`user_id`)
    REFERENCES `db_events`.`users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

INSERT INTO `events` VALUES (1,'feestje in Lier','feestje voor inwoners van Lier','Blindeweg 19, Lier 2500', 200, 1, 1, '2022-11-27 11:51:20', '2022-11-29 12:00:00');
INSERT INTO `events` VALUES (2, 'vergadering C', 'Vergadering voor de raadsleden van Club FC Benen', 'Zwaluwstraat 8, Gent 9000', 20, 2, 0, '2022-11-27 10:51:20', now());
INSERT INTO `events` VALUES (3, '18e verjaardag', '18e verjaardag Lotte', 'Zandweg 14, Eke 9810', 100, 3, 1 ,'2022-11-26 10:51:20', now());
INSERT INTO `events` VALUES (7, 'kids', '🍰 verjaardagsfeestje Lowie', 'bij Lotte thuis', 15, 4, 0, now(), '2022-12-01 10:51:20');


-- -----------------------------------------------------
-- Table `db_events`.`slots`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_events`.`slots` (
  `id` INT NOT NULL,
  `name` VARCHAR(45) NOT NULL,
  `time_start` DATETIME NOT NULL,
  `time_end` DATETIME NOT NULL,
  `event_id` INT NOT NULL,
  `capacity` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_Slots_events_idx` (`event_id` ASC) VISIBLE,
  CONSTRAINT `fk_Slots_events`
    FOREIGN KEY (`event_id`)
    REFERENCES `db_events`.`events` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

INSERT INTO `slots` VALUES (1,'slot1','2022-11-27 11:51:20', '2022-11-29 12:00:00', 1, 200);
INSERT INTO `slots` VALUES (2, 'slot2', '2022-11-27 10:51:20', now(), 2, 20);
INSERT INTO `slots` VALUES (3, 'slot3', '2022-11-26 10:51:20', now(), 3, 100);
INSERT INTO `slots` VALUES (4, 'slot4', now(), '2022-12-01 10:51:20', 4, 15);

-- -----------------------------------------------------
-- Table `db_events`.`slots_has_users`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_events`.`slots_has_users` (
  `slot_id` INT NOT NULL,
  `user_id` INT NOT NULL,
  `amount_of_users` INT NOT NULL,
  PRIMARY KEY (`slot_id`, `user_id`),
  INDEX `fk_slots_has_users_users1_idx` (`user_id` ASC) VISIBLE,
  INDEX `fk_slots_has_users_slots1_idx` (`slot_id` ASC) VISIBLE,
  CONSTRAINT `fk_slots_has_users_slots1`
    FOREIGN KEY (`slot_id`)
    REFERENCES `db_events`.`slots` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_slots_has_users_users1`
    FOREIGN KEY (`user_id`)
    REFERENCES `db_events`.`users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;
INSERT INTO `slots_has_users` (`slot_id`, `user_id`, `amount_of_users`) VALUES
(1, 2, 2),
(2, 4, 6);

SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
