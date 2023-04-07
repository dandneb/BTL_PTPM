-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th4 07, 2023 lúc 01:22 PM
-- Phiên bản máy phục vụ: 10.4.24-MariaDB
-- Phiên bản PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `db_parfumerie`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tb_anhnuochoa`
--

CREATE TABLE `tb_anhnuochoa` (
  `id_anh` int(10) UNSIGNED NOT NULL,
  `img_link` varchar(255) NOT NULL,
  `id_nuochoa` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tb_cauhoi`
--

CREATE TABLE `tb_cauhoi` (
  `id_cauhoi` int(10) UNSIGNED NOT NULL,
  `hoten` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `noidung` varchar(2000) NOT NULL,
  `traloi` varchar(2000) DEFAULT NULL,
  `trangthai` tinyint(4) NOT NULL,
  `id_nguoidung` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tb_dangkynhantin`
--

CREATE TABLE `tb_dangkynhantin` (
  `id_nguoinhan` int(10) UNSIGNED NOT NULL,
  `hoten` varchar(50) NOT NULL,
  `email` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tb_danhgia`
--

CREATE TABLE `tb_danhgia` (
  `id_donhang` int(10) UNSIGNED NOT NULL,
  `id_nuochoa` varchar(11) NOT NULL,
  `hoten` varchar(50) NOT NULL,
  `email` varchar(30) NOT NULL,
  `noidungdanhgia` varchar(1000) NOT NULL,
  `xephang` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tb_diachi`
--

CREATE TABLE `tb_diachi` (
  `id_diachi` int(10) UNSIGNED NOT NULL,
  `hoten` varchar(50) NOT NULL,
  `dienthoai` varchar(15) NOT NULL,
  `congty` varchar(100) NOT NULL,
  `diachi` varchar(200) NOT NULL,
  `quocgia` varchar(30) NOT NULL,
  `tinhthanh` varchar(50) DEFAULT NULL,
  `quanhuyen` varchar(50) DEFAULT NULL,
  `phuongxa` varchar(50) DEFAULT NULL,
  `mazip` varchar(10) NOT NULL,
  `macdinh` tinyint(4) NOT NULL,
  `id_nguoidung` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tb_diachi`
--

INSERT INTO `tb_diachi` (`id_diachi`, `hoten`, `dienthoai`, `congty`, `diachi`, `quocgia`, `tinhthanh`, `quanhuyen`, `phuongxa`, `mazip`, `macdinh`, `id_nguoidung`) VALUES
(11, 'Đào Duy Đán', '0921644877', 'Thuy Loi University', '61 Ngõ 354', 'Vietnam', 'Thành phố Hà Nội', 'Quận Đống Đa', 'Phường Khương Thượng', '10000', 1, 'AB3ZIP4O0V7'),
(12, 'Đào Duy Đán', '0921644877', 'Thuy Loi University', '106 Thông Thượng Yên', 'Vietnam', 'Thành phố Hà Nội', 'Huyện Phú Xuyên', 'Xã Phú Yên', '10000', 0, 'AB3ZIP4O0V7'),
(13, 'Đào Duy Đán', '0366887398', 'Thuy Loi University', '61 Ngõ 354', 'Vietnam', 'Thành phố Hà Nội', 'Quận Đống Đa', 'Phường Khương Thượng', '10000', 0, 'AB3ZIP4O0V7');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tb_doanvan`
--

CREATE TABLE `tb_doanvan` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_doanvan` int(10) UNSIGNED NOT NULL,
  `sothutu` tinyint(4) NOT NULL,
  `tieude` varchar(200) NOT NULL,
  `noidung` varchar(2000) NOT NULL,
  `img_link` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tb_donhang`
--

CREATE TABLE `tb_donhang` (
  `id_donhang` int(10) UNSIGNED NOT NULL,
  `email` varchar(30) NOT NULL,
  `hoten` varchar(50) NOT NULL,
  `sodienthoai` varchar(15) NOT NULL,
  `diachi` varchar(200) NOT NULL,
  `quanhuyen` varchar(50) NOT NULL,
  `phuongxa` varchar(50) NOT NULL,
  `ghichu` varchar(1000) NOT NULL,
  `id_phuongthucthanhtoan` int(11) UNSIGNED DEFAULT NULL,
  `phivanchuyen` int(11) NOT NULL,
  `trangthaidonhang` tinyint(4) NOT NULL,
  `trangthaithanhtoan` tinyint(4) NOT NULL,
  `trangthaivanchuyen` tinyint(4) NOT NULL,
  `ngaydathang` datetime NOT NULL,
  `ngayhuy` datetime NOT NULL,
  `khuyenmai` int(11) NOT NULL,
  `tongtien` int(11) NOT NULL,
  `diachikhac` tinyint(4) NOT NULL,
  `hoten_khac` varchar(50) DEFAULT NULL,
  `sodienthoai_khac` varchar(15) DEFAULT NULL,
  `diachi_khac` varchar(200) DEFAULT NULL,
  `tinhthanh_khac` varchar(50) DEFAULT NULL,
  `quanhuyen_khac` varchar(50) DEFAULT NULL,
  `phuongxa_khac` varchar(50) DEFAULT NULL,
  `ghichu_khac` varchar(1000) DEFAULT NULL,
  `id_khachhang` varchar(11) DEFAULT NULL,
  `id_nguoiquanly` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tb_donhang_nuochoa`
--

CREATE TABLE `tb_donhang_nuochoa` (
  `id_donhang` int(10) UNSIGNED NOT NULL,
  `id_nuochoa` varchar(11) NOT NULL,
  `dongia` int(11) NOT NULL,
  `soluong` int(11) NOT NULL,
  `tong` int(11) NOT NULL,
  `magiamgia` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tb_gianuochoa`
--

CREATE TABLE `tb_gianuochoa` (
  `id_nuochoa` varchar(11) NOT NULL,
  `dungtich` int(11) NOT NULL,
  `soluong` int(11) NOT NULL,
  `gia_nhap` int(11) NOT NULL,
  `gia_ban` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tb_kienthuc_blog`
--

CREATE TABLE `tb_kienthuc_blog` (
  `id_baiviet_blog` int(10) UNSIGNED NOT NULL,
  `tieude` varchar(200) NOT NULL,
  `ngaydang` datetime NOT NULL,
  `mota` varchar(1000) NOT NULL,
  `soluongnguoixem` bigint(20) NOT NULL,
  `phanloai` tinyint(4) NOT NULL,
  `id_nguoidung` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tb_magiamgia`
--

CREATE TABLE `tb_magiamgia` (
  `magiamgia` varchar(15) NOT NULL,
  `ngaybatdau` datetime NOT NULL,
  `hansudung` datetime NOT NULL,
  `soluotsudung` int(11) NOT NULL,
  `giam` int(11) NOT NULL,
  `id_nuochoa` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tb_nguoidung`
--

CREATE TABLE `tb_nguoidung` (
  `id_nguoidung` varchar(11) NOT NULL,
  `hoten` varchar(50) NOT NULL,
  `email` varchar(30) NOT NULL,
  `dienthoai` varchar(15) DEFAULT NULL,
  `matkhau` varchar(255) NOT NULL,
  `trangthai` tinyint(4) NOT NULL,
  `link_xacthucemail` varchar(255) DEFAULT NULL,
  `thoigian_xacthuc` timestamp NULL DEFAULT NULL,
  `capbac` tinyint(4) NOT NULL,
  `mota` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tb_nguoidung`
--

INSERT INTO `tb_nguoidung` (`id_nguoidung`, `hoten`, `email`, `dienthoai`, `matkhau`, `trangthai`, `link_xacthucemail`, `thoigian_xacthuc`, `capbac`, `mota`) VALUES
('74R1G6BOT5N', 'Đào Duy Đán', 'daodan2612@gmail.com', '0366887398', 'daodan2612', 0, NULL, '2023-04-06 10:12:33', 2, 'Chủ cửa hà'),
('AB3ZIP4O0V7', 'Đào Duy Đán', 'Daodanmanchester@gmail.com', '0921644877', '$2y$10$BQM1hovHkbt1MisTs2IqqeOpsLGNqesF16pIBW5dVDm/13I4tArS2', 1, 'd8c3bcff527fbb65f411f9b9645e487a2760', '2023-04-06 12:50:08', 0, 'Khách hàng thành viên');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tb_nhacungcap`
--

CREATE TABLE `tb_nhacungcap` (
  `id_nhacungcap` int(10) UNSIGNED NOT NULL,
  `ten_nhacungcap` varchar(100) NOT NULL,
  `diachi` varchar(100) NOT NULL,
  `sodienthoai` varchar(15) NOT NULL,
  `email` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tb_nhacungcap`
--

INSERT INTO `tb_nhacungcap` (`id_nhacungcap`, `ten_nhacungcap`, `diachi`, `sodienthoai`, `email`) VALUES
(1, 'CTTNHH Hoa Đài', 'Hà Nội', '05658741525', 'hoadai.group@gmail.com');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tb_nuochoa`
--

CREATE TABLE `tb_nuochoa` (
  `id_nuochoa` varchar(11) NOT NULL,
  `ten_nuochoa` varchar(100) NOT NULL,
  `gioitinh` tinyint(4) NOT NULL,
  `xuatxu` varchar(20) NOT NULL,
  `mota` varchar(500) NOT NULL,
  `thongtinchinh` varchar(500) NOT NULL,
  `tongquan` varchar(500) NOT NULL,
  `huongthom` varchar(2000) NOT NULL,
  `loai_huongthom` varchar(500) NOT NULL,
  `thietke` varchar(2000) NOT NULL,
  `dadanghoa` varchar(2000) NOT NULL,
  `huongdansudung` varchar(2000) NOT NULL,
  `nhomnuochoa` varchar(50) NOT NULL,
  `dotuoikhuyendung` varchar(10) NOT NULL,
  `namramat` year(4) NOT NULL,
  `nongdo` varchar(10) NOT NULL,
  `nhaphache` varchar(50) NOT NULL,
  `doluuhuong` varchar(50) NOT NULL,
  `phongcach` varchar(50) NOT NULL,
  `dotoahuong` varchar(50) NOT NULL,
  `thoidiemphuhop` varchar(50) NOT NULL,
  `ngaybat_dauban` date NOT NULL DEFAULT current_timestamp(),
  `danhgia` float NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `id_thuonghieu` varchar(11) NOT NULL,
  `id_nhacungcap` int(10) UNSIGNED NOT NULL,
  `id_nguoiquanly` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tb_phuongthucthanhtoan`
--

CREATE TABLE `tb_phuongthucthanhtoan` (
  `id_phuongthucthanhtoan` int(10) UNSIGNED NOT NULL,
  `ten` varchar(100) NOT NULL,
  `mota` varchar(1000) NOT NULL,
  `image_link` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tb_sanpham_viewer`
--

CREATE TABLE `tb_sanpham_viewer` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_nuochoa` varchar(11) NOT NULL,
  `thoigian_truycap` datetime NOT NULL,
  `ip_address` varchar(30) NOT NULL,
  `diachi` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tb_thuonghieu`
--

CREATE TABLE `tb_thuonghieu` (
  `id_thuonghieu` varchar(11) NOT NULL,
  `ten_thuonghieu` varchar(100) NOT NULL,
  `id_nguoidung` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tb_thuonghieu`
--

INSERT INTO `tb_thuonghieu` (`id_thuonghieu`, `ten_thuonghieu`, `id_nguoidung`) VALUES
('HAUSAT82934', 'Creed', '74R1G6BOT5N');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tb_yeuthich`
--

CREATE TABLE `tb_yeuthich` (
  `id_nguoidung` varchar(11) NOT NULL,
  `id_nuochoa` varchar(11) NOT NULL,
  `dungtich` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `tb_anhnuochoa`
--
ALTER TABLE `tb_anhnuochoa`
  ADD PRIMARY KEY (`id_anh`),
  ADD KEY `fk_anhnuochoa_nuochoa` (`id_nuochoa`);

--
-- Chỉ mục cho bảng `tb_cauhoi`
--
ALTER TABLE `tb_cauhoi`
  ADD PRIMARY KEY (`id_cauhoi`),
  ADD KEY `fk_cauhoi_quanly` (`id_nguoidung`);

--
-- Chỉ mục cho bảng `tb_dangkynhantin`
--
ALTER TABLE `tb_dangkynhantin`
  ADD PRIMARY KEY (`id_nguoinhan`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Chỉ mục cho bảng `tb_danhgia`
--
ALTER TABLE `tb_danhgia`
  ADD PRIMARY KEY (`id_donhang`,`id_nuochoa`),
  ADD KEY `fk_danhgia_sanpham` (`id_nuochoa`);

--
-- Chỉ mục cho bảng `tb_diachi`
--
ALTER TABLE `tb_diachi`
  ADD PRIMARY KEY (`id_diachi`),
  ADD KEY `fk_nguoidung_diachi` (`id_nguoidung`);

--
-- Chỉ mục cho bảng `tb_doanvan`
--
ALTER TABLE `tb_doanvan`
  ADD PRIMARY KEY (`id_doanvan`),
  ADD KEY `fk_blog_kienthuc_doanvan` (`id`);

--
-- Chỉ mục cho bảng `tb_donhang`
--
ALTER TABLE `tb_donhang`
  ADD PRIMARY KEY (`id_donhang`),
  ADD KEY `fk_donhang_phuongthucthanhtoan` (`id_phuongthucthanhtoan`),
  ADD KEY `fk_donhang_khachhang` (`id_khachhang`),
  ADD KEY `fk_donhang_nguoiquanly` (`id_nguoiquanly`);

--
-- Chỉ mục cho bảng `tb_donhang_nuochoa`
--
ALTER TABLE `tb_donhang_nuochoa`
  ADD PRIMARY KEY (`id_donhang`,`id_nuochoa`),
  ADD KEY `fk_donhang_nuochoa_magiamgia` (`magiamgia`),
  ADD KEY `fk_nuochoa_donhangnuochoa` (`id_nuochoa`);

--
-- Chỉ mục cho bảng `tb_gianuochoa`
--
ALTER TABLE `tb_gianuochoa`
  ADD PRIMARY KEY (`id_nuochoa`,`dungtich`);

--
-- Chỉ mục cho bảng `tb_kienthuc_blog`
--
ALTER TABLE `tb_kienthuc_blog`
  ADD PRIMARY KEY (`id_baiviet_blog`),
  ADD KEY `fk_kienthuc_blog_quanly` (`id_nguoidung`);

--
-- Chỉ mục cho bảng `tb_magiamgia`
--
ALTER TABLE `tb_magiamgia`
  ADD PRIMARY KEY (`magiamgia`),
  ADD KEY `fk_magiamgia_nuochoa` (`id_nuochoa`);

--
-- Chỉ mục cho bảng `tb_nguoidung`
--
ALTER TABLE `tb_nguoidung`
  ADD PRIMARY KEY (`id_nguoidung`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `dienthoai` (`dienthoai`);

--
-- Chỉ mục cho bảng `tb_nhacungcap`
--
ALTER TABLE `tb_nhacungcap`
  ADD PRIMARY KEY (`id_nhacungcap`);

--
-- Chỉ mục cho bảng `tb_nuochoa`
--
ALTER TABLE `tb_nuochoa`
  ADD PRIMARY KEY (`id_nuochoa`),
  ADD KEY `fk_nuochoa_thuonghieu` (`id_thuonghieu`),
  ADD KEY `fk_nuochoa_nhacungcap` (`id_nhacungcap`),
  ADD KEY `fk_nuochoa_nguoithemnuochoa` (`id_nguoiquanly`);

--
-- Chỉ mục cho bảng `tb_phuongthucthanhtoan`
--
ALTER TABLE `tb_phuongthucthanhtoan`
  ADD PRIMARY KEY (`id_phuongthucthanhtoan`);

--
-- Chỉ mục cho bảng `tb_sanpham_viewer`
--
ALTER TABLE `tb_sanpham_viewer`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_nuochoa_viewer` (`id_nuochoa`);

--
-- Chỉ mục cho bảng `tb_thuonghieu`
--
ALTER TABLE `tb_thuonghieu`
  ADD PRIMARY KEY (`id_thuonghieu`),
  ADD KEY `fk_thuonghieu_nguoidung` (`id_nguoidung`);

--
-- Chỉ mục cho bảng `tb_yeuthich`
--
ALTER TABLE `tb_yeuthich`
  ADD PRIMARY KEY (`id_nguoidung`,`id_nuochoa`,`dungtich`),
  ADD KEY `fk_sanpham_yeuthich` (`id_nuochoa`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `tb_anhnuochoa`
--
ALTER TABLE `tb_anhnuochoa`
  MODIFY `id_anh` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `tb_cauhoi`
--
ALTER TABLE `tb_cauhoi`
  MODIFY `id_cauhoi` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `tb_dangkynhantin`
--
ALTER TABLE `tb_dangkynhantin`
  MODIFY `id_nguoinhan` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `tb_diachi`
--
ALTER TABLE `tb_diachi`
  MODIFY `id_diachi` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `tb_doanvan`
--
ALTER TABLE `tb_doanvan`
  MODIFY `id_doanvan` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `tb_donhang`
--
ALTER TABLE `tb_donhang`
  MODIFY `id_donhang` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `tb_kienthuc_blog`
--
ALTER TABLE `tb_kienthuc_blog`
  MODIFY `id_baiviet_blog` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `tb_nhacungcap`
--
ALTER TABLE `tb_nhacungcap`
  MODIFY `id_nhacungcap` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `tb_phuongthucthanhtoan`
--
ALTER TABLE `tb_phuongthucthanhtoan`
  MODIFY `id_phuongthucthanhtoan` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `tb_sanpham_viewer`
--
ALTER TABLE `tb_sanpham_viewer`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `tb_anhnuochoa`
--
ALTER TABLE `tb_anhnuochoa`
  ADD CONSTRAINT `fk_anhnuochoa_nuochoa` FOREIGN KEY (`id_nuochoa`) REFERENCES `tb_nuochoa` (`id_nuochoa`);

--
-- Các ràng buộc cho bảng `tb_cauhoi`
--
ALTER TABLE `tb_cauhoi`
  ADD CONSTRAINT `fk_cauhoi_quanly` FOREIGN KEY (`id_nguoidung`) REFERENCES `tb_nguoidung` (`id_nguoidung`);

--
-- Các ràng buộc cho bảng `tb_danhgia`
--
ALTER TABLE `tb_danhgia`
  ADD CONSTRAINT `fk_danhgia_donhang` FOREIGN KEY (`id_donhang`) REFERENCES `tb_donhang` (`id_donhang`),
  ADD CONSTRAINT `fk_danhgia_sanpham` FOREIGN KEY (`id_nuochoa`) REFERENCES `tb_nuochoa` (`id_nuochoa`);

--
-- Các ràng buộc cho bảng `tb_diachi`
--
ALTER TABLE `tb_diachi`
  ADD CONSTRAINT `fk_nguoidung_diachi` FOREIGN KEY (`id_nguoidung`) REFERENCES `tb_nguoidung` (`id_nguoidung`);

--
-- Các ràng buộc cho bảng `tb_doanvan`
--
ALTER TABLE `tb_doanvan`
  ADD CONSTRAINT `fk_blog_kienthuc_doanvan` FOREIGN KEY (`id`) REFERENCES `tb_kienthuc_blog` (`id_baiviet_blog`);

--
-- Các ràng buộc cho bảng `tb_donhang`
--
ALTER TABLE `tb_donhang`
  ADD CONSTRAINT `fk_donhang_khachhang` FOREIGN KEY (`id_khachhang`) REFERENCES `tb_nguoidung` (`id_nguoidung`),
  ADD CONSTRAINT `fk_donhang_nguoiquanly` FOREIGN KEY (`id_nguoiquanly`) REFERENCES `tb_nguoidung` (`id_nguoidung`),
  ADD CONSTRAINT `fk_donhang_phuongthucthanhtoan` FOREIGN KEY (`id_phuongthucthanhtoan`) REFERENCES `tb_phuongthucthanhtoan` (`id_phuongthucthanhtoan`);

--
-- Các ràng buộc cho bảng `tb_donhang_nuochoa`
--
ALTER TABLE `tb_donhang_nuochoa`
  ADD CONSTRAINT `fk_donhang_donhangnuochoa` FOREIGN KEY (`id_donhang`) REFERENCES `tb_donhang` (`id_donhang`),
  ADD CONSTRAINT `fk_donhang_nuochoa_magiamgia` FOREIGN KEY (`magiamgia`) REFERENCES `tb_magiamgia` (`magiamgia`),
  ADD CONSTRAINT `fk_nuochoa_donhangnuochoa` FOREIGN KEY (`id_nuochoa`) REFERENCES `tb_nuochoa` (`id_nuochoa`);

--
-- Các ràng buộc cho bảng `tb_gianuochoa`
--
ALTER TABLE `tb_gianuochoa`
  ADD CONSTRAINT `fk_nuochoa_gianuochoa` FOREIGN KEY (`id_nuochoa`) REFERENCES `tb_nuochoa` (`id_nuochoa`);

--
-- Các ràng buộc cho bảng `tb_kienthuc_blog`
--
ALTER TABLE `tb_kienthuc_blog`
  ADD CONSTRAINT `fk_kienthuc_blog_quanly` FOREIGN KEY (`id_nguoidung`) REFERENCES `tb_nguoidung` (`id_nguoidung`);

--
-- Các ràng buộc cho bảng `tb_magiamgia`
--
ALTER TABLE `tb_magiamgia`
  ADD CONSTRAINT `fk_magiamgia_nuochoa` FOREIGN KEY (`id_nuochoa`) REFERENCES `tb_nuochoa` (`id_nuochoa`);

--
-- Các ràng buộc cho bảng `tb_nuochoa`
--
ALTER TABLE `tb_nuochoa`
  ADD CONSTRAINT `fk_nuochoa_nguoithemnuochoa` FOREIGN KEY (`id_nguoiquanly`) REFERENCES `tb_nguoidung` (`id_nguoidung`),
  ADD CONSTRAINT `fk_nuochoa_nhacungcap` FOREIGN KEY (`id_nhacungcap`) REFERENCES `tb_nhacungcap` (`id_nhacungcap`),
  ADD CONSTRAINT `fk_nuochoa_thuonghieu` FOREIGN KEY (`id_thuonghieu`) REFERENCES `tb_thuonghieu` (`id_thuonghieu`);

--
-- Các ràng buộc cho bảng `tb_sanpham_viewer`
--
ALTER TABLE `tb_sanpham_viewer`
  ADD CONSTRAINT `fk_nuochoa_viewer` FOREIGN KEY (`id_nuochoa`) REFERENCES `tb_nuochoa` (`id_nuochoa`);

--
-- Các ràng buộc cho bảng `tb_thuonghieu`
--
ALTER TABLE `tb_thuonghieu`
  ADD CONSTRAINT `fk_thuonghieu_nguoidung` FOREIGN KEY (`id_nguoidung`) REFERENCES `tb_nguoidung` (`id_nguoidung`);

--
-- Các ràng buộc cho bảng `tb_yeuthich`
--
ALTER TABLE `tb_yeuthich`
  ADD CONSTRAINT `fk_nguoidung_yeuthich` FOREIGN KEY (`id_nguoidung`) REFERENCES `tb_nguoidung` (`id_nguoidung`),
  ADD CONSTRAINT `fk_sanpham_yeuthich` FOREIGN KEY (`id_nuochoa`) REFERENCES `tb_nuochoa` (`id_nuochoa`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
