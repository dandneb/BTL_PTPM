<?php
if(!isset($_SESSION)) {
    session_start();
}
if (isset($_SESSION['LoginOK']) && $_SESSION['LoginOK'][0] == "1" || $_SESSION['LoginOK'][0] == "2") {
    $ql = explode("_", $_SESSION['LoginOK']);
    require_once 'models/BaiVietModel.php';
class BaiVietController{

    function baiViet(){
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
            $success="Thêm bài viết thành công!";
            $error="Thêm bài viết thất bại!";
            $phanloai = trim($_POST['phanloai']);
            $tieude = $_POST['tieude'];
            $mota = $_POST['mota'];
            if(strlen($phanloai) < 1 || strlen($tieude) < 1 || strlen($mota) < 1){
                $error = "Chưa đầy đủ thông tin!";
            }else{
                $bvModel = new BaiVietModel();
                $ql = explode("_", $_SESSION['LoginOK']);
                if($bvModel->insert("tb_kienthuc_blog", ['phanloai', 'tieude', 'mota', 'id_nguoidung'], [$phanloai, $tieude, $mota, $ql[1]])){
                    header("location: index.php?controller=BaiViet&action=baiviet&success=$success");
                }else{
                    header("location: index.php?controller=BaiViet&action=baiviet&error=$error");
                }
            }
        }
        require_once 'views/Admin/BaiVietManagement/apps-ecommerce-addBaiViet.php';
    }

    function updateBaiViet(){
        if(isset($_GET['id_baiviet_blog'])){
            $id_baiviet_blog = $_GET['id_baiviet_blog'];
            require_once 'views/Admin/BaiVietManagement/apps-ecommerce-updateBaiViet.php';
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
        if(!empty($_FILES)){
            $success="Thêm đoạn văn thành công!";
            $error="Thêm đoạn văn thất bại!";
            $id_baiviet = $_POST['id-baiviet-insert'];
            $id_doanvan = $_POST['id-doanvan-insert'];
            $sothutu = $_POST['sothutu-insert'];
            $tieude = $_POST['tieude-insert'];
            $noidung = $_POST['noidung-insert'];
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
                            header("location: index.php?controller=BaiViet&action=updateBaiViet&id_baiviet_blog=$id_baiviet&success=$success");
                        }else{
                            header("location: index.php?controller=BaiViet&action=updateBaiViet&id_baiviet_blog=$id_baiviet&error=$error");
                        }
                    }
                }
            }else{
                header("location: index.php?controller=BaiViet&action=updateBaiViet&id_baiviet_blog=$id_baiviet&error=$error");
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
                        header("location: index.php?controller=BaiViet&action=updateBaiViet&id_baiviet_blog=$id&success=$success");
                    }else{
                        header("location: index.php?controller=BaiViet&action=updateBaiViet&id_baiviet_blog=$id&error=$error");
                    }
                }else{
                    header("location: index.php?controller=BaiViet&action=updateBaiViet&id_baiviet_blog=$id&error=$error");
                }
            }else if(min($sothutu_arr) == $sothutu){
                if($bvModel->delete("tb_doanvan", ['id_doanvan'], [$id_doanvan], ['and'])){
                    if (file_exists($dv[0]['img_link'])) {
                        unlink($dv[0]['img_link']);
                        rmdir($dir);
                        if($bvModel->updateSTT($id)){
                            header("location: index.php?controller=BaiViet&action=updateBaiViet&id_baiviet_blog=$id&success=$success");
                        }
                    }
                }else{
                    header("location: index.php?controller=BaiViet&action=updateBaiViet&id_baiviet_blog=$id&error=$error");
                }
            }else{
                if($bvModel->updateSTT_TT($id, $sothutu)){
                    if($bvModel->delete("tb_doanvan", ['id_doanvan'], [$id_doanvan], ['and'])){
                        if (file_exists($link)) {
                            unlink($link);
                            rmdir($dir);
                            header("location: index.php?controller=BaiViet&action=updateBaiViet&id_baiviet_blog=$id&success=$success");
                        }
                    }else{
                        header("location: index.php?controller=BaiViet&action=updateBaiViet&id_baiviet_blog=$id&error=$error");
                    }
                }else{
                    header("location: index.php?controller=BaiViet&action=updateBaiViet&id_baiviet_blog=$id&error=$error");
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
            
            if ($file != "" && file_exists($old['img_link'])) {
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
                                        header("location: index.php?controller=BaiViet&action=updateBaiViet&id_baiviet_blog=$id_baiviet&success=$success");
                                    }else{
                                        header("location: index.php?controller=BaiViet&action=updateBaiViet&id_baiviet_blog=$id_baiviet&error=$error");
                                    }
                                }else{
                                    if($bvModel->update("tb_doanvan", ['sothutu'], [$old['sothutu']], ['id', 'sothutu'], [$id_baiviet, $sothutu], ['and', 'and'])){
                                        if($bvModel->update("tb_doanvan", ['sothutu', 'tieude', 'noidung', 'img_link'], [
                                            $sothutu,
                                            $tieude,
                                            $noidung,
                                            $new_link,
                                        ], ['id_doanvan'], [$id_doanvan], ['and'])){
                                            header("location: index.php?controller=BaiViet&action=updateBaiViet&id_baiviet_blog=$id_baiviet&success=$success");
                                        }
                                    }else{
                                        header("location: index.php?controller=BaiViet&action=updateBaiViet&id_baiviet_blog=$id_baiviet&error=$error");
                                    }
                                }
                            }
                        }else{
                            header("location: index.php?controller=BaiViet&action=updateBaiViet&id_baiviet_blog=$id_baiviet&error=$error");
                        }
                    }else{
                        header("location: index.php?controller=BaiViet&action=updateBaiViet&id_baiviet_blog=$id_baiviet&error=$error");
                    }
                }else{
                    header("location: index.php?controller=BaiViet&action=updateBaiViet&id_baiviet_blog=$id_baiviet&error=$error");
                }
            }else{
                if($old['sothutu'] == $sothutu){
                    if($bvModel->update("tb_doanvan", ['tieude', 'noidung'], [
                        $tieude,
                        $noidung,
                    ], ['id_doanvan'], [$id_doanvan], ['and'])){
                        header("location: index.php?controller=BaiViet&action=updateBaiViet&id_baiviet_blog=$id_baiviet&success=$success");
                    }else{
                        header("location: index.php?controller=BaiViet&action=updateBaiViet&id_baiviet_blog=$id_baiviet&error=$error");
                    }
                }else{
                    if($bvModel->update("tb_doanvan", ['sothutu'], [$old['sothutu']], ['id', 'sothutu'], [$id_baiviet, $sothutu], ['and', 'and'])){
                        if($bvModel->update("tb_doanvan", ['sothutu', 'tieude', 'noidung'], [
                            $sothutu,
                            $tieude,
                            $noidung,
                        ], ['id_doanvan'], [$id_doanvan], ['and'])){
                            header("location: index.php?controller=BaiViet&action=updateBaiViet&id_baiviet_blog=$id_baiviet&success=$success");
                        }else{
                            header("location: index.php?controller=BaiViet&action=updateBaiViet&id_baiviet_blog=$id_baiviet&error=$error");
                        }
                    }else{
                        header("location: index.php?controller=BaiViet&action=updateBaiViet&id_baiviet_blog=$id_baiviet&error=$error");
                    }
                }
            }
        }
    }
}
}else{
    header("location:index.php");
}