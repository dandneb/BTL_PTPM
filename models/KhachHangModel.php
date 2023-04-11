<?php
require_once 'configs/database.php';
require_once 'model.php';
class KhachHangModel extends Model{
    function getKhachHang($taikhoan){
        $dbh = $this->connectDb();
        $stmt = $dbh->prepare("SELECT * from tb_nguoidung where id_nguoidung = ?");
        $stmt->bindValue(1, $taikhoan);
        if($stmt->execute()){
            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
            if(count($data) > 0)    return $data[0];
            else return false;
        }
    }
    function check($table, $column, $value){
        $dbh = $this->connectDb();
        $stmt = $dbh->prepare("SELECT ".$column." FROM `".$table."` WHERE ".$column." = ?");
        $stmt->bindValue(1, $value);
        if($stmt->execute()){
            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
            if(count($data) > 0)    return true;
            else return false;
        }
    }
    function checkArrVal($table, $column = [], $value = [], $logic){
        $dbh = $this->connectDb();
        $sql = "SELECT * FROM `".$table."` WHERE ";
        for($i = 0; $i < count($column); $i++){
            $sql .= "`".$column[$i]."` = ? ".$logic." ";
        }
        $sql = trim($sql);
        $sql = substr($sql, 0, strlen($sql)-strlen($logic));
        $stmt = $dbh->prepare($sql);
        for($i = 0; $i < count($value); $i++){
            $stmt->bindValue($i+1, $value[$i]);
        }
        if($stmt->execute()){
            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $data;
        }
    }
    function DangKy($param = []){
        $dbh = $this->connectDb();
        $stmt = $dbh->prepare("INSERT INTO `tb_nguoidung`(`id_nguoidung`, `hoten`, `email`, `dienthoai`, `matkhau`, `link_xacthucemail`, `capbac`, `mota`) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bindValue(1, $param['id_nguoidung']);
        $stmt->bindValue(2, $param['hoten']);
        $stmt->bindValue(3, $param['email']);
        $stmt->bindValue(4, $param['dienthoai']);
        $stmt->bindValue(5, $param['matkhau']);
        $stmt->bindValue(6, $param['link_xacthucemail']);
        $stmt->bindValue(7, $param['capbac']);
        $stmt->bindValue(8, $param['mota']);
        if($stmt->execute()){
            return true;
        }
        return false;
    }
    function updateActivation($param = []){
        $dbh = $this->connectDb();
        $stmt = $dbh->prepare("UPDATE `tb_nguoidung` SET `thoigian_xacthuc`= ?,`trangthai`= 1 WHERE `email` = ?");
        $stmt->bindValue(1, $param['timestamp']);
        $stmt->bindValue(2, $param['email']);
        if($stmt->execute()){
            return true;
        }
        return false;
    }
}
?>