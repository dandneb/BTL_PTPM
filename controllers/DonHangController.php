<?php
if(!isset($_SESSION)) {
    session_start();
}
if (isset($_SESSION['LoginOK']) && $_SESSION['LoginOK'][0] == "1" || $_SESSION['LoginOK'][0] == "2") {
    $ql = explode("_", $_SESSION['LoginOK']);
require_once 'models/DonHangModel.php';
class DonHangController{
    function index(){
        require_once 'views/Admin/DonHangManagement/index.php';
    }
    function getDonHang(){
        $DHModel = new DonHangModel();
        echo $DHModel->getDonHang();
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
            if(count($donhang) > 0){
                if($DHModel->update("tb_donhang", ['trangthaidonhang'], [1], ['id_donhang'], [$id_donhang], ['and'])){
                    if($donhang[0]['id_phuongthucthanhtoan'] != 9){
                        if($DHModel->update("tb_donhang", ['trangthaithanhtoan'], [1], ['id_donhang'], [$id_donhang], ['and'])){
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
                if($DHModel->update("tb_donhang", ['trangthaivanchuyen'], [$trangthaivanchuyen], ['id_donhang'], [$id_donhang], ['and'])){
                    $_SESSION['success'] = "Chuyển trạng thái vận chuyển cho đơn hàng ".$id_donhang." thành công!";
                    header("location: index.php?controller=DonHang");
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
    }
    function huyDonHang(){
        if(isset($_GET['id_donhang'])){
            $DHModel = new DonHangModel();
            $id_donhang = $_GET['id_donhang'];
            $donhang = $DHModel->get("tb_donhang", ['id_donhang'], [$id_donhang], ['and']);
            if(count($donhang) > 0){
                if($donhang[0]['trangthaivanchuyen'] >= 1 || $donhang[0]['trangthaithanhtoan'] == 1 || $donhang[0]['trangthaidonhang']==2){
                    $_SESSION['error'] = "Không thể hủy đơn do đơn ".$id_donhang." đã thực hiện thành công!";
                    header("location: index.php?controller=DonHang");
                }else{
                    if($DHModel->update('tb_donhang', ['trangthaidonhang', 'trangthaivanchuyen', 'trangthaithanhtoan'], [3, 0, 0], ['id_donhang'], [$id_donhang], ['and'])){
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