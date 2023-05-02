<?php
require("views/template/header.php");
?>
<head>
    <title>Blog</title>
    <link rel="stylesheet" href="style/pagination.css">
</head>
<main class="bg-white">
    <div class="container-fluid" style="background-color: #F9F9F9">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php" class="text-decoration-none p-14 text-dark">Trang chủ</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><span class="p-14 text-dark">Blog</span></li>
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
                        <tr><td class="text-uppercase" style="font-weight: bold;">Nổi bật</td></tr>
                        <tr>
                            <td>
                                <?php
                                    foreach($blognoibat as $item){
                                ?>
                                <a class="row text-black" href="index.php?controller=NuocHoa&action=BaiViet&id_baiviet=<?php echo $item['id_baiviet_blog'] ?>">
                                    <div class="col-md-5">
                                        <img src="<?php echo $item['img_link'] ?>" alt="" style="object-fit:fill; height: auto;">
                                    </div>
                                    <div class="col-md-7">
                                        <p class="p-12 mb-0" data-toggle="tooltip" title="<?php echo $item['tieude'] ?>"><?php echo (strlen($item['tieude'])>40)? substr($item['tieude'],0, 52)."...":$item['tieude']?></p>
                                        <p class="p-12"><i><?php echo $item['ngaydang'] ?></i></p>
                                    </div>
                                </a>
                                <?php
                                    }
                                ?>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-md-9 border">
                <div class="row mt-2">
                    <h5>Blog</h5>
                    <div id="pagination-container"></div>
                    <div id="myList" class="container">
                        
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</main>
<?php
require("views/template/footer.php");
?>
<script src="js/pagination.js"></script>
<script src="js/moment.js"></script>
<script src="js/kienThuc.js"></script>