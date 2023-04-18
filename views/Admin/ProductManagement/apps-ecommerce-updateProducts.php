<?php
require "views/Admin/templates/header.php";
if (!isset($_SESSION)) {
    session_start();
}
if (isset($_SESSION['LoginOK']) && $_SESSION['LoginOK'][0] == "1" || $_SESSION['LoginOK'][0] == "2") {
    $ql = explode("_", $_SESSION['LoginOK']);
?>
<head>
    <title>Sửa nước hoa</title>
</head>
    <!-- Start Content-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="index.php">Parfumerie</a></li>
                            <li class="breadcrumb-item"><a href="index.php?controller=nhanvien">Quản lý cửa hàng</a></li>
                            <li class="breadcrumb-item"><a href="index.php?controller=nhanvien&action=sanpham">Nước hoa</a></li>
                            <li class="breadcrumb-item active">Sửa nước hoa</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Sửa nước hoa</h4>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-10 ms-auto me-auto">
                <a class="btn btn-danger mt-2 mb-2">Chọn cách thức sửa nước hoa</a>
                <a class="btn btn-outline-secondary mt-2 mb-2">Mã nước hoa: <?php echo $id_nuochoa ?></a>
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
            </div>

            <div class="col-md-10 ms-auto me-auto d-flex justify-content-between">
                <a class="btn btn-info mt-2 mb-2 p-5 fs-4" href=<?php echo "index.php?controller=NhanVien&action=updateThongTinSanPham&id_nuochoa=" . $id_nuochoa ?>>Sửa thông tin nước hoa</a>
                <a class="btn btn-warning mt-2 mb-2 p-5 fs-4" href=<?php echo "index.php?controller=NhanVien&action=updateImages&id_nuochoa=" . $id_nuochoa ?>>Sửa ảnh nước hoa</a>
                <a class="btn btn-success mt-2 mb-2 p-5 fs-4" href=<?php echo "index.php?controller=NhanVien&action=updateSoLuong&id_nuochoa=" . $id_nuochoa ?> >Sửa số lượng sản phẩm</a>
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
} else {
    header("location: index.php");
}
?>