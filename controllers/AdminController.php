<?php
session_start();
require_once 'models/AdminModel.php';
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
    function addSanPham(){
        require_once 'views/Admin/apps-ecommerce-addProducts.php';
    }
}
?>