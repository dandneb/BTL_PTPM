<?php
require("views/template/header.php");
?>

<head>
    <link rel="stylesheet" href="style\splide-core.min.css">
    <link rel="stylesheet" href="style\splide.min.css">
    <link rel="stylesheet" href="style\ThongTin.css">
    <title>Thông tin nước hoa</title>
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

        .span-table {
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
                    <li class="breadcrumb-item"><a href="#" class="text-decoration-none p-14 text-dark">Nước hoa <?php echo $thuonghieu['ten_thuonghieu'] ?></a></li>
                    <li class="breadcrumb-item active" aria-current="page"><span class="p-14 text-dark"><?php echo $nuochoa['ten_nuochoa'] ?></span></li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="container">
        <div class="row border mb-3" style="padding: 10px;">
            <div class="col-md-4 ps-0">
                <div class="container">
                    <div class="carousel-container position-relative row">
                        <!-- Sorry! Lightbox doesn't work - yet. -->
                        <div id="myCarousel" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">
                                <?php
                                for ($i = 0; $i < count($anh); $i++) {
                                    $img = $anh[$i];
                                    if ($i == 0) {
                                ?>
                                        <div class="carousel-item active" data-slide-number="<?php echo $i ?>">
                                            <img src="<?php echo $img['img_link'] ?>" class="d-block w-100 h-100" alt="..." data-remote="https://source.unsplash.com/Pn6iimgM-wo/" data-type="image" data-toggle="lightbox" data-gallery="example-gallery">
                                        </div>
                                    <?php
                                    } else {
                                    ?>
                                        <div class="carousel-item" data-slide-number="<?php echo $i ?>">
                                            <img src="<?php echo $img['img_link'] ?>" class="d-block w-100 h-100" alt="..." data-remote="https://source.unsplash.com/tXqVe7oO-go/" data-type="image" data-toggle="lightbox" data-gallery="example-gallery">
                                        </div>
                                <?php
                                    }
                                }
                                ?>
                            </div>
                        </div>

                        <!-- Carousel Navigation -->
                        <div id="carousel-thumbs" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <div class="row mx-0">
                                        <?php
                                        for ($i = 0; $i < 6; $i++) {
                                            $img = $anh[$i];
                                            if ($i == 0) {
                                        ?>
                                                <div id="carousel-selector-<?php echo $i ?>" class="thumb col-4 col-sm-2 px-1 py-2 selected" data-target="#myCarousel" data-slide-to="<?php echo $i ?>">
                                                    <img src="<?php echo $img['img_link'] ?>" class="img-fluid" alt="...">
                                                </div>
                                            <?php
                                            } else {
                                            ?>
                                                <div id="carousel-selector-<?php echo $i ?>" class="thumb col-4 col-sm-2 px-1 py-2" data-target="#myCarousel" data-slide-to="<?php echo $i ?>">
                                                    <img src="<?php echo $img['img_link'] ?>" class="img-fluid" alt="...">
                                                </div>
                                        <?php
                                            }
                                        }
                                        ?>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <div class="row mx-0">
                                        <?php
                                        for ($i = 6; $i < count($anh); $i++) {
                                            $img = $anh[$i];
                                        ?>
                                            <div id="carousel-selector-<?php echo $i ?>" class="thumb col-4 col-sm-2 px-1 py-2" data-target="#myCarousel" data-slide-to="<?php echo $i ?>">
                                                <img src="<?php echo $img['img_link'] ?>" class="img-fluid" alt="...">
                                            </div>
                                        <?php
                                        }
                                        $lost = 12 - count($anh);
                                        for ($i = 0; $i < $lost; $i++) {
                                        ?>
                                            <div class="col-2 px-1 py-2"></div>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <a class="carousel-control-prev" href="#carousel-thumbs" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carousel-thumbs" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <h1 class="title-head"><?php echo $nuochoa['ten_nuochoa'] ?></h1>
                <div class="vote">
                    <i class="bi bi-star text-warning"></i>
                    <i class="bi bi-star text-warning"></i>
                    <i class="bi bi-star text-warning"></i>
                    <i class="bi bi-star text-warning"></i>
                    <i class="bi bi-star text-warning"></i>
                </div>
                <div>
                    <p class="p-14-bold m-0">Tình trạng: <span class="p-14 <?php echo ($soluong <= 2) ? "text-success" : "text-danger" ?>"><?php echo ($soluong <= 2) ? "Còn hàng" : "Hết hàng" ?></span></p>
                    <p class="price-information"><?php echo ($check == true) ? $gia_ban[$vitri][0] : $gia_ban[0][0] ?></p>
                </div>
                <form style="color: #42495b;" action="index.php?controller=khachhang&action=muahang" method="POST">
                    <span style="font-family:Trebuchet MS,Helvetica,sans-serif;"><?php echo $nuochoa['mota'] ?></span>
                    <div class="swatch">
                        <p class="p-14-bold">Giới tính</p>
                        <div class="swatch-element">
                            <input id="swatch-0-nam" type="radio" name="option-0" value="<?php echo $nuochoa['gioitinh'] ?>" <?php echo ($gia[0]['soluong'] == 0 || $gia[1]['soluong'] == 0 || $gia[2]['soluong'] == 0) ? 'checked' : 'disabled' ?> class="bk-product-property">
                            <label class="border text-uppercase" for="swatch-0-nam" style="position: relative;">
                                <?php
                                $gt = "";
                                if ($nuochoa['gioitinh'] == 0)
                                    $gt = "Nam";
                                else if ($nuochoa['gioitinh'] == 1)  $gt = "Nữ";
                                else    $gt = "Unisex";
                                echo $gt;
                                echo "<script>var gt = '".$gt."'</script>";
                                ?>
                                <?php
                                if ($gia[0]['soluong'] == 0 || $gia[1]['soluong'] == 0 || $gia[2]['soluong'] == 0) echo "";
                                else    echo '<img src="images/ticket/soldout.png" alt="" class="w-100 h-100" style="position: absolute; left: 0; top: 0;">';
                                ?>
                            </label>
                        </div>
                    </div>
                    <div class="swatch">
                        <div class="swatch-element">
                            <p class="p-14-bold">Xuất xứ</p>
                            <input id="swatch-1-anh" type="radio" name="option-1" value="<?php echo $nuochoa['xuatxu'] ?>" <?php echo ($gia[0]['soluong'] == 0 || $gia[1]['soluong'] == 0 || $gia[2]['soluong'] == 0) ? 'checked' : 'disabled' ?> class="bk-product-property">
                            <label class="border text-uppercase" for="swatch-1-anh" style="position: relative;">
                                <?php echo $nuochoa['xuatxu'] ?>
                                <?php
                                if ($gia[0]['soluong'] == 0 || $gia[1]['soluong'] == 0 || $gia[2]['soluong'] == 0) echo "";
                                else    echo '<img src="images/ticket/soldout.png" alt="" class="w-100 h-100" style="position: absolute; left: 0; top: 0;">';
                                ?>
                            </label>
                        </div>
                    </div>
                    <div class="swatch" style="margin-top: 32px">
                        <p class="p-14-bold">Dung tích</p>
                        <div class="d-flex">
                            <div class="swatch-element">
                                <input id="swatch-2-chiet-10ml" type="radio" name="dungtich" value="<?php echo $gia[0]['dungtich'] ?>_<?php echo $gia[0]['gia_ban'] ?>" <?php echo $flags[0] ?> <?php echo ($gia[0]['soluong'] == 0) ? "" : "disabled" ?> class="bk-product-property dungtich">
                                <label class="border" for="swatch-2-chiet-10ml" style="position: relative;" data-toggle="tooltip" data-placement="top" title="<?php echo $gia_ban[0][0] ?>">
                                    CHIẾT 10ML
                                    <?php
                                    if ($gia[0]['soluong'] == 0) echo "";
                                    else    echo '<img src="images/ticket/soldout.png" alt="" class="w-100 h-100" style="position: absolute; left: 0; top: 0;">';
                                    ?>
                                </label>
                            </div>
                            <div class="swatch-element">
                                <input id="swatch-2-chiet-20ml" type="radio" name="dungtich" value="<?php echo $gia[1]['dungtich'] ?>_<?php echo $gia[1]['gia_ban'] ?>" <?php echo $flags[1] ?> <?php echo ($gia[1]['soluong'] == 0) ? "" : "disabled" ?> class="bk-product-property dungtich">
                                <label class="border" for="swatch-2-chiet-20ml" style="position: relative;" data-toggle="tooltip" data-placement="top" title="<?php echo $gia_ban[1][0] ?>">
                                    CHIẾT 20ML
                                    <?php
                                    if ($gia[1]['soluong'] == 0) echo "";
                                    else    echo '<img src="images/ticket/soldout.png" alt="" class="w-100 h-100" style="position: absolute; left: 0; top: 0;">';
                                    ?>
                                </label>
                            </div>
                            <div class="swatch-element">
                                <input id="swatch-2-fullbox-100ml" type="radio" name="dungtich" value="<?php echo $gia[2]['dungtich'] ?>_<?php echo $gia[2]['gia_ban'] ?>" <?php echo $flags[2] ?> <?php echo ($gia[2]['soluong'] == 0) ? "" : "disabled" ?> class="bk-product-property dungtich">
                                <label class="border" for="swatch-2-fullbox-100ml" style="position: relative;" data-toggle="tooltip" data-placement="top" title="<?php echo $gia_ban[2][0] ?>">
                                    FULLBOX 100ML
                                    <?php
                                    if ($gia[2]['soluong'] == 0) echo "";
                                    else    echo '<img src="images/ticket/soldout.png" alt="" class="w-100 h-100" style="position: absolute; left: 0; top: 0;">';
                                    ?>
                                </label>
                            </div>
                        </div>
                    </div>
                    <?php
                    if ($soluong <= 2) {
                    ?>
                        <div class="swatch">
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
                        </div>
                        <div class="container p-0">
                            <button class="btn btn-success btn-lg btn-thongtin rounded-0" id="btn-muaNgay" type="button">
                                <span class="txt-main">MUA NGAY</span>
                            </button>
                            <button class="btn btn-success btn-lg btn-thongtin rounded-0" id="btn-addGioHang" type="button" data-bs-toggle="modal" data-bs-target="#addGioHangSuccess">
                                <span class="txt-main">THÊM VÀO GIỎ HÀNG</span>
                            </button>
                        </div>
                    <?php
                    } else {
                    ?>
                        <div class="container p-0">
                            <button class="btn btn-success btn-lg btn-thongtin rounded-0 d-flex flex-column justify-content-center align-items-center" disabled type="button">
                                <span class="txt-main text-uppercase">Hết hàng</span>
                                <span class="p-14">Liên hệ 0888070308</span>
                            </button>
                        </div>
                    <?php
                    }
                    ?>
                    <div class="container p-0 mt-4">
                        <?php
                        if(isset($_SESSION['LoginOK'])){
                        ?>
                            <button value="<?php echo $nuochoa['id_nuochoa'] ?>" class="bg-white text-dark border favorite-tt d-flex align-items-center addYeuThich" data-bs-toggle="modal" data-bs-target="#addYeuThichSuccess" style="width:auto">
                                <span class="material-icons">
                                    favorite
                                </span>
                                <span class="favorite-content">
                                    THÊM VÀO YÊU THÍCH
                                </span>
                            </button>
                        <?php
                        }else{
                        ?>
                            <a href="index.php?controller=khachhang&action=dangnhap&id_nuochoa=<?php echo $nuochoa['id_nuochoa'] ?>" class="text-decoration-none text-dark border favorite-tt d-flex align-items-center">
                                <span class="material-icons">
                                    favorite
                                </span>
                                <span class="favorite-content">
                                    THÊM VÀO YÊU THÍCH
                                </span>
                            </a>
                        <?php
                        }
                        ?>
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
                </form>

                <!-- Modal -->
                <div class="modal fade" id="addGioHangSuccess" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content rounded-0">
                            <div class="modal-body border-0 text-center" style="background-color: black; color: white; opacity: 0.9;">
                                <img src="images/ticket/check.png" id="imgNoticedGioHang" alt="" style="max-height: 40px; max-width: 40px; margin: 0px auto 25px; display: block;">
                                <p class="noticedGioHang">Thêm vào giỏ hàng thành công!</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row p-0 pb-3" style="padding: 10px;">
            <div class="col-md-8 border" style="padding-top: 12px;">
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    <button class="nav-link active p-1 p-14 ms-2 me-1" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">THÔNG TIN SẢN PHẨM</button>
                    <button class="nav-link p-1 p-14 me-1" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">HƯỚNG DẪN SỬ DỤNG VÀ BẢO QUẢN</button>
                    <button class="nav-link p-1 p-14 me-1" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">CHÍNH SÁCH ĐỔI TRẢ VÀ BẢO HÀNH</button>
                    <button class="nav-link p-1 p-14 me-1" id="nav-review-tab" data-bs-toggle="tab" data-bs-target="#nav-review" type="button" role="tab" aria-controls="nav-review" aria-selected="false">ĐÁNH GIÁ</button>
                </div>
                <div class="tab-content mt-3" id="nav-tabContent">
                    <div class="tab-pane fade active show" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                        <div class="mota paragraph-sp" style="height: 700px">
                            <p class="p-16-bold" style="text-align: justify">
                                <?php echo $nuochoa['thongtinchinh'] ?>
                            </p>
                            <div class="d-flex justify-content-center mb-3">
                                <img src="<?php echo $anh['2']['img_link'] ?>" class="d-block h-100" alt="..." data-type="image" style="max-width: 600px">
                            </div>
                            <p class="title-paragraph">Tổng quan về nước hoa <?php echo $nuochoa['ten_nuochoa'] ?></p>
                            <p class="paragraph">
                                <?php echo $nuochoa['tongquan'] ?>
                            </p>
                            <div class="d-flex justify-content-center mb-3">
                                <img src="<?php echo $anh['3']['img_link'] ?>" class="d-block h-100" alt="..." data-type="image" style="max-width: 600px">
                            </div>
                            <table class="w-100 table table-bordered border-black border-2 mt-3">
                                <tbody>
                                    <tr>
                                        <td class="w-50 p-3"><strong>Nhóm nước hoa:</strong></td>
                                        <td class="w-50 p-3"><span class="span-table"><?php echo $nuochoa['nhomnuochoa'] ?></span></td>
                                    </tr>
                                    <tr>
                                        <td class="w-50 p-3"><strong>Giới tính:</strong></td>
                                        <td class="w-50 p-3"><?php echo $gt; ?></td>
                                    </tr>
                                    <tr>
                                        <td class="w-50 p-3"><strong>Độ tuổi khuyên dùng:</strong></td>
                                        <td class="w-50 p-3"><span class="span-table"><?php echo $nuochoa['dotuoikhuyendung'] ?></span></td>
                                    </tr>
                                    <tr>
                                        <td class="w-50 p-3"><strong>Năm ra mắt:</strong></td>
                                        <td class="w-50 p-3"><span class="span-table"><?php echo $nuochoa['namramat'] ?></span></td>
                                    </tr>
                                    <tr>
                                        <td class="w-50 p-3"><strong>Nồng độ:</strong></td>
                                        <td class="w-50 p-3"><span class="span-table"><?php echo $nuochoa['nongdo'] ?></span></td>
                                    </tr>
                                    <tr>
                                        <td class="w-50 p-3"><strong>Nhà pha chế:</strong></td>
                                        <td class="w-50 p-3"><span class="span-table"><?php echo $nuochoa['nhaphache'] ?></span></td>
                                    </tr>
                                    <tr>
                                        <td class="w-50 p-3"><strong>Độ lưu hương:</strong></td>
                                        <td class="w-50 p-3"><span class="span-table"><?php echo $nuochoa['doluuhuong'] ?></span></td>
                                    </tr>
                                    <tr>
                                        <td class="w-50 p-3"><strong>Phong cách:</strong></td>
                                        <td class="w-50 p-3"><span class="span-table"><?php echo $nuochoa['phongcach'] ?></span></td>
                                    </tr>
                                    <tr>
                                        <td class="w-50 p-3"><strong>Độ toả hương:</strong></td>
                                        <td class="w-50 p-3"><span class="span-table"><?php echo $nuochoa['dotoahuong'] ?></span></td>
                                    </tr>
                                    <tr>
                                        <td class="w-50 p-3"><strong>Thời điểm phù hợp:</strong></td>
                                        <td class="w-50 p-3"><span class="span-table"><?php echo $nuochoa['thoidiemphuhop'] ?></span></td>
                                    </tr>
                                </tbody>
                            </table>
                            <p class="title-paragraph">Hương thơm sang trọng nổi bật của nước hoa <?php echo $nuochoa['ten_nuochoa'] ?></p>
                            <div class="paragraph">
                                <?php
                                if($nuochoa['loai_huongthom'] != "$"){
                                    $loaihuongthom = $nuochoa['loai_huongthom'];
                                    $loaihuongthom = preg_split('/\r\n|\r|\n/', $loaihuongthom);
                                    ?>
                                    <ul class="ps-3">
                                        <?php
                                        foreach ($loaihuongthom as $lht) {
                                        ?>
                                            <li><?php echo $lht; ?></li>
                                        <?php
                                        }
                                        ?>
                                    </ul>
                                    <?php
                                }
                                ?>
                            </div>
                            <div class="d-flex justify-content-center mb-3">
                                <img src="<?php echo $anh['4']['img_link'] ?>" class="d-block h-100" alt="..." data-type="image" style="max-width: 600px">
                            </div>
                            <?php
                            $huongthom = preg_split('/\r\n|\r|\n/', $nuochoa['huongthom']);
                            foreach ($huongthom as $ht) {
                            ?>
                                <p class="paragraph">
                                    <?php echo $ht; ?>
                                </p>
                            <?php
                            }
                            ?>
                            <?php
                            if ($nuochoa['thietke'] != "$") {
                                $thietke = preg_split('/\r\n|\r|\n/', $nuochoa['thietke']);
                            ?>
                                <p class="title-paragraph">Thiết kế của nước hoa <?php echo $nuochoa['ten_nuochoa'] ?></p>
                                <div class="d-flex justify-content-center mb-3">
                                    <img src="<?php echo $anh['5']['img_link'] ?>" class="d-block h-100" alt="..." data-type="image" style="max-width: 600px">
                                </div>
                                <?php
                                foreach ($thietke as $tk) {
                                ?>
                                    <p class="paragraph">
                                        <?php echo $tk; ?>
                                    </p>
                            <?php
                                }
                            }
                            ?>
                            <?php
                            if ($nuochoa['dadanghoa'] != "$") {
                                $dadanghoa = preg_split('/\r\n|\r|\n/', $nuochoa['dadanghoa']);
                            ?>
                                <p class="title-paragraph">Đa dạng hóa cách sử dụng nước hoa <?php echo $nuochoa['ten_nuochoa'] ?></p>
                                <div class="d-flex justify-content-center mb-3">
                                    <img src="<?php echo $anh['6']['img_link'] ?>" class="d-block h-100" alt="..." data-type="image" style="max-width: 600px">
                                </div>
                                <?php
                                foreach ($dadanghoa as $ddh) {
                                ?>
                                    <p class="paragraph">
                                        <?php echo $ddh; ?>
                                    </p>
                            <?php
                                }
                            }
                            ?>

                            <p class="title-paragraph">Hướng dẫn sử dụng để cơ thể luôn toả hương thơm của nước hoa <?php echo $nuochoa['ten_nuochoa'] ?></p>
                            <div class="d-flex justify-content-center mb-3">
                                <?php
                                if ($nuochoa['gioitinh'] == 0)   $link_hdsd = "images/HDSD/Nam/Nam.jpg";
                                else if ($nuochoa['gioitinh'] == 1)   $link_hdsd = "images/HDSD/Nu/Nu.jpg";
                                else   $link_hdsd = "images/HDSD/Unisex/Unisex.jpg";
                                ?>
                                <img src="<?php echo $link_hdsd ?>" class="d-block h-100" alt="..." data-type="image" style="max-width: 600px">
                            </div>
                            <div class="paragraph">
                                <p class="paragraph">Mỗi lẫn sử dụng nước hoa <strong><?php echo $nuochoa['ten_nuochoa'] ?></strong>, bạn có thể tham khảo cách xịt nước hoa thơm lâu như sau nhé:</p>
                                <ul class="ps-3">
                                    <li>Dưỡng ẩm da trước khi xịt (nếu có thể). Một làn da được thoa kem dưỡng ẩm chính là môi trường tốt nhất để nước hoa có chỗ bám lại và lưu hương thật lâu. Lúc này kem dưỡng ẩm đóng vai trò như lớp nền lưu trữ phân tử mùi hương bám trụ và tỏa hương tốt nhất có thể.</li>
                                    <li>Xịt 2 shot mạnh và dứt khoát lên hai bên gáy tai (đối với nữ)/dưới cổ họng (đối với nam) hoặc những vị trí có mạch đập để nước hoa tiếp xúc với da và toả ra hương thơm đặc trưng của riêng bạn.</li>
                                    <li>Để nước hoa khô tự nhiên trên da. Không dùng tay xoa mạnh nước hoa lên da, hoặc xịt nước hoa lên cổ tay rồi xoa mạnh hai cổ tay với nhau, làm như vậy các phân tử mùi hương sẽ bị xáo trộn gây biến đổi mùi.</li>
                                    <li>Xịt thêm 1-2 shot lên ngực áo để nước hoa lưu hương lâu hơn nhé, nước hoa sẽ lưu hương trên quần áo tốt hơn trên da.</li>
                                </ul>
                                <p class="paragraph">Hãy chọn <a href="index.php">shop nước hoa chính hãng Parfumerie</a> - Nước hoa không chỉ có thơm & đẹp, nước hoa chính là cá tính và dấu ấn của mỗi người. Hãy yêu thương bản thân nhiều hơn.</p>
                                <p class="paragraph">Và chúng tôi nói KHÔNG với nước hoa hàng giả/ hàng nhái (fake) vì thế bạn có thể hoàn toàn tin tưởng khi mua nước hoa chính hãng tại Parfumerie.</p>
                            </div>
                        </div>
                        <div class="container-fluid btn-xemthem">
                            <div class="button-sp text-center">
                                <span class="btn btn-xt">XEM THÊM <span class="material-icons" style="transform:translateY(6px)">
                                        expand_more
                                    </span></span>
                            </div>
                        </div>

                        <div class="container-fluid btn-rutgon">
                            <div class="text-center">
                                <span class="btn btn-rg">THU GỌN <span class="material-icons" style="transform:translateY(6px)">
                                        arrow_upward
                                    </span></span>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade tour_information" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                        <div id="tab-2" class="tab-content current p-14" style="color: #42495B;">
                            Cách sử dụng nước hoa:
                            <br>
                            <br>
                            1. Xịt nước hoa khi cơ thể sạch, khô, hoặc sau khi thoa dưỡng ẩm để giữ mùi lâu hơn.
                            <br>
                            <br>
                            2. Giữ chai xịt cách cơ thể khoảng 12cm – 15cm và hướng đầu vòi xịt về mình. Nếu nước hoa làm ướt da thì nghĩa là bạn đang xịt ở khoảng cách quá gần. Chờ "điểm mạch" khô tự nhiên mà không chà xát (thói quen này làm bay mùi và biến mùi nước hoa).
                            <br>
                            <br>
                            3. Xịt nước hoa vào các điểm mạch đập (cổ, ngực, các điểm mạch, cẳng tay hoặc khuỷu tay): đây là những vùng có mạch máu nằm gần bề mặt da. Các điểm này ấm hơn những nơi khác, hơi ấm giúp khuếch tán mùi hương tốt.
                            <br>
                            <br>
                            - Nước hoa ban đêm thường được xịt lên cổ hoặc gần vùng cổ. Lý do là vì hương nước hoa ban đêm không lưu lại lâu.
                            <br>
                            <br>
                            - Nước hoa ban ngày thường được xịt vào hông hoặc đầu gối. Đó là vì hương nước hoa ban ngày tỏa hương suốt ngày và thơm dai hơn. Bạn nên dùng thêm chút kem dưỡng ẩm gần chỗ định xức nước hoa để mùi hương lưu lại lâu hơn.
                            <br>
                            <br>
                            4. Sử dụng nước hoa phù hợp theo mùa, thời tiết vì sức nóng và độ ẩm sẽ tăng mạnh mùi hương.
                            <br>
                            <br>
                            5. Nước hoa có thể bám và tỏa mùi tốt hay không còn phụ thuộc vào cơ địa, thời gian, không gian sử dụng.
                            <br>
                            <br>
                            Bảo quản nước hoa:
                            <br>
                            <br>
                            Nước hoa không chỉ loãng và mất hương thơm theo thời gian, mà còn bị biến màu, biến chất dẫn đến mùi nước hoa có mùi khó chịu. Nếu bảo quản không đúng cách, nước hoa có thể bắt đầu hỏng sau vài tháng.
                            <br>
                            <br>
                            1. Ánh sáng: tiếp xúc trực tiếp với ánh sáng trong một khoảng thời gian chắc chắn sẽ khiến nước hoa bị biến chất. Nên để nước hoa trong hộp, nơi tối, khô thoáng (tủ đồ, kệ tủ).
                            <br>
                            <br>
                            2. Nhiệt độ: nhiệt độ dao động quá cao sẽ nhanh chóng làm hỏng mùi hương. Vì vậy để nước hoa trong nhà tắm có khả năng hư hỏng nhanh hơn nhiều so với nước hoa được lưu trữ trong không gian khác(tủ đồ, kệ tủ,...).
                            <br>
                            <br>
                            Hạn sử dụng:
                            <br>
                            <br>
                            Nước hoa thường không có hạn sử dụng. Ở một số Quốc gia, việc ghi chú hạn sử dụng là điều bắt buộc để hàng hóa được bán ra trên thị trường. Hầu hết nước hoa có hạn sử dụng 24 đến 36 tháng, và tính từ ngày bạn mở sản phẩm hay phát xịt đầu tiên.
                            <br>
                            <br>
                        </div>
                    </div>
                    <div class="tab-pane tour_information tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                        <div id="tab-3" class="tab-content current p-14" style="color: #42495B;">
                            Parfumerie luôn mong muốn mang đến cho Quý Khách Hàng những trải nghiệm dịch vụ mua sắm tốt nhất. Chúng tôi phục vụ nhu cầu mua hàng trên toàn quốc với chính sách đổi trả cụ thể như sau:
                            <br>
                            <br>
                            1.&nbsp;Thời hạn đổi trả trong vòng 03 ngày kể từ khi Quý Khách Hàng nhận sản phẩm của Parfumerie tại Cửa hàng hoặc từ Đơn vị giao hàng.
                            <br>
                            <br>
                            2. Chỉ áp dụng đổi trả cho sản phẩm nước hoa Fullbox, không áp dụng cho Nước hoa chiết.
                            <br>
                            <br>
                            3. Việc đổi trả hàng chỉ áp dụng với những sản phẩm bị lỗi kỹ thuật do nhà sản xuất.
                            <br>
                            - Quý Khách Hàng&nbsp;vui lòng thông báo ngay khi kiểm tra hàng lúc nhận và cần&nbsp;lập&nbsp;biên bản xác nhận&nbsp;giữa người mua và nhân viên giao hàng trong trường hợp sản phẩm nước hoa bị đổ, vỡ, rò rỉ hoặc các lỗi vật lý khác bên ngoài.
                            <br>
                            - Quý Khách Hàng vui lòng cung cấp hình ảnh &amp; video thấy rõ lỗi kỹ thuật của sản phẩm gửi cho Parfumerie để xác minh ngay khi khui hộp sản phẩm.
                            <br>
                            <br>
                            4.&nbsp;Sản phẩm mua rồi, Quý khách hàng vui lòng không trả hàng nếu không phải lỗi của sản phẩm.
                            <br>
                            <br>
                            5. Bảo hành: Nước hoa là sản phẩm đặc thù nên không&nbsp;áp dụng&nbsp;chính sách bảo hành.
                            <br>
                            <br>
                            6. Các trường hợp từ chối đổi trả - bảo hành:
                            <br>
                            - Quá thời hạn quy định.
                            Không phải lỗi của sản phẩm.
                            <br>
                            - Không xác minh được do Parfumerie cung cấp.
                            Không có tem bảo hành của Parfumerie hoặc tem bảo hành bị rách/vỡ không còn nguyên vẹn.
                            <br>
                            - Sản phẩm không còn nguyên vẹn, bị biến dạng hoặc hư hỏng nặng.
                            <br>
                            - Các sản phẩm giảm giá từ 30% trở lên.
                            <br>
                            <br>
                            Trân trọng cảm ơn!
                        </div>
                    </div>
                    <div class="tab-pane fade tour_information" id="nav-review" role="tabpanel" aria-labelledby="nav-review-tab">
                        <div class="row">
                            <div class="col-md-12 border border-dark" style="margin-left: 8px; margin-right: 30px;">
                                OK
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-1">
            </div>
            <div class="col-md-3 border">
                <div style="border: 1px solid #000; margin-top: 12px;">
                    <div>
                        <div class="container">
                            <div class="row wrap-service">
                                <div class="col-md-3 pe-0 image_service d-flex align-items-center">
                                    <img src="images\service\policy_image_1.png" alt="">
                                </div>
                                <div class="col-md-9 ps-0">
                                    <p class="p-14-bold">
                                        Giao hàng nhanh chóng
                                    </p>
                                    <span class="p-13">
                                        ✅ Giao hàng tận nơi toàn quốc; giao nhanh trong vòng 24h khu vực nội thành HCM.
                                        <br>
                                        ✅ Miễn phí giao hàng đối với đơn hàng sản phẩm nước hoa Fullbox.
                                    </span>
                                </div>
                            </div>
                            <div class="row wrap-service">
                                <div class="col-md-3 pe-0 image_service d-flex align-items-center">
                                    <img src="images\service\policy_image_2.png" alt="">
                                </div>
                                <div class="col-md-9 ps-0">
                                    <p class="p-14-bold">
                                        Bảo đảm chất lượng
                                    </p>
                                    <span class="p-13">
                                        ✅ Cam kết nước hoa chính hãng 100%.
                                        <br>
                                        ✅ Nói không với các sản phẩm nước hoa kém chất lượng; nước hoa Auth 1:1 và các thể loại tương tự khác.
                                    </span>
                                </div>
                            </div>
                            <div class="row wrap-service">
                                <div class="col-md-3 pe-0 image_service d-flex align-items-center">
                                    <img src="images\service\policy_image_3.png" alt="">
                                </div>
                                <div class="col-md-9 ps-0">
                                    <p class="p-14-bold">
                                        Chăm sóc khách hàng tốt
                                    </p>
                                    <span class="p-13">
                                        ✅ Hotline 24/7:
                                        <br>
                                        ✅ Chăm sóc khách hàng tận tình trước và sau khi mua hàng.
                                    </span>
                                </div>
                            </div>
                            <div class="row wrap-service">
                                <div class="col-md-3 pe-0 image_service d-flex align-items-center">
                                    <img src="images\service\policy_image_4.png" alt="">
                                </div>
                                <div class="col-md-9 ps-0">
                                    <p class="p-14-bold">
                                        Đa dạng lựa chọn
                                    </p>
                                    <span class="p-13">
                                        ✅ Đa dạng sản phẩm thương hiệu nổi tiếng được yêu thích tại Việt Nam.
                                        <br>
                                        ✅ Đa dạng dung tích: Nước hoa Fullbox; Nước hoa Chiết 10ml/20ml/30ml; Gốc nước hoa.
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<script src="js\splide.min.js" type="text/javascript"></script>
<script src="https://cpwebassets.codepen.io/assets/common/stopExecutionOnTimeout-2c7831bb44f98c1391d6a4ffda0e1fd302503391ca806e7fcc7b9b87197aec26.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.0/js/bootstrap.min.js"></script>
<script src="https://kit.fontawesome.com/ad153db3f4.js"></script>
<script src="js/nuocHoa.js" type="text/javascript"></script>
<script src="js/thongTinNuocHoa.js">
    
</script>
<?php
require("views/template/footer.php");
?>