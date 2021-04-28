/*
SQLyog Community v13.1.1 (64 bit)
MySQL - 5.6.21 : Database - db_ga
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`db_ga` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `db_ga`;

/*Table structure for table `agreements` */

DROP TABLE IF EXISTS `agreements`;

CREATE TABLE `agreements` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `no_agreement` varchar(50) DEFAULT NULL,
  `name` text,
  `supplier` text,
  `start` date DEFAULT NULL,
  `end` date DEFAULT NULL,
  `file` text,
  `description` text,
  `reminder` int(11) DEFAULT '0' COMMENT 'Day',
  `section` varchar(50) DEFAULT NULL,
  `status` int(2) DEFAULT '1',
  `email` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `agreements` */

insert  into `agreements`(`id`,`no_agreement`,`name`,`supplier`,`start`,`end`,`file`,`description`,`reminder`,`section`,`status`,`email`) values 
(2,NULL,'Fortigate 60D','PT. KDDI','2020-07-29','2021-07-30','assets/images/agreement_file/60823d679079f.pdf','                                                                                                    License Forticlient                                                                                          ',30,'IT',1,0),
(3,NULL,'Solidwork 2020','PT. Arisma Data Setia','2021-06-01','2021-05-30','assets/images/agreement_file/60823ce0cc1a9.pdf','License Solidwork Premium 2020',30,'IT',1,0);

/*Table structure for table `attribute_value` */

DROP TABLE IF EXISTS `attribute_value`;

CREATE TABLE `attribute_value` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `value` varchar(255) NOT NULL,
  `attribute_parent_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;

/*Data for the table `attribute_value` */

insert  into `attribute_value`(`id`,`value`,`attribute_parent_id`) values 
(5,'Blue',2),
(6,'White',2),
(7,'M',3),
(8,'L',3),
(9,'Green',2),
(10,'Black',2),
(12,'Grey',2),
(13,'S',3),
(17,'Yellow',4),
(20,'small',6),
(21,'medium',6),
(22,'large',6),
(23,'Black',4),
(24,'Cyan',4),
(25,'Magenta',4);

/*Table structure for table `attributes` */

DROP TABLE IF EXISTS `attributes`;

CREATE TABLE `attributes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `active` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

/*Data for the table `attributes` */

insert  into `attributes`(`id`,`name`,`active`) values 
(4,'Color',1),
(6,'Size',1);

/*Table structure for table `brands` */

DROP TABLE IF EXISTS `brands`;

CREATE TABLE `brands` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `active` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

/*Data for the table `brands` */

insert  into `brands`(`id`,`name`,`active`) values 
(15,'Computer',1),
(20,'ATK',1);

/*Table structure for table `categories` */

DROP TABLE IF EXISTS `categories`;

CREATE TABLE `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `active` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

/*Data for the table `categories` */

insert  into `categories`(`id`,`name`,`active`) values 
(11,'Tinta',1);

/*Table structure for table `company` */

DROP TABLE IF EXISTS `company`;

CREATE TABLE `company` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `company_name` varchar(255) NOT NULL,
  `service_charge_value` varchar(255) NOT NULL,
  `vat_charge_value` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `currency` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `company` */

insert  into `company`(`id`,`company_name`,`service_charge_value`,`vat_charge_value`,`address`,`phone`,`country`,`message`,`currency`) values 
(1,'Webrider','13','10','Madrid','758676851','sri lanka','hello everyone one','USD');

/*Table structure for table `groups` */

DROP TABLE IF EXISTS `groups`;

CREATE TABLE `groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `group_name` varchar(255) NOT NULL,
  `permission` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

/*Data for the table `groups` */

insert  into `groups`(`id`,`group_name`,`permission`) values 
(1,'Administrator','a:41:{i:0;s:10:\"createUser\";i:1;s:10:\"updateUser\";i:2;s:8:\"viewUser\";i:3;s:10:\"deleteUser\";i:4;s:11:\"createGroup\";i:5;s:11:\"updateGroup\";i:6;s:9:\"viewGroup\";i:7;s:11:\"deleteGroup\";i:8;s:11:\"createBrand\";i:9;s:11:\"updateBrand\";i:10;s:9:\"viewBrand\";i:11;s:11:\"deleteBrand\";i:12;s:14:\"createCategory\";i:13;s:14:\"updateCategory\";i:14;s:12:\"viewCategory\";i:15;s:14:\"deleteCategory\";i:16;s:11:\"createStore\";i:17;s:11:\"updateStore\";i:18;s:9:\"viewStore\";i:19;s:11:\"deleteStore\";i:20;s:15:\"createAttribute\";i:21;s:15:\"updateAttribute\";i:22;s:13:\"viewAttribute\";i:23;s:15:\"deleteAttribute\";i:24;s:13:\"createProduct\";i:25;s:13:\"updateProduct\";i:26;s:11:\"viewProduct\";i:27;s:13:\"deleteProduct\";i:28;s:11:\"createOrder\";i:29;s:11:\"updateOrder\";i:30;s:9:\"viewOrder\";i:31;s:11:\"deleteOrder\";i:32;s:13:\"createRequest\";i:33;s:13:\"updateRequest\";i:34;s:11:\"viewRequest\";i:35;s:13:\"deleteRequest\";i:36;s:15:\"createAgreement\";i:37;s:15:\"updateAgreement\";i:38;s:13:\"viewAgreement\";i:39;s:15:\"deleteAgreement\";i:40;s:13:\"updateCompany\";}'),
(5,'Manager','a:22:{i:0;s:11:\"createBrand\";i:1;s:11:\"updateBrand\";i:2;s:9:\"viewBrand\";i:3;s:14:\"createCategory\";i:4;s:14:\"updateCategory\";i:5;s:12:\"viewCategory\";i:6;s:11:\"createStore\";i:7;s:11:\"updateStore\";i:8;s:9:\"viewStore\";i:9;s:15:\"createAttribute\";i:10;s:15:\"updateAttribute\";i:11;s:13:\"viewAttribute\";i:12;s:13:\"createProduct\";i:13;s:13:\"updateProduct\";i:14;s:11:\"viewProduct\";i:15;s:11:\"createOrder\";i:16;s:11:\"updateOrder\";i:17;s:9:\"viewOrder\";i:18;s:13:\"createRequest\";i:19;s:13:\"updateRequest\";i:20;s:11:\"viewRequest\";i:21;s:13:\"updateCompany\";}'),
(6,'Administrator','a:41:{i:0;s:10:\"createUser\";i:1;s:10:\"updateUser\";i:2;s:8:\"viewUser\";i:3;s:10:\"deleteUser\";i:4;s:11:\"createGroup\";i:5;s:11:\"updateGroup\";i:6;s:9:\"viewGroup\";i:7;s:11:\"deleteGroup\";i:8;s:11:\"createBrand\";i:9;s:11:\"updateBrand\";i:10;s:9:\"viewBrand\";i:11;s:11:\"deleteBrand\";i:12;s:14:\"createCategory\";i:13;s:14:\"updateCategory\";i:14;s:12:\"viewCategory\";i:15;s:14:\"deleteCategory\";i:16;s:11:\"createStore\";i:17;s:11:\"updateStore\";i:18;s:9:\"viewStore\";i:19;s:11:\"deleteStore\";i:20;s:15:\"createAttribute\";i:21;s:15:\"updateAttribute\";i:22;s:13:\"viewAttribute\";i:23;s:15:\"deleteAttribute\";i:24;s:13:\"createProduct\";i:25;s:13:\"updateProduct\";i:26;s:11:\"viewProduct\";i:27;s:13:\"deleteProduct\";i:28;s:11:\"createOrder\";i:29;s:11:\"updateOrder\";i:30;s:9:\"viewOrder\";i:31;s:11:\"deleteOrder\";i:32;s:13:\"createRequest\";i:33;s:13:\"updateRequest\";i:34;s:11:\"viewRequest\";i:35;s:13:\"deleteRequest\";i:36;s:15:\"createAgreement\";i:37;s:15:\"updateAgreement\";i:38;s:13:\"viewAgreement\";i:39;s:15:\"deleteAgreement\";i:40;s:13:\"updateCompany\";}');

/*Table structure for table `options` */

DROP TABLE IF EXISTS `options`;

CREATE TABLE `options` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `value` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8;

/*Data for the table `options` */

insert  into `options`(`id`,`name`,`value`) values 
(1,'config_email_protocol','smtp'),
(2,'config_email_smtp_host','smtp.gmail.com'),
(3,'config_email_smtp_port','587'),
(4,'config_email_smtp_user','hrd.tenmaindonesia@gmail.com'),
(5,'config_email_smtp_pass','rina2020'),
(6,'config_email_smtp_crypo','tls'),
(7,'config_email_mail_type','html'),
(8,'email_header_plan','Your user has been create Plan Overtime'),
(9,'email_header_act_submit','Your user has been submit Actual Overtime'),
(10,'email_header_abnormal','Your user has been create Abnormal Overtime'),
(11,'config_email_from','GA System'),
(12,'config_notification_email','1'),
(13,'config_title_web','GA System'),
(14,'config_version','2.0'),
(16,'config_site_name','E-SPL'),
(17,'config_login_title','HRD Tenma'),
(18,'email_subject_plan','User Created Plan Overtime'),
(19,'email_subject_act_submit','User Submited Actual Overtime'),
(20,'email_subject_abnormal','User Created Abnormal Overtime'),
(21,'email_subject_abnormal_import','User Created Abnormal Overtime By Import'),
(22,'email_footer','\r\n\r\n*This is a automatic mail. \r\nPlease do-not-reply email message occasionally to disseminate information that doesn`t require a response. \r\nThank you for your attention. \r\n'),
(23,'email_subject_plan_import','User Created Plan Overtime By Import'),
(24,'email_header_plan_import','Your user has been create Plan Overtime By Import'),
(25,'email_header_abnormal_import','Your user has been create Abnormal Overtime By Import'),
(27,'email_select_2','plan_import'),
(28,'email_select_3','abnormal'),
(29,'email_select_4','abnormal_import'),
(30,'email_select_1','plan'),
(32,'email_select_5','act_submit'),
(33,'email_subject_reminder','Outstanding Approve SPL'),
(34,'email_header_reminder','You have outstanding overtime wait for your approve'),
(35,'config_email_title','Here are some Agreement will expired  \r\n');

/*Table structure for table `orders` */

DROP TABLE IF EXISTS `orders`;

CREATE TABLE `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bill_no` varchar(255) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `customer_address` varchar(255) NOT NULL,
  `customer_phone` varchar(255) NOT NULL,
  `date_time` varchar(255) NOT NULL,
  `gross_amount` varchar(255) NOT NULL,
  `service_charge_rate` varchar(255) NOT NULL,
  `service_charge` varchar(255) NOT NULL,
  `vat_charge_rate` varchar(255) NOT NULL,
  `vat_charge` varchar(255) NOT NULL,
  `net_amount` varchar(255) NOT NULL,
  `discount` varchar(255) NOT NULL,
  `paid_status` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

/*Data for the table `orders` */

insert  into `orders`(`id`,`bill_no`,`customer_name`,`customer_address`,`customer_phone`,`date_time`,`gross_amount`,`service_charge_rate`,`service_charge`,`vat_charge_rate`,`vat_charge`,`net_amount`,`discount`,`paid_status`,`user_id`) values 
(11,'OR-08CA','','','','1618907358','','','','','','','',2,1),
(12,'OR-A13D','','','','1618907453','','','','','','','',2,1),
(13,'OR-3004','','','','1618909318','','','','','','','',2,1);

/*Table structure for table `orders_item` */

DROP TABLE IF EXISTS `orders_item`;

CREATE TABLE `orders_item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `rate` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=87 DEFAULT CHARSET=utf8;

/*Data for the table `orders_item` */

insert  into `orders_item`(`id`,`order_id`,`product_id`,`qty`,`rate`,`amount`) values 
(81,11,16,3,'',''),
(82,11,14,3,'',''),
(83,11,15,3,'',''),
(84,12,17,2,'',''),
(85,13,13,2,'','');

/*Table structure for table `products` */

DROP TABLE IF EXISTS `products`;

CREATE TABLE `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `sku` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `qty` int(11) NOT NULL,
  `min_qty` int(11) DEFAULT NULL,
  `image` text NOT NULL,
  `description` text NOT NULL,
  `attribute_value_id` text,
  `brand_id` text NOT NULL,
  `category_id` text NOT NULL,
  `store_id` int(11) NOT NULL,
  `availability` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

/*Data for the table `products` */

insert  into `products`(`id`,`name`,`sku`,`price`,`qty`,`min_qty`,`image`,`description`,`attribute_value_id`,`brand_id`,`category_id`,`store_id`,`availability`) values 
(13,'Tinta Black','','1',2,1,'assets/images/product_image/607f974bcdd69.jpg','                                                                                              ','[\"23\",\"22\"]','[\"20\"]','[\"11\"]',10,1),
(14,'Tinta Cyan','','',3,1,'assets/images/product_image/607fc06a90d87.jpg','                                                        ','[\"24\",\"21\"]','[\"20\"]','[\"11\"]',10,1),
(15,'Tinta Yellow','','',3,1,'assets/images/product_image/607fc10c7e60a.jpg','                                                                                              ','[\"17\",\"21\"]','[\"20\"]','[\"11\"]',10,1),
(16,'Tinta Magenta','','',3,1,'assets/images/product_image/607fc12b1119d.jpg','                                                        ','[\"25\",\"21\"]','[\"20\"]','[\"11\"]',10,1),
(17,'Maintenance Box','','',1,1,'assets/images/product_image/607fc539eacf0.jpg','                                                                                                                                                                                                                                                      ','null','[\"20\"]','[\"11\"]',10,1);

/*Table structure for table `recipients` */

DROP TABLE IF EXISTS `recipients`;

CREATE TABLE `recipients` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `section` varchar(50) DEFAULT NULL,
  `email` text,
  `status` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `recipients` */

insert  into `recipients`(`id`,`name`,`section`,`email`,`status`) values 
(1,'Faizal ','IT','it_tmi@tenmacorp.co.jp',0);

/*Table structure for table `requests` */

DROP TABLE IF EXISTS `requests`;

CREATE TABLE `requests` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `request_no` varchar(255) NOT NULL,
  `date_time` varchar(255) NOT NULL,
  `paid_status` int(11) NOT NULL,
  `remark` text,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

/*Data for the table `requests` */

insert  into `requests`(`id`,`request_no`,`date_time`,`paid_status`,`remark`,`user_id`) values 
(5,'REQ-6E58','1619399044',1,'For Printer Office Production',1);

/*Table structure for table `requests_item` */

DROP TABLE IF EXISTS `requests_item`;

CREATE TABLE `requests_item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `requests_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `rate` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

/*Data for the table `requests_item` */

insert  into `requests_item`(`id`,`requests_id`,`product_id`,`qty`,`rate`,`amount`) values 
(15,5,17,1,'','');

/*Table structure for table `schedule` */

DROP TABLE IF EXISTS `schedule`;

CREATE TABLE `schedule` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(200) DEFAULT NULL,
  `description` text,
  `color` varchar(50) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `create_at` datetime DEFAULT NULL,
  `create_by` varchar(10) DEFAULT NULL,
  `modified_at` datetime DEFAULT NULL,
  `modified_by` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `schedule` */

/*Table structure for table `stores` */

DROP TABLE IF EXISTS `stores`;

CREATE TABLE `stores` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `active` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

/*Data for the table `stores` */

insert  into `stores`(`id`,`name`,`active`) values 
(5,'GA',1),
(9,'TPS',1),
(10,'IT',1);

/*Table structure for table `user_group` */

DROP TABLE IF EXISTS `user_group`;

CREATE TABLE `user_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

/*Data for the table `user_group` */

insert  into `user_group`(`id`,`user_id`,`group_id`) values 
(1,1,1),
(7,6,4),
(8,7,4),
(9,8,4),
(10,9,5),
(11,10,5),
(12,11,5),
(13,12,5);

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `gender` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

/*Data for the table `users` */

insert  into `users`(`id`,`username`,`password`,`email`,`firstname`,`lastname`,`phone`,`gender`) values 
(1,'admin','$2y$10$yfi5nUQGXUZtMdl27dWAyOd/jMOmATBpiUvJDmUu9hJ5Ro6BE5wsK','admin@admin.com','john','doe','65646546',1),
(11,'shafraz','$2y$10$LK91ERpEJxortR86lkDjwu7MClazgIrvDqehqOnq5ZKm30elKAkUa','shafraz@gmail.com','mohamed','nizam','0778650669',1),
(12,'jsmith','$2y$10$WLS.lZeiEfyXYfR0l/wkXeRRuqazsgIAMC9//L44J4KkZGbbqcKYC','jsmith@sample.com','John','Smith','2345678',1);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
