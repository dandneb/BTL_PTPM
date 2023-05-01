<?php
require("views/template/header.php");
?>

<head>
    <title>Trang chủ</title>
    <style>
        @media (min-width: 992px) {
            .img-thongtin {
                height: 149px;
                width: auto;
                object-fit: cover;
            }
        }
    </style>
    <link rel="stylesheet" href="style\splide-core.min.css">
    <link rel="stylesheet" href="style\splide.min.css">
    <link rel="stylesheet" href="style\ThongTin.css">
</head>
<main style="margin-bottom: 100px" class="main-home">
    <a class="swiper mySwiper" href="">
        <div class="swiper-wrapper">
            <div class="swiper-slide" data-swiper-autoplay="5000"><img src="images/carousel/slider_1.webp" class="d-block w-100" alt="..." style="width: 1106px;"></div>
            <div class="swiper-slide" data-swiper-autoplay="5000"><img src="images/carousel/slider_2.webp" class="d-block w-100" alt="..." style="width: 1106px;"></div>
            <div class="swiper-slide" data-swiper-autoplay="5000"><img src="images/carousel/slider_3.webp" class="d-block w-100" alt="..." style="width: 1106px;"></div>
        </div>
        <div class="swiper-pagination"></div>
    </a>
    <div class="container mt-4 ps-0 pe-0 border">
        <a class="card text-decoration-none" href="index.php?controller=nuochoa&action=sanpham&gioitinh=Nam">
            <div class="card-body bg-success">
                <p class="card-text p-15-bold text-white">NƯỚC HOA NAM</p>
            </div>
            <div style="position: relative;">
                <div class="box">
                    <img src="images/nuocHoaNam/sec_group_product_banner_1.jpg" class="" alt="...">
                </div>
            </div>
        </a>
        <div class="row" style="width: 100%; margin: 0px">
            <div class="swiper slide-product1" style="background-color: #FFF">
                <div class="swiper-wrapper">

                    <?php
                    for ($i = 0; $i < count($nuocHoaNam) - 1; $i += 2) {
                        $item1 = $nuocHoaNam[$i];
                        $item2 = $nuocHoaNam[$i + 1];
                    ?>
                        <div class="swiper-slide">
                            <div class="card rounded-0 pduct">
                                <a href="index.php?controller=NuocHoa&action=ThongTin&id_nuochoa=<?php echo $item1['id_nuochoa'] ?>">
                                    <img src="<?php echo $item1['img_link'] ?>" alt="" class="product-img">
                                </a>
                                <div class="card-body">
                                    <a href="index.php?controller=NuocHoa&action=ThongTin&id_nuochoa=<?php echo $item1['id_nuochoa'] ?>">
                                        <p class="card-text p-14-bold title-product text-black"><?php echo $item1['ten_nuochoa'] ?></p>
                                    </a>
                                    <?php
                                    $rate_1 = round($item1['danhgia']);
                                    echo '<div class="vote">';
                                    for($j = 1; $j <= $rate_1; $j++){
                                    ?>
                                    <i class="bi bi-star-fill text-warning"></i>
                                    <?php
                                    }
                                    if($rate_1 < 5){
                                        for($j = $rate_1+1; $j <= 5; $j++){
                                            ?>
                                        <i class="bi bi-star text-warning"></i>
                                            <?php
                                        }
                                    }
                                    echo "</div>";
                                    ?>
                                    <div>
                                        <div class="product-price p-14-bold text-success">
                                            <?php echo $nHModel->ps_price($nHModel->getPrice('min', $item1['id_nuochoa'])) . ' - ' .
                                                $nHModel->ps_price($nHModel->getPrice('max', $item1['id_nuochoa']));
                                            ?>
                                        </div>
                                        <div class="product-menu hidden-menu">
                                            <a href="index.php?controller=NuocHoa&action=ThongTin&id_nuochoa=<?php echo $item1['id_nuochoa'] ?>"><button class="btn-menu"><i class="bi bi-cart-plus text-success"></i></button></a>
                                            <button class="btn-menu xemThongTin" value="<?php echo $item1['id_nuochoa'] ?>" data-bs-toggle="modal" data-bs-target="#thongTinSanPham"><i class="bi bi-eye text-success"></i></button>
                                            <?php
                                            if (isset($_SESSION['LoginOK'])) {
                                            ?>
                                                <button class="btn-menu addYeuThich" value="<?php echo $item1['id_nuochoa'] ?>" type="button" data-bs-toggle="modal" data-bs-target="#addYeuThichSuccess"><i class="bi bi-heart text-success"></i></button>
                                            <?php
                                            } else {
                                                echo '<a href="index.php?controller=KhachHang&action=DangNhap&yeuthich="><button class="btn-menu"><i class="bi bi-heart text-success"></i></button></a>';
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card rounded-0 pduct">
                                <a href="index.php?controller=NuocHoa&action=ThongTin&id_nuochoa=<?php echo $item2['id_nuochoa'] ?>">
                                    <img src="<?php echo $item2['img_link'] ?>" alt="" class="product-img">
                                </a>
                                <div class="card-body">
                                    <a href="index.php?controller=NuocHoa&action=ThongTin&id_nuochoa=<?php echo $item2['id_nuochoa'] ?>">
                                        <p class="card-text p-14-bold title-product text-black"><?php echo $item2['ten_nuochoa'] ?></p>
                                    </a>
                                    <?php
                                    $rate_2 = round($item2['danhgia']);
                                    echo '<div class="vote">';
                                    for($k = 1; $k <= $rate_2; $k++){
                                    ?>
                                    <i class="bi bi-star-fill text-warning"></i>
                                    <?php
                                    }
                                    if($rate_2 < 5){
                                        for($k = $rate_2+1; $k <= 5; $k++){
                                            ?>
                                        <i class="bi bi-star text-warning"></i>
                                            <?php
                                        }
                                    }
                                    echo "</div>";
                                    ?>
                                    <div>
                                        <div class="product-price p-14-bold text-success">
                                            <?php
                                            echo number_format($item1['min_gia'], 0, ",", ".") . " ₫ - " . number_format($item1['max_gia'], 0, ",", ".") . " ₫";
                                            ?>
                                        </div>
                                        <div class="product-menu hidden-menu">
                                            <a href="index.php?controller=NuocHoa&action=ThongTin&id_nuochoa=<?php echo $item2['id_nuochoa'] ?>"><button class="btn-menu"><i class="bi bi-cart-plus text-success"></i></button></a>
                                            <button class="btn-menu xemThongTin" value="<?php echo $item2['id_nuochoa'] ?>" data-bs-toggle="modal" data-bs-target="#thongTinSanPham"><i class="bi bi-eye text-success"></i></button>
                                            <?php
                                            if (isset($_SESSION['LoginOK'])) {
                                            ?>
                                                <button class="btn-menu addYeuThich" value="<?php echo $item2['id_nuochoa'] ?>" type="button" data-bs-toggle="modal" data-bs-target="#addYeuThichSuccess"><i class="bi bi-heart text-success"></i></button>
                                            <?php
                                            } else {
                                                echo '<a href="index.php?controller=KhachHang&action=DangNhap&yeuthich="><button class="btn-menu"><i class="bi bi-heart text-success"></i></button></a>';
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                </div>
                <div class="swiper-button-next next1"></div>
                <div class="swiper-button-prev prev1"></div>
                <div class="swiper-pagination pagination1"></div>
            </div>
            <!-- <div class="col-2 p-0">

            </div> -->
        </div>
        <div class="row">

        </div>
        <div class="row">
            <div class="d-flex justify-content-center">
                <button type="button" class="btn_xemThem bg-success text-white border-0">
                    <a class="d-flex justify-content-center text-white" href="index.php?controller=nuochoa&action=sanpham&gioitinh=Nam"><i class="bi bi-arrow-right-square" style="margin-top: 3px;"></i><span class="ms-1">Xem tất cả</span></a>
                </button>
            </div>
        </div>
    </div>

    <div class="container mt-5 border ps-0 pe-0">
        <a class="card text-decoration-none" href="index.php?controller=nuochoa&action=sanpham&gioitinh=Nu">
            <div class="card-body bg-success">
                <p class="card-text p-15-bold text-white">NƯỚC HOA NỮ</p>
            </div>
            <div style="position: relative;">
                <div class="box">
                    <img src="images\nuocHoaNu\sec_group_product_banner_2.webp" class="" alt="...">
                </div>
            </div>
        </a>
        <div class="row" style="width: 100%; margin: 0px">
            <div class="swiper slide-product2">
                <div class="swiper-wrapper">
                    <?php
                    for ($i = 0; $i < count($nuocHoaNu) - 1; $i += 2) {
                        $item1 = $nuocHoaNu[$i];
                        $item2 = $nuocHoaNu[$i + 1];
                    ?>
                        <div class="swiper-slide">
                            <div class="card rounded-0 pduct">
                                <a href="index.php?controller=NuocHoa&action=ThongTin&id_nuochoa=<?php echo $item1['id_nuochoa'] ?>">
                                    <img src="<?php echo $item1['img_link'] ?>" alt="" class="product-img">
                                </a>
                                <div class="card-body">
                                    <a href="index.php?controller=NuocHoa&action=ThongTin&id_nuochoa=<?php echo $item1['id_nuochoa'] ?>">
                                        <p class="card-text p-14-bold title-product text-black"><?php echo $item1['ten_nuochoa'] ?></p>
                                    </a>
                                    <?php
                                    $rate_1 = round($item1['danhgia']);
                                    echo '<div class="vote">';
                                    for($j = 1; $j <= $rate_1; $j++){
                                    ?>
                                    <i class="bi bi-star-fill text-warning"></i>
                                    <?php
                                    }
                                    if($rate_1 < 5){
                                        for($j = $rate_1+1; $j <= 5; $j++){
                                            ?>
                                        <i class="bi bi-star text-warning"></i>
                                            <?php
                                        }
                                    }
                                    echo "</div>";
                                    ?>
                                    <div>
                                        <div class="product-price p-14-bold text-success">
                                            <?php
                                            echo number_format($item1['min_gia'], 0, ",", ".") . " ₫ - " . number_format($item1['max_gia'], 0, ",", ".") . " ₫";
                                            ?>
                                        </div>
                                        <div class="product-menu hidden-menu">
                                            <a href="index.php?controller=NuocHoa&action=ThongTin&id_nuochoa=<?php echo $item1['id_nuochoa'] ?>"><button class="btn-menu"><i class="bi bi-cart-plus text-success"></i></button></a>
                                            <button class="btn-menu xemThongTin" value="<?php echo $item1['id_nuochoa'] ?>" data-bs-toggle="modal" data-bs-target="#thongTinSanPham"><i class="bi bi-eye text-success"></i></button>
                                            <?php
                                            if (isset($_SESSION['LoginOK'])) {
                                            ?>
                                                <button class="btn-menu addYeuThich" value="<?php echo $item1['id_nuochoa'] ?>" type="button" data-bs-toggle="modal" data-bs-target="#addYeuThichSuccess"><i class="bi bi-heart text-success"></i></button>
                                            <?php
                                            } else {
                                                echo '<a href="index.php?controller=KhachHang&action=DangNhap&yeuthich="><button class="btn-menu"><i class="bi bi-heart text-success"></i></button></a>';
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card rounded-0 pduct">
                                <a href="index.php?controller=NuocHoa&action=ThongTin&id_nuochoa=<?php echo $item2['id_nuochoa'] ?>">
                                    <img src="<?php echo $item2['img_link'] ?>" alt="" class="product-img">
                                </a>
                                <div class="card-body">
                                    <a href="index.php?controller=NuocHoa&action=ThongTin&id_nuochoa=<?php echo $item2['id_nuochoa'] ?>">
                                        <p class="card-text p-14-bold title-product text-black"><?php echo $item2['ten_nuochoa'] ?></p>
                                    </a>
                                    <?php
                                    $rate_2 = round($item2['danhgia']);
                                    echo '<div class="vote">';
                                    for($k = 1; $k <= $rate_2; $k++){
                                    ?>
                                    <i class="bi bi-star-fill text-warning"></i>
                                    <?php
                                    }
                                    if($rate_2 < 5){
                                        for($k = $rate_2+1; $k <= 5; $k++){
                                            ?>
                                        <i class="bi bi-star text-warning"></i>
                                            <?php
                                        }
                                    }
                                    echo "</div>";
                                    ?>
                                    <div>
                                        <div class="product-price p-14-bold text-success">
                                            <?php echo $nHModel->ps_price($nHModel->getPrice('min', $item2['id_nuochoa'])) . ' - ' .
                                                $nHModel->ps_price($nHModel->getPrice('max', $item2['id_nuochoa']));
                                            ?>
                                        </div>
                                        <div class="product-menu hidden-menu">
                                            <a href="index.php?controller=NuocHoa&action=ThongTin&id_nuochoa=<?php echo $item2['id_nuochoa'] ?>"><button class="btn-menu"><i class="bi bi-cart-plus text-success"></i></button></a>
                                            <button class="btn-menu xemThongTin" value="<?php echo $item2['id_nuochoa'] ?>" data-bs-toggle="modal" data-bs-target="#thongTinSanPham"><i class="bi bi-eye text-success"></i></button>
                                            <?php
                                            if (isset($_SESSION['LoginOK'])) {
                                            ?>
                                                <button class="btn-menu addYeuThich" value="<?php echo $item2['id_nuochoa'] ?>" type="button" data-bs-toggle="modal" data-bs-target="#addYeuThichSuccess"><i class="bi bi-heart text-success"></i></button>
                                            <?php
                                            } else {
                                                echo '<a href="index.php?controller=KhachHang&action=DangNhap&yeuthich="><button class="btn-menu"><i class="bi bi-heart text-success"></i></button></a>';
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                </div>
                <div class="swiper-button-next next2"></div>
                <div class="swiper-button-prev prev2"></div>
                <div class="swiper-pagination pagination2"></div>
            </div>
        </div>
        <div class="row">
            <div class="d-flex justify-content-center">
                <button type="button" class="btn_xemThem bg-success text-white border-0">
                    <a class="d-flex justify-content-center text-white" href="index.php?controller=nuochoa&action=sanpham&gioitinh=Nu"><i class="bi bi-arrow-right-square" style="margin-top: 3px;"></i><span class="ms-1">Xem tất cả</span></a>
                </button>
            </div>
        </div>
    </div>

    <div class="container mt-5 border ps-0 pe-0">
        <a class="card text-decoration-none" href="index.php?controller=nuochoa&action=sanpham&gioitinh=Unisex">
            <div class="card-body bg-success">
                <p class="card-text p-15-bold text-white">NƯỚC HOA UNISEX</p>
            </div>
            <div style="position: relative;">
                <div class="box">
                    <img src="images\Unisex\sec_group_product_banner_3.webp" class="" alt="...">
                </div>
            </div>
        </a>
        <div class="row" style="width: 100%; margin: 0px">
            <div class="swiper slide-product3">
                <div class="swiper-wrapper">

                    <?php
                    for ($i = 0; $i < count($nuocHoaUnisex) - 1; $i += 2) {
                        $item1 = $nuocHoaUnisex[$i];
                        $item2 = $nuocHoaUnisex[$i + 1];
                    ?>
                        <div class="swiper-slide">
                            <div class="card rounded-0 pduct">
                                <a href="index.php?controller=NuocHoa&action=ThongTin&id_nuochoa=<?php echo $item1['id_nuochoa'] ?>">
                                    <img src="<?php echo $item1['img_link'] ?>" alt="" class="product-img">
                                </a>
                                <div class="card-body">
                                    <a href="index.php?controller=NuocHoa&action=ThongTin&id_nuochoa=<?php echo $item1['id_nuochoa'] ?>">
                                        <p class="card-text p-14-bold title-product text-black"><?php echo $item1['ten_nuochoa'] ?></p>
                                    </a>
                                    <?php
                                    $rate_1 = round($item1['danhgia']);
                                    echo '<div class="vote">';
                                    for($j = 1; $j <= $rate_1; $j++){
                                    ?>
                                    <i class="bi bi-star-fill text-warning"></i>
                                    <?php
                                    }
                                    if($rate_1 < 5){
                                        for($j = $rate_1+1; $j <= 5; $j++){
                                            ?>
                                        <i class="bi bi-star text-warning"></i>
                                            <?php
                                        }
                                    }
                                    echo "</div>";
                                    ?>
                                    <div>
                                        <div class="product-price p-14-bold text-success">
                                            <?php
                                            echo number_format($item1['min_gia'], 0, ",", ".") . " ₫ - " . number_format($item1['max_gia'], 0, ",", ".") . " ₫";
                                            ?>
                                        </div>
                                        <div class="product-menu hidden-menu">
                                            <a href="index.php?controller=NuocHoa&action=ThongTin&id_nuochoa=<?php echo $item1['id_nuochoa'] ?>"><button class="btn-menu"><i class="bi bi-cart-plus text-success"></i></button></a>
                                            <button class="btn-menu xemThongTin" value="<?php echo $item1['id_nuochoa'] ?>" data-bs-toggle="modal" data-bs-target="#thongTinSanPham"><i class="bi bi-eye text-success"></i></button>
                                            <?php
                                            if (isset($_SESSION['LoginOK'])) {
                                            ?>
                                                <button class="btn-menu addYeuThich" value="<?php echo $item1['id_nuochoa'] ?>" type="button" data-bs-toggle="modal" data-bs-target="#addYeuThichSuccess"><i class="bi bi-heart text-success"></i></button>
                                            <?php
                                            } else {
                                                echo '<a href="index.php?controller=KhachHang&action=DangNhap"><button class="btn-menu"><i class="bi bi-heart text-success"></i></button></a>';
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card rounded-0 pduct">
                                <a href="index.php?controller=NuocHoa&action=ThongTin&id_nuochoa=<?php echo $item2['id_nuochoa'] ?>">
                                    <img src="<?php echo $item2['img_link'] ?>" alt="" class="product-img">
                                </a>
                                <div class="card-body">
                                    <a href="index.php?controller=NuocHoa&action=ThongTin&id_nuochoa=<?php echo $item2['id_nuochoa'] ?>">
                                        <p class="card-text p-14-bold title-product text-black"><?php echo $item2['ten_nuochoa'] ?></p>
                                    </a>
                                    <?php
                                    $rate_2 = round($item2['danhgia']);
                                    echo '<div class="vote">';
                                    for($k = 1; $k <= $rate_2; $k++){
                                    ?>
                                    <i class="bi bi-star-fill text-warning"></i>
                                    <?php
                                    }
                                    if($rate_2 < 5){
                                        for($k = $rate_2+1; $k <= 5; $k++){
                                            ?>
                                        <i class="bi bi-star text-warning"></i>
                                            <?php
                                        }
                                    }
                                    echo "</div>";
                                    ?>
                                    <div>
                                        <div class="product-price p-14-bold text-success">
                                            <?php echo $nHModel->ps_price($nHModel->getPrice('min', $item2['id_nuochoa'])) . ' - ' .
                                                $nHModel->ps_price($nHModel->getPrice('max', $item2['id_nuochoa']));
                                            ?>
                                        </div>
                                        <div class="product-menu hidden-menu">
                                            <a href="index.php?controller=NuocHoa&action=ThongTin&id_nuochoa=<?php echo $item2['id_nuochoa'] ?>"><button class="btn-menu"><i class="bi bi-cart-plus text-success"></i></button></a>
                                            <button class="btn-menu xemThongTin" value="<?php echo $item2['id_nuochoa'] ?>" data-bs-toggle="modal" data-bs-target="#thongTinSanPham"><i class="bi bi-eye text-success"></i></button>
                                            <?php
                                            if (isset($_SESSION['LoginOK'])) {
                                            ?>
                                                <button class="btn-menu addYeuThich" value="<?php echo $item2['id_nuochoa'] ?>" type="button" data-bs-toggle="modal" data-bs-target="#addYeuThichSuccess"><i class="bi bi-heart text-success"></i></button>
                                            <?php
                                            } else {
                                                echo '<a href="index.php?controller=KhachHang&action=DangNhap&yeuthich="><button class="btn-menu"><i class="bi bi-heart text-success"></i></button></a>';
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                </div>
                <div class="swiper-button-next next3"></div>
                <div class="swiper-button-prev prev3"></div>
                <div class="swiper-pagination pagination3"></div>
            </div>
        </div>
        <div class="row">
            <div class="d-flex justify-content-center">
                <button type="button" class="btn_xemThem bg-success text-white border-0">
                    <a class="d-flex justify-content-center text-white" href="index.php?controller=nuochoa&action=sanpham&gioitinh=Unisex"><i class="bi bi-arrow-right-square" style="margin-top: 3px;"></i><span class="ms-1">Xem tất cả</span></a>
                </button>
            </div>
        </div>
    </div>
    <div class="container mt-5 bg-white" style="min-height:380px">
        <div class="d-flex justify-content-center">
            <h4 class="mt-2" style="border-bottom: 3px solid">THÔNG TIN</h4>
        </div>
        <div class="bd-container mt-3" style="background-color: #FFF">
            <div class="slide-container swiper" style="background-color: #FFF">
                <div class="slide-content1">
                    <div class="card-wrapper swiper-wrapper">
                        <?php
                        foreach ($kienthuc as $item) {
                        ?>
                            <a class="card-container swiper-slide text-decoration-none" href="index.php?controller=NuocHoa&action=BaiViet&id_baiviet=<?php echo $item['id_baiviet_blog'] ?>" style="text-align:start; color: black;" href="">
                                <div class="image-content">
                                    <span class="overlay"></span>
                                    <div class="card-image">
                                        <img src="<?php echo $item['img_link'] ?>" alt="" class="card-img img-thongtin" style="width: auto; height: 149px;">
                                    </div>
                                </div>
                                <div class="card-content d-flex flex-column justify-content-start mt-2">
                                    <p class="card-title p-14-bold"><?php echo $item['tieude'] ?></p>
                                    <?php
                                    $timestamp = strtotime($item['ngaydang']);
                                    $date = date("d/m/Y", $timestamp);
                                    ?>
                                    <span class="card-time p-12 ms-0 me-0 mt-2" style="opacity:0.5;">Đăng bởi PARFUMERIEVN - <?php echo $date ?></span>
                                    <p class="p-12 mt-2" data-toggle="tooltip" title="<?php echo $item['mota'] ?>"><?php echo (strlen($item['mota']) > 92) ? substr($item['mota'], 0, 92) : $item['mota'] ?></p>
                                </div>
                            </a>
                        <?php
                        }
                        ?>
                    </div>
                </div>
                <div class="swiper-button-next next4"></div>
                <div class="swiper-button-prev prev4"></div>
                <div class="swiper-pagination pagination4" style="bottom:-2px"></div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="addYeuThichSuccess" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content rounded-0">
                <div class="modal-body border-0 text-center" style="background-color: black; color: white; opacity: 0.9;">
                    <img src="images/ticket/check.png" id="imgNoticedYeuThich" alt="" style="max-height: 40px; max-width: 40px; margin: 0px auto 25px; display: block;">
                    <p class="noticedYeuThich">Thêm vào sản phẩm yêu thích thành công!</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="thongTinSanPham" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="noticed" style="display: none;">
                            <img src="images/ticket/check.png" id="imgNoticedGioHang" alt="" style="max-height: 16px; max-width: 16px; display: block; margin-right: 10px">
                        </div>
                        <div class="noticed" style="display: none;">
                            <span class="noticedGioHang p-16-bold mb-0"></span>
                        </div>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body row">
                    <div class="col-md-6">
                        <div class="container">
                            <div class="carousel-container position-relative row">
                                <!-- Sorry! Lightbox doesn't work - yet. -->
                                <div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="false">
                                    <div class="carousel-inner img-main">
                                        
                                    </div>
                                </div>

                                <!-- Carousel Navigation -->
                                <div id="carousel-thumbs" class="carousel slide" data-ride="carousel" data-interval="false">
                                    <div class="carousel-inner">
                                        <div class="carousel-item active">
                                            <div class="row mx-0 img-thumb-one">
                                                
                                            </div>
                                        </div>
                                        <div class="carousel-item">
                                            <div class="row mx-0 img-thumb-two">
                                                
                                            </div>
                                        </div>
                                    </div>
                                    <a class="carousel-control-prev" href="#carousel-thumbs" role="button" data-slide="prev" style="transform: translateX(-39%);">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="sr-only text-black">Previous</span>
                                    </a>
                                    <a class="carousel-control-next" href="#carousel-thumbs" role="button" data-slide="next" style="transform: translateX(39%);">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div>
                            <h2 class="title-head mb-1 ten_nuochoa" style="font-size: 18px;">AAA</h2>
                            <p class="p-14 m-0">Tình trạng: <span class="p-14-bold tinhtrang"></span></p>
                            <p class="p-14 m-0">Thương hiệu: <span class="p-14-bold ten_thuonghieu"></span></p>
                            <p class="p-14 m-0 mb-2">Loại sản phẩm: <span class="p-14-bold loaisanpham"></span></p>
                        </div>
                        <div class="border-bottom border-top">
                            <p class="price-information mt-2 mb-2 gia_ban"></p>
                        </div>
                        <div class="mt-2">
                            <span class="mota" style="font-family:Trebuchet MS,Helvetica,sans-serif; color:#42495B"></span>
                        </div>
                        <div>
                            <div class="swatch">
                                <p class="p-14-bold">Giới tính</p>
                                <div class="swatch-element">
                                    <input id="swatch-0-nam" type="radio" name="option-0" class="bk-product-property">
                                    <label class="border text-uppercase gioitinh" for="swatch-0-nam" style="position: relative;">
                                        
                                    </label>
                                </div>
                            </div>
                            <div class="swatch">
                                <div class="swatch-element">
                                    <p class="p-14-bold">Xuất xứ</p>
                                    <input id="swatch-1-anh" type="radio" name="option-1" class="bk-product-property">
                                    <label class="border text-uppercase xuatxu" for="swatch-1-anh" style="position: relative;">
                                        
                                    </label>
                                </div>
                            </div>
                            <div class="swatch" style="margin-top: 32px">
                                <p class="p-14-bold">Dung tích</p>
                                <div class="d-flex">
                                    <div class="swatch-element">
                                        <input id="swatch-2-chiet-10ml" type="radio" name="dungtich" class="bk-product-property dungtich">
                                        <label class="border chiet-10ml" for="swatch-2-chiet-10ml" style="position: relative;" data-toggle="tooltip" data-placement="top" title="<?php echo $gia_ban[0][0] ?>">
                                            
                                        </label>
                                    </div>
                                    <div class="swatch-element">
                                        <input id="swatch-2-chiet-20ml" type="radio" name="dungtich" class="bk-product-property dungtich">
                                        <label class="border chiet-20ml" for="swatch-2-chiet-20ml" style="position: relative;" data-toggle="tooltip" data-placement="top" title="<?php echo $gia_ban[1][0] ?>">
                                            
                                        </label>
                                    </div>
                                    <div class="swatch-element">
                                        <input id="swatch-2-fullbox-100ml" type="radio" name="dungtich" class="bk-product-property dungtich">
                                        <label class="border chiet-100ml" for="swatch-2-fullbox-100ml" style="position: relative;" data-toggle="tooltip" data-placement="top" title="<?php echo $gia_ban[2][0] ?>">
                                            
                                        </label>
                                    </div>
                                </div>
                                <div class="swatch gioHang">
                                    <p class="p-14-bold swatch">Số lượng</p>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <button class="btn" id="btn-reduceSoLuong" type="button" style="border-radius: 0; background-color: unset !important; border: 1px solid #F1F1F1;">-</button>
                                        </div>
                                        <input type="text" class="form-control" id="soluong" name="soluong" aria-describedby="basic-addon1" style="flex:none; width: 50px; border-left: 0; border-right: 0;" value="1">
                                        <div class="input-group-prepend">
                                            <button class="btn" id="btn-addSoLuong" type="button" style="border-radius: 0; background-color: unset !important; border: 1px solid #F1F1F1;">+</button>
                                        </div>
                                    </div>
                                    <span id="helpSoLuong" class="p-13"></span>
                                    <div class="container p-0">
                                        <button class="btn btn-success btn-lg btn-thongtin rounded-0 w-100" id="btn-addGioHang" type="button">
                                            <span class="txt-main">THÊM VÀO GIỎ HÀNG</span>
                                        </button>
                                    </div>
                                </div>
                                <div class="container p-0 mt-3 hethang">
                                    <button class="btn btn-success btn-lg btn-thongtin rounded-0 d-flex flex-column justify-content-center align-items-center" disabled type="button">
                                        <span class="txt-main text-uppercase">Hết hàng</span>
                                        <span class="p-14">Liên hệ 0888070308</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>
<script src="js/nuocHoa.js" id="index-js"></script>
<script src="js/splide.min.js" type="text/javascript"></script>
<script class="js-thongtin" src="https://cpwebassets.codepen.io/assets/common/stopExecutionOnTimeout-2c7831bb44f98c1391d6a4ffda0e1fd302503391ca806e7fcc7b9b87197aec26.js"></script>
<script class="js-thongtin" src="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.js"></script>
<script class="js-thongtin" src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.0/js/bootstrap.min.js"></script>
<script class="js-thongtin" src="https://kit.fontawesome.com/ad153db3f4.js"></script>
<!-- <script class="js-thongtin" src="js/thongTinNuocHoa.js"></script> -->
<script>
    var name = ".slide-product";
    var swiper_pagination = ".pagination";
    var swiper_button_prev = ".prev";
    var swiper_button_next = ".next";
    for (var i = 1; i < 4; i++) {
        var s = name + i;
        var swiper = new Swiper(s, {
            slidesPerView: 1,
            spaceBetween: 0,
            slidesPerGroup: 1,
            loop: false,
            loopFillGroupWithBlank: true,
            navigation: {
                nextEl: swiper_button_next + i,
                prevEl: swiper_button_prev + i,
            },
            breakpoints: {
                0: {
                    slidesPerView: 2,
                },
                768: {
                    slidesPerView: 3,
                },
                992: {
                    slidesPerView: 5,
                },
            },
        });
    }
    var swiper = new Swiper(".slide-content1", {
        slidesPerView: 1,
        spaceBetween: 30,
        slidesPerGroup: 1,
        loop: false,
        loopFillGroupWithBlank: true,
        pagination: {
            el: ".pagination4",
            clickable: true,
        },
        navigation: {
            nextEl: ".next4",
            prevEl: ".prev4",
        },
        breakpoints: {
            0: {
                slidesPerView: 1,
            },
            520: {
                slidesPerView: 2,
            },
            950: {
                slidesPerView: 4,
            },
        },
    });
</script>
<script>
    var swiper = new Swiper(".mySwiper", {
        spaceBetween: 30,
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
        autoplay: {
            delay: 10000,
        },
    });
    $('#myCarousel').carousel({
    interval: false
});
$('#carousel-thumbs').carousel({
    interval: false
});

// handles the carousel thumbnails
// https://stackoverflow.com/questions/25752187/bootstrap-carousel-with-thumbnails-multiple-carousel
$('[id^=carousel-selector-]').click(function() {
    var id_selector = $(this).attr('id');
    var id = parseInt(id_selector.substr(id_selector.lastIndexOf('-') + 1));
    $('#myCarousel').carousel(id);
});
// Only display 3 items in nav on mobile.
if ($(window).width() < 575) {
    $('#carousel-thumbs .row div:nth-child(4)').each(function() {
        var rowBoundary = $(this);
        $('<div class="row mx-0">').insertAfter(rowBoundary.parent()).append(rowBoundary.nextAll().addBack());
    });
    $('#carousel-thumbs .carousel-item .row:nth-child(even)').each(function() {
        var boundary = $(this);
        $('<div class="carousel-item">').insertAfter(boundary.parent()).append(boundary.nextAll().addBack());
    });
}
$(window).resize(function() {
    var windowWidth = $(window).width();
    if (windowWidth < 768) {
        console.log("OK");
        $('#carousel-selector-6').attr('id', 'carousel-selector-3');
    } else {
        $('#carousel-selector-3').attr('id', 'carousel-selector-6');
    }
})
// Hide slide arrows if too few items.
if ($('#carousel-thumbs .carousel-item').length < 2) {
    $('#carousel-thumbs [class^=carousel-control-]').remove();
    $('.machine-carousel-container #carousel-thumbs').css('padding', '0 5px');
}
// when the carousel slides, auto update
$('#myCarousel').on('slide.bs.carousel', function(e) {
    var id = parseInt($(e.relatedTarget).attr('data-slide-number'));
    $('[id^=carousel-selector-]').removeClass('selected');
    $('[id=carousel-selector-' + id + ']').addClass('selected');
});
// when user swipes, go next or previous
$('#myCarousel').swipe({
    fallbackToMouseEvents: true,
    swipeLeft: function(e) {
        $('#myCarousel').carousel('next');
    },
    swipeRight: function(e) {
        $('#myCarousel').carousel('prev');
    },
    allowPageScroll: 'vertical',
    preventDefaultEvents: false,
    threshold: 75
});

$('#myCarousel .carousel-item img').on('click', function(e) {
    var src = $(e.target).attr('data-remote');
    if (src) $(this).ekkoLightbox();
});
</script>
<?php
require("views/template/footer.php");
?>