-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 06, 2014 at 04:06 AM
-- Server version: 5.5.32
-- PHP Version: 5.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `portal_e_project`
--
CREATE DATABASE IF NOT EXISTS `portal_e_project` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `portal_e_project`;

-- --------------------------------------------------------

--
-- Table structure for table `t_invoice`
--

CREATE TABLE IF NOT EXISTS `t_invoice` (
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `t_invoice_detail`
--

CREATE TABLE IF NOT EXISTS `t_invoice_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_invoice` int(11) DEFAULT NULL,
  `fk_order` int(11) DEFAULT NULL,
  `quantity` double DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `t_order`
--

CREATE TABLE IF NOT EXISTS `t_order` (
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `t_order_product`
--

CREATE TABLE IF NOT EXISTS `t_order_product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_order` int(11) DEFAULT NULL,
  `orginal_price` double DEFAULT NULL,
  `price` double DEFAULT NULL,
  `quantity` double DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `t_order_status`
--

CREATE TABLE IF NOT EXISTS `t_order_status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `codename` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sort` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `t_order_status`
--

INSERT INTO `t_order_status` (`id`, `name`, `codename`, `sort`) VALUES
(1, 'initiate', 'init', 1),
(2, 'picking', 'picking', 2),
(3, 'pay', 'pay', 3),
(4, 'shipping', 'shipping', 4),
(5, 'completed', 'completed', 5);

-- --------------------------------------------------------

--
-- Table structure for table `t_order_status_history`
--

CREATE TABLE IF NOT EXISTS `t_order_status_history` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_order` int(11) DEFAULT NULL,
  `fk_status` int(11) DEFAULT NULL,
  `date_happened` datetime DEFAULT NULL,
  `fk_creator` int(11) DEFAULT NULL,
  `date_created` datetime DEFAULT NULL,
  `is_mail_sent` tinyint(4) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `t_user`
--

CREATE TABLE IF NOT EXISTS `t_user` (
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=45 ;

--
-- Dumping data for table `t_user`
--

INSERT INTO `t_user` (`id`, `firstname`, `lastname`, `account`, `password`, `sex`, `DOB`, `date_joined`, `status`, `status_date`, `status_reason`, `last_active`, `platform_key`) VALUES
(42, 'Lê Thanh An ', 'an ', 'lethanhan.bkaptech@gmail.com', '123123123', 'F', '1990-05-23 00:00:00', '2014-04-02 11:04:48', 0, '2014-04-02 11:04:48', 'Tạo mới tài khoản', '2014-04-02 11:04:48', 0),
(43, 'Le Thanh ', 'an ', 'lethanhan.bkaptech@gmail.com', '123123123', 'M', '0000-00-00 00:00:00', '2014-04-02 11:04:31', 0, '2014-04-02 11:04:31', 'Tạo mới tài khoản', '2014-04-02 11:04:31', 0),
(44, 'Le Thanh ', 'an ', 'lethanhan.bkaptech@gmail.com', '123123123', 'M', '0000-00-00 00:00:00', '2014-04-02 11:04:22', 1, '0000-00-00 00:00:00', 'Thực hiện việc active user', '2014-04-02 11:04:22', 0);

-- --------------------------------------------------------

--
-- Table structure for table `t_user_contact`
--

CREATE TABLE IF NOT EXISTS `t_user_contact` (
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `t_user_contact`
--

INSERT INTO `t_user_contact` (`id`, `fk_user`, `date_created`, `date_used`, `count_used`, `prefix`, `firstname`, `middlename`, `lastname`, `suffix`, `company`, `street_address`, `city`, `country`, `state_province`, `zip_postal_code`, `telephone`, `fax`, `vat_number`) VALUES
(1, 2, NULL, NULL, 1, 'Mr', 'Adrew', NULL, 'Kingsley', NULL, NULL, '12 Wall st\r\n', 'New york', 'America', NULL, NULL, '012347888', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `t_user_history`
--

CREATE TABLE IF NOT EXISTS `t_user_history` (
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

--
-- Dumping data for table `t_user_history`
--

INSERT INTO `t_user_history` (`id`, `fk_user`, `secret_key`, `client_ip`, `user_agrent`, `last_activity`, `sub_system_name`, `description`, `action_name`, `session_id`) VALUES
('656310ed-bc19-11e3-80cb-f82fa8c904ca', 43, NULL, '127.0.0.1', '', '2014-04-04 11:04:41', 'PORTAL', 'Thay đổi mật khẩu', 'CHANGEPASS', '1373fd7f894351c4e6b7'),
('7e946e46-bc19-11e3-80cb-f82fa8c904ca', 43, NULL, '127.0.0.1', '', '2014-04-04 11:04:23', 'PORTAL', 'Reset mật khẩu', 'RESETPASS', '1373fd7f894351c4e6b7'),
('83574396-bcc5-11e3-a78d-f82fa8c904ca', 42, NULL, '127.0.0.1', '', '2014-04-05 08:04:44', 'PORTAL', 'Thay đổi thông tin cá nhân', 'CHANGEINFORMATION', '71b25cd75af2f2995d77'),
('92ec7ebd-bcc5-11e3-a78d-f82fa8c904ca', 42, NULL, '127.0.0.1', '', '2014-04-05 08:04:11', 'PORTAL', 'Thay đổi thông tin cá nhân', 'CHANGEINFORMATION', '71b25cd75af2f2995d77'),
('9d499b69-bc19-11e3-80cb-f82fa8c904ca', 43, NULL, '127.0.0.1', '', '2014-04-04 11:04:15', 'PORTAL', 'Reset mật khẩu', 'RESETPASS', 'fc8ec855ba5469f948f4'),
('a6844376-bc19-11e3-80cb-f82fa8c904ca', 43, NULL, '127.0.0.1', '', '2014-04-04 11:04:30', 'PORTAL', 'Reset mật khẩu', 'RESETPASS', 'fc8ec855ba5469f948f4'),
('bba440f5-bcc6-11e3-a78d-f82fa8c904ca', 42, NULL, '127.0.0.1', '', '2014-04-05 08:04:28', 'PORTAL', 'Thay đổi thông tin cá nhân', 'CHANGEINFORMATION', '7f4f5fe9ed0edd288f2c'),
('bc157714-bc19-11e3-80cb-f82fa8c904ca', 43, NULL, '127.0.0.1', '', '2014-04-04 11:04:06', 'PORTAL', 'Thay đổi mật khẩu', 'CHANGEPASS', 'fc8ec855ba5469f948f4'),
('c1f0ebce-bcc6-11e3-a78d-f82fa8c904ca', 42, NULL, '127.0.0.1', '', '2014-04-05 08:04:39', 'PORTAL', 'Thay đổi thông tin cá nhân', 'CHANGEINFORMATION', '7f4f5fe9ed0edd288f2c'),
('c5faa980-bc19-11e3-80cb-f82fa8c904ca', 43, NULL, '127.0.0.1', '', '2014-04-04 11:04:23', 'PORTAL', 'Reset mật khẩu', 'RESETPASS', '5dd91e86d1e8fa881b52'),
('df1e9405-bc19-11e3-80cb-f82fa8c904ca', 43, NULL, '127.0.0.1', '', '2014-04-04 11:04:05', 'PORTAL', 'Thay đổi mật khẩu', 'CHANGEPASS', '5dd91e86d1e8fa881b52');

-- --------------------------------------------------------

--
-- Table structure for table `t_user_setting`
--

CREATE TABLE IF NOT EXISTS `t_user_setting` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_user` int(11) NOT NULL,
  `setting_key` char(20) COLLATE utf8_unicode_ci NOT NULL,
  `value` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=129 ;

--
-- Dumping data for table `t_user_setting`
--

INSERT INTO `t_user_setting` (`id`, `fk_user`, `setting_key`, `value`) VALUES
(113, 41, 'isRecivedEmail', 'Y'),
(114, 41, 'AlternativeEmail', 'lethanhan.bkaptech@gmail.com'),
(115, 41, 'SQ', ''),
(116, 41, 'SA', ''),
(117, 42, 'isRecivedEmail', 'Y'),
(118, 42, 'AlternativeEmail', 'lethanhan.bkaptech@gmail.com'),
(119, 42, 'SQ', '0'),
(120, 42, 'SA', 'asd'),
(121, 43, 'isRecivedEmail', 'Y'),
(122, 43, 'AlternativeEmail', 'lethanhan.bkaptech@gmail.com'),
(123, 43, 'SQ', '0'),
(124, 43, 'SA', 'asd'),
(125, 44, 'isRecivedEmail', 'Y'),
(126, 44, 'AlternativeEmail', 'lethanhan.bkaptech@gmail.com'),
(127, 44, 'SQ', '0'),
(128, 44, 'SA', 'asd');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
