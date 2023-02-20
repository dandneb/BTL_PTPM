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
    <div class="container border pb-3 pt-3">
        <div class="row">
            <div class="col-md-4">
                <h5>LIÊN HỆ</h5>
                <div class="d-flex flex-row">
                    <div class="d-flex align-items-center pe-3">
                        <span class="material-icons p-14">
                            location_on
                        </span>
                    </div>
                    <div>
                        <span class="p-14">1F Quốc lộ 50 (Liên Tỉnh 5 cũ), Phường 5, Quận 8, TP. Hồ Chí Minh</span>
                    </div>
                </div>
                <div class="d-flex flex-row">
                    <div class="d-flex align-items-center pe-3">
                        <span class="material-icons p-14">
                            call
                        </span>
                    </div>
                    <div>
                        <span class="p-14">0888070308</span>
                    </div>
                </div>
                <div class="d-flex flex-row">
                    <div class="d-flex align-items-center pe-3">
                        <span class="material-icons p-14">
                            mail
                        </span>
                    </div>
                    <div>
                        <span class="p-14">info@parfumerie.vn</span>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <h5>GỬI THÔNG TIN</h5>
                <form class="row g-3 needs-validation" novalidate>
                    <div class="col-md-6">
                        <label for="validationCustom01 p-14-bold" class="form-label">Họ tên<span style="color:red;">*</span></label>
                        <input type="text" class="form-control" id="validationCustom01" required>
                        <div class="invalid-feedback">
                            Vui lòng nhập họ và tên của bạn!
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="validationCustom02 p-14-bold" class="form-label">Email<span style="color:red;">*</span></label>
                        <input type="text" class="form-control" id="validationCustom02" required>
                        <div class="invalid-feedback">
                            Vui lòng nhập email của bạn!
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label for="validationTextarea p-14-bold" class="form-label">Nội dung<span style="color:red;">*</span></label>
                            <textarea class="form-control" id="validationTextarea" required></textarea>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div>
                            <button class="btn btn-success rounded-0" type="submit">GỬI TIN NHẮN</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div id="mapDiv"></div>
            </div>
        </div>
    </div>
</main>
    
<?php
require("views/template/footer.php");
?>