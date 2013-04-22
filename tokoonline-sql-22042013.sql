-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.5.16 - MySQL Community Server (GPL)
-- Server OS:                    Win32
-- HeidiSQL version:             7.0.0.4053
-- Date/time:                    2013-04-22 20:49:36
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET FOREIGN_KEY_CHECKS=0 */;

-- Dumping structure for table tokoonline.kategori
DROP TABLE IF EXISTS `kategori`;
CREATE TABLE IF NOT EXISTS `kategori` (
  `idkategori` int(11) NOT NULL AUTO_INCREMENT,
  `namakategori` varchar(100) NOT NULL,
  `parent` int(11) NOT NULL,
  `deskripsi` varchar(200) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`idkategori`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- Dumping data for table tokoonline.kategori: 7 rows
/*!40000 ALTER TABLE `kategori` DISABLE KEYS */;
REPLACE INTO `kategori` (`idkategori`, `namakategori`, `parent`, `deskripsi`, `datetime`) VALUES
	(1, 'CD Tutorial', 0, 'CD Tutorial Pembelajaran', '2013-04-15 20:30:46'),
	(2, 'Software', 0, 'Software Komputer', '2013-04-15 20:35:04'),
	(3, 'Buku', 0, 'Buku ', '2013-04-15 20:40:01'),
	(4, 'Hardware', 0, 'Hardware Komputer Baru', '2013-04-15 20:40:01'),
	(5, 'Spare Part', 0, 'Spare Part Hardware', '2013-04-15 20:40:01'),
	(6, 'Accessories', 0, 'Aksesoris Komputer', '2013-04-15 20:40:01'),
	(7, 'Audio', 0, 'Audiosound', '2013-04-22 15:56:12');
/*!40000 ALTER TABLE `kategori` ENABLE KEYS */;


-- Dumping structure for table tokoonline.keranjang
DROP TABLE IF EXISTS `keranjang`;
CREATE TABLE IF NOT EXISTS `keranjang` (
  `idcart` int(11) NOT NULL AUTO_INCREMENT,
  `idproduk` int(11) NOT NULL,
  `session_id` varchar(250) DEFAULT NULL,
  `tgl_pesan` date DEFAULT NULL,
  PRIMARY KEY (`idcart`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Dumping data for table tokoonline.keranjang: 0 rows
/*!40000 ALTER TABLE `keranjang` DISABLE KEYS */;
/*!40000 ALTER TABLE `keranjang` ENABLE KEYS */;


-- Dumping structure for table tokoonline.pabrikan
DROP TABLE IF EXISTS `pabrikan`;
CREATE TABLE IF NOT EXISTS `pabrikan` (
  `idpabrikan` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(200) NOT NULL,
  `kota` varchar(100) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `notelp` varchar(50) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`idpabrikan`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumping data for table tokoonline.pabrikan: 3 rows
/*!40000 ALTER TABLE `pabrikan` DISABLE KEYS */;
REPLACE INTO `pabrikan` (`idpabrikan`, `nama`, `kota`, `alamat`, `notelp`, `datetime`) VALUES
	(1, 'Garuda Media', 'Malang', '', '', '2013-04-13 18:01:40'),
	(2, 'Erway Media ', 'Malang', '', '', '2013-04-13 18:02:00'),
	(3, 'Bamboo Medi', 'Surabaya', '', '', '2013-04-13 18:02:21');
/*!40000 ALTER TABLE `pabrikan` ENABLE KEYS */;


-- Dumping structure for table tokoonline.pemesanan
DROP TABLE IF EXISTS `pemesanan`;
CREATE TABLE IF NOT EXISTS `pemesanan` (
  `idpesanan` int(11) NOT NULL AUTO_INCREMENT,
  `idproduk` int(11) NOT NULL,
  `NamaPemesan` varchar(200) NOT NULL,
  `JumlahPesan` varchar(10) DEFAULT NULL,
  `Alamat` varchar(200) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `TelpHP` varchar(100) NOT NULL,
  `Catatan` varchar(250) DEFAULT NULL,
  `idstatus` int(11) DEFAULT NULL,
  PRIMARY KEY (`idpesanan`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Dumping data for table tokoonline.pemesanan: 0 rows
/*!40000 ALTER TABLE `pemesanan` DISABLE KEYS */;
/*!40000 ALTER TABLE `pemesanan` ENABLE KEYS */;


-- Dumping structure for table tokoonline.produk
DROP TABLE IF EXISTS `produk`;
CREATE TABLE IF NOT EXISTS `produk` (
  `idproduk` int(11) NOT NULL AUTO_INCREMENT,
  `idkategori` int(11) DEFAULT NULL,
  `namaproduk` varchar(200) NOT NULL,
  `harga` varchar(100) DEFAULT NULL,
  `jumlah` varchar(10) DEFAULT NULL,
  `idstatus` int(11) NOT NULL,
  `idpabrikan` int(11) NOT NULL,
  `images` varchar(100) DEFAULT NULL,
  `description` varchar(200) DEFAULT NULL,
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`idproduk`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table tokoonline.produk: 2 rows
/*!40000 ALTER TABLE `produk` DISABLE KEYS */;
REPLACE INTO `produk` (`idproduk`, `idkategori`, `namaproduk`, `harga`, `jumlah`, `idstatus`, `idpabrikan`, `images`, `description`, `datetime`) VALUES
	(1, 1, 'CD Tutorial Seri Wordpress : HTML 2 Wordpress', '50000', '10', 1, 1, NULL, 'Tutorial', '2013-04-13 17:33:56'),
	(2, 1, 'CD Tutorial Desain Grafis : Corel Draw X5', '45000', '10', 1, 1, NULL, 'Tutorial', '2013-04-13 17:43:51');
/*!40000 ALTER TABLE `produk` ENABLE KEYS */;


-- Dumping structure for table tokoonline.status
DROP TABLE IF EXISTS `status`;
CREATE TABLE IF NOT EXISTS `status` (
  `idstatus` int(11) NOT NULL AUTO_INCREMENT,
  `status` varchar(100) NOT NULL,
  `parent` int(11) NOT NULL,
  `deskripsi` varchar(200) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`idstatus`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- Dumping data for table tokoonline.status: 6 rows
/*!40000 ALTER TABLE `status` DISABLE KEYS */;
REPLACE INTO `status` (`idstatus`, `status`, `parent`, `deskripsi`, `datetime`) VALUES
	(1, 'Stok', 0, 'Stok ', '2013-04-13 18:03:12'),
	(2, 'Stok Habis', 1, 'Habis', '2013-04-13 18:03:36'),
	(3, 'Stok Sudah Dipesan', 1, 'Stok Dipesan', '2013-04-13 18:04:33'),
	(4, 'Stok Tersedia', 1, 'Tersedia', '2013-04-13 18:04:40'),
	(5, 'Pemesanan', 0, 'Pemesanan', '2013-04-13 18:05:52'),
	(6, 'Pesanan Baru', 5, 'Baru', '2013-04-13 18:06:08');
/*!40000 ALTER TABLE `status` ENABLE KEYS */;
/*!40014 SET FOREIGN_KEY_CHECKS=1 */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
