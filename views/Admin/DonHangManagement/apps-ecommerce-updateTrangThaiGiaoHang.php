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
                            <li class="breadcrumb-item"><a href="index.php?controller=NhanVien">Quản lý cửa hàng</a></li>
                            <li class="breadcrumb-item"><a href="index.php?controller=DonHang">Đơn hàng</a></li>
                            <li class="breadcrumb-item active">Thông tin đơn hàng</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Cập nhật thông tin vận chuyển đơn hàng</h4>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-10 ms-auto me-auto">
                <div style="color: warning" id="thong_bao">
                </div>
                <a class="btn btn-danger mt-2 mb-2">Trạng thái hiện tại: <?php echo $tt ?></a>
                <div class="row">
                    <form class="row" action="index.php?controller=DonHang&action=updateDelivery" method="POST">
                        <div class="col-md-6 me-0">
                            <label class="form-label" for="validationCustom01">Mã đơn hàng</label>
                            <input type="text" value="<?php echo $id_donhang ?>" class="form-control" name="id_donhang" id="validationCustom01" placeholder="Mã đơn hàng" readonly required>
                        </div>
                        <div class="col-md-6 me-0">
                            <label class="form-label" for="validationCustom01">Thông tin vận chuyển</label>
                            <select class="form-select mb-3" name="trangthaivanchuyen" required>
                                <option value="" disabled selected>---</option>
                                <?php
                                if($donhang[0]['trangthaivanchuyen'] != 0){
                                ?>
                                <option value="0">Chưa vận chuyển</option>
                                <?php
                                }
                                if($donhang[0]['trangthaivanchuyen'] != 1){
                                ?>
                                <option value="1">Đang vận chuyển</option>
                                <?php
                                }
                                if($donhang[0]['trangthaivanchuyen'] != 2){
                                ?>
                                <option value="2">Đã giao hàng</option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-success">Thực hiện</button>
                        </div>
                        
                    </form>
                </div>
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
        var now = new Date().setHours(0, 0, 0, 0);
        regex = /^[a-zA-Z0-9]+$/;
        $(document).ready(function() {
            $("#" + id_input).change(function() {
                let data = $("#" + id_input).val();
                if (data != "") {
                    let form_datas = new FormData();
                    form_datas.append('data', data);
                    $.ajax({
                        url: url_, // gửi đến file upload.php 
                        dataType: 'text',
                        cache: false,
                        contentType: false,
                        processData: false,
                        data: form_datas,
                        type: 'post',
                        success: function(res) {
                            if (res == 1) {
                                $("#" + id_help_).text(text_help_error).css("color", "red");
                            } else {
                                if (data.length <= 15 && data.length >= 10) {
                                    if (regex.test(data)) {
                                        $("#" + id_help_).text(text_help_success).css("color", "green");
                                    } else {
                                        $("#" + id_help_).text("Định dạng mã giảm giá không hợp lệ!").css("color", "red");
                                    }
                                } else {
                                    $("#" + id_help_).text("Độ mã giảm giá không hợp lệ (10-15 ký tự)!").css("color", "red");
                                }
                            }

                        },
                    });
                    return false;
                }
            })
            $("#ngaybatdau").change(function() {
                var _nbd = new Date($(this).val()).setHours(0, 0, 0, 0);
                if (_nbd >= now) {
                    $("#ngayBatDauHelp").text("Ngày bắt đầu hợp lệ!").css("color", "green");
                } else {
                    $("#ngayBatDauHelp").text("Ngày bắt đầu không hợp lệ!").css("color", "red");
                }
            })
            $("#hansudung").change(function() {
                var _nbd = new Date($("#ngaybatdau").val()).setHours(0, 0, 0, 0);
                var _hsd = new Date($(this).val()).setHours(0, 0, 0, 0);
                if (_hsd >= _nbd && _nbd >= now) {
                    $("#hanSuDungHelp").text("Hạn sử dụng hợp lệ!").css("color", "green");
                } else {
                    $("#hanSuDungHelp").text("Hạn sử dụng không hợp lệ!").css("color", "red");
                }
            })
            giamHelp
            $("#soluotsudung").change(function() {
                if (parseInt($("#soluotsudung").val()) > 0) {
                    $("#soLuotSuDungHelp").text("Số lượt sử dụng hợp lệ!").css("color", "green");
                } else {
                    $("#soLuotSuDungHelp").text("Số lượt sử dụng không hợp lệ!").css("color", "red");
                }
            })
            $("#giam").change(function() {
                if (parseInt($("#giam").val()) > 0 && parseInt($("#giam").val()) <= 100) {
                    $("#giamHelp").text("Tỉ lệ giảm giá hợp lệ!").css("color", "green");
                } else {
                    $("#giamHelp").text("Tỉ lệ giảm giá không hợp lệ!").css("color", "red");
                }
            })

            function validateForm() {
                nbd = Date($("#ngaybatdau").val()).setHours(0, 0, 0, 0);
                hsd = Date($("#hansudung").val()).setHours(0, 0, 0, 0)
                if ($("#" + id_help_).text() == "Mã giảm giá hợp lệ!" && new nbd >= now &&
                    hsd > nbd && $("#soluotsudung").val() > 0 && $("#giam").val() > 0 && $("#giam").val() <= 100) {
                    return true;
                } else {
                    return false;
                }
            }
        });
    </script>
<?php
} else {
    header("location: index.php");
}
?>