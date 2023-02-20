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
                <h5>ĐƠN HÀNG CỦA BẠN</h5>
                <div>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">Đơn hàng</th>
                                <th scope="col">Ngày</th>
                                <th scope="col">Địa chỉ</th>
                                <th scope="col">Giá trị đơn hàng</th>
                                <th scope="col">TT thanh toán</th>
                                <th scope="col">TT vận chuyển</th>
                                <th scope="col">Chi tiết</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Mark</td>
                                <td>Otto</td>
                                <td>@mdo</td>
                                <td>Mark</td>
                                <td>Otto</td>
                                <td>@mdo</td>
                                <td>@mdo</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>
<?php
require("views/template/footer.php");
?>