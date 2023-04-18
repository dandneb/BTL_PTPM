<?php
require("views/template/header.php");
?>
<head>
    <title>Quản lý tài khoản</title>
</head>
<main class="bg-white">
    <div class="container-fluid" style="background-color: #F9F9F9">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php" class="text-decoration-none p-14 text-dark">Trang chủ</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><span class="p-14 text-dark">Trang khách hàng</span></li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="container pb-3 mt-5">
        <div class="row">
            <div class="col-md-3">
                <h5>TRANG TÀI KHOẢN</h5>
                <p class="p-14-bold">Xin chào, <?php echo $kh[2] ?></p>
                <div class="mt-3">
                    <p class="p-14-bold mb-3"><a href="index.php?controller=khachhang" class="text-decoration-underline text-dark">Thông tin tài khoản</a></p>
                    <p class="p-14"><a href="index.php?controller=khachhang&action=DonHang" class="text-decoration-none text-dark">Đơn hàng của bạn</a></p>
                    <p class="p-14"><a href="index.php?controller=khachhang&action=DoiMatKhau" class="text-decoration-none text-dark">Đổi mật khẩu</a></p>
                    <p class="p-14"><a href="index.php?controller=khachhang&action=SoDiaChi" class="text-decoration-none text-dark">Sổ địa chỉ (<?php echo count($data) ?>)</a></p>
                </div>
            </div>
            <div class="col-md-9">
                <h5>THÔNG TIN KHÁCH HÀNG</h5>
                <p class="p-14-bold mt-4">Họ tên: <span class="p-14"><?php echo $data_kh['hoten'] ?></span></p>
                <p class="p-14-bold mt-3">Email: <span class="p-14"><?php echo $data_kh['email'] ?></span></p>
                <p class="p-14-bold mt-3">Điện thoại: <span class="p-14"><?php echo $data_kh['dienthoai'] ?></span></p>
            </div>
        </div>
    </div>
</main>
<?php
require("views/template/footer.php");
?>