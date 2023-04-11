<?php
if(!isset($_SESSION)) {
    session_start();
}
if (isset($_SESSION['LoginOK']) && $_SESSION['LoginOK'][0] == "2") {
    $ql = explode("_", $_SESSION['LoginOK']);
    require_once 'models/MaGiamGiaModel.php';
class MaGiamGiaController{
    //Quản lý mã giảm giá
    function maGiamGia(){
        require_once 'views/Admin/MaGiamGiaManagement/index.php';
    }
    function getMaGiamGia(){
        $MaGiamGiaModel = new MaGiamGiaModel();
        echo $MaGiamGiaModel->getALLMaGiamGia();
    }
}
}else{
    header("location: index.php");
}
?>