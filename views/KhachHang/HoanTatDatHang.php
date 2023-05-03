<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <link rel="stylesheet" href="style/header.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>Hoàn tất đơn hàng</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="style\swiper-bundle.min.css">
    <script src="js/jquery-3.6.0.min.js"></script>
    <style>
        body {
            font-family: "Segoe UI", "Roboto", "Helvetica Neue", Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol" !important;
            font-weight: 500 !important;
        }

        .card-thanh-toan img {
            width: 50px;
            height: 50px;
            position: relative;
        }

        .card-thanh-toan .so_luong {
            background-color: #07503d;
            height: 17px;
            width: 18px;
            text-align: center;
            color: white;
            border-radius: 100%;
            position: absolute;
            top: -7%;
            right: -3%;
        }

        .p_cost {
            font-size: 14px;
            color: #717171;
            font-weight: 600;
        }
    </style>
</head>

<body class="p-0 m-0 border-0" style="background-color: #FAFAFA">
    <div class="container mt-3">
        <div class="row d-flex justify-content-center">
            <img class="logo" src="images\header\checkout_logo.png" alt="">
        </div>
        <div class="row mt-4">
            <div class="col-md-7">
                <div>
                    <div class="d-flex flex-row">
                        <div class="me-3">
                            <span class="material-icons" style="font-size: 80px; color: #07503d; border-radius: 100%; border: 3px solid #07503d">
                                done
                            </span>
                        </div>
                        <div>
                            <h5>Cảm ơn bạn đã đặt hàng</h5>
                            <?php
                            if($donhang['email'] != null || $donhang['email'] != ""){
                            ?>
                                <span class="p-14">Một email xác nhận đã được gửi tới <?php echo $donhang['email'] ?>. Xin vui lòng kiểm tra email của bạn và chúng tôi sẽ sớm liên hệ qua số điện thoại của bạn!</span>
                            <?php
                            }else{
                            ?>
                                <span class="p-14">Chúng tôi sẽ sớm liên hệ với bạn thông qua số điện thoại của bạn!</span>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <div class="container border mt-3 p-3">
                    <div class="row">
                        <div class="col-md-6">
                            <div>
                                <p class="p-16-bold">Thông tin mua hàng</p>
                                <p class="p-14"><?php echo $donhang['hoten'] ?></p>
                                <p class="p-14"><?php echo $donhang['email'] ?></p>
                                <p class="p-14"><?php echo $donhang['sodienthoai'] ?></p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div>
                                <p class="p-16-bold">Địa chỉ nhận hàng</p>
                                <?php
                                if($donhang['diachikhac'] == 1){
                                ?>
                                <p class="p-14"><?php echo $donhang['hoten_khac'] ?></p>
                                <p class="p-14"><?php echo $donhang['diachi_khac'] ?></p>
                                <p class="p-14"><?php echo $donhang['phuongxa_khac'].", ".$donhang['quanhuyen_khac'].", ".$donhang['tinhthanh_khac'] ?></p>
                                <p class="p-14"><?php echo $donhang['sodienthoai_khac'] ?></p>
                                <?php
                                }else{
                                ?>
                                <p class="p-14"><?php echo $donhang['hoten'] ?></p>
                                <p class="p-14"><?php echo $donhang['diachi'] ?></p>
                                <p class="p-14"><?php echo $donhang['phuongxa'].", ".$donhang['quanhuyen'].", ".$donhang['tinhthanh'] ?></p>
                                <p class="p-14"><?php echo $donhang['sodienthoai_khac'] ?></p>
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div>
                                <p class="p-16-bold">Phương thức thanh toán</p>
                                <?php
                                    $mota = preg_split('/\r\n|\r|\n/', $pTTT['mota']);
                                ?>
                                <p class="p-14"><?php echo $pTTT['ten'] ?></p>
                                <img src="<?php echo $pTTT['image_link'] ?>" alt="" style="max-width: 300px; max-height: 300px">
                                <?php
                                foreach($mota as $item){
                                    echo '<p class="p-14">'.$item.'</p>';
                                }
                                
                                ?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div>
                                <p class="p-16-bold">Phương thức vận chuyển</p>
                                <div class="d-flex flex-row justify-content-between">
                                    <p class="p-14">Phí vận chuyển</p>
                                    <p class="p-14">-</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container mt-3 p-3">
                    <div class="d-flex justify-content-end">
                        <a class="btn btn-success" href="index.php">Tiếp tục mua hàng</a>
                    </div>
                </div>
            </div>
            <div class="col-md-5 bg-white p-2">
                <h6>Đơn hàng #<?php echo $donhang['id_donhang']." (".$soluongsanpham.")"; ?></h6>
                <hr>
                <div class="card-thanh-toan mb-2">
                    <?php
                    foreach($donhang_sanpham as $item){
                    ?>
                    <div class="row">
                        <div class="col-md-2">
                            <div style="position: relative;">
                                <img src="<?php echo $item['img_link'] ?>" alt="">
                                <p class="p-12-bold so_luong"><?php echo $item['soluong'] ?></p>
                            </div>
                        </div>
                        <div class="col-md-7">
                            <div>
                                <p class="p-14-bold"><?php echo $item['ten_nuochoa'] ?></p>
                                <p class="p-12"><?php echo $item['gioitinh']." / ".$item['xuatxu']." / Chiết ".$item['dungtich']."ml" ?></p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <?php
                            if($item['magiamgia'] != "" && $item['magiamgia'] != null){
                            ?>
                            <p class="p_cost text-decoration-line-through mb-0"><?php echo number_format($item['soluong']*$item['dongia'], 0, ",", ".") . " ₫"; ?></p>
                            <p class="p_cost mb-0"><?php echo number_format($item['tong'], 0, ",", ".") . " ₫"; ?></p>
                            <?php
                            }else{
                                ?>
                            <p class="p_cost mb-0"><?php echo number_format($item['tong'], 0, ",", ".") . " ₫"; ?></p>
                                <?php
                            }
                            ?>
                        </div>
                    </div>
                    <?php
                    }
                    ?>
                </div>
                <hr>
                <div class="col-md-12 mb-2 p-0 pb-2">
                    <div class="d-flex justify-content-between">
                        <p class="p_cost">Tạm tính</p>
                        <p class="p_cost"><?php echo number_format($tongtien, 0, ",", ".") . " ₫"; ?></p>
                    </div>
                    <?php
                    if($donhang['khuyenmai'] > 0){
                    ?>
                    <div class="d-flex justify-content-between">
                        <p class="p_cost">Giảm giá</p>
                        <p class="p_cost"><?php echo number_format($donhang['khuyenmai'], 0, ",", ".") . " ₫"; ?></p>
                    </div>
                    <?php
                    }
                    ?>
                    <div class="d-flex justify-content-between">
                        <p class="p_cost">Phí vận chuyển</p>
                        <p class="p_cost">-</p>
                    </div>
                </div>
                <hr>
                <div class="col-md-12 mb-2 p-0 pb-2">
                    <div class="d-flex justify-content-between">
                        <p class="p_cost" style="font-size:16px;">Tổng cộng</p>
                        <p class="p_cost" style="font-size:21px; color:#07503d;"><?php echo number_format($donhang['tongtien'], 0, ",", ".") . " ₫"; ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>