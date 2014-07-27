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
CREATE DATABASE /*!32312 IF NOT EXISTS*/`portal_e_project` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `portal_e_project`;

/*Table structure for table `t_invoice` */

DROP TABLE IF EXISTS `t_invoice`;

CREATE TABLE `t_invoice` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) DEFAULT NULL,
  `invoice_type` varchar(255) DEFAULT NULL COMMENT 'input | output',
  `invocie_status` varchar(255) DEFAULT NULL COMMENT 'paided | waiting',
  `paided_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `delete` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `t_invoice` */

/*Table structure for table `t_invoice_detail` */

DROP TABLE IF EXISTS `t_invoice_detail`;

CREATE TABLE `t_invoice_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `invoice_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `invoice_detail_type` varchar(255) DEFAULT NULL COMMENT 'product | shipping | other_cost',
  `description` text,
  `quantity` int(11) DEFAULT NULL,
  `sell_price` double DEFAULT NULL,
  `actual_price` double DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `delete` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `t_invoice_detail` */

/*Table structure for table `t_order` */

DROP TABLE IF EXISTS `t_order`;

CREATE TABLE `t_order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `payment_temp_id` int(11) DEFAULT NULL,
  `order_status` varchar(255) DEFAULT NULL,
  `description` text,
  `created_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `delete` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `payment_temp_id` (`payment_temp_id`),
  CONSTRAINT `t_order_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `t_user` (`id`),
  CONSTRAINT `t_order_ibfk_2` FOREIGN KEY (`payment_temp_id`) REFERENCES `t_payment_temp` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `t_order` */

/*Table structure for table `t_order_history` */

DROP TABLE IF EXISTS `t_order_history`;

CREATE TABLE `t_order_history` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `issued_user_id` datetime DEFAULT NULL,
  `issued_date` datetime DEFAULT NULL,
  `description` text,
  `created_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `delete` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `t_order_history` */

/*Table structure for table `t_payment_temp` */

DROP TABLE IF EXISTS `t_payment_temp`;

CREATE TABLE `t_payment_temp` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `order_key` varchar(255) DEFAULT NULL,
  `request_data` text,
  `created_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `delete` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `t_payment_temp_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `t_user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `t_payment_temp` */

/*Table structure for table `t_product` */

DROP TABLE IF EXISTS `t_product`;

CREATE TABLE `t_product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sub_id` int(11) DEFAULT NULL,
  `name` text,
  `thumbnial` text,
  `description` text,
  `price` double DEFAULT NULL,
  `seller_name` varchar(255) DEFAULT NULL,
  `seller_id` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `delete` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `t_product` */

/*Table structure for table `t_product_shipping` */

DROP TABLE IF EXISTS `t_product_shipping`;

CREATE TABLE `t_product_shipping` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) DEFAULT NULL,
  `user_contact_id` int(11) DEFAULT NULL,
  `code` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `price` double DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `delete` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `product_id` (`product_id`),
  KEY `user_contact_id` (`user_contact_id`),
  CONSTRAINT `t_product_shipping_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `t_product` (`id`),
  CONSTRAINT `t_product_shipping_ibfk_2` FOREIGN KEY (`user_contact_id`) REFERENCES `t_user_contact` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `t_product_shipping` */

/*Table structure for table `t_product_taxs` */

DROP TABLE IF EXISTS `t_product_taxs`;

CREATE TABLE `t_product_taxs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) DEFAULT NULL,
  `code` varchar(255) DEFAULT NULL,
  `value` double DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `delete` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `product_id` (`product_id`),
  CONSTRAINT `t_product_taxs_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `t_product` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `t_product_taxs` */

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
  `platform_key` tinyint(4) NOT NULL DEFAULT '0',
  `user_type` char(25) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'USER',
  `record_status` char(15) COLLATE utf8_unicode_ci DEFAULT 'ACTIVE',
  `created_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `delete` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=58 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `t_user` */

insert  into `t_user`(`id`,`firstname`,`lastname`,`account`,`password`,`sex`,`DOB`,`date_joined`,`status`,`status_date`,`status_reason`,`last_active`,`platform_key`,`user_type`,`record_status`,`created_at`,`deleted_at`,`delete`) values (50,'LÃŠ ','AN ','lethanhan.bkaptech@gmail.com','123123123','M','1742-08-21 00:00:00','2014-04-29 10:04:54',1,'2014-05-23 10:05:23','Admin má»Ÿ láº¡i tÃ i khoáº£n','2014-04-29 10:04:54',0,'ADMIN','ACTIVE',NULL,NULL,NULL),(51,'AnLT','Thanh An ','lethanhan.2305@gmail.com','123456789','F','2014-05-07 00:00:00','2014-05-04 07:05:27',1,'2014-05-18 02:05:48','Admin má»Ÿ láº¡i tÃ i khoáº£n','2014-05-04 07:05:27',0,'ADMIN','ACTIVE',NULL,NULL,NULL),(52,'lê','quân','lequanvietnet@gmail.com','27101987','M','0000-00-00 00:00:00','2014-06-20 07:06:12',1,'2014-06-20 07:06:12','Thực hiện việc active user','2014-06-20 07:06:12',0,'USER','ACTIVE',NULL,NULL,NULL),(54,'Lê Thanh','An','lethanhan.bkaptech@gmail.com',NULL,'M','1990-05-23 00:00:00','2014-06-22 06:06:53',1,'2014-06-22 06:06:54','Thực hiện việc active user','2014-06-22 06:06:53',1,'USER','ACTIVE',NULL,NULL,NULL),(55,'Quân','Lê','lequan.vcci@gmail.com','34bcaobaquat','M','0000-00-00 00:00:00','2014-06-23 08:06:51',1,'2014-06-23 08:06:42','Thực hiện việc active user','2014-06-24 21:31:23',0,'USER','ACTIVE',NULL,NULL,NULL),(56,'Nguyễn  ','Hòa','hoant1208@gmail.com','123123123','F','1990-08-12 00:00:00','2014-06-23 10:06:58',1,'2014-06-23 10:06:42','Thực hiện việc active user','2014-06-23 10:06:58',0,'USER','ACTIVE',NULL,NULL,NULL),(57,'Trịnh Minh','Hoàng','starlight9x@gmail.com','minhhoang1','M','0000-00-00 00:00:00','2014-06-23 10:06:04',1,'2014-06-23 10:06:59','Thực hiện việc active user','2014-06-23 10:06:04',0,'USER','ACTIVE',NULL,NULL,NULL);

/*Table structure for table `t_user_contact` */

DROP TABLE IF EXISTS `t_user_contact`;

CREATE TABLE `t_user_contact` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_user` int(11) DEFAULT NULL,
  `date_created` datetime DEFAULT NULL,
  `full_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `telephone` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `street_address` text COLLATE utf8_unicode_ci,
  `city_district` text COLLATE utf8_unicode_ci,
  `state_province` text COLLATE utf8_unicode_ci,
  `email_contact` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `record_status` char(15) COLLATE utf8_unicode_ci DEFAULT 'ACTIVE',
  `created_at` datetime DEFAULT NULL,
  `deteled_at` datetime DEFAULT NULL,
  `delete` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_user` (`fk_user`),
  CONSTRAINT `t_user_contact_ibfk_2` FOREIGN KEY (`fk_user`) REFERENCES `t_user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `t_user_contact` */

/*Table structure for table `t_user_history` */

DROP TABLE IF EXISTS `t_user_history`;

CREATE TABLE `t_user_history` (
  `id` char(50) COLLATE utf8_unicode_ci NOT NULL,
  `fk_user` int(11) NOT NULL,
  `secret_key` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `client_ip` char(20) COLLATE utf8_unicode_ci NOT NULL,
  `user_agrent` char(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_activity` char(20) COLLATE utf8_unicode_ci NOT NULL,
  `sub_system_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `action_name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `session_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `action_date` datetime DEFAULT NULL,
  `record_status` char(15) COLLATE utf8_unicode_ci DEFAULT 'ACTIVE',
  `created_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `delete` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `t_user_history` */

/*Table structure for table `t_user_setting` */

DROP TABLE IF EXISTS `t_user_setting`;

CREATE TABLE `t_user_setting` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_user` int(11) NOT NULL,
  `setting_key` char(20) COLLATE utf8_unicode_ci NOT NULL,
  `value` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `record_status` char(15) COLLATE utf8_unicode_ci DEFAULT 'ACTIVE',
  `created_at` datetime DEFAULT NULL,
  `deleted_At` datetime DEFAULT NULL,
  `delete` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=201 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `t_user_setting` */

insert  into `t_user_setting`(`id`,`fk_user`,`setting_key`,`value`,`record_status`,`created_at`,`deleted_At`,`delete`) values (153,50,'isRecivedEmail','Y','ACTIVE',NULL,NULL,NULL),(154,50,'AlternativeEmail','lethanhan.bkaptech@gmail.com','ACTIVE',NULL,NULL,NULL),(155,50,'SQ','0','ACTIVE',NULL,NULL,NULL),(156,50,'SA','123123123','ACTIVE',NULL,NULL,NULL),(157,50,'LANGUAGE','VN-VI','ACTIVE',NULL,NULL,NULL),(158,50,'CURRENCY','VND','ACTIVE',NULL,NULL,NULL),(159,51,'isRecivedEmail','Y','ACTIVE',NULL,NULL,NULL),(160,51,'AlternativeEmail','lethanhan.2305@gmail.com','ACTIVE',NULL,NULL,NULL),(161,51,'SQ','0','ACTIVE',NULL,NULL,NULL),(162,51,'SA','123123123','ACTIVE',NULL,NULL,NULL),(163,51,'LANGUAGE','EN-US','ACTIVE',NULL,NULL,NULL),(164,51,'CURRENCY','VND','ACTIVE',NULL,NULL,NULL),(165,52,'isRecivedEmail','Y','ACTIVE',NULL,NULL,NULL),(166,52,'AlternativeEmail','lequanvietnet@gmail.com','ACTIVE',NULL,NULL,NULL),(167,52,'SQ','2','ACTIVE',NULL,NULL,NULL),(168,52,'SA','phan đình phùng','ACTIVE',NULL,NULL,NULL),(169,52,'LANGUAGE','VN-VI','ACTIVE',NULL,NULL,NULL),(170,52,'CURRENCY','VN','ACTIVE',NULL,NULL,NULL),(177,54,'isRecivedEmail','Y','ACTIVE',NULL,NULL,NULL),(178,54,'AlternativeEmail','lethanhan.bkaptech@gmail.com','ACTIVE',NULL,NULL,NULL),(179,54,'SQ','','ACTIVE',NULL,NULL,NULL),(180,54,'SA','','ACTIVE',NULL,NULL,NULL),(181,54,'LANGUAGE','VN-VI','ACTIVE',NULL,NULL,NULL),(182,54,'CURRENCY','VN','ACTIVE',NULL,NULL,NULL),(183,55,'isRecivedEmail','Y','ACTIVE',NULL,NULL,NULL),(184,55,'AlternativeEmail','lequan.vcci@gmail.com','ACTIVE',NULL,NULL,NULL),(185,55,'SQ','0','ACTIVE',NULL,NULL,NULL),(186,55,'SA','pes 2013','ACTIVE',NULL,NULL,NULL),(187,55,'LANGUAGE','VN-VI','ACTIVE',NULL,NULL,NULL),(188,55,'CURRENCY','VN','ACTIVE',NULL,NULL,NULL),(189,56,'isRecivedEmail','Y','ACTIVE',NULL,NULL,NULL),(190,56,'AlternativeEmail','hoant1208@gmail.com','ACTIVE',NULL,NULL,NULL),(191,56,'SQ','0','ACTIVE',NULL,NULL,NULL),(192,56,'SA','Nguyễn Hòa','ACTIVE',NULL,NULL,NULL),(193,56,'LANGUAGE','VN-VI','ACTIVE',NULL,NULL,NULL),(194,56,'CURRENCY','VN','ACTIVE',NULL,NULL,NULL),(195,57,'isRecivedEmail','Y','ACTIVE',NULL,NULL,NULL),(196,57,'AlternativeEmail','starlight9x@gmail.com','ACTIVE',NULL,NULL,NULL),(197,57,'SQ','0','ACTIVE',NULL,NULL,NULL),(198,57,'SA','diablo 3','ACTIVE',NULL,NULL,NULL),(199,57,'LANGUAGE','VN-VI','ACTIVE',NULL,NULL,NULL),(200,57,'CURRENCY','VN','ACTIVE',NULL,NULL,NULL);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
