/*
Navicat MySQL Data Transfer

Source Server         : Local
Source Server Version : 50532
Source Host           : 127.0.0.1:3306
Source Database       : eproject

Target Server Type    : MYSQL
Target Server Version : 50532
File Encoding         : 65001

Date: 2014-05-31 10:06:55
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for t_category
-- ----------------------------
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

-- ----------------------------
-- Records of t_category
-- ----------------------------
INSERT INTO `t_category` VALUES ('1', 'family', null, '1', '1/', null, '1', '1', '1/', '0');
INSERT INTO `t_category` VALUES ('2', 'kid', null, '2', '2/', null, '1', '1', '2/', '0');
INSERT INTO `t_category` VALUES ('3', 'food', null, '3', '3/', null, '1', '1', '3/', '1');
INSERT INTO `t_category` VALUES ('4', 'gift', null, '4', '4/', null, '1', '0', '4/', '1');
INSERT INTO `t_category` VALUES ('5', 'kitchen', '1', '1', '1/5', null, '1', '0', '1/1', '0');
INSERT INTO `t_category` VALUES ('6', 'scarf_fabric', '1', '2', '1/6', null, '1', '0', '1/2', '0');
INSERT INTO `t_category` VALUES ('7', 'necessities', '1', '3', '1/7', null, '1', '0', '1/3', '0');
INSERT INTO `t_category` VALUES ('8', 'family_other', '1', '4', '1/8', null, '1', '0', '1/4', '0');
INSERT INTO `t_category` VALUES ('9', 'smart_toy', '2', '1', '2/9', null, '1', '0', '2/1', '0');
INSERT INTO `t_category` VALUES ('10', 'diaper', '2', '2', '2/10', null, '1', '0', '2/2', '0');
INSERT INTO `t_category` VALUES ('11', 'kid_accessories', '2', '3', '2/11', null, '1', '0', '2/3', '0');
INSERT INTO `t_category` VALUES ('12', 'fast_food', '3', '1', '3/12', null, '1', '0', '3/1', '0');
INSERT INTO `t_category` VALUES ('13', 'dried_food', '3', '2', '3/13', null, '1', '0', '3/2', '0');
INSERT INTO `t_category` VALUES ('14', 'canned_food', '3', '3', '3/14', null, '1', '0', '3/3', '0');
INSERT INTO `t_category` VALUES ('15', 'drink', '3', '4', '3/15', null, '1', '0', '3/4', '0');
INSERT INTO `t_category` VALUES ('16', 'food_other', '3', '5', '3/16', null, '1', '0', '3/5', '0');
INSERT INTO `t_category` VALUES ('17', 'gift_traditional', '4', '1', '4/17', null, '1', '0', '4/1', '0');
INSERT INTO `t_category` VALUES ('18', 'handmade', '4', '2', '4/18', null, '1', '0', '4/2', '0');

-- ----------------------------
-- Table structure for t_category_attribute
-- ----------------------------
DROP TABLE IF EXISTS `t_category_attribute`;
CREATE TABLE `t_category_attribute` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_attribute_type` int(11) DEFAULT NULL,
  `fk_category` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of t_category_attribute
-- ----------------------------

-- ----------------------------
-- Table structure for t_category_language
-- ----------------------------
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

-- ----------------------------
-- Records of t_category_language
-- ----------------------------
INSERT INTO `t_category_language` VALUES ('1', '1', 'EN-US', 'Family', null, '<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>', '<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>', '<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>');
INSERT INTO `t_category_language` VALUES ('2', '1', 'VN-VI', 'Sản phẩm gia đình', '\r\n', '<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>', '<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>', '<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>');
INSERT INTO `t_category_language` VALUES ('3', '2', 'EN-US', 'Kid', '', '<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>', '<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>', '<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>');
INSERT INTO `t_category_language` VALUES ('4', '2', 'VN-VI', 'Sản phẩm cho trẻ em', '', '<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>', '<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>', '<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>');
INSERT INTO `t_category_language` VALUES ('5', '3', 'EN-US', 'Food', null, '<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>', '<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>', '<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>');
INSERT INTO `t_category_language` VALUES ('6', '3', 'VN-VI', 'Đồ ăn', null, '<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>', '<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>', '<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>');
INSERT INTO `t_category_language` VALUES ('7', '4', 'EN-US', 'Gift', null, '<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>', '<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>', '<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>');
INSERT INTO `t_category_language` VALUES ('8', '4', 'VN-VI', 'Tặng phẩm', null, '<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>', '<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>', '<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>');
INSERT INTO `t_category_language` VALUES ('9', '5', 'EN-US', 'Kitchen', null, '<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>', '<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>', '<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>');
INSERT INTO `t_category_language` VALUES ('10', '5', 'VN-VI', 'Đồ nhà bếp', null, '<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>', '<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>', '<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>');
INSERT INTO `t_category_language` VALUES ('11', '6', 'EN-US', 'Scraf/Fabric', null, '<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>', '<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>', '<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>');
INSERT INTO `t_category_language` VALUES ('12', '6', 'VN-VI', 'Khăn/Vải', null, '<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>', '<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>', '<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>');
INSERT INTO `t_category_language` VALUES ('13', '7', 'EN-US', 'Necessities', null, '<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>', '<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>', '<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>');
INSERT INTO `t_category_language` VALUES ('14', '7', 'VN-VI', 'Đồ dùng sinh hoạt', null, '<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>', '<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>', '<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>');
INSERT INTO `t_category_language` VALUES ('15', '8', 'EN-US', 'Other', null, '<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>', '<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>', '<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>');
INSERT INTO `t_category_language` VALUES ('16', '8', 'VN-VI', 'Sản phẩm khác', null, '<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>', '<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>', '<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>');
INSERT INTO `t_category_language` VALUES ('17', '10', 'EN-US', 'Diaper', null, '<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>', '<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>', '<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>');
INSERT INTO `t_category_language` VALUES ('18', '10', 'VN-VI', 'Tã giấy', null, '<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>', '<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>', '<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>');
INSERT INTO `t_category_language` VALUES ('19', '9', 'EN-US', 'Smart toy', null, '<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>', '<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>', '<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>');
INSERT INTO `t_category_language` VALUES ('20', '9', 'VN-VI', 'Đồ chơi thông minh', null, '<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>', '<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>', '<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>');
INSERT INTO `t_category_language` VALUES ('21', '11', 'EN-US', 'Kid accessories', null, '<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>', '<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>', '<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>');
INSERT INTO `t_category_language` VALUES ('22', '11', 'VN-VI', 'Phụ kiện trẻ em', null, '<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>', '<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>', '<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>');
INSERT INTO `t_category_language` VALUES ('23', '12', 'EN-US', 'Fast food', null, '<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>', '<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>', '<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>');
INSERT INTO `t_category_language` VALUES ('24', '12', 'VN-VI', 'Đồ ăn nhanh', null, '<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>', '<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>', '<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>');
INSERT INTO `t_category_language` VALUES ('25', '13', 'EN-US', 'Dried food', null, '<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>', '<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>', '<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>');
INSERT INTO `t_category_language` VALUES ('26', '13', 'VN-VI', 'Đồ ăn khô', null, '<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>', '<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>', '<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>');
INSERT INTO `t_category_language` VALUES ('27', '14', 'EN-US', 'Canned food', null, '<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>', '<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>', '<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>');
INSERT INTO `t_category_language` VALUES ('28', '14', 'VN-VI', 'Đồ hộp', null, '<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>', '<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>', '<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>');
INSERT INTO `t_category_language` VALUES ('29', '15', 'EN-US', 'Drink', null, '<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>', '<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>', '<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>');
INSERT INTO `t_category_language` VALUES ('30', '15', 'VN-VI', 'Đồ uống', null, '<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>', '<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>', '<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>');
INSERT INTO `t_category_language` VALUES ('31', '16', 'EN-US', 'Other', null, '<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>', '<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>', '<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>');
INSERT INTO `t_category_language` VALUES ('32', '16', 'VN-VI', 'Đồ ăn khác', null, '<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>', '<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>', '<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>');
INSERT INTO `t_category_language` VALUES ('33', '17', 'EN-US', 'Trang phục truyền thống', null, '<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>', '<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>', '<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>');
INSERT INTO `t_category_language` VALUES ('34', '17', 'VN-VI', 'Traditional cloth', null, '<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>', '<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>', '<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>');
INSERT INTO `t_category_language` VALUES ('35', '18', 'EN-US', 'Handmade', null, '<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>', '<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>', '<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>');
INSERT INTO `t_category_language` VALUES ('36', '18', 'VN-VI', 'Đồ thủ công', null, '<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>', '<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>', '<root>\r\n	<img title=\"abc\" src=\"/images/categories/1/slide1.jpg\" href=\"http://google.com\"/>\r\n</root>');

-- ----------------------------
-- Table structure for t_credit_memo
-- ----------------------------
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

-- ----------------------------
-- Records of t_credit_memo
-- ----------------------------

-- ----------------------------
-- Table structure for t_feature_product
-- ----------------------------
DROP TABLE IF EXISTS `t_feature_product`;
CREATE TABLE `t_feature_product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_product` int(11) DEFAULT NULL,
  `is_on_homepage` tinyint(4) DEFAULT '0',
  `sort` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of t_feature_product
-- ----------------------------
INSERT INTO `t_feature_product` VALUES ('1', '1', '1', '1');
INSERT INTO `t_feature_product` VALUES ('2', '2', '1', '2');

-- ----------------------------
-- Table structure for t_file
-- ----------------------------
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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of t_file
-- ----------------------------
INSERT INTO `t_file` VALUES ('1', '1', null, '/uploads/2014/3/27/image4.jpg', '0', '2014-03-27 22:09:19', null, null);
INSERT INTO `t_file` VALUES ('2', '1', null, '/uploads/2014/3/27/image.jpg', '0', '2014-03-27 22:09:19', null, null);
INSERT INTO `t_file` VALUES ('3', '1', null, '/uploads/2014/3/27/image2.jpg', '0', '2014-03-27 22:09:19', null, null);
INSERT INTO `t_file` VALUES ('4', '1', null, '/uploads/2014/3/27/image3.jpg', '0', '2014-03-27 22:09:19', null, null);
INSERT INTO `t_file` VALUES ('5', '1', null, '/uploads/2014/05/20/452e9971ae0fff703dc3279d605c3817.png', '0', '2014-05-20 22:30:55', null, null);
INSERT INTO `t_file` VALUES ('6', '1', null, '/uploads/2014/05/20/ddc50e1773620024c3e0158946a47435.png', '0', '2014-05-20 22:31:33', null, null);
INSERT INTO `t_file` VALUES ('7', '1', null, '/uploads/2014/05/20/4670b74b68432aebf551ad5112644f59.png', '0', '2014-05-20 22:31:54', null, null);
INSERT INTO `t_file` VALUES ('8', '1', null, '/uploads/2014/05/20/c07750dd9fae781cf55970cfdc4a7048.jpg', '0', '2014-05-20 23:37:12', null, null);
INSERT INTO `t_file` VALUES ('9', '1', null, '/uploads/2014/05/20/ae8564fee192da10b00b78cefd09fe00.jpg', '0', '2014-05-20 23:58:15', null, null);
INSERT INTO `t_file` VALUES ('10', '1', null, '/uploads/2014/05/22/46c46554bfc2ffb6e8ce0f6dca210b9a.jpg', '0', '2014-05-22 23:14:04', null, null);

-- ----------------------------
-- Table structure for t_hot
-- ----------------------------
DROP TABLE IF EXISTS `t_hot`;
CREATE TABLE `t_hot` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_product` int(11) DEFAULT NULL,
  `sort` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of t_hot
-- ----------------------------
INSERT INTO `t_hot` VALUES ('7', '14', null);
INSERT INTO `t_hot` VALUES ('8', '15', null);
INSERT INTO `t_hot` VALUES ('9', '20', null);

-- ----------------------------
-- Table structure for t_invoice
-- ----------------------------
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

-- ----------------------------
-- Records of t_invoice
-- ----------------------------

-- ----------------------------
-- Table structure for t_invoice_detail
-- ----------------------------
DROP TABLE IF EXISTS `t_invoice_detail`;
CREATE TABLE `t_invoice_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_invoice` int(11) DEFAULT NULL,
  `fk_product` int(11) DEFAULT NULL,
  `fk_order` int(11) DEFAULT NULL,
  `quantity` double DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of t_invoice_detail
-- ----------------------------

-- ----------------------------
-- Table structure for t_list
-- ----------------------------
DROP TABLE IF EXISTS `t_list`;
CREATE TABLE `t_list` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_listtype` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `codename` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sort` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of t_list
-- ----------------------------
INSERT INTO `t_list` VALUES ('1', '1', 'glass', 'glass', '1');
INSERT INTO `t_list` VALUES ('2', '1', 'pottery', 'pottery', '2');
INSERT INTO `t_list` VALUES ('3', '1', 'wooden', 'wooden', '3');
INSERT INTO `t_list` VALUES ('4', '1', 'plastic', 'plastic', '4');
INSERT INTO `t_list` VALUES ('5', '1', 'other', 'other', '5');
INSERT INTO `t_list` VALUES ('6', '2', 'lover', 'lover', '1');
INSERT INTO `t_list` VALUES ('7', '2', 'parent', 'parent', '2');
INSERT INTO `t_list` VALUES ('8', '2', 'family', 'family', '3');
INSERT INTO `t_list` VALUES ('9', '2', 'friend', 'friend', '4');
INSERT INTO `t_list` VALUES ('10', '2', 'children', 'children', '5');
INSERT INTO `t_list` VALUES ('11', '3', 'birthday', 'birthday', '1');
INSERT INTO `t_list` VALUES ('12', '3', 'new year', 'newyear', '2');
INSERT INTO `t_list` VALUES ('13', '3', 'noel', 'noel', '3');
INSERT INTO `t_list` VALUES ('14', '4', 'USD', 'USD', '1');
INSERT INTO `t_list` VALUES ('15', '4', 'VND', 'VND', '2');
INSERT INTO `t_list` VALUES ('16', '5', 'Vietnam', 'VN', '1');
INSERT INTO `t_list` VALUES ('17', '5', 'US', 'US', '2');
INSERT INTO `t_list` VALUES ('18', '5', 'Korea', 'KR', '3');
INSERT INTO `t_list` VALUES ('19', '6', 'express', 'express', '1');
INSERT INTO `t_list` VALUES ('20', '6', 'in3day', 'in3day', '2');
INSERT INTO `t_list` VALUES ('21', '7', 'cash', 'cash', '1');
INSERT INTO `t_list` VALUES ('22', '7', 'bank transfer', 'transfer', '2');
INSERT INTO `t_list` VALUES ('23', '7', 'bank check', 'check', '3');
INSERT INTO `t_list` VALUES ('24', '8', 'SKU', 'SKU', '1');
INSERT INTO `t_list` VALUES ('25', '8', 'UPC', 'UPC', '2');

-- ----------------------------
-- Table structure for t_listtype
-- ----------------------------
DROP TABLE IF EXISTS `t_listtype`;
CREATE TABLE `t_listtype` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `codename` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` tinyint(4) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of t_listtype
-- ----------------------------
INSERT INTO `t_listtype` VALUES ('1', 'material', 'material', '1');
INSERT INTO `t_listtype` VALUES ('2', 'gift target', 'gift_target', '1');
INSERT INTO `t_listtype` VALUES ('3', 'occasion', 'occasion', '1');
INSERT INTO `t_listtype` VALUES ('4', 'currency', 'currency', '1');
INSERT INTO `t_listtype` VALUES ('5', 'source', 'source', '1');
INSERT INTO `t_listtype` VALUES ('7', 'payment method', 'payment_method', '1');
INSERT INTO `t_listtype` VALUES ('8', 'storage code type', 'storage_code_type', '1');

-- ----------------------------
-- Table structure for t_location
-- ----------------------------
DROP TABLE IF EXISTS `t_location`;
CREATE TABLE `t_location` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `level` enum('province','city') COLLATE utf8_unicode_ci DEFAULT NULL,
  `fk_parent` int(11) DEFAULT NULL,
  `codename` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of t_location
-- ----------------------------
INSERT INTO `t_location` VALUES ('1', 'hanoi', 'province', null, '101');

-- ----------------------------
-- Table structure for t_order
-- ----------------------------
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

-- ----------------------------
-- Records of t_order
-- ----------------------------

-- ----------------------------
-- Table structure for t_order_evidence
-- ----------------------------
DROP TABLE IF EXISTS `t_order_evidence`;
CREATE TABLE `t_order_evidence` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_user` int(11) DEFAULT NULL,
  `checksum` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date_created` datetime DEFAULT NULL,
  `date_expired` datetime DEFAULT NULL,
  `unique_key` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of t_order_evidence
-- ----------------------------
INSERT INTO `t_order_evidence` VALUES ('1', null, '84ccc4745a8f1bb963cc05d28c8597f6', '2014-04-06 22:24:30', '2014-03-09 22:24:00', '1');
INSERT INTO `t_order_evidence` VALUES ('3', null, '84ccc4745a8f1bb963cc05d28c8597f6', '2014-04-06 22:40:03', '2014-04-09 22:40:00', null);
INSERT INTO `t_order_evidence` VALUES ('4', null, '84ccc4745a8f1bb963cc05d28c8597f6', '2014-04-06 22:40:39', '2014-04-09 22:40:00', null);
INSERT INTO `t_order_evidence` VALUES ('5', null, '7607632bc67c439199acc402cd4c802e', '2014-04-19 21:42:55', '2014-04-22 21:42:00', '4be77891125043d8bd657531923d1441');
INSERT INTO `t_order_evidence` VALUES ('6', null, '7607632bc67c439199acc402cd4c802e', '2014-04-19 21:49:16', '2014-04-22 21:49:00', '5ee043daba80f7c99e50b0136825d25f');
INSERT INTO `t_order_evidence` VALUES ('7', null, '7607632bc67c439199acc402cd4c802e', '2014-04-19 21:49:58', '2014-04-22 21:49:00', '546e6c4a24c5ef83c8127edbe0ff0d66');
INSERT INTO `t_order_evidence` VALUES ('8', null, '7607632bc67c439199acc402cd4c802e', '2014-04-19 21:53:19', '2014-04-22 21:53:00', 'e3a78b6b9fb231e3e0bf3f16529ed2c6');
INSERT INTO `t_order_evidence` VALUES ('9', null, '7607632bc67c439199acc402cd4c802e', '2014-04-19 21:53:40', '2014-04-22 21:53:00', '7c8ab24fab47bef56b79073a2f6645dc');
INSERT INTO `t_order_evidence` VALUES ('10', null, '7607632bc67c439199acc402cd4c802e', '2014-04-19 21:53:51', '2014-04-22 21:53:00', '785c68d9ddb3e1a51681e5f6f846f2e9');
INSERT INTO `t_order_evidence` VALUES ('11', null, '7607632bc67c439199acc402cd4c802e', '2014-04-19 21:54:00', '2014-04-22 21:54:00', '048dac3cfc5d83309b26a417c7aab519');
INSERT INTO `t_order_evidence` VALUES ('12', null, '60e50e483bffa68cc32ac655e6213efe', '2014-04-19 21:57:03', '2014-04-22 21:57:00', 'bef5527441ddccade83e6d622b1b11e2');
INSERT INTO `t_order_evidence` VALUES ('13', null, '7ada60191eef25e1b931a491ffd7bcdd', '2014-04-20 14:37:07', '2014-04-23 14:37:00', '1339362c7a8f9d73347feb1865937ab5');
INSERT INTO `t_order_evidence` VALUES ('14', null, '29e83ad0272b828a389ad6cba7b27aa3', '2014-05-12 22:28:32', '2014-05-15 22:28:00', '0ff5cc1180200e6c93f4ac47f181e56b');
INSERT INTO `t_order_evidence` VALUES ('15', null, 'f4762ed99e7f5f5c69cc54530550f70d', '2014-05-12 23:03:39', '2014-05-15 23:03:00', '32a9c780cb80722f8a14e48a3fbd91ee');
INSERT INTO `t_order_evidence` VALUES ('16', null, 'f4762ed99e7f5f5c69cc54530550f70d', '2014-05-12 23:08:56', '2014-05-15 23:08:00', '3bda1a30477647720d198f9625f97fe2');
INSERT INTO `t_order_evidence` VALUES ('17', null, 'ca8dfbd276661dc67fe25ed1b72c4e15', '2014-05-15 12:49:16', '2014-05-18 12:49:00', 'fff07eaee6bd6de274776d9a0d730d52');
INSERT INTO `t_order_evidence` VALUES ('18', null, 'bf29aadc447503bcce0a0ef09e1c591f', '2014-05-17 14:32:01', '2014-05-20 14:32:00', '0e7b2a18d329675005996f07ae0e03cf');
INSERT INTO `t_order_evidence` VALUES ('19', null, '8952c2bb94b48588b6cae68d8b8a6b52', '2014-05-17 21:09:32', '2014-05-20 21:09:00', '7e0be4f3d22ba62457984e921cdfa518');

-- ----------------------------
-- Table structure for t_order_product
-- ----------------------------
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

-- ----------------------------
-- Records of t_order_product
-- ----------------------------

-- ----------------------------
-- Table structure for t_order_status
-- ----------------------------
DROP TABLE IF EXISTS `t_order_status`;
CREATE TABLE `t_order_status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `codename` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sort` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of t_order_status
-- ----------------------------
INSERT INTO `t_order_status` VALUES ('1', 'initiate', 'init', '1');
INSERT INTO `t_order_status` VALUES ('2', 'picking', 'picking', '2');
INSERT INTO `t_order_status` VALUES ('3', 'pay', 'pay', '3');
INSERT INTO `t_order_status` VALUES ('4', 'shipping', 'shipping', '4');
INSERT INTO `t_order_status` VALUES ('5', 'completed', 'completed', '5');

-- ----------------------------
-- Table structure for t_order_status_history
-- ----------------------------
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

-- ----------------------------
-- Records of t_order_status_history
-- ----------------------------

-- ----------------------------
-- Table structure for t_pin
-- ----------------------------
DROP TABLE IF EXISTS `t_pin`;
CREATE TABLE `t_pin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_user` int(11) DEFAULT NULL,
  `fk_product` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `unq_pin` (`fk_user`,`fk_product`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of t_pin
-- ----------------------------
INSERT INTO `t_pin` VALUES ('11', '42', '1');

-- ----------------------------
-- Table structure for t_privilege
-- ----------------------------
DROP TABLE IF EXISTS `t_privilege`;
CREATE TABLE `t_privilege` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_instance` int(11) DEFAULT NULL,
  `type` enum('user','role') COLLATE utf8_unicode_ci DEFAULT NULL,
  `privilige` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of t_privilege
-- ----------------------------

-- ----------------------------
-- Table structure for t_product
-- ----------------------------
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
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of t_product
-- ----------------------------
INSERT INTO `t_product` VALUES ('14', '5', '1', null, '0', '0', '2014-05-19 00:34:13', '0', '0');
INSERT INTO `t_product` VALUES ('15', '4', '1', null, '0', '0', '2014-05-20 23:57:16', '0', '1');
INSERT INTO `t_product` VALUES ('20', '5', '1', null, '0', '0', '2014-05-19 00:34:13', '0', '0');

-- ----------------------------
-- Table structure for t_product_attribute
-- ----------------------------
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
) ENGINE=InnoDB AUTO_INCREMENT=333 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of t_product_attribute
-- ----------------------------
INSERT INTO `t_product_attribute` VALUES ('304', '14', '1', null, null, null, 'VN-VI', 'Pha lê dâu');
INSERT INTO `t_product_attribute` VALUES ('305', '14', '20', null, '24', null, null, null);
INSERT INTO `t_product_attribute` VALUES ('306', '14', '18', null, null, null, null, 'abc');
INSERT INTO `t_product_attribute` VALUES ('307', '14', '2', null, null, '<p>zxsadas</p>', 'VN-VI', null);
INSERT INTO `t_product_attribute` VALUES ('308', '14', '11', '100000', null, null, null, null);
INSERT INTO `t_product_attribute` VALUES ('309', '14', '21', null, null, null, null, 'eng');
INSERT INTO `t_product_attribute` VALUES ('310', '14', '22', null, null, 'ddkffk', null, null);
INSERT INTO `t_product_attribute` VALUES ('311', '14', '23', null, null, 'sdkdkkd', null, null);
INSERT INTO `t_product_attribute` VALUES ('312', '15', '1', null, null, null, 'VN-VI', 'def');
INSERT INTO `t_product_attribute` VALUES ('313', '15', '20', null, '24', null, null, null);
INSERT INTO `t_product_attribute` VALUES ('314', '15', '18', null, null, null, null, 'qwewqe');
INSERT INTO `t_product_attribute` VALUES ('315', '15', '2', null, null, '<p>sdasda</p>', 'VN-VI', null);
INSERT INTO `t_product_attribute` VALUES ('316', '15', '11', '60000', null, null, null, null);
INSERT INTO `t_product_attribute` VALUES ('317', '15', '21', null, null, null, null, 'ssa');
INSERT INTO `t_product_attribute` VALUES ('318', '15', '22', null, null, 'das', null, null);
INSERT INTO `t_product_attribute` VALUES ('319', '15', '23', null, null, 'dasd', null, null);
INSERT INTO `t_product_attribute` VALUES ('320', '14', '1', null, null, null, 'EN-US', 'Strawberry');
INSERT INTO `t_product_attribute` VALUES ('322', '14', '2', null, null, '<p>eng</p>', 'EN-US', null);
INSERT INTO `t_product_attribute` VALUES ('323', '20', '1', null, null, null, 'VN-VI', 'Pha lê dâu');
INSERT INTO `t_product_attribute` VALUES ('324', '20', '20', null, '24', null, null, null);
INSERT INTO `t_product_attribute` VALUES ('325', '20', '18', null, null, null, null, 'abc');
INSERT INTO `t_product_attribute` VALUES ('326', '20', '2', null, null, '<p>zxsadas</p>', 'VN-VI', null);
INSERT INTO `t_product_attribute` VALUES ('327', '20', '11', '100000', null, null, null, null);
INSERT INTO `t_product_attribute` VALUES ('328', '20', '21', null, null, null, null, 'eng');
INSERT INTO `t_product_attribute` VALUES ('329', '20', '22', null, null, 'ddkffk', null, null);
INSERT INTO `t_product_attribute` VALUES ('330', '20', '23', null, null, 'sdkdkkd', null, null);
INSERT INTO `t_product_attribute` VALUES ('331', '20', '1', null, null, null, 'EN-US', 'Strawberry 2');
INSERT INTO `t_product_attribute` VALUES ('332', '20', '2', null, null, '<p>eng</p>', 'EN-US', null);

-- ----------------------------
-- Table structure for t_product_attribute_type
-- ----------------------------
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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of t_product_attribute_type
-- ----------------------------
INSERT INTO `t_product_attribute_type` VALUES ('1', 'name', 'varchar', null, '1', '0', '0', null);
INSERT INTO `t_product_attribute_type` VALUES ('2', 'description', 'text', null, '1', '0', '0', null);
INSERT INTO `t_product_attribute_type` VALUES ('3', 'tag', 'varchar', null, '1', '1', '0', null);
INSERT INTO `t_product_attribute_type` VALUES ('6', 'banner_image', 'text', null, '0', '0', '0', null);
INSERT INTO `t_product_attribute_type` VALUES ('7', 'material', 'enum', '1', '0', '1', '0', null);
INSERT INTO `t_product_attribute_type` VALUES ('8', 'gift_target', 'enum', '2', '0', '1', '0', null);
INSERT INTO `t_product_attribute_type` VALUES ('9', 'category', 'number', null, '0', '0', '0', null);
INSERT INTO `t_product_attribute_type` VALUES ('10', 'occasion', 'enum', '3', '0', '1', '0', null);
INSERT INTO `t_product_attribute_type` VALUES ('11', 'price', 'number', null, '0', '0', '0', null);
INSERT INTO `t_product_attribute_type` VALUES ('13', 'quantity', 'number', null, '0', '0', '0', null);
INSERT INTO `t_product_attribute_type` VALUES ('14', 'weight', 'number', null, '0', '0', '0', null);
INSERT INTO `t_product_attribute_type` VALUES ('15', 'source', 'enum', null, '0', '0', '0', null);
INSERT INTO `t_product_attribute_type` VALUES ('16', 'shipping_method', 'enum', '6', '0', '1', '0', null);
INSERT INTO `t_product_attribute_type` VALUES ('17', 'payment_method', 'enum', '7', '0', '1', '0', null);
INSERT INTO `t_product_attribute_type` VALUES ('18', 'storage_code', 'varchar', null, '0', '0', '0', null);
INSERT INTO `t_product_attribute_type` VALUES ('19', 'sales', 'number', null, '0', '0', '0', null);
INSERT INTO `t_product_attribute_type` VALUES ('20', 'storage_code_type', 'enum', '8', '0', '0', '0', null);
INSERT INTO `t_product_attribute_type` VALUES ('21', 'meta_title', 'varchar', null, '0', '0', '0', null);
INSERT INTO `t_product_attribute_type` VALUES ('22', 'meta_keywords', 'text', null, '0', '0', '0', null);
INSERT INTO `t_product_attribute_type` VALUES ('23', 'meta_description', 'text', null, '0', '0', '0', null);

-- ----------------------------
-- Table structure for t_product_comment
-- ----------------------------
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

-- ----------------------------
-- Records of t_product_comment
-- ----------------------------

-- ----------------------------
-- Table structure for t_product_image
-- ----------------------------
DROP TABLE IF EXISTS `t_product_image`;
CREATE TABLE `t_product_image` (
  `fk_product` int(11) NOT NULL DEFAULT '0',
  `fk_file` int(11) NOT NULL DEFAULT '0',
  `sort` tinyint(4) DEFAULT NULL,
  `thumbnail` tinyint(4) DEFAULT '0',
  `base_image` tinyint(4) DEFAULT '1',
  `small_image` tinyint(4) DEFAULT '0',
  `main_image` tinyint(4) DEFAULT '0',
  PRIMARY KEY (`fk_product`,`fk_file`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of t_product_image
-- ----------------------------
INSERT INTO `t_product_image` VALUES ('1', '1', null, '1', '1', '0', '1');
INSERT INTO `t_product_image` VALUES ('2', '1', null, '1', '1', '0', '1');
INSERT INTO `t_product_image` VALUES ('3', '1', null, '1', '1', '0', '1');
INSERT INTO `t_product_image` VALUES ('4', '1', null, '1', '1', '0', '1');
INSERT INTO `t_product_image` VALUES ('5', '1', null, '1', '1', '0', '1');
INSERT INTO `t_product_image` VALUES ('6', '1', null, '1', '1', '0', '1');
INSERT INTO `t_product_image` VALUES ('7', '1', null, '1', '1', '0', '1');
INSERT INTO `t_product_image` VALUES ('8', '1', null, '1', '1', '0', '1');
INSERT INTO `t_product_image` VALUES ('9', '1', null, '1', '1', '0', '1');
INSERT INTO `t_product_image` VALUES ('10', '1', null, '1', '1', '0', '1');
INSERT INTO `t_product_image` VALUES ('11', '1', null, '1', '1', '0', '1');
INSERT INTO `t_product_image` VALUES ('12', '1', null, '1', '1', '0', '1');
INSERT INTO `t_product_image` VALUES ('14', '7', '2', '1', '1', '1', '1');
INSERT INTO `t_product_image` VALUES ('14', '8', '0', '0', '1', '1', '0');
INSERT INTO `t_product_image` VALUES ('15', '9', '0', '1', '1', '1', '0');
INSERT INTO `t_product_image` VALUES ('20', '10', '0', '1', '1', '1', '0');

-- ----------------------------
-- Table structure for t_product_tax
-- ----------------------------
DROP TABLE IF EXISTS `t_product_tax`;
CREATE TABLE `t_product_tax` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_product` int(11) DEFAULT NULL,
  `fk_tax` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of t_product_tax
-- ----------------------------
INSERT INTO `t_product_tax` VALUES ('15', '14', '1');
INSERT INTO `t_product_tax` VALUES ('16', '15', '1');
INSERT INTO `t_product_tax` VALUES ('17', '20', '1');

-- ----------------------------
-- Table structure for t_product_view
-- ----------------------------
DROP TABLE IF EXISTS `t_product_view`;
CREATE TABLE `t_product_view` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_product` int(11) DEFAULT NULL,
  `fk_user` int(11) DEFAULT NULL,
  `count_view` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of t_product_view
-- ----------------------------
INSERT INTO `t_product_view` VALUES ('1', '2', '0', '44');
INSERT INTO `t_product_view` VALUES ('2', '1', '0', '13');
INSERT INTO `t_product_view` VALUES ('3', '3', '0', '9');
INSERT INTO `t_product_view` VALUES ('4', '4', '0', '5');
INSERT INTO `t_product_view` VALUES ('5', '5', '0', '4');
INSERT INTO `t_product_view` VALUES ('6', '10', '0', '1');
INSERT INTO `t_product_view` VALUES ('7', '8', '0', '1');
INSERT INTO `t_product_view` VALUES ('8', '1', '1', '1');
INSERT INTO `t_product_view` VALUES ('9', '14', '1', '1');
INSERT INTO `t_product_view` VALUES ('10', '15', '1', '2');

-- ----------------------------
-- Table structure for t_rating
-- ----------------------------
DROP TABLE IF EXISTS `t_rating`;
CREATE TABLE `t_rating` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_user` int(11) DEFAULT NULL,
  `fk_product` int(11) DEFAULT NULL,
  `rate` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of t_rating
-- ----------------------------

-- ----------------------------
-- Table structure for t_relationship
-- ----------------------------
DROP TABLE IF EXISTS `t_relationship`;
CREATE TABLE `t_relationship` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_user1` int(11) DEFAULT NULL,
  `fk_user2` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of t_relationship
-- ----------------------------

-- ----------------------------
-- Table structure for t_retailer
-- ----------------------------
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

-- ----------------------------
-- Records of t_retailer
-- ----------------------------

-- ----------------------------
-- Table structure for t_retailer_category
-- ----------------------------
DROP TABLE IF EXISTS `t_retailer_category`;
CREATE TABLE `t_retailer_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_retailer` int(11) DEFAULT NULL,
  `fk_category` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of t_retailer_category
-- ----------------------------

-- ----------------------------
-- Table structure for t_role
-- ----------------------------
DROP TABLE IF EXISTS `t_role`;
CREATE TABLE `t_role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `codename` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of t_role
-- ----------------------------
INSERT INTO `t_role` VALUES ('1', 'Admin', 'admin');
INSERT INTO `t_role` VALUES ('2', 'Customer', 'customer');
INSERT INTO `t_role` VALUES ('3', 'Guest', 'guest');
INSERT INTO `t_role` VALUES ('4', 'Retailer', 'retailer');

-- ----------------------------
-- Table structure for t_section
-- ----------------------------
DROP TABLE IF EXISTS `t_section`;
CREATE TABLE `t_section` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `display_image` text COLLATE utf8_unicode_ci,
  `display_image_href` text COLLATE utf8_unicode_ci,
  `display_image_title` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of t_section
-- ----------------------------
INSERT INTO `t_section` VALUES ('1', '/images/child-slide-item-demo.png', '#', 'title');

-- ----------------------------
-- Table structure for t_section_language
-- ----------------------------
DROP TABLE IF EXISTS `t_section_language`;
CREATE TABLE `t_section_language` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `language` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `fk_section` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of t_section_language
-- ----------------------------
INSERT INTO `t_section_language` VALUES ('1', 'EN-US', 'Shopping mall', 'shopping mall description', '1');
INSERT INTO `t_section_language` VALUES ('2', 'VN-VI', 'Mua sắm', 'mô ta cho mua sam', '1');

-- ----------------------------
-- Table structure for t_section_product
-- ----------------------------
DROP TABLE IF EXISTS `t_section_product`;
CREATE TABLE `t_section_product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_section` int(11) DEFAULT NULL,
  `fk_product` int(11) DEFAULT NULL,
  `sort` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of t_section_product
-- ----------------------------
INSERT INTO `t_section_product` VALUES ('1', '1', '4', '1');
INSERT INTO `t_section_product` VALUES ('2', '1', '5', '2');
INSERT INTO `t_section_product` VALUES ('3', '1', '6', '3');
INSERT INTO `t_section_product` VALUES ('4', '1', '7', '4');
INSERT INTO `t_section_product` VALUES ('5', '1', '8', '5');
INSERT INTO `t_section_product` VALUES ('6', '1', '9', '6');

-- ----------------------------
-- Table structure for t_seller
-- ----------------------------
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

-- ----------------------------
-- Records of t_seller
-- ----------------------------
INSERT INTO `t_seller` VALUES ('1', 'Samsung', null, null, null, null, '1', null, null, '1', 'samsung');

-- ----------------------------
-- Table structure for t_seller_category
-- ----------------------------
DROP TABLE IF EXISTS `t_seller_category`;
CREATE TABLE `t_seller_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_seller` int(11) DEFAULT NULL,
  `fk_category` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of t_seller_category
-- ----------------------------

-- ----------------------------
-- Table structure for t_shipment
-- ----------------------------
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

-- ----------------------------
-- Records of t_shipment
-- ----------------------------

-- ----------------------------
-- Table structure for t_shipment_detail
-- ----------------------------
DROP TABLE IF EXISTS `t_shipment_detail`;
CREATE TABLE `t_shipment_detail` (
  `id` int(11) NOT NULL,
  `fk_order` int(11) DEFAULT NULL,
  `fk_product` int(11) DEFAULT NULL,
  `quantity` double DEFAULT NULL,
  `fk_shipment` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of t_shipment_detail
-- ----------------------------

-- ----------------------------
-- Table structure for t_shipping_location
-- ----------------------------
DROP TABLE IF EXISTS `t_shipping_location`;
CREATE TABLE `t_shipping_location` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_shipping_method` int(11) DEFAULT NULL,
  `fk_location` int(11) DEFAULT NULL,
  `price` double DEFAULT NULL,
  `price_currency` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of t_shipping_location
-- ----------------------------
INSERT INTO `t_shipping_location` VALUES ('1', '1', '1', '10', 'VND');

-- ----------------------------
-- Table structure for t_shipping_method
-- ----------------------------
DROP TABLE IF EXISTS `t_shipping_method`;
CREATE TABLE `t_shipping_method` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `codename` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `min_bday` tinyint(4) DEFAULT NULL,
  `max_bday` tinyint(4) DEFAULT NULL,
  `sort` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of t_shipping_method
-- ----------------------------
INSERT INTO `t_shipping_method` VALUES ('1', 'standard', '1', '3', null);
INSERT INTO `t_shipping_method` VALUES ('2', 'premium', '0', '1', null);
INSERT INTO `t_shipping_method` VALUES ('3', 'express', '0', '0', null);

-- ----------------------------
-- Table structure for t_tax
-- ----------------------------
DROP TABLE IF EXISTS `t_tax`;
CREATE TABLE `t_tax` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_seller` int(11) DEFAULT NULL,
  `cost_percent` double DEFAULT NULL,
  `cost_fixed` double DEFAULT NULL,
  `codename` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of t_tax
-- ----------------------------
INSERT INTO `t_tax` VALUES ('1', '1', '0.1', '0', 'VAT');

-- ----------------------------
-- Table structure for t_tax_language
-- ----------------------------
DROP TABLE IF EXISTS `t_tax_language`;
CREATE TABLE `t_tax_language` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_tax` int(11) DEFAULT NULL,
  `language` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of t_tax_language
-- ----------------------------
INSERT INTO `t_tax_language` VALUES ('1', '1', 'VN-VI', 'VAT');
INSERT INTO `t_tax_language` VALUES ('2', '1', 'EN-US', 'VAT');

-- ----------------------------
-- Table structure for t_user
-- ----------------------------
DROP TABLE IF EXISTS `t_user`;
CREATE TABLE `t_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `portal_id` int(11) NOT NULL,
  `platform_key` tinyint(4) NOT NULL DEFAULT '0',
  `is_admin` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of t_user
-- ----------------------------
INSERT INTO `t_user` VALUES ('1', '0', '0', 'USER');
INSERT INTO `t_user` VALUES ('2', '0', '0', 'USER');
INSERT INTO `t_user` VALUES ('3', '0', '0', 'USER');
INSERT INTO `t_user` VALUES ('4', '0', '0', '');

-- ----------------------------
-- Table structure for t_user_address
-- ----------------------------
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

-- ----------------------------
-- Records of t_user_address
-- ----------------------------
INSERT INTO `t_user_address` VALUES ('1', '2', null, null, '1', null, null, '12 Wall st\r\n', '0', 'America', null, null, '012347888', null, null, null, '0');

-- ----------------------------
-- Table structure for t_user_role
-- ----------------------------
DROP TABLE IF EXISTS `t_user_role`;
CREATE TABLE `t_user_role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_user` int(11) DEFAULT NULL,
  `fk_role` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of t_user_role
-- ----------------------------
INSERT INTO `t_user_role` VALUES ('1', '1', '1');
INSERT INTO `t_user_role` VALUES ('2', '2', '2');
INSERT INTO `t_user_role` VALUES ('3', '3', '4');

-- ----------------------------
-- Table structure for t_wishlist
-- ----------------------------
DROP TABLE IF EXISTS `t_wishlist`;
CREATE TABLE `t_wishlist` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_customer` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `remind_date` datetime DEFAULT NULL,
  `note` text COLLATE utf8_unicode_ci,
  `date_created` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of t_wishlist
-- ----------------------------
INSERT INTO `t_wishlist` VALUES ('10', '42', 'main', null, null, '2014-04-08 23:21:45');
INSERT INTO `t_wishlist` VALUES ('11', null, 'main', null, null, '2014-05-03 16:59:55');
INSERT INTO `t_wishlist` VALUES ('12', null, 'main', null, null, '2014-05-03 17:00:35');
INSERT INTO `t_wishlist` VALUES ('13', null, 'main', null, null, '2014-05-03 17:00:45');
INSERT INTO `t_wishlist` VALUES ('14', null, 'main', null, null, '2014-05-03 17:01:20');
INSERT INTO `t_wishlist` VALUES ('15', null, 'main', null, null, '2014-05-03 17:03:30');
INSERT INTO `t_wishlist` VALUES ('16', null, 'main', null, null, '2014-05-03 17:05:01');
INSERT INTO `t_wishlist` VALUES ('17', null, 'main', null, null, '2014-05-03 17:06:28');
INSERT INTO `t_wishlist` VALUES ('18', null, 'main', null, null, '2014-05-03 17:06:29');
INSERT INTO `t_wishlist` VALUES ('19', null, 'main', null, null, '2014-05-16 23:40:18');
INSERT INTO `t_wishlist` VALUES ('20', null, 'main', null, null, '2014-05-16 23:40:18');

-- ----------------------------
-- Table structure for t_wishlist_detail
-- ----------------------------
DROP TABLE IF EXISTS `t_wishlist_detail`;
CREATE TABLE `t_wishlist_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_wishlist` int(11) DEFAULT NULL,
  `type` enum('product','note','link') COLLATE utf8_unicode_ci DEFAULT NULL,
  `note` text COLLATE utf8_unicode_ci,
  `fk_product` int(11) DEFAULT NULL,
  `status` tinyint(4) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of t_wishlist_detail
-- ----------------------------
INSERT INTO `t_wishlist_detail` VALUES ('9', '6', null, null, '1', '1');
INSERT INTO `t_wishlist_detail` VALUES ('10', '10', null, null, '1', '1');
INSERT INTO `t_wishlist_detail` VALUES ('11', '10', null, null, '2', '1');
INSERT INTO `t_wishlist_detail` VALUES ('12', '10', null, null, '4', '1');
