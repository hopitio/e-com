-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 27, 2014 at 06:07 PM
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=20 ;

--
-- Dumping data for table `t_user`
--

INSERT INTO `t_user` (`id`, `firstname`, `lastname`, `account`, `password`, `sex`, `DOB`, `date_joined`, `status`, `status_date`, `status_reason`, `last_active`, `platform_key`) VALUES
(10, '', '', '', '', 'M', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 'Tạo mới tài khoản', '0000-00-00 00:00:00', 0),
(11, '', '', '', '', 'M', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 'Tạo mới tài khoản', '0000-00-00 00:00:00', 0),
(12, 'LÊ THANH ', 'AN ', 'le.thanh.an@vsi-international.com', 'aaaaa', 'M', '2014-03-11 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 'Tạo mới tài khoản', '0000-00-00 00:00:00', 0),
(13, 'LÊ THANH ', 'AN ', 'le.thanh.an@vsi-international.com', 'aaaaa', 'M', '2014-03-11 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 'Tạo mới tài khoản', '0000-00-00 00:00:00', 0),
(14, 'LÊ THANH ', 'AN ', 'le.thanh.an@vsi-international.com', 'aaaaa', 'M', '2014-03-11 00:00:00', '2014-03-27 11:03:41', 0, '2014-03-27 11:03:41', 'Tạo mới tài khoản', '2014-03-27 11:03:41', 0),
(15, 'LÊ THANH ', 'AN ', 'le.thanh.an@vsi-international.com', 'aaaaa', 'M', '2014-03-11 00:00:00', '2014-03-27 11:03:04', 0, '2014-03-27 11:03:04', 'Tạo mới tài khoản', '2014-03-27 11:03:04', 0),
(16, 'âsdasd', 'ádasdasdasda', 'le.thanh.an@vsi-international.com', 'ádasd', 'M', '2014-03-06 00:00:00', '2014-03-28 12:03:11', 0, '2014-03-28 12:03:11', 'Tạo mới tài khoản', '2014-03-28 12:03:11', 0),
(17, 'âsdasd', 'ádasdasdasda', 'le.thanh.an@vsi-international.com', 'ádasd', 'M', '2014-03-06 00:00:00', '2014-03-28 12:03:57', 0, '2014-03-28 12:03:57', 'Tạo mới tài khoản', '2014-03-28 12:03:57', 0),
(18, 'âsdasd', 'ádasdasdasda', 'le.thanh.an@vsi-international.com', 'ádasd', 'M', '2014-03-06 00:00:00', '2014-03-28 12:03:56', 0, '2014-03-28 12:03:56', 'Tạo mới tài khoản', '2014-03-28 12:03:56', 0),
(19, 'âsdasd', 'ádasdasdasda', 'le.thanh.an@vsi-international.com', 'ádasd', 'M', '2014-03-06 00:00:00', '2014-03-28 12:03:10', 0, '2014-03-28 12:03:10', 'Tạo mới tài khoản', '2014-03-28 12:03:10', 0);

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
-- Table structure for table `t_user_setting`
--

CREATE TABLE IF NOT EXISTS `t_user_setting` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_user` int(11) NOT NULL,
  `setting_key` char(20) COLLATE utf8_unicode_ci NOT NULL,
  `value` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=31 ;

--
-- Dumping data for table `t_user_setting`
--

INSERT INTO `t_user_setting` (`id`, `fk_user`, `setting_key`, `value`) VALUES
(11, 10, 'isRecivedEmail', 'Y'),
(12, 10, 'AlternativeEmail', ''),
(13, 11, 'isRecivedEmail', 'Y'),
(14, 11, 'AlternativeEmail', ''),
(15, 12, 'isRecivedEmail', 'Y'),
(16, 12, 'AlternativeEmail', 'le.thanh.an@vsi-international.com'),
(17, 13, 'isRecivedEmail', 'Y'),
(18, 13, 'AlternativeEmail', 'le.thanh.an@vsi-international.com'),
(19, 14, 'isRecivedEmail', 'Y'),
(20, 14, 'AlternativeEmail', 'le.thanh.an@vsi-international.com'),
(21, 15, 'isRecivedEmail', 'Y'),
(22, 15, 'AlternativeEmail', 'le.thanh.an@vsi-international.com'),
(23, 16, 'isRecivedEmail', 'Y'),
(24, 16, 'AlternativeEmail', 'le.thanh.an@vsi-international.com'),
(25, 17, 'isRecivedEmail', 'Y'),
(26, 17, 'AlternativeEmail', 'le.thanh.an@vsi-international.com'),
(27, 18, 'isRecivedEmail', 'Y'),
(28, 18, 'AlternativeEmail', 'le.thanh.an@vsi-international.com'),
(29, 19, 'isRecivedEmail', 'Y'),
(30, 19, 'AlternativeEmail', 'le.thanh.an@vsi-international.com');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
