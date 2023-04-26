<?php
if(!isset($_SESSION)) {
    session_start();
}
if (isset($_SESSION['LoginOK']) && $_SESSION['LoginOK'][0] == "2") {
require_once 'configs/database.php';
require_once 'model.php';
require_once 'models/NuocHoaModel.php';
class MaGiamGiaModel extends Model{
    public function getALLMaGiamGia(){
        $dbh = $this->connectDb();
        $stmt = $dbh->prepare("SELECT t1.magiamgia, DATE_FORMAT(ngaybatdau, '%d-%m-%Y') as ngaybatdau, DATE_FORMAT(hansudung, '%d-%m-%Y') as hansudung, 
        soluotsudung, giam, ten_nuochoa, IF(hansudung < NOW(), 0, IF(soluotsudung = soluotdasudung, 2, 1)) as trangthai, 
        t1.soluotdasudung
        FROM `tb_magiamgia` t1 INNER JOIN `tb_nuochoa` t2 on t1.id_nuochoa = t2.id_nuochoa where hansudung >= NOW() and soluotsudung > soluotdasudung");
        if($stmt->execute()){
            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        echo json_encode(array("data" => $data));
    }

    public function getMGGHetHan(){
        $dbh = $this->connectDb();
        $stmt = $dbh->prepare("SELECT t1.magiamgia, DATE_FORMAT(ngaybatdau, '%d-%m-%Y') as ngaybatdau, DATE_FORMAT(hansudung, '%d-%m-%Y') as hansudung, 
        soluotsudung, giam, ten_nuochoa, IF(hansudung < NOW(), 0, IF(soluotsudung=soluotdasudung, 2, 1)) as trangthai, 
        t1.soluotdasudung
        FROM `tb_magiamgia` t1 INNER JOIN `tb_nuochoa` t2 on t1.id_nuochoa = t2.id_nuochoa where hansudung < NOW() or soluotdasudung = soluotsudung");
        if($stmt->execute()){
            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        echo json_encode(array("data" => $data));
    }

    function checkMGG($magiamgia){
        $dbh = $this->connectDb();
        $stmt = $dbh->prepare("SELECT t1.magiamgia, DATE_FORMAT(ngaybatdau, '%d-%m-%Y') as ngaybatdau, DATE_FORMAT(hansudung, '%d-%m-%Y') as hansudung, 
        soluotsudung, giam, ten_nuochoa, IF(hansudung < NOW(), 0, IF(soluotsudung=0, 2, 1)) as trangthai, 
        IFNULL((SELECT count(t3.id_donhang) from tb_donhang_nuochoa t3 INNER JOIN tb_donhang t4 on t3.id_donhang = t4.id_donhang and t4.trangthaidonhang != 2 where t3.magiamgia = t1.magiamgia group by id_nuochoa), 0) as soluongdonhangapdung
        FROM `tb_magiamgia` t1 INNER JOIN `tb_nuochoa` t2 on t1.id_nuochoa = t2.id_nuochoa where t1.magiamgia = ? and 
        IFNULL((SELECT count(t3.id_donhang) from tb_donhang_nuochoa t3 INNER JOIN tb_donhang t4 on t3.id_donhang = t4.id_donhang and t4.trangthaidonhang != 2 where t3.magiamgia = t1.magiamgia group by id_nuochoa), 0) = 0");
        $stmt->bindValue(1, $magiamgia);
        if($stmt->execute()){
            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
            if(count($data) > 0)    return true;
            else    return false;
        }
    }
}
}
?>