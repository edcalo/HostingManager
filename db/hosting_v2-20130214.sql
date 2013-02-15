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
  `uid` INTEGER(11) NOT NULL DEFAULT 2000,
  `gid` INTEGER(11) NOT NULL DEFAULT 2000,
  `home_dir` VARCHAR(255) COLLATE latin1_swedish_ci NOT NULL DEFAULT '/srv/empty',
  `shell` VARCHAR(50) COLLATE latin1_swedish_ci NOT NULL DEFAULT '/sbin/nologin',
  `count` INTEGER(11) NOT NULL DEFAULT 0,
  `accessed` TIMESTAMP NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified` TIMESTAMP NOT NULL ON UPDATE CURRENT_TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  `expired` TIMESTAMP NULL DEFAULT '0000-00-00 00:00:00',
  `status` ENUM('expired','enable','disable','quota_exeded') COLLATE latin1_swedish_ci NOT NULL DEFAULT 'enable',
  `is_delete` TINYINT(1) NOT NULL DEFAULT 0,
  PRIMARY KEY USING BTREE (`id`) COMMENT '',
  UNIQUE INDEX `id` USING BTREE (`id`) COMMENT ''
)ENGINE=InnoDB
AUTO_INCREMENT=15 AVG_ROW_LENGTH=16384 CHARACTER SET 'latin1' COLLATE 'latin1_swedish_ci'
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
AVG_ROW_LENGTH=8192 CHARACTER SET 'latin1' COLLATE 'latin1_swedish_ci'
COMMENT=''
;

#
# Structure for the `quota_limits` table : 
#

CREATE TABLE `quota_limits` (
  `id` BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `account_id` INTEGER(11) NOT NULL,
  `account_name` VARCHAR(32) COLLATE latin1_swedish_ci NOT NULL,
  `quota_type` ENUM('user','group','class','all') COLLATE latin1_swedish_ci DEFAULT 'user',
  `per_session` ENUM('false','true') COLLATE latin1_swedish_ci DEFAULT 'false',
  `limit_type` ENUM('soft','hard') COLLATE latin1_swedish_ci DEFAULT 'soft',
  `bytes_in_avail` INTEGER(11) NOT NULL DEFAULT 104857600,
  `bytes_out_avail` INTEGER(11) NOT NULL DEFAULT 0,
  `bytes_xfer_avail` INTEGER(11) NOT NULL DEFAULT 0,
  `files_in_avail` INTEGER(11) DEFAULT 0,
  `files_out_avail` INTEGER(11) NOT NULL DEFAULT 0,
  `files_xfer_avail` INTEGER(11) DEFAULT 0,
  PRIMARY KEY USING BTREE (`id`) COMMENT '',
  UNIQUE INDEX `id` USING BTREE (`id`) COMMENT ''
)ENGINE=InnoDB
AUTO_INCREMENT=2 AVG_ROW_LENGTH=16384 CHARACTER SET 'latin1' COLLATE 'latin1_swedish_ci'
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
AUTO_INCREMENT=26 AVG_ROW_LENGTH=3276 CHARACTER SET 'latin1' COLLATE 'latin1_swedish_ci'
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
AVG_ROW_LENGTH=1638 CHARACTER SET 'latin1' COLLATE 'latin1_swedish_ci'
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
  `user_name` VARCHAR(50) COLLATE latin1_swedish_ci DEFAULT NULL,
  `title` VARCHAR(20) COLLATE latin1_swedish_ci NOT NULL DEFAULT '',
  `first_name` VARCHAR(50) COLLATE latin1_swedish_ci NOT NULL,
  `last_name` VARCHAR(50) COLLATE latin1_swedish_ci NOT NULL,
  `email` VARCHAR(50) COLLATE latin1_swedish_ci NOT NULL,
  `phone` INTEGER(11) NOT NULL,
  `created` DATE NOT NULL,
  `modified` TIMESTAMP NOT NULL ON UPDATE CURRENT_TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  `status` INTEGER(11) NOT NULL DEFAULT 1,
  `photo` CHAR(254) COLLATE latin1_swedish_ci DEFAULT NULL,
  `is_delete` TINYINT(1) NOT NULL DEFAULT 0,
  PRIMARY KEY USING BTREE (`id`) COMMENT '',
  UNIQUE INDEX `id` USING BTREE (`id`) COMMENT '',
  UNIQUE INDEX `email` USING BTREE (`email`) COMMENT '',
  UNIQUE INDEX `user_name` USING BTREE (`user_name`) COMMENT ''
)ENGINE=InnoDB
AUTO_INCREMENT=10 AVG_ROW_LENGTH=16384 CHARACTER SET 'latin1' COLLATE 'latin1_swedish_ci'
COMMENT=''
;

#
# Data for the `accounts` table  (LIMIT -498,500)
#

INSERT INTO `accounts` (`id`, `user_id`, `account_name`, `account_description`, `account_password`, `uid`, `gid`, `home_dir`, `shell`, `count`, `accessed`, `modified`, `expired`, `status`, `is_delete`) VALUES

  (14,9,'hustariz','Pagian personal del Lic Hernan Ustariz para l amateria de Inf145(Introducciu00f3n a la programaciu00f3n - Computaciu00f3n I)<br>','hpscan5590jeT',2000,2000,'/srv/hustariz','/sbin/nologin',0,'0000-00-00 00:00:00','2013-01-27 04:21:01','2013-01-27 04:21:00','expired',0);
COMMIT;

#
# Data for the `accounts_servers` table  (LIMIT -497,500)
#

INSERT INTO `accounts_servers` (`account_id`, `server_id`) VALUES

  (14,1),
  (14,22);
COMMIT;

#
# Data for the `quota_limits` table  (LIMIT -498,500)
#

INSERT INTO `quota_limits` (`id`, `account_id`, `account_name`, `quota_type`, `per_session`, `limit_type`, `bytes_in_avail`, `bytes_out_avail`, `bytes_xfer_avail`, `files_in_avail`, `files_out_avail`, `files_xfer_avail`) VALUES

  (1,14,'hustariz','user','false','soft',104857600,0,0,0,0,0);
COMMIT;

#
# Data for the `servers` table  (LIMIT -494,500)
#

INSERT INTO `servers` (`id`, `server_name`, `fully_qualified_domain_name`, `ip`, `server_description`, `is_active`, `is_delete`) VALUES

  (1,'hosting','hosting.cs.umss.edu.bo','192.138.0.1','fdsfdsfdddd dddd<br>',1,0),
  (22,'webtis','webtis.cs.umss.edu.bo','167.157.26.104','Servidor de pruebas para estudiantes de talleres como ser TBD, TIS, TAA',0,0),
  (23,'test','dsf.gfdg.gfgfg','123.12.12.3','gfdgf',0,0),
  (24,'test','test.cs.umss.edu.bo','192.168.0.1','',0,0),
  (25,'test','test.cs.umss.edu.bo','192.168.0.1','',0,0);
COMMIT;

#
# Data for the `servers_services` table  (LIMIT -489,500)
#

INSERT INTO `servers_services` (`server_id`, `service_id`) VALUES

  (1,1),
  (1,3),
  (1,6),
  (1,7),
  (22,1),
  (22,3),
  (22,6),
  (25,2),
  (25,4),
  (25,7);
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

INSERT INTO `users` (`id`, `user_name`, `title`, `first_name`, `last_name`, `email`, `phone`, `created`, `modified`, `status`, `photo`, `is_delete`) VALUES

  (9,'hustariz','Lic','Hernan','Ustariz','hustariz@cs.umss.edu.bo',70727734,'2013-01-27','2013-01-27 04:21:01',1,NULL,0);
COMMIT;



/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;