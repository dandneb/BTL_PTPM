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
}
?>