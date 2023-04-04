<?php
require_once 'configs/database.php';

class ThuongHieuModel extends Model{
    public function getALLTH(){
        $dbh = $this->connectDb();
        $stmt = $dbh->prepare("Select * from tb_thuonghieu");
        $data = [];
        if($stmt->execute()){
            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        return $data;
    }
}
?>