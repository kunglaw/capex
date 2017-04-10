-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 15, 2017 at 05:37 AM
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
  `submit` varchar(80) NOT NULL,
  `kode` varchar(10) NOT NULL,
  `username` varchar(50) NOT NULL,
  `create_date` datetime NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `user_agent` varchar(225) NOT NULL,
  `ip_address` varchar(16) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `additional_tr`
--

INSERT INTO `additional_tr` (`add_tr_id`, `opex_trd_id`, `budget`, `submit`, `kode`, `username`, `create_date`, `last_update`, `user_agent`, `ip_address`) VALUES
(1, 37, 5000000, 'handoyo_division@gmail.com', 'KC', 'alhusna901@gmail.com', '2016-12-31 00:09:50', '2017-01-18 16:30:41', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:50.0) Gecko/20100101 Firefox/50.0', '::1'),
(3, 49, 8000000, 'handoyo_division@gmail.com', 'KC', 'alhusna901@gmail.com', '2016-12-31 11:55:16', '2017-01-18 16:37:28', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:50.0) Gecko/20100101 Firefox/50.0', '::1'),
(4, 40, 200000, '', 'KE', 'marina@gmail.com', '2016-12-31 14:21:01', '2016-12-31 07:21:01', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:50.0) Gecko/20100101 Firefox/50.0', '192.168.1.101'),
(5, 205, 640000, '', 'KC', 'alhusna901@gmail.com', '2017-01-13 22:54:32', '2017-01-13 16:08:26', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:50.0) Gecko/20100101 Firefox/50.0', '::1'),
(6, 350, 4600056, '', 'KE', 'marina@gmail.com', '2017-02-02 23:51:18', '2017-02-02 16:51:18', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36', '::1');

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
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `opex_tr`
--

INSERT INTO `opex_tr` (`opex_trid`, `year`, `kode_department`, `submit`, `total`, `create_date`, `last_update`, `ip_address`, `user_agent`, `username`) VALUES
(20, 2015, 'KC', '', 0, '2016-12-26 05:14:34', '2016-12-26 12:14:34', '::1', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:50.0) Gecko/20100101 Firefox/50.0', 'alhusna901@gmail.com'),
(21, 2016, 'KC', '', 0, '2016-12-26 05:15:34', '2016-12-26 12:15:34', '::1', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:50.0) Gecko/20100101 Firefox/50.0', 'alhusna901@gmail.com'),
(22, 2017, 'KC', '', 0, '2017-01-03 16:18:22', '2017-01-03 23:18:22', '192.168.1.101', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:50.0) Gecko/20100101 Firefox/50.0', 'alhusna901@gmail.com'),
(23, 2018, 'KC', '', 0, '2017-01-18 17:03:54', '2017-01-19 00:03:54', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36', 'alhusna901@gmail.com'),
(27, 2017, 'KE', '', 0, '2017-01-29 11:22:54', '2017-01-29 18:22:54', '::1', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:50.0) Gecko/20100101 Firefox/50.0', 'marina@gmail.com');

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
) ENGINE=InnoDB AUTO_INCREMENT=373 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `opex_tr_detail`
--

INSERT INTO `opex_tr_detail` (`opex_trd_id`, `opex_trid`, `year`, `month`, `budget`, `no_acc_opex`, `user_agent`, `ip_address`, `create_date`, `last_update`) VALUES
(25, 20, 2015, 'January', 10000000, '704.00.001', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:50.0) Gecko/20100101 Firefox/50.0', '::1', '2016-12-26 05:14:34', '2016-12-26 12:14:34'),
(26, 20, 2015, 'February', 8000000, '704.00.001', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:50.0) Gecko/20100101 Firefox/50.0', '::1', '2016-12-28 16:39:37', '2016-12-26 12:14:34'),
(27, 20, 2015, 'March', 0, '704.00.001', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:50.0) Gecko/20100101 Firefox/50.0', '::1', '2016-12-26 05:14:34', '2016-12-26 12:14:34'),
(28, 20, 2015, 'April', 0, '704.00.001', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:50.0) Gecko/20100101 Firefox/50.0', '::1', '2016-12-26 05:14:34', '2016-12-26 12:14:34'),
(29, 20, 2015, 'May', 0, '704.00.001', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:50.0) Gecko/20100101 Firefox/50.0', '::1', '2016-12-26 05:14:34', '2016-12-26 12:14:34'),
(30, 20, 2015, 'June', 0, '704.00.001', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:50.0) Gecko/20100101 Firefox/50.0', '::1', '2016-12-26 05:14:34', '2016-12-26 12:14:34'),
(31, 20, 2015, 'July', 0, '704.00.001', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:50.0) Gecko/20100101 Firefox/50.0', '::1', '2016-12-26 05:14:34', '2016-12-26 12:14:34'),
(32, 20, 2015, 'August', 0, '704.00.001', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:50.0) Gecko/20100101 Firefox/50.0', '::1', '2016-12-26 05:14:34', '2016-12-26 12:14:34'),
(33, 20, 2015, 'September', 0, '704.00.001', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:50.0) Gecko/20100101 Firefox/50.0', '::1', '2016-12-26 05:14:34', '2016-12-26 12:14:34'),
(34, 20, 2015, 'October', 0, '704.00.001', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:50.0) Gecko/20100101 Firefox/50.0', '::1', '2016-12-26 05:14:34', '2016-12-26 12:14:34'),
(35, 20, 2015, 'November', 0, '704.00.001', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:50.0) Gecko/20100101 Firefox/50.0', '::1', '2016-12-26 05:14:34', '2016-12-26 12:14:34'),
(36, 20, 2015, 'December', 0, '704.00.001', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:50.0) Gecko/20100101 Firefox/50.0', '::1', '2016-12-26 05:14:34', '2016-12-26 12:14:34'),
(37, 21, 2016, 'January', 22000000, '704.00.001', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:50.0) Gecko/20100101 Firefox/50.0', '::1', '2017-01-18 16:30:41', '2016-12-26 12:15:34'),
(38, 21, 2016, 'February', 60000000, '704.00.001', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:50.0) Gecko/20100101 Firefox/50.0', '::1', '2016-12-31 04:51:01', '2016-12-26 12:15:34'),
(39, 21, 2016, 'March', 8005000, '704.00.001', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:50.0) Gecko/20100101 Firefox/50.0', '::1', '2016-12-31 05:07:03', '2016-12-26 12:15:34'),
(40, 21, 2016, 'April', 6800000, '704.00.001', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:50.0) Gecko/20100101 Firefox/50.0', '::1', '2016-12-31 05:07:29', '2016-12-26 12:15:34'),
(41, 21, 2016, 'May', 0, '704.00.001', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:50.0) Gecko/20100101 Firefox/50.0', '::1', '2016-12-26 05:15:34', '2016-12-26 12:15:34'),
(42, 21, 2016, 'June', 0, '704.00.001', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:50.0) Gecko/20100101 Firefox/50.0', '::1', '2016-12-26 05:15:34', '2016-12-26 12:15:34'),
(43, 21, 2016, 'July', 0, '704.00.001', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:50.0) Gecko/20100101 Firefox/50.0', '::1', '2016-12-26 05:15:34', '2016-12-26 12:15:34'),
(44, 21, 2016, 'August', 0, '704.00.001', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:50.0) Gecko/20100101 Firefox/50.0', '::1', '2016-12-26 05:15:34', '2016-12-26 12:15:34'),
(45, 21, 2016, 'September', 0, '704.00.001', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:50.0) Gecko/20100101 Firefox/50.0', '::1', '2016-12-26 05:15:34', '2016-12-26 12:15:34'),
(46, 21, 2016, 'October', 0, '704.00.001', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:50.0) Gecko/20100101 Firefox/50.0', '::1', '2016-12-26 05:15:35', '2016-12-26 12:15:35'),
(47, 21, 2016, 'November', 0, '704.00.001', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:50.0) Gecko/20100101 Firefox/50.0', '::1', '2016-12-26 05:15:35', '2016-12-26 12:15:35'),
(48, 21, 2016, 'December', 0, '704.00.001', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:50.0) Gecko/20100101 Firefox/50.0', '::1', '2016-12-26 05:15:35', '2016-12-26 12:15:35'),
(49, 21, 2016, 'January', 8000000, '706.00.001', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:50.0) Gecko/20100101 Firefox/50.0', '::1', '2017-01-18 16:37:28', '2016-12-31 11:43:39'),
(50, 21, 2016, 'February', 8500000, '706.00.001', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:50.0) Gecko/20100101 Firefox/50.0', '::1', '2016-12-31 04:43:40', '2016-12-31 11:43:39'),
(51, 21, 2016, 'March', 0, '706.00.001', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:50.0) Gecko/20100101 Firefox/50.0', '::1', '2016-12-31 04:43:39', '2016-12-31 11:43:39'),
(52, 21, 2016, 'April', 0, '706.00.001', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:50.0) Gecko/20100101 Firefox/50.0', '::1', '2016-12-31 04:43:39', '2016-12-31 11:43:39'),
(53, 21, 2016, 'May', 0, '706.00.001', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:50.0) Gecko/20100101 Firefox/50.0', '::1', '2016-12-31 04:43:39', '2016-12-31 11:43:39'),
(54, 21, 2016, 'June', 0, '706.00.001', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:50.0) Gecko/20100101 Firefox/50.0', '::1', '2016-12-31 04:43:39', '2016-12-31 11:43:39'),
(55, 21, 2016, 'July', 0, '706.00.001', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:50.0) Gecko/20100101 Firefox/50.0', '::1', '2016-12-31 04:43:39', '2016-12-31 11:43:39'),
(56, 21, 2016, 'August', 0, '706.00.001', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:50.0) Gecko/20100101 Firefox/50.0', '::1', '2016-12-31 04:43:40', '2016-12-31 11:43:40'),
(57, 21, 2016, 'September', 0, '706.00.001', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:50.0) Gecko/20100101 Firefox/50.0', '::1', '2016-12-31 04:43:40', '2016-12-31 11:43:40'),
(58, 21, 2016, 'October', 0, '706.00.001', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:50.0) Gecko/20100101 Firefox/50.0', '::1', '2016-12-31 04:43:40', '2016-12-31 11:43:40'),
(59, 21, 2016, 'November', 0, '706.00.001', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:50.0) Gecko/20100101 Firefox/50.0', '::1', '2016-12-31 04:43:40', '2016-12-31 11:43:40'),
(60, 21, 2016, 'December', 0, '706.00.001', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:50.0) Gecko/20100101 Firefox/50.0', '::1', '2016-12-31 04:43:40', '2016-12-31 11:43:40'),
(205, 22, 2017, 'January', 6900000, '706.00.001', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:50.0) Gecko/20100101 Firefox/50.0', '::1', '2017-02-02 16:22:58', '2017-01-13 21:22:48'),
(206, 22, 2017, 'February', 0, '706.00.001', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:50.0) Gecko/20100101 Firefox/50.0', '::1', '2017-02-01 16:27:08', '2017-01-13 21:22:48'),
(207, 22, 2017, 'March', 0, '706.00.001', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:50.0) Gecko/20100101 Firefox/50.0', '::1', '2017-01-13 14:22:48', '2017-01-13 21:22:48'),
(208, 22, 2017, 'April', 0, '706.00.001', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:50.0) Gecko/20100101 Firefox/50.0', '::1', '2017-01-13 14:22:48', '2017-01-13 21:22:48'),
(209, 22, 2017, 'May', 0, '706.00.001', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:50.0) Gecko/20100101 Firefox/50.0', '::1', '2017-01-13 14:22:48', '2017-01-13 21:22:48'),
(210, 22, 2017, 'June', 0, '706.00.001', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:50.0) Gecko/20100101 Firefox/50.0', '::1', '2017-01-13 14:22:48', '2017-01-13 21:22:48'),
(211, 22, 2017, 'July', 0, '706.00.001', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:50.0) Gecko/20100101 Firefox/50.0', '::1', '2017-01-13 14:22:48', '2017-01-13 21:22:48'),
(212, 22, 2017, 'August', 0, '706.00.001', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:50.0) Gecko/20100101 Firefox/50.0', '::1', '2017-01-13 14:22:48', '2017-01-13 21:22:48'),
(213, 22, 2017, 'September', 0, '706.00.001', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:50.0) Gecko/20100101 Firefox/50.0', '::1', '2017-01-13 14:22:49', '2017-01-13 21:22:49'),
(214, 22, 2017, 'October', 0, '706.00.001', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:50.0) Gecko/20100101 Firefox/50.0', '::1', '2017-01-13 14:22:49', '2017-01-13 21:22:49'),
(215, 22, 2017, 'November', 0, '706.00.001', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:50.0) Gecko/20100101 Firefox/50.0', '::1', '2017-01-13 14:22:49', '2017-01-13 21:22:49'),
(216, 22, 2017, 'December', 0, '706.00.001', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:50.0) Gecko/20100101 Firefox/50.0', '::1', '2017-01-13 14:22:49', '2017-01-13 21:22:49'),
(217, 22, 2017, 'January', 43320000, '707.01.001', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:50.0) Gecko/20100101 Firefox/50.0', '::1', '2017-01-18 17:49:24', '2017-01-13 21:23:01'),
(218, 22, 2017, 'February', 5040000, '707.01.001', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:50.0) Gecko/20100101 Firefox/50.0', '::1', '2017-01-13 14:23:13', '2017-01-13 21:23:01'),
(219, 22, 2017, 'March', 0, '707.01.001', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:50.0) Gecko/20100101 Firefox/50.0', '::1', '2017-01-13 14:23:01', '2017-01-13 21:23:01'),
(220, 22, 2017, 'April', 0, '707.01.001', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:50.0) Gecko/20100101 Firefox/50.0', '::1', '2017-01-13 14:23:01', '2017-01-13 21:23:01'),
(221, 22, 2017, 'May', 0, '707.01.001', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:50.0) Gecko/20100101 Firefox/50.0', '::1', '2017-01-13 14:23:01', '2017-01-13 21:23:01'),
(222, 22, 2017, 'June', 0, '707.01.001', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:50.0) Gecko/20100101 Firefox/50.0', '::1', '2017-01-13 14:23:01', '2017-01-13 21:23:01'),
(223, 22, 2017, 'July', 0, '707.01.001', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:50.0) Gecko/20100101 Firefox/50.0', '::1', '2017-01-13 14:23:01', '2017-01-13 21:23:01'),
(224, 22, 2017, 'August', 0, '707.01.001', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:50.0) Gecko/20100101 Firefox/50.0', '::1', '2017-01-13 14:23:01', '2017-01-13 21:23:01'),
(225, 22, 2017, 'September', 0, '707.01.001', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:50.0) Gecko/20100101 Firefox/50.0', '::1', '2017-01-13 14:23:01', '2017-01-13 21:23:01'),
(226, 22, 2017, 'October', 0, '707.01.001', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:50.0) Gecko/20100101 Firefox/50.0', '::1', '2017-01-13 14:23:01', '2017-01-13 21:23:01'),
(227, 22, 2017, 'November', 0, '707.01.001', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:50.0) Gecko/20100101 Firefox/50.0', '::1', '2017-01-13 14:23:01', '2017-01-13 21:23:01'),
(228, 22, 2017, 'December', 0, '707.01.001', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:50.0) Gecko/20100101 Firefox/50.0', '::1', '2017-01-13 14:23:01', '2017-01-13 21:23:01'),
(301, 23, 2018, 'January', 70000000, '704.00.001', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36', '::1', '2017-01-18 17:03:55', '2017-01-19 00:03:54'),
(302, 23, 2018, 'February', 0, '704.00.001', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36', '::1', '2017-01-18 17:03:54', '2017-01-19 00:03:54'),
(303, 23, 2018, 'March', 0, '704.00.001', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36', '::1', '2017-01-18 17:03:55', '2017-01-19 00:03:55'),
(304, 23, 2018, 'April', 0, '704.00.001', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36', '::1', '2017-01-18 17:03:55', '2017-01-19 00:03:55'),
(305, 23, 2018, 'May', 0, '704.00.001', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36', '::1', '2017-01-18 17:03:55', '2017-01-19 00:03:55'),
(306, 23, 2018, 'June', 0, '704.00.001', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36', '::1', '2017-01-18 17:03:55', '2017-01-19 00:03:55'),
(307, 23, 2018, 'July', 0, '704.00.001', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36', '::1', '2017-01-18 17:03:55', '2017-01-19 00:03:55'),
(308, 23, 2018, 'August', 0, '704.00.001', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36', '::1', '2017-01-18 17:03:55', '2017-01-19 00:03:55'),
(309, 23, 2018, 'September', 0, '704.00.001', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36', '::1', '2017-01-18 17:03:55', '2017-01-19 00:03:55'),
(310, 23, 2018, 'October', 0, '704.00.001', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36', '::1', '2017-01-18 17:03:55', '2017-01-19 00:03:55'),
(311, 23, 2018, 'November', 0, '704.00.001', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36', '::1', '2017-01-18 17:03:55', '2017-01-19 00:03:55'),
(312, 23, 2018, 'December', 0, '704.00.001', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36', '::1', '2017-01-18 17:03:55', '2017-01-19 00:03:55'),
(349, 27, 2017, 'January', 6900000, '704.00.001', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:50.0) Gecko/20100101 Firefox/50.0', '::1', '2017-01-29 11:22:54', '2017-01-29 18:22:54'),
(350, 27, 2017, 'February', 3400650, '704.00.001', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:50.0) Gecko/20100101 Firefox/50.0', '::1', '2017-02-02 16:41:00', '2017-01-29 18:22:54'),
(351, 27, 2017, 'March', 0, '704.00.001', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:50.0) Gecko/20100101 Firefox/50.0', '::1', '2017-01-29 11:22:54', '2017-01-29 18:22:54'),
(352, 27, 2017, 'April', 0, '704.00.001', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:50.0) Gecko/20100101 Firefox/50.0', '::1', '2017-01-29 11:22:54', '2017-01-29 18:22:54'),
(353, 27, 2017, 'May', 0, '704.00.001', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:50.0) Gecko/20100101 Firefox/50.0', '::1', '2017-01-29 11:22:54', '2017-01-29 18:22:54'),
(354, 27, 2017, 'June', 0, '704.00.001', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:50.0) Gecko/20100101 Firefox/50.0', '::1', '2017-01-29 11:22:54', '2017-01-29 18:22:54'),
(355, 27, 2017, 'July', 0, '704.00.001', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:50.0) Gecko/20100101 Firefox/50.0', '::1', '2017-01-29 11:22:54', '2017-01-29 18:22:54'),
(356, 27, 2017, 'August', 0, '704.00.001', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:50.0) Gecko/20100101 Firefox/50.0', '::1', '2017-01-29 11:22:54', '2017-01-29 18:22:54'),
(357, 27, 2017, 'September', 0, '704.00.001', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:50.0) Gecko/20100101 Firefox/50.0', '::1', '2017-01-29 11:22:54', '2017-01-29 18:22:54'),
(358, 27, 2017, 'October', 0, '704.00.001', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:50.0) Gecko/20100101 Firefox/50.0', '::1', '2017-01-29 11:22:54', '2017-01-29 18:22:54'),
(359, 27, 2017, 'November', 0, '704.00.001', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:50.0) Gecko/20100101 Firefox/50.0', '::1', '2017-01-29 11:22:54', '2017-01-29 18:22:54'),
(360, 27, 2017, 'December', 0, '704.00.001', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:50.0) Gecko/20100101 Firefox/50.0', '::1', '2017-01-29 11:22:54', '2017-01-29 18:22:54'),
(361, 27, 2017, 'January', 6900000, '706.00.001', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36', '::1', '2017-02-02 16:22:58', '2017-02-02 23:22:57'),
(362, 27, 2017, 'February', 0, '706.00.001', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36', '::1', '2017-02-02 16:22:57', '2017-02-02 23:22:57'),
(363, 27, 2017, 'March', 0, '706.00.001', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36', '::1', '2017-02-02 16:22:58', '2017-02-02 23:22:58'),
(364, 27, 2017, 'April', 0, '706.00.001', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36', '::1', '2017-02-02 16:22:58', '2017-02-02 23:22:58'),
(365, 27, 2017, 'May', 0, '706.00.001', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36', '::1', '2017-02-02 16:22:58', '2017-02-02 23:22:58'),
(366, 27, 2017, 'June', 0, '706.00.001', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36', '::1', '2017-02-02 16:22:58', '2017-02-02 23:22:58'),
(367, 27, 2017, 'July', 0, '706.00.001', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36', '::1', '2017-02-02 16:22:58', '2017-02-02 23:22:58'),
(368, 27, 2017, 'August', 0, '706.00.001', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36', '::1', '2017-02-02 16:22:58', '2017-02-02 23:22:58'),
(369, 27, 2017, 'September', 0, '706.00.001', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36', '::1', '2017-02-02 16:22:58', '2017-02-02 23:22:58'),
(370, 27, 2017, 'October', 0, '706.00.001', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36', '::1', '2017-02-02 16:22:58', '2017-02-02 23:22:58'),
(371, 27, 2017, 'November', 0, '706.00.001', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36', '::1', '2017-02-02 16:22:58', '2017-02-02 23:22:58'),
(372, 27, 2017, 'December', 0, '706.00.001', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36', '::1', '2017-02-02 16:22:58', '2017-02-02 23:22:58');

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
  `ip_address` varchar(20) NOT NULL,
  `user_agent` varchar(50) NOT NULL,
  `create_date` datetime NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `realization_tr`
--

INSERT INTO `realization_tr` (`id_realization`, `opex_trd_id`, `kode`, `username`, `submit`, `activity`, `amount`, `ip_address`, `user_agent`, `create_date`, `last_update`) VALUES
(1, 205, 'KC', 'alhusna901@gmail.com', 'handoyo_division@gmail.com', 'jalan jalan ke monas se kantor', 590000, '::1', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:50.0) Geck', '2017-01-15 08:36:59', '2017-01-18 18:11:20');

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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transfer_tr`
--

INSERT INTO `transfer_tr` (`trf_tr_id`, `opex_trd_id`, `opex_trd_id_to`, `no_account_trfto`, `budget`, `submit`, `kode`, `username`, `create_date`, `last_update`, `user_agent`, `ip_address`) VALUES
(7, 217, 205, '', 5000000, '', 'KC', 'alhusna901@gmail.com', '2017-02-15 11:20:39', '2017-02-15 04:20:39', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:51.0) Gecko/20100101 Firefox/51.0', '::1');

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
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `role`, `kode`, `photo`, `password`, `created_at`, `updated_at`) VALUES
(1, 'Aries Dimas Yushistira', 'alhusna901@gmail.com', 'admin', 'KC', 'alhusna901.jpg', '$2y$10$pgDLvU37nY0F7mKAv4120OnmCWXVKxSiD7HapVTO.Fbj2EnP277Tm', '2016-10-05 21:51:10', '2016-10-05 09:47:04'),
(5, 'siti syarah', 'syarahsiti@gmail.com', 'department', 'KE', '', '$2y$10$k/tuO/aGq2UJyeT/XG5EqucNhRwLe48MBPPz4xz7dptsNgteAfgUi', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 'Marina', 'marina@gmail.com', 'department', 'KE', 'marina.jpg', '$2y$10$tc5/ARY86aVTFLNyBjSJ0OK4E5Lh1wnIG9khUX481aGCVVpduTzge', '2017-01-06 19:37:44', '2017-01-06 12:37:44'),
(9, 'handoyo', 'handoyo_division@gmail.com', 'division', 'K', 'handoyo_division.PNG', '$2y$10$z5bP0AUDnu3HekFlyCR.jupMpsCmaWD3.X4lC0xQ8qfpEFEkpYlr6', '2017-01-15 08:53:19', NULL);

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
  MODIFY `add_tr_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `opex_tr`
--
ALTER TABLE `opex_tr`
  MODIFY `opex_trid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `opex_tr_detail`
--
ALTER TABLE `opex_tr_detail`
  MODIFY `opex_trd_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=373;
--
-- AUTO_INCREMENT for table `realization_tr`
--
ALTER TABLE `realization_tr`
  MODIFY `id_realization` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `transfer_tr`
--
ALTER TABLE `transfer_tr`
  MODIFY `trf_tr_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
