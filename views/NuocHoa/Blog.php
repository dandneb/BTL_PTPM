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
                    <li class="breadcrumb-item active" aria-current="page"><span class="p-14 text-dark">Sổ địa chỉ</span></li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="container pb-3 mt-5">
        <div class="row">
            <div class="col-md-3">
                <table class="table table-bordered table-sidebar">
                    <tbody>
                        <tr><td class="text-uppercase" style="font-weight: bold;">Danh mục</td></tr>
                        <tr><td><a href="index.php" class="text-dark">Trang chủ</a></td></tr>
                        <tr><td><a href="index.php" class="text-dark">Giới thiệu</a></td></tr>
                        <tr><td><a href="index.php" class="text-dark">Thương hiệu</a></td></tr>
                        <tr><td><a href="index.php" class="text-dark">Nước hoa</a></td></tr>
                        <tr><td><a href="index.php" class="text-dark">Kiến thức</a></td></tr>
                        <tr><td><a href="index.php" class="text-dark">Blog</a></td></tr>
                        <tr><td><a href="index.php" class="text-dark">Liên hệ</a></td></tr>
                        <tr><td class="text-uppercase" style="font-weight: bold;">Nổi bật</td></tr>
                    </tbody>
                </table>
            </div>
            <div class="col-md-9">

            </div>
        </div>
    </div>
</main>
<?php
require("views/template/footer.php");
?>