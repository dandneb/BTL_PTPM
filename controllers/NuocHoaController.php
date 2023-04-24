<?php
require_once 'models/NuocHoaModel.php';
class NuocHoaController{
    function index(){
        $nHModel = new NuocHoaModel();
        $nuocHoaNam = $nHModel->getNuocHoaSanPham(0);
        $nuocHoaNu = $nHModel->getNuocHoaSanPham(1);
        $nuocHoaUnisex = $nHModel->getNuocHoaSanPham(2);
        $th = $nHModel->get("tb_thuonghieu", ['status'], [0], ['and'], "order by ten_thuonghieu asc");
        $kienthuc = $nHModel->getBaiVietTrangChu(0);
        require_once 'views/NuocHoa/index.php';
    }

    function getNuocHoa(){
        if(isset($_GET['filter']) && isset($_GET['name'])){
            $filter = $_GET['filter'];
            $name = $_GET['name'];
            $nHModel = new NuocHoaModel();
            echo $nHModel->getNH($name,$filter);
        }
    }

    function queryNuocHoa(){
        if(isset($_GET['query'])){
            $query = $_GET['query'];
            $nHModel = new NuocHoaModel();
            echo $nHModel->queryNuocHoa($query);
        }
    }

    function SanPham(){
        $flags = 0;
        if(isset($_GET['gioitinh']) && !isset($_GET['thuonghieu'])&& !isset($_GET['query'])){
            $flags = 1;
            $gioitinh = $_GET['gioitinh'];
            $nHModel = new NuocHoaModel();
            $th = $nHModel->get("tb_thuonghieu", ['status'], [0], ['and'], "order by ten_thuonghieu asc");
            echo "<script>var thuonghieu = ".json_encode($th)."</script>";
            if($gioitinh == "Nam"){
                echo '<script> var filter = 0; var names="gioitinh"; var check = 0; </script>';
                $nuocHoa = $nHModel->getNuocHoaSanPham(0);
                $name_filter = "Nam";
            }else if($gioitinh == "Nu"){
                echo '<script> var filter = 1; var names="gioitinh"; var check = 0; </script>';
                $nuocHoa = $nHModel->getNuocHoaSanPham(1);
                $name_filter = "Nữ";
            }else if($gioitinh == "Unisex"){
                $nuocHoa = $nHModel->getNuocHoaSanPham(2);
                echo '<script> var filter = 2; var names="gioitinh"; var check = 0; </script>';
                $name_filter = "Unisex";
            }else{
                header("location: index.php");
            }
            require_once 'views/NuocHoa/SanPham.php';
        }else if(isset($_GET['thuonghieu']) && !isset($_GET['gioitinh']) && !isset($_GET['query'])){
            $flags = 1;
            $thuonghieu = $_GET['thuonghieu'];
            $nHModel = new NuocHoaModel();
            $th = $nHModel->get("tb_thuonghieu", ['id_thuonghieu'], [$thuonghieu], ['and']);
            if(count($th) > 0){
                echo '<script> var filter = "'.$thuonghieu.'"; var names="id_thuonghieu"; var check = 0; </script>';
                $name_filter = $th[0]['ten_thuonghieu'];
            }else{
                header("location: index.php");
            }
            require_once 'views/NuocHoa/SanPham.php';
        }else if(!empty($_GET['query']) && isset($_GET['query']) && !isset($_GET['thuonghieu']) && !isset($_GET['gioitinh'])){
            $flags = 2;
            $query = $_GET['query'];
            echo '<script> var query = "'.$query.'"; var check = 1; </script>';
            require_once 'views/NuocHoa/SanPham.php';
        }else{
            header("location: index.php");
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
        $nHModel = new NuocHoaModel();
        $blog = $nHModel->getBaiViet(1);
        $blognoibat = $nHModel->getBaiVietNoiBat(1);
        require_once 'views/NuocHoa/Blog.php';
    }
    function KienThuc(){
        $nHModel = new NuocHoaModel();
        $kienthuc = $nHModel->getBaiViet(0);
        $baivietnoibat = $nHModel->getBaiVietNoiBat(0);
        require_once 'views/NuocHoa/KienThuc.php';
    }
    function BaiViet(){
        if(isset($_GET['id_baiviet'])){
            $nHModel = new NuocHoaModel();
            $id_baiviet = $_GET['id_baiviet'];
            $baiviet = $nHModel->get("tb_kienthuc_blog", ['id_baiviet_blog'], [$id_baiviet], ['and']);
            if(count($baiviet) > 0){
                $doanvan = $nHModel->get("tb_doanvan", ['id'], [$id_baiviet], ['and'], "Order by sothutu asc");
                $nHModel->updateViewer($id_baiviet);
                if(count($doanvan) > 0){
                    $baiviet = $baiviet[0];
                    require_once 'views/NuocHoa/BaiViet.php';
                }else{
                    header("location: index.php");
                }
            }else{
                header("location: index.php");
            }
        }else{
            header("location: index.php");
        }
        
    }
}
?>