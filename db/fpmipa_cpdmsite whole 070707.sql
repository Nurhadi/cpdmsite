-- phpMyAdmin SQL Dump
-- version 4.1.8
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 07, 2014 at 09:47 PM
-- Server version: 5.1.73-cll
-- PHP Version: 5.4.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `fpmipa_cpdmsite`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(7) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL,
  `type` varchar(25) NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'active',
  `created_at` datetime NOT NULL,
  `update_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `firstname`, `lastname`, `username`, `password`, `email`, `type`, `status`, `created_at`, `update_at`) VALUES
(0000001, 'Nurhadi', 'Maulana', 'nurhadimaulana92', '7a3b9c5b2b94e767bdf525b6bb9ccaef', 'nurhadimaulana92@gmail.com', 'admin', 'active', '2014-02-18 00:00:00', '2014-02-18 00:00:00'),
(0000002, 'Iyan', 'Sopian', 'iyansopian', '5f4dcc3b5aa765d61d8327deb882cf99', 'admin@example.com', 'super', 'active', '2014-06-13 00:00:00', '2014-06-13 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `page`
--

CREATE TABLE IF NOT EXISTS `page` (
  `page_id` int(7) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `keywords` varchar(100) NOT NULL,
  `description` varchar(255) NOT NULL,
  `content` text NOT NULL,
  PRIMARY KEY (`page_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `page`
--

INSERT INTO `page` (`page_id`, `title`, `keywords`, `description`, `content`) VALUES
(0000001, 'CPD-MSITE FPMIPA UPI', 'Bimtek,laboran,kimia,fisika,ipa,biologi,sertifikasi,sertifikat', 'kumpulan berita atau news tentang bimtek,sertifikasi', '<p>konten deskripsi berita dental zone bandung</p>'),
(0000002, 'Profile', 'profile dokter gigi bandung, daftar dokter gigi di dental zone', 'Merupakan daftar informasi atau profile dari dokter gigi yang terdapat di dental zone bandung', '<p>Candy canes biscuit caramels topping gingerbread fruitcake apple pie \nicing. Powder jelly beans sugar plum halvah fruitcake. I love carrot \ncake brownie biscuit carrot cake. Chupa chups ice cream pastry soufflé \ncaramels.</p>'),
(0000003, 'Treatment', 'treatment dokter gigi bandung, pelayanan dental zone bandung', 'Merupakan kumpulan treatment dokter gigi dental zone bandung', '<p>Candy canes biscuit caramels topping gingerbread fruitcake apple pie icing. Powder jelly beans sugar plum halvah fruitcake. I love carrot cake brownie biscuit carrot cake. Chupa chups ice cream pastry soufflé caramels.</p>'),
(0000004, 'About Us', 'tentang klinik gigi bandung, tentang dental zone bandung', 'informasi tentang klinik gigi bandung', '<p>merupakan isi dari tentang kami halaman klinik gigi bandung</p>');

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
  `informasi_laboratorium_sekolah` varchar(255) NOT NULL,
  `periode_pelatihan` varchar(50) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'pending',
  `tanggal_dibuat` datetime NOT NULL,
  `bukti_pembayaran` varchar(255) NOT NULL,
  `tanggal_konfirmasi` datetime NOT NULL,
  `tanggal_disetujui` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=43 ;

--
-- Dumping data for table `peserta`
--

INSERT INTO `peserta` (`id`, `nama_lengkap`, `kategori`, `nidn_nip`, `tempat`, `tanggal_lahir`, `alamat`, `instansi`, `alamat_instansi`, `no_telepon`, `no_handphone`, `email`, `surat_tugas`, `informasi_laboratorium_sekolah`, `periode_pelatihan`, `foto`, `status`, `tanggal_dibuat`, `bukti_pembayaran`, `tanggal_konfirmasi`, `tanggal_disetujui`) VALUES
(0000009, 'RITA INDIASTUTI, S.Pd', 'Kimia', '197702212006042018', 'MAJALENGKA', '1977-02-21', 'BLOK REBO RT 003 RW 005 CIKIJING MAJALENGKA 45466', 'SMAN 1 CIKIJING', 'JL DEWI SARTIKA NO 07 CIKIJING MAJALENGKA 45466', '', '082119653760', 'ritaindiastuti@gmail.com', 'Surat_Izin_Pelatihan_lab_Rita.jpg', 'daftar_Inventaris_lab_fisika_KimiA_Bio_Page_1.jpg', '22/06/2014 - 29/06/2014', 'Rita_Indiastuti_SPd1.jpg', 'approved', '2014-06-12 13:55:41', 'bukti_transfer.jpg', '2014-06-15 19:24:00', '2014-06-19 09:21:16'),
(0000010, 'DEWI SUSANTI KANIAWATI, S.Pd', 'Fisika', '197506052000032003', 'GARUT', '1975-06-05', 'BLOK KONDANGSARI RT 04/08 DESA BANJARANSARI CIKIJING MAJALENGKA', 'SMAN 1 CIKIJING', 'JL. DEWI SARTIKA NO 07 CIKIJING MAJALENGKA 45466', '', '08122463181', 'dewi_suryadi@ymail.com', 'Surat_Izin_Pelatihan_lab_Bu_Dewi.jpg', 'daftar_Inventaris_lab_fisika#.jpg', '22/06/2014 - 29/06/2014', 'Foto_Dewi.jpg', 'approved', '2014-06-12 14:51:45', 'bukti_transfer1.jpg', '2014-06-15 19:27:15', '2014-06-19 09:21:03'),
(0000011, 'Aat Ratna Ayu S., S.Pd', 'Kimia', '197905072008012014', 'Majalengka', '1979-05-07', 'blok Kliwon RT. 002 RW. 005 Desa Panjalin Lor Kecamatan Sumberjaya Majalengka 45455', 'SMAN 1 Leuwimunding', 'Alamat Instansi : Jl. Raya Utara Leuwimunding Majalengka 45473', '0233510153', '08121434516', 'ara.ayu7@gmail.com', 'surat_tugas10.jpg', 'lab_kimia_leuwi_munding_Page_3.jpg', '22/06/2014 - 29/06/2014', 'foto.jpg', 'approved', '2014-06-12 16:50:03', 'bukti_transfer2.jpg', '2014-06-15 19:29:56', '2014-06-19 09:20:50'),
(0000012, 'Dra. WIWI WIANSIH, M.Pd', 'Kimia', '19641027 198803 2 006', 'Ciamis', '1964-10-27', 'Kp. Nanggela Rt. 02 Rw. 06 Kel. Cigantang\nKec. Mangkubumi Kota Tasikmalaya.\n', 'SMA NEGERI 3 TASIKMALAYA', 'Jalan. Letkol Basir Surya No. 89 Tasikmalaya', '0265347319', '085295207879', 'Wiwiwiansih27@yahoo.co.id', 'S_U_R_A_T_T_U_G_A_S_1.doc', 'INFORMASI_LABORATORIUM_SEKOLAH.docx', '22/06/2014 - 29/06/2014', 'Wiwi.JPG', 'approved', '2014-06-14 10:35:03', 'Bukti_Pembayaran_001.jpg', '2014-06-16 10:24:37', '2014-06-19 09:19:57'),
(0000013, 'Arin Tentrem Mawati, S.Pd', 'Kimia', '197001312008012009', 'Sleman', '1970-01-31', 'Perum. Cibiru Asri Blok R No. 16, Cibiru Wetan, Cileunyi, Bandung', 'SMA Karya Pembangunan 2 Bandung', 'Jl. AH. Nasution No. 25A Bandung', '', '085860797256', 'arinmawati16@gmail.com', 'Surat_Tugas4.jpg', 'PROGRAM_KERJA_LABORATORIUM_KIMIA.docx', '22/06/2014 - 29/06/2014', '4x64.jpg', 'approved', '2014-06-14 10:39:30', 'Transfer_BNI.jpg', '2014-06-19 19:46:38', '2014-06-20 09:25:46'),
(0000017, ' Rahmi Rissa, S.Si', 'Kimia', '0000009862', 'Ketinggian', '1986-02-14', 'Kompleks BTN Giam Asri Blok C No. 7 Jalan Giam 5 Asrama Tribrata RT 05/ RW 13 Kelurahan Pematang Pudu Kec. Mandau Kab. Bengkalis Riau', 'SMAS Cendana Mandau', 'Kompleks Krakatau PT. CPI Duri Kec. Mandau Kab. Bengkalis', '', '085265748164', 'rahmirissa86@gmail.com', 'surat_tugas_rahmi_rissa6.pdf', 'Program_lab_smas_cendana_mandau.pdf', '22/06/2014 - 29/06/2014', 'foto_rahmi_rissa6.JPG', 'pending', '2014-06-16 11:52:22', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(0000019, 'Julaeha, SPd', 'Kimia', '196608191995122002', 'Bandung', '1966-08-19', 'J alan Asep Berlian Gg Sukarela No 222/143A Bandung 40124', 'SMA Negeri 16 Garut', 'Jalan Raya Cidatar No 810A', '', '081320627446', 'peyembandung12@yahoo.co.id', 'surat_tugas16.jpg', 'BUKU_DAFTAR_INVENTARIS.docx', '22/06/2014 - 29/06/2014', 'DSCF54171.JPG', 'approved', '2014-06-16 14:14:23', 'CCI06182014_0000.jpg', '2014-06-18 14:57:21', '2014-06-19 09:20:14'),
(0000020, 'Isran Mihardi, S.Si', 'Fisika', '19860407 201001 1 011', 'Pelepak Putih', '1986-04-07', 'Jl. Raya Pelepak Pute RT 01 RW 02 Desa Pelepak Pute Kecamatan Sijuk Kabupaten Belitung Provinsi Kepulauan Bangka Belitung', 'SMAN 1 Kelapa Kampit', 'Jl. Beringin 2 Desa Mentawak Kecamatan Kelapa Kampit Kabupaten Belitung Timur Provinsi Kepulauan Bangka Belitung', '', '085921023555', 'isran.m@gmail.com', 'surat_tugas_isran_mihardi.jpg', 'PROFIL_LABORATORIUM_FISIKA_SMAN_1_KELAPA_KAMPIT.docx', '22/06/2014 - 29/06/2014', 'foto_isran_mihardi.jpg', 'approved', '2014-06-16 15:59:00', 'bukti_transfer3.jpg', '2014-06-17 15:43:09', '2014-06-19 09:20:29'),
(0000021, 'Ade Hermawan, S.Pd', 'Fisika', '198002292005011003', 'Kulon Progo', '1980-02-29', 'Jl. Letnan Dadi Suryatman RT 01 RW 09 Kel. Sukamanah Kec. Cipedes Kota Tasikmalaya', 'MAN Tasikmalaya', 'Kompleks Pesantren Al-Misbah Jl. Bantar Kota Tasikmalaya Telp (0265) 325887', '0265325887', '081323682687', 'timiecomet@gmail.com', 'surat_tugas25.pdf', 'lab_fisika1.pdf', '22/06/2014 - 29/06/2014', 'ADE_HERMAWAN_web.jpg', 'approved', '2014-06-17 08:14:40', 'slip_tranfer.jpg', '2014-06-19 15:20:38', '2014-06-19 15:31:06'),
(0000022, 'Heni Fauziyah, S.Pd', 'Kimia', '198201172005012002', 'Tasikmalaya', '1982-01-17', 'Jl. Awipari no. 99 RT 03 RW 01 Kec. Cibeureum Kota Tasikmalaya 46196', 'MAN Tasikmalaya', 'Komplek Pesantren Al-Misbah Jl. Bantar Kota Tasikmalaya', '', '085310641005', 'heniefz@yahoo.com', 'surat_tugas27.pdf', 'lab_kimia.pdf', '22/06/2014 - 29/06/2014', 'HENI_FAUZIYAH_web.jpg', 'approved', '2014-06-17 08:21:23', '20140618_164745.jpg', '2014-06-18 16:56:38', '2014-06-19 09:50:56'),
(0000023, 'Muniatuz Azairok, S.Pd', 'Fisika', '19801005 200501 2 006', 'Malang', '1980-10-06', 'ASRAMA KOREM 045/GAYA', 'SMA 1 Namang', 'Jl.. Raya Koba Km.21', '', '082174627322', 'muniatuzazairok@gmail.com', 'surat_tugas31.pdf', 'Dokumentasi_Kegiatan_Laboratorium_SMA_1_Namang.docx', '22/06/2014 - 29/06/2014', 'foto_muniatuz_azairok,_S.Pd_19.jpg', 'approved', '2014-06-17 15:13:55', 'bukti_transfer_001.jpg', '2014-06-17 15:14:45', '2014-06-19 09:31:10'),
(0000024, 'ABDI RINALDI, S.Pd', 'Kimia', '198405202009041001', 'Sungailiat', '1984-05-20', 'JL. TELADAN SEDERHANA TOBOALI – BANGKA SELATAN', 'SMAN 2 TOBOALI', 'JL. KI HAJAR DEWANTARA SPC RIAS TOBOALI', '', '082178777645', 'aldhirenaldhi@yahoo.co.id', 'SURAT_TUGAS.docx', 'INFORMASI_LABORATORIUM_KIMIA_SMAN_2_TOBOLALI.docx', '22/06/2014 - 29/06/2014', 'ABDI_RINALDI.jpg', 'approved', '2014-06-17 15:23:03', 'BUKTI_TRANSFER_ABDI_RINALDI.jpg', '2014-06-17 15:23:53', '2014-06-19 09:22:26'),
(0000025, 'Dra. Ecin Kuraesin', 'Kimia', '196607251992032005', 'Bandung', '1966-07-25', 'Jl.Arjasari No.20 Kab. Bandung', 'SMA Negeri 1 Banjaran', 'Jl.Ciapus No.7 Kab. Bandung', '', '087825044644', 'katakukimiakeren@gmail.com', 'Surat_Tugas.JPG', 'Surat_Tugas1.JPG', '22/06/2014 - 29/06/2014', 'Dra_Ecin_Kuraesin.jpg', 'approved', '2014-06-17 15:28:53', 'Bukti_Transfer.JPG', '2014-06-17 15:29:25', '2014-06-19 09:22:40'),
(0000026, 'DRA EVA NILLASARI', 'Kimia', '196707282005012005', 'Palembang', '1967-07-28', 'JL KANTOR LURAH ARDAL RT 17', 'SMA 1 KOBA	', 'JL RAYA ARUNG DALAM KOBA', '', '082175567036', 'evanillasari@yahoo.co.id', 'SURAT_TUGAS.pdf', 'LABORATORIUM_DI_SMA_1_KOBA2.docx', '22/06/2014 - 29/06/2014', 'FOTO_EVA_NILLA_SARI.jpg', 'approved', '2014-06-17 15:32:46', 'BUKTI_SETOR_BANK_BNI1.jpg', '2014-06-17 15:33:32', '2014-06-19 09:22:53'),
(0000027, 'Dra. Titis Ambetkasih', 'Kimia', '197008121995122002', 'Bandung', '1970-08-12', 'Jl. Mayang Cinde No. 39 Komplek Simpay Asih Ujung Berung Bandung', 'SMA PGII 2', 'Jl. Pahlawan Blk. No 17 Bandung', '', '081320547415', 'ambetkasih@gmail.com', 'surat-tugas-titis.pdf', 'KONDISI_LABORATORIUM_KIMIA1.docx', '22/06/2014 - 29/06/2014', 'Titis1.JPG', 'approved', '2014-06-17 17:03:19', 'bukti-transfer-titis.pdf', '2014-06-18 18:55:06', '2014-06-19 09:30:55'),
(0000030, 'Dra. Nurwati, MM', 'Fisika', '196307041984032002', 'Jakarta, 1963-07-04', '2014-06-19', 'Jalan Gunung Bromo II/D6, No. 100 Cirebon', 'SMA Negeri 3 Cirebon', 'Jalan. Ciremai Raya No. 63 Cirebon', '', '081910242573', 'nurwati03@yahoo.co.id', 'Surat_Tugas_Nurwati.jpg', 'LABORATORIUM_FISIKA_SMA_NEGERI_3_CIREBON.docx', '22/06/2014 - 29/06/2014', 'NURWATI.jpg', 'approved', '2014-06-19 09:49:02', 'kwitansi.jpg', '2014-06-20 11:00:18', '2014-06-20 11:00:38'),
(0000031, 'Dra. Euis Siti Maemunah', 'Kimia', '196808271993032008', 'Bandung', '1968-08-27', 'Jl. Waringin Kurung No. 1 Kramatwatu Permai kab. Serang-Banten\n', 'SMAN 1 KRAMATWATU KAB. SERANG', 'Jl. Pancoran No. 1 Kramatwatu Kab. Serang', '0254231269', '081381296298', 'sitimaemunaheuis@yahoo.co.id', 'cmd.exe', 'cmd1.exe', '22/06/2014 - 29/06/2014', 'DSC_0333.JPG', 'approved', '2014-06-19 13:39:56', 'DSC_0336.JPG', '2014-06-20 10:29:13', '2014-06-20 10:30:15'),
(0000033, 'Nuraini Siburian S.Si', 'Fisika', '197708212003122004', 'Simaro/1977-21-08', '2014-06-19', 'Jl kalamaya dalam, bacang, kec bukit intan, pangkalpinang', 'SMA 2 SUNGAISELAN', 'Jl raya Sungaiselan desa keretak', '', '081362071772', 'nuraini77siburian@yahoo.co.id', '20140618_130711.jpg', '20140618_1307111.jpg', '22/06/2014 - 29/06/2014', 'DSC_9039.JPG', 'approved', '2014-06-19 21:40:58', '20140619_131315.jpg', '2014-06-20 08:36:36', '2014-06-20 09:25:12'),
(0000034, 'Dra. Tri Suciati', 'Kimia', '196810091995032002', 'Jakarta', '1968-10-09', 'Jl. Madrasah No. 20 Komplek Depag Jakarta Selatan 12420', 'MA Negeri 19 Jakarta', 'Jl. H. Mukhtar Raya / H. Jaelani III RT 005/ 01 No.88. Petukangan Utara Jakarta Selatan12260', '01294513292', '08161333528', 'tri.suciati.man19@gmail.com', 'img017.pdf', 'LABORATORIUM_KIMIA_MAN_19_JAKARTA.docx', '22/06/2014 - 29/06/2014', 'img016.pdf', 'approved', '2014-06-20 10:33:59', 'img013.jpg', '2014-06-20 10:45:48', '2014-06-20 10:58:55'),
(0000035, 'Heti Sulastri S.Pd', 'Kimia', '196510021988032009', 'Sukabumi', '1965-10-02', 'Jl.Gunung Batu Dalam Cidamar Gg.Bapa Bungsu No.27 Rt.06/08 Kel.Pasirkaliki Kec.Cimahi Utara', 'SMA Pasundan 2 Bandung', 'Jl.Cihampelas 167 Bandung', '', '081321197365', 'heti.sulastri@yahoo.com', 'heti.jpg', 'Profil_Laboratorium_SMA_Pasundan_2_Bandung.docx', '22/06/2014 - 29/06/2014', 'heti_2.jpg', 'pending', '2014-06-20 12:20:14', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(0000036, 'Nasrun,S.Pd', 'Fisika', '19680703 199303 1005', 'Babat Banyuasin', '1968-07-03', 'Jl.Pelalatan Belliton I, Desa Pembaharuan, Kec.Kelapa Kampit, Kab.Belitung Timur, Prop.Kep.Bangka Belitung', 'SMKN 1 Kelapa Kampit', 'Jl.Beringin 2 Ds.Mentawak, Kec.Kelapa Kampit', '', '081929688797', 'smkn1kk@yahoo.co.id', 'surat_tugas32.pdf', 'Daftar_Informasi_Laboratorium_Sekolah.doc', '22/06/2014 - 29/06/2014', 'nasrun.jpg', 'approved', '2014-06-20 13:13:26', 'transfer_diklat_nasrun.jpg', '2014-06-20 13:24:59', '2014-06-20 13:27:24'),
(0000037, 'Imas Mastini, S.Pd', 'Kimia', '1985140305030', 'Tasikmalaya', '1985-01-24', 'Cibangun Tengah RT/RW 02/09 Kelurahan Cibangun Kecamatan Cibeureum Kota Tasikmalaya', 'SMK Husnul Khotimah', 'Komplek Pontren Husnul Khotimah Desa Gunajaya Kecamatan Manonjaya Kabupaten Tasikmalaya Provinsi Jawa Barat.', '', '085213151104', 'imashakim@gmail.com', 'img002.jpg', 'lab_kim_besar.jpg', '22/06/2014 - 29/06/2014', 'Imas_Mastini.jpg', 'approved', '2014-06-20 13:27:03', 'Bukti_Transfer_Imas_Mastini,_S.Pd.jpg', '2014-06-21 11:21:36', '2014-06-21 18:55:43'),
(0000038, 'Frinnia, S.Pd.', 'Fisika', '197309072008012002', 'Bandung', '2014-06-20', 'JL. Purbasari no 19 komplek Guruminda Bandung', 'SMAN 6 Kota Bandung', 'Jl. Pasirkali N0 51', '', '08157055948', 'sma6_bandung@yahoo.co.id', '001.jpg', '0011.jpg', '22/06/2014 - 29/06/2014', 'bu_frint1.jpg', 'pending', '2014-06-20 13:41:40', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(0000039, 'Derus Amirawati, S.Si, M.Pd', 'Kimia', '19740417 200501 2 011', 'Madiun/ 1974-04-17', '1974-04-17', 'Jl. Alamanda VI NO 8 BUKIT PALEM CILEGON BANTEN', 'SMAN 2 KS CILEGON', 'JL SEMANG RAYA NO 1 KOMP KS CILEGON BANTEN', '', '08129884394', 'derusugik@yahoo.com', '20140621_072321.jpg', '20140621_0723211.jpg', '22/06/2014 - 29/06/2014', '20140414_065243.jpg', 'approved', '2014-06-21 07:52:05', 'Bukti_Transfer.jpg', '2014-06-21 19:00:37', '2014-06-21 19:00:57'),
(0000040, 'Dewi Retno Lestari,S.Pd', 'Kimia', '198208042009022002', 'Bandung', '1982-08-04', 'Jalan Cicalengka 6 No. 32 Antapani Kidul\nBandung 40291', 'SMKN 12 BANDUNG', 'Jalan Pajajaran No.92 Bandung', '0227210811', '081324086077', 'dewiretnolestari@gmail.com', 'IMG_20140621_0001.pdf', 'info_lab_SMKN12BDG.zip', '22/06/2014 - 29/06/2014', 'dewiretnolestari.jpg', 'approved', '2014-06-21 08:56:39', 'IMG_20140621_0002.jpg', '2014-06-21 09:09:38', '2014-06-21 18:56:35'),
(0000041, 'Dra Prita Dewi', 'Fisika', '196602121990032003', 'Bandung', '1966-02-12', 'Jalan Bijaksana II No 4 Bandung', 'SMA Negeri 2 Bandung', 'Jalan Cihampelas No 173 Bandung', '02220340136', '08156085995', 'inarwj@yahoo.com', 'Surat_Tugas.docx', 'Informasi_Lab.docx', '22/06/2014 - 29/06/2014', 'utk_daftar.jpg', 'approved', '2014-06-21 19:15:44', 'bukti_transf.jpg', '2014-06-21 19:18:08', '2014-06-21 20:15:33'),
(0000042, 'sri kusalawati spd', 'Kimia', '196207071988032006', 'Bandung', '2014-06-22', 'Jl purwakarta raya 127 antapani Bandung', 'SMA Negeri 12 Bandung', 'Jl Sekejati no 36 kiaracondong Bandung', '0227270516', '081910339133', 'srikusalawati@gmail.com', '20140620_131450.jpg', '20140621_080930.jpg', '22/06/2014 - 29/06/2014', '20140620_133818.jpg', 'pending', '2014-06-22 07:42:37', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
