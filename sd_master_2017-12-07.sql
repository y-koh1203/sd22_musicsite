# ************************************************************
# Sequel Pro SQL dump
# バージョン 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# ホスト: 127.0.0.1 (MySQL 5.6.35)
# データベース: sd_master
# 作成時刻: 2017-12-07 06:20:16 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

CREATE DATABASE sd_master;
USE sd_master;


# テーブルのダンプ albums
# ------------------------------------------------------------

DROP TABLE IF EXISTS `albums`;

CREATE TABLE `albums` (
  `album_id` varchar(10) NOT NULL DEFAULT '',
  `music_id` varchar(10) NOT NULL DEFAULT '',
  `alubum_name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`album_id`,`music_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# テーブルのダンプ bands
# ------------------------------------------------------------

DROP TABLE IF EXISTS `bands`;

CREATE TABLE `bands` (
  `band_id` varchar(10) NOT NULL DEFAULT '',
  `band_name` varchar(30) NOT NULL DEFAULT '',
  `mail_address` varchar(50) NOT NULL DEFAULT '',
  `password` varchar(50) NOT NULL DEFAULT '',
  `login_id` varchar(10) NOT NULL DEFAULT '',
  `b_status_id` varchar(2) NOT NULL DEFAULT '',
  PRIMARY KEY (`band_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `bands` WRITE;
/*!40000 ALTER TABLE `bands` DISABLE KEYS */;

INSERT INTO `bands` (`band_id`, `band_name`, `mail_address`, `password`, `login_id`, `b_status_id`)
VALUES
	('00001','TKG','aaaaa@bbb.ne.jp','aaaaaaaaaaaaaa','TKG_777','1');

/*!40000 ALTER TABLE `bands` ENABLE KEYS */;
UNLOCK TABLES;


# テーブルのダンプ bands_status
# ------------------------------------------------------------

DROP TABLE IF EXISTS `bands_status`;

CREATE TABLE `bands_status` (
  `b_status_id` varchar(2) NOT NULL DEFAULT '',
  `b_status_name` varchar(20) NOT NULL DEFAULT '',
  PRIMARY KEY (`b_status_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# テーブルのダンプ comments
# ------------------------------------------------------------

DROP TABLE IF EXISTS `comments`;

CREATE TABLE `comments` (
  `feed_id` varchar(10) NOT NULL DEFAULT '',
  `comment_id` varchar(10) NOT NULL DEFAULT '',
  `member_id` varchar(10) NOT NULL DEFAULT '',
  `comment` varchar(300) NOT NULL DEFAULT '',
  `comment_title` varchar(30) DEFAULT NULL,
  `comment_date` datetime NOT NULL,
  PRIMARY KEY (`feed_id`,`comment_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# テーブルのダンプ details
# ------------------------------------------------------------

DROP TABLE IF EXISTS `details`;

CREATE TABLE `details` (
  `profits_id` varchar(10) NOT NULL DEFAULT '',
  `line_id` varchar(10) NOT NULL DEFAULT '',
  `music_id` varchar(10) NOT NULL DEFAULT '',
  PRIMARY KEY (`profits_id`,`line_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `details` WRITE;
/*!40000 ALTER TABLE `details` DISABLE KEYS */;

INSERT INTO `details` (`profits_id`, `line_id`, `music_id`)
VALUES
	('00001','00001','00001'),
	('00001','00002','00002');

/*!40000 ALTER TABLE `details` ENABLE KEYS */;
UNLOCK TABLES;


# テーブルのダンプ employees
# ------------------------------------------------------------

DROP TABLE IF EXISTS `employees`;

CREATE TABLE `employees` (
  `employee_id` varchar(10) NOT NULL DEFAULT '',
  `type_id` varchar(2) NOT NULL DEFAULT '',
  `employee_name` varchar(20) NOT NULL DEFAULT '',
  PRIMARY KEY (`employee_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# テーブルのダンプ errors
# ------------------------------------------------------------

DROP TABLE IF EXISTS `errors`;

CREATE TABLE `errors` (
  `error_code` varchar(3) NOT NULL DEFAULT '',
  `error_detail` text,
  PRIMARY KEY (`error_code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `errors` WRITE;
/*!40000 ALTER TABLE `errors` DISABLE KEYS */;

INSERT INTO `errors` (`error_code`, `error_detail`)
VALUES
	('001','データベース接続エラー'),
	('404','要求されたページは存在しません'),
	('500','処理エラーが発生しました');

/*!40000 ALTER TABLE `errors` ENABLE KEYS */;
UNLOCK TABLES;


# テーブルのダンプ event_type
# ------------------------------------------------------------

DROP TABLE IF EXISTS `event_type`;

CREATE TABLE `event_type` (
  `event_type_id` varchar(10) NOT NULL DEFAULT '',
  `type_name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`event_type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# テーブルのダンプ events
# ------------------------------------------------------------

DROP TABLE IF EXISTS `events`;

CREATE TABLE `events` (
  `event_id` varchar(10) NOT NULL DEFAULT '',
  `band_id` varchar(10) DEFAULT NULL,
  `event_name` varchar(100) DEFAULT NULL,
  `event_detail` text,
  `event_date` datetime DEFAULT NULL,
  `event_type_id` varchar(2) DEFAULT NULL,
  `update_date` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`event_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# テーブルのダンプ examinted_status
# ------------------------------------------------------------

DROP TABLE IF EXISTS `examinted_status`;

CREATE TABLE `examinted_status` (
  `ex_status_id` varchar(2) NOT NULL DEFAULT '',
  `ex_status_name` varchar(20) NOT NULL DEFAULT '',
  PRIMARY KEY (`ex_status_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# テーブルのダンプ favorites
# ------------------------------------------------------------

DROP TABLE IF EXISTS `favorites`;

CREATE TABLE `favorites` (
  `member_id` varchar(10) NOT NULL DEFAULT '',
  `band_id` varchar(10) NOT NULL DEFAULT '',
  PRIMARY KEY (`member_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# テーブルのダンプ feeds
# ------------------------------------------------------------

DROP TABLE IF EXISTS `feeds`;

CREATE TABLE `feeds` (
  `feed_id` varchar(10) NOT NULL DEFAULT '',
  `band_id` varchar(10) NOT NULL DEFAULT '',
  `feed_name` varchar(30) NOT NULL DEFAULT '',
  `feed_date` datetime NOT NULL,
  PRIMARY KEY (`feed_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# テーブルのダンプ genres
# ------------------------------------------------------------

DROP TABLE IF EXISTS `genres`;

CREATE TABLE `genres` (
  `genre_id` varchar(2) NOT NULL DEFAULT '',
  `genre_name` varchar(20) NOT NULL DEFAULT '',
  PRIMARY KEY (`genre_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# テーブルのダンプ mails
# ------------------------------------------------------------

DROP TABLE IF EXISTS `mails`;

CREATE TABLE `mails` (
  `mail_id` varchar(10) NOT NULL DEFAULT '',
  `band_id` varchar(10) NOT NULL DEFAULT '',
  `member_id` varchar(10) NOT NULL DEFAULT '',
  `mail_text` text NOT NULL,
  `attachment_file` varchar(100) NOT NULL DEFAULT '',
  `send_date` datetime NOT NULL,
  PRIMARY KEY (`mail_id`,`band_id`,`member_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# テーブルのダンプ member_status
# ------------------------------------------------------------

DROP TABLE IF EXISTS `member_status`;

CREATE TABLE `member_status` (
  `m_status_id` varchar(2) NOT NULL DEFAULT '',
  `m_status_name` varchar(20) NOT NULL DEFAULT '',
  PRIMARY KEY (`m_status_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `member_status` WRITE;
/*!40000 ALTER TABLE `member_status` DISABLE KEYS */;

INSERT INTO `member_status` (`m_status_id`, `m_status_name`)
VALUES
	('1','通常会員'),
	('2','ブラックリストユーザー'),
	('3','退会');

/*!40000 ALTER TABLE `member_status` ENABLE KEYS */;
UNLOCK TABLES;


# テーブルのダンプ members
# ------------------------------------------------------------

DROP TABLE IF EXISTS `members`;

CREATE TABLE `members` (
  `member_id` varchar(10) NOT NULL DEFAULT '',
  `member_name` varchar(20) NOT NULL DEFAULT '',
  `nickname` varchar(20) NOT NULL DEFAULT '',
  `password` varchar(50) NOT NULL DEFAULT '',
  `mail_address` varchar(50) NOT NULL DEFAULT '',
  `login_id` varchar(20) DEFAULT '',
  `m_status_id` varchar(2) NOT NULL DEFAULT '',
  PRIMARY KEY (`member_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `members` WRITE;
/*!40000 ALTER TABLE `members` DISABLE KEYS */;

INSERT INTO `members` (`member_id`, `member_name`, `nickname`, `password`, `mail_address`, `login_id`, `m_status_id`)
VALUES
	('00001','kohchan','yamako','00000011','bbb@bb.ne.jp','yamako_111','01');

/*!40000 ALTER TABLE `members` ENABLE KEYS */;
UNLOCK TABLES;


# テーブルのダンプ musics
# ------------------------------------------------------------

DROP TABLE IF EXISTS `musics`;

CREATE TABLE `musics` (
  `music_id` varchar(10) NOT NULL DEFAULT '',
  `band_id` varchar(10) NOT NULL DEFAULT '',
  `genre_id` varchar(2) NOT NULL DEFAULT '',
  `title` varchar(50) NOT NULL DEFAULT '',
  `release_date` datetime NOT NULL,
  `price` int(11) NOT NULL,
  `lyric` text,
  `play_time` time NOT NULL,
  `artwork_path` varchar(100) DEFAULT NULL,
  `examinated_date` datetime NOT NULL,
  `ex_status_id` varchar(2) NOT NULL DEFAULT '',
  `employee_id` varchar(10) NOT NULL DEFAULT '',
  `release_status_id` varchar(2) NOT NULL DEFAULT '',
  PRIMARY KEY (`music_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `musics` WRITE;
/*!40000 ALTER TABLE `musics` DISABLE KEYS */;

INSERT INTO `musics` (`music_id`, `band_id`, `genre_id`, `title`, `release_date`, `price`, `lyric`, `play_time`, `artwork_path`, `examinated_date`, `ex_status_id`, `employee_id`, `release_status_id`)
VALUES
	('00001','00001','01','aaaaa','0000-00-00 00:00:00',300,'ala;knlnivehoivhoewbavobvebavbibvlkbvlablvnlnvl;anlvn','00:00:00','home/dev/bin','1999-12-12 00:00:00','1','1','1'),
	('00002','00001','01','bbb','0000-00-00 00:00:00',350,NULL,'00:00:00',NULL,'0000-00-00 00:00:00','1','1','1'),
	('00003','00002','02','ccc','0000-00-00 00:00:00',350,NULL,'00:00:00',NULL,'0000-00-00 00:00:00','1','1','1'),
	('00004','00002','02','ccc','0000-00-00 00:00:00',350,NULL,'00:00:00',NULL,'0000-00-00 00:00:00','1','1','1'),
	('00005','00003','03','ccc','0000-00-00 00:00:00',350,NULL,'00:00:00',NULL,'0000-00-00 00:00:00','1','1','1');

/*!40000 ALTER TABLE `musics` ENABLE KEYS */;
UNLOCK TABLES;


# テーブルのダンプ processes
# ------------------------------------------------------------

DROP TABLE IF EXISTS `processes`;

CREATE TABLE `processes` (
  `type_id` varchar(2) NOT NULL DEFAULT '',
  `type_name` varchar(20) NOT NULL DEFAULT '',
  PRIMARY KEY (`type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# テーブルのダンプ profits
# ------------------------------------------------------------

DROP TABLE IF EXISTS `profits`;

CREATE TABLE `profits` (
  `profits_id` varchar(10) NOT NULL DEFAULT '',
  `member_id` varchar(10) NOT NULL DEFAULT '',
  `profits_date` datetime NOT NULL,
  PRIMARY KEY (`profits_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `profits` WRITE;
/*!40000 ALTER TABLE `profits` DISABLE KEYS */;

INSERT INTO `profits` (`profits_id`, `member_id`, `profits_date`)
VALUES
	('00001','00001','2017-01-01 00:00:00');

/*!40000 ALTER TABLE `profits` ENABLE KEYS */;
UNLOCK TABLES;


# テーブルのダンプ promotion_type
# ------------------------------------------------------------

DROP TABLE IF EXISTS `promotion_type`;

CREATE TABLE `promotion_type` (
  `promotion_type_id` varchar(2) NOT NULL DEFAULT '',
  `promotion_name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`promotion_type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# テーブルのダンプ promotions
# ------------------------------------------------------------

DROP TABLE IF EXISTS `promotions`;

CREATE TABLE `promotions` (
  `promotion_id` varchar(10) NOT NULL DEFAULT '',
  `promotion_title` varchar(50) NOT NULL DEFAULT '',
  `employee_id` varchar(10) NOT NULL DEFAULT '',
  `image1_pass` varchar(100) NOT NULL DEFAULT '',
  `image2_pass` varchar(100) NOT NULL DEFAULT '',
  `image3_pass` varchar(100) NOT NULL DEFAULT '',
  `image4_pass` varchar(100) NOT NULL DEFAULT '',
  `promotion_detail` text NOT NULL,
  `promotion_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `promotion_type_id` varchar(2) NOT NULL DEFAULT '',
  PRIMARY KEY (`promotion_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# テーブルのダンプ release_status
# ------------------------------------------------------------

DROP TABLE IF EXISTS `release_status`;

CREATE TABLE `release_status` (
  `release_status_id` varchar(2) NOT NULL DEFAULT '',
  `status_name` varchar(20) NOT NULL DEFAULT '',
  PRIMARY KEY (`release_status_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `release_status` WRITE;
/*!40000 ALTER TABLE `release_status` DISABLE KEYS */;

INSERT INTO `release_status` (`release_status_id`, `status_name`)
VALUES
	('01','公開中');

/*!40000 ALTER TABLE `release_status` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
