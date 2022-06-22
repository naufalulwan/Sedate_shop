-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: sql310.epizy.com
-- Generation Time: Jul 23, 2021 at 05:27 AM
-- Server version: 5.7.34-37
-- PHP Version: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `epiz_28970024_toko`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_nama` varchar(100) NOT NULL,
  `admin_username` varchar(100) NOT NULL,
  `admin_password` varchar(100) NOT NULL,
  `admin_foto` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_nama`, `admin_username`, `admin_password`, `admin_foto`) VALUES
(1, 'Naufal Ulwan', 'admin', '5b94a3900bb9f2b3cde46e805cf88484', '615466729_user.png');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(11) NOT NULL,
  `customer_nama` varchar(255) NOT NULL,
  `customer_email` varchar(255) NOT NULL,
  `customer_hp` varchar(20) NOT NULL,
  `customer_alamat` text NOT NULL,
  `customer_password` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `customer_nama`, `customer_email`, `customer_hp`, `customer_alamat`, `customer_password`) VALUES
(9, 'Naufal Ulwan', 'naufalulwan63@gmail.com', '082124293938', 'Jl.Puskesmas No.170 Rt 04/RW.10 Kranji, Bekasi Barat', '6fd030d8bb16900543ce139f4532a7b9'),
(10, 'kun', 'kuntul@gmail.com', '081234567890', 'Masa Lalu, Bojong Gede', '24ae846f1d430926f0d704ce32c34d5b');

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `invoice_id` int(11) NOT NULL,
  `invoice_tanggal` date NOT NULL,
  `invoice_customer` int(11) NOT NULL,
  `invoice_nama` varchar(255) NOT NULL,
  `invoice_hp` varchar(255) NOT NULL,
  `invoice_alamat` text NOT NULL,
  `invoice_provinsi` varchar(255) NOT NULL,
  `invoice_kabupaten` varchar(255) NOT NULL,
  `invoice_kurir` varchar(255) NOT NULL,
  `invoice_berat` int(11) NOT NULL,
  `invoice_ongkir` int(11) NOT NULL,
  `invoice_total_bayar` int(11) NOT NULL,
  `invoice_status` int(11) NOT NULL,
  `invoice_resi` varchar(255) NOT NULL,
  `invoice_bukti` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`invoice_id`, `invoice_tanggal`, `invoice_customer`, `invoice_nama`, `invoice_hp`, `invoice_alamat`, `invoice_provinsi`, `invoice_kabupaten`, `invoice_kurir`, `invoice_berat`, `invoice_ongkir`, `invoice_total_bayar`, `invoice_status`, `invoice_resi`, `invoice_bukti`) VALUES
(11, '2021-06-26', 9, 'Naufal Ulwan', '082124293938', 'Jl.Puskesmas No.170 RT04 RW10 Kranji, Bekasi Barat', 'Jawa Barat', 'Bekasi', 'JNE - REG', 20, 9000, 250009000, 5, '', '727837627.jpg'),
(12, '2021-06-26', 9, 'Naufal Ulwan', '082124293938', 'Jl Puskesmas No.170 RT04/RW10 Kranji, Bekasi Barat', 'Jawa Barat', 'Bekasi', 'JNE - REG', 45, 9000, 650009000, 3, '', ''),
(13, '2021-06-26', 9, 'Naufal Ulwan', '082124293938', 'Jl.Puskesmas', 'Jawa Barat', 'Bekasi', 'JNE - OKE', 45, 8000, 650008000, 3, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `kategori_id` int(11) NOT NULL,
  `kategori_nama` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`kategori_id`, `kategori_nama`) VALUES
(1, 'Tidak Berkategori'),
(3, 'Baju'),
(10, 'Jaket');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `produk_id` int(11) NOT NULL,
  `produk_nama` varchar(255) NOT NULL,
  `produk_kategori` int(11) NOT NULL,
  `produk_harga` int(11) NOT NULL,
  `produk_keterangan` text NOT NULL,
  `produk_jumlah` int(11) NOT NULL,
  `produk_berat` int(11) NOT NULL,
  `produk_foto1` varchar(255) DEFAULT NULL,
  `produk_foto2` varchar(255) DEFAULT NULL,
  `produk_foto3` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`produk_id`, `produk_nama`, `produk_kategori`, `produk_harga`, `produk_keterangan`, `produk_jumlah`, `produk_berat`, `produk_foto1`, `produk_foto2`, `produk_foto3`) VALUES
(14, 'Baju polos bahan halus', 3, 25000, '<p></p><blockquote><p><br></p><p></p><p>Kaos premium berbahan adem, enak digunakan setiap hari dan anti luntur.</p><p></p><p></p><ul><li>Kaos standard internasional</li><li>100% Cotton</li><li>Premium Handfeel</li><li>Made in Indonesia</li></ul><p></p></blockquote><p></p>', 2, 20, '1201942315_baju polos navy.jpeg', '1201942315_baju polos grey.jpeg', '1201942315_baju polos black.jpeg'),
(15, 'Hoodie Zipper  Abu Misty ', 10, 65000, '<p>\r\n\r\n</p><h5>aket Sweater Polos Hoodie Zipper Abu Misty</h5><div><div><p>sweater bertopi tanpa sleting depan (zipper). Terdapat kantong didepan yang besar dan tembus serta di variasikan dengan ribs dibagian tangan dan pinggang. Memberikan kesan kasual dan sporty sehingga tepat digunakan untuk keseharian, saat jalan santai, bersepada, berkendara, maupun acara semi formal.<br><br>Hoodie Jumper berbahan double-face fleece bergramasi tebal 280 dengan campuran polyester berkualitas tinggi.<br><br>Adapun Karakteristik Sweater Hoodie Kepomp adalah :<br>* Lembut, hangat, dan nyaman<br>* Stabilitas warna stabil, tidak luntur saat dicuci<br>* Sambungan kuat dan rapi antara badan dan lengan<br>* Rib elastis di lengan dan pinggang<br>* Saku kantung depan tembus dari kanan ke kiri<br>* Tidak meninggalkan bulu di baju Anda<br>* Hoodie/ kupluk dilengkapi dengan tali katun model pipih atau bulat tergantung stok produksi<br>* Model Hoodie jumper unisex (Bisa untuk perempuan dan Laki-Laki)<br><br><br>Ukuran Jumper Hoodie (Lingkar dada (LD) dikalikan dua x Panjang)<br><br>S : Ld 52 x panjang 65<br>M : Ld 55 x panjang 68<br>L : Ld 57 x panjang 71<br>XL : Ld 59 x panjang 75<br>XXL : Ld 62 x panjang 78<br>XXXL : Ld 64 x panjang 80<br>4XL : Ld 66 x panjang 82<br>5XL : Ld 68 x panjang 84<br>6XL : Ld 70 x panjang 86<br>7XL : Ld 72 x panjang 88<br><br><br>Noted:<br>*Akan terjadi perbedaan 1-2cm pada size chart karena proses pengerjaan produksi massal</p></div></div>\r\n\r\n<br><p></p>', 3, 45, '1544884264_data.jpeg', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `transaksi_id` int(11) NOT NULL,
  `transaksi_invoice` int(11) NOT NULL,
  `transaksi_produk` int(11) NOT NULL,
  `transaksi_jumlah` int(11) NOT NULL,
  `transaksi_harga` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`transaksi_id`, `transaksi_invoice`, `transaksi_produk`, `transaksi_jumlah`, `transaksi_harga`) VALUES
(22, 11, 14, 1, 25000),
(23, 12, 15, 1, 65000),
(24, 13, 15, 1, 65000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`invoice_id`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`kategori_id`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`produk_id`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`transaksi_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `invoice_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `kategori_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `produk_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `transaksi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
