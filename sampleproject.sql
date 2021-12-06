-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 06, 2021 at 04:06 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sampleproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `binh_luan`
--

DROP TABLE IF EXISTS `binh_luan`;
CREATE TABLE `binh_luan` (
  `ma_bl` int(11) NOT NULL,
  `noi_dung` varchar(255) NOT NULL,
  `ma_hh` int(11) NOT NULL,
  `ma_kh` varchar(20) NOT NULL,
  `ngay_bl` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `binh_luan`
--

INSERT INTO `binh_luan` (`ma_bl`, `noi_dung`, `ma_hh`, `ma_kh`, `ngay_bl`) VALUES
(23, 'Bình luận...', 43, 'kh01', '2021-12-06');

-- --------------------------------------------------------

--
-- Table structure for table `chi_tiet_don_hang`
--

DROP TABLE IF EXISTS `chi_tiet_don_hang`;
CREATE TABLE `chi_tiet_don_hang` (
  `ma_chi_tiet` int(11) NOT NULL,
  `ma_dh` int(11) NOT NULL,
  `ma_hh` int(11) NOT NULL,
  `so_luong` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `chi_tiet_don_hang`
--

INSERT INTO `chi_tiet_don_hang` (`ma_chi_tiet`, `ma_dh`, `ma_hh`, `so_luong`) VALUES
(15, 19, 43, 1);

-- --------------------------------------------------------

--
-- Table structure for table `don_hang`
--

DROP TABLE IF EXISTS `don_hang`;
CREATE TABLE `don_hang` (
  `ma_dh` int(11) NOT NULL,
  `ma_kh` varchar(20) NOT NULL,
  `ho_ten` varchar(50) NOT NULL,
  `tong_tien` float NOT NULL,
  `pttt` varchar(50) NOT NULL,
  `dia_chi` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `so_dien_thoai` varchar(11) NOT NULL,
  `ngay_tao` date NOT NULL,
  `trang_thai` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `don_hang`
--

INSERT INTO `don_hang` (`ma_dh`, `ma_kh`, `ho_ten`, `tong_tien`, `pttt`, `dia_chi`, `email`, `so_dien_thoai`, `ngay_tao`, `trang_thai`) VALUES
(19, 'kh01', 'abc', 270, '', '1/2/3', 'abc@gmail.com', '123', '2021-12-06', 'đang xử lý');

-- --------------------------------------------------------

--
-- Table structure for table `hang_hoa`
--

DROP TABLE IF EXISTS `hang_hoa`;
CREATE TABLE `hang_hoa` (
  `ma_hh` int(11) NOT NULL,
  `ten_hh` varchar(50) NOT NULL,
  `don_gia` float NOT NULL,
  `giam_gia` float NOT NULL,
  `hinh` varchar(50) NOT NULL,
  `ngay_nhap` date NOT NULL,
  `mo_ta` varchar(2000) NOT NULL,
  `dac_biet` bit(1) NOT NULL,
  `so_luot_xem` int(11) NOT NULL,
  `ma_loai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hang_hoa`
--

INSERT INTO `hang_hoa` (`ma_hh`, `ten_hh`, `don_gia`, `giam_gia`, `hinh`, `ngay_nhap`, `mo_ta`, `dac_biet`, `so_luot_xem`, `ma_loai`) VALUES
(41, 'dell-inspiron-15-3584', 500, 0, 'dell-inspiron-15-3584.png', '2021-10-19', 'abc', b'0', 1, 16),
(42, 'HP-Geek-Squad', 100, 0, 'HP-Geek-Squad.png', '2021-10-20', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris lorem dolor, suscipit id sem non, dignissim vehicula nisi. Maecenas vitae sapien sed metus auctor congue sed ut ligula.', b'0', 4, 16),
(43, 'HP Laptop', 300, 0.1, 'hp-laptop.png', '2021-10-20', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris lorem dolor, suscipit id sem non, dignissim vehicula nisi. Maecenas vitae sapien sed metus auctor congue sed ut ligula.', b'1', 2, 16),
(44, 'laptop-dell-xps', 450, 0.3, 'laptop-dell-xps.png', '2021-10-20', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris lorem dolor, suscipit id sem non, dignissim vehicula nisi. Maecenas vitae sapien sed metus auctor congue sed ut ligula.', b'0', 3, 16),
(45, '340s-i5-xam', 400, 0, '340s-i5-xam.png', '2021-10-20', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris lorem dolor, suscipit id sem non, dignissim vehicula nisi. Maecenas vitae sapien sed metus auctor congue sed ut ligula.', b'0', 7, 16),
(46, 'Oppo Reno 4', 230, 0, 'Oppo Reno 4.png', '2021-10-20', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris lorem dolor, suscipit id sem non, dignissim vehicula nisi. Maecenas vitae sapien sed metus auctor congue sed ut ligula.', b'0', 0, 14),
(47, 'Oppo-f11-5', 340, 0, 'Oppo-f11-5.png', '2021-10-20', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris lorem dolor, suscipit id sem non, dignissim vehicula nisi. Maecenas vitae sapien sed metus auctor congue sed ut ligula.', b'0', 0, 14),
(48, 'xiaomi-mi-11', 390, 0, 'xiaomi-mi-11.png', '2021-10-20', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris lorem dolor, suscipit id sem non, dignissim vehicula nisi. Maecenas vitae sapien sed metus auctor congue sed ut ligula.', b'0', 1, 14),
(49, 'Loa bluetooth i.value BT117 ', 100, 0.1, '636834206204347887_00529898-daidien.png', '2021-10-20', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris lorem dolor, suscipit id sem non, dignissim vehicula nisi. Maecenas vitae sapien sed metus auctor congue sed ut ligula.', b'1', 9, 15),
(50, 'Loa bluetooth i.value BT116', 270, 0, '636834203235587887_00529896-daidien.png', '2021-10-20', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris lorem dolor, suscipit id sem non, dignissim vehicula nisi. Maecenas vitae sapien sed metus auctor congue sed ut ligula.', b'1', 38, 15),
(51, 'Loa dàn 2.0 MICROLAB B18', 200, 0, '636991425591023481_b-16-bia.png', '2021-10-20', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris lorem dolor, suscipit id sem non, dignissim vehicula nisi. Maecenas vitae sapien sed metus auctor congue sed ut ligula.', b'1', 2, 15),
(52, 'Loa bluetooth i.value BS03', 300, 0, '637326578911409123_FRT05070.png', '2021-10-20', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris lorem dolor, suscipit id sem non, dignissim vehicula nisi. Maecenas vitae sapien sed metus auctor congue sed ut ligula.', b'1', 2, 15),
(53, 'Loa bluetooth i.value BS02', 200, 0, '637121967323659670_HASP-Loa-ivalue-00631105-1.png', '2021-10-20', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris lorem dolor, suscipit id sem non, dignissim vehicula nisi. Maecenas vitae sapien sed metus auctor congue sed ut ligula.', b'1', 5, 15);

-- --------------------------------------------------------

--
-- Table structure for table `khach_hang`
--

DROP TABLE IF EXISTS `khach_hang`;
CREATE TABLE `khach_hang` (
  `ma_kh` varchar(20) NOT NULL,
  `mat_khau` varchar(50) NOT NULL,
  `ho_ten` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `vai_tro` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `khach_hang`
--

INSERT INTO `khach_hang` (`ma_kh`, `mat_khau`, `ho_ten`, `email`, `vai_tro`) VALUES
('kh01', '123', 'khach hang', 'kh01@gmail.com', 'Khách hàng'),
('nv01', '1234', 'Nguyễn Chí Tèo', 'nv01@gmail.com', 'Khách hàng'),
('nv02', '123', 'Đào Thị Nở', 'nv02@gmail.com', 'Nhân viên');

-- --------------------------------------------------------

--
-- Table structure for table `loai`
--

DROP TABLE IF EXISTS `loai`;
CREATE TABLE `loai` (
  `ma_loai` int(11) NOT NULL,
  `ten_loai` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `loai`
--

INSERT INTO `loai` (`ma_loai`, `ten_loai`) VALUES
(14, 'Điện thoại'),
(15, 'Phụ kiện'),
(16, 'Máy tính xách tay');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `binh_luan`
--
ALTER TABLE `binh_luan`
  ADD PRIMARY KEY (`ma_bl`),
  ADD KEY `binh_luan_khach_hang` (`ma_kh`),
  ADD KEY `binh_luan_hang_hoa` (`ma_hh`);

--
-- Indexes for table `chi_tiet_don_hang`
--
ALTER TABLE `chi_tiet_don_hang`
  ADD PRIMARY KEY (`ma_chi_tiet`),
  ADD KEY `chi_tiet_don_hang` (`ma_dh`);

--
-- Indexes for table `don_hang`
--
ALTER TABLE `don_hang`
  ADD PRIMARY KEY (`ma_dh`),
  ADD KEY `khach_hang_don_hang` (`ma_kh`);

--
-- Indexes for table `hang_hoa`
--
ALTER TABLE `hang_hoa`
  ADD PRIMARY KEY (`ma_hh`),
  ADD KEY `loai_hang` (`ma_loai`);

--
-- Indexes for table `khach_hang`
--
ALTER TABLE `khach_hang`
  ADD PRIMARY KEY (`ma_kh`);

--
-- Indexes for table `loai`
--
ALTER TABLE `loai`
  ADD PRIMARY KEY (`ma_loai`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `binh_luan`
--
ALTER TABLE `binh_luan`
  MODIFY `ma_bl` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `chi_tiet_don_hang`
--
ALTER TABLE `chi_tiet_don_hang`
  MODIFY `ma_chi_tiet` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `don_hang`
--
ALTER TABLE `don_hang`
  MODIFY `ma_dh` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `hang_hoa`
--
ALTER TABLE `hang_hoa`
  MODIFY `ma_hh` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `loai`
--
ALTER TABLE `loai`
  MODIFY `ma_loai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `binh_luan`
--
ALTER TABLE `binh_luan`
  ADD CONSTRAINT `binh_luan_hang_hoa` FOREIGN KEY (`ma_hh`) REFERENCES `hang_hoa` (`ma_hh`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `binh_luan_khach_hang` FOREIGN KEY (`ma_kh`) REFERENCES `khach_hang` (`ma_kh`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `chi_tiet_don_hang`
--
ALTER TABLE `chi_tiet_don_hang`
  ADD CONSTRAINT `chi_tiet_don_hang` FOREIGN KEY (`ma_dh`) REFERENCES `don_hang` (`ma_dh`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `don_hang`
--
ALTER TABLE `don_hang`
  ADD CONSTRAINT `khach_hang_don_hang` FOREIGN KEY (`ma_kh`) REFERENCES `khach_hang` (`ma_kh`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `hang_hoa`
--
ALTER TABLE `hang_hoa`
  ADD CONSTRAINT `loai_hang` FOREIGN KEY (`ma_loai`) REFERENCES `loai` (`ma_loai`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
