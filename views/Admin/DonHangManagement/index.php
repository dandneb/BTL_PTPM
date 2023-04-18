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
    <title>Đơn hàng</title>
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
                        <li class="breadcrumb-item"><a href="index.php?controller=NhanVien">Quản lý cửa hàng</a></li>
                        <li class="breadcrumb-item active">Nhà cung cấp</li>
                    </ol>
                </div>
                <h4 class="page-title">Nhà cung cấp</h4>
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
                            <a href="index.php?controller=NhaCungCap&action=addNhaCungCap" class="btn btn-danger mb-2"><i class="mdi mdi-plus-circle me-2"></i>Thêm nhà cung cấp</a>
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
                                    <th class="all">Mã đơn hàng</th>
                                    <th>Tên khách hàng</th>
                                    <th>Số điện thoại</th>
                                    <th>Địa chỉ</th> 
                                    <th>Ngày đặt hàng</th> 
                                    <th>Khuyến mãi</th> 
                                    <th>Tổng tiền</th> 
                                    <th>Trạng thái đơn hàng</th>
                                    <th>Trạng thái thanh toán</th>
                                    <th>Trạng thái vận chuyển</th>
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
            "ajax": "index.php?controller=DonHang&action=getDonHang",
            "columns":[
                {"data":"id_donhang"},
                {"data":"hoten"},
                {"data":"sodienthoai"},
                {"data":"diachi"},
                {"data": "ngaydathang"},
                {"data": "khuyenmai"},
                {"data": "tongtien"},
                {"data": "trangthaidonhang",
                "render": function ( data, type, row ) {
                    if ( data == 0 ) {
                        return '<span class="badge bg-danger">Chưa xác nhận</span>';
                    } else if ( data == 1 ) {
                        return '<span class="badge bg-success">Đã xác nhận</span>';
                    }
                    else if ( data == 2 ) {
                        return '<span class="badge bg-success">Hoàn tất</span>';
                    }else {
                        return '<span class="badge bg-danger">Đã hủy</span>';
                    }
                }},
                {"data": "trangthaithanhtoan",
                "render": function ( data, type, row ) {
                    if ( row.trangthaidonhang != 3 ) {
                        if(data == 0)
                            return '<span class="badge bg-danger">Chưa thanh toán</span>';
                        else
                            return '<span class="badge bg-success">Đã thanh toán</span>';
                    }else{
                        return '<span class="badge bg-danger">Đã hủy</span>';
                    }
                }},
                {"data": "trangthaivanchuyen",
                "render": function ( data, type, row ) {
                    if ( row.trangthaidonhang != 3 ) {
                        if(data == 0)
                            return '<span class="badge bg-danger">Chưa vận chuyển</span>';
                        else if(data == 1)
                            return '<span class="badge bg-success">Đang vận chuyển</span>';
                        else
                            return '<span class="badge bg-success">Đã giao</span>';
                    }else{
                        return '<span class="badge bg-danger">Đã hủy</span>';
                    }
                }},
            ],
        });
    } );
</script>
<?php
}else{
    header("location: index.php");
}
?>
