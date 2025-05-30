/*
SQLyog Ultimate v12.09 (64 bit)
MySQL - 5.7.26 : Database - sql
*********************************************************************
*/


/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`sql` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci */;

USE `sql`;

/*Table structure for table `diff_mid` */

DROP TABLE IF EXISTS `diff_mid`;

CREATE TABLE `diff_mid` (
  `id` double DEFAULT NULL,
  `Name` char(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Position` char(32) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `diff_mid` */

insert  into `diff_mid`(`id`,`Name`,`Position`) values (1,'Hyyy','CEO'),(2,'xiaoming','COO'),(3,'admin','CIO'),(4,'cxk','chicken');

/*Table structure for table `flags` */

DROP TABLE IF EXISTS `flags`;

CREATE TABLE `flags` (
  `flag` char(64) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `flags` */

insert  into `flags`(`flag`) values ('flag{Hyyy_No.1_6666!!!}');

/*Table structure for table `scores` */

DROP TABLE IF EXISTS `scores`;

CREATE TABLE `scores` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `challenge_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `score` int(11) NOT NULL DEFAULT '0',
  `completed_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `flag` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_user_id_idx` (`user_id`),
  CONSTRAINT `fk_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `scores` */

/*Table structure for table `shenji` */

DROP TABLE IF EXISTS `shenji`;

CREATE TABLE `shenji` (
  `id` int(6) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `salary` int(8) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `shenji` */

insert  into `shenji`(`id`,`name`,`email`,`salary`) values (2,'Danny','Danny@hongri.com',4500),(3,'Alina','Alina@hongri.com',2700),(4,'Jameson','Jameson@hongri.com',10000),(5,'Allie','Allie@hongri.com',6000),(1,'Lucia','Lucia@hongri.com',3000);

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username_UNIQUE` (`username`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`username`,`password`,`email`,`created_at`) values (1,'admin','admin+cxk','','2025-04-07 16:57:23'),(2,'cxk','cxk','','2025-04-07 16:57:23'),(3,'huangyuhao','$2y$10$kB9nZsK7yTuI0LXAzbMyd.YsWjRFdxnt8ZB2mysTyKjzipmx.rYay','123@qq.com','2025-04-07 17:15:52');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

