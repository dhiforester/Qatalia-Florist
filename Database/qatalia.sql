-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 29, 2025 at 05:12 PM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `qatalia`
--

-- --------------------------------------------------------

--
-- Table structure for table `akses`
--

DROP TABLE IF EXISTS `akses`;
CREATE TABLE IF NOT EXISTS `akses` (
  `id_akses` int(10) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `akses` varchar(20) NOT NULL,
  PRIMARY KEY (`id_akses`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `akses`
--

INSERT INTO `akses` (`id_akses`, `nama`, `email`, `username`, `password`, `akses`) VALUES
(3, 'Solihul Hadi', 'dhiforester@gmail.com', 'dhiforester', 'dhiforester', 'Admin'),
(4, 'Santi Nursari', 'santinursari@gmail.com', 'santinursari', 'santinursari', 'Pemilik'),
(6, 'Syamsul Maarif', 'syamsul@gmail.com', 'syamsul', 'syamsul', 'Pelanggan'),
(7, 'Didi Muhadi', 'didimuhadi@gmail.com', 'didimuhadi', 'didimuhadi', 'Admin'),
(8, 'Dini Agustina', 'diniagustina@yahoo.com', 'diniagustina', 'diniagustina', 'Pelanggan'),
(9, 'Ena Rusena', 'ena@yahoo.com', 'enarusena', 'enarusena', 'Pelanggan'),
(10, 'Dewi Widiastuti', 'dewiwidiastuti@gmail.com', 'dewiwidiastuti', 'dewiwidiastuti', 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

DROP TABLE IF EXISTS `barang`;
CREATE TABLE IF NOT EXISTS `barang` (
  `id_barang` int(10) NOT NULL AUTO_INCREMENT,
  `nama_barang` varchar(25) NOT NULL,
  `harga` int(10) DEFAULT NULL,
  `satuan` varchar(20) DEFAULT NULL,
  `stok` int(10) DEFAULT NULL,
  `keterangan` text,
  `kategori` text,
  `gambar` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`id_barang`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `nama_barang`, `harga`, `satuan`, `stok`, `keterangan`, `kategori`, `gambar`) VALUES
(17, 'Red Board Universary', 250000, 'Bucket', 3, 'Karangan bunga yang cocok untuk ucapan pernikahan', 'Board Flowers', '1658845861968.jpg'),
(18, 'Dark Flower Table', 100000, 'Bucket', 5, 'Sangat cocok diberikan sebagai kejutan untuk pasangan anda', 'Hand Buket', '1658846006403.jpg'),
(19, 'Dark hand', 12000, 'Bucket', 0, 'Sangat cocok untuk acara wisuda', 'Hand Buket', '1658850727410.jpg'),
(20, 'Dark Board', 12000, 'Bucket', 11, 'Produk ini sangat cocok bagi anda yang ingin mengucapkan selamat pernikahan', 'Table Flowers', '1658846659033.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

DROP TABLE IF EXISTS `chat`;
CREATE TABLE IF NOT EXISTS `chat` (
  `id_chat` int(20) NOT NULL AUTO_INCREMENT,
  `id_akses` varchar(20) DEFAULT NULL,
  `id_admin` varchar(20) DEFAULT NULL,
  `id_barang` varchar(20) DEFAULT NULL,
  `id_transaksi` varchar(20) DEFAULT NULL,
  `tanggal` varchar(20) DEFAULT NULL,
  `pesan` text,
  `kategori` varchar(25) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id_chat`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`id_chat`, `id_akses`, `id_admin`, `id_barang`, `id_transaksi`, `tanggal`, `pesan`, `kategori`, `status`) VALUES
(1, '9', '', '19', '', '2022-07-30 21:30', 'Assalamualaikum', 'Pelanggan To Admin', 'Dibaca'),
(2, '9', '', '19', '', '2022-07-30 21:35', 'saya mau tanya mengenai produk ini', 'Pelanggan To Admin', 'Dibaca'),
(3, '9', '3', '19', '', '2022-07-31 00:51', 'Ada yang bis kami bantu?', 'Admin To Pelanggan', 'Dibaca'),
(4, '9', '3', '19', '', '2022-07-31 00:52', 'Silahkan ajukan pertanyaan anda?', 'Admin To Pelanggan', 'Dibaca'),
(5, '8', '', '20', '', '2022-07-31 01:12', 'Assalamualaikum', 'Pelanggan To Admin', 'Dibaca'),
(6, '8', '', '20', '', '2022-07-31 01:12', 'Saya mau tanya ini bisa COD ngga?', 'Pelanggan To Admin', 'Dibaca'),
(7, '8', '3', '20', '', '2022-07-31 01:13', 'Iya bisa teh mangga', 'Admin To Pelanggan', 'Dibaca'),
(8, '8', '3', '20', '', '2022-07-31 01:20', 'silahkan di order semua bisa COD', 'Admin To Pelanggan', 'Dibaca'),
(9, '8', '', '20', '', '2022-07-31 01:21', 'oke teh terima kasih informasinya', 'Pelanggan To Admin', 'Dibaca'),
(10, '8', '', '20', '', '2022-07-31 01:24', 'nanti saya order', 'Pelanggan To Admin', 'Dibaca');

-- --------------------------------------------------------

--
-- Table structure for table `diskon`
--

DROP TABLE IF EXISTS `diskon`;
CREATE TABLE IF NOT EXISTS `diskon` (
  `id_diskon` int(20) NOT NULL AUTO_INCREMENT,
  `id_barang` int(20) NOT NULL,
  `periode_awal` varchar(20) NOT NULL,
  `periode_akhir` varchar(20) NOT NULL,
  `diskon` int(20) NOT NULL,
  PRIMARY KEY (`id_diskon`),
  KEY `id_barang` (`id_barang`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `diskon`
--

INSERT INTO `diskon` (`id_diskon`, `id_barang`, `periode_awal`, `periode_akhir`, `diskon`) VALUES
(6, 18, '2021-09-01', '2021-09-01', 40),
(7, 19, '2022-07-28', '2022-07-28', 10),
(8, 18, '2022-07-28', '2022-07-30', 10),
(9, 19, '2022-08-01', '2022-08-31', 15),
(10, 19, '2022-07-29', '2022-08-01', 15);

-- --------------------------------------------------------

--
-- Table structure for table `ongkir`
--

DROP TABLE IF EXISTS `ongkir`;
CREATE TABLE IF NOT EXISTS `ongkir` (
  `id_ongkir` int(10) NOT NULL AUTO_INCREMENT,
  `provinsi` varchar(50) DEFAULT NULL,
  `kabupaten` varchar(50) DEFAULT NULL,
  `kecamatan` varchar(50) DEFAULT NULL,
  `desa` varchar(50) DEFAULT NULL,
  `ongkir` int(20) DEFAULT NULL,
  PRIMARY KEY (`id_ongkir`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ongkir`
--

INSERT INTO `ongkir` (`id_ongkir`, `provinsi`, `kabupaten`, `kecamatan`, `desa`, `ongkir`) VALUES
(2, 'Jawa Barat', 'Kuningan', 'Kuningan', 'Cijoho', 5000),
(3, 'Jawa Barat', 'Kuningan', 'Kuningan', 'Kuningan', 10000),
(5, 'Jawa Barat', 'Kuningan', 'Kuningan', 'Ciporang', 10000),
(6, 'Jawa Barat', 'Kuningan', 'Kuningan', 'Ancaran', 15000),
(7, 'Jawa Barat', 'Kuningan', 'Kadugeude', 'Kadugeude', 25000);

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

DROP TABLE IF EXISTS `pelanggan`;
CREATE TABLE IF NOT EXISTS `pelanggan` (
  `id_pelanggan` int(10) NOT NULL AUTO_INCREMENT,
  `id_akses` int(20) DEFAULT NULL,
  `id_ongkir` int(20) DEFAULT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `kontak` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_pelanggan`),
  KEY `id_akses` (`id_akses`),
  KEY `id_ongkir` (`id_ongkir`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `id_akses`, `id_ongkir`, `nama`, `alamat`, `kontak`, `email`) VALUES
(1, 1, 5, 'Syamsul Maarif', '20/04', '089601154726', 'abiizaz@gmail.com'),
(2, 8, 2, 'Dini Agustina', 'Jalan RE martadinata no 14 Cijoho Kuningan', '089123123', 'diniagustina@yahoo.com'),
(3, 9, 7, 'Ena Rusena', 'Jalan Kadugede Raya No 14 Kadugede 45511', '089123123', 'ena@yahoo.com');

-- --------------------------------------------------------

--
-- Table structure for table `reting`
--

DROP TABLE IF EXISTS `reting`;
CREATE TABLE IF NOT EXISTS `reting` (
  `id_reting` int(10) NOT NULL AUTO_INCREMENT,
  `id_transaksi` int(10) NOT NULL,
  `id_akses` int(10) NOT NULL,
  `id_barang` int(10) NOT NULL,
  `reting` int(10) NOT NULL,
  PRIMARY KEY (`id_reting`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reting`
--

INSERT INTO `reting` (`id_reting`, `id_transaksi`, `id_akses`, `id_barang`, `reting`) VALUES
(3, 2, 8, 19, 5),
(4, 2, 8, 0, 0),
(5, 3, 8, 20, 5),
(6, 3, 8, 0, 0),
(7, 4, 9, 19, 5),
(8, 4, 9, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `rincian`
--

DROP TABLE IF EXISTS `rincian`;
CREATE TABLE IF NOT EXISTS `rincian` (
  `id_rincian` int(10) NOT NULL AUTO_INCREMENT,
  `id_transaksi` int(10) DEFAULT NULL,
  `id_barang` int(10) NOT NULL,
  `id_akses` int(10) NOT NULL,
  `nama_barang` varchar(25) DEFAULT NULL,
  `harga` int(10) NOT NULL,
  `qty` int(10) NOT NULL,
  `diskon` int(10) DEFAULT NULL,
  `jumlah` int(10) NOT NULL,
  `keterangan` text NOT NULL,
  `lastupdate` varchar(25) NOT NULL,
  PRIMARY KEY (`id_rincian`),
  KEY `id_transaksi` (`id_transaksi`),
  KEY `id_barang` (`id_barang`),
  KEY `id_akses` (`id_akses`),
  KEY `id_transaksi_2` (`id_transaksi`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rincian`
--

INSERT INTO `rincian` (`id_rincian`, `id_transaksi`, `id_barang`, `id_akses`, `nama_barang`, `harga`, `qty`, `diskon`, `jumlah`, `keterangan`, `lastupdate`) VALUES
(1, 2, 19, 8, 'Dark hand', 12000, 1, 1800, 10200, 'Saya mau yang warna merah', '1659439622'),
(2, 3, 20, 8, 'Dark Board', 12000, 1, 0, 12000, 'Saya mau pesan dengan tulisan selamat menempuh hidup baru', '1659631040'),
(3, 4, 19, 9, 'Dark hand', 12000, 1, 1800, 10200, 'Selipkan ucapan selamat dan sukses untuk adiku tercinta', '1659695854'),
(4, 5, 17, 9, 'Red Board Universary', 250000, 1, 0, 250000, 'Selamat menempuh hidup  baru', '1659696146');

-- --------------------------------------------------------

--
-- Table structure for table `testimoni`
--

DROP TABLE IF EXISTS `testimoni`;
CREATE TABLE IF NOT EXISTS `testimoni` (
  `id_testimoni` int(10) NOT NULL AUTO_INCREMENT,
  `id_transaksi` int(10) NOT NULL,
  `id_akses` int(10) NOT NULL,
  `testimoni` text NOT NULL,
  `saran_kritik` text NOT NULL,
  `status` varchar(20) NOT NULL,
  PRIMARY KEY (`id_testimoni`),
  KEY `id_transaksi` (`id_transaksi`),
  KEY `id_akses` (`id_akses`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `testimoni`
--

INSERT INTO `testimoni` (`id_testimoni`, `id_transaksi`, `id_akses`, `testimoni`, `saran_kritik`, `status`) VALUES
(2, 2, 8, 'Pelayanan terbilang cepat dan sangat ramah, produk yang di pesan sangat sesuai dan melebihi ekspektasi.', 'Semoga qatalia floris dapat mempertahankan kualitas pelayanannya', 'Publikasikan'),
(3, 3, 8, 'Pengiriman sangat cepat, harga sesuai dan pelayanan sangat ramah', 'Lebih ditingkatkan lagi pelayanan', 'Publikasikan'),
(4, 4, 9, 'Sangat berkesan pertama kali saya memesan bunga dari qatalia floris. Harganya murah dan hasilnya melebihi ekspektasi', 'Mohon dipertahankan', 'Publikasikan');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

DROP TABLE IF EXISTS `transaksi`;
CREATE TABLE IF NOT EXISTS `transaksi` (
  `id_transaksi` int(10) NOT NULL AUTO_INCREMENT,
  `id_akses` int(10) NOT NULL,
  `id_ongkir` int(10) NOT NULL,
  `tanggal` varchar(50) NOT NULL,
  `metode_pembayaran` varchar(20) NOT NULL,
  `jumlah_tagihan` varchar(20) NOT NULL,
  `no_bukti` varchar(25) DEFAULT NULL,
  `file_bukti` varchar(25) DEFAULT NULL,
  `alamat` text,
  `status_pembayaran` varchar(50) NOT NULL,
  `status_pengiriman` varchar(50) NOT NULL,
  PRIMARY KEY (`id_transaksi`),
  KEY `id_akses` (`id_akses`),
  KEY `id_ongkir` (`id_ongkir`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_akses`, `id_ongkir`, `tanggal`, `metode_pembayaran`, `jumlah_tagihan`, `no_bukti`, `file_bukti`, `alamat`, `status_pembayaran`, `status_pengiriman`) VALUES
(2, 8, 2, '2022-08-02', 'Transfer', '10200', '1234123', '1659439647271.jpeg', 'Jalan RE martadinata no 14 Cijoho Kuningan', 'Lunas', 'Sampai Tujuan'),
(3, 8, 2, '2022-08-04', 'COD', '12000', '', '', 'Jalan RE martadinata no 14 Cijoho Kuningan', 'Lunas', 'Sampai Tujuan'),
(4, 9, 7, '2022-08-05', 'COD', '10200', '', '', 'Jalan Kadugede Raya No 14 Kadugede 45511', 'Menunggu Validasi', 'Sampai Tujuan'),
(5, 9, 7, '2022-08-05', 'COD', '250000', '', '', 'Jalan Kadugede Raya No 14 Kadugede 45511', 'Lunas', 'Sampai Tujuan');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
