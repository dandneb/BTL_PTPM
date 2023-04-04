<?php
require_once 'configs/database.php';
require_once 'model.php';
class AdminModel extends Model{
    public function getALLProducts(){
        $dbh = $this->connectDb();
        $stmt = $dbh->prepare("Select t1.id_nuochoa, ten_nuochoa, ten_thuonghieu, ngaybat_dauban, t3.soluong, gia_ban, gia_nhap, status, IFNULL(sum(t4.soluong),0) as soluongdaban from tb_nuochoa t1 
        INNER JOIN tb_thuonghieu t2 on t1.id_thuonghieu = t2.id_thuonghieu
        INNER JOIN (Select id_nuochoa, sum(soluong) as soluong, concat(min(gia_ban),'-',max(gia_ban)) as gia_ban, concat(min(gia_nhap),'-',max(gia_nhap)) as gia_nhap from tb_gianuochoa GROUP BY id_nuochoa) t3 on t1.id_nuochoa = t3.id_nuochoa
        LEFT JOIN tb_donhang_nuochoa t4 on t4.id_nuochoa = t1.id_nuochoa group by id_nuochoa
        ");
        if($stmt->execute()){
            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        echo json_encode(array("data" => $data));
    }
}
?>