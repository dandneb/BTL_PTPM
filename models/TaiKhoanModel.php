<?php
if(!isset($_SESSION)) {
    session_start();
}
if (isset($_SESSION['LoginOK']) && $_SESSION['LoginOK'][0] == "2") {
require_once 'configs/database.php';
require_once 'model.php';
class TaiKhoanModel extends Model{
    function getALLTK(){
        $dbh = $this->connectDb();
        $stmt = $dbh->prepare("SELECT t1.id_nguoidung, hoten, email, dienthoai, t1.trangthai, 
        (SELECT count(t2.id_nuochoa) from tb_nuochoa t2 where t2.id_nguoiquanly = t1.id_nguoidung) as nuochoa,
        (SELECT count(t3.id_cauhoi) from tb_cauhoi t3 where t1.id_nguoidung = t3.id_nguoidung) as cauhoi,
        (SELECT count(t4.id_donhang) from tb_donhang t4 where t1.id_nguoidung = t4.id_nguoiquanly) as donhang,
        (SELECT count(t5.id_baiviet_blog) from tb_kienthuc_blog t5 where t1.id_nguoidung = t5.id_nguoidung) as baiviet,
        (SELECT count(t6.id_nhacungcap) from tb_nhacungcap t6 where t1.id_nguoidung = t6.id_nguoiquanly) as nhacungcap,
        (SELECT count(t7.id_thuonghieu) from tb_thuonghieu t7 where t1.id_nguoidung = t7.id_nguoidung) as thuonghieu
        FROM `tb_nguoidung` t1
        where t1.capbac = 1
        ");
        if($stmt->execute()){
            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        echo json_encode(array("data" => $data));
    }
}
}
?>