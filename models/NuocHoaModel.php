<?php
if(!isset($_SESSION)) {
    session_start();
}
require_once 'configs/database.php';
require_once 'models/Model.php';
class NuocHoaModel extends Model{
    function getNuocHoa($gioitinh){
        $dbh = $this->connectDb();
        $sql = "SELECT t1.* FROM `tb_nuochoa` t1
        INNER JOIN `tb_thuonghieu` t2 on t1.id_thuonghieu = t2.id_thuonghieu and t2.status = 0
        INNER JOIN `tb_nhacungcap` t3 on t1.id_nhacungcap = t3.id_nhacungcap and t3.status = 0
        where t1.gioitinh = ? and t1.status = 0";
        $stmt = $dbh->prepare($sql);
        $stmt->bindValue(1, $gioitinh);
        if($stmt->execute()){
            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $data;
        }else{
            return false;
        }
    }

    function getGiaBan($id_nuochoa){
        $dbh = $this->connectDb();
        $sql = "SELECT t1.id_nuochoa, t1.dungtich, t1.soluong, t1.gia_ban FROM `tb_gianuochoa` t1 WHERE t1.id_nuochoa = ?";
        $stmt = $dbh->prepare($sql);
        $stmt->bindValue(1, $id_nuochoa);
        if($stmt->execute()){
            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $data;
        }else{
            return false;
        }
    }

    function getPrice($loai, $id_nuochoa){
        $dbh = $this->connectDb();
        $sql = "SELECT ".$loai."(t1.gia_ban) as giaban FROM `tb_gianuochoa` t1 where id_nuochoa = ? group by id_nuochoa";
        $stmt = $dbh->prepare($sql);
        $stmt->bindValue(1, $id_nuochoa);
        if($stmt->execute()){
            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $data[0]['giaban'];
        }else{
            return false;
        }
    }
}
?>