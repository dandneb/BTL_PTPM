<?php
if(!isset($_SESSION)) {
    session_start();
}
if (isset($_SESSION['LoginOK']) && $_SESSION['LoginOK'][0] == "1" || $_SESSION['LoginOK'][0] == "2") {
    $ql = explode("_", $_SESSION['LoginOK']);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description">
    <meta content="Coderthemes" name="author">
    <!-- App favicon -->
    <link rel="shortcut icon" href="../BTL_PTPM/views/Admin/assets/images/users/unnamed.jpg">

    <!-- third party css -->
    <link href="../BTL_PTPM/views/Admin/assets/css/vendor/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css">
    <!-- third party css end -->

    <!-- App css -->
    <link href="../BTL_PTPM/views/Admin/assets/css/icons.min.css" rel="stylesheet" type="text/css">
    <link href="../BTL_PTPM/views/Admin/assets/css/app.min.css" rel="stylesheet" type="text/css" id="light-style">
    <link href="../BTL_PTPM/views/Admin/assets/css/app-dark.min.css" rel="stylesheet" type="text/css" id="dark-style">
    <link href="../BTL_PTPM/views/Admin/assets/css/admin.css" rel="stylesheet" type="text/css" id="dark-style">
    <script src="js/admin.js"></script></script>
</head>

<body class="loading" data-layout-config='{"leftSideBarTheme":"dark","layoutBoxed":false, "leftSidebarCondensed":false, "leftSidebarScrollable":false,"darkMode":false, "showRightSidebarOnStart": true}'>
    <!-- Begin page -->
    <div class="wrapper">
        <!-- ========== Left Sidebar Start ========== -->
        <div class="leftside-menu">

            <!-- LOGO -->
            <a href="index.php?controller=NhanVien" class="logo text-center logo-light">
                <span class="logo-lg">
                    <img src="../../../BTL_PTPM/images/header/logo.png" alt="" height="16">
                </span>
                <span class="logo-sm">
                    <img src="../../../BTL_PTPM/images/header/logo.png" alt="" height="16">
                </span>
            </a>

            <!-- LOGO -->
            <a href="index.html" class="logo text-center logo-dark">
                <span class="logo-lg">
                    <img src="../BTL_PTPM/views/Admin/assets/images/logo-dark.png" alt="" height="16">
                </span>
                <span class="logo-sm">
                    <img src="../BTL_PTPM/views/Admin/assets/images/logo_sm_dark.png" alt="" height="16">
                </span>
            </a>

            <div class="h-100" id="leftside-menu-container" data-simplebar="">

                <!--- Sidemenu -->
                <ul class="side-nav">

                    <li class="side-nav-title side-nav-item">Navigation</li>

                    <li class="side-nav-item">
                        <a data-bs-toggle="collapse" href="#sidebarDashboards" aria-expanded="false" aria-controls="sidebarDashboards" class="side-nav-link">
                            <i class="uil-home-alt"></i>
                            <span class="badge bg-success float-end">2</span>
                            <span> Dashboards </span>
                        </a>
                        <div class="collapse" id="sidebarDashboards">
                            <ul class="side-nav-second-level">
                                <li>
                                    <a href="index.php?controller=NhanVien&action=analytics">Analytics</a>
                                </li>
                                <li>
                                    <a href="index.php?controller=NhanVien">Ecommerce</a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <li class="side-nav-title side-nav-item">Apps</li>
                    <!-- Quản lý nước hoa -->
                    <li class="side-nav-item">
                        <a data-bs-toggle="collapse" href="#sidebarEcommerce" aria-expanded="false" aria-controls="sidebarEcommerce" class="side-nav-link">
                            <i class="uil-store"></i>
                            <span> Quản lý nước hoa </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="sidebarEcommerce">
                            <ul class="side-nav-second-level">
                                <li>
                                    <a href="index.php?controller=NhanVien&action=sanpham">Danh sách sản phẩm đang hoạt động</a>
                                </li>
                                <li>
                                    <a href="index.php?controller=NhanVien&action=sanPhamLock">Danh sách sản phẩm ngừng kinh doanh</a>
                                </li>
                                <li>
                                    <a href="index.php?controller=NhanVien&action=addsanpham">Thêm sản phẩm</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <!-- Quản lý thương hiệu -->
                    <li class="side-nav-item">
                        <a data-bs-toggle="collapse" href="#sidebarThuongHieu" aria-expanded="false" aria-controls="sidebarThuongHieu" class="side-nav-link">
                            <i class="dripicons-view-thumb"></i>
                            <span> Quản lý thương hiệu </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="sidebarThuongHieu">
                            <ul class="side-nav-second-level">
                                <li>
                                    <a href="index.php?controller=ThuongHieu">Danh sách thương hiệu</a>
                                </li>
                                <li>
                                    <a href="index.php?controller=ThuongHieu&action=addthuonghieu">Thêm thương hiệu</a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <!-- Quản lý nhà cung cấp -->
                    <li class="side-nav-item">
                        <a data-bs-toggle="collapse" href="#sidebarNhaCungCap" aria-expanded="false" aria-controls="sidebarNhaCungCap" class="side-nav-link">
                            <i class="mdi mdi-car-arrow-right"></i>
                            <span> Quản lý nhà cung cấp </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="sidebarNhaCungCap">
                            <ul class="side-nav-second-level">
                                <li>
                                    <a href="index.php?controller=NhaCungCap">Danh sách nhà cung cấp</a>
                                </li>
                                <li>
                                    <a href="index.php?controller=NhaCungCap&action=addnhacungcap">Thêm nhà cung cấp</a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <!-- Quản lý blog/kiến thức -->
                    <li class="side-nav-item">
                        <a data-bs-toggle="collapse" href="#sidebarBaiViet" aria-expanded="false" aria-controls="sidebarBaiViet" class="side-nav-link">
                            <i class="mdi mdi-post-outline"></i>
                            <span> Quản lý blog/kiến thức </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="sidebarBaiViet">
                            <ul class="side-nav-second-level">
                                <li>
                                    <a href="index.php?controller=BaiViet">Danh sách blog/kiến thức</a>
                                </li>
                                <li>
                                    <a href="index.php?controller=BaiViet&action=addbaiviet">Thêm blog/kiến thức</a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <!-- Quản lý đơn hàng -->
                    <li class="side-nav-item">
                        <a data-bs-toggle="collapse" href="#sidebarDonHang" aria-expanded="false" aria-controls="sidebarDonHang" class="side-nav-link">
                            <i class="mdi mdi-order-bool-descending-variant"></i>
                            <span> Quản lý đơn hàng </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="sidebarDonHang">
                            <ul class="side-nav-second-level">
                                <li>
                                    <a href="index.php?controller=DonHang">Danh sách đơn hàng đang xử lý</a>
                                </li>
                                <li>
                                    <a href="index.php?controller=DonHang&action=DaHoanTat">Danh sách đơn hàng đã hoàn tất</a>
                                </li>
                                <li>
                                    <a href="index.php?controller=DonHang&action=DaHuy">Danh sách đơn hàng đã hủy</a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <li class="side-nav-item">
                        <a data-bs-toggle="collapse" href="#sidebarEmail" aria-expanded="false" aria-controls="sidebarEmail" class="side-nav-link">
                            <i class="uil-envelope"></i>
                            <span> Phản hồi </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="sidebarEmail">
                            <ul class="side-nav-second-level">
                                <li>
                                    <a href="index.php?controller=CauHoi">Danh sách câu hỏi chờ xử lý</a>
                                </li>
                                <li>
                                    <a href="index.php?controller=CauHoi&action=DaTraLoi">Danh sách câu hỏi đã xử lý</a>
                                </li>
                                <li>
                                    <a href="index.php?controller=CauHoi&action=KhoLuuTru">Kho lưu trữ</a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <!-- Quản lý cho chủ cửa hàng -->
                    <?php
                    if (isset($_SESSION['LoginOK']) && $_SESSION['LoginOK'][0] == "2") {
                    ?>
                    <li class="side-nav-item">
                        <a data-bs-toggle="collapse" href="#sidebarMaGiamGia" aria-expanded="false" aria-controls="sidebarMaGiamGia" class="side-nav-link">
                            <i class="mdi mdi-sticker-minus-outline"></i>
                            <span> Quản lý mã giảm giá </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="sidebarMaGiamGia">
                            <ul class="side-nav-second-level">
                                <li>
                                    <a href="index.php?controller=MaGiamGia">Danh sách mã giảm giá</a>
                                </li>
                                <li>
                                    <a href="index.php?controller=MaGiamGia&action=hetHan">Danh sách mã giảm giá đã hết hạn</a>
                                </li>
                                <li>
                                    <a href="index.php?controller=MaGiamGia&action=addmagiamgia">Thêm mã giảm giá</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <!-- Quản lý phương thức thanh toán -->
                    <li class="side-nav-item">
                        <a data-bs-toggle="collapse" href="#sidebarThanhToan" aria-expanded="false" aria-controls="sidebarThanhToan" class="side-nav-link">
                            <i class="mdi mdi-bank-transfer"></i>
                            <span> Quản lý phương thức thanh toán </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="sidebarThanhToan">
                            <ul class="side-nav-second-level">
                                <li>
                                    <a href="index.php?controller=ThanhToan">Danh sách phương thức thanh toán</a>
                                </li>
                                <li>
                                    <a href="index.php?controller=ThanhToan&action=addThanhToan">Thêm phương thức thanh toán</a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <!-- Quản lý tài khoản -->
                    <li class="side-nav-item">
                        <a data-bs-toggle="collapse" href="#sidebarTaiKhoan" aria-expanded="false" aria-controls="sidebarTaiKhoan" class="side-nav-link">
                            <i class="mdi mdi-briefcase-account-outline"></i>
                            <span> Quản lý tài khoản </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="sidebarTaiKhoan">
                            <ul class="side-nav-second-level">
                                <li>
                                    <a href="index.php?controller=ChuCuaHang">Danh sách khách hàng</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="side-nav-item">
                        <a data-bs-toggle="collapse" href="#sidebarQLNhanVien" aria-expanded="false" aria-controls="sidebarQLNhanVien" class="side-nav-link">
                            <i class="mdi mdi-briefcase-account-outline"></i>
                            <span> Quản lý nhân viên </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="sidebarQLNhanVien">
                            <ul class="side-nav-second-level">
                                <li>
                                    <a href="index.php?controller=TaiKhoan">Danh sách nhân viên</a>
                                </li>
                                <li>
                                    <a href="index.php?controller=TaiKhoan&action=addTaiKhoan">Thêm tài khoản</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <?php
                    }
                    ?>
                    </ul>
                <!-- End Sidebar -->

                <div class="clearfix"></div>

            </div>
            <!-- Sidebar -left -->

        </div>
        <!-- Left Sidebar End -->

        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->
        <div class="content-page">
            <div class="content">
                <!-- Topbar Start -->
                <div class="navbar-custom">
                    <ul class="list-unstyled topbar-menu float-end mb-0">
                        <li class="dropdown notification-list d-lg-none">
                            <a class="nav-link dropdown-toggle arrow-none" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                <i class="dripicons-search noti-icon"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-animated dropdown-lg p-0">
                                <form class="p-3">
                                    <input type="text" class="form-control" placeholder="Search ..." aria-label="Recipient's username">
                                </form>
                            </div>
                        </li>

                        <li class="dropdown notification-list">
                            <a class="nav-link dropdown-toggle arrow-none" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                <i class="dripicons-bell noti-icon"></i>
                                <span class="noti-icon-badge"></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated dropdown-lg">

                                <!-- item-->
                                <div class="dropdown-item noti-title">
                                    <h5 class="m-0">
                                        <span class="float-end">
                                            <a href="javascript: void(0);" class="text-dark">
                                                <small>Clear All</small>
                                            </a>
                                        </span>Notification
                                    </h5>
                                </div>

                                <div style="max-height: 230px;" data-simplebar="">
                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                                        <div class="notify-icon bg-primary">
                                            <i class="mdi mdi-comment-account-outline"></i>
                                        </div>
                                        <p class="notify-details">Caleb Flakelar commented on Admin
                                            <small class="text-muted">1 min ago</small>
                                        </p>
                                    </a>

                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                                        <div class="notify-icon bg-info">
                                            <i class="mdi mdi-account-plus"></i>
                                        </div>
                                        <p class="notify-details">New user registered.
                                            <small class="text-muted">5 hours ago</small>
                                        </p>
                                    </a>

                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                                        <div class="notify-icon">
                                            <img src="../BTL_PTPM/views/Admin/assets/images/users/avatar-2.jpg" class="img-fluid rounded-circle" alt="">
                                        </div>
                                        <p class="notify-details">Cristina Pride</p>
                                        <p class="text-muted mb-0 user-msg">
                                            <small>Hi, How are you? What about our next meeting</small>
                                        </p>
                                    </a>

                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                                        <div class="notify-icon bg-primary">
                                            <i class="mdi mdi-comment-account-outline"></i>
                                        </div>
                                        <p class="notify-details">Caleb Flakelar commented on Admin
                                            <small class="text-muted">4 days ago</small>
                                        </p>
                                    </a>

                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                                        <div class="notify-icon">
                                            <img src="../BTL_PTPM/views/Admin/assets/images/users/avatar-4.jpg" class="img-fluid rounded-circle" alt="">
                                        </div>
                                        <p class="notify-details">Karen Robinson</p>
                                        <p class="text-muted mb-0 user-msg">
                                            <small>Wow ! this admin looks good and awesome design</small>
                                        </p>
                                    </a>

                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                                        <div class="notify-icon bg-info">
                                            <i class="mdi mdi-heart"></i>
                                        </div>
                                        <p class="notify-details">Carlos Crouch liked
                                            <b>Admin</b>
                                            <small class="text-muted">13 days ago</small>
                                        </p>
                                    </a>
                                </div>

                                <!-- All-->
                                <a href="javascript:void(0);" class="dropdown-item text-center text-primary notify-item notify-all">
                                    View All
                                </a>

                            </div>
                        </li>

                        <li class="dropdown notification-list d-none d-sm-inline-block">
                            <a class="nav-link dropdown-toggle arrow-none" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                <i class="dripicons-view-apps noti-icon"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated dropdown-lg p-0">

                                <div class="p-2">
                                    <div class="row g-0">
                                        <div class="col">
                                            <a class="dropdown-icon-item" href="#">
                                                <img src="../BTL_PTPM/views/Admin/assets/images/brands/slack.png" alt="slack">
                                                <span>Slack</span>
                                            </a>
                                        </div>
                                        <div class="col">
                                            <a class="dropdown-icon-item" href="#">
                                                <img src="../BTL_PTPM/views/Admin/assets/images/brands/github.png" alt="Github">
                                                <span>GitHub</span>
                                            </a>
                                        </div>
                                        <div class="col">
                                            <a class="dropdown-icon-item" href="#">
                                                <img src="../BTL_PTPM/views/Admin/assets/images/brands/dribbble.png" alt="dribbble">
                                                <span>Dribbble</span>
                                            </a>
                                        </div>
                                    </div>

                                    <div class="row g-0">
                                        <div class="col">
                                            <a class="dropdown-icon-item" href="#">
                                                <img src="../BTL_PTPM/views/Admin/assets/images/brands/bitbucket.png" alt="bitbucket">
                                                <span>Bitbucket</span>
                                            </a>
                                        </div>
                                        <div class="col">
                                            <a class="dropdown-icon-item" href="#">
                                                <img src="../BTL_PTPM/views/Admin/assets/images/brands/dropbox.png" alt="dropbox">
                                                <span>Dropbox</span>
                                            </a>
                                        </div>
                                        <div class="col">
                                            <a class="dropdown-icon-item" href="#">
                                                <img src="../BTL_PTPM/views/Admin/assets/images/brands/g-suite.png" alt="G Suite">
                                                <span>G Suite</span>
                                            </a>
                                        </div>
                                    </div> <!-- end row-->
                                </div>

                            </div>
                        </li>

                        <li class="notification-list">
                            <a class="nav-link end-bar-toggle" href="javascript: void(0);">
                                <i class="dripicons-gear noti-icon"></i>
                            </a>
                        </li>

                        <li class="dropdown notification-list">
                            <a class="nav-link dropdown-toggle nav-user arrow-none me-0" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                <span class="account-user-avatar">
                                    <img src="../BTL_PTPM/views/Admin/assets/images/users/unnamed.jpg" alt="user-image" class="rounded-circle">
                                </span>
                                <span>
                                    <span class="account-user-name"><?php echo $ql[2] ?></span>
                                    <span class="account-position"><?php echo $ql[0] == "2" ? "Chủ cửa hàng" : "Nhân viên" ?></span>
                                </span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated topbar-dropdown-menu profile-dropdown">
                                <!-- item-->
                                <div class=" dropdown-header noti-title">
                                    <h6 class="text-overflow m-0">Chào bạn !</h6>
                                </div>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <i class="mdi mdi-account-circle me-1"></i>
                                    <span>Tài khoản</span>
                                </a>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <i class="mdi mdi-account-edit me-1"></i>
                                    <span>Settings</span>
                                </a>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <i class="mdi mdi-lifebuoy me-1"></i>
                                    <span>Support</span>
                                </a>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <i class="mdi mdi-lock-outline me-1"></i>
                                    <span>Lock Screen</span>
                                </a>

                                <!-- item-->
                                <a href="index.php?controller=khachhang&action=dangxuat" class="dropdown-item notify-item">
                                    <i class="mdi mdi-logout me-1"></i>
                                    <span>Đăng xuất</span>
                                </a>
                            </div>
                        </li>
                    </ul>
                    <button class="button-menu-mobile open-left">
                        <i class="mdi mdi-menu"></i>
                    </button>
                    <div class="app-search dropdown d-none d-lg-block">
                        <form>
                            <div class="input-group">
                                <input type="text" class="form-control dropdown-toggle" placeholder="Search..." id="top-search">
                                <span class="mdi mdi-magnify search-icon"></span>
                                <button class="input-group-text btn-primary" type="submit">Search</button>
                            </div>
                        </form>

                        <div class="dropdown-menu dropdown-menu-animated dropdown-lg" id="search-dropdown">
                            <!-- item-->
                            <div class="dropdown-header noti-title">
                                <h5 class="text-overflow mb-2">Found <span class="text-danger">17</span> results</h5>
                            </div>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <i class="uil-notes font-16 me-1"></i>
                                <span>Analytics Report</span>
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <i class="uil-life-ring font-16 me-1"></i>
                                <span>How can I help you?</span>
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <i class="uil-cog font-16 me-1"></i>
                                <span>User profile settings</span>
                            </a>

                            <!-- item-->
                            <div class="dropdown-header noti-title">
                                <h6 class="text-overflow mb-2 text-uppercase">Users</h6>
                            </div>

                            <div class="notification-list">
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <div class="d-flex">
                                        <img class="d-flex me-2 rounded-circle" src="../BTL_PTPM/views/Admin/assets/images/users/avatar-2.jpg" alt="Generic placeholder image" height="32">
                                        <div class="w-100">
                                            <h5 class="m-0 font-14">Erwin Brown</h5>
                                            <span class="font-12 mb-0">UI Designer</span>
                                        </div>
                                    </div>
                                </a>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <div class="d-flex">
                                        <img class="d-flex me-2 rounded-circle" src="../BTL_PTPM/views/Admin/assets/images/users/avatar-5.jpg" alt="Generic placeholder image" height="32">
                                        <div class="w-100">
                                            <h5 class="m-0 font-14">Jacob Deo</h5>
                                            <span class="font-12 mb-0">Developer</span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end Topbar -->
<?php
}
?>