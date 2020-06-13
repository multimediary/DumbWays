-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.8-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             9.3.0.4984
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping database structure for me-dumb
CREATE DATABASE IF NOT EXISTS `me-dumb` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `me-dumb`;


-- Dumping structure for table me-dumb.news
CREATE TABLE IF NOT EXISTS `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(200) DEFAULT NULL,
  `image` varchar(50) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `create_time` varchar(50) DEFAULT NULL,
  `User_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK__user` (`User_id`),
  CONSTRAINT `FK__user` FOREIGN KEY (`User_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table me-dumb.news: ~0 rows (approximately)
/*!40000 ALTER TABLE `news` DISABLE KEYS */;
INSERT INTO `news` (`id`, `title`, `image`, `deskripsi`, `create_time`, `User_id`) VALUES
	(1, 'Dulu \'Bebaskan\' Pemotor di Thamrin, Sekarang Anies Malah Ingin Batasi', 'macet.jpg', 'Gubernur DKI Jakarta Anies Baswedan ingin membatasi pergerakan pengendeara motor dengan penerpan ganjil genap motor di PSBB (Penerapas Sosial Berskala Besar) transisi. Di awal kepemimpinannya, Anies pernah mengizinkan kembali sepeda motor melinta si Jalan Sudirman - Jalan MH Thamrin', '2020-06-13 22:15:00', 1);
INSERT INTO `news` (`id`, `title`, `image`, `deskripsi`, `create_time`, `User_id`) VALUES
	(2, 'Program DIaspora Peduli Diluncurkan, Begini Mekanisme Bantuannya', 'diaspora.jpg', 'Program Diaspora Peduli (Diaspora Care) resmi diluncurkan hari ini. Menteri Ketenagakerjaan Ida Fauziyah memimpin acara yang berlangsung di Graha BNPB- Jakarta tersebut.', '2020-06-13 22:46:00', 1);
/*!40000 ALTER TABLE `news` ENABLE KEYS */;


-- Dumping structure for table me-dumb.user
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table me-dumb.user: ~1 rows (approximately)
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`id`, `name`, `email`) VALUES
	(1, 'Jabbar', 'multimediary@gmail.com');
INSERT INTO `user` (`id`, `name`, `email`) VALUES
	(2, 'Abdul', 'multimediary@gmail.com');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
