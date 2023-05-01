<?php
if(!isset($_SESSION)) {
    session_start();
}
require 'vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
if (isset($_SESSION['LoginOK']) && $_SESSION['LoginOK'][0] == "1" || $_SESSION['LoginOK'][0] == "2") {
    $ql = explode("_", $_SESSION['LoginOK']);
    require_once 'models/CauHoiModel.php';
class CauHoiController{

    function index(){
        $cHModel = new CauHoiModel();
        require_once 'views/Admin/CauHoiManagement/index.php';
    }
    function getCauHoiDangXuLy(){
        $cHModel = new CauHoiModel();
        echo $cHModel->getCauHoiDangXuLy();
    }
    function deleteCauHoi(){
        if(isset($_GET['id_cauhoi'])){
            $cHModel = new CauHoiModel();
            $id_cauhoi = $_GET['id_cauhoi'];
            if(count($cHModel->get("tb_cauhoi", ['id_cauhoi'], [$id_cauhoi], ['and'])) > 0){
                if($cHModel->delete("tb_cauhoi", ['id_cauhoi'], [$id_cauhoi], ['and'])){
                    $_SESSION['success'] = "Xóa câu hỏi thành công!";
                    header("location: index.php?controller=CauHoi");
                }else{
                    $_SESSION['error'] = "Xóa câu hỏi không thành công!";
                    header("location: index.php?controller=CauHoi");
                }
            }else{
                header("location: index.php?controller=CauHoi");
            }
        }else{
            header("location: index.php?controller=NhanVien");
        }
    }
    function HoanTat(){
        $cHModel = new CauHoiModel();
        echo $cHModel->getCauHoiHoanTat();
    }
    function DaTraLoi(){
        require_once 'views/Admin/CauHoiManagement/daTraLoi.php';
    }
    function getCauHoi(){
        if(isset($_POST['id_cauhoi'])){
            $cHModel = new CauHoiModel();
            $id_cauhoi = $_POST['id_cauhoi'];
            echo $cHModel->getCauHoi($id_cauhoi);
        }
    }
    function reply(){
        $error = "";
        if(isset($_GET['id_cauhoi']) && !isset($_POST['submit'])){
            $id_cauhoi = $_GET['id_cauhoi'];
            $cHModel = new CauHoiModel();
            $cauhoi = $cHModel->get("tb_cauhoi", ['id_cauhoi'], [$id_cauhoi], ['and']);
            if(count($cauhoi) > 0){
                $cauhoi = $cauhoi[0];
                if($cauhoi['trangthai'] == 0){
                    $datetime = $cauhoi['thoigianhoi'];
                    $date = new DateTime($datetime);
                    $date_only = $date->format('d-m-Y');
                    $time_only = $date->format('H:i:s');
                    require_once 'views/Admin/CauHoiManagement/replyEmail.php';
                }else{
                    header("location:index.php?controller=CauHoi");
                }
            }else{
                header("location:index.php?controller=NhanVien");
            }
        }else if(isset($_GET['id_cauhoi']) && isset($_POST['submit'])){
            $id_cauhoi = $_GET['id_cauhoi'];
            $cHModel = new CauHoiModel();
            $cauhoi = $cHModel->get("tb_cauhoi", ['id_cauhoi'], [$id_cauhoi], ['and']);
            if(count($cauhoi) > 0){
                $cauhoi = $cauhoi[0];
                if($cauhoi['trangthai'] == 0){
                    $email = $cauhoi['email'];
                    $subject = $_POST['subject'];
                    $message = $_POST['traloi'];
                    date_default_timezone_set('Asia/Bangkok');
                    $now = new DateTime();
                    $datetime = $now->format('Y-m-d H:i:s');
                    $id_nguoidung = explode("_", $_SESSION['LoginOK'])[1];
                    if($cHModel->update("tb_cauhoi", ['traloi', 'thoigiantraloi', 'trangthai', 'id_nguoidung'],
                    [$message, $datetime, 1, $id_nguoidung],
                    ['id_cauhoi'],
                    [$id_cauhoi],
                    ['and'])){
                        require_once("send_email.php");
                        sendemailforAccount($email, $subject, $message);
                        $_SESSION['success'] = "Trả lời câu hỏi thành công!";
                        header("location: index.php?controller=CauHoi");
                    }else{
                        $_SESSION['error'] = "Trả lời câu hỏi không thành công!";
                        header("location: index.php?controller=CauHoi");
                    }
                }else{
                    header("location:index.php?controller=CauHoi");
                }
            }else{
                header("location:index.php?controller=NhanVien");
            }
        }else{
            header("location:index.php?controller=NhanVien");
        }
        
    }
    function deleteQuestion(){
        if(isset($_POST['cauhoi'])){
            $counts = 0;
            $arr_lost = [];
            $cauhoi = $_POST['cauhoi'];
            $array = json_decode($cauhoi, true);
            $cHModel = new CauHoiModel();
            for($i = 0; $i < count($array); $i++){
                if($cHModel->delete("tb_cauhoi", ['id_cauhoi'], [$array[$i]['id_cauhoi']], ['and'])){
                    $counts++;
                }else{
                    $arr_lost($arr_lost, $array[$i]['id_cauhoi']);
                }
            }
            if(count($arr_lost)<=0){
                $goal = "";
                for($i = 0; $i < count($array); $i++){
                    $folder_name = "../BTL_PTPM/questions/".date('m-Y', strtotime($array[$i]['thoigianhoi']));
                    if (!file_exists($folder_name)) {
                        mkdir($folder_name, 0777, true);
                    }
                    $goal = $folder_name."/".date('m-Y', strtotime($array[$i]['thoigianhoi'])).".xlsx";
                    if(!file_exists($goal)){
                        $template = "../BTL_PTPM/views/Admin/CauHoiManagement/Storage/Example.xlsx";
                        copy($template, $goal);
                    }
                    $spreadsheet = IOFactory::load($goal);
                    $worksheet = $spreadsheet->getActiveSheet();
                    $lastRow = $worksheet->getHighestDataRow();
                    $newRow = $lastRow + 1;
                    $worksheet->setCellValue("A$newRow", $array[$i]['id_cauhoi']);
                    $worksheet->setCellValue("B$newRow", $array[$i]['thoigianhoi']);
                    $worksheet->setCellValue("C$newRow", $array[$i]['hoten']);
                    $worksheet->setCellValue("D$newRow", $array[$i]['email']);
                    $worksheet->setCellValue("E$newRow", $array[$i]['noidung']);
                    $worksheet->setCellValue("F$newRow", $array[$i]['trangthai']);
                    $worksheet->setCellValue("G$newRow", $array[$i]['ip_address']);
                    $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
                    $writer->save($goal);
                }
                echo $counts;
            }
            else{
                echo $counts."~".json_encode($arr_lost);
            }
        }
    }
    function storage(){
        
        require_once("views/Admin/CauHoiManagement/luuTru.php");
    }
}
}else{
    header("location:index.php");
}
?>