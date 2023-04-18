<?php
require "views/Admin/templates/header.php";
if (!isset($_SESSION)) {
    session_start();
}
if (isset($_SESSION['LoginOK']) && $_SESSION['LoginOK'][0] == "1" || $_SESSION['LoginOK'][0] == "2") {
    $ql = explode("_", $_SESSION['LoginOK']);
    $characters = '01234567890123456789ABCDEFGHIJKLMNOPQRSTUVWXYZABCDEFGHIJKLMNOPQRSTUVWXYZ';
$randomString = str_shuffle($characters);
$id_doanvan = substr($randomString, 0, 11);
?>

    <head>
        <link href="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.13.4/b-2.3.6/b-colvis-2.3.6/b-html5-2.3.6/b-print-2.3.6/date-1.4.0/fc-4.2.2/fh-3.3.2/r-2.4.1/rg-1.3.1/sc-2.1.1/sb-1.4.2/sl-1.6.2/datatables.min.css" rel="stylesheet" />
        <title>Sửa bài viết</title>
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
                            <li class="breadcrumb-item active">Kiến thức/Blog</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Kiến thức/Blog</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row mb-2">
                            <div class="col-sm-12">
                                <a class="btn btn-outline-secondary mb-2" id="mabaiviet">Mã bài viết: <?php echo $id_baiviet_blog ?></a>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-sm-4">
                                <button data-bs-toggle="modal" id="btn-add-doanvan" data-bs-target="#staticBackdrop" class="btn btn-primary mb-2"><i class="mdi mdi-plus-circle me-2"></i>Thêm đoạn văn</button>
                            </div>
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
                                        <th>Số thứ tự</th>
                                        <th class="all">Mã đoạn văn</th>
                                        <th>Tiêu đề</th>
                                        <th>Nội dung</th>
                                        <th>Ảnh</th>
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
        <!-- Button trigger modal -->

        <!-- Modal Thêm -->
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">
                    <form action="index.php?controller=BaiViet&action=insertDoanVan" method="POST" class="needs-validation dropzone" id="myAwesomeDropzone" enctype="multipart/form-data" onsubmit="return validateForm_Insert()" novalidate>
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Thêm đoạn văn</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-6 me-0">
                                        <div class="mb-3">
                                            <label class="form-label" for="validationCustom01">Mã bài viết</label>
                                            <input type="text" class="form-control" name="id-baiviet-insert" id="id-baiviet-insert" placeholder="Mã bài viết" readonly required>
                                        </div>
                                    </div>
                                    <div class="col-md-6 me-0">
                                        <div class="mb-3">
                                            <label class="form-label" for="validationCustom01">Mã đoạn văn</label>
                                            <input type="text" class="form-control" value="<?php echo $id_doanvan; ?>" name="id-doanvan-insert" id="id-doanvan-insert" placeholder="Mã đoạn văn" readonly required>
                                        </div>
                                    </div>
                                    <div class="col-md-6 me-0">
                                        <div class="mb-3">
                                            <label class="form-label" for="validationCustom01">Số thứ tự</label>
                                            <input type="text" class="form-control" name="sothutu-insert" id="sothutu-insert" placeholder="Số thứ tự" readonly required>
                                        </div>
                                    </div>
                                    <div class="col-md-12 me-0">
                                        <div class="mb-3">
                                            <label class="form-label" for="validationCustom01">Nhập tiêu đề</label>
                                            <div class="form-floating">
                                                <textarea class="form-control" name="tieude-insert" id="tieude-insert" style="height: 100px;" required></textarea>
                                                <label for="floatingTextarea">Tiêu đề</label>
                                                <div class="invalid-feedback">
                                                    Hãy nhập tiêu đề của đoạn văn!
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 me-0">
                                        <div class="mb-3">
                                            <label class="form-label" for="validationCustom01">Nhập nội dung</label>
                                            <div class="form-floating">
                                                <textarea class="form-control" name="noidung-insert" id="noidung-insert" style="height: 100px;" required></textarea>
                                                <label for="floatingTextarea">Nội dung</label>
                                                <div class="invalid-feedback">
                                                    Hãy nhập nội dung của bài viết!
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="tab-content_1">
                                        <div class="tab-pane show active" id="file-upload-preview">
                                            <div class="fallback">
                                                <input name="file-insert" type="file" id="image_1" accept="image/png,image/jpeg,image/gif,image/ipg" style="display: none;">
                                            </div>
                                            <div class="dz-message needsclick">
                                                <i class="h1 text-muted dripicons-cloud-upload"></i>
                                                <h3>Thêm ảnh cho đoạn văn.</h3>
                                                <span class="text-muted font-13">(Chọn đúng định dạng file ảnh (png, jpg, jpeg, gif),
                                                    <strong>chọn 1 ảnh</strong> với kích thước <strong>tối đa</strong> 5MB.)</span>
                                                <p id="soluong-image-insert" style="text-align:center; color: green;"></p>
                                                <p id="error-image-insert" style="text-align:center; color: red;"></p>
                                                <p id="success-image-insert" style="text-align:center; color: green;"></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                            <button type="submit" name="submit-insert" class="btn btn-primary">Thêm đoạn văn</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Modal Sửa -->
        <div class="modal fade" id="staticBackdrop_2" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">
                    <form action="index.php?controller=baiviet&action=updatedoanvan" method="POST" class="needs-validation dropzone" id="myAwesomeDropzone" enctype="multipart/form-data" onsubmit="return validateForm_Update()" novalidate>
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Sửa đoạn văn</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-6 me-0">
                                    <div class="mb-3">
                                        <label class="form-label" for="validationCustom01">Mã bài viết</label>
                                        <input type="text" class="form-control" name="id_baiviet_update" id="id-baiviet-update" placeholder="Mã bài viết" readonly required>
                                    </div>
                                </div>
                                <div class="col-md-6 me-0">
                                    <div class="mb-3">
                                        <label class="form-label" for="validationCustom01">Mã đoạn văn</label>
                                        <input type="text" class="form-control" name="id_doanvan_update" id="id-doanvan-update" placeholder="Mã đoạn văn" readonly required>
                                    </div>
                                </div>
                                <div class="col-md-6 me-0">
                                    <div class="mb-3">
                                        <label class="form-label label-soThuTu" for="sothutu-update">Sửa số thứ tự</label>
                                        <input type="text" class="form-control" name="sothutu_update" id="sothutu-update" placeholder="Số thứ tự" required>
                                    </div>
                                    <div class="invalid-feedback">
                                        Hãy nhập số thứ tự cần sửa của đoạn văn!
                                    </div>
                                    <p id="error-soThuTu-update" style="text-align:center; color: red;"></p>
                                </div>
                                <div class="col-md-12 me-0">
                                    <div class="mb-3">
                                        <label class="form-label" for="validationCustom01">Sửa tiêu đề</label>
                                        <div class="form-floating">
                                            <textarea class="form-control" name="tieude_update" id="tieude-update" style="height: 100px;" required></textarea>
                                            <label for="floatingTextarea">Tiêu đề</label>
                                            <div class="invalid-feedback">
                                                Hãy nhập tiêu đề cần sửa của đoạn văn!
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 me-0">
                                    <div class="mb-3">
                                        <label class="form-label" for="validationCustom01">Nhập nội dung</label>
                                        <div class="form-floating">
                                            <textarea class="form-control" name="noidung_update" id="noidung-update" style="height: 100px;" required></textarea>
                                            <label for="floatingTextarea">Nội dung</label>
                                            <div class="invalid-feedback">
                                                Hãy nhập nội dung cần sửa của bài viết!
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="tab-content_2">
                                    <div class="tab-pane show active" id="file-upload-preview">
                                        <div class="fallback">
                                            <input name="file_update" type="file" id="image_2" accept="image/png,image/jpeg,image/gif,image/ipg" style="display: none;">
                                        </div>
                                        <div class="dz-message needsclick">
                                            <i class="h1 text-muted dripicons-cloud-upload"></i>
                                            <h3>Sửa ảnh cho đoạn văn.</h3>
                                            <span class="text-muted font-13">(Chọn đúng định dạng file ảnh (png, jpg, jpeg, gif),
                                                <strong>chọn 1 ảnh</strong> với kích thước <strong>tối đa</strong> 5MB.)</span>
                                            <p id="soluong-image-update" style="text-align:center; color: green;"></p>
                                            <p id="error-image-update" style="text-align:center; color: red;"></p>
                                            <p id="success-image-update" style="text-align:center; color: green;"></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-center">
                                    <button type="button" class="btn btn-info" id="btn-delete-file">Gỡ ảnh</button>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                            <button type="submit" name="submit-update" class="btn btn-primary">Sửa đoạn văn</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div> <!-- container -->
    <?php
    require "views/Admin/templates/footer.php";
    ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.13.4/b-2.3.6/b-colvis-2.3.6/b-html5-2.3.6/b-print-2.3.6/date-1.4.0/fc-4.2.2/fh-3.3.2/r-2.4.1/rg-1.3.1/sc-2.1.1/sb-1.4.2/sl-1.6.2/datatables.min.js"></script>
    <script>
        $(document).ready(function() {
            id_baiviet = $('#mabaiviet').text().split(":")[1].trim();
            $('#myTable').DataTable({
                dom: 'Blfrtip',
                select: true,
                lengthMenu: [10, 15, 25, 50, 75, 100],
                "ajax": "index.php?controller=BaiViet&action=getDoanVan&id_baiviet="+id_baiviet,
                "columns":[
                {"data":"sothutu"},
                {"data":"id_doanvan"},
                {"data":"tieude", render: function ( data, type, row ) {
                    if ( type === 'display' ) {
                        return data.length > 20 ?
                            `<span data-tooltip="tooltip" title="${data}">${data.substr(0, 20) + '...'}</span>` :
                            data;
                    }
                    return data;
                }},
                {"data":"noidung", render: function ( data, type, row ) {
                    if ( type === 'display' ) {
                        return data.length > 15 ?
                            `<span data-tooltip="tooltip" title="${data}">${data.substr(0, 15) + '...'}</span>` :
                            data;
                    }
                    return data;
                }},
                {"data": "img_link",
                "render": function ( data, type, row ) {
                    return `<img src="${row.img_link}" alt="contact-img" title="contact-img" class="rounded me-3" height="48">`
                }},
                {
                    data: 'id_doanvan',
                    targets: 5,
                    render: function ( data, type, row, meta ) {
                        a = `<a onclick="return confirm('Bạn có chắc chắn muốn xóa đoạn văn này?')" href="index.php?controller=BaiViet&action=deleteDoanVan&id_doanvan=${data}&id_baiviet_blog=${row.id}" class="action-icon" data-toggle="tooltip" data-placement="top" title="Xóa đoạn văn"><i class="mdi mdi-delete-outline"></i></a>`;
                        return a+`<button data-bs-toggle="modal" data-bs-target="#staticBackdrop_2" value="${data}" class="action-icon modal-update" data-toggle="tooltip" data-placement="top" title="Chỉnh sửa" style="cursor:pointer; border:0; background-color:#F6F6F6"><i class="mdi mdi-square-edit-outline"></i></button>
                                        `;
                    }
                },
                
            ],
            });
        });
    </script>
    <script>
        $(document).on('click', '#btn-add-doanvan', function() {
            var lastRow = $('table tr:last');
            num = parseInt(lastRow.find('td:eq(0)').text());
            console.log(num)
            if(isNaN(num))
                $('#sothutu-insert').val(1);
            else
                $('#sothutu-insert').val(num+1);
            $('#id-baiviet-insert').val(id_baiviet);
        });
    </script>
    <script>
        $(document).on('click', '.modal-update', function() {
            $row = $(this).closest('tr');
            rowCount = $('table tr').length-1;
            if(rowCount > 1){
                $(".label-soThuTu").text("Sửa số thứ tự (chỉ nằm trong khoảng từ 1 đến "+rowCount+")");
            }else{
                $(".label-soThuTu").text("Sửa số thứ tự");
            }
            $('#id-baiviet-update').val(id_baiviet);
            $('#id-doanvan-update').val($row.find('td:eq(1)').text());
            $('#sothutu-update').val($row.find('td:eq(0)').text());
            $('#tieude-update').text($row.find('td:eq(2)').text());
            $('#noidung-update').text($row.find('td:eq(3)').text());
        });
        $("#btn-delete-file").click(function (){
            $("#image_2").val("");
        })
    </script>
    <script>
        var content_1 = document.getElementById("tab-content_1");
        var image_1 = document.getElementById("image_1");
        var content_2 = document.getElementById("tab-content_2");
        var image_2 = document.getElementById("image_2");
        const acceptedImageTypes = ['image/png', 'image/jpeg', 'image/jpg', 'image/gif'];

        function validateForm_Insert(){
            if($("#success-image-insert").html() == "Perfect" && check()){
                return true;
            }else{
                $("#error-image-insert").html("Hãy thêm ảnh cho đoạn văn!")
                return false;
            }
        }
        function check_soThuTu(thutu){
            $row = $(this).closest('tr');
            rowCount = $('table tr').length-1;
            if(rowCount < 2){
                if(thutu == 1)
                    return true;
            }else{
                if(thutu >= 1 && thutu <= rowCount){
                    return true;
                }else{
                    return false;
                }
            }
        }
        function validateForm_Update(){
            if(image_2.files.length > 0){
                if($("#success-image-update").html() == "Perfect" && check() && check_soThuTu($('#sothutu-update').val())){
                    return true;
                }else{
                    if(check_soThuTu($('#sothutu-update').val())){
                        $("#error-soThuTu-update").html("Hãy điền đúng số thứ tự đoạn văn!")
                    }
                    if($("#success-image-update").html() != "Perfect" && !check()){
                        $("#error-image-update").html("Hãy thêm ảnh cho đoạn văn!")
                    }
                    return false;
                }
            }else{
                if(check_soThuTu($('#sothutu-update').val()))
                    return true;
                else{
                    $("#error-soThuTu-update").html("Hãy điền đúng số thứ tự đoạn văn!")
                    return false;
                }
            }
        }
        function letGet(content, image, loai, flags){
            content.addEventListener("click", function() {
                image.click();
            })
            if(flags == 0 || flags == 1){
            // Thêm sự kiện lắng nghe khi có file được chọn
                image.addEventListener("change", (event) => {
                    var files = image.files;
                    file = files[0];
                    if (files.length === 1) {
                        if (!acceptedImageTypes.includes(file.type)) {
                            $("#soluong-image-"+loai).html(files.length + " file đã được chọn!")
                            $("#error-image-"+loai).html(file.name + " không đúng định dạng!")
                            $("#success-image-"+loai).html("")
                            check = false;
                        } else if (file.size > 5 * 1024 * 1024) {
                            $("#soluong-image-"+loai).html(files.length + " ảnh đã được chọn!")
                            $("#error-image-"+loai).html(file.name + " có kích thước quá lớn!")
                            $("#success-image-"+loai).html("")
                            check = false;
                        }else{
                            $("#error-image-"+loai).html('');
                            $("#soluong-image-"+loai).html(files.length + " ảnh đã được chọn!")
                            $("#success-image-"+loai).html("Perfect");
                        }
                    }
                });
                function check(){
                    var files = image.files;
                    if (files.length < 1) {
                        return false;
                    }else {
                        file = files[0];
                        if (!acceptedImageTypes.includes(file.type)) {
                            check = false;
                            return false;
                        } else if (file.size > 5 * 1024 * 1024) {
                            check = false;
                            return false;
                        } else {
                            return true;
                        }
                    }
                }
            }
        }
        letGet(content_1, image_1, "insert", 0);
        letGet(content_2, image_2, "update", 1);
    </script>
<?php
} else {
    header("location: index.php");
}
?>