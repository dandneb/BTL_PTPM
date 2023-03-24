<?php
require "views/Admin/templates/header.php";
$characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
$randomString = str_shuffle($characters);
$id_nuochoa = substr($randomString, 0, 11);
?>
<div class="container-fluid" style="margin-top:15px">
    <!-- start page title -->
    <div class="row">
        <div class="col-md-10 ms-auto me-auto">
            <a class="btn btn-danger mb-2">Thêm nước hoa</a>
            <form class="needs-validation" novalidate>
                <div class="row">
                    <div class="col-md-6 ms-0">
                        <div class="mb-3">
                            <label class="form-label" for="validationCustom01">Mã nước hoa</label>
                            <input type="text" class="form-control" value="<?php echo $id_nuochoa ?>" id="validationCustom01" readonly required>
                        </div>
                    </div>
                    <div class="col-md-6 me-0">
                        <div class="mb-3">
                            <label class="form-label" for="validationCustom01">Nhập tên nước hoa</label>
                            <input type="text" class="form-control" id="validationCustom01" placeholder="Tên nước hoa" required>
                            <div class="invalid-feedback">
                                Hãy nhập tên nước hoa!
                            </div>
                        </div>
                    </div>
                </div>
                <button class="btn btn-primary" type="submit">Thêm</button>
            </form>
        </div>
    </div>
</div>
<?php
require "views/admin/templates/footer.php";
?>