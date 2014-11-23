/*
SQLyog Enterprise - MySQL GUI v8.12 
MySQL - 5.5.29 : Database - eproject
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
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `t_category` */

insert  into `t_category`(`id`,`codename`,`fk_parent`,`sort`,`path`,`image`,`status`,`is_container`,`path_sort`,`is_show_in_home`) values (1,'family',0,1,'1/',NULL,1,1,'1/',0),(2,'living',1,1,'1/2/',NULL,1,0,'1/1/',0),(3,'kitchen_dinning',1,2,'1/3/',NULL,1,0,'1/2/',0),(4,'bath_bed',1,3,'1/4/',NULL,1,0,'1/3/',0),(5,'home_deco',1,4,'1/5/',NULL,1,0,'1/4/',0),(6,'cloths_towels',1,5,'1/6/',NULL,1,0,'1/5/',0),(7,'sport',1,6,'1/7/',NULL,1,0,'1/6/',0),(8,'family_other',1,7,'1/8/',NULL,1,0,'1/7/',0),(9,'mom_baby',0,2,'9/',NULL,1,1,'2/',0),(10,'diapering',9,1,'9/10/',NULL,1,0,'2/1/',0),(11,'baby_clothings',9,2,'9/11/',NULL,1,0,'2/2/',0),(12,'smart_toys',9,3,'9/12/',NULL,1,0,'2/3/',0),(13,'mom_clothings',9,4,'9/13/',NULL,1,0,'2/4/',0),(14,'bath_baby_care',9,5,'9/14/',NULL,1,0,'2/5/',0),(15,'accessories_bed',9,6,'9/15/',NULL,1,0,'2/6/',0),(16,'mom_other',9,7,'9/16/',NULL,1,0,'2/7/',0),(17,'food_drink',0,3,'17/',NULL,1,1,'3/',0),(18,'junk_food',17,1,'17/18/',NULL,1,0,'3/1/',0),(19,'drink',17,2,'17/19/',NULL,1,0,'3/2/',0),(20,'sweetened',17,3,'17/20/',NULL,1,0,'3/3/',0),(21,'condiments',17,4,'17/21/',NULL,1,0,'3/4/',0),(22,'food_other',17,5,'17/22',NULL,1,0,'3/5/',0),(23,'food_special',17,6,'17/23/',NULL,1,0,'3/6/',0),(24,'gift',0,4,'24/',NULL,1,0,'4/',0),(25,'traditional_clothes',24,1,'24/25/',NULL,1,0,'4/1/',0),(26,'handmade',24,2,'24/26/',NULL,1,0,'4/2/',0),(27,'greeting_card',24,3,'24/27/',NULL,1,0,'4/3/',0),(28,'gift_other',24,4,'24/28/',NULL,1,0,'4/4/',0);

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
) ENGINE=InnoDB AUTO_INCREMENT=139 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `t_category_language` */

insert  into `t_category_language`(`id`,`fk_category`,`language`,`name`,`description`,`slide_images`,`side_images`,`product_section_image`) values (55,1,'VN-VI','Gia đình',NULL,NULL,NULL,NULL),(56,1,'EN-US','Family',NULL,NULL,NULL,NULL),(57,1,'KO-KR','패밀리',NULL,NULL,NULL,NULL),(58,2,'VN-VI','Đồ gia dụng',NULL,NULL,NULL,NULL),(59,2,'EN-US','Home Living',NULL,NULL,NULL,NULL),(60,2,'KO-KR','홈 리빙',NULL,NULL,NULL,NULL),(61,3,'VN-VI','Bếp / Phòng ăn',NULL,NULL,NULL,NULL),(62,3,'EN-US','Kitchen/Dinning',NULL,NULL,NULL,NULL),(63,3,'KO-KR','주방',NULL,NULL,NULL,NULL),(64,4,'VN-VI','Phòng tắm/ngủ',NULL,NULL,NULL,NULL),(65,4,'KO-KR','침구 / 욕실',NULL,NULL,NULL,NULL),(66,4,'EN-US','Bath / Bed',NULL,NULL,NULL,NULL),(67,5,'VN-VI','Trang trí',NULL,NULL,NULL,NULL),(68,5,'EN-US','Décor',NULL,NULL,NULL,NULL),(69,5,'KO-KR','데코',NULL,NULL,NULL,NULL),(70,6,'VN-VI','Khăn/Đồ vải',NULL,NULL,NULL,NULL),(71,6,'EN-US','Cloths/Towels',NULL,NULL,NULL,NULL),(72,6,'KO-KR','패브릭',NULL,NULL,NULL,NULL),(73,7,'VN-VI','Thể thao',NULL,NULL,NULL,NULL),(74,7,'EN-US','Sports',NULL,NULL,NULL,NULL),(75,7,'KO-KR','스포츠',NULL,NULL,NULL,NULL),(76,8,'VN-VI','Sản phẩm khác',NULL,NULL,NULL,NULL),(77,8,'EN-US','Other',NULL,NULL,NULL,NULL),(78,8,'KO-KR','기타',NULL,NULL,NULL,NULL),(79,9,'VN-VI','Mẹ và Bé',NULL,NULL,NULL,NULL),(80,9,'EN-US','Mom & Baby',NULL,NULL,NULL,NULL),(81,9,'KO-KR','맘 & 베이비',NULL,NULL,NULL,NULL),(82,10,'VN-VI','Tã/ Vệ sinh',NULL,NULL,NULL,NULL),(83,10,'EN-US','Diapering',NULL,NULL,NULL,NULL),(84,10,'KO-KR','기저귀',NULL,NULL,NULL,NULL),(85,11,'VN-VI','Quần áo cho bé',NULL,NULL,NULL,NULL),(86,11,'EN-US','Baby clothings',NULL,NULL,NULL,NULL),(87,11,'KO-KR','유아동의류',NULL,NULL,NULL,NULL),(88,12,'VN-VI','Đồ chơi ',NULL,NULL,NULL,NULL),(89,12,'EN-US','Baby Toys',NULL,NULL,NULL,NULL),(90,12,'KO-KR','아기 장난감',NULL,NULL,NULL,NULL),(91,13,'VN-VI','Đầm bầu',NULL,NULL,NULL,NULL),(92,13,'EN-US','Mom clothings',NULL,NULL,NULL,NULL),(93,13,'KO-KR','임부복',NULL,NULL,NULL,NULL),(94,14,'VN-VI','Tắm & Chăm sóc',NULL,NULL,NULL,NULL),(95,14,'EN-US','Bath & Baby care',NULL,NULL,NULL,NULL),(96,14,'KO-KR','유아용품',NULL,NULL,NULL,NULL),(97,15,'VN-VI','Phụ kiện / Ngủ',NULL,NULL,NULL,NULL),(98,15,'EN-US','Accessories',NULL,NULL,NULL,NULL),(99,15,'KO-KR','액세서리',NULL,NULL,NULL,NULL),(100,16,'VN-VI','Khác',NULL,NULL,NULL,NULL),(101,16,'EN-US','Other',NULL,NULL,NULL,NULL),(102,16,'KO-KR','기타',NULL,NULL,NULL,NULL),(103,17,'VN-VI','Đồ ăn uống',NULL,NULL,NULL,NULL),(104,17,'EN-US','Food & Drinks',NULL,NULL,NULL,NULL),(105,17,'KO-KR','식품',NULL,NULL,NULL,NULL),(106,18,'VN-VI','Đồ ăn liền/hộp/khô',NULL,NULL,NULL,NULL),(107,18,'EN-US','Instant/Cans/Dried',NULL,NULL,NULL,NULL),(108,18,'KO-KR','인스턴트',NULL,NULL,NULL,NULL),(109,19,'VN-VI','Đồ uống',NULL,NULL,NULL,NULL),(110,19,'EN-US','Drink',NULL,NULL,NULL,NULL),(111,19,'KO-KR','음료',NULL,NULL,NULL,NULL),(112,20,'VN-VI','Bánh/Kẹo/Mứt',NULL,NULL,NULL,NULL),(113,20,'EN-US','Sweetened',NULL,NULL,NULL,NULL),(114,20,'KO-KR','과자',NULL,NULL,NULL,NULL),(115,21,'VN-VI','Gia vị bếp\r',NULL,NULL,NULL,NULL),(116,21,'EN-US','Condiments',NULL,NULL,NULL,NULL),(117,21,'KO-KR','조미료',NULL,NULL,NULL,NULL),(118,22,'VN-VI','Đồ ăn khác',NULL,NULL,NULL,NULL),(119,22,'EN-US','Others',NULL,NULL,NULL,NULL),(120,22,'KO-KR','기타',NULL,NULL,NULL,NULL),(121,23,'VN-VI','Đặc sản',NULL,NULL,NULL,NULL),(122,23,'EN-US','Special',NULL,NULL,NULL,NULL),(123,23,'KO-KR','특산물',NULL,NULL,NULL,NULL),(124,24,'VN-VI','Quà tặng',NULL,NULL,NULL,NULL),(125,24,'EN-US','Gift & Special',NULL,NULL,NULL,NULL),(126,24,'KO-KR','특별 선물',NULL,NULL,NULL,NULL),(127,25,'VN-VI','Truyền thống\r',NULL,NULL,NULL,NULL),(128,25,'EN-US','Traditional Clothes',NULL,NULL,NULL,NULL),(129,25,'KO-KR','전통 의류',NULL,NULL,NULL,NULL),(130,26,'VN-VI','Handmade',NULL,NULL,NULL,NULL),(131,26,'EN-US','Handmade',NULL,NULL,NULL,NULL),(132,26,'KO-KR','수공예품',NULL,NULL,NULL,NULL),(133,27,'VN-VI','Thiệp cá nhân',NULL,NULL,NULL,NULL),(134,27,'EN-US','Greeting cards',NULL,NULL,NULL,NULL),(135,27,'KO-KR','카드',NULL,NULL,NULL,NULL),(136,28,'VN-VI','Khác',NULL,NULL,NULL,NULL),(137,28,'EN-US','Other',NULL,NULL,NULL,NULL),(138,28,'KO-KR','기타',NULL,NULL,NULL,NULL);

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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `t_feature_group` */

insert  into `t_feature_group`(`id`,`codename`,`url`,`xml_language`,`sort`) values (1,'family','/category/show/1','<root><language id=\"VN-VI\"><name>Gia đình</name></language><language id=\"EN-US\"><name>Family</name></language><language id=\"KO-KR\"><name>가족</name></language></root>',5),(2,'kid','/category/show/2','<root><language id=\"VN-VI\"><name>Mẹ và bé</name></language><language id=\"EN-US\"><name>Kid</name></language><language id=\"KO-KR\"><name>아이</name></language></root>',4),(3,'food','/category/show/3','<root><language id=\"VN-VI\"><name>Thực phẩm</name></language><language id=\"EN-US\"><name>Food</name></language><language id=\"KO-KR\"><name>음식</name></language></root>',3),(4,'gift','/category/show/4','<root><language id=\"VN-VI\"><name>Quà tặng</name></language><language id=\"EN-US\"><name>Gift</name></language><language id=\"KO-KR\"><name>선물</name></language></root>',2),(5,'__root__',NULL,'<root><language id=\"VN-VI\"><name>Sản phẩm nổi bật</name></language><language id=\"EN-US\"><name>Feature product</name></language><language id=\"KO-KR\"><name>기능 제품</name></language></root>',1);

/*Table structure for table `t_feature_group_details` */

DROP TABLE IF EXISTS `t_feature_group_details`;

CREATE TABLE `t_feature_group_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_product` int(11) DEFAULT NULL,
  `fk_group` int(11) NOT NULL,
  `sort` tinyint(4) DEFAULT NULL,
  `img_src` text COLLATE utf8_unicode_ci,
  `img_title` text COLLATE utf8_unicode_ci,
  `row` tinyint(4) DEFAULT NULL,
  `img_url` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `t_feature_group_details` */

insert  into `t_feature_group_details`(`id`,`fk_product`,`fk_group`,`sort`,`img_src`,`img_title`,`row`,`img_url`) values (1,26,1,2,NULL,NULL,1,NULL),(2,27,1,3,NULL,NULL,1,NULL),(4,26,2,NULL,NULL,NULL,1,NULL),(5,27,2,NULL,NULL,NULL,1,NULL),(7,26,3,NULL,NULL,NULL,1,NULL),(8,27,3,NULL,NULL,NULL,1,NULL),(10,26,4,NULL,NULL,NULL,1,NULL),(11,27,4,NULL,NULL,NULL,1,NULL),(13,27,2,NULL,NULL,NULL,1,NULL),(14,26,3,NULL,NULL,NULL,1,NULL),(21,NULL,5,1,'/images/feature/noibat1.png','Kitchen',1,'javascript:;'),(22,59,5,2,NULL,NULL,1,NULL),(23,97,5,3,NULL,NULL,1,NULL),(24,90,5,1,NULL,NULL,2,NULL),(25,93,5,2,NULL,NULL,2,NULL),(26,92,5,3,NULL,NULL,2,NULL),(27,NULL,5,4,'/images/feature/noibat2.png','Food',2,'javascript:;');

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

insert  into `t_file`(`id`,`fk_user`,`fk_parent`,`url`,`is_dir`,`date_modified`,`internal_path`,`name`) values (1,1,NULL,'/uploads/2014/3/27/image4.jpg',0,'2014-03-27 22:09:19','/uploads/2014/3/27/image4.jpg',NULL),(2,1,NULL,'/uploads/2014/3/27/image.jpg',0,'2014-03-27 22:09:19','/uploads/2014/3/27/image.jpg',NULL),(3,1,NULL,'/uploads/2014/3/27/image2.jpg',0,'2014-03-27 22:09:19','/uploads/2014/3/27/image2.jpg',NULL),(4,1,NULL,'/uploads/2014/3/27/image3.jpg',0,'2014-03-27 22:09:19','/uploads/2014/3/27/image3.jpg',NULL),(5,1,NULL,'/uploads/2014/05/20/452e9971ae0fff703dc3279d605c3817.png',0,'2014-05-20 22:30:55','/uploads/2014/05/20/452e9971ae0fff703dc3279d605c3817.png',NULL),(6,1,NULL,'/uploads/2014/05/20/ddc50e1773620024c3e0158946a47435.png',0,'2014-05-20 22:31:33','/uploads/2014/05/20/ddc50e1773620024c3e0158946a47435.png',NULL),(7,1,NULL,'/uploads/2014/05/20/4670b74b68432aebf551ad5112644f59.png',0,'2014-05-20 22:31:54','/uploads/2014/05/20/4670b74b68432aebf551ad5112644f59.png',NULL),(8,1,NULL,'/uploads/2014/05/20/c07750dd9fae781cf55970cfdc4a7048.jpg',0,'2014-05-20 23:37:12','/uploads/2014/05/20/c07750dd9fae781cf55970cfdc4a7048.jpg',NULL),(9,1,NULL,'/uploads/2014/05/20/ae8564fee192da10b00b78cefd09fe00.jpg',0,'2014-05-20 23:58:15','/uploads/2014/05/20/ae8564fee192da10b00b78cefd09fe00.jpg',NULL),(11,5,NULL,'/uploads/2014/06/08/71a09835536adb714fa57a856c6aea4a.jpg',0,'2014-06-08 11:43:10','uploads/2014/06/08/71a09835536adb714fa57a856c6aea4a.jpg',NULL),(13,5,NULL,'/uploads/2014/06/15/849dc29bf31511125d9c60beefeee09a.jpg',0,'2014-06-15 11:32:26','uploads/2014/06/15/849dc29bf31511125d9c60beefeee09a.jpg',NULL),(14,5,NULL,'/uploads/2014/06/15/ba8fb8cde49da48b20ddd858d7fb1891.jpg',0,'2014-06-15 11:32:43','uploads/2014/06/15/ba8fb8cde49da48b20ddd858d7fb1891.jpg',NULL),(15,5,NULL,'/uploads/2014/06/15/ae06ce5f7061dcc5e373ce86bba415f8.jpg',0,'2014-06-15 11:32:43','uploads/2014/06/15/ae06ce5f7061dcc5e373ce86bba415f8.jpg',NULL),(16,5,NULL,'/uploads/2014/06/17/8907662f2c98c239f7b50dd1876e6110.jpg',0,'2014-06-17 23:53:11','uploads/2014/06/17/8907662f2c98c239f7b50dd1876e6110.jpg',NULL),(17,5,NULL,'/uploads/2014/06/17/25d2444ee774ee476d557a7b1f44d23b.jpg',0,'2014-06-17 23:53:11','uploads/2014/06/17/25d2444ee774ee476d557a7b1f44d23b.jpg',NULL),(18,5,NULL,'/uploads/2014/06/17/e946ea042fa95d0c23dd7b3f3aa196ae.jpg',0,'2014-06-17 23:53:41','uploads/2014/06/17/e946ea042fa95d0c23dd7b3f3aa196ae.jpg',NULL),(19,5,NULL,'/uploads/2014/06/21/ecb3a62600891f612ac26c389d643a39.jpg',0,'2014-06-21 13:43:30','uploads/2014/06/21/ecb3a62600891f612ac26c389d643a39.jpg',NULL),(20,5,NULL,'/uploads/2014/06/22/c6be54a91a806fb214a601cc06c202ef.jpg',0,'2014-06-22 10:15:03','uploads/2014/06/22/c6be54a91a806fb214a601cc06c202ef.jpg',NULL),(21,5,NULL,'/uploads/2014/06/28/0588407eb2f9f9a16f451beee2c75cc1.jpg',0,'2014-06-28 19:33:55','uploads/2014/06/28/0588407eb2f9f9a16f451beee2c75cc1.jpg',NULL),(22,5,NULL,'/uploads/2014/06/29/ba8979cb376ba5a631e1816fc46f5bd0.jpg',0,'2014-06-29 10:16:43','uploads/2014/06/29/ba8979cb376ba5a631e1816fc46f5bd0.jpg',NULL),(23,5,NULL,'/uploads/2014/06/29/418d9e01d9ef5a3ea9a0db13db80660f.jpg',0,'2014-06-29 10:44:01','uploads/2014/06/29/418d9e01d9ef5a3ea9a0db13db80660f.jpg',NULL),(31,5,NULL,'/uploads/2014/06/29/3b474cdda02c8ec908ca4d52fd2becfe.jpg',0,'2014-06-29 11:47:09','uploads/2014/06/29/3b474cdda02c8ec908ca4d52fd2becfe.jpg',NULL),(32,5,NULL,'/uploads/2014/07/06/8a9698d2db342a5d7b78290877b69dba.jpg',0,'2014-07-06 15:20:19','uploads/2014/07/06/8a9698d2db342a5d7b78290877b69dba.jpg',NULL),(34,5,NULL,'/uploads/2014/07/26/2ac73dcd2861aed13372f036c9c558fd.jpg',0,'2014-07-26 09:35:18','uploads/2014/07/26/2ac73dcd2861aed13372f036c9c558fd.jpg',NULL),(36,5,NULL,'/uploads/2014/08/12/4a0f2697365a8bdc4a58e25fd751e7ff.jpg',0,'2014-08-12 23:06:53','uploads/2014/08/12/4a0f2697365a8bdc4a58e25fd751e7ff.jpg',NULL),(37,5,NULL,'/uploads/2014/08/12/a05b4032a7d04656113a862f8ca850aa.jpg',0,'2014-08-12 23:23:22','uploads/2014/08/12/a05b4032a7d04656113a862f8ca850aa.jpg',NULL),(38,5,NULL,'/uploads/2014/08/12/e23b0248d7a39e7f9938450bae0ee2f9.jpg',0,'2014-08-12 23:25:16','uploads/2014/08/12/e23b0248d7a39e7f9938450bae0ee2f9.jpg',NULL),(39,5,NULL,'/uploads/2014/09/13/3d260874a85bf34463b1a175b56611c3.jpg',0,'2014-09-13 16:34:11','uploads/2014/09/13/3d260874a85bf34463b1a175b56611c3.jpg',NULL),(40,5,NULL,'/2014/10/04/593c9fbc596609aaabe14d9c54dcb7f3.jpg',0,'2014-10-04 15:09:41','2014/10/04/593c9fbc596609aaabe14d9c54dcb7f3.jpg',NULL);

/*Table structure for table `t_hot` */

DROP TABLE IF EXISTS `t_hot`;

CREATE TABLE `t_hot` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_product` int(11) DEFAULT NULL,
  `sort` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=79 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `t_hot` */

insert  into `t_hot`(`id`,`fk_product`,`sort`) values (48,26,NULL),(49,27,NULL),(50,26,NULL),(51,27,NULL),(52,26,NULL),(53,27,NULL),(54,26,NULL),(55,27,NULL),(56,26,NULL),(57,27,NULL),(58,26,NULL),(59,27,NULL),(60,26,NULL),(61,27,NULL),(62,26,NULL),(63,26,NULL),(64,27,NULL),(65,27,NULL),(66,26,NULL),(67,27,NULL),(68,26,NULL),(69,27,NULL),(70,26,NULL),(71,27,NULL),(72,26,NULL),(73,27,NULL),(74,26,NULL),(75,27,NULL),(76,26,NULL),(77,27,NULL),(78,26,NULL);

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
) ENGINE=InnoDB AUTO_INCREMENT=64 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `t_location` */

insert  into `t_location`(`id`,`name`,`level`,`fk_parent`,`codename`) values (1,'Ha Noi','province',NULL,'101'),(2,'Hai Duong','province',NULL,'130'),(3,'Ha Giang','province',NULL,'102'),(4,'Cao Bang','province',NULL,'104'),(5,'Bac Kan','province',NULL,'106'),(6,'Tuyen Quang','province',NULL,'108'),(7,'Lao Cai','province',NULL,'110'),(8,'Dien Bien','province',NULL,'111'),(9,'Lai Chau','province',NULL,'112'),(10,'Son La','province',NULL,'114'),(11,'Yen Bai','province',NULL,'115'),(12,'Hoa Binh','province',NULL,'117'),(13,'Thai Nguyen','province',NULL,'119'),(14,'Lang Son','province',NULL,'120'),(15,'Quang Ninh','province',NULL,'122'),(16,'Bac Giang','province',NULL,'124'),(17,'Phu Tho','province',NULL,'125'),(18,'Vinh Phuc','province',NULL,'126'),(19,'Bac Ninh','province',NULL,'127'),(20,'Hai Phong','province',NULL,'131'),(21,'Hung Yen','province',NULL,'133'),(22,'Thai Binh','province',NULL,'134'),(23,'Ha Nam','province',NULL,'135'),(24,'Nam Dinh','province',NULL,'136'),(25,'Ninh Binh','province',NULL,'137'),(26,'Thanh Hoa','province',NULL,'238'),(27,'Nghe An','province',NULL,'240'),(28,'Ha Tinh','province',NULL,'242'),(29,'Quang Binh','province',NULL,'244'),(30,'Quang Tri','province',NULL,'245'),(31,'Thua Thien Hue','province',NULL,'246'),(32,'Da Nang','province',NULL,'248'),(33,'Quang Nam','province',NULL,'249'),(34,'Quang Ngai','province',NULL,'251'),(35,'Binh Dinh','province',NULL,'252'),(36,'Phu Yen','province',NULL,'254'),(37,'Khanh Hoa','province',NULL,'256'),(38,'Ninh Thuan','province',NULL,'258'),(39,'Binh Thuan','province',NULL,'260'),(40,'Kom Tum','province',NULL,'262'),(41,'Gia Lai','province',NULL,'264'),(42,'Dak Lak','province',NULL,'266'),(43,'Dak Nong','province',NULL,'267'),(44,'Lam Dong','province',NULL,'268'),(45,'Binh Phuoc','province',NULL,'270'),(46,'Tay Ninh','province',NULL,'272'),(47,'Binh Duong','province',NULL,'274'),(48,'Dong Nai','province',NULL,'275'),(49,'Ba Ria - Vung Tau','province',NULL,'277'),(50,'Ho Chi Minh city','province',NULL,'379'),(51,'Long An','province',NULL,'380'),(52,'Tien Giang','province',NULL,'382'),(53,'Ben Tre','province',NULL,'383'),(54,'Tra Vinh','province',NULL,'384'),(55,'Vinh Long','province',NULL,'386'),(56,'Dong Thap','province',NULL,'387'),(57,'An Giang','province',NULL,'389'),(58,'Kien Giang','province',NULL,'391'),(59,'Can Tho','province',NULL,'392'),(60,'Hau Giang','province',NULL,'393'),(61,'Soc Trang','province',NULL,'394'),(62,'Bac Lieu','province',NULL,'395'),(63,'Ca Mau','province',NULL,'396');

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
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `t_order_evidence` */

insert  into `t_order_evidence`(`id`,`fk_user`,`checksum`,`date_created`,`date_expired`,`unique_key`) values (1,NULL,'84ccc4745a8f1bb963cc05d28c8597f6','2014-04-06 22:24:30','2014-03-09 22:24:00','1'),(3,NULL,'84ccc4745a8f1bb963cc05d28c8597f6','2014-04-06 22:40:03','2014-04-09 22:40:00',NULL),(4,NULL,'84ccc4745a8f1bb963cc05d28c8597f6','2014-04-06 22:40:39','2014-04-09 22:40:00',NULL),(5,NULL,'7607632bc67c439199acc402cd4c802e','2014-04-19 21:42:55','2014-04-22 21:42:00','4be77891125043d8bd657531923d1441'),(6,NULL,'7607632bc67c439199acc402cd4c802e','2014-04-19 21:49:16','2014-04-22 21:49:00','5ee043daba80f7c99e50b0136825d25f'),(7,NULL,'7607632bc67c439199acc402cd4c802e','2014-04-19 21:49:58','2014-04-22 21:49:00','546e6c4a24c5ef83c8127edbe0ff0d66'),(8,NULL,'7607632bc67c439199acc402cd4c802e','2014-04-19 21:53:19','2014-04-22 21:53:00','e3a78b6b9fb231e3e0bf3f16529ed2c6'),(9,NULL,'7607632bc67c439199acc402cd4c802e','2014-04-19 21:53:40','2014-04-22 21:53:00','7c8ab24fab47bef56b79073a2f6645dc'),(10,NULL,'7607632bc67c439199acc402cd4c802e','2014-04-19 21:53:51','2014-04-22 21:53:00','785c68d9ddb3e1a51681e5f6f846f2e9'),(11,NULL,'7607632bc67c439199acc402cd4c802e','2014-04-19 21:54:00','2014-04-22 21:54:00','048dac3cfc5d83309b26a417c7aab519'),(12,NULL,'60e50e483bffa68cc32ac655e6213efe','2014-04-19 21:57:03','2014-04-22 21:57:00','bef5527441ddccade83e6d622b1b11e2'),(13,NULL,'7ada60191eef25e1b931a491ffd7bcdd','2014-04-20 14:37:07','2014-04-23 14:37:00','1339362c7a8f9d73347feb1865937ab5'),(14,NULL,'29e83ad0272b828a389ad6cba7b27aa3','2014-05-12 22:28:32','2014-05-15 22:28:00','0ff5cc1180200e6c93f4ac47f181e56b'),(15,NULL,'f4762ed99e7f5f5c69cc54530550f70d','2014-05-12 23:03:39','2014-05-15 23:03:00','32a9c780cb80722f8a14e48a3fbd91ee'),(16,NULL,'f4762ed99e7f5f5c69cc54530550f70d','2014-05-12 23:08:56','2014-05-15 23:08:00','3bda1a30477647720d198f9625f97fe2'),(17,NULL,'ca8dfbd276661dc67fe25ed1b72c4e15','2014-05-15 12:49:16','2014-05-18 12:49:00','fff07eaee6bd6de274776d9a0d730d52'),(18,NULL,'bf29aadc447503bcce0a0ef09e1c591f','2014-05-17 14:32:01','2014-05-20 14:32:00','0e7b2a18d329675005996f07ae0e03cf'),(19,NULL,'8952c2bb94b48588b6cae68d8b8a6b52','2014-05-17 21:09:32','2014-05-20 21:09:00','7e0be4f3d22ba62457984e921cdfa518'),(20,5,'91fd7653c6d634175dbc0a80b26cd174','2014-06-22 12:47:37','2014-06-25 12:47:00','b42bae90caad31bd070cf2a4e4f2857f'),(21,5,'c171789ab36b9115774a2c75d6e040cd','2014-06-24 21:43:28','2014-06-27 21:43:00','21e1961c0dda11e47e8d3c298602aa9d'),(22,NULL,'3727b59954955b509b8336d3bb205f40','2014-06-25 22:09:53','2014-06-28 22:09:00','ab07ebc37b9e9e813e92a9902ce3a9af'),(23,NULL,'83df81102058ac2f350147f47bcde4f5','2014-06-25 22:16:43','2014-06-28 22:16:00','7b259d1bb8146025c16e4c319321a364');

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
  `status` tinyint(4) DEFAULT '0',
  `price` double DEFAULT NULL,
  `price_origin` double DEFAULT NULL,
  `release_date` datetime DEFAULT NULL,
  `sales_percent` tinyint(4) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `t_product` */

insert  into `t_product`(`id`,`fk_category`,`fk_seller`,`fk_group`,`is_group`,`discount`,`date_created`,`count_pin`,`status`,`price`,`price_origin`,`release_date`,`sales_percent`) values (26,6,1,NULL,0,0,'2014-06-21 13:43:30',0,1,800000,800000,'2014-09-17 21:41:19',0),(27,5,1,NULL,0,0,'2014-06-21 13:43:30',0,1,10000,9000,'2014-09-17 21:41:19',NULL),(28,5,1,NULL,0,0,'2014-06-21 13:43:30',0,1,50000,60000,'2014-09-17 21:41:19',NULL),(29,5,1,NULL,0,0,'2014-06-21 13:43:30',0,1,678987,611088,'2014-09-17 21:41:19',NULL),(30,5,1,NULL,0,0,'2014-06-21 13:43:30',0,1,678987,611088,'2014-09-17 21:41:19',NULL),(31,5,1,NULL,0,0,'2014-06-21 13:43:30',0,1,10000,9000,'2014-09-17 21:41:19',NULL),(32,5,1,NULL,0,0,'2014-06-21 13:43:30',0,1,10000,9000,'2014-09-17 21:41:19',NULL),(33,5,1,NULL,0,0,'2014-06-21 13:43:30',0,1,10000,9000,'2014-09-17 21:41:19',NULL),(34,5,1,NULL,0,0,'2014-06-21 13:43:30',0,1,10000,9000,'2014-09-17 21:41:19',NULL),(35,5,1,NULL,0,0,'2014-06-21 13:43:30',0,1,10000,9000,'2014-09-17 21:41:19',NULL),(36,5,1,NULL,0,0,'2014-06-21 13:43:30',0,1,10000,9000,'2014-09-17 21:41:19',NULL),(37,5,1,NULL,0,0,'2014-06-21 13:43:30',0,1,10000,9000,'2014-09-17 21:41:19',NULL),(38,5,1,NULL,0,0,'2014-06-21 13:43:30',0,1,10000,9000,'2014-09-17 21:41:19',NULL),(39,5,1,NULL,0,0,'2014-06-21 13:43:30',0,1,10000,9000,'2014-09-17 21:41:19',NULL),(40,5,1,NULL,0,0,'2014-06-21 13:43:30',0,1,10000,9000,'2014-09-17 21:41:19',NULL),(41,5,1,NULL,0,0,'2014-06-21 13:43:30',0,1,10000,9000,'2014-09-17 21:41:19',NULL),(42,5,1,NULL,0,0,'2014-06-21 13:43:30',0,1,10000,9000,'2014-09-17 21:41:19',NULL),(43,5,1,NULL,0,0,'2014-06-21 13:43:30',0,1,10000,9000,'2014-09-17 21:41:19',NULL),(44,5,1,NULL,0,0,'2014-06-21 13:43:30',0,1,10000,9000,'2014-09-17 21:41:19',NULL),(45,5,1,NULL,0,0,'2014-06-21 13:43:30',0,1,10000,9000,'2014-09-17 21:41:19',NULL),(46,5,1,NULL,0,0,'2014-06-21 13:43:30',0,1,10000,9000,'2014-09-17 21:41:19',NULL),(47,5,1,NULL,0,0,'2014-06-21 13:43:30',0,1,10000,9000,'2014-09-17 21:41:19',NULL),(48,5,1,NULL,0,0,'2014-06-21 13:43:30',0,1,10000,9000,'2014-09-17 21:41:19',NULL),(49,5,1,NULL,0,0,'2014-06-21 13:43:30',0,1,10000,9000,'2014-09-17 21:41:19',NULL),(50,5,1,NULL,0,0,'2014-06-21 13:43:30',0,1,10000,9000,'2014-09-17 21:41:19',NULL),(51,5,1,NULL,0,0,'2014-06-21 13:43:30',0,1,10000,9000,'2014-09-17 21:41:19',NULL),(52,5,1,NULL,0,0,'2014-06-21 13:43:30',0,1,10000,9000,'2014-09-17 21:41:19',NULL),(53,5,1,NULL,0,0,'2014-06-21 13:43:30',0,1,10000,9000,'2014-09-17 21:41:19',NULL),(54,5,1,NULL,0,0,'2014-06-21 13:43:30',0,1,10000,9000,'2014-09-17 21:41:19',NULL),(55,5,1,NULL,0,0,NULL,0,1,1221,0,'2014-09-17 21:41:19',NULL);

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
) ENGINE=InnoDB AUTO_INCREMENT=1611 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `t_product_attribute` */

insert  into `t_product_attribute`(`id`,`fk_product`,`fk_attribute_type`,`value_number`,`value_enum`,`value_text`,`language`,`value_varchar`) values (304,14,1,NULL,NULL,NULL,'VN-VI','Pha lê dâu'),(305,14,20,NULL,24,NULL,NULL,NULL),(306,14,18,NULL,NULL,NULL,NULL,'abc'),(307,14,2,NULL,NULL,'<p>zxsadas</p>','VN-VI',NULL),(309,14,21,NULL,NULL,NULL,NULL,'eng'),(310,14,22,NULL,NULL,'ddkffk',NULL,NULL),(311,14,23,NULL,NULL,'sdkdkkd',NULL,NULL),(312,15,1,NULL,NULL,NULL,'VN-VI','def'),(313,15,20,NULL,24,NULL,NULL,NULL),(314,15,18,NULL,NULL,NULL,NULL,'qwewqe'),(315,15,2,NULL,NULL,'<p>sdasda</p>','VN-VI',NULL),(317,15,21,NULL,NULL,NULL,NULL,'ssa'),(318,15,22,NULL,NULL,'das',NULL,NULL),(319,15,23,NULL,NULL,'dasd',NULL,NULL),(320,14,1,NULL,NULL,NULL,'EN-US','Strawberry'),(322,14,2,NULL,NULL,'<p>eng</p>','EN-US',NULL),(323,20,1,NULL,NULL,NULL,'VN-VI','Pha lê dâu'),(324,20,20,NULL,24,NULL,NULL,NULL),(325,20,18,NULL,NULL,NULL,NULL,'abc'),(326,20,2,NULL,NULL,'<p>zxsadas</p>','VN-VI',NULL),(328,20,21,NULL,NULL,NULL,NULL,'eng'),(329,20,22,NULL,NULL,'ddkffk',NULL,NULL),(330,20,23,NULL,NULL,'sdkdkkd',NULL,NULL),(331,20,1,NULL,NULL,NULL,'EN-US','ssas'),(332,20,2,NULL,NULL,'','EN-US',NULL),(337,20,13,11,NULL,NULL,NULL,NULL),(338,20,24,NULL,0,NULL,NULL,NULL),(339,20,14,0,NULL,NULL,NULL,NULL),(340,20,26,NULL,NULL,'',NULL,NULL),(341,20,27,0,NULL,NULL,NULL,NULL),(342,20,28,0,NULL,NULL,NULL,NULL),(343,20,29,NULL,0,NULL,NULL,NULL),(344,20,30,NULL,0,NULL,NULL,NULL),(345,20,31,0,NULL,NULL,NULL,NULL),(346,20,32,0,NULL,NULL,NULL,NULL),(347,20,33,0,NULL,NULL,NULL,NULL),(348,21,1,NULL,NULL,NULL,'EN-US','gef'),(349,21,20,NULL,0,NULL,NULL,NULL),(350,21,18,NULL,NULL,NULL,NULL,''),(351,21,13,1212,NULL,NULL,NULL,NULL),(352,21,24,NULL,0,NULL,NULL,NULL),(353,21,14,0,NULL,NULL,NULL,NULL),(354,21,2,NULL,NULL,'','EN-US',NULL),(355,21,26,NULL,NULL,'',NULL,NULL),(356,22,1,NULL,NULL,NULL,'EN-US','sadsda'),(357,22,20,NULL,0,NULL,NULL,NULL),(358,22,18,NULL,NULL,NULL,NULL,''),(359,22,13,1212,NULL,NULL,NULL,NULL),(360,22,24,NULL,0,NULL,NULL,NULL),(361,22,14,0,NULL,NULL,NULL,NULL),(362,22,2,NULL,NULL,'','EN-US',NULL),(363,22,26,NULL,NULL,'',NULL,NULL),(364,23,1,NULL,NULL,NULL,'EN-US','sadsda'),(365,23,20,NULL,0,NULL,NULL,NULL),(366,23,18,NULL,NULL,NULL,NULL,''),(367,23,13,1212,NULL,NULL,NULL,NULL),(368,23,24,NULL,0,NULL,NULL,NULL),(369,23,14,0,NULL,NULL,NULL,NULL),(370,23,2,NULL,NULL,'','EN-US',NULL),(371,23,26,NULL,NULL,'',NULL,NULL),(373,23,27,0,NULL,NULL,NULL,NULL),(374,23,28,0,NULL,NULL,NULL,NULL),(375,23,29,NULL,0,NULL,NULL,NULL),(376,23,30,NULL,0,NULL,NULL,NULL),(377,23,31,0,NULL,NULL,NULL,NULL),(378,23,32,0,NULL,NULL,NULL,NULL),(379,23,33,0,NULL,NULL,NULL,NULL),(380,23,21,NULL,NULL,NULL,NULL,''),(381,23,22,NULL,NULL,'',NULL,NULL),(382,23,23,NULL,NULL,'',NULL,NULL),(383,24,1,NULL,NULL,NULL,'EN-US','11'),(384,24,20,NULL,0,NULL,NULL,NULL),(385,24,18,NULL,NULL,NULL,NULL,''),(386,24,13,111,NULL,NULL,NULL,NULL),(387,24,24,NULL,0,NULL,NULL,NULL),(388,24,14,0,NULL,NULL,NULL,NULL),(389,24,2,NULL,NULL,'','EN-US',NULL),(390,24,26,NULL,NULL,'',NULL,NULL),(391,25,1,NULL,NULL,NULL,'EN-US','Sda'),(392,25,20,NULL,0,NULL,NULL,NULL),(393,25,18,NULL,NULL,NULL,NULL,''),(394,25,13,11,NULL,NULL,NULL,NULL),(395,25,24,NULL,0,NULL,NULL,NULL),(396,25,14,0,NULL,NULL,NULL,NULL),(397,25,2,NULL,NULL,'','EN-US',NULL),(398,25,26,NULL,NULL,'',NULL,NULL),(400,25,27,0,NULL,NULL,NULL,NULL),(401,25,28,0,NULL,NULL,NULL,NULL),(402,25,29,NULL,0,NULL,NULL,NULL),(403,25,30,NULL,0,NULL,NULL,NULL),(404,25,31,0,NULL,NULL,NULL,NULL),(405,25,32,0,NULL,NULL,NULL,NULL),(406,25,33,0,NULL,NULL,NULL,NULL),(407,25,21,NULL,NULL,NULL,NULL,''),(408,25,22,NULL,NULL,'',NULL,NULL),(409,25,23,NULL,NULL,'',NULL,NULL),(411,21,27,0,NULL,NULL,NULL,NULL),(412,21,28,0,NULL,NULL,NULL,NULL),(413,21,29,NULL,0,NULL,NULL,NULL),(414,21,30,NULL,0,NULL,NULL,NULL),(415,21,31,0,NULL,NULL,NULL,NULL),(416,21,32,0,NULL,NULL,NULL,NULL),(417,21,33,0,NULL,NULL,NULL,NULL),(418,21,21,NULL,NULL,NULL,NULL,''),(419,21,22,NULL,NULL,'',NULL,NULL),(420,21,23,NULL,NULL,'',NULL,NULL),(421,21,1,NULL,NULL,NULL,'VN-VI','ss'),(422,21,2,NULL,NULL,'','VN-VI',NULL),(423,21,1,NULL,NULL,NULL,'KO-KR','sss'),(424,21,2,NULL,NULL,'','KO-KR',NULL),(425,26,1,NULL,NULL,NULL,'EN-US','shit'),(426,26,20,NULL,0,NULL,NULL,NULL),(427,26,18,NULL,NULL,NULL,NULL,'abc'),(428,26,13,4,NULL,NULL,NULL,NULL),(714,26,1,NULL,NULL,NULL,'VN-VI','Thịt thăn xông khói, nấm tươi & pho mát mozzarella ( prosciuitto e funghi ) Thịt thăn xông khói, nấm tươi & pho mát mozzarella ( prosciuitto e funghi ) Thịt thăn xông khói, nấm tươi & pho mát mozzarella ( prosciuitto e funghi )'),(715,26,24,NULL,26,NULL,NULL,NULL),(716,26,14,1,NULL,NULL,NULL,NULL),(717,26,2,NULL,NULL,'<p>sdfsdfdsfsdfsdf</p>\r\n','VN-VI',NULL),(718,26,26,NULL,NULL,'',NULL,NULL),(720,26,27,3,NULL,NULL,NULL,NULL),(721,26,28,15,NULL,NULL,NULL,NULL),(722,26,29,NULL,29,NULL,NULL,NULL),(723,26,30,NULL,29,NULL,NULL,NULL),(724,26,31,20,NULL,NULL,NULL,NULL),(725,26,32,50,NULL,NULL,NULL,NULL),(726,26,33,50,NULL,NULL,NULL,NULL),(727,26,21,NULL,NULL,NULL,NULL,''),(728,26,22,NULL,NULL,'',NULL,NULL),(729,26,23,NULL,NULL,'',NULL,NULL),(730,26,2,NULL,NULL,'','EN-US',NULL),(731,26,1,NULL,NULL,NULL,'KO-KR','여성의류 여성의류 여성의류 여성의류 여성의류 여성의류 여성의류 여성의류 여성의류'),(732,26,2,NULL,NULL,'','KO-KR',NULL),(733,26,34,NULL,NULL,NULL,NULL,'sffs'),(734,27,1,NULL,NULL,NULL,'EN-US','shit'),(735,27,20,NULL,0,NULL,NULL,NULL),(736,27,18,NULL,NULL,NULL,NULL,'asdkslas'),(737,27,13,10,NULL,NULL,NULL,NULL),(738,27,1,NULL,NULL,NULL,'VN-VI','shit'),(739,27,24,NULL,26,NULL,NULL,NULL),(740,27,14,1,NULL,NULL,NULL,NULL),(741,27,2,NULL,NULL,'','VN-VI',NULL),(742,27,26,NULL,NULL,'',NULL,NULL),(744,27,27,3,NULL,NULL,NULL,NULL),(745,27,28,15,NULL,NULL,NULL,NULL),(746,27,29,NULL,29,NULL,NULL,NULL),(747,27,30,NULL,29,NULL,NULL,NULL),(748,27,31,10,NULL,NULL,NULL,NULL),(749,27,32,10,NULL,NULL,NULL,NULL),(750,27,33,330,NULL,NULL,NULL,NULL),(751,27,21,NULL,NULL,NULL,NULL,''),(752,27,22,NULL,NULL,'',NULL,NULL),(753,27,23,NULL,NULL,'',NULL,NULL),(754,27,2,NULL,NULL,'','EN-US',NULL),(755,27,1,NULL,NULL,NULL,'KO-KR','ssa'),(756,27,2,NULL,NULL,'','KO-KR',NULL),(757,27,34,NULL,NULL,NULL,NULL,'sffs'),(759,28,1,NULL,NULL,NULL,'EN-US','shit'),(760,28,20,NULL,0,NULL,NULL,NULL),(761,28,18,NULL,NULL,NULL,NULL,'abc'),(762,28,13,10,NULL,NULL,NULL,NULL),(763,28,1,NULL,NULL,NULL,'VN-VI','Thịt thăn xông khói, nấm tươi & pho mát mozzarella ( prosciuitto e funghi ) Thịt thăn xông khói, nấm tươi & pho mát mozzarella ( prosciuitto e funghi ) Thịt thăn xông khói, nấm tươi & pho mát mozzarella ( prosciuitto e funghi )'),(764,28,24,NULL,26,NULL,NULL,NULL),(765,28,14,1,NULL,NULL,NULL,NULL),(766,28,2,NULL,NULL,'','VN-VI',NULL),(767,28,26,NULL,NULL,'',NULL,NULL),(769,28,27,3,NULL,NULL,NULL,NULL),(770,28,28,15,NULL,NULL,NULL,NULL),(771,28,29,NULL,29,NULL,NULL,NULL),(772,28,30,NULL,29,NULL,NULL,NULL),(773,28,31,10,NULL,NULL,NULL,NULL),(774,28,32,10,NULL,NULL,NULL,NULL),(775,28,33,330,NULL,NULL,NULL,NULL),(776,28,21,NULL,NULL,NULL,NULL,''),(777,28,22,NULL,NULL,'',NULL,NULL),(778,28,23,NULL,NULL,'',NULL,NULL),(779,28,2,NULL,NULL,'','EN-US',NULL),(780,28,1,NULL,NULL,NULL,'KO-KR','ssa'),(781,28,2,NULL,NULL,'','KO-KR',NULL),(782,28,34,NULL,NULL,NULL,NULL,'sffs'),(790,29,1,NULL,NULL,NULL,'EN-US','shit'),(791,29,20,NULL,0,NULL,NULL,NULL),(792,29,18,NULL,NULL,NULL,NULL,'abc'),(793,29,13,10,NULL,NULL,NULL,NULL),(794,29,1,NULL,NULL,NULL,'VN-VI','Thịt thăn xông khói, nấm tươi & pho mát mozzarella ( prosciuitto e funghi ) Thịt thăn xông khói, nấm tươi & pho mát mozzarella ( prosciuitto e funghi ) Thịt thăn xông khói, nấm tươi & pho mát mozzarella ( prosciuitto e funghi )'),(795,29,24,NULL,26,NULL,NULL,NULL),(796,29,14,1,NULL,NULL,NULL,NULL),(797,29,2,NULL,NULL,'','VN-VI',NULL),(798,29,26,NULL,NULL,'',NULL,NULL),(800,29,27,3,NULL,NULL,NULL,NULL),(801,29,28,15,NULL,NULL,NULL,NULL),(802,29,29,NULL,29,NULL,NULL,NULL),(803,29,30,NULL,29,NULL,NULL,NULL),(804,29,31,10,NULL,NULL,NULL,NULL),(805,29,32,10,NULL,NULL,NULL,NULL),(806,29,33,330,NULL,NULL,NULL,NULL),(807,29,21,NULL,NULL,NULL,NULL,''),(808,29,22,NULL,NULL,'',NULL,NULL),(809,29,23,NULL,NULL,'',NULL,NULL),(810,29,2,NULL,NULL,'','EN-US',NULL),(811,29,1,NULL,NULL,NULL,'KO-KR','ssa'),(812,29,2,NULL,NULL,'','KO-KR',NULL),(813,29,34,NULL,NULL,NULL,NULL,'sffs'),(821,30,1,NULL,NULL,NULL,'EN-US','shit'),(822,30,20,NULL,0,NULL,NULL,NULL),(823,30,18,NULL,NULL,NULL,NULL,'abc'),(824,30,13,10,NULL,NULL,NULL,NULL),(825,30,1,NULL,NULL,NULL,'VN-VI','Thịt thăn xông khói, nấm tươi & pho mát mozzarella ( prosciuitto e funghi ) Thịt thăn xông khói, nấm tươi & pho mát mozzarella ( prosciuitto e funghi ) Thịt thăn xông khói, nấm tươi & pho mát mozzarella ( prosciuitto e funghi )'),(826,30,24,NULL,26,NULL,NULL,NULL),(827,30,14,1,NULL,NULL,NULL,NULL),(828,30,2,NULL,NULL,'','VN-VI',NULL),(829,30,26,NULL,NULL,'',NULL,NULL),(831,30,27,3,NULL,NULL,NULL,NULL),(832,30,28,15,NULL,NULL,NULL,NULL),(833,30,29,NULL,29,NULL,NULL,NULL),(834,30,30,NULL,29,NULL,NULL,NULL),(835,30,31,10,NULL,NULL,NULL,NULL),(836,30,32,10,NULL,NULL,NULL,NULL),(837,30,33,330,NULL,NULL,NULL,NULL),(838,30,21,NULL,NULL,NULL,NULL,''),(839,30,22,NULL,NULL,'',NULL,NULL),(840,30,23,NULL,NULL,'',NULL,NULL),(841,30,2,NULL,NULL,'','EN-US',NULL),(842,30,1,NULL,NULL,NULL,'KO-KR','ssa'),(843,30,2,NULL,NULL,'','KO-KR',NULL),(844,30,34,NULL,NULL,NULL,NULL,'sffs'),(852,31,1,NULL,NULL,NULL,'EN-US','shit'),(853,31,20,NULL,0,NULL,NULL,NULL),(854,31,18,NULL,NULL,NULL,NULL,'asdkslas'),(855,31,13,10,NULL,NULL,NULL,NULL),(856,31,1,NULL,NULL,NULL,'VN-VI','shit'),(857,31,24,NULL,26,NULL,NULL,NULL),(858,31,14,1,NULL,NULL,NULL,NULL),(859,31,2,NULL,NULL,'','VN-VI',NULL),(860,31,26,NULL,NULL,'',NULL,NULL),(862,31,27,3,NULL,NULL,NULL,NULL),(863,31,28,15,NULL,NULL,NULL,NULL),(864,31,29,NULL,29,NULL,NULL,NULL),(865,31,30,NULL,29,NULL,NULL,NULL),(866,31,31,10,NULL,NULL,NULL,NULL),(867,31,32,10,NULL,NULL,NULL,NULL),(868,31,33,330,NULL,NULL,NULL,NULL),(869,31,21,NULL,NULL,NULL,NULL,''),(870,31,22,NULL,NULL,'',NULL,NULL),(871,31,23,NULL,NULL,'',NULL,NULL),(872,31,2,NULL,NULL,'','EN-US',NULL),(873,31,1,NULL,NULL,NULL,'KO-KR','ssa'),(874,31,2,NULL,NULL,'','KO-KR',NULL),(875,31,34,NULL,NULL,NULL,NULL,'sffs'),(883,32,1,NULL,NULL,NULL,'EN-US','shit'),(884,32,20,NULL,0,NULL,NULL,NULL),(885,32,18,NULL,NULL,NULL,NULL,'asdkslas'),(886,32,13,10,NULL,NULL,NULL,NULL),(887,32,1,NULL,NULL,NULL,'VN-VI','shit'),(888,32,24,NULL,26,NULL,NULL,NULL),(889,32,14,1,NULL,NULL,NULL,NULL),(890,32,2,NULL,NULL,'','VN-VI',NULL),(891,32,26,NULL,NULL,'',NULL,NULL),(893,32,27,3,NULL,NULL,NULL,NULL),(894,32,28,15,NULL,NULL,NULL,NULL),(895,32,29,NULL,29,NULL,NULL,NULL),(896,32,30,NULL,29,NULL,NULL,NULL),(897,32,31,10,NULL,NULL,NULL,NULL),(898,32,32,10,NULL,NULL,NULL,NULL),(899,32,33,330,NULL,NULL,NULL,NULL),(900,32,21,NULL,NULL,NULL,NULL,''),(901,32,22,NULL,NULL,'',NULL,NULL),(902,32,23,NULL,NULL,'',NULL,NULL),(903,32,2,NULL,NULL,'','EN-US',NULL),(904,32,1,NULL,NULL,NULL,'KO-KR','ssa'),(905,32,2,NULL,NULL,'','KO-KR',NULL),(906,32,34,NULL,NULL,NULL,NULL,'sffs'),(914,33,1,NULL,NULL,NULL,'EN-US','shit'),(915,33,20,NULL,0,NULL,NULL,NULL),(916,33,18,NULL,NULL,NULL,NULL,'asdkslas'),(917,33,13,10,NULL,NULL,NULL,NULL),(918,33,1,NULL,NULL,NULL,'VN-VI','shit'),(919,33,24,NULL,26,NULL,NULL,NULL),(920,33,14,1,NULL,NULL,NULL,NULL),(921,33,2,NULL,NULL,'','VN-VI',NULL),(922,33,26,NULL,NULL,'',NULL,NULL),(924,33,27,3,NULL,NULL,NULL,NULL),(925,33,28,15,NULL,NULL,NULL,NULL),(926,33,29,NULL,29,NULL,NULL,NULL),(927,33,30,NULL,29,NULL,NULL,NULL),(928,33,31,10,NULL,NULL,NULL,NULL),(929,33,32,10,NULL,NULL,NULL,NULL),(930,33,33,330,NULL,NULL,NULL,NULL),(931,33,21,NULL,NULL,NULL,NULL,''),(932,33,22,NULL,NULL,'',NULL,NULL),(933,33,23,NULL,NULL,'',NULL,NULL),(934,33,2,NULL,NULL,'','EN-US',NULL),(935,33,1,NULL,NULL,NULL,'KO-KR','ssa'),(936,33,2,NULL,NULL,'','KO-KR',NULL),(937,33,34,NULL,NULL,NULL,NULL,'sffs'),(945,34,1,NULL,NULL,NULL,'EN-US','shit'),(946,34,20,NULL,0,NULL,NULL,NULL),(947,34,18,NULL,NULL,NULL,NULL,'asdkslas'),(948,34,13,10,NULL,NULL,NULL,NULL),(949,34,1,NULL,NULL,NULL,'VN-VI','shit'),(950,34,24,NULL,26,NULL,NULL,NULL),(951,34,14,1,NULL,NULL,NULL,NULL),(952,34,2,NULL,NULL,'','VN-VI',NULL),(953,34,26,NULL,NULL,'',NULL,NULL),(955,34,27,3,NULL,NULL,NULL,NULL),(956,34,28,15,NULL,NULL,NULL,NULL),(957,34,29,NULL,29,NULL,NULL,NULL),(958,34,30,NULL,29,NULL,NULL,NULL),(959,34,31,10,NULL,NULL,NULL,NULL),(960,34,32,10,NULL,NULL,NULL,NULL),(961,34,33,330,NULL,NULL,NULL,NULL),(962,34,21,NULL,NULL,NULL,NULL,''),(963,34,22,NULL,NULL,'',NULL,NULL),(964,34,23,NULL,NULL,'',NULL,NULL),(965,34,2,NULL,NULL,'','EN-US',NULL),(966,34,1,NULL,NULL,NULL,'KO-KR','ssa'),(967,34,2,NULL,NULL,'','KO-KR',NULL),(968,34,34,NULL,NULL,NULL,NULL,'sffs'),(976,35,1,NULL,NULL,NULL,'EN-US','shit'),(977,35,20,NULL,0,NULL,NULL,NULL),(978,35,18,NULL,NULL,NULL,NULL,'asdkslas'),(979,35,13,10,NULL,NULL,NULL,NULL),(980,35,1,NULL,NULL,NULL,'VN-VI','shit'),(981,35,24,NULL,26,NULL,NULL,NULL),(982,35,14,1,NULL,NULL,NULL,NULL),(983,35,2,NULL,NULL,'','VN-VI',NULL),(984,35,26,NULL,NULL,'',NULL,NULL),(986,35,27,3,NULL,NULL,NULL,NULL),(987,35,28,15,NULL,NULL,NULL,NULL),(988,35,29,NULL,29,NULL,NULL,NULL),(989,35,30,NULL,29,NULL,NULL,NULL),(990,35,31,10,NULL,NULL,NULL,NULL),(991,35,32,10,NULL,NULL,NULL,NULL),(992,35,33,330,NULL,NULL,NULL,NULL),(993,35,21,NULL,NULL,NULL,NULL,''),(994,35,22,NULL,NULL,'',NULL,NULL),(995,35,23,NULL,NULL,'',NULL,NULL),(996,35,2,NULL,NULL,'','EN-US',NULL),(997,35,1,NULL,NULL,NULL,'KO-KR','ssa'),(998,35,2,NULL,NULL,'','KO-KR',NULL),(999,35,34,NULL,NULL,NULL,NULL,'sffs'),(1007,36,1,NULL,NULL,NULL,'EN-US','shit'),(1008,36,20,NULL,0,NULL,NULL,NULL),(1009,36,18,NULL,NULL,NULL,NULL,'asdkslas'),(1010,36,13,10,NULL,NULL,NULL,NULL),(1011,36,1,NULL,NULL,NULL,'VN-VI','shit'),(1012,36,24,NULL,26,NULL,NULL,NULL),(1013,36,14,1,NULL,NULL,NULL,NULL),(1014,36,2,NULL,NULL,'','VN-VI',NULL),(1015,36,26,NULL,NULL,'',NULL,NULL),(1017,36,27,3,NULL,NULL,NULL,NULL),(1018,36,28,15,NULL,NULL,NULL,NULL),(1019,36,29,NULL,29,NULL,NULL,NULL),(1020,36,30,NULL,29,NULL,NULL,NULL),(1021,36,31,10,NULL,NULL,NULL,NULL),(1022,36,32,10,NULL,NULL,NULL,NULL),(1023,36,33,330,NULL,NULL,NULL,NULL),(1024,36,21,NULL,NULL,NULL,NULL,''),(1025,36,22,NULL,NULL,'',NULL,NULL),(1026,36,23,NULL,NULL,'',NULL,NULL),(1027,36,2,NULL,NULL,'','EN-US',NULL),(1028,36,1,NULL,NULL,NULL,'KO-KR','ssa'),(1029,36,2,NULL,NULL,'','KO-KR',NULL),(1030,36,34,NULL,NULL,NULL,NULL,'sffs'),(1038,37,1,NULL,NULL,NULL,'EN-US','shit'),(1039,37,20,NULL,0,NULL,NULL,NULL),(1040,37,18,NULL,NULL,NULL,NULL,'asdkslas'),(1041,37,13,10,NULL,NULL,NULL,NULL),(1042,37,1,NULL,NULL,NULL,'VN-VI','shit'),(1043,37,24,NULL,26,NULL,NULL,NULL),(1044,37,14,1,NULL,NULL,NULL,NULL),(1045,37,2,NULL,NULL,'','VN-VI',NULL),(1046,37,26,NULL,NULL,'',NULL,NULL),(1048,37,27,3,NULL,NULL,NULL,NULL),(1049,37,28,15,NULL,NULL,NULL,NULL),(1050,37,29,NULL,29,NULL,NULL,NULL),(1051,37,30,NULL,29,NULL,NULL,NULL),(1052,37,31,10,NULL,NULL,NULL,NULL),(1053,37,32,10,NULL,NULL,NULL,NULL),(1054,37,33,330,NULL,NULL,NULL,NULL),(1055,37,21,NULL,NULL,NULL,NULL,''),(1056,37,22,NULL,NULL,'',NULL,NULL),(1057,37,23,NULL,NULL,'',NULL,NULL),(1058,37,2,NULL,NULL,'','EN-US',NULL),(1059,37,1,NULL,NULL,NULL,'KO-KR','ssa'),(1060,37,2,NULL,NULL,'','KO-KR',NULL),(1061,37,34,NULL,NULL,NULL,NULL,'sffs'),(1069,38,1,NULL,NULL,NULL,'EN-US','shit'),(1070,38,20,NULL,0,NULL,NULL,NULL),(1071,38,18,NULL,NULL,NULL,NULL,'asdkslas'),(1072,38,13,10,NULL,NULL,NULL,NULL),(1073,38,1,NULL,NULL,NULL,'VN-VI','shit'),(1074,38,24,NULL,26,NULL,NULL,NULL),(1075,38,14,1,NULL,NULL,NULL,NULL),(1076,38,2,NULL,NULL,'','VN-VI',NULL),(1077,38,26,NULL,NULL,'',NULL,NULL),(1079,38,27,3,NULL,NULL,NULL,NULL),(1080,38,28,15,NULL,NULL,NULL,NULL),(1081,38,29,NULL,29,NULL,NULL,NULL),(1082,38,30,NULL,29,NULL,NULL,NULL),(1083,38,31,10,NULL,NULL,NULL,NULL),(1084,38,32,10,NULL,NULL,NULL,NULL),(1085,38,33,330,NULL,NULL,NULL,NULL),(1086,38,21,NULL,NULL,NULL,NULL,''),(1087,38,22,NULL,NULL,'',NULL,NULL),(1088,38,23,NULL,NULL,'',NULL,NULL),(1089,38,2,NULL,NULL,'','EN-US',NULL),(1090,38,1,NULL,NULL,NULL,'KO-KR','ssa'),(1091,38,2,NULL,NULL,'','KO-KR',NULL),(1092,38,34,NULL,NULL,NULL,NULL,'sffs'),(1100,39,1,NULL,NULL,NULL,'EN-US','shit'),(1101,39,20,NULL,0,NULL,NULL,NULL),(1102,39,18,NULL,NULL,NULL,NULL,'asdkslas'),(1103,39,13,10,NULL,NULL,NULL,NULL),(1104,39,1,NULL,NULL,NULL,'VN-VI','shit'),(1105,39,24,NULL,26,NULL,NULL,NULL),(1106,39,14,1,NULL,NULL,NULL,NULL),(1107,39,2,NULL,NULL,'','VN-VI',NULL),(1108,39,26,NULL,NULL,'',NULL,NULL),(1110,39,27,3,NULL,NULL,NULL,NULL),(1111,39,28,15,NULL,NULL,NULL,NULL),(1112,39,29,NULL,29,NULL,NULL,NULL),(1113,39,30,NULL,29,NULL,NULL,NULL),(1114,39,31,10,NULL,NULL,NULL,NULL),(1115,39,32,10,NULL,NULL,NULL,NULL),(1116,39,33,330,NULL,NULL,NULL,NULL),(1117,39,21,NULL,NULL,NULL,NULL,''),(1118,39,22,NULL,NULL,'',NULL,NULL),(1119,39,23,NULL,NULL,'',NULL,NULL),(1120,39,2,NULL,NULL,'','EN-US',NULL),(1121,39,1,NULL,NULL,NULL,'KO-KR','ssa'),(1122,39,2,NULL,NULL,'','KO-KR',NULL),(1123,39,34,NULL,NULL,NULL,NULL,'sffs'),(1131,40,1,NULL,NULL,NULL,'EN-US','shit'),(1132,40,20,NULL,0,NULL,NULL,NULL),(1133,40,18,NULL,NULL,NULL,NULL,'asdkslas'),(1134,40,13,10,NULL,NULL,NULL,NULL),(1135,40,1,NULL,NULL,NULL,'VN-VI','shit'),(1136,40,24,NULL,26,NULL,NULL,NULL),(1137,40,14,1,NULL,NULL,NULL,NULL),(1138,40,2,NULL,NULL,'','VN-VI',NULL),(1139,40,26,NULL,NULL,'',NULL,NULL),(1141,40,27,3,NULL,NULL,NULL,NULL),(1142,40,28,15,NULL,NULL,NULL,NULL),(1143,40,29,NULL,29,NULL,NULL,NULL),(1144,40,30,NULL,29,NULL,NULL,NULL),(1145,40,31,10,NULL,NULL,NULL,NULL),(1146,40,32,10,NULL,NULL,NULL,NULL),(1147,40,33,330,NULL,NULL,NULL,NULL),(1148,40,21,NULL,NULL,NULL,NULL,''),(1149,40,22,NULL,NULL,'',NULL,NULL),(1150,40,23,NULL,NULL,'',NULL,NULL),(1151,40,2,NULL,NULL,'','EN-US',NULL),(1152,40,1,NULL,NULL,NULL,'KO-KR','ssa'),(1153,40,2,NULL,NULL,'','KO-KR',NULL),(1154,40,34,NULL,NULL,NULL,NULL,'sffs'),(1162,41,1,NULL,NULL,NULL,'EN-US','shit'),(1163,41,20,NULL,0,NULL,NULL,NULL),(1164,41,18,NULL,NULL,NULL,NULL,'asdkslas'),(1165,41,13,10,NULL,NULL,NULL,NULL),(1166,41,1,NULL,NULL,NULL,'VN-VI','shit'),(1167,41,24,NULL,26,NULL,NULL,NULL),(1168,41,14,1,NULL,NULL,NULL,NULL),(1169,41,2,NULL,NULL,'','VN-VI',NULL),(1170,41,26,NULL,NULL,'',NULL,NULL),(1172,41,27,3,NULL,NULL,NULL,NULL),(1173,41,28,15,NULL,NULL,NULL,NULL),(1174,41,29,NULL,29,NULL,NULL,NULL),(1175,41,30,NULL,29,NULL,NULL,NULL),(1176,41,31,10,NULL,NULL,NULL,NULL),(1177,41,32,10,NULL,NULL,NULL,NULL),(1178,41,33,330,NULL,NULL,NULL,NULL),(1179,41,21,NULL,NULL,NULL,NULL,''),(1180,41,22,NULL,NULL,'',NULL,NULL),(1181,41,23,NULL,NULL,'',NULL,NULL),(1182,41,2,NULL,NULL,'','EN-US',NULL),(1183,41,1,NULL,NULL,NULL,'KO-KR','ssa'),(1184,41,2,NULL,NULL,'','KO-KR',NULL),(1185,41,34,NULL,NULL,NULL,NULL,'sffs'),(1193,42,1,NULL,NULL,NULL,'EN-US','shit'),(1194,42,20,NULL,0,NULL,NULL,NULL),(1195,42,18,NULL,NULL,NULL,NULL,'asdkslas'),(1196,42,13,10,NULL,NULL,NULL,NULL),(1197,42,1,NULL,NULL,NULL,'VN-VI','shit'),(1198,42,24,NULL,26,NULL,NULL,NULL),(1199,42,14,1,NULL,NULL,NULL,NULL),(1200,42,2,NULL,NULL,'','VN-VI',NULL),(1201,42,26,NULL,NULL,'',NULL,NULL),(1203,42,27,3,NULL,NULL,NULL,NULL),(1204,42,28,15,NULL,NULL,NULL,NULL),(1205,42,29,NULL,29,NULL,NULL,NULL),(1206,42,30,NULL,29,NULL,NULL,NULL),(1207,42,31,10,NULL,NULL,NULL,NULL),(1208,42,32,10,NULL,NULL,NULL,NULL),(1209,42,33,330,NULL,NULL,NULL,NULL),(1210,42,21,NULL,NULL,NULL,NULL,''),(1211,42,22,NULL,NULL,'',NULL,NULL),(1212,42,23,NULL,NULL,'',NULL,NULL),(1213,42,2,NULL,NULL,'','EN-US',NULL),(1214,42,1,NULL,NULL,NULL,'KO-KR','ssa'),(1215,42,2,NULL,NULL,'','KO-KR',NULL),(1216,42,34,NULL,NULL,NULL,NULL,'sffs'),(1224,43,1,NULL,NULL,NULL,'EN-US','shit'),(1225,43,20,NULL,0,NULL,NULL,NULL),(1226,43,18,NULL,NULL,NULL,NULL,'asdkslas'),(1227,43,13,10,NULL,NULL,NULL,NULL),(1228,43,1,NULL,NULL,NULL,'VN-VI','shit'),(1229,43,24,NULL,26,NULL,NULL,NULL),(1230,43,14,1,NULL,NULL,NULL,NULL),(1231,43,2,NULL,NULL,'','VN-VI',NULL),(1232,43,26,NULL,NULL,'',NULL,NULL),(1234,43,27,3,NULL,NULL,NULL,NULL),(1235,43,28,15,NULL,NULL,NULL,NULL),(1236,43,29,NULL,29,NULL,NULL,NULL),(1237,43,30,NULL,29,NULL,NULL,NULL),(1238,43,31,10,NULL,NULL,NULL,NULL),(1239,43,32,10,NULL,NULL,NULL,NULL),(1240,43,33,330,NULL,NULL,NULL,NULL),(1241,43,21,NULL,NULL,NULL,NULL,''),(1242,43,22,NULL,NULL,'',NULL,NULL),(1243,43,23,NULL,NULL,'',NULL,NULL),(1244,43,2,NULL,NULL,'','EN-US',NULL),(1245,43,1,NULL,NULL,NULL,'KO-KR','ssa'),(1246,43,2,NULL,NULL,'','KO-KR',NULL),(1247,43,34,NULL,NULL,NULL,NULL,'sffs'),(1255,44,1,NULL,NULL,NULL,'EN-US','shit'),(1256,44,20,NULL,0,NULL,NULL,NULL),(1257,44,18,NULL,NULL,NULL,NULL,'asdkslas'),(1258,44,13,10,NULL,NULL,NULL,NULL),(1259,44,1,NULL,NULL,NULL,'VN-VI','shit'),(1260,44,24,NULL,26,NULL,NULL,NULL),(1261,44,14,1,NULL,NULL,NULL,NULL),(1262,44,2,NULL,NULL,'','VN-VI',NULL),(1263,44,26,NULL,NULL,'',NULL,NULL),(1265,44,27,3,NULL,NULL,NULL,NULL),(1266,44,28,15,NULL,NULL,NULL,NULL),(1267,44,29,NULL,29,NULL,NULL,NULL),(1268,44,30,NULL,29,NULL,NULL,NULL),(1269,44,31,10,NULL,NULL,NULL,NULL),(1270,44,32,10,NULL,NULL,NULL,NULL),(1271,44,33,330,NULL,NULL,NULL,NULL),(1272,44,21,NULL,NULL,NULL,NULL,''),(1273,44,22,NULL,NULL,'',NULL,NULL),(1274,44,23,NULL,NULL,'',NULL,NULL),(1275,44,2,NULL,NULL,'','EN-US',NULL),(1276,44,1,NULL,NULL,NULL,'KO-KR','ssa'),(1277,44,2,NULL,NULL,'','KO-KR',NULL),(1278,44,34,NULL,NULL,NULL,NULL,'sffs'),(1286,45,1,NULL,NULL,NULL,'EN-US','shit'),(1287,45,20,NULL,0,NULL,NULL,NULL),(1288,45,18,NULL,NULL,NULL,NULL,'asdkslas'),(1289,45,13,10,NULL,NULL,NULL,NULL),(1290,45,1,NULL,NULL,NULL,'VN-VI','shit'),(1291,45,24,NULL,26,NULL,NULL,NULL),(1292,45,14,1,NULL,NULL,NULL,NULL),(1293,45,2,NULL,NULL,'','VN-VI',NULL),(1294,45,26,NULL,NULL,'',NULL,NULL),(1296,45,27,3,NULL,NULL,NULL,NULL),(1297,45,28,15,NULL,NULL,NULL,NULL),(1298,45,29,NULL,29,NULL,NULL,NULL),(1299,45,30,NULL,29,NULL,NULL,NULL),(1300,45,31,10,NULL,NULL,NULL,NULL),(1301,45,32,10,NULL,NULL,NULL,NULL),(1302,45,33,330,NULL,NULL,NULL,NULL),(1303,45,21,NULL,NULL,NULL,NULL,''),(1304,45,22,NULL,NULL,'',NULL,NULL),(1305,45,23,NULL,NULL,'',NULL,NULL),(1306,45,2,NULL,NULL,'','EN-US',NULL),(1307,45,1,NULL,NULL,NULL,'KO-KR','ssa'),(1308,45,2,NULL,NULL,'','KO-KR',NULL),(1309,45,34,NULL,NULL,NULL,NULL,'sffs'),(1317,46,1,NULL,NULL,NULL,'EN-US','shit'),(1318,46,20,NULL,0,NULL,NULL,NULL),(1319,46,18,NULL,NULL,NULL,NULL,'asdkslas'),(1320,46,13,10,NULL,NULL,NULL,NULL),(1321,46,1,NULL,NULL,NULL,'VN-VI','shit'),(1322,46,24,NULL,26,NULL,NULL,NULL),(1323,46,14,1,NULL,NULL,NULL,NULL),(1324,46,2,NULL,NULL,'','VN-VI',NULL),(1325,46,26,NULL,NULL,'',NULL,NULL),(1327,46,27,3,NULL,NULL,NULL,NULL),(1328,46,28,15,NULL,NULL,NULL,NULL),(1329,46,29,NULL,29,NULL,NULL,NULL),(1330,46,30,NULL,29,NULL,NULL,NULL),(1331,46,31,10,NULL,NULL,NULL,NULL),(1332,46,32,10,NULL,NULL,NULL,NULL),(1333,46,33,330,NULL,NULL,NULL,NULL),(1334,46,21,NULL,NULL,NULL,NULL,''),(1335,46,22,NULL,NULL,'',NULL,NULL),(1336,46,23,NULL,NULL,'',NULL,NULL),(1337,46,2,NULL,NULL,'','EN-US',NULL),(1338,46,1,NULL,NULL,NULL,'KO-KR','ssa'),(1339,46,2,NULL,NULL,'','KO-KR',NULL),(1340,46,34,NULL,NULL,NULL,NULL,'sffs'),(1348,47,1,NULL,NULL,NULL,'EN-US','shit'),(1349,47,20,NULL,0,NULL,NULL,NULL),(1350,47,18,NULL,NULL,NULL,NULL,'asdkslas'),(1351,47,13,10,NULL,NULL,NULL,NULL),(1352,47,1,NULL,NULL,NULL,'VN-VI','shit'),(1353,47,24,NULL,26,NULL,NULL,NULL),(1354,47,14,1,NULL,NULL,NULL,NULL),(1355,47,2,NULL,NULL,'','VN-VI',NULL),(1356,47,26,NULL,NULL,'',NULL,NULL),(1358,47,27,3,NULL,NULL,NULL,NULL),(1359,47,28,15,NULL,NULL,NULL,NULL),(1360,47,29,NULL,29,NULL,NULL,NULL),(1361,47,30,NULL,29,NULL,NULL,NULL),(1362,47,31,10,NULL,NULL,NULL,NULL),(1363,47,32,10,NULL,NULL,NULL,NULL),(1364,47,33,330,NULL,NULL,NULL,NULL),(1365,47,21,NULL,NULL,NULL,NULL,''),(1366,47,22,NULL,NULL,'',NULL,NULL),(1367,47,23,NULL,NULL,'',NULL,NULL),(1368,47,2,NULL,NULL,'','EN-US',NULL),(1369,47,1,NULL,NULL,NULL,'KO-KR','ssa'),(1370,47,2,NULL,NULL,'','KO-KR',NULL),(1371,47,34,NULL,NULL,NULL,NULL,'sffs'),(1379,48,1,NULL,NULL,NULL,'EN-US','shit'),(1380,48,20,NULL,0,NULL,NULL,NULL),(1381,48,18,NULL,NULL,NULL,NULL,'asdkslas'),(1382,48,13,10,NULL,NULL,NULL,NULL),(1383,48,1,NULL,NULL,NULL,'VN-VI','shit'),(1384,48,24,NULL,26,NULL,NULL,NULL),(1385,48,14,1,NULL,NULL,NULL,NULL),(1386,48,2,NULL,NULL,'','VN-VI',NULL),(1387,48,26,NULL,NULL,'',NULL,NULL),(1389,48,27,3,NULL,NULL,NULL,NULL),(1390,48,28,15,NULL,NULL,NULL,NULL),(1391,48,29,NULL,29,NULL,NULL,NULL),(1392,48,30,NULL,29,NULL,NULL,NULL),(1393,48,31,10,NULL,NULL,NULL,NULL),(1394,48,32,10,NULL,NULL,NULL,NULL),(1395,48,33,330,NULL,NULL,NULL,NULL),(1396,48,21,NULL,NULL,NULL,NULL,''),(1397,48,22,NULL,NULL,'',NULL,NULL),(1398,48,23,NULL,NULL,'',NULL,NULL),(1399,48,2,NULL,NULL,'','EN-US',NULL),(1400,48,1,NULL,NULL,NULL,'KO-KR','ssa'),(1401,48,2,NULL,NULL,'','KO-KR',NULL),(1402,48,34,NULL,NULL,NULL,NULL,'sffs'),(1410,49,1,NULL,NULL,NULL,'EN-US','shit'),(1411,49,20,NULL,0,NULL,NULL,NULL),(1412,49,18,NULL,NULL,NULL,NULL,'asdkslas'),(1413,49,13,10,NULL,NULL,NULL,NULL),(1414,49,1,NULL,NULL,NULL,'VN-VI','shit'),(1415,49,24,NULL,26,NULL,NULL,NULL),(1416,49,14,1,NULL,NULL,NULL,NULL),(1417,49,2,NULL,NULL,'','VN-VI',NULL),(1418,49,26,NULL,NULL,'',NULL,NULL),(1420,49,27,3,NULL,NULL,NULL,NULL),(1421,49,28,15,NULL,NULL,NULL,NULL),(1422,49,29,NULL,29,NULL,NULL,NULL),(1423,49,30,NULL,29,NULL,NULL,NULL),(1424,49,31,10,NULL,NULL,NULL,NULL),(1425,49,32,10,NULL,NULL,NULL,NULL),(1426,49,33,330,NULL,NULL,NULL,NULL),(1427,49,21,NULL,NULL,NULL,NULL,''),(1428,49,22,NULL,NULL,'',NULL,NULL),(1429,49,23,NULL,NULL,'',NULL,NULL),(1430,49,2,NULL,NULL,'','EN-US',NULL),(1431,49,1,NULL,NULL,NULL,'KO-KR','ssa'),(1432,49,2,NULL,NULL,'','KO-KR',NULL),(1433,49,34,NULL,NULL,NULL,NULL,'sffs'),(1441,50,1,NULL,NULL,NULL,'EN-US','shit'),(1442,50,20,NULL,0,NULL,NULL,NULL),(1443,50,18,NULL,NULL,NULL,NULL,'asdkslas'),(1444,50,13,10,NULL,NULL,NULL,NULL),(1445,50,1,NULL,NULL,NULL,'VN-VI','shit'),(1446,50,24,NULL,26,NULL,NULL,NULL),(1447,50,14,1,NULL,NULL,NULL,NULL),(1448,50,2,NULL,NULL,'','VN-VI',NULL),(1449,50,26,NULL,NULL,'',NULL,NULL),(1451,50,27,3,NULL,NULL,NULL,NULL),(1452,50,28,15,NULL,NULL,NULL,NULL),(1453,50,29,NULL,29,NULL,NULL,NULL),(1454,50,30,NULL,29,NULL,NULL,NULL),(1455,50,31,10,NULL,NULL,NULL,NULL),(1456,50,32,10,NULL,NULL,NULL,NULL),(1457,50,33,330,NULL,NULL,NULL,NULL),(1458,50,21,NULL,NULL,NULL,NULL,''),(1459,50,22,NULL,NULL,'',NULL,NULL),(1460,50,23,NULL,NULL,'',NULL,NULL),(1461,50,2,NULL,NULL,'','EN-US',NULL),(1462,50,1,NULL,NULL,NULL,'KO-KR','ssa'),(1463,50,2,NULL,NULL,'','KO-KR',NULL),(1464,50,34,NULL,NULL,NULL,NULL,'sffs'),(1472,51,1,NULL,NULL,NULL,'EN-US','shit'),(1473,51,20,NULL,0,NULL,NULL,NULL),(1474,51,18,NULL,NULL,NULL,NULL,'asdkslas'),(1475,51,13,10,NULL,NULL,NULL,NULL),(1476,51,1,NULL,NULL,NULL,'VN-VI','shit'),(1477,51,24,NULL,26,NULL,NULL,NULL),(1478,51,14,1,NULL,NULL,NULL,NULL),(1479,51,2,NULL,NULL,'','VN-VI',NULL),(1480,51,26,NULL,NULL,'',NULL,NULL),(1482,51,27,3,NULL,NULL,NULL,NULL),(1483,51,28,15,NULL,NULL,NULL,NULL),(1484,51,29,NULL,29,NULL,NULL,NULL),(1485,51,30,NULL,29,NULL,NULL,NULL),(1486,51,31,10,NULL,NULL,NULL,NULL),(1487,51,32,10,NULL,NULL,NULL,NULL),(1488,51,33,330,NULL,NULL,NULL,NULL),(1489,51,21,NULL,NULL,NULL,NULL,''),(1490,51,22,NULL,NULL,'',NULL,NULL),(1491,51,23,NULL,NULL,'',NULL,NULL),(1492,51,2,NULL,NULL,'','EN-US',NULL),(1493,51,1,NULL,NULL,NULL,'KO-KR','ssa'),(1494,51,2,NULL,NULL,'','KO-KR',NULL),(1495,51,34,NULL,NULL,NULL,NULL,'sffs'),(1503,52,1,NULL,NULL,NULL,'EN-US','shit'),(1504,52,20,NULL,0,NULL,NULL,NULL),(1505,52,18,NULL,NULL,NULL,NULL,'asdkslas'),(1506,52,13,10,NULL,NULL,NULL,NULL),(1507,52,1,NULL,NULL,NULL,'VN-VI','shit'),(1508,52,24,NULL,26,NULL,NULL,NULL),(1509,52,14,1,NULL,NULL,NULL,NULL),(1510,52,2,NULL,NULL,'','VN-VI',NULL),(1511,52,26,NULL,NULL,'',NULL,NULL),(1513,52,27,3,NULL,NULL,NULL,NULL),(1514,52,28,15,NULL,NULL,NULL,NULL),(1515,52,29,NULL,29,NULL,NULL,NULL),(1516,52,30,NULL,29,NULL,NULL,NULL),(1517,52,31,10,NULL,NULL,NULL,NULL),(1518,52,32,10,NULL,NULL,NULL,NULL),(1519,52,33,330,NULL,NULL,NULL,NULL),(1520,52,21,NULL,NULL,NULL,NULL,''),(1521,52,22,NULL,NULL,'',NULL,NULL),(1522,52,23,NULL,NULL,'',NULL,NULL),(1523,52,2,NULL,NULL,'','EN-US',NULL),(1524,52,1,NULL,NULL,NULL,'KO-KR','ssa'),(1525,52,2,NULL,NULL,'','KO-KR',NULL),(1526,52,34,NULL,NULL,NULL,NULL,'sffs'),(1534,53,1,NULL,NULL,NULL,'EN-US','shit'),(1535,53,20,NULL,0,NULL,NULL,NULL),(1536,53,18,NULL,NULL,NULL,NULL,'asdkslas'),(1537,53,13,10,NULL,NULL,NULL,NULL),(1538,53,1,NULL,NULL,NULL,'VN-VI','shit'),(1539,53,24,NULL,26,NULL,NULL,NULL),(1540,53,14,1,NULL,NULL,NULL,NULL),(1541,53,2,NULL,NULL,'','VN-VI',NULL),(1542,53,26,NULL,NULL,'',NULL,NULL),(1544,53,27,3,NULL,NULL,NULL,NULL),(1545,53,28,15,NULL,NULL,NULL,NULL),(1546,53,29,NULL,29,NULL,NULL,NULL),(1547,53,30,NULL,29,NULL,NULL,NULL),(1548,53,31,10,NULL,NULL,NULL,NULL),(1549,53,32,10,NULL,NULL,NULL,NULL),(1550,53,33,330,NULL,NULL,NULL,NULL),(1551,53,21,NULL,NULL,NULL,NULL,''),(1552,53,22,NULL,NULL,'',NULL,NULL),(1553,53,23,NULL,NULL,'',NULL,NULL),(1554,53,2,NULL,NULL,'','EN-US',NULL),(1555,53,1,NULL,NULL,NULL,'KO-KR','ssa'),(1556,53,2,NULL,NULL,'','KO-KR',NULL),(1557,53,34,NULL,NULL,NULL,NULL,'sffs'),(1565,54,1,NULL,NULL,NULL,'EN-US','shit'),(1566,54,20,NULL,0,NULL,NULL,NULL),(1567,54,18,NULL,NULL,NULL,NULL,'asdkslas'),(1568,54,13,10,NULL,NULL,NULL,NULL),(1569,54,1,NULL,NULL,NULL,'VN-VI','shit'),(1570,54,24,NULL,26,NULL,NULL,NULL),(1571,54,14,1,NULL,NULL,NULL,NULL),(1572,54,2,NULL,NULL,'','VN-VI',NULL),(1573,54,26,NULL,NULL,'',NULL,NULL),(1575,54,27,3,NULL,NULL,NULL,NULL),(1576,54,28,15,NULL,NULL,NULL,NULL),(1577,54,29,NULL,29,NULL,NULL,NULL),(1578,54,30,NULL,29,NULL,NULL,NULL),(1579,54,31,10,NULL,NULL,NULL,NULL),(1580,54,32,10,NULL,NULL,NULL,NULL),(1581,54,33,330,NULL,NULL,NULL,NULL),(1582,54,21,NULL,NULL,NULL,NULL,''),(1583,54,22,NULL,NULL,'',NULL,NULL),(1584,54,23,NULL,NULL,'',NULL,NULL),(1585,54,2,NULL,NULL,'','EN-US',NULL),(1586,54,1,NULL,NULL,NULL,'KO-KR','ssa'),(1587,54,2,NULL,NULL,'','KO-KR',NULL),(1588,54,34,NULL,NULL,NULL,NULL,'sffs'),(1589,55,1,NULL,NULL,NULL,'VN-VI','dfdsfs'),(1590,55,18,NULL,NULL,NULL,NULL,''),(1591,55,13,1212,NULL,NULL,NULL,NULL),(1592,55,34,NULL,NULL,NULL,NULL,''),(1593,55,14,21,NULL,NULL,NULL,NULL),(1594,55,24,NULL,26,NULL,NULL,NULL),(1595,55,31,12,NULL,NULL,NULL,NULL),(1596,55,32,12,NULL,NULL,NULL,NULL),(1597,55,33,12112,NULL,NULL,NULL,NULL),(1598,55,2,NULL,NULL,'','VN-VI',NULL),(1599,55,26,NULL,NULL,'',NULL,NULL),(1600,55,27,0,NULL,NULL,NULL,NULL),(1601,55,28,0,NULL,NULL,NULL,NULL),(1602,55,29,NULL,0,NULL,NULL,NULL),(1603,55,30,NULL,0,NULL,NULL,NULL),(1604,55,21,NULL,NULL,NULL,NULL,''),(1605,55,22,NULL,NULL,'',NULL,NULL),(1606,55,23,NULL,NULL,'',NULL,NULL),(1607,55,1,NULL,NULL,NULL,'EN-US','asrfs'),(1608,55,2,NULL,NULL,'','EN-US',NULL),(1609,55,1,NULL,NULL,NULL,'KO-KR','12312'),(1610,55,2,NULL,NULL,'','KO-KR',NULL);

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
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `t_product_attribute_type` */

insert  into `t_product_attribute_type`(`id`,`codename`,`datatype`,`fk_enum_ref`,`multi_language`,`repeating_group`,`weight`,`default`,`required`) values (1,'name','varchar',NULL,1,0,0,NULL,1),(2,'description','text',NULL,1,0,0,NULL,0),(3,'tag','varchar',NULL,1,1,0,NULL,0),(7,'material','enum',1,0,1,0,NULL,0),(8,'gift_target','enum',2,0,1,0,NULL,0),(9,'category','number',NULL,0,0,0,NULL,0),(10,'occasion','enum',3,0,1,0,NULL,0),(13,'quantity','number',NULL,0,0,0,NULL,1),(14,'weight','number',NULL,0,0,0,NULL,1),(15,'source','enum',NULL,0,0,0,NULL,0),(16,'shipping_method','enum',6,0,1,0,NULL,0),(17,'payment_method','enum',7,0,1,0,NULL,0),(18,'storage_code','varchar',NULL,0,0,0,NULL,0),(19,'sales','number',NULL,0,0,0,NULL,0),(20,'storage_code_type','enum',8,0,0,0,NULL,0),(21,'meta_title','varchar',NULL,0,0,0,NULL,0),(22,'meta_keywords','text',NULL,0,0,0,NULL,0),(23,'meta_description','text',NULL,0,0,0,NULL,0),(24,'weight_unit','enum',9,0,0,0,NULL,1),(26,'note','text',NULL,0,0,0,NULL,0),(27,'return_policy','number',NULL,0,0,0,'0',0),(28,'warranty_policy','number',NULL,0,0,0,'0',0),(29,'made_in','enum',12,0,0,0,NULL,0),(31,'dimension_width','number',NULL,0,0,0,'-1',1),(32,'dimension_height','number',NULL,0,0,0,'-1',1),(33,'dimension_depth','number',NULL,0,0,0,'-1',1),(34,'brand','varchar',NULL,0,0,0,NULL,0);

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

insert  into `t_product_image`(`fk_product`,`fk_file`,`sort`,`thumbnail`,`base_image`,`small_image`,`facebook_image`,`width`) values (1,1,NULL,1,1,0,1,1000),(2,1,NULL,1,1,0,1,1000),(3,1,NULL,1,1,0,1,1000),(4,1,NULL,1,1,0,1,1000),(5,1,NULL,1,1,0,1,1000),(6,1,NULL,1,1,0,1,1000),(7,1,NULL,1,1,0,1,1000),(8,1,NULL,1,1,0,1,1000),(9,1,NULL,1,1,0,1,1000),(10,1,NULL,1,1,0,1,1000),(11,1,NULL,1,1,0,1,1000),(12,1,NULL,1,1,0,1,1000),(14,7,2,1,1,1,1,1000),(14,8,0,0,1,1,0,1000),(15,9,0,1,1,1,0,1000),(20,11,0,1,1,1,1,1000),(20,13,0,0,1,1,0,1000),(20,14,0,0,1,1,0,1000),(20,15,0,0,1,1,0,1000),(24,16,NULL,0,1,0,0,1000),(24,17,NULL,0,1,0,0,1000),(25,18,0,1,1,1,1,1000),(26,40,0,0,1,1,0,400),(27,34,0,0,1,1,0,1047),(28,36,0,1,1,1,0,1921),(29,37,NULL,0,1,0,0,952),(31,38,NULL,0,1,0,0,1367),(55,39,0,0,1,1,0,400);

/*Table structure for table `t_product_tag` */

DROP TABLE IF EXISTS `t_product_tag`;

CREATE TABLE `t_product_tag` (
  `fk_product` int(11) NOT NULL,
  `fk_tag` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `t_product_tag` */

insert  into `t_product_tag`(`fk_product`,`fk_tag`) values (26,1),(27,1),(28,1),(26,2),(27,2),(28,2),(29,2),(30,2);

/*Table structure for table `t_product_tax` */

DROP TABLE IF EXISTS `t_product_tax`;

CREATE TABLE `t_product_tax` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_product` int(11) DEFAULT NULL,
  `fk_tax` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `t_product_tax` */

insert  into `t_product_tax`(`id`,`fk_product`,`fk_tax`) values (15,14,1),(16,15,1),(17,20,1);

/*Table structure for table `t_product_view` */

DROP TABLE IF EXISTS `t_product_view`;

CREATE TABLE `t_product_view` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_product` int(11) DEFAULT NULL,
  `fk_user` int(11) DEFAULT NULL,
  `count_view` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `t_product_view` */

insert  into `t_product_view`(`id`,`fk_product`,`fk_user`,`count_view`) values (1,2,0,44),(2,1,0,13),(3,3,0,9),(4,4,0,5),(5,5,0,4),(6,10,0,1),(7,8,0,1),(8,1,1,1),(9,14,1,1),(10,15,1,2),(11,14,5,2),(12,20,5,6),(13,15,5,1),(14,20,0,7),(15,14,0,4),(16,15,0,2),(17,25,5,1),(18,26,5,18),(19,26,0,11),(20,27,5,3),(21,27,0,1);

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `t_seller` */

insert  into `t_seller`(`id`,`name`,`logo`,`phoneno`,`email`,`website`,`status`,`status_date`,`status_reason`,`fk_manager`,`sid`,`fk_level`) values (1,'Samsung','/images/sellers/milano.png',NULL,'admin@samsung.com',NULL,1,NULL,NULL,5,'samsung',1);

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `t_setting` */

insert  into `t_setting`(`id`,`key`,`value`,`autoload`,`class`) values (1,'home_banner','<root>\r\n	<img src=\"/images/banner/the_shopper_paradise.png\" title=\"Sfriendly.com\" href=\"#\"/>\r\n</root>',0,NULL),(2,'hot_product','<root><product><id>12</id></product></root>',0,NULL);

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
  `bulky_weight_step` double DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=198 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `t_shipping_location` */

insert  into `t_shipping_location`(`id`,`fk_shipping_method`,`fk_location`,`base_price`,`base_weight`,`weight_step`,`weight_step_price`,`bulky_weight`,`bulky_step_price`,`bulky_weight_step`) values (7,1,1,20000,3,1,5000,99999,0,NULL),(8,3,1,40000,3,1,5000,99999,0,NULL),(9,2,1,60000,3,1,5000,99999,0,NULL),(10,3,2,40000,1,0.5,11000,5,15000,0.5),(11,3,3,40000,1,0.5,11000,5,15000,0.5),(12,3,4,40000,1,0.5,11000,5,15000,0.5),(13,3,5,40000,1,0.5,11000,5,15000,0.5),(14,3,6,40000,1,0.5,11000,5,15000,0.5),(15,3,7,40000,1,0.5,11000,5,15000,0.5),(16,3,8,40000,1,0.5,11000,5,15000,0.5),(17,3,9,40000,1,0.5,11000,5,15000,0.5),(18,3,10,40000,1,0.5,11000,5,15000,0.5),(19,3,11,40000,1,0.5,11000,5,15000,0.5),(20,3,12,40000,1,0.5,11000,5,15000,0.5),(21,3,13,40000,1,0.5,11000,5,15000,0.5),(22,3,14,40000,1,0.5,11000,5,15000,0.5),(23,3,15,40000,1,0.5,11000,5,15000,0.5),(24,3,16,40000,1,0.5,11000,5,15000,0.5),(25,3,17,40000,1,0.5,11000,5,15000,0.5),(26,3,18,40000,1,0.5,11000,5,15000,0.5),(27,3,19,40000,1,0.5,11000,5,15000,0.5),(28,3,20,40000,1,0.5,11000,5,15000,0.5),(29,3,21,40000,1,0.5,11000,5,15000,0.5),(30,3,22,40000,1,0.5,11000,5,15000,0.5),(31,3,23,40000,1,0.5,11000,5,15000,0.5),(32,3,24,40000,1,0.5,11000,5,15000,0.5),(33,3,25,40000,1,0.5,11000,5,15000,0.5),(34,3,26,40000,1,0.5,11000,5,15000,0.5),(35,3,27,40000,1,0.5,11000,5,15000,0.5),(36,3,28,40000,1,0.5,11000,5,15000,0.5),(37,3,29,40000,1,0.5,11000,5,15000,0.5),(38,3,30,40000,1,0.5,11000,5,15000,0.5),(39,3,31,40000,1,0.5,11000,5,15000,0.5),(40,3,32,40000,1,0.5,11000,5,15000,0.5),(41,3,33,40000,1,0.5,11000,5,15000,0.5),(42,3,34,40000,1,0.5,11000,5,15000,0.5),(43,3,35,40000,1,0.5,11000,5,15000,0.5),(44,3,36,40000,1,0.5,11000,5,15000,0.5),(45,3,37,40000,1,0.5,11000,5,15000,0.5),(46,3,38,40000,1,0.5,11000,5,15000,0.5),(47,3,39,40000,1,0.5,11000,5,15000,0.5),(48,3,40,40000,1,0.5,11000,5,15000,0.5),(49,3,41,40000,1,0.5,11000,5,15000,0.5),(50,3,42,40000,1,0.5,11000,5,15000,0.5),(51,3,43,40000,1,0.5,11000,5,15000,0.5),(52,3,44,40000,1,0.5,11000,5,15000,0.5),(53,3,45,40000,1,0.5,11000,5,15000,0.5),(54,3,46,40000,1,0.5,11000,5,15000,0.5),(55,3,47,40000,1,0.5,11000,5,15000,0.5),(56,3,48,40000,1,0.5,11000,5,15000,0.5),(57,3,49,40000,1,0.5,11000,5,15000,0.5),(58,3,50,40000,1,0.5,11000,5,15000,0.5),(59,3,51,40000,1,0.5,11000,5,15000,0.5),(60,3,52,40000,1,0.5,11000,5,15000,0.5),(61,3,53,40000,1,0.5,11000,5,15000,0.5),(62,3,54,40000,1,0.5,11000,5,15000,0.5),(63,3,55,40000,1,0.5,11000,5,15000,0.5),(64,3,56,40000,1,0.5,11000,5,15000,0.5),(65,3,57,40000,1,0.5,11000,5,15000,0.5),(66,3,58,40000,1,0.5,11000,5,15000,0.5),(67,3,59,40000,1,0.5,11000,5,15000,0.5),(68,3,60,40000,1,0.5,11000,5,15000,0.5),(69,3,61,40000,1,0.5,11000,5,15000,0.5),(70,3,62,40000,1,0.5,11000,5,15000,0.5),(71,3,63,40000,1,0.5,11000,5,15000,0.5),(136,1,2,35000,1,1,5000,5,5000,0.5),(137,1,3,35000,1,1,5000,5,5000,0.5),(138,1,4,35000,1,1,5000,5,5000,0.5),(139,1,5,35000,1,1,5000,5,5000,0.5),(140,1,6,35000,1,1,5000,5,5000,0.5),(141,1,7,35000,1,1,5000,5,5000,0.5),(142,1,8,35000,1,1,5000,5,5000,0.5),(143,1,9,35000,1,1,5000,5,5000,0.5),(144,1,10,35000,1,1,5000,5,5000,0.5),(145,1,11,35000,1,1,5000,5,5000,0.5),(146,1,12,35000,1,1,5000,5,5000,0.5),(147,1,13,35000,1,1,5000,5,5000,0.5),(148,1,14,35000,1,1,5000,5,5000,0.5),(149,1,15,35000,1,1,5000,5,5000,0.5),(150,1,16,35000,1,1,5000,5,5000,0.5),(151,1,17,35000,1,1,5000,5,5000,0.5),(152,1,18,35000,1,1,5000,5,5000,0.5),(153,1,19,35000,1,1,5000,5,5000,0.5),(154,1,20,35000,1,1,5000,5,5000,0.5),(155,1,21,35000,1,1,5000,5,5000,0.5),(156,1,22,35000,1,1,5000,5,5000,0.5),(157,1,23,35000,1,1,5000,5,5000,0.5),(158,1,24,35000,1,1,5000,5,5000,0.5),(159,1,25,35000,1,1,5000,5,5000,0.5),(160,1,26,35000,1,1,5000,5,5000,0.5),(161,1,27,35000,1,1,5000,5,5000,0.5),(162,1,28,35000,1,1,5000,5,5000,0.5),(163,1,29,35000,1,1,5000,5,5000,0.5),(164,1,30,35000,1,1,5000,5,5000,0.5),(165,1,31,35000,1,1,5000,5,5000,0.5),(166,1,32,35000,1,1,5000,5,5000,0.5),(167,1,33,35000,1,1,5000,5,5000,0.5),(168,1,34,35000,1,1,5000,5,5000,0.5),(169,1,35,35000,1,1,5000,5,5000,0.5),(170,1,36,35000,1,1,5000,5,5000,0.5),(171,1,37,35000,1,1,5000,5,5000,0.5),(172,1,38,35000,1,1,5000,5,5000,0.5),(173,1,39,35000,1,1,5000,5,5000,0.5),(174,1,40,35000,1,1,5000,5,5000,0.5),(175,1,41,35000,1,1,5000,5,5000,0.5),(176,1,42,35000,1,1,5000,5,5000,0.5),(177,1,43,35000,1,1,5000,5,5000,0.5),(178,1,44,35000,1,1,5000,5,5000,0.5),(179,1,45,35000,1,1,5000,5,5000,0.5),(180,1,46,35000,1,1,5000,5,5000,0.5),(181,1,47,35000,1,1,5000,5,5000,0.5),(182,1,48,35000,1,1,5000,5,5000,0.5),(183,1,49,35000,1,1,5000,5,5000,0.5),(184,1,50,35000,1,1,5000,5,5000,0.5),(185,1,51,35000,1,1,5000,5,5000,0.5),(186,1,52,35000,1,1,5000,5,5000,0.5),(187,1,53,35000,1,1,5000,5,5000,0.5),(188,1,54,35000,1,1,5000,5,5000,0.5),(189,1,55,35000,1,1,5000,5,5000,0.5),(190,1,56,35000,1,1,5000,5,5000,0.5),(191,1,57,35000,1,1,5000,5,5000,0.5),(192,1,58,35000,1,1,5000,5,5000,0.5),(193,1,59,35000,1,1,5000,5,5000,0.5),(194,1,60,35000,1,1,5000,5,5000,0.5),(195,1,61,35000,1,1,5000,5,5000,0.5),(196,1,62,35000,1,1,5000,5,5000,0.5),(197,1,63,35000,1,1,5000,5,5000,0.5);

/*Table structure for table `t_shipping_method` */

DROP TABLE IF EXISTS `t_shipping_method`;

CREATE TABLE `t_shipping_method` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `codename` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sort` tinyint(4) DEFAULT NULL,
  `localization` text COLLATE utf8_unicode_ci,
  `min_day` tinyint(4) DEFAULT NULL,
  `max_day` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `t_shipping_method` */

insert  into `t_shipping_method`(`id`,`codename`,`sort`,`localization`,`min_day`,`max_day`) values (1,'standard',1,'<root>\r\n	<en_us>\r\n		<label>Standard (2-5 days)</label>\r\n		<description>2-5 days</description>\r\n	</en_us>\r\n	<vn_vi>\r\n		<label>Chuyển tiết kiệm (2-5 ngày)</label>\r\n		<description>2-5 ngày</description>\r\n	</vn_vi>\r\n	<ko_kr>\r\n		<label>표준 (2-5)</label>\r\n		<description>2-5 일</description>\r\n	</ko_kr>\r\n</root>',2,5),(2,'premium',3,'<root>\r\n	<en_us>\r\n		<label>Premium (1 day)</label>\r\n		<description>1 day</description>\r\n	</en_us>\r\n	<vn_vi>\r\n		<label>Siêu tốc (1 ngày)</label>\r\n		<description>1 ngày</description>\r\n	</vn_vi>\r\n	<ko_kr>\r\n		<label>프리미엄 (1)</label>\r\n		<description>1 일</description>\r\n	</ko_kr>\r\n</root>',1,1),(3,'express',2,'<root>\r\n	<en_us>\r\n		<label>Express (1-3 days)</label>\r\n		<description>1-3 days</description>\r\n	</en_us>\r\n	<vn_vi>\r\n		<label>Chuyển nhanh (1-3)</label>\r\n		<description>1-3 ngày</description>\r\n	</vn_vi>\r\n	<ko_kr>\r\n		<label>표현 (1-3)</label>\r\n		<description>1-3 일</description>\r\n	</ko_kr>\r\n</root>',1,3);

/*Table structure for table `t_tag` */

DROP TABLE IF EXISTS `t_tag`;

CREATE TABLE `t_tag` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `codename` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `visible` enum('private','public') COLLATE utf8_unicode_ci DEFAULT 'public',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `t_tag` */

insert  into `t_tag`(`id`,`codename`,`visible`) values (1,'madeinvietnam','private'),(2,'hot','private');

/*Table structure for table `t_tag_language` */

DROP TABLE IF EXISTS `t_tag_language`;

CREATE TABLE `t_tag_language` (
  `fk_tag` int(11) NOT NULL,
  `label` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `language` enum('VN-VI','KO-KR','EN-US') COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `t_tag_language` */

insert  into `t_tag_language`(`fk_tag`,`label`,`language`) values (1,'Made in Vietnam','KO-KR'),(1,'Made in Vietnam','KO-KR'),(1,'Made in Vietnam','VN-VI'),(2,'Hot','EN-US'),(2,'Hot','VN-VI'),(3,'Hot','KO-KR');

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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `t_user` */

insert  into `t_user`(`id`,`portal_id`,`platform_key`,`user_type`,`created_date`) values (5,50,0,'ADMIN','2014-05-31 10:05:36'),(6,51,0,'ADMIN','2014-07-19 10:07:04'),(7,57,0,'USER','2014-09-20 06:09:00');

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
) ENGINE=InnoDB AUTO_INCREMENT=463 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `t_wishlist` */

insert  into `t_wishlist`(`id`,`fk_customer`,`name`,`remind_date`,`note`,`date_created`) values (22,5,'main',NULL,NULL,'2014-06-01 11:32:15'),(23,NULL,'main',NULL,NULL,'2014-06-01 22:51:46'),(24,NULL,'main',NULL,NULL,'2014-06-01 23:01:26'),(25,NULL,'main',NULL,NULL,'2014-06-01 23:01:34'),(26,NULL,'main',NULL,NULL,'2014-06-08 17:21:21'),(27,NULL,'main',NULL,NULL,'2014-06-13 19:12:38'),(28,NULL,'main',NULL,NULL,'2014-06-13 19:19:10'),(29,NULL,'main',NULL,NULL,'2014-06-25 22:07:54'),(30,NULL,'main',NULL,NULL,'2014-06-30 19:58:49'),(31,NULL,'main',NULL,NULL,'2014-06-30 20:13:16'),(32,NULL,'main',NULL,NULL,'2014-07-05 17:52:49'),(33,NULL,'main',NULL,NULL,'2014-07-06 07:33:38'),(34,NULL,'main',NULL,NULL,'2014-07-06 07:41:15'),(35,NULL,'main',NULL,NULL,'2014-07-06 07:47:40'),(36,NULL,'main',NULL,NULL,'2014-07-06 08:53:49'),(37,NULL,'main',NULL,NULL,'2014-07-06 09:18:58'),(38,NULL,'main',NULL,NULL,'2014-07-06 10:04:21'),(39,NULL,'main',NULL,NULL,'2014-07-06 13:07:41'),(40,NULL,'main',NULL,NULL,'2014-07-06 13:40:33'),(41,NULL,'main',NULL,NULL,'2014-07-06 13:43:31'),(42,NULL,'main',NULL,NULL,'2014-07-09 21:31:33'),(43,NULL,'main',NULL,NULL,'2014-07-09 21:42:36'),(44,NULL,'main',NULL,NULL,'2014-07-09 21:59:57'),(45,NULL,'main',NULL,NULL,'2014-07-16 18:56:14'),(46,NULL,'main',NULL,NULL,'2014-08-24 14:14:36'),(47,NULL,'main',NULL,NULL,'2014-08-24 14:14:38'),(48,NULL,'main',NULL,NULL,'2014-08-24 14:15:10'),(49,NULL,'main',NULL,NULL,'2014-08-24 14:15:12'),(50,NULL,'main',NULL,NULL,'2014-08-24 14:15:21'),(51,NULL,'main',NULL,NULL,'2014-08-24 14:15:23'),(52,NULL,'main',NULL,NULL,'2014-08-24 14:16:05'),(53,NULL,'main',NULL,NULL,'2014-08-24 14:16:07'),(54,NULL,'main',NULL,NULL,'2014-08-24 14:16:13'),(55,NULL,'main',NULL,NULL,'2014-08-24 14:16:15'),(56,NULL,'main',NULL,NULL,'2014-08-24 14:16:42'),(57,NULL,'main',NULL,NULL,'2014-08-24 14:16:44'),(58,NULL,'main',NULL,NULL,'2014-08-24 14:18:08'),(59,NULL,'main',NULL,NULL,'2014-08-24 14:18:10'),(60,NULL,'main',NULL,NULL,'2014-08-24 14:18:19'),(61,NULL,'main',NULL,NULL,'2014-08-24 14:18:21'),(62,NULL,'main',NULL,NULL,'2014-08-24 14:19:30'),(63,NULL,'main',NULL,NULL,'2014-08-24 14:19:32'),(64,NULL,'main',NULL,NULL,'2014-08-24 14:19:47'),(65,NULL,'main',NULL,NULL,'2014-08-24 14:19:49'),(66,NULL,'main',NULL,NULL,'2014-08-24 14:20:15'),(67,NULL,'main',NULL,NULL,'2014-08-24 14:20:17'),(68,NULL,'main',NULL,NULL,'2014-08-24 14:20:21'),(69,NULL,'main',NULL,NULL,'2014-08-24 14:20:23'),(70,NULL,'main',NULL,NULL,'2014-08-24 14:21:48'),(71,NULL,'main',NULL,NULL,'2014-08-24 14:21:50'),(72,NULL,'main',NULL,NULL,'2014-08-24 14:22:47'),(73,NULL,'main',NULL,NULL,'2014-08-24 14:22:49'),(74,NULL,'main',NULL,NULL,'2014-08-24 14:24:42'),(75,NULL,'main',NULL,NULL,'2014-08-24 14:24:44'),(76,NULL,'main',NULL,NULL,'2014-08-24 14:26:35'),(77,NULL,'main',NULL,NULL,'2014-08-24 14:26:37'),(78,NULL,'main',NULL,NULL,'2014-08-24 14:28:28'),(79,NULL,'main',NULL,NULL,'2014-08-24 14:28:30'),(80,NULL,'main',NULL,NULL,'2014-08-24 14:31:59'),(81,NULL,'main',NULL,NULL,'2014-08-24 14:32:01'),(82,NULL,'main',NULL,NULL,'2014-08-24 14:32:19'),(83,NULL,'main',NULL,NULL,'2014-08-24 14:32:21'),(84,NULL,'main',NULL,NULL,'2014-08-24 14:32:38'),(85,NULL,'main',NULL,NULL,'2014-08-24 14:32:40'),(86,NULL,'main',NULL,NULL,'2014-08-24 14:32:49'),(87,NULL,'main',NULL,NULL,'2014-08-24 14:32:51'),(88,NULL,'main',NULL,NULL,'2014-08-24 14:33:04'),(89,NULL,'main',NULL,NULL,'2014-08-24 14:33:06'),(90,NULL,'main',NULL,NULL,'2014-08-24 14:33:16'),(91,NULL,'main',NULL,NULL,'2014-08-24 14:33:18'),(92,NULL,'main',NULL,NULL,'2014-08-24 14:36:25'),(93,NULL,'main',NULL,NULL,'2014-08-24 14:36:27'),(94,NULL,'main',NULL,NULL,'2014-08-24 14:37:52'),(95,NULL,'main',NULL,NULL,'2014-08-24 14:37:54'),(96,NULL,'main',NULL,NULL,'2014-08-24 14:39:06'),(97,NULL,'main',NULL,NULL,'2014-08-24 14:39:08'),(98,NULL,'main',NULL,NULL,'2014-08-24 14:41:39'),(99,NULL,'main',NULL,NULL,'2014-08-24 14:41:41'),(100,NULL,'main',NULL,NULL,'2014-08-24 14:42:21'),(101,NULL,'main',NULL,NULL,'2014-08-24 14:42:23'),(102,NULL,'main',NULL,NULL,'2014-08-24 14:42:36'),(103,NULL,'main',NULL,NULL,'2014-08-24 14:42:38'),(104,NULL,'main',NULL,NULL,'2014-08-24 14:42:43'),(105,NULL,'main',NULL,NULL,'2014-08-24 14:42:45'),(106,NULL,'main',NULL,NULL,'2014-08-24 14:43:44'),(107,NULL,'main',NULL,NULL,'2014-08-24 14:43:45'),(108,NULL,'main',NULL,NULL,'2014-08-24 14:43:56'),(109,NULL,'main',NULL,NULL,'2014-08-24 14:43:57'),(110,NULL,'main',NULL,NULL,'2014-08-24 14:44:19'),(111,NULL,'main',NULL,NULL,'2014-08-24 14:44:21'),(112,NULL,'main',NULL,NULL,'2014-08-24 14:48:36'),(113,NULL,'main',NULL,NULL,'2014-08-24 14:48:38'),(114,NULL,'main',NULL,NULL,'2014-08-24 14:49:16'),(115,NULL,'main',NULL,NULL,'2014-08-24 14:49:18'),(116,NULL,'main',NULL,NULL,'2014-08-24 14:49:59'),(117,NULL,'main',NULL,NULL,'2014-08-24 14:50:02'),(118,NULL,'main',NULL,NULL,'2014-08-24 14:52:36'),(119,NULL,'main',NULL,NULL,'2014-08-24 14:52:39'),(120,NULL,'main',NULL,NULL,'2014-08-24 14:52:50'),(121,NULL,'main',NULL,NULL,'2014-08-24 14:52:52'),(122,NULL,'main',NULL,NULL,'2014-08-24 14:57:33'),(123,NULL,'main',NULL,NULL,'2014-08-24 14:57:35'),(124,NULL,'main',NULL,NULL,'2014-08-24 14:59:54'),(125,NULL,'main',NULL,NULL,'2014-08-24 14:59:57'),(126,NULL,'main',NULL,NULL,'2014-08-24 15:00:09'),(127,NULL,'main',NULL,NULL,'2014-08-24 15:00:11'),(128,NULL,'main',NULL,NULL,'2014-08-24 15:00:32'),(129,NULL,'main',NULL,NULL,'2014-08-24 15:00:34'),(130,NULL,'main',NULL,NULL,'2014-08-24 15:00:48'),(131,NULL,'main',NULL,NULL,'2014-08-24 15:00:51'),(132,NULL,'main',NULL,NULL,'2014-08-24 15:01:19'),(133,NULL,'main',NULL,NULL,'2014-08-24 15:01:21'),(134,NULL,'main',NULL,NULL,'2014-08-24 15:01:41'),(135,NULL,'main',NULL,NULL,'2014-08-24 15:01:43'),(136,NULL,'main',NULL,NULL,'2014-08-24 15:02:12'),(137,NULL,'main',NULL,NULL,'2014-08-24 15:02:14'),(138,NULL,'main',NULL,NULL,'2014-08-24 15:02:21'),(139,NULL,'main',NULL,NULL,'2014-08-24 15:02:23'),(140,NULL,'main',NULL,NULL,'2014-08-24 15:02:29'),(141,NULL,'main',NULL,NULL,'2014-08-24 15:02:38'),(142,NULL,'main',NULL,NULL,'2014-08-24 15:04:15'),(143,NULL,'main',NULL,NULL,'2014-08-24 15:04:17'),(144,NULL,'main',NULL,NULL,'2014-08-24 15:04:19'),(145,NULL,'main',NULL,NULL,'2014-08-24 15:04:20'),(146,NULL,'main',NULL,NULL,'2014-08-24 15:07:02'),(147,NULL,'main',NULL,NULL,'2014-08-24 15:07:04'),(148,NULL,'main',NULL,NULL,'2014-08-24 15:07:39'),(149,NULL,'main',NULL,NULL,'2014-08-24 15:07:41'),(150,NULL,'main',NULL,NULL,'2014-08-24 15:07:56'),(151,NULL,'main',NULL,NULL,'2014-08-24 15:07:58'),(152,NULL,'main',NULL,NULL,'2014-08-24 15:08:03'),(153,NULL,'main',NULL,NULL,'2014-08-24 15:08:04'),(154,NULL,'main',NULL,NULL,'2014-08-24 15:08:33'),(155,NULL,'main',NULL,NULL,'2014-08-24 15:08:34'),(156,NULL,'main',NULL,NULL,'2014-08-24 15:08:44'),(157,NULL,'main',NULL,NULL,'2014-08-24 15:08:46'),(158,NULL,'main',NULL,NULL,'2014-08-24 16:02:32'),(159,NULL,'main',NULL,NULL,'2014-08-24 16:02:34'),(160,NULL,'main',NULL,NULL,'2014-08-24 16:03:07'),(161,NULL,'main',NULL,NULL,'2014-08-24 16:03:09'),(162,NULL,'main',NULL,NULL,'2014-08-24 16:03:51'),(163,NULL,'main',NULL,NULL,'2014-08-24 16:03:53'),(164,NULL,'main',NULL,NULL,'2014-08-24 16:07:23'),(165,NULL,'main',NULL,NULL,'2014-08-24 16:07:25'),(166,NULL,'main',NULL,NULL,'2014-08-24 16:08:17'),(167,NULL,'main',NULL,NULL,'2014-08-24 16:08:19'),(168,NULL,'main',NULL,NULL,'2014-08-24 16:11:19'),(169,NULL,'main',NULL,NULL,'2014-08-24 16:11:21'),(170,NULL,'main',NULL,NULL,'2014-08-24 16:11:29'),(171,NULL,'main',NULL,NULL,'2014-08-24 16:11:30'),(172,NULL,'main',NULL,NULL,'2014-08-24 16:14:49'),(173,NULL,'main',NULL,NULL,'2014-08-24 16:14:51'),(174,NULL,'main',NULL,NULL,'2014-08-24 16:27:31'),(175,NULL,'main',NULL,NULL,'2014-08-24 16:27:33'),(176,NULL,'main',NULL,NULL,'2014-08-24 16:27:45'),(177,NULL,'main',NULL,NULL,'2014-08-24 16:27:47'),(178,NULL,'main',NULL,NULL,'2014-08-24 16:28:18'),(179,NULL,'main',NULL,NULL,'2014-08-24 16:28:20'),(180,NULL,'main',NULL,NULL,'2014-08-24 16:28:37'),(181,NULL,'main',NULL,NULL,'2014-08-24 16:28:39'),(182,NULL,'main',NULL,NULL,'2014-08-24 16:29:01'),(183,NULL,'main',NULL,NULL,'2014-08-24 16:29:03'),(184,NULL,'main',NULL,NULL,'2014-08-24 16:31:38'),(185,NULL,'main',NULL,NULL,'2014-08-24 16:31:40'),(186,NULL,'main',NULL,NULL,'2014-08-24 16:32:20'),(187,NULL,'main',NULL,NULL,'2014-08-24 16:32:22'),(188,NULL,'main',NULL,NULL,'2014-08-24 16:32:45'),(189,NULL,'main',NULL,NULL,'2014-08-24 16:32:47'),(190,NULL,'main',NULL,NULL,'2014-08-24 16:33:11'),(191,NULL,'main',NULL,NULL,'2014-08-24 16:33:13'),(192,NULL,'main',NULL,NULL,'2014-08-24 16:33:45'),(193,NULL,'main',NULL,NULL,'2014-08-24 16:33:47'),(194,NULL,'main',NULL,NULL,'2014-08-24 16:34:31'),(195,NULL,'main',NULL,NULL,'2014-08-24 16:34:33'),(196,NULL,'main',NULL,NULL,'2014-08-24 16:34:41'),(197,NULL,'main',NULL,NULL,'2014-08-24 16:34:43'),(198,NULL,'main',NULL,NULL,'2014-08-24 16:35:13'),(199,NULL,'main',NULL,NULL,'2014-08-24 16:35:15'),(200,NULL,'main',NULL,NULL,'2014-08-24 16:35:36'),(201,NULL,'main',NULL,NULL,'2014-08-24 16:35:38'),(202,NULL,'main',NULL,NULL,'2014-08-24 16:36:01'),(203,NULL,'main',NULL,NULL,'2014-08-24 16:36:03'),(204,NULL,'main',NULL,NULL,'2014-08-24 16:36:18'),(205,NULL,'main',NULL,NULL,'2014-08-24 16:36:20'),(206,NULL,'main',NULL,NULL,'2014-08-24 16:36:49'),(207,NULL,'main',NULL,NULL,'2014-08-24 16:36:51'),(208,NULL,'main',NULL,NULL,'2014-08-24 16:37:35'),(209,NULL,'main',NULL,NULL,'2014-08-24 16:37:38'),(210,NULL,'main',NULL,NULL,'2014-08-24 16:37:52'),(211,NULL,'main',NULL,NULL,'2014-08-24 16:37:54'),(212,NULL,'main',NULL,NULL,'2014-08-24 16:40:39'),(213,NULL,'main',NULL,NULL,'2014-08-24 16:40:41'),(214,NULL,'main',NULL,NULL,'2014-08-24 16:40:54'),(215,NULL,'main',NULL,NULL,'2014-08-24 16:40:56'),(216,NULL,'main',NULL,NULL,'2014-08-24 16:41:08'),(217,NULL,'main',NULL,NULL,'2014-08-24 16:41:10'),(218,NULL,'main',NULL,NULL,'2014-08-24 16:41:30'),(219,NULL,'main',NULL,NULL,'2014-08-24 16:41:32'),(220,NULL,'main',NULL,NULL,'2014-08-24 16:42:01'),(221,NULL,'main',NULL,NULL,'2014-08-24 16:42:03'),(222,NULL,'main',NULL,NULL,'2014-08-24 16:42:17'),(223,NULL,'main',NULL,NULL,'2014-08-24 16:42:19'),(224,NULL,'main',NULL,NULL,'2014-08-24 16:44:32'),(225,NULL,'main',NULL,NULL,'2014-08-24 16:44:34'),(226,NULL,'main',NULL,NULL,'2014-08-24 16:44:45'),(227,NULL,'main',NULL,NULL,'2014-08-24 16:44:47'),(228,NULL,'main',NULL,NULL,'2014-08-24 16:45:28'),(229,NULL,'main',NULL,NULL,'2014-08-24 16:45:31'),(230,NULL,'main',NULL,NULL,'2014-08-24 16:45:36'),(231,NULL,'main',NULL,NULL,'2014-08-24 16:45:38'),(232,NULL,'main',NULL,NULL,'2014-08-24 16:46:05'),(233,NULL,'main',NULL,NULL,'2014-08-24 16:46:07'),(234,NULL,'main',NULL,NULL,'2014-08-24 16:46:40'),(235,NULL,'main',NULL,NULL,'2014-08-24 16:46:43'),(236,NULL,'main',NULL,NULL,'2014-08-24 16:47:33'),(237,NULL,'main',NULL,NULL,'2014-08-24 16:47:34'),(238,NULL,'main',NULL,NULL,'2014-08-24 16:47:46'),(239,NULL,'main',NULL,NULL,'2014-08-24 16:47:47'),(240,NULL,'main',NULL,NULL,'2014-08-24 16:49:53'),(241,NULL,'main',NULL,NULL,'2014-08-24 16:49:54'),(242,NULL,'main',NULL,NULL,'2014-08-24 16:50:39'),(243,NULL,'main',NULL,NULL,'2014-08-24 16:50:41'),(244,NULL,'main',NULL,NULL,'2014-08-24 16:53:39'),(245,NULL,'main',NULL,NULL,'2014-08-24 16:53:41'),(246,NULL,'main',NULL,NULL,'2014-08-24 16:54:05'),(247,NULL,'main',NULL,NULL,'2014-08-24 16:54:07'),(248,NULL,'main',NULL,NULL,'2014-08-24 16:55:11'),(249,NULL,'main',NULL,NULL,'2014-08-24 16:55:13'),(250,NULL,'main',NULL,NULL,'2014-08-24 16:56:14'),(251,NULL,'main',NULL,NULL,'2014-08-24 16:56:16'),(252,NULL,'main',NULL,NULL,'2014-08-24 16:56:30'),(253,NULL,'main',NULL,NULL,'2014-08-24 16:56:31'),(254,NULL,'main',NULL,NULL,'2014-08-24 17:05:32'),(255,NULL,'main',NULL,NULL,'2014-08-24 17:05:34'),(256,NULL,'main',NULL,NULL,'2014-08-24 17:05:43'),(257,NULL,'main',NULL,NULL,'2014-08-24 17:05:45'),(258,NULL,'main',NULL,NULL,'2014-08-24 17:06:23'),(259,NULL,'main',NULL,NULL,'2014-08-24 17:06:25'),(260,NULL,'main',NULL,NULL,'2014-08-24 17:06:36'),(261,NULL,'main',NULL,NULL,'2014-08-24 17:06:38'),(262,NULL,'main',NULL,NULL,'2014-08-24 17:06:53'),(263,NULL,'main',NULL,NULL,'2014-08-24 17:06:55'),(264,NULL,'main',NULL,NULL,'2014-08-24 17:07:06'),(265,NULL,'main',NULL,NULL,'2014-08-24 17:07:08'),(266,NULL,'main',NULL,NULL,'2014-08-24 17:07:28'),(267,NULL,'main',NULL,NULL,'2014-08-24 17:07:31'),(268,NULL,'main',NULL,NULL,'2014-08-24 17:11:20'),(269,NULL,'main',NULL,NULL,'2014-08-24 17:11:22'),(270,NULL,'main',NULL,NULL,'2014-08-24 17:12:16'),(271,NULL,'main',NULL,NULL,'2014-08-24 17:12:20'),(272,NULL,'main',NULL,NULL,'2014-08-24 17:20:02'),(273,NULL,'main',NULL,NULL,'2014-08-24 17:20:04'),(274,NULL,'main',NULL,NULL,'2014-08-24 17:28:31'),(275,NULL,'main',NULL,NULL,'2014-08-24 17:28:33'),(276,NULL,'main',NULL,NULL,'2014-08-24 17:28:51'),(277,NULL,'main',NULL,NULL,'2014-08-24 17:28:53'),(278,NULL,'main',NULL,NULL,'2014-08-24 17:29:10'),(279,NULL,'main',NULL,NULL,'2014-08-24 17:29:12'),(280,NULL,'main',NULL,NULL,'2014-08-24 17:29:55'),(281,NULL,'main',NULL,NULL,'2014-08-24 17:30:40'),(282,NULL,'main',NULL,NULL,'2014-08-24 17:30:52'),(283,NULL,'main',NULL,NULL,'2014-08-24 17:33:53'),(284,NULL,'main',NULL,NULL,'2014-08-24 17:34:20'),(285,NULL,'main',NULL,NULL,'2014-08-24 17:34:37'),(286,NULL,'main',NULL,NULL,'2014-08-24 17:35:45'),(287,NULL,'main',NULL,NULL,'2014-08-24 18:03:53'),(288,NULL,'main',NULL,NULL,'2014-08-24 18:04:21'),(289,NULL,'main',NULL,NULL,'2014-08-24 18:04:46'),(290,NULL,'main',NULL,NULL,'2014-08-24 18:04:57'),(291,NULL,'main',NULL,NULL,'2014-08-24 18:07:23'),(292,NULL,'main',NULL,NULL,'2014-08-24 18:08:07'),(293,NULL,'main',NULL,NULL,'2014-08-24 18:08:24'),(294,NULL,'main',NULL,NULL,'2014-08-24 18:08:38'),(295,NULL,'main',NULL,NULL,'2014-08-24 18:08:57'),(296,NULL,'main',NULL,NULL,'2014-08-24 18:09:02'),(297,NULL,'main',NULL,NULL,'2014-08-24 18:09:23'),(298,NULL,'main',NULL,NULL,'2014-08-24 18:18:11'),(299,NULL,'main',NULL,NULL,'2014-08-24 18:18:43'),(300,NULL,'main',NULL,NULL,'2014-08-24 18:18:51'),(301,NULL,'main',NULL,NULL,'2014-08-24 18:19:18'),(302,NULL,'main',NULL,NULL,'2014-08-24 18:19:28'),(303,NULL,'main',NULL,NULL,'2014-08-24 18:19:33'),(304,NULL,'main',NULL,NULL,'2014-08-24 18:23:16'),(305,NULL,'main',NULL,NULL,'2014-08-24 18:41:01'),(306,NULL,'main',NULL,NULL,'2014-08-24 18:42:30'),(307,NULL,'main',NULL,NULL,'2014-08-24 18:42:49'),(308,NULL,'main',NULL,NULL,'2014-08-24 18:43:01'),(309,NULL,'main',NULL,NULL,'2014-08-24 18:47:52'),(310,NULL,'main',NULL,NULL,'2014-08-24 18:55:23'),(311,NULL,'main',NULL,NULL,'2014-08-24 20:40:12'),(312,NULL,'main',NULL,NULL,'2014-08-24 20:49:15'),(313,NULL,'main',NULL,NULL,'2014-08-24 20:49:40'),(314,NULL,'main',NULL,NULL,'2014-08-24 20:50:49'),(315,NULL,'main',NULL,NULL,'2014-08-24 20:51:22'),(316,NULL,'main',NULL,NULL,'2014-08-24 21:20:46'),(317,NULL,'main',NULL,NULL,'2014-08-24 21:21:19'),(318,NULL,'main',NULL,NULL,'2014-08-24 21:22:01'),(319,NULL,'main',NULL,NULL,'2014-08-24 21:22:18'),(320,NULL,'main',NULL,NULL,'2014-08-24 21:22:50'),(321,NULL,'main',NULL,NULL,'2014-08-24 21:22:55'),(322,NULL,'main',NULL,NULL,'2014-08-24 21:23:42'),(323,NULL,'main',NULL,NULL,'2014-08-24 21:23:50'),(324,NULL,'main',NULL,NULL,'2014-08-24 21:24:43'),(325,NULL,'main',NULL,NULL,'2014-08-24 21:25:09'),(326,NULL,'main',NULL,NULL,'2014-08-24 21:25:18'),(327,NULL,'main',NULL,NULL,'2014-08-24 21:26:37'),(328,NULL,'main',NULL,NULL,'2014-08-24 21:32:36'),(329,NULL,'main',NULL,NULL,'2014-08-24 21:33:08'),(330,NULL,'main',NULL,NULL,'2014-08-24 21:33:48'),(331,NULL,'main',NULL,NULL,'2014-08-24 21:34:42'),(332,NULL,'main',NULL,NULL,'2014-08-24 21:35:01'),(333,NULL,'main',NULL,NULL,'2014-08-24 21:35:17'),(334,NULL,'main',NULL,NULL,'2014-08-24 21:50:09'),(335,NULL,'main',NULL,NULL,'2014-08-24 21:55:00'),(336,NULL,'main',NULL,NULL,'2014-08-24 22:02:01'),(337,NULL,'main',NULL,NULL,'2014-08-24 22:02:47'),(338,NULL,'main',NULL,NULL,'2014-08-24 22:06:29'),(339,NULL,'main',NULL,NULL,'2014-08-24 22:06:50'),(340,NULL,'main',NULL,NULL,'2014-08-24 22:06:53'),(341,NULL,'main',NULL,NULL,'2014-08-24 22:07:07'),(342,NULL,'main',NULL,NULL,'2014-08-24 22:07:15'),(343,NULL,'main',NULL,NULL,'2014-08-24 22:10:36'),(344,NULL,'main',NULL,NULL,'2014-08-24 22:11:11'),(345,NULL,'main',NULL,NULL,'2014-08-24 22:11:18'),(346,NULL,'main',NULL,NULL,'2014-08-24 22:13:09'),(347,NULL,'main',NULL,NULL,'2014-08-24 22:13:31'),(348,NULL,'main',NULL,NULL,'2014-08-24 22:15:38'),(349,NULL,'main',NULL,NULL,'2014-08-24 22:15:54'),(350,NULL,'main',NULL,NULL,'2014-08-24 22:21:29'),(351,NULL,'main',NULL,NULL,'2014-08-24 22:25:58'),(352,NULL,'main',NULL,NULL,'2014-08-24 22:26:29'),(353,NULL,'main',NULL,NULL,'2014-08-24 22:27:18'),(354,NULL,'main',NULL,NULL,'2014-08-24 22:27:25'),(355,NULL,'main',NULL,NULL,'2014-08-24 22:28:29'),(356,NULL,'main',NULL,NULL,'2014-08-24 22:28:56'),(357,NULL,'main',NULL,NULL,'2014-08-24 22:29:13'),(358,NULL,'main',NULL,NULL,'2014-08-24 22:30:22'),(359,NULL,'main',NULL,NULL,'2014-08-24 22:31:29'),(360,NULL,'main',NULL,NULL,'2014-08-24 22:32:02'),(361,NULL,'main',NULL,NULL,'2014-08-24 22:34:22'),(362,NULL,'main',NULL,NULL,'2014-08-24 22:37:05'),(363,NULL,'main',NULL,NULL,'2014-08-24 22:37:49'),(364,NULL,'main',NULL,NULL,'2014-08-24 22:38:11'),(365,NULL,'main',NULL,NULL,'2014-08-24 22:38:51'),(366,NULL,'main',NULL,NULL,'2014-08-24 22:39:13'),(367,NULL,'main',NULL,NULL,'2014-08-24 22:39:36'),(368,NULL,'main',NULL,NULL,'2014-08-24 22:49:10'),(369,NULL,'main',NULL,NULL,'2014-08-24 22:49:33'),(370,NULL,'main',NULL,NULL,'2014-08-24 22:49:49'),(371,NULL,'main',NULL,NULL,'2014-08-24 22:50:34'),(372,NULL,'main',NULL,NULL,'2014-08-24 22:50:49'),(373,NULL,'main',NULL,NULL,'2014-08-24 22:51:12'),(374,NULL,'main',NULL,NULL,'2014-08-24 22:51:36'),(375,NULL,'main',NULL,NULL,'2014-08-24 22:52:59'),(376,NULL,'main',NULL,NULL,'2014-08-24 22:53:26'),(377,NULL,'main',NULL,NULL,'2014-08-24 22:54:14'),(378,NULL,'main',NULL,NULL,'2014-08-24 22:54:20'),(379,NULL,'main',NULL,NULL,'2014-08-24 22:54:26'),(380,NULL,'main',NULL,NULL,'2014-08-24 22:54:55'),(381,NULL,'main',NULL,NULL,'2014-08-24 22:55:21'),(382,NULL,'main',NULL,NULL,'2014-08-24 22:55:40'),(383,NULL,'main',NULL,NULL,'2014-08-24 22:55:49'),(384,NULL,'main',NULL,NULL,'2014-08-24 22:56:06'),(385,NULL,'main',NULL,NULL,'2014-08-24 22:59:16'),(386,NULL,'main',NULL,NULL,'2014-08-24 22:59:35'),(387,NULL,'main',NULL,NULL,'2014-08-24 23:02:25'),(388,NULL,'main',NULL,NULL,'2014-08-24 23:02:41'),(389,NULL,'main',NULL,NULL,'2014-08-24 23:04:22'),(390,NULL,'main',NULL,NULL,'2014-08-24 23:06:21'),(391,NULL,'main',NULL,NULL,'2014-08-24 23:07:14'),(392,NULL,'main',NULL,NULL,'2014-08-24 23:12:41'),(393,NULL,'main',NULL,NULL,'2014-08-24 23:13:32'),(394,NULL,'main',NULL,NULL,'2014-08-24 23:14:04'),(395,NULL,'main',NULL,NULL,'2014-08-24 23:14:35'),(396,NULL,'main',NULL,NULL,'2014-08-24 23:15:41'),(397,NULL,'main',NULL,NULL,'2014-08-24 23:16:31'),(398,NULL,'main',NULL,NULL,'2014-08-24 23:18:18'),(399,NULL,'main',NULL,NULL,'2014-08-24 23:37:13'),(400,NULL,'main',NULL,NULL,'2014-08-25 20:55:07'),(401,NULL,'main',NULL,NULL,'2014-08-25 21:09:53'),(402,NULL,'main',NULL,NULL,'2014-08-25 21:17:25'),(403,NULL,'main',NULL,NULL,'2014-08-25 21:25:43'),(404,NULL,'main',NULL,NULL,'2014-08-25 21:25:48'),(405,NULL,'main',NULL,NULL,'2014-08-25 21:28:04'),(406,NULL,'main',NULL,NULL,'2014-08-25 21:28:06'),(407,NULL,'main',NULL,NULL,'2014-08-25 21:29:08'),(408,NULL,'main',NULL,NULL,'2014-08-25 21:59:33'),(409,NULL,'main',NULL,NULL,'2014-08-25 22:00:21'),(410,NULL,'main',NULL,NULL,'2014-08-27 21:13:03'),(411,NULL,'main',NULL,NULL,'2014-08-27 22:09:01'),(412,NULL,'main',NULL,NULL,'2014-08-29 21:59:47'),(413,NULL,'main',NULL,NULL,'2014-08-29 22:23:34'),(414,NULL,'main',NULL,NULL,'2014-08-31 11:43:38'),(415,NULL,'main',NULL,NULL,'2014-08-31 14:55:25'),(416,NULL,'main',NULL,NULL,'2014-08-31 19:00:08'),(417,NULL,'main',NULL,NULL,'2014-08-31 19:03:39'),(418,NULL,'main',NULL,NULL,'2014-08-31 19:03:43'),(419,NULL,'main',NULL,NULL,'2014-08-31 19:39:35'),(420,NULL,'main',NULL,NULL,'2014-08-31 19:44:36'),(421,NULL,'main',NULL,NULL,'2014-08-31 19:45:19'),(422,NULL,'main',NULL,NULL,'2014-08-31 19:45:45'),(423,NULL,'main',NULL,NULL,'2014-08-31 19:47:45'),(424,NULL,'main',NULL,NULL,'2014-08-31 19:48:13'),(425,NULL,'main',NULL,NULL,'2014-08-31 19:49:58'),(426,NULL,'main',NULL,NULL,'2014-08-31 19:50:54'),(427,NULL,'main',NULL,NULL,'2014-08-31 19:51:10'),(428,NULL,'main',NULL,NULL,'2014-08-31 19:51:44'),(429,NULL,'main',NULL,NULL,'2014-09-05 21:53:17'),(430,NULL,'main',NULL,NULL,'2014-09-13 20:31:32'),(431,NULL,'main',NULL,NULL,'2014-09-13 20:31:39'),(432,NULL,'main',NULL,NULL,'2014-09-13 20:31:47'),(433,NULL,'main',NULL,NULL,'2014-09-13 22:19:14'),(434,NULL,'main',NULL,NULL,'2014-09-13 22:20:00'),(435,NULL,'main',NULL,NULL,'2014-09-13 22:20:40'),(436,NULL,'main',NULL,NULL,'2014-09-13 22:20:57'),(437,NULL,'main',NULL,NULL,'2014-09-13 22:21:16'),(438,NULL,'main',NULL,NULL,'2014-09-13 22:21:38'),(439,NULL,'main',NULL,NULL,'2014-09-13 22:22:00'),(440,NULL,'main',NULL,NULL,'2014-09-13 22:22:03'),(441,NULL,'main',NULL,NULL,'2014-09-13 22:22:28'),(442,NULL,'main',NULL,NULL,'2014-09-13 22:23:34'),(443,NULL,'main',NULL,NULL,'2014-09-13 22:23:46'),(444,NULL,'main',NULL,NULL,'2014-09-13 22:24:11'),(445,NULL,'main',NULL,NULL,'2014-09-13 22:24:15'),(446,NULL,'main',NULL,NULL,'2014-09-20 18:03:48'),(447,NULL,'main',NULL,NULL,'2014-09-27 18:21:41'),(448,NULL,'main',NULL,NULL,'2014-09-27 21:51:14'),(449,NULL,'main',NULL,NULL,'2014-09-28 08:17:43'),(450,NULL,'main',NULL,NULL,'2014-09-28 08:17:50'),(451,NULL,'main',NULL,NULL,'2014-09-28 09:37:53'),(452,NULL,'main',NULL,NULL,'2014-09-28 15:58:14'),(453,NULL,'main',NULL,NULL,'2014-10-15 21:06:12'),(454,NULL,'main',NULL,NULL,'2014-10-15 21:12:22'),(455,NULL,'main',NULL,NULL,'2014-10-15 21:12:47'),(456,NULL,'main',NULL,NULL,'2014-10-15 21:12:53'),(457,NULL,'main',NULL,NULL,'2014-10-15 21:15:12'),(458,NULL,'main',NULL,NULL,'2014-10-15 21:16:14'),(459,NULL,'main',NULL,NULL,'2014-10-15 21:18:03'),(460,NULL,'main',NULL,NULL,'2014-11-01 09:02:05'),(461,NULL,'main',NULL,NULL,'2014-11-19 20:56:57'),(462,NULL,'main',NULL,NULL,'2014-11-19 21:48:22');

/*Table structure for table `t_wishlist_detail` */

DROP TABLE IF EXISTS `t_wishlist_detail`;

CREATE TABLE `t_wishlist_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_wishlist` int(11) DEFAULT NULL,
  `type` enum('product','note','link') COLLATE utf8_unicode_ci DEFAULT NULL,
  `note` text COLLATE utf8_unicode_ci,
  `fk_product` int(11) DEFAULT NULL,
  `status` tinyint(4) DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `fk_wishlist` (`fk_wishlist`,`fk_product`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `t_wishlist_detail` */

insert  into `t_wishlist_detail`(`id`,`fk_wishlist`,`type`,`note`,`fk_product`,`status`) values (39,22,NULL,NULL,26,0);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
