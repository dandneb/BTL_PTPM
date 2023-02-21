<?php
session_start();
require_once 'models/KhachHangModel.php';
class KhachHangController{
    function index(){
        require_once 'views/KhachHang/index.php';
    }
    function DangNhap(){
        require_once 'views/KhachHang/DangNhap.php';
    }
    function DangKy(){
        require_once 'views/KhachHang/DangKy.php';
    }
    function DonHang(){
        require_once 'views/KhachHang/DonHang.php';
    }
    function DoiMatKhau(){
        require_once 'views/KhachHang/DoiMatKhau.php';
    }
    function SoDiaChi(){
        require_once 'views/KhachHang/SoDiaChi.php';
    }
    function YeuThich(){
        require_once 'views/KhachHang/YeuThich.php';
    }
    function GioHang(){
        require_once 'views/KhachHang/GioHang.php';
    }
    function LienHe(){
        require_once 'views/KhachHang/LienHe.php';
    }
    function MuaHang(){
        require_once 'views/KhachHang/MuaHang.php';
    }
    function HoanTatDatHang(){
        require_once 'views/KhachHang/HoanTatDatHang.php';
    }
}
?>