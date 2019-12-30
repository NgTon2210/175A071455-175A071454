-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 30, 2019 lúc 04:51 PM
-- Phiên bản máy phục vụ: 10.4.8-MariaDB
-- Phiên bản PHP: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `ql_diem`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `diem`
--

CREATE TABLE `diem` (
  `id` int(10) UNSIGNED NOT NULL,
  `chuyen_can` float DEFAULT NULL,
  `kt1` float DEFAULT NULL,
  `kt2` float DEFAULT NULL,
  `diem_thi` float DEFAULT NULL,
  `sinh_vien_id` int(10) UNSIGNED NOT NULL,
  `mon_hoc_id` int(10) UNSIGNED NOT NULL,
  `ky_hoc_id` int(10) UNSIGNED NOT NULL,
  `time_add` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ky_hoc`
--

CREATE TABLE `ky_hoc` (
  `id` int(10) UNSIGNED NOT NULL,
  `ky_hoc` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lop_hoc`
--

CREATE TABLE `lop_hoc` (
  `id` int(10) UNSIGNED NOT NULL,
  `ten_lop` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lop_hoc_sinh_vien`
--

CREATE TABLE `lop_hoc_sinh_vien` (
  `lop_hoc_id` int(10) UNSIGNED NOT NULL,
  `sinh_vien_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `mon_hoc`
--

CREATE TABLE `mon_hoc` (
  `id` int(10) UNSIGNED NOT NULL,
  `ten_mon` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `qua_trinh` int(11) DEFAULT NULL,
  `thi_cuoi` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `mon_hoc_ky_hoc`
--

CREATE TABLE `mon_hoc_ky_hoc` (
  `mon_hoc_id` int(11) NOT NULL,
  `ky_hoc_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `mon_hoc_lop_hoc`
--

CREATE TABLE `mon_hoc_lop_hoc` (
  `mon_hoc_id` int(11) NOT NULL,
  `lop_hoc_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nganh_hoc`
--

CREATE TABLE `nganh_hoc` (
  `id` int(10) UNSIGNED NOT NULL,
  `ten_nganh` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nganh_hoc_mon_hoc`
--

CREATE TABLE `nganh_hoc_mon_hoc` (
  `nganh_hoc_id` int(10) UNSIGNED NOT NULL,
  `mon_hoc_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thanh_vien`
--

CREATE TABLE `thanh_vien` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ho_ten` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `so_cmt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `so_dien_thoai` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dia_chi` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `level` int(11) DEFAULT 4,
  `trang_thai` int(11) DEFAULT 0,
  `nganh_hoc_id` int(10) UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `thanh_vien`
--

INSERT INTO `thanh_vien` (`id`, `email`, `password`, `ho_ten`, `so_cmt`, `so_dien_thoai`, `dia_chi`, `level`, `trang_thai`, `nganh_hoc_id`, `code`) VALUES
(4, 'tonnv72@wru.vn', '$2y$10$uM.9Nf204XSUBqNLcWdHBueowG.WnbDsAhrJIflXmEtfT9Nz9BEIS', 'nguyễn văn tôn', '001099017283', '01626077547', 'Ha Noi', 4, 0, 0, '15807303305e0a022860f0d');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tin_tuc`
--

CREATE TABLE `tin_tuc` (
  `id` int(11) NOT NULL,
  `tieu_de` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `noi_dung` text COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `diem`
--
ALTER TABLE `diem`
  ADD PRIMARY KEY (`id`,`sinh_vien_id`,`mon_hoc_id`,`ky_hoc_id`),
  ADD KEY `fk_diem_sinh_vien1_idx` (`sinh_vien_id`),
  ADD KEY `fk_diem_mon_hoc1_idx` (`mon_hoc_id`),
  ADD KEY `fk_diem_ky_hoc1_idx` (`ky_hoc_id`);

--
-- Chỉ mục cho bảng `ky_hoc`
--
ALTER TABLE `ky_hoc`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `lop_hoc`
--
ALTER TABLE `lop_hoc`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `lop_hoc_sinh_vien`
--
ALTER TABLE `lop_hoc_sinh_vien`
  ADD PRIMARY KEY (`lop_hoc_id`,`sinh_vien_id`),
  ADD KEY `fk_lop_hoc_has_sinh_vien_sinh_vien1_idx` (`sinh_vien_id`),
  ADD KEY `fk_lop_hoc_has_sinh_vien_lop_hoc1_idx` (`lop_hoc_id`);

--
-- Chỉ mục cho bảng `mon_hoc`
--
ALTER TABLE `mon_hoc`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `nganh_hoc`
--
ALTER TABLE `nganh_hoc`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `thanh_vien`
--
ALTER TABLE `thanh_vien`
  ADD PRIMARY KEY (`id`,`nganh_hoc_id`),
  ADD KEY `fk_sinh_vien_nganh_hoc1_idx` (`nganh_hoc_id`);

--
-- Chỉ mục cho bảng `tin_tuc`
--
ALTER TABLE `tin_tuc`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `diem`
--
ALTER TABLE `diem`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `ky_hoc`
--
ALTER TABLE `ky_hoc`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `lop_hoc`
--
ALTER TABLE `lop_hoc`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `mon_hoc`
--
ALTER TABLE `mon_hoc`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `nganh_hoc`
--
ALTER TABLE `nganh_hoc`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `thanh_vien`
--
ALTER TABLE `thanh_vien`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
