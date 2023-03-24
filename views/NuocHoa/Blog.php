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
            <div class="col-md-9 border">
                <div class="row mt-2">
                    <h5>Blog</h5>
                    <div class="col-md-12">
                        <a class="blog-item-thumbnail" href="index.php?controller=NuocHoa&action=Blog_ThongTin">
                            <img src="images\blog\20_02_2023_XGAUSH87\nuoc-hoa-huong-thom-da-thit-parfumerievn.jpg" alt="">
                        </a>
                        <div class="blog-items-main">
                            <div>
                                <a><h6>Hương thơm da thịt - Xu hướng mùi hương đang rất được yêu thích</h6></a>
                                <p class="post-time">20/02/2023 - PARFUMERIEVN</p>
                            </div>
                            <p class="mt-3">Sở dĩ có tên gọi là mùi hương da thịt vì hương thơm của những chai nước hoa này vô cùng nhẹ nhàng, khi dùng sẽ hoà với mùi cơ thể tạo ra một hương thơm tự nhiên, nhẹ tênh, dễ chịu, đôi khi hương thơm nhẹ đến nỗi chỉ thoang thoảng trên da, những ai kề cận sát bên mới ...</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<?php
require("views/template/footer.php");
?>