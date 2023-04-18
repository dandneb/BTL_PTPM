<?php
if(!isset($_SESSION)) {
    session_start();
}
if (isset($_SESSION['LoginOK']) && $_SESSION['LoginOK'][0] == "1" || $_SESSION['LoginOK'][0] == "2") {
    $ql = explode("_", $_SESSION['LoginOK']);
    require_once 'models/NhaCungCapModel.php';
class NhaCungCapController{
    //Quản lý nhà cung cấp
    function index(){
        require_once 'views/Admin/NhaCungCapManagement/index.php';
    }
    function getNhaCungCap(){
        $NhaCungCapModel = new NhaCungCapModel();
        echo $NhaCungCapModel->getALLNhaCungCap();
    }
    function addNhaCungCap(){
        $error = "";
        if(isset($_POST['submit'])){
            $id_nhacungcap = $_POST['id_nhacungcap'];
            $ten_nhacungcap = $_POST['ten_nhacungcap'];
            $diachi = $_POST['diachi'];
            $sodienthoai = $_POST['sodienthoai'];
            $email = $_POST['email'];
            if(empty($id_nhacungcap) || empty($ten_nhacungcap) || empty($diachi) || empty($sodienthoai) || empty($email)){
                $error = "Thông tin chưa đầy đủ!";
            }else{
                $NhaCungCapModel = new NhaCungCapModel();
                $ql = explode("_", $_SESSION['LoginOK']);
                if($NhaCungCapModel->insert("tb_nhacungcap", ['id_nhacungcap', 'ten_nhacungcap', 'diachi', 'sodienthoai', 'email', 'id_nguoiquanly'], [$id_nhacungcap, $ten_nhacungcap, $diachi, $sodienthoai, $email, $ql[1]])){
                    $_SESSION['success'] = "Thêm nhà cung cấp thành công!";
                    header("location: index.php?controller=NhaCungCap");
                }else{
                    $_SESSION['error'] = "Thêm nhà cung cấp thất bại!";
                    header("location: index.php?controller=NhaCungCap");
                }
            }
        }
        require_once 'views/Admin/NhaCungCapManagement/apps-ecommerce-addNhaCungCap.php';
    }
    function checkDienThoai(){
        if(isset($_POST['data'])){
            $NhaCungCapModel = new NhaCungCapModel();
            $data = $NhaCungCapModel->get("tb_nhacungcap", ["sodienthoai"], [$_POST['data']], ["and"]);
            if(count($data)>0){
                echo 1;
            }else{
                echo 0;
            }
        }
    }
    function checkEmail(){
        if(isset($_POST['data'])){
            $NhaCungCapModel = new NhaCungCapModel();
            $data = $NhaCungCapModel->get("tb_nhacungcap", ["email"], [$_POST['data']], ["and"]);
            if(count($data)>0){
                echo 1;
            }else{
                echo 0;
            }
        }
    }
    function deleteNhaCungCap(){
        if(isset($_GET['id_nhacungcap'])){
            $id_nhacungcap = $_GET['id_nhacungcap'];
            $NhaCungCap = new NhaCungCapModel();
            $nhModel = new NuocHoaModel();
            if(count($nhModel->get("tb_nuochoa", ["id_nhacungcap"], [$id_nhacungcap], ['and']))<1){
                if($NhaCungCap->delete("tb_nhacungcap", ["id_nhacungcap"], [$id_nhacungcap], ['and'])){
                    $_SESSION['success'] = "Xóa nhà cung cấp thành công!";
                    header("location: index.php?controller=NhaCungCap");
                }else{
                    $_SESSION['error'] = "Xóa nhà cung cấp thất bại!";
                    header("location: index.php?controller=NhaCungCap");
                }
            }else{
                $_SESSION['error'] = "Xóa nhà cung cấp thất bại!";
                header("location: index.php?controller=NhaCungCap");
            }
        }
    }
    function lockNhaCungCap(){
        if(isset($_GET['id_nhacungcap'])){
            $id_nhacungcap = $_GET['id_nhacungcap'];
            $NhaCungCap = new NhaCungCapModel();
            if($NhaCungCap->update("tb_nhacungcap", ["status"],[1],['id_nhacungcap'], [$id_nhacungcap], ['and'])){
                $_SESSION['success'] = "Khóa nhà cung cấp thành công!";
                header("location: index.php?controller=NhaCungCap");
            }else{
                $_SESSION['error'] = "Khóa nhà cung cấp thất bại!";
                header("location: index.php?controller=NhaCungCap");
            }
        }
    }
    function unlockNhaCungCap(){
        if(isset($_GET['id_nhacungcap'])){
            $success="Khóa nhà cung cấp thành công!";
            $error="Khóa nhà cung cấp thất bại!";
            $id_nhacungcap = $_GET['id_nhacungcap'];
            $NhaCungCap = new NhaCungCapModel();
            if($NhaCungCap->update("tb_nhacungcap", ["status"],[0],['id_nhacungcap'], [$id_nhacungcap], ['and'])){
                $_SESSION['success'] = "Mở khóa nhà cung cấp thành công!";
                header("location: index.php?controller=NhaCungCap");
            }else{
                $_SESSION['error'] = "Mở khóa nhà cung cấp thất bại!";
                header("location: index.php?controller=NhaCungCap");
            }
        }
    }
    function updateNhaCungCap(){
        $error = "";
        if(isset($_GET['id_nhacungcap']) && !isset($_POST['submit'])){
            $id_nhacungcap = $_GET['id_nhacungcap'];
            $NhaCungCap = new NhaCungCapModel();
            $ncc = $NhaCungCap->get("tb_nhacungcap", ['id_nhacungcap'], [$id_nhacungcap], ['and']);
            $ncc = $ncc[0];
        }else if(isset($_POST['submit'])){
            $success="Cập nhật nhà cung cấp thành công!";
            $error="Cập nhật nhà cung cấp thất bại!";
            $NhaCungCap = new NhaCungCapModel();
            $id_nhacungcap = $_POST['id_nhacungcap'];
            $ten_nhacungcap = $_POST['ten_nhacungcap'];
            $diachi = $_POST['diachi'];
            $sodienthoai = $_POST['sodienthoai'];
            $email = $_POST['email'];
            if($NhaCungCap->update("tb_nhacungcap", ['ten_nhacungcap', 'diachi' , 'sodienthoai' , 'email'], [$ten_nhacungcap, $diachi, $sodienthoai, $email], ['id_nhacungcap'], [$id_nhacungcap])){
                $_SESSION['success'] = "Cập nhật nhà cung cấp thành công!";
                header("location: index.php?controller=NhaCungCap");
            }else{
                $_SESSION['error'] = "Cập nhật nhà cung cấp thất bại!";
                header("location: index.php?controller=NhaCungCap");
            }

        }
        require_once 'views/Admin/NhaCungCapManagement/apps-ecommerce-updateNhaCungCap.php';
    }
    //End quản lý nhà cung cấp
}
}else{
    header("location: index.php");
}
?>