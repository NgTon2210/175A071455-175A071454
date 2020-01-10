-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th1 10, 2020 lúc 04:18 AM
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

--
-- Đang đổ dữ liệu cho bảng `lop_hoc`
--

INSERT INTO `lop_hoc` (`id`, `ten_lop`) VALUES
(1, '59TH2'),
(2, '59TH2'),
(3, '59TH2'),
(4, '59TH2'),
(5, '59TH2'),
(6, '59KT1'),
(8, '59TH2'),
(9, '59PM1'),
(10, '59PM1');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lop_hoc_giang_vien`
--

CREATE TABLE `lop_hoc_giang_vien` (
  `lop_hoc_id` int(5) NOT NULL,
  `giang_vien_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `lop_hoc_giang_vien`
--

INSERT INTO `lop_hoc_giang_vien` (`lop_hoc_id`, `giang_vien_id`) VALUES
(4, 20),
(5, 25),
(6, 20),
(8, 25),
(9, 20),
(10, 20);

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

--
-- Đang đổ dữ liệu cho bảng `mon_hoc`
--

INSERT INTO `mon_hoc` (`id`, `ten_mon`, `qua_trinh`, `thi_cuoi`) VALUES
(8, 'Công nghệ web', NULL, 0),
(10, 'Pháp luật đại cương', NULL, 0),
(11, 'Lập trình C++', NULL, 0),
(12, 'Tài chính ngân hàng', NULL, 0),
(13, 'Kỹ thuật công trình thủy', NULL, 0),
(14, 'Kỹ thuật hàn xì', NULL, 0),
(15, 'Kỹ thuật công trình thủy', NULL, 0);

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

--
-- Đang đổ dữ liệu cho bảng `mon_hoc_lop_hoc`
--

INSERT INTO `mon_hoc_lop_hoc` (`mon_hoc_id`, `lop_hoc_id`) VALUES
(7, 1),
(7, 2),
(7, 3),
(7, 4),
(8, 5),
(12, 6),
(11, 8),
(8, 9),
(8, 10);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nganh_hoc`
--

CREATE TABLE `nganh_hoc` (
  `id` int(10) UNSIGNED NOT NULL,
  `ten_nganh` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `nganh_hoc`
--

INSERT INTO `nganh_hoc` (`id`, `ten_nganh`) VALUES
(23, 'Công nghệ thông tin'),
(25, 'Cơ Khí'),
(26, 'Kinh Tế'),
(27, 'Nước'),
(30, 'Công Trình');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nganh_hoc_mon_hoc`
--

CREATE TABLE `nganh_hoc_mon_hoc` (
  `nganh_hoc_id` int(10) UNSIGNED NOT NULL,
  `mon_hoc_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `nganh_hoc_mon_hoc`
--

INSERT INTO `nganh_hoc_mon_hoc` (`nganh_hoc_id`, `mon_hoc_id`) VALUES
(23, 2),
(27, 3),
(23, 4),
(26, 5),
(23, 6),
(23, 7),
(23, 8),
(23, 9),
(26, 10),
(23, 11),
(26, 12),
(27, 13),
(25, 14),
(23, 15);

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
(4, 'tonnv72@wru.vn', '$2y$10$uM.9Nf204XSUBqNLcWdHBueowG.WnbDsAhrJIflXmEtfT9Nz9BEIS', 'Nguyễn Văn Tôn', '001099017283', '01626077547', 'Hà Nội', 2, 1, 0, '15807303305e0a022860f0d'),
(20, 'kytv72@wru.vn', '$2y$10$34RhS3tBuSUUJSme3Pe6y.PsAWnM.wZrKiXTUcIo3T2IV213vcB3m', 'Trần Viết Kỷ Bê Tông', '001099017375', '01626074757', 'Nghệ An', 3, 1, 0, '7493623455e0e098d8534d'),
(21, 'ktz@wru.com', '$2y$10$hAtIFyvPdtmiHw3JdyHlousNpDplaIaBajlOz.mHD7uZ6kk4kFFvS', 'KIỀU TUẤN DŨNG', '001099696969', '0969696969', 'BẠC LIÊU', 1, 1, 0, NULL),
(25, 'tranvietky99@gmail.com', '$2y$10$44T0KClDS1MXnZQ6VrcmeOWiajzT4EJ2WxsHgBd6yNtAb2pd6A4ku', 'Dương Tiến Nam Xà Beng', '001099016969', '03533535192', 'Huế', 3, 1, 0, '8281419055e0f5314163bd'),
(26, 'Linhtoro@wru.vn', '$2y$10$NKI62xocg3MplAjPoo3zJ.eGYSFCaExJUFdkIYFSGh3czYV7V0DZq', 'Nguyễn Văn Linh ', '001099017296', '0353626410', 'Cà Mau', 4, 1, 0, '11173815175e10a58a91532');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tin_tuc`
--

CREATE TABLE `tin_tuc` (
  `id` int(11) UNSIGNED NOT NULL,
  `tieu_de` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `noi_dung` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `noi_bat` int(5) DEFAULT NULL,
  `danh_muc` int(5) NOT NULL,
  `ten_anh` varchar(225) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tin_tuc`
--

INSERT INTO `tin_tuc` (`id`, `tieu_de`, `noi_dung`, `noi_bat`, `danh_muc`, `ten_anh`) VALUES
(11, 'Hội thảo chương trình Meister School đào tạo kỹ sư làm việc tại Nhật Bản', '<p>Theo thỏa thuận giữa Trường Đại học Thủy lợi v&agrave; C&ocirc;ng ty Minami Fuji, Nhật Bản, Chương tr&igrave;nh Meister School bắt đầu triển khai tại Đại học Thủy lợi từ th&aacute;ng 10/2017. Với mục ti&ecirc;u đ&agrave;o tạo nh&acirc;n lực trẻ Việt Nam để l&agrave;m việc l&acirc;u d&agrave;i tại Nhật Bản, Chương tr&igrave;nh Meister School tuyển chọn những sinh vi&ecirc;n đại học năm cuối hoặc mới tốt nghiệp c&oacute; tiềm năng đ&aacute;p ứng những y&ecirc;u cầu l&agrave;m việc tr&igrave;nh độ cao tại c&aacute;c c&ocirc;ng ty Nhật Bản v&agrave; sẽ được nhận c&aacute;c đ&atilde;i ngộ như một người Nhật. C&ocirc;ng ty sẽ đ&agrave;o tạo miễn ph&iacute; 100% Tiếng Nhật v&agrave; c&aacute;c kỹ năng nghề nghiệp cần thiết để c&aacute;c em c&oacute; thể l&agrave;m việc tại Nhật Bản.</p>\r\n\r\n<p>Để sinh vi&ecirc;n hiểu r&otilde; hơn về chương tr&igrave;nh, văn ph&ograve;ng Meister School tại Đại học Thủy Lợi sẽ tổ chức&nbsp;<strong>&ldquo;Hội thảo chương tr&igrave;nh Meister School đ&agrave;o tạo kỹ sư l&agrave;m việc tại Nhật Bản&rdquo;</strong>. Th&ocirc;ng tin cụ thể như sau:</p>\r\n\r\n<p><strong>Thời gian:</strong>&nbsp;15:00-17:00, Thứ Năm ng&agrave;y 19/12/2019</p>\r\n\r\n<p><strong>Địa điểm:&nbsp;</strong>Room 5 - K1, Trường Đại học Thủy lợi</p>\r\n\r\n<p><strong>Diễn giả:</strong>&nbsp;&Ocirc;ng Sugiyama Sadahisa &ndash; Chủ tịch, Tổng gi&aacute;m đốc C&ocirc;ng ty Minami Fuji</p>\r\n\r\n<p>Tr&acirc;n trọng k&iacute;nh mời c&aacute;c Thầy c&ocirc; v&agrave; c&aacute;c em sinh vi&ecirc;n quan t&acirc;m tới dự.</p>\r\n', 0, 1, 'notify1.png'),
(12, 'Cựu sinh viên Nhà trường được chỉ định tham gia làm ủy viên BCH Đảng bộ tỉnh Phú Thọ', '<p>Vừa qua, BCH Đảng bộ tỉnh Ph&uacute; Thọ tổ chức hội nghị lần thứ 20, kho&aacute; XVIII nhằm đ&aacute;nh gi&aacute; t&igrave;nh h&igrave;nh thực hiện nhiệm vụ ch&iacute;nh trị năm 2019; phương hướng năm 2020 v&agrave; một số nội dung quan trọng kh&aacute;c.</p>\r\n\r\n<p>Tại hội nghị, đồng ch&iacute; Nguyễn Văn Khỏe - Uỷ vi&ecirc;n BTV Tỉnh uỷ, Trưởng Ban Tổ chức Tỉnh ủy Ph&uacute; Thọ đ&atilde; c&ocirc;ng bố Quyết định của Ban B&iacute; thư Trung ương Đảng về c&ocirc;ng t&aacute;c c&aacute;n bộ, chuẩn y giữ chức Ủy vi&ecirc;n BTV Tỉnh ủy nhiệm kỳ 2015 - 2020. Đồng thời, c&ocirc;ng bố c&aacute;c Quyết định của Ban B&iacute; thư Trung ương Đảng chỉ định tham gia l&agrave;m Ủy vi&ecirc;n BCH Đảng bộ tỉnh nhiệm kỳ 2015 - 2020.</p>\r\n\r\n<p>Trong số 6 đồng ch&iacute; được chỉ định, c&oacute; đồng ch&iacute;&nbsp;Nguyễn Minh Tuấn - B&iacute; thư Huyện ủy Y&ecirc;n Lập. Đồng ch&iacute; Tuấn từng l&agrave; Cựu sinh vi&ecirc;n lớp 36C1, Khoa C&ocirc;ng tr&igrave;nh Trường Đại học Thủy lợi v&agrave; l&agrave; học vi&ecirc;n Cao học 17KT, Khoa Kinh tế v&agrave; Quản l&yacute;.sa</p>\r\n\r\n<p>Xin ch&uacute;c mừng đồng ch&iacute; Nguyễn Minh Tuấn đ&atilde; nhận được sự t&iacute;n nhiệm của c&aacute;c cấp l&atilde;nh đạo, l&agrave; điều kiện để đồng ch&iacute; ph&aacute;t huy được sở trường ho&agrave;n th&agrave;nh tốt nhiệm vụ được giao.</p>\r\n', 1, 0, 'news4.jpg'),
(13, 'Kế hoạch Học tập môn học Giáo dục quốc phòng và an ninh K61 (Khóa III đợt 4) năm học 2019– 2020', '<p>A.Thời gian, địa điểm v&agrave; h&igrave;nh thức học tập</p>\r\n\r\n<p>- Thời gian: Từ ng&agrave;y 03/02/2020 đến ng&agrave;y 15/03/2020.</p>\r\n\r\n<p>- Địa điểm:Trung t&acirc;m GDQP&amp;AN (Trường Đại học Thủy Lợi-Cơ sở Phố Hiến), tỉnh Hưng Y&ecirc;n.</p>\r\n\r\n<p>- H&igrave;nh thức học tập: Tổ chức đ&agrave;o tạo theo lớp, quản l&yacute; theo đại đội sinh vi&ecirc;n. Sinh vi&ecirc;n ăn ở, sinh hoạt tập trung 24/24 giờ trong thời gian học tập m&ocirc;n học tại Trung t&acirc;m.</p>\r\n\r\n<p>B. Th&agrave;nh phần sinh vi&ecirc;n tham gia học tập</p>\r\n\r\n<p>- Sinh vi&ecirc;n K61 hệ đại học ch&iacute;nh quy: Khoa C&ocirc;ng nghệ th&ocirc;ng tin.</p>\r\n\r\n<p>- Sinh vi&ecirc;n K60 trở về trước chưa được cấp Chứng chỉ GDQP&amp;AN (nếu c&oacute; nguyện vọng học).</p>\r\n\r\n<p>Chi tiết th&ocirc;ng b&aacute;o:&nbsp;<a href=\"http://www.tlu.edu.vn/Portals/0/2020/1_%20Ke%20hoach%20anqp%20K3D4_19-20.docx\">tại đ&acirc;y</a></p>\r\n\r\n<p>Khuyến c&aacute;o sinh vi&ecirc;n:&nbsp;<a href=\"http://www.tlu.edu.vn/Portals/0/2020/1_%20Khuyn-cao-SV-QP.doc\">tại đ&acirc;y</a></p>\r\n\r\n<p>Kế hoạch ph&acirc;n ph&ograve;ng:&nbsp;<a href=\"http://www.tlu.edu.vn/Portals/0/2020/QP_K61_D4_19-20_phan%20phong_030120.xls\">tại đ&acirc;y</a></p>\r\n\r\n<p>Kế hoạch ph&acirc;n xe:&nbsp;<a href=\"http://www.tlu.edu.vn/Portals/0/2020/QP_K61_D4_19-20_phan%20xe_030120.xls\">tại đ&acirc;y</a></p>\r\n', 1, 0, 'notify1.png');

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `mon_hoc`
--
ALTER TABLE `mon_hoc`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `nganh_hoc`
--
ALTER TABLE `nganh_hoc`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT cho bảng `thanh_vien`
--
ALTER TABLE `thanh_vien`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT cho bảng `tin_tuc`
--
ALTER TABLE `tin_tuc`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
