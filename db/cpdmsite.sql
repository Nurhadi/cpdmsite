-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 10, 2014 at 05:07 PM
-- Server version: 5.6.11
-- PHP Version: 5.5.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `cpdmsite`
--
-- CREATE DATABASE IF NOT EXISTS `cpdmsite` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
-- USE `cpdmsite`;

-- --------------------------------------------------------

--
-- Table structure for table `peserta`
--

CREATE TABLE IF NOT EXISTS `peserta` (
  `id` int(7) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `nama_lengkap` varchar(100) NOT NULL,
  `kategori` varchar(50) NOT NULL,
  `nidn_nip` varchar(50) NOT NULL,
  `tempat` varchar(50) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` text NOT NULL,
  `instansi` varchar(50) NOT NULL,
  `alamat_instansi` text NOT NULL,
  `no_telepon` varchar(20) NOT NULL,
  `no_handphone` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `surat_tugas` varchar(255) NOT NULL,
  `periode_pelatihan` varchar(50) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'pending',
  `tanggal_dibuat` datetime NOT NULL,
  `bukti_pembayaran` varchar(255) NOT NULL,
  `tanggal_konfirmasi` datetime NOT NULL,
  `tanggal_disetujui` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
