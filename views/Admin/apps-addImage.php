<?php
/*
$id_thuonghieu = "ABC";
$id_nuochoa = "123";
$folder_name = "../BTL_PTPM/images/".$id_thuonghieu."/";
$allowTypes = array('jpg','png','jpeg','pdf');
$link = "images/".$id_thuonghieu."/";
if (!file_exists($folder_name)) {
    mkdir($folder_name, 0777, true);
}
$check = 0;
if(!empty($_FILES)){
    $folder_name .= $id_nuochoa . "/";
    $link .= $id_nuochoa . "/";
    if (!file_exists($folder_name)) {
        mkdir($folder_name, 0777, true);
    }
    $files = array_filter($_FILES['file']['name']);
    $total_count = count($_FILES['file']['name']);
    for ($i = 0; $i < $total_count; $i++) {
        $newFilePath = $folder_name . $id_nuochoa."_".$i.".".explode("/", $_FILES['file']['type'][$i])[1];
        $new_link = $link . $id_nuochoa."_".$i.".".explode("/", $_FILES['file']['type'][$i])[1];
        $fileType = pathinfo($newFilePath, PATHINFO_EXTENSION);
        if(in_array($fileType, $allowTypes)){
            if($_FILES['file']['size'][$i] <= 5*1024*1024)
            $tmpFilePath = $_FILES['file']['tmp_name'][$i];
            if ($tmpFilePath != "") {
                if (move_uploaded_file($tmpFilePath, $newFilePath)) {
                    $check++;
                    echo $new_link."\n";
                }
            }
        }
    }
    if($check==$total_count){
        
    }
}
*/
?>