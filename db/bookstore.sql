SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

DROP SCHEMA IF EXISTS `bookstore` ;
CREATE SCHEMA IF NOT EXISTS `bookstore` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `bookstore` ;

-- -----------------------------------------------------
-- Table `bookstore`.`user_address`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `bookstore`.`user_address` ;

CREATE TABLE IF NOT EXISTS `bookstore`.`user_address` (
  `address_id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `country` VARCHAR(45) NOT NULL,
  `province` VARCHAR(45) NULL,
  `city` VARCHAR(45) NULL,
  `street` VARCHAR(45) NULL,
  `zipcode` VARCHAR(45) NULL,
  `remark` VARCHAR(45) NULL,
  PRIMARY KEY (`address_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bookstore`.`user`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `bookstore`.`user` ;

CREATE TABLE IF NOT EXISTS `bookstore`.`user` (
  `uid` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `username` VARCHAR(16) NOT NULL,
  `password` VARCHAR(32) NOT NULL,
  `email` VARCHAR(255) NULL,
  `gender` BIT NULL,
  `age` TINYINT NULL,
  `phone` VARCHAR(45) NULL,
  `create_time` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
  `user_address_address_id` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`uid`),
  INDEX `fk_user_user_address1_idx` (`user_address_address_id` ASC),
  CONSTRAINT `fk_user_user_address1`
    FOREIGN KEY (`user_address_address_id`)
    REFERENCES `bookstore`.`user_address` (`address_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
COMMENT = 'user';


-- -----------------------------------------------------
-- Table `bookstore`.`attachment`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `bookstore`.`attachment` ;

CREATE TABLE IF NOT EXISTS `bookstore`.`attachment` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `location` VARCHAR(120) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bookstore`.`book_category`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `bookstore`.`book_category` ;

CREATE TABLE IF NOT EXISTS `bookstore`.`book_category` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(255) NOT NULL,
  `create_time` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
  `description` VARCHAR(45) CHARACTER SET 'utf8' COLLATE 'utf8_general_ci' NULL,
  `remark` VARCHAR(45) NULL,
  `attachment_id` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_book_category_attachment1_idx` (`attachment_id` ASC),
  CONSTRAINT `fk_book_category_attachment1`
    FOREIGN KEY (`attachment_id`)
    REFERENCES `bookstore`.`attachment` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);


-- -----------------------------------------------------
-- Table `bookstore`.`book`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `bookstore`.`book` ;

CREATE TABLE IF NOT EXISTS `bookstore`.`book` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `book_category_id` INT NOT NULL,
  `name` VARCHAR(45) NULL,
  `author` VARCHAR(45) NULL,
  `press` VARCHAR(45) NULL,
  `price` DECIMAL(6,3) NULL,
  `publish_time` DATETIME NULL,
  `create_time` DATETIME NULL,
  `total_count` INT NULL,
  `sell_count` INT NULL,
  `click_count` INT NULL,
  `description` TEXT NULL,
  `remark` VARCHAR(45) NULL,
  `attachment_id` INT UNSIGNED NOT NULL,
  `is_discount` TINYINT(1) NULL DEFAULT 0,
  `price-now` DECIMAL(6,3) NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_book_book_category1_idx` (`book_category_id` ASC),
  INDEX `fk_book_attachment1_idx` (`attachment_id` ASC),
  CONSTRAINT `fk_book_book_category1`
    FOREIGN KEY (`book_category_id`)
    REFERENCES `bookstore`.`book_category` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_book_attachment1`
    FOREIGN KEY (`attachment_id`)
    REFERENCES `bookstore`.`attachment` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bookstore`.`order`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `bookstore`.`order` ;

CREATE TABLE IF NOT EXISTS `bookstore`.`order` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `order_id` VARCHAR(45) NULL,
  `name` VARCHAR(45) NULL,
  `adress` VARCHAR(45) NULL,
  `total_price` VARCHAR(45) NULL,
  `create_time` DATETIME NULL,
  `orderState` VARCHAR(45) NULL,
  `paymentWay` VARCHAR(45) NULL,
  `phone` VARCHAR(45) NULL,
  `post` VARCHAR(45) NULL,
  `user_uid` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_order_user1_idx` (`user_uid` ASC),
  CONSTRAINT `fk_order_user1`
    FOREIGN KEY (`user_uid`)
    REFERENCES `bookstore`.`user` (`uid`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bookstore`.`shop_cart`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `bookstore`.`shop_cart` ;

CREATE TABLE IF NOT EXISTS `bookstore`.`shop_cart` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `book_id` INT UNSIGNED NOT NULL,
  `user_id` INT UNSIGNED NOT NULL,
  `amount` INT NOT NULL,
  `create_time` DATETIME NULL,
  `remark` VARCHAR(45) NULL,
  `order_id` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_shop_cart_book1_idx` (`book_id` ASC),
  INDEX `fk_shop_cart_user1_idx` (`user_id` ASC),
  INDEX `fk_shop_cart_order1_idx` (`order_id` ASC),
  CONSTRAINT `fk_shop_cart_book1`
    FOREIGN KEY (`book_id`)
    REFERENCES `bookstore`.`book` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_shop_cart_user1`
    FOREIGN KEY (`user_id`)
    REFERENCES `bookstore`.`user` (`uid`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_shop_cart_order1`
    FOREIGN KEY (`order_id`)
    REFERENCES `bookstore`.`order` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bookstore`.`manager`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `bookstore`.`manager` ;

CREATE TABLE IF NOT EXISTS `bookstore`.`manager` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `account` VARCHAR(45) NULL,
  `password` VARCHAR(45) NULL,
  `remark` VARCHAR(45) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bookstore`.`log`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `bookstore`.`log` ;

CREATE TABLE IF NOT EXISTS `bookstore`.`log` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `do` VARCHAR(45) NULL,
  `create_author` VARCHAR(45) NULL,
  `create_time` VARCHAR(45) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
