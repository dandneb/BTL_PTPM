<?php
require("views/template/header.php");
?>

<head>
    <title>Đơn hàng</title>
    <style>
        
    </style>
</head>
<main class="bg-white">
    <div class="container-fluid" style="background-color: #F9F9F9">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php" class="text-decoration-none p-14 text-dark">Trang chủ</a></li>
                    <li class="breadcrumb-item"><a href="index.php?controller=KhachHang" class="text-decoration-none p-14 text-dark">Trang tài khoản</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><span class="p-14 text-dark">Trang đơn hàng</span></li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="container pb-3 mt-5">
        <div class="row">
            <div class="col-md-3">
                <h5>TRANG TÀI KHOẢN</h5>
                <p class="p-14-bold">Xin chào, Đào Duy Đán</p>
                <div class="mt-3">
                    <p class="p-14"><a href="index.php?controller=khachhang" class="text-decoration-none text-dark">Thông tin tài khoản</a></p>
                    <p class="p-14-bold mb-3"><a href="index.php?controller=khachhang&action=DonHang" class="text-decoration-underline text-dark">Đơn hàng của bạn</a></p>
                    <p class="p-14"><a href="index.php?controller=khachhang&action=DoiMatKhau" class="text-decoration-none text-dark">Đổi mật khẩu</a></p>
                    <p class="p-14"><a href="index.php?controller=khachhang&action=SoDiaChi" class="text-decoration-none text-dark">Sổ địa chỉ (<?php echo count($data) ?>)</a></p>
                </div>
            </div>
            <div class="col-md-9">
                <h5>ĐƠN HÀNG CỦA BẠN</h5>
                <div class="d-flex">
                    <div class="swatch-element">
                        <input id="choXacNhan" type="radio" name="trangThai" value="Chưa xác nhận" class="bk-product-property trangThai" checked>
                        <label class="label-info border p-1 bg-white text-success" for="choXacNhan" style="position: relative; cursor: pointer;" data-toggle="tooltip" data-placement="top" title="">
                            CHỜ XÁC NHẬN
                        </label>
                    </div>
                    <div class="swatch-element">
                        <input id="dangVanChuyen" type="radio" name="trangThai" value="Đã xác nhận" class="bk-product-property trangThai">
                        <label class="label-info border p-1 bg-white text-success" for="dangVanChuyen" style="position: relative; cursor: pointer;" data-toggle="tooltip" data-placement="top" title="">
                            ĐANG VẬN CHUYỂN
                        </label>
                    </div>
                    <div class="swatch-element">
                        <input id="daHoanTat" type="radio" name="trangThai" value="Hoàn tất" class="bk-product-property trangThai">
                        <label class="label-info border p-1 bg-white text-success" for="daHoanTat" style="position: relative; cursor: pointer;" data-toggle="tooltip" data-placement="top" title="">
                            ĐÃ HOÀN TẤT
                        </label>
                    </div>
                    <div class="swatch-element">
                        <input id="daHuy" type="radio" name="trangThai" value="Đã hủy" class="bk-product-property trangThai">
                        <label class="label-info border p-1 bg-white text-success" for="daHuy" style="position: relative; cursor: pointer;" data-toggle="tooltip" data-placement="top" title="">
                            ĐÃ HỦY
                        </label>
                    </div>
                </div>
                <div>
                    <table class="table table-bordered" id="myTable" style="width: 100%;">
                        <thead>
                            <tr>
                                <th scope="col">Đơn hàng</th>
                                <th scope="col">Ngày</th>
                                <th scope="col">Địa chỉ</th>
                                <th scope="col">Giá trị đơn hàng</th>
                                <th scope="col">TT đơn hàng</th>
                                <th scope="col">TT thanh toán</th>
                                <th scope="col">TT vận chuyển</th>
                                <th scope="col">Chi tiết</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>
<link href="https://cdn.datatables.net/v/bs5/jszip-2.5.0/dt-1.13.4/b-2.3.6/b-html5-2.3.6/b-print-2.3.6/date-1.4.0/fc-4.2.2/fh-3.3.2/r-2.4.1/rg-1.3.1/sc-2.1.1/sb-1.4.2/datatables.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/v/bs5/jszip-2.5.0/dt-1.13.4/b-2.3.6/b-html5-2.3.6/b-print-2.3.6/date-1.4.0/fc-4.2.2/fh-3.3.2/r-2.4.1/rg-1.3.1/sc-2.1.1/sb-1.4.2/datatables.min.js"></script>
<script src="js/moment.js"></script>
<script>
    $(document).ready(function() {
        var table = $('#myTable').DataTable({
            dom: 'Blfrtip',
            buttons: [

            ],
            select: true,
            columnDefs: [
                { type: 'date-time', targets: 1 }
            ],
            order: [[1, 'desc']],
            responsive: true,
            lengthMenu: [10, 15, 25, 50, 75, 100],
            "ajax": "index.php?controller=KhachHang&action=getDonHang&id_khachhang=" + id_khachhang,
            "columns": [{
                    "data": "id_donhang"
                },
                {
                    "data": "ngaydat",
                    
                },
                {
                    "data": "diachi"
                },
                {
                    "data": "tongtien",
                    "render": function(data, type, row) {
                        return data.toLocaleString('vi-VN', {
                            style: 'currency',
                            currency: 'VND'
                        });
                    }
                },
                {
                    "data": "trangthaidonhang",
                    "render": function(data, type, row) {
                        if (row.trangthaidonhang == 3) {
                            return `<span class="badge bg-danger">Đã hủy</span>`;
                        } else {
                            if (data == 0) {
                                return `<span class="badge bg-danger">Chưa xác nhận</span>`;
                            } else if (data == 1) {
                                return `<span class="badge bg-success">Đã xác nhận</span>`;
                            } else {
                                return `<span class="badge bg-success">Hoàn tất</span>`;
                            }
                        }
                    }
                },
                {
                    "data": "trangthaithanhtoan",
                    "render": function(data, type, row) {
                        if (row.trangthaidonhang == 3) {
                            return `<span class="badge bg-danger">Đã hủy</span>`;
                        } else {
                            if (data == 0) {
                                return `<span class="badge bg-danger">Chưa thanh toán</span>`;
                            } else {
                                return `<span class="badge bg-success">Đã thanh toán</span>`;
                            }
                        }
                    }
                },
                {
                    "data": "trangthaivanchuyen",
                    "render": function(data, type, row) {
                        if (row.trangthaidonhang == 3) {
                            return `<span class="badge bg-danger">Đã hủy</span>`;
                        } else {
                            if (data == 0) {
                                return `<span class="badge bg-danger">Chưa vận chuyển</span>`;
                            } else if (data == 1) {
                                return `<span class="badge bg-success">Đang vận chuyển</span>`;
                            } else {
                                return `<span class="badge bg-success">Đã chuyển</span>`;
                            }
                        }
                    }
                },
                {
                    data: 'id_donhang',
                    targets: 5,
                    render: function(data, type, row, meta) {
                        a = `<a href="index.php?controller=KhachHang&action=ChiTietDonHang&id_donhang=${data}" class="action-icon" data-toggle="tooltip" data-placement="top" title="Chi tiết đơn hàng"><span class="material-icons text-success">visibility</span></a>`;
                        return a;
                    }
                },
            ],
            "language": {
                "url": '//cdn.datatables.net/plug-ins/1.10.25/i18n/Vietnamese.json',
                "zeroRecords": "Không có đơn hàng nào trong danh mục"
            },
        });
        table.column(4).search('Chưa xác nhận').draw();
        $(".trangThai").click(function(){
            table.column(4).search(this.value).draw();
        })
    });
</script>
<?php
require("views/template/footer.php");
?>