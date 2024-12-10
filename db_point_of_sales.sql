/*
SQLyog Professional v12.5.1 (64 bit)
MySQL - 10.4.28-MariaDB : Database - db_point_of_sales
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`db_point_of_sales` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;

USE `db_point_of_sales`;

/*Table structure for table `tbl_beli_d` */

DROP TABLE IF EXISTS `tbl_beli_d`;

CREATE TABLE `tbl_beli_d` (
  `id_beli` bigint(20) NOT NULL AUTO_INCREMENT,
  `no_faktur` varchar(15) NOT NULL,
  `id_produk` int(10) NOT NULL,
  `qty` mediumint(9) NOT NULL DEFAULT 0,
  `harga_beli` decimal(10,2) NOT NULL DEFAULT 0.00,
  `margin` decimal(10,2) NOT NULL DEFAULT 0.00,
  `nilai_margin` decimal(10,2) NOT NULL DEFAULT 0.00,
  `harga_pokok` decimal(10,2) NOT NULL DEFAULT 0.00,
  `harga_jual` decimal(10,2) NOT NULL DEFAULT 0.00,
  `diskon` decimal(4,2) NOT NULL DEFAULT 0.00,
  `nilai_diskon` decimal(10,2) NOT NULL,
  `sub_total` decimal(10,2) NOT NULL DEFAULT 0.00,
  PRIMARY KEY (`id_beli`),
  KEY `id_produk` (`id_produk`),
  KEY `tbl_beli_d_ibfk_1` (`no_faktur`),
  CONSTRAINT `tbl_beli_d_ibfk_1` FOREIGN KEY (`no_faktur`) REFERENCES `tbl_beli_m` (`no_faktur`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `tbl_beli_d_ibfk_2` FOREIGN KEY (`id_produk`) REFERENCES `tbl_m_produk` (`id_produk`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=10485 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `tbl_beli_d` */

insert  into `tbl_beli_d`(`id_beli`,`no_faktur`,`id_produk`,`qty`,`harga_beli`,`margin`,`nilai_margin`,`harga_pokok`,`harga_jual`,`diskon`,`nilai_diskon`,`sub_total`) values 
(1,'1',1,1,100000.00,0.00,0.00,0.00,0.00,0.00,0.00,100000.00),
(2,'2',2,2,200000.00,0.00,0.00,0.00,0.00,0.00,0.00,200000.00),
(3,'3',2,4,90000.00,0.00,0.00,0.00,0.00,0.00,0.00,90000.00),
(4,'4',2,1,75000.00,0.00,0.00,0.00,0.00,0.00,0.00,75000.00),
(5,'5',2,1,60000.00,0.00,0.00,0.00,0.00,0.00,0.00,60000.00),
(6,'5',1,6,20000.00,0.00,0.00,0.00,0.00,0.00,0.00,20000.00),
(7,'3',1,4,75000.00,0.00,0.00,0.00,0.00,0.00,0.00,75000.00),
(8,'3',2,3,35000.00,0.00,0.00,0.00,0.00,0.00,0.00,35000.00),
(9,'4',1,1,25000.00,0.00,0.00,0.00,0.00,0.00,0.00,25000.00),
(10,'1',2,4,100000.00,0.00,0.00,0.00,0.00,0.00,0.00,100000.00),
(10484,'PB-020723-0001',1,1,30000.00,0.00,0.00,35000.00,50000.00,0.00,0.00,50000.00);

/*Table structure for table `tbl_beli_m` */

DROP TABLE IF EXISTS `tbl_beli_m`;

CREATE TABLE `tbl_beli_m` (
  `no_faktur` varchar(15) NOT NULL,
  `tgl_faktur` date DEFAULT NULL,
  `id_supp` int(6) NOT NULL,
  `no_bukti` varchar(20) NOT NULL,
  `total_beli` decimal(10,2) NOT NULL DEFAULT 0.00,
  `potongan` decimal(10,2) NOT NULL DEFAULT 0.00,
  `biaya_lain` decimal(10,2) NOT NULL DEFAULT 0.00,
  `ppn` decimal(10,2) NOT NULL DEFAULT 0.00 COMMENT 'nilai Pajak',
  `total_bersih` decimal(10,2) NOT NULL DEFAULT 0.00,
  `stts_bayar` smallint(1) NOT NULL DEFAULT 0 COMMENT '0: Tunai, 1: Kredit',
  `term` int(5) NOT NULL,
  `tgl_jt` date NOT NULL,
  `stts_beli` smallint(1) NOT NULL DEFAULT 0 COMMENT '0: Lunas, 1: blm Lunas',
  `created_date` date DEFAULT NULL,
  `created_by` varchar(25) DEFAULT NULL,
  `update_date` date DEFAULT NULL,
  `update_by` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`no_faktur`),
  KEY `id_supp` (`id_supp`),
  KEY `no_bukti` (`no_bukti`),
  CONSTRAINT `tbl_beli_m_ibfk_1` FOREIGN KEY (`id_supp`) REFERENCES `tbl_m_supplier` (`id_supp`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `tbl_beli_m` */

insert  into `tbl_beli_m`(`no_faktur`,`tgl_faktur`,`id_supp`,`no_bukti`,`total_beli`,`potongan`,`biaya_lain`,`ppn`,`total_bersih`,`stts_bayar`,`term`,`tgl_jt`,`stts_beli`,`created_date`,`created_by`,`update_date`,`update_by`) values 
('1','2023-06-14',1,'1',1.00,0.00,0.00,0.00,0.00,1,0,'2023-06-23',1,'2023-06-13','denis','2023-06-15','willy'),
('2','2023-06-14',2,'2',1.00,0.00,0.00,0.00,0.00,1,0,'2023-06-23',1,'2023-06-13','denis','2023-06-15','willy'),
('3','2023-06-14',3,'3',1.00,0.00,0.00,0.00,0.00,1,0,'2023-06-23',1,'2023-06-13','denis','2023-06-15','willy'),
('4','2023-06-14',4,'4',1.00,0.00,0.00,0.00,0.00,1,0,'2023-06-23',1,'2023-06-13','denis','2023-06-15','willy'),
('5','2023-06-14',5,'5',1.00,0.00,0.00,0.00,0.00,1,0,'2023-06-23',1,'2023-06-13','denis','2023-06-15','willy'),
('PB-020723-0001','2023-07-02',4,'',50000.00,0.00,0.00,5500.00,50005.00,0,13,'1970-01-01',0,'2023-07-02','Super Admin',NULL,NULL);

/*Table structure for table `tbl_m_kategori` */

DROP TABLE IF EXISTS `tbl_m_kategori`;

CREATE TABLE `tbl_m_kategori` (
  `id_kategori` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kategori` varchar(255) NOT NULL,
  PRIMARY KEY (`id_kategori`)
) ENGINE=InnoDB AUTO_INCREMENT=1019 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `tbl_m_kategori` */

insert  into `tbl_m_kategori`(`id_kategori`,`nama_kategori`) values 
(1,'Pakaian'),
(2,'Minuman'),
(1018,'Alat Bantu 1213');

/*Table structure for table `tbl_m_produk` */

DROP TABLE IF EXISTS `tbl_m_produk`;

CREATE TABLE `tbl_m_produk` (
  `id_produk` int(11) NOT NULL AUTO_INCREMENT,
  `nama_produk` varchar(255) NOT NULL,
  `id_kategori` int(6) NOT NULL,
  `id_satuan` int(6) NOT NULL,
  `barcode` varchar(10) DEFAULT NULL,
  `harga_beli` decimal(10,2) NOT NULL DEFAULT 0.00,
  `harga_pokok` decimal(10,2) NOT NULL DEFAULT 0.00,
  `harga_jual` decimal(10,2) DEFAULT 0.00,
  `is_status` smallint(1) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id_produk`),
  KEY `id_kategori` (`id_kategori`),
  KEY `id_satuan` (`id_satuan`),
  CONSTRAINT `tbl_m_produk_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `tbl_m_kategori` (`id_kategori`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `tbl_m_produk_ibfk_2` FOREIGN KEY (`id_satuan`) REFERENCES `tbl_m_satuan` (`id_satuan`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=1018000002 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `tbl_m_produk` */

insert  into `tbl_m_produk`(`id_produk`,`nama_produk`,`id_kategori`,`id_satuan`,`barcode`,`harga_beli`,`harga_pokok`,`harga_jual`,`is_status`) values 
(1,'Baju',1,5,'1',30000.00,35000.00,50000.00,1),
(2,'Celana',1,5,'2',300000.00,400000.00,500000.00,1);

/*Table structure for table `tbl_m_satuan` */

DROP TABLE IF EXISTS `tbl_m_satuan`;

CREATE TABLE `tbl_m_satuan` (
  `id_satuan` int(6) NOT NULL AUTO_INCREMENT,
  `nama_satuan` varchar(11) NOT NULL,
  PRIMARY KEY (`id_satuan`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `tbl_m_satuan` */

insert  into `tbl_m_satuan`(`id_satuan`,`nama_satuan`) values 
(1,'botol'),
(2,'kilo'),
(3,'liter'),
(4,'ons'),
(5,'pcs'),
(6,'bungkus');

/*Table structure for table `tbl_m_supplier` */

DROP TABLE IF EXISTS `tbl_m_supplier`;

CREATE TABLE `tbl_m_supplier` (
  `id_supp` int(6) NOT NULL AUTO_INCREMENT,
  `jenis` varchar(5) NOT NULL COMMENT 'PT or CV',
  `nama_supp` varchar(35) NOT NULL,
  `kontak_person` varchar(35) DEFAULT NULL,
  `no_kontak` varchar(12) DEFAULT NULL,
  `kota` varchar(35) DEFAULT NULL,
  `email` varchar(25) DEFAULT NULL,
  `no_telp` varchar(15) DEFAULT NULL,
  `no_fax` varchar(10) DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_supp`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `tbl_m_supplier` */

insert  into `tbl_m_supplier`(`id_supp`,`jenis`,`nama_supp`,`kontak_person`,`no_kontak`,`kota`,`email`,`no_telp`,`no_fax`,`alamat`) values 
(1,'PT','Bersama1234','ahmad','123','Medan','bersama@mail.com','0','0','jl.1'),
(2,'A2','Bangkit','arif','124','Medan','bangkit@mail.com','0','0','jl.2'),
(3,'A3','Bersatu','ari','125','Medan','bersatu@mail.com','0','0','jl.3'),
(4,'B1','Berjaya','jaya','126','Medan','berjaya@mail.com','0','0','jl.4'),
(5,'B2','Bintang','bintang','127','Medan','bintang@mail.com','0','0','jl.5'),
(6,'B3','Anugerah','anugrah','128','Medan','anugerah@mail.com','0','0','jl.6'),
(7,'C1','Abadi','akbar','129','Medan','abadi@mail.com','0','0','jl.7'),
(8,'C2','Sinar','anton','131','Medan','sinar@mail.com','0','0','jl.8'),
(9,'C3','Milala','adil','132','Medan','milala@mail.com','0','0','jl.9'),
(10,'AB1','Cantika','salim','133','Medan','cantika@mail.com','0','0','jl.10');

/*Table structure for table `tbl_produk_kartu_stok` */

DROP TABLE IF EXISTS `tbl_produk_kartu_stok`;

CREATE TABLE `tbl_produk_kartu_stok` (
  `id_kartu` bigint(20) NOT NULL AUTO_INCREMENT,
  `tanggal` date NOT NULL,
  `no_ref` varchar(15) NOT NULL COMMENT 'nomor transaksi',
  `id_produk` int(10) NOT NULL,
  `transaksi` varchar(25) NOT NULL COMMENT 'jenis transaksi',
  `is_dk` smallint(1) NOT NULL DEFAULT 0 COMMENT '0: Masuk, 1: Keluar',
  `harga` decimal(10,2) NOT NULL DEFAULT 0.00,
  `qty` mediumint(9) NOT NULL DEFAULT 0,
  `keterangan` varchar(150) NOT NULL,
  `user_by` varchar(25) NOT NULL DEFAULT 'Admin',
  PRIMARY KEY (`id_kartu`)
) ENGINE=InnoDB AUTO_INCREMENT=124 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `tbl_produk_kartu_stok` */

insert  into `tbl_produk_kartu_stok`(`id_kartu`,`tanggal`,`no_ref`,`id_produk`,`transaksi`,`is_dk`,`harga`,`qty`,`keterangan`,`user_by`) values 
(123,'2023-07-02','PB-020723-0001',1,'Pembelian Barang',0,30000.00,1,'Pembelian barang No Faktur: PB-020723-0001','Admin');

/*Table structure for table `tbl_produk_stok` */

DROP TABLE IF EXISTS `tbl_produk_stok`;

CREATE TABLE `tbl_produk_stok` (
  `id_stok` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_produk` int(10) NOT NULL,
  `saldo` int(11) DEFAULT NULL,
  `beli` int(11) DEFAULT NULL,
  `jual` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_stok`),
  KEY `id_produk` (`id_produk`),
  CONSTRAINT `tbl_produk_stok_ibfk_1` FOREIGN KEY (`id_produk`) REFERENCES `tbl_m_produk` (`id_produk`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `tbl_produk_stok` */

insert  into `tbl_produk_stok`(`id_stok`,`id_produk`,`saldo`,`beli`,`jual`) values 
(16,1,0,1,0);

/* Trigger structure for table `tbl_beli_d` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `trg_beli_tambah` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `trg_beli_tambah` AFTER INSERT ON `tbl_beli_d` FOR EACH ROW BEGIN
	-- Periksa apakah sudan ada ID produk pada tabel tbl_produk_stok
	IF EXISTS (SELECT id_produk FROM tbl_produk_stok WHERE id_produk=new.id_produk) THEN
	    -- Jika sudah ada maka Update field beli
	    UPDATE tbl_produk_stok SET beli=beli+new.qty WHERE id_produk=new.id_produk;
	ELSE -- Jika belum ada ID Produk
	    -- Tambahkan produk Baru dengan nilai field beli = qty
	    INSERT INTO tbl_produk_stok (id_produk, saldo, beli, jual)
	         VALUES (new.id_produk, 0,new.qty,0);
	END IF;
     END */$$


DELIMITER ;

/* Trigger structure for table `tbl_beli_d` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `trg_beli_hapus` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `trg_beli_hapus` AFTER DELETE ON `tbl_beli_d` FOR EACH ROW BEGIN
        UPDATe tbl_produk_stok SET beli=beli+old.qty WHERE id_produk=old.id_produk;
    END */$$


DELIMITER ;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
