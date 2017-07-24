-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 24, 2017 at 07:03 PM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `capex_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `additional_tr`
--

CREATE TABLE IF NOT EXISTS `additional_tr` (
  `add_tr_id` int(11) NOT NULL,
  `opex_trd_id` int(11) NOT NULL,
  `budget` int(15) NOT NULL,
  `year` int(5) NOT NULL,
  `reason` text NOT NULL,
  `submit` varchar(80) NOT NULL,
  `kode` varchar(10) NOT NULL,
  `username` varchar(50) NOT NULL,
  `create_date` datetime NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `user_agent` varchar(225) NOT NULL,
  `ip_address` varchar(16) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `additional_tr`
--

INSERT INTO `additional_tr` (`add_tr_id`, `opex_trd_id`, `budget`, `year`, `reason`, `submit`, `kode`, `username`, `create_date`, `last_update`, `user_agent`, `ip_address`) VALUES
(1, 37, 1200000, 2017, 'ada penambahan orang', '', 'HD', 'alhusna901@gmail.com', '2017-06-04 11:54:37', '2017-06-04 05:46:52', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:53.0) Gecko/20100101 Firefox/53.0', '::1'),
(2, 37, 780000, 2017, 'belajar ke yunani terkait ekonomi', '', 'HD', 'alhusna901@gmail.com', '2017-06-05 05:19:45', '2017-06-04 22:19:45', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:53.0) Gecko/20100101 Firefox/53.0', '::1');

-- --------------------------------------------------------

--
-- Table structure for table `department_ms`
--

CREATE TABLE IF NOT EXISTS `department_ms` (
  `kode_department` varchar(3) NOT NULL,
  `department` varchar(100) NOT NULL,
  `kode_div` varchar(4) NOT NULL,
  `description` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department_ms`
--

INSERT INTO `department_ms` (`kode_department`, `department`, `kode_div`, `description`) VALUES
('AA', 'MANAGEMENT', 'A', ''),
('BA', 'HOUSING & MACHINE', 'B', ''),
('BB', 'AXLE SHAFT & YOKE MACH', 'B', ''),
('BC', 'REAR AXLE & PROP. SHAFT', 'B', ''),
('BD', 'PPIC', 'B', ''),
('BE', 'MAINTENANCE', 'B', ''),
('BF', 'QUALITY CONTROL', 'B', ''),
('BG', 'WAREHOUSE', 'B', ''),
('CA', 'PROCESS ENGINEERING', 'C', ''),
('CB', 'PRODUCT ENGINEERING', 'C', ''),
('DA', 'QUALITY ASSURANCE', 'D', ''),
('EA', 'HUMAN RESOURCES', 'E', ''),
('EB', 'GA & IR', 'E', ''),
('FA', 'EHS & CSR', 'F', ''),
('GA', 'PURCHASING PLANNING', 'G', ''),
('GB', 'GENERAL PURCHASING', 'G', ''),
('GC', 'PURCHASING BUYER', 'G', ''),
('HA', 'CORPORATE CONTROL', 'H', ''),
('HB', 'BUDGET & COST CONTROL', 'H', ''),
('HC', 'FINANCE & ACCOUNTING', 'H', ''),
('HD', 'IT', 'H', ''),
('IA', 'SALES ADMIN', 'I', '');

-- --------------------------------------------------------

--
-- Table structure for table `detail_department_opex_acc`
--

CREATE TABLE IF NOT EXISTS `detail_department_opex_acc` (
  `id_ddoa` int(11) NOT NULL,
  `kode_department` varchar(3) NOT NULL,
  `no_acc_opex` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=58 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_department_opex_acc`
--

INSERT INTO `detail_department_opex_acc` (`id_ddoa`, `kode_department`, `no_acc_opex`) VALUES
(1, 'EB', '704.00.001'),
(2, 'EB', '706.00.001'),
(3, 'EB', '707.01.001'),
(4, 'EB', '707.04.001'),
(5, 'EB', '712.02.001'),
(6, 'EB', '713.00.001'),
(7, 'EB', '714.00.001'),
(9, 'EB', '724.04.001'),
(10, 'EB', '726.01.001'),
(11, 'EB', '726.02.001'),
(12, 'EB', '726.04.001'),
(13, 'EB', '726.05.001'),
(14, 'EB', '726.06.001'),
(15, 'EB', '726.07.001'),
(16, 'EB', '726.08.001'),
(17, 'EB', '726.09.001'),
(18, 'EB', '726.99.001'),
(19, 'EB', '728.00.001'),
(20, 'EA', '704.00.001'),
(21, 'EA', '706.00.001'),
(22, 'EA', '707.02.001'),
(23, 'EA', '707.03.001'),
(24, 'EA', '707.05.001'),
(25, 'EA', '708.00.001'),
(26, 'BE', '704.00.001'),
(27, 'BE', '706.00.001'),
(28, 'BE', '712.02.001'),
(29, 'BE', '712.03.001'),
(30, 'FA', '704.00.001'),
(31, 'FA', '706.00.001'),
(32, 'FA', '728.00.001'),
(33, 'HD', '704.00.001'),
(34, 'HD', '706.00.001'),
(35, 'HD', '726.03.001'),
(36, 'EB', '730.99.001'),
(37, 'EB', '738.02.001'),
(38, 'EB', '755.01.001'),
(39, '', ''),
(40, 'FA', '730.99.001'),
(41, 'EA', '730.99.001'),
(42, 'EA', '750.00.001'),
(43, 'BE', '730.99.001'),
(44, 'HD', '730.99.001'),
(45, 'HC', '704.00.001'),
(46, 'HC', '706.00.001'),
(47, 'HC', '730.99.001'),
(48, 'HC', '742.00.001'),
(49, 'AA', '704.00.001'),
(50, 'AA', '706.00.001'),
(51, 'AA', '730.99.001'),
(52, 'AA', '732.00.001'),
(53, 'HA', '704.00.001'),
(54, 'HA', '706.00.001'),
(55, 'HA', '730.99.001'),
(56, 'HA', '750.01.001'),
(57, 'EB', '724.01.001');

-- --------------------------------------------------------

--
-- Table structure for table `division_ms`
--

CREATE TABLE IF NOT EXISTS `division_ms` (
  `kode_div` varchar(3) NOT NULL,
  `division` varchar(100) NOT NULL,
  `description` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `division_ms`
--

INSERT INTO `division_ms` (`kode_div`, `division`, `description`) VALUES
('A', 'MANAGEMENT', ''),
('B', 'PRODUCTION', ''),
('C', 'ENGINEERING', ''),
('D', 'QUALITY ASSURANCE', ''),
('E', 'HR & GA-IR', ''),
('F', 'EHS', ''),
('G', 'PURCHASING', ''),
('H', 'ADMINISTRATION & IT', ''),
('I', 'SALES ADMIN/MARKETING', '');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `opex_ms`
--

CREATE TABLE IF NOT EXISTS `opex_ms` (
  `no_acc_opex` varchar(20) NOT NULL,
  `account_name` varchar(40) NOT NULL,
  `detail` varchar(100) NOT NULL,
  `aktivasi` enum('ON','OFF') NOT NULL,
  `controllable` enum('YES','NO') NOT NULL,
  `cost_pool` varchar(20) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `opex_ms`
--

INSERT INTO `opex_ms` (`no_acc_opex`, `account_name`, `detail`, `aktivasi`, `controllable`, `cost_pool`, `description`) VALUES
('704.00.001', '', 'REPRESENTATION AND ENTERTAINMENT', '', 'YES', 'All Department', 'JUMLAH YANG DIKELUARKAN PERUSAHAAN UNTUK BIAYA ENTERTAINMENT KE CUSTOMER, SUPPLIER KHUSUS, PEMERINTAHAN, SESAMA PERUSAHAAN AFFILIASI DLL. CONTOH: MAKAN BERSAMA, GOLF, KARANGAN BUNGA, SOUVENIR, GRATIFIKASI LAINNYA.\r\n'),
('706.00.001', '', 'TRAVELLING EXPENSES', '', 'YES', 'All Department', 'JUMLAH YANG DIKELUARKAN PERUSAHAAN UNTUK BIAYA PERJALANAN DINAS. BIAYA INI TERMASUK UANG SAKU, UANG MAKAN, HOTEL, TRANSPORT, TIKET, BAJU MUSIM DINGIN. BESARANNYA TUNJANGAN PERJALANAN DINAS DITENTUKAN OLEH GA.\r\n'),
('707.01.001', '', 'MAGAZINE', '', 'YES', 'GA & IR', 'JUMLAH YANG DIKELUARKAN PERUSAHAAN UNTUK MAJALAH.\r\n'),
('707.02.001', '', 'ON JOB TRAINING AND CONTRACT PROJECT', '', 'YES', 'HR', 'JUMLAH YANG DIKELUARKAN PERUSAHAAN UNTUK PEMBAYARAN UANG SAKU OJT, PSG, KONTRAK PROJECT'),
('707.03.001', '', 'TRAINING', '', 'YES', 'HR', 'JUMLAH YANG DIKELUARKAN PERUSAHAAN UNTUK PEMBAYARAN BIAYA TRAINING. TERMASUK JUGA BIAYA PENGINAPAN PELATIH.'),
('707.04.001', '', 'SCHOLARSHIP', '', 'YES', 'GA & IR', 'JUMLAH YANG DIKELUARKAN PERUSAHAAN UNTUK PEMBAYARAN BEASISWA ANAK-ANAK KARYAWAN DAN LINGKUNGAN SEKITAR.'),
('707.05.001', '', 'QCC PROJECT', '', 'YES', 'HR', 'JUMLAH YANG DIKELUARKAN PERUSAHAAN UNTUK PEMBAYARAN BIAYA QCC'),
('708.00.001', '', 'RECRUITMENT EXPENSES', '', 'YES', 'HR', 'JUMLAH YANG DIKELUARKAN PERUSAHAAN UNTUK PEMBAYARAN BIAYA YANG BERKAITAN DENGAN RECRUITMENT. CONTOH : BIAYA MEDICL CHECK UP, BIAYA PSIKOTEST DLL.'),
('712.02.001', '', 'IMPROVEMENT', '', 'YES', 'MTC, GA & IR', 'JUMLAH YANG DIKELUARKAN PERUSAHAAN UNTUK REPAIR DAN MAINTENACE SARANA DAN PRASARANA GEDUNG OFFICE. CONTOH : BAHAN BANGUNAN, PIPA, PRALON.'),
('712.03.001', '', 'OFFICE BUILDING', '', 'YES', 'MTC', 'JUMLAH YANG DIKELUARKAN PERUSAHAAN UNTUK REPAIR DAN MAINTENACE GEDUNG OFFICE. BIAYA INI BERKAITAN DAN SHARING BIAYA '),
('713.00.001', '', 'CAR RUNNING EXPENSES', '', 'YES', 'GA & IR', 'BERKAITAN DENGAN KENDARAAN TERMASUK BIAYA PENGGANTIAN PEMAKAIN KENDARAAN PRIBADI UNTUK DINAS. CONTOH : PARKIR, TOLL, TAMBAL BAN, GANTI OLI.'),
('714.00.001', '', 'FUEL AND LUBRICATION EXPENSES', '', 'YES', 'GA & IR', 'JUMLAH YANG DIKELUARKAN PERUSAHAAN UNTUK BBM KENDARAAN POOL DAN KENDARAAN DIREKSI.'),
('724.01.001', '', 'TELEPHONE', '', 'YES', 'GA & IR', 'JUMLAH YANG DIKELUARKAN PERUSAHAAN UNTUK BIAYA KOMUNIKASI SEPERTI : TELEPON, TELEX DAN FACSIMILE, POSTAGE DLL.'),
('724.04.001', '', 'INTERNET', '', 'YES', 'GA & IR', 'JUMLAH YANG DIKELUARKAN PERUSAHAAN UNTUK BIAYA INTERNET'),
('726.01.001', '', 'STATIONARY', '', 'YES', 'GA & IR', 'JUMLAH YANG DIKELUARKAN PERUSAHAAN UNTUK BIAYA ATK OFFICE. CONTOH : TINTA, KERTAS,LAKBAN, CALCULATOR, PAPER CLIP, SPIDOL, STAPLES DLL.'),
('726.02.001', '', 'PRINTING', '', 'YES', 'GA & IR', 'JUMLAH YANG DIKELUARKAN PERUSAHAAN UNTUK BIAYA CETAK, BAHAN CETAK OFFICE.'),
('726.03.001', '', 'COMPUTER SUPPLIES', '', 'YES', 'IT', 'JUMLAH YANG DIKELUARKAN PERUSAHAAN UNTUK PENGADAAN PERALATAN KOMPUTER OFFICE. CONTOH : MEMORY, MOUSE, PRINTER, USB DLL. '),
('726.04.001', '', 'OFFICE EQUIPMENT', '', 'YES', 'GA & IR', 'JUMLAH YANG DIKELUARKAN PERUSAHAAN UNTUK PENGADAAN PERALATAN DAN PERLENGKAPAN OFFICE. CONTOH : MEJA, KURSI, LEMARI, APAR, AC DLL. '),
('726.05.001', '', 'CATERING EXPENSE', '', 'YES', 'GA & IR', 'JUMLAH YANG DIKELUARKAN PERUSAHAAN UNTUK CATERING OFFICE.'),
('726.06.001', '', 'FEE - OFFICE', '', 'YES', 'GA & IR', 'JUMLAH YANG DIKELUARKAN PERUSAHAAN UNTUK PENGGUNAAN JASA OUTHOUSE OFFICE. CONTOH : JASA SUBCONT PENGEMUDI.'),
('726.07.001', '', 'HELMET AND UNIFORM', '', 'YES', 'GA & IR', 'JUMLAH YANG DIKELUARKAN PERUSAHAAN UNTUK SERAGAM DAN PERLENGKAPANNYA KARYAWAN OFFICE. CONTOH: BAJU, CELANA, SEPATU, HELM, ROMPI DLL.  '),
('726.08.001', '', 'DRINK WATER AND MILK', '', 'YES', 'GA & IR', 'JUMLAH YANG DIKELUARKAN PERUSAHAAN UNTUK AIR DAN SUSU KARYAWAN OFFICE.'),
('726.09.001', '', 'PANTRY SUPPLIES', '', 'YES', 'GA & IR', 'JUMLAH YANG DIKELUARKAN PERUSAHAAN UNTUK BIAYA-BIAYA OPERASIONAL DAPUR. CONTOH : GULA, TEH,TISU.'),
('726.99.001', '', 'OFFICE EXPENSE OTHERS', '', 'YES', 'GA & IR', 'JUMLAH YANG DIKELUARKAN PERUSAHAAN UNTUK OPERASIONAL OFFICE DILUAR YANG SUDAH DIKATEGORIKAN.'),
('728.00.001', '', 'DONATION AND CONTRIBUTION', '', 'YES', 'EHS, GA & IR', 'JUMLAH YANG DIKELUARKAN PERUSAHAAN UNTUK SUMBANGAN BENCANA ALAM, SUMBANGAN LINGKUNGAN SEKITAR PERUSAHAAN DLL.'),
('730.99.001', '', 'PROFESIONAL FEE OTHERS', '', 'YES', 'All Department', 'JUMLAH YANG DIKELUARKAN PERUSAHAAN UNTUK BIAYA JASA TENAGA PROFESIONAL DILUAR YANG SUDAH DIKATEGORIKAN.'),
('732.00.001', '', 'TRADE AND PROFESIONAL ASSOCIATION', '', 'YES', 'Management', 'JUMLAH YANG DIKELUARKAN PERUSAHAAN UNTUK BIAYA KEANGGOTAAN PERUSAHAAN PADA SUATU LEMBAGA.'),
('738.02.001', '', 'REGISTRASI AND RETRIBUTION', '', 'YES', 'GA & IR', 'JUMLAH YANG DIKELUARKAN PERUSAHAAN UNTUK BIAYA PENDAFTARAN DAN RETRIBUSI LAINNYA.'),
('740.00.001', '', 'RENT EXPENSES', '', 'YES', 'GA & IR', 'JUMLAH YANG DIKELUARKAN PERUSAHAAN UNTUK BIAYA SEWA YANG BERKAITAN DENGAN OFFICE. CONTOH : SEWA MOBIL, SEWA MESIN FOTOCOPY, SEWA APARTEMEN DLL.'),
('742.00.001', '', 'BANK CHARGES', '', 'YES', 'Finance', 'JUMLAH YANG DIKELUARKAN PERUSAHAAN UNTUK BIAYA ADMINISTRASI BANK CONTOH : BIAYA TRANSAKSI BANK, BIAYA PEMBUKAAN LC.'),
('750.00.001', '', 'INSURANCE EXPENSES', '', 'YES', 'Corp. Control & HR', 'JUMLAH YANG DIKELUARKAN PERUSAHAANUNTUK BIAYA ASURANSI YANG BERKAITAN DENGAN OFFICE SEPERTI ASURANSI MOBIL POOL, ASURANSI PERSONAL ACCIDENT DLL.'),
('755.01.001', '', 'SECURITY EXPENSES', '', 'YES', 'GA & IR', 'JUMLAH YANG DIKELUARKAN PERUSAHAAN UNTUK BIAYA KEAMANAN PERUSAHAAN SEPERTI : GAJI DAN LEMBUR SATPAM.');

-- --------------------------------------------------------

--
-- Table structure for table `opex_tr`
--

CREATE TABLE IF NOT EXISTS `opex_tr` (
  `opex_trid` int(11) NOT NULL,
  `year` int(5) NOT NULL,
  `kode_department` varchar(4) NOT NULL,
  `submit` varchar(4) NOT NULL,
  `total` int(11) NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `last_update` datetime NOT NULL,
  `ip_address` varchar(16) NOT NULL,
  `user_agent` varchar(125) NOT NULL,
  `username` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `opex_tr`
--

INSERT INTO `opex_tr` (`opex_trid`, `year`, `kode_department`, `submit`, `total`, `create_date`, `last_update`, `ip_address`, `user_agent`, `username`) VALUES
(1, 2017, 'EB', '', 0, '2017-06-01 06:47:00', '2017-06-01 13:47:00', '::1', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36 OPR/45.0.2552.', 'syarahsiti@gmail.com'),
(2, 2017, 'HD', '', 0, '2017-06-03 06:39:19', '2017-06-03 13:39:19', '::1', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:53.0) Gecko/20100101 Firefox/53.0', 'alhusna901@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `opex_tr_detail`
--

CREATE TABLE IF NOT EXISTS `opex_tr_detail` (
  `opex_trd_id` int(11) NOT NULL,
  `opex_trid` int(11) NOT NULL,
  `year` int(4) NOT NULL,
  `month` varchar(20) NOT NULL,
  `budget` int(7) NOT NULL COMMENT 'budget perbulan',
  `no_acc_opex` varchar(20) NOT NULL,
  `user_agent` varchar(125) NOT NULL,
  `ip_address` varchar(16) NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `last_update` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `opex_tr_detail`
--

INSERT INTO `opex_tr_detail` (`opex_trd_id`, `opex_trid`, `year`, `month`, `budget`, `no_acc_opex`, `user_agent`, `ip_address`, `create_date`, `last_update`) VALUES
(1, 1, 2017, 'January', 560000, '726.06.001', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36 OPR/45.0.2552.', '::1', '2017-06-01 06:47:00', '2017-06-01 13:47:00'),
(2, 1, 2017, 'February', 0, '726.06.001', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36 OPR/45.0.2552.', '::1', '2017-06-01 06:47:00', '2017-06-01 13:47:00'),
(3, 1, 2017, 'March', 0, '726.06.001', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36 OPR/45.0.2552.', '::1', '2017-06-01 06:47:00', '2017-06-01 13:47:00'),
(4, 1, 2017, 'April', 0, '726.06.001', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36 OPR/45.0.2552.', '::1', '2017-06-01 06:47:00', '2017-06-01 13:47:00'),
(5, 1, 2017, 'May', 0, '726.06.001', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36 OPR/45.0.2552.', '::1', '2017-06-01 06:47:00', '2017-06-01 13:47:00'),
(6, 1, 2017, 'June', 0, '726.06.001', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36 OPR/45.0.2552.', '::1', '2017-06-01 06:47:00', '2017-06-01 13:47:00'),
(7, 1, 2017, 'July', 0, '726.06.001', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36 OPR/45.0.2552.', '::1', '2017-06-01 06:47:00', '2017-06-01 13:47:00'),
(8, 1, 2017, 'August', 0, '726.06.001', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36 OPR/45.0.2552.', '::1', '2017-06-01 06:47:00', '2017-06-01 13:47:00'),
(9, 1, 2017, 'September', 0, '726.06.001', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36 OPR/45.0.2552.', '::1', '2017-06-01 06:47:00', '2017-06-01 13:47:00'),
(10, 1, 2017, 'October', 0, '726.06.001', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36 OPR/45.0.2552.', '::1', '2017-06-01 06:47:00', '2017-06-01 13:47:00'),
(11, 1, 2017, 'November', 0, '726.06.001', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36 OPR/45.0.2552.', '::1', '2017-06-01 06:47:00', '2017-06-01 13:47:00'),
(12, 1, 2017, 'December', 0, '726.06.001', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36 OPR/45.0.2552.', '::1', '2017-06-01 06:47:00', '2017-06-01 13:47:00'),
(13, 1, 2017, 'January', 0, '724.04.001', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36 OPR/45.0.2552.', '::1', '2017-06-01 06:47:17', '2017-06-01 13:47:17'),
(14, 1, 2017, 'February', 2000000, '724.04.001', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36 OPR/45.0.2552.', '::1', '2017-06-01 06:47:17', '2017-06-01 13:47:17'),
(15, 1, 2017, 'March', 0, '724.04.001', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36 OPR/45.0.2552.', '::1', '2017-06-01 06:47:17', '2017-06-01 13:47:17'),
(16, 1, 2017, 'April', 0, '724.04.001', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36 OPR/45.0.2552.', '::1', '2017-06-01 06:47:17', '2017-06-01 13:47:17'),
(17, 1, 2017, 'May', 0, '724.04.001', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36 OPR/45.0.2552.', '::1', '2017-06-01 06:47:17', '2017-06-01 13:47:17'),
(18, 1, 2017, 'June', 0, '724.04.001', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36 OPR/45.0.2552.', '::1', '2017-06-01 06:47:17', '2017-06-01 13:47:17'),
(19, 1, 2017, 'July', 0, '724.04.001', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36 OPR/45.0.2552.', '::1', '2017-06-01 06:47:17', '2017-06-01 13:47:17'),
(20, 1, 2017, 'August', 0, '724.04.001', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36 OPR/45.0.2552.', '::1', '2017-06-01 06:47:17', '2017-06-01 13:47:17'),
(21, 1, 2017, 'September', 0, '724.04.001', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36 OPR/45.0.2552.', '::1', '2017-06-01 06:47:17', '2017-06-01 13:47:17'),
(22, 1, 2017, 'October', 0, '724.04.001', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36 OPR/45.0.2552.', '::1', '2017-06-01 06:47:17', '2017-06-01 13:47:17'),
(23, 1, 2017, 'November', 0, '724.04.001', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36 OPR/45.0.2552.', '::1', '2017-06-01 06:47:17', '2017-06-01 13:47:17'),
(24, 1, 2017, 'December', 0, '724.04.001', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36 OPR/45.0.2552.', '::1', '2017-06-01 06:47:17', '2017-06-01 13:47:17'),
(25, 2, 2017, 'January', 50000000, '726.03.001', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:53.0) Gecko/20100101 Firefox/53.0', '::1', '2017-06-03 06:39:20', '2017-06-03 13:39:19'),
(26, 2, 2017, 'February', 0, '726.03.001', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:53.0) Gecko/20100101 Firefox/53.0', '::1', '2017-06-03 06:39:19', '2017-06-03 13:39:19'),
(27, 2, 2017, 'March', 0, '726.03.001', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:53.0) Gecko/20100101 Firefox/53.0', '::1', '2017-06-03 06:39:19', '2017-06-03 13:39:19'),
(28, 2, 2017, 'April', 0, '726.03.001', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:53.0) Gecko/20100101 Firefox/53.0', '::1', '2017-06-03 06:39:19', '2017-06-03 13:39:19'),
(29, 2, 2017, 'May', 0, '726.03.001', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:53.0) Gecko/20100101 Firefox/53.0', '::1', '2017-06-03 06:39:20', '2017-06-03 13:39:20'),
(30, 2, 2017, 'June', 50000000, '726.03.001', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:53.0) Gecko/20100101 Firefox/53.0', '::1', '2017-06-04 06:23:22', '2017-06-03 13:39:20'),
(31, 2, 2017, 'July', 0, '726.03.001', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:53.0) Gecko/20100101 Firefox/53.0', '::1', '2017-06-03 06:39:20', '2017-06-03 13:39:20'),
(32, 2, 2017, 'August', 0, '726.03.001', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:53.0) Gecko/20100101 Firefox/53.0', '::1', '2017-06-03 06:39:20', '2017-06-03 13:39:20'),
(33, 2, 2017, 'September', 0, '726.03.001', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:53.0) Gecko/20100101 Firefox/53.0', '::1', '2017-06-03 06:39:20', '2017-06-03 13:39:20'),
(34, 2, 2017, 'October', 0, '726.03.001', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:53.0) Gecko/20100101 Firefox/53.0', '::1', '2017-06-03 06:39:20', '2017-06-03 13:39:20'),
(35, 2, 2017, 'November', 0, '726.03.001', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:53.0) Gecko/20100101 Firefox/53.0', '::1', '2017-06-03 06:39:20', '2017-06-03 13:39:20'),
(36, 2, 2017, 'December', 0, '726.03.001', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:53.0) Gecko/20100101 Firefox/53.0', '::1', '2017-06-03 06:39:20', '2017-06-03 13:39:20'),
(37, 2, 2017, 'January', 5900000, '706.00.001', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:53.0) Gecko/20100101 Firefox/53.0', '::1', '2017-06-03 08:29:45', '2017-06-03 15:29:44'),
(38, 2, 2017, 'February', 0, '706.00.001', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:53.0) Gecko/20100101 Firefox/53.0', '::1', '2017-06-03 08:29:44', '2017-06-03 15:29:44'),
(39, 2, 2017, 'March', 0, '706.00.001', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:53.0) Gecko/20100101 Firefox/53.0', '::1', '2017-06-03 08:29:44', '2017-06-03 15:29:44'),
(40, 2, 2017, 'April', 0, '706.00.001', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:53.0) Gecko/20100101 Firefox/53.0', '::1', '2017-06-03 08:29:44', '2017-06-03 15:29:44'),
(41, 2, 2017, 'May', 0, '706.00.001', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:53.0) Gecko/20100101 Firefox/53.0', '::1', '2017-06-03 08:29:44', '2017-06-03 15:29:44'),
(42, 2, 2017, 'June', 0, '706.00.001', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:53.0) Gecko/20100101 Firefox/53.0', '::1', '2017-06-03 08:29:44', '2017-06-03 15:29:44'),
(43, 2, 2017, 'July', 0, '706.00.001', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:53.0) Gecko/20100101 Firefox/53.0', '::1', '2017-06-03 08:29:44', '2017-06-03 15:29:44'),
(44, 2, 2017, 'August', 0, '706.00.001', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:53.0) Gecko/20100101 Firefox/53.0', '::1', '2017-06-03 08:29:44', '2017-06-03 15:29:44'),
(45, 2, 2017, 'September', 0, '706.00.001', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:53.0) Gecko/20100101 Firefox/53.0', '::1', '2017-06-03 08:29:44', '2017-06-03 15:29:44'),
(46, 2, 2017, 'October', 0, '706.00.001', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:53.0) Gecko/20100101 Firefox/53.0', '::1', '2017-06-03 08:29:44', '2017-06-03 15:29:44'),
(47, 2, 2017, 'November', 0, '706.00.001', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:53.0) Gecko/20100101 Firefox/53.0', '::1', '2017-06-03 08:29:44', '2017-06-03 15:29:44'),
(48, 2, 2017, 'December', 0, '706.00.001', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:53.0) Gecko/20100101 Firefox/53.0', '::1', '2017-06-03 08:29:44', '2017-06-03 15:29:44'),
(49, 2, 2017, 'January', 0, '704.00.001', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36', '::1', '2017-06-04 06:19:01', '2017-06-04 13:19:01'),
(50, 2, 2017, 'February', 0, '704.00.001', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36', '::1', '2017-06-04 06:19:01', '2017-06-04 13:19:01'),
(51, 2, 2017, 'March', 0, '704.00.001', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36', '::1', '2017-06-04 06:19:01', '2017-06-04 13:19:01'),
(52, 2, 2017, 'April', 0, '704.00.001', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36', '::1', '2017-06-04 06:19:01', '2017-06-04 13:19:01'),
(53, 2, 2017, 'May', 0, '704.00.001', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36', '::1', '2017-06-04 06:19:01', '2017-06-04 13:19:01'),
(54, 2, 2017, 'June', 35000000, '704.00.001', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36', '::1', '2017-06-04 06:19:01', '2017-06-04 13:19:01'),
(55, 2, 2017, 'July', 0, '704.00.001', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36', '::1', '2017-06-04 06:19:01', '2017-06-04 13:19:01'),
(56, 2, 2017, 'August', 0, '704.00.001', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36', '::1', '2017-06-04 06:19:01', '2017-06-04 13:19:01'),
(57, 2, 2017, 'September', 0, '704.00.001', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36', '::1', '2017-06-04 06:19:01', '2017-06-04 13:19:01'),
(58, 2, 2017, 'October', 0, '704.00.001', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36', '::1', '2017-06-04 06:19:01', '2017-06-04 13:19:01'),
(59, 2, 2017, 'November', 0, '704.00.001', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36', '::1', '2017-06-04 06:19:01', '2017-06-04 13:19:01'),
(60, 2, 2017, 'December', 0, '704.00.001', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36', '::1', '2017-06-04 06:19:01', '2017-06-04 13:19:01');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `realization_tr`
--

CREATE TABLE IF NOT EXISTS `realization_tr` (
  `id_realization` int(11) NOT NULL,
  `opex_trd_id` int(11) NOT NULL,
  `kode` varchar(10) NOT NULL,
  `username` varchar(60) NOT NULL,
  `submit` varchar(50) NOT NULL,
  `activity` text NOT NULL,
  `amount` int(10) NOT NULL,
  `year` int(5) NOT NULL,
  `ip_address` varchar(20) NOT NULL,
  `user_agent` varchar(50) NOT NULL,
  `create_date` datetime NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `realization_tr`
--

INSERT INTO `realization_tr` (`id_realization`, `opex_trd_id`, `kode`, `username`, `submit`, `activity`, `amount`, `year`, `ip_address`, `user_agent`, `create_date`, `last_update`) VALUES
(1, 54, 'HD', 'alhusna901@gmail.com', '', 'beli 1 paket keyboard dan mouse gaming 10 buah ', 10000000, 2017, '::1', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:53.0) Geck', '2017-06-04 13:23:36', '2017-06-04 07:05:25');

-- --------------------------------------------------------

--
-- Table structure for table `transfer_tr`
--

CREATE TABLE IF NOT EXISTS `transfer_tr` (
  `trf_tr_id` int(11) NOT NULL,
  `opex_trd_id` int(11) NOT NULL COMMENT 'no_account sumber transfer',
  `opex_trd_id_to` int(11) NOT NULL,
  `no_account_trfto` varchar(20) NOT NULL COMMENT 'no_account yang akan di transfer budget nya',
  `budget` int(15) NOT NULL,
  `submit` varchar(80) NOT NULL,
  `kode` varchar(10) NOT NULL,
  `username` varchar(50) NOT NULL,
  `create_date` datetime NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `user_agent` varchar(225) NOT NULL,
  `ip_address` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `role` enum('department','division','admin') COLLATE utf8_unicode_ci NOT NULL,
  `kode` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `photo` varchar(225) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `role`, `kode`, `photo`, `password`, `created_at`, `updated_at`) VALUES
(1, 'Aries Dimas Yushistira', 'alhusna901@gmail.com', 'admin', 'HD', 'alhusna901.jpg', '$2y$10$pgDLvU37nY0F7mKAv4120OnmCWXVKxSiD7HapVTO.Fbj2EnP277Tm', '2016-10-05 21:51:10', '2016-10-05 09:47:04'),
(5, 'siti syarah', 'syarahsiti@gmail.com', 'department', 'EB', '', '$2y$10$pgDLvU37nY0F7mKAv4120OnmCWXVKxSiD7HapVTO.Fbj2EnP277Tm', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 'Marina', 'marina@gmail.com', 'department', 'KE', 'marina.jpg', '$2y$10$tc5/ARY86aVTFLNyBjSJ0OK4E5Lh1wnIG9khUX481aGCVVpduTzge', '2017-01-06 19:37:44', '2017-01-06 12:37:44'),
(9, 'handoyo', 'handoyo_division@gmail.com', 'division', 'K', 'handoyo_division.PNG', '$2y$10$z5bP0AUDnu3HekFlyCR.jupMpsCmaWD3.X4lC0xQ8qfpEFEkpYlr6', '2017-01-15 08:53:19', NULL),
(10, 'Muhammad Fadil Hakim', 'fadil.hakim@gmail.com', 'department', 'HD', 'fadil.hakim.', '$2y$10$hONLAS16dXSho5yGFVur/eNUtf4KUaa7xKucbPIWdER.dzTaVKsCG', '2017-06-03 10:36:06', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `additional_tr`
--
ALTER TABLE `additional_tr`
  ADD PRIMARY KEY (`add_tr_id`);

--
-- Indexes for table `department_ms`
--
ALTER TABLE `department_ms`
  ADD PRIMARY KEY (`kode_department`), ADD UNIQUE KEY `kode_department` (`kode_department`);

--
-- Indexes for table `detail_department_opex_acc`
--
ALTER TABLE `detail_department_opex_acc`
  ADD PRIMARY KEY (`id_ddoa`);

--
-- Indexes for table `division_ms`
--
ALTER TABLE `division_ms`
  ADD PRIMARY KEY (`kode_div`), ADD UNIQUE KEY `kode_div` (`kode_div`);

--
-- Indexes for table `opex_ms`
--
ALTER TABLE `opex_ms`
  ADD PRIMARY KEY (`no_acc_opex`);

--
-- Indexes for table `opex_tr`
--
ALTER TABLE `opex_tr`
  ADD PRIMARY KEY (`opex_trid`);

--
-- Indexes for table `opex_tr_detail`
--
ALTER TABLE `opex_tr_detail`
  ADD PRIMARY KEY (`opex_trd_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`), ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `realization_tr`
--
ALTER TABLE `realization_tr`
  ADD PRIMARY KEY (`id_realization`);

--
-- Indexes for table `transfer_tr`
--
ALTER TABLE `transfer_tr`
  ADD PRIMARY KEY (`trf_tr_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `additional_tr`
--
ALTER TABLE `additional_tr`
  MODIFY `add_tr_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `detail_department_opex_acc`
--
ALTER TABLE `detail_department_opex_acc`
  MODIFY `id_ddoa` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=58;
--
-- AUTO_INCREMENT for table `opex_tr`
--
ALTER TABLE `opex_tr`
  MODIFY `opex_trid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `opex_tr_detail`
--
ALTER TABLE `opex_tr_detail`
  MODIFY `opex_trd_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=61;
--
-- AUTO_INCREMENT for table `realization_tr`
--
ALTER TABLE `realization_tr`
  MODIFY `id_realization` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `transfer_tr`
--
ALTER TABLE `transfer_tr`
  MODIFY `trf_tr_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
