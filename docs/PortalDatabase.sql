/*
Navicat MySQL Data Transfer

Source Server         : Local
Source Server Version : 50532
Source Host           : 127.0.0.1:3306
Source Database       : portal_e_project

Target Server Type    : MYSQL
Target Server Version : 50532
File Encoding         : 65001

Date: 2014-06-11 22:31:08
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for t_invoice
-- ----------------------------
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
  `payment_id` char(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `payment_method` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `payment_currency` char(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `invoice_type` enum('input','output') COLLATE utf8_unicode_ci NOT NULL,
  `record_status` char(15) COLLATE utf8_unicode_ci DEFAULT 'ACTIVE',
  PRIMARY KEY (`id`),
  KEY `fk_order` (`fk_order`),
  CONSTRAINT `t_invoice_ibfk_1` FOREIGN KEY (`fk_order`) REFERENCES `t_order` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of t_invoice
-- ----------------------------
INSERT INTO `t_invoice` VALUES ('1', '1', '50', '2014-06-11 10:06:29', '2014-06-11 10:06:57', null, null, null, '4a7b8d0caa724ec1f6e12949b', 'PAYMENT_BY_NGANLUONG', null, 'input', null);

-- ----------------------------
-- Table structure for t_invoice_other_cost
-- ----------------------------
DROP TABLE IF EXISTS `t_invoice_other_cost`;
CREATE TABLE `t_invoice_other_cost` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_invoice` int(11) DEFAULT NULL,
  `value` double DEFAULT NULL,
  `comment` text COLLATE utf8_unicode_ci,
  `record_status` char(15) COLLATE utf8_unicode_ci DEFAULT 'ACTIVE',
  PRIMARY KEY (`id`),
  KEY `fk_invoice` (`fk_invoice`),
  CONSTRAINT `t_invoice_other_cost_ibfk_1` FOREIGN KEY (`fk_invoice`) REFERENCES `t_invoice` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of t_invoice_other_cost
-- ----------------------------
INSERT INTO `t_invoice_other_cost` VALUES ('1', '1', null, 'PAYMENT_BY_NGANLUONG', 'ACTIVE');

-- ----------------------------
-- Table structure for t_invoice_product
-- ----------------------------
DROP TABLE IF EXISTS `t_invoice_product`;
CREATE TABLE `t_invoice_product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_invoice` int(11) DEFAULT NULL,
  `fk_product` int(11) DEFAULT NULL,
  `record_status` char(15) COLLATE utf8_unicode_ci DEFAULT 'ACTIVE',
  PRIMARY KEY (`id`),
  KEY `fk_invoice` (`fk_invoice`),
  KEY `fk_product` (`fk_product`),
  CONSTRAINT `t_invoice_product_ibfk_1` FOREIGN KEY (`fk_invoice`) REFERENCES `t_invoice` (`id`),
  CONSTRAINT `t_invoice_product_ibfk_2` FOREIGN KEY (`fk_product`) REFERENCES `t_product` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of t_invoice_product
-- ----------------------------
INSERT INTO `t_invoice_product` VALUES ('1', '1', '1', 'ACTIVE');

-- ----------------------------
-- Table structure for t_invoice_shipping
-- ----------------------------
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
  `record_status` char(15) COLLATE utf8_unicode_ci DEFAULT 'ACTIVE',
  PRIMARY KEY (`id`),
  KEY `t_invoice_shipping_ibfk_1` (`fk_invoice`),
  KEY `fk_user_contact` (`fk_user_contact`),
  CONSTRAINT `t_invoice_shipping_ibfk_1` FOREIGN KEY (`fk_invoice`) REFERENCES `t_invoice` (`id`),
  CONSTRAINT `t_invoice_shipping_ibfk_2` FOREIGN KEY (`fk_user_contact`) REFERENCES `t_user_contact` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of t_invoice_shipping
-- ----------------------------
INSERT INTO `t_invoice_shipping` VALUES ('1', '0', '1', '1', '0000-00-00 00:00:00', 'standard', '10', 'ACTIVE', '2014-06-11 10:06:29', null, null, 'SHIP', 'ACTIVE');

-- ----------------------------
-- Table structure for t_order
-- ----------------------------
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
  `record_status` char(15) COLLATE utf8_unicode_ci DEFAULT 'ACTIVE',
  PRIMARY KEY (`id`),
  KEY `fk_user` (`fk_user`),
  CONSTRAINT `t_order_ibfk_1` FOREIGN KEY (`fk_user`) REFERENCES `t_user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of t_order
-- ----------------------------
INSERT INTO `t_order` VALUES ('1', 'GIFT', '50', '50', '2014-06-11 10:06:29', null, null, null, 'ACTIVE');

-- ----------------------------
-- Table structure for t_order_status
-- ----------------------------
DROP TABLE IF EXISTS `t_order_status`;
CREATE TABLE `t_order_status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_order` int(11) DEFAULT NULL,
  `status` enum('VERIFYING','SHIPPING','DELIVERED','ORDER_PLACED','ORDER_CANCELLED','REJECTED') COLLATE utf8_unicode_ci DEFAULT NULL,
  `updated_user` int(11) DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL,
  `comment` text COLLATE utf8_unicode_ci,
  `record_status` char(15) COLLATE utf8_unicode_ci DEFAULT 'ACTIVE',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of t_order_status
-- ----------------------------
INSERT INTO `t_order_status` VALUES ('1', '1', 'ORDER_PLACED', '50', '2014-06-11 10:06:29', null, 'ACTIVE');
INSERT INTO `t_order_status` VALUES ('2', '1', 'VERIFYING', null, '2014-06-11 10:06:56', null, 'ACTIVE');
INSERT INTO `t_order_status` VALUES ('3', '1', 'VERIFYING', '50', '2014-06-11 10:06:57', null, 'ACTIVE');

-- ----------------------------
-- Table structure for t_payment_temp
-- ----------------------------
DROP TABLE IF EXISTS `t_payment_temp`;
CREATE TABLE `t_payment_temp` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_user` int(11) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `data` text COLLATE utf8_unicode_ci,
  `session_id` char(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ip_address` char(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_agrent` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `processed_date` datetime DEFAULT NULL,
  `cancelled_date` datetime DEFAULT NULL,
  `record_status` char(15) COLLATE utf8_unicode_ci DEFAULT 'ACTIVE',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of t_payment_temp
-- ----------------------------
INSERT INTO `t_payment_temp` VALUES ('1', '5', '2014-06-11 10:06:28', '{\"secretKey\":null,\"orderkey\":\"e5df2b8b4aec4db392e5aa7ed8c7c377\",\"su\":\"GIFT\",\"user\":{\"is_authorized\":true,\"languageKey\":\"VN-VI\",\"currencyKey\":\"VN\",\"id\":\"5\",\"firstname\":\"L\\u00ca \",\"lastname\":\"AN \",\"account\":\"lethanhan.bkaptech@gmail.com\",\"sex\":\"M\",\"DOB\":\"1742-08-21 00:00:00\",\"date_joined\":\"2014-04-29 10:04:54\",\"status\":\"1\",\"last_active\":\"2014-04-29 10:04:54\",\"platform_key\":\"0\",\"user_type\":\"USER\",\"secretKey\":null,\"portal_id\":\"50\",\"sub_id\":\"5\",\"fullname\":\"L\\u00ca  AN \"},\"products\":[{\"id\":\"20\",\"name\":\"Pha l\\u00ea d\\u00e2u\",\"image\":\"http:\\/\\/localhost.com\\/uploads\\/2014\\/06\\/08\\/71a09835536adb714fa57a856c6aea4a.jpg\",\"shortDesc\":\"<p>zxsadas<\\/p>\",\"price\":100000,\"quantity\":4,\"totalPrice\":400000,\"actualPrice\":400000,\"taxes\":[{\"name\":\"VAT\",\"totalTax\":40000}],\"sellerName\":\"Samsung\",\"sellerEmail\":\"admin@samsung.com\",\"sid\":\"samsung\"}],\"shipping\":{\"shippingKey\":\"standard-projecte\",\"shippingDisplayName\":\"standard\",\"shippingPrice\":\"10\"},\"addresses\":{\"shipping\":{\"fullname\":null,\"telephone\":\"AN \",\"streetAddress\":\"AN \",\"cityDistrict\":[null,\"AN \"],\"stateProvince\":[\"101\",\"hanoi\"]}}}', 'bcab201767cd18b247e57214e3517138', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/35.0.1916.114 Safari/537.36', '2014-06-11 10:06:29', null, 'ACTIVE');

-- ----------------------------
-- Table structure for t_product
-- ----------------------------
DROP TABLE IF EXISTS `t_product`;
CREATE TABLE `t_product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sub_id` int(11) NOT NULL,
  `name` varchar(11) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sub_image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `short_description` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `price` double DEFAULT NULL,
  `quantity` double DEFAULT NULL,
  `total_price` double DEFAULT NULL,
  `actual_price` double DEFAULT NULL,
  `seller_id` int(11) NOT NULL,
  `seller_name` text COLLATE utf8_unicode_ci NOT NULL,
  `seller_email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `record_status` char(15) COLLATE utf8_unicode_ci DEFAULT 'ACTIVE',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of t_product
-- ----------------------------
INSERT INTO `t_product` VALUES ('1', '20', 'Pha lê dâu', 'http://localhost.com/uploads/2014/06/08/71a09835536adb714fa57a856c6aea4a.jpg', '<p>zxsadas</p>', '100000', '4', '400000', '400000', '0', 'Samsung', '', 'ACTIVE');

-- ----------------------------
-- Table structure for t_tax
-- ----------------------------
DROP TABLE IF EXISTS `t_tax`;
CREATE TABLE `t_tax` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_product` int(11) DEFAULT NULL,
  `sub_tax_id` int(11) DEFAULT NULL,
  `sub_tax_name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sub_tax_value` double DEFAULT NULL,
  `record_status` char(15) COLLATE utf8_unicode_ci DEFAULT 'ACTIVE',
  PRIMARY KEY (`id`),
  KEY `fk_product` (`fk_product`),
  CONSTRAINT `t_tax_ibfk_1` FOREIGN KEY (`fk_product`) REFERENCES `t_product` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of t_tax
-- ----------------------------
INSERT INTO `t_tax` VALUES ('1', '1', null, 'VAT', '40000', 'ACTIVE');

-- ----------------------------
-- Table structure for t_user
-- ----------------------------
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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of t_user
-- ----------------------------
INSERT INTO `t_user` VALUES ('50', 'LÊ ', 'AN ', 'lethanhan.bkaptech@gmail.com', '123123123', 'M', '1742-08-21 00:00:00', '2014-04-29 10:04:54', '1', '2014-05-23 10:05:23', 'Admin mở lại tài khoản', '2014-04-29 10:04:54', '0', 'ADMIN', 'ACTIVE');
INSERT INTO `t_user` VALUES ('51', 'AnLT', 'Thanh An ', 'lethanhan.2305@gmail.com', '123456789', 'F', '2014-05-07 00:00:00', '2014-05-04 07:05:27', '1', '2014-05-18 02:05:48', 'Admin mở lại tài khoản', '2014-05-04 07:05:27', '0', 'ADMIN', 'ACTIVE');

-- ----------------------------
-- Table structure for t_user_contact
-- ----------------------------
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
  PRIMARY KEY (`id`),
  KEY `fk_user` (`fk_user`),
  CONSTRAINT `t_user_contact_ibfk_2` FOREIGN KEY (`fk_user`) REFERENCES `t_user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of t_user_contact
-- ----------------------------
INSERT INTO `t_user_contact` VALUES ('1', null, '2014-06-11 10:06:29', null, 'AN ', 'AN ', ',AN ', '101,hanoi', null, 'ACTIVE');

-- ----------------------------
-- Table structure for t_user_history
-- ----------------------------
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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of t_user_history
-- ----------------------------
INSERT INTO `t_user_history` VALUES ('0a2d0567-f179-11e3-a7af-a01d48a90f04', '50', null, '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/35.0.1916.114 Safari/537.36', '2014-06-11 09:06:51', 'PORTAL', 'Thay đổi thông tin cá nhân', 'CHANGEINFORMATION', 'bcab201767cd18b247e57214e3517138', '2014-06-11 09:06:51', 'ACTIVE');
INSERT INTO `t_user_history` VALUES ('10ea5ac0-f17a-11e3-a7af-a01d48a90f04', '50', null, '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/35.0.1916.114 Safari/537.36', '2014-06-11 10:06:12', 'GIFT', '2014-06-11 22:07:12', 'LOGIN', '528704b5637500d1f1d9e454129871dc', '2014-06-11 10:06:12', 'ACTIVE');
INSERT INTO `t_user_history` VALUES ('1c50b773-f17a-11e3-a7af-a01d48a90f04', '50', null, '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/35.0.1916.114 Safari/537.36', '2014-06-11 10:06:31', 'GIFT', '2014-06-11 22:07:31', 'LOGIN', '3945b1f8e65ec12980e7e8266f196c2c', '2014-06-11 10:06:31', 'ACTIVE');
INSERT INTO `t_user_history` VALUES ('210df6af-f179-11e3-a7af-a01d48a90f04', '50', null, '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/35.0.1916.114 Safari/537.36', '2014-06-11 10:06:29', 'GIFT', null, 'PAYMENT', 'bcab201767cd18b247e57214e3517138', '2014-06-11 10:06:29', 'ACTIVE');
INSERT INTO `t_user_history` VALUES ('c02cafba-f179-11e3-a7af-a01d48a90f04', '50', null, '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/35.0.1916.114 Safari/537.36', '2014-06-11 10:06:56', 'GIFT', '2014-06-11 22:04:56', 'LOGIN', '373c7674d09f1f8cfa33bf9da8f64f18', '2014-06-11 10:06:56', 'ACTIVE');

-- ----------------------------
-- Table structure for t_user_setting
-- ----------------------------
DROP TABLE IF EXISTS `t_user_setting`;
CREATE TABLE `t_user_setting` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_user` int(11) NOT NULL,
  `setting_key` char(20) COLLATE utf8_unicode_ci NOT NULL,
  `value` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `record_status` char(15) COLLATE utf8_unicode_ci DEFAULT 'ACTIVE',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=165 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of t_user_setting
-- ----------------------------
INSERT INTO `t_user_setting` VALUES ('153', '50', 'isRecivedEmail', 'Y', 'ACTIVE');
INSERT INTO `t_user_setting` VALUES ('154', '50', 'AlternativeEmail', 'lethanhan.bkaptech@gmail.com', 'ACTIVE');
INSERT INTO `t_user_setting` VALUES ('155', '50', 'SQ', '0', 'ACTIVE');
INSERT INTO `t_user_setting` VALUES ('156', '50', 'SA', '123123123', 'ACTIVE');
INSERT INTO `t_user_setting` VALUES ('157', '50', 'LANGUAGE', 'VN-VI', 'ACTIVE');
INSERT INTO `t_user_setting` VALUES ('158', '50', 'CURRENCY', 'VND', 'ACTIVE');
INSERT INTO `t_user_setting` VALUES ('159', '51', 'isRecivedEmail', 'Y', 'ACTIVE');
INSERT INTO `t_user_setting` VALUES ('160', '51', 'AlternativeEmail', 'lethanhan.2305@gmail.com', 'ACTIVE');
INSERT INTO `t_user_setting` VALUES ('161', '51', 'SQ', '0', 'ACTIVE');
INSERT INTO `t_user_setting` VALUES ('162', '51', 'SA', '123123123', 'ACTIVE');
INSERT INTO `t_user_setting` VALUES ('163', '51', 'LANGUAGE', 'EN-US', 'ACTIVE');
INSERT INTO `t_user_setting` VALUES ('164', '51', 'CURRENCY', 'VND', 'ACTIVE');
