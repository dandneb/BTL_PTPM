<?php
require_once 'configs/database.php';
class Model{
    public function connectDb() {
        try{
            $dbh = new PDO("mysql:host=localhost;dbname=".DB_NAME, DB_USERNAME, DB_PASSWORD);
        }catch(PDOException $e){
            echo "Kết nối thất bại: " . $e->getMessage();
        }
        return $dbh;
    }
    public function closeDb($connection = null) {
        mysqli_close($connection);
    }
    function get($table, $condition = [], $value_condition = [], $logic = [], $orderby = ""){
        $dbh = $this->connectDb();
        $sql = "SELECT * FROM `".$table."`";
        #Chuẩn bị các điều kiện
        if(!empty($condition)){
            $sql.= " WHERE ";
            //Thêm các điều kiện
            for($i = 0; $i < count($condition); $i++){
                $sql .= "`".$condition[$i]."` = ? ".$logic[$i]." ";
            }
            $sql = trim($sql);
            $sql = substr($sql, 0, strlen($sql)-strlen($logic[count($logic)-1]));
        }
        $sql .= $orderby;
        
        //Thực thi
        $stmt = $dbh->prepare($sql);
        if(!empty($condition)){
            //Thêm các values điều kiện
            for($i = 0; $i < count($value_condition); $i++){
                $stmt->bindValue($i+1, $value_condition[$i]);
            }
        }
        if($stmt->execute()){
            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $data;
        }
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
        return $stmt->execute();
    }
    function update($table, $column = [], $value = [], $condition = [], $value_condition = [], $logic = []){
        $dbh = $this->connectDb();
        $sql = "UPDATE `".$table."` SET ";

        //Thêm các columns
        for($i = 0; $i < count($column); $i++){
            $sql .= "`".$column[$i]."` = ?, ";
        }
        $sql = trim($sql);
        $sql = substr($sql, 0, strlen($sql)-1);
        if(!empty($condition)){
            $sql .= " WHERE ";
            //Thêm các điều kiện
            for($i = 0; $i < count($condition); $i++){
                $sql .= "`".$condition[$i]."` = ? ".$logic[$i]." ";
            }
            $sql = trim($sql);
            $sql = substr($sql, 0, strlen($sql)-strlen($logic[count($logic)-1]));
        }
        
        
        //Thực thi
        $stmt = $dbh->prepare($sql);
        //Thêm các values update
        for($i = 0; $i < count($value); $i++){
            $stmt->bindValue($i+1, $value[$i]);
        }
        if(!empty($condition)){
            //Thêm các values điều kiện
            for($i = 0; $i < count($value_condition); $i++){
                $stmt->bindValue($i+count($value)+1, $value_condition[$i]);
            }
        }
        return $stmt->execute();
    }
    function delete($table, $condition = [], $value_condition = [], $logic = []){
        $dbh = $this->connectDb();
        $sql = "DELETE FROM `".$table."` WHERE ";
        #Chuẩn bị các điều kiện
        if(!empty($condition)){
            //Thêm các điều kiện
            for($i = 0; $i < count($condition); $i++){
                $sql .= "`".$condition[$i]."` = ? ".$logic[$i]." ";
            }
            $sql = trim($sql);
            $sql = substr($sql, 0, strlen($sql)-strlen($logic[count($logic)-1]));
        }
        
        //Thực thi
        $stmt = $dbh->prepare($sql);
        if(!empty($condition)){
            //Thêm các values điều kiện
            for($i = 0; $i < count($value_condition); $i++){
                $stmt->bindValue($i+1, $value_condition[$i]);
            }
        }
        return $stmt->execute();
    }
}
?>