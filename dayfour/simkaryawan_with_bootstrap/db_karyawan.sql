-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.6.21 - MySQL Community Server (GPL)
-- Server OS:                    Win32
-- HeidiSQL Version:             9.4.0.5174
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for db_karyawan
CREATE DATABASE IF NOT EXISTS `db_karyawan` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `db_karyawan`;

-- Dumping structure for table db_karyawan.divisi
CREATE TABLE IF NOT EXISTS `divisi` (
  `divisiid` int(11) NOT NULL AUTO_INCREMENT,
  `kode` char(3) DEFAULT NULL,
  `nama` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`divisiid`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;

-- Dumping data for table db_karyawan.divisi: ~8 rows (approximately)
/*!40000 ALTER TABLE `divisi` DISABLE KEYS */;
INSERT INTO `divisi` (`divisiid`, `kode`, `nama`) VALUES
	(1, 'SDM', 'SUMBER DAYA MANUSIA'),
	(2, 'ATI', 'APLIKASI DAN TEKNOLOGI INFORMASI'),
	(6, 'BAK', 'BIRO ADMINISTRASI KARYAWAN'),
	(7, 'EJN', 'Erfian Junianto'),
	(27, 'VER', 'VFSDF'),
	(28, 'VER', 'VFSDF'),
	(29, 'RRE', 'ERER'),
	(30, 'FDS', 'SDFDSFD');
/*!40000 ALTER TABLE `divisi` ENABLE KEYS */;

-- Dumping structure for table db_karyawan.karyawan
CREATE TABLE IF NOT EXISTS `karyawan` (
  `karyawanid` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(30) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `telpon` varchar(15) DEFAULT NULL,
  `jabatan` varchar(30) DEFAULT NULL,
  `jeniskelamin` enum('L','P') DEFAULT NULL,
  `divisiid` int(11) DEFAULT NULL,
  `tgllahir` date DEFAULT NULL,
  PRIMARY KEY (`karyawanid`),
  KEY `fk_karyawan_divisi` (`divisiid`),
  CONSTRAINT `fk_karyawan_divisi` FOREIGN KEY (`divisiid`) REFERENCES `divisi` (`divisiid`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- Dumping data for table db_karyawan.karyawan: ~5 rows (approximately)
/*!40000 ALTER TABLE `karyawan` DISABLE KEYS */;
INSERT INTO `karyawan` (`karyawanid`, `nama`, `email`, `telpon`, `jabatan`, `jeniskelamin`, `divisiid`, `tgllahir`) VALUES
	(1, 'Chandra Wijaya', 'chandra@gmail.com', '0736368289', 'Manajer', 'L', 1, '2017-10-07'),
	(2, 'Budi Karuniawan', 'budi@gmail.com', '0229938389', 'Karyawan', 'L', 1, '2016-11-23'),
	(3, 'Anto Wijaya', 'anto@gmail.com', '0229938389', 'Karyawan', 'L', 1, '2013-10-13'),
	(5, 'Erfian Junianto', 'erfian@gmail.com', '94849399', 'Manajer', 'L', 1, '2017-10-23'),
	(6, 'Januar Budiman', 'januar@gmail.com', '094389289', 'Karyawan', 'L', 2, '2013-12-04');
/*!40000 ALTER TABLE `karyawan` ENABLE KEYS */;

-- Dumping structure for table db_karyawan.users
CREATE TABLE IF NOT EXISTS `users` (
  `userid` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `role` enum('ADMIN','KARYAWAN') DEFAULT NULL,
  `karyawanid` int(11) DEFAULT NULL,
  PRIMARY KEY (`userid`),
  KEY `fk_karyawan_user` (`karyawanid`),
  CONSTRAINT `fk_karyawan_user` FOREIGN KEY (`karyawanid`) REFERENCES `karyawan` (`karyawanid`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- Dumping data for table db_karyawan.users: ~5 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`userid`, `username`, `password`, `gambar`, `role`, `karyawanid`) VALUES
	(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'LOGO smk ARS copy.jpg', 'ADMIN', 1),
	(3, 'anto', 'face3d7fe9fdcc4ee855b7759be18ea0', '29 THAUN revisi.png', 'KARYAWAN', 3),
	(4, 'erfian', '3125ddd0ccde3662fe278e4f8c877dba', 'bsc.png', 'KARYAWAN', 5),
	(5, 'budi', '7fbf38deef12a8f591b6e9336e591161', '', 'KARYAWAN', 2),
	(6, 'januar', '6b9b5ed5551ff172228c90180d648d97', '', 'KARYAWAN', 6);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
