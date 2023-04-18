<?php
if(!isset($_SESSION)) {
    session_start();
}
if (isset($_SESSION['LoginOK']) && $_SESSION['LoginOK'][0] == "1" || $_SESSION['LoginOK'][0] == "2") {
    $ql = explode("_", $_SESSION['LoginOK']);
require_once 'models/ThuongHieuModel.php';
class ThuongHieuController{
    //Quản lý thương hiệu.
    function index(){
        require_once 'views/Admin/ThuongHieuManagement/index.php';
    }
    function getThuongHieu(){
        $ThuongHieuModel = new ThuongHieuModel();
        echo $ThuongHieuModel->getALLThuongHieu();
    }
    function addThuongHieu(){
        $error = "";
        if(isset($_POST['submit'])){
            $ql = explode("_", $_SESSION['LoginOK']);
            $thModel = new ThuongHieuModel();
            if($thModel->insert("tb_thuonghieu", ['id_thuonghieu', 'ten_thuonghieu', 'id_nguoidung'], [
                $_POST['id_thuonghieu'],
                $_POST['ten_thuonghieu'],
                $ql[1]
            ])){
                $_SESSION['success'] = "Thêm thương hiệu thành công!";
                header("location: index.php?controller=ThuongHieu");
            }else{
                $_SESSION['error'] = "Thêm thương hiệu thất bại!";
                header("location: index.php?controller=ThuongHieu");
            }
        }
        require_once 'views/Admin/ThuongHieuManagement/apps-ecommerce-addThuongHieu.php';
    }
    function deleteThuongHieu(){
        if(isset($_GET['id_thuonghieu'])){
            $thModel = new ThuongHieuModel();
            $id_thuonghieu = $_GET['id_thuonghieu'];
            if($thModel->delete("tb_thuonghieu",['id_thuonghieu'], [$id_thuonghieu], ['and'])){
                $_SESSION['success'] = "Xóa thương hiệu thành công!";
                header("location: index.php?controller=ThuongHieu");
            }else{
                $_SESSION['error'] = "Xóa thương hiệu thất bại!";
                header("location: index.php?controller=ThuongHieu");
            }
        }
    }
    function lockThuongHieu(){
        if(isset($_GET['id_thuonghieu'])){
            $thModel = new ThuongHieuModel();
            $id_thuonghieu = $_GET['id_thuonghieu'];
            if($thModel->update("tb_thuonghieu", ['status'], [1], ['id_thuonghieu'], [$id_thuonghieu], ['and'])){
                $_SESSION['success'] = "Khóa thương hiệu thành công!";
                header("location: index.php?controller=ThuongHieu");
            }else{
                $_SESSION['error'] = "Khóa thương hiệu thất bại!";
                header("location: index.php?controller=ThuongHieu");
            }
        }
    }
    function unlockThuongHieu(){
        if(isset($_GET['id_thuonghieu'])){
            $thModel = new ThuongHieuModel();
            $id_thuonghieu = $_GET['id_thuonghieu'];
            if($thModel->update("tb_thuonghieu", ['status'], [0], ['id_thuonghieu'], [$id_thuonghieu], ['and'])){
                $_SESSION['success'] = "Mở khóa thương hiệu thành công!";
                header("location: index.php?controller=ThuongHieu");
            }else{
                $_SESSION['error'] = "Mở khóa thương hiệu thất bại!";
                header("location: index.php?controller=ThuongHieu");
            }
        }
    }
    function updateThuongHieu(){
        if(isset($_GET['id_thuonghieu']) && !isset($_POST['submit'])){
            $error = "";
            $thModel = new ThuongHieuModel();
            $id_thuonghieu = $_GET['id_thuonghieu'];
            $thuonghieu = $thModel->get("tb_thuonghieu", ['id_thuonghieu'], [$id_thuonghieu], ['and']);
            $ten_thuonghieu = $thuonghieu[0]['ten_thuonghieu'];
            require_once 'views/Admin/ThuongHieuManagement/apps-ecommerce-updateThuongHieu.php';
        }else if(isset($_GET['id_thuonghieu']) && isset($_POST['submit'])){
            $error = "";
            $thModel = new ThuongHieuModel();
            $id_thuonghieu = $_GET['id_thuonghieu'];
            $ten_thuonghieu = $_POST['ten_thuonghieu'];
            if($thModel->update("tb_thuonghieu", ['ten_thuonghieu'], [$ten_thuonghieu], ['id_thuonghieu'], [$id_thuonghieu], ['and'])){
                $_SESSION['success'] = "Cập nhật thương hiệu thành công!";
                header("location: index.php?controller=ThuongHieu");
            }else{
                $_SESSION['error'] = "Cập nhật thương hiệu thất bại!";
                header("location: index.php?controller=ThuongHieu");
            }
        }
    }
    //End Quản lý thương hiệu
}
}else{
    header("location: index.php");
}
?>