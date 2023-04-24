<?php
if(!isset($_SESSION)) {
    session_start();
}
if (isset($_SESSION['LoginOK']) && $_SESSION['LoginOK'][0] == "1" || $_SESSION['LoginOK'][0] == "2") {
    $ql = explode("_", $_SESSION['LoginOK']);
require_once 'models/NhanVienModel.php';
require_once 'models/NhaCungCapModel.php';
require_once 'models/ThuongHieuModel.php';
require_once 'models/NuocHoaModel.php';
class NhanVienController{
    function index(){
        require_once 'views/Admin/index.php';
    }
    function analytics(){
        require_once 'views/Admin/dashboard-analytics.php';
    }
    //Quản lý sản phẩm
    function sanpham(){
        require_once 'views/Admin/ProductManagement/index.php';
    }
    function getSanPham(){
        $NhanVienModel = new NhanVienModel();
        echo $NhanVienModel->getALLProducts();
    }
    function addImage(){
        /*
        $arrTH = ['AFNAN', 'AMOUAGE', 'ARMAF', 'BURBERRY', 'BVLGARI', 'CAROLINA HERRERA', 'CHANEL', 'CALVIN KLEIN', 'DOLCE & GABBANA', 'DIOR', 'DIPTYQUE', 'FREDERIC MALLE', 'GIORGIO ARMANI', 'GUCCI', 'JO MALONE', 'JEAN PAUL GAUTIER', 'KILIAN', 'LANCOME', 'LE LABO', 'MAISON MARGIELA', 'MARC JACOBS', 'MONTALE', 'NARCISO RODRIGUEZ', 'SALVATORE FERRAGAMO', 'VERSACE', 'YSL', 'HERMES', 'TOM FORD', 'MONT BLANC', 'MOSCHINO', 'CLIVE CHRISTIAN', 'PACO RANBANNE', 'ALREHAB', 'ALFRED DUNHILL', 'XERJOFF', 'DAVIDOFF', 'SERGE LUTENS', 'LATTAFA', 'FLORIS', 'PARFUMS de MARLY', 'MANCERA', 'AL HARAMAIN', 'DIESEL', "ETAT LIBRE D'ORANGE", 'NISHANE', 'FRANCK BOCLET', 'KENZO', 'ATELIER DES ORS', 'CHLOÃ‰', 'LOUIS VUITTON', 'VICTORIAâ€™S SECRET', 'NASOMATTO', 'LALIQUE', 'NAUTICA', 'THOMAS KOSMALA', "PENHALIGON'S", 'VIKTOR & ROLF', 'TOMMY HILFIGER', 'RALPH LAUREN', 'JIMMY CHOO', 'JULIETTE HAS A GUN', 'MCM', 'THE MERCHANT OF VENICE', 'BOND NO.9', 'NACHO VIDAL', 'MISSONI', 'BUTTERFLY THAI PERFUME', 'ORTO PARISI', 'MAD ET LEN', 'ATTAR COLLECTION', 'THEODOROS KALOTINIS'];
        $NhanVienModel = new NhanVienModel();
        $folder_name = "../BTL_PTPM/images/";
        $characters = '01234567890123456789ABCDEFGHIJKLMNOPQRSTUVWXYZABCDEFGHIJKLMNOPQRSTUVWXYZ';
        for ($i=0; $i < count($arrTH); $i++){
            $randomString = str_shuffle($characters);
            $id_thuonghieu = substr($randomString, 0, 11);
            $new_folder = $folder_name .$id_thuonghieu."/";
            if (!file_exists($new_folder)) {
                mkdir($new_folder, 0777, true);
            }
            $NhanVienModel->insert("tb_thuonghieu", ['id_thuonghieu','ten_thuonghieu', 'id_nguoidung'], [$id_thuonghieu, $arrTH[$i], '74R1G6BOT5N']);
        }
        */
        require_once 'views/Admin/ProductManagement/apps-addImage.php';
    }
    function addSanPham(){
        $error = "";
        if(isset($_POST['submit'])){
            $id_nuochoa = $_POST['id_nuochoa'];
            $ten_nuochoa = $_POST['ten_nuochoa'];
            $gioitinh = $_POST['gioitinh'];
            $xuatxu = $_POST['xuatxu'];
            $mota = $_POST['mota'];
            $thongtinchinh = $_POST['thongtinchinh'];
            $tongquan = $_POST['tongquan'];
            $huongthom = $_POST['huongthom'];
            $loai_huongthom = $_POST['loai_huongthom'];
            $thietke = $_POST['thietke'];
            $dadanghoa = $_POST['dadanghoa'];
            $nhomnuochoa = $_POST['nhomnuochoa'];
            $dotuoikhuyendung = $_POST['dotuoikhuyendung'];
            $namramat = $_POST['namramat'];
            $nongdo = $_POST['nongdo'];
            $nhaphache = $_POST['nhaphache'];
            $doluuhuong = $_POST['doluuhuong'];
            $phongcach = $_POST['phongcach'];
            $dotoahuong = $_POST['dotoahuong'];
            $thoidiemphuhop = $_POST['thoidiemphuhop'];
            $id_thuonghieu  = $_POST['id_thuonghieu'];
            $id_nhacungcap  = $_POST['id_nhacungcap'];
            $id_nguoiquanly = explode("_", $_SESSION['LoginOK'])[1];
            //Thêm giá nước hoa
            //10ML
            $dungtich10  = $_POST['ML_10'];
            $gia_nhap10  = $_POST['gia_nhap10'];
            $gia_ban10  = $_POST['gia_ban10'];
            //20ML
            $dungtich20  = $_POST['ML_20'];
            $gia_nhap20  = $_POST['gia_nhap20'];
            $gia_ban20  = $_POST['gia_ban20'];
            //100ML
            $dungtich100  = $_POST['ML_100'];
            $gia_nhap100  = $_POST['gia_nhap100'];
            $gia_ban100  = $_POST['gia_ban100'];
            if(empty($id_nuochoa) && empty($ten_nuochoa) && empty($gioitinh) && empty($xuatxu) && empty($mota) && empty($thongtinchinh) && empty($tongquan) && empty($huongthom) && empty($loai_huongthom) && empty($thietke)
            && empty($dadanghoa) && empty($nhomnuochoa) && empty($dotuoikhuyendung) && empty($namramat) && empty($nongdo) && empty($nhaphache) && empty($doluuhuong) && empty($phongcach) && empty($dotoahuong) && empty($thoidiemphuhop)
            && empty($id_thuonghieu) && empty($id_nhacungcap) && empty($id_nguoiquanly) && empty($dungtich10) && empty($gia_nhap10)
            && empty($gia_ban10) && empty($dungtich20) && empty($gia_nhap20) && empty($gia_ban20) 
            && empty($dungtich100) && empty($gia_nhap100) && empty($gia_ban100)){
                $error = "Hãy nhập đầy đủ thông tin!";
            }else{
                $nhArr = [
                    "id_nuochoa" => $id_nuochoa,
                    "ten_nuochoa" => $ten_nuochoa,
                    "gioitinh" => $gioitinh,
                    "xuatxu" => $xuatxu,
                    "mota" => $mota,
                    "thongtinchinh" => $thongtinchinh,
                    "tongquan" => $tongquan,
                    "huongthom" => $huongthom,
                    "loai_huongthom" => $loai_huongthom,
                    "thietke" => $thietke,
                    "dadanghoa" => $dadanghoa,
                    "nhomnuochoa" => $nhomnuochoa,
                    "dotuoikhuyendung" => $dotuoikhuyendung,
                    "namramat" => $namramat,
                    "nongdo" => $nongdo,
                    "nhaphache" => $nhaphache,
                    "doluuhuong" => $doluuhuong,
                    "phongcach" => $phongcach,
                    "dotoahuong" => $dotoahuong,
                    "thoidiemphuhop" => $thoidiemphuhop,
                    "id_thuonghieu" => $id_thuonghieu,
                    "id_nhacungcap" => $id_nhacungcap,
                    "id_nguoiquanly" => $id_nguoiquanly,
                ];
                $nhmodel = new NhanVienModel();
                if($nhmodel->insert_nuochoa($nhArr)){
                    $gnh10 = [
                        'id_nuochoa' => $id_nuochoa,
                        'dungtich' => $dungtich10,
                        'gia_nhap' => $gia_nhap10,
                        'gia_ban' => $gia_ban10,
                        'soluong' => 0,
                    ];
                    $gnh20 = [
                        'id_nuochoa' => $id_nuochoa,
                        'dungtich' => $dungtich20,
                        'gia_nhap' => $gia_nhap20,
                        'gia_ban' => $gia_ban20,
                        'soluong' => 0,
                    ];
                    $gnh100 = [
                        'id_nuochoa' => $id_nuochoa,
                        'dungtich' => $dungtich100,
                        'gia_nhap' => $gia_nhap100,
                        'gia_ban' => $gia_ban100,
                        'soluong' => 0,
                    ];
                    if($nhmodel->insertGiaNuocHoa($gnh10) && $nhmodel->insertGiaNuocHoa($gnh20) && $nhmodel->insertGiaNuocHoa($gnh100)){
                        if (!empty($_FILES)) {
                            $folder_name = "../BTL_PTPM/images/NuocHoa/";
                            $allowTypes = array('jpg', 'png', 'jpeg', 'pdf');
                            $link = "images/NuocHoa/";
                            if (!file_exists($folder_name)) {
                                mkdir($folder_name, 0777, true);
                            }
                            $check = 0;
                            if (!empty($_FILES)) {
                                $folder_name .= $id_nuochoa . "/";
                                $link .= $id_nuochoa . "/";
                                if (!file_exists($folder_name)) {
                                    mkdir($folder_name, 0777, true);
                                }
                                $files = array_filter($_FILES['file']['name']);
                                $total_count = count($_FILES['file']['name']);
                                for ($i = 0; $i < $total_count; $i++) {
                                    $newFilePath = $folder_name . $id_nuochoa . "_" . $i . "." . explode("/", $_FILES['file']['type'][$i])[1];
                                    $new_link = $link . $id_nuochoa . "_" . $i . "." . explode("/", $_FILES['file']['type'][$i])[1];
                                    $fileType = pathinfo($newFilePath, PATHINFO_EXTENSION);
                                    $image = [
                                        'img_link' => $new_link,
                                        'id_nuochoa' => $id_nuochoa,
                                    ];
                                    if (in_array($fileType, $allowTypes)) {
                                        if ($_FILES['file']['size'][$i] <= 5 * 1024 * 1024)
                                            $tmpFilePath = $_FILES['file']['tmp_name'][$i];
                                        if ($tmpFilePath != "") {
                                            if (move_uploaded_file($tmpFilePath, $newFilePath)) {
                                                $check++;
                                                $nhmodel->insertImage($image);
                                            }
                                        }
                                    }
                                }
                                if ($check == $total_count) {
                                    $_SESSION['success'] = "Thêm sản phẩm thành công!";
                                    header("location: index.php?controller=NhanVien&action=sanpham");
                                }else{
                                    $_SESSION['error'] = "Thêm sản phẩm thành công!";
                                    header("location: index.php?controller=NhanVien&action=sanpham");
                                }
                            }
                        }
                    }else{
                        header("location: index.php?controller=NhanVien&action=sanpham&error=");
                    }
                }else
                    header("location: index.php?controller=NhanVien&action=sanpham&error=");
            }
        }
        $nccModel = new NhaCungCapModel();
        $thModel = new ThuongHieuModel();
        $nhacungcap = $nccModel->getALLNCC();
        $thuonghieu = $thModel->getALLTH();
        require_once 'views/Admin/ProductManagement/apps-ecommerce-addProducts.php';
        
    }
    //Cập nhật thông tin sản phẩm
    function updateSanPham(){
        if(isset($_GET['id_nuochoa'])){
            $nhModel = new NuocHoaModel();
            $id_nuochoa = $_GET['id_nuochoa'];
            $nuochoa = $nhModel->get("tb_nuochoa", ['id_nuochoa'], [$id_nuochoa], ['and']);
            if(count($nuochoa) > 0){
                require_once 'views/Admin/ProductManagement/apps-ecommerce-updateProducts.php';
            }else{
                header("location: index.php");
            }
        }else{
            header("location: index.php");
        }
    }
    function updateThongTinSanPham(){
        if(isset($_GET['id_nuochoa']) && !isset($_POST['submit'])){
            $error = "";
            $nccModel = new NhaCungCapModel();
            $thModel = new ThuongHieuModel();
            $nhModel = new NuocHoaModel();
            $id_nuochoa = $_GET['id_nuochoa'];
            $nuochoa = $nhModel->get("tb_nuochoa", ['id_nuochoa'], [$id_nuochoa], ['and']);
            if(count($nuochoa) > 0){
                $nuochoa = $nuochoa[0];
                $gianuochoa = $nhModel->get("tb_gianuochoa", ['id_nuochoa'], [$id_nuochoa], ['and']);
                $nhacungcap = $nccModel->getALLNCC();
                $thuonghieu = $thModel->getALLTH();
                require_once 'views/Admin/ProductManagement/apps-ecommerce-updateInformationProducts.php';
            }else{
                header("location: index.php");
            }
        }else if(isset($_POST['submit'])){
            $nhModel = new NuocHoaModel();
            $id_nuochoa = $_POST['id_nuochoa'];
            $ten_nuochoa = $_POST['ten_nuochoa'];
            $gioitinh = $_POST['gioitinh'];
            $xuatxu = $_POST['xuatxu'];
            $mota = $_POST['mota'];
            $thongtinchinh = $_POST['thongtinchinh'];
            $tongquan = $_POST['tongquan'];
            $huongthom = $_POST['huongthom'];
            $loai_huongthom = $_POST['loai_huongthom'];
            $thietke = $_POST['thietke'];
            $dadanghoa = $_POST['dadanghoa'];
            $nhomnuochoa = $_POST['nhomnuochoa'];
            $dotuoikhuyendung = $_POST['dotuoikhuyendung'];
            $namramat = $_POST['namramat'];
            $nongdo = $_POST['nongdo'];
            $nhaphache = $_POST['nhaphache'];
            $doluuhuong = $_POST['doluuhuong'];
            $phongcach = $_POST['phongcach'];
            $dotoahuong = $_POST['dotoahuong'];
            $thoidiemphuhop = $_POST['thoidiemphuhop'];
            $id_thuonghieu  = $_POST['id_thuonghieu'];
            $id_nhacungcap  = $_POST['id_nhacungcap'];
            //Thêm giá nước hoa
            //10ML
            $dungtich10  = $_POST['ML_10'];
            $gia_nhap10  = $_POST['gia_nhap10'];
            $gia_ban10  = $_POST['gia_ban10'];
            //20ML
            $dungtich20  = $_POST['ML_20'];
            $gia_nhap20  = $_POST['gia_nhap20'];
            $gia_ban20  = $_POST['gia_ban20'];
            //100ML
            $dungtich100  = $_POST['ML_100'];
            $gia_nhap100  = $_POST['gia_nhap100'];
            $gia_ban100  = $_POST['gia_ban100'];
            if(empty($id_nuochoa) && empty($ten_nuochoa) && empty($gioitinh) && empty($xuatxu) && empty($mota) && empty($thongtinchinh) && empty($tongquan) && empty($huongthom) && empty($loai_huongthom) && empty($thietke)
            && empty($dadanghoa) && empty($nhomnuochoa) && empty($dotuoikhuyendung) && empty($namramat) && empty($nongdo) && empty($nhaphache) && empty($doluuhuong) && empty($phongcach) && empty($dotoahuong) && empty($thoidiemphuhop)
            && empty($id_thuonghieu) && empty($id_nhacungcap) && empty($id_nguoiquanly) && empty($dungtich10) && empty($gia_nhap10)
            && empty($gia_ban10) && empty($dungtich20) && empty($gia_nhap20) && empty($gia_ban20) 
            && empty($dungtich100) && empty($gia_nhap100) && empty($gia_ban100)){
                $error = "Hãy nhập đầy đủ thông tin!";
            }else{
                if($nhModel->update("tb_nuochoa", [
                    'ten_nuochoa',
                    'gioitinh',
                    'xuatxu',
                    'mota',
                    'thongtinchinh',
                    'tongquan',
                    'huongthom',
                    'loai_huongthom',
                    'thietke',
                    'dadanghoa',
                    'nhomnuochoa',
                    'dotuoikhuyendung',
                    'namramat',
                    'nongdo',
                    'nhaphache',
                    'doluuhuong',
                    'phongcach',
                    'dotoahuong',
                    'thoidiemphuhop',
                    'id_thuonghieu',
                    'id_nhacungcap',
                ],[
                    $ten_nuochoa,
                    $gioitinh,
                    $xuatxu,
                    $mota,
                    $thongtinchinh,
                    $tongquan,
                    $huongthom,
                    $loai_huongthom,
                    $thietke,
                    $dadanghoa,
                    $nhomnuochoa,
                    $dotuoikhuyendung,
                    $namramat,
                    $nongdo,
                    $nhaphache,
                    $doluuhuong,
                    $phongcach,
                    $dotoahuong,
                    $thoidiemphuhop,
                    $id_thuonghieu,
                    $id_nhacungcap,
                ],["id_nuochoa"], [$id_nuochoa], ["and"]) && $nhModel->update("tb_gianuochoa", ['gia_nhap', 'gia_ban'], [$gia_nhap10, $gia_ban10], ["id_nuochoa", "dungtich"], [$id_nuochoa, $dungtich10], ["and", "and"]) &&
                $nhModel->update("tb_gianuochoa", ['gia_nhap', 'gia_ban'], [$gia_nhap20, $gia_ban20], ["id_nuochoa", "dungtich"], [$id_nuochoa, $dungtich20], ["and", "and"]) && 
                $nhModel->update("tb_gianuochoa", ['gia_nhap', 'gia_ban'], [$gia_nhap100, $gia_ban100], ["id_nuochoa", "dungtich"], [$id_nuochoa, $dungtich100], ["and", "and"])
                ){
                    $_SESSION['success'] = "Cập nhật thông tin sản phẩm thành công!";
                    header("location: index.php?controller=nhanvien&action=updateSanPham&id_nuochoa=".$id_nuochoa);
                }else{
                    $_SESSION['error'] = "Cập nhật thông tin sản phẩm thất bại!";
                }
            }
        }else{
            header("location: index.php");
        }
    }
    function updateImages(){
        if(isset($_GET['id_nuochoa']) && !isset($_POST['submit'])){
            $nhModel = new NuocHoaModel();
            $id_nuochoa = $_GET['id_nuochoa'];
            $nuochoa = $nhModel->get("tb_nuochoa", ['id_nuochoa'], [$id_nuochoa], ['and']);
            if(count($nuochoa) > 0){
                $anhnuochoa = $nhModel->get("tb_anhnuochoa", ['id_nuochoa'], [$id_nuochoa], ['and'], "order by anhdaidien DESC, id_anh ASC");
                require_once 'views/Admin/ProductManagement/apps-ecommerce-updateImagesProducts.php';
            }else{
                header("location: index.php");
            }
        }else if(isset($_POST['submit']) && isset($_GET['id_nuochoa'])){
            $nhModel = new NuocHoaModel();
            $id_nuochoa = $_GET['id_nuochoa'];
            $nuochoa = $nhModel->get("tb_nuochoa", ['id_nuochoa'], [$id_nuochoa], ['and']);
            $anhnuochoa = $nhModel->get("tb_anhnuochoa", ['id_nuochoa'], [$id_nuochoa], ['and'], " Order by id_anh ASC");
            if(count($anhnuochoa) > 0)
                $anhLonNhat = intval(explode(".", explode("_",explode("/", $anhnuochoa[count($anhnuochoa)-1]['img_link'])[3])[1])[0])+1;
            else    $anhLonNhat = 0;
            if (!empty($_FILES)) {
                $folder_name = "../BTL_PTPM/images/NuocHoa/";
                $allowTypes = array('jpg', 'png', 'jpeg', 'pdf');
                $link = "images/NuocHoa/";
                if (!file_exists($folder_name)) {
                    mkdir($folder_name, 0777, true);
                }
                $check = 0;
                $folder_name .= $id_nuochoa . "/";
                $link .= $id_nuochoa . "/";
                if (!file_exists($folder_name)) {
                    mkdir($folder_name, 0777, true);
                }
                $files = array_filter($_FILES['file']['name']);
                $total_count = count($_FILES['file']['name']);
                for ($i = 0; $i < $total_count; $i++) {
                    $newFilePath = $folder_name . $id_nuochoa . "_" . $i+$anhLonNhat . "." . explode("/", $_FILES['file']['type'][$i])[1];
                    $new_link = $link . $id_nuochoa . "_" . $i+$anhLonNhat . "." . explode("/", $_FILES['file']['type'][$i])[1];
                    $fileType = pathinfo($newFilePath, PATHINFO_EXTENSION);
                    $image = [
                        'img_link' => $new_link,
                        'id_nuochoa' => $id_nuochoa,
                    ];
                    //die(print_r($_FILES));
                    if (in_array($fileType, $allowTypes)) {
                        //die(print_r($_FILES));
                        if ($_FILES['file']['size'][$i] <= 5 * 1024 * 1024)
                            $tmpFilePath = $_FILES['file']['tmp_name'][$i];
                        if ($tmpFilePath != "") {
                            if (move_uploaded_file($tmpFilePath, $newFilePath)) {
                                if($nhModel->insert("tb_anhnuochoa", ['img_link', 'id_nuochoa'], [$new_link, $id_nuochoa])){
                                    $check++;
                                }
                            }
                        }
                    }
                }
                if ($check == $total_count) {
                    $_SESSION['success'] = "Thêm ảnh của sản phẩm thành công!";
                    header("location: index.php?controller=NhanVien&action=updateImages&id_nuochoa={$id_nuochoa}");
                }else{
                    $_SESSION['error'] = "Chỉ thêm được 1 số ảnh không thêm hết được!";
                    header("location: index.php?controller=NhanVien&action=updateImages&id_nuochoa={$id_nuochoa}");
                }
            }else{
                header("location: index.php");
            }
        }
        else{
            header("location: index.php");
        }
    }

    function setAnhDaiDien(){
        if(isset($_POST['submit-set'])){
            $nhModel = new NuocHoaModel();
            $tmp = $_POST['submit-set'];
            $id_anh = explode("_", $tmp)[0];
            $id_nuochoa = explode("_", $tmp)[1];
            if(count($nhModel->get("tb_anhnuochoa", ["id_anh"], [$id_anh], ["and"])) > 0){
                if($nhModel->update("tb_anhnuochoa", ['anhdaidien'],[0], ["id_nuochoa"], [$id_nuochoa], ['and'])){
                    if($nhModel->update("tb_anhnuochoa", ['anhdaidien'],[1], ["id_anh"], [$id_anh], ['and'])){
                        $_SESSION['success'] = "Đặt ảnh đại diện của sản phẩm thành công!";
                        header("location: index.php?controller=NhanVien&action=updateImages&id_nuochoa={$id_nuochoa}");
                    }else{
                        $_SESSION['error'] = "Đặt ảnh đại diện của sản phẩm thất bại!";
                        header("location: index.php?controller=NhanVien&action=updateImages&id_nuochoa={$id_nuochoa}");
                    }
                }else{
                    $_SESSION['error'] = "Đặt ảnh đại diện của sản phẩm thất bại!";
                    header("location: index.php?controller=NhanVien&action=updateImages&id_nuochoa={$id_nuochoa}");
                }
            }else{
                header("location: index.php");
            }
        }else{
            header("location: index.php");
        }
    }
    
    //Xóa ảnh
    function xoaAnh(){
        if(isset($_POST['submit'])){
            $nhModel = new NuocHoaModel();
            $tmp = $_POST['submit'];
            $id_anh = explode("_", $_POST['submit'])[0];
            $id_nuochoa = explode("_", $_POST['submit'])[1];
            $anh = $nhModel->get("tb_anhnuochoa", ["id_anh"], [$id_anh], ["and"]);
            $file_path = $anh[0]['img_link'];
            if (file_exists($file_path)) {
                //die($file_path);
                if($nhModel->delete("tb_anhnuochoa", ["id_anh"], [$id_anh], ["and"])){
                    $_SESSION['success'] = "Xóa ảnh của sản phẩm thành công!";
                    unlink($file_path);
                    header("location: index.php?controller=NhanVien&action=updateImages&id_nuochoa={$id_nuochoa}");
                }else{
                    $_SESSION['success'] = "Xóa ảnh của sản phẩm thất bại!";
                    header("location: index.php?controller=NhanVien&action=updateImages&id_nuochoa={$id_nuochoa}");
                }
            }else{
                $_SESSION['error'] = "Không tìm thấy ảnh cần xóa!";
                header("location: index.php?controller=NhanVien&action=updateImages&id_nuochoa={$id_nuochoa}");
            }
        }else{
            header("location: index.php");
        }
    }
    //Sửa số lượng sản phẩm
    function updateSoLuong(){
        if(isset($_GET['id_nuochoa']) && !isset($_POST['submit'])){
            $nhModel = new NuocHoaModel();
            $id_nuochoa = $_GET['id_nuochoa'];
            $nuochoa = $nhModel->get("tb_nuochoa", ['id_nuochoa'], [$id_nuochoa], ['and']);
            if(count($nuochoa) > 0){
                require_once 'views/Admin/ProductManagement/apps-ecommerce-updateNumberProducts.php';
            }else{
                header("location: index.php");
            }
        }else if(isset($_GET['id_nuochoa']) && isset($_POST['submit'])){
            $dungtich = $_POST['dungtich'];
            $soluong = $_POST['soluong'];
            $nhModel = new NuocHoaModel();
            $id_nuochoa = $_GET['id_nuochoa'];
            if($nhModel->update("tb_gianuochoa", ['soluong'], [$soluong], ['id_nuochoa', 'dungtich'], [$id_nuochoa, $dungtich], ["and", "and"])){
                $_SESSION['success'] = "Cập nhật tình trạng số lượng sản phẩm thành công!";
                header("location: index.php?controller=NhanVien&action=updateSoLuong&id_nuochoa={$id_nuochoa}");
            }else{
                $_SESSION['error'] = "Cập nhật tình trạng số lượng sản phẩm thất bại!";
                header("location: index.php?controller=NhanVien&action=updateSoLuong&id_nuochoa={$id_nuochoa}");
            }
        }else{
            header("location: index.php");
        }
    }
    function getSoLuong(){
        if(isset($_POST['dungtich']) && isset($_POST['id_nuochoa'])){
            $nhModel = new NuocHoaModel();
            $dungtich = $_POST['dungtich'];
            $id_nuochoa = $_POST['id_nuochoa'];
            $data = $nhModel->get("tb_gianuochoa", ['id_nuochoa','dungtich'], [$id_nuochoa, $dungtich], ["and", "and"]);
            echo json_encode($data[0]);
        }
    }
    function lockSanPham(){
        if(isset($_GET['id_nuochoa'])){
            $nhModel = new NuocHoaModel();
            $id_nuochoa = $_GET['id_nuochoa'];
            if($nhModel->update("tb_nuochoa", ['status'], [1], ['id_nuochoa'], [$id_nuochoa], ['and'])){
                $_SESSION['success'] = "Khóa sản phẩm thành công!";
                header("location: index.php?controller=NhanVien&action=sanpham");
            }else{
                $_SESSION['error'] = "Khóa sản phẩm thất bại!";
                header("location: index.php?controller=NhanVien&action=sanpham");
            }
        }
    }
    function unlockSanPham(){
        if(isset($_GET['id_nuochoa'])){
            $nhModel = new NuocHoaModel();
            $id_nuochoa = $_GET['id_nuochoa'];
            if($nhModel->update("tb_nuochoa", ['status'], [0], ['id_nuochoa'], [$id_nuochoa], ['and'])){
                $_SESSION['success'] = "Mở khóa sản phẩm thành công!";
                header("location: index.php?controller=NhanVien&action=sanpham");
            }else{
                $_SESSION['error'] = "Mở khóa sản phẩm thất bại!";
                header("location: index.php?controller=NhanVien&action=sanpham");
            }
        }
    }
    //End Quản lý sản phẩm

    
}
}else{
    header("location: index.php");
}
?>