<?php
if(!isset($_SESSION)) {
    session_start();
}
if (isset($_SESSION['LoginOK']) && $_SESSION['LoginOK'][0] == "2") {
    $ql = explode("_", $_SESSION['LoginOK']);
    require_once 'models/ThanhToanModel.php';

class ThanhToanController{
    //Quản lý phương thức thanh toán
    function index(){
        require_once 'views/Admin/ThanhToanManagement/index.php';
    }
    function getThanhToan(){
        $pTTTModel = new ThanhToanModel();
        echo $pTTTModel->getALLPTTT();
    }

    function addThanhToan(){
        $error = "";
        if(isset($_POST['submit'])){
            $ten = $_POST['ten'];
            $mota = $_POST['mota'];
            $pTTTModel = new ThanhToanModel();
            $id = $pTTTModel->insert("tb_phuongthucthanhtoan", ['ten', 'mota'], [$ten, $mota]);
            if($id != false) {
                $folder_name = "../BTL_PTPM/images/PhuongThucThanhToan/" . $id . "/";
                if (!file_exists($folder_name)) {
                    mkdir($folder_name, 0777, true);
                }
                $allowTypes = array('jpg', 'png', 'jpeg', 'pdf');
                $link = "images/PhuongThucThanhToan/" . $id . "/";
                $newFilePath = $folder_name . $id . "." . explode("/", $_FILES['file']['type'])[1];
                $new_link = $link . $id . "." . explode("/", $_FILES['file']['type'])[1];
                $fileType = pathinfo($newFilePath, PATHINFO_EXTENSION);
                if (in_array($fileType, $allowTypes)) {
                    if ($_FILES['file']['size'] <= 5 * 1024 * 1024)
                        $tmpFilePath = $_FILES['file']['tmp_name'];
                    if ($tmpFilePath != "") {
                        if (move_uploaded_file($tmpFilePath, $newFilePath)) {
                            if($pTTTModel->update("tb_phuongthucthanhtoan", ['image_link'], [$new_link], ['id_phuongthucthanhtoan'], [$id], ['and'])){
                                $_SESSION['success'] = "Thêm phương thức thanh toán thành công!";
                                header("location: index.php?controller=ThanhToan");
                            }else{
                                $_SESSION['error'] = "Thêm phương thức thanh toán thất bại!";
                                header("location: index.php?controller=ThanhToan");
                            }
                        }else{
                            $_SESSION['error'] = "Thêm phương thức thanh toán thất bại do không thể thấy file ảnh!";
                            header("location: index.php?controller=ThanhToan");
                        }
                    }else{
                        $_SESSION['error'] = "Thêm phương thức thanh toán thất bại do không thể thấy file ảnh!";
                        header("location: index.php?controller=ThanhToan");
                    }
                }else{
                    $_SESSION['error'] = "Thêm phương thức thanh toán thất bại do định dạng file ảnh không đúng!";
                    header("location: index.php?controller=ThanhToan");
                }
            }else{
                $_SESSION['error'] = "Thêm phương thức thanh toán thất bại!";
                header("location: index.php?controller=ThanhToan");
            }
        }
        require_once 'views/Admin/ThanhToanManagement/apps-ecommerce-addThanhToan.php';
    }

    function deleteThanhToan(){
        if(isset($_GET['id_phuongthucthanhtoan']) && !empty($_GET['id_phuongthucthanhtoan'])){
            $pTTTModel = new ThanhToanModel();
            $id = $_GET['id_phuongthucthanhtoan'];
            $pttt = $pTTTModel->get("tb_phuongthucthanhtoan", ['id_phuongthucthanhtoan'], [$id], ['and']);
            if($pttt != false && count($pttt) > 0){
                $pttt = $pttt[0];
                if($pTTTModel->update("tb_donhang", ['id_phuongthucthanhtoan'], [null], ['id_phuongthucthanhtoan'], [$id], ['and'])){
                    $dir = dirname($pttt['image_link']);
                    unlink($pttt['image_link']);
                    rmdir($dir);
                    if($pTTTModel->delete("tb_phuongthucthanhtoan", ['id_phuongthucthanhtoan'], [$id], ['and'])){
                        $_SESSION['success'] = "Xóa phương thức thanh toán thành công!";
                        header("location: index.php?controller=ThanhToan");
                    }else{
                        $_SESSION['error'] = "Xóa phương thức thanh toán thất bại!";
                        header("location: index.php?controller=ThanhToan");
                    }
                }else{
                    header("location: index.php?controller=ThanhToan");
                }
            }else{
                header("location: index.php?controller=ThanhToan");
            }
        }else{
            header("location: index.php?controller=ThanhToan");
        }
    }
}
}else{
    header("location: index.php");
}

?>