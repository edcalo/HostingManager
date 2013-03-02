﻿# SQL Manager Lite for MySQL 5.3.0.2
# ---------------------------------------
# Host     : localhost
# Port     : 3306
# Database : hosting_v3


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

SET FOREIGN_KEY_CHECKS=0;

DROP DATABASE IF EXISTS `hosting_v3`;

CREATE DATABASE `hosting_v3`
    CHARACTER SET 'utf8'
    COLLATE 'utf8_general_ci';

USE `hosting_v3`;

#
# Structure for the `account_access` table : 
#

CREATE TABLE `account_access` (
  `id` INTEGER(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `account_name` VARCHAR(32) COLLATE latin1_swedish_ci NOT NULL,
  `host` VARCHAR(20) COLLATE latin1_swedish_ci NOT NULL,
  `date` DATE NOT NULL,
  `action` CHAR(10) COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY USING BTREE (`id`) COMMENT ''
)ENGINE=InnoDB
AUTO_INCREMENT=1 CHARACTER SET 'latin1' COLLATE 'latin1_swedish_ci'
COMMENT=''
;

#
# Structure for the `account_activities` table : 
#

CREATE TABLE `account_activities` (
  `id` INTEGER(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `account_name` VARCHAR(32) COLLATE latin1_swedish_ci NOT NULL,
  `host` VARCHAR(20) COLLATE latin1_swedish_ci NOT NULL,
  `date` DATE NOT NULL,
  `detail_activity` TEXT COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY USING BTREE (`id`) COMMENT ''
)ENGINE=InnoDB
AUTO_INCREMENT=1 CHARACTER SET 'latin1' COLLATE 'latin1_swedish_ci'
COMMENT=''
;

#
# Structure for the `accounts` table : 
#

CREATE TABLE `accounts` (
  `id` INTEGER(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` INTEGER(11) NOT NULL,
  `server_id` INTEGER(11) NOT NULL,
  `account_name` VARCHAR(20) COLLATE latin1_swedish_ci DEFAULT NULL,
  `account_description` TEXT COLLATE latin1_swedish_ci,
  `account_password` CHAR(40) COLLATE latin1_swedish_ci DEFAULT NULL,
  `uid` INTEGER(11) NOT NULL DEFAULT 2000,
  `gid` INTEGER(11) NOT NULL DEFAULT 2000,
  `home_dir` VARCHAR(255) COLLATE latin1_swedish_ci DEFAULT NULL,
  `shell` VARCHAR(50) COLLATE latin1_swedish_ci DEFAULT NULL,
  `count` INTEGER(11) NOT NULL DEFAULT 0,
  `accessed` TIMESTAMP NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified` TIMESTAMP NOT NULL DEFAULT '0000-00-00 00:00:00',
  `expired` TIMESTAMP NOT NULL DEFAULT '0000-00-00 00:00:00',
  `status` ENUM('expired','enable','disable','quota_exeded') COLLATE latin1_swedish_ci NOT NULL DEFAULT 'enable',
  `is_delete` TINYINT(1) NOT NULL DEFAULT 0,
  PRIMARY KEY USING BTREE (`id`) COMMENT ''
)ENGINE=InnoDB
AUTO_INCREMENT=25 AVG_ROW_LENGTH=1820 CHARACTER SET 'latin1' COLLATE 'latin1_swedish_ci'
COMMENT=''
;

#
# Structure for the `quota_limits` table : 
#

CREATE TABLE `quota_limits` (
  `id` INTEGER(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `account_id` INTEGER(11) NOT NULL,
  `account_name` VARCHAR(32) COLLATE latin1_swedish_ci NOT NULL,
  `quota_type` ENUM('user','group','class','all') COLLATE latin1_swedish_ci NOT NULL DEFAULT 'user',
  `per_session` ENUM('false','true') COLLATE latin1_swedish_ci NOT NULL DEFAULT 'false',
  `limit_type` ENUM('soft','hard') COLLATE latin1_swedish_ci NOT NULL DEFAULT 'soft',
  `bytes_in_avail` INTEGER(11) NOT NULL DEFAULT 104857600,
  `bytes_out_avail` INTEGER(11) NOT NULL DEFAULT 0,
  `bytes_xfer_avail` INTEGER(11) NOT NULL DEFAULT 0,
  `files_in_avail` INTEGER(11) NOT NULL DEFAULT 0,
  `files_out_avail` INTEGER(11) NOT NULL DEFAULT 0,
  `files_xfer_avail` INTEGER(11) DEFAULT 0,
  PRIMARY KEY USING BTREE (`id`) COMMENT ''
)ENGINE=InnoDB
AUTO_INCREMENT=12 AVG_ROW_LENGTH=1820 CHARACTER SET 'latin1' COLLATE 'latin1_swedish_ci'
COMMENT=''
;

#
# Structure for the `quota_tallies` table : 
#

CREATE TABLE `quota_tallies` (
  `id` INTEGER(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `account_id` INTEGER(11) NOT NULL,
  `account_name` VARCHAR(32) COLLATE latin1_swedish_ci NOT NULL,
  `bytes_in_used` INTEGER(11) NOT NULL DEFAULT 0,
  `bytes_out_used` INTEGER(11) NOT NULL DEFAULT 0,
  `files_in_used` INTEGER(11) NOT NULL DEFAULT 0,
  `files_out_userd` INTEGER(11) NOT NULL DEFAULT 0,
  `files_xfer_used` INTEGER(11) NOT NULL DEFAULT 0,
  PRIMARY KEY USING BTREE (`id`) COMMENT ''
)ENGINE=InnoDB
AUTO_INCREMENT=1 CHARACTER SET 'latin1' COLLATE 'latin1_swedish_ci'
COMMENT=''
;

#
# Structure for the `servers` table : 
#

CREATE TABLE `servers` (
  `id` INTEGER(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `server_name` VARCHAR(20) COLLATE latin1_swedish_ci NOT NULL,
  `fully_qualified_domain_name` VARCHAR(255) COLLATE latin1_swedish_ci NOT NULL,
  `work_dir` VARCHAR(255) COLLATE latin1_swedish_ci NOT NULL,
  `ip` VARCHAR(15) COLLATE latin1_swedish_ci NOT NULL,
  `server_description` TEXT COLLATE latin1_swedish_ci,
  `is_active` TINYINT(1) NOT NULL DEFAULT 1,
  `is_delete` TINYINT(1) NOT NULL DEFAULT 0,
  PRIMARY KEY USING BTREE (`id`) COMMENT ''
)ENGINE=InnoDB
AUTO_INCREMENT=3 AVG_ROW_LENGTH=8192 CHARACTER SET 'latin1' COLLATE 'latin1_swedish_ci'
COMMENT=''
;

#
# Structure for the `servers_services` table : 
#

CREATE TABLE `servers_services` (
  `server_id` INTEGER(11) NOT NULL,
  `service_id` INTEGER(11) NOT NULL
)ENGINE=InnoDB
AVG_ROW_LENGTH=8192 CHARACTER SET 'latin1' COLLATE 'latin1_swedish_ci'
COMMENT=''
;

#
# Structure for the `services` table : 
#

CREATE TABLE `services` (
  `id` INTEGER(11) NOT NULL AUTO_INCREMENT,
  `service_name` VARCHAR(50) COLLATE latin1_swedish_ci NOT NULL,
  `service_description` TEXT COLLATE latin1_swedish_ci,
  `service_port` INTEGER(11) NOT NULL,
  `is_delete` TINYINT(1) NOT NULL DEFAULT 0,
  `image` VARCHAR(255) COLLATE latin1_swedish_ci DEFAULT NULL,
  PRIMARY KEY USING BTREE (`id`) COMMENT ''
)ENGINE=InnoDB
AUTO_INCREMENT=9 AVG_ROW_LENGTH=2048 CHARACTER SET 'latin1' COLLATE 'latin1_swedish_ci'
COMMENT=''
;

#
# Structure for the `users` table : 
#

CREATE TABLE `users` (
  `id` INTEGER(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_name` VARCHAR(50) COLLATE latin1_swedish_ci NOT NULL,
  `title` VARCHAR(20) COLLATE latin1_swedish_ci DEFAULT NULL,
  `first_name` VARCHAR(50) COLLATE latin1_swedish_ci NOT NULL,
  `last_name` VARCHAR(50) COLLATE latin1_swedish_ci DEFAULT NULL,
  `email` VARCHAR(50) COLLATE latin1_swedish_ci NOT NULL,
  `phone` VARCHAR(30) COLLATE latin1_swedish_ci DEFAULT NULL,
  `created` DATE NOT NULL,
  `modified` TIMESTAMP NOT NULL ON UPDATE CURRENT_TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  `status` INTEGER(11) NOT NULL DEFAULT 1,
  `photo` VARCHAR(255) COLLATE latin1_swedish_ci DEFAULT NULL,
  `is_delete` TINYINT(1) NOT NULL DEFAULT 0,
  PRIMARY KEY USING BTREE (`id`) COMMENT ''
)ENGINE=InnoDB
AUTO_INCREMENT=8 AVG_ROW_LENGTH=2730 CHARACTER SET 'latin1' COLLATE 'latin1_swedish_ci'
COMMENT=''
;

#
# Data for the `accounts` table  (LIMIT -490,500)
#

INSERT INTO `accounts` (`id`, `user_id`, `server_id`, `account_name`, `account_description`, `account_password`, `uid`, `gid`, `home_dir`, `shell`, `count`, `accessed`, `modified`, `expired`, `status`, `is_delete`) VALUES

  (16,2,1,'aaaaa','','aaa',2000,2000,'/srv/aaaaa',NULL,0,'0000-00-00 00:00:00','2013-03-01 04:41:52','2013-03-01 04:41:51','expired',0),
  (17,3,2,'cc','','cc',2000,2000,'/srv/cc',NULL,0,'0000-00-00 00:00:00','2013-03-01 04:44:23','2013-03-01 04:44:22','enable',0),
  (18,4,1,'cc','','cc',2000,2000,'/srv/cc',NULL,0,'0000-00-00 00:00:00','2013-03-01 04:44:23','2013-03-01 04:44:22','quota_exeded',0),
  (19,5,2,'zzzz','','zzz',2000,2000,'/srv/zzzz',NULL,0,'0000-00-00 00:00:00','2013-03-01 21:55:48','2013-03-01 21:55:47','disable',0),
  (20,5,1,'zzzz','','zzz',2000,2000,'/srv/zzzz',NULL,0,'0000-00-00 00:00:00','2013-03-01 21:55:48','2013-03-01 21:55:47','enable',0),
  (21,6,1,'dsads','','ddd',2000,2000,'/srv/dsads',NULL,0,'0000-00-00 00:00:00','2013-03-02 00:50:07','2013-03-02 00:50:06','enable',0),
  (22,6,2,'dsads','','ddd',2000,2000,'/srv/dsads',NULL,0,'0000-00-00 00:00:00','2013-03-02 00:50:07','2013-03-02 00:50:06','expired',0),
  (23,7,2,'mmm','','mmm',2000,2000,'/srv/mmm',NULL,0,'0000-00-00 00:00:00','2013-03-02 01:05:21','2013-03-02 01:05:20','quota_exeded',0),
  (24,7,1,'mmm','','mmm',2000,2000,'/srv/mmm',NULL,0,'0000-00-00 00:00:00','2013-03-02 01:05:21','2013-03-02 01:05:20','expired',0);
COMMIT;

#
# Data for the `quota_limits` table  (LIMIT -490,500)
#

INSERT INTO `quota_limits` (`id`, `account_id`, `account_name`, `quota_type`, `per_session`, `limit_type`, `bytes_in_avail`, `bytes_out_avail`, `bytes_xfer_avail`, `files_in_avail`, `files_out_avail`, `files_xfer_avail`) VALUES

  (3,16,'aaaaa','user','false','soft',52428800,0,0,0,0,0),
  (4,17,'cc','user','false','soft',52428800,0,0,0,0,0),
  (5,18,'cc','user','false','soft',52428800,0,0,0,0,0),
  (6,19,'zzzz','user','false','soft',52428800,0,0,0,0,0),
  (7,20,'zzzz','user','false','soft',52428800,0,0,0,0,0),
  (8,21,'dsads','user','false','soft',52428800,0,0,0,0,0),
  (9,22,'dsads','user','false','soft',52428800,0,0,0,0,0),
  (10,23,'mmm','user','false','soft',52428800,0,0,0,0,0),
  (11,24,'mmm','user','false','soft',52428800,0,0,0,0,0);
COMMIT;

#
# Data for the `servers` table  (LIMIT -497,500)
#

INSERT INTO `servers` (`id`, `server_name`, `fully_qualified_domain_name`, `work_dir`, `ip`, `server_description`, `is_active`, `is_delete`) VALUES

  (1,'test','test.domain.net','/srv/dns','192.168.0.1','',0,0),
  (2,'aaa','a.a.a.a','aa','192.168.0.3','',0,0);
COMMIT;

#
# Data for the `servers_services` table  (LIMIT -497,500)
#

INSERT INTO `servers_services` (`server_id`, `service_id`) VALUES

  (1,1),
  (2,1);
COMMIT;

#
# Data for the `services` table  (LIMIT -491,500)
#

INSERT INTO `services` (`id`, `service_name`, `service_description`, `service_port`, `is_delete`, `image`) VALUES

  (1,'MySQL','Servidor de base de datos Mysql',3307,0,'database.png'),
  (2,'Postgres','Servidor de Base de Datos Postgres',5432,0,'database.png'),
  (3,'FTP','Servidor de Archivos FTP<br>',21,0,'ftp.png'),
  (4,'SSH','Servicio de administracion remota en equipos linux<br>',22,0,'cog.png'),
  (5,'DNS','Servicio de resolucion de nombres<br>',53,0,'dns.png'),
  (6,'HTTP','Servidor Web basado en apache<br>',80,0,'domain_template.png'),
  (7,'HTTPS','',443,0,'domain_template.png'),
  (8,'SMPT','Servicio de Correo electronico<br>',25,0,'cog.png');
COMMIT;

#
# Data for the `users` table  (LIMIT -493,500)
#

INSERT INTO `users` (`id`, `user_name`, `title`, `first_name`, `last_name`, `email`, `phone`, `created`, `modified`, `status`, `photo`, `is_delete`) VALUES

  (2,'aaaaa','Univ','aa','aaaa','a@aaaaa.vv','11111','2013-03-01','2013-03-01 04:41:52',1,NULL,0),
  (3,'cc','Univ','cc','cc','cc@cc.cc','707','2013-03-01','2013-03-01 04:44:23',1,NULL,0),
  (4,'cc','Univ','cc','cc','cc@cc.cc','707','2013-03-01','2013-03-01 04:44:23',1,NULL,0),
  (5,'zzzz','Univ','zzzzz','zzzzz','zzzzzzz@z.zzz','11111','2013-03-01','2013-03-01 21:55:48',1,NULL,0),
  (6,'dsads','Univ','dsads','dsa','dsad@dsads.ff','3213','2013-03-02','2013-03-02 00:50:07',1,NULL,0),
  (7,'mmm','Univ','mmm','mmmmmmmm','mmmmmmm@mmmm.mmm','123','2013-03-02','2013-03-02 01:05:21',1,NULL,0);
COMMIT;



/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;