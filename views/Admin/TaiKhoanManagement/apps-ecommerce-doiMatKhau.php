<?php
require "views/Admin/templates/header.php";
if(!isset($_SESSION)) {
    session_start();
}
if (isset($_SESSION['LoginOK']) && $_SESSION['LoginOK'][0] == "2") {
    $ql = explode("_", $_SESSION['LoginOK']);
?>
<head>
    <style>
        .form-control.is-valid, .was-validated .form-control:valid{
            border-color: none;
            padding-right: calc(1.5em + 0.9rem);
            background-image: none;
            background-repeat: no-repeat;
            background-position: right calc(0.375em + 0.225rem) center;
            background-size: calc(0.75em + 0.45rem) calc(0.75em + 0.45rem);
        }
        .form-control.is-valid, .was-validated .form-control:valid{
            border-color: none !important;
        }
    </style>
    <title>Đổi mật khẩu</title>
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
                        <li class="breadcrumb-item"><a href="index.php?controller=TaiKhoan">Tài khoản</a></li>
                        <li class="breadcrumb-item active">Đổi mật khẩu</li>
                    </ol>
                </div>
                <h4 class="page-title">Đổi mật khẩu</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-10 ms-auto me-auto">
            <a class="btn btn-danger mt-2 mb-2">Đổi mật khẩu</a>
            <div style="color: red">
                <?php echo '<span>' . $error . '</span>' ?>
            </div>
            <div class="row mb-2">
                <div class="col-sm-12">
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
                </div>
            </div>
            <div style="color: warning" id="thong_bao">
                
            </div>
            <form action="" method="post" class="needs-validation dropzone" id="myAwesomeDropzone" enctype="multipart/form-data" onsubmit="return validationForm()" novalidate>
                <div class="row">
                    <div class="col-md-12 ms-0">
                        <div class="mb-3">
                            <label class="form-label" for="validationCustom01">Mã người dùng</label>
                            <input type="text" class="form-control" name="id_nguoidung" value="<?php echo $id_nguoidung ?>" id="validationCustom01" readonly required>
                        </div>
                    </div>
                    <div class="col-md-6 me-0">
                        <div class="mb-3">
                            <label class="form-label" for="matkhau_1">Nhập mật khẩu</label>
                            <input type="text" class="form-control" name="matkhau_1" id="matkhau_1" required>
                            <div class="invalid-feedback">
                                Hãy nhập mật khẩu!
                            </div>
                            <span id="matKhauHelp" class="p-13"></span>
                        </div>
                    </div>
                    <div class="col-md-6 me-0">
                        <div class="mb-3">
                            <label class="form-label" for="matkhau_2">Nhập lại mật khẩu</label>
                            <input type="text" class="form-control" name="matkhau_2" id="matkhau_2" required>
                            <div class="invalid-feedback">
                                Hãy nhập mật khẩu!
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->
                </div>
                <div class="row mb-2">
                    <div class="col-12 d-flex justify-content-end">
                        <button class="btn btn-primary mt-2" id="submit-all" name="submit" type="submit">Đổi mật khẩu</button>
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
?>
<script>
    function validationForm(){
        if($("#matkhau_1").val() === $("#matkhau_2").val() && $("#matkhau_1").val().length >= 8){
            return true;
        }else{
            $("#matKhauHelp").text("Mật khẩu chưa trùng khớp và phải đủ 8 ký tự trở lên!").css('color', 'red');
            return false;
        }
    }
</script>
<?php
}else{
    header("location: index.php");
}
?>
