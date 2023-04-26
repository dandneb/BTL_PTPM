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
    function getALLDH($id_khachhang){
        $dbh = $this->connectDb();
        $stmt = $dbh->prepare("Select * from tb_donhang where id_khachhang = ?");
        $stmt->bindValue(1, $id_khachhang);
        if($stmt->execute()){
            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        echo json_encode(array("data" => $data));
    }
    function getDonHangSanPham($id_donhang){
        $dbh = $this->connectDb();
        $stmt = $dbh->prepare("SELECT t1.*, t3.id_nuochoa, t3.ten_nuochoa, t3.xuatxu, IF(t3.gioitinh=0, 'Nam', IF(t3.gioitinh=1, 'Nữ', 'Unisex')) AS gioitinh,
        (SELECT img_link FROM tb_anhnuochoa t2 WHERE t1.id_nuochoa = t2.id_nuochoa ORDER BY t2.id_anh ASC LIMIT 1) as img_link
        FROM tb_donhang_nuochoa t1
        INNER JOIN tb_nuochoa t3 on t1.id_nuochoa = t3.id_nuochoa
        WHERE t1.id_donhang = ?");
        $stmt->bindValue(1, $id_donhang);
        if($stmt->execute()){
            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
            if(count($data) > 0)    return $data;
            else return false;
        }
    }
    function getSanPhamYeuThich($id_nguoidung){
        $dbh = $this->connectDb();
        $stmt = $dbh->prepare("SELECT `id_nguoidung`, `id_nuochoa`, `dungtich`, 
        (SELECT img_link from tb_anhnuochoa t2 where t1.id_nuochoa = t2.id_nuochoa ORDER BY t2.id_anh limit 1) as img_link, 
        (SELECT soluong from tb_gianuochoa t3 where t1.id_nuochoa = t3.id_nuochoa and t1.dungtich = t3.dungtich) as soluong, 
        (SELECT gia_ban from tb_gianuochoa t3 where t1.id_nuochoa = t3.id_nuochoa and t1.dungtich = t3.dungtich) as gia_ban, 
        (SELECT ten_nuochoa from tb_nuochoa t4 where t1.id_nuochoa = t4.id_nuochoa) as ten_nuochoa,
        (SELECT xuatxu from tb_nuochoa t4 where t1.id_nuochoa = t4.id_nuochoa) as xuatxu,
        (SELECT mota from tb_nuochoa t4 where t1.id_nuochoa = t4.id_nuochoa) as mota,
        (SELECT IF(gioitinh=0, 'Nam', IF(gioitinh=1, 'Nữ', 'Unisex')) from tb_nuochoa t4 where t1.id_nuochoa = t4.id_nuochoa) as gioitinh
        FROM `tb_yeuthich` t1 where t1.id_nguoidung = ? order by ngaythem desc");
        $stmt->bindValue(1, $id_nguoidung);
        if($stmt->execute()){
            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $data;
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
    function updateSoLuotSuDung($magiamgia){
        $dbh = $this->connectDb();
        $stmt = $dbh->prepare("UPDATE `tb_magiamgia` SET `soluotdasudung`= `soluotdasudung` + 1  WHERE `magiamgia` = ?");
        $stmt->bindValue(1, $magiamgia);
        if($stmt->execute()){
            return true;
        }
        return false;
    }
    function checkMaGiamGia($magiamgia){
        $dbh = $this->connectDb();
        $stmt = $dbh->prepare('SELECT * FROM `tb_magiamgia` t1 WHERE t1.hansudung >= now() and soluotdasudung < soluotsudung and magiamgia = ?');
        $stmt->bindValue(1, $magiamgia);
        if($stmt->execute()){
            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
            if(!empty($data)){
                if(count($data) > 0)    return $data;
                else return 0;
            }else{
                return 0;
            }
        }
    }
    function getMaGiamGia($magiamgia){
        $dbh = $this->connectDb();
        $stmt = $dbh->prepare('SELECT * FROM `tb_magiamgia` t1 WHERE t1.hansudung >= now() and soluotdasudung < soluotsudung and magiamgia = ?');
        $stmt->bindValue(1, $magiamgia);
        if($stmt->execute()){
            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
            if(!empty($data)){
                if(count($data) > 0)    return $data;
                else return false;
            }else{
                return false;
            }
        }else{
            return false;
        }
    }

    function checkMGG($magiamgia){
        $dbh = $this->connectDb();
        $stmt = $dbh->prepare('SELECT * FROM `tb_magiamgia` t1 WHERE t1.hansudung >= now() and soluotdasudung <= soluotsudung and soluotdasudung > 0 and magiamgia = ?');
        $stmt->bindValue(1, $magiamgia);
        if($stmt->execute()){
            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
            if(!empty($data)){
                if(count($data) > 0)    return true;
                else return false;
            }else{
                return false;
            }
        }else{
            return false;
        }
    }

    function updateUseCoupon($magiamgia){
        $dbh = $this->connectDb();
        $stmt = $dbh->prepare('UPDATE `tb_magiamgia` SET `soluotdasudung`=`soluotdasudung`-1 WHERE magiamgia = ?');
        $stmt->bindValue(1, $magiamgia);
        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
    }
}
?>