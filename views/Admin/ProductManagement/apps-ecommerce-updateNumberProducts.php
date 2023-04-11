<?php
require "views/Admin/templates/header.php";
if (!isset($_SESSION)) {
    session_start();
}
if (isset($_SESSION['LoginOK']) && $_SESSION['LoginOK'][0] == "1" || $_SESSION['LoginOK'][0] == "2") {
    $ql = explode("_", $_SESSION['LoginOK']);
?>

    <!-- Start Content-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="index.php">Parfumerie</a></li>
                            <li class="breadcrumb-item"><a href="index.php?controller=nhanvien">Quản lý cửa hàng</a></li>
                            <li class="breadcrumb-item"><a href="index.php?controller=nhanvien&action=sanpham">Nước hoa</a></li>
                            <li class="breadcrumb-item active">Sửa nước hoa</li>
                            <li class="breadcrumb-item active">Cập nhật số lượng nước hoa</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Cập nhật số lượng nước hoa</h4>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-10 ms-auto me-auto">
                <a class="btn btn-danger mt-2 mb-2">Cập nhật số lượng nước hoa</a>
                <a class="btn btn-outline-secondary mt-2 mb-2" id="my_link">Mã nước hoa: <?php echo $id_nuochoa ?></a>
                <div class="row mb-2">
                    <div class="col-sm-12">
                        <?php
                        if (isset($_GET['success']))
                            echo '<span class="text-success">Cập nhật số lượng sản phẩm thành công!</span>';
                        else if (isset($_GET['error']))
                            echo '<span class="text-danger">Cập nhật số lượng sản phẩm thất bại!</span>';
                        ?>
                    </div>
                </div>
            </div>

            <div class="col-md-10 ms-auto me-auto d-flex justify-content-between">
                <form action="" method="post" class="needs-validation dropzone" id="myAwesomeDropzone" enctype="multipart/form-data" style="width:100%" novalidate>
                    <div class="row">
                        <div class="col-md-6 me-0">
                            <label class="form-label" for="dungtich">Chọn dung tích cần sửa số lượng</label>
                            <select class="form-select" name="dungtich" id="dungtich" required>
                                <option disabled selected value="">---</option>
                                <option value="10">10ML</option>
                                <option value="20">20ML</option>
                                <option value="100">100ML</option>
                            </select>
                            <div class="invalid-feedback">
                                Hãy chọn dung tích của sản phẩm cần cập nhật số lượng!
                            </div>
                        </div>
                        <div class="col-md-6 me-0">
                            <div class="mb-3">
                                <label class="form-label" for="validationCustom01">Chỉnh số lượng sản phẩm <label id="label_soluong"></label></label>
                                <input type="text" class="form-control" name="soluong" value="" id="soluong" placeholder="Nhập số lượng cần đổi" readonly required>
                                <div class="invalid-feedback">
                                    Hãy số lượng sản phẩm cần cập nhật!
                                </div>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-12">
                                <button class="btn btn-primary mt-2" id="submit-all" name="submit" type="submit">Chỉnh sửa số lượng</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
    <!-- container -->

    </div>
    <!-- content -->

    <!-- Footer Start -->
    <footer class="footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <script>
                        document.write(new Date().getFullYear())
                    </script> © Hyper - Coderthemes.com
                </div>
                <div class="col-md-6">
                    <div class="text-md-end footer-links d-none d-md-block">
                        <a href="javascript: void(0);">About</a>
                        <a href="javascript: void(0);">Support</a>
                        <a href="javascript: void(0);">Contact Us</a>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- end Footer -->
<script src="js/jquery-3.6.4.min.js"></script>
<script src="js/ajax_admin.js"></script>
<?php
    require "views/Admin/templates/footer.php";
} else {
    header("location: index.php");
}
?>