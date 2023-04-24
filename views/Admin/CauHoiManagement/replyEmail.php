<?php
require "views/Admin/templates/header.php";
if (!isset($_SESSION)) {
    session_start();
}
if (isset($_SESSION['LoginOK']) && $_SESSION['LoginOK'][0] == "1" || $_SESSION['LoginOK'][0] == "2") {
    $ql = explode("_", $_SESSION['LoginOK']);
?>

    <head>
        <title>Trả lời câu hỏi</title>
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
                            <li class="breadcrumb-item"><a href="index.php?controller=NhaCungCap">Quản lý cửa hàng</a></li>
                            <li class="breadcrumb-item"><a href="index.php?controller=BaiViet">Câu hỏi</a></li>
                            <li class="breadcrumb-item active">Trả lời câu hỏi</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Câu hỏi</h4>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-10 ms-auto me-auto">
                <a class="btn btn-danger mt-2 mb-2">Trả lời câu hỏi</a>
                <div style="color: red">
                    <?php echo '<span>' . $error . '</span>' ?>
                </div>
                <div style="color: warning" id="thong_bao">

                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="modal-dialog mt-0 mb-0">
                            <div class="modal-content">
                                <div class="modal-header modal-colored-header bg-primary">
                                    <h4 class="modal-title" id="compose-header-modalLabel">Nội dung câu hỏi</h4>
                                </div>
                                <div>
                                    <table class="table table-bordered border-black border-3 mb-0">
                                        <tbody>
                                            <tr>
                                                <td class="w-50 p-3"><strong>Mã câu hỏi:</strong></td>
                                                <td class="w-50 p-3"><span class="span-table"><?php echo $cauhoi['id_cauhoi'] ?></span></td>
                                            </tr>
                                            <tr>
                                                <td class="w-50 p-3"><strong>Ngày hỏi:</strong></td>
                                                <td class="w-50 p-3"><span class="span-table"><?php echo $date_only ?></span></td>
                                            </tr>
                                            <tr>
                                                <td class="w-50 p-3"><strong>Thời gian hỏi:</strong></td>
                                                <td class="w-50 p-3"><span class="span-table"><?php echo $time_only ?></span></td>
                                            </tr>
                                            <tr>
                                                <td class="w-50 p-3"><strong>Họ tên:</strong></td>
                                                <td class="w-50 p-3"><span class="span-table"><?php echo $cauhoi['hoten'] ?></span></td>
                                            </tr>
                                            <tr>
                                                <td class="w-50 p-3"><strong>Email:</strong></td>
                                                <td class="w-50 p-3"><span class="span-table"><?php echo $cauhoi['email'] ?></span></td>
                                            </tr>
                                            <tr>
                                                <td class="w-50 p-3"><strong>Nội dung:</strong></td>
                                                <td class="w-50 p-3"><span class="span-table"><?php echo $cauhoi['noidung'] ?></span></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div><!-- /.modal-content -->
                        </div><!-- /.modal-dialog -->
                    </div>
                    <div class="col-md-6">
                        <div class="modal-dialog mt-0 mb-0">
                            <div class="modal-content">
                                <div class="modal-header modal-colored-header bg-info">
                                    <h4 class="modal-title" id="compose-header-modalLabel">Trả lời câu hỏi</h4>
                                </div>
                                <div class="p-1">
                                    <div class="modal-body px-3 pt-3 pb-0">
                                        <form action="" method="POST">
                                            <div class="mb-2">
                                                <label for="msgto" class="form-label">Gửi tới</label>
                                                <input type="text" name="email" id="msgto" value="<?php echo $cauhoi['email'] ?>" class="form-control" placeholder="Example@email.com" readonly>
                                            </div>
                                            <div class="mb-2">
                                                <label for="mailsubject" class="form-label">Tiêu đề</label>
                                                <input type="text" id="mailsubject" name="subject" class="form-control" placeholder="Nhập tiêu đề">
                                            </div>
                                            <div class="write-mdg-box mb-3">
                                                <label class="form-label">Nội dung</label>
                                                <textarea id="simplemde1" name="traloi"></textarea>
                                            </div>
                                            <div class="px-3 pb-3">
                                                <button type="submit" name="submit" class="btn btn-primary" data-bs-dismiss="modal"><i class="mdi mdi-send me-1"></i>Gửi thư</button>
                                            </div>
                                        </form>
                                    </div>
                                    
                                </div>
                            </div><!-- /.modal-content -->
                        </div><!-- /.modal-dialog -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- container -->

    </div>
    <!-- content -->

    <!-- Footer Start -->
    <footer class="footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <script>
                        document.write(new Date().getFullYear())
                    </script> © Hyper - Coderthemes.com
                </div>
                <div class="col-md-6">
                    <div class="text-md-end footer-links d-none d-md-block">
                        <a href="javascript: void(0);">About</a>
                        <a href="javascript: void(0);">Support</a>
                        <a href="javascript: void(0);">Contact Us</a>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- end Footer -->

    <?php
    require "views/Admin/templates/footer.php";
    ?>
    <script src="../BTL_PTPM/views/Admin/assets/js/vendor/simplemde.min.js"></script>
    <script src="../BTL_PTPM/views/Admin/assets/js/pages/demo.inbox.js"></script>
<?php
} else {
    header("location: index.php");
}
?>