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
  `payment_currency` char(1) COLLATE utf8_unicode_ci DEFAULT NULL,
  `invoice_type` enum('input','output') COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_order` (`fk_order`),
  CONSTRAINT `t_invoice_ibfk_1` FOREIGN KEY (`fk_order`) REFERENCES `t_order` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `t_invoice` */

/*Table structure for table `t_invoice_other_cost` */

DROP TABLE IF EXISTS `t_invoice_other_cost`;

CREATE TABLE `t_invoice_other_cost` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_invoice` int(11) DEFAULT NULL,
  `value` double DEFAULT NULL,
  `comment` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`),
  KEY `fk_invoice` (`fk_invoice`),
  CONSTRAINT `t_invoice_other_cost_ibfk_1` FOREIGN KEY (`fk_invoice`) REFERENCES `t_invoice` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `t_invoice_other_cost` */

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
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `t_invoice_product` */

/*Table structure for table `t_invoice_shipping` */

DROP TABLE IF EXISTS `t_invoice_shipping`;

CREATE TABLE `t_invoice_shipping` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sub_id` int(11) DEFAULT NULL,
  `fk_invoice` int(11) DEFAULT NULL,
  `fk_user_contact` int(11) DEFAULT NULL,
  `created_user` datetime DEFAULT NULL,
  `display_name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `price` double DEFAULT NULL,
  `status` enum('ACTIVE','INACTIVE') COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `ship_date` datetime DEFAULT NULL,
  `complete_date` datetime DEFAULT NULL,
  `shipping_type` enum('PAY','SHIP') COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `t_invoice_shipping_ibfk_1` (`fk_invoice`),
  KEY `fk_user_contact` (`fk_user_contact`),
  CONSTRAINT `t_invoice_shipping_ibfk_1` FOREIGN KEY (`fk_invoice`) REFERENCES `t_invoice` (`id`),
  CONSTRAINT `t_invoice_shipping_ibfk_2` FOREIGN KEY (`fk_user_contact`) REFERENCES `t_user_contact` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
) ENGINE=InnoDB AUTO_INCREMENT=76 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `t_order` */

/*Table structure for table `t_order_status` */

DROP TABLE IF EXISTS `t_order_status`;

CREATE TABLE `t_order_status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_order` int(11) DEFAULT NULL,
  `status` enum('VERIFYING','SHIPPING','DELIVERED','ORDER_PLACED','ORDER_CANCELLED','REJECTED') COLLATE utf8_unicode_ci DEFAULT NULL,
  `updated_user` int(11) DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL,
  `comment` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `t_order_status` */

/*Table structure for table `t_payment_temp` */

DROP TABLE IF EXISTS `t_payment_temp`;

CREATE TABLE `t_payment_temp` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_user` int(11) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `data` text COLLATE utf8_unicode_ci,
  `session_id` char(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ip_address` char(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_agrent` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `processed_date` datetime DEFAULT NULL,
  `cancelled_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `t_payment_temp` */

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
  `total_price` double DEFAULT NULL,
  `actual_price` double DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
  PRIMARY KEY (`id`),
  KEY `fk_user` (`fk_user`),
  CONSTRAINT `t_user_contact_ibfk_2` FOREIGN KEY (`fk_user`) REFERENCES `t_user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `t_user_contact` */

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

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
