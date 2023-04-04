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
}
?>