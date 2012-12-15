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
  `account_password` CHAR(40) COLLATE latin1_swedish_ci NOT NULL,
  `uid` INTEGER(11) NOT NULL,
  `gid` INTEGER(11) NOT NULL,
  `home_dir` VARCHAR(255) COLLATE latin1_swedish_ci NOT NULL,
  `shell` VARCHAR(50) COLLATE latin1_swedish_ci NOT NULL,
  `count` INTEGER(11) NOT NULL,
  `accessed` DATE NOT NULL,
  `expired` DATE DEFAULT NULL,
  PRIMARY KEY USING BTREE (`id`) COMMENT '',
  UNIQUE INDEX `id` USING BTREE (`id`) COMMENT ''
)ENGINE=InnoDB
AUTO_INCREMENT=1 CHARACTER SET 'latin1' COLLATE 'latin1_swedish_ci'
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
CHARACTER SET 'latin1' COLLATE 'latin1_swedish_ci'
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
  `is_active` CHAR(6) COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY USING BTREE (`id`) COMMENT '',
  UNIQUE INDEX `id` USING BTREE (`id`) COMMENT ''
)ENGINE=InnoDB
AUTO_INCREMENT=2 AVG_ROW_LENGTH=16384 CHARACTER SET 'latin1' COLLATE 'latin1_swedish_ci'
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
  `image` VARCHAR(20) COLLATE latin1_swedish_ci DEFAULT 'cog.png',
  PRIMARY KEY USING BTREE (`id`) COMMENT '',
  UNIQUE INDEX `service_name` USING BTREE (`service_name`) COMMENT ''
)ENGINE=InnoDB
AUTO_INCREMENT=15 AVG_ROW_LENGTH=2048 CHARACTER SET 'latin1' COLLATE 'latin1_swedish_ci'
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
  `is_deleted` TINYINT(1) NOT NULL,
  PRIMARY KEY USING BTREE (`id`) COMMENT '',
  UNIQUE INDEX `id` USING BTREE (`id`) COMMENT ''
)ENGINE=InnoDB
AUTO_INCREMENT=1 CHARACTER SET 'latin1' COLLATE 'latin1_swedish_ci'
COMMENT=''
;

#
# Data for the `servers` table  (LIMIT -498,500)
#

INSERT INTO `servers` (`id`, `server_name`, `fully_qualified_domain_name`, `ip`, `server_description`, `is_active`) VALUES

  (1,'hosting','hosting.cs.umss.edu.bo','192.138.0.1','fdsfdsf','1');
COMMIT;

#
# Data for the `servers_services` table  (LIMIT -497,500)
#

INSERT INTO `servers_services` (`server_id`, `service_id`) VALUES

  (1,0),
  (1,2);
COMMIT;

#
# Data for the `services` table  (LIMIT -491,500)
#

INSERT INTO `services` (`id`, `service_name`, `service_description`, `service_port`, `is_delete`, `image`) VALUES

  (1,'MySQL','Servidor de base de datos Mysql',3306,0,'database.png'),
  (2,'Postgres','Servidor de Base de Datos Postgres',5432,0,'database.png'),
  (3,'FTP','Servidor de Archivos FTP',21,0,'ftp.png'),
  (4,'SSH','',22,0,'cog.png'),
  (5,'DNS','',53,0,'dns.png'),
  (6,'HTTP','',80,0,'domain_template.png'),
  (7,'HTTPS','',443,0,'domain_template.png'),
  (8,'SMPT','',25,0,'cog.png');
COMMIT;



/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;