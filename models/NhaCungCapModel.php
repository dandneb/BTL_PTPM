<?php
if(!isset($_SESSION)) {
    session_start();
}
if (isset($_SESSION['LoginOK']) && $_SESSION['LoginOK'][0] == "1" || $_SESSION['LoginOK'][0] == "2") {
require_once 'configs/database.php';
require_once 'model.php';
require_once 'models/NuocHoaModel.php';
class NhaCungCapModel extends Model{
    public function getALLNCC(){
        $dbh = $this->connectDb();
        $stmt = $dbh->prepare("Select * from tb_nhacungcap where status = 0");
        $data = [];
        if($stmt->execute()){
            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        return $data;
    }
    public function getALLNhaCungCap(){
        $dbh = $this->connectDb();
        $stmt = $dbh->prepare("SELECT t1.id_nhacungcap, ten_nhacungcap, diachi, sodienthoai, t1.email, t1.status, t2.hoten, count(id_nuochoa) as soluongnuochoa FROM `tb_nhacungcap` t1
        INNER JOIN `tb_nguoidung` t2 on t1.id_nguoiquanly = t2.id_nguoidung
        LEFT JOIN `tb_nuochoa` t3 on t1.id_nhacungcap = t3.id_nhacungcap
        GROUP BY t1.id_nhacungcap
        ");
        if($stmt->execute()){
            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        echo json_encode(array("data" => $data));
    }
}
}
?>