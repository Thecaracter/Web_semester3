-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 07, 2022 at 12:54 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `koperasi`
--

-- --------------------------------------------------------

--
-- Table structure for table `anggota`
--

CREATE TABLE `anggota` (
  `id_anggota` varchar(11) NOT NULL,
  `nama` varchar(40) NOT NULL,
  `alamat` text NOT NULL,
  `tgl_lahir` date NOT NULL,
  `tmp_lahir` varchar(20) NOT NULL,
  `j_kel` varchar(20) NOT NULL,
  `status` varchar(8) NOT NULL,
  `no_telp` varchar(12) NOT NULL,
  `besar_simpanan` bigint NOT NULL,
  `foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `anggota`
--

INSERT INTO `anggota` (`id_anggota`, `nama`, `alamat`, `tgl_lahir`, `tmp_lahir`, `j_kel`, `status`, `no_telp`, `besar_simpanan`, `foto`) VALUES
('AGT001', 'Luluk Mufida', 'Jl. Mutiara', '2000-11-23', 'Pasuruan', 'Perempuan', '1', '082301261900', 25000, ''),
('AGT002', 'Farel Putra Hidayat', 'Jl. Brawijaya', '2000-11-23', 'Jember', 'Laki-Laki', '1', '082310001134', 25000, ''),
('AGT003', 'RIZQI NUR ANDI PUTRA', 'Jalan pahlawan klayu mayang', '2001-09-19', 'Jember', 'Laki-Laki', '1', '08098098097', 50000000, ''),
('AGT004', 'amanda zafira', 'bojong kenyot', '1978-09-17', 'Amerika', 'Laki-Laki', '1', '0827187120', 0, ''),
('AGT006', 'mantap', 'w', '2000-12-09', 'Jember', 'Perempuan', '1', '073126793162', 50000, 'uploads/Screenshot (4).png');

-- --------------------------------------------------------

--
-- Table structure for table `angsuran`
--

CREATE TABLE `angsuran` (
  `id_angsuran` varchar(11) NOT NULL,
  `id_pinjaman` varchar(11) NOT NULL,
  `id_anggota` varchar(11) NOT NULL,
  `nama_pinjaman` varchar(40) NOT NULL,
  `tgl_pembayaran` date NOT NULL,
  `angsuran_ke` int NOT NULL,
  `besar_angsuran` bigint NOT NULL,
  `tgl_jatuh_tempo` date NOT NULL,
  `denda` bigint NOT NULL,
  `bln` varchar(2) NOT NULL,
  `ket` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `angsuran`
--

INSERT INTO `angsuran` (`id_angsuran`, `id_pinjaman`, `id_anggota`, `nama_pinjaman`, `tgl_pembayaran`, `angsuran_ke`, `besar_angsuran`, `tgl_jatuh_tempo`, `denda`, `bln`, `ket`) VALUES
('ANG001', 'PMJ001', 'AGT001', 'Pinjaman Jangka Pendek', '2020-12-26', 1, 2238000, '2017-12-27', 38000, '12', 'BELUM LUNAS'),
('ANG002', 'PMJ001', 'AGT001', 'Pinjaman Jangka Pendek', '2022-10-07', 2, 2200000, '2017-12-27', 0, '10', 'BELUM LUNAS');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int NOT NULL,
  `name` varchar(200) NOT NULL,
  `image` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE `karyawan` (
  `id` int NOT NULL,
  `username` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan','') COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(11) COLLATE utf8mb4_general_ci NOT NULL,
  `alamat` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `foto` text COLLATE utf8mb4_general_ci NOT NULL,
  `level` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`id`, `username`, `jenis_kelamin`, `password`, `alamat`, `foto`, `level`) VALUES
(1, 'rizqi', 'Laki-laki', '1234', 'jl pahlawan,dusun klayu, desa mayang', '', 1),
(2, 'thoriq', 'Laki-laki', '1234', 'jl kere hore mantap', '', 1),
(3, 'nabila', 'Perempuan', '1234', 'jl mantap', '', 1),
(4, 'dita', 'Perempuan', '1234', 'jl matahari', '', 1),
(5, 'ayu', 'Perempuan', '1234', 'jl gg', '', 1),
(6, 'mantap', 'Laki-laki', '1234', 'jl mantap', '', 2);

-- --------------------------------------------------------

--
-- Table structure for table `k_pinjaman`
--

CREATE TABLE `k_pinjaman` (
  `id_k_pinjaman` int NOT NULL,
  `nama_pinjaman` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `k_pinjaman`
--

INSERT INTO `k_pinjaman` (`id_k_pinjaman`, `nama_pinjaman`) VALUES
(1, 'Pinjaman Jangka Pendek'),
(2, 'Pinjaman Jangka Menengah'),
(3, 'Pinjaman Jangka Panjang');

-- --------------------------------------------------------

--
-- Table structure for table `k_simpanan`
--

CREATE TABLE `k_simpanan` (
  `id` int NOT NULL,
  `nm_simpanan` varchar(25) NOT NULL,
  `ket_simpanan` text NOT NULL,
  `besar_simpanan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `k_simpanan`
--

INSERT INTO `k_simpanan` (`id`, `nm_simpanan`, `ket_simpanan`, `besar_simpanan`) VALUES
(1, 'Simpanan Pokok', 'Simpanan Pokok yang dibayarkan pertama kali oleh anggota koperasi dan hanya sekali saja', '50000'),
(2, 'Simpanan Wajib', 'Simpanan Wajib yang dibayarkan oleh anggota setiap bulannya', '25000'),
(3, 'Simpanan Sukarela', 'Simpanan Sukarela yang mirip seperti tabungan dengan jumlah dan waktu simpanan tidak ditentukan', ''),
(6, 'simpanan mantap', 'mantap', '50000'),
(8, 'anjay', 'mantap', '50000');

-- --------------------------------------------------------

--
-- Table structure for table `pinjaman`
--

CREATE TABLE `pinjaman` (
  `id_pinjaman` varchar(11) NOT NULL,
  `nama_pinjaman` varchar(40) NOT NULL,
  `id_anggota` varchar(11) NOT NULL,
  `besar_pinjaman` bigint NOT NULL,
  `tgl_pengajuan_pinjaman` date NOT NULL,
  `tgl_acc_pinjaman` date NOT NULL,
  `tgl_pinjaman` date NOT NULL,
  `tgl_pelunasan` date NOT NULL,
  `bln` varchar(2) NOT NULL,
  `thn` varchar(4) NOT NULL,
  `ket` enum('1','0') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pinjaman`
--

INSERT INTO `pinjaman` (`id_pinjaman`, `nama_pinjaman`, `id_anggota`, `besar_pinjaman`, `tgl_pengajuan_pinjaman`, `tgl_acc_pinjaman`, `tgl_pinjaman`, `tgl_pelunasan`, `bln`, `thn`, `ket`) VALUES
('PMJ001', 'Pinjaman Jangka Pendek', 'AGT001', 20000000, '2017-11-26', '2017-11-27', '2017-11-28', '2018-09-28', '11', '2017', '0'),
('PMJ002', 'Pinjaman Jangka Pendek', 'AGT002', 2000000, '2020-12-26', '2020-12-27', '2020-12-28', '2021-10-28', '12', '2020', '0'),
('PMJ003', 'Pinjaman Jangka Menengah', 'AGT004', 1000000, '2022-10-07', '2022-10-08', '2022-10-09', '2024-06-09', '10', '2022', '0');

-- --------------------------------------------------------

--
-- Table structure for table `simpanan`
--

CREATE TABLE `simpanan` (
  `id_simpanan` int NOT NULL,
  `nm_simpanan` varchar(20) DEFAULT NULL,
  `id_anggota` varchar(11) DEFAULT NULL,
  `tgl_simpanan` date DEFAULT NULL,
  `besar_simpanan` bigint DEFAULT NULL,
  `ket_simpanan` text,
  `bln` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `simpanan`
--

INSERT INTO `simpanan` (`id_simpanan`, `nm_simpanan`, `id_anggota`, `tgl_simpanan`, `besar_simpanan`, `ket_simpanan`, `bln`) VALUES
(78, 'Simpanan Pokok', 'AGT001', '2017-11-22', 50000, 'Simpanan Pokok yang dibayarkan pertama kali oleh anggota koperasi dan hanya sekali saja', '11'),
(85, 'Simpanan Wajib', 'AGT001', '2017-11-22', 25000, 'Simpanan Wajib yang dibayarkan oleh anggota setiap bulannya', '11'),
(86, 'Simpanan Sukarela', 'AGT001', '2017-11-28', 30000, 'Simpanan Sukarela yang mirip seperti tabungan dengan jumlah dan waktu simpanan tidak ditentukan', '11'),
(87, 'Simpanan Pokok', 'AGT002', '2017-12-09', 50000, 'Simpanan Pokok yang dibayarkan pertama kali oleh anggota koperasi dan hanya sekali saja', '12'),
(88, 'Simpanan Wajib', 'AGT002', '2017-12-09', 25000, 'Simpanan Wajib yang dibayarkan oleh anggota setiap bulannya', '12'),
(89, 'Simpanan Sukarela', 'AGT001', '2020-12-22', 100000, 'Simpanan Sukarela yang mirip seperti tabungan dengan jumlah dan waktu simpanan tidak ditentukan', '12'),
(90, 'Simpanan Sukarela', 'AGT002', '2020-12-26', 200000, 'Simpanan Sukarela yang mirip seperti tabungan dengan jumlah dan waktu simpanan tidak ditentukan', '12'),
(91, 'Simpanan Pokok', 'AGT003', '2022-10-06', 50000, 'Simpanan Pokok yang dibayarkan pertama kali oleh anggota koperasi dan hanya sekali saja', '10'),
(92, 'Simpanan Wajib', 'AGT003', '2022-10-06', 50000000, 'Simpanan Wajib yang dibayarkan oleh anggota setiap bulannya', '10'),
(93, 'Simpanan Pokok', 'AGT004', '2022-10-07', 50000, 'Simpanan Pokok yang dibayarkan pertama kali oleh anggota koperasi dan hanya sekali saja', '10'),
(94, 'Simpanan Sukarela', 'AGT004', '2022-10-07', 500000, 'Simpanan Sukarela yang mirip seperti tabungan dengan jumlah dan waktu simpanan tidak ditentukan', '10'),
(95, 'Simpanan Pokok', 'AGT006', '2022-12-06', 50000, 'Simpanan Pokok yang dibayarkan pertama kali oleh anggota koperasi dan hanya sekali saja', '12');

--
-- Triggers `simpanan`
--
DELIMITER $$
CREATE TRIGGER `delete_simpanan` AFTER DELETE ON `simpanan` FOR EACH ROW UPDATE anggota set besar_simpanan=besar_simpanan-old.besar_simpanan WHERE id_anggota=old.id_anggota
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `tambah_simpanan` AFTER INSERT ON `simpanan` FOR EACH ROW UPDATE anggota set besar_simpanan=besar_simpanan+new.besar_simpanan WHERE id_anggota=new.id_anggota AND new.nm_simpanan='Simpanan Wajib'
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`id_anggota`);

--
-- Indexes for table `angsuran`
--
ALTER TABLE `angsuran`
  ADD PRIMARY KEY (`id_angsuran`),
  ADD KEY `id_pinjaman` (`id_pinjaman`),
  ADD KEY `id_anggota` (`id_anggota`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `k_pinjaman`
--
ALTER TABLE `k_pinjaman`
  ADD PRIMARY KEY (`id_k_pinjaman`);

--
-- Indexes for table `k_simpanan`
--
ALTER TABLE `k_simpanan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pinjaman`
--
ALTER TABLE `pinjaman`
  ADD PRIMARY KEY (`id_pinjaman`),
  ADD KEY `id_anggota` (`id_anggota`);

--
-- Indexes for table `simpanan`
--
ALTER TABLE `simpanan`
  ADD PRIMARY KEY (`id_simpanan`),
  ADD KEY `id_anggota` (`id_anggota`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `k_pinjaman`
--
ALTER TABLE `k_pinjaman`
  MODIFY `id_k_pinjaman` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `k_simpanan`
--
ALTER TABLE `k_simpanan`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `simpanan`
--
ALTER TABLE `simpanan`
  MODIFY `id_simpanan` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `angsuran`
--
ALTER TABLE `angsuran`
  ADD CONSTRAINT `angsuran_ibfk_1` FOREIGN KEY (`id_anggota`) REFERENCES `anggota` (`id_anggota`),
  ADD CONSTRAINT `angsuran_ibfk_2` FOREIGN KEY (`id_pinjaman`) REFERENCES `pinjaman` (`id_pinjaman`);

--
-- Constraints for table `pinjaman`
--
ALTER TABLE `pinjaman`
  ADD CONSTRAINT `pinjaman_ibfk_1` FOREIGN KEY (`id_anggota`) REFERENCES `anggota` (`id_anggota`);

--
-- Constraints for table `simpanan`
--
ALTER TABLE `simpanan`
  ADD CONSTRAINT `simpanan_ibfk_1` FOREIGN KEY (`id_anggota`) REFERENCES `anggota` (`id_anggota`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
