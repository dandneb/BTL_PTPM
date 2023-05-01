<?php
if(!isset($_SESSION)) {
    session_start();
}
if (isset($_SESSION['LoginOK']) && $_SESSION['LoginOK'][0] == "1" || $_SESSION['LoginOK'][0] == "2") {

require_once 'configs/database.php';
require_once 'model.php';
class CauHoiModel extends Model{
    function getCauHoiDangXuLy(){
        $dbh = $this->connectDb();
        $stmt = $dbh->prepare("SELECT `id_cauhoi`, `thoigianhoi`, `hoten`, `email`, `noidung`, `trangthai`, `ip_address` FROM `tb_cauhoi` WHERE trangthai = 0");
        if($stmt->execute()){
            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        echo json_encode(array("data" => $data));
    }
    function getCauHoiHoanTat(){
        $dbh = $this->connectDb();
        $stmt = $dbh->prepare("SELECT `id_cauhoi`, `thoigianhoi`, `hoten`, `email`, `noidung`, `trangthai` FROM `tb_cauhoi` WHERE trangthai = 1");
        if($stmt->execute()){
            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        echo json_encode(array("data" => $data));
    }
    function getCauHoi($id_cauhoi){
        $dbh = $this->connectDb();
        $stmt = $dbh->prepare("SELECT `id_cauhoi`, `thoigianhoi`, `hoten`, `email`, `noidung`, `traloi`, `thoigiantraloi`, 
        (SELECT hoten from tb_nguoidung t2 where t1.id_nguoidung = t2.id_nguoidung) as hotenquanly
        FROM `tb_cauhoi` t1 WHERE id_cauhoi = ?");
        $stmt->bindValue(1, $id_cauhoi);
        if($stmt->execute()){
            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        echo json_encode(array("data" => $data[0]));
    }
}
}else{
    header("location:index.php");
}
?>