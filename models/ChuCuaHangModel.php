<?php
if(!isset($_SESSION)) {
    session_start();
}
if (isset($_SESSION['LoginOK']) && $_SESSION['LoginOK'][0] == "2") {
require_once 'configs/database.php';
require_once 'model.php';
class ChuCuaHangModel extends Model{
    function getALLKH(){
        $dbh = $this->connectDb();
        $stmt = $dbh->prepare("SELECT t1.id_nguoidung, hoten, email, dienthoai, trangthai, 
        (SELECT COUNT(id_donhang) FROM tb_donhang t2 where t2.id_nguoiquanly = t1.id_nguoidung and trangthaidonhang = 0) as donhangdangxuly,
        (SELECT COUNT(id_donhang) FROM tb_donhang t3 where t3.id_nguoiquanly = t1.id_nguoidung and trangthaidonhang = 1) as donhanghoantat,
        (SELECT COUNT(id_donhang) FROM tb_donhang t4 where t4.id_nguoiquanly = t1.id_nguoidung and trangthaidonhang = 1) as donhangdahuy
        FROM `tb_nguoidung` t1 where capbac = 0");
        if($stmt->execute()){
            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        echo json_encode(array("data" => $data));
    }
}
}
