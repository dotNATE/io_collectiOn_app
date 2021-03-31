# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.7.33)
# Database: collection_app
# Generation Time: 2021-03-31 14:41:46 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table books
# ------------------------------------------------------------

DROP TABLE IF EXISTS `books`;

CREATE TABLE `books` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `book_title` varchar(150) NOT NULL DEFAULT '',
  `author` varchar(60) NOT NULL DEFAULT '',
  `genre` varchar(50) NOT NULL DEFAULT '',
  `page_count` int(11) NOT NULL,
  `year_released` varchar(4) NOT NULL DEFAULT '',
  `deleted` tinyint(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `books` WRITE;
/*!40000 ALTER TABLE `books` DISABLE KEYS */;

INSERT INTO `books` (`id`, `book_title`, `author`, `genre`, `page_count`, `year_released`, `deleted`)
VALUES
	(1,'Foundation','Isaac Asimov','Science-Fiction',255,'1942',0),
	(2,'A Game of Thrones','George R R Martin','Fantasy',694,'1996',0),
	(3,'Dune','Frank Herbert','Science-Fiction',444,'1976',0),
	(4,'Kafka on the Shore','Haruki Murakami','Fantasy',505,'2002',0),
	(6,'Why I\'m No Longer Talking To White People About Race','Reni Eddo-Lodge','Non-Fiction',238,'2017',0),
	(7,'Foundation and Empire','Isaac Asimov','Science-Fiction',247,'1952',0),
	(8,'Second Foundation','Isaac Asimov','Science-Fiction',210,'1953',0),
	(14,'Foundation\'s Edge','Isaac Asimov','Science-Fiction',367,'1982',0),
	(15,'Foundation and Earth','Isaac Asimov','Science-Fiction',356,'1986',0),
	(16,'A Clash of Kings','George R R Martin','Fantasy',761,'1998',0),
	(27,'A Storm of Swords','George R R Martin','Fantasy',973,'2000',0),
	(28,'A Feast for Crows','George R R Martin','Fantasy',753,'2005',0),
	(29,'TESTWOW','NATHANIEL','FALSE',654,'1991',1),
	(30,'TESTOMG','NATHANIEL','edf',1991,'1991',1),
	(31,'TESTHOLY','NED FLANDERS','rfgdsfg',1991,'1991',1),
	(32,'TEST','TEST','Shrek',987,'2002',1),
	(33,'The Great Gatsby','F. Scott Fitzgerald','Tragedy',218,'1952',0),
	(34,'TEST001','TEST','NATHANIEL',1991,'1991',1),
	(35,'TEST002','TEST','Horror',1991,'1991',1),
	(36,'The Picture of Dorian Gray','Oscar Wilde','Gothic Fiction',256,'1890',0),
	(37,'The Very Hungry Caterpillar','Eric Carle','Cosmic Horror',22,'1969',0),
	(38,'Meditations','Marcus Aurelius','Philosophy',162,'890',0),
	(39,'&lt;b&gt; TEST.    &lt;/b&gt;','TEST','TEST',1991,'1991',1),
	(40,'Shit The Bed','TEST','Horror',1991,'1991',1),
	(41,'TEST','','t',1991,'1991',1),
	(42,'TESTYEAR','YEAR','TEST',9999,'9999',1),
	(43,'TEST','NATHANIEL','GENRE',1991,'1991',1),
	(44,'TEST','NATHANIEL','TEST',1991,'1991',1),
	(45,'TEST','TEST','TEST',2000,'1492',1);

/*!40000 ALTER TABLE `books` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
