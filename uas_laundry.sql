-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 23, 2026 at 08:03 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `uas_laundry`
--

-- --------------------------------------------------------

--
-- Table structure for table `layanan`
--

CREATE TABLE `layanan` (
  `id_layanan` int(11) NOT NULL,
  `nama_layanan` varchar(100) NOT NULL,
  `harga_per_kg` decimal(10,2) NOT NULL,
  `estimasi_hari` int(11) NOT NULL DEFAULT 2,
  `keterangan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `layanan`
--

INSERT INTO `layanan` (`id_layanan`, `nama_layanan`, `harga_per_kg`, `estimasi_hari`, `keterangan`) VALUES
(1, 'Cuci & Lipat', 7000.00, 2, 'Cuci bersih dan dilipat rapi'),
(2, 'Cuci & Setrika', 10000.00, 3, 'Cuci bersih dan disetrika'),
(3, 'Cuci Kering', 8000.00, 2, 'Cuci dan dikeringkan saja'),
(4, 'Setrika Saja', 5000.00, 1, 'Hanya layanan setrika'),
(5, 'Express (1 Hari)', 15000.00, 1, 'Layanan kilat selesai 1 hari');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `nama_pelanggan` varchar(100) NOT NULL,
  `telepon` varchar(20) NOT NULL,
  `alamat` text DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `nama_pelanggan`, `telepon`, `alamat`, `email`, `username`, `password`, `created_at`) VALUES
(1, 'Budi Santoso', '081234567890', 'Jl. Merdeka No. 10, Mataram', 'budi@email.com', NULL, NULL, '2026-06-22 18:09:47'),
(2, 'Siti Rahayu', '082345678901', 'Jl. Hasanuddin No. 5, Mataram', 'siti@email.com', NULL, NULL, '2026-06-22 18:09:47'),
(3, 'Ahmad Fauzi', '083456789012', 'Jl. Sriwijaya No. 22, Mataram', NULL, NULL, NULL, '2026-06-22 18:09:47'),
(4, 'Habib', '0828236374', 'Kekalik', 'habib@gmail.com', NULL, NULL, '2026-06-22 18:22:36'),
(5, 'Amril', '081918376914', 'Malah', 'amril@gmail.com', 'Mhmmdzrkniamril', '$2y$10$sPT/6ezbzKgo3wqBWUNFTejp.BibUrqUPDcMLlgFrKiBZWf6pz8Z6', '2026-06-22 13:33:16'),
(6, 'robi', '0828236374', 'kekalik', 'arabi@gmail.com', 'arabi', '$2y$10$TXqrM/OcAwvxrkbApG0R/eJn7XiKfkGWEMhvYySVpgQcpEJl9gvXu', '2026-06-22 13:34:29'),
(7, 'ucup', '09843084', 'sakra', 'ucup@gmail.com', 'ucup', '$2y$10$SAkFnzBbOGPGmGJAvPYbGeHP1JaHFEncyLxAniMl.0XUwGmTqfIgO', '2026-06-23 03:26:02');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `kode_transaksi` varchar(20) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `id_layanan` int(11) NOT NULL,
  `berat_kg` decimal(10,2) NOT NULL,
  `total_harga` decimal(12,2) NOT NULL,
  `tanggal_masuk` date NOT NULL,
  `tanggal_selesai` date NOT NULL,
  `status` enum('Diterima','Diproses','Selesai','Diambil') NOT NULL DEFAULT 'Diterima',
  `catatan` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `kode_transaksi`, `id_pelanggan`, `id_layanan`, `berat_kg`, `total_harga`, `tanggal_masuk`, `tanggal_selesai`, `status`, `catatan`, `created_at`) VALUES
(1, 'TRX-001', 1, 1, 3.50, 24500.00, '2026-06-23', '2026-06-25', 'Diproses', 'Pakaian biasa', '2026-06-22 18:09:47'),
(2, 'TRX-002', 2, 2, 2.00, 20000.00, '2026-06-23', '2026-06-26', 'Diterima', NULL, '2026-06-22 18:09:47'),
(3, 'TRX-003', 3, 5, 1.50, 22500.00, '2026-06-23', '2026-06-24', 'Selesai', 'Express', '2026-06-22 18:09:47'),
(4, 'TRX-004', 4, 1, 2.00, 14000.00, '2026-06-22', '2026-06-24', 'Diambil', '', '2026-06-22 18:23:19'),
(5, 'TRX-005', 5, 1, 3.00, 21000.00, '2026-06-22', '2026-06-24', 'Selesai', '', '2026-06-22 19:55:17'),
(6, 'TRX-006', 7, 5, 5.00, 75000.00, '2026-06-23', '2026-06-24', 'Diproses', '', '2026-06-23 09:27:10');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `role` enum('admin','kasir') NOT NULL DEFAULT 'kasir',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `username`, `password`, `nama_lengkap`, `role`, `created_at`) VALUES
(1, 'admin', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Administrator', 'admin', '2026-06-22 18:09:46'),
(2, 'kasir', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Kasir Utama', 'kasir', '2026-06-22 18:09:46');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `layanan`
--
ALTER TABLE `layanan`
  ADD PRIMARY KEY (`id_layanan`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD UNIQUE KEY `kode_transaksi` (`kode_transaksi`),
  ADD KEY `id_pelanggan` (`id_pelanggan`),
  ADD KEY `id_layanan` (`id_layanan`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `layanan`
--
ALTER TABLE `layanan`
  MODIFY `id_layanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`id_pelanggan`) REFERENCES `pelanggan` (`id_pelanggan`) ON DELETE CASCADE,
  ADD CONSTRAINT `transaksi_ibfk_2` FOREIGN KEY (`id_layanan`) REFERENCES `layanan` (`id_layanan`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
