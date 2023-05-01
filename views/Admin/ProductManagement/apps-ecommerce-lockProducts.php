<?php
require "views/Admin/templates/header.php";
if(!isset($_SESSION)) {
    session_start();
}
if (isset($_SESSION['LoginOK']) && $_SESSION['LoginOK'][0] == "1" || $_SESSION['LoginOK'][0] == "2") {
    $ql = explode("_", $_SESSION['LoginOK']);
?>

<head>
<link href="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.13.4/b-2.3.6/b-colvis-2.3.6/b-html5-2.3.6/b-print-2.3.6/date-1.4.0/fc-4.2.2/fh-3.3.2/r-2.4.1/rg-1.3.1/sc-2.1.1/sb-1.4.2/sl-1.6.2/datatables.min.css" rel="stylesheet"/>
<title>Nước hoa</title>
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
                                if(isset($_SESSION['success'])){
                                    echo '<span class="text-success">'.$_SESSION['success'].'</span>';
                                    unset($_SESSION['success']);
                                }
                                else if(isset($_SESSION['error'])){
                                    echo '<span class="text-danger">'.$_SESSION['error'].'</span>';
                                    unset($_SESSION['error']);
                                }
                            ?>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table id="myTable" class="table table-centered w-100 dt-responsive nowrap display" id="products-datatable mt-2">
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
                                    <td>
                                        <img src="views/Admin/assets/images/products/product-1.jpg" alt="contact-img" title="contact-img" class="rounded me-3" height="48">
                                        <p class="m-0 d-inline-block align-middle font-16">
                                            <a href="apps-ecommerce-products-details.html" class="text-body">Amazing Modern Chair</a>
                                            <br>
                                            <span class="text-warning mdi mdi-star"></span>
                                            <span class="text-warning mdi mdi-star"></span>
                                            <span class="text-warning mdi mdi-star"></span>
                                            <span class="text-warning mdi mdi-star"></span>
                                            <span class="text-warning mdi mdi-star"></span>
                                        </p>
                                    </td>
                                    <td>
                                        Aeron Chairs
                                    </td>
                                    <td>
                                        09/12/2018
                                    </td>
                                    <td>
                                        09/12/2018
                                    </td>
                                    <td>
                                        $148.66
                                    </td>

                                    <td>
                                        254
                                    </td>
                                    <td>
                                        <span class="badge bg-success">Active</span>
                                    </td>
                                    
                                    <td class="table-action">
                                        <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-eye"></i></a>
                                        <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-square-edit-outline"></i></a>
                                        <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-delete"></i></a>
                                    </td>
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
<?php
    require "views/Admin/templates/footer.php";
?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.13.4/b-2.3.6/b-colvis-2.3.6/b-html5-2.3.6/b-print-2.3.6/date-1.4.0/fc-4.2.2/fh-3.3.2/r-2.4.1/rg-1.3.1/sc-2.1.1/sb-1.4.2/sl-1.6.2/datatables.min.js"></script>
<script>
    $(document).ready( function () {
        $('#myTable').DataTable({
            dom: 'Blfrtip',
            select: true,
            lengthMenu: [10, 15, 25, 50, 75, 100],
            "ajax": "index.php?controller=NhanVien&action=getSanPhamLock",
            "columns":[
                {"data":"ten_nuochoa",
                    "render": function ( data, type, row ) {
                        if ( type === 'display' ) {
                            if(data.length > 15){
                                a = `<p class="m-0 d-inline-block align-middle font-16" data-toggle="tooltip" data-placement="top" title="${data}"><a>${data.substr(0, 15) + '...'}</a><br>`
                            }else{
                                a = `<p class="m-0 d-inline-block align-middle font-16" data-toggle="tooltip" data-placement="top" title="${data}"><a>${data}</a><br>`
                            }
                            return `<img src="${row.img_link}" alt="contact-img" title="contact-img" class="rounded me-3" height="48">
                                                    `+a+`
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
                }},
                {"data":"ten_thuonghieu", "render": function(data, type, row){
                    if ( type === 'display' ) {
                        return data.length > 15 ?
                            `<span data-tooltip="tooltip" title="${data}">${data.substr(0, 15) + '...'}</span>` :
                            data;
                    }
                    return data;
                    //return `<p class="m-0 d-inline-block align-middle font-14" data-toggle="tooltip" data-placement="top" title="${data}">${data.length > 10 ? data.substring(0, 10)+"..." : data}</p>`;
                }},
                {"data":"gia_nhap", "render": function(data, type, row){
                    str = data.split("-");
                    str_1 = formatStringPrice(str[0]);
                    str_2 = formatStringPrice(str[1]);
                    return str_1+" - "+str_2;
                }},
                {"data": "gioitinh",
                "render": function ( data, type, row ) {
                    if ( data == 0 ) {
                        return '<span class="badge bg-success">Nam</span>';
                    } else if ( data == 1 ) {
                        return '<span class="badge bg-info">Nữ</span>';
                    }
                    else if ( data == 2 ) {
                        return '<span class="badge bg-danger">Unisex</span>';
                    }
                }},
                {"data":"gia_ban", "render": function(data, type, row){
                    str = data.split("-");
                    str_1 = formatStringPrice(str[0]);
                    str_2 = formatStringPrice(str[1]);
                    return str_1+" - "+str_2;
                }},
                {"data":"soluong", "render": function(data, type, row){
                    if(data <= 2){
                        return '<span class="badge bg-success">Còn hàng</span>';
                    }else{
                        return '<span class="badge bg-danger">Hết hàng</span>';
                    }
                }},
                {"data":"soluongdaban"},
                {"data": "status",
                "render": function ( data, type, row ) {
                    if(row.trangthaithuonghieu == 1 && row.trangthainhacungcap == 1){
                        return '<span class="badge bg-danger">Thương hiệu hoặc nhà cung cấp ngừng kinh doanh</span>';
                    }else if(row.trangthaithuonghieu == 1 || row.trangthainhacungcap == 1){
                        if(row.trangthaithuonghieu == 1){
                            return '<span class="badge bg-danger">Thương hiệu ngừng kinh doanhn</span>';
                        }else if(row.trangthainhacungcap == 1){
                            return '<span class="badge bg-danger">Nhà cung cấp ngừng kinh doanhn</span>';
                        }
                    }else{
                        if ( data == 1 ) {
                            return '<span class="badge bg-danger">Ngừng bán</span>';
                        }
                    }
                    
                }},
                {
                    data: 'id_nuochoa',
                    targets: 7,
                    render: function ( data, type, row, meta ) {
                        s = (row.status == 0) ? `<a onclick="return confirm('Bạn có chắc chắn muốn ngừng kinh doanh sản phẩm này?')" href="index.php?controller=NhanVien&action=lockSanPham&id_nuochoa=${data}" class="action-icon" data-toggle="tooltip" data-placement="top" title="Khóa sản phẩm"> <i class="mdi mdi-lock-plus-outline"></i></a>` : `<a href="index.php?controller=NhanVien&action=unlockSanPham&id_nuochoa=${data}" class="action-icon" data-toggle="tooltip" data-placement="top" title="Mở khóa sản phẩm" onclick="return confirm('Bạn có chắc chắn muốn kinh doanh lại sản phẩm này?')"> <i class="mdi mdi-lock-open-minus-outline"></i></a>`;
                        return `<a href="javascript:void(0);" class="action-icon" data-toggle="tooltip" data-placement="top" title="Xem thông tin"><i class="mdi mdi-eye"></i></a>
                                        <a href="index.php?controller=NhanVien&action=updateSanPham&id_nuochoa=${data}" class="action-icon" data-toggle="tooltip" data-placement="top" title="Chỉnh sửa"><i class="mdi mdi-square-edit-outline"></i></a>
                                        `+ s;
                    }
                },
            ],
            "language": {
                "url": '//cdn.datatables.net/plug-ins/1.10.25/i18n/Vietnamese.json',
            },
        });
    } );
</script>
<?php
}else{
    header("location: index.php");
}
?>
