-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th4 19, 2023 lúc 11:13 PM
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
  `anhdaidien` tinyint(4) NOT NULL DEFAULT 0,
  `id_nuochoa` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tb_anhnuochoa`
--

INSERT INTO `tb_anhnuochoa` (`id_anh`, `img_link`, `anhdaidien`, `id_nuochoa`) VALUES
(65, 'images/NuocHoa/2DIQJPIW0L7/2DIQJPIW0L7_0.jpeg', 0, '2DIQJPIW0L7'),
(66, 'images/NuocHoa/2DIQJPIW0L7/2DIQJPIW0L7_1.jpeg', 1, '2DIQJPIW0L7'),
(67, 'images/NuocHoa/2DIQJPIW0L7/2DIQJPIW0L7_2.jpeg', 0, '2DIQJPIW0L7'),
(68, 'images/NuocHoa/2DIQJPIW0L7/2DIQJPIW0L7_3.jpeg', 0, '2DIQJPIW0L7'),
(69, 'images/NuocHoa/2DIQJPIW0L7/2DIQJPIW0L7_4.jpeg', 0, '2DIQJPIW0L7'),
(70, 'images/NuocHoa/2DIQJPIW0L7/2DIQJPIW0L7_5.jpeg', 0, '2DIQJPIW0L7'),
(71, 'images/NuocHoa/2DIQJPIW0L7/2DIQJPIW0L7_6.jpeg', 0, '2DIQJPIW0L7'),
(72, 'images/NuocHoa/2DIQJPIW0L7/2DIQJPIW0L7_7.jpeg', 0, '2DIQJPIW0L7'),
(73, 'images/NuocHoa/7PAJJXBPS6Z/7PAJJXBPS6Z_0.jpeg', 0, '7PAJJXBPS6Z'),
(74, 'images/NuocHoa/7PAJJXBPS6Z/7PAJJXBPS6Z_1.jpeg', 1, '7PAJJXBPS6Z'),
(75, 'images/NuocHoa/7PAJJXBPS6Z/7PAJJXBPS6Z_2.jpeg', 0, '7PAJJXBPS6Z'),
(76, 'images/NuocHoa/7PAJJXBPS6Z/7PAJJXBPS6Z_3.jpeg', 0, '7PAJJXBPS6Z'),
(77, 'images/NuocHoa/7PAJJXBPS6Z/7PAJJXBPS6Z_4.jpeg', 0, '7PAJJXBPS6Z'),
(78, 'images/NuocHoa/7PAJJXBPS6Z/7PAJJXBPS6Z_5.jpeg', 0, '7PAJJXBPS6Z'),
(79, 'images/NuocHoa/7PAJJXBPS6Z/7PAJJXBPS6Z_6.jpeg', 0, '7PAJJXBPS6Z'),
(80, 'images/NuocHoa/7PAJJXBPS6Z/7PAJJXBPS6Z_7.jpeg', 0, '7PAJJXBPS6Z'),
(81, 'images/NuocHoa/Q4TM7UYXS79/Q4TM7UYXS79_0.jpeg', 0, 'Q4TM7UYXS79'),
(82, 'images/NuocHoa/Q4TM7UYXS79/Q4TM7UYXS79_1.jpeg', 1, 'Q4TM7UYXS79'),
(83, 'images/NuocHoa/Q4TM7UYXS79/Q4TM7UYXS79_2.jpeg', 0, 'Q4TM7UYXS79'),
(84, 'images/NuocHoa/Q4TM7UYXS79/Q4TM7UYXS79_3.jpeg', 0, 'Q4TM7UYXS79'),
(85, 'images/NuocHoa/Q4TM7UYXS79/Q4TM7UYXS79_4.jpeg', 0, 'Q4TM7UYXS79'),
(86, 'images/NuocHoa/Q4TM7UYXS79/Q4TM7UYXS79_5.jpeg', 0, 'Q4TM7UYXS79'),
(87, 'images/NuocHoa/Q4TM7UYXS79/Q4TM7UYXS79_6.jpeg', 0, 'Q4TM7UYXS79'),
(88, 'images/NuocHoa/EHZFO2NYANF/EHZFO2NYANF_0.jpeg', 0, 'EHZFO2NYANF'),
(89, 'images/NuocHoa/EHZFO2NYANF/EHZFO2NYANF_1.jpeg', 1, 'EHZFO2NYANF'),
(90, 'images/NuocHoa/EHZFO2NYANF/EHZFO2NYANF_2.jpeg', 0, 'EHZFO2NYANF'),
(91, 'images/NuocHoa/EHZFO2NYANF/EHZFO2NYANF_3.jpeg', 0, 'EHZFO2NYANF'),
(92, 'images/NuocHoa/EHZFO2NYANF/EHZFO2NYANF_4.jpeg', 0, 'EHZFO2NYANF'),
(93, 'images/NuocHoa/EHZFO2NYANF/EHZFO2NYANF_5.jpeg', 0, 'EHZFO2NYANF'),
(94, 'images/NuocHoa/EHZFO2NYANF/EHZFO2NYANF_6.jpeg', 0, 'EHZFO2NYANF'),
(95, 'images/NuocHoa/EHZFO2NYANF/EHZFO2NYANF_7.jpeg', 0, 'EHZFO2NYANF'),
(96, 'images/NuocHoa/3DCQJO906FT/3DCQJO906FT_0.jpeg', 0, '3DCQJO906FT'),
(97, 'images/NuocHoa/3DCQJO906FT/3DCQJO906FT_1.jpeg', 1, '3DCQJO906FT'),
(98, 'images/NuocHoa/3DCQJO906FT/3DCQJO906FT_2.jpeg', 0, '3DCQJO906FT'),
(99, 'images/NuocHoa/3DCQJO906FT/3DCQJO906FT_3.jpeg', 0, '3DCQJO906FT'),
(100, 'images/NuocHoa/3DCQJO906FT/3DCQJO906FT_4.jpeg', 0, '3DCQJO906FT'),
(101, 'images/NuocHoa/3DCQJO906FT/3DCQJO906FT_5.jpeg', 0, '3DCQJO906FT'),
(102, 'images/NuocHoa/3DCQJO906FT/3DCQJO906FT_6.jpeg', 0, '3DCQJO906FT'),
(103, 'images/NuocHoa/3DCQJO906FT/3DCQJO906FT_7.jpeg', 0, '3DCQJO906FT'),
(119, 'images/NuocHoa/OEM82613FXJ/OEM82613FXJ_0.jpeg', 0, 'OEM82613FXJ'),
(120, 'images/NuocHoa/OEM82613FXJ/OEM82613FXJ_1.jpeg', 1, 'OEM82613FXJ'),
(121, 'images/NuocHoa/OEM82613FXJ/OEM82613FXJ_2.jpeg', 0, 'OEM82613FXJ'),
(122, 'images/NuocHoa/OEM82613FXJ/OEM82613FXJ_3.jpeg', 0, 'OEM82613FXJ'),
(123, 'images/NuocHoa/OEM82613FXJ/OEM82613FXJ_4.jpeg', 0, 'OEM82613FXJ'),
(124, 'images/NuocHoa/OEM82613FXJ/OEM82613FXJ_5.jpeg', 0, 'OEM82613FXJ'),
(125, 'images/NuocHoa/OEM82613FXJ/OEM82613FXJ_6.jpeg', 0, 'OEM82613FXJ'),
(126, 'images/NuocHoa/OEM82613FXJ/OEM82613FXJ_7.jpeg', 0, 'OEM82613FXJ'),
(127, 'images/NuocHoa/IONOU6CRUQP/IONOU6CRUQP_0.jpeg', 0, 'IONOU6CRUQP'),
(128, 'images/NuocHoa/IONOU6CRUQP/IONOU6CRUQP_1.jpeg', 1, 'IONOU6CRUQP'),
(129, 'images/NuocHoa/IONOU6CRUQP/IONOU6CRUQP_2.jpeg', 0, 'IONOU6CRUQP'),
(130, 'images/NuocHoa/IONOU6CRUQP/IONOU6CRUQP_3.jpeg', 0, 'IONOU6CRUQP'),
(131, 'images/NuocHoa/IONOU6CRUQP/IONOU6CRUQP_4.jpeg', 0, 'IONOU6CRUQP'),
(132, 'images/NuocHoa/IONOU6CRUQP/IONOU6CRUQP_5.jpeg', 0, 'IONOU6CRUQP'),
(133, 'images/NuocHoa/IONOU6CRUQP/IONOU6CRUQP_6.jpeg', 0, 'IONOU6CRUQP'),
(134, 'images/NuocHoa/IONOU6CRUQP/IONOU6CRUQP_7.jpeg', 0, 'IONOU6CRUQP'),
(135, 'images/NuocHoa/7A645CGI9S3/7A645CGI9S3_0.jpeg', 0, '7A645CGI9S3'),
(136, 'images/NuocHoa/7A645CGI9S3/7A645CGI9S3_1.jpeg', 1, '7A645CGI9S3'),
(137, 'images/NuocHoa/7A645CGI9S3/7A645CGI9S3_2.jpeg', 0, '7A645CGI9S3'),
(138, 'images/NuocHoa/7A645CGI9S3/7A645CGI9S3_3.jpeg', 0, '7A645CGI9S3'),
(139, 'images/NuocHoa/7A645CGI9S3/7A645CGI9S3_4.jpeg', 0, '7A645CGI9S3'),
(140, 'images/NuocHoa/7A645CGI9S3/7A645CGI9S3_5.jpeg', 0, '7A645CGI9S3'),
(141, 'images/NuocHoa/7A645CGI9S3/7A645CGI9S3_6.jpeg', 0, '7A645CGI9S3'),
(142, 'images/NuocHoa/7TCLMDUPLMZ/7TCLMDUPLMZ_0.jpeg', 0, '7TCLMDUPLMZ'),
(143, 'images/NuocHoa/7TCLMDUPLMZ/7TCLMDUPLMZ_1.jpeg', 0, '7TCLMDUPLMZ'),
(144, 'images/NuocHoa/7TCLMDUPLMZ/7TCLMDUPLMZ_2.jpeg', 0, '7TCLMDUPLMZ'),
(145, 'images/NuocHoa/7TCLMDUPLMZ/7TCLMDUPLMZ_3.jpeg', 0, '7TCLMDUPLMZ'),
(146, 'images/NuocHoa/7TCLMDUPLMZ/7TCLMDUPLMZ_4.jpeg', 0, '7TCLMDUPLMZ'),
(147, 'images/NuocHoa/7TCLMDUPLMZ/7TCLMDUPLMZ_5.jpeg', 0, '7TCLMDUPLMZ'),
(148, 'images/NuocHoa/7TCLMDUPLMZ/7TCLMDUPLMZ_6.jpeg', 1, '7TCLMDUPLMZ'),
(149, 'images/NuocHoa/7TCLMDUPLMZ/7TCLMDUPLMZ_7.jpeg', 0, '7TCLMDUPLMZ'),
(150, 'images/NuocHoa/QMT1RFPCIMR/QMT1RFPCIMR_0.jpeg', 0, 'QMT1RFPCIMR'),
(151, 'images/NuocHoa/QMT1RFPCIMR/QMT1RFPCIMR_1.jpeg', 0, 'QMT1RFPCIMR'),
(152, 'images/NuocHoa/QMT1RFPCIMR/QMT1RFPCIMR_2.jpeg', 0, 'QMT1RFPCIMR'),
(153, 'images/NuocHoa/QMT1RFPCIMR/QMT1RFPCIMR_3.jpeg', 0, 'QMT1RFPCIMR'),
(154, 'images/NuocHoa/QMT1RFPCIMR/QMT1RFPCIMR_4.jpeg', 0, 'QMT1RFPCIMR'),
(155, 'images/NuocHoa/QMT1RFPCIMR/QMT1RFPCIMR_5.jpeg', 0, 'QMT1RFPCIMR'),
(156, 'images/NuocHoa/QMT1RFPCIMR/QMT1RFPCIMR_6.jpeg', 1, 'QMT1RFPCIMR'),
(157, 'images/NuocHoa/QMT1RFPCIMR/QMT1RFPCIMR_7.jpeg', 0, 'QMT1RFPCIMR'),
(158, 'images/NuocHoa/5T35Q7IOSXC/5T35Q7IOSXC_0.jpeg', 0, '5T35Q7IOSXC'),
(159, 'images/NuocHoa/5T35Q7IOSXC/5T35Q7IOSXC_1.jpeg', 0, '5T35Q7IOSXC'),
(160, 'images/NuocHoa/5T35Q7IOSXC/5T35Q7IOSXC_2.jpeg', 0, '5T35Q7IOSXC'),
(161, 'images/NuocHoa/5T35Q7IOSXC/5T35Q7IOSXC_3.jpeg', 0, '5T35Q7IOSXC'),
(162, 'images/NuocHoa/5T35Q7IOSXC/5T35Q7IOSXC_4.jpeg', 0, '5T35Q7IOSXC'),
(163, 'images/NuocHoa/5T35Q7IOSXC/5T35Q7IOSXC_5.jpeg', 1, '5T35Q7IOSXC'),
(164, 'images/NuocHoa/5T35Q7IOSXC/5T35Q7IOSXC_6.jpeg', 0, '5T35Q7IOSXC'),
(165, 'images/NuocHoa/VRLUKCZDQH4/VRLUKCZDQH4_0.jpeg', 0, 'VRLUKCZDQH4'),
(166, 'images/NuocHoa/VRLUKCZDQH4/VRLUKCZDQH4_1.jpeg', 0, 'VRLUKCZDQH4'),
(167, 'images/NuocHoa/VRLUKCZDQH4/VRLUKCZDQH4_2.jpeg', 0, 'VRLUKCZDQH4'),
(168, 'images/NuocHoa/VRLUKCZDQH4/VRLUKCZDQH4_3.jpeg', 0, 'VRLUKCZDQH4'),
(169, 'images/NuocHoa/VRLUKCZDQH4/VRLUKCZDQH4_4.jpeg', 0, 'VRLUKCZDQH4'),
(170, 'images/NuocHoa/VRLUKCZDQH4/VRLUKCZDQH4_5.jpeg', 0, 'VRLUKCZDQH4'),
(171, 'images/NuocHoa/VRLUKCZDQH4/VRLUKCZDQH4_6.jpeg', 1, 'VRLUKCZDQH4'),
(172, 'images/NuocHoa/VRLUKCZDQH4/VRLUKCZDQH4_7.jpeg', 0, 'VRLUKCZDQH4'),
(173, 'images/NuocHoa/2SW4N5MKFQL/2SW4N5MKFQL_0.jpeg', 0, '2SW4N5MKFQL'),
(174, 'images/NuocHoa/2SW4N5MKFQL/2SW4N5MKFQL_1.jpeg', 0, '2SW4N5MKFQL'),
(175, 'images/NuocHoa/2SW4N5MKFQL/2SW4N5MKFQL_2.jpeg', 0, '2SW4N5MKFQL'),
(176, 'images/NuocHoa/2SW4N5MKFQL/2SW4N5MKFQL_3.jpeg', 0, '2SW4N5MKFQL'),
(177, 'images/NuocHoa/2SW4N5MKFQL/2SW4N5MKFQL_4.jpeg', 0, '2SW4N5MKFQL'),
(178, 'images/NuocHoa/2SW4N5MKFQL/2SW4N5MKFQL_5.jpeg', 0, '2SW4N5MKFQL'),
(179, 'images/NuocHoa/2SW4N5MKFQL/2SW4N5MKFQL_6.jpeg', 1, '2SW4N5MKFQL'),
(180, 'images/NuocHoa/2SW4N5MKFQL/2SW4N5MKFQL_7.jpeg', 0, '2SW4N5MKFQL'),
(181, 'images/NuocHoa/SF0EAJS52PV/SF0EAJS52PV_0.jpeg', 0, 'SF0EAJS52PV'),
(182, 'images/NuocHoa/SF0EAJS52PV/SF0EAJS52PV_1.jpeg', 0, 'SF0EAJS52PV'),
(183, 'images/NuocHoa/SF0EAJS52PV/SF0EAJS52PV_2.jpeg', 0, 'SF0EAJS52PV'),
(184, 'images/NuocHoa/SF0EAJS52PV/SF0EAJS52PV_3.jpeg', 0, 'SF0EAJS52PV'),
(185, 'images/NuocHoa/SF0EAJS52PV/SF0EAJS52PV_4.jpeg', 0, 'SF0EAJS52PV'),
(186, 'images/NuocHoa/SF0EAJS52PV/SF0EAJS52PV_5.jpeg', 0, 'SF0EAJS52PV'),
(187, 'images/NuocHoa/SF0EAJS52PV/SF0EAJS52PV_6.jpeg', 1, 'SF0EAJS52PV'),
(188, 'images/NuocHoa/SF0EAJS52PV/SF0EAJS52PV_7.jpeg', 0, 'SF0EAJS52PV'),
(189, 'images/NuocHoa/HV75EYBUO0T/HV75EYBUO0T_0.jpeg', 0, 'HV75EYBUO0T'),
(190, 'images/NuocHoa/HV75EYBUO0T/HV75EYBUO0T_1.jpeg', 1, 'HV75EYBUO0T'),
(191, 'images/NuocHoa/HV75EYBUO0T/HV75EYBUO0T_2.jpeg', 0, 'HV75EYBUO0T'),
(192, 'images/NuocHoa/HV75EYBUO0T/HV75EYBUO0T_3.jpeg', 0, 'HV75EYBUO0T'),
(193, 'images/NuocHoa/HV75EYBUO0T/HV75EYBUO0T_4.jpeg', 0, 'HV75EYBUO0T'),
(194, 'images/NuocHoa/HV75EYBUO0T/HV75EYBUO0T_5.jpeg', 0, 'HV75EYBUO0T'),
(195, 'images/NuocHoa/HV75EYBUO0T/HV75EYBUO0T_6.jpeg', 0, 'HV75EYBUO0T'),
(196, 'images/NuocHoa/HV75EYBUO0T/HV75EYBUO0T_7.jpeg', 0, 'HV75EYBUO0T'),
(210, 'images/NuocHoa/2IPU5DANJUR/2IPU5DANJUR_0.jpeg', 0, '2IPU5DANJUR'),
(211, 'images/NuocHoa/2IPU5DANJUR/2IPU5DANJUR_1.jpeg', 1, '2IPU5DANJUR'),
(212, 'images/NuocHoa/2IPU5DANJUR/2IPU5DANJUR_2.jpeg', 0, '2IPU5DANJUR'),
(213, 'images/NuocHoa/2IPU5DANJUR/2IPU5DANJUR_3.jpeg', 0, '2IPU5DANJUR'),
(214, 'images/NuocHoa/2IPU5DANJUR/2IPU5DANJUR_4.jpeg', 0, '2IPU5DANJUR'),
(215, 'images/NuocHoa/2IPU5DANJUR/2IPU5DANJUR_5.jpeg', 0, '2IPU5DANJUR'),
(216, 'images/NuocHoa/2IPU5DANJUR/2IPU5DANJUR_6.jpeg', 0, '2IPU5DANJUR'),
(217, 'images/NuocHoa/5SSYRD30Z4B/5SSYRD30Z4B_0.jpeg', 0, '5SSYRD30Z4B'),
(218, 'images/NuocHoa/5SSYRD30Z4B/5SSYRD30Z4B_1.jpeg', 1, '5SSYRD30Z4B'),
(219, 'images/NuocHoa/5SSYRD30Z4B/5SSYRD30Z4B_2.jpeg', 0, '5SSYRD30Z4B'),
(220, 'images/NuocHoa/5SSYRD30Z4B/5SSYRD30Z4B_3.jpeg', 0, '5SSYRD30Z4B'),
(221, 'images/NuocHoa/5SSYRD30Z4B/5SSYRD30Z4B_4.jpeg', 0, '5SSYRD30Z4B'),
(222, 'images/NuocHoa/5SSYRD30Z4B/5SSYRD30Z4B_5.jpeg', 0, '5SSYRD30Z4B'),
(223, 'images/NuocHoa/5SSYRD30Z4B/5SSYRD30Z4B_6.jpeg', 0, '5SSYRD30Z4B'),
(224, 'images/NuocHoa/TRY4SU9UAD1/TRY4SU9UAD1_0.jpeg', 0, 'TRY4SU9UAD1'),
(225, 'images/NuocHoa/TRY4SU9UAD1/TRY4SU9UAD1_1.jpeg', 1, 'TRY4SU9UAD1'),
(226, 'images/NuocHoa/TRY4SU9UAD1/TRY4SU9UAD1_2.jpeg', 0, 'TRY4SU9UAD1'),
(227, 'images/NuocHoa/TRY4SU9UAD1/TRY4SU9UAD1_3.jpeg', 0, 'TRY4SU9UAD1'),
(228, 'images/NuocHoa/TRY4SU9UAD1/TRY4SU9UAD1_4.jpeg', 0, 'TRY4SU9UAD1'),
(229, 'images/NuocHoa/TRY4SU9UAD1/TRY4SU9UAD1_5.jpeg', 0, 'TRY4SU9UAD1'),
(230, 'images/NuocHoa/TRY4SU9UAD1/TRY4SU9UAD1_6.jpeg', 0, 'TRY4SU9UAD1'),
(231, 'images/NuocHoa/CF71W92R45Q/CF71W92R45Q_0.jpeg', 0, 'CF71W92R45Q'),
(232, 'images/NuocHoa/CF71W92R45Q/CF71W92R45Q_1.png', 1, 'CF71W92R45Q'),
(233, 'images/NuocHoa/CF71W92R45Q/CF71W92R45Q_2.jpeg', 0, 'CF71W92R45Q'),
(234, 'images/NuocHoa/CF71W92R45Q/CF71W92R45Q_3.jpeg', 0, 'CF71W92R45Q'),
(235, 'images/NuocHoa/CF71W92R45Q/CF71W92R45Q_4.jpeg', 0, 'CF71W92R45Q'),
(236, 'images/NuocHoa/CF71W92R45Q/CF71W92R45Q_5.jpeg', 0, 'CF71W92R45Q'),
(237, 'images/NuocHoa/CF71W92R45Q/CF71W92R45Q_6.jpeg', 0, 'CF71W92R45Q');

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
  `id_donhang` varchar(11) NOT NULL,
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
(11, 'Đào Duy Đán', '0921644877', 'Thuy Loi University', '61 Ngõ 354', 'Vietnam', 'Thành phố Hà Nội', 'Quận Đống Đa', 'Phường Khương Thượng', '10000', 0, 'AB3ZIP4O0V7'),
(12, 'Đào Duy Đán', '0921644877', 'Thuy Loi University', '106 Thông Thượng Yên', 'Vietnam', 'Thành phố Hà Nội', 'Huyện Phú Xuyên', 'Xã Phú Yên', '10000', 1, 'AB3ZIP4O0V7'),
(13, 'Đào Duy Đán', '0366887398', 'Thuy Loi University', '61 Ngõ 354', 'Vietnam', 'Thành phố Hà Nội', 'Quận Đống Đa', 'Phường Khương Thượng', '10000', 0, 'AB3ZIP4O0V7'),
(15, 'Đào Duy Đán', '0921644877', 'Thuy Loi University', '106 Thông Thượng Yên', 'Vietnam', 'Thành phố Hà Nội', 'Huyện Phú Xuyên', 'Xã Phú Yên', '10000', 1, '74R1G6BOT5N'),
(16, 'Đào Duy Đán', '0921644877', 'Thuy Loi University', '61 Ngõ 354', 'Vietnam', 'Thành phố Hà Nội', 'Quận Đống Đa', 'Phường Khương Thượng', '10000', 0, '74R1G6BOT5N'),
(17, 'Đào Duy Đán', '0366887398', 'Thuy Loi University', '61 Ngõ 354 Trường Chinh', 'Vietnam', 'Thành phố Hà Nội', 'Quận Đống Đa', 'Phường Khương Thượng', '10000', 1, 'IHOQ2T944ER');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tb_doanvan`
--

CREATE TABLE `tb_doanvan` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_doanvan` varchar(11) NOT NULL,
  `sothutu` tinyint(4) NOT NULL,
  `tieude` varchar(200) NOT NULL,
  `noidung` varchar(2000) NOT NULL,
  `img_link` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tb_doanvan`
--

INSERT INTO `tb_doanvan` (`id`, `id_doanvan`, `sothutu`, `tieude`, `noidung`, `img_link`) VALUES
(2, '0GYTMB4UWRN', 1, 'CCCC', 'CCCC', 'images/BaiViet/2/0GYTMB4UWRN/0GYTMB4UWRN.jpeg'),
(2, 'YBCEJPS5U2V', 2, 'AAA', 'AAA', 'images/BaiViet/2/YBCEJPS5U2V/YBCEJPS5U2V.jpeg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tb_donhang`
--

CREATE TABLE `tb_donhang` (
  `id_donhang` varchar(11) NOT NULL,
  `email` varchar(30) DEFAULT NULL,
  `hoten` varchar(50) NOT NULL,
  `sodienthoai` varchar(15) NOT NULL,
  `diachi` varchar(200) NOT NULL,
  `tinhthanh` varchar(50) NOT NULL,
  `quanhuyen` varchar(50) NOT NULL,
  `phuongxa` varchar(50) NOT NULL,
  `ghichu` varchar(1000) NOT NULL,
  `id_phuongthucthanhtoan` int(11) UNSIGNED DEFAULT NULL,
  `phivanchuyen` int(11) NOT NULL DEFAULT 0,
  `trangthaidonhang` tinyint(4) NOT NULL DEFAULT 0,
  `trangthaithanhtoan` tinyint(4) NOT NULL DEFAULT 0,
  `trangthaivanchuyen` tinyint(4) NOT NULL DEFAULT 0,
  `ngaydathang` datetime NOT NULL DEFAULT current_timestamp(),
  `ngayhuy` datetime NOT NULL,
  `khuyenmai` bigint(20) NOT NULL,
  `tongtien` bigint(20) NOT NULL,
  `diachikhac` tinyint(4) NOT NULL,
  `hoten_khac` varchar(50) DEFAULT NULL,
  `sodienthoai_khac` varchar(15) DEFAULT NULL,
  `diachi_khac` varchar(200) DEFAULT NULL,
  `tinhthanh_khac` varchar(50) DEFAULT NULL,
  `quanhuyen_khac` varchar(50) DEFAULT NULL,
  `phuongxa_khac` varchar(50) DEFAULT NULL,
  `ghichu_khac` varchar(1000) DEFAULT NULL,
  `id_khachhang` varchar(11) DEFAULT NULL,
  `id_nguoiquanly` varchar(11) DEFAULT NULL,
  `thongbao` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tb_donhang`
--

INSERT INTO `tb_donhang` (`id_donhang`, `email`, `hoten`, `sodienthoai`, `diachi`, `tinhthanh`, `quanhuyen`, `phuongxa`, `ghichu`, `id_phuongthucthanhtoan`, `phivanchuyen`, `trangthaidonhang`, `trangthaithanhtoan`, `trangthaivanchuyen`, `ngaydathang`, `ngayhuy`, `khuyenmai`, `tongtien`, `diachikhac`, `hoten_khac`, `sodienthoai_khac`, `diachi_khac`, `tinhthanh_khac`, `quanhuyen_khac`, `phuongxa_khac`, `ghichu_khac`, `id_khachhang`, `id_nguoiquanly`, `thongbao`) VALUES
('3SGYF0SAP2T', 'daodan2001@gmail.com', 'Đào Duy Đán', '0366887398', '61 Ngõ 354 Trường Chinh', 'Thành phố Hà Nội', 'Quận Đống Đa', 'Phường Khương Thượng', '', 9, 0, 1, 0, 1, '2023-04-19 14:14:52', '0000-00-00 00:00:00', 0, 630000, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'IHOQ2T944ER', NULL, 1),
('H3L9WT5E2B1', 'Daodanmanchester@gmail.com', 'Đào Duy Đán', '0921644877', '106 Thông Thượng Yên', 'Thành phố Hà Nội', 'Huyện Phú Xuyên', 'Xã Phú Yên', '', 9, 0, 1, 0, 2, '2023-04-19 05:05:50', '0000-00-00 00:00:00', 0, 4200000, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'AB3ZIP4O0V7', NULL, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tb_donhang_nuochoa`
--

CREATE TABLE `tb_donhang_nuochoa` (
  `id_donhang` varchar(11) NOT NULL,
  `id_nuochoa` varchar(11) NOT NULL,
  `dungtich` int(11) NOT NULL,
  `dongia` int(11) NOT NULL,
  `soluong` int(11) NOT NULL,
  `giamgia` bigint(20) NOT NULL,
  `tong` bigint(20) NOT NULL,
  `magiamgia` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tb_donhang_nuochoa`
--

INSERT INTO `tb_donhang_nuochoa` (`id_donhang`, `id_nuochoa`, `dungtich`, `dongia`, `soluong`, `giamgia`, `tong`, `magiamgia`) VALUES
('3SGYF0SAP2T', '2DIQJPIW0L7', 10, 315000, 2, 0, 630000, NULL),
('H3L9WT5E2B1', '7A645CGI9S3', 100, 4200000, 1, 0, 4200000, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tb_gianuochoa`
--

CREATE TABLE `tb_gianuochoa` (
  `id_nuochoa` varchar(11) NOT NULL,
  `dungtich` int(11) NOT NULL,
  `soluong` tinyint(4) NOT NULL DEFAULT 0,
  `gia_nhap` int(11) NOT NULL,
  `gia_ban` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tb_gianuochoa`
--

INSERT INTO `tb_gianuochoa` (`id_nuochoa`, `dungtich`, `soluong`, `gia_nhap`, `gia_ban`) VALUES
('2DIQJPIW0L7', 10, 0, 200000, 315000),
('2DIQJPIW0L7', 20, 0, 400000, 615000),
('2DIQJPIW0L7', 100, 0, 2000000, 2650000),
('2IPU5DANJUR', 10, 0, 700000, 995000),
('2IPU5DANJUR', 20, 0, 1700000, 1975000),
('2IPU5DANJUR', 100, 0, 9000000, 9500000),
('2SW4N5MKFQL', 10, 0, 265000, 365000),
('2SW4N5MKFQL', 20, 0, 620000, 715000),
('2SW4N5MKFQL', 100, 0, 2600000, 2950000),
('3DCQJO906FT', 10, 0, 175000, 285000),
('3DCQJO906FT', 20, 0, 400000, 550000),
('3DCQJO906FT', 100, 0, 1500000, 1950000),
('5SSYRD30Z4B', 10, 0, 220000, 315000),
('5SSYRD30Z4B', 20, 0, 520000, 615000),
('5SSYRD30Z4B', 100, 0, 2400000, 2650000),
('5T35Q7IOSXC', 10, 0, 800000, 895000),
('5T35Q7IOSXC', 20, 0, 1620000, 1775000),
('5T35Q7IOSXC', 100, 0, 9800000, 10200000),
('7A645CGI9S3', 10, 0, 360000, 495000),
('7A645CGI9S3', 20, 0, 820000, 975000),
('7A645CGI9S3', 100, 0, 4000000, 4200000),
('7PAJJXBPS6Z', 10, 1, 250000, 415000),
('7PAJJXBPS6Z', 20, 0, 650000, 815000),
('7PAJJXBPS6Z', 100, 1, 3000000, 3590000),
('7TCLMDUPLMZ', 10, 0, 260000, 375000),
('7TCLMDUPLMZ', 20, 0, 600000, 735000),
('7TCLMDUPLMZ', 100, 0, 2500000, 2900000),
('CF71W92R45Q', 10, 0, 400000, 495000),
('CF71W92R45Q', 20, 0, 860000, 975000),
('CF71W92R45Q', 100, 0, 4100000, 4300000),
('EHZFO2NYANF', 10, 0, 800000, 995000),
('EHZFO2NYANF', 20, 0, 1700000, 1975000),
('EHZFO2NYANF', 100, 0, 9000000, 9900000),
('HV75EYBUO0T', 10, 0, 210000, 295000),
('HV75EYBUO0T', 20, 0, 480000, 575000),
('HV75EYBUO0T', 100, 0, 2000000, 2250000),
('IONOU6CRUQP', 10, 0, 620000, 795000),
('IONOU6CRUQP', 20, 0, 1275000, 1575000),
('IONOU6CRUQP', 100, 0, 7200000, 7850000),
('OEM82613FXJ', 10, 1, 600000, 800000),
('OEM82613FXJ', 20, 1, 1100000, 1575000),
('OEM82613FXJ', 100, 1, 6000000, 7800000),
('Q4TM7UYXS79', 10, 0, 250000, 375000),
('Q4TM7UYXS79', 20, 0, 550000, 735000),
('Q4TM7UYXS79', 100, 0, 2950000, 3350000),
('QMT1RFPCIMR', 10, 0, 250000, 335000),
('QMT1RFPCIMR', 20, 0, 570000, 655000),
('QMT1RFPCIMR', 100, 0, 2500000, 2800000),
('SF0EAJS52PV', 10, 0, 310000, 395000),
('SF0EAJS52PV', 20, 0, 690000, 775000),
('SF0EAJS52PV', 100, 0, 3000000, 3250000),
('TRY4SU9UAD1', 10, 0, 575000, 665000),
('TRY4SU9UAD1', 20, 0, 1215000, 1315000),
('TRY4SU9UAD1', 100, 0, 4150000, 4350000),
('VRLUKCZDQH4', 10, 0, 280000, 375000),
('VRLUKCZDQH4', 20, 0, 630000, 735000),
('VRLUKCZDQH4', 100, 0, 2900000, 3150000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tb_kienthuc_blog`
--

CREATE TABLE `tb_kienthuc_blog` (
  `id_baiviet_blog` int(10) UNSIGNED NOT NULL,
  `tieude` varchar(200) NOT NULL,
  `ngaydang` date NOT NULL DEFAULT current_timestamp(),
  `mota` varchar(1000) NOT NULL,
  `soluongnguoixem` bigint(20) NOT NULL DEFAULT 0,
  `phanloai` tinyint(4) NOT NULL,
  `id_nguoidung` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tb_kienthuc_blog`
--

INSERT INTO `tb_kienthuc_blog` (`id_baiviet_blog`, `tieude`, `ngaydang`, `mota`, `soluongnguoixem`, `phanloai`, `id_nguoidung`) VALUES
(2, '[Giải đáp] Địa chỉ mua nước hoa uy tín, chất lượng ở đâu?', '2023-04-11', 'Chọn địa chỉ mua nước hoa uy tín được khá nhiều khách hàng quan tâm và thắc mắc. Bởi vì chúng ta đều biết rằng nước hoa là “chân ái” của nhiều người. Nhưng lại có rất nhiều các địa chỉ cung cấp nước hoa không đảm bảo hàng chính hãng, chất lượng. Hay nói cụ thể hơn đó là hàng giả, hàng nhái. Vậy nên tìm địa chỉ uy tín mua nước hoa chính là nhu cầu được khá nhiều người quan tâm. Mời bạn cùng theo dõi những thông tin được phân tích trong bài viết ngay dưới đây sẽ rõ hơn.', 0, 0, '74R1G6BOT5N');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tb_magiamgia`
--

CREATE TABLE `tb_magiamgia` (
  `magiamgia` varchar(15) NOT NULL,
  `ngaybatdau` date DEFAULT NULL,
  `hansudung` date NOT NULL,
  `soluotsudung` int(11) UNSIGNED NOT NULL,
  `soluotdasudung` int(11) NOT NULL,
  `giam` int(11) NOT NULL,
  `id_nuochoa` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tb_magiamgia`
--

INSERT INTO `tb_magiamgia` (`magiamgia`, `ngaybatdau`, `hansudung`, `soluotsudung`, `soluotdasudung`, `giam`, `id_nuochoa`) VALUES
('CHAOBANMOI20', '2023-04-13', '2023-04-28', 15, 0, 30, '2IPU5DANJUR'),
('CHAOTHANGTU', '2023-04-18', '2023-04-23', 30, 1, 20, '3DCQJO906FT'),
('SOCSON2001', '2023-04-03', '2023-04-06', 20, 0, 10, '2IPU5DANJUR');

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
('74R1G6BOT5N', 'Đào Duy Đán', 'daodan2612@gmail.com', '0366887398', '$2y$10$jcnZzQikhAj2CgtzaLnzhOi.MZpGVjFVVGv5Gq1rl/v2qoTotwP3q', 1, 'd8c3bcff527fbb65f411f9b9645e487a2760', '2023-04-06 10:12:33', 2, 'Chủ cửa hàng'),
('7YUUE1HL1ZM', 'Lê Đức Thắng', 'Thangducle@gmail.com', '0921644873', '$2y$10$C16Bl9dwFf66jtwFGsb9Fu9q68sZgdyMBkNFlllew48kLJRoXKUwq', 1, NULL, NULL, 1, 'Nhân viên'),
('AB3ZIP4O0V7', 'Đào Duy Đán', 'Daodanmanchester@gmail.com', '0921644877', '$2y$10$jcnZzQikhAj2CgtzaLnzhOi.MZpGVjFVVGv5Gq1rl/v2qoTotwP3q', 1, 'd8c3bcff527fbb65f411f9b9645e487a2760', '2023-04-06 12:50:08', 0, 'Khách hàng thành viên'),
('HSYARXG8723', 'Mai Văn Đức', 'congduc@gmail.com', '0366887452', '$2y$10$jcnZzQikhAj2CgtzaLnzhOi.MZpGVjFVVGv5Gq1rl/v2qoTotwP3q', 1, '', '2023-04-14 06:51:30', 1, 'Nhân viên'),
('IHOQ2T944ER', 'Đào Duy Đán', 'daodan2001@gmail.com', '0366887394', '$2y$10$PcJALJfh0xmpVme2BTU/ae2mqnvP3eUqQLhFigiR0QOJvIpp3e42S', 1, 'ba155d249c5ebc7c8324003fd64f7391105', '2023-04-19 00:08:33', 0, 'Khách hàng thành viên');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tb_nhacungcap`
--

CREATE TABLE `tb_nhacungcap` (
  `id_nhacungcap` int(10) UNSIGNED NOT NULL,
  `ten_nhacungcap` varchar(100) NOT NULL,
  `diachi` varchar(100) NOT NULL,
  `sodienthoai` varchar(15) NOT NULL,
  `email` varchar(30) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `id_nguoiquanly` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tb_nhacungcap`
--

INSERT INTO `tb_nhacungcap` (`id_nhacungcap`, `ten_nhacungcap`, `diachi`, `sodienthoai`, `email`, `status`, `id_nguoiquanly`) VALUES
(1, 'CTTNHH Hoa Đài', 'Hà Nội', '05658741527', 'hoadai.group@gmail.com', 0, '74R1G6BOT5N');

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
  `huongdansudung` varchar(2000) DEFAULT NULL,
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

--
-- Đang đổ dữ liệu cho bảng `tb_nuochoa`
--

INSERT INTO `tb_nuochoa` (`id_nuochoa`, `ten_nuochoa`, `gioitinh`, `xuatxu`, `mota`, `thongtinchinh`, `tongquan`, `huongthom`, `loai_huongthom`, `thietke`, `dadanghoa`, `huongdansudung`, `nhomnuochoa`, `dotuoikhuyendung`, `namramat`, `nongdo`, `nhaphache`, `doluuhuong`, `phongcach`, `dotoahuong`, `thoidiemphuhop`, `ngaybat_dauban`, `danhgia`, `status`, `id_thuonghieu`, `id_nhacungcap`, `id_nguoiquanly`) VALUES
('2DIQJPIW0L7', 'Mancera Paris Black Gold EDP', 0, 'Pháp', 'Nước hoa nam Mancera Paris Black Gold EDP là một trong số những tầng hương đem đến sự tao nhã, thanh lịch dành cho các quý ông muốn khẳng định bản thân mình, muốn tìm kiếm sự độc tôn và khác biệt.', 'Nước hoa nam Mancera Paris Black Gold EDP (Mancera Black Gold) là một trong số những tầng hương đem đến sự tao nhã, thanh lịch dành cho các quý ông muốn khẳng định bản thân mình, muốn tìm kiếm sự độc tôn và khác biệt, thể hiện lên được sự đẳng cấp, sang trọng ngay vào lần đầu tiên ngửi thấy nó.', 'Nước hoa dành cho nam Mancera Black Gold chính hãng là dòng nước hoa thuộc nhóm hương Da thuộc được hãng Mancera Paris cho ra mắt vào năm 2017. Nhắc về Mancera cũng chính là nói đến Pierre Montale - nhà pha chế nước hoa nổi tiếng, người đàn ông gần như gắn liền cả cuộc đời mình cùng tình yêu với Trầm hương, với Oud. \r\nKhác với những dòng hương đem lại sự mạnh mẽ dành cho nam giới, Mancera Black Gold Eau De Parfum là chai nước hoa nam được ưa chuộng đưa tới mẫu hình của một người đàn ông sang trọ', 'Có thể nói sự hiện diện của Oud có trong gần như mọi tác phẩm của nhà pha chế Pierre Montale, đến mức ông dùng những từ ngữ mỹ miều nhất để diễn tả về nó, chính là “Wood of Gods” - \"Thứ gỗ của Chúa trời\". Và Oud cũng có mặt trong siêu phẩm của nhà Mancera, Black Gold - “Vàng Đen”, một mùi hương mà có thể bạn chỉ cần ngửi thôi và nhắm mắt lại, bạn có thể thấy cả một câu chuyện dài, nước hoa Mancera Black Gold EDP như đang kể lại chuyến hành trình của chính bản thân Trầm hương vậy.', 'Hương Đầu: Chi cam chanh, Gỗ trầm hương, Hoa Oải Hương, Quế, Nhục đậu khấu\r\n\r\nHương giữa: Hoa nhài, Hoa tím, Hoa hồng, Hương biển, Lá hoắc hương\r\n\r\nHương cuối: Cỏ hương bài, Hương gỗ, Da thuộc, Hổ phách, Xạ hương', 'Chai nước hoa hương gỗ Mancera Black Gold 120ml chính hãng có thiết kế đầy ấn tượng với tông màu đen huyền bí. Kiểu dáng chai nước hoa hình trụ tròn sang trọng, điểm nhấn là một bông hoa tông màu vàng được in ở thân chai bắt mắt tạo nên sự đẳng cấp khác biệt. Thân chai được làm từ khối trụ thủy tinh chắc nịch màu đen, lòng thủy tinh cân đối, nắp chai vặn xoắn, được cất trong 1 chiếc túi da mềm trước khi bỏ trong hộp giấy. Một phong cách thiết kế sang trọng, mãn nhãn cho người sở hữu chai nước hoa cao cấp này.', 'Nước hoa chiết Mancera Black Gold chính hãng từ Parfumerie được chiết ra từ chai gốc chính hãng bằng dụng cụ chuyên dụng nên đảm bảo vẫn chuẩn mùi và giữ được độ lưu hương như chính nguyên bản. Vì vậy, bạn đừng quá lo lắng việc nên mua nước hoa chiết hay nước hoa nguyên hộp (Fullbox) chai gốc chính hãng nhé, tất cả đều nằm ở sở thích, nhu cầu và ngân sách chi tiêu dành cho nước hoa của bạn mà thôi.\r\nChai nước hoa Mancera Black Gold chiết 10ml/ 20ml/ 30ml có dạng xịt phun sương, thiết kế đơn giản bằng thuỷ tinh trong suốt, vỏ chai dày thể hiện sự chắc chắn, nắp chai màu bạc hoặc màu đen làm tăng sự hài hoà và tinh tế của tổng thể chai nước hoa.', 'Mỗi lẫn sử dụng nước hoa Mancera Black Gold, bạn có thể xịt như sau nhé:\r\n$Dưỡng ẩm da trước khi xịt (nếu có thể). Một làn da được thoa kem dưỡng ẩm chính là môi trường tốt nhất để nước hoa có chỗ bám lại và lưu hương thật lâu. Lúc này kem dưỡng ẩm đóng vai trò như lớp nền lưu trữ phân tử mùi hương bám trụ và tỏa hương tốt nhất có thể.\r\nXịt 2 shot mạnh và dứt khoát lên hai bên gáy tai (đối với nữ)/dưới cổ họng (đối với nam) hoặc những vị trí có mạch đập để nước hoa tiếp xúc với da và toả ra hương thơm đặc trưng của riêng bạn.\r\nĐể nước hoa khô tự nhiên trên da. Không dùng tay xoa mạnh nước hoa lên da, hoặc xịt nước hoa lên cổ tay rồi xoa mạnh hai cổ tay với nhau, làm như vậy các phân tử mùi hương sẽ bị xáo trộn gây biến đổi mùi.\r\nXịt thêm 1-2 shot lên ngực áo để nước hoa lưu hương lâu hơn nhé, nước hoa sẽ lưu hương trên quần áo tốt hơn trên da.$\r\nBạn là newbie hay người đã sử dụng nước hoa lâu năm. Điều này không quạn trọng khi bạn đến với cửa hàng nước hoa của Parfumerie. Nếu bạn tìm đến chúng tôi là bạn đã tìm đến với cửa hàng nước hoa chính hãng HCM. Bạn sẽ được nhân viên của cửa hàng tư vấn và chọn được một mẫu nước hoa phù hợp nhất với sở thích hương thơm, hoàn cảnh sử dụng. Bạn sẽ được test miễn phí các mẫu bạn yêu thích cho đến khi bạn hài lòng. Parfumerie sẽ rất hạnh phúc khi được phục vụ bạn tại shop của chúng tôi. Mong được gặp bạn trong thời gian sớm nhất.', 'Hương Da thuộc', 'Trên 25', 2017, 'EDP', 'Pierre Montale', 'Lâu - 7 giờ đến trên 12 giờ', 'Mạnh mẽ, Nam tính, Thu hút', 'Gần - Trong vòng một cánh tay', 'Ngày, Đêm - Xuân, Thu, Đông', '2023-04-14', 0, 0, 'WYY4KQJ13JI', 1, '74R1G6BOT5N'),
('2IPU5DANJUR', 'Maison Francis Kurkdjian Baccarat Rouge 540 Extrait De Parfum', 2, 'Pháp', 'Có thể nói mùi hương của nước hoa Baccarat Rouge 540 Extrait thơm ngọt, thơm lâu, thơm đậm sâu thứ thiệt cùng với độ lưu hương rất lâu - trên 12 giờ, phù hợp cho mọi giới tính để sử dụng hàng ngày.', 'Có thể nói mùi hương của nước hoa Baccarat Rouge 540 Extrait thơm ngọt, thơm lâu, thơm đậm sâu thứ thiệt cùng với độ lưu hương rất lâu - trên 12 giờ, phù hợp cho mọi giới tính để sử dụng hàng ngày.', 'Có thể nói mùi hương của nước hoa Baccarat Rouge 540 Extrait thơm ngọt, thơm lâu, thơm đậm sâu thứ thiệt cùng với độ lưu hương rất lâu - trên 12 giờ, phù hợp cho mọi giới tính để sử dụng hàng ngày.', 'Vẫn là mùi hương thuộc dòng Hoa cỏ phương đông và những nốt hương đặc trưng của phiên bản EDP. Thế nhưng ở phiên bản chai nước hoa lần này lại mang một màu sắc mới, vô cùng đặc biệt. Nước hoa MFK 540 Extrait đem tới sức mạnh từ thế hệ mới, cho ra những hương thơm sang trọng cùng nét trẻ trung đầy màu sắc của thời hiện đại, mang đến sự đậm đà và dấu ấn mạnh mẽ khó quên hơn cả phiên bản trước đó.\r\nBằng cách sử dụng những nốt hương Hạnh nhân và Nghệ tây, tông hương đầu mang tới sự mạnh mẽ lan tỏa xung quanh cùng một chút dư vị đăng đắng kích thích khứu giác trở nên nhạy bén hơn. Không bỏ quên những gia vị ngọt ngào, ấm áp cùng sức hút lan tỏa vốn có trong phong cách của mình, tinh chất Hoa nhài (Ai Cập), Gỗ tuyết tùng bám trên nền hương Xạ và Long diên hương để lại những nhớ nhung, lưu luyến cho bất kỳ ai mà hương thơm này chạm tới.', 'Hương Đầu: Hạnh nhân đắng, Nghệ tây\r\nHương giữa: Hoa nhài Ai Cập, Gỗ tuyết tùng\r\nHương giữa: Hoa nhài Ai Cập, Gỗ tuyết tùng', 'Bằng cách sử dụng những nốt hương Hạnh nhân và Nghệ tây, tông hương đầu mang tới sự mạnh mẽ lan tỏa xung quanh cùng một chút dư vị đăng đắng kích thích khứu giác trở nên nhạy bén hơn. Không bỏ quên những gia vị ngọt ngào, ấm áp cùng sức hút lan tỏa vốn có trong phong cách của mình, tinh chất Hoa nhài (Ai Cập), Gỗ tuyết tùng bám trên nền hương Xạ và Long diên hương để lại những nhớ nhung, lưu luyến cho bất kỳ ai mà hương thơm này chạm tới.\r\nBằng cách sử dụng những nốt hương Hạnh nhân và Nghệ tây, tông hương đầu mang tới sự mạnh mẽ lan tỏa xung quanh cùng một chút dư vị đăng đắng kích thích khứu giác trở nên nhạy bén hơn. Không bỏ quên những gia vị ngọt ngào, ấm áp cùng sức hút lan tỏa vốn có trong phong cách của mình, tinh chất Hoa nhài (Ai Cập), Gỗ tuyết tùng bám trên nền hương Xạ và Long diên hương để lại những nhớ nhung, lưu luyến cho bất kỳ ai mà hương thơm này chạm tới.', 'Hơn cả thơm & đẹp, nước hoa chính là cá tính và dấu ấn của mỗi người. Hãy chọn cửa hàng nước hoa Parfumerie - chọn lấy những mùi hương nâng niu cảm xúc tự do, mạnh mẽ và cả những yêu thương từ trái tim mình bạn nhé! Hương thơm sẽ luôn để lại những ký ức thi vị trong ta...\r\nHơn cả thơm & đẹp, nước hoa chính là cá tính và dấu ấn của mỗi người. Hãy chọn cửa hàng nước hoa Parfumerie - chọn lấy những mùi hương nâng niu cảm xúc tự do, mạnh mẽ và cả những yêu thương từ trái tim mình bạn nhé! Hương thơm sẽ luôn để lại những ký ức thi vị trong ta...', 'Mỗi lẫn sử dụng nước hoa Baccarat 540, bạn có thể xịt như sau nhé:\r\n$Dưỡng ẩm da trước khi xịt (nếu có thể). Một làn da được thoa kem dưỡng ẩm chính là môi trường tốt nhất để nước hoa có chỗ bám lại và lưu hương thật lâu. Lúc này kem dưỡng ẩm đóng vai trò như lớp nền lưu trữ phân tử mùi hương bám trụ và tỏa hương tốt nhất có thể.\r\nXịt 2 shot mạnh và dứt khoát lên hai bên gáy tai (đối với nữ)/dưới cổ họng (đối với nam) hoặc những vị trí có mạch đập để nước hoa tiếp xúc với da và toả ra hương thơm đặc trưng của riêng bạn.\r\nXịt 2 shot mạnh và dứt khoát lên hai bên gáy tai (đối với nữ)/dưới cổ họng (đối với nam) hoặc những vị trí có mạch đập để nước hoa tiếp xúc với da và toả ra hương thơm đặc trưng của riêng bạn.\r\nXịt 2 shot mạnh và dứt khoát lên hai bên gáy tai (đối với nữ)/dưới cổ họng (đối với nam) hoặc những vị trí có mạch đập để nước hoa tiếp xúc với da và toả ra hương thơm đặc trưng của riêng bạn.\r\nHơn cả thơm & đẹp, nước hoa chính là cá tính và dấu ấn của mỗi người. Hãy chọn cửa hàng nước hoa Parfumerie - chọn lấy những mùi hương nâng niu cảm xúc tự do, mạnh mẽ và cả những yêu thương từ trái tim mình bạn nhé! Hương thơm sẽ luôn để lại những ký ức thi vị trong ta...', 'Hương hoa cỏ phương Đông', 'Trên 25', 2017, 'Extrait De', 'Maison Francis Kurkdjian', 'Maison Francis Kurkdjian', 'Maison Francis Kurkdjian', 'Xa - Bán kính trong vòng 2m', 'Ngày & Đêm - Sử dụng hàng ngày', '2023-04-09', 0, 0, 'HIOSPT85874', 1, '74R1G6BOT5N'),
('2SW4N5MKFQL', 'Lancôme Tresor L\'Eau De Parfum', 1, 'Pháp', 'Hương thơm của nước hoa Lancôme Tresor đưa người ta vào một không gian đầy ma mị, mê mẩn tâm hồn bằng thứ hoa hồng dại, là lựa chọn chỉnh chu nhất cho người phụ nữ hiểu được giá trị thời gian.', 'Được ra mắt vào năm 1990 bởi bàn tay sáng giá của nhà pha chế Sophia Grojsman, nước hoa nữ Lancôme Tresor L\'Eau De Parfum được mệnh danh là \"báu vật\" của làng nước hoa. Hương thơm của Lancôme Tresor đưa người ta vào một không gian đầy ma mị, mê mẩn tâm hồn bằng thứ hoa hồng dại, là lựa chọn chỉnh chu nhất cho người phụ nữ hiểu được giá trị thời gian.', 'Nước hoa Lancôme Tresor L\'Eau De Parfum là dòng nước hoa thứ 12 Lancôme, và cũng là dòng nước hoa thành công nhất của Lancôme vì nó đã mang lại sự tự tin và niềm vui cho người sử dụng, giúp người ta cảm nhận được những nét riêng biệt độc đáo của mình mà không thể lầm lẫn với bất kỳ ai khác.', 'Đa số review nước hoa Lancôme Tresor đều đánh giá rằng hương thơm mang đến nét riêng biệt độc đáo không thể nhầm lẫn với bất kỳ ai khác với kiểu hương thơm phân tầng. Hương đầu có sự hiện diện chủ yếu của trái cây với Đào chín mọng và hương thơm của quả Mơ, tiếp ngay sau đó là hương hoa hồng nồng nàn cùng Diên vĩ mạnh mẽ, hoa Vòi voi và Violet, hương cuối đầy kích thích bởi mùi gỗ Đàn hương và Xạ hương, trái Đào cùng tạo nên mùi hương gây thương nhớ đặc biệt bền lâu ấy.', 'Hương Đầu: Quả dứa (quả thơm), Hoa tử đinh hương, Quả đào, Hoa mơ, Hoa linh lan thung lũng, Cam Bergamot, Hoa hồng\r\nHương giữa: Hoa diên vĩ, Hoa nhài, Hoa vòi voi, Hoa hồng\r\nHương cuối: Quả mơ, Gỗ đàn hương, Hổ phách, Xạ hương, Hương Vani, Quả đào', 'Mẫu chai nước hoa Lancôme Tresor 100ml đã trở thành một huyền thoại gợi lên hình ảnh một chiếc kim tự tháp thủy tinh lật ngược tinh tế, hệt như một viên kim cương lộng lẫy tọa lạc trong chiếc hộp châu báu. Màu sắc của nó làm cho ta liên tưởng tới bầu trời mang sự nồng cháy của hoàng hôn.', 'Chai nước hoa Lancome Tresor chiết 10ml/ 20ml/ 30ml có dạng xịt phun sương, thiết kế đơn giản bằng thuỷ tinh trong suốt, vỏ chai dày thể hiện sự chắc chắn, nắp chai màu bạc hoặc màu đen làm tăng sự hài hoà và tinh tế của tổng thể chai nước hoa.\r\nNước hoa chiết Lancome Tresor chính hãng từ Parfumerie được chiết ra từ chai gốc chính hãng bằng dụng cụ chuyên dụng nên đảm bảo vẫn chuẩn mùi và giữ được độ lưu hương như chính nguyên bản. Vì vậy, bạn đừng quá lo lắng việc nên mua nước hoa chiết hay nước hoa nguyên hộp (Fullbox) chai gốc chính hãng nhé, tất cả đều nằm ở sở thích, nhu cầu và ngân sách chi tiêu dành cho nước hoa của bạn mà thôi.', '$', 'Nhóm nước hoa: Hương hoa cỏ phương đông', 'Trên 25', 1990, 'EDP', 'Sophia Grojsman', 'Lâu - 7 giờ đến 12 giờ', 'Quyến rũ, Nữ tính, Gợi cảm', 'Gần - Toả hương trong vòng một cánh tay', 'Ngày, Đêm, Thu, Đông', '2023-04-19', 0, 0, '832YWLGJOPD', 1, '74R1G6BOT5N'),
('3DCQJO906FT', 'Versace Eros For Men EDT', 0, 'Ý', 'Nước hoa nam quyến rũ Versace Eros For Men EDT là mùi hương phù hợp với bất kỳ người đàn ông nào, nhưng với Parfumerie nó phù hợp hơn với những người đàn ông trưởng thành đầy bản lĩnh, cầm lên được thì bỏ xuống được, thôi thúc họ thể hiện được cái tôi một cách thông minh.', 'Với cảm hứng từ vị thần tình yêu trong thần thoại Hy Lạp, nước hoa nam Versace Eros For Men EDT là đại diện của tình yêu, là trung tâm của các hương thơm, là sự kết hợp và thể hiện của niềm đam mê vô tận và ham muốn mãnh liệt. Trên chặng đường trải nghiệm những mùi hương đầy thi vị, Versace Eros For Men chắc chắn sẽ là một sản phẩm nước hoa nam \"must have\" mà các anh cần có nhé.', '$', 'Hương Đầu: Cây bạc hà, Táo xanh, Quả chanh vàng\r\nHương giữa: Đậu Tonka, Hoa phong lữ, Hương Ambroxan\r\nHương cuối: Hương Va ni Madagascar, Cỏ hương bài, Rêu sồi, Gỗ tuyết tùng Virginia 2, Gỗ tuyết tùng Atlas', 'Nước hoa nam Versace Eros For Men EDT chính hãng mang một mùi hương ngọt ngào đầy thu hút và gợi cảm, tác động mạnh mẽ đến khứu giác. Đây là mùi hương phù hợp với bất kỳ người đàn ông nào, nhưng với Parfumerie nó phù hợp hơn với những người đàn ông trưởng thành đầy bản lĩnh, cầm lên được thì bỏ xuống được, thôi thúc họ thể hiện được cái tôi một cách thông minh.\r\nMùi hương nước hoa Versace Eros là sự pha trộn giữa tinh dầu bạch hà, táo xanh và hương chanh Ý ở hương đầu tạo nên sự dịu mát. Tiếp đó', 'Nước hoa Versace Eros For Men EDT mùi hương nam tính đầy quyến rũ là nhãn hiệu nước hoa của Ý, được ra đời vào năm 2012 do người cha đẻ là Aurelen Guichard của thương hiệu Givaudan sáng tạo nên. Versace Eros For Men mang một hương vị nam tính đầy mạnh mẽ thể hiện sự cuốn hút và gợi cảm của nam giới.\r\nHãng Versace đã cho thiết kế chai xanh ngọc trong suốt đầy ấn tượng, Versace Eros ẩn giấu hương thơm mạnh mẽ, cá tính pha chút nồng ấm của gỗ Phương Đông. Hình dáng bên ngoài của chai nước hoa sang trọng như một mê cung, như muốn nhấn mạnh lên sự bí ẩn của nó.', 'Parfumerie tin rằng yếu tố tiên quyết của các anh khi chọn nước hoa cho riêng mình chính là độ lưu hương và toả hương đầy ấn tượng, tăng sự cuốn hút mọi người xung quanh. Nước hoa nam Versace Eros có thể lưu hương từ 7 đến 12 tiếng, phù hợp để các anh sử dụng hàng ngày, bất kể ngày đêm hay khí hậu môi trường như thế nào bởi hương thơm rất tươi mát, nam tính, ngọt ngào vừa phải và vô cùng quyến rũ.\r\nNước hoa chiết Versace Eros từ Parfumerie được chiết ra từ chai gốc chính hãng bằng dụng cụ chuyên dụng nên đảm bảo vẫn chuẩn mùi và giữ được độ lưu hương như chính nguyên bản. Vì vậy, bạn đừng quá lo lắng việc nên mua nước hoa chiết hay nước hoa nguyên hộp (Fullbox) chai gốc chính hãng nhé, tất cả đều nằm ở sở thích, nhu cầu và ngân sách chi tiêu dành cho nước hoa của bạn mà thôi.\r\nChai nước hoa chiết Versace Eros For Men EDT có dạng xịt và được thiết kế đơn giản bằng thuỷ tinh trong suốt, vỏ chai dày thể hiện sự chắc chắn, nắp chai màu bạc hoặc màu đen làm tăng sự hài hoà và tinh tế của tổng thể chai nước hoa.', '$', 'Hương thơm dương xỉ', 'Trên 25', 2012, 'EDT', 'Aurelien Guichard', 'Lâu - 7 giờ đến 12 giờ', 'Nam tính, Gợi cảm, Thu hút', 'Xa - Trong vòng 2m', 'Ngày & Đêm - Sử dụng hàng ngày', '2023-04-14', 0, 0, 'US0CNGTXXYK', 1, '74R1G6BOT5N'),
('5SSYRD30Z4B', 'Mancera Paris Cedrat Boise EDP', 2, 'Pháp', 'Hầu hết review nước hoa Mancera Cedrat Boise đều đánh giá đây chính là sản phẩm mang đến cho người dùng một trải nghiệm mùi hương vô cùng tuyệt vời và khó quên bằng những nốt hương vô cùng đặc sắc. Bạn hãy thử một lần và cảm nhận sự đặc biệt này nhé!', 'Nước hoa Mancera Paris Cedrat Boise EDP mang đậm sắc hương của hương cam chanh thơm ngát, sở hữu mùi hương không sinh ra để dành cho đám đông nhưng làm mê đắm những ai có nội tâm sâu sắc và mãi vương vấn sau một vài lần thưởng thức.', 'Chắc chắn, Mancera là một thương hiệu còn quá mới lạ trong ngành nước hoa thế giới, thậm chí là chưa từng được nhắc tới, nhưng trong giới nước hoa niche, nước hoa unisex Mancera Paris Cedrat Boise tuy có tuổi đời còn non trẻ nhưng lại là một trong những thương hiệu nước hoa xa xỉ khiến nhiều thương hiệu lâu đời phải nể trọng. ', 'Ma lực hương thơm của nước hoa Mancera Cedrat Boise chính hãng bắt đầu từ những nốt đầu tiên của hương cam bergamot, chanh vàng sicili, quả lý chua đen đã khơi dậy cảm giác chỉnh chu có phần hơi nghiêm túc, mạnh mẽ, cuốn trôi đi những điều lơ đãng. Rồi sau đó từ tầng hương kế tạo bất ngờ với những nốt hương nhộn nhịp, đầy vẻ sống động của hương trái cây và lá cây hoắc hương. Cuối cùng để lại dáng hương ung dung, giao hòa sâu lắng nhẹ nhàng của gỗ đàn hương, tuyết tùng, da thuộc, rêu sồi. \r\n\r\nCó thể nói với những note đầu với hương Cam Bergamot giúp Mancera Cedrat Boise tròn vai với chai nước hoa dành cho nữ. Khi chuyển note hương giữa sang hương cuối với Gỗ đàn hương sẽ là sự lựa chọn nước hoa nam tuyệt vời\r\n\r\nHầu hết review nước hoa Mancera Cedrat Boise đều đánh giá đây chính là sản phẩm mang đến cho người dùng một trải nghiệm mùi hương vô cùng tuyệt vời và khó quên bằng những nốt hương vô cùng đặc sắc. Bạn hãy thử một lần và cảm nhận sự đặc biệt này nhé!', 'Hương Đầu: Cam Bergamot, Quả chanh vàng Sicili, Quả lý chua đen, Hương gia vị cay\r\nHương giữa: Hương trái cây, Hoa nhài nước, Lá cây hoắc hương\r\nHương cuối: Gỗ đàn hương, Gỗ tuyết tùng, Da thuộc, Rêu sồi Moss, Xạ hương trắng, Hương Vani', 'Chai nước hoa Mancera Cedrat Boise 120ml được làm từ khối trụ thủy tinh trong suốt chắc nịch size lớn, lộ lòng thủy tinh cân đối, nắp chai vặn xoắn cũng chắc chắn, được cất trong 1 chiếc túi da mềm trước khi bỏ trong hộp giấy. Một phong cách thiết kế sang trọng, mãn nhãn cho người sở hữu chai nước hoa cao cấp này.\r\n\r\nNếu một lần được dùng thử hương vị chai nước hoa này, bạn sẽ không bao giờ thất vọng bởi nước hoa Mancera Paris Cedrat Boise chính hãng mang đến cho người dùng một trải nghiệm mùi hương vô cùng tuyệt vời và khó quên bằng những nốt hương vô cùng đặc sắc.', 'Nước hoa chiết Mancera Cedrat Boise chính hãng từ Parfumerie được chiết ra từ chai gốc chính hãng bằng dụng cụ chuyên dụng nên đảm bảo vẫn chuẩn mùi và giữ được độ lưu hương như chính nguyên bản. Vì vậy, bạn đừng quá lo lắng việc nên mua nước hoa chiết hay nước hoa nguyên hộp (Fullbox) chai gốc chính hãng nhé, tất cả đều nằm ở sở thích, nhu cầu và ngân sách chi tiêu dành cho nước hoa của bạn mà thôi.\r\n\r\nChai chiết nước hoa Mancera Cedrat Boise 10ml/ 20ml/ 30ml có dạng xịt phun sương, thiết kế đơn giản bằng thuỷ tinh trong suốt, vỏ chai dày thể hiện sự chắc chắn, nắp chai màu bạc hoặc màu đen làm tăng sự hài hoà và tinh tế của tổng thể chai nước hoa.', '$', 'Hương cam chanh thơm ngát', 'Trên 25', 2011, 'EDP', 'Pierre Montale', 'Lâu - 7 giờ đến 12 giờ', 'Trẻ trung, Tươi mới, Sành điệu', 'Xa - Toả hương trong vòng bán kính 2 mét', 'Ngày, Đêm, Xuân, Hạ', '2023-04-20', 0, 0, 'WYY4KQJ13JI', 1, '74R1G6BOT5N'),
('5T35Q7IOSXC', 'Tom Ford Lost Cherry EDP', 2, 'Pháp', 'Như một ly rượu sành điệu, càng thưởng thức càng chẳng thể cưỡng nổi sự ngọt ngào, hấp dẫn của những trái cherry chín mọng, Tomford Lost Cherry sẽ khiến chàng và nàng trở nên ấn tượng và thu hút hơn giữa mùa đông giá lạnh. Từng giọt Lost Cherry được miêu tả như một câu chuyện mà ai cũng muốn được lắng nghe.', 'Nước hoa Tom Ford Lost Cherry EDP chắc chắn là một trong những mùi hương đắt đỏ mà bất kì tín đồ nước hoa nào cũng ao ước được sử dụng một lần. Phiên bản nước hoa Tom Ford Cherry đặc biệt từ nhà Tom Ford này như một ly rượu sành điệu, càng thưởng thức càng chẳng thể cưỡng nổi sự ngọt ngào, hấp dẫn của những trái cherry chín mọng, khiến chàng và nàng trở nên ấn tượng và thu hút hơn giữa mùa đông giá lạnh.', 'Nước hoa unisex Tom Ford Lost Cherry EDP có thể tạm dịch là “Những quả anh đào lạc lối” - xoay quanh nốt hương quả anh đào, một thứ quả ngọt ngào mọng nước thường mang lại cảm giác khiêu khích, quyến rũ vừa ngây thơ trong nghệ thuật mùi hương nước hoa. Từng giọt Lost Cherry được miêu tả như một câu chuyện mà ai cũng muốn được lắng nghe.', 'Nước hoa Tom Ford Cherry chính hãng Tom Ford được ví như một ly rượu trái cây mang sắc đỏ cherry đẹp quên sầu. Trong đó là cả một sự tương phản đầy thu hút giữa sự trẻ trung của kẹo và phần thịt thơm ngon bên trong. Từ đó giúp bất cứ ai chạm phải mùi hương này đều cảm nhận được sự ngọt ngào, quyến rũ và đầy sang trọng mà sản phẩm mang lại.\r\n\r\nỞ những note hương đầu tiên, sự thanh mát và ngọt ngào của Cherry hòa quyện trong hương vị của trái hạnh nhân đắng, khiến cho ly rượu khai màu bằng một hương vị đậm đà, đê mê. Sự quyến rũ của Lost Cherry ngay từ đầu được thể hiện một cách khéo léo mà không hề vồ vã nhờ vào mùi hương dịu ngọt của hạnh nhân. Nhanh thôi, bạn sẽ cảm nhận được.\r\nKhi bạn còn đang đắm chìm trong vị ngọt ngào của Cherry thì sự kết hợp của hoa hồng Turkish và hoa nhài Sambac sẽ khơi gợi các giác quan bên trong bạn. Bản nhạc tinh tế ấy không chỉ dừng lại với sự dịu dàng, những nốt hương thú vị thi nhau nhảy múa trên làn da, một chút tinh nghịch lẫn một chút duyên dáng khiến cho bất cứ ai vô tình va phải hương thơm này đều bị cuốn hút một cách không thể nào giải thích được.\r\n\r\nNhư một câu chuyện tràn ngập những điều bất ngờ ở cái kết, tầng hương cuối cùng của nước hoa Tom Ford Cherry là tổng hợp những mùi hương nồng ấm vô cùng thú vị của nhựa Peru, đậu Tonka, gỗ đàn hương và gỗ tuyết tùng, biến các mùi hương tươi trẻ trở nên quyến rũ tột cùng, mang tính chất “gây nghiện” cực cao.', 'Hương Đầu: Quả anh đào chua, Liquor, Hạnh nhân đắng\r\nHương giữa: Quả anh đào chua, Hoa hồng Thổ Nhĩ Kỳ, Hoa nhài Sambac\r\nHương cuối: Nhựa thơm Peru, Đậu Tonka, Gỗ đàn hương, Cỏ hương bài, Gỗ tuyết tùng', 'Nước hoa chiết Tom Ford Lost Cherry chính hãng từ Parfumerie được chiết ra từ chai gốc chính hãng bằng dụng cụ chuyên dụng nên đảm bảo vẫn chuẩn mùi và giữ được độ lưu hương như chính nguyên bản. Vì vậy, bạn đừng quá lo lắng việc nên mua nước hoa chiết hay nước hoa nguyên hộp (Fullbox) chai gốc chính hãng nhé, tất cả đều nằm ở sở thích, nhu cầu và ngân sách chi tiêu dành cho nước hoa của bạn mà thôi.\r\n\r\nChai nước hoa Tom Ford Lost Cherry chiết 10ml/ 20ml/ 30ml có dạng xịt phun sương, thiết kế đơn giản bằng thuỷ tinh trong suốt, vỏ chai dày thể hiện sự chắc chắn, nắp chai màu bạc hoặc màu đen làm tăng sự hài hoà và tinh tế của tổng thể chai nước hoa.', 'Tom Ford vừa tung ra mùi hương mới cho dịp Thu Đông 2018 với tên gọi Lost Cherry hiện đang gây chấn động thị trường bởi concept cùng với tên gọi hứa hẹn đây là quả bom tấn ngọt ngào sắp bùng nổ. Nước hoa Tom Ford Cherry thuộc phân khúc cao cấp của Tom Ford trong dòng Private Blend đình đám nên mức giá khá đắt đỏ, thế nhưng tất cả chẳng thể ngăn cản sự hâm mộ của các tín đồ nước hoa bởi sự sang trọng và sức hấp dẫn mãnh liệt mà dòng sản phẩm này mang lại.\r\nCác thiết kế của Tom Ford thường đem đến những cảm nhận vừa đơn giản lại vừa sang trọng. Tom Ford Lost Cherry nằm trong chai nước hoa vuông vức khiến ta mê mẩn từ giây phút đầu tiên sắc đỏ của trái cherry làm chủ đạo. Sở hữu lớp vỏ ngoài phủ bóng trong suốt để lộ lớp thịt đỏ bên trong, sự kết hợp giữa màu sắc và dáng chai càng tôn lên vẻ cao cấp và xa xỉ của sản phẩm đình đám này.\r\n', '$', 'Hương hoa cỏ phương đông', 'Trên 25', 2018, 'EDP', 'Chưa rõ', 'Tạm ổn - Từ 4 giờ đến trên 6 giờ', 'Quyến rũ, Sang trọng, Thu hút', 'Gần - Toả hương trong vòng một cánh tay', 'Ngày & Đêm - Thu Đông, Xuân Hạ', '2023-04-19', 0, 0, '6I1Z0BMV34S', 1, '74R1G6BOT5N'),
('7A645CGI9S3', 'Tom Ford Noir Extreme EDP', 0, 'Mỹ', 'Nước hoa Tom Ford Noir Extreme dành cho nam mang hương vị phương đông tươi mới, phù hợp cho những chàng trai cá tính, luôn đề cao sự chỉnh chu của bản thân.', 'Ra mắt vào năm 2015, nước hoa nam Tom Ford Noir Extreme đem tới những âm hưởng của các Quý ông giàu có phương Đông đẫm trong sắc đen huyền bí, sang trọng. Toàn bộ thiết kế lẫn mùi hương đều được cân bằng một cách hoàn hảo từ trong ra ngoài, thể hiện sự tự tin, quyến rũ và bí ẩn khiến người đối diện khó có thể rời mắt.\r\n\r\n', 'Nước hoa Tom Ford Noir Extreme dành cho nam mang hương vị phương đông tươi mới, phù hợp cho những chàng trai cá tính, luôn đề cao sự chỉnh chu của bản thân.', 'Không cần phải thể hiện quá nhiều, nước hoa nam sang trọng Tom Ford Noir Extreme sẽ dễ dàng đánh gục bất kì cô gái nào ngay từ tầng hương đầu tiên bằng sự tươi mới, ngọt ngào với Quýt hồng, Bạch đậu khấu và Nhục đậu khấu.\r\nTầng hương giữa bộc lộ nhiều khía cạnh bằng cách xoay chuyển những nốt hương một cách nhịp nhàng, Nhũ hương thấm nhẹ vào các nốt hương Hoa chậm rãi, toát lên sự quyến rũ, ấm áp đầy mê hoặc trong mắt đối phương.\r\nBằng sự linh hoạt trong phong thái lẫn cảm xúc, anh chàng Tom Ford Noir Extreme để lại ấn tượng sâu sắc ở những nốt hương cuối thông qua sự hoà quyện của hương Gỗ, Hổ phách cùng Gỗ đàn hương trầm lắng và kết thúc nhẹ nhàng với lời hứa hẹn dịu ngọt của Vanilla.', 'Hương Đầu: Quả quýt hồng, Hoa cam Neroli, Nghệ tây, Nhục đậu khấu, Bạch đậu khấu\r\nHương giữa: Nhũ hương, Hoa hồng, Hoa nhài, Hoa cam, Hương Kulfi\r\nHương cuối: Hương gỗ, Hổ phách, Gỗ đàn hương, Hương Vani', 'Nước hoa chiết Tom Ford Noir Extreme chính hãng từ Parfumerie được chiết từ chai gốc chính hãng vẫn đảm bảo chuẩn mùi và giữ được độ lưu hương như chính nguyên bản. Chai nước hoa chiết dạng xịt có thiết kế đơn giản bằng thuỷ tinh trong suốt, vỏ chai dày thể hiện sự chắc chắn, nắp chai màu bạc hoặc màu đen làm tăng sự hài hoà và tinh tế của tổng thể chai nước hoa. ', '$', '$', 'Hương gỗ phương đông', 'Trên 25', 2015, 'EDP', 'Sonia Constant', 'Lâu - 7 giờ đến 12 giờ', 'Nam tính', 'Gần - Toả hương trong vòng một cánh tay', 'Ngày, Đêm, Thu, Đông', '2023-04-15', 0, 0, '6I1Z0BMV34S', 1, '74R1G6BOT5N'),
('7PAJJXBPS6Z', 'Bleu De Chanel EDP', 0, 'Pháp', 'Nước hoa nam Bleu De Chanel EDP là chai nước hoa vô cùng phổ biến. Mùi hương ăn khách tuyệt đối này hoàn mĩ ở chỗ hợp với hết thảy phái mạnh, dùng được trong mọi thời điểm.', 'Đứng top chai nước hoa nam thành công nhất hành tinh, chính là nước hoa nam Bleu De Chanel EDP. Đối với những anh \"soái ca\" đích thực đang tìm kiếm một mùi hương nam tính lịch lãm và đẳng cấp thì lựa chọn đỉnh nhất quả đất chính là anh chàng Bleu De Chanel này đấy nhé.', 'Nước hoa Bleu De Chanel EDP chính hãng là chai nước hoa nam bán chạy nhất thế giới từ thương hiệu Chanel của Pháp. Sở hữu hương vị nam tính lịch lãm, mùi hương của Bleu De Chanel đã \"đánh cắp\" hàng triệu trái tim người phụ nữ.', 'Rõ ràng, nước hoa nam chính hãng Bleu De Chanel EDP là chai nước hoa vô cùng phổ biến. Mùi hương ăn khách tuyệt đối này hoàn mĩ ở chỗ hợp với hết thảy phái mạnh, dùng được trong mọi thời điểm.\r\nSở hữu 3 tầng hương xen kẽ thay phiên nhau \"đốn tim\" người đối diện, anh chàng Bleu De Chanel mở đầu sự nam tính của mình với hương Chanh vàng quyện cùng Ớt hồng, sự từng trải và tinh tế của một người đàn ông dày dạn kinh nghiệm được bộc lộ một cách trực tiếp và rõ ràng hơn bao giờ hết. Kết thúc hương đầu với sự thanh mát của Bạc hà, mùi hương lôi cuốn phảng phất trên da như vừa mới bước ra từ phòng tắm mát lạnh.\r\nLớp hương đầu và hương giữa như hòa quyện với nhau, lớp hương này đan xen lớp hương khác tạo nên một hương vị đầy màu sắc và hứng khởi, khiến nhiều trái tim phải rung động bởi sự mạnh mẽ của Gừng và phong vị lịch lãm của Hương hoa nhài quyện lẫn với Dưa vàng. Đi vào lớp hương cuối, anh sẽ khiến cho bất cứ ai đến gần mình đều cảm thấy đầy kinh ngạc bởi sự gần gũi và ấm áp đến bất ngờ khi Gỗ tuyết tùng và Hổ phách thi nhau toả hương một cách đầy cám dỗ.', 'Good', 'Được nhà thiết kế Jacques Polge cho ra đời vào năm 2010, nước hoa nam Bleu De Chanel đã phá vỡ mọi qui ước, mọi khuôn khổ mang đến hương thơm gợi cảm, lịch lãm và đầy bản lĩnh của phái mạnh. Dù bản nâng cấp 2014 không thay đổi quá nhiều so với bản 2010 nhưng hiệu ứng mang đến lại được lòng đấng mày râu hơn hẳn. Vẫn là hương gỗ thơm đặc trưng nhưng lại có độ lưu hương lâu, hoàn toàn thích hợp cho những khi hoạt động ngoài trời.\r\nSở hữu thiết kế chai thủy tinh màu đen trong suốt, sang trọng và huyền bí, chai nước hoa Bleu De Chanel khối hình vuông như viên đá Sapphire óng ánh, thu hút ánh nhìn của đối phương một cách mạnh mẽ. Nắp chai cũng được thiết kế tinh xảo, trên nắp khắc logo thương hiệu Chanel và nắp được tạo nam châm, khi đóng nam châm hít lại với nhau rất chắc chắn. Chính sự tỉ mỉ trong thiết kế đã khiến chai nước hoa Chanel Bleu Chanel trở nên đẳng cấp hơn bao giờ hết.', 'Nước hoa chiết Bleu De Chanel EDP chính hãng từ shop nước hoa Parfumerie được chiết ra từ chai gốc chính hãng bằng dụng cụ chuyên dụng nên đảm bảo vẫn chuẩn mùi và giữ được độ lưu hương như chính nguyên bản. Vì vậy, bạn đừng quá lo lắng việc nên mua nước hoa chiết hay nước hoa nguyên hộp (Fullbox) chai gốc chính hãng nhé, tất cả đều nằm ở sở thích, nhu cầu và ngân sách chi tiêu dành cho nước hoa của bạn mà thôi.\r\nChai nước hoa chiết Bleu De Chanel EDP có dạng xịt phun sương, thiết kế đơn giản bằng thuỷ tinh trong suốt, vỏ chai dày thể hiện sự chắc chắn, nắp chai màu bạc hoặc màu đen làm tăng sự hài hoà và tinh tế của tổng thể chai nước hoa.\r\n', 'Mỗi lẫn sử dụng nước hoa Bleu De Chanel EDP, bạn có thể xịt như sau nhé:\r\n$Dưỡng ẩm da trước khi xịt (nếu có thể). Một làn da được thoa kem dưỡng ẩm chính là môi trường tốt nhất để nước hoa có chỗ bám lại và lưu hương thật lâu. Lúc này kem dưỡng ẩm đóng vai trò như lớp nền lưu trữ phân tử mùi hương bám trụ và tỏa hương tốt nhất có thể. \r\nXịt 2 shot mạnh và dứt khoát lên hai bên gáy tai (đối với nữ)/dưới cổ họng (đối với nam) hoặc những vị trí có mạch đập để nước hoa tiếp xúc với da và toả ra hương thơm đặc trưng của riêng bạn.\r\nĐể nước hoa khô tự nhiên trên da. Không dùng tay xoa mạnh nước hoa lên da, hoặc xịt nước hoa lên cổ tay rồi xoa mạnh hai cổ tay với nhau, làm như vậy các phân tử mùi hương sẽ bị xáo trộn gây biến đổi mùi.\r\nXịt thêm 1-2 shot lên ngực áo để nước hoa lưu hương lâu hơn nhé, nước hoa sẽ lưu hương trên quần áo tốt hơn trên da.$', 'Hương gỗ thơm', 'Trên 25', 2010, 'EDP', 'Jacques Polge.', 'Tạm ổn - 4 giờ đến trên 6 giờ', 'Nam tính, Lịch lãm, Sang trọng', 'Gần - Toả hương trong vòng một cánh tay', 'Ngày & Đêm - Sử dụng hàng ngày', '2023-04-14', 0, 0, 'U4V3T4Q8J9G', 1, '74R1G6BOT5N'),
('7TCLMDUPLMZ', 'Gucci Bloom EDP', 1, 'Đức', 'Nếu mỗi chai nước hoa thường được ví von như một “bản giao hưởng” hương vị thì nước hoa nữ Gucci Bloom EDP chắc hẳn sẽ là tác phẩm thanh âm đậm hương, ngọt vị nhất.', 'Với ý tưởng lưu giữ trọn vẹn những khoảnh khắc tràn ngập sắc hương của khu vườn thơ mộng, nước hoa nữ Gucci Bloom EDP như đưa nàng tới gần hơn với thiên nhiên tươi mát, trong lành ngoài kia. Nước hoa Gucci Bloom hồng sở hữu hương thơm tinh tế đầy cuốn hút của một khu vườn trăm hoa đua nở, đem lại cho các bạn gái sự quyến rũ đầy thuần khiết khi sử dụng.', 'Nếu mỗi chai nước hoa thường được ví von như một “bản giao hưởng” hương vị thì nước hoa nữ  Gucci Bloom EDP chính hãng chắc hẳn sẽ là tác phẩm thanh âm đậm hương, ngọt vị nhất.', 'Là một cơn gió mát của mùa xuân tràn ngập sức sống, nước hoa nữ Gucci Bloom hồng giống một bông hoa nhỏ bé đang từ từ nở rộ, tràn ngập giữa một vườn hoa trắng muốt đầy trang nhã, hoà quyện cùng hương thơm cỏ cây đầy chân thật vào buổi sớm mai, chất chứa những giọt sương còn đọng lại vào đêm hôm trước. \r\nChi ngân, Nhài và Huệ như hoà quyện vào gió, tạo nên một điệu nhảy của ngàn vạn cánh hoa tươi, mang đến những khoảnh khắc kì diệu, khác biệt và không hề gây buồn chán. Rễ cây diên vĩ giúp mùi hương trở nên hài hòa và mềm mại trên da, khiến cho người phụ nữ trở nên gợi cảm nhưng vẫn gần gũi. Gỗ đàn hương và Vani hòa quyện với nhau như một cặp đôi đang khiêu vũ, trong veo đầy thơ mộng. Gucci Bloom là một giấc mộng của mùa xuân, mơ màng dưới bóng cây cổ thụ, nhưng biết hé nở và tỏa hương khi cần.\r\n', 'Hương đầu: Hương cam, Cỏ xanh tự nhiên\r\nHương giữa: Hoa huệ trắng, Hoa nhài Sambac, Hoa kim ngân\r\nHương cuối: Rễ cây Orris, Gỗ đàn hương, Vanilla', 'Ra mắt vào thời điểm tháng 8 năm 2017, nước hoa Gucci Bloom là thành quả sáng tạo miệt mài đến từ bộ đôi tài năng của thương hiệu Gucci – giám đốc sáng tạo Alessandro Michele cùng bậc thầy về mùi hương Alberto Morillas. Là phiên bản được ra mắt tiếp nối thành công rực rỡ từ dòng nước hoa Gucci đình đám nhưng sắc sảo và sâu lắng hơn. Sự thanh lịch và tinh tế thể hiện đầy rõ ràng phía sau mùi hương này nhưng vẫn đủ bộc lộ nét mạnh mẽ bí ẩn của người phụ nữ hiện đại đương thời.\r\nBên cạnh hương thơm thanh lịch thì vẻ ngoài tinh tế đầy sang chảnh của Gucci Bloom EDP cũng là một điểm nhấn khó phai trong lòng các tín đồ nước hoa Gucci nữ. Với thiết kế vuông vắn thời thượng cùng chất liệu sơn mài độc đáo, chai nước hoa nữ hương ngọt Gucci Bloom mang đến cảm giác mới mẻ đầy cuốn hút khi cầm trên tay. Thân chai được trang trí bằng gam hồng pastel cùng logo Gucci nổi tiếng, vừa mang cảm giác thân thiện lại cực kỳ sang trọng, quý phái.', 'Nước hoa chiết Gucci Bloom EDP chính hãng từ Parfumerie được chiết ra từ chai gốc chính hãng bằng dụng cụ chuyên dụng nên đảm bảo vẫn chuẩn mùi và giữ được độ lưu hương như chính nguyên bản. Vì vậy, bạn đừng quá lo lắng việc nên mua nước hoa chiết hay nước hoa nguyên hộp (Fullbox) chai gốc chính hãng nhé, tất cả đều nằm ở sở thích, nhu cầu và ngân sách chi tiêu dành cho nước hoa của bạn mà thôi.\r\nChai nước hoa chiết Gucci Bloom hồng có dạng xịt phun sương, thiết kế đơn giản bằng thuỷ tinh trong suốt, vỏ chai dày thể hiện sự chắc chắn, nắp chai màu bạc hoặc màu đen làm tăng sự hài hoà và tinh tế của tổng thể chai nước hoa.', '$', 'Hương hoa cỏ, phấn thơm', 'Trên 25', 2017, 'EDP', 'Alberto Morillas', 'Lâu - 7 giờ đến trên 12 giờ', 'Quyến rũ, Thanh lịch, Dịu dàng', 'Gần - Trong vòng 1 cánh tay', 'Ngày & Đêm - Sử dụng hàng ngày', '2023-04-19', 0, 0, 'K09JN58VOO0', 1, '74R1G6BOT5N'),
('CF71W92R45Q', 'Tom Ford Black Orchid EDP', 2, 'Mỹ', 'Nước hoa Tom Ford Black Orchid chính hãng mang hương thơm trầm ấm, bí ẩn khiến người sử dụng trở nên đặc biệt hơn. Hương thơm nước hoa đặc biệt sành điệu và cá tính, như một làn khói khó nắm bắt lại vô cùng quyến rũ bao phủ lên cơ thể, trao cho người sử dụng những cảm nhận đầy sang trọng và cuốn hút vô cùng.', 'Nước hoa Tom Ford Black Orchid EDP sang trọng đầy gợi cảm với mùi hương đậm hương vị của phong lan và các loại gia vị, sẽ mang đến một phong cách hiện đại, năng động cùng hương thơm tỏa sáng vô cùng lôi cuốn. Hương thơm nước hoa Black Orchid xứng đáng nằm trong bộ sưu tập danh dự những chai nước hoa tốt nhất từ các thương hiệu nước hoa nổi tiếng trên thế giới.', 'Nước hoa Tom Ford Black Orchid chính hãng mang hương thơm trầm ấm, bí ẩn khiến người sử dụng trở nên đặc biệt hơn. Hương thơm nước hoa đặc biệt sành điệu và cá tính, như một làn khói khó nắm bắt lại vô cùng quyến rũ bao phủ lên cơ thể, trao cho người sử dụng những cảm nhận đầy sang trọng và cuốn hút vô cùng.', 'Nước hoa unisex Tom Ford Black Orchid EDP được kết cấu ba tầng hương khác nhau, đem lại cho chủ nhân của nó chính là sự quyến rũ, nồng nàn, đê mê. Mang trong mình hương hoa cay nồng, Black Orchid có độ tỏa hương khá mạnh mẽ cùng khả năng lưu lại hương thơm khá lâu trên làn da của bạn.\r\n\r\nBạn sẽ cảm nhận lớp hương đầu tiên của Black Orchid là tổ hợp các thành phần mùi hương vani ngọt ngào, hương hoa cay nồng, hương trái cây đa dạng và hương hoa trắng nhẹ nhàng. Nhờ vào hương Nấm cục hòa quyện với Hoắc hương, mà từ đó tạo nên một mùi hương đất tự nhiên trong nước hoa, góp phần làm cho mọi người khó cưỡng lại được hương thơm của Black Orchid.\r\nLớp hương giữa là sự kết hợp táo bạo thành phần trái cây đỏ, hoa sen và phong lan đen. Những sâu lắng và nồng nàn đến từ lớp hương cuối bao gồm hoắc hương, đàn hương, socola đen, hổ phách, cỏ vetiver, vani và nhựa. Đây cũng là chất liệu tạo vẻ kiêu kì, độ lưu hương bền bỉ và phong cách rất Black Orchid của Tom Ford. Mang đến cho người dùng cảm giác như đang bước vào một khu vườn hoa trái sau trận mưa rào, vẫn còn cảm nhận rõ rệt mùi hương đất ẩm thanh khiết và sảng khoái.\r\n\r\nMang nồng độ Eau De Parfum (EDP) với lưu lượng tinh dầu ở mức cao nên hương thơm của nước hoa Black Orchid có thể lưu trên da từ 8 đến hơn 12 tiếng. Hương thơm nước hoa trầm ấm, cá tính bung tỏa trong khoảng cách xa, phù hợp nhất để sử dụng trong không khí của tiết trời mùa thu và mùa đông.', 'Hương Đầu: Hoa nhài, Hoa sơn chi, Hoa ngọc lan tây, Cam Bergamot, Quả chanh vàng Amalfi, Quả quýt hồng, Quả lý chua đen, Nấm cục\r\nHương giữa: Gia vị, Hương trái cây, Hoa sen, Hoa phong lan, Hoa sơn chi, Hoa nhài, Hoa ngọc lan tây\r\nHương cuối: Cỏ hương bài, Gỗ đàn hương, Cây hoắc hương, Hổ phách, Nhang (Hương), Hương Vani (Vanille), Sô cô la Mêxicô, Xạ hương trắng', 'Black Orchid là mẫu nước hoa được thiết kế bởi người sáng lập ra hãng nước hoa Givaudan vào năm 2006. Theo như lời của Tom Ford, ông muốn tạo ra một chai nước hoa thể hiện sự sang trọng đầu tiên của thế kỷ 21. Đối với các nhà thiết kế nước hoa, hoa lan đen (Black Orchid) là một loài hoa lai hiếm gặp và có mùi hương làm say mê những ai gặp phải chúng.\r\nCác thiết kế của Tom Ford thường đem đến những cảm nhận vừa đơn giản lại vừa sang trọng. Nước hoa Tom Ford Black Orchid EDP 100ml giữ nguyên thiết kế mang tính biểu tượng, tinh tế và đầy bí ẩn, phản ánh sự quý phái, sang trọng. Chai thủy tinh được bao phủ bởi sắc đen bí ẩn, dáng chai cổ điển với những đường vân kẻ sọc quen thuộc. Miếng kim loại vàng sáng bóng ghi nổi bật tên và logo của thương hiệu là điểm nhấn nổi bật, kết hợp cùng với màu sắc và dáng chai càng tôn lên vẻ đẹp tổng thể đầy đẳng cấp.', 'Nước hoa chiết Tom Ford Black Orchid chính hãng từ Parfumerie được chiết ra từ chai gốc chính hãng bằng dụng cụ chuyên dụng nên đảm bảo vẫn chuẩn mùi và giữ được độ lưu hương như chính nguyên bản. Vì vậy, bạn đừng quá lo lắng việc nên mua nước hoa chiết hay nước hoa nguyên hộp (Fullbox) chai gốc chính hãng nhé, tất cả đều nằm ở sở thích, nhu cầu và ngân sách chi tiêu dành cho nước hoa của bạn mà thôi.\r\n\r\nChai chiết nước hoa từ Parfumerie có dạng xịt phun sương, thiết kế đơn giản bằng thuỷ tinh trong suốt, vỏ chai dày thể hiện sự chắc chắn, nắp chai màu bạc hoặc màu đen làm tăng sự hài hoà và tinh tế của tổng thể chai nước hoa.', '$', 'Hương hoa cỏ phương đông', 'Trên 25', 2006, 'EDP', 'Givaudan', 'Rất lâu - Trên 12 giờ', 'Gợi cảm, Sang trọng, Lôi cuốn', 'Xa - Bán kính trong vòng 2m', 'Ngày & Đêm - Thu & Đông', '2023-04-20', 0, 0, '6I1Z0BMV34S', 1, '74R1G6BOT5N'),
('EHZFO2NYANF', 'Kilian Black Phantom Memento Mori EDP', 0, 'Pháp', 'Hương thơm của nước hoa Kilian đầu lâu chứa đựng sự mạnh mẽ của bóng đêm và sự ngọt ngào của tình yêu, khiến khí chất sang trọng và quyến rũ của phái đẹp cũng như phái mạnh được nổi bật.', 'Nước hoa unisex Kilian Black Phantom Memento Mori EDP thông qua hình ảnh chiếc đầu lâu cười ngạo nghễ, hàm ý nhắc nhở rằng mỗi phút giây ta được sống đều phải trân trọng trước cái chết. Hương thơm của nước hoa Kilian Black Phantom đầu lâu chứa đựng sự mạnh mẽ của bóng đêm và sự ngọt ngào của tình yêu, khiến khí chất sang trọng và quyến rũ của phái đẹp cũng như phái mạnh được nổi bật.', 'Nước hoa Kilian đầu lâu chính hãng là một mùi hương Vani phương Đông dành cho cả nam giới lẫn nữ giới. Thương hiệu By Kilian luôn luôn biến chuyển, luôn luôn thay đổi đến mức kinh ngạc và thú vị bởi óc sáng tạo khiếu hài hước có phần kì quặc trong giới nước hoa.', '“Memento mori” là một câu thành ngữ, tiếng Latin có nghĩa là \"Hãy nhớ rằng ngươi sẽ phải chết\", là một lời nhắc nhở mang tính nghệ thuật hoặc biểu tượng về việc không thể tránh khỏi cái chết. Đó là lí do tại sao, nước hoa Black Phantom by Kilian lại mang trong mình vẻ ngoài khá rùng rợn, ma mị khi đem biểu tượng hộp sọ đính bên trên chiếc hộp chứa đựng mùi hương này.\r\nNghe thì có vẻ khá là đáng sợ khi hương thơm này mang ý nghĩa từ một câu nói khá nhạy cảm và chẳng vui vẻ gì. Nhưng ngược lại hoàn toàn đằng sau câu chuyện đó, nước hoa unisex Kilian Black Phantom lại mang đến cho chủ nhân của mình sự quyến rũ, sang trọng, đầy xúc cảm ngọt ngào cho mỗi ngày trôi qua đều trở nên tuyệt vời và đáng quý, nhắc nhở chúng ta trân trọng cuộc sống mình.\r\nKilian Black Phantom như có sức mạnh vô hình khiến ta chẳng thể cưỡng nổi. Ngay từ cú xịt đầu tiên, bạn sẽ hoàn toàn bị ấn tượng bởi sự hoà quyện của hương rượu Rhum pha cùng đường một cách mạnh bạo, xộc thẳng vào mũi khiến tất cả các tế bào khướu giác hoàn toàn thức tỉnh. Hương Cà phê lôi cuốn kết hợp cùng vị Caramel thơm béo quyện trong lớp Socola đen tạo nên hỗn hợp đủ khiến người ta ngất ngây và ám ảnh mãi về sự kết hợp đến hoàn hảo này. Nét chấm phá của Hoa vòi voi dịu nhẹ, thư thái được thêm vào cho nốt hương gỗ không bị quá nồng để rồi khi hương thơm bay dần trong không khí, mùi hương gỗ đàn hương hòa trong vị thơm bùi hạnh nhân để lại những dư vị đầy ấm áp và dễ chịu.\r\nTheo các review nước hoa Kilian Black Phantom, sản phẩm này chắc chắn sẽ là một ứng cử viên nặng ký trong bộ sưu tập nước hoa dành cho nam của quý ông lịch lãm hay nước hoa dành cho nữ của quý bà sành điệu. Tuy nhiên, bạn nên tận hưởng hương thơm này vào những buổi tiệc tùng khi ảnh hoàng hôn đã buông xuống vào mùa hè hoặc trong cái lạnh se se của những ngày mưa, Black Phantom sẽ để lại trong bạn những cảm nhận rõ nét và vô cùng ấn tượng.', 'Hương chính: Rượu Rum, Đường, Sô cô la đen, Cà phê, Đường thắng, Hạnh nhân, Hoa vòi voi, Gỗ đàn hương', 'Nước hoa Kilian Black Phantom được cho ra mắt vào năm 2017 với tên gọi cực độc: “Black Phantom”. Và Black Phantom Memento Mori gây SHOCK từ hộp đựng chễm chệ một chiếc đầu lâu cười ngạo nghễ, đến mùi hương ma mị và giật gân tựa như toát ra từ một ly cocktail sóng sánh, quyến rũ nhưng đầy bí ẩn.\r\nThiết kế ấn tượng của chai nước hoa Black Phantom by Kilian 50ml có một không hai trong lịch sử thế giới nước hoa. Black Phantom gây chú ý với người đối diện ngay từ lần đầu tiên với hình dáng chiếc hộp sọ Voldemort đầy lạ mắt. Sự tò mò khiêu khích người ấy khiến người dùng muốn tìm hiểu về mùi hương bên trong và phát hiện ra nhiều cảm xúc đam mê tiềm ẩn của chính mình.\r\nCó bạn nào đã từng trải qua một thanh xuân \"không điện thoại\", chỉ có trao đổi với nhau qua \"những lá thư tay\" không nhỉ? Nếu bạn chọn chill cùng mùi hương nước hoa Kilian Đầu Lâu này cùng một chút lành lạnh của ngày mưa Sài Gòn, một chút lãng mạn của âm nhạc, một tách cafe đắng vị hoà vào một chút cảm xúc của những kí ức thanh xuân ấy... Thật sự là một trải nghiệm rất tuyệt vời luôn đấy nhé.', 'Nước hoa chiết Kilian Black Phantom chính hãng từ Parfumerie được chiết ra từ chai gốc chính hãng bằng dụng cụ chuyên dụng nên đảm bảo vẫn chuẩn mùi và giữ được độ lưu hương như chính nguyên bản. Vì vậy, bạn đừng quá lo lắng việc nên mua nước hoa chiết hay nước hoa nguyên hộp (Fullbox) chai gốc chính hãng nhé, tất cả đều nằm ở sở thích, nhu cầu và ngân sách chi tiêu dành cho nước hoa của bạn mà thôi.\r\nChai nước hoa Kilian đầu lâu chiết 10ml/ 20ml/ 30ml có dạng xịt phun sương, thiết kế đơn giản bằng thuỷ tinh trong suốt, vỏ chai dày thể hiện sự chắc chắn, nắp chai màu bạc hoặc màu đen làm tăng sự hài hoà và tinh tế của tổng thể chai nước hoa.', 'Mỗi lẫn sử dụng nước hoa Black Phantom, bạn có thể xịt như sau nhé:\r\n$Dưỡng ẩm da trước khi xịt (nếu có thể). Một làn da được thoa kem dưỡng ẩm chính là môi trường tốt nhất để nước hoa có chỗ bám lại và lưu hương thật lâu. Lúc này kem dưỡng ẩm đóng vai trò như lớp nền lưu trữ phân tử mùi hương bám trụ và tỏa hương tốt nhất có thể.\r\nXịt 2 shot mạnh và dứt khoát lên hai bên gáy tai (đối với nữ)/dưới cổ họng (đối với nam) hoặc những vị trí có mạch đập để nước hoa tiếp xúc với da và toả ra hương thơm đặc trưng của riêng bạn.\r\nĐể nước hoa khô tự nhiên trên da. Không dùng tay xoa mạnh nước hoa lên da, hoặc xịt nước hoa lên cổ tay rồi xoa mạnh hai cổ tay với nhau, làm như vậy các phân tử mùi hương sẽ bị xáo trộn gây biến đổi mùi.\r\nXịt thêm 1-2 shot lên ngực áo để nước hoa lưu hương lâu hơn nhé, nước hoa sẽ lưu hương trên quần áo tốt hơn trên da.$\r\nMỗi mùi hương là một câu chuyện. Nếu bạn chưa có tìm được mùi hương yêu thích hãy để Parfumerie giúp bạn kể một câu chuyện ấn tượng nhất về bạn. Khi bạn tìm liên hệ với cửa hàng nước hoa Parfumerie ở tphcm bạn sẽ được tư vấn miễn phí một mùi hương mà phù hợp với sở thích và tính cách con người bạn nhất. Tại Parfumerie bạn sẽ được thử những nhóm mùi hương hương nước hoa hoàn toàn miễn phí cho đến khi bạn chọn được một chai nước hoa ưng ý.', 'Hương Vani phương Đông', 'Trên 25', 2017, 'EDP', 'Sidonie Lancesseur', 'Lâu - 7 giờ đến 12 giờ', 'Bí ẩn, Quyến rũ, Tinh tế', 'Gần - Trong vòng 1 cánh tay', 'Ngày & Đêm - Thu & Đông', '2023-04-14', 0, 0, 'PQHBL6PYYS3', 1, '74R1G6BOT5N'),
('HV75EYBUO0T', 'Giorgio Armani Acqua Di Giò Pour Homme EDT', 0, 'Pháp', 'Nước hoa nam chính hãng Acqua Di Giò Pour Homme hay còn gọi là Giò Trắng giúp thể hiện sự nam tính rất rõ ràng ở mỗi người đàn ông bằng hương thơm tinh khiết, ngào ngạt và nồng nàn mùi gỗ, mùi hương thoang thoảng của gió biển, quả chín và cây cỏ.', 'Một trong những chai nước hoa nam tươi mát mà nhất định bất cứ chàng trai nào cũng nên sở hữu chắc chắn chính là nam Giorgio Armani Acqua Di Giò Pour Homme EDT. Hương thơm tinh tế và đầy cuốn hút của nước hoa Giò Trắng giúp cho phái mạnh được thư giãn trong sự sảng khoái đầy nam tính, luôn tự tin là chính mình và thu hút biết bao cô gái.', 'Nước hoa nam Giò trắng là chai nước hoa nam Acqua Di Gio Armani kinh điển với mùi hương được thử thách qua thời gian. Một hương thơm tươi mát, hiện đại, tinh khiết, mang lại vẻ nam tính và cuốn hút cho phái mạnh.', 'Với hương thơm tinh khiết thoang thoảng của gió biển pha chút nồng nàn mùi gỗ cùng mùi hương ngào ngạt của quả chín và cây cỏ, nước hoa nam Acqua Di Giò Pour Homme là sự thể hiện rõ ràng của bản chất nam tính ở mỗi người đàn ông. Đa số các review về Giò Trắng đều đánh giá đây là mùi hương nhẹ nhàng và chân thật, tươi sáng và hiện đại, là một người đàn ông tự do, giản dị nhưng luôn để lại sự nhớ nhung cho mọi cô gái đã từng bước qua, dù chỉ là vô tình. \r\nMùi hương tươi mát của nước hoa Giorgio Armani Acqua Di Giò Pour Homme Eau De Toillet được hình thành từ sự hòa quyện giữa mùi hương ngòn ngọt mằn mặn của nước biển và ánh nắng mặt trời Địa Trung Hải ấm áp, ôm ấp lấy làn da người đàn ông một cách nhẹ nhàng đầy sảng khoái. Mở đầu với những nốt hương cam chanh đầy tươi mát và sảng khoái, phảng phất đâu đó hương hoa nhài thanh lịch cùng hoa cam trẻ trung.\r\n\r\nHương nước biển mặn mòi nắng gió kết hợp cũng một chuỗi hương hoa được kết hợp một cách khéo léo khiến cho những nốt hương giữa thêm phần ngào ngạt và lôi cuốn. Ở tầng hương cuối, sự kết hợp của Xạ hương trắng, Hoắc hương và Gỗ tuyết tùng, xen lẫn trong đó mùi hương rêu sồi xanh mát đặc biệt nam tính sẽ khiến mùi hương trở nên ấm áp, nhẹ nhàng đầy lưu luyến hơn nữa.', 'Hương Đầu: Quả cam, Quả chanh xanh, Quả quýt hồng, Hoa nhài, Cam Bergamot, Quả chanh vàng, Hoa cam Neroli\r\nHương giữa: Hoa anh thảo, Nhục đậu khấu, Cây mộng tê, Ngò thơm, Hoa tím, Hoa lan Nam Phi, Hương nước biển, Quả đào, Hoa lan dạ hương, Hoa hồng, Hoa nhài, Cây hương thảo, Hương Calone\r\nHương cuối: Hổ phách, Cây hoắc hương, Rêu sồi, Gỗ tuyết tùng, Xạ hương trắng', 'Giò Trắng được ra mắt lần đầu tiên vào năm 1996. Nguồn cảm hứng để Alberto Morillas sáng tạo nên chai nước hoa này là khi ông đang đi nghỉ trên hòn đảo xinh đẹp Pantellerie, sự tươi mát mặn mòi của biển cùng ánh nắng ấp ám đã làm cảm xúc của ông dâng trào tạo nên chai nước hoa này. \r\n\r\nMẫu chai của nước hoa Acqua Di Giò Pour Homme được thiết kế đơn giản với thân chai thủy tinh mờ với tên của thương hiệu Giorgio Armani bên trên. Chiếc nắp chai đi kèm có hình trụ tròn với màu sắc kim loại khá mạnh mẽ và nam tính. Chai nước hoa nam Giò Trắng 100ml được mệnh danh là một kiệt tác và là một tác phẩm kinh điển trong thế giới nước hoa cao cấp.', 'Chai chiết nước hoa Giò Trắng chính hãng có dạng xịt phun sương, thiết kế đơn giản bằng thuỷ tinh trong suốt, vỏ chai dày thể hiện sự chắc chắn, nắp chai màu bạc hoặc màu đen làm tăng sự hài hoà và tinh tế của tổng thể chai nước hoa.\r\n\r\nNước hoa chiết chính hãng Giorgio Armani Acqua Di Giò Pour Homme EDT từ Parfumerie được chiết ra từ chai gốc chính hãng bằng dụng cụ chuyên dụng nên đảm bảo vẫn chuẩn mùi và giữ được độ lưu hương như chính nguyên bản. Vì vậy, bạn đừng quá lo lắng việc nên mua nước hoa chiết hay nước hoa nguyên hộp (Fullbox) chai gốc chính hãng nhé, tất cả đều nằm ở sở thích, nhu cầu và ngân sách chi tiêu dành cho nước hoa của bạn mà thôi.', '$', 'Hương thơm biển', 'Trên 20', 1996, 'EDT', 'Alberto Morillas', 'Tạm ổn - 3 giờ đến 6 giờ', 'Nam tính, Hiện đại, Lôi cuốn', 'Gần - Trong vòng 1 cánh tay', 'Ngày & Đêm - Thời tiết oi bức', '2023-04-20', 0, 0, 'DBEO8D7RHGI', 1, '74R1G6BOT5N');
INSERT INTO `tb_nuochoa` (`id_nuochoa`, `ten_nuochoa`, `gioitinh`, `xuatxu`, `mota`, `thongtinchinh`, `tongquan`, `huongthom`, `loai_huongthom`, `thietke`, `dadanghoa`, `huongdansudung`, `nhomnuochoa`, `dotuoikhuyendung`, `namramat`, `nongdo`, `nhaphache`, `doluuhuong`, `phongcach`, `dotoahuong`, `thoidiemphuhop`, `ngaybat_dauban`, `danhgia`, `status`, `id_thuonghieu`, `id_nhacungcap`, `id_nguoiquanly`) VALUES
('IONOU6CRUQP', 'Tom Ford Tobacco Vanille EDP', 2, 'USA', 'Lấy cảm hứng từ câu lạc bộ - nơi có thể hút thuốc lá của các quý ông nước Anh, Tobacco Vanille EDP mang đến sự lôi cuốn đầy mạnh mẽ, sự ấm áp đáng tin cậy, một cảm giác quyền lực và có thể nói đây một mùi hương dành cho những Big Boss đích thực.', 'Nước hoa của Tom Ford được biết đến không chỉ là những mùi hương cao cấp, đằng sau nó là những câu chuyện đầy thú vị. Và, nước hoa Tom Ford Tobacco Vanille được ví như một người từng trải, đã chiêm nghiệm được rất nhiều thứ trong cuộc đời. Hương thơm Unisex mở ra thế giới đầy ắp mùi hương thủ công mỹ nghệ khó cưỡng và gây nghiện, cho bạn một phong cách đầy sang trọng, bí ẩn và vô cùng thu hút.', 'Với Tobacco Vanille, Tom Ford đã mở ra cánh cửa của một thế giới tràn ngập những mùi hương thủ công đầy mê hoặc và khó cưỡng. Và riêng với nước hoa unisex Tobacco Vanille, hương thơm tinh tế sẽ đưa bạn chu du tới mọi ngõ ngách trong những câu lạc bộ sang trọng, quý phái và sành điệu.\r\n', 'Tobacco Vanille càng chiêm nghiệm lâu sẽ càng trở nên khó cưỡng. Mở đầu bằng thứ hương thơm khá gắt và mãnh liệt, hương thuốc lá hăng hăng kết hợp cùng các gia vị cay tạo nên hương thơm khá nồng. Thế nhưng sau một khoảng thời gian thì mùi hương sẽ có phần lắng xuống và được thế chỗ bởi sự cuốn hút của Vanilla mềm mại hợp tác ăn ý với sự ngọt ngào của đậu Tonka. Song song đó, hương Cacao thu hút cũng quyện chặt lấy bó hoa thuốc lá đậm đà khiến Tobacco Vanille dần trở nên khô ấm, dễ chịu và ngọt ngào hơn. Cuối cùng kết lại là nốt hương gỗ ấm ấp cùng điểm nhấn bất ngờ là hoa quả khô, hương thơm mang đến một sự trưởng thành, chín chắn đầy sang trọng.', 'Hương Đầu: Cây thuốc lá, Hương gia vị cay\r\nHương giữa: Đậu Tonka, Hoa thuốc lá, Hương Va ni, Ca cao\r\nHương cuối: Trái cây sấy khô, Hương gỗ', 'Nước hoa Tom Ford Tobacco Vanille EDP dành cho nam và nữ được ra mắt năm 2007 và là 1 trong 12 mùi hương tuyệt vời nằm trong bộ sưu tập Private Blend của Tom Ford. Lấy cảm hứng từ câu lạc bộ - nơi có thể hút thuốc lá của các quý ông nước Anh, Tobacco Vanille EDP mang đến sự lôi cuốn đầy mạnh mẽ, sự ấm áp đáng tin cậy, một cảm giác quyền lực và có thể nói đây một mùi hương dành cho những Big Boss đích thực.\r\nLấy cảm hứng từ những lọ thủy tinh điều chế nước hoa màu nâu sẫm, mẫu chai của Tobacco Vanille phỏng theo hình dáng quân cờ làm bằng thủy tinh với thiết kế có khả năng dùng để trang trí, giúp cải thiện không gian nội thất của người sử dụng. Một thiết kế đầy ấn tượng bởi sự tối giản và đậm chất tay nghề thủ công.', 'Nước hoa chiết Tom Ford Tobacco Vanille chính hãng từ Parfumerie được chiết ra từ chai gốc chính hãng bằng dụng cụ chuyên dụng nên đảm bảo vẫn chuẩn mùi và giữ được độ lưu hương như chính nguyên bản. Vì vậy, bạn đừng quá lo lắng việc nên mua nước hoa chiết hay nước hoa nguyên hộp (Fullbox) chai gốc chính hãng nhé, tất cả đều nằm ở sở thích, nhu cầu và ngân sách chi tiêu dành cho nước hoa của bạn mà thôi.\r\nChai nước hoa chiết Tom Ford Tobacco Vanille EDP có dạng xịt phun sương, thiết kế đơn giản bằng thuỷ tinh trong suốt, vỏ chai dày thể hiện sự chắc chắn, nắp chai màu bạc hoặc màu đen làm tăng sự hài hoà và tinh tế của tổng thể chai nước hoa.', '$', 'Hương cay nồng phương đông', 'Trên 25', 2007, 'EDP', 'Chưa rõ', 'Rất lâu - Trên 12 giờ', 'Bí ẩn, Hiện đại, Quyến rũ', 'Rất xa - Toả hương trong vòng bán kính trên 2 mét', 'Ngày & Đêm - Thu Đông', '2023-04-15', 0, 0, '6I1Z0BMV34S', 1, '74R1G6BOT5N'),
('OEM82613FXJ', 'Creed Aventus For Men EDP', 2, 'Việt Nam', 'Nhắc đến Aventus hẳn những ai yêu thích nước hoa đều phải dành cho nó nhiều mỹ từ, và từ ngữ miêu tả về nó một cách chân thật nhất đó là \"vua\" của nước hoa. Nước hoa nam Creed Aventus đầy sang trọng và hiện đại, mang một phong cách giản dị, nhưng đầy chững chạc dành riêng cho phái mạnh.', 'Nước hoa nam Creed Aventus For Men EDP là mùi hương nam tính, thách thức, tự tin, lạc quan và đầy hoài bão dành cho những người đàn ông giàu tham vọng và chí lớn. Khí chất của Creed Aventus tỏa ra là vậy, quyền lực một cách tuyệt đối, tôn vinh sức mạnh, tầm nhìn và sự thành công.', 'Nhắc đến Aventus hẳn những ai yêu thích nước hoa đều phải dành cho nó nhiều mỹ từ, và từ ngữ miêu tả về nó một cách chân thật nhất đó là \"vua\" của nước hoa. Nước hoa Creed Aventus nam đầy sang trọng và hiện đại, mang một phong cách giản dị nhưng đầy chững chạc dành riêng cho phái mạnh.', 'Mùi hương nước hoa Creed Aventus chính hãng được thương hiệu Creed chính thức công nhận là mùi hương được yêu thích nhất trong lịch sử phát triển của nhà nước hoa, đồng thời, cũng là sáng tạo mùi hương đương đại cao cấp vô cùng thành công. \r\nAventus có hương mở đầu với trái cây tươi mát đầy ngọt ngào của cam bergamot, táo và dứa, và đặc biệt là quả lý chua đen tạo nên một cốt cách phi thường, bản lĩnh và có thừa sự cuốn hút. Lớp hương giữa có pha trộn gia vị cay nồng và hương gỗ để làm dịu bớt vị ngọt của lớp hương đầu, mùi hương chuyển dần sang một hương thơm nam tính hơn như một sự khẳng định Creed không dành cho những kẻ yếu đuối, nhút nhát, bởi khi khoác lên lớp giáp Aventus, sự cuốn hút và nể trọng đã được đẩy lên một tầng cao nhất dành cho những người xung quanh. Lớp hương cuối cùng ấm áp và dịu nhẹ với hương vani, hổ phách và rêu sồi khô, sẽ gây ấn tượng mạnh cho những nơi mà bạn có mặt như một thỏi nam châm hút mọi ánh nhìn. \r\nMột thập niên đã qua, theo các đánh giá nước hoa Creed nam thì cơn sốt Aventus vẫn chưa hề có dấu hiệu hạ nhiệt. Người ta thấy nhiều fan hâm mộ Aventus đến mức sưu tập cùng lúc nhiều lọ Aventus khác nhau. Chưa dừng lại ở đó, các hãng nước hoa khác cũng đành nghiêng mình thán phục, rồi tranh thủ làm mùi hương na ná phong cách Aventus cũng bởi sự thành công tuyệt đối ngoài sức tưởng tượng của mùi hương này.', 'Hương Đầu: Cam Bergamot, Quả lý chua đen, Quả dứa (quả thơm), Quả táo xanh\r\nHương giữa: Gỗ Bu-lô, Cây hoắc hương, Hoa hồng, Hoa nhài Morocco\r\nHương cuối: Xạ hương, Rêu cây sồi, Hương Va ni (Vanille), Long diên hương', 'Lấy cảm hứng từ cuộc đời đầy kịch tính của hoàng đế Napoleon (chiến tranh, hòa bình, lãng mạn), nước hoa nam Creed Aventus EDP chính hãng được giới thiệu vào năm 2010 dưới sự sáng tạo của Olivier Creed 6th Generation. \r\nLấy cảm hứng từ cuộc đời đầy kịch tính của hoàng đế Napoleon (chiến tranh, hòa bình, lãng mạn), nước hoa nam Creed Aventus EDP chính hãng được giới thiệu vào năm 2010 dưới sự sáng tạo của Olivier Creed 6th Generation. \r\nVà ngay cả thiết kế chai nước hoa Creed Aventus For Men 100ml cũng hướng tới hình tượng Napoleon cưỡi ngựa ra chiến trường, một sự mạnh mẽ và đầy chất sử thi. Mang một thiết kế mới lạ độc đáo, nửa dưới của chai nước hoa nam Creed Aventus hơi vuông được bao bọc bởi một băng quấn bằng da màu đen, logo nước hoa màu trắng được khắc vào thân chai. Sự tương phản này như một bản vẽ của Hoàng Đế Napoleon – người đã truyền cảm hứng vào chai nước hoa Pháp này.', 'Và ngay cả thiết kế chai nước hoa Creed Aventus For Men 100ml cũng hướng tới hình tượng Napoleon cưỡi ngựa ra chiến trường, một sự mạnh mẽ và đầy chất sử thi. Mang một thiết kế mới lạ độc đáo, nửa dưới của chai nước hoa nam Creed Aventus hơi vuông được bao bọc bởi một băng quấn bằng da màu đen, logo nước hoa màu trắng được khắc vào thân chai. Sự tương phản này như một bản vẽ của Hoàng Đế Napoleon – người đã truyền cảm hứng vào chai nước hoa Pháp này.\r\nChai nước hoa Creed Aventus chiết 10ml/ 20ml/ 30ml có dạng xịt phun sương, thiết kế đơn giản bằng thuỷ tinh trong suốt, vỏ chai dày thể hiện sự chắc chắn, nắp chai màu bạc hoặc màu đen làm tăng sự hài hoà và tinh tế của tổng thể chai nước hoa.', 'Chai nước hoa Creed Aventus chiết 10ml/ 20ml/ 30ml có dạng xịt phun sương, thiết kế đơn giản bằng thuỷ tinh trong suốt, vỏ chai dày thể hiện sự chắc chắn, nắp chai màu bạc hoặc màu đen làm tăng sự hài hoà và tinh tế của tổng thể chai nước hoa.\r\n$Dưỡng ẩm da trước khi xịt (nếu có thể). Một làn da được thoa kem dưỡng ẩm chính là môi trường tốt nhất để nước hoa có chỗ bám lại và lưu hương thật lâu. Lúc này kem dưỡng ẩm đóng vai trò như lớp nền lưu trữ phân tử mùi hương bám trụ và tỏa hương tốt nhất có thể.\r\nXịt 2 shot mạnh và dứt khoát lên hai bên gáy tai (đối với nữ)/dưới cổ họng (đối với nam) hoặc những vị trí có mạch đập để nước hoa tiếp xúc với da và toả ra hương thơm đặc trưng của riêng bạn.\r\nĐể nước hoa khô tự nhiên trên da. Không dùng tay xoa mạnh nước hoa lên da, hoặc xịt nước hoa lên cổ tay rồi xoa mạnh hai cổ tay với nhau, làm như vậy các phân tử mùi hương sẽ bị xáo trộn gây biến đổi mùi.\r\nXịt thêm 1-2 shot lên ngực áo để nước hoa lưu hương lâu hơn nhé, nước hoa sẽ lưu hương trên quần áo tốt hơn trên da.$\r\nHẳn là mỗi khi chúng ta muốn chọn cho mình một chai nước hoa chính hãng, chúng ta đều mong muốn chọn được một mùi hương phù hợp nhất với sở thích và tính cách con người bạn. Cũng như thời tiết có 4 mùa Xuân Hạ Thu Đông thì nước hoa cũng có những note hương phù hợp với từng mùa trong năm. Hãy liên hệ với cửa hàng nước hoa Parfumerie để được tư vấn và chọn cho mình một chai nước hoa chính hãng phù hợp nhất. Tại Parfumerie, chúng tôi nói KHÔNG với nước hoa hàng giả/ hàng nhái (fake) vì thế bạn có thể hoàn toàn tin tưởng khi mua nước hoa tại Parfumerie', 'Hương trái cây Chypre (Síp)', 'Trên 25', 2010, 'EDP', 'Olivier Creed Sixth Generation', 'Lâu - 7 giờ đến 12 giờ', 'Nam tính, Chững chạc, Giản dị', 'Gần - Toả hương trong vòng một cánh tay', 'Ngày & Đêm - Thu, Xuân, Hạ', '2023-04-08', 0, 0, 'HAUSAT82934', 1, '74R1G6BOT5N'),
('Q4TM7UYXS79', 'Dior Sauvage EDP', 0, 'Pháp', 'Như đem người đàn ông trở về những ngày rong ruổi trên bất kể nẻo đường, lửa trại đêm bùng lên tí tách từng vệt đỏ tía, nước hoa Dior Sauvage EDP dành cho nam nhen nhúm cho ta sự tò mò, thích thú cùng ít nhiều niềm thỏa mãn được tận hưởng, được chinh phục, được yêu chính bản thân mình trong từng khắc.', 'Nước hoa nam Dior Sauvage EDP của thương hiệu Christian Dior ra đời năm 2018, được biết biết đến là phiên bản tiếp nối sự thành công vang dội của dòng sản phẩm năm 2015 đã làm cánh mày râu “điêu đứng”. Mùi hương của Dior Sauvage EDP đậm chất nam tính, mạnh mẽ, cuốn hút từ tầng hương đời thường và chinh phục những người khó tính nhất.', 'Nước hoa nam chính hãng Dior Sauvage EDP thuộc nhóm hương thơm dương xỉ phương Đông, mùi hương chính vẫn được giữ nguyên ở phiên bản cũ là hương gỗ tuy nhiên hương gia vị cay nồng được tăng lên cùng với đó là hương nồng ấm ngọt ngào của vanilla, sự hòa quyện tinh tế vừa mới mẻ vừa quen thuộc tạo nên phong cách mùi hương độc đáo cho quý ông hiện đại.\r\nLấy ý tưởng từ những bối cảnh hoang dã nhất, Dior Sauvage EDP gói ghém tông hương thanh cay, mộc mạc mà chân thật trong mình. Sự tươi mát, mạnh mẽ ', 'Như đem người đàn ông trở về những ngày rong ruổi trên bất kể nẻo đường, lửa trại đêm bùng lên tí tách từng vệt đỏ tía, nước hoa Dior Sauvage EDP chính hãng nhen nhúm cho ta sự tò mò, thích thú cùng ít nhiều niềm thỏa mãn được tận hưởng, được chinh phục, được yêu chính bản thân mình trong từng khắc.\r\n', 'Hương Đầu: Cam Bergamot\r\nHương giữa: Hoa Oải Hương, Xuyên tiêu, Hồi hương, Nhục đậu khấu\r\nHương cuối: Hương Ambroxan, Hương Va ni', 'Được ra mắt vào năm 2018 - không lâu sau sự thành công vang dội của Christian Dior Sauvage EDT - Dior Sauvage EDP xuất hiện với những cải tiến về mùi hương, hòa quyện về cảm xúc hơn cho người dùng. Nhà sáng chế nước hoa tài ba Francois Demachy đã lấy cảm hứng từ sa mạc trong cảnh hoàng hôn để sáng tạo ra nước hoa Sauvage EDP.\r\nFrancois Demachy đã pha trộn sự mát mẻ của ban đêm, không khí nóng bỏng của sa mạc để hòa quyện và đốt cháy để toát lên mùi hương sâu sắc. Trong thời gian khi thiên nhiên thức dậy và bầu trời đang lên, một ma thuật mới lại mở ra, mang đến cho nam giới một phong cách nam tính, mạnh mẽ, nhưng không kém phần lôi cuốn. \r\nChai nước hoa nam chính hãng Dior Sauvage EDP mẫu mới nhất mang đến sức hút vô cùng mãnh liệt. Chai nước hoa tuy đơn giản nhưng đầy tinh tế, màu xanh đen đậm của nắp và nhạt dần ở phần đáy tạo điểm nhấn so với phiên bản trước, mang dấu ấn của sự đẳng cấp, sang trọng và thời thượng của thương hiệu Christian Dior.', 'Nước hoa chiết Dior Sauvage EDP chính hãng từ Parfumerie được chiết ra từ chai gốc chính hãng bằng dụng cụ chuyên dụng nên đảm bảo vẫn chuẩn mùi và giữ được độ lưu hương như chính nguyên bản. Vì vậy, bạn đừng quá lo lắng việc nên mua nước hoa chiết hay nước hoa nguyên hộp (Fullbox) chai gốc chính hãng nhé, tất cả đều nằm ở sở thích, nhu cầu và ngân sách chi tiêu dành cho nước hoa của bạn mà thôi.\r\nChai chiết nước hoa từ Parfumerie có dạng xịt phun sương, thiết kế đơn giản bằng thuỷ tinh trong suốt, vỏ chai dày thể hiện sự chắc chắn, nắp chai màu bạc hoặc màu đen làm tăng sự hài hoà và tinh tế của tổng thể chai nước hoa.', 'Mỗi lẫn sử dụng nước hoa Dior Sauvage EDP, bạn có thể xịt như sau nhé:\r\n$Dưỡng ẩm da trước khi xịt (nếu có thể). Một làn da được thoa kem dưỡng ẩm chính là môi trường tốt nhất để nước hoa có chỗ bám lại và lưu hương thật lâu. Lúc này kem dưỡng ẩm đóng vai trò như lớp nền lưu trữ phân tử mùi hương bám trụ và tỏa hương tốt nhất có thể.\r\nXịt 2 shot mạnh và dứt khoát lên hai bên gáy tai (đối với nữ)/dưới cổ họng (đối với nam) hoặc những vị trí có mạch đập để nước hoa tiếp xúc với da và toả ra hương thơm đặc trưng của riêng bạn.\r\nĐể nước hoa khô tự nhiên trên da. Không dùng tay xoa mạnh nước hoa lên da, hoặc xịt nước hoa lên cổ tay rồi xoa mạnh hai cổ tay với nhau, làm như vậy các phân tử mùi hương sẽ bị xáo trộn gây biến đổi mùi.\r\nXịt thêm 1-2 shot lên ngực áo để nước hoa lưu hương lâu hơn nhé, nước hoa sẽ lưu hương trên quần áo tốt hơn trên da.$\r\nMỗi mùi hương là một câu chuyện. Nếu bạn chưa có tìm được mùi hương yêu thích hãy để Parfumerie giúp bạn kể một câu chuyện ấn tượng nhất về bạn. Khi bạn tìm liên hệ với cửa hàng nước hoa Parfumerie bạn sẽ được tư vấn miễn phí một mùi hương mà phù hợp với sở thích và tính cách con người bạn nhất. Tại Parfumerie bạn sẽ được thử những nhóm mùi hương hương nước hoa hoàn toàn miễn phí cho đến khi bạn chọn được một chai nước hoa ưng ý.', 'Hương dương xỉ phương Đông', 'Trên 25', 2018, 'EDP', 'Francois Demachy', 'Lâu - 7 giờ đến 12 giờ', 'Phóng khoáng, Nam tính, Cuốn hút', 'Gần - Toả hương trong vòng 1 cánh tay', 'Ngày & Đêm - Sử dụng hàng ngày', '2023-04-14', 0, 0, 'NAJ9CFQROPW', 1, '74R1G6BOT5N'),
('QMT1RFPCIMR', 'Narciso Rodriguez For Her EDP', 1, 'Pháp', 'Nước hoa nữ Narciso hồng không chỉ đẹp trong mùi hương lẫn vẻ bề ngoài, đó còn là một vẻ đẹp \"lạ\" của những cảm xúc không thể giải thích bằng lời, một thứ vũ khí riêng để bản thân nàng cảm thấy gợi cảm, quyến rũ và tự tin hơn.', 'Sát thủ gây thương nhớ trong thế giới nước hoa chính là nước hoa nữ Narciso Rodriguez For Her EDP. Bản giao hưởng nốt hương đầy giản đơn nhưng độ cuốn hút và “gây nghiện” lại khó lý giải. Muốn biết xạ hương có sức mạnh đến thế nào, hãy để bản nước hoa nữ Narciso hồng nhạt thần thánh này lôi kéo và dẫn lối con tim bạn.', 'Nước hoa nữ Narciso Rodriguez For Her EDP chính hãng mang đến mùi hương đầy quyến rũ và tràn ngập nữ tính khi kết hợp với những cánh hoa hồng rực rỡ, hương thơm đào tươi mát, xen lẫn với chút hổ phách tinh tế và đặc biệt là một mùi xạ hương gợi cảm đầy nổi bật.', 'Narciso Rodriguez luôn muốn tạo nên những sản phẩm nước hoa giúp phái nữ cảm thấy yêu thương bản thân mình hơn. Nước hoa nữ Narciso hồng nhạt không chỉ đẹp trong mùi hương lẫn vẻ bề ngoài, đó còn là một vẻ đẹp \"lạ\" của những cảm xúc không thể giải thích bằng lời, một thứ vũ khí riêng để bản thân nàng cảm thấy gợi cảm, quyến rũ và tự tin hơn.\r\nNarciso hồng được mở đầu bằng sự tươi mới của Trái đào, phảng phất hương thơm đầy hấp dẫn của hoa hồng, sau đó là chút xạ hương nhẹ nhàng hòa quyện vào bên lớp hoa hồng. Ngập trong hương giữa, hòa nhịp chung với xạ hương chính là hổ phách sắc nét. Tiếp đó, khi hương đầu dần biến mất hoàn toàn, để bù đắp thiếu hụt cho hương giữa, là hoắc hương, đàn hương lấp vào. Một sự kết hợp có đủ tươi mới lẫn đậm đà, đủ sự nữ tính lẫn chiều sâu để tạo nên sức hút khó cưỡng cho nàng. Đọng lại trên da lâu dài là xạ hương ấm áp, lay nhẹ cả hương hoa hồng, dập dìu đan xen hương gỗ, an yên và yêu đời. Đúng nghĩa những tầng hương nước hoa nữ trọn vẹn và tinh tươm nhất. ', 'Tiếp nối thành công của phiên bản EDT ra mắt vào năm 2004, phiên bản nước hoa nữ chính hãng Narciso Rodriguez For Her EDP được tiếp tục giới thiệu vào năm 2006 với mẫu thiết kế chai màu hồng nhạt và vỏ hộp màu đen. Christine Nagel và Francis Kurkdjian là hai chuyên gia nước hoa danh tiếng đã sáng tạo ra mùi hương này.\r\nBằng chất liệu thủy tinh dày, chai nước hoa Narciso Rodriguez vô cùng chắc chắn, tổng thể ngập tràn sắc hồng nữ tính, nhã nhặn đầy tiểu thư. Ngoại hình đã bộc lộ phần nào bản sắc ', '$', 'Nước hoa chiết Narciso hồng nhạt chính hãng từ Parfumerie được chiết ra từ chai gốc chính hãng bằng dụng cụ chuyên dụng nên đảm bảo vẫn chuẩn mùi và giữ được độ lưu hương như chính nguyên bản. Vì vậy, bạn đừng quá lo lắng việc nên mua nước hoa chiết hay nước hoa nguyên hộp (Fullbox) chai gốc chính hãng nhé, tất cả đều nằm ở sở thích, nhu cầu và ngân sách chi tiêu dành cho nước hoa của bạn mà thôi.\r\n\r\nChai nước hoa chiết Narciso Rodriguez For Her EDP từ Parfumerie có dạng xịt phun sương, thiết kế đơn giản bằng thuỷ tinh trong suốt, vỏ chai dày thể hiện sự chắc chắn, nắp chai màu bạc hoặc màu đen làm tăng sự hài hoà và tinh tế của tổng thể chai nước hoa.', '$', 'Hương hoa cỏ Gỗ - Xạ hương', 'Trên 25', 2006, 'EDP', 'Chưa rõ', 'Lâu - 7 giờ đến 12 giờ', 'Gợi cảm, Nữ tính, Tinh tế', 'Gần - Trong vòng 1 cánh tay', 'Ngày & Đêm - Thời tiết mát mẻ', '2023-04-19', 0, 0, 'CULHOHIJKPB', 1, '74R1G6BOT5N'),
('SF0EAJS52PV', 'Gucci Flora Gorgeous Gardenia EDP', 1, 'Đức', 'Gucci Flora Gorgeous Gardenia EDP là nước hoa của niềm vui được tạo nên bởi sự kết hợp của hoa dành dành, hương hoa nhài mặt trời, hương hoa lê tươi vui và hương đường nâu ngọt ngào, mang một mùi hương ngào ngạt hoa cỏ đầy nữ tính và sắc sảo cho phái đẹp.', 'Gucci Flora Gorgeous Gardenia bắt đầu trở lại với một phiên bản Eau de Parfum mới thể hiện sự mạnh mẽ và sắc sảo hơn so với phiên bản Eau de Toilette ban đầu. Nếu bạn là fan của một mùi hương ngào ngạt hoa cỏ nữ tính thì đừng bỏ qua nước hoa nữ chính hãng Gucci Flora Gorgeous Gardenia EDP nhé! ', 'Nước hoa nữ Gucci Flora Gorgeous Gardenia EDP chính hãng được phát hành vào năm 2021, mang hương thơm mạnh mẽ và sắc sảo hơn so với phiên bản Eau de Toilette trước đó. Đây là một lọ nước hoa của niềm vui được tạo nên bởi sự kết hợp của hoa dành dành, hương hoa nhài mặt trời, hương hoa lê tươi vui và hương đường nâu ngọt ngào.', 'Nước hoa chính hãng Gucci Flora Gorgeous Gardenia EDP mang một dấu hiệu đặc trưng của những loài hoa cùng sắc thái tươi vui, mùi hương được xây dựng xung quanh hoa hoa Dành Dành, một loài hoa được biết đến như vẻ đẹp của buổi bình minh cùng hương sắc được coi như vẹn toàn.\r\nLấy cảm hứng từ truyền thuyết này và ý tưởng về sức mạnh thần bí của nó, nốt hương hoa Dành Dành tuyệt đẹp được kết hợp với Hoa Nhài mang lại năng lượng sáng ngời như một cách để tôn vinh vẻ đẹp của các loài hoa. Mùi hương được tinh tế điểm xuyến thêm chút ngọt ngào của đường nâu và một nguồn năng lượng dồi dào tươi mát của Hoa lê tựa như sự bùng nổ ở khứu giác tạo ra một cảm giác thăng hoa, đầy sức sống.', 'Hương đầu: Hoa Lê\r\nHương giữa: Hoa Nhài, Cây Dành Dành\r\nHương cuối: Đường Nâu, Hoắc Hương', 'Chai nước hoa nữ Gucci Flora Gorgeous Gardenia EDP 100ml chính hãng được bao bọc trong một chai mới, dài, thủy tinh màu hồng sơn mài và nắp vàng sáng bóng. Một bổ sung đáng chú ý là hoa văn Flora đặc biệt, được tái tưởng tượng với thiết kế lấy cảm hứng từ tầm nhìn của Alessandro Michele. Một phần cốt lõi của bản sắc Gucci, họa tiết là bức tranh vẽ những bông hoa đầy màu sắc của nghệ sĩ Vittorio Accornero, được tạo ra cho Gucci vào năm 1966.', 'Nước hoa chiết Gucci Flora Gorgeous Gardenia EDP chính hãng từ Parfumerie được chiết từ chai gốc chính hãng vẫn đảm bảo chuẩn mùi và giữ được độ lưu hương như chính nguyên bản. Chai nước hoa chiết dạng xịt có thiết kế đơn giản bằng thuỷ tinh trong suốt, vỏ chai dày thể hiện sự chắc chắn, nắp chai màu bạc hoặc màu đen làm tăng sự hài hoà và tinh tế của tổng thể chai nước hoa. ', '$', 'Hương hoa cỏ trái cây', 'Trên 20', 2021, 'EDP', 'Chưa rõ', 'Tạm ổn - 3 giờ đến trên 6 giờ', 'Ngọt ngào, Gợi cảm, Thanh lịch', 'Rất gần - Thoang thoảng trên da', 'Ngày, Đêm - Tiết trời mát mẻ', '2023-04-19', 0, 0, 'K09JN58VOO0', 1, '74R1G6BOT5N'),
('TRY4SU9UAD1', 'Diptyque Tam Dao EDP', 2, 'Pháp', 'Rạng rỡ và thanh bình pha với sự trầm tĩnh, Tam Dao như một tác phẩm được trạm trổ một cách công phu. Cho dù khi hương thơm tỏa hương một cách mạnh mẽ nhất, mùi hương vẫn giữ đúng bản chất gỗ của mình, đúng với đặc điểm của các chai nước hoa thuộc hãng Diptque. Đây là một mùi hương rất đáng thử dành cho những ai yêu thích hương gỗ đàn hương.', 'Nếu âm nhạc là thứ bạn nghĩ đến đầu tiên mỗi khi cần khỏa lấp những cảm xúc vui buồn thì nước hoa lại là thứ Parfumerie thường hay nghĩ về kể từ khi thức dậy cho đến cả trong những giấc mơ. Mỗi mùi hương đều mang trong nó những câu chuyện thật dễ thương, và nước hoa Diptyque Tam Dao EDP là một điển hình, hơn cả một mùi hương - đó chính là tình yêu thiên nhiên Việt Nam tươi đẹp, là nhịp đập của một trái tim yêu cái đẹp đến vô cùng.', 'Nhắm mắt lại, nước hoa Tam Dao chính hãng Diptyque sẽ đưa bạn đến một khu rừng núi sâu thẳm hòa quyện cùng từng nhánh cây xanh bằng mùi hương gỗ đặc trưng, điềm tĩnh và đầy nội tâm của mình.', 'Nước hoa Tam Đảo là nước hoa unisex mang một hương thơm đầy cá tính, nồng nàn và táo bạo. Không cầu kỳ phân chia từng tầng, từng lớp, Diptyque Tam Dao có phút đầu tiên hay là giây cuối cùng đều mang lại cảm giác an yên, tự tại không đổi. Lướt từng ngón tay qua lớp vỏ cây sần sùi, đàn hương cùng tuyết tùng đem lại những cảm giác giản dị mà chân chất nhất, làm ta mơ về một bờ vai rắn rỏi vững chãi, một khuôn mặt vuông vức từng trải.\r\n\r\nHương chủ đạo của Tam Dao vẫn là gỗ đàn hương, nhưng đã được thêm vào các hương gừng, chanh Tahiti và dừa để nhấn mạnh hương gỗ trên, tạo nên một mùi hương mang vị ngọt sữa và gỗ thật đẫy đà. Ở tầng hương đầu, hương cây bách quyện cùng hoa hồng, hoa sim mang lại một cảm giác rất tự nhiên và sắc sảo và có phần nào giống với các loại nước hoa đại trà khác. Sau đó đến tầng hương giữa và cuối, hương thơm gỗ giống với trầm hương từ hỗn hợp gỗ đàn hương và cẩm lai bắt đầu tỏa hương một cách chậm rãi và mịn màng hơn cùng với sự quyện hoà của xạ hương trắng và hổ phách pha lẫn vào.\r\nRạng rỡ và thanh bình pha với sự trầm tĩnh, hầu hết các đánh giá nước hoa Diptyque Tam Dao đều xem đây chính là một tác phẩm được trạm trổ một cách công phu. Cho dù khi hương thơm tỏa hương một cách mạnh mẽ nhất, mùi hương vẫn giữ đúng bản chất gỗ của mình, đúng với đặc điểm của các chai nước hoa thuộc hãng Diptyque. Đây là một mùi hương rất đáng thử dành cho những ai yêu thích hương gỗ đàn hương. Parfumerie đánh giá đây là một chai nước hoa khá linh hoạt khi đóng vai trò nước hoa nam cũng cự phách mà nếu là chai nước hoa nữ thì cũng gây nhung nhớ cho những người tiếp xúc', 'Hương Đầu: Hoa hồng, Hoa sim, Cây bách Ý\r\nHương giữa: Gỗ đàn hương, Gỗ tuyết tùng\r\nHương cuối: Gia vị, Hổ phách, Xạ hương trắng, Gỗ cẩm lai Brazil', 'Theo nhà chế tác Yves Coueslant, Diptyque Tam Dao chính là nhật ký bằng mùi hương ghi lại những khoảnh khắc bất tận ở Việt Nam, phác họa lại vẻ đẹp sâu thẳm của núi rừng, hòa quyện cùng từng nhánh cây xanh. Sự tráng lệ của Tuyết tùng, âm hưởng giòn giã của Đàn hương tan chảy trong cái ôm ấm áp của Hổ phách.\r\n\r\nNước hoa unisex Tam Dao phiên bản EDT được tung ra vào năm 2003 và vào năm 2013 nước hoa lại được tái bản thành phiên bản nước hoa EDP nồng nàn hơn. Chai nước hoa Diptyque Tam Dao 100ml được thiết kế với thân chai làm bằng thủy tinh trong suốt được bo tròn và đi kèm đó là một chiếc nắp màu đen, phảng phất hình ảnh căn biệt thự cổ kính giữa rừng núi thiên nhiên, tạo nên một nét rất thơ và rất riêng.', 'Nước hoa chiết Tam Dao chính hãng từ Parfumerie được chiết ra từ chai gốc chính hãng bằng dụng cụ chuyên dụng nên đảm bảo vẫn chuẩn mùi và giữ được độ lưu hương như chính nguyên bản. Vì vậy, bạn đừng quá lo lắng việc nên mua nước hoa chiết hay nước hoa nguyên hộp (Fullbox) chai gốc chính hãng nhé, tất cả đều nằm ở sở thích, nhu cầu và ngân sách chi tiêu dành cho nước hoa của bạn mà thôi.\r\n\r\nChai nước hoa Tamdao chiết 10ml/20ml/30ml có dạng xịt phun sương, thiết kế đơn giản bằng thuỷ tinh trong suốt, vỏ chai dày thể hiện sự chắc chắn, nắp chai màu bạc hoặc màu đen làm tăng sự hài hoà và tinh tế của tổng thể chai nước hoa.', '$', 'Hương gỗ', 'Trên 25', 2013, 'EDP', 'Yves Coueslant', 'Lâu - 7 giờ đến 12 giờ', 'Ấm áp, Phóng khoáng, Tự nhiên', 'Gần - Toả hương trong vòng 1 cánh tay', 'Ngày & Đêm - Sử dụng hàng ngày', '2023-04-20', 0, 0, 'QBVWFBUTMR6', 1, '74R1G6BOT5N'),
('VRLUKCZDQH4', 'Lancôme La Vie Est Belle L\'Eau De Parfum', 1, 'Pháp', 'Nắm giữ những tầng hương đơn giản nhưng lại vô cùng đồng điệu cùng khả năng lưu hương rất bền mùi, những cảm xúc mà nước hoa La Vie Est Belle L\'Eau De Parfum mang lại là thứ mà bất kì cô gái cũng phải mềm lòng.', 'Thu hút số đông ánh nhìn của nữ giới kể từ khi ra mắt vào mùa thu năm 2012, nước hoa nữ Lancôme La Vie Est Belle L\'Eau De Parfum xuất hiện với vẻ ngoài độc đáo cùng mùi hương dịu dàng dường như chưa bao giờ là hết “hot” tính đến những năm gần đây. Nếu bạn là một cô gái yêu thích những thứ ngọt ngào thì đây chính là mùi nước hoa \"must have\" đấy nhé.', 'Sau thành công của La Vie Est Belle, hãng Lancôme đã tiếp tụp cho ra đời phiên bản kế tiếp với tên gọi La Vie Est Belle L’Eau De Parfum. Nước hoa Lancôme La Vie Est Belle L\'Eau De Parfum cực kỳ nữ tính, trẻ trung và cuốn hút, là những nét đẹp đã được chắt lọc, hương thơm dễ khiến người khác cảm thấy dễ chịu, vui vẻ.', '\"La Vie Est Belle\" là cụm từ tiếng Pháp có nghĩa là \"Cuộc sống tươi đẹp\", chai nước hoa này của Lancôme lấy cảm hứng từ niềm vui trong cuộc sống, tập trung ý tưởng về vẻ đẹp tự nhiên và giản dị, tự do và cho tầm nhìn cho hạnh phúc riêng của bạn. Nắm giữ những tầng hương đơn giản nhưng lại vô cùng đồng điệu, vì thế những cảm xúc mà nước hoa La Vie Est Belle mang lại là thứ mà bất kì cô gái cũng phải mềm lòng.\r\nNước hoa phái nữ Lancome La Vie Est Belle mở đầu hương thơm ngọt ngào bằng sự bùng nổ mới mẻ của nho đen Hy Lạp và quả lê mọng nước, hương thơm trái cây dần chuyển sang những hương hoa khi nốt hương giữa lộ diện cùng hoa diên vỹ và hoa nhài quyến rũ. Và đến cuối hương vani bắt đầu tỏa sáng cùng với một mùi thơm của bánh nhân hạt praline. Sự ngọt ngào từ lớp hương vẫn mượt mà từ lớp đầu đến lớp cuối, tạo nên một tổng thể hương thực phẩm thơm ngon nhưng vẫn rất nhẹ nhàng và trang nhã.\r\nCác review nước hoa Lancome La Vie Est Belle đều ấn tượng với mùi hương dịu ngọt, nhẹ nhàng, đầy nữ tính. Khả năng lưu hương lâu và cực kì bền mùi sẽ là vũ khí mùi hương hoàn hảo cho một ngày dài làm việc hoặc những cuộc hẹn hò đầy lãng mạn của các nàng. Chỉ cần xịt nhẹ một chút lên người là phái đẹp đã có thể tự tin cho mọi hoạt động trong cả ngày dài mà không cần phải xịt lại nhiều lần như một số dòng nước hoa khác.', 'Hương đầu: Nho đen Hy Lạp, Quả lê.\r\nHương giữa: Hoa Iris, Hoa nhài.\r\nHương cuối: Xạ hương trắng, Vani, Praline.', 'Được ra đời trong mùa thu năm 2012 bởi Lancôme. Thành phần nước hoa La Vie Est Belle được phát triển bởi Olivier Polge, Dominique Ropion và Anne Flipo. Công thức cuối cùng của La Vie Est Belle EDP là kết quả đạt được sau thời gian ba năm quản chế và 5000 phiên bản. Mẫu chai nước hoa Lancome La Vie Est Belle L\'Eau De Parfum 100ml được thiết kế lại từ mẫu chai cổ điển của Lancôme năm 1949. Kiểu chai đơn giản dễ nhìn với chủ đạo màu hồng nhạt nữ tính, phụ kiện đi kèm là chiếc ruy bang màu xám thanh lịch tượng trưng một cô gái với chiếc khăn lụa thời trang.', 'Nước hoa chiết Lancôme La Vie Est Belle từ Parfumerie được chiết ra từ chai gốc chính hãng bằng dụng cụ chuyên dụng nên đảm bảo vẫn chuẩn mùi và giữ được độ lưu hương như chính nguyên bản. Vì vậy, bạn đừng quá lo lắng việc nên mua nước hoa chiết hay nước hoa nguyên hộp (Fullbox) chai gốc chính hãng nhé, tất cả đều nằm ở sở thích, nhu cầu và ngân sách chi tiêu dành cho nước hoa của bạn mà thôi.\r\n\r\nChai chiết nước hoa Lancome La Vie Est Belle 10ml/ 20ml/ 30ml từ Parfumerie có dạng xịt phun sương, thiết kế đơn giản bằng thuỷ tinh trong suốt, vỏ chai dày thể hiện sự chắc chắn, nắp chai màu bạc hoặc màu đen làm tăng sự hài hoà và tinh tế của tổng thể chai nước hoa.', '$', 'Hoa cỏ - Trái cây - Thực phẩm', 'Trên 25', 2012, 'L\'Eau De P', 'Olivier Polge', 'Lâu - 7 giờ đến 12 giờ', 'Ngọt ngào, Thanh lịch, Nữ tính', 'Xa - Trong vòng bán kính 2m', 'Ngày & Đêm - Thu Đông', '2023-04-19', 0, 0, '832YWLGJOPD', 1, '74R1G6BOT5N');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tb_phuongthucthanhtoan`
--

CREATE TABLE `tb_phuongthucthanhtoan` (
  `id_phuongthucthanhtoan` int(10) UNSIGNED NOT NULL,
  `ten` varchar(100) NOT NULL,
  `mota` varchar(1000) NOT NULL,
  `image_link` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tb_phuongthucthanhtoan`
--

INSERT INTO `tb_phuongthucthanhtoan` (`id_phuongthucthanhtoan`, `ten`, `mota`, `image_link`) VALUES
(7, 'Thanh toán qua VNPAY-QR', 'Bước 1: Quý Khách Hàng vui lòng chọn hình thức Thanh toán qua VNPay-QR và Bấm Đặt hàng.\r\n\r\nBước 2: Quý Khách Hàng làm theo hướng dẫn để sử dụng mã QR thanh toán.\r\n\r\nBước 3: Nhân viên CSKH của Parfumerie.vn sẽ liên hệ Quý Khách Hàng để xác nhận thanh toán và xử lý đơn hàng.', 'images/PhuongThucThanhToan/7/7.png'),
(8, 'Chuyển khoản qua ngân hàng', 'Bước 1: Quý Khách Hàng vui lòng chọn hình thức Chuyển khoản qua ngân hàng và Bấm Đặt hàng.\r\n\r\nBước 2: Quý Khách Hàng vui lòng thanh toán đơn hàng theo thông tin sau:\r\n\r\n- Nguyen Phuong Lan\r\n\r\n- STK: 08880xxxxx\r\n\r\n- Ngân hàng zzz\r\n\r\n- Nội dung: Tên Quý Khách Hàng + Số điện thoại\r\n\r\nBước 3: Nhân viên CSKH của Parfumerie.vn sẽ liên hệ với Quý Khách Hàng để xác nhận thanh toán và xử lý đơn hàng.', 'images/PhuongThucThanhToan/8/8.jpeg'),
(9, 'Thanh toán khi nhận hàng (COD)', 'Bước 1: Quý Khách Hàng vui lòng chọn hình thức Thanh toán khi giao hàng (COD) và Bấm Đặt hàng.\r\n\r\nBước 2: Nhân viên CSKH của Parfumerie.vn sẽ liên hệ với Quý Khách Hàng để xác nhận và xử lý đơn hàng.\r\n\r\nBước 3: Quý Khách Hàng chỉ phải thanh toán khi nhận được hàng.', 'images/PhuongThucThanhToan/9/9.jpeg');

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
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `id_nguoidung` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tb_thuonghieu`
--

INSERT INTO `tb_thuonghieu` (`id_thuonghieu`, `ten_thuonghieu`, `status`, `id_nguoidung`) VALUES
('0BJUU45B8Y3', 'TOMMY HILFIGER', 0, '74R1G6BOT5N'),
('0M6UR2QME73', 'DAVIDOFF', 0, '74R1G6BOT5N'),
('0QBZ4T4GF7M', 'JIMMY CHOO', 0, '74R1G6BOT5N'),
('1DE87FO7YTG', 'MCM', 0, '74R1G6BOT5N'),
('1HSXNCQWMO3', 'MONTALE', 0, '74R1G6BOT5N'),
('2B30WTN1VRU', 'DOLCE & GABBANA', 0, '74R1G6BOT5N'),
('3PCSUFSDQCM', 'BVLGARI', 0, '74R1G6BOT5N'),
('477DWWZPAX6', 'SALVATORE FERRAGAMO', 0, '74R1G6BOT5N'),
('4LIKXPVAEBM', 'JO MALONE', 0, '74R1G6BOT5N'),
('5MUN3ZVJ5CS', 'CLIVE CHRISTIAN', 0, '74R1G6BOT5N'),
('5P928EKB0LX', 'CAROLINA HERRERA', 0, '74R1G6BOT5N'),
('5ZFO50Y6QPE', 'HERMES', 0, '74R1G6BOT5N'),
('69FHPPJ95VB', 'THOMAS KOSMALA', 0, '74R1G6BOT5N'),
('6D4TTXEG3O2', 'KENZO', 0, '74R1G6BOT5N'),
('6I1Z0BMV34S', 'TOM FORD', 0, '74R1G6BOT5N'),
('70BSJK9QXDY', 'PARFUMS de MARLY', 0, '74R1G6BOT5N'),
('7PF6GKGLPJ8', 'ORTO PARISI', 0, '74R1G6BOT5N'),
('832YWLGJOPD', 'LANCOME', 0, '74R1G6BOT5N'),
('9NGQV39U1DI', 'MARC JACOBS', 0, '74R1G6BOT5N'),
('AHT5B6CIA4S', 'ETAT LIBRE D\'ORANGE', 0, '74R1G6BOT5N'),
('ALFN7WYZO5B', 'NISHANE', 0, '74R1G6BOT5N'),
('APGISH2APC0', 'DIESEL', 0, '74R1G6BOT5N'),
('CULHOHIJKPB', 'NARCISO RODRIGUEZ', 0, '74R1G6BOT5N'),
('DBEO8D7RHGI', 'GIORGIO ARMANI', 0, '74R1G6BOT5N'),
('E5ZU7V6XZWN', 'CALVIN KLEIN', 0, '74R1G6BOT5N'),
('EDQTNMSAHL6', 'NAUTICA', 0, '74R1G6BOT5N'),
('FAU34IUS934', 'Roja Dove', 1, '74R1G6BOT5N'),
('FU410RGKJRZ', 'VICTORIA’S SECRET', 0, '74R1G6BOT5N'),
('FYBDQYHIKGT', 'YSL', 0, '74R1G6BOT5N'),
('GALCPUFGRIY', 'LE LABO', 0, '74R1G6BOT5N'),
('HAUSAT82934', 'Creed', 0, '74R1G6BOT5N'),
('HIOSPT85874', 'Maison Francis Kurkdjian', 0, '74R1G6BOT5N'),
('I1QSZN4DFL6', 'THE MERCHANT OF VENICE', 0, '74R1G6BOT5N'),
('J2PLYM6LHAE', 'ARMAF', 0, '74R1G6BOT5N'),
('K09JN58VOO0', 'GUCCI', 0, '74R1G6BOT5N'),
('KHXWEG7P68C', 'FRANCK BOCLET', 0, '74R1G6BOT5N'),
('KMTHKACVPEU', 'SERGE LUTENS', 0, '74R1G6BOT5N'),
('L32CSRB5A94', 'AL HARAMAIN', 0, '74R1G6BOT5N'),
('LDQ3EZV21X4', 'FREDERIC MALLE', 0, '74R1G6BOT5N'),
('LT52EQK94B3', 'BUTTERFLY THAI PERFUME', 0, '74R1G6BOT5N'),
('MYDACH3Q47E', 'AMOUAGE', 0, '74R1G6BOT5N'),
('NAJ9CFQROPW', 'DIOR', 0, '74R1G6BOT5N'),
('NH9XBY5DSP6', 'XERJOFF', 0, '74R1G6BOT5N'),
('NVN09QR9RVQ', 'LOUIS VUITTON', 0, '74R1G6BOT5N'),
('OHDFW2C0GLJ', 'MAD ET LEN', 0, '74R1G6BOT5N'),
('OKXF7IMYRVV', 'THEODOROS KALOTINIS', 0, '74R1G6BOT5N'),
('OX25P9H6OWT', 'LATTAFA', 0, '74R1G6BOT5N'),
('PQHBL6PYYS3', 'KILIAN', 0, '74R1G6BOT5N'),
('QBVWFBUTMR6', 'DIPTYQUE', 0, '74R1G6BOT5N'),
('QL3U80ROUHI', 'AFNAN', 0, '74R1G6BOT5N'),
('QP2I3FTMSQ4', 'MONT BLANC', 0, '74R1G6BOT5N'),
('R387BIKQ675', 'ATTAR COLLECTION', 0, '74R1G6BOT5N'),
('RJXDR2BUNAB', 'BOND NO.9', 0, '74R1G6BOT5N'),
('RL8M7DYJ2VB', 'FLORIS', 0, '74R1G6BOT5N'),
('S7XIFU58LU0', 'ALREHAB', 0, '74R1G6BOT5N'),
('STBXG6Y8HS1', 'ALFRED DUNHILL', 0, '74R1G6BOT5N'),
('T3XGIP9VE1D', 'CHLOÉ', 0, '74R1G6BOT5N'),
('THWXSMEDIW2', 'PENHALIGON\'S', 0, '74R1G6BOT5N'),
('TYZCE3Q5UJA', 'MAISON MARGIELA', 0, '74R1G6BOT5N'),
('U4V3T4Q8J9G', 'CHANEL', 0, '74R1G6BOT5N'),
('US0CNGTXXYK', 'VERSACE', 0, '74R1G6BOT5N'),
('VCID60VBP6T', 'MOSCHINO', 0, '74R1G6BOT5N'),
('W0GS9ZOT1WG', 'JEAN PAUL GAUTIER', 0, '74R1G6BOT5N'),
('W3Q5T149O0O', 'RALPH LAUREN', 0, '74R1G6BOT5N'),
('WYY4KQJ13JI', 'MANCERA', 0, '74R1G6BOT5N'),
('X3FF7JTH2CX', 'VIKTOR & ROLF', 0, '74R1G6BOT5N'),
('XKE6BA59J8H', 'ATELIER DES ORS', 0, '74R1G6BOT5N'),
('Y8FX9VZQ1JA', 'NACHO VIDAL', 0, '74R1G6BOT5N'),
('Y9X6P5GIOA9', 'LALIQUE', 0, '74R1G6BOT5N'),
('YQ9K21LMTES', 'BURBERRY', 0, '74R1G6BOT5N'),
('ZH4XQAL8B3Q', 'NASOMATTO', 0, '74R1G6BOT5N'),
('ZPQNYMCLAFX', 'JULIETTE HAS A GUN', 0, '74R1G6BOT5N'),
('ZVL3MHXUVA0', 'PACO RANBANNE', 0, '74R1G6BOT5N'),
('ZZBYDFKFU90', 'MISSONI', 0, '74R1G6BOT5N');

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
  ADD PRIMARY KEY (`id_donhang`,`id_nuochoa`,`dungtich`),
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
  ADD PRIMARY KEY (`id_nhacungcap`),
  ADD UNIQUE KEY `sodienthoai` (`sodienthoai`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `fk_nhacungcap_nguoidung` (`id_nguoiquanly`);

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
  MODIFY `id_anh` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=238;

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
  MODIFY `id_diachi` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `tb_kienthuc_blog`
--
ALTER TABLE `tb_kienthuc_blog`
  MODIFY `id_baiviet_blog` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `tb_nhacungcap`
--
ALTER TABLE `tb_nhacungcap`
  MODIFY `id_nhacungcap` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `tb_phuongthucthanhtoan`
--
ALTER TABLE `tb_phuongthucthanhtoan`
  MODIFY `id_phuongthucthanhtoan` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

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
-- Các ràng buộc cho bảng `tb_nhacungcap`
--
ALTER TABLE `tb_nhacungcap`
  ADD CONSTRAINT `fk_nhacungcap_nguoidung` FOREIGN KEY (`id_nguoiquanly`) REFERENCES `tb_nguoidung` (`id_nguoidung`);

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
