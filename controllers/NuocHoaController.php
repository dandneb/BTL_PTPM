<?php
require_once 'models/NuocHoaModel.php';
class NuocHoaController{
    function index(){
        $nHModel = new NuocHoaModel();
        $nuocHoaNam = $nHModel->getNuocHoaSanPham(0);
        $nuocHoaNu = $nHModel->getNuocHoaSanPham(1);
        $nuocHoaUnisex = $nHModel->getNuocHoaSanPham(2);
        $th = $nHModel->get("tb_thuonghieu", ['status'], [0], ['and'], "order by ten_thuonghieu asc");
        require_once 'views/NuocHoa/index.php';
    }

    function getNuocHoa(){
        if(isset($_GET['filter'])){
            $gioitinh = $_GET['filter'];
            $nHModel = new NuocHoaModel();
            echo $nHModel->getNH($gioitinh);
        }
    }

    function SanPham(){
        if(isset($_GET['gioitinh'])){
            $gioitinh = $_GET['gioitinh'];
            $nHModel = new NuocHoaModel();
            if($gioitinh == "Nam"){
                echo '<script> var gt = 0; </script>';
                $nuocHoa = $nHModel->getNuocHoaSanPham(0);
            }else if($gioitinh == "Nu"){
                echo '<script> var gt = 1; </script>';
                $nuocHoa = $nHModel->getNuocHoaSanPham(1);
            }else{
                $nuocHoa = $nHModel->getNuocHoaSanPham(2);
                echo '<script> var gt = 2; </script>';
            }
            require_once 'views/NuocHoa/SanPham.php';
        }
    }
    function ThongTin(){
        if(isset($_GET['id_nuochoa'])){
            $nHModel = new NuocHoaModel();
            $id_nuochoa = $_GET['id_nuochoa'];
            $nuochoa = $nHModel->get("tb_nuochoa", ['id_nuochoa'], [$id_nuochoa], ['and']);
            if(count($nuochoa) > 0 && $nuochoa != false){
                $nuochoa = $nuochoa[0];
                $anh = $nHModel->get("tb_anhnuochoa", ['id_nuochoa'], [$id_nuochoa], ['and'], "order by id_anh ASC");
                $thuonghieu = $nHModel->get("tb_thuonghieu", ['id_thuonghieu'], [$nuochoa['id_thuonghieu']], ['and'])[0];
                $gia = $nHModel->getGiaBan($id_nuochoa);
                $gia_json = json_encode($gia);
                $gia_ban = array_map(function ($item){
                    $M = new NuocHoaModel();
                    return array($M->ps_price($item['gia_ban']));
                }, $gia);
                $so_luong_json = array_map(function ($item){
                    return array($item['soluong']);
                }, $gia);
                $so_luong_json = json_encode($so_luong_json);
                $gia_ban_json = json_encode($gia_ban);
                $soluong = array_reduce($gia, function ($carry, $g) {
                    return $carry += $g['soluong'];
                }, 0);
                $check = false;
                $vitri = 0;
                $flags = ['', '', ''];
                for ($i = 0; $i < count($gia); $i++) {
                    if($gia[$i]['soluong'] == 0 && $check == false){
                        $flags[$i] = 'checked';
                        $vitri = $i;
                        $check = true;
                    }
                }
                //die(print_r($gia_ban[2]));
                require_once 'views/NuocHoa/ThongTin.php';
            }else{
                header("location: index.php");
            }
        }
        
    }
    function GioiThieu(){
        require_once 'views/NuocHoa/GioiThieu.php';
    }
    function Blog(){
        require_once 'views/NuocHoa/Blog.php';
    }
    function Blog_ThongTin(){
        require_once 'views/NuocHoa/Blog_ThongTin.php';
    }
}
?>