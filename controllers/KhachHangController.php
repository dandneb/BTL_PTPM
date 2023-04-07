<?php
if(!isset($_SESSION)) {
    session_start();
}
require_once 'models/KhachHangModel.php';
require_once("send_email.php");
class KhachHangController{
    function index(){
        if(isset($_SESSION['LoginOK'])){
            $kh = explode("_", $_SESSION['LoginOK']);
            $khmodel = new KhachHangModel();
            $data_kh = $khmodel->getKhachHang($kh[1]);
            $data = $khmodel->get("tb_diachi", ['id_nguoidung'], [$kh[1]], ['and']);
            require_once 'views/KhachHang/index.php';
        }else{
            header("location:index.php");
        }
    }
    function DangNhap(){
        $error = "";
        $khmodel = new KhachHangModel();
        if(isset($_POST["submit"])){
            $taikhoan = $_POST['taikhoan'];
            $matkhau = $_POST['matkhau'];
            $data = $khmodel->checkArrVal("tb_nguoidung", ["email", "dienthoai"], [$taikhoan, $taikhoan], "or");
            if(count($data) > 0){
                $data = $data[0];
                if(password_verify($matkhau, $data['matkhau'])){
                    if($data['trangthai'] == 0){
                        $error = "Tài khoản của bạn chưa được xác thực, hãy kiểm tra lại email!";
                    }else if($data['trangthai'] == 2){
                        $error = "Tài khoản của bạn đã bị khóa hãy liên hệ với cửa hàng để được hỗ trợ!";
                    }else{
                        if($data['capbac'] == 0){
                            $_SESSION['LoginOK'] = '0_'.$data['id_nguoidung'].'_'.$data['hoten'];
                            header("location: index.php");
                        }else if($data['capbac'] == 1){
                            $_SESSION['LoginOK'] = '1_'.$data['id_nguoidung'].'_'.$data['hoten'];
                            header("location: index.php?controller=admin");
                        }else{
                            $_SESSION['LoginOK'] = '2_'.$data['id_nguoidung'].'_'.$data['hoten'];
                            header("location: index.php?controller=admin");
                        }
                    }
                }else{
                    $error = "Mật khẩu không chính xác!";
                }
            }else{
                $error = "Tài khoản không tồn tại!";
            }
        }
        require_once 'views/KhachHang/DangNhap.php';
    }
    function DangXuat(){
        if(isset($_SESSION['LoginOK'])){
            unset($_SESSION['LoginOK']);
            header('location: index.php');
        }
    }
    function DangKy(){
        $khmodel = new KhachHangModel();
        if(isset($_POST["submit"])){
            if(isset($_POST['email']) && isset($_POST['dienthoai'])){
                if(!$khmodel->check("tb_nguoidung", "email", $_POST['email']) && !$khmodel->check("tb_nguoidung", "dienthoai", $_POST['dienthoai'])){
                    $characters = '01234567890123456789ABCDEFGHIJKLMNOPQRSTUVWXYZABCDEFGHIJKLMNOPQRSTUVWXYZ';
                    $randomString = str_shuffle($characters);
                    $id_nguoidung = substr($randomString, 0, 11);
                    $token = md5($_POST['email']).rand(10,9999);
                    $hoten = $_POST['hoten'];
                    $email = $_POST['email'];
                    $dienthoai = $_POST['dienthoai'];
                    $matkhau = password_hash($_POST['matkhau'], PASSWORD_DEFAULT);
                    $capbac = 0;
                    $mota = "Khách hàng thành viên";
                    $kh = [
                        'id_nguoidung' => $id_nguoidung,
                        'hoten' => $hoten,
                        'email' => $email,
                        'dienthoai' => $dienthoai,
                        'matkhau' => $matkhau,
                        'link_xacthucemail' => $token,
                        'capbac' => $capbac,
                        'mota' => $mota,
                    ];
                    $khmodel->DangKy($kh);
                    $link = "<a href='http://localhost/BTL_PTPM/index.php?controller=khachhang&action=activation&key=".$email."&token=".$token."'>Nhấp vào đây để kích hoạt.</a>";
                    $subject = "[PARFUMERIE] Xác thực tài khoản của bạn với Parfumerie.";
                    $body = 'Chào mừng bạn đến với Parfumerie.com. Để sử dụng tài khoản, '.$link;
                    sendemailforAccount($email, $subject, $body);
                    header("location: index.php?controller=khachhang&action=activation");
                }
            }
        }
        require_once 'views/KhachHang/DangKy.php';
    }
    function Activation(){
        $title = "Xác thực tài khoản";
        $msg = "Một email xác thực đã được gửi tới email của bạn.
        Hãy kiểm tra email và thực hiện xác thực tài khoản của bạn.";
        $khmodel = new KhachHangModel();
        if(isset($_GET['key']) && isset($_GET['token'])){
            $data = $khmodel->checkArrVal("tb_nguoidung", ["email", "link_xacthucemail"], [$_GET['key'], $_GET['token']], "and");
            if(count($data) > 0){
                $d = date('Y-m-d H:i:s');
                $data = $data[0];
                if($data['thoigian_xacthuc'] == NULL){
                    $activation = [
                        "timestamp" => $d,
                        "email" => $_GET['key'],
                    ];
                    $khmodel->updateActivation($activation);
                    $msg = "Chúc mừng bạn đã xác thực được Email.";
                }else{
                    $msg = "Bạn đã xác nhận email với chúng tôi rồi!";
                }
            }else{
                $msg = "Email này chưa được đăng ký với chúng tôi!";
            }
        }
        require_once 'views/KhachHang/Activation.php';
    }
    function checkEmail(){
        if(isset($_POST['email'])){
            $khmodel = new KhachHangModel();
            if($khmodel->check("tb_nguoidung", "email", $_POST['email'])){
                echo 1;
            }else{
                echo 0;
            }
        }else{
            header("location: index.php");
        }
    }
    function checkSDT(){
        if(isset($_POST['sodienthoai'])){
            $khmodel = new KhachHangModel();
            if($khmodel->check("tb_nguoidung", "dienthoai",$_POST['sodienthoai'])){
                echo 1;
            }else{
                echo 0;
            }
        }else{
            header("location: index.php");
        }
    }
    function DonHang(){
        if(isset($_SESSION['LoginOK'])){
            $kh = explode("_", $_SESSION['LoginOK']);
            $id_nguoidung = $kh[1];
            $khmodel = new KhachHangModel();
            $data = $khmodel->get("tb_diachi", ['id_nguoidung'], [$id_nguoidung], ['and']);
            require_once 'views/KhachHang/DonHang.php';
        }else{
            header("location: index.php");
        }
    }
    //Đổi mật khẩu
    function DoiMatKhau(){
        if(isset($_SESSION['LoginOK'])){
            $kh = explode("_", $_SESSION['LoginOK']);
            $id_nguoidung = $kh[1];
            $khmodel = new KhachHangModel();
            $data = $khmodel->get("tb_diachi", ['id_nguoidung'], [$id_nguoidung], ['and']);
            require_once 'views/KhachHang/DoiMatKhau.php';
        }else{
            header("location: index.php");
        }
    }
    function checkMatKhau(){
        
    }
    //End Đổi mật khẩu
    //Sổ địa chỉ
    function SoDiaChi(){
        if(isset($_SESSION['LoginOK'])){
            $kh = explode("_", $_SESSION['LoginOK']);
            $id_nguoidung = $kh[1];
            $khmodel = new KhachHangModel();
            $data = $khmodel->get("tb_diachi", ['id_nguoidung'], [$id_nguoidung], ['and']);
            require_once 'views/KhachHang/SoDiaChi.php';
        }else{
            header("location: index.php");
        }
    }
    function insertDiaChi(){
        if(isset($_SESSION['LoginOK'])){
            $kh = explode("_", $_SESSION['LoginOK']);
            $id_nguoidung = $kh[1];
            $khmodel = new KhachHangModel();
            if(isset($_POST['submit'])){
                $hoten = $_POST['hoten'];
                $dienthoai = $_POST['dienthoai'];
                $congty = $_POST['congty'];
                $diachi = $_POST['diachi'];
                $quocgia = $_POST['country'];
                if($quocgia == 'Vietnam'){
                    $tinhthanh = $_POST['tinhthanh'];
                    $quanhuyen = $_POST['quanhuyen'];
                    $phuongxa = $_POST['phuongxa'];
                }else{
                    $tinhthanh = NULL;
                    $quanhuyen = NULL;
                    $phuongxa = NULL;
                }
                $mazip = $_POST['mazip'];
                if(count($khmodel->get("tb_diachi",[],[],[])) < 1){
                    $macdinh = 1;
                }else{
                    $macdinh = 0;
                    if (isset($_POST['macdinh']) && $_POST['macdinh'] == '1') {
                        $macdinh = $_POST['macdinh'];
                    }
                }
                $column = [
                    'hoten', 'dienthoai', 'congty', 'diachi', 'quocgia', 'tinhthanh', 'quanhuyen', 'phuongxa', 'mazip', 'macdinh', 'id_nguoidung'
                ];
                $value = [
                    $hoten, $dienthoai, $congty, $diachi, $quocgia, $tinhthanh, $quanhuyen, $phuongxa, $mazip, $macdinh, $id_nguoidung,
                ];
                
                if($macdinh == 1){
                    if($khmodel->update("tb_diachi", ['macdinh'], [0], ['id_nguoidung'], [$id_nguoidung], 'and')){
                        if($khmodel->insert("tb_diachi", $column, $value)){
                            header("location: index.php?controller=khachhang&action=sodiachi&success=");
                        }else{
                            header("location: index.php?controller=khachhang&action=sodiachi&error=");
                        }
                    }
                }else{
                    if($khmodel->insert("tb_diachi", $column, $value)){
                        header("location: index.php?controller=khachhang&action=sodiachi&success=");
                    }else{
                        header("location: index.php?controller=khachhang&action=sodiachi&error=");
                    }
                }
            }else{
                header("location: index.php");
            }
        }else{
            header("location: index.php");
        }
    }
    function xoaDiaChi(){
        if(isset($_SESSION['LoginOK']) && isset($_POST['submit-xoaDiaChi'])){
            $khmodel = new KhachHangModel();
            $id_diachi = $_POST['submit-xoaDiaChi'];
            if($khmodel->delete("tb_diachi", ['id_diachi'], [$id_diachi], ['and'])){
                header("location: index.php?controller=khachhang&action=sodiachi&delete_success=");
            }else{
                header("location: index.php?controller=khachhang&action=sodiachi&delete_error=");
            }
        }else{
            header("location: index.php");
        }
    }
    function datMacDinh(){
        if(isset($_SESSION['LoginOK']) && isset($_POST['submit-datMacDinh'])){
            $kh = explode("_", $_SESSION['LoginOK']);
            $id_nguoidung = $kh[1];
            $khmodel = new KhachHangModel();
            $id_diachi = $_POST['submit-datMacDinh'];
            if($khmodel->update("tb_diachi", ['macdinh'], [0], ['id_nguoidung'], [$id_nguoidung], 'and')){
                if($khmodel->update("tb_diachi", ['macdinh'], [1], ['id_nguoidung', 'id_diachi'], [$id_nguoidung, $id_diachi], 'and')){
                    header("location: index.php?controller=khachhang&action=sodiachi&update_success=");
                }else{
                    header("location: index.php?controller=khachhang&action=sodiachi&update_error=");
                }
            }else{
                header("location: index.php?controller=khachhang&action=sodiachi&update_error=");
            }
        }else{
            header("location: index.php");
        }
    }
    //End Sổ địa chỉ
    function YeuThich(){
        require_once 'views/KhachHang/YeuThich.php';
    }
    function GioHang(){
        require_once 'views/KhachHang/GioHang.php';
    }
    function LienHe(){
        require_once 'views/KhachHang/LienHe.php';
    }
    function MuaHang(){
        require_once 'views/KhachHang/MuaHang.php';
    }
    function HoanTatDatHang(){
        require_once 'views/KhachHang/HoanTatDatHang.php';
    }
    function ChiTietDonHang(){
        require_once 'views/KhachHang/ChiTietDonHang.php';
    }
}
?>