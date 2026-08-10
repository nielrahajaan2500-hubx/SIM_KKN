-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 10, 2026 at 04:36 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kkn`
--

-- --------------------------------------------------------

--
-- Table structure for table `dokumentasi`
--

CREATE TABLE `dokumentasi` (
  `id` int(11) NOT NULL,
  `id_laporan` int(11) NOT NULL,
  `nama_file` varchar(255) NOT NULL,
  `keterangan` varchar(200) DEFAULT NULL,
  `uploaded_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dosen`
--

CREATE TABLE `dosen` (
  `id` int(11) NOT NULL,
  `nidn` varchar(20) NOT NULL,
  `nama_dosen` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dosen`
--

INSERT INTO `dosen` (`id`, `nidn`, `nama_dosen`) VALUES
(1, '07301092003', 'Aldea Noor Alina, ST., MT.'),
(2, '0708099102', 'Melisa Amalia Mahardianti, ST., MT.'),
(3, '0706026301', 'Dr. Eny Haryati, M.Si'),
(4, '0705086101', 'Dr. Ulul Albab, MS'),
(5, '0712067201', 'Lambang Probo Sumirat, S.Kom, M.Kom'),
(6, '0715048902', 'Ratna Nur Tiara Shanty, S.ST, M.Kom'),
(7, '07180483012', 'Cempaka Ananggadipa Swastyastu, S.Kom, MT'),
(8, '0728057202', 'Edi Prihartono, S.Kom, MT'),
(9, '0718086001', 'Ir. K. Budi Hastono, S.T., MT'),
(10, '0731077203', 'Wisnu Abiarto N, S.T., M.MT'),
(12, '12345', 'tst tmbh dsn edit'),
(13, '12345678', 'tambahdosenedit'),
(14, '323421', 'dosen12');

-- --------------------------------------------------------

--
-- Table structure for table `kelompok`
--

CREATE TABLE `kelompok` (
  `id` int(11) NOT NULL,
  `nama_kelompok` varchar(50) NOT NULL,
  `id_lokasi` int(11) DEFAULT NULL,
  `id_dpl` int(11) DEFAULT NULL,
  `catatan_dpl` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kelompok`
--

INSERT INTO `kelompok` (`id`, `nama_kelompok`, `id_lokasi`, `id_dpl`, `catatan_dpl`) VALUES
(19, 'desma kelompok', 2, 1, ''),
(20, 'kelompok testedittst2', 6, 13, ''),
(21, 'klmpk tst 3', 10, 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `laporan`
--

CREATE TABLE `laporan` (
  `id` int(11) NOT NULL,
  `id_proker` int(11) NOT NULL,
  `judul_laporan` varchar(200) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `file_laporan` varchar(255) DEFAULT NULL,
  `tanggal_upload` datetime DEFAULT current_timestamp(),
  `status` enum('Menunggu','Disetujui','Revisi') DEFAULT 'Menunggu',
  `catatan_dpl` text DEFAULT NULL,
  `uploaded_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `laporan`
--

INSERT INTO `laporan` (`id`, `id_proker`, `judul_laporan`, `deskripsi`, `foto`, `file_laporan`, `tanggal_upload`, `status`, `catatan_dpl`, `uploaded_by`) VALUES
(6, 6, 'balpa karung', 'xajgfcabcgweiu', '1785746546_8e996527517123ab5709.png', '1785746546_726daca64e189d25b0c0.docx', '2026-08-03 08:42:26', NULL, 'perbaiki', 23),
(7, 7, 'lpj lomba 2', 'werwef', '1785989646_8bb9685bce5d6c053102.png', '1785989646_3446deaf92934d22e59f.docx', '2026-08-06 04:14:06', 'Menunggu', '', 22),
(8, 8, 'sussusu', 'josjos', '1786213022_8262cb9093309e208133.png', '1786213022_35a17a0baf163502e43a.docx', '2026-08-08 18:17:02', 'Menunggu', '', 23),
(9, 8, 'lpj', 'jadi', '1786213071_54c1a6533b39fdbbda68.png', '1786213071_aad4048167843458c1de.docx', '2026-08-08 18:17:51', 'Disetujui', '', 23);

-- --------------------------------------------------------

--
-- Table structure for table `lokasi`
--

CREATE TABLE `lokasi` (
  `id` int(11) NOT NULL,
  `kecamatan` varchar(100) DEFAULT NULL,
  `kabupaten` varchar(100) DEFAULT NULL,
  `desa` varchar(100) DEFAULT NULL,
  `dusun` varchar(100) DEFAULT NULL,
  `kuota` int(11) NOT NULL DEFAULT 20,
  `status` varchar(20) NOT NULL DEFAULT 'Aktif'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lokasi`
--

INSERT INTO `lokasi` (`id`, `kecamatan`, `kabupaten`, `desa`, `dusun`, `kuota`, `status`) VALUES
(1, 'Menganti', 'Gresik', 'GEMPOL KURUNG', 'Dusun GEMPOL KURUNG', 20, 'Aktif'),
(2, 'Menganti', 'Gresik', 'BANYU URIP', 'Dusun BANYU URIP', 20, 'Aktif'),
(3, 'Menganti', 'Gresik', 'NGABLAKREJO', 'Dusun NGABLAKREJO', 20, 'Aktif'),
(4, 'Menganti', 'Gresik', 'KUTIL', 'Dusun KUTIL', 20, 'Aktif'),
(5, 'Menganti', 'Gresik', 'WRINGIN KURUNG ', 'Dusun WRINGIN KURUNG', 20, 'Aktif'),
(6, 'test lokasi', 'testlokasi', 'testlokasi', 'xscacs', 14, 'Non Aktif'),
(8, 'teskec', 'testkab', 'testdes', 'testdu', 25, 'Non Aktif'),
(9, 'testlokasi', 'tetslokasi', 'testlokasi', 'testlokasi', 10, 'Aktif'),
(10, 'pare', 'kediri', 'jeman', 'jeman kulloa', 2, 'Aktif');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id` int(11) NOT NULL,
  `nim` varchar(20) NOT NULL,
  `nama_mahasiswa` varchar(100) NOT NULL,
  `prodi` varchar(50) DEFAULT NULL,
  `id_kelompok` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`id`, `nim`, `nama_mahasiswa`, `prodi`, `id_kelompok`) VALUES
(2, '202211520053', 'Siti Aminah', 'Manajemen', 1),
(3, '202211320007', 'krisna satulete', 'Teknik Sipil', 3),
(4, '202211220030', 'jakaria samudra', 'Teknik Geomatika', 3),
(5, '202211320073', 'moch thoriq', 'Teknik Sipil', 1),
(6, '202211420009', 'Achmad Hadi Wijaya', 'Teknik Informatika', 3),
(8, '202211420038', 'Ahmad Danial', 'Teknik Informatika', 3),
(10, '202311420016', 'Mochamad Desma Nastiar', 'Teknik Informatika', 19),
(11, '202311420024', 'Mochamad Alridho Hidayatullah', 'Teknik Informatika', 21),
(14, '202211420052', 'Robby Abraar Adyatma', 'Teknik Informatika', 3),
(15, '202211320007', 'Mochammad Imam Bacharudin', 'Teknik Sipil', NULL),
(16, '202211320041', 'Mochammad Marzuki Sontoloyo', 'Teknik Sipil', NULL),
(20, '202211320053', 'Angel Blackcoffe', 'Teknik Sipil', NULL),
(21, '202211320007', 'Amdi Matchalatte', 'Teknik Sipil', NULL),
(22, '202211220001', 'Susi Angelita', 'Manajemen', 21),
(23, '202211220002', 'Agus Bacharuddin', 'Manajemen', 19),
(24, '202211220003', 'Topo Inthebadguy', 'Manajemen', 16),
(25, '202211220004', 'Brata Subrata', 'Manajemen', NULL),
(26, '202211220005', 'Mahardika Amir', 'Manajemen', 21),
(27, '202211220006', 'akmal thegalonman', 'Manajemen', 21),
(28, '202211220007', 'Hafiz Brotherakmal', 'Manajemen', NULL),
(29, '202211220008', 'Fira Thongji', 'Manajemen', NULL),
(32, '000089', 'test1', 'Manajemen', 1),
(33, '1234', 'test2', 'Manajemen', 3),
(35, '202311420015', 'Danielwr', 'Teknik Informatika', 18),
(36, '123142109492031', 'sagu', 'Manajemen', 19),
(38, 'test tmbh mhs edit', '123', 'Manajemen', 17),
(39, '12345678', 'tambahtest1', 'Teknik Informatika', 20);

-- --------------------------------------------------------

--
-- Table structure for table `proker`
--

CREATE TABLE `proker` (
  `id` int(11) NOT NULL,
  `id_kelompok` int(11) NOT NULL,
  `judul_proker` varchar(200) NOT NULL,
  `bidang` varchar(100) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `tanggal_mulai` date DEFAULT NULL,
  `tanggal_selesai` date DEFAULT NULL,
  `status` enum('Menunggu','Disetujui','Ditolak') DEFAULT 'Menunggu',
  `catatan_dpl` text DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `proker`
--

INSERT INTO `proker` (`id`, `id_kelompok`, `judul_proker`, `bidang`, `deskripsi`, `tanggal_mulai`, `tanggal_selesai`, `status`, `catatan_dpl`, `created_by`, `created_at`, `updated_at`) VALUES
(6, 19, 'lomba balap karung ngak ngpake karu', 'lomba balap', 'scavawvf test', '2026-08-23', '2026-08-20', 'Disetujui', '', 23, '2026-08-03 08:17:58', '2026-08-05 06:04:39'),
(7, 21, 'lomba balap karung 2', 'lomba', 'lomba', '2026-08-09', '2026-08-11', 'Ditolak', '', 22, '2026-08-06 04:13:10', '2026-08-06 04:16:44'),
(8, 19, 'donor darah', 'kesehatan', 'masyarakar...', '2026-08-06', '2026-08-27', 'Menunggu', '', 23, '2026-08-08 18:09:06', '2026-08-08 18:09:06'),
(9, 19, 'balap liar', 'olahraga', 'yang ikut nenek - nenek', '2026-08-05', '2026-08-09', 'Disetujui', '', 23, '2026-08-08 18:12:15', '2026-08-08 18:25:36');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','dosen','mahasiswa') NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama`, `username`, `password`, `role`, `created_at`, `updated_at`) VALUES
(1, 'Administrator', 'admin', 'admin123', 'admin', '2026-07-12 15:04:54', '2026-07-12 15:04:54'),
(2, 'Dosen Pembimbing', 'dosen', 'dosen123', 'dosen', '2026-07-12 15:04:54', '2026-07-12 15:04:54'),
(3, 'Mahasiswa KKN', 'mahasiswa', 'mhs123', 'mahasiswa', '2026-07-12 15:04:54', '2026-07-12 15:04:54');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dokumentasi`
--
ALTER TABLE `dokumentasi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_dokumentasi_laporan` (`id_laporan`);

--
-- Indexes for table `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kelompok`
--
ALTER TABLE `kelompok`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_lokasi` (`id_lokasi`),
  ADD KEY `id_dpl` (`id_dpl`);

--
-- Indexes for table `laporan`
--
ALTER TABLE `laporan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_laporan_proker` (`id_proker`),
  ADD KEY `fk_laporan_mahasiswa` (`uploaded_by`);

--
-- Indexes for table `lokasi`
--
ALTER TABLE `lokasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `proker`
--
ALTER TABLE `proker`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_proker_kelompok` (`id_kelompok`),
  ADD KEY `fk_proker_mahasiswa` (`created_by`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dokumentasi`
--
ALTER TABLE `dokumentasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dosen`
--
ALTER TABLE `dosen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `kelompok`
--
ALTER TABLE `kelompok`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `laporan`
--
ALTER TABLE `laporan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `lokasi`
--
ALTER TABLE `lokasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `proker`
--
ALTER TABLE `proker`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `dokumentasi`
--
ALTER TABLE `dokumentasi`
  ADD CONSTRAINT `fk_dokumentasi_laporan` FOREIGN KEY (`id_laporan`) REFERENCES `laporan` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `kelompok`
--
ALTER TABLE `kelompok`
  ADD CONSTRAINT `kelompok_ibfk_1` FOREIGN KEY (`id_lokasi`) REFERENCES `lokasi` (`id`),
  ADD CONSTRAINT `kelompok_ibfk_2` FOREIGN KEY (`id_dpl`) REFERENCES `dosen` (`id`);

--
-- Constraints for table `laporan`
--
ALTER TABLE `laporan`
  ADD CONSTRAINT `fk_laporan_mahasiswa` FOREIGN KEY (`uploaded_by`) REFERENCES `mahasiswa` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_laporan_proker` FOREIGN KEY (`id_proker`) REFERENCES `proker` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `proker`
--
ALTER TABLE `proker`
  ADD CONSTRAINT `fk_proker_kelompok` FOREIGN KEY (`id_kelompok`) REFERENCES `kelompok` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_proker_mahasiswa` FOREIGN KEY (`created_by`) REFERENCES `mahasiswa` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
