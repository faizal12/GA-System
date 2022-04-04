/*
SQLyog Community v13.1.1 (64 bit)
MySQL - 5.6.20 : Database - db_ga
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
  `date_create` datetime DEFAULT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=latin1;

/*Data for the table `agreements` */

/*Table structure for table `attribute_value` */

DROP TABLE IF EXISTS `attribute_value`;

CREATE TABLE `attribute_value` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `value` varchar(255) NOT NULL,
  `attribute_parent_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8;

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
(25,'Magenta',4),
(26,'I5',7),
(27,'I3',7),
(28,'8GB',8),
(29,'4GB',8);

/*Table structure for table `attributes` */

DROP TABLE IF EXISTS `attributes`;

CREATE TABLE `attributes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `active` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

/*Data for the table `attributes` */

insert  into `attributes`(`id`,`name`,`active`) values 
(4,'Color',1),
(6,'Size',1),
(7,'Processor',1),
(8,'Ram',1);

/*Table structure for table `brands` */

DROP TABLE IF EXISTS `brands`;

CREATE TABLE `brands` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `active` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

/*Data for the table `brands` */

insert  into `brands`(`id`,`name`,`active`) values 
(15,'Computer',1),
(20,'ATK',1),
(21,'Uniform',1),
(22,'PERIZINAN ALAT ANGKAT ANGKUT',1);

/*Table structure for table `categories` */

DROP TABLE IF EXISTS `categories`;

CREATE TABLE `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `active` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

/*Data for the table `categories` */

insert  into `categories`(`id`,`name`,`active`) values 
(11,'Tinta',1),
(12,'Komputer',1);

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
(1,'PT. Tenma Indonesia','5','10','Madrid','758676851','Indonesia','hello everyone one','USD');

/*Table structure for table `frequent_dt` */

DROP TABLE IF EXISTS `frequent_dt`;

CREATE TABLE `frequent_dt` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `REMINDER_ID` int(11) DEFAULT NULL,
  `REMINDER_DT` date DEFAULT NULL,
  `STATUS` int(11) DEFAULT '0',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=69 DEFAULT CHARSET=latin1;

/*Data for the table `frequent_dt` */

insert  into `frequent_dt`(`ID`,`REMINDER_ID`,`REMINDER_DT`,`STATUS`) values 
(24,7,'2021-11-30',1),
(25,8,'2021-11-30',1),
(26,9,'2021-11-30',1),
(27,10,'2021-12-01',1),
(34,13,'2022-06-23',0),
(35,12,'2022-06-23',0),
(36,14,'2022-03-24',1),
(37,15,'2022-10-17',0),
(38,16,'2022-04-14',1),
(39,17,'2022-04-20',1),
(40,18,'2022-06-06',0),
(42,19,'2022-06-06',0),
(45,22,'2022-06-23',0),
(46,23,'2022-06-23',0),
(47,24,'2022-06-23',0),
(48,25,'2022-10-17',0),
(49,26,'2022-10-17',0),
(50,27,'2022-10-17',0),
(51,28,'2022-10-17',0),
(52,29,'2022-10-17',0),
(53,30,'2022-10-17',0),
(54,31,'2022-10-17',0),
(55,32,'2022-10-17',0),
(56,33,'2022-10-17',0),
(57,34,'2022-10-17',0),
(59,35,'2022-11-17',0),
(60,36,'2022-11-17',0),
(61,37,'2022-11-17',0),
(62,38,'2022-11-17',0),
(63,39,'2022-11-17',0),
(64,40,'2022-11-17',0),
(65,41,'2022-11-17',0),
(66,42,'2022-11-17',0),
(67,43,'2022-11-17',0),
(68,11,'2022-05-12',0);

/*Table structure for table `groups` */

DROP TABLE IF EXISTS `groups`;

CREATE TABLE `groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `group_name` varchar(255) NOT NULL,
  `permission` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

/*Data for the table `groups` */

insert  into `groups`(`id`,`group_name`,`permission`) values 
(1,'Administrator','a:53:{i:0;s:10:\"createUser\";i:1;s:10:\"updateUser\";i:2;s:8:\"viewUser\";i:3;s:10:\"deleteUser\";i:4;s:11:\"createGroup\";i:5;s:11:\"updateGroup\";i:6;s:9:\"viewGroup\";i:7;s:11:\"deleteGroup\";i:8;s:11:\"createBrand\";i:9;s:11:\"updateBrand\";i:10;s:9:\"viewBrand\";i:11;s:11:\"deleteBrand\";i:12;s:14:\"createCategory\";i:13;s:14:\"updateCategory\";i:14;s:12:\"viewCategory\";i:15;s:14:\"deleteCategory\";i:16;s:11:\"createStore\";i:17;s:11:\"updateStore\";i:18;s:9:\"viewStore\";i:19;s:11:\"deleteStore\";i:20;s:15:\"createAttribute\";i:21;s:15:\"updateAttribute\";i:22;s:13:\"viewAttribute\";i:23;s:15:\"deleteAttribute\";i:24;s:13:\"createProduct\";i:25;s:13:\"updateProduct\";i:26;s:11:\"viewProduct\";i:27;s:13:\"deleteProduct\";i:28;s:11:\"createOrder\";i:29;s:11:\"updateOrder\";i:30;s:9:\"viewOrder\";i:31;s:11:\"deleteOrder\";i:32;s:13:\"createRequest\";i:33;s:13:\"updateRequest\";i:34;s:11:\"viewRequest\";i:35;s:13:\"deleteRequest\";i:36;s:15:\"createAgreement\";i:37;s:15:\"updateAgreement\";i:38;s:13:\"viewAgreement\";i:39;s:15:\"deleteAgreement\";i:40;s:13:\"createSection\";i:41;s:13:\"updateSection\";i:42;s:11:\"viewSection\";i:43;s:13:\"deleteSection\";i:44;s:16:\"createRecipients\";i:45;s:16:\"updateRecipients\";i:46;s:14:\"viewRecipients\";i:47;s:16:\"deleteRecipients\";i:48;s:14:\"createReminder\";i:49;s:14:\"updateReminder\";i:50;s:12:\"viewReminder\";i:51;s:14:\"deleteReminder\";i:52;s:13:\"updateCompany\";}'),
(5,'Manager','a:22:{i:0;s:11:\"createBrand\";i:1;s:11:\"updateBrand\";i:2;s:9:\"viewBrand\";i:3;s:14:\"createCategory\";i:4;s:14:\"updateCategory\";i:5;s:12:\"viewCategory\";i:6;s:11:\"createStore\";i:7;s:11:\"updateStore\";i:8;s:9:\"viewStore\";i:9;s:15:\"createAttribute\";i:10;s:15:\"updateAttribute\";i:11;s:13:\"viewAttribute\";i:12;s:13:\"createProduct\";i:13;s:13:\"updateProduct\";i:14;s:11:\"viewProduct\";i:15;s:11:\"createOrder\";i:16;s:11:\"updateOrder\";i:17;s:9:\"viewOrder\";i:18;s:13:\"createRequest\";i:19;s:13:\"updateRequest\";i:20;s:11:\"viewRequest\";i:21;s:13:\"updateCompany\";}'),
(6,'Administrator','a:53:{i:0;s:10:\"createUser\";i:1;s:10:\"updateUser\";i:2;s:8:\"viewUser\";i:3;s:10:\"deleteUser\";i:4;s:11:\"createGroup\";i:5;s:11:\"updateGroup\";i:6;s:9:\"viewGroup\";i:7;s:11:\"deleteGroup\";i:8;s:11:\"createBrand\";i:9;s:11:\"updateBrand\";i:10;s:9:\"viewBrand\";i:11;s:11:\"deleteBrand\";i:12;s:14:\"createCategory\";i:13;s:14:\"updateCategory\";i:14;s:12:\"viewCategory\";i:15;s:14:\"deleteCategory\";i:16;s:11:\"createStore\";i:17;s:11:\"updateStore\";i:18;s:9:\"viewStore\";i:19;s:11:\"deleteStore\";i:20;s:15:\"createAttribute\";i:21;s:15:\"updateAttribute\";i:22;s:13:\"viewAttribute\";i:23;s:15:\"deleteAttribute\";i:24;s:13:\"createProduct\";i:25;s:13:\"updateProduct\";i:26;s:11:\"viewProduct\";i:27;s:13:\"deleteProduct\";i:28;s:11:\"createOrder\";i:29;s:11:\"updateOrder\";i:30;s:9:\"viewOrder\";i:31;s:11:\"deleteOrder\";i:32;s:13:\"createRequest\";i:33;s:13:\"updateRequest\";i:34;s:11:\"viewRequest\";i:35;s:13:\"deleteRequest\";i:36;s:15:\"createAgreement\";i:37;s:15:\"updateAgreement\";i:38;s:13:\"viewAgreement\";i:39;s:15:\"deleteAgreement\";i:40;s:13:\"createSection\";i:41;s:13:\"updateSection\";i:42;s:11:\"viewSection\";i:43;s:13:\"deleteSection\";i:44;s:16:\"createRecipients\";i:45;s:16:\"updateRecipients\";i:46;s:14:\"viewRecipients\";i:47;s:16:\"deleteRecipients\";i:48;s:14:\"createReminder\";i:49;s:14:\"updateReminder\";i:50;s:12:\"viewReminder\";i:51;s:14:\"deleteReminder\";i:52;s:13:\"updateCompany\";}'),
(7,'HR/GA Member','a:37:{i:0;s:11:\"createBrand\";i:1;s:11:\"updateBrand\";i:2;s:9:\"viewBrand\";i:3;s:11:\"deleteBrand\";i:4;s:14:\"createCategory\";i:5;s:14:\"updateCategory\";i:6;s:12:\"viewCategory\";i:7;s:14:\"deleteCategory\";i:8;s:9:\"viewStore\";i:9;s:15:\"createAttribute\";i:10;s:15:\"updateAttribute\";i:11;s:13:\"viewAttribute\";i:12;s:15:\"deleteAttribute\";i:13;s:13:\"createProduct\";i:14;s:13:\"updateProduct\";i:15;s:11:\"viewProduct\";i:16;s:13:\"deleteProduct\";i:17;s:11:\"createOrder\";i:18;s:11:\"updateOrder\";i:19;s:9:\"viewOrder\";i:20;s:11:\"deleteOrder\";i:21;s:13:\"createRequest\";i:22;s:13:\"updateRequest\";i:23;s:11:\"viewRequest\";i:24;s:13:\"deleteRequest\";i:25;s:15:\"createAgreement\";i:26;s:15:\"updateAgreement\";i:27;s:13:\"viewAgreement\";i:28;s:15:\"deleteAgreement\";i:29;s:16:\"createRecipients\";i:30;s:16:\"updateRecipients\";i:31;s:14:\"viewRecipients\";i:32;s:16:\"deleteRecipients\";i:33;s:14:\"createReminder\";i:34;s:14:\"updateReminder\";i:35;s:12:\"viewReminder\";i:36;s:14:\"deleteReminder\";}'),
(8,'MS','a:15:{i:0;s:9:\"viewStore\";i:1;s:9:\"viewOrder\";i:2;s:15:\"createAgreement\";i:3;s:15:\"updateAgreement\";i:4;s:13:\"viewAgreement\";i:5;s:15:\"deleteAgreement\";i:6;s:11:\"viewSection\";i:7;s:16:\"createRecipients\";i:8;s:16:\"updateRecipients\";i:9;s:14:\"viewRecipients\";i:10;s:16:\"deleteRecipients\";i:11;s:14:\"createReminder\";i:12;s:14:\"updateReminder\";i:13;s:12:\"viewReminder\";i:14;s:14:\"deleteReminder\";}'),
(9,'IT','a:52:{i:0;s:10:\"createUser\";i:1;s:10:\"updateUser\";i:2;s:8:\"viewUser\";i:3;s:10:\"deleteUser\";i:4;s:11:\"createGroup\";i:5;s:11:\"updateGroup\";i:6;s:9:\"viewGroup\";i:7;s:11:\"deleteGroup\";i:8;s:11:\"createBrand\";i:9;s:11:\"updateBrand\";i:10;s:9:\"viewBrand\";i:11;s:11:\"deleteBrand\";i:12;s:14:\"createCategory\";i:13;s:14:\"updateCategory\";i:14;s:12:\"viewCategory\";i:15;s:14:\"deleteCategory\";i:16;s:11:\"createStore\";i:17;s:11:\"updateStore\";i:18;s:9:\"viewStore\";i:19;s:11:\"deleteStore\";i:20;s:15:\"createAttribute\";i:21;s:15:\"updateAttribute\";i:22;s:13:\"viewAttribute\";i:23;s:15:\"deleteAttribute\";i:24;s:13:\"createProduct\";i:25;s:13:\"updateProduct\";i:26;s:11:\"viewProduct\";i:27;s:13:\"deleteProduct\";i:28;s:11:\"createOrder\";i:29;s:11:\"updateOrder\";i:30;s:9:\"viewOrder\";i:31;s:11:\"deleteOrder\";i:32;s:13:\"createRequest\";i:33;s:13:\"updateRequest\";i:34;s:11:\"viewRequest\";i:35;s:13:\"deleteRequest\";i:36;s:15:\"createAgreement\";i:37;s:15:\"updateAgreement\";i:38;s:13:\"viewAgreement\";i:39;s:15:\"deleteAgreement\";i:40;s:13:\"createSection\";i:41;s:13:\"updateSection\";i:42;s:11:\"viewSection\";i:43;s:13:\"deleteSection\";i:44;s:16:\"createRecipients\";i:45;s:16:\"updateRecipients\";i:46;s:14:\"viewRecipients\";i:47;s:16:\"deleteRecipients\";i:48;s:14:\"createReminder\";i:49;s:14:\"updateReminder\";i:50;s:12:\"viewReminder\";i:51;s:14:\"deleteReminder\";}');

/*Table structure for table `master_day` */

DROP TABLE IF EXISTS `master_day`;

CREATE TABLE `master_day` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `value` double DEFAULT NULL,
  `name` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `master_day` */

insert  into `master_day`(`id`,`value`,`name`) values 
(1,7,'1 Weeks'),
(2,14,'2 Weeks'),
(3,30,'1 Months'),
(4,60,'2 Months'),
(5,90,'3 Months'),
(6,3,'3 Days');

/*Table structure for table `master_freq` */

DROP TABLE IF EXISTS `master_freq`;

CREATE TABLE `master_freq` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `value` double DEFAULT NULL,
  `name` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `master_freq` */

insert  into `master_freq`(`id`,`value`,`name`) values 
(1,1,'1x'),
(2,2,'2x'),
(3,3,'3x'),
(4,4,'4x'),
(5,5,'5x');

/*Table structure for table `notification_receipt` */

DROP TABLE IF EXISTS `notification_receipt`;

CREATE TABLE `notification_receipt` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_agreement` int(11) DEFAULT NULL,
  `id_schedule` int(11) DEFAULT NULL,
  `id_recipient` int(11) DEFAULT NULL,
  `stat` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `notification_receipt` */

/*Table structure for table `options` */

DROP TABLE IF EXISTS `options`;

CREATE TABLE `options` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `value` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8;

/*Data for the table `options` */

insert  into `options`(`id`,`name`,`value`) values 
(1,'config_email_protocol','smtp'),
(2,'config_email_smtp_host','smtp.gmail.com'),
(3,'config_email_smtp_port','465'),
(6,'config_email_smtp_crypo','ssl'),
(7,'config_email_mail_type','html'),
(8,'email_header_plan','Your user has been create Plan Overtime'),
(9,'email_header_act_submit','Your user has been submit Actual Overtime'),
(10,'email_header_abnormal','Your user has been create Abnormal Overtime'),
(11,'config_email_from','Reminder System'),
(12,'config_notification_email','1'),
(13,'config_title_web','Reminder System'),
(14,'config_version','2.0'),
(16,'config_site_name','E-SPL'),
(17,'config_login_title','HRD Tenma'),
(18,'email_subject_plan','User Created Plan Overtime'),
(19,'email_subject_act_submit','User Submited Actual Overtime'),
(20,'email_subject_abnormal','User Created Abnormal Overtime'),
(21,'email_subject_abnormal_import','User Created Abnormal Overtime By Import'),
(22,'email_footer','\r\n\r\n*This is a automatic mail.<br>\r\nPlease do-not-reply email message occasionally to disseminate information that doesn`t require a response.<br> \r\nThank you for your attention. \r\n'),
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
(35,'config_email_title','Here are some Agreement will expired  \r\n'),
(36,'config_email_title_reminder','Here are some Agreement will expired  \r\n'),
(37,'config_email_subject_reminder','Reminder - Notification');

/*Table structure for table `orders` */

DROP TABLE IF EXISTS `orders`;

CREATE TABLE `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bill_no` varchar(255) NOT NULL,
  `date_time` varchar(255) NOT NULL,
  `date_in` date DEFAULT NULL,
  `remark` text,
  `paid_status` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `orders` */

insert  into `orders`(`id`,`bill_no`,`date_time`,`date_in`,`remark`,`paid_status`,`user_id`) values 
(1,'OR-9172','1641521202',NULL,'',2,19),
(2,'OR-0E9C','1641980253',NULL,'',1,16);

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
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

/*Data for the table `orders_item` */

insert  into `orders_item`(`id`,`order_id`,`product_id`,`qty`,`rate`,`amount`) values 
(1,1,19,20,'',''),
(17,2,14,2,'',''),
(18,2,16,2,'',''),
(19,2,15,2,'',''),
(20,2,13,2,'',''),
(21,2,17,3,'','');

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
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8;

/*Data for the table `products` */

insert  into `products`(`id`,`name`,`sku`,`price`,`qty`,`min_qty`,`image`,`description`,`attribute_value_id`,`brand_id`,`category_id`,`store_id`,`availability`) values 
(13,'Tinta Black','','0',1,1,'assets/images/product_image/607f974bcdd69.jpg','                                                                                              ','[\"23\",\"22\"]','[\"20\"]','[\"11\"]',10,1),
(14,'Tinta Cyan','','',1,1,'assets/images/product_image/607fc06a90d87.jpg','                                                        ','[\"24\",\"21\"]','[\"20\"]','[\"11\"]',10,1),
(15,'Tinta Yellow','','',1,1,'assets/images/product_image/607fc10c7e60a.jpg','                                                                                              ','[\"17\",\"21\"]','[\"20\"]','[\"11\"]',10,1),
(16,'Tinta Magenta','','',1,1,'assets/images/product_image/607fc12b1119d.jpg','                                                        ','[\"25\",\"21\"]','[\"20\"]','[\"11\"]',10,1),
(17,'Maintenance Box','','',2,1,'assets/images/product_image/607fc539eacf0.jpg','                                                                                                                                                                                                                                                      ','null','[\"20\"]','[\"11\"]',10,1),
(19,'Seragam Baju Tenma Biru Muda (S)','','',20,10,'<p>You did not select a file to upload.</p>','                                                                                <p><br></p>                                                                        ','[\"24\",\"20\",\"26\"]','null','null',5,1),
(20,'Seragam Baju Tenma Biru Muda (M)','','',0,20,'<p>You did not select a file to upload.</p>','                  ','[\"24\",\"21\"]','null','null',5,1),
(21,'Seragam Baju Tenma Biru Muda (L)','','',0,20,'<p>You did not select a file to upload.</p>','                  ','[\"24\",\"22\"]','[\"21\"]','null',5,1),
(22,'Seragam Baju Tenma Biru Muda (XL)','','',0,20,'<p>You did not select a file to upload.</p>','                  ','[\"24\",\"22\"]','[\"21\"]','null',5,1),
(23,'Seragam Baju Tenma Biru Muda (XXL)','','',0,10,'<p>You did not select a file to upload.</p>','                  ','[\"24\",\"22\"]','[\"21\"]','null',5,1),
(24,'Seragam Teknisi Tenma Biru Dongker (S)','','',0,10,'<p>You did not select a file to upload.</p>','                  ','null','[\"21\"]','null',5,1),
(25,'Seragam Teknisi Tenma Biru Dongker (M)','','',0,20,'<p>You did not select a file to upload.</p>','                  ','null','[\"21\"]','null',5,1),
(26,'Seragam Teknisi Tenma Biru Dongker (L)','','',0,20,'<p>You did not select a file to upload.</p>','                  ','null','[\"21\"]','null',5,1),
(27,'Seragam Teknisi Tenma Biru Dongker (XL)','','',0,20,'<p>You did not select a file to upload.</p>','                  ','null','[\"21\"]','null',5,1),
(28,'Seragam Teknisi Tenma Biru Dongker (XXL)','','',0,10,'<p>You did not select a file to upload.</p>','                  ','[\"22\"]','[\"21\"]','null',5,1),
(29,'Seragam Celana Tenma Biru Dongker (27)','','',0,20,'<p>You did not select a file to upload.</p>','                  ','[\"20\"]','[\"21\"]','null',5,1),
(30,'Seragam Celana Tenma Biru Dongker (28)','','',0,20,'<p>You did not select a file to upload.</p>','                  ','null','[\"21\"]','null',5,1),
(31,'Seragam Celana Tenma Biru Dongker (29)','','',0,20,'<p>You did not select a file to upload.</p>','                  ','null','[\"21\"]','null',5,1),
(32,'Seragam Celana Tenma Biru Dongker (30)','','',0,20,'<p>You did not select a file to upload.</p>','                  ','null','[\"21\"]','null',5,1),
(33,'Seragam Celana Tenma Biru Dongker (31)','','',0,20,'<p>You did not select a file to upload.</p>','                  ','null','[\"21\"]','null',5,1),
(34,'Seragam Celana Tenma Biru Dongker (32)','','',0,20,'<p>You did not select a file to upload.</p>','                  ','null','[\"21\"]','null',5,1),
(35,'Seragam Celana Tenma Biru Dongker (33)','','',0,20,'<p>You did not select a file to upload.</p>','                  ','null','[\"21\"]','null',5,1),
(36,'Seragam Celana Tenma Biru Dongker (34)','','',0,20,'<p>You did not select a file to upload.</p>','                                                        ','null','[\"21\"]','null',5,1),
(37,'Seragam Celana Tenma Biru Dongker (35)','','',0,20,'<p>You did not select a file to upload.</p>','                  ','null','[\"21\"]','null',5,1),
(38,'Seragam Celana Tenma Biru Dongker (36)','','',0,20,'<p>You did not select a file to upload.</p>','                  ','null','[\"21\"]','null',5,1),
(39,'Seragam Celana Tenma Biru Dongker (37)','','',0,10,'<p>You did not select a file to upload.</p>','                  ','null','[\"21\"]','null',5,1),
(40,'Seragam Celana Tenma Biru Dongker (38)','','',0,10,'<p>You did not select a file to upload.</p>','                  ','null','[\"21\"]','null',5,1),
(41,'Seragam Celana Tenma Biru Dongker (39)','','',0,10,'<p>You did not select a file to upload.</p>','                  ','null','[\"21\"]','null',5,1),
(42,'Seragam Celana Tenma Biru Dongker (40)','','',0,10,'<p>You did not select a file to upload.</p>','                  ','null','[\"21\"]','null',5,1),
(43,'Topi perekat 1','','',0,20,'<p>You did not select a file to upload.</p>','                  ','null','[\"21\"]','null',5,1),
(44,'Topi perekat 2','','',0,10,'<p>You did not select a file to upload.</p>','                  ','null','[\"21\"]','null',5,1),
(45,'Seragam Jilbab Tenma (Biru Dongker)','','',0,10,'<p>You did not select a file to upload.</p>','                  ','null','[\"21\"]','null',5,1);

/*Table structure for table `recipients` */

DROP TABLE IF EXISTS `recipients`;

CREATE TABLE `recipients` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `section` varchar(50) DEFAULT NULL,
  `email` text,
  `active` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

/*Data for the table `recipients` */

insert  into `recipients`(`id`,`name`,`section`,`email`,`active`) values 
(1,'Faizal ','IT','it_tmi@tenmacorp.co.jp',1),
(3,'Yayat','IT','it.team@tenmacorp.co.jp',1),
(4,'Done','IT','tmci-it1@tenmacorp.co.jp',1),
(5,'Risna','MS','risna@tenmacorp.co.jp',1),
(6,'Regina','MS','regina@tenmacorp.co.jp',1),
(7,'Irpan','MS','ms01.tmis@tenmacorp.co.jp',1),
(8,'HRD','HR&GA','hrd@tenmacorp.co.jp',1),
(9,'Rindriana','HR&GA','rindriana@tenmacorp.co.jp',1);

/*Table structure for table `reminder` */

DROP TABLE IF EXISTS `reminder`;

CREATE TABLE `reminder` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `no_reminder` varchar(15) DEFAULT NULL,
  `date_create` datetime DEFAULT NULL,
  `title` varchar(100) DEFAULT NULL,
  `description` text,
  `section` varchar(20) DEFAULT NULL,
  `start` datetime DEFAULT NULL,
  `end` datetime DEFAULT NULL,
  `file` text,
  `freq` int(11) DEFAULT NULL,
  `reminder` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT '0',
  `status_email` int(11) DEFAULT '0',
  `counter` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=latin1;

/*Data for the table `reminder` */

insert  into `reminder`(`id`,`no_reminder`,`date_create`,`title`,`description`,`section`,`start`,`end`,`file`,`freq`,`reminder`,`status`,`status_email`,`counter`) values 
(7,'SOP-72E448','2021-11-19 03:07:23','Q4-Action Plan','                                        Q4-Action Plan Result Report (Nov-2021)                                                                                            ','MS',NULL,NULL,'<p>You did not select a file to upload.</p>',1,3,2,1,0),
(8,'SOP-E4EE95','2021-11-19 03:07:31','Evaluasi Aspek Dampak Manajemen','                                        Y2021_Lembar Evaluasi Aspek Dampak Manajemen_Result Report                                    ','MS',NULL,NULL,'<p>You did not select a file to upload.</p>',1,3,2,1,0),
(9,'SOP-712D46','2021-11-23 07:21:27','Y2021_Lembar Aspek Dampak Managemen','Evaluasi Aspek Dampak Managemen','MS',NULL,NULL,'<p>You did not select a file to upload.</p>',1,3,2,1,0),
(10,'SOP-243A08','2021-11-23 07:22:18','2nd Half 2021_Appraisal','Employee Appraisal','HR&GA',NULL,NULL,'<p>You did not select a file to upload.</p>',1,3,2,1,0),
(11,'RE-F4E53A','2022-03-10 03:36:54','SIO Forklift','                    <p>SIO Forklift a.n </p><p>Suhantoro          </p><p>Aris Setyo</p><p>Mugiono</p><p>Yaman Sulaeman</p><p>Anto</p><p>Rohadi Setiyanta</p><p>Sudirman</p><p>Riyadi</p><p>Andy Wiyono</p><p>Isroil</p><p>Toto Wasono</p><p>Toto</p><p>Waryoko</p><p>Taufik Walhidayah</p><p>Anang Setiawan</p><p><br></p>                  ','HR&GA',NULL,NULL,'<p>You did not select a file to upload.</p>',1,30,2,3,0),
(12,'RE-E9A064','2022-03-05 03:04:08','Electric Chain Hoist Crane Line A (23 Jun 2022)','                    RIKSA UJI                  ','HR&GA',NULL,NULL,'<p>You did not select a file to upload.</p>',1,30,1,0,0),
(13,'RE-553A7C','2022-03-05 03:02:43','Overhead Crane Line E (23 Jun 2022)','                  ','HR&GA',NULL,NULL,'<p>You did not select a file to upload.</p>',1,14,1,0,0),
(14,'RE-BB0715','2022-03-05 03:07:07','Overhead Crane Line B','                  ','HR&GA',NULL,NULL,'<p>You did not select a file to upload.</p>',1,30,2,1,0),
(15,'RE-1A0CF4','2022-03-05 03:15:57','Single Girder Electric Overhead Travelling Crane','                  ','HR&GA',NULL,NULL,'<p>You did not select a file to upload.</p>',1,30,1,0,0),
(16,'RE-6D4BBE','2022-03-05 03:50:34','Electric Chain Hoist Line C (14 Apr 2022)','                  ','HR&GA',NULL,NULL,'<p>You did not select a file to upload.</p>',1,30,2,1,0),
(17,'RE-4E5BBE','2022-03-05 03:51:56','Electric Chain Hoist (20 Apr 2022)','                  ','HR&GA',NULL,NULL,'<p>You did not select a file to upload.</p>',1,30,2,1,0),
(18,'RE-A76BEF','2022-03-05 03:53:25','Motor Diesel Caterpillar ( Genset ) 06 Jun 2022','                  ','HR&GA',NULL,NULL,'<p>You did not select a file to upload.</p>',1,30,1,0,0),
(19,'RE-05CF25','2022-03-05 03:55:31','CARGO LIFT area produksi no. 03, 04 & area catering  (06 Jun 2022)','                                                        ','HR&GA',NULL,NULL,'<p>You did not select a file to upload.</p>',1,30,1,0,0),
(22,'RE-BE146A','2022-03-05 03:59:49','Electric Chain Hoist Crane Line C Die Shop (23 Jun 2022)','                  ','HR&GA',NULL,NULL,'<p>You did not select a file to upload.</p>',1,30,1,0,0),
(23,'RE-7899B9','2022-03-05 04:00:46','Overhead Crane Area Die Shop (23 Jun 2022)','                  ','HR&GA',NULL,NULL,'<p>You did not select a file to upload.</p>',1,30,1,0,0),
(24,'RE-C59AE4','2022-03-05 04:01:49','Forklift (23 Jun 2022)','                  ','HR&GA',NULL,NULL,'<p>You did not select a file to upload.</p>',1,30,1,0,0),
(25,'RE-239391','2022-03-05 04:03:31','Single Girder Electric Overhead Travelling Crane Area Die Shop (17 Okt 2022)','                  ','HR&GA',NULL,NULL,'<p>You did not select a file to upload.</p>',1,30,1,0,0),
(26,'RE-ACA81F','2022-03-05 04:04:36',' Bejana Tetap ( Stotage Tank ) Compressor Area (17 Okt 2022)','                  ','HR&GA',NULL,NULL,'<p>You did not select a file to upload.</p>',1,30,1,0,0),
(27,'RE-C786CC','2022-03-05 04:05:35','Overhead Crane / Hoist Crane Area IM (17 Okt 2022)','<p><span style=\"font-family: &quot;Times New Roman&quot;;\">?</span>                  </p>','HR&GA',NULL,NULL,'<p>You did not select a file to upload.</p>',1,30,1,0,0),
(28,'RE-1B4B87','2022-03-05 04:06:38','CARGO LIFT ( 5 ton ) /Lift Barang IC (17 Okt 2022)','                  ','HR&GA',NULL,NULL,'<p>You did not select a file to upload.</p>',1,30,1,0,0),
(29,'RE-15FA52','2022-03-05 04:07:28','Instalasi Hydrant Hydrant pump Area (17 Okt 2022)','                  ','HR&GA',NULL,NULL,'<p>You did not select a file to upload.</p>',1,30,1,0,0),
(30,'RE-77DF65','2022-03-05 04:08:32','Electrostatis Area Pabrik dan kantor (17 Okt 2022)','                  ','HR&GA',NULL,NULL,'<p>You did not select a file to upload.</p>',1,30,1,0,0),
(31,'RE-E12BFB','2022-03-05 04:09:40','Injection Molding Machine Area Produksi E02 (17 Okt 2022)','                  ','HR&GA',NULL,NULL,'<p>You did not select a file to upload.</p>',1,30,1,0,0),
(32,'RE-DEC920','2022-03-05 04:10:45','Injection Molding Machine Area Produksi D03 (17 Okt 2022)','                  ','HR&GA',NULL,NULL,'<p>You did not select a file to upload.</p>',1,30,1,0,0),
(33,'RE-846610','2022-03-05 04:11:33','Injection Molding Machine D05 (17 Okt 2022)','                  ','HR&GA',NULL,NULL,'<p>You did not select a file to upload.</p>',1,30,1,0,0),
(34,'RE-7863B5','2022-03-05 04:12:30','Injection Molding Machine D02 (17 Okt 2022)','                  ','HR&GA',NULL,NULL,'<p>You did not select a file to upload.</p>',1,30,1,0,0),
(35,'RE-8DEDA4','2022-03-05 04:13:53','Injection Molding Machine F08 (17 Nov 2022)','                                                        ','HR&GA',NULL,NULL,'<p>You did not select a file to upload.</p>',1,30,1,0,0),
(36,'RE-4FC74B','2022-03-05 04:14:43','Injection Molding Machine B10 (17 Nov 2022)','                  ','HR&GA',NULL,NULL,'<p>You did not select a file to upload.</p>',1,30,1,0,0),
(37,'RE-B0ADCA','2022-03-05 04:15:30','Injection Molding Machine Area Produksi B11 (17 Nov 2022)','                  ','HR&GA',NULL,NULL,'<p>You did not select a file to upload.</p>',1,30,1,0,0),
(38,'RE-C7470B','2022-03-05 04:16:30','Injection Molding Machine Area Produksi B12 (17 Nov 2022)','                  ','HR&GA',NULL,NULL,'<p>You did not select a file to upload.</p>',1,30,1,0,0),
(39,'RE-27C478','2022-03-05 04:17:35','Injection Molding Machine Area Produksi F11 (17 Nov 2022)','                  ','HR&GA',NULL,NULL,'<p>You did not select a file to upload.</p>',1,30,1,0,0),
(40,'RE-27462D','2022-03-05 04:18:29','Injection Molding Machine C04 (17 Nov 2022)','                  ','HR&GA',NULL,NULL,'<p>You did not select a file to upload.</p>',1,30,1,0,0),
(41,'RE-CDFA41','2022-03-05 04:19:11','Injection Molding Machine C05 (17 Nov 2022)','                  ','HR&GA',NULL,NULL,'<p>You did not select a file to upload.</p>',1,30,1,0,0),
(42,'RE-699372','2022-03-05 04:19:57','Injection Molding Machine E06','                  ','HR&GA',NULL,NULL,'<p>You did not select a file to upload.</p>',1,30,1,0,0),
(43,'RE-1E04D7','2022-03-05 04:20:41','Injection Molding Machine D01 (17 Nov 2022)','                  ','HR&GA',NULL,NULL,'<p>You did not select a file to upload.</p>',1,30,1,0,0);

/*Table structure for table `reminder_recepient` */

DROP TABLE IF EXISTS `reminder_recepient`;

CREATE TABLE `reminder_recepient` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `REMINDER_ID` int(11) DEFAULT NULL,
  `RECEPIENT_ID` int(11) DEFAULT NULL,
  `STATUS` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=111 DEFAULT CHARSET=latin1;

/*Data for the table `reminder_recepient` */

insert  into `reminder_recepient`(`ID`,`REMINDER_ID`,`RECEPIENT_ID`,`STATUS`) values 
(3,4,1,NULL),
(4,4,3,NULL),
(5,2,1,NULL),
(6,2,3,NULL),
(27,7,5,NULL),
(28,7,6,NULL),
(29,7,7,NULL),
(30,8,5,NULL),
(31,8,6,NULL),
(32,8,7,NULL),
(33,9,5,NULL),
(34,9,7,NULL),
(35,10,5,NULL),
(36,10,8,NULL),
(41,13,8,NULL),
(42,13,9,NULL),
(43,12,8,NULL),
(44,12,9,NULL),
(45,14,8,NULL),
(46,14,9,NULL),
(47,15,8,NULL),
(48,15,9,NULL),
(49,16,8,NULL),
(50,16,9,NULL),
(51,17,8,NULL),
(52,17,9,NULL),
(53,18,8,NULL),
(54,18,9,NULL),
(57,19,8,NULL),
(58,19,9,NULL),
(63,22,8,NULL),
(64,22,9,NULL),
(65,23,8,NULL),
(66,23,9,NULL),
(67,24,8,NULL),
(68,24,9,NULL),
(69,25,8,NULL),
(70,25,9,NULL),
(71,26,8,NULL),
(72,26,9,NULL),
(73,27,8,NULL),
(74,27,9,NULL),
(75,28,8,NULL),
(76,28,9,NULL),
(77,29,8,NULL),
(78,29,9,NULL),
(79,30,8,NULL),
(80,30,9,NULL),
(81,31,8,NULL),
(82,31,9,NULL),
(83,32,8,NULL),
(84,32,9,NULL),
(85,33,8,NULL),
(86,33,9,NULL),
(87,34,8,NULL),
(88,34,9,NULL),
(91,35,8,NULL),
(92,35,9,NULL),
(93,36,8,NULL),
(94,36,9,NULL),
(95,37,8,NULL),
(96,37,9,NULL),
(97,38,8,NULL),
(98,38,9,NULL),
(99,39,8,NULL),
(100,39,9,NULL),
(101,40,8,NULL),
(102,40,9,NULL),
(103,41,8,NULL),
(104,41,9,NULL),
(105,42,8,NULL),
(106,42,9,NULL),
(107,43,8,NULL),
(108,43,9,NULL),
(109,11,8,NULL),
(110,11,9,NULL);

/*Table structure for table `requests` */

DROP TABLE IF EXISTS `requests`;

CREATE TABLE `requests` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `request_no` varchar(255) NOT NULL,
  `date_time` varchar(255) NOT NULL,
  `date_out` date DEFAULT NULL,
  `paid_status` int(11) NOT NULL,
  `remark` text,
  `last_update` datetime DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `requests` */

insert  into `requests`(`id`,`request_no`,`date_time`,`date_out`,`paid_status`,`remark`,`last_update`,`user_id`) values 
(2,'REQ-F579','1643077111',NULL,1,'',NULL,16);

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
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

/*Data for the table `requests_item` */

insert  into `requests_item`(`id`,`requests_id`,`product_id`,`qty`,`rate`,`amount`) values 
(9,2,13,1,'',''),
(10,2,15,1,'',''),
(11,2,14,1,'',''),
(12,2,16,1,'',''),
(13,2,17,1,'','');

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `schedule` */

/*Table structure for table `section` */

DROP TABLE IF EXISTS `section`;

CREATE TABLE `section` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `section_cd` varchar(15) DEFAULT NULL,
  `section_name` varchar(50) DEFAULT NULL,
  `active` int(11) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `section` */

insert  into `section`(`id`,`section_cd`,`section_name`,`active`) values 
(1,'IT','Information Technology',1),
(4,'HR&GA','HR&GA',1),
(5,'MS','MS',1);

/*Table structure for table `stores` */

DROP TABLE IF EXISTS `stores`;

CREATE TABLE `stores` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `dept` text,
  `active` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

/*Data for the table `stores` */

insert  into `stores`(`id`,`name`,`dept`,`active`) values 
(5,'GA','HR&GA',1),
(9,'TPS','HR&GA',1),
(10,'IT','IT',1),
(11,'MS','MS',1);

/*Table structure for table `user_group` */

DROP TABLE IF EXISTS `user_group`;

CREATE TABLE `user_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

/*Data for the table `user_group` */

insert  into `user_group`(`id`,`user_id`,`group_id`) values 
(1,1,1),
(7,6,4),
(8,7,4),
(9,8,4),
(10,9,5),
(11,10,5),
(12,11,5),
(13,12,5),
(14,13,7),
(15,14,6),
(16,15,7),
(17,16,9),
(18,17,8),
(19,18,8),
(20,19,7),
(21,20,7),
(22,21,9);

/*Table structure for table `user_section` */

DROP TABLE IF EXISTS `user_section`;

CREATE TABLE `user_section` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) DEFAULT NULL,
  `id_section` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `user_section` */

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
  `section` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

/*Data for the table `users` */

insert  into `users`(`id`,`username`,`password`,`email`,`firstname`,`lastname`,`phone`,`gender`,`section`) values 
(1,'admin','$2y$10$yfi5nUQGXUZtMdl27dWAyOd/jMOmATBpiUvJDmUu9hJ5Ro6BE5wsK','admin@admin.com','administrator','','',1,NULL),
(14,'faizal','$2y$10$g4c56qv0fQve7m6Ter63s.K7rzy57bOPbBQ.68TcdpRWougLrLDH2','faizal@tenmaindonesia.local','Faizal','Fadhilah','',1,'IT'),
(15,'agung','$2y$10$LExXjPGswR4T6Jw4qlTZVeDEWd.chY0Jcyjeua1bxoUm5ae5KN28G','agung@tenmaindonesia.local','Agung','','',1,'HR&GA'),
(16,'done','$2y$10$JzAR0yy2BbkeoZUBTdsQOOjf3a.0W.9s8JNAZFaqijNaBbUti0T7G','done@tenmaindonesia.local','Done','','',1,'IT'),
(17,'regina','$2y$10$Bbu27c8yH45/V7sAt/FVi.n/cnFqEOj/lRtEz7dCzgXRdZvqGXFuC','regina@tenmaindonesia.local','Regina','','',2,'MS'),
(18,'risna','$2y$10$qaY7X1MGZmE.TQ61S.ZMyeeUCONoosNTFNZD1SrrcA.2pnVJmCSoW','risna@tenmaindonesia.local','Risna','','',2,'MS'),
(19,'ezrani','$2y$10$Ak4HLqO2RGcHYRR0FRcCauVv./ZUuLeTprb9NJjZ3zz0Xi2founHK','ezrani@tenmaindonesia.locl','Ezrani','Nevada','',1,'HR&GA'),
(20,'rindriana','$2y$10$hp.pvMcSJod1XjD7k11KAuxlQnqiNp0hUdQcQfY5jxY5rJ9byAFIe','rindriana@tenmaindonesia.local','Rindriana','','',2,'HR&GA'),
(21,'yayat','$2y$10$ZyKHxFxcV93.knqV/fPVguhIEdQksB/6z0UcDeqYVeyZa.q9EYYH2','it.team@tenmacorp.co.jp','Ahmad','Hidayatul W','',1,'IT');

/* Procedure structure for procedure `SP_UPD_EMAIL` */

/*!50003 DROP PROCEDURE IF EXISTS  `SP_UPD_EMAIL` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`tmci`@`%` PROCEDURE `SP_UPD_EMAIL`()
BEGIN
		UPDATE reminder t1 SET t1.STATUS = 2 WHERE t1.STATUS_EMAIL >= t1.freq;
		UPDATE agreements t1 SET t1.EMAIL=0 WHERE t1.EMAIL=1 AND  t1.`reminder` < (TO_DAYS(t1.`end`) - TO_DAYS(NOW()));

	END */$$
DELIMITER ;

/*Table structure for table `agreement_aktif` */

DROP TABLE IF EXISTS `agreement_aktif`;

/*!50001 DROP VIEW IF EXISTS `agreement_aktif` */;
/*!50001 DROP TABLE IF EXISTS `agreement_aktif` */;

/*!50001 CREATE TABLE  `agreement_aktif`(
 `id` int(11) ,
 `no_agreement` varchar(50) ,
 `date_create` datetime ,
 `name` text ,
 `supplier` text ,
 `start` date ,
 `end` date ,
 `file` text ,
 `description` text ,
 `reminder` int(11) ,
 `section` varchar(50) ,
 `status` int(2) ,
 `email` int(11) ,
 `diff` int(7) 
)*/;

/*Table structure for table `agreement_aktif_all` */

DROP TABLE IF EXISTS `agreement_aktif_all`;

/*!50001 DROP VIEW IF EXISTS `agreement_aktif_all` */;
/*!50001 DROP TABLE IF EXISTS `agreement_aktif_all` */;

/*!50001 CREATE TABLE  `agreement_aktif_all`(
 `id` int(11) ,
 `no_agreement` varchar(50) ,
 `date_create` datetime ,
 `name` text ,
 `supplier` text ,
 `start` date ,
 `end` date ,
 `file` text ,
 `description` text ,
 `reminder` int(11) ,
 `section` varchar(50) ,
 `status` int(2) ,
 `email` int(11) ,
 `diff` int(7) ,
 `cek` int(7) 
)*/;

/*Table structure for table `reminder_aktif` */

DROP TABLE IF EXISTS `reminder_aktif`;

/*!50001 DROP VIEW IF EXISTS `reminder_aktif` */;
/*!50001 DROP TABLE IF EXISTS `reminder_aktif` */;

/*!50001 CREATE TABLE  `reminder_aktif`(
 `id` int(11) ,
 `no_reminder` varchar(15) ,
 `date_create` datetime ,
 `title` varchar(100) ,
 `description` text ,
 `start` datetime ,
 `end` datetime ,
 `file` text ,
 `freq` int(11) ,
 `reminder` int(11) ,
 `status` int(11) ,
 `status_email` int(11) ,
 `counter` int(11) ,
 `REMINDER_ID` int(11) ,
 `REMINDER_DT` date ,
 `diff` int(7) 
)*/;

/*View structure for view agreement_aktif */

/*!50001 DROP TABLE IF EXISTS `agreement_aktif` */;
/*!50001 DROP VIEW IF EXISTS `agreement_aktif` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`tmci`@`%` SQL SECURITY DEFINER VIEW `agreement_aktif` AS (select `a`.`id` AS `id`,`a`.`no_agreement` AS `no_agreement`,`a`.`date_create` AS `date_create`,`a`.`name` AS `name`,`a`.`supplier` AS `supplier`,`a`.`start` AS `start`,`a`.`end` AS `end`,`a`.`file` AS `file`,`a`.`description` AS `description`,`a`.`reminder` AS `reminder`,`a`.`section` AS `section`,`a`.`status` AS `status`,`a`.`email` AS `email`,(to_days(`a`.`end`) - to_days(now())) AS `diff` from `agreements` `a` where ((`a`.`email` = 0) and (`a`.`status` = 1) and (`a`.`reminder` > (to_days(`a`.`end`) - to_days(now())))) order by `a`.`end`) */;

/*View structure for view agreement_aktif_all */

/*!50001 DROP TABLE IF EXISTS `agreement_aktif_all` */;
/*!50001 DROP VIEW IF EXISTS `agreement_aktif_all` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`tmci`@`%` SQL SECURITY DEFINER VIEW `agreement_aktif_all` AS (select `a`.`id` AS `id`,`a`.`no_agreement` AS `no_agreement`,`a`.`date_create` AS `date_create`,`a`.`name` AS `name`,`a`.`supplier` AS `supplier`,`a`.`start` AS `start`,`a`.`end` AS `end`,`a`.`file` AS `file`,`a`.`description` AS `description`,`a`.`reminder` AS `reminder`,`a`.`section` AS `section`,`a`.`status` AS `status`,`a`.`email` AS `email`,(to_days(`a`.`end`) - to_days(now())) AS `diff`,(to_days(`a`.`end`) - to_days(now())) AS `cek` from `agreements` `a` where ((`a`.`email` in (0,1)) and (`a`.`status` = 1) and (`a`.`reminder` < (to_days(`a`.`end`) - to_days(now())))) order by `a`.`end`) */;

/*View structure for view reminder_aktif */

/*!50001 DROP TABLE IF EXISTS `reminder_aktif` */;
/*!50001 DROP VIEW IF EXISTS `reminder_aktif` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`tmci`@`%` SQL SECURITY DEFINER VIEW `reminder_aktif` AS (select `a`.`id` AS `id`,`a`.`no_reminder` AS `no_reminder`,`a`.`date_create` AS `date_create`,`a`.`title` AS `title`,`a`.`description` AS `description`,`a`.`start` AS `start`,`a`.`end` AS `end`,`a`.`file` AS `file`,`a`.`freq` AS `freq`,`a`.`reminder` AS `reminder`,`a`.`status` AS `status`,`a`.`status_email` AS `status_email`,`a`.`counter` AS `counter`,`b`.`REMINDER_ID` AS `REMINDER_ID`,`b`.`REMINDER_DT` AS `REMINDER_DT`,(to_days(`b`.`REMINDER_DT`) - to_days(now())) AS `diff` from (`reminder` `a` left join `frequent_dt` `b` on((`a`.`id` = `b`.`REMINDER_ID`))) where ((`b`.`STATUS` = 0) and (`a`.`status` = 1)) order by `b`.`REMINDER_DT`) */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
