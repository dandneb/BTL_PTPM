<?php
if(!isset($_SESSION)) {
    session_start();
}
if (isset($_SESSION['LoginOK']) && $_SESSION['LoginOK'][0] == "2") {
    $ql = explode("_", $_SESSION['LoginOK']);
    require_once 'models/MaGiamGiaModel.php';
    require_once 'models/NuocHoaModel.php';
class MaGiamGiaController{
    //Quản lý mã giảm giá
    function index(){
        require_once 'views/Admin/MaGiamGiaManagement/index.php';
    }
    function hetHan(){
        require_once 'views/Admin/MaGiamGiaManagement/apps-ecommerce-mGGHetHan.php';
    }
    function getMaGiamGia(){
        $MaGiamGiaModel = new MaGiamGiaModel();
        echo $MaGiamGiaModel->getALLMaGiamGia();
    }
    function getMGGHetHan(){
        $MaGiamGiaModel = new MaGiamGiaModel();
        echo $MaGiamGiaModel->getMGGHetHan();
    }
    function addMaGiamGia(){
        $error = "";
        if(isset($_POST['submit'])){
            $success="Thêm mã giảm giá thành công!";
            $error="Thêm mã giảm giá thất bại!";
            $magiamgia = $_POST['magiamgia'];
            $ngaybatdau = $_POST['ngaybatdau'];
            $hansudung = $_POST['hansudung'];
            $soluotsudung = $_POST['soluotsudung'];
            $giam = $_POST['giam'];
            $id_nuochoa = $_POST['id_nuochoa'];
            $MaGiamGiaModel = new MaGiamGiaModel();
            if($MaGiamGiaModel->insert("tb_magiamgia", [
                'magiamgia',
                'ngaybatdau',
                'hansudung',
                'soluotsudung',
                'giam',
                'id_nuochoa',
            ],[
                $magiamgia,
                $ngaybatdau,
                $hansudung,
                $soluotsudung,
                $giam,
                $id_nuochoa
            ])){
                $_SESSION['success'] = "Thêm mã giảm giá thành công!";
                header("location: index.php?controller=MaGiamGia");
            }else{
                $_SESSION['error'] = "Thêm mã giảm giá thất bại!";
                header("location: index.php?controller=MaGiamGia");
            }
        }
        $nhModel = new NuocHoaModel();
        $nuochoa = $nhModel->get("tb_nuochoa");
        require_once 'views/Admin/MaGiamGiaManagement/apps-ecommerce-addMaGiamGia.php';
    }

    function updateMaGiamGia(){
        if(isset($_GET['magiamgia']) && !isset($_POST['submit'])){
            $error = "";
            $magiamgia = $_GET['magiamgia'];
            $nhModel = new NuocHoaModel();
            $nuochoa = $nhModel->get("tb_nuochoa");
            $MaGiamGiaModel = new MaGiamGiaModel();
            $mgg = $MaGiamGiaModel->get("tb_magiamgia", ['magiamgia'], [$magiamgia], ['and'])[0];
            require_once 'views/Admin/MaGiamGiaManagement/apps-ecommerce-updateMaGiamGia.php';
        }if(isset($_GET['magiamgia']) && isset($_POST['submit'])){
            $success="Cập nhật mã giảm giá thành công!";
            $error="Cập nhật mã giảm giá thất bại!";
            
            if(isset($_POST['giam'])){
                $MaGiamGiaModel = new MaGiamGiaModel();
                if($MaGiamGiaModel->update("tb_magiamgia", [
                    'ngaybatdau',
                    'hansudung',
                    'soluotsudung',
                    'giam',
                    'id_nuochoa'
                ],[
                    $_POST['ngaybatdau'],
                    $_POST['hansudung'],
                    $_POST['soluotsudung'],
                    $_POST['giam'],
                    $_POST['id_nuochoa'],
                ],[
                    'magiamgia'
                ],[
                    $_POST['magiamgia'],
                ])){
                    $_SESSION['success'] = "Cập nhật mã giảm giá thành công!";
                    header("location: index.php?controller=MaGiamGia");
                    }else{
                        $_SESSION['error'] = "Cập nhật mã giảm giá thất bại!";
                        header("location: index.php?controller=MaGiamGia");
                    }
            }else{
                $MaGiamGiaModel = new MaGiamGiaModel();
                if($MaGiamGiaModel->update("tb_magiamgia", [
                    'ngaybatdau',
                    'hansudung',
                    'soluotsudung',
                ],[
                    $_POST['ngaybatdau'],
                    $_POST['hansudung'],
                    $_POST['soluotsudung'],
                ],[
                    'magiamgia'
                ],[
                    $_POST['magiamgia'],
                ],['and'])){
                    $_SESSION['success'] = "Cập nhật mã giảm giá thành công!";
                    header("location: index.php?controller=MaGiamGia");
                    }else{
                        $_SESSION['error'] = "Cập nhật mã giảm giá thất bại!";
                        header("location: index.php?controller=MaGiamGia");
                    }
            }
        }else{
            header("location: index.php?controller=MaGiamGia");
        }
    }

    function deleteMaGiamGia(){
        if(isset($_GET['magiamgia'])){
            $MaGiamGiaModel = new MaGiamGiaModel();
            $magiamgia = $_GET['magiamgia'];
            if(count($MaGiamGiaModel->get("tb_magiamgia", ['magiamgia'], [$magiamgia], ['and'])) > 0){
                if($MaGiamGiaModel->checkMGG($magiamgia)){
                    if($MaGiamGiaModel->delete("tb_magiamgia", ['magiamgia'], [$magiamgia], ['and'])){
                        $_SESSION['success'] = "Xóa mã giảm giá thành công!";
                        header("location: index.php?controller=MaGiamGia");
                    }else{
                        $_SESSION['error'] = "Xóa mã giảm giá thất bại!";
                        header("location: index.php?controller=MaGiamGia");
                    }
                }else{
                    $_SESSION['error'] = "Xóa mã giảm giá thất bại do đã có đơn hàng áp dụng!";
                    header("location: index.php?controller=MaGiamGia");
                }
            }else{
                header("location: index.php?controller=MaGiamGia");
            }
        }else{
            header("location: index.php?controller=MaGiamGia");
        }
    }

    function checkMaGiamGia(){
        if(isset($_POST['data'])){
            $data = $_POST['data'];
            $MaGiamGiaModel = new MaGiamGiaModel();
            if(count($MaGiamGiaModel->get("tb_magiamgia", ['magiamgia'], [$data])) > 0){
                echo 1;
            }else{
                echo 0;
            }
        }
    }
}
}else{
    header("location: index.php");
}
?>