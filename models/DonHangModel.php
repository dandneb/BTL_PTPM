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
        FROM `tb_donhang` t1 WHERE t1.trangthaidonhang < 2";
        $stmt = $dbh->prepare($sql);
        if($stmt->execute()){
            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        echo json_encode(array("data" => $data));
    }
    function getDonHangHoanTat(){
        $dbh = $this->connectDb();
        $sql = "SELECT t1.id_donhang, t1.email, t1.hoten, t1.sodienthoai, t1.diachi, t1.tinhthanh, t1.quanhuyen, t1.phuongxa, t1.id_phuongthucthanhtoan, t1.trangthaidonhang, t1.ngaydathang, t1.khuyenmai, t1.tongtien, t1.diachikhac,
        (SELECT sum(soluong) from tb_donhang_nuochoa t2 where t1.id_donhang = t2.id_donhang GROUP BY id_donhang) as soluong
        FROM `tb_donhang` t1 where t1.trangthaidonhang = 2";
        $stmt = $dbh->prepare($sql);
        if($stmt->execute()){
            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        echo json_encode(array("data" => $data));
    }
    function getDonHangDaHuy(){
        $dbh = $this->connectDb();
        $sql = "SELECT t1.id_donhang, t1.email, t1.hoten, t1.sodienthoai, t1.diachi, t1.tinhthanh, t1.quanhuyen, t1.phuongxa, t1.id_phuongthucthanhtoan, t1.trangthaidonhang, t1.ngaydathang, t1.khuyenmai, t1.tongtien, t1.diachikhac,
        (SELECT sum(soluong) from tb_donhang_nuochoa t2 where t1.id_donhang = t2.id_donhang GROUP BY id_donhang) as soluong
        FROM `tb_donhang` t1 where t1.trangthaidonhang = 3";
        $stmt = $dbh->prepare($sql);
        if($stmt->execute()){
            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        echo json_encode(array("data" => $data));
    }
    function getDonHangSanPham($id_donhang){
        $dbh = $this->connectDb();
        $stmt = $dbh->prepare("SELECT t1.*, t3.id_nuochoa, t3.ten_nuochoa, t3.xuatxu, IF(t3.gioitinh=0, 'Nam', IF(t3.gioitinh=1, 'Nữ', 'Unisex')) AS gioitinh,
        (SELECT img_link FROM tb_anhnuochoa t2 WHERE t1.id_nuochoa = t2.id_nuochoa ORDER BY t2.id_anh ASC LIMIT 1) as img_link
        FROM tb_donhang_nuochoa t1
        INNER JOIN tb_nuochoa t3 on t1.id_nuochoa = t3.id_nuochoa
        WHERE t1.id_donhang = ?");
        $stmt->bindValue(1, $id_donhang);
        if($stmt->execute()){
            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
            if(count($data) > 0)    return $data;
            else return false;
        }
    }
}