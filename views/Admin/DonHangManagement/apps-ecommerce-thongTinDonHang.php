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
                    <h4 class="page-title">Thông tin đơn hàng</h4>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-10 ms-auto me-auto">

                <div style="color: warning" id="thong_bao">
                </div>

                <?php
                if ($donhang['trangthaidonhang'] != 3 && $donhang['trangthaidonhang'] != 2 && $donhang['trangthaivanchuyen'] == 0 || $donhang['trangthaivanchuyen'] == 1) {
                    if ($donhang['trangthaidonhang'] == 0 && $donhang['trangthaivanchuyen'] == 0) {
                ?>
                        <a class="btn btn-success mt-2 mb-2" href="index.php?controller=DonHang&action=duyetDonHang&id_donhang=<?php echo $donhang['id_donhang'] ?>">Phê duyệt đơn hàng</a>
                    <?php
                    } else if ($donhang['trangthaidonhang'] == 1 && $donhang['trangthaivanchuyen'] == 0) {
                    ?>
                        <a class="btn btn-danger mt-2 mb-2" href="index.php?controller=DonHang&action=huyDuyetDonHang&id_donhang=<?php echo $donhang['id_donhang'] ?>">Bỏ phê duyệt đơn hàng</a>
                    <?php
                    }
                    if($donhang['trangthaidonhang'] == 1){
                    ?>
                    <form class="col-md-6 mb-2 me-0" action="index.php?controller=DonHang&action=updateThanhToan" method="POST">
                        <label class="form-label" for="validationCustom01">Thay đổi thông tin thanh toán</label>
                        <input type="text" value="<?php echo $id_donhang ?>" class="form-control" name="id_donhang" id="validationCustom01" placeholder="Mã đơn hàng" style="display: none;" readonly>
                        <select class="form-select mb-1" name="trangthaithanhtoan" required>
                            <option value="" disabled selected>---</option>
                            <?php
                            if ($donhang['trangthaithanhtoan'] == 1) {
                            ?>
                                <option value="0">Chưa thanh toán</option>
                            <?php
                            }
                            if ($donhang['trangthaithanhtoan'] == 0) {
                            ?>
                                <option value="1">Đã thanh toán</option>
                            <?php
                            }
                            ?>
                        </select>
                        <button class="btn btn-primary" type="submit" name="submit">Thay đổi</button>
                    </form>
                <?php
                    }
                }
                ?>
                <div>
                    <div class="col-md-6">
                        <span class="p-14 text-info">Trạng thái thanh toán: <span class="p-15-bold fst-italic text-main"><?php echo ($donhang['trangthaithanhtoan'] != 3) ? ($donhang['trangthaithanhtoan']==0 ? "Chưa thanh toán" : "Đã thanh toán") : "Đã hủy" ?></span></span>
                    </div>
                    <div class="col-md-6">
                        <?php
                        $ttvc = "";
                        if($donhang['trangthaivanchuyen']==0){
                            $ttvc = "Chưa vận chuyển";
                        }else if($donhang['trangthaivanchuyen']==1){
                            $ttvc = "Đang vận chuyển";
                        }else{
                            $ttvc = "Đã vận chuyển";
                        }
                        ?>
                        <span class="p-14 text-info">Trạng thái vận chuyển: <span class="p-15-bold fst-italic text-main"><?php echo ($donhang['trangthaivanchuyen'] != 3) ? $ttvc : "Đã hủy" ?></span></span><br>
                        <?php
                        if($donhang['trangthaidonhang'] < 2){
                        ?>
                        <span class="p-14 text-info">Trạng thái đơn hàng: <span class="p-15-bold fst-italic text-main">Chưa hoàn tất</span></span>
                        <?php
                        }
                        ?>
                        <?php
                        if($donhang['trangthaidonhang'] == 2){
                        ?>
                        <span class="p-14 text-info">Trạng thái đơn hàng: <span class="p-15-bold fst-italic text-main">Đã hoàn tất</span></span>
                        <?php
                        }
                        ?>
                        <?php
                        if($donhang['trangthaidonhang'] == 3){
                        ?>
                        <span class="p-14 text-info">Trạng thái đơn hàng: <span class="p-15-bold fst-italic text-main">Đã hủy</span></span>
                        <?php
                        }
                        ?>
                    </div>
                    <table style="width:100%;border-collapse:collapse">
                        <thead>
                            <tr>
                                <th style="border-left:1px solid #d7d7d7;border-right:1px solid #d7d7d7;border-top:1px solid #d7d7d7;padding:5px 10px;text-align:left">
                                    <strong>Thông tin người mua</strong>
                                </th>
                                <th style="border-left:1px solid #d7d7d7;border-right:1px solid #d7d7d7;border-top:1px solid #d7d7d7;padding:5px 10px;text-align:left">
                                    <strong>Thông tin người nhận</strong>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td style="border-left:1px solid #d7d7d7;border-right:1px solid #d7d7d7;border-bottom:1px solid #d7d7d7;padding:5px 10px">
                                    <table style="width:100%">
                                        <tbody>

                                            <tr>
                                                <td>Họ tên:</td>
                                                <td><?php echo $donhang['hoten'] ?></td>
                                            </tr>


                                            <tr>
                                                <td>Điện thoại:</td>
                                                <td><?php echo $donhang['sodienthoai'] ?></td>
                                            </tr>


                                            <tr>
                                                <td>Email:</td>
                                                <td><a href="mailto:<?php echo $donhang['email'] ?>" target="_blank"><?php echo $donhang['email'] ?></a></td>
                                            </tr>


                                            <tr>
                                                <td>Địa chỉ:</td>
                                                <td><?php echo $donhang['diachi'] ?></td>
                                            </tr>


                                            <tr>
                                                <td>Phường xã:</td>
                                                <td><?php echo $donhang['phuongxa'] ?></td>
                                            </tr>


                                            <tr>
                                                <td>Quận huyện:</td>
                                                <td><?php echo $donhang['quanhuyen'] ?></td>
                                            </tr>


                                            <tr>
                                                <td>Tỉnh thành:</td>
                                                <td><?php echo $donhang['tinhthanh'] ?></td>
                                            </tr>

                                            <tr>
                                                <td>Quốc gia:</td>
                                                <td>Vietnam</td>
                                            </tr>

                                        </tbody>
                                    </table>
                                </td>

                                <td style="border-left:1px solid #d7d7d7;border-right:1px solid #d7d7d7;border-bottom:1px solid #d7d7d7;padding:5px 10px">
                                    <table style="width:100%">
                                        <tbody>

                                            <tr>
                                                <td>Họ tên:</td>
                                                <td><?php echo $donhang['diachikhac'] == 0 ? $donhang['hoten'] : $donhang['hoten_khac'] ?></td>
                                            </tr>


                                            <tr>
                                                <td>Điện thoại:</td>
                                                <td><?php echo $donhang['diachikhac'] == 0 ? $donhang['sodienthoai'] : $donhang['sodienthoai_khac'] ?></td>
                                            </tr>


                                            <tr>
                                                <td>Địa chỉ:</td>
                                                <td><?php echo $donhang['diachikhac'] == 0 ? $donhang['diachi'] : $donhang['diachi_khac'] ?></td>
                                            </tr>


                                            <tr>
                                                <td>Phường xã:</td>
                                                <td><?php echo $donhang['diachikhac'] == 0 ? $donhang['phuongxa'] : $donhang['phuongxa_khac'] ?></td>
                                            </tr>


                                            <tr>
                                                <td>Quận huyện:</td>
                                                <td><?php echo $donhang['diachikhac'] == 0 ? $donhang['quanhuyen'] : $donhang['quanhuyen_khac'] ?></td>
                                            </tr>


                                            <tr>
                                                <td>Tỉnh thành:</td>
                                                <td><?php echo $donhang['diachikhac'] == 0 ? $donhang['tinhthanh'] : $donhang['tinhthanh_khac'] ?></td>
                                            </tr>


                                            <tr>
                                                <td>Quốc gia:</td>
                                                <td>Vietnam</td>
                                            </tr>

                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2" style="border-left:1px solid #d7d7d7;border-right:1px solid #d7d7d7;border-bottom:1px solid #d7d7d7;padding:5px 10px">
                                    <p><strong>Phương thức thanh toán: </strong><?php echo $pTTT['ten'] ?></p>
                                    <p><strong>Phương thức vận chuyển: </strong>
                                        Phí vận chuyển<br>
                                    </p>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div>
                    <div style="font-size:18px;padding-top:10px"><strong>Thông tin đơn hàng</strong></div>
                    <table>
                        <tbody>
                            <tr>
                                <?php
                                $date_str = $donhang['ngaydathang']; // chuỗi ngày cần định dạng
                                $date = date("d/m/Y", strtotime($date_str));
                                ?>
                                <td>Mã đơn hàng: <strong>#<?php echo $donhang['id_donhang'] ?></strong></td>
                                <td style="padding-left:40px">Ngày tạo: <?php echo $date ?></td>
                            </tr>
                        </tbody>
                    </table>
                    <table style="width:100%;border-collapse:collapse">
                        <thead>
                            <tr style="border:1px solid #d7d7d7;background-color:#f8f8f8">
                                <th style="padding:5px 10px;text-align:left"><strong>Sản phẩm</strong></th>
                                <th style="text-align:center;padding:5px 10px"><strong>Mã SKU</strong></th>
                                <th style="text-align:center;padding:5px 10px"><strong>Số lượng</strong></th>
                                <th style="padding:5px 10px;text-align:right"><strong>Tổng</strong></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($donhang_sanpham as $item) {
                            ?>
                                <tr style="border:1px solid #d7d7d7">
                                    <td style="padding:5px 10px">
                                        <p><?php echo $item['ten_nuochoa'] . " " . $item['gioitinh'] . " / " . $item['xuatxu'] . " / Chiết " . $item['dungtich'] . "ml" ?></p>
                                    </td>
                                    <td style="text-align:center;padding:5px 10px"><?php echo $item['id_nuochoa'] ?></td>
                                    <td style="text-align:center;padding:5px 10px"><?php echo $item['soluong'] ?></td>
                                    <?php
                                    if ($item['magiamgia'] != null && $item['magiamgia'] != '') {
                                    ?>
                                        <td style="padding:5px 10px;text-align:right">
                                            <p style="margin: 0; text-decoration:line-through"><?php echo number_format($item['soluong'] * $item['dongia'], 0, ".", ",") . " VND"; ?></p>
                                            <p style="margin: 0;"><?php echo number_format($item['tong'], 0, ".", ",") . " VND"; ?></p>
                                        </td>
                                    <?php
                                    } else {
                                    ?>
                                        <td style="padding:5px 10px;text-align:right">
                                            <p><?php echo number_format($item['tong'], 0, ".", ",") . " VND"; ?></p>
                                        </td>
                                    <?php
                                    }
                                    ?>
                                </tr>
                            <?php
                            }
                            ?>
                            <tr style="border:1px solid #d7d7d7">
                                <td colspan="2">&nbsp;</td>
                                <td colspan="2">
                                    <table style="width:100%">
                                        <tbody>
                                            <tr>
                                                <td><strong>Giảm giá</strong></td>
                                                <td style="text-align:right">-<?php echo ($donhang['khuyenmai'] == null || $donhang['khuyenmai'] == '' || $donhang['khuyenmai'] == 0) ? 0 : number_format($donhang['khuyenmai'], 0, ".", ",") . " VND"; ?></td>
                                            </tr>
                                            <tr>
                                                <td><strong>Giá trừ khuyến mãi:</strong></td>
                                                <td style="text-align:right"><?php echo number_format($donhang['tongtien'], 0, ".", ",") . " VND"; ?></td>
                                            </tr>
                                            <tr>
                                                <td><strong>Phí vận chuyển:</strong></td>
                                                <td style="text-align:right">-</td>
                                            </tr>
                                            <tr>
                                                <td><strong>Thành tiền</strong></td>
                                                <td style="text-align:right"><?php echo number_format($donhang['tongtien'], 0, ".", ",") . " VND"; ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
    <!-- container -->

    </div>
    <!-- content -->

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