<?php
require_once 'configs/database.php';
require_once 'model.php';
class ThuongHieuModel extends Model{
    public function getALLTH(){
        $dbh = $this->connectDb();
        $stmt = $dbh->prepare("Select * from tb_thuonghieu where status = 0");
        $data = [];
        if($stmt->execute()){
            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        return $data;
    }

    public function getALLThuongHieu(){
        $dbh = $this->connectDb();
        $stmt = $dbh->prepare("SELECT t1.id_thuonghieu, ten_thuonghieu, t1.status, hoten, count(t3.id_nuochoa) as soluongsanpham FROM `tb_thuonghieu` t1 
        INNER JOIN `tb_nguoidung` t2 on t1.id_nguoidung = t2.id_nguoidung 
        LEFT JOIN `tb_nuochoa` t3 on t1.id_thuonghieu = t3.id_thuonghieu 
        GROUP by t1.id_thuonghieu
        ");
        if($stmt->execute()){
            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        echo json_encode(array("data" => $data));
    }
}
?>