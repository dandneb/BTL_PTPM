<?php
require("views/template/header.php");
?>
<head>
    <title>Blog</title>
    <style>
        .title-paragraph {
            font-size: 18px;
            font-family: Trebuchet MS, Helvetica, sans-serif;
            color: #323c3f;
            font-weight: bold;
            margin-top: 32px;
        }

        .paragraph {
            font-family: Trebuchet MS, Helvetica, sans-serif;
            font-size: 16px;
            color: #42495b;
            text-align: justify;
            margin-bottom: 15px;
        }

        strong {
            font-size: 16px;
            color: #1C1C1C;
            font-family: Trebuchet MS, Helvetica, sans-serif;
        }
    </style>
</head>
<main class="bg-white">
    <div class="container-fluid" style="background-color: #F9F9F9">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php" class="text-decoration-none p-14 text-dark">Trang chủ</a></li>
                    <li class="breadcrumb-item"><a href="<?php echo $baiviet['phanloai'] == 0 ? "index.php?controller=NuocHoa&action=KienThuc" : "index.php?controller=NuocHoa&action=Blog" ?>" class="text-decoration-none p-14 text-dark"><?php echo $baiviet['phanloai'] == 0 ? "Thông tin" : "Blog" ?></a></li>
                    <li class="breadcrumb-item active" aria-current="page"><span class="p-14 text-dark"><?php echo $baiviet['tieude'] ?></span></li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="container pb-3 mt-5">
        <div class="row">
            <div class="col-md-3">
                <table class="table table-bordered table-sidebar">
                    <tbody>
                        <tr><td class="text-uppercase" style="font-weight: bold;">Danh mục</td></tr>
                        <tr><td><a href="index.php" class="text-dark">Trang chủ</a></td></tr>
                        <tr><td><a href="index.php" class="text-dark">Giới thiệu</a></td></tr>
                        <tr><td><a href="index.php" class="text-dark">Thương hiệu</a></td></tr>
                        <tr><td><a href="index.php" class="text-dark">Nước hoa</a></td></tr>
                        <tr><td><a href="index.php" class="text-dark">Kiến thức</a></td></tr>
                        <tr><td><a href="index.php" class="text-dark">Blog</a></td></tr>
                        <tr><td><a href="index.php" class="text-dark">Liên hệ</a></td></tr>
                    </tbody>
                </table>
            </div>
            <div class="col-md-9 border">
                <div class="row mt-2">
                    <h4><?php echo $baiviet['tieude'] ?></h4>
                    <?php
                        $timestamp = strtotime($baiviet['ngaydang']);
                        $date = date("d/m/Y", $timestamp);
                    ?>
                    <p class="post-time text-uppercase p-3" style="font-size: 12px;color: #9b9b9b;margin: 0 10px 0 0;">Đăng bởi <b>PARFUMERIEVN</b> vào lúc <?php echo $date ?></p>
                    <p class="paragraph">
                        <?php echo $baiviet['mota']; ?>
                    </p>
                    <?php
                    foreach($doanvan as $item){
                    ?>
                    <div class="row">
                        <div class="col-md-12">
                            <p class="title-paragraph"><?php echo $item['tieude'] ?></p>
                            <?php
                            if(strpos($item['noidung'], "$&") === false){
                                $para = preg_split('/\r\n|\r|\n/', $item['noidung']);
                                //die(print_r($para));
                                if(count($para)<=1){
                            ?>
                            <p class="paragraph"><?php echo $item['noidung'] ?></p>
                            <?php
                                }else{
                                    for($i = 0; $i < count($para); $i++){
                            ?>
                            <p class="paragraph"><?php echo $para[$i] ?></p>
                            <?php
                                        if($i == 0){
                                            if($item['img_link'] != NULL){
                                                ?>
                                                <div class="d-flex justify-content-center mb-3">
                                                    <img src="<?php echo $item['img_link'] ?>" class="d-block h-100" alt="..." data-type="image" style="max-width: 600px">
                                                </div>
                                                <?php
                                            }
                                        }
                                    }
                                }
                            ?>
                            <?php
                            }else{
                                $str_new = explode("$", $item['noidung']);
                                foreach($str_new as $it){
                                    if($it[0] != "&"){
                            ?>
                                    <p class="paragraph"><?php echo $it ?></p>
                            <?php
                                    }else{
                                        $ul = substr($it, 1);
                                        $li = preg_split('/\r\n|\r|\n/', $ul);
                                        echo "<ul>";
                                        foreach($li as $l){
                                        ?>
                                        <li class="paragraph"><?php echo $l ?></li>
                                        <?php
                                        }
                                        echo "</ul>";
                                    }
                                }
                            }
                            ?>
                        </div>
                    </div>
                    <?php
                    }
                    ?>
                    <p class="title-paragraph">Có thể bạn quan tâm:</p>
                    <ul class = "ps-5">
                        <li class="paragraph"><a href="index.php?controller=NuocHoa&action=SanPham&gioitinh=Nam">Nước hoa Nam chính hãng</a></li>
                        <li class="paragraph"><a href="index.php?controller=NuocHoa&action=SanPham&gioitinh=Nu">Nước hoa Nữ chính hãng</a></li>
                        <li class="paragraph"><a href="index.php?controller=NuocHoa&action=SanPham&gioitinh=Unisex">Nước hoa Unisex chính hãng</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</main>
<?php
require("views/template/footer.php");
?>