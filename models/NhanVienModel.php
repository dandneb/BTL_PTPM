<?php
if(!isset($_SESSION)) {
    session_start();
}
if (isset($_SESSION['LoginOK']) && $_SESSION['LoginOK'][0] == "1" || $_SESSION['LoginOK'][0] == "2") {
require_once 'configs/database.php';
require_once 'model.php';
class NhanVienModel extends Model{
    public function getALLProducts(){
        $dbh = $this->connectDb();
        $stmt = $dbh->prepare("Select t1.id_nuochoa, ten_nuochoa, ten_thuonghieu, ngaybat_dauban, t1.gioitinh, t3.soluong, gia_ban, gia_nhap, t1.status, IFNULL(sum(t4.soluong),0) as soluongdaban, t1.id_thuonghieu from tb_nuochoa t1 
        INNER JOIN tb_thuonghieu t2 on t1.id_thuonghieu = t2.id_thuonghieu
        INNER JOIN (Select id_nuochoa, sum(soluong) as soluong, concat(min(gia_ban),'-',max(gia_ban)) as gia_ban, concat(min(gia_nhap),'-',max(gia_nhap)) as gia_nhap from tb_gianuochoa GROUP BY id_nuochoa) t3 on t1.id_nuochoa = t3.id_nuochoa
        LEFT JOIN tb_donhang_nuochoa t4 on t4.id_nuochoa = t1.id_nuochoa group by id_nuochoa
        ");
        if($stmt->execute()){
            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        echo json_encode(array("data" => $data));
    }
    public function insert_nuochoa($param = []) {
        $dbh = $this->connectDb();
        $stmt = $dbh->prepare("INSERT INTO `tb_nuochoa` (`id_nuochoa`, `ten_nuochoa`, `gioitinh`, `xuatxu`, `mota`, `thongtinchinh`, 
        `tongquan`, `huongthom`, `loai_huongthom`, `thietke`, `dadanghoa`, `huongdansudung`, `nhomnuochoa`, `dotuoikhuyendung`, `namramat`, 
        `nongdo`, `nhaphache`, `doluuhuong`, `phongcach`, `dotoahuong`, `thoidiemphuhop`, `id_thuonghieu`, `id_nhacungcap`, `id_nguoiquanly`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bindValue(1, $param['id_nuochoa']);
        $stmt->bindValue(2, $param['ten_nuochoa']);
        $stmt->bindValue(3, $param['gioitinh']);
        $stmt->bindValue(4, $param['xuatxu']);
        $stmt->bindValue(5, $param['mota']);
        $stmt->bindValue(6, $param['thongtinchinh']);
        $stmt->bindValue(7, $param['tongquan']);
        $stmt->bindValue(8, $param['huongthom']);
        $stmt->bindValue(9, $param['loai_huongthom']);
        $stmt->bindValue(10, $param['thietke']);
        $stmt->bindParam(11, $param['dadanghoa']);
        $stmt->bindValue(12, $param['huongdansudung']);
        $stmt->bindValue(13, $param['nhomnuochoa']);
        $stmt->bindValue(14, $param['dotuoikhuyendung']);
        $stmt->bindValue(15, $param['namramat']);
        $stmt->bindValue(16, $param['nongdo']);
        $stmt->bindValue(17, $param['nhaphache']);
        $stmt->bindValue(18, $param['doluuhuong']);
        $stmt->bindValue(19, $param['phongcach']);
        $stmt->bindValue(20, $param['dotoahuong']);
        $stmt->bindValue(21, $param['thoidiemphuhop']);
        $stmt->bindValue(22, $param['id_thuonghieu']);
        $stmt->bindValue(23, $param['id_nhacungcap']);
        $stmt->bindValue(24, $param['id_nguoiquanly']);
        return $stmt->execute();
    }

    public function insertGiaNuocHoa($param = []) {
        $dbh = $this->connectDb();
        $stmt = $dbh->prepare("INSERT INTO `tb_gianuochoa` (`id_nuochoa`, `dungtich`, `soluong`, `gia_nhap`, `gia_ban`) 
        VALUES (?, ?, ?, ?, ?)");
        $stmt->bindValue(1, $param['id_nuochoa']);
        $stmt->bindValue(2, $param['dungtich']);
        $stmt->bindValue(3, $param['soluong']);
        $stmt->bindValue(4, $param['gia_nhap']);
        $stmt->bindValue(5, $param['gia_ban']);
        return $stmt->execute();
    }
    public function insertImage($param = []) {
        $dbh = $this->connectDb();
        $stmt = $dbh->prepare("INSERT INTO `tb_anhnuochoa`(`img_link`, `id_nuochoa`) VALUES (?, ?)");
        $stmt->bindValue(1, $param['img_link']);
        $stmt->bindValue(2, $param['id_nuochoa']);
        return $stmt->execute();
    }
}
}
?>