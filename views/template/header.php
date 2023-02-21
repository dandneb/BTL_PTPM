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
    <script src="js/jquery-3.6.0.min.js"></script>
</head>

<body class="p-0 m-0 border-0 bd-example">

    <!-- Example Code -->

    <nav class="navbar navbar-expand-lg navbar-dark bg-success">
        <div class="container-fluid">
            <a class="logo_wrapper" href="index.php" style="cursor:pointer;">
                <div class="navbar-brand" href="index.php"><img src="images/header/logo.png" class="logo" alt=""></div>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
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