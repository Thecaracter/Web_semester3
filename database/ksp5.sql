-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 01, 2023 at 07:57 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ksp`
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
  `besar_simpanan` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `anggota`
--

INSERT INTO `anggota` (`id_anggota`, `nama`, `alamat`, `tgl_lahir`, `tmp_lahir`, `j_kel`, `status`, `no_telp`, `besar_simpanan`) VALUES
('AGT001', 'Luluk Mufida', 'Jl. Mutiara', '2000-11-23', 'Pasuruan', 'Perempuan', '0', '082301261900', -180000),
('AGT002', 'Farel Putra Hidayat', 'Jl. Brawijaya', '2000-11-23', 'Jember', 'Laki-Laki', '0', '082310001134', -250000),
('AGT003', 'mantap', '1', '2001-09-01', 'Amerika', 'Laki-Laki', '0', '01387812739', -25000),
('AGT004', 'Amanda Manopo', 'Jl. Sumedang, Jakarta Selatan No 20', '1998-09-01', 'Jakarta', 'Perempuan', '0', '089765456765', -50000),
('AGT005', 'Muhammad Rifqi Anwari', 'Jl. Pemuda Dekar, Magelang, No 29', '1970-07-08', 'Magelang', 'Laki-Laki', '0', '089765432875', 0),
('AGT006', 'Ammirul Jadid', 'Jl. Cinere Kembang, Bekasi, No 47', '1985-05-18', 'Bekasi', 'Laki-Laki', '0', '087654321678', 0),
('AGT007', 'Muchlis Maunat', 'Jl. Ampera  Mekar, Surakarta, No. 72', '1982-03-27', 'Surakarta', 'Laki-Laki', '0', '081234667892', 0),
('AGT008', 'Imalia Desti', 'Jl. Pahlawan Timur, Depok, No. 65', '1974-02-17', 'Depok', 'Perempuan', '0', '082324543789', 0),
('AGT009', 'Royan Agil Nugroho', 'Jl. Manggis Semi, Tangerang, No. 10', '1993-11-28', 'Tangerang', 'Laki-Laki', '0', '081234567765', 0),
('AGT010', 'Safira Permata', 'Jl. Krasaan, Pekalongan, No. 30', '1990-12-29', 'Pekalongan', 'Perempuan', '0', '087566765432', 0),
('AGT011', 'Lasmina Dewi', 'Jl, Sumatra, Bandung, No. 28', '1999-02-20', 'Bandung', 'Perempuan', '0', '082334567790', 0),
('AGT012', 'Putri Mekarani', 'Jl. Lagenpratman, Medan, No. 74', '1997-08-10', 'Medan', 'Perempuan', '0', '087776543219', 0),
('AGT013', 'Abraham Bijaksono', 'Jl. Wijaya Kusuma, Jakarta, No 20', '2000-09-01', 'Jakarta', 'Laki-Laki', '0', '081234567897', 0),
('AGT014', 'Amanda Manopo', 'Jl. Kembang Anyar, Madiun, No. 23', '2001-09-03', 'Madiun', 'Perempuan', '0', '081234987778', 0),
('AGT015', 'Amanda Yuliana', 'Jl. Tegal Besar, Magelang, No. 23', '2000-06-19', 'Magelang', 'Perempuan', '0', '082334231456', 0),
('AGT016', 'Amanda Manopo', 'Jl. Sudirman, Jakarta Selatan, No 23', '1999-02-24', 'Jakarta', 'Perempuan', '0', '082665432789', 0),
('AGT017', 'Abraham Bijaksono', 'Jl. Mekar Sagen, Madiun, No.43', '1998-01-12', 'Madiun', 'Laki-Laki', '1', '082334543231', 110000),
('AGT018', 'Safira Permata', 'Jl. Jenderal Soedirman,  Bengkulu, No 12', '1999-06-18', 'Bengkulu', 'Perempuan', '1', '081234567890', 130000),
('AGT019', 'Susanti Chayanes', 'Jl. Ahmad Yani, Yogyakarta, N0. 67', '2001-04-14', 'Yogyakarta', 'Perempuan', '1', '082889909878', 150000),
('AGT020', 'Arya Mahardika', 'Jl. Sunan Ampel, Pasuruan, No. 41', '1997-11-26', 'Pasuruan', 'Laki-Laki', '1', '089234543231', 175000),
('AGT021', 'Armelia Nur Assifa', 'Jl. Kembar Pustaka, Cilegon, No. 91', '2000-12-29', 'Cilegon', 'Perempuan', '1', '081234778908', 200000),
('AGT022', 'Denis Muhammad Irfan', 'Jl. Bintaro Permai, Tangerang, No. 60', '2001-05-15', 'Tangerang', 'Perempuan', '1', '082345765221', 210000),
('AGT023', 'Ichsan Nurmansyah', 'Jl. Blora, Aceh, No. 37', '2000-05-18', 'Aceh', 'Laki-Laki', '1', '081234567789', 250000),
('AGT024', 'Annisa Damayanti', 'Jl. Kademangan, Bandung, No. 37', '2003-01-23', 'Bandung', 'Perempuan', '1', '081234556731', 300000),
('AGT025', 'Nadia Setwati Ningrum', 'Jl. Banteng, Banten, No. 16', '1995-09-03', 'Banten', 'Perempuan', '1', '082334567212', 350000),
('AGT026', 'Fikal Putra', 'Jl. Kalimantan, Jember, No. 12', '2003-11-11', 'Jember', 'Laki-Laki', '1', '082334564789', 375000),
('AGT027', 'Haikal Enggara', 'Jl. Randuagung, Lumajang, No. 82', '2000-01-27', 'Lumajang', 'Laki-Laki', '1', '081234998678', 400000),
('AGT028', 'Intan Vlorenza', 'Jl. Basuki Rahmat, Sidoarjo, No. 57', '1999-05-20', 'Sidoarjo', 'Perempuan', '1', '082334562431', 450000);

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
  `angsuran_ke` int(11) NOT NULL,
  `besar_angsuran` bigint(20) NOT NULL,
  `tgl_jatuh_tempo` date NOT NULL,
  `denda` bigint(20) NOT NULL,
  `bln` varchar(2) NOT NULL,
  `ket` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE `karyawan` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(11) NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `foto` text NOT NULL,
  `level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`id`, `username`, `password`, `no_telp`, `alamat`, `foto`, `level`) VALUES
(1, 'rizqi', '1234', '08883662780', 'jl pahlawan,dusun klayu, desa mayang', 'rizqi.jpg', 1),
(2, 'thoriq', '1234', '', 'jl kere hore mantap', 'thoriq.jpg', 1),
(3, 'nabila', '1234', '', 'jl mantap', '', 1),
(4, 'dita', '1234', '', 'jl matahari', 'dita.jpg', 1),
(5, 'ayu', '1234', '', 'jl gg', 'ayu.jpg', 1),
(6, 'mantap', '1234', '08831787193', 'jl mantap', '', 2),
(27, 'y', '1234', '083187123', 'anjay', '', 2),
(28, 'x', '1234', '083187123', 'anjay', '', 2);

-- --------------------------------------------------------

--
-- Table structure for table `k_pinjaman`
--

CREATE TABLE `k_pinjaman` (
  `id_k_pinjaman` int(11) NOT NULL,
  `nama_pinjaman` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

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
  `id` int(11) NOT NULL,
  `nm_simpanan` varchar(25) NOT NULL,
  `ket_simpanan` text NOT NULL,
  `besar_simpanan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `k_simpanan`
--

INSERT INTO `k_simpanan` (`id`, `nm_simpanan`, `ket_simpanan`, `besar_simpanan`) VALUES
(1, 'Simpanan Pokok', 'Simpanan Pokok yang dibayarkan pertama kali oleh anggota koperasi dan hanya sekali saja', '50000'),
(2, 'Simpanan Wajib', 'Simpanan Wajib yang dibayarkan oleh anggota setiap bulannya', '25000'),
(3, 'Simpanan Sukarela', 'Simpanan Sukarela yang mirip seperti tabungan dengan jumlah dan waktu simpanan tidak ditentukan', '');

-- --------------------------------------------------------

--
-- Table structure for table `pinjaman`
--

CREATE TABLE `pinjaman` (
  `id_pinjaman` varchar(11) NOT NULL,
  `nama_pinjaman` varchar(40) NOT NULL,
  `id_anggota` varchar(11) NOT NULL,
  `besar_pinjaman` bigint(20) NOT NULL,
  `tgl_pengajuan_pinjaman` date NOT NULL,
  `tgl_acc_pinjaman` date NOT NULL,
  `tgl_pinjaman` date NOT NULL,
  `tgl_pelunasan` date NOT NULL,
  `bln` varchar(2) NOT NULL,
  `thn` varchar(4) NOT NULL,
  `ket` enum('1','0') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `pinjaman`
--

INSERT INTO `pinjaman` (`id_pinjaman`, `nama_pinjaman`, `id_anggota`, `besar_pinjaman`, `tgl_pengajuan_pinjaman`, `tgl_acc_pinjaman`, `tgl_pinjaman`, `tgl_pelunasan`, `bln`, `thn`, `ket`) VALUES
('PMJ001', 'Pinjaman Jangka Pendek', 'AGT017', 10000000, '2022-01-02', '2022-01-02', '2022-01-03', '2023-11-03', '01', '2023', '0'),
('PMJ002', 'Pinjaman Jangka Menengah', 'AGT018', 7000000, '2022-02-04', '2022-02-04', '2022-02-05', '2024-09-03', '01', '2023', '0'),
('PMJ003', 'Pinjaman Jangka Menengah', 'AGT019', 10500000, '2022-03-04', '2022-03-04', '2022-03-05', '2024-09-03', '01', '2023', '0'),
('PMJ004', 'Pinjaman Jangka Menengah', 'AGT020', 8000000, '2022-04-29', '2022-04-29', '2022-04-30', '2024-09-03', '01', '2023', '0'),
('PMJ005', 'Pinjaman Jangka Pendek', 'AGT021', 12000000, '2022-05-17', '2022-05-17', '2022-05-18', '2023-11-03', '01', '2023', '0'),
('PMJ006', 'Pinjaman Jangka Menengah', 'AGT022', 3000000, '2022-06-01', '2022-06-01', '2022-06-02', '2024-09-03', '01', '2023', '0'),
('PMJ007', 'Pinjaman Jangka Pendek', 'AGT023', 10000000, '2022-07-24', '2022-07-24', '2022-07-25', '2023-11-03', '01', '2023', '0'),
('PMJ008', 'Pinjaman Jangka Panjang', 'AGT024', 4000000, '2022-08-08', '2022-08-08', '2022-08-09', '2025-07-03', '01', '2023', '0'),
('PMJ009', 'Pinjaman Jangka Panjang', 'AGT025', 11000000, '2022-09-14', '2022-09-14', '2022-09-15', '2025-07-03', '01', '2023', '0'),
('PMJ010', 'Pinjaman Jangka Panjang', 'AGT026', 5000000, '2022-10-12', '2022-10-12', '2022-10-13', '2025-07-03', '01', '2023', '0'),
('PMJ011', 'Pinjaman Jangka Menengah', 'AGT027', 12000000, '2022-11-19', '2022-11-19', '2022-11-20', '2024-09-03', '01', '2023', '0'),
('PMJ012', 'Pinjaman Jangka Panjang', 'AGT028', 8000000, '2022-12-29', '2022-12-29', '2022-12-30', '2025-07-03', '01', '2023', '0');

-- --------------------------------------------------------

--
-- Table structure for table `simpanan`
--

CREATE TABLE `simpanan` (
  `id_simpanan` int(11) NOT NULL,
  `nm_simpanan` varchar(20) DEFAULT NULL,
  `id_anggota` varchar(11) DEFAULT NULL,
  `tgl_simpanan` date DEFAULT NULL,
  `besar_simpanan` bigint(20) DEFAULT NULL,
  `ket_simpanan` text DEFAULT NULL,
  `bln` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `simpanan`
--

INSERT INTO `simpanan` (`id_simpanan`, `nm_simpanan`, `id_anggota`, `tgl_simpanan`, `besar_simpanan`, `ket_simpanan`, `bln`) VALUES
(115, 'Simpanan Pokok', 'AGT017', '2022-01-02', 50000, 'Simpanan Pokok yang dibayarkan pertama kali oleh anggota koperasi dan hanya sekali saja', '01'),
(116, 'Simpanan Sukarela', 'AGT017', '2022-01-02', 60000, 'Simpanan Sukarela yang mirip seperti tabungan dengan jumlah dan waktu simpanan tidak ditentukan', '01'),
(117, 'Simpanan Pokok', 'AGT018', '2022-02-02', 50000, 'Simpanan Pokok yang dibayarkan pertama kali oleh anggota koperasi dan hanya sekali saja', '01'),
(118, 'Simpanan Sukarela', 'AGT018', '2022-02-02', 80000, 'Simpanan Sukarela yang mirip seperti tabungan dengan jumlah dan waktu simpanan tidak ditentukan', '01'),
(119, 'Simpanan Pokok', 'AGT019', '2022-03-14', 50000, 'Simpanan Pokok yang dibayarkan pertama kali oleh anggota koperasi dan hanya sekali saja', '01'),
(120, 'Simpanan Sukarela', 'AGT019', '2022-03-14', 100000, 'Simpanan Sukarela yang mirip seperti tabungan dengan jumlah dan waktu simpanan tidak ditentukan', '01'),
(121, 'Simpanan Pokok', 'AGT020', '2022-04-06', 50000, 'Simpanan Pokok yang dibayarkan pertama kali oleh anggota koperasi dan hanya sekali saja', '01'),
(122, 'Simpanan Sukarela', 'AGT020', '2022-04-06', 125000, 'Simpanan Sukarela yang mirip seperti tabungan dengan jumlah dan waktu simpanan tidak ditentukan', '01'),
(123, 'Simpanan Pokok', 'AGT021', '2022-05-04', 50000, 'Simpanan Pokok yang dibayarkan pertama kali oleh anggota koperasi dan hanya sekali saja', '01'),
(124, 'Simpanan Sukarela', 'AGT021', '2022-05-04', 150000, 'Simpanan Sukarela yang mirip seperti tabungan dengan jumlah dan waktu simpanan tidak ditentukan', '01'),
(125, 'Simpanan Pokok', 'AGT022', '2022-06-08', 50000, 'Simpanan Pokok yang dibayarkan pertama kali oleh anggota koperasi dan hanya sekali saja', '01'),
(126, 'Simpanan Wajib', 'AGT022', '2022-06-08', 160000, 'Simpanan Wajib yang dibayarkan oleh anggota setiap bulannya', '01'),
(127, 'Simpanan Pokok', 'AGT023', '2022-07-12', 50000, 'Simpanan Pokok yang dibayarkan pertama kali oleh anggota koperasi dan hanya sekali saja', '01'),
(128, 'Simpanan Wajib', 'AGT023', '2022-07-12', 200000, 'Simpanan Wajib yang dibayarkan oleh anggota setiap bulannya', '01'),
(129, 'Simpanan Pokok', 'AGT024', '2022-08-23', 50000, 'Simpanan Pokok yang dibayarkan pertama kali oleh anggota koperasi dan hanya sekali saja', '01'),
(130, 'Simpanan Wajib', 'AGT024', '2022-08-23', 250000, 'Simpanan Wajib yang dibayarkan oleh anggota setiap bulannya', '01'),
(131, 'Simpanan Pokok', 'AGT025', '2022-09-23', 50000, 'Simpanan Pokok yang dibayarkan pertama kali oleh anggota koperasi dan hanya sekali saja', '01'),
(132, 'Simpanan Wajib', 'AGT025', '2022-09-23', 300000, 'Simpanan Wajib yang dibayarkan oleh anggota setiap bulannya', '01'),
(133, 'Simpanan Pokok', 'AGT026', '2022-10-15', 50000, 'Simpanan Pokok yang dibayarkan pertama kali oleh anggota koperasi dan hanya sekali saja', '01'),
(134, 'Simpanan Wajib', 'AGT026', '2022-10-15', 325000, 'Simpanan Wajib yang dibayarkan oleh anggota setiap bulannya', '01'),
(135, 'Simpanan Pokok', 'AGT027', '2022-11-03', 50000, 'Simpanan Pokok yang dibayarkan pertama kali oleh anggota koperasi dan hanya sekali saja', '01'),
(136, 'Simpanan Wajib', 'AGT027', '2022-11-03', 350000, 'Simpanan Wajib yang dibayarkan oleh anggota setiap bulannya', '01'),
(137, 'Simpanan Pokok', 'AGT028', '2022-12-28', 50000, 'Simpanan Pokok yang dibayarkan pertama kali oleh anggota koperasi dan hanya sekali saja', '01'),
(138, 'Simpanan Wajib', 'AGT028', '2022-12-28', 400000, 'Simpanan Wajib yang dibayarkan oleh anggota setiap bulannya', '01');

--
-- Triggers `simpanan`
--
DELIMITER $$
CREATE TRIGGER `delete_simpanan` AFTER DELETE ON `simpanan` FOR EACH ROW UPDATE anggota set besar_simpanan=besar_simpanan-old.besar_simpanan WHERE id_anggota=old.id_anggota
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `update_anggota_simpanan` AFTER INSERT ON `simpanan` FOR EACH ROW BEGIN
    UPDATE anggota
    SET besar_simpanan = besar_simpanan + NEW.besar_simpanan
    WHERE id_anggota = NEW.id_anggota;
END
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
-- AUTO_INCREMENT for table `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `k_pinjaman`
--
ALTER TABLE `k_pinjaman`
  MODIFY `id_k_pinjaman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `k_simpanan`
--
ALTER TABLE `k_simpanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `simpanan`
--
ALTER TABLE `simpanan`
  MODIFY `id_simpanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=140;

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
