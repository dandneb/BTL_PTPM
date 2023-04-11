<?php
require_once 'configs/database.php';
require_once 'model.php';
class BaiVietModel extends Model{
    public function getALLBaiViet(){
        $dbh = $this->connectDb();
        $stmt = $dbh->prepare("SELECT t1.id_baiviet_blog , t1.tieude, ngaydang, t1.mota, soluongnguoixem, phanloai, count(id_doanvan) as sodoanvan, hoten
        FROM `tb_kienthuc_blog` t1
        LEFT JOIN `tb_doanvan` t2 on t1.id_baiviet_blog = t2.id
        INNER JOIN `tb_nguoidung` t3 on t1.id_nguoidung = t3.id_nguoidung
        group by t1.id_baiviet_blog");
        if($stmt->execute()){
            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        echo json_encode(array("data" => $data));
    }
    public function getALLDoanVan($id){
        $dbh = $this->connectDb();
        $stmt = $dbh->prepare("SELECT *from tb_doanvan where id = ? order by sothutu ASC");
        $stmt->bindValue(1, $id);
        if($stmt->execute()){
            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        echo json_encode(array("data" => $data));
    }

    public function updateSTT($id){
        $dbh = $this->connectDb();
        $stmt = $dbh->prepare("UPDATE `tb_doanvan` SET `sothutu`=`sothutu`-1 WHERE id = ?");
        $stmt->bindValue(1, $id);
        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
    }
    public function updateSTT_TT($id, $stt){
        $dbh = $this->connectDb();
        $stmt = $dbh->prepare("UPDATE `tb_doanvan` SET `sothutu`=`sothutu`- 1 WHERE `sothutu` > ? and `id` = ?");
        $stmt->bindValue(1, $stt);
        $stmt->bindValue(2, $id);
        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
    }
}