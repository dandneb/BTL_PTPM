<?php
if(!isset($_SESSION)) {
    session_start();
}
if (isset($_SESSION['LoginOK']) && $_SESSION['LoginOK'][0] == "1" || $_SESSION['LoginOK'][0] == "2") {
    $ql = explode("_", $_SESSION['LoginOK']);
require_once 'models/ThuongHieuModel.php';
class ThuongHieuController{
    //Quản lý thương hiệu.
    function thuonghieu(){
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
                header("location: index.php?controller=ThuongHieu&action=thuonghieu&success=");
            }else{
                header("location: index.php?controller=ThuongHieu&action=thuonghieu&error=");
            }
        }
        require_once 'views/Admin/ThuongHieuManagement/apps-ecommerce-addThuongHieu.php';
    }
    function deleteThuongHieu(){
        if(isset($_GET['id_thuonghieu'])){
            $thModel = new ThuongHieuModel();
            $id_thuonghieu = $_GET['id_thuonghieu'];
            if($thModel->delete("tb_thuonghieu",['id_thuonghieu'], [$id_thuonghieu], ['and'])){
                header("location: index.php?controller=ThuongHieu&action=thuonghieu&delete_success=");
            }else{
                header("location: index.php?controller=ThuongHieu&action=thuonghieu&delete_error=");
            }
        }
    }
    function lockThuongHieu(){
        if(isset($_GET['id_thuonghieu'])){
            $thModel = new ThuongHieuModel();
            $id_thuonghieu = $_GET['id_thuonghieu'];
            if($thModel->update("tb_thuonghieu", ['status'], [1], ['id_thuonghieu'], [$id_thuonghieu], ['and'])){
                header("location: index.php?controller=ThuongHieu&action=thuonghieu&lock_success=");
            }else{
                header("location: index.php?controller=ThuongHieu&action=thuonghieu&lock_error=");
            }
        }
    }
    function unlockThuongHieu(){
        if(isset($_GET['id_thuonghieu'])){
            $thModel = new ThuongHieuModel();
            $id_thuonghieu = $_GET['id_thuonghieu'];
            if($thModel->update("tb_thuonghieu", ['status'], [0], ['id_thuonghieu'], [$id_thuonghieu], ['and'])){
                header("location: index.php?controller=ThuongHieu&action=thuonghieu&unlock_success=");
            }else{
                header("location: index.php?controller=ThuongHieu&action=thuonghieu&unlock_error=");
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
                header("location: index.php?controller=ThuongHieu&action=thuonghieu&update_success=");
            }else{
                header("location: index.php?controller=ThuongHieu&action=thuonghieu&update_error=");
            }
        }
    }
    //End Quản lý thương hiệu
}
}else{
    header("location: index.php");
}
?>