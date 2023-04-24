<?php
require("views/template/header.php");
?>
<head>
    <title>Trang chủ</title>
    <style>
        @media (min-width: 992px){
            .img-thongtin{
                height: 149px;
                width: auto;
                object-fit: cover;
            }
        }
    </style>
</head>
<main style="margin-bottom: 100px">
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
                    for($i = 0; $i < count($nuocHoaNam)-1; $i+=2){
                        $item1 = $nuocHoaNam[$i];
                        $item2 = $nuocHoaNam[$i+1];
                    ?>
                    <div class="swiper-slide">
                        <div class="card rounded-0 pduct">
                            <a href="index.php?controller=NuocHoa&action=ThongTin&id_nuochoa=<?php echo $item1['id_nuochoa'] ?>">
                                <img src="<?php echo $item1['img_link'] ?>" alt="" class="product-img">
                            </a>
                            <div class="card-body">
                                <a href="index.php?controller=NuocHoa&action=ThongTin&id_nuochoa=<?php echo $item1['id_nuochoa'] ?>"><p class="card-text p-14-bold title-product text-black"><?php echo $item1['ten_nuochoa'] ?></p></a>
                                <div class="vote">
                                    <i class="bi bi-star text-warning"></i>
                                    <i class="bi bi-star text-warning"></i>
                                    <i class="bi bi-star text-warning"></i>
                                    <i class="bi bi-star text-warning"></i>
                                    <i class="bi bi-star text-warning"></i>
                                </div>
                                <div>
                                    <div class="product-price p-14-bold text-success">
                                        <?php echo $nHModel->ps_price($nHModel->getPrice('min', $item1['id_nuochoa'])).' - '.
                                        $nHModel->ps_price($nHModel->getPrice('max', $item1['id_nuochoa']));
                                        ?>
                                    </div>
                                    <div class="product-menu hidden-menu">
                                        <button class="btn-menu"><i class="bi bi-cart-plus text-success"></i></button>
                                        <button class="btn-menu"><i class="bi bi-eye text-success"></i></button>
                                        <button class="btn-menu"><i class="bi bi-heart text-success"></i></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card rounded-0 pduct">
                            <a href="index.php?controller=NuocHoa&action=ThongTin&id_nuochoa=<?php echo $item2['id_nuochoa'] ?>">
                                <img src="<?php echo $item2['img_link'] ?>" alt="" class="product-img">
                            </a>
                            <div class="card-body">
                                <a href="index.php?controller=NuocHoa&action=ThongTin&id_nuochoa=<?php echo $item2['id_nuochoa'] ?>"><p class="card-text p-14-bold title-product text-black"><?php echo $item2['ten_nuochoa'] ?></p></a>
                                <div class="vote">
                                    <i class="bi bi-star text-warning"></i>
                                    <i class="bi bi-star text-warning"></i>
                                    <i class="bi bi-star text-warning"></i>
                                    <i class="bi bi-star text-warning"></i>
                                    <i class="bi bi-star text-warning"></i>
                                </div>
                                <div>
                                    <div class="product-price p-14-bold text-success">
                                        <?php
                                            echo number_format($item1['min_gia'], 0, ",", ".") . " ₫ - ".number_format($item1['max_gia'], 0, ",", ".") . " ₫";
                                        ?>
                                    </div>
                                    <div class="product-menu hidden-menu">
                                        <button class="btn-menu"><i class="bi bi-cart-plus text-success"></i></button>
                                        <button class="btn-menu"><i class="bi bi-eye text-success"></i></button>
                                        <button class="btn-menu"><i class="bi bi-heart text-success"></i></i></button>
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
                    <div class="d-flex justify-content-center"><i class="bi bi-arrow-right-square" style="margin-top: 3px;"></i><span class="ms-1">Xem tất cả</span></div>
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
                        for($i = 0; $i < count($nuocHoaNu)-1; $i+=2){
                            $item1 = $nuocHoaNu[$i];
                            $item2 = $nuocHoaNu[$i+1];
                        ?>
                        <div class="swiper-slide">
                            <div class="card rounded-0 pduct">
                                <a href="index.php?controller=NuocHoa&action=ThongTin&id_nuochoa=<?php echo $item1['id_nuochoa'] ?>">
                                    <img src="<?php echo $item1['img_link'] ?>" alt="" class="product-img">
                                </a>
                                <div class="card-body">
                                    <a href="index.php?controller=NuocHoa&action=ThongTin&id_nuochoa=<?php echo $item1['id_nuochoa'] ?>"><p class="card-text p-14-bold title-product text-black"><?php echo $item1['ten_nuochoa'] ?></p></a>
                                    <div class="vote">
                                        <i class="bi bi-star text-warning"></i>
                                        <i class="bi bi-star text-warning"></i>
                                        <i class="bi bi-star text-warning"></i>
                                        <i class="bi bi-star text-warning"></i>
                                        <i class="bi bi-star text-warning"></i>
                                    </div>
                                    <div>
                                        <div class="product-price p-14-bold text-success">
                                            <?php
                                            echo number_format($item1['min_gia'], 0, ",", ".") . " ₫ - ".number_format($item1['max_gia'], 0, ",", ".") . " ₫";
                                            ?>
                                        </div>
                                        <div class="product-menu hidden-menu">
                                            <button class="btn-menu"><i class="bi bi-cart-plus text-success"></i></button>
                                            <button class="btn-menu"><i class="bi bi-eye text-success"></i></button>
                                            <button class="btn-menu"><i class="bi bi-heart text-success"></i></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card rounded-0 pduct">
                                <a href="index.php?controller=NuocHoa&action=ThongTin&id_nuochoa=<?php echo $item2['id_nuochoa'] ?>">
                                    <img src="<?php echo $item2['img_link'] ?>" alt="" class="product-img">
                                </a>
                                <div class="card-body">
                                    <a href="index.php?controller=NuocHoa&action=ThongTin&id_nuochoa=<?php echo $item2['id_nuochoa'] ?>"><p class="card-text p-14-bold title-product text-black"><?php echo $item2['ten_nuochoa'] ?></p></a>
                                    <div class="vote">
                                        <i class="bi bi-star text-warning"></i>
                                        <i class="bi bi-star text-warning"></i>
                                        <i class="bi bi-star text-warning"></i>
                                        <i class="bi bi-star text-warning"></i>
                                        <i class="bi bi-star text-warning"></i>
                                    </div>
                                    <div>
                                        <div class="product-price p-14-bold text-success">
                                            <?php echo $nHModel->ps_price($nHModel->getPrice('min', $item2['id_nuochoa'])).' - '.
                                            $nHModel->ps_price($nHModel->getPrice('max', $item2['id_nuochoa']));
                                            ?>
                                        </div>
                                        <div class="product-menu hidden-menu">
                                            <button class="btn-menu"><i class="bi bi-cart-plus text-success"></i></button>
                                            <button class="btn-menu"><i class="bi bi-eye text-success"></i></button>
                                            <button class="btn-menu"><i class="bi bi-heart text-success"></i></i></button>
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
                    <div class="d-flex justify-content-center"><i class="bi bi-arrow-right-square" style="margin-top: 3px;"></i><span class="ms-1">Xem tất cả</span></div>
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
                    for($i = 0; $i < count($nuocHoaUnisex)-1; $i+=2){
                        $item1 = $nuocHoaUnisex[$i];
                        $item2 = $nuocHoaUnisex[$i+1];
                    ?>
                    <div class="swiper-slide">
                        <div class="card rounded-0 pduct">
                            <a href="index.php?controller=NuocHoa&action=ThongTin&id_nuochoa=<?php echo $item1['id_nuochoa'] ?>">
                                <img src="<?php echo $item1['img_link'] ?>" alt="" class="product-img">
                            </a>
                            <div class="card-body">
                                <a href="index.php?controller=NuocHoa&action=ThongTin&id_nuochoa=<?php echo $item1['id_nuochoa'] ?>"><p class="card-text p-14-bold title-product text-black"><?php echo $item1['ten_nuochoa'] ?></p></a>
                                <div class="vote">
                                    <i class="bi bi-star text-warning"></i>
                                    <i class="bi bi-star text-warning"></i>
                                    <i class="bi bi-star text-warning"></i>
                                    <i class="bi bi-star text-warning"></i>
                                    <i class="bi bi-star text-warning"></i>
                                </div>
                                <div>
                                    <div class="product-price p-14-bold text-success">
                                        <?php
                                            echo number_format($item1['min_gia'], 0, ",", ".") . " ₫ - ".number_format($item1['max_gia'], 0, ",", ".") . " ₫";
                                        ?>
                                    </div>
                                    <div class="product-menu hidden-menu">
                                        <button class="btn-menu"><i class="bi bi-cart-plus text-success"></i></button>
                                        <button class="btn-menu"><i class="bi bi-eye text-success"></i></button>
                                        <button class="btn-menu"><i class="bi bi-heart text-success"></i></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card rounded-0 pduct">
                            <a href="index.php?controller=NuocHoa&action=ThongTin&id_nuochoa=<?php echo $item2['id_nuochoa'] ?>">
                                <img src="<?php echo $item2['img_link'] ?>" alt="" class="product-img">
                            </a>
                            <div class="card-body">
                                <a href="index.php?controller=NuocHoa&action=ThongTin&id_nuochoa=<?php echo $item2['id_nuochoa'] ?>"><p class="card-text p-14-bold title-product text-black"><?php echo $item2['ten_nuochoa'] ?></p></a>
                                <div class="vote">
                                    <i class="bi bi-star text-warning"></i>
                                    <i class="bi bi-star text-warning"></i>
                                    <i class="bi bi-star text-warning"></i>
                                    <i class="bi bi-star text-warning"></i>
                                    <i class="bi bi-star text-warning"></i>
                                </div>
                                <div>
                                    <div class="product-price p-14-bold text-success">
                                        <?php echo $nHModel->ps_price($nHModel->getPrice('min', $item2['id_nuochoa'])).' - '.
                                        $nHModel->ps_price($nHModel->getPrice('max', $item2['id_nuochoa']));
                                        ?>
                                    </div>
                                    <div class="product-menu hidden-menu">
                                        <button class="btn-menu"><i class="bi bi-cart-plus text-success"></i></button>
                                        <button class="btn-menu"><i class="bi bi-eye text-success"></i></button>
                                        <button class="btn-menu"><i class="bi bi-heart text-success"></i></i></button>
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
                    <div class="d-flex justify-content-center"><i class="bi bi-arrow-right-square" style="margin-top: 3px;"></i><span class="ms-1">Xem tất cả</span></div>
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
                        foreach($kienthuc as $item){
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
                                <p class="p-12 mt-2" data-toggle="tooltip" title="<?php echo $item['mota'] ?>"><?php echo (strlen($item['mota']) > 92) ? substr($item['mota'], 0, 92) : $item['mota']?></p>
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
</main>
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<script src="js\bootstrap.bundle.min.js"></script>
<script src="js\nuocHoa.js"></script>
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
                nextEl: swiper_button_next+i,
                prevEl: swiper_button_prev+i,
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
</script>
<?php
require("views/template/footer.php");
?>