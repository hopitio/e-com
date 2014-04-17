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
  `fk_customer` int(11) DEFAULT NULL,
  `date_created` datetime DEFAULT NULL,
  `date_paid` datetime DEFAULT NULL,
  `invoice_status` enum('unpaid','paid','cancelled') COLLATE utf8_unicode_ci DEFAULT NULL,
  `fk_contact` int(11) DEFAULT NULL,
  `email_status` tinyint(4) DEFAULT NULL,
  `comment` text COLLATE utf8_unicode_ci,
  `payment_method` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `payment_fees` decimal(5,3) DEFAULT NULL,
  `payment_actual` decimal(10,3) DEFAULT NULL,
  `payment_convert_rate` decimal(10,3) DEFAULT NULL,
  `payment_currency_root` char(5) COLLATE utf8_unicode_ci DEFAULT NULL,
  `payment_currency_target` char(5) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `t_invoice` */

/*Table structure for table `t_invoice_detail` */

DROP TABLE IF EXISTS `t_invoice_detail`;

CREATE TABLE `t_invoice_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_invoice` int(11) DEFAULT NULL,
  `fk_order` int(11) DEFAULT NULL,
  `quantity` double DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `t_invoice_detail` */

/*Table structure for table `t_order` */

DROP TABLE IF EXISTS `t_order`;

CREATE TABLE `t_order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_customer` int(11) DEFAULT NULL,
  `email_status` char(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fk_order_status_history` int(11) DEFAULT NULL,
  `comment` text COLLATE utf8_unicode_ci,
  `bonus` double DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `t_order` */

/*Table structure for table `t_order_product` */

DROP TABLE IF EXISTS `t_order_product`;

CREATE TABLE `t_order_product` (
  `id` char(50) COLLATE utf8_unicode_ci NOT NULL,
  `fk_order` int(11) DEFAULT NULL,
  `sub_key` char(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sub_id` int(11) DEFAULT NULL,
  `product_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `product_image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `short_description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `price` double DEFAULT NULL,
  `quantity` double DEFAULT NULL,
  `total_price` double DEFAULT NULL,
  `actual_price` double DEFAULT NULL,
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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `t_user_contact` */

insert  into `t_user_contact`(`id`,`fk_user`,`date_created`,`date_used`,`count_used`,`prefix`,`firstname`,`middlename`,`lastname`,`suffix`,`company`,`street_address`,`city`,`country`,`state_province`,`zip_postal_code`,`telephone`,`fax`,`vat_number`) values (1,2,NULL,NULL,1,'Mr','Adrew',NULL,'Kingsley',NULL,NULL,'12 Wall st\r\n','New york','America',NULL,NULL,'012347888',NULL,NULL);

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

insert  into `t_user_history`(`id`,`fk_user`,`secret_key`,`client_ip`,`user_agrent`,`last_activity`,`sub_system_name`,`description`,`action_name`,`session_id`) values ('085783a2-c5e5-11e3-b6d9-fc4dd45603ff',42,'8eb9072a7b7dbe4d48acbc9416f0452c','127.0.0.1','Mozilla/5.0 (Windows NT 6.3; WOW64; rv:28.0) Gecko','2014-04-17 11:04:02','GIFT','2014-04-17 11:02:02','LOGIN','b83475b5161d4f7126ac'),('25f38fce-c5e4-11e3-b6d9-fc4dd45603ff',42,NULL,'127.0.0.1','Mozilla/5.0 (Windows NT 6.3; WOW64; rv:28.0) Gecko','2014-04-17 10:04:43','GIFT','2014-04-17 10:55:43','LOGIN','d79c59f121b88f322f86'),('3312197f-c5e4-11e3-b6d9-fc4dd45603ff',42,NULL,'127.0.0.1','Mozilla/5.0 (Windows NT 6.3; WOW64; rv:28.0) Gecko','2014-04-17 10:04:05','GIFT','2014-04-17 10:56:05','LOGIN','eecfb93635ed645546be'),('47e4e31b-c5e4-11e3-b6d9-fc4dd45603ff',42,NULL,'127.0.0.1','Mozilla/5.0 (Windows NT 6.3; WOW64; rv:28.0) Gecko','2014-04-17 10:04:40','GIFT','2014-04-17 10:56:40','LOGIN','eecfb93635ed645546be'),('656310ed-bc19-11e3-80cb-f82fa8c904ca',43,NULL,'127.0.0.1','','2014-04-04 11:04:41','PORTAL','Thay đổi mật khẩu','CHANGEPASS','1373fd7f894351c4e6b7'),('78fedd84-c5f1-11e3-b6d9-fc4dd45603ff',42,'7cb72bdf8dfc294422c8d51176c4b68f','127.0.0.1','Mozilla/5.0 (Windows NT 6.3; WOW64; rv:28.0) Gecko','2014-04-17 12:04:05','PORTAL','2014-04-17 12:31:05','LOGIN','28a3fe82e7ea81cf3c66'),('7e946e46-bc19-11e3-80cb-f82fa8c904ca',43,NULL,'127.0.0.1','','2014-04-04 11:04:23','PORTAL','Reset mật khẩu','RESETPASS','1373fd7f894351c4e6b7'),('83574396-bcc5-11e3-a78d-f82fa8c904ca',42,NULL,'127.0.0.1','','2014-04-05 08:04:44','PORTAL','Thay đổi thông tin cá nhân','CHANGEINFORMATION','71b25cd75af2f2995d77'),('83a740db-c5e5-11e3-b6d9-fc4dd45603ff',42,'f6e3811b480d97a3254a3e247bb3ea08','127.0.0.1','Mozilla/5.0 (Windows NT 6.3; WOW64; rv:28.0) Gecko','2014-04-17 11:04:29','GIFT','2014-04-17 11:05:29','LOGIN','690f1f965c5d0a3abbc2'),('925d5b3d-c5ea-11e3-b6d9-fc4dd45603ff',42,'199945b95e03ca9af9405280e0eb9368','127.0.0.1','Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/53','2014-04-17 11:04:41','GIFT','2014-04-17 11:41:41','LOGIN','10cc48187ca65cafe9bb'),('92ec7ebd-bcc5-11e3-a78d-f82fa8c904ca',42,NULL,'127.0.0.1','','2014-04-05 08:04:11','PORTAL','Thay đổi thông tin cá nhân','CHANGEINFORMATION','71b25cd75af2f2995d77'),('9d499b69-bc19-11e3-80cb-f82fa8c904ca',43,NULL,'127.0.0.1','','2014-04-04 11:04:15','PORTAL','Reset mật khẩu','RESETPASS','fc8ec855ba5469f948f4'),('9f54403e-c5ef-11e3-b6d9-fc4dd45603ff',42,'7cb72bdf8dfc294422c8d51176c4b68f','127.0.0.1','Mozilla/5.0 (Windows NT 6.3; WOW64; rv:28.0) Gecko','2014-04-17 12:04:51','PORTAL','2014-04-17 12:17:51','LOGIN','e91d43dcfeb56f9db883'),('a6844376-bc19-11e3-80cb-f82fa8c904ca',43,NULL,'127.0.0.1','','2014-04-04 11:04:30','PORTAL','Reset mật khẩu','RESETPASS','fc8ec855ba5469f948f4'),('b90744fd-c5e4-11e3-b6d9-fc4dd45603ff',42,NULL,'127.0.0.1','Mozilla/5.0 (Windows NT 6.3; WOW64; rv:28.0) Gecko','2014-04-17 10:04:49','GIFT','2014-04-17 10:59:49','LOGIN','402bfbbc57f419ef7f16'),('bba440f5-bcc6-11e3-a78d-f82fa8c904ca',42,NULL,'127.0.0.1','','2014-04-05 08:04:28','PORTAL','Thay đổi thông tin cá nhân','CHANGEINFORMATION','7f4f5fe9ed0edd288f2c'),('bc157714-bc19-11e3-80cb-f82fa8c904ca',43,NULL,'127.0.0.1','','2014-04-04 11:04:06','PORTAL','Thay đổi mật khẩu','CHANGEPASS','fc8ec855ba5469f948f4'),('c1f0ebce-bcc6-11e3-a78d-f82fa8c904ca',42,NULL,'127.0.0.1','','2014-04-05 08:04:39','PORTAL','Thay đổi thông tin cá nhân','CHANGEINFORMATION','7f4f5fe9ed0edd288f2c'),('c5faa980-bc19-11e3-80cb-f82fa8c904ca',43,NULL,'127.0.0.1','','2014-04-04 11:04:23','PORTAL','Reset mật khẩu','RESETPASS','5dd91e86d1e8fa881b52'),('c7c899b2-c5ef-11e3-b6d9-fc4dd45603ff',42,'7cb72bdf8dfc294422c8d51176c4b68f','127.0.0.1','Mozilla/5.0 (Windows NT 6.3; WOW64; rv:28.0) Gecko','2014-04-17 12:04:59','PORTAL','2014-04-17 12:18:59','LOGIN','5ac433c0e08b7628663f'),('df1e9405-bc19-11e3-80cb-f82fa8c904ca',43,NULL,'127.0.0.1','','2014-04-04 11:04:05','PORTAL','Thay đổi mật khẩu','CHANGEPASS','5dd91e86d1e8fa881b52'),('e245c0ab-c5ec-11e3-b6d9-fc4dd45603ff',42,'f6e3811b480d97a3254a3e247bb3ea08','127.0.0.1','Mozilla/5.0 (Windows NT 6.3; WOW64; rv:28.0) Gecko','2014-04-17 11:04:15','GIFT','2014-04-17 11:58:15','LOGIN','95f38127eb5bcdb707e2'),('ea14c951-c5e3-11e3-b6d9-fc4dd45603ff',42,NULL,'127.0.0.1','Mozilla/5.0 (Windows NT 6.3; WOW64; rv:28.0) Gecko','2014-04-17 10:04:02','GIFT','2014-04-17 10:54:02','LOGIN','9c7bede93e99b2dd0863');

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
