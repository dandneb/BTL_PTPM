<?php
require_once '../../models/AdminModel.php';
$AdminModel = new AdminModel();
echo $AdminModel->getALLProducts();
?>