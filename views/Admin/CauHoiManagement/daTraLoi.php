<?php
require "views/Admin/templates/header.php";
if (!isset($_SESSION)) {
    session_start();
}
if (isset($_SESSION['LoginOK']) && $_SESSION['LoginOK'][0] == "1" || $_SESSION['LoginOK'][0] == "2") {
    $ql = explode("_", $_SESSION['LoginOK']);
?>

    <head>
        <title>Câu hỏi đã trả lời</title>
    </head>

    <head>
        <link href="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.13.4/b-2.3.6/b-colvis-2.3.6/b-html5-2.3.6/b-print-2.3.6/date-1.4.0/fc-4.2.2/fh-3.3.2/r-2.4.1/rg-1.3.1/sc-2.1.1/sb-1.4.2/sl-1.6.2/datatables.min.css" rel="stylesheet" />
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
                            <li class="breadcrumb-item active">Câu hỏi</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Câu hỏi</h4>
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
                            <table id="myTable" class="table table-centered w-100 dt-responsive nowrap display" id="products-datatable mt-2">
                                <thead class="table-light">
                                    <tr>
                                        <th class="all">Mã câu hỏi</th>
                                        <th>Thời gian hỏi</th>
                                        <th>Email</th>
                                        <th>Trạng thái</th>
                                        <th style="width: 85px;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Thông tin câu hỏi</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <table class="table table-bordered border-black border-3 mb-0">
                                            <tbody>
                                                <tr>
                                                    <td class="w-50 p-3"><strong>Mã câu hỏi:</strong></td>
                                                    <td class="w-50 p-3"><span class="span-table thongtincauhoi"></span></td>
                                                </tr>
                                                <tr>
                                                    <td class="w-50 p-3"><strong>Thời gian hỏi:</strong></td>
                                                    <td class="w-50 p-3"><span class="span-table thongtincauhoi"></span></td>
                                                </tr>
                                                <tr>
                                                    <td class="w-50 p-3"><strong>Họ tên:</strong></td>
                                                    <td class="w-50 p-3"><span class="span-table thongtincauhoi"></span></td>
                                                </tr>
                                                <tr>
                                                    <td class="w-50 p-3"><strong>Email:</strong></td>
                                                    <td class="w-50 p-3"><span class="span-table thongtincauhoi"></span></td>
                                                </tr>
                                                <tr>
                                                    <td class="w-50 p-3"><strong>Nội dung:</strong></td>
                                                    <td class="w-50 p-3"><span class="span-table thongtincauhoi"></span></td>
                                                </tr>
                                                <tr>
                                                    <td class="w-50 p-3"><strong>Trả lời:</strong></td>
                                                    <td class="w-50 p-3"><span class="span-table thongtincauhoi"></span></td>
                                                </tr>
                                                <tr>
                                                    <td class="w-50 p-3"><strong>Thời gian trả lời:</strong></td>
                                                    <td class="w-50 p-3"><span class="span-table thongtincauhoi"></span></td>
                                                </tr>
                                                <tr>
                                                    <td class="w-50 p-3"><strong>Người trả lời:</strong></td>
                                                    <td class="w-50 p-3"><span class="span-table thongtincauhoi"></span></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
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
        $(document).ready(function() {
            $('#myTable').DataTable({
                dom: 'Blfrtip',
                select: true,
                lengthMenu: [10, 15, 25, 50, 75, 100],
                "ajax": "index.php?controller=CauHoi&action=HoanTat",
                "columns": [{
                        "data": "id_cauhoi"
                    },
                    {
                        "data": "thoigianhoi"
                    },
                    {
                        "data": "email"
                    },
                    {
                        "data": "trangthai",
                        "render": function(data, type, row) {
                            if (data == 1) {
                                return '<span class="badge bg-success">Hoàn tất</span>';
                            }
                        }
                    },
                    {
                        data: 'id_cauhoi',
                        targets: 5,
                        render: function(data, type, row, meta) {
                            return `<a data-bs-toggle="modal" data-bs-target="#exampleModal" class="action-icon thongtin" data-toggle="tooltip" data-placement="top" title="Xem chi tiết câu hỏi" style="cursor:pointer;"><i class="mdi mdi-eye-outline"></i></a>
                                        `;
                        }
                    },
                ],
                "language": {
                    "url": '//cdn.datatables.net/plug-ins/1.10.25/i18n/Vietnamese.json',
                },
            });
            $(document).on('click', '.thongtin', function() {
                $row = $(this).closest('tr');
                var id_cauhoi = $row.find('td:eq(0)').text();
                if(id_cauhoi!=""){
                    let form_datas = new FormData();
                    form_datas.append('id_cauhoi',id_cauhoi);
                    $.ajax({
                        url: 'index.php?controller=cauhoi&action=getCauHoi',
                        dataType: 'json',
                        cache: false,
                        contentType: false,
                        processData: false,
                        data: form_datas,
                        type: 'post',
                        success: function(res) {
                            var data = res.data;
                            console.log(data);
                            var keys = Object.keys(data);
                            var elements = $(".thongtincauhoi");
                            $(".thongtincauhoi").each(function(index) {
                                $(this).text(data[keys[index]]);
                            });
                        }
                    });
                    return false;
                }
            })
        });
    </script>
<?php
} else {
    header("location: index.php");
}
?>