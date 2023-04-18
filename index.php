<?php
    $controller = isset($_GET['controller']) ? $_GET['controller'] : 'nuochoa';
    $action     = isset($_GET['action']) ? $_GET['action'] : 'index';
    $controller = ucfirst($controller);
    $fileController = $controller . "Controller.php";
    $pathController = "controllers/$fileController";
    if (!file_exists($pathController)) {
        header("location: index.php?controller=error"); //Nếu đoạn này xảy ra, chương trình dừng thực hiện
        die();
    }
    require_once "$pathController";
    $classController = $controller."Controller";
    $object = new $classController();
    if (!method_exists($object, $action)) {
        header("location: index.php?controller=error"); //Nếu đoạn này xảy ra, chương trình dừng thực hiện //Kiểm tra action có tồn tại trong Controller ko
        die();
    }
    $object->$action();
?>