<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <link rel="stylesheet" href="style/header.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>Bootstrap Example</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="style\swiper-bundle.min.css">
    <script src="js/jquery-3.6.4.min.js"></script>
</head>

<body class="p-0 m-0 border-0 bd-example">

    <!-- Example Code -->

    <nav class="navbar navbar-expand-lg navbar-dark bg-success">
        <div class="container-fluid">
            <a class="logo_wrapper" href="index.php" style="cursor:pointer;">
                <div class="navbar-brand" href="index.php"><img src="images/header/logo.png" class="logo" alt=""></div>
            </a>
            <button class="btn btn-sidebar" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasWithBothOptions" aria-controls="offcanvasWithBothOptions"><span class="navbar-toggler-icon"></span></button>

            <div class="offcanvas offcanvas-start" data-bs-scroll="true" tabindex="-1" id="offcanvasWithBothOptions" aria-labelledby="offcanvasWithBothOptionsLabel">
                <div class="offcanvas-header bg-success" style="display:flex;justify-content:end">
                    <button type="button" class="btn-close bg-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body p-0">
                    <div class="bg-success text-white flex-column pb-3">
                        <div class="d-flex justify-content-center">
                            <div style="background-color: #05392B; width:50px; height: 50px; border-radius:100%">
                                <span class="material-icons" style="font-size: 40px; margin-top:5px; margin-left: 5px;">
                                    account_circle
                                </span>
                            </div>
                        </div>
                        <div class="d-flex justify-content-center">
                            <p class="p-14">Đào Duy Đán</p>
                        </div>
                        <div class="d-flex justify-content-center">
                            <button type="button" class="btn btn-outline-light rounded-0" style="transform: translateX(-5px);">TÀI KHOẢN</button>
                            <button type="button" class="btn btn-outline-light rounded-0" style="transform: translateX(5px);">ĐĂNG XUẤT</button>
                        </div>
                        <div class="d-flex justify-content-center mt-3">
                            <form class="d-flex input-group" role="search" style="max-width: 250px;">
                                <input class="form-control" type="search" placeholder="Tìm kiếm sản phẩm" aria-label="Search">
                                <button class="btn" style="background-color: #FFFFFF;" type="submit"><span class="material-icons">
                                        search
                                    </span></button>
                            </form>
                        </div>
                        <div class="d-flex justify-content-center mt-3">
                            <a href="index.php?controller=khachhang&action=yeuthich" style="color: white;">
                                <span class="material-icons me-3">
                                    favorite
                                </span>
                            </a>
                            <a href="index.php?controller=khachhang&action=giohang" style="color: white;">
                                <span class="material-icons">
                                    shopping_cart
                                </span>
                            </a>
                        </div>
                    </div>
                    <div>
                        <div style="background-color:#F6F6F7" class="p-2">
                            <p class="p-13 m-0">Danh mục</p>
                        </div>
                        <div style="background-color:white" class="p-2 border-bottom">
                            <p class="p-14 m-0">Trang chủ</p>
                        </div>
                        <div style="background-color:white" class="p-2 border-bottom">
                            <p class="p-14 m-0">Giới thiệu</p>
                        </div>
                        <div style="background-color:white" class="p-2 border-bottom">
                            <p class="p-14 m-0">Thương hiệu</p>
                        </div>
                        <div style="background-color:white" class="p-2 border-bottom">
                            <p class="p-14 m-0">Nước hoa</p>
                        </div>
                        <div style="background-color:white" class="p-2 border-bottom">
                            <p class="p-14 m-0">Nước hoa chiết</p>
                        </div>
                        <div style="background-color:white" class="p-2 border-bottom">
                            <p class="p-14 m-0">Kiến thức</p>
                        </div>
                        <div style="background-color:white" class="p-2 border-bottom">
                            <p class="p-14 m-0">Blog</p>
                        </div>
                        <div style="background-color:white" class="p-2 border-bottom">
                            <p class="p-14 m-0">Liên hệ</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <form class="d-flex input-group" role="search" style="max-width: 250px;">
                    <input class="form-control" type="search" placeholder="Tìm kiếm sản phẩm" aria-label="Search">
                    <button class="btn" style="background-color: #FFFFFF;" type="submit"><span class="material-icons">
                            search
                        </span></button>
                </form>
                <div class="navbar-nav ms-auto mb-2 mb-lg-0 text-white">
                    <div class="header-myAccount" style="border-right-style: solid;">
                        <p class="p-14-bold mt-3">Xin chào, Khách</p>
                        <p class="p-12-bold mt-3"><a href="index.php?controller=KhachHang&action=DangNhap" class="text-white">Đăng nhập</a> <span class="p-12">hoặc</span> <span class="p-12-bold"><a href="index.php?controller=KhachHang&action=DangKy" class="text-white">Đăng ký</a></span>
                    </div>
                    <div class="ms-3 me-5 header-myFavorites">
                        <a href="index.php?controller=khachhang&action=yeuthich" style="color: white;">
                            <span class="material-icons me-3">
                                favorite
                            </span>
                        </a>
                        <a href="index.php?controller=khachhang&action=giohang" style="color: white;">
                            <span class="material-icons">
                                shopping_cart
                            </span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <ul class="nav justify-content-center p-15-bold" style="background-color:#FFFFFF">
        <li class="nav-item">
            <a class="nav-link active text-dark" href="#">TRANG CHỦ</a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-dark" href="index.php?controller=nuochoa&action=gioithieu">GIỚI THIỆU</a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-dark" href="#">THƯƠNG HIỆU ></a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-dark" href="#">NƯỚC HOA ></a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-dark" href="#">KIẾN THỨC</a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-dark" href="#">BLOG</a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-dark" href="index.php?controller=KhachHang&action=LienHe">LIÊN HỆ</a>
        </li>
    </ul>