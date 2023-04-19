<?php
if(!isset($_SESSION)) {
    session_start();
}
if (isset($_SESSION['LoginOK']) && $_SESSION['LoginOK'][0] == "2") {
    $ql = explode("_", $_SESSION['LoginOK']);
    require_once 'models/TaiKhoanModel.php';
class TaiKhoanController{
    function index(){
        require_once 'views/Admin/TaiKhoanManagement/index.php';
    }
    function getTaiKhoan(){
        $tKModel = new TaiKhoanModel();
        echo $tKModel->getALLTK();
    }
    function checkDienThoai(){
        if(isset($_POST['data'])){
            $tKModel = new TaiKhoanModel();
            $data = $tKModel->get("tb_nguoidung", ["dienthoai"], [$_POST['data']], ["and"]);
            if(count($data)>0){
                echo 1;
            }else{
                echo 0;
            }
        }
    }
    function checkEmail(){
        if(isset($_POST['data'])){
            $tKModel = new TaiKhoanModel();
            $data = $tKModel->get("tb_nguoidung", ["email"], [$_POST['data']], ["and"]);
            if(count($data)>0){
                echo 1;
            }else{
                echo 0;
            }
        }
    }
    function addTaiKhoan(){
        $error="";
        if(isset($_POST["submit"])){
            $id_nguoidung = $_POST["id_nguoidung"];
            $hoten = $_POST["hoten"];
            $email = $_POST["email"];
            $dienthoai = $_POST["dienthoai"];
            $matkhau_1 = $_POST["matkhau_1"];
            $matkhau_2 = $_POST["matkhau_2"];
            if(!empty($id_nguoidung) && !empty($hoten) && !empty($email) && !empty($dienthoai) && $matkhau_1 == $matkhau_2){
                $tKModel = new TaiKhoanModel();
                $matkhau = password_hash($matkhau_1, PASSWORD_DEFAULT);
                if($tKModel->insert("tb_nguoidung", 
                ['id_nguoidung', 'hoten', 'email', 'dienthoai', 'trangthai', 'capbac', 'mota', 'matkhau'], 
                [$id_nguoidung, $hoten, $email, $dienthoai, 1, 1, 'Nhân viên', $matkhau])){
                    $_SESSION['success'] = "Thêm tài khoản thành công!";
                    header("location: index.php?controller=TaiKhoan");
                }else{
                    $_SESSION['error'] = "Thêm tài khoản thất bại!";
                    header("location: index.php?controller=TaiKhoan");
                }
            }else{
                $_SESSION['error'] = "Hãy nhập đầy đủ thông tin hoặc mật khẩu phải trùng khớp!";
            }
        }
        require_once 'views/Admin/TaiKhoanManagement/apps-ecommerce-addTaiKhoan.php';
    }
    function doiMatKhau(){
        $error = "";
        if(isset($_GET['id_nguoidung']) && !isset($_POST['submit'])){
            $id_nguoidung = $_GET['id_nguoidung'];
            $tKModel = new TaiKhoanModel();
            if(count($tKModel->get("tb_nguoidung", ['id_nguoidung'], [$id_nguoidung], ['and'])) > 0){
                require_once 'views/Admin/TaiKhoanManagement/apps-ecommerce-doiMatKhau.php';
            }else{
                header("location: index.php?controller=TaiKhoan");
            }
        }else if(isset($_GET['id_nguoidung']) && isset($_POST['submit'])){
            $tKModel = new TaiKhoanModel();
            $id_nguoidung = $_GET['id_nguoidung'];
            $matkhau_1 = $_POST["matkhau_1"];
            $matkhau_2 = $_POST["matkhau_2"];
            if($matkhau_1 == $matkhau_2 && strlen($matkhau_1) >= 8){
                $matkhau = password_hash($matkhau_1, PASSWORD_DEFAULT);
                if($tKModel->update("tb_nguoidung", ['matkhau'], [$matkhau], ['id_nguoidung'], [$id_nguoidung], ['and'])){
                    $_SESSION['success'] = "Đổi mật khẩu thành công!";
                    header("location: index.php?controller=TaiKhoan&action=doiMatKhau&id_nguoidung=$id_nguoidung");
                }else{
                    $_SESSION['error'] = "Đổi mật khẩu thất bại!";
                    header("location: index.php?controller=TaiKhoan&action=doiMatKhau&id_nguoidung=$id_nguoidung");
                }
            }else{
                $error = "Mật khẩu chưa trùng khớp hoặc đủ 8 ký tự trở lên!";
                require_once 'views/Admin/TaiKhoanManagement/apps-ecommerce-doiMatKhau.php';
            }
        }
    }
    function lockTaiKhoan(){
        if(isset($_GET['id_nguoidung'])){
            $id_nguoidung = $_GET['id_nguoidung'];
            $tKModel = new TaiKhoanModel();
            if(count($tKModel->get("tb_nguoidung", ['id_nguoidung'], [$id_nguoidung], ['and'])) > 0){
                if($tKModel->update("tb_nguoidung", ['trangthai'], [2], ['id_nguoidung'], [$id_nguoidung], ['and'])){
                    $_SESSION['success'] = "Khóa tài khoản thành công!";
                    header("location: index.php?controller=TaiKhoan");
                }else{
                    $_SESSION['error'] = "Khóa tài khoản thất bại";
                    header("location: index.php?controller=TaiKhoan");
                }
            }else{
                header("location: index.php?controller=TaiKhoan");
            }
        }else{
            header("location: index.php?controller=TaiKhoan");
        }
    }

    function unlockTaiKhoan(){
        if(isset($_GET['id_nguoidung'])){
            $id_nguoidung = $_GET['id_nguoidung'];
            $tKModel = new TaiKhoanModel();
            if(count($tKModel->get("tb_nguoidung", ['id_nguoidung'], [$id_nguoidung], ['and'])) > 0){
                if($tKModel->update("tb_nguoidung", ['trangthai'], [1], ['id_nguoidung'], [$id_nguoidung], ['and'])){
                    $_SESSION['success'] = "Mở khóa tài khoản thành công!";
                    header("location: index.php?controller=TaiKhoan");
                }else{
                    $_SESSION['error'] = "Mở khóa tài khoản thất bại";
                    header("location: index.php?controller=TaiKhoan");
                }
            }else{
                header("location: index.php?controller=TaiKhoan");
            }
        }else{
            header("location: index.php?controller=TaiKhoan");
        }
    }
}
}else{
    header("location: index.php");
}