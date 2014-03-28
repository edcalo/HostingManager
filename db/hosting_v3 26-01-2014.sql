# SQL Manager Lite for MySQL 5.4.0.42211
# ---------------------------------------
# Host     : localhost
# Port     : 3306
# Database : hosting_v3


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

SET FOREIGN_KEY_CHECKS=0;

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
AUTO_INCREMENT=41 AVG_ROW_LENGTH=4096 CHARACTER SET 'latin1' COLLATE 'latin1_swedish_ci'
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
AUTO_INCREMENT=28 AVG_ROW_LENGTH=4096 CHARACTER SET 'latin1' COLLATE 'latin1_swedish_ci'
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
AVG_ROW_LENGTH=1365 CHARACTER SET 'latin1' COLLATE 'latin1_swedish_ci'
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
AUTO_INCREMENT=13 AVG_ROW_LENGTH=2048 CHARACTER SET 'latin1' COLLATE 'latin1_swedish_ci'
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
AUTO_INCREMENT=16 AVG_ROW_LENGTH=8192 CHARACTER SET 'latin1' COLLATE 'latin1_swedish_ci'
COMMENT=''
;

#
# Data for the `accounts` table  (LIMIT -495,500)
#

INSERT INTO `accounts` (`id`, `user_id`, `server_id`, `account_name`, `account_description`, `account_password`, `uid`, `gid`, `home_dir`, `shell`, `count`, `accessed`, `modified`, `expired`, `status`, `is_delete`) VALUES

  (37,14,2,'qqq','','qqq',2000,2000,'/srv/qqq',NULL,0,'0000-00-00 00:00:00','2013-03-04 19:39:49','2013-03-04 19:39:47','disable',0),
  (38,14,1,'qqq','','qqq',2000,2000,'/srv/qqq',NULL,0,'0000-00-00 00:00:00','2013-03-04 19:39:49','2013-03-04 19:39:47','disable',0),
  (39,15,2,'aaaa','','aaa',2000,2000,'/srv/aaaa',NULL,0,'0000-00-00 00:00:00','2013-03-04 19:52:21','2013-03-04 19:52:20','enable',0),
  (40,15,1,'aaaa','','aaa',2000,2000,'/srv/aaaa',NULL,0,'0000-00-00 00:00:00','2013-03-04 19:52:21','2013-03-04 19:52:20','enable',0);
COMMIT;

#
# Data for the `quota_limits` table  (LIMIT -495,500)
#

INSERT INTO `quota_limits` (`id`, `account_id`, `account_name`, `quota_type`, `per_session`, `limit_type`, `bytes_in_avail`, `bytes_out_avail`, `bytes_xfer_avail`, `files_in_avail`, `files_out_avail`, `files_xfer_avail`) VALUES

  (24,37,'qqq','user','false','soft',52428800,0,0,0,0,0),
  (25,38,'qqq','user','false','soft',52428800,0,0,0,0,0),
  (26,39,'aaaa','user','false','soft',52428800,0,0,0,0,0),
  (27,40,'aaaa','user','false','soft',52428800,0,0,0,0,0);
COMMIT;

#
# Data for the `servers` table  (LIMIT -497,500)
#

INSERT INTO `servers` (`id`, `server_name`, `fully_qualified_domain_name`, `work_dir`, `ip`, `server_description`, `is_active`, `is_delete`) VALUES

  (1,'webtis','webtis.cs.umss.edu.bo','/srv/','167.157.26.104','Servidor de pruebas para estudiantes de talleres como ser TBD, TIS, TAA',0,0),
  (2,'hosting','hosting.cs.umss.edu.bo','/srv/','192.168.2.5','',0,0);
COMMIT;

#
# Data for the `servers_services` table  (LIMIT -487,500)
#

INSERT INTO `servers_services` (`server_id`, `service_id`) VALUES

  (1,1),
  (2,1),
  (1,2),
  (1,3),
  (1,6),
  (1,7),
  (1,8),
  (2,3),
  (2,2),
  (2,6),
  (2,7),
  (2,8);
COMMIT;

#
# Data for the `services` table  (LIMIT -487,500)
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
  (9,'test','test bbbb gggg gg dddd<br>',111,1,'cog.png'),
  (10,'test','dfafdsfd',22,1,'cog.png'),
  (11,'fdsfds','fdsf',55,1,'cog.png'),
  (12,'ssss','dsadsa',212,1,'cog.png');
COMMIT;

#
# Data for the `users` table  (LIMIT -497,500)
#

INSERT INTO `users` (`id`, `user_name`, `title`, `first_name`, `last_name`, `email`, `phone`, `created`, `modified`, `status`, `photo`, `is_delete`) VALUES

  (14,'qqq','Univ','qqq','qqq','qq@qq.qq','123456','2013-03-04','2013-03-04 19:39:49',1,NULL,0),
  (15,'aaaa','Lic','aaa','aaaaaaaaa','aaa@aaaa.aa','123456','2013-03-04','2013-03-04 19:52:21',1,NULL,0);
COMMIT;



/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;