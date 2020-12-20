-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 19, 2020 at 04:36 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.3.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rekamedis`
--

-- --------------------------------------------------------

--
-- Table structure for table `budget_klinik`
--

CREATE TABLE `budget_klinik` (
  `budget_id` int(11) NOT NULL,
  `jumlah_budget` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `budget_klinik`
--

INSERT INTO `budget_klinik` (`budget_id`, `jumlah_budget`) VALUES
(1, 995000);

-- --------------------------------------------------------

--
-- Table structure for table `dokter`
--

CREATE TABLE `dokter` (
  `dokter_id` int(11) NOT NULL,
  `nama_dokter` varchar(25) NOT NULL,
  `jenis_kelamin` varchar(20) NOT NULL,
  `spesialis` varchar(25) NOT NULL,
  `fee_dokter` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dokter`
--

INSERT INTO `dokter` (`dokter_id`, `nama_dokter`, `jenis_kelamin`, `spesialis`, `fee_dokter`) VALUES
(2, 'Dr Nadia', 'Perempuan', 'Umum', 25000),
(3, 'Dr Henry', 'Laki-laki', 'Umum', 25000);

-- --------------------------------------------------------

--
-- Table structure for table `obat`
--

CREATE TABLE `obat` (
  `obat_id` int(11) NOT NULL,
  `nama_obat` varchar(25) NOT NULL,
  `stok` int(11) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `obat`
--

INSERT INTO `obat` (`obat_id`, `nama_obat`, `stok`, `harga`) VALUES
(1, 'Paracetamol', 68, 4000),
(10, 'Stmuas Tatin Kolestrol', 88, 8000),
(11, 'Selium Kolestrol 1', 16, 10000),
(12, 'Teosal', 29, 4000),
(13, 'Telracychine 500 mg', 24, 15000),
(14, 'Voltadex Nyeri', 30, 8000),
(15, 'Acetilsistein', 35, 14000),
(16, 'Antangin', 85, 6000);

-- --------------------------------------------------------

--
-- Table structure for table `pasien`
--

CREATE TABLE `pasien` (
  `pasien_kd` varchar(25) NOT NULL,
  `nama_pasien` varchar(30) NOT NULL,
  `jenis_kelamin` varchar(20) NOT NULL,
  `usia` int(11) NOT NULL,
  `tempat_lahir` varchar(20) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `pekerjaan` varchar(25) NOT NULL,
  `no_hp` varchar(27) NOT NULL,
  `alamat` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pasien`
--

INSERT INTO `pasien` (`pasien_kd`, `nama_pasien`, `jenis_kelamin`, `usia`, `tempat_lahir`, `tgl_lahir`, `pekerjaan`, `no_hp`, `alamat`) VALUES
('PSN-200409-004', 'Keongmas', 'Laki-laki', 19, 'Bekasi', '1996-06-08', 'Karyawan Swasta', '09219381923812', '<p>Cikarang</p>\r\n\r\n<p> </p>\r\n\r\n<p> </p>'),
('PSN-200414-005', 'Gesang', 'Laki-laki', 19, 'Kebumen', '2001-12-09', 'Pelajar', '089128398213', '<p>Cibarusah</p>'),
('PSN-200414-006', 'Mega Sanyang', 'Perempuan', 21, 'Bogor', '1998-07-10', 'Mahasiswa', '08912738123', '<p><strong>Jonggol</strong></p>'),
('PSN-200428-007', 'Kristin', 'Perempuan', 21, 'Kebumen', '1999-05-12', 'Mahasiswa', '089219832813', '<p>Mega Regency</p>'),
('PSN-200428-008', 'Refinias', 'Perempuan', 21, 'Bekasi', '1998-01-22', 'Mahasiswa', '08912839821', '<p>Sukatani</p>');

-- --------------------------------------------------------

--
-- Table structure for table `poli`
--

CREATE TABLE `poli` (
  `poli_id` int(11) NOT NULL,
  `nama_poli` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `poli`
--

INSERT INTO `poli` (`poli_id`, `nama_poli`) VALUES
(1, 'Poli Umum'),
(2, 'Poli Gigi'),
(3, 'UGD'),
(4, 'Fisioterapi'),
(6, 'Spesialis Paru'),
(7, 'Asuransi'),
(8, 'Laboratorium');

-- --------------------------------------------------------

--
-- Table structure for table `rawat_inap`
--

CREATE TABLE `rawat_inap` (
  `id_ranap` int(11) NOT NULL,
  `no_rm` varchar(25) NOT NULL,
  `pasien_kd` varchar(25) NOT NULL,
  `dokter_id` int(11) NOT NULL,
  `status_pasien` varchar(25) NOT NULL,
  `no_kamar` varchar(25) NOT NULL,
  `tanggal_inap` date NOT NULL,
  `diagnosa` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rawat_inap`
--

INSERT INTO `rawat_inap` (`id_ranap`, `no_rm`, `pasien_kd`, `dokter_id`, `status_pasien`, `no_kamar`, `tanggal_inap`, `diagnosa`) VALUES
(1, 'RKM-200504-0004', 'PSN-200428-007', 3, 'Selesai Bayar', 'Anggrek NO 13 Ruangan 203', '2020-05-10', '<p>Kram Perut, Mual, Pusing, P'),
(2, 'RKM-200514-0001', 'PSN-200409-004', 3, 'Selesai Bayar', 'Anggrek NO 13 Ruangan 201', '2020-05-14', '<p>Demam tinggi, demam berdara'),
(3, 'RKM-200516-0001', 'PSN-200428-008', 2, 'Selesai Bayar', 'Anggrek NO 13 Ruangan 203', '2020-05-16', '<p>Pusing, kram perut, demam</'),
(4, 'RKM-200516-0001', 'PSN-200428-007', 2, 'Dirawat', 'Anggrek NO 13 Ruangan 202', '2020-05-16', '<p>Diare, Asam Lambung</p>\r\n'),
(5, 'RKM-200516-0002', 'PSN-200409-004', 2, 'Selesai Bayar', 'Anggrek NO 13 Ruangan 205', '2020-05-16', '<p>Pusing</p>\r\n\r\n<p> </p>\r\n'),
(6, 'RKM-200517-0002', 'PSN-200428-008', 3, 'Selesai Bayar', 'Anggrek NO 13 Ruangan 206', '2020-05-17', '<p>Demam tinggi, lemes, tipes<'),
(7, 'RKM-200518-0001', 'PSN-200428-007', 2, 'Selesai Bayar', 'Anggrek NO 13 Ruangan 202', '2020-05-18', '<p>Demam Berdarah</p>\r\n'),
(8, 'RKM-200518-0001', 'PSN-200428-007', 2, 'Dirawat', 'Anggrek NO 13 Ruangan 206', '2020-05-18', '<p>Tipes</p>\r\n\r\n<p> </p>\r\n'),
(9, 'RKM-200518-0003', 'PSN-200428-008', 2, 'Selesai Bayar', 'Anggrek NO 13 Ruangan 207', '2020-05-18', '<p>Demam Berdarah, Tipes</p>\r\n');

--
-- Triggers `rawat_inap`
--
DELIMITER $$
CREATE TRIGGER `rjn` AFTER DELETE ON `rawat_inap` FOR EACH ROW update rekamedis set rekamedis.no_rm = rekamedis.no_rm + old.no_rm where rekamedis.no_rm = old.no_rm
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `rekamedis`
--

CREATE TABLE `rekamedis` (
  `no_rm` varchar(25) NOT NULL,
  `pasien_kd` varchar(25) NOT NULL,
  `nama_pasien` varchar(25) NOT NULL,
  `dokter_id` int(11) NOT NULL,
  `tensi_darah` int(11) NOT NULL,
  `diagnosa` text NOT NULL,
  `nomor_kartu` varchar(50) DEFAULT NULL,
  `status` varchar(25) DEFAULT NULL,
  `poli_id` int(11) NOT NULL,
  `tgl_periksa` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rekamedis`
--

INSERT INTO `rekamedis` (`no_rm`, `pasien_kd`, `nama_pasien`, `dokter_id`, `tensi_darah`, `diagnosa`, `nomor_kartu`, `status`, `poli_id`, `tgl_periksa`) VALUES
('RKM-200504-0001', 'PSN-200414-006', 'Mega Sanyang', 3, 234, '<p>Pusing, Kram perut, Demam tinggi, Mual.</p>\r\n', NULL, 'Selesai Bayar', 1, '2020-05-04'),
('RKM-200504-0002', 'PSN-200409-004', 'Keongmas', 3, 236, '<p>Gangguan pencernaaan, Tensi Dararh Rendah</p>\r\n', NULL, 'Selesai Bayar', 1, '2020-05-04'),
('RKM-200504-0003', 'PSN-200414-005', 'Gesang', 2, 236, '<p>Pusing, Demam Tinggi, Batuk, Pilek</p>\r\n', NULL, 'Selesai Bayar', 1, '2020-05-04'),
('RKM-200510-0001', 'PSN-200428-008', 'Refinias', 3, 432, '<p>Batuk, pilek, demam, asam lambung</p>\r\n', NULL, 'Selesai Bayar', 1, '2020-05-10'),
('RKM-200513-0001', 'PSN-200414-006', 'Mega Sanyang', 2, 251, '<p>Pusing 7 keliling</p>\r\n', NULL, 'Selesai Bayar', 1, '2020-05-13'),
('RKM-200516-0001', 'PSN-200414-005', 'Gesang', 2, 123, '<p>Diare</p>\r\n', NULL, 'Selesai Bayar', 1, '2020-05-16'),
('RKM-200516-0002', 'PSN-200414-005', 'Gesang', 3, 432, '<p>Demam</p>\r\n\r\n<p> </p>\r\n', NULL, 'Selesai Bayar', 1, '2020-05-16'),
('RKM-200517-0001', 'PSN-200414-006', 'Mega Sanyang', 2, 213, '<p>Asam Lambung</p>\r\n', NULL, 'Selesai Bayar', 1, '2020-05-17'),
('RKM-200518-0001', 'PSN-200409-004', 'Keongmas', 2, 236, '<p>Nyeri perut, asam lambung, magh</p>\r\n\r\n<p> </p>\r\n', NULL, 'Selesai Bayar', 1, '2020-05-18'),
('RKM-200518-0002', 'PSN-200409-004', 'Keongmas', 3, 123, '<p>Magh akut</p>\r\n', NULL, 'Selesai Bayar', 1, '2020-05-18');

-- --------------------------------------------------------

--
-- Table structure for table `rekapitulasi`
--

CREATE TABLE `rekapitulasi` (
  `rekapitulasi_id` int(11) NOT NULL,
  `budget_id` int(11) NOT NULL,
  `jenis_pendapatan` varchar(25) DEFAULT NULL,
  `jenis_pengeluaran` varchar(25) DEFAULT NULL,
  `lap_pendapatan` int(11) DEFAULT NULL,
  `lap_pengeluaran` int(11) DEFAULT NULL,
  `tgl_input` date NOT NULL,
  `jml_rekap` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rekapitulasi`
--

INSERT INTO `rekapitulasi` (`rekapitulasi_id`, `budget_id`, `jenis_pendapatan`, `jenis_pengeluaran`, `lap_pendapatan`, `lap_pengeluaran`, `tgl_input`, `jml_rekap`) VALUES
(1, 1, 'pasien poli umum', 'bayar listrik', 500000, 10000, '2020-05-17', 490000),
(2, 1, '', 'Bayar WiFi', 0, 250000, '2020-05-17', -250000),
(3, 1, 'Modal', NULL, 200000, NULL, '2020-05-17', 200000),
(4, 1, 'Pasien Rawat Jalan', NULL, 82000, NULL, '2020-05-17', 82000),
(7, 1, 'Pasien Rawat Inap', NULL, 74000, NULL, '2020-05-17', 74000),
(10, 1, 'Modal', NULL, 200000, NULL, '2020-05-18', 200000),
(11, 1, 'Pasien Rawat Jalan', NULL, 63000, NULL, '2020-05-18', 63000),
(12, 1, 'Pasien Rawat Jalan', NULL, 72000, NULL, '2020-05-18', 72000),
(13, 1, 'Pasien Rawat Inap', NULL, 64000, NULL, '2020-05-18', 64000);

--
-- Triggers `rekapitulasi`
--
DELIMITER $$
CREATE TRIGGER `budget_` AFTER INSERT ON `rekapitulasi` FOR EACH ROW begin
	UPDATE budget_klinik SET jumlah_budget=jumlah_budget+NEW.jml_rekap
    WHERE budget_id = NEW.budget_id;
end
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `del` AFTER DELETE ON `rekapitulasi` FOR EACH ROW update budget_klinik set budget_klinik.jumlah_budget = budget_klinik.jumlah_budget - old.jml_rekap where budget_klinik.budget_id = old.budget_id
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `r_obat`
--

CREATE TABLE `r_obat` (
  `r_obat_id` int(11) NOT NULL,
  `no_rm` varchar(25) NOT NULL,
  `obat_id` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `r_obat`
--

INSERT INTO `r_obat` (`r_obat_id`, `no_rm`, `obat_id`, `harga`, `jumlah`, `total`) VALUES
(1, 'RKM-200504-0001', 1, 2000, 2, 4000),
(2, 'RKM-200504-0001', 9, 24000, 2, 48000),
(3, 'RKM-200504-0001', 16, 6000, 1, 6000),
(4, 'RKM-200504-0002', 12, 4000, 2, 8000),
(5, 'RKM-200504-0002', 11, 10000, 2, 20000),
(6, 'RKM-200504-0002', 15, 14000, 1, 14000),
(7, 'RKM-200504-0003', 1, 2000, 2, 4000),
(8, 'RKM-200504-0003', 13, 15000, 1, 15000),
(9, 'RKM-200504-0003', 16, 6000, 1, 6000),
(10, 'RKM-200504-0004', 9, 24000, 1, 24000),
(11, 'RKM-200504-0004', 1, 2000, 2, 4000),
(12, 'RKM-200504-0004', 12, 4000, 2, 8000),
(13, 'RKM-200504-0004', 1, 2000, 1, 2000),
(14, 'RKM-200513-0001', 10, 8000, 2, 16000),
(15, 'RKM-200513-0001', 1, 2000, 2, 4000),
(16, 'RKM-200514-0001', 1, 2000, 2, 4000),
(17, 'RKM-200514-0001', 16, 6000, 3, 18000),
(18, 'RKM-200516-0001', 11, 10000, 2, 20000),
(19, 'RKM-200516-0001', 13, 15000, 1, 15000),
(20, 'RKM-200516-0001', 1, 2000, 2, 4000),
(21, 'RKM-200516-0002', 1, 2000, 5, 10000),
(22, 'RKM-200510-0001', 1, 2000, 2, 4000),
(23, 'RKM-200510-0001', 14, 8000, 2, 16000),
(24, 'RKM-200510-0001', 13, 15000, 1, 15000),
(25, 'RKM-200517-0001', 13, 15000, 2, 30000),
(26, 'RKM-200517-0001', 12, 4000, 3, 12000),
(27, 'RKM-200517-0002', 1, 2000, 3, 6000),
(28, 'RKM-200517-0002', 15, 14000, 2, 28000),
(29, 'RKM-200518-0001', 1, 2000, 2, 4000),
(30, 'RKM-200518-0001', 15, 14000, 2, 28000),
(31, 'RKM-200518-0001', 14, 8000, 2, 16000),
(32, 'RKM-200518-0002', 12, 4000, 2, 8000),
(33, 'RKM-200518-0002', 13, 15000, 1, 15000),
(34, 'RKM-200518-0003', 1, 2000, 5, 10000),
(35, 'RKM-200518-0003', 15, 14000, 1, 14000);

--
-- Triggers `r_obat`
--
DELIMITER $$
CREATE TRIGGER `stok-out` AFTER INSERT ON `r_obat` FOR EACH ROW begin
	UPDATE obat SET stok=stok-NEW.jumlah
    WHERE obat_id = NEW.obat_id;
end
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `r_rkm`
--

CREATE TABLE `r_rkm` (
  `r_rkm_id` int(11) NOT NULL,
  `no_rm` varchar(25) NOT NULL,
  `fee_dokter` int(11) NOT NULL,
  `fee_admin` int(11) NOT NULL,
  `harga_total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `r_rkm`
--

INSERT INTO `r_rkm` (`r_rkm_id`, `no_rm`, `fee_dokter`, `fee_admin`, `harga_total`) VALUES
(1, 'RKM-200504-0001', 25000, 15000, 98000),
(2, 'RKM-200504-0002', 25000, 15000, 82000),
(3, 'RKM-200504-0003', 25000, 15000, 65000),
(4, 'RKM-200504-0004', 25000, 15000, 68000),
(5, 'RKM-200504-0004', 25000, 15000, 76000),
(6, 'RKM-200504-0004', 25000, 15000, 112000),
(7, 'RKM-200504-0004', 25000, 15000, 154000),
(8, 'RKM-200513-0001', 25000, 15000, 60000),
(9, 'RKM-200514-0001', 25000, 15000, 62000),
(11, 'RKM-200516-0001', 25000, 15000, 79000),
(12, 'RKM-200516-0001', 25000, 15000, 79000),
(13, 'RKM-200516-0001', 25000, 15000, 118000),
(14, 'RKM-200516-0002', 25000, 15000, 50000),
(15, 'RKM-200516-0002', 25000, 15000, 50000),
(16, 'RKM-200516-0002', 25000, 15000, 60000),
(17, 'RKM-200510-0001', 25000, 15000, 75000),
(18, 'RKM-200517-0001', 25000, 15000, 82000),
(19, 'RKM-200517-0002', 25000, 15000, 74000),
(20, 'RKM-200518-0001', 25000, 15000, 72000),
(21, 'RKM-200518-0001', 25000, 15000, 88000),
(22, 'RKM-200518-0002', 25000, 15000, 63000),
(23, 'RKM-200518-0003', 25000, 15000, 64000);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(60) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `level` int(1) NOT NULL COMMENT '1:admin 2:dokter 3:apoteker'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`, `nama`, `alamat`, `level`) VALUES
(1, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'admin', NULL, 1),
(3, 'apotek', '23353094c782a80a8e56161735e58080f4baf156', 'Apoteker', NULL, 2),
(4, 'Pemilik', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'Pemilik', NULL, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `budget_klinik`
--
ALTER TABLE `budget_klinik`
  ADD PRIMARY KEY (`budget_id`);

--
-- Indexes for table `dokter`
--
ALTER TABLE `dokter`
  ADD PRIMARY KEY (`dokter_id`);

--
-- Indexes for table `obat`
--
ALTER TABLE `obat`
  ADD PRIMARY KEY (`obat_id`);

--
-- Indexes for table `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`pasien_kd`);

--
-- Indexes for table `poli`
--
ALTER TABLE `poli`
  ADD PRIMARY KEY (`poli_id`);

--
-- Indexes for table `rawat_inap`
--
ALTER TABLE `rawat_inap`
  ADD PRIMARY KEY (`id_ranap`);

--
-- Indexes for table `rekamedis`
--
ALTER TABLE `rekamedis`
  ADD PRIMARY KEY (`no_rm`),
  ADD KEY `rekamedis_poli` (`poli_id`),
  ADD KEY `rekamedis_dokter` (`dokter_id`);

--
-- Indexes for table `rekapitulasi`
--
ALTER TABLE `rekapitulasi`
  ADD PRIMARY KEY (`rekapitulasi_id`);

--
-- Indexes for table `r_obat`
--
ALTER TABLE `r_obat`
  ADD PRIMARY KEY (`r_obat_id`);

--
-- Indexes for table `r_rkm`
--
ALTER TABLE `r_rkm`
  ADD PRIMARY KEY (`r_rkm_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `budget_klinik`
--
ALTER TABLE `budget_klinik`
  MODIFY `budget_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `dokter`
--
ALTER TABLE `dokter`
  MODIFY `dokter_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `obat`
--
ALTER TABLE `obat`
  MODIFY `obat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `poli`
--
ALTER TABLE `poli`
  MODIFY `poli_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `rawat_inap`
--
ALTER TABLE `rawat_inap`
  MODIFY `id_ranap` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `rekapitulasi`
--
ALTER TABLE `rekapitulasi`
  MODIFY `rekapitulasi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `r_obat`
--
ALTER TABLE `r_obat`
  MODIFY `r_obat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `r_rkm`
--
ALTER TABLE `r_rkm`
  MODIFY `r_rkm_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `rekamedis`
--
ALTER TABLE `rekamedis`
  ADD CONSTRAINT `rekamedis_dokter` FOREIGN KEY (`dokter_id`) REFERENCES `dokter` (`dokter_id`),
  ADD CONSTRAINT `rekamedis_poli` FOREIGN KEY (`poli_id`) REFERENCES `poli` (`poli_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
