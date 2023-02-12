<?php
session_start();
require_once 'models/DocgiaModel.php';
class DocgiaController{
    function index(){
        $DgModal = new DocgiaModal();
        $docgia = $DgModal->getAllBD();
        require_once 'views/Docgia/index.php';
    }
    function admin(){
        $DgModal = new DocgiaModal();
        $docgia = $DgModal->getAllBD();
        require_once 'views/Docgia/admin.php';
    }
    function add(){
        $error = '';
        if(isset($_POST['submit'])){
            $hoVaTen = $_POST['hoVaTen'];
            $namSinh = $_POST['namSinh'];
            $ngheNghiep = $_POST['ngheNghiep'];
            $ngayCapThe = $_POST['ngayCapThe'];
            $ngayHetHan = $_POST['ngayHetHan'];
            $diaChi = $_POST['diaChi'];
            if(empty($hoVaTen) || empty($namSinh)|| empty($ngheNghiep) || empty($_POST['gioiTinh']) || !is_numeric($namSinh) && empty($namSinh) || empty($ngayCapThe) || empty($ngayHetHan) || empty($diaChi)){
                $error = 'Thông tin chưa đầy đủ!';
            }else{
                $gioiTinh = $_POST['gioiTinh'];
                $DgModal = new DocgiaModal();
                $docgia = [
                    'hoVaTen' => $hoVaTen,
                    'gioiTinh' => $gioiTinh,
                    'namSinh' => $namSinh,
                    'ngheNghiep' => $ngheNghiep,
                    'ngayCapThe' => $ngayCapThe,
                    'ngayHetHan' => $ngayHetHan,
                    'diaChi' => $diaChi,
                ];
                $isAdd = $DgModal->insert($docgia);
                if ($isAdd) {
                    $_SESSION['success'] = "Thêm thành công";
                    header("Location: index.php?controller=docgia&action=admin");
                }
                else {
                    $_SESSION['error'] = "Thêm thất bại";
                    header("Location: index.php?controller=docgia&action=error");
                }
                exit();
            }
        }
        require_once 'views/Docgia/add.php';
    }
    function edit(){
        if (!isset($_GET['madg'])) {
            $_SESSION['error'] = "Tham số không hợp lệ";
            header("Location: index.php?controller=docgia&action=admin");
            return;
        }
        if (!is_numeric($_GET['madg'])) {
            $_SESSION['error'] = "Mã nhân viên phải là số";
            header("Location: index.php?controller=docgia&action=admin");
            return;
        }
        $maDG = $_GET['madg'];
        $DgModal = new DocgiaModal();
        $dg = $DgModal->getDocGiaById($maDG);
        $error = '';
        if (isset($_POST['submit'])) {
            $hoVaTen = $_POST['hoVaTen'];
            $namSinh = $_POST['namSinh'];
            $ngheNghiep = $_POST['ngheNghiep'];
            $ngayCapThe = $_POST['ngayCapThe'];
            $ngayHetHan = $_POST['ngayHetHan'];
            $diaChi = $_POST['diaChi'];
            if(empty($hoVaTen) || empty($namSinh)|| empty($ngheNghiep) || empty($_POST['gioiTinh']) || !is_numeric($namSinh) && empty($namSinh) || empty($ngayCapThe) || empty($ngayHetHan) || empty($diaChi)){
                $error = 'Thông tin chưa đầy đủ!';
            }else{
                $gioiTinh = $_POST['gioiTinh'];
                $DgModal = new DocgiaModal();
                $docgia = [
                    'maDG' => $maDG,
                    'hoVaTen' => $hoVaTen,
                    'gioiTinh' => $gioiTinh,
                    'namSinh' => $namSinh,
                    'ngheNghiep' => $ngheNghiep,
                    'ngayCapThe' => $ngayCapThe,
                    'ngayHetHan' => $ngayHetHan,
                    'diaChi' => $diaChi,
                ];
                $isUpdate = $DgModal->update($docgia);
                if ($isUpdate) {
                    $_SESSION['success'] = "Sửa thành công";
                    header("Location: index.php?controller=docgia&action=admin");
                }
                else {
                    $_SESSION['error'] = "Sửa thất bại";
                    header("Location: index.php?controller=docgia&action=error");
                }
                exit();
            }
        }
        require_once 'views/Docgia/edit.php';
    }
    function delete(){
        $id = $_GET['madg'];
        if (!is_numeric($id)) {
            header("Location: index.php?controller=docgia&action=index");
            exit();
        }
        $DgModal = new DocgiaModal();
        $isDelete = $DgModal->delete($id);
        if ($isDelete) {
            $_SESSION['success'] = "Xóa thành công";
            header("Location: index.php?controller=docgia&action=admin");
        }
        else {
            $_SESSION['error'] = "Xóa thất bại";
            header("Location: index.php?controller=docgia&action=error");
        }
        exit();
    }
    function error(){
        if(isset($_SESSION['error'])){
            require_once 'views/Docgia/error.php';
        }else{
            header("Location: index.php?controller=docgia&action=index");
        }
    }

}

?>