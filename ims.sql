-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 21, 2022 at 07:06 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ims`
--

-- --------------------------------------------------------

--
-- Table structure for table `asset`
--

CREATE TABLE `asset` (
  `id` int(11) NOT NULL,
  `id_asset` varchar(50) NOT NULL,
  `tgl_input` date DEFAULT NULL,
  `id_user` int(3) NOT NULL,
  `status_asset` enum('Baru','Bekas') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `asset`
--

INSERT INTO `asset` (`id`, `id_asset`, `tgl_input`, `id_user`, `status_asset`) VALUES
(4, 'ASST-2202-0001', '2022-02-02', 4, 'Baru'),
(5, 'ASST-2202-0002', '2022-02-03', 4, 'Baru'),
(6, 'ASST-2202-0003', '2022-02-03', 4, 'Baru'),
(7, 'ASST-2202-0004', '2022-02-03', 4, 'Baru'),
(8, 'ASST-2202-0005', '2022-02-03', 4, 'Baru'),
(9, 'ASST-2202-0006', '2022-02-03', 4, 'Baru'),
(10, 'ASST-2202-0007', '2022-02-03', 4, 'Baru'),
(11, 'ASST-2202-0008', '2022-02-03', 4, 'Baru'),
(12, 'ASST-2202-0009', '2022-02-04', 4, 'Baru');

-- --------------------------------------------------------

--
-- Table structure for table `det_asset`
--

CREATE TABLE `det_asset` (
  `id_asset` varchar(50) NOT NULL,
  `nama_asset` varchar(255) NOT NULL,
  `id_jenis_asset` varchar(50) NOT NULL,
  `id_kategori_asset` varchar(50) NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `det_asset`
--

INSERT INTO `det_asset` (`id_asset`, `nama_asset`, `id_jenis_asset`, `id_kategori_asset`, `jumlah`) VALUES
('ASST-2202-0008', 'Meja', 'HRG-2201-0001', 'KTG-2201-0001', 3);

-- --------------------------------------------------------

--
-- Table structure for table `det_pengadaan`
--

CREATE TABLE `det_pengadaan` (
  `id_det_pengadaan` int(11) NOT NULL,
  `id_pengadaan` varchar(50) DEFAULT NULL,
  `nama_asset` varchar(50) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `harga_pengadaan` double DEFAULT NULL,
  `harga_realisasi` double DEFAULT NULL,
  `total_harga_realisasi` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `det_pengadaan`
--

INSERT INTO `det_pengadaan` (`id_det_pengadaan`, `id_pengadaan`, `nama_asset`, `jumlah`, `harga_pengadaan`, `harga_realisasi`, `total_harga_realisasi`) VALUES
(19, 'TRPD22020001', 'Komputer', 5, 4000000, 4000000, 2),
(20, 'TRPD22020002', 'Meja', 4, 1000000, 1000000, 4),
(21, 'TRPD22020003', 'Kursi', 5, 500000, 500000, 2),
(22, 'TRPD22020004', 'Komputer', 1, 10000000, 7500000, 7);

-- --------------------------------------------------------

--
-- Table structure for table `det_pengelolaan`
--

CREATE TABLE `det_pengelolaan` (
  `id_det_pengelolaan` int(11) NOT NULL,
  `id_pengelolaan` varchar(50) DEFAULT NULL,
  `id_asset` varchar(50) DEFAULT NULL,
  `jumlah_kelola` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `det_pengelolaan`
--

INSERT INTO `det_pengelolaan` (`id_det_pengelolaan`, `id_pengelolaan`, `id_asset`, `jumlah_kelola`) VALUES
(29, 'TPL22020001', 'ASST-2202-0008', 1),
(30, 'TPL22020002', 'ASST-2202-0009', 1);

-- --------------------------------------------------------

--
-- Table structure for table `det_penghapusan`
--

CREATE TABLE `det_penghapusan` (
  `id_det_penghapusan` int(11) NOT NULL,
  `id_penghapusan` varchar(50) DEFAULT NULL,
  `id_asset` varchar(50) DEFAULT NULL,
  `jumlah_hapus` int(11) DEFAULT NULL,
  `jenis_hapus` varchar(50) DEFAULT NULL,
  `nilai_asset` double DEFAULT NULL,
  `total_nilai_asset` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `det_penghapusan`
--

INSERT INTO `det_penghapusan` (`id_det_penghapusan`, `id_penghapusan`, `id_asset`, `jumlah_hapus`, `jenis_hapus`, `nilai_asset`, `total_nilai_asset`) VALUES
(45, 'TPL22020001', 'ASST-2202-0008', 1, 'Rusak', 1, 1),
(46, 'TPL22020002', 'ASST-2202-0009', 1, 'Rusak', 7500000, 7500000);

--
-- Triggers `det_penghapusan`
--
DELIMITER $$
CREATE TRIGGER `penghapusan_asset` BEFORE INSERT ON `det_penghapusan` FOR EACH ROW BEGIN
UPDATE det_asset SET jumlah=jumlah - NEW.jumlah_hapus WHERE id_asset = NEW.id_asset;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `det_perencanaan`
--

CREATE TABLE `det_perencanaan` (
  `id_det_perencanaan` int(11) NOT NULL,
  `id_perencanaan` varchar(50) DEFAULT NULL,
  `id_kategori_asset` varchar(50) DEFAULT NULL,
  `id_jenis_asset` varchar(50) DEFAULT NULL,
  `nama_asset` varchar(50) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `harga` double DEFAULT NULL,
  `total_harga` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `det_perencanaan`
--

INSERT INTO `det_perencanaan` (`id_det_perencanaan`, `id_perencanaan`, `id_kategori_asset`, `id_jenis_asset`, `nama_asset`, `jumlah`, `harga`, `total_harga`) VALUES
(34, 'TRP22020001', 'KTG-2201-0002', 'HRG-2201-0001', 'Komputer', 5, 4000000, 20000000),
(35, 'TRP22020002', 'KTG-2201-0002', 'HRG-2201-0001', 'Meja', 4, 1000000, 4000000),
(36, 'TRP22020003', 'KTG-2201-0002', 'HRG-2201-0001', 'Kursi', 5, 500000, 2500000),
(37, 'TRP22020004', 'KTG-2201-0002', 'HRG-2201-0001', 'Komputer', 1, 10000000, 10000000);

-- --------------------------------------------------------

--
-- Table structure for table `jenis_asset`
--

CREATE TABLE `jenis_asset` (
  `id_jenis_asset` varchar(50) NOT NULL,
  `nama_jenis` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis_asset`
--

INSERT INTO `jenis_asset` (`id_jenis_asset`, `nama_jenis`) VALUES
('HRG-2201-0001', 'Peralatan'),
('HRG-2201-0002', 'Perlengkapan'),
('HRG-2201-0003', 'Kendaraan'),
('HRG-2201-0004', 'Gedung/Bangunan'),
('HRG-2201-0005', ' Tanah'),
('HRG-2201-0006', '   Lain - Lain');

-- --------------------------------------------------------

--
-- Table structure for table `kategori_asset`
--

CREATE TABLE `kategori_asset` (
  `id_kategori_asset` varchar(50) NOT NULL,
  `nama_kategori` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori_asset`
--

INSERT INTO `kategori_asset` (`id_kategori_asset`, `nama_kategori`) VALUES
('KTG-2201-0001', 'Asset Bergerak'),
('KTG-2201-0002', 'Asset Tak Bergerak');

-- --------------------------------------------------------

--
-- Table structure for table `pengadaan`
--

CREATE TABLE `pengadaan` (
  `id_pengadaan` varchar(50) NOT NULL,
  `tgl_pengadaan` date DEFAULT NULL,
  `tgl_perencanaan` date DEFAULT NULL,
  `total_harga_diajukan` double DEFAULT NULL,
  `total_harga` double DEFAULT NULL,
  `id_user` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengadaan`
--

INSERT INTO `pengadaan` (`id_pengadaan`, `tgl_pengadaan`, `tgl_perencanaan`, `total_harga_diajukan`, `total_harga`, `id_user`) VALUES
('TRPD22020001', '2022-02-02', '2022-02-02', 20000000, 20000000, 4),
('TRPD22020002', '2022-02-02', '2022-02-02', 4000000, 4000000, 4),
('TRPD22020003', '2022-02-02', '2022-02-02', 2500000, 2500000, 4),
('TRPD22020004', '2022-02-04', '2022-02-04', 10000000, 7500000, 4);

-- --------------------------------------------------------

--
-- Table structure for table `pengelolaan`
--

CREATE TABLE `pengelolaan` (
  `id_pengelolaan` varchar(50) NOT NULL,
  `tgl_transaksi` date NOT NULL,
  `total_barang` int(11) NOT NULL,
  `peminjam` varchar(50) NOT NULL,
  `status_pengelolaan` varchar(50) NOT NULL,
  `id_user` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengelolaan`
--

INSERT INTO `pengelolaan` (`id_pengelolaan`, `tgl_transaksi`, `total_barang`, `peminjam`, `status_pengelolaan`, `id_user`) VALUES
('TPL22020001', '2022-02-03', 1, 'LPSE BJM', 'Maintenance', 4),
('TPL22020002', '2022-02-04', 1, 'LPSE BJM', 'Maintenance', 4);

-- --------------------------------------------------------

--
-- Table structure for table `penghapusan`
--

CREATE TABLE `penghapusan` (
  `id_penghapusan` varchar(50) NOT NULL,
  `tgl_hapus` date DEFAULT NULL,
  `id_user` int(3) DEFAULT NULL,
  `total_nilai_dihapus` double DEFAULT NULL,
  `status_hapus` enum('Sudah Dihapus') NOT NULL DEFAULT 'Sudah Dihapus'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penghapusan`
--

INSERT INTO `penghapusan` (`id_penghapusan`, `tgl_hapus`, `id_user`, `total_nilai_dihapus`, `status_hapus`) VALUES
('TPL22020001', '2022-02-03', 4, 1, 'Sudah Dihapus'),
('TPL22020002', '2022-02-04', 4, 7500000, 'Sudah Dihapus');

-- --------------------------------------------------------

--
-- Table structure for table `perencanaan`
--

CREATE TABLE `perencanaan` (
  `id_perencanaan` varchar(50) NOT NULL,
  `tgl_transaksi` date DEFAULT NULL,
  `tgl_rencana_pengadaan` date DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `tujuan` text DEFAULT NULL,
  `total_perencanaan` double DEFAULT NULL,
  `status_data` enum('Dibatalkan','Disetujui','Menunggu Konfirmasi') DEFAULT 'Menunggu Konfirmasi'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `perencanaan`
--

INSERT INTO `perencanaan` (`id_perencanaan`, `tgl_transaksi`, `tgl_rencana_pengadaan`, `id_user`, `tujuan`, `total_perencanaan`, `status_data`) VALUES
('TRP22020001', '2022-02-02', '2022-02-02', 4, 'Untuk aset', 20000000, 'Disetujui'),
('TRP22020002', '2022-02-02', '2022-02-02', 4, 'Untuk aset', 4000000, 'Disetujui'),
('TRP22020003', '2022-02-02', '2022-02-02', 4, 'Untuk aset', 2500000, 'Disetujui'),
('TRP22020004', '2022-02-04', '2022-02-04', 4, 'Untuk aset', 10000000, 'Disetujui');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `id_staff` varchar(50) NOT NULL,
  `nama_staff` varchar(50) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `no_hp` varchar(50) DEFAULT NULL,
  `jabatan` varchar(50) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id_staff`, `nama_staff`, `alamat`, `no_hp`, `jabatan`, `id_user`) VALUES
('STF-2201-0001', 'Jhon Doe', 'Balangan', '085705814231', 'Admin', 4);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(3) NOT NULL,
  `username` varchar(50) NOT NULL,
  `nama_user` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `telepon` varchar(13) DEFAULT NULL,
  `foto` varchar(100) DEFAULT NULL,
  `hak_akses` enum('Manajer','Gudang','Pegawai','Admin') NOT NULL,
  `status` enum('aktif','blokir') NOT NULL DEFAULT 'aktif',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `username`, `nama_user`, `password`, `email`, `telepon`, `foto`, `hak_akses`, `status`, `created_at`, `updated_at`) VALUES
(4, 'admin', 'Admin', '21232f297a57a5a743894a0e4a801fc3', 'admin@example.com', '123456789', NULL, 'Admin', 'aktif', '2019-11-11 22:18:50', '2022-01-16 09:58:01'),
(7, 'menejer', 'Menejer', 'eac5377545d2cabee963bf11ac1a93fd', 'eexakun@gmail.com', '085705814231', NULL, 'Manajer', 'aktif', '2022-01-29 11:30:12', '2022-02-21 02:57:03');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `asset`
--
ALTER TABLE `asset`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_asset` (`id_asset`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `det_asset`
--
ALTER TABLE `det_asset`
  ADD PRIMARY KEY (`id_asset`),
  ADD KEY `id_jenis_asset` (`id_jenis_asset`),
  ADD KEY `id_kategori_asset` (`id_kategori_asset`);

--
-- Indexes for table `det_pengadaan`
--
ALTER TABLE `det_pengadaan`
  ADD PRIMARY KEY (`id_det_pengadaan`),
  ADD KEY `id_pengadaan` (`id_pengadaan`);

--
-- Indexes for table `det_pengelolaan`
--
ALTER TABLE `det_pengelolaan`
  ADD PRIMARY KEY (`id_det_pengelolaan`),
  ADD KEY `id_pengelolaan` (`id_pengelolaan`),
  ADD KEY `id_asset` (`id_asset`);

--
-- Indexes for table `det_penghapusan`
--
ALTER TABLE `det_penghapusan`
  ADD PRIMARY KEY (`id_det_penghapusan`),
  ADD KEY `id_penghapusan` (`id_penghapusan`),
  ADD KEY `id_asset` (`id_asset`);

--
-- Indexes for table `det_perencanaan`
--
ALTER TABLE `det_perencanaan`
  ADD PRIMARY KEY (`id_det_perencanaan`),
  ADD KEY `id_perencanaan` (`id_perencanaan`),
  ADD KEY `id_kategori_asset` (`id_kategori_asset`),
  ADD KEY `id_jenis_asset` (`id_jenis_asset`);

--
-- Indexes for table `jenis_asset`
--
ALTER TABLE `jenis_asset`
  ADD PRIMARY KEY (`id_jenis_asset`);

--
-- Indexes for table `kategori_asset`
--
ALTER TABLE `kategori_asset`
  ADD PRIMARY KEY (`id_kategori_asset`);

--
-- Indexes for table `pengadaan`
--
ALTER TABLE `pengadaan`
  ADD PRIMARY KEY (`id_pengadaan`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `pengelolaan`
--
ALTER TABLE `pengelolaan`
  ADD PRIMARY KEY (`id_pengelolaan`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `penghapusan`
--
ALTER TABLE `penghapusan`
  ADD PRIMARY KEY (`id_penghapusan`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `perencanaan`
--
ALTER TABLE `perencanaan`
  ADD PRIMARY KEY (`id_perencanaan`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id_staff`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `level` (`hak_akses`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `asset`
--
ALTER TABLE `asset`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `det_pengadaan`
--
ALTER TABLE `det_pengadaan`
  MODIFY `id_det_pengadaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `det_pengelolaan`
--
ALTER TABLE `det_pengelolaan`
  MODIFY `id_det_pengelolaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `det_penghapusan`
--
ALTER TABLE `det_penghapusan`
  MODIFY `id_det_penghapusan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `det_perencanaan`
--
ALTER TABLE `det_perencanaan`
  MODIFY `id_det_perencanaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `asset`
--
ALTER TABLE `asset`
  ADD CONSTRAINT `asset_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);

--
-- Constraints for table `det_pengadaan`
--
ALTER TABLE `det_pengadaan`
  ADD CONSTRAINT `det_pengadaan_ibfk_1` FOREIGN KEY (`id_pengadaan`) REFERENCES `pengadaan` (`id_pengadaan`);

--
-- Constraints for table `det_pengelolaan`
--
ALTER TABLE `det_pengelolaan`
  ADD CONSTRAINT `det_pengelolaan_ibfk_1` FOREIGN KEY (`id_pengelolaan`) REFERENCES `pengelolaan` (`id_pengelolaan`);

--
-- Constraints for table `det_penghapusan`
--
ALTER TABLE `det_penghapusan`
  ADD CONSTRAINT `det_penghapusan_ibfk_1` FOREIGN KEY (`id_penghapusan`) REFERENCES `penghapusan` (`id_penghapusan`);

--
-- Constraints for table `det_perencanaan`
--
ALTER TABLE `det_perencanaan`
  ADD CONSTRAINT `det_perencanaan_ibfk_1` FOREIGN KEY (`id_kategori_asset`) REFERENCES `kategori_asset` (`id_kategori_asset`),
  ADD CONSTRAINT `det_perencanaan_ibfk_2` FOREIGN KEY (`id_jenis_asset`) REFERENCES `jenis_asset` (`id_jenis_asset`),
  ADD CONSTRAINT `det_perencanaan_ibfk_3` FOREIGN KEY (`id_perencanaan`) REFERENCES `perencanaan` (`id_perencanaan`);

--
-- Constraints for table `pengadaan`
--
ALTER TABLE `pengadaan`
  ADD CONSTRAINT `pengadaan_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);

--
-- Constraints for table `pengelolaan`
--
ALTER TABLE `pengelolaan`
  ADD CONSTRAINT `pengelolaan_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);

--
-- Constraints for table `penghapusan`
--
ALTER TABLE `penghapusan`
  ADD CONSTRAINT `penghapusan_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);

--
-- Constraints for table `perencanaan`
--
ALTER TABLE `perencanaan`
  ADD CONSTRAINT `perencanaan_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);

--
-- Constraints for table `staff`
--
ALTER TABLE `staff`
  ADD CONSTRAINT `staff_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
