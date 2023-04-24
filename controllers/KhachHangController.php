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
        if(!isset($_SESSION['LoginOK'])){
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
                                $_SESSION['LoginOK'] = '0_'.$data['id_nguoidung'].'_'.$data['hoten'].'_'.$data['email'];
                                if(isset($_GET['purchase']))    header("location: index.php?controller=khachhang&action=muahang");
                                else    header("location: index.php");
                            }else if($data['capbac'] == 1){
                                $_SESSION['LoginOK'] = '1_'.$data['id_nguoidung'].'_'.$data['hoten'].'_'.$data['email'];
                                header("location: index.php?controller=nhanvien");
                            }else{
                                $_SESSION['LoginOK'] = '2_'.$data['id_nguoidung'].'_'.$data['hoten'].'_'.$data['email'];
                                header("location: index.php?controller=nhanvien");
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
        }else{
            header("location: index.php");
        }
    }
    function DangXuat(){
        if(isset($_SESSION['LoginOK'])){
            unset($_SESSION['LoginOK']);
            if(isset($_GET['purchase'])){
                header("location: index.php?controller=khachhang&action=muahang");
            }else{
                header('location: index.php');
            }
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
    
    //Đổi mật khẩu
    function DoiMatKhau(){
        if(isset($_SESSION['LoginOK'])){
            $kh = explode("_", $_SESSION['LoginOK']);
            $id_nguoidung = $kh[1];
            $khmodel = new KhachHangModel();
            $data = $khmodel->get("tb_diachi", ['id_nguoidung'], [$id_nguoidung], ['and']);
            $data_kh = $khmodel->get("tb_nguoidung", ['id_nguoidung'], [$id_nguoidung], ['and']);
            if(isset($_POST['submit']) && isset($_POST['matkhaucu'])){
                $matkhaucu = $_POST['matkhaucu'];
                $matkhaumoi_1 = $_POST['matkhaumoi_1'];
                $matkhaumoi_2 = $_POST['matkhaumoi_2'];
                if(password_verify($matkhaucu, $data_kh[0]['matkhau'])){
                    if($matkhaumoi_1 == $matkhaumoi_2){
                        $matkhaumoi = password_hash($matkhaumoi_1, PASSWORD_DEFAULT);
                        if($khmodel->update("tb_nguoidung", ["matkhau"] ,[$matkhaumoi], ["id_nguoidung"], [$kh[1]], ["and"])){
                            header("location: index.php?controller=khachhang&action=doimatkhau&success=");
                        }else{
                            header("location: index.php?controller=khachhang&action=doimatkhau&error=");
                        }
                    }
                }
            }
            require_once 'views/KhachHang/DoiMatKhau.php';
        }else{
            header("location: index.php");
        }
    }
    function checkMatKhau(){
        if(isset($_SESSION['LoginOK']) && isset($_POST['matkhaucu'])){
            $kh = explode("_", $_SESSION['LoginOK']);
            $id_nguoidung = $kh[1];
            $khmodel = new KhachHangModel();
            $matkhaucu = $_POST['matkhaucu'];
            $data = $khmodel->get("tb_nguoidung", ['id_nguoidung'], [$id_nguoidung], ['and']);
            if(password_verify($matkhaucu, $data[0]['matkhau'])){
                echo 1;
            }else{
                echo 0;
            }
        }else{
            echo 0;
        }
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
                if(count($khmodel->get("tb_diachi",['id_nguoidung'],[$id_nguoidung],['and'])) < 1){
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
                    if($khmodel->update("tb_diachi", ['macdinh'], [0], ['id_nguoidung'], [$id_nguoidung], ['and'])){
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
            if($khmodel->update("tb_diachi", ['macdinh'], [0], ['id_nguoidung'], [$id_nguoidung], ['and'])){
                if($khmodel->update("tb_diachi", ['macdinh'], [1], ['id_nguoidung', 'id_diachi'], [$id_nguoidung, $id_diachi], ['and', 'and'])){
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
        $khmodel = new KhachHangModel();
        require_once 'views/KhachHang/GioHang.php';
    }
    function LienHe(){
        require_once 'views/KhachHang/LienHe.php';
    }
    function MuaHang(){
        if (isset($_COOKIE['myCart'])) {
            $khmodel = new KhachHangModel();
            $gioHang = $_COOKIE['myCart'];
            $gioHang = json_decode($gioHang, true);
            $soluongsanpham = array_reduce($gioHang, function($carry, $item) { return $carry + $item['soluong']; }, 0);
            $tongtien = array_reduce($gioHang, function($carry, $item) { return $carry + $item['soluong']*$item['dongia']; }, 0);
            $soDiaChi = [];
            $checkDiaChi = false;
            if(isset($_SESSION['LoginOK'])){
                $kh = explode("_", $_SESSION['LoginOK']);
                $soDiaChi = $khmodel->get("tb_diachi", ['id_nguoidung'], [$kh[1]], ['and']);
                if(count($soDiaChi) > 0){
                    $checkDiaChi = true;
                    $dsDiaChi = array_map(function($item){
                        return $item['hoten'].", ".$item['dienthoai'].", ".$item['diachi'].", ".$item['phuongxa'].", ".$item['quanhuyen'].", ".$item['tinhthanh'];
                    }, $soDiaChi);
                    $diachi_new = array_map(function($item){
                        return [$item['hoten'],$item['dienthoai'],$item['diachi'],$item['phuongxa'],$item['quanhuyen'],$item['tinhthanh']];
                    }, $soDiaChi);
                    $diachi_new_json = json_encode($diachi_new);
                    echo "<script> var diachi = $diachi_new_json; </script>";
                }
            }
            $pTTT = $khmodel->get("tb_phuongthucthanhtoan");
            require_once 'views/KhachHang/MuaHang.php';
        } else {
            header("location: index.php");
        }
    }
    function getMaGiamGia(){
        if(isset($_POST['data'])){
            $khmodel = new KhachHangModel();
            $magiamgia = $_POST['data'];
            $mgg = $khmodel->checkMaGiamGia($magiamgia);
            if(!empty($mgg)){
                if(count($mgg) > 0){
                    echo json_encode($mgg);
                }else{
                    echo 0;
                }
            }else{
                echo 0;
            }
        }else {
            header("location: index.php");
        }
    }
    function DatHang(){
        $kh = "";
        if(isset($_POST['submit'])){
            $khmod = new KhachHangModel();
            $characters = '01234567890123456789ABCDEFGHIJKLMNOPQRSTUVWXYZABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $randomString = str_shuffle($characters);
            $id_donhang = substr($randomString, 0, 11);
            if(!empty($_POST['email'])){
                $email = $_POST['email'];
            }else{
                $email = '';
            }
            $hoten = $_POST['hoten'];
            $dienthoai = $_POST['dienthoai'];
            $diachi = $_POST['diachi'];
            $tinhthanh = $_POST['tinhthanh'];
            $quanhuyen = $_POST['quanhuyen'];
            $phuongxa = $_POST['phuongxa'];
            $ghichu = $_POST['ghichu'];
            $id_phuongthucthanhtoan = $_POST['thanh-toan'];
            if(isset($_POST['diachikhac'])){
                $diachikhac = $_POST['diachikhac'];
                $hoten_khac = $_POST['hoten_khac'];
                $dienthoai_khac = $_POST['dienthoai_khac'];
                $diachi_khac = $_POST['diachi_khac'];
                $tinhthanh_khac = $_POST['tinhthanh_khac'];
                $quanhuyen_khac = $_POST['quanhuyen_khac'];
                $phuongxa_khac = $_POST['phuongxa_khac'];
                $ghichu_khac = $_POST['ghichu_khac'];
            }
            else    $diachikhac = 0;
            $khmod = new KhachHangModel();
            $gioHang = $_COOKIE['myCart'];
            $gioHang = json_decode($gioHang, true);
            $sanPham = array_map(function($item){
                $khmodel = new KhachHangModel();
                $nh = $khmodel->get("tb_gianuochoa", ['id_nuochoa', 'dungtich'], [$item['id_nuochoa'], $item['dungtich']], ['and', 'and']);
                if(count($nh)>0){
                    $item['dongia'] = $nh[0]['gia_ban'];
                }else{
                    setcookie("myCart", "", time() - 3600);
                    header("location: index.php");
                }
                return $item;
            }, $gioHang);
            $tongtien = array_reduce($sanPham, function($carry, $item) { return $carry + $item['soluong']*$item['dongia']; }, 0);
            if(!empty($_POST['magiamgia'])){
                $magiamgia = $_POST['magiamgia'];
                $mgg = $khmod->getMaGiamGia($magiamgia);
                if($mgg != false){
                    $id_nuochoaGG = $mgg[0]['id_nuochoa'];
                    if(count($mgg) > 0){
                        $sanpham_giamgia = array_filter($sanPham, function($item) use ($id_nuochoaGG){
                            return $item['id_nuochoa'] == $id_nuochoaGG;
                        }, 1);
                        $tiengiamgia = array_reduce($sanpham_giamgia, function($carry, $item) { return $carry + $item['soluong']*$item['dongia']; }, 0)*$mgg[0]['giam']/100;
                        $tongtien = $tongtien - $tiengiamgia;
                    }else{
                        $magiamgia = '';
                        $tiengiamgia = 0;
                    }
                }else{
                    $magiamgia = '';
                    $tiengiamgia = 0;
                }
            }else{
                $magiamgia = '';
                $tiengiamgia = 0;
            }
            $flag = false;
            if(isset($_SESSION['LoginOK'])){
                $kh = explode("_", $_SESSION['LoginOK']);
                if(isset($_POST['diachikhac'])){
                    if($khmod->insert("tb_donhang", [
                        'id_donhang',
                        'email',
                        'hoten',
                        'sodienthoai',
                        'diachi',
                        'tinhthanh',
                        'quanhuyen',
                        'phuongxa',
                        'ghichu',
                        'diachikhac',
                        'hoten_khac',
                        'sodienthoai_khac',
                        'diachi_khac',
                        'tinhthanh_khac',
                        'quanhuyen_khac',
                        'phuongxa_khac',
                        'ghichu_khac',
                        'id_phuongthucthanhtoan',
                        'id_khachhang',
                        'khuyenmai',
                        'tongtien',
                    ], [
                        $id_donhang,
                        $email,
                        $hoten,
                        $dienthoai,
                        $diachi,
                        $tinhthanh,
                        $quanhuyen,
                        $phuongxa,
                        $ghichu,
                        $diachikhac,
                        $hoten_khac,
                        $dienthoai_khac,
                        $diachi_khac,
                        $tinhthanh_khac,
                        $quanhuyen_khac,
                        $phuongxa_khac,
                        $ghichu_khac,
                        $id_phuongthucthanhtoan,
                        $kh[1],
                        $tiengiamgia,
                        $tongtien,
                    ])){
                        $flag = true;
                    }
                }else{
                    if($khmod->insert("tb_donhang", [
                        'id_donhang',
                        'email',
                        'hoten',
                        'sodienthoai',
                        'diachi',
                        'tinhthanh',
                        'quanhuyen',
                        'phuongxa',
                        'ghichu',
                        'diachikhac',
                        'id_phuongthucthanhtoan',
                        'id_khachhang',
                        'khuyenmai',
                        'tongtien',
                    ], [
                        $id_donhang,
                        $email,
                        $hoten,
                        $dienthoai,
                        $diachi,
                        $tinhthanh,
                        $quanhuyen,
                        $phuongxa,
                        $ghichu,
                        0,
                        $id_phuongthucthanhtoan,
                        $kh[1],
                        $tiengiamgia,
                        $tongtien,
                    ])){
                        $flag = true;
                    }
                }
            }else{
                if(isset($_POST['diachikhac'])){
                    if($khmod->insert("tb_donhang", [
                        'id_donhang',
                        'email',
                        'hoten',
                        'sodienthoai',
                        'diachi',
                        'tinhthanh',
                        'quanhuyen',
                        'phuongxa',
                        'ghichu',
                        'diachikhac',
                        'hoten_khac',
                        'sodienthoai_khac',
                        'diachi_khac',
                        'tinhthanh_khac',
                        'quanhuyen_khac',
                        'phuongxa_khac',
                        'ghichu_khac',
                        'id_phuongthucthanhtoan',
                        'khuyenmai',
                        'tongtien',
                    ], [
                        $id_donhang,
                        $email,
                        $hoten,
                        $dienthoai,
                        $diachi,
                        $tinhthanh,
                        $quanhuyen,
                        $phuongxa,
                        $ghichu,
                        $diachikhac,
                        $hoten_khac,
                        $dienthoai_khac,
                        $diachi_khac,
                        $tinhthanh_khac,
                        $quanhuyen_khac,
                        $phuongxa_khac,
                        $ghichu_khac,
                        $id_phuongthucthanhtoan,
                        $tiengiamgia,
                        $tongtien,
                    ])){
                        $flag = true;
                    }
                }else{
                    if($khmod->insert("tb_donhang", [
                        'id_donhang',
                        'email',
                        'hoten',
                        'sodienthoai',
                        'diachi',
                        'tinhthanh',
                        'quanhuyen',
                        'phuongxa',
                        'ghichu',
                        'diachikhac',
                        'id_phuongthucthanhtoan',
                        'khuyenmai',
                        'tongtien',
                    ], [
                        $id_donhang,
                        $email,
                        $hoten,
                        $dienthoai,
                        $diachi,
                        $tinhthanh,
                        $quanhuyen,
                        $phuongxa,
                        $ghichu,
                        0,
                        $id_phuongthucthanhtoan,
                        $tiengiamgia,
                        $tongtien,
                    ])){
                        $flag = true;
                    }
                }
            }
            if($flag == true){
                $count = 0;
                foreach($sanPham as $item){
                    $id_nuochoa = $item['id_nuochoa'];
                    $dungtich = $item['dungtich'];
                    $dongia = $item['dongia'];
                    $soluong = $item['soluong'];
                    if($magiamgia != ""){
                        if($mgg[0]['id_nuochoa'] == $item['id_nuochoa']){
                            $tong = $item['dongia']*$item['soluong'];
                            $giam = $tong*($mgg[0]['giam']/100);
                            $tong = $tong - $giam;
                            if($khmod->insert("tb_donhang_nuochoa", [
                                'id_donhang',
                                'id_nuochoa',
                                'dungtich',
                                'dongia',
                                'soluong',
                                'giamgia',
                                'tong',
                                'magiamgia',
                            ],
                            [
                                $id_donhang,
                                $id_nuochoa,
                                $dungtich,
                                $dongia,
                                $soluong,
                                $giam,
                                $tong,
                                $magiamgia,
                            ])){
                                $count++;
                                $khmod->updateSoLuotSuDung($mgg[0]['magiamgia']);
                            }
                        }else{
                            $tong = $item['dongia']*$item['soluong'];
                            if($khmod->insert("tb_donhang_nuochoa", [
                                'id_donhang',
                                'id_nuochoa',
                                'dungtich',
                                'dongia',
                                'soluong',
                                'giamgia',
                                'tong',
                            ],
                            [
                                $id_donhang,
                                $id_nuochoa,
                                $dungtich,
                                $dongia,
                                $soluong,
                                0,
                                $tong,
                            ])){
                                $count++;
                            }
                        }
                    }else{
                        $tong = $item['dongia']*$item['soluong'];
                        if($khmod->insert("tb_donhang_nuochoa", [
                            'id_donhang',
                            'id_nuochoa',
                            'dungtich',
                            'dongia',
                            'soluong',
                            'giamgia',
                            'tong',
                        ],
                        [
                            $id_donhang,
                            $id_nuochoa,
                            $dungtich,
                            $dongia,
                            $soluong,
                            0,
                            $tong,
                        ])){
                            $count++;
                        }
                    }
                }
                if($count == count($sanPham)){
                    setcookie("myCart", "", time() - 3600);
                    header("location: index.php?controller=khachhang&action=HoanTatDatHang&id_donhang=$id_donhang");
                }
            }else{
                
            }
        }else{
            header("location: index.php");
        }
    }
    function HoanTatDatHang(){
        if(isset($_GET['id_donhang'])){
            $khmodel = new KhachHangModel();
            $id_donhang = $_GET['id_donhang'];
            $donhang = $khmodel->get("tb_donhang", ['id_donhang'], [$id_donhang], ['and']);
            if(count($donhang) > 0){
                $donhang = $donhang[0];
                $donhang_sanpham = $khmodel->getDonHangSanPham($id_donhang);
                $soluongsanpham = array_reduce($donhang_sanpham, function($carry, $item) { return $carry + $item['soluong']; }, 0);
                $tongtien = array_reduce($donhang_sanpham, function($carry, $item) { return $carry + $item['soluong']*$item['dongia']; }, 0);
                $tongtien_dagiamgia = $donhang['tongtien'];
                $pTTT = $khmodel->get("tb_phuongthucthanhtoan", ['id_phuongthucthanhtoan'], [$donhang['id_phuongthucthanhtoan']], ['and'])[0];
                if($donhang['email'] != "" && $donhang['email'] != null && $donhang['thongbao'] == 0){
                    $email = $donhang['email'];
                    $subject = "[PARFUMERIE] Đơn hàng ".$id_donhang." của bạn đã được đặt trên hệ thống.";
                    ob_start();
                    include 'views/KhachHang/Mailer.php';
                    $message = ob_get_clean();
                    sendemailforAccount($email, $subject, $message);
                    $khmodel->update("tb_donhang", ['thongbao'], [1], ['id_donhang'], [$id_donhang], ['and']);
                }
                
                require 'views/KhachHang/HoanTatDatHang.php';
            }else{
                header("location: index.php");
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
            echo "<script> var id_khachhang = '".$id_nguoidung."'</script>";
            require_once 'views/KhachHang/DonHang.php';
        }else{
            header("location: index.php");
        }
    }
    function getDonHang(){
        if(isset($_GET['id_khachhang']) && isset($_SESSION['LoginOK']) && $_GET['id_khachhang'] == explode("_", $_SESSION['LoginOK'])[1] ){
            $id_khachhang = $_GET['id_khachhang'];
            $khmodel = new KhachHangModel();
            echo $khmodel->getALLDH($id_khachhang);
        }else{

        }
    }
    function TimKiemDonHang(){
        require_once 'views/KhachHang/TimKiemDonHang.php';
    }

    function ThongTinDonHang(){
        if(isset($_GET['id_donhang']) && !empty($_GET['id_donhang'])){
            $id_donhang = $_GET['id_donhang'];
            $khmodel = new KhachHangModel();
            $donhang = $khmodel->get("tb_donhang", ['id_donhang'], [$id_donhang], ['and']);
            if(count($donhang) > 0){
                $donhang = $donhang[0];
                $donhang_sanpham = $khmodel->getDonHangSanPham($id_donhang);
                $soluongsanpham = array_reduce($donhang_sanpham, function($carry, $item) { return $carry + $item['soluong']; }, 0);
                $tongtien = array_reduce($donhang_sanpham, function($carry, $item) { return $carry + $item['soluong']*$item['dongia']; }, 0);
                $tongtien_dagiamgia = $donhang['tongtien'];
                $pTTT = $khmodel->get("tb_phuongthucthanhtoan", ['id_phuongthucthanhtoan'], [$donhang['id_phuongthucthanhtoan']], ['and'])[0];
                require_once 'views/KhachHang/ThongTinDonHang.php';
            }else{
                $_SESSION['error'] = "Không tìm thấy đơn hàng này!";
                header("location: index.php?controller=KhachHang&action=TimKiemDonHang");
            }
        }else{
            header("location: index.php");
        }
    }

    function ChiTietDonHang(){
        if(isset($_SESSION['LoginOK'])){
            $kh = explode("_", $_SESSION['LoginOK']);
            $id_nguoidung = $kh[1];
            $khmodel = new KhachHangModel();
            $data = $khmodel->get("tb_diachi", ['id_nguoidung'], [$id_nguoidung], ['and']);
            echo "<script> var id_khachhang = '".$id_nguoidung."'</script>";
            if(isset($_GET['id_donhang'])){
                $id_donhang = $_GET['id_donhang'];
                $donhang = $khmodel->get("tb_donhang", ['id_donhang'], [$id_donhang], ['and']);
                if(count($donhang) > 0){
                    $donhang = $donhang[0];
                    $donhang_sanpham = $khmodel->getDonHangSanPham($id_donhang);
                    $soluongsanpham = array_reduce($donhang_sanpham, function($carry, $item) { return $carry + $item['soluong']; }, 0);
                    $tongtien = array_reduce($donhang_sanpham, function($carry, $item) { return $carry + $item['soluong']*$item['dongia']; }, 0);
                    $tongtien_dagiamgia = $donhang['tongtien'];
                    $pTTT = $khmodel->get("tb_phuongthucthanhtoan", ['id_phuongthucthanhtoan'], [$donhang['id_phuongthucthanhtoan']], ['and'])[0];
                    require_once 'views/KhachHang/ChiTietDonHang.php';
                }else{
                    header("location: index.php");
                }
            }else{
                header("location: index.php");
            }
        }else{
            header("location: index.php");
        }
    }
    function HuyDonHang(){
        if(isset($_SESSION['LoginOK'])){
            if(isset($_GET["id_donhang"])){
                $id_donhang = $_GET['id_donhang'];
                    $khmodel = new KhachHangModel();
                    $donhang = $khmodel->get("tb_donhang", ['id_donhang'], [$id_donhang], ['and']);
                if(count($donhang) > 0){
                    if($donhang[0]['trangthaidonhang'] == 0 && $donhang[0]['trangthaithanhtoan'] == 0 && $donhang[0]['trangthaivanchuyen'] == 0){
                        if($khmodel->update("tb_donhang", ['trangthaidonhang'], [3], ['id_donhang'], [$id_donhang], ['and'])){
                            $donhang = $donhang[0];
                            $donhang_sanpham = $khmodel->getDonHangSanPham($id_donhang);
                            $soluongsanpham = array_reduce($donhang_sanpham, function($carry, $item) { return $carry + $item['soluong']; }, 0);
                            $tongtien = array_reduce($donhang_sanpham, function($carry, $item) { return $carry + $item['soluong']*$item['dongia']; }, 0);
                            $tongtien_dagiamgia = $donhang['tongtien'];
                            $pTTT = $khmodel->get("tb_phuongthucthanhtoan", ['id_phuongthucthanhtoan'], [$donhang['id_phuongthucthanhtoan']], ['and'])[0];
                            if($donhang['email'] != "" && $donhang['email'] != null){
                                $email = $donhang['email'];
                                $subject = "[PARFUMERIE] Đơn hàng ".$id_donhang." của bạn đã được hủy trên hệ thống.";
                                ob_start();
                                include 'views/KhachHang//Mailer_HuyDon.php';
                                $message = ob_get_clean();
                                sendemailforAccount($email, $subject, $message);
                            }
                            $_SESSION['success'] = "Hủy đơn hàng ".$id_donhang." thành công!";
                            header("location: index.php?controller=KhachHang&action=ChiTietDonHang&id_donhang=$id_donhang");
                        }else{
                            $_SESSION['error'] = "Hủy đơn hàng ".$id_donhang." không thành công!";
                            header("location: index.php?controller=KhachHang&action=ChiTietDonHang&id_donhang=$id_donhang");
                        }
                    }
                }
            }
        }else{
            header("location: index.php");
        }
    }
}
?>