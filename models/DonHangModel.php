<?php
if(!isset($_SESSION)) {
    session_start();
}
require_once 'configs/database.php';
require_once 'models/Model.php';
class DonHangModel extends Model{
    function getDonHang(){
        $dbh = $this->connectDb();
        $sql = "SELECT t1.id_donhang, t1.email, t1.hoten, t1.sodienthoai, t1.diachi, t1.tinhthanh, t1.quanhuyen, t1.phuongxa, t1.id_phuongthucthanhtoan, t1.trangthaidonhang, t1.trangthaithanhtoan, t1.trangthaivanchuyen, t1.ngaydathang, t1.khuyenmai, t1.tongtien, t1.diachikhac,
        (SELECT sum(soluong) from tb_donhang_nuochoa t2 where t1.id_donhang = t2.id_donhang GROUP BY id_donhang) as soluong
        FROM `tb_donhang` t1";
        $stmt = $dbh->prepare($sql);
        if($stmt->execute()){
            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        echo json_encode(array("data" => $data));
    }
}