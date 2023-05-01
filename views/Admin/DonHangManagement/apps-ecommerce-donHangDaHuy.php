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
                        <li class="breadcrumb-item active">Đơn hàng</li>
                    </ol>
                </div>
                <h4 class="page-title">Danh sách đơn hàng đã hủy</h4>
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
                                    <th>Ngày hủy</th> 
                                    <th>Khuyến mãi</th> 
                                    <th>Tổng tiền</th> 
                                    <th>Trạng thái đơn hàng</th>
                                    <th>Action</th>
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
            columnDefs: [
                { type: 'date-time', targets: 4 },
            ],
            order: [[4, 'desc']],
            lengthMenu: [10, 15, 25, 50, 75, 100],
            "ajax": "index.php?controller=DonHang&action=getDonHangDaHuy",
            "columns":[
                {"data":"id_donhang"},
                {"data":"hoten"},
                {"data":"sodienthoai"},
                {"data":"diachi"},
                {"data": "ngaydathang",},
                {"data": "ngayhuy",},
                {"data": "khuyenmai", "render": function(data, type, row){
                    return parseInt(data).toLocaleString('vi-VN', { style: 'currency', currency: 'VND' });
                }},
                {"data": "tongtien", "render": function(data, type, row){
                    return parseInt(data).toLocaleString('vi-VN', { style: 'currency', currency: 'VND' });
                }},
                {"data": "trangthaidonhang",
                "render": function ( data, type, row ) {
                    
                    if ( data == 3) {
                        return `<span class="badge bg-danger">${row.lydohuydon}</span>`;
                    }
                }},
                {
                    data: 'id_donhang',
                    targets: 5,
                    render: function ( data, type, row, meta ) {
                        return `<a href="index.php?controller=DonHang&action=thongTinDonHang&id_donhang=${data}" class="action-icon" data-toggle="tooltip" data-placement="top" title="Xem thông tin đơn hàng"><i class="mdi mdi-eye-outline"></i></a>`;
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
