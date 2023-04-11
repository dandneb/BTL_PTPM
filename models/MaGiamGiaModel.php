<?php
require_once 'configs/database.php';
require_once 'model.php';
require_once 'models/NuocHoaModel.php';
class MaGiamGiaModel extends Model{
    public function getALLMaGiamGia(){
        $dbh = $this->connectDb();
        $stmt = $dbh->prepare("SELECT t1.magiamgia, DATE_FORMAT(ngaybatdau, '%d-%m-%Y') as ngaybatdau, DATE_FORMAT(hansudung, '%d-%m-%Y') as hansudung, 
        soluotsudung, giam, ten_nuochoa, IF(hansudung < NOW(), 0, IF(soluotsudung=0, 2, 1)) as trangthai, count(t3.id_donhang) as soluongdonhangapdung
        FROM `tb_magiamgia` t1 INNER JOIN `tb_nuochoa` t2 on t1.id_nuochoa = t2.id_nuochoa
        LEFT JOIN `tb_donhang_nuochoa` t3 on t1.magiamgia = t3.magiamgia
        LEFT JOIN `tb_donhang` t4 on t3.id_donhang = t4.id_donhang and t4.trangthaidonhang != 2
        group by t1.magiamgia
        ");
        if($stmt->execute()){
            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        echo json_encode(array("data" => $data));
    }
}
?>