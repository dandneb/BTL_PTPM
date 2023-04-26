<?php
if(!isset($_SESSION)) {
    session_start();
}
if (isset($_SESSION['LoginOK']) && $_SESSION['LoginOK'][0] == "1" || $_SESSION['LoginOK'][0] == "2") {
    $ql = explode("_", $_SESSION['LoginOK']);
require_once 'models/DonHangModel.php';
require_once 'models/KhachHangModel.php';
require_once("send_email.php");
class DonHangController{
    private $id_nguoiquanly;
    function __construct(){
        $this->id_nguoiquanly = explode("_", $_SESSION['LoginOK'])[1];
    }
    function index(){
        require_once 'views/Admin/DonHangManagement/index.php';
    }
    function DaHoanTat(){
        require_once 'views/Admin/DonHangManagement/apps-ecommerce-donHangHoanTat.php';
    }
    function DaHuy(){
        require_once 'views/Admin/DonHangManagement/apps-ecommerce-donHangDaHuy.php';
    }
    function getDonHang(){
        $DHModel = new DonHangModel();
        echo $DHModel->getDonHang();
    }
    function getDonHangHoanTat(){
        $DHModel = new DonHangModel();
        echo $DHModel->getDonHangHoanTat();
    }
    function getDonHangDaHuy(){
        $DHModel = new DonHangModel();
        echo $DHModel->getDonHangDaHuy();
    }
    function thongTinDonHang(){
        if(isset($_GET['id_donhang'])){
            $DHModel = new DonHangModel();
            $id_donhang = $_GET['id_donhang'];
            $donhang = $DHModel->get("tb_donhang", ['id_donhang'], [$id_donhang], ['and']);
            if(count($donhang) > 0){
                $donhang = $donhang[0];
                $donhang_sanpham = $DHModel->getDonHangSanPham($id_donhang);
                $soluongsanpham = array_reduce($donhang_sanpham, function($carry, $item) { return $carry + $item['soluong']; }, 0);
                $tongtien = array_reduce($donhang_sanpham, function($carry, $item) { return $carry + $item['soluong']*$item['dongia']; }, 0);
                $tongtien_dagiamgia = $donhang['tongtien'];
                $pTTT = $DHModel->get("tb_phuongthucthanhtoan", ['id_phuongthucthanhtoan'], [$donhang['id_phuongthucthanhtoan']], ['and'])[0];
                require_once 'views/Admin/DonHangManagement/apps-ecommerce-thongTinDonHang.php';
            }else{
                header("location: index.php?controller=DonHang");
            }
        }else{
            header("location: index.php?controller=DonHang");
        }
    }
    function duyetDonHang(){
        if(isset($_GET['id_donhang'])){
            $DHModel = new DonHangModel();
            $id_donhang = $_GET['id_donhang'];
            $donhang = $DHModel->get("tb_donhang", ['id_donhang'], [$id_donhang], ['and']);
            //die(print_r($this->id_nguoiquanly));
            if(count($donhang) > 0){
                if($DHModel->update("tb_donhang", ['trangthaidonhang', 'id_nguoiquanly'], [1, $this->id_nguoiquanly], ['id_donhang'], [$id_donhang], ['and'])){
                    if($donhang[0]['id_phuongthucthanhtoan'] != 9){
                        if($DHModel->update("tb_donhang", ['trangthaithanhtoan'], [1], ['id_donhang', ], [$id_donhang], ['and'])){
                            $_SESSION['success'] = "Phê duyệt đơn hàng ".$id_donhang." thành công!";
                            header("location: index.php?controller=DonHang");
                        }else{
                            $_SESSION['error'] = "Phê duyệt đơn hàng ".$id_donhang." thành công nhưng cập nhật thông tin thanh toán thất bại!";
                            header("location: index.php?controller=DonHang");
                        }
                    }else{
                        $_SESSION['success'] = "Phê duyệt đơn hàng ".$id_donhang." thành công!";
                        header("location: index.php?controller=DonHang");
                    }
                }else{
                    $_SESSION['error'] = "Phê duyệt đơn hàng ".$id_donhang." thất bại!";
                    header("location: index.php?controller=DonHang");
                }
            }else{
                header("location: index.php?controller=DonHang");
            }
        }else{
            header("location: index.php?controller=DonHang");
        }
    }
    function huyDuyetDonHang(){
        if(isset($_GET['id_donhang'])){
            $DHModel = new DonHangModel();
            $id_donhang = $_GET['id_donhang'];
            $donhang = $DHModel->get("tb_donhang", ['id_donhang'], [$id_donhang], ['and']);
            if(count($donhang) > 0){
                if($DHModel->update("tb_donhang", ['trangthaidonhang', 'id_nguoiquanly'], [0, $this->id_nguoiquanly], ['id_donhang'], [$id_donhang], ['and'])){
                    if($donhang[0]['id_phuongthucthanhtoan'] != 9){
                        if($DHModel->update("tb_donhang", ['trangthaithanhtoan'], [0], ['id_donhang'], [$id_donhang], ['and'])){
                            $_SESSION['success'] = "Bỏ phê duyệt đơn hàng ".$id_donhang." thành công!";
                            header("location: index.php?controller=DonHang");
                        }else{
                            $_SESSION['error'] = "Bỏ phê duyệt đơn hàng ".$id_donhang." thành công nhưng cập nhật thông tin thanh toán thất bại!";
                            header("location: index.php?controller=DonHang");
                        }
                    }else{
                        $_SESSION['success'] = "Bỏ phê duyệt đơn hàng ".$id_donhang." thành công!";
                        header("location: index.php?controller=DonHang");
                    }
                }else{
                    $_SESSION['error'] = "Bỏ phê duyệt đơn hàng ".$id_donhang." thất bại!";
                    header("location: index.php?controller=DonHang");
                }
            }else{
                header("location: index.php?controller=DonHang");
            }
        }else{
            header("location: index.php?controller=DonHang");
        }
    }

    function updateThanhToan(){
        if(isset($_POST['id_donhang'])){
            $DHModel = new DonHangModel();
            $id_donhang = $_POST['id_donhang'];
            $trangthaithanhtoan = $_POST['trangthaithanhtoan'];
            $donhang = $DHModel->get("tb_donhang", ['id_donhang'], [$id_donhang], ['and']);
            if(count($donhang) > 0){
                if($DHModel->update("tb_donhang", ['trangthaithanhtoan', 'id_nguoiquanly'], [$trangthaithanhtoan, $this->id_nguoiquanly], ['id_donhang'], [$id_donhang], ['and'])){
                    if($trangthaithanhtoan == 0){
                        $_SESSION['success'] = "Chuyển trạng thái thanh toán cho đơn hàng ".$id_donhang." thành công!";
                        header("location: index.php?controller=DonHang");
                    }else{
                        $_SESSION['success'] = "Chuyển trạng thái thanh toán cho đơn hàng ".$id_donhang." thành công, giờ hãy xác nhận vận chuyển đơn hàng!";
                        header("location: index.php?controller=DonHang&action=updateVanChuyenDonHang&id_donhang=$id_donhang");
                    }
                }else{
                    $_SESSION['error'] = "Chuyển trạng thái thanh toán cho đơn hàng ".$id_donhang." thất bại!";
                    header("location: index.php?controller=DonHang");
                }
            }else{
                header("location: index.php?controller=DonHang");
            }
        }else{
            header("location: index.php?controller=DonHang");
        }
    }

    function updateVanChuyenDonHang(){
        if(isset($_GET['id_donhang'])){
            $DHModel = new DonHangModel();
            $id_donhang = $_GET['id_donhang'];
            $donhang = $DHModel->get("tb_donhang", ['id_donhang'], [$id_donhang], ['and']);
            if(count($donhang) > 0){
                if($donhang[0]['trangthaivanchuyen'] == 0){
                    $tt = "Chưa vận chuyển";
                }else if($donhang[0]['trangthaivanchuyen'] == 1){
                    $tt = "Đang vận chuyển";
                }else{
                    $tt = "Đã giao hàng";
                }
                require_once 'views/Admin/DonHangManagement/apps-ecommerce-updateTrangThaiGiaoHang.php';
            }else{
                header("location: index.php?controller=DonHang");
            }
        }else{
            header("location: index.php?controller=DonHang");
        }
    }
    function updateDelivery(){
        if(isset($_POST['id_donhang'])){
            $DHModel = new DonHangModel();
            $id_donhang = $_POST['id_donhang'];
            $trangthaivanchuyen = $_POST['trangthaivanchuyen'];
            $donhang = $DHModel->get("tb_donhang", ['id_donhang'], [$id_donhang], ['and']);
            if(count($donhang) > 0){
                if($trangthaivanchuyen < 2){
                    if($DHModel->update("tb_donhang", ['trangthaivanchuyen', 'id_nguoiquanly'], [$trangthaivanchuyen, $this->id_nguoiquanly], ['id_donhang'], [$id_donhang], ['and'])){
                        $_SESSION['success'] = "Chuyển trạng thái vận chuyển cho đơn hàng ".$id_donhang." thành công!";
                        header("location: index.php?controller=DonHang");
                    }else{
                        $_SESSION['error'] = "Chuyển trạng thái vận chuyển cho đơn hàng ".$id_donhang." thất bại!";
                        header("location: index.php?controller=DonHang");
                    }
                }else if($trangthaivanchuyen == 2){
                    if($DHModel->update("tb_donhang", ['trangthaivanchuyen', 'id_nguoiquanly'], [$trangthaivanchuyen, $this->id_nguoiquanly], ['id_donhang'], [$id_donhang], ['and'])){
                        if($DHModel->update("tb_donhang", ['trangthaidonhang'], [2], ['id_donhang'], [$id_donhang], ['and'])){
                            $_SESSION['success'] = "Chuyển trạng thái vận chuyển và hoàn tất cho đơn hàng ".$id_donhang." thành công!";
                            header("location: index.php?controller=DonHang");
                        }else{
                            $_SESSION['error'] = "Chuyển trạng thái vận chuyển cho đơn hàng ".$id_donhang." thành công nhưng hoàn tất đơn hàng thất bại!";
                            header("location: index.php?controller=DonHang");
                        }
                    }else{
                        $_SESSION['error'] = "Chuyển trạng thái vận chuyển cho đơn hàng ".$id_donhang." thất bại!";
                        header("location: index.php?controller=DonHang");
                    }
                }else{
                    header("location: index.php?controller=DonHang");
                }
            }else{
                header("location: index.php?controller=DonHang");
            }
        }else{
            header("location: index.php?controller=DonHang");
        }
    }
    function huyDonHang(){
        if(isset($_GET['id_donhang'])){
            $DHModel = new DonHangModel();
            $khmodel = new KhachHangModel();
            $id_donhang = $_GET['id_donhang'];
            $donhang = $DHModel->get("tb_donhang", ['id_donhang'], [$id_donhang], ['and']);
            if(count($donhang) > 0){
                if($donhang[0]['trangthaivanchuyen'] >= 1 || $donhang[0]['trangthaithanhtoan'] == 1 || $donhang[0]['trangthaidonhang'] > 0){
                    $_SESSION['error'] = "Không thể hủy đơn do đơn ".$id_donhang." đã thực hiện thành công!";
                    header("location: index.php?controller=DonHang");
                }else{
                    if($DHModel->update('tb_donhang', ['trangthaidonhang', 'trangthaivanchuyen', 'trangthaithanhtoan', 'id_nguoiquanly'], [3, 0, 0, $this->id_nguoiquanly], ['id_donhang'], [$id_donhang], ['and'])){
                        $donhang = $donhang[0];
                        $donhang_sanpham = $khmodel->getDonHangSanPham($id_donhang);
                        foreach($donhang_sanpham as $item){
                            if($item['magiamgia'] != ''){
                                if($khmodel->checkMGG($item['magiamgia'])){
                                    $khmodel->updateUseCoupon($item['magiamgia']);
                                }
                            }
                        }
                        $soluongsanpham = array_reduce($donhang_sanpham, function($carry, $item) { return $carry + $item['soluong']; }, 0);
                        $tongtien = array_reduce($donhang_sanpham, function($carry, $item) { return $carry + $item['soluong']*$item['dongia']; }, 0);
                        $tongtien_dagiamgia = $donhang['tongtien'];
                        $pTTT = $khmodel->get("tb_phuongthucthanhtoan", ['id_phuongthucthanhtoan'], [$donhang['id_phuongthucthanhtoan']], ['and'])[0];
                        if($donhang['email'] != "" && $donhang['email'] != null){
                            $email = $donhang['email'];
                            $subject = "[PARFUMERIE] Đơn hàng ".$id_donhang." của bạn đã được hủy trên hệ thống.";
                            ob_start();
                            include 'views/KhachHang/Mailer_HuyDon.php';
                            $message = ob_get_clean();
                            sendemailforAccount($email, $subject, $message);
                        }
                        $_SESSION['success'] = "Hủy đơn hàng ".$id_donhang." thành công!";
                        header("location: index.php?controller=DonHang");
                    }
                }
            }else{
                header("location: index.php?controller=DonHang");
            }
        }else{
            header("location: index.php?controller=DonHang");
        }
    }
}
}else{
    header("location: index.php");
}