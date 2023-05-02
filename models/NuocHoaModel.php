<?php
if(!isset($_SESSION)) {
    session_start();
}
require_once 'configs/database.php';
require_once 'models/Model.php';
class NuocHoaModel extends Model{

    function getNuocHoaSanPham($gioitinh){
        $dbh = $this->connectDb();
        $sql = "SELECT t1.*, (SELECT max(gia_ban) from `tb_gianuochoa` t4 where t1.id_nuochoa = t4.id_nuochoa GROUP by t4.id_nuochoa) as max_gia,
                (SELECT min(gia_ban) from `tb_gianuochoa` t4 where t1.id_nuochoa = t4.id_nuochoa GROUP by t4.id_nuochoa) as min_gia,
                (SELECT img_link from `tb_anhnuochoa` t4 where t1.id_nuochoa = t4.id_nuochoa order by id_anh ASC limit 1, 1) as img_link
                FROM `tb_nuochoa` t1
                INNER JOIN `tb_thuonghieu` t2 on t1.id_thuonghieu = t2.id_thuonghieu and t2.status = 0
                INNER JOIN `tb_nhacungcap` t3 on t1.id_nhacungcap = t3.id_nhacungcap and t3.status = 0
                where t1.gioitinh = ? and t1.status = 0 LIMIT 20";
        $stmt = $dbh->prepare($sql);
        $stmt->bindValue(1, $gioitinh);
        if($stmt->execute()){
            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $data;
        }else{
            return false;
        }
    }

    function getNH($column, $filter){
        $dbh = $this->connectDb();
        $sql = "SELECT t1.id_nuochoa, t1.ten_nuochoa, t1.gioitinh, t1.id_thuonghieu, t1.ngaybat_dauban, t1.danhgia,
        (SELECT max(gia_ban) from `tb_gianuochoa` t4 where t1.id_nuochoa = t4.id_nuochoa GROUP by t4.id_nuochoa) as max_gia,
        (SELECT min(gia_ban) from `tb_gianuochoa` t4 where t1.id_nuochoa = t4.id_nuochoa GROUP by t4.id_nuochoa) as min_gia,
        (SELECT img_link from `tb_anhnuochoa` t4 where t1.id_nuochoa = t4.id_nuochoa order by id_anh ASC limit 1, 1) as img_link
        FROM `tb_nuochoa` t1
        INNER JOIN `tb_thuonghieu` t2 on t1.id_thuonghieu = t2.id_thuonghieu and t2.status = 0
        INNER JOIN `tb_nhacungcap` t3 on t1.id_nhacungcap = t3.id_nhacungcap and t3.status = 0
        where t1.".$column." = ? and t1.status = 0";
        $stmt = $dbh->prepare($sql);
        $stmt->bindValue(1, $filter);
        if($stmt->execute()){
            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        echo json_encode(array("data" => $data));
    }
    function getNuocHoa($id_nuochoa){
        $dbh = $this->connectDb();
        $sql = "SELECT t1.id_nuochoa, t1.ten_nuochoa, IF(t1.gioitinh = 0, 'Nam', IF(t1.gioitinh = 1, 'Nữ', 'Unisex')) as gioitinh, t2.ten_thuonghieu, t1.xuatxu, t1.mota
        FROM `tb_nuochoa` t1
        INNER JOIN `tb_thuonghieu` t2 on t1.id_thuonghieu = t2.id_thuonghieu and t2.status = 0
        INNER JOIN `tb_nhacungcap` t3 on t1.id_nhacungcap = t3.id_nhacungcap and t3.status = 0
        where t1.id_nuochoa = ? and t1.status = 0";
        $stmt = $dbh->prepare($sql);
        $stmt->bindValue(1, $id_nuochoa);
        if($stmt->execute()){
            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        echo json_encode(array("data" => $data));
    }

    function getALL(){
        $dbh = $this->connectDb();
        $sql = "SELECT t1.id_nuochoa, t1.ten_nuochoa, t1.gioitinh, t1.id_thuonghieu, t1.ngaybat_dauban, t1.danhgia,
        (SELECT max(gia_ban) from `tb_gianuochoa` t4 where t1.id_nuochoa = t4.id_nuochoa GROUP by t4.id_nuochoa) as max_gia,
        (SELECT min(gia_ban) from `tb_gianuochoa` t4 where t1.id_nuochoa = t4.id_nuochoa GROUP by t4.id_nuochoa) as min_gia,
        (SELECT img_link from `tb_anhnuochoa` t4 where t1.id_nuochoa = t4.id_nuochoa order by id_anh ASC limit 1, 1) as img_link
        FROM `tb_nuochoa` t1
        INNER JOIN `tb_thuonghieu` t2 on t1.id_thuonghieu = t2.id_thuonghieu and t2.status = 0
        INNER JOIN `tb_nhacungcap` t3 on t1.id_nhacungcap = t3.id_nhacungcap and t3.status = 0
        where t1.status = 0";
        $stmt = $dbh->prepare($sql);
        if($stmt->execute()){
            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        echo json_encode(array("data" => $data));
    }

    function getAnhNuocHoa($id_nuochoa){
        $dbh = $this->connectDb();
        $sql = "SELECT * FROM `tb_anhnuochoa` WHERE id_nuochoa = ? ORDER BY img_link ASC";
        $stmt = $dbh->prepare($sql);
        $stmt->bindValue(1, $id_nuochoa);
        if($stmt->execute()){
            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        echo json_encode(array("data" => $data));
    }

    function getGiaNuocHoa($id_nuochoa){
        $dbh = $this->connectDb();
        $sql = "SELECT t1.dungtich, t1.soluong, t1.gia_ban FROM `tb_gianuochoa` t1 WHERE id_nuochoa = ? order by dungtich asc";
        $stmt = $dbh->prepare($sql);
        $stmt->bindValue(1, $id_nuochoa);
        if($stmt->execute()){
            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        echo json_encode(array("data" => $data));
    }

    function getBaiVietPhanTrang($phanloai){
        $dbh = $this->connectDb();
        $sql = "SELECT t1.*, (SELECT img_link from tb_doanvan t2 where t1.id_baiviet_blog = t2.id AND img_link IS NOT NULL ORDER BY t2.sothutu ASC limit 0, 1) as img_link FROM `tb_kienthuc_blog` t1 WHERE t1.phanloai = ?";
        $stmt = $dbh->prepare($sql);
        $stmt->bindValue(1, $phanloai);
        if($stmt->execute()){
            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        echo json_encode(array("data" => $data));
    }

    function queryNuocHoa($query){
        $query = "%".$query."%";
        $dbh = $this->connectDb();
        $sql = "SELECT t1.id_nuochoa, t1.ten_nuochoa, t1.gioitinh, t1.id_thuonghieu, t1.ngaybat_dauban, t1.danhgia,
        (SELECT max(gia_ban) from `tb_gianuochoa` t4 where t1.id_nuochoa = t4.id_nuochoa GROUP by t4.id_nuochoa) as max_gia,
        (SELECT min(gia_ban) from `tb_gianuochoa` t4 where t1.id_nuochoa = t4.id_nuochoa GROUP by t4.id_nuochoa) as min_gia,
        (SELECT img_link from `tb_anhnuochoa` t4 where t1.id_nuochoa = t4.id_nuochoa order by id_anh ASC limit 1, 1) as img_link
        FROM `tb_nuochoa` t1
        INNER JOIN `tb_thuonghieu` t2 on t1.id_thuonghieu = t2.id_thuonghieu and t2.status = 0
        INNER JOIN `tb_nhacungcap` t3 on t1.id_nhacungcap = t3.id_nhacungcap and t3.status = 0
        where t1.ten_nuochoa LIKE ? and t1.status = 0";
        $stmt = $dbh->prepare($sql);
        $stmt->bindValue(1, $query);
        if($stmt->execute()){
            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        echo json_encode(array("data" => $data));
    }

    function getDanhGia($id_nuochoa){
        $dbh = $this->connectDb();
        $sql = "SELECT t1.id_nuochoa, t1.hoten, t1.noidungdanhgia, t1.xephang, t1.ngaydanhgia FROM `tb_danhgia` t1 WHERE t1.id_nuochoa = ? order by t1.ngaydanhgia desc";
        $stmt = $dbh->prepare($sql);
        $stmt->bindValue(1, $id_nuochoa);
        if($stmt->execute()){
            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        echo json_encode(array("data" => $data));
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

    function getBaiVietTrangChu($phanloai){
        $dbh = $this->connectDb();
        $sql = "SELECT t1.id_baiviet_blog, t1.tieude, t1.ngaydang, t1.mota, t1.phanloai, (SELECT img_link from tb_doanvan t2 where t1.id_baiviet_blog = t2.id AND img_link IS NOT NULL ORDER BY t2.sothutu ASC limit 0, 1) as img_link FROM `tb_kienthuc_blog` t1 WHERE t1.phanloai = ? order by t1.ngaydang DESC limit 15";
        $stmt = $dbh->prepare($sql);
        $stmt->bindValue(1, $phanloai);
        if($stmt->execute()){
            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $data;
        }else{
            return false;
        }
    }

    function getBaiViet($phanloai){
        $dbh = $this->connectDb();
        $sql = "SELECT t1.id_baiviet_blog, t1.tieude, t1.ngaydang, t1.mota, t1.phanloai, (SELECT img_link from tb_doanvan t2 where t1.id_baiviet_blog = t2.id AND img_link IS NOT NULL ORDER BY t2.sothutu ASC limit 0, 1) as img_link FROM `tb_kienthuc_blog` t1 WHERE t1.phanloai = ?
        order by t1.ngaydang DESC";
        $stmt = $dbh->prepare($sql);
        $stmt->bindValue(1, $phanloai);
        if($stmt->execute()){
            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $data;
        }else{
            return false;
        }
    }
    function getBaiVietNoiBat($phanloai){
        $dbh = $this->connectDb();
        $sql = "SELECT t1.id_baiviet_blog, t1.tieude, t1.ngaydang, t1.mota, t1.phanloai, (SELECT img_link from tb_doanvan t2 where t1.id_baiviet_blog = t2.id AND img_link IS NOT NULL ORDER BY t2.sothutu ASC limit 0, 1) as img_link FROM `tb_kienthuc_blog` t1 WHERE t1.phanloai = ?
        order by t1.soluongnguoixem DESC limit 3";
        $stmt = $dbh->prepare($sql);
        $stmt->bindValue(1, $phanloai);
        if($stmt->execute()){
            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $data;
        }else{
            return false;
        }
    }
    function updateViewer($id_baiviet){
        $dbh = $this->connectDb();
        $sql = "UPDATE tb_kienthuc_blog SET soluongnguoixem=soluongnguoixem+1 WHERE id_baiviet_blog = ?";
        $stmt = $dbh->prepare($sql);
        $stmt->bindValue(1, $id_baiviet);
        return $stmt->execute();
    }
}
?>