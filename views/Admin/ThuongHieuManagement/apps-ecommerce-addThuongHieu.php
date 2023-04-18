<?php
require "views/Admin/templates/header.php";
if(!isset($_SESSION)) {
    session_start();
}
if (isset($_SESSION['LoginOK']) && $_SESSION['LoginOK'][0] == "1" || $_SESSION['LoginOK'][0] == "2") {
    $ql = explode("_", $_SESSION['LoginOK']);
$characters = '01234567890123456789ABCDEFGHIJKLMNOPQRSTUVWXYZABCDEFGHIJKLMNOPQRSTUVWXYZ';
$randomString = str_shuffle($characters);
$id_thuonghieu = substr($randomString, 0, 11);
?>
<head>
    <title>Thêm thương hiệu</title>
</head>
<!-- Start Content-->
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="index.php">Parfumerie</a></li>
                        <li class="breadcrumb-item"><a href="index.php?controller=nhanvien">Quản lý cửa hàng</a></li>
                        <li class="breadcrumb-item"><a href="index.php?controller=ThuongHieu">Thương hiệu</a></li>
                        <li class="breadcrumb-item active">Thêm thương hiệu</li>
                    </ol>
                </div>
                <h4 class="page-title">Thêm thương hiệu</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-10 ms-auto me-auto">
            <a class="btn btn-danger mt-2 mb-2">Thêm thương hiệu</a>
            <div style="color: red">
                <?php echo '<span>' . $error . '</span>' ?>
            </div>
            <form action="" method="post" class="needs-validation dropzone" id="myAwesomeDropzone" enctype="multipart/form-data" onsubmit="return validateForm()" novalidate>
                <div class="row">
                    <div class="col-md-6 ms-0">
                        <div class="mb-3">
                            <label class="form-label" for="validationCustom01">Mã thương hiệu</label>
                            <input type="text" class="form-control" name="id_thuonghieu" value="<?php echo $id_thuonghieu ?>" id="validationCustom01" readonly required>
                        </div>
                    </div>
                    <div class="col-md-6 me-0">
                        <div class="mb-3">
                            <label class="form-label" for="validationCustom01">Nhập tên thương hiệu</label>
                            <input type="text" class="form-control" name="ten_thuonghieu" id="validationCustom01" placeholder="Tên thương hiệu" required>
                            <div class="invalid-feedback">
                                Hãy nhập tên thương hiệu!
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->
                </div>
                <div class="row mb-2">
                    <div class="col-12">
                        <button class="btn btn-primary mt-2" id="submit-all" name="submit" type="submit">Thêm thương hiệu</button>
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
<?php
require "views/Admin/templates/footer.php";
}
else{
    header("location: index.php");
}
?>