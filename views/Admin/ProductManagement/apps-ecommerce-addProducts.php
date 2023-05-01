<?php
require "views/Admin/templates/header.php";
if(!isset($_SESSION)) {
    session_start();
}
if (isset($_SESSION['LoginOK']) && $_SESSION['LoginOK'][0] == "1" || $_SESSION['LoginOK'][0] == "2") {
    $ql = explode("_", $_SESSION['LoginOK']);
$characters = '01234567890123456789ABCDEFGHIJKLMNOPQRSTUVWXYZABCDEFGHIJKLMNOPQRSTUVWXYZ';
$randomString = str_shuffle($characters);
$id_nuochoa = substr($randomString, 0, 11);
?>
<head>
    <title>Thêm nước hoa</title>
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
                        <li class="breadcrumb-item"><a href="index.php?controller=nhanvien&action=sanpham">Nước hoa</a></li>
                        <li class="breadcrumb-item active">Thêm nước hoa</li>
                    </ol>
                </div>
                <h4 class="page-title">Thêm nước hoa</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-10 ms-auto me-auto">
            <a class="btn btn-danger mt-2 mb-2">Thêm nước hoa</a>
            <div style="color: red">
                <?php echo '<span>' . $error . '</span>' ?>
            </div>
            <form action="" method="post" class="needs-validation dropzone" id="myAwesomeDropzone" enctype="multipart/form-data" onsubmit="return validateForm()" novalidate>
                <div class="row">
                    <div class="col-md-6 ms-0">
                        <div class="mb-3">
                            <label class="form-label" for="validationCustom01">Mã nước hoa</label>
                            <input type="text" class="form-control" name="id_nuochoa" value="<?php echo $id_nuochoa ?>" id="validationCustom01" readonly required>
                        </div>
                    </div>
                    <div class="col-md-6 me-0">
                        <div class="mb-3">
                            <label class="form-label" for="validationCustom01">Nhập tên nước hoa</label>
                            <input type="text" class="form-control" name="ten_nuochoa" id="validationCustom01" placeholder="Tên nước hoa" required>
                            <div class="invalid-feedback">
                                Hãy nhập tên nước hoa!
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 me-0">
                        <label class="form-label" for="validationCustom01">Giới tính</label>
                        <select class="form-control form-select mb-3" name="gioitinh" required>
                            <option value="" disabled selected>---</option>
                            <option value="0">Nam</option>
                            <option value="1">Nữ</option>
                            <option value="2">Unisex</option>
                        </select>
                        <div class="invalid-feedback">
                            Hãy chọn giới tính!
                        </div>
                    </div>
                    <div class="col-md-6 me-0">
                        <div class="mb-3">
                            <label class="form-label" for="validationCustom01">Xuất xứ</label>
                            <input type="text" class="form-control" name="xuatxu" id="validationCustom01" placeholder="Xuất xứ" required>
                            <div class="invalid-feedback">
                                Hãy nhập xuất xứ của nước hoa!
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 me-0">
                        <div class="mb-3">
                            <div class="form-floating">
                                <textarea class="form-control" name="mota" placeholder="Leave a comment here" id="floatingTextarea" style="height: 100px;" required></textarea>
                                <label for="floatingTextarea">Mô tả</label>
                                <div class="invalid-feedback">
                                    Hãy nhập mô tả của nước hoa!
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 me-0">
                        <div class="mb-3">
                            <div class="form-floating">
                                <textarea class="form-control" name="thongtinchinh" placeholder="Leave a comment here" id="floatingTextarea" style="height: 100px;" required></textarea>
                                <label for="floatingTextarea">Thông tin chính</label>
                                <div class="invalid-feedback">
                                    Hãy nhập thông tin chính của nước hoa!
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 me-0">
                        <div class="mb-3">
                            <div class="form-floating">
                                <textarea class="form-control" name="tongquan" placeholder="Leave a comment here" id="floatingTextarea" style="height: 100px;" required></textarea>
                                <label for="floatingTextarea">Tổng quan</label>
                                <div class="invalid-feedback">
                                    Hãy nhập thông tin tổng quan của nước hoa!
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 me-0">
                        <div class="mb-3">
                            <label class="form-label" for="validationCustom01">Nhập nhóm nước hoa</label>
                            <input type="text" class="form-control" name="nhomnuochoa" id="validationCustom01" placeholder="Nhóm nước hoa" required>
                            <div class="invalid-feedback">
                                Hãy nhập nhóm nước hoa!
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 me-0">
                        <div class="mb-3">
                            <label class="form-label" for="validationCustom01">Nhập độ tuổi khuyên dùng</label>
                            <input type="text" class="form-control" name="dotuoikhuyendung" id="validationCustom01" placeholder="Độ tuổi khuyên dùng" required>
                            <div class="invalid-feedback">
                                Hãy nhập độ tuổi khuyên dùng của nước hoa!
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 me-0">
                        <div class="mb-3">
                            <label class="form-label" for="validationCustom01">Nhập năm ra mắt của nước hoa</label>
                            <input type="text" class="form-control" name="namramat" id="validationCustom01" placeholder="Năm ra mắt" required>
                            <div class="invalid-feedback">
                                Hãy nhập năm ra mắt của nước hoa!
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 me-0">
                        <div class="mb-3">
                            <label class="form-label" for="validationCustom01">Nhập nồng độ nước hoa</label>
                            <input type="text" class="form-control" name="nongdo" id="validationCustom01" placeholder="Nồng độ" required>
                            <div class="invalid-feedback">
                                Hãy nhập nồng độ của nước hoa!
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 me-0">
                        <div class="mb-3">
                            <label class="form-label" for="validationCustom01">Nhập nhà pha chế nước hoa</label>
                            <input type="text" class="form-control" name="nhaphache" id="validationCustom01" placeholder="Nhà pha chế" required>
                            <div class="invalid-feedback">
                                Hãy nhập nhà pha chế của nước hoa!
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 me-0">
                        <div class="mb-3">
                            <label class="form-label" for="validationCustom01">Nhập độ lưu hương của nước hoa</label>
                            <input type="text" class="form-control" name="doluuhuong" id="validationCustom01" placeholder="Độ lưu hương" required>
                            <div class="invalid-feedback">
                                Hãy nhập độ lưu hương của nước hoa!
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 me-0">
                        <div class="mb-3">
                            <label class="form-label" for="validationCustom01">Nhập phong cách của nước hoa</label>
                            <input type="text" class="form-control" name="phongcach" id="validationCustom01" placeholder="Phong cách" required>
                            <div class="invalid-feedback">
                                Hãy nhập phong cách của nước hoa!
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 me-0">
                        <div class="mb-3">
                            <label class="form-label" for="validationCustom01">Nhập độ tỏa hương của nước hoa</label>
                            <input type="text" class="form-control" name="dotoahuong" id="validationCustom01" placeholder="Độ tỏa hương" required>
                            <div class="invalid-feedback">
                                Hãy nhập độ tỏa hương của nước hoa!
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 me-0">
                        <div class="mb-3">
                            <label class="form-label" for="validationCustom01">Nhập thời điểm phù hợp sử dụng của nước hoa</label>
                            <input type="text" class="form-control" name="thoidiemphuhop" id="validationCustom01" placeholder="Thời điểm phù hợp" required>
                            <div class="invalid-feedback">
                                Hãy nhập thời điểm phù hợp sử dụng của nước hoa!
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 me-0">
                        <div class="mb-3">
                            <div class="form-floating">
                                <textarea class="form-control" name="huongthom" placeholder="Leave a comment here" id="floatingTextarea" style="height: 100px;" required></textarea>
                                <label for="floatingTextarea">Hương thơm</label>
                                <div class="invalid-feedback">
                                    Hãy nhập hương thơm của nước hoa!
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 me-0">
                        <div class="mb-3">
                            <div class="form-floating">
                                <textarea class="form-control" name="loai_huongthom" placeholder="Leave a comment here" id="floatingTextarea" style="height: 100px;" required></textarea>
                                <label for="floatingTextarea">Loại hương thơm</label>
                                <div class="invalid-feedback">
                                    Hãy nhập loại hương thơm của nước hoa!
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 me-0">
                        <div class="mb-3">
                            <div class="form-floating">
                                <textarea class="form-control" name="thietke" placeholder="Leave a comment here" id="floatingTextarea" style="height: 100px;" required></textarea>
                                <label for="floatingTextarea">Thiết kế</label>
                                <div class="invalid-feedback">
                                    Hãy nhập thiết kế của nước hoa!
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 me-0">
                        <div class="mb-3">
                            <div class="form-floating">
                                <textarea class="form-control" name="dadanghoa" placeholder="Leave a comment here" id="floatingTextarea" style="height: 100px;" required></textarea>
                                <label for="floatingTextarea">Đa dạng hóa</label>
                                <div class="invalid-feedback">
                                    Hãy nhập thông tin đa dạng hóa của nước hoa!
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 me-0">
                        <label class="form-label" for="validationCustom01">Chọn thương hiệu của nước hoa</label>
                        <select class="form-select mb-3" name="id_thuonghieu">
                            <?php

                            for ($i = 0; $i < count($thuonghieu); $i++) {
                                $th = $thuonghieu[$i];
                                if ($i == 0) {
                                    echo "<option value='{$th["id_thuonghieu"]}' selected>{$th["ten_thuonghieu"]}</option>";
                                } else {
                                    echo "<option value='{$th["id_thuonghieu"]}'>{$th["ten_thuonghieu"]}</option>";
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <div class="col-md-12 me-0">
                        <label class="form-label" for="validationCustom01">Chọn nhà cung cấp của nước hoa</label>
                        <select class="form-select mb-3" name="id_nhacungcap">
                            <?php
                            for ($i = 0; $i < count($nhacungcap); $i++) {
                                $ncc = $nhacungcap[$i];
                                if ($i == 0) {
                                    echo "<option value='{$ncc["id_nhacungcap"]}' selected>{$ncc["ten_nhacungcap"]}</option>";
                                } else {
                                    echo "<option value='{$ncc["id_nhacungcap"]}'>{$ncc["ten_nhacungcap"]}</option>";
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <!-- Dung tích 10 -->
                    <div class="col-md-4 me-0">
                        <div class="mb-3">
                            <label class="form-label" for="validationCustom01">Dung tích 10ML</label>
                            <input type="text" class="form-control" name="ML_10" id="validationCustom01" value="10" readonly>
                        </div>
                    </div>
                    <div class="col-md-4 me-0">
                        <div class="mb-3">
                            <label class="form-label" for="validationCustom01">Dung tích 10ML - Giá Nhập</label>
                            <input type="text" class="form-control" name="gia_nhap10" id="validationCustom01" required>
                            <div class="invalid-feedback">
                                Hãy điền giá nhập của nước hoa!
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 me-0">
                        <div class="mb-3">
                            <label class="form-label" for="validationCustom01">Dung tích 10ML - Giá Bán</label>
                            <input type="text" class="form-control" name="gia_ban10" id="validationCustom01" required>
                            <div class="invalid-feedback">
                                Hãy điền giá bán của nước hoa!
                            </div>
                        </div>
                    </div>

                    <!-- Dung tích 20 -->
                    <div class="col-md-4 me-0">
                        <div class="mb-3">
                            <label class="form-label" for="validationCustom01">Dung tích 20ML</label>
                            <input type="text" class="form-control" name="ML_20" id="validationCustom01" value="20" readonly>
                        </div>
                    </div>
                    <div class="col-md-4 me-0">
                        <div class="mb-3">
                            <label class="form-label" for="validationCustom01">Dung tích 20ML - Giá Nhập</label>
                            <input type="text" class="form-control" name="gia_nhap20" id="validationCustom01" required>
                            <div class="invalid-feedback">
                                Hãy điền giá nhập của nước hoa!
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 me-0">
                        <div class="mb-3">
                            <label class="form-label" for="validationCustom01">Dung tích 20ML - Giá Bán</label>
                            <input type="text" class="form-control" name="gia_ban20" id="validationCustom01" required>
                            <div class="invalid-feedback">
                                Hãy điền giá bán của nước hoa!
                            </div>
                        </div>
                    </div>

                    <!-- Dung tích 100  -->
                    <div class="col-md-4 me-0">
                        <div class="mb-3">
                            <label class="form-label" for="validationCustom01">Dung tích 100ML</label>
                            <input type="text" class="form-control" name="ML_100" id="validationCustom01" value="100" readonly>
                        </div>
                    </div>
                    <div class="col-md-4 me-0">
                        <div class="mb-3">
                            <label class="form-label" for="validationCustom01">Dung tích 100ML - Giá Nhập</label>
                            <input type="text" class="form-control" name="gia_nhap100" id="validationCustom01" required>
                            <div class="invalid-feedback">
                                Hãy điền giá nhập của nước hoa!
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 me-0">
                        <div class="mb-3">
                            <label class="form-label" for="validationCustom01">Dung tích 100ML - Giá Bán</label>
                            <input type="text" class="form-control" name="gia_ban100" id="validationCustom01" required>
                            <div class="invalid-feedback">
                                Hãy điền giá bán của nước hoa!
                            </div>
                        </div>
                    </div>

                    <div id="tab-content">
                        <div class="tab-pane show active" id="file-upload-preview">
                            <div class="fallback">
                                <input name="file[]" type="file" id="image" accept="image/png,image/jpeg,image/gif,image/ipg" style="display: none;" multiple>
                            </div>
                            <div class="dz-message needsclick">
                                <i class="h1 text-muted dripicons-cloud-upload"></i>
                                <h3>Thêm ảnh cho nước hoa.</h3>
                                <span class="text-muted font-13">(Chọn đúng định dạng file ảnh (png, jpg, jpeg, gif),
                                    <strong>tối thiểu</strong> 7 ảnh và <strong>tối đa</strong> 10 ảnh với kích thước <strong>tối đa</strong> 5MB.)</span>
                                <p id="soluong-image" style="text-align:center;"></p>
                                <p id="error-image" style="text-align:center; color: red;"></p>
                                <p id="success-image" style="text-align:center; color: green;"></p>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->
                </div>
                <div class="row mb-2">
                    <div class="col-12">
                        <button class="btn btn-primary mt-2" id="submit-all" name="submit" type="submit">Thêm</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

</div>
<!-- container -->

</div>
<!-- content -->


<script>
    var content = document.getElementById("tab-content");
    var image = document.getElementById("image");
    const acceptedImageTypes = ['image/png', 'image/jpeg', 'image/jpg', 'image/gif'];
    content.addEventListener("click", function() {
        image.click();
    })

    // Thêm sự kiện lắng nghe khi có file được chọn
    image.addEventListener("change", (event) => {
        var files = image.files;
        $("#soluong-image").html(files.length + " ảnh đã được chọn!")
        if (files.length < 7) {
            $("#error-image").html("Hãy thêm đủ 7 ảnh cho nước hoa!")
            $("#success-image").html("")
        }else if(files.length > 10){
            $("#error-image").html("Tối đa là 10 ảnh!")
            $("#success-image").html("")
        } else {
            check = true;
            Array.from(files).forEach((file, index) => {
                if (check == true) {
                    if (!acceptedImageTypes.includes(file.type)) {
                        $("#error-image").html(file.name + " không đúng định dạng!")
                        $("#success-image").html("")
                        check = false;
                    } else if (file.size > 5 * 1024 * 1024) {
                        $("#error-image").html(file.name + " có kích thước quá lớn!")
                        $("#success-image").html("")
                        check = false;
                    } else {
                        $("#error-image").html("")
                        $("#success-image").html("Perfect")
                    }
                } else {
                }
            })
        }
    });

    function check(){
        var files = image.files;
        if (files.length < 7) {
            return false;
        }else if(files.length > 10){
            return false;
        } else {
            check = true;
            Array.from(files).forEach((file, index) => {
                if (check == true) {
                    if (!acceptedImageTypes.includes(file.type)) {
                        check = false;
                        return false;
                    } else if (file.size > 5 * 1024 * 1024) {
                        check = false;
                        return false;
                    } else {
                        return true;
                    }
                } else {
                }
            })
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
require "views/Admin/templates/footer.php";
}
else{
    header("location: index.php");
}
?>