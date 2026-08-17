/*M!999999\- enable the sandbox mode */ 
-- MariaDB dump 10.19  Distrib 10.11.18-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: perpustakaan_digital
-- ------------------------------------------------------
-- Server version	10.11.18-MariaDB-0+deb12u1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Current Database: `perpustakaan_digital`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `perpustakaan_digital` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci */;

USE `perpustakaan_digital`;

--
-- Table structure for table `buku`
--

DROP TABLE IF EXISTS `buku`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `buku` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `judul` varchar(200) NOT NULL,
  `pengarang` varchar(120) NOT NULL,
  `penerbit` varchar(120) DEFAULT NULL,
  `tahun_terbit` smallint(4) DEFAULT NULL,
  `kategori` varchar(60) DEFAULT NULL,
  `isbn` varchar(20) DEFAULT NULL,
  `stok` int(11) NOT NULL DEFAULT 0,
  `deskripsi` text DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `isbn` (`isbn`),
  KEY `judul` (`judul`),
  KEY `pengarang` (`pengarang`),
  KEY `kategori` (`kategori`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `buku`
--

LOCK TABLES `buku` WRITE;
/*!40000 ALTER TABLE `buku` DISABLE KEYS */;
INSERT INTO `buku` VALUES
(1,'Laskar Pelangi','Andrea Hirata','Bentang Pustaka',2005,'Novel','9789793062792',5,'Kisah perjuangan anak-anak Belitung dalam menempuh pendidikan.','2026-08-15 11:35:46','2026-08-15 11:42:30'),
(2,'Bumi','Tere Liye','Gramedia Pustaka Utama',2014,'Fantasi','9786020301129',8,'Petualangan Raib, Seli, dan Ali di dunia paralel.','2026-08-15 11:35:46','2026-08-15 11:35:46'),
(3,'Negeri 5 Menara','Ahmad Fuadi','Gramedia Pustaka Utama',2009,'Novel','9789792248616',4,'Kisah santri di pondok dengan semangat man jadda wajada.','2026-08-15 11:35:46','2026-08-15 11:35:46'),
(4,'Pulang','Leila S. Chudori','Kepustakaan Populer Gramedia',2012,'Novel','9789799105229',3,'Novel tentang eksil politik Indonesia di Paris.','2026-08-15 11:35:46','2026-08-15 11:35:46'),
(5,'Sang Pemimpi','Andrea Hirata','Bentang Pustaka',2006,'Novel','9789793062921',6,'Kelanjutan kisah Ikal dan Arai mengejar mimpi.','2026-08-15 11:35:46','2026-08-15 11:35:46'),
(6,'Perahu Kertas','Dewi Lestari','Bentang Pustaka',2009,'Novel','9789791227729',7,'Kisah Kugy dan Keenan, mimpi dan cinta.','2026-08-15 11:35:46','2026-08-15 11:35:46'),
(7,'Hujan','Tere Liye','Gramedia Pustaka Utama',2016,'Fiksi Ilmiah','9786020324784',9,'Kisah Lail dan Esok di masa depan pasca bencana.','2026-08-15 11:35:46','2026-08-15 11:35:46'),
(8,'Filosofi Teras','Henry Manampiring','Kompas',2018,'Pengembangan Diri','9786024125189',10,'Pengantar filsafat Stoa untuk kehidupan sehari-hari.','2026-08-15 11:35:46','2026-08-15 11:35:46'),
(9,'Sejarah Dunia yang Disembunyikan','Jonathan Black','Alvabet',2015,'Sejarah','9786029193351',2,'Menguak sejarah esoterik peradaban dunia.','2026-08-15 11:35:46','2026-08-15 11:35:46'),
(10,'Atomic Habits','James Clear','Gramedia Pustaka Utama',2019,'Pengembangan Diri','9786020633176',12,'Cara membangun kebiasaan kecil untuk hasil luar biasa.','2026-08-15 11:35:46','2026-08-15 11:35:46'),
(11,'Sapiens','Yuval Noah Harari','Kepustakaan Populer Gramedia',2017,'Sejarah','9786024244163',5,'Riwayat singkat umat manusia dari purba hingga modern.','2026-08-15 11:35:46','2026-08-15 11:35:46'),
(12,'Clean Code','Robert C. Martin','Prentice Hall',2008,'Teknologi','9780132350884',4,'Panduan menulis kode yang bersih dan mudah dirawat.','2026-08-15 11:35:46','2026-08-15 11:35:46'),
(13,'Algoritma dan Pemrograman','Rinaldi Munir','Informatika Bandung',2016,'Teknologi','9786021513915',6,'Buku teks dasar algoritma untuk mahasiswa informatika.','2026-08-15 11:35:46','2026-08-15 11:35:46'),
(14,'Basis Data','Fathansyah','Informatika Bandung',2015,'Teknologi','9786028758042',7,'Konsep dan implementasi sistem basis data.','2026-08-15 11:35:46','2026-08-15 11:35:46'),
(15,'Harry Potter dan Batu Bertuah','J.K. Rowling','Gramedia Pustaka Utama',2000,'Fantasi','9786020326900',8,'Awal petualangan Harry Potter di Hogwarts.','2026-08-15 11:35:46','2026-08-15 11:35:46'),
(16,'The Hobbit','J.R.R. Tolkien','Gramedia Pustaka Utama',2001,'Fantasi','9789792223347',3,'Petualangan Bilbo Baggins bersama para kurcaci.','2026-08-15 11:35:46','2026-08-15 11:35:46'),
(17,'Cantik Itu Luka','Eka Kurniawan','Gramedia Pustaka Utama',2002,'Novel','9786020325941',4,'Novel sejarah keluarga di Halimunda.','2026-08-15 11:35:46','2026-08-15 11:35:46'),
(18,'Gadis Kretek','Ratih Kumala','Gramedia Pustaka Utama',2012,'Novel','9786020379883',5,'Kisah keluarga pengusaha kretek terbesar di Indonesia.','2026-08-15 11:35:46','2026-08-15 11:35:46'),
(19,'Pulang Tertatih','M. Aan Mansyur','Bentang Pustaka',2019,'Puisi','9786022915990',6,'Kumpulan puisi tentang perjalanan dan kerinduan.','2026-08-15 11:35:46','2026-08-15 11:35:46'),
(20,'Habit of Winning','Prakash Iyer','Elex Media Komputindo',2013,'Pengembangan Diri','9786020212345',3,'Cerita inspiratif tentang kepemimpinan dan motivasi.','2026-08-15 11:35:46','2026-08-15 11:35:46'),
(21,'Mindset','Carol S. Dweck','Noura Books',2018,'Pengembangan Diri','9786023853090',7,'Mengubah cara berpikir untuk meraih potensi maksimal.','2026-08-15 11:35:46','2026-08-15 11:35:46'),
(22,'The Pragmatic Programmer','David Thomas','Addison-Wesley',2019,'Teknologi','9780135957059',2,'Panduan menjadi programmer yang pragmatis dan efektif.','2026-08-15 11:35:46','2026-08-15 11:35:46'),
(23,'Design Patterns','Erich Gamma','Addison-Wesley',1994,'Teknologi','9780201633610',3,'Pola desain perangkat lunak berorientasi objek.','2026-08-15 11:35:46','2026-08-15 11:35:46'),
(24,'Laut Bercerita','Leila S. Chudori','Kepustakaan Populer Gramedia',2017,'Novel','9786024246945',5,'Kisah aktivis yang hilang pada 1998 dituturkan sang laut.','2026-08-15 11:35:46','2026-08-15 11:35:46'),
(25,'Klara and the Sun','Kazuo Ishiguro','Gramedia Pustaka Utama',2021,'Fiksi Ilmiah','9786020656090',4,'Novel tentang robot AF bernama Klara yang penuh empati.','2026-08-15 11:35:46','2026-08-15 11:35:46');
/*!40000 ALTER TABLE `buku` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `role` enum('admin','pustakawan') NOT NULL DEFAULT 'pustakawan',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES
(1,'admin','$2y$10$rxCQvCPN25SDBOTAOWNOiu/oteTHPidRgvF7xnw0qdNHN55Ilc.jO','Administrator','admin','2026-08-15 11:35:46','2026-08-15 11:35:46'),
(2,'pustakawan','$2y$10$88e4DQRMioMKy559OUu5se7Nq6ge0h946mbxgOIW5d42uQdtJFdFu','Siti Pustakawan','pustakawan','2026-08-15 11:35:46','2026-08-15 11:35:46');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2026-08-15 19:46:06
