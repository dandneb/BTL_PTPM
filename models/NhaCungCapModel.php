<?php
require_once 'configs/database.php';

class NhaCungCapModel extends Model{
    public function getALLNCC(){
        $dbh = $this->connectDb();
        $stmt = $dbh->prepare("Select * from tb_nhacungcap");
        $data = [];
        if($stmt->execute()){
            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        return $data;
    }
}
?>