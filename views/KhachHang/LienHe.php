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
        <div class="row mt-3">
            <div class="col-md-12">
                <div id="mapDiv">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.914661738!2d106.65433091471805!3d10.741060392345517!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752f03e7e4d53d%3A0x29347ba63f5fef68!2sPARFUMERIE!5e0!3m2!1svi!2s!4v1676966370786!5m2!1svi!2s" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
    </div>
</main>
    
<?php
require("views/template/footer.php");
?>