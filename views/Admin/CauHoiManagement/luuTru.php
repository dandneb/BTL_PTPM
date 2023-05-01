<?php
require "views/Admin/templates/header.php";
if (!isset($_SESSION)) {
    session_start();
}
if (isset($_SESSION['LoginOK']) && $_SESSION['LoginOK'][0] == "1" || $_SESSION['LoginOK'][0] == "2") {
    $ql = explode("_", $_SESSION['LoginOK']);
?>

    <head>
        <title>Kho lưu trữ</title>
        <link href="../BTL_PTPM/views/Admin/assets/css/vendor/simplemde.min.css" rel="stylesheet" type="text/css">
    </head>
    <!-- Start Content-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="index.php">Parfumerie</a></li>
                            <li class="breadcrumb-item"><a href="index.php?controller=NhanVien">Quản lý cửa hàng</a></li>
                            <li class="breadcrumb-item"><a href="index.php?controller=CauHoi">Câu hỏi</a></li>
                            <li class="breadcrumb-item active">Kho lưu trữ câu hỏi đã xóa</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Kho lưu trữ câu hỏi đã xóa</h4>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="card">
                <div class="card-body">
                    <div class="col-md-10 ms-auto me-auto">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="example-month" class="form-label">Tháng / Năm</label>
                                    <input class="form-control" id="example-month" type="month" name="month">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="col-auto">
                                    <label for="example-month" class="form-label">Nhấn để lấy thông tin</label> <br>
                                    <button type="button" class="btn btn-primary mb-2 getQuestion">Lấy thông tin</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- container -->

    </div>
    <!-- content -->
    <script src="js/admin.js"></script>
    <?php
    require "views/Admin/templates/footer.php";
    ?>
<?php
} else {
    header("location: index.php");
}
?>