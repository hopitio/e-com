/*
SQLyog Enterprise - MySQL GUI v8.12 
MySQL - 5.5.29 : Database - eproject
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

CREATE DATABASE /*!32312 IF NOT EXISTS*/`eproject` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci */;

USE `eproject`;

/*Table structure for table `t_category` */

DROP TABLE IF EXISTS `t_category`;

CREATE TABLE `t_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `codename` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fk_parent` int(11) DEFAULT NULL,
  `sort` tinyint(4) DEFAULT NULL,
  `path` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image` text COLLATE utf8_unicode_ci,
  `status` tinyint(4) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `t_category` */

insert  into `t_category`(`id`,`codename`,`fk_parent`,`sort`,`path`,`image`,`status`) values (1,'art_glass',NULL,1,'1',NULL,1),(2,'glassware',NULL,2,'2',NULL,1),(3,'wholesale',NULL,3,'3',NULL,1);

/*Table structure for table `t_category_attribute` */

DROP TABLE IF EXISTS `t_category_attribute`;

CREATE TABLE `t_category_attribute` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_attribute_type` int(11) DEFAULT NULL,
  `fk_category` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `t_category_attribute` */

/*Table structure for table `t_category_language` */

DROP TABLE IF EXISTS `t_category_language`;

CREATE TABLE `t_category_language` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_category` int(11) DEFAULT NULL,
  `language` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `t_category_language` */

insert  into `t_category_language`(`id`,`fk_category`,`language`,`name`,`description`) values (1,1,'en','Art glass',NULL),(2,1,'vi','Thủy tinh nghệ thuật','Mô tả thủy tinh nghệ thuật'),(3,2,'en','Glassware','Glassware description'),(4,2,'vi','Pha lê gia dụng','Mô tả pha lê gia dụng');

/*Table structure for table `t_credit_memo` */

DROP TABLE IF EXISTS `t_credit_memo`;

CREATE TABLE `t_credit_memo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_order` int(11) DEFAULT NULL,
  `date_created` datetime DEFAULT NULL,
  `date_refuned` datetime DEFAULT NULL,
  `credit_status` enum('paid','unpaid','cancelled') COLLATE utf8_unicode_ci DEFAULT NULL,
  `fk_contact` int(11) DEFAULT NULL,
  `email_status` tinyint(4) DEFAULT NULL,
  `comment` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `t_credit_memo` */

/*Table structure for table `t_feature_product` */

DROP TABLE IF EXISTS `t_feature_product`;

CREATE TABLE `t_feature_product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_product` int(11) DEFAULT NULL,
  `is_on_homepage` tinyint(4) DEFAULT '0',
  `sort` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `t_feature_product` */

insert  into `t_feature_product`(`id`,`fk_product`,`is_on_homepage`,`sort`) values (1,1,1,1),(2,2,1,2);

/*Table structure for table `t_invoice` */

DROP TABLE IF EXISTS `t_invoice`;

CREATE TABLE `t_invoice` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_order` int(11) DEFAULT NULL,
  `fk_customer` int(11) DEFAULT NULL,
  `date_created` datetime DEFAULT NULL,
  `date_paid` datetime DEFAULT NULL,
  `invoice_status` enum('unpaid','paid','cancelled') COLLATE utf8_unicode_ci DEFAULT NULL,
  `fk_contact` int(11) DEFAULT NULL,
  `email_status` tinyint(4) DEFAULT NULL,
  `comment` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `t_invoice` */

/*Table structure for table `t_invoice_detail` */

DROP TABLE IF EXISTS `t_invoice_detail`;

CREATE TABLE `t_invoice_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_invoice` int(11) DEFAULT NULL,
  `fk_product` int(11) DEFAULT NULL,
  `fk_order` int(11) DEFAULT NULL,
  `quantity` double DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `t_invoice_detail` */

/*Table structure for table `t_list` */

DROP TABLE IF EXISTS `t_list`;

CREATE TABLE `t_list` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_listtype` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `codename` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sort` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `t_list` */

insert  into `t_list`(`id`,`fk_listtype`,`name`,`codename`,`sort`) values (1,1,'glass','glass',1),(2,1,'pottery','pottery',2),(3,1,'wooden','wooden',3),(4,1,'plastic','plastic',4),(5,1,'other','other',5),(6,2,'lover','lover',1),(7,2,'parent','parent',2),(8,2,'family','family',3),(9,2,'friend','friend',4),(10,2,'children','children',5),(11,3,'birthday','birthday',1),(12,3,'new year','newyear',2),(13,3,'noel','noel',3),(14,4,'USD','USD',1),(15,4,'VND','VND',2),(16,5,'Vietnam','VN',1),(17,5,'US','US',2),(18,5,'Korea','KR',3),(19,6,'express','express',1),(20,6,'in3day','in3day',2),(21,7,'cash','cash',1),(22,7,'bank transfer','transfer',2),(23,7,'bank check','check',3);

/*Table structure for table `t_listtype` */

DROP TABLE IF EXISTS `t_listtype`;

CREATE TABLE `t_listtype` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `codename` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` tinyint(4) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `t_listtype` */

insert  into `t_listtype`(`id`,`name`,`codename`,`status`) values (1,'material','material',1),(2,'gift target','gift_target',1),(3,'occasion','occasion',1),(4,'currency','currency',1),(5,'source','source',1),(6,'shipping method','shipping_method',1),(7,'payment method','payment_method',1);

/*Table structure for table `t_order` */

DROP TABLE IF EXISTS `t_order`;

CREATE TABLE `t_order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fk_customer` int(11) DEFAULT NULL,
  `subtotal` double DEFAULT NULL,
  `email_status` tinyint(4) DEFAULT NULL,
  `fk_order_status_history` int(11) DEFAULT NULL,
  `comment` text COLLATE utf8_unicode_ci,
  `bonus` double DEFAULT NULL,
  `fk_shipping_method` int(11) DEFAULT NULL,
  `fk_payment_method` int(11) DEFAULT NULL,
  `fk_currency` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `t_order` */

/*Table structure for table `t_order_product` */

DROP TABLE IF EXISTS `t_order_product`;

CREATE TABLE `t_order_product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_order` int(11) DEFAULT NULL,
  `fk_product` int(11) DEFAULT NULL,
  `orginal_price` double DEFAULT NULL,
  `price` double DEFAULT NULL,
  `quantity` double DEFAULT NULL,
  `discharge` double DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `t_order_product` */

/*Table structure for table `t_order_status` */

DROP TABLE IF EXISTS `t_order_status`;

CREATE TABLE `t_order_status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `codename` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sort` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `t_order_status` */

insert  into `t_order_status`(`id`,`name`,`codename`,`sort`) values (1,'initiate','init',1),(2,'picking','picking',2),(3,'pay','pay',3),(4,'shipping','shipping',4),(5,'completed','completed',5);

/*Table structure for table `t_order_status_history` */

DROP TABLE IF EXISTS `t_order_status_history`;

CREATE TABLE `t_order_status_history` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_order` int(11) DEFAULT NULL,
  `fk_status` int(11) DEFAULT NULL,
  `date_happened` datetime DEFAULT NULL,
  `fk_creator` int(11) DEFAULT NULL,
  `date_created` datetime DEFAULT NULL,
  `is_mail_sent` tinyint(4) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `t_order_status_history` */

/*Table structure for table `t_pin` */

DROP TABLE IF EXISTS `t_pin`;

CREATE TABLE `t_pin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_user` int(11) DEFAULT NULL,
  `fk_product` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `t_pin` */

/*Table structure for table `t_privillege` */

DROP TABLE IF EXISTS `t_privillege`;

CREATE TABLE `t_privillege` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_instance` int(11) DEFAULT NULL,
  `type` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `privilige` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `t_privillege` */

/*Table structure for table `t_product` */

DROP TABLE IF EXISTS `t_product`;

CREATE TABLE `t_product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_category` int(11) DEFAULT NULL,
  `fk_retailer` int(11) DEFAULT NULL,
  `fk_group` int(11) DEFAULT NULL,
  `is_group` tinyint(4) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `t_product` */

insert  into `t_product`(`id`,`fk_category`,`fk_retailer`,`fk_group`,`is_group`) values (1,1,1,NULL,0),(2,1,1,NULL,0),(3,1,1,NULL,0);

/*Table structure for table `t_product_attribute` */

DROP TABLE IF EXISTS `t_product_attribute`;

CREATE TABLE `t_product_attribute` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_product` int(11) DEFAULT NULL,
  `fk_attribute_type` int(11) DEFAULT NULL,
  `value_number` double DEFAULT NULL,
  `value_enum` int(11) DEFAULT NULL,
  `value_text` text COLLATE utf8_unicode_ci,
  `language` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `value_varchar` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `t_product_attribute` */

insert  into `t_product_attribute`(`id`,`fk_product`,`fk_attribute_type`,`value_number`,`value_enum`,`value_text`,`language`,`value_varchar`) values (1,1,1,NULL,NULL,NULL,'en','Strawberry pearl'),(2,1,1,NULL,NULL,NULL,'vi','Pha lê dâu'),(3,1,2,NULL,NULL,'product description','en',NULL),(4,1,2,NULL,NULL,'mo ta sp','vi',NULL),(5,1,3,NULL,NULL,NULL,'en','pearl'),(6,1,3,NULL,NULL,NULL,'vi','ngọc'),(7,1,3,NULL,NULL,NULL,'en','glass'),(8,1,3,NULL,NULL,NULL,'vi','pha lê');

/*Table structure for table `t_product_attribute_type` */

DROP TABLE IF EXISTS `t_product_attribute_type`;

CREATE TABLE `t_product_attribute_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `codename` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `datatype` enum('number','enum','text','varchar') COLLATE utf8_unicode_ci DEFAULT NULL,
  `fk_enum_ref` int(11) DEFAULT NULL,
  `multi_language` tinyint(4) DEFAULT '0',
  `repeating_group` tinyint(4) DEFAULT '0',
  `weight` int(11) DEFAULT '0',
  `default` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `t_product_attribute_type` */

insert  into `t_product_attribute_type`(`id`,`codename`,`datatype`,`fk_enum_ref`,`multi_language`,`repeating_group`,`weight`,`default`) values (1,'name','varchar',NULL,1,0,0,NULL),(2,'description','text',NULL,1,0,0,NULL),(3,'tag','varchar',NULL,1,1,0,NULL),(4,'image','text',NULL,0,1,0,NULL),(5,'thumbnail','text',NULL,0,0,0,NULL),(6,'banner_image','text',NULL,0,0,0,NULL),(7,'material','enum',1,0,0,0,NULL),(8,'gift_target','enum',2,0,0,0,NULL),(9,'category','number',NULL,0,0,0,NULL),(10,'occasion','enum',3,0,1,0,NULL),(11,'price','number',NULL,0,0,0,NULL),(12,'currency','enum',4,0,0,0,NULL),(13,'quantity','number',NULL,0,0,0,NULL),(14,'weight','number',NULL,0,0,0,NULL),(15,'source','enum',NULL,0,0,0,NULL),(16,'shipping_method','enum',6,0,1,0,NULL),(17,'payment_method','enum',7,0,1,0,NULL);

/*Table structure for table `t_product_comment` */

DROP TABLE IF EXISTS `t_product_comment`;

CREATE TABLE `t_product_comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_product` int(11) DEFAULT NULL,
  `fk_user` int(11) DEFAULT NULL,
  `fk_parent` int(11) DEFAULT '0',
  `body` text COLLATE utf8_unicode_ci,
  `date_created` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `t_product_comment` */

/*Table structure for table `t_rating` */

DROP TABLE IF EXISTS `t_rating`;

CREATE TABLE `t_rating` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_user` int(11) DEFAULT NULL,
  `fk_product` int(11) DEFAULT NULL,
  `rate` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `t_rating` */

/*Table structure for table `t_relationship` */

DROP TABLE IF EXISTS `t_relationship`;

CREATE TABLE `t_relationship` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_user1` int(11) DEFAULT NULL,
  `fk_user2` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `t_relationship` */

/*Table structure for table `t_retailer` */

DROP TABLE IF EXISTS `t_retailer`;

CREATE TABLE `t_retailer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `logo` text COLLATE utf8_unicode_ci,
  `phoneno` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `website` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` tinyint(4) DEFAULT '1',
  `status_date` datetime DEFAULT NULL,
  `status_reason` text COLLATE utf8_unicode_ci,
  `fk_manager` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `t_retailer` */

/*Table structure for table `t_retailer_category` */

DROP TABLE IF EXISTS `t_retailer_category`;

CREATE TABLE `t_retailer_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_retailer` int(11) DEFAULT NULL,
  `fk_category` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `t_retailer_category` */

/*Table structure for table `t_role` */

DROP TABLE IF EXISTS `t_role`;

CREATE TABLE `t_role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `codename` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `t_role` */

insert  into `t_role`(`id`,`name`,`codename`) values (1,'Admin','admin'),(2,'Customer','customer'),(3,'Guest','guest'),(4,'Retailer','retailer');

/*Table structure for table `t_shipment` */

DROP TABLE IF EXISTS `t_shipment`;

CREATE TABLE `t_shipment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_order` int(11) DEFAULT NULL,
  `fk_customer` int(11) DEFAULT NULL,
  `date_created` datetime DEFAULT NULL,
  `date_shipped` datetime DEFAULT NULL,
  `comment` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `t_shipment` */

/*Table structure for table `t_shipment_detail` */

DROP TABLE IF EXISTS `t_shipment_detail`;

CREATE TABLE `t_shipment_detail` (
  `id` int(11) NOT NULL,
  `fk_order` int(11) DEFAULT NULL,
  `fk_product` int(11) DEFAULT NULL,
  `quantity` double DEFAULT NULL,
  `fk_shipment` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `t_shipment_detail` */

/*Table structure for table `t_user` */

DROP TABLE IF EXISTS `t_user`;

CREATE TABLE `t_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lastname` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `account` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sex` enum('M','F','O') COLLATE utf8_unicode_ci DEFAULT NULL,
  `DOB` datetime DEFAULT NULL,
  `date_joined` datetime DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `status_date` datetime DEFAULT NULL,
  `status_reason` text COLLATE utf8_unicode_ci,
  `last_active` datetime DEFAULT NULL,
  `is_admin` tinyint(4) DEFAULT '0',
  `phoneno` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bonus` double DEFAULT '0',
  `email` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `t_user` */

insert  into `t_user`(`id`,`firstname`,`lastname`,`account`,`password`,`sex`,`DOB`,`date_joined`,`status`,`status_date`,`status_reason`,`last_active`,`is_admin`,`phoneno`,`bonus`,`email`) values (1,'Mr','Admin','admin',NULL,'M',NULL,NULL,1,NULL,NULL,NULL,1,NULL,0,NULL),(2,'Ms','Alice','alice',NULL,'F',NULL,NULL,1,NULL,NULL,NULL,0,NULL,0,NULL),(3,'Mr','John Smith','smith',NULL,'M',NULL,NULL,1,NULL,NULL,NULL,0,NULL,0,NULL);

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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `t_user_contact` */

insert  into `t_user_contact`(`id`,`fk_user`,`date_created`,`date_used`,`count_used`,`prefix`,`firstname`,`middlename`,`lastname`,`suffix`,`company`,`street_address`,`city`,`country`,`state_province`,`zip_postal_code`,`telephone`,`fax`,`vat_number`) values (1,2,NULL,NULL,1,'Mr','Adrew',NULL,'Kingsley',NULL,NULL,'12 Wall st\r\n','New york','America',NULL,NULL,'012347888',NULL,NULL);

/*Table structure for table `t_user_role` */

DROP TABLE IF EXISTS `t_user_role`;

CREATE TABLE `t_user_role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_user` int(11) DEFAULT NULL,
  `fk_role` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `t_user_role` */

insert  into `t_user_role`(`id`,`fk_user`,`fk_role`) values (1,1,1),(2,2,2),(3,3,4);

/*Table structure for table `t_watchlist` */

DROP TABLE IF EXISTS `t_watchlist`;

CREATE TABLE `t_watchlist` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_user` int(11) DEFAULT NULL,
  `fk_product` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `t_watchlist` */

/*Table structure for table `t_wishlist` */

DROP TABLE IF EXISTS `t_wishlist`;

CREATE TABLE `t_wishlist` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_customer` int(11) DEFAULT NULL,
  `name` int(11) DEFAULT NULL,
  `remind_date` datetime DEFAULT NULL,
  `note` text COLLATE utf8_unicode_ci,
  `date_created` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `t_wishlist` */

insert  into `t_wishlist`(`id`,`fk_customer`,`name`,`remind_date`,`note`,`date_created`) values (1,2,0,NULL,NULL,NULL);

/*Table structure for table `t_wishlist_detail` */

DROP TABLE IF EXISTS `t_wishlist_detail`;

CREATE TABLE `t_wishlist_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_wishlist` int(11) DEFAULT NULL,
  `type` enum('product','note','link') COLLATE utf8_unicode_ci DEFAULT NULL,
  `note` text COLLATE utf8_unicode_ci,
  `fk_product` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `t_wishlist_detail` */

insert  into `t_wishlist_detail`(`id`,`fk_wishlist`,`type`,`note`,`fk_product`) values (1,1,'product',NULL,1),(2,1,'link','Something candles',NULL);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
