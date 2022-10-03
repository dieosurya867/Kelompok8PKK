-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Oct 03, 2022 at 06:44 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perpustakaan_kelompok8`
--

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `id_buku` int(11) NOT NULL,
  `penulis` varchar(50) NOT NULL,
  `tahun` year(4) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `kota` varchar(50) NOT NULL,
  `penerbit` varchar(50) NOT NULL,
  `cover` varchar(255) NOT NULL,
  `sinopsis` text NOT NULL,
  `stok` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`id_buku`, `penulis`, `tahun`, `judul`, `kota`, `penerbit`, `cover`, `sinopsis`, `stok`) VALUES
(1, 'Tere Liye ', 2000, 'Hujan', 'Jakarta', 'Gita Kartika', 'download.jpg', 'Menceritakan tentang bulan', 10),
(2, 'Tere Liye ', 2010, 'Matahari', 'Malang', 'gitaa2345', '1.jpg', 'Lorem ipsum dolor sit amet ', 2),
(3, 'Tere Liye ', 2011, 'Komet', 'Malang', 'gitaa2567', '1 (1).jpg', 'Lorem ipsum dolor sit amet ', 3),
(4, 'Tere Liye ', 2012, 'Pulang', 'Malang', 'gitaa2345', '106055_f.jpg', 'Lorem ipsum dolor sit amet ', 2),
(5, 'Tere Liye ', 2015, 'Kau dan Aku', 'Malang', 'gitaa234', 'kau-aku-dan-sepucuk-angpau-merah-new-cover-2018-tere-liye.jpg', 'Lorem ipsum dolor sit amet ', 3),
(6, 'Tere Liye ', 2018, 'Bumi', 'Malang', 'gitaa234', '9786020332956_Bumi-New-Cover.jpg', 'Lorem ipsum dolor sit amet ', 6),
(7, 'Tere Liye ', 2022, 'Si Anak Badai', 'Malang', 'gitaa2567', 'si-anak-badai-dpn-low-5dba8c38d541df530719ac92.jpg', 'Lorem ipsum dolor sit amet ', 8),
(8, 'Tere Liye ', 2022, 'Pergi', 'Malang', 'gitaa234', '14ce416308240e90767f9eed91930d1f2bc21207-1-5b784869bde5753b1a0246f2.jpg', 'Lorem ipsum dolor sit amet ', 143),
(9, 'Tere Liye ', 2055, 'Selena', 'Malang2', 'gitaa2567', '9786020639512_selena_cov.jpg', 'Lorem ipsum dolor sit amet ', 143),
(10, 'Tere Liye ', 2022, 'Nebula', 'Malang', 'gitaa234', '9786020639536_nebula_cov.jpg', 'Lorem ipsum dolor sit amet ', 143),
(11, 'Tere Liye ', 2021, 'Si Anak Pelangiii', 'Situbondo', 'gitaa0001', '117355_f.jpg', 'Lorem ipsum dolor sit amet ', 15);

-- --------------------------------------------------------

--
-- Table structure for table `detail_peminjaman`
--

CREATE TABLE `detail_peminjaman` (
  `id_detail_peminjaman` int(11) NOT NULL,
  `id_buku` int(11) NOT NULL,
  `id_peminjaman` int(11) NOT NULL,
  `kuantitas` int(2) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detail_peminjaman`
--

INSERT INTO `detail_peminjaman` (`id_detail_peminjaman`, `id_buku`, `id_peminjaman`, `kuantitas`, `status`) VALUES
(2220001, 2, 1110005, 2, 'dipinjam'),
(2220002, 6, 1110004, 1, 'dikembalikan'),
(2220003, 3, 1110003, 3, 'belumkembali'),
(2220004, 10, 1110002, 4, 'dikembalikan'),
(2220005, 9, 1110001, 8, 'dipinjam');

-- --------------------------------------------------------

--
-- Table structure for table `detail_pengembalian`
--

CREATE TABLE `detail_pengembalian` (
  `id_detail_pengembalian` int(11) NOT NULL,
  `id_pengembalian` int(11) NOT NULL,
  `ada` int(2) NOT NULL,
  `hilang` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` int(2) NOT NULL,
  `nama_kelas` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `nama_kelas`) VALUES
(1, 'MI-3A'),
(2, 'MI-3B'),
(3, 'MI-3C'),
(4, 'MI-3D'),
(5, 'MI-3E');

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id_peminjaman` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `id_petugas` int(11) NOT NULL,
  `tanggal_peminjaman` date NOT NULL,
  `tanggal_pengembalian` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `peminjaman`
--

INSERT INTO `peminjaman` (`id_peminjaman`, `id_siswa`, `id_petugas`, `tanggal_peminjaman`, `tanggal_pengembalian`) VALUES
(1110001, 1931710023, 12347, '2022-10-03', '2022-10-06'),
(1110002, 1931710027, 12349, '2022-10-03', '2022-10-04'),
(1110003, 1931710029, 12346, '2022-10-03', '2022-10-05'),
(1110004, 1931710045, 12348, '2022-10-03', '2022-10-17'),
(1110005, 1931710020, 12345, '2022-10-03', '2022-10-22');

-- --------------------------------------------------------

--
-- Table structure for table `pengembalian`
--

CREATE TABLE `pengembalian` (
  `id_pengembalian` int(11) NOT NULL,
  `id_peminjaman` int(11) NOT NULL,
  `tanggal_pengembalian` date NOT NULL,
  `denda` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `petugas`
--

CREATE TABLE `petugas` (
  `nip` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jenis_kelamin` enum('L','P','','') NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `petugas`
--

INSERT INTO `petugas` (`nip`, `nama`, `jenis_kelamin`, `alamat`, `password`) VALUES
(12345, 'Pak Budi', 'L', 'Jl. Jember', 'pakbudi123'),
(12346, 'Pak Ari', 'L', 'Jl. Banyuwangi No.60-66, Dam Saola, Desa Tegal Rejoo', 'pakari123'),
(12347, 'Bu Dewi', 'P', 'Lowokwaru, Malang', 'budewi123'),
(12348, 'Bu Sari', 'P', 'Jalan Ijen, Malang', 'busari123'),
(12349, 'Pak Rio', 'L', 'Jalan Mawar, Situbondo', 'pakrio123');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `nis` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `id_kelas` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`nis`, `nama`, `jenis_kelamin`, `alamat`, `id_kelas`) VALUES
(1931710020, 'Gita Kartika Pariwara', 'P', 'Malang', 1),
(1931710023, 'Nicholas Saputra ', 'L', 'Bali', 2),
(1931710027, 'Ariel Tatum', 'P', 'Jakarta', 3),
(1931710029, 'Reza Rahadian', 'L', 'Jakarta', 4),
(1931710045, 'Yuki Kato', 'P', 'Jepang', 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id_buku`);

--
-- Indexes for table `detail_peminjaman`
--
ALTER TABLE `detail_peminjaman`
  ADD PRIMARY KEY (`id_detail_peminjaman`),
  ADD KEY `idx_id_buku` (`id_buku`),
  ADD KEY `idx_id_peminjaman` (`id_peminjaman`);

--
-- Indexes for table `detail_pengembalian`
--
ALTER TABLE `detail_pengembalian`
  ADD PRIMARY KEY (`id_detail_pengembalian`),
  ADD KEY `idx_id_pengembalian` (`id_pengembalian`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indexes for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id_peminjaman`),
  ADD KEY `idx_siswa` (`id_siswa`),
  ADD KEY `idx_petugas` (`id_petugas`);

--
-- Indexes for table `pengembalian`
--
ALTER TABLE `pengembalian`
  ADD PRIMARY KEY (`id_pengembalian`),
  ADD KEY `idx_id_peminjaman` (`id_peminjaman`);

--
-- Indexes for table `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`nip`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`nis`),
  ADD KEY `idx_kelas` (`id_kelas`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `id_buku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `detail_peminjaman`
--
ALTER TABLE `detail_peminjaman`
  MODIFY `id_detail_peminjaman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2220006;

--
-- AUTO_INCREMENT for table `detail_pengembalian`
--
ALTER TABLE `detail_pengembalian`
  MODIFY `id_detail_pengembalian` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `id_peminjaman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1110007;

--
-- AUTO_INCREMENT for table `pengembalian`
--
ALTER TABLE `pengembalian`
  MODIFY `id_pengembalian` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `petugas`
--
ALTER TABLE `petugas`
  MODIFY `nip` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12350;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `nis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1931710047;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_peminjaman`
--
ALTER TABLE `detail_peminjaman`
  ADD CONSTRAINT `detail_peminjaman_ibfk_1` FOREIGN KEY (`id_buku`) REFERENCES `buku` (`id_buku`),
  ADD CONSTRAINT `detail_peminjaman_ibfk_2` FOREIGN KEY (`id_peminjaman`) REFERENCES `peminjaman` (`id_peminjaman`);

--
-- Constraints for table `detail_pengembalian`
--
ALTER TABLE `detail_pengembalian`
  ADD CONSTRAINT `detail_pengembalian_ibfk_1` FOREIGN KEY (`id_pengembalian`) REFERENCES `pengembalian` (`id_pengembalian`);

--
-- Constraints for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD CONSTRAINT `peminjaman_ibfk_1` FOREIGN KEY (`id_siswa`) REFERENCES `siswa` (`nis`),
  ADD CONSTRAINT `peminjaman_ibfk_2` FOREIGN KEY (`id_petugas`) REFERENCES `petugas` (`nip`);

--
-- Constraints for table `pengembalian`
--
ALTER TABLE `pengembalian`
  ADD CONSTRAINT `pengembalian_ibfk_1` FOREIGN KEY (`id_peminjaman`) REFERENCES `peminjaman` (`id_peminjaman`);

--
-- Constraints for table `siswa`
--
ALTER TABLE `siswa`
  ADD CONSTRAINT `siswa_ibfk_1` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
