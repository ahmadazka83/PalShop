-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 08, 2024 at 07:48 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `toko_online`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `ID` int(10) NOT NULL,
  `KodeBarang` varchar(10) NOT NULL,
  `NamaBarang` varchar(20) NOT NULL,
  `Kategori` varchar(30) NOT NULL,
  `Harga` varchar(30) NOT NULL,
  `GambarBarang` varchar(50) NOT NULL,
  `Deskripsi` varchar(500) NOT NULL,
  `Keranjang` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`ID`, `KodeBarang`, `NamaBarang`, `Kategori`, `Harga`, `GambarBarang`, `Deskripsi`, `Keranjang`) VALUES
(1, 'B001', 'Gambus', 'Alat Musik', 'Rp1.828.000,00', 'Terupload/images11.png', 'Gambus merupakan alat musik dengan senar yang bentuknya mirip seperti mandolin dan gitar. Bedanya, lubang pada gambus ditutupi menggunakan kulit kambing atau kulit ikan pari. Senar gambus memiliki banyak variasi, mulai dari dua senar hingga 12 senar dengan setiap senar dapat berupa senar tunggal maupun senar ganda.', ''),
(2, 'B002', 'Aesan Gede', 'Pakaian', 'Rp1.086.000,00', 'Terupload/images12.jpg', 'Busana Aesan Gede Songket Melayu Palembang. Aesan gede adalah salah satu Busana tradisional Melayu Palembang, berasal dari Sumatra Selatan. Aesan berarti perhiasan, sementara gede bermakna nenek atau leluhur.', ''),
(3, 'B003', 'Kain Tenun Songket', 'Kerajinan Tangan', 'Rp1.620.000,00', 'Terupload/images13.jpeg', 'Kain songket adalah bahan tenunan tradisional yang memerlukan benang emas asli. Biasanya digunakan sebagai pakaian oleh keluarga kerajaan seperti sultan,', ''),
(4, 'B004', 'Tanjak', 'Pakaian', 'Rp50.000,00', 'Terupload/images14.jpg', 'Tengkolok, atau yang disebut juga sebagai Tanjak, serta dikenali pula dengan nama Destar, dan Lacak merupakan sebuah penutup kepala tradisional yang biasanya dikenakan oleh etnis Melayu dan Indonesia. Biasanya, tengkolok digunakan oleh kaum laki-lakii.', ''),
(5, 'B005', 'Miniatur Rumah Limas', 'Kerajinan Tangan', 'Rp225.000,00', 'Terupload/images15.jpg', 'Rumah Limas adalah rumah tradisional berbentuk limas yang dibuat dengan gaya panggung. Bangunan khas daerah Palembang ini dibangun bertingkat. Kumpulan tingkat-tingkatnya disebut masyarakat sebagai Bengkalis yang memiliki makna tersendiri. ', ''),
(6, 'B006', 'Tenun', 'Alat Musik', 'Rp65.000,00', 'Terupload/images16.jpg', 'Kain tenun biasanya terbuat dari serat kayu, kapas, sutra, dan lainnya.', ''),
(7, 'B007', 'Dompet Serbaguna', 'Aksesoris', 'Rp35.000,00', 'Terupload/images17.jpg', ' tersedia berbagai macam koleksi Dompet Serbaguna dari model wanita terkini dan desain terbaru hingga material bahan yang nyaman dan berkualitas', ''),
(8, 'B008', 'Baju Jumputan', 'Pakaian', 'Rp700.000,00', 'Terupload/images18.jpeg', 'Kain jumputan adalah salah satu kain tradisional khas Palembang yang dibuat dengan proses penjumputan. Melalui tahapan proses yang rumit sehingga memakan waktu pembuatan sekitar 1 minggu hingga 1 bulan lamanya.', ''),
(9, 'B009', 'Gendik', 'Aksesoris', 'Rp35.000,00', 'Terupload/images19.jpeg', 'Ikat kepala/mahkota/gendik adat Sumatera Selatan sebagai aksesoris Tarian Palembang untuk anak-anak.', '');

-- --------------------------------------------------------

--
-- Table structure for table `pesanan`
--

CREATE TABLE `pesanan` (
  `id` int(11) NOT NULL,
  `id_barang` int(11) DEFAULT NULL,
  `nama_pengirim` varchar(255) DEFAULT NULL,
  `alamat_pengiriman` varchar(255) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `keterangan` text DEFAULT NULL,
  `bukti_pembayaran` varchar(255) DEFAULT NULL,
  `status` varchar(50) DEFAULT 'Menunggu Konfirmasi',
  `tanggal_pesan` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `ID` int(10) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `level` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `file_path` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`ID`, `username`, `password`, `level`, `email`, `file_path`) VALUES
(1, 'user', 'user', 'user', 'userr@gmail.com', 'Terupload/images1.jpeg'),
(2, 'NajamHabibi', 'Najam455', 'admin', 'Orang@gmail.com', 'Terupload/images8.jpg'),
(3, 'tes', 'tes', 'admin', 'tes@gmail.com', 'Terupload/images3.jpeg'),
(4, 'Azka', 'Azka', 'user', 'gamerazka699@gmail.com', 'Terupload/images10.jpg'),
(5, 'LilySäkkinen', 'Lily123', 'admin', 'akunnyabuzzer@gmail.com', 'Terupload/images4.jpeg'),
(7, 'Ahmadazka', 'azka2004', 'admin', 'gamerazka699@gmail.com', 'Terupload/images9.jpg'),
(8, 'admin', 'admin', 'admin', 'admin@Gmail.com', 'Terupload/images6.jpg'),
(9, 'daftarwithgmail', 'daftarwithgmail', 'user', 'akunnyabuzzer@gmail.com', 'Terupload/images7.jpg'),
(10, 'PenggunaBaru', 'PenggunaBaru', 'user', 'PenggunaBaru@gmail.com', 'Terupload/default.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_barang` (`id_barang`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD CONSTRAINT `pesanan_ibfk_1` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
