/*
SQLyog Enterprise - MySQL GUI v8.12 
MySQL - 5.5.32 : Database - portal_e_project
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

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
  `uid` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fk_customer` int(11) DEFAULT NULL,
  `subtotal` double DEFAULT NULL,
  `payment_currency` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `payment_method` enum('cash') COLLATE utf8_unicode_ci DEFAULT NULL,
  `email_status` tinyint(4) DEFAULT NULL,
  `fk_order_status_history` int(11) DEFAULT NULL,
  `comment` text COLLATE utf8_unicode_ci,
  `bonus` double DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `t_order` */

/*Table structure for table `t_order_product` */

DROP TABLE IF EXISTS `t_order_product`;

CREATE TABLE `t_order_product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_order` int(11) DEFAULT NULL,
  `orginal_price` double DEFAULT NULL,
  `price` double DEFAULT NULL,
  `quantity` double DEFAULT NULL,
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

insert  into `t_user_history`(`id`,`fk_user`,`secret_key`,`client_ip`,`user_agrent`,`last_activity`,`sub_system_name`,`description`,`action_name`,`session_id`) values ('656310ed-bc19-11e3-80cb-f82fa8c904ca',43,NULL,'127.0.0.1','','2014-04-04 11:04:41','PORTAL','Thay đổi mật khẩu','CHANGEPASS','1373fd7f894351c4e6b7'),('7e946e46-bc19-11e3-80cb-f82fa8c904ca',43,NULL,'127.0.0.1','','2014-04-04 11:04:23','PORTAL','Reset mật khẩu','RESETPASS','1373fd7f894351c4e6b7'),('83574396-bcc5-11e3-a78d-f82fa8c904ca',42,NULL,'127.0.0.1','','2014-04-05 08:04:44','PORTAL','Thay đổi thông tin cá nhân','CHANGEINFORMATION','71b25cd75af2f2995d77'),('92ec7ebd-bcc5-11e3-a78d-f82fa8c904ca',42,NULL,'127.0.0.1','','2014-04-05 08:04:11','PORTAL','Thay đổi thông tin cá nhân','CHANGEINFORMATION','71b25cd75af2f2995d77'),('9d499b69-bc19-11e3-80cb-f82fa8c904ca',43,NULL,'127.0.0.1','','2014-04-04 11:04:15','PORTAL','Reset mật khẩu','RESETPASS','fc8ec855ba5469f948f4'),('a6844376-bc19-11e3-80cb-f82fa8c904ca',43,NULL,'127.0.0.1','','2014-04-04 11:04:30','PORTAL','Reset mật khẩu','RESETPASS','fc8ec855ba5469f948f4'),('bba440f5-bcc6-11e3-a78d-f82fa8c904ca',42,NULL,'127.0.0.1','','2014-04-05 08:04:28','PORTAL','Thay đổi thông tin cá nhân','CHANGEINFORMATION','7f4f5fe9ed0edd288f2c'),('bc157714-bc19-11e3-80cb-f82fa8c904ca',43,NULL,'127.0.0.1','','2014-04-04 11:04:06','PORTAL','Thay đổi mật khẩu','CHANGEPASS','fc8ec855ba5469f948f4'),('c1f0ebce-bcc6-11e3-a78d-f82fa8c904ca',42,NULL,'127.0.0.1','','2014-04-05 08:04:39','PORTAL','Thay đổi thông tin cá nhân','CHANGEINFORMATION','7f4f5fe9ed0edd288f2c'),('c5faa980-bc19-11e3-80cb-f82fa8c904ca',43,NULL,'127.0.0.1','','2014-04-04 11:04:23','PORTAL','Reset mật khẩu','RESETPASS','5dd91e86d1e8fa881b52'),('df1e9405-bc19-11e3-80cb-f82fa8c904ca',43,NULL,'127.0.0.1','','2014-04-04 11:04:05','PORTAL','Thay đổi mật khẩu','CHANGEPASS','5dd91e86d1e8fa881b52');

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
