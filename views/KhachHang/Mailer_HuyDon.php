<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hủy đơn hàng</title>
</head>

<body>
    <div style="font-family: Arial,Helvetica Neue,Helvetica,sans-serif;line-height:18pt">
        <div class="adM">

        </div><img src="https://ci4.googleusercontent.com/proxy/bwxcN0zAAnDiW4nu7tVkVdc5ZjfJM0qmgXcGOXt-qKUwRHgPPtBhZtTVNzViA_geYFLMNE2pZ1kFwDGWWqZon1oK9PxsutpTZMtU7jj8X5H4=s0-d-e1-ft#https://bizweb.dktcdn.net/100/429/123/email_settings/logo2.jpg" alt="Parfumerie.vn" width="66" class="CToWUd" data-bit="iit">

        <p>Xin chào
            <?php echo $donhang['hoten'] ?>
        </p>
        <p>Đơn hàng #<?php echo $donhang['id_donhang'] ?> của Anh/chị tại <strong>Parfumerie.vn</strong> đã được hủy trên hệ thống vì 1 vài lý do không mong muốn.

        </p>
        <div>
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
                    foreach($donhang_sanpham as $item){
                    ?>
                    <tr style="border:1px solid #d7d7d7">
                        <td style="padding:5px 10px">
                            <p><?php echo $item['ten_nuochoa']." ".$item['gioitinh']." / ".$item['xuatxu']." / Chiết ".$item['dungtich']."ml" ?></p>
                        </td>
                        <td style="text-align:center;padding:5px 10px"><?php echo $item['id_nuochoa'] ?></td>
                        <td style="text-align:center;padding:5px 10px"><?php echo $item['soluong'] ?></td>
                        <?php
                        if($item['magiamgia'] != null && $item['magiamgia'] != ''){
                            ?>
                            <td style="padding:5px 10px;text-align:right">
                                <p style="margin: 0; text-decoration:line-through"><?php echo number_format($item['soluong']*$item['dongia'], 0, ".", ",") . " VND"; ?></p>
                                <p style="margin: 0;"><?php echo number_format($item['tong'], 0, ".", ",") . " VND"; ?></p>
                            </td>
                            <?php
                        }else{
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
        <p>Cám ơn Anh/chị đã đặt mua hàng tại <strong>Parfumerie.vn</strong>. Vào website để cập nhật những sản phẩm mới nhất:</p>
        <div style="margin-top:25px"><span style="padding:14px 35px;background:#007151"><a href="localhost/BTL_PTPM/index.php" style="font-size:16px;text-decoration:none;color:#fff" target="_blank" data-saferedirecturl="https://www.google.com/url?q=https://u670255.ct.sendgrid.net/ls/click?upn%3Dga8AZ67QrT4LzhqLeJADU2z51TWGiK5QX3z-2B5m76bTA-3DU1RH_iV5fRCbcYkHW-2Fw4GALgm6MI-2FKbe93xV-2BGI0XxeFFJCyrSxvGJsm-2FJNG6kMwIHmMRAYbg79InMmflYG113fWifAovqJ0238wR4R9dLm89oaDUnUFtwfLqZlDztvkyoFcFVnoFwN0rtrGKfICpiybEaigbOmmo-2F-2BDHAvQwolWndSXpCnnAid-2FSVued-2BSUYH-2BgINcH1rCFW8dhQ6wNhg0hxZA-3D-3D&amp;source=gmail&amp;ust=1681894718337000&amp;usg=AOvVaw3KBRoX2RgrmRPQ6uSihcR7">Đến cửa hàng của chúng tôi</a></span></div> &nbsp;
        <hr>
        <p style="text-align:right">Nếu Anh/chị có bất kỳ câu hỏi nào, xin liên hệ với chúng tôi tại <a href="mailto:daodan2612@gmail.com" style="color:#007151" target="_blank">Daodan2612@gmail.com</a></p>
        <p style="text-align:right"><i>Trân trọng,</i></p>
        <p style="text-align:right"><strong>Ban quản trị cửa hàng Parfumerie.vn</strong></p>
    </div>
</body>
</html>