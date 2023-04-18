<?php
require("views/template/header.php");
?>
<head>
    <title>Sản phẩm yêu thích</title>
</head>
<main class="bg-white">
    <div class="container-fluid" style="background-color: #F9F9F9">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php" class="text-decoration-none p-14 text-dark">Trang chủ</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><span class="p-14 text-dark">Danh sách sản phẩm yêu thích</span></li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="container pb-3 mt-4">
        <div class="row">
            <h4>Danh sách sản phẩm yêu thích</h4>
            <div>
                <input type="text" class="form-control rounded-0" style="width: 270px;" placeholder="Tìm kiếm sản phẩm">
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-2">
                <img src="images\nuocHoaNam\Roja Dove\Roja Dove Elysium Pour Homme Parfum Cologne\7.jpg" alt="">
            </div>
            <div class="col-md-7 ps-4">
                <p class="p-15-bold text-main me-4">Dior Sauvage EDP</p>
                <p class="p-15-bold text-main me-4">Nam / Pháp / Chiết 10ml</p>
                <p class="p-16-bold text-main me-4">375.000₫</p>
                <p class="p-14">Nước hoa nam Dior Sauvage EDP đậm chất nam tính, mạnh mẽ, cuốn hút từ tầng hương đời thường và chinh phục những người khó tính nhất.</p>
            </div>
            <div class="col-md-3">
                <div>
                    <button class="btn rounded-0 text-success p-14 border mb-4" style="background-color: unset;" type="button">Thêm vào giỏ hàng</button> <br>
                    <a href="" class="text-success p-14">Xóa sản phẩm</a>
                </div>
            </div>
        </div>
    </div>
</main>
<?php
require("views/template/footer.php");
?>