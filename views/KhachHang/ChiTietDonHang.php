<?php
require("views/template/header.php");
?>
<main class="bg-white">
    <div class="container-fluid" style="background-color: #F9F9F9">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php" class="text-decoration-none p-14 text-dark">Trang chủ</a></li>
                    <li class="breadcrumb-item"><a href="index.php" class="text-decoration-none p-14 text-dark">Trang tài khoản</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><span class="p-14 text-dark">Chi tiết đơn hàng</span></li>
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
                    <p class="p-14"><a href="index.php?controller=khachhang&action=DoiMatKhau" class="text-decoration-none text-dark">Đổi mật khẩu</a></p>
                    <p class="p-14"><a href="index.php?controller=khachhang&action=SoDiaChi" class="text-decoration-none text-dark">Sổ địa chỉ (1)</a></p>
                </div>
            </div>
            <div class="col-md-9 mb-4">
                <p class="p-14 text-end">Ngày đặt hàng: 21/02/2023</p>
                <h5>Chi tiết đơn hàng #2738</h5>
                <div class="row">
                    <div class="col-md-6">
                        <span class="p-14">Trạng thái thanh toán: <span class="p-15-bold fst-italic text-main">Chưa thanh toán</span></span>
                    </div>
                    <div class="col-md-6">
                        <span class="p-14">Trạng thái vận chuyển: <span class="p-15-bold fst-italic text-main">Chưa giao hàng</span></span>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-6 mb-5">
                        <p class="mb-1">ĐỊA CHỈ GIAO HÀNG</p>
                        <div class="col-md-12 ps-3 pe-3 border" style="height: 100%">
                            <div class="col-md-12">
                                <p class="p-15-bold mb-2">ĐÀO DUY ĐÁN</p>
                                <p class="p-14 mb-2">Địa chỉ: Ha Noi, Huyện Phú Xuyên, Hà Nội</p>
                                <p class="p-14">Số điện thoại: +84366887398</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 mb-5">
                        <p class="mb-1">THANH TOÁN</p>
                        <div class="col-md-12 ps-3 pe-3 border" style="height: 100%">
                            <div class="col-md-12 p-2">
                                <p class="p-14">Thanh toán khi giao hàng (COD)</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 mb-5">
                        <p class="mb-1">GHI CHÚ</p>
                        <div class="col-md-12 ps-3 pe-3 border" style="height: 100%">
                            <div class="col-md-12 p-2">
                                <p class="p-14">Không có ghi chú</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-5">
                    <div>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">Sản phẩm</th>
                                    <th scope="col">Đơn giá</th>
                                    <th scope="col">Số lượng</th>
                                    <th scope="col">Tổng</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td style="width: 50%">
                                        <div class="row">
                                            <div class="col-md-5">
                                                <img src="images\nuocHoaNam\Roja Dove\Roja Dove Elysium Pour Homme Parfum Cologne\7.jpg" alt="">
                                            </div>
                                            <div class="col-md-7 ps-4">
                                                <p class="p-15 mb-0">Dior Sauvage EDP</p>
                                                <p class="p-14 mb-4">Nam / Pháp / Chiết 10ml</p>
                                                <p class="p-15-bold mb-0">Mã sản phẩm: PVN1898</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>325.000đ</td>
                                    <td>1</td>
                                    <td>325.000đ</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="row mt-5">
                    <div>
                        <table class="table table-bordered p-14">
                            <tbody>
                                <tr>
                                    <td>Khuyến mãi</td>
                                    <td>0đ</td>
                                </tr>
                                <tr>
                                    <td>Phí vận chuyển</td>
                                    <td>29.00đ (Phí vận chuyển)</td>
                                </tr>
                                <tr>
                                    <td>Tổng tiền</td>
                                    <td>
                                        <p class="p-15-bold text-main mb-0">354.000đ</p>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<?php
require("views/template/footer.php");
?>