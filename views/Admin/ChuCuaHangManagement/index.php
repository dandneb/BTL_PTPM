<?php
require "views/Admin/templates/header.php";
if(!isset($_SESSION)) {
    session_start();
}
if (isset($_SESSION['LoginOK']) && $_SESSION['LoginOK'][0] == "2") {
    $ql = explode("_", $_SESSION['LoginOK']);
?>

<head>
<link href="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.13.4/b-2.3.6/b-colvis-2.3.6/b-html5-2.3.6/b-print-2.3.6/date-1.4.0/fc-4.2.2/fh-3.3.2/r-2.4.1/rg-1.3.1/sc-2.1.1/sb-1.4.2/sl-1.6.2/datatables.min.css" rel="stylesheet"/>
    <title>Danh sách khách hàng</title>
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
                        <li class="breadcrumb-item active">Khách hàng</li>
                    </ol>
                </div>
                <h4 class="page-title">Khách hàng</h4>
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
                                    <th class="all">Mã người dùng</th>
                                    <th>Họ tên</th>
                                    <th>Email</th>
                                    <th>Số điện thoại</th> 
                                    <th>Status</th>
                                    <th data-toggle="tooltip" data-placement="top" title="Đơn hàng đang chờ xử lý">ĐH Xử Lý</th> 
                                    <th data-toggle="tooltip" data-placement="top" title="Đơn hàng đã hoàn tất">ĐH Hoàn tất</th> 
                                    <th data-toggle="tooltip" data-placement="top" title="Đơn hàng đã hủy">ĐH Đã hủy</th> 
                                    <th style="width: 85px;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        
                                    </td>
                                    <td>
                                        
                                    </td>
                                    <td>
                                        
                                    </td>
                                    <td>
                                        
                                    </td>
                                    <td>
                                        
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
            "ajax": "index.php?controller=ChuCuaHang&action=getKhachHang",
            "columns":[
                {"data":"id_nguoidung"},
                {"data":"hoten"},
                {"data":"email"},
                {"data":"dienthoai"},
                {"data": "trangthai",
                "render": function ( data, type, row ) {
                    if ( data == 1) {
                        return '<span class="badge bg-success">Vẫn hoạt động</span>';
                    } else if ( data == 2 ) {
                        return '<span class="badge bg-danger">Đã khóa</span>';
                    }
                }},
                {"data": "donhangdangxuly"},
                {"data": "donhanghoantat"},
                {"data": "donhangdahuy"},
                {
                    data: 'id_nguoidung',
                    targets: 11,
                    render: function ( data, type, row, meta ) {
                        if(row.trangthai == 1 && row.trangthai != 0){
                            c = `<a onclick="return confirm('Bạn có chắc chắn muốn khóa khách hàng này?')" href="index.php?controller=ChuCuaHang&action=lockKhachHang&id_nguoidung=${data}" class="action-icon" data-toggle="tooltip" data-placement="top" title="Khóa khách hàng"> <i class="mdi mdi-lock-plus-outline"></i></a>`;
                        }else if(row.trangthai == 2 && row.trangthai != 0){
                            c = `<a href="index.php?controller=ChuCuaHang&action=unlockKhachHang&id_nguoidung=${data}" class="action-icon" data-toggle="tooltip" data-placement="top" title="Mở khóa khách hàng" onclick="return confirm('Bạn có chắc chắn muốn mở khóa cho khách hàng này?')"> <i class="mdi mdi-lock-open-minus-outline"></i></a>`;
                        }
                        return c;
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
