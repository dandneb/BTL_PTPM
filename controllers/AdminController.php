<?php
session_start();
require_once 'models/AdminModel.php';
require_once 'models/NuocHoaModel.php';
require_once 'models/NhaCungCapModel.php';
require_once 'models/ThuongHieuModel.php';
class AdminController{
    function index(){
        require_once 'views/Admin/index.php';
    }
    function analytics(){
        require_once 'views/Admin/dashboard-analytics.php';
    }
    function sanpham(){
        require_once 'views/Admin/apps-ecommerce-products.php';
    }
    function getSanPham(){
        $AdminModel = new AdminModel();
        echo $AdminModel->getALLProducts();
    }
    function addImage(){
        $error = "";
        
        require_once 'views/Admin/apps-addImage.php';
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
            $huongdansudung = $_POST['huongdansudung'];
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
            $so_luong10  = $_POST['so_luong10'];
            //20ML
            $dungtich20  = $_POST['ML_20'];
            $gia_nhap20  = $_POST['gia_nhap20'];
            $gia_ban20  = $_POST['gia_ban20'];
            $so_luong20  = $_POST['so_luong20'];
            //100ML
            $dungtich100  = $_POST['ML_100'];
            $gia_nhap100  = $_POST['gia_nhap100'];
            $gia_ban100  = $_POST['gia_ban100'];
            $so_luong100  = $_POST['so_luong100'];
            if(empty($id_nuochoa) && empty($ten_nuochoa) && empty($gioitinh) && empty($xuatxu) && empty($mota) && empty($thongtinchinh) && empty($tongquan) && empty($huongthom) && empty($loai_huongthom) && empty($thietke)
            && empty($dadanghoa) && empty($huongdansudung) && empty($nhomnuochoa) && empty($dotuoikhuyendung) && empty($namramat) && empty($nongdo) && empty($nhaphache) && empty($doluuhuong) && empty($phongcach) && empty($dotoahuong) && empty($thoidiemphuhop)
            && empty($id_thuonghieu) && empty($id_nhacungcap) && empty($id_nguoiquanly) && empty($dungtich10) && empty($gia_nhap10)
            && empty($gia_ban10) && empty($so_luong10) && empty($dungtich20) && empty($gia_nhap20) && empty($gia_ban20) 
            && empty($so_luong20) && empty($dungtich100) && empty($gia_nhap100) && empty($gia_ban100) && empty($so_luong100)){
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
                    "huongdansudung" => $huongdansudung,
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
                ];
                $nhmodel = new NuocHoaModel();
                if($nhmodel->insert($nhArr)){
                    $gnh10 = [
                        'id_nuochoa' => $id_nuochoa,
                        'dungtich' => $dungtich10,
                        'gia_nhap' => $gia_nhap10,
                        'gia_ban' => $gia_ban10,
                        'soluong' => $so_luong10,
                    ];
                    $gnh20 = [
                        'id_nuochoa' => $id_nuochoa,
                        'dungtich' => $dungtich20,
                        'gia_nhap' => $gia_nhap20,
                        'gia_ban' => $gia_ban20,
                        'soluong' => $so_luong20,
                    ];
                    $gnh100 = [
                        'id_nuochoa' => $id_nuochoa,
                        'dungtich' => $dungtich100,
                        'gia_nhap' => $gia_nhap100,
                        'gia_ban' => $gia_ban100,
                        'soluong' => $so_luong100,
                    ];
                    if($nhmodel->insertGiaNuocHoa($gnh10) && $nhmodel->insertGiaNuocHoa($gnh20) && $nhmodel->insertGiaNuocHoa($gnh100)){
                        if (!empty($_FILES)) {
                            $folder_name = "../BTL_PTPM/images/" . $id_thuonghieu . "/";
                            $allowTypes = array('jpg', 'png', 'jpeg', 'pdf');
                            $link = "images/" . $id_thuonghieu . "/";
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
                                    header("location: index.php?controller=admin&action=sanpham&success=");
                                }else{
                                    header("location: index.php?controller=admin&action=sanpham&success=&error=");
                                }
                            }
                        }
                    }else{
                        header("location: index.php?controller=admin&action=sanpham&error=");
                    }
                }else
                    header("location: index.php?controller=admin&action=sanpham&error=");
            }
        }
        $nccModel = new NhaCungCapModel();
        $thModel = new ThuongHieuModel();
        $nhacungcap = $nccModel->getALLNCC();
        $thuonghieu = $thModel->getALLTH();
        require_once 'views/Admin/apps-ecommerce-addProducts.php';
        
    }
}
?>