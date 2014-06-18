/*
SQLyog Enterprise - MySQL GUI v8.12 
MySQL - 5.5.34-0ubuntu0.13.04.1 : Database - eproject
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

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
  `is_container` int(11) DEFAULT '0',
  `path_sort` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_show_in_home` tinyint(4) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `t_category` */

insert  into `t_category`(`id`,`codename`,`fk_parent`,`sort`,`path`,`image`,`status`,`is_container`,`path_sort`,`is_show_in_home`) values (1,'family',NULL,1,'1/',NULL,1,1,'1/',0),(2,'kid',NULL,2,'2/',NULL,1,1,'2/',0),(3,'food',NULL,3,'3/',NULL,1,1,'3/',1),(4,'gift',NULL,4,'4/',NULL,1,1,'4/',1),(5,'kitchen',1,1,'1/5/',NULL,1,0,'1/1/',0),(6,'scarf_fabric',1,2,'1/6/',NULL,1,0,'1/2/',0),(7,'necessities',1,3,'1/7/',NULL,1,0,'1/3/',0),(8,'family_other',1,4,'1/8/',NULL,1,0,'1/4/',0),(9,'smart_toy',2,1,'2/9/',NULL,1,0,'2/1/',0),(10,'diaper',2,2,'2/10/',NULL,1,0,'2/2/',0),(11,'kid_accessories',2,3,'2/11/',NULL,1,0,'2/3/',0),(12,'fast_food',3,1,'3/12/',NULL,1,0,'3/1/',0),(13,'dried_food',3,2,'3/13/',NULL,1,0,'3/2/',0),(14,'canned_food',3,3,'3/14/',NULL,1,0,'3/3/',0),(15,'drink',3,4,'3/15/',NULL,1,0,'3/4/',0),(16,'food_other',3,5,'3/16/',NULL,1,0,'3/5/',0),(17,'gift_traditional',4,1,'4/17/',NULL,1,0,'4/1/',0),(18,'handmade',4,2,'4/18/',NULL,1,0,'4/2/',0);

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
  `slide_images` text COLLATE utf8_unicode_ci,
  `side_images` text COLLATE utf8_unicode_ci,
  `product_section_image` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `t_category_language` */

insert  into `t_category_language`(`id`,`fk_category`,`language`,`name`,`description`,`slide_images`,`side_images`,`product_section_image`) values (1,1,'EN-US','Family',NULL,'<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>','<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>','<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>'),(2,1,'VN-VI','Sản phẩm gia đình','\r\n','<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>','<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>','<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>'),(3,2,'EN-US','Kid','','<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>','<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>','<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>'),(4,2,'VN-VI','Sản phẩm cho trẻ em','','<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>','<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>','<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>'),(5,3,'EN-US','Food',NULL,'<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>','<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>','<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>'),(6,3,'VN-VI','Đồ ăn',NULL,'<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>','<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>','<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>'),(7,4,'EN-US','Gift',NULL,'<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>','<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>','<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>'),(8,4,'VN-VI','Tặng phẩm',NULL,'<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>','<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>','<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>'),(9,5,'EN-US','Kitchen',NULL,'<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>','<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>','<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>'),(10,5,'VN-VI','Đồ nhà bếp',NULL,'<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>','<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>','<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>'),(11,6,'EN-US','Scraf/Fabric',NULL,'<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>','<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>','<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>'),(12,6,'VN-VI','Khăn/Vải',NULL,'<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>','<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>','<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>'),(13,7,'EN-US','Necessities',NULL,'<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>','<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>','<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>'),(14,7,'VN-VI','Đồ dùng sinh hoạt',NULL,'<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>','<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>','<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>'),(15,8,'EN-US','Other',NULL,'<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>','<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>','<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>'),(16,8,'VN-VI','Sản phẩm khác',NULL,'<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>','<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>','<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>'),(17,10,'EN-US','Diaper',NULL,'<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>','<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>','<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>'),(18,10,'VN-VI','Tã giấy',NULL,'<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>','<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>','<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>'),(19,9,'EN-US','Smart toy',NULL,'<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>','<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>','<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>'),(20,9,'VN-VI','Đồ chơi thông minh',NULL,'<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>','<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>','<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>'),(21,11,'EN-US','Kid accessories',NULL,'<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>','<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>','<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>'),(22,11,'VN-VI','Phụ kiện trẻ em',NULL,'<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>','<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>','<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>'),(23,12,'EN-US','Fast food',NULL,'<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>','<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>','<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>'),(24,12,'VN-VI','Đồ ăn nhanh',NULL,'<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>','<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>','<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>'),(25,13,'EN-US','Dried food',NULL,'<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>','<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>','<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>'),(26,13,'VN-VI','Đồ ăn khô',NULL,'<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>','<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>','<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>'),(27,14,'EN-US','Canned food',NULL,'<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>','<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>','<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>'),(28,14,'VN-VI','Đồ hộp',NULL,'<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>','<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>','<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>'),(29,15,'EN-US','Drink',NULL,'<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>','<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>','<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>'),(30,15,'VN-VI','Đồ uống',NULL,'<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>','<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>','<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>'),(31,16,'EN-US','Other',NULL,'<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>','<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>','<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>'),(32,16,'VN-VI','Đồ ăn khác',NULL,'<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>','<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>','<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>'),(33,17,'EN-US','Traditional clothes',NULL,'<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>','<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>','<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>'),(34,17,'VN-VI','Trang phục truyền thống',NULL,'<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>','<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>','<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>'),(35,18,'EN-US','Handmade',NULL,'<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>','<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>','<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>'),(36,18,'VN-VI','Đồ thủ công',NULL,'<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>','<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>','<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>');

/*Table structure for table `t_credit_memo` */

DROP TABLE IF EXISTS `t_credit_memo`;

CREATE TABLE `t_credit_memo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_order` int(11) DEFAULT NULL,
  `date_created` datetime DEFAULT NULL,
  `date_refunded` datetime DEFAULT NULL,
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

/*Table structure for table `t_file` */

DROP TABLE IF EXISTS `t_file`;

CREATE TABLE `t_file` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_user` int(11) DEFAULT NULL,
  `fk_parent` int(11) DEFAULT NULL,
  `url` text COLLATE utf8_unicode_ci,
  `is_dir` tinyint(4) DEFAULT '0',
  `date_modified` datetime DEFAULT NULL,
  `internal_path` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `t_file` */

insert  into `t_file`(`id`,`fk_user`,`fk_parent`,`url`,`is_dir`,`date_modified`,`internal_path`,`name`) values (1,1,NULL,'/uploads/2014/3/27/image4.jpg',0,'2014-03-27 22:09:19','/uploads/2014/3/27/image4.jpg',NULL),(2,1,NULL,'/uploads/2014/3/27/image.jpg',0,'2014-03-27 22:09:19','/uploads/2014/3/27/image.jpg',NULL),(3,1,NULL,'/uploads/2014/3/27/image2.jpg',0,'2014-03-27 22:09:19','/uploads/2014/3/27/image2.jpg',NULL),(4,1,NULL,'/uploads/2014/3/27/image3.jpg',0,'2014-03-27 22:09:19','/uploads/2014/3/27/image3.jpg',NULL),(5,1,NULL,'/uploads/2014/05/20/452e9971ae0fff703dc3279d605c3817.png',0,'2014-05-20 22:30:55','/uploads/2014/05/20/452e9971ae0fff703dc3279d605c3817.png',NULL),(6,1,NULL,'/uploads/2014/05/20/ddc50e1773620024c3e0158946a47435.png',0,'2014-05-20 22:31:33','/uploads/2014/05/20/ddc50e1773620024c3e0158946a47435.png',NULL),(9,1,NULL,'/uploads/2014/05/20/ae8564fee192da10b00b78cefd09fe00.jpg',0,'2014-05-20 23:58:15','/uploads/2014/05/20/ae8564fee192da10b00b78cefd09fe00.jpg',NULL),(11,5,NULL,'/uploads/2014/06/08/71a09835536adb714fa57a856c6aea4a.jpg',0,'2014-06-08 11:43:10','uploads/2014/06/08/71a09835536adb714fa57a856c6aea4a.jpg',NULL),(13,NULL,NULL,'/uploads/2014/06/08/0c3ac241974894f459ae8c32e7d445ed.jpg',0,'2014-06-08 18:49:14','uploads/2014/06/08/0c3ac241974894f459ae8c32e7d445ed.jpg',NULL),(14,NULL,NULL,'/uploads/2014/06/09/d0fe534cfd23807c7c55e392f2763a12.jpg',0,'2014-06-09 19:28:07','uploads/2014/06/09/d0fe534cfd23807c7c55e392f2763a12.jpg',NULL),(15,NULL,NULL,'/uploads/2014/06/09/46a5dc9c10a27121e934a6fc49d7de71.jpeg',0,'2014-06-09 19:28:18','uploads/2014/06/09/46a5dc9c10a27121e934a6fc49d7de71.jpeg',NULL),(16,NULL,NULL,'/uploads/2014/06/09/eaccdabf31d56e91c37018d2a07983ad.jpeg',0,'2014-06-09 19:28:25','uploads/2014/06/09/eaccdabf31d56e91c37018d2a07983ad.jpeg',NULL),(17,NULL,NULL,'/uploads/2014/06/09/87ded0a1e9e403893ca72cf050bd4e1a.jpeg',0,'2014-06-09 19:28:36','uploads/2014/06/09/87ded0a1e9e403893ca72cf050bd4e1a.jpeg',NULL),(18,NULL,NULL,'/uploads/2014/06/09/22adfaed8f02562bce4829c3088686a3.jpg',0,'2014-06-09 19:40:24','uploads/2014/06/09/22adfaed8f02562bce4829c3088686a3.jpg',NULL),(19,NULL,NULL,'/uploads/2014/06/09/da524d09f646ff09af7723c1e9b6b342.jpeg',0,'2014-06-09 19:40:41','uploads/2014/06/09/da524d09f646ff09af7723c1e9b6b342.jpeg',NULL),(20,5,NULL,'/uploads/2014/06/09/91e39cf03370de528eb4c80e9c11ffb0.png',0,'2014-06-09 20:14:54','uploads/2014/06/09/91e39cf03370de528eb4c80e9c11ffb0.png',NULL),(21,NULL,NULL,'/uploads/2014/06/09/b2f319eb985129ca44b73eda1a34c56a.jpg',0,'2014-06-09 20:31:18','uploads/2014/06/09/b2f319eb985129ca44b73eda1a34c56a.jpg',NULL),(22,NULL,NULL,'/uploads/2014/06/09/c2e58164283218270a92e3431e57beca.jpg',0,'2014-06-09 20:31:25','uploads/2014/06/09/c2e58164283218270a92e3431e57beca.jpg',NULL),(23,NULL,NULL,'/uploads/2014/06/09/f04532775037725f0b9d854db321021a.jpg',0,'2014-06-09 21:05:20','uploads/2014/06/09/f04532775037725f0b9d854db321021a.jpg',NULL),(24,NULL,NULL,'/uploads/2014/06/09/f8d03a5299ab33e2c4ef562f6bf9e490.jpeg',0,'2014-06-09 21:05:35','uploads/2014/06/09/f8d03a5299ab33e2c4ef562f6bf9e490.jpeg',NULL),(25,NULL,NULL,'/uploads/2014/06/09/e6c1ea20da5f4310bc447a599203aedf.jpeg',0,'2014-06-09 21:06:31','uploads/2014/06/09/e6c1ea20da5f4310bc447a599203aedf.jpeg',NULL),(27,NULL,NULL,'/uploads/2014/06/09/57512f63ac025db07e26d902e14f08b8.jpg',0,'2014-06-09 21:14:24','uploads/2014/06/09/57512f63ac025db07e26d902e14f08b8.jpg',NULL),(28,NULL,NULL,'/uploads/2014/06/09/23fde5d7a488ede6f474bdb559332beb.jpg',0,'2014-06-09 21:14:39','uploads/2014/06/09/23fde5d7a488ede6f474bdb559332beb.jpg',NULL),(29,NULL,NULL,'/uploads/2014/06/13/c3025644ebf2538e465a341921827c8e.jpg',0,'2014-06-13 17:07:43','uploads/2014/06/13/c3025644ebf2538e465a341921827c8e.jpg',NULL),(30,NULL,NULL,'/uploads/2014/06/13/64030412b0be416902e7aa048ae70451.jpeg',0,'2014-06-13 17:07:49','uploads/2014/06/13/64030412b0be416902e7aa048ae70451.jpeg',NULL),(31,NULL,NULL,'/uploads/2014/06/13/363b94210e55f549e8218292e614109e.jpeg',0,'2014-06-13 17:07:56','uploads/2014/06/13/363b94210e55f549e8218292e614109e.jpeg',NULL),(32,NULL,NULL,'/uploads/2014/06/13/00be7d03f81f61bb8e7e67a240b7b16f.jpeg',0,'2014-06-13 17:08:09','uploads/2014/06/13/00be7d03f81f61bb8e7e67a240b7b16f.jpeg',NULL),(33,NULL,NULL,'/uploads/2014/06/13/fa9d524da206155c946576c641d759dc.jpg',0,'2014-06-13 19:12:36','uploads/2014/06/13/fa9d524da206155c946576c641d759dc.jpg',NULL),(34,NULL,NULL,'/uploads/2014/06/13/5e0b60a7066a5317e913f8c9fbc120c0.jpg',0,'2014-06-13 19:33:18','uploads/2014/06/13/5e0b60a7066a5317e913f8c9fbc120c0.jpg',NULL),(35,NULL,NULL,'/uploads/2014/06/13/db67785bb51b6e5c5179d33c5321d5e6.jpg',0,'2014-06-13 19:34:13','uploads/2014/06/13/db67785bb51b6e5c5179d33c5321d5e6.jpg',NULL),(36,NULL,NULL,'/uploads/2014/06/13/bf24a959ee41fbfc95a7de927429fafe.jpg',0,'2014-06-13 19:34:40','uploads/2014/06/13/bf24a959ee41fbfc95a7de927429fafe.jpg',NULL),(37,NULL,NULL,'/uploads/2014/06/13/f98e9956adf497ae3fc7e242c329208a.jpg',0,'2014-06-13 19:37:54','uploads/2014/06/13/f98e9956adf497ae3fc7e242c329208a.jpg',NULL),(38,NULL,NULL,'/uploads/2014/06/13/92594c773f713f117730d757da3649cb.jpg',0,'2014-06-13 19:37:59','uploads/2014/06/13/92594c773f713f117730d757da3649cb.jpg',NULL),(39,5,NULL,'/uploads/2014/06/15/0738acd98d367b8950e14da8581376e0.jpg',0,'2014-06-15 20:55:50','uploads/2014/06/15/0738acd98d367b8950e14da8581376e0.jpg',NULL),(40,5,NULL,'/uploads/2014/06/15/9b03e4f684e84261aadd128383ed08e6.jpg',0,'2014-06-15 20:55:50','uploads/2014/06/15/9b03e4f684e84261aadd128383ed08e6.jpg',NULL);

/*Table structure for table `t_hot` */

DROP TABLE IF EXISTS `t_hot`;

CREATE TABLE `t_hot` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_product` int(11) DEFAULT NULL,
  `sort` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `t_hot` */

insert  into `t_hot`(`id`,`fk_product`,`sort`) values (7,14,NULL),(8,15,NULL),(9,20,NULL);

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
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `t_list` */

insert  into `t_list`(`id`,`fk_listtype`,`name`,`codename`,`sort`) values (1,1,'glass','glass',1),(2,1,'pottery','pottery',2),(3,1,'wooden','wooden',3),(4,1,'plastic','plastic',4),(5,1,'other','other',5),(6,2,'lover','lover',1),(7,2,'parent','parent',2),(8,2,'family','family',3),(9,2,'friend','friend',4),(10,2,'children','children',5),(11,3,'birthday','birthday',1),(12,3,'new year','newyear',2),(13,3,'noel','noel',3),(14,4,'USD','USD',1),(15,4,'VND','VND',2),(16,5,'Vietnam','VN',1),(17,5,'US','US',2),(18,5,'Korea','KR',3),(19,6,'express','express',1),(20,6,'in3day','in3day',2),(21,7,'cash','cash',1),(22,7,'bank transfer','transfer',2),(23,7,'bank check','check',3),(24,8,'SKU','SKU',1),(25,8,'UPC','UPC',2),(26,9,'Kg','Kg',1),(27,9,'Liter','Liter',2),(28,12,'Vietnam','VN',0),(29,12,'Korea','KR',NULL),(30,12,'China','CN',NULL);

/*Table structure for table `t_listtype` */

DROP TABLE IF EXISTS `t_listtype`;

CREATE TABLE `t_listtype` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `codename` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` tinyint(4) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `t_listtype` */

insert  into `t_listtype`(`id`,`name`,`codename`,`status`) values (1,'material','material',1),(2,'gift target','gift_target',1),(3,'occasion','occasion',1),(4,'currency','currency',1),(5,'source','source',1),(7,'payment method','payment_method',1),(8,'storage code type','storage_code_type',1),(9,'weight unit','weight_unit',1),(12,'country','country',1);

/*Table structure for table `t_location` */

DROP TABLE IF EXISTS `t_location`;

CREATE TABLE `t_location` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `level` enum('province','city') COLLATE utf8_unicode_ci DEFAULT NULL,
  `fk_parent` int(11) DEFAULT NULL,
  `codename` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `t_location` */

insert  into `t_location`(`id`,`name`,`level`,`fk_parent`,`codename`) values (1,'hanoi','province',NULL,'101');

/*Table structure for table `t_order` */

DROP TABLE IF EXISTS `t_order`;

CREATE TABLE `t_order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fk_customer` int(11) DEFAULT NULL,
  `subtotal` double DEFAULT NULL,
  `fk_order_status_history` int(11) DEFAULT NULL,
  `comment` text COLLATE utf8_unicode_ci,
  `bonus` double DEFAULT NULL,
  `fk_shipping_method` int(11) DEFAULT NULL,
  `fk_payment_method` int(11) DEFAULT NULL,
  `fk_currency` int(11) DEFAULT NULL,
  `date_created` datetime DEFAULT NULL,
  `shipping_fee` double DEFAULT NULL,
  `discount` double DEFAULT NULL,
  `fk_shipping_address` int(11) DEFAULT NULL,
  `fk_billing_address` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `t_order` */

/*Table structure for table `t_order_evidence` */

DROP TABLE IF EXISTS `t_order_evidence`;

CREATE TABLE `t_order_evidence` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_user` int(11) DEFAULT NULL,
  `checksum` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date_created` datetime DEFAULT NULL,
  `date_expired` datetime DEFAULT NULL,
  `unique_key` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `t_order_evidence` */

insert  into `t_order_evidence`(`id`,`fk_user`,`checksum`,`date_created`,`date_expired`,`unique_key`) values (1,NULL,'84ccc4745a8f1bb963cc05d28c8597f6','2014-04-06 22:24:30','2014-03-09 22:24:00','1'),(3,NULL,'84ccc4745a8f1bb963cc05d28c8597f6','2014-04-06 22:40:03','2014-04-09 22:40:00',NULL),(4,NULL,'84ccc4745a8f1bb963cc05d28c8597f6','2014-04-06 22:40:39','2014-04-09 22:40:00',NULL),(5,NULL,'7607632bc67c439199acc402cd4c802e','2014-04-19 21:42:55','2014-04-22 21:42:00','4be77891125043d8bd657531923d1441'),(6,NULL,'7607632bc67c439199acc402cd4c802e','2014-04-19 21:49:16','2014-04-22 21:49:00','5ee043daba80f7c99e50b0136825d25f'),(7,NULL,'7607632bc67c439199acc402cd4c802e','2014-04-19 21:49:58','2014-04-22 21:49:00','546e6c4a24c5ef83c8127edbe0ff0d66'),(8,NULL,'7607632bc67c439199acc402cd4c802e','2014-04-19 21:53:19','2014-04-22 21:53:00','e3a78b6b9fb231e3e0bf3f16529ed2c6'),(9,NULL,'7607632bc67c439199acc402cd4c802e','2014-04-19 21:53:40','2014-04-22 21:53:00','7c8ab24fab47bef56b79073a2f6645dc'),(10,NULL,'7607632bc67c439199acc402cd4c802e','2014-04-19 21:53:51','2014-04-22 21:53:00','785c68d9ddb3e1a51681e5f6f846f2e9'),(11,NULL,'7607632bc67c439199acc402cd4c802e','2014-04-19 21:54:00','2014-04-22 21:54:00','048dac3cfc5d83309b26a417c7aab519'),(12,NULL,'60e50e483bffa68cc32ac655e6213efe','2014-04-19 21:57:03','2014-04-22 21:57:00','bef5527441ddccade83e6d622b1b11e2'),(13,NULL,'7ada60191eef25e1b931a491ffd7bcdd','2014-04-20 14:37:07','2014-04-23 14:37:00','1339362c7a8f9d73347feb1865937ab5'),(14,NULL,'29e83ad0272b828a389ad6cba7b27aa3','2014-05-12 22:28:32','2014-05-15 22:28:00','0ff5cc1180200e6c93f4ac47f181e56b'),(15,NULL,'f4762ed99e7f5f5c69cc54530550f70d','2014-05-12 23:03:39','2014-05-15 23:03:00','32a9c780cb80722f8a14e48a3fbd91ee'),(16,NULL,'f4762ed99e7f5f5c69cc54530550f70d','2014-05-12 23:08:56','2014-05-15 23:08:00','3bda1a30477647720d198f9625f97fe2'),(17,NULL,'ca8dfbd276661dc67fe25ed1b72c4e15','2014-05-15 12:49:16','2014-05-18 12:49:00','fff07eaee6bd6de274776d9a0d730d52'),(18,NULL,'bf29aadc447503bcce0a0ef09e1c591f','2014-05-17 14:32:01','2014-05-20 14:32:00','0e7b2a18d329675005996f07ae0e03cf'),(19,NULL,'8952c2bb94b48588b6cae68d8b8a6b52','2014-05-17 21:09:32','2014-05-20 21:09:00','7e0be4f3d22ba62457984e921cdfa518'),(20,5,'752b4babd43cf73df84261150ebafbb3','2014-06-09 20:49:05','2014-06-12 20:49:00','7134981fdda16b1a0c7ce7b1cbf8d190');

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
  PRIMARY KEY (`id`),
  UNIQUE KEY `unq_pin` (`fk_user`,`fk_product`)
) ENGINE=InnoDB AUTO_INCREMENT=1039 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `t_pin` */

insert  into `t_pin`(`id`,`fk_user`,`fk_product`) values (1038,5,14),(1037,5,15);

/*Table structure for table `t_privilege` */

DROP TABLE IF EXISTS `t_privilege`;

CREATE TABLE `t_privilege` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_instance` int(11) DEFAULT NULL,
  `type` enum('user','role') COLLATE utf8_unicode_ci DEFAULT NULL,
  `privilige` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `t_privilege` */

/*Table structure for table `t_product` */

DROP TABLE IF EXISTS `t_product`;

CREATE TABLE `t_product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_category` int(11) DEFAULT NULL,
  `fk_seller` int(11) DEFAULT NULL,
  `fk_group` int(11) DEFAULT NULL,
  `is_group` tinyint(4) DEFAULT '0',
  `discount` double DEFAULT '0',
  `date_created` datetime DEFAULT NULL,
  `count_pin` int(11) DEFAULT '0',
  `status` tinyint(4) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=134 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `t_product` */

insert  into `t_product`(`id`,`fk_category`,`fk_seller`,`fk_group`,`is_group`,`discount`,`date_created`,`count_pin`,`status`) values (14,5,1,NULL,0,0,'2014-05-19 00:34:13',0,0),(15,4,1,NULL,0,0,'2014-05-20 23:57:16',0,1),(20,5,1,NULL,0,0,'2014-05-19 00:34:13',0,0),(21,5,1,NULL,0,0,'2014-06-09 19:24:02',0,1),(22,5,1,NULL,0,0,'2014-06-09 19:24:02',0,1),(23,5,1,NULL,0,0,'2014-06-09 19:38:54',0,1),(24,5,1,NULL,0,0,'2014-06-09 19:40:13',0,1),(25,5,1,NULL,0,0,'2014-06-09 19:43:55',0,1),(26,11,1,NULL,0,0,'2014-06-09 20:12:54',0,1),(27,17,1,NULL,0,0,'2014-06-09 20:28:47',0,1),(28,5,1,NULL,0,0,'2014-06-09 20:43:45',0,1),(29,5,1,NULL,0,0,'2014-06-09 20:49:25',0,1),(30,9,1,NULL,0,0,'2014-06-09 20:51:07',0,1),(31,8,1,NULL,0,0,'2014-06-09 20:51:09',0,1),(32,5,1,NULL,0,0,'2014-06-09 20:54:35',0,1),(33,5,1,NULL,0,0,'2014-06-09 21:01:19',0,1),(34,5,1,NULL,0,0,'2014-06-13 17:06:14',0,1),(35,5,1,NULL,0,0,'2014-06-13 17:07:23',0,1),(36,5,1,NULL,0,0,'2014-06-13 17:11:37',0,1),(37,5,1,NULL,0,0,'2014-06-13 17:12:07',0,1),(38,15,1,NULL,0,0,'2014-06-13 19:12:19',0,1),(39,6,1,NULL,0,0,'2014-06-13 19:29:00',0,1),(40,7,1,NULL,0,0,'2014-06-13 19:30:55',0,1),(41,7,1,NULL,0,0,'2014-06-13 19:30:55',0,1),(42,5,1,NULL,0,0,'2014-06-13 19:37:33',0,1),(43,5,1,NULL,0,0,'2014-06-13 19:42:52',0,1),(44,4,1,NULL,0,0,'2014-05-20 23:57:16',0,1),(45,4,1,NULL,0,0,'2014-05-20 23:57:16',0,1),(46,4,1,NULL,0,0,'2014-05-20 23:57:16',0,1),(47,4,1,NULL,0,0,'2014-05-20 23:57:16',0,1),(48,4,1,NULL,0,0,'2014-05-20 23:57:16',0,1),(49,4,1,NULL,0,0,'2014-05-20 23:57:16',0,1),(50,4,1,NULL,0,0,'2014-05-20 23:57:16',0,1),(51,4,1,NULL,0,0,'2014-05-20 23:57:16',0,1),(52,4,1,NULL,0,0,'2014-05-20 23:57:16',0,1),(53,4,1,NULL,0,0,'2014-05-20 23:57:16',0,1),(54,4,1,NULL,0,0,'2014-05-20 23:57:16',0,1),(55,4,1,NULL,0,0,'2014-05-20 23:57:16',0,1),(56,4,1,NULL,0,0,'2014-05-20 23:57:16',0,1),(57,4,1,NULL,0,0,'2014-05-20 23:57:16',0,1),(58,4,1,NULL,0,0,'2014-05-20 23:57:16',0,1),(59,4,1,NULL,0,0,'2014-05-20 23:57:16',0,1),(60,4,1,NULL,0,0,'2014-05-20 23:57:16',0,1),(61,4,1,NULL,0,0,'2014-05-20 23:57:16',0,1),(62,4,1,NULL,0,0,'2014-05-20 23:57:16',0,1),(63,4,1,NULL,0,0,'2014-05-20 23:57:16',0,1),(64,4,1,NULL,0,0,'2014-05-20 23:57:16',0,1),(65,4,1,NULL,0,0,'2014-05-20 23:57:16',0,1),(66,4,1,NULL,0,0,'2014-05-20 23:57:16',0,1),(67,4,1,NULL,0,0,'2014-05-20 23:57:16',0,1),(68,4,1,NULL,0,0,'2014-05-20 23:57:16',0,1),(69,4,1,NULL,0,0,'2014-05-20 23:57:16',0,1),(70,4,1,NULL,0,0,'2014-05-20 23:57:16',0,1),(71,4,1,NULL,0,0,'2014-05-20 23:57:16',0,1),(72,4,1,NULL,0,0,'2014-05-20 23:57:16',0,1),(73,4,1,NULL,0,0,'2014-05-20 23:57:16',0,1),(74,4,1,NULL,0,0,'2014-05-20 23:57:16',0,1),(75,4,1,NULL,0,0,'2014-05-20 23:57:16',0,1),(76,4,1,NULL,0,0,'2014-05-20 23:57:16',0,1),(77,4,1,NULL,0,0,'2014-05-20 23:57:16',0,1),(78,4,1,NULL,0,0,'2014-05-20 23:57:16',0,1),(79,4,1,NULL,0,0,'2014-05-20 23:57:16',0,1),(80,4,1,NULL,0,0,'2014-05-20 23:57:16',0,1),(81,4,1,NULL,0,0,'2014-05-20 23:57:16',0,1),(82,4,1,NULL,0,0,'2014-05-20 23:57:16',0,1),(83,4,1,NULL,0,0,'2014-05-20 23:57:16',0,1),(84,4,1,NULL,0,0,'2014-05-20 23:57:16',0,1),(85,4,1,NULL,0,0,'2014-05-20 23:57:16',0,1),(86,4,1,NULL,0,0,'2014-05-20 23:57:16',0,1),(87,4,1,NULL,0,0,'2014-05-20 23:57:16',0,1),(88,4,1,NULL,0,0,'2014-05-20 23:57:16',0,1),(89,4,1,NULL,0,0,'2014-05-20 23:57:16',0,1),(90,4,1,NULL,0,0,'2014-05-20 23:57:16',0,1),(91,4,1,NULL,0,0,'2014-05-20 23:57:16',0,1),(92,4,1,NULL,0,0,'2014-05-20 23:57:16',0,1),(93,4,1,NULL,0,0,'2014-05-20 23:57:16',0,1),(94,4,1,NULL,0,0,'2014-05-20 23:57:16',0,1),(95,4,1,NULL,0,0,'2014-05-20 23:57:16',0,1),(96,4,1,NULL,0,0,'2014-05-20 23:57:16',0,1),(97,4,1,NULL,0,0,'2014-05-20 23:57:16',0,1),(98,4,1,NULL,0,0,'2014-05-20 23:57:16',0,1),(99,4,1,NULL,0,0,'2014-05-20 23:57:16',0,1),(100,4,1,NULL,0,0,'2014-05-20 23:57:16',0,1),(101,4,1,NULL,0,0,'2014-05-20 23:57:16',0,1),(102,4,1,NULL,0,0,'2014-05-20 23:57:16',0,1),(103,4,1,NULL,0,0,'2014-05-20 23:57:16',0,1),(104,4,1,NULL,0,0,'2014-05-20 23:57:16',0,1),(105,4,1,NULL,0,0,'2014-05-20 23:57:16',0,1),(106,4,1,NULL,0,0,'2014-05-20 23:57:16',0,1),(107,4,1,NULL,0,0,'2014-05-20 23:57:16',0,1),(108,4,1,NULL,0,0,'2014-05-20 23:57:16',0,1),(109,4,1,NULL,0,0,'2014-05-20 23:57:16',0,1),(110,4,1,NULL,0,0,'2014-05-20 23:57:16',0,1),(111,4,1,NULL,0,0,'2014-05-20 23:57:16',0,1),(112,4,1,NULL,0,0,'2014-05-20 23:57:16',0,1),(113,4,1,NULL,0,0,'2014-05-20 23:57:16',0,1),(114,4,1,NULL,0,0,'2014-05-20 23:57:16',0,1),(115,4,1,NULL,0,0,'2014-05-20 23:57:16',0,1),(116,4,1,NULL,0,0,'2014-05-20 23:57:16',0,1),(117,4,1,NULL,0,0,'2014-05-20 23:57:16',0,1),(118,4,1,NULL,0,0,'2014-05-20 23:57:16',0,1),(119,4,1,NULL,0,0,'2014-05-20 23:57:16',0,1),(120,4,1,NULL,0,0,'2014-05-20 23:57:16',0,1),(121,4,1,NULL,0,0,'2014-05-20 23:57:16',0,1),(122,4,1,NULL,0,0,'2014-05-20 23:57:16',0,1),(123,4,1,NULL,0,0,'2014-05-20 23:57:16',0,1),(124,4,1,NULL,0,0,'2014-05-20 23:57:16',0,1),(125,4,1,NULL,0,0,'2014-05-20 23:57:16',0,1),(126,4,1,NULL,0,0,'2014-05-20 23:57:16',0,1),(127,4,1,NULL,0,0,'2014-05-20 23:57:16',0,1),(128,4,1,NULL,0,0,'2014-05-20 23:57:16',0,1),(129,4,1,NULL,0,0,'2014-05-20 23:57:16',0,1),(130,4,1,NULL,0,0,'2014-05-20 23:57:16',0,1),(131,4,1,NULL,0,0,'2014-05-20 23:57:16',0,1),(132,4,1,NULL,0,0,'2014-05-20 23:57:16',0,1),(133,4,1,NULL,0,0,'2014-05-20 23:57:16',0,1);

/*Table structure for table `t_product_attribute` */

DROP TABLE IF EXISTS `t_product_attribute`;

CREATE TABLE `t_product_attribute` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_product` int(11) NOT NULL,
  `fk_attribute_type` int(11) NOT NULL,
  `value_number` double DEFAULT NULL,
  `value_enum` int(11) DEFAULT NULL,
  `value_text` text COLLATE utf8_unicode_ci,
  `language` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `value_varchar` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2145 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `t_product_attribute` */

insert  into `t_product_attribute`(`id`,`fk_product`,`fk_attribute_type`,`value_number`,`value_enum`,`value_text`,`language`,`value_varchar`) values (304,14,1,NULL,NULL,NULL,'VN-VI','Pha lê dâu'),(305,14,20,NULL,24,NULL,NULL,NULL),(306,14,18,NULL,NULL,NULL,NULL,''),(307,14,2,NULL,NULL,'<p>zxsadas</p>','VN-VI',NULL),(308,14,11,100000,NULL,NULL,NULL,NULL),(309,14,21,NULL,NULL,NULL,NULL,'eng'),(310,14,22,NULL,NULL,'ddkffk',NULL,NULL),(311,14,23,NULL,NULL,'sdkdkkd',NULL,NULL),(312,15,1,NULL,NULL,NULL,'VN-VI','def'),(313,15,20,NULL,24,NULL,NULL,NULL),(314,15,18,NULL,NULL,NULL,NULL,'qwewqe'),(315,15,2,NULL,NULL,'<p>sdasda</p>','VN-VI',NULL),(316,15,11,60000,NULL,NULL,NULL,NULL),(317,15,21,NULL,NULL,NULL,NULL,'ssa'),(318,15,22,NULL,NULL,'das',NULL,NULL),(319,15,23,NULL,NULL,'dasd',NULL,NULL),(320,14,1,NULL,NULL,NULL,'EN-US','Straw'),(322,14,2,NULL,NULL,'<p>eng</p>\n','EN-US',NULL),(323,20,1,NULL,NULL,NULL,'VN-VI','Pha lê dâu'),(324,20,20,NULL,24,NULL,NULL,NULL),(325,20,18,NULL,NULL,NULL,NULL,''),(326,20,2,NULL,NULL,'<p>zxsadas</p>','VN-VI',NULL),(327,20,11,100000,NULL,NULL,NULL,NULL),(328,20,21,NULL,NULL,NULL,NULL,'eng'),(329,20,22,NULL,NULL,'ddkffk',NULL,NULL),(330,20,23,NULL,NULL,'sdkdkkd',NULL,NULL),(331,20,1,NULL,NULL,NULL,'EN-US','Strawberry 2'),(332,20,2,NULL,NULL,'<p>eng</p>\n','EN-US',NULL),(337,20,13,11,NULL,NULL,NULL,NULL),(338,20,24,NULL,0,NULL,NULL,NULL),(339,20,14,0,NULL,NULL,NULL,NULL),(340,20,26,NULL,NULL,'',NULL,NULL),(341,20,27,0,NULL,NULL,NULL,NULL),(342,20,28,0,NULL,NULL,NULL,NULL),(343,20,29,NULL,0,NULL,NULL,NULL),(344,20,30,NULL,0,NULL,NULL,NULL),(345,20,31,0,NULL,NULL,NULL,NULL),(346,20,32,0,NULL,NULL,NULL,NULL),(347,20,33,0,NULL,NULL,NULL,NULL),(348,14,13,0,NULL,NULL,NULL,NULL),(349,14,24,NULL,0,NULL,NULL,NULL),(350,14,14,0,NULL,NULL,NULL,NULL),(351,14,26,NULL,NULL,'',NULL,NULL),(352,14,27,0,NULL,NULL,NULL,NULL),(353,14,28,0,NULL,NULL,NULL,NULL),(354,14,29,NULL,0,NULL,NULL,NULL),(355,14,30,NULL,0,NULL,NULL,NULL),(356,14,31,0,NULL,NULL,NULL,NULL),(357,14,32,0,NULL,NULL,NULL,NULL),(358,14,33,0,NULL,NULL,NULL,NULL),(359,21,1,NULL,NULL,NULL,'EN-US','Visions VS-332'),(360,21,20,NULL,0,NULL,NULL,NULL),(361,21,18,NULL,NULL,NULL,NULL,''),(362,21,13,1,NULL,NULL,NULL,NULL),(363,21,24,NULL,0,NULL,NULL,NULL),(364,21,14,0,NULL,NULL,NULL,NULL),(365,21,2,NULL,NULL,'<p><span style=\"color:#0000FF\">Việc nấu nướng sẽ thuận tiện v&agrave; th&uacute; vị hơn khi bạn sử dụng bộ 3 nồi thủy tinh <strong>Visions VS-332</strong>. Sản phẩm được l&agrave;m bằng gốm thủy tinh cao cấp c&oacute; khả năng chịu được c&aacute;c sốc nhiệt, tiết kiệm năng lượng v&agrave; d&ugrave;ng được trong nướng hoặc l&ograve; vi s&oacute;ng hay ngay cả m&aacute;y rửa ch&eacute;n dĩa. Nồi Visions được sản xuất theo kiểu d&aacute;ng của Ph&aacute;p theo những ti&ecirc;u chuẩn v&ocirc; c&ugrave;ng khắt khe của nh&agrave; sản xuất đảm bảo an to&agrave;n cho người d&ugrave;ng, kh&ocirc;ng c&oacute; c&aacute;c chất g&acirc;y hại cho sức khỏe hay ảnh hưởng đến m&ocirc;i trường. Bộ nồi thủy tinh <strong>Visions VS-332</strong> với 3 nồi dung t&iacute;ch 1.25L, 2.25L v&agrave; 3.25L sẽ l&agrave; trợ thủ đắc lực gi&uacute;p bạn nấu những m&oacute;n ăn ngon v&agrave; gi&agrave;u dinh dưỡng cho cả gia đ&igrave;nh.</span></p>\n','EN-US',NULL),(366,21,26,NULL,NULL,'<p><strong>Độ bền cao</strong><br />\nNồi Visions chịu được c&aacute;c sốc nhiệt n&ecirc;n kh&ocirc;ng dễ vỡ khi c&oacute; sự thay đổi nhiệt độ đột ngột. Nồi chịu được độ n&oacute;ng l&ecirc;n đến 400 độ C.</p>\n\n<p><strong>Tiết kiệm năng lượng</strong><br />\nBạn n&ecirc;n đun bằng lửa nhỏ hay lửa vừa để tiết kiệm thời gian v&agrave; năng lượng v&igrave; nồi thủy tinh nhanh n&oacute;ng v&agrave; giữ nhiệt rất tốt.</p>\n\n<p><strong>T&iacute;nh tiện dụng cao</strong><br />\nBạn c&oacute; thể d&ugrave;ng bộ nồi <strong>Visions VS-332</strong> an to&agrave;n trong l&ograve; nướng, l&ograve; vi s&oacute;ng, tủ lạnh hay m&aacute;y rửa ch&eacute;n dĩa.</p>\n\n<p><strong>Chất liệu thủy tinh trong suốt</strong><br />\nGi&uacute;p bạn c&oacute; thể quan s&aacute;t trong qu&aacute; tr&igrave;nh đun nấu v&agrave; tr&aacute;nh được việc thức ăn bị s&ocirc;i tr&agrave;o hay kh&ocirc; cạn nước. Rủi ro do nấu qu&aacute; lửa sẽ bị hạn chế tối đa v&agrave; nhờ đ&oacute; thức ăn lu&ocirc;n giữ được chất dinh dưỡng v&agrave; độ tươi ngon.</p>\n\n<p><strong>Kh&ocirc;ng b&aacute;m m&ugrave;i v&agrave; dễ ch&ugrave;i rửa</strong><br />\nBộ nồi <strong>Visions VS-332</strong> c&oacute; chất liệu gốm thủy tinh kh&ocirc;ng g&acirc;y phản ứng ho&aacute; học n&ecirc;n kh&ocirc;ng hấp thụ m&ugrave;i vị hay vết bẩn từ thực phẩm, giữ vệ sinh v&agrave; độ s&aacute;ng b&oacute;ng cao cho nồi.</p>\n',NULL,NULL),(367,21,11,2000,NULL,NULL,NULL,NULL),(368,21,27,0,NULL,NULL,NULL,NULL),(369,21,28,0,NULL,NULL,NULL,NULL),(370,21,29,NULL,28,NULL,NULL,NULL),(371,21,30,NULL,0,NULL,NULL,NULL),(372,21,31,0,NULL,NULL,NULL,NULL),(373,21,32,0,NULL,NULL,NULL,NULL),(374,21,33,0,NULL,NULL,NULL,NULL),(375,21,21,NULL,NULL,NULL,NULL,''),(376,21,22,NULL,NULL,'',NULL,NULL),(377,21,23,NULL,NULL,'',NULL,NULL),(378,22,1,NULL,NULL,NULL,'EN-US','Visions VS-332'),(379,22,20,NULL,0,NULL,NULL,NULL),(380,22,18,NULL,NULL,NULL,NULL,''),(381,22,13,1,NULL,NULL,NULL,NULL),(382,22,24,NULL,0,NULL,NULL,NULL),(383,22,14,0,NULL,NULL,NULL,NULL),(384,22,2,NULL,NULL,'<p>Việc nấu nướng sẽ thuận tiện v&agrave; th&uacute; vị hơn khi bạn sử dụng bộ 3 nồi thủy tinh <strong>Visions VS-332</strong>. Sản phẩm được l&agrave;m bằng gốm thủy tinh cao cấp c&oacute; khả năng chịu được c&aacute;c sốc nhiệt, tiết kiệm năng lượng v&agrave; d&ugrave;ng được trong nướng hoặc l&ograve; vi s&oacute;ng hay ngay cả m&aacute;y rửa ch&eacute;n dĩa. Nồi Visions được sản xuất theo kiểu d&aacute;ng của Ph&aacute;p theo những ti&ecirc;u chuẩn v&ocirc; c&ugrave;ng khắt khe của nh&agrave; sản xuất đảm bảo an to&agrave;n cho người d&ugrave;ng, kh&ocirc;ng c&oacute; c&aacute;c chất g&acirc;y hại cho sức khỏe hay ảnh hưởng đến m&ocirc;i trường. Bộ nồi thủy tinh <strong>Visions VS-332</strong> với 3 nồi dung t&iacute;ch 1.25L, 2.25L v&agrave; 3.25L sẽ l&agrave; trợ thủ đắc lực gi&uacute;p bạn nấu những m&oacute;n ăn ngon v&agrave; gi&agrave;u dinh dưỡng cho cả gia đ&igrave;nh.</p>\n','EN-US',NULL),(385,22,26,NULL,NULL,'<p><strong>Độ bền cao</strong><br />\nNồi Visions chịu được c&aacute;c sốc nhiệt n&ecirc;n kh&ocirc;ng dễ vỡ khi c&oacute; sự thay đổi nhiệt độ đột ngột. Nồi chịu được độ n&oacute;ng l&ecirc;n đến 400 độ C.</p>\n\n<p><strong>Tiết kiệm năng lượng</strong><br />\nBạn n&ecirc;n đun bằng lửa nhỏ hay lửa vừa để tiết kiệm thời gian v&agrave; năng lượng v&igrave; nồi thủy tinh nhanh n&oacute;ng v&agrave; giữ nhiệt rất tốt.</p>\n\n<p><strong>T&iacute;nh tiện dụng cao</strong><br />\nBạn c&oacute; thể d&ugrave;ng bộ nồi <strong>Visions VS-332</strong> an to&agrave;n trong l&ograve; nướng, l&ograve; vi s&oacute;ng, tủ lạnh hay m&aacute;y rửa ch&eacute;n dĩa.</p>\n\n<p><strong>Chất liệu thủy tinh trong suốt</strong><br />\nGi&uacute;p bạn c&oacute; thể quan s&aacute;t trong qu&aacute; tr&igrave;nh đun nấu v&agrave; tr&aacute;nh được việc thức ăn bị s&ocirc;i tr&agrave;o hay kh&ocirc; cạn nước. Rủi ro do nấu qu&aacute; lửa sẽ bị hạn chế tối đa v&agrave; nhờ đ&oacute; thức ăn lu&ocirc;n giữ được chất dinh dưỡng v&agrave; độ tươi ngon.</p>\n\n<p><strong>Kh&ocirc;ng b&aacute;m m&ugrave;i v&agrave; dễ ch&ugrave;i rửa</strong><br />\nBộ nồi <strong>Visions VS-332</strong> c&oacute; chất liệu gốm thủy tinh kh&ocirc;ng g&acirc;y phản ứng ho&aacute; học n&ecirc;n kh&ocirc;ng hấp thụ m&ugrave;i vị hay vết bẩn từ thực phẩm, giữ vệ sinh v&agrave; độ s&aacute;ng b&oacute;ng cao cho nồi.</p>\n',NULL,NULL),(386,22,11,2000,NULL,NULL,NULL,NULL),(387,22,27,0,NULL,NULL,NULL,NULL),(388,22,28,0,NULL,NULL,NULL,NULL),(389,22,29,NULL,28,NULL,NULL,NULL),(390,22,30,NULL,0,NULL,NULL,NULL),(391,22,31,0,NULL,NULL,NULL,NULL),(392,22,32,0,NULL,NULL,NULL,NULL),(393,22,33,0,NULL,NULL,NULL,NULL),(394,22,21,NULL,NULL,NULL,NULL,''),(395,22,22,NULL,NULL,'',NULL,NULL),(396,22,23,NULL,NULL,'',NULL,NULL),(409,23,1,NULL,NULL,NULL,'EN-US','dsdsds'),(410,23,20,NULL,0,NULL,NULL,NULL),(411,23,18,NULL,NULL,NULL,NULL,''),(412,23,13,0,NULL,NULL,NULL,NULL),(413,23,24,NULL,0,NULL,NULL,NULL),(414,23,14,0,NULL,NULL,NULL,NULL),(415,23,2,NULL,NULL,'<p>dsdsdsds</p>\n','EN-US',NULL),(416,23,26,NULL,NULL,'',NULL,NULL),(417,23,11,0,NULL,NULL,NULL,NULL),(418,23,27,0,NULL,NULL,NULL,NULL),(419,23,28,0,NULL,NULL,NULL,NULL),(420,23,29,NULL,0,NULL,NULL,NULL),(421,23,30,NULL,0,NULL,NULL,NULL),(422,23,31,0,NULL,NULL,NULL,NULL),(423,23,32,0,NULL,NULL,NULL,NULL),(424,23,33,0,NULL,NULL,NULL,NULL),(425,23,21,NULL,NULL,NULL,NULL,''),(426,23,22,NULL,NULL,'',NULL,NULL),(427,23,23,NULL,NULL,'',NULL,NULL),(428,24,1,NULL,NULL,NULL,'EN-US','ểwrew'),(429,24,20,NULL,0,NULL,NULL,NULL),(430,24,18,NULL,NULL,NULL,NULL,''),(431,24,13,0,NULL,NULL,NULL,NULL),(432,24,24,NULL,0,NULL,NULL,NULL),(433,24,14,0,NULL,NULL,NULL,NULL),(434,24,2,NULL,NULL,'','EN-US',NULL),(435,24,26,NULL,NULL,'',NULL,NULL),(436,24,11,0,NULL,NULL,NULL,NULL),(437,24,27,0,NULL,NULL,NULL,NULL),(438,24,28,0,NULL,NULL,NULL,NULL),(439,24,29,NULL,0,NULL,NULL,NULL),(440,24,30,NULL,0,NULL,NULL,NULL),(441,24,31,0,NULL,NULL,NULL,NULL),(442,24,32,0,NULL,NULL,NULL,NULL),(443,24,33,0,NULL,NULL,NULL,NULL),(444,24,21,NULL,NULL,NULL,NULL,''),(445,24,22,NULL,NULL,'',NULL,NULL),(446,24,23,NULL,NULL,'',NULL,NULL),(447,25,1,NULL,NULL,NULL,'EN-US','dfdf'),(448,25,20,NULL,0,NULL,NULL,NULL),(449,25,18,NULL,NULL,NULL,NULL,''),(450,25,13,0,NULL,NULL,NULL,NULL),(451,25,24,NULL,0,NULL,NULL,NULL),(452,25,14,0,NULL,NULL,NULL,NULL),(453,25,2,NULL,NULL,'<p>dfsfd</p>\n','EN-US',NULL),(454,25,26,NULL,NULL,'',NULL,NULL),(455,25,11,0,NULL,NULL,NULL,NULL),(456,25,27,0,NULL,NULL,NULL,NULL),(457,25,28,0,NULL,NULL,NULL,NULL),(458,25,29,NULL,0,NULL,NULL,NULL),(459,25,30,NULL,0,NULL,NULL,NULL),(460,25,31,0,NULL,NULL,NULL,NULL),(461,25,32,0,NULL,NULL,NULL,NULL),(462,25,33,0,NULL,NULL,NULL,NULL),(463,25,21,NULL,NULL,NULL,NULL,''),(464,25,22,NULL,NULL,'',NULL,NULL),(465,25,23,NULL,NULL,'',NULL,NULL),(466,26,1,NULL,NULL,NULL,'EN-US','DEMO'),(467,26,20,NULL,24,NULL,NULL,NULL),(468,26,18,NULL,NULL,NULL,NULL,'01'),(469,26,13,1000,NULL,NULL,NULL,NULL),(470,26,24,NULL,26,NULL,NULL,NULL),(471,26,14,10,NULL,NULL,NULL,NULL),(472,26,2,NULL,NULL,'<p>DEMO ABC &aacute;df</p>\n','EN-US',NULL),(473,26,26,NULL,NULL,'<p>ABC</p>\n',NULL,NULL),(474,26,11,100,NULL,NULL,NULL,NULL),(475,26,27,3,NULL,NULL,NULL,NULL),(476,26,28,7,NULL,NULL,NULL,NULL),(477,26,29,NULL,30,NULL,NULL,NULL),(478,26,30,NULL,30,NULL,NULL,NULL),(479,26,31,100,NULL,NULL,NULL,NULL),(480,26,32,100,NULL,NULL,NULL,NULL),(481,26,33,100,NULL,NULL,NULL,NULL),(482,26,21,NULL,NULL,NULL,NULL,'10000'),(483,26,22,NULL,NULL,'10000000',NULL,NULL),(484,26,23,NULL,NULL,'1000000000000',NULL,NULL),(485,26,1,NULL,NULL,NULL,'VN-VI','DEMO'),(486,26,2,NULL,NULL,'','VN-VI',NULL),(487,26,1,NULL,NULL,NULL,'KO-KR','DEMO'),(488,26,2,NULL,NULL,'','KO-KR',NULL),(489,27,1,NULL,NULL,NULL,'EN-US','Liberty 125CC'),(490,27,20,NULL,0,NULL,NULL,NULL),(491,27,18,NULL,NULL,NULL,NULL,''),(492,27,13,1,NULL,NULL,NULL,NULL),(493,27,24,NULL,26,NULL,NULL,NULL),(494,27,14,200,NULL,NULL,NULL,NULL),(495,27,2,NULL,NULL,'<p><strong>Xe Liberty phong c&aacute;ch cho người s&agrave;nh điệu</strong></p>\n','EN-US',NULL),(496,27,26,NULL,NULL,'<p>Kh&ocirc;ng d&agrave;nh cho người yếu tim</p>\n',NULL,NULL),(497,27,11,69000000,NULL,NULL,NULL,NULL),(498,27,27,0,NULL,NULL,NULL,NULL),(499,27,28,0,NULL,NULL,NULL,NULL),(500,27,29,NULL,28,NULL,NULL,NULL),(501,27,30,NULL,28,NULL,NULL,NULL),(502,27,31,0,NULL,NULL,NULL,NULL),(503,27,32,0,NULL,NULL,NULL,NULL),(504,27,33,0,NULL,NULL,NULL,NULL),(505,27,21,NULL,NULL,NULL,NULL,''),(506,27,22,NULL,NULL,'',NULL,NULL),(507,27,23,NULL,NULL,'',NULL,NULL),(508,27,1,NULL,NULL,NULL,'VN-VI','Liberty 125CC'),(509,27,2,NULL,NULL,'','VN-VI',NULL),(510,28,1,NULL,NULL,NULL,'EN-US','nồi cơm'),(511,28,20,NULL,0,NULL,NULL,NULL),(512,28,18,NULL,NULL,NULL,NULL,''),(513,28,13,0,NULL,NULL,NULL,NULL),(514,28,24,NULL,0,NULL,NULL,NULL),(515,28,14,0,NULL,NULL,NULL,NULL),(516,28,2,NULL,NULL,'<p>dsdsds</p>\n','EN-US',NULL),(517,28,26,NULL,NULL,'',NULL,NULL),(518,28,11,0,NULL,NULL,NULL,NULL),(519,28,27,0,NULL,NULL,NULL,NULL),(520,28,28,0,NULL,NULL,NULL,NULL),(521,28,29,NULL,0,NULL,NULL,NULL),(522,28,30,NULL,0,NULL,NULL,NULL),(523,28,31,0,NULL,NULL,NULL,NULL),(524,28,32,0,NULL,NULL,NULL,NULL),(525,28,33,0,NULL,NULL,NULL,NULL),(526,28,21,NULL,NULL,NULL,NULL,''),(527,28,22,NULL,NULL,'',NULL,NULL),(528,28,23,NULL,NULL,'',NULL,NULL),(529,29,1,NULL,NULL,NULL,'EN-US','nồi cơm'),(530,29,20,NULL,0,NULL,NULL,NULL),(531,29,18,NULL,NULL,NULL,NULL,''),(532,29,13,1,NULL,NULL,NULL,NULL),(533,29,24,NULL,0,NULL,NULL,NULL),(534,29,14,0,NULL,NULL,NULL,NULL),(535,29,2,NULL,NULL,'<p>nồi cơm điện</p>\n','EN-US',NULL),(536,29,26,NULL,NULL,'<p>nồi cơm điện</p>\n',NULL,NULL),(537,29,11,0,NULL,NULL,NULL,NULL),(538,29,27,0,NULL,NULL,NULL,NULL),(539,29,28,0,NULL,NULL,NULL,NULL),(540,29,29,NULL,0,NULL,NULL,NULL),(541,29,30,NULL,0,NULL,NULL,NULL),(542,29,31,0,NULL,NULL,NULL,NULL),(543,29,32,0,NULL,NULL,NULL,NULL),(544,29,33,0,NULL,NULL,NULL,NULL),(545,29,21,NULL,NULL,NULL,NULL,''),(546,29,22,NULL,NULL,'',NULL,NULL),(547,29,23,NULL,NULL,'',NULL,NULL),(548,30,1,NULL,NULL,NULL,'EN-US','đồ chơi thông minh'),(549,30,20,NULL,0,NULL,NULL,NULL),(550,30,18,NULL,NULL,NULL,NULL,''),(551,30,13,1,NULL,NULL,NULL,NULL),(552,30,24,NULL,0,NULL,NULL,NULL),(553,30,14,0,NULL,NULL,NULL,NULL),(554,30,2,NULL,NULL,'<p>đồ chơi gỗ<br />\n&nbsp;</p>\n','EN-US',NULL),(555,30,26,NULL,NULL,'',NULL,NULL),(556,31,1,NULL,NULL,NULL,'EN-US','Nước rửa chén Sunlight'),(557,31,20,NULL,0,NULL,NULL,NULL),(558,31,18,NULL,NULL,NULL,NULL,''),(559,31,13,1,NULL,NULL,NULL,NULL),(560,31,24,NULL,26,NULL,NULL,NULL),(561,31,14,0.3,NULL,NULL,NULL,NULL),(562,31,2,NULL,NULL,'<p>Nước rửa ch&eacute;n cao cấp</p>\n','EN-US',NULL),(563,31,26,NULL,NULL,'<p>Kh&ocirc;ng ăn da tay</p>\n',NULL,NULL),(564,31,11,0,NULL,NULL,NULL,NULL),(565,31,27,0,NULL,NULL,NULL,NULL),(566,31,28,0,NULL,NULL,NULL,NULL),(567,31,29,NULL,0,NULL,NULL,NULL),(568,31,30,NULL,0,NULL,NULL,NULL),(569,31,31,0,NULL,NULL,NULL,NULL),(570,31,32,0,NULL,NULL,NULL,NULL),(571,31,33,0,NULL,NULL,NULL,NULL),(572,31,21,NULL,NULL,NULL,NULL,''),(573,31,22,NULL,NULL,'',NULL,NULL),(574,31,23,NULL,NULL,'',NULL,NULL),(575,30,11,10000,NULL,NULL,NULL,NULL),(576,30,27,0,NULL,NULL,NULL,NULL),(577,30,28,0,NULL,NULL,NULL,NULL),(578,30,29,NULL,0,NULL,NULL,NULL),(579,30,30,NULL,0,NULL,NULL,NULL),(580,30,31,0,NULL,NULL,NULL,NULL),(581,30,32,0,NULL,NULL,NULL,NULL),(582,30,33,0,NULL,NULL,NULL,NULL),(583,30,21,NULL,NULL,NULL,NULL,''),(584,30,22,NULL,NULL,'',NULL,NULL),(585,30,23,NULL,NULL,'',NULL,NULL),(586,31,1,NULL,NULL,NULL,'VN-VI','Nước rửa chén Sunlight'),(587,31,2,NULL,NULL,'<p>Nước rửa ch&eacute;n cao cấp</p>\n','VN-VI',NULL),(588,32,1,NULL,NULL,NULL,'EN-US','đồ chơi thông minh cho bé'),(589,32,20,NULL,0,NULL,NULL,NULL),(590,32,18,NULL,NULL,NULL,NULL,''),(591,32,13,10,NULL,NULL,NULL,NULL),(592,32,24,NULL,0,NULL,NULL,NULL),(593,32,14,0,NULL,NULL,NULL,NULL),(594,32,2,NULL,NULL,'<p>dsdasds</p>\n','EN-US',NULL),(595,32,26,NULL,NULL,'',NULL,NULL),(596,32,11,2000,NULL,NULL,NULL,NULL),(597,32,27,0,NULL,NULL,NULL,NULL),(598,32,28,0,NULL,NULL,NULL,NULL),(599,32,29,NULL,0,NULL,NULL,NULL),(600,32,30,NULL,0,NULL,NULL,NULL),(601,32,31,0,NULL,NULL,NULL,NULL),(602,32,32,0,NULL,NULL,NULL,NULL),(603,32,33,0,NULL,NULL,NULL,NULL),(604,32,21,NULL,NULL,NULL,NULL,''),(605,32,22,NULL,NULL,'',NULL,NULL),(606,32,23,NULL,NULL,'',NULL,NULL),(607,29,1,NULL,NULL,NULL,'VN-VI','nồi cơm'),(608,29,2,NULL,NULL,'','VN-VI',NULL),(609,33,1,NULL,NULL,NULL,'EN-US','nồi cơm điện'),(610,33,20,NULL,0,NULL,NULL,NULL),(611,33,18,NULL,NULL,NULL,NULL,''),(612,33,13,112,NULL,NULL,NULL,NULL),(613,33,24,NULL,0,NULL,NULL,NULL),(614,33,14,0,NULL,NULL,NULL,NULL),(615,33,2,NULL,NULL,'<p>sdsads</p>\n','EN-US',NULL),(616,33,26,NULL,NULL,'',NULL,NULL),(617,33,1,NULL,NULL,NULL,'VN-VI','Visions VS-332 - Bộ nồi / Thủy tinh cao cấp'),(618,33,2,NULL,NULL,'','VN-VI',NULL),(619,33,11,1000000,NULL,NULL,NULL,NULL),(620,33,27,0,NULL,NULL,NULL,NULL),(621,33,28,0,NULL,NULL,NULL,NULL),(622,33,29,NULL,0,NULL,NULL,NULL),(623,33,30,NULL,0,NULL,NULL,NULL),(624,33,31,0,NULL,NULL,NULL,NULL),(625,33,32,0,NULL,NULL,NULL,NULL),(626,33,33,0,NULL,NULL,NULL,NULL),(627,33,21,NULL,NULL,NULL,NULL,''),(628,33,22,NULL,NULL,'',NULL,NULL),(629,33,23,NULL,NULL,'',NULL,NULL),(630,34,1,NULL,NULL,NULL,'EN-US','Visions VS-332 - Bộ nồi / Thủy tinh cao cấp'),(631,34,20,NULL,0,NULL,NULL,NULL),(632,34,18,NULL,NULL,NULL,NULL,''),(633,34,13,1,NULL,NULL,NULL,NULL),(634,34,24,NULL,0,NULL,NULL,NULL),(635,34,14,0,NULL,NULL,NULL,NULL),(636,34,2,NULL,NULL,'<p>Việc nấu nướng sẽ thuận tiện v&agrave; th&uacute; vị hơn khi bạn sử dụng bộ 3 nồi thủy tinh <strong>Visions VS-332</strong>. Sản phẩm được l&agrave;m bằng gốm thủy tinh cao cấp c&oacute; khả năng chịu được c&aacute;c sốc nhiệt, tiết kiệm năng lượng v&agrave; d&ugrave;ng được trong nướng hoặc l&ograve; vi s&oacute;ng hay ngay cả m&aacute;y rửa ch&eacute;n dĩa. Nồi Visions được sản xuất theo kiểu d&aacute;ng của Ph&aacute;p theo những ti&ecirc;u chuẩn v&ocirc; c&ugrave;ng khắt khe của nh&agrave; sản xuất đảm bảo an to&agrave;n cho người d&ugrave;ng, kh&ocirc;ng c&oacute; c&aacute;c chất g&acirc;y hại cho sức khỏe hay ảnh hưởng đến m&ocirc;i trường. Bộ nồi thủy tinh <strong>Visions VS-332</strong> với 3 nồi dung t&iacute;ch 1.25L, 2.25L v&agrave; 3.25L sẽ l&agrave; trợ thủ đắc lực gi&uacute;p bạn nấu những m&oacute;n ăn ngon v&agrave; gi&agrave;u dinh dưỡng cho cả gia đ&igrave;nh.</p>\n','EN-US',NULL),(637,34,26,NULL,NULL,'<p><strong>Độ bền cao</strong><br />\nNồi Visions chịu được c&aacute;c sốc nhiệt n&ecirc;n kh&ocirc;ng dễ vỡ khi c&oacute; sự thay đổi nhiệt độ đột ngột. Nồi chịu được độ n&oacute;ng l&ecirc;n đến 400 độ C.</p>\n',NULL,NULL),(638,35,1,NULL,NULL,NULL,'EN-US','Visions VS-332 - Bộ nồi / Thủy tinh cao cấp'),(639,35,20,NULL,0,NULL,NULL,NULL),(640,35,18,NULL,NULL,NULL,NULL,''),(641,35,13,10,NULL,NULL,NULL,NULL),(642,35,24,NULL,0,NULL,NULL,NULL),(643,35,14,0,NULL,NULL,NULL,NULL),(644,35,2,NULL,NULL,'<p>Việc nấu nướng sẽ thuận tiện v&agrave; th&uacute; vị hơn khi bạn sử dụng bộ 3 nồi thủy tinh <strong>Visions VS-332</strong>. Sản phẩm được l&agrave;m bằng gốm thủy tinh cao cấp c&oacute; khả năng chịu được c&aacute;c sốc nhiệt, tiết kiệm năng lượng v&agrave; d&ugrave;ng được trong nướng hoặc l&ograve; vi s&oacute;ng hay ngay cả m&aacute;y rửa ch&eacute;n dĩa. Nồi Visions được sản xuất theo kiểu d&aacute;ng của Ph&aacute;p theo những ti&ecirc;u chuẩn v&ocirc; c&ugrave;ng khắt khe của nh&agrave; sản xuất đảm bảo an to&agrave;n cho người d&ugrave;ng, kh&ocirc;ng c&oacute; c&aacute;c chất g&acirc;y hại cho sức khỏe hay ảnh hưởng đến m&ocirc;i trường. Bộ nồi thủy tinh <strong>Visions VS-332</strong> với 3 nồi dung t&iacute;ch 1.25L, 2.25L v&agrave; 3.25L sẽ l&agrave; trợ thủ đắc lực gi&uacute;p bạn nấu những m&oacute;n ăn ngon v&agrave; gi&agrave;u dinh dưỡng cho cả gia đ&igrave;nh.</p>\n','EN-US',NULL),(645,35,26,NULL,NULL,'',NULL,NULL),(646,35,11,0,NULL,NULL,NULL,NULL),(647,35,27,0,NULL,NULL,NULL,NULL),(648,35,28,0,NULL,NULL,NULL,NULL),(649,35,29,NULL,0,NULL,NULL,NULL),(650,35,30,NULL,0,NULL,NULL,NULL),(651,35,31,0,NULL,NULL,NULL,NULL),(652,35,32,0,NULL,NULL,NULL,NULL),(653,35,33,0,NULL,NULL,NULL,NULL),(654,35,21,NULL,NULL,NULL,NULL,''),(655,35,22,NULL,NULL,'',NULL,NULL),(656,35,23,NULL,NULL,'',NULL,NULL),(657,35,1,NULL,NULL,NULL,'VN-VI','sdsadsa'),(658,35,2,NULL,NULL,'<p>sadsadsadsa</p>\n','VN-VI',NULL),(659,36,1,NULL,NULL,NULL,'EN-US','bộ nồi cơm'),(660,36,20,NULL,0,NULL,NULL,NULL),(661,36,18,NULL,NULL,NULL,NULL,''),(662,36,13,10,NULL,NULL,NULL,NULL),(663,36,24,NULL,0,NULL,NULL,NULL),(664,36,14,0,NULL,NULL,NULL,NULL),(665,36,2,NULL,NULL,'<p>bộ nồi cơm điện VN</p>\n','EN-US',NULL),(666,36,26,NULL,NULL,'',NULL,NULL),(667,37,1,NULL,NULL,NULL,'EN-US','bộ nồi cơm'),(668,37,20,NULL,0,NULL,NULL,NULL),(669,37,18,NULL,NULL,NULL,NULL,''),(670,37,13,10,NULL,NULL,NULL,NULL),(671,37,24,NULL,0,NULL,NULL,NULL),(672,37,14,0,NULL,NULL,NULL,NULL),(673,37,2,NULL,NULL,'<p>bộ nồi cơm điện VN</p>\n','EN-US',NULL),(674,37,26,NULL,NULL,'',NULL,NULL),(675,37,11,0,NULL,NULL,NULL,NULL),(676,37,27,0,NULL,NULL,NULL,NULL),(677,37,28,0,NULL,NULL,NULL,NULL),(678,37,29,NULL,0,NULL,NULL,NULL),(679,37,30,NULL,0,NULL,NULL,NULL),(680,37,31,0,NULL,NULL,NULL,NULL),(681,37,32,0,NULL,NULL,NULL,NULL),(682,37,33,0,NULL,NULL,NULL,NULL),(683,37,21,NULL,NULL,NULL,NULL,''),(684,37,22,NULL,NULL,'',NULL,NULL),(685,37,23,NULL,NULL,'',NULL,NULL),(686,38,1,NULL,NULL,NULL,'EN-US','MacCoffee Vietnam Street Coffee'),(687,38,20,NULL,0,NULL,NULL,NULL),(688,38,18,NULL,NULL,NULL,NULL,''),(689,38,13,1,NULL,NULL,NULL,NULL),(690,38,24,NULL,26,NULL,NULL,NULL),(691,38,14,100,NULL,NULL,NULL,NULL),(692,38,2,NULL,NULL,'<p>C&agrave; ph&ecirc; thuần cho người Việt</p>\n','EN-US',NULL),(693,38,26,NULL,NULL,'',NULL,NULL),(694,38,11,65000,NULL,NULL,NULL,NULL),(695,38,27,30,NULL,NULL,NULL,NULL),(696,38,28,9999,NULL,NULL,NULL,NULL),(697,38,29,NULL,28,NULL,NULL,NULL),(698,38,30,NULL,28,NULL,NULL,NULL),(699,38,31,0,NULL,NULL,NULL,NULL),(700,38,32,0,NULL,NULL,NULL,NULL),(701,38,33,0,NULL,NULL,NULL,NULL),(702,38,21,NULL,NULL,NULL,NULL,''),(703,38,22,NULL,NULL,'',NULL,NULL),(704,38,23,NULL,NULL,'',NULL,NULL),(705,38,1,NULL,NULL,NULL,'VN-VI','MacCoffee Cà Phê Phố'),(706,38,2,NULL,NULL,'','VN-VI',NULL),(707,39,1,NULL,NULL,NULL,'EN-US','ANLT'),(708,39,20,NULL,0,NULL,NULL,NULL),(709,39,18,NULL,NULL,NULL,NULL,''),(710,39,13,0,NULL,NULL,NULL,NULL),(711,39,24,NULL,26,NULL,NULL,NULL),(712,39,14,1,NULL,NULL,NULL,NULL),(713,39,2,NULL,NULL,'<p>sdasdasd</p>\n','EN-US',NULL),(714,39,26,NULL,NULL,'',NULL,NULL),(715,39,11,0,NULL,NULL,NULL,NULL),(716,39,27,0,NULL,NULL,NULL,NULL),(717,39,28,0,NULL,NULL,NULL,NULL),(718,39,29,NULL,0,NULL,NULL,NULL),(719,39,30,NULL,0,NULL,NULL,NULL),(720,39,31,0,NULL,NULL,NULL,NULL),(721,39,32,0,NULL,NULL,NULL,NULL),(722,39,33,0,NULL,NULL,NULL,NULL),(723,39,21,NULL,NULL,NULL,NULL,''),(724,39,22,NULL,NULL,'',NULL,NULL),(725,39,23,NULL,NULL,'',NULL,NULL),(726,39,1,NULL,NULL,NULL,'VN-VI','ANLTG'),(727,39,2,NULL,NULL,'','VN-VI',NULL),(728,40,1,NULL,NULL,NULL,'EN-US','zxczxczxczxczxczxc'),(729,40,20,NULL,0,NULL,NULL,NULL),(730,40,18,NULL,NULL,NULL,NULL,''),(731,40,13,0,NULL,NULL,NULL,NULL),(732,40,24,NULL,0,NULL,NULL,NULL),(733,40,14,0,NULL,NULL,NULL,NULL),(734,40,2,NULL,NULL,'','EN-US',NULL),(735,40,26,NULL,NULL,'',NULL,NULL),(736,40,1,NULL,NULL,NULL,'VN-VI',''),(737,40,2,NULL,NULL,'','VN-VI',NULL),(738,40,11,0,NULL,NULL,NULL,NULL),(739,40,27,0,NULL,NULL,NULL,NULL),(740,40,28,0,NULL,NULL,NULL,NULL),(741,40,29,NULL,0,NULL,NULL,NULL),(742,40,30,NULL,0,NULL,NULL,NULL),(743,40,31,0,NULL,NULL,NULL,NULL),(744,40,32,0,NULL,NULL,NULL,NULL),(745,40,33,0,NULL,NULL,NULL,NULL),(746,40,21,NULL,NULL,NULL,NULL,''),(747,40,22,NULL,NULL,'',NULL,NULL),(748,40,23,NULL,NULL,'',NULL,NULL),(749,41,1,NULL,NULL,NULL,'EN-US','zxczxczxczxczxczxc'),(750,41,20,NULL,0,NULL,NULL,NULL),(751,41,18,NULL,NULL,NULL,NULL,''),(752,41,13,0,NULL,NULL,NULL,NULL),(753,41,24,NULL,0,NULL,NULL,NULL),(754,41,14,0,NULL,NULL,NULL,NULL),(755,41,2,NULL,NULL,'','EN-US',NULL),(756,41,26,NULL,NULL,'',NULL,NULL),(757,41,1,NULL,NULL,NULL,'VN-VI',''),(758,41,2,NULL,NULL,'','VN-VI',NULL),(759,41,11,0,NULL,NULL,NULL,NULL),(760,41,27,0,NULL,NULL,NULL,NULL),(761,41,28,0,NULL,NULL,NULL,NULL),(762,41,29,NULL,0,NULL,NULL,NULL),(763,41,30,NULL,0,NULL,NULL,NULL),(764,41,31,0,NULL,NULL,NULL,NULL),(765,41,32,0,NULL,NULL,NULL,NULL),(766,41,33,0,NULL,NULL,NULL,NULL),(767,41,21,NULL,NULL,NULL,NULL,''),(768,41,22,NULL,NULL,'',NULL,NULL),(769,41,23,NULL,NULL,'',NULL,NULL),(780,42,1,NULL,NULL,NULL,'EN-US','nồi cơm điện'),(781,42,20,NULL,0,NULL,NULL,NULL),(782,42,18,NULL,NULL,NULL,NULL,''),(783,42,13,190,NULL,NULL,NULL,NULL),(784,42,24,NULL,26,NULL,NULL,NULL),(785,42,14,1,NULL,NULL,NULL,NULL),(786,42,2,NULL,NULL,'<p>để nấu cơm</p>\n','EN-US',NULL),(787,42,26,NULL,NULL,'',NULL,NULL),(788,42,11,1000000,NULL,NULL,NULL,NULL),(789,42,27,7,NULL,NULL,NULL,NULL),(790,42,28,15,NULL,NULL,NULL,NULL),(791,42,29,NULL,28,NULL,NULL,NULL),(792,42,30,NULL,28,NULL,NULL,NULL),(793,42,31,0,NULL,NULL,NULL,NULL),(794,42,32,0,NULL,NULL,NULL,NULL),(795,42,33,0,NULL,NULL,NULL,NULL),(796,42,21,NULL,NULL,NULL,NULL,''),(797,42,22,NULL,NULL,'',NULL,NULL),(798,42,23,NULL,NULL,'',NULL,NULL),(799,43,1,NULL,NULL,NULL,'EN-US','ABC'),(800,43,20,NULL,24,NULL,NULL,NULL),(801,43,18,NULL,NULL,NULL,NULL,'aaa'),(802,43,13,10,NULL,NULL,NULL,NULL),(803,43,24,NULL,26,NULL,NULL,NULL),(804,43,14,111,NULL,NULL,NULL,NULL),(805,43,2,NULL,NULL,'<p>sdasd</p>\n','EN-US',NULL),(806,43,26,NULL,NULL,'<p>&aacute;dasd</p>\n',NULL,NULL),(807,42,1,NULL,NULL,NULL,'VN-VI','Nồi Cơm Điện'),(808,42,2,NULL,NULL,'','VN-VI',NULL),(809,44,1,NULL,NULL,NULL,'VN-VI','def'),(810,44,20,NULL,24,NULL,NULL,NULL),(811,44,18,NULL,NULL,NULL,NULL,'qwewqe'),(812,44,2,NULL,NULL,'<p>sdasda</p>','VN-VI',NULL),(813,44,11,60000,NULL,NULL,NULL,NULL),(814,44,21,NULL,NULL,NULL,NULL,'ssa'),(815,44,22,NULL,NULL,'das',NULL,NULL),(816,44,23,NULL,NULL,'dasd',NULL,NULL),(824,45,1,NULL,NULL,NULL,'VN-VI','def'),(825,45,20,NULL,24,NULL,NULL,NULL),(826,45,18,NULL,NULL,NULL,NULL,'qwewqe'),(827,45,2,NULL,NULL,'<p>sdasda</p>','VN-VI',NULL),(828,45,11,60000,NULL,NULL,NULL,NULL),(829,45,21,NULL,NULL,NULL,NULL,'ssa'),(830,45,22,NULL,NULL,'das',NULL,NULL),(831,45,23,NULL,NULL,'dasd',NULL,NULL),(839,46,1,NULL,NULL,NULL,'VN-VI','def'),(840,46,20,NULL,24,NULL,NULL,NULL),(841,46,18,NULL,NULL,NULL,NULL,'qwewqe'),(842,46,2,NULL,NULL,'<p>sdasda</p>','VN-VI',NULL),(843,46,11,60000,NULL,NULL,NULL,NULL),(844,46,21,NULL,NULL,NULL,NULL,'ssa'),(845,46,22,NULL,NULL,'das',NULL,NULL),(846,46,23,NULL,NULL,'dasd',NULL,NULL),(854,47,1,NULL,NULL,NULL,'VN-VI','def'),(855,47,20,NULL,24,NULL,NULL,NULL),(856,47,18,NULL,NULL,NULL,NULL,'qwewqe'),(857,47,2,NULL,NULL,'<p>sdasda</p>','VN-VI',NULL),(858,47,11,60000,NULL,NULL,NULL,NULL),(859,47,21,NULL,NULL,NULL,NULL,'ssa'),(860,47,22,NULL,NULL,'das',NULL,NULL),(861,47,23,NULL,NULL,'dasd',NULL,NULL),(869,48,1,NULL,NULL,NULL,'VN-VI','def'),(870,48,20,NULL,24,NULL,NULL,NULL),(871,48,18,NULL,NULL,NULL,NULL,'qwewqe'),(872,48,2,NULL,NULL,'<p>sdasda</p>','VN-VI',NULL),(873,48,11,60000,NULL,NULL,NULL,NULL),(874,48,21,NULL,NULL,NULL,NULL,'ssa'),(875,48,22,NULL,NULL,'das',NULL,NULL),(876,48,23,NULL,NULL,'dasd',NULL,NULL),(884,49,1,NULL,NULL,NULL,'VN-VI','def'),(885,49,20,NULL,24,NULL,NULL,NULL),(886,49,18,NULL,NULL,NULL,NULL,'qwewqe'),(887,49,2,NULL,NULL,'<p>sdasda</p>','VN-VI',NULL),(888,49,11,60000,NULL,NULL,NULL,NULL),(889,49,21,NULL,NULL,NULL,NULL,'ssa'),(890,49,22,NULL,NULL,'das',NULL,NULL),(891,49,23,NULL,NULL,'dasd',NULL,NULL),(899,50,1,NULL,NULL,NULL,'VN-VI','def'),(900,50,20,NULL,24,NULL,NULL,NULL),(901,50,18,NULL,NULL,NULL,NULL,'qwewqe'),(902,50,2,NULL,NULL,'<p>sdasda</p>','VN-VI',NULL),(903,50,11,60000,NULL,NULL,NULL,NULL),(904,50,21,NULL,NULL,NULL,NULL,'ssa'),(905,50,22,NULL,NULL,'das',NULL,NULL),(906,50,23,NULL,NULL,'dasd',NULL,NULL),(914,51,1,NULL,NULL,NULL,'VN-VI','def'),(915,51,20,NULL,24,NULL,NULL,NULL),(916,51,18,NULL,NULL,NULL,NULL,'qwewqe'),(917,51,2,NULL,NULL,'<p>sdasda</p>','VN-VI',NULL),(918,51,11,60000,NULL,NULL,NULL,NULL),(919,51,21,NULL,NULL,NULL,NULL,'ssa'),(920,51,22,NULL,NULL,'das',NULL,NULL),(921,51,23,NULL,NULL,'dasd',NULL,NULL),(929,52,1,NULL,NULL,NULL,'VN-VI','def'),(930,52,20,NULL,24,NULL,NULL,NULL),(931,52,18,NULL,NULL,NULL,NULL,'qwewqe'),(932,52,2,NULL,NULL,'<p>sdasda</p>','VN-VI',NULL),(933,52,11,60000,NULL,NULL,NULL,NULL),(934,52,21,NULL,NULL,NULL,NULL,'ssa'),(935,52,22,NULL,NULL,'das',NULL,NULL),(936,52,23,NULL,NULL,'dasd',NULL,NULL),(944,53,1,NULL,NULL,NULL,'VN-VI','def'),(945,53,20,NULL,24,NULL,NULL,NULL),(946,53,18,NULL,NULL,NULL,NULL,'qwewqe'),(947,53,2,NULL,NULL,'<p>sdasda</p>','VN-VI',NULL),(948,53,11,60000,NULL,NULL,NULL,NULL),(949,53,21,NULL,NULL,NULL,NULL,'ssa'),(950,53,22,NULL,NULL,'das',NULL,NULL),(951,53,23,NULL,NULL,'dasd',NULL,NULL),(959,54,1,NULL,NULL,NULL,'VN-VI','def'),(960,54,20,NULL,24,NULL,NULL,NULL),(961,54,18,NULL,NULL,NULL,NULL,'qwewqe'),(962,54,2,NULL,NULL,'<p>sdasda</p>','VN-VI',NULL),(963,54,11,60000,NULL,NULL,NULL,NULL),(964,54,21,NULL,NULL,NULL,NULL,'ssa'),(965,54,22,NULL,NULL,'das',NULL,NULL),(966,54,23,NULL,NULL,'dasd',NULL,NULL),(974,55,1,NULL,NULL,NULL,'VN-VI','def'),(975,55,20,NULL,24,NULL,NULL,NULL),(976,55,18,NULL,NULL,NULL,NULL,'qwewqe'),(977,55,2,NULL,NULL,'<p>sdasda</p>','VN-VI',NULL),(978,55,11,60000,NULL,NULL,NULL,NULL),(979,55,21,NULL,NULL,NULL,NULL,'ssa'),(980,55,22,NULL,NULL,'das',NULL,NULL),(981,55,23,NULL,NULL,'dasd',NULL,NULL),(989,56,1,NULL,NULL,NULL,'VN-VI','def'),(990,56,20,NULL,24,NULL,NULL,NULL),(991,56,18,NULL,NULL,NULL,NULL,'qwewqe'),(992,56,2,NULL,NULL,'<p>sdasda</p>','VN-VI',NULL),(993,56,11,60000,NULL,NULL,NULL,NULL),(994,56,21,NULL,NULL,NULL,NULL,'ssa'),(995,56,22,NULL,NULL,'das',NULL,NULL),(996,56,23,NULL,NULL,'dasd',NULL,NULL),(1004,57,1,NULL,NULL,NULL,'VN-VI','def'),(1005,57,20,NULL,24,NULL,NULL,NULL),(1006,57,18,NULL,NULL,NULL,NULL,'qwewqe'),(1007,57,2,NULL,NULL,'<p>sdasda</p>','VN-VI',NULL),(1008,57,11,60000,NULL,NULL,NULL,NULL),(1009,57,21,NULL,NULL,NULL,NULL,'ssa'),(1010,57,22,NULL,NULL,'das',NULL,NULL),(1011,57,23,NULL,NULL,'dasd',NULL,NULL),(1019,58,1,NULL,NULL,NULL,'VN-VI','def'),(1020,58,20,NULL,24,NULL,NULL,NULL),(1021,58,18,NULL,NULL,NULL,NULL,'qwewqe'),(1022,58,2,NULL,NULL,'<p>sdasda</p>','VN-VI',NULL),(1023,58,11,60000,NULL,NULL,NULL,NULL),(1024,58,21,NULL,NULL,NULL,NULL,'ssa'),(1025,58,22,NULL,NULL,'das',NULL,NULL),(1026,58,23,NULL,NULL,'dasd',NULL,NULL),(1034,59,1,NULL,NULL,NULL,'VN-VI','def'),(1035,59,20,NULL,24,NULL,NULL,NULL),(1036,59,18,NULL,NULL,NULL,NULL,'qwewqe'),(1037,59,2,NULL,NULL,'<p>sdasda</p>','VN-VI',NULL),(1038,59,11,60000,NULL,NULL,NULL,NULL),(1039,59,21,NULL,NULL,NULL,NULL,'ssa'),(1040,59,22,NULL,NULL,'das',NULL,NULL),(1041,59,23,NULL,NULL,'dasd',NULL,NULL),(1049,60,1,NULL,NULL,NULL,'VN-VI','def'),(1050,60,20,NULL,24,NULL,NULL,NULL),(1051,60,18,NULL,NULL,NULL,NULL,'qwewqe'),(1052,60,2,NULL,NULL,'<p>sdasda</p>','VN-VI',NULL),(1053,60,11,60000,NULL,NULL,NULL,NULL),(1054,60,21,NULL,NULL,NULL,NULL,'ssa'),(1055,60,22,NULL,NULL,'das',NULL,NULL),(1056,60,23,NULL,NULL,'dasd',NULL,NULL),(1064,61,1,NULL,NULL,NULL,'VN-VI','def'),(1065,61,20,NULL,24,NULL,NULL,NULL),(1066,61,18,NULL,NULL,NULL,NULL,'qwewqe'),(1067,61,2,NULL,NULL,'<p>sdasda</p>','VN-VI',NULL),(1068,61,11,60000,NULL,NULL,NULL,NULL),(1069,61,21,NULL,NULL,NULL,NULL,'ssa'),(1070,61,22,NULL,NULL,'das',NULL,NULL),(1071,61,23,NULL,NULL,'dasd',NULL,NULL),(1079,62,1,NULL,NULL,NULL,'VN-VI','def'),(1080,62,20,NULL,24,NULL,NULL,NULL),(1081,62,18,NULL,NULL,NULL,NULL,'qwewqe'),(1082,62,2,NULL,NULL,'<p>sdasda</p>','VN-VI',NULL),(1083,62,11,60000,NULL,NULL,NULL,NULL),(1084,62,21,NULL,NULL,NULL,NULL,'ssa'),(1085,62,22,NULL,NULL,'das',NULL,NULL),(1086,62,23,NULL,NULL,'dasd',NULL,NULL),(1094,63,1,NULL,NULL,NULL,'VN-VI','def'),(1095,63,20,NULL,24,NULL,NULL,NULL),(1096,63,18,NULL,NULL,NULL,NULL,'qwewqe'),(1097,63,2,NULL,NULL,'<p>sdasda</p>','VN-VI',NULL),(1098,63,11,60000,NULL,NULL,NULL,NULL),(1099,63,21,NULL,NULL,NULL,NULL,'ssa'),(1100,63,22,NULL,NULL,'das',NULL,NULL),(1101,63,23,NULL,NULL,'dasd',NULL,NULL),(1109,64,1,NULL,NULL,NULL,'VN-VI','def'),(1110,64,20,NULL,24,NULL,NULL,NULL),(1111,64,18,NULL,NULL,NULL,NULL,'qwewqe'),(1112,64,2,NULL,NULL,'<p>sdasda</p>','VN-VI',NULL),(1113,64,11,60000,NULL,NULL,NULL,NULL),(1114,64,21,NULL,NULL,NULL,NULL,'ssa'),(1115,64,22,NULL,NULL,'das',NULL,NULL),(1116,64,23,NULL,NULL,'dasd',NULL,NULL),(1124,65,1,NULL,NULL,NULL,'VN-VI','def'),(1125,65,20,NULL,24,NULL,NULL,NULL),(1126,65,18,NULL,NULL,NULL,NULL,'qwewqe'),(1127,65,2,NULL,NULL,'<p>sdasda</p>','VN-VI',NULL),(1128,65,11,60000,NULL,NULL,NULL,NULL),(1129,65,21,NULL,NULL,NULL,NULL,'ssa'),(1130,65,22,NULL,NULL,'das',NULL,NULL),(1131,65,23,NULL,NULL,'dasd',NULL,NULL),(1139,66,1,NULL,NULL,NULL,'VN-VI','def'),(1140,66,20,NULL,24,NULL,NULL,NULL),(1141,66,18,NULL,NULL,NULL,NULL,'qwewqe'),(1142,66,2,NULL,NULL,'<p>sdasda</p>','VN-VI',NULL),(1143,66,11,60000,NULL,NULL,NULL,NULL),(1144,66,21,NULL,NULL,NULL,NULL,'ssa'),(1145,66,22,NULL,NULL,'das',NULL,NULL),(1146,66,23,NULL,NULL,'dasd',NULL,NULL),(1154,67,1,NULL,NULL,NULL,'VN-VI','def'),(1155,67,20,NULL,24,NULL,NULL,NULL),(1156,67,18,NULL,NULL,NULL,NULL,'qwewqe'),(1157,67,2,NULL,NULL,'<p>sdasda</p>','VN-VI',NULL),(1158,67,11,60000,NULL,NULL,NULL,NULL),(1159,67,21,NULL,NULL,NULL,NULL,'ssa'),(1160,67,22,NULL,NULL,'das',NULL,NULL),(1161,67,23,NULL,NULL,'dasd',NULL,NULL),(1169,68,1,NULL,NULL,NULL,'VN-VI','def'),(1170,68,20,NULL,24,NULL,NULL,NULL),(1171,68,18,NULL,NULL,NULL,NULL,'qwewqe'),(1172,68,2,NULL,NULL,'<p>sdasda</p>','VN-VI',NULL),(1173,68,11,60000,NULL,NULL,NULL,NULL),(1174,68,21,NULL,NULL,NULL,NULL,'ssa'),(1175,68,22,NULL,NULL,'das',NULL,NULL),(1176,68,23,NULL,NULL,'dasd',NULL,NULL),(1184,69,1,NULL,NULL,NULL,'VN-VI','def'),(1185,69,20,NULL,24,NULL,NULL,NULL),(1186,69,18,NULL,NULL,NULL,NULL,'qwewqe'),(1187,69,2,NULL,NULL,'<p>sdasda</p>','VN-VI',NULL),(1188,69,11,60000,NULL,NULL,NULL,NULL),(1189,69,21,NULL,NULL,NULL,NULL,'ssa'),(1190,69,22,NULL,NULL,'das',NULL,NULL),(1191,69,23,NULL,NULL,'dasd',NULL,NULL),(1199,70,1,NULL,NULL,NULL,'VN-VI','def'),(1200,70,20,NULL,24,NULL,NULL,NULL),(1201,70,18,NULL,NULL,NULL,NULL,'qwewqe'),(1202,70,2,NULL,NULL,'<p>sdasda</p>','VN-VI',NULL),(1203,70,11,60000,NULL,NULL,NULL,NULL),(1204,70,21,NULL,NULL,NULL,NULL,'ssa'),(1205,70,22,NULL,NULL,'das',NULL,NULL),(1206,70,23,NULL,NULL,'dasd',NULL,NULL),(1214,71,1,NULL,NULL,NULL,'VN-VI','def'),(1215,71,20,NULL,24,NULL,NULL,NULL),(1216,71,18,NULL,NULL,NULL,NULL,'qwewqe'),(1217,71,2,NULL,NULL,'<p>sdasda</p>','VN-VI',NULL),(1218,71,11,60000,NULL,NULL,NULL,NULL),(1219,71,21,NULL,NULL,NULL,NULL,'ssa'),(1220,71,22,NULL,NULL,'das',NULL,NULL),(1221,71,23,NULL,NULL,'dasd',NULL,NULL),(1229,72,1,NULL,NULL,NULL,'VN-VI','def'),(1230,72,20,NULL,24,NULL,NULL,NULL),(1231,72,18,NULL,NULL,NULL,NULL,'qwewqe'),(1232,72,2,NULL,NULL,'<p>sdasda</p>','VN-VI',NULL),(1233,72,11,60000,NULL,NULL,NULL,NULL),(1234,72,21,NULL,NULL,NULL,NULL,'ssa'),(1235,72,22,NULL,NULL,'das',NULL,NULL),(1236,72,23,NULL,NULL,'dasd',NULL,NULL),(1244,73,1,NULL,NULL,NULL,'VN-VI','def'),(1245,73,20,NULL,24,NULL,NULL,NULL),(1246,73,18,NULL,NULL,NULL,NULL,'qwewqe'),(1247,73,2,NULL,NULL,'<p>sdasda</p>','VN-VI',NULL),(1248,73,11,60000,NULL,NULL,NULL,NULL),(1249,73,21,NULL,NULL,NULL,NULL,'ssa'),(1250,73,22,NULL,NULL,'das',NULL,NULL),(1251,73,23,NULL,NULL,'dasd',NULL,NULL),(1259,74,1,NULL,NULL,NULL,'VN-VI','def'),(1260,74,20,NULL,24,NULL,NULL,NULL),(1261,74,18,NULL,NULL,NULL,NULL,'qwewqe'),(1262,74,2,NULL,NULL,'<p>sdasda</p>','VN-VI',NULL),(1263,74,11,60000,NULL,NULL,NULL,NULL),(1264,74,21,NULL,NULL,NULL,NULL,'ssa'),(1265,74,22,NULL,NULL,'das',NULL,NULL),(1266,74,23,NULL,NULL,'dasd',NULL,NULL),(1274,75,1,NULL,NULL,NULL,'VN-VI','def'),(1275,75,20,NULL,24,NULL,NULL,NULL),(1276,75,18,NULL,NULL,NULL,NULL,'qwewqe'),(1277,75,2,NULL,NULL,'<p>sdasda</p>','VN-VI',NULL),(1278,75,11,60000,NULL,NULL,NULL,NULL),(1279,75,21,NULL,NULL,NULL,NULL,'ssa'),(1280,75,22,NULL,NULL,'das',NULL,NULL),(1281,75,23,NULL,NULL,'dasd',NULL,NULL),(1289,76,1,NULL,NULL,NULL,'VN-VI','def'),(1290,76,20,NULL,24,NULL,NULL,NULL),(1291,76,18,NULL,NULL,NULL,NULL,'qwewqe'),(1292,76,2,NULL,NULL,'<p>sdasda</p>','VN-VI',NULL),(1293,76,11,60000,NULL,NULL,NULL,NULL),(1294,76,21,NULL,NULL,NULL,NULL,'ssa'),(1295,76,22,NULL,NULL,'das',NULL,NULL),(1296,76,23,NULL,NULL,'dasd',NULL,NULL),(1304,77,1,NULL,NULL,NULL,'VN-VI','def'),(1305,77,20,NULL,24,NULL,NULL,NULL),(1306,77,18,NULL,NULL,NULL,NULL,'qwewqe'),(1307,77,2,NULL,NULL,'<p>sdasda</p>','VN-VI',NULL),(1308,77,11,60000,NULL,NULL,NULL,NULL),(1309,77,21,NULL,NULL,NULL,NULL,'ssa'),(1310,77,22,NULL,NULL,'das',NULL,NULL),(1311,77,23,NULL,NULL,'dasd',NULL,NULL),(1319,78,1,NULL,NULL,NULL,'VN-VI','def'),(1320,78,20,NULL,24,NULL,NULL,NULL),(1321,78,18,NULL,NULL,NULL,NULL,'qwewqe'),(1322,78,2,NULL,NULL,'<p>sdasda</p>','VN-VI',NULL),(1323,78,11,60000,NULL,NULL,NULL,NULL),(1324,78,21,NULL,NULL,NULL,NULL,'ssa'),(1325,78,22,NULL,NULL,'das',NULL,NULL),(1326,78,23,NULL,NULL,'dasd',NULL,NULL),(1334,79,1,NULL,NULL,NULL,'VN-VI','def'),(1335,79,20,NULL,24,NULL,NULL,NULL),(1336,79,18,NULL,NULL,NULL,NULL,'qwewqe'),(1337,79,2,NULL,NULL,'<p>sdasda</p>','VN-VI',NULL),(1338,79,11,60000,NULL,NULL,NULL,NULL),(1339,79,21,NULL,NULL,NULL,NULL,'ssa'),(1340,79,22,NULL,NULL,'das',NULL,NULL),(1341,79,23,NULL,NULL,'dasd',NULL,NULL),(1349,80,1,NULL,NULL,NULL,'VN-VI','def'),(1350,80,20,NULL,24,NULL,NULL,NULL),(1351,80,18,NULL,NULL,NULL,NULL,'qwewqe'),(1352,80,2,NULL,NULL,'<p>sdasda</p>','VN-VI',NULL),(1353,80,11,60000,NULL,NULL,NULL,NULL),(1354,80,21,NULL,NULL,NULL,NULL,'ssa'),(1355,80,22,NULL,NULL,'das',NULL,NULL),(1356,80,23,NULL,NULL,'dasd',NULL,NULL),(1364,81,1,NULL,NULL,NULL,'VN-VI','def'),(1365,81,20,NULL,24,NULL,NULL,NULL),(1366,81,18,NULL,NULL,NULL,NULL,'qwewqe'),(1367,81,2,NULL,NULL,'<p>sdasda</p>','VN-VI',NULL),(1368,81,11,60000,NULL,NULL,NULL,NULL),(1369,81,21,NULL,NULL,NULL,NULL,'ssa'),(1370,81,22,NULL,NULL,'das',NULL,NULL),(1371,81,23,NULL,NULL,'dasd',NULL,NULL),(1379,82,1,NULL,NULL,NULL,'VN-VI','def'),(1380,82,20,NULL,24,NULL,NULL,NULL),(1381,82,18,NULL,NULL,NULL,NULL,'qwewqe'),(1382,82,2,NULL,NULL,'<p>sdasda</p>','VN-VI',NULL),(1383,82,11,60000,NULL,NULL,NULL,NULL),(1384,82,21,NULL,NULL,NULL,NULL,'ssa'),(1385,82,22,NULL,NULL,'das',NULL,NULL),(1386,82,23,NULL,NULL,'dasd',NULL,NULL),(1394,83,1,NULL,NULL,NULL,'VN-VI','def'),(1395,83,20,NULL,24,NULL,NULL,NULL),(1396,83,18,NULL,NULL,NULL,NULL,'qwewqe'),(1397,83,2,NULL,NULL,'<p>sdasda</p>','VN-VI',NULL),(1398,83,11,60000,NULL,NULL,NULL,NULL),(1399,83,21,NULL,NULL,NULL,NULL,'ssa'),(1400,83,22,NULL,NULL,'das',NULL,NULL),(1401,83,23,NULL,NULL,'dasd',NULL,NULL),(1409,84,1,NULL,NULL,NULL,'VN-VI','def'),(1410,84,20,NULL,24,NULL,NULL,NULL),(1411,84,18,NULL,NULL,NULL,NULL,'qwewqe'),(1412,84,2,NULL,NULL,'<p>sdasda</p>','VN-VI',NULL),(1413,84,11,60000,NULL,NULL,NULL,NULL),(1414,84,21,NULL,NULL,NULL,NULL,'ssa'),(1415,84,22,NULL,NULL,'das',NULL,NULL),(1416,84,23,NULL,NULL,'dasd',NULL,NULL),(1424,85,1,NULL,NULL,NULL,'VN-VI','def'),(1425,85,20,NULL,24,NULL,NULL,NULL),(1426,85,18,NULL,NULL,NULL,NULL,'qwewqe'),(1427,85,2,NULL,NULL,'<p>sdasda</p>','VN-VI',NULL),(1428,85,11,60000,NULL,NULL,NULL,NULL),(1429,85,21,NULL,NULL,NULL,NULL,'ssa'),(1430,85,22,NULL,NULL,'das',NULL,NULL),(1431,85,23,NULL,NULL,'dasd',NULL,NULL),(1439,86,1,NULL,NULL,NULL,'VN-VI','def'),(1440,86,20,NULL,24,NULL,NULL,NULL),(1441,86,18,NULL,NULL,NULL,NULL,'qwewqe'),(1442,86,2,NULL,NULL,'<p>sdasda</p>','VN-VI',NULL),(1443,86,11,60000,NULL,NULL,NULL,NULL),(1444,86,21,NULL,NULL,NULL,NULL,'ssa'),(1445,86,22,NULL,NULL,'das',NULL,NULL),(1446,86,23,NULL,NULL,'dasd',NULL,NULL),(1454,87,1,NULL,NULL,NULL,'VN-VI','def'),(1455,87,20,NULL,24,NULL,NULL,NULL),(1456,87,18,NULL,NULL,NULL,NULL,'qwewqe'),(1457,87,2,NULL,NULL,'<p>sdasda</p>','VN-VI',NULL),(1458,87,11,60000,NULL,NULL,NULL,NULL),(1459,87,21,NULL,NULL,NULL,NULL,'ssa'),(1460,87,22,NULL,NULL,'das',NULL,NULL),(1461,87,23,NULL,NULL,'dasd',NULL,NULL),(1469,88,1,NULL,NULL,NULL,'VN-VI','def'),(1470,88,20,NULL,24,NULL,NULL,NULL),(1471,88,18,NULL,NULL,NULL,NULL,'qwewqe'),(1472,88,2,NULL,NULL,'<p>sdasda</p>','VN-VI',NULL),(1473,88,11,60000,NULL,NULL,NULL,NULL),(1474,88,21,NULL,NULL,NULL,NULL,'ssa'),(1475,88,22,NULL,NULL,'das',NULL,NULL),(1476,88,23,NULL,NULL,'dasd',NULL,NULL),(1484,89,1,NULL,NULL,NULL,'VN-VI','def'),(1485,89,20,NULL,24,NULL,NULL,NULL),(1486,89,18,NULL,NULL,NULL,NULL,'qwewqe'),(1487,89,2,NULL,NULL,'<p>sdasda</p>','VN-VI',NULL),(1488,89,11,60000,NULL,NULL,NULL,NULL),(1489,89,21,NULL,NULL,NULL,NULL,'ssa'),(1490,89,22,NULL,NULL,'das',NULL,NULL),(1491,89,23,NULL,NULL,'dasd',NULL,NULL),(1499,90,1,NULL,NULL,NULL,'VN-VI','def'),(1500,90,20,NULL,24,NULL,NULL,NULL),(1501,90,18,NULL,NULL,NULL,NULL,'qwewqe'),(1502,90,2,NULL,NULL,'<p>sdasda</p>','VN-VI',NULL),(1503,90,11,60000,NULL,NULL,NULL,NULL),(1504,90,21,NULL,NULL,NULL,NULL,'ssa'),(1505,90,22,NULL,NULL,'das',NULL,NULL),(1506,90,23,NULL,NULL,'dasd',NULL,NULL),(1514,91,1,NULL,NULL,NULL,'VN-VI','def'),(1515,91,20,NULL,24,NULL,NULL,NULL),(1516,91,18,NULL,NULL,NULL,NULL,'qwewqe'),(1517,91,2,NULL,NULL,'<p>sdasda</p>','VN-VI',NULL),(1518,91,11,60000,NULL,NULL,NULL,NULL),(1519,91,21,NULL,NULL,NULL,NULL,'ssa'),(1520,91,22,NULL,NULL,'das',NULL,NULL),(1521,91,23,NULL,NULL,'dasd',NULL,NULL),(1529,92,1,NULL,NULL,NULL,'VN-VI','def'),(1530,92,20,NULL,24,NULL,NULL,NULL),(1531,92,18,NULL,NULL,NULL,NULL,'qwewqe'),(1532,92,2,NULL,NULL,'<p>sdasda</p>','VN-VI',NULL),(1533,92,11,60000,NULL,NULL,NULL,NULL),(1534,92,21,NULL,NULL,NULL,NULL,'ssa'),(1535,92,22,NULL,NULL,'das',NULL,NULL),(1536,92,23,NULL,NULL,'dasd',NULL,NULL),(1544,93,1,NULL,NULL,NULL,'VN-VI','def'),(1545,93,20,NULL,24,NULL,NULL,NULL),(1546,93,18,NULL,NULL,NULL,NULL,'qwewqe'),(1547,93,2,NULL,NULL,'<p>sdasda</p>','VN-VI',NULL),(1548,93,11,60000,NULL,NULL,NULL,NULL),(1549,93,21,NULL,NULL,NULL,NULL,'ssa'),(1550,93,22,NULL,NULL,'das',NULL,NULL),(1551,93,23,NULL,NULL,'dasd',NULL,NULL),(1559,94,1,NULL,NULL,NULL,'VN-VI','def'),(1560,94,20,NULL,24,NULL,NULL,NULL),(1561,94,18,NULL,NULL,NULL,NULL,'qwewqe'),(1562,94,2,NULL,NULL,'<p>sdasda</p>','VN-VI',NULL),(1563,94,11,60000,NULL,NULL,NULL,NULL),(1564,94,21,NULL,NULL,NULL,NULL,'ssa'),(1565,94,22,NULL,NULL,'das',NULL,NULL),(1566,94,23,NULL,NULL,'dasd',NULL,NULL),(1574,95,1,NULL,NULL,NULL,'VN-VI','def'),(1575,95,20,NULL,24,NULL,NULL,NULL),(1576,95,18,NULL,NULL,NULL,NULL,'qwewqe'),(1577,95,2,NULL,NULL,'<p>sdasda</p>','VN-VI',NULL),(1578,95,11,60000,NULL,NULL,NULL,NULL),(1579,95,21,NULL,NULL,NULL,NULL,'ssa'),(1580,95,22,NULL,NULL,'das',NULL,NULL),(1581,95,23,NULL,NULL,'dasd',NULL,NULL),(1582,96,1,NULL,NULL,NULL,'VN-VI','def'),(1583,96,20,NULL,24,NULL,NULL,NULL),(1584,96,18,NULL,NULL,NULL,NULL,'qwewqe'),(1585,96,2,NULL,NULL,'<p>sdasda</p>','VN-VI',NULL),(1586,96,11,60000,NULL,NULL,NULL,NULL),(1587,96,21,NULL,NULL,NULL,NULL,'ssa'),(1588,96,22,NULL,NULL,'das',NULL,NULL),(1589,96,23,NULL,NULL,'dasd',NULL,NULL),(1597,97,1,NULL,NULL,NULL,'VN-VI','def'),(1598,97,20,NULL,24,NULL,NULL,NULL),(1599,97,18,NULL,NULL,NULL,NULL,'qwewqe'),(1600,97,2,NULL,NULL,'<p>sdasda</p>','VN-VI',NULL),(1601,97,11,60000,NULL,NULL,NULL,NULL),(1602,97,21,NULL,NULL,NULL,NULL,'ssa'),(1603,97,22,NULL,NULL,'das',NULL,NULL),(1604,97,23,NULL,NULL,'dasd',NULL,NULL),(1612,98,1,NULL,NULL,NULL,'VN-VI','def'),(1613,98,20,NULL,24,NULL,NULL,NULL),(1614,98,18,NULL,NULL,NULL,NULL,'qwewqe'),(1615,98,2,NULL,NULL,'<p>sdasda</p>','VN-VI',NULL),(1616,98,11,60000,NULL,NULL,NULL,NULL),(1617,98,21,NULL,NULL,NULL,NULL,'ssa'),(1618,98,22,NULL,NULL,'das',NULL,NULL),(1619,98,23,NULL,NULL,'dasd',NULL,NULL),(1627,99,1,NULL,NULL,NULL,'VN-VI','def'),(1628,99,20,NULL,24,NULL,NULL,NULL),(1629,99,18,NULL,NULL,NULL,NULL,'qwewqe'),(1630,99,2,NULL,NULL,'<p>sdasda</p>','VN-VI',NULL),(1631,99,11,60000,NULL,NULL,NULL,NULL),(1632,99,21,NULL,NULL,NULL,NULL,'ssa'),(1633,99,22,NULL,NULL,'das',NULL,NULL),(1634,99,23,NULL,NULL,'dasd',NULL,NULL),(1642,100,1,NULL,NULL,NULL,'VN-VI','def'),(1643,100,20,NULL,24,NULL,NULL,NULL),(1644,100,18,NULL,NULL,NULL,NULL,'qwewqe'),(1645,100,2,NULL,NULL,'<p>sdasda</p>','VN-VI',NULL),(1646,100,11,60000,NULL,NULL,NULL,NULL),(1647,100,21,NULL,NULL,NULL,NULL,'ssa'),(1648,100,22,NULL,NULL,'das',NULL,NULL),(1649,100,23,NULL,NULL,'dasd',NULL,NULL),(1657,101,1,NULL,NULL,NULL,'VN-VI','def'),(1658,101,20,NULL,24,NULL,NULL,NULL),(1659,101,18,NULL,NULL,NULL,NULL,'qwewqe'),(1660,101,2,NULL,NULL,'<p>sdasda</p>','VN-VI',NULL),(1661,101,11,60000,NULL,NULL,NULL,NULL),(1662,101,21,NULL,NULL,NULL,NULL,'ssa'),(1663,101,22,NULL,NULL,'das',NULL,NULL),(1664,101,23,NULL,NULL,'dasd',NULL,NULL),(1672,102,1,NULL,NULL,NULL,'VN-VI','def'),(1673,102,20,NULL,24,NULL,NULL,NULL),(1674,102,18,NULL,NULL,NULL,NULL,'qwewqe'),(1675,102,2,NULL,NULL,'<p>sdasda</p>','VN-VI',NULL),(1676,102,11,60000,NULL,NULL,NULL,NULL),(1677,102,21,NULL,NULL,NULL,NULL,'ssa'),(1678,102,22,NULL,NULL,'das',NULL,NULL),(1679,102,23,NULL,NULL,'dasd',NULL,NULL),(1687,103,1,NULL,NULL,NULL,'VN-VI','def'),(1688,103,20,NULL,24,NULL,NULL,NULL),(1689,103,18,NULL,NULL,NULL,NULL,'qwewqe'),(1690,103,2,NULL,NULL,'<p>sdasda</p>','VN-VI',NULL),(1691,103,11,60000,NULL,NULL,NULL,NULL),(1692,103,21,NULL,NULL,NULL,NULL,'ssa'),(1693,103,22,NULL,NULL,'das',NULL,NULL),(1694,103,23,NULL,NULL,'dasd',NULL,NULL),(1702,104,1,NULL,NULL,NULL,'VN-VI','def'),(1703,104,20,NULL,24,NULL,NULL,NULL),(1704,104,18,NULL,NULL,NULL,NULL,'qwewqe'),(1705,104,2,NULL,NULL,'<p>sdasda</p>','VN-VI',NULL),(1706,104,11,60000,NULL,NULL,NULL,NULL),(1707,104,21,NULL,NULL,NULL,NULL,'ssa'),(1708,104,22,NULL,NULL,'das',NULL,NULL),(1709,104,23,NULL,NULL,'dasd',NULL,NULL),(1717,105,1,NULL,NULL,NULL,'VN-VI','def'),(1718,105,20,NULL,24,NULL,NULL,NULL),(1719,105,18,NULL,NULL,NULL,NULL,'qwewqe'),(1720,105,2,NULL,NULL,'<p>sdasda</p>','VN-VI',NULL),(1721,105,11,60000,NULL,NULL,NULL,NULL),(1722,105,21,NULL,NULL,NULL,NULL,'ssa'),(1723,105,22,NULL,NULL,'das',NULL,NULL),(1724,105,23,NULL,NULL,'dasd',NULL,NULL),(1732,106,1,NULL,NULL,NULL,'VN-VI','def'),(1733,106,20,NULL,24,NULL,NULL,NULL),(1734,106,18,NULL,NULL,NULL,NULL,'qwewqe'),(1735,106,2,NULL,NULL,'<p>sdasda</p>','VN-VI',NULL),(1736,106,11,60000,NULL,NULL,NULL,NULL),(1737,106,21,NULL,NULL,NULL,NULL,'ssa'),(1738,106,22,NULL,NULL,'das',NULL,NULL),(1739,106,23,NULL,NULL,'dasd',NULL,NULL),(1747,107,1,NULL,NULL,NULL,'VN-VI','def'),(1748,107,20,NULL,24,NULL,NULL,NULL),(1749,107,18,NULL,NULL,NULL,NULL,'qwewqe'),(1750,107,2,NULL,NULL,'<p>sdasda</p>','VN-VI',NULL),(1751,107,11,60000,NULL,NULL,NULL,NULL),(1752,107,21,NULL,NULL,NULL,NULL,'ssa'),(1753,107,22,NULL,NULL,'das',NULL,NULL),(1754,107,23,NULL,NULL,'dasd',NULL,NULL),(1762,108,1,NULL,NULL,NULL,'VN-VI','def'),(1763,108,20,NULL,24,NULL,NULL,NULL),(1764,108,18,NULL,NULL,NULL,NULL,'qwewqe'),(1765,108,2,NULL,NULL,'<p>sdasda</p>','VN-VI',NULL),(1766,108,11,60000,NULL,NULL,NULL,NULL),(1767,108,21,NULL,NULL,NULL,NULL,'ssa'),(1768,108,22,NULL,NULL,'das',NULL,NULL),(1769,108,23,NULL,NULL,'dasd',NULL,NULL),(1777,109,1,NULL,NULL,NULL,'VN-VI','def'),(1778,109,20,NULL,24,NULL,NULL,NULL),(1779,109,18,NULL,NULL,NULL,NULL,'qwewqe'),(1780,109,2,NULL,NULL,'<p>sdasda</p>','VN-VI',NULL),(1781,109,11,60000,NULL,NULL,NULL,NULL),(1782,109,21,NULL,NULL,NULL,NULL,'ssa'),(1783,109,22,NULL,NULL,'das',NULL,NULL),(1784,109,23,NULL,NULL,'dasd',NULL,NULL),(1792,110,1,NULL,NULL,NULL,'VN-VI','def'),(1793,110,20,NULL,24,NULL,NULL,NULL),(1794,110,18,NULL,NULL,NULL,NULL,'qwewqe'),(1795,110,2,NULL,NULL,'<p>sdasda</p>','VN-VI',NULL),(1796,110,11,60000,NULL,NULL,NULL,NULL),(1797,110,21,NULL,NULL,NULL,NULL,'ssa'),(1798,110,22,NULL,NULL,'das',NULL,NULL),(1799,110,23,NULL,NULL,'dasd',NULL,NULL),(1807,111,1,NULL,NULL,NULL,'VN-VI','def'),(1808,111,20,NULL,24,NULL,NULL,NULL),(1809,111,18,NULL,NULL,NULL,NULL,'qwewqe'),(1810,111,2,NULL,NULL,'<p>sdasda</p>','VN-VI',NULL),(1811,111,11,60000,NULL,NULL,NULL,NULL),(1812,111,21,NULL,NULL,NULL,NULL,'ssa'),(1813,111,22,NULL,NULL,'das',NULL,NULL),(1814,111,23,NULL,NULL,'dasd',NULL,NULL),(1822,112,1,NULL,NULL,NULL,'VN-VI','def'),(1823,112,20,NULL,24,NULL,NULL,NULL),(1824,112,18,NULL,NULL,NULL,NULL,'qwewqe'),(1825,112,2,NULL,NULL,'<p>sdasda</p>','VN-VI',NULL),(1826,112,11,60000,NULL,NULL,NULL,NULL),(1827,112,21,NULL,NULL,NULL,NULL,'ssa'),(1828,112,22,NULL,NULL,'das',NULL,NULL),(1829,112,23,NULL,NULL,'dasd',NULL,NULL),(1837,113,1,NULL,NULL,NULL,'VN-VI','def'),(1838,113,20,NULL,24,NULL,NULL,NULL),(1839,113,18,NULL,NULL,NULL,NULL,'qwewqe'),(1840,113,2,NULL,NULL,'<p>sdasda</p>','VN-VI',NULL),(1841,113,11,60000,NULL,NULL,NULL,NULL),(1842,113,21,NULL,NULL,NULL,NULL,'ssa'),(1843,113,22,NULL,NULL,'das',NULL,NULL),(1844,113,23,NULL,NULL,'dasd',NULL,NULL),(1852,114,1,NULL,NULL,NULL,'VN-VI','def'),(1853,114,20,NULL,24,NULL,NULL,NULL),(1854,114,18,NULL,NULL,NULL,NULL,'qwewqe'),(1855,114,2,NULL,NULL,'<p>sdasda</p>','VN-VI',NULL),(1856,114,11,60000,NULL,NULL,NULL,NULL),(1857,114,21,NULL,NULL,NULL,NULL,'ssa'),(1858,114,22,NULL,NULL,'das',NULL,NULL),(1859,114,23,NULL,NULL,'dasd',NULL,NULL),(1867,115,1,NULL,NULL,NULL,'VN-VI','def'),(1868,115,20,NULL,24,NULL,NULL,NULL),(1869,115,18,NULL,NULL,NULL,NULL,'qwewqe'),(1870,115,2,NULL,NULL,'<p>sdasda</p>','VN-VI',NULL),(1871,115,11,60000,NULL,NULL,NULL,NULL),(1872,115,21,NULL,NULL,NULL,NULL,'ssa'),(1873,115,22,NULL,NULL,'das',NULL,NULL),(1874,115,23,NULL,NULL,'dasd',NULL,NULL),(1882,116,1,NULL,NULL,NULL,'VN-VI','def'),(1883,116,20,NULL,24,NULL,NULL,NULL),(1884,116,18,NULL,NULL,NULL,NULL,'qwewqe'),(1885,116,2,NULL,NULL,'<p>sdasda</p>','VN-VI',NULL),(1886,116,11,60000,NULL,NULL,NULL,NULL),(1887,116,21,NULL,NULL,NULL,NULL,'ssa'),(1888,116,22,NULL,NULL,'das',NULL,NULL),(1889,116,23,NULL,NULL,'dasd',NULL,NULL),(1897,117,1,NULL,NULL,NULL,'VN-VI','def'),(1898,117,20,NULL,24,NULL,NULL,NULL),(1899,117,18,NULL,NULL,NULL,NULL,'qwewqe'),(1900,117,2,NULL,NULL,'<p>sdasda</p>','VN-VI',NULL),(1901,117,11,60000,NULL,NULL,NULL,NULL),(1902,117,21,NULL,NULL,NULL,NULL,'ssa'),(1903,117,22,NULL,NULL,'das',NULL,NULL),(1904,117,23,NULL,NULL,'dasd',NULL,NULL),(1912,118,1,NULL,NULL,NULL,'VN-VI','def'),(1913,118,20,NULL,24,NULL,NULL,NULL),(1914,118,18,NULL,NULL,NULL,NULL,'qwewqe'),(1915,118,2,NULL,NULL,'<p>sdasda</p>','VN-VI',NULL),(1916,118,11,60000,NULL,NULL,NULL,NULL),(1917,118,21,NULL,NULL,NULL,NULL,'ssa'),(1918,118,22,NULL,NULL,'das',NULL,NULL),(1919,118,23,NULL,NULL,'dasd',NULL,NULL),(1927,119,1,NULL,NULL,NULL,'VN-VI','def'),(1928,119,20,NULL,24,NULL,NULL,NULL),(1929,119,18,NULL,NULL,NULL,NULL,'qwewqe'),(1930,119,2,NULL,NULL,'<p>sdasda</p>','VN-VI',NULL),(1931,119,11,60000,NULL,NULL,NULL,NULL),(1932,119,21,NULL,NULL,NULL,NULL,'ssa'),(1933,119,22,NULL,NULL,'das',NULL,NULL),(1934,119,23,NULL,NULL,'dasd',NULL,NULL),(1942,120,1,NULL,NULL,NULL,'VN-VI','def'),(1943,120,20,NULL,24,NULL,NULL,NULL),(1944,120,18,NULL,NULL,NULL,NULL,'qwewqe'),(1945,120,2,NULL,NULL,'<p>sdasda</p>','VN-VI',NULL),(1946,120,11,60000,NULL,NULL,NULL,NULL),(1947,120,21,NULL,NULL,NULL,NULL,'ssa'),(1948,120,22,NULL,NULL,'das',NULL,NULL),(1949,120,23,NULL,NULL,'dasd',NULL,NULL),(1957,121,1,NULL,NULL,NULL,'VN-VI','def'),(1958,121,20,NULL,24,NULL,NULL,NULL),(1959,121,18,NULL,NULL,NULL,NULL,'qwewqe'),(1960,121,2,NULL,NULL,'<p>sdasda</p>','VN-VI',NULL),(1961,121,11,60000,NULL,NULL,NULL,NULL),(1962,121,21,NULL,NULL,NULL,NULL,'ssa'),(1963,121,22,NULL,NULL,'das',NULL,NULL),(1964,121,23,NULL,NULL,'dasd',NULL,NULL),(1972,122,1,NULL,NULL,NULL,'VN-VI','def'),(1973,122,20,NULL,24,NULL,NULL,NULL),(1974,122,18,NULL,NULL,NULL,NULL,'qwewqe'),(1975,122,2,NULL,NULL,'<p>sdasda</p>','VN-VI',NULL),(1976,122,11,60000,NULL,NULL,NULL,NULL),(1977,122,21,NULL,NULL,NULL,NULL,'ssa'),(1978,122,22,NULL,NULL,'das',NULL,NULL),(1979,122,23,NULL,NULL,'dasd',NULL,NULL),(1987,123,1,NULL,NULL,NULL,'VN-VI','def'),(1988,123,20,NULL,24,NULL,NULL,NULL),(1989,123,18,NULL,NULL,NULL,NULL,'qwewqe'),(1990,123,2,NULL,NULL,'<p>sdasda</p>','VN-VI',NULL),(1991,123,11,60000,NULL,NULL,NULL,NULL),(1992,123,21,NULL,NULL,NULL,NULL,'ssa'),(1993,123,22,NULL,NULL,'das',NULL,NULL),(1994,123,23,NULL,NULL,'dasd',NULL,NULL),(2002,124,1,NULL,NULL,NULL,'VN-VI','def'),(2003,124,20,NULL,24,NULL,NULL,NULL),(2004,124,18,NULL,NULL,NULL,NULL,'qwewqe'),(2005,124,2,NULL,NULL,'<p>sdasda</p>','VN-VI',NULL),(2006,124,11,60000,NULL,NULL,NULL,NULL),(2007,124,21,NULL,NULL,NULL,NULL,'ssa'),(2008,124,22,NULL,NULL,'das',NULL,NULL),(2009,124,23,NULL,NULL,'dasd',NULL,NULL),(2017,125,1,NULL,NULL,NULL,'VN-VI','def'),(2018,125,20,NULL,24,NULL,NULL,NULL),(2019,125,18,NULL,NULL,NULL,NULL,'qwewqe'),(2020,125,2,NULL,NULL,'<p>sdasda</p>','VN-VI',NULL),(2021,125,11,60000,NULL,NULL,NULL,NULL),(2022,125,21,NULL,NULL,NULL,NULL,'ssa'),(2023,125,22,NULL,NULL,'das',NULL,NULL),(2024,125,23,NULL,NULL,'dasd',NULL,NULL),(2032,126,1,NULL,NULL,NULL,'VN-VI','def'),(2033,126,20,NULL,24,NULL,NULL,NULL),(2034,126,18,NULL,NULL,NULL,NULL,'qwewqe'),(2035,126,2,NULL,NULL,'<p>sdasda</p>','VN-VI',NULL),(2036,126,11,60000,NULL,NULL,NULL,NULL),(2037,126,21,NULL,NULL,NULL,NULL,'ssa'),(2038,126,22,NULL,NULL,'das',NULL,NULL),(2039,126,23,NULL,NULL,'dasd',NULL,NULL),(2047,127,1,NULL,NULL,NULL,'VN-VI','def'),(2048,127,20,NULL,24,NULL,NULL,NULL),(2049,127,18,NULL,NULL,NULL,NULL,'qwewqe'),(2050,127,2,NULL,NULL,'<p>sdasda</p>','VN-VI',NULL),(2051,127,11,60000,NULL,NULL,NULL,NULL),(2052,127,21,NULL,NULL,NULL,NULL,'ssa'),(2053,127,22,NULL,NULL,'das',NULL,NULL),(2054,127,23,NULL,NULL,'dasd',NULL,NULL),(2062,128,1,NULL,NULL,NULL,'VN-VI','def'),(2063,128,20,NULL,24,NULL,NULL,NULL),(2064,128,18,NULL,NULL,NULL,NULL,'qwewqe'),(2065,128,2,NULL,NULL,'<p>sdasda</p>','VN-VI',NULL),(2066,128,11,60000,NULL,NULL,NULL,NULL),(2067,128,21,NULL,NULL,NULL,NULL,'ssa'),(2068,128,22,NULL,NULL,'das',NULL,NULL),(2069,128,23,NULL,NULL,'dasd',NULL,NULL),(2077,129,1,NULL,NULL,NULL,'VN-VI','def'),(2078,129,20,NULL,24,NULL,NULL,NULL),(2079,129,18,NULL,NULL,NULL,NULL,'qwewqe'),(2080,129,2,NULL,NULL,'<p>sdasda</p>','VN-VI',NULL),(2081,129,11,60000,NULL,NULL,NULL,NULL),(2082,129,21,NULL,NULL,NULL,NULL,'ssa'),(2083,129,22,NULL,NULL,'das',NULL,NULL),(2084,129,23,NULL,NULL,'dasd',NULL,NULL),(2092,130,1,NULL,NULL,NULL,'VN-VI','def'),(2093,130,20,NULL,24,NULL,NULL,NULL),(2094,130,18,NULL,NULL,NULL,NULL,'qwewqe'),(2095,130,2,NULL,NULL,'<p>sdasda</p>','VN-VI',NULL),(2096,130,11,60000,NULL,NULL,NULL,NULL),(2097,130,21,NULL,NULL,NULL,NULL,'ssa'),(2098,130,22,NULL,NULL,'das',NULL,NULL),(2099,130,23,NULL,NULL,'dasd',NULL,NULL),(2107,131,1,NULL,NULL,NULL,'VN-VI','def'),(2108,131,20,NULL,24,NULL,NULL,NULL),(2109,131,18,NULL,NULL,NULL,NULL,'qwewqe'),(2110,131,2,NULL,NULL,'<p>sdasda</p>','VN-VI',NULL),(2111,131,11,60000,NULL,NULL,NULL,NULL),(2112,131,21,NULL,NULL,NULL,NULL,'ssa'),(2113,131,22,NULL,NULL,'das',NULL,NULL),(2114,131,23,NULL,NULL,'dasd',NULL,NULL),(2122,132,1,NULL,NULL,NULL,'VN-VI','def'),(2123,132,20,NULL,24,NULL,NULL,NULL),(2124,132,18,NULL,NULL,NULL,NULL,'qwewqe'),(2125,132,2,NULL,NULL,'<p>sdasda</p>','VN-VI',NULL),(2126,132,11,60000,NULL,NULL,NULL,NULL),(2127,132,21,NULL,NULL,NULL,NULL,'ssa'),(2128,132,22,NULL,NULL,'das',NULL,NULL),(2129,132,23,NULL,NULL,'dasd',NULL,NULL),(2137,133,1,NULL,NULL,NULL,'VN-VI','def'),(2138,133,20,NULL,24,NULL,NULL,NULL),(2139,133,18,NULL,NULL,NULL,NULL,'qwewqe'),(2140,133,2,NULL,NULL,'<p>sdasda</p>','VN-VI',NULL),(2141,133,11,60000,NULL,NULL,NULL,NULL),(2142,133,21,NULL,NULL,NULL,NULL,'ssa'),(2143,133,22,NULL,NULL,'das',NULL,NULL),(2144,133,23,NULL,NULL,'dasd',NULL,NULL);

/*Table structure for table `t_product_attribute_type` */

DROP TABLE IF EXISTS `t_product_attribute_type`;

CREATE TABLE `t_product_attribute_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `codename` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `datatype` enum('number','enum','text','varchar','file') COLLATE utf8_unicode_ci DEFAULT NULL,
  `fk_enum_ref` int(11) DEFAULT NULL,
  `multi_language` tinyint(4) DEFAULT '0',
  `repeating_group` tinyint(4) DEFAULT '0',
  `weight` int(11) DEFAULT '0',
  `default` text COLLATE utf8_unicode_ci,
  `required` tinyint(4) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `t_product_attribute_type` */

insert  into `t_product_attribute_type`(`id`,`codename`,`datatype`,`fk_enum_ref`,`multi_language`,`repeating_group`,`weight`,`default`,`required`) values (1,'name','varchar',NULL,1,0,0,NULL,0),(2,'description','text',NULL,1,0,0,NULL,0),(3,'tag','varchar',NULL,1,1,0,NULL,0),(7,'material','enum',1,0,1,0,NULL,0),(8,'gift_target','enum',2,0,1,0,NULL,0),(9,'category','number',NULL,0,0,0,NULL,0),(10,'occasion','enum',3,0,1,0,NULL,0),(11,'price','number',NULL,0,0,0,NULL,0),(13,'quantity','number',NULL,0,0,0,NULL,0),(14,'weight','number',NULL,0,0,0,NULL,0),(15,'source','enum',NULL,0,0,0,NULL,0),(16,'shipping_method','enum',6,0,1,0,NULL,0),(17,'payment_method','enum',7,0,1,0,NULL,0),(18,'storage_code','varchar',NULL,0,0,0,NULL,0),(19,'sales','number',NULL,0,0,0,NULL,0),(20,'storage_code_type','enum',8,0,0,0,NULL,0),(21,'meta_title','varchar',NULL,0,0,0,NULL,0),(22,'meta_keywords','text',NULL,0,0,0,NULL,0),(23,'meta_description','text',NULL,0,0,0,NULL,0),(24,'weight_unit','enum',9,0,0,0,NULL,0),(25,'weight','number',0,0,0,0,NULL,0),(26,'note','text',NULL,0,0,0,NULL,0),(27,'return_policy','number',NULL,0,0,0,'0',0),(28,'warranty_policy','number',NULL,0,0,0,'0',0),(29,'made_in','enum',12,0,0,0,NULL,0),(30,'import_from','enum',12,0,0,0,NULL,0),(31,'dimension_width','number',NULL,0,0,0,'-1',0),(32,'dimension_height','number',NULL,0,0,0,'-1',0),(33,'dimension_depth','number',NULL,0,0,0,'-1',0);

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

/*Table structure for table `t_product_image` */

DROP TABLE IF EXISTS `t_product_image`;

CREATE TABLE `t_product_image` (
  `fk_product` int(11) NOT NULL DEFAULT '0',
  `fk_file` int(11) NOT NULL DEFAULT '0',
  `sort` tinyint(4) DEFAULT NULL,
  `thumbnail` tinyint(4) DEFAULT '0',
  `base_image` tinyint(4) DEFAULT '1',
  `small_image` tinyint(4) DEFAULT '0',
  `facebook_image` tinyint(4) DEFAULT '0',
  PRIMARY KEY (`fk_product`,`fk_file`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `t_product_image` */

insert  into `t_product_image`(`fk_product`,`fk_file`,`sort`,`thumbnail`,`base_image`,`small_image`,`facebook_image`) values (1,1,NULL,1,1,0,1),(2,1,NULL,1,1,0,1),(3,1,NULL,1,1,0,1),(4,1,NULL,1,1,0,1),(5,1,NULL,1,1,0,1),(6,1,NULL,1,1,0,1),(7,1,NULL,1,1,0,1),(8,1,NULL,1,1,0,1),(9,1,NULL,1,1,0,1),(10,1,NULL,1,1,0,1),(11,1,NULL,1,1,0,1),(12,1,NULL,1,1,0,1),(14,13,0,1,1,1,0),(15,9,0,1,1,1,0),(20,11,0,1,1,1,0),(21,39,0,1,1,1,0),(21,40,0,0,1,1,0),(24,18,0,0,1,1,0),(24,19,NULL,0,1,0,0),(26,20,0,0,1,1,0),(27,21,1,1,1,1,0),(27,22,0,0,1,1,0),(31,27,2,0,1,1,0),(31,28,1,0,1,1,0),(33,23,0,0,1,1,0),(33,24,0,0,1,1,0),(33,25,0,0,1,1,0),(35,29,0,0,1,1,0),(35,30,0,0,1,1,0),(35,31,0,0,1,1,0),(35,32,0,0,1,1,0),(38,33,0,1,1,1,0),(38,35,0,0,1,1,0),(38,36,NULL,0,1,0,0),(40,34,0,1,1,1,0),(42,37,0,0,1,1,0),(42,38,0,1,1,1,0);

/*Table structure for table `t_product_tax` */

DROP TABLE IF EXISTS `t_product_tax`;

CREATE TABLE `t_product_tax` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_product` int(11) DEFAULT NULL,
  `fk_tax` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=110 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `t_product_tax` */

insert  into `t_product_tax`(`id`,`fk_product`,`fk_tax`) values (15,14,1),(16,15,1),(17,20,1),(18,26,0),(20,44,1),(21,45,1),(22,46,1),(23,47,1),(24,48,1),(25,49,1),(26,50,1),(27,51,1),(28,52,1),(29,53,1),(30,54,1),(31,55,1),(32,56,1),(33,57,1),(34,58,1),(35,59,1),(36,60,1),(37,61,1),(38,62,1),(39,63,1),(40,64,1),(41,65,1),(42,66,1),(43,67,1),(44,68,1),(45,69,1),(46,70,1),(47,71,1),(48,72,1),(49,73,1),(50,74,1),(51,75,1),(52,76,1),(53,77,1),(54,78,1),(55,79,1),(56,80,1),(57,81,1),(58,82,1),(59,83,1),(60,84,1),(61,85,1),(62,86,1),(63,87,1),(64,88,1),(65,89,1),(66,90,1),(67,91,1),(68,92,1),(69,93,1),(70,94,1),(71,95,1),(72,96,1),(73,97,1),(74,98,1),(75,99,1),(76,100,1),(77,101,1),(78,102,1),(79,103,1),(80,104,1),(81,105,1),(82,106,1),(83,107,1),(84,108,1),(85,109,1),(86,110,1),(87,111,1),(88,112,1),(89,113,1),(90,114,1),(91,115,1),(92,116,1),(93,117,1),(94,118,1),(95,119,1),(96,120,1),(97,121,1),(98,122,1),(99,123,1),(100,124,1),(101,125,1),(102,126,1),(103,127,1),(104,128,1),(105,129,1),(106,130,1),(107,131,1),(108,132,1),(109,133,1);

/*Table structure for table `t_product_view` */

DROP TABLE IF EXISTS `t_product_view`;

CREATE TABLE `t_product_view` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_product` int(11) DEFAULT NULL,
  `fk_user` int(11) DEFAULT NULL,
  `count_view` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `t_product_view` */

insert  into `t_product_view`(`id`,`fk_product`,`fk_user`,`count_view`) values (1,2,0,44),(2,1,0,13),(3,3,0,9),(4,4,0,5),(5,5,0,4),(6,10,0,1),(7,8,0,1),(8,1,1,1),(9,14,1,1),(10,15,1,2),(11,14,5,4),(12,20,5,9),(13,15,5,3),(14,20,0,11),(15,14,0,11),(16,15,0,3),(17,26,5,1),(18,27,0,3),(19,27,5,1),(20,33,0,6),(21,26,0,2),(22,31,0,1),(23,38,0,5),(24,40,0,1),(25,42,0,1),(26,21,5,2);

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

/*Table structure for table `t_section` */

DROP TABLE IF EXISTS `t_section`;

CREATE TABLE `t_section` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `display_image` text COLLATE utf8_unicode_ci,
  `display_image_href` text COLLATE utf8_unicode_ci,
  `display_image_title` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `t_section` */

insert  into `t_section`(`id`,`display_image`,`display_image_href`,`display_image_title`) values (1,'/images/child-slide-item-demo.png','#','title');

/*Table structure for table `t_section_language` */

DROP TABLE IF EXISTS `t_section_language`;

CREATE TABLE `t_section_language` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `language` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `fk_section` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `t_section_language` */

insert  into `t_section_language`(`id`,`language`,`name`,`description`,`fk_section`) values (1,'EN-US','Shopping mall','shopping mall description',1),(2,'VN-VI','Mua sắm','mô ta cho mua sam',1);

/*Table structure for table `t_section_product` */

DROP TABLE IF EXISTS `t_section_product`;

CREATE TABLE `t_section_product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_section` int(11) DEFAULT NULL,
  `fk_product` int(11) DEFAULT NULL,
  `sort` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `t_section_product` */

insert  into `t_section_product`(`id`,`fk_section`,`fk_product`,`sort`) values (1,1,4,1),(2,1,5,2),(3,1,6,3),(4,1,7,4),(5,1,8,5),(6,1,9,6);

/*Table structure for table `t_seller` */

DROP TABLE IF EXISTS `t_seller`;

CREATE TABLE `t_seller` (
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
  `sid` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `t_seller` */

insert  into `t_seller`(`id`,`name`,`logo`,`phoneno`,`email`,`website`,`status`,`status_date`,`status_reason`,`fk_manager`,`sid`) values (1,'Samsung',NULL,NULL,'admin@samsung.com',NULL,1,NULL,NULL,5,'samsung');

/*Table structure for table `t_seller_category` */

DROP TABLE IF EXISTS `t_seller_category`;

CREATE TABLE `t_seller_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_seller` int(11) DEFAULT NULL,
  `fk_category` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `t_seller_category` */

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

/*Table structure for table `t_shipping_location` */

DROP TABLE IF EXISTS `t_shipping_location`;

CREATE TABLE `t_shipping_location` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_shipping_method` int(11) DEFAULT NULL,
  `fk_location` int(11) DEFAULT NULL,
  `price` double DEFAULT NULL,
  `price_currency` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `t_shipping_location` */

insert  into `t_shipping_location`(`id`,`fk_shipping_method`,`fk_location`,`price`,`price_currency`) values (1,1,1,10,'VND');

/*Table structure for table `t_shipping_method` */

DROP TABLE IF EXISTS `t_shipping_method`;

CREATE TABLE `t_shipping_method` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `codename` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `min_bday` tinyint(4) DEFAULT NULL,
  `max_bday` tinyint(4) DEFAULT NULL,
  `sort` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `t_shipping_method` */

insert  into `t_shipping_method`(`id`,`codename`,`min_bday`,`max_bday`,`sort`) values (1,'standard',1,3,NULL),(2,'premium',0,1,NULL),(3,'express',0,0,NULL);

/*Table structure for table `t_tax` */

DROP TABLE IF EXISTS `t_tax`;

CREATE TABLE `t_tax` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_seller` int(11) DEFAULT NULL,
  `cost_percent` double DEFAULT NULL,
  `cost_fixed` double DEFAULT NULL,
  `codename` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `t_tax` */

insert  into `t_tax`(`id`,`fk_seller`,`cost_percent`,`cost_fixed`,`codename`) values (1,1,0.1,0,'VAT');

/*Table structure for table `t_tax_language` */

DROP TABLE IF EXISTS `t_tax_language`;

CREATE TABLE `t_tax_language` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_tax` int(11) DEFAULT NULL,
  `language` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `t_tax_language` */

insert  into `t_tax_language`(`id`,`fk_tax`,`language`,`name`) values (1,1,'VN-VI','VAT'),(2,1,'EN-US','VAT');

/*Table structure for table `t_user` */

DROP TABLE IF EXISTS `t_user`;

CREATE TABLE `t_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `portal_id` int(11) NOT NULL,
  `platform_key` tinyint(4) NOT NULL DEFAULT '0',
  `user_type` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `created_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `t_user` */

insert  into `t_user`(`id`,`portal_id`,`platform_key`,`user_type`,`created_date`) values (5,50,0,'USER','2014-05-31 10:05:36');

/*Table structure for table `t_user_address` */

DROP TABLE IF EXISTS `t_user_address`;

CREATE TABLE `t_user_address` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_user` int(11) DEFAULT NULL,
  `date_created` datetime DEFAULT NULL,
  `date_used` datetime DEFAULT NULL,
  `count_used` int(11) DEFAULT NULL,
  `fullname` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `company` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `street_address` text COLLATE utf8_unicode_ci,
  `city` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `country` varchar(10) COLLATE utf8_unicode_ci DEFAULT 'vietnam',
  `fk_state_province` int(11) DEFAULT NULL,
  `zip_postal_code` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `telephone` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fax` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `vat_number` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `type` enum('shipping','billing') COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` tinyint(4) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `t_user_address` */

insert  into `t_user_address`(`id`,`fk_user`,`date_created`,`date_used`,`count_used`,`fullname`,`company`,`street_address`,`city`,`country`,`fk_state_province`,`zip_postal_code`,`telephone`,`fax`,`vat_number`,`type`,`status`) values (1,2,NULL,NULL,1,NULL,NULL,'12 Wall st\r\n','0','America',NULL,NULL,'012347888',NULL,NULL,NULL,0);

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

/*Table structure for table `t_wishlist` */

DROP TABLE IF EXISTS `t_wishlist`;

CREATE TABLE `t_wishlist` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_customer` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `remind_date` datetime DEFAULT NULL,
  `note` text COLLATE utf8_unicode_ci,
  `date_created` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=59 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `t_wishlist` */

insert  into `t_wishlist`(`id`,`fk_customer`,`name`,`remind_date`,`note`,`date_created`) values (22,5,'main',NULL,NULL,'2014-06-01 11:32:15'),(23,NULL,'main',NULL,NULL,'2014-06-01 22:51:46'),(24,NULL,'main',NULL,NULL,'2014-06-01 23:01:26'),(25,NULL,'main',NULL,NULL,'2014-06-01 23:01:34'),(26,NULL,'main',NULL,NULL,'2014-06-08 17:21:21'),(27,NULL,'main',NULL,NULL,'2014-06-08 18:49:44'),(28,NULL,'main',NULL,NULL,'2014-06-08 18:50:05'),(29,NULL,'main',NULL,NULL,'2014-06-09 21:16:44'),(30,NULL,'main',NULL,NULL,'2014-06-09 21:18:59'),(31,NULL,'main',NULL,NULL,'2014-06-09 21:20:10'),(32,NULL,'main',NULL,NULL,'2014-06-09 21:20:29'),(33,NULL,'main',NULL,NULL,'2014-06-09 21:22:30'),(34,NULL,'main',NULL,NULL,'2014-06-09 21:23:25'),(35,NULL,'main',NULL,NULL,'2014-06-09 21:23:39'),(36,NULL,'main',NULL,NULL,'2014-06-09 21:23:41'),(37,NULL,'main',NULL,NULL,'2014-06-09 21:24:29'),(38,NULL,'main',NULL,NULL,'2014-06-09 21:29:41'),(39,NULL,'main',NULL,NULL,'2014-06-09 21:30:39'),(40,NULL,'main',NULL,NULL,'2014-06-09 21:32:27'),(41,NULL,'main',NULL,NULL,'2014-06-09 21:33:15'),(42,NULL,'main',NULL,NULL,'2014-06-09 21:36:12'),(43,NULL,'main',NULL,NULL,'2014-06-09 21:36:33'),(44,NULL,'main',NULL,NULL,'2014-06-09 21:39:33'),(45,NULL,'main',NULL,NULL,'2014-06-09 21:40:47'),(46,NULL,'main',NULL,NULL,'2014-06-09 21:41:34'),(47,NULL,'main',NULL,NULL,'2014-06-09 21:41:46'),(48,NULL,'main',NULL,NULL,'2014-06-09 21:46:05'),(49,NULL,'main',NULL,NULL,'2014-06-09 21:46:10'),(50,NULL,'main',NULL,NULL,'2014-06-13 11:37:32'),(51,NULL,'main',NULL,NULL,'2014-06-13 11:56:31'),(52,NULL,'main',NULL,NULL,'2014-06-13 19:44:09'),(53,NULL,'main',NULL,NULL,'2014-06-13 20:00:53'),(54,NULL,'main',NULL,NULL,'2014-06-13 20:05:47'),(55,NULL,'main',NULL,NULL,'2014-06-13 20:06:17'),(56,NULL,'main',NULL,NULL,'2014-06-13 20:06:51'),(57,NULL,'main',NULL,NULL,'2014-06-13 22:24:06'),(58,NULL,'main',NULL,NULL,'2014-06-18 22:49:38');

/*Table structure for table `t_wishlist_detail` */

DROP TABLE IF EXISTS `t_wishlist_detail`;

CREATE TABLE `t_wishlist_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_wishlist` int(11) DEFAULT NULL,
  `type` enum('product','note','link') COLLATE utf8_unicode_ci DEFAULT NULL,
  `note` text COLLATE utf8_unicode_ci,
  `fk_product` int(11) DEFAULT NULL,
  `status` tinyint(4) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `t_wishlist_detail` */

insert  into `t_wishlist_detail`(`id`,`fk_wishlist`,`type`,`note`,`fk_product`,`status`) values (18,22,NULL,NULL,15,0),(19,22,NULL,NULL,0,1),(20,22,NULL,NULL,0,1),(21,22,NULL,NULL,0,1),(23,22,NULL,NULL,20,0),(24,22,NULL,NULL,14,1);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
