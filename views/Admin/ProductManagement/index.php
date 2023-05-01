<?php
require "views/Admin/templates/header.php";
if (!isset($_SESSION)) {
    session_start();
}
if (isset($_SESSION['LoginOK']) && $_SESSION['LoginOK'][0] == "1" || $_SESSION['LoginOK'][0] == "2") {
    $ql = explode("_", $_SESSION['LoginOK']);
?>

    <head>
        <link href="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.13.4/b-2.3.6/b-colvis-2.3.6/b-html5-2.3.6/b-print-2.3.6/date-1.4.0/fc-4.2.2/fh-3.3.2/r-2.4.1/rg-1.3.1/sc-2.1.1/sb-1.4.2/sl-1.6.2/datatables.min.css" rel="stylesheet" />
        <title>Nước hoa</title>
        <style>
            .price-information{
                font-size: 22px;
                color: #07503D;
                font-weight: 500;
            }
        </style>
    </head>
    <!-- Start Content-->
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="index.php">Parfumerie</a></li>
                            <li class="breadcrumb-item"><a href="index.php?controller=nhanvien">Quản lý cửa hàng</a></li>
                            <li class="breadcrumb-item active">Nước hoa</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Nước hoa</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row mb-2">
                            <div class="col-sm-4">
                                <a href="index.php?controller=NhanVien&action=addSanPham" class="btn btn-danger mb-2"><i class="mdi mdi-plus-circle me-2"></i> Add Products</a>
                            </div>
                            <div class="col-sm-8">
                                <div class="text-sm-end">
                                    <button type="button" class="btn btn-success mb-2 me-1"><i class="mdi mdi-cog-outline"></i></button>
                                    <button type="button" class="btn btn-light mb-2 me-1">Import</button>
                                    <button type="button" class="btn btn-light mb-2">Export</button>
                                </div>
                            </div><!-- end col-->
                        </div>
                        <div class="row mb-2">
                            <div class="col-sm-12">
                                <?php
                                if (isset($_SESSION['success'])) {
                                    echo '<span class="text-success">' . $_SESSION['success'] . '</span>';
                                    unset($_SESSION['success']);
                                } else if (isset($_SESSION['error'])) {
                                    echo '<span class="text-danger">' . $_SESSION['error'] . '</span>';
                                    unset($_SESSION['error']);
                                }
                                ?>
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table id="alternative-page-datatable" class="table table-centered w-100 nowrap w-100 dt-responsive nowrap display" id="products-datatable mt-2">
                                <thead class="table-light">
                                    <tr>
                                        <th class="all">Sản phẩm</th>
                                        <th>Thương Hiệu</th>
                                        <th>Giá nhập</th>
                                        <th>Giới tính</th>
                                        <th>Giá bán</th>
                                        <th>Số lượng sản phẩm</th>
                                        <th>Đã bán</th>
                                        <th>Status</th>
                                        <th style="width: 85px;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div> <!-- end card-body-->
                </div> <!-- end card-->
            </div> <!-- end col -->
        </div>
        <!-- end row -->

    </div> <!-- container -->
    <div class="modal fade" id="thongTinSanPham" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="noticed" style="display: none;">
                            <img src="images/ticket/check.png" id="imgNoticedGioHang" alt="" style="max-height: 16px; max-width: 16px; display: block; margin-right: 10px">
                        </div>
                        <div class="noticed" style="display: none;">
                            <span class="noticedGioHang p-16-bold mb-0"></span>
                        </div>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body row">
                    <div class="col-md-6">
                        <div class="container">
                            <div class="carousel-container position-relative row">
                                <!-- Sorry! Lightbox doesn't work - yet. -->
                                <div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="false">
                                    <div class="carousel-inner img-main">

                                    </div>
                                </div>

                                <!-- Carousel Navigation -->
                                <div id="carousel-thumbs" class="carousel slide" data-ride="carousel" data-interval="false">
                                    <div class="carousel-inner">
                                        <div class="carousel-item active">
                                            <div class="row mx-0 img-thumb-one">

                                            </div>
                                        </div>
                                        <div class="carousel-item">
                                            <div class="row mx-0 img-thumb-two">

                                            </div>
                                        </div>
                                    </div>
                                    <a class="carousel-control-prev" href="#carousel-thumbs" role="button" data-slide="prev" style="transform: translateX(-39%);">
                                        <span class="carousel-control-prev-icon" aria-hidden="true" style="background-color: black;"></span>
                                        <span class="sr-only text-black">Previous</span>
                                    </a>
                                    <a class="carousel-control-next" href="#carousel-thumbs" role="button" data-slide="next" style="transform: translateX(39%);">
                                        <span class="carousel-control-next-icon" aria-hidden="true" style="background-color: black;"></span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div>
                            <h2 class="title-head mb-1 ten_nuochoa" style="font-size: 18px;">AAA</h2>
                            <p class="p-14 m-0">Tình trạng: <span class="p-14-bold tinhtrang"></span></p>
                            <p class="p-14 m-0">Thương hiệu: <span class="p-14-bold ten_thuonghieu"></span></p>
                            <p class="p-14 m-0 mb-2">Loại sản phẩm: <span class="p-14-bold loaisanpham"></span></p>
                        </div>
                        <div class="border-bottom border-top">
                            <p class="price-information mt-2 mb-2 gia_ban"></p>
                        </div>
                        <div class="mt-2">
                            <span class="mota" style="font-family:Trebuchet MS,Helvetica,sans-serif; color:#42495B"></span>
                        </div>
                        <div>
                            <div class="swatch">
                                <p class="p-14-bold mb-0">Giới tính</p>
                                <div class="swatch-element mt-2">
                                    <input id="swatch-0-nam" type="radio" name="option-0" class="bk-product-property" hidden>
                                    <label class="border text-uppercase gioitinh p-1" for="swatch-0-nam" style="position: relative;">

                                    </label>
                                </div>
                            </div>
                            <div class="swatch">
                                <div class="swatch-element">
                                    <p class="p-14-bold">Xuất xứ</p>
                                    <input id="swatch-1-anh" type="radio" name="option-1" class="bk-product-property" hidden>
                                    <label class="border text-uppercase xuatxu p-1" for="swatch-1-anh" style="position: relative;">

                                    </label>
                                </div>
                            </div>
                            <div class="swatch" style="margin-top: 32px">
                                <p class="p-14-bold">Dung tích</p>
                                <div class="d-flex">
                                    <div class="swatch-element me-1">
                                        <input id="swatch-2-chiet-10ml" type="radio" name="dungtich" class="bk-product-property dungtich" hidden>
                                        <label class="border chiet-10ml p-1" for="swatch-2-chiet-10ml" style="position: relative;" data-toggle="tooltip" data-placement="top" title="">

                                        </label>
                                    </div>
                                    <div class="swatch-element me-1">
                                        <input id="swatch-2-chiet-20ml" type="radio" name="dungtich" class="bk-product-property dungtich" hidden>
                                        <label class="border chiet-20ml p-1" for="swatch-2-chiet-20ml" style="position: relative;" data-toggle="tooltip" data-placement="top" title="">

                                        </label>
                                    </div>
                                    <div class="swatch-element">
                                        <input id="swatch-2-fullbox-100ml" type="radio" name="dungtich" class="bk-product-property dungtich" hidden>
                                        <label class="border chiet-100ml p-1" for="swatch-2-fullbox-100ml" style="position: relative;" data-toggle="tooltip" data-placement="top" title="">

                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 d-flex justify-content-center mt-2">
                        <div>
                            <a class="btn btn-success btn-lg btn-thongtin rounded-0" id="xemChiTiet" href="">
                                <span class="txt-main">XEM CHI TIẾT</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    require "views/Admin/templates/footer.php";
    ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.13.4/b-2.3.6/b-colvis-2.3.6/b-html5-2.3.6/b-print-2.3.6/date-1.4.0/fc-4.2.2/fh-3.3.2/r-2.4.1/rg-1.3.1/sc-2.1.1/sb-1.4.2/sl-1.6.2/datatables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#alternative-page-datatable').DataTable({
                dom: 'Blfrtip',
                select: true,
                lengthMenu: [10, 15, 25, 50, 75, 100],
                "ajax": "index.php?controller=NhanVien&action=getSanPham",
                "columns": [{
                        "data": "ten_nuochoa",
                        "render": function(data, type, row) {
                            if (type === 'display') {
                                if (data.length > 15) {
                                    a = `<p class="m-0 d-inline-block align-middle font-16" data-toggle="tooltip" data-placement="top" title="${data}"><a>${data.substr(0, 15) + '...'}</a><br>`
                                } else {
                                    a = `<p class="m-0 d-inline-block align-middle font-16" data-toggle="tooltip" data-placement="top" title="${data}"><a>${data}</a><br>`
                                }
                                return `<img src="${row.img_link}" alt="contact-img" title="contact-img" class="rounded me-3" height="48">
                                                    ` + a + `
                                                    <span class="text-warning mdi mdi-star"></span>
                                                    <span class="text-warning mdi mdi-star"></span>
                                                    <span class="text-warning mdi mdi-star"></span>
                                                    <span class="text-warning mdi mdi-star"></span>
                                                    <span class="text-warning mdi mdi-star"></span></p>`
                            }
                            return `<img src="images/NuocHoa/${row.id_nuochoa}/${row.id_nuochoa}_1.jpeg" alt="contact-img" title="contact-img" class="rounded me-3" height="48">
                                                    <p class="m-0 d-inline-block align-middle font-16" data-toggle="tooltip" data-placement="top" title="${data}"><a>${data}</a><br>
                                                    <span class="text-warning mdi mdi-star"></span>
                                                    <span class="text-warning mdi mdi-star"></span>
                                                    <span class="text-warning mdi mdi-star"></span>
                                                    <span class="text-warning mdi mdi-star"></span>
                                                    <span class="text-warning mdi mdi-star"></span></p>`
                        }
                    },
                    {
                        "data": "ten_thuonghieu",
                        "render": function(data, type, row) {
                            if (type === 'display') {
                                return data.length > 15 ?
                                    `<span data-tooltip="tooltip" title="${data}">${data.substr(0, 15) + '...'}</span>` :
                                    data;
                            }
                            return data;
                            //return `<p class="m-0 d-inline-block align-middle font-14" data-toggle="tooltip" data-placement="top" title="${data}">${data.length > 10 ? data.substring(0, 10)+"..." : data}</p>`;
                        }
                    },
                    {
                        "data": "gia_nhap",
                        "render": function(data, type, row) {
                            str = data.split("-");
                            str_1 = formatStringPrice(str[0]);
                            str_2 = formatStringPrice(str[1]);
                            return str_1 + " - " + str_2;
                        }
                    },
                    {
                        "data": "gioitinh",
                        "render": function(data, type, row) {
                            if (data == 0) {
                                return '<span class="badge bg-success">Nam</span>';
                            } else if (data == 1) {
                                return '<span class="badge bg-info">Nữ</span>';
                            } else if (data == 2) {
                                return '<span class="badge bg-danger">Unisex</span>';
                            }
                        }
                    },
                    {
                        "data": "gia_ban",
                        "render": function(data, type, row) {
                            str = data.split("-");
                            str_1 = formatStringPrice(str[0]);
                            str_2 = formatStringPrice(str[1]);
                            return str_1 + " - " + str_2;
                        }
                    },
                    {
                        "data": "soluong",
                        "render": function(data, type, row) {
                            if (data <= 2) {
                                return '<span class="badge bg-success">Còn hàng</span>';
                            } else {
                                return '<span class="badge bg-danger">Hết hàng</span>';
                            }
                        }
                    },
                    {
                        "data": "soluongdaban"
                    },
                    {
                        "data": "status",
                        "render": function(data, type, row) {
                            if (data == 0) {
                                return '<span class="badge bg-success">Vẫn bán</span>';
                            }
                        }
                    },
                    {
                        data: 'id_nuochoa',
                        targets: 7,
                        render: function(data, type, row, meta) {
                            s = (row.status == 0) ? `<a onclick="return confirm('Bạn có chắc chắn muốn ngừng kinh doanh sản phẩm này?')" href="index.php?controller=NhanVien&action=lockSanPham&id_nuochoa=${data}" class="action-icon" data-toggle="tooltip" data-placement="top" title="Khóa sản phẩm"> <i class="mdi mdi-lock-plus-outline"></i></a>` : `<a href="index.php?controller=NhanVien&action=unlockSanPham&id_nuochoa=${data}" class="action-icon" data-toggle="tooltip" data-placement="top" title="Mở khóa sản phẩm" onclick="return confirm('Bạn có chắc chắn muốn kinh doanh lại sản phẩm này?')"> <i class="mdi mdi-lock-open-minus-outline"></i></a>`;
                            return `<button class="action-icon border-0 xemThongTin" data-toggle="tooltip" data-placement="top" title="Xem thông tin" value="${row.id_nuochoa}" data-bs-toggle="modal" data-bs-target="#thongTinSanPham" style="background-color:#FFFFFF;"><i class="mdi mdi-eye"></i></button>
                                        <a href="index.php?controller=NhanVien&action=updateSanPham&id_nuochoa=${data}" class="action-icon" data-toggle="tooltip" data-placement="top" title="Chỉnh sửa"><i class="mdi mdi-square-edit-outline"></i></a>
                                        ` + s;
                        }
                    },
                ],
                "language": {
                    "url": '//cdn.datatables.net/plug-ins/1.10.25/i18n/Vietnamese.json',
                },
            });
        });
    </script>
    <script src="https://cpwebassets.codepen.io/assets/common/stopExecutionOnTimeout-2c7831bb44f98c1391d6a4ffda0e1fd302503391ca806e7fcc7b9b87197aec26.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.0/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/ad153db3f4.js"></script>
    <script src="js/nuocHoa.js"></script>
    <script src="js/admin.js"></script>
<?php
} else {
    header("location: index.php");
}
?>