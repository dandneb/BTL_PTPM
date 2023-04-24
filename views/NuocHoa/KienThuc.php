<?php
require("views/template/header.php");
?>
<head>
    <title>Blog</title>
</head>
<main class="bg-white">
    <div class="container-fluid" style="background-color: #F9F9F9">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php" class="text-decoration-none p-14 text-dark">Trang chủ</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><span class="p-14 text-dark">Thông tin</span></li>
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
                                    foreach($baivietnoibat as $item){
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
                    <h5>Thông tin</h5>
                    <?php
                    foreach($kienthuc as $item){
                    ?>
                    <div class="col-md-12">
                        <a class="blog-item-thumbnail" href="index.php?controller=NuocHoa&action=BaiViet&id_baiviet=<?php echo $item['id_baiviet_blog'] ?>">
                            <img src="<?php echo $item['img_link'] ?>" alt="">
                        </a>
                        <div class="blog-items-main">
                            <div>
                                <a><h6><?php echo $item['tieude'] ?></h6></a>
                                <?php
                                $timestamp = strtotime($item['ngaydang']);
                                $date = date("d/m/Y", $timestamp);
                                ?>
                                <p class="post-time"><?php echo $date ?> - PARFUMERIEVN</p>
                            </div>
                            <p class="mt-3" data-toggle="tooltip" title="<?php echo $item['mota'] ?>"><?php echo substr($item['mota'], 0, 360)."..." ?></p>
                        </div>
                    </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</main>
<?php
require("views/template/footer.php");
?>