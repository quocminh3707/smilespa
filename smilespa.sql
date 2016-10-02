-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 02, 2016 at 06:58 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `smilespa`
--

-- --------------------------------------------------------

--
-- Table structure for table `dichvu`
--

CREATE TABLE `dichvu` (
  `id` int(11) NOT NULL,
  `MaDichVu` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `TenDichVu` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `TinhTrang` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `MaCoSo` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `DonGia` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `dichvu`
--

INSERT INTO `dichvu` (`id`, `MaDichVu`, `TenDichVu`, `TinhTrang`, `MaCoSo`, `DonGia`, `created_at`, `updated_at`) VALUES
(29, 'TL 01', 'Nách', '1', 'CS1', 990000, '2016-09-30 05:51:17', '2016-10-01 06:31:18'),
(30, 'TL 02', 'Mép', '0', 'CS1', 699000, '2016-10-01 05:30:10', '2016-10-01 05:30:10'),
(32, 'TL 03', 'Cằm', '0', 'CS1', 790000, '2016-10-01 06:31:42', '2016-10-01 06:31:42'),
(33, 'TL 04', 'Nửa 2 tay', '0', 'CS1', 2100000, '2016-10-01 06:31:59', '2016-10-01 06:31:59');

-- --------------------------------------------------------

--
-- Table structure for table `khachhang`
--

CREATE TABLE `khachhang` (
  `id` int(11) NOT NULL,
  `Ho` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Ten` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Sdt` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `DiaChi` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `CoSo_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `DichVu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `khachhang`
--

INSERT INTO `khachhang` (`id`, `Ho`, `Ten`, `Sdt`, `Email`, `DiaChi`, `CoSo_id`, `created_at`, `updated_at`, `DichVu_id`) VALUES
(7, 'Lê Như Quốc', 'Minh', '01225696783', 'quocminh3707@gmail.com', '16 Kiet 57 Hai Ba Trung', 0, '2016-10-01 06:46:49', '2016-10-01 06:46:49', 0),
(9, 'Trần Mạnh', 'Dũng', '01225696783', 'quocminh3707@gmail.com', '16 Kiet 57 Hai Ba Trung', 0, '2016-10-01 07:06:23', '2016-10-01 07:06:23', 0),
(10, 'Nguyễn Thị', 'Huyền', '01225696783', 'quocminh3707@gmail.com', '16 Kiet 57 Hai Ba Trung', 0, '2016-10-01 07:06:48', '2016-10-01 07:17:47', 0),
(11, 'Lê My', 'Thảo', '01225696783', 'quocminh3707@gmail.com', '16 Kiet 57 Hai Ba Trung', 0, '2016-10-01 07:07:19', '2016-10-01 07:17:35', 0);

-- --------------------------------------------------------

--
-- Table structure for table `khuyenmai`
--

CREATE TABLE `khuyenmai` (
  `id` int(11) NOT NULL,
  `MaKM` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `TenKM` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `SoTien` int(11) NOT NULL,
  `PhanTram` int(11) NOT NULL,
  `LoaiKM` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `CoSo_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mypham`
--

CREATE TABLE `mypham` (
  `id` int(11) NOT NULL,
  `MaMP` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `TenMP` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `CoSo_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Soluong` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `mypham`
--

INSERT INTO `mypham` (`id`, `MaMP`, `TenMP`, `CoSo_id`, `Soluong`, `created_at`, `updated_at`) VALUES
(8, 'K 011', 'Kem 1', '', 20, '2016-10-01 07:53:46', '2016-10-01 08:05:24'),
(9, 'DY', 'Dịch yến', '0', 100, '2016-10-01 08:06:01', '2016-10-01 08:06:01');

-- --------------------------------------------------------

--
-- Table structure for table `nhapkhomp`
--

CREATE TABLE `nhapkhomp` (
  `id` int(11) NOT NULL,
  `NoiDung` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `CoSo_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `User_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dichvu`
--
ALTER TABLE `dichvu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `khuyenmai`
--
ALTER TABLE `khuyenmai`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mypham`
--
ALTER TABLE `mypham`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nhapkhomp`
--
ALTER TABLE `nhapkhomp`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dichvu`
--
ALTER TABLE `dichvu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT for table `khachhang`
--
ALTER TABLE `khachhang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `khuyenmai`
--
ALTER TABLE `khuyenmai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `mypham`
--
ALTER TABLE `mypham`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `nhapkhomp`
--
ALTER TABLE `nhapkhomp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
