<?php
require_once 'configs/database.php';
class DocgiaModal{
    private $madg;
    private $hovaten;
    private $gioitinh;
    private $namsinh;
    private $nghenghiep;
    private $ngaycapthe;
    private $ngayhethan;
    private $diachi;

    public function getAllBD(){
        $conn = $this->connectDb();
        $sql = "SELECT * FROM docgia";
        $result = mysqli_query($conn, $sql);
        $mang_dg = [];
        if(mysqli_num_rows($result)>0){
            $mang_dg = mysqli_fetch_all($result, MYSQLI_ASSOC);
        }
        return $mang_dg;
    }

    public function connectDb() {
        $connection = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
        if (!$connection) {
            die("Không thể kết nối. Lỗi: " .mysqli_connect_error());
        }

        return $connection;
    }
    public function closeDb($connection = null) {
        mysqli_close($connection);
    }
    public function insert($docgia = []) {
        $connection = $this->connectDb();
        //tạo và thực thi truy vấn
        $queryInsert = "INSERT INTO docgia (hovaten, gioitinh, namsinh, nghenghiep, ngaycapthe, ngayhethan, diachi)
        VALUES ('{$docgia['hoVaTen']}', '{$docgia['gioiTinh']}', '{$docgia['namSinh']}', '{$docgia['ngheNghiep']}', '{$docgia['ngayCapThe']}','{$docgia['ngayHetHan']}','{$docgia['diaChi']}')";
        $isInsert = mysqli_query($connection, $queryInsert);
        $this->closeDb($connection);
        return $isInsert;
    }
    public function getDocGiaById($maDG = null) {
        $connection = $this->connectDb();
        $querySelect = "SELECT * FROM docgia WHERE madg={$maDG}";
        $results = mysqli_query($connection, $querySelect);
        $dgArr = [];
        if (mysqli_num_rows($results) > 0) {
            $dg = mysqli_fetch_all($results, MYSQLI_ASSOC);
            $dgArr = $dg[0];
        }
        $this->closeDb($connection);

        return $dgArr;
    }
    public function update($dg = []) {
        $connection = $this->connectDb();
        $queryUpdate = "UPDATE docgia 
        SET hovaten = '{$dg['hoVaTen']}', gioitinh = '{$dg['gioiTinh']}', namsinh = '{$dg['namSinh']}', nghenghiep = '{$dg['ngheNghiep']}', ngaycapthe = '{$dg['ngayCapThe']}', ngayhethan = '{$dg['ngayHetHan']}', diachi = '{$dg['diaChi']}'  WHERE maDG = {$dg['maDG']}";
        $isUpdate = mysqli_query($connection, $queryUpdate);
        $this->closeDb($connection);

        return $isUpdate;
    }
    public function delete($maDG = null) {
        $connection = $this->connectDb();

        $queryDelete = "DELETE FROM docgia WHERE madg = {$maDG}";
        $isDelete = mysqli_query($connection, $queryDelete);

        $this->closeDb($connection);

        return $isDelete;
    }
}
?>