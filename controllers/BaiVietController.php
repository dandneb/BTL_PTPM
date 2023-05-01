<?php
if(!isset($_SESSION)) {
    session_start();
}
if (isset($_SESSION['LoginOK']) && $_SESSION['LoginOK'][0] == "1" || $_SESSION['LoginOK'][0] == "2") {
    $ql = explode("_", $_SESSION['LoginOK']);
    require_once 'models/BaiVietModel.php';
class BaiVietController{
    private $id_nguoiquanly;
    function __construct(){
        $this->id_nguoiquanly = explode("_", $_SESSION['LoginOK'])[1];
    }
    function index(){
        $bvModel = new BaiVietModel();
        require_once 'views/Admin/BaiVietManagement/index.php';
    }
    function getBaiViet(){
        $bvModel = new BaiVietModel();
        echo $bvModel->getALLBaiViet();
    }
    function addBaiViet(){
        $error = "";
        if(isset($_POST['submit'])){
            $phanloai = trim($_POST['phanloai']);
            $tieude = $_POST['tieude'];
            $mota = $_POST['mota'];
            if(strlen($phanloai) < 1 || strlen($tieude) < 1 || strlen($mota) < 1){
                $error = "Chưa đầy đủ thông tin!";
            }else{
                $bvModel = new BaiVietModel();
                $ql = explode("_", $_SESSION['LoginOK']);
                if($bvModel->insert("tb_kienthuc_blog", ['phanloai', 'tieude', 'mota', 'id_nguoidung'], [$phanloai, $tieude, $mota, $ql[1]])){
                    $_SESSION['success'] = "Thêm bài viết thành công!";
                    header("location: index.php?controller=BaiViet");
                }else{
                    $_SESSION['error'] = "Thêm bài viết thất bại!";
                    header("location: index.php?controller=BaiViet");
                }
            }
        }
        require_once 'views/Admin/BaiVietManagement/apps-ecommerce-addBaiViet.php';
    }

    function deleteBaiViet(){
        if(isset($_GET['id_baiviet_blog'])){
            $id_baiviet = $_GET['id_baiviet_blog'];
            $bvModel = new BaiVietModel();
            if($bvModel->delete("tb_doanvan", ['id'], [$id_baiviet], ['and'])){
                if($bvModel->delete("tb_kienthuc_blog", ['id_baiviet_blog'], [$id_baiviet])){
                    $_SESSION['success'] = "Xóa bài viết thành công!";
                    header("location: index.php?controller=BaiViet");
                }else{
                    $_SESSION['error'] = "Xóa bài viết thất bại!";
                    header("location: index.php?controller=BaiViet");
                }
            }else{
                $_SESSION['error'] = "Xóa bài viết thất bại!";
                header("location: index.php?controller=BaiViet");
            }
        }
    }

    function updateBaiViet(){
        if(!empty($_GET['id_baiviet_blog'])){
            $id_baiviet_blog = $_GET['id_baiviet_blog'];
            $bvModel = new BaiVietModel();
            if(count($bvModel->get("tb_kienthuc_blog", ['id_baiviet_blog'], [$id_baiviet_blog], ['and'])) > 0){
                require_once 'views/Admin/BaiVietManagement/apps-ecommerce-updateBaiViet.php';
            }else{
                header("location: index.php?controller=BaiViet");
            }
            
        }else{
            header("location: index.php?controller=BaiViet");
        }
    }
    function getDoanVan(){
        if(isset($_GET['id_baiviet'])){
            $bvModel = new BaiVietModel();
            echo $bvModel->getALLDoanVan($_GET['id_baiviet']);
        }
    }
    function insertDoanVan(){
        if(isset($_POST['submit-insert'])){
            $success="Thêm đoạn văn thành công!";
            $error="Thêm đoạn văn thất bại!";
            $id_baiviet = $_POST['id-baiviet-insert'];
            $id_doanvan = $_POST['id-doanvan-insert'];
            $sothutu = $_POST['sothutu-insert'];
            $tieude = $_POST['tieude-insert'];
            $noidung = $_POST['noidung-insert'];
            if($_FILES['file-insert']['name'] != ""){
                $folder_name = "../BTL_PTPM/images/BaiViet/" . $id_baiviet . "/";
                if (!file_exists($folder_name)) {
                    mkdir($folder_name, 0777, true);
                }
                $folder_name = "../BTL_PTPM/images/BaiViet/" . $id_baiviet . "/".$id_doanvan."/";
                if (!file_exists($folder_name)) {
                    mkdir($folder_name, 0777, true);
                }
                $allowTypes = array('jpg', 'png', 'jpeg', 'pdf');
                $link = "images/BaiViet/" . $id_baiviet . "/".$id_doanvan."/";
                $newFilePath = $folder_name . $id_doanvan . "." . explode("/", $_FILES['file-insert']['type'])[1];
                $new_link = $link . $id_doanvan . "." . explode("/", $_FILES['file-insert']['type'])[1];
                $fileType = pathinfo($newFilePath, PATHINFO_EXTENSION);
                if (in_array($fileType, $allowTypes)) {
                    if ($_FILES['file-insert']['size'] <= 5 * 1024 * 1024)
                        $tmpFilePath = $_FILES['file-insert']['tmp_name'];
                    if ($tmpFilePath != "") {
                        if (move_uploaded_file($tmpFilePath, $newFilePath)) {
                            $bvModel = new BaiVietModel();
                            if($bvModel->insert("tb_doanvan", ['id', 'id_doanvan', 'sothutu', 'tieude', 'noidung', 'img_link'], [
                                $id_baiviet,
                                $id_doanvan,
                                $sothutu,
                                $tieude,
                                $noidung,
                                $new_link,
                            ])){
                                $_SESSION['success'] = "Thêm đoạn văn thành công!";
                                header("location: index.php?controller=BaiViet&action=updateBaiViet&id_baiviet_blog=$id_baiviet");
                            }else{
                                $_SESSION['error'] = "Thêm đoạn văn thất bại!";
                                header("location: index.php?controller=BaiViet&action=updateBaiViet&id_baiviet_blog=$id_baiviet");
                            }
                        }
                    }
                }else{
                    $_SESSION['error'] = "Ảnh của đoạn văn không hợp lệ!";
                    header("location: index.php?controller=BaiViet&action=updateBaiViet&id_baiviet_blog=$id_baiviet");
                }
            }else{
                $bvModel = new BaiVietModel();
                if($bvModel->insert("tb_doanvan", ['id', 'id_doanvan', 'sothutu', 'tieude', 'noidung'], [
                    $id_baiviet,
                    $id_doanvan,
                    $sothutu,
                    $tieude,
                    $noidung,
                ])){
                    $_SESSION['success'] = "Thêm đoạn văn thành công!";
                    header("location: index.php?controller=BaiViet&action=updateBaiViet&id_baiviet_blog=$id_baiviet");
                }else{
                    $_SESSION['error'] = "Thêm đoạn văn thất bại!";
                    header("location: index.php?controller=BaiViet&action=updateBaiViet&id_baiviet_blog=$id_baiviet");
                }
            }
        }else{
            header("location: index.php?controller=BaiViet");
        }
    }

    function deleteDoanVan(){
        if(isset($_GET["id_doanvan"]) && isset($_GET["id_baiviet_blog"])){
            $success="Xóa đoạn văn thành công!";
            $error="Xóa đoạn văn thất bại!";
            $bvModel = new BaiVietModel();
            $id = $_GET["id_baiviet_blog"];
            $id_doanvan = $_GET["id_doanvan"];
            $doanvans = $bvModel->get("tb_doanvan", ['id'], [$id], ["and"], "order by sothutu asc");
            $dv = $bvModel->get("tb_doanvan", ['id_doanvan'], [$id_doanvan], ["and"]);
            $sothutu = $dv[0]['sothutu'];
            $sothutu_arr = array_map(function($item) {
                return $item['sothutu'];
            }, $doanvans);
            $link = $dv[0]['img_link'];
            $dir = dirname($link);
            if(max($sothutu_arr) == $sothutu){
                if($bvModel->delete("tb_doanvan", ['id_doanvan'], [$id_doanvan], ['and'])){
                    if (file_exists($link)) {
                        unlink($link);
                        rmdir($dir);
                        $_SESSION['success'] = "Xóa đoạn văn thành công!";
                        header("location: index.php?controller=BaiViet&action=updateBaiViet&id_baiviet_blog=$id");
                    }else{
                        $_SESSION['error'] = "Xóa đoạn văn thất bại!";
                        header("location: index.php?controller=BaiViet&action=updateBaiViet&id_baiviet_blog=$id");
                    }
                }else{
                    $_SESSION['error'] = "Xóa đoạn văn thất bại!";
                    header("location: index.php?controller=BaiViet&action=updateBaiViet&id_baiviet_blog=$id");
                }
            }else if(min($sothutu_arr) == $sothutu){
                if($bvModel->delete("tb_doanvan", ['id_doanvan'], [$id_doanvan], ['and'])){
                    if (file_exists($dv[0]['img_link'])) {
                        unlink($dv[0]['img_link']);
                        rmdir($dir);
                        if($bvModel->updateSTT($id)){
                            $_SESSION['success'] = "Xóa đoạn văn thành công!";
                            header("location: index.php?controller=BaiViet&action=updateBaiViet&id_baiviet_blog=$id");
                        }else{
                            $_SESSION['error'] = "Xóa đoạn văn thành công nhưng cập nhật vị trí các đoạn văn thất bại!";
                            header("location: index.php?controller=BaiViet&action=updateBaiViet&id_baiviet_blog=$id");
                        }
                    }
                }else{
                    $_SESSION['error'] = "Xóa đoạn văn thất bại!";
                    header("location: index.php?controller=BaiViet&action=updateBaiViet&id_baiviet_blog=$id");
                }
            }else{
                if($bvModel->updateSTT_TT($id, $sothutu)){
                    if (file_exists($link)) {
                        if($bvModel->delete("tb_doanvan", ['id_doanvan'], [$id_doanvan], ['and'])){
                            unlink($link);
                            rmdir($dir);
                            $_SESSION['success'] = "Xóa đoạn văn thành công!";
                            header("location: index.php?controller=BaiViet&action=updateBaiViet&id_baiviet_blog=$id");
                        }else{
                            $_SESSION['error'] = "Xóa đoạn văn thất bại!";
                        }
                    }else{
                        $_SESSION['error'] = "Không tìm thấy đường dẫn ảnh của đoạn văn!";
                        header("location: index.php?controller=BaiViet&action=updateBaiViet&id_baiviet_blog=$id");
                    }
                }else{
                    $_SESSION['error'] = "Xóa đoạn văn thất bại!";
                    header("location: index.php?controller=BaiViet&action=updateBaiViet&id_baiviet_blog=$id");
                }
            }
        }
    }
    function updateDoanVan(){
        if(isset($_POST['submit-update'])){
            $success="Cập nhật đoạn văn thành công!";
            $error="Cập nhật đoạn văn thất bại!";
            $bvModel = new BaiVietModel();
            $id_baiviet = $_POST['id_baiviet_update'];
            $id_doanvan = $_POST['id_doanvan_update'];
            $sothutu = $_POST['sothutu_update'];
            $tieude = $_POST['tieude_update'];
            $noidung = $_POST['noidung_update'];
            $file = "";
            if($_FILES['file_update']['name'] != "")
                $file = $_FILES['file_update'];
            $old = $bvModel->get("tb_doanvan", ['id_doanvan'], [$id_doanvan], ['and'])[0];
            if ($file != "") {
                $folder_name = "../BTL_PTPM/images/BaiViet/" . $id_baiviet . "/";
                if (!file_exists($folder_name)) {
                    mkdir($folder_name, 0777, true);
                }
                $folder_name = "../BTL_PTPM/images/BaiViet/" . $id_baiviet . "/".$id_doanvan."/";
                if (!file_exists($folder_name)) {
                    mkdir($folder_name, 0777, true);
                }
                $allowTypes = array('jpg', 'png', 'jpeg', 'pdf');
                $link = "images/BaiViet/" . $id_baiviet . "/".$id_doanvan."/";
                $newFilePath = $folder_name . $id_doanvan . "." . explode("/", $_FILES['file_update']['type'])[1];
                $new_link = $link . $id_doanvan . "." . explode("/", $_FILES['file_update']['type'])[1];
                $fileType = pathinfo($newFilePath, PATHINFO_EXTENSION);
                if (in_array($fileType, $allowTypes)) {
                    if ($_FILES['file_update']['size'] <= 5 * 1024 * 1024){
                        $tmpFilePath = $_FILES['file_update']['tmp_name'];
                        unlink($old['img_link']);
                        if ($tmpFilePath != "") {
                            if (move_uploaded_file($tmpFilePath, $newFilePath)) {
                                if($old['sothutu'] == $sothutu){
                                    if($bvModel->update("tb_doanvan", ['tieude', 'noidung', 'img_link'], [
                                        $tieude,
                                        $noidung,
                                        $new_link,
                                    ], ['id_doanvan'], [$id_doanvan], ['and'])){
                                        $_SESSION['success'] = "Cập nhật đoạn văn thành công!";
                                        header("location: index.php?controller=BaiViet&action=updateBaiViet&id_baiviet_blog=$id_baiviet");
                                    }else{
                                        $_SESSION['error'] = "Cập nhật đoạn văn thất bại!";
                                        header("location: index.php?controller=BaiViet&action=updateBaiViet&id_baiviet_blog=$id_baiviet");
                                    }
                                }else{
                                    if($bvModel->update("tb_doanvan", ['sothutu'], [$old['sothutu']], ['id', 'sothutu'], [$id_baiviet, $sothutu], ['and', 'and'])){
                                        if($bvModel->update("tb_doanvan", ['sothutu', 'tieude', 'noidung', 'img_link'], [
                                            $sothutu,
                                            $tieude,
                                            $noidung,
                                            $new_link,
                                        ], ['id_doanvan'], [$id_doanvan], ['and'])){
                                            $_SESSION['success'] = "Cập nhật đoạn văn thành công!";
                                            header("location: index.php?controller=BaiViet&action=updateBaiViet&id_baiviet_blog=$id_baiviet");
                                        }
                                    }else{
                                        $_SESSION['error'] = "Cập nhật đoạn văn thất bại!";
                                        header("location: index.php?controller=BaiViet&action=updateBaiViet&id_baiviet_blog=$id_baiviet");
                                    }
                                }
                            }
                        }else{
                            $_SESSION['error'] = "Không tìm thấy đường dẫn của ảnh cập nhật bài viết!";
                            header("location: index.php?controller=BaiViet&action=updateBaiViet&id_baiviet_blog=$id_baiviet");
                        }
                    }else{
                        $_SESSION['error'] = "Ảnh vượt qua dung lượng cho phép (5MB)!";
                        header("location: index.php?controller=BaiViet&action=updateBaiViet&id_baiviet_blog=$id_baiviet");
                    }
                }else{
                    $_SESSION['error'] = "Định dạng ảnh không đúng!";
                    header("location: index.php?controller=BaiViet&action=updateBaiViet&id_baiviet_blog=$id_baiviet");
                }
            }else{
                if($old['sothutu'] == $sothutu){
                    if($bvModel->update("tb_doanvan", ['tieude', 'noidung'], [
                        $tieude,
                        $noidung,
                    ], ['id_doanvan'], [$id_doanvan], ['and'])){
                        $_SESSION['success'] = "Cập nhật đoạn văn thành công!";
                        header("location: index.php?controller=BaiViet&action=updateBaiViet&id_baiviet_blog=$id_baiviet");
                    }else{
                        $_SESSION['error'] = "Cập nhật đoạn văn thất bại!";
                        header("location: index.php?controller=BaiViet&action=updateBaiViet&id_baiviet_blog=$id_baiviet");
                    }
                }else{
                    if($bvModel->update("tb_doanvan", ['sothutu'], [$old['sothutu']], ['id', 'sothutu'], [$id_baiviet, $sothutu], ['and', 'and'])){
                        if($bvModel->update("tb_doanvan", ['sothutu', 'tieude', 'noidung'], [
                            $sothutu,
                            $tieude,
                            $noidung,
                        ], ['id_doanvan'], [$id_doanvan], ['and'])){
                            $_SESSION['success'] = "Cập nhật đoạn văn thành công!";
                            header("location: index.php?controller=BaiViet&action=updateBaiViet&id_baiviet_blog=$id_baiviet");
                        }else{
                            $_SESSION['error'] = "Cập nhật đoạn văn thất bại!";
                            header("location: index.php?controller=BaiViet&action=updateBaiViet&id_baiviet_blog=$id_baiviet");
                        }
                    }else{
                        $_SESSION['error'] = "Cập nhật đoạn văn thất bại!";
                        header("location: index.php?controller=BaiViet&action=updateBaiViet&id_baiviet_blog=$id_baiviet");
                    }
                }
            }
        }
    }
}
}else{
    header("location:index.php");
}