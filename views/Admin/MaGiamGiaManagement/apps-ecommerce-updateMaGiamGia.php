<?php
require "views/Admin/templates/header.php";
if(!isset($_SESSION)) {
    session_start();
}
if (isset($_SESSION['LoginOK']) || $_SESSION['LoginOK'][0] == "2") {
    $ql = explode("_", $_SESSION['LoginOK']);
?>
<head>
    <title>Sửa mã giảm giá</title>
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
                        <li class="breadcrumb-item"><a href="index.php?controller=MaGiamGia">Mã giảm giá</a></li>
                        <li class="breadcrumb-item active">Sửa mã giảm giá</li>
                    </ol>
                </div>
                <h4 class="page-title">Sửa mã giảm giá</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-10 ms-auto me-auto">
            <a class="btn btn-danger mt-2 mb-2">Sửa mã giảm giá</a>
            <div style="color: red">
                <?php echo '<span>' . $error . '</span>' ?>
            </div>
            <div style="color: warning" id="thong_bao">
                
            </div>
            <form action="" method="POST" class="needs-validation dropzone" id="myAwesomeDropzone" novalidate>
                <div class="row">

                    <div class="col-md-6 me-0">
                        <div class="mb-3">
                            <label class="form-label" for="validationCustom01">Nhập mã giảm giá</label>
                            <input type="text" class="form-control" value="<?php echo $mgg['magiamgia']; ?>" name="magiamgia" id="magiamgia" placeholder="Mã giảm giá" readonly required>
                        </div>
                    </div>

                    <div class="col-md-6 me-0">
                        <div class="mb-3">
                            <label class="form-label" for="validationCustom01">Sửa ngày bắt đầu</label>
                            <input type="date" class="form-control" value="<?php echo $mgg['ngaybatdau']; ?>" name="ngaybatdau" id="ngaybatdau" placeholder="Ngày bắt đầu" required>
                            <div class="invalid-feedback">
                                Hãy điền sửa đổi ngày bắt đầu!
                            </div>
                            <span id="ngayBatDauHelp" class="p-12 mt-2"></span>
                        </div>
                    </div>
                    
                    <div class="col-md-6 me-0">
                        <div class="mb-3">
                            <label class="form-label" for="validationCustom01">Nhập hạn sử dụng</label>
                            <input type="date" class="form-control" value="<?php echo $mgg['hansudung']; ?>" name="hansudung" id="hansudung" placeholder="Hạn sử dụng" required>
                            <div class="invalid-feedback">
                                Hãy điền sửa đổi hạn sử dụng!
                            </div>
                            <span id="hanSuDungHelp" class="p-12 mt-2"></span>
                        </div>
                    </div>

                    <div class="col-md-6 me-0">
                        <div class="mb-3">
                            <label class="form-label" for="validationCustom01">Số lượt sử dụng</label>
                            <input type="text" class="form-control" value="<?php echo $mgg['soluotsudung']; ?>" name="soluotsudung" id="soluotsudung" placeholder="Mã giảm giá" required>
                            <div class="invalid-feedback">
                                Hãy điền sửa đổi số lượng sử dụng!
                            </div>
                            <span id="soLuotSuDungHelp" class="p-12 mt-2"></span>
                        </div>
                    </div>

                    <?php
                    if($mgg['soluotdasudung'] < 1){
                    ?>
                    <div class="col-md-6 me-0">
                        <div class="mb-3">
                            <label class="form-label" for="validationCustom01">Giảm (%)</label>
                            <input type="text" class="form-control" value="<?php echo $mgg['giam']; ?>" name="giam" id="giam" placeholder="Giảm giá (%)" required>
                            <div class="invalid-feedback">
                                Hãy nhập tỉ lệ giảm giá của sản phẩm!
                            </div>
                            <span id="giamHelp" class="p-12 mt-2"></span>
                        </div>
                    </div>
                    <div class="col-md-6 me-0">
                        <label class="form-label" for="validationCustom01">Chọn nước hoa được áp dụng mã giảm giá</label>
                        <select class="form-select mb-3" name="id_nuochoa">
                            <?php
                            for ($i = 0; $i < count($nuochoa); $i++) {
                                $nh = $nuochoa[$i];
                                if ($i == 0) {
                                    echo "<option value='{$nh["id_nuochoa"]}' selected>{$nh["ten_nuochoa"]}</option>";
                                } else {
                                    echo "<option value='{$nh["id_nuochoa"]}'>{$nh["ten_nuochoa"]}</option>";
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <?php
                    }
                    ?>
                </div>
                <div class="row mb-2">
                    <div class="col-12">
                        <button class="btn btn-primary mt-2" id="submit-all" name="submit" type="submit">Cập nhật mã giảm giá</button>
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
    id_input = "magiamgia";
    url_ = "index.php?controller=NhaCungCap&action=checkMaGiamGia";
    id_help_ = "maGiamGiaHelp";
    text_help_success = "Mã giảm giá hợp lệ!";
    text_help_error = "Mã giảm giá đã tồn tại!";
    old_nbd = $("#ngaybatdau").val();
    var old = new Date(old_nbd).setHours(0, 0, 0, 0);
    $(document).ready(function(){
        $("#"+id_input).change(function(){
            let data = $("#"+id_input).val();
            if(data!=""){
                let form_datas = new FormData();
                form_datas.append('data',data);
                $.ajax({
                    url: url_, // gửi đến file upload.php 
                    dataType: 'text',
                    cache: false,
                    contentType: false,
                    processData: false,
                    data: form_datas,
                    type: 'post',
                    success: function(res) {
                        if(res == 1){
                            $("#"+id_help_).text(text_help_error).css("color","red");
                        }
                        else{
                            if(data.length <= 15 && data.length >= 10 ){
                                regex = /^[a-zA-Z0-9]+$/;
                                if(regex.test(data)){
                                    $("#"+id_help_).text(text_help_success).css("color","green");
                                }else{
                                    $("#"+id_help_).text("Định dạng mã giảm giá không hợp lệ!").css("color","red");
                                }
                            }else{
                                $("#"+id_help_).text("Độ mã giảm giá không hợp lệ (10-15 ký tự)!").css("color","red");
                            }
                        }
                            
                    },
                });
                return false;
            }
        })
        $("#ngaybatdau").change(function(){
            var _nbd = new Date($(this).val()).setHours(0, 0, 0, 0);
            if(_nbd >= old ){
                $("#ngayBatDauHelp").text("Ngày bắt đầu hợp lệ!").css("color","green");
            }else{
                $("#ngayBatDauHelp").text("Ngày bắt đầu không hợp lệ!").css("color","red");
            }
        })
        $("#hansudung").change(function(){
            var _nbd = new Date($("#ngaybatdau").val()).setHours(0, 0, 0, 0);
            var _hsd = new Date($(this).val());
            _hsd.setHours(0, 0, 0, 0);
            if(_hsd >= _nbd && _nbd >= old){
                $("#hanSuDungHelp").text("Hạn sử dụng hợp lệ!").css("color","green");
            }else{
                $("#hanSuDungHelp").text("Hạn sử dụng không hợp lệ!").css("color","red");
            }
        })
        
        $("#soluotsudung").change(function(){
            if(parseInt($("#soluotsudung").val()) > 0){
                $("#soLuotSuDungHelp").text("Số lượt sử dụng hợp lệ!").css("color","green");
            }else{
                $("#soLuotSuDungHelp").text("Số lượt sử dụng không hợp lệ!").css("color","red");
            }
        })
        $("#giam").change(function(){
            if(parseInt($("#giam").val()) > 0 && parseInt($("#giam").val()) <= 100){
                $("#giamHelp").text("Tỉ lệ giảm giá hợp lệ!").css("color","green");
            }else{
                $("#giamHelp").text("Tỉ lệ giảm giá không hợp lệ!").css("color","red");
            }
        })
    });
</script>
<?php
}
else{
    header("location: index.php");
}
?>