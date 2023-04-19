<?php
if(!isset($_SESSION)) {
    session_start();
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <link rel="stylesheet" href="style/header.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>Mua hàng</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="style\swiper-bundle.min.css">
    <script src="js/jquery-3.6.4.min.js"></script>
    <style>
        body {
            font-family: "Segoe UI", "Roboto", "Helvetica Neue", Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol" !important;
            font-weight: 500 !important;
        }
        .card-thanh-toan img {
            width: 50px;
            height: 50px;
            object-fit: fill;
        }

        .card-thanh-toan .so_luong {
            background-color: #07503d;
            height: 17px;
            width: 18px;
            text-align: center;
            color: white;
            border-radius: 100%;
            position: absolute;
            top: -6px;
            right: -6px;
        }

        .p_cost {
            font-size: 14px;
            color: #717171;
            font-weight: 600;
        }
        input[readonly] {
            background-color: #f2f2f2; /* Thiết lập màu nền */
            pointer-events: none; /* Ngăn người dùng chỉnh sửa nội dung */
        }
        .accordion-body{
            background-color: #F8F8F8;
        }
    </style>
</head>

<body class="p-0 m-0 border-0" style="background-color: #FFF">
    <div class="container">
        <div class="row d-flex justify-content-center">
            <img class="logo" src="images\header\checkout_logo.png" alt="">
        </div>
        <form class="row g-3 needs-validation mt-3" onsubmit="return validateForm()" action="index.php?controller=khachhang&action=DatHang" method="post" style="display: flex;" novalidate>
            <div class="col-md-4 pe-4">
                <div class="row g-3 thong-tin">
                    <div class="col-md-12 d-flex justify-content-between">
                        <h5 class="">Thông tin mua hàng</h5>
                        <?php
                            if (!isset($_SESSION['LoginOK'])) {
                        ?>
                        <a class="d-flex align-items-center text-success" href="index.php?controller=KhachHang&action=DangNhap&purchase=">
                            <span class="material-icons">
                                account_circle
                                </span>
                            <span class="p-14 ms-1">Đăng nhập</span>
                        </a>
                        <?php
                        }else{
                            ?>
                        <a class="d-flex align-items-center text-success" href="index.php?controller=KhachHang&action=DangXuat&purchase=">
                            <span class="material-icons">
                                logout
                                </span>
                            <span class="p-14 ms-1">Đăng xuất</span>
                        </a>
                            <?php
                        }
                        ?>
                    </div>
                    <?php
                    if (isset($_SESSION['LoginOK'])) {
                    ?>
                    <div class="col-md-12">
                        <label for="sodiachi" class="form-label">Sổ địa chỉ</label>
                        <select class="form-select rounded-0 p-14-bold" id="sodiachi" name="sodiachi">
                            <option selected disabled value="">Địa chỉ khác...</option>
                            <?php
                            for($i = 0; $i < count($dsDiaChi); $i++){
                                echo '<option value="'.$i.'">'.$dsDiaChi[$i].'</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <div class="col-md-12">
                        <label for="email" class="form-label">Email</label>
                        <input type="text" class="form-control p-14-bold" id="email" name="email" value="<?php echo $kh[3] ?>" readonly>
                    </div>
                    <?php
                    }else{
                    ?>
                    <div class="col-md-12">
                        <label for="email" class="form-label">Email</label>
                        <input type="text" class="form-control p-14-bold" id="email" name="email" placeholder="Email (tùy chọn)">
                    </div>
                    <?php
                    }
                    ?>
                    <div class="col-md-12">
                        <label for="hoten" class="form-label">Họ và tên</label>
                        <input type="text" class="form-control p-14-bold thongTinMuaHang" name="hoten" id="hoten" placeholder="Họ và tên" required>
                        <div class="invalid-feedback">
                            Hãy nhập tên của bạn!
                        </div>
                    </div>
                    <div class="col-md-12">
                        <label for="dienthoai" class="form-label">Số điện thoại</label>
                        <input type="text" class="form-control p-14-bold thongTinMuaHang" name="dienthoai" id="dienthoai" placeholder="Số điện thoại" required>
                        <div class="invalid-feedback">
                            Hãy nhập số điện thoại của bạn!
                        </div>
                    </div>
                    <div class="col-md-12">
                        <label for="diachi" class="form-label">Địa chỉ</label>
                        <input type="text" class="form-control p-14-bold thongTinMuaHang" name="diachi" id="diachi" placeholder="Địa chỉ (VD: Số nhà - Đường/Thôn)" required>
                        <div class="invalid-feedback">
                            Hãy nhập địa chỉ của bạn!
                        </div>
                    </div>
                    <div class="col-md-12">
                        <label for="tinhthanh" class="form-label">Tỉnh thành</label>
                        <select class="form-select rounded-0 p-14-bold thongTinMuaHang" id="province" name="province" placeholder="Tỉnh thành" required>
                            <option selected disabled value="">---</option>
                        </select>
                        <input type="hidden" name="tinhthanh" id="tinhthanh">
                        <div class="invalid-feedback">
                            Hãy chọn tỉnh thành của bạn!
                        </div>
                    </div>
                    <div class="col-md-12">
                        <label for="quanhuyen" class="form-label">Quận huyện</label>
                        <select class="form-select rounded-0 p-14-bold thongTinMuaHang" id="district" name="district" placeholder="Quận huyện" disabled required>
                            <option selected disabled value="">---</option>
                        </select>
                        <input type="hidden" name="quanhuyen" id="quanhuyen">
                        <div class="invalid-feedback">
                            Hãy chọn quận/huyện của bạn!
                        </div>
                    </div>
                    <div class="col-md-12">
                        <label for="phuongxa" class="form-label">Phường xã</label>
                        <select class="form-select rounded-0 p-14-bold thongTinMuaHang" id="ward" name="ward" placeholder="Phường xã" disabled required>
                            <option selected disabled value="">---</option>
                        </select>
                        <input type="hidden" name="phuongxa" id="phuongxa">
                        <div class="invalid-feedback">
                            Hãy chọn phường/xã của bạn!
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-check">
                            <input class="form-check-input" value="1" name="diachikhac" id="diachikhac" type="checkbox">
                            <label class="form-check-label p-14-bold">
                                Giao hàng đến địa chỉ khác
                            </label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <textarea class="form-control rounded-0 p-14-bold" name="ghichu" placeholder="Ghi chú (tùy chọn)"></textarea>
                    </div>
                </div>
            </div>
            <div class="col-md-4 ps-4 pe-4">
                <div class="row">
                    <div class="col-md-12 mb-3 p-0">
                        <h5 class="">Thông tin mua hàng</h5>
                    </div>
                    <label for="email" class="form-label">Thông tin thanh toán</label>
                    <div class="alert alert-info rounded-0" style="padding: 6px 16px;" role="alert">
                        <span class="p-15">Vui lòng nhập thông tin giao hàng!</span>
                    </div>
                    <div class="col-md-12 p-0">
                        <div class="accordion accordion-flush border" id="accordionFlushExample">
                            <?php
                            foreach ($pTTT as $item){
                                $mota = preg_split('/\r\n|\r|\n/', $item['mota']);
                            ?>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="flush-heading<?php echo $item['id_phuongthucthanhtoan'] ?>">
                                    <div style="padding: 4px">
                                        <input class="collapsed" value="<?php echo $item['id_phuongthucthanhtoan'] ?>" style="width: 18px; height: 18px" name="thanh-toan" type="radio" data-bs-toggle="collapse" data-bs-target="#flush-collapse<?php echo $item['id_phuongthucthanhtoan'] ?>" aria-expanded="false" aria-controls="flush-collapse<?php echo $item['id_phuongthucthanhtoan'] ?>" required>
                                        </input>
                                        <span class="p-14-bold"><?php echo $item['ten'] ?></span>
                                    </div>
                                </h2>
                                <div id="flush-collapse<?php echo $item['id_phuongthucthanhtoan'] ?>" class="accordion-collapse collapse" aria-labelledby="flush-heading<?php echo $item['id_phuongthucthanhtoan'] ?>" data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body p_cost">
                                        <?php
                                        foreach($mota as $mt){
                                        ?>
                                        <p class="paragraph"><?php echo $mt ?></p>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 ps-4 pe-4">
                <div class="row">
                    <div class="col-md-12 mb-3 p-0 border-bottom pb-2">
                        <h5 class="">Đơn hàng (<?php echo $soluongsanpham; ?> sản phẩm)</h5>
                    </div>
                    <div class="col-md-12 mb-3 p-0 border-bottom pb-2">
                        <?php
                        for($i = 0; $i < count($gioHang); $i++) {
                            $item = $gioHang[$i];
                        ?>
                        <div class="card-thanh-toan mb-2">
                            <div class="row">
                                <div class="col-md-2" style="position: relative;">
                                    <img src="<?php echo $item['img_link'] ?>" alt="">
                                    <p class="p-12-bold so_luong"><?php echo $item['soluong'] ?></p>
                                </div>
                                <div class="col-md-6">
                                    <div>
                                        <p class="p-14-bold"><?php echo $item['ten_nuochoa'] ?></p>
                                        <p class="p-12"><?php echo $item['gioitinh']." / ".$item['xuatxu']." / Chiết ".$item['dungtich']."ml" ?></p>
                                    </div>
                                </div>
                                <div class="col-md-4 <?php echo $item['id_nuochoa'].$item['dungtich'] ?>">
                                    <p class="p_cost mb-0 <?php echo $item['id_nuochoa'].$item['dungtich']."p" ?>"><?php echo $khmodel->ps_price($item['dongia']*$item['soluong']) ?></p>
                                </div>
                            </div>
                        </div>
                        <?php
                        }
                        ?>
                    </div>
                    <div class="col-md-12 mb-2 p-0 border-bottom pb-2">
                        <div class="row mb-3">
                            <div class="col-md-8 mb-3">
                                <input type="text" name="magiamgia" id="magiamgia" class="form-control" placeholder="Mã giảm giá">
                                <span id="helpMGG" class="p-13"></span>
                            </div>
                            <div class="col-md-4">
                                <button id="btn-maGiamGia" class="btn btn-success p-14-bold text-white rounded-0" disabled type="button">Áp dụng</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 mb-2 p-0 border-bottom pb-2 thanh-tien">
                        <div class="d-flex justify-content-between">
                            <p class="p_cost">Tạm tính</p>
                            <p class="p_cost"><?php echo $khmodel->ps_price($tongtien) ?></p>
                        </div>
                        <div class="d-flex justify-content-between">
                            <p class="p_cost">Phí vận chuyển</p>
                            <p class="p_cost">-</p>
                        </div>
                    </div>
                    <div class="col-md-12 mb-2 p-0 border-bottom pb-2">
                        <div class="d-flex justify-content-between">
                            <p class="p_cost" style="font-size:16px;">Tổng cộng</p>
                            <p class="p_cost tong-tien" style="font-size:21px; color:#07503d;"><?php echo $khmodel->ps_price($tongtien) ?></p>
                        </div>
                        <div class="d-flex justify-content-end">
                            <button name="submit" class="btn btn-success rounded-0" type="submit">ĐẶT HÀNG</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <script>
        (() => {
            'use strict'
            const forms = document.querySelectorAll('.needs-validation')
            Array.from(forms).forEach(form => {
                form.addEventListener('submit', event => {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }
                    form.classList.add('was-validated')
                }, false)
            })
        })()
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.3.5/axios.min.js"></script>
    <script src="js/bluebird.core.min.js"></script>
    <script src="js/diachi.js"></script>
    <script src="js/ajax.js"></script>
    <script src="js/muaHang.js"></script>
</body>

</html>