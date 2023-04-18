<?php
if(!isset($_SESSION)) {
    session_start();
}
if (isset($_SESSION['LoginOK']) && $_SESSION['LoginOK'][0] == "2") {
require_once 'configs/database.php';
require_once 'model.php';
class ThanhToanModel extends Model{
    public function getALLPTTT(){
        $dbh = $this->connectDb();
        $stmt = $dbh->prepare("SELECT t1.*, IFNULL(COUNT(id_donhang), 0) as sodonhangapdung FROM `tb_phuongthucthanhtoan` t1 LEFT JOIN `tb_donhang` t2 on t1.id_phuongthucthanhtoan = t2.id_phuongthucthanhtoan and t2.trangthaidonhang != 2
        group by t1.id_phuongthucthanhtoan
        ");
        if($stmt->execute()){
            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        echo json_encode(array("data" => $data));
    }

    function insert($table, $column = [], $value = []){
        $dbh = $this->connectDb();
        $sql = "INSERT INTO `".$table."`(";
        //Thêm các columns
        for($i = 0; $i < count($column); $i++){
            $sql .= "`".$column[$i]."`, ";
        }
        $sql = trim($sql);
        $sql = substr($sql, 0, strlen($sql)-1);
        $sql .= ") VALUES (";
        //Thêm các values
        for($i = 0; $i < count($value); $i++){
            $sql .= "?, ";
        }
        
        $sql = trim($sql);
        $sql = substr($sql, 0, strlen($sql)-1);
        $sql .= ")";
        //Thực thi
        $stmt = $dbh->prepare($sql);
        for($i = 0; $i < count($value); $i++){
            $stmt->bindValue($i+1, $value[$i]);
        }
        if($stmt->execute()){
            return $dbh->lastInsertId();
        }else{
            return false;
        }
    }
}
}