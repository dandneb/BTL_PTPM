<?php
require_once 'configs/database.php';

class NuocHoaModel extends Model{
    public function insert($param = []) {
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
        $stmt->bindValue(24, "74R1G6BOT5N");
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
}
?>