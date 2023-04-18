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
}
}