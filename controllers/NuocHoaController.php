<?php
class NuocHoaController{
    function index(){
        require_once 'views/NuocHoa/index.php';
    }
    function SanPham(){
        require_once 'views/NuocHoa/SanPham.php';
    }
    function ThongTin(){
        require_once 'views/NuocHoa/ThongTin.php';
    }
    function MuaHang(){
        require_once 'views/NuocHoa/MuaHang.php';
    }
    function GioiThieu(){
        require_once 'views/NuocHoa/GioiThieu.php';
    }
}
?>