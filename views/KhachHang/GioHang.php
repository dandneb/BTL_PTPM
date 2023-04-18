<?php
require("views/template/header.php");
?>
<head>
    <title>Giỏ hàng</title>
</head>
<main class="bg-white">
    <div class="container-fluid" style="background-color: #F9F9F9">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php" class="text-decoration-none p-14 text-dark">Trang chủ</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><span class="p-14 text-dark">Giỏ hàng</span></li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="container pb-3 border">
        <div class="row border-bottom">
            <div class="col-md-12 mt-3">
                <h5>Giỏ hàng <span class="p-15 slsp"></span></h5>
            </div>
        </div>
        <form class="row border-bottom row-main-giohang">
            <div class="col-md-9 gio_hang">
                
            </div>
            <div class="col-md-3">
                <div class="row border-bottom" style="padding: 15px 0px;">
                    <div class="col-md-12 d-flex flex-row justify-content-between">
                        <span class="p_cost">Tạm tính:</span>
                        <span class="p_cost tam-tinh"></span>
                    </div>
                </div>
                <div class="row" style="padding: 15px 0px;">
                    <div class="col-md-12 d-flex flex-row justify-content-between mb-4">
                        <span class="p_cost mt-2">Thành tiền:</span>
                        <span class="p_cost thanh-tien" style="font-size:21px; color:#07503d;"></span>
                    </div>
                    <div class="col-md-12">
                        <a class="btn btn-success" href="index.php?controller=KhachHang&action=MuaHang" style="width: 100%;">MUA NGAY</a>
                    </div>
                    <div class="col-md-12 mt-2">
                        <a class="btn" href="index.php" type="submit" style="width: 100%; background-color: white; color: #07503d; border: 1px solid #07503d">TIẾP TỤC MUA HÀNG</a>
                    </div>
                </div>
            </div>
        </form>
    </div>
</main>
<script src="js/gioHang.js" id="script-giohang"></script>
<?php
require("views/template/footer.php");
?>