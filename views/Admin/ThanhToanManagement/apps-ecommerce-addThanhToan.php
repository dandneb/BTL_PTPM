<?php
require "views/Admin/templates/header.php";
if(!isset($_SESSION)) {
    session_start();
}
if (isset($_SESSION['LoginOK']) && $_SESSION['LoginOK'][0] == "2") {
    $ql = explode("_", $_SESSION['LoginOK']);
?>
<head>
    <title>Thêm phương thức thanh toán</title>
</head>
<!-- Start Content-->
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="index.php">Parfumerie</a></li>
                        <li class="breadcrumb-item"><a href="index.php?controller=NhanVien">Quản lý cửa hàng</a></li>
                        <li class="breadcrumb-item"><a href="index.php?controller=ThanhToan">Phương thức thanh toán</a></li>
                        <li class="breadcrumb-item active">Thêm phương thức thanh toán</li>
                    </ol>
                </div>
                <h4 class="page-title">Thêm phương thức thanh toán</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-10 ms-auto me-auto">
            <a class="btn btn-danger mt-2 mb-2">Thêm phương thức thanh toán</a>
            <div style="color: red">
                <?php echo '<span>' . $error . '</span>' ?>
            </div>
            <div style="color: warning" id="thong_bao">
                
            </div>
            <form action="" method="POST" class="needs-validation dropzone" id="myAwesomeDropzone" enctype="multipart/form-data" onsubmit="return validateForm()" novalidate>
                <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12 me-0">
                                <div class="mb-3">
                                    <label class="form-label" for="validationCustom01">Nhập tên phương thức thanh toán</label>
                                    <input type="text" class="form-control" name="ten" placeholder="Tên phương thức" required>
                                </div>
                            </div>
                            <div class="col-md-12 me-0">
                                <div class="mb-3">
                                    <label class="form-label" for="validationCustom01">Nhập mô tả</label>
                                    <div class="form-floating">
                                        <textarea class="form-control" name="mota" id="mota" style="height: 100px;" required></textarea>
                                        <label for="floatingTextarea">Mô tả</label>
                                        <div class="invalid-feedback">
                                            Hãy nhập mô tả của phương thức thanh toán!
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="tab-content">
                                <div class="tab-pane show active" id="file-upload-preview">
                                    <div class="fallback">
                                        <input name="file" type="file" id="image" accept="image/png,image/jpeg,image/gif,image/ipg" style="display: none;">
                                    </div>
                                    <div class="dz-message needsclick">
                                        <i class="h1 text-muted dripicons-cloud-upload"></i>
                                        <h3>Thêm ảnh minh họa cho phương thức thanh toán.</h3>
                                        <span class="text-muted font-13">(Chọn đúng định dạng file ảnh (png, jpg, jpeg, gif),
                                            <strong>chọn 1 ảnh</strong> với kích thước <strong>tối đa</strong> 5MB.)</span>
                                        <p id="soluong-image" style="text-align:center; color: green;"></p>
                                        <p id="error-image" style="text-align:center; color: red;"></p>
                                        <p id="success-image" style="text-align:center; color: green;"></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" name="submit" class="btn btn-primary">Thêm phương thức thanh toán</button>
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
    var content = document.getElementById("tab-content");
    var image = document.getElementById("image");
    content.addEventListener("click", function() {
        image.click();
    })
    const acceptedImageTypes = ['image/png', 'image/jpeg', 'image/jpg', 'image/gif'];
    image.addEventListener("change", (event) => {
        var files = image.files;
        file = files[0];
        if (files.length === 1) {
            if (!acceptedImageTypes.includes(file.type)) {
                $("#soluong-image").html(files.length + " file đã được chọn!")
                $("#error-image").html(file.name + " không đúng định dạng!")
                $("#success-image").html("")
                check = false;
            } else if (file.size > 5 * 1024 * 1024) {
                $("#soluong-image").html(files.length + " ảnh đã được chọn!")
                $("#error-image").html(file.name + " có kích thước quá lớn!")
                $("#success-image").html("")
                check = false;
            }else{
                $("#error-image").html('');
                $("#soluong-image").html(files.length + " ảnh đã được chọn!")
                $("#success-image").html("Perfect");
            }
        }
    });
    function check(){
        var files = image.files;
        if (files.length < 1) {
            return false;
        }else {
            file = files[0];
            if (!acceptedImageTypes.includes(file.type)) {
                check = false;
                return false;
            } else if (file.size > 5 * 1024 * 1024) {
                check = false;
                return false;
            } else {
                return true;
            }
        }
    }
    function validateForm() {
        if ($("#success-image").text() === "Perfect" && check() == true) {
            return true;
        } else {
            return false;
        }
    }

</script>
<?php
}
else{
    header("location: index.php");
}
?>