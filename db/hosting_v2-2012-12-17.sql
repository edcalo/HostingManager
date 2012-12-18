# SQL Manager Lite for MySQL 5.3.0.2
# ---------------------------------------
# Host     : localhost
# Port     : 3306
# Database : hosting_v2


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES latin1 */;

SET FOREIGN_KEY_CHECKS=0;

CREATE DATABASE `hosting_v2`
    CHARACTER SET 'latin1'
    COLLATE 'latin1_swedish_ci';

USE `hosting_v2`;

#
# Structure for the `account_access` table : 
#

CREATE TABLE `account_access` (
  `id` BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `account_name` VARCHAR(32) COLLATE latin1_swedish_ci NOT NULL,
  `host` VARCHAR(20) COLLATE latin1_swedish_ci NOT NULL,
  `date` DATE NOT NULL,
  `action` CHAR(10) COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY USING BTREE (`id`) COMMENT '',
  UNIQUE INDEX `id` USING BTREE (`id`) COMMENT ''
)ENGINE=InnoDB
AUTO_INCREMENT=1 CHARACTER SET 'latin1' COLLATE 'latin1_swedish_ci'
COMMENT=''
;

#
# Structure for the `account_activities` table : 
#

CREATE TABLE `account_activities` (
  `id` BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `account_name` VARCHAR(32) COLLATE latin1_swedish_ci NOT NULL,
  `host` VARCHAR(20) COLLATE latin1_swedish_ci NOT NULL,
  `date` DATE NOT NULL,
  `detail_activity` TEXT COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY USING BTREE (`id`) COMMENT '',
  UNIQUE INDEX `id` USING BTREE (`id`) COMMENT ''
)ENGINE=InnoDB
AUTO_INCREMENT=1 CHARACTER SET 'latin1' COLLATE 'latin1_swedish_ci'
COMMENT=''
;

#
# Structure for the `accounts` table : 
#

CREATE TABLE `accounts` (
  `id` BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` INTEGER(11) NOT NULL,
  `account_name` VARCHAR(20) COLLATE latin1_swedish_ci NOT NULL,
  `account_description` TEXT COLLATE latin1_swedish_ci,
  `account_password` CHAR(40) COLLATE latin1_swedish_ci NOT NULL,
  `uid` INTEGER(11) NOT NULL,
  `gid` INTEGER(11) NOT NULL,
  `home_dir` VARCHAR(255) COLLATE latin1_swedish_ci NOT NULL,
  `shell` VARCHAR(50) COLLATE latin1_swedish_ci NOT NULL,
  `count` INTEGER(11) NOT NULL,
  `accessed` DATE NOT NULL,
  `expired` DATE DEFAULT NULL,
  `status` INTEGER(11) DEFAULT 1,
  PRIMARY KEY USING BTREE (`id`) COMMENT '',
  UNIQUE INDEX `id` USING BTREE (`id`) COMMENT ''
)ENGINE=InnoDB
AUTO_INCREMENT=2 AVG_ROW_LENGTH=16384 CHARACTER SET 'latin1' COLLATE 'latin1_swedish_ci'
COMMENT=''
;

#
# Structure for the `accounts_servers` table : 
#

CREATE TABLE `accounts_servers` (
  `account_id` INTEGER(11) NOT NULL,
  `server_id` INTEGER(11) NOT NULL,
  PRIMARY KEY USING BTREE (`account_id`, `server_id`) COMMENT ''
)ENGINE=InnoDB
AVG_ROW_LENGTH=4096 CHARACTER SET 'latin1' COLLATE 'latin1_swedish_ci'
COMMENT=''
;

#
# Structure for the `quota_limits` table : 
#

CREATE TABLE `quota_limits` (
  `id` BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `account_id` INTEGER(11) NOT NULL,
  `account_name` VARCHAR(32) COLLATE latin1_swedish_ci DEFAULT NULL,
  `quota_type` TINYINT(1) DEFAULT NULL,
  `per_session` TINYINT(1) DEFAULT NULL,
  `limit_type` TINYINT(1) DEFAULT NULL,
  `bytes_in_avail` INTEGER(11) DEFAULT NULL,
  `bytes_out_avail` INTEGER(11) DEFAULT NULL,
  `bytes_xfer_avail` INTEGER(11) DEFAULT NULL,
  `files_in_avail` INTEGER(11) DEFAULT NULL,
  `files_out_avail` INTEGER(11) DEFAULT NULL,
  `files_xfer_avail` INTEGER(11) DEFAULT NULL,
  PRIMARY KEY USING BTREE (`id`) COMMENT '',
  UNIQUE INDEX `id` USING BTREE (`id`) COMMENT ''
)ENGINE=InnoDB
AUTO_INCREMENT=1 CHARACTER SET 'latin1' COLLATE 'latin1_swedish_ci'
COMMENT=''
;

#
# Structure for the `quota_tallies` table : 
#

CREATE TABLE `quota_tallies` (
  `id` BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `account_id` INTEGER(11) NOT NULL,
  `account_name` VARCHAR(32) COLLATE latin1_swedish_ci DEFAULT NULL,
  `bytes_in_used` INTEGER(11) DEFAULT NULL,
  `bytes_out_used` INTEGER(11) DEFAULT NULL,
  `files_in_used` INTEGER(11) DEFAULT NULL,
  `files_out_userd` INTEGER(11) DEFAULT NULL,
  `files_xfer_used` INTEGER(11) DEFAULT NULL,
  PRIMARY KEY USING BTREE (`id`) COMMENT '',
  UNIQUE INDEX `id` USING BTREE (`id`) COMMENT ''
)ENGINE=InnoDB
AUTO_INCREMENT=1 CHARACTER SET 'latin1' COLLATE 'latin1_swedish_ci'
COMMENT=''
;

#
# Structure for the `servers` table : 
#

CREATE TABLE `servers` (
  `id` BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `server_name` VARCHAR(20) COLLATE latin1_swedish_ci NOT NULL,
  `fully_qualified_domain_name` VARCHAR(255) COLLATE latin1_swedish_ci DEFAULT NULL,
  `ip` VARCHAR(15) COLLATE latin1_swedish_ci DEFAULT NULL,
  `server_description` TEXT COLLATE latin1_swedish_ci,
  `is_active` TINYINT(1) NOT NULL DEFAULT 1,
  `is_delete` TINYINT(1) DEFAULT 0,
  PRIMARY KEY USING BTREE (`id`) COMMENT '',
  UNIQUE INDEX `id` USING BTREE (`id`) COMMENT ''
)ENGINE=InnoDB
AUTO_INCREMENT=22 AVG_ROW_LENGTH=780 CHARACTER SET 'latin1' COLLATE 'latin1_swedish_ci'
COMMENT=''
;

#
# Structure for the `servers_services` table : 
#

CREATE TABLE `servers_services` (
  `server_id` INTEGER(11) NOT NULL,
  `service_id` INTEGER(11) NOT NULL,
  PRIMARY KEY USING BTREE (`server_id`, `service_id`) COMMENT '',
   INDEX `server_id` USING BTREE (`server_id`) COMMENT ''
)ENGINE=InnoDB
AVG_ROW_LENGTH=1092 CHARACTER SET 'latin1' COLLATE 'latin1_swedish_ci'
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
  `image` VARCHAR(20) COLLATE latin1_swedish_ci DEFAULT 'cog.png',
  PRIMARY KEY USING BTREE (`id`) COMMENT '',
  UNIQUE INDEX `service_name` USING BTREE (`service_name`) COMMENT ''
)ENGINE=InnoDB
AUTO_INCREMENT=11 AVG_ROW_LENGTH=1638 CHARACTER SET 'latin1' COLLATE 'latin1_swedish_ci'
COMMENT=''
;

#
# Structure for the `users` table : 
#

CREATE TABLE `users` (
  `id` BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `first_name` VARCHAR(50) COLLATE latin1_swedish_ci NOT NULL,
  `last_name` VARCHAR(50) COLLATE latin1_swedish_ci NOT NULL,
  `email` VARCHAR(50) COLLATE latin1_swedish_ci NOT NULL,
  `created` DATE NOT NULL,
  `modified` DATE NOT NULL,
  `status` CHAR(6) COLLATE latin1_swedish_ci NOT NULL,
  `photo` CHAR(254) COLLATE latin1_swedish_ci DEFAULT NULL,
  `is_delete` TINYINT(1) NOT NULL DEFAULT 0,
  PRIMARY KEY USING BTREE (`id`) COMMENT '',
  UNIQUE INDEX `id` USING BTREE (`id`) COMMENT '',
  UNIQUE INDEX `email` USING BTREE (`email`) COMMENT ''
)ENGINE=InnoDB
AUTO_INCREMENT=2 AVG_ROW_LENGTH=16384 CHARACTER SET 'latin1' COLLATE 'latin1_swedish_ci'
COMMENT=''
;

#
# Data for the `accounts` table  (LIMIT -498,500)
#

INSERT INTO `accounts` (`id`, `user_id`, `account_name`, `account_description`, `account_password`, `uid`, `gid`, `home_dir`, `shell`, `count`, `accessed`, `expired`, `status`) VALUES

  (1,1,'test',NULL,'test',500,500,'gfdsggfdg','gfdgfd',1,'2012-12-17','2012-12-31',1);
COMMIT;

#
# Data for the `servers` table  (LIMIT -481,500)
#

INSERT INTO `servers` (`id`, `server_name`, `fully_qualified_domain_name`, `ip`, `server_description`, `is_active`, `is_delete`) VALUES

  (1,'hosting','hosting.cs.umss.edu.bo','192.138.0.1','fdsfdsfdddd dddd<br>',1,0),
  (2,'fdsfds','','32.43.44.33','fsddfsf',0,1),
  (3,'fdsfds fds','','243.24.32.4','vfdfv fd gdfg fdg fd gfd gfd gfd <br>',0,1),
  (4,'g fdddsds ','','192.168.0.1','ascxc',0,1),
  (5,'svfdsv','','192.168.0.12','fdsfds',0,1),
  (6,'fdsfds','','12.3.4.5','fds',0,1),
  (10,'dsads','','1.1.1.1','dsvdsv ds ds<br>',0,0),
  (11,'sdadaa','','1.1.1.1',' fdsf dsf ds fds fds<br>',0,0),
  (12,'fsfds','','1.1.1.1','sfdsf',0,0),
  (13,'aafsdas','','1.1.1.1','fdfdsfds',0,0),
  (14,'ewrewr','','123.1.1.1','dsadsadsa',0,0),
  (15,'xcxvcxv','','1.1.1.1','fdsfds',0,0),
  (16,'dfgdgfg','','1.1.1.1','cxcxvcxv',0,0),
  (17,'test','test.test.test','2.2.2.2','fdsfds',0,0),
  (18,'ggg','ggg','1.1.1.1','ggg',0,0),
  (19,'ffff','fffff','1.1.1.1','fffffffu200b',0,0),
  (20,'1111','11111','1.1.1.1','1111',0,0),
  (21,'312321','312321','1.1.1.1','312321',0,0);
COMMIT;

#
# Data for the `servers_services` table  (LIMIT -490,500)
#

INSERT INTO `servers_services` (`server_id`, `service_id`) VALUES

  (1,5),
  (1,8),
  (1,10),
  (17,6),
  (21,1),
  (21,3),
  (21,4),
  (21,6),
  (21,7);
COMMIT;

#
# Data for the `services` table  (LIMIT -489,500)
#

INSERT INTO `services` (`id`, `service_name`, `service_description`, `service_port`, `is_delete`, `image`) VALUES

  (1,'MySQL','Servidor de base de datos Mysql',3307,0,'database.png'),
  (2,'Postgres','Servidor de Base de Datos Postgres',5432,0,'database.png'),
  (3,'FTP','Servidor de Archivos FTP<br>',21,0,'ftp.png'),
  (4,'SSH','Servicio de administracion remota en equipos linux<br>',22,0,'cog.png'),
  (5,'DNS','Servicio de resolucion de nombres<br>',53,0,'dns.png'),
  (6,'HTTP','Servidor Web basado en apache<br>',80,0,'domain_template.png'),
  (7,'HTTPS','',443,0,'domain_template.png'),
  (8,'SMPT','Servicio de Correo electronico<br>',25,0,'cog.png'),
  (9,'csfds','fdsfd',3243,1,'cog.png'),
  (10,'fdsfds','543sfrsf',435,1,'cog.png');
COMMIT;

#
# Data for the `users` table  (LIMIT -498,500)
#

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `created`, `modified`, `status`, `photo`, `is_delete`) VALUES

  (1,'elvis','caceres','edcalo@gmail.com','2012-12-17','2012-12-17','1',NULL,0);
COMMIT;



/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;