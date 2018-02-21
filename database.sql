/*
SQLyog Trial v12.5.1 (64 bit)
MySQL - 10.1.30-MariaDB : Database - smart_coffee
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`smart_coffee` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `smart_coffee`;

/*Table structure for table `client_recipe_ingredients` */

DROP TABLE IF EXISTS `client_recipe_ingredients`;

CREATE TABLE `client_recipe_ingredients` (
  `ingredient_id` int(10) unsigned NOT NULL,
  `client_recipe_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`ingredient_id`,`client_recipe_id`),
  KEY `fk_complements_ingredients_idx` (`ingredient_id`),
  KEY `fk_complements_orders_items_idx` (`client_recipe_id`),
  CONSTRAINT `fk_complements_ingredients` FOREIGN KEY (`ingredient_id`) REFERENCES `ingredients` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_complements_orders_items` FOREIGN KEY (`client_recipe_id`) REFERENCES `client_recipes` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `client_recipe_ingredients` */

insert  into `client_recipe_ingredients`(`ingredient_id`,`client_recipe_id`) values 
(2,60),
(6,61);

/*Table structure for table `client_recipes` */

DROP TABLE IF EXISTS `client_recipes`;

CREATE TABLE `client_recipes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `recipe_id` int(10) unsigned NOT NULL,
  `client_id` int(10) unsigned NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `fk_orders_items_recipes_idx` (`recipe_id`),
  KEY `fk_client_recipes_clients1_idx` (`client_id`),
  CONSTRAINT `fk_client_recipes_clients1` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_orders_items_recipes` FOREIGN KEY (`recipe_id`) REFERENCES `recipes` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=62 DEFAULT CHARSET=utf8;

/*Data for the table `client_recipes` */

insert  into `client_recipes`(`id`,`recipe_id`,`client_id`,`created_at`) values 
(59,3,175,'2018-02-21 13:41:55'),
(60,2,176,'2018-02-21 13:44:32'),
(61,4,177,'2018-02-21 13:51:14');

/*Table structure for table `clients` */

DROP TABLE IF EXISTS `clients`;

CREATE TABLE `clients` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `email` varchar(255) NOT NULL,
  `coupon_code` varchar(45) DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email_UNIQUE` (`email`),
  UNIQUE KEY `coupon_code_UNIQUE` (`coupon_code`)
) ENGINE=InnoDB AUTO_INCREMENT=178 DEFAULT CHARSET=utf8;

/*Data for the table `clients` */

insert  into `clients`(`id`,`name`,`email`,`coupon_code`,`created_at`) values 
(175,'Thais Ferrer','thsferrer@gmail.com','5048487705a8da14f689d7','2018-02-21 13:41:51'),
(176,'Maria','maria@hotmail.com','14883857355a8da1ec5637f','2018-02-21 13:44:28'),
(177,'t','rtt@gmail.com','4662514945a8da2d8b6ce5','2018-02-21 13:48:24');

/*Table structure for table `complements` */

DROP TABLE IF EXISTS `complements`;

CREATE TABLE `complements` (
  `recipe_id` int(10) unsigned NOT NULL,
  `ingredient_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`recipe_id`,`ingredient_id`),
  KEY `fk_ingredients_recipes_recipes_idx` (`recipe_id`),
  KEY `fk_ingredients_recipes_ingredients_idx` (`ingredient_id`),
  CONSTRAINT `fk_ingredients_recipes_ingredients` FOREIGN KEY (`ingredient_id`) REFERENCES `ingredients` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_ingredients_recipes_recipes` FOREIGN KEY (`recipe_id`) REFERENCES `recipes` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `complements` */

insert  into `complements`(`recipe_id`,`ingredient_id`) values 
(1,2),
(1,4),
(1,5),
(1,6),
(1,7),
(1,8),
(2,2),
(2,4),
(2,5),
(2,6),
(2,7),
(2,8),
(3,2),
(3,4),
(3,5),
(3,6),
(3,7),
(3,8),
(4,2),
(4,4),
(4,5),
(4,6),
(4,7),
(4,8),
(5,1),
(5,2),
(5,4),
(5,5),
(5,6),
(5,7);

/*Table structure for table `ingredients` */

DROP TABLE IF EXISTS `ingredients`;

CREATE TABLE `ingredients` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `preparation_time` int(11) NOT NULL,
  `photo` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name_UNIQUE` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

/*Data for the table `ingredients` */

insert  into `ingredients`(`id`,`name`,`preparation_time`,`photo`) values 
(1,'Café',45,'images/coffee.svg'),
(2,'Açucar',10,'images/acucar.svg'),
(3,'Chocolate',10,'images/chocolate.png'),
(4,'Leite',10,'images/leite.svg'),
(5,'Chantilly',10,'images/chantilly.svg'),
(6,'Donuts - Super recheados',45,'images/donut.svg'),
(7,'Cookie de Chocolate',45,'images/cookie.svg'),
(8,'CupCake',45,'images/cupcake.svg');

/*Table structure for table `recipe_ingredients` */

DROP TABLE IF EXISTS `recipe_ingredients`;

CREATE TABLE `recipe_ingredients` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ingredient_id` int(10) unsigned NOT NULL,
  `recipe_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_recipes_complements_recipes_idx` (`recipe_id`),
  KEY `fk_recipes_complements_ingredients_idx` (`ingredient_id`),
  CONSTRAINT `fk_ingredients_has_recipes_ingredients1` FOREIGN KEY (`ingredient_id`) REFERENCES `ingredients` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_ingredients_has_recipes_recipes1` FOREIGN KEY (`recipe_id`) REFERENCES `recipes` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

/*Data for the table `recipe_ingredients` */

insert  into `recipe_ingredients`(`id`,`ingredient_id`,`recipe_id`) values 
(1,1,1),
(2,1,2),
(3,1,3),
(4,3,3),
(5,4,3),
(6,1,4),
(7,3,4),
(8,4,4),
(9,1,5);

/*Table structure for table `recipes` */

DROP TABLE IF EXISTS `recipes`;

CREATE TABLE `recipes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `content` text NOT NULL,
  `photo` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name_UNIQUE` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

/*Data for the table `recipes` */

insert  into `recipes`(`id`,`name`,`content`,`photo`) values 
(1,'Café duplo','','images/cafe-duplo.svg'),
(2,'Café expresso','','images/coffee.svg'),
(3,'Mocha','','images/mocha.svg'),
(4,'Cappuccino','','images/cappuccino.svg'),
(5,'Americano','','images/cafe-americano.svg');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
