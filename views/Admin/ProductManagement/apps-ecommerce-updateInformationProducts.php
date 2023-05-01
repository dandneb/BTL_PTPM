<?php
require "views/Admin/templates/header.php";
if(!isset($_SESSION)) {
    session_start();
}
if (isset($_SESSION['LoginOK']) && $_SESSION['LoginOK'][0] == "1" || $_SESSION['LoginOK'][0] == "2") {
    $ql = explode("_", $_SESSION['LoginOK']);
?>
<head>
    <title>Sửa thông tin nước hoa</title>
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
                        <li class="breadcrumb-item active">Sửa nước hoa</li>
                        <li class="breadcrumb-item active">Sửa thông tin cơ bản của nước hoa</li>
                    </ol>
                </div>
                <h4 class="page-title">Sửa thông tin cơ bản của nước hoa</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-10 ms-auto me-auto">
            <a class="btn btn-danger mt-2 mb-2">Sửa thông tin cơ bản của nước hoa</a>
            <div style="color: red">
                <?php echo '<span>' . $error . '</span>' ?>
            </div>
            <form action="" method="post" class="needs-validation dropzone" id="myAwesomeDropzone" enctype="multipart/form-data" novalidate>
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
                            <input type="text" class="form-control" name="ten_nuochoa" value="<?php echo $nuochoa['ten_nuochoa'] ?>" id="validationCustom01" placeholder="Tên nước hoa" required>
                            <div class="invalid-feedback">
                                Hãy điền tên nước hoa cần sửa!
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 me-0">
                        <label class="form-label" for="validationCustom01">Giới tính</label>
                        <select class="form-select mb-3" name="gioitinh">
                            <?php
                            if($nuochoa['gioitinh'] == 0){
                                echo '<option value="0" selected>Nam</option>';
                            }else{
                                echo '<option value="0">Nam</option>';
                            }
                            if($nuochoa['gioitinh'] == 1){
                                echo '<option value="1" selected>Nữ</option>';
                            }else{
                                echo '<option value="1">Nữ</option>';
                            }
                            if($nuochoa['gioitinh'] == 2){
                                echo '<option value="2" selected>Unisex</option>';
                            }else{
                                echo '<option value="2">Unisex</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <div class="col-md-6 me-0">
                        <div class="mb-3">
                            <label class="form-label" for="validationCustom01">Xuất xứ</label>
                            <input type="text" class="form-control" name="xuatxu" value="<?php echo $nuochoa['xuatxu'] ?>" id="validationCustom01" placeholder="Xuất xứ" required>
                            <div class="invalid-feedback">
                                Hãy điền xuất xứ của nước hoa cần sửa!
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 me-0">
                        <div class="mb-3">
                            <div class="form-floating">
                                <textarea class="form-control" name="mota" placeholder="Leave a comment here" id="floatingTextarea" style="height: 100px;" required><?php echo $nuochoa['mota'] ?></textarea>
                                <label for="floatingTextarea">Mô tả</label>
                                <div class="invalid-feedback">
                                    Hãy điền mô tả của nước hoa cần sửa!
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 me-0">
                        <div class="mb-3">
                            <div class="form-floating">
                                <textarea class="form-control" name="thongtinchinh" placeholder="Leave a comment here" id="floatingTextarea" style="height: 100px;" required><?php echo $nuochoa['thongtinchinh'] ?></textarea>
                                <label for="floatingTextarea">Thông tin chính</label>
                                <div class="invalid-feedback">
                                    Hãy điền thông tin chính của nước hoa cần sửa!
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 me-0">
                        <div class="mb-3">
                            <div class="form-floating">
                                <textarea class="form-control" name="tongquan" placeholder="Leave a comment here" id="floatingTextarea" style="height: 100px;" required><?php echo $nuochoa['tongquan'] ?></textarea>
                                <label for="floatingTextarea">Tổng quan</label>
                                <div class="invalid-feedback">
                                    Hãy điền thông tin tổng quan của nước hoa cần sửa!
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 me-0">
                        <div class="mb-3">
                            <div class="form-floating">
                                <textarea class="form-control" name="huongthom" placeholder="Leave a comment here" id="floatingTextarea" style="height: 100px;" required><?php echo $nuochoa['huongthom'] ?></textarea>
                                <label for="floatingTextarea">Hương thơm</label>
                                <div class="invalid-feedback">
                                    Hãy điền hương thơm của nước hoa cần sửa!
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 me-0">
                        <div class="mb-3">
                            <div class="form-floating">
                                <textarea class="form-control" name="loai_huongthom" placeholder="Leave a comment here" id="floatingTextarea" style="height: 100px;" required><?php echo $nuochoa['loai_huongthom'] ?></textarea>
                                <label for="floatingTextarea">Loại hương thơm</label>
                                <div class="invalid-feedback">
                                    Hãy điền loại hương thơm của nước hoa cần sửa!
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 me-0">
                        <div class="mb-3">
                            <div class="form-floating">
                                <textarea class="form-control" name="thietke" placeholder="Leave a comment here" id="floatingTextarea" style="height: 100px;" required><?php echo $nuochoa['thietke'] ?></textarea>
                                <label for="floatingTextarea">Thiết kế</label>
                                <div class="invalid-feedback">
                                    Hãy điền thiết kế của nước hoa cần sửa!
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 me-0">
                        <div class="mb-3">
                            <div class="form-floating">
                                <textarea class="form-control" name="dadanghoa" placeholder="Leave a comment here" id="floatingTextarea" style="height: 100px;" required><?php echo $nuochoa['dadanghoa'] ?></textarea>
                                <label for="floatingTextarea">Đa dạng hóa</label>
                                <div class="invalid-feedback">
                                    Hãy điền thông tin đa dạng hóa của nước hoa cần sửa!
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 me-0">
                        <div class="mb-3">
                            <label class="form-label" for="validationCustom01">Nhập nhóm nước hoa</label>
                            <input type="text" class="form-control" name="nhomnuochoa" value="<?php echo $nuochoa['nhomnuochoa'] ?>" id="validationCustom01" placeholder="Nhóm nước hoa" required>
                            <div class="invalid-feedback">
                                Hãy điền nhóm nước hoa cần sửa!
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 me-0">
                        <div class="mb-3">
                            <label class="form-label" for="validationCustom01">Nhập độ tuổi khuyên dùng</label>
                            <input type="text" class="form-control" name="dotuoikhuyendung" value="<?php echo $nuochoa['dotuoikhuyendung'] ?>" id="validationCustom01" placeholder="Độ tuổi khuyên dùng" required>
                            <div class="invalid-feedback">
                                Hãy điền độ tuổi khuyên dùng của nước hoa cần sửa!
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 me-0">
                        <div class="mb-3">
                            <label class="form-label" for="validationCustom01">Nhập năm ra mắt của nước hoa</label>
                            <input type="text" class="form-control" name="namramat" value="<?php echo $nuochoa['namramat'] ?>" id="validationCustom01" placeholder="Năm ra mắt" required>
                            <div class="invalid-feedback">
                                Hãy điền năm ra mắt của nước hoa cần sửa!
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 me-0">
                        <div class="mb-3">
                            <label class="form-label" for="validationCustom01">Nhập nồng độ nước hoa</label>
                            <input type="text" class="form-control" name="nongdo" value="<?php echo $nuochoa['nongdo'] ?>" id="validationCustom01" placeholder="Nồng độ" required>
                            <div class="invalid-feedback">
                                Hãy điền nồng độ của nước hoa cần sửa!
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 me-0">
                        <div class="mb-3">
                            <label class="form-label" for="validationCustom01">Nhập nhà pha chế nước hoa</label>
                            <input type="text" class="form-control" name="nhaphache" value="<?php echo $nuochoa['nhaphache'] ?>" id="validationCustom01" placeholder="Nhà pha chế" required>
                            <div class="invalid-feedback">
                                Hãy điền nhà pha chế của nước hoa cần sửa!
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 me-0">
                        <div class="mb-3">
                            <label class="form-label" for="validationCustom01">Nhập độ lưu hương của nước hoa</label>
                            <input type="text" class="form-control" name="doluuhuong" value="<?php echo $nuochoa['doluuhuong'] ?>" id="validationCustom01" placeholder="Độ lưu hương" required>
                            <div class="invalid-feedback">
                                Hãy điền độ lưu hương của nước hoa cần sửa!
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 me-0">
                        <div class="mb-3">
                            <label class="form-label" for="validationCustom01">Nhập phong cách của nước hoa</label>
                            <input type="text" class="form-control" name="phongcach" value="<?php echo $nuochoa['phongcach'] ?>" id="validationCustom01" placeholder="Phong cách" required>
                            <div class="invalid-feedback">
                                Hãy điền phong cách của nước hoa cần sửa!
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 me-0">
                        <div class="mb-3">
                            <label class="form-label" for="validationCustom01">Nhập độ tỏa hương của nước hoa</label>
                            <input type="text" class="form-control" name="dotoahuong" value="<?php echo $nuochoa['dotoahuong'] ?>" id="validationCustom01" placeholder="Độ tỏa hương" required>
                            <div class="invalid-feedback">
                                Hãy điền độ tỏa hương của nước hoa cần sửa!
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 me-0">
                        <div class="mb-3">
                            <label class="form-label" for="validationCustom01">Nhập thời điểm phù hợp sử dụng của nước hoa</label>
                            <input type="text" class="form-control" name="thoidiemphuhop" value="<?php echo $nuochoa['thoidiemphuhop'] ?>" id="validationCustom01" placeholder="Thời điểm phù hợp" required>
                            <div class="invalid-feedback">
                                Hãy điền thời điểm phù hợp sử dụng của nước hoa cần sửa!
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 me-0">
                        <label class="form-label" for="validationCustom01">Chọn thương hiệu của nước hoa</label>
                        <select class="form-select mb-3" name="id_thuonghieu">
                            <?php

                            for ($i = 0; $i < count($thuonghieu); $i++) {
                                $th = $thuonghieu[$i];
                                if ($th["id_thuonghieu"] == $nuochoa['id_thuonghieu']) {
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
                                if ($ncc["id_nhacungcap"] == $nuochoa['id_nhacungcap']) {
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
                            <input type="text" class="form-control" name="gia_nhap10" value="<?php echo $gianuochoa[0]['gia_nhap'] ?>" id="validationCustom01" required>
                            <div class="invalid-feedback">
                                Hãy điền giá nhập của nước hoa cần sửa!
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 me-0">
                        <div class="mb-3">
                            <label class="form-label" for="validationCustom01">Dung tích 10ML - Giá Bán</label>
                            <input type="text" class="form-control" name="gia_ban10" value="<?php echo $gianuochoa[0]['gia_ban'] ?>" id="validationCustom01" required>
                            <div class="invalid-feedback">
                                Hãy điền giá bán của nước hoa cần sửa!
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
                            <input type="text" class="form-control" name="gia_nhap20" value="<?php echo $gianuochoa[1]['gia_nhap'] ?>" id="validationCustom01" required>
                            <div class="invalid-feedback">
                                Hãy điền giá nhập của nước hoa cần sửa!
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 me-0">
                        <div class="mb-3">
                            <label class="form-label" for="validationCustom01">Dung tích 20ML - Giá Bán</label>
                            <input type="text" class="form-control" name="gia_ban20" value="<?php echo $gianuochoa[1]['gia_ban'] ?>" id="validationCustom01" required>
                            <div class="invalid-feedback">
                                Hãy điền giá bán của nước hoa cần sửa!
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
                            <input type="text" class="form-control" name="gia_nhap100" value="<?php echo $gianuochoa[2]['gia_nhap'] ?>" id="validationCustom01" required>
                            <div class="invalid-feedback">
                                Hãy điền giá nhập của nước hoa cần sửa!
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 me-0">
                        <div class="mb-4">
                            <label class="form-label" for="validationCustom01">Dung tích 100ML - Giá Bán</label>
                            <input type="text" class="form-control" name="gia_ban100" value="<?php echo $gianuochoa[2]['gia_ban'] ?>" id="validationCustom01" required>
                            <div class="invalid-feedback">
                                Hãy điền giá bán của nước hoa cần sửa!
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-12">
                        <button class="btn btn-primary mt-2" id="submit-all" name="submit" type="submit">Chỉnh sửa</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

</div>
<!-- container -->

</div>
<!-- content -->
<?php
require "views/Admin/templates/footer.php";
}
else{
    header("location: index.php");
}
?>