# ************************************************************
# Sequel Pro SQL dump
# Versión 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.6.38)
# Base de datos: mrmovy_DB
# Tiempo de Generación: 2018-10-10 18:04:28 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Volcado de tabla actor_movie
# ------------------------------------------------------------

DROP TABLE IF EXISTS `actor_movie`;

CREATE TABLE `actor_movie` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `movie_id` int(10) unsigned NOT NULL,
  `actor_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `actor_id` (`actor_id`),
  KEY `movie_id` (`movie_id`),
  CONSTRAINT `actor_movie_ibfk_1` FOREIGN KEY (`actor_id`) REFERENCES `actors` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `actor_movie_ibfk_2` FOREIGN KEY (`movie_id`) REFERENCES `movies` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Volcado de tabla actors
# ------------------------------------------------------------

DROP TABLE IF EXISTS `actors`;

CREATE TABLE `actors` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(128) CHARACTER SET latin1 NOT NULL DEFAULT '',
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Volcado de tabla genre_movie
# ------------------------------------------------------------

DROP TABLE IF EXISTS `genre_movie`;

CREATE TABLE `genre_movie` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `movie_id` int(10) unsigned NOT NULL,
  `genre_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `movie_id` (`movie_id`),
  KEY `genre_id` (`genre_id`),
  CONSTRAINT `genre_movie_ibfk_1` FOREIGN KEY (`movie_id`) REFERENCES `movies` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `genre_movie_ibfk_2` FOREIGN KEY (`genre_id`) REFERENCES `genres` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Volcado de tabla genre_user
# ------------------------------------------------------------

DROP TABLE IF EXISTS `genre_user`;

CREATE TABLE `genre_user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `genre_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `genre_id` (`genre_id`),
  CONSTRAINT `genre_user_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `genre_user_ibfk_2` FOREIGN KEY (`genre_id`) REFERENCES `genres` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Volcado de tabla genres
# ------------------------------------------------------------

DROP TABLE IF EXISTS `genres`;

CREATE TABLE `genres` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(128) NOT NULL DEFAULT '',
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Volcado de tabla movie_actor
# ------------------------------------------------------------

DROP TABLE IF EXISTS `movie_actor`;

CREATE TABLE `movie_actor` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `movie_id` int(10) unsigned NOT NULL,
  `actor_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `actor_id` (`actor_id`),
  KEY `movie_id` (`movie_id`),
  CONSTRAINT `movie_actor_ibfk_1` FOREIGN KEY (`actor_id`) REFERENCES `actors` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `movie_actor_ibfk_2` FOREIGN KEY (`movie_id`) REFERENCES `movies` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Volcado de tabla movie_genre
# ------------------------------------------------------------

DROP TABLE IF EXISTS `movie_genre`;

CREATE TABLE `movie_genre` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `movie_id` int(10) unsigned NOT NULL,
  `genre_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `movie_id` (`movie_id`),
  KEY `genre_id` (`genre_id`),
  CONSTRAINT `movie_genre_ibfk_1` FOREIGN KEY (`movie_id`) REFERENCES `movies` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `movie_genre_ibfk_2` FOREIGN KEY (`genre_id`) REFERENCES `genres` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Volcado de tabla movie_producer
# ------------------------------------------------------------

DROP TABLE IF EXISTS `movie_producer`;

CREATE TABLE `movie_producer` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `movie_id` int(10) unsigned NOT NULL,
  `producer_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `movie_id` (`movie_id`),
  KEY `producer_id` (`producer_id`),
  CONSTRAINT `movie_producer_ibfk_1` FOREIGN KEY (`movie_id`) REFERENCES `movies` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `movie_producer_ibfk_2` FOREIGN KEY (`producer_id`) REFERENCES `producers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Volcado de tabla movie_tag
# ------------------------------------------------------------

DROP TABLE IF EXISTS `movie_tag`;

CREATE TABLE `movie_tag` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `movie_id` int(10) unsigned NOT NULL,
  `tag_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `movie_id` (`movie_id`),
  KEY `tag_id` (`tag_id`),
  CONSTRAINT `movie_tag_ibfk_1` FOREIGN KEY (`movie_id`) REFERENCES `movies` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `movie_tag_ibfk_2` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Volcado de tabla movies
# ------------------------------------------------------------

DROP TABLE IF EXISTS `movies`;

CREATE TABLE `movies` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cover` varchar(128) CHARACTER SET latin1 DEFAULT '',
  `title` varchar(128) CHARACTER SET latin1 NOT NULL DEFAULT '',
  `genre_id` varchar(128) NOT NULL DEFAULT '',
  `tag_id` varchar(128) NOT NULL DEFAULT '',
  `year` int(5) NOT NULL,
  `length` int(4) NOT NULL,
  `resume` text CHARACTER SET latin1 NOT NULL,
  `actor` varchar(255) NOT NULL DEFAULT '',
  `producer` varchar(255) NOT NULL DEFAULT '',
  `netflix` varchar(128) CHARACTER SET latin1 DEFAULT '',
  `trailer` varchar(128) DEFAULT '',
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `movies` WRITE;
/*!40000 ALTER TABLE `movies` DISABLE KEYS */;

INSERT INTO `movies` (`id`, `cover`, `title`, `genre_id`, `tag_id`, `year`, `length`, `resume`, `actor`, `producer`, `netflix`, `trailer`, `updated_at`, `created_at`)
VALUES
	(20,'images/portadas/The Shawshank Redemption.jpg','The Shawshank Redemption','Drama','Policial, carcel, disparos',1994,2,'Two imprisoned men bond over a number of years, finding solace and eventual redemption through acts of common decency.','Tim Robbins, Morgan Freeman, Bob Gunton ','Stephen King ','http://asdf.comh','http://sdfsfd.com','2018-10-10 12:27:04','2018-10-10 12:27:04'),
	(21,'images/portadas/The Godfather.jpg','The Godfather','Drama','Mafia, disparos, dinero',1972,2,'The aging patriarch of an organized crime dynasty transfers control of his clandestine empire to his reluctant son.',' Marlon Brando, Al Pacino, James Caan',' Francis Ford Coppola','http://asdf.com','http://sdfsfd.com','2018-10-10 12:28:10','2018-10-10 12:28:10'),
	(22,'images/portadas/The Dark Knight.jpg','The Dark Knight','Drama','Superhéroe, Fantasia, Comics',2008,192,'When the menace known as the Joker emerges from his mysterious past, he wreaks havoc and chaos on the people of Gotham. The Dark Knight must accept one of the greatest psychological and physical tests of his ability to fight injustice.','Christian Bale, Heath Ledger, Aaron Eckhart','Christopher Nolan','http://sdfsfd.com','http://sdfsfd.com','2018-10-10 14:04:38','2018-10-10 14:04:38');

/*!40000 ALTER TABLE `movies` ENABLE KEYS */;
UNLOCK TABLES;


# Volcado de tabla producers
# ------------------------------------------------------------

DROP TABLE IF EXISTS `producers`;

CREATE TABLE `producers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(128) NOT NULL DEFAULT '',
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Volcado de tabla tag_user
# ------------------------------------------------------------

DROP TABLE IF EXISTS `tag_user`;

CREATE TABLE `tag_user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `tag_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `tag_id` (`tag_id`),
  CONSTRAINT `tag_user_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `tag_user_ibfk_2` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Volcado de tabla tags
# ------------------------------------------------------------

DROP TABLE IF EXISTS `tags`;

CREATE TABLE `tags` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(128) NOT NULL DEFAULT '',
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Volcado de tabla user_genre
# ------------------------------------------------------------

DROP TABLE IF EXISTS `user_genre`;

CREATE TABLE `user_genre` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `genre_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `genre_id` (`genre_id`),
  CONSTRAINT `user_genre_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `user_genre_ibfk_2` FOREIGN KEY (`genre_id`) REFERENCES `genres` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Volcado de tabla user_tag
# ------------------------------------------------------------

DROP TABLE IF EXISTS `user_tag`;

CREATE TABLE `user_tag` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `tag_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `tag_id` (`tag_id`),
  CONSTRAINT `user_tag_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `user_tag_ibfk_2` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Volcado de tabla users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(128) NOT NULL DEFAULT '',
  `pass` varchar(128) NOT NULL DEFAULT '',
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `survey` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;

INSERT INTO `users` (`id`, `email`, `pass`, `updated_at`, `created_at`, `survey`)
VALUES
	(1,'prueba12@asd.com','$2y$10$Lgi/nu5.O9OkfXIwefQNSu3sRDoBHhsa6P8HqTSh2PRO6MZj6e5hq','2018-10-09 15:59:11','2018-10-09 15:59:11',1),
	(2,'prueba991@gmail.com','$2y$10$GngjkiQXxUKxgGizqAWSL.Z9xTK6/MIBJiCKEKi5nNpIdHZDXTdnm','2018-10-09 21:26:02','2018-10-09 21:26:02',1),
	(3,'prueba9912@gmail.com','$2y$10$2GpuOt.YoXSSZv5gGhyXdujtq19hDQQfb4ihuB5mScwA3FJZ0WcvO','2018-10-09 21:26:35','2018-10-09 21:26:35',0),
	(4,'prueba99122@gmail.com','$2y$10$QBBKMpA91UDAQLtuBXFVZ.zVgCa2bk0UgmGaVYVDCZqIfnBCssMEK','2018-10-09 21:27:14','2018-10-09 21:27:14',0),
	(5,'prueba@prueba.com','$2y$10$uCDtBZyh5axBfVhjDG7DsOsBMHph4WoPAQYcAyqWW5RQO5uLT4h5W','2018-10-09 22:57:36','2018-10-09 22:57:36',1),
	(6,'juanbanzer@gmail.com','$2y$10$IvVCiYB94QgA5LKYMY747uFA80VLV32uNtc1Rr3aVL60t3x3ykrti','2018-10-09 23:01:47','2018-10-09 23:01:47',1),
	(7,'juancito@juan.com','$2y$10$O0MqoMXxsw35aMFSZTg6jeRXTJVIkzpK2B73GSooNC.Eg.3.xzqDe','2018-10-09 23:45:48','2018-10-09 23:45:48',0),
	(8,'prueba22@gmail.com','$2y$10$BGEt9RxHp3PinXd2ewxcoOPxmpq5CJ9nTPoSDAgmCmEY4tIa6R5yC','2018-10-09 23:46:34','2018-10-09 23:46:34',0);

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
