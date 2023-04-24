<?php
require "views/Admin/templates/header.php";
if(!isset($_SESSION)) {
    session_start();
}
if (isset($_SESSION['LoginOK']) && $_SESSION['LoginOK'][0] == "1" || $_SESSION['LoginOK'][0] == "2") {
    $ql = explode("_", $_SESSION['LoginOK']);
?>
<head>
    <title>Thêm bài viết</title>
</head>
<!-- Start Content-->
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="index.php">Parfumerie</a></li>
                        <li class="breadcrumb-item"><a href="index.php?controller=NhaCungCap">Quản lý cửa hàng</a></li>
                        <li class="breadcrumb-item"><a href="index.php?controller=BaiViet">Blog/Kiến thức</a></li>
                        <li class="breadcrumb-item active">Thêm blog/kiến thức</li>
                    </ol>
                </div>
                <h4 class="page-title">Thêm blog/kiến thức</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-10 ms-auto me-auto">
            <a class="btn btn-danger mt-2 mb-2">Thêm blog/kiến thức</a>
            <div style="color: red">
                <?php echo '<span>' . $error . '</span>' ?>
            </div>
            <div style="color: warning" id="thong_bao">
                
            </div>
            <form action="" method="POST" class="needs-validation dropzone" id="myAwesomeDropzone" novalidate>
                <div class="row">
                    <div class="col-md-12 me-0">
                        <label class="form-label" for="validationCustom01">Phân loại</label>
                        <select class="form-select mb-3" name="phanloai" required>
                        <option value="" disabled selected>---</option>
                            <option value="0">Kiến thức</option>
                            <option value="1">Blog</option>
                        </select>
                    </div>
                    <div class="col-md-6 me-0">
                        <div class="mb-3">
                            <label class="form-label" for="validationCustom01">Nhập tiêu đề</label>
                            <div class="form-floating">
                                <textarea class="form-control" name="tieude" id="floatingTextarea" style="height: 100px;" required></textarea>
                                <label for="floatingTextarea">Tiêu đề</label>
                                <div class="invalid-feedback">
                                    Hãy nhập tiêu đề của bài viết!
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 me-0">
                        <div class="mb-3">
                            <label class="form-label" for="validationCustom01">Nhập mô tả</label>
                            <div class="form-floating">
                                <textarea class="form-control" name="mota" id="floatingTextarea" style="height: 100px;" required></textarea>
                                <label for="floatingTextarea">Mô tả</label>
                                <div class="invalid-feedback">
                                    Hãy nhập mô tả của bài viết!
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->
                </div>
                <div class="row mb-2">
                    <div class="col-12">
                        <button class="btn btn-primary mt-2" id="submit-all" name="submit" type="submit">Thêm bài viết</button>
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
<script src="js/ajax_admin.js"></script>
<script>
    check("sodienthoai", "index.php?controller=NhaCungCap&action=checkDienThoai", "sdtHelp", "Số điện thoại hợp lệ!", "Số điện thoại đã tồn tại!");
    check("email", "index.php?controller=NhaCungCap&action=checkEmail", "emailHelp", "Email hợp lệ!", "Email đã tồn tại!");
    function validationForm(){
        check_return("sodienthoai", "index.php?controller=NhaCungCap&action=checkDienThoai", function(result){
            if(result==true){
                check_return("email", "index.php?controller=NhaCungCap&action=checkEmail", function(result){
                    if(result==true){
                        if(checkMail("email")){
                            return true;
                        }else{
                            $("#thong_bao").text("Các thông tin về email và số điện thoại chưa hợp lệ!").css('color', 'red')
                            return false;
                        }
                    }else{
                        $("#thong_bao").text("Các thông tin về email và số điện thoại chưa hợp lệ!").css('color', 'red')
                        return false;
                    }
                })
            }else{
                $("#thong_bao").text("Các thông tin về email và số điện thoại chưa hợp lệ!").css('color', 'red')
                return false;
            }
        })
    }
</script>
<?php
}
else{
    header("location: index.php");
}
?>