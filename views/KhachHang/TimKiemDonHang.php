<?php
require("views/template/header.php");
?>
<head>
    <title>Liên hệ</title>
</head>
<main class="bg-white">
    <div class="container-fluid" style="background-color: #F9F9F9">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php" class="text-decoration-none p-14 text-dark">Trang chủ</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><span class="p-14 text-dark">Tìm kiếm đơn hàng</span></li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="container border pb-3 pt-3">
        <div class="row">
            <div class="col-md-12">
                <?php
                    if(isset($_SESSION['success'])){
                        echo '<span class="text-success">'.$_SESSION['success'].'</span>';
                        unset($_SESSION['success']);
                    }
                    else if(isset($_SESSION['error'])){
                        echo '<span class="text-danger">'.$_SESSION['error'].'</span>';
                        unset($_SESSION['error']);
                    }
                ?>
                <h5 class="text-center">TÌM KIẾM ĐƠN HÀNG</h5>
                <form class="row g-3 needs-validation" action="index.php?controller=KhachHang" method="GET" novalidate>
                    <div class="col-md-12">
                        <label for="validationCustom01 p-14-bold" class="form-label ms-auto me-auto">Nhập mã đơn hàng của bạn<span style="color:red;">*</span></label>
                        <input type="text" name="controller" value="KhachHang" hidden>
                        <input type="text" name="action" value="ThongTinDonHang" hidden>
                        <input type="text" name="id_donhang" class="form-control" id="validationCustom01" required>
                        <div class="invalid-feedback">
                            Vui lòng nhập mã đơn hàng của bạn!
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div>
                            <button class="btn btn-success rounded-0" type="submit">TÌM KIẾM</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>
    
<?php
require("views/template/footer.php");
?>