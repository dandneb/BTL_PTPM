<?php
require("views/template/header.php");
?>
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
                <p class="p-14-bold">Xin chào, Đào Duy Đán</p>
                <div class="mt-3">
                    <p class="p-14"><a href="" class="text-decoration-none text-dark">Thông tin tài khoản</a></p>
                    <p class="p-14"><a href="" class="text-decoration-none text-dark">Đơn hàng của bạn</a></p>
                    <p class="p-14"><a href="" class="text-decoration-none text-dark">Đổi mật khẩu</a></p>
                    <p class="p-14"><a href="" class="text-decoration-none text-dark">Sổ địa chỉ (1)</a></p>
                </div>
            </div>
            <div class="col-md-9">
                <div class="border-bottom">
                    <h5>ĐỊA CHỈ CỦA BẠN</h5>
                    <div class="mb-3">
                        <button class="btn btn-submit rounded-0" type="button">THÊM ĐỊA CHỈ</button>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-9">
                        <p class="p-14-bold mt-4">Họ tên: <span class="p-14">Đào Duy Đán</span> <span class="text-success ms-3" style="font-size:10px;">Địa chỉ mặc định</span></p>
                        <p class="p-14-bold mt-3">Địa chỉ: <span class="p-14">Ha Noi, Xã Phú Yên, Huyện Phú Xuyên, Hà Nội, Vietnam</span></p>
                        <p class="p-14-bold mt-3">Điện thoại: <span class="p-14">0366887398</span></p>
                        <p class="p-14-bold mt-3">Công ty: <span class="p-14">Ha Noi</span></p>
                    </div>
                    <div class="col-md-3 d-flex justify-content-center align-items-center">
                        <button class="btn rounded-0 text-success" style="background-color: unset;" type="button">Chỉnh sửa địa chỉ</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<?php
require("views/template/footer.php");
?>