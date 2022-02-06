-- --------------------------------------------------------
-- Host:                         192.168.0.2
-- Server version:               8.0.24 - MySQL Community Server - GPL
-- Server OS:                    Linux
-- HeidiSQL Version:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for db_tes
CREATE DATABASE IF NOT EXISTS `db_tes` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `db_tes`;

-- Dumping structure for table db_tes.about
CREATE TABLE IF NOT EXISTS `about` (
  `id` int NOT NULL AUTO_INCREMENT,
  `ask` varchar(256) NOT NULL,
  `respon` varchar(256) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table db_tes.about: ~7 rows (approximately)
/*!40000 ALTER TABLE `about` DISABLE KEYS */;
INSERT INTO `about` (`id`, `ask`, `respon`) VALUES
	(1, 'Apa itu resiq', 'Produk hasil karya mahasiswa Fakultas Teknik Universitas Dian Nuswantoro dalam pengelolaan sampah plastik untuk diolah menjadi paving block.'),
	(2, 'Alamat kantor ', 'Jl. Imam Bonjol No.207, Pendrikan Kidul, Kec. Semarang Tengah, Kota Semarang, Jawa Tengah 50131'),
	(3, 'Info', 'No Telp. 024-3517261 | Email : info@resiq.id'),
	(4, 'Kontak', 'No Telp. 024-3517261 | Email : info@resiq.id'),
	(5, 'Produk resiq', 'Saat ini produk dari resiq diantaranya:| 1.Paving Block |2.	Kerajinan '),
	(6, 'Produk Paving Block ', 'Berikut ini jenis produk paving block diresiq.id :\r\n|1.Paving Block Bata \r\n|2.Paving Block Cacing \r\n|3.Paving Block SegiEnam (Hexagon)\r\n|4.Paving Block Topi (Uskup)\r\n|5.Paving Block  Kanstin (Kansteen)\r\n|6.Paving Block Rumput \r\n'),
	(7, 'Produk unggulan resiq ', 'Produk unggulan dari resiq yaitu Paving Block Cacing '),
	(8, 'Produk bestseller resiq ', 'Produk bestseller yang ada pada resiq yaitu Paving Block Rumput '),
	(9, 'Produk popular resiq ', 'Produk popular dari resiq yaitu Paving Block SegiEnam (Hexagon)'),
	(10, 'Jenis sampah plastik ', 'Jenis sampah plastik yang dapat diolah menjadi paving block diantaranya:\r\n|1.Botol \r\n|2.Kresek\r\n'),
	(11, 'Cara jual sampah plastik', 'Saat ini resiq menyediakan layanan jemput atau bisa mengantar sendiri. '),
	(12, 'Yang terlibat didalam resiq', 'Resiq melibatkan rumah tangga, pengepul dan pemulung dalam pengumpulan sampahnya untuk diolah menjadi paving block dan kerajinan.');
/*!40000 ALTER TABLE `about` ENABLE KEYS */;

-- Dumping structure for table db_tes.bot
CREATE TABLE IF NOT EXISTS `bot` (
  `id` int NOT NULL AUTO_INCREMENT,
  `chat` varchar(300) NOT NULL,
  `respon` varchar(300) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table db_tes.bot: ~12 rows (approximately)
/*!40000 ALTER TABLE `bot` DISABLE KEYS */;
INSERT INTO `bot` (`id`, `chat`, `respon`) VALUES
	(1, 'hai|halo|hay|hy|helo', 'halo juga, ada yang bisa saya bantu?'),
	(2, 'bantuan', 'Bagaimana, ada yang bisa dibantu?'),
	(3, 'selamat pagi ', 'Selamat pagi juga, ada yang bisa saya bantu?'),
	(4, 'selamat siang ', 'Selamat siang juga, ada yang bisa saya bantu?'),
	(5, 'selamat sore ', 'Selamat sore juga, ada yang bisa saya bantu?'),
	(6, 'selamat malam', 'Selamat malam juga, ada yang bisa saya bantu?'),
	(7, 'assalamualaikum ', 'Waalaikumsalam '),
	(8, 'kamu siapa ', 'Aku adalah bot resiq.id, salam kenal yaaa '),
	(9, 'terima kasih', 'sama-sama'),
	(10, 'sampai jumpa', 'Bye, sampai ketemu lagi '),
	(11, 'bye', 'Bye, sampai ketemu lagi '),
	(12, 'salam kenal ', 'Salam kenal juga, aku bot resiq. Senang bisa kenal denganmu');
/*!40000 ALTER TABLE `bot` ENABLE KEYS */;

-- Dumping structure for table db_tes.user
CREATE TABLE IF NOT EXISTS `user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(256) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table db_tes.user: ~2 rows (approximately)
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`id`, `name`, `username`, `password`) VALUES
	(1, 'Admin', 'admin', '$argon2id$v=19$m=65536,t=4,p=1$azhqdnJMekl6R3l6S3RBYg$EjqU0RsN7aQkdpN4zHrZypWFQ8Jfa7OKt4xgQQtysTw');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
