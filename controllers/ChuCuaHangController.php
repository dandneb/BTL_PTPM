<?php
if(!isset($_SESSION)) {
    session_start();
}
if (isset($_SESSION['LoginOK']) && $_SESSION['LoginOK'][0] == "2") {
    $ql = explode("_", $_SESSION['LoginOK']);
    require_once 'models/ChuCuaHangModel.php';
class ChuCuaHangController{
    function index(){
        require_once 'views/Admin/ChuCuaHangManagement/index.php';
    }
    function getKhachHang(){
        $cCHModel = new ChuCuaHangModel();
        echo $cCHModel->getALLKH();
    }

    function lockKhachHang(){
        if(isset($_GET['id_nguoidung'])){
            $id_nguoidung = $_GET['id_nguoidung'];
            $cCHModel = new ChuCuaHangModel();
            if(count($cCHModel->get("tb_nguoidung", ['id_nguoidung'], [$id_nguoidung], ['and'])) > 0){
                if($cCHModel->update("tb_nguoidung", ['trangthai'], [2], ['id_nguoidung'], [$id_nguoidung], ['and'])){
                    $_SESSION['success'] = "Khóa tài khoản khách hàng thành công!";
                    header("location: index.php?controller=ChuCuaHang");
                }else{
                    $_SESSION['error'] = "Khóa tài khoản khách hàng thất bại";
                    header("location: index.php?controller=ChuCuaHang");
                }
            }else{
                header("location: index.php?controller=ChuCuaHang");
            }
        }else{
            header("location: index.php?controller=ChuCuaHang");
        }
    }

    function unlockKhachHang(){
        if(isset($_GET['id_nguoidung'])){
            $id_nguoidung = $_GET['id_nguoidung'];
            $cCHModel = new ChuCuaHangModel();
            if(count($cCHModel->get("tb_nguoidung", ['id_nguoidung'], [$id_nguoidung], ['and'])) > 0){
                if($cCHModel->update("tb_nguoidung", ['trangthai'], [1], ['id_nguoidung'], [$id_nguoidung], ['and'])){
                    $_SESSION['success'] = "Mở khóa tài khoản khách hàng thành công!";
                    header("location: index.php?controller=ChuCuaHang");
                }else{
                    $_SESSION['error'] = "Mở khóa tài khoản khách hàng thất bại";
                    header("location: index.php?controller=ChuCuaHang");
                }
            }else{
                header("location: index.php?controller=ChuCuaHang");
            }
        }else{
            header("location: index.php?controller=ChuCuaHang");
        }
    }
}
}else{
    header("location: index.php");
}