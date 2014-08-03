/*
SQLyog Enterprise - MySQL GUI v8.12 
MySQL - 5.5.34-0ubuntu0.13.04.1 : Database - eproject
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

/*Table structure for table `t_best` */

DROP TABLE IF EXISTS `t_best`;

CREATE TABLE `t_best` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_category` int(11) DEFAULT NULL,
  `fk_product` int(11) DEFAULT NULL,
  `sort` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `t_best` */

insert  into `t_best`(`id`,`fk_category`,`fk_product`,`sort`) values (1,1,26,NULL),(2,1,27,NULL),(3,2,26,NULL),(4,2,27,NULL),(5,3,28,NULL),(6,3,29,NULL),(7,4,26,NULL),(8,4,26,NULL),(9,4,26,NULL);

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

insert  into `t_category`(`id`,`codename`,`fk_parent`,`sort`,`path`,`image`,`status`,`is_container`,`path_sort`,`is_show_in_home`) values (1,'family',0,1,'1/',NULL,1,1,'1/',1),(2,'kid',0,2,'2/',NULL,1,1,'2/',1),(3,'food',0,3,'3/',NULL,1,1,'3/',1),(4,'gift',0,4,'4/',NULL,1,1,'4/',1),(5,'kitchen',1,1,'1/5/',NULL,1,0,'1/1/',0),(6,'scarf_fabric',1,2,'1/6/',NULL,1,0,'1/2/',0),(7,'necessities',1,3,'1/7/',NULL,1,0,'1/3/',0),(8,'family_other',1,4,'1/8/',NULL,1,0,'1/4/',0),(9,'smart_toy',2,1,'2/9/',NULL,1,0,'2/1/',0),(10,'diaper',2,2,'2/10/',NULL,1,0,'2/2/',0),(11,'kid_accessories',2,3,'2/11/',NULL,1,0,'2/3/',0),(12,'fast_food',3,1,'3/12/',NULL,1,0,'3/1/',0),(13,'dried_food',3,2,'3/13/',NULL,1,0,'3/2/',0),(14,'canned_food',3,3,'3/14/',NULL,1,0,'3/3/',0),(15,'drink',3,4,'3/15/',NULL,1,0,'3/4/',0),(16,'food_other',3,5,'3/16/',NULL,1,0,'3/5/',0),(17,'gift_traditional',4,1,'4/17/',NULL,1,0,'4/1/',0),(18,'handmade',4,2,'4/18/',NULL,1,0,'4/2/',0);

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
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `t_category_language` */

insert  into `t_category_language`(`id`,`fk_category`,`language`,`name`,`description`,`slide_images`,`side_images`,`product_section_image`) values (1,1,'EN-US','Family',NULL,'<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide.jpg\" href=\"/category/show/1\"/>\r\n</root>','<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide.jpg\" href=\"http://google.com\"/>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide.jpg\" href=\"http://google.com\"/>\r\n</root>','<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide.jpg\" href=\"/category/show/1\"/>\r\n</root>'),(2,1,'VN-VI','Gia đình','\r\n','<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide.jpg\" href=\"/category/show/1\"/>\r\n</root>','<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>','<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide.jpg\" href=\"/category/show/1\"/>\r\n</root>'),(3,2,'EN-US','Kid','','<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>','<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>','<root>\r\n	<img title=\"abc\" src=\"/images/categories/2/slide.jpg\" href=\"/category/show/2\"/>\r\n</root>'),(4,2,'VN-VI','Mẹ và bé','','<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>','<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>','<root>\r\n	<img title=\"abc\" src=\"/images/categories/2/slide.jpg\" href=\"/category/show/2\"/>\r\n</root>'),(5,3,'EN-US','Food',NULL,'<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>','<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>','<root>\r\n	<img title=\"abc\" src=\"/images/categories/3/slide.jpg\" href=\"/category/show/3\"/>\r\n</root>'),(6,3,'VN-VI','Đồ ăn',NULL,'<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>','<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>','<root>\r\n	<img title=\"abc\" src=\"/images/categories/3/slide.jpg\" href=\"/category/show/3\"/>\r\n</root>'),(7,4,'EN-US','Gift',NULL,'<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>','<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>','<root>\r\n	<img title=\"abc\" src=\"/images/categories/4/slide.jpg\" href=\"/category/show/4\"/>\r\n</root>'),(8,4,'VN-VI','Tặng phẩm',NULL,'<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>','<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>','<root>\r\n	<img title=\"abc\" src=\"/images/categories/4/slide.jpg\" href=\"/category/show/4\"/>\r\n</root>'),(9,5,'EN-US','Kitchen',NULL,'<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>','<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>','<root>\r\n	<img title=\"abc\" src=\"/images/categories/5/slide.jpg\" href=\"/category/show/5\"/>\r\n</root>'),(10,5,'VN-VI','Đồ nhà bếp',NULL,'<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>','<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>','<root>\r\n	<img title=\"abc\" src=\"/images/categories/5/slide.jpg\" href=\"/category/show/5\"/>\r\n</root>'),(11,6,'EN-US','Scarf/Fabric',NULL,'<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>','<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>','<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>'),(12,6,'VN-VI','Khăn/Vải',NULL,'<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>','<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>','<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>'),(13,7,'EN-US','Necessities',NULL,'<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>','<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>','<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>'),(14,7,'VN-VI','Đồ sinh hoạt',NULL,'<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>','<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>','<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>'),(15,8,'EN-US','Other',NULL,'<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>','<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>','<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>'),(16,8,'VN-VI','Sản phẩm khác',NULL,'<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>','<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>','<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>'),(17,10,'EN-US','Diaper',NULL,'<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>','<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>','<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>'),(18,10,'VN-VI','Tã giấy',NULL,'<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>','<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>','<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>'),(19,9,'EN-US','Smart toy',NULL,'<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>','<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>','<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>'),(20,9,'VN-VI','Đồ chơi thông minh',NULL,'<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>','<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>','<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>'),(21,11,'EN-US','Kid accessories',NULL,'<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>','<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>','<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>'),(22,11,'VN-VI','Phụ kiện trẻ em',NULL,'<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>','<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>','<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>'),(23,12,'EN-US','Fast food',NULL,'<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>','<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>','<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>'),(24,12,'VN-VI','Đồ ăn nhanh',NULL,'<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>','<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>','<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>'),(25,13,'EN-US','Dried food',NULL,'<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>','<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>','<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>'),(26,13,'VN-VI','Đồ ăn khô',NULL,'<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>','<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>','<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>'),(27,14,'EN-US','Canned food',NULL,'<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>','<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>','<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>'),(28,14,'VN-VI','Đồ hộp',NULL,'<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>','<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>','<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>'),(29,15,'EN-US','Drink',NULL,'<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>','<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>','<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>'),(30,15,'VN-VI','Đồ uống',NULL,'<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>','<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>','<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>'),(31,16,'EN-US','Other',NULL,'<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>','<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>','<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>'),(32,16,'VN-VI','Đồ ăn khác',NULL,'<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>','<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>','<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>'),(33,17,'EN-US','Traditional cloth',NULL,'<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>','<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>','<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>'),(34,17,'VN-VI','Trang phục truyền thống',NULL,'<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>','<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>','<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>'),(35,18,'EN-US','Handmade',NULL,'<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>','<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>','<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>'),(36,18,'VN-VI','Đồ thủ công',NULL,'<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>','<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>','<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>'),(37,1,'KO-KR','가족','desc','<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>','<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>','<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide.jpg\" href=\"/category/show/1\"/>\r\n</root>'),(38,2,'KO-KR','아이','desc','<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>','<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>','<root>\r\n	<img title=\"abc\" src=\"/images/categories/2/slide.jpg\" href=\"/category/show/2\"/>\r\n</root>'),(39,3,'KO-KR','음식','desc','<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>','<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>','<root>\r\n	<img title=\"abc\" src=\"/images/categories/3/slide.jpg\" href=\"/category/show/3\"/>\r\n</root>'),(40,4,'KO-KR','선물','desc','<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>','<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>','<root>\r\n	<img title=\"abc\" src=\"/images/categories/4/slide.jpg\" href=\"/category/show/4\"/>\r\n</root>'),(41,5,'KO-KR','부엌','desc','<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>','<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>','<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>'),(42,6,'KO-KR','스카프 / 직물','desc','<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>','<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>','<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>'),(43,7,'KO-KR','필수품','desc','<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>','<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>','<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>'),(44,8,'KO-KR','다른','desc','<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>','<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>','<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>'),(45,9,'KO-KR','스마트 장난감','desc','<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>','<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>','<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>'),(46,10,'KO-KR','기저귀','desc','<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>','<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>','<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>'),(47,11,'KO-KR','아이 액세서리','desc','<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>','<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>','<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>'),(48,12,'KO-KR','패스트 푸드','desc','<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>','<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>','<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>'),(49,13,'KO-KR','건조 식품','desc','<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>','<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>','<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>'),(50,14,'KO-KR','통조림','desc','<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>','<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>','<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>'),(51,15,'KO-KR','한잔','desc','<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>','<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>','<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>'),(52,16,'KO-KR','다른','desc','<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>','<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>','<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>'),(53,17,'KO-KR','전통적인 천','desc','<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>','<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>','<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>'),(54,18,'KO-KR','수공','desc','<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>','<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>','<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>');

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

/*Table structure for table `t_feature_group` */

DROP TABLE IF EXISTS `t_feature_group`;

CREATE TABLE `t_feature_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `codename` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `url` text COLLATE utf8_unicode_ci,
  `xml_language` text COLLATE utf8_unicode_ci,
  `sort` tinyint(4) DEFAULT NULL,
  `xml_image` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `t_feature_group` */

insert  into `t_feature_group`(`id`,`codename`,`url`,`xml_language`,`sort`,`xml_image`) values (1,'family','/category/show/1','<root><language id=\"VN-VI\"><name>Gia đình</name></language><language id=\"EN-US\"><name>Family</name></language><language id=\"KO-KR\"><name>가족</name></language></root>',5,'<root>\r\n	<language id=\"EN-US\">\r\n		<img src=\"/images/feature/banner01.jpg\" title=\"a\" href=\"#\"/>\r\n		<img src=\"/images/feature/banner01.jpg\" title=\"a\" href=\"#\"/>\r\n	</language>\r\n	<language id=\"VN-VI\">\r\n		<img src=\"/images/feature/banner01.jpg\" title=\"a\" href=\"#\"/>\r\n		<img src=\"/images/feature/banner01.jpg\" title=\"a\" href=\"#\"/>\r\n	</language>\r\n	<language id=\"KO-KR\">\r\n		<img src=\"/images/feature/banner01.jpg\" title=\"a\" href=\"#\"/>\r\n		<img src=\"/images/feature/banner01.jpg\" title=\"a\" href=\"#\"/>\r\n	</language>\r\n</root>'),(2,'kid','/category/show/2','<root><language id=\"VN-VI\"><name>Mẹ và bé</name></language><language id=\"EN-US\"><name>Kid</name></language><language id=\"KO-KR\"><name>아이</name></language></root>',4,'<root>\r\n	<language id=\"EN-US\">\r\n		<img src=\"/images/feature/banner01.jpg\" title=\"a\" href=\"#\"/>\r\n		<img src=\"/images/feature/banner01.jpg\" title=\"a\" href=\"#\"/>\r\n	</language>\r\n	<language id=\"VN-VI\">\r\n		<img src=\"/images/feature/banner01.jpg\" title=\"a\" href=\"#\"/>\r\n		<img src=\"/images/feature/banner01.jpg\" title=\"a\" href=\"#\"/>\r\n	</language>\r\n	<language id=\"KO-KR\">\r\n		<img src=\"/images/feature/banner01.jpg\" title=\"a\" href=\"#\"/>\r\n		<img src=\"/images/feature/banner01.jpg\" title=\"a\" href=\"#\"/>\r\n	</language>\r\n</root>'),(3,'food','/category/show/3','<root><language id=\"VN-VI\"><name>Thực phẩm</name></language><language id=\"EN-US\"><name>Food</name></language><language id=\"KO-KR\"><name>음식</name></language></root>',3,'<root>\r\n	<language id=\"EN-US\">\r\n		<img src=\"/images/feature/banner01.jpg\" title=\"a\" href=\"#\"/>\r\n		<img src=\"/images/feature/banner01.jpg\" title=\"a\" href=\"#\"/>\r\n	</language>\r\n	<language id=\"VN-VI\">\r\n		<img src=\"/images/feature/banner01.jpg\" title=\"a\" href=\"#\"/>\r\n		<img src=\"/images/feature/banner01.jpg\" title=\"a\" href=\"#\"/>\r\n	</language>\r\n	<language id=\"KO-KR\">\r\n		<img src=\"/images/feature/banner01.jpg\" title=\"a\" href=\"#\"/>\r\n		<img src=\"/images/feature/banner01.jpg\" title=\"a\" href=\"#\"/>\r\n	</language>\r\n</root>'),(4,'gift','/category/show/4','<root><language id=\"VN-VI\"><name>Quà tặng</name></language><language id=\"EN-US\"><name>Gift</name></language><language id=\"KO-KR\"><name>선물</name></language></root>',2,'<root>\r\n	<language id=\"EN-US\">\r\n		<img src=\"/images/feature/banner01.jpg\" title=\"a\" href=\"#\"/>\r\n		<img src=\"/images/feature/banner01.jpg\" title=\"a\" href=\"#\"/>\r\n	</language>\r\n	<language id=\"VN-VI\">\r\n		<img src=\"/images/feature/banner01.jpg\" title=\"a\" href=\"#\"/>\r\n		<img src=\"/images/feature/banner01.jpg\" title=\"a\" href=\"#\"/>\r\n	</language>\r\n	<language id=\"KO-KR\">\r\n		<img src=\"/images/feature/banner01.jpg\" title=\"a\" href=\"#\"/>\r\n		<img src=\"/images/feature/banner01.jpg\" title=\"a\" href=\"#\"/>\r\n	</language>\r\n</root>'),(5,'__root__',NULL,'<root><language id=\"VN-VI\"><name>Sản phẩm nổi bật</name></language><language id=\"EN-US\"><name>Feature product</name></language><language id=\"KO-KR\"><name>기능 제품</name></language></root>',1,'<root>\r\n	<language id=\"EN-US\">\r\n		<img src=\"/images/feature/banner01.jpg\" title=\"a\" href=\"#\"/>\r\n		<img src=\"/images/feature/banner01.jpg\" title=\"a\" href=\"#\"/>\r\n	</language>\r\n	<language id=\"VN-VI\">\r\n		<img src=\"/images/feature/banner01.jpg\" title=\"a\" href=\"#\"/>\r\n		<img src=\"/images/feature/banner01.jpg\" title=\"a\" href=\"#\"/>\r\n	</language>\r\n	<language id=\"KO-KR\">\r\n		<img src=\"/images/feature/banner01.jpg\" title=\"a\" href=\"#\"/>\r\n		<img src=\"/images/feature/banner01.jpg\" title=\"a\" href=\"#\"/>\r\n	</language>\r\n</root>');

/*Table structure for table `t_feature_product` */

DROP TABLE IF EXISTS `t_feature_product`;

CREATE TABLE `t_feature_product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_product` int(11) NOT NULL,
  `fk_group` int(11) NOT NULL,
  `sort` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `t_feature_product` */

insert  into `t_feature_product`(`id`,`fk_product`,`fk_group`,`sort`) values (15,1,1,NULL),(16,2,1,NULL),(17,4,1,NULL),(18,1,2,NULL),(19,2,2,NULL),(20,4,2,NULL),(21,1,3,NULL),(22,2,3,NULL),(23,4,3,NULL),(24,1,4,NULL),(25,2,4,NULL),(26,4,4,NULL),(27,1,5,NULL),(28,2,5,NULL),(29,4,5,NULL);

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
) ENGINE=InnoDB AUTO_INCREMENT=74 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `t_file` */

insert  into `t_file`(`id`,`fk_user`,`fk_parent`,`url`,`is_dir`,`date_modified`,`internal_path`,`name`) values (1,1,NULL,'/uploads/2014/3/27/image4.jpg',0,'2014-03-27 22:09:19','/uploads/2014/3/27/image4.jpg',NULL),(2,1,NULL,'/uploads/2014/3/27/image.jpg',0,'2014-03-27 22:09:19','/uploads/2014/3/27/image.jpg',NULL),(3,1,NULL,'/uploads/2014/3/27/image2.jpg',0,'2014-03-27 22:09:19','/uploads/2014/3/27/image2.jpg',NULL),(4,1,NULL,'/uploads/2014/3/27/image3.jpg',0,'2014-03-27 22:09:19','/uploads/2014/3/27/image3.jpg',NULL),(5,1,NULL,'/uploads/2014/05/20/452e9971ae0fff703dc3279d605c3817.png',0,'2014-05-20 22:30:55','/uploads/2014/05/20/452e9971ae0fff703dc3279d605c3817.png',NULL),(6,1,NULL,'/uploads/2014/05/20/ddc50e1773620024c3e0158946a47435.png',0,'2014-05-20 22:31:33','/uploads/2014/05/20/ddc50e1773620024c3e0158946a47435.png',NULL),(9,1,NULL,'/uploads/2014/05/20/ae8564fee192da10b00b78cefd09fe00.jpg',0,'2014-05-20 23:58:15','/uploads/2014/05/20/ae8564fee192da10b00b78cefd09fe00.jpg',NULL),(11,5,NULL,'/uploads/2014/06/08/71a09835536adb714fa57a856c6aea4a.jpg',0,'2014-06-08 11:43:10','uploads/2014/06/08/71a09835536adb714fa57a856c6aea4a.jpg',NULL),(13,NULL,NULL,'/uploads/2014/06/08/0c3ac241974894f459ae8c32e7d445ed.jpg',0,'2014-06-08 18:49:14','uploads/2014/06/08/0c3ac241974894f459ae8c32e7d445ed.jpg',NULL),(14,NULL,NULL,'/uploads/2014/06/09/d0fe534cfd23807c7c55e392f2763a12.jpg',0,'2014-06-09 19:28:07','uploads/2014/06/09/d0fe534cfd23807c7c55e392f2763a12.jpg',NULL),(15,NULL,NULL,'/uploads/2014/06/09/46a5dc9c10a27121e934a6fc49d7de71.jpeg',0,'2014-06-09 19:28:18','uploads/2014/06/09/46a5dc9c10a27121e934a6fc49d7de71.jpeg',NULL),(16,NULL,NULL,'/uploads/2014/06/09/eaccdabf31d56e91c37018d2a07983ad.jpeg',0,'2014-06-09 19:28:25','uploads/2014/06/09/eaccdabf31d56e91c37018d2a07983ad.jpeg',NULL),(17,NULL,NULL,'/uploads/2014/06/09/87ded0a1e9e403893ca72cf050bd4e1a.jpeg',0,'2014-06-09 19:28:36','uploads/2014/06/09/87ded0a1e9e403893ca72cf050bd4e1a.jpeg',NULL),(18,NULL,NULL,'/uploads/2014/06/09/22adfaed8f02562bce4829c3088686a3.jpg',0,'2014-06-09 19:40:24','uploads/2014/06/09/22adfaed8f02562bce4829c3088686a3.jpg',NULL),(19,NULL,NULL,'/uploads/2014/06/09/da524d09f646ff09af7723c1e9b6b342.jpeg',0,'2014-06-09 19:40:41','uploads/2014/06/09/da524d09f646ff09af7723c1e9b6b342.jpeg',NULL),(20,5,NULL,'/uploads/2014/06/09/91e39cf03370de528eb4c80e9c11ffb0.png',0,'2014-06-09 20:14:54','uploads/2014/06/09/91e39cf03370de528eb4c80e9c11ffb0.png',NULL),(21,NULL,NULL,'/uploads/2014/06/09/b2f319eb985129ca44b73eda1a34c56a.jpg',0,'2014-06-09 20:31:18','uploads/2014/06/09/b2f319eb985129ca44b73eda1a34c56a.jpg',NULL),(22,NULL,NULL,'/uploads/2014/06/09/c2e58164283218270a92e3431e57beca.jpg',0,'2014-06-09 20:31:25','uploads/2014/06/09/c2e58164283218270a92e3431e57beca.jpg',NULL),(23,NULL,NULL,'/uploads/2014/06/09/f04532775037725f0b9d854db321021a.jpg',0,'2014-06-09 21:05:20','uploads/2014/06/09/f04532775037725f0b9d854db321021a.jpg',NULL),(24,NULL,NULL,'/uploads/2014/06/09/f8d03a5299ab33e2c4ef562f6bf9e490.jpeg',0,'2014-06-09 21:05:35','uploads/2014/06/09/f8d03a5299ab33e2c4ef562f6bf9e490.jpeg',NULL),(25,NULL,NULL,'/uploads/2014/06/09/e6c1ea20da5f4310bc447a599203aedf.jpeg',0,'2014-06-09 21:06:31','uploads/2014/06/09/e6c1ea20da5f4310bc447a599203aedf.jpeg',NULL),(27,NULL,NULL,'/uploads/2014/06/09/57512f63ac025db07e26d902e14f08b8.jpg',0,'2014-06-09 21:14:24','uploads/2014/06/09/57512f63ac025db07e26d902e14f08b8.jpg',NULL),(28,NULL,NULL,'/uploads/2014/06/09/23fde5d7a488ede6f474bdb559332beb.jpg',0,'2014-06-09 21:14:39','uploads/2014/06/09/23fde5d7a488ede6f474bdb559332beb.jpg',NULL),(29,NULL,NULL,'/uploads/2014/06/13/c3025644ebf2538e465a341921827c8e.jpg',0,'2014-06-13 17:07:43','uploads/2014/06/13/c3025644ebf2538e465a341921827c8e.jpg',NULL),(30,NULL,NULL,'/uploads/2014/06/13/64030412b0be416902e7aa048ae70451.jpeg',0,'2014-06-13 17:07:49','uploads/2014/06/13/64030412b0be416902e7aa048ae70451.jpeg',NULL),(31,NULL,NULL,'/uploads/2014/06/13/363b94210e55f549e8218292e614109e.jpeg',0,'2014-06-13 17:07:56','uploads/2014/06/13/363b94210e55f549e8218292e614109e.jpeg',NULL),(32,NULL,NULL,'/uploads/2014/06/13/00be7d03f81f61bb8e7e67a240b7b16f.jpeg',0,'2014-06-13 17:08:09','uploads/2014/06/13/00be7d03f81f61bb8e7e67a240b7b16f.jpeg',NULL),(33,NULL,NULL,'/uploads/2014/06/13/fa9d524da206155c946576c641d759dc.jpg',0,'2014-06-13 19:12:36','uploads/2014/06/13/fa9d524da206155c946576c641d759dc.jpg',NULL),(34,NULL,NULL,'/uploads/2014/06/13/5e0b60a7066a5317e913f8c9fbc120c0.jpg',0,'2014-06-13 19:33:18','uploads/2014/06/13/5e0b60a7066a5317e913f8c9fbc120c0.jpg',NULL),(35,NULL,NULL,'/uploads/2014/06/13/db67785bb51b6e5c5179d33c5321d5e6.jpg',0,'2014-06-13 19:34:13','uploads/2014/06/13/db67785bb51b6e5c5179d33c5321d5e6.jpg',NULL),(36,NULL,NULL,'/uploads/2014/06/13/bf24a959ee41fbfc95a7de927429fafe.jpg',0,'2014-06-13 19:34:40','uploads/2014/06/13/bf24a959ee41fbfc95a7de927429fafe.jpg',NULL),(37,NULL,NULL,'/uploads/2014/06/13/f98e9956adf497ae3fc7e242c329208a.jpg',0,'2014-06-13 19:37:54','uploads/2014/06/13/f98e9956adf497ae3fc7e242c329208a.jpg',NULL),(38,NULL,NULL,'/uploads/2014/06/13/92594c773f713f117730d757da3649cb.jpg',0,'2014-06-13 19:37:59','uploads/2014/06/13/92594c773f713f117730d757da3649cb.jpg',NULL),(39,5,NULL,'/uploads/2014/06/15/0738acd98d367b8950e14da8581376e0.jpg',0,'2014-06-15 20:55:50','uploads/2014/06/15/0738acd98d367b8950e14da8581376e0.jpg',NULL),(40,5,NULL,'/uploads/2014/06/15/9b03e4f684e84261aadd128383ed08e6.jpg',0,'2014-06-15 20:55:50','uploads/2014/06/15/9b03e4f684e84261aadd128383ed08e6.jpg',NULL),(41,5,NULL,'/uploads/2014/06/22/7b041618b9c524a8544e19a1cefa12f5.jpg',0,'2014-06-22 10:12:20','uploads/2014/06/22/7b041618b9c524a8544e19a1cefa12f5.jpg',NULL),(43,5,NULL,'/uploads/2014/06/22/5a4553a370a90a8fc4dec495db6f40a6.jpg',0,'2014-06-22 10:26:07','uploads/2014/06/22/5a4553a370a90a8fc4dec495db6f40a6.jpg',NULL),(44,5,NULL,'/uploads/2014/06/22/ce7374ee10fe842a2405e3156b2be4f9.jpg',0,'2014-06-22 10:46:19','uploads/2014/06/22/ce7374ee10fe842a2405e3156b2be4f9.jpg',NULL),(45,5,NULL,'/uploads/2014/06/22/cc0099d1750cc2f9d5e7c8319b6035c6.jpg',0,'2014-06-22 16:42:17','uploads/2014/06/22/cc0099d1750cc2f9d5e7c8319b6035c6.jpg',NULL),(46,5,NULL,'/uploads/2014/06/22/f5bd0f515a7b87b2b2007061de06612c.jpg',0,'2014-06-22 16:52:50','uploads/2014/06/22/f5bd0f515a7b87b2b2007061de06612c.jpg',NULL),(47,5,NULL,'/uploads/2014/06/22/b01cd5ebc9d517c3d4fd03e9ac39b424.jpg',0,'2014-06-22 16:56:07','uploads/2014/06/22/b01cd5ebc9d517c3d4fd03e9ac39b424.jpg',NULL),(48,5,NULL,'/uploads/2014/06/22/11fe2ea6cf562df729022dc32ef781b2.jpg',0,'2014-06-22 16:58:08','uploads/2014/06/22/11fe2ea6cf562df729022dc32ef781b2.jpg',NULL),(49,8,NULL,'/uploads/2014/06/23/0191345f5b3291880eeb1198733eed07.jpg',0,'2014-06-23 22:56:20','uploads/2014/06/23/0191345f5b3291880eeb1198733eed07.jpg',NULL),(50,9,NULL,'/uploads/2014/06/23/49d2ef2df169265a7ef6d2e01e059b68.jpg',0,'2014-06-23 23:10:13','uploads/2014/06/23/49d2ef2df169265a7ef6d2e01e059b68.jpg',NULL),(51,12,NULL,'/uploads/2014/06/24/b9d45bde40473ecc160cf1cb20f180da.jpg',0,'2014-06-24 23:11:19','uploads/2014/06/24/b9d45bde40473ecc160cf1cb20f180da.jpg',NULL),(52,9,NULL,'/uploads/2014/06/27/883d24d1ef80011de0f784cb64cb22ec.jpg',0,'2014-06-27 22:24:41','uploads/2014/06/27/883d24d1ef80011de0f784cb64cb22ec.jpg',NULL),(54,5,NULL,'/uploads/2014/06/27/3f8097884732fbb711612082abe1b655.jpg',0,'2014-06-27 22:44:20','uploads/2014/06/27/3f8097884732fbb711612082abe1b655.jpg',NULL),(57,5,NULL,'/uploads/2014/06/27/df0018b7c284d8a4744875aad679da94.jpg',0,'2014-06-27 22:51:23','uploads/2014/06/27/df0018b7c284d8a4744875aad679da94.jpg',NULL),(58,9,NULL,'/uploads/2014/06/27/88f35c40ac03d0442f33726a60f12370.JPG',0,'2014-06-27 22:54:55','uploads/2014/06/27/88f35c40ac03d0442f33726a60f12370.JPG',NULL),(59,9,NULL,'/uploads/2014/06/28/422f108b3126057fa9c18adf4c7ffeb1.jpg',0,'2014-06-28 12:07:16','uploads/2014/06/28/422f108b3126057fa9c18adf4c7ffeb1.jpg',NULL),(60,9,NULL,'/uploads/2014/06/28/8a5b94edad8f885d2d3dfc49a1460679.jpg',0,'2014-06-28 12:20:30','uploads/2014/06/28/8a5b94edad8f885d2d3dfc49a1460679.jpg',NULL),(61,9,NULL,'/uploads/2014/06/28/815b3fba4d80a6e6fbfe30ccab3fc2fb.JPG',0,'2014-06-28 12:20:30','uploads/2014/06/28/815b3fba4d80a6e6fbfe30ccab3fc2fb.JPG',NULL),(62,9,NULL,'/uploads/2014/06/28/082cfbc93d86bd43304ee5ea60dace80.jpg',0,'2014-06-28 12:28:45','uploads/2014/06/28/082cfbc93d86bd43304ee5ea60dace80.jpg',NULL),(63,9,NULL,'/uploads/2014/06/28/af0536da1972718c8189507687dc7a07.jpg',0,'2014-06-28 16:19:29','uploads/2014/06/28/af0536da1972718c8189507687dc7a07.jpg',NULL),(65,9,NULL,'/uploads/2014/06/28/641745150d4407876f34d0fd15b7421a.JPG',0,'2014-06-28 19:10:46','uploads/2014/06/28/641745150d4407876f34d0fd15b7421a.JPG',NULL),(66,9,NULL,'/uploads/2014/07/01/bb0c97996d9faef62e590bf62d326451.jpg',0,'2014-07-01 22:08:25','uploads/2014/07/01/bb0c97996d9faef62e590bf62d326451.jpg',NULL),(67,9,NULL,'/uploads/2014/07/01/58acf0e20f830cd2282c957c6f2026f1.jpg',0,'2014-07-01 22:08:25','uploads/2014/07/01/58acf0e20f830cd2282c957c6f2026f1.jpg',NULL),(68,12,NULL,'/uploads/2014/07/01/5bfb58069a8232fb3e6c859bd0ff671c.jpeg',0,'2014-07-01 22:12:39','uploads/2014/07/01/5bfb58069a8232fb3e6c859bd0ff671c.jpeg',NULL),(69,12,NULL,'/uploads/2014/07/01/6f4a7d4e9ae3b0fc7897fcfa96701525.jpeg',0,'2014-07-01 22:14:57','uploads/2014/07/01/6f4a7d4e9ae3b0fc7897fcfa96701525.jpeg',NULL),(70,9,NULL,'/uploads/2014/07/01/e7888e4ac2dcf49cbbbad9c14dd38f03.jpg',0,'2014-07-01 22:19:06','uploads/2014/07/01/e7888e4ac2dcf49cbbbad9c14dd38f03.jpg',NULL),(71,12,NULL,'/uploads/2014/07/01/3f8f9498029c9394825a801a34d534d1.jpg',0,'2014-07-01 22:21:20','uploads/2014/07/01/3f8f9498029c9394825a801a34d534d1.jpg',NULL),(72,9,NULL,'/uploads/2014/07/01/e104e9fcd56ea2fad412f6bcc0418479.jpg',0,'2014-07-01 22:44:05','uploads/2014/07/01/e104e9fcd56ea2fad412f6bcc0418479.jpg',NULL),(73,9,NULL,'/uploads/2014/07/15/e3b3f60f535a85afde0e7f91210c538d.jpg',0,'2014-07-15 22:44:39','uploads/2014/07/15/e3b3f60f535a85afde0e7f91210c538d.jpg',NULL);

/*Table structure for table `t_hot` */

DROP TABLE IF EXISTS `t_hot`;

CREATE TABLE `t_hot` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_product` int(11) DEFAULT NULL,
  `sort` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=69 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `t_hot` */

insert  into `t_hot`(`id`,`fk_product`,`sort`) values (48,1,NULL),(49,2,NULL),(50,4,NULL),(51,5,NULL),(52,6,NULL),(53,7,NULL),(54,8,NULL),(55,9,NULL),(56,10,NULL),(57,11,NULL),(58,12,NULL),(59,13,NULL),(60,14,NULL),(61,15,NULL),(62,16,NULL),(63,17,NULL),(64,18,NULL),(65,19,NULL),(66,20,NULL),(67,21,NULL),(68,22,NULL);

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
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `t_order_evidence` */

insert  into `t_order_evidence`(`id`,`fk_user`,`checksum`,`date_created`,`date_expired`,`unique_key`) values (1,NULL,'84ccc4745a8f1bb963cc05d28c8597f6','2014-04-06 22:24:30','2014-03-09 22:24:00','1'),(3,NULL,'84ccc4745a8f1bb963cc05d28c8597f6','2014-04-06 22:40:03','2014-04-09 22:40:00',NULL),(4,NULL,'84ccc4745a8f1bb963cc05d28c8597f6','2014-04-06 22:40:39','2014-04-09 22:40:00',NULL),(5,NULL,'7607632bc67c439199acc402cd4c802e','2014-04-19 21:42:55','2014-04-22 21:42:00','4be77891125043d8bd657531923d1441'),(6,NULL,'7607632bc67c439199acc402cd4c802e','2014-04-19 21:49:16','2014-04-22 21:49:00','5ee043daba80f7c99e50b0136825d25f'),(7,NULL,'7607632bc67c439199acc402cd4c802e','2014-04-19 21:49:58','2014-04-22 21:49:00','546e6c4a24c5ef83c8127edbe0ff0d66'),(8,NULL,'7607632bc67c439199acc402cd4c802e','2014-04-19 21:53:19','2014-04-22 21:53:00','e3a78b6b9fb231e3e0bf3f16529ed2c6'),(9,NULL,'7607632bc67c439199acc402cd4c802e','2014-04-19 21:53:40','2014-04-22 21:53:00','7c8ab24fab47bef56b79073a2f6645dc'),(10,NULL,'7607632bc67c439199acc402cd4c802e','2014-04-19 21:53:51','2014-04-22 21:53:00','785c68d9ddb3e1a51681e5f6f846f2e9'),(11,NULL,'7607632bc67c439199acc402cd4c802e','2014-04-19 21:54:00','2014-04-22 21:54:00','048dac3cfc5d83309b26a417c7aab519'),(12,NULL,'60e50e483bffa68cc32ac655e6213efe','2014-04-19 21:57:03','2014-04-22 21:57:00','bef5527441ddccade83e6d622b1b11e2'),(13,NULL,'7ada60191eef25e1b931a491ffd7bcdd','2014-04-20 14:37:07','2014-04-23 14:37:00','1339362c7a8f9d73347feb1865937ab5'),(14,NULL,'29e83ad0272b828a389ad6cba7b27aa3','2014-05-12 22:28:32','2014-05-15 22:28:00','0ff5cc1180200e6c93f4ac47f181e56b'),(15,NULL,'f4762ed99e7f5f5c69cc54530550f70d','2014-05-12 23:03:39','2014-05-15 23:03:00','32a9c780cb80722f8a14e48a3fbd91ee'),(16,NULL,'f4762ed99e7f5f5c69cc54530550f70d','2014-05-12 23:08:56','2014-05-15 23:08:00','3bda1a30477647720d198f9625f97fe2'),(17,NULL,'ca8dfbd276661dc67fe25ed1b72c4e15','2014-05-15 12:49:16','2014-05-18 12:49:00','fff07eaee6bd6de274776d9a0d730d52'),(18,NULL,'bf29aadc447503bcce0a0ef09e1c591f','2014-05-17 14:32:01','2014-05-20 14:32:00','0e7b2a18d329675005996f07ae0e03cf'),(19,NULL,'8952c2bb94b48588b6cae68d8b8a6b52','2014-05-17 21:09:32','2014-05-20 21:09:00','7e0be4f3d22ba62457984e921cdfa518'),(20,5,'752b4babd43cf73df84261150ebafbb3','2014-06-09 20:49:05','2014-06-12 20:49:00','7134981fdda16b1a0c7ce7b1cbf8d190'),(21,5,'0021aea4eecbd4289e0fd50a241b7ed3','2014-06-22 18:05:02','2014-06-25 18:05:00','31af32eb5f933fe014a234b3b07c5843'),(22,5,'1bc237975ed6dc9e94b37d88584b63aa','2014-06-22 18:14:10','2014-06-25 18:14:00','f519eeb0edb31a723f63753fb45dd2e0'),(23,5,'2a68cf4f902a8bc64889761b5e5ed4d9','2014-06-23 23:33:40','2014-06-26 23:33:00','c8e4105da3f8a24fa064f9637719aa25'),(24,5,'ea72c23e5d30660cca9933b9cbbd7333','2014-06-23 23:35:25','2014-06-26 23:35:00','45980adb01125b3dcc93f43de8b7c1ab'),(25,9,'5c7d6a5c61cc087dadb6abf84001685f','2014-06-23 23:46:04','2014-06-26 23:46:00','8967afb5991a77af2f7f1402b1935c75'),(26,12,'aec1ad420297eb88b6adea6eb45718f0','2014-06-24 22:44:39','2014-06-27 22:44:00','b06b391133dfdb90dce0548bda6fe1b2'),(27,12,'a05ad512fd0e61c652f7acda0641ade2','2014-06-24 22:49:34','2014-06-27 22:49:00','d02d92fc89d058e1311ab6297ad0028a'),(28,5,'c637708a909771d0980f7890d8ab9a3d','2014-06-24 23:29:44','2014-06-27 23:29:00','e50cdf4d3ee27b70aca5eb2621560825'),(29,9,'21a4ac45f94db929adf1c1bb86980b70','2014-06-24 23:48:05','2014-06-27 23:48:00','99137176c6ed7c490b1ba1e438567e52'),(30,9,'21a4ac45f94db929adf1c1bb86980b70','2014-06-24 23:49:05','2014-06-27 23:49:00','ec25918d5e047f15a4603d59b1ea6cd8'),(31,5,'158545ea3d9556c8d743b0dafd204780','2014-06-24 23:57:17','2014-06-27 23:57:00','fca168cab33d995eb9208fef932788f4'),(32,NULL,'2a447106d596f2b3c67d23a0e1f34501','2014-06-25 21:42:57','2014-06-28 21:42:00','15669803fc7a9471c19f2d78805ab905'),(33,NULL,'2a447106d596f2b3c67d23a0e1f34501','2014-06-25 21:43:18','2014-06-28 21:43:00','13402cc2e035d13e7475ba260de0ad04'),(34,NULL,'d2812ba655366ade08c1bae7f635a8f3','2014-06-25 22:05:12','2014-06-28 22:05:00','15fa5672e40936cee4d43349317e4c34'),(35,NULL,'ca86701d9066865b93de81bbeffe0e0a','2014-06-25 22:21:57','2014-06-28 22:21:00','b362fa2b46a6756ec86a2b82c965afd5'),(36,5,'dc38321b9016a326ef265585c60e0db8','2014-06-27 21:54:26','2014-06-30 21:54:00','992abd985bfaeb1d9922bad7ef47aad1'),(37,5,'69a64061f41ccc86b399241a90815941','2014-06-28 12:12:46','2014-07-01 12:12:00','65227b30e86a4b3f7b9cd1fedbea0e91'),(38,5,'694f58f7a84f8729b3bf7db71de8242c','2014-06-28 14:46:17','2014-07-01 14:46:00','c6eac23729daef2e9044a01d989605b5'),(39,5,'16f7edc97e38c32897d0e30848c809b9','2014-06-28 14:54:05','2014-07-01 14:54:00','a4f30ed3c11bff78154f391d0eedaf62'),(40,6,'4b426cd17ea98f5535b33c6e8dd98208','2014-06-28 15:19:04','2014-07-01 15:19:00','17a448c2fc3c88a2ecb56832e3b4eae4'),(41,5,'ce5280b02fdd70fc88e3a00e71efdc8a','2014-06-28 19:16:45','2014-07-01 19:16:00','41ec1f023b2e08ffd300c2a55a70d87e'),(42,5,'345a000dde25ff882419fdcc3257c86f','2014-06-28 19:19:04','2014-07-01 19:19:00','3ba260567c87197fbb77afaef0fb8cd5'),(43,5,'345a000dde25ff882419fdcc3257c86f','2014-06-28 19:19:59','2014-07-01 19:19:00','4b4dc39de250fe768d59d2d5cae212bb'),(44,5,'ce5280b02fdd70fc88e3a00e71efdc8a','2014-06-28 19:27:49','2014-07-01 19:27:00','5eac2ba8e53a41779126e7501a385c07'),(45,5,'18a81a57d28fc066df5f2596c2c8de5a','2014-06-28 19:41:55','2014-07-01 19:41:00','22d20e2146dc6bfeba02a4b1155dd563'),(46,5,'2fce4007f508b309f72dc0c6b083df22','2014-06-28 19:50:34','2014-07-01 19:50:00','0afd524d06d03c6727663bfc5a438090'),(47,5,'153957eb7cd692fd93475fd3dbc1824f','2014-06-28 20:06:18','2014-07-01 20:06:00','8e9335a099eeb8790805c38519250ab9'),(48,NULL,'bb980908bc06e53227d57f7965a1128b','2014-06-28 21:36:16','2014-07-01 21:36:00','a162c555b84ce7dbf0450dc0d552dcf7'),(49,5,'9c73c3bbda6fd6e1ae3090531f44f120','2014-06-28 23:35:31','2014-07-01 23:35:00','ba3ced759291f510871bbcca3a7261c4'),(50,5,'ff2a469d4a1121d482e5c9e33e2c2daf','2014-06-28 23:37:02','2014-07-01 23:37:00','2df03b750471538af41add584b028cab'),(51,5,'3785925013f8cf67e31b561f729619d9','2014-06-28 23:39:04','2014-07-01 23:39:00','f5821d98f9baf83f1888170c790ccb73'),(52,9,'6432b93256b2bc657c5d7634b5a2a4fc','2014-07-01 23:47:06','2014-07-04 23:47:00','fae10eded5feca597ad9610508d55298');

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
) ENGINE=InnoDB AUTO_INCREMENT=1045 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `t_pin` */

insert  into `t_pin`(`id`,`fk_user`,`fk_product`) values (1038,5,14),(1037,5,15),(1042,7,4),(1044,9,2),(1043,9,9);

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
  `price` double DEFAULT NULL,
  `price_origin` double DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `t_product` */

insert  into `t_product`(`id`,`fk_category`,`fk_seller`,`fk_group`,`is_group`,`discount`,`date_created`,`count_pin`,`status`,`price`,`price_origin`) values (1,5,1,NULL,0,0,'2014-06-22 10:26:07',0,1,1800,1440),(2,12,1,NULL,0,0,'2014-06-22 10:46:19',0,1,1800,1440),(4,12,1,NULL,0,0,'2014-06-22 16:42:17',0,1,1800,1440),(5,8,1,NULL,0,0,'2014-06-22 16:52:50',0,1,1800,1440),(6,9,1,NULL,0,0,'2014-06-22 16:56:07',0,1,1800,1440),(7,9,1,NULL,0,0,'2014-06-22 16:58:08',0,1,900000,720000),(8,18,1,NULL,0,0,'2014-06-23 22:56:20',0,1,1350000,1080000),(9,18,3,NULL,0,0,'2014-06-23 23:10:13',0,1,1800,1440),(10,11,2,NULL,0,0,'2014-06-24 23:11:19',0,-1,0,0),(11,5,3,NULL,0,0,'2014-06-27 22:24:41',0,1,1800,1440),(12,5,3,NULL,0,0,'2014-06-28 12:07:16',0,1,1800,1440),(13,5,3,NULL,0,0,'2014-06-28 12:20:30',0,1,1800,1440),(14,5,3,NULL,0,0,'2014-06-28 12:28:45',0,-1,NULL,NULL),(15,5,3,NULL,0,0,'2014-06-28 16:19:29',0,1,1800,1440),(16,6,3,NULL,0,0,'2014-06-28 17:29:46',0,1,1800,1440),(17,11,3,NULL,0,0,'2014-07-01 22:08:25',0,1,270000000,216000000),(18,10,2,NULL,0,0,'2014-07-01 22:12:39',0,1,1800,1440),(19,9,3,NULL,0,0,'2014-07-01 22:19:06',0,1,8999999999,7199999999),(20,11,2,NULL,0,0,'2014-07-01 22:21:20',0,1,1800,1440),(21,15,3,NULL,0,0,'2014-07-01 22:44:05',0,1,1800,1440),(22,12,3,NULL,0,0,'2014-07-15 22:44:39',0,0,NULL,NULL);

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
) ENGINE=InnoDB AUTO_INCREMENT=468 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `t_product_attribute` */

insert  into `t_product_attribute`(`id`,`fk_product`,`fk_attribute_type`,`value_number`,`value_enum`,`value_text`,`language`,`value_varchar`) values (1,1,1,NULL,NULL,NULL,'VN-VI','Áo voan ngắn tay thuê hoa viền hạt'),(2,1,20,NULL,0,NULL,NULL,NULL),(3,1,18,NULL,NULL,NULL,NULL,''),(4,1,13,10,NULL,NULL,NULL,NULL),(5,1,1,NULL,NULL,NULL,'KO-KR','반소매 쉬폰 꽃 구슬 테두리에게 대여'),(6,1,24,NULL,0,NULL,NULL,NULL),(7,1,14,0,NULL,NULL,NULL,NULL),(8,1,2,NULL,NULL,'','KO-KR',NULL),(9,1,26,NULL,NULL,'',NULL,NULL),(10,1,11,2000,NULL,NULL,NULL,NULL),(11,1,27,0,NULL,NULL,NULL,NULL),(12,1,28,0,NULL,NULL,NULL,NULL),(13,1,29,NULL,0,NULL,NULL,NULL),(14,1,30,NULL,0,NULL,NULL,NULL),(15,1,31,0,NULL,NULL,NULL,NULL),(16,1,32,0,NULL,NULL,NULL,NULL),(17,1,33,0,NULL,NULL,NULL,NULL),(18,1,21,NULL,NULL,NULL,NULL,''),(19,1,22,NULL,NULL,'',NULL,NULL),(20,1,23,NULL,NULL,'',NULL,NULL),(21,1,1,NULL,NULL,NULL,'EN-US','Rent short-sleeved chiffon flower bead border'),(22,1,2,NULL,NULL,'<p>AK080: short-sleeved chiffon dresses flower border leasing particles (Guangzhou row): 249k&nbsp;<br />\nSize M, L. Color cream&nbsp;<br />\nSelected products at factory direct Guangzhou, also stamp, so she can rest assured about the quality of the product offline ^ ^ KO TO FAKE PRODUCTS, restaurant-like 100%&nbsp;<br />\nMaterial: chiffon silk smooth, floating flowers rent, beautiful antique beads border, every beautiful quality of her okay!</p>\n','EN-US',NULL),(23,2,1,NULL,NULL,NULL,'VN-VI','Thịt thăn xông khói, nấm tươi & pho mát mozzarella ( prosciuitto e funghi )'),(24,2,20,NULL,0,NULL,NULL,NULL),(25,2,18,NULL,NULL,NULL,NULL,''),(26,2,13,10,NULL,NULL,NULL,NULL),(27,2,1,NULL,NULL,NULL,'EN-US','Pizza & cheese'),(28,2,24,NULL,0,NULL,NULL,NULL),(29,2,14,0,NULL,NULL,NULL,NULL),(30,2,2,NULL,NULL,'','EN-US',NULL),(31,2,26,NULL,NULL,'',NULL,NULL),(32,2,11,2000,NULL,NULL,NULL,NULL),(33,2,27,0,NULL,NULL,NULL,NULL),(34,2,28,0,NULL,NULL,NULL,NULL),(35,2,29,NULL,0,NULL,NULL,NULL),(36,2,30,NULL,0,NULL,NULL,NULL),(37,2,31,0,NULL,NULL,NULL,NULL),(38,2,32,0,NULL,NULL,NULL,NULL),(39,2,33,0,NULL,NULL,NULL,NULL),(40,2,21,NULL,NULL,NULL,NULL,''),(41,2,22,NULL,NULL,'',NULL,NULL),(42,2,23,NULL,NULL,'',NULL,NULL),(43,2,1,NULL,NULL,NULL,'KO-KR','피자 & 치즈'),(44,2,2,NULL,NULL,'','KO-KR',NULL),(47,4,1,NULL,NULL,NULL,'VN-VI','Thăn Bò Úc Nướng Trên Đá, Với Sốt Tùy Chọn: Sốt Bạc Hà/ Sốt Tiêu Đen'),(48,4,13,10,NULL,NULL,NULL,NULL),(49,4,34,NULL,NULL,NULL,NULL,''),(50,4,20,NULL,0,NULL,NULL,NULL),(51,4,18,NULL,NULL,NULL,NULL,''),(52,4,24,NULL,0,NULL,NULL,NULL),(53,4,14,0,NULL,NULL,NULL,NULL),(54,4,2,NULL,NULL,'','VN-VI',NULL),(55,4,26,NULL,NULL,'',NULL,NULL),(56,4,11,2000,NULL,NULL,NULL,NULL),(57,4,27,0,NULL,NULL,NULL,NULL),(58,4,28,0,NULL,NULL,NULL,NULL),(59,4,29,NULL,0,NULL,NULL,NULL),(60,4,30,NULL,0,NULL,NULL,NULL),(61,4,31,0,NULL,NULL,NULL,NULL),(62,4,32,0,NULL,NULL,NULL,NULL),(63,4,33,0,NULL,NULL,NULL,NULL),(64,4,21,NULL,NULL,NULL,NULL,''),(65,4,22,NULL,NULL,'',NULL,NULL),(66,4,23,NULL,NULL,'',NULL,NULL),(67,4,1,NULL,NULL,NULL,'EN-US','Stone fried states'),(68,4,2,NULL,NULL,'','EN-US',NULL),(69,4,1,NULL,NULL,NULL,'KO-KR','Stone fried states'),(70,4,2,NULL,NULL,'','KO-KR',NULL),(71,5,1,NULL,NULL,NULL,'VN-VI','Giày cao gót cô dâu'),(72,5,13,1000,NULL,NULL,NULL,NULL),(73,5,34,NULL,NULL,NULL,NULL,'Gucci'),(74,5,20,NULL,0,NULL,NULL,NULL),(75,5,18,NULL,NULL,NULL,NULL,''),(76,5,24,NULL,0,NULL,NULL,NULL),(77,5,14,0,NULL,NULL,NULL,NULL),(78,5,2,NULL,NULL,'','VN-VI',NULL),(79,5,26,NULL,NULL,'',NULL,NULL),(80,5,11,2000,NULL,NULL,NULL,NULL),(81,5,27,0,NULL,NULL,NULL,NULL),(82,5,28,0,NULL,NULL,NULL,NULL),(83,5,29,NULL,0,NULL,NULL,NULL),(84,5,30,NULL,0,NULL,NULL,NULL),(85,5,31,0,NULL,NULL,NULL,NULL),(86,5,32,0,NULL,NULL,NULL,NULL),(87,5,33,0,NULL,NULL,NULL,NULL),(88,5,21,NULL,NULL,NULL,NULL,''),(89,5,22,NULL,NULL,'',NULL,NULL),(90,5,23,NULL,NULL,'',NULL,NULL),(91,5,1,NULL,NULL,NULL,'EN-US','High heels for bride'),(92,5,2,NULL,NULL,'','EN-US',NULL),(93,5,1,NULL,NULL,NULL,'KO-KR','신부를위한 하이힐'),(94,5,2,NULL,NULL,'','KO-KR',NULL),(95,6,1,NULL,NULL,NULL,'VN-VI','Ô tô đồ chơi'),(96,6,13,1000,NULL,NULL,NULL,NULL),(97,6,34,NULL,NULL,NULL,NULL,''),(98,6,20,NULL,0,NULL,NULL,NULL),(99,6,18,NULL,NULL,NULL,NULL,''),(100,6,1,NULL,NULL,NULL,'EN-US','Toy car'),(101,6,24,NULL,0,NULL,NULL,NULL),(102,6,14,0,NULL,NULL,NULL,NULL),(103,6,2,NULL,NULL,'','EN-US',NULL),(104,6,26,NULL,NULL,'',NULL,NULL),(105,6,11,2000,NULL,NULL,NULL,NULL),(106,6,27,0,NULL,NULL,NULL,NULL),(107,6,28,0,NULL,NULL,NULL,NULL),(108,6,29,NULL,0,NULL,NULL,NULL),(109,6,30,NULL,0,NULL,NULL,NULL),(110,6,31,0,NULL,NULL,NULL,NULL),(111,6,32,0,NULL,NULL,NULL,NULL),(112,6,33,0,NULL,NULL,NULL,NULL),(113,6,21,NULL,NULL,NULL,NULL,''),(114,6,22,NULL,NULL,'',NULL,NULL),(115,6,23,NULL,NULL,'',NULL,NULL),(116,6,1,NULL,NULL,NULL,'KO-KR','장난감 자동차'),(117,6,2,NULL,NULL,'','KO-KR',NULL),(118,6,2,NULL,NULL,'','VN-VI',NULL),(119,7,1,NULL,NULL,NULL,'VN-VI','Bộ đồ chơi tàu hỏa'),(120,7,13,6000,NULL,NULL,NULL,NULL),(121,7,34,NULL,NULL,NULL,NULL,''),(122,7,20,NULL,0,NULL,NULL,NULL),(123,7,18,NULL,NULL,NULL,NULL,''),(124,7,24,NULL,0,NULL,NULL,NULL),(125,7,14,0,NULL,NULL,NULL,NULL),(126,7,2,NULL,NULL,'','VN-VI',NULL),(127,7,26,NULL,NULL,'',NULL,NULL),(128,7,11,1000000,NULL,NULL,NULL,NULL),(129,7,27,0,NULL,NULL,NULL,NULL),(130,7,28,0,NULL,NULL,NULL,NULL),(131,7,29,NULL,0,NULL,NULL,NULL),(132,7,30,NULL,0,NULL,NULL,NULL),(133,7,31,0,NULL,NULL,NULL,NULL),(134,7,32,0,NULL,NULL,NULL,NULL),(135,7,33,0,NULL,NULL,NULL,NULL),(136,7,21,NULL,NULL,NULL,NULL,''),(137,7,22,NULL,NULL,'',NULL,NULL),(138,7,23,NULL,NULL,'',NULL,NULL),(139,7,1,NULL,NULL,NULL,'EN-US','Train toy set'),(140,7,2,NULL,NULL,'','EN-US',NULL),(141,7,1,NULL,NULL,NULL,'KO-KR','기차 장난감 세트'),(142,7,2,NULL,NULL,'','KO-KR',NULL),(143,8,1,NULL,NULL,NULL,'VN-VI','Kerlouan Tóm tắt gốc Hand Painted 24 '),(144,8,13,1,NULL,NULL,NULL,NULL),(145,8,34,NULL,NULL,NULL,NULL,''),(146,8,20,NULL,0,NULL,NULL,NULL),(147,8,18,NULL,NULL,NULL,NULL,''),(148,8,24,NULL,0,NULL,NULL,NULL),(149,8,14,0,NULL,NULL,NULL,NULL),(150,8,2,NULL,NULL,'','VN-VI',NULL),(151,8,26,NULL,NULL,'',NULL,NULL),(152,8,11,1500000,NULL,NULL,NULL,NULL),(153,8,27,0,NULL,NULL,NULL,NULL),(154,8,28,0,NULL,NULL,NULL,NULL),(155,8,29,NULL,0,NULL,NULL,NULL),(156,8,30,NULL,0,NULL,NULL,NULL),(157,8,31,0,NULL,NULL,NULL,NULL),(158,8,32,0,NULL,NULL,NULL,NULL),(159,8,33,0,NULL,NULL,NULL,NULL),(160,8,21,NULL,NULL,NULL,NULL,''),(161,8,22,NULL,NULL,'',NULL,NULL),(162,8,23,NULL,NULL,'',NULL,NULL),(163,8,1,NULL,NULL,NULL,'EN-US','Kerlouan Abstract Original Hand Painted 24\"x36\" Oil Painting'),(164,8,2,NULL,NULL,'','EN-US',NULL),(165,8,1,NULL,NULL,NULL,'KO-KR','Kerlouan 추상 원래 손으로 그린 24 '),(166,8,2,NULL,NULL,'','KO-KR',NULL),(167,9,1,NULL,NULL,NULL,'VN-VI','Bộ sản phẩm noel'),(168,9,13,2,NULL,NULL,NULL,NULL),(169,9,34,NULL,NULL,NULL,NULL,''),(170,9,20,NULL,0,NULL,NULL,NULL),(171,9,18,NULL,NULL,NULL,NULL,''),(172,9,24,NULL,0,NULL,NULL,NULL),(173,9,14,0,NULL,NULL,NULL,NULL),(174,9,2,NULL,NULL,'','VN-VI',NULL),(175,9,26,NULL,NULL,'',NULL,NULL),(176,9,11,2000,NULL,NULL,NULL,NULL),(177,9,27,30,NULL,NULL,NULL,NULL),(178,9,28,9999,NULL,NULL,NULL,NULL),(179,9,29,NULL,0,NULL,NULL,NULL),(180,9,30,NULL,0,NULL,NULL,NULL),(181,9,31,0,NULL,NULL,NULL,NULL),(182,9,32,0,NULL,NULL,NULL,NULL),(183,9,33,0,NULL,NULL,NULL,NULL),(184,9,21,NULL,NULL,NULL,NULL,''),(185,9,22,NULL,NULL,'',NULL,NULL),(186,9,23,NULL,NULL,'',NULL,NULL),(187,9,1,NULL,NULL,NULL,'EN-US','Noel gift set'),(188,9,2,NULL,NULL,'','EN-US',NULL),(189,9,1,NULL,NULL,NULL,'KO-KR','노엘 선물 세트'),(190,9,2,NULL,NULL,'','KO-KR',NULL),(191,10,1,NULL,NULL,NULL,'VN-VI','Pigeon Mag Mag PM50004'),(192,10,13,12,NULL,NULL,NULL,NULL),(193,10,34,NULL,NULL,NULL,NULL,''),(194,10,20,NULL,0,NULL,NULL,NULL),(195,10,18,NULL,NULL,NULL,NULL,''),(196,10,24,NULL,0,NULL,NULL,NULL),(197,10,14,0,NULL,NULL,NULL,NULL),(198,10,2,NULL,NULL,'<p>Sở hữu kiểu d&aacute;ng gọn nhẹ v&agrave; tiện dụng, ly ống h&uacute;t <strong>Pigeon Mag Mag PM50004</strong> l&agrave; lựa chọn l&yacute; tưởng để gi&uacute;p b&eacute; tập c&aacute;ch tự uống nước v&agrave; uống sữa. Ly được l&agrave;m từ chất liệu an to&agrave;n kết hợp ống h&uacute;t mềm, tạo cảm gi&aacute;c thoải m&aacute;i v&agrave; dễ chịu tuyệt đối cho b&eacute; khi sử dụng. Hơn thế nữa, với thiết kế c&oacute; quai cầm hai b&ecirc;n, b&eacute; c&oacute; thể dễ d&agrave;ng tự cầm lấy ly của m&igrave;nh m&agrave; kh&ocirc;ng cần nhờ đến sự trợ gi&uacute;p của ba mẹ. Với <strong>Pigeon Mag Mag PM50004</strong>, bạn kh&ocirc;ng chỉ chăm s&oacute;c b&eacute; tốt hơn m&agrave; c&ograve;n r&egrave;n luyện cho b&eacute; t&iacute;nh tự lập ngay từ những năm th&aacute;ng đầu đời.</p>\n','VN-VI',NULL),(199,10,26,NULL,NULL,'<p><strong>Chất liệu an to&agrave;n</strong><br />\nLy v&ograve;i h&uacute;t được l&agrave;m từ chất liệu an to&agrave;n, tuyệt kh&ocirc;ng g&acirc;y hại đến sức khỏe của b&eacute;, lại dễ d&agrave;ng vệ sinh v&agrave; ch&ugrave;i rửa để l&agrave;m sạch.</p>\n\n<p><strong>Ống h&uacute;t si&ecirc;u mềm</strong><br />\nSản phẩm c&oacute; ống h&uacute;t si&ecirc;u mềm, tạo cho b&eacute; cảm gi&aacute;c thoải m&aacute;i như khi b&uacute; sữa.</p>\n\n<p><strong>Thiết kế nhỏ gọn, tiện dụng</strong><br />\nVới kiểu d&aacute;ng tiện dụng, ly c&oacute; thể đồng h&agrave;nh c&ugrave;ng b&eacute; mọi l&uacute;c mọi nơi.</p>\n\n<p><strong>Hướng dẫn sử dụng v&agrave; bảo quản</strong><br />\n- Lu&ocirc;n rửa sạch v&agrave; tiệt tr&ugrave;ng ly v&agrave; n&uacute;m ti trước khi sử dụng.<br />\n- Rửa ly bằng dung dịch s&uacute;c rửa b&igrave;nh sữa v&agrave; n&uacute;m ti, đun s&ocirc;i từ 3 &ndash; 5 ph&uacute;t hay tiệt tr&ugrave;ng bằng l&ograve; vi s&oacute;ng, m&aacute;y tiệt tr&ugrave;ng.<br />\n- Bảo quản nơi kh&ocirc; r&aacute;o, tho&aacute;ng m&aacute;t.<br />\n- Kh&ocirc;ng n&ecirc;n chứa chất lỏng trong ly v&agrave; cho v&agrave;o tủ đ&ocirc;ng v&igrave; ly dễ vỡ khi rơi.<br />\n- Kh&ocirc;ng n&ecirc;n chứa nước n&oacute;ng tr&ecirc;n 60&deg;C trong ly nhằm tr&aacute;nh bị bỏng do nước chảy ngược từ ống ra ngo&agrave;i.<br />\n- Hạn sử dụng: 5 năm kể từ ng&agrave;y sản xuất.</p>\n',NULL,NULL),(200,10,11,0,NULL,NULL,NULL,NULL),(201,10,27,0,NULL,NULL,NULL,NULL),(202,10,28,0,NULL,NULL,NULL,NULL),(203,10,29,NULL,0,NULL,NULL,NULL),(204,10,30,NULL,0,NULL,NULL,NULL),(205,10,31,0,NULL,NULL,NULL,NULL),(206,10,32,0,NULL,NULL,NULL,NULL),(207,10,33,0,NULL,NULL,NULL,NULL),(208,10,21,NULL,NULL,NULL,NULL,''),(209,10,22,NULL,NULL,'',NULL,NULL),(210,10,23,NULL,NULL,'',NULL,NULL),(211,2,34,NULL,NULL,NULL,NULL,''),(212,2,2,NULL,NULL,'','VN-VI',NULL),(213,11,1,NULL,NULL,NULL,'VN-VI','Dao cắt bánh IKEA'),(214,11,13,10,NULL,NULL,NULL,NULL),(215,11,34,NULL,NULL,NULL,NULL,'IKEA'),(216,11,20,NULL,0,NULL,NULL,NULL),(217,11,18,NULL,NULL,NULL,NULL,''),(218,11,24,NULL,0,NULL,NULL,NULL),(219,11,14,0,NULL,NULL,NULL,NULL),(220,11,2,NULL,NULL,'<p>Dao cắt Pizza của IKEA bền, đẹp, tiện lợi</p>\n','VN-VI',NULL),(221,11,26,NULL,NULL,'',NULL,NULL),(222,11,11,2000,NULL,NULL,NULL,NULL),(223,11,27,7,NULL,NULL,NULL,NULL),(224,11,28,7,NULL,NULL,NULL,NULL),(225,11,29,NULL,28,NULL,NULL,NULL),(226,11,30,NULL,28,NULL,NULL,NULL),(227,11,31,0,NULL,NULL,NULL,NULL),(228,11,32,0,NULL,NULL,NULL,NULL),(229,11,33,0,NULL,NULL,NULL,NULL),(230,11,21,NULL,NULL,NULL,NULL,''),(231,11,22,NULL,NULL,'',NULL,NULL),(232,11,23,NULL,NULL,'',NULL,NULL),(233,11,1,NULL,NULL,NULL,'EN-US','Pizza Cutter - IKEA'),(234,11,2,NULL,NULL,'','EN-US',NULL),(235,11,1,NULL,NULL,NULL,'KO-KR','피자 커터 IKEA'),(236,11,2,NULL,NULL,'','KO-KR',NULL),(237,1,34,NULL,NULL,NULL,NULL,''),(238,1,2,NULL,NULL,'','VN-VI',NULL),(239,12,1,NULL,NULL,NULL,'VN-VI','Lọ đựng nước rửa bát BESTÅENDE - IKEA'),(240,12,13,10,NULL,NULL,NULL,NULL),(241,12,34,NULL,NULL,NULL,NULL,'IKEA'),(242,12,20,NULL,0,NULL,NULL,NULL),(243,12,18,NULL,NULL,NULL,NULL,''),(244,12,24,NULL,0,NULL,NULL,NULL),(245,12,14,0,NULL,NULL,NULL,NULL),(246,12,2,NULL,NULL,'<p><strong>Chất liệu thủy tinh, chiều cao 16,5cm. Dung t&iacute;ch 350ml</strong></p>\n','VN-VI',NULL),(247,12,26,NULL,NULL,'',NULL,NULL),(248,12,11,2000,NULL,NULL,NULL,NULL),(249,12,27,0,NULL,NULL,NULL,NULL),(250,12,28,0,NULL,NULL,NULL,NULL),(251,12,29,NULL,28,NULL,NULL,NULL),(252,12,30,NULL,28,NULL,NULL,NULL),(253,12,31,0,NULL,NULL,NULL,NULL),(254,12,32,0,NULL,NULL,NULL,NULL),(255,12,33,0,NULL,NULL,NULL,NULL),(256,12,21,NULL,NULL,NULL,NULL,''),(257,12,22,NULL,NULL,'',NULL,NULL),(258,12,23,NULL,NULL,'',NULL,NULL),(259,12,1,NULL,NULL,NULL,'EN-US','dishwashing liquid bottle BESTÅENDE - IKEA'),(260,12,2,NULL,NULL,'','EN-US',NULL),(261,12,1,NULL,NULL,NULL,'KO-KR','액체 병 설거지 BESTÅENDE - IKEA'),(262,12,2,NULL,NULL,'','KO-KR',NULL),(263,13,1,NULL,NULL,NULL,'VN-VI','Khay sứ nướng VITLING - IKEA'),(264,13,13,10,NULL,NULL,NULL,NULL),(265,13,34,NULL,NULL,NULL,NULL,'IKEA'),(266,13,20,NULL,0,NULL,NULL,NULL),(267,13,18,NULL,NULL,NULL,NULL,''),(268,13,24,NULL,0,NULL,NULL,NULL),(269,13,14,0,NULL,NULL,NULL,NULL),(270,13,2,NULL,NULL,'<p><strong>K&iacute;ch thước 29x40cm, sử dụng được với l&ograve; nướng, l&ograve; vi s&oacute;ng</strong></p>\n','VN-VI',NULL),(271,13,26,NULL,NULL,'',NULL,NULL),(272,13,11,2000,NULL,NULL,NULL,NULL),(273,13,27,7,NULL,NULL,NULL,NULL),(274,13,28,15,NULL,NULL,NULL,NULL),(275,13,29,NULL,28,NULL,NULL,NULL),(276,13,30,NULL,28,NULL,NULL,NULL),(277,13,31,0,NULL,NULL,NULL,NULL),(278,13,32,0,NULL,NULL,NULL,NULL),(279,13,33,0,NULL,NULL,NULL,NULL),(280,13,21,NULL,NULL,NULL,NULL,''),(281,13,22,NULL,NULL,'',NULL,NULL),(282,13,23,NULL,NULL,'',NULL,NULL),(283,13,1,NULL,NULL,NULL,'EN-US','Porcelain Baking Tray '),(284,13,2,NULL,NULL,'<p>Easy use for mircrowave, baking oven</p>\n','EN-US',NULL),(285,13,1,NULL,NULL,NULL,'KO-KR','도자기 베이킹 트레이 VITLING - IKEA'),(286,13,2,NULL,NULL,'<p>전자 레인지, 오븐에 사용</p>\n','KO-KR',NULL),(287,14,1,NULL,NULL,NULL,'VN-VI','Lót tay IRIS - IKEA'),(288,14,13,10,NULL,NULL,NULL,NULL),(289,14,34,NULL,NULL,NULL,NULL,'IKEA'),(290,14,20,NULL,0,NULL,NULL,NULL),(291,14,18,NULL,NULL,NULL,NULL,''),(292,15,1,NULL,NULL,NULL,'VN-VI','Cốc thủy tinh SKOJA - IKEA'),(293,15,13,10,NULL,NULL,NULL,NULL),(294,15,34,NULL,NULL,NULL,NULL,'IKEA'),(295,15,20,NULL,0,NULL,NULL,NULL),(296,15,18,NULL,NULL,NULL,NULL,''),(297,15,24,NULL,0,NULL,NULL,NULL),(298,15,14,0,NULL,NULL,NULL,NULL),(299,15,2,NULL,NULL,'<p><strong>Chiều cao 10cm, dung t&iacute;ch 310ml</strong></p>\n','VN-VI',NULL),(300,15,26,NULL,NULL,'',NULL,NULL),(301,15,11,2000,NULL,NULL,NULL,NULL),(302,15,27,0,NULL,NULL,NULL,NULL),(303,15,28,0,NULL,NULL,NULL,NULL),(304,15,29,NULL,0,NULL,NULL,NULL),(305,15,30,NULL,0,NULL,NULL,NULL),(306,15,31,0,NULL,NULL,NULL,NULL),(307,15,32,0,NULL,NULL,NULL,NULL),(308,15,33,0,NULL,NULL,NULL,NULL),(309,15,21,NULL,NULL,NULL,NULL,''),(310,15,22,NULL,NULL,'',NULL,NULL),(311,15,23,NULL,NULL,'',NULL,NULL),(312,15,1,NULL,NULL,NULL,'KO-KR','유리 SKOJA - IKEA'),(313,15,2,NULL,NULL,'','KO-KR',NULL),(314,15,1,NULL,NULL,NULL,'EN-US','SKOJA Glass - IKEA'),(315,15,2,NULL,NULL,'','EN-US',NULL),(316,16,1,NULL,NULL,NULL,'VN-VI','Khăn mặt 30x30cm HÄREN - IKEA'),(317,16,13,10,NULL,NULL,NULL,NULL),(318,16,34,NULL,NULL,NULL,NULL,'IKEA'),(319,16,20,NULL,0,NULL,NULL,NULL),(320,16,18,NULL,NULL,NULL,NULL,''),(321,16,1,NULL,NULL,NULL,'KO-KR','페이스 타올 30x30cm HÄREN'),(322,16,24,NULL,0,NULL,NULL,NULL),(323,16,14,0,NULL,NULL,NULL,NULL),(324,16,2,NULL,NULL,'','KO-KR',NULL),(325,16,26,NULL,NULL,'',NULL,NULL),(326,16,11,2000,NULL,NULL,NULL,NULL),(327,16,27,0,NULL,NULL,NULL,NULL),(328,16,28,0,NULL,NULL,NULL,NULL),(329,16,29,NULL,0,NULL,NULL,NULL),(330,16,30,NULL,0,NULL,NULL,NULL),(331,16,31,0,NULL,NULL,NULL,NULL),(332,16,32,0,NULL,NULL,NULL,NULL),(333,16,33,0,NULL,NULL,NULL,NULL),(334,16,21,NULL,NULL,NULL,NULL,''),(335,16,22,NULL,NULL,'',NULL,NULL),(336,16,23,NULL,NULL,'',NULL,NULL),(337,16,2,NULL,NULL,'','VN-VI',NULL),(338,16,1,NULL,NULL,NULL,'EN-US','Face Towel 30x30cm HÄREN - IKEA'),(339,16,2,NULL,NULL,'','EN-US',NULL),(340,17,1,NULL,NULL,NULL,'VN-VI','Ghế nằm rung cho bé Bright Starts Bouncer, Blossomy Blooms'),(341,17,13,2,NULL,NULL,NULL,NULL),(342,17,34,NULL,NULL,NULL,NULL,'Bright Starts'),(343,17,20,NULL,0,NULL,NULL,NULL),(344,17,18,NULL,NULL,NULL,NULL,''),(345,17,24,NULL,0,NULL,NULL,NULL),(346,17,14,0,NULL,NULL,NULL,NULL),(347,17,2,NULL,NULL,'<p><em>Việc nh&agrave; qu&aacute; bận rộn khiến bạn quay cuồng đ&ocirc;i kh&ocirc;ng thể ở b&ecirc;n b&eacute; y&ecirc;u thường xuy&ecirc;n được. Bạn cần một c&ocirc;ng cụ hỗ trợ gi&uacute;p b&eacute; c&oacute; thể vui đ&ugrave;a thoải m&aacute;i v&agrave; an to&agrave;n khi bạn đang giải quyết việc nh&agrave;? Sản phẩm&nbsp;<a href=\"http://babyborn.vn/ghe-rung-ghe-nam/ghe-nam-rung-cho-be-bright-starts-bouncer-blossomy-blooms.html\" style=\"margin: 0px; padding: 0px; border: 0px; text-decoration: none; color: rgb(20, 144, 133);\"><strong>ghế nằm rung &ldquo;Bright Starts Bouncer, Blossomy Blooms&rdquo;</strong></a>&nbsp;&ndash; c&ocirc;ng cụ hỗ trợ tuyệt vời cho bạn! Sở hữu những t&iacute;nh năng tuyệt vời, sản phẩm n&agrave;y chắc chắn sẽ đem lại cảm gi&aacute;c th&iacute;ch th&uacute; v&agrave; v&ocirc; c&ugrave;ng thoải m&aacute;i cho b&eacute;, đồng thời khiến bạn y&ecirc;n t&acirc;m l&agrave;m c&aacute;c c&ocirc;ng việc nh&agrave; m&agrave; kh&ocirc;ng phải qu&aacute; lo lắng cho b&eacute;. Với chiếc ghế đặc biệt n&agrave;y, bạn sẽ đỡ vất vả hơn nhiều trong việc tr&ocirc;ng nom b&eacute; y&ecirc;u của m&igrave;nh.</em></p>\n\n<p style=\"text-align:center\"><em><img alt=\"\" src=\"http://babyborn.vn/Images/PostImage/ghe-nam-rung-bright-starts-bouncer-blossomy-blooms.jpg\" style=\"border:0px; height:400px; margin:0px; padding:0px; width:400px\" /></em></p>\n\n<p><strong><em>&ldquo;Bright Starts Bouncer, Blossomy Blooms</em></strong>&rdquo; được t&iacute;ch hợp nhiều t&iacute;nh năng, n&oacute; kh&ocirc;ng đơn giản chỉ l&agrave; một chiếc ghế nằm th&ocirc;ng thường. N&oacute; sẽ khiến bạn bất ngờ v&igrave; c&oacute; thể gi&uacute;p b&eacute; c&oacute; thể tự chơi một m&igrave;nh, matxa v&agrave; ru ngủ cho b&eacute; nữa.</p>\n\n<p>Trước ti&ecirc;n,&nbsp;<a href=\"http://babyborn.vn/ghe-rung-ghe-nam.html\" style=\"margin: 0px; padding: 0px; border: 0px; text-decoration: none; color: rgb(20, 144, 133);\"><strong>ghế rung</strong></a>&nbsp;<strong><em>&ldquo;Bright Starts Bouncer, Blossomy Blooms</em></strong>&rdquo; c&oacute; một khung an to&agrave;n để đặt v&agrave; giữ b&eacute; một c&aacute;ch dễ d&agrave;ng nhưng vẫn tạo cảm gi&aacute;c thoải m&aacute;i cho b&eacute;. Ghế được bọc bằng loại vải cao cấp rất &ecirc;m. Dưới mặt ghế ngồi c&oacute; gắn một m&aacute;y rung khiến chiếc ghế c&oacute; thể đung đưa nhẹ tạo cho b&eacute; cảm gi&aacute;c như đang được vỗ về, chăm s&oacute;c. Hơn nữa, thấu hiểu trong những giai đoạn đầu, &acirc;m nhạc c&oacute; một vai tr&ograve; nhất định cho sự ph&aacute;t triển của b&eacute; v&agrave; b&eacute; thường bị thu h&uacute;t đặc biệt bởi &acirc;m thanh n&ecirc;n&nbsp;<strong><em>&ldquo;Bright Starts Bouncer, Blossomy Blooms&rdquo;</em></strong>&nbsp;&nbsp;được t&iacute;ch hợp th&ecirc;m những bản nhạc du dương đi k&egrave;m. Chưa hết, chiếc ghế ngồi tuyệt vời n&agrave;y c&ograve;n đi k&egrave;m một khung treo đồ chơi dễ d&agrave;ng th&aacute;o lắp, chiếc khung n&agrave;y c&oacute; m&agrave;u sắc thật bắt mắt, d&ugrave;ng để treo c&aacute;c đồ chơi y&ecirc;u th&iacute;ch của b&eacute;, c&oacute; thể điều chỉnh độ xa gần của khung để b&eacute; c&oacute; thể dễ d&agrave;ng chạm tay vui đ&ugrave;a với những đồ chơi đ&oacute; m&agrave; sẽ kh&ocirc;ng lo ch&uacute;ng bị rơi xuống hay tuột khỏi tầm tay b&eacute;.</p>\n\n<p style=\"text-align:center\"><img alt=\"\" src=\"http://babyborn.vn/Images/PostImage/ghe-nam-rung-bright-starts-bouncer-blossomy-blooms-2.jpg\" style=\"border:0px; height:400px; margin:0px; padding:0px; width:400px\" /></p>\n\n<p>Chiếc ghế được thiết kế v&ocirc; c&ugrave;ng dễ thương, c&ugrave;ng với những t&iacute;nh năng đem lại sự tiện lợi tuyệt vời. Đ&acirc;y chắc chắn sẽ l&agrave; c&ocirc;ng cụ hỗ trợ đắc lực cho bạn v&agrave; b&eacute; y&ecirc;u trong những năm th&aacute;ng đầu đời của b&eacute;.</p>\n\n<p><strong>Chi ti&ecirc;t sản phẩm:</strong></p>\n\n<p>T&ecirc;n sản phẩm: Bright Starts Bouncer, Blossomy Blooms</p>\n\n<p>K&iacute;ch thước sản phẩm: 53 x 34 x 9 cm</p>\n\n<p>Xuất xứ: Mỹ</p>\n\n<p>Trọng lượng ngồi tối đa: 11kg</p>\n\n<p>Đối tượng mục ti&ecirc;u ch&iacute;nh của sản phẩm: C&aacute;c b&eacute; g&aacute;i</p>\n\n<p>Pin: cần 3 pin C (tuổi thọ pin l&agrave; 20h)</p>\n\n<p><strong>Đ&oacute;ng g&oacute;i:</strong></p>\n\n<p>01 xe</p>\n\n<p>Đồ chơi treo khung</p>\n\n<p>D&acirc;y đeo an to&agrave;n</p>\n','VN-VI',NULL),(348,17,26,NULL,NULL,'',NULL,NULL),(349,17,11,300000000,NULL,NULL,NULL,NULL),(350,17,27,0,NULL,NULL,NULL,NULL),(351,17,28,0,NULL,NULL,NULL,NULL),(352,17,29,NULL,0,NULL,NULL,NULL),(353,17,30,NULL,0,NULL,NULL,NULL),(354,17,31,0,NULL,NULL,NULL,NULL),(355,17,32,0,NULL,NULL,NULL,NULL),(356,17,33,0,NULL,NULL,NULL,NULL),(357,17,21,NULL,NULL,NULL,NULL,''),(358,17,22,NULL,NULL,'',NULL,NULL),(359,17,23,NULL,NULL,'',NULL,NULL),(360,17,1,NULL,NULL,NULL,'EN-US','Bright Starts Blossomy Blooms Bouncer - Pretty In Pink'),(361,17,2,NULL,NULL,'','EN-US',NULL),(362,17,1,NULL,NULL,NULL,'KO-KR','Bright Starts Blossomy Blooms Bouncer - Pretty In Pink'),(363,17,2,NULL,NULL,'','KO-KR',NULL),(364,18,1,NULL,NULL,NULL,'VN-VI','Tã quần Blue Monkey'),(365,18,13,10,NULL,NULL,NULL,NULL),(366,18,34,NULL,NULL,NULL,NULL,'Bambi Mio'),(367,18,20,NULL,0,NULL,NULL,NULL),(368,18,18,NULL,NULL,NULL,NULL,''),(369,18,24,NULL,0,NULL,NULL,NULL),(370,18,14,0,NULL,NULL,NULL,NULL),(371,18,2,NULL,NULL,'<p>Chiếc t&atilde; quần chất liệu đặc biệt sẽ mang đến cho b&eacute; trải nghiệm mới cực kỳ th&uacute; vị. Được l&agrave;m từ chất liệu vải da lộn thời trang c&ugrave;ng c&aacute;c họa tiết in xinh xắn b&ecirc;n ngo&agrave;i, sản phẩm đ&oacute;ng vai tr&ograve; l&agrave; chiếc quần thật phong c&aacute;ch cho b&eacute; y&ecirc;u. B&ecirc;n cạnh đ&oacute;, kh&ocirc;ng thể kh&ocirc;ng n&oacute;i đến lớp l&oacute;t bằng vải vi sợi b&ecirc;n trong để chiếc quần c&oacute; th&ecirc;m chức năng thấm h&uacute;t hiệu quả như t&atilde; l&oacute;t th&ocirc;ng thường. Từ nay b&eacute; sẽ kh&ocirc;ng phải mặc 2 lớp t&atilde; v&agrave; quần d&agrave;y cộm khi đ&atilde; c&oacute; t&atilde; quần 2 trong 1 <strong>Bambi Mio SP015</strong> thật tiện lợi.</p>\n','VN-VI',NULL),(372,18,26,NULL,NULL,'<p>- Chất liệu vải da lộn (Suedecloth) thời trang, c&oacute; th&ecirc;m phần l&oacute;t tại đ&aacute;y quần bằng vải vi sợi (Microfiber) &ecirc;m &aacute;i v&agrave; c&oacute; độ thấm h&uacute;t cao, mang đến cho b&eacute; sự thoải m&aacute;i, kh&ocirc; tho&aacute;ng trong thời gian d&agrave;i.<br />\n- Khi cần thay t&atilde; cho b&eacute;, mẹ chỉ cần thay mới lớp l&oacute;t vải Microfiber b&ecirc;n trong thật nhanh ch&oacute;ng v&agrave; tiện lợi.<br />\n- Chiếc quần v&agrave; phần l&oacute;t đều c&oacute; thể giặt sạch, phơi kh&ocirc; v&agrave; t&aacute;i sử dụng nhiều lần, mang lại hiệu quả kinh tế cao.<br />\n- B&ecirc;n ngo&agrave;i quần in họa tiết xinh xắn, tăng vẻ đ&aacute;ng y&ecirc;u cho b&eacute;.<br />\n- Chiếc t&atilde; đ&oacute;ng vai tr&ograve; như t&atilde; giấy v&agrave; cũng l&agrave; quần mặc ngo&agrave;i, b&eacute; sẽ kh&ocirc;ng phải mặc nhiều lớp d&agrave;y cộm g&acirc;y kh&oacute; chịu nữa.<br />\n- Khuy bấm t&ugrave;y chỉnh độ rộng linh hoạt, vừa vặn &ocirc;m lấy cơ thể trẻ từ 3 đến 16kg.</p>\n',NULL,NULL),(373,18,11,2000,NULL,NULL,NULL,NULL),(374,18,27,0,NULL,NULL,NULL,NULL),(375,18,28,0,NULL,NULL,NULL,NULL),(376,18,29,NULL,28,NULL,NULL,NULL),(377,18,30,NULL,0,NULL,NULL,NULL),(378,18,31,0,NULL,NULL,NULL,NULL),(379,18,32,0,NULL,NULL,NULL,NULL),(380,18,33,0,NULL,NULL,NULL,NULL),(381,18,21,NULL,NULL,NULL,NULL,''),(382,18,22,NULL,NULL,'',NULL,NULL),(383,18,23,NULL,NULL,'',NULL,NULL),(384,18,1,NULL,NULL,NULL,'EN-US','Bambi Mio SP015 '),(385,18,2,NULL,NULL,'<p>The diaper pants special material will give your baby a new experience extremely exciting. Made from suede fabric with fashionable prints beautiful outside, the product acts as a very stylish pants for your baby. Besides, can not say no to the micro fiber cloth lining inside the pants to be more efficient absorbency function as normal nappies. From now on she will not have to wear two layers thick diaper and pants diaper pants when you have 2 in 1 Mio SP015 Bambi effortlessly.</p>\n','EN-US',NULL),(386,19,1,NULL,NULL,NULL,'VN-VI','Xe điện Fisher-Price Power Wheels Disney Princess Lil’ Quad'),(387,19,13,2,NULL,NULL,NULL,NULL),(388,19,34,NULL,NULL,NULL,NULL,'Fisher Price'),(389,19,20,NULL,0,NULL,NULL,NULL),(390,19,18,NULL,NULL,NULL,NULL,''),(391,19,24,NULL,0,NULL,NULL,NULL),(392,19,14,0,NULL,NULL,NULL,NULL),(393,19,2,NULL,NULL,'<p><em>Những chiếc xe d&agrave;nh cho trẻ em lu&ocirc;n l&agrave; niềm đam m&ecirc; của mỗi thế hệ tuổi thơ, từ những chiếc xe c&uacute;t k&iacute;t 2 b&aacute;nh, 3 b&aacute;nh thời xưa rồi đến những chiếc xe được thiết kế hiện đại hơn,&nbsp;&nbsp;</em><em>tiện lợi</em><em>&nbsp;hơn của thời nay lu&ocirc;n lu&ocirc;n c&oacute; một sức h&uacute;t đặc biệt đối với mọi&nbsp; trẻ em ở bất k&igrave; độ tuổi n&agrave;o. Tuy nhi&ecirc;n, hiện nay tr&ecirc;n thị trường c&oacute; qu&aacute; nhiều loại xe d&agrave;nh cho b&eacute; khiến bạn ph&acirc;n v&acirc;n kh&ocirc;ng biết n&ecirc;n lựa chọn chiếc xe như thế n&agrave;o để d&agrave;nh tặng cho b&eacute; y&ecirc;u nh&agrave; bạn. L&agrave;m sao để chọn một chiếc xe vừa đẹp, vừa để b&eacute; dễ sử dụng lại vừa c&oacute; độ an to&agrave;n cao? Ch&uacute;ng t&ocirc;i mang tới cho bạn một sự lựa chon v&ocirc; c&ugrave;ng ho&agrave;n hảo &ndash;&nbsp;<a href=\"http://babyborn.vn/do-choi-xe-mo-hinh/xe-dien-fisher-price-power-wheels-disney-princess-lil-quad.html\" style=\"margin: 0px; padding: 0px; border: 0px; text-decoration: none; color: rgb(20, 144, 133);\"><strong>xe điện &ldquo;Fisher-Price Power Wheels Disney Princess Lil&rsquo; Quad&rdquo;</strong></a></em></p>\n\n<p style=\"text-align:center\"><em><strong><img alt=\"\" src=\"http://babyborn.vn/Images/PostImage/xe-dien-fisher-price-power-wheels-disney-princess-lil%E2%80%99-quad-1.jpg\" style=\"border:0px; height:360px; margin:0px; padding:0px; width:450px\" /></strong></em></p>\n\n<p><strong><em>Fisher-Price Power Wheels Disney Princess Lil&rsquo; Quad</em></strong>&nbsp;l&agrave; một chiếc xe điện 4 b&aacute;nh c&oacute; thiết kế v&ocirc; c&ugrave;ng dễ thương d&agrave;nh ri&ecirc;ng cho c&ocirc;ng ch&uacute;a b&eacute; nhỏ của bạn, chiếc xe mang phong c&aacute;ch thể thao, được phối c&aacute;c m&agrave;u sắc v&ocirc; c&ugrave;ng sinh động xanh &ndash; hồng &ndash; trắng c&ugrave;ng với những hoa văn trang tr&iacute; bắt mắt, trong đ&oacute; m&agrave;u hồng l&agrave; chủ đạo, bởi theo nghi&ecirc;n cứu hầu hết c&aacute;c b&eacute; g&aacute;i đều c&oacute; xu hướng&nbsp; y&ecirc;u th&iacute;ch những đồ vật li&ecirc;n quan tới m&agrave;u hồng. Chiếc xe sẽ l&agrave; một m&oacute;n qu&agrave; bất ngờ v&agrave; tuyệt vời đối với b&eacute; y&ecirc;u của bạn!</p>\n\n<p>Chiếc xe được thiết kế với t&iacute;nh năng cực k&igrave; th&acirc;n thiện d&agrave;nh cho những tay l&aacute;i nhỏ tuổi nhất kể cả với b&eacute; vừa trong độ tuổi biết đi. Việc của b&eacute; chỉ cần ngồi l&ecirc;n xe giữ c&acirc;n bằng người một c&aacute;ch chắc chắn v&agrave; nhấn v&agrave;o chiếc n&uacute;t đỏ b&ecirc;n phải để khởi động xe lăn b&aacute;nh, rồi điều khiển tay l&aacute;i theo hướng m&agrave; b&eacute; muốn di chuyển. Tương tự nếu b&eacute; muốn dừng xe lại chỉ cần ấn tay v&agrave;o n&uacute;t đ&oacute;, chiếc xe sẽ dừng lại một c&aacute;ch an to&agrave;n. Chỗ để ch&acirc;n cũng được ch&uacute;&nbsp; &yacute; trong thiết kể để l&agrave;m sao ph&ugrave; hợp với chiều cao trong độ tuổi của b&eacute;, gi&uacute;p b&eacute; cảm thấy thoải m&aacute;i khi đi xe.</p>\n\n<p style=\"text-align:center\"><img alt=\"\" src=\"http://babyborn.vn/Images/PostImage/xe-dien-fisher-price-power-wheels-disney-princess-lil%E2%80%99-quad-2-1.jpg\" style=\"border:0px; height:466px; margin:0px; padding:0px; width:350px\" /></p>\n\n<p>Mỗi chiếc xe&nbsp;<strong><em>Power Wheels Disney</em></strong>&nbsp;đều được thiết kế, sản xuất v&agrave; thử nghiệm ở ti&ecirc;u chuẩn cao nhất, đ&aacute;p ứng c&aacute;c th&ocirc;ng số kĩ thuật một c&aacute;ch ch&iacute;nh x&aacute;c v&agrave; được kiểm tra nghi&ecirc;m ngặt&nbsp; theo ti&ecirc;u chuẩn của Mexico. Trước khi tung sản phẩm ra thị trường, c&aacute;c sản phẩm đều được tham gia c&aacute;c chương tr&igrave;nh thử nghiệm do Fisher &ndash; Price tổ chức để đảm bảo chắc chắn rằng&nbsp;&nbsp;<strong><em>Power Wheels Disney</em></strong>&nbsp;thực sự ph&ugrave; hợp với lứa tuổi v&agrave; mang lại sự th&iacute;ch th&uacute; vui vẻ cho b&eacute;.</p>\n\n<p>Với xe điện&nbsp;<strong><em>Power Wheels Disney</em></strong>&nbsp;b&eacute; y&ecirc;u nh&agrave; bạn c&oacute; thể thỏa th&iacute;ch dạo chơi trong nh&agrave;, khu vườn hay ở ngo&agrave;i c&ocirc;ng vi&ecirc;n c&ugrave;ng những người bạn kh&aacute;c của m&igrave;nh, b&eacute; sẽ cảm nhận thấy v&ocirc; c&ugrave;ng th&iacute;ch th&uacute; như m&igrave;nh l&agrave; một tay đua chuy&ecirc;n nghiệp v&agrave; tự h&agrave;o khi đang sở hữu một m&oacute;n qu&agrave;&nbsp;<a href=\"http://babyborn.vn/\" style=\"margin: 0px; padding: 0px; border: 0px; text-decoration: none; color: rgb(20, 144, 133);\"><strong>đồ chơi</strong></a>&nbsp;hết sức tuyệt vời n&agrave;y!</p>\n\n<p><strong>Chi tiết sản phẩm:</strong></p>\n\n<p>K&iacute;ch thước sản phẩm: 68.5 x 66 x 71 cm</p>\n\n<p>Trọng lượng: 7kg</p>\n\n<p>Độ tuổi khuyến c&aacute;o: 1 &ndash; 3 tuổi</p>\n\n<p><strong>Đ&oacute;ng g&oacute;i:</strong></p>\n\n<p>01 xe</p>\n\n<p>Hệ thống sạc 6V, bao gồm pin v&agrave; bộ sạc.</p>\n\n<p><strong>Nh&agrave; sản xuất:</strong></p>\n\n<p>Fisher &ndash; price l&agrave; nh&agrave; sản xuất lớn với c&aacute;c đồ chơi d&agrave;nh cho trẻ em, đặc biệt với thương hiệu Power wheels nổi tiếng. Chiếc xe đầu ti&ecirc;n ra đời năm 1971, đến n&agrave;y đ&atilde; c&oacute; hơn 30 triệu xe được b&aacute;n ra, từ một cửa h&agrave;ng dịch vụ tới nay đ&atilde; c&oacute; mạng lưới hơn 400 trung t&acirc;m ủy quyền tr&ecirc;n khắp trong v&agrave; ngo&agrave;i nước. C&aacute;c sản phẩm của Fisher &ndash; price đều được sản xuất theo ti&ecirc;u chuẩn an to&agrave;n cao, đ&aacute;p ứng y&ecirc;u cầu nghi&ecirc;m ngặt của mọi cuộc thử nghiệm. Power wheels đ&atilde; trở th&agrave;nh một thương hiệu h&agrave;ng đầu về xe điện cho trẻ em</p>\n','VN-VI',NULL),(394,19,26,NULL,NULL,'<p>Sản phẩm rất th&acirc;n thiện</p>\n',NULL,NULL),(395,19,11,9999999999,NULL,NULL,NULL,NULL),(396,19,27,7,NULL,NULL,NULL,NULL),(397,19,28,9999,NULL,NULL,NULL,NULL),(398,19,29,NULL,0,NULL,NULL,NULL),(399,19,30,NULL,0,NULL,NULL,NULL),(400,19,31,0,NULL,NULL,NULL,NULL),(401,19,32,0,NULL,NULL,NULL,NULL),(402,19,33,0,NULL,NULL,NULL,NULL),(403,19,21,NULL,NULL,NULL,NULL,''),(404,19,22,NULL,NULL,'',NULL,NULL),(405,19,23,NULL,NULL,'',NULL,NULL),(406,20,1,NULL,NULL,NULL,'VN-VI','Đầm ren hồng cho bé'),(407,20,13,1,NULL,NULL,NULL,NULL),(408,20,34,NULL,NULL,NULL,NULL,'Joe '),(409,20,20,NULL,0,NULL,NULL,NULL),(410,20,18,NULL,NULL,NULL,NULL,''),(411,19,1,NULL,NULL,NULL,'EN-US','Electric Car Fisher-Price Power Wheels Disney Princess Lil’ Quad'),(412,19,2,NULL,NULL,'','EN-US',NULL),(413,18,1,NULL,NULL,NULL,'KO-KR','Bambi Mio SP015'),(414,18,2,NULL,NULL,'','KO-KR',NULL),(415,20,24,NULL,0,NULL,NULL,NULL),(416,20,14,0,NULL,NULL,NULL,NULL),(417,20,2,NULL,NULL,'<p>Chiếc đầm <strong>Joe</strong> với thiết kế thời trang sẽ một m&oacute;n trang phục thật trendy, gi&uacute;p b&eacute; y&ecirc;u thể hiện gu phong c&aacute;ch thời trang duy&ecirc;n d&aacute;ng. Được l&agrave;m từ chất liệu ren mềm mịn, đầm đem lại cho b&eacute; cảm gi&aacute;c tho&aacute;ng m&aacute;t, dễ chịu trong suốt cả ng&agrave;y. Đặc biệt, với thiết kế kiểu v&aacute;y x&ograve;e thời trang c&ugrave;ng điểm nhấn l&agrave; d&acirc;y buộc nơ xinh xắn, b&eacute; sẽ thật đ&aacute;ng y&ecirc;u. Chiếc đầm <strong>Joe</strong> sẽ l&agrave; một m&oacute;n qu&agrave; l&iacute; tưởng d&agrave;nh cho b&eacute;.</p>\n\n<div><strong>ĐẶC ĐIỂM NỔI BẬT</strong></div>\n\n<p><strong>Chất liệu vải cao cấp</strong><br />\nSản phẩm được l&agrave;m từ chất liệu ren mịn, tho&aacute;ng m&aacute;t, &ecirc;m dịu với l&agrave;n da nhạy cảm của b&eacute;, cho b&eacute; y&ecirc;u cảm gi&aacute;c dể chịu, thoải m&aacute;i suốt cả ng&agrave;y.</p>\n\n<p><strong>Thiết kế đ&aacute;ng y&ecirc;u</strong><br />\nVới thiết kế kiểu d&aacute;ng v&aacute;y x&ograve;e thời trang, c&oacute; d&acirc;y buộc nơ xinh xắn, sản phẩm đem lại cho b&eacute; d&aacute;ng vẻ năng động v&agrave; đ&aacute;ng y&ecirc;u.</p>\n\n<p><strong>Gợi &yacute; phối trang phục</strong><br />\nBạn c&oacute; thể diện cho b&eacute; &aacute;o đầm <strong>Joe</strong> với một chiếc băng đ&ocirc; v&agrave; một đ&ocirc;i gi&agrave;y b&uacute;p b&ecirc;, b&eacute; sẽ lộng lẫy như một n&agrave;ng c&ocirc;ng ch&uacute;a đấy.</p>\n\n<p>&nbsp;</p>\n','VN-VI',NULL),(418,20,26,NULL,NULL,'',NULL,NULL),(419,20,11,2000,NULL,NULL,NULL,NULL),(420,20,27,0,NULL,NULL,NULL,NULL),(421,20,28,0,NULL,NULL,NULL,NULL),(422,20,29,NULL,28,NULL,NULL,NULL),(423,20,30,NULL,0,NULL,NULL,NULL),(424,20,31,0,NULL,NULL,NULL,NULL),(425,20,32,0,NULL,NULL,NULL,NULL),(426,20,33,0,NULL,NULL,NULL,NULL),(427,20,21,NULL,NULL,NULL,NULL,''),(428,20,22,NULL,NULL,'',NULL,NULL),(429,20,23,NULL,NULL,'',NULL,NULL),(430,19,1,NULL,NULL,NULL,'KO-KR','전차 Fisher-Price Power Wheels Disney Princess Lil’ Quad'),(431,19,2,NULL,NULL,'','KO-KR',NULL),(432,20,1,NULL,NULL,NULL,'KO-KR','Pink Dress'),(433,20,2,NULL,NULL,'<p>Chiếc đầm 조 VOI 트 KE thời 트랑 SE MOT 월 트랑 PHUC 그 유행의, gi&uacute;p B&eacute; YEU 히엔 번지 퐁 CACH thời 트랑 두옌 댕. Được 라메 TU 채팅 대신 르네 MEM 분, đầm 드젬 라이 쵸 B&eacute; 캠 GIAC tho&aacute;ng 매트, 드 영지 trong suốt 캘리포니아 ng&agrave;y. Đặc biệt, VOI 트 애 kiểu v&aacute;y x&ograve;e thời 트랑 c&ugrave;ng điểm nhấn 라 하루 buộc 더 xinh XAN 될 SE 그 đ&aacute;ng YEU. Chiếc đầm 조 SE 라 MOT 월 QUA 리튬 장기 DANH 쵸합니다.<br />\nĐẶC ĐIỂM 노이 박쥐<br />\n<br />\n채팅을 대신 밟아 카오 캡<br />\n산 팜 được 라메 TU 채팅 대신 르네 분, tho&aacute;ng 매트, 엠 디우 VOI LAN 다 nhạy 캠 꾸어있을 쵸 B&eacute; YEU 캠 GIAC 드 영지, thoải 마이 suốt 캘리포니아 ng&agrave;y.<br />\n<br />\n트 애 đ&aacute;ng YEU<br />\nVOI 트 애 kiểu 댕 v&aacute;y x&ograve;e thời 트랑, 콜로라도 일 buộc 더 xinh XAN, 산 팜 드젬 라이 쵸 B&eacute; 댕 VE 낭 động 버지니아 đ&aacute;ng YEU.<br />\n<br />\n고이 &yacute; phối 트랑 PHUC<br />\n금지 콜로라도 디엔 초 B&eacute; AO đầm 조 VOI MOT chiếc 방 Đỗ 버지니아 MOT đ&ocirc;i 지아이 BUP 될 될 SE 오래 누워 NHU MOT 낭 콩 Chua의 디제이.<br />\n<br />\n무아 조 - Đầm 르네 (홍콩) VOI GIA 어린 아이 타이 Lazada 베트남. 무아 샘 트룩 투엔 ngay 베이 지오 타이 Lazada.vn DJE nhận ngay UU đ&atilde;i 쿠아 CAC 산 팜 콴 AO 트레 있도록 SINH TU Thuong 5의 hiệu 조 버지니아 MOT 그래서 산 팜 트레 있도록 SINH VOI GIA CUC 우연 단. 탄 흐엉 V&Ocirc; 그래서 UU đ&atilde;i độc의 Quyen TU Thuong 5의 hiệu 조 VOI CAC 산 팜 콴 AO 트레 있도록 SINH ch&iacute;nh 꽉 GIA phải 장 c&ugrave;ng DICH VU 참 SOC kh&aacute;ch 꽉 TOT 낫 버지니아 giao 꽉 nhanh 종 낫.</p>\n','KO-KR',NULL),(434,20,1,NULL,NULL,NULL,'EN-US','Pink Dress'),(435,20,2,NULL,NULL,'<p>Đầm Chiếc Joe with the designed Thoi trang would one M&oacute;n trang Ph&uacute;c hợp thời trang, helps desklet ask the hien gu phong way the time trang Duy&ecirc;n style. Been L&acirc;m Tự compound document em mềm Min, Đầm Move it again for desklet Cảm alert thoang mat, de chiu in suốt at all day. Special special, with the designed style v&aacute;y xoe Thoi trang together score click on that D&acirc;y force Nơ xinh xắn, được se actual Đặng ask. Đầm Chiếc Joe will be one M&oacute;n qu&agrave; l&iacute; Tưởng reserved cho được.<br />\nCharacteristics Nội B&aacute;t<br />\n<br />\nChất documents Vải cao cấp<br />\nProduct is as the words compound document Ren Min, Mắt thoang, em diu with the Lan da sensor Cảm of desklet, cho desklet ask Cảm alert de chiu, thoai mai suốt at all day.<br />\n<br />\nThiết kế Đặng ask<br />\nDesigned for Style v&aacute;y xoe thoi trang, you D&acirc;y force Nơ xinh xắn, product Move it again for desklet style apparently features dynamic and Đặng ask.<br />\n<br />\nGoi &Yacute; distributed trang recovery<br />\nYou can identifier cho desklet &aacute;o Đầm Joe with an Chiếc bandwidth Đ&ocirc; and a double Gi&agrave;y B&uacute;p b&ecirc;, được se d&agrave;i nằm as N&agrave;ng C&ocirc;ng Ch&uacute;a here.<br />\n<br />\n&nbsp;</p>\n','EN-US',NULL),(436,21,1,NULL,NULL,NULL,'VN-VI','Chai Coca Cola 1,5L'),(437,21,13,10,NULL,NULL,NULL,NULL),(438,21,34,NULL,NULL,NULL,NULL,'Coca Cola Vietnam'),(439,21,20,NULL,0,NULL,NULL,NULL),(440,21,18,NULL,NULL,NULL,NULL,''),(441,21,1,NULL,NULL,NULL,'EN-US','Coca Cola Bottle 1,5L  '),(442,21,24,NULL,0,NULL,NULL,NULL),(443,21,14,0,NULL,NULL,NULL,NULL),(444,21,2,NULL,NULL,'','EN-US',NULL),(445,21,26,NULL,NULL,'',NULL,NULL),(446,21,11,2000,NULL,NULL,NULL,NULL),(447,21,27,0,NULL,NULL,NULL,NULL),(448,21,28,0,NULL,NULL,NULL,NULL),(449,21,29,NULL,0,NULL,NULL,NULL),(450,21,30,NULL,0,NULL,NULL,NULL),(451,21,31,0,NULL,NULL,NULL,NULL),(452,21,32,0,NULL,NULL,NULL,NULL),(453,21,33,0,NULL,NULL,NULL,NULL),(454,21,21,NULL,NULL,NULL,NULL,''),(455,21,22,NULL,NULL,'',NULL,NULL),(456,21,23,NULL,NULL,'',NULL,NULL),(457,21,1,NULL,NULL,NULL,'KO-KR','병 Coca Cola 1,5L'),(458,21,2,NULL,NULL,'','KO-KR',NULL),(459,22,1,NULL,NULL,NULL,'VN-VI','Dao cắt bánh IKEA'),(460,22,18,NULL,NULL,NULL,NULL,''),(461,22,13,1,NULL,NULL,NULL,NULL),(462,22,34,NULL,NULL,NULL,NULL,''),(463,22,14,1,NULL,NULL,NULL,NULL),(464,22,24,NULL,26,NULL,NULL,NULL),(465,22,31,10,NULL,NULL,NULL,NULL),(466,22,32,10,NULL,NULL,NULL,NULL),(467,22,33,10,NULL,NULL,NULL,NULL);

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
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `t_product_attribute_type` */

insert  into `t_product_attribute_type`(`id`,`codename`,`datatype`,`fk_enum_ref`,`multi_language`,`repeating_group`,`weight`,`default`,`required`) values (1,'name','varchar',NULL,1,0,0,NULL,1),(2,'description','text',NULL,1,0,0,NULL,0),(3,'tag','varchar',NULL,1,1,0,NULL,0),(7,'material','enum',1,0,1,0,NULL,0),(8,'gift_target','enum',2,0,1,0,NULL,0),(9,'category','number',NULL,0,0,0,NULL,0),(10,'occasion','enum',3,0,1,0,NULL,0),(13,'quantity','number',NULL,0,0,0,NULL,1),(14,'weight','number',NULL,0,0,0,NULL,1),(15,'source','enum',NULL,0,0,0,NULL,0),(16,'shipping_method','enum',6,0,1,0,NULL,0),(17,'payment_method','enum',7,0,1,0,NULL,0),(18,'storage_code','varchar',NULL,0,0,0,NULL,0),(19,'sales','number',NULL,0,0,0,NULL,0),(20,'storage_code_type','enum',8,0,0,0,NULL,0),(21,'meta_title','varchar',NULL,0,0,0,NULL,0),(22,'meta_keywords','text',NULL,0,0,0,NULL,0),(23,'meta_description','text',NULL,0,0,0,NULL,0),(24,'weight_unit','enum',9,0,0,0,NULL,1),(25,'weight','number',0,0,0,0,NULL,1),(26,'note','text',NULL,0,0,0,NULL,0),(27,'return_policy','number',NULL,0,0,0,'0',0),(28,'warranty_policy','number',NULL,0,0,0,'0',0),(29,'made_in','enum',12,0,0,0,NULL,0),(30,'import_from','enum',12,0,0,0,NULL,0),(31,'dimension_width','number',NULL,0,0,0,'-1',1),(32,'dimension_height','number',NULL,0,0,0,'-1',1),(33,'dimension_depth','number',NULL,0,0,0,'-1',1),(34,'brand','varchar',NULL,0,0,0,NULL,0);

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
  `width` int(11) DEFAULT NULL,
  PRIMARY KEY (`fk_product`,`fk_file`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `t_product_image` */

insert  into `t_product_image`(`fk_product`,`fk_file`,`sort`,`thumbnail`,`base_image`,`small_image`,`facebook_image`,`width`) values (1,43,0,1,1,1,1,NULL),(1,54,0,0,1,1,0,NULL),(2,44,0,0,1,1,0,NULL),(4,45,0,0,1,1,0,NULL),(5,46,0,0,1,1,0,NULL),(6,47,0,0,1,1,0,NULL),(7,48,0,0,1,1,0,NULL),(8,49,0,0,1,1,0,NULL),(9,50,0,0,1,1,0,NULL),(10,51,0,0,1,1,0,NULL),(11,52,2,0,1,1,0,NULL),(11,57,0,1,1,1,0,NULL),(11,58,NULL,0,1,0,0,NULL),(12,59,0,1,1,1,0,NULL),(13,60,0,1,1,1,0,NULL),(13,61,0,0,1,1,0,NULL),(14,62,NULL,0,1,0,0,NULL),(15,63,0,0,1,1,0,NULL),(16,65,1,1,1,1,0,NULL),(17,66,2,0,1,1,0,855),(17,67,1,1,1,1,0,1500),(18,68,0,1,1,1,0,225),(18,69,0,0,1,1,0,225),(19,70,0,1,1,1,0,1089),(20,71,0,1,1,1,1,359),(21,72,0,0,1,1,0,1000),(22,73,NULL,0,1,0,0,610);

/*Table structure for table `t_product_tax` */

DROP TABLE IF EXISTS `t_product_tax`;

CREATE TABLE `t_product_tax` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_product` int(11) DEFAULT NULL,
  `fk_tax` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=111 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `t_product_tax` */

insert  into `t_product_tax`(`id`,`fk_product`,`fk_tax`) values (15,14,1),(16,15,1),(17,20,1),(18,26,0),(20,44,1),(21,45,1),(22,46,1),(23,47,1),(24,48,1),(25,49,1),(26,50,1),(27,51,1),(28,52,1),(29,53,1),(30,54,1),(31,55,1),(32,56,1),(33,57,1),(34,58,1),(35,59,1),(36,60,1),(37,61,1),(38,62,1),(39,63,1),(40,64,1),(41,65,1),(42,66,1),(43,67,1),(44,68,1),(45,69,1),(46,70,1),(47,71,1),(48,72,1),(49,73,1),(50,74,1),(51,75,1),(52,76,1),(53,77,1),(54,78,1),(55,79,1),(56,80,1),(57,81,1),(58,82,1),(59,83,1),(60,84,1),(61,85,1),(62,86,1),(63,87,1),(64,88,1),(65,89,1),(66,90,1),(67,91,1),(68,92,1),(69,93,1),(70,94,1),(71,95,1),(72,96,1),(73,97,1),(74,98,1),(75,99,1),(76,100,1),(77,101,1),(78,102,1),(79,103,1),(80,104,1),(81,105,1),(82,106,1),(83,107,1),(84,108,1),(85,109,1),(86,110,1),(87,111,1),(88,112,1),(89,113,1),(90,114,1),(91,115,1),(92,116,1),(93,117,1),(94,118,1),(95,119,1),(96,120,1),(97,121,1),(98,122,1),(99,123,1),(100,124,1),(101,125,1),(102,126,1),(103,127,1),(104,128,1),(105,129,1),(106,130,1),(107,131,1),(108,132,1),(109,133,1),(110,1,0);

/*Table structure for table `t_product_view` */

DROP TABLE IF EXISTS `t_product_view`;

CREATE TABLE `t_product_view` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_product` int(11) DEFAULT NULL,
  `fk_user` int(11) DEFAULT NULL,
  `count_view` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=71 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `t_product_view` */

insert  into `t_product_view`(`id`,`fk_product`,`fk_user`,`count_view`) values (1,2,0,52),(2,1,0,29),(3,3,0,9),(4,4,0,14),(5,5,0,10),(6,10,0,1),(7,8,0,5),(8,1,1,1),(9,14,1,1),(10,15,1,2),(11,14,5,4),(12,20,5,9),(13,15,5,3),(14,20,0,13),(15,14,0,11),(16,15,0,10),(17,26,5,1),(18,27,0,3),(19,27,5,1),(20,33,0,6),(21,26,0,2),(22,31,0,1),(23,38,0,6),(24,40,0,1),(25,42,0,1),(26,21,5,2),(27,21,0,5),(28,38,5,1),(29,1,5,9),(30,2,5,6),(31,7,5,4),(32,4,5,5),(33,6,5,4),(34,5,5,3),(35,6,0,14),(36,8,8,1),(37,9,9,4),(38,1,9,3),(39,2,9,3),(40,4,9,1),(41,6,9,2),(42,4,7,1),(43,9,0,3),(44,5,12,1),(45,5,7,1),(46,7,0,6),(47,5,9,3),(48,11,9,2),(49,11,5,1),(50,7,12,1),(51,1,12,2),(52,12,9,1),(53,12,5,1),(54,13,9,1),(55,13,5,4),(56,12,0,6),(57,13,12,1),(58,15,9,2),(59,16,9,1),(60,11,0,5),(61,13,0,5),(62,17,9,1),(63,18,12,1),(64,19,9,1),(65,20,12,1),(66,21,9,2),(67,17,0,2),(68,19,0,3),(69,18,0,1),(70,18,9,1);

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
  `fk_level` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `t_seller` */

insert  into `t_seller`(`id`,`name`,`logo`,`phoneno`,`email`,`website`,`status`,`status_date`,`status_reason`,`fk_manager`,`sid`,`fk_level`) values (1,'Trial',NULL,NULL,'admin@samsung.com',NULL,1,NULL,NULL,5,'samsung',1),(2,'GreenShop ',NULL,NULL,'lequan.vcci@gmail.com',NULL,1,NULL,NULL,12,'quanle',1),(3,'K-Shop',NULL,NULL,'starlight9x@gmail.com',NULL,1,NULL,NULL,9,'minhhoang',1);

/*Table structure for table `t_seller_category` */

DROP TABLE IF EXISTS `t_seller_category`;

CREATE TABLE `t_seller_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_seller` int(11) DEFAULT NULL,
  `fk_category` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `t_seller_category` */

/*Table structure for table `t_seller_level` */

DROP TABLE IF EXISTS `t_seller_level`;

CREATE TABLE `t_seller_level` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `codename` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `commission` tinyint(4) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `t_seller_level` */

insert  into `t_seller_level`(`id`,`codename`,`commission`,`name`) values (1,'standard',5,'Standard seller'),(2,'good',4,'Good seller'),(3,'great',3,'Great seller'),(4,'best',2,'Best seller');

/*Table structure for table `t_setting` */

DROP TABLE IF EXISTS `t_setting`;

CREATE TABLE `t_setting` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `key` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `value` text COLLATE utf8_unicode_ci,
  `autoload` tinyint(4) DEFAULT '0',
  `class` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `t_setting` */

insert  into `t_setting`(`id`,`key`,`value`,`autoload`,`class`) values (1,'home_banner','<root>\r\n	<img src=\"https://0.s3.envato.com/files/1114259/3.3.image.product.banner.rotator2.png\" title=\"I love bootstrap\" href=\"#\"/>\r\n	<img src=\"https://0.s3.envato.com/files/1114259/3.3.image.product.banner.rotator2.png\" title=\"I love bootstrap\" href=\"#\"/>\r\n	<img src=\"https://0.s3.envato.com/files/1114259/3.3.image.product.banner.rotator2.png\" title=\"I love bootstrap\" href=\"#\"/>\r\n</root>',0,NULL);

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
  `base_price` double DEFAULT NULL,
  `base_weight` double DEFAULT NULL,
  `weight_step` double DEFAULT NULL,
  `weight_step_price` double DEFAULT NULL,
  `bulky_weight` double DEFAULT NULL,
  `bulky_step_price` double DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `t_shipping_location` */

insert  into `t_shipping_location`(`id`,`fk_shipping_method`,`fk_location`,`base_price`,`base_weight`,`weight_step`,`weight_step_price`,`bulky_weight`,`bulky_step_price`) values (1,1,1,10000,1,1,3000,20,5000),(2,2,1,20000,0.5,0.5,6000,20,10000),(3,3,1,15000,0.5,0.5,4000,20,7000);

/*Table structure for table `t_shipping_method` */

DROP TABLE IF EXISTS `t_shipping_method`;

CREATE TABLE `t_shipping_method` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `codename` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sort` tinyint(4) DEFAULT NULL,
  `localization` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `t_shipping_method` */

insert  into `t_shipping_method`(`id`,`codename`,`sort`,`localization`) values (1,'standard',1,'<root>\r\n	<en_us>\r\n		<label>Standard</label>\r\n		<description>3-5 days</description>\r\n	</en_us>\r\n	<vn_vi>\r\n		<label>Gói tiết kiệm</label>\r\n		<description>3-5 ngày</description>\r\n	</vn_vi>\r\n	<ko_kr>\r\n		<label>표준</label>\r\n		<description>3-5 일</description>\r\n	</ko_kr>\r\n</root>'),(2,'premium',3,'<root>\r\n	<en_us>\r\n		<label>Premium</label>\r\n		<description>1 day</description>\r\n	</en_us>\r\n	<vn_vi>\r\n		<label>Hỏa tốc</label>\r\n		<description>1 ngày</description>\r\n	</vn_vi>\r\n	<ko_kr>\r\n		<label>프리미엄</label>\r\n		<description>1 일</description>\r\n	</ko_kr>\r\n</root>'),(3,'express',2,'<root>\r\n	<en_us>\r\n		<label>Express</label>\r\n		<description>1-3 days</description>\r\n	</en_us>\r\n	<vn_vi>\r\n		<label>Chuyển phát nhanh</label>\r\n		<description>1-3 ngày</description>\r\n	</vn_vi>\r\n	<ko_kr>\r\n		<label>표현</label>\r\n		<description>1-3 일</description>\r\n	</ko_kr>\r\n</root>');

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
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `t_user` */

insert  into `t_user`(`id`,`portal_id`,`platform_key`,`user_type`,`created_date`) values (5,50,0,'USER','2014-05-31 10:05:36'),(6,54,1,'USER','2014-06-22 06:06:55'),(8,56,0,'USER','2014-06-23 10:06:05'),(9,57,0,'USER','2014-06-23 11:06:00'),(10,53,0,'USER','2014-06-23 11:06:37'),(12,55,0,'USER','2014-06-24 10:06:51');

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
) ENGINE=InnoDB AUTO_INCREMENT=115 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `t_wishlist` */

insert  into `t_wishlist`(`id`,`fk_customer`,`name`,`remind_date`,`note`,`date_created`) values (22,5,'main',NULL,NULL,'2014-06-01 11:32:15'),(23,NULL,'main',NULL,NULL,'2014-06-01 22:51:46'),(24,NULL,'main',NULL,NULL,'2014-06-01 23:01:26'),(25,NULL,'main',NULL,NULL,'2014-06-01 23:01:34'),(26,NULL,'main',NULL,NULL,'2014-06-08 17:21:21'),(27,NULL,'main',NULL,NULL,'2014-06-08 18:49:44'),(28,NULL,'main',NULL,NULL,'2014-06-08 18:50:05'),(29,NULL,'main',NULL,NULL,'2014-06-09 21:16:44'),(30,NULL,'main',NULL,NULL,'2014-06-09 21:18:59'),(31,NULL,'main',NULL,NULL,'2014-06-09 21:20:10'),(32,NULL,'main',NULL,NULL,'2014-06-09 21:20:29'),(33,NULL,'main',NULL,NULL,'2014-06-09 21:22:30'),(34,NULL,'main',NULL,NULL,'2014-06-09 21:23:25'),(35,NULL,'main',NULL,NULL,'2014-06-09 21:23:39'),(36,NULL,'main',NULL,NULL,'2014-06-09 21:23:41'),(37,NULL,'main',NULL,NULL,'2014-06-09 21:24:29'),(38,NULL,'main',NULL,NULL,'2014-06-09 21:29:41'),(39,NULL,'main',NULL,NULL,'2014-06-09 21:30:39'),(40,NULL,'main',NULL,NULL,'2014-06-09 21:32:27'),(41,NULL,'main',NULL,NULL,'2014-06-09 21:33:15'),(42,NULL,'main',NULL,NULL,'2014-06-09 21:36:12'),(43,NULL,'main',NULL,NULL,'2014-06-09 21:36:33'),(44,NULL,'main',NULL,NULL,'2014-06-09 21:39:33'),(45,NULL,'main',NULL,NULL,'2014-06-09 21:40:47'),(46,NULL,'main',NULL,NULL,'2014-06-09 21:41:34'),(47,NULL,'main',NULL,NULL,'2014-06-09 21:41:46'),(48,NULL,'main',NULL,NULL,'2014-06-09 21:46:05'),(49,NULL,'main',NULL,NULL,'2014-06-09 21:46:10'),(50,NULL,'main',NULL,NULL,'2014-06-13 11:37:32'),(51,NULL,'main',NULL,NULL,'2014-06-13 11:56:31'),(52,NULL,'main',NULL,NULL,'2014-06-13 19:44:09'),(53,NULL,'main',NULL,NULL,'2014-06-13 20:00:53'),(54,NULL,'main',NULL,NULL,'2014-06-13 20:05:47'),(55,NULL,'main',NULL,NULL,'2014-06-13 20:06:17'),(56,NULL,'main',NULL,NULL,'2014-06-13 20:06:51'),(57,NULL,'main',NULL,NULL,'2014-06-13 22:24:06'),(58,NULL,'main',NULL,NULL,'2014-06-18 22:49:38'),(59,NULL,'main',NULL,NULL,'2014-06-20 00:53:06'),(60,NULL,'main',NULL,NULL,'2014-06-21 15:30:14'),(61,NULL,'main',NULL,NULL,'2014-06-21 15:30:16'),(62,NULL,'main',NULL,NULL,'2014-06-21 22:43:40'),(63,NULL,'main',NULL,NULL,'2014-06-21 22:45:28'),(64,6,'main',NULL,NULL,'2014-06-22 18:39:06'),(65,NULL,'main',NULL,NULL,'2014-06-22 23:16:23'),(66,NULL,'main',NULL,NULL,'2014-06-23 23:00:49'),(67,9,'main',NULL,NULL,'2014-06-23 23:45:26'),(68,NULL,'main',NULL,NULL,'2014-06-24 21:15:56'),(69,NULL,'main',NULL,NULL,'2014-06-24 21:16:02'),(70,NULL,'main',NULL,NULL,'2014-06-24 21:16:10'),(71,NULL,'main',NULL,NULL,'2014-06-24 21:16:15'),(72,7,'main',NULL,NULL,'2014-06-24 21:26:30'),(73,NULL,'main',NULL,NULL,'2014-06-24 21:26:35'),(74,NULL,'main',NULL,NULL,'2014-06-24 21:34:28'),(75,12,'main',NULL,NULL,'2014-06-24 22:44:25'),(76,NULL,'main',NULL,NULL,'2014-06-24 23:44:10'),(77,NULL,'main',NULL,NULL,'2014-06-24 23:44:41'),(78,NULL,'main',NULL,NULL,'2014-06-25 21:36:39'),(79,NULL,'main',NULL,NULL,'2014-06-25 21:41:35'),(80,NULL,'main',NULL,NULL,'2014-06-25 21:45:07'),(81,NULL,'main',NULL,NULL,'2014-06-25 21:45:17'),(82,NULL,'main',NULL,NULL,'2014-06-25 22:02:25'),(83,NULL,'main',NULL,NULL,'2014-06-25 22:21:47'),(84,NULL,'main',NULL,NULL,'2014-06-26 00:59:08'),(85,NULL,'main',NULL,NULL,'2014-06-26 01:39:58'),(86,NULL,'main',NULL,NULL,'2014-06-26 22:33:35'),(87,NULL,'main',NULL,NULL,'2014-06-28 17:13:56'),(88,NULL,'main',NULL,NULL,'2014-06-28 21:35:37'),(89,NULL,'main',NULL,NULL,'2014-06-29 10:01:27'),(90,NULL,'main',NULL,NULL,'2014-06-29 21:05:11'),(91,NULL,'main',NULL,NULL,'2014-06-29 21:27:58'),(92,NULL,'main',NULL,NULL,'2014-07-02 00:58:43'),(93,NULL,'main',NULL,NULL,'2014-07-06 17:45:21'),(94,NULL,'main',NULL,NULL,'2014-07-06 22:41:58'),(95,NULL,'main',NULL,NULL,'2014-07-07 18:54:27'),(96,NULL,'main',NULL,NULL,'2014-07-07 19:01:24'),(97,NULL,'main',NULL,NULL,'2014-07-07 19:23:49'),(98,NULL,'main',NULL,NULL,'2014-07-12 16:09:43'),(99,NULL,'main',NULL,NULL,'2014-07-12 16:11:06'),(100,NULL,'main',NULL,NULL,'2014-07-14 22:33:58'),(101,NULL,'main',NULL,NULL,'2014-07-15 20:10:50'),(102,NULL,'main',NULL,NULL,'2014-07-16 03:42:04'),(103,NULL,'main',NULL,NULL,'2014-07-19 10:47:53'),(104,NULL,'main',NULL,NULL,'2014-07-19 17:14:24'),(105,NULL,'main',NULL,NULL,'2014-07-19 19:45:41'),(106,NULL,'main',NULL,NULL,'2014-07-20 20:55:24'),(107,NULL,'main',NULL,NULL,'2014-07-23 23:59:43'),(108,NULL,'main',NULL,NULL,'2014-07-25 01:34:43'),(109,NULL,'main',NULL,NULL,'2014-07-25 18:44:36'),(110,NULL,'main',NULL,NULL,'2014-07-25 18:44:48'),(111,NULL,'main',NULL,NULL,'2014-07-25 18:44:55'),(112,NULL,'main',NULL,NULL,'2014-07-27 21:24:49'),(113,NULL,'main',NULL,NULL,'2014-07-27 22:26:43'),(114,NULL,'main',NULL,NULL,'2014-07-30 20:00:39');

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
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `t_wishlist_detail` */

insert  into `t_wishlist_detail`(`id`,`fk_wishlist`,`type`,`note`,`fk_product`,`status`) values (34,22,NULL,NULL,6,0),(35,22,NULL,NULL,1,0),(36,22,NULL,NULL,5,0),(37,22,NULL,NULL,5,0),(38,22,NULL,NULL,1,0),(39,22,NULL,NULL,6,0),(40,67,NULL,NULL,5,0),(41,67,NULL,NULL,5,0),(42,75,NULL,NULL,1,0),(43,75,NULL,NULL,13,0),(44,22,NULL,NULL,13,0),(45,75,NULL,NULL,20,1);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
