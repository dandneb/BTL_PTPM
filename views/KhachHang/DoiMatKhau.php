<?php
require("views/template/header.php");
?>
<main class="bg-white">
    <div class="container-fluid" style="background-color: #F9F9F9">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php" class="text-decoration-none p-14 text-dark">Trang chủ</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><span class="p-14 text-dark">Thay đổi mật khẩu</span></li>
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
                    <p class="p-14"><a href="index.php?controller=khachhang" class="text-decoration-none text-dark">Thông tin tài khoản</a></p>
                    <p class="p-14"><a href="index.php?controller=khachhang&action=DonHang" class="text-decoration-none text-dark">Đơn hàng của bạn</a></p>
                    <p class="p-14-bold mb-3"><a href="index.php?controller=khachhang&action=DoiMatKhau" class="text-decoration-underline text-dark">Đổi mật khẩu</a></p>
                    <p class="p-14"><a href="index.php?controller=khachhang&action=SoDiaChi" class="text-decoration-none text-dark">Sổ địa chỉ (<?php echo count($data) ?>)</a></p>
                </div>
            </div>
            <div class="col-md-9">
                <h5>ĐỔI MẬT KHẨU</h5>
                <p class="p-14">Để đảm bảo tính bảo mật vui lòng đặt mật khẩu với ít nhất 8 kí tự</p>
                <form class="row g-3 needs-validation" action="index.php?controller=khachhang&action=doimatkhau" method="POST" novalidate>
                    <div class="col-md-12">
                        <label for="validationCustom01 p-14-bold" class="form-label">Mật khẩu cũ<span style="color:red;">*</span></label>
                        <input type="password" class="form-control rounded-0" id="matkhaucu" name="matkhaucu" placeholder="Mật khẩu cũ" required>
                        <div class="invalid-feedback">
                            Vui lòng nhập mật khẩu cũ của bạn!
                        </div>
                    </div>
                    <div class="col-md-12">
                        <label for="validationCustom02 p-14-bold" class="form-label">Mật khẩu mới<span style="color:red;">*</span></label>
                        <input type="password" class="form-control rounded-0" id="matkhaumoi_1" name="matkhaumoi_1" placeholder="Mật khẩu mới" required>
                        <div class="invalid-feedback">
                            Vui lòng nhập mật khẩu mới của bạn!
                        </div>
                    </div>
                    <div class="col-md-12">
                        <label for="validationCustom03 p-14-bold" class="form-label">Xác nhận lại mật khẩu<span style="color:red;">*</span></label>
                        <input type="password" class="form-control rounded-0" id="matkhaumoi_2" name="matkhaumoi_2" placeholder="Xác nhận lại mật khẩu" required>
                        <div class="invalid-feedback">
                            Vui lòng nhập lại mật khẩu mới của bạn!
                        </div>
                    </div>
                    <div>
                        <button class="btn btn-submit rounded-0" type="submit" name = "submit">ĐẶT LẠI MẬT KHẨU</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>
<?php
require("views/template/footer.php");
?>