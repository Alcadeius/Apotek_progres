/*
SQLyog Community v13.1.6 (64 bit)
MySQL - 10.4.13-MariaDB : Database - db_apotek
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`db_apotek` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `db_apotek`;

/*Table structure for table `tb_detail_transaksi` */

DROP TABLE IF EXISTS `tb_detail_transaksi`;

CREATE TABLE `tb_detail_transaksi` (
  `iddetailtransaksi` int(5) NOT NULL AUTO_INCREMENT,
  `idtransaksi` int(5) NOT NULL,
  `idobat` int(4) NOT NULL,
  `jumlah` int(3) NOT NULL,
  `hargasatuan` double NOT NULL,
  `totalharga` double NOT NULL,
  PRIMARY KEY (`iddetailtransaksi`),
  KEY `idtransaksi` (`idtransaksi`),
  KEY `idobat` (`idobat`),
  CONSTRAINT `tb_detail_transaksi_ibfk_1` FOREIGN KEY (`idtransaksi`) REFERENCES `tb_transaksi` (`idtransaksi`),
  CONSTRAINT `tb_detail_transaksi_ibfk_2` FOREIGN KEY (`idobat`) REFERENCES `tb_obat` (`idobat`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tb_detail_transaksi` */

insert  into `tb_detail_transaksi`(`iddetailtransaksi`,`idtransaksi`,`idobat`,`jumlah`,`hargasatuan`,`totalharga`) values 
(10,1,2,3,25000,75000),
(14,1,2,3,20000,44000);

/*Table structure for table `tb_karyawan` */

DROP TABLE IF EXISTS `tb_karyawan`;

CREATE TABLE `tb_karyawan` (
  `idkaryawan` int(4) NOT NULL AUTO_INCREMENT,
  `namakaryawan` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `telp` varchar(15) NOT NULL,
  PRIMARY KEY (`idkaryawan`)
) ENGINE=InnoDB AUTO_INCREMENT=874 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tb_karyawan` */

insert  into `tb_karyawan`(`idkaryawan`,`namakaryawan`,`alamat`,`telp`) values 
(1,'Hidayah','Jl.Bintang Kejora No. 21','0819729517'),
(2,'Berkah','Jl.Naga No. 202','0812347654');

/*Table structure for table `tb_login` */

DROP TABLE IF EXISTS `tb_login`;

CREATE TABLE `tb_login` (
  `username` varchar(50) NOT NULL,
  `password` varchar(5) NOT NULL,
  `leveluser` varchar(10) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `tb_login` */

insert  into `tb_login`(`username`,`password`,`leveluser`) values 
('andre','321','admin'),
('Budi','421','admin'),
('Dharmawan','98765','admin'),
('Geni','786','user'),
('reyna','12323','admin');

/*Table structure for table `tb_obat` */

DROP TABLE IF EXISTS `tb_obat`;

CREATE TABLE `tb_obat` (
  `idobat` int(4) NOT NULL,
  `idsupplier` int(4) NOT NULL,
  `namaobat` varchar(100) NOT NULL,
  `kategoriobat` varchar(10) NOT NULL,
  `hargajual` double NOT NULL,
  `hargabeli` double NOT NULL,
  `stock_obat` int(11) NOT NULL,
  `keterangan` text NOT NULL,
  PRIMARY KEY (`idobat`),
  KEY `idsupplier` (`idsupplier`),
  CONSTRAINT `tb_obat_ibfk_1` FOREIGN KEY (`idsupplier`) REFERENCES `tb_supplier` (`idsupplier`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `tb_obat` */

insert  into `tb_obat`(`idobat`,`idsupplier`,`namaobat`,`kategoriobat`,`hargajual`,`hargabeli`,`stock_obat`,`keterangan`) values 
(1,2,'Putri malu','Toga',40000,30000,100,'tanpa resep'),
(2,1,'Ibu Profen','Obat sakit',25000,15000,150,'tanpa resep');

/*Table structure for table `tb_pelanggan` */

DROP TABLE IF EXISTS `tb_pelanggan`;

CREATE TABLE `tb_pelanggan` (
  `idpelanggan` int(4) NOT NULL AUTO_INCREMENT,
  `namalengkap` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `telp` int(15) NOT NULL,
  `usia` int(2) NOT NULL,
  `buktifotoresep` varchar(255) NOT NULL,
  PRIMARY KEY (`idpelanggan`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tb_pelanggan` */

insert  into `tb_pelanggan`(`idpelanggan`,`namalengkap`,`alamat`,`telp`,`usia`,`buktifotoresep`) values 
(1,'Reyna','Jl. Batubara No. 2124',1082701570,18,'resep paracetamol'),
(2,'Renhard','Jl. Bara api No. 3483',1082018405,20,'resep sanmol');

/*Table structure for table `tb_supplier` */

DROP TABLE IF EXISTS `tb_supplier`;

CREATE TABLE `tb_supplier` (
  `idsupplier` int(4) NOT NULL AUTO_INCREMENT,
  `perusahaan` varchar(100) NOT NULL,
  `telp` varchar(20) NOT NULL,
  `alamat` text NOT NULL,
  `keterangan` text NOT NULL,
  PRIMARY KEY (`idsupplier`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tb_supplier` */

insert  into `tb_supplier`(`idsupplier`,`perusahaan`,`telp`,`alamat`,`keterangan`) values 
(1,'PT.Merah','87203195','Jln.waturenggong no 10 Denpasar','Analgesics, Inhalants'),
(2,'PT.Putih','97797691','Jl.ilmiah No. 132, Mageran','Overdosis');

/*Table structure for table `tb_transaksi` */

DROP TABLE IF EXISTS `tb_transaksi`;

CREATE TABLE `tb_transaksi` (
  `idtransaksi` int(5) NOT NULL AUTO_INCREMENT,
  `tgltransaksi` date NOT NULL,
  `idpelanggan` int(4) NOT NULL,
  `kategoripelanggan` varchar(15) NOT NULL,
  `totalbayar` double DEFAULT NULL,
  `bayar` double DEFAULT NULL,
  `kembali` double DEFAULT NULL,
  `namapelanggan` varchar(20) NOT NULL,
  `namakaryawan` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`idtransaksi`),
  KEY `idpelanggan` (`idpelanggan`),
  CONSTRAINT `tb_transaksi_ibfk_1` FOREIGN KEY (`idpelanggan`) REFERENCES `tb_pelanggan` (`idpelanggan`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tb_transaksi` */

insert  into `tb_transaksi`(`idtransaksi`,`tgltransaksi`,`idpelanggan`,`kategoripelanggan`,`totalbayar`,`bayar`,`kembali`,`namapelanggan`,`namakaryawan`) values 
(1,'2021-08-01',1,'dengan resep',100000,200000,100000,'',NULL),
(2,'2021-08-02',2,'tanpa resep',12000,15000,3000,'',NULL);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
