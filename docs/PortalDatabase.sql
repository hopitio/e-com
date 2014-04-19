/*
SQLyog Ultimate v11.3 (64 bit)
MySQL - 5.5.32 : Database - portal_e_project
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`portal_e_project` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci */;

USE `portal_e_project`;

/*Table structure for table `t_invoice` */

DROP TABLE IF EXISTS `t_invoice`;

CREATE TABLE `t_invoice` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_order` int(11) DEFAULT NULL,
  `created_user` int(11) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `paid_date` datetime DEFAULT NULL,
  `cancelled_date` datetime DEFAULT NULL,
  `rejected_date` datetime DEFAULT NULL,
  `comment` text COLLATE utf8_unicode_ci,
  `payment_method` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `invoice_type` enum('input','output') COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_order` (`fk_order`),
  CONSTRAINT `t_invoice_ibfk_1` FOREIGN KEY (`fk_order`) REFERENCES `t_order` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `t_invoice` */

/*Table structure for table `t_invoice_product` */

DROP TABLE IF EXISTS `t_invoice_product`;

CREATE TABLE `t_invoice_product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_invoice` int(11) DEFAULT NULL,
  `fk_product` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_invoice` (`fk_invoice`),
  KEY `fk_product` (`fk_product`),
  CONSTRAINT `t_invoice_product_ibfk_1` FOREIGN KEY (`fk_invoice`) REFERENCES `t_invoice` (`id`),
  CONSTRAINT `t_invoice_product_ibfk_2` FOREIGN KEY (`fk_product`) REFERENCES `t_product` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `t_invoice_product` */

/*Table structure for table `t_invoice_shipping` */

DROP TABLE IF EXISTS `t_invoice_shipping`;

CREATE TABLE `t_invoice_shipping` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_invoice` int(11) DEFAULT NULL,
  `fk_user_contact` int(11) DEFAULT NULL,
  `created_user` datetime DEFAULT NULL,
  `display_name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `price` double DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `ship_date` datetime DEFAULT NULL,
  `complete_date` datetime DEFAULT NULL,
  `shipping_type` enum('PAY','SHIP') COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `t_invoice_shipping_ibfk_1` (`fk_invoice`),
  KEY `fk_user_contact` (`fk_user_contact`),
  CONSTRAINT `t_invoice_shipping_ibfk_1` FOREIGN KEY (`fk_invoice`) REFERENCES `t_invoice` (`id`),
  CONSTRAINT `t_invoice_shipping_ibfk_2` FOREIGN KEY (`fk_user_contact`) REFERENCES `t_user_contact` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `t_invoice_shipping` */

/*Table structure for table `t_order` */

DROP TABLE IF EXISTS `t_order`;

CREATE TABLE `t_order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sub_key` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `fk_user` int(11) DEFAULT NULL,
  `created_user` int(11) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `shiped_date` datetime DEFAULT NULL,
  `canceled_date` datetime DEFAULT NULL,
  `completed_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_user` (`fk_user`),
  CONSTRAINT `t_order_ibfk_1` FOREIGN KEY (`fk_user`) REFERENCES `t_user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `t_order` */

insert  into `t_order`(`id`,`sub_key`,`fk_user`,`created_user`,`created_date`,`shiped_date`,`canceled_date`,`completed_date`) values (3,'',42,NULL,NULL,NULL,NULL,NULL),(4,'',42,NULL,NULL,NULL,NULL,NULL),(5,'',42,NULL,NULL,NULL,NULL,NULL),(6,'',42,NULL,NULL,NULL,NULL,NULL),(7,'',42,NULL,NULL,NULL,NULL,NULL),(8,'',42,NULL,NULL,NULL,NULL,NULL),(9,'',42,NULL,NULL,NULL,NULL,NULL),(10,'',42,NULL,NULL,NULL,NULL,NULL),(11,'',42,NULL,NULL,NULL,NULL,NULL),(12,'',42,NULL,NULL,NULL,NULL,NULL),(13,'',42,NULL,NULL,NULL,NULL,NULL),(14,'',42,NULL,NULL,NULL,NULL,NULL),(15,'',42,NULL,NULL,NULL,NULL,NULL),(16,'',42,NULL,NULL,NULL,NULL,NULL),(17,'',42,NULL,NULL,NULL,NULL,NULL),(18,'',42,NULL,NULL,NULL,NULL,NULL),(19,'',42,NULL,NULL,NULL,NULL,NULL),(20,'',42,NULL,NULL,NULL,NULL,NULL),(21,'',42,NULL,NULL,NULL,NULL,NULL),(22,'',42,NULL,NULL,NULL,NULL,NULL),(23,'',42,NULL,NULL,NULL,NULL,NULL),(24,'',42,NULL,NULL,NULL,NULL,NULL),(25,'',42,NULL,NULL,NULL,NULL,NULL),(26,'',42,NULL,NULL,NULL,NULL,NULL),(27,'',42,NULL,NULL,NULL,NULL,NULL);

/*Table structure for table `t_other_cost` */

DROP TABLE IF EXISTS `t_other_cost`;

CREATE TABLE `t_other_cost` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_invoice` int(11) DEFAULT NULL,
  `value` double DEFAULT NULL,
  `comment` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`),
  KEY `fk_invoice` (`fk_invoice`),
  CONSTRAINT `t_other_cost_ibfk_1` FOREIGN KEY (`fk_invoice`) REFERENCES `t_invoice` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `t_other_cost` */

/*Table structure for table `t_product` */

DROP TABLE IF EXISTS `t_product`;

CREATE TABLE `t_product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sub_id` int(11) DEFAULT NULL,
  `name` varchar(11) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sub_image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `short_description` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `price` double DEFAULT NULL,
  `quantity` double DEFAULT NULL,
  `totalprice` double DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `t_product` */

/*Table structure for table `t_tax` */

DROP TABLE IF EXISTS `t_tax`;

CREATE TABLE `t_tax` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_product` int(11) DEFAULT NULL,
  `sub_tax_id` int(11) DEFAULT NULL,
  `sub_tax_name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sub_tax_value` double DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_product` (`fk_product`),
  CONSTRAINT `t_tax_ibfk_1` FOREIGN KEY (`fk_product`) REFERENCES `t_product` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `t_tax` */

/*Table structure for table `t_user` */

DROP TABLE IF EXISTS `t_user`;

CREATE TABLE `t_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lastname` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `account` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sex` enum('M','F','O') COLLATE utf8_unicode_ci DEFAULT NULL,
  `DOB` datetime DEFAULT NULL,
  `date_joined` datetime DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `status_date` datetime DEFAULT NULL,
  `status_reason` text COLLATE utf8_unicode_ci,
  `last_active` datetime DEFAULT NULL,
  `platform_key` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `t_user` */

insert  into `t_user`(`id`,`firstname`,`lastname`,`account`,`password`,`sex`,`DOB`,`date_joined`,`status`,`status_date`,`status_reason`,`last_active`,`platform_key`) values (42,'Lê Thanh An ','an ','lethanhan.bkaptech@gmail.com','123123123','F','1990-05-23 00:00:00','2014-04-02 11:04:48',0,'2014-04-02 11:04:48','Tạo mới tài khoản','2014-04-02 11:04:48',0),(43,'Le Thanh ','an ','lethanhan.bkaptech@gmail.com','123123123','M','0000-00-00 00:00:00','2014-04-02 11:04:31',0,'2014-04-02 11:04:31','Tạo mới tài khoản','2014-04-02 11:04:31',0),(44,'Le Thanh ','an ','lethanhan.bkaptech@gmail.com','123123123','M','0000-00-00 00:00:00','2014-04-02 11:04:22',1,'0000-00-00 00:00:00','Thực hiện việc active user','2014-04-02 11:04:22',0);

/*Table structure for table `t_user_contact` */

DROP TABLE IF EXISTS `t_user_contact`;

CREATE TABLE `t_user_contact` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_user` int(11) DEFAULT NULL,
  `date_created` datetime DEFAULT NULL,
  `date_used` datetime DEFAULT NULL,
  `count_used` int(11) DEFAULT NULL,
  `prefix` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `firstname` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `middlename` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lastname` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `suffix` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `company` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `street_address` text COLLATE utf8_unicode_ci,
  `city` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `country` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `state_province` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `zip_postal_code` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `telephone` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fax` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `vat_number` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_user` (`fk_user`),
  CONSTRAINT `t_user_contact_ibfk_2` FOREIGN KEY (`fk_user`) REFERENCES `t_user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `t_user_contact` */

insert  into `t_user_contact`(`id`,`fk_user`,`date_created`,`date_used`,`count_used`,`prefix`,`firstname`,`middlename`,`lastname`,`suffix`,`company`,`street_address`,`city`,`country`,`state_province`,`zip_postal_code`,`telephone`,`fax`,`vat_number`) values (2,NULL,NULL,NULL,NULL,NULL,'Lê Thanh An ',NULL,'Lê Thanh An ',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(3,NULL,NULL,NULL,NULL,NULL,'Lê Thanh An ',NULL,'Lê Thanh An ',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(4,NULL,NULL,NULL,NULL,NULL,'Lê Thanh An ',NULL,'Lê Thanh An ',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(5,NULL,NULL,NULL,NULL,NULL,'Lê Thanh An ',NULL,'Lê Thanh An ',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(6,NULL,NULL,NULL,NULL,NULL,'Lê Thanh An ',NULL,'Lê Thanh An ',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(7,NULL,NULL,NULL,NULL,NULL,'Lê Thanh An ',NULL,'Lê Thanh An ',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(8,NULL,NULL,NULL,NULL,NULL,'Lê Thanh An ',NULL,'Lê Thanh An ',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(9,NULL,NULL,NULL,NULL,NULL,'Lê Thanh An ',NULL,'Lê Thanh An ',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(10,NULL,NULL,NULL,NULL,NULL,'Lê Thanh An ',NULL,'Lê Thanh An ',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(11,NULL,NULL,NULL,NULL,NULL,'Lê Thanh An ',NULL,'Lê Thanh An ',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(12,NULL,NULL,NULL,NULL,NULL,'Lê Thanh An ',NULL,'Lê Thanh An ',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(13,NULL,NULL,NULL,NULL,NULL,'Lê Thanh An ',NULL,'Lê Thanh An ',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(14,NULL,NULL,NULL,NULL,NULL,'Lê Thanh An ',NULL,'Lê Thanh An ',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(15,NULL,NULL,NULL,NULL,NULL,'Lê Thanh An ',NULL,'Lê Thanh An ',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(16,NULL,NULL,NULL,NULL,NULL,'Lê Thanh An ',NULL,'Lê Thanh An ',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(17,NULL,NULL,NULL,NULL,NULL,'Lê Thanh An ',NULL,'Lê Thanh An ',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(18,NULL,NULL,NULL,NULL,NULL,'Lê Thanh An ',NULL,'Lê Thanh An ',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(19,NULL,NULL,NULL,NULL,NULL,'Lê Thanh An ',NULL,'Lê Thanh An ',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);

/*Table structure for table `t_user_history` */

DROP TABLE IF EXISTS `t_user_history`;

CREATE TABLE `t_user_history` (
  `id` char(50) COLLATE utf8_unicode_ci NOT NULL,
  `fk_user` int(11) NOT NULL,
  `secret_key` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `client_ip` char(20) COLLATE utf8_unicode_ci NOT NULL,
  `user_agrent` char(50) COLLATE utf8_unicode_ci NOT NULL,
  `last_activity` char(20) COLLATE utf8_unicode_ci NOT NULL,
  `sub_system_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `action_name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `session_id` char(20) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `t_user_history` */

insert  into `t_user_history`(`id`,`fk_user`,`secret_key`,`client_ip`,`user_agrent`,`last_activity`,`sub_system_name`,`description`,`action_name`,`session_id`) values ('085783a2-c5e5-11e3-b6d9-fc4dd45603ff',42,'8eb9072a7b7dbe4d48acbc9416f0452c','127.0.0.1','Mozilla/5.0 (Windows NT 6.3; WOW64; rv:28.0) Gecko','2014-04-17 11:04:02','GIFT','2014-04-17 11:02:02','LOGIN','b83475b5161d4f7126ac'),('1085bdea-c6bc-11e3-9740-fc4dd45603ff',42,'7cb72bdf8dfc294422c8d51176c4b68f','127.0.0.1','Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/53','2014-04-18 12:04:18','PORTAL','2014-04-18 12:41:18','LOGIN','9e9e5d15459629fa1b06'),('146ee02b-c6b8-11e3-9740-fc4dd45603ff',42,'7cb72bdf8dfc294422c8d51176c4b68f','127.0.0.1','Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/53','2014-04-18 12:04:47','PORTAL','2014-04-18 12:12:47','LOGIN','01494f14e68c8b24f859'),('189437ef-c6b9-11e3-9740-fc4dd45603ff',42,'7cb72bdf8dfc294422c8d51176c4b68f','127.0.0.1','Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/53','2014-04-18 12:04:03','PORTAL','2014-04-18 12:20:03','LOGIN','69fed27f4ccff1393146'),('201b935e-c6b6-11e3-9740-fc4dd45603ff',42,'7cb72bdf8dfc294422c8d51176c4b68f','127.0.0.1','Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/53','2014-04-18 11:04:47','PORTAL','2014-04-18 11:58:47','LOGIN','2f5ef1abd99937f6026f'),('25f38fce-c5e4-11e3-b6d9-fc4dd45603ff',42,NULL,'127.0.0.1','Mozilla/5.0 (Windows NT 6.3; WOW64; rv:28.0) Gecko','2014-04-17 10:04:43','GIFT','2014-04-17 10:55:43','LOGIN','d79c59f121b88f322f86'),('3312197f-c5e4-11e3-b6d9-fc4dd45603ff',42,NULL,'127.0.0.1','Mozilla/5.0 (Windows NT 6.3; WOW64; rv:28.0) Gecko','2014-04-17 10:04:05','GIFT','2014-04-17 10:56:05','LOGIN','eecfb93635ed645546be'),('335c7fcf-c6b8-11e3-9740-fc4dd45603ff',42,'7cb72bdf8dfc294422c8d51176c4b68f','127.0.0.1','Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/53','2014-04-18 12:04:38','PORTAL','2014-04-18 12:13:38','LOGIN','8d34cbacb96c8546ea5c'),('3ef85110-c6c2-11e3-9740-fc4dd45603ff',42,'7cb72bdf8dfc294422c8d51176c4b68f','127.0.0.1','Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/53','2014-04-18 01:04:33','PORTAL','2014-04-18 13:25:33','LOGIN','d46f27ea1ebdb4506040'),('47e4e31b-c5e4-11e3-b6d9-fc4dd45603ff',42,NULL,'127.0.0.1','Mozilla/5.0 (Windows NT 6.3; WOW64; rv:28.0) Gecko','2014-04-17 10:04:40','GIFT','2014-04-17 10:56:40','LOGIN','eecfb93635ed645546be'),('4f2a47fa-c6b8-11e3-9740-fc4dd45603ff',42,'7cb72bdf8dfc294422c8d51176c4b68f','127.0.0.1','Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/53','2014-04-18 12:04:25','PORTAL','2014-04-18 12:14:25','LOGIN','8d34cbacb96c8546ea5c'),('54bcf755-c6bc-11e3-9740-fc4dd45603ff',42,'7cb72bdf8dfc294422c8d51176c4b68f','127.0.0.1','Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/53','2014-04-18 12:04:12','PORTAL','2014-04-18 12:43:12','LOGIN','8a1303cd22ff8923bfa7'),('569bcb0a-c6b7-11e3-9740-fc4dd45603ff',42,'7cb72bdf8dfc294422c8d51176c4b68f','127.0.0.1','Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/53','2014-04-18 12:04:28','PORTAL','2014-04-18 12:07:28','LOGIN','dcc5b600ddb03e87743e'),('5a364d65-c6c2-11e3-9740-fc4dd45603ff',42,'7cb72bdf8dfc294422c8d51176c4b68f','127.0.0.1','Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/53','2014-04-18 01:04:19','PORTAL','2014-04-18 13:26:19','LOGIN','d46f27ea1ebdb4506040'),('656310ed-bc19-11e3-80cb-f82fa8c904ca',43,NULL,'127.0.0.1','','2014-04-04 11:04:41','PORTAL','Thay đổi mật khẩu','CHANGEPASS','1373fd7f894351c4e6b7'),('6747a702-c6b9-11e3-9740-fc4dd45603ff',42,'7cb72bdf8dfc294422c8d51176c4b68f','127.0.0.1','Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/53','2014-04-18 12:04:15','PORTAL','2014-04-18 12:22:15','LOGIN','3c244f3352f817e3f5ff'),('6f4d2686-c6be-11e3-9740-fc4dd45603ff',42,'7cb72bdf8dfc294422c8d51176c4b68f','127.0.0.1','Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/53','2014-04-18 12:04:16','PORTAL','2014-04-18 12:58:16','LOGIN','dbb54d6cc16afa7e09f7'),('78fedd84-c5f1-11e3-b6d9-fc4dd45603ff',42,'7cb72bdf8dfc294422c8d51176c4b68f','127.0.0.1','Mozilla/5.0 (Windows NT 6.3; WOW64; rv:28.0) Gecko','2014-04-17 12:04:05','PORTAL','2014-04-17 12:31:05','LOGIN','28a3fe82e7ea81cf3c66'),('7c2ad050-c6b6-11e3-9740-fc4dd45603ff',42,'7cb72bdf8dfc294422c8d51176c4b68f','127.0.0.1','Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/53','2014-04-18 12:04:22','PORTAL','2014-04-18 12:01:22','LOGIN','524716f41fb524bc3667'),('7e946e46-bc19-11e3-80cb-f82fa8c904ca',43,NULL,'127.0.0.1','','2014-04-04 11:04:23','PORTAL','Reset mật khẩu','RESETPASS','1373fd7f894351c4e6b7'),('83574396-bcc5-11e3-a78d-f82fa8c904ca',42,NULL,'127.0.0.1','','2014-04-05 08:04:44','PORTAL','Thay đổi thông tin cá nhân','CHANGEINFORMATION','71b25cd75af2f2995d77'),('83a740db-c5e5-11e3-b6d9-fc4dd45603ff',42,'f6e3811b480d97a3254a3e247bb3ea08','127.0.0.1','Mozilla/5.0 (Windows NT 6.3; WOW64; rv:28.0) Gecko','2014-04-17 11:04:29','GIFT','2014-04-17 11:05:29','LOGIN','690f1f965c5d0a3abbc2'),('87788d38-c6b7-11e3-9740-fc4dd45603ff',42,'7cb72bdf8dfc294422c8d51176c4b68f','127.0.0.1','Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/53','2014-04-18 12:04:50','PORTAL','2014-04-18 12:08:50','LOGIN','3180351d04d76b237ce1'),('88b10493-c6c2-11e3-9740-fc4dd45603ff',42,'7cb72bdf8dfc294422c8d51176c4b68f','127.0.0.1','Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/53','2014-04-18 01:04:37','PORTAL','2014-04-18 13:27:37','LOGIN','378f776a2acbb73412f9'),('8f57415f-c6b9-11e3-9740-fc4dd45603ff',42,'7cb72bdf8dfc294422c8d51176c4b68f','127.0.0.1','Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/53','2014-04-18 12:04:22','PORTAL','2014-04-18 12:23:22','LOGIN','fb0cf7aa8fbc31fe33eb'),('8f8de76c-c6bc-11e3-9740-fc4dd45603ff',42,'7cb72bdf8dfc294422c8d51176c4b68f','127.0.0.1','Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/53','2014-04-18 12:04:51','PORTAL','2014-04-18 12:44:51','LOGIN','f32892647eef918c26c2'),('925d5b3d-c5ea-11e3-b6d9-fc4dd45603ff',42,'199945b95e03ca9af9405280e0eb9368','127.0.0.1','Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/53','2014-04-17 11:04:41','GIFT','2014-04-17 11:41:41','LOGIN','10cc48187ca65cafe9bb'),('92ec7ebd-bcc5-11e3-a78d-f82fa8c904ca',42,NULL,'127.0.0.1','','2014-04-05 08:04:11','PORTAL','Thay đổi thông tin cá nhân','CHANGEINFORMATION','71b25cd75af2f2995d77'),('9d499b69-bc19-11e3-80cb-f82fa8c904ca',43,NULL,'127.0.0.1','','2014-04-04 11:04:15','PORTAL','Reset mật khẩu','RESETPASS','fc8ec855ba5469f948f4'),('9f54403e-c5ef-11e3-b6d9-fc4dd45603ff',42,'7cb72bdf8dfc294422c8d51176c4b68f','127.0.0.1','Mozilla/5.0 (Windows NT 6.3; WOW64; rv:28.0) Gecko','2014-04-17 12:04:51','PORTAL','2014-04-17 12:17:51','LOGIN','e91d43dcfeb56f9db883'),('a6844376-bc19-11e3-80cb-f82fa8c904ca',43,NULL,'127.0.0.1','','2014-04-04 11:04:30','PORTAL','Reset mật khẩu','RESETPASS','fc8ec855ba5469f948f4'),('a852698e-c6a4-11e3-9740-fc4dd45603ff',42,'7cb72bdf8dfc294422c8d51176c4b68f','127.0.0.1','Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/53','2014-04-18 09:04:45','PORTAL','2014-04-18 09:53:45','LOGIN','9a427d3c7252a26fa13b'),('ab947be6-c6b6-11e3-9740-fc4dd45603ff',42,'7cb72bdf8dfc294422c8d51176c4b68f','127.0.0.1','Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/53','2014-04-18 12:04:41','PORTAL','2014-04-18 12:02:41','LOGIN','da32bd185e9eac2d93a3'),('b0f96cc4-c6c2-11e3-9740-fc4dd45603ff',42,'7cb72bdf8dfc294422c8d51176c4b68f','127.0.0.1','Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/53','2014-04-18 01:04:44','PORTAL','2014-04-18 13:28:44','LOGIN','5e698c9a3ca5c4e1626e'),('b90744fd-c5e4-11e3-b6d9-fc4dd45603ff',42,NULL,'127.0.0.1','Mozilla/5.0 (Windows NT 6.3; WOW64; rv:28.0) Gecko','2014-04-17 10:04:49','GIFT','2014-04-17 10:59:49','LOGIN','402bfbbc57f419ef7f16'),('ba004d8f-c6bb-11e3-9740-fc4dd45603ff',42,'7cb72bdf8dfc294422c8d51176c4b68f','127.0.0.1','Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/53','2014-04-18 12:04:53','PORTAL','2014-04-18 12:38:53','LOGIN','05a415d4f94206dcb4df'),('bba440f5-bcc6-11e3-a78d-f82fa8c904ca',42,NULL,'127.0.0.1','','2014-04-05 08:04:28','PORTAL','Thay đổi thông tin cá nhân','CHANGEINFORMATION','7f4f5fe9ed0edd288f2c'),('bc157714-bc19-11e3-80cb-f82fa8c904ca',43,NULL,'127.0.0.1','','2014-04-04 11:04:06','PORTAL','Thay đổi mật khẩu','CHANGEPASS','fc8ec855ba5469f948f4'),('bc8f609c-c6b9-11e3-9740-fc4dd45603ff',42,'7cb72bdf8dfc294422c8d51176c4b68f','127.0.0.1','Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/53','2014-04-18 12:04:38','PORTAL','2014-04-18 12:24:38','LOGIN','3c5a374b00eb3bc4c617'),('c1b9b4fa-c6b8-11e3-9740-fc4dd45603ff',42,'7cb72bdf8dfc294422c8d51176c4b68f','127.0.0.1','Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/53','2014-04-18 12:04:37','PORTAL','2014-04-18 12:17:37','LOGIN','d26d7d8ce7f410a70ad1'),('c1f0ebce-bcc6-11e3-a78d-f82fa8c904ca',42,NULL,'127.0.0.1','','2014-04-05 08:04:39','PORTAL','Thay đổi thông tin cá nhân','CHANGEINFORMATION','7f4f5fe9ed0edd288f2c'),('c5faa980-bc19-11e3-80cb-f82fa8c904ca',43,NULL,'127.0.0.1','','2014-04-04 11:04:23','PORTAL','Reset mật khẩu','RESETPASS','5dd91e86d1e8fa881b52'),('c7c899b2-c5ef-11e3-b6d9-fc4dd45603ff',42,'7cb72bdf8dfc294422c8d51176c4b68f','127.0.0.1','Mozilla/5.0 (Windows NT 6.3; WOW64; rv:28.0) Gecko','2014-04-17 12:04:59','PORTAL','2014-04-17 12:18:59','LOGIN','5ac433c0e08b7628663f'),('ccda5227-c6b7-11e3-9740-fc4dd45603ff',42,'7cb72bdf8dfc294422c8d51176c4b68f','127.0.0.1','Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/53','2014-04-18 12:04:46','PORTAL','2014-04-18 12:10:46','LOGIN','6352c94c1d0b41aa345e'),('cdb521dd-c6c1-11e3-9740-fc4dd45603ff',42,'7cb72bdf8dfc294422c8d51176c4b68f','127.0.0.1','Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/53','2014-04-18 01:04:23','PORTAL','2014-04-18 13:22:23','LOGIN','44111aa9f643eaf2885d'),('d62c1729-c6bc-11e3-9740-fc4dd45603ff',42,'7cb72bdf8dfc294422c8d51176c4b68f','127.0.0.1','Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/53','2014-04-18 12:04:50','PORTAL','2014-04-18 12:46:50','LOGIN','d5bd2feb243f67bc884b'),('dbed9ff5-c6be-11e3-9740-fc4dd45603ff',42,'7cb72bdf8dfc294422c8d51176c4b68f','127.0.0.1','Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/53','2014-04-18 01:04:18','PORTAL','2014-04-18 13:01:18','LOGIN','734bc3c00bc3780e3f9e'),('df1e9405-bc19-11e3-80cb-f82fa8c904ca',43,NULL,'127.0.0.1','','2014-04-04 11:04:05','PORTAL','Thay đổi mật khẩu','CHANGEPASS','5dd91e86d1e8fa881b52'),('e245c0ab-c5ec-11e3-b6d9-fc4dd45603ff',42,'f6e3811b480d97a3254a3e247bb3ea08','127.0.0.1','Mozilla/5.0 (Windows NT 6.3; WOW64; rv:28.0) Gecko','2014-04-17 11:04:15','GIFT','2014-04-17 11:58:15','LOGIN','95f38127eb5bcdb707e2'),('e50318d8-c6bc-11e3-9740-fc4dd45603ff',42,'7cb72bdf8dfc294422c8d51176c4b68f','127.0.0.1','Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/53','2014-04-18 12:04:14','PORTAL','2014-04-18 12:47:14','LOGIN','d5bd2feb243f67bc884b'),('ea14c951-c5e3-11e3-b6d9-fc4dd45603ff',42,NULL,'127.0.0.1','Mozilla/5.0 (Windows NT 6.3; WOW64; rv:28.0) Gecko','2014-04-17 10:04:02','GIFT','2014-04-17 10:54:02','LOGIN','9c7bede93e99b2dd0863'),('efa5740e-c6c1-11e3-9740-fc4dd45603ff',42,'7cb72bdf8dfc294422c8d51176c4b68f','127.0.0.1','Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/53','2014-04-18 01:04:20','PORTAL','2014-04-18 13:23:20','LOGIN','8cd4d26ee4370dfebb6f');

/*Table structure for table `t_user_setting` */

DROP TABLE IF EXISTS `t_user_setting`;

CREATE TABLE `t_user_setting` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_user` int(11) NOT NULL,
  `setting_key` char(20) COLLATE utf8_unicode_ci NOT NULL,
  `value` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=129 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `t_user_setting` */

insert  into `t_user_setting`(`id`,`fk_user`,`setting_key`,`value`) values (113,41,'isRecivedEmail','Y'),(114,41,'AlternativeEmail','lethanhan.bkaptech@gmail.com'),(115,41,'SQ',''),(116,41,'SA',''),(117,42,'isRecivedEmail','Y'),(118,42,'AlternativeEmail','lethanhan.bkaptech@gmail.com'),(119,42,'SQ','0'),(120,42,'SA','asd'),(121,43,'isRecivedEmail','Y'),(122,43,'AlternativeEmail','lethanhan.bkaptech@gmail.com'),(123,43,'SQ','0'),(124,43,'SA','asd'),(125,44,'isRecivedEmail','Y'),(126,44,'AlternativeEmail','lethanhan.bkaptech@gmail.com'),(127,44,'SQ','0'),(128,44,'SA','asd');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
